<?php
require_once '../db.php';
$cateId = $_POST['cate_id'];
$status = $_POST['current_status'];


$status = $status == 1 ? 0 : 1;
$sqlQuery = "update categories set show_menu = $status where id = $cateId";
$stmt = $db->prepare($sqlQuery);
$stmt->execute();
echo json_encode([
    "result" => true
]);


?>
