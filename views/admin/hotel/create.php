<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới khách sạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px; overflow-y: scroll;">
                <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên khách sạn</label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Tên khách sạn...">
                    </div>
                    <div class="form-group">
                        <label for="rate">Rating</label>
                        <select class="form-control" name="rate" required id="rate">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" required class="form-control" id="address" placeholder="Địa chỉ...">
                    </div>
                    <div class="form-group">
                        <label for="desc">Mô tả</label>
                        <textarea rows="4" type="text" name="description" required class="form-control" id="desc" placeholder="Mô tả..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" required class="form-control" id="phone" placeholder="Số điện thoại...">
                    </div>
                    <div class="form-group">
                        <label for="number_rooms">Số phòng</label>
                        <input type="text" name="number_of_rooms" required class="form-control" id="number_rooms" placeholder="Số phòng...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="Email...">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" required class="form-control" id="website" placeholder="Website...">
                    </div>
                    <div class="form-group">
                        <label for="lat">Latitude</label>
                        <input type="text" name="latitude" required class="form-control" id="lat" placeholder="Latitude...">
                    </div>
                    <div class="form-group">
                        <label for="long">Longitude</label>
                        <input type="text" name="longitude" required class="form-control" id="long" placeholder="Latitude...">
                    </div>
                    <div class="form-group">
                        <label>Type:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" checked name="type" id="inlineRadio1" value="hotel">
                            <label class="form-check-label" for="inlineRadio1">Hotel</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="resort">
                            <label class="form-check-label" for="inlineRadio2">Resort</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="homestay">
                            <label class="form-check-label" for="inlineRadio3">Homestay</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amenities">Amenities:</label>
                        <select name="amenities[]" id="amenities" multiple class="form-control">
                            <?php foreach ($amenities as $amenity) : ?>
                                <option value="<?php echo $amenity['id']; ?>"><?php echo htmlspecialchars($amenity['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="city_id">Tên tỉnh</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <?php foreach ($cities as $city) : ?>
                                <option value="<?php echo $city['id']; ?>"><?php echo htmlspecialchars($city['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="district_id">Tên quận huyện</label>
                        <select name="district_id" id="district_id" class="form-control">
                            <?php foreach ($districts as $district) : ?>
                                <option value="<?php echo $district['id']; ?>"><?php echo htmlspecialchars($district['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="isHot" name="isHot" />
                            <label class="form-check-label" for="isHot">Hot</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="isPromotion" name="isPromotion" />
                            <label class="form-check-label" for="isPromotion"> Khuyến mại </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Images:</label>
                        <br>
                        <input type="file" id="imageUpload" name="images[]" multiple accept="image/*"><br>
                    </div>
                    <div id="previewContainer" class="row text-center overflow-hidden" style="gap: 30px;"></div>
                    <div class="d-flex" style="justify-content: flex-end;">
                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    const imageUpload = document.getElementById('imageUpload');
    const previewContainer = document.getElementById('previewContainer');
    let filesArray = [];

    imageUpload.addEventListener('change', (event) => {
        filesArray = Array.from(event.target.files);
        updatePreview();
    });

    function updatePreview() {
        previewContainer.innerHTML = ''; // Clear previous previews
        filesArray.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const col = document.createElement('div');
                col.classList.add('col-md-5', 'mb-3', 'position-relative');
                col.style.height = '300px';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-fluid');
                img.style.width = '100%';
                img.style.objectFit = 'cover';
                img.style.height = '100%';

                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'position-absolute', 'top-0', 'right-0', 'm-2');
                removeButton.textContent = 'X';
                removeButton.onclick = () => {
                    filesArray.splice(index, 1);
                    updateFileInput();
                    updatePreview();
                };

                col.appendChild(img);
                col.appendChild(removeButton);
                previewContainer.appendChild(col);
            };
            reader.readAsDataURL(file);
        });
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => {
            dataTransfer.items.add(file);
        });
        imageUpload.files = dataTransfer.files;
    }

    // Trigger file input when label is clicked
    document.querySelector('label[for="imageUpload"]').addEventListener('click', () => {
        imageUpload.click();
    });
</script>