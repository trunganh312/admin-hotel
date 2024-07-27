<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Admin</title>

    <!-- Custom fonts for this template -->
    <link href="../../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../public/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../sidebar.php';  ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../topbar.php';  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/views/admin/user/index.php?mod=user">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                    <h1 style="text-align: center;">Thêm mới</h1>
                    <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Tên người dùng</label>
                            <input value="<?php echo (isset($_POST['username'])) ?  $_POST['username'] : '' ?>" type="text" name="username" required class="form-control" id="username" placeholder="Tên người dùng...">
                            <span style="color: red;font-size: 14px;"><?php echo (isset($errors['username'])) ? $errors['username'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input value="<?php echo (isset($_POST['fullname'])) ?  $_POST['fullname'] : '' ?>" type="text" name="fullname" required class="form-control" id="fullname" placeholder="Họ và tên...">
                            <span style="color: red;font-size: 14px;"><?php echo (isset($errors['fullname'])) ? $errors['fullname'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input value="<?php echo (isset($_POST['password'])) ?  $_POST['password'] : '' ?>" type="password" name="password" required class="form-control" id="password" placeholder="Mật khẩu...">
                            <span style="color: red;font-size: 14px;"><?php echo (isset($errors['password'])) ? $errors['password'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label>Avatar:</label>
                            <br>
                            <input required type="file" id="imageUpload" name="avatar" accept="image/*"><br>
                        </div>
                        <div id="previewContainer" class="row text-center overflow-hidden" style="gap: 30px;"></div>
                        <div class="d-flex" style="justify-content: flex-end;">
                            <button class="btn btn-primary" type="submit">Thêm mới</button>
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include '../logout-modal.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../public/js/sb-admin-2.min.js"></script>

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
</body>

</html>