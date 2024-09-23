<?php 

include "config.php";
/* [MD. Ashraful Islam Talukdar] */
date_default_timezone_set("Asia/Karachi");

/* [MD. Ashraful Islam Talukdar] */
if (isset($_POST['verify'])) {
	
	if (isset($_GET['code'])) {
		/* [MD. Ashraful Islam Talukdar] */
		$activation_code = $_GET['code'];
		$otp = $_POST['otp'];

		$sqlSelect = "SELECT * FROM user WHERE activation_code = '".$activation_code."'";
		$resultSelect = mysqli_query($conn, $sqlSelect);
		if (mysqli_num_rows($resultSelect) > 0) {
			/* [MD. Ashraful Islam Talukdar] */
			$rowSelect = mysqli_fetch_assoc($resultSelect);

			$rowOtp = $rowSelect['otp'];
			$rowSignupTime = $rowSelect['signup_time'];
/* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] */
			$signupTime = date('d-m-Y h:i:s', strtotime($rowSignupTime));
			$signupTime = date_create($signupTime);
			date_modify($signupTime, "+1 minutes");
			$timeUp = date_format($signupTime, 'd-m-Y h:i:s');

			if ($rowOtp !== $otp) {
				echo "<script>alert('Please provide correct OTP..!')</script>";
			}/* [MD. Ashraful Islam Talukdar] */
			else{
				if (date('d-m-Y h:i:s') >= $timeUp) {
					
					echo "<script>alert('Your time is up..try it again..!')</script>";
					header("Refresh:1; url=index.php");/* [MD. Ashraful Islam Talukdar] */
				}
				else{
					$sqlUpdate = "UPDATE user SET otp = '', status = 'active' WHERE otp = '".$otp."' AND activation_code = '".$activation_code."'";
					$resultUpdate = mysqli_query($conn, $sqlUpdate);
					
					if ($resultUpdate) {/* [MD. Ashraful Islam Talukdar] */
						
						echo "<script>alert('Your account successfully activated')</script>";
						header("Refresh:1; url=index.php");
					}
					else{/* [MD. Ashraful Islam Talukdar] */
						echo "<script>alert('Opss..Your account not activated')</script>";
					}
				}
			}

		}
		else{/* [MD. Ashraful Islam Talukdar] */
			header("Location: index.php");
		}
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">

 	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Tripple-T">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">																																<!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] -->																			<!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] --><!-- [MD. Ashraful Islam Talukdar] -->
		<!-- Site Title/* [MD. Ashraful Islam Talukdar] */ -->
 		<title>PHP Signup with OTP Email Verification System</title>
 		
		<link rel="stylesheet" type="text/css" href="css/style.css" />

 	</head>
<body>
	<div class="wrapper">
		<div class="otp">
			<h2>OTP Verify</h2>
			<hr>		
			<form action="" method="POST">
				<div class="form-group">
					<label>OTP</label>
					<input type="text" name="otp" placeholder="Enter OTP to verify email" autocomplete="off">
				</div>
				<div class="form-group">
					<label></label>
					<input type="submit" name="verify" value="Verify">
				</div>
			</form>
		</div>
	</div>
	<!-- End of Login Wrapper/* [MD. Ashraful Islam Talukdar] */ -->
</body>

<script type="text/javascript" src="js/jquery.min.3-4-1.js"></script>

</html><!-- [MD. Ashraful Islam Talukdar] -->