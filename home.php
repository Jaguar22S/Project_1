<?php
session_start(); // Start the session

// Check if the user_name is stored in the session
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    echo "Hi, $user_name!";
} else {
    echo "User name not found.";
}
?>
