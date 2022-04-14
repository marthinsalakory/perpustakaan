<?php include "fungsi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="border-end bg-danger" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-danger text-light">PERPUSTAKAAN</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item bg-danger text-light p-3" href="index.php"><i class="bi bi-speedometer"></i> Dashboard</a>
                <?php if (user()->role == 'Anggota') { ?>
                    <a class="list-group-item bg-danger text-light p-3" href="pinjam_buku.php"><i class="bi bi-bookmark-plus"></i> Pinjaman Buku</a>
                <?php } ?>
                <a class="list-group-item bg-danger text-light p-3" href="data_pinjaman.php"><i class="bi bi-book-half"></i> Data Pinjaman</a>
                <?php if (user()->role == 'Admin') { ?>
                    <a class="list-group-item bg-danger text-light p-3" href="data_anggota.php"><i class="bi bi-people"></i> Data Anggota</a>
                <?php } ?>
                <a onclick="return confirm('Keluar?')" class="list-group-item bg-danger text-light p-3" href="logout.php"><i class="bi bi-box-arrow-in-right"></i> Keluar</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn" id="sidebarToggle"><i class="bi bi-justify"></i></button>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </nav>