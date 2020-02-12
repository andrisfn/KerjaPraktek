<?php

session_start();
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS For Bootstrap 4 -->
    <link rel="stylesheet" href="../vendor/bootstrap4/css/bootstrap.min.css">
    <!--CSS For Font Awesome 5 -->
    <link rel="stylesheet" href="../vendor/fontawesome5/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../vendor/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- CSS For Style -->
    <link rel="stylesheet" href="../vendor/style.css">
    <!-- Canvas JS -->
    <!-- <link rel="stylesheet" href="../ve"> -->

    <title>PT. Gada Elang Sakti</title>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-dark">
            <div class="sidebar-header bg-secondary p-3">
                <h5><b>PT. Gada Elang Sakti</b></h5>
            </div>

            <ul class="list-unstyled components">

                <div class="card m-2 mt-3 bg-secondary">
                    <div class="card-body text-white">
                        <div class="row align-items-center">
                            <div class="col-3"><i class="fas fa-user-circle fa-2x mr-3"></i></div>
                            <div class="col">
                                <h5><?php echo $_SESSION['username']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="sec-index.php"><i class="fas fa-user-shield mr-3"></i>Data Security</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="penempatan.php"><i class="fas fa-warehouse mr-3"></i>Data Penempatan</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link text-white" href="per-index.php"><i class="fas fa-building mr-3"></i>Data Perusahaan</a> -->
                        <hr class="bg-secondary">
                    </li>
                </div>
            </ul>
            <a href="../logout.php" class="btn btn-secondary btn-lg mx-5">
                <i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
        </nav>