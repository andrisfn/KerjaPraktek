<?php include '../koneksi.php';
include '../teamplate/header.php';
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <i class="fas fa-user-cog mr-3"></i> Data Pelatihan
            </li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <table class="table table-striped table-hover" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama Pelatihan</th>
                <th>Jenis Pelatihan</th>
                <th>Penyelenggara</th>
                <th>Tahun Pelatihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $pelatihan = mysqli_query($koneksi, "SELECT * from tbpelatihan");
            while ($row = mysqli_fetch_array($pelatihan)) {
                echo '
            <tr>
                <td>' . $no . '</td>
                <td><a href="sec-profile.php?nik=' . $row['nik'] . '">' . $row['nik'] . '</a></td>
                <td>' . $row['nmpelatihan'] . '</td>
                <td>' . $row['jnspelatihan'] . '</td>
                <td>' . $row['penyelenggara'] . '</td>
                <td>' . $row['thn'] . '</td>';

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
    <hr class="bg-secondary">
</div>
<?php include '../teamplate/footer.php'; ?>