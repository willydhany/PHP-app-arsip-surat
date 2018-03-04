<h1>Edit Jenis Surat</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Jenis-Data"><strong>Jenis Surat</strong></a> / Edit Jenis Surat</P>
<hr>
<?php
if (isset($_POST['btnUpdate'])) {
	$id_mail_type = $_POST['id_mail_type'];
  	$type = $_POST['type'];
	mysql_query("UPDATE mail_type SET type='$type' WHERE id_mail_type='$id_mail_type'");
	echo "<meta http-equiv='refresh' content='0; url=?page=Jenis-Data&pesan=update'>"
}
?> 
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" style="margin:auto;">
	<?php
	$id_mail_type = $_GET['id'];
	$query_mysql = mysql_query("select * FROM mail_type WHERE id_mail_type='$id_mail_type'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){
	?>
	    <div class="form-group">
	      <label class="control-label col-sm-2">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_mail_type" value="<?php echo $data['id_mail_type']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Jenis Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="type" value="<?php echo $data['type']; ?>">
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
	      </div>
	    </div>
	    <?php } ?>
	</form>