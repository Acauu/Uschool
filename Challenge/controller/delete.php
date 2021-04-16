<?php
include '../include/koneksi.php';
session_start();
if ($_SESSION['status'] == "logout") {
    header("location:../Admin.php");
}else if(isset($_GET['user_id'])){
    $db = new database();
    $db->delete($_GET['user_id']);
    header("location:../Admin.php");
}
?>