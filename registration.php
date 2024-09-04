<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="styles.css">
    <script src="validation.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Employee Registration Form</h2>
        <form id="registrationForm" method="POST" action="registration.php">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation" required>

            <label for="date_of_joining">Date of Joining:</label>
            <input type="date" id="date_of_joining" name="date_of_joining" required>

            <label for="phone_no">Phone Number:</label>
            <input type="text" id="phone_no" name="phone_no" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "Employee";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO Employee_record (full_name, designation, date_of_joining, phone_no, email, address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $full_name, $designation, $date_of_joining, $phone_no, $email, $address);

    $full_name = $_POST['full_name'];
    $designation = $_POST['designation'];
    $date_of_joining = $_POST['date_of_joining'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if ($stmt->execute()) {
        echo "New employee registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!-- CREATE DATABASE Employee;

USE Employee;

CREATE TABLE Employee_record (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    designation VARCHAR(50) NOT NULL,
    date_of_joining DATE NOT NULL,
    phone_no VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address TEXT NOT NULL
); -->