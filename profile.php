<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user details including the profile image
$sql = "SELECT username, email, phone, profile_img FROM flix1 WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Set profile image correctly
$profile_img = !empty($user['profile_img']) ? "uploads/" . $user['profile_img'] : "uploads/default.jpg";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Flix</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <h2>My Profile</h2>
        
        <!-- Profile Picture -->
        <div class="profile-image-container">
            <img src="<?php echo htmlspecialchars($profile_img); ?>" alt="Profile Picture" class="profile-img">
        </div>

        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>

        <!-- Profile Picture Upload Form -->
        <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
            <label for="file-upload" class="custom-file-upload">Choose Image</label>
            <input id="file-upload" type="file" name="profile_img" accept="image/*" required>
            <button type="submit">Upload Profile Picture</button>
        </form>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
