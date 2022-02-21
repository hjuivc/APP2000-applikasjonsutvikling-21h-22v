<?php
include '../connect_mysql/connect.php';
$conn = OpenCon();

$email = $_POST['email'];
$phone = $_POST['phone'];
$home = $_POST['home'];
$id = 1;


// Run the update table query
$sql =	"UPDATE customer 
		SET 
			EMail = '$email', 
			phone = '$phone', 
			home = '$home' 
		WHERE CustomerID = '$id'";

if(mysqli_query($conn,$sql)) {
	 echo "Edited Successfully";
 } else {
	 echo mysqli_error($conn);
}

header("Location: ../profile.php")
 
?>