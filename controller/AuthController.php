<?php
include '../config/connection.php';
switch ($_GET['a']) {

  case 'cek_user':
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    //
    // $query = $connection->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    // $hasil = $query->fetch_assoc();
    // $cek = $query->num_rows;
    //
    // if ($cek == 1) {
      session_start();
      $_SESSION['status']           = "login";
      $_SESSION['user_id']          = '1';
      // $_SESSION['user_id']          = $hasil['user_id'];
      $_SESSION['fullname']         = 'Admin';
      // $_SESSION['fullname']         = $hasil['fullname'];
      // $_SESSION['email']            = $hasil['email'];
      header("location:../app/?p=dashboard");
    // } else {
    //   header("location:../?p=login&message=error");
    // }
    break;

  case 'logout':
    session_start();
    session_destroy();
    header('location:../');
    break;

  default:
    // code...
    break;
}
 ?>
