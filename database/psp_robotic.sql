-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 02:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robotic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_views`
--

CREATE TABLE `forum_views` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `matric_no` varchar(15) NOT NULL,
  `program` varchar(4) NOT NULL,
  `sem` int(1) NOT NULL,
  `ic_number` varchar(12) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `matric_no`, `program`, `sem`, `ic_number`, `tel`, `password`, `status`) VALUES
(1, 'KHOR CHUN LEONG', '10DDT20F1009', 'JTMK', 6, '020516070551', '0174594404', '$2y$10$Hoxn.43ydzLI6/E0vpeDXO1ZgLQy47jP3Kr2vOuKhuZPHmTBXBcuS', 'admin'),
(2, 'SATHYS MUNIANDYSAMY', '10DEE20F1054', 'JKE', 5, '020409070935', '011-61491156', '$2y$10$L3oFmancJqoNUk6CpE7wauYkO9kl0Rv0yaE6cPcLPjaa3HL5nIhsS', 'admin'),
(3, 'THINESH ARASU S/O IRASA ARASU', '10DTK20F2022', 'JKE', 4, '020205020549', '011-39424231', '$2y$10$duM8oGGrhuB3befve7jTSOAddCvrnTFkdMYV/PmcaWyDT4QjtCN82', 'member'),
(4, 'LOW WEI TING', '10DDT20F1059', 'JTMK', 6, '020127070478', '0143232828', '$2y$10$ADfnRHRAF64sGIXhnninfuoao4Uv/cdbJXMvzK.CDXtOBccNcpyz2', 'member'),
(5, 'SIEW CHEE SAM', '10DTK20F1041', 'JKE', 5, '020111020169', '011-59797780', '$2y$10$bk9AEfcxg3NHmYCKCdMDbuNactrvk.tc8NUBPBS3ayzvaYLN8BVOe', 'member'),
(6, 'SITI FATIMAH AZZAHRAN BINTI ROSLAN', '10DTK20F2003', 'JKE', 4, '030101070620', '01114884427', '$2y$10$e9zc.wF/QOPrPkfBbzRS7.IC5qluSU5DbyqPYQH.CmSfClzTo.DMK', 'member'),
(7, 'PAVITHREN SATHIASEELAN', '10DEE20F2019', 'JKE', 4, '020308080827', '0164254225', '$2y$10$JolYMfWXC74NAZez03M86.imMvWUIO504VTdAdm75GEVQQ9BuzI0q', 'member'),
(8, 'ONG YU XUN', '10DTK20F2037', 'JKE', 4, '020708080527', '017-6007690', '$2y$10$vsCFRl/JwSkbZNS3c6v5QOmdSlf7ODDpfWjKfnlPT.dejrQwWYj2i', 'member'),
(9, 'ANIQNAJMUDDIN BIN SHARIFUDDIN', '10DDT20F2012', 'JTMK', 5, '020507100405', '017-4750227', '$2y$10$j/xfFukKFMzQL.bTMFxlWOSvtCs9OkygZwRzpwg3TAmjTzlq8Og02', 'member'),
(10, 'DIVESH RAVINDRAN', '10DEP20F2030', 'JKE', 4, '021128081173', '019-4502316', '$2y$10$.zaa93gL9oEUzi2PkQEZnu8PzxJfiHeSSjY0CdE6oBfwiLAuzlG62', 'member'),
(11, 'KAM WENG XUAN', '10DDT20F1065', 'JTMK', 6, '020827080212', '017-4169807', '$2y$10$oPgOWVPy8KKwAAfWU.Vrkuglax1QydJ/UTyPUfYfWnJaD19kumEfi', 'member'),
(12, 'LAWRENCE LEE JIA HEN', '10DEP20F1061', 'JKE', 5, '010531070315', '016-4913972', '$2y$10$FprcMHvFHPjVNiIoJ2mtVejAStYzjgjaAFc1CDAZtULfgMDEba0si', 'member'),
(13, 'YAP CHUNG HERN', '10DEP20F2022', 'JKE', 4, '020805070769', '011-55617121', '$2y$10$ttoQvp6qalAY1GryZQu.WucRCWAsDywd4sBsQF6sG.aIAJm6.gxWC', 'member'),
(14, 'OMAR ABDUL AZIZ BIN ZAMRI', '10DKM20F1107', 'JKM', 5, '020324021245', '018-9452477', '$2y$10$s1ozySgV89WylSCuM/H8PuhSKTmC9gAKIn/8B22sXRyo0xKCPJNDC', 'member'),
(15, 'CHIN CHEE REN', '10DEE20F1011', 'JKE', 5, '020115080783', '016-5338718', '$2y$10$BNkSVOgBtFlipCGizpL8GeK3JpaPhTi7lzPNx482sbOPEoI0z0bYy', 'member'),
(16, 'RAWINAI A/L ANOCA', '10DDT20F2025', 'JTMK', 5, '020617020553', '017-5885183', '$2y$10$ej98z.gUdXTqgJ4eEngJ3ObgOLrPExs/LQj4w4kOu0fCq6S5VdAai', 'member'),
(17, 'LIM WEI JUNN', '10DEE20F2001', 'JKE', 4, '020116021187', '017-5311504', '$2y$10$qOJDtBUpd8C8nq6vokiYmOToL9uHOiAszkLejZhLlGWrj0Jho6ogi', 'member'),
(18, 'LEE SOON HAN', '10DEE20F1041', 'JKE', 5, '020331020515', '013-5883973', '$2y$10$tcLTcvHziSgjS9R9qMCK/unps2fuQLRCUkr7dfWS/LEXXReVd8vJe', 'member'),
(19, 'MUHAMMAD FARIS BIN MUHAMAD KHAIR', '10DEP20F1044', 'JKE', 5, '020724070361', '011-35190204', '$2y$10$Kb7SHK/3QuUft1whCv4j9e86aCxHbe89L9hKDAi7NmpZKLN85COxG', 'member'),
(20, 'LIM ZHI TING', '10DDT20F1053', 'JTMK', 6, '020123021126', '016-4155268', '$2y$10$9FAoFqHECcsya1oDZMW78OaYrMMU3xiOYONe6MYaoqjA0AfPgd.8u', 'member'),
(21, 'OOI JUN XING', '10DEE20F1027', 'JKE', 5, '020615020197', '011-59570621', '$2y$10$/WCPGtzCceOiXxh5PpbSAu3WuT3I.DzUtevEn1/GwkticcQmcm28e', 'member'),
(22, 'ADRIAN TEE JIAN HUI', '10DTK20F1010', 'JKE', 5, '021213060879', '011-33666536', '$2y$10$Au6xvPqV72yTbS38DMR61e5hxOHdy42Z0fq/eg2Aj04jWLNwvlmwm', 'member'),
(23, 'CHNG CHENG XIONG', '10DTK20F1045', 'JKE', 5, '020611020317', '018-4072281', '$2y$10$9jR8vGppV55vuFSYmp3q3e1SRCTwJh5MvpyfvtPCkfsu9OYrrCnS2', 'member'),
(24, 'MUHAMMAD RIDZMAN HADIF BIN MOHD ABDUL TALIB', '10DEP20F1039', 'JKE', 5, '020219020283', '014-9410591', '$2y$10$15ml.LY1zSwZfb6D0PQ8LuYZnnWUW9k3Ogt9iSJgkRZ9TRgHTdbQC', 'member'),
(25, 'MUHAMMAD IKRAM BIN SALIM', '10DEE20F1042', 'JKE', 5, '021030101527', '011-11704424', '$2y$10$yjItZCup.gCMDgBdHVl6PeW7TaEi8i4OJze8sPaZRkgnn.wdVg8nC', 'member'),
(26, 'ELLEN HYMEER BIN ALIFF HYMEER', '10DEE20F1044', 'JKE', 5, '021209100823', '011-63355639', '$2y$10$6vfiEoJEBMXPz1h/jwQ7TeKxvYpqRTUcg76N4Eu5cvsTEPnRVd8Y.', 'member'),
(27, 'DINESH A/L SUPARMANIAM', '10DTK21F1005', 'JTMK', 3, '030218141699', '013-5111802', '$2y$10$5EE5tMNYHUekH4JEW9lEtunVo5NWXlLNoCoF7pMKLgQdXXjjDBxDK', 'member'),
(28, 'DHARVIN A/L RAJENDRAN', '10DTK21F1007', 'JKE', 3, '030317070881', '012-9203034', '$2y$10$K5OoGXb8jk.uEBLR6FGl0eadPtGA9VnhTUdDjmbOEYwvqhrIADFe.', 'member'),
(29, 'OMAR ABDUL AZIZ BIN ZAMRI', '10DKM20F1107', 'JKM', 5, '020324021245', '018-9452477', '$2y$10$itL5r2QojuqiyiOeP0xTXubkZMEej6bl1O/qy.Hg0/rm5IIWN9aFi', 'member'),
(30, 'HARITH DINIE BIN AZAM', '10DEE21F1013', 'JKE', 3, '030619060347', '019-5298027', '$2y$10$sYcCxoszi5CpIJHnKXYddOqwCXIiB4cIZ5sESoGaow327GGa1bcmS', 'member'),
(31, 'MOHAMMAD AIMAN BIN SHAHRUDDIN', '10DEE21F1005', 'JKE', 3, '030627080241', '019-8317907', '$2y$10$tbWEYLYyKY438sm49wkQieRgih6a05znlzIqel1bYlMf07m1BjeVK', 'member'),
(32, 'MUHAMMAD FARIS BIN MUHAMAD KHAIR', '10DEP20F1044', 'JKE', 5, '020724070361', '011-35190204', '$2y$10$.f/B1W.j.RqI2kFXC8ksZevZvx6vuLs5H8fnUpLdywAGjlIWMbnsO', 'member'),
(33, 'MORRISOIN A/L K JOHNSON', '10DEE21F1034', 'JKE', 3, '030903081567', '012-5643738', '$2y$10$uBEH7uHfLyV1SkhB1f4aceGeC.VldK230Po0l7bUzeM51nwtS.MbS', 'member'),
(34, 'PAVITHREN SATHIASEELAN', '10DEE20F2019', 'JKE', 4, '020308080827', '016-4254225', '$2y$10$SwH.PNixUq8J1lJF.VUJveX7INS8eukwbL5PJXTod5MeC78k2pl8G', 'member'),
(35, 'MUHAMMAD SHAHRULL IKBALL BIN MD SHUKRI', '10DEE21F1009', 'JKE', 3, '030322070683', '019-2344587', '$2y$10$P9tcwV29SJqz03OYRGXZU.8B.06F4L2ICOJxJ8Tw1Ma2ami7PhtqC', 'member'),
(36, 'AMIRUL FIKRI BIN ZAMRI', '10DEE21F1021', 'JKE', 3, '031003070111', '011-35483100', '$2y$10$D568y9ES11oUg.dAYVxLDuGFxUnaRugl/BIz8UyuD8NLfXlD8Zk06', 'member'),
(37, 'NG JING SIANG', '10DDT20F2001', 'JTMK', 5, '020302070505', '011-13319232', '$2y$10$RTfWA94.rbP7511xZjYNe.4g5Cu1SuXZDJmHbCpW4QGZQ3ilPw0RC', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(30) NOT NULL,
  `comment_id` int(30) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_views`
--
ALTER TABLE `forum_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `forum_views`
--
ALTER TABLE `forum_views`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
