-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2022 at 07:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`project_id`, `user_id`, `status`) VALUES
(6, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

DROP TABLE IF EXISTS `project_details`;
CREATE TABLE IF NOT EXISTS `project_details` (
  `prj_id` int(5) NOT NULL AUTO_INCREMENT,
  `prj_title` varchar(50) NOT NULL,
  `prj_desc` varchar(5000) NOT NULL,
  `prj_tool_tech` varchar(100) NOT NULL,
  `prj_domain` varchar(150) NOT NULL,
  `delete_status` tinyint(1) NOT NULL,
  `std_id` int(11) NOT NULL,
  PRIMARY KEY (`prj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`prj_id`, `prj_title`, `prj_desc`, `prj_tool_tech`, `prj_domain`, `delete_status`, `std_id`) VALUES
(1, 'belvin nadar', 'bhuj', 'nbj', 'n', 1, 2),
(2, 'test', 'test', 'dcfghjbnbhjbkn', 'gxfgchvnmgch,', 1, 2),
(3, 'drctfgh', 'vctygv', 'hc', 'gvhb', 1, 2),
(4, 'tvuhjn', 'ivgh', 'yifvghb', 'ifyvgh', 1, 2),
(5, 'tyfvgyhbj', 'yvgbhj', 'ygvuhb', 'jnyghubjn', 1, 1),
(6, 'belvin nadar', 'i am belvin nadar from gondal', 'nbj', 'n', 1, 1),
(7, 'gwgewwg', 'wgegwg', 'gwgwgwg', 'wgwgw', 1, 1),
(8, 'kaushal', 'faldu', 'mind', 'software', 1, 1),
(9, 'ytgvh', 'iyg', 'hb', 'gyhbn', 1, 1),
(10, 'vasu', 'frtygv', 'hdg', 'yvhdrtf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `post` varchar(50) DEFAULT 'none',
  `about` varchar(1000) DEFAULT NULL,
  `twitter_link` varchar(100) NOT NULL DEFAULT '#',
  `facebook_link` varchar(100) NOT NULL DEFAULT '#',
  `instagram_link` varchar(100) DEFAULT '#',
  `linkedin_link` varchar(100) NOT NULL DEFAULT '#',
  `university_id` int(11) NOT NULL DEFAULT 0,
  `p_no` varchar(15) DEFAULT NULL,
  `a_line1` varchar(100) DEFAULT NULL,
  `a_line2` varchar(100) DEFAULT NULL,
  `a_city` varchar(100) DEFAULT NULL,
  `a_pin` varchar(100) DEFAULT NULL,
  `a_district` varchar(100) DEFAULT NULL,
  `a_state` varchar(100) DEFAULT NULL,
  `profile_img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first_name`, `last_name`, `email`, `password`, `post`, `about`, `twitter_link`, `facebook_link`, `instagram_link`, `linkedin_link`, `university_id`, `p_no`, `a_line1`, `a_line2`, `a_city`, `a_pin`, `a_district`, `a_state`, `profile_img`) VALUES
(1, 'renish', 'surani', 'renishsurani9900@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Mentee', 'ffffff', '#', 'https://www.facebook.com/renis.surani.7/', '#', 'https://www.linkedin.com/in/renish-surani-b7a01b206/', 5, '6351297828', 'line1', 'line2', 'rajkot', '360004', 'district', 'state', NULL),
(2, 'kaushal', 'faldu', 'kaushalfaldu1610@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', NULL, '', '', '', '', '', 1, '6351297821', 'awff', 'uyg', 'hkg', 'hjv', 'h', 'jh', ''),
(4, 'pratham', 'buddhadev', 'pratham.buddhadev@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(5, 'renish', 'surani', 'renish.surani109549@marwadiuniversity.ac.in', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', NULL, '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(6, 'jill', 'padariya', 'jillpatel1692@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Mentee', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(7, 'belvin', 'nadar', 'belvinnadar527@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Mentee', '', '', '', '', '', 1, '', 'line1', 'line2', 'Rajkot', '360004', 'district', 'state', ''),
(8, 'kaushal', 'faldu', 'kaushal.faldu109119@marwadiuniversity.ac.in', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Mentee', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(9, 'renish', 'surani', 'renissurani@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Mentor', NULL, '#', '#', '#', '#', 1, NULL, 'gyu', 'yug', 'gyu', 'ygug', 'ygu', 'gyu', '1664995225.jpg'),
(10, 'belvin', 'nadar', 'vasubhalodi111@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Mentor', 'i am belvin nadar', '#', '#', '#', '#', 3, '6351297828', 'gharma', 'serima', 'gondal', '360001', 'rajkot', 'gujrat', '1664995302.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill`) VALUES
(202, 10, 'renish'),
(157, 7, 'surani'),
(152, 2, 'g3g3'),
(151, 2, 'fff'),
(150, 2, 'js'),
(149, 2, 'php'),
(181, 1, 'php'),
(180, 1, 'js'),
(179, 1, 'fff'),
(178, 1, 'g3g3'),
(156, 7, 'ff'),
(201, 10, 'surnai'),
(200, 10, 'patel'),
(196, 9, 'hello3'),
(195, 9, 'hello2'),
(194, 9, 'hello1');

-- --------------------------------------------------------

--
-- Table structure for table `university_master`
--

DROP TABLE IF EXISTS `university_master`;
CREATE TABLE IF NOT EXISTS `university_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university_master`
--

INSERT INTO `university_master` (`id`, `u_name`) VALUES
(1, 'Marwadi University'),
(2, 'Atmiya University'),
(3, 'Darshan University'),
(4, 'Christ University'),
(5, 'RK University'),
(6, 'PDPU University'),
(7, 'DAIICT University'),
(8, 'Saurashtra University');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
