<h1>Disposisi</h1>
<P><a href="?page=Halaman-Utama"><strong>Home</strong></a> / Disposisi</P>
<hr>
<?php
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if ($pesan == "input") {
        echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Disposisi berhasil di Tambahkan!</div>';
    } elseif ($pesan == "update") {
        echo '<div class="alert alert-info"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Disposisi berhasil di Update!</div>';
    } elseif ($pesan == "hapus") {
        echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Berhasil!</strong> Disposisi berhasil di Hapus!</div>';
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
      $filterSql = "WHERE id_disposition LIKE '%$dataCari%'";
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
  $infoSql= "SELECT * FROM disposition $filterSql";
  $infoQry= mysql_query($infoSql) or die ("error paging: ".mysql_error());
  $jumlah = mysql_num_rows($infoQry);
  $maks = ceil($jumlah/$baris);
  $mulai  = $baris * ($hal-1);
  ?>


<div class="row">
  <div class="col-md-8">
    <form action='?page=Disposisi-Data' method="POST" class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type='text' placeholder='Kode Disposisi' name='txtCari' class='form-control'>
          </div>
          <input type='submit' value='Cari' name="btnCari" class='btn btn-primary'> 
          <a href='?page=Disposisi-Data' class='btn btn-success' > Semua Data</a>
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
          <th scope="col">Tgl Disposisi</th>
          <th scope="col">Disposisi Oleh</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Tanggapan</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select *  FROM disposition $filterSql order by id_disposition LIMIT $mulai, $baris") or die(mysql_error());
        $nomor =$mulai;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?></th>
          <td><?php echo $data['id_disposition']; ?></td>
          <td><?php echo date("d F Y", strtotime($data['disposition_at'])); ?></td>
          <td><?php echo $data['reply_at']; ?></td>
          <td><?php echo $data['description']; ?></td>
          <td><?php echo $data['notification']; ?></td>
          <td><a href="?page=Disposisi-Edit&id=<?php echo $data['id_disposition']; ?>" class="btn btn-primary"><i class="fa fa-pencil fa"></i> Edit</a>&nbsp;
              <a href="?page=Disposisi-Delete&id=<?php echo $data['id_disposition']; ?>" class="btn btn-danger"><i class="fa fa-trash fa"></i> Hapus</a>&nbsp;
              <a href="laporan_disposisi_detail.php?id=<?php echo $data['id_disposition']; ?>" target="_blank" class="btn btn-warning" target="_blank"><i class="fa fa-print fa"></i> Cetak</a> &nbsp;
              <a href="?page=Disposisi-Detail&id=<?php echo $data['id_disposition']; ?>" class="btn btn-info"><i class="fa fa-info fa"></i> Detail</a></td>
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
    <a style="font-size:16px;">Jumlah Disposisi : <?php echo $jumlah; ?></a>
  </div>
</div>
     