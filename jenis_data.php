<h1>Jenis Surat</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Jenis Surat</P>
<hr>
<?php
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if ($pesan == "input") {
        echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Jenis Surat berhasil di Tambahkan!</div>';
    } elseif ($pesan == "update") {
        echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Jenis Surat berhasil di Update!</div>';
    } elseif ($pesan == "hapus") {
        echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Jenis Surat berhasil di Hapus!</div>';
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
      $filterSql = "WHERE type LIKE '%$dataCari%'";
    }
  }
  else {
    if($KeyWord){
      $filterSql = "WHERE id'%$dataCari%'";
    }
    else {
      $filterSql = "";
    }
  } 


  # UNTUK PAGING (PEMBAGIAN HALAMAN)
  $baris  = 10;
  $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
  $infoSql= "SELECT * FROM mail_type $filterSql";
  $infoQry= mysql_query($infoSql) or die ("error paging: ".mysql_error());
  $jumlah = mysql_num_rows($infoQry);
  $maks = ceil($jumlah/$baris);
  $mulai  = $baris * ($hal-1);
  ?>


<div class="row">
  <div class="col-md-8">
    <form action='?page=Jenis-Data' method="POST" class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type='text' placeholder='Nama / ID User' name='txtCari' class='form-control'>
          </div>
          <input type='submit' value='Cari' name="btnCari" class='btn btn-primary'> 
          <a href='?page=Jenis-Data' class='btn btn-success' > Semua Data</a>
          <a href="?page=Jenis-Add" name="btnTambah" class="btn btn-primary">Tambah</a>
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
          <th scope="col">Jenis</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select *  FROM mail_type $filterSql order by id_mail_type LIMIT $mulai, $baris") or die(mysql_error());
        $nomor =$mulai;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?></th>
          <td><?php echo $data['id_mail_type']; ?></td>
          <td><?php echo $data['type']; ?></td>
          <td><a href="?page=Jenis-Edit&id=<?php echo $data['id_mail_type']; ?>" class="btn btn-primary"><i class="fa fa-pencil fa"></i> Edit</a>&nbsp;<a href="?page=Jenis-Delete&id=<?php echo $data['id_mail_type']; ?>" class="btn btn-danger"><i class="fa fa-trash fa"></i> Hapus</a></td>
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
    <a style="font-size:16px;">Jumlah Jenis Surat : <?php echo $jumlah; ?></a>
  </div>
</div>
     