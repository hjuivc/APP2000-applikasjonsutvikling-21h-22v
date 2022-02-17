<?php
   include '../connect_mysql/connect.php';
   $conn = OpenCon();

   $email = $_POST['email'];  
   $password = $_POST['password'];  
 
   //to prevent from mysqli injection  
   $email = stripcslashes($email);  
   $password = stripcslashes($password);  
   $email = mysqli_real_escape_string($conn, $email);  
   $password = mysqli_real_escape_string($conn, $password);  
 
   $sql = "SELECT * FROM Customer WHERE EMail = '$email' AND Password = '$password'"; 
   $result = mysqli_query($conn, $sql); 
   $count = mysqli_num_rows($result); 
                 
   if($count > 0){  
       header("Location: ../home.php");  
   }  
   else{  
       echo "<h1><center> Login failed. Invalid email or password.</center></h1>";
       echo "<h1><center> Redirecting to front page in 5 seconds...</center></h1>";
       header("Refresh: 5; url=../index.php");    
   }   
?>