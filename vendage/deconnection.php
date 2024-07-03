<?php
// session_destroy();
// include('securite_page.php');
// header ('location: admin/index.php');
session_start();
unset ($_SESSION['id']);
session_destroy();
header ('location: admin/index.php');
exit();
?>