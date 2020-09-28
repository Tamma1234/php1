<?php
require_once "../db.php";
$name = $_POST['name'];
$cate = $_POST['cate'];
$image = $_FILES['image'];
$price = $_POST['price'];

$short = $_POST['short_desc'];
$detail = $_POST['detail'];
$star = $_POST['star'];
$view = $_POST['views'];

$nameerr = "";

$priceerr="";
$shorterr="";
$detailerr="";
$imageerr="";
$starerr="";
$viewerr="";

if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên  nằm trong khoảng 2-191 ký tự";
}



if(!is_numeric(($price))) {
    $priceerr="Yêu cầu nhập giá tiền là số";
}

if( is_numeric(($price)) && (int)$price <= 0){
    $priceerr="Yêu cầu nhập số";
}

if(strlen($short) < 2 || strlen($short) > 191){
    $shorterr="Yêu cầu nhập mô tả cho sản phẩm";
}

if(strlen($detail) < 2 || strlen($detail) > 191){
    $detailerr="Yêu cầu nhập chi tiết ";
}

if(!$image['size'] > 0) {
    $imageerr ="Yeu cau nhap file anh";
}

if(!is_numeric(($star))) {
    $starerr="Yêu cầu nhập đánh giá tiền là số";
}

if(!is_numeric(($view))) {
    $viewerr="Yêu cầu nhập lượt xem  là số";
}

if($nameerr . $priceerr . $descerr .$detailerr .$imageerr .$starerr .$viewerr !== ""){
    header("location: add-product.php?nameerr=$nameerr&priceerr=$priceerr&shorterr=$shorterr&detailerr=$detailerr&imageerr=$imageerr&starerr=$starerr&viewerr=$viewerr");
    die;
}
// $filename = $news['image'];

    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../upload/" . $filename);
    $filename = "../upload/" . $filename;
    $insertProduct = "insert into products (name,cate_id,image,price,short_desc,detail,star,views)
                                values('$name','$cate','$filename','$price','$short','$detail','$star','$view')";
    $products = $db->query($insertProduct);
    $product = $products->fetchAll();
    if ($insertProduct) {
        header("location: index.php");
    }
