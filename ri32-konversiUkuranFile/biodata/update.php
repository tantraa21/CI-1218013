<?php
include "koneksi.php";
if(isset($_POST['submit'])){

	$id_user=$_POST['id_user'];
	$nama_depan=addslashes(htmlentities(ucwords($_POST['nama_depan'])));
	$nama_belakang=addslashes(htmlentities(ucwords($_POST['nama_belakang'])));
	$email=addslashes(htmlentities($_POST['email']));
	
	$kelamin=$_POST['kelamin'];
	$photo_lama=$_POST['photo_lama'];
	$nama_photo=$_FILES['photo']['name'];
	
	if(empty($_POST['password'])){
		$password=$_POST['password_lama'];
	}else{
		$password=$_POST['password'];
	}
		
	if(empty($nama_depan) || empty($nama_belakang) || empty($email)){
		echo "Maaf, Form belum lengkap!!";
		?><a href=edit.php?id_user=<?php echo $id_user;?>> Silahkan ulangi</a><?php
	}else{  
		$query_email=mysql_query("select * from tbl_user where email='$email' and id_user<>'$id_user'");
		$cek=mysql_num_rows($query_email);
		if($cek>0){
			echo "Maaf, Email sudah dipakai!!</a>";
			?><a href=edit.php?id_user=<?php echo $id_user;?>> Silahkan ulangi</a><?php
		}else{
		
			if(empty($_FILES['photo']['name'])){
				$nama_file_upload=$photo_lama;
				$type=$_POST['type'];
				$ukuran=$_POST['ukuran'];				
				$query=mysql_query("update tbl_user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',email='$email',password='$password',photo='$nama_file_upload',kelamin='$kelamin',ukuran='$ukuran',type='$type' where id_user='$id_user'");
			}else{				
				$type=$_FILES['photo']['type'];
				$ukuran=$_FILES['photo']['size'];		
				$uploaddir='./photo/';
				$rnd=date(His);				
				$nama_file_upload=$rnd.'-'.$nama_photo;
				$alamatfile=$uploaddir.$nama_file_upload;
				
				if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
						echo "File Yang Di izinkan Hanya jpg,jpeg,png,gif!!</a>";
						?><a href=edit.php?id_user=<?php echo $id_user;?>> Silahkan ulangi</a><?php
				}else{
					if($ukuran>1000000){
						echo "File Yang Di izinkan Hanya berukuran kurang dari 1MB!!</a>";
						?><a href=edit.php?id_user=<?php echo $id_user;?>> Silahkan ulangi</a><?php
					}else{				
						unlink("./photo/".$photo_lama);
						$upload=move_uploaded_file($_FILES['photo']['tmp_name'],$alamatfile);
						$query=mysql_query("update tbl_user set nama_depan='$nama_depan',nama_belakang='$nama_belakang',email='$email',password='$password',photo='$nama_file_upload',kelamin='$kelamin',ukuran='$ukuran',type='$type' where id_user='$id_user'");
					}
				}
			}
			
			if($query){
				echo "Data Anda berhasil disimpan <a href=view_data.php> View Data</a>";
			}else{
				echo mysql_query();
			}
		}
	}
}else{
	unset($_POST['submit']);
}
?>