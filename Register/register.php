<?php
include '../connect_mysql/connect.php';
$conn = OpenCon();

$email = $_POST['email'];
$password = $_POST['password'];

// Run the create table query
$sql = "INSERT INTO customer(CustomerID, EMail, Password) VALUES('5', '$email','$password')";

 if(mysqli_query($conn,$sql)) {
	 header("location:../index.html");
 } else {
	 echo mysqli_error($conn);
}
 
?>
