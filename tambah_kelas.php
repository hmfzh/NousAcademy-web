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
    <title>Tambah Kelas</title>
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
            <h3>Tambah Kelas</h3>
        </div>

        <form class="container content m-5 pl-5 pt-3" action="tambah_kelas_proses.php" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nim" class="control-label col-sm-2">Nama Guru</label>
                <div class="col-sm-7">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Guru" value="<?php echo $_SESSION['nama'] ?>" disabled>
                </div>
            </div>


            <div class="form-group">
                <label for="tahunAjaran" class="control-label col-sm-2">Tahun Ajaran</label>
                <div class="col-sm-7">
                    <input type="text" name="tahun_ajaran" class="form-control" id="" placeholder="Tahun Ajaran" required>
                </div>
            </div>

            <div class="form-group">
                <label for="matpel" class="control-label col-sm-2">Mata Pelajaran</label>
                <div class="col-sm-7">
                    <input type="text" name="matpel" class="form-control" id="" placeholder="Mata Pelajaran" required>
                </div>
            </div>



            <div class="form-group container">
                <label>Kelas</label><br>
                <select class="custom-select mr-sm-2 col-sm-7" id="kode" name="kelas">
                    <option value="" selected disabled>Pilih Kelas</option>
                    <option value="" disabled>VII</option>
                    <option value="VII A">VII A</option>
                    <option value="VII B">VII B</option>
                    <option value="VII C">VII C</option>
                    <option value="VII D">VII D</option>
                    <option value="VII E">VII E</option>
                    <option value="" disabled>VIII</option>
                    <option value="VIII A">VIII A</option>
                    <option value="VIII B">VIII B</option>
                    <option value="VIII C">VIII C</option>
                    <option value="VIII D">VIII D</option>
                    <option value="VIII E">VIII E</option>
                    <option value="" disabled>IX</option>
                    <option value="IX A">IX A</option>
                    <option value="IX B">IX B</option>
                    <option value="IX C">IX C</option>
                    <option value="IX D">IX D</option>
                    <option value="IX E">IX E</option>
                </select>
            </div>

            <div class="form-group container">
                <label for="color">Warna</label><br>
                <input class="custom-select mr-sm-2 col-sm-7" type="color" name="color" id="" value=""><br>
            </div>
            <div><button class="content btn btn-outline-warning" type="submit" name="submit">Tambah Kelas</button></div>
        </form>
    </div>

    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>