-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 05:52 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_phadist`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE `icon` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `nama`, `icon`) VALUES
(1, 'user', 'far fa-user'),
(2, 'file', 'far fa-file'),
(3, 'folder open', 'far fa-folder-open'),
(4, 'setting', 'fas fa-tools'),
(5, 'admin', 'fas fa-user-shield'),
(6, 'buku', 'fas fa-book');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `image`, `password`, `id_akses`, `aktif`) VALUES
(1, 'rozziq', 'rozziqputra@gmail.com', 'rozziq.jpg', '123', 1, 1),
(2, 'gubahanz', 'gubahanzz@gmail.com', 'rozziq.jpg', '123', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_akses`
--

CREATE TABLE `pengguna_akses` (
  `id` int(11) NOT NULL,
  `pengguna_hakakses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_akses`
--

INSERT INTO `pengguna_akses` (`id`, `pengguna_hakakses`) VALUES
(1, 'administrator'),
(2, 'member'),
(4, 'Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_akses_menu`
--

CREATE TABLE `pengguna_akses_menu` (
  `id` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_akses_menu`
--

INSERT INTO `pengguna_akses_menu` (`id`, `id_akses`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(9, 2, 4),
(10, 1, 5),
(11, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_menu`
--

CREATE TABLE `pengguna_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_menu`
--

INSERT INTO `pengguna_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Admin', 'fas fa-user-shield'),
(2, 'User', 'far fa-user'),
(3, 'Pengaturan', 'fas fa-tools'),
(5, 'Menu', 'far fa-folder-open'),
(6, 'Hadist', 'fas fa-book');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_sub_menu`
--

CREATE TABLE `pengguna_sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `sub_menu` varchar(50) NOT NULL,
  `url` varchar(20) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_sub_menu`
--

INSERT INTO `pengguna_sub_menu` (`id`, `id_menu`, `sub_menu`, `url`, `icon`, `aktif`) VALUES
(2, 2, 'Profile', 'user', 'fas- fa-fw fa-user', 1),
(5, 1, 'Hak Akses', 'admin/akses', 'fas fa-lock', 1),
(6, 1, 'Pengguna', 'admin/pengguna', 'fas fa-users-cog', 1),
(7, 5, 'Menu', 'menu/', 'far fa-folder', 1),
(8, 5, 'Sub Menu', 'menu/sub_menu', 'far fa-folder-open', 1),
(9, 5, 'icon', 'menu/icon', 'far fa-user', 0),
(12, 3, 'Judul Website', 'pengaturan/judul', 'fas fa-tools', 1),
(13, 6, 'Data Hadis', 'hadist/index', 'far fa-file', 1),
(14, 6, 'Data Perawi', 'hadist/data_perawi', 'far fa-file', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hadist`
--

CREATE TABLE `tb_hadist` (
  `id_hadist` int(11) NOT NULL,
  `judul_hadist` varchar(100) NOT NULL,
  `nomor_hadist` int(11) NOT NULL,
  `id_perawi` int(11) NOT NULL,
  `matan_hadist` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `terjemahan` text NOT NULL,
  `id_syarah` int(11) NOT NULL,
  `id_takrij` int(11) NOT NULL,
  `id_kitabsumber` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_silsanad` int(11) NOT NULL,
  `id_derajat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hadist`
--

INSERT INTO `tb_hadist` (`id_hadist`, `judul_hadist`, `nomor_hadist`, `id_perawi`, `matan_hadist`, `terjemahan`, `id_syarah`, `id_takrij`, `id_kitabsumber`, `id_kategori`, `id_silsanad`, `id_derajat`) VALUES
(1, 'ciri islam', 4904, 1, '<p>أَخْبَرَنَا إِسْحَقُ بْنُ إِبْرَاهِيمَ قَالَ حَدَّثَنَا النَّضْرُ بْنُ شُمَيْلٍ قَالَ أَنْبَأَنَا كَهْمَسُ بْنُ الْحَسَنِ قَالَ حَدَّثَنَا عَبْدُ اللَّهِ بْنُ بُرَيْدَةَ عَنْ يَحْيَى بْنِ يَعْمَرَ أَنَّ عَبْدَ اللَّهِ بْنَ عُمَرَ قَالَ حَدَّثَنِي عُمَرُ بْنُ الْخَطَّابِ قَالَ بَيْنَمَا نَحْنُ عِنْدَ رَسُولِ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ ذَاتَ يَوْمٍ إِذْ طَلَعَ عَلَيْنَا رَجُلٌ شَدِيدُ بَيَاضِ الثِّيَابِ شَدِيدُ سَوَادِ الشَّعَرِ لَا يُرَى عَلَيْهِ أَثَرُ السَّفَرِ وَلَا يَعْرِفُهُ مِنَّا أَحَدٌ حَتَّى جَلَسَ إِلَى رَسُولِ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فَأَسْنَدَ رُكْبَتَيْهِ إِلَى رُكْبَتَيْهِ وَوَضَعَ كَفَّيْهِ عَلَى فَخِذَيْهِ ثُمَّ قَالَ يَا مُحَمَّدُ أَخْبِرْنِي عَنْ الْإِسْلَامِ قَالَ أَنْ تَشْهَدَ أَنْ لَا إِلَهَ إِلَّا اللَّهُ وَأَنَّ مُحَمَّدًا رَسُولُ اللَّهِ وَتُقِيمَ الصَّلَاةَ وَتُؤْتِيَ الزَّكَاةَ وَتَصُومَ رَمَضَانَ وَتَحُجَّ الْبَيْتَ إِنْ اسْتَطَعْتَ إِلَيْهِ سَبِيلًا قَالَ صَدَقْتَ فَعَجِبْنَا إِلَيْهِ يَسْأَلُهُ وَيُصَدِّقُهُ ثُمَّ قَالَ أَخْبِرْنِي عَنْ الْإِيمَانِ قَالَ أَنْ تُؤْمِنَ بِاللَّهِ وَمَلَائِكَتِهِ وَكُتُبِهِ وَرُسُلِهِ وَالْيَوْمِ الْآخِرِ وَالْقَدَرِ كُلِّهِ خَيْرِهِ وَشَرِّهِ قَالَ صَدَقْتَ قَالَ فَأَخْبِرْنِي عَنْ الْإِحْسَانِ قَالَ أَنْ تَعْبُدَ اللَّهَ كَأَنَّكَ تَرَاهُ فَإِنْ لَمْ تَكُنْ تَرَاهُ فَإِنَّهُ يَرَاكَ قَالَ فَأَخْبِرْنِي عَنْ السَّاعَةِ قَالَ مَا الْمَسْئُولُ عَنْهَا بِأَعْلَمَ بِهَا مِنْ السَّائِلِ قَالَ فَأَخْبِرْنِي عَنْ أَمَارَاتِهَا قَالَ أَنْ تَلِدَ الْأَمَةُ رَبَّتَهَا وَأَنْ تَرَى الْحُفَاةَ الْعُرَاةَ الْعَالَةَ رِعَاءَ الشَّاءِ يَتَطَاوَلُونَ فِي الْبُنْيَانِ قَالَ عُمَرُ فَلَبِثْتُ ثَلَاثًا ثُمَّ قَالَ لِي رَسُولُ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ يَا عُمَرُ هَلْ تَدْرِي مَنْ السَّائِلُ قُلْتُ اللَّهُ وَرَسُولُهُ أَعْلَمُ قَالَ فَإِنَّهُ جِبْرِيلُ عَلَيْهِ السَّلَام أَتَاكُمْ لِيُعَلِّمَكُمْ أَمْرَ دِينِكُمْ<br></p>', '<p>Telah mengabarkan kepada kami Ishaq bin Ibrahim, dia berkata; telah menceritakan kepada kami An Nadhr bin Syumail, dia berkata; telah memberitakan kepada kami Kahmas bin Al Hasan, dia berkata; telah menceritakan kepada kami Abdullah bin Buraidah dari Yahya bin Ya\'mar bahwa Abdullah bin Umar berkata; telah menceritakan kepadaku Umar bin Al Khathab, dia berkata, \"Pada suatu hari ketika kami bersama Rasulullah ? tiba-tiba muncul di hadapan kami orang yang sangat putih pakaiannya, hitam rambutnya, tidak terlihat padanya bekas bepergian, dan tidak ada seorangpun di antara kami yang mengenalnya, hingga ia duduk di hadapan Rasulullah ? dan menyandarkan lututnya kepada lutut beliau dan meletakkan kedua telapak tangannya pada kedua paha beliau kemudian berkata, \"Wahai Muhammad, beritahukan kepadaku mengenai Islam\". Beliau bersabda, \"Engkau bersaksi bahwa tidak ada Tuhan yang berhak disembah kecuali Allah, dan Muhammad adalah utusan Allah, engkau mendirikan shalat, membayar zakat, berpuasa Ramadan dan melakukan haji ke Ka\'bah apabila mampu pergi ke sana.\" Orang tersebut berkata, \"Tuan benar\". Maka kami pun heran kepadanya, dia bertanya dan dia pula yang membenarkannya. Kemudian dia berkata, \"Beritahukan kepadaku mengenai iman!\" Beliau bersabda, \"Engkau beriman kepada Allah, para malaikat-Nya, kitab-kitab-Nya, para rasul-Nya dan Hari Akhir serta seluruh takdir yang baik dan yang buruk.\" Dia berkata, \"Tuan benar\". Dia berkata, \"Beritahukan kepadaku mengenai ihsan!\" Beliau bersabda, \"Ihsan adalah engkau menyembah Allah seolah-olah engkau melihat-Nya dan apabila engkau tidak melihat-Nya maka sesungguhnya Dia melihatmu.\" Dia berkata, \"Beritahukan kepadaku mengenai hari kiamat!\" Beliau bersabda, \"Orang yang ditanya tidaklah lebih mengetahui daripada yang bertanya.\" Dia berkata, \"Beritahukan kepadaku mengenai tanda-tandanya!\" Beliau bersabda, \"Jika ada budak wanita yang melahirkan tuannya, dan engkau melihat orang yang tidak beralas kaki, telanjang dan tidak berkhitan serta menggembalakan kambing saling berlomba meninggikan bangunan.\" Tiga hari kemudian beliau bertanya kepadaku, \"Wahai Umar, apakah engkau mengetahui siapakah yang bertanya?\" saya menjawab, \"Allah dan rasul-Nya lebih mengetahui.\" Beliau bersabda, \"Sesungguhnya dia adalah Jibril \'alaihissalam, datang kepada kalian hendak mengajarkan kepada kalian perkara agama kalian.\"<br></p>', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perawi`
--

CREATE TABLE `tb_perawi` (
  `id_perawi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perawi`
--

INSERT INTO `tb_perawi` (`id_perawi`, `nama`, `keterangan`) VALUES
(1, 'Imam Muslim', 'imam hadis sohoheh'),
(2, 'Imam Hasan', 'perwi hadist hasan'),
(4, 'imam bukhori', 'imam hadis '),
(5, 'Imam Abu Daud', 'Imam Abu Daud'),
(6, 'Imam Nasa\'i', 'Imam Nasa\'i'),
(7, 'Imam Ibnu Majah', 'Imam Ibnu Majah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna_akses`
--
ALTER TABLE `pengguna_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna_akses_menu`
--
ALTER TABLE `pengguna_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna_menu`
--
ALTER TABLE `pengguna_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna_sub_menu`
--
ALTER TABLE `pengguna_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hadist`
--
ALTER TABLE `tb_hadist`
  ADD PRIMARY KEY (`id_hadist`),
  ADD KEY `id_perawi` (`id_perawi`),
  ADD KEY `id_takrij` (`id_takrij`),
  ADD KEY `id_syarah` (`id_syarah`),
  ADD KEY `id_kitabsumber` (`id_kitabsumber`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_silsanad` (`id_silsanad`),
  ADD KEY `id_derajat` (`id_derajat`);

--
-- Indexes for table `tb_perawi`
--
ALTER TABLE `tb_perawi`
  ADD PRIMARY KEY (`id_perawi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna_akses`
--
ALTER TABLE `pengguna_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna_akses_menu`
--
ALTER TABLE `pengguna_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna_menu`
--
ALTER TABLE `pengguna_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna_sub_menu`
--
ALTER TABLE `pengguna_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_hadist`
--
ALTER TABLE `tb_hadist`
  MODIFY `id_hadist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_perawi`
--
ALTER TABLE `tb_perawi`
  MODIFY `id_perawi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
