<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch($_GET['page']){				
		case '' :
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";	break;
			
		case 'Halaman-Utama' :
			if(!file_exists ("main.php")) die ("Sorry Empty Page!"); 
			include "main.php";	break;
			
		case 'Login' :
			if(!file_exists ("login.php")) die ("Sorry Empty Page!"); 
			header('location:login.php'); break;

		case 'Login-Validasi' :
			if(!file_exists ("login_validasi.php")) die ("Sorry Empty Page!"); 
			include "login_validasi.php"; break;
			
		case 'Logout' :
			if(!file_exists ("login_out.php")) die ("Sorry Empty Page!"); 
			include "login_out.php"; break;

		case 'Profil-Data' :
			if(!file_exists ("profil_data.php")) die ("Sorry Empty Page!"); 
			include "profil_data.php"; break;
		case 'Profil-Edit' :
			if(!file_exists ("profil_edit.php")) die ("Sorry Empty Page!"); 
			include "profil_edit.php"; break;

		case 'Backup-Data' :
			if(!file_exists ("backup_data.php")) die ("Sorry Empty Page!"); 
			include "backup_data.php"; break;	
		case 'Restore-Data' :
			if(!file_exists ("restore_data.php")) die ("Sorry Empty Page!"); 
			include "restore_data.php"; break;				
	

		# User
		case 'User-Data' :
			if(!file_exists ("user_data.php")) die ("Sorry Empty Page!"); 
			include "user_data.php";	 break;		
		case 'User-Add' :
			if(!file_exists ("user_add.php")) die ("Sorry Empty Page!"); 
			include "user_add.php";	 break;		
		case 'User-Delete' :
			if(!file_exists ("user_delete.php")) die ("Sorry Empty Page!"); 
			include "user_delete.php"; break;		
		case 'User-Edit' :
			if(!file_exists ("user_edit.php")) die ("Sorry Empty Page!"); 
			include "user_edit.php"; break;

		# Jenis Surat
		case 'Jenis-Data' :
			if(!file_exists ("jenis_data.php")) die ("Sorry Empty Page!"); 
			include "jenis_data.php";	 break;		
		case 'Jenis-Add' :
			if(!file_exists ("jenis_add.php")) die ("Sorry Empty Page!"); 
			include "jenis_add.php";	 break;		
		case 'Jenis-Delete' :
			if(!file_exists ("jenis_delete.php")) die ("Sorry Empty Page!"); 
			include "jenis_delete.php"; break;		
		case 'Jenis-Edit' :
			if(!file_exists ("user_edit.php")) die ("Sorry Empty Page!"); 
			include "jenis_edit.php"; break;

		# Disposisi
		case 'Disposisi-Data' :
			if(!file_exists ("disposisi_data.php")) die ("Sorry Empty Page!"); 
			include "disposisi_data.php";	 break;		
		case 'Disposisi-Add' :
			if(!file_exists ("disposisi_add.php")) die ("Sorry Empty Page!"); 
			include "disposisi_add.php";	 break;		
		case 'Disposisi-Delete' :
			if(!file_exists ("disposisi_delete.php")) die ("Sorry Empty Page!"); 
			include "disposisi_delete.php"; break;		
		case 'Disposisi-Edit' :
			if(!file_exists ("disposisi_edit.php")) die ("Sorry Empty Page!"); 
			include "disposisi_edit.php"; break;
		case 'Disposisi-Detail' :
			if(!file_exists ("disposisi_detail.php")) die ("Sorry Empty Page!"); 
			include "disposisi_detail.php"; break;


		#Surat Masuk
		case 'Surat-Masuk-Data' :
			if(!file_exists ("surat_masuk_data.php")) die ("Sorry Empty Page!"); 
			include "surat_masuk_data.php";	 break;		
		case 'Surat-Masuk-Add' :
			if(!file_exists ("surat_masuk_add.php")) die ("Sorry Empty Page!"); 
			include "surat_masuk_add.php";	 break;		
		case 'Surat-Masuk-Delete' :
			if(!file_exists ("surat_masuk_delete.php")) die ("Sorry Empty Page!"); 
			include "surat_masuk_delete.php"; break;		
		case 'Surat-Masuk-Edit' :
			if(!file_exists ("surat_masuk_edit.php")) die ("Sorry Empty Page!"); 
			include "surat_masuk_edit.php"; break;
		case 'Surat-Masuk-Detail' :
			if(!file_exists ("surat_masuk_detail.php")) die ("Sorry Empty Page!"); 
			include "surat_masuk_detail.php"; break;

		#Surat Keluar
		case 'Surat-Keluar-Data' :
			if(!file_exists ("surat_keluar_data.php")) die ("Sorry Empty Page!"); 
			include "surat_keluar_data.php";	 break;		
		case 'Surat-Keluar-Add' :
			if(!file_exists ("surat_keluar_add.php")) die ("Sorry Empty Page!"); 
			include "surat_keluar_add.php";	 break;		
		case 'Surat-Keluar-Delete' :
			if(!file_exists ("surat_keluar_delete.php")) die ("Sorry Empty Page!"); 
			include "surat_keluar_delete.php"; break;		
		case 'Surat-Keluar-Edit' :
			if(!file_exists ("surat_keluar_edit.php")) die ("Sorry Empty Page!"); 
			include "surat_keluar_edit.php"; break;
		case 'Surat-Keluar-Detail' :
			if(!file_exists ("surat_keluar_detail.php")) die ("Sorry Empty Page!"); 
			include "surat_keluar_detail.php"; break;

		# Laporan

		case 'Laporan-Surat-Masuk' :
			if(!file_exists ("laporan_masuk.php")) die ("Sorry Empty Page!"); 
			include "laporan_masuk.php"; break;	
		case 'Laporan-Surat-Keluar' :
			if(!file_exists ("laporan_keluar.php")) die ("Sorry Empty Page!"); 
			include "laporan_keluar.php"; break;	
		case 'Laporan-Disposisi' :
			if(!file_exists ("laporan_disposisi.php")) die ("Sorry Empty Page!"); 
			include "laporan_disposisi.php"; break;	

		default:
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";						
		break;
	}
}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("main.php")) die ("Empty Main Page!"); 
	include "main.php";	
}
?>