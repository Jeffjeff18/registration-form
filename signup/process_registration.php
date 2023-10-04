<?php
include('db_config.php');

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO signup (name, username, password, email) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $name, $username, $password, $email);

    if ($stmt->execute()) {
    
        echo 'Registration Successfull GRT awrt awrt<script>alert("Registration successful!");</script>';
    } else {
        
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
    }

    $stmt->close();
} else {
    
    echo '<script>alert("Error: ' . $conn->error . '");</script>';
}

$conn->close();
?>
