<?php
include '../connect_mysql/connect.php';
$conn = OpenCon();

$email = $_POST['email'];
$password = $_POST['password'];
/*$password_confirm = $_POST['password_confirm'];

if ($_POST['password']!= $_POST['password_confirm'])
 {
     echo("Oops! Password did not match! Try again. ");
 }
*/
// Generate new ID number
$rowSQL = mysqli_query( $conn, "SELECT MAX( CustomerID ) AS max FROM `Customer`;" );
$row = mysqli_fetch_array( $rowSQL );
$largestNumber = $row['max'] += 1;

// Run the create table query
$select = mysqli_query($conn, "SELECT * FROM customer WHERE email = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    exit('This email address is already used!');
}
else{
	$sql = mysqli_query( $conn, "INSERT INTO customer(CustomerID, EMail, Password) VALUES('$largestNumber', '$email','$password')");
    echo('Record Entered Successfully');
}

header("Location: ../index.php")
 
?>
