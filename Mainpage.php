<!DOCTYPE html>
<html>
<head>
	<title>Student Information Form</title>
</head>
<body>
	<h2>Student Information Form</h2>
	<form method="post" action="process.php">
		<label>Name:</label>
		<input type="text" name="name" required><br><br>

		<label>Father's Name:</label>
		<input type="text" name="father_name" ><br><br>

		<label>Mother's Name:</label>
		<input type="text" name="mother_name" required><br><br>

		<label>Roll No.:</label>
		<input type="text" name="roll_no" required><br><br>

		<label>Contact No.:</label>
		<input type="text" name="contact_no" required><br><br>

		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
