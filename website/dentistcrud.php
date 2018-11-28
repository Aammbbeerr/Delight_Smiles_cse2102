<?php include('tab1.php'); ?>
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
include('crud1.php');

	// to edit or update dentist info
	if (isset($_GET['edit'])) {
		$Id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM dentist WHERE Dentist_ID=$Id LIMIT 1");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
            $Fname = $n['First_Name'];
            $Lname = $n['Last_Name'];
            $Sex = $n['Sex'];
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

<?php $results = mysqli_query($con, "SELECT * FROM dentist"); ?>

<!--Table for dentist info-->
<table>
	<thead>
		<tr>
			<th>First Name</th>
            <th>Last Name</th>
            <th>Sex</th>
            <th>Note</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['First_Name']; ?></td>
            <td><?php echo $row['Last_Name']; ?></td>
            <td><?php echo $row['Sex']; ?></td>
            <td><?php echo $row['Note']; ?></td>
			<td>
				<a href="dentistcrud.php?edit=<?php echo $row['Dentist_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="crud1.php?del=<?php echo $row['Dentist_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	
<!--Form to insert dentist info-->
<form method="post" action="crud1.php" >

	<input type="hidden" name="Dentist_ID" value="<?php echo $Id; ?>">

	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="First_Name" value="<?php echo $Fname; ?>">
	</div>

    <div class="input-group">
		<label>Last Name</label>
		<input type="text" name="Last_Name" value="<?php echo $Lname; ?>">
	</div>

    <div class="input-group">
		<label>Sex</label>
		<input type="text" name="Sex" value="<?php echo $Sex; ?>">
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