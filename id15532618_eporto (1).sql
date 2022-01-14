-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2022 at 07:42 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15532618_eporto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'sekura');

-- --------------------------------------------------------

--
-- Table structure for table `pilar`
--

CREATE TABLE `pilar` (
  `kdpilar` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pilar` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pilar`
--

INSERT INTO `pilar` (`kdpilar`, `nama_pilar`) VALUES
('P01', 'Akhlak dan Leadership'),
('P02', 'Ilmu dan Logika'),
('P03', 'Bakat dan Lifeskill');

-- --------------------------------------------------------

--
-- Table structure for table `tbfasil`
--

CREATE TABLE `tbfasil` (
  `idfasil` varchar(10) NOT NULL,
  `idkelas` int(2) NOT NULL,
  `nama_fasil` varchar(100) NOT NULL,
  `email_fasil` varchar(100) NOT NULL,
  `telepon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbfasil`
--

INSERT INTO `tbfasil` (`idfasil`, `idkelas`, `nama_fasil`, `email_fasil`, `telepon`) VALUES
('FS0001', 1, 'Arniya', 'arniya.arniya95@gmail.com', '085265697705'),
('FS0002', 2, 'Febriani Rizki Fitri', 'febrianirizki5@gmail.com', '085244186083'),
('FS0003', 4, 'Hendra Eka Putra', 'alkemihendra@gmail.com', '081372678472'),
('FS0004', 3, 'Heriady', 'heriadypoeloet@gmail.com', '085277799973'),
('FS0005', 1, 'Molina', 'intanmolina@gmail.com', '082384939164'),
('FS0006', 5, 'Nanik Adriani', 'nanikadriani99@gmail.com', '085278755978'),
('FS0007', 3, 'Nepria Sari', 'nepria14sari@gmail.com', '082172243677'),
('FS0008', 6, 'Nindy Asra Roza', 'asrarozanindy@gmail.com', '085263238702'),
('FS0009', 4, 'Said Ahmad Sueni', 'saidsueni24@gmail.com', '085215881185');

-- --------------------------------------------------------

--
-- Table structure for table `tbkd`
--

CREATE TABLE `tbkd` (
  `idkd` varchar(3) NOT NULL,
  `kd` varchar(500) NOT NULL,
  `pilar` enum('P01','P02','P03') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkd`
--

INSERT INTO `tbkd` (`idkd`, `kd`, `pilar`) VALUES
('K00', 'Membiasakan do’a pada kehidupan seharian', 'P01'),
('K0X', 'Menyimak perkataan orang lain ( bahasa ibu atau bahasa lainnya)', 'P02'),
('K0Y', 'Mengenal kosakata', 'P02'),
('K0Z', 'Melakukan praktik ibadah', 'P01');

-- --------------------------------------------------------

--
-- Table structure for table `tbkelas`
--

CREATE TABLE `tbkelas` (
  `idkelas` int(2) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkelas`
--

INSERT INTO `tbkelas` (`idkelas`, `nama_kelas`) VALUES
(0, 'TK'),
(1, 'Satu'),
(2, 'Dua'),
(3, 'Tiga'),
(4, 'Empat'),
(5, 'Lima'),
(6, 'Enam');

-- --------------------------------------------------------

--
-- Table structure for table `tbnilaikd`
--

CREATE TABLE `tbnilaikd` (
  `idnilai` int(11) NOT NULL,
  `idsiswa` varchar(10) NOT NULL,
  `idkelas` int(2) NOT NULL,
  `idsem` int(10) NOT NULL,
  `idpilar` int(11) NOT NULL,
  `nilai_kd` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbnilaikd`
--

INSERT INTO `tbnilaikd` (`idnilai`, `idsiswa`, `idkelas`, `idsem`, `idpilar`, `nilai_kd`) VALUES
(5, '19A022', 1, 20211, 2, 4.00),
(6, '19A022', 1, 20211, 3, 4.00),
(7, '19A022', 1, 20211, 5, 2.00),
(8, '19A022', 1, 20211, 6, 3.00),
(9, '19A022', 1, 20211, 7, 3.00),
(10, '19A022', 1, 20211, 8, 3.00),
(11, '19A022', 1, 20211, 9, 2.00),
(12, '19A022', 1, 20211, 10, 3.00),
(14, '19A018', 1, 20211, 3, 2.00),
(15, '19A018', 1, 20211, 7, 3.00),
(16, '20TK000', 0, 20211, 1, 4.00),
(17, '20TK000', 0, 20211, 18, 3.00),
(18, '19A018', 1, 20211, 8, 2.00),
(19, '19A018', 1, 20211, 9, 3.00),
(20, '19A018', 1, 20211, 2, 4.00),
(21, '19A018', 1, 20211, 5, 2.00),
(22, '19A018', 1, 20211, 6, 3.00),
(23, '19A018', 1, 20211, 10, 2.00),
(24, '19A018', 1, 20212, 2, 1.00),
(25, '19A018', 1, 20212, 3, 2.00),
(26, '19A022', 1, 20212, 2, 2.00),
(27, '19A022', 1, 20212, 3, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbobservasi`
--

CREATE TABLE `tbobservasi` (
  `idobservasi` int(11) NOT NULL,
  `idsiswa` varchar(10) NOT NULL,
  `idsem` int(10) NOT NULL,
  `kdpilar` enum('P01','P02','P03') NOT NULL,
  `foto` varchar(500) NOT NULL,
  `ctt_observe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbobservasi`
--

INSERT INTO `tbobservasi` (`idobservasi`, `idsiswa`, `idsem`, `kdpilar`, `foto`, `ctt_observe`) VALUES
(1, '19A022', 20211, 'P01', '1471826655_1629214931.jpeg', 'Nah abang Yahya, Ibadah sholat wajib nya tidak boleh ditinggalkan ya. Abang Yahya juga coba kendalikan emosi\r\nnya seperti, tidak mudah marah, tidak mudah menangis ya. Kita boleh marah jika itu diperlukan saja ya. Bukan\r\nuntuk kapan saja. Laki-laki boleh kok menangis, tapi juga untuk menyesali perbuatan tidak baik yang kita lakukan\r\nsaja, karena bisa jadi dosa. Berkata baik dan sopan ya, karena setiap ucapan kita itu dicatat oleh malaikat Allah.\r\nTerakhir, harus bersabar ya. semakin kita sabar, kita jadi semakin kuat. Abang Yahya sudah oke, sayang ke temanteman, keluarga, dan guru. Abang Yahya semakin tingkatkan amalan nya ya, untuk tiket ke surga. Semangat ya\r\nnak.\r\nTetaplah jadi anak yang baik dan sayang sesama manusia, dan alam. Insya Allah Allah Ta\'ala akan menjadikan kita\r\norang yang hebat'),
(2, '19A022', 20211, 'P02', '1780475987_1629215749.jpeg', 'Abang Yahya sudah banyak kemajuan dari sebelumnya. Tinggal beresin fokus nya ya. kalau kita gak fokus, nanti\r\nkita tidak tahu. Abang Yahya hebat dan jago untuk prakarya. Supaya abang nanti bisa buat cerita tentang benda\r\nyang abang buat, abang juga tidak boleh patah semangat ya belajar baca dan tulisnya.'),
(3, '19A022', 20211, 'P03', '643649809_1629215854.jpeg', 'Tetap semangat ya'),
(7, '20TK000', 20211, 'P01', '369934885_1629214569.jpeg', 'Ananda Hawwa menunjukkan perilaku kepemimpinan yang sangat menonjol.'),
(13, '20TK000', 20211, 'P02', '1889536888_1629600851.jpeg', 'Ananda hawwa sedang menggambar.'),
(14, '20TK000', 18191, 'P01', '1190227377_1630381967.jpeg', 'observasi coba lagii'),
(15, '20TK000', 18191, 'P01', '186949105_1630381944.jpeg', 'observasi coba lagi');

-- --------------------------------------------------------

--
-- Table structure for table `tbpilar`
--

CREATE TABLE `tbpilar` (
  `idpilar` int(11) NOT NULL,
  `idkelas` int(2) NOT NULL,
  `kdpilar` enum('P01','P02','P03') NOT NULL,
  `idsem` int(10) NOT NULL,
  `kd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpilar`
--

INSERT INTO `tbpilar` (`idpilar`, `idkelas`, `kdpilar`, `idsem`, `kd`) VALUES
(1, 0, 'P01', 20211, 'Membiasakan do’a pada kehidupan sehari-hari'),
(2, 1, 'P01', 20211, 'Membiasakan do’a pada kehidupan sehari-hari'),
(3, 1, 'P01', 20211, 'Menyimak perkataan orang lain ( bahasa ibu atau bahasa lainnya)'),
(4, 1, 'P01', 20211, 'Melakukan praktik ibadah'),
(5, 1, 'P02', 20211, 'Menguraikan lambang bunyi vokal dan konsonan dalam kata bahasa Indonesia atau bahasa daerah.'),
(6, 1, 'P02', 20211, 'Melafalkan lambang bunyi vokal dan konsonan dalam kata bahasa Indonesia atau bahasa daerah.'),
(7, 1, 'P02', 20211, 'Menyampaikan penjelasan (berupa gambar dan tulisan) tentang anggota tubuh dan pancaindra serta perawatannya Bahasa Indonesia dengan banyuan bahasa daerah lisan dan / atau tulisan'),
(8, 1, 'P03', 20211, 'Motorik Kasar'),
(9, 1, 'P03', 20211, 'Motorik halus'),
(10, 1, 'P03', 20211, 'Botani dan Zoologi Praktis'),
(11, 2, 'P02', 20211, 'Melaporkan pengunaan kosa kata b indo'),
(12, 2, 'P01', 20211, 'Membiasakan do’a pada kehidupan sehari-hari'),
(15, 2, 'P02', 20211, 'Matematika'),
(16, 2, 'P02', 20211, 'PPKn'),
(17, 3, 'P02', 20211, 'PPKn'),
(18, 0, 'P01', 20211, 'Dapat Menghafal surah Al-Ikhlas, Al-Falaq, dan An-Naas.'),
(19, 2, 'P01', 20211, 'Jiwa Kepemimpinan'),
(23, 0, 'P01', 20211, 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `tbsemester`
--

CREATE TABLE `tbsemester` (
  `idsem` int(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `semester` enum('1/Ganjil','2/Ganjil','3/Genap','4/Genap') NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbsemester`
--

INSERT INTO `tbsemester` (`idsem`, `thn_ajaran`, `semester`, `status`) VALUES
(18191, '2018/2019', '1/Ganjil', 'tidak aktif'),
(18192, '2018/2019', '2/Ganjil', 'tidak aktif'),
(18193, '2018/2019', '3/Genap', 'tidak aktif'),
(18194, '2018/2019', '4/Genap', 'tidak aktif'),
(19201, '2019/2020', '1/Ganjil', 'tidak aktif'),
(19202, '2019/2020', '2/Ganjil', 'tidak aktif'),
(19203, '2019/2020', '3/Genap', 'tidak aktif'),
(19204, '2019/2020', '4/Genap', 'tidak aktif'),
(20211, '2020/2021', '1/Ganjil', 'tidak aktif'),
(20212, '2020/2021', '2/Ganjil', 'tidak aktif'),
(20213, '2020/2021', '3/Genap', 'tidak aktif'),
(20214, '2020/2021', '4/Genap', 'tidak aktif'),
(20221, '2021/2022', '1/Ganjil', 'aktif'),
(20222, '2021/2022', '2/Ganjil', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `idsiswa` varchar(10) NOT NULL,
  `idkelas` int(2) NOT NULL,
  `nama_siswa` varchar(500) NOT NULL,
  `jk` enum('Perempuan','Laki-laki') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `agama` varchar(35) NOT NULL,
  `nama_ayah` varchar(250) NOT NULL,
  `nama_ibu` varchar(250) NOT NULL,
  `alamat_ortu` varchar(500) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbsiswa`
--

INSERT INTO `tbsiswa` (`idsiswa`, `idkelas`, `nama_siswa`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `telepon`) VALUES
('16A001', 6, 'Anindya Ismah Nafiah', 'Perempuan', 'Pekanbaru', '21/03/2009', 'Jl. Limbungan', 'Islam', 'Irwan', 'Rini Diana', 'Jl. Limbungan', ''),
('16A003', 6, 'M. Daffa Maulana Syaty', 'Laki-laki', 'Pekanbaru', '09/11/2007', 'Perum Nagoya', 'Islam', 'Ir Syamsul', 'Fenty Chaidir', 'Perum Nagoya', '081261542090'),
('16A026', 6, 'Khansa Fatima', 'Perempuan', 'Pekanbaru', '31/20/2009', 'Jl. Sentosa Alifa Arengka', 'Islam', 'Fahmi Ahmad', 'Devina Sari', 'Jl. Sentosa Alifa Arengka', '085265525056'),
('17A004', 5, 'Azkadina Nasywa', 'Perempuan', 'Pekanbaru', '01/04/2011', 'Jl Limbungan Permai', 'Islam', 'Irwan', 'Rini Diana', 'Jl Limbungan Permai', ''),
('17A005', 5, 'Dafa Rizqy Alfauzi', 'Laki-laki', 'Jakarta', '26/08/2009', 'Jl Limbungan', 'Islam', 'Alman Fauzi', 'Yusriyanti', 'Jl Limbungan', ''),
('17A006', 5, 'Darvesh Nazheef Inamulhaq', 'Laki-laki', 'Pekanbaru', '17/04/2009', 'Jl. Sukakarya', 'Islam', 'Kusbiantoro', ' Nurmalia', 'Jl. Sukakarya', '08529067230'),
('17A007', 5, 'Fatih Azhar Gultom', 'Laki-laki', 'Pekanbaru', '18/04/2011', 'Jl Limbungan', 'Islam', 'Azhar Bambang Gultom', 'Listi Mona Rangkuti', 'Jl Limbungan', ''),
('17A008', 5, 'Fayza Rizkya Fanda', 'Perempuan', 'Pekanbaru', '16/05/2011', 'Jl. H. Ali Akbar', 'Islam', 'Ifrianda', 'Farida Yanti', 'Jl. H Ali Akbar', ''),
('17A009', 5, 'Ibrahim Al Syabani', 'Laki-laki', 'Pekanbaru', '03/07/2011', 'Jl. Umban Sari', 'Islam', 'Jumhar', 'Irmayanti', 'Jl. Umban Sari', '082173347506'),
('17A010', 5, 'Kaylicya Jauza', 'Perempuan', 'Batam', '16/04/2011', 'Jl. Griya Indah', 'Islam', '', 'Eko Zuhendra', 'Yoricya', '082172473320'),
('17A011', 5, 'Kenzie Shidqi Rabbani', 'Laki-laki', 'Bukittinggi', '30/07/2011', 'Jalan Bukit Sari', 'Islam', 'Edwar Ar', 'Risa Rahmedia', 'Jalan Bukit Sari', ''),
('17A012', 5, 'Luay Al Sarry', 'Laki-laki', 'Pekanbaru', '07/02/2010', 'Jl Harapan No. 57', 'Islam', 'Citot Tatas Kusnoto', 'Isyana Dewi', 'Jl Harapan No.57', ''),
('17A014', 5, 'Mukhlas Shiddiq', 'Laki-laki', 'Pekanbaru', '17/01/2011', 'Jl. Umban Sari, Perum PCR', 'Islam', 'Memen Akbar', 'Wiwin Styorini', 'Jl. Umban Sari, Perum PCR', ''),
('17A015', 5, 'Mustaghfir', 'Laki-laki', 'Pekanbaru', '11/10/2010', 'Jl. Citra Sari', 'Islam', 'Romi Yuhendrizal', 'Harfi Khoirul Umi', 'Jl. Citra Sari', ''),
('17A016', 5, 'Rina Puspitasari', 'Perempuan', 'Pekanbaru', '07/05/2011', 'Jl. Gurindam', 'Islam', 'M. Imron', 'Amini', 'Jl. Gurindam', ''),
('17A017', 2, 'Sumayyah Haniyyah Salma', 'Perempuan', 'Tangerang Selatan', '24/12012', 'Jl. Kakap 4', 'Islam', 'Andi Ahmad Aminuddin', 'Siti Rochmatunniyah', 'Jl. Kakap 4', ''),
('17A018', 5, 'Muhammad Faiz Maulana', 'Laki-laki', 'Bukittinggi', '07/09/2010', 'Jl. Sinar Muda Teropong', 'Islam', 'Devitra Yuda', 'Reni Bachrul', 'Jl. Sinar Muda Teropong', '081261099595'),
('18A005', 4, 'Gibran Juang Ramadhan', 'Laki-laki', 'Pekanbaru', '17/08/2011', 'Jl. Belanak no 398', 'Islam', 'Dede Yochi', 'Melly Amelia', 'Jl. Belanak no 398', ''),
('18A006', 4, 'Lathifafarhanatu Shofia', 'Perempuan', 'Pekanbaru', '14/07/2012', 'Jl. Sudirman', 'Islam', 'Ibnu Surya', 'Suryanti', 'Jl. Sudirman', ''),
('18A007', 4, 'M Fathir', 'Laki-laki', 'Pekanbaru', '26/12/2012', 'Jl. Sri Mersing', 'Islam', 'Abriono', 'Yuni Nengsi', 'Jl. Sri Mersing', ''),
('18A008', 4, 'Maryam Aliyyah Dimas', 'Perempuan', 'Johor', '09/09/2011', 'Jln Selumar No.228', 'Islam', 'Dimas Pradhasumitra Mahardika', 'Marina Hayati Adha', 'Jln Seluma No.228', '081268321552'),
('18A009', 4, 'Maulana Wimma Pratama', 'Laki-laki', 'Temanggung', '06/05/2010', 'Jl Karunia', 'Islam', 'Sumadi', 'Apriyani', 'Jl Karunia', '082287975920'),
('18A010', 4, 'Muhammad Al Fatih Murod', 'Laki-laki', 'Pekanbaru', '25/06/2012', 'Jalan Limbungan', 'Islam', 'Jodis Muhammad Sukijo', 'Antik Nur Suprati', 'Jalan Limbungan', ''),
('18A011', 4, 'Nastiti Aisha Khairani', 'Perempuan', 'Duri', '05/12/2012', 'Komplek Palem', 'Islam', 'Ahmad Amri', 'Endah Dian Kresnawati', 'Komplek Palem', ''),
('18A012', 4, 'Ravivatu Rifda', 'Perempuan', 'Duri', '08/04/2012', 'Jalan Pisang', 'Islam', 'Imron Sutiono', 'Irtiahul Azmi', 'Jalan Pisang', ''),
('18A013', 4, 'Reksa Aruna Praja', 'Laki-laki', 'Pekanbaru', '18/11/2011', 'Jl. Narpan', 'Islam', 'Ratno Budi', 'Yanti Yuliana', 'Jl. Narpan', '081276492659'),
('18A023', 4, 'Saudah Husna Syakira', 'Perempuan', 'Tangerang Selatan', '15/03/2011', 'Jl Kakap 4', 'Islam', 'Andi Ahmad Aminuddin', 'Siti Rochmatunniyah', 'Jl Kakap 4', ''),
('19A015', 3, 'Almira Azhar Gultom', 'Perempuan', 'Pekanbaru', '30/09/2012', 'Jln Limbungan', 'Islam', 'Azhar Bambang', 'Listi Mona Rangkuti', 'Jln Limbungan', ''),
('19A016', 3, 'Don Abdad Abibanyu', 'Laki-laki', 'Pekanbaru', '19/04/2012', 'Kompleks Sari Residence', 'Islam', 'Bimatama Lega Pradana', 'Nasia Freemeta Iskandar', 'Kompleks Sari Residence', ''),
('19A017', 3, 'Habiburrahman Hakeem Ar-Riyawie', 'Laki-laki', 'Pekanbaru', '03/05/2010', 'Jl Sudirman', 'Islam', 'Ibnu Surya', ' Suryanti', 'Jl Sudirman', ''),
('19A018', 3, 'Ibrahim Shadiq Ruslan', 'Laki-laki', 'Pekanbaru', '08/11/2011', 'Perum Duta Mas', 'Islam', 'Edi Ruslan', 'Maywarni', 'Perum Duta Mas', '085264212931'),
('19A019', 3, 'Ikram Syuhada', 'Laki-laki', 'Pekanbaru', '08/12/2012', 'Jln. Umban sari atas', 'Islam', 'Sony Martin', 'Hikmawati wahidah', 'Jln. Umban Sari Atas', ''),
('19A020', 3, 'Mikail Alghazi', 'Laki-laki', 'Solok', '30/11/2012', 'Perum Villa Padma 2', 'Islam', 'Aulia Fonny Wandra', 'Atiek F. Asri', 'Perum Villa Padma 2', ''),
('19A021', 3, 'Muhammad Al Farizi Maulana', 'Laki-laki', 'Bukittinggi', '04/02/2013', 'Jln Sinar Muda Teropong', 'Islam', 'Devitra Yudha', 'Reni Bachrul', 'Jln Sinar Muda Teropong', '081261099595'),
('19A022', 3, 'Muhammad Yahya Dimas', 'Laki-laki', 'Johor', '11/09/2012', 'Jln Selumar No.228', 'Islam', 'Dimas Pradhasumitra Mahardika', 'Marina Hayati Adha', 'Jln Seluma No.228', '081268321552'),
('19A024', 3, 'Siti Hafshah', 'Perempuan', 'Pekanbaru', '19/11/2012', 'Jln Umban Sari Atas perum PCR', 'Islam', 'Memen Akbar', 'Wiwin Styorini', 'Jln Umban Sari Atas perum PCR', ''),
('19A025', 3, 'Vino Mahatma Gusril', 'Laki-laki', 'Pekanbaru', '28/10/2012', 'Jl. Putri Ayu', 'Islam', 'Rama Gusril', 'Evi Wandari', 'Jl. Putri Ayu', ''),
('20A000', 3, 'Tengku Syaiyidah Al Haura Salsabila', 'Perempuan', 'Pekanbaru', '29/09/2012', 'Sei Mintan', 'Islam', 'Tengku Khairunnur', 'Doried Eka Septayani', 'Sei Mintan', ''),
('20A027', 2, 'Abdul Jamel', 'Laki-laki', 'Pekanbaru', '02/11/2013', 'Jalan karya Bakti No. 14', 'Islam', 'Rizat', 'Yenny Guswanthi', 'Jalan karya Bakti No. 14', '081275699476'),
('20A029', 2, 'Cakrawala Athallah Riantino', 'Laki-laki', 'Pekanbaru', '11/07/2013', 'Jl. Cemara Kipas', 'Islam', 'Budi Riantino', 'Yenny Guswanthi', 'Jl. Cemara Kipas', '08159916473'),
('20A030', 2, 'Dahnia Aisya Rachmadini', 'Perempuan', 'Pekanbaru', '28/03/2013', 'Jln Limbungan Perum Perdana', 'Islam', 'Sugianto', 'Eka Kartina', 'Jln Limbungan Perum Perdana', '08127561336'),
('20A031', 2, 'Divo Indrawahyu', 'Laki-laki', 'Pekanbaru', '03/03/2013', 'Jalan Budisari No. 23', 'Islam', 'Darot Bowo Sutrisno', 'Eva Suzana', 'Jalan Budisari No. 23', '0852902045551'),
('20A032', 2, 'Habiburahman Hafidz Ar-Rifai', 'Laki-laki', '', '', '', 'Islam', '', '', '', ''),
('20A033', 2, 'Muhammad Malik Assidiq', 'Perempuan', 'Pekanbaru', '02/03/2013', 'Perumahan Berdikari Indah Permai', 'Islam', 'Iqbal Tawaqqal', 'Desy Novika', 'Perumahan Berdikari Indah Permai', '081363665077'),
('20A034', 2, 'Muhammad Zamzam Muttaqin', 'Laki-laki', 'Pekanbaru', '08/01/2014', 'Jalan Suka Indah', 'Islam', 'Agus Budiyanto', 'Wiwin Muallimah', 'Jalan Suka Indah', ''),
('20A035', 2, 'Nafilaturrahma Irfan', 'Perempuan', 'Pekanbaru', '31/10/2013', 'Jalan Limbungan', 'Islam', 'Irfan Usman', 'Rezki Rahmadani', 'Jalan Limbungan', '081363665077'),
('20A036', 2, 'Najwa Nur Azizah', 'Perempuan', 'Pekanbaru', '21/10/2013', 'Jl. Narpan', 'Islam', 'Ratno Budi', 'Yanti Yuliana', 'Jl. Narpan', ''),
('20A037', 2, 'Raudhatul Jannah', 'Perempuan', 'Duri', '17/11/2013', 'Jalan Pisang', 'Islam', 'Imron Sutiono', 'Irtiahul Azmi', 'Jalan Pisang', '081371324321'),
('20A038', 2, 'Vanesta Al Aulya', 'Perempuan', 'Temanggung', '25/06/2013', 'Jalan Harapan No.80', 'Islam', 'Sumadi', ' Apriyani', 'Jalan Harapan No.80', '081240026408'),
('20A042', 3, 'Farras Ahmad Halim', 'Laki-laki', 'Pekanbaru', '25/11/2011', 'Perum Lancang Kuning', 'Islam', '', 'Ella Pandia', 'Perum Lancang Kuning', ''),
('20TK000', 0, 'Hawwa Muthmainnah Dimas', 'Perempuan', 'Pekanbaru', '13/9/2015', 'Jln. Selumar', 'Islam', 'Dimas Pradhasumitra', 'Marina Hayati', 'Jln. Selumar', '081312345678'),
('21A00A', 1, 'Haura Latifa Qolbi', 'Perempuan', 'Pekanbaru', '', '', 'Islam', '', ' ', '', ''),
('21A00B', 1, 'Ustman Abdul Ghani', 'Laki-laki', '', '', '', 'Islam', '', '', '', ''),
('21A00C', 1, 'Muhammad Razieq Alby Zuan', 'Laki-laki', '', '', '', 'Islam', '', '', '', ''),
('21A00D', 1, 'Aslan El Sabrani', 'Laki-laki', '', '', '', 'Islam', '', '', '', ''),
('21A00E', 1, 'Alisha Muaadzah', 'Perempuan', '', '', '', 'Islam', '', '', '', ''),
('21A00F', 0, 'Rafifatu Rifda', 'Perempuan', '', '', '', 'Islam', '', '', '', ''),
('21A00G', 0, 'Zainab Mumtazah', 'Perempuan', '', '', '', 'Islam', '', '', '', ''),
('21A00H', 1, 'Syamrizal Fitra', 'Laki-laki', '', '', '', 'Islam', '', '', '', ''),
('21A00I', 1, 'Jibril Muhammad Aidan', 'Laki-laki', '', '', '', 'Islam', '', '', '', ''),
('21A00J', 1, 'Faiha Syakira Alwis', 'Perempuan', '', '', '', 'Islam', '', '', '', ''),
('21A00K', 1, 'Muhammad Iltizam Riantino', 'Laki-laki', '', '', '', 'Islam', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('fasil','ortu') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'fasil', 'fasil', 'fasil'),
(2, '19A022', 'ortu', 'ortu'),
(6, 'arniya.arniya95@gmail.com', 'sekura21', 'fasil'),
(7, 'asma.ds07@gmail.com', 'sekura21', 'fasil'),
(8, 'dewiapriliyani.apriliyani@gmail.com', 'sekura21', 'fasil'),
(9, 'febrianirizki5@gmail.com', 'sekura21', 'fasil'),
(10, 'yuliasyam88@gmail.com', 'sekura21', 'fasil'),
(11, 'alkemihendra@gmail.com', 'sekura21', 'fasil'),
(12, 'heriadypoeloet@gmail.com', 'sekura21', 'fasil'),
(13, 'melisa160194@gmail.com', 'sekura21', 'fasil'),
(14, 'intanmolina@gmail.com', 'sekura21', 'fasil'),
(15, 'nanikadriani99@gmail.com', 'sekura21', 'fasil'),
(16, 'nepria14sari@gmail.com', 'sekura21', 'fasil'),
(17, 'asrarozanindy@gmail.com', 'sekura21', 'fasil'),
(18, 'nurhazni.nh@gmail.com', 'sekura21', 'fasil'),
(19, 'muharayu@gmail.com', 'sekura21', 'fasil'),
(20, 'ririnurwanti123@gmail.com', 'sekura21', 'fasil'),
(21, 'saidsueni24@gmail.com', 'sekura21', 'fasil'),
(22, 'smtour25@gmail.com', 'sekura21', 'fasil'),
(23, 'radikel.zikri@gmail.com', 'sekura21', 'fasil'),
(24, 'marinahayati@gmail.com', 'sekura21', 'fasil'),
(25, 'rinithio18@gmail.com', 'sekura21', 'fasil'),
(26, 'nisagustianii14@gmail.com', 'sekura21', 'fasil'),
(27, 'pradha20@gmail.com', 'sekura21', 'fasil'),
(28, 'qoni2508', 'qonita2508', 'fasil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pilar`
--
ALTER TABLE `pilar`
  ADD PRIMARY KEY (`kdpilar`);

--
-- Indexes for table `tbfasil`
--
ALTER TABLE `tbfasil`
  ADD PRIMARY KEY (`idfasil`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `tbkd`
--
ALTER TABLE `tbkd`
  ADD PRIMARY KEY (`idkd`);

--
-- Indexes for table `tbkelas`
--
ALTER TABLE `tbkelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `tbnilaikd`
--
ALTER TABLE `tbnilaikd`
  ADD PRIMARY KEY (`idnilai`),
  ADD KEY `idsiswa` (`idsiswa`) USING BTREE,
  ADD KEY `idkelas` (`idkelas`) USING BTREE,
  ADD KEY `idpilar` (`idpilar`) USING BTREE,
  ADD KEY `idsem` (`idsem`);

--
-- Indexes for table `tbobservasi`
--
ALTER TABLE `tbobservasi`
  ADD PRIMARY KEY (`idobservasi`),
  ADD KEY `idsiswa` (`idsiswa`) USING BTREE,
  ADD KEY `idsem` (`idsem`) USING BTREE;

--
-- Indexes for table `tbpilar`
--
ALTER TABLE `tbpilar`
  ADD PRIMARY KEY (`idpilar`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `tbsemester`
--
ALTER TABLE `tbsemester`
  ADD PRIMARY KEY (`idsem`);

--
-- Indexes for table `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbnilaikd`
--
ALTER TABLE `tbnilaikd`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbobservasi`
--
ALTER TABLE `tbobservasi`
  MODIFY `idobservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbpilar`
--
ALTER TABLE `tbpilar`
  MODIFY `idpilar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbfasil`
--
ALTER TABLE `tbfasil`
  ADD CONSTRAINT `tbfasil_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `tbkelas` (`idkelas`);

--
-- Constraints for table `tbnilaikd`
--
ALTER TABLE `tbnilaikd`
  ADD CONSTRAINT `tbnilaikd_ibfk_1` FOREIGN KEY (`idpilar`) REFERENCES `tbpilar` (`idpilar`);

--
-- Constraints for table `tbpilar`
--
ALTER TABLE `tbpilar`
  ADD CONSTRAINT `tbpilar_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `tbkelas` (`idkelas`);

--
-- Constraints for table `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD CONSTRAINT `tbsiswa_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `tbkelas` (`idkelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
