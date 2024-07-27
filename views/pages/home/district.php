<section class="second-page">
    <div class="container">
        <h3 class="mt-5">Khách sạn nổi bật tại Đà Nẵng</h3>
        <div class="row">
            <?php foreach ($districts as $district) : ?>
                <div class="col-sm-12 col-lg-4">
                    <div class="top mt-4">
                        <div class="topimg">
                            <a href="/views/pages/list/index.php?district_id=<?php echo $district['id'] ?>">
                                <img src="<?php echo htmlspecialchars($district['image']) ?>" alt="">
                                <div class="top-text">
                                    <h3><?php echo htmlspecialchars($district['name']) ?></h3>
                                    <ul class="d-flex">
                                        <li>20 Hotels</li>
                                        <li>24 Tours</li>
                                        <li>23 Activities</li>
                                        <li>15 Cars</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>