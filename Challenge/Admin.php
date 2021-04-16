<!DOCTYPE html>

<?php
include 'include/koneksi.php';
include 'model/student.php';
$db = new database();
$data = $db->user();

$message = '';

session_start();
if(!isset($_SESSION['message'])){
    $_SESSION['message'] = $message;
}
if(!isset($_SESSION['status'])){
    $_SESSION['status'] = "logout";
}
?>

<html lang="en">

<head>
    <title>UTS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            var sessionLogged = '<?php echo $_SESSION['status']; ?>';
            console.log(sessionLogged);
            if (sessionLogged == "login") {
                $('li#login').hide();
                $('li#logout').show();
            } else if (sessionLogged == "logout") {
                $('#myModal').modal();
                $('li#login').show();
                $('li#logout').hide();
            } else {
                $('#myModal').modal();
                $('li#login').show();
                $('li#logout').hide();
            }
        });

        showHide = () => {
            let x = document.getElementById("password");
            let y = document.getElementById("toggle");

            if (x.type === "password")
            {
                x.type = "text";
                y.className = "fas fa-eye-slash";
            }
            else
            {
                x.type = "password";
                y.className = "fas fa-eye";
            }
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">USchool</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Welcome Admin</a></li>
                <li id="login"><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                <li id="logout"><a href="controller/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title">Login</h4>
                </div>
                <form action="controller/check_login.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default" onclick="showHide()"><i class="fas fa-eye" id="toggle"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p style='text-align: left'><?php echo $_SESSION['message']; ?></p>
                        <input type="submit" class="btn btn-primary float-right" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div style="width:100%; height:40px">
            <a href="view/create.php" class="btn btn-primary" style="float:right">
                <i class="fas fa-plus-circle"></i>
                Student
            </a>
        </div>
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Role </th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <?php $i = 1; ?>
            <tbody>
                <?php foreach ($data as $value) : ?>
                    
                    
                    <tr>
                        
                        <td><?php echo $value['user_id'] ?></td>
                        <td><?php echo $value['first_name'], ' ',$value['last_name'] ?></td>
                        
                        <td><?php echo $value['role_name'] ?></td>
                        <td>
                            <a href="view/editAdmin.php?user_id=<?php echo $value['user_id'] ?>"><i class="fas fa-edit"></i></a>
                            <a href="controller/delete.php?user_id=<?php echo $value['user_id'] ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
               
            </tbody>
        </table>
    </div>

</body>

</html>