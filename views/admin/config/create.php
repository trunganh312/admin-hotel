<div class="modal fade" id="createModalConfig" tabindex="-1" aria-labelledby="createModalConfigLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới cấu hình</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="hotline">Số hotline</label>
                        <input type="text" name="hotline" required class="form-control" id="hotline" placeholder="Số hotline...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="Email...">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" required class="form-control" id="facebook" placeholder="Facebook...">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" required class="form-control" id="instagram" placeholder="Instagram...">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="show" name="show" />
                            <label class="form-check-label" for="show"> Show </label>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: flex-end;">
                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>