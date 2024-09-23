<?php 
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {                                                                                                                                         // [MD. Ashraful Islam Talukdar]
    header("Location: /Project-4800/index.php");
    exit();// [MD. Ashraful Islam Talukdar]
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aksviolated_user";

// [MD. Ashraful Islam Talukdar]
$conn = mysqli_connect($servername, $username, $password, $dbname);

// [MD. Ashraful Islam Talukdar]
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// [MD. Ashraful Islam Talukdar]
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    $sql = "SELECT ReasonForDeactivating FROM user WHERE uid = $userId";                    // [MD. Ashraful Islam Talukdar]                                                                                                                                                                                                                                            // [MD. Ashraful Islam Talukdar]
    $result = $conn->query($sql);

    // [MD. Ashraful Islam Talukdar]
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $reason = $row['ReasonForDeactivating'];
        echo $reason;
    } else {
        echo "Reason not found for user with ID $userId";
    }
} else {
    echo "Invalid request";
}

// [MD. Ashraful Islam Talukdar]
$conn->close();
?>