<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

$sql = "
    SELECT
        id,
        subject,
        date
    FROM
        papers
    WHERE
        accept <> 1";

$res = $db->query($sql);
$res = $res->fetchAll();
?>

<div id="content">
    <?php if(!$res) { ?>
        <p class="center">هیچ مقاله تایید نشده ای یافت نشد.</p>
    <?php die(); } ?>

    <table>
        <tr>
            <th>موضوع</th>
            <th>تاریخ</th>
        </tr>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><a href="admin_accept_paper.php?paper=<?php echo $row['id'] ?>">تایید</a></td>
                <td><a href="admin_reject_paper.php?paper=<?php echo $row['id'] ?>">رد</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
