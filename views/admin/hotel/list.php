<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Admin</title>

    <!-- Custom fonts for this template -->
    <link href="../../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Hotel</h1>
            <p class="mb-4">Danh sách khách sạn</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center " >
                    <h6 class="m-0 font-weight-bold text-primary">Khách sạn</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Thêm mới khách sạn
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Rate</th>
                            <th>Địa chỉ</th>
                            <th>Mô tả</th>
                            <th>Số điện thoại</th>
                            <th>Số phòng</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Loại khách sạn</th>
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
                            <th>Số điện thoại</th>
                            <th>Số phòng</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Loại khách sạn</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                            <tbody>
                        <?php foreach ($hotels as $hotel): ?>
                            <tr>
                                <td><?php echo $hotel['id']; ?></td>
                                <td><?php echo $hotel['name']; ?></td>
                                <td><?php echo $hotel['rate']; ?></td>
                                <td><?php echo $hotel['address']; ?></td>
                                <td><?php echo $hotel['description']; ?></td>
                                <td><?php echo $hotel['phone']; ?></td>
                                <td><?php echo $hotel['number_of_rooms']; ?></td>
                                <td><?php echo $hotel['email']; ?></td>
                                <td><?php echo $hotel['website']; ?></td>
                                <td><?php echo $hotel['latitude']; ?></td>
                                <td><?php echo $hotel['longitude']; ?></td>
                                <td><?php echo $hotel['type']; ?></td>
                                <td>
                                    <a href="index.php?action=edit&id=<?php echo $hotel['id']; ?>&mod=hotel">Edit</a>
                                    <a href="index.php?action=delete&id=<?php echo $hotel['id']; ?>&mod=hotel" onclick="return confirm('Are you sure?')">Delete</a>
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

      <!-- Create hotel Modal-->
      <?php include './create.php' ?>
  <!-- Bootstrap core JavaScript-->
  <script src="../../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../public/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../public/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../public/js/demo/datatables-demo.js"></script>

  

</body>
</html>