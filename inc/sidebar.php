
<?php
    $query= mysql_query("SELECT * FROM user") or die ("error paging: ".mysql_error());
    $jumlah = mysql_num_rows($query);

    $query2= mysql_query("SELECT * FROM mail") or die ("error paging: ".mysql_error());
    $jumlah2= mysql_num_rows($query2);

    $query3= mysql_query("SELECT * FROM disposition") or die ("error paging: ".mysql_error());
    $jumlah3= mysql_num_rows($query3);

    $query4= mysql_query("SELECT * FROM mail_out") or die ("error paging: ".mysql_error());
    $jumlah4= mysql_num_rows($query4);
?>
<style type="text/css">
    .xbadge {
    display: inline-block;
    min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: bold;
  line-height: 1;
  color: #7386D5;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  background-color: #fff;
  border-radius: 10px;
}
</style>
            <nav id="sidebar"> 
                <div class="sidebar-header">
                    <h3>Pengarsipan Surat</h3>
                    <strong>PS</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            <!--<i class="fa fa-user-circle fa"></i>-->
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="collapse list-unstyled" id="userSubmenu">
                            <li><a href="?page=Profil-Data">Profil</a></li>
                            <li><a href="?page=Logout">Keluar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=Halaman-Utama">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            <!--<i class="fa fa-home fa"></i>-->
                            Home
                        </a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <!-- <i class="glyphicon glyphicon-envelope"></i> -->
                            <i class="fa fa-inbox fa"></i>
                            Surat
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="?page=Surat-Masuk-Data">Surat Masuk &nbsp; <span class="xbadge"><?php echo $jumlah2; ?></span></a></li>
                            <li><a href="?page=Surat-Keluar-Data">Surat Keluar &nbsp; <span class="xbadge"><?php echo $jumlah4; ?></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=Disposisi-Data">
                            <i class="glyphicon glyphicon-send"></i>
                            <!--<i class="fa fa-address-book fa"></i>-->
                            Disposisi &nbsp; <span class="xbadge"> <?php echo $jumlah3; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="#printSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-print fa"></i>
                            <!--<i class="fa fa-user-circle fa"></i>-->
                            Laporan
                        </a>
                        <ul class="collapse list-unstyled" id="printSubmenu">
                            <li><a href="?page=Laporan-Surat-Masuk">Surat Masuk</a></li>
                            <li><a href="?page=Laporan-Surat-Keluar">Surat Keluar</a></li>
                            <li><a href="?page=Laporan-Disposisi">Disposisi</a></li>
                        </ul>
                    </li>
<?php
if($_SESSION['level'] == 1 ){
?>
                    <li>
                        <a href="#settingSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-cog"></i>
                            <!--<i class="fa fa-user-circle fa"></i>-->
                            Pengaturan
                        </a>
                        <ul class="collapse list-unstyled" id="settingSubmenu">
                            <li><a href="?page=User-Data">Panel User &nbsp; <span class="xbadge"><?php echo $jumlah; ?></span></a></li>
                            <li><a href="?page=Jenis-Data">Jenis Surat</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#dbSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-database fa"></i>
                            <!--<i class="fa fa-user-circle fa"></i>-->
                            Database
                        </a>
                        <ul class="collapse list-unstyled" id="dbSubmenu">
                            <li><a href="?page=Backup-Data">Backup</a></li>
                            <li><a href="?page=Restore-Data">Restore</a></li>
                        </ul>
                    </li>
<?php } ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <i class="glyphicon glyphicon-question-sign"></i>
                            <!--<i class="fa fa-address-book fa"></i>-->
                            Tentang
                        </a>
                    </li>
                </ul>
            </nav>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br><br><center>Website Pengarsipan Surat Oleh Muhammad Shofwan Fahma Awwali &copy; 2018</center><br><br>
      </div>
    </div>
  </div>
</div>