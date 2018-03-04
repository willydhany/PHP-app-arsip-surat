<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<h1>Disposisi</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Disposisi-Data"><strong>Disposisi</strong></a> / Tambah Disposisi</P>
<hr>
<?php
if (isset($_POST['btnSimpan'])) {
	$id_disposition = $_POST['id_disposition'];
	$id_user = $_POST['id_user'];
  	$disposition_at = $_POST['disposition_at'];
  	$reply_at= $_POST['reply_at'];
  	$description = $_POST['description'];
  	$notification = $_POST['notification'];
	mysql_query("UPDATE disposition SET disposition_at='$disposition_at',reply_at='$reply_at',description='$description',notification='$notification',id_user='$id_user' WHERE id_disposition='$id_disposition'");
	echo "<meta http-equiv='refresh' content='0; url=?page=Disposisi-Data&pesan=update'>";
}
?> 

	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-horizontal" role="form" style="margin:auto;">
	<?php
	$id_disposition = $_GET['id'];
	$query_mysql = mysql_query("select a.*, b.mail_code,mail_subject,mail_from FROM disposition a inner join mail b using(id_mail) WHERE id_disposition='$id_disposition'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){
	?>
		<div class="form-group">
	      <label class="control-label col-sm-2" for="id_disposition">ID Surat :</label>
	      <div class="col-sm-3">
	        <input type="text" class="form-control" name="id_mail" id="id_disposition" value="<?php echo $data['id_mail'];?>" readonly>
	      </div>
	      <label class="control-label col-sm-2" for="id_disposition">Kode Surat :</label>
	      <div class="col-sm-4">
	        <input type="text" class="form-control" name="mail_code" id="mail_code" value="<?php echo $data['mail_code'];?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="id_disposition">Asal Surat :</label>
	      <div class="col-sm-3">
	        <input type="text" class="form-control" name="mail_from" id="mail_from" value="<?php echo $data['mail_from']; ?>" readonly>
	      </div>
	      <label class="control-label col-sm-2" for="id_disposition">Judul Surat :</label>
	      <div class="col-sm-4">
	        <input type="text" class="form-control" name="mail_subject" id="mail_subject" value="<?php echo $data['mail_subject']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="id_disposition">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_disposition" id="id_disposition" value="<?php echo $data['id_disposition']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="dtp_input1">Tanggal Disposisi :</label>
	      <div class="col-sm-9">          
	        <div class="input-group date form_date col-sm-4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
	                    <input class="form-control" type="text" value="<?php echo date('Y-m-d') ?>" name="disposition_at">
	     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	     				<input type="hidden" id="dtp_input1" value=""/>
	      	</div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="reply_at">Disposisi Oleh :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="reply_at" id="reply_at" value="<?php echo $data['reply_at']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="description">Deskripsi :</label>
	      <div class="col-sm-9">          
	        <textarea type="text" class="form-control" name="description" id="description"><?php echo $data['description']; ?></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="notification">Tanggapan :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="notification" id="notification" value="<?php echo $data['notification']; ?>">
	        <input type="hidden" class="form-control" name="id_user" value="U0001">
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
	    <?php } ?>
	</form>
	<br><br><br><br>
	
	<script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	<script type="text/javascript">
	 $('.form_date').datetimepicker({
	        language:  'id',
	        weekStart: 1,
	        todayBtn:  1,
	  autoclose: 1,
	  todayHighlight: 1,
	  startView: 2,
	  minView: 2,
	  forceParse: 0
	    });
	</script>