<?php

  // Lage cookies
  $cookie_name = "alert";
  $cookie_value = "alert";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");

  $cookie_name_ach1 = "achievement1";
  $cookie_value_ach1 = "achievement1";
  setcookie($cookie_name_ach1, $cookie_value_ach1, time() + (86400 * 365), "/");

  $cookie_name_ach2 = "achievement2";
  $cookie_value_ach2 = "achievement2";
  setcookie($cookie_name_ach2, $cookie_value_ach2, time() + (86400 * 365), "/");

  $cookie_name_ach3 = "achievement3";
  $cookie_value_ach3 = "achievement3";
  setcookie($cookie_name_ach3, $cookie_value_ach3, time() + (86400 * 365), "/");

  $cookie_name_ach4 = "achievement4";
  $cookie_value_ach4 = "achievement4";
  setcookie($cookie_name_ach4, $cookie_value_ach4, time() + (86400 * 365), "/");

  $cookie_name_ach5 = "achievement5";
  $cookie_value_ach5 = "achievement5";
  setcookie($cookie_name_ach5, $cookie_value_ach5, time() + (86400 * 365), "/");

  $cookie_name_ach6 = "achievement6";
  $cookie_value_ach6 = "achievement6";
  setcookie($cookie_name_ach6, $cookie_value_ach6, time() + (86400 * 365), "/");

  // Starte session og oppkobling mot database
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

  // Gjør klar litt data for siden
  $sql = "SELECT * from budget WHERE customerID=" . $id .
    " AND YEAR(creationDate)=" . (int)date('Y') . 
    " AND MONTH(creationDate)=" . (int)date('m') . ";";

  $result   = $conn->query($sql);
  $row      = $result->fetch_assoc();
  $lastBudgetID = isset($row["budgetID"])? $row["budgetID"] : 0;

// Remove this comment

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


  //Til achievements
  $sqlachievementcount = mysqli_query($conn, "SELECT count(CustomerID) AS count FROM userachievement WHERE CustomerID = '$id'");
  $achcount = $sqlachievementcount->fetch_assoc();

  $totalPerc = $achcount['count'] / 6 * 100;
  $totalPercentage = round($totalPerc,0);

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

      .alertAchievement {
        padding: 20px;
        background-color:cornflowerblue;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 20px;
        border-radius: 15px;
    
        width: 50%;
        margin-left: auto;
        margin-right: auto;
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
          src="Pictures/logo_header.png"
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
      <?php
      // Legge inn sjekk på cookie for å fjerne varsel
      if(!isset($_COOKIE[$cookie_name])) {
        echo '<div class="alert">
        <span class="closebtn">&times;</span>  
        <strong>UPDATE:</strong> It is now possible to delete the profile yourself under profile settings.
      </div>';
      }
      ?>
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


    <?php 
      $rowsql1 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '1'");
      if (mysqli_num_rows($rowsql1) > 0) { 
          // Legge inn sjekk på cookie for å fjerne varsel
              if(!isset($_COOKIE[$cookie_name_ach1])) {
                echo '<div class="alertAchievement">
                <span class="closebtn">&times;</span>  
                <strong>NEW ACHIEVEMENT!</strong> Net positive! Earn more than you spend.
              </div>';
              }
            }?>
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
                <!-- Sjekker om $rowsql2 inneholder data, om det er innhold i spørringen sender den ut html koden -->
      <?php
        $rowsql2 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '2'");
        if (mysqli_num_rows($rowsql2) > 0) { 
          // Legge inn sjekk på cookie for å fjerne varsel
              if(!isset($_COOKIE[$cookie_name_ach2])) {
                echo '<div class="alertAchievement">
                <span class="closebtn">&times;</span>  
                <strong>NEW ACHIEVEMENT!</strong> Big spender! Spend more than 10 000$ one month.
              </div>';
              }
            }?>
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
            <?php
        $rowsql3 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '3'");
        if (mysqli_num_rows($rowsql3) > 0) { 
          // Legge inn sjekk på cookie for å fjerne varsel
              if(!isset($_COOKIE[$cookie_name_ach3])) {
                echo '<div class="alertAchievement">
                <span class="closebtn">&times;</span>  
                <strong>NEW ACHIEVEMENT!</strong> Welcome! Made an account.
              </div>';
              }
            }?>
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
        <?php
        $rowsql4 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '4'");
        if (mysqli_num_rows($rowsql4) > 0) { 
          // Legge inn sjekk på cookie for å fjerne varsel
              if(!isset($_COOKIE[$cookie_name_ach4])) {
                echo '<div class="alertAchievement">
                <span class="closebtn">&times;</span>  
                <strong>NEW ACHIEVEMENT!</strong> Smart investor! Have an additional source of income.
              </div>';
              }
            }?>
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
        <?php
        $rowsql5 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '5'");
        if (mysqli_num_rows($rowsql5) > 0) { 
          // Legge inn sjekk på cookie for å fjerne varsel
              if(!isset($_COOKIE[$cookie_name_ach5])) {
                echo '<div class="alertAchievement">
                <span class="closebtn">&times;</span>  
                <strong>NEW ACHIEVEMENT!</strong> First budget! Create your first budget.
              </div>';
              }
            }?>
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
            <?php
        $rowsql6 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '6'");
        if (mysqli_num_rows($rowsql6) > 0) { 
          // Legge inn sjekk på cookie for å fjerne varsel
              if(!isset($_COOKIE[$cookie_name_ach6])) {
                echo '<div class="alertAchievement">
                <span class="closebtn">&times;</span>  
                <strong>NEW ACHIEVEMENT!</strong> Accomplished! Complete 5 achievements.
              </div>';
              }
            }?>
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
        
      <div class="block" style="width: 90%; margin-left:auto; margin-right:auto;">
        <div class="contentBox" style="max-width: 1500px; width: 100%; margin: 50px 0;">
          <h2>Overview</h2>
          <div style="width: 50%; float: left;">
            <h2 id="progressLabel" style="text-align: center;">Saving goal</h2>
            <div id="progressBar"></div>
          </div>
          <div style="width: 50%; float: right;">
            <h2 style="text-align: center;">Budget</h2>
            <h3 id="incomeDiv" style="text-align: center;"></h3>
            <h3 id="expenseDiv" style="text-align: center;"></h3>
          </div>
        </div>
      </div>
      <div class="block" style="width: 90%; margin-left:auto; margin-right:auto;">
        <div class="contentBox" style="max-width: 725px; width: 100%; margin: 0; margin-right: 50px; padding-bottom: 40px;">
          <h2>Budget</h2>
          <canvas id="budgetCanvas"></canvas>
        </div>
            
        <div class="contentBox" style="max-width: 725px; width: 100%; margin: 0;">
          <h2 style="text-align: center;">Achievements</h2>
          
          <div style="margin: 10px;">
            <label style="width: 250px; padding-left: 20px; margin: 10px; font-size: 25px; display: inline-block;">Total Achievements</label>
            <!-- Legger inn som input for å visualisere hva som skal inn -->
            <!--<input style="" type="text" /> -->
            <output style="font-size: 25px;"> <?php echo $achcount['count'] ?></output>
          </div>

          <div style="margin: 10px;">
            <label style="width: 250px; padding-left: 20px; margin: 10px; font-size: 25px; display: inline-block;">Totale Percentage</label>
            <!-- Legger inn som input for å visualisere hva som skal inn -->
            <output style="font-size: 25px;"> <?php echo $totalPercentage ?>%</output> <br>
          </div>

          <div style="margin: 10px;">
            <label style="width: 250px; padding-left: 20px; margin: 10px; font-size: 25px; display: inline-block;">Member Rank</label>
            <img
                src="Pictures/rank.png"
                alt="member rank"
                class="achievementspicture"
                style="width: 40px; height: 40; margin-top: 5%;"
            />
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

      // Henter inn data fra sql for det gjeldene busjettet denne måenden
      var expenseNames  = [];
      var expenseValues = [];
      var incomeNames  = [];
      var incomeValues = [];

      <?php

        if($lastBudgetID != 0) {

          $sql    = "SELECT * FROM transactions WHERE budgetID='$lastBudgetID';";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc()) {

            if($row["transactionType"] == "expense") {
              echo "expenseValues.push('" . $row['transactionValue'] . "');";
              echo "expenseNames.push('" . $row['transactionName'] . "');";
            } else {
              echo "incomeValues.push('" . $row['transactionValue'] . "');";
              echo "incomeNames.push('" . $row['transactionName'] . "');";
            }
          }
        }
      ?>

      if(incomeValues.length > 0 || expenseValues > 0) {
        var totalIncome   = 0;
        var totalExpense  = 0;

        for(var i = 0;i < incomeValues.length;i++) {
          totalIncome += parseInt(incomeValues[i]);
        }

        for(var i = 0;i < expenseValues.length;i++) {
          totalExpense += parseInt(expenseValues[i]);
        }

        document.getElementById("incomeDiv").innerHTML = "Total income: " + totalIncome + " kr";
        document.getElementById("expenseDiv").innerHTML = "Total Expense: " + totalExpense + " kr";

      } else {
        document.getElementById("incomeDiv").innerHTML = "You do not yet have a budget. Create one in budget planner";
      }

      // Monthly budget
      var budgetCanvas = document.getElementById("budgetCanvas").getContext("2d");
      createChart(
        budgetCanvas, 
        expenseNames, 
        expenseValues, 
        TYPE_BAR_HORISONTAL
      );

      <?php
        if($doesGoalExist) {
          echo "progressBar('progressBar', 'progressLabel', '" . $goalName . "', " . $percentage . ", " . $goalValue . ");";
        } else {
          echo "document.getElementById('progressLabel').innerHTML='No saving goals. Create your first saving goal in budget planner!';";
        }
      ?>

    </script>
  </body>
</html>
