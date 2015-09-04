<?php
include "user_permission.php";
include "../com/conn.php";
include "user_nav.php";

if(isset($_FILES['paper']))
{
    $subject = $_POST['subject'];
    $user = $_SESSION['user'];
    $sum = $_POST['summary'];
    $date = date("Y-m-d");

    $sql = "
        INSERT INTO papers(
            user,
            subject,
            date,
            summary)
        VALUES (
            '$user',
            '$subject',
            '$date',
            '$sum')";

    $res = $db->query($sql);

    move_uploaded_file($_FILES["paper"]["tmp_name"], "../files/" . $db->lastInsertId());

    if($res)
    {
        echo "<p class='msg success'>با موفقیت انجام شد.</p>";
    }
    else
    {
        echo "<p class='msg error'>عملیات نا موفق بود.</p>";
    }
}
?>
<div id="content">
    <form method="post" enctype="multipart/form-data">
        <input name="paper" type="file">
        <input name="subject" type="text" placeholder="موضوع">
        <textarea name="summary" placeholder="چکیده"></textarea>
        <input name="submit" type="submit" value="ارسال">
    </form>
</div>
