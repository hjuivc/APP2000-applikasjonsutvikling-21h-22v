<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../main.css" />
    <title>Finance Budget App</title>
  </head>
  <body>
    <header class="block" style="margin-top: 30px;">
      <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
      <img src="../pictures/logo.png" alt="logo" width="300" height="300" />
    </header>

    <main>
      <div></div>
      <form class="block" action="forgot.php" method="post">
        <div class="contentBox">
          <label style="margin-top: 50px;">Email</label>
          <input type="text" name='email'>
          <a><button type="submit" class="loginButton" name="forgot-submit">Recover</button></a>
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
