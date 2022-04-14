<?php

include "header.php";
if (user()->role != 'Admin') {
    header('Location: index.php');
    exit;
}

$ubah = $_GET['ubah'];
$anggota = mysqli_query($conn, "SELECT * FROM users WHERE `id` = $ubah")->fetch_array();
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $role = $_POST['role'];
    $nama = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];

    // validasi password
    if (empty($_POST['password'])) {
        $password = $anggota['password'];
    } else {
        $password = $_POST['password'];
    }

    // validasi nim/nip
    if ($id != user()->id) {
        echo "<script>alert('Anda tidak dapat mengubah nim/nip anda sendiri')</script>";
    } else {
        if ($id == $anggota['id']) {
            if (mysqli_query($conn, "UPDATE `users` SET `id`='$id',`role`='$role',`nama`='$nama',`fakultas`='$fakultas',`jurusan`='$jurusan',`password`='$password' WHERE `id` = $ubah")) {
                echo "<script>
            alert('Berhasil menambahkan data');
            window.location.href = 'data_anggota.php';
            </script>";
            } else {
                echo "<script>alert('Gagal menambahkan data')</script>";
            }
        } else {
            if (mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = $id")->num_rows > 0) {
                echo "<script>alert('NIM/NIP sudah digunakan pengguna lain.')</script>";
            } else {
                if (mysqli_query($conn, "UPDATE `users` SET `nim/nip`='$id',`role`='$role',`nama`='$nama',`fakultas`='$fakultas',`jurusan`='$jurusan',`password`='$password' WHERE `id` = $ubah")) {
                    echo "<script>
                alert('Berhasil menambahkan data');
                window.location.href = 'data_anggota.php';
                </script>";
                } else {
                    echo "<script>alert('Gagal menambahkan data')</script>";
                }
            }
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
                                                                                                                } else {
                                                                                                                    echo $anggota['nama'];
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
                                                                                                    } else {
                                                                                                        echo $anggota['id'];
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
                                                                                                                } else {
                                                                                                                    echo $anggota['fakultas'];
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
                                                                                                            } else {
                                                                                                                echo $anggota['jurusan'];
                                                                                                            } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="role" class="form-label">Role</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <select required class="form-control" name="role" id="role">
                            <option <?php if (isset($_POST['role'])) {
                                        echo $_POST['role'] == 'Admin' ? 'selected' : '';
                                    } else {
                                        echo $anggota['role'] == 'Admin' ? 'selected' : '';
                                    } ?> value="Admin">Admin</option>
                            <option <?php if (isset($_POST['role'])) {
                                        echo $_POST['role'] == 'Anggota' ? 'selected' : '';
                                    } else {
                                        echo $anggota['role'] == 'Anggota' ? 'selected' : '';
                                    } ?> value="Anggota">Anggota</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-lg-2 col-sm-12">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="mt-3 col-lg-10 col-sm-12">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger mt-3" type="reset">Reset</button>
                        <button class="btn btn-primary mt-3" type="submit" name="ubah">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php" ?>