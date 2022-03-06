<?php
  session_start();
  $email = $_SESSION['email'];

  include 'connect_mysql/connect.php';
	$conn = OpenCon();

  $sql = "SELECT * FROM Customer WHERE EMail='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id = $row['CustomerID'];

  $sqlimage = "SELECT name FROM images WHERE CustomerID='$id'";
  $resultimage = mysqli_query($conn,$sqlimage);
  $rowimage = mysqli_fetch_array($resultimage);

  $image = $rowimage['name'];
  $image_src = "upload/".$image;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="main.css" />
    <title>Finance Budget App</title>
    <style>
      .alert {
        padding: 20px;
        background-color: #04AA6D;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        border-radius: 15px;
    
        width: 50%;
        margin-left: auto;
        margin-right: auto;
      }

      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      .closebtn:hover {
        color: black;
      }
    </style>
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
          <a href="budget-planner.php"
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
          <a href="settings.php"
            ><div class="block sideMenuItem">
              <img
                src="https://www.svgrepo.com/show/198090/gear.svg"
                class="sideMenuIcon"
              />Settings
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
        class="headerLogo"
        src="https://www.svgrepo.com/show/336031/hamburger-button.svg"
        style="position: fixed;"
      />

      <img
          src="Pictures/logo_header.png"
          alt="logo_header"
          class="finance-logo"
      />

      <a href="profile.php" style="margin-top: 2%; margin-right: 1%; position: absolute; right: 0;">
      <img
          src="<?php echo $image_src;  ?>"
          alt="profile_photo"
          class="profile-logo"
      />
      </a>
    </header>

    <main>
    <div class="alert">
            <span class="closebtn">&times;</span>  
            <strong>UPDATE:</strong> It is now possible to delete the profile yourself under profile settings.
          </div>
          <!-- JavaScript code for closing the news box -->
        <script>
          var close = document.getElementsByClassName("closebtn");
          var i;

          for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
              var div = this.parentElement;
              div.style.opacity = "0";
              setTimeout(function(){ div.style.display = "none"; }, 600);
            }
          }
        </script>
      <div class="block" style="">
        <div class="contentBox" style="max-width: 1500px; width: 100%; margin: 50px 0;">
          <h2>Overview</h2>
          <p>Summary</p>
          <p>Summary</p>
        </div>
      </div>
      <div class="block" style="">
        <div class="contentBox" style="max-width: 725px; width: 100%; margin: 0; margin-right: 50px">
          <h2>Budget</h2>
          <p>Quisque risus libero, feugiat id condimentum a, iaculis a dui. Fusce est leo, congue id felis sit amet, interdum bibendum mauris. Integer vestibulum.</p>
          <p>orci at tellus lobortis lobortis. Nam sed pharetra lorem. Nunc ultrices metus nulla. Nullam augue nulla, pharetra ut vulputate quis, accumsan a velit. Etiam gravida sollicitudin ipsum eu aliquam. Sed diam leo, hendrerit et nisi id, laoreet com</p>
          <p>modo elit. Fusce euismod metus felis, consequat fermentum neque consequat nec. Pellentesque habitant morbi tristique senectus et netus et</p>
        </div>
            
        <div class="contentBox" style="max-width: 725px; width: 100%; margin: 0;">
          <h2>Achivements</h2>
        </div>
      </div>
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

    <script src="main.js"></script>
  </body>
</html>
