<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Gada Elang Sakti | Login</title>

    <link rel="stylesheet" href="vendor/bootstrap4/css/bootstrap.min.css">

    <script src="vendor/jquery-3.4.1.min.js"></script>
    <script src="vendor/popper.min.js"></script>
    <script src="vendor/bootstrap4/js/bootstrap.min.js"></script>

</head>

<body class="bg-info">
    <div class="text-center p-5 text-white">
        <h1><b>PT. GADA ELANG SAKTI</b></h1>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">

            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo '<div class="alert alert-danger alert-dismissable">
                    Username dan Password yang anda masukan salah !
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>';
                } else if ($_GET['pesan'] == "logout") {
                    echo '<div class="alert alert-success alert-dismissable">
                    Anda telah berhasil logout !
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>';
                } else if ($_GET['pesan'] == "belum_login") {
                    echo ' <div class="alert alert-warning alert-dismissable">
                    Anda harus login terlebih dahulu untuk dapat mengakses halaman !
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>';
                }
            }
            ?>
            <div class="card">
                <div class="card-body">
                    <form action="ceklogin.php" method="post" onSubmit="return validasi()">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function validasi() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username != "" && password != "") {
                return true;
            }
        }
    </script>

</body>

</html>