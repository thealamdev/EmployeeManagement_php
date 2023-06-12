-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 09:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attandance`
--

CREATE TABLE `attandance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attandance`
--

INSERT INTO `attandance` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 31, '2023-04-29', '2023-04-29'),
(14, 38, '2023-05-01', '2023-04-30'),
(15, 39, '2023-05-01', '2023-05-01'),
(16, 25, '2023-05-01', '2023-05-01'),
(17, 37, '2023-05-01', '2023-05-01'),
(18, 31, '2023-05-01', '2023-05-01'),
(23, 26, '2023-05-01', '2023-05-01'),
(24, 48, '2023-05-01', '2023-05-01'),
(25, 49, '2023-05-03', '2023-05-03'),
(26, 50, '2023-05-05', '2023-05-05'),
(27, 51, '2023-05-17', '2023-05-17'),
(28, 31, '2023-05-21', '2023-05-21'),
(29, 38, '2023-05-21', '2023-05-21'),
(30, 39, '2023-05-21', '2023-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(200) NOT NULL,
  `dep_title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`, `dep_title`, `status`) VALUES
(1, 'Web Developer', 'Web developers work independently as freelancers or with company teams to create websites. Depending on the job, these professionals may focus on front-end development, which involves designing sites and producing content, or back-end development, which i', 1),
(3, 'Web Designer', 'As a web designer, you are responsible for big-picture decisions, like the menus listed on the site, and smaller details, like which fonts, colors, and graphics to use. A web designer creates the layout and design of a website. In simple terms, a website ', 1),
(4, 'Full stack Developer', 'A full stack web developer is a person who can develop both client and server software. In addition to mastering HTML and CSS, he/she also knows how to: Program a browser (like using JavaScript, jQuery, Angular, or Vue) Program a server (like using PHP, A', 1),
(5, 'Python Developer', 'The Employee Management System (EMS) is a comprehensive software solution designed to streamline and automate various aspects of employee administration and human resources management. It provides a centralized platform for efficiently managing employee d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_department` int(11) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_phone` varchar(100) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `emp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `emp_department`, `emp_email`, `emp_phone`, `emp_address`, `zip_code`, `blood_group`, `dob`, `created_at`, `updated_at`, `emp_name`) VALUES
(1, 0, 3, 'qygytajad@mailinator.com', '+1 (227) 564-4962', 'Excepturi corrupti ', '73094', 'Deleniti r', '2009-07-07', '2023-04-18', '2023-04-18', 'Madeline Pearson'),
(2, 31, 3, 'sajjat@gmail.com', '01747111322', 'Dhaka', '1800', 'B+', '2006-08-07', '2023-04-26', '2023-04-26', 'Sajjat Hossain'),
(5, 34, 1, 'mycoze@mailinator.com', '+1 (596) 396-8807', 'Nisi consequatur Vo', '21832', 'Et velit q', '1981-09-24', '2023-04-28', '2023-04-28', 'Dane Booker'),
(6, 35, 1, 'thealamdev@gmail.com', '01795678789', 'Dhaka', '18001', 'B+', '2001-10-11', '2023-04-28', '2023-04-28', 'Shah Alam'),
(7, 25, 3, 'ceducuq@mailinator.com', '+1 (384) 724-8467', 'Eaque optio minus e', '12104', 'Sint quo t', '2023-01-15', '2023-04-29', '2023-04-29', 'Paloma Shaw'),
(10, 26, 1, 'kenejep@mailinator.com', '+1 (179) 124-5095', 'Laborum Aliquip per', '98333', 'Doloremque', '1971-08-03', '2023-04-29', '2023-04-29', 'Elizabeth Pruitt'),
(11, 38, 3, 'papiya@gmail.com', '01795678789', 'Dhaka', '1800', 'B+', '2005-04-05', '2023-04-29', '2023-04-29', 'Papiya Akhter'),
(12, 28, 1, 'wylukujo@mailinator.com', '01795678789', 'Dhaka', '1800', 'O+', '2023-04-19', '2023-04-29', '2023-04-29', 'Aaron Lee'),
(14, 37, 1, 'kejiru@mailinator.com', '+1 (103) 888-7304', 'Dolore fuga Ut dolo', '58685', 'Quia persp', '1994-06-17', '2023-05-01', '2023-05-01', 'Russell Gibson'),
(15, 40, 3, 'wuxosaben@mailinator.com', '+1 (629) 198-7736', 'Placeat pariatur D', '18234', 'In ea opti', '1989-10-11', '2023-05-01', '2023-05-01', 'Kuame Harper'),
(19, 44, 4, 'rebog@mailinator.com', '+1 (105) 351-8534', 'Voluptatem laboriosa', '98557', 'Officia op', '2017-11-08', '2023-05-01', '2023-05-01', 'Kaye Hardy'),
(20, 45, 3, 'satijis@mailinator.com', '+1 (665) 261-3225', 'Dolore aut aliquid d', '94050', 'Cum provid', '1995-05-28', '2023-05-01', '2023-05-01', 'Kirsten Stephenson'),
(23, 48, 3, 'mohaddes@gmail.com', '01795678789', 'Dhaka', '1800', 'O+', '2023-05-17', '2023-05-01', '2023-05-01', 'Md. Mohaddes Ali'),
(24, 49, 1, 'tydevenos@mailinator.com', '01795678789', 'Dhaka', '1800', 'B+', '2023-05-16', '2023-05-03', '2023-05-03', 'Md Rashid'),
(25, 50, 3, 'wuxosaben@mailinator.com', '01795678789', 'Dhaka', '1800', 'O+', '2001-05-13', '2023-05-05', '2023-05-05', 'Horidas'),
(26, 51, 1, 'wuxosaben@mailinator.com', '01795678789', 'Dhaka', '1800', 'A+', '2023-05-20', '2023-05-17', '2023-05-17', 'Samsuddoha'),
(27, 52, 5, 'timejiqe@mailinator.com', '+1 (549) 233-2042', 'Minim quia explicabo', '58393', 'Debitis oc', '2012-04-17', '2023-05-21', '2023-05-21', 'Noelle'),
(28, 39, 1, 'wuxosaben@mailinator.com', '01795678789', 'Dhaka', '1800', 'O+', '2023-05-11', '2023-05-21', '2023-05-21', 'Shah Alam');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `role_description`) VALUES
(33, 'super-admin', 'super admin can do everything.'),
(34, 'admin', 'admin can do some particular things. '),
(35, 'user', 'User can just do his job...');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(24, 'superadmin', '123', 'super-admin', 1, '2023-04-18', '2023-04-18'),
(25, 'admin', '123', 'admin', 1, '2023-04-18', '2023-04-18'),
(26, 'user', '123', 'admin', 1, '2023-04-18', '2023-04-18'),
(27, 'employee1', '123', 'user', 1, '2023-04-18', '2023-04-18'),
(28, 'employee2', '123', 'admin', 1, '2023-04-18', '2023-04-18'),
(29, 'employee3', '123', 'user', 1, '2023-04-18', '2023-04-18'),
(30, 'validem', 'Pa$$w0rd!', 'admin', 1, '2023-04-18', '2023-04-18'),
(31, 'sajjat', 'Pa$$w0rd!', 'admin', 1, '2023-04-18', '2023-04-18'),
(32, 'vesys', 'Pa$$w0rd!', 'user', 1, '2023-04-18', '2023-04-18'),
(33, 'mynutuh', 'Pa$$w0rd!', 'admin', 1, '2023-04-18', '2023-04-18'),
(34, 'comajela', 'Pa$$w0rd!', 'user', 1, '2023-04-18', '2023-04-18'),
(35, 'thealamdev@gmail.com', '123', 'admin', 1, '2023-04-18', '2023-04-18'),
(37, 'emp1', '123', 'admin', 1, '2023-04-26', '2023-04-26'),
(38, 'employee11', '123', 'admin', 1, '2023-04-28', '2023-04-28'),
(39, 'employee10', '123', 'admin', 1, '2023-04-28', '2023-04-28'),
(40, 'tisakybu', 'Pa$$w0rd!', 'admin', 1, '2023-05-01', '2023-05-01'),
(41, 'tisakybu', 'Pa$$w0rd!', 'admin', 1, '2023-05-01', '2023-05-01'),
(42, 'pyloxotagi', 'Pa$$w0rd!', 'user', 1, '2023-05-01', '2023-05-01'),
(43, 'pyloxotagi', 'Pa$$w0rd!', 'user', 1, '2023-05-01', '2023-05-01'),
(44, 'nehogoku', 'Pa$$w0rd!', 'admin', 1, '2023-05-01', '2023-05-01'),
(45, 'nexihenil', 'Pa$$w0rd!', 'admin', 1, '2023-05-01', '2023-05-01'),
(46, 'nexihenil', 'Pa$$w0rd!', 'user', 1, '2023-05-01', '2023-05-01'),
(48, 'mohaddes', '123', 'admin', 1, '2023-05-01', '2023-05-01'),
(49, 'roshid', '123', 'admin', 1, '2023-05-03', '2023-05-03'),
(50, 'horidas', '123', 'admin', 1, '2023-05-05', '2023-05-05'),
(51, 'Samsuddoha', '123', 'admin', 1, '2023-05-17', '2023-05-17'),
(52, 'todybuzine', 'Pa$$w0rd!', 'admin', 1, '2023-05-21', '2023-05-21'),
(53, 'thetahmeed', '123', 'admin', 1, '2023-05-29', '2023-05-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attandance`
--
ALTER TABLE `attandance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
