<?php include '../koneksi.php';
include '../teamplate/head-user.php';
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
    <?php  } ?>

</div>

<?php include '../teamplate/footer.php'; ?>