<section class="third-page">
    <div class="container">
        <div class="row">
            <div class="third-top row">
                <p>Danh sách khách sạn nổi bật:</p>
            </div>
        </div>

    </div>
    <div class="third-bottom">
        <div class="container">
            <div class="aaa">

                <?php foreach ($hotels_hot as $hotel_hot) : ?>
                    <div class="tour-top">
                        <div class="top-img">
                            <a href="/views/pages/detail/?hotel_id=<?php echo $hotel_hot['id'] ?>">
                                <img style="width: 300px; height: 300px;" src="<?php echo  $hotel_hot['image_name'] ? '/uploads/hotels/' . htmlspecialchars($hotel_hot['image_name']) : 'https://picsum.photos/200/300'; ?>" alt="">
                            </a>

                        </div>
                        <div class="third-top-text d-flex ">
                            <h6><?php echo $hotel_hot['type'] ?></h6>
                            <i style="cursor: pointer;" class="aaaaa fas fa-heart"></i>
                            <p>11%</p>
                        </div>
                        <a href="/views/pages/detail/?hotel_id=<?php echo $hotel_hot['id'] ?>">
                            <div class="tour-bottom">
                                <div class="tour-border">
                                    <div class="bottom-1 d-flex">
                                        <i class="fas fa-thumbtack"></i>
                                        <p><?php echo $hotel_hot['address'] ?></p>
                                    </div>
                                    <div class="bottom-2">
                                        <a href="#"><?php echo $hotel_hot['name'] ?></a>
                                        <div class="bottom-star d-flex pt-2" style="opacity: 0.6; ">
                                            <i class="fas fa-star pt-2" style="color:   gold;"></i>
                                            <i class="fas fa-star pt-2" style="color: gold;"></i>
                                            <i class="fas fa-star pt-2" style="color: gold;"></i>
                                            <i class="fas fa-star pt-2" style="color: gold;"></i>
                                            <i class="far fa-star pt-2"></i>
                                            <p class="pl-2 mt-1">7 Reviews</p>
                                        </div>
                                    </div>
                                    <div class="bottom-3 d-flex " style="opacity: 0.6;">
                                        <i class="far fa-clock mt-2"></i>
                                        <p class="pl-2 mt-1">8 hours</p>
                                        <div class="bottom-3-right d-flex  ml-5">
                                            <i class="fas fa-bolt mt-2 pr-1"></i>
                                            <p class="mt-1">from</p>
                                            <h5 class="mt-1">$89,00</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
</section>