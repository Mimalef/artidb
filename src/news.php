<?php
include "com/conn.php";
include "com/home.php";

$sql = "
    SELECT
        news.id,
        admins.name,
        news.text,
        news.date
    FROM
        news

    JOIN
        admins
    ON
        news.admin = admins.id
    ORDER BY
        news.id DESC";

$res = $db->query($sql);
$res = $res->fetchAll();
?>

<div id="content">
    <table>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td class="row">
                    <span><?php echo $row['text'] ?></span><br><br><br>
                    <span class="author">ارسال توسطه <?php echo $row['name'] ?> در تاریخ <?php echo $row['date'] ?></span>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
