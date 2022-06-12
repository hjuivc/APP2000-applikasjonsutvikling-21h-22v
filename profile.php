<?php
  session_start();
  $email = $_SESSION['email'];

  include 'connect_mysql/connect.php';
	$conn = OpenCon();

  $sql = "SELECT * FROM Customer WHERE EMail='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id = $row['CustomerID'];

  $query = "SELECT * FROM images WHERE CustomerID='$id'";
  $name_result = $conn->query($query);
  $name_row = $name_result->fetch_assoc();
  $image_old = $name_row['name'];
  $default = array("default.jpg");



  if(isset($_POST['but_upload'])){
 
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
       // Upload file
       if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
          // Insert record
          $query = "UPDATE images SET name='".$name."' WHERE CustomerID='$id'";
          mysqli_query($conn,$query);
          if(!in_array($image_old, $default)){
            unlink("upload/$image_old");
          }
       }
  
    }
   
  }



  $sqlimage = "SELECT name FROM images WHERE CustomerID='$id'";
  $resultimage = mysqli_query($conn,$sqlimage);
  $rowimage = mysqli_fetch_array($resultimage);

  $image = $rowimage['name'];
  $image_src = "upload/".$image;

  // legger inn dette slik achivement medaljen funker
  $sqlachievementcount1 = mysqli_query($conn, "SELECT count(CustomerID) AS count FROM userachievement WHERE CustomerID = '$id'");
  $achcount1 = $sqlachievementcount1->fetch_assoc();
  
  $totalPerc = $achcount1['count'] / 6 * 100;
  $totalPercentage = round($totalPerc,0);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Profile</title>
  </head>
  <body>


  <header class="block" style="justify-content: left;">
      <div id="sideMenu">
        <div style="align-self: flex-start;">
          <a href="home.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/14443/home.svg"
                class="sideMenuIcon"
              />Home
            </div></a
          >
          <a href="budget.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/17167/pie-chart.svg"
                class="sideMenuIcon"
              />Budget
            </div></a
          >
          <a href="budget-planner/budget-planner.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/11983/from-a-to-z.svg"
                class="sideMenuIcon"
              />Budget planner
            </div></a
          >
          <a href="achievements.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/84275/trophy.svg"
                class="sideMenuIcon"
              />Achievements
            </div></a
          >
        </div>
        <div style="align-self: flex-end; margin-bottom: 40px;">
          <a href="profile.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/7025/user.svg"
                class="sideMenuIcon"
              />Profile
            </div></a
          >
          <a href="faq.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/348371/help.svg"
                class="sideMenuIcon"
              />Help
            </div></a
          >
          <a href="login/logout.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/334066/log-out-circle.svg"
                class="sideMenuIcon"
              />Log out
            </div></a
          >
        </div>
      </div>
  
        <img
            id="menuClosed"
            alt="menuLogo"
            class="headerLogo"
            src="https://www.svgrepo.com/show/336031/hamburger-button.svg"
            style="position: fixed;"
        />
        
        <img 
            src="pictures/logo_header.png" 
            alt="logo_header" 
            class="finance-logo"
        />

        <a href="profile.php" style="margin-top: 2%; margin-right: 1%; position: fixed; right: 0;">
      <img
          src="<?php echo $image_src;  ?>"
          alt="profile_photo"
          class="profile-logo"
      />
      </a>
    </header>

    <main>
        <h1 style="text-align: center;">Profile</h1>
        <div class="block" style="flex-wrap: wrap-reverse;">       
          <div class="contentBoxprofile" style="max-width: 450px;">
             
            <img id=uploadImg src='<?php echo $image_src;  ?>' alt="profile_photo" >
            <br>
            <button type="submit" class="changeButton" id='uploadbutton' onclick="hideButton()"><a>Change photo</a></button>
            <form id='uploadform' method="post" action="" enctype='multipart/form-data'>
            <input type='file' name='file' style="padding-left: 50px; padding-bottom: 54px;">
            <input type='submit' value='Last opp' name='but_upload' onclick="hideForm()">
            </form>
            <button class="loginButton"><a href="profile/edit.php">Edit profile</a></button>                        
            <button class="loginButton"><a href="profile/delete.php">Delete account</a></button>
          </div>

          <div class="contentBoxprofile" style="width: 800px;">
            <h2 style="margin-top: 30px;"><?php if($row['name'] == True){ echo $row['name']; } else { echo "No name";} ?></h2>
            <h3><?php if($row['title'] == True){ echo $row['title']; } else { echo "No title";}?></h3>
            <hr style="border: 1px solid black; margin-left: 40px; margin-right: 40px;">
            <h3>Email: <?php echo $row['EMail'] ?></h3>
            <h3>Phone: <?php echo $row['phone'] ?></h3>
            <h3>Address: <?php echo $row['home'] ?></h3>
            <hr style="border: 1px solid black; margin-left: 40px; margin-right: 40px;">
            <h2 style="margin-top: 30px;">Achievement rank</h2>
            <?php if ($totalPercentage < 34)
                {?>
                  <img
                    src="Pictures/bronze-medal.png"
                    alt="member rank"
                    style="width: 70px; height: 70; margin-left: 18%; margin-top: 2%;"
                  />

                <?php }
                  elseif ($totalPercentage > 34 && $totalPercentage < 68)
                  { ?>
                  <img
                    src="Pictures/silver-medal.png"
                    alt="member rank"
                    style="width: 70px; height: 70; margin-left: 18%; margin-top: 2%;"
                  />

                <?php }
                  elseif ($totalPercentage > 68)
                  { ?>
                  <img
                    src="Pictures/gold-medal.png"
                    alt="member rank"
                    style="width: 70px; height: 70; margin-left: 18%; margin-top: 2%;"
                  />
                  <?php } else {
                    
                  }  ?>

          </div>
        </div>
      </form>
    </main>

    <footer>
      <ul>
        <li>
          <a href="home.php">Home</a>
        </li>
        <li>
          <a href="faq.php">FAQ</a>
        </li>
        <li>
          <a href="about.php">About</a>
        </li>
        <li>
          <a href="contactForm/index.php">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>

    <script>
      function hideButton() {
        var x = document.getElementById("uploadbutton");
        var y = document.getElementById("uploadform");
        x.style.display = "none";
        y.style.display = "block";
    }
      function hideForm() {
        var y = document.getElementById("uploadbutton");
        var x = document.getElementById("uploadform");
        x.style.display = "none";
        y.style.display = "block";
    }
    </script>
    <script src="main.js"></script>
    
  </body>
</html>