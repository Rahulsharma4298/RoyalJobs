-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 06:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `uid` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Applied',
  `apply_date` datetime NOT NULL,
  `highest_education` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`uid`, `job_id`, `status`, `apply_date`, `highest_education`) VALUES
(12, 2, 'Selected for Interview', '0000-00-00 00:00:00', ''),
(4, 3, 'Applied', '2020-10-26 17:20:35', 'B.tech'),
(4, 1, 'Applied', '2020-10-26 17:28:11', 'dd'),
(4, 3, 'Applied', '2020-10-26 17:29:28', 'ss'),
(4, 2, 'Selected for Interview', '2020-10-26 17:32:30', 'ddddddddd'),
(4, 2, 'Selected for Interview', '2020-10-27 11:48:13', 'B.tech'),
(4, 3, 'Applied', '2020-10-27 15:37:11', 'ff'),
(4, 3, 'Applied', '2020-10-27 15:39:48', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:34:08', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:36:16', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:37:02', 's'),
(12, 3, 'Applied', '2020-10-27 16:42:24', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:44:08', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:47:10', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:49:05', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:50:38', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:52:03', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:52:42', 'ff'),
(12, 3, 'Applied', '2020-10-27 16:53:16', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:54:22', 'ff'),
(12, 3, 'Applied', '2020-10-27 16:56:09', 'ddddddddd'),
(12, 3, 'Applied', '2020-10-27 16:57:03', 'dddddd'),
(12, 3, 'Applied', '2020-10-27 16:57:40', 'fff'),
(12, 3, 'Applied', '2020-10-27 16:58:15', 'ff'),
(12, 3, 'Applied', '2020-10-27 16:58:44', 'dd'),
(12, 3, 'Applied', '2020-10-27 16:59:07', 'ff'),
(12, 3, 'Applied', '2020-10-27 17:02:33', 'ff'),
(4, 3, 'Applied', '2020-10-28 14:24:25', 'ddddddddd'),
(13, 3, 'Selected for Coding Round', '2020-10-28 14:45:39', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Data Entry'),
(2, 'Construction'),
(3, 'Retail'),
(5, 'Programming'),
(6, 'Internships');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `message`, `date`, `ip`) VALUES
(1, 'Rahul Sharma', 'rahulsharma4298@gmail.com', 2147483647, 'fdfsssssssssssfdfsssssssssssfdfsssssssssssfdfsssssssssssfdfsssssssssssfdfsssssssssssfdfsssssssssssfdfsssssssssss', '2020-10-17 16:07:39', '::1'),
(2, 'Rahul Sharma', 'rahulsharma4298@gmail.com', 2147483647, 'gh', '2020-10-17 16:08:15', '::1'),
(3, 'Rahul Sharma', 'rahulsharma4298@gmail.com', 2147483647, 'NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864NQT2010571864', '2020-10-18 11:13:13', '::1'),
(4, 'Rahul Sharma', 'rahulsharma4298@gmail.com', 2147483647, '12', '2020-10-25 13:13:14', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `uid` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_user` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `uid`, `category_id`, `company`, `job_title`, `description`, `salary`, `location`, `contact_user`, `contact_email`, `post_date`) VALUES
(1, NULL, 1, 'Royal Tech', 'Python Developer', 'Python Developer responsibilities include writing and testing code, debugging programs and integrating applications with third-party web services.', '25000 PM', 'Indore, India', 'RjRahul', 'rahulsharma4298@gmail.com', '2020-01-17 16:33:06'),
(2, NULL, 2, 'Marketing PVt Ltd', 'Sales Manager', 'Marketing managers are responsible for developing, implementing and executing strategic marketing plans for an entire organization (or lines of business and brands within an organization) in order to attract potential customers and retain existing ones.', '40000 PM', 'Delhi, India', 'Preeti Sikka', 'preetisikka@emailguy.info', '2020-01-17 16:33:06'),
(3, NULL, 5, 'Rj Tech', 'Php Developer', 'Should have experience of 2 Years.', '35000', 'Indore, India', 'Rahul Sharma', 'rahulsharma4298@gmail.com', '2020-01-22 15:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` char(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `email`, `password`, `city`, `mobile`, `created`, `ip`) VALUES
(4, 'Rahul', 'Sharma', 'rahulsharma4298@gmail.com', 'MTIzNDU=', 'INDORE', '913157033', '2020-10-27 10:46:31', '::1'),
(12, 'Preeti', 'Sharma', 'preeti@rj.com', 'bG92ZXByZWV0aQ==', 'Delhi', '9752089611', '2020-10-23 12:59:17', '::1'),
(13, 'Shraddha', 'Sharma', 'sk@rj.com', 'c2sxMjM=', 'Delhi', '9993641740', '2020-10-28 13:45:00', '::1'),
(14, 'rahul', 'jayker', 'rj@rj.com', 'MTIzNDU=', 'pune', '1234567890', '2020-10-28 17:30:34', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
