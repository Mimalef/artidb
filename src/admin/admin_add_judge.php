<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

if(isset($_POST['submit']))
{
    $password = $_POST['password'];
    $username = $_POST['username'];
    $family = $_POST['family'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $add = $_POST['add'];


    $sql = "
        INSERT INTO judges(
            name,
            family,
            username,
            password,
            tel,
            email,
            address)
        VALUES (
            '$name',
            '$family',
            '$username',
            '$password',
            '$tel',
            '$email',
            '$add')";

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
       <input name="password" type="text" placeholder="گذرواژه">
       <input name="username" type="text" placeholder="نام کاربری">
       <input name="tel" type="text" placeholder="تلفن">
       <input name="email" type="text" placeholder="ایمیل">
       <input name="add" type="text" placeholder="ادرس">
       <input name="submit" type="submit" value="ثبت">

    </form>
</div>
