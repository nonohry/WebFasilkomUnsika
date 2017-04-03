-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 04:13 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_foto`
--

CREATE TABLE IF NOT EXISTS `album_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(200) NOT NULL,
  `sampul_album` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `album_foto`
--

INSERT INTO `album_foto` (`id`, `nama_album`, `sampul_album`) VALUES
(10, 'Logo-logo Lembaga di Unsika', 'c69e99247f4bb44edda2231f4447d088.png');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `author` varchar(20) NOT NULL,
  `img_header` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `title`, `slug`, `date`, `time`, `author`, `img_header`, `content`, `category`, `status`) VALUES
(20, 'Kuesioner Alumni Teknik Informatika', 'kuesioner-alumni-teknik-informatika', '2017-04-02', '00:59:16', 'Administrator', '5f3d0eb561f0a22ee234594ff7274e85.jpg', '<p>Diberitahukan kepada alumni Fasilkom semua angkatan, untuk dapat mengisi form kuisioner alumni di&nbsp;<a href="https://goo.gl/forms/aCY3fv6SjSM5z0fk1">https://goo.gl/forms/aCY3fv6SjSM5z0fk1</a></p>\r\n<p>&nbsp;</p>\r\n<p>TTD</p>\r\n<div>\r\n<p>Suharso Aries, S.Si., M.Kom.</p>\r\n</div>', 'pengumuman', 1),
(21, 'Tips Menulis Essay untuk Beasiswa', 'tips-menulis-essay-untuk-beasiswa', '2017-04-02', '01:43:41', 'Administrator', '59a2c654cc6c06d4ca1c3558bc56b59a.jpg', '<p><strong>JAKARTA &ndash;</strong>&nbsp;Essay menjadi salah satu persyaratan yang wajib dipenuhi jika kamu melamar beasiswa, apalagi ke luar negeri. Jumlah kata yang harus dituliskan dalam essay biasanya sekira 500 sampai seribu kata.</p>\r\n<p>Seperti dinukil dari laman&nbsp;<em><strong>Beasiswa Pascasarjana</strong></em>, ada beberapa penyebutan dalam essay ini di antaranya motivation letter, statement of purpose, personal statement, sampai letter of interest. Namun pada dasarnya mereka memiliki kesamaan yakni menceritakan tentang profil kamu, minat, dan goals yang ingin dituju.</p>\r\n<p>Untuk menghasilkan essay yang bisa membawamu lolos pada tahap beasiswa, ada beberapa tips yang bisa coba. Apa saja?</p>\r\n<p><strong>Ketahui Sponsor</strong></p>\r\n<p>Sebelum kamu menuliskan essay, ada baiknya kamu mencari tahu lebih dulu mengenai apa yang diinginkan oleh pihak sponsor. Sehingga beasiswa yang ditawarkan sesuai dengan apa yang dimiliki oleh kamu.</p>\r\n<p><strong>Unik</strong></p>\r\n<p>Tulislah essay dengan unik dan berbeda. Jangan melakukan copy-paste, karena hal ini akan membuat kamu terlihat tidak serius. Kamu bisa mulai menceritakan tentang latar belakang dan alasan tertarik pada beasiswa tersebut.</p>\r\n<p><strong>Menciptakan Kedekatan</strong></p>\r\n<p>Kamu juga perlu untuk menciptakan kedekatan dengan komite beasiswa. Misalnya jika beasiswa tersebut menuntut kandidat memiliki pengalaman kerja, kamu bisa tuliskan tentang pengalaman kerjamu.</p>\r\n<p><strong>Percaya Diri</strong></p>\r\n<p>Saat menulis essay, kamu juga harus bisa percaya diri. Sehingga apa yang kamu tuliskan tidak melebih-lebihkan. Hal ini akan lebih menyakinkan komite beasiswa, tuliskan essay dengan mantap, antusias, serta yakin.</p>\r\n<p><strong>Punya Target</strong></p>\r\n<p>Dalam essay yang kamu tulis, masukkan juga apa rencanamu berikutnya setelah meraih beasiswa ini. Buatlah target yang sesuai dengan visi-misi mereka.</p>\r\n<p><strong>Koreksi Essay</strong></p>\r\n<p>Inilah hal terakhir yang bisa kamu lakukan setelah menulis essay yakni melakukan koreksi. Hal ini penting agar kamu bisa mengevaluasi apa yang telah dituliskan dan diperbaiki.<strong>&nbsp;(afr)</strong></p>\r\n<p>&nbsp;</p>\r\n<p>sumber: okezone.com</p>', 'kampus', 1),
(22, 'Hary Tanoe Berbagi Pengalaman kepada Mahasiswa Universitas Singaperbangsa Karawang', 'hary-tanoe-berbagi-pengalaman-kepada-mahasiswa-universitas-singaperbangsa-karawang', '2017-04-02', '01:54:09', 'Administrator', '29538169ea9c2efbbf0be42216790a5d.jpg', '<p><strong>KARAWANG&nbsp;</strong>- &ldquo;Keberhasilan bukan tentang bagaimana memulainya, tapi bagaimana mengakhirinya,&rdquo; kata Chairman &amp; CEO MNC Group Hary Tanoesoedibjo (Hary Tanoe) saat memberikan kuliah umum di Universitas Singaperbangsa, Karawang.</p>\r\n<p>Auditorium dipenuhi ribuan mahasiswa yang mengikuti kuliah umum yang berlangsung malam hari tersebut. Kuliah umum itu adalah bagian dari perjalanan Hary Tanoe selama tiga hari di Jawa Barat, menempuh jalur darat lebih dari 500 Km meliputi Depok, Bogor, Sukabumi, Pelabuhan Ratu, Cianjur, Padalarang, Purwakarta, Kabupaten Bandung dan Karawang selama tiga hari</p>\r\n<p>Hary menjelaskan dibutuhkan konsistensi, daya juang, militansi, dan inovasi terus menerus untuk meraih keberhasilan. Dalam kesempatan tersebut ia menuturkan sebagai generasi muda harus mau terus belajar, termasuk belajar membangun karakter yang kuat.</p>\r\n<p>&ldquo;Sukses tidak tergantung usia, tapi kualitas kita,&rdquo; ungkapnya di hadapan ribuan mahasiswa Universitas Singaperbangsa, Kamis 30 Maret 2017.</p>\r\n<p>Kepada mahasiswa, Hary Tanoe mengatakan kelak setelah mentas agar membangun daerahnya. Ia menuturkan selama ini pembangunan terpusat di kota-kota besar. Mayoritas kabupaten/kota tertinggal.</p>\r\n<p>Salah satu yang bisa dilakukan adalah dengan menjadi pengusaha menciptakan lapangan kerja. Disisi lain peran pemerintah baik daerah dan pusat diperlukan untuk memberikan kesempatan masyarakat untuk maju. Dengan perlakuan khusus seperti modal murah, pelatihan dan proteksi.</p>\r\n<p>&ldquo;Masyarakat di daerah harus dibangun dengan keberpihakan. Daerah tumbuh menjadi pilar ekonomi, pemerataan kesejahteraan terjadi,&rdquo; pungkasnya.</p>\r\n<p>&nbsp;</p>', 'news', 1),
(23, 'Mahasiswa Harus Tanggap Iptek', 'mahasiswa-harus-tanggap-iptek', '2017-04-02', '02:19:09', 'Administrator', '122c29a29213c6ac95d59fe95d944172.jpg', '<p>Jakarta &ndash; Menteri Riset, Teknologi, dan Pendidikan Tinggi, Mohamad Nasir menjadi dosen tamu pada Kuliah Umum yang berlangsung di Ruang Auditorium di Universitas Katolik Atma Jaya (Unika Atma Jaya) Jakarta, Rabu (3/2/2016).</p>\r\n<p>Kuliah umum ini mengajak mahasiswa untuk lebih membuka mata terhadap perkembangan Ilmu Pengetahuan dan Teknologi, dengan terus mengeksplorasi riset tentang keanekaragaman hayati di Indonesia.</p>\r\n<p>&ldquo;Maka, melek terhadap Iptek menjadi salah satu kunci penting untuk bersaing. Persoalan besarnya, bagaimana mengubah lanskap ekonomi menjadi berorientasi kepada produksi berbasis keanekaragaman hayati. Intinya, kita tidak mungkin bersaing di semua lini, namun perlu merumuskan kekuatan kita dimana bisa menjadi pintu masuk dalam mata rantai industri regional ASEAN tersebut. Pemanfaatan keanekaragaman hayati akan menjadi kunci penting untuk bersaing,&rdquo; jelas Rektor Unika Atma Jaya, A. Prasetyantoko.</p>\r\n<p>Nasir mengungkapkan dalam acara yang mengambil tema &ldquo;Sumber Daya Manusia (SDM) Indonesia yang melek Ilmu Pengetahuan dan Teknologi (Iptek) untuk eksplorasi keanekaragaman hayati Indonesia hingga berdaya saing di era Masyarakat Ekonomi ASEAN (MEA)&rdquo; tersebut bahwa saat ini menghasilkan SDM yang kompetitif dan inovatif menjadi salah satu tantangan tersendiri. Menurut dia, baik Perguruan Tinggi Negeri (PTN) maupun Perguruan Tinggi Swasta (PTS) tidak ada pembedaan dalam mengembangkan riset juga publikasi internasional.</p>\r\n<p>&ldquo;Salah satu isu terbesar memasuki MEA adalah kemampuan bersaing yang lemah. Padahal, negara ini memiliki keanekaragaman hayati yang begitu besar yang menjadi bahan dasar untuk bersaing,&rdquo; ungkapnya.</p>\r\n<p>MEA bukan lagi cita-cita apalagi mitos, melainkan realita. Rangsang terus SDM Indonesia demi wujudkan Mahasiswa lebih tanggap Iptek, lebih terampil, dan lebih siap untuk bersaing di MEA. (ard/bkkpristekdikti)</p>\r\n<p>sumber:&nbsp;http://www.dikti.go.id/mahasiswa-harus-tanggap-iptek/</p>', 'news', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `title`, `content`) VALUES
(1, 'logo header', '<p>http://localhost/cs/file/galeri/logo.png</p>'),
(2, 'title_home', '<p>.:: Fakultas Ilmu Komputer - Universitas Singaperbangsa Karawang ::.</p>'),
(3, 'deskripsi', '<p>Fakultas Ilmu Komputer - Universitas Singaperbangsa Karawang</p>'),
(4, 'keyword', '<p>Fakultas Ilmu Komputer Universitas Singaperbangsa Karawang, Fasilkom Unsika, Unsika Karawang, Teknik Informatika Unsika, Jurusan Komputer Karawang</p>'),
(8, 'teks_kontak', '<p>Jl. H.S. Ronggowaluyo &nbsp;Teluk Jambe Karawang 41361<br />Jawa Barat - Indonesia <br /><br /> E-mail : <a href="mailto:info@unsika.ac.id">info@unsika.ac.id<br /></a>Website : <a href="http://cs.unsika.ac.id">http://cs.unsika.ac.id</a><br />Tlp :&nbsp;(0267) 641177<br />Fax :&nbsp;(0267) 641177</p>'),
(10, 'footer', '<p>Copyleft 2016 Fasilkom Unsika</p>'),
(11, 'google analytic', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(25) DEFAULT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `website`, `message`, `date`, `time`) VALUES
(2, 'Sitelmi', 'aku@sitelmi.com', 'sitelmi.com', 'lorem  ipsum dolor sit amet...', '2017-04-02', '03:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE IF NOT EXISTS `data_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `status_mengajar` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`id`, `nama_dosen`, `foto`, `cv`, `nidn`, `status_mengajar`) VALUES
(17, 'Oman Komarudin, S.Si, M.Kom', '653dc0f3f22dd197ef071158a2ddb8df.jpg', '75887cd90673f949ef94dcb22ba6f244.pdf', '0406047702', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(100) NOT NULL,
  `file` varchar(150) NOT NULL,
  `status` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `judul_file`, `file`, `status`, `tanggal`) VALUES
(5, 'Panduan  SKRIPSI Informatika UNSIKA', '8b981b10abbc88359e35833a2b10a0f6.pdf', 1, '2017-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE IF NOT EXISTS `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `title_img` varchar(50) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `kategori` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `id_album`, `title_img`, `image_url`, `description`, `kategori`, `status`) VALUES
(13, 10, 'Logo Unsika PTN', '873155269fb758c1824ab7cb0445da7b.png', 'Logo Unsika PTN', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_external`
--

CREATE TABLE IF NOT EXISTS `link_external` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `link_external`
--

INSERT INTO `link_external` (`id`, `nama_link`, `url`) VALUES
(2, 'Universitas Singaperbangsa Karawang', 'http://unsika.ac.id/'),
(6, 'Kemenristekdikti', 'http://ristekdikti.go.id/');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `content_id` varchar(200) NOT NULL,
  `view_type` varchar(150) NOT NULL,
  `urutan` int(4) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `parent_id`, `content_id`, `view_type`, `urutan`, `status`) VALUES
(142, 'Program Studi', 'program-studi', 0, 'javascript:void(0)', '1', 0, 1),
(143, 'Sejarah', 'sejarah', 141, 'sejarah', '1', 0, 1),
(144, 'Pendidikan', 'pendidikan', 0, 'javascript:void(0)', '1', 0, 1),
(145, 'Penelitian & Pengabdian', 'penelitian-pengabdian', 0, 'javascript:void(0)', '1', 0, 1),
(147, 'Kemahasiswaan', 'kemahasiswaan', 0, 'javascript:void(0)', '1', 0, 1),
(148, 'Layanan', 'layanan', 0, 'javascript:void(0)', '1', 0, 1),
(149, 'Hubungi Kami', 'hubungi-kami', 0, 'contact-us', '4', 0, 1),
(151, 'Berita', 'berita', 148, 'news', '1', 0, 1),
(152, 'Pengumuman', 'pengumuman', 148, 'pengumuman', '4', 0, 1),
(153, 'Visi & Misi', 'visi-misi', 141, 'visi-misi', '1', 0, 1),
(154, 'Tujuan', 'tujuan', 141, 'tujuan', '1', 0, 1),
(155, 'Kalender Akademik', 'kalender-akademik', 144, 'kalender-akademik', '4', 0, 1),
(156, 'Jadwal Kuliah', 'jadwal-kuliah', 144, 'jadwal-kuliah', '4', 0, 1),
(141, 'Tentang Fasilkom', 'tentang-fasilkom', 0, 'javascript:void(0)', '1', 0, 1),
(158, 'Teknik Informatika', 'teknik-informatika', 142, 'teknik-informatika', '4', 0, 1),
(159, 'Staff Pengajar', 'staff-pengajar', 141, 'data-dosen', '4', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `status`) VALUES
(70, 'Sejarah', 'sejarah', '<p ><strong>Fakultas Ilmu Komputer</strong>&nbsp;semula bernama&nbsp;<strong>Fakultas Teknologi Informasi dan Komunikasi</strong>&nbsp;Didirikan pada tanggal 18 Juli 2008&nbsp; berdasarkan Surat Keputusan&nbsp; Yayasan Pembina Perguruan Tinggi Pangkal Perjuangan Nomor 019/SK/YPPTPP/USK/VII/2008 tentang Pembentukan Fakultas Teknologi Informasi dan Komunikasi Universitas Singperbangsa Karawang. Selanjutnya berdasarkan Surat Keputusan&nbsp; Yayasan Pembina Perguruan Tinggi Pangkal Perjuangan Nomor 017/SK/YPPTPP/USK/VI/2010 tentang perubahan nama Fakultas Teknologi Informasi dan Komunikasi Universitas Singperbangsa Karawang, maka sejak&nbsp; tanggal 21 Juni 2010 berubah nama menjadi Fakultas Ilmu Komputer disingkat Fasilkom.</p>\r\n <p >Fakultas Ilmu Komputer didirikan dengan tujuan untuk memajukan dan memperkembangkan ilmu pengetahuan pada umumnya dan ilmu komputer pada khususnya, serta membentuk manusia susila yang cakap dan bertanggung jawab&nbsp; serta&nbsp; mempersiapkan&nbsp; tunas-tunas muda guna menjadi ahli-ahli komputer yang berguna bagi nusa dan bangsa.</p>', 1),
(71, 'Visi & Misi', 'visi-misi', '<p><strong>A.&nbsp;&nbsp; Visi</strong></p>\r\n<p>Menjadi Pusat Pendidikan Teknologi Informasi yang berdaya saing di tingkat nasional pada tahun 2018</p>\r\n<p><strong>B.&nbsp;&nbsp; Misi</strong></p>\r\n<ol>\r\n<li>Menyelenggarakan pendidikan berkualitas tinggi di bidang teknologi informasi.</li>\r\n<li>Menciptakan, menerapkan dan mengembangkan teknologi informasi yang berdaya guna dan berhasil guna.</li>\r\n<li>Melaksanakan pengabdian kepada masyarakat secara aktif di bidang teknologi informasi</li>\r\n<li>Menciptakan komunitas teknologi informasi yang berjiwa wirausaha dan berdaya saing</li>\r\n</ol>', 1),
(72, 'Tujuan', 'tujuan', '<ol>\r\n<li>Mewujudkan pendidik dan tenaga kependidikan yang memiliki kualifikasi dan kompetensi.</li>\r\n<li>Menghasilkan lulusan yang memiliki kompetensi di bidang informatika serta berakhlak mulia.</li>\r\n<li>Menghasilkan inovasi teknologi informasi untuk pembangunan berkelanjutan melalui penelitian dan studi lainnya.</li>\r\n<li>Menyediakan sarana dan prasarana akademik yang memadai.</li>\r\n<li>Mengaplikasikan inovasi teknologi informasi dalam bentuk pengabdian pada masyarakat untuk peningkatan kesejahteraan masyarakat yang berkelanjutan.</li>\r\n<li>Menciptakan komunitas teknologi informasi yang berjiwa wirausaha dan berdaya saing</li>\r\n</ol>', 1),
(73, 'Kalender Akademik', 'kalender-akademik', '', 1),
(74, 'Jadwal Kuliah', 'jadwal-kuliah', '', 1),
(75, 'Teknik Informatika', 'teknik-informatika', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `title`, `slug`, `date`, `author`, `content`, `status`) VALUES
(6, 'Kuesioner Alumni Teknik Informatika', 'kuesioner-alumni-teknik-informatika', '2017-04-01 18:23:06', 'Administrator', '<p>Diberitahukan kepada alumni Fasilkom semua angkatan, untuk dapat mengisi form kuisioner alumni di&nbsp;<a href="https://goo.gl/forms/aCY3fv6SjSM5z0fk1">https://goo.gl/forms/aCY3fv6SjSM5z0fk1</a></p>\r\n<p>&nbsp;</p>\r\n<p>TTD</p>\r\n<div>\r\n<p>Suharso Aries, S.Si., M.Kom.</p>\r\n</div>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'nonoheryana@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
