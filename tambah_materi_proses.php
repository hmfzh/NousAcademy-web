<?php
session_start();
require 'config/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
// bab, judul, nama_file, kelas, tanggal, matpel
$bab = $_POST['bab'];
$bab = addslashes($bab);
$bab = htmlspecialchars($bab);
$judul = $_POST['judul'];
$judul = addslashes($judul);
$judul = htmlspecialchars($judul);
$kelas = $_SESSION['kelas'];
$matpel = $_SESSION['matpel'];

$tmp_file = $_FILES['file']['tmp_name'];
$nama_file = $kelas . $matpel . $bab . $judul . $_FILES['file']['name'];
$ukuran_file = $_FILES['file']['size'];
$folder = "files/" . $nama_file;
$tgl = date("Ymd");
$ekstensi_file = array('png', 'jpg', 'doc', 'docx', 'pdf', 'pptx', 'txt');
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));

if (in_array($ekstensi, $ekstensi_file) === TRUE) {
    if ($ukuran_file < 1044070) {
        if (move_uploaded_file($tmp_file, "$folder")) {
            $query = "INSERT INTO materi VALUES ('', '$bab', '$judul', '$nama_file', '$kelas', '$tgl', '$matpel')";
            mysqli_query($conn, $query);
            echo '
				<script>
					alert("File: ' .  $nama_file . ' sukes di upload");
					window.location.href="kbm_guru.php"
				</script>
				';
            return false;
            header('Location: kbm_guru.php');
        } else {
            echo '
				<script>
					alert("Gagal upload materi!!!");
					window.location.href="tambah_materi.php"
				</script>
				';
            return false;
            header('Location: tambah_materi.php');
        }
    } else {
        echo 'Ukuran file terlalu besar';
    }
} else {
    echo '
				<script>
					alert("Ekstensi file tidak valid!");
					window.location.href="tambah_materi.php"
				</script>
				';
    return false;
    header('Location: tambah_materi.php');
}
