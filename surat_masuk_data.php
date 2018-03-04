<h1>Surat Masuk</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Surat Masuk</P>
<hr>

<?php
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if ($pesan == "input") {
        echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Surat Masuk berhasil di Tambahkan!</div>';
    } elseif ($pesan == "update") {
        echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Surat Masuk berhasil di Update!</div>';
    } elseif ($pesan == "hapus") {
        echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Surat Masuk berhasil di Hapus!</div>';
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
      $filterSql = "WHERE mail_code LIKE '%$dataCari%'";
    }
  }
  else {
    if($KeyWord){
      $filterSql = "WHERE mail_code '%$dataCari%'";
    }
    else {
      $filterSql = "";
    }
  } 


  # UNTUK PAGING (PEMBAGIAN HALAMAN)
  $baris  = 10;
  $hal  = isset($_GET['hal']) ? $_GET['hal'] : 1;
  $infoSql= "SELECT * FROM mail $filterSql";
  $infoQry= mysql_query($infoSql) or die ("error paging: ".mysql_error());
  $jumlah = mysql_num_rows($infoQry);
  $maks = ceil($jumlah/$baris);
  $mulai  = $baris * ($hal-1);
  ?>


<div class="row">
  <div class="col-md-8">
    <form action='?page=Surat-Masuk-Data' method="POST" class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type='text' placeholder='Kode Surat' name='txtCari' class='form-control'>
          </div>
          <input type='submit' value='Cari' name="btnCari" class='btn btn-primary'> 
          <a href='?page=Surat-Masuk-Data' class='btn btn-success' > Semua Data</a>
          <a href="?page=Surat-Masuk-Add" name="btnTambah" class="btn btn-primary">Tambah</a>
      </form>

  </div>
  <div class="4">
    
  </div>
</div>
<br>
<div class="row" align="center" style="margin:1px;">
  <div class="col-md-12">
    <table class="table table-hover table-responsive">
      <thead style="background-color:#7386D5;color:#fff;text-align:center;">
        <tr>
          <th scope="col">No <br> ID</th>
          <th scope="col" style="min-width:100px;" >Kode Surat <br> Tgl Surat</th>
          <th scope="col">Asal Surat <br> Tgl Diterima</th>
          <th scope="col">Tujuan Surat</th>
          <th scope="col">Judul Surat <br> Jenis Surat</th>
          <th scope="col" width="200px">Deskripsi</th>
          <th scope="col">Disposisi</th>
          <th scope="col" width="200px">Opsi</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select a.*, b.type FROM mail a inner join mail_type b using(id_mail_type) $filterSql order by id_mail LIMIT $mulai, $baris") or die(mysql_error());
        $nomor =$mulai;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?>.<br><hr> <?php echo $data['id_mail']; ?></th>
          <td> <?php echo $data['mail_code']; ?> <br><hr> <?php echo date("d F Y", strtotime($data['mail_date'])); ?></td>
          <td> <?php echo $data['mail_from']; ?> <br><hr> <?php echo date("d F Y", strtotime($data['incoming_at'])); ?></td>
          <td><?php echo $data['mail_to']; ?></td>
          <td><?php echo $data['mail_subject']; ?> <br><hr> <?php echo $data['type']; ?></td>
          <td><?php echo $data['description']; ?><br><hr><i>File Upload</i> : <?php echo $data['file_upload']; ?></td>
          <td>
             <?php
              if($data['disposisi'] == 1){
                echo 'Belum';
              } else {              
                echo 'Sudah';                
              }              
            ?> 
          </td>
          <td>
            <a href="?page=Surat-Masuk-Edit&id=<?php echo $data['id_mail']; ?>" class="btn btn-primary" ><i class="fa fa-pencil fa"></i> Edit</a>&nbsp;
            <a href="?page=Surat-Masuk-Delete&id=<?php echo $data['id_mail']; ?>" class="btn btn-danger "><i class="fa fa-trash fa"></i> Hapus</a><br><br>
            <a href="?page=Disposisi-Add&id=<?php echo $data['id_mail']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Disposisi</a> &nbsp;
            <a href="?page=Surat-Masuk-Detail&id=<?php echo $data['id_mail']; ?>" class="btn btn-info"><i class="fa fa-info fa"></i> Detail</a>
            <?php
              if($data['disposisi'] == 1){
                echo '';
              } else {              
                echo '';                
              }              
            ?> 
            
          </td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <center>
    <ul class="pagination">
    <?php
           for ($h = 1; $h <= $maks; $h++) {
              echo " <li><a href='?page=Surat-Masuk-Data&hal=$h'>$h</a></li> ";
           }
       ?>
      </ul>
    </center>
    <a style="font-size:16px;">Jumlah Surat Masuk : <?php echo $jumlah; ?></a>
  </div>
</div>        