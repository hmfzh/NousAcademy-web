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
if(isset($_GET['bab'])){
$_SESSION['bab_materi'] = $_GET['bab'];
$bab = $_GET['bab'];
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
    <title>Lihat Kuis</title>
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
        <div class="content m-5 pl-5 pt-3">
            <h3>Lihat Kuis</h3>
            <hr class="bg-dark">
            <div class="container">
                <h3>Bab <?php echo $bab . '<br>'; ?></h3>

                <div class="container">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Topik</th>
                                <th scope="col">Nama File</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_bab = "SELECT * FROM materi WHERE bab = '" . $bab . "' AND kelas = '" . $_SESSION['kelas'] . "'";
                            $query_bab = mysqli_query($conn, $sql_bab);
                            while ($result = mysqli_fetch_array($query_bab)) {
                            ?>
                                <tr>
                                    <td><?php echo $result['topik']; ?></td>
                                    <td><?php echo $result['nama_file']; ?></td>
                                    <td><a href="download.php?filename=<?php $result['nama_file']; ?>">Download</a></td>
                                    <td><a class="btn btn-outline-danger" href="edit_materi.php?id=<?php echo $result['id']; ?>" role="button">Edit</a></td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>
</body>

</html>