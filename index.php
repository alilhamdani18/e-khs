<?php
require 'backend/connect.php';
// require 'backend/cek-login.php';



?>



<!DOCTYPE html>
<html lang="en">
<?php
include('src/head.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('src/sidebar.php');
        ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include('src/navbar.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 fw-bold ">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        $ambilDataMahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                        $ambilDataDosen = mysqli_query($conn, "SELECT * FROM tb_dosen");
                        $ambilDataJurusan = mysqli_query($conn, "SELECT * FROM tb_jurusan");
                        $ambilDataMataKuliah = mysqli_query($conn, "SELECT * FROM tb_mata_kuliah");

                        // Jumlah Data
                        $jumlahMahasiswa = mysqli_num_rows($ambilDataMahasiswa);
                        $jumlahDosen = mysqli_num_rows($ambilDataDosen);
                        $jumlahJurusan = mysqli_num_rows($ambilDataJurusan);
                        $jumlahMataKuliah = mysqli_num_rows($ambilDataMataKuliah);
                        ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 pt-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Mahasiswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahMahasiswa; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-2x fa-user-group"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-4">
                                            <a href="mahasiswa.php" class="btn btn-primary mt-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 pt-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Dosen</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahDosen; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-2x fa-user-group"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-4">
                                            <a href="dosen.php" class="btn btn-primary mt-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 pt-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jurusan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlahJurusan; ?></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-2x fa-graduation-cap"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-4">
                                            <a href="jurusan.php" class="btn btn-primary mt-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 pt-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Mata Kuliah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahMataKuliah; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-2x fa-book-open-reader"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-4">
                                            <a href="mata-kuliah.php" class="btn btn-primary mt-4">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="sticky-footer bg-transparent">
                        <div class="container my-auto flex justify-content-between ">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; E - KHS 2024. Created by 🔥 ALIL HD.</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-semibold " id="exampleModalLabel">Keluar</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah kamu yakin untuk keluar ?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.php">Logout</a>
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
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>