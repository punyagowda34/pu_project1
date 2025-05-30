<?php
session_start();
session_unset();
session_destroy();

// Set a session to track logout
session_start();
$_SESSION['logged_out'] = true; 

header("Location: index.php");
exit();
?>
