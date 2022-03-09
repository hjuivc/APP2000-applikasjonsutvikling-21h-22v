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

        <a href="profile.php" style="margin-top: 2%; margin-right: 1%; position: absolute; right: 0">
        <img 
            src="<?php echo $image_src;  ?>" 
            alt="profile_photo" 
            class="profile-logo"
        />
        </a>


    </header>

    <main>
      <form action="upload-budget.php" method="post">

        <!-- Sender første entrien i arrayen, slik at vi ikke får feil ved tomm form -->
        <input type="hidden" name="incomeIN[]" value="0">
        <input type="hidden" name="incomeIV[]" value="0">
        <input type="hidden" name="expenseIN[]" value="0">
        <input type="hidden" name="expenseIV[]" value="0">

        <h1 style="text-align: center;">Budget Planner</h1>
        <div class="grid-container">
          <div class="contentBoxBudgetPlanner" id="lol" style="margin: 50px 50px 50px 70px; padding: 50px;">
            <h2>Income</h2>
            <div id="incomeInputs">
            <!-- Her legger scriptet til forskjellige incomes -->
            </div>
            <button class="addButton" type="button" id="addButtonIncome"><i class="fas fa-plus-square"></i></button>
          </div>

          <div class="contentBoxBudgetPlanner" id="high" style="margin: 50px 70px 50px 50px; padding: 50px;">
            <h2>Expenses</h2>
            <div id="expenseInputs">
            <!-- Her legger scriptet til forskjellige expenses -->
            </div>
            <button class="addButton" type="button" id="addButtonExpense"><i class="fas fa-plus-square"></i></button>
          </div>
          
          <div class="contentBoxBudgetPlanner" style="margin: 50px 50px 50px 70px; padding: 50px;">
            <h2>Summary</h2>
            <label id="contentBox-budget-planner" style="margin-top: 50px; width: 180px;">Total income</label>
            <input type="number" id="totalIncome"/> <br>
            <label id="contentBox-budget-planner" style="width: 180px;">Total expenses</label>
            <input type="number" id="totalExpense"/> <br>
            <label id="contentBox-budget-planner" style="width: 180px;">Difference</label>
            <input type="number" id="difference" /> <br>

            <button class="submitButton" type="submit">Submit</button>
          </div>
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
          userData.push([
            incomeInputNames[i].value,
            incomeInputValues[i].value
          ]);
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

            "<input class='incomeInputName' type='text' name='incomeIN[]' value='" +
            incomeInput[i][0] +

            "'><input class='incomeInputValue' type='number' name='incomeIV[]' value='" +
            incomeInput[i][1] +
            "'></div>";
        }
        incomeInputsDiv.innerHTML = result;
      }

      // Legger til nye entries i expenseInput arrayen
      document.getElementById("addButtonIncome").onclick = function() {
        updateIncomeInput(0, false, true);
        updateSummary(false, true);
      }

      ////////////////////////////////////////////////////////////
      // Akkurat det samme for expense (Kanskje slå sammen senere)
      ////////////////////////////////////////////////////////////


      var expenseInput = [];
 
      function removeExpenseEntry(index) {
        updateExpenseInput(index, true);
        updateSummary(true, false);
      }

      // Funksjon for å oppdatere Expense inputsene
      function updateExpenseInput(index, doRemove, addData = false, skipRefresh = false) {
        let expenseInputsDiv   = document.getElementById("expenseInputs");
        let expenseInputNames  = document.getElementsByClassName("expenseInputName");
        let expenseInputValues = document.getElementsByClassName("expenseInputValue");

        // Med mindre vi har kjørt funksjonen med parameter skipRefresh som true
        // Refresher vi inputdataen vår utifra hva som faktisk finnes i tabellen,
        // Skipen er lagt til slik at det er mulig å tvinge inn default options på en
        // fornuftig måte.
        if(!skipRefresh) {

          // Henter inn data som er skrevet i formen
          var userData = [];
          for(var i = 0;i < expenseInputNames.length;i++) {
            // Legger til feltet hvis det ikke er tomt.
            userData.push([
              expenseInputNames[i].value,
              expenseInputValues[i].value
            ]);
          }

          // Oppdaterer dataen vår
          expenseInput = userData;
        }
        
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

            "<input class='expenseInputName' type='text' name='expenseIN[]' value='" +
            expenseInput[i][0] +
            "'><input class='expenseInputValue' type='number' name='expenseIV[]' value='" +
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
        var totalIncome = 0;
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

      // Kjører en gang for å legge inn en standard saving goal expense.
      expenseInput.push(["Saving goal",0]);
      updateExpenseInput(0, false, false, true);
    </script>
  </body>
</html>
