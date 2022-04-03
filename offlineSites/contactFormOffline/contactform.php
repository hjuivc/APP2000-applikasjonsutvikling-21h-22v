
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Finance Budget App</title>
</head>
<body>
    <header class="block" style="justify-content: left;">
                <div id="sideMenu">
                    <div style="align-self: flex-start;">
                        <a href="home.html"
                        ><div class="block sideMenuItem">
                            <img src="https://www.svgrepo.com/show/14443/home.svg"
                            class="sideMenuIcon"
                            />Home
                        </div></a>
                        <a href="budget.html"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/17167/pie-chart.svg"
                            class="sideMenuIcon"
                        />Budget
                        </div></a
                    >
                    <a href="budget-planner.html"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/11983/from-a-to-z.svg"
                            class="sideMenuIcon"
                        />Budget planner
                        </div></a
                    >
                    <a href="achievements.html"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/84275/trophy.svg"
                            class="sideMenuIcon"
                        />Achievements
                        </div></a
                    >
                    </div>
                    <div style="align-self: flex-end; margin-bottom: 40px;">
                    <a href="profile.html"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/7025/user.svg"
                            class="sideMenuIcon"
                        />Profile
                        </div></a
                    >
                    <a href="#"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/198090/gear.svg"
                            class="sideMenuIcon"
                        />Settings
                        </div></a
                    >
                    <a href="faq.html"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/348371/help.svg"
                            class="sideMenuIcon"
                        />Help
                        </div></a
                    >
                    <a href="index.html"
                        ><div class="block sideMenuItem">
                        <img
                            src="https://www.svgrepo.com/show/334066/log-out-circle.svg"
                            class="sideMenuIcon"
                        />Log out
                        </div></a
                    >
                    </div>
                </div>
            
                <img
                    id="menuClosed"
                    class="headerLogo"
                    src="https://www.svgrepo.com/show/336031/hamburger-button.svg"
                    style="position: fixed;"
                />

                <img
                    src="Pictures/logo_header.png"
                    alt="logo_header"
                    class="finance-logo"
                />
                <img
                    src="Pictures/profile_photo.jpg"
                    alt="profile_photo"
                    class="profile-logo"
                />
    </header>
    <main>
    
    <form method="post">
        <header2>
            <h1>Contact Us</h1>
        </header2>

        <div>
            <label for="name">Name:<br></label>
            <input type="text" value="<?= $inputs['name'] ?? '' ?>" name="name" id="name" placeholder="Full name*">
            <small><?= $errors['name'] ?? '' ?></small>
        </div>

        <div>
            <label for="email">Email:<br></label>
            <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" placeholder="Email address*">
            <small><?= $errors['email'] ?? '' ?></small>
        </div>

        <div>
            <label for="subject">Subject:<br></label>
            <input type="subject" name="subject" id="subject" value="<?= $inputs['subject'] ?? '' ?>" placeholder="Enter a subject*">
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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="faq.html">FAQ</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                </ul>
                <p>&copy; 2021 Finance Budget App AS</p>
            </footer>

            <script src="main.js"></script>
    </body>
</html>

<?php

function honeypot() {
    // check the honeypot
    $honeypot = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING);
    if ($honeypot) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit;
    }

    // validate name
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $inputs['name'] = $name;
    if (!$name || trim($name) === '') {
        $errors['name'] = 'Please enter your name';
    }

    // validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $inputs['email'] = $email;
    if ($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!$email) {
            $errors['email'] = 'Please enter a valid email';
        }
    } else {
        $errors['email'] = 'Please enter an email';
    }

    // validate subject
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $inputs['subject'] = $subject;
    if (!$subject || trim($subject) === '') {
        $errors['subject'] = 'Please enter the subject';
    }

    // validate message
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $inputs['message'] = $message;
    if (!$message || trim($message) === '') {
        $errors['message'] = 'Please enter the message';
    }
    
}
?>

<?php
function config() {
    return [
        'mail' => [
            'to_email' => '#' /* Må legge inn en mail her */
        ]
    ];
}
?>

<?php


$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {

    // show the message
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    } elseif (isset($_SESSION['inputs']) && isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
        $inputs = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }
    
} elseif ($request_method === 'POST') {
    // check the honeypot and validate the field
    honeypot();

    if (!$errors) {
        config();
        // set the message
        $_SESSION['message'] =  'Thanks for contacting us! We will be in touch with you shortly.';
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['inputs'] = $inputs;
    }
    exit;
}

if (isset($inputs['name'])) {
    $contact_name = $inputs['name'];
    unset($inputs['name']);
}elseif (isset($inputs['email'])) {
    $contact_email = $inputs['email'];
    unset($inputs['email']);
}elseif (isset($inputs['message'])) {
    $message = $inputs['message'];
    unset($inputs['message']);
}elseif (isset($inputs['subject'])) {
    $subject = $inputs['subject'];
    unset($inputs['subject']);
}

exit;

// get email from the config function
$config = config();

$recipient_email = $config['mail']['to_email'];

// contact information
$contact_name = $inputs['name'];
$contact_email = $inputs['email'];
$message = $inputs['message'];
$subject = $inputs['subject'];

// Email header
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
$headers[] = "To: $recipient_email";
$headers[] = "From: $contact_email";
$header = implode('\r\n', $headers);

mail($recipient_email, $subject, $message, $header);

?>
