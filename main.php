 <h1>Selamat Datang</h1>
<p><strong><?php echo $_SESSION['fullname']; ?></strong>, Anda masuk sebagai <?php if($_SESSION['level'] == 1){ echo '<b>Administrator</b>. Anda mempunyai akses penuh terhadap sistem.'; } else { echo '<b>User Biasa</b>. Anda mempunyai akses terbatas terhadap sistem.'; } ?> </p>
<hr>
<?php
	$query= mysql_query("SELECT * FROM user") or die ("error paging: ".mysql_error());
	$jumlah	= mysql_num_rows($query);

	$query2= mysql_query("SELECT * FROM mail") or die ("error paging: ".mysql_error());
	$jumlah2= mysql_num_rows($query2);

	$query3= mysql_query("SELECT * FROM disposition") or die ("error paging: ".mysql_error());
	$jumlah3= mysql_num_rows($query3);

	$query4= mysql_query("SELECT * FROM mail_out") or die ("error paging: ".mysql_error());
	$jumlah4= mysql_num_rows($query4);

	$query5= mysql_query("SELECT * FROM mail_type") or die ("error paging: ".mysql_error());
	$jumlah5= mysql_num_rows($query5);
?>

<?php
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if ($pesan == "restore") {
        echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Database berhasil di Restore!</div>';
    } elseif ($pesan == "update") {
        echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Surat Keluar berhasil di Update!</div>';
    }
  }
?>

<div class="row" >
	<div class="col-md-4">
		<div class="jumbotron" style="background:#D65076;color:#fff;">
  			<h2 align="center" ><i class="fa fa-inbox fa"></i> Jumlah Pesan Masuk</h2>
  			<h3 align="center"><strong><?php echo $jumlah2; ?> Pesan Masuk</strong></h3>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="jumbotron" style="background-color:#79C753;color:#fff;">
  			<h2 align="center"><i class="fa fa-inbox fa"></i> Jumlah Pesan Keluar</h2>
  			<h3 align="center"><strong><?php echo $jumlah4; ?> Pesan Keluar</strong></h3>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="jumbotron" style="background-color:#955251;color:#fff;">

  			<h2 align="center"><i class="fa fa-user-circle fa"></i> Jumlah Pengguna</h2>
  			<h3 align="center"><strong><?php echo $jumlah; ?> Pengguna</strong></h3>
  		</div>
	</div>
</div>
<div class="row" >
	<div class="col-md-4">
		<div class="jumbotron" style="background-color:#EFC050;color:#fff;">
  			<h2 align="center"><i class="glyphicon glyphicon-send"></i> Jumlah Disposisi</h2>
  			<h3 align="center"><strong><?php echo $jumlah3; ?> Disposisi</strong></h3>
  		</div>
	</div>
	<div class="col-md-4">
		<div class="jumbotron" style="background:#45B8AC;color:#fff;">
  			<h2 align="center" ><i class="fa fa-file-o fa"></i> Jumlah Jenis Surat</h2>
  			<h3 align="center"><strong><?php echo $jumlah5; ?> Pesan Masuk</strong></h3>
  		</div>
	</div>
</div>