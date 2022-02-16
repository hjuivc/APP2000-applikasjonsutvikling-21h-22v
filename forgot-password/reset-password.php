<?php

if(isset($_POST["reset-password-submit"])) {

	$selector 		= $_POST["selector"];
	$validator 		= $_POST["validator"];
	$password 		= $_POST["password"];
	$passwordRepeat	= $_POST["confirm-password"];

	// Om noe er tomt
	if(empty($password) || empty($passwordRepeat)) {
		echo "<script>
			alert('Fill out the entire form before submitting');
		</script>";
		exit();

	// Om passordene ikke matcher
	} elseif($password != $passwordRepeat) {
		echo "<script>
			alert('Passwords do not match');
		</script>";
		exit();
	}

	// Om forspørselen har utløpt/ det har gått for lang tid
	$currentDate = date("U");

	include "../connect_mysql/connect.php";
	$conn 	= connectMysqli();

	$sql 	= "SELECT * FROM passwordReset WHERE passwordResetSelector=? AND passwordResetExpires >= ?;";
	$stmt 	= mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error";
		exit();
	
	} else {
		mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)) {
			echo "There was an error";
			exit();
		
		} else {
			$tokenBin 	= hex2bin($validator);
			$tokenCheck	= password_verify($tokenBin, $row["passwordResetToken"]);

			if($tokenCheck === false) {
				echo "There was an error";
				exit();
			
			} elseif($tokenCheck === true) {
				$tokenEmail = $row["passwordResetEmail"];

				$sql = "SELECT * FROM customer WHERE EMail=?;";

				if(!mysqli_stmt_prepare($stmt, $sql)) {
					echo "There was an error";
					exit();				
				
				} else {
					mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
					mysqli_stmt_execute($stmt);

					$result = mysqli_stmt_get_result($stmt);
					if(!$row = mysqli_fetch_assoc($result)) {
						echo "There was an error";
						exit();

					// Endre passordet
					} else {
						$sql = "UPDATE customer SET Password=? WHERE EMail=?;";

						if(!mysqli_stmt_prepare($stmt, $sql)) {
							echo "There was an error";
							exit();				
						
						} else {
							// Med kryptering, må egt. bytte til dette senere.
							/*
							$newPasswordHash = password_hash($password, PASSWORD_DEFAULT);

							mysqli_stmt_bind_param($stmt, "ss", $newPasswordHash, $tokenEmail);
							*/

							// Bør egt. byttes ut etterhvert for å kryptere passordet i databasen
							// ---------------------------------------------------------
							mysqli_stmt_bind_param($stmt, "ss", $password, $tokenEmail);
							// ---------------------------------------------------------
							mysqli_stmt_execute($stmt);

							// Slett tokenet fra databasen
							$sql = "DELETE FROM passwordreset WHERE passwordResetEmail=?;";

							if(!mysqli_stmt_prepare($stmt, $sql)) {
								echo "There was an error";
								exit();	

							} else {
								mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
								mysqli_stmt_execute($stmt);

								// Ferdig, gå tilbake til index
							    echo "<script>
							    	alert('Password changed');
							    	window.location.href='../index.html';
							    </script>";								
							}
						}
					}					
				}
			}
		}
	}

} else {
	header("Location: ../index.html");
}