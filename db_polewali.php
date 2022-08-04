<?php 

include_once 'component/function.php';
$connection = conn();


// mencari minggu lalu dulu
$harisekarang = (int) date('d', time()); //17
// $mingguLalu = $harisekarang - 7; // 8
$mingguLalu = (int) date('d', strtotime("-7 days")); //10


$analisis = $connection->get("search/tweets", [
  "q" => "polewali", 
  "lang" => "id",
  "count" => 100,
]);
$datas = [];
$apiTgl = $analisis->statuses;
$db = [];

foreach ($apiTgl as $key => $tgl) {
      // code...
  $tgl1 = strtotime($tgl->created_at);
  $tgl1 = (int) date('d', $tgl1);
  array_push($db, $tgl1);
}
$db = array_count_values($db);
for ($tanggal=$mingguLalu; $tanggal <= $harisekarang ; $tanggal++) { 
    if(!array_key_exists($tanggal, $db)){
     $db[$tanggal] = 0;
    }
}

// var_dump($db);die();
$data = [
  "data" => $db
];
echo json_encode($data);
?>