<?php
session_start();
require "config/koneksi.php";
if (empty($_SESSION)) {
    echo '
				<script>
					alert("Anda Belum Login");
					window.location.href="index.php"
				</script>
				';
    return false;
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <title>PT1</title>

    <style>
        html,
        body {
            height: 100%;
        }

        .container-1 {
            width: 15%;
            height: 100%;
            background-color: grey;
            float: left;
        }

        .container-1 img {
            width: 130px;
            background-color: #fff;
            margin-top: 50px;
            margin-bottom: 30px;
            border-radius: 50%;
        }

        .container-2 {
            height: 100%;
            width: 85%;
            background-color: white;
            overflow: auto;
        }

        nav {
            width: 100%;
        }

        nav ul li {
            float: right;
            list-style: none;
        }


        a:hover {
            background-color: grey;
        }

        .card {
            width: 45%;
            float: left;
            margin-left: 50px;
            margin-top: 20px;
            overflow: auto;
        }

        .card a {
            text-decoration: none;
            color: black;
        }

        .l1 {
            width: 58%;
            height: 67%;
            margin: 5%;
            /*padding: 25px;*/
            background: white;
            border: 1px solid silver;
            border-radius: 20px;
        }

        .l1 h4,
        .l1 p,
        .l1 a {
            margin: 5px;
        }

        footer {
            clear: both;
            overflow: hidden;
            background-color: #343a40;
        }

        footer p {
            color: white;
            font-size: 20px;
            text-align: center;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <img src="image/logo.png" style="width: 125px;">


        <a class="ml-auto" data-toggle="modal" data-target="#exampleModal">
            <img src="image/logout.png" style="width: 40%;float: right;" data-toggle="tooltip" title="Logout">
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda Ingin Logout?
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-outline-primary" href="logout.php">Iya</a>
                        <a class="btn btn-outline-secondary" data-dismiss="modal">Tidak</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="container-1">
        <div class="container ml-auto">
            <center>
                <img src="image/profil.png" alt="" srcset="">
                <p> <?php print_r($_SESSION['nama']); ?> </p>
                <p>Wali kelas:<br> </p>
                <?php print_r($_SESSION['wali_kelas']); ?> </p>
                <p>Mata Pelajaran: </p>
                <?php print_r($_SESSION['matpel']); ?>
            </center>
        </div>
    </div>

    <div class="container-2">
        <div class="content m-5 pl-5 pt-3">
            <h3>Create and get your own...</h3>
            <h3>keep spirit to teach</h3>
        </div>

        <div class="input-group md-form form-sm form-1 m-5 pl-5 pt-3 col-3">
            <form action="" method="get">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="submit" name="cari" id="button-addon1"><i class="fa fa-search text-dark" aria-hidden="true"></i></button>
                    <input class="form-control my-0 py-1" type="text" placeholder="Search" name="cari" aria-label="Search">
                </div>
            </form>
        </div>

        <div class="container">
            <div clas="container ml-auto" style="text-align:right;">
                <a href="tambah_kelas.php">Create new class</a>
            </div>
            <hr class="bg-dark">
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                echo "<p>Hasil pencarian " . $cari . "</p>";
                $nama = $_SESSION['nama'];
                $pencarian = ("SELECT * FROM mata_pelajaran WHERE nama_guru ='$nama' AND kelas LIKE '%" . $cari . "%' OR nama_matpel LIKE '%" . $cari . "%'");
                $query = mysqli_query($conn, $pencarian);
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                        $matpel = $data['nama_matpel'];
                        $kelas = $data['kelas'];
                        $thn = $data['tahun_ajaran'];
                        $warna = $data['warna'];
                        $data_arr = array(
                            'matpel' => $matpel,
                            'kelas' => $kelas,
                            'thn_ajr' => $thn
                        );
            ?>
                        <div class="card" style=" border-radius: 10px; background-color: <?php echo $warna; ?> ">
                            <?php echo "<a href='kbm_guru.php?" .  http_build_query($data_arr) . "'>"; ?>
                            <div class="card-header">
                                <h6>
                                    <?php echo $data['nama_matpel'] . ' ' . $data['kelas'] . '<br>' . '(' . $data['tahun_ajaran'] . ')'; ?>
                                </h6>
                            </div>
                            <div class="card-body">
                                <?php $nama_wk = "SELECT wali_kelas as wali FROM kelas WHERE nama_kelas = '" . $data['kelas'] . "' ";
                                $sql_wk = mysqli_query($conn, $nama_wk);
                                while ($wk = mysqli_fetch_array($sql_wk)) { ?>
                                    <p>Nama walikelas: <?php echo $wk[0]; ?></p>
                                <?php } ?>
                                <?php $jml_siswa = "SELECT COUNT(*) FROM data_murid WHERE kelas = '" . $data['kelas'] . "' ";
                                $sql_siswa = mysqli_query($conn, $jml_siswa);
                                while ($org = mysqli_fetch_array($sql_siswa)) { ?>
                                    <p>Jumlah murid: <?php echo $org[0]; ?></p>
                                <?php } ?>
                            </div>
                            </a>
                        </div>
                    <?php }
                } else { ?>
                    <h3>Tidak ada kelas</h3>
                <?php }
            } else {
                $nama = $_SESSION['nama'];
                $sql = "SELECT * FROM mata_pelajaran WHERE nama_guru ='$nama' ";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_assoc($query)) {
                    $nama_wk = "SELECT wali_kelas as wali FROM kelas WHERE nama_kelas = '" . $data['kelas'] . "' ";
                    $jml_siswa = "SELECT COUNT(*) FROM data_murid WHERE kelas = '" . $data['kelas'] . "' ";
                    $sql_wk = mysqli_query($conn, $nama_wk);
                    $sql_siswa = mysqli_query($conn, $jml_siswa);
                    $matpel = $data['nama_matpel'];
                    $kelas = $data['kelas'];
                    $thn = $data['tahun_ajaran'];
                    $warna = $data['warna'];
                    $data_arr = array(
                        'matpel' => $matpel,
                        'kelas' => $kelas,
                        'thn_ajr' => $thn
                    );
                ?>
                    <div class="card" style=" border-radius: 10px; background-color: <?php echo $warna; ?> ">
                        <?php echo "<a href='kbm_guru.php?" .  http_build_query($data_arr) . "'>"; ?>
                        <div class="card-header">
                            <h6>
                                <?php echo $data['nama_matpel'] . ' ' . $data['kelas'] . '<br>' . '(' . $data['tahun_ajaran'] . ')'; ?>
                            </h6>
                        </div>
                        <div class="card-body">
                            <?php while ($wk = mysqli_fetch_array($sql_wk)) { ?>
                                <p>Nama walikelas: <?php echo $wk[0]; ?></p>
                            <?php } ?>
                            <?php while ($org = mysqli_fetch_array($sql_siswa)) { ?>
                                <p>Jumlah murid: <?php echo $org[0]; ?></p>
                            <?php } ?>
                        </div>
                        </a>
                    </div>
            <?php }
            } ?>
        </div>
    </div>

    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>