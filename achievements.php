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
            <a href="index.php"
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
        <h1 style="text-align: center;">Achievements</h1>
        <div class="block">
            <div class="contentBoxAchievements" style="max-width: 500px; width: 100%; height: fit-content;">
                <h2>Overview</h2>
                <label id="contentBox-achievements" style="width: 200px;margin: 10px;">Total Achievements</label>
                <!-- Legger inn som input for å visualisere hva som skal inn -->
                <input style="" type="text" />
                <!--<output name="*"></output> </br> -->
                
                <label style="width: 200px;margin: 10px;">Totale Percentage</label>
                <!-- Legger inn som input for å visualisere hva som skal inn -->
                <input type="text" />

                <label style="margin: 10px;">Member Rank</label>
                <img
                    src="Pictures/rank.png"
                    alt="member rank"
                    class="achievementspicture"
                    style="width: 40px; height: 40; margin-left: 20%; margin-top: 5%;"
                />
            </div>

            <div class="contentBoxAchievements" style="max-width: 500px; width: 100%; padding: 10px;">
            <h2>Unlocked</h2>

            <?php 
            // sjekker databasen på 2 kriterier og henter ut rowsa om kriterien er møtt
            // må bytte ut customer id "16" med session iden!!!!!
              $rowsql1 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '16' AND AchievementID = '1'");
              $rowsql2 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '16' AND AchievementID = '2'");
              $rowsql3 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '16' AND AchievementID = '3'");
              $rowsql4 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '16' AND AchievementID = '4'");
              $rowsql5 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '16' AND AchievementID = '5'");
              $rowsql6 = mysqli_query( $conn, "SELECT * FROM userachievement WHERE CustomerID = '16' AND AchievementID = '6'");
            ?>
            
            <!-- Sjekker om $rowsql1 inneholder data, om det er innhold i spørringen sender den ut html koden -->
            <?php if (mysqli_num_rows($rowsql1) > 0) 
            { ?>

                <section style="display:flex"> 
                    <img
                        src="Pictures/graph.png"
                        alt="graph"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%; display: inline-block; margin: 1% 3%;"
                    />
                    <h3>Net positive</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Earn more than you spend</under>
                
                <!-- Sjekker om $rowsql2 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php }
                  if (mysqli_num_rows($rowsql2) > 0) 
                { ?>

                <section style="display:flex; margin-top: 20px">
                    <img
                        src="Pictures/bigspender.png"
                        alt="big spender"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%; display: inline-block; margin: 1% 3%;"
                    />
                    <h3>Big spender</h3> 
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
                        style="width: 40px; height: 40; margin-left: 2%; display: inline-block; margin: 1% 3%;"
                    />
                    <h3>Welcome!</h3>
                </section>
                <under style="margin-left: 14%; font-style: italic;">Made an acoount</under>
                
                <!-- Sjekker om $rowsql4 inneholder data, om det er innhold i spørringen sender den ut html koden -->
                <?php } 
                  if (mysqli_num_rows($rowsql4) > 0) 
                { ?>

                <section style="display:flex ; margin-top: 20px">
                    <img
                        src="Pictures/smart.jpg"
                        alt="smart investor"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%; display: inline-block; margin: 1% 3%;"
                    />
                    <h3>Smart investor</h3>
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
                        style="width: 40px; height: 40; margin-left: 2%; display: inline-block; margin: 1% 3%;"
                    />
                    <h3>First budget</h3>
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
                        style="width: 40px; height: 40; margin-left: 2%; display: inline-block; margin: 1% 3%;"
                    />
                    <h3>Accomplished</h3>
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
