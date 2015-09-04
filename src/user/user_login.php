<?php
session_start();

include "../com/conn.php";
include "user_nav.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
        SELECT
            id,
            accept
        FROM
            users
        WHERE
            username='$username'
        AND
            password='$password'";

    $res = $db->query($sql);
    $res = $res->fetch();

    if($res['accept'] == '1')
    {
        $_SESSION['user'] = $res['id'];

        header("location: user_panel.php");
    }
    else
    {
        echo "<p class='msg error'>عملیات ناموفق</p>";;
    }
}

?>
<div id="content">
    <form action="" method="POST">
        <input type="text" name="username" placeholder="کاربری">
        <input type="password" name="password" placeholder="گذرواژه">
        <input type="submit" name="submit" value="ورود">
        <br>
        <p>یا از <a href="user_signup.php">اینجا</a> ثبت نام کنید.</p>
    </form>

</div>
