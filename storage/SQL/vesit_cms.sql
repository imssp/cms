-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2017 at 01:17 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vesit_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `AppId` int(11) NOT NULL,
  `AppType` varchar(100) NOT NULL,
  `UID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Electronics'),
(2, 'Instrumentation'),
(3, 'Computers'),
(4, 'Electronics and Telecommunication'),
(5, 'Information Technology'),
(6, 'MCA'),
(7, 'Humanities and Science');

-- --------------------------------------------------------

--
-- Table structure for table `dept_log`
--

CREATE TABLE `dept_log` (
  `dept_log_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_log`
--

INSERT INTO `dept_log` (`dept_log_id`, `e_id`, `department_id`, `start_date`, `end_date`) VALUES
(1, 1, 3, '2000-11-13', '2010-11-04'),
(2, 2, 5, '2010-06-22', '2016-04-01'),
(4, 4, 7, '2015-05-11', '2016-05-11'),
(5, 5, 4, '2000-06-16', '2012-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `design_log`
--

CREATE TABLE `design_log` (
  `design_log_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design_log`
--

INSERT INTO `design_log` (`design_log_id`, `e_id`, `designation`, `start_date`, `end_date`) VALUES
(1, 1, 'Assistant Professor', '2007-06-04', '2015-06-03'),
(2, 2, 'Assistant Professor', '2010-06-04', '2016-04-16'),
(3, 3, 'Professor', '2010-01-01', NULL),
(4, 4, 'Assistant Professor', '2015-06-25', NULL),
(5, 5, 'Lab Assistant', '2001-01-01', '2010-02-01'),
(6, 1, 'Professor', '2015-06-04', '2017-06-04'),
(7, 6, 'Lab Assistant', '1998-08-13', NULL),
(8, 6, 'Lab Assistant', '1998-08-13', NULL),
(13, 1, 'HOD', '2017-06-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsepreacademic`
--

CREATE TABLE `dsepreacademic` (
  `UID` int(11) NOT NULL,
  `SSC` varchar(5) NOT NULL,
  `SEM5` varchar(5) NOT NULL,
  `SEM6` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `e_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-teachinh  0-non-teaching',
  `first_name` varchar(40) NOT NULL,
  `mid_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1-M , 0-F',
  `email` varchar(40) NOT NULL,
  `mobile` char(10) NOT NULL,
  `landline` varchar(14) DEFAULT NULL,
  `address` text NOT NULL,
  `pincode` char(6) NOT NULL,
  `aadhaar_id` char(16) NOT NULL,
  `concol` varchar(20) NOT NULL,
  `pancard` varchar(12) NOT NULL,
  `doj` date NOT NULL,
  `dol` date DEFAULT NULL,
  `probation_start` date DEFAULT NULL,
  `probation_end` date DEFAULT NULL,
  `Expertise` varchar(1000) DEFAULT NULL,
  `NoOfResearchPapers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`e_id`, `type`, `first_name`, `mid_name`, `last_name`, `dob`, `gender`, `email`, `mobile`, `landline`, `address`, `pincode`, `aadhaar_id`, `concol`, `pancard`, `doj`, `dol`, `probation_start`, `probation_end`, `Expertise`, `NoOfResearchPapers`) VALUES
(1, 1, 'Amit ', NULL, 'Singh', '1984-06-07', 1, 'amit.singh@ves.ac.in', '8528528528', '0251258258', 'Kalyan', '420142', '1234567899876541', '12345', '1234567891', '2000-11-04', NULL, '2000-11-04', '2002-11-04', 'Java', 4),
(2, 1, 'Parth', NULL, 'Chandara', '1990-06-20', 1, 'parth@ves.ac.in', '9874563210', NULL, 'Chembur', '456987', '1234567891234567', '12345', '12345678951', '2010-06-21', NULL, '2010-06-21', '2012-06-21', 'PHP,Web,Python', 2),
(3, 1, 'Anjali', NULL, 'Yeole', '1987-01-04', 0, 'anjali.yeole@ves.ac.in', '9874563215', '02285487', '505 , Exim-link  apartment , Pencil factory road , Thane ', '400601', '7412589632145698', '32145', 'A12D56T85125', '2002-05-07', NULL, '2002-05-07', '2004-05-07', 'Data Structures,Perl', 3),
(4, 1, 'Sukanya', NULL, 'Roychoudhary', '1990-02-02', 0, 'sukanya.roychoudhary@ves.ac.in', '8522654987', '02245986', 'Panvel', '400069', '456987123ASDFGHJ', '52864', '741258963DFG', '2015-05-10', NULL, NULL, NULL, 'Networking', 1),
(5, 0, 'Abid', '', 'Inamdar', '1986-06-16', 1, 'abid@gmail.com', '1245789630', NULL, '1807, Daffodil, Govandi', '400088', '1245789630147852', '1245784454', '125849630j2', '2000-06-15', NULL, NULL, NULL, 'Data Structure', 2),
(6, 0, 'Vishal', NULL, 'Israni', '1973-06-08', 1, 'vishal@gmail.com', '2587413690', NULL, 'Ulahsnagar, Mumbai', '400078', '2287413214569871', '12457814', '0147i2145', '1998-08-11', NULL, NULL, NULL, 'OOPM', 3),
(7, 0, 'Shobha', NULL, 'Krishnan', '1987-04-12', 0, 'shobha.krishnan@ves.ac.in', '7894561230', NULL, 'mumbai', '421201', '798456132798456', '12345', '1323464', '2000-12-13', NULL, '2000-12-13', '2002-12-13', 'Electronics', 1),
(8, 1, 'A', NULL, 'Naganada', '1988-03-12', 1, 'a.nagananda@ves.ac.in', '9864571235', NULL, 'Mumbai', '400191', '8794561238794651', '879', '789465', '2012-01-12', NULL, '2012-01-12', '2014-01-12', 'Java', 2),
(9, 1, 'C', 'S', 'Rawat', '1994-06-15', 1, 'c.rawat@ves.ac.in', '8945612371', NULL, 'Mumbai', '421012', '9877464621612654', '485', '02485', '2015-12-01', NULL, NULL, NULL, NULL, 0),
(10, 0, 'Manisha', NULL, 'Chattopadhaya', '1998-12-12', 0, 'manisha.chattopadhaya@ves.ac.in', '7946894121', NULL, 'Kalyan', '421212', '9875641554854212', '1233', '448451', '2011-02-04', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fepreacademic`
--

CREATE TABLE `fepreacademic` (
  `UID` int(11) NOT NULL,
  `SSC` varchar(10) DEFAULT NULL,
  `HSC` varchar(10) DEFAULT NULL,
  `JEE_PHY` int(11) DEFAULT NULL,
  `JEE_CHE` int(11) DEFAULT NULL,
  `JEE_MAT` int(11) DEFAULT NULL,
  `JEE` int(11) DEFAULT NULL,
  `CET` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `non_teaching_staff`
--

CREATE TABLE `non_teaching_staff` (
  `e_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-Permanent 0-Adhoc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_teaching_staff`
--

INSERT INTO `non_teaching_staff` (`e_id`, `department_id`, `start_date`, `type`) VALUES
(5, 3, '2012-06-16', 1),
(6, 5, '2002-08-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qual_log`
--

CREATE TABLE `qual_log` (
  `Qual_log_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `q_year` year(4) NOT NULL,
  `q_institute` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qual_log`
--

INSERT INTO `qual_log` (`Qual_log_id`, `e_id`, `qualification`, `q_year`, `q_institute`) VALUES
(1, 1, 'BE', 1996, 'VESIT'),
(2, 1, 'ME', 2000, 'VESIT'),
(3, 2, 'B.TECH', 2000, 'K.J.Somaiya'),
(4, 3, 'BE', 1999, 'Thadomal Shahani'),
(5, 4, 'BE', 2003, 'VJTI'),
(6, 3, 'ME', 2002, 'VJTI'),
(7, 5, 'BE', 2008, 'VESIT'),
(8, 6, 'B.TECH', 2005, 'D.J.Sanghvi'),
(9, 1, 'PhD', 2005, 'Don Bosco');

-- --------------------------------------------------------

--
-- Table structure for table `shift_log`
--

CREATE TABLE `shift_log` (
  `shift_log_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_log`
--

INSERT INTO `shift_log` (`shift_log_id`, `e_id`, `shift`, `start_date`, `end_date`) VALUES
(1, 3, 'Morning', '2002-05-08', '2005-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `studcomment`
--

CREATE TABLE `studcomment` (
  `cid` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studcomment`
--

INSERT INTO `studcomment` (`cid`, `e_id`, `UID`, `comment`) VALUES
(1, 1, 16000015, 'This is a test comment'),
(2, 3, 16000015, 'This is the second comment');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `UID` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Gender` tinyint(1) NOT NULL COMMENT '1-Male 0-Female',
  `DOB` date NOT NULL,
  `TypeOfAdmission` tinyint(1) NOT NULL COMMENT '0-FE 1-DSE',
  `AdmissionYear` year(4) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `SecEmailId` varchar(200) NOT NULL,
  `PermanentAddress` varchar(1000) NOT NULL,
  `TempAddress` varchar(1000) NOT NULL,
  `std_code` varchar(5) NOT NULL,
  `LandlineNo` varchar(15) NOT NULL,
  `MobileNo` varchar(11) NOT NULL,
  `AadharCard` varchar(16) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `AddCategory` varchar(10) NOT NULL,
  `IsBranchChanged` tinyint(1) NOT NULL COMMENT '1-Yes 0-No',
  `Mentor` varchar(50) NOT NULL,
  `BloodGroup` varchar(4) NOT NULL,
  `Fathers_Name` varchar(20) NOT NULL,
  `Fathers_No` varchar(10) NOT NULL,
  `Mothers_Name` varchar(20) NOT NULL,
  `Mothers_No` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`UID`, `FirstName`, `MiddleName`, `LastName`, `Branch`, `Class`, `Gender`, `DOB`, `TypeOfAdmission`, `AdmissionYear`, `EmailId`, `SecEmailId`, `PermanentAddress`, `TempAddress`, `std_code`, `LandlineNo`, `MobileNo`, `AadharCard`, `Category`, `AddCategory`, `IsBranchChanged`, `Mentor`, `BloodGroup`, `Fathers_Name`, `Fathers_No`, `Mothers_Name`, `Mothers_No`, `image`) VALUES
(16000015, 'Ramesh', 'Kishan', 'Rathore', 'INFT', 'D10', 1, '1996-06-23', 0, 2016, 'ramesh.rathore@ves.ac.in', 'rameshrathore@yahoo.com', '2/4, rathore road, shastri nagar, Chembur,Mumbai-400072', '16/4, Minister road, kishan nagar, Chembur,Mumbai-400072', '022', '23657845', '9654782365', '9887665412363365', 'OPEN', '', 1, '', 'B+', 'Kishan', '9864356734', 'Reshma', '7843986587', 'https://goo.gl/WKLjE8'),
(16000016, 'Talitha', 'Shalanda', 'Demetrius', 'extc', 'd6', 1, '2009-01-13', 0, 2016, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine64', 'TaddressLine64', '22', '12345741', '9812345733', '1234567890000064', 'gen', 'goi', 1, '', 'B+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(16000017, 'Kathy', 'Samual', 'Sharda', 'inft', 'd1a', 0, '2009-01-16', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine67', 'TaddressLine67', '22', '12345744', '9812345736', '1234567890000067', 'st', '', 0, '', 'A+', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000018, 'Tamisha', 'Guillermo', 'Mariann', 'inst', 'd2c', 1, '2009-01-20', 0, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine71', 'TaddressLine71', '22', '12345748', '9812345740', '1234567890000071', 'sindhi', '', 1, '', 'A+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000019, 'Yu', 'Yen', 'Thad', 'cmpn', 'd1a', 1, '2009-01-24', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine75', 'TaddressLine75', '22', '12345752', '9812345744', '1234567890000075', 'sc', 'goi', 0, '', 'A+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000020, 'Ute', 'Donnetta', 'Joanna', 'cmpn', 'd2c', 0, '2009-01-28', 0, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine79', 'TaddressLine79', '22', '12345756', '9812345748', '1234567890000079', 'gen', 'tfws', 1, '', 'A+', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000021, 'Esperanza', 'Dewayne', 'Yun', 'extc', 'd1a', 0, '2009-02-01', 0, 2016, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine83', 'TaddressLine83', '22', '12345760', '9812345752', '1234567890000083', 'sindhi', 'jk', 1, '', 'B+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(16000022, 'Rhona', 'Lori', 'Takisha', 'inst', 'd17', 0, '2009-02-08', 0, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine90', 'TaddressLine90', '22', '12345767', '9812345759', '1234567890000090', 'sc', '', 1, '', 'A+', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000023, 'Rosemarie', 'Jacob', 'Daniela', 'cmpn', 'd2b', 1, '2009-02-12', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine94', 'TaddressLine94', '22', '12345771', '9812345763', '1234567890000094', 'st', '', 0, '', 'A+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000024, 'Temeka', 'Margart', 'Ebony', 'cmpn', 'd20', 1, '2009-02-16', 0, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine98', 'TaddressLine98', '22', '12345775', '9812345767', '1234567890000098', 'sindhi', '', 1, '', 'A+', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000025, 'Beatrice', 'Dyan', 'Deedee', 'extc', 'd1b', 0, '2009-02-20', 0, 2016, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine102', 'TaddressLine102', '22', '12345779', '9812345771', '1234567890000102', 'sc', '', 1, '', 'A+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(16000026, 'Emil', 'Lyn', 'Myung', 'cmpn', 'd3', 1, '2009-02-24', 0, 2016, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine106', 'TaddressLine106', '22', '12345783', '9812345775', '1234567890000106', 'sc', '', 1, '', 'A+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(16000027, 'Twyla', 'Eun', 'Chana', 'inft', 'd1b', 1, '2009-02-28', 0, 2016, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine110', 'TaddressLine110', '22', '12345787', '9812345779', '1234567890000110', 'gen', '', 1, '', 'A+', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(16000028, 'Shanti', 'Tilda', 'Arthur', 'cmpn', 'd2c', 1, '2009-03-03', 0, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine113', 'TaddressLine113', '22', '12345790', '9812345782', '1234567890000113', 'gen', 'jk', 1, '', 'A+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000029, 'Sherwood', 'Mui', 'Violet', 'cmpn', 'd1a', 1, '2009-03-07', 0, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine117', 'TaddressLine117', '22', '12345794', '9812345786', '1234567890000117', 'obc', 'goi', 1, '', 'A-', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000030, 'Mauro', 'Anna', 'Laticia', 'extc', 'd2c', 0, '2009-03-11', 0, 2016, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine121', 'TaddressLine121', '22', '12345798', '9812345790', '1234567890000121', 'sc', 'tfws', 1, '', 'A+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(16000031, 'Laquita', 'Margene', 'Virgen', 'cmpn', 'd1a', 1, '2009-03-15', 0, 2016, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine125', 'TaddressLine125', '22', '12345802', '9812345794', '1234567890000125', 'st', 'jk', 1, '', 'A+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(16000032, 'Myra', 'Halley', 'Georgann', 'inft', 'd2c', 1, '2009-03-19', 0, 2016, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine129', 'TaddressLine129', '22', '12345806', '9812345798', '1234567890000129', 'sindhi', 'goi', 1, '', 'A+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(16000033, 'Sharilyn', 'Francie', 'Jenelle', 'cmpn', 'd14', 1, '2009-03-22', 0, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine132', 'TaddressLine132', '22', '12345809', '9812345801', '1234567890000132', 'sindhi', '', 1, '', 'AB+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000034, 'Nancey', 'Blanca', 'Bertha', 'cmpn', 'd2b', 1, '2009-03-26', 0, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine136', 'TaddressLine136', '22', '12345813', '9812345805', '1234567890000136', 'nt', '', 1, '', 'AB+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000035, 'Inocencia', 'Shana', 'Esther', 'extc', 'd17', 0, '2009-03-30', 0, 2016, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine140', 'TaddressLine140', '22', '12345817', '9812345809', '1234567890000140', 'gen', '', 1, '', 'AB+', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(16000036, 'Marion', 'Shantell', 'Latonya', 'cmpn', 'd2b', 0, '2009-04-03', 1, 2016, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine144', 'TaddressLine144', '22', '12345821', '9812345813', '1234567890000144', 'obc', 'tfws', 0, '', 'A+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(16000037, 'Tressie', 'Amy', 'Columbus', 'inft', 'd20', 1, '2009-04-07', 1, 2016, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine148', 'TaddressLine148', '22', '12345825', '9812345817', '1234567890000148', 'sc', 'jk', 1, '', 'A-', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(16000038, 'Marcy', 'Marge', 'Dorethea', 'cmpn', 'd23', 0, '2009-04-10', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine151', 'TaddressLine151', '22', '12345828', '9812345820', '1234567890000151', 'sc', '', 1, '', 'AB-', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000039, 'Kenna', 'Danae', 'Bonnie', 'cmpn', 'd2b', 1, '2009-04-14', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine155', 'TaddressLine155', '22', '12345832', '9812345824', '1234567890000155', 'gen', '', 1, '', 'AB+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000040, 'Magaret', 'Alva', 'Ludie', 'extc', 'd5', 1, '2009-04-18', 1, 2016, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine159', 'TaddressLine159', '22', '12345836', '9812345828', '1234567890000159', 'sindhi', '', 1, '', 'AB+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(16000041, 'Helga', 'Voncile', 'Chae', 'cmpn', 'd2b', 0, '2009-04-22', 1, 2016, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine163', 'TaddressLine163', '22', '12345840', '9812345832', '1234567890000163', 'nt', '', 1, '', 'AB+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(16000042, 'Talitha', 'Shalanda', 'Demetrius', 'inft', 'd8', 1, '2009-04-26', 1, 2016, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine167', 'TaddressLine167', '22', '12345844', '9812345836', '1234567890000167', 'gen', '', 1, '', 'AB+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(16000043, 'Tamisha', 'Guillermo', 'Mariann', 'cmpn', 'd10', 1, '2009-05-03', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine174', 'TaddressLine174', '22', '12345851', '9812345843', '1234567890000174', 'sindhi', 'tfws', 1, '', 'O+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000044, 'Yu', 'Yen', 'Thad', 'extc', 'd2a', 1, '2009-05-07', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine178', 'TaddressLine178', '22', '12345855', '9812345847', '1234567890000178', 'sc', 'jk', 1, '', 'B+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000045, 'Ute', 'Donnetta', 'Joanna', 'cmpn', 'd13', 0, '2009-05-11', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine182', 'TaddressLine182', '22', '12345859', '9812345851', '1234567890000182', 'gen', 'goi', 0, '', 'AB-', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000046, 'Esperanza', 'Dewayne', 'Yun', 'inft', 'd2a', 0, '2009-05-15', 1, 2016, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine186', 'TaddressLine186', '22', '12345863', '9812345855', '1234567890000186', 'sindhi', 'tfws', 1, '', 'AB+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(16000047, 'Percy', 'Vincenza', 'Claribel', 'cmpn', 'd15', 0, '2009-05-18', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine189', 'TaddressLine189', '22', '12345866', '9812345858', '1234567890000189', 'obc', '', 1, '', 'O+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000048, 'Rhona', 'Lori', 'Takisha', 'cmpn', 'd1b', 0, '2009-05-22', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine193', 'TaddressLine193', '22', '12345870', '9812345862', '1234567890000193', 'sc', '', 1, '', 'O+', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000049, 'Rosemarie', 'Jacob', 'Daniela', 'extc', 'd18', 1, '2009-05-26', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine197', 'TaddressLine197', '22', '12345874', '9812345866', '1234567890000197', 'st', '', 0, '', 'O+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000050, 'Temeka', 'Margart', 'Ebony', 'cmpn', 'd22', 1, '2009-05-30', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine201', 'TaddressLine201', '22', '12345878', '9812345870', '1234567890000201', 'sindhi', '', 1, '', 'O+', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000051, 'Beatrice', 'Dyan', 'Deedee', 'inft', 'd2b', 0, '2009-06-03', 1, 2016, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine205', 'TaddressLine205', '22', '12345882', '9812345874', '1234567890000205', 'sc', '', 0, '', 'O+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(16000052, 'Emil', 'Lyn', 'Myung', 'inst', 'd5', 1, '2009-06-07', 1, 2016, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine209', 'TaddressLine209', '22', '12345886', '9812345878', '1234567890000209', 'sc', '', 1, '', 'B+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(16000053, 'Twyla', 'Eun', 'Chana', 'inst', 'd2b', 1, '2009-06-11', 1, 2016, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine213', 'TaddressLine213', '22', '12345890', '9812345882', '1234567890000213', 'gen', '', 1, '', 'AB-', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(16000054, 'Shanti', 'Tilda', 'Arthur', 'extc', 'd7', 1, '2009-06-14', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine216', 'TaddressLine216', '22', '12345893', '9812345885', '1234567890000216', 'gen', '', 1, '', 'O+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000055, 'Sherwood', 'Mui', 'Violet', 'cmpn', 'd2a', 1, '2009-06-18', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine220', 'TaddressLine220', '22', '12345897', '9812345889', '1234567890000220', 'obc', '', 1, '', 'O+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000056, 'Mauro', 'Anna', 'Laticia', 'inft', 'd10', 0, '2009-06-22', 1, 2016, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine224', 'TaddressLine224', '22', '12345901', '9812345893', '1234567890000224', 'sc', '', 0, '', 'O+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(16000057, 'Laquita', 'Margene', 'Virgen', 'inst', 'd2a', 1, '2009-06-26', 1, 2016, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine228', 'TaddressLine228', '22', '12345905', '9812345897', '1234567890000228', 'st', '', 1, '', 'O+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(16000058, 'Myra', 'Halley', 'Georgann', 'inst', 'd13', 1, '2009-06-30', 1, 2016, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine232', 'TaddressLine232', '22', '12345909', '9812345901', '1234567890000232', 'sindhi', '', 1, '', 'O+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(16000059, 'Sharilyn', 'Francie', 'Jenelle', 'extc', 'd1b', 1, '2009-07-03', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine235', 'TaddressLine235', '22', '12345912', '9812345904', '1234567890000235', 'sindhi', 'goi', 1, '', 'B+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000060, 'Nancey', 'Blanca', 'Bertha', 'cmpn', 'd15', 1, '2009-07-07', 1, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine239', 'TaddressLine239', '22', '12345916', '9812345908', '1234567890000239', 'nt', 'tfws', 1, '', 'A+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000061, 'Inocencia', 'Shana', 'Esther', 'inft', 'd1b', 0, '2009-07-11', 1, 2016, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine243', 'TaddressLine243', '22', '12345920', '9812345912', '1234567890000243', 'gen', 'jk', 1, '', 'O-', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(16000062, 'Marion', 'Shantell', 'Latonya', 'inst', 'd18', 0, '2009-07-15', 1, 2016, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine247', 'TaddressLine247', '22', '12345924', '9812345916', '1234567890000247', 'obc', 'goi', 1, '', 'O+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(16000063, 'Tressie', 'Amy', 'Columbus', 'inst', 'd22', 1, '2009-07-19', 1, 2016, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine251', 'TaddressLine251', '22', '12345928', '9812345920', '1234567890000251', 'sc', 'tfws', 1, '', 'O+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(16000064, 'Kenna', 'Danae', 'Bonnie', 'cmpn', 'd4', 1, '2009-07-26', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine258', 'TaddressLine258', '22', '12345935', '9812345927', '1234567890000258', 'gen', '', 1, '', 'B+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000065, 'Magaret', 'Alva', 'Ludie', 'inft', 'd2a', 1, '2009-07-30', 1, 2016, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine262', 'TaddressLine262', '22', '12345939', '9812345931', '1234567890000262', 'sindhi', '', 1, '', 'B+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(16000066, 'Helga', 'Voncile', 'Chae', 'inst', 'd7', 0, '2009-08-03', 1, 2016, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine266', 'TaddressLine266', '22', '12345943', '9812345935', '1234567890000266', 'nt', '', 1, '', 'B+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(16000067, 'Talitha', 'Shalanda', 'Demetrius', 'inst', 'd2a', 1, '2009-08-07', 1, 2016, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine270', 'TaddressLine270', '22', '12345947', '9812345939', '1234567890000270', 'gen', '', 1, '', 'A+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(16000068, 'Kathy', 'Samual', 'Sharda', 'extc', 'd9', 0, '2009-08-10', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine273', 'TaddressLine273', '22', '12345950', '9812345942', '1234567890000273', 'st', 'jk', 1, '', 'B-', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000069, 'Tamisha', 'Guillermo', 'Mariann', 'cmpn', 'd1b', 1, '2009-08-14', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine277', 'TaddressLine277', '22', '12345954', '9812345946', '1234567890000277', 'sindhi', 'goi', 1, '', 'B+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000070, 'Yu', 'Yen', 'Thad', 'inft', 'd12', 1, '2009-08-18', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine281', 'TaddressLine281', '22', '12345958', '9812345950', '1234567890000281', 'sc', 'tfws', 1, '', 'B+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000071, 'Ute', 'Donnetta', 'Joanna', 'inst', 'd1b', 0, '2009-08-22', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine285', 'TaddressLine285', '22', '12345962', '9812345954', '1234567890000285', 'gen', '', 1, '', 'B+', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000072, 'Esperanza', 'Dewayne', 'Yun', 'inst', 'd15', 0, '2009-08-26', 1, 2016, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine289', 'TaddressLine289', '22', '12345966', '9812345958', '1234567890000289', 'sindhi', '', 1, '', 'B+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(16000073, 'Percy', 'Vincenza', 'Claribel', 'extc', 'd1a', 0, '2009-08-29', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine292', 'TaddressLine292', '22', '12345969', '9812345961', '1234567890000292', 'obc', 'tfws', 1, '', 'A+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000074, 'Rhona', 'Lori', 'Takisha', 'cmpn', 'd2c', 0, '2009-09-02', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine296', 'TaddressLine296', '22', '12345973', '9812345965', '1234567890000296', 'sc', 'jk', 1, '', 'A+', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000075, 'Rosemarie', 'Jacob', 'Daniela', 'inft', 'd21', 1, '2009-09-06', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine300', 'TaddressLine300', '22', '12345977', '9812345969', '1234567890000300', 'st', 'goi', 0, '', 'B+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000076, 'Temeka', 'Margart', 'Ebony', 'inst', 'd2a', 1, '2009-09-10', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine304', 'TaddressLine304', '22', '12345981', '9812345973', '1234567890000304', 'sindhi', 'tfws', 1, '', 'B-', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000077, 'Beatrice', 'Dyan', 'Deedee', 'inst', 'd4', 0, '2009-09-14', 1, 2016, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine308', 'TaddressLine308', '22', '12345985', '9812345977', '1234567890000308', 'sc', 'jk', 1, '', 'B+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(16000078, 'Emil', 'Lyn', 'Myung', 'cmpn', 'd2a', 1, '2009-09-18', 1, 2016, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine312', 'TaddressLine312', '22', '12345989', '9812345981', '1234567890000312', 'sc', 'goi', 0, '', 'B+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(16000079, 'Twyla', 'Eun', 'Chana', 'extc', 'd7', 1, '2009-09-22', 1, 2016, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine316', 'TaddressLine316', '22', '12345993', '9812345985', '1234567890000316', 'gen', 'tfws', 1, '', 'B+', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(16000080, 'Shanti', 'Tilda', 'Arthur', 'inft', 'd1b', 1, '2009-09-25', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine319', 'TaddressLine319', '22', '12345996', '9812345988', '1234567890000319', 'gen', '', 1, '', 'A+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000081, 'Sherwood', 'Mui', 'Violet', 'inst', 'd9', 1, '2009-09-29', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine323', 'TaddressLine323', '22', '12346000', '9812345992', '1234567890000323', 'obc', '', 1, '', 'A+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000082, 'Mauro', 'Anna', 'Laticia', 'inst', 'd1b', 0, '2009-10-03', 1, 2016, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine327', 'TaddressLine327', '22', '12346004', '9812345996', '1234567890000327', 'sc', '', 0, '', 'A+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(16000083, 'Laquita', 'Margene', 'Virgen', 'cmpn', 'd12', 1, '2009-10-07', 1, 2016, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine331', 'TaddressLine331', '22', '12346008', '9812346000', '1234567890000331', 'st', '', 1, '', 'B+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(16000084, 'Myra', 'Halley', 'Georgann', 'extc', 'd1b', 1, '2009-10-11', 1, 2016, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine335', 'TaddressLine335', '22', '12346012', '9812346004', '1234567890000335', 'sindhi', '', 0, '', 'B-', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(16000085, 'Nancey', 'Blanca', 'Bertha', 'inst', 'd1a', 1, '2009-10-18', 1, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine342', 'TaddressLine342', '22', '12346019', '9812346011', '1234567890000342', 'nt', 'goi', 1, '', 'A+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000086, 'Inocencia', 'Shana', 'Esther', 'inst', 'd2c', 0, '2009-10-22', 1, 2016, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine346', 'TaddressLine346', '22', '12346023', '9812346015', '1234567890000346', 'gen', 'tfws', 1, '', 'A+', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(16000087, 'Marion', 'Shantell', 'Latonya', 'cmpn', 'd21', 0, '2009-10-26', 1, 2016, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine350', 'TaddressLine350', '22', '12346027', '9812346019', '1234567890000350', 'obc', 'jk', 1, '', 'A+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(16000088, 'Tressie', 'Amy', 'Columbus', 'extc', 'd1b', 1, '2009-10-30', 1, 2016, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine354', 'TaddressLine354', '22', '12346031', '9812346023', '1234567890000354', 'sc', 'goi', 0, '', 'A+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(16000089, 'Marcy', 'Marge', 'Dorethea', 'inft', 'd2c', 0, '2009-11-02', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine357', 'TaddressLine357', '22', '12346034', '9812346026', '1234567890000357', 'sc', 'tfws', 1, '', 'AB+', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000090, 'Kenna', 'Danae', 'Bonnie', 'inst', 'd1a', 1, '2009-11-06', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine361', 'TaddressLine361', '22', '12346038', '9812346030', '1234567890000361', 'gen', 'jk', 0, '', 'A+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000091, 'Magaret', 'Alva', 'Ludie', 'inst', 'd2c', 1, '2009-11-10', 1, 2016, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine365', 'TaddressLine365', '22', '12346042', '9812346034', '1234567890000365', 'sindhi', 'goi', 1, '', 'A-', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(16000092, 'Helga', 'Voncile', 'Chae', 'cmpn', 'd1a', 0, '2009-11-14', 1, 2016, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine369', 'TaddressLine369', '22', '12346046', '9812346038', '1234567890000369', 'nt', 'tfws', 1, '', 'A+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(16000093, 'Talitha', 'Shalanda', 'Demetrius', 'extc', 'd2c', 1, '2009-11-18', 1, 2016, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine373', 'TaddressLine373', '22', '12346050', '9812346042', '1234567890000373', 'gen', 'jk', 1, '', 'A+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(16000094, 'Kathy', 'Samual', 'Sharda', 'extc', 'd11', 0, '2009-11-21', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine376', 'TaddressLine376', '22', '12346053', '9812346045', '1234567890000376', 'st', '', 1, '', 'AB+', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000095, 'Tamisha', 'Guillermo', 'Mariann', 'cmpn', 'd2b', 1, '2009-11-25', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine380', 'TaddressLine380', '22', '12346057', '9812346049', '1234567890000380', 'sindhi', '', 0, '', 'AB+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000096, 'Yu', 'Yen', 'Thad', 'inft', 'd14', 1, '2009-11-29', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine384', 'TaddressLine384', '22', '12346061', '9812346053', '1234567890000384', 'sc', '', 1, '', 'AB+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000097, 'Ute', 'Donnetta', 'Joanna', 'inst', 'd2b', 0, '2009-12-03', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine388', 'TaddressLine388', '22', '12346065', '9812346057', '1234567890000388', 'gen', '', 1, '', 'AB+', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000098, 'Esperanza', 'Dewayne', 'Yun', 'cmpn', 'd17', 0, '2009-12-07', 1, 2016, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine392', 'TaddressLine392', '22', '12346069', '9812346061', '1234567890000392', 'sindhi', '', 1, '', 'A+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(16000099, 'Percy', 'Vincenza', 'Claribel', 'extc', 'd2a', 0, '2009-12-10', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine395', 'TaddressLine395', '22', '12346072', '9812346064', '1234567890000395', 'obc', 'goi', 1, '', 'B+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000100, 'Rhona', 'Lori', 'Takisha', 'cmpn', 'd19', 0, '2009-12-14', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine399', 'TaddressLine399', '22', '12346076', '9812346068', '1234567890000399', 'sc', 'tfws', 1, '', 'AB-', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000101, 'Rosemarie', 'Jacob', 'Daniela', 'inft', 'd45', 1, '2009-12-18', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine403', 'TaddressLine403', '22', '12346080', '9812346072', '1234567890000403', 'st', 'jk', 1, '', 'AB+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000102, 'Temeka', 'Margart', 'Ebony', 'inst', 'd1b', 1, '2009-12-22', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine407', 'TaddressLine407', '22', '12346084', '9812346076', '1234567890000407', 'sindhi', 'goi', 1, '', 'AB+', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000103, 'Beatrice', 'Dyan', 'Deedee', 'cmpn', 'd45', 0, '2009-12-26', 1, 2016, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine411', 'TaddressLine411', '22', '12346088', '9812346080', '1234567890000411', 'sc', 'tfws', 1, '', 'AB+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(16000104, 'Emil', 'Lyn', 'Myung', 'cmpn', 'd2a', 1, '2009-12-30', 1, 2016, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine415', 'TaddressLine415', '22', '12346092', '9812346084', '1234567890000415', 'sc', 'jk', 1, '', 'AB+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(16000105, 'Twyla', 'Eun', 'Chana', 'extc', 'd16', 1, '2010-01-03', 1, 2016, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine419', 'TaddressLine419', '22', '12346096', '9812346088', '1234567890000419', 'gen', 'goi', 1, '', 'AB+', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(16000106, 'Sherwood', 'Mui', 'Violet', 'inst', 'd18', 1, '2010-01-10', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine426', 'TaddressLine426', '22', '12346103', '9812346095', '1234567890000426', 'obc', '', 1, '', 'B+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000107, 'Mauro', 'Anna', 'Laticia', 'cmpn', 'd1b', 0, '2010-01-14', 1, 2016, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine430', 'TaddressLine430', '22', '12346107', '9812346099', '1234567890000430', 'sc', 'goi', 0, '', 'AB-', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(16000108, 'Laquita', 'Margene', 'Virgen', 'cmpn', 'd21', 1, '2010-01-18', 1, 2016, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine434', 'TaddressLine434', '22', '12346111', '9812346103', '1234567890000434', 'st', 'tfws', 1, '', 'AB+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(16000109, 'Myra', 'Halley', 'Georgann', 'extc', 'd1b', 1, '2010-01-22', 1, 2016, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine438', 'TaddressLine438', '22', '12346115', '9812346107', '1234567890000438', 'sindhi', 'jk', 1, '', 'AB+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(16000110, 'Sharilyn', 'Francie', 'Jenelle', 'inft', 'd2c', 1, '2010-01-25', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine441', 'TaddressLine441', '22', '12346118', '9812346110', '1234567890000441', 'sindhi', '', 1, '', 'O+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000111, 'Mckenzie', 'Beatrice', 'Quentin', 'inst', 'd1b', 1, '2010-01-29', 1, 2016, 'Quentin.Mckenzie@ves.ac.in', 'Mckenzie@gmail.com', 'PaddressLine445', 'TaddressLine445', '22', '12346122', '9812346114', '1234567890000445', 'sindhi', '', 1, '', 'O+', 'Bernard', '7812345670', 'Lashunda', '8812345670', ''),
(16000112, 'Jerica', 'Randee', 'Gerard', 'cmpn', 'd6', 0, '2010-02-02', 1, 2016, 'Gerard.Jerica@ves.ac.in', 'Jerica@gmail.com', 'PaddressLine449', 'TaddressLine449', '22', '12346126', '9812346118', '1234567890000449', 'nt', '', 1, '', 'O+', 'Logan', '7812345670', 'Elba', '8812345670', ''),
(16000113, 'Shanti', 'Tilda', 'Arthur', 'cmpn', 'd1b', 0, '2010-02-06', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine453', 'TaddressLine453', '22', '12346130', '9812346122', '1234567890000453', 'gen', '', 1, '', 'O+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000114, 'Sherwood', 'Mui', 'Violet', 'extc', 'd9', 1, '2010-02-10', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine457', 'TaddressLine457', '22', '12346134', '9812346126', '1234567890000457', 'obc', '', 0, '', 'B+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000115, 'Laurena', 'Mavis', 'Shad', 'inft', 'd1a', 0, '2010-02-13', 1, 2016, 'Shad.Laurena@ves.ac.in', 'Laurena@gmail.com', 'PaddressLine460', 'TaddressLine460', '22', '12346137', '9812346129', '1234567890000460', 'sindhi', 'goi', 1, '', 'O-', 'Trent', '7812345670', 'Breanna', '8812345670', ''),
(16000116, 'Angelena', 'Cecilia', 'Trinidad', 'inst', 'd2c', 1, '2010-02-17', 1, 2016, 'Trinidad.Angelena@ves.ac.in', 'Angelena@gmail.com', 'PaddressLine464', 'TaddressLine464', '22', '12346141', '9812346133', '1234567890000464', 'sc', 'tfws', 1, '', 'O+', 'Jordan', '7812345670', 'Penni', '8812345670', ''),
(16000117, 'Damien', 'Donette', 'Dale', 'cmpn', 'd1a', 1, '2010-02-21', 1, 2016, 'Dale.Damien@ves.ac.in', 'Damien@gmail.com', 'PaddressLine468', 'TaddressLine468', '22', '12346145', '9812346137', '1234567890000468', 'gen', 'jk', 0, '', 'O+', 'Federico', '7812345670', 'Karina', '8812345670', ''),
(16000118, 'Sharilyn', 'Francie', 'Jenelle', 'cmpn', 'd2c', 0, '2010-02-25', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine472', 'TaddressLine472', '22', '12346149', '9812346141', '1234567890000472', 'sindhi', 'goi', 1, '', 'O+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000119, 'Nancey', 'Blanca', 'Bertha', 'extc', 'd1a', 1, '2010-03-01', 1, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine476', 'TaddressLine476', '22', '12346153', '9812346145', '1234567890000476', 'nt', 'tfws', 1, '', 'O+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000120, 'Na', 'Hoyt', 'Riva', 'inft', 'd2b', 0, '2010-03-04', 1, 2016, 'Riva.Na@ves.ac.in', 'Na@gmail.com', 'PaddressLine479', 'TaddressLine479', '22', '12346156', '9812346148', '1234567890000479', 'sc', '', 1, '', 'B+', 'Alex', '7812345670', 'Leia', '8812345670', ''),
(16000121, 'Chantell', 'Lissette', 'Delbert', 'inst', 'd20', 1, '2010-03-08', 1, 2016, 'Delbert.Chantell@ves.ac.in', 'Chantell@gmail.com', 'PaddressLine483', 'TaddressLine483', '22', '12346160', '9812346152', '1234567890000483', 'st', '', 0, '', 'B+', 'Glenn', '7812345670', 'Camie', '8812345670', ''),
(16000122, 'Mirna', 'Marguerita', 'Bennett', 'cmpn', 'd2b', 1, '2010-03-12', 1, 2016, 'Bennett.Mirna@ves.ac.in', 'Mirna@gmail.com', 'PaddressLine487', 'TaddressLine487', '22', '12346164', '9812346156', '1234567890000487', 'sindhi', '', 1, '', 'A+', 'Marc', '7812345670', 'Kym', '8812345670', ''),
(16000123, 'Marcy', 'Marge', 'Dorethea', 'cmpn', 'd23', 0, '2010-03-16', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine491', 'TaddressLine491', '22', '12346168', '9812346160', '1234567890000491', 'sc', '', 0, '', 'O-', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000124, 'Kenna', 'Danae', 'Bonnie', 'extc', 'd2b', 0, '2010-03-20', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine495', 'TaddressLine495', '22', '12346172', '9812346164', '1234567890000495', 'gen', '', 1, '', 'O+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000125, 'Terrence', 'Shena', 'Vickey', 'inst', 'd2a', 0, '2010-03-27', 1, 2016, 'Vickey.Terrence@ves.ac.in', 'Terrence@gmail.com', 'PaddressLine502', 'TaddressLine502', '22', '12346179', '9812346171', '1234567890000502', 'obc', '', 1, '', 'B+', 'Brady', '7812345670', 'Clarita', '8812345670', ''),
(16000126, 'Brett', 'Cynthia', 'Tressa', 'cmpn', 'd28', 1, '2010-03-31', 1, 2016, 'Tressa.Brett@ves.ac.in', 'Brett@gmail.com', 'PaddressLine506', 'TaddressLine506', '22', '12346183', '9812346175', '1234567890000506', 'sc', '', 1, '', 'B+', 'Joshua', '7812345670', 'Enola', '8812345670', ''),
(16000127, 'Kathy', 'Samual', 'Sharda', 'cmpn', 'd2a', 1, '2010-04-04', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine510', 'TaddressLine510', '22', '12346187', '9812346179', '1234567890000510', 'st', '', 0, '', 'B+', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000128, 'Tamisha', 'Guillermo', 'Mariann', 'extc', 'd31', 0, '2010-04-08', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine514', 'TaddressLine514', '22', '12346191', '9812346183', '1234567890000514', 'sindhi', '', 1, '', 'B+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000129, 'Yu', 'Yen', 'Thad', 'cmpn', 'd2a', 1, '2010-04-12', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine518', 'TaddressLine518', '22', '12346195', '9812346187', '1234567890000518', 'sc', '', 1, '', 'A+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000130, 'Ute', 'Donnetta', 'Joanna', 'inft', 'd34', 1, '2010-04-16', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine522', 'TaddressLine522', '22', '12346199', '9812346191', '1234567890000522', 'gen', '', 1, '', 'O-', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000131, 'Willian', 'Dorcas', 'Lilliana', 'cmpn', 'd1b', 1, '2010-04-19', 1, 2016, 'Lilliana.Willian@ves.ac.in', 'Willian@gmail.com', 'PaddressLine525', 'TaddressLine525', '22', '12346202', '9812346194', '1234567890000525', 'gen', 'goi', 1, '', 'B+', 'Elden', '7812345670', 'Noriko', '8812345670', ''),
(16000132, 'Percy', 'Vincenza', 'Claribel', 'cmpn', 'd36', 1, '2010-04-23', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine529', 'TaddressLine529', '22', '12346206', '9812346198', '1234567890000529', 'obc', 'tfws', 1, '', 'B+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000133, 'Rhona', 'Lori', 'Takisha', 'extc', 'd1b', 0, '2010-04-27', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine533', 'TaddressLine533', '22', '12346210', '9812346202', '1234567890000533', 'sc', 'jk', 1, '', 'B+', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000134, 'Rosemarie', 'Jacob', 'Daniela', 'cmpn', 'd39', 1, '2010-05-01', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine537', 'TaddressLine537', '22', '12346214', '9812346206', '1234567890000537', 'st', 'goi', 1, '', 'B+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000135, 'Temeka', 'Margart', 'Ebony', 'inft', 'd1b', 1, '2010-05-05', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine541', 'TaddressLine541', '22', '12346218', '9812346210', '1234567890000541', 'sindhi', 'tfws', 1, '', 'B+', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000136, 'Sabina', 'Robbie', 'Ada', 'cmpn', 'd2c', 1, '2010-05-08', 1, 2016, 'Ada.Sabina@ves.ac.in', 'Sabina@gmail.com', 'PaddressLine544', 'TaddressLine544', '22', '12346221', '9812346213', '1234567890000544', 'sindhi', '', 1, '', 'A+', 'Jackson', '7812345670', 'Leighann', '8812345670', ''),
(16000137, 'Mckenzie', 'Beatrice', 'Quentin', 'cmpn', 'd1b', 1, '2010-05-12', 1, 2016, 'Quentin.Mckenzie@ves.ac.in', 'Mckenzie@gmail.com', 'PaddressLine548', 'TaddressLine548', '22', '12346225', '9812346217', '1234567890000548', 'sindhi', '', 1, '', 'B+', 'Bernard', '7812345670', 'Lashunda', '8812345670', ''),
(16000138, 'Jerica', 'Randee', 'Gerard', 'extc', 'd9', 0, '2010-05-16', 1, 2016, 'Gerard.Jerica@ves.ac.in', 'Jerica@gmail.com', 'PaddressLine552', 'TaddressLine552', '22', '12346229', '9812346221', '1234567890000552', 'nt', '', 1, '', 'B-', 'Logan', '7812345670', 'Elba', '8812345670', ''),
(16000139, 'Shanti', 'Tilda', 'Arthur', 'cmpn', 'd1b', 0, '2010-05-20', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine556', 'TaddressLine556', '22', '12346233', '9812346225', '1234567890000556', 'gen', '', 1, '', 'B+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000140, 'Sherwood', 'Mui', 'Violet', 'inft', 'd12', 1, '2010-05-24', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine560', 'TaddressLine560', '22', '12346237', '9812346229', '1234567890000560', 'obc', '', 0, '', 'B+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000141, 'Laurena', 'Mavis', 'Shad', 'cmpn', 'd1a', 0, '2010-05-27', 1, 2016, 'Shad.Laurena@ves.ac.in', 'Laurena@gmail.com', 'PaddressLine563', 'TaddressLine563', '22', '12346240', '9812346232', '1234567890000563', 'sindhi', 'jk', 1, '', 'A+', 'Trent', '7812345670', 'Breanna', '8812345670', ''),
(16000142, 'Angelena', 'Cecilia', 'Trinidad', 'cmpn', 'd2c', 1, '2010-05-31', 1, 2016, 'Trinidad.Angelena@ves.ac.in', 'Angelena@gmail.com', 'PaddressLine567', 'TaddressLine567', '22', '12346244', '9812346236', '1234567890000567', 'sc', 'goi', 1, '', 'A+', 'Jordan', '7812345670', 'Penni', '8812345670', ''),
(16000143, 'Damien', 'Donette', 'Dale', 'extc', 'd1a', 1, '2010-06-04', 1, 2016, 'Dale.Damien@ves.ac.in', 'Damien@gmail.com', 'PaddressLine571', 'TaddressLine571', '22', '12346248', '9812346240', '1234567890000571', 'gen', '', 1, '', 'A+', 'Federico', '7812345670', 'Karina', '8812345670', ''),
(16000144, 'Sharilyn', 'Francie', 'Jenelle', 'cmpn', 'd2c', 0, '2010-06-08', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine575', 'TaddressLine575', '22', '12346252', '9812346244', '1234567890000575', 'sindhi', '', 1, '', 'A+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000145, 'Nancey', 'Blanca', 'Bertha', 'inft', 'd1a', 1, '2010-06-12', 1, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine579', 'TaddressLine579', '22', '12346256', '9812346248', '1234567890000579', 'nt', '', 1, '', 'B+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000146, 'Chantell', 'Lissette', 'Delbert', 'cmpn', 'd23', 1, '2010-06-19', 1, 2016, 'Delbert.Chantell@ves.ac.in', 'Chantell@gmail.com', 'PaddressLine586', 'TaddressLine586', '22', '12346263', '9812346255', '1234567890000586', 'st', 'jk', 0, '', 'A+', 'Glenn', '7812345670', 'Camie', '8812345670', ''),
(16000147, 'Mirna', 'Marguerita', 'Bennett', 'extc', 'd2b', 1, '2010-06-23', 1, 2016, 'Bennett.Mirna@ves.ac.in', 'Mirna@gmail.com', 'PaddressLine590', 'TaddressLine590', '22', '12346267', '9812346259', '1234567890000590', 'sindhi', 'goi', 1, '', 'A+', 'Marc', '7812345670', 'Kym', '8812345670', ''),
(16000148, 'Marcy', 'Marge', 'Dorethea', 'cmpn', 'd26', 0, '2010-06-27', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine594', 'TaddressLine594', '22', '12346271', '9812346263', '1234567890000594', 'sc', 'tfws', 1, '', 'A+', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000149, 'Kenna', 'Danae', 'Bonnie', 'inft', 'd2b', 0, '2010-07-01', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine598', 'TaddressLine598', '22', '12346275', '9812346267', '1234567890000598', 'gen', 'jk', 0, '', 'A+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000150, 'Rob', 'Jesenia', 'Stacie', 'cmpn', 'd28', 0, '2010-07-04', 1, 2016, 'Stacie.Rob@ves.ac.in', 'Rob@gmail.com', 'PaddressLine601', 'TaddressLine601', '22', '12346278', '9812346270', '1234567890000601', 'gen', '', 1, '', 'AB+', 'Edwin', '7812345670', 'Silvia', '8812345670', ''),
(16000151, 'Terrence', 'Shena', 'Vickey', 'cmpn', 'd2a', 0, '2010-07-08', 1, 2016, 'Vickey.Terrence@ves.ac.in', 'Terrence@gmail.com', 'PaddressLine605', 'TaddressLine605', '22', '12346282', '9812346274', '1234567890000605', 'obc', '', 1, '', 'AB+', 'Brady', '7812345670', 'Clarita', '8812345670', ''),
(16000152, 'Brett', 'Cynthia', 'Tressa', 'extc', 'd31', 1, '2010-07-12', 1, 2016, 'Tressa.Brett@ves.ac.in', 'Brett@gmail.com', 'PaddressLine609', 'TaddressLine609', '22', '12346286', '9812346278', '1234567890000609', 'sc', '', 1, '', 'A+', 'Joshua', '7812345670', 'Enola', '8812345670', ''),
(16000153, 'Kathy', 'Samual', 'Sharda', 'cmpn', 'd2a', 1, '2010-07-16', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine613', 'TaddressLine613', '22', '12346290', '9812346282', '1234567890000613', 'st', '', 0, '', 'A-', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000154, 'Tamisha', 'Guillermo', 'Mariann', 'inft', 'd34', 0, '2010-07-20', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine617', 'TaddressLine617', '22', '12346294', '9812346286', '1234567890000617', 'sindhi', '', 1, '', 'A+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000155, 'Yu', 'Yen', 'Thad', 'inst', 'd2a', 1, '2010-07-24', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine621', 'TaddressLine621', '22', '12346298', '9812346290', '1234567890000621', 'sc', '', 0, '', 'A+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000156, 'Ute', 'Donnetta', 'Joanna', 'inst', 'd37', 1, '2010-07-28', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine625', 'TaddressLine625', '22', '12346302', '9812346294', '1234567890000625', 'gen', '', 1, '', 'A+', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000157, 'Willian', 'Dorcas', 'Lilliana', 'extc', 'd1b', 1, '2010-07-31', 1, 2016, 'Lilliana.Willian@ves.ac.in', 'Willian@gmail.com', 'PaddressLine628', 'TaddressLine628', '22', '12346305', '9812346297', '1234567890000628', 'gen', 'jk', 1, '', 'AB+', 'Elden', '7812345670', 'Noriko', '8812345670', ''),
(16000158, 'Percy', 'Vincenza', 'Claribel', 'cmpn', 'd39', 1, '2010-08-04', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine632', 'TaddressLine632', '22', '12346309', '9812346301', '1234567890000632', 'obc', 'goi', 1, '', 'AB+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000159, 'Rhona', 'Lori', 'Takisha', 'inft', 'd1b', 0, '2010-08-08', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine636', 'TaddressLine636', '22', '12346313', '9812346305', '1234567890000636', 'sc', 'tfws', 1, '', 'AB+', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000160, 'Rosemarie', 'Jacob', 'Daniela', 'inst', 'd42', 1, '2010-08-12', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine640', 'TaddressLine640', '22', '12346317', '9812346309', '1234567890000640', 'st', '', 0, '', 'A+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000161, 'Temeka', 'Margart', 'Ebony', 'inst', 'd1b', 1, '2010-08-16', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine644', 'TaddressLine644', '22', '12346321', '9812346313', '1234567890000644', 'sindhi', '', 1, '', 'A-', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000162, 'Sabina', 'Robbie', 'Ada', 'extc', 'd2c', 1, '2010-08-19', 1, 2016, 'Ada.Sabina@ves.ac.in', 'Sabina@gmail.com', 'PaddressLine647', 'TaddressLine647', '22', '12346324', '9812346316', '1234567890000647', 'sindhi', 'tfws', 0, '', 'AB-', 'Jackson', '7812345670', 'Leighann', '8812345670', ''),
(16000163, 'Mckenzie', 'Beatrice', 'Quentin', 'cmpn', 'd1b', 1, '2010-08-23', 1, 2016, 'Quentin.Mckenzie@ves.ac.in', 'Mckenzie@gmail.com', 'PaddressLine651', 'TaddressLine651', '22', '12346328', '9812346320', '1234567890000651', 'sindhi', 'jk', 1, '', 'AB+', 'Bernard', '7812345670', 'Lashunda', '8812345670', ''),
(16000164, 'Jerica', 'Randee', 'Gerard', 'inft', 'd12', 0, '2010-08-27', 1, 2016, 'Gerard.Jerica@ves.ac.in', 'Jerica@gmail.com', 'PaddressLine655', 'TaddressLine655', '22', '12346332', '9812346324', '1234567890000655', 'nt', 'goi', 1, '', 'AB+', 'Logan', '7812345670', 'Elba', '8812345670', ''),
(16000165, 'Shanti', 'Tilda', 'Arthur', 'inst', 'd1b', 0, '2010-08-31', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine659', 'TaddressLine659', '22', '12346336', '9812346328', '1234567890000659', 'gen', 'tfws', 1, '', 'AB+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000166, 'Sherwood', 'Mui', 'Violet', 'inst', 'd15', 1, '2010-09-04', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine663', 'TaddressLine663', '22', '12346340', '9812346332', '1234567890000663', 'obc', 'jk', 1, '', 'AB+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000167, 'Angelena', 'Cecilia', 'Trinidad', 'cmpn', 'd2c', 1, '2010-09-11', 1, 2016, 'Trinidad.Angelena@ves.ac.in', 'Angelena@gmail.com', 'PaddressLine670', 'TaddressLine670', '22', '12346347', '9812346339', '1234567890000670', 'sc', '', 1, '', 'O+', 'Jordan', '7812345670', 'Penni', '8812345670', ''),
(16000168, 'Damien', 'Donette', 'Dale', 'inft', 'd1a', 1, '2010-09-15', 1, 2016, 'Dale.Damien@ves.ac.in', 'Damien@gmail.com', 'PaddressLine674', 'TaddressLine674', '22', '12346351', '9812346343', '1234567890000674', 'gen', '', 1, '', 'B+', 'Federico', '7812345670', 'Karina', '8812345670', ''),
(16000169, 'Sharilyn', 'Francie', 'Jenelle', 'inst', 'd2c', 0, '2010-09-19', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine678', 'TaddressLine678', '22', '12346355', '9812346347', '1234567890000678', 'sindhi', '', 1, '', 'AB-', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000170, 'Nancey', 'Blanca', 'Bertha', 'inst', 'd1a', 1, '2010-09-23', 1, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine682', 'TaddressLine682', '22', '12346359', '9812346351', '1234567890000682', 'nt', '', 1, '', 'AB+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000171, 'Na', 'Hoyt', 'Riva', 'extc', 'd2b', 0, '2010-09-26', 1, 2016, 'Riva.Na@ves.ac.in', 'Na@gmail.com', 'PaddressLine685', 'TaddressLine685', '22', '12346362', '9812346354', '1234567890000685', 'sc', 'goi', 1, '', 'O+', 'Alex', '7812345670', 'Leia', '8812345670', ''),
(16000172, 'Chantell', 'Lissette', 'Delbert', 'cmpn', 'd26', 1, '2010-09-30', 1, 2016, 'Delbert.Chantell@ves.ac.in', 'Chantell@gmail.com', 'PaddressLine689', 'TaddressLine689', '22', '12346366', '9812346358', '1234567890000689', 'st', 'tfws', 1, '', 'O+', 'Glenn', '7812345670', 'Camie', '8812345670', ''),
(16000173, 'Mirna', 'Marguerita', 'Bennett', 'inft', 'd2b', 1, '2010-10-04', 1, 2016, 'Bennett.Mirna@ves.ac.in', 'Mirna@gmail.com', 'PaddressLine693', 'TaddressLine693', '22', '12346370', '9812346362', '1234567890000693', 'sindhi', 'jk', 1, '', 'O+', 'Marc', '7812345670', 'Kym', '8812345670', ''),
(16000174, 'Marcy', 'Marge', 'Dorethea', 'inst', 'd29', 0, '2010-10-08', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine697', 'TaddressLine697', '22', '12346374', '9812346366', '1234567890000697', 'sc', 'goi', 1, '', 'O+', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000175, 'Kenna', 'Danae', 'Bonnie', 'inst', 'd2b', 0, '2010-10-12', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine701', 'TaddressLine701', '22', '12346378', '9812346370', '1234567890000701', 'gen', 'tfws', 1, '', 'O+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000176, 'Rob', 'Jesenia', 'Stacie', 'extc', 'd31', 0, '2010-10-15', 1, 2016, 'Stacie.Rob@ves.ac.in', 'Rob@gmail.com', 'PaddressLine704', 'TaddressLine704', '22', '12346381', '9812346373', '1234567890000704', 'gen', '', 1, '', 'A+', 'Edwin', '7812345670', 'Silvia', '8812345670', ''),
(16000177, 'Terrence', 'Shena', 'Vickey', 'cmpn', 'd2a', 0, '2010-10-19', 1, 2016, 'Vickey.Terrence@ves.ac.in', 'Terrence@gmail.com', 'PaddressLine708', 'TaddressLine708', '22', '12346385', '9812346377', '1234567890000708', 'obc', '', 1, '', 'O-', 'Brady', '7812345670', 'Clarita', '8812345670', ''),
(16000178, 'Brett', 'Cynthia', 'Tressa', 'inft', 'd34', 1, '2010-10-23', 1, 2016, 'Tressa.Brett@ves.ac.in', 'Brett@gmail.com', 'PaddressLine712', 'TaddressLine712', '22', '12346389', '9812346381', '1234567890000712', 'sc', 'tfws', 1, '', 'O+', 'Joshua', '7812345670', 'Enola', '8812345670', ''),
(16000179, 'Kathy', 'Samual', 'Sharda', 'inst', 'd2a', 1, '2010-10-27', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine716', 'TaddressLine716', '22', '12346393', '9812346385', '1234567890000716', 'st', 'jk', 0, '', 'O+', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000180, 'Tamisha', 'Guillermo', 'Mariann', 'inst', 'd37', 0, '2010-10-31', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine720', 'TaddressLine720', '22', '12346397', '9812346389', '1234567890000720', 'sindhi', 'goi', 1, '', 'O+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000181, 'Yu', 'Yen', 'Thad', 'cmpn', 'd2a', 1, '2010-11-04', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine724', 'TaddressLine724', '22', '12346401', '9812346393', '1234567890000724', 'sc', 'tfws', 1, '', 'O+', 'Moshe', '7812345670', 'Valentina', '8812345670', '');
INSERT INTO `student` (`UID`, `FirstName`, `MiddleName`, `LastName`, `Branch`, `Class`, `Gender`, `DOB`, `TypeOfAdmission`, `AdmissionYear`, `EmailId`, `SecEmailId`, `PermanentAddress`, `TempAddress`, `std_code`, `LandlineNo`, `MobileNo`, `AadharCard`, `Category`, `AddCategory`, `IsBranchChanged`, `Mentor`, `BloodGroup`, `Fathers_Name`, `Fathers_No`, `Mothers_Name`, `Mothers_No`, `image`) VALUES
(16000182, 'Ute', 'Donnetta', 'Joanna', 'extc', 'd40', 1, '2010-11-08', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine728', 'TaddressLine728', '22', '12346405', '9812346397', '1234567890000728', 'gen', 'jk', 0, '', 'O+', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000183, 'Willian', 'Dorcas', 'Lilliana', 'inft', 'd1b', 1, '2010-11-11', 1, 2016, 'Lilliana.Willian@ves.ac.in', 'Willian@gmail.com', 'PaddressLine731', 'TaddressLine731', '22', '12346408', '9812346400', '1234567890000731', 'gen', '', 1, '', 'B+', 'Elden', '7812345670', 'Noriko', '8812345670', ''),
(16000184, 'Percy', 'Vincenza', 'Claribel', 'inst', 'd42', 1, '2010-11-15', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine735', 'TaddressLine735', '22', '12346412', '9812346404', '1234567890000735', 'obc', '', 1, '', 'A+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000185, 'Rhona', 'Lori', 'Takisha', 'inst', 'd1b', 0, '2010-11-19', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine739', 'TaddressLine739', '22', '12346416', '9812346408', '1234567890000739', 'sc', '', 1, '', 'O-', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000186, 'Rosemarie', 'Jacob', 'Daniela', 'cmpn', 'd45', 1, '2010-11-23', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine743', 'TaddressLine743', '22', '12346420', '9812346412', '1234567890000743', 'st', '', 0, '', 'O+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000187, 'Temeka', 'Margart', 'Ebony', 'extc', 'd1b', 1, '2010-11-27', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine747', 'TaddressLine747', '22', '12346424', '9812346416', '1234567890000747', 'sindhi', '', 1, '', 'O+', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000188, 'Mckenzie', 'Beatrice', 'Quentin', 'cmpn', 'd1b', 1, '2010-12-04', 1, 2016, 'Quentin.Mckenzie@ves.ac.in', 'Mckenzie@gmail.com', 'PaddressLine754', 'TaddressLine754', '22', '12346431', '9812346423', '1234567890000754', 'sindhi', 'tfws', 0, '', 'B+', 'Bernard', '7812345670', 'Lashunda', '8812345670', ''),
(16000189, 'Jerica', 'Randee', 'Gerard', 'inft', 'd15', 0, '2010-12-08', 1, 2016, 'Gerard.Jerica@ves.ac.in', 'Jerica@gmail.com', 'PaddressLine758', 'TaddressLine758', '22', '12346435', '9812346427', '1234567890000758', 'nt', 'jk', 1, '', 'B+', 'Logan', '7812345670', 'Elba', '8812345670', ''),
(16000190, 'Shanti', 'Tilda', 'Arthur', 'inst', 'd1b', 0, '2010-12-12', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine762', 'TaddressLine762', '22', '12346439', '9812346431', '1234567890000762', 'gen', 'goi', 1, '', 'B+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000191, 'Sherwood', 'Mui', 'Violet', 'cmpn', 'd18', 1, '2010-12-16', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine766', 'TaddressLine766', '22', '12346443', '9812346435', '1234567890000766', 'obc', 'tfws', 1, '', 'A+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000192, 'Laurena', 'Mavis', 'Shad', 'extc', 'd1a', 0, '2010-12-19', 1, 2016, 'Shad.Laurena@ves.ac.in', 'Laurena@gmail.com', 'PaddressLine769', 'TaddressLine769', '22', '12346446', '9812346438', '1234567890000769', 'sindhi', '', 0, '', 'B-', 'Trent', '7812345670', 'Breanna', '8812345670', ''),
(16000193, 'Angelena', 'Cecilia', 'Trinidad', 'cmpn', 'd2c', 1, '2010-12-23', 1, 2016, 'Trinidad.Angelena@ves.ac.in', 'Angelena@gmail.com', 'PaddressLine773', 'TaddressLine773', '22', '12346450', '9812346442', '1234567890000773', 'sc', '', 1, '', 'B+', 'Jordan', '7812345670', 'Penni', '8812345670', ''),
(16000194, 'Damien', 'Donette', 'Dale', 'inft', 'd1a', 1, '2010-12-27', 1, 2016, 'Dale.Damien@ves.ac.in', 'Damien@gmail.com', 'PaddressLine777', 'TaddressLine777', '22', '12346454', '9812346446', '1234567890000777', 'gen', '', 0, '', 'B+', 'Federico', '7812345670', 'Karina', '8812345670', ''),
(16000195, 'Sharilyn', 'Francie', 'Jenelle', 'inst', 'd2c', 0, '2010-12-31', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine781', 'TaddressLine781', '22', '12346458', '9812346450', '1234567890000781', 'sindhi', '', 1, '', 'B+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000196, 'Nancey', 'Blanca', 'Bertha', 'cmpn', 'd1a', 1, '2011-01-04', 1, 2016, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine785', 'TaddressLine785', '22', '12346462', '9812346454', '1234567890000785', 'nt', 'goi', 1, '', 'B+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(16000197, 'Na', 'Hoyt', 'Riva', 'extc', 'd2b', 0, '2011-01-07', 1, 2016, 'Riva.Na@ves.ac.in', 'Na@gmail.com', 'PaddressLine788', 'TaddressLine788', '22', '12346465', '9812346457', '1234567890000788', 'sc', '', 1, '', 'A+', 'Alex', '7812345670', 'Leia', '8812345670', ''),
(16000198, 'Chantell', 'Lissette', 'Delbert', 'cmpn', 'd8', 1, '2011-01-11', 1, 2016, 'Delbert.Chantell@ves.ac.in', 'Chantell@gmail.com', 'PaddressLine792', 'TaddressLine792', '22', '12346469', '9812346461', '1234567890000792', 'st', '', 1, '', 'A+', 'Glenn', '7812345670', 'Camie', '8812345670', ''),
(16000199, 'Mirna', 'Marguerita', 'Bennett', 'inft', 'd2b', 1, '2011-01-15', 1, 2016, 'Bennett.Mirna@ves.ac.in', 'Mirna@gmail.com', 'PaddressLine796', 'TaddressLine796', '22', '12346473', '9812346465', '1234567890000796', 'sindhi', '', 0, '', 'B+', 'Marc', '7812345670', 'Kym', '8812345670', ''),
(16000200, 'Marcy', 'Marge', 'Dorethea', 'inst', 'd11', 0, '2011-01-19', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine800', 'TaddressLine800', '22', '12346477', '9812346469', '1234567890000800', 'sc', '', 1, '', 'B-', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000201, 'Kenna', 'Danae', 'Bonnie', 'cmpn', 'd2b', 0, '2011-01-23', 1, 2016, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine804', 'TaddressLine804', '22', '12346481', '9812346473', '1234567890000804', 'gen', '', 1, '', 'B+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(16000202, 'Rob', 'Jesenia', 'Stacie', 'extc', 'd13', 0, '2011-01-26', 1, 2016, 'Stacie.Rob@ves.ac.in', 'Rob@gmail.com', 'PaddressLine807', 'TaddressLine807', '22', '12346484', '9812346476', '1234567890000807', 'gen', 'tfws', 1, '', 'A+', 'Edwin', '7812345670', 'Silvia', '8812345670', ''),
(16000203, 'Terrence', 'Shena', 'Vickey', 'cmpn', 'd2a', 0, '2011-01-30', 1, 2016, 'Vickey.Terrence@ves.ac.in', 'Terrence@gmail.com', 'PaddressLine811', 'TaddressLine811', '22', '12346488', '9812346480', '1234567890000811', 'obc', 'jk', 1, '', 'A+', 'Brady', '7812345670', 'Clarita', '8812345670', ''),
(16000204, 'Brett', 'Cynthia', 'Tressa', 'inft', 'd16', 1, '2011-02-03', 1, 2016, 'Tressa.Brett@ves.ac.in', 'Brett@gmail.com', 'PaddressLine815', 'TaddressLine815', '22', '12346492', '9812346484', '1234567890000815', 'sc', 'goi', 1, '', 'A+', 'Joshua', '7812345670', 'Enola', '8812345670', ''),
(16000205, 'Kathy', 'Samual', 'Sharda', 'inst', 'd2a', 1, '2011-02-07', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine819', 'TaddressLine819', '22', '12346496', '9812346488', '1234567890000819', 'st', 'tfws', 1, '', 'A+', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000206, 'Tamisha', 'Guillermo', 'Mariann', 'cmpn', 'd19', 0, '2011-02-11', 1, 2016, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine823', 'TaddressLine823', '22', '12346500', '9812346492', '1234567890000823', 'sindhi', 'jk', 1, '', 'A+', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(16000207, 'Yu', 'Yen', 'Thad', 'cmpn', 'd1a', 1, '2011-02-15', 1, 2016, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine827', 'TaddressLine827', '22', '12346504', '9812346496', '1234567890000827', 'sc', 'goi', 1, '', 'B+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(16000208, 'Ute', 'Donnetta', 'Joanna', 'extc', 'd2c', 1, '2011-02-19', 1, 2016, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine831', 'TaddressLine831', '22', '12346508', '9812346500', '1234567890000831', 'gen', 'tfws', 1, '', 'B-', 'Wilson', '7812345670', 'Mardell', '8812345670', ''),
(16000209, 'Percy', 'Vincenza', 'Claribel', 'inst', 'd2b', 1, '2011-02-26', 1, 2016, 'Claribel.Percy@ves.ac.in', 'Percy@gmail.com', 'PaddressLine838', 'TaddressLine838', '22', '12346515', '9812346507', '1234567890000838', 'obc', '', 1, '', 'A+', 'Rocco', '7812345670', 'Lurlene', '8812345670', ''),
(16000210, 'Rhona', 'Lori', 'Takisha', 'cmpn', 'd8', 0, '2011-03-02', 1, 2016, 'Takisha.Rhona@ves.ac.in', 'Rhona@gmail.com', 'PaddressLine842', 'TaddressLine842', '22', '12346519', '9812346511', '1234567890000842', 'sc', '', 1, '', 'A+', 'Tom', '7812345670', 'Tanesha', '8812345670', ''),
(16000211, 'Rosemarie', 'Jacob', 'Daniela', 'cmpn', 'd2b', 1, '2011-03-06', 1, 2016, 'Daniela.Rosemarie@ves.ac.in', 'Rosemarie@gmail.com', 'PaddressLine846', 'TaddressLine846', '22', '12346523', '9812346515', '1234567890000846', 'st', '', 0, '', 'A+', 'Arlen', '7812345670', 'Jeanette', '8812345670', ''),
(16000212, 'Temeka', 'Margart', 'Ebony', 'extc', 'd11', 1, '2011-03-10', 1, 2016, 'Ebony.Temeka@ves.ac.in', 'Temeka@gmail.com', 'PaddressLine850', 'TaddressLine850', '22', '12346527', '9812346519', '1234567890000850', 'sindhi', '', 1, '', 'A+', 'Herb', '7812345670', 'Leana', '8812345670', ''),
(16000213, 'Sabina', 'Robbie', 'Ada', 'inft', 'd2a', 1, '2011-03-13', 1, 2016, 'Ada.Sabina@ves.ac.in', 'Sabina@gmail.com', 'PaddressLine853', 'TaddressLine853', '22', '12346530', '9812346522', '1234567890000853', 'sindhi', '', 1, '', 'AB+', 'Jackson', '7812345670', 'Leighann', '8812345670', ''),
(16000214, 'Mckenzie', 'Beatrice', 'Quentin', 'inst', 'd13', 1, '2011-03-17', 1, 2016, 'Quentin.Mckenzie@ves.ac.in', 'Mckenzie@gmail.com', 'PaddressLine857', 'TaddressLine857', '22', '12346534', '9812346526', '1234567890000857', 'sindhi', '', 1, '', 'A+', 'Bernard', '7812345670', 'Lashunda', '8812345670', ''),
(16000215, 'Jerica', 'Randee', 'Gerard', 'cmpn', 'd2a', 0, '2011-03-21', 1, 2016, 'Gerard.Jerica@ves.ac.in', 'Jerica@gmail.com', 'PaddressLine861', 'TaddressLine861', '22', '12346538', '9812346530', '1234567890000861', 'nt', '', 1, '', 'A-', 'Logan', '7812345670', 'Elba', '8812345670', ''),
(16000216, 'Shanti', 'Tilda', 'Arthur', 'cmpn', 'd16', 0, '2011-03-25', 1, 2016, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine865', 'TaddressLine865', '22', '12346542', '9812346534', '1234567890000865', 'gen', '', 1, '', 'A+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(16000217, 'Sherwood', 'Mui', 'Violet', 'extc', 'd2a', 1, '2011-03-29', 1, 2016, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine869', 'TaddressLine869', '22', '12346546', '9812346538', '1234567890000869', 'obc', '', 1, '', 'A+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(16000218, 'Laurena', 'Mavis', 'Shad', 'inft', 'd18', 0, '2011-04-01', 1, 2016, 'Shad.Laurena@ves.ac.in', 'Laurena@gmail.com', 'PaddressLine872', 'TaddressLine872', '22', '12346549', '9812346541', '1234567890000872', 'sindhi', 'tfws', 0, '', 'AB+', 'Trent', '7812345670', 'Breanna', '8812345670', ''),
(16000219, 'Angelena', 'Cecilia', 'Trinidad', 'inst', 'd22', 1, '2011-04-05', 1, 2016, 'Trinidad.Angelena@ves.ac.in', 'Angelena@gmail.com', 'PaddressLine876', 'TaddressLine876', '22', '12346553', '9812346545', '1234567890000876', 'sc', 'jk', 1, '', 'AB+', 'Jordan', '7812345670', 'Penni', '8812345670', ''),
(16000220, 'Damien', 'Donette', 'Dale', 'cmpn', 'd2b', 1, '2011-04-09', 1, 2016, 'Dale.Damien@ves.ac.in', 'Damien@gmail.com', 'PaddressLine880', 'TaddressLine880', '22', '12346557', '9812346549', '1234567890000880', 'gen', 'goi', 1, '', 'AB+', 'Federico', '7812345670', 'Karina', '8812345670', ''),
(16000221, 'Sharilyn', 'Francie', 'Jenelle', 'cmpn', 'd5', 0, '2011-04-13', 1, 2016, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine884', 'TaddressLine884', '22', '12346561', '9812346553', '1234567890000884', 'sindhi', 'tfws', 0, '', 'AB+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(16000222, 'Mckenzie', 'Beatrice', 'Quentin', 'extc', 'd2b', 1, '2011-04-17', 1, 2016, 'Quentin.Mckenzie@ves.ac.in', 'Mckenzie@gmail.com', 'PaddressLine888', 'TaddressLine888', '22', '12346565', '9812346557', '1234567890000888', 'sindhi', 'jk', 1, '', 'A+', 'Bernard', '7812345670', 'Lashunda', '8812345670', ''),
(16000223, 'Idella', 'Amal', 'Leonel', 'inft', 'd7', 0, '2011-04-20', 1, 2016, 'Leonel.Idella@ves.ac.in', 'Idella@gmail.com', 'PaddressLine891', 'TaddressLine891', '22', '12346568', '9812346560', '1234567890000891', 'obc', '', 1, '', 'B+', 'Bradly', '7812345670', 'Allyn', '8812345670', ''),
(16000224, 'Filomena', 'Mandi', 'Margarette', 'inst', 'd2a', 1, '2011-04-24', 1, 2016, 'Margarette.Filomena@ves.ac.in', 'Filomena@gmail.com', 'PaddressLine895', 'TaddressLine895', '22', '12346572', '9812346564', '1234567890000895', 'sc', '', 1, '', 'AB-', 'Dominic', '7812345670', 'Kristen', '8812345670', ''),
(16000225, 'Ramona', 'Mickie', 'Giovanni', 'cmpn', 'd10', 1, '2011-04-28', 1, 2016, 'Giovanni.Ramona@ves.ac.in', 'Ramona@gmail.com', 'PaddressLine899', 'TaddressLine899', '22', '12346576', '9812346568', '1234567890000899', 'st', '', 0, '', 'AB+', 'Tommie', '7812345670', 'Stefania', '8812345670', ''),
(16000226, 'Laurena', 'Mavis', 'Shad', 'cmpn', 'd2a', 0, '2011-05-02', 1, 2016, 'Shad.Laurena@ves.ac.in', 'Laurena@gmail.com', 'PaddressLine903', 'TaddressLine903', '22', '12346580', '9812346572', '1234567890000903', 'sindhi', '', 1, '', 'AB+', 'Trent', '7812345670', 'Breanna', '8812345670', ''),
(16000227, 'Angelena', 'Cecilia', 'Trinidad', 'extc', 'd13', 0, '2011-05-06', 1, 2016, 'Trinidad.Angelena@ves.ac.in', 'Angelena@gmail.com', 'PaddressLine907', 'TaddressLine907', '22', '12346584', '9812346576', '1234567890000907', 'sc', '', 0, '', 'AB+', 'Jordan', '7812345670', 'Penni', '8812345670', ''),
(16000228, 'Alyse', 'Teresia', 'Kathi', 'inst', 'd15', 0, '2011-05-13', 1, 2016, 'Kathi.Alyse@ves.ac.in', 'Alyse@gmail.com', 'PaddressLine914', 'TaddressLine914', '22', '12346591', '9812346583', '1234567890000914', 'gen', 'tfws', 1, '', 'O+', 'Michael', '7812345670', 'Lavette', '8812345670', ''),
(16000229, 'France', 'Carlene', 'Ed', 'cmpn', 'd1b', 1, '2011-05-17', 1, 2016, 'Ed.France@ves.ac.in', 'France@gmail.com', 'PaddressLine918', 'TaddressLine918', '22', '12346595', '9812346587', '1234567890000918', 'obc', 'jk', 1, '', 'O+', 'Jess', '7812345670', 'Darcey', '8812345670', ''),
(16000230, 'Na', 'Hoyt', 'Riva', 'cmpn', 'd18', 1, '2011-05-21', 1, 2016, 'Riva.Na@ves.ac.in', 'Na@gmail.com', 'PaddressLine922', 'TaddressLine922', '22', '12346599', '9812346591', '1234567890000922', 'sc', 'goi', 1, '', 'B+', 'Alex', '7812345670', 'Leia', '8812345670', ''),
(16000231, 'Chantell', 'Lissette', 'Delbert', 'extc', 'd22', 0, '2011-05-25', 1, 2016, 'Delbert.Chantell@ves.ac.in', 'Chantell@gmail.com', 'PaddressLine926', 'TaddressLine926', '22', '12346603', '9812346595', '1234567890000926', 'st', '', 0, '', 'AB-', 'Glenn', '7812345670', 'Camie', '8812345670', ''),
(16000232, 'Mirna', 'Marguerita', 'Bennett', 'cmpn', 'd2a', 1, '2011-05-29', 1, 2016, 'Bennett.Mirna@ves.ac.in', 'Mirna@gmail.com', 'PaddressLine930', 'TaddressLine930', '22', '12346607', '9812346599', '1234567890000930', 'sindhi', '', 1, '', 'AB+', 'Marc', '7812345670', 'Kym', '8812345670', ''),
(16000233, 'Marcy', 'Marge', 'Dorethea', 'inft', 'd4', 1, '2011-06-02', 1, 2016, 'Dorethea.Marcy@ves.ac.in', 'Marcy@gmail.com', 'PaddressLine934', 'TaddressLine934', '22', '12346611', '9812346603', '1234567890000934', 'sc', '', 1, '', 'AB+', 'Cruz', '7812345670', 'Lorrine', '8812345670', ''),
(16000234, 'Rubye', 'Shanna', 'Mitchel', 'cmpn', 'd1b', 1, '2011-06-05', 1, 2016, 'Mitchel.Rubye@ves.ac.in', 'Rubye@gmail.com', 'PaddressLine937', 'TaddressLine937', '22', '12346614', '9812346606', '1234567890000937', 'nt', 'tfws', 1, '', 'O+', 'Roberto', '7812345670', 'Esta', '8812345670', ''),
(16000235, 'Rob', 'Jesenia', 'Stacie', 'cmpn', 'd6', 1, '2011-06-09', 1, 2016, 'Stacie.Rob@ves.ac.in', 'Rob@gmail.com', 'PaddressLine941', 'TaddressLine941', '22', '12346618', '9812346610', '1234567890000941', 'gen', 'jk', 1, '', 'O+', 'Edwin', '7812345670', 'Silvia', '8812345670', ''),
(16000236, 'Terrence', 'Shena', 'Vickey', 'extc', 'd1b', 0, '2011-06-13', 1, 2016, 'Vickey.Terrence@ves.ac.in', 'Terrence@gmail.com', 'PaddressLine945', 'TaddressLine945', '22', '12346622', '9812346614', '1234567890000945', 'obc', 'goi', 1, '', 'O+', 'Brady', '7812345670', 'Clarita', '8812345670', ''),
(16000237, 'Brett', 'Cynthia', 'Tressa', 'cmpn', 'd9', 1, '2011-06-17', 1, 2016, 'Tressa.Brett@ves.ac.in', 'Brett@gmail.com', 'PaddressLine949', 'TaddressLine949', '22', '12346626', '9812346618', '1234567890000949', 'sc', 'tfws', 1, '', 'O+', 'Joshua', '7812345670', 'Enola', '8812345670', ''),
(16000238, 'Kathy', 'Samual', 'Sharda', 'inft', 'd1b', 1, '2011-06-21', 1, 2016, 'Sharda.Kathy@ves.ac.in', 'Kathy@gmail.com', 'PaddressLine953', 'TaddressLine953', '22', '12346630', '9812346622', '1234567890000953', 'st', 'jk', 1, '', 'B+', 'Donald', '7812345670', 'Sherilyn', '8812345670', ''),
(16000239, 'Alfonzo', 'Hassie', 'Ashanti', 'cmpn', 'd2c', 1, '2011-06-24', 1, 2016, 'Ashanti.Alfonzo@ves.ac.in', 'Alfonzo@gmail.com', 'PaddressLine956', 'TaddressLine956', '22', '12346633', '9812346625', '1234567890000956', 'gen', '', 1, '', 'O-', 'Jacques', '7812345670', 'Donella', '8812345670', ''),
(16000240, 'Brook', 'Olivia', 'Mikki', 'cmpn', 'd1a', 1, '2011-06-28', 1, 2016, 'Mikki.Brook@ves.ac.in', 'Brook@gmail.com', 'PaddressLine960', 'TaddressLine960', '22', '12346637', '9812346629', '1234567890000960', 'sindhi', '', 1, '', 'O+', 'Marquis', '7812345670', 'Mellisa', '8812345670', ''),
(16000241, 'Lynell', 'Rickey', 'Hortense', 'extc', 'd2c', 0, '2011-07-02', 1, 2016, 'Hortense.Lynell@ves.ac.in', 'Lynell@gmail.com', 'PaddressLine964', 'TaddressLine964', '22', '12346641', '9812346633', '1234567890000964', 'nt', '', 1, '', 'O+', 'Van', '7812345670', 'Danille', '8812345670', ''),
(17000001, 'Daisy', 'Rema', 'Zackary', 'inst', 'd2b', 0, '2008-11-14', 0, 2017, 'Zackary.Daisy@ves.ac.in', 'Daisy@gmail.com', 'PaddressLine4', 'TaddressLine4', '22', '12345681', '9812345673', '1234567890000004', 'st', 'goi', 1, '', 'AB+', 'Jorge', '7812345670', 'Bella', '8812345670', ''),
(17000003, 'Melynda', 'Caleb', 'Beverlee', 'cmpn', 'd2a', 0, '2008-11-21', 0, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine11', 'TaddressLine11', '22', '12345688', '9812345680', '1234567890000011', 'sindhi', '', 1, '', 'O+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000004, 'Danelle', 'Randa', 'Brittny', 'inft', 'd7', 1, '2008-11-25', 1, 2017, 'Brittny.Danelle@ves.ac.in', 'Danelle@gmail.com', 'PaddressLine15', 'TaddressLine15', '22', '12345692', '9812345684', '1234567890000015', 'nt', '', 0, '', 'O+', 'Darwin', '7812345670', 'Roxie', '8812345670', ''),
(17000005, 'Kit', 'Shirely', 'Venice', 'inst', 'd2a', 1, '2008-11-29', 0, 2017, 'Venice.Kit@ves.ac.in', 'Kit@gmail.com', 'PaddressLine19', 'TaddressLine19', '22', '12345696', '9812345688', '1234567890000019', 'gen', '', 1, '', 'O+', 'Vaughn', '7812345670', 'Elmira', '8812345670', ''),
(17000006, 'Marlys', 'Hermelinda', 'Judith', 'inst', 'd10', 0, '2008-12-03', 1, 2017, 'Judith.Marlys@ves.ac.in', 'Marlys@gmail.com', 'PaddressLine23', 'TaddressLine23', '22', '12345700', '9812345692', '1234567890000023', 'obc', '', 0, '', 'B+', 'Leland', '7812345670', 'Ai', '8812345670', ''),
(17000007, 'Melina', 'Marsha', 'Leesa', 'cmpn', 'd12', 0, '2008-12-10', 0, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine30', 'TaddressLine30', '22', '12345707', '9812345699', '1234567890000030', 'sc', 'jk', 1, '', 'O+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000008, 'Kristine', 'Erlene', 'Leona', 'inft', 'd1b', 0, '2008-12-14', 0, 2017, 'Leona.Kristine@ves.ac.in', 'Kristine@gmail.com', 'PaddressLine34', 'TaddressLine34', '22', '12345711', '9812345703', '1234567890000034', 'gen', 'goi', 1, '', 'O+', 'Garrett', '7812345670', 'Maricela', '8812345670', ''),
(17000009, 'Odette', 'Freda', 'Dena', 'inst', 'd15', 1, '2008-12-18', 0, 2017, 'Dena.Odette@ves.ac.in', 'Odette@gmail.com', 'PaddressLine38', 'TaddressLine38', '22', '12345715', '9812345707', '1234567890000038', 'sindhi', 'tfws', 1, '', 'O+', 'Matthew', '7812345670', 'Teresia', '8812345670', ''),
(17000010, 'Shaunta', 'Delena', 'Vinita', 'inst', 'd1b', 1, '2008-12-22', 1, 2017, 'Vinita.Shaunta@ves.ac.in', 'Shaunta@gmail.com', 'PaddressLine42', 'TaddressLine42', '22', '12345719', '9812345711', '1234567890000042', 'nt', 'jk', 0, '', 'O+', 'Jerrold', '7812345670', 'Tajuana', '8812345670', ''),
(17000012, 'Reatha', 'Golda', 'Lynetta', 'cmpn', 'd21', 1, '2008-12-29', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine49', 'TaddressLine49', '22', '12345726', '9812345718', '1234567890000049', 'st', '', 0, '', 'B+', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000013, 'Estela', 'Latricia', 'Vernon', 'inft', 'd2a', 0, '2009-01-02', 0, 2017, 'Vernon.Estela@ves.ac.in', 'Estela@gmail.com', 'PaddressLine53', 'TaddressLine53', '22', '12345730', '9812345722', '1234567890000053', 'sindhi', '', 1, '', 'A+', 'Gerardo', '7812345670', 'Gwenn', '8812345670', ''),
(17000014, 'Esta', 'Brenna', 'Renae', 'inst', 'd4', 1, '2009-01-06', 0, 2017, 'Renae.Esta@ves.ac.in', 'Esta@gmail.com', 'PaddressLine57', 'TaddressLine57', '22', '12345734', '9812345726', '1234567890000057', 'sc', '', 1, '', 'O-', 'Bill', '7812345670', 'Dell', '8812345670', ''),
(17000015, 'Cecile', 'Elise', 'Tod', 'inst', 'd2a', 1, '2009-01-10', 0, 2017, 'Tod.Cecile@ves.ac.in', 'Cecile@gmail.com', 'PaddressLine61', 'TaddressLine61', '22', '12345738', '9812345730', '1234567890000061', 'gen', '', 1, '', 'O+', 'Theo', '7812345670', 'Maryalice', '8812345670', ''),
(17000017, 'Alma', 'Retta', 'Laverne', 'cmpn', 'd1b', 1, '2009-01-17', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine68', 'TaddressLine68', '22', '12345745', '9812345737', '1234567890000068', 'obc', 'tfws', 0, '', 'B+', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000018, 'Terri', 'Maryjo', 'Luisa', 'inft', 'd9', 0, '2009-01-21', 0, 2017, 'Luisa.Terri@ves.ac.in', 'Terri@gmail.com', 'PaddressLine72', 'TaddressLine72', '22', '12345749', '9812345741', '1234567890000072', 'sc', '', 1, '', 'B+', 'Wyatt', '7812345670', 'Cheree', '8812345670', ''),
(17000019, 'Isabella', 'Elenora', 'Myles', 'inst', 'd1b', 0, '2009-01-25', 0, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine76', 'TaddressLine76', '22', '12345753', '9812345745', '1234567890000076', 'st', '', 1, '', 'B+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000020, 'Cecily', 'Kiyoko', 'Paige', 'inst', 'd12', 1, '2009-01-29', 0, 2017, 'Paige.Cecily@ves.ac.in', 'Cecily@gmail.com', 'PaddressLine80', 'TaddressLine80', '22', '12345757', '9812345749', '1234567890000080', 'sindhi', '', 1, '', 'B+', 'Wilburn', '7812345670', 'Marcelina', '8812345670', ''),
(17000022, 'Ocie', 'Toi', 'Kathlyn', 'cmpn', 'd2c', 1, '2009-02-05', 0, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine87', 'TaddressLine87', '22', '12345764', '9812345756', '1234567890000087', 'nt', 'goi', 1, '', 'B-', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000023, 'Latia', 'Whitney', 'Sergio', 'inft', 'd1a', 1, '2009-02-09', 0, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine91', 'TaddressLine91', '22', '12345768', '9812345760', '1234567890000091', 'gen', 'tfws', 1, '', 'B+', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000024, 'Yuko', 'Arlene', 'Trina', 'inst', 'd2c', 0, '2009-02-13', 0, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine95', 'TaddressLine95', '22', '12345772', '9812345764', '1234567890000095', 'obc', 'jk', 1, '', 'B+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000025, 'Nancey', 'Yuriko', 'Jacquiline', 'inst', 'd21', 1, '2009-02-17', 0, 2017, 'Jacquiline.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine99', 'TaddressLine99', '22', '12345776', '9812345768', '1234567890000099', 'sc', 'goi', 1, '', 'B+', 'Keven', '7812345670', 'Tifany', '8812345670', ''),
(17000027, 'Daisy', 'Rema', 'Zackary', 'extc', 'd4', 0, '2009-02-25', 0, 2017, 'Zackary.Daisy@ves.ac.in', 'Daisy@gmail.com', 'PaddressLine107', 'TaddressLine107', '22', '12345784', '9812345776', '1234567890000107', 'st', 'jk', 1, '', 'B+', 'Jorge', '7812345670', 'Bella', '8812345670', ''),
(17000028, 'Melynda', 'Caleb', 'Beverlee', 'inst', 'd6', 0, '2009-03-04', 0, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine114', 'TaddressLine114', '22', '12345791', '9812345783', '1234567890000114', 'sindhi', '', 1, '', 'B+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000029, 'Danelle', 'Randa', 'Brittny', 'inst', 'd1b', 1, '2009-03-08', 1, 2017, 'Brittny.Danelle@ves.ac.in', 'Danelle@gmail.com', 'PaddressLine118', 'TaddressLine118', '22', '12345795', '9812345787', '1234567890000118', 'nt', '', 0, '', 'B-', 'Darwin', '7812345670', 'Roxie', '8812345670', ''),
(17000030, 'Kit', 'Shirely', 'Venice', 'cmpn', 'd9', 1, '2009-03-12', 0, 2017, 'Venice.Kit@ves.ac.in', 'Kit@gmail.com', 'PaddressLine122', 'TaddressLine122', '22', '12345799', '9812345791', '1234567890000122', 'gen', '', 1, '', 'B+', 'Vaughn', '7812345670', 'Elmira', '8812345670', ''),
(17000031, 'Marlys', 'Hermelinda', 'Judith', 'extc', 'd1b', 0, '2009-03-16', 0, 2017, 'Judith.Marlys@ves.ac.in', 'Marlys@gmail.com', 'PaddressLine126', 'TaddressLine126', '22', '12345803', '9812345795', '1234567890000126', 'obc', '', 1, '', 'B+', 'Leland', '7812345670', 'Ai', '8812345670', ''),
(17000033, 'Melina', 'Marsha', 'Leesa', 'inst', 'd1a', 0, '2009-03-23', 0, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine133', 'TaddressLine133', '22', '12345810', '9812345802', '1234567890000133', 'sc', 'tfws', 1, '', 'A+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000034, 'Kristine', 'Erlene', 'Leona', 'inst', 'd2c', 0, '2009-03-27', 0, 2017, 'Leona.Kristine@ves.ac.in', 'Kristine@gmail.com', 'PaddressLine137', 'TaddressLine137', '22', '12345814', '9812345806', '1234567890000137', 'gen', 'jk', 1, '', 'A+', 'Garrett', '7812345670', 'Maricela', '8812345670', ''),
(17000035, 'Odette', 'Freda', 'Dena', 'cmpn', 'd1a', 1, '2009-03-31', 0, 2017, 'Dena.Odette@ves.ac.in', 'Odette@gmail.com', 'PaddressLine141', 'TaddressLine141', '22', '12345818', '9812345810', '1234567890000141', 'sindhi', 'goi', 1, '', 'A+', 'Matthew', '7812345670', 'Teresia', '8812345670', ''),
(17000036, 'Shaunta', 'Delena', 'Vinita', 'extc', 'd2c', 1, '2009-04-04', 1, 2017, 'Vinita.Shaunta@ves.ac.in', 'Shaunta@gmail.com', 'PaddressLine145', 'TaddressLine145', '22', '12345822', '9812345814', '1234567890000145', 'nt', '', 0, '', 'B+', 'Jerrold', '7812345670', 'Tajuana', '8812345670', ''),
(17000038, 'Reatha', 'Golda', 'Lynetta', 'inst', 'd1a', 1, '2009-04-11', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine152', 'TaddressLine152', '22', '12345829', '9812345821', '1234567890000152', 'st', 'goi', 1, '', 'A+', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000039, 'Estela', 'Latricia', 'Vernon', 'inst', 'd2c', 0, '2009-04-15', 1, 2017, 'Vernon.Estela@ves.ac.in', 'Estela@gmail.com', 'PaddressLine156', 'TaddressLine156', '22', '12345833', '9812345825', '1234567890000156', 'sindhi', 'tfws', 0, '', 'A+', 'Gerardo', '7812345670', 'Gwenn', '8812345670', ''),
(17000040, 'Esta', 'Brenna', 'Renae', 'cmpn', 'd1a', 1, '2009-04-19', 1, 2017, 'Renae.Esta@ves.ac.in', 'Esta@gmail.com', 'PaddressLine160', 'TaddressLine160', '22', '12345837', '9812345829', '1234567890000160', 'sc', 'jk', 1, '', 'A+', 'Bill', '7812345670', 'Dell', '8812345670', ''),
(17000041, 'Cecile', 'Elise', 'Tod', 'extc', 'd2c', 1, '2009-04-23', 1, 2017, 'Tod.Cecile@ves.ac.in', 'Cecile@gmail.com', 'PaddressLine164', 'TaddressLine164', '22', '12345841', '9812345833', '1234567890000164', 'gen', 'goi', 1, '', 'A+', 'Theo', '7812345670', 'Maryalice', '8812345670', ''),
(17000043, 'Alma', 'Retta', 'Laverne', 'inst', 'd2b', 1, '2009-04-30', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine171', 'TaddressLine171', '22', '12345848', '9812345840', '1234567890000171', 'obc', '', 0, '', 'AB+', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000044, 'Terri', 'Maryjo', 'Luisa', 'inst', 'd11', 0, '2009-05-04', 1, 2017, 'Luisa.Terri@ves.ac.in', 'Terri@gmail.com', 'PaddressLine175', 'TaddressLine175', '22', '12345852', '9812345844', '1234567890000175', 'sc', '', 1, '', 'A+', 'Wyatt', '7812345670', 'Cheree', '8812345670', ''),
(17000045, 'Isabella', 'Elenora', 'Myles', 'cmpn', 'd2b', 0, '2009-05-08', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine179', 'TaddressLine179', '22', '12345856', '9812345848', '1234567890000179', 'st', '', 0, '', 'A-', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000046, 'Cecily', 'Kiyoko', 'Paige', 'extc', 'd14', 1, '2009-05-12', 1, 2017, 'Paige.Cecily@ves.ac.in', 'Cecily@gmail.com', 'PaddressLine183', 'TaddressLine183', '22', '12345860', '9812345852', '1234567890000183', 'sindhi', '', 1, '', 'A+', 'Wilburn', '7812345670', 'Marcelina', '8812345670', ''),
(17000047, 'Ocie', 'Toi', 'Kathlyn', 'inst', 'd16', 1, '2009-05-19', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine190', 'TaddressLine190', '22', '12345867', '9812345859', '1234567890000190', 'nt', 'jk', 1, '', 'AB+', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000048, 'Latia', 'Whitney', 'Sergio', 'inst', 'd2a', 1, '2009-05-23', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine194', 'TaddressLine194', '22', '12345871', '9812345863', '1234567890000194', 'gen', 'goi', 1, '', 'AB+', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000049, 'Yuko', 'Arlene', 'Trina', 'cmpn', 'd19', 0, '2009-05-27', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine198', 'TaddressLine198', '22', '12345875', '9812345867', '1234567890000198', 'obc', 'tfws', 0, '', 'AB+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000050, 'Nancey', 'Yuriko', 'Jacquiline', 'extc', 'd1a', 1, '2009-05-31', 1, 2017, 'Jacquiline.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine202', 'TaddressLine202', '22', '12345879', '9812345871', '1234567890000202', 'sc', 'jk', 1, '', 'AB+', 'Keven', '7812345670', 'Tifany', '8812345670', ''),
(17000052, 'Daisy', 'Rema', 'Zackary', 'cmpn', 'd1a', 0, '2009-06-08', 1, 2017, 'Zackary.Daisy@ves.ac.in', 'Daisy@gmail.com', 'PaddressLine210', 'TaddressLine210', '22', '12345887', '9812345879', '1234567890000210', 'st', 'tfws', 1, '', 'A-', 'Jorge', '7812345670', 'Bella', '8812345670', ''),
(17000054, 'Melynda', 'Caleb', 'Beverlee', 'cmpn', 'd8', 0, '2009-06-15', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine217', 'TaddressLine217', '22', '12345894', '9812345886', '1234567890000217', 'sindhi', 'goi', 1, '', 'AB+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000055, 'Danelle', 'Randa', 'Brittny', 'extc', 'd2b', 1, '2009-06-19', 1, 2017, 'Brittny.Danelle@ves.ac.in', 'Danelle@gmail.com', 'PaddressLine221', 'TaddressLine221', '22', '12345898', '9812345890', '1234567890000221', 'nt', 'tfws', 1, '', 'AB+', 'Darwin', '7812345670', 'Roxie', '8812345670', ''),
(17000056, 'Kit', 'Shirely', 'Venice', 'cmpn', 'd11', 1, '2009-06-23', 1, 2017, 'Venice.Kit@ves.ac.in', 'Kit@gmail.com', 'PaddressLine225', 'TaddressLine225', '22', '12345902', '9812345894', '1234567890000225', 'gen', 'jk', 1, '', 'AB+', 'Vaughn', '7812345670', 'Elmira', '8812345670', ''),
(17000057, 'Marlys', 'Hermelinda', 'Judith', 'cmpn', 'd2b', 0, '2009-06-27', 1, 2017, 'Judith.Marlys@ves.ac.in', 'Marlys@gmail.com', 'PaddressLine229', 'TaddressLine229', '22', '12345906', '9812345898', '1234567890000229', 'obc', 'goi', 1, '', 'AB+', 'Leland', '7812345670', 'Ai', '8812345670', ''),
(17000059, 'Melina', 'Marsha', 'Leesa', 'cmpn', 'd2a', 0, '2009-07-04', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine236', 'TaddressLine236', '22', '12345913', '9812345905', '1234567890000236', 'sc', '', 1, '', 'O+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000060, 'Kristine', 'Erlene', 'Leona', 'extc', 'd16', 0, '2009-07-08', 1, 2017, 'Leona.Kristine@ves.ac.in', 'Kristine@gmail.com', 'PaddressLine240', 'TaddressLine240', '22', '12345917', '9812345909', '1234567890000240', 'gen', '', 1, '', 'B+', 'Garrett', '7812345670', 'Maricela', '8812345670', ''),
(17000061, 'Odette', 'Freda', 'Dena', 'cmpn', 'd2a', 1, '2009-07-12', 1, 2017, 'Dena.Odette@ves.ac.in', 'Odette@gmail.com', 'PaddressLine244', 'TaddressLine244', '22', '12345921', '9812345913', '1234567890000244', 'sindhi', '', 1, '', 'AB-', 'Matthew', '7812345670', 'Teresia', '8812345670', ''),
(17000062, 'Shaunta', 'Delena', 'Vinita', 'cmpn', 'd19', 1, '2009-07-16', 1, 2017, 'Vinita.Shaunta@ves.ac.in', 'Shaunta@gmail.com', 'PaddressLine248', 'TaddressLine248', '22', '12345925', '9812345917', '1234567890000248', 'nt', '', 0, '', 'AB+', 'Jerrold', '7812345670', 'Tajuana', '8812345670', ''),
(17000064, 'Reatha', 'Golda', 'Lynetta', 'cmpn', 'd2b', 1, '2009-07-23', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine255', 'TaddressLine255', '22', '12345932', '9812345924', '1234567890000255', 'st', 'jk', 1, '', 'O+', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000065, 'Estela', 'Latricia', 'Vernon', 'extc', 'd5', 0, '2009-07-27', 1, 2017, 'Vernon.Estela@ves.ac.in', 'Estela@gmail.com', 'PaddressLine259', 'TaddressLine259', '22', '12345936', '9812345928', '1234567890000259', 'sindhi', 'goi', 1, '', 'O+', 'Gerardo', '7812345670', 'Gwenn', '8812345670', ''),
(17000066, 'Esta', 'Brenna', 'Renae', 'cmpn', 'd2b', 1, '2009-07-31', 1, 2017, 'Renae.Esta@ves.ac.in', 'Esta@gmail.com', 'PaddressLine263', 'TaddressLine263', '22', '12345940', '9812345932', '1234567890000263', 'sc', 'tfws', 1, '', 'O+', 'Bill', '7812345670', 'Dell', '8812345670', ''),
(17000067, 'Cecile', 'Elise', 'Tod', 'cmpn', 'd8', 1, '2009-08-04', 1, 2017, 'Tod.Cecile@ves.ac.in', 'Cecile@gmail.com', 'PaddressLine267', 'TaddressLine267', '22', '12345944', '9812345936', '1234567890000267', 'gen', 'jk', 1, '', 'O+', 'Theo', '7812345670', 'Maryalice', '8812345670', ''),
(17000068, 'Alma', 'Retta', 'Laverne', 'cmpn', 'd10', 1, '2009-08-11', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine274', 'TaddressLine274', '22', '12345951', '9812345943', '1234567890000274', 'obc', '', 0, '', 'O-', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000069, 'Terri', 'Maryjo', 'Luisa', 'extc', 'd2a', 0, '2009-08-15', 1, 2017, 'Luisa.Terri@ves.ac.in', 'Terri@gmail.com', 'PaddressLine278', 'TaddressLine278', '22', '12345955', '9812345947', '1234567890000278', 'sc', '', 1, '', 'O+', 'Wyatt', '7812345670', 'Cheree', '8812345670', ''),
(17000070, 'Isabella', 'Elenora', 'Myles', 'cmpn', 'd13', 0, '2009-08-19', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine282', 'TaddressLine282', '22', '12345959', '9812345951', '1234567890000282', 'st', '', 1, '', 'O+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000071, 'Cecily', 'Kiyoko', 'Paige', 'cmpn', 'd2a', 1, '2009-08-23', 1, 2017, 'Paige.Cecily@ves.ac.in', 'Cecily@gmail.com', 'PaddressLine286', 'TaddressLine286', '22', '12345963', '9812345955', '1234567890000286', 'sindhi', 'tfws', 0, '', 'O+', 'Wilburn', '7812345670', 'Marcelina', '8812345670', ''),
(17000073, 'Ocie', 'Toi', 'Kathlyn', 'cmpn', 'd1b', 1, '2009-08-30', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine293', 'TaddressLine293', '22', '12345970', '9812345962', '1234567890000293', 'nt', '', 1, '', 'B+', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000074, 'Latia', 'Whitney', 'Sergio', 'extc', 'd18', 1, '2009-09-03', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine297', 'TaddressLine297', '22', '12345974', '9812345966', '1234567890000297', 'gen', '', 1, '', 'B+', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000075, 'Yuko', 'Arlene', 'Trina', 'cmpn', 'd22', 0, '2009-09-07', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine301', 'TaddressLine301', '22', '12345978', '9812345970', '1234567890000301', 'obc', '', 0, '', 'A+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000076, 'Nancey', 'Yuriko', 'Jacquiline', 'cmpn', 'd2b', 1, '2009-09-11', 1, 2017, 'Jacquiline.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine305', 'TaddressLine305', '22', '12345982', '9812345974', '1234567890000305', 'sc', '', 1, '', 'O-', 'Keven', '7812345670', 'Tifany', '8812345670', ''),
(17000078, 'Daisy', 'Rema', 'Zackary', 'inst', 'd2b', 0, '2009-09-19', 1, 2017, 'Zackary.Daisy@ves.ac.in', 'Daisy@gmail.com', 'PaddressLine313', 'TaddressLine313', '22', '12345990', '9812345982', '1234567890000313', 'st', '', 1, '', 'O+', 'Jorge', '7812345670', 'Bella', '8812345670', ''),
(17000080, 'Melynda', 'Caleb', 'Beverlee', 'cmpn', 'd2a', 0, '2009-09-26', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine320', 'TaddressLine320', '22', '12345997', '9812345989', '1234567890000320', 'sindhi', 'jk', 1, '', 'B+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000081, 'Danelle', 'Randa', 'Brittny', 'cmpn', 'd10', 1, '2009-09-30', 1, 2017, 'Brittny.Danelle@ves.ac.in', 'Danelle@gmail.com', 'PaddressLine324', 'TaddressLine324', '22', '12346001', '9812345993', '1234567890000324', 'nt', 'goi', 1, '', 'B+', 'Darwin', '7812345670', 'Roxie', '8812345670', ''),
(17000082, 'Kit', 'Shirely', 'Venice', 'inft', 'd2a', 1, '2009-10-04', 1, 2017, 'Venice.Kit@ves.ac.in', 'Kit@gmail.com', 'PaddressLine328', 'TaddressLine328', '22', '12346005', '9812345997', '1234567890000328', 'gen', 'tfws', 0, '', 'B+', 'Vaughn', '7812345670', 'Elmira', '8812345670', ''),
(17000083, 'Marlys', 'Hermelinda', 'Judith', 'inst', 'd13', 0, '2009-10-08', 1, 2017, 'Judith.Marlys@ves.ac.in', 'Marlys@gmail.com', 'PaddressLine332', 'TaddressLine332', '22', '12346009', '9812346001', '1234567890000332', 'obc', 'jk', 1, '', 'A+', 'Leland', '7812345670', 'Ai', '8812345670', ''),
(17000085, 'Melina', 'Marsha', 'Leesa', 'cmpn', 'd15', 0, '2009-10-15', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine339', 'TaddressLine339', '22', '12346016', '9812346008', '1234567890000339', 'sc', '', 1, '', 'B+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000086, 'Kristine', 'Erlene', 'Leona', 'cmpn', 'd1b', 0, '2009-10-19', 1, 2017, 'Leona.Kristine@ves.ac.in', 'Kristine@gmail.com', 'PaddressLine343', 'TaddressLine343', '22', '12346020', '9812346012', '1234567890000343', 'gen', '', 1, '', 'B+', 'Garrett', '7812345670', 'Maricela', '8812345670', ''),
(17000087, 'Odette', 'Freda', 'Dena', 'inft', 'd18', 1, '2009-10-23', 1, 2017, 'Dena.Odette@ves.ac.in', 'Odette@gmail.com', 'PaddressLine347', 'TaddressLine347', '22', '12346024', '9812346016', '1234567890000347', 'sindhi', '', 1, '', 'B+', 'Matthew', '7812345670', 'Teresia', '8812345670', ''),
(17000088, 'Shaunta', 'Delena', 'Vinita', 'inst', 'd22', 1, '2009-10-27', 1, 2017, 'Vinita.Shaunta@ves.ac.in', 'Shaunta@gmail.com', 'PaddressLine351', 'TaddressLine351', '22', '12346028', '9812346020', '1234567890000351', 'nt', '', 1, '', 'B+', 'Jerrold', '7812345670', 'Tajuana', '8812345670', ''),
(17000089, 'Reatha', 'Golda', 'Lynetta', 'cmpn', 'd3', 1, '2009-11-03', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine358', 'TaddressLine358', '22', '12346035', '9812346027', '1234567890000358', 'st', '', 1, '', 'A+', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000090, 'Estela', 'Latricia', 'Vernon', 'cmpn', 'd1b', 0, '2009-11-07', 1, 2017, 'Vernon.Estela@ves.ac.in', 'Estela@gmail.com', 'PaddressLine362', 'TaddressLine362', '22', '12346039', '9812346031', '1234567890000362', 'sindhi', '', 1, '', 'B+', 'Gerardo', '7812345670', 'Gwenn', '8812345670', ''),
(17000091, 'Esta', 'Brenna', 'Renae', 'inft', 'd6', 1, '2009-11-11', 1, 2017, 'Renae.Esta@ves.ac.in', 'Esta@gmail.com', 'PaddressLine366', 'TaddressLine366', '22', '12346043', '9812346035', '1234567890000366', 'sc', '', 1, '', 'B-', 'Bill', '7812345670', 'Dell', '8812345670', ''),
(17000092, 'Cecile', 'Elise', 'Tod', 'inst', 'd1b', 1, '2009-11-15', 1, 2017, 'Tod.Cecile@ves.ac.in', 'Cecile@gmail.com', 'PaddressLine370', 'TaddressLine370', '22', '12346047', '9812346039', '1234567890000370', 'gen', '', 1, '', 'B+', 'Theo', '7812345670', 'Maryalice', '8812345670', ''),
(17000094, 'Alma', 'Retta', 'Laverne', 'cmpn', 'd1a', 1, '2009-11-22', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine377', 'TaddressLine377', '22', '12346054', '9812346046', '1234567890000377', 'obc', 'goi', 1, '', 'A+', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000095, 'Terri', 'Maryjo', 'Luisa', 'extc', 'd2c', 0, '2009-11-26', 1, 2017, 'Luisa.Terri@ves.ac.in', 'Terri@gmail.com', 'PaddressLine381', 'TaddressLine381', '22', '12346058', '9812346050', '1234567890000381', 'sc', 'tfws', 1, '', 'A+', 'Wyatt', '7812345670', 'Cheree', '8812345670', ''),
(17000096, 'Isabella', 'Elenora', 'Myles', 'cmpn', 'd1a', 0, '2009-11-30', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine385', 'TaddressLine385', '22', '12346062', '9812346054', '1234567890000385', 'st', 'jk', 1, '', 'A+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000097, 'Cecily', 'Kiyoko', 'Paige', 'inft', 'd2c', 1, '2009-12-04', 1, 2017, 'Paige.Cecily@ves.ac.in', 'Cecily@gmail.com', 'PaddressLine389', 'TaddressLine389', '22', '12346066', '9812346058', '1234567890000389', 'sindhi', 'goi', 1, '', 'A+', 'Wilburn', '7812345670', 'Marcelina', '8812345670', ''),
(17000099, 'Ocie', 'Toi', 'Kathlyn', 'cmpn', 'd2b', 1, '2009-12-11', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine396', 'TaddressLine396', '22', '12346073', '9812346065', '1234567890000396', 'nt', '', 1, '', 'A-', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000100, 'Latia', 'Whitney', 'Sergio', 'extc', 'd20', 1, '2009-12-15', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine400', 'TaddressLine400', '22', '12346077', '9812346069', '1234567890000400', 'gen', '', 1, '', 'A+', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000101, 'Yuko', 'Arlene', 'Trina', 'cmpn', 'd46', 0, '2009-12-19', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine404', 'TaddressLine404', '22', '12346081', '9812346073', '1234567890000404', 'obc', '', 0, '', 'A+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000102, 'Nancey', 'Yuriko', 'Jacquiline', 'inft', 'd2a', 1, '2009-12-23', 1, 2017, 'Jacquiline.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine408', 'TaddressLine408', '22', '12346085', '9812346077', '1234567890000408', 'sc', '', 1, '', 'A+', 'Keven', '7812345670', 'Tifany', '8812345670', ''),
(17000104, 'Daisy', 'Rema', 'Zackary', 'inst', 'd2b', 0, '2009-12-31', 1, 2017, 'Zackary.Daisy@ves.ac.in', 'Daisy@gmail.com', 'PaddressLine416', 'TaddressLine416', '22', '12346093', '9812346085', '1234567890000416', 'st', '', 0, '', 'A+', 'Jorge', '7812345670', 'Bella', '8812345670', ''),
(17000106, 'Melynda', 'Caleb', 'Beverlee', 'cmpn', 'd2a', 0, '2010-01-07', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine423', 'TaddressLine423', '22', '12346100', '9812346092', '1234567890000423', 'sindhi', 'tfws', 1, '', 'A+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000107, 'Danelle', 'Randa', 'Brittny', 'inft', 'd19', 1, '2010-01-11', 1, 2017, 'Brittny.Danelle@ves.ac.in', 'Danelle@gmail.com', 'PaddressLine427', 'TaddressLine427', '22', '12346104', '9812346096', '1234567890000427', 'nt', '', 1, '', 'A-', 'Darwin', '7812345670', 'Roxie', '8812345670', ''),
(17000108, 'Kit', 'Shirely', 'Venice', 'inst', 'd2a', 1, '2010-01-15', 1, 2017, 'Venice.Kit@ves.ac.in', 'Kit@gmail.com', 'PaddressLine431', 'TaddressLine431', '22', '12346108', '9812346100', '1234567890000431', 'gen', '', 0, '', 'A+', 'Vaughn', '7812345670', 'Elmira', '8812345670', ''),
(17000109, 'Marlys', 'Hermelinda', 'Judith', 'inst', 'd22', 0, '2010-01-19', 1, 2017, 'Judith.Marlys@ves.ac.in', 'Marlys@gmail.com', 'PaddressLine435', 'TaddressLine435', '22', '12346112', '9812346104', '1234567890000435', 'obc', '', 1, '', 'A+', 'Leland', '7812345670', 'Ai', '8812345670', ''),
(17000111, 'Emil', 'Lyn', 'Myung', 'inft', 'd2a', 0, '2010-01-30', 1, 2017, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine446', 'TaddressLine446', '22', '12346123', '9812346115', '1234567890000446', 'sc', 'tfws', 1, '', 'AB+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(17000112, 'Twyla', 'Eun', 'Chana', 'inst', 'd7', 1, '2010-02-03', 1, 2017, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine450', 'TaddressLine450', '22', '12346127', '9812346119', '1234567890000450', 'gen', 'jk', 1, '', 'AB+', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(17000113, 'Melynda', 'Caleb', 'Beverlee', 'inst', 'd2a', 1, '2010-02-07', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine454', 'TaddressLine454', '22', '12346131', '9812346123', '1234567890000454', 'sindhi', 'goi', 1, '', 'A+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000115, 'Mauro', 'Anna', 'Laticia', 'cmpn', 'd1b', 1, '2010-02-14', 1, 2017, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine461', 'TaddressLine461', '22', '12346138', '9812346130', '1234567890000461', 'sc', '', 1, '', 'AB-', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(17000116, 'Laquita', 'Margene', 'Virgen', 'inft', 'd12', 0, '2010-02-18', 1, 2017, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine465', 'TaddressLine465', '22', '12346142', '9812346134', '1234567890000465', 'st', '', 0, '', 'AB+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(17000117, 'Myra', 'Halley', 'Georgann', 'inst', 'd1b', 1, '2010-02-22', 1, 2017, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine469', 'TaddressLine469', '22', '12346146', '9812346138', '1234567890000469', 'sindhi', '', 1, '', 'AB+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(17000118, 'Melina', 'Marsha', 'Leesa', 'inst', 'd15', 1, '2010-02-26', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine473', 'TaddressLine473', '22', '12346150', '9812346142', '1234567890000473', 'sc', '', 1, '', 'AB+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000120, 'Inocencia', 'Shana', 'Esther', 'cmpn', 'd2c', 1, '2010-03-05', 1, 2017, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine480', 'TaddressLine480', '22', '12346157', '9812346149', '1234567890000480', 'gen', 'jk', 1, '', 'O+', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(17000121, 'Marion', 'Shantell', 'Latonya', 'inft', 'd1a', 0, '2010-03-09', 1, 2017, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine484', 'TaddressLine484', '22', '12346161', '9812346153', '1234567890000484', 'obc', 'goi', 0, '', 'O+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(17000122, 'Tressie', 'Amy', 'Columbus', 'inst', 'd2c', 0, '2010-03-13', 1, 2017, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine488', 'TaddressLine488', '22', '12346165', '9812346157', '1234567890000488', 'sc', 'tfws', 1, '', 'B+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(17000123, 'Reatha', 'Golda', 'Lynetta', 'inst', 'd1a', 1, '2010-03-17', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine492', 'TaddressLine492', '22', '12346169', '9812346161', '1234567890000492', 'st', 'jk', 1, '', 'AB-', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000125, 'Magaret', 'Alva', 'Ludie', 'cmpn', 'd26', 1, '2010-03-24', 1, 2017, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine499', 'TaddressLine499', '22', '12346176', '9812346168', '1234567890000499', 'sindhi', 'tfws', 1, '', 'O+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(17000126, 'Helga', 'Voncile', 'Chae', 'inft', 'd2b', 1, '2010-03-28', 1, 2017, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine503', 'TaddressLine503', '22', '12346180', '9812346172', '1234567890000503', 'nt', 'jk', 1, '', 'O+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(17000127, 'Talitha', 'Shalanda', 'Demetrius', 'inst', 'd29', 0, '2010-04-01', 1, 2017, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine507', 'TaddressLine507', '22', '12346184', '9812346176', '1234567890000507', 'gen', 'goi', 1, '', 'O+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(17000128, 'Alma', 'Retta', 'Laverne', 'inst', 'd2b', 1, '2010-04-05', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine511', 'TaddressLine511', '22', '12346188', '9812346180', '1234567890000511', 'obc', 'tfws', 1, '', 'O+', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000130, 'Isabella', 'Elenora', 'Myles', 'extc', 'd2b', 0, '2010-04-13', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine519', 'TaddressLine519', '22', '12346196', '9812346188', '1234567890000519', 'st', 'goi', 1, '', 'B+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000131, 'Esperanza', 'Dewayne', 'Yun', 'inst', 'd2a', 0, '2010-04-20', 1, 2017, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine526', 'TaddressLine526', '22', '12346203', '9812346195', '1234567890000526', 'sindhi', '', 1, '', 'O+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(17000132, 'Ocie', 'Toi', 'Kathlyn', 'inst', 'd37', 1, '2010-04-24', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine530', 'TaddressLine530', '22', '12346207', '9812346199', '1234567890000530', 'nt', '', 1, '', 'O+', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000133, 'Latia', 'Whitney', 'Sergio', 'cmpn', 'd2a', 1, '2010-04-28', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine534', 'TaddressLine534', '22', '12346211', '9812346203', '1234567890000534', 'gen', '', 0, '', 'O+', 'Todd', '7812345670', 'Ardelia', '8812345670', '');
INSERT INTO `student` (`UID`, `FirstName`, `MiddleName`, `LastName`, `Branch`, `Class`, `Gender`, `DOB`, `TypeOfAdmission`, `AdmissionYear`, `EmailId`, `SecEmailId`, `PermanentAddress`, `TempAddress`, `std_code`, `LandlineNo`, `MobileNo`, `AadharCard`, `Category`, `AddCategory`, `IsBranchChanged`, `Mentor`, `BloodGroup`, `Fathers_Name`, `Fathers_No`, `Mothers_Name`, `Mothers_No`, `image`) VALUES
(17000134, 'Yuko', 'Arlene', 'Trina', 'extc', 'd40', 0, '2010-05-02', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine538', 'TaddressLine538', '22', '12346215', '9812346207', '1234567890000538', 'obc', '', 1, '', 'O+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000136, 'Beatrice', 'Dyan', 'Deedee', 'inst', 'd41', 0, '2010-05-09', 1, 2017, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine545', 'TaddressLine545', '22', '12346222', '9812346214', '1234567890000545', 'sc', 'jk', 1, '', 'B+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(17000137, 'Emil', 'Lyn', 'Myung', 'inst', 'd2a', 0, '2010-05-13', 1, 2017, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine549', 'TaddressLine549', '22', '12346226', '9812346218', '1234567890000549', 'sc', 'goi', 1, '', 'A+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(17000138, 'Twyla', 'Eun', 'Chana', 'cmpn', 'd10', 1, '2010-05-17', 1, 2017, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine553', 'TaddressLine553', '22', '12346230', '9812346222', '1234567890000553', 'gen', 'tfws', 1, '', 'O-', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(17000139, 'Melynda', 'Caleb', 'Beverlee', 'extc', 'd2a', 1, '2010-05-21', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine557', 'TaddressLine557', '22', '12346234', '9812346226', '1234567890000557', 'sindhi', 'jk', 1, '', 'O+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000141, 'Mauro', 'Anna', 'Laticia', 'inst', 'd1b', 1, '2010-05-28', 1, 2017, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine564', 'TaddressLine564', '22', '12346241', '9812346233', '1234567890000564', 'sc', '', 1, '', 'B+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(17000142, 'Laquita', 'Margene', 'Virgen', 'inst', 'd15', 0, '2010-06-01', 1, 2017, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine568', 'TaddressLine568', '22', '12346245', '9812346237', '1234567890000568', 'st', '', 1, '', 'B+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(17000143, 'Myra', 'Halley', 'Georgann', 'cmpn', 'd1b', 1, '2010-06-05', 1, 2017, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine572', 'TaddressLine572', '22', '12346249', '9812346241', '1234567890000572', 'sindhi', 'goi', 0, '', 'B+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(17000144, 'Melina', 'Marsha', 'Leesa', 'extc', 'd18', 1, '2010-06-09', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine576', 'TaddressLine576', '22', '12346253', '9812346245', '1234567890000576', 'sc', 'tfws', 1, '', 'B+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000146, 'Inocencia', 'Shana', 'Esther', 'inst', 'd2c', 1, '2010-06-16', 1, 2017, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine583', 'TaddressLine583', '22', '12346260', '9812346252', '1234567890000583', 'gen', '', 1, '', 'B-', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(17000147, 'Marion', 'Shantell', 'Latonya', 'inst', 'd1a', 0, '2010-06-20', 1, 2017, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine587', 'TaddressLine587', '22', '12346264', '9812346256', '1234567890000587', 'obc', '', 0, '', 'B+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(17000148, 'Tressie', 'Amy', 'Columbus', 'cmpn', 'd2c', 0, '2010-06-24', 1, 2017, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine591', 'TaddressLine591', '22', '12346268', '9812346260', '1234567890000591', 'sc', '', 1, '', 'B+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(17000149, 'Reatha', 'Golda', 'Lynetta', 'extc', 'd1a', 1, '2010-06-28', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine595', 'TaddressLine595', '22', '12346272', '9812346264', '1234567890000595', 'st', '', 0, '', 'B+', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000150, 'Magaret', 'Alva', 'Ludie', 'inst', 'd29', 1, '2010-07-05', 1, 2017, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine602', 'TaddressLine602', '22', '12346279', '9812346271', '1234567890000602', 'sindhi', 'goi', 1, '', 'A+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(17000151, 'Helga', 'Voncile', 'Chae', 'inst', 'd2b', 1, '2010-07-09', 1, 2017, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine606', 'TaddressLine606', '22', '12346283', '9812346275', '1234567890000606', 'nt', 'tfws', 1, '', 'A+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(17000152, 'Talitha', 'Shalanda', 'Demetrius', 'cmpn', 'd32', 0, '2010-07-13', 1, 2017, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine610', 'TaddressLine610', '22', '12346287', '9812346279', '1234567890000610', 'gen', 'jk', 1, '', 'B+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(17000153, 'Alma', 'Retta', 'Laverne', 'extc', 'd2b', 1, '2010-07-17', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine614', 'TaddressLine614', '22', '12346291', '9812346283', '1234567890000614', 'obc', 'goi', 0, '', 'B-', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000155, 'Isabella', 'Elenora', 'Myles', 'cmpn', 'd2b', 0, '2010-07-25', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine622', 'TaddressLine622', '22', '12346299', '9812346291', '1234567890000622', 'st', 'jk', 1, '', 'B+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000157, 'Esperanza', 'Dewayne', 'Yun', 'cmpn', 'd2a', 0, '2010-08-01', 1, 2017, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine629', 'TaddressLine629', '22', '12346306', '9812346298', '1234567890000629', 'sindhi', '', 1, '', 'A+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(17000158, 'Ocie', 'Toi', 'Kathlyn', 'extc', 'd40', 1, '2010-08-05', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine633', 'TaddressLine633', '22', '12346310', '9812346302', '1234567890000633', 'nt', '', 1, '', 'A+', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000159, 'Latia', 'Whitney', 'Sergio', 'cmpn', 'd2a', 1, '2010-08-09', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine637', 'TaddressLine637', '22', '12346314', '9812346306', '1234567890000637', 'gen', '', 1, '', 'A+', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000160, 'Yuko', 'Arlene', 'Trina', 'cmpn', 'd43', 0, '2010-08-13', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine641', 'TaddressLine641', '22', '12346318', '9812346310', '1234567890000641', 'obc', 'tfws', 1, '', 'B+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000162, 'Beatrice', 'Dyan', 'Deedee', 'cmpn', 'd43', 0, '2010-08-20', 1, 2017, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine648', 'TaddressLine648', '22', '12346325', '9812346317', '1234567890000648', 'sc', '', 1, '', 'A+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(17000163, 'Emil', 'Lyn', 'Myung', 'extc', 'd2a', 0, '2010-08-24', 1, 2017, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine652', 'TaddressLine652', '22', '12346329', '9812346321', '1234567890000652', 'sc', '', 1, '', 'A+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(17000164, 'Twyla', 'Eun', 'Chana', 'cmpn', 'd13', 1, '2010-08-28', 1, 2017, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine656', 'TaddressLine656', '22', '12346333', '9812346325', '1234567890000656', 'gen', '', 1, '', 'A+', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(17000165, 'Melynda', 'Caleb', 'Beverlee', 'cmpn', 'd2a', 1, '2010-09-01', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine660', 'TaddressLine660', '22', '12346337', '9812346329', '1234567890000660', 'sindhi', '', 1, '', 'A+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000167, 'Mauro', 'Anna', 'Laticia', 'cmpn', 'd1b', 1, '2010-09-08', 1, 2017, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine667', 'TaddressLine667', '22', '12346344', '9812346336', '1234567890000667', 'sc', 'goi', 1, '', 'AB+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(17000168, 'Laquita', 'Margene', 'Virgen', 'extc', 'd18', 0, '2010-09-12', 1, 2017, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine671', 'TaddressLine671', '22', '12346348', '9812346340', '1234567890000671', 'st', 'tfws', 1, '', 'A+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(17000169, 'Myra', 'Halley', 'Georgann', 'cmpn', 'd1b', 1, '2010-09-16', 1, 2017, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine675', 'TaddressLine675', '22', '12346352', '9812346344', '1234567890000675', 'sindhi', 'jk', 1, '', 'A-', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(17000170, 'Melina', 'Marsha', 'Leesa', 'cmpn', 'd21', 1, '2010-09-20', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine679', 'TaddressLine679', '22', '12346356', '9812346348', '1234567890000679', 'sc', 'goi', 1, '', 'A+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000171, 'Inocencia', 'Shana', 'Esther', 'cmpn', 'd2c', 1, '2010-09-27', 1, 2017, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine686', 'TaddressLine686', '22', '12346363', '9812346355', '1234567890000686', 'gen', '', 1, '', 'AB+', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(17000172, 'Marion', 'Shantell', 'Latonya', 'extc', 'd1a', 0, '2010-10-01', 1, 2017, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine690', 'TaddressLine690', '22', '12346367', '9812346359', '1234567890000690', 'obc', '', 0, '', 'AB+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(17000173, 'Tressie', 'Amy', 'Columbus', 'cmpn', 'd2c', 0, '2010-10-05', 1, 2017, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine694', 'TaddressLine694', '22', '12346371', '9812346363', '1234567890000694', 'sc', '', 1, '', 'AB+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(17000174, 'Reatha', 'Golda', 'Lynetta', 'cmpn', 'd1a', 1, '2010-10-09', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine698', 'TaddressLine698', '22', '12346375', '9812346367', '1234567890000698', 'st', '', 1, '', 'AB+', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000176, 'Magaret', 'Alva', 'Ludie', 'cmpn', 'd32', 1, '2010-10-16', 1, 2017, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine705', 'TaddressLine705', '22', '12346382', '9812346374', '1234567890000705', 'sindhi', 'jk', 1, '', 'B+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(17000177, 'Helga', 'Voncile', 'Chae', 'extc', 'd2b', 1, '2010-10-20', 1, 2017, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine709', 'TaddressLine709', '22', '12346386', '9812346378', '1234567890000709', 'nt', 'goi', 1, '', 'AB-', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(17000178, 'Talitha', 'Shalanda', 'Demetrius', 'cmpn', 'd35', 0, '2010-10-24', 1, 2017, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine713', 'TaddressLine713', '22', '12346390', '9812346382', '1234567890000713', 'gen', '', 1, '', 'AB+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(17000179, 'Alma', 'Retta', 'Laverne', 'cmpn', 'd2b', 1, '2010-10-28', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine717', 'TaddressLine717', '22', '12346394', '9812346386', '1234567890000717', 'obc', '', 0, '', 'AB+', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000181, 'Isabella', 'Elenora', 'Myles', 'inst', 'd2b', 0, '2010-11-05', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine725', 'TaddressLine725', '22', '12346402', '9812346394', '1234567890000725', 'st', '', 0, '', 'AB+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000183, 'Esperanza', 'Dewayne', 'Yun', 'cmpn', 'd2a', 0, '2010-11-12', 1, 2017, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine732', 'TaddressLine732', '22', '12346409', '9812346401', '1234567890000732', 'sindhi', 'goi', 1, '', 'O+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(17000184, 'Ocie', 'Toi', 'Kathlyn', 'cmpn', 'd43', 1, '2010-11-16', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine736', 'TaddressLine736', '22', '12346413', '9812346405', '1234567890000736', 'nt', 'tfws', 1, '', 'B+', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000185, 'Latia', 'Whitney', 'Sergio', 'inft', 'd2a', 1, '2010-11-20', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine740', 'TaddressLine740', '22', '12346417', '9812346409', '1234567890000740', 'gen', 'jk', 1, '', 'AB-', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000186, 'Yuko', 'Arlene', 'Trina', 'inst', 'd46', 0, '2010-11-24', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine744', 'TaddressLine744', '22', '12346421', '9812346413', '1234567890000744', 'obc', 'goi', 0, '', 'AB+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000188, 'Beatrice', 'Dyan', 'Deedee', 'cmpn', 'd45', 0, '2010-12-01', 1, 2017, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine751', 'TaddressLine751', '22', '12346428', '9812346420', '1234567890000751', 'sc', '', 0, '', 'O+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(17000189, 'Emil', 'Lyn', 'Myung', 'extc', 'd2a', 0, '2010-12-05', 1, 2017, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine755', 'TaddressLine755', '22', '12346432', '9812346424', '1234567890000755', 'sc', '', 1, '', 'O+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(17000190, 'Twyla', 'Eun', 'Chana', 'cmpn', 'd16', 1, '2010-12-09', 1, 2017, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine759', 'TaddressLine759', '22', '12346436', '9812346428', '1234567890000759', 'gen', '', 1, '', 'O+', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(17000191, 'Melynda', 'Caleb', 'Beverlee', 'inft', 'd2a', 1, '2010-12-13', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine763', 'TaddressLine763', '22', '12346440', '9812346432', '1234567890000763', 'sindhi', '', 1, '', 'O+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000192, 'Mauro', 'Anna', 'Laticia', 'cmpn', 'd1b', 1, '2010-12-20', 1, 2017, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine770', 'TaddressLine770', '22', '12346447', '9812346439', '1234567890000770', 'sc', 'jk', 0, '', 'O-', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(17000193, 'Laquita', 'Margene', 'Virgen', 'extc', 'd21', 0, '2010-12-24', 1, 2017, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine774', 'TaddressLine774', '22', '12346451', '9812346443', '1234567890000774', 'st', 'goi', 1, '', 'O+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(17000194, 'Myra', 'Halley', 'Georgann', 'cmpn', 'd1b', 1, '2010-12-28', 1, 2017, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine778', 'TaddressLine778', '22', '12346455', '9812346447', '1234567890000778', 'sindhi', 'tfws', 1, '', 'O+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(17000195, 'Melina', 'Marsha', 'Leesa', 'inft', 'd3', 1, '2011-01-01', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine782', 'TaddressLine782', '22', '12346459', '9812346451', '1234567890000782', 'sc', '', 1, '', 'O+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000197, 'Inocencia', 'Shana', 'Esther', 'cmpn', 'd2c', 1, '2011-01-08', 1, 2017, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine789', 'TaddressLine789', '22', '12346466', '9812346458', '1234567890000789', 'gen', 'tfws', 1, '', 'B+', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(17000198, 'Marion', 'Shantell', 'Latonya', 'extc', 'd1a', 0, '2011-01-12', 1, 2017, 'Latonya.Marion@ves.ac.in', 'Marion@gmail.com', 'PaddressLine793', 'TaddressLine793', '22', '12346470', '9812346462', '1234567890000793', 'obc', 'jk', 1, '', 'B+', 'Calvin', '7812345670', 'Eloisa', '8812345670', ''),
(17000199, 'Tressie', 'Amy', 'Columbus', 'cmpn', 'd2c', 0, '2011-01-16', 1, 2017, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine797', 'TaddressLine797', '22', '12346474', '9812346466', '1234567890000797', 'sc', 'goi', 1, '', 'A+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(17000200, 'Reatha', 'Golda', 'Lynetta', 'inft', 'd1a', 1, '2011-01-20', 1, 2017, 'Lynetta.Reatha@ves.ac.in', 'Reatha@gmail.com', 'PaddressLine801', 'TaddressLine801', '22', '12346478', '9812346470', '1234567890000801', 'st', 'tfws', 1, '', 'O-', 'Quinn', '7812345670', 'Carmel', '8812345670', ''),
(17000202, 'Magaret', 'Alva', 'Ludie', 'cmpn', 'd14', 1, '2011-01-27', 1, 2017, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine808', 'TaddressLine808', '22', '12346485', '9812346477', '1234567890000808', 'sindhi', '', 1, '', 'B+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(17000203, 'Helga', 'Voncile', 'Chae', 'extc', 'd2b', 1, '2011-01-31', 1, 2017, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine812', 'TaddressLine812', '22', '12346489', '9812346481', '1234567890000812', 'nt', '', 1, '', 'B+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(17000204, 'Talitha', 'Shalanda', 'Demetrius', 'cmpn', 'd17', 0, '2011-02-04', 1, 2017, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine816', 'TaddressLine816', '22', '12346493', '9812346485', '1234567890000816', 'gen', '', 1, '', 'B+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(17000205, 'Alma', 'Retta', 'Laverne', 'inft', 'd2b', 1, '2011-02-08', 1, 2017, 'Laverne.Alma@ves.ac.in', 'Alma@gmail.com', 'PaddressLine820', 'TaddressLine820', '22', '12346497', '9812346489', '1234567890000820', 'obc', '', 0, '', 'B+', 'Valentine', '7812345670', 'Opal', '8812345670', ''),
(17000207, 'Isabella', 'Elenora', 'Myles', 'inst', 'd1b', 0, '2011-02-16', 1, 2017, 'Myles.Isabella@ves.ac.in', 'Isabella@gmail.com', 'PaddressLine828', 'TaddressLine828', '22', '12346505', '9812346497', '1234567890000828', 'st', '', 1, '', 'A+', 'Terrell', '7812345670', 'Asuncion', '8812345670', ''),
(17000209, 'Esperanza', 'Dewayne', 'Yun', 'cmpn', 'd1a', 0, '2011-02-23', 1, 2017, 'Yun.Esperanza@ves.ac.in', 'Esperanza@gmail.com', 'PaddressLine835', 'TaddressLine835', '22', '12346512', '9812346504', '1234567890000835', 'sindhi', 'jk', 1, '', 'B+', 'Jamison', '7812345670', 'India', '8812345670', ''),
(17000210, 'Ocie', 'Toi', 'Kathlyn', 'inft', 'd2c', 1, '2011-02-27', 1, 2017, 'Kathlyn.Ocie@ves.ac.in', 'Ocie@gmail.com', 'PaddressLine839', 'TaddressLine839', '22', '12346516', '9812346508', '1234567890000839', 'nt', 'goi', 1, '', 'B+', 'Gene', '7812345670', 'Delisa', '8812345670', ''),
(17000211, 'Latia', 'Whitney', 'Sergio', 'inst', 'd1a', 1, '2011-03-03', 1, 2017, 'Sergio.Latia@ves.ac.in', 'Latia@gmail.com', 'PaddressLine843', 'TaddressLine843', '22', '12346520', '9812346512', '1234567890000843', 'gen', 'tfws', 1, '', 'B+', 'Todd', '7812345670', 'Ardelia', '8812345670', ''),
(17000212, 'Yuko', 'Arlene', 'Trina', 'inst', 'd2c', 0, '2011-03-07', 1, 2017, 'Trina.Yuko@ves.ac.in', 'Yuko@gmail.com', 'PaddressLine847', 'TaddressLine847', '22', '12346524', '9812346516', '1234567890000847', 'obc', 'jk', 0, '', 'B+', 'Randy', '7812345670', 'Gina', '8812345670', ''),
(17000213, 'Beatrice', 'Dyan', 'Deedee', 'cmpn', 'd2b', 0, '2011-03-14', 1, 2017, 'Deedee.Beatrice@ves.ac.in', 'Beatrice@gmail.com', 'PaddressLine854', 'TaddressLine854', '22', '12346531', '9812346523', '1234567890000854', 'sc', 'tfws', 1, '', 'A+', 'Bill', '7812345670', 'Blanch', '8812345670', ''),
(17000214, 'Emil', 'Lyn', 'Myung', 'inft', 'd14', 0, '2011-03-18', 1, 2017, 'Myung.Emil@ves.ac.in', 'Emil@gmail.com', 'PaddressLine858', 'TaddressLine858', '22', '12346535', '9812346527', '1234567890000858', 'sc', 'jk', 0, '', 'B+', 'Hong', '7812345670', 'Emogene', '8812345670', ''),
(17000215, 'Twyla', 'Eun', 'Chana', 'inst', 'd2b', 1, '2011-03-22', 1, 2017, 'Chana.Twyla@ves.ac.in', 'Twyla@gmail.com', 'PaddressLine862', 'TaddressLine862', '22', '12346539', '9812346531', '1234567890000862', 'gen', 'goi', 1, '', 'B-', 'Roosevelt', '7812345670', 'Jessia', '8812345670', ''),
(17000216, 'Melynda', 'Caleb', 'Beverlee', 'inst', 'd17', 1, '2011-03-26', 1, 2017, 'Beverlee.Melynda@ves.ac.in', 'Melynda@gmail.com', 'PaddressLine866', 'TaddressLine866', '22', '12346543', '9812346535', '1234567890000866', 'sindhi', 'tfws', 1, '', 'B+', 'Valentine', '7812345670', 'Malia', '8812345670', ''),
(17000218, 'Mauro', 'Anna', 'Laticia', 'cmpn', 'd19', 1, '2011-04-02', 1, 2017, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine873', 'TaddressLine873', '22', '12346550', '9812346542', '1234567890000873', 'sc', '', 0, '', 'A+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(17000219, 'Laquita', 'Margene', 'Virgen', 'inft', 'd1a', 0, '2011-04-06', 1, 2017, 'Virgen.Laquita@ves.ac.in', 'Laquita@gmail.com', 'PaddressLine877', 'TaddressLine877', '22', '12346554', '9812346546', '1234567890000877', 'st', '', 1, '', 'A+', 'Hayden', '7812345670', 'Bulah', '8812345670', ''),
(17000220, 'Myra', 'Halley', 'Georgann', 'inst', 'd2c', 1, '2011-04-10', 1, 2017, 'Georgann.Myra@ves.ac.in', 'Myra@gmail.com', 'PaddressLine881', 'TaddressLine881', '22', '12346558', '9812346550', '1234567890000881', 'sindhi', '', 0, '', 'A+', 'Rudy', '7812345670', 'Inell', '8812345670', ''),
(17000221, 'Melina', 'Marsha', 'Leesa', 'inst', 'd1a', 1, '2011-04-14', 1, 2017, 'Leesa.Melina@ves.ac.in', 'Melina@gmail.com', 'PaddressLine885', 'TaddressLine885', '22', '12346562', '9812346554', '1234567890000885', 'sc', '', 1, '', 'A+', 'Micheal', '7812345670', 'Meghann', '8812345670', ''),
(17000223, 'Jerica', 'Randee', 'Gerard', 'cmpn', 'd8', 1, '2011-04-21', 1, 2017, 'Gerard.Jerica@ves.ac.in', 'Jerica@gmail.com', 'PaddressLine892', 'TaddressLine892', '22', '12346569', '9812346561', '1234567890000892', 'nt', 'goi', 1, '', 'A-', 'Logan', '7812345670', 'Elba', '8812345670', ''),
(17000224, 'Shanti', 'Tilda', 'Arthur', 'inft', 'd2b', 0, '2011-04-25', 1, 2017, 'Arthur.Shanti@ves.ac.in', 'Shanti@gmail.com', 'PaddressLine896', 'TaddressLine896', '22', '12346573', '9812346565', '1234567890000896', 'gen', 'tfws', 1, '', 'A+', 'Donte', '7812345670', 'Tressa', '8812345670', ''),
(17000225, 'Sherwood', 'Mui', 'Violet', 'inst', 'd11', 0, '2011-04-29', 1, 2017, 'Violet.Sherwood@ves.ac.in', 'Sherwood@gmail.com', 'PaddressLine900', 'TaddressLine900', '22', '12346577', '9812346569', '1234567890000900', 'obc', 'jk', 0, '', 'A+', 'Rich', '7812345670', 'Rochel', '8812345670', ''),
(17000226, 'Mauro', 'Anna', 'Laticia', 'inst', 'd2b', 1, '2011-05-03', 1, 2017, 'Laticia.Mauro@ves.ac.in', 'Mauro@gmail.com', 'PaddressLine904', 'TaddressLine904', '22', '12346581', '9812346573', '1234567890000904', 'sc', 'goi', 1, '', 'A+', 'Dorsey', '7812345670', 'Shiloh', '8812345670', ''),
(17000228, 'Damien', 'Donette', 'Dale', 'cmpn', 'd2a', 1, '2011-05-10', 1, 2017, 'Dale.Damien@ves.ac.in', 'Damien@gmail.com', 'PaddressLine911', 'TaddressLine911', '22', '12346588', '9812346580', '1234567890000911', 'gen', '', 1, '', 'AB+', 'Federico', '7812345670', 'Karina', '8812345670', ''),
(17000229, 'Sharilyn', 'Francie', 'Jenelle', 'inft', 'd16', 1, '2011-05-14', 1, 2017, 'Jenelle.Sharilyn@ves.ac.in', 'Sharilyn@gmail.com', 'PaddressLine915', 'TaddressLine915', '22', '12346592', '9812346584', '1234567890000915', 'sindhi', '', 1, '', 'AB+', 'Craig', '7812345670', 'Maia', '8812345670', ''),
(17000230, 'Nancey', 'Blanca', 'Bertha', 'inst', 'd2a', 0, '2011-05-18', 1, 2017, 'Bertha.Nancey@ves.ac.in', 'Nancey@gmail.com', 'PaddressLine919', 'TaddressLine919', '22', '12346596', '9812346588', '1234567890000919', 'nt', '', 1, '', 'A+', 'Earle', '7812345670', 'Jennie', '8812345670', ''),
(17000231, 'Inocencia', 'Shana', 'Esther', 'inst', 'd19', 1, '2011-05-22', 1, 2017, 'Esther.Inocencia@ves.ac.in', 'Inocencia@gmail.com', 'PaddressLine923', 'TaddressLine923', '22', '12346600', '9812346592', '1234567890000923', 'gen', '', 1, '', 'A-', 'Alva', '7812345670', 'Shonda', '8812345670', ''),
(17000233, 'Tressie', 'Amy', 'Columbus', 'extc', 'd2b', 0, '2011-05-30', 1, 2017, 'Columbus.Tressie@ves.ac.in', 'Tressie@gmail.com', 'PaddressLine931', 'TaddressLine931', '22', '12346608', '9812346600', '1234567890000931', 'sc', 'tfws', 1, '', 'A+', 'Kirk', '7812345670', 'Karren', '8812345670', ''),
(17000234, 'Kenna', 'Danae', 'Bonnie', 'inst', 'd2a', 0, '2011-06-06', 1, 2017, 'Bonnie.Kenna@ves.ac.in', 'Kenna@gmail.com', 'PaddressLine938', 'TaddressLine938', '22', '12346615', '9812346607', '1234567890000938', 'gen', '', 1, '', 'AB+', 'Eli', '7812345670', 'Claire', '8812345670', ''),
(17000235, 'Magaret', 'Alva', 'Ludie', 'inst', 'd7', 1, '2011-06-10', 1, 2017, 'Ludie.Magaret@ves.ac.in', 'Magaret@gmail.com', 'PaddressLine942', 'TaddressLine942', '22', '12346619', '9812346611', '1234567890000942', 'sindhi', '', 1, '', 'AB+', 'Jackson', '7812345670', 'Yoko', '8812345670', ''),
(17000236, 'Helga', 'Voncile', 'Chae', 'cmpn', 'd2a', 1, '2011-06-14', 1, 2017, 'Chae.Helga@ves.ac.in', 'Helga@gmail.com', 'PaddressLine946', 'TaddressLine946', '22', '12346623', '9812346615', '1234567890000946', 'nt', '', 1, '', 'AB+', 'Wayne', '7812345670', 'Frida', '8812345670', ''),
(17000237, 'Talitha', 'Shalanda', 'Demetrius', 'extc', 'd10', 0, '2011-06-18', 1, 2017, 'Demetrius.Talitha@ves.ac.in', 'Talitha@gmail.com', 'PaddressLine950', 'TaddressLine950', '22', '12346627', '9812346619', '1234567890000950', 'gen', '', 0, '', 'A+', 'Derrick', '7812345670', 'Argelia', '8812345670', ''),
(17000239, 'Tamisha', 'Guillermo', 'Mariann', 'inst', 'd12', 0, '2011-06-25', 1, 2017, 'Mariann.Tamisha@ves.ac.in', 'Tamisha@gmail.com', 'PaddressLine957', 'TaddressLine957', '22', '12346634', '9812346626', '1234567890000957', 'sindhi', 'goi', 1, '', 'AB-', 'Tanner', '7812345670', 'Maryann', '8812345670', ''),
(17000240, 'Yu', 'Yen', 'Thad', 'inst', 'd1b', 0, '2011-06-29', 1, 2017, 'Thad.Yu@ves.ac.in', 'Yu@gmail.com', 'PaddressLine961', 'TaddressLine961', '22', '12346638', '9812346630', '1234567890000961', 'sc', 'tfws', 1, '', 'AB+', 'Moshe', '7812345670', 'Valentina', '8812345670', ''),
(17000241, 'Ute', 'Donnetta', 'Joanna', 'cmpn', 'd15', 1, '2011-07-03', 1, 2017, 'Joanna.Ute@ves.ac.in', 'Ute@gmail.com', 'PaddressLine965', 'TaddressLine965', '22', '12346642', '9812346634', '1234567890000965', 'gen', 'jk', 1, '', 'AB+', 'Wilson', '7812345670', 'Mardell', '8812345670', '');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `updatefepreacademic` AFTER INSERT ON `student` FOR EACH ROW INSERT INTO 
    fepreacademic
    (
        UID
    )    
    VALUES(NEW.UID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_schema`
--

CREATE TABLE `syllabus_schema` (
  `sid` int(11) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `term_id` int(11) NOT NULL,
  `IA1` tinyint(1) NOT NULL COMMENT '1-Present 0-Absent',
  `IA1_max_marks` int(11) DEFAULT NULL,
  `IA1_pass_marks` int(11) DEFAULT NULL,
  `IA2` tinyint(1) NOT NULL COMMENT '1-Present 0-Absent',
  `IA2_max_marks` int(11) NOT NULL,
  `IA2_pass_marks` int(11) NOT NULL,
  `endsem` tinyint(1) NOT NULL COMMENT '1-Present 0-Absent',
  `endsem_max_marks` int(11) NOT NULL,
  `endsem_pass_marks` int(11) NOT NULL,
  `termwork` tinyint(1) NOT NULL COMMENT '1-Present 0-Absent',
  `termwork_max_marks` int(11) NOT NULL,
  `termwork_pass_marks` int(11) NOT NULL,
  `practical` tinyint(1) NOT NULL COMMENT '1-Present 0-Absent',
  `prac_max_marks` int(11) NOT NULL,
  `prac_pass_marks` int(11) NOT NULL,
  `oral` tinyint(1) NOT NULL COMMENT '1-Present 0-Absent',
  `oral_max_marks` int(11) NOT NULL,
  `oral_pass_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teaching_staff`
--

CREATE TABLE `teaching_staff` (
  `e_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-Permanent 0-Adhoc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaching_staff`
--

INSERT INTO `teaching_staff` (`e_id`, `department_id`, `shift`, `start_date`, `type`) VALUES
(1, 1, 'Morning', '2010-11-05', 1),
(2, 2, 'Morning', '2016-04-02', 1),
(3, 3, 'Afternoon', '2005-05-09', 0),
(4, 4, 'Afternoon', '2016-05-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_log`
--

CREATE TABLE `type_log` (
  `type_log_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-Permanent 0-Adhoc',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_log`
--

INSERT INTO `type_log` (`type_log_id`, `e_id`, `type`, `start_date`, `end_date`) VALUES
(1, 6, 1, '1998-08-12', '2002-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `uidchangeddetails`
--

CREATE TABLE `uidchangeddetails` (
  `OldUId` int(11) NOT NULL,
  `NewId` int(11) NOT NULL,
  `OldBranch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`AppId`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `dept_log`
--
ALTER TABLE `dept_log`
  ADD PRIMARY KEY (`dept_log_id`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `design_log`
--
ALTER TABLE `design_log`
  ADD PRIMARY KEY (`design_log_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `dsepreacademic`
--
ALTER TABLE `dsepreacademic`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `aadhaar_id` (`aadhaar_id`),
  ADD UNIQUE KEY `pancard` (`pancard`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `fepreacademic`
--
ALTER TABLE `fepreacademic`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_teaching_staff`
--
ALTER TABLE `non_teaching_staff`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `qual_log`
--
ALTER TABLE `qual_log`
  ADD PRIMARY KEY (`Qual_log_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `shift_log`
--
ALTER TABLE `shift_log`
  ADD PRIMARY KEY (`shift_log_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `studcomment`
--
ALTER TABLE `studcomment`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `MobileNo` (`MobileNo`);

--
-- Indexes for table `syllabus_schema`
--
ALTER TABLE `syllabus_schema`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `term_id` (`term_id`);

--
-- Indexes for table `teaching_staff`
--
ALTER TABLE `teaching_staff`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `type_log`
--
ALTER TABLE `type_log`
  ADD PRIMARY KEY (`type_log_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `uidchangeddetails`
--
ALTER TABLE `uidchangeddetails`
  ADD PRIMARY KEY (`NewId`),
  ADD KEY `NewId` (`NewId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `AppId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dept_log`
--
ALTER TABLE `dept_log`
  MODIFY `dept_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `design_log`
--
ALTER TABLE `design_log`
  MODIFY `design_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qual_log`
--
ALTER TABLE `qual_log`
  MODIFY `Qual_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shift_log`
--
ALTER TABLE `shift_log`
  MODIFY `shift_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studcomment`
--
ALTER TABLE `studcomment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `syllabus_schema`
--
ALTER TABLE `syllabus_schema`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_log`
--
ALTER TABLE `type_log`
  MODIFY `type_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `student` (`UID`);

--
-- Constraints for table `dept_log`
--
ALTER TABLE `dept_log`
  ADD CONSTRAINT `dept_log_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`),
  ADD CONSTRAINT `dept_log_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `design_log`
--
ALTER TABLE `design_log`
  ADD CONSTRAINT `design_log_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`);

--
-- Constraints for table `dsepreacademic`
--
ALTER TABLE `dsepreacademic`
  ADD CONSTRAINT `dsepreacademic_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `student` (`UID`);

--
-- Constraints for table `fepreacademic`
--
ALTER TABLE `fepreacademic`
  ADD CONSTRAINT `fepreacademic_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `student` (`UID`);

--
-- Constraints for table `non_teaching_staff`
--
ALTER TABLE `non_teaching_staff`
  ADD CONSTRAINT `non_teaching_staff_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`),
  ADD CONSTRAINT `non_teaching_staff_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `qual_log`
--
ALTER TABLE `qual_log`
  ADD CONSTRAINT `qual_log_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`);

--
-- Constraints for table `shift_log`
--
ALTER TABLE `shift_log`
  ADD CONSTRAINT `shift_log_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`);

--
-- Constraints for table `studcomment`
--
ALTER TABLE `studcomment`
  ADD CONSTRAINT `studcomment_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`),
  ADD CONSTRAINT `studcomment_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `student` (`UID`);

--
-- Constraints for table `teaching_staff`
--
ALTER TABLE `teaching_staff`
  ADD CONSTRAINT `teaching_staff_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`),
  ADD CONSTRAINT `teaching_staff_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `type_log`
--
ALTER TABLE `type_log`
  ADD CONSTRAINT `type_log_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `faculty` (`e_id`);

--
-- Constraints for table `uidchangeddetails`
--
ALTER TABLE `uidchangeddetails`
  ADD CONSTRAINT `uidchangeddetails_ibfk_1` FOREIGN KEY (`NewId`) REFERENCES `student` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
