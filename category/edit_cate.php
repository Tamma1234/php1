<?php
require_once "../db.php";
$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getCategoryByIdQuery = "select * from categories where id = '$id'";
$categorys = $db->query($getCategoryByIdQuery);
$cate = $categorys->fetch();

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
    .error{
      color: red;
      font-weight: bold;
      font-family: tahoma;
    }
  </style>
</head>

<body>
  <h1>SỬA DANH MỤC</h1>
  <form class="container" method="post" enctype="multipart/form-data" action="save_edit.php">
    <div class="form-group">
      <input type="text" name="id" value="<?php echo $id ?>" hidden>
      <label for="">Tên danh mục</label>
      <input type="text" class="form-control" id="" name="cate_name" value="<?php echo $cate['cate_name'] ?>">
      <?php if (isset($_GET['cate_nameerr'])) : ?>
        <label class="error"><?= $_GET['cate_nameerr'] ?></label>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="">Show_menu</label>
      <input type="text" class="form-control" id="" name="show_menu" value="<?php echo $cate['show_menu'] ?>">
      <?php if (isset($_GET['show_menuerr'])) : ?>
        <label class="error"><?= $_GET['show_menuerr'] ?></label>
      <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Sửa </button>
    <a type="submit" href="index.php" class="btn btn-primary"> Huy</a>
  </form>
</body>

</html>
