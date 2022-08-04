-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2020 pada 12.30
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nip` varchar(19) DEFAULT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `eselon` varchar(50) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `sampai_tgl` date DEFAULT NULL,
  `status_jabatan` enum('aktif','nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nip`, `nama_jabatan`, `eselon`, `tmt`, `sampai_tgl`, `status_jabatan`) VALUES
(1, '0987654543432212324', 'Penata Muda', '3a', '2013-05-11', '2015-05-11', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `nik` varchar(19) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `nama_keluarga` varchar(50) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `hubungan` enum('suami','istri','anak','ibu','ayah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`nik`, `nip`, `nama_keluarga`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `pekerjaan`, `hubungan`) VALUES
('1908120938019283', '0987654543432212324', 'sulastri', 'pekanbaru', '1980-06-11', 'sd', 'ibu rumah tangga', 'ibu'),
('980982312498798', '0987654543432212324', 'ramadhan', 'pekanbaru', '1972-06-11', 'smp', 'pedagang', 'ayah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `nama_pangkat` varchar(50) NOT NULL,
  `jenis_pangkat` varchar(50) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `sah_sk` date NOT NULL,
  `nama_pengesah_sk` varchar(50) NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `status_pangkat` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nip`, `nama_pangkat`, `jenis_pangkat`, `tmt_pangkat`, `sah_sk`, `nama_pengesah_sk`, `no_sk`, `status_pangkat`) VALUES
(1, '0987654543432212324', 'penata muda', '3a', '2018-06-11', '2018-06-12', 'rusli s.ag', '09283skldjflk', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(19) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto_pegawai` varchar(255) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `gol_darah` enum('o','a','b','ab') NOT NULL,
  `status_pernikahan` enum('kawin','lajang') NOT NULL,
  `status_kepegawaian` enum('pns','honor') NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `foto_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `agama`, `email`, `alamat`, `gol_darah`, `status_pernikahan`, `status_kepegawaian`, `status_user`) VALUES
('0987654543432212324', 'suci', '5ee0898648916.png', 'langgam', '2007-06-10', 'perempuan', '234234234', 'islam', 'suci@sdkl.com', 'jalan. kenanga', 'b', 'lajang', 'honor', 'aktif'),
('1535107781234567', 'dika sanjaya', '5ee089589bf1d.jpg', 'pekanbaru', '2010-05-09', 'laki-laki', '0812121323', 'Islam', 'dika@gma.com', 'jalan. kamboja', 'ab', 'kawin', 'pns', 'aktif'),
('8792734987239847', 'juki', '5ee1dcbe14d8e.jpg', 'pekanbaru', '2008-06-10', 'laki-laki', '085283888437', 'Islam', 'juki@gmai.ocm', 'jalan. raya', 'ab', 'kawin', 'pns', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nip` varchar(19) DEFAULT NULL,
  `tingkat` varchar(50) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `no_ijazah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nip`, `tingkat`, `nama_sekolah`, `lokasi`, `jurusan`, `tgl_ijazah`, `no_ijazah`) VALUES
(1, '0987654543432212324', 'SLTA', 'SMK Negeri 5 Pekanbaru', 'Jalan. Duku Pekanbaru Riau', 'Administrasi Perkantoran', '2001-06-11', 'lk90820398');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$OHk2a6CP3zV00xwWv6r9QOhMcdCoLOJP7nbeB2rWXlGpzSfmskR7G');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `nip2` (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD CONSTRAINT `pangkat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `nip2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
