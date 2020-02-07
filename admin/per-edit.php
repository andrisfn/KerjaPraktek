<?php
include_once '../koneksi.php';
include_once '../teamplate/header.php';

$idperusahaan = $_GET['idperusahaan'];
$edit = mysqli_query($koneksi, "SELECT * FROM tbperusahaan WHERE idperusahaan='$idperusahaan'");
$row = mysqli_fetch_assoc($edit);
if (isset($_POST['editPerusahaan'])) {
    $idperusahaan = $_POST['idperusahaan'];
    $nmperusahaan = $_POST['nmperusahaan'];
    $alamatperusahaan = $_POST['alamatperusahaan'];
    $kodetlp = $_POST['kodetlp'];
    $tlpperusahaan = $_POST['tlpperusahaan'];
    $fax = $_POST['fax'];

    $update = mysqli_query($koneksi, "UPDATE tbperusahaan SET idperusahaan='$idperusahaan', nmperusahaan='$nmperusahaan', alamatperusahaan='$alamatperusahaan',kodetlp='$kodetlp', tlpperusahaan='$tlpperusahaan', fax='$fax' WHERE idperusahaan='$idperusahaan'") or die(mysqli_connect_error());
    if ($update) {
        header("location: per-index.php?pesan=berhasilUbah");
    } else {
        header("location: per-index.php?pesan=gagalUbah");
    }
}
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <i class="fas fa-user-shield mr-3"></i>
                <a href="per-index.php"> Data Perusahaan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Perusahaan</li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <div class="row justify-content-md-center">
        <div class="col col-md-5">
            <div class="text-center mb-3">
                <h3>Form Edit Data Perusahaan</h3>
            </div>
            <form action="per-edit.php" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""> ID Perusahaan :</label>
                            <input type="text" class="form-control" name="idperusahaan" value="<?php echo $row['idperusahaan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Nama Perusahaan :</label>
                            <input type="text" class="form-control" name="nmperusahaan" value="<?php echo $row['nmperusahaan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for=""> Alamat Perusahaan :</label>
                            <input type="text" class="form-control" name="alamatperusahaan" value="<?php echo $row['alamatperusahaan']; ?>" rows="3">
                        </div>
                        <div class="form-group">
                            <label for=""> No. Tlp :</label>
                            <div class="row">
                                <div class="col col-3">
                                    <input type="text" class="form-control" name="kodetlp" value="<?= $row['kodetlp']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tlpperusahaan" value="<?= $row['tlpperusahaan']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                            </div>
                            <!-- <input type="text" class="form-control" name="tlpperusahaan" value="<?php echo $row['tlpperusahaan']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required> -->
                        </div>
                        <div class="form-group">
                            <label for=""> Fax :</label>
                            <div class="row">
                                <div class="col col-3">
                                    <input type="text" class="form-control" name="kodetlp" value="<?= $row['kodetlp']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="fax" value="<?= $row['fax']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                                </div>
                            </div>
                            <!-- <input type="text" class="form-control" name="fax" value="<?php echo $row['fax']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required> -->
                        </div>
                        <div class="float-right">
                            <button type="button" onclick="javascript:history.back()" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" title="Batal">Batal</button>
                            <input type="submit" name="editPerusahaan" class="btn btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Perushaan">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../teamplate/footer.php'; ?>