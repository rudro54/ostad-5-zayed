<?php
session_start();
session_unset();
setcookie("user_email", time() - 50000);
setcookie("password", time() - 50000);
header("Location:login.php");
?>