<?php
session_start();
include 'db_connect.php'; 

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

    if (empty($username) || empty($email) || empty($phone) || empty($_POST['password'])) {
        $error = "⚠️ Please fill in all fields.";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $error = "⚠️ Invalid phone number. Use 10-15 digits only!";
    } else {
        // Check if email already exists
        $checkEmail = "SELECT email FROM flix1 WHERE email = ?";
        $stmt = $conn->prepare($checkEmail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "⚠️ Email already exists. Try another one!";
        } else {
            // Insert new user with phone number
            $sql = "INSERT INTO flix1 (username, email, phone, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $email, $phone, $password);

            if ($stmt->execute()) {
                $success = "✅ Registration successful! Redirecting to login...";
                echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
            } else {
                $error = "❌ Error: " . $conn->error;
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Flix</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="container">
        <h2>Register for Flix 🎬</h2>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <form method="POST" action="register.php">
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <input type="email" name="email" placeholder="Enter Email" required><br>
            <input type="text" name="phone" placeholder="Enter Phone Number" required><br>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <button type="submit">Register</button>
        </form>

        <p>
            Already have an account?  
            <a href="login.php">Login here</a>
        </p>
    </div>
</body>
</html>
