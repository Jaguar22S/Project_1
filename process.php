<?php
// Set up a connection to the database
include_once "Database.php"; // Include the database connection file
// Check the connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$name = $_POST['name'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$roll_no = $_POST['roll_no'];
$contact_no = $_POST['contact_no'];

// Insert the form data into the database
$sql = "INSERT INTO students (name, father_name, mother_name, roll_no, contact_no)
		VALUES ('$name', '$father_name', '$mother_name', '$roll_no', '$contact_no')";

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
	
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
