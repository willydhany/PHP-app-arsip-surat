<?php
$id_mail_type = $_GET['id'];
mysql_query("DELETE FROM mail_type WHERE id_mail_type='$id_mail_type'")or die(mysql_error());
echo "<meta http-equiv='refresh' content='0; url=?page=Jenis-Data&pesan=hapus'>"
?>