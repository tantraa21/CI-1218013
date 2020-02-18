<html>
<head>
<title>View Biodata</title>
</head>
<body>
<?php
include "koneksi.php";
$query=mysql_query("select * from tbl_user");
?>
<center><a href="index.php">[Input Biodata]</a></center>
<br>
<table border="1" width="100%">
<tr bgcolor="#99CCFF">
  <th rowspan="2">Nomor</th>
  <th rowspan="2">Photo</th>
  <th colspan="2">Nama</th>
  <th rowspan="2">Kelamin</th>
  <th rowspan="2">Email</th>
  <th rowspan="2">Password</th>
  <th rowspan="2">Ukuran</th>
  <th rowspan="2">Type</th>
  <th rowspan="2">Edit</th>
</tr>
<tr bgcolor="#99CCCC">
	<th>Depan</th>
	<th>Belakang</th>
</tr>
<?php
while($row=mysql_fetch_array($query)){
	?>
	<tr>
		<td><?php echo $c=$c+1;?></td>
		<td><a href="./photo/<?php echo $row['photo'];?>" target="_blank"><img src="./photo/<?php echo $row['photo'];?>" width="100" height="100" title="<?php echo $row['photo'];?>"></a></td>
		<td><?php echo $row['nama_depan'];?></td>
		<td><?php echo $row['nama_belakang'];?></td>
		<td><?php echo ucwords($row['kelamin']);?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['password'];?></td>
		<td><?php echo formatBytes($row['ukuran'],0);?></td>
		<td><?php echo $row['type'];?></td>
		<td>
			<a href="delete.php?id_user=<?php echo $row['id_user'];?>" onClick="return confirm('Apakah Anda yakin?')">Delete</a> |
			<a href="edit.php?id_user=<?php echo $row['id_user'];?>">Edit</a>
		</td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>