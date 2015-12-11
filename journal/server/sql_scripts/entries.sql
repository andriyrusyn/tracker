-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2015 at 06:12 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `426project`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `author_id`, `created_at`, `updated_at`, `body`) VALUES
(1, 1, '2015-12-01 20:08:38', '2015-12-01 20:08:38', ''),
(2, 1, '2015-12-01 20:08:41', '2015-12-01 20:08:41', 'dsaf'),
(3, 1, '2015-12-01 20:09:25', '2015-12-01 20:09:25', ''),
(4, 1, '2015-12-01 20:09:33', '2015-12-01 20:09:33', 'jsakldhgkj  lkajsd hkj hsagdkj hasdgoiuewt'),
(5, 1, '2015-12-01 20:12:49', '2015-12-01 20:12:49', 'jsakldhgkj  lkajsd hkj hsagdkj hasdgoiuewt'),
(6, 1, '2015-12-01 20:13:21', '2015-12-01 20:13:21', 'jsakldhgkj  lkajsd hkj hsagdkj hasdgoiuewt'),
(7, 1, '2015-12-01 20:19:43', '2015-12-01 20:19:43', 'jsakldhgkj  lkajsd hkj hsagdkj hasdgoiuewt'),
(8, 1, '2015-12-01 20:19:44', '2015-12-01 20:19:44', 'jsakldhgkj  lkajsd hkj hsagdkj hasdgoiuewt'),
(9, 1, '2015-12-01 20:19:56', '2015-12-01 20:19:56', 'ASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt'),
(10, 1, '2015-12-01 21:01:43', '2015-12-01 21:01:43', 'MIAHA HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt'),
(11, 1, '2015-12-01 21:02:11', '2015-12-01 21:02:11', '213MIAHA HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt'),
(12, 1, '2015-12-05 12:51:24', '2015-12-05 12:51:24', '213MIAHA HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt mnm mnm mn mn k kkj kj lklk; ;'),
(13, 1, '2015-12-05 12:51:27', '2015-12-05 12:51:27', '213MIAHA HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt mnm mnm mn mn k kkj kj lklk; ;'),
(14, 1, '2015-12-05 12:51:27', '2015-12-05 12:51:27', '213MIAHA HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt mnm mnm mn mn k kkj kj lklk; ;'),
(15, 1, '2015-12-05 12:51:46', '2015-12-05 12:51:46', 'SAFALKJSHG HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt mnm mnm mn mn k kkj kj lklk; ;'),
(16, 1, '2015-12-05 13:22:56', '2015-12-05 13:22:56', '123 HAHAA HAHAISAGK MHEEE MAYA HAHAH dasnmdbamsndbASKJHGSLKJS lkajsd hkj hsagdkj hasdgoiuewt mnm mnm mn mn k kkj kj lklk; ;'),
(17, 1, '2015-12-05 13:44:40', '2015-12-05 13:44:40', 'sadad'),
(18, 1, '2015-12-05 14:48:11', '2015-12-05 14:48:11', 'please work');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
