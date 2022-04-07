<?php if (isset($message)) : ?>
    <div class="alert alert-success">
        <?= $message ?>
    </div>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleOffline.css"/>
    <title>Finance Budget App</title>
</head>
    <body>
    <header class="block" style="margin-top: 30px;">
        <!-- <h1 class="myTextFont">Finance Budget App</h1> -->
        <img src="Pictures/logo.png" alt="logo" width="300" height="300" />
    </header>
    <main>

    <!-- Lagt inn autocomplete="off" for å fjerne synlighet av tidligere info -->
    <form action="index.php" method="post" autocomplete="off">
        <header2>
            <h1>Contact Us</h1>
        </header2>

        <div>
            <label for="name">Name:<br></label>
            <input type="text" value="<?= $inputs['name'] ?? '' ?>" name="name" id="name">
            <small><?= $errors['name'] ?? '' ?></small>
        </div>

        <div>
            <label for="email">Email:<br></label>
            <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>">
            <small><?= $errors['email'] ?? '' ?></small>
        </div>

        <div>
            <label for="subject">Subject:<br></label>
            <input type="subject" name="subject" id="subject" value="<?= $inputs['subject'] ?? '' ?>">
            <small><?= $errors['subject'] ?? '' ?></small>
        </div>

        <div>
            <label for="message">Message:<br></label>
            <textarea id="message" name="message" rows="5"><?= $inputs['message'] ?? '' ?></textarea>
            <small><?= $errors['message'] ?? '' ?></small>
        </div>

        <label for="nickname" aria-hidden="true" class="user-cannot-see"> Nickname
            <input type="text" name="nickname" id="nickname" class="user-cannot-see" tabindex="-1" autocomplete="off">
        </label>

        <button type="submit">Send Message</button>
    </form>
    </main>
        <footer>
                <ul>
                    <li>
                        <a href="../../index.php">Home</a>
                    </li>
                    <li>
                        <a href="../faqOffline.php">FAQ</a>
                    </li>
                    <li>
                        <a href="../aboutOffline.php">About</a>
                    </li>
                    <li>
                        <a href="index.php">Contact</a>
                    </li>
                </ul>
                <p>&copy; 2021 Finance Budget App AS</p>
            </footer>

            <script src="main.js"></script>
    </body>
</html>