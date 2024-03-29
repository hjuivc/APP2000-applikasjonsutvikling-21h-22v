<?php
  // Ny kode for å lage session og logge inn på konto
  session_start();
  if(isset($_SESSION['email'])) {
    header("location: home.php");
    die();
  }
  // Connect to database    
  include 'connect_mysql/connect.php';
  $conn = OpenCon();
  if($conn) {
    if(isset($_POST['login_btn'])) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $password=mysqli_real_escape_string($conn,$_POST['password']);
      $password=md5($password); //Remember we hashed password before storing last time
      $sql="SELECT * FROM Customer WHERE email='$email' AND password='$password'";
      $result=mysqli_query($conn,$sql);
      
      if($result){
        if( mysqli_num_rows($result)>=1) {
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['email']=$email;
            header("location:home.php");
        } else{
          echo '<script language="javascript">';
          echo 'alert("Email and password combination is not correct!")';
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
    <link rel="stylesheet" href="main.css" />
    <title>Finance Budget App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header class="block">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="Pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main class="block" style="flex-wrap: wrap-reverse;">
    <?php
    if(isset($_SESSION['message'])) {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
    ?>
      <div class="contentBox" style="max-width: 640px;">
        <h2>Why choose finance budgeting app &#128525</h2>
        <ul style="margin: 10px;">
          <li style="margin-bottom: 25px; font-size: 20px;">If you are not able to keep track of your economy and spendings &#128184</li>
          <li style="margin-bottom: 25px; font-size: 20px;">You do not have a place to organize your spendings &#128185</li>
          <li style="margin-bottom: 25px; font-size: 20px;">You want to have a tool that you can use together with family and friends &#128106</li>
          <li style="margin-bottom: 25px; font-size: 20px;">You want to have fun and have a gameified experience and get achievements while saving money &#127918</li>
          <li style="margin-bottom: 25px; font-size: 20px;">Safe place to keep your finance information secure &#128272</li>
        </ul>
      
      </div>
      <form class="block" action="index.php" method="post">
        <div class="contentBox" style="max-width: 320px;">
          <label style="margin-top: 50px;">E-mail</label>
          <input type="text" name='email' required>
          <label>Password</label>
          <input type="password" name='password' required>
          <a><button type="submit" value="login" class="loginButton" name="login_btn">Log in</button></a>
          <button style="margin-bottom: 10px;"class="loginButton"><a href="Register/register.php">Register</a></button>
          <button style="margin-top: 5px;"class="loginButton"><a href="forgot-password/forgot-password.php">Forgot password</a></button>
        </div>
      </form>
    </main>

    <footer>
      <ul>
        <li>
          <a href="offlineSites/faqOffline.php">FAQ</a>
        </li>
        <li>
          <a href="offlineSites/aboutOffline.php">About</a>
        </li>
        <li>
          <a href='offlineSites/contactFormOffline/index.php'>Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>
