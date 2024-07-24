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

    <style>
        .carousel-item img {
            height: 300px; /* Thay đổi chiều cao ảnh theo nhu cầu */
            object-fit: cover; /* Đảm bảo ảnh không bị biến dạng */
            width: 300px;
        }
    </style>

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
                        <li class="breadcrumb-item"><a href="/views/admin/hotel/index.php?mod=hotel">Hotel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                    </nav>
                <h1 style="text-align: center;">Cập nhật</h1>
                <form action="index.php?action=edit&id=<?php echo $hotel['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tên khách sạn</label>
                            <input value="<?php echo $hotel['name']; ?>" type="text" name="name" required class="form-control" id="name" placeholder="Tên khách sạn...">
                        </div>
                        <div class="form-group">
                            <label for="rate">Rating</label>
                            <select class="form-control" name="rate" required id="rate">
                            <option value="1" <?php echo ($hotel['rate'] == '1' ? 'selected' : ''); ?>>1</option>
                            <option value="2" <?php echo ($hotel['rate'] == '2' ? 'selected' : ''); ?>>2</option>
                            <option value="3" <?php echo ($hotel['rate'] == '3' ? 'selected' : ''); ?>>3</option>
                            <option value="4" <?php echo ($hotel['rate'] == '4' ? 'selected' : ''); ?>>4</option>
                            <option value="5" <?php echo ($hotel['rate'] == '5' ? 'selected' : ''); ?>>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input value="<?php echo $hotel['address']; ?>" type="text" name="address" required  class="form-control" id="address" placeholder="Địa chỉ...">
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô tả</label>
                            <textarea  rows="4"  type="text" name="description" required  class="form-control" id="desc" placeholder="Mô tả..."><?php echo $hotel['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input value="<?php echo $hotel['phone']; ?>" type="text" name="phone" required  class="form-control" id="phone" placeholder="Số điện thoại...">
                        </div>
                        <div class="form-group">
                            <label for="number_rooms">Số phòng</label>
                            <input value="<?php echo $hotel['number_of_rooms']; ?>" type="text" name="number_of_rooms" required  class="form-control" id="number_rooms" placeholder="Số phòng...">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $hotel['email']; ?>" type="email" name="email" required  class="form-control" id="email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input value="<?php echo $hotel['website']; ?>" type="text" name="website" required  class="form-control" id="website" placeholder="Website...">
                        </div>
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input value="<?php echo $hotel['latitude']; ?>" type="text" name="latitude" required  class="form-control" id="lat" placeholder="Latitude...">
                        </div>
                        <div class="form-group">
                            <label for="long">Longitude</label>
                            <input value="<?php echo $hotel['longitude']; ?>" type="text" name="longitude" required  class="form-control" id="long" placeholder="Latitude...">
                        </div>
                        <div class="form-group">
                            <label>Type:</label><br>
                        <div class="form-check form-check-inline">
                            <input <?php echo ($hotel['type'] == 'hotel') ? 'checked' : ''; ?>  class="form-check-input" type="radio" checked name="type" id="inlineRadio1" value="hotel">
                            <label class="form-check-label" for="inlineRadio1">Hotel</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input <?php echo ($hotel['type'] == 'resort') ? 'checked' : ''; ?>  class="form-check-input" type="radio" name="type" id="inlineRadio2" value="resort">
                            <label class="form-check-label" for="inlineRadio2">Resort</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input <?php echo ($hotel['type'] == 'homestay') ? 'checked' : ''; ?>  class="form-check-input" type="radio" name="type" id="inlineRadio3" value="homestay">
                            <label class="form-check-label" for="inlineRadio3">Homestay</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="amenities">Amenities:</label>
                        <select name="amenities[]" id="amenities" multiple class="form-control">
                            <?php foreach ($amenitiesList as $amenity): ?>
                                <option <?php echo in_array($amenity, $amenitiesCurrent) ? 'selected' : ''; ?>  value="<?php echo $amenity['id']; ?>"><?php echo htmlspecialchars($amenity['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    
                        <div class="form-group">
                        <label>Images:</label>
                        <br>
                        <input type="file" name="images[]" multiple><br>
                        </div>
                        <div class="d-flex" style="justify-content: flex-end;">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                        </div>
                </form>
 
                <!-- Carosel image -->
                <div class="container my-5">
        <?php if (!empty($images)): ?>
            <h2>Current Images</h2>
            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ($images as $index => $image): ?>
                        <li data-target="#imageCarousel" data-slide-to="<?php echo $index; ?>" class="<?php echo ($index === 0) ? 'active' : ''; ?>"></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($images as $index => $image): ?>
                        <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                            <img src="/uploads/hotels/<?php echo $image['name']; ?>" class="d-block w-100" alt="Hotel Image">
                            <div class="carousel-caption d-none d-md-block">
                                <form action="index.php?action=delete_image&id_image=<?php echo $image['id']; ?>" method="POST">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image? ')">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php endif; ?>
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


