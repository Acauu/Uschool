<?php
include '../include/koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../Teacher.php");
}
if(!isset($_GET['user_id'])){
    die("Error: ID Tidak Dimasukkan");
}

$db = new database();

if($db->checkKodeExist($_GET['user_id']) == 0){
    die("Error: ID Tidak Ditemukan");
}else{
    $data = $db->getByCode($_GET['user_id']);
   
}
if(isset($_POST['submit'])){
    // $user_id = $_POST['user_id'];
    $nilai_tugas = $_POST['nilai_tugas'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];   
    $db->edit($_GET['user_id'],$nilai_tugas, $nilai_uts, $nilai_uas);
    header("location: ../Teacher.php");
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
                <input type="text" class="form-control" name="user_id" value="<?php echo $data['user_id']?>">
            </div>
           
            <div class="form-group">
                <label>Nilai tugas :</label>
                <input type="text" class="form-control" name="nilai_tugas" value="<?php echo $data['nilai_tugas']?>" required>
            </div>
            <div class="form-group">
                <label>Nilai uts :</label>
                <input type="text" class="form-control" name="nilai_uts" value="<?php echo $data['nilai_uts']?>"required>
            </div>
            <div class="form-group">
                <label>Nilai uas :</label>
                <input type="text" class="form-control" name="nilai_uas" value="<?php echo $data['nilai_uas']?>"required>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Edit">
            <a class="btn btn-default" href="../Teacher.php">Cancel</a>
        </form>
    </div>
</body>

</html>