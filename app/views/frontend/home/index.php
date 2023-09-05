<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'app/views/resources/css/styles.php' ?>
    <link href="app/views/frontend/home/homePageStyle.css" rel="stylesheet" type="text/css" />
    <title>Trang chủ</title>
</head>

<body>

    <?php
    include_once 'app/views/resources/layouts/header.php'
    ?>

    <div class="container-xxl">
        <div class="d-flex justify-content-center">
            <div id="carouselExampleCaptions" class="carousel slide rounded-3" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-shadow"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h3><a class="text-white" href="#">Mercedes-Benz A-Class</a></h3>
                            <p>Điều kỳ diệu trong thế giới riêng độc đáo và thời thượng</p>
                        </div>
                        <img src="assets/imgs/1.jpg" class="d-block" alt="mercedes_class_a">
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-shadow"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h3><a class="text-white" href="#">Hyundai Accent</a></h3>
                            <p>Thiết kế phong cách và giàu công nghệ</p>
                        </div>
                        <img src="assets/imgs/2020-Hyundai-Accent.jpg" class="d-block " alt="mercedes_class_a">
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-shadow"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h3>C-Class</h3>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        <img src="assets/imgs/Mercedes_Benz_A_200_Hatch.jpg" class="d-block" alt="mercedes_class_a">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <h1 class="text-danger"></i> Hello, đây là trang chủ cửa hành xe hơi tốt nhất việt nam</h1>

        <h3>Danh sách sản phẩm</h3>
        <br />
        <?php
        while ($row = $data->fetch_assoc()) {
            print_cars($row);
        }
        ?>
    </div>

    <?php
    include_once 'app/views/resources/layouts/header.php';
    include 'app/views/resources/script/script.php'
    ?>

</body>

</html>


<?php
function print_cars($row)
{
    foreach ($row as $key => $value) {
        echo $key . ': ' . $value . " | ";
    }
    echo "<br />";
}
?>