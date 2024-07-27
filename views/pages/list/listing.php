<form style="gap: 15px;" action="index.php" method="GET" class="filter-form d-flex my-3  ">
    <div class="d-flex" style="gap: 15px;">
        <div class="form-group">
            <input type="text" value="<?php echo isset($_GET['name']) ?  $_GET['name'] : '' ?>" id="name" name="name" class="form-control" placeholder="Enter hotel name">
        </div>
        <div class="form-group">
            <select name="sort" class="form-control">
                <option value="">Sắp xếp theo</option>
                <option <?php if (isset($_GET['sort'])) {
                            echo $_GET['sort'] == 'name' ? 'selected' : '';
                        } ?> value="name">Tên</option>
                <option <?php if (isset($_GET['sort'])) {
                            echo $_GET['sort'] == 'type' ? 'selected' : '';
                        } ?> value="type">Kiểu khách sạn</option>
            </select>
        </div>
        <div class="form-group mr-2">
            <label for="">Hạng sao</label>
            <div class="form-check">
                <input class="form-check-input" <?php if (isset($_GET['rate'])) {
                                                    echo $_GET['rate'] == '1' ? 'checked' : '';
                                                } ?> name="rate" type="checkbox" value="1" id="1" />
                <label class="form-check-label" for="1">1 sao</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" <?php if (isset($_GET['rate'])) {
                                                    echo $_GET['rate'] == '2' ? 'checked' : '';
                                                } ?> name="rate" type="checkbox" value="2" id="2" />
                <label class="form-check-label" for="2">2 sao</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" <?php if (isset($_GET['rate'])) {
                                                    echo $_GET['rate'] == '3' ? 'checked' : '';
                                                } ?> name="rate" type="checkbox" value="3" id="3" />
                <label class="form-check-label" for="3">3 sao</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" <?php if (isset($_GET['rate'])) {
                                                    echo $_GET['rate'] == '4' ? 'checked' : '';
                                                } ?> name="rate" type="checkbox" value="4" id="4" />
                <label class="form-check-label" for="4">4 sao</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" <?php if (isset($_GET['rate'])) {
                                                    echo $_GET['rate'] == '5' ? 'checked' : '';
                                                } ?> name="rate" type="checkbox" value="5" id="5" />
                <label class="form-check-label" for="5">5 sao</label>
            </div>


        </div>
        <div class="form-group mr-2">
            <label for="">Tiện ích</label>
            <?php foreach ($amenities as $amenity) : ?>
                <?php
                // Kiểm tra xem ID tiện nghi có được chọn không
                $isChecked = isset($_GET['amenities']) && in_array($amenity['id'], $_GET['amenities']) ? 'checked' : '';
                ?>
                <div class="form-check">
                    <input <?php echo $isChecked; ?> class="form-check-input" name="amenities[]" type="checkbox" value="<?php echo $amenity['id']; ?>" id="<?php echo $amenity['name']; ?>" />
                    <label class="form-check-label" for="<?php echo $amenity['name']; ?>"><?php echo $amenity['name']; ?></label>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="form-group">
            <div class="form-check">
                <input <?php echo isset($_GET['hot']) == '1' ?  'checked' : '' ?> class="form-check-input" type="checkbox" value="1" id="hot" name="hot" />
                <label class="form-check-label" for="hot">Hot</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input <?php echo isset($_GET['promotion']) == '1' ?  'checked' : '' ?> class="form-check-input" type="checkbox" value="1" id="promotion" name="promotion" />
                <label class="form-check-label" for="promotion">Khuyến mại</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </div>

</form>

<div class="up-comments row">
    <div class="up-left">
        <h2>Tổng khách sạn <?php echo isset($_GET['district_id']) ? $district['name'] : '' ?>: <?php echo $totalHotels ?> hotels </h2>
    </div>
</div>
<!-- End form filter -->
<div class="hotel-imgs">
    <div class="col-12 p-0 m-0 row">
        <?php if (!empty($hotels)) : ?>
            <?php foreach ($hotels as $hotel) : ?>

                <div class="col-sm-12 col-md-4 p-1 m-0">
                    <a href="/views/pages/detail?hotel_id=<?php echo $hotel['id'] ?>">
                        <div class="one-hotel">
                            <div class="hotel-box">
                                <img src="<?php echo  $hotel['image_name'] ? '/uploads/hotels/' . htmlspecialchars($hotel['image_name']) : 'https://picsum.photos/200/300'; ?>" alt="">
                                <h6><?php echo $hotel['type'] ?></h6>
                                <div class="heard">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="stars">
                                    <?php
                                    $rate = $hotel['rate'];
                                    for ($i = 1; $i <= $rate; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="hotel-down">
                                <div class="hotel-box-comment">
                                    <h5><?php echo $hotel['name'] ?></h5>
                                    <div class="location d-flex">
                                        <i class="fas fa-map-marker"></i>
                                        <p><?php echo $hotel['address'] ?></p>
                                    </div>
                                </div>
                                <div class="revies d-flex">
                                    <h6><?php echo $hotel['rate'] ?>/5 Very Good</h6>
                                    <i class="fas fa-circle"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Không có khách sạn nào </p>
        <?php endif; ?>
        <div class="col-12">
            <!-- Hiển thị phân trang -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo ($page - 1); ?><?php echo isset($_GET['district_id']) ? '&district_id=' . $_GET['district_id'] : '' ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($_GET['district_id']) ? '&district_id=' . $_GET['district_id'] : '' ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo ($page + 1); ?><?php echo isset($_GET['district_id']) ? '&district_id=' . $_GET['district_id'] : '' ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="rate"]');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', (event) => {
                if (event.target.checked) {
                    // Uncheck all other checkboxes
                    checkboxes.forEach(cb => {
                        if (cb !== event.target) {
                            cb.checked = false;
                        }
                    });
                }
            });
        });
    });
</script>