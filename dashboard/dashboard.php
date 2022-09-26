<?php 

include_once '../lib/PHPInsight/Sentiment.php';
$sentiment = new \PHPInsight\Sentiment();
$hitungUnasman = ['positif' => 0, 'negatif' => 0, 'netral' => 0];
$hitungPolewali = ['positif' => 0, 'negatif' => 0, 'netral' => 0];
$hitungSulbar = ['positif' => 0, 'negatif' => 0, 'netral' => 0];


$statuses = $connection->get("search/tweets", [
  "q" => "unasman", 
  "lang" => "id",
  "count" => 100,
]);

$unasmans = $statuses->statuses;

foreach ($unasmans as $key => $item) {
  $class = $sentiment->categorise($item->text);    
  if ($class == "positif") {
    $hitungUnasman['positif'] = $hitungUnasman['positif'] + 1;
  }else if($class == "negatif") {
   $hitungUnasman['negatif'] = $hitungUnasman['negatif'] + 1;
 } else if ($class == "netral"){
   $hitungUnasman['netral'] = $hitungUnasman['netral'] + 1;
 }
}




$totalRespon = count($sulbars);

$totalPositif = (int) ($hitungUnasman['positif']);
$totalNetral = (int) ($hitungUnasman['netral']);
$totalNegatif = (int) ($hitungUnasman['negatif']);
?>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
          <i class="bi bi-twitter"></i>
        </div>
        <div class="text-end pt-1">
          <p class="text-sm mb-0 text-capitalize">Total Respon</p>
          <h4 class="mb-0"><?= $totalRespon ?></h4>
        </div>
      </div>
      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
        <i class="bi bi-emoji-frown"></i>

        </div>
        <div class="text-end pt-1">
          <p class="text-sm mb-0 text-capitalize">Respon Negatif</p>
          <h4 class="mb-0"><?= $totalNegatif ?></h4>
        </div>
      </div>
      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
        <i class="bi bi-emoji-smile"></i>
       </div>
       <div class="text-end pt-1">
        <p class="text-sm mb-0 text-capitalize">Respon Positif</p>
        <h4 class="mb-0"><?= $totalPositif ?></h4>
      </div>
    </div>
    <hr class="dark horizontal my-0">
    <div class="card-footer p-3">

    </div>
  </div>
</div>
<div class="col-xl-3 col-sm-6">
  <div class="card">
    <div class="card-header p-3 pt-2">
      <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
      <i class="bi bi-emoji-neutral"></i>
     </div>
     <div class="text-end pt-1">
      <p class="text-sm mb-0 text-capitalize">Netral</p>
      <h4 class="mb-0"><?= $totalNetral ?></h4>
    </div>
  </div>
  <hr class="dark horizontal my-0">
  <div class="card-footer p-3">

  </div>
</div>
</div>
</div>

<div class="card mt-4">
  <div class="card-header p-3">
    <h5 class="mb-0">Informasi</h5>
    <p class="text-sm mb-0">
      Aplikasi ini hanya memonitoring social media !.
    </p>
  </div>
  <div class="card-body p-3">
    <div class="row">
     
      <div class="col-lg-4 col-sm-6 col-12 mt-sm-0 mt-2">
        <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button" data-target="infoToast">Twitter</button>
      </div>
     
    </div>
  </div>
</div>


<div class="row mt-4">
  <div class="col-lg-6 col-md-6 col-sm-12 mt-4 mb-4">
    <div class="card z-index-2 ">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
          <div class="chart">
            <canvas id="chart-unasman" class="chart-canvas" height="340"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">

        <table class="table table-hover" style="font-size: 11px;">
          <thead>
            <tr align="center">
              <th>Positif</th>
              <th>Netral</th>
              <th>Negatif</th>
            </tr>
          </thead>   
          <tbody>
            <tr align="center">
              <td><?= $hitungUnasman['positif'] ?></td>
              <td><?= $hitungUnasman['netral'] ?></td>
              <td><?= $hitungUnasman['negatif'] ?></td>
            </tr>
          </tbody>       
        </table>

        <div class="d-flex align-items-center justify-content-start gap-2">
          <h6 class="mb-0 ">Daftar Tweet</h6>
          <div class="avatar-group mt-2">
            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
              <img alt="Image placeholder" src="../assets/img/team-1.jpg">
            </a>
            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
              <img alt="Image placeholder" src="../assets/img/team-2.jpg">
            </a>
            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
              <img alt="Image placeholder" src="../assets/img/team-3.jpg">
            </a>
            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
              <img alt="Image placeholder" src="../assets/img/team-4.jpg">
            </a>
          </div>
        </div>

        <div id="table-unasman"></div>
        <hr class="dark horizontal">
        <div class="d-flex ">
          <i class="bi bi-card-list text-sm my-auto me-1"></i>
          <p class="mb-0 text-sm"> Unasman </p>
        </div>
      </div>
    </div>
  </div>
 

</div>


<!-- Modal -->
<div class="modal fade" id="modalTweets" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog modal-lg modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penelusuran Pada Tanggal : <span id="hasilTweet"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-tweet"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>