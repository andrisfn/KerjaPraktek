<?php include '../koneksi.php';
include '../teamplate/header.php';
?>

<div class="content">
    <?php
    if (isset($_POST['tambahPerusahaan'])) {
        $idperusahaan = $_POST['idperusahaan'];
        $nmperusahaan = $_POST['nmperusahaan'];
        $alamatperusahaan = $_POST['alamatperusahaan'];
        $kodetlp = $_POST['kodetlp'];
        $tlpperusahaan = $_POST['tlpperusahaan'];
        $fax = $_POST['fax'];

        $cek = mysqli_query($koneksi, "SELECT * FROM tbperusahaan WHERE idperusahaan='$idperusahaan'");
        if (mysqli_num_rows($cek) == 0) {
            $insert = mysqli_query($koneksi, "INSERT INTO tbperusahaan (idperusahaan, nmperusahaan, alamatperusahaan, kodetlp, tlpperusahaan, fax) VALUES ('$idperusahaan','$nmperusahaan','$alamatperusahaan','$kodetlp','$tlpperusahaan','$fax')") or die(mysqli_connect_error()());
            if ($insert) {
                header("location: per-index.php?pesan=berhasilTambah");
            } else {
                header("location: per-index.php?pesan=gagalTambah");
            }
        } else {
            header("location: per-index.php?pesan=sudahAda");
        }
    }
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <i class="fas fa-user-shield mr-3"></i>
                <a href="per-index.php"> Data Perusahaan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Perusahaan</li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <div class="row justify-content-md-center">
        <div class="col col-md-5">
            <div class="text-center mb-3">
                <h3>Form Tambah Data Perusahaan</h3>
            </div>
            <form action="per-tambah.php" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""> ID Perusahaan :</label>
                            <input type="text" class="form-control" name="idperusahaan" placeholder="123" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Nama Perusahaan :</label>
                            <input type="text" class="form-control" name="nmperusahaan" placeholder="PT. Angin Ribut Barokah" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Alamat Perusahaan :</label>
                            <input type="text" class="form-control" name="alamatperusahaan" placeholder="Jln. Situmorang No.27 Kenagan Mantan" rows="3">
                        </div>
                        <div class="form-group">
                            <label for=""> No. Tlp :</label>
                            <div class="row">
                                <div class="col col-3">
                                    <input type="text" class="form-control" name="kodetlp" placeholder="021" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tlpperusahaan" placeholder="8967xxxx" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                            </div>
                            <!-- <input type="text" class="form-control col-3" name="tlpperusahaan" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                            <input type="text" class="form-control" name="tlpperusahaan" maxlength="13" onkeypress="return hanyaAngka(event)" required> -->

                        </div>
                        <div class="form-group">
                            <label for=""> Fax :</label>
                            <!-- <input type="text" class="form-control" name="fax" placeholder="" maxlength="13" onkeypress="return hanyaAngka(event)" required> -->
                            <div class="row">
                                <div class="col col-3">
                                    <input type="text" class="form-control" name="kodetlp" placeholder="021" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="fax" placeholder="889675xxxx" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="bg-secondary"> -->
                        <div class="float-right">
                            <button type="button" onclick="javascript:history.back()" class="btn btn-secondary">Batal</button>
                            <input type="submit" name="tambahPerusahaan" class="btn btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Perushaan">
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<?php include '../teamplate/footer.php'; ?>