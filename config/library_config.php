<?php
//function untuk menentukan url root dari website
function base_url($string = ""){
	if($string == ""){
		$url = $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://localhost/web_latihan/SPK_WP/' : 'http://'.$_SERVER['SERVER_NAME']."/web_latihan/SPK_WP/";	
	} else {
		$url = $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://localhost/web_latihan/SPK_WP/'.$string : 'http://'.$_SERVER['SERVER_NAME']."/web_latihan/SPK_WP/".$string;
	}
	
	return $url;
}

//fungsi untuk berpindah halaman
function redirect($uri, $http_response_code = 302){
	header("Location: ".$uri, TRUE, $http_response_code);
	exit;
}

//Store Weight Criteria
$_SESSION['weight_criteria'] = array(
	"C1" => 3,
	"C2" => 4,
	"C3" => 5,
	"C4" => 5,
	"C5" => 2,
	"C6" => 3
);

//Weight Rules
$_SESSION['weight_rule'] = array(
	0 => 1,
	1 => 1,
	2 => -1,
	3 => -1,
	4 => 1,
	5 => -1
);

//Ranking Setiap Kriteria
$_SESSION['rc'] = array(
	"MudahDijangkau" => array(
		"Sangat tidak mudah dijangkau"	=> 1,
		"Tidak mudah dijangkau"			=> 2,
		"Cukup mudah dijangkau"			=> 3,
		"Mudah dijangkau"				=> 4,
		"Sangat mudah dijangkau"		=> 5
	),
	
	"Keamanan" => array(
		"Sangat tidak aman"	=> 1,
		"Tidak aman"		=> 2,
		"Cukup aman"		=> 3,
		"Aman"				=> 4,
		"Sangat aman"		=> 5
	)
);
?>