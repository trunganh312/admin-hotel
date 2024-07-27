<div class="modal fade" id="createModalCity" tabindex="-1" aria-labelledby="createModalCityLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới tỉnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên tỉnh</label>
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Tên tỉnh...">
                    </div>

                    <div class="d-flex" style="justify-content: flex-end;">
                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>