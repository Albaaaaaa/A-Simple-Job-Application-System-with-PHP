-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2024 pada 11.04
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
-- Database: `db_eris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblapplicants`
--

CREATE TABLE `tblapplicants` (
  `APPLICANTID` int(11) NOT NULL,
  `FNAME` varchar(90) NOT NULL,
  `LNAME` varchar(90) NOT NULL,
  `MNAME` varchar(90) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `SEX` varchar(11) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(255) NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `EMAILADDRESS` varchar(90) NOT NULL,
  `CONTACTNO` varchar(90) NOT NULL,
  `DEGREE` text NOT NULL,
  `APPLICANTPHOTO` varchar(255) NOT NULL,
  `NATIONALID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblapplicants`
--

INSERT INTO `tblapplicants` (`APPLICANTID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `APPLICANTPHOTO`, `NATIONALID`) VALUES
(2024016, 'Zidan', 'Arryo', 'dion', 'Jalan samarinda', 'Female', 'Married', '2001-08-21', 'Ananana', 22, 'zidan', '5ccf4a6bc15e1f67f266b9bf92f24c6e75a1a60d', 'zidanarryo@gmail.com', '0812121212121212121', 'mehehhe', 'photos/download (1).jpeg', ''),
(2024018, 'Adit', 'Putra', 'Perjaka', 'Jl.Elang GG iman', 'Male', 'Married', '2003-06-27', 'Samarinda', 20, 'adit', '2e445949d370543ad32c166c38b1278d67316509', 'aditgaming@gmail.com', '08321263745362', 'kawin', '', ''),
(2024021, 'Maliq', 'Yazid', 'Gaming', 'Jalan Patimura Gg Mersek RT 104 No.7', 'Male', 'Single', '2003-10-29', 'Jakarta', 20, 'maliq', 'ce3ade857a1c55cb6c2ccbef21186a4b68f0eca1', 'maliq@gmail.com', '0852121636462', 'Dokter', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblattachmentfile`
--

CREATE TABLE `tblattachmentfile` (
  `FILEID` bigint(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `FILE_NAME` varchar(90) NOT NULL,
  `FILE_LOCATION` varchar(255) NOT NULL,
  `USERATTACHMENTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblattachmentfile`
--

INSERT INTO `tblattachmentfile` (`FILEID`, `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) VALUES
(2147483647, 8, 'Resume', 'photos/2105202411180611-Article Text-32-2-10-20170905.pdf', 2024019),
(20246912536, 20, 'Resume', 'photos/25052024105052mahasiswa1.png.jpg', 2024019),
(20246912537, 20, 'Resume', 'photos/25052024111153icon.png', 2024019),
(20246912538, 20, 'Resume', 'photos/25052024120637download (1).jpeg', 2024021),
(20246912539, 20, 'Resume', 'photos/27052024081338icon.png', 2024021),
(20246912540, 20, 'Resume', 'photos/270520240903171-Article Text-2-2-10-20200815.pdf', 2024016),
(20246912541, 20, 'Resume', 'photos/28052024095155mee.jpeg', 2024021),
(20246912542, 20, 'Resume', 'photos/28052024103559mee.jpeg', 2024016),
(20246912543, 27, 'Resume', 'photos/03062024071644ling-serene-plume-skin-mobile-legends-4k-wallpaper-3840x2160-uhdpaper.com-383.1_a.jpg', 2024021),
(20246912544, 27, 'Resume', 'photos/03062024072543D’LOKERZ.jpg', 2024021),
(20246912545, 27, 'Resume', 'photos/03062024075803ling-serene-plume-skin-mobile-legends-4k-wallpaper-3840x2160-uhdpaper.com-383.1_a.jpg', 2024021),
(20246912546, 27, 'Resume', 'photos/05062024035206WhatsApp Image 2024-06-03 at 18.27.51_9eb454e2.jpg', 2024016),
(20246912547, 27, 'Resume', 'photos/05062024035922WhatsApp Image 2024-06-03 at 18.27.51_9eb454e2.jpg', 2024021),
(20246912548, 26, 'Resume', 'photos/05062024054307Cuplikan layar 2024-05-14 205830.png', 2024021),
(20246912549, 26, 'Resume', 'photos/06062024052850Cuplikan layar 2024-05-14 205812.png', 2024021),
(20246912550, 25, 'Resume', 'photos/06062024081011Cuplikan layar 2024-05-14 205812.png', 2024021),
(20246912551, 30, 'Resume', 'photos/06062024105042Cuplikan layar 2024-05-14 205830.png', 2024021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 8, 1, 'userid'),
(2, '000', 81, 1, 'employeeid'),
(3, '0', 22, 1, 'APPLICANT'),
(4, '69125', 52, 1, 'FILEID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORYID` int(11) NOT NULL,
  `CATEGORY` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(28, 'UI/UX '),
(34, 'Android-Developer'),
(35, 'Cyber-Security'),
(36, 'Web-Developer'),
(37, 'Cloud-Computing'),
(39, 'Data-Analyst'),
(40, 'Data-Scientist'),
(41, 'DevOps-Engineer'),
(42, 'Network-Engineer'),
(43, 'System-Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblcompany`
--

CREATE TABLE `tblcompany` (
  `COMPANYID` int(11) NOT NULL,
  `COMPANYNAME` varchar(90) NOT NULL,
  `COMPANYADDRESS` varchar(90) NOT NULL,
  `COMPANYCONTACTNO` varchar(30) NOT NULL,
  `COMPANYSTATUS` varchar(90) NOT NULL,
  `COMPANYMISSION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblcompany`
--

INSERT INTO `tblcompany` (`COMPANYID`, `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`, `COMPANYSTATUS`, `COMPANYMISSION`) VALUES
(9, 'PT Pertamina (Persero)', 'Jl. Cendana, Tlk. Lerong Ulu, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur', '(0541) 741294', '', ''),
(10, 'PT PLN (Persero)', 'Jl. Gajah Mada No.23, Jawa, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75242', '(0541) 741531', '', ''),
(11, 'PT Bank Rakyat Indonesia (Persero) Tbk (BBRI)', 'JL. Karang Mumus, Samarinda Kota, Samarinda City, East Kalimantan 75242', ' (0541) 733175', '', ''),
(12, 'PT Telkom Indonesia (Persero) Tbk (TLKM)', ' Jl. Dahlia No.65, Bugis, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75242', '(0541) 200300', '', ''),
(14, 'PT Telekomunikasi Indonesia (Persero) Tbk', 'JL. Sambutan, Samarinda Ilir, Sambutan, Samarinda, Kota Samarinda, Kalimantan Timur 75111', '(0541) 741539', '', ''),
(15, 'PT Bank Mandiri (Persero) Tbk (BMRI)', 'JL. Sungai Pinang Dalam River, Sungai Pinang, Samarinda City, East Kalimantan 75242', ' (0541) 733173', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblemployees`
--

CREATE TABLE `tblemployees` (
  `INCID` int(11) NOT NULL,
  `EMPLOYEEID` varchar(30) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(90) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(90) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(30) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `TELNO` varchar(40) NOT NULL,
  `EMP_EMAILADDRESS` varchar(90) NOT NULL,
  `CELLNO` varchar(30) NOT NULL,
  `POSITION` varchar(50) NOT NULL,
  `WORKSTATS` varchar(90) NOT NULL,
  `EMPPHOTO` varchar(255) NOT NULL,
  `EMPUSERNAME` varchar(90) NOT NULL,
  `EMPPASSWORD` varchar(125) NOT NULL,
  `DATEHIRED` date NOT NULL,
  `COMPANYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblemployees`
--

INSERT INTO `tblemployees` (`INCID`, `EMPLOYEEID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `SEX`, `CIVILSTATUS`, `TELNO`, `EMP_EMAILADDRESS`, `CELLNO`, `POSITION`, `WORKSTATS`, `EMPPHOTO`, `EMPUSERNAME`, `EMPPASSWORD`, `DATEHIRED`, `COMPANYID`) VALUES
(77, '2211102441082', 'Maliq', 'Imani', 'Yazin', 'JL. Balikpapan GG Nur', '1991-03-01', 'Balikpapan', 33, 'Male', 'Married', '0852492032084042', 'maliqyazidimani@gmail.com', '', 'UI/UX', '', '', '2211102441082', 'b97e2ebacf7aba0ae8ea507a7040b572b3564131', '2024-06-06', 9),
(78, '2211102441104', 'Muhammad', 'Alba', 'Ulil', 'JL. Gerilya GG Proklamasi', '1998-12-30', 'Yogyakarta', 25, 'Male', 'Single', '0863277323', 'alba@gmail.com', '', 'Cyber Security', '', '', '2211102441104', '4d30fc9745905926775a3825cfac5b2f2a0a0e4c', '2024-06-06', 14),
(79, '2211102441097', 'Dion', 'max', 'Rabbil', 'JL. Tengkoang GG Maximan', '1995-06-14', 'Tenggarong', 28, 'Male', 'Married', '08626737238', 'dion@gmail.com', '', 'Web Developer', '', '', '2211102441097', '432cdc9a348f5b255dac27f1040e97b4868baf33', '2024-06-05', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FEEDBACKID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `REGISTRATIONID` int(11) NOT NULL,
  `FEEDBACK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblfeedback`
--

INSERT INTO `tblfeedback` (`FEEDBACKID`, `APPLICANTID`, `REGISTRATIONID`, `FEEDBACK`) VALUES
(22, 2024021, 24, 'Lamaran Kami Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljob`
--

CREATE TABLE `tbljob` (
  `JOBID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `CATEGORY` varchar(90) NOT NULL,
  `OCCUPATIONTITLE` varchar(90) NOT NULL,
  `REQ_NO_EMPLOYEES` int(11) NOT NULL,
  `SALARIES` double NOT NULL,
  `DURATION_EMPLOYEMENT` varchar(90) NOT NULL,
  `QUALIFICATION_WORKEXPERIENCE` text NOT NULL,
  `JOBDESCRIPTION` text NOT NULL,
  `PREFEREDSEX` varchar(30) NOT NULL,
  `SECTOR_VACANCY` text NOT NULL,
  `JOBSTATUS` varchar(90) NOT NULL,
  `DATEPOSTED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbljob`
--

INSERT INTO `tbljob` (`JOBID`, `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`) VALUES
(5, 10, 'UI/UX', 'Desainer UI/UX', 2, 2100000, '10/10/2025', '-Pengalaman kerja minimal 2 tahun dalam desain UI/UX, preferensi dalam lingkungan perusahaan atau startup.\r\n-Penguasaan alat desain seperti Adobe XD, Sketch, atau Figma.\r\n-Memahami prinsip-prinsip desain responsif dan pengalaman pengguna.\r\n-Kemampuan untuk berkolaborasi secara efektif dengan berbagai pemangku kepentingan.\r\nKemampuan komunikasi yang baik dan kemampuan untuk mempresentasikan ide secara jelas.\r\nGelar sarjana atau setara dalam desain, komputer, atau bidang terkait.', 'PT PLN PERSERO adalah perusahaan energi terkemuka di Indonesia yang berkomitmen untuk menyediakan layanan listrik yang andal dan berkualitas kepada masyarakat. Dengan fokus pada inovasi dan teknologi, PLN memainkan peran penting dalam mendukung pertumbuhan dan kemajuan infrastruktur energi negara.', 'Laki-Laki', 'Jika Anda tertarik dan memenuhi kualifikasi di atas, silakan kirimkan CV dan portofolio desain Anda ke alamat email HR@pln.co.id dengan subjek \"Lamaran Desainer UI/UX\". Kirimkan juga surat pengantar yang menjelaskan mengapa Anda cocok untuk posisi ini. Jangan ragu untuk menunjukkan proyek-proyek desain sebelumnya yang dapat menyoroti kemampuan dan pengalaman Anda.', '', '2024-05-18 05:35:00'),
(6, 11, 'Cyber-Security', 'Penetrasi Tes', 5, 4200000, '19/10/2025', '-Pengetahuan mendalam tentang teknologi keamanan siber, termasuk serangan siber umum, metode deteksi, dan alat keamanan.\r\n-Kemampuan analisis yang kuat dan ketangkasan dalam mengatasi insiden keamanan.\r\n-Sertifikasi keamanan siber seperti Certified Information Systems Security Professional (CISSP) atau Certified Ethical Hacker (CEH) dianggap sebagai nilai tambah.', 'PT Bank Rakyat Indonesia (Persero) Tbk (BBRI) mencari seorang Analis Keamanan Siber yang berpengalaman untuk bergabung dengan tim keamanan informasi mereka. Sebagai seorang Analis Keamanan Siber di BBRI, Anda akan bertanggung jawab untuk melindungi sistem, data, dan infrastruktur perusahaan dari serangan siber yang berpotensi merugikan. ', 'Laki-Laki', 'Analis Keamanan Siber di PT Bank Rakyat Indonesia (Persero) Tbk (BBRI)', '', '2024-05-18 05:47:00'),
(7, 9, 'Data-Analyst', 'Visualisasi Data', 3, 4400000, '19/10/2026', '-Pengalaman dalam analisis data, pengolahan data, dan penggunaan alat analisis seperti Python, R, SQL, dan alat BI (Business Intelligence) seperti Tableau atau Power BI.\r\n-Kemampuan analisis yang kuat dan pemahaman yang mendalam tentang konsep statistik dan pemodelan data.\r\n-Kemampuan komunikasi yang baik dan kemampuan untuk menyampaikan hasil analisis secara jelas kepada audiens non-teknis.', 'PT Pertamina adalah perusahaan energi terkemuka di Indonesia yang terlibat dalam eksplorasi, produksi, pengolahan, dan distribusi energi. Mereka mencari seorang Analis Data yang berbakat untuk bergabung dengan tim mereka. Sebagai seorang Analis Data di PT Pertamina, Anda akan memainkan peran kunci dalam mengubah data menjadi wawasan berharga yang mendukung pengambilan keputusan strategis.', 'Perempuan', 'Sebagai seorang Analis Data di PT Pertamina, Anda akan memiliki kesempatan untuk memanfaatkan potensi data perusahaan untuk menghasilkan wawasan yang berharga dan mendukung pertumbuhan bisnis yang berkelanjutan.', '', '2024-05-18 05:52:00'),
(8, 12, 'None', 'Web Developer Expert', 3, 4200000, '14/12/2024', '-Gelar Sarjana di bidang Ilmu Komputer, Teknik Informatika, atau disiplin terkait.\r\n-Pengalaman kerja minimal 2 tahun dalam pengembangan web dan aplikasi web.\r\n-Penguasaan bahasa pemrograman web seperti HTML, CSS, JavaScript, dan -kerangka kerja seperti React, Angular, atau Vue.js.', 'PT Telkom Persero adalah tempat yang tepat bagi para web developer yang bersemangat untuk berkontribusi dalam industri teknologi informasi dan komunikasi yang berkembang pesat. Bergabunglah dengan kami untuk menjadi bagian dari perubahan yang positif dalam era digital ini!', 'Laki-Laki', 'Perusahaan: PT Telkom Persero', '', '2024-05-18 10:41:00'),
(20, 9, 'Android-Developer', 'Flutter Developer Expert', 3, 4500000, '01/10/2024', '-Pengalaman yang kuat dalam pengembangan aplikasi mobile menggunakan Flutter, dengan portofolio yang menunjukkan kemampuan teknis dan kreativitas dalam merancang antarmuka pengguna.\r\n-Pengetahuan yang mendalam tentang bahasa pemrograman Dart, framework Flutter, dan konsep-konsep pengembangan aplikasi mobile.\r\n-Kemampuan untuk bekerja dalam tim, berkomunikasi dengan jelas, serta berkolaborasi secara efektif dengan anggota tim lainnya.', 'Sebagai seorang Flutter Developer Expert, Anda bertanggung jawab untuk mengembangkan aplikasi mobile cross-platform yang menarik dan inovatif menggunakan framework Flutter. Anda akan bekerja dalam tim pengembangan untuk merancang, mengembangkan, dan memelihara aplikasi dengan fokus pada performa tinggi, UI/UX yang menarik, serta kualitas kode yang tinggi.', 'Laki-Laki', 'PT Pertamina Official', '', '2024-05-25 10:38:00'),
(21, 12, 'Web-Developer', 'Web Developer Expert', 3, 6000000, '30/09/2024', '-Memiliki pengalaman minimal 2 tahun sebagai web developer.\r\n-Menguasai HTML, CSS, JavaScript, dan framework seperti React atau Angular.\r\n-Memiliki pengetahuan yang baik tentang desain responsif dan pengalaman pengguna (UX).', 'Kami mencari web developer yang kreatif dan berpengalaman untuk bergabung dengan tim kami di PT Telkom Indonesia (Persero) Tbk (TLKM). Tugas utama Anda akan mencakup pengembangan dan pemeliharaan situs web perusahaan kami, serta berkolaborasi dengan tim desain dan pengembangan untuk meningkatkan pengalaman pengguna. Anda akan bekerja pada berbagai proyek yang menarik dan memainkan peran penting dalam menciptakan solusi digital yang inovatif untuk perusahaan kami.', 'Laki-Laki', 'Teknologi Informasi', '', '2024-05-29 03:40:00'),
(22, 13, 'Cloud-Computing', ' Cloud Engineer', 2, 9000000, '30/12/2024', '-Pengalaman minimal 3 tahun dalam pengelolaan infrastruktur cloud.\r\n-Memiliki pengetahuan mendalam tentang platform cloud seperti AWS, Azure, atau Google Cloud Platform.\r\n-Familiar dengan konsep DevOps dan otomatisasi pengelolaan infrastruktur.\r\n-Kemampuan dalam scripting menggunakan bahasa seperti Python, PowerShell, atau Bash.\r\n-Memiliki sertifikasi terkait cloud computing merupakan nilai tambah.', 'Kami mencari Cloud Engineer yang berpengalaman untuk bergabung dengan tim kami di PT Telkom Indonesia (Persero) Tbk (TLKM). Tugas Anda akan mencakup desain, implementasi, dan pemeliharaan infrastruktur cloud perusahaan kami. Anda akan bekerja sama dengan tim pengembangan untuk menyediakan lingkungan yang aman, scalable, dan efisien di platform cloud yang relevan. Peran ini membutuhkan seseorang yang memiliki pemahaman yang kuat tentang prinsip cloud computing dan mampu menghadapi tantangan teknis yang kompleks.', 'Perempuan', 'Teknologi Informasi', '', '2024-05-29 03:43:00'),
(23, 10, 'Data-Analyst', 'Data Analyst Expert', 1, 4200000, '30/12/2025', '-Memiliki gelar sarjana di bidang Ilmu Komputer, Statistik, Matematika, atau bidang terkait.\r\n-Pengalaman kerja minimal 2 tahun sebagai analis data atau peran terkait.\r\n-Menguasai bahasa pemrograman seperti Python atau R untuk analisis data.\r\n-Familiar dengan tools dan platform analisis data seperti SQL, Excel, Tableau, atau Power BI.', 'Kami mencari seorang Data Analyst yang berpengalaman untuk bergabung dengan tim kami di PT Telkom Indonesia (Persero) Tbk (TLKM). Tugas utama Anda akan mencakup pengumpulan, analisis, dan interpretasi data untuk memberikan wawasan yang berharga kepada manajemen perusahaan. Anda akan bekerja dengan berbagai tim fungsional untuk memahami kebutuhan analisis data mereka dan menyediakan solusi yang relevan. Peran ini membutuhkan kemampuan analisis yang kuat, kreativitas dalam menemukan pola dalam data, dan kemampuan untuk mengkomunikasikan temuan secara efektif.', 'Laki-Laki', 'Teknologi Informasi', '', '2024-05-29 03:46:00'),
(24, 13, 'Data-Scientist', 'Data Scientist Regular', 2, 600000, '30/12/2024', 'Memiliki gelar sarjana atau lebih tinggi di bidang Ilmu Komputer, Statistik, Matematika, atau bidang terkait.\r\nPengalaman kerja minimal 3 tahun dalam peran analisis data atau ilmu data.\r\nMenguasai bahasa pemrograman seperti Python atau R untuk analisis data dan pembuatan model.\r\nPengalaman dalam penggunaan framework machine learning seperti TensorFlow, PyTorch, atau scikit-learn.', 'Kami mencari Data Scientist yang berpengalaman untuk bergabung dengan tim kami di PT Telkom Indonesia (Persero) Tbk (TLKM). Anda akan bertanggung jawab untuk mengembangkan model prediktif, melakukan analisis mendalam terhadap data, dan memberikan wawasan yang berharga kepada manajemen perusahaan. Peran ini akan melibatkan kolaborasi dengan berbagai tim fungsional untuk memahami kebutuhan bisnis mereka dan menyediakan solusi analitis yang inovatif. Kami mencari seseorang yang memiliki pemahaman yang kuat tentang teknik analisis data dan machine learning, serta kemampuan untuk menghadapi tantangan analitis yang kompleks.', 'Perempuan', 'Teknologi Informasi', '', '2024-05-29 03:50:00'),
(25, 12, 'DevOps-Engineer', 'DevOps Engineer Senior', 2, 900000, '30/11/2025', '-Pengalaman kerja minimal 3 tahun dalam pengembangan perangkat lunak atau operasi sistem.\r\n-Menguasai alat-alat DevOps seperti Docker, Kubernetes, Jenkins, Ansible, dan Git.\r\n-Memiliki pengetahuan mendalam tentang administrasi sistem operasi Linux.', 'Kami mencari DevOps Engineer yang berpengalaman untuk bergabung dengan tim kami di PT Telkom Indonesia (Persero) Tbk (TLKM). Tugas Anda akan mencakup desain, implementasi, dan pemeliharaan infrastruktur otomatisasi untuk mempercepat proses pengembangan dan pengiriman perangkat lunak. Anda akan bekerja dengan tim pengembangan untuk menyediakan lingkungan yang aman, skalabel, dan efisien, serta memastikan aplikasi kami berjalan dengan lancar di berbagai platform. Peran ini membutuhkan seseorang yang memiliki pemahaman yang kuat tentang praktik DevOps dan pengalaman dalam bekerja dengan teknologi cloud dan otomatisasi.', 'Laki-Laki', 'Teknologi Informasi', '', '2024-05-29 03:52:00'),
(26, 10, 'Network-Engineer', ' Network Engineer Regular', 2, 5200000, '30/12/2025', '-Pengalaman kerja minimal 2 tahun dalam perencanaan, desain, implementasi, dan pemeliharaan jaringan komputer.\r\n-Memiliki pengetahuan mendalam tentang protokol jaringan, seperti TCP/IP, DHCP, DNS, OSPF, dan BGP.\r\n-Pengalaman dalam mengelola perangkat jaringan seperti router, switch, firewall, dan access point.\r\n-Familiar dengan teknologi jaringan terkini, termasuk SD-WAN, VPN, dan teknologi cloud networking.\r\n-Memiliki sertifikasi terkait jaringan seperti CCNA, CCNP, atau sertifikasi vendor lainnya merupakan nilai tambah.', 'Kami mencari Network Engineer yang berpengalaman untuk bergabung dengan tim kami di PT Telkom Indonesia (Persero) Tbk (TLKM). Tugas Anda akan mencakup perencanaan, desain, implementasi, dan pemeliharaan infrastruktur jaringan kami, serta memastikan kinerja dan keamanan jaringan yang optimal. Anda akan bekerja dengan berbagai tim internal untuk memahami kebutuhan bisnis mereka dan menyediakan solusi jaringan yang sesuai. Peran ini membutuhkan seseorang yang memiliki pemahaman yang kuat tentang teknologi jaringan dan kemampuan untuk menangani tantangan jaringan yang kompleks.', 'Laki-Laki', 'Jaringan ', '', '2024-05-29 03:54:00'),
(28, 14, 'System-Administrator', 'System Administrator', 5, 4200000, '19/10/2025', '-Pengetahuan Teknis: Pengetahuan yang mendalam tentang sistem operasi (Windows, Linux, dll.), jaringan komputer, virtualisasi, dan keamanan informasi diperlukan.\r\n-Keterampilan Analitis: Kemampuan untuk menganalisis masalah jaringan dan sistem, serta merencanakan solusi yang efektif.\r\n-Keterampilan Komunikasi: Kemampuan berkomunikasi dengan jelas dan efektif dengan anggota tim dan pengguna akhir.\r\n-Sertifikasi: Sertifikasi profesional seperti CompTIA Network+, Microsoft Certified Systems Administrator (MCSA), atau Cisco Certified Network Associate (CCNA) akan menjadi nilai tambah.', 'Sebagai seorang System Administrator, Anda akan menjadi bagian integral dari tim TI (Teknologi Informasi) sebuah organisasi. Peran Anda akan melibatkan pengelolaan, pemeliharaan, dan peningkatan infrastruktur TI organisasi tersebut. Anda akan bertanggung jawab untuk memastikan bahwa sistem komputer dan jaringan beroperasi dengan lancar, aman, dan efisien.', 'Laki-Laki', 'Administrator', '', '2024-06-06 05:59:00'),
(29, 15, 'Cloud-Computing', ' Cloud Computing Specialist', 3, 3200000, '19/10/2025', '-Memiliki pengetahuan yang baik tentang layanan cloud seperti AWS, Azure, atau Google Cloud Platform.\r\n-Memahami konsep jaringan, keamanan informasi, dan manajemen identitas dalam konteks lingkungan cloud.\r\n-Memiliki sertifikasi terkait cloud (misalnya AWS Certified Solutions Architect, Microsoft Certified: Azure Administrator, Google Professional Cloud Architect) merupakan nilai tambah.', 'Sebagai seorang Cloud Computing Specialist di PT Bank Mandiri (Persero) Tbk (BMRI), Anda akan menjadi bagian dari tim yang bertanggung jawab atas desain, implementasi, dan manajemen infrastruktur cloud untuk mendukung operasional perbankan kami. Peran Anda akan mencakup berbagai tanggung jawab kunci yang akan memungkinkan kami untuk tetap menjadi inovatif dan efisien dalam menyediakan layanan perbankan kepada nasabah kami.', 'Laki-Laki', ' Cloud Computing System', '', '2024-06-06 08:19:00'),
(30, 15, 'Data-Scientist', 'Data Scientist Expert', 3, 4500000, '19/07/2026', '-Pengalaman kerja minimal 2 tahun dalam analisis data, preferensi dalam industri perbankan atau keuangan.\r\n-Penguasaan bahasa pemrograman seperti Python atau R untuk analisis data.\r\nPengetahuan yang kuat tentang teknik machine learning, termasuk regresi, klasifikasi, pengelompokan, dan pemrosesan bahasa alami.\r\n-Kemampuan untuk menggunakan alat analisis data seperti Pandas, NumPy, Scikit-learn, dan TensorFlow.', 'Sebagai seorang Data Scientist di PT Bank Mandiri (Persero) Tbk (BMRI), Anda akan menjadi bagian integral dari tim yang bertanggung jawab atas analisis data yang mendalam untuk mendukung pengambilan keputusan yang strategis dalam bisnis perbankan kami. Peran Anda akan melibatkan penerapan teknik analisis data canggih untuk menggali wawasan berharga dari kumpulan data yang besar dan kompleks', 'Perempuan', 'Sistem Informasi', '', '2024-06-06 08:22:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljobregistration`
--

CREATE TABLE `tbljobregistration` (
  `REGISTRATIONID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `APPLICANT` varchar(90) NOT NULL,
  `REGISTRATIONDATE` date NOT NULL,
  `REMARKS` varchar(255) NOT NULL DEFAULT 'Pending',
  `FILEID` int(11) NOT NULL,
  `PENDINGAPPLICATION` tinyint(1) NOT NULL DEFAULT 1,
  `HVIEW` tinyint(1) NOT NULL DEFAULT 1,
  `DATETIMEAPPROVED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PICLOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'JANO ', 'janobe', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/mahasiswa1.png.jpg'),
('029837', 'kelompok3', 'kelompok3', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/download.jpeg'),
('2211102441082', 'Maliq Imani', 'Imani', 'b97e2ebacf7aba0ae8ea507a7040b572b3564131', 'Employee', ''),
('2211102441097', 'Dion max', 'max', '432cdc9a348f5b255dac27f1040e97b4868baf33', 'Employee', ''),
('2211102441104', 'Muhammad Alba', 'Alba', '4d30fc9745905926775a3825cfac5b2f2a0a0e4c', 'Employee', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblapplicants`
--
ALTER TABLE `tblapplicants`
  ADD PRIMARY KEY (`APPLICANTID`);

--
-- Indeks untuk tabel `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  ADD PRIMARY KEY (`FILEID`);

--
-- Indeks untuk tabel `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indeks untuk tabel `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORYID`);

--
-- Indeks untuk tabel `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Indeks untuk tabel `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`INCID`),
  ADD UNIQUE KEY `EMPLOYEEID` (`EMPLOYEEID`);

--
-- Indeks untuk tabel `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FEEDBACKID`);

--
-- Indeks untuk tabel `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JOBID`);

--
-- Indeks untuk tabel `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  ADD PRIMARY KEY (`REGISTRATIONID`);

--
-- Indeks untuk tabel `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblapplicants`
--
ALTER TABLE `tblapplicants`
  MODIFY `APPLICANTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024022;

--
-- AUTO_INCREMENT untuk tabel `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  MODIFY `FILEID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20246912552;

--
-- AUTO_INCREMENT untuk tabel `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `INCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FEEDBACKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  MODIFY `REGISTRATIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
