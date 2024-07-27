<div class="modal fade" id="createModalDistrict" tabindex="-1" aria-labelledby="createModalDistrictLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới quận huyện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên quận huyện</label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Tên quận huyện...">
                        <div class="form-group">
                            <label for="city">Tên tỉnh</label>
                            <select name="city" id="city" class="form-control">
                                <?php foreach ($cities as $city) : ?>
                                    <option value="<?php echo $city['id']; ?>"><?php echo htmlspecialchars($city['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Link ảnh</label>
                            <input type="text" name="image" required class="form-control" id="image" placeholder="Link ảnh...">
                        </div>
                        <div class="d-flex" style="justify-content: flex-end;">
                            <button class="btn btn-primary" type="submit">Thêm mới</button>
                        </div>
                </form>

            </div>

        </div>
    </div>
</div>