<?php
session_start();
// Connect to database    
include '../connect_mysql/connect.php';
$conn = OpenCon();

if(isset($_POST['register_btn'])) {
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password2=mysqli_real_escape_string($conn,$_POST['password2']);  
    $query = "SELECT * FROM Customer WHERE email = '$email'";
    $rowSQL = mysqli_query( $conn, "SELECT MAX( CustomerID ) AS max FROM `Customer`;" );
    $row = mysqli_fetch_array( $rowSQL );
    $largestNumber = $row['max'] += 1;
    $result=mysqli_query($conn,$query);
      if($result) {
        if( mysqli_num_rows($result) > 0) {
                echo '<script language="javascript">';
                echo 'alert("Email already exists!")';
                echo '</script>';
        } else {
            if($password==$password2) {           //Create User
                $password=md5($password); //hash password before storing for security purposes
                $sql="INSERT INTO Customer(CustomerID, EMail, Password ) VALUES('$largestNumber','$email','$password')"; 
                mysqli_query($conn,$sql);
                $sql2="INSERT INTO images(CustomerID, name) VALUES('$largestNumber','default.jpg')";
                mysqli_query($conn,$sql2);
                //Legger inn achievementen "Welcome" til den nye brukeren
                $sql3="INSERT INTO userachievement(AchievementID,CustomerID) VALUES('3','$largestNumber')";
                mysqli_query($conn,$sql3);

                $_SESSION['message']="You are now logged in"; 
                $_SESSION['email']=$email;
                header("location:../home.php");  //redirect home page
            } else {
                echo '<script language="javascript">';
                echo 'alert("Passwords did not match!")';
                echo '</script>'; 
            }
          }
      }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Register</title>
  </head>
  <body>
    <header class="block">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="../Pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main>
        <?php
        if(isset($_SESSION['message'])) {
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
        ?>
      <div></div>
      <form class="block" action="register.php" method="post">
        <div class="contentBox">
          <label style="margin-top: 50px;">Email</label>
          <input type="text" name='email' required>
          <label>Password</label>
          <input type="password" name='password' required>
          <label>Confirm Password</label>
          <input type="password" name='password2' required> <!-- Har ikke laget noe som sjekker om passordene er like. Kan legges til seinere-->
          <a><button type="submit" class="loginButton" value="Register" name='register_btn'>Register</button></a>
          <p>
          </p>
          <button class="loginButton"><a href="../index.php">Back to login</a></button>
        </div>
      </form>
    </main>

    <footer>
      <ul>
        <li>
          <a href="../index.php">Home</a>
        </li>
        <li>
          <a href="../offlineSites/faqOffline.php">FAQ</a>
        </li>
        <li>
          <a href="../offlineSites/aboutOffline.php">About</a>
        </li>
        <li>
          <a href="../offlineSites/contactFormOffline/index.php">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>
