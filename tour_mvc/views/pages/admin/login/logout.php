<?php
   session_start();
   // unset($_SESSION["username"]);
   echo '<script type="text/javascript">alert("Bạn đã đăng xuất thành công!")</script>';
   header('Refresh: 2; URL = admin.php');
?>