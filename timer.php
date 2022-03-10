<?php
  if (!isset($_COOKIE['admin'])) {
  echo "<script> location.href='logout.php'; </script>";   
  }

  setcookie('admin', 'abc', time()+900);
?>