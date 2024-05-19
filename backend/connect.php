<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "khs_ku";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn) {
  echo "koneksi database gagal";
}
