<?php
include_once "connect.php";
unset($_SESSION['log_user']);
header('Location:../index.php');
?>