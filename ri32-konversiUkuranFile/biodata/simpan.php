<?php
include "koneksi.php";
if(isset($_POST['submit'])){

	$nama_depan=addslashes(htmlentities(ucwords($_POST['nama_depan'])));
	$nama_belakang=addslashes(htmlentities(ucwords($_POST['nama_belakang'])));
	$email=addslashes(htmlentities($_POST['email']));
	$password=$_POST['password'];
	$kelamin=$_POST['kelamin'];

	$nama_photo=$_FILES['photo']['name'];
	$type = $_FILES['photo']['type'];
	$ukuran=$_FILES['photo']['size'];
	
	if(empty($nama_depan) || empty($nama_belakang) || empty($email) || empty($password) || empty($nama_photo)){
		echo "Maaf, Form belum lengkap!! <a href=index.php> Silahkan ulangi</a>";
	}else{  
		$query_email=mysql_query("select * from tbl_user where email='$email'");
		$cek=mysql_num_rows($query_email);
		if($cek>0){
			echo "Maaf, Email sudah dipakai!! <a href=index.php> Silahkan ulangi</a>";
		}else{
			if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
				echo "File Yang Di izinkan Hanya jpg,jpeg,png,gif!! <a href=index.php> Silahkan ulangi</a>";
			}else{
				if($ukuran>1000000){
					echo "File Yang Di izinkan Hanya berukuran kurang dari 1MB!! <a href=index.php> Silahkan ulangi</a>";
				}else{
					$uploaddir='./photo/';
					$rnd=date(His);				
					$nama_file_upload=$rnd.'-'.$nama_photo;
					$alamatfile=$uploaddir.$nama_file_upload;
					
					if (move_uploaded_file($_FILES['photo']['tmp_name'],$alamatfile))
					{
						$query=mysql_query("insert into tbl_user(nama_depan,nama_belakang,email,password,kelamin,photo,ukuran,type) 
									values('$nama_depan','$nama_belakang','$email','$password','$kelamin','$nama_file_upload','$ukuran','$type')");
							
						if($query){
							echo "Data Anda berhasil disimpan <a href=view_data.php> View Data</a>";
						}else{
							echo mysql_query();
						}
					}else{
						echo "<p>Proses upload gagal, kode error = " . $_FILES['location']['error']."</p>";
					}
				}
			}
		}
	}
}else{
	unset($_POST['submit']);
}
?>