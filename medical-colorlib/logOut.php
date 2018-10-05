<?php
session_start();
//echo $_SESSION['Username'];
unset($_SESSION['Username']);
unset($_SESSION['Name']);
header("location: index.php");

?>