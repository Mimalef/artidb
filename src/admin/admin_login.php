<?php
session_start();

include "../com/conn.php";
include "admin_nav.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
        SELECT
            id
        FROM
            admins
        WHERE
            username='$username'
        AND
            password='$password'";

    $res = $db->query($sql);
    $res = $res->fetch();

    if($res)
    {
        $_SESSION['admin'] = $res['id'];

        header("location: admin_panel.php");
    }
    else
    {
        echo "<p class='msg error'>عملیات نا موفق بود.</p>";;
    }
}
?>

<div id="content">
    <form action="" method="POST">
        <input type="text" name="username" placeholder="کاربری">
        <input type="password" name="password" placeholder="گذرواژه">
        <input type="submit" name="submit" value="ورود">
    </form>
</div>
