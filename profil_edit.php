<h1 align="center">Profil</h1>
<center><p><strong>Muhammad Shofwan</strong>, Anda masuk sebagai <b>Administrator</b>. Anda mempunyai akses penuh terhadap sistem.</p></center>
<hr>
<?php
if (isset($_POST['btnSimpan'])) {
	$id_user = $_POST['id_user'];
  	$username = $_POST['username'];
  	$fullname = $_POST['fullname'];
  	$password = $_POST['password'];
  	$level = $_POST['level'];
	mysql_query("UPDATE user SET username='$username',fullname='$fullname',password='$password',level='$level' WHERE id_user='$id_user'");
	 		  @$_SESSION['id_user'] = $id_user;
              @$_SESSION['username'] = $username;
              @$_SESSION['fullname'] = $fullname;
              @$_SESSION['level'] = $level;
              @$_SESSION['password'] = $password;
	echo "<meta http-equiv='refresh' content='0; url=?page=Profil-Data&pesan=update'>";
}
?> 
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal" role="form" style="margin:auto;">
	<?php
	/*
	$id = $_GET['id'];
	$query_mysql = mysql_query("select * FROM user WHERE id='$id'")or die(mysql_error());
	while($data = mysql_fetch_array($query_mysql)){ */
	?>
	    <div class="form-group">
	      <label class="control-label col-sm-2">ID :</label>
	      <div class="col-sm-9">
	        <input type="text" class="form-control" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Username :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Nama Lengkap :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="fullname" value="<?php echo $_SESSION['fullname']; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Password :</label>
	      <div class="col-sm-9">          
	        <input type="password" class="form-control" name="password" value="<?php echo $_SESSION['password']; ?>">
	      </div>
	    </div>
<?php
	if ($_SESSION['level'] == 2) {
		echo "";
	} else {
?>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Level :</label>
	      <div class="col-sm-9">          
	        	<select  class="form-control" name="level">
	      	 		<option value="<?php echo $_SESSION['level']; ?>">
	      	 			<?php
                            if($_SESSION['level'] == 1){
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
<?php
}
?>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <button type="submit" name="btnSimpan" class="btn btn-success ">Update</button>
	      </div>
	    </div>
	    <?php  ?>
	</form>