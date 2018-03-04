DROP TABLE disposition;

CREATE TABLE `disposition` (
  `id_disposition` varchar(10) NOT NULL,
  `disposition_at` date NOT NULL,
  `reply_at` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `notification` varchar(32) NOT NULL,
  `id_mail` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id_disposition`),
  KEY `mailid` (`id_mail`),
  KEY `userid` (`id_user`),
  CONSTRAINT `disposition_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `disposition_ibfk_2` FOREIGN KEY (`id_mail`) REFERENCES `mail` (`id_mail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO disposition VALUES("D0001","2018-02-20","Agus Setiawan, S.Pd, M.Si.","Oke","Siap","M0001","U0001");



DROP TABLE mail;

CREATE TABLE `mail` (
  `id_mail` varchar(10) NOT NULL,
  `incoming_at` date NOT NULL,
  `mail_code` varchar(20) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_from` varchar(32) NOT NULL,
  `mail_to` varchar(32) NOT NULL,
  `mail_subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `file_upload` varchar(100) NOT NULL,
  `id_mail_type` varchar(10) NOT NULL,
  `disposisi` int(2) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id_mail`),
  KEY `mail_typeid` (`id_mail_type`),
  KEY `mail_typeid_2` (`id_mail_type`),
  KEY `userid` (`id_user`),
  CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`id_mail_type`) REFERENCES `mail_type` (`id_mail_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mail VALUES("M0001","2018-02-15","PTPI/XXI/2018","2018-02-20","PT. Pharos Indonesia","SMKN 2 BEKASI","Lowongan Pekerjaan","Untuk siswa/i jurusan RPL,TKJ, & TEI.","","J0001","2","U0001");
INSERT INTO mail VALUES("M0002","2018-02-16","001/PPH/VI/2018","2018-02-21","Pd. Pesantren Hidayatullah","SMKN 2 BEKASI","Permohonan Zakat Fitrah","Pd. Pesantren Hidayatullah mengajukan permohonan \"Zakat Fitrah\" kepada lembaga atau instansi yg anda kelola.","601-surat masuk 1.jpg","J0005","1","U0001");
INSERT INTO mail VALUES("M0003","2018-02-16","074/NAZNAS.JTM/IV/20","2018-02-21","BAZNAS (Badan Amil Zakat Nasiona","SMKN 2 BEKASI","Realisasi Bantuan Beasiswa","Bahwa  pemohon beasiswa yg saudara ajukan kepada BAZNAS telah direalisasikan senilai Rp. 800.000,- per tahun.","7523-surat masuk 2.jpg","J0001","1","U0001");



DROP TABLE mail_out;

CREATE TABLE `mail_out` (
  `id_mail_out` varchar(10) NOT NULL,
  `outmail_at` date NOT NULL,
  `mail_code` varchar(32) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `mail_subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `file_upload` varchar(256) NOT NULL,
  `id_mail_type` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  PRIMARY KEY (`id_mail_out`),
  KEY `id_user` (`id_user`),
  KEY `id_mail_type` (`id_mail_type`),
  CONSTRAINT `mail_out_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mail_out VALUES("K0001","2018-02-14","001/SMKN2BEKASI/2018","2018-02-21","SMKN 5 BEKASI","Sparing Futsal","Ayo kita sparing futsal","","J0002","U0001");



DROP TABLE mail_type;

CREATE TABLE `mail_type` (
  `id_mail_type` varchar(10) NOT NULL,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id_mail_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mail_type VALUES("J0001","Resmi");
INSERT INTO mail_type VALUES("J0002","Pribadi");
INSERT INTO mail_type VALUES("J0003","Penting");
INSERT INTO mail_type VALUES("J0004","Undangan");
INSERT INTO mail_type VALUES("J0005","Permohonan");



DROP TABLE user;

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("U0001","Admin","admin","Muhammad Shofwan","1");
INSERT INTO user VALUES("U0002","User","1","User Ajah","2");



