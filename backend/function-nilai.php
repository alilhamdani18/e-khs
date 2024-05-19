<?php
require 'connect.php';



// Tambah Data
if (isset($_POST['tambahDataNilai'])) {
  $id_nilai = $_POST['id_nilai'];
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nim = $_POST['nim'];
  $absensi = $_POST['absensi'];
  $tugas = $_POST['tugas'];
  $uts = $_POST['uts'];
  $uas = $_POST['uas'];

  $query = mysqli_query($conn, "INSERT INTO tb_nilai (kode_mata_kuliah, nim, absensi, tugas, uts, uas) VALUES ('$kode_mata_kuliah','$nim', '$absensi','$tugas','$uts','$uas')");

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
if (isset($_POST['editDataNilai'])) {
  $id_nilai = $_POST['id_nilai'];
  $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
  $nim = $_POST['nim'];
  $absensi = $_POST['absensi'];
  $tugas = $_POST['tugas'];
  $uts = $_POST['uts'];
  $uas = $_POST['uas'];


  $query = mysqli_query($conn, "UPDATE tb_nilai SET kode_mata_kuliah = '$kode_mata_kuliah', nim = '$nim', absensi = '$absensi', tugas = '$tugas', uts = '$uts', uas = '$uas' WHERE id_nilai = '$id_nilai'");

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
if (isset($_POST['hapusDataNilai'])) {
  $id_nilai = $_POST['id_nilai'];

  $query = mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_nilai = '$id_nilai'");
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
