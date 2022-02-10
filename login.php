<?php
$username = $_GET['username'];
$password = $_GET['password'];
 
if($username == 'bjurneiz' and $password == '1234')
{    
    session_start();
    $_SESSION['sid']=session_id();
    echo "Logged in successfully";
}
?>


    
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_GET['username']);
      $mypassword = mysqli_real_escape_string($db,$_GET['password']); 
      
      $sql = "SELECT username, password FROM customer WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: home.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }