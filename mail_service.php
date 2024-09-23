<?php
include "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'class/class.phpmailer.php';
/* [MD. Ashraful Islam Talukdar] */



function sendVerifcationEmail($email, $verification_code, $description): bool
{/* [MD. Ashraful Islam Talukdar] */
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	
	try{/* [MD. Ashraful Islam Talukdar] */
		$mail ->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'ark24697@gmail.com';
		$mail->Password = 'rwkd oryb rppt zupw';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$mail->Port = 465;


		$mail->setFrom('ark24697@gmail.com','AKS Design BD');
		$mail->addAddress($email);/* [MD. Ashraful Islam Talukdar] */

		$msg =  "Thank you for choosing AKS Design. As part of our commitment to ensuring the security of your account, we are sending you a One-Time Password (OTP) for verification purposes.Thank you for your cooperation.  Your OTP is: " . $verification_code;/* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] */

		$mail->isHTML(true);
		$mail->Subject = "Account Verification";
		$mail->Body = $msg;/* [MD. Ashraful Islam Talukdar] */
		$mail->AltBody =  'This is the body in plain text for non-HTML mail client';

		$mail->send();

	} catch(Exception){
		echo "<script>('$e')</script>";
		return false;
	}

	return true;
	
}

/* [MD. Ashraful Islam Talukdar] */

?> 
