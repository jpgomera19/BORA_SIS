-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2022 at 06:20 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BORA_SIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement_tbl`
--

CREATE TABLE `announcement_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_uploaded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement_tbl`
--

INSERT INTO `announcement_tbl` (`id`, `title`, `message`, `date_uploaded`) VALUES
(2, 'Test', 'This is the test announcements', '2022-06-06 04:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `assign_tbl`
--

CREATE TABLE `assign_tbl` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_tbl`
--

INSERT INTO `assign_tbl` (`id`, `student_id`, `subject_id`, `section_id`, `faculty_id`, `date_added`) VALUES
(1, 1, 1, 1, 1, '2022-06-10 03:18:07'),
(2, 1, 2, 1, 1, '2022-06-10 03:18:07'),
(3, 1, 3, 1, 1, '2022-06-10 03:18:07'),
(4, 1, 4, 1, 1, '2022-06-10 03:18:07'),
(5, 1, 5, 1, 1, '2022-06-10 03:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `attempt_tbl`
--

CREATE TABLE `attempt_tbl` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `time_count` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(0, 'jpgomera19@gmail.com', '79272', 1654779591);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tbl`
--

CREATE TABLE `faculty_tbl` (
  `f_id` int(255) UNSIGNED NOT NULL,
  `faculty_number` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `course` varchar(20) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_tbl`
--

INSERT INTO `faculty_tbl` (`f_id`, `faculty_number`, `password`, `firstname`, `middlename`, `lastname`, `course`, `sec_id`, `subject_id`, `age`, `gender`, `email`, `contact`, `date_joined`, `date_updated`) VALUES
(1, 12345678, '9292761895cc7d561fee82257631efe5', 'test', 'Test', 'Test', 'BSIT', 1, 3, 40, 'male', 'mema@gmail.com', '09101465183', '2022-06-10 11:17:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fattempt_tbl`
--

CREATE TABLE `fattempt_tbl` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `time_count` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grades_tbl`
--

CREATE TABLE `grades_tbl` (
  `g_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `prelim` int(20) NOT NULL,
  `midterm` int(20) NOT NULL,
  `finals` int(20) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `f_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades_tbl`
--

INSERT INTO `grades_tbl` (`g_id`, `subject_id`, `s_id`, `prelim`, `midterm`, `finals`, `mark`, `f_id`, `date_added`) VALUES
(18, 1, 1, 92, 93, 94, 'PASSED', 1, '2022-06-10 11:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `balance` float NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`p_id`, `s_id`, `balance`, `date_added`) VALUES
(1, 1, 5000, '2022-06-10 11:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `sec_id` int(20) UNSIGNED NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `room_number` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`sec_id`, `section_name`, `room_number`, `date_added`) VALUES
(1, 'BSIT 101', 'ROOM 1', '2022-05-26 08:01:35'),
(2, 'BSIT 102', 'ROOM 2', '2022-05-26 08:01:35'),
(3, 'BSIT 103', 'ROOM 3', '2022-05-26 08:01:35'),
(4, 'BSIT 104', 'ROOM 4', '2022-05-26 08:01:35'),
(5, 'BSIT 105', 'ROOM 5', '2022-05-26 08:01:35'),
(6, 'BSIT 201', 'ROOM 6', '2022-05-26 08:01:35'),
(7, 'BSIT 202', 'ROOM 7', '2022-05-26 08:01:35'),
(8, 'BSIT 203', 'ROOM 8', '2022-05-26 08:01:35'),
(9, 'BSIT 204', 'ROOM 9', '2022-05-26 08:01:35'),
(10, 'BSIT 205', 'ROOM 10', '2022-05-26 08:01:35'),
(11, 'BSIT 301', 'ROOM 11', '2022-05-26 08:01:35'),
(12, 'BSIT 302', 'ROOM 12', '2022-05-26 08:01:35'),
(13, 'BSIT 303', 'ROOM 13', '2022-05-26 08:01:35'),
(14, 'BSIT 304', 'ROOM 14', '2022-05-26 08:01:35'),
(15, 'BSIT 305', 'ROOM 15', '2022-05-26 08:01:35'),
(16, 'BSIT 401', 'ROOM 16', '2022-05-26 08:01:35'),
(17, 'BSIT 402', 'ROOM 17', '2022-05-26 08:01:35'),
(18, 'BSIT 403', 'ROOM 18', '2022-05-26 08:01:35'),
(19, 'BSIT 404', 'ROOM 19', '2022-05-26 08:01:35'),
(20, 'BSIT 405', 'ROOM 20', '2022-05-26 08:01:35'),
(21, 'BSCRIM 101', 'ROOM 21', '2022-05-26 08:10:33'),
(22, 'BSCRIM 102', 'ROOM 22', '2022-05-26 08:10:33'),
(23, 'BSCRIM 103', 'ROOM 23', '2022-05-26 08:10:33'),
(24, 'BSCRIM 104', 'ROOM 24', '2022-05-26 08:10:33'),
(25, 'BSCRIM 105', 'ROOM 25', '2022-05-26 08:10:33'),
(26, 'BSCRIM 201', 'ROOM 26', '2022-05-26 08:10:33'),
(27, 'BSCRIM 202', 'ROOM 27', '2022-05-26 08:10:33'),
(28, 'BSCRIM 203', 'ROOM 28', '2022-05-26 08:10:33'),
(29, 'BSCRIM 204', 'ROOM 29', '2022-05-26 08:10:33'),
(30, 'BSCRIM 205', 'ROOM 30', '2022-05-26 08:10:33'),
(31, 'BSCRIM 301', 'ROOM 31', '2022-05-26 08:10:33'),
(32, 'BSCRIM 302', 'ROOM 32', '2022-05-26 08:10:33'),
(33, 'BSCRIM 303', 'ROOM 33', '2022-05-26 08:10:33'),
(34, 'BSCRIM 304', 'ROOM 34', '2022-05-26 08:10:33'),
(35, 'BSCRIM 305', 'ROOM 35', '2022-05-26 08:10:33'),
(36, 'BSCRIM 401', 'ROOM 36', '2022-05-26 08:10:33'),
(37, 'BSCRIM 402', 'ROOM 37', '2022-05-26 08:10:33'),
(38, 'BSCRIM 403', 'ROOM 38', '2022-05-26 08:10:33'),
(39, 'BSCRIM 404', 'ROOM 39', '2022-05-26 08:12:21'),
(40, 'BSCRIM 405', 'ROOM 40', '2022-05-26 08:12:21'),
(41, 'BSEDUC 101', 'ROOM 41', '2022-05-26 08:21:30'),
(42, 'BSEDUC 102', 'ROOM 42', '2022-05-26 08:21:30'),
(43, 'BSEDUC 103', 'ROOM 43', '2022-05-26 08:21:30'),
(44, 'BSEDUC 104', 'ROOM 44', '2022-05-26 08:21:30'),
(45, 'BSEDUC 105', 'ROOM 45', '2022-05-26 08:21:30'),
(46, 'BSEDUC 201', 'ROOM 46', '2022-05-26 08:21:30'),
(47, 'BSEDUC 202', 'ROOM 47', '2022-05-26 08:21:30'),
(48, 'BSEDUC 203', 'ROOM 48', '2022-05-26 08:21:30'),
(49, 'BSEDUC 204', 'ROOM 49', '2022-05-26 08:21:30'),
(50, 'BSEDUC 205', 'ROOM 50', '2022-05-26 08:21:30'),
(51, 'ROOM 301', 'ROOM 51', '2022-05-26 08:21:30'),
(52, 'BSEDUC 302', 'ROOM 52', '2022-05-26 08:21:30'),
(53, 'BSEDUC 303', 'ROOM 53', '2022-05-26 08:21:30'),
(54, 'BSEDUC 304', 'ROOM 54', '2022-05-26 08:21:30'),
(55, 'BSEDUC 305', 'ROOM 55', '2022-05-26 08:21:30'),
(56, 'BSEDUC 401', 'ROOM 56', '2022-05-26 08:21:30'),
(57, 'ROOM 402', 'ROOM 57', '2022-05-26 08:21:30'),
(58, 'BSEDUC 403', 'ROOM 58', '2022-05-26 08:21:30'),
(59, 'BSEDUC 404', 'ROOM 59', '2022-05-26 08:21:30'),
(60, 'BSEDUC 405', 'ROOM 60', '2022-05-26 08:21:30'),
(61, 'BSBA 101', 'ROOM 61', '2022-05-26 08:29:44'),
(62, 'BSBA 102', 'ROOM 62', '2022-05-26 08:29:44'),
(63, 'BSBA 103', 'ROOM 63', '2022-05-26 08:29:44'),
(64, 'BSBA 104', 'ROOM 64', '2022-05-26 08:29:44'),
(65, 'BSBA 105', 'ROOM 65', '2022-05-26 08:29:44'),
(66, 'BSBA 201', 'ROOM 66', '2022-05-26 08:29:44'),
(67, 'BSBA 202', 'ROOM 67', '2022-05-26 08:29:44'),
(68, 'BSBA 203', 'ROOM 68', '2022-05-26 08:29:44'),
(70, 'BSBA 205', 'ROOM 70', '2022-05-26 08:38:03'),
(69, 'BSBA 204', 'ROOM 69', '2022-05-26 08:38:03'),
(71, 'BSBA', 'ROOM 71', '2022-05-26 08:43:05'),
(72, 'BSBA 302', 'ROOM 72', '2022-05-26 08:43:05'),
(73, 'BSBA 303', 'ROOM 73', '2022-05-26 08:43:05'),
(74, 'BSBA 304', 'ROOM 74', '2022-05-26 08:43:05'),
(75, 'BSBA 305', 'ROOM 75', '2022-05-26 08:43:05'),
(76, 'BSBA 401', 'ROOM 76', '2022-05-26 08:43:05'),
(77, 'BSBA 402', 'ROOM 77', '2022-05-26 08:43:05'),
(78, 'BSBA 403', 'ROOM 78', '2022-05-26 08:43:05'),
(79, '404', 'ROOM 79', '2022-05-26 08:43:05'),
(80, 'BSBA', 'ROOM 80', '2022-05-26 08:43:05'),
(81, 'BSAIS 101', 'ROOM 81', '2022-05-26 08:52:34'),
(82, 'BSAIS 102', 'ROOM 82', '2022-05-26 08:52:34'),
(83, 'BSAIS 103', 'ROOM 83', '2022-05-26 08:52:34'),
(84, 'BSAIS 104', 'ROOM 84', '2022-05-26 08:52:34'),
(85, 'BSAIS 105', 'ROOM 85', '2022-05-26 08:52:34'),
(86, 'BSAIS 201', 'ROOM 86', '2022-05-26 08:52:34'),
(87, 'BSAIS 202', 'ROOM 87', '2022-05-26 08:52:34'),
(88, 'BSAIS 203', 'ROOM 88', '2022-05-26 08:52:34'),
(89, 'BSAIS 204', 'ROOM 89', '2022-05-26 08:52:34'),
(90, 'BSAIS 205', 'ROOM 90', '2022-05-26 08:52:34'),
(91, 'BSAIS 301', 'ROOM 91', '2022-05-26 08:52:34'),
(92, 'BSAIS 302', 'ROOM 92', '2022-05-26 08:52:34'),
(93, 'BSAIS 303', 'ROOM 93', '2022-05-26 08:52:34'),
(94, 'BSAIS 304', 'ROOM 94', '2022-05-26 08:52:34'),
(95, 'BSAIS 305', 'ROOM 95', '2022-05-26 08:52:34'),
(96, 'BSAIS 401', 'ROOM 96', '2022-05-26 08:52:34'),
(97, 'BSAIS 402', 'ROOM 97', '2022-05-26 08:52:34'),
(98, 'BSAIS 403', 'ROOM 98', '2022-05-26 08:52:34'),
(99, 'BSAIS 404', 'ROOM 99', '2022-05-26 08:52:34'),
(100, 'BSAIS 405', 'ROOM 100', '2022-05-26 08:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `id` int(100) UNSIGNED NOT NULL,
  `student_number` int(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `course` varchar(20) NOT NULL,
  `yearlevel` varchar(100) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`id`, `student_number`, `password`, `firstname`, `middlename`, `lastname`, `course`, `yearlevel`, `sec_id`, `subject_id`, `gender`, `age`, `birthday`, `email`, `contact_number`, `status`, `type`, `date`) VALUES
(1, 19012464, '9292761895cc7d561fee82257631efe5', 'Jamesphilip ', 'Amante', 'Gomera', 'BSIT', '3rd Year', 0, 0, 'male', 20, '2001-01-01', 'testulit@gmail.com', '09101465183', 'Active', 'Regular', '2022-06-10 03:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `subject_id` int(20) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `credit` int(20) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`subject_id`, `subject_code`, `subject_name`, `credit`, `date_added`) VALUES
(1, 'COMPROG1', 'COMPUTER PROGRAMMING 1', 3, '2022-05-26 11:19:52'),
(2, 'CCS1101', 'NETWORKING 1', 3, '2022-05-26 16:09:00'),
(3, 'DISC1', 'DISCRETE MATHEMATICS', 3, '2022-05-26 16:25:29'),
(4, 'CCS1102', 'DATA STRUCTURE', 3, '2022-05-26 16:25:29'),
(5, 'CCS2', 'INTRODUCTION TO COMPUTING', 3, '2022-05-26 16:26:58'),
(6, 'IAS2', 'INFORMATION ASURANCE AND SECURITY 2', 3, '2022-05-26 16:44:02'),
(7, 'QM1', 'QUANTITATIVE METHOD', 3, '2022-05-26 16:44:02'),
(8, 'CCS3', 'FUNDAMENTALS OF DATABASE', 3, '2022-05-26 16:44:02'),
(9, 'ITE2', 'IT ELECTIVE 2', 3, '2022-05-26 16:44:02'),
(10, 'CCS2209', 'NETWORKING 2', 3, '2022-05-26 16:44:02'),
(11, 'GE7', 'SCIENCE, TECHNOLOGY AND SOCIAL', 3, '2022-05-26 16:44:02'),
(12, 'PE3', 'PHYSICAL EDUCATION', 3, '2022-05-26 16:44:02'),
(13, 'GE8', 'PROFESSIONAL ETHICS', 3, '2022-05-26 16:44:02'),
(14, 'GE9', 'RIZAL LIFE AND WORKS', 3, '2022-05-26 16:44:02'),
(15, 'CCS3119', 'SYSTEM ADMINISTRATION', 3, '2022-05-26 16:44:02'),
(16, 'WEBDEV1', 'WEB DEVELOPMENT', 3, '2022-05-26 16:44:02'),
(17, 'CCS4101', 'CAPSTONE RESEARCH', 3, '2022-05-26 16:44:02'),
(18, 'BPM101', 'BUSINESS PROCESS MANAGEMENT', 3, '2022-05-26 16:44:02'),
(19, 'CC106', 'APPLICATION DEVELOPMENT AND EMERGING TECHNOLOGIES', 3, '2022-05-26 16:44:02'),
(20, 'ITE4', 'IT ELECTIVE(IT RESEARCH) ', 3, '2022-05-26 16:44:02'),
(21, 'SOC SCI 104', 'POLITICS & GOVERNANCE WITH PHILIPPINE CONSTITUTION', 3, '2022-05-26 17:20:15'),
(22, 'SOC SCI 105', 'GENERAL PSYCHOLOGY', 3, '2022-05-26 17:20:15'),
(23, 'PE 1', 'FUNDAMENTALS OF MARTIAL ARTS', 3, '2022-05-26 17:20:15'),
(24, 'NSTP 1(ROTC)', 'MILITARY SERVICE', 3, '2022-05-26 17:20:15'),
(25, 'CRIMINOLOGY 1', 'INTRODUCTION TO CRIMINOLOGY AND PSYCHOLOGY OF CRIMES', 3, '2022-05-26 17:20:15'),
(26, 'CLI 1', 'CRIMINAL LAW (BOOK)', 3, '2022-05-26 17:20:15'),
(27, 'PE 2', 'DISAMRMING TECHNIQUES', 3, '2022-05-26 17:20:15'),
(28, 'CRIMINOLOGY 2', 'PHILIPPINE CRIMINAL JUSTICE SYSTEM', 3, '2022-05-26 17:20:15'),
(29, 'CRIMINOLOGY 3', 'ETHICS AND VALUE', 3, '2022-05-26 17:20:15'),
(30, 'LEA 1', 'POLICE ORGANIZATION AND ADMINISTRATION WITH POLICE PLANNING', 3, '2022-05-26 17:20:15'),
(31, 'CLI 2', 'CRIMINAL LAW(BOOK 2)', 3, '2022-05-26 17:20:15'),
(32, 'CRIMINALISTICS 2', 'POLICE PHOTOGRAPHY', 3, '2022-05-26 17:20:15'),
(33, 'CHEM 102', 'FORENSIC CHEM AND TOXICOLOGY', 3, '2022-05-26 17:20:15'),
(34, 'PE 3', 'FIRST AID AND WATER SURVIVAL', 3, '2022-05-26 17:20:15'),
(35, 'CD 1', 'FUNDAMENTALS OF CRIMINAL INVESTIGATION ', 3, '2022-05-26 17:20:15'),
(36, 'CRIMINALISTICS 3', 'LEGAL MEDICINE', 3, '2022-05-26 17:20:15'),
(37, 'CD 2', 'DRUG EDUCATION AND VICE CONTROL', 3, '2022-05-26 17:20:15'),
(38, 'CD 3', 'FIRE TECHNOLOGY AND ARSENAL INVESTIGATION', 3, '2022-05-26 17:20:15'),
(39, 'LEA 2', 'POLICE PERSONNEL AND RECORDS MANAGEMENT', 3, '2022-05-26 17:20:15'),
(40, 'CRIMINOLOGY 4', 'CRIMINOLOGICAL RESEARCH AND STATISTICS', 3, '2022-05-26 17:20:15'),
(41, 'GEC 101', 'UNDERSTANDING THE SELF', 3, '2022-05-26 17:50:22'),
(42, 'GEC 102', 'READING IN PHILIPPINE HISTORY ', 3, '2022-05-26 17:50:22'),
(43, 'CPE 101', 'THE TEACHING PROFESSION', 3, '2022-05-26 17:50:22'),
(44, 'NSTP 1', 'NATIONAL SERVICE TRAINING PROGRAM 1', 3, '2022-05-26 17:50:22'),
(45, 'ELE 121', 'INTRODUCTION TO LINGUISTICS', 3, '2022-05-26 17:50:22'),
(46, 'GEC 103', 'ETHICS', 3, '2022-05-26 17:50:22'),
(47, 'GEC 104', 'LIFE AND WORKS OF RIZAL', 3, '2022-05-26 17:50:22'),
(48, 'CPE 102', 'THE TEACHER AND THE COMMUNITY, SCHOOL CULTURE AND ORGANIZATIONAL LEADERSHIP', 3, '2022-05-26 17:50:22'),
(49, 'CPE 103', 'FOUNDATION OF SPECIAL AND INCLUSIVE EDUCATION', 3, '2022-05-26 17:50:22'),
(50, 'NSTP 2', 'NATIONAL SERVICE TRAINING PROGRAM 2', 3, '2022-05-26 17:50:22'),
(51, 'CPE 104', 'FACILITATING LEARNER-CENTERED TEACHING', 3, '2022-05-26 17:50:22'),
(52, 'CPE 105', 'ASSESSMENT OF LEARNING 1', 3, '2022-05-26 17:50:22'),
(53, 'ELE 122', 'LANGUAGE, CULTURE, AND SOCIETY ', 3, '2022-05-26 17:50:22'),
(54, 'ELE 123', 'STRUCTURES OF ENGLISH', 3, '2022-05-26 17:50:22'),
(55, 'ELE 124', 'PRINCIPLES AND THEORIES OF LANGUAGE ACQUISITION AND LEARNING', 3, '2022-05-26 17:50:22'),
(56, 'ELC 101', 'FIELD STUDY 1: OBSERVATIONS OF TEACHING-LEARNING IN ACTUAL SCHOOL ENVIRONMENT', 3, '2022-05-26 17:50:22'),
(57, 'ELC 102', 'FIELD STUDY 2: PARTICIPATING AND TEACHING ASSISTANTSHIP', 3, '2022-05-26 17:50:22'),
(58, 'ELE 197', 'TEACHING INTERNSHIP', 3, '2022-05-26 17:50:22'),
(59, 'ELE 199', 'UNDERGRADUATE THESIS', 3, '2022-05-26 17:50:22'),
(60, 'ELE 138', 'LITERARY CRITICISM ', 3, '2022-05-26 17:50:22'),
(61, 'GEC 1101', 'UNDERSTANDING THE SELF', 3, '2022-05-26 18:09:51'),
(62, 'GEC 11O2', 'PURPOSIVE COMMUNICATION ', 3, '2022-05-26 18:09:51'),
(63, 'ECN 101', 'BASIC MICROECONOMICS', 3, '2022-05-26 18:09:51'),
(64, 'MKT 101', 'MARKETING MANAGEMENT', 3, '2022-05-26 18:09:51'),
(65, 'PED 001', 'EXERCISE PRESCRIPTION AND MANAGEMENT', 3, '2022-05-26 18:09:51'),
(66, 'GEC 1109', 'LIFE AND WORKS OF RIZAL', 3, '2022-05-26 18:09:51'),
(67, 'MKT 102', 'PRODUCT MANAGEMENT', 3, '2022-05-26 18:09:51'),
(68, 'MKT 103', 'PRICING STRATEGY', 3, '2022-05-26 18:09:51'),
(69, 'FPE 101', 'FUNDAMENTALS OF PEACE EDUCATION', 3, '2022-05-26 18:09:51'),
(70, 'NTS 001', 'NATIONAL SERVICE TRAINING PROGRAM 1', 3, '2022-05-26 18:09:51'),
(71, 'GEC 1107', 'ETHICS', 3, '2022-05-26 18:09:51'),
(72, 'ACT 102', 'MANAGERIAL ACCOUNTING', 3, '2022-05-26 18:09:51'),
(73, 'MGT 103', 'HUMAN RESOURCES MANAGEMENT', 3, '2022-05-26 18:09:51'),
(74, 'MKT 104', 'RETAIL MANAGEMENT ', 3, '2022-05-26 18:09:51'),
(75, 'MKT 105', 'SALESMANSHIP', 3, '2022-05-26 18:09:51'),
(76, 'MGT 108', 'STRATEGIC MANAGEMENT', 3, '2022-05-26 18:09:51'),
(77, 'MKT 106', 'ADVERTISING', 3, '2022-05-26 18:09:51'),
(78, 'MKT 107', 'DISTRIBUTION MANAGEMENT ', 3, '2022-05-26 18:09:51'),
(79, 'MKT 199', 'THESIS', 3, '2022-05-26 18:09:51'),
(80, 'MKT 134/144', 'CONTENT MARKETING / INFLUENCER MARKETING', 3, '2022-05-26 18:09:51'),
(81, 'GEC 11', 'UNDERSTANDING THE SELF', 3, '2022-05-26 18:30:58'),
(82, 'ACC 101', 'FINANCIAL ACCOUNTING AND REPORTING', 3, '2022-05-26 18:30:58'),
(83, 'ECON 101', 'MANAGERIAL ECONOMICS', 3, '2022-05-26 18:30:58'),
(84, 'GEEL 11', 'LIVING IN I.T ERA', 3, '2022-05-26 18:30:58'),
(85, 'NSTP 01', 'NATIONAL SERVICE TRAINING PROGRAM 1', 3, '2022-05-26 18:30:58'),
(86, 'MGT 1002', 'FINANCIAL MANAGEMENT', 3, '2022-05-26 18:30:58'),
(87, 'MGT 1003', 'FINANCIAL MARKETS', 3, '2022-05-26 18:30:58'),
(88, 'TAX 1', 'INCOME TAXATION', 3, '2022-05-26 18:30:58'),
(89, 'LAW 1', 'LAW ON OBLIGATIONS AND CONTRACTS', 3, '2022-05-26 18:30:58'),
(90, 'ACC 104', 'COST ACCOUNTING AND CONTROL', 3, '2022-05-26 18:30:58'),
(91, 'ACC 105', 'INTERMEDIATE ACCOUNTING 2', 3, '2022-05-26 18:30:58'),
(92, 'MGT 1104', 'INTERNATIONAL BUSINESS AND TRADE', 3, '2022-05-26 18:30:58'),
(93, 'AIS 1', 'PROJECT MANAGEMENT ', 3, '2022-05-26 18:30:58'),
(94, 'AIS 2', 'INFORMATION SYSTEMS ANALYSIS AND DESIGN', 3, '2022-05-26 18:30:58'),
(95, 'AIS 3', 'MANAGING INFORMATION ANS TECHNOLOGY', 3, '2022-05-26 18:30:58'),
(96, 'LAW 2', 'REGULATORY FRAMEWORK AND LEGAL ISSUES IN BUSINESS', 3, '2022-05-26 18:30:58'),
(97, 'PROF ELEC 1', 'UPDATES IN INFORMATION SYSTEMS 1', 3, '2022-05-26 18:30:58'),
(98, 'PROF ELEC 2', 'UPDATES IN INFORMATION SYSTEMS 2', 3, '2022-05-26 18:30:58'),
(99, 'AIS 7', 'DATA WAREHOUSING AND MANAGEMENT ', 3, '2022-05-26 18:30:58'),
(100, 'ACC 119', 'ACCOUNTING INFORMATION SYSTEM RESEARCH', 3, '2022-05-26 18:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `uattempt_tbl`
--

CREATE TABLE `uattempt_tbl` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `time_count` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads_tbl`
--

CREATE TABLE `uploads_tbl` (
  `id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `uploaded_file` varchar(300) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads_tbl`
--

INSERT INTO `uploads_tbl` (`id`, `f_id`, `uploaded_file`, `date_added`) VALUES
(12, 1, 'Diagram-STUDENT-INFORMATION-SYSTEM-G.pptx', '2022-06-10 11:25:05'),
(10, 11, 'BORA - SIS _ Certificate Of Enrollment.pdf', '2022-06-02 01:40:14'),
(11, 1, 'BORA - SIS _ Certificate Of Enrollment.pdf', '2022-06-06 05:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(100) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`u_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `image`, `date_added`, `date_updated`) VALUES
(9, 'admin', 'c06a9ee096584250d282527c3df1402b', 'Test', 'Test', 'Test', 'testulit123@gmail.com', 'Photo.jpg', '2022-05-30 14:53:08', '2022-06-06 04:22:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_tbl`
--
ALTER TABLE `assign_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attempt_tbl`
--
ALTER TABLE `attempt_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `sec_id` (`sec_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `fattempt_tbl`
--
ALTER TABLE `fattempt_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades_tbl`
--
ALTER TABLE `grades_tbl`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sec_id` (`sec_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `uattempt_tbl`
--
ALTER TABLE `uattempt_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads_tbl`
--
ALTER TABLE `uploads_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement_tbl`
--
ALTER TABLE `announcement_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_tbl`
--
ALTER TABLE `assign_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attempt_tbl`
--
ALTER TABLE `attempt_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `f_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fattempt_tbl`
--
ALTER TABLE `fattempt_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `grades_tbl`
--
ALTER TABLE `grades_tbl`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `sec_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `subject_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `uattempt_tbl`
--
ALTER TABLE `uattempt_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `uploads_tbl`
--
ALTER TABLE `uploads_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
