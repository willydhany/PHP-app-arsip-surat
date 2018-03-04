<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<h1>Disposisi</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Disposisi-Data"><strong>Disposisi</strong></a> / Tambah Disposisi</P>
<hr>
<?php
if (isset($_POST['btnSimpan'])) {
  $id_disposition = $_POST['id_disposition'];
  $disposition_at = $_POST['disposition_at'];
  $reply_at = $_POST['reply_at'];
  $description = $_POST['description'];
  $notification = $_POST['notification'];
  $id_mail = $_POST['id_mail'];
  $disposisi = $_POST['disposisi'];
  $id_user = $_POST['id_user'];

  # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
	$pesanError = array();
	if (trim($reply_at)=="") {
		$pesanError[] = "Data <b>Disposisi Oleh</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($description)=="") {
		$pesanError[] = "Data <b>Deskripsi</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($notification)=="") {
		$pesanError[] = "Data <b>Tanggapan</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	
	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>';
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
				echo "&nbsp;&nbsp;  $pesan_tampil<br>";	
			} 
		echo "</p></div> <br>"; 
	}
	else {

	 	mysql_query("UPDATE mail SET disposisi='$disposisi' WHERE id_mail='$id_mail'");
		mysql_query("INSERT INTO disposition VALUES('$id_disposition','$disposition_at','$reply_at','$description','$notification','$id_mail','$id_user')");
 	 	echo "<meta http-equiv='refresh' content='0; url=?page=Disposisi-Data&pesan=input'>";
 	 	exit;
	}
}
$data1	= isset($_POST['reply_at']) ? $_POST['reply_at'] : '';
$data2	= isset($_POST['description']) ? $_POST['description'] : '';	
$data3	= isset($_POST['notification']) ? $_POST['notification'] : '';
?>


	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-horizontal" role="form" style="margin:auto;">
	    <?php
			$carikode = mysql_query("select max(id_disposition) from disposition") or die (mysql_error());
			  // menjadikannya array
			  $datakode = mysql_fetch_array($carikode);
			  // jika $datakode
			  if ($datakode) {
			   $nilaikode = substr($datakode[0], 1);
			   // menjadikan $nilaikode ( int )
			   $kode = (int) $nilaikode;
			   // setiap $kode di tambah 1
			   $kode = $kode + 1;
			   $kode_otomatis = "D".str_pad($kode, 4, "0", STR_PAD_LEFT);
			  } else {
			   $kode_otomatis = "D";
			  }
		?>
		<?php
		$id_mail = $_GET['id'];
		$query_mysql = mysql_query("select * FROM mail WHERE id_mail='$id_mail'")or die(mysql_error());
		$data = mysql_fetch_array($query_mysql)
		?>
		<div class="form-group">
	      <label class="control-label col-sm-2" for="id_disposition">ID Surat :</label>
	      <div class="col-sm-3">
	        <input type="text" class="form-control" name="id_mail" id="id_disposition" value="<?php echo $id_mail;?>" readonly>
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
	        <input type="text" class="form-control" name="id_disposition" id="id_disposition" value="<?php echo $kode_otomatis;?>" readonly>
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
	        <input type="text" class="form-control" name="reply_at" id="reply_at" value="<?php echo $data1; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="description">Deskripsi :</label>
	      <div class="col-sm-9">          
	        <textarea type="text" class="form-control" name="description" id="description"><?php echo $data2; ?></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="notification">Tanggapan :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="notification" id="notification" value="<?php echo $data3; ?>">
	        <input type="hidden" class="form-control" name="disposisi" value="2">
	        <input type="hidden" class="form-control" name="id_user" value="U0001">
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
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