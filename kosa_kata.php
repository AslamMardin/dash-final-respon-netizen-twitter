

<?php include_once 'component/header.php' ?>


<div class="container-fluid py-3">
  <header>
    <?php include_once 'component/navbar.php' ?>
  </header>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link <?= ($_GET['page'] == "positif") ? "active" : "" ?>" aria-current="page" href="kosa_kata.php?page=positif">Positif</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?= ($_GET['page'] == "negatif") ? "active" : "" ?>" href="kosa_kata.php?page=negatif">Negatif</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= ($_GET['page'] == "himbuan") ? "active" : "" ?>" href="kosa_kata.php?page=himbuan">Himbuan</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?= ($_GET['page'] == "netral") ? "active" : "" ?>" href="kosa_kata.php?page=netral">Netral</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?= ($_GET['page'] == "prefix") ? "active" : "" ?>" href="kosa_kata.php?page=prefix">Prefix</a>
    </li>
  </ul>

  <main>


    <div class="container-fluid mt-3">
      <?php 
      if (($_GET['page'] == "kosakata") && ($_GET['role'] == "positif")) {
        // code...
        $file = "lib/PHPInsight/dictionaries/source.positif.php"; 
      } else if(($_GET['page'] == "kosakata") && ($_GET['role'] == "negatif")){
        $file = "lib/PHPInsight/dictionaries/source.negatif.php"; 
      }else if(($_GET['page'] == "kosakata") && ($_GET['role'] == "himbuan")){
        $file = "lib/PHPInsight/dictionaries/source.ignore.php"; 
      }
      else if(($_GET['page'] == "kosakata") && ($_GET['role'] == "netral")){
        $file = "lib/PHPInsight/dictionaries/source.netral.php"; 
      }else {
        $file = "lib/PHPInsight/dictionaries/source.prefix.php"; 

      }
      $datas = file_get_contents($file);
      $datas = explode(",", $datas);
      echo "string";
      ?>
      <table class="display table" id="myTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kosa Kata</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach($datas as $key => $data) {
            if ($key == 0) {
        // code...
              continue;
            }
            ?>

            <tr>
              <th scope="row"><?= $key  ?></th>
              <td><?= $data ?></td>
            </tr>

            <?php
          }
          ?>
        </tbody>
      </table>
    </div>






  </main>

  <a href="#" class="tombol-top d-flex justify-content-center align-items-center position-fixed bg-danger text-white" style="width:45px; height: 45px; border-radius: 50%; z-index: 2; bottom: 50px; right: 50px; transition: .5s; visibility: visible; opacity: .9;">
    <i class="bi bi-arrow-bar-up"></i>
  </a>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
     $('#background-loading').hide()
      $('#myTable').DataTable();
   })
 </script>