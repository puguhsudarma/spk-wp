<?php
/* *
 * -----------------------------------------
 * | Dummy Data Insert Into Session Server |
 * -----------------------------------------
 * Criteria :
 * C1 : Jangkauan (1 - 5 (Sangat tidak mudah s/d Sangat mudah))
 * C2 : Jumlah penduduk (Jiwa)
 * C3 : Persaingan toko lain (Toko)
 * C4 : Banyak calon pembeli (calon pembeli)
 * C5 : Keamanan (1-5 (Sangat tidak aman s/d Sangat aman))
 * C6 : Luas tempat (m2)
 * -----------------------------------------
 */
session_start();

$_SESSION['data_alternatif'] = array(
	array(
		"NamaDaerah" => "Teukur Umar",
		"C1" 		 => 3,
		"C2" 		 => 50,
		"C3" 		 => 200,
		"C4" 		 => 7,
		"C5" 		 => 5,
		"C6" 		 => 45
	),

	array(
		"NamaDaerah" => "Pulau Kawe",
		"C1" 		 => 1,
		"C2" 		 => 300,
		"C3" 		 => 105,
		"C4" 		 => 10,
		"C5" 		 => 1,
		"C6" 		 => 29
	),

	array(
		"NamaDaerah" => "Pulau Saelus",
		"C1" 		 => 1,
		"C2" 		 => 180,
		"C3" 		 => 100,
		"C4" 		 => 8,
		"C5" 		 => 4,
		"C6" 		 => 65
	),

	array(
		"NamaDaerah" => "Sesetan",
		"C1" 		 => 4,
		"C2" 		 => 80,
		"C3" 		 => 150,
		"C4" 		 => 6,
		"C5" 		 => 2,
		"C6" 		 => 78
	),

	array(
		"NamaDaerah" => "Peken Badung",
		"C1" 		 => 5,
		"C2" 		 => 95,
		"C3" 		 => 120,
		"C4" 		 => 4,
		"C5" 		 => 2,
		"C6" 		 => 56
	),

	array(
		"NamaDaerah" => "Peken Sanglah",
		"C1" 		 => 3,
		"C2" 		 => 448,
		"C3" 		 => 29,
		"C4" 		 => 39,
		"C5" 		 => 3,
		"C6" 		 => 195
	)
);

$uri = "http://localhost/web_latihan/spk_wp/";
$http_response_code = 302;
header("Location: ".$uri, TRUE, $http_response_code);
exit();