<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

$sql = "
    SELECT
        news.id,
        news.text,
        news.date
    FROM
        news";

$res = $db->query($sql);
$res = $res->fetchAll();
?>
<div id="content">
    <table>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td><?php echo $row['text'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><a href="admin_delete_news.php?news=<?php echo $row['id'] ?>">حذف</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
