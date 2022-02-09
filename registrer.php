<?php
$host = 'finance-budget-app.mysql.database.azure.com';
$username = 'FinanceBudgetApp';
$password = 'Gruppe654321';
$db_name = 'financebudgetapp';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Customer(Id, Username, EMail, Password) VALUES(1, '$username', '$email','$password')";

if(mysqli_query($conn,$sql))
{
	echo "Registerd Successfully";
}
else
{
	echo mysqli_error($conn);
}

?>