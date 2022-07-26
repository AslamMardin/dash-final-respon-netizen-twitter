<?php 
require "../vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
date_default_timezone_set('asia/jakarta');
function conn() {



	$costumer_key = "DcHlTcYxDxDIiZsArQuz1Y7Cr";
	$costumer_secret = "RWaWVhcFR0ieoo92QvZW60r8Le7nE5q7WFKRYIx3WydPBgFFyt";
	$access_token ="1516602431500877825-SvvEGctpHG4XX1PGOtOpQQyLOnbHWC";
	$access_token_secret = "3AcmVdO5r28S56K4r4HSKLA1kflOF6avGyHkGmuislHrc";

	$connection = new TwitterOAuth($costumer_key, $costumer_secret, $access_token, $access_token_secret);

	return $connection;
}


function sentiment($text) {
	// menjadikan huruf kecil semua
	$text = strtolower(trim($text));

	$text = preg_replace("/[^a-z]/", " ", $text);
	echo "<pre>";
	var_dump($text);
	echo "</pre>";
}


function myGet($url, $data = []) {
	$conn = conn();
	return $conn->get($url, $data);
}


function saveHistory($data = [])
{


// Mengencode data menjadi json
	$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
	file_put_contents("history.json", $jsonfile);
}

function cekHistory()
{
	// Mendapatkan file json
	$historys = file_get_contents("history.json");

// Mendecode anggota.json
	$data = json_decode($historys, true);	
	if (count($data) == 0) {
		// code...
		return 1;
	}
	return count($data);
}

function getHistory(){
	// Mendapatkan file json
	$historys = file_get_contents("history.json");

// Mendecode anggota.json
	$data = json_decode($historys, true);	
	return $data;
}

function insertHistory($data = []){
// File json yang akan dibaca
	$file = "history.json";

// Mendapatkan file json
	$historys = file_get_contents($file);

// Mendecode historys.json
	$data1 = json_decode($historys, true);
	$index= (count($data1) + 1);		
	$data1[] = [
		"id" => $index,
		"minggu_lalu" => $data['minggu_lalu'],
		"hari_sekarang" => $data['hari_sekarang'],
		"unasman" => $data['unasman'],
		"polewali" => $data['polewali'],
		"sulbar" => $data['sulbar'],
	];

// Mengencode data menjadi json
	$jsonfile = json_encode($data1, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
	file_put_contents($file, $jsonfile);
	return true;
}

function updateHistory($data)
{
	// File json yang akan dibaca
	$file = "history.json";

// Mendapatkan file json
	$files = file_get_contents($file);

// Mendecode files.json
	$historys = json_decode($files, true);

	$index = count($historys);

// Membaca historys array menggunakan foreach
	foreach ($historys as $key => $history) {
    // Perbarui historys kedua
		if ($history['id'] == $index) {
			$historys[$index-1]['unasman'] = $data['unasman'];
			$historys[$index-1]['polewali'] = $data['polewali'];
			$historys[$index-1]['sulbar'] = $data['sulbar'];
		}
	}

// Mengencode data menjadi json
	$jsonfile = json_encode($historys, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
	$anggota = file_put_contents($file, $jsonfile);
}

?>