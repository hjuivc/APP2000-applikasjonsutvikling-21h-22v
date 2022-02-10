<?php
$host = 'finance-budget-app.mysql.database.azure.com';
$username = 'FinanceBudgetApp';
$password = 'Gruppe654321';
$db_name = 'financebudgetapp';

//Establishes the connection
$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn)
{
	die('Connection failed!'.mysqli_error($conn));
}

$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];

// Run the create table query
$sql = "INSERT INTO customer(CustomerID, Username, EMail, Password) VALUES('1', '$username', '$email','$password')";

 if(mysqli_query($conn,$sql))
 {
	 echo "Registerd Successfully";
 }
 else
 {
	 echo mysqli_error($conn);
 }
 
 ?>
/*
