-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 03.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ljh_bsd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `onlinelisting`
--

CREATE TABLE `onlinelisting` (
  `no_ppp` int(11) NOT NULL,
  `tahun_ppp` int(50) NOT NULL,
  `nama_marketing` varchar(50) NOT NULL,
  `kategoriListing` varchar(50) NOT NULL,
  `jenisTransaksi` varchar(50) NOT NULL,
  `jenisListing` varchar(50) NOT NULL,
  `besaranKomisi` int(20) NOT NULL,
  `jangkaWaktu` varchar(100) NOT NULL,
  `sampaiDengan` varchar(100) NOT NULL,
  `jenisProperti` varchar(50) NOT NULL,
  `luasTanah` double NOT NULL,
  `lokasiTanah` varchar(50) NOT NULL,
  `luasBangunan` double NOT NULL,
  `area` varchar(50) NOT NULL,
  `blok` varchar(50) NOT NULL,
  `hadapView` varchar(50) NOT NULL,
  `jumlahLantai` int(20) NOT NULL,
  `alamatListingProperti` varchar(255) NOT NULL,
  `hargaJual` decimal(15,2) NOT NULL,
  `minLamaSewa` int(10) NOT NULL,
  `deposit` decimal(15,2) NOT NULL,
  `hargaSewa` decimal(15,2) NOT NULL,
  `cbSHM` varchar(20) NOT NULL,
  `noSHM` int(50) NOT NULL,
  `cbHGB` varchar(20) NOT NULL,
  `noHGB` int(50) NOT NULL,
  `tahunHGB` int(50) NOT NULL,
  `cbIMB` varchar(20) NOT NULL,
  `noIMB` int(50) NOT NULL,
  `cbPBB` varchar(20) NOT NULL,
  `noPBB` int(50) NOT NULL,
  `tahunPBB` int(50) NOT NULL,
  `cbNoHp` varchar(20) NOT NULL,
  `noHP` varchar(50) NOT NULL,
  `cbDokLainnya` varchar(20) NOT NULL,
  `dokLainnya` varchar(255) NOT NULL,
  `cbKamarTidur` varchar(20) NOT NULL,
  `kamarTidur` int(20) NOT NULL,
  `cbKamarMandi` varchar(20) NOT NULL,
  `kamarMandi` int(20) NOT NULL,
  `cbCarport` varchar(20) NOT NULL,
  `carport` int(20) NOT NULL,
  `cbRuangTamu` varchar(20) NOT NULL,
  `cbRuangKeluarga` varchar(20) NOT NULL,
  `cbRuangKerja` varchar(20) NOT NULL,
  `cbKolamRenang` varchar(20) NOT NULL,
  `cbTaman` varchar(20) NOT NULL,
  `cbTeras` varchar(20) NOT NULL,
  `cbGudang` varchar(20) NOT NULL,
  `cbDapur` varchar(20) NOT NULL,
  `kt_pembantu` varchar(20) NOT NULL,
  `km_pembantu` varchar(20) NOT NULL,
  `cbListrik` varchar(20) NOT NULL,
  `wattListrik` int(50) NOT NULL,
  `cbTelepon` varchar(20) NOT NULL,
  `lineTelepon` varchar(20) NOT NULL,
  `cbAC` varchar(20) NOT NULL,
  `unitAC` int(20) NOT NULL,
  `cbFurnished` varchar(20) NOT NULL,
  `cbUnfurnished` varchar(20) NOT NULL,
  `cbSemiFurnished` varchar(20) NOT NULL,
  `cbAirPAM` varchar(20) NOT NULL,
  `cbAirTanah` varchar(20) NOT NULL,
  `cbWaterHeater` varchar(20) NOT NULL,
  `fasKeterangan` varchar(255) NOT NULL,
  `namaPemilik` varchar(100) NOT NULL,
  `noKTPPemilik` int(100) NOT NULL,
  `noHPPemilik` varchar(20) NOT NULL,
  `noTelpRumahPemilik` varchar(50) NOT NULL,
  `emailPemilik` varchar(100) NOT NULL,
  `alamatPemilik` varchar(255) NOT NULL,
  `namaAgent` varchar(100) NOT NULL,
  `kantorAgent` varchar(100) NOT NULL,
  `noHPAgent` varchar(50) NOT NULL,
  `telpKantor` varchar(100) NOT NULL,
  `emailAgent` varchar(100) NOT NULL,
  `alamatAgent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `onlinelisting`
--

INSERT INTO `onlinelisting` (`no_ppp`, `tahun_ppp`, `nama_marketing`, `kategoriListing`, `jenisTransaksi`, `jenisListing`, `besaranKomisi`, `jangkaWaktu`, `sampaiDengan`, `jenisProperti`, `luasTanah`, `lokasiTanah`, `luasBangunan`, `area`, `blok`, `hadapView`, `jumlahLantai`, `alamatListingProperti`, `hargaJual`, `minLamaSewa`, `deposit`, `hargaSewa`, `cbSHM`, `noSHM`, `cbHGB`, `noHGB`, `tahunHGB`, `cbIMB`, `noIMB`, `cbPBB`, `noPBB`, `tahunPBB`, `cbNoHp`, `noHP`, `cbDokLainnya`, `dokLainnya`, `cbKamarTidur`, `kamarTidur`, `cbKamarMandi`, `kamarMandi`, `cbCarport`, `carport`, `cbRuangTamu`, `cbRuangKeluarga`, `cbRuangKerja`, `cbKolamRenang`, `cbTaman`, `cbTeras`, `cbGudang`, `cbDapur`, `kt_pembantu`, `km_pembantu`, `cbListrik`, `wattListrik`, `cbTelepon`, `lineTelepon`, `cbAC`, `unitAC`, `cbFurnished`, `cbUnfurnished`, `cbSemiFurnished`, `cbAirPAM`, `cbAirTanah`, `cbWaterHeater`, `fasKeterangan`, `namaPemilik`, `noKTPPemilik`, `noHPPemilik`, `noTelpRumahPemilik`, `emailPemilik`, `alamatPemilik`, `namaAgent`, `kantorAgent`, `noHPAgent`, `telpKantor`, `emailAgent`, `alamatAgent`) VALUES
(5, 2023, 'administrator', 'Primary', 'Jual', 'Open', 3, '12 Januari', '12 Desember', 'Ruko', 600, '', 200, 'X', 'M', 'timur', 2, 'tangerang', 15000000.00, 0, 0.00, 0.00, 'Tersedia', 131, 'Tersedia', 123, 123, 'Tersedia', 123, 'Tersedia', 123, 123, 'Tersedia', '123', 'Tersedia', '123', 'Tersedia', 2, 'Tersedia', 2, 'Tersedia', 2, 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 3200, 'Tersedia', '81387877878', 'Tersedia', 2, 'Furnished', '-', '-', 'Tersedia', 'Tersedia', 'Tersedia', '2', '123', 123, '123', '123', '123', '123', '123', '123', '123', '(021)40 000 916 / ', '123', '123'),
(6, 2023, 'administrator', 'Primary', 'Jual', 'Open', 5, 'januari 2024', 'januari 2025', 'Rumah', 300, '', 250, '51', 'K', 'Barat Daya', 5, 'CIKUPA', 0.00, 1, 12000000.00, 30000000.00, 'Tersedia', 1231, 'Tersedia', 1231, 2014, 'Tersedia', 12312313, 'Tersedia', 12312, 2014, 'Tersedia', '92183910823', 'Tersedia', '1231', 'Tersedia', 1, 'Tersedia', 2, 'Tersedia', 1, 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 'Tersedia', 3200, 'Tersedia', '0901283123', 'Tersedia', 1, 'Furnished', '-', '-', 'Tersedia', 'Tersedia', 'Tersedia', '-', 'Zulkifli', 1340194148, '91831924', '91282312', 'adlkjalj@mail.com', 'akdjldjfdklasjf', 'kSJKJFAJSF', 'kajdlkjfj', '09804825', '(021)40 000 916 / ', 'kkjlkdjsj@mail.com', 'kjsdlfjsklj'),
(7, 2023, 'administrator', 'Primary', 'Jual', 'Open', 123, '123', '123', 'Ruko', 0, '', 0, 'test', 'test', 'test', 0, 'test', 123.00, 123, 123.00, 123.00, 'Tersedia', 123, 'Tersedia', 123, 123, 'Tersedia', 123, 'Tersedia', 123, 123, 'Tersedia', '123', 'Tersedia', '123', 'Tersedia', 123, 'Tersedia', 123, 'Tersedia', 123, 'Tersedia', 'Tersedia', 'Tersedia', '-', '-', '-', '-', '-', '-', '-', 'Tersedia', 123, 'Tersedia', '123', '-', 0, '-', '-', 'Semi-Furnished', '-', '-', '-', '', 'test', 123, '123', '123', 'test', 'test', 'test', 'test', '123', '(021)40 000 916 / ', 'test', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `kantor` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `hp`, `kantor`, `alamat`) VALUES
(2, 'user', 'user123', 'user@example.com', 'user', '987654321', 'User Office', 'User Address'),
(3, 'rhyza', 'rhyza123', 'rhyza@fakemail.com', 'user', '09128391283', 'bsd', 'cisauk'),
(4, 'yaya', 'yaya123', 'yaya@mail.com', 'user', '09012830812', 'ICON BSD', 'Bogor'),
(5, 'Dhani', '$2y$10$HopqP9SO/o86O.NBFhUyB.MviQ5h9hKB/D3F0v3vqfDra0sHNZYfm', 'dhani@mail.com', 'user', '091823012', 'ICON BSD', 'Curug'),
(6, 'rara', '$2y$10$XO/FbhAIZhk4gJbndcE2f.4GoTBPgK0SziSHHATM7md9WRZc5XDtG', 'rara@rocketmail.com', 'user', '123123123', 'bsd', 'tv'),
(7, 'nusa', '$2y$10$mPwPtI0aOG8c7aKEwW/kCeL3AvkSOVRXXu2iiCBix9Ql9fKNTn.I2', 'nusa@googlemail.com', 'user', '123190391023', 'BSD', 'TV 1'),
(8, 'administrator', '$2y$10$JYHd5RtsmarWKyfK0LKNP.9qrL.uyYtjQ7Ux3Iti46UmJ0zNrBWJO', 'adminljhbsd@gmail.com', 'admin', '081203910293', 'ICON BSD', 'ICON BSD');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `onlinelisting`
--
ALTER TABLE `onlinelisting`
  ADD PRIMARY KEY (`no_ppp`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `onlinelisting`
--
ALTER TABLE `onlinelisting`
  MODIFY `no_ppp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
