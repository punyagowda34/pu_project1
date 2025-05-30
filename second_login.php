<?php
session_start();
include 'db_connect.php'; 

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$logoutMessage = "";

if (isset($_SESSION['logged_out'])) {
    $logoutMessage = "✅ You have been successfully logged out!";
    unset($_SESSION['logged_out']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "⚠️ Please fill in all fields.";
    } else {
        $sql = "SELECT id, username, password FROM flix1 WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username']; 

                header("Location: index.php");
                exit();
            } else {
                $error = "❌ Invalid email or password.";
            }
        } else {
            $error = "❌ Invalid email or password.";
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
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <title>Login Again - Flix</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="container">
        <h2>Login Again 🔄</h2>

        <?php if (!empty($logoutMessage)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($logoutMessage); ?></p>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="second_login.php">
            <input type="email" name="email" placeholder="Enter Email" required><br>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <button type="submit">Login</button>
        </form>

        <p>
            Don't have an account?  
            <a href="register.php" target="_self" style="color: blue; text-decoration: underline; font-weight: bold;">Register here</a>

        </p>
    </div>
</body>
</html>
