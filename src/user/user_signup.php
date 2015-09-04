<?php
include "../com/conn.php";
include "user_nav.php";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $family = $_POST['family'];
    $pass = $_POST['pass'];
    $tel = $_POST['tel'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $add = $_POST['add'];
    $deg = $_POST['deg'];

    $sql = "
        INSERT INTO users(
            name,
            family,
            user,
            pass,
            tel,
            email,
            address,
            degree)
        VALUES (
            '$name',
            '$family',
            '$user',
            '$pass',
            '$tel',
            '$email',
            '$add',
            '$deg')";

    $res = $db->query($sql);

    if($res)
    {
        echo "<p class='msg success'>با موفقیت انجام شد.</p>";
    }
    else
    {
        echo "<p class='msg error'>عملیات نا موفق بود.</p>";
    }
}
?>

<div id="content">
    <form action="" method="POST">
        <input name="name" type="text" placeholder="نام">
        <input name="family" type="text" placeholder="نام خانوادگی">
        <input name="pass" type="text" placeholder="گذرواژه">
        <input name="user" type="text" placeholder="نام کاربری">
        <input name="tel" type="text" placeholder="تلفن">
        <input name="email" type="text" placeholder="ایمیل">
        <input name="add" type="text" placeholder="ادرس">
        <input name="deg" type="text" placeholder="تحصیلات">
        <input name="submit" type="submit" value="ثبت">
    </form>
</div>
