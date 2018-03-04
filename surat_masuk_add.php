
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<h1>Tambah Surat Masuk</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Surat-Masuk-Data"><strong>Surat Masuk</strong></a> / Tambah Surat Masuk</P>
<hr>
<?php
if (isset($_POST['btnUpload'])) {
  $id_mail = $_POST['id_mail'];
  $incoming_at = $_POST['incoming_at'];
  $mail_code = $_POST['mail_code'];
  $mail_date = $_POST['mail_date'];
  $mail_from = $_POST['mail_from'];
  $mail_to = $_POST['mail_to'];
  $mail_subject = $_POST['mail_subject'];
  $description = $_POST['description'];
  $id_mail_type = $_POST['id_mail_type'];
  $id_user = $_POST['id_user'];
  $disposisi = 1;

  $ekstensi_diperbolehkan = array('png','jpg','doc','docx','gif','cdr');
  $file_upload = $_FILES['file']['name'];
  $x = explode('.', $file_upload);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];

  # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
	$pesanError = array();
	if (trim($mail_code)=="") {
		$pesanError[] = "Data <b>Kode Surat</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($mail_from)=="") {
		$pesanError[] = "Data <b>Asal Surat</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($mail_to)=="") {
		$pesanError[] = "Data <b>Tujuan Surat</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($mail_subject)=="") {
		$pesanError[] = "Data <b>Juduls Surat</b> tidak boleh kosong, silahkan diperbaiki !";		
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

	  if (in_array($ekstensi, $ekstensi_diperbolehkan) == true || $file_upload == 0) {
	  	if ($ukuran < 2088140) {
	  		move_uploaded_file($file_tmp, 'upload/'.$file_upload);
	  		$query = mysql_query("INSERT INTO mail VALUES( '$id_mail','$incoming_at','$mail_code','$mail_date','$mail_from','$mail_to','$mail_subject','$description','$file_upload','$id_mail_type','$disposisi','$id_user')") or die (mysql_error());
	  		if ($query) {
	  			
	  			/*header('Location:?page=Surat-Masuk-Data&pesan=input');*/
	  			echo "<meta http-equiv='refresh' content='0; url=?page=Surat-Masuk-Data&pesan=input'>";
	  			
	  		} else {
	  			echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data <b>File Upload</b> gagal di upload, silahkan diperbaiki !</div> <br> <center><a href="?page=Surat-Masuk-Data" class="btn btn-primary" >Kembali</a></center>';
	  		}
	  	} else {
	  		echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data <b>File Upload</b> terlalu besar, silahkan diperbaiki !</div> <br> <center><a href="?page=Surat-Masuk-Data" class="btn btn-primary" >Kembali</a></center>';
	  	}
	  } else {
	  	echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data <b>File Upload</b> tidak sesuai ekstensi, silahkan diperbaiki !</div> <br> <center><a href="?page=Surat-Masuk-Data" class="btn btn-primary" >Kembali</a></center>';
	  }
	  exit;
	}
}
$datamailcode	= isset($_POST['mail_code']) ? $_POST['mail_code'] : '';
$datamailfrom	= isset($_POST['mail_from']) ? $_POST['mail_from'] : '';
$datamailto	= isset($_POST['mail_to']) ? $_POST['mail_to'] : '';
$datamailsubject	= isset($_POST['mail_subject']) ? $_POST['mail_subject'] : '';
?>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="form-horizontal" role="form" style="margin:auto;">
	    <?php
			$carikode = mysql_query("select max(id_mail) from mail") or die (mysql_error());
			  // menjadikannya array
			  $datakode = mysql_fetch_array($carikode);
			  // jika $datakode
			  if ($datakode) {
			   $nilaikode = substr($datakode[0], 1);
			   // menjadikan $nilaikode ( int )
			   $kode = (int) $nilaikode;
			   // setiap $kode di tambah 1
			   $kode = $kode + 1;
			   $kode_otomatis = "M".str_pad($kode, 4, "0", STR_PAD_LEFT);
			  } else {
			   $kode_otomatis = "M";
			  }
		?>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="id_mail">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_mail" id="id_mail" value="<?php echo $kode_otomatis;?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="dtp_input1">Tanggal Diterima :</label>
	      <div class="col-sm-9">          
	        <div class="input-group date form_date col-sm-4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
	                    <input class="form-control" type="text" value="<?php echo date('Y-m-d') ?>" name="incoming_at">
	     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	     				<input type="hidden" id="dtp_input1" value=""/>
	      	</div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_code">Kode Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_code" id="mail_code" value="<?php echo $datamailcode; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Tanggal Surat :</label>
	      <div class="col-sm-9">          
	        <div class="input-group date form_date col-sm-4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
	                    <input class="form-control" type="text" value="<?php echo date('Y-m-d') ?>" name="mail_date">
	     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	     				<input type="hidden" id="dtp_input2" value=""/>
	      	</div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_from">Asal Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_from" id="mail_from" value="<?php echo $datamailfrom; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_to">Tujuan Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_to" id="mail_to" value="<?php echo $datamailto; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_subject">Judul Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="mail_subject" id="mail_subject" value="<?php echo $datamailsubject; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="description">Deskripsi :</label>
	      <div class="col-sm-9">          
	        <textarea type="text" class="form-control" name="description" id="description"></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="file_upload">File Upload :</label>
	      <div class="col-sm-9">          
	        <input type="file" class="form-control" name="file" value="0" id="file_upload">

	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="mail_type">Jenis Surat :</label>
	      <div class="col-sm-9">          
	        	<select  class="form-control" name="id_mail_type" id="mail_type">
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
	        <button type="submit" name="btnUpload" class="btn btn-primary">Simpan</button>
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