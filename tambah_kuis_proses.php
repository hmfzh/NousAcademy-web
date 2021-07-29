<?php
session_start();
require 'config/koneksi.php';

if (isset($_POST['submit'])) {
  // kelas matpel bab deskripsi link guru and siswa
  $kelas = $_SESSION['kelas'];
  $matpel = $_SESSION['matpel'];
  $bab = $_POST['bab'];
  $bab = addslashes($bab);
  $bab = htmlspecialchars($bab);
  $topik = $_POST['topik'];
  $topik = addslashes($topik);
  $topik = htmlspecialchars($topik);
  $deskripsi = $_POST['deskripsi'];
  $deskripsi = addslashes($deskripsi);
  $deskripsi = htmlspecialchars($deskripsi);
  $link_guru = $_POST['link-guru'];
  $link_guru = urlencode($link_guru);
  $link_siswa = $_POST['link-siswa'];
  $link_siswa = urlencode($link_siswa);
  $query = "INSERT INTO kuis VALUES('', '$kelas', '$matpel', '$bab', '$topik', '$deskripsi', '$link_guru', '$link_guru')";
  $add = mysqli_query($conn, $query);
  if ($add) {
    echo '
				<script>
					alert("Berhasil upload kuis!!!");
					window.location.href="kbm_guru.php"
				</script>
				';
    return false;
    header('Location: kbm_guru.php');
  } else {
    '
				<script>
					alert("Gagal upload kuis!!!");
					window.location.href="tambah_kuis.php"
				</script>
				';
    return false;
    header('Location: tambah_kuis.php');
  }
}
