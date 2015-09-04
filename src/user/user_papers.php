<?php
include "user_permission.php";
include "../com/conn.php";
include "user_nav.php";

$user = $_SESSION['user'];

$sql = "
    SELECT
        id,
        subject,
        summary,
        date
    FROM
        papers
    WHERE
        user = $user";

$res = $db->query($sql);
$res = $res->fetchAll();
?>

<div id="content">
    <table id="papers">
        <tr>
           <th>موضوع</th>
           <th>چکیده</th>
           <th>تاریخ</th>
        </tr>
        <?php foreach($res as $row) { ?>
            <tr>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo $row['summary'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><a href="user_edit_paper.php?paper=<?php echo $row['id'] ?>">ویرایش</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
