<h1>Tambah Jenis Surat</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=Jenis-Data"><strong>Jenis Surat</strong></a> / Tambah Jenis Surat</P>
<hr>
<?php
if (isset($_POST['btnSimpan'])) {
  $id_mail_type = $_POST['id_mail_type'];
  $type = $_POST['type'];

  # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
	$pesanError = array();
	if (trim($type)=="") {
		$pesanError[] = "Data <b>Jenis</b> tidak boleh kosong, silahkan diperbaiki !";		
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
	  mysql_query("INSERT INTO mail_type VALUES('$id_mail_type','$type')");

	  /*header("location:?page=Jenis-Data&pesan=input");*/
	  echo "<meta http-equiv='refresh' content='0; url=?page=Jenis-Data&pesan=input'>";
	  exit;
	}
}
$datajenis	= isset($_POST['type']) ? $_POST['type'] : '';
?>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" style="margin:auto;">
	    <?php
			$carikode = mysql_query("select max(id_mail_type) from mail_type") or die (mysql_error());
			  // menjadikannya array
			  $datakode = mysql_fetch_array($carikode);
			  // jika $datakode
			  if ($datakode) {
			   $nilaikode = substr($datakode[0], 1);
			   // menjadikan $nilaikode ( int )
			   $kode = (int) $nilaikode;
			   // setiap $kode di tambah 1
			   $kode = $kode + 1;
			   $kode_otomatis = "J".str_pad($kode, 4, "0", STR_PAD_LEFT);
			  } else {
			   $kode_otomatis = "J";
			  }
		?>
	    <div class="form-group">
	      <label class="control-label col-sm-2">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_mail_type" value="<?php echo $kode_otomatis;?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Jenis Surat :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="type" value="<?php echo $datajenis; ?>">
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
	</form>