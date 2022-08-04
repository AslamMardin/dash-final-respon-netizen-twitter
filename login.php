<?php 
session_start();

if ((isset($_SESSION['masuk'])) && $_SESSION['masuk'] == "true") {
  header('Location:dashboard/main.php?page=dashboard');
}
function pesan($pesan ="", $type = "danger")
{
  ?>
  <div class="alert alert-<?= $type ?> alert-dismissible text-white" role="alert">
    <span class="text-sm"><?= $pesan ?>.</span>
    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Sistem Informasi Monitoring Respon Netizen Berbasis Web
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/unasman2.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">LOGIN</h4>
                  <div class="row mt-3">

                  </div>
                </div>
              </div>
              <div class="card-body">
              <?php 
                if (isset($_COOKIE['pesan'])) {
                  // code...
                  pesan($_COOKIE['pesan'], 'success');
                }
               ?>

                <form role="form" method="post" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="sandi" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="btn" class="btn bg-gradient-primary w-100 my-4 mb-2">Masuk</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Kamu Tidak Punya Akun?
                    <a href="daftar_akun.php" class="text-primary text-gradient font-weight-bold">Daftar Sekarang!</a>
                  </p>
                </form>

                <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'api-twitter');
                if (!$conn) {
                 pesan("Maaf Koneksi Sedang Bermasalah");
               }


               if (isset($_POST['btn'])) {
                $q = "SELECT * FROM users WHERE email='".$_POST['email']."'";
                $hasil = mysqli_query($conn, $q);
                $result = mysqli_fetch_assoc($hasil);
                if (password_verify($_POST['sandi'], $result['sandi'])) {
                  $_SESSION['masuk'] = true;
                  $_SESSION['id'] = $result['id'];
                  $_SESSION['nama'] = $result['nama'];
                   header('Location:dashboard/main.php?page=dashboard');
                }else{
                  pesan("Email dan Sandi Salah !");
                }

              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>
<!--   Core JS Files   -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>