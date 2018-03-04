<?php
session_start();
if($_SESSION){
  //echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "inc/head.php"; ?>
    <style type="text/css">
    	                
body{margin-top:20px;}    

/* custom google plus style theme */
@import url(http://fonts.googleapis.com/css?family=Roboto:400);
body {
  background-image: url("inc/back2.jpg");ing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
  color:#545454;
}

.btn,.form-control,.panel,.list-group,.well {border-radius:1px;box-shadow:0 0 0;}
.form-control {border-color:#d7d7d7;}
.btn-primary {border-color:transparent;}
.btn-primary,.label-primary,.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {background-color:#4285f4;}
.btn-plus {background-color:#ffffff;border-width:1px;border-color:#dddddd;box-shadow:1px 1px 0 #999999;border-radius:3px;color:#666666;text-shadow:0 0 1px #bbbbbb;}
.well,.panel {border-color:#d2d2d2;box-shadow:0 1px 0 #cfcfcf;border-radius:3px;}
.btn-success,.label-success,.progress-bar-success{background-color:#65b045;}
.btn-info,.label-info,.progress-bar-info{background-color:#a0c3ff,border-color:#a0c3ff;}
.btn-danger,.label-danger,.progress-bar-danger{background-color:#dd4b39;}
.btn-warning,.label-warning,.progress-bar-warning{background-color:#f4b400;color:#444444;}

hr {border-color:#ececec;}
button {
    outline: 0;
}

.panel .btn i,.btn span{
  color:#666666;
}
.panel .panel-heading {
  background-color:#ffffff;
  font-weight:700;
  font-size:16px;
  color:#262626;
  border-color:#ffffff;
}
.panel .panel-heading a {
  font-weight:400;
  font-size:11px;
}
.panel .panel-default {
  border-color:#cccccc;
}
.panel .img-circle {
  width:50px;
  height:50px;
}

h3,h4,h5 { 
  border:0 solid #efefef; 
  border-bottom-width:1px;
  padding-bottom:10px;
}

.modal-dialog {
 width: 450px;
}

.modal-footer,.modal-content,.modal-header {
 border-width:0;
}


    </style>
</head>
<body>



<!--login modal-->
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">  
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog">
  <div class="modal-content" style="padding:30px;">
      <div class="modal-header">
          <h2 class="text-center">Pengarsipan Surat</h2>
      </div>
      <?php
      include "inc/connection.php";
      if(isset($_POST['btnLogin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        if($username == "" || $password == ""){
          echo '<div class="alert alert-warning"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Perhatian!</strong> Username atau Password Kosong</div> ';
        } else {
          $sql = mysql_query("select * from user where username='$username' and password='$password'") or die(mysql_error());
          $data = mysql_fetch_array($sql);
          $cek = mysql_num_rows($sql);
          if ($cek>=1) {
            if ($data['level'] == "1") {
              @$_SESSION['id_user'] = $data['id_user'];
              @$_SESSION['username'] = $data['username'];
              @$_SESSION['fullname'] = $data['fullname'];
              @$_SESSION['level'] = $data['level'];
              @$_SESSION['password'] = $data['password'];
              echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            } else if ($data['level'] == "2") {
              @$_SESSION['id_user'] = $data['id_user'];
              @$_SESSION['username'] = $data['username'];
              @$_SESSION['fullname'] = $data['fullname'];
              @$_SESSION['level'] = $data['level'];
              @$_SESSION['password'] = $data['password'];
              echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            }
          } else {
            echo '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Perhatian!</strong> Login Gagal</div> ';
          }
        }
      }
      $datausername = isset($_POST['username']) ? $_POST['username'] : '';
      $datapassword = isset($_POST['password']) ? $_POST['password'] : '';
      ?>
      <div class="modal-body">
          <form class="form col-md-12 center-block" >
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="username" placeholder="Username" value="<?php echo $datausername; ?>"> 
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" placeholder="Password" value="<?php echo $datapassword; ?>">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block btn-lg" name="btnLogin">Masuk</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
            <a href="#"></a>
    	  </div>	
      </div>
  </div>
  </div>
</div>
</form>

<?php include "inc/footer.php"; ?>
	
</script>
</body>
</html>