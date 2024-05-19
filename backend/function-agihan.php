<?php
require 'connect.php';



// Tambah Data
if (isset($_POST['tambahDataAgihan'])) {
  $id_agihan = $_POST['id_agihan'];
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nidn = $_POST['nidn'];
  $tahun = $_POST['tahun'];

  $query = mysqli_query($conn, "INSERT INTO tb_agihan (kode_mata_kuliah, nidn, tahun) VALUES ('$kode_mata_kuliah','$nidn', '$tahun')");

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
if (isset($_POST['editDataAgihan'])) {
  $id_agihan = $_POST['id_agihan'];
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nidn = $_POST['nidn'];
  $tahun = $_POST['tahun'];


  $query = mysqli_query($conn, "UPDATE tb_agihan SET kode_mata_kuliah = '$kode_mata_kuliah', nidn = '$nidn', tahun = '$tahun' WHERE id_agihan = '$id_agihan'");

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
if (isset($_POST['hapusDataAgihan'])) {
  $id_agihan = $_POST['id_agihan'];

  $query = mysqli_query($conn, "DELETE FROM tb_agihan WHERE id_agihan = '$id_agihan'");
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
