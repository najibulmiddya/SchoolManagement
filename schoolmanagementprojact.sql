-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 09:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagementprojact`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `datetime`) VALUES
(11, 'najibul', 'najibulmiddya11@gmail.com', '$2y$10$haHQjnJbG8ax2744awT0.O9cYoc5HxOyrPXD5aeT.j.wU74kwzsWq', '2023-07-26 20:43:45'),
(14, 'username', 'user1@gmail.com', '$2y$10$yrJPooyVhTTvYbQJittR8ujle3cYQgGWQe4CgLXmHhkaUK2UEkErG', '2023-08-11 18:12:08'),
(15, 'admin', 'admin@webdamn.com', '$2y$10$8qEFP85pDLjPnnbix76ITObzCr5UrPSgfQMDFd6N2RvFSmEuGIbm2', '2023-10-17 06:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(22) NOT NULL,
  `student_id` bigint(22) NOT NULL,
  `class_id` bigint(22) NOT NULL,
  `status` enum('','attend','absent') NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `class_id`, `status`, `date`, `created_at`, `updated_at`) VALUES
(130, 39, 19, 'attend', '2023-11-18', '2023-11-18 14:24:41', '2023-11-18 21:31:44'),
(131, 14, 20, 'attend', '2023-11-18', '2023-11-18 14:24:59', NULL),
(132, 16, 20, 'attend', '2023-11-18', '2023-11-18 14:25:02', NULL),
(133, 38, 20, 'attend', '2023-11-18', '2023-11-18 14:25:03', NULL),
(134, 43, 20, 'attend', '2023-11-18', '2023-11-18 14:25:04', NULL),
(135, 15, 21, 'attend', '2023-11-18', '2023-11-18 14:25:08', NULL),
(136, 25, 21, 'attend', '2023-11-18', '2023-11-18 14:25:09', NULL),
(137, 42, 22, 'attend', '2023-11-18', '2023-11-18 14:25:15', NULL),
(138, 40, 22, 'attend', '2023-11-18', '2023-11-18 14:25:16', NULL),
(139, 13, 28, 'attend', '2023-11-18', '2023-11-18 14:25:21', NULL),
(140, 13, 28, 'attend', '2023-11-17', '2023-11-18 14:25:30', NULL),
(141, 42, 22, 'absent', '2023-11-17', '2023-11-18 14:25:38', NULL),
(142, 40, 22, 'attend', '2023-11-17', '2023-11-18 14:25:40', NULL),
(143, 14, 20, 'attend', '2023-11-17', '2023-11-18 14:25:45', NULL),
(144, 16, 20, 'absent', '2023-11-17', '2023-11-18 14:25:46', NULL),
(145, 38, 20, 'attend', '2023-11-17', '2023-11-18 14:25:47', NULL),
(146, 43, 20, 'absent', '2023-11-17', '2023-11-18 14:25:48', NULL),
(147, 14, 20, 'attend', '2023-11-16', '2023-11-18 14:25:55', NULL),
(148, 16, 20, 'absent', '2023-11-16', '2023-11-18 14:25:57', NULL),
(149, 38, 20, 'attend', '2023-11-16', '2023-11-18 14:25:58', NULL),
(150, 43, 20, 'absent', '2023-11-16', '2023-11-18 14:26:01', NULL),
(151, 13, 28, 'attend', '2023-11-16', '2023-11-18 14:26:08', NULL),
(152, 39, 19, 'attend', '2023-11-07', '2023-11-18 20:29:42', NULL),
(153, 39, 19, 'attend', '2023-11-20', '2023-11-20 22:41:23', NULL),
(154, 38, 20, 'absent', '2023-11-20', '2023-11-20 22:41:31', NULL),
(155, 16, 20, 'attend', '2023-11-20', '2023-11-20 22:41:32', NULL),
(156, 14, 20, 'attend', '2023-11-20', '2023-11-20 22:41:34', NULL),
(157, 43, 20, 'attend', '2023-11-20', '2023-11-20 22:41:35', NULL),
(158, 39, 19, 'attend', '2023-11-24', '2023-11-24 09:47:04', NULL),
(159, 39, 19, 'attend', '2023-12-02', '2023-12-02 11:40:04', NULL),
(160, 14, 20, 'absent', '2023-12-02', '2023-12-02 18:14:37', NULL),
(161, 16, 20, 'attend', '2023-12-02', '2023-12-02 18:14:40', NULL),
(162, 38, 20, 'attend', '2023-12-02', '2023-12-02 18:14:43', NULL),
(163, 43, 20, 'absent', '2023-12-02', '2023-12-02 18:14:45', NULL),
(164, 39, 19, 'attend', '2023-12-03', '2023-12-03 09:30:01', NULL),
(165, 39, 19, 'attend', '2023-12-06', '2023-12-06 23:53:43', NULL),
(166, 14, 20, 'absent', '2023-12-06', '2023-12-06 23:54:14', NULL),
(167, 39, 19, 'attend', '2023-12-16', '2023-12-16 15:02:28', NULL),
(168, 14, 20, 'attend', '2023-12-16', '2023-12-16 15:02:33', NULL),
(169, 16, 20, 'absent', '2023-12-16', '2023-12-16 15:02:35', NULL),
(170, 38, 20, 'attend', '2023-12-16', '2023-12-16 15:02:37', NULL),
(171, 43, 20, 'absent', '2023-12-16', '2023-12-16 15:02:39', NULL),
(172, 14, 20, 'attend', '2023-12-19', '2023-12-19 19:55:59', NULL),
(173, 16, 20, 'absent', '2023-12-19', '2023-12-19 19:56:01', NULL),
(174, 38, 20, 'attend', '2023-12-19', '2023-12-19 19:56:03', NULL),
(175, 43, 20, 'absent', '2023-12-19', '2023-12-19 19:56:05', NULL),
(176, 39, 19, 'attend', '2024-01-13', '2024-01-13 20:57:55', NULL),
(177, 14, 20, 'attend', '2024-01-28', '2024-01-28 21:11:37', NULL),
(178, 16, 20, 'absent', '2024-01-28', '2024-01-28 21:11:38', NULL),
(179, 39, 19, 'attend', '2024-01-28', '2024-01-28 21:47:15', NULL),
(180, 42, 19, 'absent', '2024-01-28', '2024-01-28 21:47:17', NULL),
(181, 38, 20, 'attend', '2024-01-28', '2024-01-28 21:47:26', NULL),
(182, 43, 20, 'attend', '2024-01-28', '2024-01-28 21:47:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(22) NOT NULL,
  `class` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `created_at`, `update_at`) VALUES
(19, 'Class I', '2023-08-06 23:35:50', '2023-08-07 00:24:17'),
(20, 'Class II', '2023-08-06 23:36:11', NULL),
(21, 'Class III', '2023-08-06 23:36:29', NULL),
(22, 'Class IV', '2023-08-06 23:36:44', NULL),
(23, 'Class V', '2023-08-06 23:37:02', NULL),
(24, 'Class VI', '2023-08-06 23:37:09', NULL),
(25, 'Class VII', '2023-08-06 23:37:25', NULL),
(26, 'Class VIII', '2023-08-06 23:37:46', '2023-09-07 18:39:39'),
(27, 'Class IX', '2023-08-06 23:38:01', NULL),
(28, 'Class X', '2023-08-06 23:38:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_room`
--

INSERT INTO `class_room` (`id`, `class_id`, `room_no`, `created_at`, `update_at`) VALUES
(1, 19, 101, '2023-12-03 23:03:46', '2023-12-04 00:13:43'),
(2, 20, 102, '2023-12-03 23:06:31', '0000-00-00 00:00:00'),
(5, 28, 205, '2023-12-04 15:00:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `class_timetables`
--

CREATE TABLE `class_timetables` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `starting_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_timetables`
--

INSERT INTO `class_timetables` (`id`, `teacher_id`, `class_id`, `subject_id`, `starting_time`, `end_time`, `created_at`, `updated_at`) VALUES
(11, 8, 19, 21, '16:43:00.000000', '17:43:00.000000', '2023-11-28 15:43:24', '0000-00-00 00:00:00'),
(12, 12, 19, 23, '10:13:00.000000', '15:13:00.000000', '2023-12-03 09:14:08', '0000-00-00 00:00:00'),
(13, 8, 20, 26, '10:15:00.000000', '03:15:00.000000', '2023-12-03 09:15:26', '0000-00-00 00:00:00'),
(14, 7, 28, 1, '10:16:00.000000', '04:30:00.000000', '2023-12-03 09:16:13', '0000-00-00 00:00:00'),
(15, 8, 28, 4, '10:16:00.000000', '00:16:00.000000', '2023-12-03 09:16:46', '0000-00-00 00:00:00'),
(16, 10, 28, 6, '09:17:00.000000', '09:17:00.000000', '2023-12-03 09:17:05', '0000-00-00 00:00:00'),
(17, 11, 28, 7, '10:17:00.000000', '09:17:00.000000', '2023-12-03 09:17:22', '0000-00-00 00:00:00'),
(18, 12, 28, 8, '11:17:00.000000', '09:18:00.000000', '2023-12-03 09:17:50', '0000-00-00 00:00:00'),
(19, 10, 21, 42, '11:18:00.000000', '09:19:00.000000', '2023-12-03 09:18:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `total_number` int(10) NOT NULL,
  `months` varchar(30) NOT NULL,
  `year` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `exam_name`, `total_number`, `months`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Unit Test i', 25, 'August', 2023, '2023-10-27 14:55:51', '2023-10-31 10:16:44'),
(3, 'Test ', 100, 'July', 2023, '2023-10-28 14:10:09', '2023-10-28 14:20:19'),
(5, 'Unit Uest ii', 25, 'June', 2023, '2023-10-28 14:21:10', '2023-10-31 10:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `class_id`, `student_id`, `book_id`, `date`, `end_date`, `created_at`, `update_at`) VALUES
(8, 19, 39, 21, '06/12/2023', '2023-12-06', '2023-12-06 18:32:33', '0000-00-00 00:00:00'),
(10, 28, 13, 1, '06/12/2023', '2023-12-20', '2023-12-06 21:25:09', '2023-12-06 23:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `rest_api`
--

CREATE TABLE `rest_api` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(10) NOT NULL,
  `number` bigint(13) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rest_api`
--

INSERT INTO `rest_api` (`id`, `name`, `age`, `number`, `gender`, `created_at`) VALUES
(2, 'Najibul Middya', 23, 6295257441, 'M', '2023-12-08 20:22:12'),
(10, 'Fejauddin Middya', 22, 6295568125, 'M', '2023-12-08 23:45:53'),
(11, 'Sarfraj Alam Middya', 18, 6295568125, 'M', '2023-12-08 23:47:03'),
(15, 'Test', 23, 3265256325, 'M', '2024-01-21 19:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `class_id` int(10) NOT NULL,
  `exam_type_id` int(10) NOT NULL,
  `student_id` int(20) NOT NULL,
  `subjact_id` int(10) NOT NULL,
  `sub_total_marks` int(20) NOT NULL,
  `sub_marks` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `class_id`, `exam_type_id`, `student_id`, `subjact_id`, `sub_total_marks`, `sub_marks`, `created_at`) VALUES
(1, 28, 3, 13, 1, 100, 67, '2023-10-31 17:30:59'),
(2, 28, 3, 13, 4, 100, 75, '2023-10-31 17:31:56'),
(3, 28, 3, 13, 6, 100, 66, '2023-10-31 17:32:36'),
(4, 28, 3, 13, 7, 100, 89, '2023-10-31 17:32:56'),
(5, 28, 3, 13, 8, 100, 74, '2023-10-31 17:33:13'),
(6, 28, 3, 13, 9, 100, 91, '2023-10-31 17:33:25'),
(7, 28, 3, 13, 10, 100, 86, '2023-10-31 17:33:40'),
(8, 19, 3, 39, 21, 100, 50, '2023-11-02 09:56:45'),
(9, 19, 3, 39, 21, 100, 39, '2023-11-02 09:57:11'),
(10, 19, 3, 39, 23, 100, 66, '2023-11-02 09:57:27'),
(11, 20, 3, 14, 21, 100, 90, '2023-11-02 10:42:03'),
(12, 20, 3, 14, 22, 100, 80, '2023-11-02 10:42:23'),
(13, 20, 3, 14, 26, 100, 70, '2023-11-02 10:42:48'),
(14, 20, 3, 38, 21, 100, 20, '2023-11-02 16:57:07'),
(15, 20, 3, 38, 22, 100, 40, '2023-11-02 16:57:42'),
(16, 20, 3, 38, 23, 100, 60, '2023-11-02 16:58:10'),
(17, 20, 3, 16, 24, 100, 30, '2023-11-02 17:07:46'),
(18, 20, 3, 16, 25, 100, 55, '2023-11-02 17:08:28'),
(21, 20, 3, 25, 23, 100, 55, '2023-11-02 22:57:24'),
(22, 21, 3, 25, 25, 100, 22, '2023-11-03 00:17:18'),
(23, 21, 3, 25, 26, 100, 11, '2023-11-03 00:17:43'),
(24, 20, 3, 16, 26, 100, 44, '2023-11-04 08:58:05'),
(25, 20, 3, 43, 24, 100, 64, '2023-11-08 19:41:01'),
(26, 20, 3, 43, 25, 100, 15, '2023-11-08 19:41:23'),
(27, 20, 3, 43, 26, 100, 99, '2023-11-08 19:41:43'),
(28, 22, 3, 42, 24, 100, 39, '2023-12-02 20:59:10'),
(29, 22, 3, 42, 25, 100, 21, '2023-12-02 20:59:31'),
(30, 22, 3, 42, 26, 100, 100, '2023-12-02 20:59:57'),
(31, 28, 5, 42, 1, 25, 24, '2023-12-02 21:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `exam_type` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subjact_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `week` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `time_to` time NOT NULL,
  `year` year(4) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `exam_type`, `class_id`, `subjact_id`, `date`, `week`, `time`, `time_to`, `year`, `create_at`, `update_at`) VALUES
(3, 1, 28, 1, '2023-10-09', 'monday', '14:19:00', '12:19:00', 2023, '2023-10-30 12:19:27', '0000-00-00 00:00:00'),
(4, 1, 28, 4, '2023-10-12', 'tuesday', '14:59:00', '14:58:00', 2023, '2023-10-30 14:56:27', '0000-00-00 00:00:00'),
(5, 1, 28, 6, '2023-11-07', 'Wednesday', '03:47:00', '05:47:00', 2023, '2023-10-30 15:47:39', '0000-00-00 00:00:00'),
(6, 1, 28, 7, '2023-11-08', 'Thursday', '03:48:00', '15:50:00', 2023, '2023-10-30 15:49:06', '0000-00-00 00:00:00'),
(7, 1, 28, 8, '2023-10-10', 'Friday', '15:51:00', '15:51:00', 2023, '2023-10-30 15:49:37', '0000-00-00 00:00:00'),
(8, 1, 28, 9, '2023-11-02', 'Thursday', '15:52:00', '15:53:00', 2023, '2023-10-30 15:50:14', '0000-00-00 00:00:00'),
(9, 1, 28, 10, '2023-10-11', 'Wednesday', '15:53:00', '15:52:00', 2023, '2023-10-30 15:50:52', '0000-00-00 00:00:00'),
(10, 3, 19, 21, '2023-11-06', 'Monday', '11:00:00', '00:00:00', 2023, '2023-10-31 00:56:51', '0000-00-00 00:00:00'),
(11, 3, 19, 22, '2023-11-07', 'Tuesday', '11:00:00', '00:00:00', 2023, '2023-10-31 00:57:57', '0000-00-00 00:00:00'),
(12, 3, 19, 23, '2023-11-07', 'Tuesday', '01:00:00', '02:00:00', 2023, '2023-10-31 00:58:59', '0000-00-00 00:00:00'),
(13, 5, 20, 25, '2023-11-20', 'Friday', '10:30:00', '11:30:00', 2023, '2023-10-31 09:27:14', '0000-00-00 00:00:00'),
(14, 5, 20, 24, '2023-10-11', 'Monday', '09:30:00', '14:30:00', 2023, '2023-10-31 09:30:54', '0000-00-00 00:00:00'),
(15, 5, 20, 26, '2023-10-19', 'Thursday', '09:31:00', '13:31:00', 2023, '2023-10-31 09:31:57', '0000-00-00 00:00:00'),
(16, 3, 28, 10, '2023-12-04', 'Monday', '23:00:00', '14:30:00', 2023, '2023-12-02 20:54:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(22) NOT NULL,
  `class_id` bigint(22) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `class_id`, `name`, `email`, `mobile`, `gender`, `dob`, `photo`, `address`, `created_at`, `updated_at`) VALUES
(13, 19, 'Rojina Khatun', 'najubulmiddya1@gmail.com', '06295257441', 'Female', '2023-09-14', NULL, 'Dhuliadihi,Kalpathar', '2023-09-02 10:34:30', '2023-09-07 19:28:57'),
(14, 19, 'Najibul Middya', 'najibulmiddya11@gmail.com', '06295257441', 'Male', '2023-09-22', 'naji.jpeg', 'Dhuliadihi,Kalpathar', '2023-09-02 22:58:11', '2023-09-06 17:32:48'),
(15, 20, 'Sarfraj Alam Middya', 'sarfarajalam1420@gmail.com', '08509028992', 'Male', '2023-09-02', NULL, 'Dhuliadihi,Kalpathar', '2023-09-03 09:49:19', '2023-10-04 23:08:46'),
(16, 19, 'Fejauddin Middya', 'fyjauddinmiddya123@gmail.com', '09883703652', 'Male', '2023-09-15', NULL, 'Dhuliadihi,Kalpathar', '2023-09-03 09:49:47', '2023-10-04 23:11:56'),
(25, 19, 'Bajrul Middya', 'bajrulmiddya1@gmail.com', '06295257441', 'Male', '2023-10-06', 'baj.jpg', 'Dhuliadihi,Kalpathar', '2023-09-07 18:40:41', '2023-09-08 11:17:36'),
(32, 19, 'Suhana Khatun', 'suhanakhatun1@gmail.com', '06295257441', 'Female', '2023-09-22', 'wallpaperflare_com_wallpaper.jpg', 'Dhuliadihi,Kalpathar', '2023-09-08 11:15:10', '2023-09-08 11:18:45'),
(38, 19, 'Sara Ali', 'saraali@gmail.com', '2564587945', 'Female', '2023-10-01', NULL, 'Bankura', '2023-10-04 23:26:02', NULL),
(39, 19, 'XYZ', 'xyz@gmail.com', '06295257441', 'Male', '2023-11-03', NULL, 'Dhuliadihi,Kalpathar', '2023-10-08 11:11:37', NULL),
(40, 19, 'test api', 'testapi1@gmail.com', '06295257441', 'Female', '2023-09-14', NULL, 'Dhuliadihi,Kalpathar', '2023-10-25 19:25:39', NULL),
(42, 20, 'Asikul Middya', 'asikulmiddya141@gmail.com', '06295257441', 'Male', '2023-10-16', NULL, 'Dhuliadihi,Kalpathar', '2023-10-29 20:39:06', NULL),
(43, 19, 'Musahid Middya', 'musahidmiddya@gmail.com', '3265689464', 'Male', '2023-11-22', NULL, 'Bankura', '2023-11-08 19:39:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_admission`
--

CREATE TABLE `student_admission` (
  `id` bigint(22) NOT NULL,
  `student_id` bigint(22) NOT NULL,
  `prev_class_id` bigint(22) NOT NULL,
  `current_class_id` bigint(22) NOT NULL,
  `academic_year` int(4) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_admission`
--

INSERT INTO `student_admission` (`id`, `student_id`, `prev_class_id`, `current_class_id`, `academic_year`, `remarks`, `created_at`, `updated_at`) VALUES
(52, 14, 19, 20, 2023, '500', '2023-09-03 01:46:08', '2023-12-02 10:47:36'),
(54, 15, 20, 21, 2023, '300\r\n', '2023-09-04 10:07:18', NULL),
(55, 16, 19, 20, 2023, '233', '2023-09-04 10:07:40', NULL),
(56, 25, 19, 21, 2023, '325', '2023-09-07 18:41:38', '2023-09-07 18:44:04'),
(59, 38, 19, 20, 2024, '500', '2023-10-05 23:23:19', NULL),
(60, 39, 19, 19, 2023, '555555\r\n', '2023-10-18 19:47:45', '2023-11-18 21:57:49'),
(63, 13, 19, 28, 2023, '500', '2023-10-31 16:33:27', NULL),
(64, 43, 19, 20, 2023, '2500', '2023-11-08 19:40:22', '2023-11-08 20:04:58'),
(65, 42, 20, 22, 2023, '550\r\n', '2023-11-13 23:57:47', '2023-11-15 14:16:26'),
(72, 42, 20, 19, 2024, '20', '2024-01-21 19:34:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_monthly_fees`
--

CREATE TABLE `student_monthly_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `method` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_monthly_fees`
--

INSERT INTO `student_monthly_fees` (`id`, `student_id`, `academic_year`, `month`, `method`, `amount`, `created_at`, `updated_at`) VALUES
(10, 13, 2023, 'Janaury', 'Cash', 1000, '2023-10-04 00:51:08', NULL),
(17, 14, 2023, 'Janaury', 'Online', 1000, '2023-10-04 00:57:27', NULL),
(25, 16, 2023, 'February', 'Online', 1000, '2023-10-05 14:11:55', NULL),
(30, 14, 2023, 'December', 'Online', 1000, '2023-10-08 11:08:35', NULL),
(31, 25, 2023, 'Janaury', 'Cash', 255, '2023-10-29 20:56:03', NULL),
(32, 13, 2023, 'March', 'Cash', 10, '2023-12-03 11:38:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Bengali', 28, '2023-08-14 23:33:00', '2023-08-14 23:33:00'),
(4, 'English', 28, '2023-08-15 00:25:40', NULL),
(6, 'Mathematics', 28, '2023-08-16 17:33:33', NULL),
(7, 'Physical Science', 28, '2023-08-16 18:09:37', NULL),
(8, 'Life Science ', 28, '2023-08-16 18:11:03', NULL),
(9, 'History', 28, '2023-08-16 18:11:16', NULL),
(10, 'Geography', 28, '2023-08-16 18:11:33', NULL),
(21, 'Amar Boi', 19, '2023-08-26 23:03:02', NULL),
(22, 'Swasthya O Sharir Shiksha', 19, '2023-08-26 23:03:26', NULL),
(23, 'Sahoj Path', 19, '2023-08-26 23:03:41', NULL),
(24, 'Amar Boi', 20, '2023-08-26 23:11:58', NULL),
(25, 'Sahaj Path', 20, '2023-08-26 23:12:27', NULL),
(26, 'Swasthya O Sharirsiksha', 20, '2023-08-26 23:12:54', NULL),
(28, 'Najibul Middya', 0, '2023-09-05 09:37:14', NULL),
(41, 'Test 4', 22, '2023-12-03 09:08:06', NULL),
(42, 'test 3', 21, '2023-12-03 09:09:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `teacher_id`, `class_id`, `subject_id`, `created_at`, `update_at`) VALUES
(7, 9, 28, 6, '2023-09-15 23:13:54', NULL),
(17, 7, 19, 21, '2023-12-03 09:08:56', NULL),
(18, 8, 20, 26, '2023-12-03 09:09:12', NULL),
(19, 10, 21, 42, '2023-12-03 09:09:58', NULL),
(21, 12, 19, 23, '2023-12-03 09:12:03', NULL),
(22, 7, 28, 1, '2023-12-03 09:12:16', NULL),
(23, 8, 28, 4, '2023-12-03 09:12:33', NULL),
(24, 10, 28, 6, '2023-12-03 09:12:48', NULL),
(25, 11, 28, 7, '2023-12-03 09:12:58', NULL),
(26, 12, 28, 8, '2023-12-03 09:13:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `gender`, `mobile`, `dob`, `photo`, `address`, `created_at`, `updated_at`) VALUES
(7, 'Bajrul Middya', 'abc11@gmail.com', 'Male', '0000000000', '2023-07-23', NULL, 'Dhuliadihi,Kalpathar', '2023-07-28 14:53:49', '0000-00-00 00:00:00'),
(8, 'Sarfraj Alam Middya', 'sarfarajalam1420@gmail.com', 'Male', '1234567890', '2023-09-10', NULL, 'Dhuliadihi,Kalpathar', '2023-08-07 22:45:28', '0000-00-00 00:00:00'),
(10, 'Najibul Middya', 'najibulmiddya11@gmail.com', 'Male', '06295257441', '2023-09-21', NULL, 'Dhuliadihi,Kalpathar', '2023-09-15 23:43:20', '0000-00-00 00:00:00'),
(11, 'Abc', 'abc@gmail.com', 'Female', '0326598745', '2023-12-06', NULL, 'Dhuliadihi,Kalpathar', '2023-12-03 09:06:38', '0000-00-00 00:00:00'),
(12, 'Fejauddin Middya', 'fyjauddinmiddya123@gmail.com', 'Male', '09883703652', '2023-11-28', NULL, 'Dhuliadihi, Kalpathar', '2023-12-03 09:11:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2023', '2023-08-06 10:15:21', NULL),
(2, '2024', '2023-08-06 10:59:05', NULL),
(3, '2025', '2023-08-07 00:17:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attend_rel` (`student_id`),
  ADD KEY `student_class_attend_rel` (`class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_timetables`
--
ALTER TABLE `class_timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_api`
--
ALTER TABLE `rest_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_rel_to student` (`class_id`);

--
-- Indexes for table `student_admission`
--
ALTER TABLE `student_admission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_class_prv_to_admission` (`prev_class_id`),
  ADD KEY `rel_class_crnt_to_admission` (`current_class_id`),
  ADD KEY `rel_student_to_admission` (`student_id`);

--
-- Indexes for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_timetables`
--
ALTER TABLE `class_timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rest_api`
--
ALTER TABLE `rest_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `student_admission`
--
ALTER TABLE `student_admission`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `student_attend_rel` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_class_attend_rel` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `class_rel_to student` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `student_admission`
--
ALTER TABLE `student_admission`
  ADD CONSTRAINT `rel_class_crnt_to_admission` FOREIGN KEY (`current_class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `rel_class_prv_to_admission` FOREIGN KEY (`prev_class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `rel_student_to_admission` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
