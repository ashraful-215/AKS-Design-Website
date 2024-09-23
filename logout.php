<?php
include "config.php";

/* [MD. Ashraful Islam Talukdar] */
session_start();

/* [MD. Ashraful Islam Talukdar] */
if (isset($_SESSION['id'])) {																																								/* [MD. Ashraful Islam Talukdar] */
	
	setcookie('username', "");

	if (session_destroy()) {/* [MD. Ashraful Islam Talukdar] *//* [MD. Ashraful Islam Talukdar] */
		
		header("Location: landingpage.php");
	}
}/* [MD. Ashraful Islam Talukdar] */