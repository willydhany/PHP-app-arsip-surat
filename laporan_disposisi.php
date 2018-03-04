<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<h1>Laporan Disposisi</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Laporan Disposisi</P>
<hr>
<?php
	include 'inc/connection.php';
?>

		<form action='laporan_disposisi_cetak.php' target="_blank" method="POST" class="navbar-form navbar-left" role="search">
          	<div class="form-group">         
		        <div class="input-group date form_date col-sm-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" type="text" placeholder="Dari Tanggal" name="tgl_awal">
		     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		     				<input type="hidden" id="dtp_input1" value=""/>
		      	</div>
		    </div>
		    &nbsp;&nbsp;
		    <div class="form-group">         
		        <div class="input-group date form_date col-sm-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" type="text" placeholder="Sampai Tanggal" name="tgl_akhir">
		     				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
		     				<input type="hidden" id="dtp_input1" value=""/>
		      	</div>
		    </div>
		    &nbsp;&nbsp;
          <input type='submit' value='Tampilkan' name="btnCari" class='btn btn-primary'>
      	</form>

<?php
		

	if (isset($_POST['btnCari'])) {

		$tgl_awal = $_POST['tgl_awal'];
		$tgl_akhir = $_POST['tgl_akhir'];
		

		if (empty($tgl_awal) || empty($tgl_akhir)) {
			echo '<br><br><br><br><h4 align="center">Silahkan isi form tanggal</h4>';
		} else {
?>	
	<br><br><br>
	<h4><p>&nbsp;&nbsp;&nbsp;Laporan Disposisi dari tanggal <b> <?php echo $tgl_awal; ?> </b> sampai tanggal <b> <?php echo $tgl_akhir; ?></b></p></h4>
	<br>


<div class="row" align="center" style="margin:8px;">
  <div class="col-md-12">
    <table class="table table-hover table-responsive">
      <thead style="background-color:#7386D5;color:#fff;text-align:center;">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID</th>
          <th scope="col">Tgl Disposisi</th>
          <th scope="col">Disposisi Oleh</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Tanggapan</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select *  FROM disposition WHERE disposition_at BETWEEN '$tgl_awal' AND '$tgl_akhir'") or die(mysql_error());
        $nomor =0;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?></th>
          <td><?php echo $data['id_disposition']; ?></td>
          <td><?php echo $data['disposition_at']; ?></td>
          <td><?php echo $data['reply_at']; ?></td>
          <td><?php echo $data['description']; ?></td>
          <td><?php echo $data['notification']; ?></td>
        </tr>
      </tbody>
<?php
		}
	}
}
?>
    </table>
  </div>
</div>

	


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