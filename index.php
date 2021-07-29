<?php
session_start();
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nous Academia</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="image/logo.png" style="width: 125px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    </nav>
    <div>
        <table>
            <tr>
                <td rowspan="4"><img src="image/hm-1.png" alt=""></td>
            </tr>
            <tr>
                <td>
                    <h2>Let's get study with us</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <p>DREAM BIG DO MORE</p>
                    <p>
                        we can make that possible <br />
                        to be true
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="1" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Login As Student</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Login As Student</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="login_cek.php" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <center><img src="image/profil.png" style="width:30%; padding-bottom:30px;"></center>
                                                <input type="text" name="nis" class="form-control" placeholder="NIS" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_murid" class="form-control" placeholder="password" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="murid" class="btn btn-warning">Login</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">
                        Login As Teacher
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Login As Teacher</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="login_cek.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <center><img src="image/profil.png" style="width:30%; padding-bottom:30px;"></center>
                                            <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_guru" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="guru" class="btn btn-warning">Login</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </tr>
            <tr>
                <td class="img"><img src="image/hm-2.png" alt=""></td>
                <td>can access anywhere</td>
            </tr>
            <tr>
                <td>Deep focus and comfortable to study</td>
                <td class="img"><img src="image/hm-3.png" alt=""></td>
            </tr>
            <tr>
                <td class="img"><img src="image/hm-4.png" alt=""></td>
                <td>Connected with your class</td>
            </tr>
            <tr>
                <td>Get test, quiz, and online practice</td>
                <td class="img"><img src="image/hm-5.png" alt=""></td>
            </tr>
            <tr>
                <td class="img"><img src="image/hm-6.png" alt=""></td>
                <td>easy to share</td>
            </tr>
        </table>
    </div>
    <footer>
        <p>copyright &copy; 2020 good sans</p>
    </footer>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>