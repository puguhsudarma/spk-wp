<?php
function metode_wp($w, $w_k, $nilai){
	$perbaikkan_b 	= perbaikkan_bobot($w, $w_k);
	$v_s 			= vektor_s($perbaikkan_b, $nilai);
	$v_v 			= vektor_v($v_s);

	$max 	= max($v_v);
	$key 	= array_search($max, $v_v);
	
	return $key;
}

function perbaikkan_bobot($bobot, $ketentuan_bobot){
	//cek apakah parameter berupa array ?
	if(!is_array($bobot) && !is_array($ketentuan_bobot)){
		return false;
	}

	//sum semua bobot
	$sum_bobot = array_sum($bobot);

	//lakukan perbaikkan bobot dengan normalisasi
	$k=0;
	foreach($bobot as $perbaikkan){
		$x = $perbaikkan/$sum_bobot;
		$x *= $ketentuan_bobot[$k];
		$bobot_perbaikkan[] = number_format($x, 2);
		$k++;
	}

	//return perbaikkan bobot
	return $bobot_perbaikkan;
}

function vektor_s($bobot_norm, $nilai_awal){
	//cek apakah parameter berupa array ?
	if(!is_array($bobot_norm) && !is_array($nilai_awal)){
		return false;
	}

	//foreach untuk nilai awal baris
	foreach($nilai_awal as $nilai_alternatif){
		$x = 1;
		$k = -1;
		//foreach untuk nilai awal kolom perbaris
		foreach($nilai_alternatif as $nilai){
			//lewati nama daerah
			if($k == -1){
				$k++;
				continue;
			}
			
			$x *= pow($nilai, $bobot_norm[$k]);
			$k++;
		}
		//simpan hasil kalkulasi pada vektor s
		$vektor_s[] = number_format($x, 2);
	}

	//return vektor s
	return $vektor_s;
}

function vektor_v($vektor_s){
	//cek apakah parameter berupa array ?
	if(!is_array($vektor_s)){
		return false;
	}

	//jumlah semua nilai vektor
	$sum_vektor_s = array_sum($vektor_s);

	//hasil setiap vektor v
	foreach($vektor_s as $vektor){
		$v_s = $vektor/$sum_vektor_s;
		$vektor_v[] = number_format($v_s, 2);
	}

	//return vektor v
	return $vektor_v;
}