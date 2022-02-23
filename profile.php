<?php
  session_start();
  $email = $_SESSION['email'];

  include 'connect_mysql/connect.php';
  $conn = connectMysqli();

  $sql = "SELECT * FROM Customer WHERE EMail='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>Finance Budget App</title>
  </head>
  <body>


    <header>
        <div id="sideMenu">
          <div style="align-self: flex-start;">
            <a href="home.php"
              ><div class="block sideMenuItem">
                <img
                alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/14443/home.svg"
                  class="sideMenuIcon"
                />Home
              </div></a
            >
            <a href="budget.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/17167/pie-chart.svg"
                  class="sideMenuIcon"
                />Budget
              </div></a
            >
            <a href="budget-planner.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/11983/from-a-to-z.svg"
                  class="sideMenuIcon"
                />Budget planner
              </div></a
            >
            <a href="achievements.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
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
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/7025/user.svg"
                  class="sideMenuIcon"
                />Profile
              </div></a
            >
            <a href="settings.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/198090/gear.svg"
                  class="sideMenuIcon"
                />Settings
              </div></a
            >
            <a href="faq.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/348371/help.svg"
                  class="sideMenuIcon"
                />Help
              </div></a
            >
            <a href="index.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/334066/log-out-circle.svg"
                  class="sideMenuIcon"
                />Log out
              </div>
            </a>
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
        <img 
            src="pictures/profile_photo.jpg" 
            alt="profile_photo" 
            class="profile-logo"
        />
    </header>

    <main>
        <div class="block" style="flex-wrap: wrap-reverse;">       
          <div class="contentBoxprofile" style="max-width: 450px;">
            <img src="Pictures/profile_photo.jpg" alt="profile_photo" width="390" height="390" style="padding: 30px; text-align: center; display: block; border-radius: 15%;" > 
            <br>
            <p>Email: <?php echo $row['EMail'] ?></p>
            <p>Phone: <?php echo $row['phone'] ?></p> 
            <p>Address: <?php echo $row['home'] ?></p> 
            <a href="edit/edit.html"><button type="submit" class="loginButton">Edit profile</button></a>
          </div>

          <div class="contentBoxprofile" style="width: 1000px;">
            <h2 style="margin-top: 50px;">Ola Nordmann</h2>
            <h3>Student</h3>
            <h2>Friends</h2>
            <p>
              Henrik Holstad hamburger
            </p>
            <p>
              Bjørnar Borge
            </p>
            <p>
              Even Kåre Myklebust
            </p>
            <h2>Achievement ranking</h2>
            <p>
              Diamond level
            </p>
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
          <a href="contacts.php">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>