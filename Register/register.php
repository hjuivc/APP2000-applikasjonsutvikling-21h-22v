<?php
include '../connect_mysql/connect.php';
$conn = OpenCon();
echo "Connect Successfully";
echo "'\n";

$email = $_POST['email'];
$password = $_POST['password'];

// Run the create table query
$sql = "INSERT INTO customer(CustomerID, EMail, Password) VALUES('1', '$email','$password')";

 if(mysqli_query($conn,$sql)) {
	 echo "Registerd Successfully";
 } else {
	 echo mysqli_error($conn);
}
 
?>
