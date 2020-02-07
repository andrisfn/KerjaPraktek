<?php include '../teamplate/header.php';
include '../koneksi.php'; ?>

<div class="content">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <i class="fas fa-user-shield mr-3"></i>
                <a href="sec-index.php"> Data Security</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <hr class="bg-secondary">


    <?php
    $nik = $_GET['nik'];
    $profile = mysqli_query($koneksi, "SELECT * FROM `tbkaryawan` LEFT JOIN `tbpelatihan` ON `tbpelatihan`.`nik` = `tbkaryawan`.`nik` LEFT JOIN `tbpendidikan` ON `tbpendidikan`.`nik` = `tbkaryawan`.`nik` LEFT JOIN `tbpenempatan` ON `tbpenempatan`.`nik` = `tbkaryawan`.`nik` WHERE `tbkaryawan`.`nik`=$nik");
    while ($row = mysqli_fetch_array($profile)) {
    ?>

        <div class="row justify-content-around my-3">
            <div class="col ml-5">
                <h3><b>Biodata Security</b></h3>
            </div>
            <div class="col float-right">
                <div class="float-right">
                    <button type="button" onclick="javascript:history.back()" class="btn btn-secondary btn-sm">
                        <i class="fas fa-chevron-circle-left mr-3"></i>Kembali
                    </button>
                    <a href="sec-edit.php?nik=<?php echo $nik; ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-user-edit mr-3"></i>Edit Data
                    </a>
                    <a href="sec-index.php?aksi=<?php echo 'delete&nik=' . $row['nik'] . '" onclick="return confirm (\'Anda yakin akan menghapus data ' . $row['nama'] . '?\')'; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash mr-3"></i>Hapus Data
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row" width="200px"> NIK</th>
                    <td>: <?php echo $row['nik'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Nama</th>
                    <td>: <?php echo $row['nama'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Jenis Kelamin</th>
                    <td>: <?php echo $row['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Tempat Lahir</th>
                    <td>: <?php echo $row['tempat_lahir'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Tanggal Lahir</th>
                    <td>: <?php echo $row['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Alamat</th>
                    <td>: <?php echo $row['alamat'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> No. Telepon</th>
                    <td>: <?php echo $row['no_telepon'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="my-4 ml-5">
            <h3><b>Riwayat Pendidikan</b></h3>
        </div>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row" width="200px"> Jenjang</th>
                    <td>: <?php echo $row['jenjang'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Nama Sekolah</th>
                    <td>: <?php echo $row['sekolah'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Tahun Masuk</th>
                    <td>: <?php echo $row['masuk'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Tahun Lulus</th>
                    <td>: <?php echo $row['keluar'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> No. Ijazah</th>
                    <td>: <?php echo $row['ijazah'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="my-4 ml-5">
            <h3><b>Riwayat Pelatihan</b></h3>
        </div>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row" width="200px"> Nama Pelatihan</th>
                    <td>: <?php echo $row['nmpelatihan'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Jenis Pelatihan</th>
                    <td>: <?php echo $row['jnspelatihan'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Penyelenggara</th>
                    <td>: <?php echo $row['penyelenggara'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Tahun Lulus</th>
                    <td>: <?php echo $row['thn'] ?></td>
                </tr>
            </tbody>
        </table>
        <div class="my-4 ml-5">
            <h3><b>Penempatan</b></h3>
        </div>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="row" width="200px"> ID Perusahaan</th>
                    <td>: <?php echo $row['idperusahaan'] ?></td>
                </tr>
                <tr>
                    <th scope="row"> Tempat</th>
                    <td>: <?php echo $row['tempat'] ?></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
    <hr class="bg-secondary">
</div>

<?php include '../teamplate/footer.php'; ?>