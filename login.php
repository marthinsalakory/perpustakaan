<?php
include 'config.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['login'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    if (mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = $id && `password` = '$password'")->num_rows > 0) {
        $_SESSION['login'] = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = $id")->fetch_object()->id;
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style1.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">PERPUSTAKAAN</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(img/buku.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <?php if (isset($error)) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Gagal Masuk!</strong> Silahkan coba lagi.
                                </div>
                            <?php } ?>
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Masuk</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="#" method="POST" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="id">NIM/NIP</label>
                                    <input autofocus type="number" class="form-control" placeholder="NIM/NIP" name="id" id="id" required value="<?php
                                                                                                                                                if (isset($_POST['id'])) {
                                                                                                                                                    echo $_POST['id'];
                                                                                                                                                }
                                                                                                                                                ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Kata Sandi</label>
                                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <button name="login" type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Ingat Saya
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a style="cursor: pointer;" onclick="alert('Silahkan hubungi petugas untuk mereset password anda.')">Lupa Kata Sandi</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>