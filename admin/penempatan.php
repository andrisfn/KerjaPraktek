<?php include '../koneksi.php';
include '../teamplate/header.php';
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <i class="fas fa-warehouse mr-3"></i> Data Penempatan
            </li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <table class="table table-striped table-hover" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Id Perusahaan</th>
                <th>Tempat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $penempatan = mysqli_query($koneksi, "SELECT `tbkaryawan`.`nik`, `tbkaryawan`.`nama`, `tbpenempatan`.`nik`, `tbpenempatan`.`idperusahaan`, `tbpenempatan`.`tempat`
            FROM `tbkaryawan` 
                LEFT JOIN `tbpenempatan` ON `tbpenempatan`.`nik` = `tbkaryawan`.`nik`;");
            while ($row = mysqli_fetch_array($penempatan)) {
                echo '
                <tr>
                    <td>' . $no . '</td>
                    <td><a href="sec-profile.php?nik=' . $row['nik'] . '">' . $row['nik'] . '</a></td>
                    <td>' . $row['nama'] . '</td>
                    <td><a href="per-profile.php?idperusahaan=' . $row['idperusahaan'] . '">' . $row['idperusahaan'] . '</a></td>
                    <td>' . $row['tempat'] . '</td>
                </tr>
                ';
                $no++;
            }
            ?>
        </tbody>


    </table>
    <hr class="bg-secondary">
</div>
<?php include '../teamplate/footer.php'; ?>