<?php
$id_mail = $_GET['id'];

	$query= mysql_query("select * FROM mail WHERE id_mail='$id_mail'")or die(mysql_error());
	$data = mysql_fetch_array($query);

	if(is_file("upload/".$data['file_upload'])) unlink("upload/".$data['file_upload']);

	$query2 = mysql_query("DELETE FROM mail WHERE id_mail='$id_mail'")or die(mysql_error());
	if ($query2) {
		echo "<meta http-equiv='refresh' content='0; url=?page=Surat-Masuk-Data&pesan=hapus'>";
	} else {
		header("location:?page=Surat-Masuk-Data&pesan=gagal");
	}

?>