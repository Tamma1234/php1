<?php
include_once "../db.php";
$category = "SELECT * FROM categories";
$categories = $db->query($category);
$categories = $categories->fetchAll();

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
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <h1>Thêm Sản Phẩm </h1>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="save-add.php">
            <div class="form-group">
                <label for="">Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name">
                <?php if (isset($_GET['nameerr'])) : ?>
                    <label class="error"><?= $_GET['nameerr'] ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">Loại sp<span class="text-danger">*</span></label>
                <br>
                <select class="form-control form-control-lg" name="cate" id="">
                    <?php foreach ($categories as $cate) : ?>
                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['cate_name'] ?></option>
                    <?php endforeach; ?>

                </select>
                <br>
            </div>
            <div class="form-group">
                <label for="">image<span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="image">
                <?php if (isset($_GET['imageerr'])) : ?>
                    <label class="error"><?= $_GET['imageerr'] ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">Price<span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="price">
                <?php if (isset($_GET['priceerr'])) : ?>
                    <label class="error"><?= $_GET['priceerr'] ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">short_desc<span class="text-danger">*</span></label>
                <textarea name="short_desc" id="" cols="150" rows="10"></textarea><br>
                <?php if (isset($_GET['shorterr'])) : ?>
                    <label class="error"><?= $_GET['shorterr'] ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">detail<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="detail">
                <?php if (isset($_GET['detailerr'])) : ?>
                    <label class="error"><?= $_GET['detailerr'] ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">star<span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="star">
                <?php if (isset($_GET['starerr'])) : ?>
                    <label class="error"><?= $_GET['starerr'] ?></label>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">views<span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="views">
                <?php if (isset($_GET['viewerr'])) : ?>
                    <label class="error"><?= $_GET['viewerr'] ?></label>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a type="submit" href="index.php" class="btn btn-primary">Huy</a>
        </form>
    </div>

</body>

</html>
