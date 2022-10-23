<?php
  if (empty($_GET['p'])) {
    header('location:?p=login');
  }

  switch ($_GET['p']) {

    case 'login':
      include 'app/auth/login.php';
      break;

    case 'login2':
      include 'app/auth/login2.php';
      break;

    default:
      // code...
      break;
  }
?>
