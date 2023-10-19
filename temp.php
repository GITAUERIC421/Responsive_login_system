<!-- HTML form with internal CSS for users to reset their password. -->
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="reset_password.php">
        <h2>Reset Password</h2>
         
        <label for="verification_code">Verification Code:</label>
        <input type="text" name="verification_code" required>
        
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        
        <input type="submit"  value="Reset Password">
    </form>
</body>
</html>
