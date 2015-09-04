<?php
session_start();

if(!isset($_SESSION['judge']))
{
    header("location: judge_login.php");
}
?>
