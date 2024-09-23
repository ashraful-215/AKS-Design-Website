<?php 
session_start();

// Unset all session variables// [MD. Ashraful Islam Talukdar]
$_SESSION = array();

session_destroy();   

header("Location: /aksdesign/index.php"); 
exit();
?>