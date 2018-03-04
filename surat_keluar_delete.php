<?php
$id_mail_out = $_GET['id'];

	$query= mysql_query("select * FROM mail_out WHERE id_mail_out='$id_mail_out'")or die(mysql_error());
	$data = mysql_fetch_array($query);

	if(is_file("upload/".$data['file_upload'])) unlink("upload/".$data['file_upload']);

	$query2 = mysql_query("DELETE FROM mail_out WHERE id_mail_out='$id_mail_out'")or die(mysql_error());
	if ($query2) {
		echo "<meta http-equiv='refresh' content='0; url=?page=Surat-Keluar-Data&pesan=hapus'>";
	} else {
		header("location:?page=Surat-Keluar-Data&pesan=gagal");
	}

?>