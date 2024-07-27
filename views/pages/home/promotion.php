<section class="first-page pt-5">
    <div class="container">
        <div class="row">
            <?php if (!empty($hotels)) : ?>
                <?php foreach ($hotels as $hotel) : ?>
                    <div class="col-sm-12 col-lg-6  pt-2">
                        <div class="bg1">
                            <div class="bg1-img">
                                <img src="<?php echo  $hotel['image_name'] ? '/uploads/hotels/' . htmlspecialchars($hotel['image_name']) : 'https://picsum.photos/200/300'; ?>" alt="">
                                <div class="bg1-text">
                                    <a href="#">Holiday Sale</a>
                                </div>
                                <div class="bg1-hover">
                                    <div class="bg1-hover-text " style="transition: .3s ease-in-out;">
                                        <h3><?php echo $hotel['name'] ?></h3>
                                        <p class="limited-description"><?php echo htmlspecialchars($hotel['description']); ?></p>

                                    </div>
                                    <a href="/views/pages/detail?hotel_id=<?php echo $hotel['id'] ?>"> <button style="border-radius: 3px; background-color: palevioletred;">Xem thêm</button></a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>

                <p>Không có khách sạn nào đang khuyến mại.</p>
            <?php endif; ?>

        </div>
    </div>
</section>