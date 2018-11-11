<html>
<body style="background:url(dental1.jpg);background-size: 100%">
<div align="center">
<h1 style='color: blue;'>WELCOME TO DELIGHT SMILES</h1>
</div>
</body>
</html>

<?php
session_start ();
if(isset($_SESSION['username'])) {
    echo 'Username: '.$_SESSION ['username'];
    echo'<br>';
    echo'<br>';
    include('search.php');
    echo'<br>';
    echo'<br>';

    echo '<br><a href="index.php?action=logout"><input type=button value=logout name=logout</a>'; 
}
else{
    echo "<script>location.href='index.php'</script>";
}
?>
