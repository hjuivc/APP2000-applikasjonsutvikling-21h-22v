
var incomeInput = [];
 
function removeIncomeEntry(index) {
  updateIncomeInput(index, true);
  updateSummary(false, true);
}

// Funksjon for å oppdatere income inputsene
function updateIncomeInput(index, doRemove, addData = false, skipRefresh = false) {
  let incomeInputsDiv   = document.getElementById("incomeInputs");
  let incomeInputNames  = document.getElementsByClassName("incomeInputName");
  let incomeInputValues = document.getElementsByClassName("incomeInputValue");

  if(!skipRefresh) {

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
  }
        
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