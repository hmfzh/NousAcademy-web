<?php
session_start();
require 'config/koneksi.php';
// bab, topik, nama_file, kelas, matpel
$id = $_SESSION['id_materi'];
$bab = $_POST['bab'];
$bab = addslashes($bab);
$bab = htmlspecialchars($bab);
$topik = $_POST['topik'];
$topik = addslashes($topik);
$topik = htmlspecialchars($topik);
$kelas = $_SESSION['kelas'];
$matpel = $_SESSION['matpel'];

$tmp_file = $_FILES['file']['tmp_name'];
$ukuran_file = $_FILES['file']['size'];
$nama_folder = $kelas . '/' . $matpel . '/' . $bab . '/';
$nama_file = $nama_folder . $_FILES['file']['name'];
$folder = "files/" . $nama_file;
$ekstensi_file = array('png', 'jpg', 'doc', 'docx', 'pdf', 'pptx', 'txt');
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));

    if (in_array($ekstensi, $ekstensi_file) === TRUE) {
        if ($ukuran_file < 1044070) {
            $sql = "SELECT * FROM materi WHERE id = '" . $id . "'";
            $cari = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($cari)) {
                if (is_file("files/" . $data['nama_file'])) unlink("files/" . $data['nama_file']);
            }
            if (move_uploaded_file($tmp_file, "$folder")) {
                $query = "UPDATE materi SET bab='" . $bab . "', topik='" . $topik . "', nama_file='" . $nama_file . "', kelas='" . $kelas . "', mata_pelajaran='" . $matpel . "' WHERE id = '" . $id . "' ";
                mysqli_query($conn, $query);
                echo '
				<script>
					alert("File sukes di upload");
					window.location.href="kbm_guru.php"
				</script>
				';
                return false;
                header('Location: kbm_guru.php');
            } else {
                echo '
				<script>
					alert("Gagal");
					window.location.href="tambah_materi.php"
				</script>
				';
                return false;
                header('Location: tambah_materi.php');
            }
        } else {
            echo '
				<script>
					alert("Ukuran file terlalu besar");
					window.location.href="tambah_materi.php"
				</script>
				';
            return false;
            header('Location: tambah_materi.php');
        }
    }
