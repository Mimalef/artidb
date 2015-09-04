<?php
include "admin_permission.php";
include "../com/conn.php";
include "admin_nav.php";

$sql = "
    SELECT
        id,
        name,
        family,
        username,
        password
    FROM
        users
    WHERE
        accept <> 1";

$res = $db->query($sql);
$res = $res->fetchAll();
?>

<div id="content">
    <?php if(!$res) { ?>
        <p class="center">هیچ کاربر تایید نشده ای یافت نشد.</p>
    <?php die(); } ?>

    <table>
        <tr>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>نام کاربری</th>
            <th>گذرواژه</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['family'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><a href="admin_user_accept.php?id=<?php echo $row['id'] ?>">قبول عضویت</a></td>
                <td><a href="admin_user_reject.php?id=<?php echo $row['id'] ?>">رد صلاحیت</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
