<?php
session_name('my_custom_session');
session_start();

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];


    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "jay@6125";
    $dbname = "amc";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM login WHERE username='$username' AND usertype='$user_type' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $user_type;

        if ($user_type == 'admin') {
            header("location: admin.php");
        } else {
           
            header("location: index.php");
        }
    } else {
        $error_message = "Invalid username or password";
        echo "Invalid Credentials";
    }

    $conn->close();
}
?>