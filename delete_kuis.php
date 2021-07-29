<?php
session_start();
require 'config/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM kuis WHERE id = '" . $id . "'";
$query = mysqli_query($conn, $sql);
if($query) {
echo 'berhasil';
} else {
echo 'gagal';
}
header('Location: lihat_kuis_guru.php');
