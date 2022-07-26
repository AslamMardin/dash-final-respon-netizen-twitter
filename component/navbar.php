  <div class="container-fluid border-bottom">
    <div class="container d-flex flex-column flex-md-row align-items-center pb-3">
      <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">

        <span class="fs-4">Sentimen Analisis</span>
      </a>

      <?php 
      $url = $_SERVER['REQUEST_URI'];
      $file = explode("/", $url);
      $file = end($file);
      ?>
      <nav class="d-inline-flex mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-decoration-none <?= ($file === "index.php") ? "text-warning" : "text-dark"  ?>" href="index.php"><i class="bi bi-house-fill"></i> Home</a>
        
        <a class="me-3 py-2 text-decoration-none <?= (isset($_GET['page'])) ? "text-warning" : "text-dark "  ?>" href="kosa_kata.php?page=positif"><i class="bi bi-person-lines-fill"></i> Kosakata</a>
      </nav>
    </div>
  </div>


  <?php 

  if ($file == "index.php") {
    // code...
   ?>
   <nav id="navbar" class="py-3 mt-0 bg-white fixed-top" style="transition:background 3s ease-in;">
    <div class="container d-flex justify-content-center flex-wrap">
      <ul class="nav flex-end">
        <li class="nav-item"><a href="#analisis" class="nav-link link-dark px-2 active" aria-current="page"><i class="bi bi-bar-chart-line"></i> Diagram</a></li>
        <li class="nav-item"><a href="#unasman" class="nav-link link-dark px-2"><i class="bi bi-building"></i> Unasman</a></li>
        <li class="nav-item"><a href="#polewali" class="nav-link link-dark px-2"><i class="bi bi-hospital"></i> Polewali</a></li>
        <li class="nav-item"><a href="#sulbar" class="nav-link link-dark px-2"><i class="bi bi-signpost-split-fill"></i> Sulbar</a></li>
        
      </ul>
      
    </div>
  </nav>

  <?php } ?>