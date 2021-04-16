<?php
include '../include/koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../Admin.php");
}
if(!isset($_GET['user_id'])){
    die("Error: ID Tidak Dimasukkan");
}

$db = new database();

if($db->checkKodeExist($_GET['user_id']) == 0){
    die("Error: ID Tidak Ditemukan");
}else{
    $data = $db->getByKode($_GET['user_id']);
   
}
if(isset($_POST['submit'])){
    // $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role_id = $_POST['role_id'];   
    $db->editAdmin($_GET['user_id'], $first_name, $last_name, $role_id);
    header("location: ../Admin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <h3 class="display-2 center w-100">Ubah Data</h3>
        <form method="post">
            <div class="form-group">
                <label>ID :</label>
                <input type="text" class="form-control" name="user_id" value="<?php echo $data['user_id']?>" readonly>
            </div>
            <div class="form-group">
                <label>First Name :</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $data['first_name']?>" required>
            </div>
            <div class="form-group">
                <label>Last Name :</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $data['last_name']?>"required>
            </div>
            <div class="form-group">
                <label>Role id :</label>
                <input type="text" class="form-control" name="role_id" value="<?php echo $data['role_id']?>"required>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Edit">
            <a class="btn btn-default" href="../Admin.php">Cancel</a>
        </form>
    </div>
</body>

</html>