<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "jay@6125";
$dbname = "amc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validate inputs
    if (empty($username) || empty($usertype) || empty($email) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO login (username, password, usertype, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $usertype,  $email);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("Location: pages-login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>