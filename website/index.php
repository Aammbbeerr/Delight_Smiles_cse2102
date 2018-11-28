<?php
// start session
session_start ();

    // verify username and password before giving access
    if(isset ($_POST['Login'])) {
        require 'connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $result = mysqli_query($con, 'select * from users where username="'.$username.'" and password="'.$password.'"');

    if(mysqli_num_rows($result)==1) {
        $_SESSION['username'] = $username;
        header('Location: welcome.php');
    }
    else
        echo "<script>alert('Username or Password incorrect!')</script>";
    }

    //end session if your log out 
    if(isset($_GET['logout'])) {
        session_destroy();
        session_unregister('username');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delight Smiles</title>
<style type="text/css">
    table{
        margin-top: 120px;
        margin-left: 120px;
        border: 0px solid;
        background-color: #eee;
    }

    td{
        border:0px;
        padding: 15px;
    }
    th{
        border-bottom= 1px solid;
        background-color: #ddd;
    }
</style>
</head>
<body style="background:url(dental.jpg);background-size: 100%">

<!--log in form-->
<form method="post">
    <table align="center">
        <tr>
            <th colspan="2"><h2 align="center">Login</h2></th>
        </tr>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" placeholder ="     Enter username here..."></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder ="     Enter password here..."></td>
        </tr>
        <tr>
            <td align="right" colspan="2"><input type="submit" name="Login" value="login"></td>
        </tr>
    </table>
</form>
</body>
</html>
