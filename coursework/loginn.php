<?php
session_start();

if (isset($_POST['username'])) 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // DB connection
    $conn = mysqli_connect("localhost", "root", "", "booksydb"); 

    $sql = "SELECT * FROM tblusers WHERE username = '$username' AND password = '$password' AND email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_array($result)) 
    {
        // Add data to the session
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Set cookie to remember the username and email for 30 days
        setcookie("username", $username, time() + (86400 * 30), "/"); 
        // 86400 seconds = 1 day
        setcookie("email", $email, time() + (86400 * 30), "/"); 

        // Redirect
        header("Location: home.html");
        exit();
    }
     else 
    {
        echo "<script> alert('Invalid Credentials, Try again!'); </script>";
        header("Location: login.php");
    }

    mysqli_close($conn);
}
?>