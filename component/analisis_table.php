<?php 

include_once 'component/function.php';
$connection = conn();
$data = [];
foreach ($kategoris as $key => $kategori) {
  // code...
  $analisis = $connection->get("search/tweets", [
    "q" => $kategori, 
    "lang" => "id",
    "count" => 100,
  ]);
  $data[$kategori] = $analisis->statuses;
  $apiTgl = $analisis->statuses;
  $db = [];

  foreach ($apiTgl as $key => $tgl) {
      // code...
    $tgl1 = strtotime($tgl->created_at);
    $tgl1 = (int) date('d', $tgl1);
    array_push($db, $tgl1);
  }
  $db = array_count_values($db);

  $hitung = "hitung_".$kategori;
  $$hitung = array_sum($db);
}



?>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="55%">Kategori</th>
      <th scope="col" width="10%">Negatif</th>
      <th scope="col" width="10%">Netral</th>
      <th scope="col" width="10%">Positif</th>
      <th scope="col" width="10%">Total</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <tr>
      <th scope="row">1</th>
      <td>Universitas Al Asyariah Mandar</td>
      <td><?= $hitungUnasman['negatif'] ?></td>
      <td><?= $hitungUnasman['netral'] ?></td>
      <td><?= $hitungUnasman['positif'] ?></td>
      <td><?= ($hitung_unasman > 99) ? "100+" : $hitung_unasman ?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Polewali Mandar</td>
    <td><?= $hitungPolewali['negatif'] ?></td>
      <td><?= $hitungPolewali['netral'] ?></td>
      <td><?= $hitungPolewali['positif'] ?></td>
      <td><?= ($hitung_polewali  > 99) ? "100+" : $hitung_polewali ?></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Sulawesi Barat</td>
      <td><?= $hitungSulbar['negatif'] ?></td>
      <td><?= $hitungSulbar['netral'] ?></td>
      <td><?= $hitungSulbar['positif'] ?></td>
      <td><?= ($hitung_sulbar > 99) ? "100+" : $hitung_sulbar  ?></td>
    </tr>
    
  </tbody>
</table>