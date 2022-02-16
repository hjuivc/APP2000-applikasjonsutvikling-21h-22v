<?php
include '../connect_mysql/connect.php';
$conn = OpenCon();

$email = $_POST['email'];
$password = $_POST['password'];

// Generate new ID number
$rowSQL = mysqli_query( $conn, "SELECT MAX( CustomerID ) AS max FROM `Customer`;" );
$row = mysqli_fetch_array( $rowSQL );
$largestNumber = $row['max'] += 1;

// Run the create table query
$sql = "INSERT INTO customer(CustomerID, EMail, Password) VALUES('$largestNumber', '$email','$password')";

 if(mysqli_query($conn,$sql)) {
	 echo "Registerd Successfully";
 } else {
	 echo mysqli_error($conn);
}

header("Location: ../index.html")
 
?>
