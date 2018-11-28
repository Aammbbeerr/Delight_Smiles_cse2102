<?php 
    include('connect.php');
    session_start();
    // initialize variables
    $Id = 0;
    $Fname = "";
    $Lname = "";
    $DOB = "";
    $Sex = "";
    $Address = "";
    $Teethnum = "";
    $Note = "";
    $update = false;
    
    // insert into patient table
	if (isset($_POST['save'])) {
        $Fname = $_POST['First_Name'];
        $Lname = $_POST['Last_Name'];
        $DOB = $_POST['Date_of_Birth'];
        $Sex = $_POST['Sex'];
        $Address = $_POST['Address'];
        $Teethnum = $_POST['Teeth_Number'];
        $Note = $_POST['Note'];

		mysqli_query($con, "INSERT INTO `patient` (`First_Name`, `Last_Name`, `Date_of_Birth`, `Sex`, `Address`, 
                                `Teeth_Number`, `Note`) VALUES ('$Fname', '$Lname', '$DOB', '$Sex',
                                '$Address', '$Teethnum', '$Note')") or die ('Could not save!');
		$_SESSION['message'] = "Patient information saved!"; 
		header('location: patientcrud.php');
	}

    // update patient table
	if (isset($_POST['update'])) {
        $Id = $_POST['Patient_ID'];
		$Fname = $_POST['First_Name'];
        $Lname = $_POST['Last_Name'];
        $DOB = $_POST['Date_of_Birth'];
        $Sex = $_POST['Sex'];
        $Address = $_POST['Address'];
        $Teethnum = $_POST['Teeth_Number'];
        $Note = $_POST['Note'];

        mysqli_query($con, "UPDATE `patient` SET `First_Name`='$Fname', `Last_Name`='$Lname', `Date_of_Birth`='$DOB',
                                 `Sex`='$Sex', `Address`='$Address', `Teeth_Number`='$Teethnum', `Note`='$Note' 
                                 WHERE `patient`.`Patient_ID`='$Id' LIMIT 1") or die ('Could not update!');
		$_SESSION['message'] = "Patient information updated!"; 
		header('location: patientcrud.php');
	}

    // delete from patient table
    if (isset($_GET['del'])) {
	    $Id = $_GET['del'];
	    mysqli_query($con, "DELETE FROM `patient` WHERE `Patient_ID`=$Id LIMIT 1");
	    $_SESSION['message'] = "Patient information deleted!"; 
	    header('location: patientcrud.php');
    }

    // retrieve all info from patient table 
	$results = mysqli_query($con, "SELECT * FROM `patient`");


?>