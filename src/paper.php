<?php
include "com/conn.php";
include "com/home.php";

$id = $_GET['paper'];

$sql = "
    SELECT
        papers.id,
        users.name,
        users.family,
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
        papers.id='$id'";

$res = $db->query($sql);
$paper = $res->fetch();

$sql = "
    SELECT
        comments.paper,
        judges.name,
        judges.family,
        comments.text,
        comments.date,
        comments.rate
    FROM
        comments
    JOIN
        judges
    ON
        comments.judge=judges.id
    WHERE
        comments.paper=$id";

$res = $db->query($sql);
$comments = $res->fetchAll();
?>

<div id="content">
    <p>عنوان: <span><?php echo $paper['subject'] ?></span></p>
    <p>تاریخ ارسال: <span><?php echo $paper['date'] ?></span></p>
    <p>نویسنده: <span><?php echo $paper['name'] . " " . $paper['family'] ?></span></p>
    <p>لینک دانلود: <a href="files/<?php echo $paper['id'] ?>.pdf">دانلود</a></p>
    <p>چکیده: <span><?php echo $paper['summary'] ?></span></p>
    <hr>
    <p>نظر داوران:</p>
    <table>
        <?php foreach ($comments as $row) { ?>
            <tr>
                <td class="row">
                    <p>امتیاز: <span><?php echo $row['rate'] ?></span></p>
                    <p>نظر: </p><br>
                    <?php echo $row['text'] ?>
                    <br><br><br>
                    <span class="author">ارسال توسطه <?php echo $row['name'] ?> در تاریخ <?php echo $row['date'] ?></span>
                </td>

            </tr>
        <?php } ?>
    </table>
</div>
