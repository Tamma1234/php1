<?php
require_once "../db.php";
$getCateQueyry = "SELECT * FROM categories";
$getCategoryQueyry = $db->query($getCateQueyry);
$category = $getCategoryQueyry->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <style>
    .error {
      color: red;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <h1>THÊM DANH MỤC</h1>
  <form class="container" method="post" enctype="multipart/form-data" action="save_add.php">
    <div class="form-group">
    <label for="">Tên danh mục</label>
      <input type="text" class="form-control" id="" name="cate_name">
      <?php if (isset($_GET['cate_nameerr'])) : ?>
        <label class="error"><?= $_GET['cate_nameerr'] ?></label>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="">Show_menu</label>
      <input type="text" class="form-control" id="" name="show_menu">
      <?php if (isset($_GET['showerr'])) : ?>
        <label class="error"><?= $_GET['showerr'] ?></label>
      <?php endif; ?>
    </div>


    <button type="submit" class="btn btn-primary">Thêm </button>
        <a type="submit" href="index.php"  class="btn btn-primary"> Huy</a>
  </form>
</body>

</html>
