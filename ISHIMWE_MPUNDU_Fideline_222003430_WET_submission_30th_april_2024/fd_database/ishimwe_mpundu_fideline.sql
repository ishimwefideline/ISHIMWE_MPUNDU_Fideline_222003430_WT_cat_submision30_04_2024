-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 09:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ishimwe_mpundu_fideline`
--

-- --------------------------------------------------------

--
-- Table structure for table `adimn`
--

CREATE TABLE `adimn` (
  `ID` int(23) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(67) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adimn`
--

INSERT INTO `adimn` (`ID`, `username`, `password`) VALUES
(1, 'aime', 'keza'),
(1, 'aime', 'keza'),
(1, 'aime', 'keza'),
(1, 'aime', 'keza'),
(5, 'admin1', 'bityear2@2024'),
(5, 'admin1', 'bityear2@2024');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `AU_ID` int(23) NOT NULL,
  `AU_FNAME` varchar(120) NOT NULL,
  `AU_LNAME` varchar(67) NOT NULL,
  `AU_biography` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AU_ID`, `AU_FNAME`, `AU_LNAME`, `AU_biography`) VALUES
(1, 'lydie', 'niyo', 'cute'),
(5, 'gcg', 'gg', 'rrr'),
(5, 'gcg', 'gg', 'rrr');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(23) NOT NULL,
  `book_title` varchar(120) NOT NULL,
  `book_isnb` varchar(67) NOT NULL,
  `book_pubyear` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_isnb`, `book_pubyear`) VALUES
(12, 'xcvbnm', 'dfg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `ID` int(23) NOT NULL,
  `returndate` text NOT NULL,
  `borrowingdate` text NOT NULL,
  `amount` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`ID`, `returndate`, `borrowingdate`, `amount`) VALUES
(1, '10/09/2021', '11/08/2023', 700);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `lngid` int(23) NOT NULL,
  `lng_fname` varchar(120) NOT NULL,
  `lng_lname` varchar(67) NOT NULL,
  `lng_country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lngid`, `lng_fname`, `lng_lname`, `lng_country`) VALUES
(6, 'cvbn', 'cvbn', 'cv');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `ID` int(23) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone` int(67) NOT NULL,
  `address` varchar(10) NOT NULL,
  `email` varchar(67) NOT NULL,
  `username` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `hireddate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `name`, `phone`, `address`, `email`, `username`, `password`, `hireddate`) VALUES
(1, 'fidelineishimwe', 8909876, 'huye', 'ishimwe@gmil.com', 'fideline', 'fifi', '12/22/2000'),
(1, 'manzi frank', 2345, 'kigali', 'manzi@gmil.com', 'fideline', 'fifi', '12/22/2000'),
(200, 'mpundu', 7899976, 'huye', 'mpundu@gmail.com', 'fifi', 'rtyy', '12/12/2020'),
(3, 'fds', 89098, 'dfghj', ' info@ur.ac.rw', 'dfghjkl', 'werg', '12/07/987');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(23) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(67) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` int(67) NOT NULL,
  `birthdate` text NOT NULL,
  `username` varchar(56) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstname`, `lastname`, `address`, `contact`, `birthdate`, `username`, `password`) VALUES
(1, 'ella', 'hirwa', 'kamonyi', 123, '12/12/2000', 'fideline', 'fifi'),
(2, 'alle', 'shami', 'ruhango', 34678, '11/11/1999', 'fideline', 'fifi'),
(8, 'fideline', 'ishimwe', 'gicumbi', 976543, '10/10/1999', 'mpundu', 'tygh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `ID` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
