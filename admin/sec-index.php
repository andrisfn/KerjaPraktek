<?php include '../teamplate/header.php';
include '../koneksi.php'; ?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <i class="fas fa-user-shield mr-3"></i> Data Security
            </li>
        </ol>
    </nav>
    <hr class="bg-secondary">
    <div class="tambah">
        <div class="float-right">
            <a href="sec-tambah.php">
                <button type="button" class="btn btn-primary ">
                    <i class="fas fa-plus-circle mr-3"></i>Tambah Data</button>
            </a>
        </div>
    </div>
    <div class="bas"><br></div>
    <div class="alert mt-3">
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
        ?>
    </div>
    <div class="tabel mt-2">
        <?php
        $no = 1;
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
                    header("location: sec-index.php?pesan=berhasilHapus");
                } else {
                    header("location: sec-index.php?pesan=gagalHapus");
                }
            }
        }
        ?>

        <div class="tabel">
            <table class="table table-striped table-hover mt-2" id="tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>No Telepon</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $karyawan = mysqli_query($koneksi, "SELECT * from tbkaryawan");
                    while ($row = mysqli_fetch_array($karyawan)) {
                        echo '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row['nik'] . '</td>
                <td><a href="sec-profile.php?nik=' . $row['nik'] . '">' . $row['nama'] . '</a></td>
                <td>' . $row['jenis_kelamin'] . '</td>
                <td>' . $row['tanggal_lahir'] . '</td>
                <td>' . $row['no_telepon'] . '</td>';
                        echo '
                <td>
					<a href="sec-edit.php?nik=' . $row['nik'] . '" title="Edit Data" data-toggle="tooltip" class="btn btn-info btn-sm"><span aria-hidden="true"><i class="fas fa-user-edit"></i></span></a>
                    <a href="sec-index.php?aksi=delete&nik=' . $row['nik'] . '"
                    title="Hapus Data" data-toggle="tooltip" data-placement="bottom"
                    onclick="return confirm (\'Anda yakin akan menghapus data ' . $row['nama'] . '?\')"
                    class="btn btn-danger btn-sm">
                    <span aria-hidden="true"><i class="fas fa-trash"></i></span></a>
				</td>
			</tr>
            ';
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr class="bg-secondary">
    </div>

    <?php include '../teamplate/footer.php'; ?>