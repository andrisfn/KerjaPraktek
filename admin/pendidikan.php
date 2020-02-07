<?php
include '../teamplate/header.php';
include '../koneksi.php'
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <i class="fas fa-graduation-cap mr-3"></i> Data Pendidikan
            </li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <table class="table table-striped table-hover" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Jenjang</th>
                <th>Nama Sekolah</th>
                <th>Tahun Masuk</th>
                <th>Tahun Keluar</th>
                <th>No. Ijazah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $pendidikan = mysqli_query($koneksi, "SELECT * from tbpendidikan");
            while ($row = mysqli_fetch_array($pendidikan)) {
                echo '
            <tr>
                <td>' . $no . '</td>
                <td><a href="sec-profile.php?nik=' . $row['nik'] . '">' . $row['nik'] . '</a></td>
                <td>' . $row['jenjang'] . '</td>
                <td>' . $row['sekolah'] . '</td>
                <td>' . $row['masuk'] . '</td>
                <td>' . $row['keluar'] . '</td>
                <td>' . $row['ijazah'] . '</td>';
                $no++;
            }
            ?>
        </tbody>

    </table>
    <hr class="bg-secondary">
</div>

<?php include '../teamplate/footer.php'; ?>