<h1 align="center">Profil</h1>
<center><p><strong>Muhammad Shofwan</strong>, Anda masuk sebagai <b>Administrator</b>. Anda mempunyai akses penuh terhadap sistem.</p></center>
<hr>
<?php
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if ($pesan == "input") {
        echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Profil berhasil di Tambahkan!</div>';
    } elseif ($pesan == "update") {
        echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Profil berhasil di Update!</div>';
    }
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
	        <input type="text" class="form-control" name="id" value="<?php echo $_SESSION['id_user']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Username :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Nama Lengkap :</label>
	      <div class="col-sm-9">          
	        <input type="text" class="form-control" name="fullname" value="<?php echo $_SESSION['fullname']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Password :</label>
	      <div class="col-sm-9">          
	        <input type="password" class="form-control" name="password" value="<?php echo $_SESSION['password']; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2">Level :</label>
	      <div class="col-sm-9">         
	      	 		<select  class="form-control" name="level" readonly>
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
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-9">
	        <a type="submit" href="?page=Profil-Edit" class="btn btn-primary ">Edit</a>
	      </div>
	    </div>
	    <?php  ?>
	</form>