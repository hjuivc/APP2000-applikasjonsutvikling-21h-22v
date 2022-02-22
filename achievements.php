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
            <a href="home.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/14443/home.svg"
                  class="sideMenuIcon"
                />Home
              </div></a
            >
            <a href="budget.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/17167/pie-chart.svg"
                  class="sideMenuIcon"
                />Budget
              </div></a
            >
            <a href="budget-planner.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/11983/from-a-to-z.svg"
                  class="sideMenuIcon"
                />Budget planner
              </div></a
            >
            <a href="achievements.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/84275/trophy.svg"
                  class="sideMenuIcon"
                />Achievements
              </div></a
            >
          </div>
          <div style="align-self: flex-end; margin-bottom: 40px;">
            <a href="profile.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/7025/user.svg"
                  class="sideMenuIcon"
                />Profile
              </div></a
            >
            <a href="settings.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/198090/gear.svg"
                  class="sideMenuIcon"
                />Settings
              </div></a
            >
            <a href="faq.html"
              ><div class="block sideMenuItem">
                <img
                  src="https://www.svgrepo.com/show/348371/help.svg"
                  class="sideMenuIcon"
                />Help
              </div></a
            >
            <a href="index.html"
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
        
        <img 
            src="pictures/profile_photo.jpg" 
            alt="profile_photo" 
            class="profile-logo"
        />
        
      </header>

      <main>
        <h1 style="text-align: center;">Achievements</h1>
        <div class="block">
            <div class="contentBoxAchievements" style="max-width: 500px; width: 100%; height: fit-content;">
                <h2>Overview</h2>
                <label id="contentBox-achievements" style="margin-top: 50px;">Total Achievements</label>
                <!-- Legger inn som input for å visualisere hva som skal inn -->
                <input type="text" />
                <!--<output name="*"></output> </br> -->
                
                <label>Totale Percentage</label>
                <!-- Legger inn som input for å visualisere hva som skal inn -->
                <input type="text" />

                <label style="margin-bottom: 10%;">Member Rank</label>
                <img
                    src="Pictures/rank.png"
                    alt="member rank"
                    class="achievementspicture"
                    style="width: 40px; height: 40; margin-left: 20%; margin-top: 5%;"
                />
            </div>
        
            <div class="contentBoxAchievements" style="max-width: 500px; width: 100%;">
                <h2>Unlocked</h2>
                <section> 
                    <img
                        src="Pictures/graph.png"
                        alt="graph"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%;"
                    />
                    <h3>Net positive</h3>
                </section>
                <under style="margin-left: 15%; font-style: italic;">Earn more than you spend</under>
                <section>
                    <img
                        src="Pictures/bigspender.png"
                        alt="big spender"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%;"
                    />
                    <h3>Big spender</h3> 
                </section>
                <under style="margin-left: 15%; font-style: italic;">Spend more than 10 000$ one month</under>
                <section>
                    <img
                        src="Pictures/smile.ico"
                        alt="welcome"
                        class="achievemntspicture"
                        style="width: 40px; height: 40; margin-left: 2%;"
                    />
                    <h3>Welcome!</h3>
                </section>
                <under style="margin-left: 15%; font-style: italic;">Made an acoount</under>
                <section>
                    <img
                        src="Pictures/smart.jpg"
                        alt="smart investor"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%;"
                    />
                    <h3>Smart investor</h3>
                </section>
                <under style="margin-left: 15%; font-style: italic;">Have an additional source of income</under>
                <section>
                    <img
                        src="Pictures/investor.png"
                        alt="first budget"
                        class="achievemntspicture"
                        style="width: 40px; height: 40; margin-left: 2%;"
                    />
                    <h3>First budget</h3>
                </section>
                <under style="margin-left: 15%; font-style: italic;">Create your first budget</under>
                <section>
                    <img
                        src="Pictures/person.png"
                        alt="accomplished"
                        class="achievementspicture"
                        style="width: 40px; height: 40; margin-left: 2%;"
                    />
                    <h3>Accomplished</h3>
                </section>
                <under style="margin-left: 15%; font-style: italic;">Complete 10 achievements</under>
            </div>   
        </div>
      </main>

      <footer>
        <ul>
          <li>
            <a href="home.html">Home</a>
          </li>
          <li>
            <a href="faq.html">FAQ</a>
          </li>
          <li>
            <a href="about.html">About</a>
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