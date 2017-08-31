-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 04:21 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident`
--

CREATE TABLE `accident` (
  `idaccident` int(11) NOT NULL COMMENT 'ID',
  `timestam` timestamp(1) NULL DEFAULT CURRENT_TIMESTAMP(1) COMMENT 'วันที่',
  `location` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานที่เกิด',
  `note` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `accidenttype_idaccidenttype` int(11) NOT NULL COMMENT 'ลักษณะการบาดเจ็บ',
  `medicaltreatment_idmedicaltreatment` int(11) NOT NULL COMMENT 'การรักษาพยาบาล',
  `p_pid` bigint(13) NOT NULL COMMENT 'รหัสบัตรประชาชน',
  `p_sid` bigint(13) NOT NULL COMMENT 'รหัสนักศึกษา',
  `inlocattype_idinlocattype` int(11) NOT NULL COMMENT 'ประเภท',
  `nurse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accidenttype`
--

CREATE TABLE `accidenttype` (
  `idaccidenttype` int(11) NOT NULL COMMENT 'ID',
  `accidenttype` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ลักษณะการบาดเจ็บ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ID` int(11) NOT NULL COMMENT 'ID',
  `appointment_time` datetime DEFAULT NULL COMMENT 'เวลานัด',
  `medical_certificate` int(11) DEFAULT '0' COMMENT 'ขอใบรับรองแพทย์',
  `todoctor` int(11) DEFAULT '0' COMMENT 'สถานะการพบแพทย์',
  `timestam` timestamp(1) NULL DEFAULT CURRENT_TIMESTAMP(1) COMMENT 'วันที่บันทึก',
  `detial` longtext COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  `nurse_id` int(11) NOT NULL,
  `nurse_id2` int(11) DEFAULT NULL COMMENT 'เวชระเบียน',
  `patient_p_pid` bigint(13) NOT NULL COMMENT 'รหัสบัตรประจำตัวประชาชน',
  `patient_p_sid` bigint(13) NOT NULL COMMENT 'รหัสนักศึกษา',
  `casetype_idcasetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทอาการป่วย',
  `doctor_iddoctor` int(11) NOT NULL COMMENT 'ชื่อแพทย์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID`, `appointment_time`, `medical_certificate`, `todoctor`, `timestam`, `detial`, `nurse_id`, `nurse_id2`, `patient_p_pid`, `patient_p_sid`, `casetype_idcasetype`, `doctor_iddoctor`) VALUES
(1, '2017-08-18 19:46:00', 0, 0, '2017-08-18 12:46:57.4', 'ดกหดหกด', 1, NULL, 1679900327554, 5802041420158, '1,2', 1),
(2, '2017-09-02 18:00:00', 1, 0, '2017-08-30 14:01:13.5', '', 1, NULL, 1679900327554, 5802041420158, '1,2,4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('ADMIN', '1', 1503056566);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/accident/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/accident/create', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/accident/delete', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/accident/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/accident/update', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/accident/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/appointment/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/appointment/create', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/appointment/delete', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/appointment/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/appointment/update', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/appointment/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casemedicine/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casemedicine/create', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casemedicine/delete', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casemedicine/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casemedicine/update', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casemedicine/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casepatient/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casepatient/create', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casepatient/delete', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casepatient/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casepatient/update', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/casepatient/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/default/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/default/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/debug/default/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/default/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/default/action', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/default/diff', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/default/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/default/preview', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gii/default/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gridview/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gridview/export/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/gridview/export/download', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/home/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/home/captcha', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/home/error', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/home/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/home/login', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/home/logout', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/appointments', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/create', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/delete', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/index2', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/update', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicalrecords/view', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/medicine/create', 2, NULL, NULL, NULL, 1504099120, 1504099120),
('/medicine/delete', 2, NULL, NULL, NULL, 1504099120, 1504099120),
('/medicine/index', 2, NULL, NULL, NULL, 1504099120, 1504099120),
('/medicine/update', 2, NULL, NULL, NULL, 1504099120, 1504099120),
('/medicine/view', 2, NULL, NULL, NULL, 1504099120, 1504099120),
('/medicinetype/*', 2, NULL, NULL, NULL, 1504100011, 1504100011),
('/medicinetype/create', 2, NULL, NULL, NULL, 1504100011, 1504100011),
('/medicinetype/delete', 2, NULL, NULL, NULL, 1504100011, 1504100011),
('/medicinetype/index', 2, NULL, NULL, NULL, 1504100011, 1504100011),
('/medicinetype/update', 2, NULL, NULL, NULL, 1504100011, 1504100011),
('/medicinetype/view', 2, NULL, NULL, NULL, 1504100011, 1504100011),
('/nurseservice/*', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/accident', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/appointment', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/casemedicine', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/casepatient', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/history', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/index', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/logout', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/psearch', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/nurseservice/pservice', 2, NULL, NULL, NULL, 1503056467, 1503056467),
('/patient/*', 2, NULL, NULL, NULL, 1504094154, 1504094154),
('/patient/create', 2, NULL, NULL, NULL, 1504094154, 1504094154),
('/patient/delete', 2, NULL, NULL, NULL, 1504094154, 1504094154),
('/patient/index', 2, NULL, NULL, NULL, 1504094154, 1504094154),
('/patient/update', 2, NULL, NULL, NULL, 1504094154, 1504094154),
('/patient/view', 2, NULL, NULL, NULL, 1504094154, 1504094154),
('/report/*', 2, NULL, NULL, NULL, 1503161960, 1503161960),
('/report/index', 2, NULL, NULL, NULL, 1503161960, 1503161960),
('/report/report1', 2, NULL, NULL, NULL, 1503161960, 1503161960),
('/report/report2', 2, NULL, NULL, NULL, 1503250813, 1503250813),
('/report/report3', 2, NULL, NULL, NULL, 1504081399, 1504081399),
('/report/report4', 2, NULL, NULL, NULL, 1504081399, 1504081399),
('/tool/*', 2, NULL, NULL, NULL, 1504093634, 1504093634),
('/tool/index', 2, NULL, NULL, NULL, 1504093632, 1504093632),
('ADMIN', 1, NULL, NULL, NULL, 1503056479, 1503056479);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('ADMIN', '/accident/*'),
('ADMIN', '/accident/create'),
('ADMIN', '/accident/delete'),
('ADMIN', '/accident/index'),
('ADMIN', '/accident/update'),
('ADMIN', '/accident/view'),
('ADMIN', '/appointment/*'),
('ADMIN', '/appointment/create'),
('ADMIN', '/appointment/delete'),
('ADMIN', '/appointment/index'),
('ADMIN', '/appointment/update'),
('ADMIN', '/appointment/view'),
('ADMIN', '/casemedicine/*'),
('ADMIN', '/casemedicine/create'),
('ADMIN', '/casemedicine/delete'),
('ADMIN', '/casemedicine/index'),
('ADMIN', '/casemedicine/update'),
('ADMIN', '/casemedicine/view'),
('ADMIN', '/casepatient/*'),
('ADMIN', '/casepatient/create'),
('ADMIN', '/casepatient/delete'),
('ADMIN', '/casepatient/index'),
('ADMIN', '/casepatient/update'),
('ADMIN', '/casepatient/view'),
('ADMIN', '/debug/*'),
('ADMIN', '/debug/default/*'),
('ADMIN', '/debug/default/db-explain'),
('ADMIN', '/debug/default/download-mail'),
('ADMIN', '/debug/default/index'),
('ADMIN', '/debug/default/toolbar'),
('ADMIN', '/debug/default/view'),
('ADMIN', '/gii/*'),
('ADMIN', '/gii/default/*'),
('ADMIN', '/gii/default/action'),
('ADMIN', '/gii/default/diff'),
('ADMIN', '/gii/default/index'),
('ADMIN', '/gii/default/preview'),
('ADMIN', '/gii/default/view'),
('ADMIN', '/gridview/*'),
('ADMIN', '/gridview/export/*'),
('ADMIN', '/gridview/export/download'),
('ADMIN', '/home/*'),
('ADMIN', '/home/captcha'),
('ADMIN', '/home/error'),
('ADMIN', '/home/index'),
('ADMIN', '/home/login'),
('ADMIN', '/home/logout'),
('ADMIN', '/medicalrecords/*'),
('ADMIN', '/medicalrecords/appointments'),
('ADMIN', '/medicalrecords/create'),
('ADMIN', '/medicalrecords/delete'),
('ADMIN', '/medicalrecords/index'),
('ADMIN', '/medicalrecords/index2'),
('ADMIN', '/medicalrecords/update'),
('ADMIN', '/medicalrecords/view'),
('ADMIN', '/medicine/create'),
('ADMIN', '/medicine/delete'),
('ADMIN', '/medicine/index'),
('ADMIN', '/medicine/update'),
('ADMIN', '/medicine/view'),
('ADMIN', '/medicinetype/*'),
('ADMIN', '/medicinetype/create'),
('ADMIN', '/medicinetype/delete'),
('ADMIN', '/medicinetype/index'),
('ADMIN', '/medicinetype/update'),
('ADMIN', '/medicinetype/view'),
('ADMIN', '/nurseservice/*'),
('ADMIN', '/nurseservice/accident'),
('ADMIN', '/nurseservice/appointment'),
('ADMIN', '/nurseservice/casemedicine'),
('ADMIN', '/nurseservice/casepatient'),
('ADMIN', '/nurseservice/history'),
('ADMIN', '/nurseservice/index'),
('ADMIN', '/nurseservice/logout'),
('ADMIN', '/nurseservice/psearch'),
('ADMIN', '/nurseservice/pservice'),
('ADMIN', '/patient/*'),
('ADMIN', '/patient/create'),
('ADMIN', '/patient/delete'),
('ADMIN', '/patient/index'),
('ADMIN', '/patient/update'),
('ADMIN', '/patient/view'),
('ADMIN', '/report/*'),
('ADMIN', '/report/index'),
('ADMIN', '/report/report1'),
('ADMIN', '/report/report2'),
('ADMIN', '/report/report3'),
('ADMIN', '/report/report4'),
('ADMIN', '/tool/*'),
('ADMIN', '/tool/index');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casemedicine`
--

CREATE TABLE `casemedicine` (
  `ID` int(11) NOT NULL COMMENT 'ID',
  `idcase` int(11) NOT NULL COMMENT 'IDCASE',
  `idmedicine` bigint(100) NOT NULL COMMENT 'idmedicine',
  `medicinepackage_id` int(11) NOT NULL COMMENT 'บรรจุภัณฑ์',
  `qty` int(11) NOT NULL COMMENT 'จำนวน',
  `note` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `expired_date` date NOT NULL COMMENT 'วันหมดอายุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `casepatient`
--

CREATE TABLE `casepatient` (
  `idcase` int(11) NOT NULL COMMENT 'IDCASE',
  `case_detail` longtext COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  `timestam` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dispense` int(11) DEFAULT '0' COMMENT 'จ่ายยา',
  `idservices` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'บริการที่ได้รับ',
  `casetype_idcasetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภทอาการเจ็บป่วย',
  `p_pid` bigint(13) NOT NULL COMMENT 'รหัสบัตรประชาชน',
  `p_sid` bigint(13) NOT NULL COMMENT 'รหัสนักศึกษา',
  `iddoctor` int(11) NOT NULL COMMENT 'แพทย์ผู้ตรวจ',
  `nurse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casepatient`
--

INSERT INTO `casepatient` (`idcase`, `case_detail`, `timestam`, `dispense`, `idservices`, `casetype_idcasetype`, `p_pid`, `p_sid`, `iddoctor`, `nurse_id`) VALUES
(9, '', '2017-08-18 05:05:56', 0, '1,2,4,5,6,11', '1,2,5,6,7,9,10,13,14,15', 1111111111111, 1111111111112, 1, 1),
(10, '', '2017-08-18 12:37:45', 0, '6', '1', 1111111111111, 1111111111112, 1, 2),
(11, '', '2017-08-19 05:48:34', 0, '11', '4,6,9', 1111111111111, 1111111111112, 2, 2),
(12, '', '2017-08-19 05:53:54', 0, '2,3,5,6,11', '2,4', 1111111111111, 1111111111112, 2, 2),
(14, '', '2017-08-19 06:50:41', 0, '1,2,3,4', '1,3,5,6', 1111111111111, 1111111111112, 1, 1),
(15, '', '2017-08-19 08:06:41', 0, '2,3,5,6,7', '3,7,9,10', 1111111111111, 1111111111112, 2, 1),
(16, 'sds', '2017-08-30 14:00:08', 0, '1,2', '1', 1679900327554, 5802041420158, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `casetype`
--

CREATE TABLE `casetype` (
  `idcasetype` int(11) NOT NULL COMMENT 'ID',
  `casetype` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภทอาการเจ็บป่วย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casetype`
--

INSERT INTO `casetype` (`idcasetype`, `casetype`) VALUES
(1, 'ปวดศรีษะ'),
(2, 'ไข้'),
(3, 'ไอ'),
(4, 'เจ็บคอ'),
(5, 'มีน้ำมูก'),
(6, 'ท้องเสีย'),
(7, 'ปวดกล้ามเนื้อ'),
(8, 'กระเพาะ'),
(9, 'ปวดท้องประจำเดือน'),
(10, 'ผื่น(แพ้)'),
(11, 'เจ็บตา คันตา'),
(12, 'ปวดฟัน เหงือก'),
(13, 'ปวดหู'),
(14, 'stress'),
(15, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `iddepartment` int(11) NOT NULL COMMENT 'ID',
  `department_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ภาควิชา',
  `department_name2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ภาควิชา(ชื่อย่อ)',
  `idfaculty` int(11) NOT NULL COMMENT 'คณะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`iddepartment`, `department_name`, `department_name2`, `idfaculty`) VALUES
(1, 'คอมพิวเตอร์', 'TCT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `iddoctor` int(11) NOT NULL COMMENT 'ID',
  `doctor` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แพทย์ผู้ตรวจ',
  `doctortype_id` int(11) NOT NULL COMMENT 'ประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`iddoctor`, `doctor`, `doctortype_id`) VALUES
(1, 'ไม่มี', 1),
(2, 'ธนวัฒน์ ไม่สุภาพ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctortype`
--

CREATE TABLE `doctortype` (
  `id` int(11) NOT NULL,
  `doctortype` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctortype`
--

INSERT INTO `doctortype` (`id`, `doctortype`) VALUES
(1, 'ไม่มี'),
(2, 'แพทย์ทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `idfaculty` int(11) NOT NULL COMMENT 'ID',
  `faculty` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'คณะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`idfaculty`, `faculty`) VALUES
(1, 'ครุศาสตร์อุตสาหกรรม');

-- --------------------------------------------------------

--
-- Table structure for table `inlocattype`
--

CREATE TABLE `inlocattype` (
  `idinlocattype` int(11) NOT NULL COMMENT 'ID',
  `inlocattype` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicaltreatment`
--

CREATE TABLE `medicaltreatment` (
  `idmedicaltreatment` int(11) NOT NULL COMMENT 'ID',
  `medicaltreatment` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การรักษาพยาบาล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `idmedicine` bigint(100) NOT NULL COMMENT 'รหัสยา',
  `medicine` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อยา',
  `idmedicinetype` int(11) NOT NULL COMMENT 'ประเภทยา',
  `medicinesize` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ขนาด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`idmedicine`, `medicine`, `idmedicinetype`, `medicinesize`) VALUES
(1, 'Bisolvon', 1, '1'),
(111111, 'wdqwdw', 1, '1x1000'),
(12346843, 'Akoko', 1, '1x1000'),
(111111111111, 'dfdsf', 1, '1x1000');

-- --------------------------------------------------------

--
-- Table structure for table `medicinepackage`
--

CREATE TABLE `medicinepackage` (
  `id` int(11) NOT NULL,
  `package` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'บรรจุภัณฑ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicinepackage`
--

INSERT INTO `medicinepackage` (`id`, `package`) VALUES
(1, 'เม็ด'),
(2, 'ซอง');

-- --------------------------------------------------------

--
-- Table structure for table `medicinestock`
--

CREATE TABLE `medicinestock` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `medicine_idmedicine` bigint(100) NOT NULL COMMENT 'ชื่อยา',
  `medicinepackage_id` int(11) NOT NULL COMMENT 'บรรจุภัณฑ์',
  `expired_date` date NOT NULL COMMENT 'วันหมดอายุ',
  `qty` int(11) NOT NULL COMMENT 'จำนวน',
  `timestam` timestamp(1) NULL DEFAULT CURRENT_TIMESTAMP(1) COMMENT 'วันที่เพิ่มยา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicinetype`
--

CREATE TABLE `medicinetype` (
  `idmedicinetype` int(11) NOT NULL COMMENT 'ID',
  `medicinetype` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภทยา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicinetype`
--

INSERT INTO `medicinetype` (`idmedicinetype`, `medicinetype`) VALUES
(1, '01 ยาทางเดินหายใจ'),
(2, '02 ยากระดูกและข้อ');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(3, ' <i class=\"fa fa-home\"></i> <span>หน้าแรก</span>', NULL, '/home/index', 1, NULL),
(4, ' <i class=\"fa fa-heartbeat\"></i> <span>งานพยาบาล</span>', NULL, '/nurseservice/index', 2, NULL),
(5, '<i class=\"fa fa-folder\"></i> <span>งานเวชระเบียน</span>', NULL, '/medicalrecords/index', 3, NULL),
(6, '<i class=\"fa fa-book\"></i> <span>รายงาน</span>', NULL, '/report/index', 5, NULL),
(7, 'การให้บริการ-ในเวลาราชการ', 6, '/report/report1', 1, NULL),
(8, 'การให้บริการ-นอกเวลาราชการ', 6, '/report/report2', 2, NULL),
(9, 'การปฏิบัติงานของเจ้าหน้าที่', 6, '/report/report3', 3, NULL),
(10, 'การปฏิบัติงานของเจ้าหน้าที่ไม่รวมวันเสาร์', 6, '/report/report4', 4, NULL),
(11, '<i class=\"fa fa-suitcase\"></i> <span>เครื่องมือ</span>', NULL, '/tool/index', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `usertype_ut_id` int(11) NOT NULL COMMENT 'สายงาน',
  `n_status` int(11) DEFAULT '0' COMMENT 'การใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `name`, `usertype_ut_id`, `n_status`) VALUES
(1, 'พยาบาลคนที่ 1', 1, NULL),
(2, 'พยาบาลคนที่ 2', 1, NULL),
(3, 'เวชระเบียนคนที่ 1', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nursetype`
--

CREATE TABLE `nursetype` (
  `ut_id` int(11) NOT NULL COMMENT 'ID',
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nursetype`
--

INSERT INTO `nursetype` (`ut_id`, `type`) VALUES
(1, 'พยาบาล'),
(2, 'เวรระเบียน');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_pid` bigint(13) NOT NULL COMMENT 'รหัสบัตรประชาชน',
  `p_sid` bigint(13) NOT NULL COMMENT 'รหัสนักศึกษา',
  `p_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `p_surname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'นามสกุล',
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพศ',
  `p_birthday` date DEFAULT NULL COMMENT 'วันเกิด',
  `p_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่อยู่',
  `p_tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทร',
  `p_allegy` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประวัติแพ้ยา',
  `p_disease` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'โรคประจำตัว',
  `documentindex` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่เก็บเอกสาร',
  `status_id` int(11) NOT NULL COMMENT 'สถานภาพ',
  `department_id` int(11) NOT NULL COMMENT 'ภาควิชา/ส่วนงาน',
  `studentclass_id` int(11) NOT NULL COMMENT 'ระดับชั้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_pid`, `p_sid`, `p_name`, `p_surname`, `sex`, `p_birthday`, `p_address`, `p_tel`, `p_allegy`, `p_disease`, `documentindex`, `status_id`, `department_id`, `studentclass_id`) VALUES
(1111111111111, 1111111111112, 'ปาม', 'สวยจัง', 'หญิง', '2017-08-15', '123', '0947777777', 'no', 'no', '60-111', 1, 1, 1),
(1679900327554, 5802041420158, 'ประสิทธิพงษ์', 'คำป้อง', 'ชาย', '2017-08-01', '123', '0947777777', 'no', 'no', '60-100', 1, 1, 1),
(2222222222222, 2222222222221, 'ทาปะนี', 'เอียดศรีชัย', 'หญิง', '1995-07-12', 'อิอิ', '0946360493', 'no', 'no', '60-100', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `idservices` int(11) NOT NULL COMMENT 'ID',
  `services` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'บริการที่ได้รับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`idservices`, `services`) VALUES
(1, 'เบิกยา'),
(2, 'ทำแผล'),
(3, 'แนะนำ'),
(4, 'ส่ง ร.พ.'),
(5, 'หยอดตา ล้างตา'),
(6, 'สังเกตอาการ'),
(7, 'นอนพัก'),
(8, 'ประคบร้อน เย็น'),
(9, 'เศษเหล็ก'),
(10, 'Mask'),
(11, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL COMMENT 'ID',
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'นักศึกษา'),
(2, 'อาจารย์'),
(3, 'เจ้าหน้าที่'),
(4, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `studentclass_id` int(11) NOT NULL COMMENT 'ID',
  `studentclass` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ระดับชั้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`studentclass_id`, `studentclass`) VALUES
(1, 'ปริญญาตรี');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'บัญชีผู้ใช้',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `password_reset_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `status` int(11) NOT NULL DEFAULT '10' COMMENT 'Status',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `u_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `u_surname` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสุล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `u_name`, `u_surname`) VALUES
(1, 'kim', 'test-100', 'kim', 'tttt', 'g.com', 10, NULL, NULL, 'ADMIN', 'KIM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accident`
--
ALTER TABLE `accident`
  ADD PRIMARY KEY (`idaccident`,`accidenttype_idaccidenttype`,`medicaltreatment_idmedicaltreatment`,`p_pid`,`p_sid`,`inlocattype_idinlocattype`,`nurse_id`),
  ADD KEY `fk_accident_accidenttype1_idx` (`accidenttype_idaccidenttype`),
  ADD KEY `fk_accident_medicaltreatment1_idx` (`medicaltreatment_idmedicaltreatment`),
  ADD KEY `fk_accident_patient1_idx` (`p_pid`,`p_sid`),
  ADD KEY `fk_accident_inlocattype1_idx` (`inlocattype_idinlocattype`),
  ADD KEY `fk_accident_nurse1_idx` (`nurse_id`);

--
-- Indexes for table `accidenttype`
--
ALTER TABLE `accidenttype`
  ADD PRIMARY KEY (`idaccidenttype`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`,`patient_p_pid`,`patient_p_sid`,`doctor_iddoctor`,`nurse_id`),
  ADD KEY `fk_table1_patient1_idx` (`patient_p_pid`,`patient_p_sid`),
  ADD KEY `fk_table1_casetype1_idx` (`casetype_idcasetype`),
  ADD KEY `fk_table1_doctor1_idx` (`doctor_iddoctor`),
  ADD KEY `fk_appointment_nurse1_idx` (`nurse_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `casemedicine`
--
ALTER TABLE `casemedicine`
  ADD PRIMARY KEY (`ID`,`idcase`,`idmedicine`,`medicinepackage_id`),
  ADD KEY `fk_case_has_medicine_medicine1_idx` (`idmedicine`),
  ADD KEY `fk_case_has_medicine_case1_idx` (`idcase`),
  ADD KEY `fk_case_has_medicine_medicinepackage1_idx` (`medicinepackage_id`);

--
-- Indexes for table `casepatient`
--
ALTER TABLE `casepatient`
  ADD PRIMARY KEY (`idcase`,`p_pid`,`p_sid`,`iddoctor`,`nurse_id`),
  ADD KEY `fk_case_services1_idx` (`idservices`),
  ADD KEY `fk_case_patient_patient1_idx` (`p_pid`,`p_sid`),
  ADD KEY `fk_casePatient_casetype1_idx` (`casetype_idcasetype`),
  ADD KEY `fk_casepatient_doctor1_idx` (`iddoctor`),
  ADD KEY `fk_casepatient_nurse1_idx` (`nurse_id`);

--
-- Indexes for table `casetype`
--
ALTER TABLE `casetype`
  ADD PRIMARY KEY (`idcasetype`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`iddepartment`,`idfaculty`),
  ADD KEY `fk_department_faculty1_idx` (`idfaculty`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`iddoctor`,`doctortype_id`),
  ADD KEY `fk_doctor_doctortype1_idx` (`doctortype_id`);

--
-- Indexes for table `doctortype`
--
ALTER TABLE `doctortype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idfaculty`);

--
-- Indexes for table `inlocattype`
--
ALTER TABLE `inlocattype`
  ADD PRIMARY KEY (`idinlocattype`);

--
-- Indexes for table `medicaltreatment`
--
ALTER TABLE `medicaltreatment`
  ADD PRIMARY KEY (`idmedicaltreatment`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`idmedicine`,`idmedicinetype`),
  ADD KEY `fk_medicine_medicinetype1_idx` (`idmedicinetype`);

--
-- Indexes for table `medicinepackage`
--
ALTER TABLE `medicinepackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinestock`
--
ALTER TABLE `medicinestock`
  ADD PRIMARY KEY (`id`,`medicine_idmedicine`,`medicinepackage_id`),
  ADD KEY `fk_medicinestock_medicine1_idx` (`medicine_idmedicine`),
  ADD KEY `fk_medicinestock_medicinepackage1_idx` (`medicinepackage_id`);

--
-- Indexes for table `medicinetype`
--
ALTER TABLE `medicinetype`
  ADD PRIMARY KEY (`idmedicinetype`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`,`usertype_ut_id`),
  ADD KEY `fk_nurse_usertype1_idx` (`usertype_ut_id`);

--
-- Indexes for table `nursetype`
--
ALTER TABLE `nursetype`
  ADD PRIMARY KEY (`ut_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_pid`,`p_sid`,`status_id`,`department_id`,`studentclass_id`),
  ADD KEY `fk_patient_status1_idx` (`status_id`),
  ADD KEY `fk_patient_department1_idx` (`department_id`),
  ADD KEY `fk_patient_class1_idx` (`studentclass_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`idservices`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`studentclass_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accident`
--
ALTER TABLE `accident`
  MODIFY `idaccident` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `casemedicine`
--
ALTER TABLE `casemedicine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `casepatient`
--
ALTER TABLE `casepatient`
  MODIFY `idcase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'IDCASE', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `casetype`
--
ALTER TABLE `casetype`
  MODIFY `idcasetype` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `iddepartment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `iddoctor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doctortype`
--
ALTER TABLE `doctortype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idfaculty` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicinepackage`
--
ALTER TABLE `medicinepackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medicinestock`
--
ALTER TABLE `medicinestock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT for table `medicinetype`
--
ALTER TABLE `medicinetype`
  MODIFY `idmedicinetype` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nursetype`
--
ALTER TABLE `nursetype`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `idservices` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `studentclass_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accident`
--
ALTER TABLE `accident`
  ADD CONSTRAINT `fk_accident_accidenttype1` FOREIGN KEY (`accidenttype_idaccidenttype`) REFERENCES `accidenttype` (`idaccidenttype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accident_inlocattype1` FOREIGN KEY (`inlocattype_idinlocattype`) REFERENCES `inlocattype` (`idinlocattype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accident_medicaltreatment1` FOREIGN KEY (`medicaltreatment_idmedicaltreatment`) REFERENCES `medicaltreatment` (`idmedicaltreatment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accident_nurse1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accident_patient1` FOREIGN KEY (`p_pid`,`p_sid`) REFERENCES `patient` (`p_pid`, `p_sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_nurse1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_doctor1` FOREIGN KEY (`doctor_iddoctor`) REFERENCES `doctor` (`iddoctor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_patient1` FOREIGN KEY (`patient_p_pid`,`patient_p_sid`) REFERENCES `patient` (`p_pid`, `p_sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `casemedicine`
--
ALTER TABLE `casemedicine`
  ADD CONSTRAINT `fk_case_has_medicine_case1` FOREIGN KEY (`idcase`) REFERENCES `casepatient` (`idcase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_case_has_medicine_medicine1` FOREIGN KEY (`idmedicine`) REFERENCES `medicine` (`idmedicine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_case_has_medicine_medicinepackage1` FOREIGN KEY (`medicinepackage_id`) REFERENCES `medicinepackage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `casepatient`
--
ALTER TABLE `casepatient`
  ADD CONSTRAINT `fk_case_patient_patient1` FOREIGN KEY (`p_pid`,`p_sid`) REFERENCES `patient` (`p_pid`, `p_sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_casepatient_doctor1` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoctor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_casepatient_nurse1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_department_faculty1` FOREIGN KEY (`idfaculty`) REFERENCES `faculty` (`idfaculty`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `fk_doctor_doctortype1` FOREIGN KEY (`doctortype_id`) REFERENCES `doctortype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `fk_medicine_medicinetype1` FOREIGN KEY (`idmedicinetype`) REFERENCES `medicinetype` (`idmedicinetype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medicinestock`
--
ALTER TABLE `medicinestock`
  ADD CONSTRAINT `fk_medicinestock_medicine1` FOREIGN KEY (`medicine_idmedicine`) REFERENCES `medicine` (`idmedicine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medicinestock_medicinepackage1` FOREIGN KEY (`medicinepackage_id`) REFERENCES `medicinepackage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `fk_nurse_usertype1` FOREIGN KEY (`usertype_ut_id`) REFERENCES `nursetype` (`ut_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_patient_class1` FOREIGN KEY (`studentclass_id`) REFERENCES `studentclass` (`studentclass_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`iddepartment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
