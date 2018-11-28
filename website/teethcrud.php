<?php include('tab2.php'); ?>
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
include('crud2.php');
	if (isset($_GET['edit'])) {
		$TeethID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM teeth WHERE Teeth_ID=$TeethID LIMIT 1");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
            $TeethID = $n['Teeth_ID'];
            $Num_of_Anesthesia = $n['Number_of_Anesthesia'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delight Smiles</title>
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

<?php $results = mysqli_query($con, "SELECT * FROM teeth"); ?>

<table>
	<thead>
		<tr>
			<th>Teeth ID</th>
            <th>Number of Anesthesia</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Teeth_ID']; ?></td>
            <td><?php echo $row['Number_of_Anesthesia']; ?></td>
			<td>
				<a href="teethcrud.php?edit=<?php echo $row['Teeth_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="crud2.php?del=<?php echo $row['Teeth_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="crud2.php" >

	<div class="input-group">
		<label>Teeth ID</label>
		<input type="text" name="Teeth_ID" value="<?php echo $TeethID; ?>">
	</div>

    <div class="input-group">
		<label>Number of Anesthesia</label>
		<input type="text" name="Number_of_Anesthesia" value="<?php echo $Num_of_Anesthesia; ?>">
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