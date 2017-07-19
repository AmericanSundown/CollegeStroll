-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 09:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Engineering', 'WELCOME'),
(2, 'Medical', 'ToP medicines'),
(3, 'Law', 'Top Law Colleges'),
(4, 'Pharmancy', 'Top Pharmaceutical colleges'),
(5, 'Management ', 'Top Management colleges '),
(6, 'B colleges', 'Top B Colleges'),
(7, 'Arts and Designs ', 'Top Arts and Designs colleges');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `col_id` int(8) NOT NULL,
  `col_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `col_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `col_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `col_website` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `col_cat` int(8) NOT NULL,
  `col_author` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`col_id`, `col_name`, `col_location`, `col_phone`, `col_website`, `col_cat`, `col_author`) VALUES
(7, 'R.G. Kar Medical College & Hospital', '1, Kshudiram Bose Sarani, Kolkata-700004,', '033-2555-7656', 'rgkarmedicalcollege.org', 2, 1),
(8, 'Nilratan Sarkar Medical College & Hospital', 'No. 138, Acharya Jagadish Chandra Bose Road, Entally, Kolkata - 700014, Near Kala Mandir', '03322448179', 'https://nrsmc.edu.in', 2, 3),
(9, 'Institute of Health Science', 'Plot No. 105, Kanungo Park, Garia, Kolkata - 700008, Near Garia Bus Stand', '03360503088', 'www.ihsindia.org.in', 2, 3),
(10, 'Calcutta Medical College And Hospital', '#88, College Street, Chittaranjan Avenue, Kolkata - 700073, Near Medical College', '03328640375', 'www.medicalcollegekolkata.org', 2, 3),
(11, 'National Institute of Homoeopathy', 'Block - Ge, Sector - Iii, Salt Lake, Kolkata - 700 106, West Bengal, India,', '03323375295', 'www.nih.nic.in', 2, 3),
(12, 'Institute of Engineering and Management', 'Sector-V, Salt Lake Electronics Complex, Salt Lake City, Kolkata, West Bengal, India- 700091', '03323572059 ', 'http://iem.edu.in', 1, 3),
(13, 'Jadavpur University', '188, Raja S.C. Mallick Rd, Jadavpur, Kolkata, West Bengal, India- 700032', '03324572227 ', 'www.jaduniv.edu.in', 1, 3),
(14, 'University of Kalyani', 'Kalyani, Kolkata, West Bengal, India- 741235', '03325828750 ', 'http://www.klyuniv.ac.in', 1, 3),
(15, 'Heritage Institute of Technology ', '994 Madurdaha, Chowbaga Road, Anandapur, Near Ruby Hospital, E M Bypass, Kolkata, West Bengal, India- 700107', '03324430454 ', 'www.heritageit.edu', 1, 3),
(16, 'Hooghly Engineering & Technology College ', 'Vivekananda Road, Pipulpati, Chandannagar, Kolkata, West Bengal, India- 712103', '03326810505 ', 'http://www.hetc.ac.in', 1, 3),
(17, 'Arise Business School', 'C-1/121, Janakpuri, Near Mata Chanan Devi Hospital', '033114157411', 'www.abs.ac.in', 3, 3),
(18, 'Directorate of Quality Management, School of Law', '65/3, Saidulajab Extension, MaidanGarhi Road, South of Saket, Pin: 110068', '9810954289', 'www.dqmindia.com/Law.asp', 3, 3),
(19, 'THE WEST BENGAL NATIONAL UNIVERSITY OF JURIDICAL SCIENCES', 'No.12, LB Block, Sector III, Salt Lake City, Kolkata, West Bengal 700098', ' 03323352811', 'www.nujs.edu', 3, 3),
(20, 'Indian Society of International Law', 'No:# 9, V.K. Krishna MenonBhawan 9, BhagwanDass Road ', '23384458 ', 'www.isil-aca.org', 3, 3),
(21, 'CMR Law School', '2, 3rd \'C\' Cross, 6th \'A\' Main, HRBR Layout, 2nd Block, ', '25453077', 'cmrlawschool.com', 3, 3),
(22, 'Indian Institute Of Management', 'Calcutta Diamond Harbour Road Joka Kolkata-700104', '033- 24678300', 'www.iimcal.ac.in', 5, 1),
(23, 'Indian Institute of Foreign Trade', 'J-1/14, (7th-9th Floor), EP & GP Block, Sector-V Salt Lake City, Kolkata-700091', '033-23572854', 'www.iift.edu', 5, 1),
(24, 'Globsyn Business School', 'Globsyn Crystals, 1st Floor XI - 11 & 12, Block - EP, Sector V Salt Lake Electronics Complex, Kolkata - 700091', '033-40003600', 'www.globsyn.edu.in', 5, 1),
(25, 'Techno India', 'EM-4/1, Sector-V, Salt Lake, Kolkata-70009', '033-23575683', 'www.technoindiagroup.com', 5, 1),
(26, 'Calcutta Business School', '11, Lord Sinha Road Kolkata-700071', '033-24205200', 'www.calcuttabusinessschool.org', 5, 1),
(27, 'BCDA College Of Pharmacy And Technology', '78 Jessore Road(south) Hridaypur , Barasat 700127, West Bengal', '033-25842665', 'http://www.bcdapt.com', 4, 1),
(28, 'Guru Nanak Institute Of Pharmaceutical Sciences And Technology', 'Seet Colony, Panihati, Kolkata, West Bengal 700110 , West Bengal', '033 2523 1247', 'http://gnipst-pc.ac.in', 4, 1),
(29, 'Jadavpur University', 'Plot No.8, Salt Lake Bypass, LB Block, Sector III, Salt Lake City, Kolkata, West Bengal 700098 â€Ž', '+9133-24146666', 'http://www.jaduniv.edu.in', 4, 1),
(30, 'JNAN CHANDRA GHOSH POLYTECHNIC', 'Jnan Chandra Ghosh Polytechnic 7.Mayurbhanj Road, Kolkata - 700 023 West Bengal', '+91 33 2449 6015', 'http://www.jcgpolytechnic.in', 4, 1),
(31, 'National Institute of Pharmaceutical Education and Research', '4, Raja S. C. Mullick Road, Jadavpur, Kolkata -700032, West Bengal', '033-24730492', 'http://www.iicb.res.in', 4, 1),
(32, 'Asutosh College', '92 Shyamaprasad Mukherjee Road.Kolkata. West Bengal ', '913324554504 ', 'www.asutoshcollege.in', 7, 1),
(33, 'Presidency College', '86/1 College Street Kolkata - 700 073. West Bengal', '9103322412738 ', 'www.presidencycollegekolkata.a', 7, 1),
(34, 'St Xaviers College', '30 Park Street (30 Mother Teresa Sarani) Kolkata - 700 016. West Bengal', '9122875995 ', 'www.sxccal.edu', 7, 1),
(35, 'National Institute of Fashion Technology', 'Plot-3B, Block-LA, Near 16 No. Water Tank, Sector III, Salt Lake City,, Kolkata, West Bengal 700098', '03323358872', 'http://www.nift.ac.in', 7, 1),
(36, 'Lady Brabourne College', 'P-1/2 Suhrawardy Avenue Kolkata - 700 017. West Bengal', '9103322897720', 'www.ladybrabourne.com', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_author` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_author`) VALUES
(1, '1111111', '2017-07-16 14:53:46', 7, 1),
(2, 'NRS', '2017-07-17 22:52:35', 8, 3),
(3, 'IHS', '2017-07-17 22:54:11', 9, 3),
(4, 'CMC', '2017-07-17 22:56:53', 10, 3),
(5, 'NIH', '2017-07-17 23:00:27', 11, 3),
(6, 'IEM', '2017-07-17 23:10:04', 12, 3),
(7, 'JU', '2017-07-17 23:13:25', 13, 3),
(8, 'KU', '2017-07-17 23:20:22', 14, 3),
(9, 'HIT', '2017-07-17 23:22:01', 15, 3),
(10, 'HETC', '2017-07-17 23:23:13', 16, 3),
(11, 'ABS', '2017-07-17 23:25:45', 17, 3),
(12, 'DQM', '2017-07-17 23:27:28', 18, 3),
(13, 'NJU', '2017-07-17 23:34:31', 19, 3),
(14, 'ISOI', '2017-07-18 01:25:47', 20, 3),
(15, 'CMR', '2017-07-18 01:29:28', 21, 3),
(16, 'IIM', '2017-07-18 11:11:35', 22, 1),
(17, 'IIFT', '2017-07-18 11:12:21', 23, 1),
(18, 'GBS', '2017-07-18 11:13:12', 24, 1),
(19, 'TI', '2017-07-18 11:13:59', 25, 1),
(20, 'CBS', '2017-07-18 11:15:04', 26, 1),
(21, 'BCDA', '2017-07-18 11:19:03', 27, 1),
(22, 'GNIOP', '2017-07-18 11:20:22', 28, 1),
(23, 'JU', '2017-07-18 11:21:26', 29, 1),
(24, 'JCGP', '2017-07-18 11:22:15', 30, 1),
(25, 'NIP', '2017-07-18 11:24:03', 31, 1),
(26, 'AC', '2017-07-18 12:31:30', 32, 1),
(27, 'PC', '2017-07-18 12:36:21', 33, 1),
(28, 'SXC', '2017-07-18 12:38:01', 34, 1),
(29, 'NIF', '2017-07-18 12:40:04', 35, 1),
(30, 'LBC', '2017-07-18 12:41:44', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'Aninda', '8cb2237d0679ca88db6464eac60da96345513964', 'iron555fist@gmail.com', '2017-07-16 14:29:56', 0),
(3, 'aritro01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'aritro01@gmail.com', '2017-07-17 20:35:39', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `col_cat` (`col_cat`),
  ADD KEY `col_author` (`col_author`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `col_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_ibfk_1` FOREIGN KEY (`col_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `colleges_ibfk_2` FOREIGN KEY (`col_author`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `colleges` (`col_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_author`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
