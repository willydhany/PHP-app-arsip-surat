<h1>Backup Database</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Backup Database</P>
<hr>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-body">
						<?php
							error_reporting(0);
							$file=date("Ymd").'_backup_database_'.time().'.sql';
							backup_tables("localhost","root","","absensi_db",$file);
						?>
						<p align="center">Silahkan Backup Database Anda, untuk keamanan data :)</p><br />
						<p align="center"><a style="cursor:pointer" class="btn btn-primary" onclick="location.href='download_backup_data.php?nama_file=<?php echo $file;?>'" title="Download">Download file database</a></p>
						<?php
						/*
						untuk memanggil nama fungsi :: jika anda ingin membackup semua tabel yang ada didalam database, biarkan tanda BINTANG (*) pada variabel $tables = '*'
						jika hanya tabel-table tertentu, masukan nama table dipisahkan dengan tanda KOMA (,) 
						*/
						function backup_tables($host,$user,$pass,$name,$nama_file,$tables ='*')	{
							$link = mysql_connect($host,$user,$pass);
							mysql_select_db($name,$link);
							
							if($tables == '*'){
								$tables = array();
								$result = mysql_query('SHOW TABLES');
								while($row = mysql_fetch_row($result)){
									$tables[] = $row[0];
								}
							}
							else{//jika hanya table-table tertentu
								$tables = is_array($tables) ? $tables : explode(',',$tables);
							}
							
							foreach($tables as $table){
								$result = mysql_query('SELECT * FROM '.$table);
								$num_fields = mysql_num_fields($result);
																
								$return.= 'DROP TABLE '.$table.';';//menyisipkan query drop table untuk nanti hapus table yang lama
								$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
								$return.= "\n\n".$row2[1].";\n\n";
								
								for ($i = 0; $i < $num_fields; $i++) {
									while($row = mysql_fetch_row($result)){
										//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat
										$return.= 'INSERT INTO '.$table.' VALUES(';
										for($j=0; $j<$num_fields; $j++) {
											//akan menelusuri setiap baris query didalam
											$row[$j] = addslashes($row[$j]);
											$row[$j] = ereg_replace("\n","\\n",$row[$j]);
											if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
											if ($j<($num_fields-1)) { $return.= ','; }
										}
										$return.= ");\n";
									}
								}
								$return.="\n\n\n";
							}							
							//simpan file di folder
							$nama_file;
							
							$handle = fopen('backup/'.$nama_file,'w+');
							fwrite($handle,$return);
							fclose($handle);
						}
						?>
					</div>
				</div>
			</div>
        </div>
	</div>
</section>