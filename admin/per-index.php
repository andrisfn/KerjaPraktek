<?php include '../koneksi.php';
include '../teamplate/header.php';
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <i class="fas fa-building mr-3"></i> Data Perusahaan
            </li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <div class="row mb-3">
        <div class="col">
            <div class="float-right">
                <a href="per-tambah.php">
                    <button type=" button" class="btn btn-primary ">
                        <i class="fas fa-plus-circle mr-3"></i>Tambah Data</button>
                </a>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'berhasilTambah') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda <strong>Berhasil</strong> Menambahkan Data.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } else if ($_GET['pesan'] == 'gagalTambah') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda <strong>Gagal</strong> Menambahkan Data.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } elseif ($_GET['pesan'] == 'berhasilHapus') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda <strong>Berhasil</strong> Menghapus Data.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } elseif ($_GET['pesan'] == 'gagalHapus') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda <strong>Gagal</strong> Menghapus Data.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } elseif ($_GET['pesan'] == 'berhasilUbah') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda <strong>Berhasil</strong> Mengubah Data.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } elseif ($_GET['pesan'] == 'gagalUbah') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda <strong>Gagal</strong> Mengubah Data.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } elseif ($_GET['pesan'] == 'sudahAda') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Id Perusahaan Sudah Digunakan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
    }
    if (isset($_GET['aksi']) == 'delete') {
        $idperusahaan = $_GET['idperusahaan'];
        $delete = mysqli_query($koneksi, "DELETE FROM tbperusahaan WHERE idperusahaan='$idperusahaan'");
        if ($delete) {
            header("location: per-index.php?pesan=berhasilHapus");
        } else {
            header("location: per-index.php?pesan=gagalHapus");
        }
    }

    ?>
    <?php $perusahaan = mysqli_query($koneksi, "SELECT * FROM tbperusahaan");
    while ($row = mysqli_fetch_array($perusahaan)) {
    ?>
        <table class="table table-striped table-bordered">
            <tr>
                <td width='200px' ;>ID Perusahaan</td>
                <td>
                    <a href="per-profile.php?idperusahaan=<?= $row['idperusahaan']; ?>">
                        <?= $row['idperusahaan']; ?></a>
                </td>
            </tr>
            <tr>
                <td>Nama Perusahaan</td>
                <td><?= $row['nmperusahaan']; ?></td>
            </tr>
            <tr>
                <td>Alamat Perusahaan</td>
                <td><?= $row['alamatperusahaan']; ?></td>
            </tr>
            <tr>
                <td>Tlp. Perusahaan</td>
                <td>(<?= $row['kodetlp'] ?>) <?= $row['tlpperusahaan']; ?> </td>
            </tr>
            <tr>
                <td>Fax</td>
                <td>(<?= $row['kodetlp'] ?>) <?= $row['fax']; ?></td>
            </tr>
        </table>
        <div class="float-right mb-4">
            <a href="per-edit.php?idperusahaan=<?= $row['idperusahaan']; ?>" class="btn btn-info btn-sm ">
                <i class="fas fa-user-edit mr-3"></i>Edit Data
            </a>
            <a href="per-index.php?aksi=delete&idperusahaan=<?= $row['idperusahaan']; ?>" onclick="return confirm ('Anda yakin akan menghapus data <?= $row['nmperusahaan'] ?>')" class="btn btn-danger btn-sm">
                <i class="fas fa-trash mr-3"></i>Hapus Data
            </a>
        </div>
    <?php  } ?>
    <!-- READ DATA -->
    <!-- <table class="table table-sm table-striped">
        <?php
        $perusahaan = mysqli_query($koneksi, "SELECT * FROM tbperusahaan");
        while ($row = mysqli_fetch_array($perusahaan)) {
            echo '
                <table class="table table-sm table-striped">
                    <tr>
                        <td class="col-sm-2"><b>ID Perusahaan</b> </td>
                        <td>: <a href="per-profile.php?idperusahaan=' . $row['idperusahaan'] . '">' . $row['idperusahaan'] . '</a></td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><b>Nama Perusahaan</b> </td>
                        <td>: ' . $row['nmperusahaan'] . '</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><b>Alamat Perusahaan</b> </td>
                        <td>: ' . $row['alamatperusahaan'] . '</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><b>Telpon Perusahaan</b> </td>
                        <td>: ' . $row['tlpperusahaan'] . '</td>
                    </tr>
                    <tr>
                        <td class="col-sm-2"><b>Fax</b> </td>
                        <td>: ' . $row['fax'] . '</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="float-right">
                            <a href="per-edit.php?idperusahaan=' . $row['idperusahaan'] . '" class="btn btn-info btn-sm "> 
                                <i class="fas fa-user-edit mr-3"></i>Edit Data
                            </a>
                            <a href="per-index.php?aksi=delete&idperusahaan=' . $row['idperusahaan'] . '"
                            onclick="return confirm (\'Anda yakin akan menghapus data ' . $row['nmperusahaan'] . '?\')"
                            class="btn btn-danger btn-sm"> 
                                <i class="fas fa-trash mr-3"></i>Hapus Data
                            </a>
                        </td>
                    </tr>
                    <hr class="bg-secondary">
                </table>
                ';
        }
        ?>
    </table> -->

</div>

<?php include '../teamplate/footer.php'; ?>