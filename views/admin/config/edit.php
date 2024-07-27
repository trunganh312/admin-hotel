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
                            <li class="breadcrumb-item"><a href="/views/admin/config/index.php?mod=config">Config</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                    <h1 style="text-align: center;">Cập nhật</h1>
                    <form action="index.php?action=edit&id=<?php echo $config['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="hotline">Số hotline</label>
                            <input type="text" value="<?php echo $config['hotline']; ?>" name="hotline" required class="form-control" id="hotline" placeholder="Số hotline...">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?php echo $config['email']; ?>" name="email" required class="form-control" id="email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" value="<?php echo $config['facebook_link']; ?>" name="facebook" required class="form-control" id="facebook" placeholder="Facebook...">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" value="<?php echo $config['instagram_link']; ?>" name="instagram" required class="form-control" id="instagram" placeholder="Instagram...">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" <?php echo $config['is_visible'] == '1' ? 'checked' : '' ?> type="checkbox" value="1" id="show" name="show" />
                                <label class="form-check-label" for="show"> Show </label>
                            </div>
                        </div>

                        <div class="d-flex" style="justify-content: flex-end;">
                            <button class="btn btn-primary" type="submit">Cập nhật</button>
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
</body>

</html>