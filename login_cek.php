<?php
session_start();
require 'config/koneksi.php';

// Cek login murid
if (isset($_POST['murid'])) {
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $password = mysqli_real_escape_string($conn,$_POST['password_murid']);

    $queryCek = "SELECT * FROM data_murid WHERE nis = '$nis' AND password = '$password'";
    $result_murid = mysqli_query($conn, $queryCek);

    if (mysqli_num_rows($result_murid) > 0) {
        $data_murid = mysqli_fetch_assoc($result_murid);
        $_SESSION['nama'] = $data_murid['nama'];
        $_SESSION['kelas'] = $data_murid['kelas'];
        header('Location: murid.php');
    } else {
        echo '
				<script>
					alert("Nis/Password salah!");
					window.location.href="index.php"
				</script>
				';
        return false;
    }
}

// Cek login guru
if (isset($_POST['guru'])) {
    $nip = mysqli_real_escape_string($conn,$_POST['nip']);
    $password = mysqli_real_escape_string($conn,$_POST['password_guru']);

    $queryCek = "SELECT * FROM data_guru WHERE nip = '$nip' AND password = '$password'";
    $result = mysqli_query($conn, $queryCek);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['telp'] = $data['no_telp'];
        $_SESSION['matpel'] = $data['mata_pelajaran'];
        $_SESSION['wali_kelas'] = $data['wali_kelas'];
        header('Location: guru.php');
    } else {
        echo '
				<script>
					alert("Nis/Password salah!");
					window.location.href="index.php"
				</script>
				';
        return false;
    }
}
