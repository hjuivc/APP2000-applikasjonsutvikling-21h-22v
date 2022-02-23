<?php
	session_start();
	$email_old = $_SESSION['email'];

	include '../connect_mysql/connect.php';
	$conn = OpenCon();

	$sql = "SELECT * FROM Customer WHERE EMail='$email_old'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id = $row['CustomerID'];
	if(isset($_POST['update_btn'])) {
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$phone=mysqli_real_escape_string($conn,$_POST['phone']);
		$home=mysqli_real_escape_string($conn,$_POST['home']); 
    
    try {
      $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home' WHERE CustomerID = '$id'";
      mysqli_query($conn,$sql);  
      $_SESSION['email']=$email;
      echo '<script language="javascript">';
      echo 'alert("Your profile is now updated!")';
      echo '</script>'; 
      header("location:../profile.php");
    } catch (Exception $e) {
      echo '<script language="javascript">';
      echo 'alert("That e-mail is already owned by someone else!")';
      echo '</script>'; 
    }
  } 
?>


	<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../main.css" />
    <title>Finance Budget App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <header class="block" style="margin-top: 30px;">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="../pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main>
      <div></div>
      <form class="block" action="edit.php" method="post">
        <div class="contentBox">
          <label style="margin-top: 50px;">Confirm/Update e-mail</label>
          <input type="text" name='email' required>
          <!-- Må legges inn adresse og telefonnr i databasen så det også kan edites -->
          <label>New phone number</label>
          <input type="text" name='phone'>
          <label>New address</label>
          <input type="text" name='home'>
          <a><button type="submit" class="loginButton" value="Edit" name="update_btn">Save changes</button></a>
          <p>
          </p>
          <h3 style="margin-top: 100px;"><a href="../profile.php">Cancel</a></h3>
        </div>
      </form>
    </main>

    <footer>
      <ul>
        <li>
          <a href="../home.html">Home</a>
        </li>
        <li>
          <a href="../faq.html">FAQ</a>
        </li>
        <li>
          <a href="../about.html">About</a>
        </li>
        <li>
          <a href="../contacts.html">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>