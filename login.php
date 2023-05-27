<?php
session_start(); // Start the session

$sname="localhost";

$unmae="root";

$password= "";
$db_name = "test_db";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if(!$conn)
{

echo "Connection Failed";
}
if (isset($_POST['user_name']) && isset($_POST['password'])) { // Check if the user_name and password have been submitted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Check that the database connection is established successfully before calling mysqli_query()
    if ($conn) {
        // SQL query to check if the user_name and password match a record in the database
        $sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        var_dump($result);

        if (mysqli_num_rows($result) == 1) { // If there is one matching record in the database, login the user
            $_SESSION['user_name'] = $user_name; // Store the user_name in a session variable
            header("Location: home.php"); // Redirect to the home page
            exit(); // Stop executing the script
        } else { // If the user_name and password don't match, show an error message
            $error = "Invalid user_name or password";
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
        <label>user_name:</label><br>
        <input type="text" name="user_name"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
