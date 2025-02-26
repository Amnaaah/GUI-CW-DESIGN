<?php

session_start();

if (isset($_POST['btn-primary'])) 
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Database connection
  $conn = mysqli_connect("localhost:3306", "root", "", "booksydb");

  // Insert query
  $sql = "INSERT INTO tblusers (username, email, password) VALUES ('$username', '$email', '$password')";
  $result = mysqli_query($conn, $sql);

  if ($result) 
  {
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: home.html"); // Redirect to home page
    mysqli_close($conn);
    exit();
  } 
  else 
  {
    echo "try again, failed to register!";
    header("Location: Register.html");
  }
}
else
{
  echo "Please enter the credentials to register.";
}

?>
