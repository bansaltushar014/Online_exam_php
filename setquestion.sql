-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2017 at 07:48 AM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `setquestion`
--

CREATE TABLE `setquestion` (
  `question` varchar(32) NOT NULL,
  `option1` varchar(32) NOT NULL,
  `option2` varchar(32) NOT NULL,
  `option3` varchar(32) NOT NULL,
  `option4` varchar(32) NOT NULL,
  `option5` varchar(32) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setquestion`
--

INSERT INTO `setquestion` (`question`, `option1`, `option2`, `option3`, `option4`, `option5`, `paper_id`, `question_id`) VALUES
('q1', 'o1o', 'o21', 'o31', 'o41', 'o51', 1111, 11111),
('q2', 'q12', 'q22', 'q32', 'q42', 'q52', 1111, 11112),
('q3', 'q13', 'q23', 'q33', 'q43', 'q53', 1111, 11113),
('q4', 'q14', 'q24', 'q34', 'q44', 'q54', 1111, 11114);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
