<h1>Edit User</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / <a href="?page=User-Data"><strong>Panel User</strong></a> / Edit User</P>
<hr>
<?php
if (isset($_POST['btnSimpan'])) {
	$id_user = $_POST['id_user'];
  	$username = $_POST['username'];
  	$fullname = $_POST['fullname'];
  	$password = $_POST['password'];
  	$level = $_POST['level'];
	mysql_query("UPDATE user SET username='$username',fullname='$fullname',password='$password',level='$level' WHERE id_user='$id_user'");
	echo "<meta http-equiv='refresh' content='0; url=?page=User-Data&pesan=update'>";
}
?> 
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" style="margin:auto;">
	<?php
	$id_user = $_GET['id'];
	$query_mysql = mysql_query("select * FROM user WHERE id_user='$id_user'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){
	?>
	    <div class="form-group">
	      <label class="control-label col-sm-2">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_user" value="<?php echo $data['id_user']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Username :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Nama Lengkap :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="fullname" value="<?php echo $data['fullname']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Password :</label>
	      <div class="col-sm-9">          
	        <input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Level :</label>
	      <div class="col-sm-9">          
	        	<select  class="form-control" name="level">
	      	 		<option value="<?php echo $data['level']; ?>">
	      	 			<?php
                            if($data['level'] == 1){
                                echo 'Administrator';
                            } else {
                                echo 'User Biasa';
                            }
                        ?>
	      	 		</option>
		         	<option value="1">Administrator</option>
		         	<option value="2">User Biasa</option>
        	  	</select> 
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	      	<a href="?page=User-Data" name="btnBatal" class="btn btn-default">Batal</a>
	        <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
	      </div>
	    </div>
	    <?php } ?>
	</form>