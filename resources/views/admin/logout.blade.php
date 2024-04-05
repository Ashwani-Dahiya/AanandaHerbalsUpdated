<?php
session_start();
?>
<?php
unset($_SESSION['superid']);
session_destroy(); 
header('location:../index.php');
?>

