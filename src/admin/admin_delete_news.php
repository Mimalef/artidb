<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

$news = $_GET['news'];

$sql = "
    DELETE FROM
        news
    WHERE
        id=$news";

$res = $db->query($sql);

if($res)
{
    header("location: admin_list_news.php");
}
else
{
    echo "<p class='msg error'>عملیات نا موفق بود.</p>";
}
?>
