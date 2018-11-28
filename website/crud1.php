<?php 
    include('connect.php');
    session_start();
    // initialize variables
    $Id = 0;
    $Fname = "";
    $Lname = "";
    $Sex = "";
    $Note = "";
	$update = false;

    // insert into dentist table
	if (isset($_POST['save'])) {
        $Fname = $_POST['First_Name'];
        $Lname = $_POST['Last_Name'];
        $Sex = $_POST['Sex'];
        $Note = $_POST['Note'];

		mysqli_query($con, "INSERT INTO `dentist` (`First_Name`, `Last_Name`, `Sex`, `Note`) 
                            VALUES ('$Fname', '$Lname', '$Sex', '$Note')") or die ('Could not save!');
		$_SESSION['message'] = "Dentist information saved!"; 
		header('location: dentistcrud.php');
	}

    // update dentist table
	if (isset($_POST['update'])) {
        $Id = $_POST['Dentist_ID'];
		$Fname = $_POST['First_Name'];
        $Lname = $_POST['Last_Name'];
        $Sex = $_POST['Sex'];
        $Note = $_POST['Note'];

        mysqli_query($con, "UPDATE `dentist` SET `First_Name`='$Fname', `Last_Name`='$Lname', `Sex`='$Sex', `Note`='$Note' 
                            WHERE `dentist`.`Dentist_ID`='$Id' LIMIT 1") or die ('Could not update!');
		$_SESSION['message'] = "Denist information updated!"; 
		header('location: dentistcrud.php');
	}

    // delete from dentist table
    if (isset($_GET['del'])) {
	    $Id = $_GET['del'];
	    mysqli_query($con, "DELETE FROM `denist` WHERE `Dentist_ID`=$Id LIMIT 1");
	    $_SESSION['message'] = "Dentist information deleted!"; 
	    header('location: dentistcrud.php');
    }

    // retrieve all info from dentist table
	$results = mysqli_query($con, "SELECT * FROM `dentist`");

?>