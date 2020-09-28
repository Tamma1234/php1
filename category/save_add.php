<?php
    require_once "../db.php";
    $name = $_POST['cate_name'];
    $show = $_POST['show_menu'];

    $cate_nameerr ="";
    $showerr ="";

    if(strlen($name) <2 || strlen($name) >191){
        $cate_nameerr = "Yêu cầu nhập tên nằm trong khoảng từ 2->191 kí tự";
    }
    if(!is_numeric(($show))) {
        $showerr="Yêu cầu nhập giá tiền là số";
    }

    if($cate_nameerr .$showerr !==""){
        header("location: add_cate.php?cate_nameerr=$cate_nameerr&showerr=$showerr");
        die;

    }
    $insertCategoryQuery = "insert into categories
                                                        (cate_name ,show_menu)
                                            values
                                                        ('$name', '$show')";

    $categoryQuery = $db->query($insertCategoryQuery);

    if($insertCategoryQuery){
        header("location: index.php");
    }
?>
