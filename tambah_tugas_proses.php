<?php
session_start();
require 'config/koneksi.php';
if (isset($_POST['submit'])) {
  $bab = $_POST['bab'];
  $bab = addslashes($bab);
  $bab = htmlspecialchars($bab);
  $topik = $_POST['topik'];
  $topik = addslashes($topik);
  $topik = htmlspecialchars($topik);
  $deskripsi = $_POST['deskripsi'];
  $deskripsi = addslashes($deskripsi);
  $deskripsi = htmlspecialchars($deskripsi);
  $kelas = $_SESSION['kelas'];
  $matpel = $_SESSION['matpel'];
  $query = "INSERT INTO tugas VALUES('', '$bab', '$topik', '$deskripsi', '$kelas', '$matpel')";
  $add = mysqli_query($conn, $query);
  if ($add) {
    echo '
				<script>
					alert("Berhasil upload tugas!!!");
					window.location.href="kbm_guru.php"
				</script>
				';
    return false;
    header('Location: kbm_guru.php');
  } else {
    '
				<script>
					alert("Gagal upload tugas!!!");
					window.location.href="tambah_tugas.php"
				</script>
				';
    return false;
    header('Location: tambah_tugas.php');
  }
}
