<?php
session_start();
require 'config/koneksi.php';
date_default_timezone_set("Asia/Jakarta");

// id topik nama kelas nama_file waktu_upload
$topik = $_SESSION['topik'];
$nama = $_SESSION['nama'];
$kelas = $_SESSION['kelas'];

$tmp_file = $_FILES['file']['tmp_name'];
$nama_file = $_FILES['file']['name'];
$ukuran_file = $_FILES['file']['size'];
$folder = "files/" . $nama_file;
$ekstensi_file = array('png', 'jpg', 'doc', 'docx', 'pdf', 'pptx', 'txt');
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));

if (in_array($ekstensi, $ekstensi_file) === TRUE) {
    if ($ukuran_file < 1044070) {
        if (move_uploaded_file($tmp_file, "$folder")) {
            $query = "INSERT INTO upload_tugas VALUES ('', '$topik', '$nama', '$kelas', '$nama_file', now())";
            mysqli_query($conn, $query);
            echo '
				<script>
                    alert("File: ' .  $nama_file . ' sukes di upload");
					window.location.href="kbm_murid.php"
				</script>
				';
            return false;
            header('Location: kbm_murid.php');
        } else {
            echo '
				<script>
					alert("Gagal upload materi!!!");
					window.location.href="upload_tugas.php"
				</script>
				';
            return false;
            header('Location: upload_tugas.php');
        }
    } else {
        echo '
				<script>
					alert("Ukuran file maksimal 1MB!!!");
					window.location.href="upload_tugas.php"
				</script>
				';
        return false;
        header('Location: upload_tugas.php');
    }
} else {
    echo '
        <script>
            alert("Gagal upload materi!!!");
            window.location.href="upload_tugas.php"
        </script>
        ';
    return false;
    header('Location: upload_tugas.php');
}
