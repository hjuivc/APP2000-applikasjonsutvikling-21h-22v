<?php

$conn = mysqli_connect('finance-budget-app.database.windows.net','leder','Gruppe654321','financebudgetapp');

if(!$conn)
{
	die('Connection failed!'.mysqli_error($conn));
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Customer(Id, Username, EMail, Password) VALUES(1, '$username', '$email','$password',
 '$pwd')";

if(mysqli_query($conn,$sql))
{
	echo "Registerd Successfully";
}
else
{
	echo mysqli_error($conn);
}

?>