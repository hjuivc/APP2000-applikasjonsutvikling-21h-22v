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
        <img 
            src="pictures/profile_photo.jpg" 
            alt="profile_photo" 
            class="profile-logo"
        />
    </header>

    <main>
        <h1 style="text-align: center;">Budget Planner</h1>
        <div class="grid-container">
          <div class="contentBoxBudgetPlanner" id="lol" style="margin: 50px 50px 50px 70px; padding: 50px;">
            <h2>Income</h2>
            <form>
              <div id="incomeInputs">
              <!-- Her legger scriptet til forskjellige incomes -->
              </div>
              <button class="addButton" type="button" id="addButtonIncome"><i class="fas fa-plus-square"></i></button>
              <button class="submitButton">Submit</button>
            </form>
          </div>

          <div class="contentBoxBudgetPlanner" id="high" style="margin: 50px 70px 50px 50px; padding: 50px;">
            <h2>Expenses</h2>
            <form>
              <div id="expenseInputs">
              <!-- Her legger scriptet til forskjellige expenses -->
              </div>
              <button class="addButton" type="button" id="addButtonExpense"><i class="fas fa-plus-square"></i></button>
              <button class="submitButton">Submit</button>
            </form>
          </div>
          
          <div class="contentBoxBudgetPlanner" style="margin: 50px 50px 50px 70px; padding: 50px;">
            <h2>Summary</h2>
            <label id="contentBox-budget-planner" style="margin-top: 50px">Total income</label>
            <input type="number" id="totalIncome"/> <br>
            <label id="contentBox-budget-planner">Total expenses</label>
            <input type="number" id="totalExpense"/> <br>
            <label id="contentBox-budget-planner">Difference</label>
            <input type="number" id="difference" /> <br>
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
    <script>
      var incomeInput = [];
 
      function removeIncomeEntry(index) {
        updateIncomeInput(index, true);
        updateSummary(false, true);
      }

      // Funksjon for å oppdatere income inputsene
      function updateIncomeInput(index, doRemove, addData = false) {
        let incomeInputsDiv   = document.getElementById("incomeInputs");
        let incomeInputNames  = document.getElementsByClassName("incomeInputName");
        let incomeInputValues = document.getElementsByClassName("incomeInputValue");

        // Henter inn data som er skrevet i formen
        var userData = [];
        for(var i = 0;i < incomeInputNames.length;i++) {
          // Legger til feltet hvis det ikke er tomt.
          if(true) {
            userData.push([
              incomeInputNames[i].value,
              incomeInputValues[i].value
            ]);
          }
        }

        // Oppdaterer dataen vår
        incomeInput = userData;
        
        // Hvis vi skal fjerne en rad
        if(doRemove) {
          incomeInput.splice(index, 1);
        }

        // Hvis vi skal legge til en ny rad
        if(addData) {
          incomeInput.push(["Income",0]);
        }

        // Oppdaterer
        var result = "";
        for(var i = 0;i < incomeInput.length;i++) {
          result +=
            "<div class='plannerIncome'>" +
            "<button class='removeButton' type='button' onclick='removeIncomeEntry(" + i + ")'>" +
            "<i class='fas fa-minus-square'></i>" +
            "</button>" +

            "<input class='incomeInputName' type='text' value='" +
            incomeInput[i][0] +
            "'><input class='incomeInputValue' type='number' value='" +
            incomeInput[i][1] +
            "'>" +
            "</div>";
        }
        incomeInputsDiv.innerHTML = result;
      }

      // Legger til nye entries i expenseInput arrayen
      document.getElementById("addButtonIncome").onclick = function() {
        updateIncomeInput(0, false, true);
        updateSummary(false, true);
      }
      /////////////////////////////////
      // Akkurat det samme for expense
      /////////////////////////////////


      var expenseInput = [];
 
      function removeExpenseEntry(index) {
        updateExpenseInput(index, true);
        updateSummary(true, false);
      }

      // Funksjon for å oppdatere Expense inputsene
      function updateExpenseInput(index, doRemove, addData = false) {
        let expenseInputsDiv   = document.getElementById("expenseInputs");
        let expenseInputNames  = document.getElementsByClassName("expenseInputName");
        let expenseInputValues = document.getElementsByClassName("expenseInputValue");

        // Henter inn data som er skrevet i formen
        var userData = [];
        for(var i = 0;i < expenseInputNames.length;i++) {
          // Legger til feltet hvis det ikke er tomt.
          if(true) {
            userData.push([
              expenseInputNames[i].value,
              expenseInputValues[i].value
            ]);
          }
        }

        // Oppdaterer dataen vår
        expenseInput = userData;
        
        // Hvis vi skal fjerne en rad
        if(doRemove) {
          expenseInput.splice(index, 1);
        }

        // Hvis vi skal legge til en ny rad
        if(addData) {
          expenseInput.push(["expense",0]);
        }

        // Oppdaterer
        var result = "";
        for(var i = 0;i < expenseInput.length;i++) {
          result +=
            "<div class='plannerExpense'>" +
            "<button class='removeButton' type='button' onclick='removeExpenseEntry(" + i + ")'>" +
            "<i class='fas fa-minus-square'></i>" +
            "</button>" +

            "<input class='expenseInputName' type='text' value='" +
            expenseInput[i][0] +
            "'><input class='expenseInputValue' type='number' value='" +
            expenseInput[i][1] +
            "'>" +
            "</div>";
        }
        expenseInputsDiv.innerHTML = result;
      }

      // Legger til nye entries i expenseInput arrayen
      document.getElementById("addButtonExpense").onclick = function() {
        updateExpenseInput(0, false, true);
        updateSummary(true, false);
      }

      /////////////////////
      // Mer
      /////////////////////

      function parseInput(value) {
        let parsed = parseInt(value);
        var result = 0;

        if(!isNaN(parsed)) {
          result = parsed;
        }

        return result;
      }

      function updateSummary(updateIncome = false, updateExpense = false) {

        let totalIncomeDiv  = document.getElementById("totalIncome");
        let totalExpenseDiv = document.getElementById("totalExpense");
        let differenceDiv   = document.getElementById("difference");

        if(updateIncome) { updateIncomeInput(0, false); }
        if(updateExpense) { updateExpenseInput(0, false); }

        // Total income
        var totalincome = 0;
        for(var i = 0;i < incomeInput.length;i++) {
          totalIncome += parseInput(incomeInput[i][1]);
        }

        // Total Expenses
        var totalExpense = 0;
        for(var i = 0;i < expenseInput.length;i++) {
          totalExpense += parseInput(expenseInput[i][1]);
        }

        // Difference
        var difference = totalIncome - totalExpense;

        // Oppdater summary
        totalIncomeDiv.value  = totalIncome;
        totalExpenseDiv.value = totalExpense;
        differenceDiv.value   = difference;
      }

    </script>
  </body>
</html>
