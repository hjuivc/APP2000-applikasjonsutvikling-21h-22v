<?php


session_start();

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
    // show the form
    require_once __DIR__ . '/inc/get.php';
} elseif ($request_method === 'POST') {
    // check the honeypot and validate the field
    require_once __DIR__ . '/inc/post.php';

    if (!$errors) {
        // send an email
        require_once __DIR__ . '/inc/mail.php';
        // set the message
        $_SESSION['message'] =  'Thanks for contacting us! We will be in touch with you shortly.';

        include '../../connect_mysql/connect.php';
        $conn = OpenCon();

        $sql = "INSERT INTO contact (contact_name, contact_email, contact_subject, contact_message) VALUES ('" 
            . $inputs['name'] . "', '" 
            . $inputs['email'] . "', '" 
            . $inputs['subject'] . "', '" 
            . $inputs['message'] . "');";
        $conn->query($sql);

    } else {
        $_SESSION['errors'] =   $errors;
        $_SESSION['inputs'] =   $inputs;
    }

    header('Location: index.php', true, 303);
    exit;
}