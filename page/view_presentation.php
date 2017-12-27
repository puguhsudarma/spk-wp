<?php
//Fetch data alternatif from session
function fetch_data(){
	//check is there any data ? then fetch
	if(isset($_SESSION['data_alternatif'])){
		$datas = $_SESSION['data_alternatif'];
	}

	//check is there a decission result ?
	$row_result = isset($_SESSION['hasil_keputusan']['row']) ? $_SESSION['hasil_keputusan']['row'] : "";

	//echo table
	echo "
		<div class='row'>
		<div class='col-sm-12 col-md-12 data-table'>
		<div class='panel panel-default'>
			<div class='panel-heading'>Data Alternatif</div>
			<div class='panel-body'>
			<table class='table table-condensed table-hover table-bordered'>
				<tr>
					<th>No</th>
					<th>Nama Daerah</th>
					<th>Jangkauan</th>
					<th>Penduduk</th>
					<th>Persaingan Toko</th>
					<th>Calon Pembeli</th>
					<th>Keamanan</th>
					<th>Luas</th>
					<th colspan='2'>Action</th>
				</tr>
	";
	//echo data, if exist
	if(isset($_SESSION['data_alternatif'])){
		$k=0;
		foreach ($datas as $data) {
			$mudahdijangkau = "";
			foreach($_SESSION['rc']['MudahDijangkau'] as $md => $nilai){
				if($data['C1'] == $nilai){
					$mudahdijangkau = $md;
					break;
				}
			}

			$keamanan = "";
			foreach($_SESSION['rc']['Keamanan'] as $aman => $nilai){
				if($data['C5'] == $nilai){
					$keamanan = $aman;
					break;
				}
			}

			$update = 	"
				<a href='".base_url("index.php?act=update&act=update&id=".$k)."'>
					<span class='glyphicon glyphicon-edit'></span>
					<span class='sr-only'>Update</span>
				</a>
			";
			
			$delete = 	"
				<a href='".base_url("page/aksi_proses_spk.php?act=delete&id=".$k)."' onclick='return confirm(\"Hapus Data ?\");'>
					<span class='glyphicon glyphicon-trash'></span>
					<span class='sr-only'>Delete</span>
				</a>
			";

			$tag_open = ($row_result === $k) ? "<tr class='success'>" : "<tr>";
			echo "
					".$tag_open."
						<td>".++$k."</td>
						<td>".$data['NamaDaerah']."</td>
						<td>".$mudahdijangkau."</td>
						<td>".$data['C2']."</td>
						<td>".$data['C3']."</td>
						<td>".$data['C4']."</td>
						<td>".$keamanan."</td>
						<td>".$data['C6']."</td>
						<td>".$update."</td>
						<td>".$delete."</td>
					</tr>
			";
		}
	}
	//echo close tag
	echo "
			</table>
			</div>
		</div>
		</div>
		</div>
	";
}

//Create data alternatif
function tambah_data_alternatif(){
	echo "
		<form action='".base_url('page/aksi_proses_spk.php?act=create')."' method='POST'>
			<div class='panel panel-default'>
				<div class='panel-heading'>Tambah Data Alternatif</div>
				<div class='panel-body'>
				<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='NamaDaerah'>Nama Daerah</label>
						<input type='text' class='form-control input-sm' name='NamaDaerah' id='NamaDaerah' placeholder='Nama Daerah' value='' />
					</div>

			<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='MudahDijangkau'>1. Mudah Dijangkau</label>
						<select class='form-control input-sm' name='MudahDijangkau' id='MudahDijangkau'>
	";
	foreach($_SESSION['rc']['MudahDijangkau'] as $md => $nilai){
		echo "
			<option value='".$nilai."'>".$md."</option>
		";
	}
	echo "
						</select>
					</div>
				
				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='JumlahPenduduk'>2. Jumlah Penduduk</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='JumlahPenduduk' id='JumlahPenduduk' placeholder='Jumlah Penduduk' value='' />
							<span class='input-group-addon'>Jiwa</span>
						</div>
					</div>

				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='PersainganToko'>3. Persaingan Toko Lain</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='PersainganToko' id='PersainganToko' placeholder='Persaingan Toko Lain' value='' />
							<span class='input-group-addon'>Toko</span>
						</div>
					</div>
				
				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='BanyakCalonPembeli'>4. Banyak Calon Pembeli</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='BanyakCalonPembeli' id='BanyakCalonPembeli' placeholder='Banyak Calon Pembeli' value='' />
							<span class='input-group-addon'>Calon Pembeli</span>
						</div>
					</div>

				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='Keamanan'>5. Keamanan</label>
						<select class='form-control input-sm' name='Keamanan' id='Keamanan'>
	";
	foreach($_SESSION['rc']['Keamanan'] as $aman => $nilai){
		echo "
			<option value='".$nilai."'>".$aman."</option>
		";
	}
	echo "
						</select>
					</div>

				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='LuasTempat'>6. Luas Tempat</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='LuasTempat' id='LuasTempat' placeholder='Luas Tempat' value='' />
							<span class='input-group-addon'>m<sup>2</sup></span>
						</div>
					</div>

					<div class='form-group'>
						<input type='submit' name='CreateAlternatif' value='Submit' class='btn btn-primary' />
						<input type='reset' name='Reset' value='Reset' class='btn btn-default' />
					</div>
				</div>
			</div>
		</form>
	";
}

//Update data alternatif
function update_data_alternatif(){
	//is there data table and id for update ?
	if(!isset($_SESSION['data_alternatif']) && !isset($_GET['id'])){
		redirect(base_url());
	}

	//is there offset array ?
	$row  = $_GET['id'];
	$last = end(array_keys($_SESSION['data_alternatif']));
	if(!($row >= 0 && $row <= $last)){
		redirect(base_url());
	}

	//fetch data	
	$data = array(
		"ND" => $_SESSION['data_alternatif'][$row]['NamaDaerah'],
		"C1" => $_SESSION['data_alternatif'][$row]['C1'],
		"C2" => $_SESSION['data_alternatif'][$row]['C2'],
		"C3" => $_SESSION['data_alternatif'][$row]['C3'],
		"C4" => $_SESSION['data_alternatif'][$row]['C4'],
		"C5" => $_SESSION['data_alternatif'][$row]['C5'],
		"C6" => $_SESSION['data_alternatif'][$row]['C6']
	);
	
	//store fetch data to form
	echo "
		<form action='".base_url('page/aksi_proses_spk.php?act=update')."' method='POST'>
			<div class='panel panel-default'>
				<div class='panel-heading'>Update Data Alternatif</div>
				<div class='panel-body'>
				<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='ID'>ID Row</label>
						<input type='text' class='form-control input-sm' name='ID' id='ID' placeholder='ID' value='".$row."' readonly='readonly' />
					</div>

				<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='NamaDaerah'>Nama Daerah</label>
						<input type='text' class='form-control input-sm' name='NamaDaerah' id='NamaDaerah' placeholder='Nama Daerah' value='".$data['ND']."' />
					</div>

				<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='MudahDijangkau'>1. Mudah Dijangkau</label>
						<select class='form-control input-sm' name='MudahDijangkau' id='MudahDijangkau'>
	";
	foreach($_SESSION['rc']['MudahDijangkau'] as $md => $nilai){
		if($data['C1'] == $nilai){
			echo "
				<option value='".$nilai."' selected='selected'>".$md."</option>
			";
		} else {
			echo "
				<option value='".$nilai."'>".$md."</option>
			";
		}
	}
	echo "
						</select>
					</div>
				
				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='JumlahPenduduk'>2. Jumlah Penduduk</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='JumlahPenduduk' id='JumlahPenduduk' placeholder='Jumlah Penduduk' value='".$data['C2']."' />
							<span class='input-group-addon'>Jiwa</span>
						</div>
					</div>

				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='PersainganToko'>3. Persaingan Toko Lain</label>
						<div class='input-group'>
						<input type='text' class='form-control input-sm' name='PersainganToko' id='PersainganToko' placeholder='Persaingan Toko Lain' value='".$data['C3']."' />
						<span class='input-group-addon'>Toko</span>
						</div>
					</div>
				
				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='BanyakCalonPembeli'>4. Banyak Calon Pembeli</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='BanyakCalonPembeli' id='BanyakCalonPembeli' placeholder='Banyak Calon Pembeli' value='".$data['C4']."' />
							<span class='input-group-addon'>Calon Pembeli</span>
						</div>
					</div>

				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='Keamanan'>5. Keamanan</label>
						<select class='form-control input-sm' name='Keamanan' id='Keamanan'>
	";
	foreach($_SESSION['rc']['Keamanan'] as $aman => $nilai){
		if($data['C5'] == $nilai){
			echo "
				<option value='".$nilai."' selected='selected'>".$aman."</option>
			";
		} else {
			echo "
				<option value='".$nilai."'>".$aman."</option>
			";
		}
	}
	echo "
						</select>
					</div>

				<!--
					========================================================
				-->		
					<div class='form-group'>
						<label for='LuasTempat'>6. Luas Tempat</label>
						<div class='input-group'>
							<input type='text' class='form-control input-sm' name='LuasTempat' id='LuasTempat' placeholder='Luas Tempat' value='".$data['C6']."' />
							<span class='input-group-addon'>m<sup>2</sup></span>
						</div>
					</div>

					<div class='form-group'>
						<input type='submit' name='UpdateAlternatif' value='Submit' class='btn btn-primary' />
						<input type='reset' name='Reset' value='Reset' class='btn btn-default' />
						<a href='".base_url()."' class='btn btn-default'>Kembali</a>
					</div>
				</div>
			</div>
		</form>
	";
}

//Control data alternatif form
function form_control_data(){
	$act = isset($_GET['act']) ? $_GET['act'] : "";

	if($act == "update"){
		update_data_alternatif();
	} else {
		tambah_data_alternatif();
	}
}

//Result Decission
function hasil_keputusan(){
	if(isset($_SESSION['hasil_keputusan']) && isset($_SESSION['data_alternatif'])){
		$row 		= $_SESSION['hasil_keputusan']['row']+1;
		$namadaerah = $_SESSION['data_alternatif'][$row-1]['NamaDaerah'];
	} else {
		$row 		= "";
		$namadaerah = ""; 
	}

	echo "
		<form>
			<div class='panel panel-default'>
				<div class='panel-heading'>Hasil Keputusan</div>
				<div class='panel-body'>
				<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='KRow'>Alternatif Nomor</label>
						<input type='text' class='form-control' name='KRow' id='KRow' value='".$row."' readonly='readonly' />
					</div>

				<!--
					========================================================
				-->	
					<div class='form-group'>
						<label for='KNamaDaerah'>Nama Daerah</label>
						<input type='text' class='form-control' name='KNamaDaerah' id='KNamaDaerah' value='".$namadaerah."' readonly='readonly' />
					</div>
				</div>
			</div>
		</form>
	";
}

//Button Decission proses and clear data
function panel_button_process(){
	echo "
		<form>
		<div class='panel panel-default'>
			<div class='panel-heading'>Tombol Proses</div>
			<div class='panel-body'>
				<div class='form-group'>
					<a href='".base_url('page/aksi_proses_spk.php?act=cleardata&sure=1')."' class='btn btn-danger btn-block'>Hapus Semua Data</a>
				</div>

				<div class='form-group'>
					<a href='".base_url('page/aksi_proses_spk.php?act=proses_spk&sure=1')."' class='btn btn-primary btn-block'>Hasilkan Keputusan</a>
				</div>
			</div>
		</div>
		</form>
	";
}

//Criteria Weight Information
function informasi_bobot_criteria(){
	$criterias = array(
		"Mudah Dijangkau :"			=> $_SESSION['weight_criteria']['C1'],
		"Jumlah Penduduk :" 		=> $_SESSION['weight_criteria']['C2'],
		"Persaingan Toko Lain :" 	=> $_SESSION['weight_criteria']['C3'],
		"Banyak Calon Pembeli :" 	=> $_SESSION['weight_criteria']['C4'],
		"Keamanan :" 				=> $_SESSION['weight_criteria']['C5'],
		"Luas Tempat :" 			=> $_SESSION['weight_criteria']['C6']
	);

	echo "
		<div class='panel panel-default'>
			<div class='panel-heading'>Informasi Bobot Kriteria</div>
			<div class='panel-body'>
				<ol>
	";
	foreach($criterias as $criteria => $bobot){
		echo "
					<li>".$criteria." ".$bobot."</li>
		";
	}
	echo "
				</ol>
			</div>
		</div>
	";
}
?>

<div class='row'>
	<div class='col-sm-4 col-md-4'><?php form_control_data(); ?></div>
	<div class='col-sm-3 col-md-3'><?php hasil_keputusan(); ?></div>
	<div class='col-sm-2 col-md-2'><?php panel_button_process(); ?></div>
	<div class='col-sm-3 col-md-3'><?php informasi_bobot_criteria(); ?></div>
</div>

<div class='row'>
	<div class='col-sm-12 col-md-12 data-table'><?php fetch_data(); ?></div>
</div>