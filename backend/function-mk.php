<?php
require 'connect.php';



// Tambah Data
if (isset($_POST['tambahDataMK'])) {
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
  $sks = $_POST['sks'];

  $query = mysqli_query($conn, "INSERT INTO tb_mata_kuliah (kode_mata_kuliah, nama_mata_kuliah, sks) VALUES ('$kode_mata_kuliah','$nama_mata_kuliah','$sks')");

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
if (isset($_POST['editDataMK'])) {
  

  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
  $sks = $_POST['sks'];


  $query = mysqli_query($conn, "UPDATE tb_mata_kuliah SET kode_mata_kuliah = '$kode_mata_kuliah', nama_mata_kuliah = '$nama_mata_kuliah', sks = '$sks' WHERE kode_mata_kuliah = '$kode_mata_kuliah'");

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
if (isset($_POST['hapusDataMK'])) {
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];

  $query = mysqli_query($conn, "DELETE FROM tb_mata_kuliah WHERE kode_mata_kuliah = '$kode_mata_kuliah'");
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
