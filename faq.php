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
        <!-- Required meta tags-->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="main.css" />
        <title>Help / FAQ</title>
    </head>
    <body>
        <header class="block" style="justify-content: left;">
            <div id="sideMenu">
                <div style="align-self: flex-start;">
                    <a href="home.php"
                    ><div class="block sideMenuItem">
                        <img src="https://www.svgrepo.com/show/14443/home.svg"
                        class="sideMenuIcon"
                        />Home
                    </div></a>
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
                class="headerLogo"
                src="https://www.svgrepo.com/show/336031/hamburger-button.svg"
                style="position: fixed;"
              />

              <img
                  src="pictures/logo_header.png"
                  alt="logo_header"
                  class="finance-logo"
              />
              
              <a href="profile.php" style="margin-top: 2%; margin-right: 1%; position: absolute; right: 0">
              <img 
                src="<?php echo $image_src;  ?>" 
                alt="profile_photo" 
                class="profile-logo"
              />
              </a>


        </header>

        <main>
            <h1 style="text-align: center;">Help / FAQ</h1>
            <div class="block"style="width: 90%; margin-left:auto; margin-right:auto;">
                <div class="contentBoxFAQ" style="max-width: 1500px; width: 100%; margin: 30px 0;">
                    <h2>Getting started on Finance Budget App</h2>
                    <p>Navigate to start page and press register button. On the next page you have to enter your credentials and press register.</p>
                    <p>A: Click on <a href="forgot-password.php">"forgot password"</a> and follow the steps from the recieved mail.</p>
                </div>
            </div>
            <div class="block" style="width: 90%; margin-left:auto; margin-right:auto;">
            <div class="contentBoxFAQ" style="max-width: 1500px; width: 100%; margin: 30px 0;">
                <h2>Question</h2>
                <p>Q: Curriculum Vitae</p>
                <p>A: Congratulation</p>
            </div>
            </div>
            <div class="block" style="width: 90%; margin-left:auto; margin-right:auto;">
            <div class="contentBoxFAQ" style="max-width: 1500px; width: 100%; margin: 30px 0;">
                <h2>Question</h2>
                <p>Q</p>
                <p>A</p>
            </div>
            </div>
            <div class="block" style="width: 90%; margin-left:auto; margin-right:auto;">
                <div class="contentBoxFAQ" style="max-width: 1500px; width: 100%; margin: 30px 0;">
                    <h2>Question</h2>
                    <p>Q</p>
                    <p>A</p>
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