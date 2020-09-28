<?php
    require_once "../db.php";
    $id = $_POST['id'];
    $name = $_POST['cate_name'];
    $show = $_POST['show_menu'];

    $nameerr ="";
    $showerr ="";

    if(strlen($name) <2 || strlen($name) >191){
        $nameerr = "Yêu cầu nhập tên nằm trong khoảng từ 2->191 kí tự";
    }
    if(!is_numeric(($show))) {
        $showerr="Yêu cầu nhập giá tiền là số";
    }

    if($nameerr .$showerr !==""){
        header("location: edit_cate.php?id=$id&cate_nameerr=$nameerr&show_menuerr=$showerr");
        die;
    }
    $getUpdadeCategoryByID = "select * from categories where id ='$id'";
    $category= $db->query($getUpdadeCategoryByID);

    $UpdateCategoryQuery = "update categories set
                                                cate_name='$name',
                                                show_menu='$show'
                                                where id='$id'";
                            $categori= $db->query($UpdateCategoryQuery);

                            $cate = $categori->fetch();

                if($UpdateCategoryQuery){
                     header("location: index.php");
  }
