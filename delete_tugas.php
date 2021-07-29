<?php
session_start();
require 'config/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM tugas WHERE id = '".$id."'";
$query = mysqli_query($conn, $sql);
header('Location: lihat_kuis_guru.php');