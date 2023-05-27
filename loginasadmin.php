<?php
session_start(); // Start the session

include_once "Database.php";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
    echo "Connection Failed";
}
if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['Special_key'])) { // Check if the user_name and password have been submitted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $special_key = $_POST['Special_key'];

    // Check that the database connection is established successfully before calling mysqli_query()
    if ($conn) {
        // SQL query to check if the user_name and password match a record in the database
        $sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password' AND `SPECIAL KEY`='$special_key'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) { // If there is one matching record in the database, login the user
            $_SESSION['user_name'] = $user_name; // Store the username in the session
            header("Location: admin.php"); // Redirect to the admin page
            exit(); // Stop executing the script
        } else { // If the user_name and password don't match, show an error message
            $error = "Invalid user_name or password or special key";
        }
    } else {
        // Handle the case where the database connection was not established successfully
        $error = "Failed to establish a database connection";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?> <!-- Display error message if there is one -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label>Username:</label><br>
        <input type="text" name="user_name"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <label>Special Key:</label><br>
        <input name="Special_key" type="password"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
