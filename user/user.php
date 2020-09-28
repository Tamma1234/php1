<?php
include_once "../db.php";
$query = 'SELECT * FROM users';
$user = $db->query($query);
$us = $user->fetchAll();
?>
<h1>Danh sách người dùng</h1>
<table border="1">
    <tr>
        <th>STT</th>
        <th>Tên đăng nhập </th>
        <th>Password</th>
    </tr>
    <?php foreach ($us as $u): ?>
        <tr>
            <th><?php echo $u['id']?></th>
            <th><?php echo $u['username']?></th>
            <th><?php echo $u['password']?></th>
        </tr>
    <?php endforeach; ?>

</table>
