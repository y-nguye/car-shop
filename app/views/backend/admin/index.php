<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'app/views/resources/css/styles.php' ?>
    <?php include_once 'app/views/backend/product/productPageStyle.php'; ?>
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-3">

                <?php
                $item_select = "admin";
                include_once 'app/views/backend/layout/sidebar.php';
                ?>

            </div>

            <div class="col-9">
                <h1>Admin Page</h1>
            </div>
        </div>
    </div>

    <?php
    include_once 'app/views/resources/script/script.php';
    ?>

</body>

</html>