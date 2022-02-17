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
            <a href="home.html"
              ><div class="block sideMenuItem">
                <img
                alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/14443/home.svg"
                  class="sideMenuIcon"
                />Home
              </div></a
            >
            <a href="budget.html"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/17167/pie-chart.svg"
                  class="sideMenuIcon"
                />Budget
              </div></a
            >
            <a href="budget-planner.html"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/11983/from-a-to-z.svg"
                  class="sideMenuIcon"
                />Budget planner
              </div></a
            >
            <a href="achievements.html"
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
            <a href="profile.html"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/7025/user.svg"
                  class="sideMenuIcon"
                />Profile
              </div></a
            >
            <a href="settings.html"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/198090/gear.svg"
                  class="sideMenuIcon"
                />Settings
              </div></a
            >
            <a href="faq.html"
              ><div class="block sideMenuItem">
                <img
                  alt="side_menu_icon"
                  src="https://www.svgrepo.com/show/348371/help.svg"
                  class="sideMenuIcon"
                />Help
              </div></a
            >
            <a href="index.html"
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

    <main style="max-width: calc(1100px + 550px + 50px); margin: auto;">
      <h1 style="text-align: center;">Budget</h1>
      <div class="block" style="width: 100%; flex-wrap: wrap; gap: 50px;">
        <div class="contentBox" style="max-width: 1100px; width: 100%; margin: 0;">
          <h2>Monthly budget</h2>
          <canvas id="largeCanvas"></canvas>
        </div>
        <div class="block" style="max-width: 550px; flex-wrap: wrap; gap: 50px;">
          <div class="contentBox" style="margin: 0; min-width: 100%;">
            <h2>Monthly income</h2>
            <canvas id="smallUpperCanvas"></canvas>
          </div>
          <div class="contentBox" style="margin: 0; min-width: 100%;">
            <h2>Card balances</h2>
            <canvas id="smallLowerCanvas"></canvas>
          </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>

      const TYPE_BAR_HORISONTAL   = 0;
      const TYPE_BAR_VERTICAL     = 1;
      const TYPE_LINE             = 2;

      Chart.defaults.font.family  = "sans-serif";
      Chart.defaults.font.size    = 18;
      Chart.defaults.color        = "#262220";

      function createChart(canvas, names, data, type) {

        var chartType, axis, showLegend;

        switch(type) {

          case TYPE_BAR_HORISONTAL:
            chartType   = "bar";
            axis        = 'y';
            showLegend  = false;
            break;

          case TYPE_BAR_VERTICAL:
            chartType   = "bar";
            axis        = 'x';
            showLegend  = false;
            break;

          case TYPE_LINE:
            chartType   = "line";
            axis        = 'x';
            showLegend  = false;
            break;
        }

        var myData = {
          labels: names,
          datasets: [{
            data: data,
            backgroundColor: "#262220"
          }]
        };

        return new Chart(canvas, {
          type: chartType,
          data: myData,
          options: {
            indexAxis: axis,
            plugins: {
              legend: {
                display: showLegend
              }
            }
          }
        });
      }

      // Data vi kommer til å hente fra databasen

      // Monthly budget
      var largeCanvas = document.getElementById("largeCanvas").getContext("2d");
      createChart(
        largeCanvas, 
        ["Sparing", "mat", "leie", "transport", "andre"], 
        [5000, 4000, 10000, 7000, 2000], 
        TYPE_BAR_HORISONTAL
      );

      // Monthly income
      var smallUpperCanvas = document.getElementById("smallUpperCanvas").getContext("2d");
      createChart(
        smallUpperCanvas, 
        ["Lønn", "Uber", "Gambling profit"], 
        [50000, 8000, 100000], 
        TYPE_BAR_VERTICAL
      );

      // Card balances
      var smallLowerCanvas = document.getElementById("smallLowerCanvas").getContext("2d");
      createChart(
        smallLowerCanvas, 
        ["10.05", "11.05", "12.05", "13.05", "14.05", "15.05", "16.05", "17.05", "18.05", "19.05", "20.05", "21.05"], 
        [100000, 97500, 96403, 85931, 76301, 156043, 156043, 155371, 150379, 140579, 130271, 60000], 
        TYPE_LINE
      );


    </script>
  </body>
</html>
