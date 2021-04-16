<?php
    include '../include/koneksi.php';
    session_start();
    if (isset($_POST['submit'])) {
        $db = new database();
        $db->createUser($_POST['user_id'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['role_id'], $_POST['address']);
        header("location: ../Admin.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="display-2 center w-100" style="text-align : center">Register User</h3>
        <form action="Register.php" method="post">
            <div class="form-group">
                <label>Username :</label>
                <input type="text" class="form-control" name="user_id" required>
            </div>
            <div class="form-group">
                <label>First Name :</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="form-group">
                <label>Last Name :</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="form-group">
                <label>Address :</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label>Role Id :</label>
                <input type="password" class="form-control" name="role_id" required>
            </div>
            <div class="form-group">
                <label>Password  :</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Add User">
            <a class="btn btn-default" href="../Admin.php">Cancel</a>
        </form>
    </div>

    <script src='assets/jquery-3.2.1.min.js'></script>
    <script src='assets/bootstrap-3.3.7/dist/js/bootstrap.min.js'></script>
</body>

</html>