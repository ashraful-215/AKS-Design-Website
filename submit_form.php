<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $contact_number = $_POST['Contact Number'];// [MD. Ashraful Islam Talukdar]
    $package_name = $_POST['Package Name'];
    $details = $_POST['Details'];

    // Database connection// [MD. Ashraful Islam Talukdar]
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aksdesign";

    // Enable error reporting// [MD. Ashraful Islam Talukdar]
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Create connection// [MD. Ashraful Islam Talukdar]
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection// [MD. Ashraful Islam Talukdar]
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to insert data// [MD. Ashraful Islam Talukdar]
    $stmt = $conn->prepare("INSERT INTO orders (Name, Address, `Contact Number`, `Package Name`, Details) VALUES (?, ?, ?, ?, ?)");                                                                                                                                                                                                 // [MD. Ashraful Islam Talukdar]// [MD. Ashraful Islam Talukdar]// [MD. Ashraful Islam Talukdar]// [MD. Ashraful Islam Talukdar]                                                                                                    // [MD. Ashraful Islam Talukdar]
    $stmt->bind_param("ssiss", $name, $address, $contact_number, $package_name, $details);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;// [MD. Ashraful Islam Talukdar]
    }
// [MD. Ashraful Islam Talukdar]
    $stmt->close();
    $conn->close();
}
?>