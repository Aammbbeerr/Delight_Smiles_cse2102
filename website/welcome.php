<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>
<title>Delight Smiles</title>
<body style="background:url(dental1.jpg);background-size: 100%">

<div class="topnav">
  <a class="active" href="welcome.php">Home</a>
  <a href="patientcrud.php">Patient's Info</a>
  <a href="dentistcrud.php">Dentist's Info</a>
  <a href="teethcrud.php">Teeth Info</a>
  <a href="users.php">Users</a>
  <div class="search-container">
    <form method="get">
      <input type="text" placeholder="Search patient.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">
  <h1>Delight Smiles</h1>
</div>

</body>
</html>



<?php
session_start ();
include('connect.php');
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    print "<h4><div align='center'>Welcome!<br> $username</h4>";

if(isset($_GET['search'])) {
    $searchq = $_GET['search']; 
    $query = mysqli_query($con, "SELECT * FROM `patient` WHERE CONCAT(`Patient_ID`, `First_Name`, `Last_Name`, `Date_of_Birth`, `Sex`,
                        `Teeth_Number`,`Note`) LIKE '%".$searchq."%'") or die ('Could not search!');
    $count = mysqli_num_rows($query);
    if($count == 0) {
        echo ".     No result found!";
    } else {
        echo "<table border='2'>";
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
                echo "<td>" . $row['Patient_ID'] . "</td>";
                echo "<td>" . $row['First_Name'] . "</td>";
                echo "<td>" . $row['Last_Name'] . "</td>";
                echo "<td>" . $row['Date_of_Birth'] . "</td>";
                echo "<td>" . $row['Sex'] . "</td>";
                echo "<td>" . $row['Teeth_Number'] . "</td>";
                echo "<td>" . $row['Note'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($query);
        }
}
    echo'<br>';
    echo'<br>'; 
    echo'<br>';
    echo '<br><a href="index.php?action=logout"><input type=button value=logout name=logout</a>'; 
}
    else{
        echo "<script>location.href='index.php'</script>";
    }
?>
