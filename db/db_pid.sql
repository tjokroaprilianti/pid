-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 11.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses_cost_center`
--

CREATE TABLE `tb_akses_cost_center` (
  `id_akses_cost_center` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `cost_center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses_cost_unit`
--

CREATE TABLE `tb_akses_cost_unit` (
  `id_akses_cost_unit` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `cost_unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cost_center`
--

CREATE TABLE `tb_cost_center` (
  `id_cost_center` int(11) NOT NULL,
  `kode_cost_center` varchar(225) NOT NULL,
  `nama_cost_center` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cost_center`
--

INSERT INTO `tb_cost_center` (`id_cost_center`, `kode_cost_center`, `nama_cost_center`) VALUES
(1, 'CC00', 'Default Cost Center'),
(2, 'CC01', 'Saphire'),
(3, 'CC02', 'Lounge'),
(4, 'CC02.3', 'CIP Lounge'),
(5, 'CC02.2', 'KSO Lounge'),
(6, 'CC02.21', 'KSO Lounge Trikama Boga'),
(7, 'CC02.22', 'KSO Lounge Blue Sky'),
(8, 'CC02.23', 'KSO Lounge Mandai'),
(9, 'CC02.24', 'KSO Lounge Premi Air'),
(10, 'CC02.25', 'KSO Lounge Global'),
(11, 'CC02.1', 'Lounge'),
(12, 'CC03', 'ICT'),
(13, 'CC04', 'Media'),
(14, 'CC05', 'Parking'),
(15, 'CC06', 'Avsec & Security'),
(16, 'CC07', 'Regulated Agent'),
(17, 'CC08', 'Consultancy'),
(18, 'CC09', 'Suport'),
(19, 'CC10', 'Head Office'),
(20, 'CC10.6', 'GA'),
(21, 'CC10.5', 'Finance'),
(22, 'CC10.1', 'BOC & BOD'),
(23, 'CC10.4', 'HR'),
(24, 'CC10.11', 'CORSEC'),
(25, 'CC10.2', 'Internal Auditor'),
(26, 'CC10.3', 'Risk Management'),
(27, 'CC10.10', 'Business Development'),
(28, 'CC10.9', 'ERP&IT'),
(29, 'CC10.12', 'Marketing'),
(30, 'CC10.13', 'Probis TOC'),
(31, 'CC10.14', 'IN ORGANIC'),
(32, 'CC10.8', 'PASSENGER SERVICE (PS)'),
(33, 'CC010.7', 'FACILITY SERVICE (FS)'),
(34, 'CC10.15', 'LEGAL'),
(35, 'CC10.16', 'Penagihan'),
(36, 'CC11', 'X-RAY'),
(37, 'CC12', 'Retail'),
(38, 'CC13', 'Cleaning Service'),
(39, 'CC14', 'Wrapping'),
(40, 'CC15', 'Facility Enginering'),
(41, 'CC15.1', 'Operation & Maintenance'),
(42, 'CC15.2', 'Project'),
(43, 'CC16', 'Airport Helper'),
(44, 'CC17', 'Customer Service'),
(45, 'CC18', 'Branch Office'),
(46, 'CC101', 'Anak Usaha APSI'),
(47, 'CC102', 'Anak Usaha APSD'),
(48, 'CC103', 'ELIMINASI APSI'),
(49, 'CC104', 'ELIMINASI APSD'),
(50, 'CC20', 'Concierge Express'),
(51, 'CC21', 'Non Direktorat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cost_unit`
--

CREATE TABLE `tb_cost_unit` (
  `id_cost_unit` int(11) NOT NULL,
  `kode_cost_unit` varchar(225) NOT NULL,
  `nama_cost_unit` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cost_unit`
--

INSERT INTO `tb_cost_unit` (`id_cost_unit`, `kode_cost_unit`, `nama_cost_unit`) VALUES
(1, 'CU01', 'BSH (CGK)'),
(2, 'CU02', 'HALIM (HLP)'),
(3, 'CU03', 'BANDUNG (BDO)'),
(4, 'CU04', 'PONTIANAK (PNK)'),
(5, 'CU05', 'PALEMBANG (PLM)'),
(6, 'CU06', 'PANGKAL PINANG (PGK)'),
(7, 'CU07', 'JAMBI (DJB)'),
(8, 'CU08', 'PEKANBARU (PKU)'),
(9, 'CU09', 'PADANG (PDG)'),
(10, 'CU10', 'MEDAN (KNO)'),
(11, 'CU11', 'BANDA ACEH (BTJ)'),
(12, 'CU12', 'TANJUNG PINANG (TNJ)'),
(13, 'CU13', 'HEAD OFFICE'),
(14, 'CU14', 'UMROH LOUNGE'),
(15, 'CU15', 'SILANGIT'),
(16, 'CU16', 'KSO'),
(17, 'CU17', 'Smart Airport'),
(18, 'CU18', 'BANYUWANGI'),
(19, 'CU19', 'PALANGKARAYA'),
(20, 'CU20', 'BANDAR LAMPUNG'),
(21, 'CU21', 'FINANCE'),
(22, 'CU22', 'GA'),
(23, 'CU23', 'HR'),
(24, 'CU24', 'BOD'),
(25, 'CU25', 'RISK MANAGEMENT'),
(26, 'CU26', 'INTERNAL AUDITOR'),
(27, 'CU27', 'CORSEC & LEGAL'),
(28, 'CU28', 'BUSDEV'),
(29, 'CU29', 'LEGAL'),
(30, 'CU30', 'BENGKULU'),
(31, 'CU31', 'KERTAJATI'),
(32, 'CU00', 'Default Cost Unit'),
(33, 'CU41', 'ERP & IT'),
(34, 'CU35', 'IN-ORGANIC'),
(35, 'CU32', 'SAMARINDA'),
(36, 'CU33', 'BELITUNG/TANJUNG PANDAN'),
(37, 'CU36', 'JAKARTA'),
(38, 'CU37', 'KC BSH UNIT'),
(39, 'CU34', 'PBU HALUOLEO KENDARI (KDI)'),
(40, 'CU38', 'PURBALINGGA'),
(41, 'CU39', 'UPBU KALIMARAU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id_histori` int(11) NOT NULL,
  `kode_pengajuan` varchar(125) NOT NULL,
  `status_histori` enum('MENUNGGU','DI PROSES','SELESAI','DITOLAK') NOT NULL,
  `penerima` int(11) NOT NULL,
  `created_at_histori` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_histori`
--

INSERT INTO `tb_histori` (`id_histori`, `kode_pengajuan`, `status_histori`, `penerima`, `created_at_histori`) VALUES
(1, '6be4c319c32ce8eba89592f1cf7cdc45', 'MENUNGGU', 2, '2022-06-30 04:10:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lampiran`
--

CREATE TABLE `tb_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `nama_berkas_lampiran` varchar(225) NOT NULL,
  `file_lampiran` varchar(225) NOT NULL,
  `tanggal_mulai_lampiran` date NOT NULL,
  `tanggal_akhir_lampiran` date NOT NULL,
  `tanggal_update_lampiran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `kode_pengajuan` varchar(125) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost_center_id` int(11) NOT NULL,
  `cost_unit_id` int(11) NOT NULL,
  `tanggal_invoice_pengajuan` datetime NOT NULL,
  `proyek_pengajuan` varchar(225) NOT NULL,
  `vendor_pengajuan` varchar(225) NOT NULL,
  `alamat_vendor_pengajuan` varchar(225) NOT NULL,
  `vet_pajak_pengajuan` text NOT NULL,
  `dpp_pajak_pengajuan` text NOT NULL,
  `created_at_pengajuan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `kode_pengajuan`, `user_id`, `cost_center_id`, `cost_unit_id`, `tanggal_invoice_pengajuan`, `proyek_pengajuan`, `vendor_pengajuan`, `alamat_vendor_pengajuan`, `vet_pajak_pengajuan`, `dpp_pajak_pengajuan`, `created_at_pengajuan`) VALUES
(1, '6be4c319c32ce8eba89592f1cf7cdc45', 2, 6, 1, '2022-06-30 11:08:23', 'Pengajuan Upgrade Banwidth Internet 80Mbps ke 120Mbps', 'LintasArta NET', 'Jakarta Selatan', 'asdasd', 'asdasd', '2022-06-30 04:10:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'ERP & IT'),
(2, 'HRD & Human Resource'),
(3, 'Retail');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(225) NOT NULL,
  `username_user` varchar(115) NOT NULL,
  `password_user` varchar(225) NOT NULL,
  `avatar_user` varchar(255) NOT NULL,
  `status_user` enum('On','Off','','') NOT NULL,
  `role` enum('Admin','Unit','Manager','Accountig','Pajak','Pembayaran') NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username_user`, `password_user`, `avatar_user`, `status_user`, `role`, `unit_id`) VALUES
(1, 'Mochamad Maulana', 'admin', '$2y$10$/9dEcX4jUJwZV9u4zqs/qeEExOvLcSQIJ5Bp/Cohf0kOq/5.vt1lu', 'avatar-0622765601.jpg', 'On', 'Admin', 1),
(2, 'Tommi Sugiarto', 'user', '$2y$10$PrEvsVh9cZgXr8rl92kJceES4HCrRrSJiyrj3k4iLhmFUQeKxdWfy', 'default.jpg', 'On', 'Unit', 2),
(4, 'Quais Mumtaz', 'quais', '$2y$10$M/qtp2A66YHp9h76cjmZaOdHBpJfupB6o4XPKizBIV7X/zXUORh0a', 'avatar-220629165622.png', 'On', 'Manager', 2),
(5, 'Aji Pangestu Kadek', 'aji', '$2y$10$ts0FFWoJhnpUYmEjFm4dSO8rTlD4TWrc.JdBD/.PAzMJuJse7rwDq', 'default.jpg', 'On', 'Pajak', 2),
(6, 'Alya Ebong', 'alya', '$2y$10$iw/9CyErh.16/UfDgofkouSLfue083RCxbwCULQme3g30q4GtLd16', 'avatar-220629165916.jpg', 'On', 'Accountig', 2),
(7, 'Apriyansyah Sangkuni', 'apri', '$2y$10$ePisav7V8ES2eCOzJbGpA.tkK8T0uYCvqx37SNLIreqtGrpzZx0KG', 'default.jpg', 'On', 'Pembayaran', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tb_akses_cost_center`
--
ALTER TABLE `tb_akses_cost_center`
  ADD PRIMARY KEY (`id_akses_cost_center`);

--
-- Indeks untuk tabel `tb_akses_cost_unit`
--
ALTER TABLE `tb_akses_cost_unit`
  ADD PRIMARY KEY (`id_akses_cost_unit`);

--
-- Indeks untuk tabel `tb_cost_center`
--
ALTER TABLE `tb_cost_center`
  ADD PRIMARY KEY (`id_cost_center`);

--
-- Indeks untuk tabel `tb_cost_unit`
--
ALTER TABLE `tb_cost_unit`
  ADD PRIMARY KEY (`id_cost_unit`);

--
-- Indeks untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `penerima` (`penerima`);

--
-- Indeks untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `cost_center_id` (`cost_center_id`),
  ADD KEY `cost_unit_id` (`cost_unit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_akses_cost_center`
--
ALTER TABLE `tb_akses_cost_center`
  MODIFY `id_akses_cost_center` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_akses_cost_unit`
--
ALTER TABLE `tb_akses_cost_unit`
  MODIFY `id_akses_cost_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_cost_center`
--
ALTER TABLE `tb_cost_center`
  MODIFY `id_cost_center` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tb_cost_unit`
--
ALTER TABLE `tb_cost_unit`
  MODIFY `id_cost_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
