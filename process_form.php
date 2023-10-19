<?php
// Establish a database connection (replace these values with your actual database credentials).
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacts";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$mobilePhone = $_POST['mobile_phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$registrationNumber = $_POST['registration_number'];

// SQL query to insert data into the database
$sql = "INSERT INTO contacts (mobile_phone, email, address, registration_number) VALUES ('$mobilePhone', '$email', '$address', '$registrationNumber')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
    echo "<script>window.location.href = 'dashboard.php';</script>";

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: dashboard.php");

// Close the database connection
$conn->close();
?>
