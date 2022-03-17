-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 01:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logbook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_frisched`
--

CREATE TABLE `tbl_frisched` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `year17` varchar(30) NOT NULL,
  `section17` varchar(30) NOT NULL,
  `subject17` text NOT NULL,
  `starttime17` varchar(20) NOT NULL,
  `endtime17` varchar(20) NOT NULL,
  `year18` varchar(30) NOT NULL,
  `section18` varchar(30) NOT NULL,
  `subject18` text NOT NULL,
  `starttime18` varchar(20) NOT NULL,
  `endtime18` varchar(20) NOT NULL,
  `year19` varchar(30) NOT NULL,
  `section19` varchar(30) NOT NULL,
  `subject19` text NOT NULL,
  `starttime19` varchar(20) NOT NULL,
  `endtime19` varchar(20) NOT NULL,
  `year20` varchar(30) NOT NULL,
  `section20` varchar(30) NOT NULL,
  `subject20` text NOT NULL,
  `starttime20` varchar(20) NOT NULL,
  `endtime20` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_frisched`
--

INSERT INTO `tbl_frisched` (`id`, `users_id`, `email`, `first_name`, `last_name`, `school_year`, `semester`, `year17`, `section17`, `subject17`, `starttime17`, `endtime17`, `year18`, `section18`, `subject18`, `starttime18`, `endtime18`, `year19`, `section19`, `subject19`, `starttime19`, `endtime19`, `year20`, `section20`, `subject20`, `starttime20`, `endtime20`) VALUES
(1, 90, 'inja.hwang@up.phinma.edu.ph', 'Inyeop', 'Hwang', '2020-2021', 'First Semester                ', '\n					Third Year				', 'Block-4', '\n					SSP-007 Student Success Program 3				', '08:00 AM', '09:00 AM', '\n					Second Year				', 'Block-3', '\n					ITE-292 Networking 1				', '09:00 AM', '11:00 AM', '\n					Second Year				', 'Block-4', '\n					ITE-235 Game Development (Systems Development Track)				', '01:00 PM', '03:00 PM', '\n					Fourth Year				', 'Block-1', '\n					SSP-009 Student Success Program 5				', '03:00 PM', '04:00 PM'),
(2, 91, 'chle.park@up.phinma.edu.ph', 'Chanyeol', 'Park', '2020-2021', 'First Semester                ', '\n					Second Year				', 'Block-5', '\n					ITE-048 Discrete Structures				', '06:33 PM', '06:36 PM', '\n					Third Year				', 'Block-4', '\n					ITE-306 Integrative Programming and Technologies				', '06:36 PM', '06:39 PM', '\n					First Year				', 'Block-2', '\n					ITE-288 Introduction to Computing				', '06:39 PM', '06:42 PM', '\n					Fourth Year				', 'Block-1', '\n					ITE-351 New Venture Creation				', '06:42 PM', '06:45 PM'),
(3, 92, 'arfe.grencio@up.phinma.edu.ph', 'Arleah', 'Grencio', '2020-2021', 'Second Semester               ', '\n					Second Year				', 'Block-1', '\n					BAM-179 Business Process Outsourcing 101 (Service Culture Track)				', '09:46 PM', '09:55 PM', '\r\n', '', '\r\n', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 93, 'alal.esteves@up.phinma.edu.ph', 'Alicia', 'Esteves', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 94, 'aucr.alipio@up.phinma.edu.ph', 'Aurora', 'Alipio', '2020-2021', 'First Semester                ', '', '', '', '', '', '', '', '', '', '', '\n					Second Year				', 'Block-2', '\n					ITE-048 Discrete Structures				', '01:00 PM', '03:00 PM', '\n					Second Year				', 'Block-4', '\n					ITE-048 Discrete Structures				', '03:00 PM', '05:00 PM'),
(6, 95, 'vioh.cassano@up.phinma.edu.ph', 'Vincenzo', 'Cassano', '2020-2021', 'First Semester                ', '\n					Fourth Year				', 'Block-1', '\n					ITE-322 Managing IT Resources				', '07:30 AM', '09:30 AM', '\n					Third Year				', 'Block-4', '\n					ITE-307 Quantitative Methods				', '09:30 AM', '11:30 AM', '\n					Second Year				', 'Block-4', '\n					ITE-031 Data Structures and Algorithms				', '01:00 PM', '03:00 PM', '\n					First Year				', 'Block-5', '\n					ITE-288 Introduction to Computing				', '03:00 PM', '05:00 PM'),
(7, 96, 'juandelacruz@gmail.com', 'Juan', 'Dela Cruz', '2020-2021', 'Second Semester               ', '\n					First Year				', 'Block-1', '\n					ITE-291 Human Computer Interaction				', '07:30 AM', '09:30 AM', '\n					Second Year				', 'Block-4', '\n					ITE-303 Systems Integration and Architecture 1				', '09:30 AM', '11:30 AM', '\n					Third Year				', 'Block-2', '\n					ITE-305 Information Assurance and Security 2				', '12:00 PM', '01:00 PM', '', '', '', '', ''),
(9, 98, 'mago.castulo@up.phinma.edu.ph', 'Margeorie', 'Castulo', '2020-2021', 'Second Semester               ', '\n					Second Year				', 'Block-6', '\n					ITE-232 Advanced Web Development 1 (Web Development Track)				', '07:30 AM', '09:30 AM', '\n					Second Year				', 'Block-1', '\n					ITE-302 Information Assurance and Security 1				', '09:30 AM', '11:30 AM', '\n					Third Year				', 'Block-2', '\n					ITE-150 3D Animation (Animation and Multimedia Track)				', '01:00 PM', '03:00 PM', '\n					Third Year				', 'Block-6', '\n					ITE-335 Platform Technologies (Systems and Web Development Track)				', '03:00 PM', '05:00 PM'),
(11, 100, 'salu.santos@up.phinma.edu.ph', 'Samantha', 'Santos', '2019-2020', 'First Semester                ', '\n					Third Year				', 'Block-1', '\n					ITE-307 Quantitative Methods				', '07:30 AM', '09:30 AM', '\n					Fourth Year				', 'Block-6', '\n					ITE-322 Managing IT Resources				', '09:30 AM', '11:30 AM', '\n					Second Year				', 'Block-2', '\n					ITE-300 Object Oriented Programming				', '01:00 PM', '03:00 PM', '\n					First Year				', 'Block-6', '\n					ITE-260 Computer Programming 1				', '03:00 PM', '05:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(200) NOT NULL,
  `users_id` int(11) NOT NULL,
  `schoolyear` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `date_uploaded` varchar(200) NOT NULL,
  `time_uploaded` varchar(200) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email_address` varchar(150) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `request_letter` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`leave_id`, `users_id`, `schoolyear`, `semester`, `date_uploaded`, `time_uploaded`, `full_name`, `email_address`, `start_date`, `end_date`, `request_letter`) VALUES
(62, 96, '2020-2021', 'Second Semester', '26-05-2021', '11:29:40 AM', 'Juan  Dela Cruz', 'juandelacruz@gmail.com', '28-05-2021', '29-05-2021', 'upload/bbf.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monsched`
--

CREATE TABLE `tbl_monsched` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `year1` varchar(30) NOT NULL,
  `section1` varchar(30) NOT NULL,
  `subject1` text NOT NULL,
  `starttime1` varchar(20) NOT NULL,
  `endtime1` varchar(20) NOT NULL,
  `year2` varchar(30) NOT NULL,
  `section2` varchar(30) NOT NULL,
  `subject2` text NOT NULL,
  `starttime2` varchar(20) NOT NULL,
  `endtime2` varchar(20) NOT NULL,
  `year3` varchar(30) NOT NULL,
  `section3` varchar(30) NOT NULL,
  `subject3` text NOT NULL,
  `starttime3` varchar(20) NOT NULL,
  `endtime3` varchar(20) NOT NULL,
  `year4` varchar(30) NOT NULL,
  `section4` varchar(30) NOT NULL,
  `subject4` text NOT NULL,
  `starttime4` varchar(20) NOT NULL,
  `endtime4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_monsched`
--

INSERT INTO `tbl_monsched` (`id`, `users_id`, `email`, `first_name`, `last_name`, `school_year`, `semester`, `year1`, `section1`, `subject1`, `starttime1`, `endtime1`, `year2`, `section2`, `subject2`, `starttime2`, `endtime2`, `year3`, `section3`, `subject3`, `starttime3`, `endtime3`, `year4`, `section4`, `subject4`, `starttime4`, `endtime4`) VALUES
(17, 90, 'inja.hwang@up.phinma.edu.ph', 'Inyeop', 'Hwang', '2019-2020', 'Second Semester               ', '\n					Second Year				', 'Block-3', '\n					ITE-304 Networking 2				', '07:30 AM', '09:30 AM', '\n					First Year				', 'Block-4', '\n					ITE-291 Human Computer Interaction				', '09:30 AM', '11:30 AM', '\n					Third Year				', 'Block-2', '\n					ITE-310 Capstone Project and Research 2				', '01:00 PM', '03:00 PM', '\n					Second Year				', 'Block-4', '\r\n					ITE-304 Networking 2				', '03:00 PM', '05:00 PM'),
(18, 91, 'chle.park@up.phinma.edu.ph', 'Chanyeol', 'Park', '2019-2020', 'Second Semester               ', '\n					First Year				', 'Block-1', '\n					ITE-291 Human Computer Interaction				', '07:30 AM', '09:30 AM', '\n					Third Year				', 'Block-3', '\n					ITE-293 Systems Administration and Maintenance				', '09:30 AM', '11:30 AM', '\n					Second Year				', 'Block-4', '\n					ITE-304 Networking 2				', '01:00 PM', '03:00 PM', '\n					Second Year				', 'Block-1', '\n					ITE-303 Systems Integration and Architecture 1				', '03:00 PM', '05:00 PM'),
(19, 92, 'arfe.grencio@up.phinma.edu.ph', 'Arleah', 'Grencio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ' ', '', '', '', ''),
(20, 93, 'alal.esteves@up.phinma.edu.ph', 'Alicia', 'Esteves', '2020-2021', 'Second Semester               ', '\n					First Year				', 'Block-1', '\n					ITE-186 Computer Programming 2				', '10:10 PM', '10:14 PM', '\n					Second Year				', 'Block-2', '\n					ITE-302 Information Assurance and Security 1				', '10:14 PM', '10:18 PM', '\n					Third Year				', 'Block-3', '\n					ITE-310 Capstone Project and Research 2				', '10:18 PM', '10:22 PM', '\n					First Year				', 'Block-4', '\n					ITE-186 Computer Programming 2				', '10:22 PM', '10:26 PM'),
(21, 94, 'aucr.alipio@up.phinma.edu.ph', 'Aurora', 'Alipio', '2019-2020', 'Second Semester               ', '\n					First Year				', 'Block-3', '\n					ITE-186 Computer Programming 2				', '07:48 PM', '07:51 PM', '\n					Third Year				', 'Block-4', '\n					ITE-335 Platform Technologies (Systems and Web Development Track)				', '08:03 PM', '08:07 PM', '\n					Second Year				', 'Block-1', '\n					BAM-179 Business Process Outsourcing 101 (Service Culture Track)				', '09:30 PM', '10:30 PM', '', '', '', '', ''),
(22, 95, 'vioh.cassano@up.phinma.edu.ph', 'Vincenzo', 'Cassano', '2020-2021', 'First Semester                ', '\n					First Year				', 'Block-3', '\n					ITE-288 Introduction to Computing				', '07:30 AM', '09:30 AM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 96, 'juandelacruz@gmail.com', 'Juan', 'Dela Cruz', '2020-2021', 'First Semester                ', '\n					Second Year				', 'Block-4', '\n					ITE-048 Discrete Structures				', '07:30 PM', '09:30 PM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 98, 'mago.castulo@up.phinma.edu.ph', 'Margeorie', 'Castulo', '2020-2021', 'Second Semester               ', '\n					First Year				', 'Block-3', '\n					ITE-186 Computer Programming 2				', '11:18 AM', '11:20 AM', '\n					Second Year				', 'Block-5', '\n					ITE-115 Advanced Programming (Systems Development Track)				', '11:20 AM', '11:22 AM', '\n					Third Year				', 'Block-5', '\n					ITE-333 Intelligent Systems (Systems and Web Development Track)				', '11:22 AM', '11:24 AM', '\n					Third Year				', 'Block-2', '\n					SSP-008 Student Success Program 4				', '11:24 AM', '11:26 AM'),
(27, 100, 'salu.santos@up.phinma.edu.ph', 'Samantha', 'Santos', '2020-2021', 'Second Semester               ', '\n					First Year				', 'Block-6', '\n					ITE-186 Computer Programming 2				', '08:00 PM', '08:04 PM', '\n					Third Year				', 'Block-5', '\n					ITE-150 3D Animation (Animation and Multimedia Track)				', '08:05 PM', '08:09 PM', '\n					Second Year				', 'Block-4', '\n					ITE-303 Systems Integration and Architecture 1				', '08:09 PM', '08:13 PM', '\n					First Year				', 'Block-2', '\n					ITE-186 Computer Programming 2				', '08:13 PM', '08:16 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_records`
--

CREATE TABLE `tbl_records` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `users_id` int(11) NOT NULL,
  `schoolyear` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `subject` text NOT NULL,
  `section` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_in` varchar(11) NOT NULL,
  `current_in` varchar(50) NOT NULL,
  `time_out` varchar(11) NOT NULL,
  `current_out` varchar(50) NOT NULL,
  `dateMonth` varchar(20) NOT NULL,
  `dateToday` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_records`
--

INSERT INTO `tbl_records` (`id`, `email`, `users_id`, `schoolyear`, `semester`, `subject`, `section`, `time_stamp`, `time_in`, `current_in`, `time_out`, `current_out`, `dateMonth`, `dateToday`) VALUES
(358, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-186 Computer Programming 2				', 'Block-5', '2021-05-26 02:39:20', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '25-05-2021'),
(359, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-336 Freehand and Digital Drawing (Animation or Multimedia Track)				', 'Block-6', '2021-05-26 02:39:39', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '25-05-2021'),
(360, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-340 Embedded System Design (Internet of Things Track)				', 'Block-5', '2021-05-26 02:39:59', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '25-05-2021'),
(361, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-115 Advanced Programming (Systems Development Track)				', 'Block-1', '2021-05-26 02:40:11', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '25-05-2021'),
(362, 'inja.hwang@up.phinma.edu.ph', 90, '2020-2021', 'First Semester                ', '\n					ITE-351 New Venture Creation				 ', 'Block-5', '2021-05-26 02:40:53', 'ONTIME', '10:00 PM', 'OT', '10:04 PM', 'May', '25-05-2021'),
(363, 'inja.hwang@up.phinma.edu.ph', 90, '2020-2021', 'First Semester                ', '\n					ITE-288 Introduction to Computing				 ', 'Block-2', '2021-05-26 02:41:04', 'ONTIME', '10:05 PM', 'OT', '10:08 PM', 'May', '25-05-2021'),
(364, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'First Semester                ', '\n					SSP-009 Student Success Program 5				 ', 'Block-2', '2021-05-26 02:41:20', 'ONTIME', '10:08 PM', 'OT', '10:12 PM', 'May', '25-05-2021'),
(365, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'First Semester                ', '\n					ITE-314 Advanced Database Systems				 ', 'Block-4', '2021-05-26 02:41:36', 'ONTIME', '10:13 PM', 'OT', '10:16 PM', 'May', '25-05-2021'),
(366, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'First Semester                ', '\n					ITE-288 Introduction to Computing				 ', 'Block-3', '2021-05-26 02:41:50', 'ONTIME', '10:16 PM', 'COMPLETE', '10:19 PM', 'May', '25-05-2021'),
(367, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'First Semester                ', '\n					ITE-299 Ethics (Including Social and Professional Issues)				 ', 'Block-1', '2021-05-26 02:42:02', 'ONTIME', '10:20 PM', 'COMPLETE', '10:23 PM', 'May', '25-05-2021'),
(368, 'inja.hwang@up.phinma.edu.ph', 90, '2020-2021', 'First Semester                ', '\n					ITE-299 Ethics (Including Social and Professional Issues)				', 'Block-4', '2021-05-26 02:36:02', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '26-05-2021'),
(369, 'inja.hwang@up.phinma.edu.ph', 90, '2020-2021', 'First Semester                ', '\n					ITE-308 Web Systems and Technologies				 ', 'Block-4', '2021-05-26 03:31:22', 'LATE', '10:25 AM', 'OT', '11:31 AM', 'May', '26-05-2021'),
(370, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-186 Computer Programming 2				 ', 'Block-2', '2021-05-26 03:23:12', 'LATE', '10:28 AM', 'COMPLETE', '11:23 AM', 'May', '26-05-2021'),
(371, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'Second Semester               ', '\n					ITE-298 Information Management				', 'Block-2', '2021-05-26 02:38:18', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '26-05-2021'),
(372, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'Second Semester               ', '\n					ITE-291 Human Computer Interaction				 ', 'Block-4', '2021-05-26 03:32:48', 'LATE', '10:30 AM', 'OT', '11:32 AM', 'May', '26-05-2021'),
(373, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-186 Computer Programming 2				', 'Block-3', '2021-05-26 03:21:38', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '26-05-2021'),
(374, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-115 Advanced Programming (Systems Development Track)				', 'Block-5', '2021-05-26 03:23:18', 'ABSENT', 'ABSENT', 'ABSENT', 'ABSENT', 'May', '26-05-2021'),
(375, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					ITE-333 Intelligent Systems (Systems and Web Development Track)				 ', 'Block-5', '2021-05-26 03:24:15', 'ONTIME', '11:23 AM', 'OT', '11:24 AM', 'May', '26-05-2021'),
(376, 'mago.castulo@up.phinma.edu.ph', 98, '2020-2021', 'Second Semester               ', '\n					SSP-008 Student Success Program 4				 ', 'Block-2', '2021-05-26 03:26:29', 'ONTIME', '11:24 AM', 'OT', '11:26 AM', 'May', '26-05-2021'),
(377, 'juandelacruz@gmail.com', 96, '2020-2021', 'Second Semester', 'WHOLE DAY', 'WHOLE DAY', '2021-05-26 03:29:40', 'ONLEAVE', 'ONLEAVE', 'ONLEAVE', 'ONLEAVE', 'May', '28-05-2021'),
(378, 'juandelacruz@gmail.com', 96, '2020-2021', 'Second Semester', 'WHOLE DAY', 'WHOLE DAY', '2021-05-26 03:29:40', 'ONLEAVE', 'ONLEAVE', 'ONLEAVE', 'ONLEAVE', 'May', '29-05-2021'),
(379, 'inja.hwang@up.phinma.edu.ph', 90, '2020-2021', 'First Semester                ', '\n					ITE-351 New Venture Creation				 ', 'Block-2', '2021-05-26 05:47:40', 'LATE', '1:47 PM', '', '', 'May', '26-05-2021'),
(380, 'salu.santos@up.phinma.edu.ph', 100, '2019-2020', 'Second Semester               ', '\n					ITE-291 Human Computer Interaction				 ', 'Block-2', '2021-05-26 05:51:20', 'LATE', '1:51 PM', '', '', 'May', '26-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`id`, `semester`) VALUES
(1, 'First Semester'),
(2, 'Second Semester'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `year_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `subject`, `year_id`, `semester_id`) VALUES
(2, 'ITE-288 Introduction to Computing', 1, 1),
(3, 'ITE-260 Computer Programming 1', 1, 1),
(4, 'none', 1, 1),
(5, 'ITE-186 Computer Programming 2', 2, 2),
(6, 'ITE-291 Human Computer Interaction', 2, 2),
(7, 'none', 2, 1),
(8, 'ITE-299 Ethics (Including Social and Professional Issues)', 3, 1),
(9, 'ITE-048 Discrete Structures', 3, 1),
(10, 'ITE-031 Data Structures and Algorithms', 3, 1),
(11, 'ITE-300 Object Oriented Programming', 3, 1),
(12, 'ITE-292 Networking 1', 3, 1),
(13, 'SSP-005 Student Success Program 1', 3, 1),
(14, 'none', 3, 1),
(15, 'ITE-298 Information Management', 4, 2),
(16, 'ITE-302 Information Assurance and Security 1', 4, 2),
(17, 'ITE-303 Systems Integration and Architecture 1', 4, 2),
(18, 'ITE-304 Networking 2', 4, 2),
(19, 'SSP-006 Student Success Program 2', 4, 2),
(20, 'ITE-115 Advanced Programming (Systems Development Track)', 4, 2),
(21, 'ITE-232 Advanced Web Development 1 (Web Development Track)', 4, 2),
(22, 'ITE-336 Freehand and Digital Drawing (Animation or Multimedia Track)', 4, 2),
(23, 'BAM-179 Business Process Outsourcing 101 (Service Culture Track)', 4, 2),
(24, 'ITE-338 Principles of Robotics (Internet of Things Track)', 4, 2),
(25, 'none', 4, 2),
(26, 'ITE-301 Application Development and Emerging Technologies', 5, 1),
(27, 'ITE-314 Advanced Database Systems', 5, 1),
(28, 'ITE-307 Quantitative Methods', 5, 1),
(29, 'ITE-306 Integrative Programming and Technologies', 5, 1),
(30, 'ITE-308 Web Systems and Technologies', 5, 1),
(31, 'ITE-309 Capstone Research and Project 1', 5, 1),
(32, 'SSP-007 Student Success Program 3', 5, 1),
(33, 'ITE-235 Game Development (Systems Development Track)', 5, 1),
(34, 'ITE-233 Advanced Web Development 2 (Web Development Track)', 5, 1),
(35, 'ITE-239 Key Drawing (Animation or Multimedia Track)', 5, 1),
(36, 'BAM-180 Business Process Outsourcing 102 (Service Culture Track)', 5, 1),
(37, 'ITE-339 Internet of Things Architecture, Protocol and Applications (Internet of Things Track)', 5, 1),
(44, 'none', 5, 1),
(45, 'ITE-293 Systems Administration and Maintenance', 6, 2),
(46, 'ITE-305 Information Assurance and Security 2', 6, 2),
(47, 'ITE-310 Capstone Project and Research 2', 6, 2),
(48, 'SSP-008 Student Success Program 4', 6, 2),
(49, 'ITE-335 Platform Technologies (Systems and Web Development Track)', 6, 2),
(50, 'ITE-333 Intelligent Systems (Systems and Web Development Track)', 6, 2),
(51, 'ITE-150 3D Animation (Animation and Multimedia Track)', 6, 2),
(52, 'ITE-214 Clean-Up and In-Between Drawing (Animation and Multimedia Track)', 6, 2),
(53, 'ITE-337 Service Culture (Service Culture Track)', 6, 2),
(54, 'BAM-178 Systems Thinking (Service Culture Track)', 6, 2),
(55, 'ECE-033 Basic Electronics (Internet of Things Track)', 6, 2),
(56, 'ITE-340 Embedded System Design (Internet of Things Track)', 6, 2),
(57, 'none', 6, 2),
(58, 'ITE-322 Managing IT Resources', 7, 1),
(59, 'ITE-351 New Venture Creation', 7, 1),
(60, 'SSP-009 Student Success Program 5', 7, 1),
(61, 'none', 7, 1),
(62, 'ITE-311 Information Technology Practicum', 8, 3),
(63, 'none', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thursched`
--

CREATE TABLE `tbl_thursched` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `year13` varchar(30) NOT NULL,
  `section13` varchar(30) NOT NULL,
  `subject13` text NOT NULL,
  `starttime13` varchar(20) NOT NULL,
  `endtime13` varchar(20) NOT NULL,
  `year14` varchar(30) NOT NULL,
  `section14` varchar(30) NOT NULL,
  `subject14` text NOT NULL,
  `starttime14` varchar(20) NOT NULL,
  `endtime14` varchar(20) NOT NULL,
  `year15` varchar(30) NOT NULL,
  `section15` varchar(30) NOT NULL,
  `subject15` text NOT NULL,
  `starttime15` varchar(20) NOT NULL,
  `endtime15` varchar(20) NOT NULL,
  `year16` varchar(30) NOT NULL,
  `section16` varchar(30) NOT NULL,
  `subject16` text NOT NULL,
  `starttime16` varchar(20) NOT NULL,
  `endtime16` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_thursched`
--

INSERT INTO `tbl_thursched` (`id`, `users_id`, `email`, `first_name`, `last_name`, `school_year`, `semester`, `year13`, `section13`, `subject13`, `starttime13`, `endtime13`, `year14`, `section14`, `subject14`, `starttime14`, `endtime14`, `year15`, `section15`, `subject15`, `starttime15`, `endtime15`, `year16`, `section16`, `subject16`, `starttime16`, `endtime16`) VALUES
(1, 90, 'inja.hwang@up.phinma.edu.ph', 'Inyeop', 'Hwang', '2020-2021', 'First Semester                ', '\n					Third Year				', 'Block-4', '\n					ITE-308 Web Systems and Technologies				', '07:30 AM', '09:30 AM', '\n					First Year				', 'Block-2', '\n					ITE-288 Introduction to Computing				', '09:30 AM', '11:30 AM', '\n					Fourth Year				', 'Block-2', '\n					ITE-351 New Venture Creation				', '01:00 PM', '03:00 PM', '\n					Second Year				', 'Block-4', '\n					SSP-005 Student Success Program 1				', '03:00 PM', '04:00 PM'),
(2, 91, 'chle.park@up.phinma.edu.ph', 'Chanyeol', 'Park', '2020-2021', 'First Semester                ', '\n					Fourth Year				', 'Block-3', '\n					ITE-322 Managing IT Resources				', '08:00 PM', '08:06 PM', '\n					Third Year				', 'Block-1', '\n					ITE-307 Quantitative Methods				', '08:06 PM', '08:09 PM', '\n					Second Year				', 'Block-5', '\n					ITE-031 Data Structures and Algorithms				', '08:09 PM', '08:12 PM', '\n					First Year				', 'Block-2', '\n					ITE-288 Introduction to Computing				', '08:12 PM', '08:15 PM'),
(3, 92, 'arfe.grencio@up.phinma.edu.ph', 'Arleah', 'Grencio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 93, 'alal.esteves@up.phinma.edu.ph', 'Alicia', 'Esteves', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 94, 'aucr.alipio@up.phinma.edu.ph', 'Aurora', 'Alipio', '2019-2020', 'First Semester                ', '\n					First Year				', 'Block-5', '\n					ITE-288 Introduction to Computing				', '06:48 PM', '06:54 PM', '\n					Second Year				', 'Block-1', '\n					ITE-300 Object Oriented Programming				', '06:54 PM', '06:58 PM', '\n					Fourth Year				', 'Block-4', '\n					ITE-351 New Venture Creation				', '06:58 PM', '07:01 PM', '\n					Third Year				', 'Block-2', '\n					ITE-308 Web Systems and Technologies				', '07:08 PM', '07:15 PM'),
(6, 95, 'vioh.cassano@up.phinma.edu.ph', 'Vincenzo', 'Cassano', '2020-2021', 'Second Semester               ', '\n					First Year				', 'Block-3', '\n					ITE-186 Computer Programming 2				', '01:00 AM', '01:05 AM', '\n					Second Year				', 'Block-3', '\n					ITE-232 Advanced Web Development 1 (Web Development Track)				', '01:05 AM', '01:10 AM', '\n					Second Year				', 'Block-5', '\n					ITE-232 Advanced Web Development 1 (Web Development Track)				', '01:10 AM', '01:15 AM', '\n					Third Year				', 'Block-6', '\n					ITE-335 Platform Technologies (Systems and Web Development Track)				', '01:15 AM', '01:20 AM'),
(7, 96, 'juandelacruz@gmail.com', 'Juan', 'Dela Cruz', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 98, 'mago.castulo@up.phinma.edu.ph', 'Margeorie', 'Castulo', '2020-2021', 'Second Semester               ', '\n					Second Year				', 'Block-4', '\n					SSP-006 Student Success Program 2				', '08:00 AM', '09:00 AM', '\n					Third Year				', 'Block-5', '\n					ITE-310 Capstone Project and Research 2				', '09:00 AM', '11:00 AM', '', '', '', '', '', 'Second Year', 'Block-2', ' 					ITE-351 New Venture Creation				', '03:00 PM', '05:00 PM'),
(11, 100, 'salu.santos@up.phinma.edu.ph', 'Samantha', 'Santos', '2020-2021', 'Second Semester               ', '\n					Third Year				', 'Block-5', '\n					BAM-178 Systems Thinking (Service Culture Track)				', '07:30 AM', '09:30 AM', '\n					First Year				', 'Block-1', '\n					ITE-291 Human Computer Interaction				', '09:30 AM', '11:30 AM', '\n					Second Year				', 'Block-5', '\n					ITE-115 Advanced Programming (Systems Development Track)				', '01:00 PM', '03:00 PM', '\n					Third Year				', 'Block-3', '\n					ITE-333 Intelligent Systems (Systems and Web Development Track)				', '03:00 PM', '05:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tuesched`
--

CREATE TABLE `tbl_tuesched` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `year5` varchar(30) NOT NULL,
  `section5` varchar(30) NOT NULL,
  `subject5` text NOT NULL,
  `starttime5` varchar(20) NOT NULL,
  `endtime5` varchar(20) NOT NULL,
  `year6` varchar(30) NOT NULL,
  `section6` varchar(30) NOT NULL,
  `subject6` text NOT NULL,
  `starttime6` varchar(20) NOT NULL,
  `endtime6` varchar(20) NOT NULL,
  `year7` varchar(30) NOT NULL,
  `section7` varchar(30) NOT NULL,
  `subject7` text NOT NULL,
  `starttime7` varchar(20) NOT NULL,
  `endtime7` varchar(20) NOT NULL,
  `year8` varchar(30) NOT NULL,
  `section8` varchar(30) NOT NULL,
  `subject8` text NOT NULL,
  `starttime8` varchar(20) NOT NULL,
  `endtime8` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tuesched`
--

INSERT INTO `tbl_tuesched` (`id`, `users_id`, `email`, `first_name`, `last_name`, `school_year`, `semester`, `year5`, `section5`, `subject5`, `starttime5`, `endtime5`, `year6`, `section6`, `subject6`, `starttime6`, `endtime6`, `year7`, `section7`, `subject7`, `starttime7`, `endtime7`, `year8`, `section8`, `subject8`, `starttime8`, `endtime8`) VALUES
(1, 90, 'inja.hwang@up.phinma.edu.ph', 'Inyeop', 'Hwang', '2020-2021', 'First Semester                ', '\n					Fourth Year				', 'Block-5', '\n					ITE-351 New Venture Creation				', '10:00 PM', '10:04 PM', '\n					First Year				', 'Block-2', '\n					ITE-288 Introduction to Computing				', '10:04 PM', '10:08 PM', '', '', '', '', '', '', '', '', '', ''),
(2, 91, 'chle.park@up.phinma.edu.ph', 'Chanyeol', 'Park', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 92, 'arfe.grencio@up.phinma.edu.ph', 'Arleah', 'Grencio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 93, 'alal.esteves@up.phinma.edu.ph', 'Alicia', 'Esteves', '2019-2020', 'First Semester', 'First Year', 'Block-3', 'ITE-291 Introduction to Computing', '07:30 AM', '09:30 AM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 94, 'aucr.alipio@up.phinma.edu.ph', 'Aurora', 'Alipio', '2020-2021', 'Second Semester               ', '\n					Third Year				', 'Block-3', '\n					ITE-293 Systems Administration and Maintenance				', '01:30 AM', '01:45 AM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 95, 'vioh.cassano@up.phinma.edu.ph', 'Vincenzo', 'Cassano', '2020-2021', 'Second Semester               ', '\n					Second Year				', 'Block-4', '\n					SSP-006 Student Success Program 2				', '03:52 AM', '03:55 AM', '\n					Second Year				', 'Block-1', '\n					ITE-303 Systems Integration and Architecture 1				', '03:56 AM', '03:58 AM', '\n					Third Year				', 'Block-5', '\n					ITE-305 Information Assurance and Security 2				', '04:00 AM', '04:02 AM', '\n					First Year				', 'Block-3', '\n					ITE-291 Human Computer Interaction				', '04:03 AM', '04:05 AM'),
(7, 96, 'juandelacruz@gmail.com', 'Juan', 'Dela Cruz', '2020-2021', 'First Semester                ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '\n					Second Year				', 'Block-3', '\n					ITE-048 Discrete Structures				', '05:00 PM', '07:00 PM'),
(9, 98, 'mago.castulo@up.phinma.edu.ph', 'Margeorie', 'Castulo', '2020-2021', 'Second Semester               ', '\n					First Year				', 'Block-5', '\n					ITE-186 Computer Programming 2				', '11:26 AM', '11:28 AM', '\n					Second Year				', 'Block-6', '\n					ITE-336 Freehand and Digital Drawing (Animation or Multimedia Track)				', '11:28 AM', '11:30 AM', '\n					Third Year				', 'Block-5', '\n					ITE-340 Embedded System Design (Internet of Things Track)				', '01:00 PM', '03:00 PM', '\n					Second Year				', 'Block-1', '\n					ITE-115 Advanced Programming (Systems Development Track)				', '03:00 PM', '05:00 PM'),
(11, 100, 'salu.santos@up.phinma.edu.ph', 'Samantha', 'Santos', '2019-2020', 'First Semester                ', '\n					Fourth Year				', 'Block-2', '\n					SSP-009 Student Success Program 5				', '10:08 PM', '10:12 PM', '\n					Third Year				', 'Block-4', '\n					ITE-314 Advanced Database Systems				', '10:12 PM', '10:16 PM', '\n					First Year				', 'Block-3', '\n					ITE-288 Introduction to Computing				', '10:16 PM', '10:20 PM', '\n					Second Year				', 'Block-1', '\n					ITE-299 Ethics (Including Social and Professional Issues)				', '10:20 PM', '10:24 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `usertype`, `username`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'admin', 'admin123', 'kaylafaithesteves@yahoo.com', 'Kayla', 'Esteves', '$2y$10$lfCFI71LjpMGoZg6VkXSZ.QDLBxBDTMXNjYgYSyzeW1tDxeOqAyuy'),
(90, 'teacher', '03-123-11991', 'inja.hwang@up.phinma.edu.ph', 'Inyeop', 'Hwang', '$2y$10$/Ytpy2WGpbGqJp8amX6HeOsQiFKf6TpXYbh9GNYVs/A.6Wx2PkQR.'),
(91, 'teacher', '03-123-11272', 'chle.park@up.phinma.edu.ph', 'Chanyeol', 'Park', '$2y$10$ikgc/2E5onyi.nIfW962KO6YIeJTq21HGDLSFH4ySK2j8G13fKbNm'),
(92, 'teacher', '03-123-05220', 'arfe.grencio@up.phinma.edu.ph', 'Arleah', 'Grencio', '$2y$10$I0zWI1B.wtXC5QzvyUAX3.pArYFt5iLTTenbRBY6n7sciTIiIEvVO'),
(93, 'teacher', '03-123-32165', 'alal.esteves@up.phinma.edu.ph', 'Alicia', 'Esteves', '$2y$10$DiBYji6CL7JDepY61/rH7eK5kFxtMua2jbDjuCfIU4w4WeQlc5eB6'),
(94, 'teacher', '03-123-10138', 'aucr.alipio@up.phinma.edu.ph', 'Aurora', 'Alipio', '$2y$10$gHRAyRzwrxjrWFTvCYmAVOMVmsa.I55LK8mSwqSDFz48CftZMbqOq'),
(95, 'teacher', '03-123-91995', 'vioh.cassano@up.phinma.edu.ph', 'Vincenzo', 'Cassano', '$2y$10$zBqM/BtQuqCiwr7iallfaOF7h4fP2qfw3mkyznju.vw4ZNmw0Xghi'),
(96, 'teacher', '03-123-12345', 'juandelacruz@gmail.com', 'Juan', 'Dela Cruz', '$2y$10$Gs6qJZlMkLZ7Q3HbEbs8.eBqkIJ8Vo.u76LJhJ01GuafcsSkhdGmW'),
(98, 'teacher', '03-123-11249', 'mago.castulo@up.phinma.edu.ph', 'Margeorie', 'Castulo', '$2y$10$PToQ2/Vk1r7iQXBPUVLHw.hKZInLm/kVO3Os17q/aWe.02RHo7Oqy'),
(100, 'teacher', '03-123-11259', 'salu.santos@up.phinma.edu.ph', 'Samantha', 'Santos', '$2y$10$JKjgKS8aCixTAnHfgLbLlOgtBXHIXMqEXikeCLtDLjrYLv47ALdKa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wedsched`
--

CREATE TABLE `tbl_wedsched` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `year9` varchar(30) NOT NULL,
  `section9` varchar(30) NOT NULL,
  `subject9` text NOT NULL,
  `starttime9` varchar(20) NOT NULL,
  `endtime9` varchar(20) NOT NULL,
  `year10` varchar(30) NOT NULL,
  `section10` varchar(30) NOT NULL,
  `subject10` text NOT NULL,
  `starttime10` varchar(20) NOT NULL,
  `endtime10` varchar(20) NOT NULL,
  `year11` varchar(30) NOT NULL,
  `section11` varchar(30) NOT NULL,
  `subject11` text NOT NULL,
  `starttime11` varchar(20) NOT NULL,
  `endtime11` varchar(20) NOT NULL,
  `year12` varchar(30) NOT NULL,
  `section12` varchar(30) NOT NULL,
  `subject12` text NOT NULL,
  `starttime12` varchar(20) NOT NULL,
  `endtime12` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wedsched`
--

INSERT INTO `tbl_wedsched` (`id`, `users_id`, `email`, `first_name`, `last_name`, `school_year`, `semester`, `year9`, `section9`, `subject9`, `starttime9`, `endtime9`, `year10`, `section10`, `subject10`, `starttime10`, `endtime10`, `year11`, `section11`, `subject11`, `starttime11`, `endtime11`, `year12`, `section12`, `subject12`, `starttime12`, `endtime12`) VALUES
(1, 90, 'inja.hwang@up.phinma.edu.ph', 'Inyeop', 'Hwang', '2020-2021', 'First Semester                ', '\n					Second Year				', 'Block-4', '\n					ITE-299 Ethics (Including Social and Professional Issues)				', '07:30 AM', '09:30 AM', '\n					Third Year				', 'Block-4', '\n					ITE-308 Web Systems and Technologies				', '09:30 AM', '11:30 AM', '\n					Fourth Year				', 'Block-2', '\n					ITE-351 New Venture Creation				', '01:00 PM', '03:00 PM', '\n					First Year				', 'Block-3', '\n					ITE-288 Introduction to Computing				', '03:00 PM', '05:00 PM'),
(2, 91, 'chle.park@up.phinma.edu.ph', 'Chanyeol', 'Park', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 92, 'arfe.grencio@up.phinma.edu.ph', 'Arleah', 'Grencio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 93, 'alal.esteves@up.phinma.edu.ph', 'Alicia', 'Esteves', '2019-2020', 'First Semester                ', '\n					Fourth Year				', 'Block-5', '\n					ITE-322 Managing IT Resources				', '08:45 PM', '08:48 PM', '\n					Third Year				', 'Block-3', '\n					ITE-239 Key Drawing (Animation or Multimedia Track)				', '08:48 PM', '08:51 PM', '\n					Third Year				', 'Block-4', '\n					ITE-239 Key Drawing (Animation or Multimedia Track)				', '08:51 PM', '08:54 PM', '\n					First Year				', 'Block-5', '\n					ITE-288 Introduction to Computing				', '08:55 PM', '08:59 PM'),
(5, 94, 'aucr.alipio@up.phinma.edu.ph', 'Aurora', 'Alipio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 95, 'vioh.cassano@up.phinma.edu.ph', 'Vincenzo', 'Cassano', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 96, 'juandelacruz@gmail.com', 'Juan', 'Dela Cruz', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 98, 'mago.castulo@up.phinma.edu.ph', 'Margeorie', 'Castulo', '2020-2021', 'Second Semester               ', '\n					Third Year				', '', '', '', '', '\n					First Year				', 'Block-2', '\n					ITE-186 Computer Programming 2				', '09:30 AM', '11:30 AM', '\n					Third Year				', 'Block-4', '\n					ITE-305 Information Assurance and Security 2				', '01:00 PM', '03:00 PM', '', '', '', '', ''),
(11, 100, 'salu.santos@up.phinma.edu.ph', 'Samantha', 'Santos', '2019-2020', 'Second Semester               ', '\n					Second Year				', 'Block-2', '\n					ITE-298 Information Management				', '07:30 AM', '09:30 AM', '\n					First Year				', 'Block-4', '\n					ITE-291 Human Computer Interaction				', '09:30 AM', '11:30 AM', '\n					First Year				', 'Block-2', '\n					ITE-291 Human Computer Interaction				', '01:00 PM', '03:00 PM', '\n					Second Year				', 'Block-5', '\n					ITE-304 Networking 2				', '03:00 PM', '05:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearlevel`
--

CREATE TABLE `tbl_yearlevel` (
  `id` int(11) NOT NULL,
  `yearlevel` varchar(200) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_yearlevel`
--

INSERT INTO `tbl_yearlevel` (`id`, `yearlevel`, `semester_id`) VALUES
(1, 'First Year', 1),
(2, 'First Year', 2),
(3, 'Second Year', 1),
(4, 'Second Year', 2),
(5, 'Third Year', 1),
(6, 'Third Year', 2),
(7, 'Fourth Year', 1),
(8, 'Fourth Year', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_frisched`
--
ALTER TABLE `tbl_frisched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID4` (`users_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `sesh_id` (`users_id`);

--
-- Indexes for table `tbl_monsched`
--
ALTER TABLE `tbl_monsched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`users_id`);

--
-- Indexes for table `tbl_records`
--
ALTER TABLE `tbl_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessId` (`users_id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_thursched`
--
ALTER TABLE `tbl_thursched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID3` (`users_id`);

--
-- Indexes for table `tbl_tuesched`
--
ALTER TABLE `tbl_tuesched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID1` (`users_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wedsched`
--
ALTER TABLE `tbl_wedsched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uID2` (`users_id`);

--
-- Indexes for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_frisched`
--
ALTER TABLE `tbl_frisched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_monsched`
--
ALTER TABLE `tbl_monsched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_records`
--
ALTER TABLE `tbl_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_thursched`
--
ALTER TABLE `tbl_thursched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_tuesched`
--
ALTER TABLE `tbl_tuesched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_wedsched`
--
ALTER TABLE `tbl_wedsched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_frisched`
--
ALTER TABLE `tbl_frisched`
  ADD CONSTRAINT `uID4` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `sesh_id` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_monsched`
--
ALTER TABLE `tbl_monsched`
  ADD CONSTRAINT `uid` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_records`
--
ALTER TABLE `tbl_records`
  ADD CONSTRAINT `sessId` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_thursched`
--
ALTER TABLE `tbl_thursched`
  ADD CONSTRAINT `uID3` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tuesched`
--
ALTER TABLE `tbl_tuesched`
  ADD CONSTRAINT `uID1` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wedsched`
--
ALTER TABLE `tbl_wedsched`
  ADD CONSTRAINT `uID2` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
