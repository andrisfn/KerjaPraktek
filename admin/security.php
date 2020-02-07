<!-- <?php
include '../teamplate/header.php';
include '../teamplate/footer.php';
include '../koneksi.php';

if (isset($_GET['aksi']) == 'delete') {
    $nik = $_GET['nik'];
    $cek = mysqli_query($koneksi, "SELECT * FROM tbkaryawan WHERE nik='$nik'");
    if (!$cek || mysqli_num_rows($cek) == 0) {
        echo '<div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data tidak ditemukan.</div>';
    } else {
        $delete = mysqli_query($koneksi, "DELETE FROM tbkaryawan WHERE nik='$nik'");
        $delete = mysqli_query($koneksi, "DELETE FROM tbpendidikan WHERE nik='$nik'");
        $delete = mysqli_query($koneksi, "DELETE FROM tbpelatihan WHERE nik='$nik'");
        if ($delete) {
            echo '<div class="alert alert-primary alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data berhasil dihapus.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data gagal dihapus.</div>';
        }
    }
}

if (isset($_GET['pesanUbah'])) {
    if ($_GET['pesanUbah'] == "gagal") {
        echo '<div class="alert alert-danger alert-dismissable">
        Anda gagal mengubah data !
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>';
    } else if ($_GET['pesanUbah'] == "berhasil") {
        echo '<div class="alert alert-success alert-dismissable">
        Anda berhasil mengubah data !
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>';
    }
}

if (isset($_GET['pesanHapus'])) {
    if ($_GET['pesanHapus'] == "gagal") {
        echo '<div class="alert alert-danger alert-dismissable">
        Anda gagal menghapus data !
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>';
    } else if ($_GET['pesanHapus'] == "berhasil") {
        echo '<div class="alert alert-success alert-dismissable">
        Anda berhasil menghapus data !
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>';
    }
}

$nik = $_GET['nik'];
$sql = mysqli_query($koneksi, "SELECT `tbkaryawan`.*, `tbpelatihan`.*, `tbpendidikan`.*, `tbpenempatan`.*
    FROM `tbkaryawan` 
        LEFT JOIN `tbpelatihan` ON `tbpelatihan`.`nik` = `tbkaryawan`.`nik` 
        LEFT JOIN `tbpendidikan` ON `tbpendidikan`.`nik` = `tbkaryawan`.`nik` 
        LEFT JOIN `tbpenempatan` ON `tbpenempatan`.`nik` = `tbkaryawan`.`nik` WHERE tbkaryawan.nik='$nik'");
$row = mysqli_fetch_assoc($sql);
if (isset($_POST['saveedit'])) {
    // BIODATA
    $nik            = $_POST['nik'];
    $nama           = $_POST['nama'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $alamat         = $_POST['alamat'];
    $no_telepon     = $_POST['no_telepon'];
    // PENDIDIKAN
    $jenjang        = $_POST['jenjang'];
    $sekolah        = $_POST['sekolah'];
    $masuk          = $_POST['masuk'];
    $keluar         = $_POST['keluar'];
    $ijazah         = $_POST['ijazah'];
    // PELATIHAN
    $nmpelatihan    = $_POST['nmpelatihan'];
    $jnspelatihan   = $_POST['jnspelatihan'];
    $penyelenggara  = $_POST['penyelenggara'];
    $thn            = $_POST['thn'];
    // PENEMPATAN
    $idperusahaan   = $_POST['idperusahaan'];
    $tempat         = $_POST['tempat'];

    $update = mysqli_query($koneksi, "UPDATE tbkaryawan SET nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telepon='$no_telepon'WHERE nik='$nik'") or die(mysqli_connect_error());
    $update = mysqli_query($koneksi, "UPDATE tbpendidikan SET jenjang='$jenjang', sekolah='$sekolah', masuk='$masuk', keluar='$keluar', ijazah='$ijazah' WHERE nik='$nik'") or die(mysqli_connect_error());
    $update = mysqli_query($koneksi, "UPDATE tbpelatihan SET nmpelatihan='$nmpelatihan', jnspelatihan='$jnspelatihan', penyelenggara='$penyelenggara', thn='$thn' WHERE nik='$nik'") or die(mysqli_connect_error());
    $update = mysqli_query($koneksi, "UPDATE tbpenempatan SET idperusahaan='$idperusahaan', tempat='$tempat' WHERE nik='$nik'") or die(mysqli_connect_error());

    if ($update) {
        // echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil diperbaharui !</div>';
        header("Location:security.php?pesanUbah=berhasil");
    } else {
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal diperbaharui !</div>';
    }
}

if (isset($_GET['pesanTambah'])) {
    if ($_GET['pesanTambah'] == "gagal") {
        echo '<div class="alert alert-danger alert-dismissable">
        Anda gagal menambah data !
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>';
    } else if ($_GET['pesanTambah'] == "berhasil") {
        echo '<div class="alert alert-success alert-dismissable">
        Anda berhasil manambah data !
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>';
    }
} -->
