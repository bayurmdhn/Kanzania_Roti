-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2019 pada 18.32
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpbayu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email_admin` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password`, `foto_admin`) VALUES
(2, 'bayu', 'admin@gmail.com', 'admin', 'admin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog_produk`
--

CREATE TABLE `katalog_produk` (
  `id_katalogproduk` int(11) NOT NULL,
  `gambar_katalogproduk` text NOT NULL,
  `nama_katalogproduk` varchar(20) NOT NULL,
  `deskripsi_katalog` text NOT NULL,
  `harga_modalkatalog` int(11) NOT NULL,
  `harga_katalogproduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katalog_produk`
--

INSERT INTO `katalog_produk` (`id_katalogproduk`, `gambar_katalogproduk`, `nama_katalogproduk`, `deskripsi_katalog`, `harga_modalkatalog`, `harga_katalogproduk`) VALUES
(9, 'rotikanzania___Bw0ocIJJYx-___.jpg', 'Roti Sisir', 'Roti sisir yang enak sekali.', 3000, 4000),
(10, 'rotikanzania___Bw0g6MWJ5qT___.jpg', 'Roti Kacang ', 'Roti isi kacang yang nikmat.', 3000, 4000),
(11, 'rotikanzania___Bwygi-xp7nR___.jpg', 'Roti Keju Manis', 'Roti manis rasa keju', 4000, 5500),
(12, 'rotikanzania___BwwlAQapOPr___.jpg', 'Roti Bun Kopi', 'Roti ini bikin melek.', 4000, 5500),
(13, 'rotikanzania___Bwv_FykpZMH___.jpg', 'Roti Durian', 'Roti Durian enak loh.', 4500, 6000),
(14, 'rotikanzania___Bws2HgapcNq___.jpg', 'Songgo Buwono', 'Cocok untuk prasmanan ', 3000, 4000),
(15, 'rotikanzania___BwonXGkpgwn___.jpg', 'Roti Sosis Bratwurst', 'enak enak enak ', 3000, 4000),
(16, 'rotikanzania___BfdcMbsAePD___.jpg', 'Roti Krim Vanilla', 'mantap Bun.', 4000, 5000),
(17, 'rotikanzania___Bfc0xkGgGDd___.jpg', 'Roti Abon', 'mantap nikmat dan merakyat', 4000, 6000),
(18, 'rotikanzania___BfQrA2OgjS6___.jpg', 'Roti Pisang Coklat', 'mantap nikmat nikmat', 4000, 6000),
(19, 'rotikanzania___BfR8rwIgchY___.jpg', 'Roti Coklat', 'mantil mantap betul', 3000, 4000),
(20, 'rotikanzania___BfR8j8MA6wy___.jpg', 'Roti Sosis ', 'mantap nikmat', 4000, 6000),
(21, 'rotikanzania___BfR6833gw9m___.jpg', 'Puding Buah', 'Segarrrrrr', 5000, 7000),
(22, 'rotikanzania___BfQuD5VAb8c___.jpg', 'Roti Keju Mozzarella', 'enak kejunya mamamama', 5000, 7000),
(23, 'rotikanzania___BfQrOxPgnYj___.jpg', 'Roti Nanas', 'jajanan pasar', 3000, 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Cake'),
(5, 'jajanan pasar'),
(6, 'Kue Kering'),
(9, 'Roti'),
(13, 'Pasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkos`
--

CREATE TABLE `ongkos` (
  `id_ongkos` int(11) NOT NULL,
  `nama_kabupaten` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkos`
--

INSERT INTO `ongkos` (`id_ongkos`, `nama_kabupaten`, `harga`) VALUES
(8, 'Berbah(Sleman)', 15000),
(9, 'Cangkringan(Sleman)', 14000),
(10, 'Depok(Sleman)', 13000),
(11, 'Gamping(Sleman)', 12000),
(12, 'Godean(Sleman)', 12000),
(13, 'Kalasan(Sleman)', 12000),
(14, 'Minggir(Sleman)', 11000),
(15, 'Mlati(Sleman)', 12000),
(16, 'Moyudan(Sleman)', 12000),
(17, 'Ngaglik(SLeman)', 13000),
(18, 'Ngemplak(Sleman)', 13000),
(19, 'Pakem(Sleman)', 13000),
(20, 'Prambanan(Sleman)', 15000),
(21, 'Seyegan(Sleman)', 12000),
(22, 'Sleman(Sleman)', 12000),
(23, 'Tempel(Sleman)', 13000),
(24, 'Turi(Sleman)', 13000),
(25, 'Danurejan(Kota)', 13000),
(26, 'Godongtengen(Kota)', 14000),
(27, 'Gondokusuman(Kota)', 12000),
(28, 'Gondomanan(Kota)', 12000),
(29, 'Jetis(Kota)', 12000),
(30, 'Kotagede(Kota)', 12000),
(31, 'Kraton(Kota)', 10000),
(32, 'Mantrijeron(Kota)', 11000),
(33, 'Mergangsan(Kota)', 11000),
(34, 'Ngampilan(Kota)', 11000),
(35, 'Pakualaman(Kota)', 10000),
(36, 'Tegalrejo(Kota)', 12000),
(37, 'Umbulharjo(Kota)', 11000),
(38, 'Wirobrajan(Kota)', 11000),
(39, 'Bambanglipuro(Bantul', 15000),
(40, 'Banguntapan(Bantul)', 14000),
(41, 'Bantul(Bantul)', 13000),
(42, 'Dlingo(Bantul)', 13000),
(43, 'Imogiri(Bantul)', 15000),
(44, 'Jetis(Bantul)', 14000),
(45, 'Kasihan(Bantul)', 13000),
(46, 'Kretek(Bantul)', 14000),
(47, 'Pajangan(Bantul)', 13000),
(48, 'Pandak(Bantul)', 13000),
(49, 'Piyungan(Bantul)', 12000),
(50, 'Pleret(Bantul)', 12000),
(51, 'Pundong(Bantul)', 13000),
(52, 'Sanden(Bantul)', 14000),
(53, 'Sedayu(Bantul)', 14000),
(54, 'Sewon(Bantul)', 12000),
(55, 'Srandakan(Bantul)', 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `telepon_pelanggan` varchar(13) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `gambar_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `gambar_pelanggan`) VALUES
(3, 'dinar@gmail.com', 'dinar', 'dinar', '08997763662', 'pacitan', '20170813_104248.jpg'),
(4, 'bayu@gmail.com', 'bayu', 'bayu ramdhan', '085726094652', 'magelang', '20150816_172054.jpg'),
(5, 'alazazi077@gmail.com', 'alazazi7777', 'azazi', '', '', '20160928_221448.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `tanggalkonfirmasi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `tanggalbayar`, `tanggalkonfirmasi`, `jumlah`, `bukti`) VALUES
(1, 1, 'wawan', 'BNI', '2019-07-24', '2019-07-24', 71000, '20170813_104323-min.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_pemesanan`
--

CREATE TABLE `pembayaran_pemesanan` (
  `id_pembayaranpemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `tanggalkonfirmasi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_pemesanan`
--

INSERT INTO `pembayaran_pemesanan` (`id_pembayaranpemesanan`, `id_pemesanan`, `nama`, `bank`, `tanggalbayar`, `tanggalkonfirmasi`, `jumlah`, `bukti`) VALUES
(1, 1, 'wawan', 'BNI', '2019-08-01', '2019-08-01', 364000, 'download.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_perlu` date NOT NULL,
  `jam_perlu` time NOT NULL,
  `deadline_pembayaran` datetime NOT NULL,
  `status_pembelian` varchar(50) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_penerima` varchar(20) NOT NULL,
  `telepon_penerima` varchar(25) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `pengiriman` varchar(20) NOT NULL,
  `harga_pengiriman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `tanggal_perlu`, `jam_perlu`, `deadline_pembayaran`, `status_pembelian`, `total_belanja`, `total_pembelian`, `nama_penerima`, `telepon_penerima`, `alamat_penerima`, `pengiriman`, `harga_pengiriman`) VALUES
(1, 4, '2019-07-24', '0000-00-00', '00:00:00', '2019-07-25 14:36:40', 'Selesai', 60000, 71000, 'bayu ramdhan', '085726094652', 'magelang', 'Dikirim', 11000),
(2, 4, '2019-08-01', '0000-00-00', '00:00:00', '2019-08-02 20:25:34', 'pending', 55000, 68000, 'bayu ramdhan', '085726094652', 'magelang', 'Dikirim', 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeliandetail`
--

CREATE TABLE `pembeliandetail` (
  `id_pembeliandetail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subharga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeliandetail`
--

INSERT INTO `pembeliandetail` (`id_pembeliandetail`, `id_pembelian`, `nama_produk`, `harga_produk`, `harga_modal`, `jumlah_produk`, `subharga_produk`) VALUES
(1, 1, 'Roti Durian ', 6000, 4500, 10, 60000),
(2, 2, 'Roti keju', 5500, 4000, 10, 55000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `deadline_pembayaran` datetime NOT NULL,
  `status_pemesanan` varchar(20) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `telp_pemesan` varchar(14) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `tanggal_perlu` date NOT NULL,
  `jam_perlu` time NOT NULL,
  `pengiriman` varchar(50) NOT NULL,
  `harga_pengiriman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `tanggal_pemesanan`, `deadline_pembayaran`, `status_pemesanan`, `total_belanja`, `total_pemesanan`, `nama_pemesan`, `telp_pemesan`, `alamat_pemesan`, `tanggal_perlu`, `jam_perlu`, `pengiriman`, `harga_pengiriman`) VALUES
(1, 4, '2019-08-01 20:19:40', '2019-08-02 20:19:40', 'Selesai', 350000, 364000, 'bayu ramdhan', 'magelang', '085726094652', '2019-08-08', '12:00:00', 'Dikirim', 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanandetail` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_katalogproduk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id_pemesanandetail`, `id_pemesanan`, `id_katalogproduk`, `id_pelanggan`, `deskripsi`, `jumlah_order`, `harga_produk`, `subharga`, `tanggal_pesanan`) VALUES
(1, 1, 22, 4, '', 50, 7000, 350000, '2019-08-01 20:19:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `terjual` int(50) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `gambar_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_modal`, `harga_produk`, `terjual`, `deskripsi_produk`, `gambar_produk`) VALUES
(34, 9, 'Roti Sisir', 3000, 4000, 0, 'Roti Sisir dengan rasa nikmat tak tergantikan.', 'rotikanzania___Bw0ocIJJYx-___.jpg'),
(35, 9, 'Roti Kacang ', 3000, 4000, 0, 'Roti nya lembut Kacangnya mantap.', 'rotikanzania___Bw0g6MWJ5qT___.jpg'),
(36, 9, 'Roti Keju Manis', 4000, 5500, 0, 'hmmmmm!!! Kejunya Lumer Dimulut.', 'rotikanzania___Bwygi-xp7nR___.jpg'),
(37, 9, 'Roti Bun Kopi', 4000, 5500, 0, 'Roti anti ngantuk. cocok buat teman teh pagi hari.', 'rotikanzania___BwwlAQapOPr___.jpg'),
(38, 9, 'Roti Durian ', 4500, 6000, 0, 'Roti dengan selai durian yang gak bikin enek.', 'rotikanzania___Bwv_FykpZMH___.jpg'),
(39, 5, 'Songgo Buwono', 3000, 4000, 0, 'Enak nya Pagi mu ditemani Songgo Buwono!', 'rotikanzania___Bws2HgapcNq___.jpg'),
(40, 9, 'Roti Sosis Bratwurst', 3000, 4000, 0, 'Cocok lho buat teman ngopimu ', 'rotikanzania___BwonXGkpgwn___.jpg'),
(41, 9, 'Roti Krim Vanilla', 4000, 5000, 0, 'Deda lo sama roti vanilla lainnya!', 'rotikanzania___BfdcMbsAePD___.jpg'),
(42, 9, 'Roti Abon', 4000, 6000, 0, 'Roti bertabur abon yang nikmat!!', 'rotikanzania___Bfc0xkGgGDd___.jpg'),
(43, 9, 'Roti Pisang Coklat', 4000, 6000, 0, 'Enak loh roti pisang coklatnya', 'rotikanzania___BfQrA2OgjS6___.jpg'),
(44, 9, 'Roti Coklat', 3000, 4000, 0, 'Roti Coklat yang nikmat.', 'rotikanzania___BfQrH73g3gU___.jpg'),
(45, 9, 'Roti Sosis', 4000, 6000, 0, 'Roti Sosis yang nikmat', 'rotikanzania___BfR8j8MA6wy___.jpg'),
(46, 5, 'Puding Buah', 5000, 7000, 0, 'Puding dengan rasa buah yang  mesegarkan.', 'rotikanzania___BfR6833gw9m___.jpg'),
(47, 9, 'Roti Keju Mozzarela', 5000, 7000, 0, 'Kejunya bikin nagih.', 'rotikanzania___BfQuD5VAb8c___.jpg'),
(48, 9, 'Roti Nanas', 3000, 4000, 0, 'Roti yang dalamnya ad nanasnya .', 'rotikanzania___BfQrOxPgnYj___.jpg'),
(49, 9, 'Roti Pisang', 3000, 4500, 0, 'Roti yang dalamnya ada pisangnya', 'rotikanzania___BfQrA2OgjS6___.jpg'),
(50, 9, 'Roti keju', 4000, 5500, 0, 'Roti isi Keju.', 'rotikanzania___BfR8rwIgchY___.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `katalog_produk`
--
ALTER TABLE `katalog_produk`
  ADD PRIMARY KEY (`id_katalogproduk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkos`
--
ALTER TABLE `ongkos`
  ADD PRIMARY KEY (`id_ongkos`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembayaran_pemesanan`
--
ALTER TABLE `pembayaran_pemesanan`
  ADD PRIMARY KEY (`id_pembayaranpemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  ADD PRIMARY KEY (`id_pembeliandetail`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id_pemesanandetail`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_katalogproduk` (`id_katalogproduk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `katalog_produk`
--
ALTER TABLE `katalog_produk`
  MODIFY `id_katalogproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ongkos`
--
ALTER TABLE `ongkos`
  MODIFY `id_ongkos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_pemesanan`
--
ALTER TABLE `pembayaran_pemesanan`
  MODIFY `id_pembayaranpemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  MODIFY `id_pembeliandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id_pemesanandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
