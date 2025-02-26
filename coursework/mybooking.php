<?php
session_start();

if (!isset($_SESSION['email'])) 
{    
    header("Location: login.php");
    exit();
}

$connection = mysqli_connect("localhost:3306","root","");
mysqli_select_db($connection,"booksydb");

// Get the user's email from the session 
$email = $_SESSION['email'];

//  fetch bookings for the user by their email
$query = "SELECT * FROM tblbookings WHERE email = '$email'";

$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    <link rel="stylesheet" type="text/css" href="mybookingstyle.css">
</head>
<body>
    <h1>Your Bookings</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Event</th>
                <th>No. of Tickets</th>
            </tr>

            <?php
            //printing the results
            while($row = mysqli_fetch_array($result))
            {
                echo"<tr>";
                echo"<td>$row[1]</td>";
                echo"<td>$row[2]</td>";
                echo"<td>$row[3]</td>";
                echo"<td>$row[4]</td>";
                echo"</tr>";
            }
            mysqli_close($connection);
            ?>
        </table>
    </div>

    <button style=" background-color: #497d81; color: white; border-radius: 8px; font-size: 16px;cursor: pointer; transition: background-color 0.3s ease;"  id="home-btn" onclick="home()">Home</button>

    <script type="text/javascript">
        
        function home() 
        {
            window.location.href = "home.html";
        }
    </script>
    
</body>
</html>
