<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css" />
    <title>Finance Budget App</title>
  </head>
  <body>
    <header class="block" style="margin-top: 30px;">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="../pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main>
      <?php
        $selector   = $_GET["selector"];
        $validator  = $_GET["validator"];

        if(empty($selector) || empty($validator)) {
          echo "<h2>failed validation</h2>";
        
        } else {

          if(ctype_xdigit($selector) == true && ctype_xdigit($validator) == true) {

            ?>
            <form class="block" action="reset-password.php" method="post">
              <div class="contentBox">

                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">

                <label>New Password</label>
                <input type="password" name='password'>
                <label>Repeat New Password</label>
                <input type="password" name="confirm-password">
                <a><button type="submit" class="loginButton" name="reset-password-submit" value="Register">Change Password</button></a>
                <p>
                </p>
                <h3 style="margin-top: 100px;"><a href="../index.php">Back to the login page</a></h3>
              </div>
            </form>
            <?php
          }
        }

      ?>

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
          <a href="../contacts.php">Contact</a>
        </li>
      </ul>
      <p>&copy; 2021 Finance Budget App AS</p>
    </footer>
  </body>
</html>
