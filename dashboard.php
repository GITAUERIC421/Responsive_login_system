
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>
</head>
<style>
     .logout-form button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-form button:hover {
            background-color: #45a049;
        }
</style>
<body>

    <div class="container">
        <h2>Contact Details</h2>

        <form action="process_form.php" method="post">
            <label for="mobile_phone">Mobile Phone:</label>
            <input type="tel" name="mobile_phone" id="mobile_phone" required placeholder="Enter your mobile phone number">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required placeholder="Enter your email address">

            <label for="address">Address:</label>
            <textarea name="address" id="address" required placeholder="Enter your address"></textarea>

            <label for="registration_number">Registration Number:</label>
            <input type="text" name="registration_number" id="registration_number" required placeholder="Enter your registration number">

            <input type="submit" value="Submit">
        </form>
        <form class="logout-form" action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
    </div>
<div>
<?php
// Check if the form is submitted,
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered registration number from the form
    $searchRegistrationNumber = $_POST["registration_number"];

    // Replace "your_database_credentials" with your actual database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contacts";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to search for a user by registration number
    $sql = "SELECT * FROM contacts WHERE registration_number = '$searchRegistrationNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, display user details
        while ($row = $result->fetch_assoc()) {
            echo "<p>User Found:</p>";
            echo "<p>Phone number: " . $row["mobile_phone"] . "</p>";
            echo "<p>Email: " . $row["email"] . "</p>";
            echo "<p>registration_number: " . $row["registration_number"] . "</p>";
            echo "<p>Address: " . $row["address"] . "</p>";

        }
    } else {
        // User not found
        echo "<p>User not found.</p>";
    }

    // Close connection
    $conn->close();
}
?>

<!-- HTML Form -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="registration_number">Search user details by <br>
    
    Registration Number:</label>
    <input type="text" name="registration_number" required>
    <br>
    <input type="submit" value="Search">
</form>
</div>


</body>
</html>
