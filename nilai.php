<?php
require 'backend/connect.php';
include('backend/function-nilai.php');
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
                    <h1 class="h3 mb-2 text-gray-800 fw-bold">Nilai</h1>
                    <p class="mb-4">Dibawah ini adalah Tabel Data Nilai</p>

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
                                            <th>Nama Mahasiswa</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Absensi</th>
                                            <th>Tugas</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $ambil_data = mysqli_query($conn, "SELECT * FROM tb_nilai INNER JOIN tb_mahasiswa ON tb_nilai.nim = tb_mahasiswa.nim INNER JOIN tb_mata_kuliah ON tb_nilai.kode_mata_kuliah = tb_mata_kuliah.kode_mata_kuliah");
                                        $nomor = 1;
                                        while ($data = mysqli_fetch_array($ambil_data)) {
                                            $id_nilai = $data['id_nilai'];
                                            $kode_mata_kuliah = $data['kode_mata_kuliah'];
                                            $nama_mata_kuliah = $data['nama_mata_kuliah'];
                                            $sks = $data['sks'];
                                            $nim = $data['nim'];
                                            $nama_mahasiswa = $data['nama_mahasiswa'];
                                            $absensi = $data['absensi'];
                                            $tugas = $data['tugas'];
                                            $uts = $data['uts'];
                                            $uas = $data['uas'];

                                        ?>
                                            <tr>
                                                <td><?= $nomor++ ?>.</td>
                                                <td><?= $nama_mahasiswa; ?></td>
                                                <td><?= $nama_mata_kuliah; ?></td>
                                                <td><?= $sks; ?></td>
                                                <td><?= $absensi; ?></td>
                                                <td><?= $tugas; ?></td>
                                                <td><?= $uts; ?></td>
                                                <td><?= $uas; ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="btn btn-info action" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#readData<?= $id_nilai; ?>"><i class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-success action mx-1" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#editData<?= $id_nilai; ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a class="btn btn-danger action " style="font-size:12px" data-bs-toggle="modal" data-bs-target="#hapusData<?= $id_nilai; ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- Read Data Modal -->
                                            <div class="modal fade" id="readData<?= $id_nilai; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Detail Data Nilai</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id_nilai" value="<?= $id_nilai; ?>" class="form-control bg-secondary-subtle" id="id_nilai">
                                                                <div class="row mb-3">
                                                                    <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" disabled name="nim">
                                                                            <option value="<?= $nim ?>"><?= $nim ?> - <?= $nama_mahasiswa; ?></option>
                                                                            <?php
                                                                            $ambilData = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                                                                            while ($data = mysqli_fetch_array($ambilData)) {
                                                                                $nim = $data['nim'];
                                                                                $nama_mahasiswa = $data['nama_mahasiswa'];

                                                                            ?>

                                                                                <option value="<?= $nim ?>"><?= $nim ?> - <?= $nama_mahasiswa; ?></option>

                                                                            <?php
                                                                            }

                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" disabled name="kode_mata_kuliah">
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
                                                                    <label for="absensi" class="col-sm-3 col-form-label">Absensi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" disabled name="absensi" value="<?= $absensi; ?>" class="form-control bg-secondary-subtle" id="absensi">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tugas" class="col-sm-3 col-form-label">Tugas</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" disabled name="tugas" value="<?= $tugas; ?>" class="form-control bg-secondary-subtle" id="tugas">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="uts" class="col-sm-3 col-form-label">UTS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" disabled name="uts" value="<?= $uts; ?>" class="form-control bg-secondary-subtle" id="uts">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="uas" class="col-sm-3 col-form-label">UAS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" disabled name="uas" value="<?= $uas; ?>" class="form-control bg-secondary-subtle" id="uas">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Data Modal -->
                                            <div class="modal fade" id="editData<?= $id_nilai; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Edit Data Nilai</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="id_nilai" value="<?= $id_nilai; ?>" class="form-control bg-secondary-subtle" id="id_nilai">
                                                                <div class="row mb-3">
                                                                    <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" name="nim">
                                                                            <option value="<?= $nim ?>"><?= $nim ?> - <?= $nama_mahasiswa; ?></option>
                                                                            <?php
                                                                            $ambilData = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                                                                            while ($data = mysqli_fetch_array($ambilData)) {
                                                                                $nim = $data['nim'];
                                                                                $nama_mahasiswa = $data['nama_mahasiswa'];

                                                                            ?>

                                                                                <option value="<?= $nim ?>"><?= $nim ?> - <?= $nama_mahasiswa; ?></option>

                                                                            <?php
                                                                            }

                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Kode Mata Kuliah</label>
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
                                                                    <label for="absensi" class="col-sm-3 col-form-label">Absensi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" name="absensi" value="<?= $absensi; ?>" class="form-control bg-secondary-subtle" id="absensi">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tugas" class="col-sm-3 col-form-label">Tugas</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" name="tugas" value="<?= $tugas; ?>" class="form-control bg-secondary-subtle" id="tugas">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="uts" class="col-sm-3 col-form-label">UTS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" name="uts" value="<?= $uts; ?>" class="form-control bg-secondary-subtle" id="uts">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="uas" class="col-sm-3 col-form-label">UAS</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" name="uas" value="<?= $uas; ?>" class="form-control bg-secondary-subtle" id="uas">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="editDataNilai" value="Edit Data">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Data Modal -->
                                            <div class="modal fade" id="hapusData<?= $id_nilai; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Hapus Data Nilai</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="my-2">
                                                                    <input type="hidden" value="<?= $id_nilai; ?>" name="id_nilai" id="id_nilai">
                                                                    <h5>Apakah Kamu yakin akan menghapus data ini ?</h5>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="hapusDataNilai" value="Hapus Data">
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
                    <h4 class="modal-title fw-bold">Tambah Data Nilai</h4>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id_nilai" class="form-control bg-secondary-subtle" id="">
                        <div class="row mb-3">
                            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <select class="form-control bg-secondary-subtle" name="nim">
                                    <option value="">--Masukkan NIM--</option>
                                    <?php
                                    $ambilData = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                                    while ($data = mysqli_fetch_array($ambilData)) {
                                        $nim = $data['nim'];
                                        $nama_mahasiswa = $data['nama_mahasiswa'];

                                    ?>

                                        <option value="<?= $nim ?>"><?= $nim ?> - <?= $nama_mahasiswa; ?></option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
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
                            <label for="absensi" class="col-sm-3 col-form-label">Absensi</label>
                            <div class="col-sm-9">
                                <input type="number" name="absensi" class="form-control bg-secondary-subtle" id="absensi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tugas" class="col-sm-3 col-form-label">Tugas</label>
                            <div class="col-sm-9">
                                <input type="number" name="tugas" class="form-control bg-secondary-subtle" id="tugas">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="uts" class="col-sm-3 col-form-label">UTS</label>
                            <div class="col-sm-9">
                                <input type="number" name="uts" class="form-control bg-secondary-subtle" id="uts">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="uas" class="col-sm-3 col-form-label">UAS</label>
                            <div class="col-sm-9">
                                <input type="number" name="uas" class="form-control bg-secondary-subtle" id="uas">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="tambahDataNilai" value="Tambah Data">
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