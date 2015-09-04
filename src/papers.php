<?php
include "com/conn.php";
include "com/home.php";

$sql = "
    SELECT
        papers.id,
        users.name,
        papers.date,
        papers.subject,
        papers.summary
    FROM
        papers
    JOIN
        users
    ON
        papers.user = users.id
    WHERE
        papers.accept = 1
    ORDER BY
        papers.id DESC";

$res = $db->query($sql);
$res = $res->fetchAll();
?>
<div id="content">
    <table>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td class="row">
                    <a href="paper.php?paper=<?php echo $row['id'] ?>">
                        <span><?php echo $row['subject'] ?></span>
                    </a><br><br>
                    <span><?php echo $row['summary'] ?></span><br><br><br>
                    <span class="author">ارسال توسطه <?php echo $row['name'] ?> در تاریخ <?php echo $row['date'] ?></span>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
