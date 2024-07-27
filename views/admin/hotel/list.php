<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Admin</title>

    <!-- Custom fonts for this template -->
    <link href="../../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../public/css/sb-admin-2.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">Hotel</h1>
                    <p class="mb-4">Danh sách khách sạn</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center ">
                            <h6 class="m-0 font-weight-bold text-primary">Khách sạn</h6>
                            <div class="d-flex" style="gap: 10px;"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                    Thêm mới khách sạn
                                </button>
                            </div>


                        </div>



                        <div class="card-body">

                            <div class="table-responsive">
                                <!-- Form filter -->
                                <form style="gap: 15px;" action="index.php" method="GET" class="filter-form d-flex my-3  ">
                                    <div class="d-flex" style="gap: 15px;align-items: center;">
                                        <div class="form-group">
                                            <input type="text" value="<?php echo isset($_GET['name']) ?  $_GET['name'] : '' ?>" id="name" name="name" class="form-control" placeholder="Enter hotel name">
                                        </div>
                                        <div class="form-group">
                                            <select id="sort" name="sort" class="form-control">
                                                <option value="">Select...</option>
                                                <option <?php echo isset($_GET['sort']) == 'name' ?  'selected' : '' ?> value="name">Name</option>
                                                <option <?php echo isset($_GET['sort']) == 'type' ?  'selected' : '' ?> value="type">Type</option>
                                            </select>
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
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </form>
                            </div>

                            <!-- End form filter -->
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Rate</th>
                                        <th>Địa chỉ</th>
                                        <th>Mô tả</th>
                                        <th>Kiểu KS</th>
                                        <th>Quận/Huyện</th>
                                        <th>Tỉnh</th>
                                        <th>Khuyến mại</th>
                                        <th>Hot</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Rate</th>
                                        <th>Địa chỉ</th>
                                        <th>Mô tả</th>
                                        <th>Kiểu KS</th>
                                        <th>Quận/Huyện</th>
                                        <th>Tỉnh</th>
                                        <th>Khuyến mại</th>
                                        <th>Hot</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($hotels as $hotel) : ?>
                                        <tr>
                                            <td><?php echo $hotel['id']; ?></td>
                                            <td><?php echo $hotel['name']; ?></td>
                                            <td><?php echo $hotel['rate']; ?></td>
                                            <td><?php echo $hotel['address']; ?></td>
                                            <td><?php echo $hotel['description']; ?></td>
                                            <td><?php echo $hotel['type']; ?></td>
                                            <td><?php echo $hotel['district_name']; ?></td>
                                            <td><?php echo $hotel['city_name']; ?></td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="promotion" name="promotion" class="form-check-input" <?php echo $hotel['promotion'] == '1' ? 'checked' : '' ?> type="checkbox" data-hotel-id=<?php echo $hotel['id'] ?> />
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check">
                                                    <input class="hot" name="hot" class="form-check-input" <?php echo $hotel['is_hot'] == '1' ? 'checked' : '' ?> type="checkbox" data-hotel-id=<?php echo $hotel['id'] ?> />
                                                </div>
                                            </td>
                                            <td>
                                                <a href="index.php?action=edit&id=<?php echo $hotel['id']; ?>&mod=hotel">Edit</a>
                                                <a href="index.php?action=delete&id=<?php echo $hotel['id']; ?>&mod=hotel" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-center">

                                <span>Tổng số bản ghi: <b><?php echo $totalHotels; ?></b></span>
                                <!-- Hiển thị phân trang -->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

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

    <!-- Create hotel Modal-->
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
            $('.promotion').change(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                var hotelId = $(this).data('hotel-id');

                $.ajax({
                    url: '?action=update_promotion',
                    method: 'POST',
                    data: {
                        hotel_id: hotelId,
                        promotion: isChecked
                    },
                    success: function(response) {
                        alert('Promotion status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });

            $('.hot').change(function() {
                var isChecked = $(this).is(':checked') ? 1 : 0;
                var hotelId = $(this).data('hotel-id');

                $.ajax({
                    url: '?action=update_hot',
                    method: 'POST',
                    data: {
                        hotel_id: hotelId,
                        hot: isChecked
                    },
                    success: function(response) {
                        alert('Hot status updated successfully');
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