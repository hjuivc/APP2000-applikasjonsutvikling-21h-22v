<?php

function OpenCon() {
	$dbhost = 'finance-budget-app.mysql.database.azure.com';
	$dbuser = 'FinanceBudgetApp';
	$dbpass = 'Gruppe654321';
	$db = 'financebudgetapp';
	
	//Establishes the connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
	return $conn;
	}
	
   function CloseCon($conn)
	{
	$conn -> close();
	}


// For å resete passord
function connectMysqli() {

	$dbhost = 'finance-budget-app.mysql.database.azure.com';
	$dbuser = 'FinanceBudgetApp';
	$dbpass = 'Gruppe654321';
	$db 	= 'financebudgetapp';

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

	if(!$connect) {
		die("Connection failed: " . mysqli_connect_error());
	}

	return $connect;

}	  
?>
