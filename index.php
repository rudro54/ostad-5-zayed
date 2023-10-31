<?php

session_start();

if (!isset($_SESSION['email'])) {
    //if no email in session data forwarded to login.php file
    header("Location:login.php");
}
if (($_SESSION['role'] == 'user')) {
    // if role is user than forward to user page
    header("Location:user.php");
}
if (($_SESSION['role'] == 'admin')) {
    // if admin then admin page
    header("Location:admin.php");
}