<?php 
include "config.php";
session_start();
if (isset($_POST['resetPassword'])) {	
	if(isset($_SESSION['forgot_password_email'])){		
		if(strcmp($_POST['password'],$_POST['confirmPassword'])==0){
			$email = $_SESSION['forgot_password_email'];
			$password = mysqli_real_escape_string($conn, md5($_POST['password']));/* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] */
			$sqlUpdate = "UPDATE user SET password = '".$password."' WHERE email = '".$email."' AND otp = '".$_POST['otp']."'";/* [MD. Ashraful Islam Talukdar] */

			$resultUpdate = mysqli_query($conn, $sqlUpdate);/* [MD. Ashraful Islam Talukdar] */
			if ($resultUpdate) {
				echo '<script>alert("Successfully updated password!")</script>';						
				header('Refresh:1; url=index.php');
			}
			else{/* [MD. Ashraful Islam Talukdar] */
				echo "<script>alert('sql error updating password!...');</script>";
			}
		}
		else{
			
			echo "<script>alert('password didnt match');</script>";
		}
		
	
	}
	else{/* [MD. Ashraful Islam Talukdar] */
		echo "<script>alert('Session expired! Please try again!');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

 	<head>
 		<!-- Meta Tags /* [MD. Ashraful Islam Talukdar] */-->
		<meta charset="UTF-8"><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] -->
		<meta name="author" content="Tripple-T">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Site Title /* [MD. Ashraful Islam Talukdar] */-->
 		<title>PHP Signup with OTP Email Verification System</title>
 		<!-- External Style Sheet/* [MD. Ashraful Islam Talukdar] */ -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />

 	</head>
<body>
	<div class="wrapper">
		<div class="otp">
			<h2>Reset Password</h2>
			<hr>		
			<form action="" method="POST">
				<div class="form-group">
					<label>Verification Code</label>
					<input type="otp" name="otp" placeholder="Enter your OTP" autocomplete="off">
				</div><!-- [MD. Ashraful Islam Talukdar] -->
				<div class="form-group">
					<label>New Password</label>
					<input type="password" name="password" placeholder="Enter new password" autocomplete="off">
				</div>
				<div class="form-group"><!-- [MD. Ashraful Islam Talukdar] -->
					<label>Confirm Password</label>
					<input type="password" name="confirmPassword" placeholder="Enter confirm password" autocomplete="off">
				</div>
				<div class="form-group">
					<label></label>
					<input type="submit" name="resetPassword" value="Reset Password">
				</div>
			</form>
		</div>
	</div>
	<!-- End of Login Wrapper /* [MD. Ashraful Islam Talukdar] */-->
</body>

<script type="text/javascript" src="js/jquery.min.3-4-1.js"></script>																																					<!-- [MD. Ashraful Islam Talukdar] -->

</html>