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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tambah Kuis</title>
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

    <div class="container">
        <div class="container-2">
            <div class="content m-5 pl-5 pt-3">
                <h3>Tambah Kuis</h3>
                <h5>Kelas: <?php echo $_SESSION['kelas'] ?></h5>
                <h5>Mata Pelajaran: <?php echo $_SESSION['matpel'] ?></h5>
            </div>
            <hr class="bg-dark">

            <form class="container form-horizontal" action="tambah_kuis_proses.php" method="post">
                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Bab</label>
                    <div class="col-sm-7">
                        <input type="text" name="bab" class="form-control" placeholder="Bab" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Topik</label>
                    <div class="col-sm-7">
                        <input type="text" name="topik" class="form-control" placeholder="topik" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Deskripsi</label>
                    <div class="col-sm-7">
                        <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Link Untuk Guru</label>
                    <div class="col-sm-7">
                        <input type="text" name="link-guru" class="form-control" placeholder="Link Guru" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label col-sm-2">Link Untuk Siswa</label>
                    <div class="col-sm-7">
                        <input type="text" name="link-siswa" class="form-control" placeholder="Link Siswa" required>
                    </div>
                </div>

                <button class="content btn btn-outline-warning" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>
</body>

</html>