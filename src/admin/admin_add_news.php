<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

if(isset($_POST['submit']))
{
    $admin = $_SESSION['admin'];
    $text = $_POST['text'];
    $date = date("Y-m-d");

    $sql = "
        INSERT INTO news(
            admin,
            text,
            date)
        VALUES (
            '$admin',
            '$text',
            '$date')";

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
       <textarea name="text" placeholder="متن خبر"></textarea>
       <input name="submit" type="submit" value="ثبت">
    </form>
</div>
