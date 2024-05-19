<?php
require 'connect.php';



// Tambah Data
if (isset($_POST['tambahDataMahasiswa'])) {
  $nim = $_POST['nim'];
  $nama_mahasiswa = $_POST['nama_mahasiswa'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];

  $query = mysqli_query($conn, "INSERT INTO tb_mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) VALUES ('$nim','$nama_mahasiswa','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat')");

  if ($query) {
    echo '
      <script>
        alert(\'Data Berhasil Dimasukkan\')
      </script>
    ';
    echo '
        <script>
          alert(\'Data Berhasil Dimasukkan\')
        </>';
  } else {
    echo '
        <script>
          alert(\'Data Gagal Dimasukkan\')
        </script>';
  }
}


// Edit Data
if (isset($_POST['editDataMahasiswa'])) {
  $nim = $_POST['nim'];
  $nama_mahasiswa = $_POST['nama_mahasiswa'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];


  $query = mysqli_query($conn, "UPDATE tb_mahasiswa SET nim = '$nim', nama_mahasiswa = '$nama_mahasiswa', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat' WHERE nim = '$nim'");

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
if (isset($_POST['hapusDataMahasiswa'])) {
  $nim = $_POST['nim'];

  $query = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE nim = '$nim'");
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
