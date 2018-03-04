<?php
$id_user = $_GET['id'];
mysql_query("DELETE FROM user WHERE id_user='$id_user'")or die(mysql_error());
echo "<meta http-equiv='refresh' content='0; url=?page=User-Data&pesan=hapus'>";
?>