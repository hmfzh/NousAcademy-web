<?php
session_start();
require 'config/koneksi.php';
if (isset($_POST['submit'])) {
    // matpel thn guru kelas
    echo 'sampai';
    $matpel = $_POST['matpel'];
    $thn_ajr = $_POST['tahun_ajaran'];
    $nama = $_SESSION['nama'];
    $kelas = $_POST['kelas'];
    $color = $_POST['color'];
    $query = "INSERT INTO mata_pelajaran VAlUES('', '$matpel', '$thn_ajr', '$nama','$kelas', '$color')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '
				<script>
					alert("Berhasil Buat Kelas!!!");
					window.location.href="guru.php"
				</script>
				';
        return false;
        header('Location: guru.php');
    } else {
        '
				<script>
					alert("Gagal Buat Kelas!!!");
					window.location.href="tambah_kelas.php"
				</script>
				';
        return false;
        header('Location: tambah_kelas.php');
    }
}