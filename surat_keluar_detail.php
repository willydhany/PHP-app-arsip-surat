
<?php
	$id_mail_out = $_GET['id'];
	$query_mysql = mysql_query("select a.*, b.type FROM mail_out a inner join mail_type b using(id_mail_type) WHERE id_mail_out='$id_mail_out'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){
	?>
	<h1>Detail Surat Keluar</h1>
	<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Surat-Keluar-Data"><strong>Surat Masuk</strong></a> / Detail Surat Keluar ( <?php echo $data['mail_to']; ?> )</P>
	<hr>
	
	<div class="row" >
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
			<table class="table table-striped table-hover table-responsive"> 
			   <tbody>
			    <tr>
			      <td>ID</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['id_mail_out']; ?></td>
			    </tr>
			    <tr>
			      <td>Tanggal Diterima</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo date("d F Y", strtotime($data['outmail_at'])); ?></td>
			    </tr>
			    <tr>
			      <td>Kode Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_code']; ?></td>
			    </tr>
			    <tr>
			      <td>Tanggal Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo date("d F Y", strtotime($data['mail_date'])); ?></td>
			    </tr>
			    <tr>
			      <td>Tujuan Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_to']; ?></td>
			    </tr>
			    <tr>
			      <td>Judul Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_subject']; ?></td>
			    </tr>
			    <tr>
			      <td>Deskripsi</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['description']; ?></td>
			    </tr>
			    <tr>
			      <td>File Upload</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['file_upload']; ?></td>
			    </tr>
			    <tr>
			      <td>Jenis Surat</td>
			      <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['type']; ?></td>
			    </tr>
			  </tbody>
			  
			</table>	
			<a href="laporan_keluar_detail.php?id=<?php echo $data['id_mail_out']; ?>" target="_blank" class="btn btn-warning" target="_blank"><i class="fa fa-print fa"></i> Cetak</a>	
		</div>
		<div class="col-md-1">
			
		</div>
		<?php } ?>
	</div>
	
	
	<br><br><br><br>
	