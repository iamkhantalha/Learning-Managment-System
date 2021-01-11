-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 09:35 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_course_tbl`
--

CREATE TABLE `add_course_tbl` (
  `add_co_id` int(5) NOT NULL,
  `add_co_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_id` int(5) DEFAULT NULL,
  `add_co_description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_co_total_lecture` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_co_date` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_course_tbl`
--

INSERT INTO `add_course_tbl` (`add_co_id`, `add_co_name`, `teacher_id`, `add_co_description`, `add_co_total_lecture`, `add_co_date`) VALUES
(11, 'Computer Architecture', 29, 'Excellent introduction for beginner or student with limited knowledge of computer', '12', '2019-09-08'),
(12, 'Operating System', 32, 'Develop your knowledge about OS, Beginner to High level.', '8', '2019-04-08'),
(13, 'Java', 30, 'Advanced course is designed to take your skills to the next level.', '5', '2019-04-05'),
(14, 'Android', 35, 'Simple Introduction with mini project.', '9', '2019-04-08'),
(15, 'Web Development', 31, 'Improve your knowledge about web along with mega project.', '10', '2019-03-02'),
(16, 'C++', 34, 'Introduction to C++ Beginner Level.', '8', '2019-02-25'),
(17, 'C#', 34, 'Introduction to C# Beginner Level.', '8', '2019-07-07'),
(18, 'DBMS', 33, 'Study the most important subject with different projects. ', '10', '2019-01-12'),
(19, 'Python', 30, 'Increase your coding and creativity with different mega projects components.', '6', '2019-02-12'),
(20, 'Compiler Construction', 32, 'Casual introduction with the help of distinct projects.', '10', '2019-05-07'),
(21, 'Microsoft Excel', 32, 'Excellent introduction for beginner or student with limited knowledge of Excel', '15', '2019-09-23'),
(22, 'MS Word', 36, 'Complete course of Word for beginers.', '5', '2019-09-26'),
(23, 'Java Advance', 37, 'Complete course of Java for beginers.', '10', '2019-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `adm_id` int(5) NOT NULL,
  `adm_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`adm_id`, `adm_email`, `adm_password`) VALUES
(7815, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_tbl`
--

CREATE TABLE `assignment_tbl` (
  `assignment_id` int(5) NOT NULL,
  `course_id` int(5) DEFAULT NULL,
  `content_id` int(5) DEFAULT NULL,
  `assignment_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assignment_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment_tbl`
--

INSERT INTO `assignment_tbl` (`assignment_id`, `course_id`, `content_id`, `assignment_name`, `assignment_date`, `std_id`) VALUES
(1, 22, 20, 'Application12579.docx', '09/25/2019', 28),
(2, 23, 21, 'Application20002.docx', '09/26/2019', 30);

-- --------------------------------------------------------

--
-- Table structure for table `course_content_tbl`
--

CREATE TABLE `course_content_tbl` (
  `course_content_id` int(5) NOT NULL,
  `course_add_id` int(5) DEFAULT NULL,
  `course_content_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_content_video_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_content_assignment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_content_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_content_tbl`
--

INSERT INTO `course_content_tbl` (`course_content_id`, `course_add_id`, `course_content_title`, `course_content_video_title`, `course_content_assignment`, `course_content_date`) VALUES
(12, 11, 'Introduction to Computer Architecture?', 'Computer Architecture5072.mp4', '', '09/22/2019'),
(13, 11, 'Computer structure and function', 'Computer Architecture22222.mp4', 'Write on computer organization in details?', '09/22/2019'),
(14, 13, 'Introduction to Java', 'Java1891.mp4', '', '09/22/2019'),
(15, 13, 'Java Syntex', 'Java27119.mp4', 'What is the purpose of Java?', '09/22/2019'),
(16, 13, 'Conditional Statement', 'Java32608.mp4', '', '09/22/2019'),
(17, 13, 'Methods', 'Java7420.mp4', '', '09/22/2019'),
(18, 13, 'Java Class', 'Java11289.mp4', '', '09/22/2019'),
(19, 17, 'Introduction to C#', 'C#13472.mp4', '', '09/24/2019'),
(20, 22, 'What is Microsoft Word?', 'Java189127166.mp4', 'Brief details of MS Word. ', '09/25/2019'),
(21, 23, 'What is Advance Java? ', 'Java3260815092.mp4', 'Write Java Basics.', '09/26/2019');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_tbl`
--

CREATE TABLE `enroll_tbl` (
  `enroll_id` int(5) NOT NULL,
  `std_id` int(10) DEFAULT NULL,
  `course_id` int(10) DEFAULT NULL,
  `enroll_date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enroll_tbl`
--

INSERT INTO `enroll_tbl` (`enroll_id`, `std_id`, `course_id`, `enroll_date`, `teacher_id`) VALUES
(10, 19, 13, '22-09-2019', 30),
(11, 21, 11, '22-09-2019', 29),
(12, 26, 14, '23-09-2019', 35),
(13, 26, 12, '23-09-2019', 32),
(14, 26, 16, '23-09-2019', 34),
(15, 26, 20, '23-09-2019', 32),
(16, 26, 15, '23-09-2019', 31),
(17, 19, 17, '23-09-2019', 34),
(18, 19, 21, '24-09-2019', 32),
(21, 21, 13, '24-09-2019', 30),
(22, 28, 11, '25-09-2019', 29),
(23, 28, 22, '25-09-2019', 36),
(24, 30, 11, '26-09-2019', 29),
(25, 30, 23, '26-09-2019', 37),
(26, 30, 12, '26-09-2019', 32),
(27, 20, 17, '28-09-2019', 34),
(28, 20, 11, '28-09-2019', 29),
(29, 29, 11, '28-09-2019', 29),
(30, 20, 13, '28-09-2019', 30),
(31, 19, 23, '28-09-2019', 37),
(32, 20, 22, '01-10-2019', 36);

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `exam_id` int(5) NOT NULL,
  `course_id` int(5) DEFAULT NULL,
  `exam_question` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_option_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_option_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_option_3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_option_4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_right_answer` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`exam_id`, `course_id`, `exam_question`, `exam_option_1`, `exam_option_2`, `exam_option_3`, `exam_option_4`, `exam_right_answer`) VALUES
(101, 13, 'What is Computer?', 'Electronic Machine', 'Water Machine', 'none', 'none', '1'),
(102, 13, 'What is Applet?', 'Small Tiny program', 'none', 'none', 'none', '1'),
(103, 13, 'loop is ', 'use to execute muliple time ', 'none', 'noen', 'none', '1'),
(104, 13, 'What is attribute?', 'variable', 'none', 'none', 'none', '1'),
(105, 13, 'Java was introduce by ', 'Sun corporation', 'none', 'n one', 'none', '1'),
(106, 13, 'Break is use for termination', 'true', 'none', 'none', 'none', '1'),
(107, 13, 'What is applet', 'Small tiny program', 'none', 'none', 'none', '1'),
(108, 13, 'Switch ', 'is use insteead of if-else-if', 'none', 'none', 'none', '1'),
(109, 13, 'If is execute', 'if the condition return true', 'none', 'none', 'none', '1'),
(110, 13, 'method is use', 'for code reuse', 'none', 'noen', 'noen', '1'),
(111, 17, 'What is c#?', 'Programming Lanuage', 'none', 'noen', 'n oern', '1'),
(112, 17, 'hahahah', 'tokhtokhtokh', 'nonen', 'enoen', 'neon', '1'),
(113, 17, 'What is language?', 'source of communication', 'enon', 'noen', 'noen', '1'),
(114, 17, 'what is english', 'language', 'none', 'noen', 'neon', '1'),
(115, 17, 'what science', 'study of nature', 'none', 'none', 'noen', '1'),
(116, 17, 'what is erd', 'entity realtionship digram', 'none', 'noen', 'neoqn', '1'),
(117, 17, 'what is os', 'operating system', 'none', 'neon', 'eno', '1'),
(118, 17, 'what is fucntion', 'design for particulat purpose', 'none', 'noe', 'neo', '1'),
(119, 17, 'what is array', 'a group of homo data ', 'none', 'noen', 'neon', '1'),
(120, 17, 'what is html', 'markup language', 'noen', 'neon', 'neo', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_complete_tbl`
--

CREATE TABLE `lesson_complete_tbl` (
  `lesson_complete_id` int(5) NOT NULL,
  `student_id` int(5) DEFAULT NULL,
  `course_content_id` int(5) DEFAULT NULL,
  `course_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson_complete_tbl`
--

INSERT INTO `lesson_complete_tbl` (`lesson_complete_id`, `student_id`, `course_content_id`, `course_id`) VALUES
(6, 19, 14, 13),
(7, 19, 15, 13),
(8, 19, 16, 13),
(10, 19, 18, 13),
(11, 21, 12, 11),
(12, 19, 19, 17),
(13, 28, 20, 22),
(14, 30, 21, 23),
(15, 21, 13, 11),
(16, 20, 12, 11),
(17, 19, 21, 23),
(18, 20, 19, 17),
(27, 19, 17, 13);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_tbl`
--

CREATE TABLE `quiz_tbl` (
  `quiz_id` int(5) NOT NULL,
  `quiz_question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_option_1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_option_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_option_3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_option_4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_right_answer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_content_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quiz_tbl`
--

INSERT INTO `quiz_tbl` (`quiz_id`, `quiz_question`, `quiz_option_1`, `quiz_option_2`, `quiz_option_3`, `quiz_option_4`, `quiz_right_answer`, `course_content_id`) VALUES
(101, 'What is Computer?', 'Water Machine', 'Electronic Machine', 'Machine', 'None', '2', 12),
(102, 'What is software?', 'Counter Part of Hardaware', 'Set of instruction', ' Instruction', 'Computer', '2', 12),
(103, 'What is Applet?', 'Small Tiny Program', 'Huge Program', 'Client side Program ', ' None', '1', 12),
(104, 'WWW stand for ', 'World war win', 'www', 'world wide web', 'None', '3', 12),
(105, 'Algoritham is ', 'step by step proccess ', 'use to solve a problem', 'proccess', 'problem', '2', 12),
(106, 'What is Architecture?', 'Design', 'Process', 'Structure', 'None', '3', 12),
(107, 'build-in function?', 'function of language', 'computer fucntion', 'pre-define', 'none', '3', 12),
(108, 'Array?', 'Homegenous Data', 'Data', 'Information', 'NOne', '1', 12),
(109, 'Class?', 'Data type', 'variable', 'function', 'object', '1', 12),
(110, 'What is erd?', 'Embedded Relation of Data', 'Each relation representative of Data', 'End Relation of Data', 'Entity RelationShip Diagram', '4', 12),
(111, 'What is Computer?', 'None', 'None', 'None', 'Electroninc Machine', '4', 13),
(112, 'What is software?', 'Set of instruction', 'none', 'none', 'none', '1', 13),
(113, 'What is function?', 'None', 'None', 'Design for particular', 'none', '3', 13),
(114, 'What is Data?', 'raw fact and fiqure', 'none ', 'none ', 'none', '1', 13),
(115, 'What is information?', 'meaningful data', 'none', 'noen ', 'none', '1', 13),
(116, 'What is apple?', 'Fruit', ' none', 'noen', ' none', '1', 13),
(117, 'What is program?', 'Set of instruction', ' none', 'none', 'none', '1', 13),
(118, 'What is None', 'None', '1', '1', '1', '1', 13),
(119, 'What is index', 'index', ' None', 'none', 'none', '1', 13),
(120, 'What is Computer?', 'Electroninc Machine', 'none ', 'none ', 'none', '1', 13),
(121, 'What is java?', 'Programming Language', 'none', ' none', 'none', '1', 14),
(122, 'What is Applet?', 'Tiny Program', 'None', 'NOne', 'None', '1', 14),
(123, 'What is variable?', 'Named to Memory', 'none', 'none', 'none', '1', 14),
(124, 'constant', 'does not change during exeution time', 'none ', 'none', 'NONE', '1', 14),
(125, 'Java was introduced by ', 'Sun corporation', 'Apple', 'Samsung', 'Nokia', '1', 14),
(126, 'Java project head was', 'James Gossly', 'None ', 'None', 'None', '1', 14),
(127, 'Java is', 'Object oriented Programming Language', 'none ', 'none ', 'none', '1', 14),
(128, 'Java was intially develop for embedded system', 'true', 'none ', 'none', 'none', '1', 14),
(129, 'Java was first introduce in 1996', 'false', 'none ', 'none', 'none', '1', 14),
(130, 'java is', 'Programming language', 'none', 'none', 'none', '1', 14),
(131, 'Java is use to ', 'develop web apps', 'none', 'none', 'none', '1', 15),
(132, 'Int is ', 'Data type', 'none ', 'none', 'none', '1', 15),
(133, 'Boolean value means', 'true or false', 'none', 'none', 'noen', '1', 15),
(134, 'loop is ', 'use to repeate finitly', 'none', 'none', 'none', '1', 15),
(135, 'switch', 'is use instead of if-else-if', 'none', 'none', 'none', '1', 15),
(136, 'Break', 'to terminate', 'none', 'none', 'none', '1', 15),
(137, 'Continute is ', 'use to play', 'none', 'none', 'none', '1', 15),
(138, 'What is comments?', 'it is use to define code for user understanding', 'neon', 'noen', 'none', '1', 15),
(139, 'Java Array', 'Like other', 'none', 'none', 'noen', '1', 15),
(140, 'Java Operators ', '+  - / * ', 'none', 'none', 'none', '1', 15),
(141, 'If is execute', 'if the condition return true', 'none', 'none', 'none', '1', 16),
(142, 'else will be execute', 'if the condition return false', 'none', 'none', 'none', '1', 16),
(143, 'what is nested if?', 'if statement inside another if', 'none', 'none', 'none', '1', 16),
(144, 'Is it is important that code will be enclose inside curly brace?', 'Yes', 'none', 'none', 'none', '1', 16),
(145, 'What is curly braces?', 'It represent the scope of the block ', 'none', 'noen', 'noen', '1', 16),
(146, 'Are we can use continue inside conditional statement?', 'Yes', 'NO', 'None', 'None', '1', 16),
(147, 'What is Loop?', 'Its is use for repetion of the instruction', 'none', 'none', 'none', '1', 16),
(148, 'What is break;', 'It is use to terminat the body ', 'none', 'none', 'noen', '1', 16),
(149, 'Name of loop', 'While , do-while and for', 'none', 'none', 'none', '1', 16),
(150, 'do-whiel', 'first execute do block than check condition inside while', 'none', 'noen', 'noen', '1', 16),
(151, 'Method is block of code it run when ', 'call', 'execute', 'start', 'None', '1', 17),
(152, 'Types of method', 'user and build-in', 'none', 'none', 'none', '1', 17),
(153, 'Method is also called', 'Object', 'Function', 'none', 'none', '2', 17),
(154, 'user method is ', 'define by user', 'none', 'none', 'none', '1', 17),
(155, 'Build-in method is ', 'call by user when it write', 'none', 'none', 'noen', '1', 17),
(156, 'you can pass data known as ', 'Parameters', 'none', 'none', 'none', '1', 17),
(157, 'why use method?', 'to reuse the code', 'none', 'none', 'none', '1', 17),
(158, 'syntext of method is ', 'myMethod()', 'none', 'none', 'none', '1', 17),
(159, 'Method can not return value ', 'false', 'none', 'noen', 'noen', '1', 17),
(160, 'Method is use for ', 'code reuseability ', 'none', 'noen', 'none', '1', 17),
(161, 'Java is an ', 'OOP language', 'none', 'none', 'none', '1', 18),
(162, 'Which keyword is use to create class', 'Object', 'Class', 'none', 'none', '2', 18),
(163, 'Variable of the class is called', 'Object of the class', 'member of the class', 'none', 'none', '2', 18),
(164, 'Another name for the variable is ', 'attribute', 'none', 'none', 'none', '1', 18),
(165, 'Constructor is ', 'special method', 'method', 'none', 'none', '1', 18),
(166, 'Constructor is called to ', 'initialize the object', 'none', 'none', 'none', '1', 18),
(167, 'The name of the class and its constructor will be differ', 'True', 'False', 'none', 'none', '2', 18),
(168, 'Constructors can take', 'parameters', 'none', 'none', 'none', '1', 18),
(169, 'Class is like', 'Data type', 'none', 'none', 'none', '1', 18),
(170, 'Class reserved space in memory when  ', 'object is created', 'none', 'none', 'none', '1', 18),
(171, 'What is c#?', 'Programming Lanuage', 'Framework', 'Library', 'None', '1', 19),
(172, 'what is computer', 'computer', 'none', 'nonen', 'neon', '1', 19),
(173, 'What is what?', 'what is nothing', 'noennon', 'noene', 'noene', '1', 19),
(174, 'what is what and who is who', 'what is who', 'nonen', 'noen', 'noen', '1', 19),
(175, 'What is none', 'its only none', 'none', 'none', 'none', '1', 19),
(176, 'What is empty', 'empty', 'none', 'noen', 'noen', '1', 19),
(177, 'what is question', 'its asking', 'none', 'noen', 'noen', '1', 19),
(178, 'apple', 'fruit', 'noen', 'neon', 'neo', '1', 19),
(179, 'what is samsung', 'company', 'none', 'noen', 'neon', '1', 19),
(180, 'what is microsoft', 'organization', 'none', 'noe', 'n oen', '1', 19),
(181, 'jjjlkjlk', 'cvxcv', 'xcvcxv', 'cxvxcv', 'xcvxcv', '1', 20),
(182, 'dfsf', 'xzczxcz', 'bfvxcvxc', 'cxvxcv', 'cvxcvf', '2', 20),
(183, 'fdgfdgfdgfdg', 'fdgfdgfd', 'fdgfdfd', 'fdgvfdvxcv', 'cxvcxvxc', '3', 20),
(184, 'dfsdcxzcxzc', 'xzczxczx', 'xzczxczx', 'dxvdfvsd', 'dsgfsdfsd', '1', 20),
(185, 'bdgrfdsfdc', 'xcvsdfsdcvd', 'dfsdfvxzcxzc', 'dfsdfsdf', 'sdfsdfsdf', '1', 20),
(186, 'dfsdfsdfgbfdvzcasdwasdasdasd', 'dfsdfsdczx', 'zxczc', 'ffddgff', 'fgggfddd', '4', 20),
(187, 'dsrgyhfjgtyhfshfsdg', 'fdgdfsgdfg', 'fdgfdgdfgfdf', 'ghgfhgfhefgs', 'fsdfsdf', '2', 20),
(188, 'ggfghjkjhgfdsdfghjnbvderthjnbfrghnb', 'vvcxcvxcv', 'cvxcvxc', 'cvxcvfg', 'vxvxcvxcv', '3', 20),
(189, 'wfsdxvxchhjnbxzbdfhxbxb', 'bdfgsdfsdf', 'bcvbgdsgfgdfg', 'xcbdfhdfg', 'zcxvxcvxcv', '2', 20),
(190, 'rettyuigfvzfazgvSvc', 'cxvxcvxcv', 'cxvxcvxcv', 'vvvdfcdda', 'jkjkhjkfhjkhj', '1', 20),
(191, 'fdgfsgfdg', 'fdgfdgfd', 'fdgfgfdgfdgfdgf', 'fdasdfwe', 'dsfweqrweqr', '3', 21),
(192, 'dsfsdfsd', 'dsfretewr', 'ewrwerwe', 'ewwrewre', 'ewrwerew', '4', 21),
(193, 'ewr3456tytfh', 'wrtrewte', 'trtrwet', 'rtrtwrt', 'retrwt', '2', 21),
(194, 'rtretret', 'rwtrwtr', 'ret5t', 'rtret', 'trtrwet', '1', 21),
(195, ';alsdkLjlkfjlk', 'gfdgjfldikgh', 'fgn,fgnlkfdng', 'f,dnglkfdg', 'ifdhgoifdhg', '3', 21),
(196, 'dgfdgsfgfsg', 'fdgdfgfg', 'fsdgfdgfds', 'fgfsgfsdg', 'fgsfgfsg', '3', 21),
(197, 'fsgfsgfsg', 'skfhifhlskdfhn', 'ffdgdfgfd', 'fsdgfdgf', 'hdfgfsdgfd', '3', 21),
(198, 'stretretsdf', 'fgfdgfdg', 'fdsgfdggf', 'fgfsdgfdg', 'gfsgfgfg', '3', 21),
(199, 'fgfkghiufhsdhfoi', 'fudfhkjsdgfius', 'dfhdiusgfuksdahf', 'dhfsldhfksd', 'dfsdiufkds,hfoi', '3', 21),
(200, 'kjsdhfiudshflkdashf', 'kjdhfksdgfiu', 'dsfdsoifhlkd', 'dkjsfhldisayf', 'dfhldasfga', '4', 21);

-- --------------------------------------------------------

--
-- Table structure for table `std_course_complete_tbl`
--

CREATE TABLE `std_course_complete_tbl` (
  `std_course_complete_id` int(5) NOT NULL,
  `course_id` int(5) DEFAULT NULL,
  `std_id` int(5) DEFAULT NULL,
  `std_marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `std_id` int(5) NOT NULL,
  `std_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_DOB` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_contact` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_image_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`std_id`, `std_name`, `std_email`, `std_password`, `std_DOB`, `std_contact`, `std_image_name`) VALUES
(19, 'Talha Khan', 'talha@gmail.com', 'talha', '10 Dec 1998', '03489368436', 'IMG_811313183'),
(20, 'Waqar Khan', 'waqar@gmail.com', 'waqar', '11 Oct 1998', '03369368436', 'waqar5342'),
(21, 'Fahad Khan', 'fahad@gmail.com', 'fahad', '10 Jan 1999', '031398971215', NULL),
(22, 'Zahoor Ahmad', 'zahoor@gmail.com', 'zahoor', '25 Dec 1999', '03469483245', NULL),
(23, 'Hamza Rafi', 'hamza@gmail.com', 'hamza', '12 Jan 1999', '03368388383', NULL),
(24, 'Kifayat Ullah', 'kifayat@gmail.com', 'kifayat', '11 Dec 2000', '03457483389', NULL),
(25, 'Sadiq Hussain', 'sadiq@gmail.com', 'sadiq', '11 Jan 1995', '03478383939', NULL),
(26, 'Taimoor Bacha', 'taimoor123@gmail.com', 'taimoor123', '12 Feb 1997', '0345456566', NULL),
(27, 'Faizan Khan', 'faizan@gmail.com', 'faizan234', '1 December 1998', '03222334455', NULL),
(28, 'Faizan Khan', 'faizan123@gmail.com', 'faizan1122', '1 December 1998', '03234567895', NULL),
(29, 'Azan Khan', 'azan123@yahoo.com', 'azan123', '1 February 2002', '03217776643', NULL),
(30, 'Shahzeb', 'shahzeb@yahoo.com', 'shahzeb', '1 December 1998', '03459453116', NULL),
(31, 'Khan', 'khan@gmail.com', 'khan', '12 Jan 1999', '9339939', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `teacher_add_id` int(5) NOT NULL,
  `teacher_add_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_add_qualification` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_add_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_add_contact` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_add_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_add_password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_image_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_add_id`, `teacher_add_name`, `teacher_add_qualification`, `teacher_add_address`, `teacher_add_contact`, `teacher_add_email`, `teacher_add_password`, `teacher_image_name`) VALUES
(29, 'Junaid Khan', 'Phd', 'Hungary', '66778899', 'junaid@gmail.com', 'junaid', 'john32713'),
(30, 'Kifayat Ullah', 'Phd', 'Thailand', '3469363838', 'kifayat@gmail.com', 'kifayat', NULL),
(31, 'Muzamil Khan', 'M.phil', 'Saidu sharif', '034198283993', 'muzamil@gmail.com', 'muzamil', NULL),
(32, 'Ahmad Hussain', 'MSc', 'Saidu sharif', '03369268723', 'ahmad@gmail.com', 'ahmad', NULL),
(33, 'Nisar Khan', 'Phd', 'Glasgow', '000837838378', 'nisar@gmail.com', 'nisar', NULL),
(34, 'Umar Ali', 'MS', 'Kanju Swat', '0342849398483', 'umar@gmail.com', 'umar', NULL),
(35, 'Ishfaq Khan', 'MS', 'Lahore', '033448494399', 'ishfaq@gmail.com', 'ishfaq', NULL),
(36, 'Abubakkar Khan', 'MCS', 'Mingora', '3112233455', 'abubakkar@gmail.com', 'abubakar', '20190816_Snapseed3673'),
(37, 'Tariqullah', 'BSCS', 'Dir', '314536585', 'tariqullah@gmail.com', 'tariqullah', 'IMG_051912269');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_course_tbl`
--
ALTER TABLE `add_course_tbl`
  ADD PRIMARY KEY (`add_co_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `assignment_tbl`
--
ALTER TABLE `assignment_tbl`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `course_content_tbl`
--
ALTER TABLE `course_content_tbl`
  ADD PRIMARY KEY (`course_content_id`),
  ADD KEY `course_add_id` (`course_add_id`);

--
-- Indexes for table `enroll_tbl`
--
ALTER TABLE `enroll_tbl`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `exam_tbl_ibfk_1` (`course_id`);

--
-- Indexes for table `lesson_complete_tbl`
--
ALTER TABLE `lesson_complete_tbl`
  ADD PRIMARY KEY (`lesson_complete_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_content_id` (`course_content_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `quiz_tbl`
--
ALTER TABLE `quiz_tbl`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `course_content_id` (`course_content_id`);

--
-- Indexes for table `std_course_complete_tbl`
--
ALTER TABLE `std_course_complete_tbl`
  ADD PRIMARY KEY (`std_course_complete_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_add_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_course_tbl`
--
ALTER TABLE `add_course_tbl`
  MODIFY `add_co_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `assignment_tbl`
--
ALTER TABLE `assignment_tbl`
  MODIFY `assignment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course_content_tbl`
--
ALTER TABLE `course_content_tbl`
  MODIFY `course_content_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `enroll_tbl`
--
ALTER TABLE `enroll_tbl`
  MODIFY `enroll_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `exam_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `lesson_complete_tbl`
--
ALTER TABLE `lesson_complete_tbl`
  MODIFY `lesson_complete_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `quiz_tbl`
--
ALTER TABLE `quiz_tbl`
  MODIFY `quiz_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `std_course_complete_tbl`
--
ALTER TABLE `std_course_complete_tbl`
  MODIFY `std_course_complete_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `std_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_add_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_course_tbl`
--
ALTER TABLE `add_course_tbl`
  ADD CONSTRAINT `add_course_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_add_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment_tbl`
--
ALTER TABLE `assignment_tbl`
  ADD CONSTRAINT `assignment_tbl_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `add_course_tbl` (`add_co_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_tbl_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `course_content_tbl` (`course_content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_tbl_ibfk_3` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_content_tbl`
--
ALTER TABLE `course_content_tbl`
  ADD CONSTRAINT `course_content_tbl_ibfk_2` FOREIGN KEY (`course_add_id`) REFERENCES `add_course_tbl` (`add_co_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll_tbl`
--
ALTER TABLE `enroll_tbl`
  ADD CONSTRAINT `enroll_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_tbl_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `add_course_tbl` (`add_co_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_tbl_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_add_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD CONSTRAINT `exam_tbl_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `add_course_tbl` (`add_co_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson_complete_tbl`
--
ALTER TABLE `lesson_complete_tbl`
  ADD CONSTRAINT `lesson_complete_tbl_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lesson_complete_tbl_ibfk_2` FOREIGN KEY (`course_content_id`) REFERENCES `course_content_tbl` (`course_content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lesson_complete_tbl_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `add_course_tbl` (`add_co_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_tbl`
--
ALTER TABLE `quiz_tbl`
  ADD CONSTRAINT `quiz_tbl_ibfk_1` FOREIGN KEY (`course_content_id`) REFERENCES `course_content_tbl` (`course_content_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_course_complete_tbl`
--
ALTER TABLE `std_course_complete_tbl`
  ADD CONSTRAINT `std_course_complete_tbl_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `add_course_tbl` (`add_co_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `std_course_complete_tbl_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
