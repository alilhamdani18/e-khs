<?php
require 'backend/connect.php';
include('backend/function-jurusan.php');
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
                    <h1 class="h3 mb-2 text-gray-800 fw-bold">Jurusan</h1>
                    <p class="mb-4">Dibawah ini adalah Tabel Data Jurusan</p>

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
                                            <th>Kode Jurusan</th>
                                            <th>Nama Jurusan</th>
                                            <th>Kaprodi</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $ambil_data = mysqli_query($conn, "SELECT * FROM tb_jurusan ORDER BY kode_jurusan");
                                        $nomor = 1;
                                        while ($data = mysqli_fetch_array($ambil_data)) {
                                            $kode_jurusan = $data['kode_jurusan'];
                                            $nama_jurusan = $data['nama_jurusan'];
                                            $kaprodi = $data['kaprodi'];

                                        ?>
                                            <tr>
                                                <td><?= $nomor++ ?>.</td>
                                                <td><?= $kode_jurusan; ?></td>
                                                <td><?= $nama_jurusan; ?></td>
                                                <td><?= $kaprodi; ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="btn btn-info action" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#readData<?= $kode_jurusan; ?>"><i class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-success action mx-1" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#editData<?= $kode_jurusan; ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a class="btn btn-danger action " style="font-size:12px" data-bs-toggle="modal" data-bs-target="#hapusData<?= $kode_jurusan; ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- Read Data Modal -->
                                            <div class="modal fade" id="readData<?= $kode_jurusan; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Detail Data Jurusan</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="row mb-3">
                                                                    <label for="kode_jurusan" class="col-sm-3 col-form-label">Kode Jurusan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?=$kode_jurusan;?>" name="kode_jurusan" disabled class="form-control bg-secondary-subtle" id="kode_jurusan">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nama_jurusan" class="col-sm-3 col-form-label">Nama Jurusan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?=$nama_jurusan;?>" name="nama_jurusan" disabled class="form-control bg-secondary-subtle" id="nama_jurusan">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="kaprodi" class="col-sm-3 col-form-label">Kaprodi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?=$kaprodi;?>" name="kaprodi" disabled class="form-control bg-secondary-subtle" id="kaprodi">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Data Modal -->
                                            <div class="modal fade" id="editData<?= $kode_jurusan; ?>">
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
                                                                <input type="hidden" value="<?=$kode_jurusan;?>" name="kode_jurusan" class="form-control bg-secondary-subtle" id="kode_jurusan">
                                                                <div class="row mb-3">
                                                                    <label for="nama_jurusan" class="col-sm-3 col-form-label">Nama Jurusan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?=$nama_jurusan;?>" name="nama_jurusan" class="form-control bg-secondary-subtle" id="nama_jurusan">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="kaprodi" class="col-sm-3 col-form-label">Kaprodi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="<?=$kaprodi;?>" name="kaprodi" class="form-control bg-secondary-subtle" id="kaprodi">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="editDataJurusan" value="Edit Data">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Data Modal -->
                                            <div class="modal fade" id="hapusData<?= $kode_jurusan; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Hapus Data Jurusan</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="my-2">
                                                                    <input type="hidden" value="<?= $kode_jurusan; ?>" name="kode_jurusan" id="kode_jurusan">
                                                                    <h5>Apakah Kamu yakin akan menghapus data ini ?</h5>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="hapusDataJurusan" value="Hapus Data">
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
                    <h4 class="modal-title fw-bold">Tambah Data Jurusan</h4>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="kode_jurusan" class="col-sm-3 col-form-label">Kode Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" name="kode_jurusan" class="form-control bg-secondary-subtle" id="kode_jurusan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_jurusan" class="col-sm-3 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_jurusan" class="form-control bg-secondary-subtle" id="nama_jurusan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kaprodi" class="col-sm-3 col-form-label">Kaprodi</label>
                            <div class="col-sm-9">
                                <input type="text" name="kaprodi" class="form-control bg-secondary-subtle" id="kaprodi">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="tambahDataJurusan" value="Tambah Data">
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