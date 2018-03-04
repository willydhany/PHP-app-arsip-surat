
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<h1>Tambah Surat Keluar</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Surat-Keluar-Data"><strong>Surat Keluar</strong></a> / Tambah Surat Keluar</P>
<hr>
<?php
if (isset($_POST['btnEdit'])) {
	$id_mail_out = $_POST['id_mail_out'];
	$outmail_at = $_POST['outmail_at'];
	$mail_code = $_POST['mail_code'];
	$mail_date = $_POST['mail_date'];
	$mail_to = $_POST['mail_to'];
	$mail_subject = $_POST['mail_subject'];
	$description = $_POST['description'];
	$file_upload = $_POST['file_upload'];
	$id_mail_type = $_POST['id_mail_type'];
	$id_user = $_POST['id_user'];

	mysql_query("UPDATE mail_out SET outmail_at='$outmail_at',mail_code='$mail_code',mail_date='$mail_date',mail_to='$mail_to',mail_subject='$mail_subject',description='$description',id_mail_type='$id_mail_type',id_user='$id_user' WHERE id_mail_out='$id_mail_out'");
	echo "<meta http-equiv='refresh' content='0; url=?page=Surat-Keluar-Data&pesan=update'>";
}
?> 
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-horizontal" role="form" style="margin:auto;">
	<?php
	$id_mail_out = $_GET['id'];
	$query_mysql = mysql_query("select a.*, b.type FROM mail_out a inner join mail_type b using(id_mail_type) WHERE id_mail_out='$id_mail_out'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){
	?>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="id_mail_out">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_mail_out" id="id_mail_out" value="<?php echo $data['id_mail_out']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="dtp_input1">Tanggal Keluar :</label>
	      <div class="col-sm-9">          
	        <div class="input-group date form_date col-sm-4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
	                    <input class="form-control" type="text" value="<?php echo $data['outmail_at']; ?>" name="outmail_at">
	     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	     				<input type="hidden" id="dtp_input1" value=""/>
	      	</div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_code">Kode Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_code" id="mail_code" value="<?php echo $data['mail_code']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Tanggal Surat :</label>
	      <div class="col-sm-9">          
	        <div class="input-group date form_date col-sm-4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
	                    <input class="form-control" type="text" value="<?php echo $data['mail_date']; ?>" name="mail_date">
	     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	     				<input type="hidden" id="dtp_input2" value=""/>
	      	</div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_to">Tujuan Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_to" id="mail_to" value="<?php echo $data['mail_to']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_subject">Judul Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_subject" id="mail_subject" value="<?php echo $data['mail_subject']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="description">Deskripsi :</label>
	      <div class="col-sm-9">          
	        <textarea type="text" class="form-control" name="description" id="description"><?php echo $data['description']; ?></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="file_upload">File Upload :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="file_upload" id="file_upload" value="<?php echo $data['file_upload']; ?>">

	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_type">Jenis Surat :</label>
	      <div class="col-sm-9">          
	        	<select  class="form-control" name="id_mail_type" id="mail_type">
	        		<option value="<?php echo $data['id_mail_type']; ?>"><?php echo $data['type']; ?></option>
		         	<?php
		  				$query = mysql_query("select * from mail_type");
		  				while($data = mysql_fetch_array($query)){
						echo"<option value=$data[id_mail_type]>$data[type]</option>";
						}
		  			?>
        	  	</select>
        	  	<input type="hidden" class="form-control" name="id_user" value="<?php echo $_SESSION['id_user']; ?>" >
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnEdit" class="btn btn-primary">Simpan</button>
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