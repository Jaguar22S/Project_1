<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the student name from the form
    $na = $_GET['student_name'];
    echo $na;

    // Perform database query to fetch student details based on the name
    include_once "Database.php";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if (!$conn) {
        echo "Connection Failed";
    } else {
        $sql = "SELECT * FROM students WHERE name='$na'";
        $result = mysqli_query($conn, $sql);

        // Display the student details if found
        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Student Details:</h3>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Name: " . $row['name'] . "<br>";
                echo "Father's name: " . $row['father_name'] . "<br>";
                echo "Mother's name: " . $row['mother_name'] . "<br>";
                echo "Roll no.: " . $row['roll_no'] . "<br>";
                echo "Contact no.: " . $row['contact_no'] . "<br>";

                // Add other details you want to display
                echo "<br>";
            }
        } else {
            echo "No student details found.";
        }

        // Close the database connection
        mysqli_close($conn);
    }


 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel - Student Details</h2>
    <form method="GET" action="admin.php ">
        <label>Student Name:</label>
        <input type="text" name="student_name" value="<?php echo isset($na) ? $na : ''; ?>" required>
        <button type="submit">Get Details</button>
    </form>
</body>
</html>
