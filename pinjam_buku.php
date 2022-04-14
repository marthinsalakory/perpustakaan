<?php
include "header.php";
if (user()->role != 'Anggota') {
    header('Location: index.php');
    exit;
}
if (isset($_POST['pinjam_buku'])) {
    $id = $_POST['id'];
    $user_id = user()->id;
    $nama_buku = $_POST['nama_buku'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $tanggal_pinjam = date("Y-m-d");
    $tanggal_kembalikan = $_POST['tanggal_kembalikan'];
    $status = '1';

    if (mysqli_query($conn, "INSERT INTO `anggota`(`id`, `user_id`, `nama_buku`, `nama_pengarang`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES ('$id','$user_id','$nama_buku','$nama_pengarang','$tanggal_pinjam','$tanggal_kembalikan','$status')")) {
        echo "<script>
        alert('Berhasil mengajukan peminjaman buku');
        window.location.href = 'data_pinjaman.php';
        </script>";
    } else {
        echo "<script>alert('Gagal menambahkan data')</script>";
    }
}
?>
<!-- Page content-->
<div class="container-fluid mb-5">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Form peminjaman buku</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-12">
                        <label for="nama_buku" class="form-label">Nama Buku</label>
                    </div>
                    <div class="col-12">
                        <input required type="text" name="nama_buku" id="nama_buku" class="form-control" value="<?= old('nama_buku') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="id" class="form-label">Kode Buku</label>
                    </div>
                    <div class="col-12">
                        <input required type="text" name="id" id="id" class="form-control" value="<?= old('id') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                    </div>
                    <div class="col-12">
                        <input required type="text" name="nama_pengarang" id="nama_pengarang" class="form-control" value="<?= old('nama_pengarang') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="tanggal_kembalikan" class="form-label">Tanggal Kembalikan</label>
                    </div>
                    <div class="col-12">
                        <input required type="date" name="tanggal_kembalikan" id="tanggal_kembalikan" class="form-control" value="<?= old('tanggal_kembalikan') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger mt-3" type="reset">Reset</button>
                        <button name="pinjam_buku" class="btn btn-primary mt-3" type="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php" ?>