<?php
session_start();
unset($_SESSION['user']);
$_SESSION['logout'] = /** @lang text */
    'You have successfully logged out.<br> See you soon!';
header("Location: login.php");
