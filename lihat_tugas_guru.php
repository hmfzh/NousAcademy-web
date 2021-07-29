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
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_tugas'] = $id;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>
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
        height: 100%;
        background-color: white;
        float: right;
        overflow: auto;
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

    h2 {
        margin: 40px auto;
        text-align: center;
    }
</style>

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
            <h3>Lihat Tugas</h3>
            <hr class="bg-dark">
            <div class="container">
                <?php
                $sql = "SELECT * FROM tugas WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                while ($hasil = mysqli_fetch_assoc($result)) {
                    $topik = $hasil['topik'];
                ?>
                    <h3>
                        Bab <?php echo  $hasil['bab']; ?>
                        <small class="text-muted"><?php echo $hasil['topik']; ?></small>
                    </h3>
                    <dl class="row">
                        <dt class="col-sm-3">Deskripsi</dt>
                        <dd class="col-sm-9"><?php echo $hasil['deskripsi']; ?></dd>
                    </dl>
                    <a class="btn btn-outline-danger" href="edit_tugas.php?id=<?php echo $hasil['id']; ?>" role="button">Edit</a>
                    <?php }
                $sql = "SELECT * FROM upload_tugas WHERE topik = '$topik' AND kelas = '" . $_SESSION['kelas'] . "'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        $i = 1;
                    ?>
                        <table class="table table-bordered" style="width: 75%;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Waktu Upload</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><a href="download.php?filename=<?php echo $data['nama_file'] ?>"><?php echo $data['nama_file'] ?></a></td>
                                    <td><?php echo $data['waktu_upload'] ?></td>
                                </tr>
                            <?php }
                    } else { ?>
                            <div class="container">
                                <h2>Tidak ada data</h2>
                            </div>
                        <?php
                    }
                        ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>
</body>

</html>