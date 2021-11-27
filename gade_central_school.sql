-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 11:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gade_central_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationinfo`
--

CREATE TABLE `applicationinfo` (
  `CourseID` int(11) DEFAULT NULL,
  `PS_ID` int(11) DEFAULT NULL,
  `academicYear` int(11) DEFAULT NULL,
  `dateofApplication` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicationinfo`
--

INSERT INTO `applicationinfo` (`CourseID`, `PS_ID`, `academicYear`, `dateofApplication`) VALUES
(3, 3, 2021, '2021-01-10'),
(21, 8, NULL, NULL),
(22, 9, NULL, NULL),
(23, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `SID` int(11) DEFAULT NULL,
  `PresentNo` int(11) DEFAULT NULL,
  `Months` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`SID`, `PresentNo`, `Months`) VALUES
(14, 15, 'January'),
(15, 15, 'January'),
(16, 20, 'January'),
(17, 15, 'January'),
(18, 10, 'January'),
(19, 15, 'January'),
(20, 20, 'January'),
(21, 15, 'January'),
(22, 14, 'January'),
(23, 15, 'January'),
(48, 20, 'February'),
(49, 20, 'June'),
(50, 15, 'August'),
(51, 15, 'March'),
(52, 15, 'August'),
(59, 0, 'choose'),
(60, 20, 'March'),
(61, 20, 'March'),
(62, 15, 'January'),
(63, 15, 'January'),
(64, 15, 'January'),
(65, 15, 'March'),
(66, 15, 'January');

-- --------------------------------------------------------

--
-- Table structure for table `boardinghouse`
--

CREATE TABLE `boardinghouse` (
  `houseID` int(11) NOT NULL,
  `HouseName` varchar(20) DEFAULT NULL,
  `roomnumber` varchar(5) DEFAULT NULL,
  `HouseCapacity` smallint(6) DEFAULT NULL,
  `Numberofrooms` varchar(10) DEFAULT NULL,
  `RoomCapacity` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boardinghouse`
--

INSERT INTO `boardinghouse` (`houseID`, `HouseName`, `roomnumber`, `HouseCapacity`, `Numberofrooms`, `RoomCapacity`) VALUES
(1, 'Peter Aladjetey', 'A1', 410, '15', 15),
(2, 'Halm Addo', 'A12', 400, '13', 16),
(3, 'Alema', 'B11', 410, '16', 17),
(4, 'Ellen', 'C2', 350, '13', 21),
(5, 'Nana Oteng', 'B24', 320, '14', 13),
(6, '2', 'B4', 100, '50', 0),
(7, '1', 'B4', 100, '50', 0),
(8, '1', 'B4', 100, '50', 50),
(9, '1', 'B4', 0, '50', 50),
(10, '2', 'B4', 0, '50', 100),
(11, '3', 'C5', 100, '40', 7),
(12, '2', 'B9', 100, '60', 3),
(13, 'halm_addo', 'B4', 0, '40', 100),
(14, 'ellen', 'B4', 100, '60', 30),
(15, 'nanaoteng', 'C5', 80, '20', 4),
(16, 'halm_addo', 'A8', 80, '20', 4),
(17, 'halm_addo', 'B9', 100, '10', 10),
(18, 'alema', 'A9', 100, '20', 5),
(19, 'peter_aladjetey', 'B4', 100, '10', 10),
(20, 'alema', 'B4', 100, '20', 5),
(21, 'alema', 'B9', 100, '20', 5),
(22, 'halm_addo', 'B4', 100, '10', 10),
(23, 'peter_aladjetey', 'B4', 100, '10', 10),
(24, 'peter_aladjetey', 'B4', 100, '10', 10),
(25, 'peter_aladjetey', 'C5', 100, '20', 5),
(26, 'peter_aladjetey', 'C5', 100, '20', 5),
(27, 'peter_aladjetey', 'C5', 100, '20', 5),
(28, 'halm_addo', 'B9', 100, '10', 10),
(29, 'peter_aladjetey', 'B9', 100, '10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_id` int(11) NOT NULL,
  `CourseName` varchar(30) DEFAULT NULL,
  `Courserequirement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_id`, `CourseName`, `Courserequirement`) VALUES
(1, 'General Science', 410),
(2, 'Business', 400),
(3, 'General Arts', 350),
(4, 'Visual Arts', 340),
(5, 'Agriculture', 400),
(6, '1', NULL),
(7, '1', NULL),
(8, '2', NULL),
(9, '1', NULL),
(10, '3', NULL),
(11, '2', 350),
(12, '2', 350),
(13, 'General Arts', 350),
(14, 'choose', 0),
(15, 'Visual Arts', 350),
(16, 'General Science', 350),
(17, 'Business', 350),
(18, 'General Arts', 300),
(19, 'General Arts', 300),
(20, 'General Arts', 300),
(21, 'Agriculture', 500),
(22, 'General Arts', 300),
(23, 'General Science', 410),
(24, 'choose', 0),
(25, 'Business', 0),
(26, 'Business', 0),
(27, 'General Arts', 300),
(28, 'General Arts', 300),
(29, 'General Arts', 300),
(30, 'General Science', 300),
(31, 'General Science', 300);

-- --------------------------------------------------------

--
-- Table structure for table `coursesubject`
--

CREATE TABLE `coursesubject` (
  `Course_id` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursesubject`
--

INSERT INTO `coursesubject` (`Course_id`, `subjectID`) VALUES
(1, 1),
(2, 1),
(2, 2),
(4, 3),
(2, 4),
(3, 6),
(3, 7),
(3, 8),
(5, 9),
(4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptnum` int(11) NOT NULL,
  `Headofdepartment` varchar(50) DEFAULT NULL,
  `departmentName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptnum`, `Headofdepartment`, `departmentName`) VALUES
(1, 'Kofi Twumasi', 'Science'),
(2, 'Eunice Oppong', 'Maths'),
(3, 'Sarah Cudjoe ', 'English'),
(4, ' George Ampofo', 'Arts'),
(5, 'Kofi Appiah', 'Business'),
(6, 'Kwesi Appiah', 'Security'),
(7, 'Kofi Owusu', 'Dining'),
(8, 'Elijah Appiah', 'Manual Labour'),
(9, 'Janet Mensah', 'Admissions'),
(10, 'Kofi Yenkyi', 'Science'),
(11, 'Helena Okyere', 'Arts'),
(12, 'Yaa Amponsah', 'Library'),
(13, 'Akosua Amponsah', 'Admissions'),
(14, 'Helena Owusu', 'Business'),
(15, 'Helena Appiah', 'English'),
(16, 'Helena Oppong', 'Science'),
(17, 'Akosua Amponsah', 'Science'),
(18, 'Helena Oppong', 'Business'),
(19, 'Akosua Amponsah', 'Arts'),
(20, 'Kofi Yesu', 'Maths'),
(21, 'Kofi Yesu', 'Maths'),
(22, '', 'Admissions'),
(23, '', 'Admissions'),
(24, NULL, 'Admissions'),
(25, NULL, 'Admissions'),
(26, '', 'Maths'),
(27, NULL, 'Maths'),
(28, '', 'choose'),
(29, NULL, 'Business'),
(30, NULL, 'Business'),
(31, NULL, 'Maths'),
(32, NULL, 'Maths'),
(33, NULL, 'Maths'),
(34, NULL, 'Maths'),
(35, NULL, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `feesID` int(11) NOT NULL,
  `AccNum` int(11) DEFAULT NULL,
  `installment` int(11) DEFAULT NULL,
  `AmountPaid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`feesID`, `AccNum`, `installment`, `AmountPaid`) VALUES
(1, 44444, 2, '500.50'),
(2, 44445, 0, '1000.00'),
(3, 44446, 2, '500.50'),
(4, 44447, 3, '300.80'),
(5, 44448, 4, '200.50'),
(6, 44449, 1, '600.50'),
(7, 44450, 1, '650.50'),
(8, 44451, 3, '450.50'),
(9, 44452, 2, '700.50'),
(10, 44453, 2, '550.50'),
(40, 44453, 2, '800.00'),
(41, 44454, 2, '900.00'),
(42, 44455, 2, '600.00'),
(43, 44456, 3, '200.00'),
(44, 44459, 4, '100.00'),
(45, 44460, 4, '112.00'),
(46, 44463, 4, '120.00'),
(47, 44354, 2, '500.00'),
(48, 44359, 132, '110.00'),
(49, 44394, 2, '600.00'),
(50, 44339, 2, '700.00'),
(51, 44379, 2, '500.00'),
(52, 44379, 2, '300.00'),
(53, 44379, 2, '500.00'),
(54, 44379, 2, '500.00'),
(55, 443989, 4, '112.00'),
(56, 443989, 4, '112.00'),
(57, 443989, 4, '112.00'),
(58, 44379, 2, '500.00'),
(59, 44389, 2, '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `feespayment`
--

CREATE TABLE `feespayment` (
  `SID` int(11) DEFAULT NULL,
  `AccID` int(11) DEFAULT NULL,
  `academicyear` year(4) DEFAULT NULL,
  `paymentdate` timestamp NULL DEFAULT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feespayment`
--

INSERT INTO `feespayment` (`SID`, `AccID`, `academicyear`, `paymentdate`, `totalamount`) VALUES
(14, 1, 2022, '2022-04-22 09:30:30', '1000.00'),
(15, 2, 2022, '2021-05-22 09:30:30', '1000.00'),
(16, 3, 2021, '2021-04-14 10:40:30', '1000.00'),
(17, 4, 2021, '2021-05-13 11:30:40', '1000.00'),
(18, 5, 2022, '2021-04-22 14:50:30', '1000.00'),
(19, 6, 2023, '2021-05-02 12:30:30', '1000.00'),
(20, 7, 2021, '2021-06-22 11:20:39', '1000.00'),
(21, 8, 2022, '2021-03-23 10:40:40', '1000.00'),
(22, 9, 2023, '2021-04-22 08:30:50', '1000.00'),
(23, 10, 2023, '2021-06-22 10:30:30', '1000.00'),
(34, 41, 2021, NULL, '1000.00'),
(35, 42, 2021, NULL, '1000.00'),
(36, 43, 2021, NULL, '1000.00'),
(45, 44, 2021, NULL, '1000.00'),
(46, 45, 2021, NULL, '1000.00'),
(47, 46, 2021, NULL, '1000.00'),
(48, 47, 2021, NULL, '1000.00'),
(49, 48, 2021, NULL, '1000.00'),
(50, 49, 2021, NULL, '1000.00'),
(51, 50, 2021, NULL, '1000.00'),
(52, 51, 2021, NULL, '1000.00'),
(59, 52, 1991, NULL, '1000.00'),
(60, 53, 2021, NULL, '1000.00'),
(61, 54, 2021, NULL, '1000.00'),
(62, 55, 2021, NULL, '1000.00'),
(63, 56, 2021, NULL, '1000.00'),
(64, 57, 2021, NULL, '1000.00'),
(65, 58, 2021, NULL, '1000.00'),
(66, 59, 2021, NULL, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `nonteachingstaff`
--

CREATE TABLE `nonteachingstaff` (
  `NonteachingstaffID` int(11) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nonteachingstaff`
--

INSERT INTO `nonteachingstaff` (`NonteachingstaffID`, `SSN`, `Salary`) VALUES
(8, 82234587, '1000.00'),
(9, 82764512, '1000.00'),
(10, 82077722, '1200.00'),
(11, 82025632, '1100.70'),
(12, 82096542, '1040.30'),
(13, 82198552, '1000.00'),
(53, 55511, '1000.00'),
(56, 55511212, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Person_id` int(11) NOT NULL,
  `deptnum` int(11) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Person_id`, `deptnum`, `firstname`, `lastname`, `DOB`, `gender`, `nationality`, `address`) VALUES
(1, 1, 'Kofi', 'Ofosu', '1990-02-04', 'Male', 'Ghanaian', 'Kaneshie'),
(2, 2, 'Joshua', 'Asiedu', '1986-04-12', 'Male', 'Ghanaian', 'East Legon'),
(3, 3, 'Papa', 'Owusu', '1989-02-04', 'Male', 'Ghanaian', 'Lapaz'),
(4, 4, 'Kwaku', 'Quaye', '1990-05-12', 'Male', 'Ghanaian', 'Kasoa'),
(5, 5, 'Kofi', 'Adams', '1990-09-04', 'Male', 'Ghanaian', 'Achimota'),
(6, 1, 'Kingsley', 'Lamptey', '1986-05-10', 'Male', 'Ghanaian', 'Kwashieman'),
(7, 2, 'Kevin', 'Oppong', '1985-02-04', 'Male', 'Ghanaian', 'Korle-bu'),
(8, 6, 'Reynolds', 'Oppong', '1980-08-04', 'Male', 'Ghanaian', 'Korle-bu'),
(9, 7, 'Clara', 'Ofosu', '1982-02-04', 'Female', 'Ghanaian', 'Kaneshie'),
(10, 8, 'Moses', 'Asiedu', '1984-04-12', 'Male', 'Ghanaian', 'East Legon'),
(11, 6, 'Precious', 'Owusu', '1986-02-04', 'Female', 'Ghanaian', 'Lapaz'),
(12, 7, 'Benard', 'Quaye', '1989-05-12', 'Male', 'Ghanaian', 'Kasoa'),
(13, 8, 'Ella', 'Adams', '1990-09-04', 'Female', 'Ghanaian', 'Achimota'),
(14, 1, 'Ebo', 'Oppong', '2000-02-04', 'Male', 'Ghanaian', 'Korle-bu'),
(15, 1, 'Divine', 'Oppong', '2000-08-04', 'Female', 'Ghanaian', 'Korle-bu'),
(16, 5, 'David', 'Lamptey', '2001-05-10', 'Male', 'Ghanaian', 'Kwashieman'),
(17, 4, 'Reynolds', 'Oppong', '2002-08-04', 'Male', 'Ghanaian', 'Korle-bu'),
(18, 4, 'Clara', 'Ofosu', '2003-02-04', 'Female', 'Ghanaian', 'Kaneshie'),
(19, 4, 'Moses', 'Asiedu', '2000-04-12', 'Male', 'Ghanaian', 'East Legon'),
(20, 4, 'Precious', 'Owusu', '2001-02-04', 'Female', 'Ghanaian', 'Lapaz'),
(21, 4, 'Benard', 'Quaye', '2003-05-12', 'Male', 'Ghanaian', 'Kasoa'),
(22, 1, 'Ella', 'Adams', '2000-09-04', 'Female', 'Ghanaian', 'Achimota'),
(23, 5, 'Kevin', 'Oppong', '2004-02-04', 'Male', 'Ghanaian', 'Korle-bu'),
(32, NULL, 'Gerald', 'Tetteh', '2000-12-04', 'Male', 'ghanaian', NULL),
(33, NULL, 'Jesse', 'Nyemetei', '2000-12-04', 'Male', 'ghanaian', NULL),
(34, NULL, 'Anold', 'Nsubuga', '2000-12-04', 'Male', 'ugandan', NULL),
(35, NULL, 'Esther', 'Mensah', '2000-06-03', 'Female', 'ghanaian', NULL),
(36, NULL, 'George', 'Arthur', '2000-12-04', 'Male', 'ghanaian', NULL),
(37, NULL, 'Nathan', 'Amanquah', '1970-05-20', 'Male', 'ghanaian', 'Oyarifa'),
(41, 10, 'Francis', 'Tetteh', '1970-05-20', 'Male', 'nigerian', 'University street'),
(42, 11, 'Kwaku', 'Tetteh', '2000-12-04', 'Male', 'ghanaian', 'University street'),
(43, 12, 'Vanessa', 'Adjorkor', '2000-01-03', 'Female', 'ghanaian', 'Teshie'),
(44, 13, 'Deborah', 'Mensah', '2000-01-20', 'Female', 'ghanaian', 'Teshie'),
(45, 14, 'Vanessa', 'Adjorkor', '2000-07-03', 'Female', 'nigerian', 'Teshie'),
(46, 15, 'Akosua ', 'Amponsah', '2000-11-22', 'Female', 'ghanaian', 'Kwashieman'),
(47, 16, 'Akosua', 'Asante', '2000-12-09', 'Female', 'nigerian', 'Kwashieman'),
(48, 17, 'sfd', 'asd', '2000-12-04', 'Male', 'ghanaian', 'University street'),
(49, 18, 'Kojo', 'Acquah', '2000-12-04', 'Male', 'nigerian', 'University street'),
(50, 19, 'Michael ', 'Boateng', '2000-12-05', 'Male', 'ghanaian', 'Teshie'),
(51, 20, 'Gerald', 'Oppong', '2000-12-09', 'Male', 'nigerian', 'University Street'),
(52, 21, 'Paapa', 'Asare', '2000-12-04', 'Male', 'ghanaian', 'University street'),
(53, 22, 'Esther', 'Adjorkor', '0000-00-00', 'Female', 'ghanaian', 'Teshie-124'),
(54, 23, 'Esther', 'Adjorkor', '2021-11-25', 'Female', 'ghanaian', 'Teshie'),
(55, 24, 'Esther', 'Adjorkor', '2021-11-24', 'Female', 'ghanaian', 'Teshie'),
(56, 25, 'George', 'Asante', '1998-10-09', 'Female', '', 'University street'),
(57, 26, 'David', 'Arthur', '1991-01-26', 'Male', 'ghanaian', 'Sowutuom-University Street'),
(58, 27, 'David', 'Arthur', '1987-01-12', 'Male', 'nigerian', 'University street'),
(59, 28, '', '', '0000-00-00', '', '', ''),
(60, 29, 'Vanessa', 'Ofori', '1995-01-26', 'Female', 'ghanaian', 'Teshie'),
(61, 30, 'Vanessa', 'Ofori', '1995-01-26', 'Female', 'ghanaian', 'Teshie'),
(62, 31, 'Kofi', 'Asante', '2001-01-26', 'Male', 'ghanaian', 'Tema'),
(63, 32, 'Kofi', 'Asante', '2001-01-26', 'Male', 'ghanaian', 'Tema'),
(64, 33, 'Kofi', 'Asante', '2001-01-26', 'Male', 'ghanaian', 'Tema'),
(65, 34, 'Kwesi', 'Apau', '2004-01-26', 'Male', 'ghanaian', 'Spintex'),
(66, 35, 'Jesse', 'Oppong', '2021-11-02', 'Male', 'ghanaian', 'Ashesi');

-- --------------------------------------------------------

--
-- Table structure for table `potentialstudents`
--

CREATE TABLE `potentialstudents` (
  `PS_ID` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `PrevSchool` varchar(50) DEFAULT NULL,
  `RawScore` int(11) NOT NULL,
  `ParentName` varchar(30) DEFAULT NULL,
  `ParentNumber` varchar(15) DEFAULT NULL,
  `ParentAddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potentialstudents`
--

INSERT INTO `potentialstudents` (`PS_ID`, `firstname`, `lastname`, `DOB`, `gender`, `nationality`, `address`, `PrevSchool`, `RawScore`, `ParentName`, `ParentNumber`, `ParentAddress`) VALUES
(3, 'Dennis', 'Frimpong', '2005-06-08', 'Male', 'Ghanaian', 'P.O.BOX OD 809', 'Star World JHS', 445, 'Noble Frimpong', '233712345346', 'Korle-bu'),
(8, 'Michael ', 'Tetteh', '0000-00-00', '', 'nigerian', 'mlemvp', 'he rojo', 471, 'Martin Owusu', '233542348993', 'Kwashieman'),
(9, 'Joshua', 'Mensah', '0000-00-00', '', '', 'University street', 'HeReigns', 400, 'MartinOwusu', '233542348993', 'University Street'),
(10, 'Vanessa', 'Wirenkyi', '0000-00-00', '', 'ghanaian', 'Teshie', 'Crown Prince', 400, 'Martin Wirenkyi', '233542348993', 'Kwashieman');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Resultnum` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Resultnum`, `score`) VALUES
(1, 80),
(2, 80),
(3, 75),
(4, 90),
(5, 60),
(6, 65),
(7, 20),
(8, 30),
(9, 80),
(10, 80),
(11, 80),
(12, 80),
(13, 70),
(14, 70),
(15, 70);

-- --------------------------------------------------------

--
-- Table structure for table `signupinfo`
--

CREATE TABLE `signupinfo` (
  `signupid` int(8) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signupinfo`
--

INSERT INTO `signupinfo` (`signupid`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(1, 'David', 'Asante-Asare', 'asantedave1@gmail.com', '1234'),
(2, 'Jesse', 'Nyemetei', 'jesse@gmail.com', '1234'),
(3, 'Paapa', 'Mensah', 'arthurgeo@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `class` varchar(30) DEFAULT NULL,
  `club` varchar(60) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `yeargroup` int(11) DEFAULT NULL,
  `HouseNo` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`class`, `club`, `CourseID`, `yeargroup`, `HouseNo`, `SID`) VALUES
('Science1', 'German', 1, 2024, 1, 14),
('Science3', 'Gunsa', 1, 2022, 2, 15),
('Business1', 'Writer\'s and Debators', 2, 2022, 2, 16),
('GeneralArts2', 'Writer\'s and Debators', 3, 2022, 4, 17),
('Visual Arts1', 'Junior Achievers', 4, 2022, 3, 18),
('Agric1', 'Science club', 5, 2023, 1, 19),
('GeneralArts2', 'Junior Achievers', 3, 2022, 3, 20),
('Business1', 'German', 2, 2022, 5, 23),
('', '', NULL, 0, NULL, NULL),
('', '', NULL, 0, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Science3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Business3', 'Writers and Debators', NULL, 2021, NULL, NULL),
('3Arts3', 'Cybit', NULL, 2021, 13, 36),
('3Science3', 'Writers and Debators', 18, 2022, 19, 50),
('3Business3', 'Writers and Debators', 19, 2022, 20, 51),
('3Science3', 'Cybit', 20, 2021, 21, 52),
('3Science2', 'Writers and Debators', 25, 2023, 23, 60),
('3Science2', 'Writers and Debators', 26, 2023, 24, 61),
('3Science2', 'Writers and Debators', 31, 2023, 29, 66);

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE `studentsubject` (
  `subjectID` int(11) NOT NULL,
  `SID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`subjectID`, `SID`) VALUES
(1, 14),
(2, 15),
(3, 16),
(4, 17),
(5, 18),
(6, 19),
(7, 20),
(8, 21),
(9, 22),
(10, 23),
(12, 49),
(13, 50),
(14, 51),
(15, 52),
(18, 59),
(19, 60),
(20, 61),
(21, 62),
(22, 63),
(23, 64),
(24, 65),
(25, 66);

-- --------------------------------------------------------

--
-- Table structure for table `studentsubjectresults`
--

CREATE TABLE `studentsubjectresults` (
  `subjectID` int(11) DEFAULT NULL,
  `academicyear` varchar(5) DEFAULT NULL,
  `passgrade` varchar(5) DEFAULT NULL,
  `Resultnum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsubjectresults`
--

INSERT INTO `studentsubjectresults` (`subjectID`, `academicyear`, `passgrade`, `Resultnum`) VALUES
(1, '2021', 'C6', 1),
(2, '2023', 'C6', 2),
(3, '2021', 'C6', 5),
(4, '2022', 'C6', 4),
(4, '2023', 'C6', 5),
(2, '2022', 'C6', 3),
(3, '2023', 'C6', 6),
(5, '2022', 'C6', 7),
(6, '2021', 'C6', 3),
(7, '2023', 'C6', 4),
(4, '2021', 'C6', 6),
(15, '2021', 'C6', 12),
(23, '2021-', 'C6', 13),
(24, '2021-', 'C6', 14),
(25, '2021-', 'C6', 15);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `typeofsubject` varchar(20) DEFAULT NULL,
  `nameofsubject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `typeofsubject`, `nameofsubject`) VALUES
(1, 'Core', 'Maths'),
(2, 'Elective', 'Accounting'),
(3, 'Core', 'English'),
(4, 'Elective', 'Business Management'),
(5, 'Elective', 'Maths'),
(6, 'Elective', 'Literature'),
(7, 'Core', 'Social Studies'),
(8, 'Elective', 'History'),
(9, 'Elective', 'Animal Husbandary'),
(10, 'Elective', 'Sculpture'),
(11, 'Core', 'History'),
(12, 'Elective', 'Literature'),
(13, 'choose', 'Esther Mensah'),
(14, 'Elective', 'Literature'),
(15, 'Elective', 'Maths'),
(16, 'Elective', 'Maths'),
(17, 'Elective', 'Maths'),
(18, 'choose', ''),
(19, 'Core', 'Maths'),
(20, 'Core', 'Maths'),
(21, 'Core', 'Social Studies'),
(22, 'Core', 'Social Studies'),
(23, 'Core', 'Social Studies'),
(24, 'Core', 'Maths'),
(25, 'Core', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `teachingstaff`
--

CREATE TABLE `teachingstaff` (
  `TeachingstaffID` int(11) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachingstaff`
--

INSERT INTO `teachingstaff` (`TeachingstaffID`, `SSN`, `Salary`) VALUES
(1, 82034500, '3000.00'),
(2, 82034522, '3000.00'),
(3, 82034511, '2000.00'),
(4, 82034533, '3000.70'),
(5, 82034544, '2000.30'),
(37, 82034502, '3000.00'),
(41, 82034804, '3000.00'),
(42, 82034904, '3000.00'),
(58, 82034239, '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `teachingstaffsubject`
--

CREATE TABLE `teachingstaffsubject` (
  `TeachingstaffID` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachingstaffsubject`
--

INSERT INTO `teachingstaffsubject` (`TeachingstaffID`, `subjectID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2),
(5, 5),
(6, 6),
(7, 5),
(7, 1),
(6, 6),
(42, 11),
(57, 16),
(58, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationinfo`
--
ALTER TABLE `applicationinfo`
  ADD UNIQUE KEY `CourseID` (`CourseID`),
  ADD KEY `PS_ID` (`PS_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `boardinghouse`
--
ALTER TABLE `boardinghouse`
  ADD PRIMARY KEY (`houseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_id`);

--
-- Indexes for table `coursesubject`
--
ALTER TABLE `coursesubject`
  ADD KEY `Course_id` (`Course_id`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptnum`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feesID`);

--
-- Indexes for table `feespayment`
--
ALTER TABLE `feespayment`
  ADD KEY `AccNum` (`AccID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `nonteachingstaff`
--
ALTER TABLE `nonteachingstaff`
  ADD UNIQUE KEY `SSN` (`SSN`),
  ADD KEY `NonteachingstaffID` (`NonteachingstaffID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Person_id`),
  ADD KEY `deptnum` (`deptnum`);

--
-- Indexes for table `potentialstudents`
--
ALTER TABLE `potentialstudents`
  ADD PRIMARY KEY (`PS_ID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Resultnum`);

--
-- Indexes for table `signupinfo`
--
ALTER TABLE `signupinfo`
  ADD PRIMARY KEY (`signupid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD KEY `SID` (`SID`),
  ADD KEY `HouseNo` (`HouseNo`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `studentsubject`
--
ALTER TABLE `studentsubject`
  ADD PRIMARY KEY (`subjectID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `studentsubjectresults`
--
ALTER TABLE `studentsubjectresults`
  ADD KEY `subjectID` (`subjectID`),
  ADD KEY `Resultnum` (`Resultnum`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `teachingstaff`
--
ALTER TABLE `teachingstaff`
  ADD UNIQUE KEY `SSN` (`SSN`),
  ADD KEY `TeachingstaffID` (`TeachingstaffID`);

--
-- Indexes for table `teachingstaffsubject`
--
ALTER TABLE `teachingstaffsubject`
  ADD KEY `TeachingstaffID` (`TeachingstaffID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boardinghouse`
--
ALTER TABLE `boardinghouse`
  MODIFY `houseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `feesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `Person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `potentialstudents`
--
ALTER TABLE `potentialstudents`
  MODIFY `PS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Resultnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `signupinfo`
--
ALTER TABLE `signupinfo`
  MODIFY `signupid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicationinfo`
--
ALTER TABLE `applicationinfo`
  ADD CONSTRAINT `applicationinfo_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicationinfo_ibfk_2` FOREIGN KEY (`PS_ID`) REFERENCES `potentialstudents` (`PS_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `person` (`Person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursesubject`
--
ALTER TABLE `coursesubject`
  ADD CONSTRAINT `coursesubject_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursesubject_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feespayment`
--
ALTER TABLE `feespayment`
  ADD CONSTRAINT `feespayment_ibfk_1` FOREIGN KEY (`AccID`) REFERENCES `fees` (`feesID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feespayment_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `person` (`Person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nonteachingstaff`
--
ALTER TABLE `nonteachingstaff`
  ADD CONSTRAINT `nonteachingstaff_ibfk_1` FOREIGN KEY (`NonteachingstaffID`) REFERENCES `person` (`Person_id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`deptnum`) REFERENCES `department` (`deptnum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `person` (`Person_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`HouseNo`) REFERENCES `boardinghouse` (`houseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentsubject`
--
ALTER TABLE `studentsubject`
  ADD CONSTRAINT `studentsubject_ibfk_1` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentsubject_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `person` (`Person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentsubjectresults`
--
ALTER TABLE `studentsubjectresults`
  ADD CONSTRAINT `studentsubjectresults_ibfk_1` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentsubjectresults_ibfk_2` FOREIGN KEY (`Resultnum`) REFERENCES `results` (`Resultnum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachingstaff`
--
ALTER TABLE `teachingstaff`
  ADD CONSTRAINT `teachingstaff_ibfk_1` FOREIGN KEY (`TeachingstaffID`) REFERENCES `person` (`Person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachingstaffsubject`
--
ALTER TABLE `teachingstaffsubject`
  ADD CONSTRAINT `teachingstaffsubject_ibfk_1` FOREIGN KEY (`TeachingstaffID`) REFERENCES `person` (`Person_id`),
  ADD CONSTRAINT `teachingstaffsubject_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
