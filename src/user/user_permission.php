<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("location: user_login.php");
}
?>
