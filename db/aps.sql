-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Feb 2018 pada 02.17
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposition`
--

CREATE TABLE `disposition` (
  `id_disposition` varchar(10) NOT NULL,
  `disposition_at` date NOT NULL,
  `reply_at` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `notification` varchar(32) NOT NULL,
  `id_mail` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposition`
--

INSERT INTO `disposition` (`id_disposition`, `disposition_at`, `reply_at`, `description`, `notification`, `id_mail`, `id_user`) VALUES
('D0001', '2018-02-20', 'Agus Setiawan, S.Pd, M.Si.', 'Oke', 'Siap', 'M0001', 'U0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail`
--

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
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mail`
--

INSERT INTO `mail` (`id_mail`, `incoming_at`, `mail_code`, `mail_date`, `mail_from`, `mail_to`, `mail_subject`, `description`, `file_upload`, `id_mail_type`, `disposisi`, `id_user`) VALUES
('M0001', '2018-02-15', 'PTPI/XXI/2018', '2018-02-20', 'PT. Pharos Indonesia', 'SMKN 2 BEKASI', 'Lowongan Pekerjaan', 'Untuk siswa/i jurusan RPL,TKJ, & TEI.', '', 'J0001', 2, 'U0001'),
('M0002', '2018-02-16', '001/PPH/VI/2018', '2018-02-21', 'Pd. Pesantren Hidayatullah', 'SMKN 2 BEKASI', 'Permohonan Zakat Fitrah', 'Pd. Pesantren Hidayatullah mengajukan permohonan \"Zakat Fitrah\" kepada lembaga atau instansi yg anda kelola.', '601-surat masuk 1.jpg', 'J0005', 1, 'U0001'),
('M0003', '2018-02-16', '074/NAZNAS.JTM/IV/20', '2018-02-21', 'BAZNAS (Badan Amil Zakat Nasiona', 'SMKN 2 BEKASI', 'Realisasi Bantuan Beasiswa', 'Bahwa  pemohon beasiswa yg saudara ajukan kepada BAZNAS telah direalisasikan senilai Rp. 800.000,- per tahun.', '7523-surat masuk 2.jpg', 'J0001', 1, 'U0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_out`
--

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
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mail_out`
--

INSERT INTO `mail_out` (`id_mail_out`, `outmail_at`, `mail_code`, `mail_date`, `mail_to`, `mail_subject`, `description`, `file_upload`, `id_mail_type`, `id_user`) VALUES
('K0001', '2018-02-14', '001/SMKN2BEKASI/2018', '2018-02-21', 'SMKN 5 BEKASI', 'Sparing Futsal', 'Ayo kita sparing futsal', '', 'J0002', 'U0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_type`
--

CREATE TABLE `mail_type` (
  `id_mail_type` varchar(10) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mail_type`
--

INSERT INTO `mail_type` (`id_mail_type`, `type`) VALUES
('J0001', 'Resmi'),
('J0002', 'Pribadi'),
('J0003', 'Penting'),
('J0004', 'Undangan'),
('J0005', 'Permohonan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `level`) VALUES
('U0001', 'Admin', 'admin', 'Muhammad Shofwan', 1),
('U0002', 'User', '1', 'User Ajah', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposition`
--
ALTER TABLE `disposition`
  ADD PRIMARY KEY (`id_disposition`),
  ADD KEY `mailid` (`id_mail`),
  ADD KEY `userid` (`id_user`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_mail`),
  ADD KEY `mail_typeid` (`id_mail_type`),
  ADD KEY `mail_typeid_2` (`id_mail_type`),
  ADD KEY `userid` (`id_user`);

--
-- Indexes for table `mail_out`
--
ALTER TABLE `mail_out`
  ADD PRIMARY KEY (`id_mail_out`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mail_type` (`id_mail_type`);

--
-- Indexes for table `mail_type`
--
ALTER TABLE `mail_type`
  ADD PRIMARY KEY (`id_mail_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposition`
--
ALTER TABLE `disposition`
  ADD CONSTRAINT `disposition_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposition_ibfk_2` FOREIGN KEY (`id_mail`) REFERENCES `mail` (`id_mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`id_mail_type`) REFERENCES `mail_type` (`id_mail_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mail_out`
--
ALTER TABLE `mail_out`
  ADD CONSTRAINT `mail_out_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
