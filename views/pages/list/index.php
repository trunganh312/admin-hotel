<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/HotelController.php";
include_once __DIR__ . "/../../../controllers/ConfigController.php";
include_once __DIR__ . "/../../../controllers/PostController.php";

$hotelController = new HotelController($conn);
$configController = new ConfigController($conn);
$postController = new PostController($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/views/pages/list/css/style.css">
    <link rel="stylesheet" href="/views/pages/list/vendors/pluginCss/calendar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="/views/pages/list/vendors/bootstrap/bootstrap.css">
</head>

<body>
    <!-- Top Header End   -->
    <!-- .Header Start  -->
    <div class="header-navs">
        <div class="navs-size">
            <div class="col-12">
                <div class="navs-box">
                    <div class="img d-none d-md-block">
                        <img src="/views/pages/list/img/download.svg" alt="#">
                    </div>
                    <div class="img-phone row d-sm-block d-lg-none d-md-none">
                        <div class="open">
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

                        </div>
                        <img src="/views/pages/list/img/logo-phone.svg" alt="#">
                    </div>
                    <div id="mySidenav" class="slide-menu">
                        <div class="slide-left">
                            <button href="javascript:void(0)" class="closebtn" onclick="closeNav()"">
                                <i class=" fas fa-angle-left"></i>
                            </button>

                            <button class="accordion">HOME</button>
                            <button class="accordion">HOTEL</button>
                            <div class="panel">
                                <ul class="m-0 p-0">
                                    <li class="left-line">Listing</li>
                                    <li>Search Popup Map</li>
                                    <li>Search Half Map</li>
                                    <li class="text-primary">Search Full Map</li>
                                    <li class="left-line">Single Detail</li>
                                    <li>Booking At The Sidebar</li>
                                    <li>Booking At The Bottom</li>
                                    <li>Top Half-Map</li>
                                    <li>Top Slider Image</li>

                                    <div class="new-comment">
                                        <li>Background on Top</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <li class="left-line">House</li>
                                    <li>Top Slider</li>
                                    <li>Background Header</li>
                                    <img src="/views/pages/list/img/download.png" alt="">
                                </ul>
                            </div>

                            <button class="accordion">TOUR</button>
                            <div class="panel">
                                <ul class="m-0 p-0">
                                    <li class="left-line">Listing</li>
                                    <li>Top Search Layout</li>
                                    <li>Slidebar Search Layout</li>
                                    <li class="left-line">Single Detaile</li>
                                    <li>External Booking</li>
                                    <li>Daily Tour</li>
                                    <li>Tour Package</li>
                                    <li>Tour Starttime</li>
                                    <div class="new-comment">
                                        <li>Mapbox</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <div class="new-comment">
                                        <li>Book & Inquiry Form</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <div class="new-comment">
                                        <li>Inquiry Form</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <img src="/views/pages/list/img/download.png" alt="">
                                </ul>
                            </div>
                            <button class="accordion">ACTIVITY</button>
                            <div class="panel">
                                <ul class="m-0 p-0">
                                    <li class="left-line">Listing</li>
                                    <li>Top Search Layout</li>
                                    <li>Slidebar Search Layout</li>
                                    <li class="left-line">Single Detaile</li>
                                    <li>External Booking</li>
                                    <li>Daily Tour</li>
                                    <li>Tour Package</li>
                                    <li>Tour Starttime</li>
                                    <div class="new-comment">
                                        <li>Mapbox</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <div class="new-comment">
                                        <li>Book & Inquiry Form</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <div class="new-comment">
                                        <li>Inquiry Form</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <img src="/views/pages/list/img/download.png" alt="">
                                </ul>
                            </div>
                            <button class="accordion">Rental</button>
                            <div class="panel">
                                <ul class="m-0 p-0">
                                    <li class="left-line">Listing</li>
                                    <li>Top Search Layout</li>
                                    <li>Slidebar Search Layout</li>
                                    <li class="left-line">Single Detaile</li>
                                    <li>External Booking</li>
                                    <li>Daily Tour</li>
                                    <li>Tour Package</li>
                                    <li>Tour Starttime</li>
                                    <div class="new-comment">
                                        <li>Mapbox</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <div class="new-comment">
                                        <li>Book & Inquiry Form</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <div class="new-comment">
                                        <li>Inquiry Form</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <img src="/views/pages/list/img/download.png" alt="">
                                </ul>
                            </div>
                            <button class="accordion">CAR</button>
                            <div class="panel">
                                <ul class="m-0 p-0">
                                    <li>Car Top Search</li>
                                    <li>Car Sidebar Search</li>
                                    <li>Single Style</li>
                                </ul>
                            </div><button class="accordion">Pages</button>
                            <div class="panel">
                                <ul class="m-0 p-0">
                                    <li>Author Profile</li>
                                    <li>Become Local Expert</li>
                                    <div class="new-comment">
                                        <li>Destination</li>
                                        <div class="new">
                                            <h3>NEW</h3>
                                        </div>
                                    </div>
                                    <li>About Us</li>
                                    <li>FAQs</li>
                                    <li>404 Page</li>
                                    <li>Contacr</li>
                                </ul>
                            </div>


                        </div>
                    </div>


                    <div class="navs d-none d-lg-block">
                        <ul>

                            <li><a href="#">HOME</a></li>
                            <li class="boss-1"><a href="#">HOTEL</a>
                                <i class="fas fa-angle-down"></i>
                                <div class="boss1-second">
                                    <div class="container">
                                        <div class="into-navs row">
                                            <div class="col-3">
                                                <h2 class="left-line">
                                                    Listing
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Search Popup Map
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Search Half Map
                                                </h2>
                                                <hr>
                                                <h2 class="blue-one">
                                                    Search Full Map
                                                </h2>
                                            </div>
                                            <div class="col-3">
                                                <h2 class="left-line">
                                                    Single Detaile
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Booking At The Sidebar
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Booking At The Bottom
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Top Half-Map
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Top Slider Image
                                                </h2>
                                                <hr>
                                                <div class="new-comment">
                                                    <h2>
                                                        Background on Top
                                                    </h2>
                                                    <div class="new">
                                                        <h3>NEW</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <h2 class="left-line">
                                                    House
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Top Slider
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Background Header
                                                </h2>
                                            </div>
                                            <div class="col-3">
                                                <img src="/views/pages/list/img/download.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="boss-2"><a href="#">TOUR</a>
                                <i class="fas fa-angle-down"></i>
                                <div class="boss2-second">
                                    <div class="container">
                                        <div class="into-navs row">
                                            <div class="col-4">
                                                <h2 class="left-line">
                                                    Listing
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Top Search Layout
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Sidebar Search Layout
                                                </h2>
                                            </div>
                                            <div class="col-4">
                                                <h2 class="left-line">
                                                    Single Detaile
                                                </h2>
                                                <hr>
                                                <h2>
                                                    External Booking
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Daily Tour
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Tour Package
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Tour Starttime
                                                </h2>
                                                <hr>
                                                <div class="new-comment">
                                                    <h2>
                                                        Map Box
                                                    </h2>
                                                    <div class="new">
                                                        <h3>NEW</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="new-comment">
                                                    <h2>
                                                        Book & Inquiry Form
                                                    </h2>
                                                    <div class="new">
                                                        <h3>NEW</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="new-comment">
                                                    <h2>
                                                        Inquiry Form
                                                    </h2>
                                                    <div class="new">
                                                        <h3>NEW</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img src="/views/pages/list/img/download.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="boss-3"><a href="#">ACTIVITY</a>
                                <i class="fas fa-angle-down"></i>
                                <div class="boss3-second">
                                    <div class="container">
                                        <div class="into-navs row">
                                            <div class="col-4">
                                                <h2 class="left-line">
                                                    Listing
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Rental Popup Search
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Rental Half-Map Search
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Rental Full-Map Search
                                                </h2>
                                            </div>
                                            <div class="col-4">
                                                <h2 class="left-line">
                                                    Single Detaile
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Full Header
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Image Slider
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Boxed Layout
                                                </h2>

                                            </div>
                                            <div class="col-4">
                                                <img src="/views/pages/list/img/download.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="boss-4"><a href="#">RENTAL</a>
                                <i class="fas fa-angle-down"></i>
                                <div class="boss4-second">
                                    <div class="container">
                                        <div class="into-navs row">
                                            <div class="col-4">
                                                <h2 class="left-line">
                                                    Listing
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Rental Popup Search
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Rental Half-Map Search
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Rental Full-Map Search
                                                </h2>
                                            </div>
                                            <div class="col-4">
                                                <h2 class="left-line">
                                                    Single Detaile
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Full Header
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Image Slider
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Boxed Layout
                                                </h2>

                                            </div>
                                            <div class="col-4">
                                                <img src="/views/pages/list/img/download.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="boss-5"><a href="#">CAR</a>
                                <i class="fas fa-angle-down"></i>
                                <div class="boss5-second">
                                    <div class="container">
                                        <div class="into-navs">
                                            <div class="comments">
                                                <h2>
                                                    Car Top Search
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Car Sidebar Search
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Single Style
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="boss-6"><a href="#">PAGES</a>
                                <i class="fas fa-angle-down"></i>
                                <div class="boss6-second">
                                    <div class="container">
                                        <div class="into-navs">
                                            <div class="comments">
                                                <h2>
                                                    Author Profile
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Become Local Expert
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Single Style
                                                </h2>
                                                <hr>
                                                <div class="new-comment">
                                                    <h2>
                                                        Destination
                                                    </h2>
                                                    <div class="new">
                                                        <h3>NEW</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h2>
                                                    About Us
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Fags
                                                </h2>
                                                <hr>
                                                <h2>
                                                    404 Page
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Contact
                                                </h2>
                                                <hr>
                                                <h2>
                                                    Blog
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="navs-end row flex">
                        <i class="fas fa-shopping-basket"></i>
                        <a class="d-none d-xl-block" href="#">Become Local Expert</a>
                        <i class="fas fa-search  d-none d-xl-block"></i>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1>Search Hotel Full Map</h1>
            </div>
            <div class="comments d-md-none d-sm-block">
                <select class="form-control border-0 text-primary d-sm-block">

                    <div class="all-options">
                        <option value="">San Francisco</option>
                        <option value="">California</option>
                        <option value="">Navada</option>
                        <option value="">New York City</option>
                        <option value="">Amsterdam</option>
                    </div>

                </select>
            </div>

        </div>
        <!-- Header End  -->
        <!-- Hotels Start  -->
        <div class="hotels pt-3 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-0">

                        <!-- List hotel -->
                        <?php
                        $hotels = $hotelController->search();
                        ?>
                        <!-- End list hotel -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Hotesl End  -->

        <?php
        $config = $configController->getVisibleConfig();
        $posts = $postController->getShowPost();
        include __DIR__ . '/../common/footer.php';
        ?>


        <script src="/views/pages/list/vendors/jquery/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="/views/pages/list/js/app.js"></script>
</body>

</html>