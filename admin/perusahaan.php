<?php require_once '../koneksi.php';
if (isset($_POST['tambahperusahaan'])) {
    $idperusahaan   = $_POST['idperusahaan'];
    $nmperusahaan   = $_POST['nmperusahaan'];
    $alamatperusahaan = $_POST['alamatperusahaan'];
    $tlpperusahaan  = $_POST['tlpperusahaan'];
    $fax            = $_POST['fax'];

    $cek = mysqli_query($koneksi, "SELECT * FROM tbperusahaan WHERE idperusahaan='$idperusahaan'");
    if (!$cek || mysqli_num_rows($cek) == 0) {
        $insert = mysqli_query($koneksi, "INSERT INTO tbperusahaan (idperusahaan, nmperusahaan, alamatperusahaan, tlpperusahaan, fax) VALUE ('$idperusahaan', '$nmperusahaan', '$alamatperusahaan', '$tlpperusahaan', '$fax')") or die(mysqli_connect_error()());
        if ($insert) {
            echo '<div class="alert alert-primary alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data berhasil ditambahkan.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data gagal ditambahkan.</div>';
        }
    }
}
if (isset($_GET['aksi']) == 'delete') {
    $idperusahaan = $_GET['idperusahaan'];
    $delete = mysqli_query($koneksi, "DELETE FROM tbperusahaan WHERE idperusahaan='$idperusahaan'");
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
$sql = mysqli_query($koneksi, "SELECT * FROM tbperusahaan");
while ($row = mysqli_fetch_array($sql));
