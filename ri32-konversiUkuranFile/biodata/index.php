<html>
<head>
	<title>Biodata Sahabat RI32</title>
</head>
<body>
	<form action="simpan.php" enctype="multipart/form-data" method="post" name="postform">      
	<table width="50%" border="0">
		<tr>
		  <td width="93">Nama Depan</td>
		  <td width="10">&nbsp;</td>
		  <td width="292"><input type="text" name="nama_depan" size="30"/></td>
		</tr>
		   <tr>
		  <td width="93">Nama Belakang</td>
		  <td width="10">&nbsp;</td>
		  <td width="292"><input type="text" name="nama_belakang" size="30"/></td>
		</tr>
		<tr>
		  <td>Email</td>
		  <td>&nbsp;</td>
		  <td><input type="text" name="email" size="30"/></td>
		</tr>
		<tr>
		  <td>Password</td>
		  <td>&nbsp;</td>
		  <td><input type="password" name="password" size="30"/></td>
		</tr>
		<tr>
		  <td>Kelamin</td>
		  <td>&nbsp;</td>
		  <td>
		  <select name="kelamin">
			<option value="pria">Pria
			<option value="wanita">Wanita
		  </select>
		  </td>
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
		  <td><input type="submit" name="submit" value="Submit" onClick="return confirm('Apakah Anda yakin?')" /></td>
		  <td>&nbsp;</td>
		  <td><a href="view_data.php">[View Biodata]</a></td>
		</tr>
	  </table>	  
	</form>

</body>
</html>