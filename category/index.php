<?php
require_once "../db.php";
$categories = "SELECT * FROM categories";
$category = $db->query($categories);
$category = $category->fetchALL();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">;

</head>

<body>
    <h1>Danh mục sản phẩm </h1>
    <td><a type="submit" class="btn btn-primary" href="../product/index.php">Danh sách sản phẩm</a></td>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">showmenu</th>

                <th colspan="2"> <a href="add_cate.php" style="color:white;">Thêm</a> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($category as $cate) : ?>
                <tr>
                    <td><?php echo $cate['id'] ?></td>
                    <td><?php echo $cate['cate_name'] ?></td>
                    <td>
                        <label class="switch">
                            <input type="checkbox"  class="driver" data-cate-id="<?php echo $cate['id'] ?>" data-show_menu_status="<?php echo $cate['show_menu'] ?>"
                                <?php if($cate['show_menu'] == 1): ?>
                                    checked
                                <?php endif; ?>
                            />
                            <span class="slider round" id="on"></span>
                        </label>
                    </td>

                    <th><a style="padding-right: 20px;" href="<?php echo 'edit_cate.php?id=' . $cate['id'] ?>">Sửa</a>
                        <a href="<?php echo 'remove.php?id=' . $cate['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa danh mục không ?')">Xóa</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.driver').on('change', function(){
                const cateId = $(this).data('cate-id');
                const showMenuStatus = $(this).data('show_menu_status');
                $.ajax({
                    url: 'update_cate_show_menu.php',
                    method: 'POST',
                    data: {
                        cate_id: cateId,
                        current_status: showMenuStatus
                    },
                    dataType: 'json',
                    success: function(response){
                            alert('Cập nhật thành công');
                    }
                })
            })
        });
    </script>
</body>
</html>
