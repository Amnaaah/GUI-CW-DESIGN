<?php

$name = $_POST["txtname"];
$email = $_POST["txtemail"];
$event = $_POST["txtevent"];
$ticket = $_POST["txttickets"];

$con = mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"booksydb");

$sql = "INSERT INTO tblbookings (name, email, event, noOfTickets) VALUES ('$name', '$email', '$event', '$ticket')";
$result = mysqli_query($con, $sql);

if ($result) 
{
    echo "<script>
            alert('Booking successful!');
            window.location.href = 'home.html';
          </script>";
}
 else 
{
    echo "<script>
        alert('Error');
        window.location.href = 'book.html';
    </script>";
}

mysqli_close($con);

?>