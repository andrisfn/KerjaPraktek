<?php include '../teamplate/head-user.php';
include '../koneksi.php'; ?>

<div class="content">

    <?php
    if (isset($_POST['add'])) {
        $nik            = $_POST['nik'];
        $nama            = $_POST['nama'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $tempat_lahir    = $_POST['tempat_lahir'];
        $tanggal_lahir    = $_POST['tanggal_lahir'];
        $alamat            = $_POST['alamat'];
        $no_telepon        = $_POST['no_telepon'];

        $jenjang        = $_POST['jenjang'];
        $sekolah        = $_POST['sekolah'];
        $masuk             = $_POST['masuk'];
        $keluar            = $_POST['keluar'];
        $ijazah         = $_POST['ijazah'];

        $nmpelatihan    = $_POST['nmpelatihan'];
        $jnspelatihan   = $_POST['jnspelatihan'];
        $penyelenggara  = $_POST['penyelenggara'];
        $thn            = $_POST['thn'];

        $idperusahaan   = $_POST['idperusahaan'];
        $tempat         = $_POST['tempat'];

        $cek = mysqli_query($koneksi, "SELECT * FROM tbkaryawan WHERE nik='$nik'");
        if (!$cek || mysqli_num_rows($cek) == 0) {
            $insert = mysqli_query($koneksi, "INSERT INTO tbkaryawan(nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telepon ) VALUES('$nik','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telepon')") or die(mysqli_connect_error()());
            $insert = mysqli_query($koneksi, "INSERT INTO tbpendidikan(nik, jenjang, sekolah, masuk, keluar, ijazah ) VALUES('$nik','$jenjang', '$sekolah', '$masuk', '$keluar', '$ijazah')") or die(mysqli_connect_error()());
            $insert = mysqli_query($koneksi, "INSERT INTO tbpelatihan(nik, nmpelatihan, jnspelatihan, penyelenggara, thn ) VALUES('$nik', '$nmpelatihan','$jnspelatihan', '$penyelenggara', '$thn')") or die(mysqli_connect_error()());
            $insert = mysqli_query($koneksi, "INSERT INTO tbpenempatan(nik, idperusahaan, tempat ) VALUES('$nik', '$idperusahaan','$tempat')") or die(mysqli_connect_error()());
            if ($insert) {
                header("location: sec-index.php?pesan=berhasilTambah");
            } else {
                header("location: sex-index.php?pesan=gagalTambah");
                exit;
            }
        } else {
            header("location: sec-index.php?pesan=sudahAda");
        }
    }

    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <i class="fas fa-user-shield mr-3"></i>
                <a href="sec-index.php"> Data Security</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Security</li>
        </ol>
    </nav>
    <hr class="bg-secondary">

    <h3>BIODATA DIRI</h3>
    <hr class="bg-secondary">
    <form method="post" class="mt-4">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nik" placeholder="NIK" maxlength="20" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-3">
                <select name="jenis_kelamin" class="form-control" required>
                    <option value=""> Jenis Kelamin </option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-3 ">
                <input type="date" name="tanggal_lahir" id="datepicker" class="input-group form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Telp</label>
            <div class="col-sm-3">
                <input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" maxlength="13" onkeypress="return hanyaAngka(event)" required>
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
                <select name="jenjang" class="form-control" require>
                    <option value=""> Pendidikan Terakhir </option>
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
                <input class="form-control" name="sekolah" placeholder="Nama Sekolah" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Masuk</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="masuk" placeholder="Tahun Masuk" min="1980" onkeypress="return hanyaAngka(event)" maxlength="4" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Lulus</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="keluar" placeholder="Tahun Lulus" min="1980" maxlength="4" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Ijazah</label>
            <div class="col-sm-3">
                <input class="form-control" name="ijazah" placeholder="No. Ijazah" maxlength="15" required>
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
                <input type="text" class="form-control" name="nmpelatihan" placeholder="Nama Pelatihan" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Pelatihan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="jnspelatihan" placeholder="Jenis Pelatihan" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Penyelenggara</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun Pelatihan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="thn" placeholder="Tahun Pelatihan" onkeypress="return hanyaAngka(event)" required>
            </div>
        </div>

        <div class="pelatihan pt-5">
            <h3>PENEMPATAN</h3>
            <hr class="bg-secondary">
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Id Perusahaan</label>
            <div class="col-sm-3">
                <!-- <input type="text" class="form-control" name="idperusahaan" placeholder="Nama Pelatihan" required> -->
                <select name="idperusahaan" class="form-control" require>
                    <option value=""> ID Perusahaan </option>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbperusahaan");
                    while ($row = mysqli_fetch_array($sql)) {
                        echo "<option value='" . $row['idperusahaan'] . "'>" . $row['idperusahaan'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class=" form-group row">
            <label class="col-sm-2 col-form-label">Tempat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tempat" placeholder="Tempat Penempatan" required>
            </div>
        </div>
        <div class="float-right">
            <button type="submit" name="add" class="btn btn-primary">
                <i class="fas fa-save mr-3"></i>Simpan
            </button>
            <button type="button" onclick="javascript:history.back()" class="btn btn-secondary">
                <i class="fas fa-chevron-circle-left mr-3"></i>Kembali
            </button>
        </div>
    </form>
</div>

<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    };
</script>

<?php include '../teamplate/footer.php'; ?>