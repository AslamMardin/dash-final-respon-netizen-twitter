<?php 
include_once '../lib/PHPInsight/Sentiment.php';
$sentiment = new \PHPInsight\Sentiment();

$hitungUnasman = ['positif' => 0, 'negatif' => 0, 'netral' => 0];
$hitungPolewali = ['positif' => 0, 'negatif' => 0, 'netral' => 0];
$hitungSulbar = ['positif' => 0, 'negatif' => 0, 'netral' => 0];

?>
<div class="row py-4">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Respon Netizen Terhadap Sulawesi Barat</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-3">
          <table class="table align-items-center mb-0" id="myTable">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:10%">Akun</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tweet</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Label</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($sulbars as $key => $item) {
                if ($key > $batasan) {
                  break;
                }
                ?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="<?= $item->user->profile_image_url ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?= $item->user->name ?></h6>
                        <p class="text-xs text-secondary mb-0">@<?= $item->user->screen_name ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-xs text-secondary mb-0" style=" width: 450px;word-break: break-all;
                    white-space: normal;"><?= $item->text ?></div>
                  </td>

                  <!-- Kalkulasi -->
                  <?php 
                    // calculations:
                  $kalimat = preProcessing($item->text);
                  $scores = $sentiment->score($item->text);
                  $class = $sentiment->categorise($kalimat);
                   $imot = "";
                  if ($class == "positif") {
                    $imot = "<i class=\"bi bi-emoji-smile text-success\"></i>";
                  }else if($class == "negatif"){
                    $imot = "<i class=\"bi bi-emoji-frown text-danger\"></i>";
                  }else {
                    $imot = "<i class=\"bi bi-emoji-neutral text-secondary\"></i>";
                  }
                  ?>

                  <!-- /Kalkulasi -->

                  <td class="align-middle text-center text-sm">
                      <?= $imot ?>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"> <?php     
                    $date = date_create($item->created_at);
                    echo date_format($date,"y/m/d");
                  ?></span>
                </td>
                <td class="align-middle">
                  <a target="_blank" href="https://twitter.com/<?= $item->user->screen_name ?>/status/<?= $item->id_str ?>" class="text-secondary fw-light">
                    <i class="bi bi-eye-fill"></i></a>
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