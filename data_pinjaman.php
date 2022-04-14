<?php
include "header.php";
$user_id = user()->id;
if (user()->role == 'Admin') {
    $buku = mysqli_query($conn, "SELECT anggota.*, users.nama FROM `anggota` INNER JOIN users ON users.id = anggota.user_id");
} else if (user()->role == 'Anggota') {
    $buku = mysqli_query($conn, "SELECT anggota.*, users.nama FROM `anggota` INNER JOIN users ON users.id = anggota.user_id WHERE `user_id` = '$user_id'");
}

if (user()->role == 'Admin') {
    if (isset($_GET['selesay'])) {
        $selesay = $_GET['selesay'];
        mysqli_query($conn, "UPDATE `anggota` SET `status`='2' WHERE `id` = '$selesay'");
        echo "<script>
        alert('Berhasil mengubah status pinjaman');
        window.location.href = 'data_pinjaman.php';
        </script>";
    }
}

?>
<!-- Page content-->
<div class="container-fluid mb-5">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Data Peminjaman Buku</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">NIM Peminjam</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <?php if (user()->role == 'Admin') { ?>
                                    <th scope="col"><i class="bi bi-gear"></i></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($buku as $b) :
                            ?>
                                <tr class="<?= date('Y-m-d') > $b['tanggal_kembali'] && $b['status'] == 1 ? 'table-danger' : (date('Y-m-d') <= $b['tanggal_kembali'] && $b['status'] == 1 ? 'table-warning' : 'table-success'); ?>">
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $b['status'] == 1 ? 'Belum dikembalikan' : 'Sudah dikembalikan'; ?></td>
                                    <td><?= $b['nama']; ?></td>
                                    <td><?= $b['user_id']; ?></td>
                                    <td><?= $b['nama_buku']; ?></td>
                                    <td><?= $b['tanggal_pinjam']; ?></td>
                                    <td><?= $b['tanggal_kembali']; ?></td>
                                    <?php if (user()->role == 'Admin') { ?>
                                        <td>
                                            <?php if ($b['status'] == 1) { ?>
                                                <a href="?selesay=<?= $b['id']; ?>" onclick="return confirm('Pastikan buku sudah dikembalikan sebelum menekan tombol selesay!')" class="btn btn-primary btn-sm"><i class="bi bi-check"></i></a>
                                            <?php } ?>
                                            <!-- <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button> -->
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>