<?php
    // include '../../utils/auth.php';
    // if(isLogin()) {
    //     header("Location: ../admin/index.php");
    //     exit();
    // } else {
    //     $_SESSION['username'] = '';
    // }

?>

<!DOCTYPE html>
<html>
<head>
   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Đăng nhập</title>
</head>
<body class="bg-gradient-primary">
    <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-8 col-lg-9 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form class="user" method="post" action="index.php?action=login">
                                <div class="form-group">
                                    <input value="<?php if(isset($username)) echo htmlspecialchars($username); ?>" type="text" name="username" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter username ...">
                                        <span style="color: red;"><?php if(isset($errors["username"])) echo htmlspecialchars($errors["username"]); ?></span>
                                </div>
                                <div class="form-group">
                                    <input value="<?php if(isset($password)) echo htmlspecialchars($password); ?>" type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                        <span style="color: red;"><?php if(isset($errors["password"])) echo htmlspecialchars($errors["password"]); ?></span>
                                </div>
                                <span style="color: red;"><?php if(isset($message)) echo htmlspecialchars($message); ?></span>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../public/js/sb-admin-2.min.js"></script>
</body>
</html>
