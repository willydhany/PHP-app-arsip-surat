        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laporan Surat Masuk</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
<?php
    include "inc/head.php";
    include 'inc/connection.php';
    $id_disposition = $_GET['id'];
    $query_mysql = mysql_query("select a.*, b.mail_code,mail_subject,mail_from FROM disposition a inner join mail b using(id_mail) WHERE id_disposition='$id_disposition'")or die(mysql_error());
    while($data = mysql_fetch_array($query_mysql)){
    ?>

    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Pengarsipan Surat</h1>
            <h3 align="center">Laporan Disposisi</h3>
            <p align="center">Jl. Lap. Bola Rawa Butun, Kel. Ciketing Udik, Kec. Bantar Gebang, Kota Bekasi 17153</p>
            <hr>
        </div>
    </div>
    <div class="row" >
      <div class="col-md-1">
        
      </div>
      <div class="col-md-10">
        <table class="table table-striped table-hover table-responsive"> 
           <tbody>
            <tr>
              <td>ID Surat</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['id_mail'];?></td>
            </tr>
            <tr>
              <td>Kode Surat</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_code'];?></td>
            </tr>
            <tr>
              <td>Asal Surat</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_from']; ?></td>
            </tr>
            <tr>
              <td>Judul Surat</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['mail_subject']; ?></td>
            </tr>
            <tr>
              <td>ID</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['id_disposition']; ?></td>
            </tr>
            <tr>
              <td>Tanggal Disposisi</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo date("d F Y", strtotime($data['disposition_at'])); ?></td>
            </tr>
            
            <tr>
              <td>Disposisi Oleh</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['reply_at']; ?></td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['description']; ?></td>
            </tr>
            <tr>
              <td>Tanggapan</td>
              <td>: &nbsp;&nbsp;&nbsp;<?php echo $data['notification']; ?></td>
            </tr>
          </tbody>
          
        </table>  
      </div>
      <div class="col-md-1">
        
      </div>
      <?php } ?>
    </div>
    <script>
        window.load = print_d();
        function print_d(){
            window.print();
        }
    </script>
</body>
</html>