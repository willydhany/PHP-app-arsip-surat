        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laporan Surat Keluar</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
<?php
    include 'inc/connection.php';
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

    if (empty($tgl_awal) || empty($tgl_akhir)) {
      echo '<br><br><br><br><h4 align="center">Silahkan isi form tanggal</h4>';
    } else {
?>
    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Pengarsipan Surat</h1>
            <h3 align="center">Laporan Surat Keluar</h3>
            <p align="center">Jl. Lap. Bola Rawa Butun, Kel. Ciketing Udik, Kec. Bantar Gebang, Kota Bekasi 17153</p>
            <hr>
        </div>
    </div>
  <h4 align="center"><p>Laporan <b>Surat Keluar</b> dari tanggal <b> <?php echo  date("d F Y", strtotime($tgl_awal));?> </b> sampai tanggal <b> <?php echo  date("d F Y", strtotime($tgl_akhir));?></b></p></h4>
  <br>


<div class="row" align="center" style="margin:8px;">
  <div class="col-md-12">
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th scope="col">No <br> ID</th>
          <th scope="col" style="min-width:100px;" >Kode Surat <br> Tgl Surat</th>
          <th scope="col">Tujuan Surat</th>
          <th scope="col">Judul Surat <br> Jenis Surat</th>
          <th scope="col" width="100px">Deskripsi</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select a.*, b.type FROM mail_out a inner join mail_type b using(id_mail_type) WHERE outmail_at BETWEEN '$tgl_awal' AND '$tgl_akhir' ") or die(mysql_error());
        $nomor =0;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?>.<br><hr> <?php echo $data['id_mail_out']; ?></th>
          <td> <?php echo $data['mail_code']; ?> <br><hr> <?php echo date("d F Y", strtotime($data['mail_date'])); ?></td>
          <td><?php echo $data['mail_to']; ?><br><hr><i>File Upload</i> : <?php echo $data['file_upload']; ?></td>
          <td><?php echo $data['mail_subject']; ?> <br><hr> <?php echo $data['type']; ?></td>
          <td><?php echo $data['description']; ?></td>
        </tr>
      </tbody>
<?php
    }
  }
?>
    </table>
  </div>
</div>
    <script>
        window.load = print_d();
        function print_d(){
            window.print();
        }
    </script>
</body>
</html>