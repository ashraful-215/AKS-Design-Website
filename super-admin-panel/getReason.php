<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aksviolated_user";

// Create connection// [MD. Ashraful Islam Talukdar]
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection// [MD. Ashraful Islam Talukdar]
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the reason for deactivation based on the user ID// [MD. Ashraful Islam Talukdar]
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $sql = "SELECT ReasonForDeactivating FROM user WHERE uid = $userId";
    $result = $conn->query($sql);

// [MD. Ashraful Islam Talukdar]
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['ReasonForDeactivating'];
    } else {
        echo "Reason not found";
    }
} else {// [MD. Ashraful Islam Talukdar]
    echo "User ID not provided";
}

$conn->close();
?>
<!-- // [MD. Ashraful Islam Talukdar] -->