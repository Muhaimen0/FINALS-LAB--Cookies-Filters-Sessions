<?php
session_start();
session_destroy(); 
setcookie("favcolor", "", time() - 3600, "/"); 
header("Location: login.php"); 
exit();
?>
