<?php
require 'connect.php';



// Tambah Data
if (isset($_POST['tambahDataJurusan'])) {
  $kode_jurusan = $_POST['kode_jurusan'];
  $nama_jurusan = $_POST['nama_jurusan'];
  $kaprodi = $_POST['kaprodi'];

  $query = mysqli_query($conn, "INSERT INTO tb_jurusan (kode_jurusan, nama_jurusan, kaprodi) VALUES ('$kode_jurusan','$nama_jurusan','$kaprodi')");

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
if (isset($_POST['editDataJurusan'])) {
  

  $kode_jurusan = $_POST['kode_jurusan'];
  $nama_jurusan = $_POST['nama_jurusan'];
  $kaprodi = $_POST['kaprodi'];


  $query = mysqli_query($conn, "UPDATE tb_jurusan SET kode_jurusan = '$kode_jurusan', nama_jurusan = '$nama_jurusan', kaprodi = '$kaprodi' WHERE kode_jurusan = '$kode_jurusan'");

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
if (isset($_POST['hapusDataJurusan'])) {
  $kode_jurusan = $_POST['kode_jurusan'];

  $query = mysqli_query($conn, "DELETE FROM tb_jurusan WHERE kode_jurusan = '$kode_jurusan'");
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
