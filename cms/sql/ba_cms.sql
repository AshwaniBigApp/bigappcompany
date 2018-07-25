-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2017 at 01:01 AM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ba_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_slug` varchar(255) DEFAULT NULL,
  `blog_author` varchar(255) DEFAULT NULL,
  `blog_image` varchar(255) DEFAULT NULL,
  `blog_description` longtext,
  `blog_created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_status` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `add_line_1` text,
  `add_line_2` text,
  `pincode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `page_name`, `description`, `email`, `phone`, `add_line_1`, `add_line_2`, `pincode`) VALUES
(1, 'contact', '<p><br></p>', 'support@bigappcompany.com', '9535422200', '4/80, 1st Floor, Above IDBI Bank,\n80 Feet Road, Ashwath Nagar,', 'Dollars Colony, SanjayNagar,\nBengaluru, Karnataka', '560094');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext,
  `answer` longtext,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_image` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) DEFAULT '1',
  `gallery_created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_image`, `description`, `status`, `gallery_created_on`) VALUES
(4, '1501500582_1492417612_cs-a_(13).png', NULL, 1, '2017-07-31 18:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) DEFAULT NULL,
  `member_designation` varchar(255) DEFAULT NULL,
  `about_member` longtext,
  `member_image` varchar(255) DEFAULT NULL,
  `member_created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(110) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin_mobile_no` varchar(12) DEFAULT NULL,
  `admin_user_status` int(2) DEFAULT '1',
  `admin_user_created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pwd_request_code` varchar(255) DEFAULT NULL,
  `pwd_change_request` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`admin_id`, `name`, `admin_email`, `password`, `admin_mobile_no`, `admin_user_status`, `admin_user_created_on`, `pwd_request_code`, `pwd_change_request`) VALUES
(1, 'Harshal Badge', 'harshal@spotsoon.com', 'MTIzNDEyMzQ=', '9822378071', 1, '2017-07-31 17:19:24', 'LKNiBF', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
