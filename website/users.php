<?php 
	include('tab3.php');
    include('connect.php');
    session_start();
    // initialize variables
    $id = 0;
    $name = "";
    $username = "";
    $password = "";
    $type = "";

	if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
		$type = $_POST['type'];
		$password = md5($password);

		mysqli_query($con, "INSERT INTO `users` (`name`, `username`, `password`, `type`) 
                            VALUES ('$name', '$username', '$password', '$type')") or die ('Could not add user!');
		$_SESSION['message'] = "User information saved!";
		header('location: users.php');
	}

	$results = mysqli_query($con, "SELECT * FROM `users`");

?>

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

<?php $results = mysqli_query($con, "SELECT * FROM users"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Type</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['type']; ?></td>
		</tr>
	<?php } ?>
</table>
	

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>

    <div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>

    <div class="input-group">
		<label>Password</label>
		<input type="text" name="password" value="<?php echo $password; ?>">
	</div>

    <div class="input-group">
		<label>Type</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
	</div>

	<div class="input-group">
		<button class="btn" type="submit" name="save" >Add</button>
	</div>
</form>
</body>
</html>