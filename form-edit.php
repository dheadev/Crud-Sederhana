<?php
include 'koneksi.php';
$data_edit = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '".$_GET['nim']."'");
$result = mysqli_fetch_array($data_edit);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Edit Data</title>
</head>
<body>
	<h2>Edit Data Mahasiswa</h2>
	<a href="index.php" style="padding: 0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Data Mahasiswa</a><br><br>
	<form action="" method="POST">
		<table>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim" value=" <?php echo $result['nim'] ?>" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $result['nama'] ?>" required></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telp" value="<?php echo $result['telepon'] ?>" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="email" name="email" value="<?php echo $result['email'] ?>" required></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td>
				<select name="jurusan">
					<option value="<?php echo $result['jurusan'] ?>"><?php echo $result['jurusan'] ?></option>
					<option value="Sistem Informasi">Sistem Informasi</option>
					<option value="Teknik Informatika">Teknik Informatika</option>
				</select>
				</td>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php
	if(isset($_POST['edit'])){
		$update = mysqli_query($conn, "UPDATE mahasiswa SET nama = '".$_POST['nama']."'), telepon = '".$_POST['telp']."', email = '".$_POST['email']."', jurusan = '".$_POST['jurusan']."' 
			WHERE nim = '".$_GET['nim']."'");
		if($update){
			echo 'berhasil edit';
		}else{
			echo 'gagal edit';
		}
	}
	?>
</body>
</html>
