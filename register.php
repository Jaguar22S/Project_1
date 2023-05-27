<?php
session_start(); // Start the session
include_once "Database.php"; // Include the database connection file

if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['confirm_password'])) { // Check if the form data has been submitted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the password and confirm password match
    if ($password != $confirm_password) {
        $error = "Password and confirm password do not match";
    } else {
        // Insert the user data into the database
        $sql = "INSERT INTO users (user_name, password) VALUES ('$user_name', '$password')";
        if (mysqli_query($conn, $sql)) { // Execute the SQL query and check if it was successful
            $_SESSION['user_name'] = $user_name; // Store the user_name in a session variable
            header("Location: Mainpage.php"); // Redirect to the home page
            exit(); // Stop executing the script
        } else {
            $error = "Error inserting user data: " . mysqli_error($conn); // Display an error message if the query failed
        }
    }
} else {
    $error = "Please fill in all fields"; // Display an error message if the form data was not submitted
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?> <!-- Display error message if there is one -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label>user_name:</label>
        <input type="text" name="user_name"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <label>Re-enter Password:</label>
        <input type="password" name="confirm_password"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
