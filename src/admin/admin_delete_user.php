<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

$user = $_GET['user'];

$sql = "
    DELETE FROM
        users
    WHERE
        id=$user";

$res = $db->query($sql);

if($res)
{
    header("location: admin_list_users.php");
}
else
{
    echo "<p class='msg error'>عملیات نا موفق بود.</p>";
}
?>
