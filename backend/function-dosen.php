<?php
require 'connect.php';



// Tambah Data
if (isset($_POST['tambahDataDosen'])) {
  $nidn = $_POST['nidn'];
  $nama_dosen = $_POST['nama_dosen'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "INSERT INTO tb_dosen (nidn, nama_dosen, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) VALUES ('$nidn','$nama_dosen','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat')");

  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Dimasukkan\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Dimasukkan\')
        </script>';
  }
}


// Edit Data
if (isset($_POST['editDataDosen'])) {
  $nidn = $_POST['nidn'];
  $nama_dosen = $_POST['nama_dosen'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];


  $query = mysqli_query($conn, "UPDATE tb_dosen SET nidn = '$nidn', nama_dosen = '$nama_dosen', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat' WHERE nidn = '$nidn'");

  if ($query) {
    echo '
      <script>
        alert(\'Data Berhasil Diedit\')
      </script>';
  } else {
    echo '
      <script>
        alert(\'Data Gagal Diedit\')
      </script>';
  }
}

// hapus Data
if (isset($_POST['hapusDataDosen'])) {
  $nidn = $_POST['nidn'];

  $query = mysqli_query($conn, "DELETE FROM tb_dosen WHERE nidn = '$nidn'");
  if ($query) {
    echo '
        <script>
          alert(\'Data Berhasil Dihapus\')
        </script>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Dihapus\')
        </script>';
  }
}
