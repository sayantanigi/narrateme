-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 05:14 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `narrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bl_banner`
--

CREATE TABLE IF NOT EXISTS `bl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bl_banner`
--

INSERT INTO `bl_banner` (`id`, `title`, `subtitle`, `description`, `banner_image`, `status`) VALUES
(1, 'ddfg', 'dfgdfg', '<p>dfgdfg</p>', 'Chrysanthemum.jpg', 1),
(2, 'dddd', 'dfgdfg', '<p>sdfsdf</p>', 'Penguins.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) DEFAULT NULL,
  `emp_name` varchar(100) NOT NULL DEFAULT '',
  `birthday` datetime DEFAULT '0000-00-00 00:00:00',
  `gender` enum('Male','Female') DEFAULT NULL,
  `marital_status` enum('Married','Single','Divorced','Widowed','Other') DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `home_phone` varchar(50) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `work_email` varchar(100) DEFAULT NULL,
  `private_email` varchar(100) DEFAULT NULL,
  `joined_date` datetime DEFAULT '0000-00-00 00:00:00',
  `confirmation_date` datetime DEFAULT '0000-00-00 00:00:00',
  `department` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `na_academic_transcript`
--

CREATE TABLE IF NOT EXISTS `na_academic_transcript` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `grades` varchar(255) NOT NULL,
  `notes` longtext NOT NULL,
  `comments` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `na_academic_transcript`
--

INSERT INTO `na_academic_transcript` (`id`, `ind_id`, `grades`, `notes`, `comments`, `messages`, `phone`, `email`, `ipaddress`, `website`, `domain_name`, `url`, `learning_portal`, `academic_program`, `course`, `curriculum`, `syllabus`, `status`) VALUES
(19, 1, 'A+', 'test notes', 'test comment', 'test message', 0, '', '', '', '', '', '', '', '', '', '', 1),
(20, 1, 'B+', 'hi ', 'hi  john', 'hi  john john', 0, '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_accepted_substitute`
--

CREATE TABLE IF NOT EXISTS `na_accepted_substitute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `link_video` varchar(255) NOT NULL,
  `link_camera` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `na_accepted_substitute`
--

INSERT INTO `na_accepted_substitute` (`id`, `ind_id`, `link_video`, `link_camera`, `status`) VALUES
(5, 1, 'DAV Model', 'www.xxxp.com', 1),
(6, 2, 'fffffff', 'fffffffffffffff', 1),
(7, 2, 'fgbv', 'fbgv', 1),
(8, 2, 'Video.co.in', 'camera.co.in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_admin_detail`
--

CREATE TABLE IF NOT EXISTS `na_admin_detail` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UserStatus` enum('Active','InActive') NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_admin_detail`
--

INSERT INTO `na_admin_detail` (`AdminId`, `UserName`, `UserPassword`, `UserStatus`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `na_admin_mail`
--

CREATE TABLE IF NOT EXISTS `na_admin_mail` (
  `MailId` int(11) NOT NULL AUTO_INCREMENT,
  `MailAddress` varchar(255) NOT NULL,
  `UserImage` varchar(255) NOT NULL,
  PRIMARY KEY (`MailId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_admin_mail`
--

INSERT INTO `na_admin_mail` (`MailId`, `MailAddress`, `UserImage`) VALUES
(1, 'info@newdemo.com', '563c80386492e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `na_audio_presentation`
--

CREATE TABLE IF NOT EXISTS `na_audio_presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `audio_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `link_rec_audio` varchar(255) NOT NULL,
  `ip_live_cam` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_audio_presentation`
--

INSERT INTO `na_audio_presentation` (`id`, `ind_id`, `audio_date`, `description`, `link_rec_audio`, `ip_live_cam`, `comments`, `status`) VALUES
(1, 0, '2016-03-16 00:00:00', '<p>This is a test audio description</p>', 'http://www.audio.com/audio1', '193.156.2.2', '', 0),
(2, 2, '2016-04-01 00:00:00', 'demo song', 'http://gaana.com/playlist/gaana-dj-party-all-night-1', '193.156.2.3', 'demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_audio_sturec_presentation`
--

CREATE TABLE IF NOT EXISTS `na_audio_sturec_presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `audio_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `link_rec_audio` varchar(255) NOT NULL,
  `ip_live_cam` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `na_audio_sturec_presentation`
--

INSERT INTO `na_audio_sturec_presentation` (`id`, `ind_id`, `audio_date`, `description`, `link_rec_audio`, `ip_live_cam`, `comments`, `status`) VALUES
(1, 2, '2016-04-04 00:00:00', 'aaaaaaaa', 'http://gaana.com/playlist/gaana-dj-party-all-night-1', '1.1.1.1', 'aaaaaaaa', 1),
(2, 2, '2016-04-05 00:00:00', 'demo demo', 'youtube.com', '21.21.21.21', 'demo demo', 1),
(3, 2, '2016-04-30 00:00:00', 'dasdsad', 'sss.sss.com', '111.222.333', 'asdasdasdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_cms`
--

CREATE TABLE IF NOT EXISTS `na_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_pagetitle` varchar(256) NOT NULL,
  `cms_page_heading` text NOT NULL,
  `cms_page_subheading` text NOT NULL,
  `cms_pagedes` blob NOT NULL,
  `cmsimg` varchar(255) NOT NULL,
  `cmsmap` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `status` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `na_cms`
--

INSERT INTO `na_cms` (`id`, `cms_pagetitle`, `cms_page_heading`, `cms_page_subheading`, `cms_pagedes`, `cmsimg`, `cmsmap`, `meta_title`, `meta_description`, `meta_keywords`, `status`) VALUES
(1, 'Home3', 'Home', '', 0x3c703e43474a676d6866636d7468646668204d4a554647484a4b4a4b4a484a4a747474747474743c2f703e, '0', '<iframe src=\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.0600794104744!2d87.31472161434336!3d23.494345404427815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f77173c59f12b5%3A0x622975ee20ac9e67!2sDurgapur+Railway+Station+Bus+Terminus!5e0!3m2!1sen!2sin!4v1457610074177\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" width=\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"600\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" height=\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"450\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" frameborder=\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"0\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" style=\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"border:0\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" allowfullscreen></iframe>', 'Builders Edge Building Mat', 'Builders Edge Building Mat \r\n', 'Builders Edge Building Mat \r\n', 'Yes'),
(2, 'About Us', 'About Us', '', 0x3c703e57652061726520612072656c61746976656c79206e657720636f6d70616e792c20266c6471756f3b746865206e657720626f7973206f6e2074686520626c6f636b26726471756f3b20736f20746f20737065616b2e2054686520636f6d70616e79206973206e65772c20416c74686f7567682c20776520617265206661722066726f6d206e657720746f20746865206275696c64696e6720696e6475737472792c206f7220746865207370656369616c6973656420666c6f6f72696e6720696e6475737472792c20616e6420666c6f6174696e6720666c6f6f727320696e64757374727920696e20706172746963756c61722c20666f722074686174206d61747465722e204d61726b20686173207370656e7420616c6d6f737420373025206f6620686973206c69666520696e20746865206275696c64696e6720696e6475737472792c20333520706c75732079656172732c20746f2062652065786163742c206f72206e65617220656e6f75676820746f2069742e2046726f6d206672616d696e672c20746f2072656e6f766174696f6e7320616e6420657874656e73696f6e732c2067656e6572616c2063617270656e74727920616e6420636162696e657472792c20616e6420616c6c206f74686572206275696c64696e67206173736f636961746564207472616465732e20576865726520416c65782c686520686173207370656e7420313520706c757320796561727320696e20746865206275696c64696e6720696e6475737472792c20616e642061742074696d657320616c6f6e6773696465204d61726b2c20616e64206d6f7265207468616e206669766520796561727320696e20666c6f6f72696e6720696e6475737472792e20416c657820697320636f6d706574656e7420696e2074686520776f726b207468617420686520646f65732c20616e6420706572666f726d732c20616e64206861732064656d6f6e7374726174656420746861742074696d6520616e642074696d65206f7665722c20776974686f7574206661696c2e20416c65782068617320686973206f776e20736574206f66206578706572746973652074686174206865206272696e677320746f2074686520666f72756d2c20616e6420686973206e6963686520776179732c207768656e20697420636f6d657320746f2064656c69766572696e672066696e69736865642070726f6a656374732c20616e64206465616c696e67207769746820637573746f6d6572732e2057652073747269766520666f7220657863656c6c656e63652c20616e64206f6674656e2077652064656c697665722069742e205765206e6f77206469737472696275746520616c6c20666163657473206f6620666c6f6f72696e6720636f6d706f6e656e74732c20616e642077652063616e2070726f7669646520696e7374616c6c6174696f6e206f6620616c6c2c206f6e20726571756573742e205768792073686f756c6420796f7520676f20776974682075733f20426563617573652077652063616e2c2064656c697665722070726f6a656374732c20696e2074696d6520616e64206f6e2074696d652c20776974682066696e657320616e6420657863656c6c656e63652e2057652074616b6520707269646520696e207768617420776520646f2c20616e6420636f6e63656e7472617465206f6e2064656c69766572696e6720637573746f6d657220736174697366616374696f6e2c207768657265206576657220706f737369626c652e3c2f703e, '563c7f030767f.jpg', '', 'Builders Edge Building Mat | About Us', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(3, 'Our Gallery', 'Our Gallery', 'xyzzzzzzzzzzzz', '', '', '', 'Builders Edge Building Mat | Our Gallery', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(4, 'Testimonials', 'Testimonials', '', '', '', '', 'Builders Edge Building Mat | Testimonials', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(5, 'Contact us', 'Contact us', '', 0x3c703e496e746572657374656420696e206f75722073657276696365733f2047657420696e20746f7563682077697468207573207669612074686520666f726d2062656c6f7720616e64207765276c6c20676574206261636b20746f20796f7520617320736f6f6e20617320706f737369626c65206f72206769766520757320612063616c6c2e20596f752068617665206e6f7468696e6720746f206c6f7365206275742065766572797468696e6720746f206761696e21204f7572207072696365732063616e6e6f742062652062656174656e20627920746865206d616a6f7220666c6f6f72696e672072657461696c6572733c2f703e, '', '', 'Builders Edge Building Mat | Contact us for a free measure and quote', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(6, 'Our Products', 'Our Products', '', 0x3c703e3c7370616e207374796c653d22666f6e742d73697a653a20313070743b20666f6e742d66616d696c793a20617269616c20626c61636b2c6176616e742067617264653b223e576520616c736f2072656d6f7665206578697374696e6720666c6f6f72696e672073756368206173206361727065742c2074696c65732c20736c61746520616e64206f6c6420776f6f6420666c6f6f72696e6720616e6420646973706f7365206f6620697420666f7220796f752e3c2f7370616e3e3c2f703e0d0a3c703e3c7370616e207374796c653d22666f6e742d73697a653a20313070743b20666f6e742d66616d696c793a20617269616c20626c61636b2c6176616e742067617264653b223e416e79206c6576656c6c696e672072657175697265643f2057656c6c2077652063616e20646f207468617420666f7220796f752e3c2f7370616e3e3c2f703e0d0a3c703e3c7370616e207374796c653d22666f6e742d73697a653a20313070743b20666f6e742d66616d696c793a20617269616c20626c61636b2c6176616e742067617264653b223e4d616e75666163747572696e67206f66207374616972206e6f73696e6720212057652063616e20646f207468617420746f2e3c2f7370616e3e3c2f703e0d0a3c703e3c7370616e207374796c653d22666f6e742d73697a653a20313070743b20666f6e742d66616d696c793a20617269616c20626c61636b2c6176616e742067617264653b223e416c736f2063616e20617272616e676520796f75722073616e64696e672026616d703b20636f6174696e67206f6620736f6c69642074696d6265723c2f7370616e3e3c2f703e0d0a3c703e3c7370616e207374796c653d22666f6e742d73697a653a20313270743b20666f6e742d66616d696c793a20617269616c20626c61636b2c6176616e742067617264653b223e3c7374726f6e673e54686973204d6f6e746873207370656369616c3c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e3c7370616e207374796c653d22666f6e742d73697a653a20313270743b20666f6e742d66616d696c793a20617269616c20626c61636b2c6176616e742067617264653b223e31333020782031342026616d703b2038352078203139207374616e64617264206772616465205265642047756d20736f6c69642074696d626572202435352e3030202b206773743c2f7370616e3e3c2f703e, '', '', 'Builders Edge Building Mat | Our Products', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(7, 'Mission Statement', 'Mission Statement', '', 0x3c703e4275696c646572732045646765206973206120636f6d70616e7920746861742069732077696c6c696e6720746f20656e7375726520746861742077652070726f7669646520696e746567726974792061732077656c6c206173207175616c6974796275696c64696e672070726f64756374732c20746f20616c6c206f66206f757220637573746f6d65727320696e206f7572207075727375697420666f7220657863656c6c656e63652e3c2f703e, '', '', 'Builders Edge Building Mat | Mission Statement', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(8, 'Our Mission', 'Our Mission', '', 0x3c703e52616973696e67206f75722053657276696365205374616e64617264732c204265796f6e642054686f73652041747461696e61626c6520427920576f7274687920436f6d70657469746f72733c2f703e, '', '', 'Builders Edge Building Mat | Our Mission', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(9, 'Our Goal', 'Our Goal', '', 0x3c703e4f757220676f616c20697320746f205365727669636520656e74697265204d656c626f75726e6520616e6420566963746f7269612c20616e64206265636f6d652061206e6174696f6e202d77696465206469737472696275746f72206f66207175616c697479206275696c64696e672070726f647563747320616e642073657276696365732e6a6a6a6a3c2f703e, '0', '', 'Builders Edge Building Mat | Our Goal', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(10, 'The Directors Notation', 'The Directors Notation', 'fdsfdsfdsf', 0x3c70207374796c653d22666f6e742d66616d696c793a2066616e746173793b20666f6e742d73697a653a20313670783b206c696e652d6865696768743a20333070783b223e48756e6472656473206f66206f7267616e697a6174696f6e7320616e6420636f6d70616e6965732c206e6174696f6e202d20776964652072656c79206f6e206f75722065787065727469736520696e2064656c69766572696e67207175616c6974792070726f64756374732c20746f20617373697374207468656d20746f636f6d706c6574652074686569722070726f6a656374732c20616e6420696d70726f766520746865697220627573696e6573732c20616e64207468656972206c6976656c69686f6f64732e204865726520696e20566963746f72696120776520617265206e6f20646966666572656e7420746f207468652072657374206f66204175737472616c69612c20627574206865726520696e204d656c626f75726e6520616e64206772656174657220566963746f7269612c77652077616e7420746f206d616b65206120646966666572656e63652c20616e6420776520686176652e205765207468616e6b20616c6c2074686520627573696e657373657320616e64206f7267616e697a6174696f6e732074686174206861766520636f6d65206f6e20626f617264207769746820757320696e2074686520706173742c20616e642077652077656c636f6d6520616c6c206f7468657273207365656b696e67206f7572207175616c6974792070726f64756374732c206164766963652c20636f6e73756c746174696f6e20616e642073657276696365732e2057652057656c636f6d65204f6e6520616e6420416c6c2e3c2f703e0d0a3c7020636c6173733d22746578742d726967687422207374796c653d22666f6e742d66616d696c793a2066616e746173793b20666f6e742d73697a653a20313470783b206c696e652d6865696768743a20323170783b206d617267696e2d746f703a2031656d3b223e5468616e6b20796f753c6272202f3e204b696e6420526567617264733c6272202f3e20466f7220616e64206f6e20626568616c66206f663c6272202f3e204275696c646572732045646765204275696c64696e67204d6174657269616c73205074792e204c74643c6272202f3e20546865204469726563746f72733c6272202f3e204d61726b2043616c69633c2f703e, '', '', 'Builders Edge Building Mat | The Directors Notation', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes'),
(11, 'Company Profile', 'Company Profile', '', 0x3c703e4275696c646572732045646765204275696c64696e67204d6174657269616c733c6272202f3e205074792e4c74642e41434e203630343331373535333c6272202f3e2041424e3a2036333630343331373535333c6272202f3e205265672e204f66666963653c6272202f3e20313520427261696d2053742e204e6f7274683c6272202f3e2053756e7368696e652c20566963746f72696120333032303c6272202f3e2054656c2f4661783a20393331312d363930333c6272202f3e204d6f62696c653a203034313020353837203239393c6272202f3e20452d6d61696c3a20696e666f406275696c64657273656467656275696c64696e676d61742e636f6d3c2f703e, '', '', 'Builders Edge Building Mat | Contact Us', 'Builders Edge Building Mat | Meta Descriptions', 'Builders Edge Building Mat | Meta Keyword', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `na_coach`
--

CREATE TABLE IF NOT EXISTS `na_coach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `coach_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sample` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `na_country`
--

CREATE TABLE IF NOT EXISTS `na_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `na_country`
--

INSERT INTO `na_country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `na_drug`
--

CREATE TABLE IF NOT EXISTS `na_drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `reason` longtext NOT NULL,
  `drug_date` datetime NOT NULL,
  `outcome` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `na_drug`
--

INSERT INTO `na_drug` (`id`, `ind_id`, `drug_name`, `reason`, `drug_date`, `outcome`, `status`) VALUES
(1, 2, 'Setrazin', '<p>asdasdasdasdad</p>', '2016-03-16 00:00:00', 'positive', 1),
(2, 2, 'Calpol', '<p>goodddddddddddddddddddddddddd</p>', '2016-03-09 00:00:00', 'Good Result', 1),
(3, 1, 'Setrazin', 'Good result', '2016-03-02 00:00:00', 'positive', 1),
(5, 0, 'Calpol', 'did not get good result', '2016-03-10 00:00:00', 'Not Good', 1),
(6, 1, 'Calpol', 'positive result', '2016-03-09 00:00:00', 'positive', 1),
(7, 1, 'toto', '', '2016-03-09 00:00:00', '21', 1),
(8, 1, 'toto', 'medical', '2016-03-09 00:00:00', '22', 1),
(9, 2, 'metacin', 'assa', '2016-04-03 00:00:00', 'jor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_educational_records`
--

CREATE TABLE IF NOT EXISTS `na_educational_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `grades` varchar(255) NOT NULL,
  `notes` longtext NOT NULL,
  `comments` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `na_educational_records`
--

INSERT INTO `na_educational_records` (`id`, `ind_id`, `grades`, `notes`, `comments`, `messages`, `phone`, `email`, `ipaddress`, `website`, `domain_name`, `url`, `learning_portal`, `academic_program`, `course`, `curriculum`, `syllabus`, `status`) VALUES
(16, 0, 'Rana', 'Rana', 'Rana', 'Rana', 0, '', '', '', '', '', '', '', '', '', '', 1),
(17, 0, 'dfgdsgds', 'dfgds', 'dfgdssd', 'dgd', 0, '', '', '', '', '', '', '', '', '', '', 1),
(18, 0, 'FANANA', 'dfgds', 'dddddddddddddddddd', 'ddddddddddddddd', 0, '', '', '', '', '', '', '', '', '', '', 1),
(19, 1, 'A+', 'test notes', 'test comment', 'test message', 0, '', '', '', '', '', '', '', '', '', '', 1),
(20, 1, 'B+', 'hi ', 'hi  john', 'hi  john john', 0, '', '', '', '', '', '', '', '', '', '', 1),
(21, 1, 'C+', 'Test', 'Test', 'Test', 0, '', '', '', '', '', '', '', '', '', '', 1),
(22, 1, 'U++', 'uuuuuuuu', 'uuuuuuuuuuu', 'uuuuuuuuuuuuuuuu', 0, '', '', '', '', '', '', '', '', '', '', 1),
(23, 1, 'D++', 'DJ', 'DJ', 'DJ', 0, '', '', '', '', '', '', '', '', '', '', 1),
(24, 1, 'B++', 'Test mail', 'Test mail', 'Test mail', 0, '', '', '', '', '', '', '', '', '', '', 1),
(25, 1, 'E++', 'test now', 'test now', 'test now', 0, '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_eduinstitute`
--

CREATE TABLE IF NOT EXISTS `na_eduinstitute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `school_bulletin` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel_no` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms_no` bigint(20) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `schools` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `na_eduinstitute`
--

INSERT INTO `na_eduinstitute` (`id`, `ind_id`, `institute_name`, `description`, `school_bulletin`, `instructor`, `address`, `tel_no`, `email`, `sms_no`, `ip_address`, `website`, `domain_name`, `url`, `learning_portal`, `schools`, `status`) VALUES
(6, 2, 'AIEMD', 'sdada', 'A+', 'AKD', 'sasa', 1212121212, 'abc@gmail.com', 211121, '111.011.20', 'arup.com', 'asasa', 'arup.goigi.asia', 'abc.de.efgh.com', 'aaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_eduinstitute_attended`
--

CREATE TABLE IF NOT EXISTS `na_eduinstitute_attended` (
  `st_id` varchar(255) DEFAULT NULL,
  `ind_id` int(11) NOT NULL,
  `program_enroll` varchar(255) DEFAULT NULL,
  `attend_date` date DEFAULT NULL,
  `course_taken` varchar(255) DEFAULT NULL,
  `Grades` varchar(50) DEFAULT NULL,
  `course_enrolled` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  UNIQUE KEY `st_id` (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `na_eduinstitute_attended`
--

INSERT INTO `na_eduinstitute_attended` (`st_id`, `ind_id`, `program_enroll`, `attend_date`, `course_taken`, `Grades`, `course_enrolled`, `status`) VALUES
(NULL, 1, '', '0000-00-00', 'asdf', 'asdf', 'asdf', 1),
(NULL, 1, 'Diploma', '0000-00-00', 'asxdf', 'dfsf', 'sdsd', 1),
(NULL, 1, '', '0000-00-00', 'asdf', 'asdf', 'asdf', 1),
(NULL, 1, '', '0000-00-00', 'asdfq', 'sdcac', 'asdf', 1),
(NULL, 1, 'educataion', '0000-00-00', 'asdf', 'asas', 'ascas', 1),
(NULL, 1, '', '2016-04-20', 'asdf', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_extracurricullam`
--

CREATE TABLE IF NOT EXISTS `na_extracurricullam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `activity_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `na_extracurricullam`
--

INSERT INTO `na_extracurricullam` (`id`, `ind_id`, `activity_name`, `from_date`, `activity_description`, `status`) VALUES
(6, 2, 'Activity Name', '2016-03-08 00:00:00', '', 1),
(7, 6, 'Activity Name', '2016-02-29 00:00:00', '<p>Description</p>', 1),
(8, 4, 'Activity Name123', '2016-03-07 00:00:00', '<p>Description123</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_individual`
--

CREATE TABLE IF NOT EXISTS `na_individual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `conference_id` varchar(255) NOT NULL,
  `social_seq_no` int(11) NOT NULL,
  `tel_no` bigint(20) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `dob` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `na_individual`
--

INSERT INTO `na_individual` (`id`, `ind_id`, `gender`, `conference_id`, `social_seq_no`, `tel_no`, `mobile_no`, `ip_address`, `description`, `dob`, `status`) VALUES
(1, 1, 'M', 'xp001', 1152, 0, 0, '192.168.2.0', '<p><span class="comment-copy">The reason this works is because CI is nice enough to</span></p>', '1985-03-02', 1),
(2, 1, 'M', 'xp001', 2, 0, 0, '192.168.2.0', '<p>The reason this works is because CI is nice enough to</p>', '1970-01-01', 1),
(3, 0, 'M', 'xp001', 2, 0, 0, '192.168.2.0', '<p>The reason this works is because CI is nice enough to</p>', '1970-01-01', 1),
(4, 1, 'M', 'xp001', 2, 0, 0, '192.168.2.0', '<p>The reason this works is because CI is nice enough to</p>', '1970-01-01', 1),
(5, 1, 'M', 'xp001', 1, 0, 0, '192.168.2.0', 'The reason this works is because CI is nice enough to', '1970-01-01', 1),
(6, 0, 'M', '121212', 1121212, 0, 0, '12121212', '<p>ewfdewd</p>', '1970-01-01', 1),
(7, 0, 'M', '121212', 1121212, 0, 0, '12.12.12.12', '<p>ewfdewd</p>', '1970-01-01', 1),
(8, 2, 'M', 'xp001', 1152, 0, 0, '192.168.2.0', '<p>asasdasdasdasd</p>', '2016-03-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_individual_award`
--

CREATE TABLE IF NOT EXISTS `na_individual_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `award_name` varchar(255) NOT NULL,
  `award_date` datetime NOT NULL,
  `award_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `na_individual_award`
--

INSERT INTO `na_individual_award` (`id`, `ind_id`, `award_name`, `award_date`, `award_description`, `status`) VALUES
(2, 1, 'Best Sports Man', '2016-03-09 00:00:00', 'Award for best sports man', 1),
(3, 0, 'Best Student', '2016-03-17 00:00:00', 'Best Student award', 1),
(4, 1, 'Best Student', '2016-03-16 00:00:00', 'Best Student Award', 1),
(5, 2, 'Best Student', '2016-03-09 00:00:00', '<p>rthyrtyrtyrtyrttghfghfghfgh</p>', 1),
(6, 1, 'Best Student', '2016-02-10 00:00:00', 'I have been awarded as a best student', 1),
(7, 1, 'trophy', '2016-03-02 00:00:00', 'Race', 1),
(8, 1, 'Ranji Trophy', '2016-03-26 00:00:00', 'Cricket', 1),
(9, 2, 'trophy', '2016-02-29 00:00:00', 'fsdfsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_inst_academic_transcripts`
--

CREATE TABLE IF NOT EXISTS `na_inst_academic_transcripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `courses_taken` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `na_inst_academic_transcripts`
--

INSERT INTO `na_inst_academic_transcripts` (`id`, `ind_id`, `student_id`, `courses_taken`, `grade`, `status`) VALUES
(7, 2, '', 'CSS', 'A+', 1),
(8, 2, '', 'r', 'A', 1),
(9, 2, '', 'JASON', 'A', 1),
(10, 2, '', 'BIOLOGY', 'A+', 1),
(11, 2, '', 'C++', 'A', 1),
(12, 2, '', 'CAD', 'A+', 1),
(13, 2, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_ins_curriculum`
--

CREATE TABLE IF NOT EXISTS `na_ins_curriculum` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `course_schedule` datetime DEFAULT NULL,
  `educ_institute` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_ins_curriculum`
--

INSERT INTO `na_ins_curriculum` (`cur_id`, `ind_id`, `instructor`, `course`, `description`, `course_schedule`, `educ_institute`, `status`) VALUES
(1, 2, 'sdvsd', 'sdsd', 'sdvsd', '2016-04-12 00:00:00', 'sdvsdv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_ins_edu`
--

CREATE TABLE IF NOT EXISTS `na_ins_edu` (
  `ed_id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `na_ins_edu`
--

INSERT INTO `na_ins_edu` (`ed_id`, `ind_id`, `name`, `description`, `school`, `status`) VALUES
(1, 2, 'asdcd', '', 'SAxcas', 1),
(2, 2, 'qw wr', '', 'sdvc', 1),
(3, 2, 'qw wr', '', 'sdfv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_ins_facilities`
--

CREATE TABLE IF NOT EXISTS `na_ins_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `prog_enrolled` varchar(255) NOT NULL,
  `datesofattendence` date NOT NULL,
  `classes_taken` varchar(255) NOT NULL,
  `achievements` varchar(255) NOT NULL,
  `current_schedule` datetime NOT NULL,
  `awards_conferred` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_ins_facilities`
--

INSERT INTO `na_ins_facilities` (`id`, `ind_id`, `prog_enrolled`, `datesofattendence`, `classes_taken`, `achievements`, `current_schedule`, `awards_conferred`, `status`) VALUES
(1, 2, 'demo', '2016-04-02', 'demo', 'demo', '2016-04-13 00:00:00', 'demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_ins_schools`
--

CREATE TABLE IF NOT EXISTS `na_ins_schools` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `na_ins_schools`
--

INSERT INTO `na_ins_schools` (`sc_id`, `ind_id`, `program`, `course`, `status`) VALUES
(1, 2, 'diploma', 'vfvfvfv', 1),
(2, 2, 'diploma', 'sdvcdsc', 1),
(3, 2, 'degree', 'sdfv', 1),
(4, 2, 'Education', 'sdcsdac', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_ins_teacher`
--

CREATE TABLE IF NOT EXISTS `na_ins_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `na_ins_teacher`
--

INSERT INTO `na_ins_teacher` (`teacher_id`, `ind_id`, `name`, `course`, `information`, `address`, `telephone`, `email`, `website`, `status`) VALUES
(1, 2, 'qw wr', 'dfbvgdf', 'zsvdsdv', 'ghgfhfgh', 787654321, 'as@gmail.com', 'dfgdg.com', 1),
(2, 2, 'qw wr', 'asxc', 'ghmgh', 'ghgfhfgh', 787654321, 'as@gmail.com', 'AScx.mgvgnhm', 1),
(3, 3, 'qw wr', 'dcasdc', 'dcsdc', 'ghgfhfgh', 787654321, 'as@gmail.com', 'sadcsADc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_issuer_of_report`
--

CREATE TABLE IF NOT EXISTS `na_issuer_of_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel_no` bigint(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `na_issuer_of_report`
--

INSERT INTO `na_issuer_of_report` (`id`, `ind_id`, `name`, `tel_no`, `website`, `url`, `description`, `status`) VALUES
(21, 1, 'Debjit', 9854345423, 'facebook.com', 'facebook.com', 'HELLO', 1),
(22, 1, 'RAJ', 9856985623, 'goigi', 'goigi.net', 'Hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_member`
--

CREATE TABLE IF NOT EXISTS `na_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userlink` varchar(255) NOT NULL,
  `IpAddress` varchar(255) NOT NULL,
  `RegistrationNo` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `text_no` bigint(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ind` tinyint(4) NOT NULL,
  `std` tinyint(4) NOT NULL,
  `edu` tinyint(4) NOT NULL,
  `fac` tinyint(4) NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `EmailVerification` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `na_member`
--

INSERT INTO `na_member` (`id`, `userlink`, `IpAddress`, `RegistrationNo`, `first_name`, `last_name`, `country`, `address`, `city`, `state`, `zip_code`, `phone_no`, `dateofbirth`, `email`, `text_no`, `website`, `domain_name`, `url`, `username`, `password`, `ind`, `std`, `edu`, `fac`, `userImage`, `gender`, `status`, `EmailVerification`) VALUES
(1, 'dP2CBoAB4ic1', '', '', 'Kaushik', 'Banerjee', '', 'Bidhan Nagar', 'Durgapur', 'west Bengal', 713206, 9854122256, '0000-00-00', 'a@a.com', 0, 'www.google.com', 'google', 'www.xxxp.com', 'kaushik635', '123456', 1, 0, 0, 0, 'Chrysanthemum.jpg', '', 1, 0),
(2, 'dP2CBoAB4ic2', '', '', 'Shane', 'Watson', '', '4100 Spring Valley Suite #632', 'Sydney', 'test state', 744115, 9854122256, '0000-00-00', 'shane@gmail.com', 9854125689, 'http://www.lipsum.com/', 'lipsum.com', 'http://www.lipsum.com/', 'shane635', 'qwerty', 1, 1, 1, 1, '', '', 1, 0),
(3, 'dP2CBoAB4ic3', '', '', 'Moin', 'Ali', '', '33/2 Sant Ana', 'Sant Ana', 'test state', 713206, 9854122256, '0000-00-00', 'moin@gmail.com', 9854125689, 'www.google.com', 'google', 'www.xxxp.com', 'moin98', '123456', 1, 0, 1, 0, '', '', 1, 0),
(4, 'APDPjYJdDA5P', '', '', 'Kaushik', 'Bhattacharjee', '', '4100 Spring Valley Suite #632', 'Durgapur', 'west Bengal', 713206, 9854122256, '0000-00-00', 'b@b.com', 9854125689, 'www.google.com', 'google', 'www.xxxp.com', 'kaushik636', '123456', 1, 0, 0, 0, '', '', 1, 0),
(5, 'ndgcn4j', '::1', '', 'Supratim', 'sinha', '', '', 'Durgapur', '', 713206, 9854122256, '0000-00-00', 'sup@gmail.com', 9854125689, 'www.google.com', 'google', 'http://www.lipsum.com/', 'supratim95', 'MTIzNDU2', 0, 0, 0, 0, '', '', 1, 0),
(6, 'onvr7le', '::1', '', 'Arup', 'Dutta', '', '', 'Durgapur', '', 744115, 9854122256, '0000-00-00', 'jgomes@gmail.com', 9854125689, 'www.google.com', 'lipsum.com', 'test url', 'adminaaa', 'YWFhYWFhYWFhYQ==', 0, 0, 0, 0, '57681c2f11536.jpg', '', 1, 0),
(7, 'hkwsy04', '::1', '', 'aaaaaaaaaaa', 'aaaaaaaaaa', '', '', 'aaaaaaaaaaaaaaa', '', 715264, 9854122256, '0000-00-00', 'jgomes@gmail.com', 9854125689, 'crickinfo.com', 'crickinfo', 'http://www.webedu.com', 'aaaaaaaaaaaaaaaaaaaaadddddddddddddd', 'MTExMTExMTExMQ==', 1, 1, 0, 1, '57681d0783a6f.jpg', '', 1, 0),
(8, '48yhv1z', '::1', '', 'Kaushik', 'Gupta', '', '', 'Durgapur', '', 744115, 9854122256, '0000-00-00', 'kaushik635@gmail.com', 9854125689, 'www.google.com', 'test domain', 'www.xxxp.com', 'kaushik635', 'MTIzNDY=', 1, 0, 0, 0, '', '', 1, 0),
(9, '7rsk5pw', '::1', '', 'dfgdfg', 'dfgdfg', '', '', 'Durgapur', '', 744115, 9854122256, '0000-00-00', 'web0112156@goigi.asia', 9854125689, 'www.google.com', 'lipsum.com', 'http://www.lipsum.com/', 'kaushik635', 'MTIz', 1, 0, 0, 0, '', '', 1, 0),
(10, 'p9w7gy5', '::1', '', '				dfgdfg', 'Gupta', '', '', 'dfgdfg', '', 744115, 9854122256, '0000-00-00', 'ffffff@ww.com', 9854125689, 'www.google.com', 'www.google.com', 'www.google.com', 'supratim951', 'MTIz', 1, 0, 0, 0, '', '', 1, 0),
(11, 'p1gg88c', '::1', '', '				', 'uuuuuuuuuuu', '', '', '', '', 0, 0, '0000-00-00', '', 0, '', '', '', '', '', 0, 0, 0, 0, '', '', 1, 0),
(12, '4i7h1n2', '::1', '', 'Supratim	', 'Senddd', '', '', 'Durgapur', '', 888999, 2255448899, '1970-01-01', 'abc@gmail.com', 55, 'www.goigi.com', 'goigi', 'www.goigi.com', 'abc', 'MTIz', 1, 1, 1, 1, '57691ec38475d.jpg', 'Female', 1, 0),
(13, 'qa7msop', '127.0.0.1', '', 'ffffffffffffff', 'ffffffffffffffff', '', '', 'fffffffffffffffff', '', 0, 5555555555, '2016-06-23', 'kjh@gh.com', 0, 'www.goigi.com', 'GOIGI', 'http://www.gmail.com', 'sedfgvsedfgv', 'NTQ0MzU0', 1, 1, 1, 1, '', 'Female', 1, 0),
(15, '0c6e8r5', '::1', '', 'Manoranjan', 'Sharma', '', '', 'Kolkata', '', 713381, 9933735230, '0000-00-00', 'web2@goigi.net', 12346, 'http://goigi.com', 'goigi.com', 'http://goigi.com', 'mannu123', 'MTIz', 0, 1, 1, 1, '576a1ab07850d.jpg', 'Male', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `na_messages`
--

CREATE TABLE IF NOT EXISTS `na_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `na_messages`
--

INSERT INTO `na_messages` (`id`, `ind_id`, `report_date`, `description`, `status`) VALUES
(25, 1, '2016-04-06', 'test', 1),
(26, 1, '2016-04-05', 'Test sms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_network_profile`
--

CREATE TABLE IF NOT EXISTS `na_network_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `marking_media` varchar(255) NOT NULL,
  `add_meterial` varchar(255) NOT NULL,
  `marketing_meterial` varchar(255) NOT NULL,
  `commercials` varchar(255) NOT NULL,
  `infomercials` varchar(255) NOT NULL,
  `media_link` varchar(255) NOT NULL,
  `network_site` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_network_profile`
--

INSERT INTO `na_network_profile` (`id`, `name`, `description`, `email`, `ip_address`, `website`, `domain_name`, `url`, `marking_media`, `add_meterial`, `marketing_meterial`, `commercials`, `infomercials`, `media_link`, `network_site`, `status`) VALUES
(2, 'Facebook1', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '', '192.168.2.0', 'http://www.lipsum.com/', 'lipsum.com', 'http://www.lipsum.com/', 'media mar1', 'add materi1', 'mark mete1', 'commercial1', 'Infomercials1', 'facebook.com/kaushik', 'www.network.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_newsmedia`
--

CREATE TABLE IF NOT EXISTS `na_newsmedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `information` longtext NOT NULL,
  `newsreport` varchar(255) NOT NULL,
  `publish_report` varchar(255) NOT NULL,
  `study_report` varchar(255) NOT NULL,
  `programs` varchar(255) NOT NULL,
  `tv_program` varchar(255) NOT NULL,
  `marketing_pro` varchar(255) NOT NULL,
  `add_material` varchar(255) NOT NULL,
  `mark_meterial` varchar(255) NOT NULL,
  `commercial` varchar(255) NOT NULL,
  `video_clip` varchar(255) NOT NULL,
  `Infomercials` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `na_newsmedia`
--

INSERT INTO `na_newsmedia` (`id`, `name`, `description`, `ipaddress`, `website`, `domain_name`, `url`, `information`, `newsreport`, `publish_report`, `study_report`, `programs`, `tv_program`, `marketing_pro`, `add_material`, `mark_meterial`, `commercial`, `video_clip`, `Infomercials`, `status`) VALUES
(1, 'Arup Dutta', '<p>Now that youve understood how to create database and tables in MySQL. In this tutorial you will learn how to execute SQL query to insert records in a table.</p>', '192.168.2.0', 'www.yahoo.com', 'hotmail.com', 'www.lpsono.com', 'Contrary to popular belief1', 'established fact that1', 'No', 'No', 'test program1', 'tv program1', 'fffffkk', '', '', '', '', '', 1),
(4, 'notun data', '', '172.11.220', 'asas', 'sasas', 'arup.goigi.asia', 'asa', 'assa', '', '', '', '', '', '', '', '', '', '', 1),
(5, 'Barry Allen', '', '182.101.220', 'arup', 'arup', 'flah.goigi.asia', 'The Flash', 'Star Labs', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_personal_recommendations`
--

CREATE TABLE IF NOT EXISTS `na_personal_recommendations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `per_prov_rec` varchar(255) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `recorded_video` varchar(255) NOT NULL,
  `recom_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_personal_recommendations`
--

INSERT INTO `na_personal_recommendations` (`id`, `ind_id`, `per_prov_rec`, `recommendation`, `recorded_video`, `recom_date`, `status`) VALUES
(1, 2, 'Supratim Sen', 'Be a good person', 'youtube.com', '2016-04-01 00:00:00', 1),
(2, 2, '', '', '', '1970-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_recomendation`
--

CREATE TABLE IF NOT EXISTS `na_recomendation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `recomendation_person` varchar(255) NOT NULL,
  `recomendation` varchar(255) NOT NULL,
  `rec_video_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_recomendation`
--

INSERT INTO `na_recomendation` (`id`, `ind_id`, `recomendation_person`, `recomendation`, `rec_video_link`, `status`) VALUES
(1, 2, 'test recomentation person', 'Test Recomendation', 'http://recvideo.com/video2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_reference`
--

CREATE TABLE IF NOT EXISTS `na_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `dateofreference` date NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_position` varchar(255) NOT NULL,
  `ref_phone` bigint(20) NOT NULL,
  `ref_emailaddress` varchar(255) NOT NULL,
  `ref_relationship` varchar(255) NOT NULL,
  `ref_recominfo` varchar(255) NOT NULL,
  `ref_recomvideo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_reference`
--

INSERT INTO `na_reference` (`id`, `ind_id`, `dateofreference`, `ref_name`, `ref_position`, `ref_phone`, `ref_emailaddress`, `ref_relationship`, `ref_recominfo`, `ref_recomvideo`, `status`) VALUES
(1, 2, '2016-04-01', 'Supratim Sen', 'test', 1212121212, 'abc@gmail.com', 'test', 'demo', 'youtube.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_rehabilitation`
--

CREATE TABLE IF NOT EXISTS `na_rehabilitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `rehab_name` varchar(255) NOT NULL,
  `rehab_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `outcome` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `na_rehabilitation`
--

INSERT INTO `na_rehabilitation` (`id`, `ind_id`, `rehab_name`, `rehab_date`, `description`, `outcome`, `status`) VALUES
(2, 0, 'Test Rehabiliation new', '2016-04-14 00:00:00', '<p>This is test rehabiliation two</p>', 'positive', 1),
(3, 2, 'Test Rehab', '2016-03-09 00:00:00', '<p>test rehab test rehabtest rehabtest rehabtest rehab</p>', '', 1),
(4, 2, 'trees', '2016-03-23 00:00:00', 'growth of forest', 'neg', 1),
(5, 2, 'Market', '2016-03-08 00:00:00', 'restablished', 'pos', 1),
(6, 2, 'aA', '2016-03-24 00:00:00', 'AA', 'AA', 1),
(7, 2, 'Market', '2016-03-01 00:00:00', 'DCDSC', 'DCD', 1),
(8, 2, 'asdsd', '2016-04-12 00:00:00', 'asdc', 'asdasd', 1),
(9, 2, 'rferf', '2016-04-05 00:00:00', 'ferf', 'erfer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_reports`
--

CREATE TABLE IF NOT EXISTS `na_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `na_reports`
--

INSERT INTO `na_reports` (`id`, `ind_id`, `report_date`, `description`, `status`) VALUES
(21, 1, '0000-00-00', 'HELLO', 1),
(22, 1, '0000-00-00', 'Hello', 1),
(23, 1, '0000-00-00', 'dfdss', 1),
(24, 1, '0000-00-00', 'Test Mail', 1),
(25, 1, '2016-04-06', 'test', 1),
(26, 1, '2016-04-18', 'Test Message', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_schools_facilities`
--

CREATE TABLE IF NOT EXISTS `na_schools_facilities` (
  `schools_facilities_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `school_bulletin` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pnone_no` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `websites` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `school_information` longtext NOT NULL,
  `schoolprogram_information` longtext NOT NULL,
  `schoolwebsite` varchar(255) NOT NULL,
  `programs_div` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ind_id` int(11) NOT NULL,
  PRIMARY KEY (`schools_facilities_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `na_sch_course`
--

CREATE TABLE IF NOT EXISTS `na_sch_course` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `schedule` date DEFAULT NULL,
  `facilities` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `na_sch_lectures`
--

CREATE TABLE IF NOT EXISTS `na_sch_lectures` (
  `lec_id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`lec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_sch_lectures`
--

INSERT INTO `na_sch_lectures` (`lec_id`, `ind_id`, `video`, `camera`, `status`) VALUES
(2, 2, 'http://dfsdsfsd.com', 'http://dfsdsfsd.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_seminars`
--

CREATE TABLE IF NOT EXISTS `na_seminars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `Seminar Schedule` datetime NOT NULL,
  `seminar_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `na_seminar_attend`
--

CREATE TABLE IF NOT EXISTS `na_seminar_attend` (
  `semi_id` int(11) DEFAULT NULL,
  `ind_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `semi_schedule` date DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  UNIQUE KEY `semi_id` (`semi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `na_seminar_attend`
--

INSERT INTO `na_seminar_attend` (`semi_id`, `ind_id`, `name`, `Description`, `semi_schedule`, `entry_date`, `status`) VALUES
(NULL, 1, 'asdf', 'asdf', '2016-04-13', '0000-00-00 00:00:00', 1),
(NULL, 1, 'asd', 'asda', '2016-04-20', '0000-00-00 00:00:00', 1),
(NULL, 1, 'AHGD', 'AS,JCBN', '2016-04-05', '0000-00-00 00:00:00', 1),
(NULL, 1, 'ASDF', 'ASDF', '2016-04-21', '0000-00-00 00:00:00', 1),
(NULL, 1, 'SDVC', 'SDVC', '2016-04-19', '1970-01-01 00:00:00', 1),
(NULL, 1, 'asc', 'asdc', '2016-05-06', '1970-01-01 00:00:00', 1),
(NULL, 1, 'sdf', 'asdf', '2016-04-20', '0000-00-00 00:00:00', 1),
(NULL, 1, 'asdvf', 'asdvf', '2016-04-12', '0000-00-00 00:00:00', 1),
(NULL, 1, 'sdc', 'asdc', '2016-04-08', '1970-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_settings`
--

CREATE TABLE IF NOT EXISTS `na_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_type` varchar(256) NOT NULL,
  `config_val` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `na_settings`
--

INSERT INTO `na_settings` (`id`, `config_type`, `config_val`) VALUES
(1, 'google_analytics', 'Code'),
(2, 'facebook_link', 'http://facebook.com/'),
(3, 'twitter_link', 'https://twitter.com/'),
(6, 'youtube_link', ''),
(11, 'paypal_business_id', 'info@gmail.com'),
(17, 'googleplus_link', 'https://plus.google.com/'),
(18, 'tumbir_link', ''),
(19, 'instagram_link', 'https://instagram.com/'),
(20, 'vimeo_link', 'http://vimeo.com/'),
(21, 'pinterest_link', 'http://pinterest.com/'),
(22, 'linkedin_link', 'https://in.linkedin.com/');

-- --------------------------------------------------------

--
-- Table structure for table `na_student`
--

CREATE TABLE IF NOT EXISTS `na_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms_no` bigint(20) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `conference_id` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `social_id_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_student`
--

INSERT INTO `na_student` (`id`, `name`, `address`, `phone`, `mobile`, `email`, `sms_no`, `ip_address`, `website`, `domain_name`, `url`, `conference_id`, `gender`, `social_id_no`, `dob`, `description`, `status`) VALUES
(1, 'Kaushik', 'Durgapur', 9855544478, 9854125689, 'lipsum@gmail.com', 9851258965, '192.168.2.0', 'www.google.com', '0', 'www.xxxp.com', 'x958p', 1, 'BF889pi', '1985-03-02', 'sdfsdfsdfsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_student_experience`
--

CREATE TABLE IF NOT EXISTS `na_student_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `position` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `na_student_experience`
--

INSERT INTO `na_student_experience` (`id`, `ind_id`, `employer_name`, `from_date`, `to_date`, `position`, `job_description`, `status`) VALUES
(1, 1, 'Wipro', '2015-06-03 00:00:00', '2016-09-03 00:00:00', 'Developer', '<p>I was a developers</p>', 1),
(2, 2, 'aaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aaaaaaa', '<p>aaaaaaaaaaaa</p>', 1),
(3, 6, 'Employer Name', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Position / Title', '<p>Description</p>', 1),
(4, 4, 'Employer Name', '2016-03-22 00:00:00', '2016-03-23 00:00:00', 'Position / Title', '<p>Description</p>', 1),
(5, 2, 'Employer Name', '2016-03-01 00:00:00', '2016-03-03 00:00:00', 'Position / Title', '<p>vcxbvxbvxb</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_sturec_personal_recommendations`
--

CREATE TABLE IF NOT EXISTS `na_sturec_personal_recommendations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `per_prov_rec` varchar(255) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `recorded_video` varchar(255) NOT NULL,
  `recom_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_sturec_personal_recommendations`
--

INSERT INTO `na_sturec_personal_recommendations` (`id`, `ind_id`, `per_prov_rec`, `recommendation`, `recorded_video`, `recom_date`, `status`) VALUES
(1, 2, 'efewf', 'wesfedsf', 'sewfedf', '2016-04-06 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_sturec_reference`
--

CREATE TABLE IF NOT EXISTS `na_sturec_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `dateofreference` date NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_position` varchar(255) NOT NULL,
  `ref_phone` bigint(20) NOT NULL,
  `ref_emailaddress` varchar(255) NOT NULL,
  `ref_relationship` varchar(255) NOT NULL,
  `ref_recominfo` varchar(255) NOT NULL,
  `ref_recomvideo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `na_sturec_reference`
--

INSERT INTO `na_sturec_reference` (`id`, `ind_id`, `dateofreference`, `ref_name`, `ref_position`, `ref_phone`, `ref_emailaddress`, `ref_relationship`, `ref_recominfo`, `ref_recomvideo`, `status`) VALUES
(1, 2, '2016-04-25', 'sasa', 'asas', 21233131, 'sdqq31ewqsds', 'sdsadasd', 'adsdada', 'dasd.col', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_academic_transcript`
--

CREATE TABLE IF NOT EXISTS `na_st_academic_transcript` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `grades` varchar(255) NOT NULL,
  `notes` longtext NOT NULL,
  `comments` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `na_st_academic_transcript`
--

INSERT INTO `na_st_academic_transcript` (`id`, `ind_id`, `grades`, `notes`, `comments`, `messages`, `phone`, `email`, `ipaddress`, `website`, `domain_name`, `url`, `learning_portal`, `academic_program`, `course`, `curriculum`, `syllabus`, `status`) VALUES
(19, 1, 'A+', 'test notes', 'test comment', 'test message', 0, '', '', '', '', '', '', '', '', '', '', 1),
(20, 1, 'B+', 'hi ', 'hi  john', 'hi  john john', 0, '', '', '', '', '', '', '', '', '', '', 1),
(21, 2, 'a+', 'sasa', 'sasas', 'sasas', 0, '', '', '', '', '', '', '', '', '', '', 1),
(22, 2, 'V+', 'sas', 'sas', 'sasa', 0, '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_award`
--

CREATE TABLE IF NOT EXISTS `na_st_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `award_name` varchar(255) NOT NULL,
  `award_date` datetime NOT NULL,
  `award_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `na_st_award`
--

INSERT INTO `na_st_award` (`id`, `ind_id`, `award_name`, `award_date`, `award_description`, `status`) VALUES
(10, 2, 'assa', '2016-04-13 00:00:00', 'asdasdsad', 1),
(11, 2, 'Best Sports Man', '2016-04-02 00:00:00', 'dfdfgdfgdfdf', 1),
(12, 2, 'Best Student', '2016-04-13 00:00:00', 'tytyutytyutyuty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_coach`
--

CREATE TABLE IF NOT EXISTS `na_st_coach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `coach_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sample` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `na_st_coach`
--

INSERT INTO `na_st_coach` (`id`, `ind_id`, `coach_name`, `description`, `sample`, `phone`, `email`, `video`, `status`) VALUES
(4, 2, 'qw wr', 'asdcdasc', 'dcsadsc', 787654321, 'as@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_drug`
--

CREATE TABLE IF NOT EXISTS `na_st_drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `reason` longtext NOT NULL,
  `drug_date` datetime NOT NULL,
  `outcome` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `na_st_drug`
--

INSERT INTO `na_st_drug` (`id`, `ind_id`, `drug_name`, `reason`, `drug_date`, `outcome`, `status`) VALUES
(9, 2, 'adsfsd', 'sadf', '2016-04-12 00:00:00', 'sadf', 1),
(10, 2, 'dcasdc', 'sdc', '2016-03-28 00:00:00', 'asdc', 1),
(11, 2, 'sdfv', 'sdvsd', '2016-04-05 00:00:00', 'sdv', 1),
(12, 2, 'Setrazin', 'dfdfgdfgdfg', '2016-04-07 00:00:00', 'positive', 1),
(13, 2, 'Calpol', 'sdfsdfsedfsdfsdf', '2016-04-07 00:00:00', 'Not Good', 1),
(14, 2, 'Paracitamol', 'asaasa', '2016-04-04 00:00:00', 'Hello', 1),
(15, 2, 'Test Drug', 'sefsdfsdf', '2016-06-23 00:00:00', 'positive', 1),
(16, 2, 'yyyyyyooooo', 'ppppppppppppppppp', '2016-06-10 00:00:00', 'nnnnnnnnnnnnnn', 1),
(17, 2, 'yyyyyyooooo', 'adasdasdasd', '2016-06-09 00:00:00', 'nnnnnnnnnnnnnn', 1),
(32, 15, 'Saridon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0000-00-00 00:00:00', 'Test asndb', 0),
(34, 15, 'Saridon', 'hfrtdghfg fghfgh', '2016-06-22 00:00:00', 'Test asndb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_educational_records`
--

CREATE TABLE IF NOT EXISTS `na_st_educational_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `grades` varchar(255) NOT NULL,
  `notes` longtext NOT NULL,
  `comments` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `na_st_educational_records`
--

INSERT INTO `na_st_educational_records` (`id`, `ind_id`, `grades`, `notes`, `comments`, `messages`, `phone`, `email`, `ipaddress`, `website`, `domain_name`, `url`, `learning_portal`, `academic_program`, `course`, `curriculum`, `syllabus`, `status`) VALUES
(16, 0, 'Rana', 'Rana', 'Rana', 'Rana', 0, '', '', '', '', '', '', '', '', '', '', 1),
(17, 0, 'dfgdsgds', 'dfgds', 'dfgdssd', 'dgd', 0, '', '', '', '', '', '', '', '', '', '', 1),
(18, 0, 'FANANA', 'dfgds', 'dddddddddddddddddd', 'ddddddddddddddd', 0, '', '', '', '', '', '', '', '', '', '', 1),
(19, 1, 'A+', 'test notes', 'test comment', 'test message', 0, '', '', '', '', '', '', '', '', '', '', 1),
(20, 1, 'B+', 'hi ', 'hi  john', 'hi  john john', 0, '', '', '', '', '', '', '', '', '', '', 1),
(21, 1, 'C+', 'Test', 'Test', 'Test', 0, '', '', '', '', '', '', '', '', '', '', 1),
(22, 1, 'U++', 'uuuuuuuu', 'uuuuuuuuuuu', 'uuuuuuuuuuuuuuuu', 0, '', '', '', '', '', '', '', '', '', '', 1),
(23, 1, 'D++', 'DJ', 'DJ', 'DJ', 0, '', '', '', '', '', '', '', '', '', '', 1),
(24, 1, 'B++', 'Test mail', 'Test mail', 'Test mail', 0, '', '', '', '', '', '', '', '', '', '', 1),
(25, 1, 'E++', 'test now', 'test now', 'test now', 0, '', '', '', '', '', '', '', '', '', '', 1),
(26, 2, 'B+', 'asas', 'sasa', 'asasa', 0, '', '', '', '', '', '', '', '', '', '', 1),
(27, 2, 'asas', 'asasas', 'asascas', 'cascascas', 0, '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_eduinstitute`
--

CREATE TABLE IF NOT EXISTS `na_st_eduinstitute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `school_bulletin` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel_no` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sms_no` bigint(20) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `schools` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `na_st_eduinstitute`
--

INSERT INTO `na_st_eduinstitute` (`id`, `ind_id`, `institute_name`, `description`, `school_bulletin`, `instructor`, `address`, `tel_no`, `email`, `sms_no`, `ip_address`, `website`, `domain_name`, `url`, `learning_portal`, `schools`, `status`) VALUES
(8, 2, 'qw wr', 'asdsad', 'asd', 'asd', 'ghgfhfgh', 787654321, 'as@gmail.com', 0, '123.23.23.23', 'sdcsdd', 'sadcsdac', '', 'asdcsadcsa', 'dcsadcsd', 1),
(9, 2, 'DAV Model', 'gdfgdfgdfsfg', 'test bulletin123', 'Akash Banerjee', '33/2 Sant Ana', 9854125689, 'lipsum@gmail.com', 9999555544, '192.168.2.0', 'crickinfo.com', 'crickinfogg', 'http://www.google.com', 'w3schools', 'Modern', 1),
(10, 2, 'AIEMD', 'Good COllege', 'A+', 'AKD', 'asasasasa', 1121211, 'a@a.com', 211121, '111.011.20', 'arup.com', 'arup', 'site.goigi.biz/dentalspecialistinstitute', 'qqqq.qq.com', 'aaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_eduinstitute_attended`
--

CREATE TABLE IF NOT EXISTS `na_st_eduinstitute_attended` (
  `st_id` varchar(255) DEFAULT NULL,
  `ind_id` int(11) NOT NULL,
  `program_enroll` varchar(255) DEFAULT NULL,
  `attend_date` date DEFAULT NULL,
  `course_taken` varchar(255) DEFAULT NULL,
  `Grades` varchar(50) DEFAULT NULL,
  `course_enrolled` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  UNIQUE KEY `st_id` (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `na_st_eduinstitute_attended`
--

INSERT INTO `na_st_eduinstitute_attended` (`st_id`, `ind_id`, `program_enroll`, `attend_date`, `course_taken`, `Grades`, `course_enrolled`, `status`) VALUES
(NULL, 2, 'certificate', '2016-04-11', 'asa', 'assa', 'asaas', 1),
(NULL, 2, 'degree', '2016-04-05', 'sas', 'ass', 'asasa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_extracurricullam`
--

CREATE TABLE IF NOT EXISTS `na_st_extracurricullam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `activity_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `na_st_extracurricullam`
--

INSERT INTO `na_st_extracurricullam` (`id`, `ind_id`, `activity_name`, `from_date`, `activity_description`, `status`) VALUES
(6, 2, 'Activity Name', '2016-03-08 00:00:00', '', 1),
(7, 6, 'Activity Name', '2016-02-29 00:00:00', '<p>Description</p>', 1),
(8, 4, 'Activity Name123', '2016-03-07 00:00:00', '<p>Description123</p>', 1),
(9, 1, 'Painting', '2016-03-08 00:00:00', 'Drawing', 1),
(10, 1, 'Playing', '2016-03-31 00:00:00', 'Cricket', 1),
(11, 1, 'Swiming', '2016-03-10 00:00:00', 'SwimingSwimingSwiming', 1),
(12, 2, 'Playing', '2016-03-09 00:00:00', 'Football', 1),
(13, 1, 'Singing', '2016-03-10 00:00:00', 'assaa', 1),
(14, 2, 'Dancing', '2016-04-12 00:00:00', 'asasasasasas', 1),
(15, 2, 'hello', '2016-04-03 00:00:00', 'sdsd', 1),
(16, 2, 'aaasa', '2016-04-03 00:00:00', 'asas', 1),
(17, 2, 'Playing', '2016-04-19 00:00:00', 'wtertertertert', 1),
(18, 2, 'dsad', '2016-04-03 00:00:00', 'asddas', 1),
(19, 2, 'aaasa', '2016-04-05 00:00:00', 'asasasas', 1),
(20, 2, 'as', '2016-04-03 00:00:00', 'as', 1),
(21, 2, 'swiming', '2016-04-04 00:00:00', 'dasdasda', 1),
(22, 2, 'Test Activity', '2016-04-06 00:00:00', 'sdsdfsdfsdfsdfsf', 1),
(23, 2, 'Dancing', '2016-04-12 00:00:00', 'asaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_facilities`
--

CREATE TABLE IF NOT EXISTS `na_st_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `prog_enrolled` varchar(255) NOT NULL,
  `datesofattendence` date NOT NULL,
  `classes_taken` varchar(255) NOT NULL,
  `achievements` varchar(255) NOT NULL,
  `current_schedule` datetime NOT NULL,
  `awards_conferred` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_st_facilities`
--

INSERT INTO `na_st_facilities` (`id`, `ind_id`, `prog_enrolled`, `datesofattendence`, `classes_taken`, `achievements`, `current_schedule`, `awards_conferred`, `status`) VALUES
(2, 2, 'sdfvsdc', '2016-04-12', 'sdcsdc', 'sadcsadcsa', '2016-04-13 00:00:00', 'sdcsdc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_individual`
--

CREATE TABLE IF NOT EXISTS `na_st_individual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `conference_id` varchar(255) NOT NULL,
  `social_seq_no` int(11) NOT NULL,
  `tel_no` bigint(20) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `dob` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `na_st_individual`
--

INSERT INTO `na_st_individual` (`id`, `ind_id`, `gender`, `conference_id`, `social_seq_no`, `tel_no`, `mobile_no`, `ip_address`, `description`, `dob`, `status`) VALUES
(6, 2, 'M', '098765', 121212, 0, 0, '192.1.2.3', 'asasas', '1970-01-01', 1),
(7, 2, 'M', '1234234', 121212, 0, 0, '192.2.2,2', 'ffewf', '1970-01-01', 1),
(8, 0, 'M', '1324134', 21341234, 0, 0, '123123', 'ram', '1970-01-01', 1),
(9, 2, 'M', 'xxc1', 0, 0, 0, '192.168.10.2', 'sedfsdfsdfsdfsdfsdfsefwefrsdfserfwerfwewe', '2016-04-12', 1),
(10, 2, 'M', '121212', 121212, 0, 0, '198.12.12.12', 'qwedwd', '2016-04-05', 1),
(11, 0, 'F', '121212', 121212, 0, 0, '198.12.12.12', 'asdasd', '2016-04-12', 1),
(12, 2, 'M', '1234', 134, 0, 0, '198.12.12.14', 'ewdwd', '2016-03-30', 1),
(13, 0, 'F', '121212ewd', 121212, 0, 0, '198.12.12.12', 'wedwe', '2016-03-29', 1),
(14, 0, 'M', '121212ewd', 121212, 0, 0, '198.12.12.12', 'wedwe', '2016-03-29', 1),
(15, 0, 'M', '121212', 121212, 0, 0, '198.12.12.12', 'ergtr', '2016-04-06', 1),
(16, 0, 'M', '121212111', 12121211, 0, 0, '198.12.12.121', 'ssass', '2016-03-30', 1),
(17, 0, 'M', 'sdacsdc', 0, 0, 0, '123.12.12.12', 'cascasc', '2016-04-05', 1),
(18, 0, 'M', '123234', 12334, 0, 0, '198.12.12.121', 'sqdsd', '2016-04-06', 1),
(19, 0, 'M', '1234', 12313, 0, 0, '198.12.12.11', 'cvsdvv', '2016-03-29', 1),
(20, 2, 'M', '121212', 121212, 0, 0, '198.12.12.12', 'sefdfsdfsdfsdf', '2016-04-06', 1),
(21, 2, 'M', '121212', 134, 0, 0, '198.12.12.121', 'werwerwerwer', '2016-04-06', 1),
(43, 15, 'M', '12345', 1234567, 0, 0, '::1', 'sdkfkjsd sdkfkdjs fkdjsahfds fhsdakf sdakhfkadjsf sdkfhsdhf kadsfk', '2016-06-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_issuer_of_report`
--

CREATE TABLE IF NOT EXISTS `na_st_issuer_of_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel_no` bigint(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `na_st_issuer_of_report`
--

INSERT INTO `na_st_issuer_of_report` (`id`, `ind_id`, `name`, `tel_no`, `website`, `url`, `description`, `status`) VALUES
(21, 1, 'Debjit', 9854345423, 'facebook.com', 'facebook.com', 'HELLO', 1),
(22, 1, 'RAJ', 9856985623, 'goigi', 'goigi.net', 'Hello', 1),
(23, 2, 'Barry Allen', 1212121212, 'arup.com', 'http://localhost/dentalspecialistinstitute/', 'asasasasasa', 1),
(24, 2, 'aaa', 1121211, 'arup.com', 'arup.goigi.asia', '1212', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_messages`
--

CREATE TABLE IF NOT EXISTS `na_st_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `na_st_messages`
--

INSERT INTO `na_st_messages` (`id`, `ind_id`, `report_date`, `description`, `status`) VALUES
(27, 2, '2016-04-25', 'hiiiii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_recomendation`
--

CREATE TABLE IF NOT EXISTS `na_st_recomendation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `recomendation_person` varchar(255) NOT NULL,
  `recomendation` varchar(255) NOT NULL,
  `rec_video_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `na_st_recomendation`
--

INSERT INTO `na_st_recomendation` (`id`, `ind_id`, `recomendation_person`, `recomendation`, `rec_video_link`, `status`) VALUES
(1, 2, 'test recomentation person', 'Test Recomendation', 'http://recvideo.com/video2', 1),
(2, 1, 'a', 'hellooooo', 'http://www.google.com', 1),
(3, 1, 'Arup', 'HElllo', 'http://www.google.com', 1),
(4, 1, 'Barry Allen', 'The Flash', 'https://en.wikipedia.org/wiki/Flash_%28Barry_Allen%29', 1),
(5, 2, 'flash', 'asasa', 'http://www.google.com', 1),
(6, 2, 'Arrow', 'sasasasdadaswdsadasda', 'https://en.wikipedia.org/wiki/Flash_%28Barry_Allen%29', 1),
(7, 2, 'Arrow', 'asasa', 'http://www.google.com', 1),
(8, 2, 'Test person', 'test recomendation.............', 'http://www.google.com', 1),
(9, 2, 'test recomentation person1', 'thfghfghfghrtyrtyry', 'http://recvideo.com/video1', 1),
(10, 2, 'Kaushik', 'test recomendationnnnnnn', 'homevideo123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_rehabilitation`
--

CREATE TABLE IF NOT EXISTS `na_st_rehabilitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `rehab_name` varchar(255) NOT NULL,
  `rehab_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `outcome` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `na_st_rehabilitation`
--

INSERT INTO `na_st_rehabilitation` (`id`, `ind_id`, `rehab_name`, `rehab_date`, `description`, `outcome`, `status`) VALUES
(8, 2, 'asdasasd', '2016-04-13 00:00:00', '1sdasas', '121212312', 1),
(9, 2, 'Test Rehabkkk', '2016-04-20 00:00:00', 'dfgdfgdfgdfgdghghdgh', 'Good Result', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_reports`
--

CREATE TABLE IF NOT EXISTS `na_st_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `na_st_reports`
--

INSERT INTO `na_st_reports` (`id`, `ind_id`, `report_date`, `description`, `status`) VALUES
(27, 2, '2016-04-03', 'saa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_seminars`
--

CREATE TABLE IF NOT EXISTS `na_st_seminars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `Seminar Schedule` datetime NOT NULL,
  `seminar_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `na_st_seminar_attend`
--

CREATE TABLE IF NOT EXISTS `na_st_seminar_attend` (
  `semi_id` int(11) DEFAULT NULL,
  `ind_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `semi_schedule` date DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  UNIQUE KEY `semi_id` (`semi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `na_st_seminar_attend`
--

INSERT INTO `na_st_seminar_attend` (`semi_id`, `ind_id`, `name`, `Description`, `semi_schedule`, `entry_date`, `status`) VALUES
(NULL, 2, 'abc', 'sasa', '2016-04-18', '1970-01-01 00:00:00', 1),
(NULL, 2, 'abc', '<p>The reason this works is because CI is nice enough to</p>', '2016-04-03', '1970-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_student_experience`
--

CREATE TABLE IF NOT EXISTS `na_st_student_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `position` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `na_st_student_experience`
--

INSERT INTO `na_st_student_experience` (`id`, `ind_id`, `employer_name`, `from_date`, `to_date`, `position`, `job_description`, `status`) VALUES
(1, 1, 'Wipro', '2015-06-03 00:00:00', '2016-09-03 00:00:00', 'Developer', '<p>I was a developers</p>', 1),
(2, 2, 'aaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aaaaaaa', '<p>aaaaaaaaaaaa</p>', 1),
(3, 6, 'Employer Name', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Position / Title', '<p>Description</p>', 1),
(4, 4, 'Employer Name', '2016-03-22 00:00:00', '2016-03-23 00:00:00', 'Position / Title', '<p>Description</p>', 1),
(5, 2, 'Employer Name', '2016-03-01 00:00:00', '2016-03-03 00:00:00', 'Position / Title', '<p>vcxbvxbvxb</p>', 1),
(6, 1, 'Oliver Queen', '2016-03-08 00:00:00', '2016-03-10 00:00:00', 'CEO', 'CEO of Queen Consolidated', 1),
(7, 1, 'indian Army', '2016-03-28 00:00:00', '2016-03-31 00:00:00', 'Majour', 'Jai Hind', 1),
(8, 2, 'IGI', '2016-04-05 00:00:00', '2016-04-07 00:00:00', 'Developer', 'asasasa', 1),
(9, 2, 'IGI', '2016-04-12 00:00:00', '2016-04-13 00:00:00', 'Developer', 'asasa', 1),
(10, 2, 'Oliver Queen', '2016-04-26 00:00:00', '2016-04-26 00:00:00', 'Majour', 'asaa', 1),
(11, 2, 'IBPS', '2016-04-12 00:00:00', '2016-04-19 00:00:00', 'as', 'sas', 1),
(12, 2, 'SBI PO', '2016-04-04 00:00:00', '2016-04-25 00:00:00', 'SBI PO', 'SBI PO', 1),
(13, 2, 'Oliver Queen', '2016-04-04 00:00:00', '2016-04-05 00:00:00', 'ads', 'sadas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_teacher`
--

CREATE TABLE IF NOT EXISTS `na_st_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `information` longtext NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `na_st_teacher`
--

INSERT INTO `na_st_teacher` (`id`, `ind_id`, `teacher_name`, `information`, `address`, `phone`, `email`, `learning_portal`, `academic_program`, `course`, `curriculum`, `syllabus`, `status`) VALUES
(7, 2, 'qw wr', '', '', 787654321, 'as@gmail.com', 'asas', 'asxasx', 'asas', '', '', 1),
(8, 2, 'Test teacher', '', '', 9854444444, 'testteacher@gmail.com', 'test portal', 'test program', 'MBA', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_st_video_presentation`
--

CREATE TABLE IF NOT EXISTS `na_st_video_presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `link_rec_video` varchar(255) NOT NULL,
  `ip_live_cam` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `na_st_video_presentation`
--

INSERT INTO `na_st_video_presentation` (`id`, `video_date`, `description`, `link_rec_video`, `ip_live_cam`, `comments`, `status`) VALUES
(2, '2016-02-11 00:00:00', '<p>This is a test video file</p>', 'http://videolink.com/video3', '193.156.2.3', 'hello', 1),
(3, '2016-04-12 00:00:00', 'sasa', 'sasasa.dfdsfsd', '111', 'assas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_teacher`
--

CREATE TABLE IF NOT EXISTS `na_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `information` longtext NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `learning_portal` varchar(255) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `na_teacher`
--

INSERT INTO `na_teacher` (`id`, `ind_id`, `teacher_name`, `information`, `address`, `phone`, `email`, `ipaddress`, `website`, `domain_name`, `url`, `learning_portal`, `academic_program`, `course`, `curriculum`, `syllabus`, `status`) VALUES
(2, 0, 'Arup Dutta', 'php', '0', 9547399026, 'a@a.com', '0', '0', '0', '0', 'abc.de.efgh.com', 'testtt', 'CodeIgniter', '0', '0', 1),
(3, 0, 'Barry Allen', 'MVC', '0', 1111111111, 'b@b.com', '0', '0', '0', '0', 'qqqq.qq.com', 'Hybernet', 'Java', '0', '0', 1),
(4, 0, 'Olive Queen', 'asasaa', '0', 22222222, 'o@o.com', '0', '0', '0', '0', 'abc.de.efgh.com', 'asasasa', 'ASP.NET', '0', '0', 1),
(5, 0, 'test teacher', 'test infor', '0', 9854125689, 'testteacher@gmail.com', '0', '0', '0', '0', 'test learning', 'test program', 'test course', '0', '0', 1),
(6, 2, 'Adam Jak', 'test infor', '', 9855544478, 'adam@gmail.com', '', '', '', '', 'test learning', 'test program', 'test course', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `na_user_contact`
--

CREATE TABLE IF NOT EXISTS `na_user_contact` (
  `ContactId` int(11) NOT NULL AUTO_INCREMENT,
  `Uid` int(11) NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `ReplyMessage` text NOT NULL,
  `ReplyStatus` enum('Yes','No') NOT NULL DEFAULT 'No',
  `ReplyDate` datetime NOT NULL,
  `ContactDate` datetime NOT NULL,
  PRIMARY KEY (`ContactId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `na_user_contact`
--

INSERT INTO `na_user_contact` (`ContactId`, `Uid`, `ContactName`, `Subject`, `Phone`, `Email`, `Message`, `ReplyMessage`, `ReplyStatus`, `ReplyDate`, `ContactDate`) VALUES
(2, 0, 'Mannu', '', '9933734350', 'abc@gmail.com', 'Test Mail ahsbdvahsd asd', '', 'No', '0000-00-00 00:00:00', '2015-08-26 18:11:30'),
(3, 0, 'Mannu', '', '9933734350', 'abc@gmail.com', 'Test Mail ahsbdvahsd asd', '', 'No', '0000-00-00 00:00:00', '2015-08-26 18:11:46'),
(4, 0, 'Mannu 2', '', '9933734350', 'abc@gmail.com', 'Test nasdbjkasd ashdmas dashdklas', 'dfsgdsfgdfg', 'Yes', '2015-08-26 18:17:16', '2015-08-26 18:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `na_video_presentation`
--

CREATE TABLE IF NOT EXISTS `na_video_presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_id` int(11) NOT NULL,
  `video_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `link_rec_video` varchar(255) NOT NULL,
  `ip_live_cam` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `na_video_presentation`
--

INSERT INTO `na_video_presentation` (`id`, `ind_id`, `video_date`, `description`, `link_rec_video`, `ip_live_cam`, `comments`, `status`) VALUES
(2, 0, '2016-02-11 00:00:00', '<p>This is a test video file</p>', 'http://videolink.com/video3', '193.156.2.3', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
