<?php
// Database configuration ok
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
    $workspace = $_POST['workspace'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $mbno = $_POST['mbno'];
    $usertype = $_POST['usertype'];
    $job = $_POST['job'];
    $password = $_POST['password'];
    $about = $_POST['about'];

    
    $sql = "INSERT INTO registration (workspace, username,user_type,password,job,country,address,phone,email,about)
    VALUES ('$workspace', '$username', ' $usertype', '$password', '$job', '$country', '$address', '$mbno', '$email', '$about')";
   if ($conn->query($sql) === TRUE) {
       echo "Data inserted successfully";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
}

// Close the connection
$conn->close();
?>
