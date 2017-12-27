<?php
function create($new){
	//cek apakah data replace array ?
	if(!is_array($new)){
		return false;
	}

	//new data
	$_SESSION['data_alternatif'][] = array(
		"NamaDaerah" => $new[0],
		"C1" 		 => $new[1],
		"C2" 		 => $new[2],
		"C3" 		 => $new[3],
		"C4" 		 => $new[4],
		"C5" 		 => $new[5],
		"C6" 		 => $new[6]
	);

	return true;
}

function update($id, $replace){
	//cek apakah data replace array ?
	if(!is_array($replace)){
		return false;
	}

	//cek apakah ada data di session ?
	if(!isset($_SESSION['data_alternatif'])){
		return false;
	}

	//cek apakah id berupa integer ?
	if(!is_numeric($id)){
		return false;
	}

	//cek apakah terjadi outbound index array ?
	$end = end(array_keys($_SESSION['data_alternatif']));
	if(!($id >= 0 && $id <= $end)){
		return false;
	}

	//lakukan replace data
	$_SESSION['data_alternatif'][$id] = array(
		"NamaDaerah" => $replace[0],
		"C1" 		 => $replace[1],
		"C2" 		 => $replace[2],
		"C3" 		 => $replace[3],
		"C4" 		 => $replace[4],
		"C5" 		 => $replace[5],
		"C6" 		 => $replace[6]
	);

	return true;
}

function delete($id){
	//cek apakah ada data di session ?
	if(!isset($_SESSION['data_alternatif'])){
		return false;
	}

	//cek apakah id berupa integer ?
	if(!is_numeric($id)){
		return false;
	}

	//cek apakah terjadi outbound index array ?
	$end = end(array_keys($_SESSION['data_alternatif']));
	if(!($id >= 0 && $id <= $end)){
		return false;
	}

	//lakukan delete data
	unset($_SESSION['data_alternatif'][$id]);

	//rebuild ulang array
	$_SESSION['data_alternatif'] = array_values($_SESSION['data_alternatif']);

	return true;
}
?>