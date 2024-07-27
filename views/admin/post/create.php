<div class="modal fade" id="createModalPost" tabindex="-1" aria-labelledby="createModalPostLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" required class="form-control" id="title" placeholder="Tiêu đề...">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea type="text" name="content" required class="form-control" id="content" placeholder="Nội dung..."></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="show" name="show" />
                            <label class="form-check-label" for="show"> Show </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh:</label>
                        <br>
                        <input required type="file" id="imageUpload" name="thumbnail" accept="image/*"><br>
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
                col.style.height = '200px';
                col.style.width = '200px';

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