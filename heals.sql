-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 05:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heals`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `capacity` enum('admin','fasilitator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id_user`, `email`, `nama`, `password`, `capacity`) VALUES
(1, 'ridhoadhimam@gmail.com', 'Ridho Adhimam Putra', '11', 'admin'),
(2, 'Iyoong75@gmail.com', 'Dho', '9', 'admin'),
(3, 'admin@admin.com', 'ADMIN', 'password', 'admin'),
(4, 'tes@tes.com', 'TES', 'tes', 'fasilitator'),
(5, 'gacor@gmail.com', 'maula sanggili', 'kenahack', 'fasilitator'),
(6, 'cece@gmail.com', 'cece', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `layanan` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id`, `nama`, `kategori`, `alamat`, `telepon`, `layanan`, `latitude`, `longitude`, `gambar`) VALUES
(1, 'RS Bhayangkara', 'RS', 'Jl. Langko No.64 Kota Mataram', '(0370)7844654', 'Poliklinik Rawat jalan, Layanan Gawat darurat, Laboratorium dan radiologi, apotek, fasilitas inap, layanan kesehatan khusus(forensik, farmakologi klinis, rehabilitasi, gizi klinis, dan urologi', -8.577125662345455, 116.08436134953062, ''),
(2, 'RSUD Mataram', 'RS', 'JL. Bung Karno No.3 Kota mataram', '(0370)640774', 'IGD, rawat inap, rawat jalan, radiologi, laboratorium, farmasi, ruang operasi, PJT dan stroke-center, dan rekam e medis elektronik', -8.59904109211086, 116.11358999785524, ''),
(3, 'RS Universitas Mataram', 'RS', 'Jl. Majapahit No.62, Kekalik Jaya, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83114', '0817-7516-5995', 'IGD, poliklinik spesialis, layanan SWAB PCR, medical check up, layanan CT-SCAN, unit hemodialisis, vaksinasi internasional, dan apotek', -8.589858174493028, 116.09345311378829, ''),
(4, 'RS Kemala Hikmah Polwi', 'RS', 'Jl. Langko No.64, Dasan Agung Baru, Mataram, Kota Mataram, Nusa Tenggara Bar. 83113', '(0370)23701', 'Poliklinik rawat jalan,Instalasi rawat inap,UGD,Laboratorium,Radiologi,Apotek', -8.579281944483506, 116.09365840786575, ''),
(5, 'RS Siti Hajar', 'RS', 'Jl. Catur Warga No.8B, Mataram Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83126', '(0370)623498', 'UGD, farmasi, laboratorium, radiologi, bedah, ICU/NICU, poliklinik, rehabilitasi medik', -8.586423718126822, 116.11436356295383, ''),
(6, 'RS Siloam', 'RS', 'Jl. Majapahit, Pagesangan, Kec. Mataram, Kota Mataram, Nusa Tenggara Barat 83115', '(0370)6001100', 'Layanan Spesialisasi, IGD, Layanan Rawat inap,Rawat jalan, Layanan diagnostik dan radiologi, laboratorium,Layanan bedah, dan layanan medis homecare', -8.592841532519087, 116.09879115636869, ''),
(7, 'RSK St. Antonius', 'RS', 'Jl. Koperasi No.61, Dayan Peken, Kec. Ampenan, Kota Mataram, Nusa Tenggara Bar. 83111', '(0370)621397', 'Farmasi, instalasi gizi, instalasi tumbuh kembang anak, ambulans, instalasi bersalin, IGD, poli umum dan spesialis, rontgen dan usg, rawat jalan', -8.569610189561642, 116.07971459213104, ''),
(8, 'RSAD Wira Bhakti', 'RS', 'Jl. Hos Cokroaminoto No.7, Mataram Bar., Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83123', '087720517548', 'IGD, Instalasi rawat inap, instalasi bedah,instalasi bersalin, farmasi dan instalasi tumbuh kembang anak', -8.58027225551394, 116.10908057539206, ''),
(9, 'RS Risa Sentra Medika', 'RS', 'Jl. Pejanggik No.115, Cilinaya, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83239', '(0370)625560', 'layanan spesialis(penyakit dalam, kesehatan anak, kebidanan dan kandungan,bedah umum,mata,gigi,bedah saraf dll), IGD, ICU, NICU, Laboratorium', -8.585277782806351, 116.12276827421712, ''),
(10, 'RS Harapan Keluarga', 'RS', 'Jl. Ahmad Yani No.9, Selagalas, Kec. Sandubaya, Kota Mataram, Nusa Tenggara Bar. 83237', '(0370)6177000', 'IGD, Radiologi,laboratorium,fisioterapi,kamar bedah, kamar bersalin, medical check up, Farmasi', -8.577783637903256, 116.14687285113482, ''),
(11, 'RS Biomedika', 'RS', 'Jl. Bung Karno No.143, Pagutan Bar., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83117', '(0370)645137', 'Ambulance, apotek,laboratorium,radiologi, Rawat inap,UGD', -8.603877650976377, 116.11352388429225, ''),
(12, 'RS Metro Medika', 'RS', 'Jl. Jend. Sudirman No.18a, Rembiga, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83124', '(0370)7847171', 'Laboratorium,radiologi,unit rekam medis,unit rawat jalan, unit rawat inap,unit farmas', -8.561997223037627, 116.1125989005121, ''),
(13, 'RSUD Provinsi', 'RS', 'Jl. Prabu Rangkasari, Dasan Cermen, Kec. Sandubaya, Kota Mataram, Nusa Tenggara Bar. 84371', '(0370)7502424', 'Gawat darurat,rawat jalan,rawat inap (ICU,ICCU,NICU,PICU,ruang bersalin, dan ruang isolasi),operasi,rehabilitas medik,farmasi,bank darah,Laboratorium Patologi Klinik,Laboratorium Patologi Anatomi,radiologi,forensik,gizi', -8.606397830572252, 116.13204570646643, ''),
(14, 'RS Umum Daerah Mataram', 'RS', 'Pagesangan Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127', '(0370)640774', 'Rawat jalan,rawat inap, IGD, hyperbaric chamber (Alat yang digunakan dalam terapi oksigen hiperbarik untuk mempercepat penyembuhan luka dan mengobati beberapa kondisi medis seperti infeksi yang sulit diobati dan keracunan karbon monoksida)', -8.599105456502096, 116.11404455923004, ''),
(15, 'Puskesmas Mataram', 'Puskesmas', 'Jl. Catur Warga No.29 A, Mataram Bar., Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83126', '(0370)638332', 'Pelayanan umum, kesehatan ibu dan anak, gigi,laboratorium,gizi', -8.583115391658659, 116.10546646324116, ''),
(16, 'Puskesmas Pejeruk', 'Puskesmas', 'Jl. Pinang Raya Lingkungan Moncok Karya, Kecamatan Ampenan, Kota Mataram, Nusa Tenggara Barat', '(0370)6194758', 'UGD, Farmasi, Laboratorium, Radiologi, Pelayanan gigi, Kesehatan ibu dan anak, dan imunisasi', -8.567647504668098, 116.0930887495358, ''),
(17, 'Puskesmas Dasan Agung', 'Puskesmas', 'Jl. Gunung Merapi No. 213, Dasan Agung, Kota Mataram, Nusa Tenggara Barat', '(0370)623498', 'Pelayanan rawat jalan, check up, Pembuatan surat keterangan sehat, Ganti balutan dan lepas jahitan, jahit luka, cabut gigi, tes kehamilan, pelayanan bersalin, pemeriksaan anak, dan tes golongan darah, asam urat, dan kolestrol', -8.57880336891152, 116.09430213802104, ''),
(18, 'Puskesmas Pagesangan', 'Puskesmas', 'Jl. Majapahit No.3, Pagesangan Bar., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127', '(0370)633101', 'Pelayanan kesehatan umum, Tindakan medis dasar, Pemeriksaan khusus, Rujukan BPJS', -8.594243089404841, 116.10065718705604, ''),
(19, 'Puskesmas Karang Taliwang', 'Puskesmas', 'Jl. Ade Irma Suryani No.60, Karang Taliwang, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83118', '(0370)635974', 'Pelayanan Kesehatan umum, Pelayanan gigi, Tes laboratorium', -8.577800465483875, 116.12586542298055, ''),
(20, 'Puskesmas Dasan Cermen', 'Puskesmas', 'JL Ali Hanafiah, No.1, Dasan Cermen, Mataram', '(0370)627719', 'Pemeriksaan kesehatan, pelayanan ibu dan anak, pelayanan gigi dan mulut, imunisasi, farmasi', -8.601491189911103, 116.13600203908881, ''),
(21, 'Puskesmas Selaparang', 'Puskesmas', 'Jl. Jend. Sudirman No.19, Rembiga, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83124', '(0370)7504594', 'Ruang Tunggu, ruang konsultasi, ruang tindakan, laboratorium, apotek', -8.564524538865555, 116.12226338940013, ''),
(22, 'Puskesmas Babakan', 'Puskesmas', 'Jl. Lalu Mesir No.2, Babakan, Kec. Sandubaya, Kota Mataram, Nusa Tenggara Bar. 83233', '03707505819', 'Pelayanan umum, KIA(Kesehatan ibu dan anak), imunisasi, gigi dan mulut, gizi, lansia, KB, dan Pelayanan Gawat darurat', -8.596210821039149, 116.13596155679873, ''),
(23, 'Puskesmas Cakranegara', 'Puskesmas', 'Jl. Bougenville, Mandalika, Kec. Sandubaya, Kota Mataram, Nusa Tenggara Bar. 83233', '(0370)671496', 'Pelayanan umum, KIA(kesehatan ibu dan anak)', -8.592069096558308, 116.1477176704014, ''),
(24, 'Puskesmas Perawatan Tanjung Karang', 'Puskesmas', 'Jl. Sultan Salahudin No.23, Tj. Karang, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83115', '(0370)633970', 'Pelayanan umum, pelayanan kesehatan ibu dan anak, imunisasi, kesehatan gigi dan mulut, gizi', -8.598290197131842, 116.08432987952409, ''),
(25, 'Puskesmas Karang Pule', 'Puskesmas', 'Jl. Gajah Mada No.14, Jempong Baru, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83115', '(0370)620736', 'pemeriksaan kesehatan umum, rawat jalan, pembuatan surat keterangan sehat, lepas jahitan, ganti balutan, jahit luka,cabut gigi, pemeriksaan tensi darah, tes kehamilan, pelayanan persalinan, pemeriksaan anak, serta tes golongan darah', -8.611676219270732, 116.09937128197559, ''),
(26, 'Klinik Mitra Medistra', 'Klinik', 'Jl. Energi No.45, Ampenan Sel., Kec. Ampenan, Kota Mataram, Nusa Tenggara Bar. 83511', '081805275553', 'UGD 24 jam,USG 3D, kesehatan THT,Check Up', -8.577171604070509, 116.11702053357368, ''),
(27, 'Klinik Pratama Jaya Medika', 'Klinik', 'Jl. Sultan Hasanuddin No.101, Mayura, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83239', '08176797788', 'Poli umum,poli gigi,laboratorium,Nebulizer(Mengobati kondisi pernafasan),Operasi kecil,keterangan sehat', -8.583939731080878, 116.12946250446667, ''),
(28, 'Klinik Gora', 'Klinik', 'Jl. R.A. Kartini, Monjok Tim., Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83122', '(0370)635661', 'Mecical check up(mencakup anamnesis dan pemeriksaan fisik oleh dokter, pengukuran tanda-tanda vital seperti tekanan darah dan suhu tubuh, tes laboratorium termasuk tes darah lengkap, gula darah dll)', -8.577737237705048, 116.11696473999103, ''),
(29, 'Klinik Mitra Husada Lombok', 'Klinik', 'Ruko Satelit 1 Jalan Bung Karno No.53 Pagesangan Timur, Pagutan Bar., Kota Mataram, Nusa Tenggara Bar. 83127', '081237156689', 'Layanan Homecare check up (Pemeriksaan kesehatan di rumah) dan Check Up', -8.596349565618524, 116.11328377927397, ''),
(30, 'Klinik Onecare', 'Klinik', 'Punia, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83115', '081231505505', 'pelayanan kesehatan umum,konsultasi dokter umum,pemeriksaan medis,pemberian obat,perawatan gigi, pemeriksaan lab,Fasilitas darurat, pemeriksaaan penyakit darurat,penyuluhan kesehatan', -8.59353082059737, 116.10103758192484, ''),
(31, 'Klinik Nugraha', 'Klinik', 'Jl. Pandawa, Cilinaya, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83239', '(0370)644749', 'Medical check up (Pemeriksaaan kesehatan menyeluruh dan mendeteksi dini penyakit)', -8.590158399791756, 116.12720794976573, ''),
(32, 'Klinik Pratama Arta Medika', 'Klinik', 'Jl. Terusan Bung Hatta No.36, Pejanggik, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83239', '-', 'Medical Check Up(Pemeriksaan kesehatan menyeluruh)', -8.580897214863834, 116.11931687142, ''),
(33, 'Klinik Unram', 'Klinik', 'Jl. Pemuda No.39 A, Dasan Agung Baru, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83114', '081916890706', 'Konsultasi dokter umum,perawatan kesehatan primer,pemberian obat,pemeriksaan kesehatan mental, dan vaksinasi', -8.583477333266494, 116.09273686162415, ''),
(34, 'Klinik Sriwijaya', 'Klinik', 'Jl. Sriwijaya No.140C, Mataram Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127', '081339330669', 'Medical check up, Tambal gigi,Scalling gigi(Pembersihan karang gigi), Check Up gigi)', -8.594251091157448, 116.10949032168384, ''),
(35, 'Klinik Asy-syifa', 'Klinik', 'Jl. Panji Tilar Negara No.138, Tj. Karang Permai, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83115', '081907627541', 'Pelayanan Gigi,Apotek,Imunisasi,Laboratoriun kesehatan', -8.59662171318398, 116.08514094398403, ''),
(37, 'Klinik Caturwarga', 'Klinik', 'Jl. Catur Warga No.4, Pejanggik, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127 ', '(0370)622578', 'Pelayanan kesehatan umum,Konsultasi dokter umum,pemeriksaan medis,pemberian obat,perawatan gigi,layanan kesehatan reproduksi,penyuluhan kesehatan,dan fasilitas darurat', -8.588119303578772, 116.11750696613484, ''),
(38, 'Tirta Medical Center Mataram', 'Klinik', 'C462+R5J, Mataram Bar., Kec. Selaparang, Kota Mataram, Nusa Tenggara Barat.', '037007709119', 'Medical Check Up dan Laboratorium', -8.587722541147842, 116.10059217597154, ''),
(39, 'Klinik Nayaka Husada Mataram', 'Klinik', 'Komplek Mataram Mall, Jl. Cilinaya, Cilinaya, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83125', '(0370)628212', 'Medical Check Up(Pemeriksaan kesehatan menyeluruh)', -8.589052853717138, 116.11961044229353, ''),
(40, 'Klinik Kamboja', 'Klinik', 'Jl. WR. Supratman No.24, Mataram Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83126', '0819-3316-8547', 'Konsultasi dokter umum,pemeriksaan medis,pemberian obat,pemeriksaan penyakit menular,penyukuhan kesehatan,Layanan kesehatan reproduksi', -8.583973572394386, 116.10719116565602, ''),
(41, 'Quantum Sarana Medika', 'Klinik', 'Jl. WR. Supratman No.18, Mataram Tim., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127', '(0370)649123', 'Apotek,  cek urin, dan laboratorium penyakit dala', -8.579167541056334, 116.10836963386282, '');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `lat`, `lng`, `title`, `color`) VALUES
(1, -8.577125662345455, 116.08436134953062, 'RS Bhayangkara', 'red'),
(2, -8.59904109211086, 116.11358999785524, 'RSUD Mataram', 'red'),
(3, -8.589858174493028, 116.09345311378829, 'RS Universitas Mataram', 'red'),
(4, -8.579281944483506, 116.09365840786575, 'RS Kemala Hikmah Polwi', 'red'),
(5, -8.586423718126822, 116.11436356295383, 'RS Siti Hajar', 'red'),
(6, -8.592841532519087, 116.09879115636869, 'RS Siloam', 'red'),
(7, -8.569610189561642, 116.07971459213104, 'RSK St. Antonius', 'red'),
(8, -8.58027225551394, 116.10908057539206, 'RSAD Wira Bhakti', 'red'),
(9, -8.585277782806351, 116.12276827421712, 'RS Risa Sentra Medika', 'red'),
(10, -8.577783637903256, 116.14687285113482, 'RS Harapan Keluarga', 'red'),
(11, -8.603877650976377, 116.11352388429225, 'RS Biomedika', 'red'),
(12, -8.561997223037627, 116.1125989005121, 'RS Metro Medika', 'red'),
(13, -8.606397830572252, 116.13204570646643, 'RSUD Provinsi', 'red'),
(14, -8.599105456502096, 116.11404455923004, 'RS Umum Daerah Mataram', 'red'),
(15, -8.583115391658659, 116.10546646324116, 'Puskesmas Mataram', 'blue'),
(16, -8.567647504668098, 116.0930887495358, 'Puskesmas Pejeruk', 'blue'),
(17, -8.57880336891152, 116.09430213802104, 'Puskesmas Dasan Agung', 'blue'),
(18, -8.594243089404841, 116.10065718705604, 'Puskesmas Pagesangan', 'blue'),
(19, -8.577800465483875, 116.12586542298055, 'Puskesmas Karang Taliwang', 'blue'),
(20, -8.601491189911103, 116.13600203908881, 'Puskesmas Dasan Cermen', 'blue'),
(21, -8.564524538865555, 116.12226338940013, 'Puskesmas Selaparang', 'blue'),
(22, -8.596210821039149, 116.13596155679873, 'Puskesmas Babakan', 'blue'),
(23, -8.590668715071928, 116.1011613794521, 'Puskesmas Pegesangan', 'blue'),
(24, -8.592069096558308, 116.1477176704014, 'Puskesmas Cakranegara', 'blue'),
(25, -8.598290197131842, 116.08432987952409, 'Puskesmas Perawatan Tanjung Karang', 'blue'),
(26, -8.611676219270732, 116.09937128197559, 'Puskesmas Karang Pule', 'blue'),
(27, -8.577171604070509, 116.11702053357368, 'Klinik Mitra Medistra', 'green'),
(28, -8.583939731080878, 116.12946250446667, 'Klinik Pratama Jaya Medika', 'green'),
(29, -8.577737237705048, 116.11696473999103, 'Klinik Gora', 'green'),
(30, -8.596349565618524, 116.11328377927397, 'Klinik Mitra Husada Lombok', 'green'),
(31, -8.59353082059737, 116.10103758192484, 'Klinik Onecare', 'green'),
(32, -8.590158399791756, 116.12720794976573, 'Klinik Nugraha', 'green'),
(33, -8.580897214863834, 116.11931687142, 'Klinik Pratama Arta Medika', 'green'),
(34, -8.583477333266494, 116.09273686162415, 'Klinik Unram', 'green'),
(35, -8.594251091157448, 116.10949032168384, 'Klinik Sriwijaya', 'green'),
(36, -8.59662171318398, 116.08514094398403, 'Klinik Asy-syifa', 'green'),
(37, -8.588119303578772, 116.11750696613484, 'Klinik Caturwarga', 'green'),
(38, -8.587722541147842, 116.10059217597154, 'Tirta Medical Center Mataram', 'green'),
(39, -8.589052853717138, 116.11961044229353, 'Klinik Nayaka Husada Mataram', 'green'),
(40, -8.583973572394386, 116.10719116565602, 'Klinik Kamboja', 'green'),
(41, -8.579167541056334, 116.10836963386282, 'Quantum Sarana Medika', 'green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
