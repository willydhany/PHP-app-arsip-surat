<?php
$id_disposition = $_GET['id'];
mysql_query("DELETE FROM disposition WHERE id_disposition='$id_disposition'")or die(mysql_error());
echo "<meta http-equiv='refresh' content='0; url=?page=Disposisi-Data&pesan=hapus'>"
?>