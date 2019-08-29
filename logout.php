<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);

echo "You are logged out, Please wait...";
header('Refresh: 1; URL = index.php');
?>