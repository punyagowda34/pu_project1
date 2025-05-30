<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_img"])) {
    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $imageFileType = strtolower(pathinfo($_FILES["profile_img"]["name"], PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "jpeg", "png", "gif"];

    if (!in_array($imageFileType, $allowed_types)) {
        echo "❌ Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    if ($_FILES["profile_img"]["size"] > 2 * 1024 * 1024) {
        echo "❌ File size must be less than 2MB.";
        exit();
    }

    $safe_username = preg_replace("/[^a-zA-Z0-9]/", "_", $username);
    $newFileName = $safe_username . "_" . time() . "." . $imageFileType;
    $target_file = $target_dir . $newFileName;

    if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file)) {
        // Update profile image in database
        $sql = "UPDATE flix1 SET profile_img = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newFileName, $username);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Update session and refresh page
        $_SESSION['profile_img'] = $newFileName;
        header("Location: profile.php");
        exit();
    } else {
        echo "❌ Error uploading file.";
    }
}
?>
