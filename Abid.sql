-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 07:17 AM
-- Server version: 10.1.38-MariaDB
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
-- Database: `abid`
--

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `changeEmail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`id`, `name`, `email`, `changeEmail`, `phone`, `companyName`, `address`, `password`, `token`, `status`, `userType`) VALUES
(1, 'Abid Saleem', 'abidsaleem04@gmail.com', '', '7800414290', NULL, 'Web Developer', 'e10adc3949ba59abbe56e057f20f883e', '80c944481e35ca94987ed68f4db285', 'active', 'Admin'),
(2, 'Test', 'test3@gmail.com', '', '9999999990', NULL, 'Developer', 'e10adc3949ba59abbe56e057f20f883e', '80c944481e35ca94987ed68f4dt890', 'active', 'User'),
(3, 'Suvrat Agnihotri', 'suvrat72000@gmail.com', '', '8707089009', NULL, 'Java Developer', 'e10adc3949ba59abbe56e057f20f883e', 'edef0d9bd8c8efab754d2fabd3105338', 'active', 'User'),
(4, 'Test', 'test003@gmail.com', '', '8979797097', 'Ginger Webs', 'Block A, Sector 58, Noida, India', 'e10adc3949ba59abbe56e057f20f883e', 'f2ee555e877c9bd7239e2a2d4e5c4f25', 'inactive', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correctOption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `category`, `question`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES
(1, 'PHP', 'The term PHP is an acronym for PHP:_______________.', 'Hypertext Preprocessor', 'Hypertext multiprocessor', 'Hypertext markup Preprocessor', 'Hypertune Preprocessor', '1'),
(2, 'PHP', 'PHP is a ____________ language?', 'user-side scripting', 'client-side scripting', 'server-side scripting', 'Both B and C', '3'),
(3, 'Python', 'In which language is Python written?', 'English', 'PHP', 'C', 'All of the above', '3'),
(4, 'Python', 'Which one of the following is the correct extension of the Python file?', '.py', '.python', '.p', 'None of these', '1'),
(5, 'JavaScript', 'Which type of JavaScript language is ___', 'Object-Oriented', 'Object-Based', 'Assembly-language', 'High-level', '2'),
(6, 'JavaScript', 'The \"function\" and \" var\" are known as:', 'Keywords', 'Data types', 'Declaration statements', 'Prototypes', '3');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `test_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `name`, `email`, `score`, `status`, `test_id`) VALUES
(1, 'Abid Saleem', 'abidsaleem04@gmail.com', '100', 'Pass', '1'),
(2, 'Suvrat', 'suvrat72000@gmail.com', '50', 'Fail', '2');

-- --------------------------------------------------------

--
-- Table structure for table `testinfo`
--

CREATE TABLE `testinfo` (
  `test_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `negativeMarking` varchar(255) DEFAULT NULL,
  `passingMarks` varchar(255) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `publishDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `testinfo`
--

INSERT INTO `testinfo` (`test_id`, `name`, `category`, `negativeMarking`, `passingMarks`, `report`, `publishDate`) VALUES
(1, 'Hiring', 'PHP,JavaScript', 'No', '70', 'Generated', '2021-07-03'),
(2, 'AIMT', 'Python', 'No', '75', 'Not Generated', '2021-07-03'),
(4, 'ProTest', 'JavaScript', 'Yes', '80', 'Not Generated', '2021-07-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testinfo`
--
ALTER TABLE `testinfo`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testinfo`
--
ALTER TABLE `testinfo`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
