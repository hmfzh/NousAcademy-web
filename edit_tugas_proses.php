<?php
session_start();
require 'config/koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_SESSION['id_tugas'];
    $bab = $_POST['bab'];
    $bab = addslashes($bab);
    $bab = htmlspecialchars($bab);
    $topik = $_POST['topik'];
    $topik = addslashes($topik);
    $topik = htmlspecialchars($topik);
    $deskripsi = $_POST['deskripsi'];
    $deskripsi = addslashes($deskripsi);
    $deskripsi = htmlspecialchars($deskripsi);
    $query = "UPDATE tugas SET bab='" . $bab . "', topik='" . $topik . "', deskripsi='" . $deskripsi . "' WHERE id = '" . $id . "'";
    $add = mysqli_query($conn, $query);
    if ($add) {
        echo '
				<script>
					alert("Berhasil edit tugas!!!");
					window.location.href="kbm_guru.php"
				</script>
				';
        return false;
        header('Location: kbm_guru.php');
    } else {
        echo '
				<script>
					alert("Gagal upload tugas!!!");
					window.location.href="edit_tugas.php"
				</script>
				';
        return false;
        header('Location: tambah_tugas.php');
    }
}
