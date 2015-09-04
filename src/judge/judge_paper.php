<?php
include "judge_permission.php";
include "../com/conn.php";
include "judge_nav.php";

$sql = "
    SELECT
        papers.id,
        users.name,
        papers.subject,
        papers.date,
        papers.summary
    FROM
        papers
    JOIN
        users
    ON
        papers.user=users.id
    WHERE
        papers.accept='1'";

$res = $db->query($sql);
$res = $res->fetchAll();
?>
<div id="content">
    <table>
        <tr>
            <th>نام ارسال کننده</th>
            <th>موضوع</th>
            <th>تاریخ ارسال</th>
            <th>چکیده</th>
            <th></th>
        </tr>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['summary'] ?></td>
                <td><a href="judge_add_comment.php?id=<?php echo $row['id'] ?>">نظردهی</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
