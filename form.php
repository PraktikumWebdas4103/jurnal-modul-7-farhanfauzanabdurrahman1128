<?php 
	$host	= 'localhost';
	$user	= 'root';
	$pass	= '';
	$dbName	= 'mahasiswa';

	$conn = mysqli_connect($host, $user, $pass, $dbName);

	if (!$conn) {
		die("Gagal terhubung dengan database: " . mysqli_connect_error());
	}

	if (isset($_POST['save'])) {
		$nama		= $_POST['nama'];
		$nim		= $_POST['nim'];
		$jenisKel	= $_POST['jenisKel'];
		$prodi		= $_POST['prodi'];
		$fakultas	= $_POST['fakultas'];
		$asal    	= $_POST['asal'];
		$moto	    = $_POST['moto'];

		$err = $erNama = $erNim = $erAsal = $erMoto = '';

		if (empty($nama) || empty($nim) || empty($asal) || empty($moto)) { $err = 'Isi Data Terlebih Dahulu'; }

		if (empty($nama)) { $erNama = 'Nama Tidak Boleh Kosong'; }

		if (empty($nim)) { $erNim = 'NIM Tidak Boleh Kosong'; }

		if (empty($asal)) { $erUser = 'Asal Daerah Tidak Boleh Kosong'; }

		if (empty($moto)) { $erMoto = 'Moto Hidup Tidak Boleh Kosong'; }

		if (empty($err)) { 
			$sql = "INSERT INTO datamahasiswa (nama, nim, jenisKel, prodi, fakultas, asal, motohidup) VALUES ('$nama','$nim','$jenisKel', '$prodi', '$fakultas','$asal', '$moto')";
			$query = mysqli_query($conn, $sql);

			if ($query) {
				echo "* Data Berhasil Disimpan";
					}else{
				echo "<span class='red'>* Data Gagal Disimpan. Pastikan NIM tidak pernah didaftarkan".mysqli_connect_error()."</span>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<style>
	.red {
		font-size: 10pt;
		color: red;
	}
	td { vertical-align: top; padding: 5px;}
	table {
		margin: auto;
		width: 30%;
		border-collapse: collapse;
		border: 1px solid #888;
	}
	.save {
		width: 100%;
		height: 30px;
	}
</style>
<body>
	<form action="" method="POST">
		<table>
			<tr>
				<td colspan="3" align="center"><h2>Data Mahasiswa<h2></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td>
					<input type="text" name="nama"><br>
					<span class="red"><?php if(isset($erNama)){ echo $erNama; } ?></span>
				</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td>
					<input type="text" name="nim"><br>
					<span class="red"><?php if(isset($erNim)){ echo $erNim; } ?></span>
				</td>
			</tr>
			<tr>
				<td valign="top">Kelas</td>
				<td valign="top">:</td>
				<td>
					<input type="hidden" name="kelas" checked>
					<input type="radio" name="kelas" value="D3 MI 41-01">D3 MI 41-01<br>
					<input type="radio" name="kelas" value="D3 MI 41-02">D3 MI 41-02<br>
					<input type="radio" name="kelas" value="D3 MI 41-03">D3 MI 41-03<br>
					<input type="radio" name="kelas" value="D3 MI 41-04">D3 MI 41-04<br>

				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<input type="hidden" name="jenisKel" checked>
					<input type="radio" name="jenisKel" value="Pria">Pria
					<input type="radio" name="jenisKel" value="Wanita">Wanita<br>
					
				</td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td>
					<select name="prodi">
						<option value="">Pilih Program Studi</option>
						<option value="D3 Teknologi Telekomunikasi">D3 Teknologi Telekomunikasi</option>
						<option value="D3 Rekayasa Perangkat Lunak Aplikasi">D3 Rekayasa Perangkat Lunak Aplikasi</option>
						<option value="D3 Sistem Informasi">D3 Sistem Informasi</option>
						<option value="D3 Sistem Informasi Akuntansi">D3 Sistem Informasi Akuntansi</option>
						<option value="D3 Teknologi Komputer">D3 Teknologi Komputer</option>
						<option value="D3 Manajemen Pemasaran">D3 Manajemen Pemasaran</option>
						<option value="D3 Perhotelan">D3 Perhotelan</option>
						<option value="S1 Teknologi Rekayasa Multimedia">S1 Teknologi Rekayasa Multimedia</option>
					</select><br>
				</td>
			</tr>			<tr>
				<td>Fakultas</td>
				<td>:</td>
				<td>
					<select name="fakultas">
						<option value="">Pilih Fakultas</option>
						<option value="FIT">Fakultas Ilmu Terapan</option>
						<option value="FKB">Fakultas Komunikasi Bisnis</option>
						<option value="FEB">Fakultas Ekonomi Bisnis</option>
						<option value="FIK">Fakultas Industri Kreatif</option>
						<option value="FIF">Fakultas Informatika</option>
						<option value="FTE">Fakultas Teknik Elektri</option>
						<option value="FRI">Fakultas Rekayasa Industri</option>
					</select><br>
				</td>
			</tr>
			<tr>
				<td>Asal</td>
				<td>:</td>
				<td>
					<input type="text" name="asal">
				</td>
			</tr>
			<tr>
				<td>Moto Hidup</td>
				<td>:</td>
				<td>
					<input type="textarea" name="moto">
				</td>
			</tr>
			<tr>
		
			<tr>
				<td colspan="3">
					<br>
					<input type="submit" name="save" value="Input" class="save"><br>
					<span class="red"><b><u><?php if(isset($err)){ echo $err; } ?></b></u></span>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<button class="save" formaction="lihatdata.php">Lihat Data</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
