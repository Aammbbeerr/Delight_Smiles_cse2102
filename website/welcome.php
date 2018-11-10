<html>
<body style="background:url(dental1.jpg);background-size: 100%">
</body>
</html>

<?php
session_start ();
if(isset($_SESSION['username'])) {

echo "<h1>WELCOME TO DELIGHT SMILES</h1>";
echo 'Username: '.$_SESSION ['username'];
echo '<br><a href="index.php?action=logout">logout</a>'; 
}
else{
    echo "<script>location.href='index.php'</script>";
}
?>
