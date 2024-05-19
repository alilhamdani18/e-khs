<?php
require 'backend/connect.php';
include('backend/function-agihan.php');
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
                    <h1 class="h3 mb-2 text-gray-800 fw-bold">Agihan</h1>
                    <p class="mb-4">Dibawah ini adalah Tabel Data Agihan</p>

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
                                            <th>Kode Mata Kuliah</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $ambil_data = mysqli_query($conn, "SELECT * FROM tb_agihan INNER JOIN tb_dosen ON tb_agihan.nidn = tb_dosen.nidn INNER JOIN tb_mata_kuliah ON tb_agihan.kode_mata_kuliah = tb_mata_kuliah.kode_mata_kuliah");
                                        $nomor = 1;
                                        while ($data = mysqli_fetch_array($ambil_data)) {
                                            $id_agihan = $data['id_agihan'];
                                            $kode_mata_kuliah = $data['kode_mata_kuliah'];
                                            $nama_mata_kuliah = $data['nama_mata_kuliah'];
                                            $sks = $data['sks'];
                                            $nidn = $data['nidn'];
                                            $nama_dosen = $data['nama_dosen'];
                                            $tahun = $data['tahun'];

                                        ?>
                                            <tr>
                                                <td><?= $nomor++ ?>.</td>
                                                <td><?= $kode_mata_kuliah; ?></td>
                                                <td><?= $nama_mata_kuliah; ?></td>
                                                <td><?= $sks; ?></td>
                                                <td><?= $nama_dosen; ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="btn btn-info action" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#readData<?= $id_agihan; ?>"><i class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-success action mx-1" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#editData<?= $id_agihan; ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a class="btn btn-danger action " style="font-size:12px" data-bs-toggle="modal" data-bs-target="#hapusData<?= $id_agihan; ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- Read Data Modal -->
                                            <div class="modal fade" id="readData<?= $id_agihan; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Detail Data Agihan</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id_agihan" class="form-control bg-secondary-subtle" id="">
                                                                <div class="row mb-3">
                                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" disabled name="kode_mata_kuliah">
                                                                            <option value="<?= $kode_mata_kuliah ?>"><?= $kode_mata_kuliah ?> - <?= $nama_mata_kuliah; ?></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="sks" class="col-sm-3 col-form-label">SKS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="sks" disabled value="<?= $sks; ?>" class="form-control bg-secondary-subtle" id="sks">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nama_dosen" class="col-sm-3 col-form-label">Dosen Pengampu</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nama_dosen" disabled value="<?= $nama_dosen; ?>" class="form-control bg-secondary-subtle" id="nama_dosen">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nidn" class="col-sm-3 col-form-label">NIDN</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" disabled name="nidn">
                                                                            <option value="<?= $nidn ?>"><?= $nidn ?> - <?= $nama_dosen; ?></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="tahun" disabled value="<?= $tahun; ?>" class="form-control bg-secondary-subtle" id="tahun">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Data Modal -->
                                            <div class="modal fade" id="editData<?= $id_agihan; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Edit Data Agihan</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id_agihan" value="<?= $id_agihan; ?>" class="form-control bg-secondary-subtle" id="">
                                                                <div class="row mb-3">
                                                                    <label for="kode_mata_kuliah" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" name="kode_mata_kuliah">
                                                                            <option value="<?= $kode_mata_kuliah ?>"><?= $kode_mata_kuliah ?> - <?= $nama_mata_kuliah; ?></option>
                                                                            <?php
                                                                            $ambilData = mysqli_query($conn, "SELECT * FROM tb_mata_kuliah");
                                                                            while ($data = mysqli_fetch_array($ambilData)) {
                                                                                $kode_mata_kuliah = $data['kode_mata_kuliah'];
                                                                                $nama_mata_kuliah = $data['nama_mata_kuliah'];

                                                                            ?>

                                                                                <option value="<?= $kode_mata_kuliah ?>"><?= $kode_mata_kuliah ?> - <?= $nama_mata_kuliah; ?></option>

                                                                            <?php
                                                                            }

                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">NIDN</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" name="nidn">
                                                                            <option value="<?= $nidn ?>"><?= $nidn ?> - <?= $nama_dosen; ?></option>
                                                                            <?php
                                                                            $ambilData = mysqli_query($conn, "SELECT * FROM tb_dosen");
                                                                            while ($data = mysqli_fetch_array($ambilData)) {
                                                                                $nidn = $data['nidn'];
                                                                                $nama_dosen = $data['nama_dosen'];

                                                                            ?>
                                                                                <option value="<?= $nidn ?>"><?= $nidn ?> - <?= $nama_dosen; ?></option>

                                                                            <?php
                                                                            }

                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="tahun" value="<?= $tahun; ?>" class="form-control bg-secondary-subtle" id="tahun">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="editDataAgihan" value="Edit Data">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Data Modal -->
                                            <div class="modal fade" id="hapusData<?= $id_agihan; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Hapus Data Agihan</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="my-2">
                                                                    <input type="hidden" value="<?= $id_agihan; ?>" name="id_agihan" id="id_agihan">
                                                                    <h5>Apakah Kamu yakin akan menghapus data ini ?</h5>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="hapusDataAgihan" value="Hapus Data">
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
                    <h4 class="modal-title fw-bold">Tambah Data Agihan</h4>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id_agihan" class="form-control bg-secondary-subtle" id="">

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
                            <div class="col-sm-9">
                                <select class="form-control bg-secondary-subtle" name="kode_mata_kuliah">
                                    <option value="">--Masukkan Kode Mata Kuliah--</option>
                                    <?php
                                    $ambilData = mysqli_query($conn, "SELECT * FROM tb_mata_kuliah");
                                    while ($data = mysqli_fetch_array($ambilData)) {
                                        $kode_mata_kuliah = $data['kode_mata_kuliah'];
                                        $nama_mata_kuliah = $data['nama_mata_kuliah'];

                                    ?>

                                        <option value="<?= $kode_mata_kuliah ?>"><?= $kode_mata_kuliah ?> - <?= $nama_mata_kuliah; ?></option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nidn" class="col-sm-3 col-form-label">NIDN</label>
                            <div class="col-sm-9">
                                <select class="form-control bg-secondary-subtle" name="nidn">
                                    <option value="">--Masukkan NIDN--</option>
                                    <?php
                                    $ambilData = mysqli_query($conn, "SELECT * FROM tb_dosen");
                                    while ($data = mysqli_fetch_array($ambilData)) {
                                        $nidn = $data['nidn'];
                                        $nama_dosen = $data['nama_dosen'];

                                    ?>

                                        <option value="<?= $nidn ?>"><?= $nidn ?> - <?= $nama_dosen; ?></option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <input type="text" name="tahun" class="form-control bg-secondary-subtle" id="tahun">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="tambahDataAgihan" value="Tambah Data">
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