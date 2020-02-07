<?php
include '../koneksi.php';
include '../teamplate/header.php';
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <i class="fas fa-building mr-3"></i>
                <a href="per-index.php"> Data Perusahaan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <hr class="bg-secondary">
    <table class=" table table-striped table-hover" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Perusahaan</th>
                <th>Nik</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $idperusahaan = $_GET['idperusahaan'];
            $penempatan = mysqli_query($koneksi, "SELECT `tbkaryawan`.`nik`, `tbkaryawan`.`nama`, `tbpenempatan`.`idperusahaan` FROM `tbkaryawan` LEFT JOIN `tbpenempatan` ON `tbpenempatan`.`nik` = `tbkaryawan`.`nik` WHERE idperusahaan='$idperusahaan'");
            while ($row = mysqli_fetch_array($penempatan)) {
                echo '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row['idperusahaan'] . '</td>
                <td>' . $row['nik'] . '</td>
                <td>' . $row['nama'] . '</td>';

                //     echo '
                //     <td>
                // 		<a href="sec-edit.php?nik='.$row['nik'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-info btn-sm"><span aria-hidden="true"><i class="fas fa-user-edit"></i></span></a>
                //         <a href="index.php?aksi=delete&nik='.$row['nik'].'"
                //         title="Hapus Data" data-toggle="tooltip" data-placement="bottom"
                //         onclick="return confirm (\'Anda yakin akan menghapus data '.$row['nama'].'?\')"
                //         class="btn btn-danger btn-sm">
                //         <span aria-hidden="true"><i class="fas fa-trash"></i></span></a>
                // 	</td>
                // </tr>
                // ';
                $no++;
            }
            ?>
        </tbody>

    </table>
</div>

<?php include '../teamplate/footer.php'; ?>