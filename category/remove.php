<?php
    require_once "../db.php";
    $id = isset($_GET['id']) ? $_GET['id'] : -1;

    $getRemoveCategory= "select * from categories where id =$id";
    $remove = $db->query($getRemoveCategory);
    $removeCategory= "delete from categories where id =$id";
    $db->query($removeCategory);

    header("location: index.php");
?>
