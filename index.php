<?php 
include_once 'component/function.php';
$connection = conn();


$batasan = 100;
$kategoris = ['unasman', 'sulbar', 'polewali'];
foreach ($kategoris as $key => $kategori) {
  // code...
  $statuses = $connection->get("search/tweets", [
    "q" => $kategori, 
    "lang" => "id",
    "count" => 100,
  ]);
  $item = $kategori. "s";
  $$item = $statuses->statuses;
} 
// var_dump($unasmans);die();



?>

<?php include_once 'component/header.php' ?>


<div class="container-fluid py-3">
  <header>
    <?php include_once 'component/navbar.php' ?>
  </header>


    <div class="pricing-header p-3 pb-md-4 mx-auto my-5 text-center">
      <h1 class="display-3  fw-normal" style="font-family: 'Fredoka One', cursive; ">Sentimen Analisis</h1>
      <p class="fs-5 text-muted" style="font-family: 'Mukta', sans-serif;">Sentimen ini akan menganalisiswa tiga (3) kata kunci saja yaitu : Unasman, Polewali, Sulawesi Barat.</p>
    </div>

  <main>


    <div class="container-fluid">
      <div class="row justify-content-end">
         <div class="col-md-3 col-sm-12">
          <?php include_once 'component/terkait.php' ?>
          
        </div>
        <div class="col-md-6 col-sm-12">
          <?php include_once 'component/analisis.php' ?>
          <?php include_once 'component/card_katakunci.php' ?>
        </div>
        <div class="col-md-3 col-sm-12">
          <?php include_once 'component/at.php' ?>
        </div>

      </div>
    </div>








    <a href="#" class="tombol-top d-flex justify-content-center align-items-center position-fixed bg-danger text-white" style="width:45px; height: 45px; border-radius: 50%; z-index: 2; bottom: 50px; right: 50px; transition: .5s; visibility: visible; opacity: .9;">
      <i class="bi bi-arrow-bar-up"></i>
    </a>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hasil : <span id="hasil"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Positif : <strong id="positif">0</strong></p>
        <p>Negatif : <strong id="negatif">0</strong></p>
        <p>Netral : <strong id="netral">0</strong></p>
        <p>Kalimat : <span id="kalimat"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


    <!-- Modal -->
<div class="modal fade" id="modalTweets" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <?php include_once 'component/footer.php'; ?>

    