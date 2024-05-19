<?php
require 'backend/connect.php';
include('backend/function-mk.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('src/head.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('src/sidebar.php');
        ?>

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
                    <h1 class="h3 mb-2 text-gray-800 fw-bold">Mata Kuliah</h1>
                    <p class="mb-4">Dibawah ini adalah Tabel Data Mata Kuliah</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary my-2" href="#" data-bs-toggle="modal" data-bs-target="#tambahData">
                                <i class="fa-solid fa-file-circle-plus"></i> Tambah Data

                            </a>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle " style="font-size:14px" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>No.</th>
                                            <th>Kode MK</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $ambil_data = mysqli_query($conn, "SELECT * FROM tb_mata_kuliah ORDER BY kode_mata_kuliah");
                                        $nomor = 1;
                                        while ($data = mysqli_fetch_array($ambil_data)) {
                                            $kode_mata_kuliah = $data['kode_mata_kuliah'];
                                            $nama_mata_kuliah = $data['nama_mata_kuliah'];
                                            $sks = $data['sks'];

                                        ?>
                                            <tr>
                                                <td><?= $nomor++ ?>.</td>
                                                <td><?= $kode_mata_kuliah; ?></td>
                                                <td><?= $nama_mata_kuliah; ?></td>
                                                <td><?= $sks; ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="btn btn-info action" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#readData<?= $kode_mata_kuliah; ?>"><i class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-success action mx-1" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#editData<?= $kode_mata_kuliah; ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a class="btn btn-danger action " style="font-size:12px" data-bs-toggle="modal" data-bs-target="#hapusData<?= $kode_mata_kuliah; ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- Read Data Modal -->
                                            <div class="modal fade" id="readData<?= $kode_mata_kuliah; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Detail Data Mata Kuliah</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="row mb-3">
                                                                    <label for="kode_mata_kuliah" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="kode_mata_kuliah" value="<?=$kode_mata_kuliah?>" class="form-control bg-secondary-subtle" id="kode_mata_kuliah">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nama_mata_kuliah" class="col-sm-3 col-form-label">Nama Mata Kuliah</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nama_mata_kuliah" value="<?=$nama_mata_kuliah?>" class="form-control bg-secondary-subtle" id="nama_mata_kuliah">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="sks" class="col-sm-3 col-form-label">SKS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="sks" value="<?=$sks?>" class="form-control bg-secondary-subtle" id="sks">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Data Modal -->
                                            <div class="modal fade" id="editData<?= $kode_mata_kuliah; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Edit Data Jurusan</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" value="<?= $kode_mata_kuliah; ?>" name="kode_mata_kuliah" class="form-control bg-secondary-subtle" id="kode_mata_kuliah">
                                                                <div class="row mb-3">
                                                                    <label for="nama_mata_kuliah" class="col-sm-3 col-form-label">Nama Mata Kuliah</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?= $nama_mata_kuliah; ?>" name="nama_mata_kuliah" class="form-control bg-secondary-subtle" id="nama_mata_kuliah">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="sks" class="col-sm-3 col-form-label">SKS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?= $sks; ?>" name="sks" class="form-control bg-secondary-subtle" id="sks">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="editDataMK" value="Edit Data">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Data Modal -->
                                            <div class="modal fade" id="hapusData<?= $kode_mata_kuliah; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Hapus Data Mata Kuliah</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="my-2">
                                                                    <input type="hidden" value="<?= $kode_mata_kuliah; ?>" name="kode_mata_kuliah" id="kode_mata_kuliah">
                                                                    <h5>Apakah Kamu yakin akan menghapus data ini ?</h5>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="hapusDataMK" value="Hapus Data">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
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

    <!-- Add Data Modal -->
    <div class="modal fade" id="tambahData">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
                <div class="modal-header py-2">
                    <h4 class="modal-title fw-bold">Tambah Data Mata Kuliah</h4>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="kode_mata_kuliah" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
                            <div class="col-sm-9">
                                <input type="text" name="kode_mata_kuliah" class="form-control bg-secondary-subtle" id="kode_mata_kuliah">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_mata_kuliah" class="col-sm-3 col-form-label">Nama Mata Kuliah</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_mata_kuliah" class="form-control bg-secondary-subtle" id="nama_mata_kuliah">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sks" class="col-sm-3 col-form-label">SKS</label>
                            <div class="col-sm-9">
                                <input type="text" name="sks" class="form-control bg-secondary-subtle" id="sks">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="tambahDataMK" value="Tambah Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('backend/logout.php');
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap5/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>