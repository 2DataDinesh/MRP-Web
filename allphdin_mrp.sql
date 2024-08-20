-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2024 at 12:51 PM
-- Server version: 5.7.34
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allphdin_mrp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ad_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ad_name`, `username`, `password`) VALUES
(2, 'admin', 'albert@gmail.com', 'mrp@123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `class` text NOT NULL,
  `section` text NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `class`, `section`, `subject`) VALUES
(19, 'LKG', 'A', 'Maths'),
(21, 'LKG', 'B', 'Tamil'),
(22, 'LKG', 'B', 'English'),
(23, 'LKG', 'B', 'Maths'),
(24, 'UKG', 'A', 'Tamil'),
(25, 'UKG', 'A', 'English'),
(26, 'UKG', 'A', 'Maths'),
(27, 'UKG', 'B', 'Tamil'),
(28, 'UKG', 'B', 'English'),
(29, 'UKG', 'B', 'Maths'),
(31, '1', 'A', 'English'),
(32, '1', 'B', 'maths'),
(33, '1', 'B', 'Tamil'),
(34, '1', 'B', 'English'),
(35, '1', 'A', 'maths'),
(36, '2', 'A', 'Tamil'),
(37, '2', 'A', 'English'),
(38, '2', 'A', 'Maths'),
(42, '3', 'A', 'Tamil'),
(43, '3', 'A', 'english'),
(44, '3', 'A', 'maths'),
(48, '4', 'A', 'Tamil'),
(49, '4', 'A', 'English'),
(50, '4', 'A', 'Maths'),
(52, '4', 'B', 'English'),
(53, '4', 'B', 'Maths'),
(54, '5', 'A', 'Tamil'),
(55, '5', 'A', 'English'),
(56, '5', 'A', 'Maths'),
(57, '5', 'B', 'tamil'),
(58, '5', 'B', 'English'),
(59, '5', 'B', 'maths'),
(60, '6', 'A', 'Tamil'),
(61, '6', 'A', 'English'),
(62, '6', 'A', 'Maths'),
(63, '6', 'B', 'Tamil'),
(64, '6', 'B', 'English'),
(65, '6', 'B', 'Maths'),
(66, '7', 'A', 'Tamil'),
(67, '7', 'A', 'English'),
(68, '7', 'A', 'Maths'),
(69, '7', 'B', 'tamil'),
(70, '7', 'B', 'English'),
(71, '7', 'B', 'maths'),
(72, '8', 'B', 'tamil'),
(73, '8', 'A', 'English'),
(74, '8', 'A', 'Maths'),
(75, '8', 'B', 'English'),
(76, '8', 'B', 'Maths'),
(77, '9', 'A', 'tamil'),
(78, '9', 'A', 'English'),
(79, '9', 'A', 'Maths'),
(80, '9', 'B', 'Tamil'),
(81, '9', 'B', 'English'),
(82, '9', 'B', 'maths'),
(83, '10', 'A', 'Tamil'),
(84, '10', 'A', 'English'),
(85, '10', 'A', 'maths'),
(87, '10', 'B', 'English'),
(88, '10', 'B', 'maths'),
(89, '2', 'C', 'testing'),
(90, '6', 'A', 'science'),
(91, '10', 'C', 'Maths'),
(96, 'LKG', 'A', 'Tamil'),
(98, '7', 'C', 'Maths'),
(101, '4', 'B', 'SCIENCE'),
(104, '10', 'C', 'English'),
(105, '10', 'C', 'Science'),
(106, '10', 'C', 'Social Science'),
(109, '8', 'C', 'maths'),
(110, '11', 'A', 'GK');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`) VALUES
(17, '../uploads/mrp3.JPG'),
(18, '../uploads/mrp2.JPG'),
(19, '../uploads/mrp1.JPG'),
(20, '../uploads/7a6bb1b1ef36cb092ae8982dfc7b6dd5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `date`) VALUES
(7, 'Karthikeyan Udaiyappan', 'ukinfotechpdk@gmail.com', '7904217431', 'this is for sample purpose\r\n', '2024-07-09 16:30:49'),
(8, '', '', '', '', '2024-07-23 03:26:59'),
(9, '', '', '', '', '2024-07-25 00:40:08'),
(10, '', '', '', '', '2024-07-25 03:55:46'),
(11, '', '', '', '', '2024-07-25 23:01:17'),
(12, '', '', '', '', '2024-07-26 17:39:11'),
(13, '', '', '', '', '2024-07-27 12:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `tbl_name` text NOT NULL,
  `date` text NOT NULL,
  `mark` text NOT NULL,
  `per` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `u_id`, `e_id`, `tbl_name`, `date`, `mark`, `per`) VALUES
(58, 7606, 66, 'tbl_760666', '09/07/24', '0', '35'),
(59, 7599, 51, 'tbl_759951', '09/07/24', '0', '35'),
(60, 7599, 54, 'tbl_759954', '09/07/24', '0', '35'),
(61, 7599, 52, 'tbl_759952', '09/07/24', '15', '100'),
(62, 7599, 55, 'tbl_759955', '09/07/24', '0', '35'),
(63, 7599, 36, 'tbl_759936', '09/07/24', '0', '35'),
(64, 7599, 53, 'tbl_759953', '09/07/24', '0', '35'),
(65, 7608, 66, 'tbl_760866', '09/07/24', '0', '35'),
(66, 7607, 66, 'tbl_760766', '09/07/24', '0', '35'),
(67, 7599, 55, 'tbl_759955', '09/07/24', '0', '35'),
(68, 7605, 66, 'tbl_760566', '09/07/24', '10', '100'),
(69, 7604, 66, 'tbl_760466', '09/07/24', '8', '80'),
(70, 7609, 68, 'tbl_760968', '10/07/24', '2', '66.666666666667'),
(71, 7599, 67, 'tbl_759967', '11/07/24', '0', '35'),
(72, 7598, 45, 'tbl_759845', '16/07/24', '1.6666666666667', '35');

-- --------------------------------------------------------

--
-- Table structure for table `manage_quiz`
--

CREATE TABLE `manage_quiz` (
  `id` int(11) NOT NULL,
  `std` text NOT NULL,
  `section` text NOT NULL,
  `subject` text NOT NULL,
  `topic` text NOT NULL,
  `no_of_qustions` text NOT NULL,
  `total` text NOT NULL,
  `time` text NOT NULL,
  `staff_id` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_quiz`
--

INSERT INTO `manage_quiz` (`id`, `std`, `section`, `subject`, `topic`, `no_of_qustions`, `total`, `time`, `staff_id`, `description`) VALUES
(21, '1', 'A', 'Tamil', 'function 1', '3', '3', '30', 102, NULL),
(22, '6', 'A', 'Tamil', 'physics', '2', '4', '10', 104, NULL),
(23, '5', 'A', 'Tamil', 'zoology', '5', '10', '10', 104, NULL),
(24, '2', 'B', 'Maths', 'addition', '4', '8', '10', 112, NULL),
(25, '7', 'A', 'English', 'function', '3', '23', '30', 102, '         questions & answers\r\n         '),
(26, '1', 'A', 'English', 'kdf', '2', '100', '30', 102, '         efgfh\r\n         '),
(27, '5', 'B', 'Tamil', 'hhshhs', '3', '6', '10', 104, '         A description is a detailed account or representation of something, capturing its characteristics, \r\n         '),
(30, '10', 'B', 'Maths', 'addition', '2', '3', '10', 104, 'A description is a detailed account or representation of something, capturing its characteristics, qualities, and features in a manner that allows others to understand or visualize it. Descriptions can '),
(32, '1', 'B', 'Maths', 'dad', '150', '23', '30', 102, ' talking about the Unicode character Braille pattern U+2800, which is read as a character by websites and apps, but  a blank spaA whitespace character is a character data element that represents white space when text is rendered for display by a computer. For example, a space character (U+0020 , ASCII 32) represents blank space such as a word divider in a Western script.'),
(33, '2', 'B', 'English', 'Jj', '150', '300', '30', 102, 'Good'),
(34, '12', 'C', 'Maths', 'addition', '15', '30', '20', 102, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrryyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuugggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeezzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqooooooooooooooooooooooooooooooooooooooooooopppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp'),
(35, '12', 'C', 'java', 'Arthimetric', '15', '30', '20', 102, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrryyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuugggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeezzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqooooooooooooooooooooooooooooooooooooooooooopppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp'),
(36, '12', 'C', 'testing', 'manual', '15', '30', '20', 102, '         qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrryyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuugggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeezzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqooooooooooooooooooooooooooooooooooooooooooopppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppp\r\n         '),
(37, '1', 'B', '', 'thirukural', '50', '100', '180', 102, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii oooooooooooo ooooooooooooooooo ooooooooooooooooooooooooooooooooo oooooooooooo'),
(38, '7', 'A', 'Maths', 'addition', '3', '6', '10', 106, '         Strongest matches. characterization, confession, definition, depiction, detail, explanation, information, narration, narrative, picture, portrayal, report, sketch, statement, story, summary, tale, version.\r\n         '),
(39, '7', 'C', 'Maths', 'addition', '3', '6', '10', 106, '         Strongest matches. characterization, confession, definition, depiction, detail, explanation, information, narration, narrative, picture, portrayal, report, sketch, statement, story, summary, tale, version.\r\n         '),
(40, '10', 'B', 'English', 'Tamil Unit1', '2', '20', '30', 105, 'aaa'),
(41, '2', 'A', 'Maths', 'aub', '5', '5', '10', 104, '                  Mathematics is a broad and dynamic field of study centered on numbers, quantities, structures, and space, and their interrelationships. It serves as the foundational framework for understanding and describing patterns, shapes, and changes in both the abstract and the real world. Mathematics is integral to many fields, including science, engineering, economics, and everyday life, offering tools for analysis, problem-solving, and logical reasoning.\r\n         \r\n         '),
(42, '2', 'A', 'English', 'alphapetic', '3', '6', '10', 104, 'english'),
(43, '1', 'A', 'Tamil', 'sql', '3', '5', '30', 312, 'dsfsdfs'),
(44, '1', 'A', 'Maths', 'sql', '3', '5', '30', 312, 'dffs'),
(45, '9', 'A', 'Tamil', 'sql', '3', '5', '30', 312, 'dfsdfsdf'),
(46, '9', 'A', 'English', 'sql', '3', '5', '30', 312, 'fdsff'),
(47, '9', 'A', 'Maths', 'sql', '3', '5', '30', 312, 'sfsdfsdfs'),
(48, '9', 'A', 'Maths', 'multiplication', '3', '6', '10', 113, '         attend the all questions\r\n         '),
(49, '9', 'A', 'science', 'sql', '3', '45', '45', 312, 'fdgdsgdfg'),
(50, '9', 'A', 'stringboot', 'sql', '4', '5', '30', 312, 'dfsdfsf'),
(51, '12', 'C', 'Tamil', 'ilakanam', '5', '5', '90', 321, 'dsvsff'),
(52, '12', 'C', 'Maths', 'Algebra', '3', '15', '180', 321, 'fill the answer and then submit\r\n'),
(53, '12', 'C', 'java', 'sql', '5', '46', '180', 321, '         fhbdgfh\r\n         '),
(54, '12', 'C', 'Maths', 'Asssra', '2', '46', '180', 321, 'cghg'),
(55, '12', 'C', 'c++', 'ilakanam', '2', '46', '60', 321, 'dasfsdf'),
(56, '10', 'C', 'English', 'Grammer', '10', '50', '60', 322, 'All Questions should be attended.'),
(57, '10', 'C', 'Science', 'Physics', '10', '50', '60', 322, 'Answer the Quiz within the time limit.'),
(58, '10', 'C', 'Social Science', 'History', '10', '50', '60', 322, 'Check whether Every Question are attended.\r\n'),
(59, '9', 'B', 'Maths', 'multiplication', '5', '10', '10', 323, 'Multiplication is an arithmetic operation, where we find the product of two or more numbers. '),
(60, '9', 'B', 'computer science', 'basics of computer', '5', '10', '10', 323, 'Computer science is the study of computers and computational systems, including their theoretical and practical applications.\r\n'),
(61, 'UKG', 'A', 'English', 'sql', '2', '5', '30', 321, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up '),
(62, '9', 'B', 'computer science', 'basic of computers', '2', '2', '10', 323, 'computer exam\r\n'),
(63, '8', 'C', 'Maths', 'addition', '2', '2', '10', 333, 'Addition is a basic arithmetic operation representing the total amount when combining two or more numbers or quantities. It is denoted by the plus sign The result of addition is called the sum, which increases as more values are added.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(64, '8', 'C', 'Maths', 'Subtraction ', '2', '10', '13', 333, 'Mathsa test'),
(65, '8', 'C', 'Maths', 'multiplication', '2', '10', '15', 333, 'mathematicala calculation'),
(66, '10', 'A', 'English', 'English Grammar', '5', '10', '30', 321, 'grammar basics'),
(67, '10', 'C', 'testing', 'maths', '3', '60', '150', 321, '                  attend all the answer\r\n\r\n         \r\n         '),
(68, '5', 'A', 'selenium', 'inroduction', '3', '3', '12', 336, 'automation testing exam'),
(69, '10', 'C', 'testing', 'UNIT 3', '10', '100', '30', 337, '\r\n\r\nK\r\n\r\n'),
(70, '11', 'A', 'GK', 'Independence Day 2024 Quiz', '15', '5', '15', 339, '         Independence Day 2024 Quiz\r\n         ');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`) VALUES
(14, 'thenu@gmail.com', '2024-07-08 00:00:00'),
(15, 'nivetha@gmail.com', '2024-07-08 18:14:33'),
(16, 'rani@gmail.com', '2024-07-09 15:29:35'),
(17, 'giaasmitha@gmail.com', '2024-07-13 21:05:28'),
(18, 'dineshlove.ias@gmail.com', '2024-07-14 01:28:51'),
(19, 'dineshlove.ias@gmail.com', '2024-07-14 01:28:57'),
(20, '', '2024-07-23 03:18:34'),
(21, '', '2024-07-24 17:57:16'),
(22, '', '2024-07-25 15:39:24'),
(23, '', '2024-07-25 18:28:50'),
(24, '', '2024-07-26 09:37:39'),
(25, '', '2024-07-27 13:01:44'),
(26, '', '2024-08-16 23:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `qtn_ans`
--

CREATE TABLE `qtn_ans` (
  `id` int(11) NOT NULL,
  `manage_id` int(11) NOT NULL,
  `qstn` text NOT NULL,
  `options1` text NOT NULL,
  `options2` text NOT NULL,
  `options3` text NOT NULL,
  `options4` text NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qtn_ans`
--

INSERT INTO `qtn_ans` (`id`, `manage_id`, `qstn`, `options1`, `options2`, `options3`, `options4`, `ans`) VALUES
(33, 18, 'What is tamil', '4', '5', '3', '4', 'A'),
(34, 18, 'why tamil $3%^&*( ueyg .,.,.,---1`!', '1', '4', '4', '2', 'A'),
(35, 18, '*&^%$%^&*()(jgdvfsj', 'dfh', 'dfhg', '\"\"jkhjkh\"\"', 'gncvfhjh', 'A'),
(36, 19, 'What is tamil in unit 2', '4', '5', '3', '4', 'A'),
(37, 19, '2345679)(*&^%$#@!', '4', '5', '3', '4', 'A'),
(38, 21, 'aedgsfhgjhkjk', '23345678', 'rdhcgh', '567tdfc', 'xgnm', 'A'),
(39, 21, 'frgtyghkujhi', 'werrtyty', 'rfthjyhkj', 'fvghm,j', 'fbgnmh,j', 'A'),
(40, 21, 'fghjkl', 'fghj', 'chmj,', 'fghm', 'fxghm,', 'A'),
(41, 24, 'the sum of 3+5', '8', '7', '6', '1', 'A'),
(42, 24, 'average of 10', '0', '3', '1', '2', 'C'),
(43, 24, 'the subtract value is  10-10', '9', '4', '8', '0', 'D'),
(44, 24, 'the multiply of 2*3', '2', '4', '8', '6', 'D'),
(45, 26, 'sdfghj', 'df', 'g', 'dfgh', 'fg', 'A'),
(46, 26, 'dfr', 'fcgh', 'dfg', 'dfgh', 'sdf', 'A'),
(47, 30, '6+3', '5', '9', '8', '1', 'B'),
(48, 30, '4+4', '3', '5', '2', '1', 'A'),
(49, 39, '2+1', '3', '5', '8', '3', 'D'),
(50, 39, '3+3', '4', '2', '6', '3', 'C'),
(51, 38, '2+5', '2', '4', '7', '9', 'C'),
(52, 38, '5+6', '12', '11', '6', '12', 'D'),
(53, 38, '7+7', '14', '8', '9', '5', 'A'),
(54, 41, '1+6', '7', '8', '4', '9', 'A'),
(55, 41, '1-1', '3', '3', '9', '0', 'D'),
(56, 41, '2+7', '3', '8', '9', '4', 'A'),
(57, 41, '4+6', '4', '10', '5', '8', 'B'),
(58, 41, '5-2', '3', '4', '3', '5', 'C'),
(59, 42, 'a for', 'apple', 'cat', 'banana', 'dog', 'A'),
(60, 42, 'b for ', 'apple', 'cat', 'banana', 'car', 'C'),
(62, 32, 'c for', 'cat', 'dog', 'banana', 'apple', 'cat'),
(63, 42, 'c for', 'elephant', 'dog', 'cat', 'banana', 'C'),
(64, 31, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(65, 31, 'hi', 'd', 's', 'e', 's', 'A'),
(66, 31, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(67, 31, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(68, 31, 'gfg', 'd', 'd', 'd', 'd', 'D'),
(69, 31, 'gfg', 'd', 'd', 'f', 'gf', 'g'),
(70, 31, 'ttt', 'r', '', 't', 't', 'A'),
(71, 31, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(72, 31, 'hi', 'd', 's', 'e', 's', 'A'),
(73, 31, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(74, 31, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(75, 31, 'gfg', 'd', 'd', 'd', 'd', 'D'),
(76, 31, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(77, 31, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(78, 27, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(79, 27, 'hi', 'd', 's', 'e', 's', 'A'),
(80, 27, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(81, 32, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(82, 32, 'hi', 'd', 's', 'e', 's', 'A'),
(83, 32, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(84, 32, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(85, 32, 'gfg', 'd', 'd', 'd', 'd', 'D'),
(86, 32, 'ttt', 'r', 't', 'h', 'i', 'A'),
(87, 32, 'ooo', 'o', 'o', 'o', 'o', 'B'),
(88, 32, 'lll', 'l', 'l', 'l', 'l', 'D'),
(89, 32, 'ggg', 'gggg', 'ggggg', 'ggggg', 'ggggg', 'C'),
(90, 32, 'thr', 'ryf', 'gdt', 'rtyr', 'ttt', 'A'),
(91, 32, 'theh', 'then', 'then', 't', 'd', 'B'),
(92, 32, 'thehkhkj', 'cds', 'ccd', 'sf', 'ddee', 'D'),
(93, 43, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(94, 43, 'hi', 'd', 's', 'e', 's', 'A'),
(95, 43, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(96, 44, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(97, 44, 'hi', 'd', 's', 'e', 's', 'A'),
(98, 44, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(99, 45, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(100, 45, 'hi', 'd', 's', 'e', 's', 'A'),
(101, 45, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(102, 46, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(103, 46, 'hi', 'd', 's', 'e', 's', 'A'),
(104, 46, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(105, 47, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(106, 47, 'hi', 'd', 's', 'e', 's', 'A'),
(107, 47, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(108, 48, '4*4', '3', '5', '16', '8', 'C'),
(109, 49, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(110, 49, 'hi', 'd', 's', 'e', 's', 'A'),
(111, 49, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(112, 48, '10*10', '100', '200', '300', '2', 'A'),
(113, 48, '10*5', '4', '50', '5', '8', 'B'),
(114, 50, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(115, 50, 'hi', 'd', 's', 'e', 's', 'A'),
(116, 50, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(117, 50, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(118, 51, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(119, 51, 'hi', 'd', 's', 'e', 's', 'A'),
(120, 51, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(121, 51, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(122, 51, 'gfg', 'd', 'd', 'd', 'd', 'D'),
(123, 52, 'what is 2+2 ?', '1', '2', '3', '4', 'D'),
(124, 52, 'What is 4/2 ?', '1', '2', '3', '4', 'B'),
(125, 52, 'What is 3*3 ?', '10', '8', '9', '7', 'C'),
(126, 53, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(127, 53, 'hi', 'd', 's', 'e', 's', 'A'),
(128, 53, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(129, 53, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(130, 53, 'gfg', 'd', 'd', 'd', 'd', 'D'),
(131, 54, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(132, 54, 'hi', 'd', 's', 'e', 's', 'A'),
(133, 55, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(134, 55, 'hi', 'd', 's', 'e', 's', 'A'),
(135, 36, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(136, 36, 'hi', 'd', 's', 'e', 's', 'A'),
(137, 36, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(138, 36, 'fd', 'f', 'fg', 'f', 'f', 'B'),
(139, 36, 'gfg', 'd', 'd', 'd', 'd', 'D'),
(140, 36, 'ttt', 'r', 't', 'h', 'i', 'A'),
(141, 36, 'ooo', 'o', 'o', 'o', 'o', 'B'),
(142, 36, 'lll', 'l', 'l', 'l', 'l', 'D'),
(143, 36, 'ggg', 'gggg', 'ggggg', 'ggggg', 'ggggg', 'C'),
(144, 36, 'thr', 'ryf', 'gdt', 'rtyr', 'ttt', 'A'),
(145, 36, 'theh', 'then', 'then', 't', 'd', 'B'),
(146, 36, 'thehkhkj', 'cds', 'ccd', 'sf', 'ddee', 'D'),
(147, 36, 'what is sf', 's', 'sd', 'dsf', 'd', 'B'),
(148, 36, 'what is fgdg', 'dgd', 'dfg', 'dgf', 'dfg', 'C'),
(149, 36, 'dsssdf', 'dfdfd', 'sfdsf', 'dsfsdf', 'sdfdf', 'B'),
(150, 56, 'My mother _______________ up early in the morning.', ' get', ' gets', ' will be', 'shall be', 'B'),
(151, 56, 'The children _______________ in the field now.', 'has played', ' are playing', ' plays', 'will had played', 'B'),
(152, 56, ' I _______________ her for several years.', 'has known', 'have known', 'knows', ' knew', 'B'),
(153, 56, ' It ________________ raining since morning.', 'have been', 'has been', ' is', 'was', 'B'),
(154, 56, 'He ______________ his house seven days ago', ' left', ' leave', 'leaves', ' is leaving', 'A'),
(155, 56, 'I __________________a letter when he came to my house', 'am writing', 'was writing', 'will write', ' wrote', 'B'),
(156, 56, ' The train _______________ before he reached the station.', ' has left', 'was left', 'had left', ' is left', 'C'),
(157, 56, ' It ______________ raining since morning when you rang me up.', 'had been', 'has been', 'have been', 'was', 'A'),
(158, 56, 'If he works hard he ______________ pass. ', ' will', 'shall', ' will be', 'shall be', 'A'),
(159, 56, 'The cook _______________ cooking food at this time tomorrow.', 'shall be', 'will be', 'shall', 'will', 'B'),
(160, 57, 'The change in the direction of a wave passing from one medium to another is termed as —————.', 'Interference', 'Mirage', 'Diffraction', 'Refraction', 'D'),
(161, 57, 'What would be the angle of incidence for a light ray having zero reflection angle?', '180 degrees', '90 degrees', '0 degree', '45 degrees', 'C'),
(162, 57, ' Light can be focused on our retina through which of the following phenomena?', 'Interference', 'Refraction', 'Diffraction', 'Mirage', 'B'),
(163, 57, 'Speed of light in a vacuum is represented as —————.', 'a', 'v', 'c', 'i', 'C'),
(164, 57, 'A full length of the image of a distant tall building can be seen using —————.', 'a convex mirror', 'a plane mirror', 'a concave mirror', 'none of the options', 'A'),
(165, 57, 'The ratio of the sine of the angle of incidence to the sine of the angle of refraction is constant. It is given by ……………………', 'Faraday’s law', 'Snell’s law', 'Newton’s law', 'Murphy’s law', 'B'),
(166, 57, ' Twinkling of stars is due to which optical phenomenon?', 'Reflection', 'Interference', 'Refraction', 'Divergence', 'C'),
(167, 57, 'The laws of reflection are valid for —————.', 'a convex mirror', 'a plane mirror', 'a concave mirror', 'all mirrors irrespective of their shape', 'D'),
(168, 57, ' Light from the Sun falling on a convex lens will converge at —————.', 'Radius of curvature', 'Optical centre', 'Focus', 'None of the options', 'C'),
(169, 57, 'Concave lens produces —————.', 'only virtual image', 'only erect image', 'only diminished image', 'virtual, erect, and diminished image', 'D'),
(170, 58, '……………. was the pioneer of social Reformers in India.', 'C.W. Damotharanar', 'Periyar', 'Raja Rammohan Roy', 'Maraimalai Adigal', 'C'),
(171, 58, '…………….. established a full-fledged printing press in 1709, atTranquebar.', 'Caldwell', 'F.W. Ellis', 'Ziegenbalg', 'Meenakshisundaram', 'C'),
(172, 58, '……………. was the official newspaper of the Self Respect Movement.', 'Kudi Arasu', 'Puratchi', 'Viduthalai', 'Paguththarivu', 'A'),
(173, 58, 'Choose the correct nationality of the artist Frederic Sorrieu who visualised in his painting a society made up of Democratic and Social Republic.', ' German', 'Swiss', 'French', 'American', 'B'),
(174, 58, ' ‘Nationalism’, which emerged as a force in the late 19th century, means', ' strong devotion for one’s own country and its history and culture.', 'strong devotion for one’s own country without appreciation for other nations.', ' strong love for one’s own country and hatred for others.', ' equally strong devotion for all the countries of the world.', 'A'),
(175, 58, 'Ernst Renan believed that the existence of nations is a necessity because', ' it ensures protection to all inhabitants.', 'it ensures liberty to all inhabitant citizens.', ' it ensures Parliamentary form of govern-ment to its inhabitants.', ' it ensures jobs and good health to all its inhabitants.', 'B'),
(176, 58, ' Which of the following countries did not attend the Congress of Vienna?', 'Britain', ' Russia', 'Prussia', 'Switzerland', 'D'),
(177, 58, 'The first great revolution which gave the clear idea of nationalism with its core words: ‘Liberty, Equality and Fraternity’ was:', 'The Russian Revolution', 'The French Revolution', ' The American Revolution', 'India’s First War of Independence', 'B'),
(178, 58, ' The French revolutionaries declared that the mission and destiny of the French nation was', ' to conquer the people of Europe.', ' to liberate the people of Europe from despotism.', 'to strengthen absolute monarchies in all the countries of Europe.', 'to propagate the ideals of liberty, equality, and fraternity in every part of the world.  ', 'B'),
(179, 58, 'The Napoleonic Code was exported to which of the following regions?', 'England', 'Spain', 'Regions under French control', 'Poland', 'C'),
(185, 59, '6*6', '3', '4', '9', '36', 'D'),
(186, 59, '4*3', '2', '3', '12', '4', 'C'),
(187, 59, '6\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n10*10\r\n\r\n', '100', '150', '110', '120', 'A'),
(188, 59, '50*5', '3', '250', '8', '7', 'B'),
(189, 59, '10*3', '5', '2', '30', '4', 'C'),
(190, 60, 'copy  shortcut', 'ctrl+c', 'ctrl r', 'ctrl+c', 'ctrl+d', 'A'),
(191, 63, '2+2', '4', '2', '6', '5', 'A'),
(192, 63, '10+10', '20', '3', '4', '5', 'A'),
(193, 65, '2*2', '4', '3', '2', '1', 'A'),
(194, 65, '4*3', '12', '3', '4', '1', 'A'),
(195, 66, 'What is 2+2?', '3', '4', '5', '1', 'B'),
(196, 66, 'What is 1+2?', '3', '6', '2', '9', 'A'),
(197, 66, 'What is 3+2?', '3', '4', '5', '1', 'C'),
(198, 66, 'What is 4+2?', '3', '6', '2', '9', 'B'),
(199, 66, 'What is 5+2?', '3', '4', '5', '7', 'D'),
(200, 67, 'what is what', 'g', 'd', 'a', 'e', 'C'),
(201, 67, 'hi', 'd', 's', 'e', 's', 'A'),
(202, 67, 'hh', 'gf', 'fg', 'gf', 'gf', 'D'),
(203, 68, 'what is selenium', 'automatiom testing tool', 'manual testing tool', 'open source', 'programming language', 'A'),
(204, 68, 'Select all the methods that will open an instance of a browser:', 'driver.get(\"example_url\");', ' driver.navigate().to(\"example_url\");', 'driver.open(\"example_url\");', 'driver.start(\"example_url\");', 'B'),
(205, 68, 'When was selenium developed?', '2004', '2005', '2006', '2009', 'A'),
(206, 70, 'Rulers, measuring tapes and metre scales are used to measure', 'mass', 'weight', 'time', 'length', 'D'),
(207, 70, '1 metric ton is equal to', '100 quintals', '10 quintals', '1/10 quintals', '1/100 quintals', 'B'),
(208, 70, 'Which among the following is not a device to measure mass?', 'Spring balance', 'Beam balance', 'Physical balance', 'Digital balance', 'A'),
(209, 70, 'The area under velocity ? time graph represents the', 'velocity of the moving object.', 'displacement covered by the moving object.', 'speed of the moving object.', 'acceleration of the moving object.', 'B'),
(210, 70, 'Which one of the following is most likely not a case of uniform circular motion?', 'Motion of the Earth around the Sun.', 'Motion of a toy train on a circular track.', 'Motion of a racing car on a circular track.', 'Motion of hours? hand on the dial of the clock.', 'C'),
(211, 70, 'The centrifugal force is', 'a real force.', 'the force of reaction of centripetal force', 'a virtual force.', 'directed towards the centre of the circular path', 'B'),
(212, 70, 'When we mix a drop of ink in water we get a', 'Heterogeneous Mixture', 'Compound', 'Homogeneous Mixture', 'Suspension', 'C'),
(213, 70, '______ is essential to perform separation by solvent extraction method.', 'Separating funnel', 'filter paper', 'centrifuge machine', 'sieve', 'A'),
(214, 70, '__________ has the same properties throughout the sample', 'Pure substance', 'Mixture', 'Colloid', 'Suspension', 'A'),
(215, 70, 'Air sacs and Pneumatic bones are seen in', 'fish', 'frog', 'bird', 'bat', 'C'),
(216, 70, 'The period called ?????. marks the beginning of agriculture and animal domestication.', 'Palaeolithic', 'Mesolithic', 'Neolithic', 'Megalithic', 'C'),
(217, 70, 'Direct ancestor of modem man was ?????..', 'Homo habilis', 'Homo erectus', 'Homo sapiens', 'Neanderthal man', 'C'),
(218, 70, 'The Sumerian system of writing : ?????', 'Pictographic', 'Hieroglyphic', 'Sonogram', 'Cuneiform', 'B'),
(219, 70, 'The Bronze image suggestive of the use of lost-wax process known to the Indus people.', 'Jar', 'Priest king', 'Dancing girl', 'Bird', 'C'),
(220, 70, 'How many Newtons Law?', '3', '4', '2', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` int(11) NOT NULL,
  `name` text NOT NULL,
  `dob` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `class` text NOT NULL,
  `section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `name`, `dob`, `phone`, `email`, `class`, `section`) VALUES
(7611, 'JAHIRABANU', '9/5/2002', '9944220963', 'jahirabanub93@gmail.com', '11', 'A'),
(7612, 'KALAISELVI', '5/9/1996', '7871852589', 'kalaiselvi9896@gmail.com', '11', 'A'),
(7613, 'MANGALESHWARI', '5/5/1985', '8838664130', 'mangalamprabu@gmail.com', '11', 'A'),
(7614, 'MUTHUKRISHNAN', '9/2/1976', '8778208351', 'muthukrishnan@gmail.com', '11', 'A'),
(7615, 'MEGALA', '30/7/1993', '7339428065', 'megala220318@gmail.com', '11', 'A'),
(7616, 'DEEPA', '25/6/1999', '8489735714', 'deeparamesh2511@gmail.com', '11', 'A'),
(7617, 'KALYANI', '2/5/2001', '9363000143', 'spsupriya2520@gmail.com', '11', 'A'),
(7618, 'VIDHYA', '10/10/1998', '8220930286', 'vidhyashivanya2@gmail.com', '11', 'A'),
(7619, 'KARPAGAM', '20/12/1986', '9043357472', 'ganeshkarpagam@gmail.com', '11', 'A'),
(7620, 'HEMALATHA', '7/11/2002', '7603851086', 'hemalathaalagappan2002@gmail.com', '11', 'A'),
(7621, 'TAMILARASI', '30/7/2002', '9042205385', 'tamilarasiselvam148@gmail.com', '11', 'A'),
(7622, 'JAHIRABANU', '9/5/2002', '9944220963', 'jahirabanu.b93@gmail.com', '11', 'A'),
(7623, 'GEETHALAKSHMI', '30/4/1992', '9159700879', 'geethalakshmi@gmail.com', '11', 'A'),
(7624, 'DHANALAKSHMI', '24/12/1990', '7708149737', 'abiovirajan@gmail.com', '11', 'A'),
(7625, 'RAJASULOCHNA', '13/04/1993', '9952174225', 'sulochana1993304@gmail.com', '11', 'A'),
(7626, 'SINTHUNATHI', '16/6/1991', '9843528776', 'sindhuyashi287@gmail.com', '11', 'A'),
(7627, 'GAYATHRI', '23/11/1986', '8667639470', 'gayatrihariharan86@gmail.com', '11', 'A'),
(7628, 'STEPJHYGRAPH', '11/9/1993', '9789672530', 'loudasjeni93@gmail.com', '11', 'A'),
(7629, 'ALFRED', '23/5/1981', '9655889483', 'alfred9655889483@gmail.com', '11', 'A'),
(7630, 'TAMILPRIYA', '10/4/2002', '6374493589', 'tamizhipriya2@gmail.com', '11', 'A'),
(7631, 'NACHAL', '19/08/1989', '9342849663', 'priyadharshan2101@gmail.com', '11', 'A'),
(7632, 'CHELLA', '14/7/1996', '9659738633', 'chellathaila149@gmail.com', '11', 'A'),
(7633, 'KALISHWARI', '18/9/2002', '8825854751', 'kalishwarik33@gmail.com', '11', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759845`
--

CREATE TABLE `tbl_759845` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759845`
--

INSERT INTO `tbl_759845` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7598, 45, 99, 'what is what', 'C', 'B', 5, 'Wrong', '16/07/24'),
(2, 7598, 45, 100, 'hi', 'A', 'A', 5, 'Correct', '16/07/24'),
(3, 7598, 45, 101, 'hh', 'D', 'C', 5, 'Wrong', '16/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759936`
--

CREATE TABLE `tbl_759936` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759936`
--

INSERT INTO `tbl_759936` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 36, 135, 'what is what', 'C', 'null', 30, 'Not answered', '09/07/24'),
(2, 7599, 36, 136, 'hi', 'A', 'null', 30, 'Not answered', '09/07/24'),
(3, 7599, 36, 137, 'hh', 'D', 'null', 30, 'Not answered', '09/07/24'),
(4, 7599, 36, 138, 'fd', 'B', 'null', 30, 'Not answered', '09/07/24'),
(5, 7599, 36, 139, 'gfg', 'D', 'null', 30, 'Not answered', '09/07/24'),
(6, 7599, 36, 140, 'ttt', 'A', 'null', 30, 'Not answered', '09/07/24'),
(7, 7599, 36, 141, 'ooo', 'B', 'null', 30, 'Not answered', '09/07/24'),
(8, 7599, 36, 142, 'lll', 'D', 'null', 30, 'Not answered', '09/07/24'),
(9, 7599, 36, 143, 'ggg', 'C', 'null', 30, 'Not answered', '09/07/24'),
(10, 7599, 36, 144, 'thr', 'A', 'null', 30, 'Not answered', '09/07/24'),
(11, 7599, 36, 145, 'theh', 'B', 'null', 30, 'Not answered', '09/07/24'),
(12, 7599, 36, 146, 'thehkhkj', 'D', 'null', 30, 'Not answered', '09/07/24'),
(13, 7599, 36, 147, 'what is sf', 'B', 'null', 30, 'Not answered', '09/07/24'),
(14, 7599, 36, 148, 'what is fgdg', 'C', 'null', 30, 'Not answered', '09/07/24'),
(15, 7599, 36, 149, 'dsssdf', 'B', 'null', 30, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759951`
--

CREATE TABLE `tbl_759951` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759951`
--

INSERT INTO `tbl_759951` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 51, 118, 'what is what', 'C', 'null', 5, 'Not answered', '09/07/24'),
(2, 7599, 51, 119, 'hi', 'A', 'null', 5, 'Not answered', '09/07/24'),
(3, 7599, 51, 120, 'hh', 'D', 'null', 5, 'Not answered', '09/07/24'),
(4, 7599, 51, 121, 'fd', 'B', 'null', 5, 'Not answered', '09/07/24'),
(5, 7599, 51, 122, 'gfg', 'D', 'null', 5, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759952`
--

CREATE TABLE `tbl_759952` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759952`
--

INSERT INTO `tbl_759952` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 52, 123, 'what is 2+2 ?', 'D', 'D', 15, 'Correct', '09/07/24'),
(2, 7599, 52, 124, 'What is 4/2 ?', 'B', 'B', 15, 'Correct', '09/07/24'),
(3, 7599, 52, 125, 'What is 3*3 ?', 'C', 'C', 15, 'Correct', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759953`
--

CREATE TABLE `tbl_759953` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759953`
--

INSERT INTO `tbl_759953` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 53, 126, 'what is what', 'C', 'null', 46, 'Not answered', '09/07/24'),
(2, 7599, 53, 127, 'hi', 'A', 'null', 46, 'Not answered', '09/07/24'),
(3, 7599, 53, 128, 'hh', 'D', 'null', 46, 'Not answered', '09/07/24'),
(4, 7599, 53, 129, 'fd', 'B', 'null', 46, 'Not answered', '09/07/24'),
(5, 7599, 53, 130, 'gfg', 'D', 'null', 46, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759954`
--

CREATE TABLE `tbl_759954` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759954`
--

INSERT INTO `tbl_759954` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 54, 131, 'what is what', 'C', 'null', 46, 'Not answered', '09/07/24'),
(2, 7599, 54, 132, 'hi', 'A', 'null', 46, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759955`
--

CREATE TABLE `tbl_759955` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759955`
--

INSERT INTO `tbl_759955` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 55, 133, 'what is what', 'C', 'D', 46, 'Wrong', '09/07/24'),
(2, 7599, 55, 134, 'hi', 'A', 'C', 46, 'Wrong', '09/07/24'),
(3, 7599, 55, 133, 'what is what', 'C', 'B', 46, 'Wrong', '09/07/24'),
(4, 7599, 55, 134, 'hi', 'A', 'C', 46, 'Wrong', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_759967`
--

CREATE TABLE `tbl_759967` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_759967`
--

INSERT INTO `tbl_759967` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7599, 67, 200, 'what is what', 'C', 'null', 60, 'Not answered', '11/07/24'),
(2, 7599, 67, 201, 'hi', 'A', 'null', 60, 'Not answered', '11/07/24'),
(3, 7599, 67, 202, 'hh', 'D', 'null', 60, 'Not answered', '11/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_760466`
--

CREATE TABLE `tbl_760466` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_760466`
--

INSERT INTO `tbl_760466` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7604, 66, 195, 'What is 2+2?', 'B', 'A', 10, 'Wrong', '09/07/24'),
(2, 7604, 66, 196, 'What is 1+2?', 'A', 'A', 10, 'Correct', '09/07/24'),
(3, 7604, 66, 197, 'What is 3+2?', 'C', 'C', 10, 'Correct', '09/07/24'),
(4, 7604, 66, 198, 'What is 4+2?', 'B', 'B', 10, 'Correct', '09/07/24'),
(5, 7604, 66, 199, 'What is 5+2?', 'D', 'D', 10, 'Correct', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_760566`
--

CREATE TABLE `tbl_760566` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_760566`
--

INSERT INTO `tbl_760566` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7605, 66, 195, 'What is 2+2?', 'B', 'B', 10, 'Correct', '09/07/24'),
(2, 7605, 66, 196, 'What is 1+2?', 'A', 'A', 10, 'Correct', '09/07/24'),
(3, 7605, 66, 197, 'What is 3+2?', 'C', 'C', 10, 'Correct', '09/07/24'),
(4, 7605, 66, 198, 'What is 4+2?', 'B', 'B', 10, 'Correct', '09/07/24'),
(5, 7605, 66, 199, 'What is 5+2?', 'D', 'D', 10, 'Correct', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_760666`
--

CREATE TABLE `tbl_760666` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_760666`
--

INSERT INTO `tbl_760666` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7606, 66, 195, 'What is 2+2?', 'B', 'null', 10, 'Not answered', '09/07/24'),
(2, 7606, 66, 196, 'What is 1+2?', 'A', 'null', 10, 'Not answered', '09/07/24'),
(3, 7606, 66, 197, 'What is 3+2?', 'C', 'null', 10, 'Not answered', '09/07/24'),
(4, 7606, 66, 198, 'What is 4+2?', 'B', 'null', 10, 'Not answered', '09/07/24'),
(5, 7606, 66, 199, 'What is 5+2?', 'D', 'null', 10, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_760766`
--

CREATE TABLE `tbl_760766` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_760766`
--

INSERT INTO `tbl_760766` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7607, 66, 195, 'What is 2+2?', 'B', 'null', 10, 'Not answered', '09/07/24'),
(2, 7607, 66, 196, 'What is 1+2?', 'A', 'null', 10, 'Not answered', '09/07/24'),
(3, 7607, 66, 197, 'What is 3+2?', 'C', 'null', 10, 'Not answered', '09/07/24'),
(4, 7607, 66, 198, 'What is 4+2?', 'B', 'null', 10, 'Not answered', '09/07/24'),
(5, 7607, 66, 199, 'What is 5+2?', 'D', 'null', 10, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_760866`
--

CREATE TABLE `tbl_760866` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_760866`
--

INSERT INTO `tbl_760866` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7608, 66, 195, 'What is 2+2?', 'B', 'null', 10, 'Not answered', '09/07/24'),
(2, 7608, 66, 196, 'What is 1+2?', 'A', 'null', 10, 'Not answered', '09/07/24'),
(3, 7608, 66, 197, 'What is 3+2?', 'C', 'null', 10, 'Not answered', '09/07/24'),
(4, 7608, 66, 198, 'What is 4+2?', 'B', 'null', 10, 'Not answered', '09/07/24'),
(5, 7608, 66, 199, 'What is 5+2?', 'D', 'null', 10, 'Not answered', '09/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_760968`
--

CREATE TABLE `tbl_760968` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `cans` text,
  `mark` int(10) DEFAULT NULL,
  `result` text,
  `cdate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_760968`
--

INSERT INTO `tbl_760968` (`id`, `sid`, `eid`, `qid`, `ques`, `ans`, `cans`, `mark`, `result`, `cdate`) VALUES
(1, 7609, 68, 203, 'what is selenium', 'A', 'A', 3, 'Correct', '10/07/24'),
(2, 7609, 68, 204, 'Select all the methods that will open an instance of a browser:', 'B', 'C', 3, 'Wrong', '10/07/24'),
(3, 7609, 68, 205, 'When was selenium developed?', 'A', 'A', 3, 'Correct', '10/07/24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `name` text NOT NULL,
  `dob` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `tclass` text NOT NULL,
  `tsection` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `name`, `dob`, `phone`, `email`, `tclass`, `tsection`) VALUES
(105, 'kavitha', '01-01-70', '8798798778', 'kavi@gmail.com', '7', 'B'),
(106, 'nithya', '2023-06-25 ', '6369163192', 'nithya@gmail.com', '7', 'C'),
(107, 'nithya', '2023-06-25 ', '6369163192', 'nithya@gmail.com', '7', 'C'),
(111, 'nithya', '2010-12-12 ', '6369163192', 'nithya@gmail.com', '7', 'C'),
(113, 'elakkiya', '04-07-24', '6369163192', 'elakkiya@gmail.com', '10', 'C'),
(114, 'nithya', '25-06-2024', '6369163192', 'nithya@gmai.com', '7', 'C'),
(115, 'nithya', '25-06-2024', '6369163192', 'nithya@gmail.com', '5', 'B'),
(304, 'ggg', '04-12-2024', '6758765890', 'ggg@gmail.com', '7', 'c'),
(305, 'xx', '09-08-2024', '6543217890', 'hth@gmail.com', '7', 'A'),
(306, 'ajithw', '08-09-2024', '9090090906', 'ajitwh@gmail.com', '6', 'A'),
(308, 'rr', '24/08/2023', '6757867878', 'rr@gmail.com', '6', 'A'),
(309, 'karthick', '19/10/2024', '9567895678', 'karthick@gmail.com', '6', 'A'),
(310, 'oviya', '12/07/2023', '7890989098', 'oviya@gmail.com', '5', 'A'),
(311, 'harish', '21-06-2024', '7656787650', 'harish@gmail.com', '2', 'C'),
(312, 'jaya', '12/02/2024', '7890098769', 'jaya@gmail.com', 'LKG', 'B'),
(313, 'vishal', '13/12/2023', '6786546786', 'vishal@gmail.com', 'UKG', 'A'),
(314, 'uuu', '12/08/2024', '6666666666', 'thenz@gmail.com', '3', 'C'),
(315, 'eee', '12/09/2024', '8888776699', 'yy@gmail.com', '4', 'C'),
(316, 'p', '24-07-2024', '7899877899', '11@gmail.com', '12', 'A'),
(317, 'Pradeep', '01-07-2024', '8973242728', 'pradeep@gmail.com', '12', 'A'),
(318, 'pradeep', '01-07-2024', '8973242727', 'pradeep@gmail.in', '7', 'B'),
(319, 'tamil', '01-07-2024', '8973242724', 'pradee@gmail.com', '9', 'A'),
(320, 'AMUTHAN', '08-07-2024', '6936963690', '111@gmail.com', '10', 'A'),
(321, 'thenmozhi', '01-07-2024', '7878787878', 'thenu24@gmail.com', '12', 'C'),
(322, 'Saranya', '01-07-2024', '7868779976', 'saranya@gmail.com', '10', 'C'),
(323, 'Rexy', '07-07-2024', '9988776655', 'rexy@gmail.com', '9', 'B'),
(324, 'sasikala', '20-01-21', '9988225566', 'sasirani@gmail.com', '4', 'B'),
(325, 'rajakannan', '10-05-20', '9988554488', 'kannan@gmail.com', '7', 'C'),
(326, 'kala', '08-07-2016', '7766223344', 'kala@gmail.com', '8', 'C'),
(327, 'Nivetha', '01-07-2024', '9080901190', 'nivetharaja@gmail.com', '9', 'A'),
(328, 'abi.', '10/05/2020', '9988554422', 'kiru@gmail.com', '7', 'C'),
(330, 'nivee', '06/06/2024', '9123450876', 'nivee@gmail.com', '9', 'B'),
(331, 'kala', '08/07/2016', '7766223345', 'kala1@gmail.com', '8', 'C'),
(332, 'rani', '10-05-2020', '9887828222', 'rani@gmail.com', '8', 'C'),
(333, 'rama', '10-05-2020', '9887828233', 'rama@gmail.com', '8', 'C'),
(334, 'Menaga', '08-07-2024', '8877665544', 'mena@gnail.com', '8', 'C'),
(337, 'newteacher', '01-01-2001', '9857842845', 'newteacher@gmail.com', '10', 'C'),
(338, 'Kkavi', '13-07-2024', '7890654567', 'kkavi@gmail.com', '6', 'B'),
(339, 'Alfred', '23-05-1980', '9655889483', 'albert@gmail.com', '10', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_quiz`
--
ALTER TABLE `manage_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qtn_ans`
--
ALTER TABLE `qtn_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `tbl_759845`
--
ALTER TABLE `tbl_759845`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759936`
--
ALTER TABLE `tbl_759936`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759951`
--
ALTER TABLE `tbl_759951`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759952`
--
ALTER TABLE `tbl_759952`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759953`
--
ALTER TABLE `tbl_759953`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759954`
--
ALTER TABLE `tbl_759954`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759955`
--
ALTER TABLE `tbl_759955`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_759967`
--
ALTER TABLE `tbl_759967`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_760466`
--
ALTER TABLE `tbl_760466`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_760566`
--
ALTER TABLE `tbl_760566`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_760666`
--
ALTER TABLE `tbl_760666`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_760766`
--
ALTER TABLE `tbl_760766`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_760866`
--
ALTER TABLE `tbl_760866`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_760968`
--
ALTER TABLE `tbl_760968`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `manage_quiz`
--
ALTER TABLE `manage_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `qtn_ans`
--
ALTER TABLE `qtn_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7635;

--
-- AUTO_INCREMENT for table `tbl_759845`
--
ALTER TABLE `tbl_759845`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_759936`
--
ALTER TABLE `tbl_759936`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_759951`
--
ALTER TABLE `tbl_759951`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_759952`
--
ALTER TABLE `tbl_759952`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_759953`
--
ALTER TABLE `tbl_759953`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_759954`
--
ALTER TABLE `tbl_759954`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_759955`
--
ALTER TABLE `tbl_759955`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_759967`
--
ALTER TABLE `tbl_759967`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_760466`
--
ALTER TABLE `tbl_760466`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_760566`
--
ALTER TABLE `tbl_760566`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_760666`
--
ALTER TABLE `tbl_760666`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_760766`
--
ALTER TABLE `tbl_760766`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_760866`
--
ALTER TABLE `tbl_760866`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_760968`
--
ALTER TABLE `tbl_760968`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
