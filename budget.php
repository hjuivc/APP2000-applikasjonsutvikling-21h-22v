<?php
  session_start();
  $email = $_SESSION['email'];

  include 'connect_mysql/connect.php';
	$conn = OpenCon();

  $sql    = "SELECT * FROM Customer WHERE EMail='$email'";
  $result = $conn->query($sql);
  $row    = $result->fetch_assoc();
  $id     = $row['CustomerID'];

  // Henter bilde
  $sqlimage     = "SELECT name FROM images WHERE CustomerID='$id'";
  $resultimage  = mysqli_query($conn,$sqlimage);
  $rowimage     = mysqli_fetch_array($resultimage);

  $image        = $rowimage['name'];
  $image_src    = "upload/".$image;

  // Gjør klar litt data for siden
  $sql = "SELECT * from budget WHERE customerID=" . $id .
    " AND YEAR(creationDate)=" . (int)date('Y') . 
    " AND MONTH(creationDate)=" . (int)date('m') . ";";

  $result   = $conn->query($sql);
  $row      = $result->fetch_assoc();
  $budgetID = isset($row["budgetID"])? $row["budgetID"] : 0;

  $sql = "SELECT goalValue, goalName, goalCreationDate from goal WHERE customerID='$id'
    AND goalDate > CURDATE()
    ORDER BY goalValue DESC
    LIMIT 1;";

  $result     = $conn->query($sql);
  $row        = $result->fetch_assoc();

  $goalValue;
  $goalName;
  $goalDate;
  $sumSaved = 0.0;
  $percentage;

  $doesGoalExist = isset($row["goalValue"])? true : false;

  if($doesGoalExist) {
    $goalValue  = $row["goalValue"];
    $goalName   = $row["goalName"];
    $goalDate   = $row["goalCreationDate"];

    $sql = "SELECT budgetID FROM budget WHERE customerID='$id'
      AND creationDate <= '$goalDate';";

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $currentID = $row["budgetID"];
      $sql = "SELECT * FROM transactions WHERE budgetID='$currentID'
        AND transactionName='$goalName';";

      $innerResult  = $conn->query($sql);
      $innerRow     = $innerResult->fetch_assoc();

      $sumSaved += isset($innerRow["transactionValue"])? $innerRow["transactionValue"] : 0;
    }

    $percentage = $sumSaved / $goalValue * 100;
  }


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Budget</title>
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
            <a href="budget-planner/budget-planner.php"
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
            <a href="faq.php"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/348371/help.svg"
                  class="sideMenuIcon"
                />Help
              </div></a
            >
            <a href="login/logout.php"
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
            src="Pictures/logo_header.png" 
            alt="logo_header" 
            class="finance-logo"
        />

        <a href="profile.php" style="margin-top: 2%; margin-right: 1%; position: fixed; right: 0">
        <img 
            src="<?php echo $image_src;  ?>"
            alt="profile_photo" 
            class="profile-logo"
        />
        </a>


    </header>

    <main style="max-width: calc(1100px + 550px + 50px); margin: auto;">
      <h1 style="text-align: center;">Budget</h1>
      <div class="block" style="width: 100%; flex-wrap: wrap; gap: 50px;">
        <div class="contentBox" style="max-width: 750px; width: 100%;">
          <h2>Monthly budget</h2>
          <canvas id="largeCanvas" style="height: 80%"></canvas>
        </div>
        <div class="block" style="max-width: 550px; flex-wrap: wrap; gap: 50px;">
          <div class="contentBox" style="width: 100%;">
            <h2>Monthly income</h2>
            <canvas id="smallUpperCanvas"></canvas>
          </div>
          <div class="contentBox" style="width: 100%;">
            <h2 id="progressLabel">Saving Goal</h2>
            <div id="progressBar" style="max-width: 80%; margin: auto;"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="graphs.js"></script>
    <script src="progress.js"></script>
    <script>
      
      // Data vi kommer til å hente fra databasen
      
      var incomeValues  = [];
      var incomeNames   = [];

      var expenseValues = [];
      var expenseNames  = [];
      
      <?php

        if($budgetID != 0) {

          $sql    = "SELECT * FROM transactions WHERE budgetID='$budgetID';";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc()) {

            if($row["transactionType"] == "income") {

              echo "incomeValues.push('" . $row['transactionValue'] . "');";
              echo "incomeNames.push('" . $row['transactionName'] . "');";
            } else {

              echo "expenseValues.push('" . $row['transactionValue'] . "');";
              echo "expenseNames.push('" . $row['transactionName'] . "');";
            }
          }
        }
      ?>

      // Monthly budget
      var largeCanvas = document.getElementById("largeCanvas").getContext("2d");
      
      // Monthly income
      var smallUpperCanvas = document.getElementById("smallUpperCanvas").getContext("2d");
      createChart(
        smallUpperCanvas, 
        incomeNames, 
        incomeValues, 
        TYPE_BAR_VERTICAL
      );

      // Progress bar for saving goal
      <?php
        if($doesGoalExist) {
          echo "progressBar('progressBar', 'progressLabel', '" . $goalName . "', " . $percentage . ", " . $goalValue . ");";
        }  else {
          echo "document.getElementById('progressLabel').innerHTML='No saving goals. Create your first saving goal in budget planner!';";
        }
      ?>
      createChart(
        largeCanvas, 
        expenseNames, 
        expenseValues, 
        TYPE_BAR_HORISONTAL
      );
    </script>
  </body>
</html>
