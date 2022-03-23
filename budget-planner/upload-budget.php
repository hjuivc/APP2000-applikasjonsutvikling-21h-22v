<?php

// Session
session_start();
$email = $_SESSION['email'];

include '../connect_mysql/connect.php';
$conn = OpenCon();

$sql 	= "SELECT * FROM Customer WHERE EMail='$email'";
$result = $conn->query($sql);
$row 	= $result->fetch_assoc();
$id 	= $row['CustomerID'];


// Sammle POST data
$incomeNames 	= $_POST["income-name"];
$incomeValues	= $_POST["income-value"];

$expenseNames	= $_POST["expense-name"];
$expenseValues	= $_POST["expense-value"];

$futureNames	= $_POST["future-name"];
$futureValues	= $_POST["future-value"];
$futureDates	= $_POST["future-date"];

// Se om det finnes gamle budgets for brukeren
$sql 	= "
	SELECT
	budgetID,
	customerID,
	MONTH(creationDate) as creationMonth,
	YEAR(creationDate) as creationYear 
	FROM budget WHERE customerID='$id'
";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	
	$bID 	= $row["budgetID"];
	$month 	= $row["creationMonth"];
	$year 	= $row["creationYear"];

	// Hvis budsjettet er gjeldene for samme mående
	if((int)$month == (int)date('m') && (int)$year == (int)date('Y')) {

		// Slett gammle transactions for gammle budsjetter (for samme mående)
		$sql = "DELETE FROM transactions WHERE budgetID='$bID'";
		$conn->query($sql);

		// Slett gammle busjetter for samme mående
		$sql = "DELETE FROM budget WHERE budgetID='$bID'";
		$conn->query($sql);
	}
}


// Last opp det nye budsjettet
$sql = "INSERT INTO budget (customerID, creationDate) VALUES ('$id', CURRENT_TIMESTAMP());";
if($conn->query($sql) === TRUE) {

	$lastID = $conn->insert_id;

	// Last opp alle de forskjellige transaksjonene som hører til
	// Income:
	$type = "income";
	for($i = 1;$i < count($incomeNames);$i++) {

		$sql = "
			INSERT INTO transactions (budgetID, transactionType, transactionValue, transactionName)
			VALUES ('$lastID', '$type', '$incomeValues[$i]', '$incomeNames[$i]');
		";
		$conn->query($sql);
	}

	// Expense:
	$type = "expense";
	for($i = 1;$i < count($expenseNames);$i++) {
		
		$sql = "
			INSERT INTO transactions (budgetID, transactionType, transactionValue, transactionName)
			VALUES ('$lastID', '$type', '$expenseValues[$i]', '$expenseNames[$i]');
		";
		$conn->query($sql);
	}
}

// Slett tidligere goals
$sql = "DELETE FROM goal WHERE customerID='$id'";
$conn->query($sql);

// Last opp goals
for($i = 1;$i < count($futureNames);$i++) {

	$sql = "
		INSERT INTO goal (customerID, goalName, goalValue, goalCreationDate, goalDate)
		VALUES ('$id', '$futureNames[$i]', '$futureValues[$i]', CURRENT_TIMESTAMP(), '$futureDates[$i]');
	";
	
	if(!$conn->query($sql)) {
		echo $conn->error;
	}
}

// achievement for første budget
$sqlachievement5=mysqli_query($conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '5'");

if(mysqli_num_rows($sqlachievement5) > 0) {
    //ingenting
}
else {
    $achivement5=mysqli_query($conn, "INSERT INTO userachievement(AchievementID, CustomerID) VALUES('5','$id')");
    //echo "Gratulere, du har opprettet ditt første budsjet!👍";
}

//achievement for brukt mer enn 10 000 cash money

$achivementValues = array_sum($expenseValues);

if($achivementValues > '10000') {
    $sqlachievement2=mysqli_query($conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '2'");
    if(mysqli_num_rows($sqlachievement2) > 0) {
		//ingenting
	}
        
	else {
		$achivement2=mysqli_query($conn, "INSERT INTO userachievement(AchievementID, CustomerID) VALUES('2','$id')");
		//echo "Gratulere, du har brukt mere en 10 000kr denne måneden!👍";
	}		
    
}

else{
    //ingenting
}

//achievement for fleire income sources


// achievement for å tjene meir enn man bruker
$achivementIncome = array_sum($incomeValues);

if($achivementValues < $achivementIncome) {
    $sqlachievement1=mysqli_query($conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '1'");
    if(mysqli_num_rows($sqlachievement1) > 0) {
        //ingenting
    }
	else {
		$achievement1=mysqli_query($conn, "INSERT INTO userachievement(AchievementID, CustomerID) VALUES('1','$id')");
        //echo "Gratulere, du har tjent mere en du skal bruke denne måneden!👍";
	}
}
else{
    //ingenting
}

//achievement for meir enn 1 income source
$incomeCount = count($incomeNames);

if($incomeCount > '1') {
    $sqlachievement4=mysqli_query($conn, "SELECT * FROM userachievement WHERE CustomerID = '$id' AND AchievementID = '4'");
    if(mysqli_num_rows($sqlachievement4) > 0) {
        //ingenting
    }
	else {
		$achievement4=mysqli_query($conn, "INSERT INTO userachievement(AchievementID, CustomerID) VALUES('4','$id')");
        //echo "Gratulere, du har mer enn en 👍";
	}
}
else{
    //ingenting
}


echo "<script>
	alert('New budget uploaded');
	window.location.href='budget-planner.php';
</script>";