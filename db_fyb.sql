-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jun 16, 2021 at 11:11 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fyb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `tag` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`id`, `article_id`, `tag`) VALUES
(116, 48, '#rekomendasi'),
(117, 48, '#masker'),
(118, 48, '#whitelab'),
(119, 48, '#imfrom'),
(120, 48, '#axisy'),
(121, 48, ''),
(122, 48, ''),
(123, 40, '#tips'),
(124, 40, ''),
(125, 41, '#tips'),
(126, 41, '#masker'),
(127, 41, ''),
(128, 41, ''),
(129, 42, '#tips'),
(130, 42, '#serum'),
(131, 42, ''),
(132, 43, '#tips'),
(133, 43, '#toner'),
(134, 43, ''),
(135, 46, ''),
(136, 46, '#rekomendasi'),
(137, 46, '#suncreen'),
(138, 46, '#biore'),
(139, 46, '#cosrx'),
(140, 46, '#skinaqua'),
(141, 46, '#nivea'),
(142, 46, ''),
(143, 47, '#rekomendasi'),
(144, 47, '#toner'),
(145, 47, '#paulaschoice'),
(146, 47, '#benton'),
(147, 47, '#pixi'),
(148, 47, '#theordinary'),
(149, 47, '#cosrx'),
(150, 47, '#somebymi'),
(151, 47, ''),
(152, 49, '#rekomendasi'),
(153, 49, '#cosrx'),
(154, 49, '#facewash'),
(155, 49, '#essence'),
(156, 49, ''),
(162, 50, '#rekomendasi'),
(163, 50, '#cosrx'),
(164, 50, '#facewash'),
(165, 50, '#essence'),
(166, 50, ''),
(170, 52, '#coba'),
(171, 52, '#konten');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `name`) VALUES
(5, 'Axis-Y'),
(6, 'COSRX'),
(7, 'Somethinc'),
(8, 'Senka'),
(9, 'Safi'),
(10, 'Emina'),
(11, 'Wardah'),
(12, 'Acnes'),
(13, 'Himalaya'),
(14, 'Scarlett'),
(15, 'The Body Shop'),
(16, 'Paula\'s Choice'),
(17, 'Pixi'),
(18, 'SK-II'),
(19, 'Skin 1004'),
(20, 'Avoskin'),
(21, 'Innisfree'),
(22, 'Laneige'),
(23, 'Klairs'),
(25, 'Joylab');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Face Wash'),
(2, 'Toner'),
(3, 'Ampoule'),
(4, 'Serum'),
(5, 'Moisturizer'),
(6, 'Sunscreen'),
(7, 'Mask');

-- --------------------------------------------------------

--
-- Table structure for table `riviews`
--

CREATE TABLE `riviews` (
  `id` int NOT NULL,
  `text` varchar(1028) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usage_periode` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `riviews`
--

INSERT INTO `riviews` (`id`, `text`, `skin`, `usage_periode`, `rating`, `created_at`, `product_id`, `user_id`) VALUES
(26, 'ini cleanser cocok bgt buat yg males double cleansing, karena udah bisa ngangkat makeup juga (tapi kalo mascara waterproof ngga gitu bersih). kalo cuma pake sunscreen aja, cuci muka pake ini juga udah cukup. kalo aku sih karena udah kebiasaan double cleansing, aku pake ini sebagai first cleanser. teksturnya gel bening encer dan busanya ngga terlalu banyak. ngga bikin kulit terasa kering juga.', 'Kombinasi', '1 - 3 Bulan', 5, '2021-06-06 12:17:35', 28, 35),
(27, 'pengalaman pertama pake bakuchiol, teksturnya beneran minyak banget pake 1/2 tetes juga cukup buat muka dan leher kalau di aku, biasanya aku make di campur sama moist, so far bagus banget buat jerawat, kalau ada benjolan yang mau jadi jerawat terus di pakein ini jadinya cepet mateng dan ilang tanpa bekasss, cumaaaa kalau di aku ini gak ngaruh buat beruntusan huhu, malah serum yang niacinamide 5% yang ngaruh buat beruntusan kalau di aku.', 'Kombinasi', '3 - 6 Bulan', 3, '2021-06-06 12:19:05', 40, 35),
(28, 'beli ini karna banyak review yg bilang bagus tapi setelah aku pakai bener bener ga ada efek apapun beli ini tuh karena katanya bagus buat ngilangin bruntusan soalnya waktu itu aku lagi bruntus parah banget cuman bener bener ga ada efek apa apa sih jadi aga sedih mana mahal :((', 'Kombinasi', '1 - 3 Bulan', 2, '2021-06-06 12:20:04', 36, 35),
(29, 'Ini produk somethinc pertama yang aku coba, aku sebenernya bukan pecinta face oil, tapi pernah sekali nyobain face oil lokal dan enak, akhirnya tertarik lah sama bakuchiol ini yang harga nya pun super affordable, kesan pertama kali hem.. kok keset ya di muka? hehe. Setelah seminggu pake tetiba jerawat nongol di semua sisi, wkwk jerawat nya jenis yang mendem tapi nyeri itu looh, di jidat 1, di pipi kanan kiri, di dagu, ya Allah, sebagai pemilik kulit kering, jerawat adalah hal yang langka buat aku, tapi masi positif thinking, karna waktu itu menjelang period, oh yauda aku mikirnya ini gejala PMS, tapi kok bingung juga, hampir 2 minggu ini kenapa ga adem juga si jeriwit, akhir nya stop lah pemakaian sampe semua jerawat bisa d kendalikan. Pas muka udah oke, aku coba lagi dong bakuchiol ini, ya Allah, muncul lagi jerawatnya??? sekarang udh bener2 stop, belum niat mau nyobain lagi, bisa jadi ini bukan jodoh aku, hiks hiks', 'Kering', '3 - 6 Bulan', 3, '2021-06-06 12:22:07', 40, 36),
(30, 'udah pemakaian hampir habis 1 tube, awalny sih fine2 aja gk buat muka kering/ ketarik. gk tau kenapa beberapa minggu terakhir ini setelah cuci muka rasanya ada beberapa bagian tertarik. setelah pemakaian memang wajah terasa bersih, fresh dan kesat, namun entah kenapa skg jadi gk nyaman setelah cuci muka. btw tipe wajah aku normal to dry dan senstive. mau coba cleanser lain, klairs mgkn bgs kali yaa', 'Kering', '1 - 3 Bulan', 3, '2021-06-06 12:29:41', 60, 36),
(31, 'dah pake skincare ini 3 kali pembelian. Awalnya ngaruh dimuka, tapi makin kesini itu kaya ga ngaruh, entah karna aku ga bersihin muka yang bener atau emg ga ngaruh. Tp pas awal pke itu bruntusan agak hilang. Jadi buat yang pengen nyoba2 dulu ini bisa dipake dlu barengin creamnya jangan lupa', 'Berminyak', '3 - 6 Bulan', 4, '2021-06-06 12:31:38', 54, 37),
(32, 'Aku ini tipe wajah acne prone banyak komedo pori2 besar. Awalnya takut banget cobain ini soalnya kandungan oil semua yekann. Tapi ternyata Masya Allah aku salah guys. INI BAGUS BANGET GAK BOHONG SUER DEH! Aku pake Bakuchiol di mix sama yang serum Hyaluronic B5 beuuuhh perpaduan yang mantap! Aku baru pake 1 minggu lebih. Jerawat mengecil, tekstur wajah semakin halus glowing. Tapi saran aku pakenya hanya pas sebelum tidur yaa soalnya agak lengket di aku. Tapi kalian harus cobain sih ini bagus banget! ?', 'Berminyak', 'Lebih dari 1 tahun', 5, '2021-06-06 12:32:16', 40, 37),
(33, 'Aku suka banget sama produk ini? bener” cocok di aku, dan kaka aku pun juga pakai, ringan banget di wajah, auto stock dirumah, aromanya juga ngga menyengat sama skali, dan aku bener” nggak ada iritasi sama sekali, bruntusanku juga mereda pakai produk yang satu ini?', 'Normal', 'Lebih dari 1 tahun', 5, '2021-06-06 12:37:16', 40, 38),
(34, 'beralih dr acnes ke himalaya ini aku cocok\" aja, busa ga gt banyak, ga bikin kulit ketarik, wanginya ga ganggu, nampol banget buat bersihin wajah, udh repurchase sampe 3 tube, recomendedddddddddddddddd', 'Normal', 'Baru pertama kali', 4, '2021-06-06 12:38:27', 53, 38),
(35, 'Aku ini tipe wajah acne prone banyak komedo pori2 besar. Awalnya takut banget cobain ini soalnya kandungan oil semua yekann. Tapi ternyata Masya Allah aku salah guys. INI BAGUS BANGET GAK BOHONG SUER DEH! Aku pake Bakuchiol di mix sama yang serum Hyaluronic B5 beuuuhh perpaduan yang mantap! Aku baru pake 1 minggu lebih. Jerawat mengecil, tekstur wajah semakin halus glowing. Tapi saran aku pakenya hanya pas sebelum tidur yaa soalnya agak lengket di aku. Tapi kalian harus cobain sih ini bagus banget! ?', 'Kombinasi', 'Kurang dari 1 minggu', 4, '2021-06-06 12:40:17', 40, 39),
(36, 'hi! untuk scarlet acne serum ini, jujur sih awal beli excited bgt karna mikirnya bakal cocok diaku, karna temen²ku yg lain banyak yg cocok sm produk ini, tapi ternyata diakunya ga ngefek sm sekali, malah buat aku jd bruntusan dan nambah acne nya, tapi untuk harga ini sih affordable banget lah', 'Kombinasi', '1 - 3 Bulan', 1, '2021-06-06 12:41:24', 54, 39),
(38, 'bagus sih, cuman agak manis sedikit', 'Basah', 'Baru pertama kali', 4, '2021-06-06 13:33:11', 41, 40),
(39, 'ini adalah review', 'Lembap', '1 - 3 Bulan', 3, '2021-06-06 15:03:57', 31, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tb_articles`
--

CREATE TABLE `tb_articles` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_articles`
--

INSERT INTO `tb_articles` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(40, '4 Tips Supaya Kulit Wajah Segar Sepanjang Hari', 'Banyaknya kegiatan bisa bikin wajah lesu dan tampak kusam. Sering kali perlu touch up dengan makeup supaya kembali terlihat fresh. Tapi pasti ada kalanya malas atau nggak sempat ya, kalau harus touch up atau pakai makeup dulu? Untuk itu, kamu bisa mengikuti beberapa tips ini supaya wajah kamu bisa tampak segar sepanjang hari.\r\n\r\n\r\n1. Mandi jangan lama-lama\r\nOmongan orang tua perihal mandi jangan lama-lama memang ada benarnya. Selain ngabis-ngabisin air dan nambah tagihan air, mandi terlalu lama bisa menyebabkan minyak alami di kulit hilang. Jadi kulit kamu menjadi kering sehabis mandi terlalu lama. Ketika kulit kering, tampilan wajah kamu akan tampak nggak segar. Untuk itu kamu bisa mempersingkatnya jadi beberapa menit saja. Dan yang paling penting adalah, gunakan air hangat bukan air panas.\r\n\r\n2. Gunakan pelembab\r\nRasanya ritual yang ini sudah nggak asing lagi. Semua upaya yang dilakukan untuk membuat wajah jadi segar dan sehat pasti butuh pelembap. ', '60bc866049a03.png', '2021-06-06 08:25:04', '2021-06-06 08:25:04', 27),
(41, '3 Tips Pemakaian Sheet Mask Agar Lebih Maksimal', 'Nggak sedikit orang yang menyimpan berbagai macam sheet mask dalam lemarinya. Salah satu konten kreator Indonesia yang berasal dari Korea, Jang Hansol, juga diketahui sering menggunakan masker di berbagai kesempatan untuk menghidrasi kulitnya. Begitu pula dengan tren satu hari satu masker yang sering diaplikasikan oleh orang-orang Korea Selatan.\r\n\r\nNggak heran kalau kebanyakan masker siap pakai di sana, di jual dalam satu bundle dengan harga cukup terjangkau. Berbeda dengan di sini yang lebih banyak menjualnya satuan. Namun ternyata, masih banyak yang kurang memaksimalkan manfaat sheet mask. \r\n\r\nBerikut adalah beberapa tips pemakaian sheet mask supaya hasilnya bisa lebih optimal!\r\n\r\n1. Perhatikan kandungannya\r\n\r\nBiasanya, pada bungkus masker terpampang jelas kandungan yang menjadi fokus utama. Untuk mengetahui mana yang cocok untuk kamu, kamu harus mengenali kulit kamu terlebih dahulu. Kalau kulit kamu kusam, kamu bisa menggunakan masker yang mengandung bahan pencerah seperti vitamin C, Niacinamide dan pearl', '60bc874adc2ba.jpg', '2021-06-06 08:28:58', '2021-06-06 08:28:58', 27),
(42, 'Jangan Salah, Begini 5 Cara Memilih Serum Sesuai Jenis Kulit', 'Agar kulit wajah tetap kencang dan awet muda, maka perlu dilakukan perawatan kulit dengan cara yang tepat. Salah satu cara yang bisa dilakukan yaitu menggunakan serum wajah. Penggunaan serum bisa membuat perbedaan terbesar untuk wajah dengan meregenerasi sel, sehingga kulit akan terlihat lebih glowing.\r\nDikutip dari stylecaster.com, serum dirancang khusus yang mengandung bahan aktif mewah seperti vitamin dan mineral untuk merawat lapisan kulit wajah hingga ke bagian dalam. Di mana serum memiliki konsistensi berbasis air, bukan berbahan dasar minyak. Hal inilah yang bisa menyerap lebih cepat.\r\nTapi sayangnya tidak semua orang memiliki jenis kulit yang sama, maka akan lebih efektif jika mengaplikasikan produk serum yang tepat.\r\nInilah 5 cara memilih serum berdasarkan jenis kulit yang perlu kamu ketahui.\r\n1. Khusus kulit berjerawat gunakan serum yang berbahan ringan\r\nMengalami masalah kulit berjerawat memang menyebalkan. Khusus kulit berjerawat cenderung berminyak, sebaiknya memilih serum dengan kandungan salicylic ', '60bc8c2787c6c.jpg', '2021-06-06 08:49:43', '2021-06-06 08:49:43', 27),
(43, '5 Kandungan Toner yang Baik Untuk Kulit Berjerawat', 'Agar kulit wajah tetap kencang dan awet muda, maka perlu dilakukan Dalam hal perawatan kulit, penggunaan toner bisa dilakukan semua orang.\r\nSecara efisien, toner wajah pun bekerja membersihkan kotoran maupun minyak berlebih.\r\nDilansir dari Verywellhealth, toner bisa memperbaiki jerawat dan noda di kulit wajah. Tetapi beberapa produk dengan bahan-bahan tertentu mampu mencegah pembentukkan komedo dan jerawat kecil. \r\nApabila kamu memiliki beberapa jerawat dan komedo, 5 kandungan di dalam toner ini sangat cocok untuk kulit berjerawat.\r\n\r\n1. Kandungan AHA tidak akan menyebabkan iritasi\r\nPenggunaan toner dapat mengembalikan tingkat pH kulit dan menghaluskannya. Sedangkan produk toner dengan kandungan AHA paling baik untuk kulit berminyak dan rentan berjerawat. Diwartakan dari Healthline, AHA berfungsi membantu mengobati dan mencegah jerawat berulang. Kamu bisa menggunakan produk AHA di area rawan jerawat lainnya.\r\nJika digunakan dengan benar, bentuk asam alfa-hidroksi (AHA) pada toner tidak akan menyebabkan iritasi', '60bc938329e64.jpg', '2021-06-06 09:21:07', '2021-06-06 09:21:07', 27),
(46, 'Rekomendasi Sunscreen Terjangkau dengan SPF 50+ ', 'Kalau ditanya produk skincare apa yang paling basic dan paling penting untuk dimiliki, maka jawaban nya adalah sunscreen. Sunscreen punya peran vital untuk menjaga kulit dari efek buruk paparan sinar matahari, hingga mencegah penuaan dini terjadi. Soalnya, efek dari paparan sinar matahari tak hanya berisiko membuat kulit menjadi gosong, tetapi juga bisa memicu munculnya flek atau noda hitam di kulit wajah hingga memicu penuaan dini. Oleh karena itu, menggunakan sunscreen sudah seperti sholat lima waktu, wajib hukumnya!  \r\nBila aktivitas sehari-hari banyak membuat kalian terpapar sinar matahari, rekomendasi sunscreen dengan SPF 50+ yang nyaman dan juga cukup ramah di kantung. \r\n\r\nDari berbagai produk sunscreen dengan kandungan SPF 50+, empat produk berikut ini memberikan kesan baik di kulit. Formula yang ringan, tidak memicu bruntusan, tidak meninggalkan white cast, dan tidak pilling menjadi poin penting yang membuat terkesan.', '60bc94c49def5.jpg', '2021-06-06 09:26:28', '2021-06-06 09:26:28', 27),
(47, 'Rekomendasi Acid Toner Terbaik ', 'Apa alasan kamu pas melakukan eksfoliasi di wajah? Walau memang kulit wajah lebih cerah dan tidak kusam adalah hasil yang diinginkan, eksfoliasi juga perlu dilakukan untuk membantu penyerapan tahapan skincare selanjutnya. Pori-pori yang bersih dari sel kulit mati pastinya akan lebih siap menerima manfaat skincare yang dipakai, kan? \r\n\r\nSelain eksfoliasi mekanis menggunakan waslap, brush atau face scrub, banyak yang memilih chemical exfolition menggunakan acid toner. Kamu bisa memilih toner dengan kandungan acid yang paling tepat sesuai jenis kulitmu. Dari banyaknya review acid, berikut rekomendasi terbaik berdasarkan jenis acid-nya. Toner dengan kandungan salicylic acid biasanya dipilih oleh mereka yang memiliki kulit berminyak karena sifatnya yang oil soluble sehingga mampu menembus lapisan minyak.\r\n•	Paula’s Choice Skin Perfecting 2% BHA Liquid Exfoliant\r\n•	Benton Aloe BHA Skin Toner\r\nPemilik kulit kering biasanya lebih suka produk dengan kandungan AHA yang water soluble. ', '60bc95db1ed44.jpg', '2021-06-06 09:31:07', '2021-06-06 09:31:07', 27),
(48, '3 Masker Mugwort Terbaik Buat Atasi Jerawat dan Bikin Kulit Halus! ', 'Saat ini skincare dengan bahan dasar mugwort lagi hype dan banyak digemari nih, girls. Apalagi buat yang punya permasalahan kulit jerawat dan sensitive. Karena mugwort sendiri diklaim mampu membantu mengatasi masalah jerawat dengan lebih lembut dibanding kandungan bahan aktif lainnya. Nah, buat kita yang pengin mengatasi masalah jerawat tanpa bikin kulit makin kering, berikut ini ada rekomendasi masker mugwort yang bisa kita pakai.\r\nDijamin jerawat hilang dan kulit makin lebih halus, deh!\r\n1. Whitelab Mugwort Pore Clarifying Mask\r\nMasker dari merk lokal ini tengah naik daun lho, girls! Kandungan mugwort dalam masker ini akan membantu menenangkan kulit kemerahan akibat radang dan iritasi.\r\nSelain itu masker ini akan membantu mengontrol produksi minyak berlebih, membuat kulit terasa lebih halus dan lembap, dan membersihkan sampai ke pori-pori, deh! Enggak cuma mugwort, masker yang satu ini dilengkapi dengan kandungan niacinamide yang akan memperkuat skin barrier, meratakan dan mencerahkan kulit.\r\n', '60bc96c2c0e0f.jpg', '2021-06-06 09:34:58', '2021-06-06 09:34:58', 27),
(49, '5 Rekomendasi Produk COSRX Untuk Kulit Berminyak', '1. Low pH Good Morning Gel Cleanser\r\nKulit berminyak bukan berarti harus pakai face wash yang fungsinya menguras minyak. Kunci untuk menyeimbangkan minyak adalah menyeimbangkan pH kulit, bukan semata-mata hanya mengurangi minyak. Low pH Good Morning Gel Cleanser ini cukup gentle untuk kulit berminyak, nggak ada kandungan alkohol atau SLS yang berpotensi bikin kulit berminyak malah jadi kering.\r\n\r\nKandungan tea tree oil dan betaine salicylate dalam cleanser ini juga membantu mengontrol jerawat untuk kulit berminyak yang acne-prone. Tapi, ada beberapa FD-ers dengan kulit oily-kombinasi yang bilang kalau cleanser ini kadang terlalu kering untuk bagian kulit mereka yang nggak terlalu berminyak. Overall, it’s still a great cleanser for those of you who doesn’t want to strip your skin of natural oils.\r\n\r\n2. One Step Pimple Clear Pad\r\nExfoliating pads berbentuk kapas basah yang sudah direndam di betaine salicylate (BHA) iniberfungsi  mengeksfoliasi kulit, membersihkan pori-pori dari kotoran, serta mencegah jerawat.', '60bc98e6547cd.jpeg', '2021-06-06 09:44:06', '2021-06-06 09:44:06', 27),
(50, '8 Face Wash Terbaik, Ampun dan Aman untuk Kulit Berjerawat.', 'Punya kulit wajah yang berjerawat memang menyebalkan, kamu jadi harus ekstra hati-hati dalam memilih face wash terbaik yang aman untuk jerawat. Sebenarnya, jerawat sendiri merupakan masalah kulit yang wajar terjadi. Penyebabnya bisa bermacam-macam, mulai dari polusi dan kotoran yang menumpuk di wajah, sisa makeup yang tidak kamu hapus secara menyeluruh, termasuk karena hormon.\r\nNah, maka dari itulah face wash sangatlah penting digunakan dalam rangkaian skincare kamu sehari-hari untuk mengangkat kotoran yang ada di wajah. Lalu, face wash terbaik apa yang ampuh dan aman untuk kulit wajah berjerawat? Simak rekomendasi iPrice berikut ini.\r\n\r\nIni 8 face wash terbaik yang ampuh dan aman untuk kulit berjerawat\r\nRajin membersihkan wajah membuatmu terhindari dari jerawat karena semua kotoran terangkat. Ini dia pilihan face wash terbaik untukmu yang takut-takut sama jerawat.\r\n\r\n1. Innisfree Bija Trouble Facial Foam\r\nInnifree Trouble Facial Foam merupakan face wash atau sabun muka yang mengandung asam salisilat ', '60bc994375e76.jpg', '2021-06-06 09:45:39', '2021-06-06 09:45:39', 27),
(52, 'coba', 'ini konten', '60bce364727aa.jpg', '2021-06-06 15:01:56', '2021-06-06 15:01:56', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `name`, `image`, `price`, `created_at`, `brand_id`, `category_id`) VALUES
(28, 'Quinoa One Step Step Balanced Gel Cleanser', 'product_60bc77aaab5d8.jpg', 200000, '2021-06-06 07:22:18', 5, 1),
(29, 'Sunday Morning Refreshing Cleansing Foam', 'product_60bc79deefdcd.jpg', 169000, '2021-06-06 07:31:43', 5, 1),
(30, 'Artichoke Intensive Skin Barrier Ampoule', 'product_60bc7a9e8259c.jpg', 230000, '2021-06-06 07:34:54', 5, 2),
(31, 'Dark spot Correcting Glow Serum', 'product_60bc7afe41197.jpg', 166000, '2021-06-06 07:36:30', 5, 4),
(32, 'Cera-Heart My Type Duo Cream', 'product_60bc7b2e198a6.jpg', 245000, '2021-06-06 07:37:18', 5, 5),
(33, 'Complete No-Stress Physical Sunscreen', 'product_60bc7b503b0a6.jpg', 210000, '2021-06-06 07:37:52', 5, 6),
(34, 'Mugwort Pore Clarifying Wash Off Pack', 'product_60bc7b8011ed4.jpg', 153000, '2021-06-06 07:38:40', 5, 7),
(35, 'Low pH Good Morning Gel Cleanser', 'product_60bc7be2e171b.jpg', 90000, '2021-06-06 07:40:19', 6, 1),
(36, 'AHA BHA Clarifying Treatment Toner', 'product_60bc7c215a2e4.jpg', 120000, '2021-06-06 07:41:21', 6, 2),
(37, 'Hydrium Centella Aqua Soothing Ampoule', 'product_60bc7c5569d85.jpg', 250000, '2021-06-06 07:42:13', 6, 3),
(38, 'Niacinamide + Moisture Beet Serum', 'product_60bc7cf46988f.jpg', 105000, '2021-06-06 07:44:52', 7, 4),
(39, 'Hyaluronic B5 Serum', 'product_60bc7d3b77341.jpg', 116000, '2021-06-06 07:46:03', 7, 4),
(40, 'Bakuchiol Skinpair Oil Serum', 'product_60bc7d7ed376c.jpg', 100000, '2021-06-06 07:47:10', 7, 4),
(41, 'Perfect Whip', '', 80000, '2021-06-06 07:49:39', 8, 1),
(42, 'White Expert Oil Control & Anti Acne Facial Cleanser', 'product_60bc7e6e004ca.jpg', 55000, '2021-06-06 07:51:10', 9, 1),
(43, 'Perfect Whip', 'product_60bc7ecc555a6.jpg', 80000, '2021-06-06 07:52:44', 8, 1),
(44, 'Dermasafe Soothe & Hydrate Day Moisturizer', 'product_60bc7f0c743de.jpg', 130000, '2021-06-06 07:53:48', 9, 5),
(45, 'Dermasafe Mild & Gentle Gel Cleanser', 'product_60bc7f4f222a9.jpg', 55000, '2021-06-06 07:54:55', 9, 1),
(46, 'Bright Stuff Face Wash', 'product_60bc7f9ec7d1a.jpg', 15000, '2021-06-06 07:56:14', 10, 1),
(47, 'Bright Stuff Moisturizing Cream', 'product_60bc7fd355e61.jpg', 25000, '2021-06-06 07:57:07', 10, 5),
(48, 'Sun Protection', 'product_60bc7ffe7069e.jpg', 70000, '2021-06-06 07:57:50', 10, 6),
(49, 'Nature Daily Mineral + Clarifying Facial Foam', 'product_60bc803c33e65.jpg', 20000, '2021-06-06 07:58:52', 11, 1),
(50, 'Purifying Moisturizer Gel', 'product_60bc8067207b3.jpg', 20000, '2021-06-06 07:59:35', 11, 5),
(51, 'Sunscreen SPF 30', 'product_60bc809b6db73.jpeg', 35000, '2021-06-06 08:00:27', 11, 6),
(52, 'Face Wash Oil Control', 'product_60bc80e659d99.jpg', 22000, '2021-06-06 08:01:42', 12, 1),
(53, 'Purifying Neem Face Wash', 'product_60bc81414c73f.jpg', 25000, '2021-06-06 08:03:13', 13, 1),
(54, 'Whitening Acne Serum', 'product_60bc818feadb5.jpg', 52000, '2021-06-06 08:04:31', 14, 4),
(55, ' Tea Tree Toner ', 'product_60bc81d448f5c.jpg', 135000, '2021-06-06 08:05:40', 15, 2),
(56, 'Vitamin E Moisture Cream', 'product_60bc8200360c5.jpg', 135000, '2021-06-06 08:06:24', 15, 5),
(57, 'Skin Balancing Pore Reducing Toner', 'product_60bc824239072.jpg', 525000, '2021-06-06 08:07:30', 16, 2),
(58, 'Glow Tonic', 'product_60bc8282cf412.jpg', 380000, '2021-06-06 08:08:34', 17, 2),
(59, 'Facial Treatment Clear Lotion ', 'product_60bc82b604873.jpg', 640000, '2021-06-06 08:09:26', 18, 2),
(60, 'Madagascar Centella Ampoule', 'product_60bc82f3c0e3b.jpg', 270000, '2021-06-06 08:10:27', 19, 3),
(61, 'Madagascar Centella AIR FIT Physical Sun Cream', 'product_60bc8321e94b5.jpg', 278000, '2021-06-06 08:11:14', 19, 6),
(62, 'Miraculous Retinol Ampoule', 'product_60bc836c4241b.png', 257000, '2021-06-06 08:12:28', 20, 3),
(63, 'Jeju Lava Seawater Boosting Ampoule EX', 'product_60bc83cb44da2.jpg', 478000, '2021-06-06 08:14:03', 21, 3),
(64, 'Green Tea Moisture Cream', 'product_60bc840ca98f9.jpg', 250000, '2021-06-06 08:15:08', 21, 5),
(65, 'Intensive Leisure Sunscreen Stick', 'product_60bc84393d51d.jpg', 335000, '2021-06-06 08:15:53', 21, 6),
(66, 'White Dew Original Ampoule Essence', 'product_60bc84726576b.jpg', 450000, '2021-06-06 08:16:50', 22, 3),
(67, 'Water Bank Moisture Cream', 'product_60bc84984b538.jpg', 300000, '2021-06-06 08:17:28', 22, 5),
(68, 'Rich Moist Soothing Cream ', 'product_60bc84c4e5587.jpg', 350000, '2021-06-06 08:18:12', 23, 5),
(69, 'Aqua Sun-Day SPF 50 PA++', 'product_60bc85125b2f9.jpg', 315000, '2021-06-06 08:19:30', 25, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int NOT NULL,
  `username` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `name`, `email`, `password`, `gender`, `role`, `created_at`, `updated_at`) VALUES
(27, 'ngadmin', 'ngadmin', 'ngadmin@gmail.com', '$2y$10$7eqQkgy/mTwrqcMhqa2/wOdEwOeugasC9g3BWKukmHZ6AA2vwMKB6', 'laki-laki', 'admin', '2021-04-19 14:01:59', '2021-04-19 14:01:59'),
(35, 'manda_', 'amanda manopo', 'amanda@gmail.com', '$2y$10$TsoMF3pjC.v1tlcbcUdQlOQurDA4bvSsL3jrTtVudcO9FcAcxooHK', 'perempuan', 'user', '2021-06-06 10:16:13', '2021-06-06 10:16:13'),
(36, 'prilly_', 'prilly latuconsina', 'prilly@gmail.com', '$2y$10$wKuItQX.v/cScGFBOQb63OU.H4RFhvx5uZsBqDD8LYCbf9UmtO9bm', 'perempuan', 'user', '2021-06-06 10:26:27', '2021-06-06 10:26:27'),
(37, 'rina_', 'rina nose', 'rina@gmail.com', '$2y$10$Ggp1IwyNPMLCEQGkQdhVDOrnrynOIq/rEPb.Gmq/anV5am3tK8bWq', 'perempuan', 'user', '2021-06-06 11:21:38', '2021-06-06 11:21:38'),
(38, 'nikita_', 'nikita willy', 'nikita@gmail.com', '$2y$10$rpR0.dfW/bd2tMVYoZamB.9h6xDaTMlw65u9LWG07BNruRAJdoslO', 'perempuan', 'user', '2021-06-06 12:36:24', '2021-06-06 12:36:24'),
(39, 'nagita_', 'nagita slavina', 'nagita@gmail.com', '$2y$10$NSpK59A9ropogdwNFSxLUuYSPOIz5tcVtl8zqNwJHb4D2bZkRCONy', 'perempuan', 'user', '2021-06-06 12:39:23', '2021-06-06 12:39:23'),
(40, 'cakep', 'si cakep', 'cakep@gmail.com', '$2y$10$sQG9sjdL5jG/tS0CgG3ZuOOj9DDDIsbRYzWJ15eBASWIqGRVbQYgW', 'laki-laki', 'user', '2021-06-06 13:30:20', '2021-06-06 13:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riviews`
--
ALTER TABLE `riviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_articles`
--
ALTER TABLE `tb_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_tags`
--
ALTER TABLE `article_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riviews`
--
ALTER TABLE `riviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_articles`
--
ALTER TABLE `tb_articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `tb_articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riviews`
--
ALTER TABLE `riviews`
  ADD CONSTRAINT `riviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tb_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_articles`
--
ALTER TABLE `tb_articles`
  ADD CONSTRAINT `tb_articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD CONSTRAINT `tb_products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_products_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `product_brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
