<div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/LOGO-removebg-preview.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Monitoring</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="min-height: 500px;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= ($_GET['page'] == "dashboard") ? "active bg-gradient-primary" : "" ?>" href="main.php?page=dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
             <i class="bi bi-activity"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Respon Netizen</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($_GET['page'] == "unasman") ? "active  bg-gradient-primary" : "" ?> " href="main.php?page=unasman">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="bi bi-bookmark-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Unasman</span>
          </a>
        </li>
        

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Himbuan</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?= ($_GET['page'] == "kosakata") ? "active  bg-gradient-primary" : "" ?>" href="main.php?page=kosakata&role=positif">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
             <i class="bi bi-journals"></i>
            </div>
            <span class="nav-link-text ms-1">Kosa Kata</span>
          </a>
        </li>

       
      </ul>
    </div>