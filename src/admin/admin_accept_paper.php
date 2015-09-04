<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

$paper = $_GET['paper'];

$sql = "
    UPDATE
        papers
    SET
        accept='1'
    WHERE
        id='$paper'";

$res = $db->query($sql);

if($res)
{
    header("location: admin_list_papers.php");
}
else
{
    echo "<p class='msg error'>عملیات نا موفق بود.</p>";
}
?>
