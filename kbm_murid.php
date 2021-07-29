<?php
session_start();
require 'config/koneksi.php';

if (empty($_SESSION)) {
    echo '
				<script>
					alert("Anda Belum Login");
					window.location.href="index.php"
				</script>
				';
    return false;
    header('Location:index.php');
};
if (isset($_GET['matpel'])) {
    $_SESSION['matpel'] = $_GET['matpel'];
    $_SESSION['guru'] = $_GET['guru'];
    $_SESSION['thn'] = $_GET['thn'];
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
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".materi").click(function() {
                $(".materi-1").show();
                $(".kuis-1").hide();
                $(".tugas-1").hide();
                $(".member-1").hide();

            });

            $(".tugas").click(function() {
                $(".tugas-1").show();
                $(".materi-1").hide();
                $(".kuis-1").hide();
                $(".member-1").hide();

            });

            $(".kuis").click(function() {
                $(".kuis-1").show();
                $(".materi-1").hide();
                $(".tugas-1").hide();
                $(".member-1").hide();

            });

            $(".member").click(function() {
                $(".member-1").show();
                $(".materi-1").hide();
                $(".kuis-1").hide();
                $(".tugas-1").hide();

            });


        });
    </script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cabin';
        }

        html,
        body {
            height: 100%;
        }

        body {
            background-color: white;
        }

        .home {
            height: 100%;
            overflow: auto;
        }

        .home::after {
            content: "";
            clear: both;
            display: table;
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
            width: 85%;
            height: 90%;
            background-color: white;
            float: right;
            overflow: auto;
        }

        .container-2 .info {
            margin-top: 100px;
            margin-left: 200px;
        }

        #main {
            width: 80%;
            margin: 20px auto;
        }

        .table-menu {
            clear: both;
        }

        #tab-btn {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            width: 35%;
            float: right;
            justify-content: center;
        }


        .materi,
        .tugas,
        .kuis,
        .member {
            text-decoration: none;
            display: block;
            width: 50%;
            text-align: center;
            color: #fff;
            font-size: 25px;
            padding: 10px;
        }

        .materi {
            background: white;
            color: black;
            border: 1px solid black;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tugas {
            background: white;
            color: red;
            border: 1px solid red;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .kuis {
            background: white;
            color: green;
            border: 1px solid green;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .member {
            background: white;
            color: aqua;
            border: 1px solid aqua;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        .materi-1,
        .tugas-1,
        .kuis-1,
        .member-1 {
            width: 100%;
            background-color: white;
            margin-top: 5px;
            margin-bottom: 10px;
            padding: 20px 30px 30px 30px;
            box-shadow: 2px 2px 5px #333;
            overflow: auto;
        }

        .tugas-1,
        .kuis-1,
        .member-1 {
            display: none;
        }

        .table img {
            float: right;
        }

        h2 {
            text-align: center;
            padding-bottom: 15px;
            color: #333;
            font-size: 30px;
            font-variant: small-caps;
        }

        .sub-menu {
            background-color: silver;
            width: 100%;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 10px;
        }

        .wrapper {
            align-items: center;
        }

        .list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .list li {
            position: relative;
            margin-bottom: 5px;
        }

        ul li {
            font-size: 19px;
            list-style: none;
        }

        footer {
            clear: both;
            overflow: hidden;
            background-color: #343a40;
            bottom: 0;
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
            <img src="image/logout.png" style="width: 40%;float: right;" data-toggle="tooltip" title="Logout" sr>
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
                <p>kelas</p>
                <p><?php echo $_SESSION['kelas']; ?></p>
                <p>Wali Kelas</p>
                <?php print_r($_SESSION['wali_kelas']);
                ?>
            </center>
        </div>
    </div>

    <div class="container-2">
        <div class="info">
            <h3><?php
                $sql = "SELECT * FROM data_guru WHERE nama = '" . $_SESSION['guru'] . "'";
                $guru = mysqli_query($conn, $sql);
                while ($info = mysqli_fetch_assoc($guru)) {
                    print_r($_SESSION['matpel']);
                    echo " (" . $_SESSION['thn'] . ")"; ?></h3>
            <h5>Guru: <?php echo $info['nama']; ?></h5>
            <h5>Email: <?php echo $info['email']; ?></h5>
            <h5>No Telp: <?php echo $info['no_telp']; ?></h5>
        <?php } ?>
        </div>
        <div class="table-menu">
            <div id="main">
                <div id="tab-btn" style="padding-bottom: 1  px;">
                    <a href="#" class="materi" style="margin-right: 10px">Materi</a>
                    <a href="#" class="tugas" style="margin-right: 10px">Tugas</a>
                    <a href="#" class="kuis" style="margin-right: 10px">Kuis</a>
                    <a href="#" class="member" style="margin-right: 10px">Member</a>
                </div>
                <div class="table" style="background:black; padding:30px; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; border-top-left-radius: 5px; border-top-right-radius: 5px; overflow: hidden;">
                    <div class="materi-1">
                        <h2>Materi</h2>
                        <?php $list_materi = "SELECT DISTINCT bab FROM materi WHERE kelas = '" . $_SESSION['kelas'] . "' AND mata_pelajaran = '" . $_SESSION['matpel'] . "' ORDER BY bab ASC";
                        $query_materi = mysqli_query($conn, $list_materi);
                        if (mysqli_num_rows($query_materi) > 0) {
                            while ($data = mysqli_fetch_assoc($query_materi)) { ?>
                                <div class="sub-menu" id="tugas-list">
                                    <h5>Bab <?php echo $data['bab']; ?></h5>
                                    <?php
                                    $sql_bab = "SELECT judul, nama_file FROM materi WHERE bab IN ('" . $data['bab'] . "') AND kelas = '" . $_SESSION['kelas'] . "'";
                                    $query_bab = mysqli_query($conn, $sql_bab);
                                    while ($hasil = mysqli_fetch_array($query_bab)) {
                                    ?>
                                        <div class="wrapper">
                                            <ul class="list">
                                                <li><a href="download.php?filename=<?php $hasil['nama_file']; ?>"><?php echo $hasil['judul']; ?></a></li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php
                        } else { ?>
                            <div class="sub-menu">
                                <h5>Tidak ada data</h5>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="tugas-1">
                        <h2>Tugas</h2>
                        <?php $list_tugas = "SELECT DISTINCT bab FROM tugas WHERE kelas = '" . $_SESSION['kelas'] . "' AND mata_pelajaran = '" . $_SESSION['matpel'] . "' ORDER BY bab ASC";
                        $query_tugas = mysqli_query($conn, $list_tugas);
                        if (mysqli_num_rows($query_tugas) > 0) { ?>
                            <?php while ($tugas = mysqli_fetch_assoc($query_tugas)) { ?>
                                <div class="sub-menu">
                                    <h5>Bab <?php echo $tugas['bab'] . '<br>'; ?></h5>
                                    <?php
                                    $sql_tugas_cek = "SELECT * FROM tugas WHERE bab IN ('" . $tugas['bab'] . "') AND kelas = '" . $_SESSION['kelas'] . "' AND  mata_pelajaran = '" . $_SESSION['matpel'] . "'";
                                    $query_tugas_cek = mysqli_query($conn, $sql_tugas_cek);
                                    while ($result = mysqli_fetch_assoc($query_tugas_cek)) {
                                        $bab = $result['bab'];
                                        $topik = $result['topik'];
                                        $data_arr = array(
                                            'bab' => $bab,
                                            'topik' => $topik
                                        );
                                    ?>
                                        <div class="wrapper">
                                            <ul class="list">
                                                <li><a href="upload_tugas.php?<?php echo http_build_query($data_arr); ?>" target="_blank" rel="noopener noreferrer"><?php echo $result['topik']; ?></a>
                                                    <?php
                                                    $cek_upload = "SELECT * FROM upload_tugas WHERE topik = '" . $result['topik'] . "' AND nama = '" . $_SESSION['nama'] . "'";
                                                    $query_cek = mysqli_query($conn, $cek_upload);
                                                    if (mysqli_num_rows($query_cek) > 0) { ?>
                                                        &#10004;
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </a>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="sub-menu">
                                <h5>Tidak ada data</h5>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="kuis-1">
                        <h2>Kuis</h2>
                        <?php $list_kuis = "SELECT DISTINCT bab FROM kuis WHERE kelas = '" . $_SESSION['kelas'] . "' AND mata_pelajaran = '" . $_SESSION['matpel'] . "' ORDER BY bab ASC";
                        $query_kuis = mysqli_query($conn, $list_kuis);
                        if (mysqli_num_rows($query_kuis) > 0) {
                            while ($kuis = mysqli_fetch_assoc($query_kuis)) {
                        ?>
                                <div class="sub-menu">
                                    <h5>Bab <?php echo $kuis['bab'] . '<br>'; ?></h5>
                                    <?php
                                    $kuis_bab = "SELECT * FROM kuis WHERE bab IN ('" . $kuis['bab'] . "') AND kelas = '" . $_SESSION['kelas'] . "' AND mata_pelajaran = '" . $_SESSION['matpel'] . "' ORDER BY bab ASC";
                                    $hsl_kuis = mysqli_query($conn, $kuis_bab);
                                    while ($result = mysqli_fetch_assoc($hsl_kuis)) {
                                        $bab = $kuis['bab'];
                                        $topik = $result['topik'];
                                        $data_arr = array(
                                            'bab' => $bab,
                                            'topik' => $topik
                                        );
                                    ?>
                                        <ul id="list">
                                            <li><a href="lihat_kuis_murid.php?<?php echo http_build_query($data_arr); ?>"><?php echo $result['topik']; ?></a></li>
                                        </ul>
                                </div>
                        <?php }
                                }
                            } else { ?>
                        <div class="sub-menu">
                            <h5>Tidak ada data</h5>
                        <?php } ?>
                        </div>
                    </div>

                    <div class="member-1">
                        <div class="container">
                            <h2>Member</h2>
                            <?php $list_siswa = "SELECT * FROM data_murid WHERE kelas = '" . $_SESSION['kelas'] . "' ORDER BY nama ASC";
                            $query_siswa = mysqli_query($conn, $list_siswa);
                            while ($data = mysqli_fetch_assoc($query_siswa)) { ?>
                                <div class="sub-menu">
                                    <h5><?php echo $data['nama']; ?></h5>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>