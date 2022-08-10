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




function preProcessing($text) {
	// menjadikan huruf kecil semua
	//ubah ke huruf kecil  
	$berita = strip_tags($text);
	$berita = stripcslashes($berita); 
	$berita = strtolower($berita);

    //hilangkan beberapa tanda baca
	$berita = str_replace(":", "", $berita);
	$berita = preg_replace('/[^a-z\s]/', '', $berita);
	


     // https://e-padi.com/stop-words-indonesia-query-php-array.htm
    //daftar stop list      
	$astoplist =  array("ajak", "akan", "beliau", "khan", "lah", "dong", "ahh", "sob", "elo", "kena", "kenapa", "yang", "dan", "tidak", "agak", "kata", "bilang", "sejak", "kagak", "cukup", "jua", "cuma", "hanya", "karena", "oleh", "lain", "setiap", "untuk", "dari", "dapat", "dapet", "sudah", "udah", "selesai", "punya", "belum", "boleh", "gue", "gua", "aku", "kamu", "dia", "mereka", "kami", "kita", "jika", "bila", "kalo", "kalau", "dalam", "nya", "atau", "seperti", "mungkin", "sering", "kerap", "acap", "harus", "banyak", "doang", "kemudian", "nyala", "mati", "milik", "juga", "mau", "dimana", "apa", "kapan", "kemana", "selama", "siapa", "mengapa", "dengan", "kalian", "bakal", "bakalan", "tentang", "setelah", "hadap", "semua", "hampir", "antara", "sebuah", "apapun", "sebagai", "di", "tapi", "lainnya", "bagaimana", "namun", "tetapi", "biar", "pun", "itu", "ini", "suka", "paling", "mari", "ayo", "barangkali", "mudah", "kali", "sangat", "banget", "disana", "disini", "terlalu", "lalu", "terus", "trus", "sungguh", "telah", "mana", "apanya", "ada", "adanya", "adalah", "adapun", "agaknya", "agar", "akankah", "akhirnya", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "diantaranya", "antaranya", "diantara", "apaan", "apabila", "apakah", "apalagi", "apatah", "ataukah", "ataupun", "bagai", "bagaikan", "sebagainya", "bagaimanapun", "sebagaimana", "bagaimanakah", "bagi", "bahkan", "bahwa", "bahwasanya", "sebaliknya", "sebanyak", "beberapa", "seberapa", "begini", "beginian", "beginikah", "beginilah", "sebegini", "begitu", "begitukah", "begitulah", "begitupun", "sebegitu", "belumlah", "sebelum", "sebelumnya", "sebenarnya", "berapa", "berapakah", "berapalah", "berapapun", "betulkah", "sebetulnya", "biasa", "biasanya", "bilakah", "bisa", "bisakah", "sebisanya", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "percuma", "dahulu", "daripada", "dekat", "demi", "demikian", "demikianlah", "sedemikian", "depan", "dialah", "dini", "diri", "dirinya", "terdiri", "dulu", "enggak", "enggaknya", "entah", "entahlah", "terhadap", "terhadapnya", "hal", "hanyalah", "haruslah", "harusnya", "seharusnya", "hendak", "hendaklah", "hendaknya", "hingga", "sehingga", "ialah", "ibarat", "ingin", "inginkah", "inginkan", "inikah", "inilah", "itukah", "itulah", "jangan", "jangankan", "janganlah", "jikalau", "justru", "kala", "kalaulah", "kalaupun", "kamilah", "kamulah", "kan", "kau", "kapankah", "kapanpun", "dikarenakan", "karenanya", "ke", "kecil", "kepada", "kepadanya", "ketika", "seketika", "khususnya", "kini", "kinilah", "kiranya", "sekiranya", "kitalah", "kok", "lagi", "lagian", "selagi", "melainkan", "selaku", "melalui", "lama", "lamanya", "selamanya", "lebih", "terlebih", "bermacam", "macam", "semacam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "manakala", "manalagi", "masih", "masihkah", "semasih", "masing", "maupun", "semaunya", "memang", "merekalah", "meski", "meskipun", "semula", "mungkinkah", "nah", "nanti", "nantinya", "nyaris", "olehnya", "seorang", "seseorang", "pada", "padanya", "padahal", "sepanjang", "pantas", "sepantasnya", "sepantasnyalah", "para", "pasti", "pastilah", "per", "pernah", "pula", "merupakan", "rupanya", "serupa", "saat", "saatnya", "sesaat", "aja", "saja", "sajalah", "saling", "bersama", "sama", "sesama", "sambil", "sampai", "sana", "sangatlah", "saya", "sayalah", "sebab", "sebabnya", "tersebut", "tersebutlah", "sedang", "sedangkan", "sedikit", "sedikitnya", "segala", "segalanya", "segera", "sesegera", "sejenak", "sekali", "sekalian", "sekalipun", "sesekali", "sekaligus", "sekarang", "sekitar", "sekitarnya", "sela", "selain", "selalu", "seluruh", "seluruhnya", "semakin", "sementara", "sempat", "semuanya", "sendiri", "sendirinya", "seolah", "sepertinya", "seringnya", "serta", "siapakah", "siapapun", "disinilah", "sini", "sinilah", "sesuatu", "sesuatunya", "suatu", "sesudah", "sesudahnya", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tak", "tanpa", "tentu", "tentulah", "tertentu", "seterusnya", "tiap", "setidaknya", "tidakkah", "tidaklah", "toh", "waduh", "wah", "wahai", "sewaktu", "walau", "walaupun", "wong", "yaitu", "yakni"); 

    //hapus term yang sama dengan stop word
	foreach ($astoplist as $i => $value) {
		$berita = str_replace($astoplist[$i], "", $berita);
    } //end foreach

    return $berita;
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