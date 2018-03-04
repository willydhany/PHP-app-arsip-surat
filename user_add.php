<h1>Tambah User</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=User-Data"><strong>Panel User</strong></a> / Tambah User</P>
<hr>
<?php
if (isset($_POST['btnSimpan'])) {
  $id_user = $_POST['id_user'];
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  # VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
	$pesanError = array();
	if (trim($username)=="") {
		$pesanError[] = "Data <b>Username</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($fullname)=="") {
		$pesanError[] = "Data <b>Nama Lengkap</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($password)=="") {
		$pesanError[] = "Data <b>Password</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	if (trim($level)=="") {
		$pesanError[] = "Data <b>Level</b> tidak boleh kosong, silahkan diperbaiki !";		
	}
	$mySqluser  = "SELECT * FROM user WHERE username='".$username."'";
	$myQryuser  = mysql_query($mySqluser) or die ("Query Salah : ".mysql_error());
	$myDatauser = mysql_fetch_array($myQryuser);
		if (mysql_num_rows($myQryuser) >=1) {
			$pesanError[] = "Data <b>Username</b> sudah ada, silahkan diganti !";
		}
	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>';
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
				echo "&nbsp;&nbsp;  $pesan_tampil<br>";	
			} 
		echo "</p></div> <br>"; 
	} else {
	  mysql_query("INSERT INTO user VALUES('$id_user','$username','$password','$fullname','$level')");
	  /*header("location:?page=User-Data&pesan=input");*/
	  echo "<meta http-equiv='refresh' content='0; url=?page=User-Data&pesan=input'>";
	  exit;
	}
}
# VARIABEL DATA UNTUK DIBACA FORM
// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah
$datausername	= isset($_POST['username']) ? $_POST['username'] : '';
$datafullname	= isset($_POST['fullname']) ? $_POST['fullname'] : '';	
$datapassword	= isset($_POST['password']) ? $_POST['password'] : '';
$datalevel	= isset($_POST['level']) ? $_POST['level'] : '';
?>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" style="margin:auto;">
	    <?php
			$carikode = mysql_query("select max(id_user) from user") or die (mysql_error());
			  // menjadikannya array
			  $datakode = mysql_fetch_array($carikode);
			  // jika $datakode
			  if ($datakode) {
			   $nilaikode = substr($datakode[0], 1);
			   // menjadikan $nilaikode ( int )
			   $kode = (int) $nilaikode;
			   // setiap $kode di tambah 1
			   $kode = $kode + 1;
			   $kode_otomatis = "U".str_pad($kode, 4, "0", STR_PAD_LEFT);
			  } else {
			   $kode_otomatis = "U";
			  }
		?>
	    <div class="form-group">
	      <label class="control-label col-sm-2">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_user" value="<?php echo $kode_otomatis;?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Username :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" id="username" name="username" value="<?php echo $datausername; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Nama Lengkap :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="fullname" value="<?php echo $datafullname; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Password :</label>
	      <div class="col-sm-9">          
	        <input type="password" class="form-control" name="password" value="<?php echo $datapassword; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Level :</label>
	      <div class="col-sm-9">          
	        	<select  class="form-control" name="level" value="<?php echo $datalevel; ?>">
		         	<option value="2">User</option>
		         	<option value="1">Admin</option>
        	  	</select> 
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
	</form>