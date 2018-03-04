
<?php
	$id_disposition = $_GET['id'];
	$query_mysql = mysql_query("select a.*, b.mail_code,mail_subject,mail_from FROM disposition a inner join mail b using(id_mail) WHERE id_disposition='$id_disposition'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){
	?>
	<h1>Detail Disposisi</h1>
	<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Surat-Keluar-Data"><strong>Disposisi</strong></a> / Detail Disposisi ( <?php echo $data['mail_from']; ?> )</P>
	<hr> 
	
	<div class="row" >
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
			<table class="table table-striped table-hover table-responsive"> 
			   <tbody>
			    <tr>
			      <td>ID Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['id_mail'];?></td>
			    </tr>
			    <tr>
			      <td>Kode Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_code'];?></td>
			    </tr>
			    <tr>
			      <td>Asal Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_from']; ?></td>
			    </tr>
			    <tr>
			      <td>Judul Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_subject']; ?></td>
			    </tr>
			    <tr>
			      <td>ID</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['id_disposition']; ?></td>
			    </tr>
			    <tr>
			      <td>Tanggal Disposisi</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo date("d F Y", strtotime($data['disposition_at'])); ?></td>
			    </tr>
			    
			    <tr>
			      <td>Disposisi Oleh</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['reply_at']; ?></td>
			    </tr>
			    <tr>
			      <td>Deskripsi</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['description']; ?></td>
			    </tr>
			    <tr>
			      <td>Tanggapan</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['notification']; ?></td>
			    </tr>
			  </tbody>
			  
			</table>	
			<a href="laporan_disposisi_detail.php?id=<?php echo $data['id_disposition']; ?>" target="_blank" class="btn btn-warning" target="_blank"><i class="fa fa-print fa"></i> Cetak</a>	
		</div>
		<div class="col-md-1">
			
		</div>
		<?php } ?>
	</div>
	
	
	<br><br><br><br>
	