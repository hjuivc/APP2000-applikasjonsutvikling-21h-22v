<?php
	session_start();
	$email_old = $_SESSION['email'];

	include '../connect_mysql/connect.php';
	$conn = OpenCon();

	$sql = "SELECT * FROM Customer WHERE EMail='$email_old'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id = $row['CustomerID'];

    if(isset($_POST['delete_btn'])) {
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        if($email_old == $email) {
            try {
                /* Delete from image table */ 
                $sql4 = "DELETE FROM Images WHERE CustomerID ='$id'";
                mysqli_query($conn,$sql4); 

                /* Delete from user achievements table */ 
                $sql3 =	"DELETE FROM UserAchievement WHERE CustomerID = '$id'";
                mysqli_query($conn,$sql3); 

                /* Delete from budget transactions */
                $sql5 = "SELECT * FROM Budget WHERE CustomerID = '$id'";
                $result2 = $conn->query($sql5);
                $row2 = $result2->fetch_assoc();
                $id2 = $row2['budgetID'];

                $sql6 =	"DELETE FROM Transactions WHERE BudgetID = '$id2'";
                mysqli_query($conn,$sql6); 

                /* Delete from goals */
                $sql7 = "DELETE FROM Goal WHERE customerID = '$id'";
                mysqli_query($conn,$sql7); 

                /* Delete from budget table */ 
                $sql2 =	"DELETE FROM Budget WHERE CustomerID = '$id'";
                mysqli_query($conn,$sql2); 

                /* Delete from customer table */
                $sql =	"DELETE FROM Customer WHERE CustomerID = '$id'";
                mysqli_query($conn,$sql); 
                
                header("location:../index.php"); 
                session_destroy();
              } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("An error occured. Contact us for help!")';
                echo '</script>'; 
              }
        } else {
            echo '<script language="javascript">';
            echo 'alert("Wrong e-mail!")';
            echo '</script>'; 
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
    <title>Delete profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <header class="block">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="../Pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main>
      <div></div>
      <form class="block" action="delete.php" method="post">
        <div class="contentBox">
          <label style="margin-top: 50px;">Confirm e-mail</label>
          <input type="text" name='email' required>
          <a><button type="submit" class="loginButton" value="Delete" name="delete_btn">Delete account</button></a>
  
          <button style="margin-top: 100px;" class="loginButton"><a href="../profile.php">Back to profile</a></button>
        </div>
      </form>
    </main>

    <footer>
      <ul>
        <li>
          <a href="../home.php">Home</a>
        </li>
        <li>
          <a href="../faq.php">FAQ</a>
        </li>
        <li>
          <a href="../about.php">About</a>
        </li>
        <li>
          <a href="../contactForm/index.php">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>