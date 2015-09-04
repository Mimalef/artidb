<?php
include "com/conn.php";
include "com/home.php";

$sql = "
    SELECT
        news.id,
        admins.name,
        LEFT(news.text,76) as text,
        news.date
    FROM
        news
    JOIN
        admins
    ON
        news.admin=admins.id
    ORDER BY
        news.id DESC
    LIMIT
        4";

$res = $db->query($sql);
$news = $res->fetchAll();

$sql = "
    SELECT
        papers.id,
        users.name,
        users.family,
        papers.date,
        papers.subject
    FROM
        papers
    JOIN
        users
    ON
        papers.user = users.id
    WHERE
        papers.accept = 1
    ORDER BY
        papers.id DESC
    LIMIT
        4";

$res = $db->query($sql);
$papers = $res->fetchAll();
?>

<div id="content">
    <h3>آخرین مقالات</h3>
    <table>
        <?php foreach ($papers as $row) { ?>
        <tr>
            <td class="row"><a href="paper.php?paper=<?php echo $row['id'] ?>"><?php echo $row['subject'] ?></a></td>
            <td class="row"><?php echo $row['name'] . " " . $row['family'] ?></td>
            <td class="row date"><?php echo $row['date'] ?></td>
        </tr>
        <?php } ?>
        <tr><td></td><tr>
        <tr>
            <td></td>
            <td></td>
            <td><a class="button" href="news.php">همه مقالات</a></td>
        </tr>
    </table>
    <h3>آخرین اخبار</h3>
    <table>
        <?php foreach ($news as $row) { ?>
        <tr>
            <td class="row"><a href="news.php"><p><?php echo $row['text'] ?> ...</p></a></td>
            <td class="row date"><?php echo $row['date'] ?></td>
        </tr>
        <?php } ?>
        <tr><td></td><tr>
        <tr>
            <td></td>
            <td><a class="button" href="papers.php">همه اخبار</a></td>
        </tr>
    </table>
</div>
<div id="footer">
    <p>پدیدآورندگان: یوسفی و مختاروند</p>
</div>
