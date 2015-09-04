<?php
include "user_permission.php";
include "../com/conn.php";
include "user_nav.php";

$paper = $_GET['paper'];

if(isset($_POST['submit']))
{
    $subject = $_POST['subject'];
    $summary = $_POST['summary'];

    $sql = "
        UPDATE
            papers
        SET
            subject='$subject',
            summary='$summary'
        WHERE
            id=$paper";

    $res = $db->query($sql);

    if($res)
    {
        echo "<p class='msg success'>با موفقیت انجام شد.</p>";
    }
    else
    {
        echo "<p class='msg error'>عملیات نا موفق بود.</p>";
    }
}

$sql = "
    SELECT
        id,
        summary,
        subject
    FROM
        papers
    WHERE
        id=$paper";

$res = $db->query($sql);
$res = $res->fetch();
?>

<div id="content">
    <form method="POST">
        <input name="id" type="hidden" value="<?php echo $res['id'] ?>" >
        <input name="subject" type="text" value="<?php echo $res['subject'] ?>" placeholder="موضوع">
        <textarea name="summary"><?php echo $res['summary'] ?></textarea>
        <input name="submit" type="submit"  value="ویراش" >
    </form>
</div>
