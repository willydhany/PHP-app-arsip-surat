        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laporan Disposisi</title>

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
            <h3 align="center">Laporan Disposisi</h3>
            <p align="center">Jl. Lap. Bola Rawa Butun, Kel. Ciketing Udik, Kec. Bantar Gebang, Kota Bekasi 17153</p>
            <hr>
        </div>
    </div>
  <h4 align="center"><p>Laporan <b>Disposisi</b> dari tanggal <b> <?php echo  date("d F Y", strtotime($tgl_awal));?> </b> sampai tanggal <b> <?php echo  date("d F Y", strtotime($tgl_akhir));?></b></p></h4>
  <br>


<div class="row" align="center" style="margin:8px;">
  <div class="col-md-12">
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID / Kode Surat</th>
          <th scope="col">Asal Surat</th>
          <th scope="col">Judul Surat</th>
          <th scope="col">Tgl Disposisi</th>
          <th scope="col">Disposisi Oleh</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Tanggapan</th>
        </tr>
      </thead>
      <?php
        $query_mysql = mysql_query("select a.*, b.mail_code,mail_subject,mail_from  FROM disposition a inner join mail b using(id_mail) WHERE disposition_at BETWEEN '$tgl_awal' AND '$tgl_akhir'") or die(mysql_error());
        $nomor =0;
        while($data = mysql_fetch_array($query_mysql)){
          $nomor++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nomor; ?></th>
          <td><?php echo $data['id_disposition']; ?> / <?php echo $data['mail_code']; ?></td>
          <td><?php echo $data['mail_from']; ?></td>
          <td><?php echo $data['mail_subject']; ?></td>
          <td><?php echo date("d F Y", strtotime($data['disposition_at'])); ?></td>
          <td><?php echo $data['reply_at']; ?></td>
          <td><?php echo $data['description']; ?></td>
          <td><?php echo $data['notification']; ?></td>
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