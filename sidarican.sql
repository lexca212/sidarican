-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Nov 2025 pada 10.33
-- Versi server: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `sidarican`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kendaraan`
--

CREATE TABLE `data_kendaraan` (
    `id_kendaraan` int(11) NOT NULL,
    `nm_kendaraan` varchar(255) NOT NULL,
    `merk_kendaraan` varchar(255) NOT NULL,
    `nopol_kendaraan` varchar(255) NOT NULL,
    `kd_bbm` varchar(255) NOT NULL,
    `tahun_kendaraan` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kendaraan`
--

INSERT INTO
    `data_kendaraan` (
        `id_kendaraan`,
        `nm_kendaraan`,
        `merk_kendaraan`,
        `nopol_kendaraan`,
        `kd_bbm`,
        `tahun_kendaraan`
    )
VALUES (
        1,
        'Grandis',
        'Mitsubishi',
        'AD 1234 GG',
        'Pertalite',
        2018
    ),
    (
        2,
        'Jazz',
        'Honda',
        'AD 2233 GG',
        'Pertalite',
        2021
    ),
    (
        3,
        'Trontong',
        'Suzuki',
        'AD 1122 GG',
        'Solar',
        2025
    ),
    (
        7,
        'Prosche',
        'Honda',
        'AD 2233 GG',
        'PL01',
        2021
    );

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bbm`
--

CREATE TABLE `master_bbm` (
    `kd_bbm` varchar(10) NOT NULL,
    `nama_bbm` varchar(50) NOT NULL,
    `harga_bbm` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_bbm`
--

INSERT INTO
    `master_bbm` (
        `kd_bbm`,
        `nama_bbm`,
        `harga_bbm`
    )
VALUES ('PL01', 'Pertalite', '10000'),
    ('SR01', 'Solar', '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_bbm`
--

CREATE TABLE `pembelian_bbm` (
    `id_pembelian` int(12) NOT NULL,
    `kd_bbm` varchar(11) NOT NULL,
    `harga_bbm` varchar(50) NOT NULL,
    `jml_liter_bbm` varchar(50) NOT NULL,
    `jml_harga_bbm` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
    `id_user` int(11) NOT NULL,
    `nama` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO
    `user` (
        `id_user`,
        `nama`,
        `username`,
        `password`
    )
VALUES (
        1,
        'Lexca Helga',
        'admin',
        '21232f297a57a5a743894a0e4a801fc3'
    );

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kendaraan`
--
ALTER TABLE `data_kendaraan` ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `pembelian_bbm`
--
ALTER TABLE `pembelian_bbm` ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user` ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT untuk tabel `pembelian_bbm`
--
ALTER TABLE `pembelian_bbm`
MODIFY `id_pembelian` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

COMMIT;

--
-- Struktur dari tabel `perjalanan`
--

CREATE TABLE `perjalanan` (
    `id_perjalanan` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `tujuan` varchar(255) NOT NULL,
    `tgl_perjalanan` datetime NOT NULL,
    `km_awal` int(11) NOT NULL,
    `km_akhir` int(11),
    `id_kendaraan` int(11) NOT NULL,
    FOREIGN KEY (id_kendaraan) REFERENCES data_kendaraan (`id_kendaraan`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kendaraan`
--

INSERT INTO
    `perjalanan` (
        `id_perjalanan`,
        `tujuan`,
        `tgl_perjalanan`,
        `km_awal`,
        `km_akhir`,
        `id_kendaraan`
    )
VALUES (
        1,
        'kidul alun-alun',
        '17-08-1945',
        170840,
        311025,
        1
    );

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;