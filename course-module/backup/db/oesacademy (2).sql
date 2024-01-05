-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2020 at 09:20 PM
-- Server version: 5.6.48-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oesacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `AdminId` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UserStatus` enum('Active','InActive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`AdminId`, `UserName`, `UserPassword`, `UserStatus`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_mail`
--

CREATE TABLE `admin_mail` (
  `MailId` int(11) NOT NULL,
  `MailAddress` varchar(255) NOT NULL,
  `UserImage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_mail`
--

INSERT INTO `admin_mail` (`MailId`, `MailAddress`, `UserImage`) VALUES
(1, 'info@skillogics.co.uk', '30730286.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announsement`
--

CREATE TABLE `announsement` (
  `id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `description` blob NOT NULL,
  `add_date` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announsement`
--

INSERT INTO `announsement` (`id`, `announcement_title`, `description`, `add_date`, `status`) VALUES
(2, 'Lorem Ipsum', 0x3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e3c2f703e, '2018-02-08', '1'),
(3, 'Lorem Ipsum', 0x3c703e4c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e3c2f703e, '2018-02-08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_heading` varchar(255) NOT NULL,
  `banner_sub_heading` varchar(255) NOT NULL,
  `banner_img` varchar(255) NOT NULL,
  `banner_description` blob NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_heading`, `banner_sub_heading`, `banner_img`, `banner_description`, `status`) VALUES
(3, 'WELCOME TO SKILLOGICS', 'Delivery Methods:', 'nego.png', 0x3c756c3e0a3c6c693e4f6e2d43616d7075733c2f6c693e0a3c6c693e4f6e6c696e653c2f6c693e0a3c6c693e507269766174653c2f6c693e0a3c6c693e436f6d62696e6174696f6e206f662061626f76653c2f6c693e0a3c2f756c3e, '1'),
(5, 'Web Development', 'Front End Development', '', 0x3c756c3e0a3c6c693e48544d4c3c2f6c693e0a3c6c693e4353533c2f6c693e0a3c6c693e4a6176617363726970743c2f6c693e0a3c6c693e7068703c2f6c693e0a3c6c693e5265616374266e6273703b3c2f6c693e0a3c2f756c3e, '1');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchId` int(11) NOT NULL,
  `batchName` varchar(255) DEFAULT NULL,
  `courseId` int(11) DEFAULT NULL,
  `courseType` varchar(255) DEFAULT NULL,
  `batchLocation` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `total_hour` int(11) NOT NULL,
  `total_session` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchId`, `batchName`, `courseId`, `courseType`, `batchLocation`, `startDate`, `endDate`, `startTime`, `endTime`, `total_hour`, `total_session`, `price`, `created`, `status`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2, 0, '2020-07-31 08:33:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batchlocation`
--

CREATE TABLE `batchlocation` (
  `locationId` int(11) NOT NULL,
  `batchId` int(11) DEFAULT NULL,
  `locationAddress` varchar(255) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batchlocation`
--

INSERT INTO `batchlocation` (`locationId`, `batchId`, `locationAddress`, `startDate`, `endDate`, `startTime`, `endTime`, `created`, `status`) VALUES
(1, 1, 'Bethnal Green', '2019-01-04', '2019-01-04', '13:40:00', '15:05:00', '2019-01-04 12:53:54', 1),
(2, 1, 'Holborn', '2019-01-14', '2019-01-18', '17:55:00', '18:20:00', '2019-01-04 13:17:25', 1),
(3, 2, 'Slough', '2019-01-15', '2019-01-18', '11:30:00', '15:00:00', '2019-01-04 12:35:27', 1),
(4, 2, 'Durgapur IGI', '2020-04-16', '2020-04-16', '17:50:00', '19:10:00', '2020-04-14 13:48:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch_sessions`
--

CREATE TABLE `batch_sessions` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_sessions`
--

INSERT INTO `batch_sessions` (`id`, `batch_id`, `date`, `starttime`, `endtime`, `created_at`) VALUES
(13, 4, '2019-02-08', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(14, 4, '2019-12-12', '02:25:00', '00:00:00', '2019-02-08 11:15:10'),
(15, 1, '2019-02-08', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(16, 1, '2019-02-16', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(17, 2, '2019-02-08', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(18, 2, '2019-02-16', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(19, 3, '2019-02-08', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(20, 3, '2019-02-16', '11:00:00', '02:05:00', '2019-02-08 11:15:10'),
(21, 4, '2019-03-20', '10:00:00', '13:00:00', '2019-03-16 09:34:42'),
(22, 4, '2019-02-10', '11:00:00', '14:00:00', '2019-03-16 09:34:42'),
(23, 5, '2019-03-20', '10:00:00', '13:00:00', '2019-03-16 09:37:04'),
(24, 5, '2019-03-30', '11:00:00', '14:00:00', '2019-03-16 09:37:04'),
(25, 6, '2020-04-16', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(26, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(27, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(28, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(29, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(30, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(31, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(32, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(33, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(34, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(35, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(36, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(37, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(38, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(39, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(40, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(41, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(42, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(43, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(44, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46'),
(45, 6, '0000-00-00', '00:00:00', '00:00:00', '2020-04-14 13:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_title` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_image`, `blog_title`, `posted_by`, `blog_desc`, `blog_status`, `date`) VALUES
(1, 'blog-image-01.jpg', 'Types of Schools in UK', 'EDU-CONSULTANCY', '<div class=\"col-sm-8\">\n<div class=\"blog-inner-item\">\n<p>Proin rutrum orci a faucibus interdum.&nbsp;Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros</p>\n</div>\n</div>', '1', '2016-12-28'),
(2, 'blog-image-02.jpg', 'Bullying at school – UK', 'EDU-CONSULTANCY', '<div class=\"col-sm-8\">\n<div class=\"blog-inner-item\">\n<p>Proin rutrum orci a faucibus interdum.&nbsp;Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros.</p>\n</div>\n</div>\n<div class=\"col-sm-4\">&nbsp;</div>', '1', '2016-12-28'),
(3, 'blog-image-03.jpg', 'Health and safety for school children- UK', ' EDU-CONSULTANCY', '<div class=\"col-sm-8\">\n<div class=\"blog-inner-item\">\n<p style=\"text-align: right;\">Proin rutrum orci a faucibus interdum.&nbsp;Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu er</p>\n</div>\n</div>', '1', '2016-12-28'),
(4, 'blog-image-04.jpg', 'Mauris sit amet vehicula elit, et maximus quam.', 'EDU-CONSULTANCY', '<div class=\"col-sm-8\">\n<div class=\"blog-inner-item\">\n<p>Proin rutrum orci a faucibus interdum.&nbsp;Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros.</p>\n</div>\n</div>\n<div class=\"col-sm-4\">&nbsp;</div>', '1', '2020-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `buyer_image` varchar(255) NOT NULL,
  `buyer_title` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `buyer_desc` text NOT NULL,
  `buyer_status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `buyer_image`, `buyer_title`, `designation`, `buyer_desc`, `buyer_status`, `date`, `email`, `password`, `username`) VALUES
(3, '57ca8fa03cf251.jpg', 'Test Buyer', 'Buyer', '<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '1', '2016-09-30', 'jgomes@gmail.com', 'MTIz', 'goel95');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `category_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_link`, `parent_id`, `category_image`, `sort_order`) VALUES
(33, 'CYBER SECURITY', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `send_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `user_id`, `admin_id`, `message`, `send_date`) VALUES
(1, 1, 0, 'hiii', '2017-08-10 12:26:12'),
(2, 0, 1, 'hello', '2017-08-10 11:28:13'),
(3, 1, 0, 'how are you ?', '2017-08-10 14:00:00'),
(4, 0, 1, 'i am good.', '2017-08-10 14:02:00'),
(5, 1, 0, 'ok', '2017-08-10 11:48:38'),
(6, 1, 0, 'good afternoon', '2017-08-10 11:51:30'),
(7, 1, 0, 'are u there?', '2017-08-10 11:54:52'),
(8, 0, 1, 'yes. speak.', '2017-08-12 06:07:00'),
(21, 1, 0, 'hey', '2017-08-10 01:21:22'),
(26, 5, 0, 'Hello.....', '2017-08-10 01:41:19'),
(27, 0, 5, 'hii...', '2017-08-10 04:09:00'),
(30, 0, 1, 'yes...', '2017-08-10 02:21:02'),
(31, 1, 0, 'what are you doing..', '2017-08-10 02:22:40'),
(32, 0, 1, 'chatting with you..', '2017-08-10 02:23:11'),
(33, 1, 0, 'wow that\'s good...', '2017-08-10 02:24:32'),
(34, 0, 1, 'yes it is...', '2017-08-10 02:24:46'),
(35, 0, 1, 'i gotta go... bye...', '2017-08-10 02:26:08'),
(36, 1, 0, 'okk bye..', '2017-08-10 02:26:24'),
(37, 5, 0, 'how are u?', '2017-08-10 02:28:49'),
(38, 0, 5, 'fine..', '2017-08-10 02:29:05'),
(39, 1, 0, 'hello admin', '2017-08-11 06:05:05'),
(40, 0, 1, 'hello amit', '2017-08-11 06:07:39'),
(41, 1, 0, 'how are you', '2017-08-11 06:07:48'),
(42, 0, 1, 'I am fine', '2017-08-11 06:07:59'),
(43, 1, 0, 'what about u', '2017-08-11 06:08:07'),
(44, 1, 0, 'hii', '2017-08-11 06:15:50'),
(45, 0, 1, 'hello', '2017-08-11 06:15:59'),
(46, 1, 0, 'dfgdfg', '2017-08-11 06:16:58'),
(47, 0, 1, 'gggg', '2017-08-11 06:17:02'),
(48, 0, 1, 'dfgdfg', '2017-08-11 06:18:32'),
(49, 1, 0, 'hhhh', '2017-08-11 06:18:38'),
(50, 0, 1, 'dgdfg', '2017-08-11 06:20:06'),
(51, 0, 1, 'fghfgh', '2017-08-11 06:21:22'),
(52, 0, 1, 'kjlkj', '2017-08-11 06:24:06'),
(53, 0, 1, 'gjhgjhg', '2017-08-11 06:24:19'),
(54, 0, 1, 'llllllllll', '2017-08-11 06:24:25'),
(55, 0, 1, 'ghghgj', '2017-08-11 06:25:27'),
(56, 0, 1, 'hfghjghjhg', '2017-08-11 06:25:31'),
(57, 0, 1, 'qqqq', '2017-08-11 06:31:04'),
(58, 0, 1, 'fghfg', '2017-08-11 06:41:03'),
(59, 1, 0, 'hello', '2017-09-25 07:50:43'),
(60, 0, 17, 'sfsaf', '2017-11-21 04:05:49'),
(61, 24, 0, 'fsdfsdf', '2018-02-06 10:07:21'),
(62, 0, 24, 'dfsdfsdf', '2018-02-06 10:23:36'),
(63, 25, 0, 'sdfsdf', '2018-02-07 10:00:10'),
(64, 0, 25, 'adadads', '2018-02-07 10:00:34'),
(65, 0, 25, 'dfgdfg', '2018-02-08 05:16:42'),
(66, 33, 0, '         ', '2018-10-04 07:26:35'),
(67, 33, 0, '         ', '2018-10-04 07:26:36'),
(68, 33, 0, 'hiii', '2018-10-04 07:26:40'),
(69, 37, 0, 'HIIIIIIIII', '2018-10-06 05:26:09'),
(70, 0, 42, 'hi', '2018-10-13 11:13:03'),
(71, 0, 42, 'hi', '2018-10-13 11:13:04'),
(72, 24, 0, 's', '2019-01-04 06:36:17'),
(73, 24, 0, 'ssss', '2019-01-04 06:36:21'),
(74, 24, 0, 'd', '2019-01-04 06:37:24'),
(75, 31, 0, 'hoi', '2019-01-04 06:42:54'),
(76, 0, 19, 'hi', '2019-08-02 10:42:27'),
(77, 2, 0, 'HELLO I AM JAMES', '2019-08-07 10:09:59'),
(78, 0, 1, 'bv', '2019-12-27 10:48:12'),
(79, 0, 1, 'j', '2019-12-27 10:48:18'),
(80, 0, 44, 'hello', '2020-03-03 07:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` text NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `city_name`, `sort_order`) VALUES
(3, 2, 'London', 5),
(4, 6, 'Kushwati', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE `ci_cookies` (
  `id` int(11) NOT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6bfdfbf2e206b00e96b2d826f458fa1b', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 1474258959, ''),
('2996c2ed34cfdeece7eaef33c0f1598a', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 1474259002, ''),
('dfd7ff0b8724306bb22453d6fa6681dc', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 1474264874, 'a:3:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:5:\"admin\";s:12:\"is_logged_in\";i:1;}'),
('e4738ab71118c9d88a51f2e37029e4bd', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 1474273985, '');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `cms_pagetitle` varchar(255) NOT NULL,
  `cms_heading` varchar(255) NOT NULL,
  `cms_sub_heading` varchar(255) NOT NULL,
  `cms_img` varchar(255) NOT NULL,
  `cms_img1` varchar(255) NOT NULL,
  `cms_img2` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `cms_pagetitle`, `cms_heading`, `cms_sub_heading`, `cms_img`, `cms_img1`, `cms_img2`, `description`, `status`) VALUES
(1, 'About Us', 'About Us', '0', 'about-1.png', 'about-2.png', 'about-3.png', '<p><strong>About Us</strong></p>\n<p>SKILLOGICS is learning, assessment and IT training platform founded in 2014 that helps anyone learn business, software, technology and creative skills to achieve personal and professional goals. Through individual, corporate, academic and organizational subscriptions, members have access to our engaging, top-quality courses taught by our expert instructors having industry and training experience.</p>\n<p>We are committed to creating an environment where learners can think, learn and achieve by engaging in the combined process of experiential and taught learning models. We provide IT training in the classroom, blended or distance modes while our method of delivery is vocational, hands-on, and project-based.</p>\n<p>Our underlying philosophy is to emphasize the importance of ongoing personal and professional development to staff, associates, clients and learners alike. It is our stated intention to uphold ethical guidelines in all areas of technical education and training programs.</p>\n<p>SKILLOGICS also support and help a school, college and university students with subjects like IT, computer science, Software Engineering, programming, business studies with homework, assignments, and projects. Our main courses are related to Computer and web development. We also teach project management and personal development, etc.</p>\n<p>We believe that through technical education, everyone has the power to change their lives, and ultimately the world, for the better. Innovation, technology and creative collaboration with knowledge experts worldwide are the foundations of SKILLOGICS&rsquo; commitment to delivering universal access to technical education.</p>\n<p>Leadership is everyone&rsquo;s business! Develop employee potential and advance your organization&rsquo;s effectiveness through a suite of technologically advanced Leadership and Development courses, designed by industry professionals and instructional design experts. Our services and products deliver freedom to learn and the tools to succeed - enabling employers, learners, and employees to empower themselves and others.</p>\n<p>Our contribution to the global technology community is more than just IT training. Technology&rsquo;s expanding reach is making every level of staff some sort of technology professional. The hyper-focused, speciality roles aren&rsquo;t going anywhere&mdash;they&rsquo;re more necessary than ever&mdash;but we also must account for the T-shaped skills. Thus, we train beyond traditional IT topics and train more people than corporate IT.</p>\n<p>We exist to address the total skills profile of technology professionals. Whether you&rsquo;re managing mission-critical technology initiatives, developing your technical talent pipeline or taking IT products and services to market, our innovative and flexible learning solutions equip you for success.</p>\n<p><strong>Nader Golestani (CEO and Founder)</strong></p>\n<p>Nader Golestani is the CEO and Founder of SKILLOGICS. He studied computing in the late 80s and worked as a programmer in mid-90s. Nader is a qualified teacher who has taught many students at the secondary level and higher education. He has been in the education sector for the last 22 years. Nader believes that education must be accessible to all people. <em>Learners should learn only skills that are applicable to their everyday life or improve their employability.</em></p>\n<p>Nader is a powerful, creative, and passionate who believes that any goal can be achieved with hard work, dedication, and discipline. He is known for helping people get their education as well as for his innovative approach which provides valuable insight, motivation, and direction to his audience. It&rsquo;s part of his bigger vision to have everyone access to education doesn&rsquo;t matter rich or poor. He wants to make technical learning and training better, more comfortable, and faster. Nader values diversity in all its forms and believes that it\'s the path to greatness. Developing his own IT training business <em>&lsquo;SKILLOGICS&rsquo;</em> is his passion, dedication is his commitment and determination is the key to his success. He strongly believes:</p>\n<p><strong><em>&ldquo;To be a star, you must shine your own light, follow your own path, and don&rsquo;t worry about the darkness, for that is when the stars shine brightest.&rdquo;</em></strong></p>\n<p><strong>SKILLOGCIS Approach</strong></p>\n<p>The main objective of SKILLOGICS is to bring students into a cohesive and controlled learning environment with certified courses that give them an edge in the current job market. SKILLOGICS strives for quality and looks to taking responsibility for success in the IT sector.</p>\n<p>We go the extra mile in providing industrially experienced lecturers equipped with the right teaching qualifications to ensure that you are empowered to progress to the next level. Its benefit is having not just a qualified teacher but a mentor who understands the market of your desired field well and can guide you in the right direction.</p>\n<p>What makes us unique in our market is the variations of teaching methods, delivery and the use of real-life implementation that allow you once qualified to hit the ground running in a fast and dynamic sector and maintain an optimum level of professionalism.</p>\n<p>We give you a Certification of Achievements for your progression in our courses. You will be able to access our content both online and even come into classes for face to face learning. For this, all your materials are given to you in a state of the art manner where you can maintain your own hard copy or access it via an online source.</p>\n<p>We want you to take control of your personal development and help you achieve success and grow, not just qualify in a field but gain a Masters in it. For this reason, all courses are summarized and laid out clearly to help you understand what you want and how to get it.</p>\n<p><strong>Mission Statement</strong></p>\n<p>Our mission is to provide first-class, expert-driven IT training and development services to our clients to help them learn the skills they need to achieve and Redefine their full Potential. We are committed to create, promote and foster individual and organizational effectiveness by developing and offering an array of innovative and diverse programs in support of the organization&rsquo;s commitment to employee development, partnerships, and organizational enrichment.</p>\n<p><strong>Vision Statement</strong></p>\n<p>Our vision is to be a global leader in IT training Industry and teach skills that improve the employability of the learners. Our training programs are designed to challenge, stimulate, and promote the personal and professional development of learners with a focus on encouraging all learners to reach their full potential and competency. We are striving to establish high standards and build up a tight partnership with industry to train the employees sent by businesses.</p>\n<p><strong>Core Values&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>\n<p><em>We accomplish our mission by focusing on the following values:</em></p>\n<ul>\n<li>Provide quality, cost-effective IT training designed to increase individual and organizational productivity and enrichment.</li>\n<li>Provide development opportunities that enhance knowledge, develop skills and enrich the organization.</li>\n<li>Create, promote and foster an organizational environment that values development, diversity and growth opportunities for all employees.</li>\n<li>Provide individuals and the organization with the tools to respond effectively to customer needs as well as current and future demands for service.</li>\n<li>Provide ongoing leadership and support to the organization&rsquo;s succession efforts.</li>\n<li>Promote, support and leverage technology resources and tools to improve and enhance workflow efficiency and improve customer service.</li>\n</ul>', '1'),
(2, 'Terms & Conditions', 'Terms & Conditions', '0', '', '', '', '<div class=\"col-md-7\">\n<div class=\"terms-conditions-left\">\n<h3>1. ACCEPTANCE OF TERMS</h3>\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web web sites still in their infancy.</p>\n<h3>2. ADVICE</h3>\n<p>The contents of the Website do not constitute advice and should not be relied upon in making or refraining from making, any decision.</p>\n<h3>3. CHANGES TO WEBSITE</h3>\n<p><a href=\"file:///C:/Users/IGI/Desktop/New%20folder%20(5)/html-3/terms-conditions.html#\">www.skillogics-consultancy.com&nbsp;</a>reserves the right to:</p>\n<ul>\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</li>\n<li>Looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\n</ul>\n<h3>4. DISCLAIMERS AND LIMITATION OF LIABILITY</h3>\n<ul>\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop lorem ipsum will uncover many web sites still in their infancy.</li>\n<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop lorem ipsum will uncover many web sites still in their infancy.</li>\n<li>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop lorem ipsum will uncover many web sites still in their infancy.</li>\n<li>Point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. many desktop lorem ipsum will uncover many web sites still in their infancy.</li>\n</ul>\n<h3>5. INDEMNITY</h3>\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop lorem ipsum will uncover many web sites still in their infancy.</p>\n<h3>6. SEVERANCE</h3>\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\n<h3>7. GOVERNING LAW</h3>\n<p>These Terms and Conditions shall be governed by and construed in accordance with the law of England and you hereby submit to the exclusive jurisdiction of the English courts.</p>\n<h4>Contact Us</h4>\n<p><a href=\"mailto:info@Skillogics-consultancy.com\">info@Skillogics-consultancy.com</a></p>\n</div>\n</div>\n<div class=\"col-md-5\">\n<div class=\"terms-conditions-right\">\n<div class=\"terms-image\">\n<figure><img src=\"file:///C:/Users/IGI/Desktop/New%20folder%20(5)/html-3/images/terms-img-01.jpg\" alt=\"\" /></figure>\n</div>\n<div class=\"terms-image-2\">\n<figure><img src=\"file:///C:/Users/IGI/Desktop/New%20folder%20(5)/html-3/images/terms-img-02.jpg\" alt=\"\" /></figure>\n<p>&nbsp;</p>\n</div>\n<div class=\"terms-image-3\">&nbsp;</div>\n</div>\n</div>', '1'),
(3, 'Privacy Policy', 'Privacy Policy', '0', '', '', '', '<div class=\"col-md-7\">\n<div class=\"terms-conditions-left\">\n<h4>SKILLOGICS Privacy Policy</h4>\n<ol>\n<li style=\"text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using...</li>\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its using \'Content here, content here\', making it look like readable English.</li>\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its has a more-or-less normal distribution of letters, as opposed to.</li>\n<li>It is a long established fact that a reader will be distracted by the readable content of a page.</li>\n<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br />The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as...</li>\n<li>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\n</ol>\n<h5>Contact Us</h5>\n<p><a href=\"mailto:info@skillogics-consultancy.com\">info@skillogics-consultancy.com</a></p>\n</div>\n</div>', '1'),
(4, 'Equal Opportunity Policy', 'Equal Opportunity Policy', '0', '', '', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '1'),
(5, 'Course Delivery Policy', 'Course Delivery Policy', '0', '', '', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '1'),
(6, 'Refund Policy', 'Refund Policy', '0', '', '', '', '<div class=\"col-md-7\">\n<div class=\"terms-conditions-left\"><ol>\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</li>\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\n<li>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</li>\n</ol></div>\n</div>', '1'),
(7, 'Complaint Policy', 'Complaint Policy', '0', '', '', '', '<div class=\"col-md-7\">\r\n<div class=\"terms-conditions-left\">\r\n<h4>IEC Education. Privacy Policy</h4>\r\n<ol>\r\n<li style=\"text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using...</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its using \'Content here, content here\', making it look like readable English.</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its has a more-or-less normal distribution of letters, as opposed to.</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page.</li>\r\n<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br />The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as...</li>\r\n<li>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\r\n</ol>\r\n<h5>Contact Us</h5>\r\n<p><a href=\"mailto:info@skillogics-consultancy.com\">info@skillogics-consultancy.com</a></p>\r\n</div>\r\n</div>', '1'),
(8, 'Payment Policy', 'Payment Policy', '0', '', '', '', '<div class=\"col-md-7\">\r\n<div class=\"terms-conditions-left\">\r\n<h4>IEC Education. Privacy Policy</h4>\r\n<ol>\r\n<li style=\"text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using...</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its using \'Content here, content here\', making it look like readable English.</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its has a more-or-less normal distribution of letters, as opposed to.</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page.</li>\r\n<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br />The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as...</li>\r\n<li>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\r\n<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</li>\r\n</ol>\r\n<h5>Contact Us</h5>\r\n<p><a href=\"mailto:info@skillogics-consultancy.com\">info@skillogics-consultancy.com</a></p>\r\n</div>\r\n</div>', '1'),
(9, 'Why Us?', 'Why Us?', '0', '', '', '', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable</p>', '1'),
(10, 'FAQ', 'Quickly find out if we’ve already addressed your query', '0', 'faq-right-img.jpg', '', '', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>', '1'),
(11, 'Contact Us', 'Send Us A Message', 'Contact Us', '', '', '', '<p>Please fill the form below correctly and let us know about your query. One of our consultants would contact you.</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_corp_stu`
--

CREATE TABLE `cms_corp_stu` (
  `id` int(11) NOT NULL,
  `for_type` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_corp_stu`
--

INSERT INTO `cms_corp_stu` (`id`, `for_type`, `icon`, `heading`, `description`) VALUES
(1, 'corporate', 'fa fa-rocket', 'Customised Training', 'We customise training based onm your requirements.&nbsp;'),
(2, 'corporate', 'fa fa-superpowers', 'Course Materials & Handouts', 'All course materials would be given in hardcopy and online version.'),
(3, 'corporate', 'fa fa-sun-o', 'Accredited by CPD Standards', 'Our courses are accredited by CPD Standards. Your employees would be certified.&nbsp;'),
(4, 'corporate', 'fa fa-sliders', 'Flexibility Booking', 'If some of your employees cannot make all the sessions for the course we we would arrange private sessions for them to catch up with the rest of the group.'),
(5, 'corporate', 'fa fa-flash', 'Learning & development services', 'Our training strategy is very much vocational and hands on training.'),
(6, 'corporate', 'fa fa-umbrella', '24/7 Support', 'All trainees would be allocated a tutor that they can contact by email and online when they need further help.'),
(7, 'student', 'fa fa-podcast', 'Private Teaching', 'We would arrange one to one private teaching at our training centres or any other safe lcoation agreed.'),
(8, 'student', 'fa fa-thumbs-up', 'Active  Learning', 'Our active learning strategy helps you to improve your learning by actively engaged in the lesson.'),
(9, 'student', 'fa fa-file-pdf-o', 'Certificates', 'You will get certificates of attencance, achievement or CPD if the course is accredited by CPD standards. You will get the certificates should you successfully finish the course.'),
(10, 'student', 'fa fa-certificate', 'CPD Accredited Courses', 'I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents &amp; exellence'),
(11, 'student', 'fa fa-flash', 'fully qualified Teachers', 'All our instructors are fully qualified and experienced to teach you the subject.'),
(12, 'student', 'fa fa-umbrella', '24/7 Support', 'You will be allcoated a qualified tutor that would support you throught your course.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details_country_wise`
--

CREATE TABLE `contact_details_country_wise` (
  `id` int(11) NOT NULL,
  `country_name` text NOT NULL,
  `country_image` text NOT NULL,
  `address` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  `mobile` text NOT NULL,
  `whatapp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_details_country_wise`
--

INSERT INTO `contact_details_country_wise` (`id`, `country_name`, `country_image`, `address`, `mail`, `phone`, `mobile`, `whatapp`) VALUES
(1, 'United Arab Emirates ', 'united-arab-logo.png', 'RAKEZ Business Centre 2, Po BOX 16860, Ras Al Khaimah, UAE', 'info@skillogics-consultancy.com', '(+971) 72076856', '(+971) 554676802', ''),
(2, 'United Kingdom uk', 'united-kingdom.png', '31 Sandy Drive, Feltham, TW14 8BE,', 'info@skillogics-consultancy.com', '(+44) 2070961212', '', '(+44) 7442978718');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `status`) VALUES
(1, 'Aruba', 1),
(2, 'Afghanistan', 1),
(3, 'Angola', 1),
(4, 'Anguilla', 1),
(5, 'Albania', 1),
(6, 'Andorra', 1),
(7, 'Netherlands Antilles', 1),
(8, 'United Arab Emirates', 1),
(9, 'Argentina', 1),
(10, 'Armenia', 1),
(11, 'American Samoa', 1),
(12, 'Antarctica', 1),
(13, 'French Southern territories', 1),
(14, 'Antigua and Barbuda', 1),
(15, 'Australia', 1),
(16, 'Austria', 1),
(17, 'Azerbaijan', 1),
(18, 'Burundi', 1),
(19, 'Belgium', 1),
(20, 'Benin', 1),
(21, 'Burkina Faso', 1),
(22, 'Bangladesh', 1),
(23, 'Bulgaria', 1),
(24, 'Bahrain', 1),
(25, 'Bahamas', 1),
(26, 'Bosnia and Herzegovina', 1),
(27, 'Belarus', 1),
(28, 'Belize', 1),
(29, 'Bermuda', 1),
(30, 'Bolivia', 1),
(31, 'Brazil', 1),
(32, 'Barbados', 1),
(33, 'Brunei', 1),
(34, 'Bhutan', 1),
(35, 'Bouvet Island', 1),
(36, 'Botswana', 1),
(37, 'Central African Republic', 1),
(38, 'Canada', 1),
(39, 'Cocos (Keeling) Islands', 1),
(40, 'Switzerland', 1),
(41, 'Chile', 1),
(42, 'China', 1),
(43, 'CÃ´te dâ€™Ivoire', 1),
(44, 'Cameroon', 1),
(45, 'Congo, The Democratic Republic', 1),
(46, 'Congo', 1),
(47, 'Cook Islands', 1),
(48, 'Colombia', 1),
(49, 'Comoros', 1),
(50, 'Cape Verde', 1),
(51, 'Costa Rica', 1),
(52, 'Cuba', 1),
(53, 'Christmas Island', 1),
(54, 'Cayman Islands', 1),
(55, 'Cyprus', 1),
(56, 'Czech Republic', 1),
(57, 'Germany', 1),
(58, 'Djibouti', 1),
(59, 'Dominica', 1),
(60, 'Denmark', 1),
(61, 'Dominican Republic', 1),
(62, 'Algeria', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'Eritrea', 1),
(66, 'Western Sahara', 1),
(67, 'Spain', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'Finland', 1),
(71, 'Fiji Islands', 1),
(72, 'Falkland Islands', 1),
(73, 'France', 1),
(74, 'Faroe Islands', 1),
(75, 'Micronesia, Federated States o', 1),
(76, 'Gabon', 1),
(77, 'United Kingdom', 1),
(78, 'Georgia', 1),
(79, 'Ghana', 1),
(80, 'Gibraltar', 1),
(81, 'Guinea', 1),
(82, 'Guadeloupe', 1),
(83, 'Gambia', 1),
(84, 'Guinea-Bissau', 1),
(85, 'Equatorial Guinea', 1),
(86, 'Greece', 1),
(87, 'Grenada', 1),
(88, 'Greenland', 1),
(89, 'Guatemala', 1),
(90, 'French Guiana', 1),
(91, 'Guam', 1),
(92, 'Guyana', 1),
(93, 'Hong Kong', 1),
(94, 'Heard Island and McDonald Isla', 1),
(95, 'Honduras', 1),
(96, 'Croatia', 1),
(97, 'Haiti', 1),
(98, 'Hungary', 1),
(99, 'Indonesia', 1),
(100, 'India', 1),
(101, 'British Indian Ocean Territory', 1),
(102, 'Ireland', 1),
(103, 'Iran', 1),
(104, 'Iraq', 1),
(105, 'Iceland', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Jamaica', 1),
(109, 'Jordan', 1),
(110, 'Japan', 1),
(111, 'Kazakstan', 1),
(112, 'Kenya', 1),
(113, 'Kyrgyzstan', 1),
(114, 'Cambodia', 1),
(115, 'Kiribati', 1),
(116, 'Saint Kitts and Nevis', 1),
(117, 'South Korea', 1),
(118, 'Kuwait', 1),
(119, 'Laos', 1),
(120, 'Lebanon', 1),
(121, 'Liberia', 1),
(122, 'Libyan Arab Jamahiriya', 1),
(123, 'Saint Lucia', 1),
(124, 'Liechtenstein', 1),
(125, 'Sri Lanka', 1),
(126, 'Lesotho', 1),
(127, 'Lithuania', 1),
(128, 'Luxembourg', 1),
(129, 'Latvia', 1),
(130, 'Macao', 1),
(131, 'Morocco', 1),
(132, 'Monaco', 1),
(133, 'Moldova', 1),
(134, 'Madagascar', 1),
(135, 'Maldives', 1),
(136, 'Mexico', 1),
(137, 'Marshall Islands', 1),
(138, 'Macedonia', 1),
(139, 'Mali', 1),
(140, 'Malta', 1),
(141, 'Myanmar', 1),
(142, 'Mongolia', 1),
(143, 'Northern Mariana Islands', 1),
(144, 'Mozambique', 1),
(145, 'Mauritania', 1),
(146, 'Montserrat', 1),
(147, 'Martinique', 1),
(148, 'Mauritius', 1),
(149, 'Malawi', 1),
(150, 'Malaysia', 1),
(151, 'Mayotte', 1),
(152, 'Namibia', 1),
(153, 'New Caledonia', 1),
(154, 'Niger', 1),
(155, 'Norfolk Island', 1),
(156, 'Nigeria', 1),
(157, 'Nicaragua', 1),
(158, 'Niue', 1),
(159, 'Netherlands', 1),
(160, 'Norway', 1),
(161, 'Nepal', 1),
(162, 'Nauru', 1),
(163, 'New Zealand', 1),
(164, 'Oman', 1),
(165, 'Pakistan', 1),
(166, 'Panama', 1),
(167, 'Pitcairn', 1),
(168, 'Peru', 1),
(169, 'Philippines', 1),
(170, 'Palau', 1),
(171, 'Papua New Guinea', 1),
(172, 'Poland', 1),
(173, 'Puerto Rico', 1),
(174, 'North Korea', 1),
(175, 'Portugal', 1),
(176, 'Paraguay', 1),
(177, 'Palestine', 1),
(178, 'French Polynesia', 1),
(179, 'Qatar', 1),
(180, 'RÃ©union', 1),
(181, 'Romania', 1),
(182, 'Russian Federation', 1),
(183, 'Rwanda', 1),
(184, 'Saudi Arabia', 1),
(185, 'Sudan', 1),
(186, 'Senegal', 1),
(187, 'Singapore', 1),
(188, 'South Georgia and the South Sa', 1),
(189, 'Saint Helena', 1),
(190, 'Svalbard and Jan Mayen', 1),
(191, 'Solomon Islands', 1),
(192, 'Sierra Leone', 1),
(193, 'El Salvador', 1),
(194, 'San Marino', 1),
(195, 'Somalia', 1),
(196, 'Saint Pierre and Miquelon', 1),
(197, 'Sao Tome and Principe', 1),
(198, 'Suriname', 1),
(199, 'Slovakia', 1),
(200, 'Slovenia', 1),
(201, 'Sweden', 1),
(202, 'Swaziland', 1),
(203, 'Seychelles', 1),
(204, 'Syria', 1),
(205, 'Turks and Caicos Islands', 1),
(206, 'Chad', 1),
(207, 'Togo', 1),
(208, 'Thailand', 1),
(209, 'Tajikistan', 1),
(210, 'Tokelau', 1),
(211, 'Turkmenistan', 1),
(212, 'East Timor', 1),
(213, 'Tonga', 1),
(214, 'Trinidad and Tobago', 1),
(215, 'Tunisia', 1),
(216, 'Turkey', 1),
(217, 'Tuvalu', 1),
(218, 'Taiwan', 1),
(219, 'Tanzania', 1),
(220, 'Uganda', 1),
(221, 'Ukraine', 1),
(222, 'United States Minor Outlying I', 1),
(223, 'Uruguay', 1),
(224, 'United States', 1),
(225, 'Uzbekistan', 1),
(226, 'Holy See (Vatican City State)', 1),
(227, 'Saint Vincent and the Grenadin', 1),
(228, 'Venezuela', 1),
(229, 'Virgin Islands, British', 1),
(230, 'Virgin Islands, U.S.', 1),
(231, 'Vietnam', 1),
(232, 'Vanuatu', 1),
(233, 'Wallis and Futuna', 1),
(234, 'Samoa', 1),
(235, 'Yemen', 1),
(236, 'Yugoslavia', 1),
(237, 'South Africa', 1),
(238, 'Zambia', 1),
(239, 'Zimbabwe', 1),
(1, 'Aruba', 1),
(2, 'Afghanistan', 1),
(3, 'Angola', 1),
(4, 'Anguilla', 1),
(5, 'Albania', 1),
(6, 'Andorra', 1),
(7, 'Netherlands Antilles', 1),
(8, 'United Arab Emirates', 1),
(9, 'Argentina', 1),
(10, 'Armenia', 1),
(11, 'American Samoa', 1),
(12, 'Antarctica', 1),
(13, 'French Southern territories', 1),
(14, 'Antigua and Barbuda', 1),
(15, 'Australia', 1),
(16, 'Austria', 1),
(17, 'Azerbaijan', 1),
(18, 'Burundi', 1),
(19, 'Belgium', 1),
(20, 'Benin', 1),
(21, 'Burkina Faso', 1),
(22, 'Bangladesh', 1),
(23, 'Bulgaria', 1),
(24, 'Bahrain', 1),
(25, 'Bahamas', 1),
(26, 'Bosnia and Herzegovina', 1),
(27, 'Belarus', 1),
(28, 'Belize', 1),
(29, 'Bermuda', 1),
(30, 'Bolivia', 1),
(31, 'Brazil', 1),
(32, 'Barbados', 1),
(33, 'Brunei', 1),
(34, 'Bhutan', 1),
(35, 'Bouvet Island', 1),
(36, 'Botswana', 1),
(37, 'Central African Republic', 1),
(38, 'Canada', 1),
(39, 'Cocos (Keeling) Islands', 1),
(40, 'Switzerland', 1),
(41, 'Chile', 1),
(42, 'China', 1),
(43, 'CÃ´te dâ€™Ivoire', 1),
(44, 'Cameroon', 1),
(45, 'Congo, The Democratic Republic', 1),
(46, 'Congo', 1),
(47, 'Cook Islands', 1),
(48, 'Colombia', 1),
(49, 'Comoros', 1),
(50, 'Cape Verde', 1),
(51, 'Costa Rica', 1),
(52, 'Cuba', 1),
(53, 'Christmas Island', 1),
(54, 'Cayman Islands', 1),
(55, 'Cyprus', 1),
(56, 'Czech Republic', 1),
(57, 'Germany', 1),
(58, 'Djibouti', 1),
(59, 'Dominica', 1),
(60, 'Denmark', 1),
(61, 'Dominican Republic', 1),
(62, 'Algeria', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'Eritrea', 1),
(66, 'Western Sahara', 1),
(67, 'Spain', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'Finland', 1),
(71, 'Fiji Islands', 1),
(72, 'Falkland Islands', 1),
(73, 'France', 1),
(74, 'Faroe Islands', 1),
(75, 'Micronesia, Federated States o', 1),
(76, 'Gabon', 1),
(77, 'United Kingdom', 1),
(78, 'Georgia', 1),
(79, 'Ghana', 1),
(80, 'Gibraltar', 1),
(81, 'Guinea', 1),
(82, 'Guadeloupe', 1),
(83, 'Gambia', 1),
(84, 'Guinea-Bissau', 1),
(85, 'Equatorial Guinea', 1),
(86, 'Greece', 1),
(87, 'Grenada', 1),
(88, 'Greenland', 1),
(89, 'Guatemala', 1),
(90, 'French Guiana', 1),
(91, 'Guam', 1),
(92, 'Guyana', 1),
(93, 'Hong Kong', 1),
(94, 'Heard Island and McDonald Isla', 1),
(95, 'Honduras', 1),
(96, 'Croatia', 1),
(97, 'Haiti', 1),
(98, 'Hungary', 1),
(99, 'Indonesia', 1),
(100, 'India', 1),
(101, 'British Indian Ocean Territory', 1),
(102, 'Ireland', 1),
(103, 'Iran', 1),
(104, 'Iraq', 1),
(105, 'Iceland', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Jamaica', 1),
(109, 'Jordan', 1),
(110, 'Japan', 1),
(111, 'Kazakstan', 1),
(112, 'Kenya', 1),
(113, 'Kyrgyzstan', 1),
(114, 'Cambodia', 1),
(115, 'Kiribati', 1),
(116, 'Saint Kitts and Nevis', 1),
(117, 'South Korea', 1),
(118, 'Kuwait', 1),
(119, 'Laos', 1),
(120, 'Lebanon', 1),
(121, 'Liberia', 1),
(122, 'Libyan Arab Jamahiriya', 1),
(123, 'Saint Lucia', 1),
(124, 'Liechtenstein', 1),
(125, 'Sri Lanka', 1),
(126, 'Lesotho', 1),
(127, 'Lithuania', 1),
(128, 'Luxembourg', 1),
(129, 'Latvia', 1),
(130, 'Macao', 1),
(131, 'Morocco', 1),
(132, 'Monaco', 1),
(133, 'Moldova', 1),
(134, 'Madagascar', 1),
(135, 'Maldives', 1),
(136, 'Mexico', 1),
(137, 'Marshall Islands', 1),
(138, 'Macedonia', 1),
(139, 'Mali', 1),
(140, 'Malta', 1),
(141, 'Myanmar', 1),
(142, 'Mongolia', 1),
(143, 'Northern Mariana Islands', 1),
(144, 'Mozambique', 1),
(145, 'Mauritania', 1),
(146, 'Montserrat', 1),
(147, 'Martinique', 1),
(148, 'Mauritius', 1),
(149, 'Malawi', 1),
(150, 'Malaysia', 1),
(151, 'Mayotte', 1),
(152, 'Namibia', 1),
(153, 'New Caledonia', 1),
(154, 'Niger', 1),
(155, 'Norfolk Island', 1),
(156, 'Nigeria', 1),
(157, 'Nicaragua', 1),
(158, 'Niue', 1),
(159, 'Netherlands', 1),
(160, 'Norway', 1),
(161, 'Nepal', 1),
(162, 'Nauru', 1),
(163, 'New Zealand', 1),
(164, 'Oman', 1),
(165, 'Pakistan', 1),
(166, 'Panama', 1),
(167, 'Pitcairn', 1),
(168, 'Peru', 1),
(169, 'Philippines', 1),
(170, 'Palau', 1),
(171, 'Papua New Guinea', 1),
(172, 'Poland', 1),
(173, 'Puerto Rico', 1),
(174, 'North Korea', 1),
(175, 'Portugal', 1),
(176, 'Paraguay', 1),
(177, 'Palestine', 1),
(178, 'French Polynesia', 1),
(179, 'Qatar', 1),
(180, 'RÃ©union', 1),
(181, 'Romania', 1),
(182, 'Russian Federation', 1),
(183, 'Rwanda', 1),
(184, 'Saudi Arabia', 1),
(185, 'Sudan', 1),
(186, 'Senegal', 1),
(187, 'Singapore', 1),
(188, 'South Georgia and the South Sa', 1),
(189, 'Saint Helena', 1),
(190, 'Svalbard and Jan Mayen', 1),
(191, 'Solomon Islands', 1),
(192, 'Sierra Leone', 1),
(193, 'El Salvador', 1),
(194, 'San Marino', 1),
(195, 'Somalia', 1),
(196, 'Saint Pierre and Miquelon', 1),
(197, 'Sao Tome and Principe', 1),
(198, 'Suriname', 1),
(199, 'Slovakia', 1),
(200, 'Slovenia', 1),
(201, 'Sweden', 1),
(202, 'Swaziland', 1),
(203, 'Seychelles', 1),
(204, 'Syria', 1),
(205, 'Turks and Caicos Islands', 1),
(206, 'Chad', 1),
(207, 'Togo', 1),
(208, 'Thailand', 1),
(209, 'Tajikistan', 1),
(210, 'Tokelau', 1),
(211, 'Turkmenistan', 1),
(212, 'East Timor', 1),
(213, 'Tonga', 1),
(214, 'Trinidad and Tobago', 1),
(215, 'Tunisia', 1),
(216, 'Turkey', 1),
(217, 'Tuvalu', 1),
(218, 'Taiwan', 1),
(219, 'Tanzania', 1),
(220, 'Uganda', 1),
(221, 'Ukraine', 1),
(222, 'United States Minor Outlying I', 1),
(223, 'Uruguay', 1),
(224, 'United States', 1),
(225, 'Uzbekistan', 1),
(226, 'Holy See (Vatican City State)', 1),
(227, 'Saint Vincent and the Grenadin', 1),
(228, 'Venezuela', 1),
(229, 'Virgin Islands, British', 1),
(230, 'Virgin Islands, U.S.', 1),
(231, 'Vietnam', 1),
(232, 'Vanuatu', 1),
(233, 'Wallis and Futuna', 1),
(234, 'Samoa', 1),
(235, 'Yemen', 1),
(236, 'Yugoslavia', 1),
(237, 'South Africa', 1),
(238, 'Zambia', 1),
(239, 'Zimbabwe', 1),
(1, 'Aruba', 1),
(2, 'Afghanistan', 1),
(3, 'Angola', 1),
(4, 'Anguilla', 1),
(5, 'Albania', 1),
(6, 'Andorra', 1),
(7, 'Netherlands Antilles', 1),
(8, 'United Arab Emirates', 1),
(9, 'Argentina', 1),
(10, 'Armenia', 1),
(11, 'American Samoa', 1),
(12, 'Antarctica', 1),
(13, 'French Southern territories', 1),
(14, 'Antigua and Barbuda', 1),
(15, 'Australia', 1),
(16, 'Austria', 1),
(17, 'Azerbaijan', 1),
(18, 'Burundi', 1),
(19, 'Belgium', 1),
(20, 'Benin', 1),
(21, 'Burkina Faso', 1),
(22, 'Bangladesh', 1),
(23, 'Bulgaria', 1),
(24, 'Bahrain', 1),
(25, 'Bahamas', 1),
(26, 'Bosnia and Herzegovina', 1),
(27, 'Belarus', 1),
(28, 'Belize', 1),
(29, 'Bermuda', 1),
(30, 'Bolivia', 1),
(31, 'Brazil', 1),
(32, 'Barbados', 1),
(33, 'Brunei', 1),
(34, 'Bhutan', 1),
(35, 'Bouvet Island', 1),
(36, 'Botswana', 1),
(37, 'Central African Republic', 1),
(38, 'Canada', 1),
(39, 'Cocos (Keeling) Islands', 1),
(40, 'Switzerland', 1),
(41, 'Chile', 1),
(42, 'China', 1),
(43, 'CÃ´te dâ€™Ivoire', 1),
(44, 'Cameroon', 1),
(45, 'Congo, The Democratic Republic', 1),
(46, 'Congo', 1),
(47, 'Cook Islands', 1),
(48, 'Colombia', 1),
(49, 'Comoros', 1),
(50, 'Cape Verde', 1),
(51, 'Costa Rica', 1),
(52, 'Cuba', 1),
(53, 'Christmas Island', 1),
(54, 'Cayman Islands', 1),
(55, 'Cyprus', 1),
(56, 'Czech Republic', 1),
(57, 'Germany', 1),
(58, 'Djibouti', 1),
(59, 'Dominica', 1),
(60, 'Denmark', 1),
(61, 'Dominican Republic', 1),
(62, 'Algeria', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'Eritrea', 1),
(66, 'Western Sahara', 1),
(67, 'Spain', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'Finland', 1),
(71, 'Fiji Islands', 1),
(72, 'Falkland Islands', 1),
(73, 'France', 1),
(74, 'Faroe Islands', 1),
(75, 'Micronesia, Federated States o', 1),
(76, 'Gabon', 1),
(77, 'United Kingdom', 1),
(78, 'Georgia', 1),
(79, 'Ghana', 1),
(80, 'Gibraltar', 1),
(81, 'Guinea', 1),
(82, 'Guadeloupe', 1),
(83, 'Gambia', 1),
(84, 'Guinea-Bissau', 1),
(85, 'Equatorial Guinea', 1),
(86, 'Greece', 1),
(87, 'Grenada', 1),
(88, 'Greenland', 1),
(89, 'Guatemala', 1),
(90, 'French Guiana', 1),
(91, 'Guam', 1),
(92, 'Guyana', 1),
(93, 'Hong Kong', 1),
(94, 'Heard Island and McDonald Isla', 1),
(95, 'Honduras', 1),
(96, 'Croatia', 1),
(97, 'Haiti', 1),
(98, 'Hungary', 1),
(99, 'Indonesia', 1),
(100, 'India', 1),
(101, 'British Indian Ocean Territory', 1),
(102, 'Ireland', 1),
(103, 'Iran', 1),
(104, 'Iraq', 1),
(105, 'Iceland', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Jamaica', 1),
(109, 'Jordan', 1),
(110, 'Japan', 1),
(111, 'Kazakstan', 1),
(112, 'Kenya', 1),
(113, 'Kyrgyzstan', 1),
(114, 'Cambodia', 1),
(115, 'Kiribati', 1),
(116, 'Saint Kitts and Nevis', 1),
(117, 'South Korea', 1),
(118, 'Kuwait', 1),
(119, 'Laos', 1),
(120, 'Lebanon', 1),
(121, 'Liberia', 1),
(122, 'Libyan Arab Jamahiriya', 1),
(123, 'Saint Lucia', 1),
(124, 'Liechtenstein', 1),
(125, 'Sri Lanka', 1),
(126, 'Lesotho', 1),
(127, 'Lithuania', 1),
(128, 'Luxembourg', 1),
(129, 'Latvia', 1),
(130, 'Macao', 1),
(131, 'Morocco', 1),
(132, 'Monaco', 1),
(133, 'Moldova', 1),
(134, 'Madagascar', 1),
(135, 'Maldives', 1),
(136, 'Mexico', 1),
(137, 'Marshall Islands', 1),
(138, 'Macedonia', 1),
(139, 'Mali', 1),
(140, 'Malta', 1),
(141, 'Myanmar', 1),
(142, 'Mongolia', 1),
(143, 'Northern Mariana Islands', 1),
(144, 'Mozambique', 1),
(145, 'Mauritania', 1),
(146, 'Montserrat', 1),
(147, 'Martinique', 1),
(148, 'Mauritius', 1),
(149, 'Malawi', 1),
(150, 'Malaysia', 1),
(151, 'Mayotte', 1),
(152, 'Namibia', 1),
(153, 'New Caledonia', 1),
(154, 'Niger', 1),
(155, 'Norfolk Island', 1),
(156, 'Nigeria', 1),
(157, 'Nicaragua', 1),
(158, 'Niue', 1),
(159, 'Netherlands', 1),
(160, 'Norway', 1),
(161, 'Nepal', 1),
(162, 'Nauru', 1),
(163, 'New Zealand', 1),
(164, 'Oman', 1),
(165, 'Pakistan', 1),
(166, 'Panama', 1),
(167, 'Pitcairn', 1),
(168, 'Peru', 1),
(169, 'Philippines', 1),
(170, 'Palau', 1),
(171, 'Papua New Guinea', 1),
(172, 'Poland', 1),
(173, 'Puerto Rico', 1),
(174, 'North Korea', 1),
(175, 'Portugal', 1),
(176, 'Paraguay', 1),
(177, 'Palestine', 1),
(178, 'French Polynesia', 1),
(179, 'Qatar', 1),
(180, 'RÃ©union', 1),
(181, 'Romania', 1),
(182, 'Russian Federation', 1),
(183, 'Rwanda', 1),
(184, 'Saudi Arabia', 1),
(185, 'Sudan', 1),
(186, 'Senegal', 1),
(187, 'Singapore', 1),
(188, 'South Georgia and the South Sa', 1),
(189, 'Saint Helena', 1),
(190, 'Svalbard and Jan Mayen', 1),
(191, 'Solomon Islands', 1),
(192, 'Sierra Leone', 1),
(193, 'El Salvador', 1),
(194, 'San Marino', 1),
(195, 'Somalia', 1),
(196, 'Saint Pierre and Miquelon', 1),
(197, 'Sao Tome and Principe', 1),
(198, 'Suriname', 1),
(199, 'Slovakia', 1),
(200, 'Slovenia', 1),
(201, 'Sweden', 1),
(202, 'Swaziland', 1),
(203, 'Seychelles', 1),
(204, 'Syria', 1),
(205, 'Turks and Caicos Islands', 1),
(206, 'Chad', 1),
(207, 'Togo', 1),
(208, 'Thailand', 1),
(209, 'Tajikistan', 1),
(210, 'Tokelau', 1),
(211, 'Turkmenistan', 1),
(212, 'East Timor', 1),
(213, 'Tonga', 1),
(214, 'Trinidad and Tobago', 1),
(215, 'Tunisia', 1),
(216, 'Turkey', 1),
(217, 'Tuvalu', 1),
(218, 'Taiwan', 1),
(219, 'Tanzania', 1),
(220, 'Uganda', 1),
(221, 'Ukraine', 1),
(222, 'United States Minor Outlying I', 1),
(223, 'Uruguay', 1),
(224, 'United States', 1),
(225, 'Uzbekistan', 1),
(226, 'Holy See (Vatican City State)', 1),
(227, 'Saint Vincent and the Grenadin', 1),
(228, 'Venezuela', 1),
(229, 'Virgin Islands, British', 1),
(230, 'Virgin Islands, U.S.', 1),
(231, 'Vietnam', 1),
(232, 'Vanuatu', 1),
(233, 'Wallis and Futuna', 1),
(234, 'Samoa', 1),
(235, 'Yemen', 1),
(236, 'Yugoslavia', 1),
(237, 'South Africa', 1),
(238, 'Zambia', 1),
(239, 'Zimbabwe', 1),
(1, 'Aruba', 1),
(2, 'Afghanistan', 1),
(3, 'Angola', 1),
(4, 'Anguilla', 1),
(5, 'Albania', 1),
(6, 'Andorra', 1),
(7, 'Netherlands Antilles', 1),
(8, 'United Arab Emirates', 1),
(9, 'Argentina', 1),
(10, 'Armenia', 1),
(11, 'American Samoa', 1),
(12, 'Antarctica', 1),
(13, 'French Southern territories', 1),
(14, 'Antigua and Barbuda', 1),
(15, 'Australia', 1),
(16, 'Austria', 1),
(17, 'Azerbaijan', 1),
(18, 'Burundi', 1),
(19, 'Belgium', 1),
(20, 'Benin', 1),
(21, 'Burkina Faso', 1),
(22, 'Bangladesh', 1),
(23, 'Bulgaria', 1),
(24, 'Bahrain', 1),
(25, 'Bahamas', 1),
(26, 'Bosnia and Herzegovina', 1),
(27, 'Belarus', 1),
(28, 'Belize', 1),
(29, 'Bermuda', 1),
(30, 'Bolivia', 1),
(31, 'Brazil', 1),
(32, 'Barbados', 1),
(33, 'Brunei', 1),
(34, 'Bhutan', 1),
(35, 'Bouvet Island', 1),
(36, 'Botswana', 1),
(37, 'Central African Republic', 1),
(38, 'Canada', 1),
(39, 'Cocos (Keeling) Islands', 1),
(40, 'Switzerland', 1),
(41, 'Chile', 1),
(42, 'China', 1),
(43, 'CÃ´te dâ€™Ivoire', 1),
(44, 'Cameroon', 1),
(45, 'Congo, The Democratic Republic', 1),
(46, 'Congo', 1),
(47, 'Cook Islands', 1),
(48, 'Colombia', 1),
(49, 'Comoros', 1),
(50, 'Cape Verde', 1),
(51, 'Costa Rica', 1),
(52, 'Cuba', 1),
(53, 'Christmas Island', 1),
(54, 'Cayman Islands', 1),
(55, 'Cyprus', 1),
(56, 'Czech Republic', 1),
(57, 'Germany', 1),
(58, 'Djibouti', 1),
(59, 'Dominica', 1),
(60, 'Denmark', 1),
(61, 'Dominican Republic', 1),
(62, 'Algeria', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'Eritrea', 1),
(66, 'Western Sahara', 1),
(67, 'Spain', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'Finland', 1),
(71, 'Fiji Islands', 1),
(72, 'Falkland Islands', 1),
(73, 'France', 1),
(74, 'Faroe Islands', 1),
(75, 'Micronesia, Federated States o', 1),
(76, 'Gabon', 1),
(77, 'United Kingdom', 1),
(78, 'Georgia', 1),
(79, 'Ghana', 1),
(80, 'Gibraltar', 1),
(81, 'Guinea', 1),
(82, 'Guadeloupe', 1),
(83, 'Gambia', 1),
(84, 'Guinea-Bissau', 1),
(85, 'Equatorial Guinea', 1),
(86, 'Greece', 1),
(87, 'Grenada', 1),
(88, 'Greenland', 1),
(89, 'Guatemala', 1),
(90, 'French Guiana', 1),
(91, 'Guam', 1),
(92, 'Guyana', 1),
(93, 'Hong Kong', 1),
(94, 'Heard Island and McDonald Isla', 1),
(95, 'Honduras', 1),
(96, 'Croatia', 1),
(97, 'Haiti', 1),
(98, 'Hungary', 1),
(99, 'Indonesia', 1),
(100, 'India', 1),
(101, 'British Indian Ocean Territory', 1),
(102, 'Ireland', 1),
(103, 'Iran', 1),
(104, 'Iraq', 1),
(105, 'Iceland', 1),
(106, 'Israel', 1),
(107, 'Italy', 1),
(108, 'Jamaica', 1),
(109, 'Jordan', 1),
(110, 'Japan', 1),
(111, 'Kazakstan', 1),
(112, 'Kenya', 1),
(113, 'Kyrgyzstan', 1),
(114, 'Cambodia', 1),
(115, 'Kiribati', 1),
(116, 'Saint Kitts and Nevis', 1),
(117, 'South Korea', 1),
(118, 'Kuwait', 1),
(119, 'Laos', 1),
(120, 'Lebanon', 1),
(121, 'Liberia', 1),
(122, 'Libyan Arab Jamahiriya', 1),
(123, 'Saint Lucia', 1),
(124, 'Liechtenstein', 1),
(125, 'Sri Lanka', 1),
(126, 'Lesotho', 1),
(127, 'Lithuania', 1),
(128, 'Luxembourg', 1),
(129, 'Latvia', 1),
(130, 'Macao', 1),
(131, 'Morocco', 1),
(132, 'Monaco', 1),
(133, 'Moldova', 1),
(134, 'Madagascar', 1),
(135, 'Maldives', 1),
(136, 'Mexico', 1),
(137, 'Marshall Islands', 1),
(138, 'Macedonia', 1),
(139, 'Mali', 1),
(140, 'Malta', 1),
(141, 'Myanmar', 1),
(142, 'Mongolia', 1),
(143, 'Northern Mariana Islands', 1),
(144, 'Mozambique', 1),
(145, 'Mauritania', 1),
(146, 'Montserrat', 1),
(147, 'Martinique', 1),
(148, 'Mauritius', 1),
(149, 'Malawi', 1),
(150, 'Malaysia', 1),
(151, 'Mayotte', 1),
(152, 'Namibia', 1),
(153, 'New Caledonia', 1),
(154, 'Niger', 1),
(155, 'Norfolk Island', 1),
(156, 'Nigeria', 1),
(157, 'Nicaragua', 1),
(158, 'Niue', 1),
(159, 'Netherlands', 1),
(160, 'Norway', 1),
(161, 'Nepal', 1),
(162, 'Nauru', 1),
(163, 'New Zealand', 1),
(164, 'Oman', 1),
(165, 'Pakistan', 1),
(166, 'Panama', 1),
(167, 'Pitcairn', 1),
(168, 'Peru', 1),
(169, 'Philippines', 1),
(170, 'Palau', 1),
(171, 'Papua New Guinea', 1),
(172, 'Poland', 1),
(173, 'Puerto Rico', 1),
(174, 'North Korea', 1),
(175, 'Portugal', 1),
(176, 'Paraguay', 1),
(177, 'Palestine', 1),
(178, 'French Polynesia', 1),
(179, 'Qatar', 1),
(180, 'RÃ©union', 1),
(181, 'Romania', 1),
(182, 'Russian Federation', 1),
(183, 'Rwanda', 1),
(184, 'Saudi Arabia', 1),
(185, 'Sudan', 1),
(186, 'Senegal', 1),
(187, 'Singapore', 1),
(188, 'South Georgia and the South Sa', 1),
(189, 'Saint Helena', 1),
(190, 'Svalbard and Jan Mayen', 1),
(191, 'Solomon Islands', 1),
(192, 'Sierra Leone', 1),
(193, 'El Salvador', 1),
(194, 'San Marino', 1),
(195, 'Somalia', 1),
(196, 'Saint Pierre and Miquelon', 1),
(197, 'Sao Tome and Principe', 1),
(198, 'Suriname', 1),
(199, 'Slovakia', 1),
(200, 'Slovenia', 1),
(201, 'Sweden', 1),
(202, 'Swaziland', 1),
(203, 'Seychelles', 1),
(204, 'Syria', 1),
(205, 'Turks and Caicos Islands', 1),
(206, 'Chad', 1),
(207, 'Togo', 1),
(208, 'Thailand', 1),
(209, 'Tajikistan', 1),
(210, 'Tokelau', 1),
(211, 'Turkmenistan', 1),
(212, 'East Timor', 1),
(213, 'Tonga', 1),
(214, 'Trinidad and Tobago', 1),
(215, 'Tunisia', 1),
(216, 'Turkey', 1),
(217, 'Tuvalu', 1),
(218, 'Taiwan', 1),
(219, 'Tanzania', 1),
(220, 'Uganda', 1),
(221, 'Ukraine', 1),
(222, 'United States Minor Outlying I', 1),
(223, 'Uruguay', 1),
(224, 'United States', 1),
(225, 'Uzbekistan', 1),
(226, 'Holy See (Vatican City State)', 1),
(227, 'Saint Vincent and the Grenadin', 1),
(228, 'Venezuela', 1),
(229, 'Virgin Islands, British', 1),
(230, 'Virgin Islands, U.S.', 1),
(231, 'Vietnam', 1),
(232, 'Vanuatu', 1),
(233, 'Wallis and Futuna', 1),
(234, 'Samoa', 1),
(235, 'Yemen', 1),
(236, 'Yugoslavia', 1),
(237, 'South Africa', 1),
(238, 'Zambia', 1),
(239, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `fld_id` int(11) NOT NULL,
  `fld_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `fld_code` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`fld_id`, `fld_name`, `fld_code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bolivia', 'BO'),
(27, 'Bosnia and Herzegowina', 'BA'),
(28, 'Botswana', 'BW'),
(29, 'Bouvet Island', 'BV'),
(30, 'Brazil', 'BR'),
(31, 'British Indian Ocean Territory', 'IO'),
(32, 'Brunei Darussalam', 'BN'),
(33, 'Bulgaria', 'BG'),
(34, 'Burkina Faso', 'BF'),
(35, 'Burundi', 'BI'),
(36, 'Cambodia', 'KH'),
(37, 'Cameroon', 'CM'),
(38, 'Canada', 'CA'),
(39, 'Cape Verde', 'CV'),
(40, 'Cayman Islands', 'KY'),
(41, 'Central African Republic', 'CF'),
(42, 'Chad', 'TD'),
(240, 'Channel Islands', 'CI'),
(43, 'Chile', 'CL'),
(44, 'China', 'CN'),
(45, 'Christmas Island', 'CX'),
(46, 'Cocos (Keeling) Islands', 'CC'),
(47, 'Colombia', 'CO'),
(48, 'Comoros', 'KM'),
(49, 'Congo', 'CG'),
(50, 'Cook Islands', 'CK'),
(51, 'Costa Rica', 'CR'),
(52, 'Cote D\'Ivoire', 'CI'),
(53, 'Croatia', 'HR'),
(54, 'Cuba', 'CU'),
(55, 'Cyprus', 'CY'),
(56, 'Czech Republic', 'CZ'),
(57, 'Denmark', 'DK'),
(58, 'Djibouti', 'DJ'),
(59, 'Dominica', 'DM'),
(60, 'Dominican Republic', 'DO'),
(61, 'East Timor', 'TP'),
(62, 'Ecuador', 'EC'),
(63, 'Egypt', 'EG'),
(64, 'El Salvador', 'SV'),
(65, 'Equatorial Guinea', 'GQ'),
(66, 'Eritrea', 'ER'),
(67, 'Estonia', 'EE'),
(68, 'Ethiopia', 'ET'),
(69, 'Falkland Islands (Malvinas)', 'FK'),
(70, 'Faroe Islands', 'FO'),
(71, 'Fiji', 'FJ'),
(72, 'Finland', 'FI'),
(73, 'France', 'FR'),
(74, 'France, Metropolitan', 'FX'),
(75, 'French Guiana', 'GF'),
(76, 'French Polynesia', 'PF'),
(77, 'French Southern Territories', 'TF'),
(78, 'Gabon', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia', 'GE'),
(81, 'Germany', 'DE'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guinea', 'GN'),
(91, 'Guinea-bissau', 'GW'),
(92, 'Guyana', 'GY'),
(93, 'Haiti', 'HT'),
(94, 'Heard and Mc Donald Islands', 'HM'),
(95, 'Honduras', 'HN'),
(96, 'Hong Kong', 'HK'),
(97, 'Hungary', 'HU'),
(98, 'Iceland', 'IS'),
(99, 'India', 'IN'),
(100, 'Indonesia', 'ID'),
(101, 'Iran (Islamic Republic of)', 'IR'),
(102, 'Iraq', 'IQ'),
(103, 'Ireland', 'IE'),
(104, 'Israel', 'IL'),
(105, 'Italy', 'IT'),
(106, 'Jamaica', 'JM'),
(107, 'Japan', 'JP'),
(108, 'Jordan', 'JO'),
(109, 'Kazakhstan', 'KZ'),
(110, 'Kenya', 'KE'),
(111, 'Kiribati', 'KI'),
(112, 'North Korea', 'KP'),
(113, 'Korea, Republic of', 'KR'),
(114, 'Kuwait', 'KW'),
(115, 'Kyrgyzstan', 'KG'),
(116, 'Lao People\'s Democratic Republic', 'LA'),
(117, 'Latvia', 'LV'),
(118, 'Lebanon', 'LB'),
(119, 'Lesotho', 'LS'),
(120, 'Liberia', 'LR'),
(121, 'Libyan Arab Jamahiriya', 'LY'),
(122, 'Liechtenstein', 'LI'),
(123, 'Lithuania', 'LT'),
(124, 'Luxembourg', 'LU'),
(125, 'Macau', 'MO'),
(126, 'Macedonia', 'MK'),
(127, 'Madagascar', 'MG'),
(128, 'Malawi', 'MW'),
(129, 'Malaysia', 'MY'),
(130, 'Maldives', 'MV'),
(131, 'Mali', 'ML'),
(132, 'Malta', 'MT'),
(133, 'Marshall Islands', 'MH'),
(134, 'Martinique', 'MQ'),
(135, 'Mauritania', 'MR'),
(136, 'Mauritius', 'MU'),
(137, 'Mayotte', 'YT'),
(138, 'Mexico', 'MX'),
(139, 'Micronesia, Federated States of', 'FM'),
(140, 'Moldova, Republic of', 'MD'),
(141, 'Monaco', 'MC'),
(142, 'Mongolia', 'MN'),
(143, 'Montserrat', 'MS'),
(144, 'Morocco', 'MA'),
(145, 'Mozambique', 'MZ'),
(146, 'Myanmar', 'MM'),
(147, 'Namibia', 'NA'),
(148, 'Nauru', 'NR'),
(149, 'Nepal', 'NP'),
(150, 'Netherlands', 'NL'),
(151, 'Netherlands Antilles', 'AN'),
(152, 'New Caledonia', 'NC'),
(153, 'New Zealand', 'NZ'),
(154, 'Nicaragua', 'NI'),
(155, 'Niger', 'NE'),
(156, 'Nigeria', 'NG'),
(157, 'Niue', 'NU'),
(158, 'Norfolk Island', 'NF'),
(159, 'Northern Mariana Islands', 'MP'),
(160, 'Norway', 'NO'),
(161, 'Oman', 'OM'),
(162, 'Pakistan', 'PK'),
(163, 'Palau', 'PW'),
(164, 'Panama', 'PA'),
(165, 'Papua New Guinea', 'PG'),
(166, 'Paraguay', 'PY'),
(167, 'Peru', 'PE'),
(168, 'Philippines', 'PH'),
(169, 'Pitcairn', 'PN'),
(170, 'Poland', 'PL'),
(171, 'Portugal', 'PT'),
(172, 'Puerto Rico', 'PR'),
(173, 'Qatar', 'QA'),
(174, 'Reunion', 'RE'),
(175, 'Romania', 'RO'),
(176, 'Russian Federation', 'RU'),
(177, 'Rwanda', 'RW'),
(178, 'Saint Kitts and Nevis', 'KN'),
(179, 'Saint Lucia', 'LC'),
(180, 'Saint Vincent and the Grenadines', 'VC'),
(181, 'Samoa', 'WS'),
(182, 'San Marino', 'SM'),
(183, 'Sao Tome and Principe', 'ST'),
(184, 'Saudi Arabia', 'SA'),
(185, 'Senegal', 'SN'),
(186, 'Seychelles', 'SC'),
(187, 'Sierra Leone', 'SL'),
(188, 'Singapore', 'SG'),
(189, 'Slovak Republic', 'SK'),
(190, 'Slovenia', 'SI'),
(191, 'Solomon Islands', 'SB'),
(192, 'Somalia', 'SO'),
(193, 'South Africa', 'ZA'),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS'),
(195, 'Spain', 'ES'),
(196, 'Sri Lanka', 'LK'),
(197, 'St. Helena', 'SH'),
(198, 'St. Pierre and Miquelon', 'PM'),
(199, 'Sudan', 'SD'),
(200, 'Suriname', 'SR'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ'),
(202, 'Swaziland', 'SZ'),
(203, 'Sweden', 'SE'),
(204, 'Switzerland', 'CH'),
(205, 'Syrian Arab Republic', 'SY'),
(206, 'Taiwan', 'TW'),
(207, 'Tajikistan', 'TJ'),
(208, 'Tanzania, United Republic of', 'TZ'),
(209, 'Thailand', 'TH'),
(210, 'Togo', 'TG'),
(211, 'Tokelau', 'TK'),
(212, 'Tonga', 'TO'),
(213, 'Trinidad and Tobago', 'TT'),
(214, 'Tunisia', 'TN'),
(215, 'Turkey', 'TR'),
(216, 'Turkmenistan', 'TM'),
(217, 'Turks and Caicos Islands', 'TC'),
(218, 'Tuvalu', 'TV'),
(219, 'Uganda', 'UG'),
(220, 'Ukraine', 'UA'),
(221, 'United Arab Emirates', 'AE'),
(222, 'United Kingdom', 'GB'),
(223, 'United States', 'US'),
(224, 'United States Minor Outlying Islands', 'UM'),
(225, 'Uruguay', 'UY'),
(226, 'Uzbekistan', 'UZ'),
(227, 'Vanuatu', 'VU'),
(228, 'Vatican City State (Holy See)', 'VA'),
(229, 'Venezuela', 'VE'),
(230, 'Viet Nam', 'VN'),
(231, 'Virgin Islands (British)', 'VG'),
(232, 'Virgin Islands (U.S.)', 'VI'),
(233, 'Wallis and Futuna Islands', 'WF'),
(234, 'Western Sahara', 'EH'),
(235, 'Yemen', 'YE'),
(236, 'Yugoslavia', 'YU'),
(237, 'Democratic Republic of Congo', 'CD'),
(238, 'Zambia', 'ZM'),
(239, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `countrys`
--

CREATE TABLE `countrys` (
  `id` int(11) NOT NULL,
  `country_name` text NOT NULL,
  `country_status` enum('1','2') NOT NULL,
  `sorting_order` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrys`
--

INSERT INTO `countrys` (`id`, `country_name`, `country_status`, `sorting_order`) VALUES
(2, 'United Kingdom', '1', '2'),
(12, 'INDIA', '1', '3'),
(6, 'Bharat', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_category` int(11) NOT NULL,
  `course_country` text NOT NULL,
  `course_city` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `add_date` datetime NOT NULL,
  `course_description` text NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `certificate` varchar(255) NOT NULL,
  `entry_requirment` varchar(255) NOT NULL,
  `who_should_apply` text NOT NULL,
  `course_startDate` date NOT NULL,
  `course_endDate` date NOT NULL,
  `course_mode` varchar(255) NOT NULL,
  `course_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_category`, `course_country`, `course_city`, `price`, `add_date`, `course_description`, `course_image`, `status`, `certificate`, `entry_requirment`, `who_should_apply`, `course_startDate`, `course_endDate`, `course_mode`, `course_level`) VALUES
(1, 'MYSQL AND PHP', 27, '', '', 150.00, '2020-07-31 08:29:32', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>\n<p>&nbsp;</p>', '', '1', 'BOTH', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2020-08-04', '2020-08-09', '1', '2'),
(3, 'Test', 27, '', '', 200.00, '2020-07-31 18:55:28', '<p>test</p>', '', '1', 'Certificate of Completion', 'test', 'test', '2020-08-07', '2020-08-09', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_13032020`
--

CREATE TABLE `course_13032020` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_category` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `add_date` datetime NOT NULL,
  `course_description` text NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `cpd` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `entry_requirment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_13032020`
--

INSERT INTO `course_13032020` (`course_id`, `course_name`, `course_category`, `price`, `add_date`, `course_description`, `course_image`, `sort_order`, `status`, `cpd`, `certificate`, `entry_requirment`) VALUES
(1, 'Microsoft Word Foundation', 9, 150.00, '2018-04-20 07:41:35', '<p>Microsoft Word is a very important Microsoft Office application. We use Microsoft Word almost every day to create letters, documents or to open Microsoft word attachments received by emails.</p>', 'ms-word.png', 1, '1', 'Yes', 'Students would get a certificate of Microsoft Word Foundation if they have attended all classes.', 'students should be able to use keyboard and mouse'),
(2, 'Foundation Computer Course', 9, 450.00, '2018-09-20 12:33:44', '<p>Foundation computer course is for students that have not used the computer or applications for long time, but they still can use the keyboard and mouse.</p>\n<p>Classroom Course length: 15 hours (3 sessions of 3 hours)</p>', 'python-logo.jpg', 1, '1', 'No', 'Students would get a certificate if they have attended all classes.', 'students need to be able to use the keyboard and mouse properly.'),
(3, 'Microsoft Office Foundation', 8, 450.00, '2018-09-20 12:34:57', '<p>Microsoft office is suit of applications that we use in our everyday work. Learners would learn how to use Word processor, spreadsheet and presentation software. Word is a word processor to create documents, articles and even journals. Excel is a spreadsheet to help you challenge with all problems that need calculations and data analysis. PowerPoint is a presentation software that can assist you with your public presentations or marketing your products.</p>\n<p>Classroom Course length: 15 hours (5 sessions of 3 hours)</p>', 'html5.png', 1, '1', 'Yes', 'Students would get a certificate if they have attended all classes.', 'students need to be able to use the keyboard and mouse properly.'),
(4, 'Microsoft Office Intermediate', 8, 450.00, '2018-09-20 12:35:45', '<p>Microsoft office is suit of applications that we use in our everyday work. Learners would learn how to use Word processor, spreadsheet and presentation software. Word is a word processor to create documents, articles and even journals. Excel is a spreadsheet to help you challenge with all problems that need calculations and data analysis. PowerPoint is a presentation software that can assist you with your public presentations or marketing your products.</p>\n<p>Classroom Course length: 15 hours (5 sessions of 3 hours)</p>', '', 1, '1', 'Yes', ' Students would get a certificate if they have attended all classes.', 'students should have the knowledge of Office Foundation.'),
(5, 'Microsoft Excel Foundation', 8, 150.00, '2019-03-16 09:32:44', '<p>Microsoft Excel is a very important Microsoft Office application. We use Microsoft Excel to deal with applications that need numerical operations, calculations through formula and using data analysis.</p>\n<p>Classroom Course length: 5 hours (2 sessions of 2.5 hours)</p>', 'javascript.png', 1, '1', 'Yes', 'Students would get a certificate of Microsoft Excel Foundation if they have attended all classes.', 'students should be able to use keyboard and mouse'),
(6, 'Microsoft PowerPoint Foundation', 8, 150.00, '2019-11-04 22:41:45', '<p>Microsoft PowerPoint is a very important Microsoft Office application. We use Microsoft PowerPoint to deal with Presentation.</p>\n<p>Classroom Course length: 5 hours (2 sessions of 2.5 hours)</p>', '', 1, '1', 'Yes', 'Students would get a certificate of Microsoft PowerPoint Foundation if they have attended all classes.', 'students should be able to use keyboard and mouse'),
(7, 'Microsoft Word Intermediate', 9, 150.00, '2019-11-04 23:05:47', '<p>Microsoft Word is a very important Microsoft Office application. We use Microsoft Word almost every day to create letters, documents or to open Microsoft word attachments received by emails.</p>\n<p>Classroom Course length: 5 hours (2 sessions of 2.5 hours)</p>', '', 2, '1', 'Yes', 'Students would get a certificate of Microsoft Word Intermediate if they have attended all classes.', 'students should be able to use keyboard and mouse'),
(8, 'Microsoft Excel Intermediate', 10, 150.00, '2019-11-04 23:08:56', '<p>Microsoft Excel is a very important Microsoft Office application. We use Microsoft Excel to deal with applications that need numerical operations, calculations through formula and using data analysis.</p>\n<p>&nbsp;Classroom Course length: 5 hours (2 sessions of 2.5 hours)</p>', '', 2, '1', 'Yes', 'Students would get a certificate of Microsoft Excel Intermediate if they have attended all classes.', 'students must have the knowledge of Excel basic'),
(9, 'Microsoft PowerPoint Intermediate', 11, 150.00, '2019-11-04 23:12:40', '<p>Microsoft PowerPoint is a very important Microsoft Office application. We use Microsoft PowerPoint to deal with Presentation.</p>\n<p>Classroom Course length: 5 hours (2 sessions of 2.5 hours)</p>', '', 2, '1', 'Yes', ':  Students would get a certificate of Microsoft PowerPoint Intermediate if they have attended all classes.', 'students must have the knowledge of PowerPoint Foundation');

-- --------------------------------------------------------

--
-- Table structure for table `course_backup24072020`
--

CREATE TABLE `course_backup24072020` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_category` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `add_date` datetime NOT NULL,
  `course_description` text NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `cpd` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `entry_requirment` varchar(255) NOT NULL,
  `course_country` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_backup24072020`
--

INSERT INTO `course_backup24072020` (`course_id`, `course_name`, `course_category`, `price`, `add_date`, `course_description`, `course_image`, `sort_order`, `status`, `cpd`, `certificate`, `entry_requirment`, `course_country`, `start_date`, `end_date`) VALUES
(1, 'Microsoft Word Foundation', 9, 150.00, '2018-04-20 07:41:35', '<p>Microsoft Word is a very important Microsoft Office application. We use Microsoft Word almost every day to create letters, documents or to open Microsoft word attachments received by emails.</p>', 'ms-word.png', 1, '1', 'Yes', 'test@goigi.asia', 'students should be able to use keyboard and mouse', 'Austria', '2020-03-28', '2020-04-24'),
(2, 'Foundation Computer Course', 9, 450.00, '2018-09-20 12:33:44', '<p>Foundation computer course is for students that have not used the computer or applications for long time, but they still can use the keyboard and mouse.</p>\n<p>Classroom Course length: 15 hours (3 sessions of 3 hours)</p>', 'python-logo.jpg', 1, '1', 'No', 'decelopment@dev.com', 'students need to be able to use the keyboard and mouse properly.', 'Australia', '2020-03-20', '2020-04-20'),
(3, 'Microsoft Office Foundation', 8, 450.00, '2018-09-20 12:34:57', '<p>Microsoft office is suit of applications that we use in our everyday work. Learners would learn how to use Word processor, spreadsheet and presentation software. Word is a word processor to create documents, articles and even journals. Excel is a spreadsheet to help you challenge with all problems that need calculations and data analysis. PowerPoint is a presentation software that can assist you with your public presentations or marketing your products.</p>\n<p>Classroom Course length: 15 hours (5 sessions of 3 hours)</p>', 'html5.png', 1, '1', 'Yes', 'Students would get a certificate if they have attended all classes.', 'students need to be able to use the keyboard and mouse properly.', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `course_booking`
--

CREATE TABLE `course_booking` (
  `book_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `book_date` datetime NOT NULL,
  `mode` varchar(100) NOT NULL,
  `course_type` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price` varchar(50) NOT NULL,
  `hour` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `pay_status` enum('paid','unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_booking`
--

INSERT INTO `course_booking` (`book_id`, `course_id`, `course_name`, `book_date`, `mode`, `course_type`, `location`, `start_date`, `start_time`, `end_time`, `price`, `hour`, `student_id`, `business_id`, `transaction_id`, `status`, `pay_status`) VALUES
(8, 2, 'Foundation Computer Course', '2020-03-18 12:41:11', 'privatebooking', '0', '', '0000-00-00 00:00:00', '00:00:00', '00:00:00', '450', 0, 'amit95@gmail.com', '', 'OESPAYPTGIpSfXuV6E18-03-2020', '1', 'paid'),
(11, 10, 'PHP', '2020-03-18 13:41:21', 'privatebooking', '0', '', '0000-00-00 00:00:00', '00:00:00', '00:00:00', '500', 0, 'amit95@gmail.com', '', 'OESPAYvVyXBbOcFq8g18-03-2020', '0', 'unpaid'),
(18, 14, 'Python', '2020-04-13 12:18:50', 'privatebooking', '0', '', '0000-00-00 00:00:00', '00:00:00', '00:00:00', '500.00', 0, 'amit95@gmail.com', '', 'OESPAYNq6UyW33kJW813-04-2020', '0', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `course_end_date`
--

CREATE TABLE `course_end_date` (
  `end_date_id` int(11) NOT NULL,
  `start_id` int(11) NOT NULL,
  `end_date` date NOT NULL,
  `hour` int(11) NOT NULL,
  `per_hour_price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_end_date`
--

INSERT INTO `course_end_date` (`end_date_id`, `start_id`, `end_date`, `hour`, `per_hour_price`, `status`) VALUES
(1, 1, '2018-06-11', 0, 0, 1),
(2, 1, '2018-06-11', 0, 0, 1),
(3, 2, '2018-07-18', 0, 0, 1),
(4, 3, '2018-07-18', 0, 0, 1),
(5, 4, '2018-07-18', 0, 0, 1),
(6, 5, '2018-07-18', 0, 0, 1),
(7, 6, '2018-07-18', 0, 0, 1),
(8, 7, '2018-07-16', 0, 0, 1),
(9, 8, '2018-07-18', 0, 0, 1),
(10, 9, '2018-10-18', 0, 0, 1),
(11, 10, '2018-10-09', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_feedback`
--

CREATE TABLE `course_feedback` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` blob NOT NULL,
  `post_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `inst_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `mode_id` int(11) NOT NULL,
  `class_date` datetime NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`inst_id`, `instructor_id`, `course_id`, `mode_id`, `class_date`, `start_time`, `end_time`, `status`) VALUES
(16, 28, 14, 3, '2020-04-15 00:00:00', '14:15:00', '15:30:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_lesion`
--

CREATE TABLE `course_lesion` (
  `lession_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `type_id` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lession_title` varchar(255) NOT NULL,
  `lession_description` blob NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_lesion`
--

INSERT INTO `course_lesion` (`lession_id`, `course_id`, `type_id`, `start_date`, `start_time`, `end_time`, `lession_title`, `lession_description`, `status`) VALUES
(2, 1, 'wd', '2018-06-04', '14:00:00', '17:00:00', '', '', '1'),
(3, 1, 'wd', '2018-06-11', '14:00:00', '17:00:00', '', '', '1'),
(4, 1, 'wd', '2018-06-11', '10:00:00', '13:00:00', '', '', '1'),
(5, 1, 'wd', '2018-07-11', '10:00:00', '13:00:00', '', '', '1'),
(6, 1, 'wd', '2018-07-11', '14:00:00', '17:00:00', '', '', '1'),
(7, 1, 'ev', '2018-07-11', '18:00:00', '21:00:00', '', '', '1'),
(8, 1, 'wd', '2018-07-11', '13:00:00', '17:00:00', '', '', '1'),
(9, 1, 'we', '2018-07-16', '10:00:00', '17:00:00', '', '', '1'),
(10, 2, 'wd', '2018-10-15', '11:00:00', '13:00:00', '', '', '1'),
(11, 3, 'wd', '2018-09-24', '11:05:00', '14:50:00', '', '', '1'),
(12, 4, 'wd', '2018-10-08', '12:00:00', '18:00:00', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_location`
--

CREATE TABLE `course_location` (
  `location_id` int(11) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `course_id` int(11) NOT NULL,
  `cource_hours` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_location`
--

INSERT INTO `course_location` (`location_id`, `course_type`, `location_name`, `start_date`, `end_date`, `course_id`, `cource_hours`, `status`) VALUES
(2, 'we', 'Holborn', '0000-00-00', '0000-00-00', 1, 6, 1),
(3, 'wd', 'Holborn', '0000-00-00', '0000-00-00', 1, 6, 1),
(4, 'ev', 'Holborn', '0000-00-00', '0000-00-00', 1, 6, 1),
(5, 'wd', 'Slough', '0000-00-00', '0000-00-00', 1, 6, 1),
(6, 'ev', 'Slough', '0000-00-00', '0000-00-00', 1, 12, 1),
(7, 'we', 'Bethnal Green', '0000-00-00', '0000-00-00', 1, 10, 1),
(8, 'wd', 'Holborn', '0000-00-00', '0000-00-00', 2, 3, 1),
(9, 'wd', 'Holborn', '0000-00-00', '0000-00-00', 4, 6, 1),
(10, 'wd', 'ewfewfe', '0000-00-00', '0000-00-00', 0, 343, 1),
(11, 'wd', 'durgapur', '1970-01-01', '1970-01-01', 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_new`
--

CREATE TABLE `course_new` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_category` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `add_date` datetime NOT NULL,
  `course_description` text NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `cpd` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `entry_requirment` varchar(255) NOT NULL,
  `course_country` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_query`
--

CREATE TABLE `course_query` (
  `ContactId` int(11) NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `last_name` text NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `ReplyMessage` text NOT NULL,
  `ReplyStatus` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ReplyDate` datetime NOT NULL,
  `ContactDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_query`
--

INSERT INTO `course_query` (`ContactId`, `ContactName`, `last_name`, `Subject`, `Phone`, `Email`, `Message`, `ReplyMessage`, `ReplyStatus`, `ReplyDate`, `ContactDate`) VALUES
(1, 'Doug Bollinger', 'dfg', '', '33665544112', 'web0112156@goigi.asia', '0', '', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Kevin peterson', '', '', '9854111154', 'kevin@gmail.com', 'test Query from kevin', '', 'No', '0000-00-00 00:00:00', '2017-02-06 11:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `course_sessions`
--

CREATE TABLE `course_sessions` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `time_type` text NOT NULL,
  `session_objective` text NOT NULL,
  `session_location` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_country` text NOT NULL,
  `course_city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_sessions`
--

INSERT INTO `course_sessions` (`id`, `course_id`, `batch_id`, `date`, `starttime`, `endtime`, `time_type`, `session_objective`, `session_location`, `created_at`, `course_country`, `course_city`) VALUES
(1, 1, 1, '2020-08-05', '10:00:00', '13:00:00', 'Weekday', 'Basic Start Test', 'Kolkata', '2020-07-31 08:33:31', '6', '4'),
(2, 0, 1, '2020-08-07', '10:00:00', '13:00:00', 'Weekday', 'notf', 'Kushai', '2020-07-31 08:33:31', '6', '-- Select City --');

-- --------------------------------------------------------

--
-- Table structure for table `course_start_date`
--

CREATE TABLE `course_start_date` (
  `start_date_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_start_date`
--

INSERT INTO `course_start_date` (`start_date_id`, `loc_id`, `start_date`, `status`) VALUES
(1, 1, '2018-06-04', 1),
(2, 1, '2018-07-11', 1),
(3, 1, '2018-07-11', 1),
(4, 4, '2018-07-11', 1),
(5, 5, '2018-07-11', 1),
(6, 6, '2018-07-11', 1),
(7, 7, '2018-07-16', 1),
(8, 3, '2018-07-11', 1),
(9, 8, '2018-10-15', 1),
(10, 9, '2018-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `discount_code` varchar(100) NOT NULL,
  `percentage` varchar(30) NOT NULL,
  `add_date` date NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount_code`, `percentage`, `add_date`, `status`) VALUES
(2, 'newyear', '10', '2018-01-29', 'Y'),
(3, 'Comefirst', '09', '2018-01-29', 'Y'),
(4, 'ramnavami', '20', '2018-03-29', 'Y'),
(5, 'MAYDAY2020', '20', '2020-04-15', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `distance_learning`
--

CREATE TABLE `distance_learning` (
  `diatance_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `print_material` enum('Yes','No') NOT NULL,
  `online_access` int(11) NOT NULL,
  `tutor_support` enum('Limited','Full') NOT NULL,
  `cirtificates` enum('Yes','No') NOT NULL,
  `price` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distance_learning`
--

INSERT INTO `distance_learning` (`diatance_id`, `course_id`, `package_name`, `print_material`, `online_access`, `tutor_support`, `cirtificates`, `price`, `add_date`, `status`) VALUES
(1, 7, 'MS Word Foundation Platinium', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-06', '1'),
(2, 7, 'MS Word Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-06', '1'),
(3, 7, 'MS Word Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-06', '1'),
(4, 8, 'MS Word Foundation Platinium', 'Yes', 0, 'Limited', 'Yes', 216, '2018-04-06', '1'),
(5, 8, 'MS Word Foundation Gold', 'Yes', 3, 'Limited', 'No', 144, '2018-04-06', '1'),
(6, 8, 'MS Word Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-06', '1'),
(7, 9, 'MS Excel Foundation Platinium', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-06', '1'),
(8, 9, 'MS Excel Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-06', '1'),
(9, 9, 'MS Excel Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-06', '1'),
(10, 10, 'MS PowerPoint Platinum ', 'Yes', 6, 'Full', 'Yes', 216, '2018-04-06', '1'),
(11, 10, 'MS PowerPoint Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-06', '1'),
(12, 10, 'MS PowerPoint Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-06', '1'),
(13, 10, 'MS PowerPoint Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-06', '1'),
(14, 11, 'MS Office Foundation Platinum', 'Yes', 6, 'Limited', 'Yes', 480, '2018-04-06', '1'),
(15, 11, 'MS Office Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 320, '2018-04-06', '1'),
(16, 11, 'MS Office Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 200, '2018-04-06', '1'),
(17, 12, 'MS Excel Foundation Platinum', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-06', '1'),
(18, 12, 'MS Word Foundation Platiniu', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-06', '1'),
(19, 12, 'MS Word Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-06', '1'),
(20, 12, 'MS Word Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-06', '1'),
(21, 13, 'MS Excel Foundation Platinum', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-06', '1'),
(22, 13, 'MS Excel Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-06', '1'),
(23, 13, 'MS Excel Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-06', '1'),
(24, 14, 'MS PowerPoint Foundation Platinum', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-07', '1'),
(25, 14, 'MS PowerPoint Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-07', '1'),
(26, 14, 'MS PowerPoint Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-07', '1'),
(27, 15, 'MS Office Foundation Platinum', 'Yes', 6, 'Limited', 'Yes', 540, '2018-04-07', '1'),
(28, 15, 'MS Office Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 360, '2018-04-07', '1'),
(29, 15, 'MS Word Foundation Standard', 'Yes', 1, 'Limited', 'Yes', 225, '2018-04-07', '1'),
(30, 16, 'MS Excel Foundation Platinum', 'Yes', 6, 'Limited', 'Yes', 216, '2018-04-07', '1'),
(31, 16, 'MS Word Foundation Gold', 'Yes', 3, 'Limited', 'Yes', 144, '2018-04-07', '1'),
(32, 16, 'MS Excel Foundation Platinum', 'Yes', 1, 'Limited', 'Yes', 100, '2018-04-07', '1'),
(33, 1, 'Standard', 'Yes', 1234, 'Limited', 'Yes', 100, '2018-04-20', '1'),
(34, 0, 'efewf', 'Yes', 3, 'Limited', 'Yes', 0, '2018-10-06', '1'),
(35, 5, 'efewf', 'Yes', 34, 'Limited', 'Yes', 3343, '2018-10-06', '1'),
(36, 1, 'Online + classroom', 'Yes', 0, 'Full', 'Yes', 110, '2019-11-04', '1'),
(37, 1, 'Distance + Tutor', 'Yes', 12345, 'Full', 'Yes', 75, '2019-11-04', '1'),
(38, 2, 'Online + classroom', 'Yes', 1234, 'Full', 'Yes', 330, '2019-11-04', '1'),
(39, 3, 'Distance + Tutor', 'Yes', 123454, 'Limited', 'Yes', 225, '2019-11-04', '1'),
(40, 2, 'Distance + Tutor', 'Yes', 12345, 'Limited', 'Yes', 225, '2019-11-04', '1'),
(41, 4, 'Online + classroom', 'Yes', 12345, 'Limited', 'Yes', 330, '2019-11-04', '1'),
(42, 4, 'Distance + Tutor', 'Yes', 1234, 'Full', 'Yes', 225, '2019-11-04', '1'),
(43, 5, 'Online + classroom', 'Yes', 1234, 'Limited', 'Yes', 110, '2019-11-04', '1'),
(44, 5, 'Distance + Tutor', 'Yes', 123, 'Limited', 'Yes', 75, '2019-11-04', '1'),
(45, 6, 'Online + classroom', 'Yes', 12345, 'Limited', 'Yes', 110, '2019-11-04', '1'),
(46, 6, 'Distance + Tutor', 'Yes', 12345, 'Limited', 'Yes', 75, '2019-11-04', '1'),
(47, 7, 'Online + classroom', 'Yes', 1234, 'Limited', 'Yes', 110, '2019-11-04', '1'),
(48, 7, 'Distance + Tutor', 'Yes', 12345, 'Limited', 'Yes', 75, '2019-11-04', '1'),
(49, 8, 'Online + classroom', 'Yes', 12345, 'Limited', 'Yes', 110, '2019-11-04', '1'),
(50, 8, 'Distance + Tutor', 'Yes', 1234, 'Limited', 'Yes', 75, '2019-11-04', '1'),
(51, 9, 'Online + classroom', 'Yes', 1234, 'Limited', 'Yes', 110, '2019-11-04', '1'),
(52, 9, 'Distance + Tutor', 'Yes', 12345, 'Limited', 'Yes', 75, '2019-11-04', '1'),
(53, 14, 'LFH', 'Yes', 12, 'Limited', 'Yes', 200, '2020-04-14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `event_description` longtext NOT NULL,
  `location` blob NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `start_date_time`, `end_date_time`, `event_description`, `location`, `event_image`, `post_date`, `status`) VALUES
(6, 'Molecular Diagnostics', '2017-02-20 10:30:00', '2017-02-22 10:30:00', '<p>LINK:&nbsp;<a href=\"http://www.triconference.com/Molecular-Diagnostics/\" target=\"_blank\">http://www.triconference.com/Molecular-Diagnostics/</a></p>\r\n<p>Molecular diagnostics is the driving force behind the transformation today in healthcare and leading to a wealth of disruptive innovations. These include next-generation sequencing, liquid biopsies, early cancer detection, direct-to-consumer testing and point-of-care assays. In its fourteenth year, the Molecular Diagnostics conference is the industry leaders&rsquo; networking event and will outline recent developments and successful implementation of diagnostics from experts in the field. This year will also feature the 3rd Annual \"Swimming with the Sharks\" competition where companies pitch their company\'s value proposition to a panel of VCs and industry experts.</p>', 0x3c68333e3c7370616e207374796c653d22666f6e742d73697a653a20313070743b223e3c7374726f6e673e4d6f73636f6e65204e6f72746820436f6e76656e74696f6e2043656e746572207c2053616e204672616e636973636f2c2043413c2f7374726f6e673e3c2f7370616e3e3c2f68333e, 'evedum.jpg', '2017-01-20', 1),
(8, 'World Precision Medicine Congress 2017', '2017-05-17 09:00:00', '2017-05-19 09:00:00', '<p>LINK:&nbsp;<a href=\"http://labiotech.eu/event/world-precision-medicine-congress-2017/\">http://labiotech.eu/event/world-precision-medicine-congress-2017/</a></p>\r\n<p><strong>For 2016 we launched the World Precision Medicine Congress alongside the 11th annual&nbsp;World Stem Cells &amp; Regenerative Medicine Congress in London.</strong></p>\r\n<p>As we worked to put&nbsp;together the programme on precision medicine, we asked industry- and thought-leading&nbsp;professionals who were looking to attend, what they needed from this Congress.&nbsp;They said that it needed to:</p>\r\n<p>&bull;&nbsp;<strong>Bring together industry, healthcare and academia from across the variety of disciplines&nbsp;included under the precision medicine umbrella&nbsp;</strong><br /><strong>&bull; Bring together the global community&nbsp;</strong><br /><strong>&bull; Focus on a multitude of omics, disease areas and solutions</strong></p>\r\n<p>2016 brought all that together and 2017 will bring all this and more!</p>\r\n<p>In 2017, the programme will first of all be expanded to run over 3 days and across 2&nbsp;streams. This will enable separate days focussing on cancer, rare diseases, infectious&nbsp;diseases and other complex conditions. The extended programme will also allow for&nbsp;more in-depth coverage of those pertinent topics that are not disease-specific: Data and&nbsp;services, diagnostics and e-health, infrastructure and investment.</p>\r\n<p>Feedback on the topic of precision medicine has always been that networking and bringing&nbsp;together the different expertise areas is crucial for the sector to be successful. Whether&nbsp;you refer to it as precision, personalised or stratified medicine, one thing remains clear,&nbsp;there is so much expertise in this area globally that is offering patients, often those where&nbsp;there are no other treatment options remaining, a lot of hope and potential. Whether you&nbsp;are in pathology or proteomics, data or diagnostics, bioinformatics or biomarkers, World&nbsp;Precision Medicine Congress is the market place to meet, discuss and ultimately do&nbsp;business in this exciting and prosperous space.</p>\r\n<p>Along with the expanded and rebranded World Advanced Therapies &amp; Regenerative&nbsp;Medicine Congress (formerly World Stem Cells &amp; Regenerative Medicine Congress) and&nbsp;Cord Blood World Europe, 2017 will&nbsp;welcome 250+ speakers across the 3 days enabling&nbsp;networking opportunities with over 1000 leading industry professionals.&nbsp;With that in mind, we look forward to welcoming you to London in May 2017: 17th &ndash; 19th.</p>', 0x3c703e427573696e6573732044657369676e2043656e747265207c204c6f6e646f6e2c556e69746564204b696e67646f6d3c2f703e, 'evedum2.jpg', '2017-01-20', 1),
(9, 'Molecular Diagnostics World Summit 2017', '2017-07-25 09:00:00', '2017-07-26 09:00:00', '<p>LINK:&nbsp;<a href=\"http://www.globaleventslist.elsevier.com/events/2016/05/molecular-diagnostics-world-summit-2016/\">http://www.globaleventslist.elsevier.com/events/2016/05/molecular-diagnostics-world-summit-2016/</a></p>\r\n<p>The global molecular diagnostics market is predicted to reach $8 billion by 2018. This market is highly influenced by the raise of infectious diseases such as TB, HIV etc, antimicrobial resistance and other factors. 80% of the market are shared between Europe and America and remaining 20% between Rest of the World. To provide efficient treatment and disease management there is an urgent need for rapid and more efficient diagnostics. In terms of technology PCR based diagnostics are rapidly growing and possess the major market shares. NGS, POC, Microarrays and others form the rest of the market. Molecular Diagnostics market comprises of instruments, reagents, software and end user services which has a great future and growth by 2018.</p>\r\n<p>Thus, Molecular Diagnostics World Summit 2016, conference offers a rare opportunity to its participants to understand and learn from top experts in the Molecular Microbiology and Diagnostics field and to share ideas and develop new business collaborations. The conference will also provide a platform to discuss the current vital issues, market assessment, commercialization and globalization.</p>\r\n<p>The conference will bring together industry experts to explore and gain insight into new molecular diagnostics development strategies, development from research to the Market and successful case studies.</p>\r\n<p>It gives us a great pleasure in welcoming you to the Molecular Diagnostics World Summit 2017.</p>', 0x3c703e48494c544f4e204c4f4e444f4e204f4c594d504941207c204c6f6e646f6e207c20556e69746564204b696e67646f6d3c2f703e, 'evedum3.jpg', '2017-01-20', 1),
(10, 'Predictive, Preventive and Personalized Medicine & Molecular Diagnostics', '2017-10-05 08:00:00', '2017-10-06 08:00:00', '<div class=\"col-md-12 clearfix\">\r\n<p>LINK:&nbsp;<a href=\"http://personalizedmedicine.conferenceseries.com/events-list/advances-in-molecular-diagnostics\" target=\"_blank\">http://personalizedmedicine.conferenceseries.com/events-list/advances-in-molecular-diagnostics</a></p>\r\n<p>Personalized Medicine is a developing routine of&nbsp;<a href=\"http://www.omicsonline.org/scholarly/medication-management-services-journals-articles-ppts-list.php\">medication</a>&nbsp;that uses an individual\'s&nbsp;<a href=\"http://www.omicsonline.org/scholarly/hereditary-blood-disorders-journals-articles-ppts-list.php\">hereditary profile</a>&nbsp;to guide choices made with respect to the counteractive action, determination, and treatment of ailment. Information of a patient\'s hereditary profile can offer specialists some assistance with selecting the best possible prescription or treatment and manage it utilizing the correct measurement or regimen. Utilized for the treatment as Personalized growth solution,&nbsp;<a href=\"http://www.omicsonline.org/scholarly/juvenile-diabetes-journals-articles-ppts-list.php\">Diabetes</a>-related sickness: hazard appraisal and administration, Personalized pharmaceutical: New procedures and monetary ramifications, Implications of customized prescription in treatment of&nbsp;<a href=\"http://www.omicsonline.org/scholarly/lupus-hives-journals-articles-ppts-list.php\">HIV</a>, Applications of customized drug in uncommon illnesses, Translational Medicine.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<ul>\r\n<li>Therapeutics and diagnostics</li>\r\n<li>Preclinical and clinical diagnostics</li>\r\n<li>Translational research</li>\r\n<li>Liquid biopsy</li>\r\n<li>Personalized imaging</li>\r\n<li>Diagnostic assays</li>\r\n</ul>', 0x3c703e4368696361676f207c20496c6c696e6f6973207c205553413c2f703e, 'evedum4.jpg', '2017-01-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `category` enum('PROFESSIONAL REGISTRATION','ACCOMMODATION','VISA','COURSES') NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `faq_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `category`, `question`, `answer`, `faq_status`) VALUES
(8, 'PROFESSIONAL REGISTRATION', '1. Can you attend our premises for training?', '<p><strong></strong>(1)Yes. We can arrange it for sure.</p>', 1),
(9, 'PROFESSIONAL REGISTRATION', '2. I do not have much time to attend the training sessions, what should I do?', '<p>(1)You can subscribe to our professional and self-descriptive training materials, where you can have access to a tutor and some workshops.</p>', 1),
(10, 'PROFESSIONAL REGISTRATION', '3. Do I have online access to the course materials?', '<p>(1)Yes. You have access to all the course materials online.</p>', 1),
(11, 'PROFESSIONAL REGISTRATION', '4. Do I have WiFi access?', '<p>(1)Yes. All our centres provide fast WiFi connection.</p>', 1),
(12, 'PROFESSIONAL REGISTRATION', '5. How many students are in the classrooms?', '<p>(1)The maximum number of students is 8.</p>', 1),
(13, 'ACCOMMODATION', '6. Do I get the course materials?', '<p>(1)Yes. We provide professional training materials as hardcopy booklets and online accessed as well.</p>', 1),
(14, 'PROFESSIONAL REGISTRATION', '7. Do I get certificate at the end of the course?', '<p>(1)Yes. You would get a certificate of attendance if you attend all the lessons. Some courses also offer certificate of achievement, where you will be qualified if you passed at least 70% of the assessments. Some of the courses such as Microsoft office are approved and accredited for CPD achievement.</p>', 1),
(15, 'COURSES', '8. What is your teaching philosophy?', '<p>(1)We conduct active learning lessons, where you learn by doing things. We do also care about each student learning method and we try to bring variety of teaching methods to satisfy everyone.</p>', 1),
(16, 'PROFESSIONAL REGISTRATION', '9. I know part of the syllabus of a course and I only like to learn the parts that I do not know, what do I do?', '<p>(1)Let us know the topics that you like to learn. We would then place you in the classes which are suitable for you. We could also do private training for you, as required.</p>', 1),
(17, 'PROFESSIONAL REGISTRATION', '10. Why choose us?', '<p>(1)Here are just a few reasons why our customers say they keep coming back:</p>\r\n<p>(1)Easy and quick course booking.</p>\r\n<p>(2)Our industry experienced and passionate trainers help the students achieve their full potential.</p>\r\n<p>(3)Maximum of 6-8 students per session.</p>\r\n<p>(4)Up-to-date and relevant teaching materials.</p>\r\n<p>(5)Latest and most effective training techniques.</p>\r\n<p>(6)The training takes place in a relaxed and highly supportive learning environment.</p>\r\n<p>(7)Flexible training dates according to the student&rsquo;s choice.</p>\r\n<p>(8)The training materials can be customised to meet the needs of your organisation.</p>\r\n<p>(9)State of the art facilities.</p>\r\n<p>(10)Flexible starting dates, including weekdays, weekends and evenings.</p>\r\n<p>(11)Flexible training locations, including central and greater London.</p>', 1),
(18, 'VISA', '11. Do I need a pre-assessment to enroll into a course?', '<p>(1)Most of the foundation courses do not require pre-assessment, however you should check pre-requirements section in the course description.</p>', 1),
(19, 'PROFESSIONAL REGISTRATION', '12. I cannot attend one or few sessions, what should I do?', '<p>(1)You should let us know as soon as possible. Some of our courses include the &ldquo;flexible mode&rdquo;, which allows you to attend the missed sessions within the following two months.</p>', 1),
(20, 'PROFESSIONAL REGISTRATION', '13 What is Skillogics?', '<p>Nothing this is institute.</p>', 1),
(21, 'PROFESSIONAL REGISTRATION', 'test question', '<p>test answer</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_old_08062020`
--

CREATE TABLE `faq_old_08062020` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `faq_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_old_08062020`
--

INSERT INTO `faq_old_08062020` (`id`, `question`, `answer`, `faq_status`) VALUES
(8, '1. Can you attend our premises for training?', '<p><strong></strong>(1)Yes. We can arrange it for sure.</p>', 1),
(9, '2. I do not have much time to attend the training sessions, what should I do?', '<p>(1)You can subscribe to our professional and self-descriptive training materials, where you can have access to a tutor and some workshops.</p>', 1),
(10, '3. Do I have online access to the course materials?', '<p>(1)Yes. You have access to all the course materials online.</p>', 1),
(11, '4. Do I have WiFi access?', '<p>(1)Yes. All our centres provide fast WiFi connection.</p>', 1),
(12, '5. How many students are in the classrooms?', '<p>(1)The maximum number of students is 8.</p>', 1),
(13, '6. Do I get the course materials?', '<p>(1)Yes. We provide professional training materials as hardcopy booklets and online accessed as well.</p>', 1),
(14, '7. Do I get certificate at the end of the course?', '<p>(1)Yes. You would get a certificate of attendance if you attend all the lessons. Some courses also offer certificate of achievement, where you will be qualified if you passed at least 70% of the assessments. Some of the courses such as Microsoft office are approved and accredited for CPD achievement.</p>', 1),
(15, '8. What is your teaching philosophy?', '<p>(1)We conduct active learning lessons, where you learn by doing things. We do also care about each student learning method and we try to bring variety of teaching methods to satisfy everyone.</p>', 1),
(16, '9. I know part of the syllabus of a course and I only like to learn the parts that I do not know, what do I do?', '<p>(1)Let us know the topics that you like to learn. We would then place you in the classes which are suitable for you. We could also do private training for you, as required.</p>', 1),
(17, '10. Why choose us?', '<p>(1)Here are just a few reasons why our customers say they keep coming back:</p>\r\n<p>(1)Easy and quick course booking.</p>\r\n<p>(2)Our industry experienced and passionate trainers help the students achieve their full potential.</p>\r\n<p>(3)Maximum of 6-8 students per session.</p>\r\n<p>(4)Up-to-date and relevant teaching materials.</p>\r\n<p>(5)Latest and most effective training techniques.</p>\r\n<p>(6)The training takes place in a relaxed and highly supportive learning environment.</p>\r\n<p>(7)Flexible training dates according to the student&rsquo;s choice.</p>\r\n<p>(8)The training materials can be customised to meet the needs of your organisation.</p>\r\n<p>(9)State of the art facilities.</p>\r\n<p>(10)Flexible starting dates, including weekdays, weekends and evenings.</p>\r\n<p>(11)Flexible training locations, including central and greater London.</p>', 1),
(18, '11. Do I need a pre-assessment to enroll into a course?', '<p>(1)Most of the foundation courses do not require pre-assessment, however you should check pre-requirements section in the course description.</p>', 1),
(19, '12. I cannot attend one or few sessions, what should I do?', '<p>(1)You should let us know as soon as possible. Some of our courses include the &ldquo;flexible mode&rdquo;, which allows you to attend the missed sessions within the following two months.</p>', 1),
(20, '13 What is Skillogics?', '<p>Nothing this is institute.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_image` varchar(255) DEFAULT NULL,
  `gallery_name` text NOT NULL,
  `gallery_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_image`, `gallery_name`, `gallery_status`, `date`) VALUES
(1, 'aboutus.jpg', 'Test', '1', '2016-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `generate_cirtificate`
--

CREATE TABLE `generate_cirtificate` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `status` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generate_cirtificate`
--

INSERT INTO `generate_cirtificate` (`id`, `std_id`, `course_id`, `issue_date`, `status`) VALUES
(1, 43, 2, '2018-10-20', 'Yes'),
(2, 43, 1, '2019-01-04', 'Yes'),
(3, 1, 1, '2019-01-16', 'Yes'),
(4, 1, 1, '2019-08-08', 'Yes'),
(5, 1, 1, '2019-08-08', 'Yes'),
(6, 1, 3, '2020-03-03', 'Yes'),
(7, 1, 3, '2020-04-07', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_schedule`
--

CREATE TABLE `instructor_schedule` (
  `id` int(11) NOT NULL,
  `schedule_title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `approved` enum('Yes','No') NOT NULL DEFAULT 'No',
  `approve_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_schedule`
--

INSERT INTO `instructor_schedule` (`id`, `schedule_title`, `start`, `end`, `instructor_id`, `approved`, `approve_date`) VALUES
(1, 'My batch', '2017-12-05 08:00:00', '2017-12-08 14:00:00', 28, 'Yes', ''),
(12, 'fytf', '2018-02-13 00:00:00', '2018-02-13 00:00:00', 29, 'Yes', ''),
(13, 'sadfsfsdf', '2018-01-11 00:00:00', '2018-01-11 00:00:00', 28, 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_time_table`
--

CREATE TABLE `instructor_time_table` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_time_table`
--

INSERT INTO `instructor_time_table` (`id`, `instructor_id`, `title`, `start_time`, `end_time`) VALUES
(1, 5, 'Math', '2017-11-21 13:30:00', '2017-11-21 17:30:00'),
(2, 5, 'PHP', '2017-11-22 03:00:00', '2017-11-22 06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level_title` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `level_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_title`, `posted_by`, `level_status`, `date`) VALUES
(1, 'Foundation', '0', '1', '2016-12-28'),
(2, 'Intermediate', '0', '1', '2016-12-28'),
(3, 'Advanced ', '0', '1', '2016-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` bigint(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `under18` enum('No','Yes') NOT NULL DEFAULT 'No',
  `guardian_name` varchar(255) NOT NULL,
  `guardian_telephone` varchar(255) NOT NULL,
  `guardian_address` text NOT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `user_type` enum('std','inst','busi') NOT NULL,
  `highest_qual` varchar(255) NOT NULL,
  `other_qual` varchar(255) NOT NULL,
  `speciality_subject` varchar(255) NOT NULL,
  `teaching_qual` varchar(255) NOT NULL,
  `exp` int(11) NOT NULL,
  `updated_dbs` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `business_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_position` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `add_date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `email`, `phoneno`, `password`, `gender`, `dob`, `address`, `under18`, `guardian_name`, `guardian_telephone`, `guardian_address`, `guardian_email`, `user_type`, `highest_qual`, `other_qual`, `speciality_subject`, `teaching_qual`, `exp`, `updated_dbs`, `cv`, `business_id`, `business_name`, `contact_name`, `contact_position`, `website`, `profile_image`, `add_date`, `status`) VALUES
(1, 'Amit', 'Roy', 'amit95@gmail.com', 9832145050, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', '1496734709ast3.jpg', '2017-04-28 12:37:17', '1'),
(2, 'James', 'Faulkner', 'jfaulkner@gmail.com', 9593416943, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', '1495103073news5.jpg', '2017-04-28 12:48:34', '1'),
(6, 'James', 'Gomes', 'james@gmail.com', 9854111145, 'e10adc3949ba59abbe56e057f20f883e', '', '', 'New calofornia', 'No', '', '', '', '', 'busi', '', '', '', '', 0, '', '', 0, 'Jamesh Tutorial', 'Jamesh Kolin', '', '', '15868551112.jpg', '2017-08-04 14:23:21', '1'),
(9, 'Sneha', 'Gomes', 'sneha@gmail.com', 9874777789, '8dd43ae0638e1ce2690e2e3cfa653923', 'female', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 6, '', '', '', '', NULL, '2017-08-31 13:58:46', '1'),
(10, 'Rajiv', 'Pathak', 'user@gmail.com', 985625488, 'e10adc3949ba59abbe56e057f20f883e', 'female', '22-05-1998', '111- Shanti Nagar Durgapur 713216', 'Yes', 'Mahesh Bhatt', '858282945', '19 n', 'bhatt@gmail.com', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', NULL, '2017-11-13 11:47:34', '1'),
(17, '', '', 'shukla@abccorporation.com', 9856236548, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', '111- new Town Durgapur', 'No', '', '', '', '', 'busi', '', '', '', '', 0, '', '', 0, 'ABC Corporation', 'Mahesh Shukla', 'Manager', 'www.abccorporation.com', NULL, '2017-11-14 09:45:49', '1'),
(19, 'Nihirika', 'Yadav', 'goigiwebtest@gmail.com', 9874569875, 'e10adc3949ba59abbe56e057f20f883e', 'female', '14-11-1995', '111- New colony Durgapur ', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', NULL, '2017-11-14 11:50:31', '1'),
(20, 'K', 'Kara', 'kara@hotmail.com', 633637357, '202cb962ac59075b964b07152d234b70', 'male', '08-10-1992', '20 London Raod', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', '1510701280passsport image.jpg', '2017-11-14 22:53:03', '1'),
(22, 'Raju', 'Khan', 'teamphp1@goigi.in', 9774561235, '827ccb0eea8a706c4c34a16891f84e7b', 'male', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 17, '', '', '', '', NULL, '2018-01-19 12:21:50', '1'),
(23, 'NIhirika', 'Jadav', 'testttt@gmail.com', 9874562585, 'e10adc3949ba59abbe56e057f20f883e', 'female', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 17, '', '', '', '', NULL, '2018-01-19 12:22:21', '1'),
(24, 'pradip', 'shah', 'test@gmail.com', 97845687643, 'e10adc3949ba59abbe56e057f20f883e', 'male', '05-02-2018', 'kolkata', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', '154658380451.jpg', '2018-02-05 09:45:47', '1'),
(26, '0', 'Tester', 'business@gmail.com', 9163034797, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', 'kolkata', 'No', '', '', '', '', 'busi', '0', '', '', '', 0, '', '', 0, 'ABCD', 'Kumar', 'Tester', 'www.test.com', '154658423258d38ef857bcf.jpg', '2018-02-07 10:23:44', '1'),
(27, 'pradip', 'kumar', 'test99@gmail.com', 9163034797, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 26, '', '', '', '', NULL, '2018-02-07 11:09:21', '1'),
(28, 'Nader', 'Golestani', 'abc@gmail.com', 9163034797, 'e10adc3949ba59abbe56e057f20f883e', 'male', '13-02-2018', 'INDIA', 'No', '', '', '', '', 'inst', 'phd', '', '', '', 1, '', '', 0, '', '', '', '', NULL, '2018-02-13 09:39:32', '1'),
(29, 'David', 'Castor', '123@gmail.com', 9163034797, '202cb962ac59075b964b07152d234b70', 'male', '13-11-2017', 'INDIA', 'No', '', '', '', '', 'inst', 'phd', '', '', '', 1, '', 'STERLING.docx', 0, '', '', '', '', NULL, '2018-02-13 09:57:22', '1'),
(31, 'New', 'User', 'instructor@gmail.com', 9874569856, 'e10adc3949ba59abbe56e057f20f883e', 'male', '06-09-1990', 'asdasd', 'No', '', '', '', '', 'inst', 'BE', '2', 'PHP', '2', 1, '2', '', 0, '', '', '', '', '1593611586IGLOBAL IMPACT LOGO.png', '2018-09-20 12:41:14', '1'),
(35, 'dcd', 'cdcd', 'edfew@gmail.com', 121321321, 'e10adc3949ba59abbe56e057f20f883e', 'male', '04-06-2019', '', 'No', '', '', '', '', 'inst', 'wfef', '', '', '', 1, '', '', 0, '', '', '', '', NULL, '2018-10-04 09:40:30', '1'),
(36, 'Student', 'Demo', 'qa3@goigi.co', 7845112784, '202cb962ac59075b964b07152d234b70', 'male', '10-10-2018', 'Durgapur', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', '1538800265download (2).jpg', '2018-10-06 04:13:43', '1'),
(37, 'Instructor', 'Demo', 'qa2@goigi.co', 7845122585, '202cb962ac59075b964b07152d234b70', 'male', '16-10-2018', 'Delhi ', 'No', '', '', '', '', 'inst', 'BE', 'Noo', 'PCM', 'BE', 2, 'Noo', 'eduhelpbugFixDocx.docx', 0, '', '', '', '', '1538802653delete18.jpg', '2018-10-06 04:15:25', '1'),
(38, '', '', 'qa1@goigi.co', 7845124578, '202cb962ac59075b964b07152d234b70', 'male', '', 'Durgapur', 'No', '', '', '', '', 'busi', '', '', '', '', 0, '', '', 0, 'Business', 'Demo', 'CEO', 'www//business.com/', '1538800333download (2).jpg', '2018-10-06 04:16:55', '1'),
(42, 'hr', 'trhtrht', 'bnhvb@gmail.com', 234535435435, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 38, '', '', '', '', NULL, '2018-10-06 04:42:35', '1'),
(43, 'Amit', 'Verma', 'amit@gmail.com', 7845124578, 'e10adc3949ba59abbe56e057f20f883e', 'male', '', '', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 38, '', '', '', '', NULL, '2018-10-06 04:47:55', '1'),
(44, 'Rakesh', 'Singh', 'igi4@goigi.in', 36936936963, '0c3dc1005b9f80409d3dfb581d83c21a', 'male', '16-11-1990', '11 Durgapur', 'No', '', '', '', '', 'std', '', '', '', '', 0, '', '', 0, '', '', '', '', NULL, '2018-10-13 09:07:54', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `mode_image` varchar(255) NOT NULL,
  `mode_title` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `mode_desc` text NOT NULL,
  `mode_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mode`
--

INSERT INTO `mode` (`id`, `mode_image`, `mode_title`, `posted_by`, `mode_desc`, `mode_status`, `date`) VALUES
(1, 'model-01.jpg', 'Campus', '0', '0', '1', '2016-12-28'),
(3, 'model-03.jpg', 'Private', '0', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard. dummy text ever</p>', '1', '2016-12-28'),
(4, 'model-04.jpg', 'Distance', '0', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard. dummy text ever</p>', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_title` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `news_link` varchar(255) NOT NULL,
  `news_desc` text NOT NULL,
  `news_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_image`, `news_title`, `posted_by`, `news_link`, `news_desc`, `news_status`, `date`) VALUES
(2, 'blog-img11.jpg', 'Our courses use the latest interactive technology', 'Admin', 'https://twitter.com/AcademyOES', '<p>&nbsp;vcgcsac</p>', '1', '2019-01-04'),
(3, 'nego.png', '24Hr/7 Days Support', 'Skillogics', 'http://localhost/skillogics/', '<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.</p>', '1', '2020-05-09'),
(4, '', 'education is every things', 'Skillogics', 'http://localhost/skillogics/', '<p>bjkba</p>', '1', '2020-05-26'),
(5, '', 'Nothing is impossible', 'Amir', 'http://localhost/skillogics/', '<p>Hello Testing By Employee</p>', '1', '2020-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `newslettermail`
--

CREATE TABLE `newslettermail` (
  `mail_id` int(11) NOT NULL,
  `mail_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `mail_address` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mail_date` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '0000-00-00',
  `reply_subject` text COLLATE latin1_general_ci NOT NULL,
  `reply_message` text COLLATE latin1_general_ci NOT NULL,
  `reply_status` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `reply_date` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `newslettermail`
--

INSERT INTO `newslettermail` (`mail_id`, `mail_name`, `mail_address`, `mail_date`, `reply_subject`, `reply_message`, `reply_status`, `reply_date`) VALUES
(36, '', 'kaushik6356@gmail.com', '22-10-2016 1:59:15 pm', '', '', 'No', ''),
(37, '', 'web010320162@goigi.asia', '27-10-2016 2:10:23 pm', '', '', 'No', ''),
(38, '', 'web1412152@goigi.asia', '28-10-2016 1:06:08 pm', 'er', ' erere', 'Yes', '06-10-2018 8:37:22 am');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `content_title` text NOT NULL,
  `content_sub_title` text NOT NULL,
  `content_details` text NOT NULL,
  `content_image` varchar(255) NOT NULL,
  `content_title_1` text NOT NULL,
  `content_sub_title_1` text NOT NULL,
  `content_details_1` text NOT NULL,
  `content_image_1` varchar(255) NOT NULL,
  `content_title_2` text NOT NULL,
  `content_sub_title_2` text NOT NULL,
  `content_details_2` text NOT NULL,
  `content_image_2` varchar(255) NOT NULL,
  `content_title_3` text NOT NULL,
  `content_sub_title_3` text NOT NULL,
  `content_details_3` text NOT NULL,
  `content_image_3` text NOT NULL,
  `content_title_4` text NOT NULL,
  `content_sub_title_4` text NOT NULL,
  `content_details_4` text NOT NULL,
  `content_image_4` text NOT NULL,
  `video_link` text NOT NULL,
  `video_link_1` text NOT NULL,
  `video_link_2` text NOT NULL,
  `video_link_3` text NOT NULL,
  `video_link_4` text NOT NULL,
  `read_more` varchar(255) NOT NULL,
  `read_more_1` varchar(255) NOT NULL,
  `read_more_2` varchar(255) NOT NULL,
  `read_more_3` varchar(255) NOT NULL,
  `read_more_4` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `page_title`, `content_title`, `content_sub_title`, `content_details`, `content_image`, `content_title_1`, `content_sub_title_1`, `content_details_1`, `content_image_1`, `content_title_2`, `content_sub_title_2`, `content_details_2`, `content_image_2`, `content_title_3`, `content_sub_title_3`, `content_details_3`, `content_image_3`, `content_title_4`, `content_sub_title_4`, `content_details_4`, `content_image_4`, `video_link`, `video_link_1`, `video_link_2`, `video_link_3`, `video_link_4`, `read_more`, `read_more_1`, `read_more_2`, `read_more_3`, `read_more_4`) VALUES
(1, 'Home', 'ABOUT SKILLOGICS', 'Highly experienced Instructors with industrial experience               Hands On Training methodology Do it: On-Campus OR Private OR Online SKILLOGICS and CPD Certificates Affordability', '<p>SKILLOGICS.com is&nbsp;a training centre founded in 2014 that helps anyone to learn business, software, technology and creative skills to achieve personal and professional goals. Through individual, corporate, academic and organizational subscriptions, members have access to our engaging, top-quality courses taught by our expert instructors having industry and training experience. Highly experienced Instructors with industrial experience Hands On Training methodology Do it: On-Campus OR Private OR Online. All courses offer SKILLOGICS or CPD Certificates at the end.</p>\n<p>&nbsp;</p>', 'About-skillogics.png', 'UPCOMING COURSES', '', '<p>The following courses are on our schedule to run. Courses are delivered on campus or online. You can view the description of the course. You can ask for combination of campus and online if you cannot make all campus sessions.</p>', '', 'OUR METHODS OF DELIVERY', 'Private (Face-TO-Face, Online) | Online (1-TO-Many)', '<ul>\n<li>On Campus</li>\n<li>Private One To One (Campus)</li>\n<li>Private One To One (Online)</li>\n<li>Online Group</li>\n<li>Blended (Online Plus CAmpus)</li>\n</ul>', '', 'ON-CAMPUS LEARNING', '', '<ul>\n<li>Small size classes</li>\n<li>hard / soft copy of learning materials</li>\n<li>Communications wfith the instructor between the classes</li>\n<li>Project bases / Applied Approach</li>\n<li>Hands on training</li>\n</ul>', '', 'CORPORATE TRAINING', '', '<ul>\n<li>Learning materioals are tailored to your business requirements</li>\n<li>Special offers to business clients</li>\n<li>our / Your Campus</li>\n<li>Book one to many employees to our courses</li>\n</ul>', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Courses', 'SEARCH COURSES', 'SEARCH COURSES', '<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.</p>', '', 'UPCOMING COURSES', 'UPCOMING COURSES', '                            Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.                            ', '', 'OTHER COURSES COMING SOON', 'OTHER COURSES COMING SOON', '                            Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.                            ', '', '0', '0', '0', '', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Private Tutor', 'HIRE A PRIVATE TUTOR FOR MINIMUM OF 2 HOURS', '', '<p>It can be in Campus or Online<br />Private Tutor is Ideal for busy people that cannot attend our Campus Courses</p>', '', 'SOME OF THE TOPICS', '', '<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Tellus urna,<br />lacinia a velit quis, efficitur posuere purus. Fusce velit augue,<br />feugiat eu eros vel, auctor hendrerit urna.</p>', '', 'HIRE A PRIVATE TUTOR:', '', '<p>rop us few lines about the course that you like,<br />and we would do the rest:</p>', '', 'OUR EXPERTS', '', '<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.</p>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Home / LEARNING', 'PRIVATE LEARNING', '', '<ul>\n<li>One To One on Campus OR Online</li>\n<li>Get 100% attention of the instructor&nbsp;</li>\n<li>Hard and soft copy of the materials</li>\n<li>Access to learning materials from Portal anywhere / Anytime</li>\n<li>Certificate at the end of the course</li>\n</ul>', 'private-learning.jpg', 'ONLINE LEARNING', '', '<ul>\n<li>One to One or Group</li>\n<li>We use Zoom, Microsoft Team, OpenMeetings, Skype</li>\n<li>all Soft andhard learning materials</li>\n<li>Homework and assessments</li>\n<li>Certificate at the end of the course</li>\n</ul>', 'online-learning.jpg', 'LATEST NEWS', '', '<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.</p>', '', '0', '0', '0', '', '0', '0', '0', '', '', '', '', '0', '0', '', '', '', '0', '0'),
(6, 'About', 'CORE VALUES', '', '<p>It is a long established fact that a reader will be distracted by the readable content of page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, opposed to using \'Content here, content here\', making it like readable english. desktop publishing packages and web page editors now use Lorem Ipsum as their default model and a search for \'lorem ipsum\' will uncover many many desktop publishing packages and web page web sites still in their infancy. many desktop publishing packages and web page editors now use lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many many desktop publishing packages and web web sites still in their infancy.</p>\n<ul>\n<li>What Is Page Formatting?</li>\n<li>Page Orientation and Paper Size</li>\n<li>Changing the Page Size</li>\n<li>Page Margins</li>\n<li>Inserting Page Breaks</li>\n<li>Deleting Page Breaks</li>\n<li>Use Page Breaks Rather Than Repeatedly Pressing the Return Key</li>\n<li>Headers and Footers</li>\n</ul>\n<p>&nbsp;</p>', 'About-skillogics.png', 'MISSION', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. the point of using lorem Ipsum is that it has a ipsum\' will uncover many web sites still in their infancy. many desktop publishing packages and web page editors now use lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many many desktop publishing the point of using lorem Ipsum is that it has a ipsum\' will uncover many web sites still in their infancy. many desktop publishing packages and web page editors now use lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many many desktop publishing packages...</p>', 'mission-img.png', 'VISION', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. the point of using lorem Ipsum is that it has a ipsum\' will uncover many web sites still in their infancy. many desktop publishing packages and web page editors now use lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many many desktop publishing the point of using lorem Ipsum is that it has a ipsum\' will uncover many web sites still in their infancy.</p>', 'laptop.png', 'WHO WE ARE?', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. the point of using lorem Ipsum is that it has a ipsum\' will uncover many web sites still in their infancy. many desktop publishing packages and web page editors now use lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many...</p>', 'who-we-img.jpg', 'OUR TEAM', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. the point of using lorem Ipsum is that it has a ipsum\' will uncover many web sites still in their infancy.</p>', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Private Tutor / OUR EXPERTS', 'HELP WITH HOMEWORK', '', '<p>Donec hendrerit lacus non urna dictum bibendum. Fusce tristique dui vel tempor blandit. Ut ac eros tincidunt, vulputate justo non, ultricies libero.</p>', 'homework.png', 'HELP WITH PROJECT', '', '<p>Donec hendrerit lacus non urna dictum bibendum. Fusce tristique dui vel tempor blandit. Ut ac eros tincidunt, vulputate justo non, ultricies libero.</p>', 'help-project.png', 'HELP WITH SOME TASKS AT WORK', '', '<p>Donec hendrerit lacus non urna dictum bibendum. Fusce tristique dui vel tempor blandit. Ut ac eros tincidunt, vulputate justo non, ultricies libero.</p>', 'some-task.png', '0', '0', '0', '', '0', '0', '0', '', '', '', '', '0', '0', '', '', '', '0', '0'),
(7, 'Services', 'Our Services', '', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue.</p>', 'About-skillogics.png', 'Skillogics Services', '', '<div class=\"title-center\">\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n</div>', 'mission-img.png', 'Our Training', '', '<div class=\"row\">\n<div class=\"col-sm-12\">\n<div class=\"title-center\">\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.</p>\n</div>\n</div>\n</div>', 'laptop.png', 'Our Instructors', '', '<div class=\"row\">\n<div class=\"col-sm-12\">\n<div class=\"title-center\">\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>\n</div>\n</div>\n</div>', 'who-we-img.jpg', 'Hire Our Experts', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Corporate Training', 'SAMPLE COURSES', '', '<div class=\"title-center\">\n<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.</p>\n</div>', 'services-staff-circle-image.png', 'REGISTER AS BUSINESS', '', '<div class=\"title-center\">\n<div class=\"row\">\n<div class=\"col-sm-12\">\n<div class=\"title-center\">\n<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce velit augue, feugiat eu eros vel, auctor hendrerit urna.</p>\n</div>\n</div>\n</div>\n</div>', 'services-some-of-the.png', 'GET IN TOUCH', '', '<div class=\"row\">\n<div class=\"col-sm-12\">\n<div class=\"title-center\">\n<div class=\"title-center\">\n<p>Curabitur ac sapien eget metus tempor gravida quis quis nunc. Maecenas tellus urna, lacinia a velit quis, efficitur posuere purus. Fusce augue hendrerit urna.</p>\n</div>\n</div>\n</div>\n</div>', 'services-our-expert.png', '0', '0', '0', 'services-get-in-img.jpg', '0', '0', '0', '', '', '', '', '0', '0', '', '', '', '0', '0'),
(9, 'Vacancies', 'IEC Vacancies', '', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>', 'Vacancies-business-developr-01.png', 'Business developer UAE', '', '<div class=\"title-center\">\n<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure...</p>\n<ul>\n<li>Fluent in English and Arabic</li>\n<li>Experience with education sector</li>\n<li>Experience in digital marketing</li>\n<li>Fluent working with computers, mobile and aps</li>\n<li>Good communication skills</li>\n<li>Good leadership and management skills</li>\n<li>Good knowledge about UAE education systems and educational institutes</li>\n<li>Relevant knowledge about education systems in Europe and North America</li>\n</ul>\n</div>', 'Vacancies-education-consulting.png', 'Education Consultant in Iran', '', '<div class=\"row\">\n<div class=\"col-sm-12\">\n<div class=\"title-center\">\n<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder encounter consequences that are extremely painful.</p>\n<ul>\n<li>Fluent in Farsi and English</li>\n<li>Good communication skills</li>\n<li>Fluent working with computers, mobile and aps</li>\n<li>Good knowledge about education system and education institutes in Iran</li>\n<li>Experience in social networking</li>\n<li>Good management skills</li>\n<li>Desire to learn new skills</li>\n</ul>\n</div>\n</div>\n</div>', 'Vacancies-visa-advisor.jpg', 'Visa Advisor', '', '<div class=\"row\">\n<div class=\"col-sm-12\">\n<div class=\"title-center\">\n<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account.</p>\n<p>Of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>\n<ul>\n<li>Fluent in English</li>\n<li>Good communication skills</li>\n<li>Good knowledge of Visa requirements for the countries that we send students to</li>\n<li>Good working knowledge of computers, mobiles and aps</li>\n</ul>\n</div>\n</div>\n</div>', 'Vacancies-educational-contst.jpg', 'Education Consultant in Ukraine or Russia', '', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself...</p>\n<ul>\n<li>Fluent in English and Russian</li>\n<li>Good communication skills</li>\n<li>Good working with computers, mobiles and aps</li>\n<li>Experience in social networking</li>\n<li>Good management skills</li>\n<li>Good knowledge about education system and education institutes in Ukraine and Russia</li>\n<li>Desire to learn new skills</li>\n</ul>', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `partners_img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partners_img`, `status`) VALUES
(2, 'our-partners-1.png', '1'),
(3, 'our-partners-2.png', '1'),
(4, 'our-partners-3.png', '1'),
(5, 'ose-logo.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `pay_status` enum('paid','unpaid') NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `transaction_id`, `transaction_date`, `pay_status`, `member_id`, `status`) VALUES
(1, '1', '0000-00-00 00:00:00', 'unpaid', '0', '0'),
(2, '1', '0000-00-00 00:00:00', 'unpaid', 'amit95@gmail.com', '0'),
(3, 'OESPAYw2XNz4Qzz3F426-05-2017', '2017-05-26 10:41:38', 'unpaid', '0', '0'),
(4, 'OESPAYH5AXbW5k2Suq26-05-2017', '2017-05-26 14:32:36', 'unpaid', 'amit95@gmail.com', '0'),
(5, 'OESPAYxI1zbBTv6cE808-08-2017', '2017-08-08 14:38:41', 'unpaid', '0', '0'),
(6, 'OESPAYzbWK5kogCoD925-09-2017', '2017-09-25 07:42:19', 'unpaid', 'amit95@gmail.com', '0'),
(7, 'OESPAYpE60OCbv77vS26-09-2017', '2017-09-26 14:12:37', 'unpaid', 'azar@gmail.com', '0'),
(8, 'OESPAYSgpFR9pV0xgc02-10-2017', '2017-10-02 14:22:24', 'unpaid', 'amit95@gmail.com', '0'),
(9, 'OESPAYmVbZtTEQyI0g07-11-2017', '2017-11-07 09:53:49', 'unpaid', 'azar@gmail.com', '0'),
(10, 'OESPAYQ4hIZEMrwZLb07-11-2017', '2017-11-07 10:21:05', 'unpaid', 'azar@gmail.com', '0'),
(11, 'OESPAYDq5Rpw7fDWl307-11-2017', '2017-11-07 11:43:35', 'unpaid', 'azar@gmail.com', '0'),
(12, 'OESPAYjUpVMVA6TfxA20-11-2017', '2017-11-20 07:29:43', 'unpaid', 'amit95@gmail.com', '0'),
(13, 'OESPAYIULMKZbzibx127-11-2017', '2017-11-27 09:55:28', 'unpaid', '0', '0'),
(14, 'OESPAYkHcniAjLg4Qn19-01-2018', '2018-01-19 12:23:45', 'unpaid', 'khan@gmail.com', '0'),
(15, 'OESPAYIpV5XaCX27IQ19-01-2018', '2018-01-19 12:27:37', 'unpaid', 'khan@gmail.com', '0'),
(16, 'OESPAYBl3ubccUf1fg22-01-2018', '2018-01-22 10:22:53', 'unpaid', 'khan@gmail.com', '0'),
(17, 'OESPAYBl3ubccUf1fg22-01-2018', '2018-01-22 10:22:53', 'unpaid', 'testttt@gmail.com', '0'),
(18, 'OESPAYE44PBrgdNcSB23-01-2018', '2018-01-23 12:27:53', 'unpaid', 'user@gmail.com', '0'),
(19, 'OESPAYb7SSWpQWfPxC24-01-2018', '2018-01-24 09:23:02', 'unpaid', 'user@gmail.com', '0'),
(20, 'OESPAY96qdOgqdXUE326-01-2018', '2018-01-26 10:54:58', 'paid', 'khan@gmail.com', '0'),
(21, 'OESPAYOAfCd5zCMXTz26-01-2018', '2018-01-26 11:02:26', 'unpaid', '0', '0'),
(22, 'OESPAYJgzlAY77eTxe26-01-2018', '2018-01-26 11:02:50', 'unpaid', '0', '0'),
(23, 'OESPAYyjU6gLY5NVD926-01-2018', '2018-01-26 11:05:41', 'unpaid', 'user@gmail.com', '0'),
(24, 'OESPAYPm9DQKVUO4IX31-01-2018', '2018-01-31 13:25:59', 'unpaid', 'user@gmail.com', '0'),
(25, 'OESPAYOvKjOG6ooMV705-02-2018', '2018-02-05 09:56:28', 'unpaid', 'test@gmail.com', '0'),
(26, 'OESPAYFV1tm9YRfUJP05-02-2018', '2018-02-05 11:19:49', 'unpaid', 'test@gmail.com', '0'),
(27, 'OESPAYAid9kebbvhtp05-02-2018', '2018-02-05 12:17:54', 'unpaid', 'test@gmail.com', '0'),
(28, 'OESPAY6KbunfuMO5j406-02-2018', '2018-02-06 09:52:43', 'unpaid', 'test@gmail.com', '0'),
(29, 'OESPAY5EJqwHVs6kZM06-02-2018', '2018-02-06 10:18:26', 'unpaid', 'test@gmail.com', '0'),
(30, 'OESPAYK1KsXjFgchdy06-02-2018', '2018-02-06 12:07:30', 'unpaid', 'test01@gmail.com', '0'),
(31, 'OESPAYGhwexwpZSwQh07-02-2018', '2018-02-07 11:09:42', 'paid', 'test99@gmail.com', '0'),
(32, 'OESPAYjyi0RpHriAlJ07-02-2018', '2018-02-07 11:40:13', 'unpaid', 'user@gmail.com', '0'),
(33, 'OESPAYPWJDDAT8gDJ207-02-2018', '2018-02-07 12:02:55', 'paid', 'test123@gmail.com', '0'),
(34, 'OESPAYZKmDPqqOsrMb29-03-2018', '2018-03-29 10:04:43', 'unpaid', 'test@gmail.com', '0'),
(35, 'OESPAY3bgdUQ1iSxSW29-03-2018', '2018-03-29 10:08:51', 'unpaid', '123@gmail.com', '0'),
(36, 'OESPAYoMnFnQoCExlG29-03-2018', '2018-03-29 10:14:39', 'unpaid', '123@gmail.com', '0'),
(37, 'OESPAYkvK4stOv6f6e29-03-2018', '2018-03-29 10:18:08', 'unpaid', '123@gmail.com', '0'),
(38, 'OESPAYfUb9Yb01xTUt29-03-2018', '2018-03-29 10:19:59', 'unpaid', '123@gmail.com', '0'),
(39, 'OESPAYBMP3sR6Mvrm529-03-2018', '2018-03-29 10:23:33', 'unpaid', '123@gmail.com', '0'),
(40, 'OESPAYgOsKkkc6lIi229-03-2018', '2018-03-29 10:24:12', 'unpaid', '123@gmail.com', '0'),
(41, 'OESPAY6Nu5g0VQ8W6z29-03-2018', '2018-03-29 10:27:36', 'unpaid', 'test@gmail.com', '0'),
(42, 'OESPAYsxhSRzyrelSI29-03-2018', '2018-03-29 10:38:03', 'paid', 'khan@gmail.com', '0'),
(43, 'OESPAYsxhSRzyrelSI29-03-2018', '2018-03-29 10:38:05', 'paid', 'testttt@gmail.com', '0'),
(44, 'OESPAY6ZQ2FIi570pf19-04-2018', '2018-04-19 10:18:15', 'unpaid', 'test@gmail.com', '0'),
(45, 'OESPAYC8SEzt5oYjtM19-04-2018', '2018-04-19 12:03:05', 'unpaid', 'test@gmail.com', '0'),
(46, 'OESPAY5LyIs6J561Aq19-04-2018', '2018-04-19 12:10:08', 'unpaid', 'test@gmail.com', '0'),
(47, 'OESPAYjkb3SrDJYreT01-05-2018', '2018-05-01 09:08:40', 'unpaid', 'test@gmail.com', '0'),
(48, 'OESPAYIednjnd77gyy06-10-2018', '2018-10-06 04:52:19', 'paid', 'bnhvb@gmail.com', '0'),
(49, 'OESPAYNtYLXPPYIKos06-10-2018', '2018-10-06 04:52:48', 'paid', 'bnhvb@gmail.com', '0'),
(50, 'OESPAYNtYLXPPYIKos06-10-2018', '2018-10-06 04:52:49', 'paid', 'amit@gmail.com', '0'),
(51, 'OESPAYjdMiv3XDuFNZ06-10-2018', '2018-10-06 05:50:47', 'unpaid', 'qa3@goigi.co', '0'),
(52, 'OESPAYvvcCeax2N7qX06-10-2018', '2018-10-06 05:51:26', 'unpaid', 'qa3@goigi.co', '0'),
(53, 'OESPAYYppPTT5gjIPx13-08-2019', '2019-08-13 19:24:15', 'unpaid', 'jfaulkner@gmail.com', '0'),
(54, 'OESPAYJUid4YHLlysd13-08-2019', '2019-08-13 19:25:17', 'unpaid', 'jfaulkner@gmail.com', '0'),
(55, 'OESPAYYVSr7XCy6NiF13-08-2019', '2019-08-13 19:25:37', 'unpaid', 'jfaulkner@gmail.com', '0'),
(56, 'OESPAYPTGIpSfXuV6E18-03-2020', '2020-03-18 12:41:11', 'unpaid', 'amit95@gmail.com', '0'),
(57, 'OESPAY4tsWQitVfwTb18-03-2020', '2020-03-18 13:35:49', 'unpaid', 'amit95@gmail.com', '0'),
(58, 'OESPAYmaTM9v1bXU0718-03-2020', '2020-03-18 13:36:25', 'unpaid', 'amit95@gmail.com', '0'),
(59, 'OESPAYvVyXBbOcFq8g18-03-2020', '2020-03-18 13:41:21', 'unpaid', 'amit95@gmail.com', '0'),
(60, 'OESPAYdIwVPMUKoXVr18-03-2020', '2020-03-18 13:43:55', 'unpaid', 'amit95@gmail.com', '0'),
(61, 'OESPAYhA3GFyDoEoNz18-03-2020', '2020-03-18 13:47:36', 'unpaid', 'amit95@gmail.com', '0'),
(62, 'OESPAYuW9fNnwUUi1Q25-03-2020', '2020-03-25 12:10:14', 'unpaid', 'amit95@gmail.com', '0'),
(63, 'OESPAY1JPWWrJp3aCs03-04-2020', '2020-04-03 06:58:16', 'unpaid', 'amit95@gmail.com', '0'),
(64, 'OESPAYPydRlxs8f7X103-04-2020', '2020-04-03 07:16:28', 'unpaid', 'amit95@gmail.com', '0'),
(65, 'OESPAYroYBk5gf1iYf03-04-2020', '2020-04-03 10:45:43', 'unpaid', 'amit95@gmail.com', '0'),
(66, 'OESPAYNq6UyW33kJW813-04-2020', '2020-04-13 12:18:50', 'unpaid', 'amit95@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `private_learning`
--

CREATE TABLE `private_learning` (
  `private_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `price_per_hr` int(11) NOT NULL,
  `price_whole_course` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `private_learning`
--

INSERT INTO `private_learning` (`private_id`, `course_id`, `price_per_hr`, `price_whole_course`, `add_date`, `status`) VALUES
(1, 1, 30, 250, '2018-04-20 07:49:07', '1'),
(2, 5, 234, 34, '2018-10-06 07:24:27', '1'),
(3, 1, 50, 150, '2019-11-04 22:06:39', '1'),
(4, 2, 50, 450, '2019-11-04 22:13:56', '1'),
(5, 3, 50, 450, '2019-11-04 22:21:48', '1'),
(6, 4, 50, 450, '2019-11-04 22:34:50', '1'),
(7, 5, 50, 150, '2019-11-04 22:38:57', '1'),
(8, 7, 50, 150, '2019-11-04 23:06:44', '1'),
(9, 8, 50, 150, '2019-11-04 23:09:50', '1'),
(10, 9, 50, 150, '2019-11-04 23:13:05', '1'),
(11, 10, 50, 500, '2020-03-18 13:41:07', '1'),
(12, 14, 25, 250, '2020-04-13 07:36:15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `googleplus_link` text NOT NULL,
  `linkedin_link` text NOT NULL,
  `pinterest_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `map` text NOT NULL,
  `per_hour_price` int(11) NOT NULL,
  `per_hour_classroom` int(11) NOT NULL,
  `per_hour_flexibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `facebook_link`, `twitter_link`, `youtube_link`, `googleplus_link`, `linkedin_link`, `pinterest_link`, `instagram_link`, `email`, `phone`, `address`, `map`, `per_hour_price`, `per_hour_classroom`, `per_hour_flexibility`) VALUES
(1, 'https://www.facebook.com/OES-Academy-1135042536513868/', 'https://twitter.com/AcademyOES', 'https://www.youtube.com/', 'https://plus.google.com/u/1/b/107019157717380058496/107019157717380058496', 'https://www.linkedin.com/company/phi-life-sciences', 'https://www.pinterest.com/oesacademy/', 'https://www.instagram.com/oesacademy/', 'info@skillogics.co.uk', '020 7096 1212', 'The Centre, Farnham Road, Slough, SL1 4UT', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.5269079019745!2d-79.94876848520258!3d32.80480128096356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a5ec7d733e7%3A0xc777838490540cb9!2s645+Meeting+St+%233%2C+Charleston%2C+SC+29403!5e0!3m2!1sen!2sus!4v1484300660477\" width=\"600\" height=\"350\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 50, 30, 20);

-- --------------------------------------------------------

--
-- Table structure for table `shift_time`
--

CREATE TABLE `shift_time` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` text NOT NULL,
  `shift` enum('Morning','Noon','Evening') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_time`
--

INSERT INTO `shift_time` (`id`, `course_id`, `start_time`, `end_time`, `day`, `shift`) VALUES
(1, 13, '17:00:00', '20:00:00', 'Friday', 'Evening'),
(2, 14, '14:00:00', '17:00:00', 'Monday', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabus_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `syllabus_name` varchar(255) NOT NULL,
  `syllabus_content` blob NOT NULL,
  `s_order` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `course_id`, `syllabus_name`, `syllabus_content`, `s_order`, `status`) VALUES
(1, 3, 'Basic Fundamentals for Beginners', 0x3c756c20636c6173733d226c697374223e0a3c6c693e0a3c703e4f626a656374266e6273703b266d696e75733b204f626a6563747320686176652073746174657320616e64206265686176696f72732e204578616d706c653a204120646f672068617320737461746573202d20636f6c6f722c206e616d652c2062726565642061732077656c6c206173206265686176696f7220737563682061732077616767696e67207468656972207461696c2c206261726b696e672c20656174696e672e20416e206f626a65637420697320616e20696e7374616e6365206f66206120636c6173732e3c2f703e0a3c2f6c693e0a3c6c693e0a3c703e436c617373266e6273703b266d696e75733b204120636c6173732063616e20626520646566696e656420617320612074656d706c6174652f626c75657072696e7420746861742064657363726962657320746865206265686176696f722f7374617465207468617420746865206f626a656374206f6620697473207479706520737570706f7274732e3c2f703e0a3c2f6c693e0a3c6c693e0a3c703e4d6574686f6473266e6273703b266d696e75733b2041206d6574686f64206973206261736963616c6c792061206265686176696f722e204120636c6173732063616e20636f6e7461696e206d616e79206d6574686f64732e20497420697320696e206d6574686f647320776865726520746865206c6f6769637320617265207772697474656e2c2064617461206973206d616e6970756c6174656420616e6420616c6c2074686520616374696f6e73206172652065786563757465642e3c2f703e0a3c2f6c693e0a3c2f756c3e, 1, '1'),
(2, 5, 'PHP Full Stack Developer Bootcamp', 0x3c64697620636c6173733d22726f77223e0a3c64697620636c6173733d22636f6c2d6c672d3132223e453a204578616d20496e636c756465642e3c2f6469763e0a3c2f6469763e0a3c64697620636c6173733d22726f77223e0a3c64697620636c6173733d22636f6c2d6c672d3132223e2a266e6273703b507269636573206170706c696361626c65206f6e6c7920666f7220496e6469616e207265736964656e74732077697468207265736964656e63792070726f6f662e2031382520475354206164646974696f6e616c2e3c2f6469763e0a3c2f6469763e, 1, '1'),
(3, 5, 'PHP Developer', 0x3c64697620636c6173733d22726f77223e0a3c64697620636c6173733d22636f6c2d6c672d3132223e453a204578616d20496e636c756465642e3c2f6469763e0a3c2f6469763e0a3c64697620636c6173733d22726f77223e0a3c64697620636c6173733d22636f6c2d6c672d3132223e2a266e6273703b507269636573206170706c696361626c65206f6e6c7920666f7220496e6469616e207265736964656e74732077697468207265736964656e63792070726f6f662e2031382520475354206164646974696f6e616c2e3c2f6469763e0a3c2f6469763e, 2, '1'),
(4, 5, 'Laravel PHP Framework', 0x3c6469763e51313c656d3e266e6273703b53617920736f6d657468696e672061626f75742074686520547261696e65723f3c2f656d3e266e6273703b51323c656d3e266e6273703b486f77206973204b6f656e696720646966666572656e742066726f6d206f7468657220747261696e696e6720436f6d70616e6965733f3c2f656d3e266e6273703b51333c656d3e266e6273703b57696c6c20796f7520636f6d65206261636b20746f204b6f656e696720666f7220747261696e696e67203f3c2f656d3e3c2f6469763e0a3c703e3c656d3e266e6273703b3c2f656d3e3c2f703e, 3, '1'),
(5, 1, 'The Microsoft Word 2016 Screen', 0x3c756c3e0a3c6c693e57686174204973205465787420466f726d617474696e673f3c2f6c693e0a3c6c693e466f6e7420547970653c2f6c693e0a3c6c693e466f6e742053697a653c2f6c693e0a3c6c693e446563726561736520616e6420496e63726561736520466f6e742053697a652049636f6e733c2f6c693e0a3c6c693e466f6e742053697a65204b6579626f6172642053686f72746375743c2f6c693e0a3c6c693e426f6c642c204974616c696320616e6420556e6465726c696e653c2f6c693e0a3c6c693e53756273637269707420616e642053757065727363726970743c2f6c693e0a3c6c693e43617365204368616e67696e673c2f6c693e0a3c6c693e486967686c69676874696e673c2f6c693e0a3c6c693e466f6e7420436f6c6f75723c2f6c693e0a3c6c693e436f7079696e67205465787420466f726d617474696e673c2f6c693e0a3c6c693e52656d6f76696e6720466f726d617474696e673c2f6c693e0a3c6c693e5573696e67205a6f6f6d3c2f6c693e0a3c6c693e496e73657274696e67205370656369616c204368617261637465727320616e642053796d626f6c733c2f6c693e0a3c2f756c3e, 1, '1'),
(6, 1, 'EFR', 0x3c703e57454646573c2f703e, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `mem_id` int(11) NOT NULL,
  `mem_name` text NOT NULL,
  `mem_description` text NOT NULL,
  `mem_desig` text NOT NULL,
  `mem_phone` bigint(25) NOT NULL,
  `mem_email` text NOT NULL,
  `mem_image` text NOT NULL,
  `mem_fblink` text,
  `mem_twlink` text,
  `mem_lilink` text,
  `mem_instalink` text,
  `mem_gpluslink` text,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`mem_id`, `mem_name`, `mem_description`, `mem_desig`, `mem_phone`, `mem_email`, `mem_image`, `mem_fblink`, `mem_twlink`, `mem_lilink`, `mem_instalink`, `mem_gpluslink`, `status`, `add_date`) VALUES
(1, 'SASH KURGAN', '', 'HEAD', 9632587410, 'ak@gmail.com', 'sash-kurgan.jpg', '', '', '', '', '', '1', '2020-06-16 09:57:55'),
(2, 'ITAMAR LEVY', '', 'HEAD', 74102589630, 'akv@gmail.com', 'itamar.jpg', '', '', '', '', '', '0', '2020-06-16 10:04:31'),
(3, 'SASH KURGAN', '', 'HEAD', 7412589630, ' vhg@gmail.com', 'sash-kurgan-1.jpg', '', '', '', '', '', '0', '2020-06-16 10:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `posted_by` text NOT NULL,
  `testimonial_desc` text NOT NULL,
  `testimonial_image` varchar(255) NOT NULL,
  `testimonial_title` text NOT NULL,
  `testimonial_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `posted_by`, `testimonial_desc`, `testimonial_image`, `testimonial_title`, `testimonial_status`, `date`) VALUES
(13, 'The Administrator', '<p>Mr. Hurst is an entrepreneur that has driven R&amp;D, go-to-market, and reimbursement strategies for biopharmaceutical, genomic, and molecular diagnostic products.&nbsp; He has played an active role in the molecular testing industry focusing on oncology</p>', 'sawanhurst.jpg', 'SHAWN HURST', '1', '2017-01-20'),
(14, 'BILL BARFIELD', '<p>Born in Augusta, Georgia and lived in Aiken County during early years. Mr. Barfield served four years in the U.S. Air Force. Bill has a Bachelor of Science in Business Economics and Masters in Business.</p>', 'nopicforteam.jpg', 'BILL BARFIELD', '1', '2017-01-20'),
(15, 'Zeke Quezada', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry</p>', 'Chrysanthemum.jpg', 'Director', '1', '2017-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `timeline_heading` varchar(255) NOT NULL,
  `timeline_sub_heading` varchar(255) NOT NULL,
  `timeline_description` blob NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `timeline_heading`, `timeline_sub_heading`, `timeline_description`, `status`) VALUES
(2, 'Skillogics', '2008', 0x3c703e5468652069646561206f66204f4553266e6273703b686173206265656e20646576656c6f7065643c2f703e, '1'),
(6, 'OES', '2014', 0x3c703e4f455320686173206265656e20666f756e6465643c2f703e, '1'),
(7, 'OES', '2015', 0x3c703e652d4c415420646576656c6f706d656e742068617320737461727465643c2f703e, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `ContactId` int(11) NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `last_name` text NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `ReplyMessage` text NOT NULL,
  `ReplyStatus` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ReplyDate` datetime NOT NULL,
  `ContactDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`ContactId`, `ContactName`, `last_name`, `Subject`, `Phone`, `Email`, `Message`, `ReplyMessage`, `ReplyStatus`, `ReplyDate`, `ContactDate`) VALUES
(69, 'Amir', '', 'Enquery', 2147483647, 'amir@gmail.com', 'ghjk', '', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `information_id` int(11) NOT NULL,
  `information_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `patient` varchar(255) NOT NULL,
  `investor` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `ReplyMessage` longtext NOT NULL,
  `ReplyStatus` enum('Yes','No') NOT NULL,
  `ReplyDate` datetime NOT NULL,
  `information_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`information_id`, `information_name`, `address`, `phone`, `email`, `doctor`, `patient`, `investor`, `request_type`, `message`, `ReplyMessage`, `ReplyStatus`, `ReplyDate`, `information_date`) VALUES
(2, 'Barry Allen', 'Central City', '9874563210', 'flash@gmail.com', 'Oncology', 'Oncology', 'Eobard Thwane', 'laboratory services', 'Test Request', '', 'Yes', '0000-00-00 00:00:00', '2017-01-13 09:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `admin_mail`
--
ALTER TABLE `admin_mail`
  ADD PRIMARY KEY (`MailId`);

--
-- Indexes for table `announsement`
--
ALTER TABLE `announsement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchId`);

--
-- Indexes for table `batchlocation`
--
ALTER TABLE `batchlocation`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `batch_sessions`
--
ALTER TABLE `batch_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_corp_stu`
--
ALTER TABLE `cms_corp_stu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details_country_wise`
--
ALTER TABLE `contact_details_country_wise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `countrys`
--
ALTER TABLE `countrys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_13032020`
--
ALTER TABLE `course_13032020`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_backup24072020`
--
ALTER TABLE `course_backup24072020`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_booking`
--
ALTER TABLE `course_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `course_end_date`
--
ALTER TABLE `course_end_date`
  ADD PRIMARY KEY (`end_date_id`);

--
-- Indexes for table `course_feedback`
--
ALTER TABLE `course_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `course_lesion`
--
ALTER TABLE `course_lesion`
  ADD PRIMARY KEY (`lession_id`);

--
-- Indexes for table `course_location`
--
ALTER TABLE `course_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `course_new`
--
ALTER TABLE `course_new`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_query`
--
ALTER TABLE `course_query`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `course_sessions`
--
ALTER TABLE `course_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_start_date`
--
ALTER TABLE `course_start_date`
  ADD PRIMARY KEY (`start_date_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distance_learning`
--
ALTER TABLE `distance_learning`
  ADD PRIMARY KEY (`diatance_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_old_08062020`
--
ALTER TABLE `faq_old_08062020`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generate_cirtificate`
--
ALTER TABLE `generate_cirtificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_schedule`
--
ALTER TABLE `instructor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_time_table`
--
ALTER TABLE `instructor_time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslettermail`
--
ALTER TABLE `newslettermail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `private_learning`
--
ALTER TABLE `private_learning`
  ADD PRIMARY KEY (`private_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_time`
--
ALTER TABLE `shift_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabus_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`information_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_detail`
--
ALTER TABLE `admin_detail`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_mail`
--
ALTER TABLE `admin_mail`
  MODIFY `MailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announsement`
--
ALTER TABLE `announsement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batchlocation`
--
ALTER TABLE `batchlocation`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batch_sessions`
--
ALTER TABLE `batch_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_corp_stu`
--
ALTER TABLE `cms_corp_stu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_details_country_wise`
--
ALTER TABLE `contact_details_country_wise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `countrys`
--
ALTER TABLE `countrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_13032020`
--
ALTER TABLE `course_13032020`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_backup24072020`
--
ALTER TABLE `course_backup24072020`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_booking`
--
ALTER TABLE `course_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_end_date`
--
ALTER TABLE `course_end_date`
  MODIFY `end_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_feedback`
--
ALTER TABLE `course_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_instructor`
--
ALTER TABLE `course_instructor`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_lesion`
--
ALTER TABLE `course_lesion`
  MODIFY `lession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_location`
--
ALTER TABLE `course_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_new`
--
ALTER TABLE `course_new`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_query`
--
ALTER TABLE `course_query`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_sessions`
--
ALTER TABLE `course_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_start_date`
--
ALTER TABLE `course_start_date`
  MODIFY `start_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distance_learning`
--
ALTER TABLE `distance_learning`
  MODIFY `diatance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `faq_old_08062020`
--
ALTER TABLE `faq_old_08062020`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generate_cirtificate`
--
ALTER TABLE `generate_cirtificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instructor_schedule`
--
ALTER TABLE `instructor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `instructor_time_table`
--
ALTER TABLE `instructor_time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newslettermail`
--
ALTER TABLE `newslettermail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `private_learning`
--
ALTER TABLE `private_learning`
  MODIFY `private_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shift_time`
--
ALTER TABLE `shift_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
