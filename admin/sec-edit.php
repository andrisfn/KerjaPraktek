<?php include '../teamplate/header.php';
include '../koneksi.php'; ?>

<div class="content">
    <?php

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
            header("location: sec-index.php?pesan=berhasilUbah");
        } else {
            header("location: sec-index.php?pesan=berhasilUbah");
        }
    }

    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <i class="fas fa-user-shield mr-3"></i>
                <a href="sec-index.php">Data Security</a>
            </li>
            <li class="breadcrumb-item"><?php echo '<a href="sec-profile.php?nik=' . $row['nik'] . '">Profile</a>'; ?></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Biodata</li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <!-- BIODATA -->
    <h3>BIODATA DIRI</h3>
    <hr class="bg-secondary">
    <form method="post" action="" class="mt-4">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nik" value="<?php echo $nik; ?>" maxlength="10" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-3">
                <select name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" class="form-control" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" name="tempat_lahir" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-2 ">
                <input type="date" name="tanggal_lahir" class="input-group form-control" value="<?php echo $row['tanggal_lahir']; ?>" min="1970-01-01" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input class="form-control" name="alamat" rows="3" value="<?php echo $row['alamat']; ?>" required></input>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Telp</label>
            <div class="col-sm-3">
                <input type="text" name="no_telepon" class="form-control" value="<?php echo $row['no_telepon']; ?>" maxlength="13" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>

        <!-- PENDIDIKAN -->
        <div class="pendidikan pt-5">
            <h3>RIWAYAT PENDIDIKAN</h3>
            <hr class="bg-secondary">
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
            <div class="col-sm-3">
                <select name="jenjang" value="<?php echo $row['jenjang']; ?>" class="form-control" require>
                    <option value="SD">SD </option>
                    <option value="SMP">SMP</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="DIPLOMA (D3)"> DIPLOMA (D3)</option>
                    <option value="Sarjana (S1)">SARJANA (S1)</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Sekolah</label>
            <div class="col-sm-10">
                <input class="form-control" name="sekolah" value="<?php echo $row['sekolah']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Masuk</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="masuk" value="<?php echo $row['masuk']; ?>" min="1980" onkeypress="return hanyaAngka(event)" maxlength="4" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Lulus</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="keluar" value="<?php echo $row['keluar']; ?>" min="1980" maxlength="4" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Ijazah</label>
            <div class="col-sm-3">
                <input class="form-control" name="ijazah" value="<?php echo $row['ijazah']; ?>" maxlength="15" required>
            </div>
        </div>

        <!-- PELATIHAN -->
        <div class="pelatihan pt-5">
            <h3>RIWAYAT PELATIHAN</h3>
            <hr class="bg-secondary">
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Pelatihan</label>
            <div class="col-sm-10">
                <input class="form-control" name="nmpelatihan" value="<?php echo $row['nmpelatihan']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Pelatihan</label>
            <div class="col-sm-10">
                <input class="form-control" name="jnspelatihan" value="<?php echo $row['jnspelatihan']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Penyelenggara</label>
            <div class="col-sm-10">
                <input class="form-control" name="penyelenggara" value="<?php echo $row['penyelenggara']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Pelatihan</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" name="thn" value="<?php echo $row['thn']; ?>" maxlength="4" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>


        <!-- PENEMPATAN -->
        <div class="pelatihan pt-5">
            <h3>RIWAYAT PENEMPATAN</h3>
            <hr class="bg-secondary">
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tempat</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="tempat" value="<?php echo $row['tempat']; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Id Perusahaan</label>
            <div class="col-sm-3">
                <!-- <input type="number" class="form-control" name="idperusahaan" value="<?php echo $row['idperusahaan']; ?>" required> -->
                <select name="idperusahaan" class="form-control" require>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbperusahaan");
                    while ($row = mysqli_fetch_array($sql)) {
                        echo "<option value='" . $row['idperusahaan'] . "'>" . $row['idperusahaan'] . "</option>";
                    }
                    ?>
                    <!-- <option value="<?php echo $row['$idperusahaan'] ?>"><?php echo $row['$idperusahaan'] ?></option> -->

                </select>
            </div>
        </div>


        <div class="float-right">
            <button type="submit" name="saveedit" class="btn btn-primary">
                <i class="fas fa-save mr-3"></i>Simpan
            </button>
            <button type="button" onclick="javascript:history.back()" class="btn btn-secondary">
                <i class="fas fa-chevron-circle-left mr-3"></i>Kembali
            </button>
        </div>
    </form>
</div>

<?php include '../teamplate/footer.php'; ?>