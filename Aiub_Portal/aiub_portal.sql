-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 09:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiub_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `capacity`, `count`, `start_time`, `end_time`, `status`, `section`, `day`) VALUES
(1, 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY', 30, 0, '16:17:00', '13:52:00', 'Open', 'A', 'Tuesday'),
(2, 'PHYSICS 1', 30, 0, '12:32:00', '14:01:00', 'Open', 'B', 'Monday'),
(3, 'PHYSICS 1 LAB', 30, 0, '15:02:00', '13:13:00', 'Open', 'C', 'Sunday'),
(4, 'ENGLISH READING SKILLS & PUBLIC SPEAKING', 30, 0, '11:34:00', '12:43:00', 'Open', 'D', 'Tuesday'),
(5, 'INTRODUCTION TO COMPUTER STUDIES', 30, 0, '09:50:00', '15:33:00', 'Open', 'E', 'Tuesday'),
(6, 'INTRODUCTION TO PROGRAMMING LAB', 30, 0, '13:28:00', '14:29:00', 'Open', 'F', 'Monday'),
(7, 'INTRODUCTION TO PROGRAMMING', 30, 0, '09:41:00', '16:28:00', 'Open', 'G', 'Wednesday'),
(8, 'DISCRETE MATHEMATICS', 30, 0, '14:09:00', '11:27:00', 'Open', 'H', 'Sunday'),
(9, 'INTEGRAL CALCULUS & ORDINARY DIFFERENTIAL EQUATIONS', 30, 0, '14:59:00', '15:58:00', 'Open', 'A', 'Tuesday'),
(10, 'OBJECT ORIENTED PROGRAMMING 1', 30, 0, '12:48:00', '15:44:00', 'Open', 'B', 'Sunday'),
(11, 'PHYSICS 2', 30, 0, '16:12:00', '16:14:00', 'Open', 'C', 'Sunday'),
(12, 'PHYSICS 2 LAB', 30, 0, '12:57:00', '11:40:00', 'Open', 'D', 'Sunday'),
(13, 'ENGLISH WRITING SKILLS & COMMUNICATIONS', 30, 0, '12:21:00', '16:13:00', 'Open', 'E', 'Monday'),
(14, 'INTRODUCTION TO ELECTRICAL CIRCUITS', 30, 0, '11:15:00', '08:34:00', 'Open', 'F', 'Monday'),
(15, 'INTRODUCTION TO ELECTRICAL CIRCUITS LAB', 30, 0, '13:30:00', '15:05:00', 'Open', 'G', 'Sunday'),
(16, 'CHEMISTRY', 30, 0, '14:48:00', '09:38:00', 'Open', 'H', 'Tuesday'),
(17, 'COMPLEX VARIABLE,LAPLACE & Z-TRANSFORMATION', 30, 0, '15:55:00', '15:49:00', 'Open', 'A', 'Tuesday'),
(18, 'INTRODUCTION TO DATABASE', 30, 0, '12:35:00', '08:25:00', 'Open', 'B', 'Sunday'),
(19, 'ELECTRONIC DEVICES LAB', 30, 0, '16:35:00', '08:33:00', 'Open', 'C', 'Monday'),
(20, 'PRINCIPLES OF ACCOUNTING', 30, 0, '08:12:00', '11:20:00', 'Open', 'D', 'Sunday'),
(21, 'DATA STRUCTURE', 30, 0, '09:00:00', '11:33:00', 'Open', 'A', 'Wednesday'),
(22, 'DATA STRUCTURE LAB', 30, 0, '09:00:00', '08:24:00', 'Open', 'B', 'Wednesday'),
(23, 'COMPUTER AIDED DESIGN & DRAFTING', 30, 0, '08:54:00', '11:18:00', 'Open', 'C', 'Monday'),
(24, 'ALGORITHMS', 30, 0, '15:57:00', '16:50:00', 'Open', 'D', 'Tuesday'),
(25, 'MATRICES, VECTORS, FOURIER ANALYSIS', 30, 0, '14:39:00', '12:30:00', 'Open', 'E', 'Wednesday'),
(26, 'OBJECT ORIENTED PROGRAMMING 2', 30, 0, '09:16:00', '08:13:00', 'Open', 'F', 'Wednesday'),
(27, 'OBJECT ORIENTED ANALYSIS AND DESIGN', 30, 0, '12:10:00', '10:34:00', 'Open', 'G', 'Monday'),
(28, 'BANGLADESH STUDIES', 30, 0, '08:34:00', '13:21:00', 'Open', 'H', 'Tuesday'),
(29, 'DIGITAL LOGIC AND CIRCUITS', 30, 0, '09:45:00', '15:36:00', 'Open', 'A', 'Sunday'),
(30, 'DIGITAL LOGIC AND CIRCUITS LAB', 30, 0, '11:43:00', '16:24:00', 'Open', 'B', 'Tuesday'),
(31, 'COMPUTATIONAL STATISTICS AND PROBABILITY', 30, 0, '16:54:00', '09:41:00', 'Open', 'C', 'Wednesday'),
(32, 'THEORY OF COMPUTATION', 30, 0, '16:08:00', '13:56:00', 'Open', 'D', 'Wednesday'),
(33, 'PRINCIPLES OF ECONOMICS', 30, 0, '15:30:00', '09:09:00', 'Open', 'E', 'Tuesday'),
(34, 'BUSINESS COMMUNICATION', 30, 0, '11:38:00', '11:34:00', 'Open', 'F', 'Tuesday'),
(35, 'NUMERICAL METHODS FOR SCIENCE AND ENGINEERING', 30, 0, '09:55:00', '11:28:00', 'Open', 'G', 'Monday'),
(36, 'DATA COMMUNICATION', 30, 0, '14:45:00', '08:59:00', 'Open', 'H', 'Monday'),
(37, 'MICROPROCESSOR AND EMBEDDED SYSTEMS', 30, 0, '11:10:00', '10:53:00', 'Open', 'A', 'Sunday'),
(38, 'SOFTWARE ENGINEERING', 30, 0, '16:03:00', '10:45:00', 'Open', 'B', 'Monday'),
(39, 'ARTIFICIAL INTELLIGENCE AND EXPERT SYSTEM', 30, 0, '10:55:00', '13:17:00', 'Open', 'C', 'Sunday'),
(40, 'COMPUTER NETWORKS', 30, 0, '15:48:00', '13:26:00', 'Open', 'D', 'Tuesday'),
(41, 'COMPUTER ORGANIZATION AND ARCHITECTURE', 30, 0, '14:01:00', '12:42:00', 'Open', 'E', 'Wednesday'),
(42, 'OPERATING SYSTEM', 30, 0, '10:06:00', '10:07:00', 'Open', 'F', 'Tuesday'),
(43, 'WEB TECHNOLOGIES', 30, 0, '15:38:00', '13:07:00', 'Open', 'G', 'Wednesday'),
(44, 'ENGINEERING ETHICS', 30, 0, '16:33:00', '13:43:00', 'Open', 'H', 'Sunday'),
(45, 'COMPILER DESIGN', 30, 0, '11:58:00', '12:45:00', 'Open', 'A', 'Tuesday'),
(46, 'COMPUTER GRAPHICS', 30, 0, '13:52:00', '08:46:00', 'Open', 'B', 'Tuesday'),
(47, 'ENGINEERING MANAGEMENT', 30, 0, '16:53:00', '16:11:00', 'Open', 'C', 'Tuesday'),
(48, 'RESEARCH METHODOLOGY', 30, 0, '16:36:00', '11:56:00', 'Open', 'D', 'Tuesday'),
(49, 'ADVANCE DATABASE MANAGEMENT SYSTEM', 30, 0, '11:40:00', '15:47:00', 'Open', 'E', 'Sunday'),
(50, 'MANAGEMENT INFORMATION SYSTEM', 30, 0, '11:45:00', '10:29:00', 'Open', 'F', 'Monday'),
(51, 'ENTERPRISE RESOURCE PLANNING', 30, 0, '15:46:00', '13:51:00', 'Open', 'G', 'Tuesday'),
(52, 'DATA WAREHOUSE AND DATA MINING', 30, 0, '15:39:00', '11:07:00', 'Open', 'H', 'Tuesday'),
(53, 'HUMAN COMPUTER INTERACTION', 30, 0, '13:15:00', '13:48:00', 'Open', 'A', 'Tuesday'),
(54, 'BUSINESS INTELLIGENCE AND DECISION SUPPORT SYSTEMS', 30, 0, '16:19:00', '14:45:00', 'Open', 'B', 'Tuesday'),
(55, 'INTRODUCTION TO DATA SCIENCE', 30, 0, '08:05:00', '15:03:00', 'Open', 'C', 'Tuesday'),
(56, 'CYBER LAWS & INFORMATION SECURITY', 30, 0, '11:33:00', '10:11:00', 'Open', 'D', 'Sunday'),
(57, 'DIGITAL MARKETING', 30, 0, '11:53:00', '09:34:00', 'Open', 'E', 'Wednesday'),
(58, 'E-COMMERCE, E-GOVERNANCE & E-SERIES', 30, 0, '13:53:00', '14:56:00', 'Open', 'F', 'Tuesday'),
(59, 'SOFTWARE DEVELOPMENT PROJECT MANAGEMENT', 30, 0, '13:53:00', '14:35:00', 'Open', 'G', 'Monday'),
(60, 'SOFTWARE REQUIREMENT ENGINEERING', 30, 0, '09:16:00', '11:43:00', 'Open', 'H', 'Sunday'),
(61, 'SOFTWARE QUALITY AND TESTING', 30, 0, '10:08:00', '08:18:00', 'Open', 'A', 'Monday'),
(62, 'PROGRAMMING IN PYTHON', 30, 0, '11:24:00', '10:27:00', 'Open', 'B', 'Monday'),
(63, 'VIRTUAL REALITY SYSTEMS DESIGN', 30, 0, '12:10:00', '08:32:00', 'Open', 'C', 'Sunday'),
(64, 'ADVANCED PROGRAMMING WITH JAVA', 30, 0, '15:54:00', '09:22:00', 'Open', 'D', 'Tuesday'),
(65, 'ADVANCED PROGRAMMING WITH .NET', 30, 0, '12:24:00', '08:05:00', 'Open', 'E', 'Monday'),
(66, 'ADVANCED PROGRAMMING IN WEB TECHNOLOGY', 30, 0, '16:26:00', '11:41:00', 'Open', 'F', 'Wednesday'),
(67, 'MOBILE APPLICATION DEVELOPMENT', 30, 0, '08:46:00', '08:24:00', 'Open', 'G', 'Monday'),
(68, 'SOFTWARE ARCHITECTURE AND DESIGN PATTERNS', 30, 0, '08:11:00', '08:12:00', 'Open', 'H', 'Tuesday'),
(69, 'COMPUTER SCIENCE MATHEMATICS', 30, 0, '10:49:00', '15:45:00', 'Open', 'A', 'Tuesday'),
(70, 'BASIC GRAPH THEORY', 30, 0, '11:51:00', '10:59:00', 'Open', 'B', 'Monday'),
(71, 'ADVANCED ALGORITHM TECHNIQUES', 30, 0, '11:34:00', '11:35:00', 'Open', 'C', 'Tuesday'),
(72, 'NATURAL LANGUAGE PROCESSING', 30, 0, '13:03:00', '09:30:00', 'Open', 'D', 'Tuesday'),
(73, 'LINEAR PROGRAMMING', 30, 0, '10:39:00', '15:51:00', 'Open', 'E', 'Tuesday'),
(74, 'PARALLEL COMPUTING', 30, 0, '08:28:00', '15:29:00', 'Open', 'F', 'Wednesday'),
(75, 'MACHINE LEARNING', 30, 0, '16:02:00', '15:52:00', 'Open', 'G', 'Tuesday'),
(76, 'BASIC MECHANICAL ENGG.', 30, 0, '09:49:00', '08:23:00', 'Open', 'H', 'Sunday'),
(77, 'DIGITAL SIGNAL PROCESSING', 30, 0, '09:35:00', '10:31:00', 'Open', 'A', 'Sunday'),
(78, 'VLSI CIRCUIT DESIGN', 30, 0, '13:37:00', '10:36:00', 'Open', 'B', 'Monday'),
(79, 'SIGNALS & LINEAR SYSTEM', 30, 0, '13:23:00', '13:14:00', 'Open', 'C', 'Monday'),
(80, 'DIGITAL SYSTEM DESIGN', 30, 0, '16:43:00', '14:23:00', 'Open', 'D', 'Monday'),
(81, 'IMAGE PROCESSING', 30, 0, '12:05:00', '09:41:00', 'Open', 'E', 'Monday'),
(82, 'MULTIMEDIA SYSTEMS', 30, 0, '10:46:00', '16:43:00', 'Open', 'F', 'Tuesday'),
(83, 'SIMULATION & MODELING', 30, 0, '10:10:00', '09:33:00', 'Open', 'G', 'Monday'),
(84, 'ADVANCED COMPUTER NETWORKS', 30, 0, '09:23:00', '08:04:00', 'Open', 'H', 'Monday'),
(85, 'COMPUTER VISION AND PATTERN RECOGNITION', 30, 0, '10:12:00', '09:07:00', 'Open', 'A', 'Monday'),
(86, 'NETWORK SECURITY', 30, 0, '08:31:00', '10:03:00', 'Open', 'B', 'Wednesday'),
(87, 'ADVANCED OPERATING SYSTEM', 30, 0, '16:05:00', '15:04:00', 'Open', 'C', 'Sunday'),
(88, 'DIGITAL DESIGN WITH SYSTEM [ VERILOG,VHDL & FPGAS ]', 30, 0, '12:22:00', '12:34:00', 'Open', 'D', 'Sunday'),
(89, 'ROBOTICS ENGINEERING', 30, 0, '15:04:00', '14:46:00', 'Open', 'E', 'Tuesday'),
(90, 'TELECOMMUNICATIONS ENGINEERING', 30, 0, '14:34:00', '12:00:00', 'Open', 'F', 'Tuesday'),
(91, 'NETWORK RESOURCE MANAGEMENT & ORGANIZATION', 30, 0, '14:46:00', '15:49:00', 'Open', 'G', 'Monday'),
(92, 'WIRELESS SENSOR NETWORKS', 30, 0, '10:32:00', '11:44:00', 'Open', 'H', 'Wednesday'),
(93, 'INDUSTRIAL ELECTRONICS, DRIVES & INSTRUMENTATION', 30, 0, '09:48:00', '08:02:00', 'Open', 'A', 'Tuesday'),
(94, 'DIGITAL MARKETING STRATEGY', 30, 0, '10:52:00', '13:38:00', 'Open', 'B', 'Wednesday'),
(95, 'BIG DATA ANALYTICS', 30, 0, '09:47:00', '09:06:00', 'Open', 'C', 'Monday'),
(96, 'INTERNET OF THINGS (IOT)', 30, 0, '10:34:00', '13:39:00', 'Open', 'D', 'Tuesday'),
(97, 'CLOUD COMPUTING', 30, 0, '09:43:00', '10:36:00', 'Open', 'E', 'Tuesday'),
(98, 'CYBERPHYSICAL SYSTEMS', 30, 0, '15:51:00', '10:49:00', 'Open', 'F', 'Tuesday'),
(99, 'BLOCKCHAIN TECHNOLOGY', 30, 0, '15:44:00', '08:23:00', 'Open', 'G', 'Tuesday'),
(100, 'QUANTUM COMPUTING', 30, 0, '10:33:00', '13:06:00', 'Open', 'H', 'Wednesday'),
(101, 'SPACE TECHNOLOGY', 30, 0, '11:23:00', '12:30:00', 'Open', 'A', 'Monday'),
(102, 'AERONAUTICAL ENGINEERING', 30, 0, '16:57:00', '09:47:00', 'Open', 'B', 'Wednesday'),
(103, 'BIOINFORMATICS', 30, 0, '08:53:00', '11:29:00', 'Open', 'C', 'Monday'),
(104, 'BIOMEDICAL ENGINEERING', 30, 0, '12:46:00', '08:37:00', 'Open', 'D', 'Tuesday'),
(105, 'COMPUTATIONAL BIOLOGY', 30, 0, '13:51:00', '12:15:00', 'Open', 'E', 'Monday'),
(106, 'GENETIC ENGINEERING', 30, 0, '08:45:00', '14:19:00', 'Open', 'F', 'Sunday'),
(107, 'NANOTECHNOLOGY', 30, 0, '15:10:00', '08:08:00', 'Open', 'G', 'Monday'),
(108, 'ARTIFICIAL NEURAL NETWORKS', 30, 0, '08:03:00', '14:05:00', 'active', 'A', 'Sunday'),
(109, 'ROBOTIC PROCESS AUTOMATION', 30, 0, '09:46:00', '09:25:00', 'active', 'B', 'Sunday'),
(110, 'CRYPTOGRAPHY AND NETWORK SECURITY', 30, 0, '12:55:00', '12:22:00', 'active', 'C', 'Monday'),
(111, 'ADVANCED DATABASE SYSTEMS', 30, 0, '14:41:00', '13:24:00', 'active', 'D', 'Monday'),
(112, 'COMPUTATIONAL LINGUISTICS', 30, 0, '14:33:00', '08:30:00', 'active', 'E', 'Tuesday'),
(113, 'ADVANCED TOPICS IN MACHINE LEARNING', 30, 0, '14:16:00', '09:27:00', 'Open', 'F', 'Tuesday'),
(114, 'NETWORK PROGRAMMING', 30, 0, '15:23:00', '14:32:00', 'active', 'G', 'Monday'),
(115, 'COMPUTER FORENSICS', 30, 0, '15:44:00', '14:07:00', 'active', 'H', 'Wednesday'),
(116, 'DIGITAL IMAGE PROCESSING', 30, 0, '13:51:00', '13:45:00', 'active', 'A', 'Tuesday'),
(117, 'COMPUTER VISION', 30, 0, '12:44:00', '12:07:00', 'active', 'B', 'Monday'),
(118, 'EMBEDDED SYSTEM DESIGN', 30, 0, '16:18:00', '11:25:00', 'active', 'C', 'Sunday'),
(119, 'REAL-TIME OPERATING SYSTEMS', 30, 0, '09:07:00', '11:21:00', 'active', 'D', 'Tuesday'),
(120, 'WIRELESS COMMUNICATION SYSTEMS', 30, 0, '11:03:00', '16:43:00', 'active', 'E', 'Tuesday'),
(121, 'BIOINFORMATICS AND COMPUTATIONAL BIOLOGY', 30, 0, '12:04:00', '08:01:00', 'active', 'F', 'Sunday'),
(122, 'NEURAL NETWORKS AND DEEP LEARNING', 30, 0, '16:44:00', '16:15:00', 'active', 'G', 'Tuesday'),
(123, 'SOFTWARE TESTING AND QUALITY ASSURANCE', 30, 0, '10:19:00', '10:37:00', 'active', 'H', 'Monday'),
(124, 'INTERNET SECURITY AND PRIVACY', 30, 0, '16:13:00', '15:02:00', 'active', 'A', 'Monday'),
(125, 'CRYPTOCURRENCY AND BLOCKCHAIN TECHNOLOGY', 30, 0, '09:17:00', '14:41:00', 'active', 'B', 'Tuesday'),
(126, 'DISTRIBUTED SYSTEMS', 30, 0, '08:02:00', '16:39:00', 'active', 'C', 'Monday'),
(127, 'ADVANCED TOPICS IN COMPUTER NETWORKS', 30, 0, '11:33:00', '10:26:00', 'active', 'D', 'Monday'),
(128, 'COMPUTATIONAL INTELLIGENCE', 30, 0, '10:59:00', '16:55:00', 'active', 'E', 'Monday'),
(129, 'INTERNET OF THINGS SECURITY', 30, 0, '13:14:00', '11:08:00', 'active', 'F', 'Wednesday'),
(130, 'SOFTWARE PROJECT MANAGEMENT', 30, 0, '14:34:00', '10:58:00', 'active', 'G', 'Wednesday'),
(131, 'ADVANCED TOPICS IN DATABASE SYSTEMS', 30, 0, '11:46:00', '08:23:00', 'active', 'H', 'Monday'),
(132, 'MACHINE LEARNING APPLICATIONS', 30, 0, '11:00:00', '14:31:00', 'Open', 'A', 'Tuesday'),
(133, 'ARTIFICIAL INTELLIGENCE ETHICS', 30, 0, '09:53:00', '14:50:00', 'active', 'B', 'Tuesday'),
(134, 'QUANTUM COMPUTING AND INFORMATION', 30, 0, '10:48:00', '08:18:00', 'active', 'C', 'Wednesday'),
(135, 'EMERGING TRENDS IN COMPUTER SCIENCE', 30, 0, '08:19:00', '13:00:00', 'active', 'D', 'Sunday'),
(136, 'COMPUTER SYSTEMS SECURITY', 30, 0, '11:04:00', '14:07:00', 'active', 'E', 'Tuesday'),
(137, 'BIG DATA SECURITY AND PRIVACY', 30, 0, '14:32:00', '10:28:00', 'active', 'F', 'Tuesday'),
(138, 'ADVANCED SOFTWARE ENGINEERING', 30, 0, '13:35:00', '14:35:00', 'active', 'G', 'Sunday'),
(139, 'ARTIFICIAL INTELLIGENCE IN HEALTHCARE', 30, 0, '12:47:00', '12:44:00', 'active', 'H', 'Tuesday'),
(140, 'AUTOMATED SOFTWARE ENGINEERING', 30, 0, '16:55:00', '13:24:00', 'active', 'A', 'Tuesday'),
(141, 'COMPUTER NETWORK FORENSICS', 30, 0, '15:28:00', '09:11:00', 'active', 'B', 'Tuesday'),
(142, 'COMPUTER SYSTEMS DESIGN', 30, 0, '11:58:00', '16:00:00', 'active', 'C', 'Wednesday'),
(143, 'DIGITAL FORENSICS', 30, 0, '15:43:00', '11:31:00', 'active', 'D', 'Monday'),
(144, 'HUMAN-COMPUTER INTERACTION DESIGN', 30, 0, '08:52:00', '15:40:00', 'active', 'E', 'Sunday'),
(145, 'SECURE CODING', 30, 0, '08:04:00', '10:38:00', 'active', 'F', 'Wednesday'),
(146, 'SOFTWARE PERFORMANCE ENGINEERING', 30, 0, '10:53:00', '13:36:00', 'active', 'G', 'Sunday'),
(147, 'NETWORK MANAGEMENT AND OPERATION', 30, 0, '13:07:00', '15:51:00', 'active', 'H', 'Wednesday'),
(148, 'DEEP LEARNING FOR NATURAL LANGUAGE PROCESSING', 30, 0, '13:14:00', '15:17:00', 'active', 'A', 'Wednesday'),
(149, 'ADVANCED TOPICS IN COMPUTER VISION', 30, 0, '15:07:00', '08:27:00', 'active', 'B', 'Monday'),
(150, 'CYBERSECURITY STRATEGY AND POLICY', 30, 0, '08:50:00', '09:33:00', 'active', 'C', 'Sunday'),
(151, 'COMPUTER FORENSICS AND INCIDENT RESPONSE', 30, 0, '10:38:00', '12:10:00', 'active', 'D', 'Wednesday'),
(152, 'SOFTWARE REFACTORING', 30, 0, '15:18:00', '11:41:00', 'active', 'E', 'Tuesday'),
(153, 'ARTIFICIAL INTELLIGENCE IN FINANCE', 30, 0, '14:23:00', '10:37:00', 'active', 'F', 'Wednesday'),
(154, 'SOFTWARE DESIGN PATTERNS', 30, 0, '15:06:00', '08:49:00', 'active', 'G', 'Wednesday'),
(155, 'EMBEDDED SOFTWARE ENGINEERING', 30, 0, '08:44:00', '09:50:00', 'active', 'H', 'Tuesday'),
(188, 'MACHINE LEARNING', 30, 0, '01:40:00', '02:40:00', 'Open', 'D', 'Sunday'),
(189, 'INTRODUCTION TO PROGRAMMING LAB', 40, 0, '04:41:00', '04:41:00', 'Open', 'G', 'Wednesday'),
(190, 'CHEMISTRY', 30, 0, '02:15:00', '03:15:00', 'Open', 'F', 'Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `drop_table`
--

CREATE TABLE `drop_table` (
  `Drop_ID` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drop_table`
--

INSERT INTO `drop_table` (`Drop_ID`, `course_name`, `section`, `student_id`, `teacher_id`) VALUES
(7, 'INTRODUCTION TO PROGRAMMING LAB', 'G', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `student_id`, `course_id`, `course_name`, `teacher_id`, `semester`, `section`) VALUES
(1, 2, 1, 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY', 3, 'Spring', 'A'),
(2, 5, 3, 'PHYSICS 1 LAB', 3, 'Spring', 'C'),
(3, 5, 11, 'PHYSICS 2', 3, 'Fall', 'C'),
(5, 5, 1, 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY', 3, 'Spring', 'A'),
(7, 2, 3, 'PHYSICS 1 LAB', 3, 'Fall', 'C'),
(8, 2, 2, 'PHYSICS 1', 3, 'Spring', 'B'),
(9, 2, 189, 'INTRODUCTION TO PROGRAMMING LAB', 3, 'Spring', 'G'),
(10, 2, 11, 'PHYSICS 2', 3, 'Summer', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_Id` int(11) NOT NULL,
  `mid_quiz1` int(11) DEFAULT NULL,
  `mid_quiz2` int(11) DEFAULT NULL,
  `mid_best_quiz` int(11) DEFAULT NULL,
  `mid_attendance` int(11) DEFAULT NULL,
  `mid_written` int(11) DEFAULT NULL,
  `mid_grade` int(11) DEFAULT NULL,
  `final_quiz1` int(11) DEFAULT NULL,
  `final_quiz2` int(11) DEFAULT NULL,
  `final_best_quiz` int(11) DEFAULT NULL,
  `final_attendance` int(11) DEFAULT NULL,
  `final_written` int(11) DEFAULT NULL,
  `final_grade` int(11) DEFAULT NULL,
  `total_grade` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `mid_assignment` int(11) DEFAULT NULL,
  `final_assignment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_Id`, `mid_quiz1`, `mid_quiz2`, `mid_best_quiz`, `mid_attendance`, `mid_written`, `mid_grade`, `final_quiz1`, `final_quiz2`, `final_best_quiz`, `final_attendance`, `final_written`, `final_grade`, `total_grade`, `course_name`, `section`, `student_name`, `student_id`, `teacher_id`, `teacher_name`, `semester`, `mid_assignment`, `final_assignment`) VALUES
(6, 18, 15, 18, 10, 34, 82, 14, 20, 20, 10, 38, 88, 86, 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY [A]', 'A', 'Jannat Ul Ferdous Jannat', 2, 3, 'Niyaz Al Mahmud', 'Spring', 20, 20),
(7, 20, 0, 20, 10, 44, 94, 18, 19, 19, 10, 45, 92, 93, 'INTRODUCTION TO PROGRAMMING LAB [G]', 'G', 'Jannat Ul Ferdous Jannat', 2, 3, 'Niyaz Al Mahmud', 'Spring', 20, 18),
(8, 10, 19, 19, 10, 49, 93, 5, 20, 20, 9, 23, 64, 76, 'PHYSICS 1 LAB [C]', 'C', 'Jannat Ul Ferdous Jannat', 2, 3, 'Niyaz Al Mahmud', 'Fall', 15, 12),
(9, 16, 20, 20, 10, 45, 94, 14, 20, 20, 10, 40, 90, 92, 'PHYSICS 1 [B]', 'B', 'Jannat Ul Ferdous Jannat', 2, 3, 'Niyaz Al Mahmud', 'Spring', 19, 20),
(10, 9, 10, 10, 10, 50, 83, 3, 18, 18, 10, 40, 85, 84, 'PHYSICS 2 [C]', 'C', 'Jannat Ul Ferdous Jannat', 2, 3, 'Niyaz Al Mahmud', 'Summer', 13, 17);

-- --------------------------------------------------------

--
-- Table structure for table `humanresource`
--

CREATE TABLE `humanresource` (
  `HRID` int(11) NOT NULL,
  `HRName` varchar(255) DEFAULT NULL,
  `FatherName` varchar(255) DEFAULT NULL,
  `MotherName` varchar(255) DEFAULT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `MaritalStatus` varchar(20) DEFAULT NULL,
  `LeavingDate` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `JoiningDate` varchar(50) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `humanresource`
--

INSERT INTO `humanresource` (`HRID`, `HRName`, `FatherName`, `MotherName`, `BloodGroup`, `Address`, `Religion`, `MaritalStatus`, `LeavingDate`, `Email`, `Phone`, `JoiningDate`, `Nationality`) VALUES
(4, 'Abu Rayhan', 'Amin', 'Humaira', 'O+', 'Cantonment,Dhaka', 'Islam', 'Single', NULL, 'abu@gmail.com', '01723433445', '2024-03-23', 'Bangladesh'),
(6, 'Abdullah', 'Sultan Ahmed', 'kulsum begum', 'O+', 'Badda ,Dhaka-1212', 'Islam', 'unmarried', NULL, 'abdullah@gmail.com', '01723433467', '2023-04-30', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `leave_table`
--

CREATE TABLE `leave_table` (
  `Leave_ID` int(11) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `EmployeeType` varchar(255) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `StartDate` varchar(50) DEFAULT NULL,
  `EndDate` varchar(50) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`Leave_ID`, `EmployeeID`, `EmployeeType`, `Reason`, `StartDate`, `EndDate`, `Status`, `Name`, `Department`) VALUES
(8, 1, 'Registrar', 'Headache', '2024-05-15', '2024-05-16', 'pending', 'Tawsif Alam', 'Registrar'),
(9, 1, 'Registrar', 'Family Problem', '2024-05-15', '2024-05-16', 'pending', 'Tawsif Alam', 'Registrar'),
(10, 3, 'teacher', 'Headache', '2024-05-14', '2024-05-16', 'pending', 'Niyaz Al Mahmud', 'Electrical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `libraryresource`
--

CREATE TABLE `libraryresource` (
  `ResourceID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Availability` varchar(50) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `StudentName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libraryresource`
--

INSERT INTO `libraryresource` (`ResourceID`, `Name`, `Availability`, `Author`, `Category`, `StudentID`, `StudentName`) VALUES
(1, 'The Night Circus', 'Unavailable', 'Erin Morgenstern', 'Fantasy fiction', 2, 'Jannat Ul Ferdous Jannat'),
(2, 'To Kill a Mockingbird', 'Available', 'Harper Lee', 'Fiction', NULL, NULL),
(3, '1984', 'Unavailable', 'George Orwell', 'Dystopian Fiction', 2, 'Jannat Ul Ferdous Jannat'),
(4, 'The Great Gatsby', 'Available', 'F. Scott Fitzgerald', 'Classic Literature', NULL, NULL),
(5, 'Pride and Prejudice', 'Available', 'Jane Austen', 'Romance', NULL, NULL),
(6, 'The Catcher in the Rye', 'Available', 'J.D. Salinger', 'Coming-of-age Fiction', NULL, NULL),
(7, 'Harry Potter and the Sorcerer\'s Stone', 'Unavailable', 'J.K. Rowling', 'Fantasy', 5, 'Irfan Piyal'),
(8, 'The Hobbit', 'Available', 'J.R.R. Tolkien', 'Fantasy', NULL, NULL),
(9, 'The Hunger Games', 'Available', 'Suzanne Collins', 'Young Adult Fiction', NULL, NULL),
(10, 'The Da Vinci Code', 'Available', 'Dan Brown', 'Mystery', NULL, NULL),
(11, 'The Lord of the Rings', 'Available', 'J.R.R. Tolkien', 'Fantasy', NULL, NULL),
(12, 'Gone with the Wind', 'Available', 'Margaret Mitchell', 'Historical Fiction', NULL, NULL),
(13, 'The Alchemist', 'Available', 'Paulo Coelho', 'Philosophical Fiction', NULL, NULL),
(14, 'The Chronicles of Narnia', 'Available', 'C.S. Lewis', 'Fantasy', NULL, NULL),
(15, 'Moby-Dick', 'Available', 'Herman Melville', 'Classic Literature', NULL, NULL),
(16, 'The Kite Runner', 'Available', 'Khaled Hosseini', 'Historical Fiction', NULL, NULL),
(17, 'The Secret Garden', 'Available', 'Frances Hodgson Burnett', 'Children\'s Literature', NULL, NULL),
(18, 'Little Women', 'Available', 'Louisa May Alcott', 'Classic Literature', NULL, NULL),
(19, 'Alice\'s Adventures in Wonderland', 'Available', 'Lewis Carroll', 'Fantasy', NULL, NULL),
(20, 'The Picture of Dorian Gray', 'Available', 'Oscar Wilde', 'Gothic Fiction', NULL, NULL),
(21, 'Brave New World', 'Available', 'Aldous Huxley', 'Science Fiction', NULL, NULL),
(22, 'The Road', 'Available', 'Cormac McCarthy', 'Post-apocalyptic Fiction', NULL, NULL),
(23, 'The Handmaid\'s Tale', 'Available', 'Margaret Atwood', 'Dystopian Fiction', NULL, NULL),
(24, 'The Book Thief', 'Available', 'Markus Zusak', 'Historical Fiction', NULL, NULL),
(25, 'The Girl with the Dragon Tattoo', 'Available', 'Stieg Larsson', 'Mystery', NULL, NULL),
(26, 'The Help', 'Available', 'Kathryn Stockett', 'Historical Fiction', NULL, NULL),
(27, 'The Fault in Our Stars', 'Available', 'John Green', 'Young Adult Fiction', NULL, NULL),
(28, 'The Stand', 'Available', 'Stephen King', 'Post-apocalyptic Fiction', NULL, NULL),
(29, 'A Game of Thrones', 'Available', 'George R.R. Martin', 'Fantasy', NULL, NULL),
(30, 'The Shining', 'Available', 'Stephen King', 'Horror', NULL, NULL),
(31, 'Jurassic Park', 'Available', 'Michael Crichton', 'Science Fiction', NULL, NULL),
(32, 'The Catcher in the Rye', 'Available', 'J.D. Salinger', 'Coming-of-age Fiction', NULL, NULL),
(33, 'The Bell Jar', 'Available', 'Sylvia Plath', 'Autobiographical Fiction', NULL, NULL),
(34, 'The Name of the Wind', 'Available', 'Patrick Rothfuss', 'Fantasy', NULL, NULL),
(35, 'The Grapes of Wrath', 'Available', 'John Steinbeck', 'Classic Literature', NULL, NULL),
(36, 'The Outsiders', 'Available', 'S.E. Hinton', 'Young Adult Fiction', NULL, NULL),
(37, 'The Giver', 'Available', 'Lois Lowry', 'Science Fiction', NULL, NULL),
(38, 'The Night Circus', 'Available', 'Erin Morgenstern', 'Fantasy', NULL, NULL),
(39, 'The Martian', 'Available', 'Andy Weir', 'Science Fiction', NULL, NULL),
(40, 'A Brief History of Time', 'Available', 'Stephen Hawking', 'Science Nonfiction', NULL, NULL),
(41, 'The Chronicles of Prydain', 'Available', 'Lloyd Alexander', 'Fantasy', NULL, NULL),
(42, 'The Color Purple', 'Available', 'Alice Walker', 'Fiction', NULL, NULL),
(43, 'Frankenstein', 'Available', 'Mary Shelley', 'Gothic Fiction', NULL, NULL),
(44, 'Wuthering Heights', 'Available', 'Emily Bronte', 'Gothic Fiction', NULL, NULL),
(45, 'The Brothers Karamazov', 'Available', 'Fyodor Dostoevsky', 'Classic Literature', NULL, NULL),
(46, 'War and Peace', 'Available', 'Leo Tolstoy', 'Historical Fiction', NULL, NULL),
(47, 'Crime and Punishment', 'Available', 'Fyodor Dostoevsky', 'Psychological Fiction', NULL, NULL),
(48, 'One Hundred Years of Solitude', 'Available', 'Gabriel Garcia Marquez', 'Magical Realism', NULL, NULL),
(49, 'Beloved', 'Available', 'Toni Morrison', 'Historical Fiction', NULL, NULL),
(50, 'Anna Karenina', 'Available', 'Leo Tolstoy', 'Classic Literature', NULL, NULL),
(51, 'The Count of Monte Cristo', 'Available', 'Alexandre Dumas', 'Adventure Fiction', NULL, NULL),
(52, 'The Odyssey', 'Available', 'Homer', 'Epic Poetry', NULL, NULL),
(53, 'Les Misérables', 'Available', 'Victor Hugo', 'Historical Fiction', NULL, NULL),
(54, 'The Divine Comedy', 'Available', 'Dante Alighieri', 'Epic Poetry', NULL, NULL),
(55, 'East of Eden', 'Available', 'John Steinbeck', 'Classic Literature', NULL, NULL),
(56, 'The Scarlet Letter', 'Available', 'Nathaniel Hawthorne', 'Classic Literature', NULL, NULL),
(57, 'Slaughterhouse-Five', 'Available', 'Kurt Vonnegut', 'Science Fiction', NULL, NULL),
(58, 'The Adventures of Sherlock Holmes', 'Available', 'Arthur Conan Doyle', 'Mystery', NULL, NULL),
(59, 'The Stand', 'Available', 'Stephen King', 'Post-apocalyptic Fiction', NULL, NULL),
(60, 'Catch-22', 'Available', 'Joseph Heller', 'Satirical Fiction', NULL, NULL),
(61, 'The Old Man and the Sea', 'Available', 'Ernest Hemingway', 'Classic Literature', NULL, NULL),
(62, 'The Sun Also Rises', 'Available', 'Ernest Hemingway', 'Classic Literature', NULL, NULL),
(63, 'Heart of Darkness', 'Available', 'Joseph Conrad', 'Psychological Fiction', NULL, NULL),
(64, 'Don Quixote', 'Available', 'Miguel de Cervantes', 'Adventure Fiction', NULL, NULL),
(65, 'The Canterbury Tales', 'Available', 'Geoffrey Chaucer', 'Classic Literature', NULL, NULL),
(66, 'The Stranger', 'Available', 'Albert Camus', 'Existential Fiction', NULL, NULL),
(67, 'The Trial', 'Available', 'Franz Kafka', 'Psychological Fiction', NULL, NULL),
(68, 'The Picture of Dorian Gray', 'Available', 'Oscar Wilde', 'Gothic Fiction', NULL, NULL),
(69, 'The Call of the Wild', 'Available', 'Jack London', 'Adventure Fiction', NULL, NULL),
(70, 'Dracula', 'Available', 'Bram Stoker', 'Gothic Fiction', NULL, NULL),
(71, 'The Iliad', 'Available', 'Homer', 'Epic Poetry', NULL, NULL),
(72, 'The Joy Luck Club', 'Available', 'Amy Tan', 'Fiction', NULL, NULL),
(73, 'The Handmaid\'s Tale', 'Available', 'Margaret Atwood', 'Dystopian Fiction', NULL, NULL),
(74, 'The Picture of Dorian Gray', 'Available', 'Oscar Wilde', 'Gothic Fiction', NULL, NULL),
(75, 'The Road', 'Available', 'Cormac McCarthy', 'Post-apocalyptic Fiction', NULL, NULL),
(76, 'The Catcher in the Rye', 'Available', 'J.D. Salinger', 'Coming-of-age Fiction', NULL, NULL),
(77, 'The Hobbit', 'Available', 'J.R.R. Tolkien', 'Fantasy', NULL, NULL),
(78, 'The Help', 'Available', 'Kathryn Stockett', 'Historical Fiction', NULL, NULL),
(79, 'The Martian', 'Available', 'Andy Weir', 'Science Fiction', NULL, NULL),
(80, 'The Alchemist', 'Available', 'Paulo Coelho', 'Philosophical Fiction', NULL, NULL),
(81, 'The Book Thief', 'Available', 'Markus Zusak', 'Historical Fiction', NULL, NULL),
(82, 'The Da Vinci Code', 'Available', 'Dan Brown', 'Mystery', NULL, NULL),
(83, 'The Girl with the Dragon Tattoo', 'Available', 'Stieg Larsson', 'Mystery', NULL, NULL),
(84, 'The Giver', 'Available', 'Lois Lowry', 'Science Fiction', NULL, NULL),
(85, 'The Great Gatsby', 'Available', 'F. Scott Fitzgerald', 'Classic Literature', NULL, NULL),
(86, 'The Kite Runner', 'Available', 'Khaled Hosseini', 'Historical Fiction', NULL, NULL),
(87, 'The Lord of the Rings', 'Available', 'J.R.R. Tolkien', 'Fantasy', NULL, NULL),
(88, 'The Lovely Bones', 'Available', 'Alice Sebold', 'Fiction', NULL, NULL),
(89, 'The Night Circus', 'Available', 'Erin Morgenstern', 'Fantasy', NULL, NULL),
(90, 'The Outsiders', 'Available', 'S.E. Hinton', 'Young Adult Fiction', NULL, NULL),
(91, 'The Secret Garden', 'Available', 'Frances Hodgson Burnett', 'Children\'s Literature', NULL, NULL),
(92, 'The Shining', 'Available', 'Stephen King', 'Horror', NULL, NULL),
(93, 'The Stand', 'Available', 'Stephen King', 'Post-apocalyptic Fiction', NULL, NULL),
(94, 'The Stranger', 'Available', 'Albert Camus', 'Existential Fiction', NULL, NULL),
(95, 'The Sun Also Rises', 'Available', 'Ernest Hemingway', 'Classic Literature', NULL, NULL),
(96, 'The Time Traveler\'s Wife', 'Available', 'Audrey Niffenegger', 'Romance', NULL, NULL),
(97, 'To Kill a Mockingbird', 'Available', 'Harper Lee', 'Classic Literature', NULL, NULL),
(98, 'Twilight', 'Available', 'Stephenie Meyer', 'Young Adult Fiction', NULL, NULL),
(99, 'War and Peace', 'Available', 'Leo Tolstoy', 'Historical Fiction', NULL, NULL),
(100, 'Wuthering Heights', 'Available', 'Emily Bronte', 'Gothic Fiction', NULL, NULL),
(101, 'A Thousand Splendid Suns', 'Available', 'Khaled Hosseini', 'Historical Fiction', NULL, NULL),
(102, 'Brave New World', 'Available', 'Aldous Huxley', 'Science Fiction', NULL, NULL),
(103, 'Charlotte\'s Web', 'Available', 'E.B. White', 'Children\'s Literature', NULL, NULL),
(104, 'Cloud Atlas', 'Available', 'David Mitchell', 'Science Fiction', NULL, NULL),
(105, 'Divergent', 'Available', 'Veronica Roth', 'Young Adult Fiction', NULL, NULL),
(106, 'Ender\'s Game', 'Available', 'Orson Scott Card', 'Science Fiction', NULL, NULL),
(107, 'Fahrenheit 451', 'Available', 'Ray Bradbury', 'Dystopian Fiction', NULL, NULL),
(108, 'Gone Girl', 'Available', 'Gillian Flynn', 'Mystery', NULL, NULL),
(109, 'Harry Potter and the Chamber of Secrets', 'Available', 'J.K. Rowling', 'Fantasy', NULL, NULL),
(110, 'Jane Eyre', 'Available', 'Charlotte Bronte', 'Gothic Fiction', NULL, NULL),
(111, 'Life of Pi', 'Available', 'Yann Martel', 'Adventure Fiction', NULL, NULL),
(112, 'Lord of the Flies', 'Available', 'William Golding', 'Dystopian Fiction', NULL, NULL),
(113, 'Memoirs of a Geisha', 'Available', 'Arthur Golden', 'Historical Fiction', NULL, NULL),
(114, 'Middlemarch', 'Available', 'George Eliot', 'Classic Literature', NULL, NULL),
(115, 'Miss Peregrine\'s Home for Peculiar Children', 'Available', 'Ransom Riggs', 'Fantasy', NULL, NULL),
(116, 'My Sister\'s Keeper', 'Available', 'Jodi Picoult', 'Fiction', NULL, NULL),
(117, 'Never Let Me Go', 'Available', 'Kazuo Ishiguro', 'Science Fiction', NULL, NULL),
(118, 'Of Mice and Men', 'Available', 'John Steinbeck', 'Classic Literature', NULL, NULL),
(119, 'Percy Jackson & the Olympians: The Lightning Thief', 'Available', 'Rick Riordan', 'Fantasy', NULL, NULL),
(120, 'Ready Player One', 'Available', 'Ernest Cline', 'Science Fiction', NULL, NULL),
(121, 'Room', 'Available', 'Emma Donoghue', 'Psychological Fiction', NULL, NULL),
(122, 'The Adventures of Tom Sawyer', 'Available', 'Mark Twain', 'Classic Literature', NULL, NULL),
(123, 'The Bell Jar', 'Available', 'Sylvia Plath', 'Autobiographical Fiction', NULL, NULL),
(124, 'The Chronicles of Narnia', 'Available', 'C.S. Lewis', 'Fantasy', NULL, NULL),
(125, 'The Girl on the Train', 'Available', 'Paula Hawkins', 'Mystery', NULL, NULL),
(126, 'The Goldfinch', 'Available', 'Donna Tartt', 'Fiction', NULL, NULL),
(127, 'The Handmaid\'s Tale', 'Available', 'Margaret Atwood', 'Dystopian Fiction', NULL, NULL),
(128, 'The Help', 'Available', 'Kathryn Stockett', 'Historical Fiction', NULL, NULL),
(129, 'The Hunger Games', 'Available', 'Suzanne Collins', 'Young Adult Fiction', NULL, NULL),
(130, 'The Martian', 'Available', 'Andy Weir', 'Science Fiction', NULL, NULL),
(131, 'The Maze Runner', 'Available', 'James Dashner', 'Science Fiction', NULL, NULL),
(132, 'The Night Circus', 'Available', 'Erin Morgenstern', 'Fantasy', NULL, NULL),
(133, 'The Perks of Being a Wallflower', 'Available', 'Stephen Chbosky', 'Young Adult Fiction', NULL, NULL),
(134, 'The Road', 'Available', 'Cormac McCarthy', 'Post-apocalyptic Fiction', NULL, NULL),
(135, 'The Secret Garden', 'Available', 'Frances Hodgson Burnett', 'Children\'s Literature', NULL, NULL),
(136, 'The Shining', 'Available', 'Stephen King', 'Horror', NULL, NULL),
(137, 'The Silence of the Lambs', 'Available', 'Thomas Harris', 'Thriller', NULL, NULL),
(138, 'The Stand', 'Available', 'Stephen King', 'Post-apocalyptic Fiction', NULL, NULL),
(139, 'The Sun Also Rises', 'Available', 'Ernest Hemingway', 'Classic Literature', NULL, NULL),
(140, 'The Time Traveler\'s Wife', 'Available', 'Audrey Niffenegger', 'Romance', NULL, NULL),
(141, 'The Underground Railroad', 'Available', 'Colson Whitehead', 'Historical Fiction', NULL, NULL),
(142, 'The Unbearable Lightness of Being', 'Available', 'Milan Kundera', 'Philosophical Fiction', NULL, NULL),
(143, 'The Voyage of the Dawn Treader', 'Available', 'C.S. Lewis', 'Fantasy', NULL, NULL),
(144, 'The Wind-Up Bird Chronicle', 'Available', 'Haruki Murakami', 'Magical Realism', NULL, NULL),
(145, 'Their Eyes Were Watching God', 'Available', 'Zora Neale Hurston', 'Classic Literature', NULL, NULL),
(146, 'To Kill a Mockingbird', 'Available', 'Harper Lee', 'Classic Literature', NULL, NULL),
(147, 'Tuesdays with Morrie', 'Available', 'Mitch Albom', 'Biographical Fiction', NULL, NULL),
(148, 'Water for Elephants', 'Available', 'Sara Gruen', 'Historical Fiction', NULL, NULL),
(149, 'Where the Crawdads Sing', 'Available', 'Delia Owens', 'Mystery', NULL, NULL),
(150, 'White Teeth', 'Available', 'Zadie Smith', 'Contemporary Fiction', NULL, NULL),
(151, 'Wild', 'Available', 'Cheryl Strayed', 'Autobiographical Fiction', NULL, NULL),
(152, 'Winnie-the-Pooh', 'Available', 'A.A. Milne', 'Children\'s Literature', NULL, NULL),
(153, 'Wuthering Heights', 'Available', 'Emily Bronte', 'Gothic Fiction', NULL, NULL),
(154, '1984', 'Available', 'George Orwell', 'Dystopian Fiction', NULL, NULL),
(155, 'A Clockwork Orange', 'Available', 'Anthony Burgess', 'Dystopian Fiction', NULL, NULL),
(156, 'A Tale of Two Cities', 'Available', 'Charles Dickens', 'Classic Literature', NULL, NULL),
(157, 'American Gods', 'Available', 'Neil Gaiman', 'Fantasy', NULL, NULL),
(158, 'Animal Farm', 'Available', 'George Orwell', 'Political Satire', NULL, NULL),
(159, 'Anne of Green Gables', 'Available', 'L.M. Montgomery', 'Children\'s Literature', NULL, NULL),
(160, 'Atlas Shrugged', 'Available', 'Ayn Rand', 'Philosophical Fiction', NULL, NULL),
(161, 'The Maze Runner', 'Available', 'James Dashner', 'Young Adult Fiction', NULL, NULL),
(162, 'The Nightingale', 'Available', 'Kristin Hannah', 'Historical Fiction', NULL, NULL),
(163, 'The Road', 'Available', 'Cormac McCarthy', 'Post-apocalyptic Fiction', NULL, NULL),
(164, 'The Secret Life of Bees', 'Available', 'Sue Monk Kidd', 'Fiction', NULL, NULL),
(165, 'The Shack', 'Available', 'William P. Young', 'Christian Fiction', NULL, NULL),
(166, 'The Silence of the Lambs', 'Available', 'Thomas Harris', 'Thriller', NULL, NULL),
(167, 'The Time Machine', 'Available', 'H.G. Wells', 'Science Fiction', NULL, NULL),
(168, 'The Unbearable Lightness of Being', 'Available', 'Milan Kundera', 'Philosophical Fiction', NULL, NULL),
(169, 'The Underground Railroad', 'Available', 'Colson Whitehead', 'Historical Fiction', NULL, NULL),
(170, 'The Wind-Up Bird Chronicle', 'Available', 'Haruki Murakami', 'Magical Realism', NULL, NULL),
(171, 'The Wonderful Wizard of Oz', 'Available', 'L. Frank Baum', 'Fantasy', NULL, NULL),
(172, 'Thirteen Reasons Why', 'Available', 'Jay Asher', 'Young Adult Fiction', NULL, NULL),
(173, 'To Kill a Mockingbird', 'Available', 'Harper Lee', 'Classic Literature', NULL, NULL),
(174, 'Twilight', 'Available', 'Stephenie Meyer', 'Young Adult Fiction', NULL, NULL),
(175, 'Ulysses', 'Available', 'James Joyce', 'Modernist Literature', NULL, NULL),
(176, 'Water for Elephants', 'Available', 'Sara Gruen', 'Historical Fiction', NULL, NULL),
(177, 'Where the Crawdads Sing', 'Available', 'Delia Owens', 'Fiction', NULL, NULL),
(178, 'White Oleander', 'Available', 'Janet Fitch', 'Fiction', NULL, NULL),
(179, 'Wicked', 'Available', 'Gregory Maguire', 'Fantasy', NULL, NULL),
(180, 'Wild', 'Available', 'Cheryl Strayed', 'Autobiography', NULL, NULL),
(181, 'Wintergirls', 'Available', 'Laurie Halse Anderson', 'Young Adult Fiction', NULL, NULL),
(182, 'Wuthering Heights', 'Available', 'Emily Bronte', 'Gothic Fiction', NULL, NULL),
(183, 'You', 'Available', 'Caroline Kepnes', 'Thriller', NULL, NULL),
(184, 'A Clockwork Orange', 'Available', 'Anthony Burgess', 'Dystopian Fiction', NULL, NULL),
(185, 'A Little Life', 'Available', 'Hanya Yanagihara', 'Fiction', NULL, NULL),
(186, 'A Man Called Ove', 'Available', 'Fredrik Backman', 'Fiction', NULL, NULL),
(187, 'A Wrinkle in Time', 'Available', 'Madeleine L\'Engle', 'Fantasy', NULL, NULL),
(188, 'American Gods', 'Available', 'Neil Gaiman', 'Fantasy', NULL, NULL),
(189, 'An American Marriage', 'Available', 'Tayari Jones', 'Fiction', NULL, NULL),
(190, 'sad', 'Available', 'asdf', 'asd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `teacher_id`, `course_name`, `section`, `message`) VALUES
(1, 3, 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY', 'A', 'No class tomorrow.'),
(2, 3, 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY', 'A', 'xm is cancceled'),
(3, 3, 'PHYSICS 2', 'C', 'Have a good Day');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `Employee_id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Bonus` int(11) DEFAULT NULL,
  `Total_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Employee_id`, `Name`, `Month`, `Salary`, `Bonus`, `Total_salary`) VALUES
(4, 1, 'Robiul Alam', 'January 2024', 100000, 5000, 105000),
(5, 1, 'Tawsif Alam', 'April 2024', 100000, 3000, 103000),
(6, 3, 'Niyaz Al Mahmud', 'April 2024', 40000, 5400, 45400);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `RegisterID` int(11) NOT NULL,
  `RegisterName` varchar(255) DEFAULT NULL,
  `FatherName` varchar(255) DEFAULT NULL,
  `MotherName` varchar(255) DEFAULT NULL,
  `BloodGroup` varchar(10) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `JoiningDate` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `LeavingDate` varchar(50) DEFAULT NULL,
  `MaritalStatus` varchar(20) DEFAULT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`RegisterID`, `RegisterName`, `FatherName`, `MotherName`, `BloodGroup`, `Nationality`, `Address`, `Sex`, `Religion`, `JoiningDate`, `Phone`, `Email`, `LeavingDate`, `MaritalStatus`, `DOB`, `Salary`) VALUES
(1, 'Tawsif Alam', 'Shah Alam', 'Momita Alam', 'A-', 'Bangladesh', 'Vatara,Dhaka', 'Male', 'Christian', '2014-06-10', '01452345313', 'tawsif@gmail.com', '', 'Single', '1990-02-15', 100000),
(7, 'Rafik Uddin', 'Abdul Kuddus', 'Shanti begum', 'B+', 'Bangladesh', 'Dhaka', 'Male', 'Islam', '2023-05-01', '01912345313', 'rafik@gmail.com', NULL, 'Single', '1990-02-15', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `ResourceID` int(11) NOT NULL,
  `Section` varchar(255) DEFAULT NULL,
  `CourseName` varchar(255) DEFAULT NULL,
  `Content` blob DEFAULT NULL,
  `TeacherID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`ResourceID`, `Section`, `CourseName`, `Content`, `TeacherID`) VALUES
(1, 'C', 'PHYSICS 1 LAB', 0x646561646c6f636b206d6174682e646f6378, 3),
(2, 'B', 'PHYSICS 1', 0x6461792d312d736c6f742d335f66696e616c5f7370725f32342e706466, 3),
(3, 'A', 'DIFFERENTIAL CALCULUS & CO-ORDINATE GEOMETRY', 0x696c6f76657064665f6d65726765642e706466, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_id` int(11) NOT NULL,
  `Student_name` varchar(255) DEFAULT NULL,
  `Blood_group` varchar(10) DEFAULT NULL,
  `Father_name` varchar(255) DEFAULT NULL,
  `Mother_name` varchar(255) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Marital_status` varchar(20) DEFAULT NULL,
  `Admission_date` varchar(255) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `Graduation_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `Student_name`, `Blood_group`, `Father_name`, `Mother_name`, `Department`, `Address`, `Nationality`, `Sex`, `Religion`, `Marital_status`, `Admission_date`, `Phone`, `Email`, `DOB`, `Graduation_date`) VALUES
(2, 'Jannat Ul Ferdous Jannat', 'A+', 'Rahim Mirza', 'Josna Banu', 'Computer Science', 'Badda,Dhaka', 'Bangladesh', 'Male', 'Christian', 'Single', '2021-12-23', '655348765', 'jannat@gmail.com', '2002-10-14', ''),
(5, 'Irfan Piyal', 'O+', 'Harun Islam', 'Jayeda Khatun', 'Business Administration', 'Samata sarak, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-01-01', '01923452411', 'piyal@example.com', '1990-03-15', NULL),
(18, 'Mazher Wafi', 'A+', 'Mazhar Islam', 'Jebunnesa', 'Computer Science', 'Samata sarak, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-02-07', '01722452411', 'wafi@example.com', '2000-03-25', NULL),
(19, 'Asifur Rahman Tanvir', 'O+', 'Joj Miah', 'Sharifa Khatun', 'pharmacology', 'Janat sarak, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2023-05-07', '01909872411', 'tanvir@example.com', '1990-05-25', NULL),
(20, 'Monir Munna', 'B+', 'Hazrat Islam', 'Moyna Khatun', 'English', 'Khilbarirtek, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2023-07-10', '01923451111', 'munna@example.com', '2000-09-12', NULL),
(21, 'Kadir Risty', 'O+', 'Abu Taleb', 'Rahima Khan', 'Textile Engineering', 'Baridhara, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-06-04', '01625352749', 'risty@example.com', '2000-12-03', NULL),
(22, 'Sadikul Shawon', 'O+', 'Malek Islam', 'Mahfuza Akter', 'English', 'Mohammadpur, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-03-01', '01923999411', 'shawon@example.com', '2000-09-15', NULL),
(23, 'Arafat Islam', 'A+', 'Sadik Islam', 'Azmiri Banu', 'Electrical Engineering', 'Joydebpur, Gazipur', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-02-02', '01843452411', 'arafat@example.com', '2002-04-05', NULL),
(24, 'Niyaz Al Mahmud', 'B+', 'Abu Raihan', 'Afroza Shimu', 'Computer Science', 'Kuril, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-07-01', '01678452411', 'niyaz@example.com', '1999-05-25', NULL),
(25, 'Sadik Saleh', 'AB+', 'Tanjirul Islam', 'Rojina Islam', 'Computer Science', 'Bashundhara, Dhaka', 'Bangladeshi', 'Male', 'Islam', 'Single', '2024-02-01', '01888452411', 'sadik@example.com', '2004-06-05', NULL),
(27, 'jnl;kdhjglk;sdfhgjklb;hsdfljk;vbgsdfuikl;vgl;isdfhgvjl;iksdfhvuikl;dfs', '', '', '', '', '', '', '', '', '', '', '35457', 'klsjdfhjk@gmail.com', '', NULL),
(28, 'asfd', '', 'asdf', '', '', '', '', '', '', '', '', 'asdgf', 'kjfksdj@com', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_financial`
--

CREATE TABLE `student_financial` (
  `Id` int(11) NOT NULL,
  `Student_id` int(11) DEFAULT NULL,
  `Total_payment` int(11) DEFAULT NULL,
  `Dues` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_financial`
--

INSERT INTO `student_financial` (`Id`, `Student_id`, `Total_payment`, `Dues`) VALUES
(1, 2, 16500, 0),
(2, 5, 0, 16500),
(3, 2, 32500, 0),
(4, 2, 33000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `mothername` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `joining_date` varchar(255) DEFAULT NULL,
  `leaving_date` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `fathername`, `mothername`, `dob`, `sex`, `address`, `religion`, `marital_status`, `nationality`, `blood_group`, `email`, `phone`, `joining_date`, `leaving_date`, `department`, `salary`) VALUES
(3, 'Niyaz Al Mahmud', 'Johny Rayhan', 'Shufiya Kamal Josna', '2003-02-14', 'Other', 'Natunbazar,Dhaka', 'Muslim', 'Single', 'Bangladesh', 'B+', 'niyaz@gmail.com', '01629493714', '2023-02-28', '', 'Electrical Engineering', 40000),
(8, 'Mizanur Rahman', 'Saidul Rahman', 'Safia Jannat', '1981-05-12', 'Male', 'Khilbarirtek, Vatara,Dhaka', 'Islam', 'Married', 'Bangladeshi', 'A+', 'mizan@gmail.com', '01984593532', '2023-09-01', NULL, 'Mathematics', 70000),
(9, 'Haider Khan', 'Matbar Khan', 'Sanjida Akter', '1988-07-2', 'Male', '100 ft, Said Nagar, Dhaka', 'Islam', 'Married', 'Bangladeshi', 'O+', 'haider@gmail.com', '01824924821', '2023-10-01', NULL, 'English', 50000),
(10, 'Afzal Islam', 'Khokon Mia', 'Afrina begum', '1989-02-2', 'Male', 'Mirpur, road-1, Dhaka', 'Islam', 'Married', 'Bangladeshi', 'A+', 'afzal@gmail.com', '01892849304', '2024-01-02', NULL, 'Business Studies', 80000),
(11, 'G M Fahima', 'Mokhlesur Rahman', 'Safina Rahman', '1990-07-23', 'Female', 'Jatrabari, Dhaka', 'Muslim', 'Married', 'Bangladeshi', 'B+', 'fahima@gmail.com', '01847293583', '2023-07-08', NULL, 'Social Science', 50000),
(12, 'Mrinal Kanti', 'Shuvro Kanti', 'Bala Rani', '1980-09-21', 'Male', 'Bashundhara,Dhaka', 'Hindu', 'Married', 'Bangladeshi', 'AB+', 'mrinal@gmail.com', '01892449304', '2024-02-02', NULL, 'Business Studies', 70000),
(13, 'Pronab Das', 'Gopal Das', 'Tripti Das', '1991-03-2', 'Male', 'Mirpur, road-8, Dhaka', 'Hindu', 'Married', 'Bangladeshi', 'AB-', 'pronab@gmail.com', '01892849000', '2023-06-02', '2024-05-13', 'ICT', 90000),
(14, 'Zubayer Islam', 'Kofil Uddin', 'Zebunnesa', '1992-08-23', 'Male', 'Mohammadpur, Dhaka', 'Islam', 'Married', 'Bangladeshi', 'O+', 'zubayer@gmail.com', '01772849304', '2023-05-05', '2024-05-11', 'Social Science', 30000),
(15, 'Hanif Sarker', 'Momin Sarker', 'Daulatunnesa', '1979-04-27', 'Male', 'Tejagon, Dhaka', 'Islam', 'Married', 'Bangladeshi', 'B+', 'hanif@gmail.com', '01999999304', '2023-04-03', '2024-05-12', 'Bangla', 50000),
(16, 'Sahadat Islam', 'Anamul Haque', 'Asma khatun', '1989-12-13', 'Male', 'jhonson road, Dhaka', 'Islam', 'Married', 'Bangladeshi', 'A+', 'sahadat@gmail.com', '01892841234', '2024-01-12', NULL, 'Chemistry', 67000),
(17, 'Shafikul Islam', 'Muinuddin Islam', 'Sarah Khatun', '1985-07-12', 'Other', 'Mohakhali,Dhaka-1213', 'Christian', 'Married', 'Bangladeshi', 'B+', 'shafik@gmail.com', '01929493854', '2024-05-01', '2024-05-13', 'Computer Science', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `password`, `phone`, `email`, `users_id`) VALUES
(1, 'Registrar', '123', '01234567890', 'robiul@gmail.com', 1),
(2, 'Student', '123', '01976543218', 'niyaz@gmail.com', 2),
(3, 'Teacher', '123', '01234567898', 'abu@gmail.com', 3),
(4, 'HR', '123', '01976543212', 'abu@gmail.com', 4),
(5, 'Student', '123', '01321452411', 'tawsif@example.com', 5),
(6, 'HR', '123', '01723433467', 'abdullah@gmail.com', 6),
(7, 'Registrar', '123', '01912345313', 'rafik@gmail.com', 7),
(9, 'Teacher', '123', '01984593532', 'mizan@gmail.com', 8),
(10, 'Teacher', '123', '01824924821', 'haider@gmail.com', 9),
(11, 'Teacher', '123', '01892849304', 'afzal@gmail.com', 10),
(12, 'Teacher', '123', '01847293583', 'fahima@gmail.com', 11),
(13, 'Teacher', '123', '01892449304', 'mrinal@gmail.com', 12),
(14, 'Teacher', '123', '01892849000', 'pronab@gmail.com', 13),
(15, 'Teacher', '123', '01772849304', 'zubayer@gmail.com', 14),
(16, 'Teacher', '123', '01999999304', 'hanif@gmail.com', 15),
(17, 'Teacher', '123', '01892841234', 'sahadat@gmail.com', 16),
(18, 'Teacher', '123', '01929493854', 'shafik@gmail.com', 17),
(19, 'Student', '123', '01722452411', 'wafi@example.com', 18),
(20, 'Student', '123', '01909872411', 'tanvir@example.com', 19),
(21, 'Student', '123', '01923451111', 'munna@example.com', 20),
(22, 'Student', '123', '01625352749', 'risty@example.com', 21),
(23, 'Student', '123', '01923999411', 'shawon@example.com', 22),
(24, 'Student', '123', '01843452411', 'arafat@example.com', 23),
(25, 'Student', '123', '01678452411', 'niyaz@example.com', 24),
(26, 'Student', '123', '01888452411', 'sadik@example.com', 25),
(27, 'Student', '123', '01321452411', 'tawsif@example.com', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `drop_table`
--
ALTER TABLE `drop_table`
  ADD PRIMARY KEY (`Drop_ID`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_Id`);

--
-- Indexes for table `humanresource`
--
ALTER TABLE `humanresource`
  ADD PRIMARY KEY (`HRID`);

--
-- Indexes for table `leave_table`
--
ALTER TABLE `leave_table`
  ADD PRIMARY KEY (`Leave_ID`);

--
-- Indexes for table `libraryresource`
--
ALTER TABLE `libraryresource`
  ADD PRIMARY KEY (`ResourceID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`RegisterID`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`ResourceID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_id`);

--
-- Indexes for table `student_financial`
--
ALTER TABLE `student_financial`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `drop_table`
--
ALTER TABLE `drop_table`
  MODIFY `Drop_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_table`
--
ALTER TABLE `leave_table`
  MODIFY `Leave_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `libraryresource`
--
ALTER TABLE `libraryresource`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_financial`
--
ALTER TABLE `student_financial`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
