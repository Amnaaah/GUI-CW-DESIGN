<?php
session_start();

if (isset($_SESSION['username'])) 
{
    
    header("Location: book.html");
}
else 
{   
    header("Location: login.php");
    exit(); 
}
?>
