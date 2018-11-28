<?php 
    include('connect.php');
    session_start();
    // initialize variables
    $TeethID = "";
    $Num_of_Anesthesia = "";
	$update = false;

	// insert into teeth table
	if (isset($_POST['save'])) {
        $Num_of_Anesthesia = $_POST['Number_of_Anesthesia'];

		mysqli_query($con, "INSERT INTO `teeth` (`Number_of_Anesthesia`) 
                            VALUES ('$Num_of_Anesthesia')") or die ('Could not save!');
		$_SESSION['message'] = "Teeth information saved!"; 
		header('location: teethcrud.php');
	}

	// update teeth table
	if (isset($_POST['update'])) {
		$TeethID = $_POST['Teeth_ID'];
        $Num_of_Anesthesia = $_POST['Number_of_Anesthesia'];

        mysqli_query($con, "UPDATE `teeth` SET `Teeth_ID`='$TeethID', `Number_of_Anesthesia`='$Num_of_Anesthesia' 
                            WHERE `teeth`.`teeth_ID`='$TeethID' LIMIT 1") or die ('Could not update!');
		$_SESSION['message'] = "Teeth information updated!"; 
		header('location: teethcrud.php');
	}

	// delete from teeth table
	if (isset($_GET['del'])) {
		$TeethID = $_GET['del'];
		mysqli_query($con, "DELETE FROM `teeth` WHERE `teeth_ID`=$TeethID LIMIT 1");
		$_SESSION['message'] = "Teeth information deleted!"; 
		header('location: teethcrud.php');
	}

	// retrieve all info from teeth table
	$results = mysqli_query($con, "SELECT * FROM `teeth`");


?>