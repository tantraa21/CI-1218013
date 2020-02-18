<html>
<head>
	<title>Biodata Sahabat RI32</title>
</head>
<body>
	<?php
	include "koneksi.php";
	$id_user=$_GET['id_user'];
	$row=mysql_fetch_array(mysql_query("select * from tbl_user where id_user='$id_user'"));

	$nama_depan=$row['nama_depan'];
	$nama_belakang=$row['nama_belakang'];
	$email=$row['email'];
	$kelamin=$row['kelamin'];
	$password=$row['password'];
	$photo=$row['photo'];
	$ukuran=$row['ukuran'];
	$type=$row['type'];
	?>
	
	<form action="update.php" enctype="multipart/form-data" method="post" name="postform">
	
	<input type="hidden" name="id_user" value="<?php echo $id_user;?>" />
    <input type="hidden" name="password_lama" value="<?php echo $password;?>" />
    <input type="hidden" name="photo_lama" value="<?php echo $photo?>" />
	<input type="hidden" name="ukuran" value="<?php echo $ukuran;?>" />
    <input type="hidden" name="type" value="<?php echo $type?>" />
	
    <img src="./photo/<?php echo $photo;?>" width="100" height="100">
	<table width="100%" border="0">
    <tr>
      <td width="115">Nama Depan</td>
      <td width="1">&nbsp;</td>
      <td width="851"><input type="text" name="nama_depan" value="<?php echo $nama_depan; ?>" size="30"/></td>
    </tr>
      <tr>
      <td width="115">Nama Belakang</td>
      <td width="1">&nbsp;</td>
      <td width="851"><input type="text" name="nama_belakang" value="<?php echo $nama_belakang; ?>" size="30"/></td>
    </tr>
	<tr>
      <td>Kelamin</td>
      <td>&nbsp;</td>
      <td>
      <select name="kelamin">
        <option value="pria" <?php if($kelamin=='pria'){ echo "selected='selected'";} ?>>Pria
        <option value="wanita" <?php if($kelamin=='wanita'){ echo "selected='selected'";} ?>>Wanita
      </select>
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>&nbsp;</td>
      <td><input type="text" name="email" value="<?php echo $email; ?>" size="30"/></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><i><font color="#CCCCCC">*kosongkan password jika tidak diubah</font></i></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>&nbsp;</td>
      <td><input type="password" name="password" size="30"/></td>
    </tr>   
    <tr>
      <td></td>
      <td></td>
      <td><i><font color="#CCCCCC">*kosongkan photo jika tidak diubah </font></i></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td>&nbsp;</td>
      <td><input type="file" name="photo" size="30"/></td>
  	</tr>
    <tr>
      <td colspan="3"><p></p></td>
    </tr>
    <tr>
      <td><input type="submit" name="submit"  value="Update" onclick="return confirm('Apakah Anda yakin akan mengubah data?')"/></td>
      <td>&nbsp;</td>
	  <td><a href="view_data.php">[View Biodata]</a></td>
	</tr>
    </table>
	  
	</form>

</body>
</html>