-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 04:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `human_resource_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `coefficient`
--

CREATE TABLE `coefficient` (
  `id_coe` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `coefficient` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coefficient`
--

INSERT INTO `coefficient` (`id_coe`, `id_level`, `coefficient`) VALUES
(1, 1, 1.5),
(2, 2, 2),
(3, 3, 2.5),
(4, 4, 1.5),
(5, 5, 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id_language`, `name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(4, 'Html'),
(5, 'CSS'),
(6, 'JavaScript'),
(7, 'MYSQL'),
(8, 'PHP'),
(9, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `language_worker`
--

CREATE TABLE `language_worker` (
  `id_worker` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `language_worker`
--

INSERT INTO `language_worker` (`id_worker`, `id_language`) VALUES
(1, 4),
(1, 5),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `id_type_worker` int(11) NOT NULL,
  `name_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `id_type_worker`, `name_level`) VALUES
(1, 1, 'Internship'),
(2, 1, 'Junior'),
(3, 1, 'Senior'),
(4, 2, 'PA'),
(5, 2, 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `type_worker`
--

CREATE TABLE `type_worker` (
  `id_type_worker` int(11) NOT NULL,
  `name_type_worker` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type_worker`
--

INSERT INTO `type_worker` (`id_type_worker`, `name_type_worker`) VALUES
(1, 'Developer'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id_work` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id_work`, `id_worker`, `hour`, `month`, `year`) VALUES
(1, 1, 50, 7, 2017),
(5, 2, 6, 8, 2017),
(8, 3, 8, 8, 2017),
(9, 4, 5, 8, 2017),
(13, 5, 8, 8, 2017),
(14, 7, 10, 8, 2017);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id_worker`, `id_type_worker`, `id_level`, `name_worker`, `age_worker`, `address`, `date_of_birth`, `number_year_exp`, `base_salary`) VALUES
(1, 1, 3, 'Garen', 20, 'Demacia', '1997-02-06', 10, 50000),
(2, 1, 2, 'Darius', 22, 'Noxus', '1996-10-10', 3, 50000),
(4, 1, 3, 'Leona', 19, 'VietNam', '1998-05-05', 6, 100000),
(5, 2, 4, 'Alista', 21, 'Brazil', '1996-06-08', 2, 50000),
(7, 2, 5, 'Fizz', 30, 'England', '1988-08-04', 6, 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coefficient`
--
ALTER TABLE `coefficient`
  ADD PRIMARY KEY (`id_coe`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

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
-- AUTO_INCREMENT for table `coefficient`
--
ALTER TABLE `coefficient`
  MODIFY `id_coe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
