<?php 

include_once 'component/function.php';
$connection = conn();

if (isset($_GET['name'])) {
  // code...

  $analisis = $connection->get("search/tweets", [
    "q" => $_GET['name'], 
    "lang" => "id",
    "count" => 100,
  ])->statuses;

  $data = [];
  foreach ($analisis as $key => $analis) {
  // code...
    $tgl = (int) date('d', strtotime($analis->created_at));
    if ($tgl == $_GET['tgl']) {
    // code...
      $data[] = [
        'id' => $analis->id_str,
        'name' => $analis->user->screen_name,
        'komentar' => $analis->text
      ];
    }
  }
}else {
  $data = "Tidak ada";
}



echo json_encode($data);
?>