<?php
require 'backend/connect.php';
include('backend/function-dosen.php');
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
                    <h1 class="h3 mb-2 text-gray-800 fw-bold ">Dosen</h1>
                    <p class="mb-4">Dibawah ini adalah Tabel Data Dosen</p>

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
                                        <tr class="text-center align-middle ">
                                            <th>No.</th>
                                            <th>NIDN</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <!-- <th>Tanggal Lahir</th> -->
                                            <!-- <th>Alamat</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambil_data = mysqli_query($conn, "SELECT * FROM tb_dosen ORDER BY nama_dosen");
                                        $nomor = 1;
                                        while ($data = mysqli_fetch_array($ambil_data)) {
                                            $nidn = $data['nidn'];
                                            $nama_dosen = $data['nama_dosen'];
                                            $jenis_kelamin = $data['jenis_kelamin'];
                                            $tempat_lahir = $data['tempat_lahir'];
                                            $tanggal_lahir = $data['tanggal_lahir'];
                                            $alamat = $data['alamat'];


                                        ?>
                                            <tr>
                                                <td><?= $nomor++ ?>.</td>
                                                <td><?= $nidn; ?></td>
                                                <td><?= $nama_dosen; ?></td>
                                                <td><?= $jenis_kelamin; ?></td>
                                                <td><?= $tempat_lahir; ?></td>
                                                <!-- <td><?= $tanggal_lahir; ?></td> -->
                                                <!-- <td><?= $alamat; ?></td> -->
                                                <td class="d-flex ">
                                                    <a class="btn btn-info action" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#readData<?= $nidn; ?>"><i class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-success action mx-1" style="font-size:12px" data-bs-toggle="modal" data-bs-target="#editData<?= $nidn; ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a class="btn btn-danger action " style="font-size:12px" data-bs-toggle="modal" data-bs-target="#hapusData<?= $nidn; ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- Read Data Modal -->
                                            <div class="modal fade" id="readData<?= $nidn; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Detail Data Dosen</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="row mb-3">
                                                                    <label for="nidn" class="col-sm-3 col-form-label">NIDN</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" disabled name="nidn" value="<?= $nidn; ?>" class="form-control bg-secondary-subtle" id="nidn">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="nama_dosen" class="col-sm-3 col-form-label">Nama Dosen</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" disabled name="nama_dosen" value="<?= $nama_dosen; ?>" class="form-control bg-secondary-subtle" id="nama_dosen">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" disabled name="jenis_kelamin" value="">
                                                                            <option value=""><?= $jenis_kelamin; ?></option>
                                                                            <option value="Laki - Laki">Laki - Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" disabled name="tempat_lahir" value="<?= $tempat_lahir; ?>" class="form-control bg-secondary-subtle" id="tempat_lahir">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" disabled name="tanggal_lahir" value="<?= $tanggal_lahir; ?>" class="form-control bg-secondary-subtle" id="tanggal_lahir">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea disabled name="alamat" class="form-control bg-secondary-subtle" id="alamat" cols="" rows="3"><?php echo $alamat; ?>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Data Modal -->
                                            <div class="modal fade" id="editData<?= $nidn; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Edit Data Dosen</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="nidn" value="<?= $nidn; ?>" class="form-control bg-secondary-subtle" id="nidn">
                                                                <div class="row mb-3">
                                                                    <label for="nama_dosen" class="col-sm-3 col-form-label">Nama Dosen</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nama_dosen" value="<?= $nama_dosen; ?>" class="form-control bg-secondary-subtle" id="nama_dosen">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control bg-secondary-subtle" name="jenis_kelamin" value="">
                                                                            <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                                                                            <option value="Laki - Laki">Laki - Laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="tempat_lahir" value="<?= $tempat_lahir; ?>" class="form-control bg-secondary-subtle" id="tempat_lahir">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir; ?>" class="form-control bg-secondary-subtle" id="tanggal_lahir">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea name="alamat" class="form-control bg-secondary-subtle" id="alamat" cols="" rows="3"><?php echo $alamat; ?>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="editDataDosen" value="Edit Data">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus Data Modal -->
                                            <div class="modal fade" id="hapusData<?= $nidn; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header py-2">
                                                            <h4 class="modal-title fw-bold">Hapus Data Dosen</h4>
                                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <div class="my-2">
                                                                    <input type="hidden" value="<?= $nidn; ?>" name="nidn" id="nidn">
                                                                    <h5>Apakah Kamu yakin akan menghapus data ini ?</h5>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="submit" class="btn btn-primary" name="hapusDataDosen" value="Hapus Data">
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
                    <h4 class="modal-title fw-bold">Tambah Data Dosen</h4>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row mb-3">
                            <label for="nidn" class="col-sm-3 col-form-label">NIDN</label>
                            <div class="col-sm-9">
                                <input type="text" name="nidn" class="form-control bg-secondary-subtle" id="nidn">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_dosen" class="col-sm-3 col-form-label">Nama Dosen</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_dosen" class="form-control bg-secondary-subtle" id="nama_dosen">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-control bg-secondary-subtle" name="jenis_kelamin">
                                    <option value="">--Pilih Jenis kelamin--</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" class="form-control bg-secondary-subtle" id="tempat_lahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir" class="form-control bg-secondary-subtle" id="tanggal_lahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control bg-secondary-subtle" id="alamat" cols="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="tambahDataDosen" value="Tambah Data">
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