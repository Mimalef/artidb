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
        password,
        email,
        tel,
        address
    FROM
        judges";

$res = $db->query($sql);
$res = $res->fetchAll();?>
<div id="content">
    <table>
        <tr>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>نام کاربری</th>
            <th>گذرواژه</th>
            <th>ایمیل</th>
            <th>تلفن</th>
            <th>ادرس</th>

        </tr>
        <?php foreach ($res as $row) { ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['family'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['tel'] ?></td>
                <td><?php echo $row['address'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
