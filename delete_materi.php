<?php
session_start();
require 'config/koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM materi WHERE id = '" . $id . "'";
$query = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($query)) {
    if (is_file("files/" . $data['nama_file'])) unlink("files/" . $data['nama_file']);
}
$hapus = "DELETE FROM materi WHERE id = '" . $id . "'";
$delete = mysqli_query($conn, $hapus);
if($delete) {
    echo '
    <script>
        alert("Materi berhasil dihapus");
        window.location.href="kbm_guru.php"
    </script>
    ';
    return false;
} else {
    echo '
    <script>
        alert("Materi Gagal dihapus");
        window.location.href="kbm_guru.php"
    </script>
    ';
}
header('Location: kbm_guru.php');