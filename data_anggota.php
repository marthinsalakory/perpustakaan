<?php

include "header.php";
if (user()->role != 'Admin') {
    header('Location: index.php');
    exit;
}

$anggota = mysqli_query($conn, "SELECT * FROM `users`");
if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    if (mysqli_query($conn, "DELETE FROM `users` WHERE `id` = $hapus")) {
        echo "<script>
        alert('Berhasil menghapus data');
        window.location.href = 'data_anggota.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data');
        window.location.href = 'data_anggota.php';
        </script>";
    }
}


?>
<!-- Page content-->
<div class="container-fluid mb-5">
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Data Anggota</h3>
                </div>
                <div class="col-6">
                    <a href="tambah_anggota.php" class="btn btn-primary float-end"><i class="bi bi-person-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Role</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM/NIP</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col"><i class="bi bi-gear"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($anggota as $a) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $a['role']; ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['id']; ?></td>
                                    <td><?= $a['fakultas']; ?></td>
                                    <td><?= $a['jurusan']; ?></td>
                                    <td>
                                        <a href="ubah_anggota.php?ubah=<?= $a['id']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a onclick="return confirm('Hapus?')" href="?hapus=<?= $a['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
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