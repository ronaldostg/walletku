-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2021 pada 06.25
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walletku_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2021-09-16-045822', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1631784348, 1),
(14, '2021-09-16-063259', 'App\\Database\\Migrations\\Payment', 'default', 'App', 1631784348, 1),
(15, '2021-09-16-064201', 'App\\Database\\Migrations\\StatusPayment', 'default', 'App', 1631784348, 1),
(16, '2021-09-16-072554', 'App\\Database\\Migrations\\TransactionType', 'default', 'App', 1631784348, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wk_customer`
--

CREATE TABLE `wk_customer` (
  `customer_id` int(100) UNSIGNED NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `fullname` varchar(1000) NOT NULL,
  `phone_number` varchar(1000) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `wk_customer`
--

INSERT INTO `wk_customer` (`customer_id`, `username`, `password`, `fullname`, `phone_number`, `birthday`, `gender`, `balance`, `created_at`) VALUES
(1, 'ronaldostg', 'ronaldo123', 'Ronaldo Sitanggang', '081232233222', '1999-10-12', 'L', 500000, '2021-09-16'),
(2, 'nurdinsjafii', 'nurdinsjafii123', 'Nurdin Sjafii', '081232233222', '2003-05-15', 'L', 100000, '2021-09-16'),
(3, 'ahmadsng', '$2y$10$rBiA2OM1QwEtCVu/wChzS.wQB1rd.bR88E4vXfkMyRzhJUrDbmOEq', 'Ahmad Sinaga', '089967775566', '1999-10-12', 'L', 0, '2021-09-16'),
(4, 'suryangl', '$2y$10$fQ2w2REFxUnt6Ox1aYClVeVHDNYZSuzu.suPiI6Sg0QGvw.l7RMEu', 'Surya Nainggolan', '089967775566', '1999-10-12', 'L', 0, '2021-09-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wk_payment`
--

CREATE TABLE `wk_payment` (
  `payment_id` int(100) UNSIGNED NOT NULL,
  `number_payment` varchar(1000) NOT NULL,
  `amount` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status_payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `wk_payment`
--

INSERT INTO `wk_payment` (`payment_id`, `number_payment`, `amount`, `description`, `status_payment_id`, `customer_id`, `transaction_type_id`, `created_at`) VALUES
(1, '#477r4ig45gu4g', '50000', 'Pembayaran listrik mas angga', 1, 2, 2, '2021-09-16'),
(2, '#48989', '50000', 'Pembayaran listrik bunda ragil', 2, 2, 3, '2021-09-16'),
(3, '#gfregergerg21321', '500000', 'beli voucher ff', 2, 4, 2, NULL),
(7, 'WK-4654', '500000', 'Beli pulsa buat mami', 1, 21, 3, '2021-09-17'),
(8, 'WK-5046', '500000', 'Beli pulsa buat papa ragil', 1, 3, 3, '2021-09-17'),
(9, 'WK-681', '500000', 'Beli pulsa buat papa ragil', 1, 3, 3, '2021-09-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wk_status_payment`
--

CREATE TABLE `wk_status_payment` (
  `status_id` int(100) UNSIGNED NOT NULL,
  `status_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `wk_status_payment`
--

INSERT INTO `wk_status_payment` (`status_id`, `status_name`) VALUES
(1, 'In Process'),
(2, 'Success'),
(3, 'Failed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wk_transaction_type`
--

CREATE TABLE `wk_transaction_type` (
  `transaction_type_id` int(10) UNSIGNED NOT NULL,
  `transaction_type_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `wk_transaction_type`
--

INSERT INTO `wk_transaction_type` (`transaction_type_id`, `transaction_type_name`) VALUES
(1, 'Pulsa'),
(2, 'Token PLN'),
(3, 'Voucher Game');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wk_customer`
--
ALTER TABLE `wk_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `wk_payment`
--
ALTER TABLE `wk_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `wk_status_payment`
--
ALTER TABLE `wk_status_payment`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `wk_transaction_type`
--
ALTER TABLE `wk_transaction_type`
  ADD PRIMARY KEY (`transaction_type_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wk_customer`
--
ALTER TABLE `wk_customer`
  MODIFY `customer_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wk_payment`
--
ALTER TABLE `wk_payment`
  MODIFY `payment_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wk_status_payment`
--
ALTER TABLE `wk_status_payment`
  MODIFY `status_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wk_transaction_type`
--
ALTER TABLE `wk_transaction_type`
  MODIFY `transaction_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
