<?php
$con = mysqli_connect("localhost:3306","root","");

mysqli_select_db($con,"booksydb");

$sql = "SELECT * FROM tblusers";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" type="text/css" href="mybookingstyle.css">
</head>
<body>
    <h1>Users of Booksy</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
            </tr>

            <?php
            //printing the results
            while($row = mysqli_fetch_array($result))
            {
                echo"<tr>";
                echo"<td>$row[0]</td>";
                echo"<td>$row[1]</td>";
                echo"<td>$row[2]</td>";
                echo"<td>$row[3]</td>";
                echo"</tr>";
            }
            mysqli_close($con);
            ?>
        </table>
    </div>

    <button style=" background-color: #023e8a; color: white; border-radius: 8px; font-size: 16px;cursor: pointer; transition: background-color 0.3s ease;"  id="home-btn" onclick="back()">Back</button>


    <script type="text/javascript">
        
        function back() 
        {
            window.location.href = "admin.html";
        }

    </script>
    
</body>
</html>
