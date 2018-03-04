<h1>Panel User</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Panel User</P>
<hr>
<?php
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if ($pesan == "input") {
        echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> User berhasil di Tambahkan!</div>';
    } elseif ($pesan == "update") {
        echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> User berhasil di Update!</div>';
    } elseif ($pesan == "hapus") {
        echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> User berhasil di Hapus!</div>';
    }
  }
  ?>
<?php
  // Membaca variabel form
  $KeyWord  = isset($_GET['KeyWord']) ? $_GET['KeyWord'] : '';
  $dataCari = isset($_POST['txtCari']) ? $_POST['txtCari'] : $KeyWord;

  // Jika tombol Cari diklik
  if(isset($_POST['btnCari'])){
    if($_POST) {
      $filterSql = "WHERE fullname LIKE '%$dataCari%'";
    }
  }
  else {
    if($KeyWord){
      $filterSql = "WHERE fullname '%$dataCari%'";
    }
    else {
      $filterSql = "";
    }
  } 


  # UNTUK PAGING (PEMBAGIAN HALAMAN)
  $baris  = 10;
  $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
  $infoSql= "SELECT * FROM user $filterSql";
  $infoQry= mysql_query($infoSql) or die ("error paging: ".mysql_error());
  $jumlah = mysql_num_rows($infoQry);
  $maks = ceil($jumlah/$baris);
  $mulai  = $baris * ($hal-1);
  ?>


<div class="row">
  <div class="col-md-8">
    <form action='?page=User-Data' method="POST" class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type='text' placeholder='Nama / ID User' name='txtCari' class='form-control'>
          </div>
          <input type='submit' value='Cari' name="btnCari" class='btn btn-primary'> 
          <a href='?page=User-Data' class='btn btn-success' > Semua Data</a>
          <a href="?page=User-Add" name="btnTambah" class="btn btn-primary">Tambah</a>
      </form>

  </div>
  <div class="4">
    
  </div>
</div>
<br>
<div class="row" align="center" style="margin:8px;">
  <div class="col-md-12">
    <table class="table table-hover table-responsive">
      <thead style="background-color:#7386D5;color:#fff;text-align:center;">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Password</th>
          <th scope="col">Level</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select *  FROM user $filterSql order by id_user LIMIT $mulai, $baris") or die(mysql_error());
        $nomor =$mulai;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?></th>
          <td><?php echo $data['id_user']; ?></td>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['fullname']; ?></td>
          <td><?php echo $data['password']; ?></td>
          <td>
            <?php
              if($data['level'] == 1){
                echo 'Administrator';
              } else {              
                echo 'User Biasa';                
              }              
            ?>                                          
          </td>
          <td>
          <?php
          if ($_SESSION['id_user'] == $data['id_user'] ) {
            echo "Online";
          } else {
          ?>
          <a href="?page=User-Edit&id=<?php echo $data['id_user']; ?>" class="btn btn-primary"><i class="fa fa-pencil fa"></i> Edit</a>&nbsp;
          <a href="?page=User-Delete&id=<?php echo $data['id_user']; ?>" class="btn btn-danger"><i class="fa fa-trash fa"></i> Hapus</a>
          <?php } ?>
          </td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <center>
    <ul class="pagination">
    <?php
           for ($h = 1; $h <= $maks; $h++) {
              echo " <li><a href='?page=User-Data&hal=$h'>$h</a></li> ";
           }
       ?>
      </ul>
    </center>
    <a style="font-size:16px;">Jumlah User : <?php echo $jumlah; ?></a>
  </div>
</div>        