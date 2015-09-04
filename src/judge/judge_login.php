<?php
session_start();

include "../com/conn.php";
include "judge_nav.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "
        SELECT
            id
        FROM
            judges
        WHERE
            username='$username'
        AND
            password='$password'";

    $res = $db->query($sql);
    $res = $res->fetch();

    if($res)
    {
        $_SESSION['judge'] = $res['id'];

        header("location: judge_panel.php");
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
