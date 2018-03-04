<h1>Restore Database</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Restore Database</P>
<hr>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-body">
						<form enctype="multipart/form-data" method="post" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label">File Database (*.sql)</label>
								<div class="col-sm-7">
									<input type="file" name="datafile" class="form-control" size="30" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
									<button type="submit" name="restore" class="btn btn-danger">Restore Database</button>
								</div>
							</div>
						</form>
						<?php
						if(isset($_POST['restore'])){
							$koneksi=mysql_connect("localhost","root","");
							mysql_select_db("aps",$koneksi);
							
							$nama_file=$_FILES['datafile']['name'];
							$ukuran=$_FILES['datafile']['size'];
							
							if ($nama_file==""){
								echo "Fatal Error";
							}
							else{
								//definisikan variabel file dan alamat file
								$uploaddir='restore/';
								$alamatfile=$uploaddir.$nama_file;

								if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile)){
									$filename = 'restore/'.$nama_file.'';									
									$templine = '';
									$lines = file($filename);

									foreach ($lines as $line){
										if (substr($line, 0, 2) == '--' || $line == '')
											continue;
									 
										$templine .= $line;
										if (substr(trim($line), -1, 1) == ';'){
											mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
											$templine = '';
										}
									}
									echo "<meta http-equiv='refresh' content='0; url=?page=Halaman-Utama&pesan=restore'>";
									echo "<center>Restore Database Telah Berhasil, Silahkan dicek !</center>";
								}
								else{
									echo "Restore Database Gagal, kode error = " . $_FILES['location']['error'];
								}	
							}

						}
						else{
							unset($_POST['restore']);
						}
						?>
					</div>
				</div>
			</div>
        </div>
	</div>
</section>