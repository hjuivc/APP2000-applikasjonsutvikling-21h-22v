<?php

// noreplyfinancebudgetapp@gmail.com
// password: Gruppe654321

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["forgot-submit"])) {

	// Krypter og generer nøkkel
	$selector 	= bin2hex(random_bytes(8));
	$token		= random_bytes(32);

	$link		= 
		"localhost/APP2000-applikasjonsutvikling-21h-22v/forgot-password/create-new-password.php?selector=" 
		. $selector .
		"&validator=" 
		. bin2hex($token);

	// Utløper en time fra nå
	$expires = date("U") + 1800;

	// Hentet fra login.php
    include '../connect_mysql/connect.php';
    $conn = connectMysqli();

    $userEmail = $_POST["email"];

    // Slett gamle reset data
    $sql 	= "DELETE FROM passwordreset WHERE passwordResetEmail=?;";
    $stmt 	= mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
    	echo "error1";
    	exit();

    } else {
    	mysqli_stmt_bind_param($stmt, "s", $userEmail);
    	mysqli_stmt_execute($stmt);
    }

    // Legg inn ny reset data
    $sql = "
    	INSERT INTO 
    	passwordreset (passwordResetEmail, passwordResetSelector, passwordResetToken, passwordResetExpires) 
    	VALUES 
    	(?, ?, ?, ?);
    ";

    if(!mysqli_stmt_prepare($stmt, $sql)) {
    	echo "error2";
    	exit();

    } else {
    	$hashedToken = password_hash($token, PASSWORD_DEFAULT);
    	mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    	mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // send email

    require "../PHPMailer/src/PHPMailer.php";
    require "../PHPMailer/src/SMTP.php";
    require "../PHPMailer/src/Exception.php";

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->SMTPAuth 	= true;
    $mail->SMTPSecure	= "tls";
    $mail->Host 		= "smtp.gmail.com";
    $mail->Port 		= "587";
    $mail->isHTML(true);

    $mail->Username 	= "noreplyfinancebudgetapp@gmail.com";
    $mail->Password 	= "Gruppe654321";
    $mail->SetFrom("no-reply@financeBudgetApp.com");

    $mail->Subject 		= "Reset password for Finance Budget App";
    $mail->Body 		= "<p><a href='" . $link . "'>Click here to reset your password</a></p>";
    $mail->addAddress($userEmail);

    $mail->send();
    $mail->smtpClose();

    echo "<script>
    	alert('Reset email sent. Check your email!');
    	window.location.href='../index.php';
    </script>";

} else {
	header("Location:../index.php");
}

/*

sql for den nye tabellen

CREATE TABLE passwordReset (
	passwordResetId INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    passwordResetEmail TEXT NOT NULL,
    passwordResetSelector TEXT NOT NULL,
    passwordResetToken LONGTEXT NOT NULL,
    passwordResetExpires TEXT NOT NULL
);


*/
?>