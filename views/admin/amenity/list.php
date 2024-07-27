<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiện nghi - Admin</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Tiện ích</h1>
                    <p class="mb-4">Danh sách tiện ích</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center ">
                            <h6 class="m-0 font-weight-bold text-primary">Tiện ích</h6>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModalAmenity">
                                Thêm mới tiện ích
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
                                            <th>Tên tiện nghi</th>
                                            <th>Tên nhóm tiện nghi</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên tiện nghi</th>
                                            <th>Tên nhóm tiện nghi</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($amenities as $amenity) : ?>
                                            <tr>
                                                <td><?php echo $amenity['id']; ?></td>
                                                <td><?php echo $amenity['name']; ?></td>
                                                <td><?php echo $amenity['group_name']; ?></td>
                                                <td>
                                                    <a href="index.php?action=edit&id=<?php echo $amenity['id']; ?>&mod=amenity">Edit</a>
                                                    <a href="index.php?action=delete&id=<?php echo $amenity['id']; ?>&mod=amenity" onclick="return confirm('Are you sure?')">Delete</a>
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

</body>

</html>