<?php 
if ($_GET['role'] = "positif" && $_GET['page'] == "kosakata") {
        // code...
  $file = "../lib/PHPInsight/dictionaries/source.positif.php"; 
} else if($_GET['role'] = "negatif" && $_GET['page'] == "kosakata"){
  $file = "../lib/PHPInsight/dictionaries/source.negatif.php"; 
}else if($_GET['role'] = "himbuan" && $_GET['page'] == "kosakata"){
  $file = "../lib/PHPInsight/dictionaries/source.ignore.php"; 
}
else if($_GET['role'] = "netral" && $_GET['page'] == "kosakata"){
  $file = "../lib/PHPInsight/dictionaries/source.netral.php"; 
}else {
  $file = "../lib/PHPInsight/dictionaries/source.prefix.php"; 

}
$datas = file_get_contents($file);
$datas = explode(",", $datas);
?>

<div class="card mt-4">
  <div class="card-header p-3">
    <h5 class="mb-0">Kosa Kata</h5>

  </div>
  <div class="card-body p-3">
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-12">
       <a href="main.php?page=kosakata&role=positif" class="btn bg-gradient-success w-100 mb-0 toast-btn">Positif</a>
     </div>
     <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
       <a href="main.php?page=kosakata&role=netral" class="btn bg-gradient-info w-100 mb-0 toast-btn">Netral</a>
     </div>
     <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
       <a href="main.php?page=kosakata&role=himbuan" class="btn bg-gradient-warning w-100 mb-0 toast-btn">Himbuan</a>
     </div>
     <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
       <a href="main.php?page=kosakata&role=negatif" class="btn bg-gradient-danger w-100 mb-0 toast-btn">Negatif</a>
     </div>
   </div>
 </div>
</div>

<div class="row py-4">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Kosa Kata</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-3">
          <table class="table align-items-center mb-0" id="myTable">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:10%">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kosa Kata</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($datas as $key => $item) {
                if ($key == 0) {
                  continue;
                }
                ?>
                <tr>
                  <td>
                    <?= $key ?>
                  </td>
                  <td>
                    <?= $item ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>