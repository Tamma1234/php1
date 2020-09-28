<?php
require_once "../db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$cate = $_POST['cate'];
$image = $_FILES['image'];
$price = $_POST['price'];
$short = $_POST['short_desc'];
$detail = $_POST['detail'];
$star = $_POST['star'];
$view = $_POST['views'];

$getProductById = "select * from products where id = '$id'";
$product = $db->query($getProductById)->fetch();

$nameerr = "";
$priceerr = "";
$shorterr = "";
$detailerr = "";
$imageerr = "";
$starerr = "";
$viewerr = "";

// $filename = $news['image'];
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên  nằm trong khoảng 2-191 ký tự";
}

if (!is_numeric(($price))) {
    $priceerr = "Yêu cầu nhập giá tiền là số";
}

if (is_numeric(($price)) && (int)$price <= 0) {
    $priceerr = "Yêu cầu nhập số";
}

if (strlen($short) < 2 || strlen($short) > 191) {
    $shorterr = "Yêu cầu nhập mô tả cho sản phẩm";
}

if (strlen($detail) < 2 || strlen($detail) > 191) {
    $detailerr = "Yêu cầu nhập chi tiết ";
}

if (!is_numeric(($star))) {
    $starerr = "Yêu cầu nhập đánh giá tiền là số";
}

if (!is_numeric(($view))) {
    $viewerr = "Yêu cầu nhập lượt xem  là số";
}

if ($nameerr . $priceerr . $descerr . $detailerr . $imageerr . $starerr . $viewerr !== "") {
    header("location: edit-product.php?id=$id&nameerr=$nameerr&priceerr=$priceerr&shorterr=$shorterr&detailerr=$detailerr&imageerr=$imageerr&starerr=$starerr&viewerr=$viewerr");
    die;
}

$filename = $product['image'];
if(strlen($filename) <= 0) {
    $filename = uniqid() . '-' . $image['name'];

    move_uploaded_file($image['tmp_name'], "../upload/" . $filename);
    $filename = "../upload/" . $filename;
}

$updateProductsQuery = "update products
                                                set
                                                    name ='$name',
                                                    cate_id='$cate',
                                                    image ='$filename',
                                                    price ='$price',
                                                    short_desc ='$short',
                                                    detail ='$detail',
                                                    star ='$star',
                                                    views ='$view'
                                                where id ='$id'";
$products = $db->query($updateProductsQuery);
$product = $products->fetch();
// var_dump($updateProductsQuery);

if ($updateProductsQuery) {
    header("location: index.php");
}
