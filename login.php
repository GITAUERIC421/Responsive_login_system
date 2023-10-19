<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dist_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Incorrect password. Please try again.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    }
}

$conn->close();
?>
!
.