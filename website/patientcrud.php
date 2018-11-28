<?php include('tab.php'); ?>
<!DOCTYPE html>
<html>
<head>
<style>
	body {
    	background-color: lightblue;
	}	

	h1 {
    	color: black;
    	text-align: center;
	}

	p {
    	font-family: verdana;
    	font-size: 20px;
	}
</style>
</head>
</html>


<?php
include('crud.php');

	// to edit or update dentist info
	if (isset($_GET['edit'])) {
		$Id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM patient WHERE Patient_ID=$Id LIMIT 1");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
            $Fname = $n['First_Name'];
            $Lname = $n['Last_Name'];
            $DOB = $n['Date_of_Birth'];
            $Sex = $n['Sex'];
            $Address = $n['Address'];
            $Teethnum = $n['Teeth_Number'];
            $Note = $n['Note'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delight Smiles</title>
	<!--CSS style-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($con, "SELECT * FROM patient"); ?>

<!--Table for dentist info-->
<table>
	<thead>
		<tr>
			<th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Sex</th>
			<th>Address</th>
            <th>Teeth Number</th>
            <th>Note</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['First_Name']; ?></td>
            <td><?php echo $row['Last_Name']; ?></td>
            <td><?php echo $row['Date_of_Birth']; ?></td>
            <td><?php echo $row['Sex']; ?></td>
			<td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Teeth_Number']; ?></td>
            <td><?php echo $row['Note']; ?></td>
			<td>
				<a href="patientcrud.php?edit=<?php echo $row['Patient_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="crud.php?del=<?php echo $row['Patient_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	

<!--Form to insert patient info-->
<form method="post" action="crud.php" >

	<input type="hidden" name="Patient_ID" value="<?php echo $Id; ?>">

	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="First_Name" value="<?php echo $Fname; ?>">
	</div>

    <div class="input-group">
		<label>Last Name</label>
		<input type="text" name="Last_Name" value="<?php echo $Lname; ?>">
	</div>

    <div class="input-group">
		<label>Date of Birth</label>
		<input type="text" name="Date_of_Birth" value="<?php echo $DOB; ?>">
	</div>

    <div class="input-group">
		<label>Sex</label>
		<input type="text" name="Sex" value="<?php echo $Sex; ?>">
	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="Address" value="<?php echo $Address; ?>">
	</div>

    <div class="input-group">
		<label>Teeth Number</label>
		<input type="text" name="Teeth_Number" value="<?php echo $Teethnum; ?>">
	</div>

    <div class="input-group">
		<label>Note</label>
		<input type="text" name="Note" value="<?php echo $Note; ?>">
	</div>

	<div class="input-group">
		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>