-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 12:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bss_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id_language`, `name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(4, 'Html'),
(5, 'CSS'),
(6, 'JS'),
(7, 'MYSQL'),
(8, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `language_worker`
--

CREATE TABLE `language_worker` (
  `id_lang_worker` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_worker`
--

INSERT INTO `language_worker` (`id_lang_worker`, `id_worker`, `id_language`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 2, 1),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `id_type_worker` int(11) NOT NULL,
  `name_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `id_type_worker`, `name_level`) VALUES
(1, 1, 'Intership'),
(2, 1, 'Junior Dev'),
(3, 1, 'Senior Dev'),
(4, 2, 'PA'),
(5, 2, 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `noun`
--

CREATE TABLE `noun` (
  `id_noun` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `noun` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noun`
--

INSERT INTO `noun` (`id_noun`, `id_level`, `noun`) VALUES
(1, 1, 1.5),
(2, 2, 2),
(3, 3, 2.5),
(4, 4, 1.5),
(5, 5, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `type_worker`
--

CREATE TABLE `type_worker` (
  `id_type_worker` int(11) NOT NULL,
  `name_type_worker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_worker`
--

INSERT INTO `type_worker` (`id_type_worker`, `name_type_worker`) VALUES
(1, 'Dev'),
(2, 'Manager Product');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id_work` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `number_hour` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id_work`, `id_worker`, `number_hour`, `date`) VALUES
(1, 1, 8, '2017-07-05'),
(2, 1, 8, '2017-07-06'),
(3, 1, 7, '2017-07-07'),
(4, 1, 7, '2017-08-07'),
(5, 2, 6, '2017-08-04'),
(6, 2, 8, '2017-08-05'),
(7, 2, 6, '2017-08-06'),
(8, 3, 8, '2017-08-01'),
(9, 4, 5, '2017-08-01'),
(10, 4, 7, '2017-08-06'),
(13, 5, 8, '2017-08-05'),
(14, 7, 10, '2017-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id_worker` int(11) NOT NULL,
  `id_type_worker` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `name_worker` varchar(200) NOT NULL,
  `age_worker` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date_of_birth` date NOT NULL,
  `number_year_exp` int(11) NOT NULL,
  `base_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id_worker`, `id_type_worker`, `id_level`, `name_worker`, `age_worker`, `address`, `date_of_birth`, `number_year_exp`, `base_salary`) VALUES
(1, 1, 3, 'Mr Bean', 20, 'england', '1997-02-06', 10, 50000),
(2, 1, 2, 'John Waker', 22, 'Italy', '1996-10-10', 3, 50000),
(4, 1, 3, 'Leona', 19, 'VietNam', '1998-05-05', 6, 100000),
(5, 2, 4, 'Alista', 21, 'Brazil', '1996-06-08', 2, 50000),
(7, 2, 5, 'Fizz', 30, 'england', '1988-08-04', 6, 5000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indexes for table `language_worker`
--
ALTER TABLE `language_worker`
  ADD PRIMARY KEY (`id_lang_worker`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `noun`
--
ALTER TABLE `noun`
  ADD PRIMARY KEY (`id_noun`);

--
-- Indexes for table `type_worker`
--
ALTER TABLE `type_worker`
  ADD PRIMARY KEY (`id_type_worker`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id_work`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id_worker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `language_worker`
--
ALTER TABLE `language_worker`
  MODIFY `id_lang_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `noun`
--
ALTER TABLE `noun`
  MODIFY `id_noun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_worker`
--
ALTER TABLE `type_worker`
  MODIFY `id_type_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
