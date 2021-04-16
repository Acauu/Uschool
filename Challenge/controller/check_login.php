<?php
include '../include/koneksi.php';
session_start();
$db = new database();

if (isset($_POST['login'])) {
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $hasil = $db->checkEmail($user_id);
    if ($hasil) {
        $loginResult = $db->login($user_id, $password, $hasil['role_id']);
        if($loginResult){
            if($hasil['role_id']==1){
                $message = '';
                $_SESSION['message'] = $message;
                $_SESSION['status'] = "login";
                $_SESSION['user_id'] = $user_id;
                header("location:../Admin.php");
            }else if($hasil['role_id']==2){
                $message = '';
                $_SESSION['message'] = $message;
                $_SESSION['status'] = "login";
                $_SESSION['user_id'] = $user_id;
                header("location:../Teacher.php");
            }else if($hasil['role_id']==3){  
                $message = '';
                $_SESSION['message'] = $message;
                $_SESSION['status'] = "login";
                $_SESSION['user_id'] = $user_id;
                header("location:../index.php");
            }
        }else{
            $message = 'Invalid Password!';
            $_SESSION['message'] = $message;
            header("location:../index.php");
        }
    } else {
        $message = 'User tidak terdaftar atau password salah, silahkan coba lagi';
        $_SESSION['message'] = $message;
        header("location:../index.php");
    }
}
?>