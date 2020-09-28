<?php
    require_once "../db.php";
    $id = isset($_GET['id']) ? $_GET['id'] : -1;

    $getRemoveprodeuct= "select * from products where id =$id";
    $remove = $db->query($getRemoveprodeuct);
    $removeproduct= "delete from products where id =$id";
    $db->query($removeproduct);

    header("location: index.php?msg=Đã xóa thành công");
?>
