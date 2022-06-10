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
  
  $sqlachievementcount = mysqli_query($conn, "SELECT count(CustomerID) AS count FROM userachievement WHERE CustomerID = '$id'");
  $achcount = $sqlachievementcount->fetch_assoc();

  $sqlachievement6=mysqli_query($conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '6'");

  if(mysqli_num_rows($sqlachievement6) > 0) {
    //ingenting
  }
    
  elseif ($achcount['count'] >= 5) {
      $achivement6=mysqli_query($conn, "INSERT INTO userachievement(AchievementID, CustomerID) VALUES('6','$id')");
      echo '<script>alert("Gratulere, du har oppnådd 5 achievements!👍🎉")</script>';
    }
  
  //legger inn tellingene på nytt, slik at det blir oppdatert etter achievement 6
  $sqlachievementcount1 = mysqli_query($conn, "SELECT count(CustomerID) AS count FROM userachievement WHERE CustomerID = '$id'");
  $achcount1 = $sqlachievementcount1->fetch_assoc();

  $totalPerc = $achcount1['count'] / 6 * 100;
  $totalPercentage = round($totalPerc,0);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css" />
        <title>Achievements</title>
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
        
        <a href="profile.php" style="margin-top: 2%; margin-right: 1%;position: fixed; right: 0">
        <img 
            src="<?php echo $image_src;  ?>"
            alt="profile_photo" 
            class="profile-logo"
        />
        </a>
        
      </header>

      <main>
        <h1 style="text-align: center;">Achievements</h1>
        <div class="block">
            <div class="contentBoxAchievements">
                <h2>Overview</h2>
                <label id="contentBox-achievements" style="width: 200px; padding-left: 20px; margin: 10px;">Total Achievements</label>
                <!-- Legger inn som input for å visualisere hva som skal inn -->
                <!--<input style="" type="text" /> -->
                <output> <?php echo $achcount1['count'] ?></output>
                
                <label style="width: 200px; padding-left: 20px; margin: 10px; padding-bottom: 20px;">Totale Percentage</label>
                <!-- Legger inn som input for å visualisere hva som skal inn -->
                <output> <?php echo $totalPercentage ?>%</output> <br>

                <label style="margin: 10px; padding-left: 20px; padding-bottom: 20px;">Achievement Rank</label>

                
                <?php if ($totalPercentage < 34)
                {?>
                  <img
                    src="Pictures/bronze-medal.png"
                    alt="member rank"
                    style="width: 40px; height: 40; margin-left: 10%; margin-top: 5%;"
                  />

                <?php }
                  elseif ($totalPercentage > 34 && $totalPercentage < 68)
                  { ?>
                  <img
                    src="Pictures/silver-medal.png"
                    alt="member rank"
                    style="width: 40px; height: 40; margin-left: 10%; margin-top: 5%;"
                  />

                <?php }
                  elseif ($totalPercentage > 68)
                  { ?>
                  <img
                    src="Pictures/gold-medal.png"
                    alt="member rank"
                    style="width: 40px; height: 40; margin-left: 2.5%; margin-top: 0.1%; position: absolute;"
                  /> 
                  <?php } else {
                    
                  }  ?>

            </div>

            <div class="contentBoxAchievements" style="max-width: 500px; width: 100%; padding: 10px;">
            <h2>Unlocked</h2>

            <?php 
            // sjekker databasen på 2 kriterier og henter ut rowsa om kriterien er møtt
              $rowsql1 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '1'");
              $rowsql2 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '2'");
              $rowsql3 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '3'");
              $rowsql4 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '4'");
              $rowsql5 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '5'");
              $rowsql6 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '6'");
            ?>
            
            <!-- Sjekker om $rowsql1 inneholder data, om det er innhold i spørringen sender den ut html koden -->
            <?php 
            if (mysqli_num_rows($rowsql1) > 0) 
            { ?>

                <section style="display:flex"> 
                    <img
                        src="Pictures/graph.png"
                        alt="graph"
                        class="achievementspicture"
                        style="width: 40px; height: 50; margin-left: 2%; margin: 1.4% 1%; position: absolute;"
                    />
                    <h3 style = "margin-left: 14%">Net positive</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Earn more than you spend</under>
                
                <!-- Sjekker om $rowsql2 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php }
                  if (mysqli_num_rows($rowsql2) > 0) 
                { ?>

                <section style="display:flex; margin-top: 20px">
                    <img
                        src="Pictures/bigspenderss.png"
                        alt="big spender"
                        class="achievementspicture"
                        style="width: 40px; height: 50; margin-left: 2%; margin: 1% 1%; position: absolute;"
                    />
                    <h3 style = "margin-left: 14%">Big spender</h3> 
                </section>
                <under style="margin-left: 14%; font-style: italic;">Spend more than 10 000$ one month</under>
                
                <!-- Sjekker om $rowsql3 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php } 
                  if (mysqli_num_rows($rowsql3) > 0) 
                { ?>

                <section style="display:flex; margin-top: 20px">
                    <img
                        src="Pictures/smile.ico"
                        alt="welcome"
                        class="achievemntspicture"
                        style="width: 40px; height: 50; margin-left: 2%; margin: 1.5% 1%; position: absolute;"
                    />
                    <h3 style = "margin-left: 14%">Welcome!</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Made an account</under>
                
                <!-- Sjekker om $rowsql4 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php } 
                  if (mysqli_num_rows($rowsql4) > 0) 
                { ?>

                <section style="display:flex ; margin-top: 20px">
                    <img
                        src="Pictures/smart.jpg"
                        alt="smart investor"
                        class="achievementspicture"
                        style="width: 40px; height: 50; margin-left: 2%; margin: 1.4% 1%; position: absolute;"
                    />
                    <h3 style = "margin-left: 14%">Smart investor</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Have an additional source of income</under>
                
                <!-- Sjekker om $rowsql5 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php } 
                  if (mysqli_num_rows($rowsql5) > 0) 
                { ?>

                <section style="display:flex; margin-top: 20px">
                    <img
                        src="Pictures/investor.png"
                        alt="first budget"
                        class="achievemntspicture"
                        style="width: 40px; height: 50; margin-left: 2%; margin: 1.5% 1%; position: absolute;"
                    />
                    <h3 style = "margin-left: 14%">First budget</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Create your first budget</under>
                
                <!-- Sjekker om $rowsql6 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php } 
                  if (mysqli_num_rows($rowsql6) > 0) 
                { ?>

                <section style="display:flex; margin-top: 20px">
                    <img
                        src="Pictures/person.png"
                        alt="accomplished"
                        class="achievementspicture"
                        style="width: 40px; height: 50; margin-left: 2%; margin: 1.4% 1%; position: absolute;"
                    />
                    <h3 style = "margin-left: 14%">Accomplished</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Complete 5 achievements</under>
                
                <?php } else {
                    
                  }  ?>
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
