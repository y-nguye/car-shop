<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div>
        <h3>Danh sách sản phẩm</h3>
        <a href='./product/add'>Thêm sản phẩm</a>
        <br />
        <br />
        <?php
        while ($row = $data->fetch_assoc()) {
            print_cars($row);
        }
        ?>

    </div>
</body>

</html>

<?php
function print_cars($row)
{
    foreach ($row as $key => $value) {
        echo $key . ': ' . $value . " | ";
    }
    echo '<a href="./product/edit/' . $row['car_id']  . '">Sửa</a>';
    echo '<a href="./product/delete/' . $row['car_id']  . '">Xoá</a> <br/>';
}
?>