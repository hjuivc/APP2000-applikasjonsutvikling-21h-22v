<?php
	session_start();
	$email_old = $_SESSION['email'];

	include '../connect_mysql/connect.php';
	$conn = OpenCon();

	$sql = "SELECT * FROM Customer WHERE EMail='$email_old'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id = $row['CustomerID'];
  $phone_old = $row['phone'];
  $home_old = $row['home'];
  $title_old = $row['title'];
  $name_old = $row['name'];

  $tooltipsavechanges = "You always have to enter e-mail to make changes. Enter a different e-mail to change the current e-mail address.";

	if(isset($_POST['update_btn'])) {
    if($_POST['email'] == True && $_POST['phone'] == True && $_POST['home'] == True && $_POST['title']  == True && $_POST['name']) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']); 
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      $name=mysqli_real_escape_string($conn,$_POST['name']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True && $_POST['home'] == True && $_POST['title'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']); 
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['home'] == True && $_POST['title'] == True && $_POST['name'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      $name=mysqli_real_escape_string($conn,$_POST['name']);

      $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home', title = '$title', name = '$name' WHERE CustomerID = '$id'";
      mysqli_query($conn,$sql);  
      $_SESSION['email']=$email_old;
      header('Location: ../profile.php'); 
      
    } elseif($_POST['email'] == True && $_POST['home'] == True && $_POST['title'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True && $_POST['title'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home_old', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True && $_POST['home'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']); 
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home_old', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True && $_POST['home'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home', title = '$title_old', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True && $_POST['title'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home_old', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $name=mysqli_real_escape_string($conn,$_POST['name']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home_old', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['home'] == True && $_POST['title'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['home'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $name=mysqli_real_escape_string($conn,$_POST['name']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['title'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      $name=mysqli_real_escape_string($conn,$_POST['name']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home_old', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['home'] == True && $_POST['title'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $title=mysqli_real_escape_string($conn,$_POST['title']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['title'] == True && $_POST['name'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      $name=mysqli_real_escape_string($conn,$_POST['name']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home_old', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['home'] == True && $_POST['name'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $name=mysqli_real_escape_string($conn,$_POST['name']); 
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['phone'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone', home = '$home_old', title = '$title_old', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['home'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home', title = '$title_old', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      } 
    } elseif($_POST['email'] == True && $_POST['title'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home_old', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True && $_POST['name'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home_old', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['home'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home', title = '$title_old', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['title'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home_old', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True && $_POST['name'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home_old', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['home'] == True && $_POST['title'] == True) {
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone_old', home = '$home', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['home'] == True && $_POST['name'] == True) {
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone_old', home = '$home', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['title'] == True && $_POST['name'] == True) {
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone_old', home = '$home_old', title = '$title', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['email'] == True) {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email', phone = '$phone_old', home = '$home_old', title = '$title_old', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['phone'] == True) {
      $phone=mysqli_real_escape_string($conn,$_POST['phone']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone', home = '$home_old', title = '$title_old', name = '$name_old's WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['home'] == True) {
      $home=mysqli_real_escape_string($conn,$_POST['home']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone_old', home = '$home', title = '$title_old', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['title'] == True) {
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone_old', home = '$home_old', title = '$title', name = '$name_old' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
      }
    } elseif($_POST['name'] == True) {
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      
      try {
        $sql =	"UPDATE Customer SET EMail = '$email_old', phone = '$phone_old', home = '$home_old', title = '$title_old', name = '$name' WHERE CustomerID = '$id'";
        mysqli_query($conn,$sql);  
        $_SESSION['email']=$email_old;
        header('Location: ../profile.php'); 
      } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("That e-mail is already owned by someone else!")';
        echo '</script>'; 
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
    <title>Edit profile</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <header class="block">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="../Pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main>
      <div></div>
      <form class="block" action="edit.php" method="post">

        <div class="contentBox">
          <label style="margin-top: 50px;">Update/confirm e-mail</label>
          <input type="text" name='email'>
          <!-- Må legges inn adresse og telefonnr i databasen så det også kan edites -->
          <label>Update phone number</label>
          <input type="text" name='phone'>
          <label>Update address</label>
          <input type="text" name='home'>
          <label>Update title</label>
          <input type="text" name='title'>
          <label>Update name</label>
          <input type="text" name='name'>
          <p class="tooltip" data-tooltip="<?php echo $tooltipsavechanges ?>">🛈 How to save changes</p>
          <a><button type="submit" class="loginButton" value="Edit" name="update_btn">Save changes</button></a>
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
          <a href="../contactForm/contactform.php">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>