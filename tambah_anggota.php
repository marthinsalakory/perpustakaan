<?php

include "header.php";
if (user()->role != 'Admin') {
    header('Location: index.php');
    exit;
}
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $role = $_POST['role'];
    $nama = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $password = $_POST['password'];

    if (mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = $id")->num_rows > 0) {
        echo "<script>alert('NIM/NIP sudah digunakan pengguna lain.')</script>";
    } else {
        if (mysqli_query($conn, "INSERT INTO `users`(`id`, `role`, `nama`, `fakultas`, `jurusan`, `password`) VALUES ('$id','$role','$nama','$fakultas','$jurusan','$password')")) {
            echo "<script>
        alert('Berhasil menambahkan data');
        window.location.href = 'data_anggota.php';
        </script>";
        } else {
            echo "<script>alert('Gagal menambahkan data')</script>";
        }
    }
}

?>
<!-- Page content-->
<div class="container-fluid mb-5">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Form tambah anggota</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="nama" class="form-label">Nama</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <input autofocus required type="text" name="nama" id="nama" class="form-control" value="<?php if (isset($_POST['nama'])) {
                                                                                                                    echo $_POST['nama'];
                                                                                                                } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="id" class="form-label">NIM/NIP</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <input required type="number" name="id" id="id" class="form-control" value="<?php if (isset($_POST['id'])) {
                                                                                                        echo $_POST['id'];
                                                                                                    } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="fakultas" class="form-label">Fakultas</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <input required type="text" name="fakultas" id="fakultas" class="form-control" value="<?php if (isset($_POST['fakultas'])) {
                                                                                                                    echo $_POST['fakultas'];
                                                                                                                } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="jurusan" class="form-label">Jurusan</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <input required type="text" name="jurusan" id="jurusan" class="form-control" value="<?php if (isset($_POST['jurusan'])) {
                                                                                                                echo $_POST['jurusan'];
                                                                                                            } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="role" class="form-label">Role</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <select required class="form-control" name="role" id="role">
                            <option value="">Pilih</option>
                            <option <?= old('role') == 'Admin' ? 'selected' : ''; ?> value="Admin">Admin</option>
                            <option <?= old('role') == 'Anggota' ? 'selected' : ''; ?> value="Anggota">Anggota</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <input required type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger mt-3" type="reset">Reset</button>
                        <button class="btn btn-primary mt-3" type="submit" name="kirim">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php" ?>