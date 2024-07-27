<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết - Admin</title>

    <!-- Custom fonts for this template -->
    <link href="../../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../public/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Bài viết</h1>
                    <p class="mb-4">Danh sách bài viết</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center ">
                            <h6 class="m-0 font-weight-bold text-primary">Bài viết</h6>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModalPost">
                                Thêm mới bài viết
                            </button>
                        </div>
                        <div class="card-body">
                            <!-- Form filter -->
                            <!-- <form style="gap: 15px;" action="index.php" method="GET" class="filter-form d-flex my-3  ">
                                <div class="d-flex" style="gap: 15px;">
                                    <div class="form-group">
                                        <input type="text" value="<?php echo isset($_GET['username']) ?  $_GET['username'] : '' ?>" id="username" name="username" class="form-control" placeholder="Enter username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </form> -->
                            <!-- End form filter -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Ảnh</th>
                                            <th>Show</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Nội dung</th>
                                            <th>Ảnh</th>
                                            <th>Show</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($posts as $post) : ?>
                                            <tr>
                                                <td><?php echo $post['id']; ?></td>
                                                <td><?php echo $post['title']; ?></td>
                                                <td><?php echo $post['content']; ?></td>
                                                <td><?php echo $post['thumbnail']; ?></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="show" name="show" class="form-check-input" <?php echo $post['is_visible'] == '1' ? 'checked' : '' ?> type="checkbox" data-post-id=<?php echo $post['id'] ?> />
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="index.php?action=edit&id=<?php echo $post['id']; ?>&mod=post">Edit</a>
                                                    <a href="index.php?action=delete&id=<?php echo $post['id']; ?>&mod=city" onclick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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

    <?php include './create.php' ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../public/js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.show').change(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                var postId = $(this).data('post-id');

                $.ajax({
                    url: '?action=change_post',
                    method: 'POST',
                    data: {
                        post_id: postId,
                        isShow: isChecked
                    },
                    success: function(response) {
                        alert('Change status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        });
    </script>
</body>

</html>