-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2012 at 02:16 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `janabhumi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(10) unsigned NOT NULL auto_increment,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_username`, `admin_password`, `admin_email`, `admin_name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ss83048@gmail.com', 'Janabhumi');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_ID` int(8) unsigned NOT NULL auto_increment,
  `category_name` varchar(14) NOT NULL,
  PRIMARY KEY  (`category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_ID`, `category_name`) VALUES
(1, 'Home'),
(2, 'Latest news'),
(3, 'Sports'),
(4, 'Lifestyle'),
(5, 'Health'),
(6, 'Travel'),
(7, 'Classifieds'),
(8, 'Photos'),
(9, 'Videos'),
(10, 'Contacts');

-- --------------------------------------------------------

--
-- Table structure for table `home_right_adv`
--

CREATE TABLE `home_right_adv` (
  `pri_ID` int(10) unsigned NOT NULL auto_increment,
  `adv_image` varchar(100) NOT NULL,
  `category_ID` int(10) NOT NULL,
  `page` varchar(10) NOT NULL,
  PRIMARY KEY  (`pri_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `home_right_adv`
--

INSERT INTO `home_right_adv` (`pri_ID`, `adv_image`, `category_ID`, `page`) VALUES
(2, '20296_add_2.png', 2, 'details'),
(3, '7563_center_300.png', 2, 'home'),
(4, '25057_rgt_300x250.png', 2, 'home'),
(5, '14244_add_2.png', 2, 'details'),
(6, '8014_center_300_2.png', 6, 'home'),
(7, '9519_center_300.png', 5, 'home'),
(8, '18543_rgt_300x250.png', 4, 'home'),
(9, '22332_add_2.png', 7, 'home'),
(10, '15632_rgt_300x250.png', 3, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `index_adv`
--

CREATE TABLE `index_adv` (
  `pri_ID` int(8) unsigned NOT NULL auto_increment,
  `adv_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`pri_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `index_adv`
--

INSERT INTO `index_adv` (`pri_ID`, `adv_image`) VALUES
(1, 'add_2.png'),
(2, 'center_300.png'),
(3, 'center_300_2.png'),
(4, 'right_300.png');

-- --------------------------------------------------------

--
-- Table structure for table `index_flash`
--

CREATE TABLE `index_flash` (
  `news_ID` int(10) unsigned NOT NULL auto_increment,
  `news_title` varchar(50) NOT NULL,
  `news_desc` text NOT NULL,
  `news_thumb_image` varchar(100) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_date` int(10) NOT NULL,
  PRIMARY KEY  (`news_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `index_flash`
--

INSERT INTO `index_flash` (`news_ID`, `news_title`, `news_desc`, `news_thumb_image`, `news_image`, `news_date`) VALUES
(1, 'Coral reef', 'Lorem ipsum dolor sit ame.', '21330_sea-turtle-thumb.jpg', '9763_orange-fish-thumb.jpg', 0),
(2, 'Sea Turfle', 'Lorem ipsum dolor sit ame.', '5920_blue-fish-thumb.jpg', '18649_blue-fish.jpg', 0),
(3, 'Blue fish', 'Lorem ipsum dolor sit ame.', '8002_orange-fish-thumb.jpg', '6995_orange-fish.jpg', 0),
(4, 'Sea Turfle', 'Lorem ipsum dolor sit ame.', '21150_red-coral-thumb.jpg', '383_red-coral.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `index_news`
--

CREATE TABLE `index_news` (
  `news_ID` int(10) unsigned NOT NULL auto_increment,
  `news_title` varchar(50) NOT NULL,
  `news_desc` text NOT NULL,
  `category_ID` int(8) NOT NULL,
  `news_thumb_image` varchar(100) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_date` int(10) NOT NULL,
  PRIMARY KEY  (`news_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `index_news`
--

INSERT INTO `index_news` (`news_ID`, `news_title`, `news_desc`, `category_ID`, `news_thumb_image`, `news_image`, `news_date`) VALUES
(1, 'Kerala Kazhchakal', 'fkfjk', 1, '22159_kerala_kazhchakal.png', '7452_kerala_kazhchakal.png', 0),
(2, 'Janabhumi News Special', 'fksf fkjsfjskf', 1, '4876_jana_special.jpg', '29781_jana_special.jpg', 0),
(3, 'uuuuuuuuu', 'jhjuuuuuuuuuuuu', 3, '11629_sports.png', '15778_sports.png', 0),
(4, 'wwwwwwww', 'kjjkwwwwwwwwww', 7, '18995_300x100.png', '20976_300x100.png', 0),
(5, 'sssssssssssssss', 'aaadaghsssssssss', 6, '3468_travel.png', '7381_travel.png', 0),
(6, 'eeeeeeeeeee', 'fhjheeeeeeeeee', 4, '19334_lifestyle.png', '11335_lifestyle.png', 0),
(7, 'ddddddd', 'fjhjdddddddd', 5, '11380_health.png', '30109_health.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `index_right_adv`
--

CREATE TABLE `index_right_adv` (
  `pri_ID` int(8) unsigned NOT NULL auto_increment,
  `adv_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`pri_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `index_right_adv`
--

INSERT INTO `index_right_adv` (`pri_ID`, `adv_image`) VALUES
(1, '4488_center_300.png'),
(2, '25622_rgt_300x250.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_ID` int(10) unsigned NOT NULL auto_increment,
  `news_title` varchar(50) NOT NULL,
  `news_desc` text NOT NULL,
  `category_ID` int(8) NOT NULL,
  `news_thumb_image` varchar(100) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_flash` enum('0','1') NOT NULL,
  `news_flash_image` varchar(100) NOT NULL default '1',
  `news_date` int(10) NOT NULL,
  PRIMARY KEY  (`news_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_ID`, `news_title`, `news_desc`, `category_ID`, `news_thumb_image`, `news_image`, `news_flash`, `news_flash_image`, `news_date`) VALUES
(1, 'fskfjskfj', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 2, '5644_', '15189_', '0', '1', 0),
(2, 'uuuuuuuuuuu', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 2, '22890_', '3675_letest_pic.jpg', '0', '1', 0),
(3, 'jjjjjjjjjjjjjjj', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 2, '7786_news_pic.png', '28507_letest_pic.jpg', '0', '1', 0),
(4, 'fjkfjdfksjfk', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 4, '10768_', '30985_', '0', '1', 0),
(5, 'kfjfksjf', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 3, '1356_news_pic.png', '6549_letest_pic.jpg', '0', '1', 0),
(6, 'riruueriw', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 3, '1784_news_pic.png', '14289_letest_pic.jpg', '0', '1', 0),
(7, 'fkjfkfjkfs', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 5, '24083_', '2128_', '0', '1', 0),
(8, 'fksfjkfjfk flfksdkf', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 2, '15444_', '30717_', '0', '1', 0),
(9, 'sfkjk', 'fskfsjf', 2, '3322_', '25259_', '0', '1', 0),
(10, 'fkdfjskfj', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 5, '28046_news_pic.png', '6575_health.png', '0', '1', 0),
(11, 'uriuwriri', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 6, '32579_', '18880_', '0', '1', 0),
(12, 'skfjkfsjdk', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 7, '22797_', '4290_', '0', '1', 0),
(13, 'popopppopo', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 3, '10808_news_pic.png', '14865_sports.png', '0', '1', 0),
(14, 'eewrwrrw', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 6, '6006_news_pic.png', '8567_letest_pic.jpg', '0', '1', 0),
(15, 'uririuriruirw', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 5, '14134_news_pic.png', '9783_letest_pic.jpg', '0', '1', 0),
(16, 'qeeqeeiorirowror', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 6, '22078_', '19615_', '0', '1', 0),
(17, 'fksfhhjfhjf', 'ÈcâÁWÙß D øÞ¼cJßæa ÉÄßÎâKÞÎÄí øÞ×íd¿ÉÄß ÉÆJßnW §Èß dÉÃÌí µáÎÞV Îá~V¼ß....', 2, '28072_', '4289_', '0', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_flash`
--

CREATE TABLE `news_flash` (
  `news_flash_ID` int(10) unsigned NOT NULL auto_increment,
  `news_flash_image` varchar(100) NOT NULL,
  `category_ID` int(10) NOT NULL,
  `news_ID` int(8) NOT NULL,
  PRIMARY KEY  (`news_flash_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news_flash`
--

INSERT INTO `news_flash` (`news_flash_ID`, `news_flash_image`, `category_ID`, `news_ID`) VALUES
(1, '31081_letest_pic.jpg', 2, 1),
(2, '27911_lifestyle.png', 2, 8),
(3, '25042_jana_special.jpg', 3, 6),
(4, '23794_kerala_kazhchakal.png', 2, 8),
(5, '5881_travel.png', 6, 11),
(6, '16876_travel.png', 6, 16),
(7, '28371_300x100.png', 7, 12),
(8, '6729_health.png', 5, 7),
(9, '30478_lifestyle.png', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `right_banner`
--

CREATE TABLE `right_banner` (
  `pri_ID` int(10) unsigned NOT NULL auto_increment,
  `adv_image` varchar(100) NOT NULL,
  `category_ID` int(10) NOT NULL,
  `position` varchar(10) NOT NULL,
  PRIMARY KEY  (`pri_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `right_banner`
--

INSERT INTO `right_banner` (`pri_ID`, `adv_image`, `category_ID`, `position`) VALUES
(2, '2325_lng_add.png', 1, 'right'),
(3, '3035_lng_add_2.png', 1, 'left'),
(4, '26189_lng_add_2.png', 2, 'right'),
(5, '8294_lng_add_2.png', 3, 'right'),
(6, '13570_lng_add.png', 5, 'right'),
(7, '4007_lng_add_2.png', 5, 'right'),
(8, '11202_lng_add.png', 6, 'right'),
(9, '28115_lng_add_2.png', 7, 'right');

-- --------------------------------------------------------

--
-- Table structure for table `top_banner`
--

CREATE TABLE `top_banner` (
  `pri_ID` int(10) unsigned NOT NULL auto_increment,
  `adv_image` varchar(100) NOT NULL,
  `adv_image2` varchar(100) NOT NULL,
  `category_ID` int(10) NOT NULL,
  PRIMARY KEY  (`pri_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `top_banner`
--

INSERT INTO `top_banner` (`pri_ID`, `adv_image`, `adv_image2`, `category_ID`) VALUES
(1, '6538_add.swf', '7163_left_top.png', 1),
(2, '131_add.swf', '20992_left_top.png', 2),
(3, '13407_add.swf', '28332_left_top.png', 9),
(4, 'top_life.png', 'left_top_life.png', 4);
