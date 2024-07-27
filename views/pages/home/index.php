<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/HotelController.php";
include_once __DIR__ . "/../../../controllers/DistrictController.php";
include_once __DIR__ . "/../../../controllers/ConfigController.php";
include_once __DIR__ . "/../../../controllers/PostController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$hotelController = new HotelController($conn);
$districtController = new DistrictController($conn);
$configController = new ConfigController($conn);
$postController = new PostController($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - Traveler Theme</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/views/pages/home/Vendors/Bootstrapt/bootstrap.css">
    <link rel="stylesheet" href="/views/pages/home/Vendors/Slick/slick-theme.css">
    <link rel="stylesheet" href="/views/pages/home/Vendors/Slick/slick.css">
    <link rel="stylesheet" href="/views/pages/home/Css/Style.css">
</head>

<body>
    <!-- .Header Start  -->
    <div class="header-navs">
        <div class="navs-size">
            <div class="col-12">
                <div class="navs-box">
                    <div class="img d-none d-md-block">
                        <img src="/views/pages/home/Images/download.svg" alt="#">
                    </div>
                    <div class="img-phone d-flex d-sm-block d-lg-none d-md-none">
                        <div class="open">
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

                        </div>
                        <img src="/views/pages/home/Images/logo-phone.svg" alt="#">
                    </div>
                    <div id="mySidenav" class="slide-menu">
                        <div class="slide-left">
                            <button href="javascript:void(0)" class="closebtn" onclick="closeNav()"">
                                <i class=" fas fa-angle-left"></i>
                            </button>
                            <button class="accordion">HOME</button>
                            <button class="accordion">HOTEL</button>
                            <button class="accordion">TOUR</button>
                            <button class="accordion">ACTIVITY</button>
                            <button class="accordion">Rental</button>
                            <button class="accordion">CAR</button>
                            <button class="accordion">Pages</button>
                        </div>
                    </div>


                    <div class="navs d-none d-lg-block">
                        <ul>

                            <li><a href="#">HOME</a></li>
                            <li><a href="/views/pages/list/?rate=3">KHÁCH SẠN 3 SAO</a></li>
                            <li><a href="/views/pages/list/?rate=4">KHÁCH SẠN 4 SAO</a></li>
                            <li><a href="/views/pages/list/?rate=5">KHÁCH SẠN 5 SAO</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1>Hi There!</h1>
                <p>Where would you like to go?</p>
            </div>
        </div>

    </div>
    <!-- Header End  -->
    <!-- Sale -->
    <?php
    $hotels = $hotelController->getHotelPromotions();
    include_once __DIR__ . '/promotion.php';
    ?>
    <!-- End sale -->
    <!-- Quận huyện -->
    <?php
    $districts = $districtController->getDistrictsByCityId(1);
    include_once __DIR__ . '/district.php';
    ?>
    <!-- End quận huyện -->

    <!-- Hotel hot -->
    <?php
    $hotels_hot = $hotelController->getHotelsHot();
    include_once __DIR__ . '/hotel_host.php';
    ?>
    <!-- Hotel hot -->


    <!--____________Footer Start________________-->

    <?php
    $config = $configController->getVisibleConfig();
    $posts = $postController->getShowPost();
    include __DIR__ . '/../common/footer.php';
    ?>

    <!--____________Footer End________________-->
    <script src="/views/pages/home/Vendors/Jquery/jquery-3.5.1.min.js"></script>
    <script src="/views/pages/home/Vendors/Slick/slick.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/views/pages/home/Js/Script.js"></script>
</body>

</html>