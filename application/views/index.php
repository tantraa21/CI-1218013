<h2><?php echo $title; ?></h2>   


<table border='1' cellpadding='4'>     
	<tr>         

		<td><strong>nama</strong></td>         
		<td><strong>Nama Barang</strong></td>         
		<td><strong>Jumlah Pesanan</strong></td>     
	</tr> 
<?php foreach ($data_barang as $data_barang_item): ?>
	<tr> 
		  <td><?php echo $news_item['nama']; ?></td>            
		  <td><?php echo $news_item['text']; ?></td>             
		  <td>                 
		  	<a href="<?php echo site_url('data_barang/'.$data_barang_item['slug']); ?>">View</a> |                  
		  	<a href="<?php echo site_url('data_barang/edit/'.$data_barang_item['id']); ?>">Edit</a> |                 
		  	 <a href="<?php echo site_url('data_barang/delete/'.$barang_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>             
		  	</td>         
	</tr> 
<?php endforeach; ?> 
</table> 
 