<?php
session_start();
$_SESSION['status'] = "logout";
header("location:../index.php");
?>