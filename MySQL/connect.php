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