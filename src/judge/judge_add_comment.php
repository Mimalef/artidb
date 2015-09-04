<?php
include "judge_permission.php";
include "judge_nav.php";
include "../com/conn.php";

if(isset($_POST['submit']))
{
    $text = $_POST['text'];
    $name = $_SESSION['judge'];
    $date = date("Y-m-d");
    $rate = $_POST['rate'];
    $paper = $_POST['id'];


    $sql = "
        INSERT INTO comments(
            id,
            judge,
            paper,
            text,
            date,
            rate)
        VALUES (
            NULL,
            '$name',
            '$paper',
            '$text',
            '$date',
            $rate)";

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
?>
<div id="content">
    <form action="" method="POST">
        <input name="id" type="hidden" value="<?php echo $_POST['id'] ?>" >
        <textarea name="text" placeholder="متن نظر"></textarea>
        <input name="rate" type="text" placeholder="امتیاز">
        <input name="submit" type="submit" value="ثبت">
    </form>

</div>
