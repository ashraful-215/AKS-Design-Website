<?php 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                                                                                     // [MD. Ashraful Islam Talukdar]                                                                                                                                                                                                                                                            // [MD. Ashraful Islam Talukdar]
    $user_id = $_POST['user_id'];

    // [MD. Ashraful Islam Talukdar]
    $conn = mysqli_connect("localhost", "root", "", "otp_verification");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // [MD. Ashraful Islam Talukdar]
    $sql = "DELETE FROM user WHERE uid = '$user_id'";                                                           // [MD. Ashraful Islam Talukdar]
    $result = $conn->query($sql);

    $conn->close();

    header("Location: admin_dashboard.php");
    exit();
}// [MD. Ashraful Islam Talukdar]
?>