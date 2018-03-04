<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<h1>Laporan Surat Masuk</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Laporan Surat Masuk</P>
<hr>

		<form action='laporan_masuk_cetak.php' target="_blank" method="POST" class="navbar-form navbar-left" role="search">
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