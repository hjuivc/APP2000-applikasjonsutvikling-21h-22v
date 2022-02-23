<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
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
        />
        
        <img 
            src="pictures/logo_header.png" 
            alt="logo_header" 
            class="finance-logo"
        />

        <a href="profile.php" style="margin-top: 2%; margin-right: 1%">
        <img 
            src="pictures/profile_photo.jpg" 
            alt="profile_photo" 
            class="profile-logo"
        />
        </a>


    </header>

    <main>
        <h1 style="text-align: center;">Budget Planner</h1>
        <div class="grid-container">
          <div class="contentBoxBudgetPlanner" style="margin: 50px 50px 50px 70px; padding: 50px;">
            <h2>Income</h2>
            <button class="removeButton" type="button"><i class="fas fa-minus-square"></i></button>
            <label id="contentBox-budget-planner" style="margin-top: 50px">Salary</label>
            <input type="text" /> <br>
            <button class="removeButton" type="button"><i class="fas fa-minus-square"></i></button>
            <label id="contentBox-budget-planner">Utleie</label>
            <input type="text" /> <br>
            <button class="addButton" type="button"><i class="fas fa-plus-square"></i></button>
            <button class="submitButton">Submit</button>
          </div>

          <div class="contentBoxBudgetPlanner" id="high" style="margin: 50px 70px 50px 50px; padding: 50px;">
            <h2>Expenses</h2>
            <button class="removeButton" type="button"><i class="fas fa-minus-square"></i></button>
            <label id="contentBox-budget-planner" style="margin-top: 50px">Bolig</label>
            <input type="text" /> <br>
            <button class="removeButton" type="button"><i class="fas fa-minus-square"></i></button>
            <label id="contentBox-budget-planner">Mat</label>
            <input type="text" /> <br>
            <button class="addButton" type="button"><i class="fas fa-plus-square"></i></button>
            <button class="submitButton">Submit</button>
          </div>
          
          <div class="contentBoxBudgetPlanner" style="margin: 50px 50px 50px 70px; padding: 50px;">
            <h2>Summary</h2>
            <label id="contentBox-budget-planner" style="margin-top: 50px">Total income</label>
            <input type="text" /> <br>
            <label id="contentBox-budget-planner">Total expenses</label>
            <input type="text" /> <br>
            <label id="contentBox-budget-planner">Difference</label>
            <input type="text" /> <br>
          </div>
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
