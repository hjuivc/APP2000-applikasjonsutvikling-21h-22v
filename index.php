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
    <link rel="stylesheet" href="main.css" />
    <title>Finance Budget App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <header class="block" style="margin-top: 30px;">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main class="block" style="flex-wrap: wrap-reverse;">
    <?php
    if(isset($_SESSION['message'])) {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
    ?>
      <div class="contentBox" style="max-width: 640px;">
        <h2>Why finance budgeting app</h2>
        <p>
          Are you not able to keep track of your economy and spendings? Do 
            you want to save more money? Or do you just need a place to organize your spendings?
             Then Finance Budgeting App is for you!
        </p>
        <p>
          The Finance Budgeting App was created 2022 and are maintained by six IT
             students attending USN Ringerike. Students are known to have a tight budget,
              which is something we all had experienced
        </p>
        <p>
          Therefore, we wanted to make this app so we could both help ourselves and others
             wether you are a student or not. If you have any questions about The Finance Budgeting
              App, please feel free to <a href="contactForm/index.php"><u>contact and ask us!</u></a>
        </p>
      </div>
      <form class="block" action="index.php" method="post">
        <div class="contentBox" style="max-width: 320px;">
          <label style="margin-top: 50px;">E-mail</label>
          <input type="text" name='email' required>
          <label>Password</label>
          <input type="password" name='password' required>
          <a><button type="submit" value="login" class="loginButton" name="login_btn">Log in</button></a>
          <button class="loginButton"><a href="register/register.php">Register</a></button>
          <h3 style="margin-top: 100px;"><a href="forgot-password/forgot-password.php">Forgot password</a></h3>
        </div>
      </form>
    </main>

    <footer>
      <ul>
        <li>
          <a href="home.php">Home</a>
        </li>
        <li>
          <a href="faq.php">FAQ</a>
        </li>
        <li>
          <a href="about.php">About</a>
        </li>
        <li>
          <a href='contactForm/index.php'>Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>
