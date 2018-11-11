<html>
<head>
<title>Search</title>
</head>

<body>

<form method="post">
    <input type="text" name="search" placeholder="Search patients.."/>
    <input type="submit" value="go"/>
</form>
</body>
</html> 


<?php
$output = '';
include('connect.php');
if(isset($_POST['search'])) {
    $searchq = $_POST['search']; 
    $query = mysqli_query($con, "SELECT * FROM patient WHERE `Patient ID` = '$searchq' Limit 1") or die ('Could not search!');
    $count = mysqli_num_rows($query);
    if($count == 0) {
        echo 'search not found!';
    } else {
        echo "<table>";
            echo "<tr>";
                echo "<th>Patient ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Date of Birth</th>";
                echo "<th>Sex</th>";
                echo "<th>Teeth Number</th>";
                echo "<th>Note</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($query)) {
            echo "<tr>";
                echo "<td>" . $row['Patient ID'] . "</td>";
                echo "<td>" . $row['First Name'] . "</td>";
                echo "<td>" . $row['Last Name'] . "</td>";
                echo "<td>" . $row['Date of Birth'] . "</td>";
                echo "<td>" . $row['Sex'] . "</td>";
                echo "<td>" . $row['Teeth Number'] . "</td>";
                echo "<td>" . $row['Note'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($query);
        }
    
}
?>
