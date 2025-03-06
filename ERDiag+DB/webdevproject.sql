-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 04:21 PM
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
-- Database: `webdevproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `BatchID` int(11) NOT NULL,
  `InstituteID` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`BatchID`, `InstituteID`, `BranchID`, `Name`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, 1, 'B1', '2024-09-07 17:58:33', NULL, 1),
(2, 1, 1, 'B2', '2024-09-07 17:58:52', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `CourseID`, `Name`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, 'AI-DS', '2024-09-05 22:28:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_institute_mapping`
--

CREATE TABLE `branch_institute_mapping` (
  `BranchID` int(11) NOT NULL,
  `InstituteID` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch_institute_mapping`
--

INSERT INTO `branch_institute_mapping` (`BranchID`, `InstituteID`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, '2024-09-15 09:51:08', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `SemesterTypeID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `SemesterTypeID`, `Name`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, 'B. Tech', '2024-09-05 22:23:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_institute_mapping`
--

CREATE TABLE `course_institute_mapping` (
  `InstituteID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_institute_mapping`
--

INSERT INTO `course_institute_mapping` (`InstituteID`, `CourseID`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, '2024-09-05 22:23:51', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Joined` date NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Age`, `Gender`, `Qualification`, `Joined`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 'Parth Mungali', 21, 'M', 'WEBDEVTESTING', '2024-09-03', '2024-09-03 23:38:54', NULL, 1),
(2, 'Abc', 21, 'M', 'test', '2024-04-16', '2024-09-14 19:37:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_institute_mapping`
--

CREATE TABLE `employee_institute_mapping` (
  `EmployeeID` int(11) NOT NULL,
  `InstituteID` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_institute_mapping`
--

INSERT INTO `employee_institute_mapping` (`EmployeeID`, `InstituteID`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, '2024-09-14 21:23:43', NULL, 1),
(2, 1, '2024-09-14 21:23:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `Enrollment Number` int(11) NOT NULL,
  `SchemeID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Graduation Year` year(4) NOT NULL,
  `Currently Active` tinyint(1) NOT NULL DEFAULT 1,
  `ShiftSemesterID` int(11) DEFAULT NULL,
  `NewEnrollmentNumber` int(11) DEFAULT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`Enrollment Number`, `SchemeID`, `StudentID`, `Graduation Year`, `Currently Active`, `ShiftSemesterID`, `NewEnrollmentNumber`, `Created on`, `Updated on`, `Valid`) VALUES
(4, 4, 2, '2026', 1, NULL, NULL, '2024-09-12 17:34:09', NULL, 1),
(6, 4, 5, '2026', 1, NULL, NULL, '2024-09-16 10:27:40', NULL, 1),
(7, 3, 6, '2027', 1, NULL, NULL, '2024-09-16 10:34:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_batch_mapping`
--

CREATE TABLE `enrollment_batch_mapping` (
  `EnrollmentBatchID` int(11) NOT NULL,
  `Enrollment Number` int(11) NOT NULL,
  `BatchID` int(11) NOT NULL,
  `Currently Active` tinyint(1) NOT NULL DEFAULT 1,
  `ShiftSemesterID` int(11) DEFAULT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enrollment_batch_mapping`
--

INSERT INTO `enrollment_batch_mapping` (`EnrollmentBatchID`, `Enrollment Number`, `BatchID`, `Currently Active`, `ShiftSemesterID`, `Created on`, `Updated on`, `Valid`) VALUES
(2, 4, 2, 1, NULL, '2024-09-12 18:29:42', NULL, 1),
(4, 6, 2, 1, NULL, '2024-09-16 10:27:40', NULL, 1),
(5, 7, 1, 1, NULL, '2024-09-16 10:34:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_subject_mapping`
--

CREATE TABLE `enrollment_subject_mapping` (
  `EnrollmentSubjectID` int(11) NOT NULL,
  `Enrollment Number` int(11) NOT NULL,
  `ExaminationSchemeID` int(11) NOT NULL,
  `Completed` tinyint(1) NOT NULL DEFAULT 0,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enrollment_subject_mapping`
--

INSERT INTO `enrollment_subject_mapping` (`EnrollmentSubjectID`, `Enrollment Number`, `ExaminationSchemeID`, `Completed`, `Created on`, `Updated on`, `Valid`) VALUES
(22, 4, 1, 0, '2024-09-15 19:11:54', NULL, 1),
(23, 4, 27, 0, '2024-09-17 00:02:06', NULL, 1),
(26, 4, 2, 0, '2024-09-17 01:41:30', NULL, 1),
(27, 4, 3, 0, '2024-09-17 01:41:38', NULL, 1),
(28, 4, 4, 0, '2024-09-17 01:41:44', NULL, 1),
(29, 4, 5, 0, '2024-09-17 01:41:51', NULL, 1),
(30, 4, 6, 0, '2024-09-17 01:41:57', NULL, 1),
(31, 4, 7, 0, '2024-09-17 01:42:04', NULL, 1),
(32, 4, 8, 0, '2024-09-17 01:42:11', NULL, 1),
(33, 4, 12, 0, '2024-09-17 01:42:20', NULL, 1),
(34, 4, 13, 0, '2024-09-17 01:42:29', NULL, 1),
(35, 4, 14, 0, '2024-09-17 01:42:36', NULL, 1),
(36, 4, 15, 0, '2024-09-17 01:43:25', NULL, 1),
(37, 4, 16, 0, '2024-09-17 01:43:33', NULL, 1),
(38, 4, 17, 0, '2024-09-17 01:43:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `examination_scheme`
--

CREATE TABLE `examination_scheme` (
  `ExaminationSchemeID` int(11) NOT NULL,
  `SemesterID` int(11) NOT NULL,
  `SubjectDetailsID` int(11) NOT NULL,
  `Examination Date` date NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `examination_scheme`
--

INSERT INTO `examination_scheme` (`ExaminationSchemeID`, `SemesterID`, `SubjectDetailsID`, `Examination Date`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, 1, '2024-06-06', '2024-09-15 17:01:59', NULL, 1),
(2, 1, 2, '2024-06-08', '2024-09-15 17:02:17', NULL, 1),
(3, 1, 3, '2024-06-10', '2024-09-15 17:02:45', NULL, 1),
(4, 1, 4, '2024-06-12', '2024-09-15 17:03:05', NULL, 1),
(5, 1, 5, '2024-06-14', '2024-09-15 17:03:27', NULL, 1),
(6, 1, 6, '2024-06-17', '2024-09-15 17:03:46', NULL, 1),
(7, 1, 7, '2024-06-18', '2024-09-15 17:04:11', NULL, 1),
(8, 1, 8, '2024-05-27', '2024-09-15 17:04:34', NULL, 1),
(12, 1, 9, '2024-05-28', '2024-09-15 17:06:25', NULL, 1),
(13, 1, 10, '2024-05-29', '2024-09-15 17:06:45', NULL, 1),
(14, 1, 11, '2024-05-30', '2024-09-15 17:07:05', NULL, 1),
(15, 2, 12, '2024-01-01', '2024-09-15 17:07:35', NULL, 1),
(16, 2, 13, '2024-01-03', '2024-09-15 17:07:57', NULL, 1),
(17, 2, 14, '2024-01-05', '2024-09-15 17:08:21', NULL, 1),
(18, 2, 15, '2024-01-08', '2024-09-15 17:08:52', NULL, 1),
(19, 2, 16, '2024-01-10', '2024-09-15 17:09:10', NULL, 1),
(20, 2, 17, '2024-01-11', '2024-09-15 17:09:32', NULL, 1),
(21, 2, 18, '2023-12-27', '2024-09-15 17:09:55', NULL, 1),
(23, 2, 19, '2023-12-28', '2024-09-15 17:12:06', NULL, 1),
(24, 2, 20, '2023-12-29', '2024-09-15 17:12:22', NULL, 1),
(26, 1, 17, '2023-12-15', '2024-09-16 20:10:54', NULL, 1),
(27, 2, 21, '2024-09-28', '2024-09-17 00:01:49', NULL, 1),
(28, 4, 21, '2024-09-28', '2024-09-20 02:58:38', NULL, 1),
(29, 1, 21, '2024-09-28', '2024-09-20 02:59:59', NULL, 1),
(30, 1, 13, '2024-09-30', '2024-09-20 03:00:25', '2024-09-20 11:36:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `InstituteID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Established on` year(4) NOT NULL,
  `Inaugurated on` date DEFAULT NULL,
  `Area (Acres)` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`InstituteID`, `Name`, `Established on`, `Inaugurated on`, `Area (Acres)`, `Address`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 'USAR', '2021', NULL, 12, 'surajmal vihar, delhi', '2024-09-05 22:19:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `EmployeeID` int(11) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Created on` datetime DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`EmployeeID`, `Password`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-04 00:23:27', NULL, 1),
(2, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-14 19:37:54', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `MarksID` int(11) NOT NULL,
  `Enrollment Number` int(11) NOT NULL,
  `EnrollmentSubjectID` int(11) NOT NULL,
  `Internal Marks` int(11) NOT NULL,
  `External Marks` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`MarksID`, `Enrollment Number`, `EnrollmentSubjectID`, `Internal Marks`, `External Marks`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 4, 22, 21, 40, '2024-09-15 19:24:46', '2024-09-15 22:01:29', 1),
(3, 4, 23, 95, 0, '2024-09-17 01:47:56', NULL, 1),
(4, 4, 26, 24, 67, '2024-09-17 01:48:39', NULL, 1),
(5, 4, 36, 15, 62, '2024-09-17 01:50:02', NULL, 1),
(6, 4, 37, 22, 61, '2024-09-17 01:50:28', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `SemesterID` int(11) NOT NULL,
  `Enrollment Number` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`SemesterID`, `Enrollment Number`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 4, '2024-09-13 17:23:44', NULL, 1),
(1, 6, '2024-09-16 10:27:40', NULL, 1),
(2, 4, '2024-09-13 23:32:24', NULL, 1),
(2, 6, '2024-09-16 10:27:40', NULL, 1),
(3, 6, '2024-09-16 10:27:40', NULL, 1),
(4, 6, '2024-09-16 10:27:40', NULL, 1),
(5, 6, '2024-09-16 10:27:40', NULL, 1),
(6, 6, '2024-09-16 10:27:40', NULL, 1),
(7, 6, '2024-09-16 10:27:40', NULL, 1),
(8, 6, '2024-09-16 10:27:40', NULL, 1),
(9, 7, '2024-09-16 10:34:18', NULL, 1),
(10, 7, '2024-09-16 10:34:18', NULL, 1),
(11, 7, '2024-09-16 10:34:18', NULL, 1),
(12, 7, '2024-09-16 10:34:18', NULL, 1),
(13, 7, '2024-09-16 10:34:18', NULL, 1),
(14, 7, '2024-09-16 10:34:18', NULL, 1),
(15, 7, '2024-09-16 10:34:18', NULL, 1),
(16, 7, '2024-09-16 10:34:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `ManageAdmissions` tinyint(1) NOT NULL DEFAULT 0,
  `ManageSessions` tinyint(1) NOT NULL DEFAULT 0,
  `ManageAcademicDetails` tinyint(1) NOT NULL DEFAULT 0,
  `ManageMarks` tinyint(1) NOT NULL DEFAULT 0,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `Name`, `ManageAdmissions`, `ManageSessions`, `ManageAcademicDetails`, `ManageMarks`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 'Admin', 1, 1, 1, 1, '2024-09-04 00:04:01', NULL, 1),
(2, 'Teacher', 0, 0, 0, 1, '2024-09-14 17:28:41', NULL, 1),
(3, 'Session Master', 0, 1, 0, 0, '2024-09-14 17:28:54', NULL, 1),
(4, 'Registrar', 1, 0, 0, 0, '2024-09-14 17:29:08', NULL, 1),
(5, 'Academic Head', 0, 0, 1, 0, '2024-09-14 17:30:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_mapping`
--

CREATE TABLE `roles_mapping` (
  `EmployeeID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles_mapping`
--

INSERT INTO `roles_mapping` (`EmployeeID`, `RoleID`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, '2024-09-04 00:23:59', NULL, 1),
(2, 2, '2024-09-14 20:13:33', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `SchemeID` int(11) NOT NULL,
  `InstituteID` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  `Scheme Year` year(4) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`SchemeID`, `InstituteID`, `BranchID`, `Scheme Year`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, 1, '2024', '2024-09-05 22:43:55', NULL, 1),
(3, 1, 1, '2023', '2024-09-13 23:39:01', NULL, 1),
(4, 1, 1, '2022', '2024-09-15 11:03:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `SemesterID` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `AdmissionYear` year(4) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemesterID`, `Number`, `AdmissionYear`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 4, '2022', '2024-09-05 22:39:55', NULL, 1),
(2, 3, '2022', '2024-09-13 23:32:09', NULL, 1),
(3, 1, '2022', '2024-09-16 10:27:40', NULL, 1),
(4, 2, '2022', '2024-09-16 10:27:40', NULL, 1),
(5, 5, '2022', '2024-09-16 10:27:40', NULL, 1),
(6, 6, '2022', '2024-09-16 10:27:40', NULL, 1),
(7, 7, '2022', '2024-09-16 10:27:40', NULL, 1),
(8, 8, '2022', '2024-09-16 10:27:40', NULL, 1),
(9, 1, '2023', '2024-09-16 10:34:18', NULL, 1),
(10, 2, '2023', '2024-09-16 10:34:18', NULL, 1),
(11, 3, '2023', '2024-09-16 10:34:18', NULL, 1),
(12, 4, '2023', '2024-09-16 10:34:18', NULL, 1),
(13, 5, '2023', '2024-09-16 10:34:18', NULL, 1),
(14, 6, '2023', '2024-09-16 10:34:18', NULL, 1),
(15, 7, '2023', '2024-09-16 10:34:18', NULL, 1),
(16, 8, '2023', '2024-09-16 10:34:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester_dates`
--

CREATE TABLE `semester_dates` (
  `SemesterID` int(11) NOT NULL,
  `InstituteID` int(11) NOT NULL,
  `Begin Date` date NOT NULL,
  `End Date` date NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester_dates`
--

INSERT INTO `semester_dates` (`SemesterID`, `InstituteID`, `Begin Date`, `End Date`, `Created on`, `Updated on`, `Valid`) VALUES
(3, 1, '2024-08-01', '2024-12-31', '2024-09-17 01:00:54', NULL, 1),
(5, 1, '2025-01-01', '2025-06-30', '2024-09-17 01:02:38', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester_type`
--

CREATE TABLE `semester_type` (
  `SemesterTypeID` int(11) NOT NULL,
  `Number of Semesters` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester_type`
--

INSERT INTO `semester_type` (`SemesterTypeID`, `Number of Semesters`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 8, '2024-09-05 22:23:05', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Student Photo` mediumblob DEFAULT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone Number` bigint(10) NOT NULL,
  `10th Certificate` mediumblob DEFAULT NULL,
  `12th Certificate` mediumblob DEFAULT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Name`, `Student Photo`, `DOB`, `Gender`, `Email`, `Phone Number`, `10th Certificate`, `12th Certificate`, `Created on`, `Updated on`, `Valid`) VALUES
(2, 'Parth Mungali', NULL, '2002-08-10', 'M', 'parth2002.mungali@gmail.com', 8376836269, NULL, NULL, '2024-09-07 18:00:08', NULL, 1),
(5, 'Sarthak', NULL, '2003-01-01', 'M', 'john@gmail.com', 9876543210, NULL, NULL, '2024-09-16 10:27:40', NULL, 1),
(6, 'ABC', NULL, '2002-10-10', 'M', 'john1@gmail.com', 9876543212, NULL, NULL, '2024-09-16 10:34:18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `Name`, `Code`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 'Software Engineering', 'ARD202', '2024-09-12 12:35:53', NULL, 1),
(2, 'Intro to AI', 'ARD204', '2024-09-12 12:36:19', NULL, 1),
(3, 'DWDM', 'ARM206', '2024-09-12 12:36:40', NULL, 1),
(4, 'ADA', 'ARM208', '2024-09-12 12:38:19', NULL, 1),
(5, 'Intro to ML', 'ARM210', '2024-09-12 12:39:05', NULL, 1),
(6, 'Computer Network', 'ARD212', '2024-09-12 12:39:29', NULL, 1),
(7, 'Engineering Economics', 'HSAI214', '2024-09-12 12:40:09', NULL, 1),
(8, 'Intro to AI Lab', 'ARM252', '2024-09-12 12:40:40', NULL, 1),
(9, 'ADA Lab', 'ARM254', '2024-09-12 12:43:04', NULL, 1),
(10, 'ML Lab', 'ARM256', '2024-09-12 12:43:22', NULL, 1),
(11, 'Computer Network Lab', 'ARM258', '2024-09-12 12:43:48', NULL, 1),
(12, 'EMAI', 'ARD201', '2024-09-13 23:33:19', NULL, 1),
(13, 'OPERATING SYSTEMS', 'ARD203', '2024-09-13 23:33:43', NULL, 1),
(14, 'DBMS', 'ARD205', '2024-09-13 23:34:02', NULL, 1),
(15, 'FOCS', 'ARD207', '2024-09-13 23:34:22', NULL, 1),
(16, 'DATA STRUCTURES', 'ARD209', '2024-09-13 23:34:37', NULL, 1),
(17, 'ACCOUNTANCY', 'MSAI211', '2024-09-13 23:35:02', NULL, 1),
(18, 'JAVA LAB', 'ARD251', '2024-09-13 23:35:29', NULL, 1),
(19, 'DBMS LAB', 'ARD253', '2024-09-13 23:36:01', NULL, 1),
(20, 'DS LAB', 'ARD255', '2024-09-13 23:36:20', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE `subject_details` (
  `SubjectDetailsID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `SchemeID` int(11) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Exam` varchar(45) NOT NULL,
  `Internal` int(11) NOT NULL,
  `External` int(11) NOT NULL,
  `Pass Marks` int(11) NOT NULL,
  `Mode` varchar(45) NOT NULL,
  `Kind` varchar(45) NOT NULL,
  `Group` varchar(45) NOT NULL,
  `Credits` int(11) NOT NULL,
  `Syllabus` varchar(1000) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`SubjectDetailsID`, `SubjectID`, `SchemeID`, `Type`, `Exam`, `Internal`, `External`, `Pass Marks`, `Mode`, `Kind`, `Group`, `Credits`, `Syllabus`, `Created on`, `Updated on`, `Valid`) VALUES
(1, 1, 1, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'SE', '2024-09-15 16:46:15', NULL, 1),
(2, 2, 1, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'AI', '2024-09-15 16:46:35', NULL, 1),
(3, 3, 1, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 3, 'DWDM', '2024-09-15 16:47:07', NULL, 1),
(4, 4, 1, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'ADA', '2024-09-15 16:47:30', NULL, 1),
(5, 5, 1, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'ML', '2024-09-15 16:47:48', NULL, 1),
(6, 6, 1, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 3, 'CN', '2024-09-15 16:48:12', NULL, 1),
(7, 7, 1, 'THEORY', 'NUES', 100, 0, 40, 'COMPULSORY', 'MANDATORY', 'HS', 2, 'ECO', '2024-09-15 16:48:56', NULL, 1),
(8, 8, 1, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'AILAB', '2024-09-15 16:49:40', NULL, 1),
(9, 9, 1, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'ADALAB', '2024-09-15 16:49:58', NULL, 1),
(10, 10, 1, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'MLLAB', '2024-09-15 16:50:19', NULL, 1),
(11, 11, 1, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'CNLAB', '2024-09-15 16:50:40', NULL, 1),
(12, 12, 3, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'EMAI', '2024-09-15 16:51:37', NULL, 1),
(13, 13, 3, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'OS', '2024-09-15 16:51:54', NULL, 1),
(14, 14, 3, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 3, 'DBMS', '2024-09-15 16:52:19', NULL, 1),
(15, 15, 3, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'FOCS', '2024-09-15 16:52:35', NULL, 1),
(16, 16, 3, 'THEORY', 'UES', 25, 75, 40, 'COMPULSORY', 'MANDATORY', 'PC', 4, 'DS', '2024-09-15 16:52:52', NULL, 1),
(17, 17, 3, 'THEORY', 'NUES', 100, 0, 40, 'COMPULSORY', 'MANDATORY', 'MS', 2, 'ACC', '2024-09-15 16:53:33', NULL, 1),
(18, 18, 3, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'JAVALAB', '2024-09-15 16:54:41', NULL, 1),
(19, 19, 3, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'DBMSLAB', '2024-09-15 16:54:59', NULL, 1),
(20, 20, 3, 'PRACTICAL', 'UES', 40, 60, 40, 'COMPULSORY', 'MANDATORY', 'PC', 1, 'DSLAB', '2024-09-15 16:55:13', NULL, 1),
(21, 7, 4, 'THEORY', 'NUES', 100, 0, 40, 'COMPULSARY', 'MANDATORY', 'HS', 2, 'ECO', '2024-09-16 15:32:50', NULL, 1),
(37, 17, 4, 'THEORY', 'NUES', 100, 0, 40, 'COMPULSARY', 'MANDATORY', 'HS', 2, 'ACC', '2024-09-19 23:43:16', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `EmployeeID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `BatchID` int(11) NOT NULL,
  `SemesterID` int(11) NOT NULL,
  `Created on` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated on` datetime DEFAULT NULL,
  `Valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`BatchID`),
  ADD KEY `batches_fk1` (`BranchID`),
  ADD KEY `batches_fk2` (`InstituteID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`),
  ADD KEY `branch_course_fk` (`CourseID`);

--
-- Indexes for table `branch_institute_mapping`
--
ALTER TABLE `branch_institute_mapping`
  ADD PRIMARY KEY (`BranchID`,`InstituteID`),
  ADD KEY `branch_institute_fk2` (`InstituteID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `course_fk1` (`SemesterTypeID`);

--
-- Indexes for table `course_institute_mapping`
--
ALTER TABLE `course_institute_mapping`
  ADD PRIMARY KEY (`InstituteID`,`CourseID`),
  ADD KEY `course_institute_fk1` (`CourseID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `employee_institute_mapping`
--
ALTER TABLE `employee_institute_mapping`
  ADD PRIMARY KEY (`EmployeeID`,`InstituteID`),
  ADD KEY `employee_institute_fk2` (`InstituteID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`Enrollment Number`),
  ADD KEY `enrollment_student_fk` (`StudentID`),
  ADD KEY `enrollment_shiftsem_fk` (`ShiftSemesterID`),
  ADD KEY `enrollment_scheme_fk` (`SchemeID`),
  ADD KEY `enrollment_newenr_fk` (`NewEnrollmentNumber`);

--
-- Indexes for table `enrollment_batch_mapping`
--
ALTER TABLE `enrollment_batch_mapping`
  ADD PRIMARY KEY (`EnrollmentBatchID`),
  ADD UNIQUE KEY `Enrollment Number` (`Enrollment Number`,`BatchID`,`ShiftSemesterID`),
  ADD KEY `enrollment_batch_fk2` (`BatchID`),
  ADD KEY `enrollment_batch_fk3` (`ShiftSemesterID`);

--
-- Indexes for table `enrollment_subject_mapping`
--
ALTER TABLE `enrollment_subject_mapping`
  ADD PRIMARY KEY (`EnrollmentSubjectID`),
  ADD UNIQUE KEY `Enrollment Number` (`Enrollment Number`,`ExaminationSchemeID`),
  ADD KEY `enrollment_subject_fk2` (`ExaminationSchemeID`);

--
-- Indexes for table `examination_scheme`
--
ALTER TABLE `examination_scheme`
  ADD PRIMARY KEY (`ExaminationSchemeID`),
  ADD UNIQUE KEY `SemesterID` (`SemesterID`,`SubjectDetailsID`),
  ADD KEY `examination_scheme_fk2` (`SubjectDetailsID`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`InstituteID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`MarksID`),
  ADD UNIQUE KEY `Enrollment Number` (`Enrollment Number`,`EnrollmentSubjectID`),
  ADD KEY `marks_fk2` (`EnrollmentSubjectID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`SemesterID`,`Enrollment Number`),
  ADD KEY `register_fk2` (`Enrollment Number`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `roles_mapping`
--
ALTER TABLE `roles_mapping`
  ADD PRIMARY KEY (`EmployeeID`,`RoleID`),
  ADD KEY `roles_mapping_fk2` (`RoleID`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`SchemeID`),
  ADD UNIQUE KEY `InstituteID` (`InstituteID`,`BranchID`,`Scheme Year`),
  ADD KEY `scheme_fk2` (`BranchID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemesterID`);

--
-- Indexes for table `semester_dates`
--
ALTER TABLE `semester_dates`
  ADD PRIMARY KEY (`SemesterID`,`InstituteID`),
  ADD KEY `semester_dates_fk2` (`InstituteID`);

--
-- Indexes for table `semester_type`
--
ALTER TABLE `semester_type`
  ADD PRIMARY KEY (`SemesterTypeID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`SubjectDetailsID`),
  ADD UNIQUE KEY `SubjectID` (`SubjectID`,`SchemeID`),
  ADD KEY `subject_details_fk2` (`SchemeID`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`EmployeeID`,`SubjectID`,`BatchID`,`SemesterID`),
  ADD KEY `teaches_fk2` (`SubjectID`),
  ADD KEY `teaches_fk3` (`BatchID`),
  ADD KEY `teaches_fk5` (`SemesterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `BatchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BranchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `Enrollment Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollment_batch_mapping`
--
ALTER TABLE `enrollment_batch_mapping`
  MODIFY `EnrollmentBatchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollment_subject_mapping`
--
ALTER TABLE `enrollment_subject_mapping`
  MODIFY `EnrollmentSubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `examination_scheme`
--
ALTER TABLE `examination_scheme`
  MODIFY `ExaminationSchemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `InstituteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `MarksID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `SchemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `SemesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `semester_type`
--
ALTER TABLE `semester_type`
  MODIFY `SemesterTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
  MODIFY `SubjectDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_fk1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`),
  ADD CONSTRAINT `batches_fk2` FOREIGN KEY (`InstituteID`) REFERENCES `institute` (`InstituteID`);

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_course_fk` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);

--
-- Constraints for table `branch_institute_mapping`
--
ALTER TABLE `branch_institute_mapping`
  ADD CONSTRAINT `branch_institute_fk1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`),
  ADD CONSTRAINT `branch_institute_fk2` FOREIGN KEY (`InstituteID`) REFERENCES `institute` (`InstituteID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_fk1` FOREIGN KEY (`SemesterTypeID`) REFERENCES `semester_type` (`SemesterTypeID`);

--
-- Constraints for table `course_institute_mapping`
--
ALTER TABLE `course_institute_mapping`
  ADD CONSTRAINT `course_institute_fk1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `course_institute_fk2` FOREIGN KEY (`InstituteID`) REFERENCES `institute` (`InstituteID`);

--
-- Constraints for table `employee_institute_mapping`
--
ALTER TABLE `employee_institute_mapping`
  ADD CONSTRAINT `employee_institute_fk1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `employee_institute_fk2` FOREIGN KEY (`InstituteID`) REFERENCES `institute` (`InstituteID`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_newenr_fk` FOREIGN KEY (`NewEnrollmentNumber`) REFERENCES `enrollment` (`Enrollment Number`),
  ADD CONSTRAINT `enrollment_scheme_fk` FOREIGN KEY (`SchemeID`) REFERENCES `scheme` (`SchemeID`),
  ADD CONSTRAINT `enrollment_shiftsem_fk` FOREIGN KEY (`ShiftSemesterID`) REFERENCES `semester` (`SemesterID`),
  ADD CONSTRAINT `enrollment_student_fk` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`);

--
-- Constraints for table `enrollment_batch_mapping`
--
ALTER TABLE `enrollment_batch_mapping`
  ADD CONSTRAINT `enrollment_batch_fk1` FOREIGN KEY (`Enrollment Number`) REFERENCES `enrollment` (`Enrollment Number`),
  ADD CONSTRAINT `enrollment_batch_fk2` FOREIGN KEY (`BatchID`) REFERENCES `batches` (`BatchID`),
  ADD CONSTRAINT `enrollment_batch_fk3` FOREIGN KEY (`ShiftSemesterID`) REFERENCES `semester` (`SemesterID`);

--
-- Constraints for table `enrollment_subject_mapping`
--
ALTER TABLE `enrollment_subject_mapping`
  ADD CONSTRAINT `enrollment_subject_fk1` FOREIGN KEY (`Enrollment Number`) REFERENCES `enrollment` (`Enrollment Number`),
  ADD CONSTRAINT `enrollment_subject_fk2` FOREIGN KEY (`ExaminationSchemeID`) REFERENCES `examination_scheme` (`ExaminationSchemeID`);

--
-- Constraints for table `examination_scheme`
--
ALTER TABLE `examination_scheme`
  ADD CONSTRAINT `examination_scheme_fk1` FOREIGN KEY (`SemesterID`) REFERENCES `semester` (`SemesterID`),
  ADD CONSTRAINT `examination_scheme_fk2` FOREIGN KEY (`SubjectDetailsID`) REFERENCES `subject_details` (`SubjectDetailsID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_fk1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_fk1` FOREIGN KEY (`Enrollment Number`) REFERENCES `enrollment` (`Enrollment Number`),
  ADD CONSTRAINT `marks_fk2` FOREIGN KEY (`EnrollmentSubjectID`) REFERENCES `enrollment_subject_mapping` (`EnrollmentSubjectID`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_fk1` FOREIGN KEY (`SemesterID`) REFERENCES `semester` (`SemesterID`),
  ADD CONSTRAINT `register_fk2` FOREIGN KEY (`Enrollment Number`) REFERENCES `enrollment` (`Enrollment Number`);

--
-- Constraints for table `roles_mapping`
--
ALTER TABLE `roles_mapping`
  ADD CONSTRAINT `roles_mapping_fk1` FOREIGN KEY (`EmployeeID`) REFERENCES `login` (`EmployeeID`),
  ADD CONSTRAINT `roles_mapping_fk2` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`);

--
-- Constraints for table `scheme`
--
ALTER TABLE `scheme`
  ADD CONSTRAINT `scheme_fk1` FOREIGN KEY (`InstituteID`) REFERENCES `institute` (`InstituteID`),
  ADD CONSTRAINT `scheme_fk2` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`);

--
-- Constraints for table `semester_dates`
--
ALTER TABLE `semester_dates`
  ADD CONSTRAINT `semester_dates_fk1` FOREIGN KEY (`SemesterID`) REFERENCES `semester` (`SemesterID`),
  ADD CONSTRAINT `semester_dates_fk2` FOREIGN KEY (`InstituteID`) REFERENCES `institute` (`InstituteID`);

--
-- Constraints for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD CONSTRAINT `subject_details_fk1` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`SubjectID`),
  ADD CONSTRAINT `subject_details_fk2` FOREIGN KEY (`SchemeID`) REFERENCES `scheme` (`SchemeID`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_fk1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `teaches_fk2` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`SubjectID`),
  ADD CONSTRAINT `teaches_fk3` FOREIGN KEY (`BatchID`) REFERENCES `batches` (`BatchID`),
  ADD CONSTRAINT `teaches_fk5` FOREIGN KEY (`SemesterID`) REFERENCES `semester` (`SemesterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
