-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: rdsgainsta0.ck0a0mw9m6jc.ap-southeast-1.rds.amazonaws.com:3306
-- Generation Time: Jun 30, 2016 at 03:54 PM
-- Server version: 5.6.27-log
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `greenass_gadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activeassign`
--

CREATE TABLE IF NOT EXISTS `activeassign` (
  `assign_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_sub_id` int(10) unsigned NOT NULL,
  `a_batch` enum('All','1','2','3','4') NOT NULL DEFAULT 'All',
  `a_type` varchar(11) NOT NULL,
  `a_no` int(3) DEFAULT NULL,
  `a_part` varchar(1) DEFAULT NULL,
  `a_marks` int(4) unsigned NOT NULL DEFAULT '10',
  `a_title` varchar(400) DEFAULT NULL,
  `a_txt` text,
  `a_file` varchar(500) DEFAULT NULL,
  `a_startdate` date DEFAULT NULL,
  `a_subdate` date DEFAULT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `a_sub_id` (`a_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `activeassign`
--

INSERT INTO `activeassign` (`assign_id`, `a_sub_id`, `a_batch`, `a_type`, `a_no`, `a_part`, `a_marks`, `a_title`, `a_txt`, `a_file`, `a_startdate`, `a_subdate`) VALUES
(47, 72, 'All', 'Assignment', 2, NULL, 10, 'Linkedin Profile and Solutions for Husky Air.', '<h1 style="border: 1px solid rgb(204, 204, 204); padding: 5px 10px; background: rgb(238, 238, 238);"><big><strong>Assignment 2</strong></big></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part 1)</strong>&nbsp;Create a linkedin profie and send a copy of that link to Shriraj. Shriraj, please put all links in one document and email me that single &nbsp; &nbsp;document by Saturday, 7th February 2015, 6pm.&nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part2)&nbsp;</strong>Read pages 29-30 of the book Information Technology Management 3rd Edition Jack T. Marchewka. You will act as Global Tech. Solutions and Husky Air will be your client. Please complete the exercise on Page 30 under the heading &quot;<strong><em>The Team Charter</em></strong>&quot;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part3)</strong>&nbsp;Read the Case Study on Project Ocean on page 31. Answer the 4 questions at the end of that case study.&nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Deliverables:&nbsp;</strong>A word document neatly formatted as per guidelines provided earlier. The document will consist of The Team Charter and answers to the 4 questions. Please do not use add any borders or any other decorative items to the document. Add a SFIT title page at the most. &nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '2015-03-20', '2015-02-10'),
(48, 72, 'All', 'Assignment', 3, NULL, 15, 'The Business Case', '<h1 style="border: 1px solid rgb(204, 204, 204); padding: 5px 10px; background: rgb(238, 238, 238);"><big><strong>Assignment 3:&nbsp;</strong></big></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big>Read chapter 2 &quot;The Business Case&quot; from page 34 to page 66. Please read and come to the future classes as we can have a very healthy discussion.&nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part 1)</strong>&nbsp;Choose a product which is not very popular in the Indian market as of now and do a feasibility study of the same.&nbsp;</big></p>\r\n\r\n<p><big>For eg: you will not choose iPhone 5s or any of the Apple products for this. However your could use a product like</big></p>\r\n\r\n<p><big>&nbsp;<a href="http://www.amazon.com/HeadBlade-Head-Shaving-Razor-each/dp/B0000635YY" target="_blank">http://www.amazon.com/HeadBlade-Head-Shaving-Razor-each/dp/B0000635YY</a>&nbsp;for this.&nbsp;</big></p>\r\n', NULL, '2015-03-20', '2015-02-17'),
(49, 72, 'All', 'Assignment', 4, NULL, 10, 'Study of Organizations', '<h1 style="border: 1px solid rgb(204, 204, 204); padding: 5px 10px; background: rgb(238, 238, 238);">Assignment&nbsp;4</h1>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><big>What is matrix organization and explain types of matrix organization.<big><big>â€‹â€‹â€‹</big></big></big><big><big>â€‹</big></big></h3>\r\n	</li>\r\n	<li>\r\n	<h3><big>List the advantages and disadvantages of the functional organization.&nbsp;</big></h3>\r\n	</li>\r\n	<li>\r\n	<h3><big>Explain team selection and acquisition.</big></h3>\r\n	</li>\r\n	<li>\r\n	<h3><big>Write short note on learning cycle</big></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big>&nbsp; &nbsp; &nbsp;Please Include all the questions that were asked in the lecture as well.&nbsp;</big></p>\r\n\r\n<p><big>&nbsp; &nbsp; &nbsp;The due date for this&nbsp;assignment&nbsp;is&nbsp;24/03/2015</big></p>\r\n', NULL, '2015-03-20', '2015-03-24'),
(53, 66, 'All', 'Exp', 4, NULL, 15, 'Implementation of Concurrency Control', '<p><a href="http://greenassign.com/Assignments/assignteacherview.php?assignid=58&amp;subid=0">Implementation of Concurrency Control</a>&nbsp;</p>\r\n', NULL, '2015-06-05', '2015-06-13'),
(55, 66, 'All', 'Exp', 1, NULL, 10, 'Revision of Database Management Systems', '<p>Revision of Database Management Systems</p>\r\n', NULL, '2015-06-06', '2015-06-04'),
(56, 66, 'All', 'Exp', 2, NULL, 10, 'Creation of Centralized database (Global Schema)', '<p>Creation of Centralized database (Global Schema)</p>\r\n', NULL, '2015-06-06', '2015-07-02'),
(57, 66, 'All', 'Exp', 3, NULL, 10, 'Fragmentation and allocation in DDBS Design', '<p>Fragmentation and allocation in DDBS Design</p>\r\n', NULL, '2015-06-06', '2015-06-15'),
(59, 66, 'All', 'Exp', 5, NULL, 10, 'Implementation of 2 phase and 3 phase commit protocol', '<p>Implementation of 2 phase and 3 phase commit protocol</p>\r\n', NULL, '2015-06-06', '2015-06-22'),
(60, 66, 'All', 'Exp', 6, NULL, 10, 'Implementation of Deadlock Detection', '<p>Implementation of Deadlock Detection</p>\r\n', NULL, '2015-06-06', '2015-06-10'),
(61, 66, 'All', 'Exp', 7, NULL, 10, 'Simulation of Query processor', '<p>Simulation of Query processor</p>\r\n', NULL, '2015-06-06', '2015-07-08'),
(62, 66, 'All', 'Exp', 8, NULL, 10, 'Implementation of Query Optimization', '<p>Implementation of Query Optimization</p>\r\n', NULL, '2015-06-06', '2015-07-15'),
(63, 66, 'All', 'Exp', 9, NULL, 10, 'XML DTD', '<p>XML DTD</p>\r\n', NULL, '2015-06-06', '2015-07-20'),
(116, 66, 'All', 'Assignment', 1, NULL, 10, 'ASSIGNMENT NO: 1 ( DDB Chapter 1, 2 and 3 ) ', '<p><span dir="ltr">Kindly refer to the book &#39;Distributed Database Systems&#39; by&nbsp;<a href="https://www.google.co.in/search?tbo=p&amp;tbm=bks&amp;q=inauthor:%22David+A.+Bell%22">David A. Bell</a>&nbsp;and</span>&nbsp;<span dir="ltr"><a href="https://www.google.co.in/search?tbo=p&amp;tbm=bks&amp;q=inauthor:%22Jane+B.+Grimson%22">Jane B. Grimson</a>&nbsp;for similar solved examples.</span></p>\r\n', 'Assignment_No.1-DDB.docx', '2015-06-08', '2015-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `activeassignforbatch`
--

CREATE TABLE IF NOT EXISTS `activeassignforbatch` (
  `assignforbatch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assignforbatch_assign_id` int(10) unsigned DEFAULT NULL,
  `assignforbatch_class_id` int(10) unsigned DEFAULT NULL,
  `assignforbatch_batch_id` int(10) unsigned DEFAULT NULL,
  `assignforbatch_submission_date` date DEFAULT NULL,
  `assignforbatch_submission_time` time DEFAULT NULL,
  `assignforbatch_des` text,
  `assignforbatch_TP` int(11) DEFAULT NULL,
  PRIMARY KEY (`assignforbatch_id`),
  KEY `assignforbatch_assign_id` (`assignforbatch_assign_id`),
  KEY `assignforbatch_class_id` (`assignforbatch_class_id`),
  KEY `assignforbatch_batch_id` (`assignforbatch_batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activebatch`
--

CREATE TABLE IF NOT EXISTS `activebatch` (
  `batch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch_class_id` int(10) unsigned NOT NULL,
  `batch_number` int(10) unsigned NOT NULL,
  `batch_des` text,
  PRIMARY KEY (`batch_id`),
  KEY `batch_class_id` (`batch_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `activebatch`
--

INSERT INTO `activebatch` (`batch_id`, `batch_class_id`, `batch_number`, `batch_des`) VALUES
(1, 8, 5, NULL),
(2, 15, 1, NULL),
(3, 15, 2, NULL),
(4, 15, 3, NULL),
(5, 15, 4, NULL),
(6, 14, 1, NULL),
(7, 14, 2, NULL),
(8, 14, 3, NULL),
(9, 14, 4, NULL),
(10, 4, 1, NULL),
(11, 4, 2, NULL),
(12, 4, 3, NULL),
(13, 4, 4, NULL),
(14, 7, 1, NULL),
(15, 7, 2, NULL),
(16, 7, 3, NULL),
(17, 7, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activeclass`
--

CREATE TABLE IF NOT EXISTS `activeclass` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_insti_id` int(10) unsigned NOT NULL,
  `class_timestate` int(10) unsigned NOT NULL,
  `class_compactname` varchar(100) NOT NULL,
  `class_capacity` int(4) DEFAULT NULL,
  `class_readablename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `class_insti_id` (`class_insti_id`),
  KEY `class_timestate` (`class_timestate`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `activeclass`
--

INSERT INTO `activeclass` (`class_id`, `class_insti_id`, `class_timestate`, `class_compactname`, `class_capacity`, `class_readablename`) VALUES
(4, 1, 1, 'BECMPNA', NULL, 'BE CMPN A'),
(5, 1, 1, 'BEEXTCA', NULL, 'BE EXTC A'),
(6, 1, 1, 'BEEXTCB', NULL, 'BEEXTCB'),
(7, 1, 1, 'BECMPNB', NULL, 'BE CMPN B'),
(8, 1, 1, 'BEITA', NULL, 'BE IT A'),
(9, 1, 1, 'BEITB', NULL, 'BE IT B'),
(12, 1, 1, 'TEEXTCA', NULL, 'TE EXTC A'),
(13, 1, 1, 'TEEXTCB', NULL, 'TE EXTC B'),
(14, 1, 1, 'TECMPNA', NULL, 'TE CMPN A'),
(15, 1, 1, 'TECMPNB', 82, 'TE CMPN B'),
(20, 1, 1, 'TEITA', NULL, 'TE IT A'),
(21, 1, 1, 'TEITB', NULL, 'TE IT B'),
(22, 1, 1, 'SEEXTCA', NULL, 'SE EXTC A'),
(23, 1, 1, 'SEEXTCB', NULL, 'SE EXTC B'),
(24, 1, 1, 'SECMPNA', NULL, 'SE CMPN A'),
(25, 1, 1, 'SECMPNB', NULL, 'SE CMPN B'),
(26, 1, 1, 'SEITA', NULL, 'SE IT A'),
(27, 1, 1, 'SEITB', NULL, 'SE IT B'),
(28, 1, 1, 'FEA', NULL, 'FE A'),
(29, 1, 1, 'FEB', NULL, 'FE B'),
(30, 1, 1, 'FEC', NULL, 'FE C'),
(31, 1, 1, 'FED', NULL, 'FE D'),
(32, 1, 1, 'FEE', NULL, 'FE E'),
(33, 1, 1, 'FEF', NULL, 'FE F'),
(34, 1, 1, 'FEG', NULL, 'FE G');

-- --------------------------------------------------------

--
-- Table structure for table `activelectureppts`
--

CREATE TABLE IF NOT EXISTS `activelectureppts` (
  `lec_id` int(6) NOT NULL AUTO_INCREMENT,
  `lec_subid` int(10) unsigned NOT NULL,
  `lec_filename` varchar(255) NOT NULL,
  `lec_uploadedby` varchar(85) NOT NULL,
  `lec_clean` tinyint(1) NOT NULL DEFAULT '1',
  `lec_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lec_id`),
  KEY `lec_subid` (`lec_subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `activelectureppts`
--

INSERT INTO `activelectureppts` (`lec_id`, `lec_subid`, `lec_filename`, `lec_uploadedby`, `lec_clean`, `lec_verified`) VALUES
(5, 69, 'AspectEngg.ppt', 'Student', 1, 0),
(6, 69, 'SOA-_SE.ppt', 'Student', 1, 0),
(7, 69, 'SW_Security_Engineering.ppt', 'Student', 1, 0),
(8, 70, 'mcc_module_1.ppt', 'Student', 1, 0),
(9, 70, 'mcc_module_3.ppt', 'Student', 1, 0),
(10, 70, 'mcc_module_5.ppt', 'Student', 1, 0),
(11, 70, 'mcc_module_8.ppt', 'Student', 1, 0),
(12, 70, 'mcc_module_4.ppt', 'Student', 1, 0),
(13, 70, 'mcc_module_2.ppt', 'Student', 1, 0),
(14, 70, 'mcc_module_7.ppt', 'Student', 1, 0),
(15, 66, '3.Chapter_1-Concept_and_Overview_Distributed_Database__system.pptx', 'Student', 1, 0),
(16, 66, '4.Chapter_2-Distributed_Database_Design.pptx', 'Student', 1, 0),
(17, 66, '5.Chapter_3-_Distributed_Transaction_&_Concurrency__Control.ppt', 'Student', 1, 0),
(18, 66, '6.Chapter_4-Distributed_Deadlock_&_Recovery.ppt', 'Student', 1, 0),
(20, 66, '7.Chapter_7-XML.ppt', 'Student', 1, 0),
(21, 66, '8.Chapter_5-Distributed_Query_Processing_and__Optimization.pptx', 'Student', 1, 0),
(22, 66, '9.Chapter_6-Hetrogeneous_Database.pptx', 'Student', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `activenews`
--

CREATE TABLE IF NOT EXISTS `activenews` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_instiute_id` int(10) unsigned DEFAULT NULL,
  `news_class_id` int(10) unsigned DEFAULT NULL,
  `news_batch_id` int(10) unsigned DEFAULT NULL,
  `news_img` varchar(500) DEFAULT NULL,
  `news_img0` varchar(500) DEFAULT NULL,
  `news_img1` varchar(500) DEFAULT NULL,
  `news_img2` varchar(500) DEFAULT NULL,
  `news_img3` varchar(500) DEFAULT NULL,
  `news_img4` varchar(500) DEFAULT NULL,
  `news_imgcount` tinyint(1) DEFAULT '0',
  `news_title` varchar(500) NOT NULL,
  `news_by` varchar(100) NOT NULL,
  `news_by_email` varchar(255) NOT NULL,
  `news_by_usertype` varchar(12) NOT NULL,
  `news_uploaddate` date NOT NULL,
  `news_uploadtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_timelinedate` date DEFAULT NULL,
  `news_summary` varchar(1000) DEFAULT NULL,
  `news_content` text,
  `news_reported` tinyint(4) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `cn_class_id` (`news_class_id`),
  KEY `news_instiute_id` (`news_instiute_id`),
  KEY `news_batch_id` (`news_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `activenews`
--

INSERT INTO `activenews` (`news_id`, `news_instiute_id`, `news_class_id`, `news_batch_id`, `news_img`, `news_img0`, `news_img1`, `news_img2`, `news_img3`, `news_img4`, `news_imgcount`, `news_title`, `news_by`, `news_by_email`, `news_by_usertype`, `news_uploaddate`, `news_uploadtimestamp`, `news_timelinedate`, `news_summary`, `news_content`, `news_reported`) VALUES
(14, NULL, 25, 1, '1.jpg', '1.jpg', NULL, NULL, NULL, NULL, 1, 'IRIS 2015 : Grafikos presents illumiNITE!', 'David Gasner', 'davidgasner46@gmail.com', 'teacher', '2015-06-29', '2015-06-29 15:54:35', NULL, 'illumiNITE @ ITI hall starting at 5:30 on the 31st of Jan.', NULL, 0),
(15, 1, NULL, NULL, '2_1.jpg', '2_1.jpg', NULL, NULL, NULL, NULL, 1, 'IRIS 2015 : Grafikos presents Drama Nite', 'David Gasner', 'davidgasner46@gmail.com', 'teacher', '2015-06-29', '2015-06-29 16:00:48', NULL, 'Brignout the actor in you at assembly hall at 5pm on 6th Feb.', NULL, 0),
(16, NULL, NULL, 1, '1_1.jpg', '1_1.jpg', NULL, NULL, NULL, NULL, 1, 'Grafikos presents illumiNITE!', 'David Gasner', 'davidgasner46@gmail.com', 'teacher', '2015-06-29', '2015-06-29 16:01:45', NULL, 'illumiNITE @ ITI hall starting at 5:30 on the 31st of Jan.', 'illumiNITE @ ITI hall starting at 5:30 on the 31st of Jan.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activestudentbatch`
--

CREATE TABLE IF NOT EXISTS `activestudentbatch` (
  `studentbatch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentbatch_batch` int(10) unsigned NOT NULL,
  `studentbatch_student` int(10) unsigned NOT NULL,
  `studentbatch_rollnumber` int(10) unsigned DEFAULT NULL,
  `studentbatch_des` text,
  PRIMARY KEY (`studentbatch_id`),
  KEY `activestudentbatch_batch` (`studentbatch_batch`,`studentbatch_student`),
  KEY `activestudentbatch_student` (`studentbatch_student`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `activestudentbatch`
--

INSERT INTO `activestudentbatch` (`studentbatch_id`, `studentbatch_batch`, `studentbatch_student`, `studentbatch_rollnumber`, `studentbatch_des`) VALUES
(1, 13, 28, 1, NULL),
(2, 10, 30, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activesubforbatch`
--

CREATE TABLE IF NOT EXISTS `activesubforbatch` (
  `subforbatch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subforbatch_batch_id` int(10) unsigned NOT NULL,
  `subforbatch_sub_id` int(10) unsigned NOT NULL,
  `subforbatch_des` text,
  PRIMARY KEY (`subforbatch_id`),
  KEY `subforbatch_sub_id` (`subforbatch_sub_id`),
  KEY `subforbatch_batch_id` (`subforbatch_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `activesubforbatch`
--

INSERT INTO `activesubforbatch` (`subforbatch_id`, `subforbatch_batch_id`, `subforbatch_sub_id`, `subforbatch_des`) VALUES
(1, 2, 163, NULL),
(2, 3, 163, NULL),
(3, 4, 163, NULL),
(4, 5, 164, NULL),
(5, 6, 164, NULL),
(6, 7, 164, NULL),
(7, 8, 164, NULL),
(8, 9, 164, NULL),
(59, 10, 165, NULL),
(60, 11, 165, NULL),
(61, 12, 166, NULL),
(62, 13, 166, NULL),
(63, 14, 166, NULL),
(64, 15, 166, NULL),
(65, 16, 166, NULL),
(66, 17, 166, NULL),
(67, 10, 167, NULL),
(68, 11, 167, NULL),
(69, 12, 167, NULL),
(70, 13, 167, NULL),
(71, 14, 167, NULL),
(72, 15, 167, NULL),
(73, 16, 167, NULL),
(74, 17, 167, NULL),
(75, 10, 168, NULL),
(76, 11, 168, NULL),
(77, 12, 168, NULL),
(78, 13, 168, NULL),
(79, 14, 168, NULL),
(80, 15, 168, NULL),
(81, 16, 168, NULL),
(82, 17, 168, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activeteacherforsubforbatch`
--

CREATE TABLE IF NOT EXISTS `activeteacherforsubforbatch` (
  `teacherforsubforbatch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacherforsubforbatch_subforbatch` int(10) unsigned NOT NULL,
  `teacherforsubforbatch_teacher_id` int(10) unsigned NOT NULL,
  `teacherforsubforbatch_desc` text NOT NULL,
  PRIMARY KEY (`teacherforsubforbatch_id`),
  KEY `teacherforsubforbatch_subforbatch` (`teacherforsubforbatch_subforbatch`),
  KEY `teacherforsubforbatch_teacher_id` (`teacherforsubforbatch_teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `activeteacherforsubforbatch`
--

INSERT INTO `activeteacherforsubforbatch` (`teacherforsubforbatch_id`, `teacherforsubforbatch_subforbatch`, `teacherforsubforbatch_teacher_id`, `teacherforsubforbatch_desc`) VALUES
(1, 4, 13, ''),
(2, 5, 13, ''),
(3, 6, 13, ''),
(4, 7, 13, ''),
(5, 8, 13, ''),
(6, 59, 7, ''),
(7, 60, 7, ''),
(8, 61, 10, ''),
(9, 62, 10, ''),
(10, 63, 13, ''),
(11, 64, 13, ''),
(12, 65, 13, ''),
(13, 66, 13, ''),
(14, 67, 11, ''),
(15, 68, 11, ''),
(16, 69, 11, ''),
(17, 70, 12, ''),
(18, 71, 12, ''),
(19, 72, 12, ''),
(20, 73, 13, ''),
(21, 74, 13, '');

-- --------------------------------------------------------

--
-- Table structure for table `activeTT`
--

CREATE TABLE IF NOT EXISTS `activeTT` (
  `TT_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TT_classid` int(10) unsigned NOT NULL,
  `TT_filename` varchar(255) NOT NULL,
  `TT_uploadedby` varchar(85) NOT NULL,
  `TT_clean` tinyint(1) NOT NULL DEFAULT '1',
  `TT_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TT_id`),
  KEY `lec_subid` (`TT_classid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE IF NOT EXISTS `assign` (
  `assign_id` int(10) NOT NULL AUTO_INCREMENT,
  `a_sub_id` int(10) unsigned NOT NULL,
  `a_batch` enum('All','1','2','3','4') NOT NULL DEFAULT 'All',
  `a_type` varchar(11) NOT NULL,
  `a_no` int(3) DEFAULT NULL,
  `a_part` varchar(1) DEFAULT NULL,
  `a_marks` int(4) unsigned NOT NULL DEFAULT '10',
  `a_title` varchar(400) DEFAULT NULL,
  `a_txt` text,
  `a_file` varchar(500) DEFAULT NULL,
  `a_startdate` date DEFAULT NULL,
  `a_subdate` date DEFAULT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `a_sub_id` (`a_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `a_sub_id`, `a_batch`, `a_type`, `a_no`, `a_part`, `a_marks`, `a_title`, `a_txt`, `a_file`, `a_startdate`, `a_subdate`) VALUES
(47, 72, 'All', 'Assignment', 2, NULL, 10, 'Linkedin Profile and Solutions for Husky Air.', '<h1 style="border: 1px solid rgb(204, 204, 204); padding: 5px 10px; background: rgb(238, 238, 238);"><big><strong>Assignment 2</strong></big></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part 1)</strong>&nbsp;Create a linkedin profie and send a copy of that link to Shriraj. Shriraj, please put all links in one document and email me that single &nbsp; &nbsp;document by Saturday, 7th February 2015, 6pm.&nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part2)&nbsp;</strong>Read pages 29-30 of the book Information Technology Management 3rd Edition Jack T. Marchewka. You will act as Global Tech. Solutions and Husky Air will be your client. Please complete the exercise on Page 30 under the heading &quot;<strong><em>The Team Charter</em></strong>&quot;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part3)</strong>&nbsp;Read the Case Study on Project Ocean on page 31. Answer the 4 questions at the end of that case study.&nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Deliverables:&nbsp;</strong>A word document neatly formatted as per guidelines provided earlier. The document will consist of The Team Charter and answers to the 4 questions. Please do not use add any borders or any other decorative items to the document. Add a SFIT title page at the most. &nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '2015-03-20', '2015-02-10'),
(48, 72, 'All', 'Assignment', 3, NULL, 15, 'The Business Case', '<h1 style="border: 1px solid rgb(204, 204, 204); padding: 5px 10px; background: rgb(238, 238, 238);"><big><strong>Assignment 3:&nbsp;</strong></big></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big>Read chapter 2 &quot;The Business Case&quot; from page 34 to page 66. Please read and come to the future classes as we can have a very healthy discussion.&nbsp;</big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><strong>Part 1)</strong>&nbsp;Choose a product which is not very popular in the Indian market as of now and do a feasibility study of the same.&nbsp;</big></p>\r\n\r\n<p><big>For eg: you will not choose iPhone 5s or any of the Apple products for this. However your could use a product like</big></p>\r\n\r\n<p><big>&nbsp;<a href="http://www.amazon.com/HeadBlade-Head-Shaving-Razor-each/dp/B0000635YY" target="_blank">http://www.amazon.com/HeadBlade-Head-Shaving-Razor-each/dp/B0000635YY</a>&nbsp;for this.&nbsp;</big></p>\r\n', NULL, '2015-03-20', '2015-02-17'),
(49, 72, 'All', 'Assignment', 4, NULL, 10, 'Study of Organizations', '<h1 style="border: 1px solid rgb(204, 204, 204); padding: 5px 10px; background: rgb(238, 238, 238);">Assignment&nbsp;4</h1>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><big>What is matrix organization and explain types of matrix organization.<big><big>â€‹â€‹â€‹</big></big></big><big><big>â€‹</big></big></h3>\r\n	</li>\r\n	<li>\r\n	<h3><big>List the advantages and disadvantages of the functional organization.&nbsp;</big></h3>\r\n	</li>\r\n	<li>\r\n	<h3><big>Explain team selection and acquisition.</big></h3>\r\n	</li>\r\n	<li>\r\n	<h3><big>Write short note on learning cycle</big></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big>&nbsp; &nbsp; &nbsp;Please Include all the questions that were asked in the lecture as well.&nbsp;</big></p>\r\n\r\n<p><big>&nbsp; &nbsp; &nbsp;The due date for this&nbsp;assignment&nbsp;is&nbsp;24/03/2015</big></p>\r\n', NULL, '2015-03-20', '2015-03-24'),
(53, 66, 'All', 'Exp', 4, NULL, 15, 'Implementation of Concurrency Control', '<p><a href="http://greenassign.com/Assignments/assignteacherview.php?assignid=58&amp;subid=0">Implementation of Concurrency Control</a>&nbsp;</p>\r\n', NULL, '2015-06-05', '2015-06-13'),
(55, 66, 'All', 'Exp', 1, NULL, 10, 'Revision of Database Management Systems', '<p>Revision of Database Management Systems</p>\r\n', NULL, '2015-06-06', '2015-06-04'),
(56, 66, 'All', 'Exp', 2, NULL, 10, 'Creation of Centralized database (Global Schema)', '<p>Creation of Centralized database (Global Schema)</p>\r\n', NULL, '2015-06-06', '2015-07-02'),
(57, 66, 'All', 'Exp', 3, NULL, 10, 'Fragmentation and allocation in DDBS Design', '<p>Fragmentation and allocation in DDBS Design</p>\r\n', NULL, '2015-06-06', '2015-06-15'),
(59, 66, 'All', 'Exp', 5, NULL, 10, 'Implementation of 2 phase and 3 phase commit protocol', '<p>Implementation of 2 phase and 3 phase commit protocol</p>\r\n', NULL, '2015-06-06', '2015-06-22'),
(60, 66, 'All', 'Exp', 6, NULL, 10, 'Implementation of Deadlock Detection', '<p>Implementation of Deadlock Detection</p>\r\n', NULL, '2015-06-06', '2015-06-10'),
(61, 66, 'All', 'Exp', 7, NULL, 10, 'Simulation of Query processor', '<p>Simulation of Query processor</p>\r\n', NULL, '2015-06-06', '2015-07-08'),
(62, 66, 'All', 'Exp', 8, NULL, 10, 'Implementation of Query Optimization', '<p>Implementation of Query Optimization</p>\r\n', NULL, '2015-06-06', '2015-07-15'),
(63, 66, 'All', 'Exp', 9, NULL, 10, 'XML DTD', '<p>XML DTD</p>\r\n', NULL, '2015-06-06', '2015-07-20'),
(116, 66, 'All', 'Assignment', 1, NULL, 10, 'ASSIGNMENT NO: 1 ( DDB Chapter 1, 2 and 3 ) ', '<p><span dir="ltr">Kindly refer to the book &#39;Distributed Database Systems&#39; by&nbsp;<a href="https://www.google.co.in/search?tbo=p&amp;tbm=bks&amp;q=inauthor:%22David+A.+Bell%22">David A. Bell</a>&nbsp;and</span>&nbsp;<span dir="ltr"><a href="https://www.google.co.in/search?tbo=p&amp;tbm=bks&amp;q=inauthor:%22Jane+B.+Grimson%22">Jane B. Grimson</a>&nbsp;for similar solved examples.</span></p>\r\n', 'Assignment_No.1-DDB.docx', '2015-06-08', '2015-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_insti_id` int(10) unsigned NOT NULL,
  `class_compactname` varchar(100) NOT NULL,
  `class_capacity` int(4) DEFAULT NULL,
  `class_readablename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `class_insti_id` (`class_insti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_insti_id`, `class_compactname`, `class_capacity`, `class_readablename`) VALUES
(4, 1, 'BECMPNA', NULL, 'BE CMPN A'),
(5, 1, 'BEEXTCA', NULL, 'BE EXTC A'),
(6, 1, 'BEEXTCB', NULL, 'BEEXTCB'),
(7, 1, 'BECMPNB', NULL, 'BE CMPN B'),
(8, 1, 'BEITA', NULL, 'BE IT A'),
(9, 1, 'BEITB', NULL, 'BE IT B'),
(12, 1, 'TEEXTCA', NULL, 'TE EXTC A'),
(13, 1, 'TEEXTCB', NULL, 'TE EXTC B'),
(14, 1, 'TECMPNA', NULL, 'TE CMPN A'),
(15, 1, 'TECMPNB', 82, 'TE CMPN B'),
(20, 1, 'TEITA', NULL, 'TE IT A'),
(21, 1, 'TEITB', NULL, 'TE IT B'),
(22, 1, 'SEEXTCA', NULL, 'SE EXTC A'),
(23, 1, 'SEEXTCB', NULL, 'SE EXTC B'),
(24, 1, 'SECMPNA', NULL, 'SE CMPN A'),
(25, 1, 'SECMPNB', NULL, 'SE CMPN B'),
(26, 1, 'SEITA', NULL, 'SE IT A'),
(27, 1, 'SEITB', NULL, 'SE IT B'),
(28, 1, 'FEA', NULL, 'FE A'),
(29, 1, 'FEB', NULL, 'FE B'),
(30, 1, 'FEC', NULL, 'FE C'),
(31, 1, 'FED', NULL, 'FE D'),
(32, 1, 'FEE', NULL, 'FE E'),
(33, 1, 'FEF', NULL, 'FE F'),
(34, 1, 'FEG', NULL, 'FE G');

-- --------------------------------------------------------

--
-- Table structure for table `classnews`
--

CREATE TABLE IF NOT EXISTS `classnews` (
  `cn_id` int(8) NOT NULL AUTO_INCREMENT,
  `cn_class_id` int(10) unsigned NOT NULL,
  `cn_img` varchar(500) DEFAULT NULL,
  `cn_img0` varchar(500) DEFAULT NULL,
  `cn_img1` varchar(500) DEFAULT NULL,
  `cn_img2` varchar(500) DEFAULT NULL,
  `cn_img3` varchar(500) DEFAULT NULL,
  `cn_img4` varchar(500) DEFAULT NULL,
  `cn_imgcount` tinyint(1) DEFAULT '0',
  `cn_title` varchar(500) NOT NULL,
  `cn_by` varchar(100) NOT NULL,
  `cn_by_email` varchar(255) NOT NULL,
  `cn_by_usertype` varchar(12) NOT NULL,
  `cn_uploaddate` date NOT NULL,
  `cn_uploadtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cn_timelinedate` date DEFAULT NULL,
  `cn_summary` varchar(1000) DEFAULT NULL,
  `cn_content` text,
  `cn_reported` tinyint(4) NOT NULL,
  PRIMARY KEY (`cn_id`),
  KEY `cn_class_id` (`cn_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `classnews`
--

INSERT INTO `classnews` (`cn_id`, `cn_class_id`, `cn_img`, `cn_img0`, `cn_img1`, `cn_img2`, `cn_img3`, `cn_img4`, `cn_imgcount`, `cn_title`, `cn_by`, `cn_by_email`, `cn_by_usertype`, `cn_uploaddate`, `cn_uploadtimestamp`, `cn_timelinedate`, `cn_summary`, `cn_content`, `cn_reported`) VALUES
(14, 25, '1.jpg', '1.jpg', NULL, NULL, NULL, NULL, 1, 'IRIS 2015 : Grafikos presents illumiNITE!', 'David Gasner', 'davidgasner46@gmail.com', 'teacher', '2015-06-29', '2015-06-29 15:54:35', NULL, 'illumiNITE @ ITI hall starting at 5:30 on the 31st of Jan.', NULL, 0),
(15, 15, '2_1.jpg', '2_1.jpg', NULL, NULL, NULL, NULL, 1, 'IRIS 2015 : Grafikos presents Drama Nite', 'David Gasner', 'davidgasner46@gmail.com', 'teacher', '2015-06-29', '2015-06-29 16:00:48', NULL, 'Brignout the actor in you at assembly hall at 5pm on 6th Feb.', NULL, 0),
(16, 15, '1_1.jpg', '1_1.jpg', NULL, NULL, NULL, NULL, 1, 'Grafikos presents illumiNITE!', 'David Gasner', 'davidgasner46@gmail.com', 'teacher', '2015-06-29', '2015-06-29 16:01:45', NULL, 'illumiNITE @ ITI hall starting at 5:30 on the 31st of Jan.', 'illumiNITE @ ITI hall starting at 5:30 on the 31st of Jan.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE IF NOT EXISTS `dates` (
  `dateid` int(8) NOT NULL AUTO_INCREMENT,
  `type` enum('exam','openhouse','cocurricular','holidays','impdates','other') NOT NULL,
  `head` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notes` text,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dateid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE IF NOT EXISTS `ebooks` (
  `eb_id` int(6) NOT NULL AUTO_INCREMENT,
  `eb_sub_id` int(10) unsigned NOT NULL,
  `eb_filename` varchar(300) NOT NULL,
  `eb_uploadedby` varchar(80) DEFAULT NULL,
  `eb_clean` tinyint(1) NOT NULL DEFAULT '1',
  `eb_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eb_id`),
  KEY `eb_sub_id` (`eb_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`eb_id`, `eb_sub_id`, `eb_filename`, `eb_uploadedby`, `eb_clean`, `eb_verified`) VALUES
(14, 69, 'softwareengineering6thedition-iansommerville.pdf', 'Student', 1, 0),
(15, 69, 'webengineering-pressmans.ppt', 'Student', 1, 0),
(16, 66, 'Distributed_Transaction_&_Concurrency__Control.ppt', 'Student', 1, 0),
(17, 70, 'mcc_books_reference.xlsx', 'Student', 1, 0),
(18, 68, 'Mixed_lang_sum_of_two_number.docx', 'Student', 1, 0),
(19, 72, 'Project_Management_-by_R.N_Rosewalt.pptx', 'Student', 1, 0),
(20, 66, 'Distributed_Database_Architecture_-_by_Donald_Pointer.pptx', 'Student', 1, 0),
(21, 66, 'Database_Distribution-3rd_Edition.pdf', 'Student', 1, 0),
(22, 69, 'Software_Engineering-4thedition_by_Iansommerville.pdf', 'Student', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE IF NOT EXISTS `institute` (
  `insti_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `insti_abv` varchar(10) NOT NULL,
  `insti_fullname` varchar(255) NOT NULL,
  `insti_logo` varchar(255) DEFAULT NULL,
  `insti_about` text,
  PRIMARY KEY (`insti_id`),
  UNIQUE KEY `insti_abv` (`insti_abv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`insti_id`, `insti_abv`, `insti_fullname`, `insti_logo`, `insti_about`) VALUES
(1, 'SFIT', 'St. Francis Institute of Technology', NULL, 'St. Francis Institute of Technology in Mumbai, India is an engineering college named after Francis of Assisi, the 12th-century Italian saint.\r\nAddress: Mount Poinsur, S.V.P. Road, Borivali West, Mumbai, Maharashtra 400103\r\nPhone: 022 2892 8585\r\nFounded: 1999, Mumbai'),
(2, 'SPP', 'Sardar Patel Polytechnic', NULL, 'Andheri'),
(3, 'SVPP', 'Sardar Vallabhbhai Patel Vidyalaya', NULL, 'Mira Road');

-- --------------------------------------------------------

--
-- Table structure for table `lectureppts`
--

CREATE TABLE IF NOT EXISTS `lectureppts` (
  `lec_id` int(6) NOT NULL AUTO_INCREMENT,
  `lec_subid` int(10) unsigned NOT NULL,
  `lec_filename` varchar(255) NOT NULL,
  `lec_uploadedby` varchar(85) NOT NULL,
  `lec_clean` tinyint(1) NOT NULL DEFAULT '1',
  `lec_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lec_id`),
  UNIQUE KEY `lec_filename` (`lec_filename`),
  KEY `lec_subid` (`lec_subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `lectureppts`
--

INSERT INTO `lectureppts` (`lec_id`, `lec_subid`, `lec_filename`, `lec_uploadedby`, `lec_clean`, `lec_verified`) VALUES
(5, 69, 'AspectEngg.ppt', 'Student', 1, 0),
(6, 69, 'SOA-_SE.ppt', 'Student', 1, 0),
(7, 69, 'SW_Security_Engineering.ppt', 'Student', 1, 0),
(8, 70, 'mcc_module_1.ppt', 'Student', 1, 0),
(9, 70, 'mcc_module_3.ppt', 'Student', 1, 0),
(10, 70, 'mcc_module_5.ppt', 'Student', 1, 0),
(11, 70, 'mcc_module_8.ppt', 'Student', 1, 0),
(12, 70, 'mcc_module_4.ppt', 'Student', 1, 0),
(13, 70, 'mcc_module_2.ppt', 'Student', 1, 0),
(14, 70, 'mcc_module_7.ppt', 'Student', 1, 0),
(15, 66, '3.Chapter_1-Concept_and_Overview_Distributed_Database__system.pptx', 'Student', 1, 0),
(16, 66, '4.Chapter_2-Distributed_Database_Design.pptx', 'Student', 1, 0),
(17, 66, '5.Chapter_3-_Distributed_Transaction_&_Concurrency__Control.ppt', 'Student', 1, 0),
(18, 66, '6.Chapter_4-Distributed_Deadlock_&_Recovery.ppt', 'Student', 1, 0),
(20, 66, '7.Chapter_7-XML.ppt', 'Student', 1, 0),
(21, 66, '8.Chapter_5-Distributed_Query_Processing_and__Optimization.pptx', 'Student', 1, 0),
(22, 66, '9.Chapter_6-Hetrogeneous_Database.pptx', 'Student', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(6) NOT NULL AUTO_INCREMENT,
  `news_insti_id` int(10) unsigned DEFAULT NULL,
  `news_img` varchar(500) DEFAULT NULL,
  `news_img0` varchar(500) DEFAULT NULL,
  `news_img1` varchar(500) DEFAULT NULL,
  `news_img2` varchar(500) DEFAULT NULL,
  `news_img3` varchar(500) DEFAULT NULL,
  `news_img4` varchar(500) DEFAULT NULL,
  `news_imgcount` tinyint(1) NOT NULL DEFAULT '0',
  `news_title` varchar(500) NOT NULL,
  `news_by` varchar(100) DEFAULT NULL,
  `news_email` varchar(200) NOT NULL,
  `news_uploaddate` date NOT NULL,
  `news_uploadtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_date` date DEFAULT NULL,
  `news_summary` varchar(1000) DEFAULT NULL,
  `news_content` text,
  `news_reported` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  KEY `news_uploaddate` (`news_uploaddate`),
  KEY `college_id` (`news_insti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_insti_id`, `news_img`, `news_img0`, `news_img1`, `news_img2`, `news_img3`, `news_img4`, `news_imgcount`, `news_title`, `news_by`, `news_email`, `news_uploaddate`, `news_uploadtimestamp`, `news_date`, `news_summary`, `news_content`, `news_reported`) VALUES
(25, NULL, '1_1.jpg', 'JammuKashmirBanner_1.png', 'subnav3_1.jpg', 'karakoram-hotel-leh-ladakh-ladakhsafari-ladakh_1.jpg', '1_1.jpg', NULL, 4, 'Winter Trip to The Most Beautiful Land  K A S H M I R ! ! !', 'David Gasner', 'davidgasner46@gmail.com', '0000-00-00', '2015-03-20 05:50:18', '2015-03-20', 'If there is ever a heaven on earth, its here, its here, its here. -Jahangir', '" The \nðŸ’¥ "" T. R. I. P. "" ðŸ’¥\nOne last trip,for \nThe one last time.\nGolli mangogey toh GuN denge ,\nKashmiR mangogey toh full to FuN denge.ðŸŽŠ\nYES guys to the peaks untouched yet.\n""Gar firdaus, ruhe zamin ast, hamin asto, hamin asto, hamin ast."" If there is ever a heaven on earth, its here, its here, its here. -Jahangir\nA trip to The Most Beautiful Land\n  K A S H M i R \nThe best place to be at in the month of June. \nYes its '' THE TRIP '' & not just a regular IV.\nFor The students by The students. \nHere are some highlights of the trip.\n       \n* Experience one of the longest gandola rides in India.ðŸš ðŸš \n* Stay at heavens heart Srinagar. ðŸ’­ðŸ’­\nYou stay at house  & might have been to a boat.\nBUT...\nHave you ever been to a BoatHouse?? \nðŸ˜§\nðŸ˜¯\n\nYes Guys..!!! \nOvernight stay at BoatHouse that too on the famous ''Dal Lake'' âš“âš“.\nA strip of more than 35 Houseboats lined on the lake giving us an Awesome view of the lake and mountain peaks.\nVisit to ðŸ’GulmargðŸ’& ðŸŒ¸SonmargðŸŒº \nðŸƒðŸŒ·ðŸŒ¹ðŸŒ»ðŸŒ¹ðŸŒ·ðŸƒ\n(Better than the any marg you have ever beenðŸ˜ðŸ˜),\nðŸ”¸ Chandanwari& Betaab valley, Baisaran ValleyðŸŒ„\nðŸ”¸Shankracharya HillsðŸ—»\nðŸ”¸Stay at Pahlgam (Higher altitude than Srinagar).\nOnly place covered with snow throughout the year â„â›„â„\nSkiing,ðŸŽ¿ðŸ‚ðŸŽ¿Sledging or White water raftingðŸš£â›µðŸš¤...You name it and You get all of it here...\nðŸ”ºðŸ”»ðŸ”ºðŸ”»ðŸ”ºðŸ”»ðŸ”ºðŸ”»ðŸ”ºðŸ”»ðŸ”º\nðŸ“ŒP.S. ðŸ“Œ\nðŸ”¹This trip is open for all and by trusted and experienced tour operator,escorts and obviously students.\nðŸ”¹ No secrecy, No hidden details.\nClearer than sprite. ðŸ˜ðŸ˜ðŸ˜\nðŸ”¹All places are planned considering high security. Srinagar being the capital and Pahlgam famous tourist spot. So peace out.âœŒ\nHurry up ...Let''s touch the mountains... 10 days of highness (i mean altitude yo) ðŸ˜·ðŸ˜·\nAll this fun for just\nRs. 11,950/-\n\nSeats are limited but fun isnt...ðŸ˜ðŸ˜ðŸ˜\nTo check the details of the hotel u can just click on the link below:ðŸ‘‡\nhttp://hotelsunshinesgr.com\nYou can eat,drink,roam & sleep with no external intervention.\nChallo fir...ðŸ˜›\nPlease revert for queries And Registrations, if interested.\nLast date to get yourself registered is 31st March, and the first installment amount is Rs.3,000/- only...\nGurprit Arora \n+91-9167323367\nAshutosh shetty\n+91-9757171740\nRonal D''souza\n+91-9920284259"', 0),
(49, NULL, '2_1.jpg', '2_1.jpg', NULL, NULL, NULL, NULL, 1, 'Graduation Ceremony 2015', 'David Gasner', 'davidgasner46@gmail.com', '0000-00-00', '2015-06-29 15:18:15', '2015-06-29', 'We don''t stop going to school when we graduate. -Carol Burnett', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oldassign`
--

CREATE TABLE IF NOT EXISTS `oldassign` (
  `assign_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_sub_id` int(10) unsigned NOT NULL,
  `a_batch` enum('All','1','2','3','4') NOT NULL DEFAULT 'All',
  `a_type` varchar(11) NOT NULL,
  `a_no` int(3) DEFAULT NULL,
  `a_part` varchar(1) DEFAULT NULL,
  `a_marks` int(4) unsigned NOT NULL DEFAULT '10',
  `a_title` varchar(400) DEFAULT NULL,
  `a_txt` text,
  `a_file` varchar(500) DEFAULT NULL,
  `a_startdate` date DEFAULT NULL,
  `a_subdate` date DEFAULT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `a_sub_id` (`a_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldassignforbatch`
--

CREATE TABLE IF NOT EXISTS `oldassignforbatch` (
  `assignforbatch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assignforbatch_assign_id` int(10) unsigned DEFAULT NULL,
  `assignforbatch_class_id` int(10) unsigned DEFAULT NULL,
  `assignforbatch_batch_id` int(10) unsigned DEFAULT NULL,
  `assignforbatch_submission_date` date DEFAULT NULL,
  `assignforbatch_submission_time` time DEFAULT NULL,
  `assignforbatch_des` text,
  `assignforbatch_TP` int(11) DEFAULT NULL,
  PRIMARY KEY (`assignforbatch_id`),
  KEY `assignforbatch_assign_id` (`assignforbatch_assign_id`),
  KEY `assignforbatch_class_id` (`assignforbatch_class_id`),
  KEY `assignforbatch_batch_id` (`assignforbatch_batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldbatch`
--

CREATE TABLE IF NOT EXISTS `oldbatch` (
  `batch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch_class_id` int(10) unsigned NOT NULL,
  `batch_des` text,
  PRIMARY KEY (`batch_id`),
  KEY `batch_class_id` (`batch_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldclass`
--

CREATE TABLE IF NOT EXISTS `oldclass` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_insti_id` int(10) unsigned NOT NULL,
  `class_compactname` varchar(100) NOT NULL,
  `class_capacity` int(4) DEFAULT NULL,
  `class_readablename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `class_insti_id` (`class_insti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldlectureppts`
--

CREATE TABLE IF NOT EXISTS `oldlectureppts` (
  `lec_id` int(6) NOT NULL AUTO_INCREMENT,
  `lec_subid` int(10) unsigned NOT NULL,
  `lec_filename` varchar(255) NOT NULL,
  `lec_uploadedby` varchar(85) NOT NULL,
  `lec_clean` tinyint(1) NOT NULL DEFAULT '1',
  `lec_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lec_id`),
  KEY `lec_subid` (`lec_subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldnews`
--

CREATE TABLE IF NOT EXISTS `oldnews` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_instiute_id` int(10) unsigned DEFAULT NULL,
  `news_class_id` int(10) unsigned DEFAULT NULL,
  `news_batch_id` int(10) unsigned DEFAULT NULL,
  `news_img` varchar(500) DEFAULT NULL,
  `news_img0` varchar(500) DEFAULT NULL,
  `news_img1` varchar(500) DEFAULT NULL,
  `news_img2` varchar(500) DEFAULT NULL,
  `news_img3` varchar(500) DEFAULT NULL,
  `news_img4` varchar(500) DEFAULT NULL,
  `news_imgcount` tinyint(1) DEFAULT '0',
  `news_title` varchar(500) NOT NULL,
  `news_by` varchar(100) NOT NULL,
  `news_by_email` varchar(255) NOT NULL,
  `news_by_usertype` varchar(12) NOT NULL,
  `news_uploaddate` date NOT NULL,
  `news_uploadtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_timelinedate` date DEFAULT NULL,
  `news_summary` varchar(1000) DEFAULT NULL,
  `news_content` text,
  `news_reported` tinyint(4) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `cn_class_id` (`news_class_id`),
  KEY `news_instiute_id` (`news_instiute_id`),
  KEY `news_batch_id` (`news_batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldsub`
--

CREATE TABLE IF NOT EXISTS `oldsub` (
  `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_class_id` int(10) unsigned DEFAULT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_abbv` varchar(10) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `sub_class_id` (`sub_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `oldsub`
--

INSERT INTO `oldsub` (`sub_id`, `sub_class_id`, `sub_name`, `sub_abbv`) VALUES
(14, 5, 'Advanced Microwave Engineering', 'AME'),
(15, 5, 'Optical Fiber Communication', 'OFC'),
(16, 5, 'Wireless Networks', 'WN'),
(17, 5, 'Image Processing', 'IP'),
(18, 5, 'Telecomm Network Management', 'TNM'),
(19, 6, 'Advanced Microwave Engineering', 'AME'),
(20, 6, 'Optical Fiber Communication', 'OFC'),
(21, 6, 'Wireless Networks', 'WN'),
(22, 6, 'Image Processing', 'IP'),
(23, 6, 'Telecomm Network Management', 'TNM'),
(24, 4, 'Software Architecture', 'SA'),
(25, 4, 'Human Computer Interaction', 'HCI'),
(26, 4, 'Distributed Computing', 'DS'),
(27, 4, 'Multimedia System Design', 'MSD'),
(28, 7, 'Software Architecture', 'SA'),
(29, 7, 'Human Computer Interaction', 'HCI'),
(30, 7, 'Distributed Computing', 'DS'),
(31, 7, 'Multimedia System Design', 'MSD'),
(32, 8, 'Information Storage Management & Disaster Recovery', 'ISMDR'),
(33, 8, 'Game Architecture and Programming', 'GAP'),
(34, 8, 'Software Project Management', 'SPM'),
(35, 8, 'Mobile E-Commerce', 'MEC'),
(36, 9, 'Information Storage Management & Disaster Recovery', 'ISMDR'),
(37, 9, 'Game Architecture and Programming', 'GAP'),
(38, 9, 'Software Project Management', 'SPM'),
(39, 9, 'Mobile E-Commerce', 'MEC'),
(40, 12, 'Digital Communication', 'DC'),
(41, 12, 'Discrete Time Signal Processing', 'DTSP'),
(42, 12, 'Computer Communication & Telecomm Networks', 'CCN'),
(43, 12, 'Television Engineering', 'TE'),
(44, 12, 'Operating Systems', 'OS'),
(45, 12, 'VLSI Designs', 'VLSI'),
(46, 12, 'Discrete Time Signal Processing Laboratory', 'DTSPL LAB'),
(47, 12, 'Communication Engineering Laboratory III', 'CE III LAB'),
(48, 12, 'Communication Engineering Laboratory IV', 'CE IV LAB'),
(49, 12, 'Mini Project II', 'MP II'),
(50, 13, 'Digital Communication', 'DC'),
(51, 13, 'Discrete Time Signal Processing', 'DTSP'),
(52, 13, 'Computer Communication & Telecomm Networks', 'CCN'),
(53, 13, 'Television Engineering', 'TE'),
(54, 13, 'Operating Systems', 'OS'),
(55, 13, 'VLSI Designs', 'VLSI'),
(56, 13, 'Discrete Time Signal Processing Laboratory', 'DTSPL LAB'),
(57, 13, 'Communication Engineering Laboratory III', 'CE III LAB'),
(58, 13, 'Communication Engineering Laboratory IV', 'CE IV LAB'),
(59, 13, 'Mini Project II', 'MP II'),
(60, 14, 'Distributed Database', 'DDB'),
(61, 14, 'Networks Programming Lab', 'NPL'),
(62, 14, 'System Programming & Compiler Construction', 'SPCC'),
(63, 14, 'Software Engineering', 'SE'),
(64, 14, 'Mobile Computing & Communication', 'MCC'),
(65, 14, 'German Language', 'GL'),
(66, 15, 'Distributed Database', 'DDM'),
(67, 14, 'Networks Programming Lab', 'NPL'),
(68, 15, 'System Programming & Compiler Construction', 'SPCC'),
(69, 15, 'Software Engineering', 'SE'),
(70, 15, 'Mobile Computing & Communication', 'MCC'),
(71, 15, 'French Language', 'FL'),
(72, 15, 'Project Management', 'PM'),
(73, 20, 'Advanced Internet Technology', 'AIT'),
(74, 20, 'Data Mining and Business Intelligence', 'DMBI'),
(75, 20, 'Distributed Systems', 'DS'),
(76, 20, 'System and Web Security', 'SWS'),
(77, 20, 'Software Engineering', 'SE'),
(78, 21, 'Advanced Internet Technology', 'AIT'),
(79, 21, 'Data Mining and Business Intelligence', 'DMBI'),
(80, 21, 'Distributed Systems', 'DS'),
(81, 21, 'System and Web Security', 'SWS'),
(82, 21, 'Software Engineering', 'SE'),
(83, 22, 'Applied Mathematics IV', 'M4'),
(84, 22, 'Analog Electronics II', 'AE II'),
(85, 22, 'Control Systems', 'CS'),
(86, 22, 'Signals & Systems', 'SAS'),
(87, 22, 'Microprocessors & Peripherals', 'MPP'),
(88, 22, 'Wave Theory & Propagation', 'WTP'),
(89, 22, 'Software Simulation Laboratory', 'SSL'),
(90, 23, 'Applied Mathematics IV', 'M4'),
(91, 23, 'Analog Electronics II', 'AE II'),
(92, 23, 'Control Systems', 'CS'),
(93, 23, 'Signals & Systems', 'SAS'),
(94, 23, 'Microprocessors & Peripherals', 'MPP'),
(95, 23, 'Wave Theory & Propagation', 'WTP'),
(96, 23, 'Software Simulation Laboratory', 'SSL'),
(97, 24, 'Analysis of Algorithms', 'AOA'),
(98, 24, 'Database Management Systems', 'DBMS'),
(99, 24, 'Computer Graphics', 'CG'),
(100, 24, 'Computer Organization & Architecture', 'COA'),
(101, 24, 'Theoretical Computer Science', 'TCS'),
(102, 24, 'Applied Mathematics IV', 'M4'),
(103, 25, 'Analysis of Algorithms', 'AOA'),
(104, 25, 'Database Management Systems', 'DBMS'),
(105, 25, 'Computer Graphics', 'CG'),
(106, 25, 'Computer Organization & Architecture', 'COA'),
(107, 25, 'Theoretical Computer Science', 'TCS'),
(108, 25, 'Applied Mathematics IV', 'M4'),
(116, 26, 'Applied Maths IV', 'M4'),
(117, 26, 'Computer Networks', 'CN'),
(118, 26, 'Computer Organization and Architecture', 'COA'),
(119, 26, 'Automata Theory', 'AT'),
(120, 26, 'Web Programming', 'WP'),
(121, 26, 'Information Theory & Coding', 'ITC'),
(122, 27, 'Applied Maths IV', 'M4'),
(123, 27, 'Computer Networks', 'CN'),
(124, 27, 'Computer Organization and Architecture', 'COA'),
(125, 27, 'Automata Theory', 'AT'),
(126, 27, 'Web Programming', 'WP'),
(127, 27, 'Information Theory & Coding', 'ITC'),
(128, 28, 'Applied Mathematics II', 'M2'),
(129, 28, 'Engg Drawing', 'ED'),
(130, 28, 'Applied Physics II', 'AP II'),
(131, 28, 'Applied Chemistry II', 'AC II'),
(132, 28, 'Structured Program Analysis', 'SPA'),
(133, 28, 'Communication Skills', 'CS'),
(134, 28, 'Work Shop', 'WS'),
(135, 29, 'Applied Mathematics II', 'M2'),
(136, 29, 'Engg Drawing', 'ED'),
(137, 29, 'Applied Physics II', 'AP II'),
(138, 29, 'Applied Chemistry II', 'AC II'),
(139, 29, 'Structured Program Analysis', 'SPA'),
(140, 29, 'Communication Skills', 'CS'),
(141, 29, 'Work Shop', 'WS'),
(142, 30, 'Applied Mathematics II', 'M2'),
(143, 30, 'Engg Drawing', 'ED'),
(144, 30, 'Applied Physics II', 'AP II'),
(145, 30, 'Applied Chemistry II', 'AC II'),
(146, 30, 'Structured Program Analysis', 'SPA'),
(147, 30, 'Communication Skills', 'CS'),
(148, 30, 'Work Shop', 'WS'),
(149, 31, 'Applied Mathematics II', 'M2'),
(150, 31, 'Engg Drawing', 'ED'),
(151, 31, 'Applied Physics II', 'AP II'),
(152, 31, 'Applied Chemistry II', 'AC II'),
(153, 31, 'Structured Program Analysis', 'SPA'),
(154, 31, 'Communication Skills', 'CS'),
(155, 31, 'Work Shop', 'WS'),
(156, 32, 'Applied Mathematics II', 'M2'),
(157, 32, 'Engg Drawing', 'ED'),
(158, 32, 'Applied Physics II', 'AP II'),
(159, 32, 'Applied Chemistry II', 'AC II'),
(160, 32, 'Structured Program Analysis', 'SPA'),
(161, 32, 'Communication Skills', 'CS'),
(162, 32, 'Work Shop', 'WS'),
(163, NULL, 'French', 'FR'),
(164, NULL, 'Project Management', 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `oldsubforbatch`
--

CREATE TABLE IF NOT EXISTS `oldsubforbatch` (
  `subforbatch_id` int(10) unsigned NOT NULL,
  `subforbatch_batch_id` int(10) unsigned NOT NULL,
  `subforbatch_sub_id` int(10) unsigned NOT NULL,
  `subforbatch_des` text,
  PRIMARY KEY (`subforbatch_id`),
  KEY `subforbatch_batch_id` (`subforbatch_batch_id`,`subforbatch_sub_id`),
  KEY `subforbatch_sub_id` (`subforbatch_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oldteacherforsubforbatch`
--

CREATE TABLE IF NOT EXISTS `oldteacherforsubforbatch` (
  `teacherforsubforbatch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacherforsubforbatch_subforbatch` int(10) unsigned NOT NULL,
  `teacherforsubforbatch_teacher_id` int(10) unsigned NOT NULL,
  `teacherforsubforbatch_desc` text NOT NULL,
  PRIMARY KEY (`teacherforsubforbatch_id`),
  KEY `teacherforsubforbatch_subforbatch` (`teacherforsubforbatch_subforbatch`),
  KEY `teacherforsubforbatch_teacher_id` (`teacherforsubforbatch_teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldTT`
--

CREATE TABLE IF NOT EXISTS `oldTT` (
  `TT_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TT_classid` int(10) unsigned NOT NULL,
  `TT_filename` varchar(255) NOT NULL,
  `TT_uploadedby` varchar(85) NOT NULL,
  `TT_clean` tinyint(1) NOT NULL DEFAULT '1',
  `TT_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TT_id`),
  KEY `lec_subid` (`TT_classid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `otherfiles`
--

CREATE TABLE IF NOT EXISTS `otherfiles` (
  `otherfiles_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `otherfiles_sub_id` int(10) unsigned NOT NULL,
  `otherfiles_link` text NOT NULL,
  `otherfiles_name` text NOT NULL,
  PRIMARY KEY (`otherfiles_id`),
  KEY `questionpaper_sub_id` (`otherfiles_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questionpaper`
--

CREATE TABLE IF NOT EXISTS `questionpaper` (
  `questionpaper_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionpaper_sub_id` int(10) unsigned NOT NULL,
  `questionpaper_link` text NOT NULL,
  `questionpaper_name` text NOT NULL,
  PRIMARY KEY (`questionpaper_id`),
  KEY `questionpaper_sub_id` (`questionpaper_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE IF NOT EXISTS `quiz_answers` (
  `answer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quizzes_options_fk` int(10) unsigned NOT NULL,
  `answer_option_number` int(4) NOT NULL,
  `answer_email` varchar(255) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `answer_email` (`answer_email`),
  KEY `quizzes_options_fk` (`quizzes_options_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE IF NOT EXISTS `quiz_options` (
  `option_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id_fk` int(10) unsigned NOT NULL,
  `option_text` varchar(1000) NOT NULL,
  `option_correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `test_id_fk` (`test_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_tests`
--

CREATE TABLE IF NOT EXISTS `quiz_tests` (
  `test_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_title` varchar(255) NOT NULL,
  `test_start` datetime DEFAULT NULL,
  `test_end` datetime DEFAULT NULL,
  `test_duration` time DEFAULT NULL,
  `test_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `test_by` varchar(200) NOT NULL,
  `test_subid` int(10) unsigned DEFAULT NULL,
  `test_randomizeOrder` tinyint(1) NOT NULL DEFAULT '0',
  `test_markingScheme` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`test_id`),
  KEY `test_by` (`test_by`,`test_subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quiz_tests`
--

INSERT INTO `quiz_tests` (`test_id`, `test_title`, `test_start`, `test_end`, `test_duration`, `test_timestamp`, `test_by`, `test_subid`, `test_randomizeOrder`, `test_markingScheme`) VALUES
(1, 'MP CT-1 ', NULL, NULL, NULL, '2015-09-04 14:18:19', 'davidgasner46@gmail.com', 66, 0, 0),
(2, 'TPO apti-test 1', NULL, NULL, NULL, '2015-09-04 15:15:05', 'davidgasner46@gmail.com', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_tests_classids`
--

CREATE TABLE IF NOT EXISTS `quiz_tests_classids` (
  `test_classids_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` int(10) unsigned NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`test_classids_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quiz_tests_classids`
--

INSERT INTO `quiz_tests_classids` (`test_classids_id`, `test_id`, `class_id`) VALUES
(1, 2, 66),
(2, 2, 65);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_test_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_test_questions` (
  `question_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id_fk` int(10) unsigned NOT NULL,
  `question_no` int(4) unsigned NOT NULL,
  `question_question` varchar(1000) NOT NULL,
  `question_type` int(3) unsigned NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `test_id_fk` (`test_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE IF NOT EXISTS `sub` (
  `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) NOT NULL,
  `sub_abbv` varchar(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`sub_id`, `sub_name`, `sub_abbv`) VALUES
(14, 'Advanced Microwave Engineering', 'AME'),
(15, 'Optical Fiber Communication', 'OFC'),
(16, 'Wireless Networks', 'WN'),
(17, 'Image Processing', 'IP'),
(18, 'Telecomm Network Management', 'TNM'),
(19, 'Advanced Microwave Engineering', 'AME'),
(20, 'Optical Fiber Communication', 'OFC'),
(21, 'Wireless Networks', 'WN'),
(22, 'Image Processing', 'IP'),
(23, 'Telecomm Network Management', 'TNM'),
(24, 'Software Architecture', 'SA'),
(25, 'Human Computer Interaction', 'HCI'),
(26, 'Distributed Computing', 'DS'),
(27, 'Multimedia System Design', 'MSD'),
(28, 'Software Architecture', 'SA'),
(29, 'Human Computer Interaction', 'HCI'),
(30, 'Distributed Computing', 'DS'),
(31, 'Multimedia System Design', 'MSD'),
(32, 'Information Storage Management & Disaster Recovery', 'ISMDR'),
(33, 'Game Architecture and Programming', 'GAP'),
(34, 'Software Project Management', 'SPM'),
(35, 'Mobile E-Commerce', 'MEC'),
(36, 'Information Storage Management & Disaster Recovery', 'ISMDR'),
(37, 'Game Architecture and Programming', 'GAP'),
(38, 'Software Project Management', 'SPM'),
(39, 'Mobile E-Commerce', 'MEC'),
(40, 'Digital Communication', 'DC'),
(41, 'Discrete Time Signal Processing', 'DTSP'),
(42, 'Computer Communication & Telecomm Networks', 'CCN'),
(43, 'Television Engineering', 'TE'),
(44, 'Operating Systems', 'OS'),
(45, 'VLSI Designs', 'VLSI'),
(46, 'Discrete Time Signal Processing Laboratory', 'DTSPL LAB'),
(47, 'Communication Engineering Laboratory III', 'CE III LAB'),
(48, 'Communication Engineering Laboratory IV', 'CE IV LAB'),
(49, 'Mini Project II', 'MP II'),
(50, 'Digital Communication', 'DC'),
(51, 'Discrete Time Signal Processing', 'DTSP'),
(52, 'Computer Communication & Telecomm Networks', 'CCN'),
(53, 'Television Engineering', 'TE'),
(54, 'Operating Systems', 'OS'),
(55, 'VLSI Designs', 'VLSI'),
(56, 'Discrete Time Signal Processing Laboratory', 'DTSPL LAB'),
(57, 'Communication Engineering Laboratory III', 'CE III LAB'),
(58, 'Communication Engineering Laboratory IV', 'CE IV LAB'),
(59, 'Mini Project II', 'MP II'),
(60, 'Distributed Database', 'DDB'),
(61, 'Networks Programming Lab', 'NPL'),
(62, 'System Programming & Compiler Construction', 'SPCC'),
(63, 'Software Engineering', 'SE'),
(64, 'Mobile Computing & Communication', 'MCC'),
(65, 'German Language', 'GL'),
(66, 'Distributed Database', 'DDM'),
(67, 'Networks Programming Lab', 'NPL'),
(68, 'System Programming & Compiler Construction', 'SPCC'),
(69, 'Software Engineering', 'SE'),
(70, 'Mobile Computing & Communication', 'MCC'),
(71, 'French Language', 'FL'),
(72, 'Project Management', 'PM'),
(73, 'Advanced Internet Technology', 'AIT'),
(74, 'Data Mining and Business Intelligence', 'DMBI'),
(75, 'Distributed Systems', 'DS'),
(76, 'System and Web Security', 'SWS'),
(77, 'Software Engineering', 'SE'),
(78, 'Advanced Internet Technology', 'AIT'),
(79, 'Data Mining and Business Intelligence', 'DMBI'),
(80, 'Distributed Systems', 'DS'),
(81, 'System and Web Security', 'SWS'),
(82, 'Software Engineering', 'SE'),
(83, 'Applied Mathematics IV', 'M4'),
(84, 'Analog Electronics II', 'AE II'),
(85, 'Control Systems', 'CS'),
(86, 'Signals & Systems', 'SAS'),
(87, 'Microprocessors & Peripherals', 'MPP'),
(88, 'Wave Theory & Propagation', 'WTP'),
(89, 'Software Simulation Laboratory', 'SSL'),
(90, 'Applied Mathematics IV', 'M4'),
(91, 'Analog Electronics II', 'AE II'),
(92, 'Control Systems', 'CS'),
(93, 'Signals & Systems', 'SAS'),
(94, 'Microprocessors & Peripherals', 'MPP'),
(95, 'Wave Theory & Propagation', 'WTP'),
(96, 'Software Simulation Laboratory', 'SSL'),
(97, 'Analysis of Algorithms', 'AOA'),
(98, 'Database Management Systems', 'DBMS'),
(99, 'Computer Graphics', 'CG'),
(100, 'Computer Organization & Architecture', 'COA'),
(101, 'Theoretical Computer Science', 'TCS'),
(102, 'Applied Mathematics IV', 'M4'),
(103, 'Analysis of Algorithms', 'AOA'),
(104, 'Database Management Systems', 'DBMS'),
(105, 'Computer Graphics', 'CG'),
(106, 'Computer Organization & Architecture', 'COA'),
(107, 'Theoretical Computer Science', 'TCS'),
(108, 'Applied Mathematics IV', 'M4'),
(116, 'Applied Maths IV', 'M4'),
(117, 'Computer Networks', 'CN'),
(118, 'Computer Organization and Architecture', 'COA'),
(119, 'Automata Theory', 'AT'),
(120, 'Web Programming', 'WP'),
(121, 'Information Theory & Coding', 'ITC'),
(122, 'Applied Maths IV', 'M4'),
(123, 'Computer Networks', 'CN'),
(124, 'Computer Organization and Architecture', 'COA'),
(125, 'Automata Theory', 'AT'),
(126, 'Web Programming', 'WP'),
(127, 'Information Theory & Coding', 'ITC'),
(128, 'Applied Mathematics II', 'M2'),
(129, 'Engg Drawing', 'ED'),
(130, 'Applied Physics II', 'AP II'),
(131, 'Applied Chemistry II', 'AC II'),
(132, 'Structured Program Analysis', 'SPA'),
(133, 'Communication Skills', 'CS'),
(134, 'Work Shop', 'WS'),
(135, 'Applied Mathematics II', 'M2'),
(136, 'Engg Drawing', 'ED'),
(137, 'Applied Physics II', 'AP II'),
(138, 'Applied Chemistry II', 'AC II'),
(139, 'Structured Program Analysis', 'SPA'),
(140, 'Communication Skills', 'CS'),
(141, 'Work Shop', 'WS'),
(142, 'Applied Mathematics II', 'M2'),
(143, 'Engg Drawing', 'ED'),
(144, 'Applied Physics II', 'AP II'),
(145, 'Applied Chemistry II', 'AC II'),
(146, 'Structured Program Analysis', 'SPA'),
(147, 'Communication Skills', 'CS'),
(148, 'Work Shop', 'WS'),
(149, 'Applied Mathematics II', 'M2'),
(150, 'Engg Drawing', 'ED'),
(151, 'Applied Physics II', 'AP II'),
(152, 'Applied Chemistry II', 'AC II'),
(153, 'Structured Program Analysis', 'SPA'),
(154, 'Communication Skills', 'CS'),
(155, 'Work Shop', 'WS'),
(156, 'Applied Mathematics II', 'M2'),
(157, 'Engg Drawing', 'ED'),
(158, 'Applied Physics II', 'AP II'),
(159, 'Applied Chemistry II', 'AC II'),
(160, 'Structured Program Analysis', 'SPA'),
(161, 'Communication Skills', 'CS'),
(162, 'Work Shop', 'WS'),
(163, 'French', 'FR'),
(164, 'Project Management', 'PM'),
(165, 'Soft Computing', 'SC'),
(166, 'Enterprise Resource Planning', 'ERP'),
(167, 'Network Threats and Attacks Laboratory', 'NTA'),
(168, 'Cryptography and System Security', 'CSS'),
(169, 'Artificial Intelligence', 'AI'),
(170, 'Digital Signal Processing ', 'DSP'),
(171, 'Big Data Analytics', 'BDA'),
(172, 'Adhoc Wireless Networks', 'AWN'),
(173, 'Digital Forensics', 'DF'),
(174, 'Cloud Computing', 'CC'),
(175, 'Human Machine Interaction', 'HMI');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `subm_id` int(10) NOT NULL AUTO_INCREMENT,
  `subm_ass_id` int(8) NOT NULL,
  `subm_email` varchar(255) NOT NULL,
  `subm_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subm_file` varchar(500) NOT NULL,
  `subm_comment` varchar(255) DEFAULT NULL,
  `subm_marks` int(3) DEFAULT NULL,
  `subm_feedback` text,
  `subm_checkedby` varchar(255) DEFAULT NULL,
  `subm_status` enum('Submitted','Late Submission','Rejected','Accepted','Late') DEFAULT NULL,
  `subm_checkedon` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subm_id`),
  KEY `subm_ass_id` (`subm_ass_id`),
  KEY `subm_email` (`subm_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`subm_id`, `subm_ass_id`, `subm_email`, `subm_timestamp`, `subm_file`, `subm_comment`, `subm_marks`, `subm_feedback`, `subm_checkedby`, `subm_status`, `subm_checkedon`) VALUES
(25, 43, 'trishareilly2206@gmail.com', '2015-03-15 15:11:03', '10.jpg', 'It''s based on Christofer Nolan''s movie ''The Dark Knight''.\r\nP.S. Its contains images that are graphic.\r\nYessssdnoo4awok', 5, NULL, NULL, 'Accepted', NULL),
(26, 45, 'trishareilly2206@gmail.com', '2015-03-15 14:47:12', 'logo.png', '<?php echo "Hacked!"; ?>', NULL, NULL, NULL, 'Submitted', NULL),
(27, 42, 'trishareilly2206@gmail.com', '2015-03-15 15:19:43', 'jay.txt', 'deqw', NULL, NULL, NULL, 'Late Submission', NULL),
(28, 43, 'demo.ga100@gmail.com', '2015-03-15 18:07:13', 'core_Labour.xlsx', 'rt', 7, 'fine', NULL, 'Accepted', NULL),
(29, 46, 'demo.ga100@gmail.com', '2015-03-15 21:19:22', 'Material_131321(2).xlsx', 'And increases speed over  wide spread systems... ', 8, 'Nice Work. Next time also do mention the sources in the bibliography and also mention which group member participated in which part.', NULL, 'Accepted', NULL),
(30, 46, 'augustineremy@gmail.com', '2015-04-02 17:43:37', 'Receipt-Study_Material_Form.pdf', 'tree2', NULL, NULL, NULL, '', NULL),
(31, 49, 'augustineremy@gmail.com', '2015-03-22 06:51:31', 'N_AND_N_CONSTRUCTION_WORK_ORDER.doc', 'yu', 8, 'nice', NULL, 'Accepted', NULL),
(32, 49, 'augustinereena@gmail.com', '2015-03-22 07:32:18', 'download.jpg', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(34, 48, 'trishareilly2206@gmail.com', '2015-03-25 18:43:50', 'ASSGN.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(35, 47, 'trishareilly2206@gmail.com', '2015-03-25 18:49:41', 'ASSGN_1.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(36, 50, 'augustineremy@gmail.com', '2015-04-02 18:02:18', 'TEITA_(1).pdf', 'hi', 10, 'nice', NULL, 'Accepted', NULL),
(37, 51, 'augustineremy@gmail.com', '2015-04-03 11:13:22', 'G.Woods_ph-II_C_Wing_1.doc', 'yo', NULL, NULL, NULL, 'Late', NULL),
(38, 48, 'marjorieaugustine05@gmail.com', '2015-06-05 15:13:35', 'ga1.jpg', 'not from te cmpn b', NULL, NULL, NULL, 'Late', NULL),
(39, 48, 'augustinereena@gmail.com', '2015-06-05 15:39:38', '1773637.jpg', 'Test 12', NULL, NULL, NULL, 'Late', NULL),
(40, 47, 'aartip981@gmail.com', '2015-06-05 18:06:56', 'BOUNDARYFILL.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(41, 49, 'aartip981@gmail.com', '2015-06-05 18:07:49', 'cohen_sutherland_line_clipping.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(42, 48, 'aartip981@gmail.com', '2015-06-05 18:09:13', 'floodfill.docx', 'From amazon.research.co.in', NULL, NULL, NULL, 'Late', NULL),
(43, 52, 'aartip981@gmail.com', '2015-06-05 18:09:43', '0_DDACircle_appli.rtf', NULL, 9, 'Good work!', NULL, 'Accepted', NULL),
(44, 51, 'aartip981@gmail.com', '2015-06-05 18:13:36', '3_cohen_sutherland_algorithm.rtf', 'Completed with Rishi''s group.', NULL, NULL, NULL, 'Late', NULL),
(45, 53, 'aartip981@gmail.com', '2015-06-05 18:14:48', '4_LIANGBASKY_ALGORITHM.rtf', 'Topic : LIANGBASKY ALGORITHM', NULL, NULL, NULL, 'Submitted', NULL),
(46, 47, 'roven0756@gmail.com', '2015-06-05 18:24:32', 'cn(2).docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(47, 48, 'roven0756@gmail.com', '2015-06-05 18:25:10', 'Assignment_1.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(48, 52, 'roven0756@gmail.com', '2015-06-05 18:26:43', 'OS_exp_5A.rtf', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(49, 51, 'roven0756@gmail.com', '2015-06-05 18:26:58', 'OS_exp_5B.rtf', NULL, NULL, NULL, NULL, 'Late', NULL),
(50, 53, 'roven0756@gmail.com', '2015-06-05 18:27:23', 'exp3.txt', NULL, 8, 'U suck', NULL, 'Rejected', NULL),
(51, 51, 'salomo0756@gmail.com', '2015-06-05 18:45:08', 'AMP2.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(52, 53, 'salomo0756@gmail.com', '2015-06-05 18:45:46', 'amp1.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(53, 52, 'salomo0756@gmail.com', '2015-06-05 18:46:42', 'Expt_2.docx', 'Only Part A and C.', NULL, NULL, NULL, 'Submitted', NULL),
(54, 48, 'salomo0756@gmail.com', '2015-06-05 18:47:17', 'Experiment_No_1.doc', NULL, NULL, NULL, NULL, 'Late', NULL),
(55, 47, 'salomo0756@gmail.com', '2015-06-05 18:47:33', 'Experiment_No_2.doc', NULL, NULL, NULL, NULL, 'Late', NULL),
(56, 49, 'salomo0756@gmail.com', '2015-06-05 18:47:51', 'Expt5.txt', NULL, NULL, NULL, NULL, 'Late', NULL),
(57, 51, 'brad6423@gmail.com', '2015-06-05 18:56:26', '6_FRACAPP.rtf', NULL, NULL, NULL, NULL, 'Late', NULL),
(58, 52, 'brad6423@gmail.com', '2015-06-05 18:56:44', 'cohen_sutherland_line_clipping.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(59, 53, 'brad6423@gmail.com', '2015-06-05 18:57:10', 'floodfill.docx', NULL, 8, 'wrong assign', NULL, 'Rejected', NULL),
(60, 49, 'brad6423@gmail.com', '2015-06-05 18:59:11', 'cohen_sutherland_line_clipping_1.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(61, 48, 'brad6423@gmail.com', '2015-06-05 18:59:30', 'BOUNDARYFILL_1.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(62, 47, 'brad6423@gmail.com', '2015-06-05 18:59:57', '0_DDACIRCLEA_ALGO.rtf', NULL, NULL, NULL, NULL, 'Late', NULL),
(63, 51, 'bp0756@gmail.com', '2015-06-05 19:12:52', 'OS_exp_5B_1.rtf', NULL, NULL, NULL, NULL, 'Late', NULL),
(64, 53, 'bp0756@gmail.com', '2015-06-05 19:14:09', 'spcc3.docx', 'Group Members: Tina, Brian, Shreraj, Apoorva', 8, NULL, NULL, 'Accepted', NULL),
(65, 52, 'bp0756@gmail.com', '2015-06-05 19:14:56', 'Exp2.docx', 'Group members Brian, Ryan, Gurbux', 9, NULL, NULL, 'Accepted', NULL),
(66, 48, 'bp0756@gmail.com', '2015-06-05 19:15:49', 'XMl_DTD.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(67, 47, 'bp0756@gmail.com', '2015-06-05 19:16:13', 'adbms-6.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(68, 49, 'bp0756@gmail.com', '2015-06-05 19:16:34', 'nested_quries.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(69, 51, 'kb057621@gmail.com', '2015-06-05 19:30:06', 'OS_exp_5B_2.rtf', NULL, NULL, NULL, NULL, 'Late', NULL),
(70, 52, 'kb057621@gmail.com', '2015-06-05 19:30:26', 'OS_exp_5A_1.rtf', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(71, 53, 'kb057621@gmail.com', '2015-06-05 19:30:42', 'SJF.C', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(72, 48, 'kb057621@gmail.com', '2015-06-05 19:47:51', 'OS_exp_5A.rtf', NULL, NULL, NULL, NULL, 'Late', NULL),
(73, 47, 'kb057621@gmail.com', '2015-06-05 19:48:36', 'OS_exp3A.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(74, 49, 'kb057621@gmail.com', '2015-06-05 19:49:00', 'Technical_Proposal.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(75, 55, 'brad6423@gmail.com', '2015-06-06 06:25:47', 'ass_4.docx', NULL, 7, 'Next time use font size 14, also make sure your bullet points are short and precise rather than paragraphs.', NULL, 'Accepted', NULL),
(76, 56, 'brad6423@gmail.com', '2015-06-06 06:26:07', '4.SE.COCOMO.UNIV_(2).docx', NULL, 9, NULL, NULL, 'Accepted', NULL),
(77, 57, 'brad6423@gmail.com', '2015-06-06 06:26:24', 'Operational_feasibility.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(78, 60, 'brad6423@gmail.com', '2015-06-06 06:27:08', 'Experiment_No._6.docx', NULL, 8, 'Good.', NULL, 'Accepted', NULL),
(79, 63, 'brad6423@gmail.com', '2015-06-06 06:27:26', 'Exp_7-XML_DTD.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(80, 62, 'brad6423@gmail.com', '2015-06-06 06:28:28', 'Exp_8-XML_Schema.docx', NULL, 6, 'Answer 2 is wrong please correct it.', NULL, 'Accepted', NULL),
(81, 56, 'bp0756@gmail.com', '2015-06-06 19:08:17', '9.1_deploymnt.docx', NULL, NULL, 'Not Complete', NULL, 'Rejected', NULL),
(82, 61, 'bp0756@gmail.com', '2015-06-06 21:58:38', '9.1_deploymnt_1.docx', 'Deployment diagram is from McCall''s reference book.', NULL, NULL, NULL, 'Submitted', NULL),
(83, 116, 'salomo0756@gmail.com', '2015-06-10 04:06:23', 'OS_exp3A.docx', NULL, 9, 'Next time submit on time.', NULL, 'Accepted', NULL),
(84, 119, 'salomo0756@gmail.com', '2015-06-10 04:11:13', 'OS_exp3B.odt', 'Sir answer 4 is not there cause it is the same as answer 2.', NULL, NULL, NULL, 'Submitted', NULL),
(85, 116, 'aartip981@gmail.com', '2015-06-10 04:15:41', 'Technical_Proposal.docx', NULL, 8, 'Next time submit on time.', NULL, 'Accepted', NULL),
(86, 119, 'aartip981@gmail.com', '2015-06-10 04:16:27', 'Problem_Statement_actual.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(87, 55, 'aartip981@gmail.com', '2015-06-10 04:17:06', 'OS_exp3A_1.docx', NULL, 8, NULL, NULL, 'Accepted', NULL),
(88, 56, 'aartip981@gmail.com', '2015-06-10 04:17:25', 'OS_exp3A_2.docx', NULL, 8, NULL, NULL, 'Accepted', NULL),
(89, 57, 'aartip981@gmail.com', '2015-06-10 04:17:50', 'Technical_Proposal_(2).docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(90, 121, 'aartip981@gmail.com', '2015-06-10 19:11:57', 'assign_3_A,B.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(91, 121, 'roven0756@gmail.com', '2015-06-10 19:14:14', 'adbms-6.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(92, 116, 'roven0756@gmail.com', '2015-07-04 18:26:43', 'LRU.txt', 'Reference book used is 4th Edition Distributed Database Systems from Tata publications.', 8, 'Good work however next time please submit on time.', NULL, 'Accepted', NULL),
(93, 121, 'salomo0756@gmail.com', '2015-06-10 19:18:17', 'OS_exp3A_3.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(94, 116, 'brad6423@gmail.com', '2015-06-10 19:20:52', 'Problem_Statement_actual_1.docx', NULL, 8, NULL, NULL, 'Accepted', NULL),
(95, 121, 'brad6423@gmail.com', '2015-06-10 19:26:50', 'OS_exp_5B_3.rtf', 'Sir the ans to the 1st question is not in the ppts or Smith''s reference book, not sure if its right.', NULL, NULL, NULL, 'Submitted', NULL),
(96, 121, 'bp0756@gmail.com', '2015-06-10 20:47:12', 'brian.docx', NULL, 8, 'Good Work!', NULL, 'Accepted', NULL),
(97, 116, 'bp0756@gmail.com', '2015-06-10 19:28:59', 'Problem_Statement_actual_2.docx', NULL, 8, 'Good work, next time also mention the sites you used as reference.', NULL, 'Accepted', NULL),
(98, 121, 'kb057621@gmail.com', '2015-06-10 19:29:55', 'OS_exp3A_4.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(99, 116, 'kb057621@gmail.com', '2015-06-10 19:30:30', 'level2.docx', NULL, 7, NULL, NULL, 'Accepted', NULL),
(100, 55, 'kb057621@gmail.com', '2015-06-10 19:31:05', '5_CLIPPOLY_ALGO.rtf', NULL, 7, NULL, NULL, 'Accepted', NULL),
(101, 56, 'kb057621@gmail.com', '2015-06-10 20:25:18', 'BOUNDARYFILL.docx', NULL, 7, NULL, NULL, 'Accepted', NULL),
(102, 121, 'trishareilly2206@gmail.com', '2015-06-10 21:53:22', 'New_Microsoft_Word_Document.docx', NULL, 9, 'Good Work', NULL, 'Accepted', NULL),
(103, 116, 'augustinereena@gmail.com', '2015-06-11 06:50:13', 'Experiment_No._6_1.docx', NULL, 8, NULL, NULL, 'Accepted', NULL),
(104, 57, 'augustinereena@gmail.com', '2015-06-11 06:50:49', 'exp3_final.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(105, 59, 'augustinereena@gmail.com', '2015-06-11 06:51:22', 'EXPT5-ddbms.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(106, 60, 'augustinereena@gmail.com', '2015-06-11 06:51:35', 'Experiment_No._6_2.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(107, 61, 'augustinereena@gmail.com', '2015-06-11 06:51:52', 'Exp_7-XML_DTD_1.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(108, 62, 'augustinereena@gmail.com', '2015-06-11 06:52:11', 'Exp_8-XML_Schema_1.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(109, 53, 'augustinereena@gmail.com', '2015-06-11 06:52:57', 'MAIN_TABLE_EXP4.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(110, 121, 'augustinereena@gmail.com', '2015-06-11 06:53:16', 'exp3_final_1.docx', NULL, NULL, NULL, NULL, 'Submitted', NULL),
(111, 116, 'ranjithjames1994@gmail.com', '2015-06-24 11:12:09', 'Calculating_Detail_quantity_of_projects.docx', NULL, 9, 'gd', NULL, 'Accepted', NULL),
(112, 55, 'bp0756@gmail.com', '2015-06-29 18:02:23', 'Mama.xlsx', NULL, 7, 'Pay attention to formatting.', NULL, 'Accepted', NULL),
(113, 57, 'bp0756@gmail.com', '2015-06-29 18:03:05', 'EXAMINATINON_INVIGILATION_SCHEDULE.xlsx', NULL, 9, 'Good work', NULL, 'Accepted', NULL),
(114, 59, 'bp0756@gmail.com', '2015-06-29 18:04:04', 'Assignment_1.docx', NULL, NULL, NULL, NULL, 'Late', NULL),
(115, 59, 'brad6423@gmail.com', '2015-06-29 18:08:22', 'teachers_list.xlsx', NULL, NULL, NULL, NULL, 'Late', NULL),
(116, 62, 'bp0756@gmail.com', '2015-07-09 05:38:53', 'resume-Reena_2015[1]_(1).doc', 'fd', NULL, NULL, NULL, 'Late', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subteacher`
--

CREATE TABLE IF NOT EXISTS `subteacher` (
  `st_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`st_id`),
  KEY `tid` (`tid`),
  KEY `subid` (`subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subteacher`
--

INSERT INTO `subteacher` (`st_id`, `subid`, `tid`) VALUES
(9, 72, 12),
(10, 66, 7),
(11, 66, 13),
(12, 104, 13),
(13, 98, 13),
(14, 61, 12);

-- --------------------------------------------------------

--
-- Table structure for table `timestate`
--

CREATE TABLE IF NOT EXISTS `timestate` (
  `timestate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestate_year` int(10) NOT NULL,
  `timestate_type` enum('halfyearly','quaterly','yearly','') DEFAULT NULL,
  `timestate_part` int(10) DEFAULT NULL,
  `timestate_des` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`timestate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `timestate`
--

INSERT INTO `timestate` (`timestate_id`, `timestate_year`, `timestate_type`, `timestate_part`, `timestate_des`) VALUES
(1, 2016, 'halfyearly', 1, 'odd sem for sfit se/te/be');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gplus_id` char(21) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `rt` text,
  `entrytime` timestamp NULL DEFAULT NULL,
  `custom` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('0','student','cr','teacher','hod','principal','admin') NOT NULL DEFAULT '0',
  `verified` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `reported` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `phone0` bigint(13) DEFAULT NULL,
  `facebook0` varchar(255) DEFAULT NULL,
  `instagram0` varchar(255) DEFAULT NULL,
  `twitter0` varchar(255) DEFAULT NULL,
  `location0` varchar(255) DEFAULT NULL,
  `aboutme0` text,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `gplus_id_2` (`gplus_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `gplus_id`, `email`, `name`, `picture`, `rt`, `entrytime`, `custom`, `type`, `verified`, `reported`, `phone0`, `facebook0`, `instagram0`, `twitter0`, `location0`, `aboutme0`) VALUES
(28, '109081138586167437385', 'augustineremy@gmail.com', 'Remy Augustine', '', '1/6A7uWcFizaq-W2tbAcc6z6e1VI5iF7MMLbXtKFMkuacMEudVrK5jSpoR30zcRFq6', '2015-02-08 10:48:49', 1, 'student', 0, 0, 9895562290, NULL, NULL, NULL, NULL, NULL),
(29, '111944797552300290378', 'ryan.augustine.10@gmail.com', 'Ryan Augustine', '', '1/HnJTANFQrLsqPR0mJXFyhqGFtkqah1CQVl5IAhPZd34MEudVrK5jSpoR30zcRFq6', '2015-02-08 13:16:06', 1, 'teacher', 0, 0, 9594462290, NULL, NULL, NULL, NULL, NULL),
(30, '103802570324596314253', 'ryanaugustine12@gmail.com', 'Ryan Augustine', '', '1/TGLtXDMHaFJUMxqkWVvC2EqUAhcs66vE7epll8HizooMEudVrK5jSpoR30zcRFq6', '2015-02-08 15:33:36', 1, 'teacher', 1, 0, 9794462290, NULL, NULL, NULL, NULL, NULL),
(32, '102526813046128524972', 'sleeping.napster@gmail.com', 'Sleeping Napster', '', '1/njJE0oscnHinExyy_JdFpwnxBsd9AyU_LmdXr_jRahp90RDknAdJa_sgfheVM0XT', '2015-02-08 18:01:56', 1, 'teacher', 0, 0, 9548879962, NULL, NULL, NULL, NULL, NULL),
(34, '104414453200991628158', 'augustinereena@gmail.com', 'reena augustine', '', '1/a0YC5rRB0s_TCZ1nsF1c914Owla8fdyrzxak4j_dn74', '2015-03-08 13:17:05', 1, 'student', 0, 0, 9894952617, NULL, NULL, NULL, NULL, 'I love reading.'),
(35, '102053525045391092645', 'trishareilly2206@gmail.com', 'Trisha Reilly', '', '1/nd5sDqRiRb5VuMzIYxGH05-FWT5S8yQrkdHDXcXlmBgMEudVrK5jSpoR30zcRFq6', '2015-03-15 13:00:42', 1, 'student', 0, 0, 9004426659, NULL, NULL, NULL, NULL, NULL),
(36, '104183589072195297955', 'demo.ga100@gmail.com', 'Roma D''souza', '', '1/2rP8u58Mxqk70legygeX-Epn9nnJR688Ie2CMZPQvsw', '2015-03-15 18:00:20', 1, 'student', 0, 0, 9004201569, NULL, NULL, NULL, NULL, NULL),
(37, '107673166359783926040', 'solankirishi4@gmail.com', 'Solanki d Rishi', 'fgd', '1/8Ai2eLx6ZwoTe_lSkUXZzqL9f9Sdp3oRWdwa5v5g-AU', '2015-03-20 08:25:59', 1, 'student', 0, 0, 9004206915, NULL, NULL, NULL, NULL, NULL),
(38, '118146360342956231681', 'marjorieaugustine05@gmail.com', 'Marjorie Augustine', '', '1/yIZSveJdClpu4ql7iYF7ND7iZmEEqYGWEQPq2es4jyI', '2015-03-22 03:56:32', 1, 'student', 0, 0, 9594462297, NULL, NULL, NULL, NULL, NULL),
(39, '114813448931243251186', 'chintanmistry.00@gmail.com', 'Chintan Mistry', '', '1/4M-Xubxfy_uZZfh20p0EA9nJ4pCnEMzu-99fdTGE5oM', '2015-03-24 09:23:25', 1, 'student', 0, 0, 9846549875, NULL, NULL, NULL, NULL, NULL),
(40, '117617943005088471693', 'reenagill46@gmail.com', 'Reena Gill', '', NULL, '2015-03-30 18:09:56', 1, 'teacher', 0, 0, 9879879879, NULL, NULL, NULL, NULL, NULL),
(41, '117642939472038149079', 'vikramshete4@gmail.com', 'Vikram Shete', '', NULL, '2015-03-31 18:03:33', 1, 'teacher', 1, 0, 9998887775, NULL, NULL, NULL, NULL, NULL),
(42, '103303775659651556045', 'davidgasner46@gmail.com', 'David Gasner', '', '1/vd1b4S6Y_4GRch_btyFqvt4lodqEY1ISSykSnVIVmbgMEudVrK5jSpoR30zcRFq6', '2015-03-31 19:10:46', 1, 'teacher', 1, 0, 9594462290, 'facebook.com/ryan.augustine.10', NULL, '@twitterman', NULL, 'Once in a while someone amazing comes along...<br>\r\nand here I am.\r\n'),
(43, '102168130879318418145', 'aartip981@gmail.com', 'Aarti Parmar', '', '1/A_rgcpFmFlFXmVVDwc19OlFmYIyrCS-Mz_GYrTd1wTXBactUREZofsF9C7PrpE-j', '2015-06-05 18:04:05', 1, 'student', 0, 0, 6549875642, NULL, NULL, NULL, NULL, NULL),
(44, '101949431916952138450', 'roven0756@gmail.com', 'Roven Naz', '', '1/SBR6KXaVey-SSIfWbHT-gpCE4o8OpNCU-R_VuIDnpRlIgOrJDtdun6zK6XiATCKT', '2015-06-05 18:23:05', 1, 'student', 0, 0, 9594462290, 'facebook.com/ryan.augustine', 'instagram.com/augustineryan', 'twitter', 'MiraRoad', 'Yo MAMA YO!!!'),
(45, '101809473517870900287', 'salomo0756@gmail.com', 'Saloma Dsa', '', '1/rjJ-vmXMO1D4l4ghgHCoQ-XeAsW048VKMbq-MzJ4IkFIgOrJDtdun6zK6XiATCKT', '2015-06-05 18:34:41', 1, 'student', 0, 0, 6543215879, NULL, NULL, NULL, NULL, NULL),
(46, '113836128118145483473', 'brad6423@gmail.com', 'Bradley Cooper', '', '1/p1K4PA6es91Os6ECU4QOYrP1qDMv66uOI7-PueSYWiXBactUREZofsF9C7PrpE-j', '2015-06-05 18:54:33', 1, 'student', 0, 0, 9876549872, NULL, NULL, NULL, NULL, NULL),
(47, '115435000735889338790', 'bp0756@gmail.com', 'Brian Pinto', '', '1/72awic9KcIwW9ZbJ2nIZ4etQYryieNvTD9MLcKtgrPBIgOrJDtdun6zK6XiATCKT', '2015-06-05 19:10:43', 1, 'student', 0, 0, 9594462295, 'facebook.com/brian.pinto.127', 'instagram.com/brian_242', NULL, 'Borivali', 'Almost an engineer! If given a chance to be someone else I would choose to be the prime minister of India, not to change the world or any thing just to make sure that Vasai and every other place gets electricity 24x7!<br>\r\nCause honestly I am tired of load shedding!'),
(48, '104126188228741228563', 'kb057621@gmail.com', 'Kartik Buterchariya', '', '1/ABdhCIHExA0itgaPCJp94RqIeLM7EWqgzUr675EdLxFIgOrJDtdun6zK6XiATCKT', '2015-06-05 19:27:09', 1, 'student', 0, 0, 9513579713, NULL, NULL, NULL, NULL, NULL),
(52, '100204529859583618946', 'ranjithjames1994@gmail.com', 'ranjith james', '', '1/YthPvy0O-pP8ITpWvKbErsd68ZAOuRZ2OWCSZGHvSqg', '2015-06-24 11:07:58', 1, 'student', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '105006469754236649826', 'clyde.mendonca01@gmail.com', 'Clyde Mendonca', '', '1/Wf28S-DYwRm9WP8wQkL6qRBTJvJW3-5kJqYMtSWcZZY', '2015-07-13 04:41:02', 1, 'student', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '101771352627400149027', 'hustler052@gmail.com', 'hustler bustler', '', '1/0EmplNRTPI1kZNvz16dzjHEHabb_s4UhmINPdYA6hNE', '2015-07-16 15:19:02', 0, '0', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '105377737389102818908', 'ryanaugustine14@gmail.com', 'Ryan Augustine', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', NULL, '2016-06-23 20:35:38', 0, '0', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

CREATE TABLE IF NOT EXISTS `user_student` (
  `us_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `us_u_id` int(10) unsigned NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_imageurl` varchar(255) DEFAULT NULL,
  `us_displayname` varchar(120) NOT NULL,
  `us_pid` int(9) DEFAULT NULL,
  PRIMARY KEY (`us_id`),
  KEY `email` (`us_email`),
  KEY `us_u_id` (`us_u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`us_id`, `us_u_id`, `us_email`, `us_imageurl`, `us_displayname`, `us_pid`) VALUES
(15, 28, 'augustineremy@gmail.com', NULL, 'Remy Augustine', 45),
(20, 34, 'augustinereena@gmail.com', NULL, 'reena augustine', 122243),
(21, 35, 'trishareilly2206@gmail.com', NULL, 'Trisha Reilly', 122514),
(22, 36, 'demo.ga100@gmail.com', NULL, 'Roma D''souza', 112354),
(23, 37, 'solankirishi4@gmail.com', 'https://lh3.googleusercontent.com/-hKKRJ2kOH4Y/AAAAAAAAAAI/AAAAAAAAAE0/j_Bg9PK4uEU/photo.jpg?sz=50', 'Rishi Solanki', 122273),
(24, 38, 'marjorieaugustine05@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 'Marjorie Augustine', 122243),
(25, 39, 'chintanmistry.00@gmail.com', 'https://lh6.googleusercontent.com/-75waHl1TNtc/AAAAAAAAAAI/AAAAAAAAAEY/YSXRQ1GWmTE/photo.jpg?sz=50', 'Chintan Mistry', 122075),
(26, 43, 'aartip981@gmail.com', 'https://lh4.googleusercontent.com/-KGsFefvO438/AAAAAAAAAAI/AAAAAAAAABE/vPckCMwvDSs/photo.jpg?sz=50', 'Aarti Parmar', 122261),
(27, 44, 'roven0756@gmail.com', 'https://lh6.googleusercontent.com/-F_BFRYmT9mk/AAAAAAAAAAI/AAAAAAAAABE/8yPLOugJVo0/photo.jpg?sz=50', 'Roven Naz', 122236),
(28, 45, 'salomo0756@gmail.com', 'https://lh5.googleusercontent.com/-gc-6Y1AxxHk/AAAAAAAAAAI/AAAAAAAAAAg/SxFobqRTfLs/photo.jpg?sz=50', 'Saloma Dsa', 132254),
(29, 46, 'brad6423@gmail.com', 'https://lh6.googleusercontent.com/-RxMsCJGBvVE/AAAAAAAAAAI/AAAAAAAAAAg/Sw2_mvT0ihM/photo.jpg?sz=50', 'Bradley Cooper', 11254),
(30, 47, 'bp0756@gmail.com', 'https://lh4.googleusercontent.com/-MZT7j21X2z4/AAAAAAAAAAI/AAAAAAAAAAg/a29v_RBQQ4I/photo.jpg?sz=50', 'Brian Pinto', 122265),
(31, 48, 'kb057621@gmail.com', 'https://lh6.googleusercontent.com/-LL2qQ7uu3tI/AAAAAAAAAAI/AAAAAAAAAAg/aounWOIvGbk/photo.jpg?sz=50', 'Kartik Buterchariya', 122241),
(32, 52, 'ranjithjames1994@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 'Ranjith James', 122047),
(33, 53, 'clyde.mendonca01@gmail.com', 'https://lh6.googleusercontent.com/-f4003B-EuvY/AAAAAAAAAAI/AAAAAAAAAPg/D6PrWQ2rV3Y/photo.jpg?sz=50', 'Clyde Mendonca', 122073);

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher`
--

CREATE TABLE IF NOT EXISTS `user_teacher` (
  `ut_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ut_u_id` int(10) unsigned NOT NULL,
  `ut_insti_id` int(10) unsigned NOT NULL,
  `ut_email` varchar(200) NOT NULL,
  `ut_imageurl` varchar(255) DEFAULT NULL,
  `ut_displayname` varchar(120) NOT NULL,
  `ut_description` text NOT NULL,
  PRIMARY KEY (`ut_id`),
  KEY `email` (`ut_email`),
  KEY `ut_u_id` (`ut_u_id`),
  KEY `u_insti_id` (`ut_insti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_teacher`
--

INSERT INTO `user_teacher` (`ut_id`, `ut_u_id`, `ut_insti_id`, `ut_email`, `ut_imageurl`, `ut_displayname`, `ut_description`) VALUES
(7, 30, 1, 'ryanaugustine12@gmail.com', NULL, 'Ryan Augustine', 'g\r\n'),
(10, 32, 1, 'sleeping.napster@gmail.com', NULL, 'Sleeping Napster88', '88'),
(11, 40, 1, 'reenagill46@gmail.com', 'https://lh3.googleusercontent.com/-weHirXCl5kY/AAAAAAAAAAI/AAAAAAAAABk/35q5LaRXLsY/photo.jpg?sz=50', 'Reena Gill', 'te cmpn b : pm'),
(12, 41, 1, 'vikramshete4@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 'Vikram Shete', 'hjf'),
(13, 42, 1, 'davidgasner46@gmail.com', 'https://lh3.googleusercontent.com/-lqBVNJke7jw/AAAAAAAAAAI/AAAAAAAAAAs/ayvaGdmvuVU/photo.jpg?sz=50', 'David Gasner', 'Te cmpn b ddb\r\nte cmpn a ddb\r\nSe cmpn a db');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_sub_id` int(10) unsigned NOT NULL,
  `video_link` text NOT NULL,
  `video_name` text NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `questionpaper_sub_id` (`video_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activeassign`
--
ALTER TABLE `activeassign`
  ADD CONSTRAINT `activeassign_ibfk_1` FOREIGN KEY (`a_sub_id`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `activeassignforbatch`
--
ALTER TABLE `activeassignforbatch`
  ADD CONSTRAINT `activeassignforbatch_ibfk_1` FOREIGN KEY (`assignforbatch_class_id`) REFERENCES `activeclass` (`class_id`),
  ADD CONSTRAINT `activeassignforbatch_ibfk_2` FOREIGN KEY (`assignforbatch_batch_id`) REFERENCES `activebatch` (`batch_id`),
  ADD CONSTRAINT `activeassignforbatch_ibfk_3` FOREIGN KEY (`assignforbatch_assign_id`) REFERENCES `activeassign` (`assign_id`);

--
-- Constraints for table `activebatch`
--
ALTER TABLE `activebatch`
  ADD CONSTRAINT `activebatch_ibfk_1` FOREIGN KEY (`batch_class_id`) REFERENCES `activeclass` (`class_id`);

--
-- Constraints for table `activeclass`
--
ALTER TABLE `activeclass`
  ADD CONSTRAINT `activeclass_ibfk_1` FOREIGN KEY (`class_insti_id`) REFERENCES `institute` (`insti_id`),
  ADD CONSTRAINT `activeclass_ibfk_2` FOREIGN KEY (`class_timestate`) REFERENCES `timestate` (`timestate_id`);

--
-- Constraints for table `activelectureppts`
--
ALTER TABLE `activelectureppts`
  ADD CONSTRAINT `activelectureppts_ibfk_1` FOREIGN KEY (`lec_subid`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `activenews`
--
ALTER TABLE `activenews`
  ADD CONSTRAINT `activenews_ibfk_1` FOREIGN KEY (`news_class_id`) REFERENCES `activeclass` (`class_id`),
  ADD CONSTRAINT `activenews_ibfk_2` FOREIGN KEY (`news_instiute_id`) REFERENCES `institute` (`insti_id`),
  ADD CONSTRAINT `activenews_ibfk_3` FOREIGN KEY (`news_batch_id`) REFERENCES `activebatch` (`batch_id`);

--
-- Constraints for table `activestudentbatch`
--
ALTER TABLE `activestudentbatch`
  ADD CONSTRAINT `activestudentbatch_ibfk_1` FOREIGN KEY (`studentbatch_batch`) REFERENCES `activebatch` (`batch_id`),
  ADD CONSTRAINT `activestudentbatch_ibfk_2` FOREIGN KEY (`studentbatch_student`) REFERENCES `user_student` (`us_id`);

--
-- Constraints for table `activesubforbatch`
--
ALTER TABLE `activesubforbatch`
  ADD CONSTRAINT `activesubforbatch_ibfk_1` FOREIGN KEY (`subforbatch_batch_id`) REFERENCES `activebatch` (`batch_id`),
  ADD CONSTRAINT `activesubforbatch_ibfk_2` FOREIGN KEY (`subforbatch_sub_id`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `activeteacherforsubforbatch`
--
ALTER TABLE `activeteacherforsubforbatch`
  ADD CONSTRAINT `activeteacherforsubforbatch_ibfk_2` FOREIGN KEY (`teacherforsubforbatch_teacher_id`) REFERENCES `user_teacher` (`ut_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `activeteacherforsubforbatch_ibfk_3` FOREIGN KEY (`teacherforsubforbatch_subforbatch`) REFERENCES `activesubforbatch` (`subforbatch_id`);

--
-- Constraints for table `activeTT`
--
ALTER TABLE `activeTT`
  ADD CONSTRAINT `activeTT_ibfk_1` FOREIGN KEY (`TT_classid`) REFERENCES `activeclass` (`class_id`);

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`a_sub_id`) REFERENCES `sub` (`sub_id`) ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`class_insti_id`) REFERENCES `institute` (`insti_id`) ON UPDATE CASCADE;

--
-- Constraints for table `classnews`
--
ALTER TABLE `classnews`
  ADD CONSTRAINT `classnews_ibfk_1` FOREIGN KEY (`cn_class_id`) REFERENCES `class` (`class_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD CONSTRAINT `ebooks_ibfk_1` FOREIGN KEY (`eb_sub_id`) REFERENCES `sub` (`sub_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lectureppts`
--
ALTER TABLE `lectureppts`
  ADD CONSTRAINT `lectureppts_ibfk_1` FOREIGN KEY (`lec_subid`) REFERENCES `sub` (`sub_id`) ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`news_insti_id`) REFERENCES `institute` (`insti_id`) ON UPDATE CASCADE;

--
-- Constraints for table `oldassign`
--
ALTER TABLE `oldassign`
  ADD CONSTRAINT `oldassign_ibfk_1` FOREIGN KEY (`a_sub_id`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `oldassignforbatch`
--
ALTER TABLE `oldassignforbatch`
  ADD CONSTRAINT `oldassignforbatch_ibfk_1` FOREIGN KEY (`assignforbatch_class_id`) REFERENCES `oldclass` (`class_id`),
  ADD CONSTRAINT `oldassignforbatch_ibfk_2` FOREIGN KEY (`assignforbatch_batch_id`) REFERENCES `oldbatch` (`batch_id`);

--
-- Constraints for table `oldbatch`
--
ALTER TABLE `oldbatch`
  ADD CONSTRAINT `oldbatch_ibfk_1` FOREIGN KEY (`batch_class_id`) REFERENCES `oldclass` (`class_id`);

--
-- Constraints for table `oldlectureppts`
--
ALTER TABLE `oldlectureppts`
  ADD CONSTRAINT `oldlectureppts_ibfk_1` FOREIGN KEY (`lec_subid`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `oldnews`
--
ALTER TABLE `oldnews`
  ADD CONSTRAINT `oldnews_ibfk_1` FOREIGN KEY (`news_instiute_id`) REFERENCES `institute` (`insti_id`),
  ADD CONSTRAINT `oldnews_ibfk_2` FOREIGN KEY (`news_class_id`) REFERENCES `oldclass` (`class_id`),
  ADD CONSTRAINT `oldnews_ibfk_3` FOREIGN KEY (`news_batch_id`) REFERENCES `oldbatch` (`batch_id`);

--
-- Constraints for table `oldsubforbatch`
--
ALTER TABLE `oldsubforbatch`
  ADD CONSTRAINT `oldsubforbatch_ibfk_1` FOREIGN KEY (`subforbatch_batch_id`) REFERENCES `oldbatch` (`batch_id`),
  ADD CONSTRAINT `oldsubforbatch_ibfk_2` FOREIGN KEY (`subforbatch_sub_id`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `oldteacherforsubforbatch`
--
ALTER TABLE `oldteacherforsubforbatch`
  ADD CONSTRAINT `oldteacherforsubforbatch_ibfk_1` FOREIGN KEY (`teacherforsubforbatch_subforbatch`) REFERENCES `oldsubforbatch` (`subforbatch_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `oldteacherforsubforbatch_ibfk_2` FOREIGN KEY (`teacherforsubforbatch_teacher_id`) REFERENCES `user_teacher` (`ut_id`) ON UPDATE CASCADE;

--
-- Constraints for table `oldTT`
--
ALTER TABLE `oldTT`
  ADD CONSTRAINT `oldTT_ibfk_1` FOREIGN KEY (`TT_classid`) REFERENCES `oldclass` (`class_id`);

--
-- Constraints for table `otherfiles`
--
ALTER TABLE `otherfiles`
  ADD CONSTRAINT `otherfiles_ibfk_1` FOREIGN KEY (`otherfiles_sub_id`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `questionpaper`
--
ALTER TABLE `questionpaper`
  ADD CONSTRAINT `questionpaper_ibfk_1` FOREIGN KEY (`questionpaper_sub_id`) REFERENCES `sub` (`sub_id`);

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `quiz_answers_ibfk_1` FOREIGN KEY (`quizzes_options_fk`) REFERENCES `quiz_options` (`option_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_answers_ibfk_2` FOREIGN KEY (`answer_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD CONSTRAINT `quiz_options_ibfk_1` FOREIGN KEY (`test_id_fk`) REFERENCES `quiz_test_questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_test_questions`
--
ALTER TABLE `quiz_test_questions`
  ADD CONSTRAINT `quiz_test_questions_ibfk_1` FOREIGN KEY (`test_id_fk`) REFERENCES `quiz_tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subteacher`
--
ALTER TABLE `subteacher`
  ADD CONSTRAINT `subteacher_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `sub` (`sub_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `subteacher_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `user_teacher` (`ut_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_student`
--
ALTER TABLE `user_student`
  ADD CONSTRAINT `user_student_ibfk_1` FOREIGN KEY (`us_u_id`) REFERENCES `user` (`u_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_teacher`
--
ALTER TABLE `user_teacher`
  ADD CONSTRAINT `user_teacher_ibfk_1` FOREIGN KEY (`ut_u_id`) REFERENCES `user` (`u_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_teacher_ibfk_2` FOREIGN KEY (`ut_insti_id`) REFERENCES `institute` (`insti_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
