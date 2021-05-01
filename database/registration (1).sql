-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 08:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicdetails`
--

CREATE TABLE `academicdetails` (
  `sname0` varchar(300) NOT NULL,
  `ssc` int(100) NOT NULL,
  `hsc` int(100) NOT NULL,
  `cgpi` varchar(300) NOT NULL,
  `sscdoc` varchar(300) NOT NULL,
  `hscdoc` varchar(300) NOT NULL,
  `semdoc` varchar(300) NOT NULL,
  `project` varchar(300) NOT NULL,
  `average` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicdetails`
--

INSERT INTO `academicdetails` (`sname0`, `ssc`, `hsc`, `cgpi`, `sscdoc`, `hscdoc`, `semdoc`, `project`, `average`) VALUES
('Priti Santosh Salim', 8, 9, '8.31', '../upload/port01.jpg', '../upload/port02.jpg', '../upload/port03.jpg', 'gatepass system', 9),
('Pallavi Sunil Nivalkar', 8, 9, '9', '../upload/blog-bg.jpg', '../upload/instagram.jpg', '../upload/lorde.jpg', 'gatepass system', 9),
('Shruti Rama Thakur', 8, 10, '8.5', '../upload/product.png', '../upload/profile-01.jpg', '../upload/profile-02.jpg', 'gatepass system', 9),
('Manisha Jaiswar', 9, 8, '8.31', '../upload/zoom.png', '../upload/weather.jpg', '../upload/ui-danro.jpg', 'Nursary', 9);

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `id` int(11) NOT NULL,
  `acyear` year(4) NOT NULL,
  `sdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `winner_name` varchar(300) NOT NULL,
  `marks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`id`, `acyear`, `sdate`, `edate`, `winner_name`, `marks`) VALUES
(1, 2021, '2020-07-06 18:30:00', '2020-07-13 18:30:00', 'Manisha Jaiswar', 160),
(2, 2020, '2020-07-07 18:30:00', '2020-07-15 18:30:00', 'Pallavi Sunil Nivalkar', 215);

-- --------------------------------------------------------

--
-- Table structure for table `addyear`
--

CREATE TABLE `addyear` (
  `acayear` year(4) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `winner` varchar(300) NOT NULL,
  `Marks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin table`
--

CREATE TABLE `admin table` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `profile_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin table`
--

INSERT INTO `admin table` (`id`, `email`, `username`, `password`, `profile_image`) VALUES
(2, 'ádmin@gmail.com', 'admin', 'admin@123', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `user_name`, `message`, `date`, `check_status`) VALUES
(3, 5, 'Priti Santosh Salim', 'You Have A New Report', '2020-07-30 15:09:49', 'checked'),
(4, 6, 'Pallavi Sunil Nivalkar', 'You Have A New Report', '2020-07-31 03:50:32', 'checked'),
(5, 7, 'Shruti Rama Thakur', 'You Have A New Report', '2020-07-31 04:19:06', 'checked'),
(6, 8, 'Manisha Jaiswar', 'You Have A New Report', '2020-08-01 06:12:13', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `sname` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `year` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`sname`, `email`, `contact`, `Department`, `age`, `sex`, `language`, `hobbies`, `interest`, `year`) VALUES
('Priti Santosh Salim', 'priti@gmail.com', '9373978954', 'Computer', 21, 'female', 'Marathi,Hindi,English', 'playing', 'Design', 2021),
('Pallavi Sunil Nivalkar', 'priti@gmail.com', '9373062461', 'Computer', 21, 'female', 'Marathi,Hindi,English', 'reading', 'Design', 2020),
('Shruti Rama Thakur', 'shruti@gmail.com', '7083850641', 'Computer', 21, 'female', 'Marathi,Hindi,English', 'Dancing', 'Software', 2020),
('Manisha Jaiswar', 'pallavi@gmail.com', '8934561209', 'Computer', 21, 'female', 'Hindi,English', 'playing', 'Software', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `sname1` varchar(300) NOT NULL,
  `event` varchar(300) NOT NULL,
  `place` varchar(300) NOT NULL,
  `achievement` varchar(300) NOT NULL,
  `year` varchar(300) NOT NULL,
  `certificate` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`sname1`, `event`, `place`, `achievement`, `year`, `certificate`) VALUES
('Priti Santosh Salim', 'quiz', 'rmcet', '2nd Rank', '2017', '../upload/port04.jpg'),
('Pallavi Sunil Nivalkar', 'spelling', 'devrukh', '2nd Rank', '2016', '../upload/mask.png'),
('Shruti Rama Thakur', 'spelling', 'devrukh', '2nd Rank', '2017', '../upload/radio-gray.png'),
('Manisha Jaiswar', 'quiz', 'rmcet', '3rd Rank', '2016', '../upload/profile-01.jpg'),
('Manisha Jaiswar', 'spelling', 'devrukh', '1st Rank', '2015', '../upload/profile-02.jpg'),
('Manisha Jaiswar', 'spelling', 'rmcet', '1st Rank', '2017', '../upload/IMG_20200330_0003.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `sname2` varchar(300) NOT NULL,
  `event21` varchar(300) NOT NULL,
  `place21` varchar(300) NOT NULL,
  `position21` varchar(300) NOT NULL,
  `year21` varchar(300) NOT NULL,
  `certificate21` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table2`
--

INSERT INTO `table2` (`sname2`, `event21`, `place21`, `position21`, `year21`, `certificate21`) VALUES
('Priti Santosh Salim', 'quiz', 'rmcet', 'Head', '2018', '../upload/port05.jpg'),
('Pallavi Sunil Nivalkar', 'quiz', 'rmcet', 'Head', '2016', '../upload/ny.jpg'),
('Shruti Rama Thakur', 'painting', 'devrukh', 'Member', '2018', '../upload/ui-sam.jpg'),
('Manisha Jaiswar', 'quiz', 'rmcet', 'Head', '2016', '../upload/radio-gray.png'),
('Manisha Jaiswar', 'drawing', 'rtn', 'Member', '2018', '../upload/instagram.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `sname3` varchar(300) NOT NULL,
  `event31` varchar(300) NOT NULL,
  `place31` varchar(300) NOT NULL,
  `achievement31` varchar(300) NOT NULL,
  `achiev31` varchar(300) NOT NULL,
  `year31` varchar(300) NOT NULL,
  `certificate31` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table3`
--

INSERT INTO `table3` (`sname3`, `event31`, `place31`, `achievement31`, `achiev31`, `year31`, `certificate31`) VALUES
('Priti Santosh Salim', 'quiz', 'rmcet', '3rd Rank', 'State', '2017', '../upload/port06.jpg'),
('Pallavi Sunil Nivalkar', 'quiz', 'rmcet', '2nd Rank', 'University', '2016', '../upload/product.jpg'),
('Shruti Rama Thakur', 'drawing', 'devrukh', '3rd Rank', 'National', '2018', '../upload/weather.jpg'),
('Manisha Jaiswar', 'sketching', 'devrukh', '2nd Rank', 'University', '2019', '../upload/ui-sam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--
-- Error reading structure for table registration.users1: #1932 - Table 'registration.users1' doesn't exist in engine
-- Error reading data for table registration.users1: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `registration`.`users1`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Contact No` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `profile_Image` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `Submit_status` varchar(300) NOT NULL,
  `Marks` int(100) NOT NULL,
  `intmarks` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `acyear` year(4) NOT NULL,
  `calstatus` varchar(200) NOT NULL,
  `roundstatus` varchar(200) NOT NULL,
  `edit_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `Name`, `Email_id`, `Contact No`, `Username`, `Password`, `profile_Image`, `status`, `Submit_status`, `Marks`, `intmarks`, `total`, `acyear`, `calstatus`, `roundstatus`, `edit_status`) VALUES
(5, 'Priti Santosh Salim', 'priti@gmail.com', '9373978954', 'salimps', '6612ed83a6029b02c9036e7a9c83beb1', 'profile_img_5.jpg', 'pending', 'submitted', 70, 30, 100, 2021, 'accept', 'accept', 'changed'),
(6, 'Pallavi Sunil Nivalkar', 'priti@gmail.com', '9373062461', 'pallavi', '8e1ec3e6b85f3d510ed874e02df312df', '', 'pending', 'submitted', 65, 150, 215, 2020, 'accept', 'accept', 'changed'),
(7, 'Shruti Rama Thakur', 'shruti@gmail.com', '7083850641', 'shruti', '3fb5a804e83d6e9d5a33ca615a5d30a3', '', 'pending', 'submitted', 65, 100, 165, 2020, 'accept', 'accept', 'changed'),
(8, 'Manisha Jaiswar', 'pallavi@gmail.com', '8934561209', 'manisha', 'e92cec1ff5ff76723b4b4ee283a85eab', '', 'pending', 'submitted', 110, 50, 160, 2021, 'accept', 'accept', 'changed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin table`
--
ALTER TABLE `admin table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin table`
--
ALTER TABLE `admin table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
