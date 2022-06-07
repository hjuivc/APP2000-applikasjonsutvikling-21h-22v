<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="main.css" />
    <title>Finance Budget App</title>
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
          
          <a href="profile.php" style="margin-top: 2%; margin-right: 1%;position: absolute; right: 0">
          <img 
              src="<?php echo $image_src;  ?>"
              alt="profile_photo" 
              class="profile-logo"
          />
          </a>
          
        </header>
        
    <main>
    <h1 style="text-align: center;">Budget</h1>
      <section class="block" style="flex-wrap: wrap-reverse;">
      <div class="contentBox" style="max-width: 640px;">
        <h2>Why Finance Budgeting App?</h2>
        <p>
            Are you not able to keep track of your economy and spendings? Do 
            you want to save more money? Or do you just need a place to organize your spendings?
             Then Finance Budgeting App is for you! 
        </p>
      </div>
      <div class="contentBox" style="max-width: 640px;">
        <h2>About us</h2>
        <p>
            The Finance Budgeting App was created 2022 and are maintained by six IT
             students attending USN Ringerike. Students are known to have a tight budget,
              which is something we all had experienced. 
        </p>
        <p>
            Therefore, we wanted to make this app so we could both help ourselves and others
             wether you are a student or not. If you have any questions about The Finance Budgeting
              App, please feel free to <a href="contactForm/index.php"><u>contact and ask us!</u></a>
        </p>
      </div>
      </section>
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