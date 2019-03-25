-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2019 at 07:48 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ilab_lnt_bid_C`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_activity`
--

CREATE TABLE `Ilab_activity` (
  `Activity_Slno` int(255) NOT NULL,
  `Activity_Name` varchar(255) NOT NULL,
  `Activity_Description` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL COMMENT '1-Active,2-Inactive,3-Delete',
  `Date_Entry` date NOT NULL,
  `Time_Entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_activity`
--

INSERT INTO `Ilab_activity` (`Activity_Slno`, `Activity_Name`, `Activity_Description`, `Status`, `Date_Entry`, `Time_Entry`) VALUES
(1, '\'activity1\'', '\'Director : Bhaskar Producer : Nagendra Babu Music Director : Harris Jayaraj Lyricst : Surendra Krishna, Kedarnath, Vanamali, Ramajogaya Sastry Cast : Ram Charan Teja, Genelia D\\\'Souza, Shazahn Padamsee, Sanchita Shetty\'', 1, '2018-09-15', '16:00:27'),
(2, 'activitys', 'I already have XSS enabled by default in configuration.\r\n\r\nThank you for your patience. But still, this not resolves unescaped chars in my value, is it?', 1, '2018-09-15', '16:05:10'),
(3, 'activity10', 'xxx', 1, '2018-09-26', '15:00:18'),
(4, 'xxxx', 'xxxxxxx', 3, '2018-09-28', '18:01:35'),
(5, 'activity 77700', 'xxxxx', 1, '2019-01-17', '18:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_assign_project_user`
--

CREATE TABLE `Ilab_assign_project_user` (
  `slno_assign_project` int(11) NOT NULL,
  `user_slno` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `project_slno` int(11) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL DEFAULT '0',
  `date_create` date NOT NULL,
  `time_create` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_assign_project_user`
--

INSERT INTO `Ilab_assign_project_user` (`slno_assign_project`, `user_slno`, `email_id`, `project_slno`, `job_code`, `status`, `role_id`, `date_create`, `time_create`) VALUES
(1, 7, 'bu1@ilab.com', 1, '0770', 1, 6, '2018-09-28', '20:38:23'),
(2, 11, 'project1@ilab.com', 1, '0770', 1, 3, '2018-09-28', '20:38:23'),
(3, 13, 'pro@ilab.com1', 1, '0770', 1, 4, '2018-09-28', '20:38:23'),
(4, 6, 'sam@ilab.com', 1, '0770', 1, 2, '2018-09-28', '20:38:23'),
(5, 10, 'design2@ilab.com', 1, '0770', 1, 2, '2018-09-28', '20:38:23'),
(6, 15, 'buy1@ilab.com', 1, '0770', 1, 7, '2018-09-28', '20:38:23'),
(7, 17, 'abc2@gmail.com', 1, '0770', 1, 7, '2018-09-28', '20:38:23'),
(8, 8, 'bu2@ilab.com', 2, '23456', 1, 6, '2018-09-28', '21:28:53'),
(9, 11, 'project1@ilab.com', 2, '23456', 1, 3, '2018-09-28', '21:28:53'),
(10, 13, 'pro@ilab.com1', 2, '23456', 1, 4, '2018-09-28', '21:28:53'),
(11, 6, 'sam@ilab.com', 2, '23456', 1, 2, '2018-09-28', '21:28:53'),
(12, 15, 'buy1@ilab.com', 2, '23456', 1, 7, '2018-09-28', '21:28:53'),
(13, 7, 'bu1@ilab.com', 3, '679034', 1, 6, '2018-09-28', '21:30:19'),
(14, 11, 'project1@ilab.com', 3, '679034', 1, 3, '2018-09-28', '21:30:19'),
(15, 13, 'pro@ilab.com1', 3, '679034', 1, 4, '2018-09-28', '21:30:19'),
(16, 6, 'sam@ilab.com', 3, '679034', 1, 2, '2018-09-28', '21:30:19'),
(17, 15, 'buy1@ilab.com', 3, '679034', 1, 7, '2018-09-28', '21:30:19'),
(18, 7, 'bu1@ilab.com', 4, '902345', 1, 6, '2018-10-23', '16:11:35'),
(19, 11, 'project1@ilab.com', 4, '902345', 1, 3, '2018-10-23', '16:11:35'),
(20, 13, 'pro@ilab.com1', 4, '902345', 1, 4, '2018-10-23', '16:11:35'),
(21, 6, 'sam@ilab.com', 4, '902345', 1, 2, '2018-10-23', '16:11:35'),
(22, 9, 'design!@ilab.com', 4, '902345', 1, 2, '2018-10-23', '16:11:35'),
(23, 15, 'buy1@ilab.com', 4, '902345', 1, 7, '2018-10-23', '16:11:35'),
(24, 16, 'buy2@ilab.com', 4, '902345', 1, 7, '2018-10-23', '16:11:35'),
(25, 7, 'bu1@ilab.com', 5, '567432', 1, 6, '2018-10-23', '16:12:34'),
(26, 11, 'project1@ilab.com', 5, '567432', 1, 3, '2018-10-23', '16:12:34'),
(27, 13, 'pro@ilab.com1', 5, '567432', 1, 4, '2018-10-23', '16:12:34'),
(28, 6, 'sam@ilab.com', 5, '567432', 1, 2, '2018-10-23', '16:12:34'),
(29, 9, 'design!@ilab.com', 5, '567432', 1, 2, '2018-10-23', '16:12:34'),
(30, 15, 'buy1@ilab.com', 5, '567432', 1, 7, '2018-10-23', '16:12:34'),
(31, 16, 'buy2@ilab.com', 5, '567432', 1, 7, '2018-10-23', '16:12:34'),
(32, 7, 'bu1@ilab.com', 6, '189067', 1, 6, '2018-10-23', '16:13:34'),
(33, 11, 'project1@ilab.com', 6, '189067', 1, 3, '2018-10-23', '16:13:34'),
(34, 12, 'project2@ilab.com', 6, '189067', 1, 3, '2018-10-23', '16:13:34'),
(35, 13, 'pro@ilab.com1', 6, '189067', 1, 4, '2018-10-23', '16:13:34'),
(36, 6, 'sam@ilab.com', 6, '189067', 1, 2, '2018-10-23', '16:13:34'),
(37, 9, 'design!@ilab.com', 6, '189067', 1, 2, '2018-10-23', '16:13:34'),
(38, 15, 'buy1@ilab.com', 6, '189067', 1, 7, '2018-10-23', '16:13:34'),
(39, 17, 'abc2@gmail.com', 6, '189067', 1, 7, '2018-10-23', '16:13:34'),
(40, 10, 'design2@ilab.com', 2, '23456', 1, 2, '2019-01-03', '18:54:31'),
(41, 7, 'bu1@ilab.com', 7, '7877', 1, 6, '2019-01-17', '17:57:06'),
(42, 8, 'bu2@ilab.com', 7, '7877', 1, 6, '2019-01-17', '17:57:06'),
(43, 28, 'ups2@yahoo.com', 7, '7877', 1, 6, '2019-01-17', '17:57:06'),
(44, 11, 'project1@ilab.com', 7, '7877', 1, 3, '2019-01-17', '17:57:06'),
(45, 12, 'project2@ilab.com', 7, '7877', 1, 3, '2019-01-17', '17:57:06'),
(46, 22, 'gyt2@gmail.com', 7, '7877', 1, 3, '2019-01-17', '17:57:06'),
(47, 27, 'gtps09@gmail.com', 7, '7877', 1, 3, '2019-01-17', '17:57:06'),
(48, 13, 'pro@ilab.com', 7, '7877', 1, 4, '2019-01-17', '17:57:06'),
(49, 14, 'pro2@ilab.com', 7, '7877', 1, 4, '2019-01-17', '17:57:06'),
(50, 32, 'yy013@gmaill.com', 7, '7877', 1, 4, '2019-01-17', '17:57:06'),
(51, 6, 'sam@ilab.com', 7, '7877', 1, 2, '2019-01-17', '17:57:06'),
(52, 9, 'design!@ilab.com', 7, '7877', 1, 2, '2019-01-17', '17:57:06'),
(53, 10, 'design2@ilab.com', 7, '7877', 1, 2, '2019-01-17', '17:57:06'),
(54, 26, 'tvs31@gmail.com', 7, '7877', 1, 2, '2019-01-17', '17:57:06'),
(55, 35, 'abc1@gmail.com', 7, '7877', 1, 2, '2019-01-17', '17:57:06'),
(56, 15, 'buy1@ilab.com', 7, '7877', 1, 7, '2019-01-17', '17:57:06'),
(57, 16, 'buy2@ilab.com', 7, '7877', 1, 7, '2019-01-17', '17:57:06'),
(58, 17, 'abc2@gmail.com', 7, '7877', 1, 7, '2019-01-17', '17:57:06'),
(59, 29, 'gcg2@gmail.com', 7, '7877', 1, 7, '2019-01-17', '17:57:06'),
(60, 7, 'bu1@ilab.com', 8, '600', 1, 6, '2019-02-20', '15:55:08'),
(61, 8, 'bu2@ilab.com', 8, '600', 1, 6, '2019-02-20', '15:55:08'),
(62, 28, 'ups2@yahoo.com', 8, '600', 1, 6, '2019-02-20', '15:55:08'),
(63, 11, 'project1@ilab.com', 8, '600', 1, 3, '2019-02-20', '15:55:08'),
(64, 12, 'project2@ilab.com', 8, '600', 1, 3, '2019-02-20', '15:55:08'),
(65, 22, 'gyt2@gmail.com', 8, '600', 1, 3, '2019-02-20', '15:55:08'),
(66, 27, 'gtps09@gmail.com', 8, '600', 1, 3, '2019-02-20', '15:55:08'),
(67, 13, 'pro@ilab.com', 8, '600', 1, 4, '2019-02-20', '15:55:08'),
(68, 14, 'pro2@ilab.com', 8, '600', 1, 4, '2019-02-20', '15:55:08'),
(69, 32, 'yy013@gmaill.com', 8, '600', 1, 4, '2019-02-20', '15:55:08'),
(70, 6, 'sam@ilab.com', 8, '600', 1, 2, '2019-02-20', '15:55:08'),
(71, 9, 'design!@ilab.com', 8, '600', 1, 2, '2019-02-20', '15:55:08'),
(72, 10, 'design2@ilab.com', 8, '600', 1, 2, '2019-02-20', '15:55:08'),
(73, 26, 'tvs31@gmail.com', 8, '600', 1, 2, '2019-02-20', '15:55:08'),
(74, 35, 'abc1@gmail.com', 8, '600', 1, 2, '2019-02-20', '15:55:08'),
(75, 36, 'sha12@gmail.com', 8, '600', 1, 2, '2019-02-20', '15:55:08'),
(76, 15, 'buy1@ilab.com', 8, '600', 1, 7, '2019-02-20', '15:55:08'),
(77, 16, 'buy2@ilab.com', 8, '600', 1, 7, '2019-02-20', '15:55:08'),
(78, 17, 'abc2@gmail.com', 8, '600', 1, 7, '2019-02-20', '15:55:08'),
(79, 29, 'gcg2@gmail.com', 8, '600', 1, 7, '2019-02-20', '15:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_admin`
--

CREATE TABLE `Ilab_master_admin` (
  `slno` int(11) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL COMMENT 'loginid',
  `Username` varchar(255) DEFAULT NULL COMMENT 'Name',
  `Password` varchar(255) DEFAULT NULL COMMENT 'Encrypted password',
  `password_hash` varchar(255) NOT NULL COMMENT 'Encrypt password',
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT '1-Active,2-Inactive,3-Delete',
  `role_id` int(11) NOT NULL DEFAULT '2',
  `user_mobile` varchar(255) DEFAULT NULL,
  `user_degination` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is for admin information';

--
-- Dumping data for table `Ilab_master_admin`
--

INSERT INTO `Ilab_master_admin` (`slno`, `email_id`, `Username`, `Password`, `password_hash`, `Status`, `role_id`, `user_mobile`, `user_degination`) VALUES
(1, 'admin@ilab.com', 'Admin', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, NULL, NULL),
(6, 'sam@ilab.com', 'sam', '111Aa111', '6b3c06db02609285b33b732fc57a0352', 1, 2, '7412365890', 'user'),
(7, 'bu1@ilab.com', 'bu user1', 'Abcd1234', '325a2cc052914ceeb8c19016c091d2ac', 1, 6, '1234567890', 'bu user'),
(8, 'bu2@ilab.com', 'bu user2', 'ABcd1234', 'bb4e90a7639add09cf8629499638760c', 1, 6, '2314567890', 'bu user'),
(9, 'design!@ilab.com', 'design user 1', 'A12345678b', '4af25c60a5017ac5833227804b04551a', 1, 2, '2345678910', 'design user'),
(10, 'design2@ilab.com', 'design user 2', '12345678Ab', '2a4a3ea4095c1f5453b5463c3a746c99', 1, 2, '3456789012', 'design user'),
(11, 'project1@ilab.com', 'project user 1', '123456789Ab', 'd1bfa0b6240156b7972de61f67a1e632', 1, 3, '4567890123', 'project user'),
(12, 'project2@ilab.com', 'project user 2', '12345678Ab', '2a4a3ea4095c1f5453b5463c3a746c99', 1, 3, '5678901234', 'project user'),
(13, 'pro@ilab.com', 'procurement user 1', '123456789Abc', 'e636ecc38ae7ffa94006a13408d673db', 1, 4, '7895432105', 'procurement'),
(14, 'pro2@ilab.com', 'procurement user 2', '12345abcA', '7f3efd1261d5e49fa2423f2b2cc8cf9e', 1, 4, '9876543210', 'procurement'),
(15, 'buy1@ilab.com', 'buyer 1', '1234567890Ab', 'c0d7659e35f9e7b793c4257d565e7390', 1, 7, '8978564210', 'buyser'),
(16, 'buy2@ilab.com', 'buyer 2', '123456789Ab', 'd1bfa0b6240156b7972de61f67a1e632', 1, 7, '4567933580', 'buyer'),
(17, 'abc2@gmail.com', 'buyer', '121Aa111', '9c4ee8fb6bfd3755eabc1437ac0ccdaa', 1, 7, '87678', 'designation1'),
(18, 'siprah@gmail.com', 'Approver5', 'Sipra2306', '66b81209092c081cf72358adf720884c', 1, 8, '9776069881', 'Approver'),
(19, 'abc@ilab.com', 'Technical User', 'Ab12345678', '5fb6e2a60c9da41e0a94fe6157ddb93f', 1, 9, '9937826311', 'tech evaluator'),
(20, 'qert@ilab.com', 'Technical Evaluator1', 'Aacv12345678', 'db71eec5a12e729fa2c45f8d03fc7be4', 1, 9, '2345671290', 'tech evaluator'),
(21, 'commerical@ilab.com', 'user3', 'cC2345670', '164ba08fa522f904fc17e46c7a54c2ed', 1, 10, '6563423248', 'designation3'),
(22, 'gyt2@gmail.com', 'user7', 'dD111111110', '3efc512e8690e67e5e034b02bfc9a3d2', 1, 3, '6567784466', 'designation7'),
(23, '911@gmail.com', 'user911', 'Xx91110000', '4b273c8ef61a5532fcc705a375ed4f4f', 1, 5, '9835466220', 'designation911'),
(24, 'ut11@gmail.com', 'user4510', 'Vc8jjj78768', '66ebde315e58a3dcb6c632dd0fa89373', 1, 5, '8765544783', 'designation003'),
(25, 'vch33@yahoo.com', 'user901', 'Nv66763vbv', '19457690528514f39e59b4e23eab715c', 1, 8, '8754897860', 'Approver'),
(26, 'tvs31@gmail.com', 'user77', 'Hd5600003hnb', '0d4dd4a6f73051ed47458896bc97ac85', 1, 2, '7754484233', 'designation99'),
(27, 'gtps09@gmail.com', 'user9912', 'Nc7vyh77897', '85c346a057275105c71fc016d29361ff', 1, 3, '8568987421', 'designation009'),
(28, 'ups2@yahoo.com', 'user090', 'Xz9jnumfhhj', '262f287d6b337fe94d624bccfb0339cc', 1, 6, '7987533880', 'designation05'),
(29, 'gcg2@gmail.com', 'user464', 'bN416768HHG', '0a84b0efcbd5427f4caeea4df5b14cb9', 1, 7, '8527427442', 'designation84'),
(30, 'xt12@gmail.com', 'user122', 'hT43hgdfdfgh', '10df2290a27c95a0d0fd35ea2186d9e1', 1, 9, '7755775094', 'tech evaluator'),
(31, 'ats101@gmail.com', 'user932', 'fCT46FGH', 'f3ac5a1f8b095c107f09a49bb6f19100', 1, 8, '7895644333', 'Approver'),
(32, 'yy013@gmaill.com', 'user003', 'tT7GHGJT', '34f996214cd9683befeedc8ecc2f3110', 1, 4, '7884587201', 'designation051'),
(33, 'tts5@gmaill.com', 'user780', 'sT6YHUY8 6788', '2a224b5f97af51d369af7f1ed44f8707', 1, 8, '8764676987', 'Approver'),
(34, 'uvt99@gmail.com', 'user797', 'vT976786vvn', '4e1aa3921ac7f7d3595e6f843a876f22', 1, 5, '7897459893', 'designation09'),
(35, 'abc1@gmail.com', 'user 101', '1234JAzz', '6e32b54b3c884e3527465eae355c673e', 1, 2, '9878765676', 'designation111'),
(36, 'sha12@gmail.com', 'user5', 'shA10000', '59ad47f426392d811349ec6bc4cdef82', 1, 2, '5675678800', 'design50');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid`
--

CREATE TABLE `Ilab_master_bid` (
  `Slno_bid` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `bid_date_entry` date NOT NULL,
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mode_bid` varchar(255) NOT NULL,
  `technical_bid_type` varchar(255) NOT NULL,
  `status_bid` int(11) NOT NULL DEFAULT '1' COMMENT '4- no active  1-> active bid 0->closed 2->internal process',
  `mr_slno` int(11) NOT NULL,
  `mr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `bid_title` varchar(255) NOT NULL,
  `bid_description` text NOT NULL,
  `data_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid_creator_id` varchar(255) NOT NULL,
  `date_publish` varchar(255) NOT NULL,
  `date_closing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid`
--

INSERT INTO `Ilab_master_bid` (`Slno_bid`, `buyer_slno`, `bid_date_entry`, `bid_ref`, `bid_id`, `category`, `mode_bid`, `technical_bid_type`, `status_bid`, `mr_slno`, `mr_no`, `job_code`, `edit_id`, `material_category_name`, `bid_title`, `bid_description`, `data_entry`, `bid_creator_id`, `date_publish`, `date_closing`) VALUES
(1, 30, '2019-02-20', '5500', '7790', '1', 'Simple Bid', '1', 1, 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', 'tthh', 'kkllg', '2019-02-20 12:22:26', 'buy1@ilab.com', '2019-03-27', '2019-05-30'),
(2, 32, '2019-02-20', '002130', '9091', '1', 'Closed Bid', '1', 1, 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', 'ttyz', 'gfgh', '2019-02-20 12:50:43', 'buy1@ilab.com', '2019-05-29', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_commerical`
--

CREATE TABLE `Ilab_master_bid_commerical` (
  `Slno_bid` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `bid_date_entry` date NOT NULL,
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mode_bid` varchar(255) NOT NULL,
  `technical_bid_type` varchar(255) NOT NULL,
  `status_bid` int(11) NOT NULL DEFAULT '1' COMMENT '4- no active  1-> active bid 0->closed 2->internal process 6->bid is complted by commerical community',
  `mr_slno` int(11) NOT NULL,
  `mr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `bid_title` varchar(255) NOT NULL,
  `bid_description` text NOT NULL,
  `data_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid_creator_id` varchar(255) NOT NULL,
  `date_publish` varchar(255) NOT NULL,
  `date_closing` varchar(255) NOT NULL,
  `count_id` int(11) NOT NULL DEFAULT '0' COMMENT '0->event of bid is not cr5eated 1->event6 is created',
  `ACE_Value` varchar(255) DEFAULT NULL,
  `saving_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_commerical`
--

INSERT INTO `Ilab_master_bid_commerical` (`Slno_bid`, `buyer_slno`, `bid_date_entry`, `bid_ref`, `bid_id`, `category`, `mode_bid`, `technical_bid_type`, `status_bid`, `mr_slno`, `mr_no`, `job_code`, `edit_id`, `material_category_name`, `bid_title`, `bid_description`, `data_entry`, `bid_creator_id`, `date_publish`, `date_closing`, `count_id`, `ACE_Value`, `saving_value`) VALUES
(1, 1, '2019-01-28', '1233', '7890', '1', 'Simple Bid', '2', 6, 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', 'xtxx', 'ttt', '2019-01-28 07:34:33', 'buy1@ilab.com', '2019-01-31', '2019-01-10', 0, NULL, NULL),
(2, 2, '2019-01-28', '570', '9988', '1', 'Simple Bid', '2', 6, 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', 'ttgh', 'xxxtt', '2019-01-28 07:41:38', 'buy1@ilab.com', '2019-01-31', '2019-04-18', 0, NULL, NULL),
(3, 3, '2019-01-28', '1112', '22330', '2', 'Simple Bid', '2', 6, 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', 'xxx', 'xcfd', '2019-01-28 14:37:57', 'buy1@ilab.com', '2019-01-31', '2019-01-31', 0, NULL, NULL),
(4, 4, '2019-01-28', '141', '3322', '2', 'Simple Bid', '2', 1, 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', 'fgc', 'gvnht', '2019-01-28 14:42:17', 'buy1@ilab.com', '2019-01-31', '2019-01-31', 0, NULL, NULL),
(5, 5, '2019-01-28', '234', '421', '3', 'Simple Bid', '2', 6, 6, '2019-01-28-lXMjU', '0770', 1, 'logistics [ logistics ]', 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '2019-01-28 14:44:01', 'buy1@ilab.com', '2019-01-27', '2019-01-01', 0, NULL, NULL),
(6, 7, '2019-01-29', '2300', '2120', '2', 'Simple Bid', '2', 6, 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', 'xxtxcv', 'suvc', '2019-01-29 12:04:51', 'buy1@ilab.com', '2019-02-20', '2019-04-09', 0, NULL, NULL),
(7, 6, '2019-01-30', '12330', '55220', '3', 'Closed Bid', '2', 1, 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', 'ttccyy', 'ttjj', '2019-01-30 06:34:14', 'buy1@ilab.com', '2019-02-05', '2019-02-14', 0, NULL, NULL),
(8, 10, '2019-01-30', '2121', '1221', '3', 'Closed Bid', '2', 1, 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', 'ttyy', 'xccttc', '2019-01-30 07:19:35', 'buy1@ilab.com', '2019-01-31', '2019-02-12', 0, NULL, NULL),
(9, 8, '2019-01-30', '7709', '7760', '3', 'Closed Bid', '2', 6, 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', 'thfv', 'fvgb', '2019-01-30 07:23:35', 'buy1@ilab.com', '2019-02-08', '2019-04-08', 0, NULL, NULL),
(10, 9, '2019-01-30', '3320', '2230', '3', 'Closed Bid', '2', 6, 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', 'ttyy', 'fgvgb', '2019-01-30 07:27:44', 'buy1@ilab.com', '2019-02-08', '2019-04-09', 0, NULL, NULL),
(11, 11, '2019-01-30', '212100', '770060', '3', 'Simple Bid', '2', 6, 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', 'gfvb', 'gjyvbg', '2019-01-30 07:55:32', 'buy1@ilab.com', '2019-02-20', '2019-02-28', 0, NULL, NULL),
(12, 12, '2019-01-30', '5670', '877776', '3', 'Simple Bid', '2', 6, 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', 'gfb', 'vhg', '2019-01-30 07:59:34', 'buy1@ilab.com', '2019-02-02', '2019-03-13', 0, NULL, NULL),
(13, 15, '2019-01-31', '8790', '7781', '3', 'Simple Bid', '2', 6, 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', 'yhu', 'jubh', '2019-01-31 06:03:39', 'buy1@ilab.com', '2019-02-13', '2019-02-21', 0, NULL, NULL),
(14, 17, '2019-01-31', '0078', '9908', '3', 'Simple Bid', '2', 6, 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', 'kjiou', 'fvgb', '2019-01-31 07:01:04', 'buy1@ilab.com', '2019-03-20', '2019-03-29', 0, NULL, NULL),
(15, 20, '2019-01-31', '600', '750', '3', 'Rank Order Bid', '2', 1, 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', 'hgityy', 'jhuhjghg', '2019-01-31 11:43:07', 'buy1@ilab.com', '2019-01-31', '2019-02-28', 1, NULL, NULL),
(16, 27, '2019-01-31', '670', '770', '1', 'Rank Order Bid', '2', 1, 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', 'gftk', 'juyg', '2019-01-31 12:42:12', 'buy1@ilab.com', '2019-02-05', '2019-02-28', 1, NULL, NULL),
(17, 28, '2019-01-31', '99', '09', '1', 'Rank Order Bid', '2', 1, 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', 'huju', 'jhub', '2019-01-31 13:00:26', 'buy1@ilab.com', '2019-02-13', '2019-02-28', 1, NULL, NULL),
(18, 26, '2019-01-31', '8700', '9990', '1', 'Rank Order Bid', '2', 1, 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', 'hujk', 'dffffffffc', '2019-01-31 13:58:05', 'buy1@ilab.com', '2019-02-06', '2019-02-28', 1, NULL, NULL),
(19, 29, '2019-01-31', '2340', '46709', '1', 'Rank Order Bid', '2', 1, 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', 'frtg', 'gbyjh', '2019-01-31 14:06:29', 'buy1@ilab.com', '2019-01-31', '2019-02-15', 0, NULL, NULL),
(20, 0, '2019-01-31', '7001', '6701', '1', 'Closed Bid', '2', 4, 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', 'tvyh', 'fgbrt', '2019-01-31 14:19:31', 'buy1@ilab.com', '2019-01-31', '2019-02-07', 0, NULL, NULL),
(21, 31, '2019-02-20', '150', '7700', '1', 'Closed Bid', '2', 4, 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', 'tty', 'stx', '2019-02-20 09:18:44', 'buy1@ilab.com', '2019-02-27', '2019-06-18', 0, '12340', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_commericalevaluation`
--

CREATE TABLE `Ilab_master_bid_commericalevaluation` (
  `slno_bid_tech_id` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `Technical_id_person` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `status_bid` int(11) NOT NULL DEFAULT '0' COMMENT '0->not started  1->started  6->complete bid',
  `view_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not viewed 1->viewied'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_commericalevaluation`
--

INSERT INTO `Ilab_master_bid_commericalevaluation` (`slno_bid_tech_id`, `bid_slno`, `buyer_slno`, `Technical_id_person`, `master_bid_id`, `status_bid`, `view_status`) VALUES
(1, 1, 1, '21', 1, 6, 0),
(2, 2, 2, '21', 2, 6, 0),
(3, 4, 3, '21', 3, 6, 0),
(4, 5, 4, '21', 4, 0, 0),
(5, 6, 5, '21', 5, 6, 0),
(6, 7, 7, '21', 6, 6, 0),
(7, 8, 6, '21', 7, 0, 0),
(8, 14, 10, '21', 8, 0, 0),
(9, 12, 8, '21', 9, 6, 0),
(10, 13, 9, '21', 10, 6, 0),
(11, 11, 11, '21', 11, 6, 0),
(12, 10, 12, '21', 12, 6, 0),
(13, 16, 15, '21', 13, 6, 0),
(14, 18, 17, '21', 14, 6, 0),
(15, 19, 20, '21', 15, 0, 0),
(16, 25, 27, '21', 16, 0, 0),
(17, 28, 28, '21', 17, 0, 0),
(18, 26, 26, '21', 18, 0, 0),
(19, 29, 29, '21', 19, 0, 0),
(20, 3, 0, '21', 20, 0, 0),
(21, 33, 31, '21', 21, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_date_details`
--

CREATE TABLE `Ilab_master_bid_date_details` (
  `Slno_bid_date` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `bid_start_date` varchar(255) DEFAULT NULL,
  `bid_closed_date` varchar(255) DEFAULT NULL,
  `bid_query_closed_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '4- no active  1-> active bid 0->closed 2->internal process',
  `master_bid_id` int(11) NOT NULL,
  `bid_detail_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_date_details`
--

INSERT INTO `Ilab_master_bid_date_details` (`Slno_bid_date`, `bid_slno`, `buyer_slno`, `bid_start_date`, `bid_closed_date`, `bid_query_closed_date`, `status`, `master_bid_id`, `bid_detail_description`) VALUES
(1, 30, 30, '2019-05-07', '2019-06-20', '2019-05-10', 1, 1, 'uuji'),
(2, 35, 32, '2019-06-07', '2019-08-09', '2019-04-03', 4, 2, 'oopsg');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_date_details_commerical`
--

CREATE TABLE `Ilab_master_bid_date_details_commerical` (
  `Slno_bid_date` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `bid_start_date` varchar(255) DEFAULT NULL,
  `bid_closed_date` varchar(255) DEFAULT NULL,
  `bid_query_closed_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '4- no active  1-> active bid 0->closed 2->internal process',
  `master_bid_id` int(11) NOT NULL,
  `bid_detail_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_date_details_commerical`
--

INSERT INTO `Ilab_master_bid_date_details_commerical` (`Slno_bid_date`, `bid_slno`, `buyer_slno`, `bid_start_date`, `bid_closed_date`, `bid_query_closed_date`, `status`, `master_bid_id`, `bid_detail_description`) VALUES
(1, 1, 1, '2019-02-01', '2019-04-10', '2019-03-13', 1, 1, 'xxxx'),
(2, 2, 2, '2019-05-07', '2019-07-23', '2019-07-23', 1, 2, 'thms'),
(3, 4, 3, '2019-02-06', '2019-06-12', '2019-03-07', 1, 3, 'sddd'),
(4, 5, 4, '2019-02-06', '2019-04-09', '2019-02-13', 1, 4, 'fgtf'),
(5, 6, 5, '2019-01-27', '2019-01-31', '2019-01-29', 1, 5, 'Stock quote for Alphabet Inc. Class C Capital Stock Common Stock (GOOG) with real-time last sale and extended hours stock prices, company news, charts,'),
(6, 7, 7, '2019-05-07', '2019-08-14', '2019-06-12', 1, 6, 'sucva'),
(7, 8, 6, '2019-03-07', '2019-03-07', '2019-03-08', 1, 7, 'vhhg'),
(8, 14, 10, '2019-03-06', '2019-06-12', '2019-04-02', 1, 8, 'hgvhhhhhhh'),
(9, 12, 8, '2019-02-07', '2019-03-18', '2019-03-26', 1, 9, 'ghtfc'),
(10, 13, 9, '2019-02-12', '2019-02-15', '2019-02-14', 1, 10, 'fvgb'),
(11, 11, 11, '2019-02-20', '2019-02-28', '2019-03-18', 1, 11, 'fvgh'),
(12, 10, 12, '2019-02-15', '2019-05-22', '2019-04-24', 1, 12, 'fgb'),
(13, 16, 15, '2019-05-08', '2019-07-31', '2019-05-16', 1, 13, 'ujghk'),
(14, 18, 17, '2019-02-15', '2019-02-28', '2019-03-27', 1, 14, 'yvutjg'),
(15, 19, 20, '2019-03-12', '2019-03-27', '2019-03-19', 1, 15, 'imyuj'),
(16, 25, 27, '2019-03-20', '2019-03-26', '2019-03-29', 1, 16, 'tugyj'),
(17, 28, 28, '2019-03-07', '2019-03-25', '2019-03-21', 1, 17, 'hyup'),
(18, 26, 26, '2019-03-13', '2019-03-27', '2019-03-26', 1, 18, 'uhyj'),
(19, 29, 29, '2019-02-15', '2019-02-23', '2019-02-20', 1, 19, 'tcrdfh'),
(20, 3, 0, '2019-02-18', '2019-03-16', '2019-02-28', 4, 20, 'tyh'),
(21, 33, 31, '2019-03-21', '2019-03-28', '2019-03-21', 4, 21, 'hhcc');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_date_details_m`
--

CREATE TABLE `Ilab_master_bid_date_details_m` (
  `Slno_bid_date` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `bid_start_date` varchar(255) DEFAULT NULL,
  `bid_closed_date` varchar(255) DEFAULT NULL,
  `bid_query_closed_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '4- no active  1-> active bid 0->closed 2->internal process',
  `master_bid_id` int(11) NOT NULL,
  `bid_detail_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_date_details_m`
--

INSERT INTO `Ilab_master_bid_date_details_m` (`Slno_bid_date`, `bid_slno`, `buyer_slno`, `bid_start_date`, `bid_closed_date`, `bid_query_closed_date`, `status`, `master_bid_id`, `bid_detail_description`) VALUES
(1, 30, 30, '2019-05-07', '2019-06-20', '2019-05-10', 1, 1, 'uuji'),
(2, 35, 32, '2019-06-07', '2019-08-09', '2019-04-03', 4, 2, 'oopsg');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_details`
--

CREATE TABLE `Ilab_master_bid_details` (
  `slno_bid_detail` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `Title_bid` varchar(255) NOT NULL,
  `work_detail_bid` text NOT NULL,
  `period_work_detail` varchar(255) NOT NULL,
  `location_detail` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_details`
--

INSERT INTO `Ilab_master_bid_details` (`slno_bid_detail`, `bid_slno`, `buyer_slno`, `Title_bid`, `work_detail_bid`, `period_work_detail`, `location_detail`, `master_bid_id`) VALUES
(1, 30, 30, 'tthh', 'kkllg', '6770', '4567', 1),
(2, 35, 32, 'ttyz', 'gfgh', '7800', 'kklm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_details_commerical`
--

CREATE TABLE `Ilab_master_bid_details_commerical` (
  `slno_bid_detail` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `Title_bid` varchar(255) NOT NULL,
  `work_detail_bid` text NOT NULL,
  `period_work_detail` varchar(255) NOT NULL,
  `location_detail` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_details_commerical`
--

INSERT INTO `Ilab_master_bid_details_commerical` (`slno_bid_detail`, `bid_slno`, `buyer_slno`, `Title_bid`, `work_detail_bid`, `period_work_detail`, `location_detail`, `master_bid_id`) VALUES
(1, 1, 1, 'xtxx', 'ttt', '5540', 'ggdd', 1),
(2, 2, 2, 'ttgh', 'xxxtt', '7799', 'ttcv', 2),
(3, 4, 3, 'xxx', 'xcfd', '2333', 'xcvgb', 3),
(4, 5, 4, 'fgc', 'gvnht', '4540', 'fggg', 4),
(5, 6, 5, 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '6 month', 'bbsr', 5),
(6, 7, 7, 'xxtxcv', 'suvc', '6450', 'uvcz', 6),
(7, 8, 6, 'ttccyy', 'ttjj', '1560', 'tthh', 7),
(8, 14, 10, 'ttyy', 'xccttc', '3450', 'vfbvn', 8),
(9, 12, 8, 'thfv', 'fvgb', '35445600', 'bhjjj', 9),
(10, 13, 9, 'ttyy', 'fgvgb', '23400', 'thvf', 10),
(11, 11, 11, 'gfvb', 'gjyvbg', '3450', 'hjnm', 11),
(12, 10, 12, 'gfb', 'vhg', '3450', 'dfvgf', 12),
(13, 16, 15, 'yhu', 'jubh', '2340', 'gbhjn', 13),
(14, 18, 17, 'kjiou', 'fvgb', '3450', 'ikl', 14),
(15, 19, 20, 'hgityy', 'jhuhjghg', '345456', 'rthc', 15),
(16, 25, 27, 'gftk', 'juyg', '3050', 'dcfgv', 16),
(17, 28, 28, 'huju', 'jhub', '78978', 'jijh', 17),
(18, 26, 26, 'hujk', 'dffffffffc', '8778', 'nku', 18),
(19, 29, 29, 'frtg', 'gbyjh', '2340', 'vfgfy', 19),
(20, 3, 0, 'tvyh', 'fgbrt', '12123', '1230', 20),
(21, 33, 31, 'tty', 'stx', '44500', 'tcc', 21);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_details_m`
--

CREATE TABLE `Ilab_master_bid_details_m` (
  `slno_bid_detail` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `Title_bid` varchar(255) NOT NULL,
  `work_detail_bid` text NOT NULL,
  `period_work_detail` varchar(255) NOT NULL,
  `location_detail` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_details_m`
--

INSERT INTO `Ilab_master_bid_details_m` (`slno_bid_detail`, `bid_slno`, `buyer_slno`, `Title_bid`, `work_detail_bid`, `period_work_detail`, `location_detail`, `master_bid_id`) VALUES
(1, 30, 30, 'tthh', 'kkllg', '6770', '4567', 1),
(2, 35, 32, 'ttyz', 'gfgh', '7800', 'kklm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_file_commerical`
--

CREATE TABLE `Ilab_master_bid_file_commerical` (
  `Slno_bid_file` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL COMMENT 'here mr serial no will be stored ',
  `bid_buyer_slno` int(11) NOT NULL COMMENT 'here  value will come from Ilab_master_buyer_MR serail no',
  `file_name` varchar(255) NOT NULL COMMENT 'here file orginal name is stored',
  `file_code_name` varchar(255) NOT NULL COMMENT 'here file name stored inside server folder',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'when file is inserted',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0->some manupaltion occured 1->no manupaltion is done',
  `who_loaded_file` varchar(255) NOT NULL COMMENT 'Information of author'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table will hold information of file to be loaded';

--
-- Dumping data for table `Ilab_master_bid_file_commerical`
--

INSERT INTO `Ilab_master_bid_file_commerical` (`Slno_bid_file`, `bid_slno`, `bid_buyer_slno`, `file_name`, `file_code_name`, `date`, `status`, `who_loaded_file`) VALUES
(1, 1, 1, 'undraw_teaching_f1cm (1).svg', '2019-01-28-undraw_teaching_f1cm (1).svg', '2019-01-28 07:33:57', 1, 'buy1@ilab.com'),
(2, 2, 2, 'undraw_windows_q9m0.svg', '2019-01-28-undraw_windows_q9m0.svg', '2019-01-28 07:40:48', 1, 'buy1@ilab.com'),
(3, 2, 2, 'undraw_statistics_ctoq.svg', '2019-01-28-undraw_statistics_ctoq.svg', '2019-01-28 07:40:55', 1, 'buy1@ilab.com'),
(4, 4, 3, 'undraw_windows_q9m0.svg', '2019-01-28-undraw_windows_q9m0.svg', '2019-01-28 14:36:30', 1, 'buy1@ilab.com'),
(5, 4, 3, 'undraw_resume_1hqp.svg', '2019-01-28-undraw_resume_1hqp.svg', '2019-01-28 14:36:37', 1, 'buy1@ilab.com'),
(6, 5, 4, 'undraw_team_ih79.svg', '2019-01-28-undraw_team_ih79.svg', '2019-01-28 14:41:41', 1, 'buy1@ilab.com'),
(7, 5, 4, 'undraw_secure_data_0rwp.svg', '2019-01-28-undraw_secure_data_0rwp.svg', '2019-01-28 14:41:48', 1, 'buy1@ilab.com'),
(8, 7, 7, 'undraw_windows_q9m0.svg', '2019-01-29-undraw_windows_q9m0.svg', '2019-01-29 11:59:46', 1, 'buy1@ilab.com'),
(9, 7, 7, 'undraw_resume_1hqp.svg', '2019-01-29-undraw_resume_1hqp.svg', '2019-01-29 11:59:59', 1, 'buy1@ilab.com'),
(10, 8, 6, 'undraw_statistics_ctoq.svg', '2019-01-30-undraw_statistics_ctoq.svg', '2019-01-30 06:32:25', 1, 'buy1@ilab.com'),
(11, 8, 6, 'undraw_statistics_ctoq.svg', '2019-01-30-undraw_statistics_ctoq.svg', '2019-01-30 06:32:28', 1, 'buy1@ilab.com'),
(12, 14, 10, 'undraw_teaching_f1cm (1).svg', '2019-01-30-undraw_teaching_f1cm (1).svg', '2019-01-30 07:17:34', 1, 'buy1@ilab.com'),
(13, 14, 10, 'undraw_mail_cg1t.svg', '2019-01-30-undraw_mail_cg1t.svg', '2019-01-30 07:17:48', 1, 'buy1@ilab.com'),
(14, 12, 8, 'undraw_statistics_ctoq.svg', '2019-01-30-undraw_statistics_ctoq.svg', '2019-01-30 07:22:13', 1, 'buy1@ilab.com'),
(15, 12, 8, 'undraw_mail_cg1t.svg', '2019-01-30-undraw_mail_cg1t.svg', '2019-01-30 07:22:22', 1, 'buy1@ilab.com'),
(16, 13, 9, 'undraw_resume_1hqp.svg', '2019-01-30-undraw_resume_1hqp.svg', '2019-01-30 07:26:12', 1, 'buy1@ilab.com'),
(17, 13, 9, 'undraw_mail_cg1t.svg', '2019-01-30-undraw_mail_cg1t.svg', '2019-01-30 07:26:21', 1, 'buy1@ilab.com'),
(18, 11, 11, 'undraw_windows_q9m0.svg', '2019-01-30-undraw_windows_q9m0.svg', '2019-01-30 07:53:58', 1, 'buy1@ilab.com'),
(19, 11, 11, 'undraw_resume_1hqp.svg', '2019-01-30-undraw_resume_1hqp.svg', '2019-01-30 07:54:05', 1, 'buy1@ilab.com'),
(20, 10, 12, 'undraw_user_flow_vr6w.svg', '2019-01-30-undraw_user_flow_vr6w.svg', '2019-01-30 07:58:06', 1, 'buy1@ilab.com'),
(21, 10, 12, 'undraw_statistics_ctoq.svg', '2019-01-30-undraw_statistics_ctoq.svg', '2019-01-30 07:58:13', 1, 'buy1@ilab.com'),
(22, 16, 15, 'undraw_resume_1hqp.svg', '2019-01-31-undraw_resume_1hqp.svg', '2019-01-31 06:02:16', 1, 'buy1@ilab.com'),
(23, 16, 15, 'undraw_mail_cg1t.svg', '2019-01-31-undraw_mail_cg1t.svg', '2019-01-31 06:02:24', 1, 'buy1@ilab.com'),
(24, 18, 17, 'undraw_statistics_ctoq.svg', '2019-01-31-undraw_statistics_ctoq.svg', '2019-01-31 06:59:07', 1, 'buy1@ilab.com'),
(25, 18, 17, 'undraw_mail_cg1t.svg', '2019-01-31-undraw_mail_cg1t.svg', '2019-01-31 06:59:18', 1, 'buy1@ilab.com'),
(26, 19, 20, 'undraw_teaching_f1cm (1).svg', '2019-01-31-undraw_teaching_f1cm (1).svg', '2019-01-31 11:41:05', 1, 'buy1@ilab.com'),
(27, 19, 20, 'undraw_map_light_6ttm.svg', '2019-01-31-undraw_map_light_6ttm.svg', '2019-01-31 11:41:15', 1, 'buy1@ilab.com'),
(28, 25, 27, 'undraw_teaching_f1cm (1).svg', '2019-01-31-undraw_teaching_f1cm (1).svg', '2019-01-31 12:41:12', 1, 'buy1@ilab.com'),
(29, 25, 27, 'undraw_resume_1hqp.svg', '2019-01-31-undraw_resume_1hqp.svg', '2019-01-31 12:41:19', 1, 'buy1@ilab.com'),
(30, 28, 28, 'undraw_team_ih79.svg', '2019-01-31-undraw_team_ih79.svg', '2019-01-31 12:59:52', 1, 'buy1@ilab.com'),
(31, 26, 26, 'undraw_user_flow_vr6w.svg', '2019-01-31-undraw_user_flow_vr6w.svg', '2019-01-31 13:57:14', 1, 'buy1@ilab.com'),
(32, 26, 26, 'undraw_secure_data_0rwp.svg', '2019-01-31-undraw_secure_data_0rwp.svg', '2019-01-31 13:57:27', 1, 'buy1@ilab.com'),
(33, 29, 29, 'undraw_windows_q9m0.svg', '2019-01-31-undraw_windows_q9m0.svg', '2019-01-31 14:05:36', 1, 'buy1@ilab.com'),
(34, 29, 29, 'undraw_mail_cg1t.svg', '2019-01-31-undraw_mail_cg1t.svg', '2019-01-31 14:05:45', 1, 'buy1@ilab.com'),
(35, 3, 0, 'undraw_windows_q9m0.svg', '2019-01-31-undraw_windows_q9m0.svg', '2019-01-31 14:18:50', 1, 'buy1@ilab.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_file_technical`
--

CREATE TABLE `Ilab_master_bid_file_technical` (
  `Slno_bid_file` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL COMMENT 'here mr serial no will be stored ',
  `bid_buyer_slno` int(11) NOT NULL COMMENT 'here  value will come from Ilab_master_buyer_MR serail no',
  `file_name` varchar(255) NOT NULL COMMENT 'here file orginal name is stored',
  `file_code_name` varchar(255) NOT NULL COMMENT 'here file name stored inside server folder',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'when file is inserted',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0->some manupaltion occured 1->no manupaltion is done',
  `who_loaded_file` varchar(255) NOT NULL COMMENT 'Information of author'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table will hold information of file to be loaded';

--
-- Dumping data for table `Ilab_master_bid_file_technical`
--

INSERT INTO `Ilab_master_bid_file_technical` (`Slno_bid_file`, `bid_slno`, `bid_buyer_slno`, `file_name`, `file_code_name`, `date`, `status`, `who_loaded_file`) VALUES
(1, 30, 30, 'undraw_statistics_ctoq.svg', '2019-02-20-undraw_statistics_ctoq.svg', '2019-02-20 12:22:01', 1, 'buy1@ilab.com'),
(2, 35, 32, 'undraw_resume_1hqp.svg', '2019-02-20-undraw_resume_1hqp.svg', '2019-02-20 12:50:16', 1, 'buy1@ilab.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_invitation_rank`
--

CREATE TABLE `Ilab_master_bid_invitation_rank` (
  `slno_invi` int(11) NOT NULL,
  `master_bid_id` varchar(255) NOT NULL,
  `master_bid_start` varchar(255) NOT NULL,
  `master_bid_end` varchar(255) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `ref_id` varchar(255) NOT NULL,
  `no_time_entry` varchar(255) NOT NULL,
  `commerical_user_id` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_process` int(11) NOT NULL DEFAULT '1',
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_invitation_rank`
--

INSERT INTO `Ilab_master_bid_invitation_rank` (`slno_invi`, `master_bid_id`, `master_bid_start`, `master_bid_end`, `ref_no`, `ref_id`, `no_time_entry`, `commerical_user_id`, `date_entry`, `date_update`, `status_process`, `category`) VALUES
(1, '15', '01/31/2019 6:44 PM', '02/08/2019 6:46 PM', '600', '750', '4', '21', '2019-01-31 13:16:24', '2019-01-31 13:16:24', 1, 3),
(2, '16', '01/31/2019 6:51 PM', '02/08/2019 6:52 PM', '670', '770', '2', '21', '2019-01-31 13:22:33', '2019-01-31 13:22:33', 1, 1),
(3, '17', '01/31/2019 6:52 PM', '02/09/2019 6:53 PM', '99', '09', '4', '21', '2019-01-31 13:23:17', '2019-01-31 13:23:17', 1, 1),
(4, '18', '02/20/2019 5:53 PM', '02/28/2019 5:53 PM', '8700', '9990', '3', '21', '2019-02-20 12:24:47', '2019-02-20 12:24:47', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_invi_otp`
--

CREATE TABLE `Ilab_master_bid_invi_otp` (
  `slno_otp` int(11) NOT NULL,
  `master_bid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_invi_rank_approvals`
--

CREATE TABLE `Ilab_master_bid_invi_rank_approvals` (
  `slno_approve` int(11) NOT NULL,
  `master_bid_id` varchar(255) NOT NULL,
  `invi_slno_id` varchar(255) NOT NULL,
  `vendor_id_bid` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_entry` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `no_of_times` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_invi_rank_approvals`
--

INSERT INTO `Ilab_master_bid_invi_rank_approvals` (`slno_approve`, `master_bid_id`, `invi_slno_id`, `vendor_id_bid`, `vendor_id`, `status`, `date_entry`, `date_update`, `bid_ref`, `bid_id`, `start_date`, `end_date`, `no_of_times`, `category`) VALUES
(1, '15', '1', '161', 'ven121@gmail.com', 1, '2019-01-31 13:16:24', '2019-01-31 13:16:24', '600', '750', '01/31/2019 6:44 PM', '02/08/2019 6:46 PM', 4, 3),
(2, '16', '2', '175', 'ven121@gmail.com', 1, '2019-01-31 13:22:33', '2019-01-31 13:22:33', '670', '770', '01/31/2019 6:51 PM', '02/08/2019 6:52 PM', 2, 1),
(3, '17', '3', '189', 'ven121@gmail.com', 1, '2019-01-31 13:23:17', '2019-01-31 13:23:17', '99', '09', '01/31/2019 6:52 PM', '02/09/2019 6:53 PM', 4, 1),
(4, '18', '4', '203', 'ven121@gmail.com', 1, '2019-02-20 12:24:47', '2019-02-20 12:24:47', '8700', '9990', '02/20/2019 5:53 PM', '02/28/2019 5:53 PM', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_invi_rank_not_app`
--

CREATE TABLE `Ilab_master_bid_invi_rank_not_app` (
  `slno_not` int(11) NOT NULL,
  `master_bid_id` varchar(255) NOT NULL,
  `invi_slno_id` varchar(255) NOT NULL,
  `vendor_bid_id` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_invi_rank_not_app`
--

INSERT INTO `Ilab_master_bid_invi_rank_not_app` (`slno_not`, `master_bid_id`, `invi_slno_id`, `vendor_bid_id`, `vendor_id`, `date_entry`, `date_update`) VALUES
(1, '15', '1', '160', 'ven111@gmail.com', '2019-01-31 13:16:24', '2019-01-31 13:16:24'),
(2, '15', '1', '162', 'ven221@gmail.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(3, '15', '1', '163', 'ven001@gmail.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(4, '15', '1', '164', 'ven310@yahoo.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(5, '15', '1', '165', 'ven331@gmail.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(6, '15', '1', '166', 'ven97@gmail.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(7, '15', '1', '167', 'ven979@yahoo.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(8, '15', '1', '168', 'ven90@gmail.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(9, '15', '1', '169', 'ven66@gmail.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(10, '15', '1', '170', 'ven371@yahoo.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(11, '15', '1', '171', 'ven170@yahoo.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(12, '15', '1', '172', 'ven454@yahoo.com', '2019-01-31 13:16:25', '2019-01-31 13:16:25'),
(13, '16', '2', '173', 'vender@ilab.com', '2019-01-31 13:22:33', '2019-01-31 13:22:33'),
(14, '16', '2', '174', 'ven111@gmail.com', '2019-01-31 13:22:33', '2019-01-31 13:22:33'),
(15, '16', '2', '176', 'ven221@gmail.com', '2019-01-31 13:22:33', '2019-01-31 13:22:33'),
(16, '16', '2', '177', 'ven310@yahoo.com', '2019-01-31 13:22:33', '2019-01-31 13:22:33'),
(17, '16', '2', '178', 'ven1011@yahoo.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(18, '16', '2', '179', 'ven331@gmail.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(19, '16', '2', '180', 'ven97@gmail.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(20, '16', '2', '181', 'ven979@yahoo.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(21, '16', '2', '182', 'ven90@gmail.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(22, '16', '2', '183', 'ven66@gmail.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(23, '16', '2', '184', 'ven371@yahoo.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(24, '16', '2', '185', 'ven170@yahoo.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(25, '16', '2', '186', 'ven454@yahoo.com', '2019-01-31 13:22:34', '2019-01-31 13:22:34'),
(26, '17', '3', '187', 'vender@ilab.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(27, '17', '3', '188', 'ven111@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(28, '17', '3', '190', 'ven221@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(29, '17', '3', '191', 'ven310@yahoo.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(30, '17', '3', '192', 'ven1011@yahoo.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(31, '17', '3', '193', 'ven331@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(32, '17', '3', '194', 'ven97@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(33, '17', '3', '195', 'ven979@yahoo.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(34, '17', '3', '196', 'ven90@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(35, '17', '3', '197', 'ven66@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(36, '17', '3', '198', 'ven371@yahoo.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(37, '17', '3', '199', 'ven170@yahoo.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(38, '17', '3', '200', 'ven454@yahoo.com', '2019-01-31 13:23:17', '2019-01-31 13:23:17'),
(39, '18', '4', '201', 'vender@ilab.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(40, '18', '4', '202', 'ven111@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(41, '18', '4', '204', 'ven221@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(42, '18', '4', '205', 'ven310@yahoo.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(43, '18', '4', '206', 'ven1011@yahoo.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(44, '18', '4', '207', 'ven331@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(45, '18', '4', '208', 'ven97@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(46, '18', '4', '209', 'ven979@yahoo.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(47, '18', '4', '210', 'ven90@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(48, '18', '4', '211', 'ven66@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(49, '18', '4', '212', 'ven371@yahoo.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(50, '18', '4', '213', 'ven170@yahoo.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47'),
(51, '18', '4', '214', 'ven454@yahoo.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_m`
--

CREATE TABLE `Ilab_master_bid_m` (
  `Slno_bid` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `bid_date_entry` date NOT NULL,
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mode_bid` varchar(255) NOT NULL,
  `technical_bid_type` varchar(255) NOT NULL,
  `status_bid` int(11) NOT NULL DEFAULT '1' COMMENT '4- no active  1-> active bid 0->closed 2->internal process',
  `mr_slno` int(11) NOT NULL,
  `mr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `bid_title` varchar(255) NOT NULL,
  `bid_description` text NOT NULL,
  `data_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid_creator_id` varchar(255) NOT NULL,
  `date_publish` varchar(255) NOT NULL,
  `date_closing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_m`
--

INSERT INTO `Ilab_master_bid_m` (`Slno_bid`, `buyer_slno`, `bid_date_entry`, `bid_ref`, `bid_id`, `category`, `mode_bid`, `technical_bid_type`, `status_bid`, `mr_slno`, `mr_no`, `job_code`, `edit_id`, `material_category_name`, `bid_title`, `bid_description`, `data_entry`, `bid_creator_id`, `date_publish`, `date_closing`) VALUES
(1, 30, '2019-02-20', '5500', '7790', '1', 'Simple Bid', '1', 1, 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', 'tthh', 'kkllg', '2019-02-20 12:22:26', 'buy1@ilab.com', '2019-03-27', '2019-05-30'),
(2, 32, '2019-02-20', '002130', '9091', '1', 'Closed Bid', '1', 1, 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', 'ttyz', 'gfgh', '2019-02-20 12:50:43', 'buy1@ilab.com', '2019-05-29', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_otp_commerical`
--

CREATE TABLE `Ilab_master_bid_otp_commerical` (
  `slno_comm` int(11) NOT NULL,
  `master_bid_id` varchar(255) NOT NULL COMMENT 'commerial bid i serial no',
  `bid_slno` varchar(255) DEFAULT NULL COMMENT 'buyser serial id',
  `type_bid` varchar(255) NOT NULL COMMENT '1-simple 2-closed',
  `category_bid` varchar(255) NOT NULL COMMENT '1-sci 2-moi 3-log ',
  `otp` varchar(255) NOT NULL COMMENT 'otp',
  `bid_name` varchar(255) NOT NULL COMMENT 'bid like closed simple rank order bid',
  `user_id_process` varchar(255) NOT NULL COMMENT ' who has generated id',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active 2-inactive',
  `match_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-match 2-pending',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date time of entry',
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'when status is chande date time',
  `match_bid_id_user` varchar(255) DEFAULT NULL COMMENT 'who has try to match id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_otp_commerical`
--

INSERT INTO `Ilab_master_bid_otp_commerical` (`slno_comm`, `master_bid_id`, `bid_slno`, `type_bid`, `category_bid`, `otp`, `bid_name`, `user_id_process`, `status`, `match_status`, `date_entry`, `date_update`, `match_bid_id_user`) VALUES
(1, '1', '1', '1', '1', '2019-01-28-7cP5e', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-28 09:44:53', '2019-01-28 09:48:24', 'commerical@ilab.com'),
(2, '1', '1', '1', '1', '2019-01-28-A5RI9', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-28 10:38:08', '2019-01-28 10:38:08', NULL),
(3, '1', '1', '1', '1', '2019-01-28-6uaQF', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-28 11:09:12', '2019-01-28 11:09:12', NULL),
(4, '1', '1', '1', '1', '2019-01-28-QFoaz', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-28 11:16:21', '2019-01-28 11:16:21', NULL),
(5, '1', '1', '1', '1', '2019-01-28-eJO5k', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-28 11:22:08', '2019-01-28 11:22:29', 'commerical@ilab.com'),
(6, '2', '2', '1', '1', '2019-01-28-wX5Sj', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-28 11:47:49', '2019-01-28 11:47:49', NULL),
(7, '2', '2', '1', '1', '2019-01-28-6hNVY', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-28 11:49:27', '2019-01-28 12:04:10', 'commerical@ilab.com'),
(8, '1', '1', '1', '1', '2019-01-28-Z3m1i', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-28 13:46:29', '2019-01-28 13:46:29', NULL),
(9, '3', '3', '1', '2', '2019-01-28-PvGRF', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-28 14:47:44', '2019-01-28 14:48:09', 'commerical@ilab.com'),
(10, '5', '5', '1', '3', '2019-01-28-rUyLM', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-28 15:39:37', '2019-01-28 15:39:37', NULL),
(11, '5', '5', '1', '3', '2019-01-29-ZOrT5', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 07:41:19', '2019-01-29 07:43:32', 'commerical@ilab.com'),
(12, '1', '1', '1', '1', '2019-01-29-AXHCz', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 07:48:20', '2019-01-29 07:48:20', NULL),
(13, '1', '1', '1', '1', '2019-01-29-LUWXJ', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 07:52:41', '2019-01-29 08:01:24', 'commerical@ilab.com'),
(14, '3', '3', '1', '2', '2019-01-29-TtrEB', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 09:36:36', '2019-01-29 09:42:40', 'commerical@ilab.com'),
(15, '2', '2', '1', '1', '2019-01-29-KVm0d', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 09:53:13', '2019-01-29 09:53:13', NULL),
(16, '2', '2', '1', '1', '2019-01-29-KvXYL', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 10:00:54', '2019-01-29 10:00:54', NULL),
(17, '2', '2', '1', '1', '2019-01-29-f5agx', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 10:07:37', '2019-01-29 10:07:37', NULL),
(18, '2', '2', '1', '1', '2019-01-29-V4pOq', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 10:14:24', '2019-01-29 10:14:24', NULL),
(19, '2', '2', '1', '1', '2019-01-29-eVAhw', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 10:14:29', '2019-01-29 10:14:29', NULL),
(20, '2', '2', '1', '1', '2019-01-29-Elmd4', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 10:24:18', '2019-01-29 10:24:18', NULL),
(21, '2', '2', '1', '1', '2019-01-29-ULGe8', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 10:28:46', '2019-01-29 10:28:46', NULL),
(22, '5', '5', '1', '3', '2019-01-29-2UVTq', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 11:23:58', '2019-01-29 11:24:33', 'commerical@ilab.com'),
(23, '2', '2', '1', '1', '2019-01-29-7TkMU', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 11:25:20', '2019-01-29 11:25:20', NULL),
(24, '2', '2', '1', '1', '2019-01-29-JneBQ', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 11:25:25', '2019-01-29 11:25:25', NULL),
(25, '5', '5', '1', '3', '2019-01-29-NnQkp', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 11:25:40', '2019-01-29 11:26:30', 'commerical@ilab.com'),
(26, '5', '5', '1', '3', '2019-01-29-8bypA', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 11:33:32', '2019-01-29 11:34:21', 'commerical@ilab.com'),
(27, '6', '7', '1', '2', '2019-01-29-xitkN', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 12:07:37', '2019-01-29 12:07:37', NULL),
(28, '6', '7', '1', '2', '2019-01-29-8GIQL', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 12:11:58', '2019-01-29 12:11:58', NULL),
(29, '6', '7', '1', '2', '2019-01-29-XGbjY', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 12:15:06', '2019-01-29 12:15:06', NULL),
(30, '6', '7', '1', '2', '2019-01-29-A8SOF', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-29 12:20:27', '2019-01-29 12:20:27', NULL),
(31, '6', '7', '1', '2', '2019-01-29-zGOZE', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 12:22:58', '2019-01-29 12:29:14', 'commerical@ilab.com'),
(32, '6', '7', '1', '2', '2019-01-29-v9IcO', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 13:07:23', '2019-01-29 13:07:55', 'commerical@ilab.com'),
(33, '4', '4', '1', '2', '2019-01-29-vN2XU', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 13:11:24', '2019-01-29 13:12:32', 'commerical@ilab.com'),
(34, '4', '4', '1', '2', '2019-01-29-PGp0u', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-29 13:16:14', '2019-01-29 13:16:44', 'commerical@ilab.com'),
(35, '7', '6', '2', '3', '2019-01-30-KalSF', 'Closed Bid', 'commerical@ilab.com', 1, 1, '2019-01-30 06:40:17', '2019-01-30 06:42:40', 'commerical@ilab.com'),
(36, '7', '6', '2', '3', '2019-01-30-QXein', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-01-30 06:43:51', '2019-01-30 06:43:51', NULL),
(37, '7', '6', '2', '3', '2019-01-30-muYr8', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-01-30 06:55:50', '2019-01-30 06:55:50', NULL),
(38, '10', '9', '2', '3', '2019-01-30-S5UkE', 'Closed Bid', 'commerical@ilab.com', 1, 1, '2019-01-30 07:34:22', '2019-01-30 07:37:41', 'commerical@ilab.com'),
(39, '9', '8', '2', '3', '2019-01-30-7e8Tw', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-01-30 07:41:30', '2019-01-30 07:41:30', NULL),
(40, '12', '12', '1', '3', '2019-01-30-AKbHI', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-30 08:04:51', '2019-01-30 08:09:25', 'commerical@ilab.com'),
(41, '12', '12', '1', '3', '2019-01-30-aCbJD', 'Simple Bid', 'commerical@ilab.com', 1, 2, '2019-01-30 08:12:47', '2019-01-30 08:12:47', NULL),
(42, '13', '15', '1', '3', '2019-01-31-5YHVd', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 06:07:24', '2019-01-31 06:11:09', 'commerical@ilab.com'),
(43, '13', '15', '1', '3', '2019-01-31-Uby32', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 06:14:18', '2019-01-31 06:29:40', 'commerical@ilab.com'),
(44, '13', '15', '1', '3', '2019-01-31-jb9hB', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 06:46:35', '2019-01-31 06:47:05', 'commerical@ilab.com'),
(45, '14', '17', '1', '3', '2019-01-31-k2yUT', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 07:10:18', '2019-01-31 07:10:49', 'commerical@ilab.com'),
(46, '14', '17', '1', '3', '2019-01-31-hXVrd', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 07:15:28', '2019-01-31 07:15:58', 'commerical@ilab.com'),
(47, '14', '17', '1', '3', '2019-01-31-VzHm4', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 07:25:46', '2019-01-31 07:26:09', 'commerical@ilab.com'),
(48, '12', '12', '1', '3', '2019-01-31-bQhTR', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 10:28:34', '2019-01-31 10:29:48', 'commerical@ilab.com'),
(49, '11', '11', '1', '3', '2019-01-31-K5Nqj', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 10:31:54', '2019-01-31 10:32:27', 'commerical@ilab.com'),
(50, '11', '11', '1', '3', '2019-01-31-NhsCy', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 10:38:46', '2019-01-31 10:39:06', 'commerical@ilab.com'),
(51, '11', '11', '1', '3', '2019-01-31-qRLhP', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 10:49:30', '2019-01-31 10:57:42', 'commerical@ilab.com'),
(52, '9', '8', '2', '3', '2019-01-31-4JrMa', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-01-31 10:59:35', '2019-01-31 10:59:35', NULL),
(53, '9', '8', '2', '3', '2019-01-31-VFpQo', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-01-31 11:45:07', '2019-01-31 11:45:07', NULL),
(54, '9', '8', '2', '3', '2019-01-31-XP3Wr', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-01-31 13:07:09', '2019-01-31 13:07:09', NULL),
(55, '9', '8', '2', '3', '2019-01-31-dPMry', 'Closed Bid', 'commerical@ilab.com', 1, 1, '2019-01-31 14:28:19', '2019-01-31 14:30:41', 'commerical@ilab.com'),
(56, '2', '2', '1', '1', '2019-02-20-8kEut', 'Simple Bid', 'commerical@ilab.com', 1, 1, '2019-02-20 09:59:14', '2019-02-20 10:00:53', 'commerical@ilab.com'),
(57, '8', '10', '2', '3', '2019-02-20-oKXvV', 'Closed Bid', 'commerical@ilab.com', 1, 2, '2019-02-20 10:07:42', '2019-02-20 10:07:42', NULL),
(58, '8', '10', '2', '3', '2019-02-20-1PdvO', 'Closed Bid', 'commerical@ilab.com', 1, 1, '2019-02-20 10:08:03', '2019-02-20 10:09:02', 'commerical@ilab.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_query`
--

CREATE TABLE `Ilab_master_bid_query` (
  `Slno_query` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `query_details` text,
  `response_detail` text,
  `responser_id` varchar(255) DEFAULT NULL,
  `date_query` date NOT NULL,
  `date_respond` date DEFAULT NULL,
  `status_responds` int(11) NOT NULL DEFAULT '0' COMMENT '0-not responded 1-responded'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_query_commerical`
--

CREATE TABLE `Ilab_master_bid_query_commerical` (
  `Slno_query` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `query_details` text,
  `response_detail` text,
  `responser_id` varchar(255) DEFAULT NULL,
  `date_query` date NOT NULL,
  `date_respond` date DEFAULT NULL,
  `status_responds` int(11) NOT NULL DEFAULT '0' COMMENT '0-not responded 1-responded'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_query_commerical`
--

INSERT INTO `Ilab_master_bid_query_commerical` (`Slno_query`, `bid_slno`, `Vendor_id`, `query_details`, `response_detail`, `responser_id`, `date_query`, `date_respond`, `status_responds`) VALUES
(1, 1, 'ven121@gmail.com', 'ttyg', NULL, NULL, '2019-01-28', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_technicalevaluation`
--

CREATE TABLE `Ilab_master_bid_technicalevaluation` (
  `slno_bid_tech_id` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `Technical_id_person` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `status_bid` int(11) NOT NULL DEFAULT '0' COMMENT '0->not started  1->started  8->complete bid',
  `view_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not viewed 1->viewied'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_technicalevaluation`
--

INSERT INTO `Ilab_master_bid_technicalevaluation` (`slno_bid_tech_id`, `bid_slno`, `buyer_slno`, `Technical_id_person`, `master_bid_id`, `status_bid`, `view_status`) VALUES
(1, 30, 30, '19', 1, 0, 0),
(2, 35, 32, '19', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_technicalevaluation_m`
--

CREATE TABLE `Ilab_master_bid_technicalevaluation_m` (
  `slno_bid_tech_id` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `Technical_id_person` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `status_bid` int(11) NOT NULL DEFAULT '0' COMMENT '0->not started  1->started  8->complete bid',
  `view_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not viewed 1->viewied'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_technicalevaluation_m`
--

INSERT INTO `Ilab_master_bid_technicalevaluation_m` (`slno_bid_tech_id`, `bid_slno`, `buyer_slno`, `Technical_id_person`, `master_bid_id`, `status_bid`, `view_status`) VALUES
(1, 30, 30, '19', 1, 0, 0),
(2, 35, 32, '19', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_t_c_m`
--

CREATE TABLE `Ilab_master_bid_t_c_m` (
  `slno` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `edit_id` varchar(255) NOT NULL,
  `t_c_detail` text NOT NULL,
  `data_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_vendor`
--

CREATE TABLE `Ilab_master_bid_vendor` (
  `slno_vendor` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `approval_status` varchar(255) DEFAULT NULL,
  `submission_status` varchar(255) DEFAULT '0',
  `submission_count` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `query_end_date` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `view_status_approve` int(11) NOT NULL DEFAULT '0',
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mode_bid` varchar(255) NOT NULL,
  `technical_bid_type` varchar(255) NOT NULL,
  `mr_slno` int(11) NOT NULL,
  `mr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_active` int(11) NOT NULL DEFAULT '0' COMMENT '0-bid is not active 1-bid is active 2-bid is close',
  `status_view` int(11) NOT NULL DEFAULT '5' COMMENT '5-not viewed 6-viewed 7-submitted 8-> resubmission',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_vendor`
--

INSERT INTO `Ilab_master_bid_vendor` (`slno_vendor`, `bid_slno`, `buyer_slno`, `vendor_id`, `status`, `approval_status`, `submission_status`, `submission_count`, `title`, `description`, `date_start`, `date_end`, `query_end_date`, `master_bid_id`, `view_status_approve`, `bid_ref`, `bid_id`, `category`, `mode_bid`, `technical_bid_type`, `mr_slno`, `mr_no`, `job_code`, `edit_id`, `material_category_name`, `date_entry`, `date_update`, `status_active`, `status_view`, `comment`) VALUES
(1, 30, 30, 'vender@ilab.com', 1, NULL, '0', '0', 'tthh', 'kkllg', '2019-05-07', '2019-06-20', '2019-05-10', 1, 0, '5500', '7790', '1', 'Simple Bid', '1', 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:22:26', '2019-02-20 12:52:07', 1, 5, NULL),
(2, 30, 30, 'ven111@gmail.com', 1, NULL, '0', '0', 'tthh', 'kkllg', '2019-05-07', '2019-06-20', '2019-05-10', 1, 0, '5500', '7790', '1', 'Simple Bid', '1', 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:22:26', '2019-02-20 12:52:07', 1, 5, NULL),
(3, 30, 30, 'ven121@gmail.com', 1, NULL, '0', '0', 'tthh', 'kkllg', '2019-05-07', '2019-06-20', '2019-05-10', 1, 0, '5500', '7790', '1', 'Simple Bid', '1', 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:22:26', '2019-02-20 12:52:07', 1, 5, NULL),
(4, 30, 30, 'ven221@gmail.com', 1, NULL, '0', '0', 'tthh', 'kkllg', '2019-05-07', '2019-06-20', '2019-05-10', 1, 0, '5500', '7790', '1', 'Simple Bid', '1', 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:22:26', '2019-02-20 12:52:07', 1, 5, NULL),
(5, 30, 30, 'ven310@yahoo.com', 1, NULL, '0', '0', 'tthh', 'kkllg', '2019-05-07', '2019-06-20', '2019-05-10', 1, 0, '5500', '7790', '1', 'Simple Bid', '1', 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:22:26', '2019-02-20 12:52:07', 1, 5, NULL),
(6, 30, 30, 'ven1011@yahoo.com', 1, NULL, '0', '0', 'tthh', 'kkllg', '2019-05-07', '2019-06-20', '2019-05-10', 1, 0, '5500', '7790', '1', 'Simple Bid', '1', 30, '2019-02-01-kJV97', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:22:26', '2019-02-20 12:52:07', 1, 5, NULL),
(7, 35, 32, 'vender@ilab.com', 4, NULL, '0', '0', 'ttyz', 'gfgh', '2019-06-07', '2019-08-09', '2019-04-03', 2, 0, '002130', '9091', '1', 'Closed Bid', '1', 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:50:43', '2019-02-20 12:50:43', 0, 5, NULL),
(8, 35, 32, 'ven111@gmail.com', 4, NULL, '0', '0', 'ttyz', 'gfgh', '2019-06-07', '2019-08-09', '2019-04-03', 2, 0, '002130', '9091', '1', 'Closed Bid', '1', 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:50:44', '2019-02-20 12:50:44', 0, 5, NULL),
(9, 35, 32, 'ven121@gmail.com', 4, NULL, '0', '0', 'ttyz', 'gfgh', '2019-06-07', '2019-08-09', '2019-04-03', 2, 0, '002130', '9091', '1', 'Closed Bid', '1', 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:50:44', '2019-02-20 12:50:44', 0, 5, NULL),
(10, 35, 32, 'ven221@gmail.com', 4, NULL, '0', '0', 'ttyz', 'gfgh', '2019-06-07', '2019-08-09', '2019-04-03', 2, 0, '002130', '9091', '1', 'Closed Bid', '1', 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:50:44', '2019-02-20 12:50:44', 0, 5, NULL),
(11, 35, 32, 'ven310@yahoo.com', 4, NULL, '0', '0', 'ttyz', 'gfgh', '2019-06-07', '2019-08-09', '2019-04-03', 2, 0, '002130', '9091', '1', 'Closed Bid', '1', 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:50:44', '2019-02-20 12:50:44', 0, 5, NULL),
(12, 35, 32, 'ven1011@yahoo.com', 4, NULL, '0', '0', 'ttyz', 'gfgh', '2019-06-07', '2019-08-09', '2019-04-03', 2, 0, '002130', '9091', '1', 'Closed Bid', '1', 35, '2019-02-20-Rcyqr', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 12:50:44', '2019-02-20 12:50:44', 0, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_vendor_commerical`
--

CREATE TABLE `Ilab_master_bid_vendor_commerical` (
  `slno_vendor` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `approval_status` varchar(255) DEFAULT NULL,
  `submission_status` varchar(255) DEFAULT NULL,
  `submission_count` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `query_end_date` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `view_status` int(11) NOT NULL DEFAULT '0',
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mode_bid` varchar(255) NOT NULL,
  `technical_bid_type` varchar(255) NOT NULL,
  `mr_slno` int(11) NOT NULL,
  `mr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_active` int(11) NOT NULL DEFAULT '0' COMMENT '0-bid is not active 1-bid is active 2-bid is close',
  `status_view` int(11) NOT NULL DEFAULT '5' COMMENT '5-not viewed 6-viewed 7-submitted',
  `negotiable_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_bid_vendor_commerical`
--

INSERT INTO `Ilab_master_bid_vendor_commerical` (`slno_vendor`, `bid_slno`, `buyer_slno`, `vendor_id`, `status`, `approval_status`, `submission_status`, `submission_count`, `title`, `description`, `date_start`, `date_end`, `query_end_date`, `master_bid_id`, `view_status`, `bid_ref`, `bid_id`, `category`, `mode_bid`, `technical_bid_type`, `mr_slno`, `mr_no`, `job_code`, `edit_id`, `material_category_name`, `date_entry`, `date_update`, `status_active`, `status_view`, `negotiable_date`) VALUES
(1, 1, 1, 'vender@ilab.com', 1, NULL, NULL, '0', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 5, ''),
(2, 1, 1, 'ven111@gmail.com', 1, NULL, NULL, '0', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 5, ''),
(3, 1, 1, 'ven121@gmail.com', 1, NULL, '1', '1', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 7, '01/30/2019 4:53 PM'),
(4, 1, 1, 'ven221@gmail.com', 1, NULL, NULL, '0', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 5, ''),
(5, 1, 1, 'ven310@yahoo.com', 1, NULL, '1', '1', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 7, '01/30/2019 4:53 PM'),
(6, 1, 1, 'ven90@gmail.com', 1, NULL, NULL, '0', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 5, ''),
(7, 1, 1, 'ven66@gmail.com', 1, NULL, '1', '1', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 7, '01/30/2019 4:53 PM'),
(8, 1, 1, 'ven371@yahoo.com', 1, NULL, '1', '1', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 8, '01/30/2019 4:53 PM'),
(9, 1, 1, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 5, ''),
(10, 1, 1, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'xtxx', 'ttt', '2019-02-01', '2019-04-10', '2019-03-13', 1, 0, '1233', '7890', '1', 'Simple Bid', '2', 1, '2019-01-28-AVfzI', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:34:34', '2019-02-20 11:39:30', 6, 5, ''),
(11, 2, 2, 'vender@ilab.com', 1, NULL, NULL, '0', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:38', '2019-02-20 11:39:30', 6, 5, ''),
(12, 2, 2, 'ven121@gmail.com', 1, NULL, '1', '1', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:38', '2019-02-20 11:39:30', 6, 7, '01/30/2019 5:37 PM'),
(13, 2, 2, 'ven221@gmail.com', 1, NULL, NULL, '0', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 5, ''),
(14, 2, 2, 'ven310@yahoo.com', 1, NULL, '1', '1', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 7, ''),
(15, 2, 2, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 5, ''),
(16, 2, 2, 'ven331@gmail.com', 1, NULL, NULL, '0', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 5, ''),
(17, 2, 2, 'ven97@gmail.com', 1, NULL, '1', '1', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 7, '01/30/2019 5:37 PM'),
(18, 2, 2, 'ven979@yahoo.com', 1, NULL, '1', '1', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 7, '01/30/2019 5:37 PM'),
(19, 2, 2, 'ven90@gmail.com', 1, NULL, NULL, '0', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 5, ''),
(20, 2, 2, 'ven66@gmail.com', 1, NULL, '1', '1', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 7, ''),
(21, 2, 2, 'ven371@yahoo.com', 1, NULL, '1', '1', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 8, '01/30/2019 5:37 PM'),
(22, 2, 2, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'ttgh', 'xxxtt', '2019-05-07', '2019-07-23', '2019-07-23', 2, 0, '570', '9988', '1', 'Simple Bid', '2', 2, '2019-01-28-gLFf8', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-28 07:41:39', '2019-02-20 11:39:30', 6, 5, ''),
(23, 4, 3, 'vender@ilab.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:57', '2019-02-20 11:39:30', 6, 5, ''),
(24, 4, 3, 'ven111@gmail.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:57', '2019-02-20 11:39:30', 6, 5, ''),
(25, 4, 3, 'ven121@gmail.com', 1, NULL, '1', '1', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 7, '01/28/2019 8:18 PM'),
(26, 4, 3, 'ven221@gmail.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 5, ''),
(27, 4, 3, 'ven001@gmail.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 5, ''),
(28, 4, 3, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 5, ''),
(29, 4, 3, 'ven331@gmail.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 5, ''),
(30, 4, 3, 'ven97@gmail.com', 1, NULL, '1', '1', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 7, ''),
(31, 4, 3, 'ven979@yahoo.com', 1, NULL, '1', '1', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 7, ''),
(32, 4, 3, 'ven66@gmail.com', 1, NULL, '1', '1', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 7, ''),
(33, 4, 3, 'ven371@yahoo.com', 1, NULL, '1', '1', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 7, ''),
(34, 4, 3, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'xxx', 'xcfd', '2019-02-06', '2019-06-12', '2019-03-07', 3, 0, '1112', '22330', '2', 'Simple Bid', '2', 4, '2019-01-28-Svtup', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:37:58', '2019-02-20 11:39:30', 6, 5, ''),
(35, 5, 4, 'vender@ilab.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(36, 5, 4, 'ven111@gmail.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(37, 5, 4, 'ven121@gmail.com', 1, NULL, '1', '1', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 13:24:38', 1, 7, '01/29/2019 6:49 PM'),
(38, 5, 4, 'ven221@gmail.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(39, 5, 4, 'ven001@gmail.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(40, 5, 4, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(41, 5, 4, 'ven331@gmail.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(42, 5, 4, 'ven97@gmail.com', 1, NULL, '1', '1', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 13:22:00', 1, 8, '01/29/2019 6:49 PM'),
(43, 5, 4, 'ven979@yahoo.com', 1, NULL, '1', '1', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 13:29:14', 1, 7, '01/29/2019 6:49 PM'),
(44, 5, 4, 'ven66@gmail.com', 1, NULL, '1', '1', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 13:22:00', 1, 8, '01/29/2019 6:49 PM'),
(45, 5, 4, 'ven371@yahoo.com', 1, NULL, '1', '1', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 13:22:00', 1, 8, '01/29/2019 6:49 PM'),
(46, 5, 4, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'fgc', 'gvnht', '2019-02-06', '2019-04-09', '2019-02-13', 4, 0, '141', '3322', '2', 'Simple Bid', '2', 5, '2019-01-28-7aRzP', '0770', 1, 'make to order items [ moi ]', '2019-01-28 14:42:17', '2019-01-29 12:05:42', 1, 5, ''),
(47, 6, 5, 'ven111@gmail.com', 1, NULL, NULL, '0', 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '2019-01-27', '2019-01-31', '2019-01-29', 5, 0, '234', '421', '3', 'Simple Bid', '2', 6, '2019-01-28-lXMjU', '0770', 1, 'logistics [ logistics ]', '2019-01-28 14:44:01', '2019-02-20 11:39:30', 6, 5, ''),
(48, 6, 5, 'ven121@gmail.com', 1, NULL, '1', '1', 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '2019-01-27', '2019-01-31', '2019-01-29', 5, 0, '234', '421', '3', 'Simple Bid', '2', 6, '2019-01-28-lXMjU', '0770', 1, 'logistics [ logistics ]', '2019-01-28 14:44:01', '2019-02-20 11:39:30', 6, 7, ''),
(49, 6, 5, 'ven221@gmail.com', 1, NULL, NULL, '0', 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '2019-01-27', '2019-01-31', '2019-01-29', 5, 0, '234', '421', '3', 'Simple Bid', '2', 6, '2019-01-28-lXMjU', '0770', 1, 'logistics [ logistics ]', '2019-01-28 14:44:01', '2019-02-20 11:39:30', 6, 5, ''),
(50, 6, 5, 'ven331@gmail.com', 1, NULL, NULL, '0', 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '2019-01-27', '2019-01-31', '2019-01-29', 5, 0, '234', '421', '3', 'Simple Bid', '2', 6, '2019-01-28-lXMjU', '0770', 1, 'logistics [ logistics ]', '2019-01-28 14:44:01', '2019-02-20 11:39:30', 6, 5, ''),
(51, 6, 5, 'ven97@gmail.com', 1, NULL, '1', '1', 'Real-time trade and investing ideas on Alphabet Inc. ', 'Settings Your data in Search Help Send feedback. AllImages · Account · Assistant · Search · Maps · YouTube · Play · News · Gmail · Contacts · Drive · Calendar.\r\n', '2019-01-27', '2019-01-31', '2019-01-29', 5, 0, '234', '421', '3', 'Simple Bid', '2', 6, '2019-01-28-lXMjU', '0770', 1, 'logistics [ logistics ]', '2019-01-28 14:44:01', '2019-02-20 11:39:30', 6, 7, ''),
(52, 7, 7, 'vender@ilab.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(53, 7, 7, 'ven111@gmail.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(54, 7, 7, 'ven121@gmail.com', 1, NULL, '1', '1', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 7, ''),
(55, 7, 7, 'ven221@gmail.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(56, 7, 7, 'ven001@gmail.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(57, 7, 7, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(58, 7, 7, 'ven331@gmail.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(59, 7, 7, 'ven97@gmail.com', 1, NULL, '1', '1', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 7, ''),
(60, 7, 7, 'ven979@yahoo.com', 1, NULL, '1', '1', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 7, ''),
(61, 7, 7, 'ven66@gmail.com', 1, NULL, '1', '1', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 7, ''),
(62, 7, 7, 'ven371@yahoo.com', 1, NULL, '1', '1', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 7, ''),
(63, 7, 7, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'xxtxcv', 'suvc', '2019-05-07', '2019-08-14', '2019-06-12', 6, 0, '2300', '2120', '2', 'Simple Bid', '2', 7, '2019-01-29-SifCO', '0770', 1, 'make to order items [ moi ]', '2019-01-29 12:04:52', '2019-02-20 11:39:30', 6, 5, ''),
(64, 8, 6, 'ven111@gmail.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:16', '2019-01-30 06:35:09', 1, 5, ''),
(65, 8, 6, 'ven121@gmail.com', 1, NULL, '1', '1', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:16', '2019-01-30 06:54:09', 1, 7, '01/30/2019 12:13 PM'),
(66, 8, 6, 'ven221@gmail.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:16', '2019-01-30 06:35:09', 1, 5, ''),
(67, 8, 6, 'ven001@gmail.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:16', '2019-01-30 06:35:09', 1, 5, ''),
(68, 8, 6, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:17', '2019-01-30 06:35:09', 1, 5, ''),
(69, 8, 6, 'ven331@gmail.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:17', '2019-01-30 06:35:09', 1, 5, ''),
(70, 8, 6, 'ven90@gmail.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:17', '2019-01-30 06:35:09', 1, 5, ''),
(71, 8, 6, 'ven66@gmail.com', 1, NULL, '1', '1', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:17', '2019-01-31 12:04:18', 1, 7, ''),
(72, 8, 6, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'ttccyy', 'ttjj', '2019-03-07', '2019-03-07', '2019-03-08', 7, 0, '12330', '55220', '3', 'Closed Bid', '2', 8, '2019-01-29-N6T0Z', '0770', 1, 'logistics [ logistics ]', '2019-01-30 06:34:17', '2019-01-30 06:35:09', 1, 5, ''),
(73, 14, 10, 'ven111@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(74, 14, 10, 'ven121@gmail.com', 1, NULL, '1', '1', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-02-20 10:09:31', 1, 8, '03/09/2019 3:39 PM'),
(75, 14, 10, 'ven221@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(76, 14, 10, 'ven001@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(77, 14, 10, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(78, 14, 10, 'ven331@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(79, 14, 10, 'ven97@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(80, 14, 10, 'ven90@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(81, 14, 10, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(82, 14, 10, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(83, 14, 10, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'xccttc', '2019-03-06', '2019-06-12', '2019-04-02', 8, 0, '2121', '1221', '3', 'Closed Bid', '2', 14, '2019-01-30-SbxgW', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:19:36', '2019-01-30 07:27:58', 1, 5, ''),
(84, 12, 8, 'ven111@gmail.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(85, 12, 8, 'ven121@gmail.com', 1, NULL, '1', '1', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 7, ''),
(86, 12, 8, 'ven221@gmail.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(87, 12, 8, 'ven001@gmail.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(88, 12, 8, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(89, 12, 8, 'ven331@gmail.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(90, 12, 8, 'ven90@gmail.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(91, 12, 8, 'ven66@gmail.com', 1, NULL, '1', '1', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 7, ''),
(92, 12, 8, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(93, 12, 8, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(94, 12, 8, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'thfv', 'fvgb', '2019-02-07', '2019-03-18', '2019-03-26', 9, 0, '7709', '7760', '3', 'Closed Bid', '2', 12, '2019-01-30-bxvqL', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:23:35', '2019-02-20 11:39:30', 6, 5, ''),
(95, 13, 9, 'ven111@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(96, 13, 9, 'ven121@gmail.com', 1, NULL, '1', '1', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 7, ''),
(97, 13, 9, 'ven221@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(98, 13, 9, 'ven001@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(99, 13, 9, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(100, 13, 9, 'ven331@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(101, 13, 9, 'ven97@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(102, 13, 9, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(103, 13, 9, 'ven90@gmail.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(104, 13, 9, 'ven66@gmail.com', 1, NULL, '1', '1', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 7, ''),
(105, 13, 9, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(106, 13, 9, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(107, 13, 9, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'ttyy', 'fgvgb', '2019-02-12', '2019-02-15', '2019-02-14', 10, 0, '3320', '2230', '3', 'Closed Bid', '2', 13, '2019-01-30-OBqz3', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:27:45', '2019-02-20 11:39:30', 6, 5, ''),
(108, 11, 11, 'ven111@gmail.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:32', '2019-02-20 11:39:30', 6, 5, ''),
(109, 11, 11, 'ven121@gmail.com', 1, NULL, '1', '1', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:32', '2019-02-20 11:39:30', 6, 7, '01/31/2019 4:09 PM'),
(110, 11, 11, 'ven221@gmail.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:32', '2019-02-20 11:39:30', 6, 5, ''),
(111, 11, 11, 'ven001@gmail.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:32', '2019-02-20 11:39:30', 6, 5, ''),
(112, 11, 11, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:32', '2019-02-20 11:39:30', 6, 5, ''),
(113, 11, 11, 'ven331@gmail.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:32', '2019-02-20 11:39:30', 6, 5, ''),
(114, 11, 11, 'ven97@gmail.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 5, ''),
(115, 11, 11, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 5, ''),
(116, 11, 11, 'ven90@gmail.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 5, ''),
(117, 11, 11, 'ven66@gmail.com', 1, NULL, '1', '1', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 7, ''),
(118, 11, 11, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 5, ''),
(119, 11, 11, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 5, ''),
(120, 11, 11, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'gfvb', 'gjyvbg', '2019-02-20', '2019-02-28', '2019-03-18', 11, 0, '212100', '770060', '3', 'Simple Bid', '2', 11, '2019-01-30-7d9hK', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:55:33', '2019-02-20 11:39:30', 6, 5, ''),
(121, 10, 12, 'ven111@gmail.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(122, 10, 12, 'ven121@gmail.com', 1, NULL, '1', '1', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 7, '01/30/2019 1:39 PM'),
(123, 10, 12, 'ven221@gmail.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(124, 10, 12, 'ven001@gmail.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(125, 10, 12, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(126, 10, 12, 'ven331@gmail.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(127, 10, 12, 'ven97@gmail.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(128, 10, 12, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(129, 10, 12, 'ven90@gmail.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(130, 10, 12, 'ven66@gmail.com', 1, NULL, '1', '1', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 7, ''),
(131, 10, 12, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(132, 10, 12, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(133, 10, 12, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'gfb', 'vhg', '2019-02-15', '2019-05-22', '2019-04-24', 12, 0, '5670', '877776', '3', 'Simple Bid', '2', 10, '2019-01-30-vdRzf', '0770', 1, 'logistics [ logistics ]', '2019-01-30 07:59:34', '2019-02-20 11:39:30', 6, 5, ''),
(134, 16, 15, 'ven111@gmail.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:39', '2019-02-20 11:39:30', 6, 5, ''),
(135, 16, 15, 'ven121@gmail.com', 1, NULL, '1', '1', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:39', '2019-02-20 11:39:30', 6, 7, '01/31/2019 12:00 PM'),
(136, 16, 15, 'ven221@gmail.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:39', '2019-02-20 11:39:30', 6, 5, ''),
(137, 16, 15, 'ven001@gmail.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:39', '2019-02-20 11:39:30', 6, 5, ''),
(138, 16, 15, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(139, 16, 15, 'ven331@gmail.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(140, 16, 15, 'ven97@gmail.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(141, 16, 15, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(142, 16, 15, 'ven90@gmail.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(143, 16, 15, 'ven66@gmail.com', 1, NULL, '1', '1', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 7, ''),
(144, 16, 15, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(145, 16, 15, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(146, 16, 15, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'yhu', 'jubh', '2019-05-08', '2019-07-31', '2019-05-16', 13, 0, '8790', '7781', '3', 'Simple Bid', '2', 16, '2019-01-31-iMcvQ', '0770', 1, 'logistics [ logistics ]', '2019-01-31 06:03:40', '2019-02-20 11:39:30', 6, 5, ''),
(147, 18, 17, 'ven111@gmail.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:04', '2019-02-20 11:39:30', 6, 5, ''),
(148, 18, 17, 'ven121@gmail.com', 1, NULL, '1', '1', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:04', '2019-02-20 11:39:30', 6, 7, '01/31/2019 12:46 PM'),
(149, 18, 17, 'ven221@gmail.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:04', '2019-02-20 11:39:30', 6, 5, ''),
(150, 18, 17, 'ven001@gmail.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:04', '2019-02-20 11:39:30', 6, 5, ''),
(151, 18, 17, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(152, 18, 17, 'ven331@gmail.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(153, 18, 17, 'ven97@gmail.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(154, 18, 17, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(155, 18, 17, 'ven90@gmail.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(156, 18, 17, 'ven66@gmail.com', 1, NULL, '1', '1', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 7, ''),
(157, 18, 17, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(158, 18, 17, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(159, 18, 17, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'kjiou', 'fvgb', '2019-02-15', '2019-02-28', '2019-03-27', 14, 0, '0078', '9908', '3', 'Simple Bid', '2', 18, '2019-01-31-1YbXh', '0770', 1, 'logistics [ logistics ]', '2019-01-31 07:01:05', '2019-02-20 11:39:30', 6, 5, ''),
(160, 19, 20, 'ven111@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(161, 19, 20, 'ven121@gmail.com', 1, NULL, '1', '1', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 13:03:38', 1, 7, ''),
(162, 19, 20, 'ven221@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(163, 19, 20, 'ven001@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(164, 19, 20, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(165, 19, 20, 'ven331@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(166, 19, 20, 'ven97@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(167, 19, 20, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(168, 19, 20, 'ven90@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(169, 19, 20, 'ven66@gmail.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 12:20:17', 1, 6, ''),
(170, 19, 20, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(171, 19, 20, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(172, 19, 20, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'hgityy', 'jhuhjghg', '2019-03-12', '2019-03-27', '2019-03-19', 15, 0, '600', '750', '3', 'Rank Order Bid', '2', 19, '2019-01-31-f6Mac', '0770', 1, 'logistics [ logistics ]', '2019-01-31 11:43:08', '2019-01-31 11:43:22', 1, 5, ''),
(173, 25, 27, 'vender@ilab.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, '');
INSERT INTO `Ilab_master_bid_vendor_commerical` (`slno_vendor`, `bid_slno`, `buyer_slno`, `vendor_id`, `status`, `approval_status`, `submission_status`, `submission_count`, `title`, `description`, `date_start`, `date_end`, `query_end_date`, `master_bid_id`, `view_status`, `bid_ref`, `bid_id`, `category`, `mode_bid`, `technical_bid_type`, `mr_slno`, `mr_no`, `job_code`, `edit_id`, `material_category_name`, `date_entry`, `date_update`, `status_active`, `status_view`, `negotiable_date`) VALUES
(174, 25, 27, 'ven111@gmail.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(175, 25, 27, 'ven121@gmail.com', 1, NULL, '1', '1', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:43:58', 1, 7, ''),
(176, 25, 27, 'ven221@gmail.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(177, 25, 27, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(178, 25, 27, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(179, 25, 27, 'ven331@gmail.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(180, 25, 27, 'ven97@gmail.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(181, 25, 27, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(182, 25, 27, 'ven90@gmail.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(183, 25, 27, 'ven66@gmail.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(184, 25, 27, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(185, 25, 27, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(186, 25, 27, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'gftk', 'juyg', '2019-03-20', '2019-03-26', '2019-03-29', 16, 0, '670', '770', '1', 'Rank Order Bid', '2', 25, '2019-01-31-SpwWK', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 12:42:13', '2019-01-31 12:42:28', 1, 5, ''),
(187, 28, 28, 'vender@ilab.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(188, 28, 28, 'ven111@gmail.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(189, 28, 28, 'ven121@gmail.com', 1, NULL, '1', '1', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:03:47', 1, 7, ''),
(190, 28, 28, 'ven221@gmail.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(191, 28, 28, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(192, 28, 28, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(193, 28, 28, 'ven331@gmail.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(194, 28, 28, 'ven97@gmail.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(195, 28, 28, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(196, 28, 28, 'ven90@gmail.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(197, 28, 28, 'ven66@gmail.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:26', '2019-01-31 13:00:43', 1, 5, ''),
(198, 28, 28, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:27', '2019-01-31 13:00:43', 1, 5, ''),
(199, 28, 28, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:27', '2019-01-31 13:00:43', 1, 5, ''),
(200, 28, 28, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'huju', 'jhub', '2019-03-07', '2019-03-25', '2019-03-21', 17, 0, '99', '09', '1', 'Rank Order Bid', '2', 28, '2019-01-31-JFCTV', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:00:27', '2019-01-31 13:00:43', 1, 5, ''),
(201, 26, 26, 'vender@ilab.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:05', '2019-01-31 14:07:10', 1, 5, ''),
(202, 26, 26, 'ven111@gmail.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:05', '2019-01-31 14:07:10', 1, 5, ''),
(203, 26, 26, 'ven121@gmail.com', 1, NULL, '1', '1', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:05', '2019-01-31 14:27:17', 1, 7, ''),
(204, 26, 26, 'ven221@gmail.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:05', '2019-01-31 14:07:10', 1, 5, ''),
(205, 26, 26, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:05', '2019-01-31 14:07:10', 1, 5, ''),
(206, 26, 26, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:05', '2019-01-31 14:07:10', 1, 5, ''),
(207, 26, 26, 'ven331@gmail.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(208, 26, 26, 'ven97@gmail.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(209, 26, 26, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(210, 26, 26, 'ven90@gmail.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(211, 26, 26, 'ven66@gmail.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(212, 26, 26, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(213, 26, 26, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(214, 26, 26, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'hujk', 'dffffffffc', '2019-03-13', '2019-03-27', '2019-03-26', 18, 0, '8700', '9990', '1', 'Rank Order Bid', '2', 26, '2019-01-31-dpHBA', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 13:58:06', '2019-01-31 14:07:10', 1, 5, ''),
(215, 29, 29, 'vender@ilab.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:29', '2019-01-31 14:07:24', 1, 5, ''),
(216, 29, 29, 'ven111@gmail.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(217, 29, 29, 'ven121@gmail.com', 1, NULL, '1', '1', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:26:02', 1, 7, ''),
(218, 29, 29, 'ven221@gmail.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(219, 29, 29, 'ven310@yahoo.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(220, 29, 29, 'ven1011@yahoo.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(221, 29, 29, 'ven331@gmail.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(222, 29, 29, 'ven97@gmail.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(223, 29, 29, 'ven979@yahoo.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(224, 29, 29, 'ven90@gmail.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(225, 29, 29, 'ven66@gmail.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(226, 29, 29, 'ven371@yahoo.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(227, 29, 29, 'ven170@yahoo.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(228, 29, 29, 'ven454@yahoo.com', 1, NULL, NULL, '0', 'frtg', 'gbyjh', '2019-02-15', '2019-02-23', '2019-02-20', 19, 0, '2340', '46709', '1', 'Rank Order Bid', '2', 29, '2019-01-31-sv7C4', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:06:30', '2019-01-31 14:07:24', 1, 5, ''),
(229, 3, 0, 'vender@ilab.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(230, 3, 0, 'ven111@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(231, 3, 0, 'ven121@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(232, 3, 0, 'ven221@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(233, 3, 0, 'ven310@yahoo.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(234, 3, 0, 'ven1011@yahoo.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(235, 3, 0, 'ven331@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(236, 3, 0, 'ven97@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(237, 3, 0, 'ven979@yahoo.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(238, 3, 0, 'ven90@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(239, 3, 0, 'ven66@gmail.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(240, 3, 0, 'ven371@yahoo.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(241, 3, 0, 'ven170@yahoo.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(242, 3, 0, 'ven454@yahoo.com', 4, NULL, NULL, '0', 'tvyh', 'fgbrt', '2019-02-18', '2019-03-16', '2019-02-28', 20, 0, '7001', '6701', '1', 'Closed Bid', '2', 3, '2019-01-28-rIxGm', '0770', 1, 'standard catalogued item [ sci tech ]', '2019-01-31 14:19:32', '2019-01-31 14:19:32', 0, 5, ''),
(243, 33, 31, 'vender@ilab.com', 4, NULL, NULL, '0', 'tty', 'stx', '2019-03-21', '2019-03-28', '2019-03-21', 21, 0, '150', '7700', '1', 'Closed Bid', '2', 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 09:18:44', '2019-02-20 09:18:44', 0, 5, ''),
(244, 33, 31, 'ven111@gmail.com', 4, NULL, NULL, '0', 'tty', 'stx', '2019-03-21', '2019-03-28', '2019-03-21', 21, 0, '150', '7700', '1', 'Closed Bid', '2', 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 09:18:44', '2019-02-20 09:18:44', 0, 5, ''),
(245, 33, 31, 'ven121@gmail.com', 4, NULL, NULL, '0', 'tty', 'stx', '2019-03-21', '2019-03-28', '2019-03-21', 21, 0, '150', '7700', '1', 'Closed Bid', '2', 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 09:18:44', '2019-02-20 09:18:44', 0, 5, ''),
(246, 33, 31, 'ven221@gmail.com', 4, NULL, NULL, '0', 'tty', 'stx', '2019-03-21', '2019-03-28', '2019-03-21', 21, 0, '150', '7700', '1', 'Closed Bid', '2', 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 09:18:44', '2019-02-20 09:18:44', 0, 5, ''),
(247, 33, 31, 'ven310@yahoo.com', 4, NULL, NULL, '0', 'tty', 'stx', '2019-03-21', '2019-03-28', '2019-03-21', 21, 0, '150', '7700', '1', 'Closed Bid', '2', 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 09:18:44', '2019-02-20 09:18:44', 0, 5, ''),
(248, 33, 31, 'ven1011@yahoo.com', 4, NULL, NULL, '0', 'tty', 'stx', '2019-03-21', '2019-03-28', '2019-03-21', 21, 0, '150', '7700', '1', 'Closed Bid', '2', 33, '2019-02-20-zJmFa', '0770', 1, 'standard catalogued item [ SCI ]', '2019-02-20 09:18:44', '2019-02-20 09:18:44', 0, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_vendor_file_details`
--

CREATE TABLE `Ilab_master_bid_vendor_file_details` (
  `slno_document` int(11) NOT NULL,
  `bid_sl no` int(11) NOT NULL,
  `buyer_sl no` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_idname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vendor_slno` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_bid_vendor_m`
--

CREATE TABLE `Ilab_master_bid_vendor_m` (
  `slno_vendor` int(11) NOT NULL,
  `bid_slno` int(11) NOT NULL,
  `buyer_slno` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `approval_status` varchar(255) DEFAULT NULL,
  `submission_status` varchar(255) DEFAULT '0',
  `submission_count` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `query_end_date` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `view_status_approve` int(11) NOT NULL DEFAULT '0',
  `bid_ref` varchar(255) NOT NULL,
  `bid_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mode_bid` varchar(255) NOT NULL,
  `technical_bid_type` varchar(255) NOT NULL,
  `pr_slno` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_active` int(11) NOT NULL DEFAULT '0' COMMENT '0-bid is not active 1-bid is active 2-bid is close',
  `status_view` int(11) NOT NULL DEFAULT '5' COMMENT '5-not viewed 6-viewed 7-submitted 8-> resubmission',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_buyer_material_details`
--

CREATE TABLE `Ilab_master_buyer_material_details` (
  `slno_mat` int(11) NOT NULL,
  `slno_mr_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_uom` varchar(255) NOT NULL,
  `tech_name` text NOT NULL,
  `item_qnt` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_buyer_material_details`
--

INSERT INTO `Ilab_master_buyer_material_details` (`slno_mat`, `slno_mr_id`, `item_name`, `item_id`, `item_uom`, `tech_name`, `item_qnt`, `unit_price`, `master_bid_id`) VALUES
(1, 1, 'material item 1', 'mat001', 'nos', '[\"tech34311\"]', '1', '5500', 1),
(2, 2, 'material item 17', 'mat0087', 'nos', '[\"technical 1\",\"technical 1667\"]', '1', '2200', 1),
(3, 3, 'material item 19', 'mat0018', 'nos', '[\"ABCD 3333\"]', '1', '1250', 1),
(4, 4, 'material10', '10', '21', '[\"tec10\",\"67tyu\",\"BNTRY\",\"tech454\"]', '1', '3450', 1),
(5, 5, 'material item 1', 'mat001', 'nos', '[\"tech34311\"]', '1', '5670', 2),
(6, 6, 'material item 17', 'mat0087', 'nos', '[\"technical 1\",\"technical 1667\"]', '1', '2340', 2),
(7, 7, 'material item 19', 'mat0018', 'nos', '[\"ABCD 3333\"]', '1', '3350', 2),
(8, 8, 'material10', '10', '21', '[\"tec10\",\"67tyu\",\"BNTRY\",\"tech454\"]', '1', '1213', 2),
(9, 13, 'material item 22', 'mat00910', 'nos', '[\"No Parameter Found\"]', '1', '123', 3),
(10, 14, 'Progressing cavity pump.', 'Mat003', 'Capacity', '[\"No Parameter Found\"]', '1', '300', 3),
(11, 15, 'Pump', 'Mat001', 'Horse Power', '[\"tec10\"]', '1', '340', 3),
(12, 16, 'material item 22', 'mat00910', 'nos', '[\"No Parameter Found\"]', '1', '786', 4),
(13, 17, 'Progressing cavity pump.', 'Mat003', 'Capacity', '[\"No Parameter Found\"]', '1', '550', 4),
(14, 18, 'material item 22', 'mat00910', 'nos', '[\"No Parameter Found\"]', '1', '2100', 6),
(15, 19, 'Progressing cavity pump.', 'Mat003', 'Capacity', '[\"No Parameter Found\"]', '1', '3400', 6),
(16, 20, 'Pump', 'Mat001', 'Horse Power', '[\"tec10\"]', '1', '2500', 6),
(17, 21, 'Rotary lobe pump', 'Mat002', 'Max Pump volume', '[\"No Parameter Found\"]', '1', '2100', 6),
(18, 26, 'material item 1', 'mat001', 'nos', '[\"No Parameter is been Selected\"]', '1', '4445', 16),
(19, 27, 'material item 17', 'mat0087', 'nos', '[\"No Parameter is been Selected\"]', '1', '5567', 16),
(20, 28, 'material item 19', 'mat0018', 'nos', '[\"No Parameter is been Selected\"]', '1', '7890', 16),
(21, 29, 'material10', '10', '21', '[\"No Parameter is been Selected\"]', '1', '6780', 16),
(22, 37, 'material item 1', 'mat001', 'nos', '[\"tech34311\"]', '1', '465', 17),
(23, 38, 'material item 17', 'mat0087', 'nos', '[\"technical 1\",\"technical 1667\"]', '1', '908', 17),
(24, 30, 'material item 1', 'mat001', 'nos', '[\"No Parameter is been Selected\"]', '1', '5667', 18),
(25, 31, 'material item 17', 'mat0087', 'nos', '[\"No Parameter is been Selected\"]', '1', '980', 18),
(26, 32, 'material item 19', 'mat0018', 'nos', '[\"No Parameter is been Selected\"]', '1', '455', 18),
(27, 33, 'material10', '10', '21', '[\"No Parameter is been Selected\"]', '1', '767', 18),
(28, 39, 'material item 1', 'mat001', 'nos', '[\"tech34311\"]', '1', '4540', 19),
(29, 40, 'material item 17', 'mat0087', 'nos', '[\"technical 1\",\"technical 1667\"]', '1', '6780', 19),
(30, 41, 'material item 19', 'mat0018', 'nos', '[\"ABCD 3333\"]', '1', '3450', 19),
(31, 42, 'material10', '10', '21', '[\"tec10\",\"67tyu\",\"BNTRY\",\"tech454\"]', '1', '6780', 19),
(32, 9, 'material item 1', 'mat001', 'nos', '[\"tech34311\"]', '1', '567', 20),
(33, 10, 'material item 17', 'mat0087', 'nos', '[\"technical 1\",\"technical 1667\"]', '1', '876', 20),
(34, 11, 'material item 19', 'mat0018', 'nos', '[\"ABCD 3333\"]', '1', '568', 20),
(35, 12, 'material10', '10', '21', '[\"tec10\",\"67tyu\",\"BNTRY\",\"tech454\"]', '1', '980', 20),
(36, 48, 'material item 1', 'mat001', 'nos', '[\"tech34311\"]', '1', '567', 21),
(37, 49, 'material item 17', 'mat0087', 'nos', '[\"technical 1\",\"technical 1667\"]', '1', '780', 21);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_buyer_MR`
--

CREATE TABLE `Ilab_master_buyer_MR` (
  `Slno_buyer` int(11) NOT NULL,
  `Mr_id` varchar(255) NOT NULL,
  `Slno_mr_id` int(11) NOT NULL,
  `Job_code` varchar(255) NOT NULL,
  `Slno_procurement_id` int(11) NOT NULL,
  `Buyer_id` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Technical_type` varchar(255) NOT NULL,
  `Edit_id` int(11) NOT NULL,
  `Technical_process_status` int(11) NOT NULL DEFAULT '0',
  `Commercial_process_status` int(11) NOT NULL DEFAULT '0',
  `Date_technical_status` date DEFAULT NULL,
  `Date_commercial__status` date DEFAULT NULL,
  `Mode_tender` varchar(255) NOT NULL DEFAULT '0',
  `date_receive` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `procurement_id` varchar(255) NOT NULL,
  `complete_status_bid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_buyer_MR`
--

INSERT INTO `Ilab_master_buyer_MR` (`Slno_buyer`, `Mr_id`, `Slno_mr_id`, `Job_code`, `Slno_procurement_id`, `Buyer_id`, `Status`, `Technical_type`, `Edit_id`, `Technical_process_status`, `Commercial_process_status`, `Date_technical_status`, `Date_commercial__status`, `Mode_tender`, `date_receive`, `procurement_id`, `complete_status_bid`) VALUES
(1, '2019-01-28-AVfzI', 1, '0770', 1, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-28', 'Simple Bid', '2019-01-28 07:28:21', 'pro@ilab.com', 1),
(2, '2019-01-28-gLFf8', 2, '0770', 2, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-28', 'Simple Bid', '2019-01-28 07:28:35', 'pro@ilab.com', 1),
(3, '2019-01-28-Svtup', 4, '0770', 3, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-28', 'Simple Bid', '2019-01-28 14:33:07', 'pro@ilab.com', 1),
(4, '2019-01-28-7aRzP', 5, '0770', 4, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-28', 'Simple Bid', '2019-01-28 14:33:19', 'pro@ilab.com', 0),
(5, '2019-01-28-lXMjU', 6, '0770', 5, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-28', 'Simple Bid', '2019-01-28 14:40:40', 'pro@ilab.com', 1),
(6, '2019-01-29-N6T0Z', 8, '0770', 7, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-30', 'Closed Bid', '2019-01-29 11:55:07', 'pro@ilab.com', 0),
(7, '2019-01-29-SifCO', 7, '0770', 6, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-29', 'Simple Bid', '2019-01-29 11:55:23', 'pro@ilab.com', 1),
(8, '2019-01-30-bxvqL', 12, '0770', 14, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-30', 'Closed Bid', '2019-01-30 07:13:47', 'pro@ilab.com', 1),
(9, '2019-01-30-OBqz3', 13, '0770', 13, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-30', 'Closed Bid', '2019-01-30 07:13:57', 'pro@ilab.com', 1),
(10, '2019-01-30-SbxgW', 14, '0770', 12, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-30', 'Closed Bid', '2019-01-30 07:14:09', 'pro@ilab.com', 0),
(11, '2019-01-30-7d9hK', 11, '0770', 11, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-30', 'Simple Bid', '2019-01-30 07:14:24', 'pro@ilab.com', 1),
(12, '2019-01-30-vdRzf', 10, '0770', 10, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-30', 'Simple Bid', '2019-01-30 07:14:35', 'pro@ilab.com', 1),
(13, '2019-01-30-wyV20', 9, '0770', 9, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-30 07:49:41', 'pro@ilab.com', 0),
(14, '2019-01-30-Jdm21', 15, '0770', 15, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-30 07:49:52', 'pro@ilab.com', 0),
(15, '2019-01-31-iMcvQ', 16, '0770', 16, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Simple Bid', '2019-01-31 05:58:54', 'pro@ilab.com', 1),
(16, '2019-01-31-yeSdN', 17, '0770', 18, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 06:55:43', 'pro@ilab.com', 0),
(17, '2019-01-31-1YbXh', 18, '0770', 17, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Simple Bid', '2019-01-31 06:55:56', 'pro@ilab.com', 1),
(18, '2019-01-31-zciFO', 20, '0770', 19, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 08:17:54', 'pro@ilab.com', 0),
(19, '2019-01-28-rIxGm', 3, '0770', 8, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 08:19:46', 'pro@ilab.com', 0),
(20, '2019-01-31-f6Mac', 19, '0770', 21, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Rank Order Bid', '2019-01-31 10:13:29', 'pro@ilab.com', 0),
(21, '2019-01-31-IWa5L', 21, '0770', 20, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 10:13:43', 'pro@ilab.com', 0),
(22, '2019-01-31-5sTxC', 22, '0770', 24, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 11:18:56', 'pro@ilab.com', 0),
(23, '2019-01-31-gvP7q', 23, '0770', 23, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 11:19:50', 'pro@ilab.com', 0),
(24, '2019-01-31-U7cF6', 24, '0770', 22, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 11:21:13', 'pro@ilab.com', 0),
(25, '2019-01-31-neULH', 27, '0770', 25, 'buy1@ilab.com', 1, '2', 1, 0, 0, NULL, NULL, '0', '2019-01-31 12:31:19', 'pro@ilab.com', 0),
(26, '2019-01-31-dpHBA', 26, '0770', 26, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Rank Order Bid', '2019-01-31 12:31:29', 'pro@ilab.com', 0),
(27, '2019-01-31-SpwWK', 25, '0770', 27, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Rank Order Bid', '2019-01-31 12:31:46', 'pro@ilab.com', 0),
(28, '2019-01-31-JFCTV', 28, '0770', 28, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Rank Order Bid', '2019-01-31 12:57:16', 'pro@ilab.com', 0),
(29, '2019-01-31-sv7C4', 29, '0770', 29, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-01-31', 'Rank Order Bid', '2019-01-31 14:02:15', 'pro@ilab.com', 0),
(30, '2019-02-01-kJV97', 30, '0770', 30, 'buy1@ilab.com', 1, '1', 1, 2, 0, '2019-02-20', NULL, 'Simple Bid', '2019-02-01 10:44:50', 'pro@ilab.com', 0),
(31, '2019-02-20-zJmFa', 33, '0770', 31, 'buy1@ilab.com', 1, '2', 1, 0, 2, NULL, '2019-02-20', 'Closed Bid', '2019-02-20 09:13:16', 'pro@ilab.com', 0),
(32, '2019-02-20-Rcyqr', 35, '0770', 32, 'buy1@ilab.com', 1, '1', 1, 2, 0, '2019-02-20', NULL, 'Closed Bid', '2019-02-20 12:17:41', 'pro@ilab.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_category`
--

CREATE TABLE `Ilab_master_category` (
  `Slno_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `short_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_category`
--

INSERT INTO `Ilab_master_category` (`Slno_cat`, `category_name`, `category_id`, `category_desc`, `short_code`, `status`, `date_entry`, `time_entry`) VALUES
(1, 'standard catalogued item', 'cat005', 'A cataloger is an individual responsible for the processes of description, subject analysis, classification, and authority control of library materials. Catalogers serve as the \"foundation of all library service, as they are the ones who organize information in such a way as to make it easily accessible\"', 'SCI', 1, '2018-09-18', '13:06:40'),
(2, 'make to order items', 'cat002', 'The make to order (MTO) strategy only manufactures the end product once the customer places the order, creating additional wait time for the consumer to receive the product, but allowing for more flexible customization compared to purchasing directly from retailers\' shelves.\r\n\r\nRead more: Make To Order (MTO) https://www.investopedia.com/terms/m/make-to-order.asp#ixzz5RS3c3b1d\r\nFollow us: Investopedia on Facebook', 'MOI', 1, '2018-09-18', '16:52:56'),
(3, 'logistics', 'cat003', 'Logistics is generally the detailed organization and implementation of a complex operation. In a general business sense, logistics is the management of the flow of things between the point of origin and the point of consumption in order to meet requirements of customers or corporations.', 'logistics', 1, '2018-09-18', '16:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_category_item`
--

CREATE TABLE `Ilab_master_category_item` (
  `slno_master_item` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `material_item_name` varchar(255) NOT NULL,
  `material_item_id` varchar(255) NOT NULL,
  `technical_details` text,
  `uom` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_id` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this table will handle all material and category';

--
-- Dumping data for table `Ilab_master_category_item`
--

INSERT INTO `Ilab_master_category_item` (`slno_master_item`, `category_name`, `material_item_name`, `material_item_id`, `technical_details`, `uom`, `status`, `entry_date`, `update_date`, `entry_id`, `date`) VALUES
(1, 'electrical', 'electric bulb 100watt', '4410', 'To improve the efficiency of the lamp, the filament usually consists of multiple coils of coiled fine wire, also known as a \'coiled coil\'. Light bulbs using coiled coil filaments are sometimes referred to as \'double-coil bulbs\'. For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'SET', 1, '2019-03-06 10:42:29', '2019-03-11 09:25:50', 'admin@ilab.com', '2019-03-06'),
(2, 'electrical', 'candle flame bulb 60 watt', '4411', '?35 mm (~?11/8\") candle-flame shape, ?12 mm Edison screw', 'No', 1, '2019-03-06 10:42:29', '2019-03-11 09:25:55', 'admin@ilab.com', '2019-03-06'),
(3, 'glass', 'fused silica glass', '4412', ' silica (SiO2) in vitreous, or glass, form (i.e., its molecules are disordered and random, without crystalline structure). It has very low thermal expansion, is very hard, and resists high temperatures (1000–1500 °C). It is also the most resistant against weathering (caused in other glasses by alkali ions leaching out of the glass, while staining it). Fused quartz is used for high-temperature applications such as furnace tubes, lighting tubes, melting crucibles, etc.', 'Set', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:07', 'admin@ilab.com', '2019-03-06'),
(4, 'glass', 'fiber glass', '4413', 'Fiberglass filaments are made through a pultrusion process in which the raw materials (sand, limestone, kaolin clay, fluorspar, colemanite, dolomite and other minerals) are melted in a large furnace into a liquid which is extruded through very small orifices (5–25 micrometres in diameter if the glass is E-glass and 9 micrometers if the glass is S-glass).', 'Set', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:14', 'admin@ilab.com', '2019-03-06'),
(5, 'Glass', 'fused silica glass', '4414', ' silica (SiO2) in vitreous, or glass, form (i.e., its molecules are disordered and random, without crystalline structure). It has very low thermal expansion, is very hard, and resists high temperatures (1000–1500 °C). It is also the most resistant against weathering (caused in other glasses by alkali ions leaching out of the glass, while staining it). Fused quartz is used for high-temperature applications such as furnace tubes, lighting tubes, melting crucibles, etc.', 'Na', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:20', 'admin@ilab.com', '2019-03-06'),
(6, 'computer', 'computer', '4415', 'DDR3 ram 4GB,HDD,Core duo-processor ', 'No', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:29', 'admin@ilab.com', '2019-03-06'),
(7, 'polymers', 'chloropolymer', '4416', 'Chloropolymers are macromolecules synthesized from alkenes in which one or more hydrogens of the polymer were replaced by chlorine. A common example of a chloropolymer is Polyvinyl chloride (PVC) and Poly(dichlorophosphazene) which has a polymer formula of (PNCl2)n, the precursor of which is Hexachlorophosphazene, which itself has been called chloropolymer.', '--', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:40', 'admin@ilab.com', '2019-03-06'),
(8, 'polymers', 'biopolymer', '4417', ' long polymers composed of 13 or more nucleotide monomers; polypeptides, which are short polymers of amino acids; and polysaccharides, which are often linear bonded polymeric carbohydrate structures. Other examples of biopolymers include rubber, suberin, melanin and lignin.\n\nIUPAC definition\nSubstance composed of one type of biomacromolecules.\nNote 1: Modified from the definition given in ref. in order\nto avoid confusion between polymer and macromolecule in\nthe fields of proteins, polysaccharides, polynucleotides, and bacterial\naliphatic polyesters.\n\nNote 2: The use of the term “biomacromolecule” is recommended\nwhen molecular characteristics are considered.\nCellulose is the most common organic compound and biopolymer on Earth. About 33 percent of all plant matter is cellulose. The cellulose content of cotton is 90 percent, for wood it is 50 percent.', '--', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:45', 'admin@ilab.com', '2019-03-06'),
(9, 'polymers', 'aquamelt', '4418', 'They are unique in being able to “lock in” work applied to them through an alteration in hydrogen bonding, which enables them to be processed with approximately 1000 times less energy than standard polymers.This has been recently shown for an archetypal biopolymer, silk, however the mechanism for solidification is thought to be inherent to many other biological materials.', '1', 1, '2019-03-06 10:42:29', '2019-03-06 10:42:29', 'admin@ilab.com', '2019-03-06'),
(10, 'nanomaterials', '1-D nano', '4419', 'The smallest possible crystalline wires with cross-section as small as a single atom can be engineered in cylindrical confinement. Carbon nanotubes, a natural semi-1D nanostructure, can be used as a template for synthesis. Confinement provides mechanical stabilization and prevents linear atomic chains from disintegration; other structures of 1D nanowires are predicted to be mechanically stable even upon isolation from the templates.\n\n', '--', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:50', 'admin@ilab.com', '2019-03-06'),
(11, 'nanomaterials', '2-D nano', '4420', '2D materials are crystalline materials consisting of a two-dimensional single layer of atoms. The most important representative graphene was discovered in 2004. Thin films with nanoscale thicknesses are considered nanostructures, but are sometimes not considered nanomaterials because they do not exist separately from the substrate.', 'set', 1, '2019-03-06 10:42:29', '2019-03-11 09:26:54', 'admin@ilab.com', '2019-03-06'),
(12, 'nanomaterials', 'bulknanostructured material', '4421', 'Box-shaped graphene (BSG) nanostructure is an example of 3D nanomaterial.[36] BSG nanostructure has appeared after mechanical cleavage of pyrolytic graphite. This nanostructure is a multilayer system of parallel hollow nanochannels located along the surface and having quadrangular cross-section. The thickness of the channel walls is approximately equal to 1 nm. The typical width of channel facets makes about 25 nm.', 'No', 1, '2019-03-06 10:42:29', '2019-03-11 09:27:17', 'admin@ilab.com', '2019-03-06'),
(13, 'semiconductors', 'Wind-bandgap', '4422', 'bandgap in the range of 1 - 1.5 electronvolt (eV), whereas wide-bandgap materials have bandgaps in the range of 2 - 4 eV.', 'No', 1, '2019-03-06 10:42:29', '2019-03-11 09:27:26', 'admin@ilab.com', '2019-03-06'),
(14, 'semiconductors', 'amorphous', '4423', 'ome materials, when rapidly cooled to a glassy amorphous state, have semiconducting properties. These include B, Si, Ge, Se, Te and there are multiple theories to explain them.', '1', 1, '2019-03-06 10:42:29', '2019-03-06 10:42:29', 'admin@ilab.com', '2019-03-06'),
(15, 'electrical', 'electric bulb 60 watt', '4424', ' For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', '1', 1, '2019-03-06 10:42:29', '2019-03-06 10:42:29', 'admin@ilab.com', '2019-03-06'),
(16, 'electrical ', 'led bulb 100 watt', '4425', ' For a 100-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'set', 1, '2019-03-06 10:42:29', '2019-03-11 09:28:00', 'admin@ilab.com', '2019-03-06'),
(17, 'glass', 'network glass', '4426', 'resulting glass contains about 70 to 74% silica by weight and is called a soda-lime glass.[4] Soda-lime glasses account for about 90% of manufactured glass.', 'NO', 1, '2019-03-06 10:42:29', '2019-03-11 09:27:42', 'admin@ilab.com', '2019-03-06'),
(18, 'glass', 'fused quartz', '4427', 'glass, form (i.e., its molecules are disordered and random, without crystalline structure). It has very low thermal expansion, is very hard, and resists high temperatures (1000–1500 °C). It is also the most resistant against weathering (caused in other glasses by alkali ions leaching out of the glass, while staining it).', 'Set', 1, '2019-03-06 10:42:29', '2019-03-11 09:27:33', 'admin@ilab.com', '2019-03-06'),
(19, 'glass', 'window glass', '4428', ' Is transparent, easily formed and most suitable for window glass (see flat glass). It has a high thermal expansion and poor resistance to heat[15] (500–600 °C).] It is used for windows, some low-temperature incandescent light bulbs, and tableware. Container glass is a soda-lime glass that is a slight variation on flat glass, which uses more alumina and calcium, and less sodium and magnesium, which are more water-soluble. This makes it less susceptible to water erosion.', 'na', 1, '2019-03-06 10:42:29', '2019-03-11 09:28:16', 'admin@ilab.com', '2019-03-06'),
(20, 'wood', 'monocot wood', '4429', 'is fairly constant from 14 to 38 rings per inch (rings 0.7–1.8 mm thick), and decreases rapidly from 38 to 47 rings per inch (rings 0.5–0.7 mm thick). The strength at maximum load is not so great with the most rapid-growing wood; it is maximum with from 14 to 20 rings per inch (rings 1.3–1.8 mm thick), and again becomes less as the wood becomes more closely ringed. The natural deduction is that wood of first-class mechanical value shows from 5 to 20 rings per inch (rings 1.3–5 mm thick) and that slower growth yields poorer stock. ', 'set', 1, '2019-03-06 10:42:29', '2019-03-11 09:28:20', 'admin@ilab.com', '2019-03-06'),
(21, 'wood', 'In-ring porous', '4430', 'decreases rapidly from 38 to 47 rings per inch (rings 0.5–0.7 mm thick). The strength at maximum load is not so great with the most rapid-growing wood; it is maximum with from 14 to 20 rings per inch (rings 1.3–1.8 mm thick), and again becomes less as the wood becomes more closely ringed. The natural deduction is that wood of first-class mechanical value shows from 5 to 20 rings per inch (rings 1.3–5 mm thick) and that slower growth yields poorer stock. Thus the inspector or buyer of hickory should discriminate against timber that has more than 20 rings per inch (rings less than 1.3 mm thick).', 'NO', 1, '2019-03-06 10:42:29', '2019-03-11 09:28:28', 'admin@ilab.com', '2019-03-06'),
(22, 'wood ', 'In-diffuse porous', '4431', '20 rings per inch (rings less than 1.3 mm thick', 'No', 1, '2019-03-06 10:42:30', '2019-03-11 09:28:36', 'admin@ilab.com', '2019-03-06'),
(23, 'cables', 'copper cable', '4432', 'temperatures even approaching 200°C Cables using 85°C-rated polyethylene (PE) dielectric materials.', 'SET', 1, '2019-03-06 10:42:30', '2019-03-11 09:28:45', 'admin@ilab.com', '2019-03-06'),
(24, 'cables', 'coaxial cable', '4433', 'Cables using 85°C-rated polyethylene', '--', 1, '2019-03-06 10:42:30', '2019-03-11 09:28:49', 'admin@ilab.com', '2019-03-06'),
(25, 'Electrical equipment', 'Junction Box', 'ee02', 'MOC=CRCA,Terminals=40,thickness=2mm,Application=outdoor', 'No', 1, '2019-03-14 11:47:09', '2019-03-14 11:47:09', 'design2@ilab.com', '0000-00-00'),
(26, 'Electrical equipment', 'Junction Box', 'ee02', 'Rating=1kva,Voltage=415V/230V,Cooling=AN,IP=65', 'No', 1, '2019-03-14 11:48:10', '2019-03-14 11:48:10', 'design2@ilab.com', '0000-00-00'),
(27, 'Electrical equipment', 'Junction Box 2', 'ee03', 'MOC=CRCA,Terminals=40,thickness=2mm,Application=Outdoor', 'No', 1, '2019-03-14 11:49:41', '2019-03-14 11:49:41', 'design2@ilab.com', '0000-00-00'),
(28, 'Instrumentation Equipment', 'Valve', 'ie2203', 'Type=Butterfly,NB=100mm,MOC=SS316,Class=150#', 'No', 1, '2019-03-14 11:51:24', '2019-03-14 11:51:24', 'design2@ilab.com', '0000-00-00'),
(29, 'Electrical equipment', 'Junction Box 3', 'ie220334', 'Type=Butterfly,NB=100mm,MOC=SS316,Class=150#', 'No', 1, '2019-03-14 11:57:30', '2019-03-14 11:57:30', 'design2@ilab.com', '0000-00-00'),
(30, 'Electrical equipment', 'Junction Box 21', 'ee024', '$route[\'design-user-add-new-material\']=\'designuser/design_user_add_new_material\';', 'No', 1, '2019-03-14 12:15:33', '2019-03-14 12:15:33', 'design2@ilab.com', '0000-00-00'),
(31, 'Electrical equipment', 'Junction Box 4', 'ee67700', 'xxx', 'No', 1, '2019-03-15 04:42:41', '2019-03-15 04:42:41', 'design2@ilab.com', '0000-00-00'),
(32, 'Instrumentation Equipment', 'Valve 105', 'ie6701', 'xxx', 'No', 1, '2019-03-16 08:03:01', '2019-03-16 08:03:01', 'design2@ilab.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_charges_other`
--

CREATE TABLE `Ilab_master_charges_other` (
  `Slno_other` int(11) NOT NULL,
  `Charges_name` varchar(255) NOT NULL,
  `description_charge` text,
  `charge_value` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_charges_other`
--

INSERT INTO `Ilab_master_charges_other` (`Slno_other`, `Charges_name`, `description_charge`, `charge_value`, `status`, `date_entry`, `time_entry`) VALUES
(1, 'freight Charge11', '', '', 1, '2018-09-20', '14:15:49'),
(2, 'char11', '', '', 3, '2018-09-26', '15:08:38'),
(3, 'char122311', '', '', 3, '2019-01-18', '15:37:27'),
(4, 'char1234511', '', '', 1, '2019-01-18', '15:37:45'),
(5, 'char44410', '', '', 1, '2019-02-20', '15:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_closed_bid`
--

CREATE TABLE `Ilab_master_closed_bid` (
  `Slno_closed` int(11) NOT NULL,
  `Bid_master_id_comm` int(11) NOT NULL COMMENT 'master bid id',
  `Bid_ref_no` varchar(255) NOT NULL COMMENT 'ref no ',
  `vendor_id` varchar(255) NOT NULL COMMENT 'vendor email id',
  `Bid_vendor_id` varchar(255) NOT NULL COMMENT 'vendor bid serial no form vendor commerica;',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_of_bid` varchar(255) NOT NULL COMMENT 'type of bid ->closed , open , rank order',
  `category_id` int(11) NOT NULL COMMENT 'material id -> 1 sci 2-> moi 3->logistic',
  `type_bid_id` int(11) NOT NULL COMMENT '1->open 2-> closed 3->rank order bid',
  `comment` text,
  `comment_by` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  `resubmission` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_closed_bid`
--

INSERT INTO `Ilab_master_closed_bid` (`Slno_closed`, `Bid_master_id_comm`, `Bid_ref_no`, `vendor_id`, `Bid_vendor_id`, `date_entry`, `type_of_bid`, `category_id`, `type_bid_id`, `comment`, `comment_by`, `comment_date`, `resubmission`) VALUES
(1, 7, '12330	', 'ven121@gmail.com', '65', '2019-01-30 06:39:34', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(2, 7, '12330	', 'ven121@gmail.com', '65', '2019-01-30 06:54:09', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(3, 8, '2121	', 'ven121@gmail.com', '74', '2019-01-30 07:30:09', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(4, 9, '7709	', 'ven121@gmail.com', '85', '2019-01-30 07:31:01', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(5, 10, '3320	', 'ven121@gmail.com', '96', '2019-01-30 07:33:40', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(6, 7, '12330	', 'ven66@gmail.com', '71', '2019-01-31 12:04:17', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(7, 9, '7709	', 'ven66@gmail.com', '91', '2019-01-31 12:05:06', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0),
(8, 10, '3320	', 'ven66@gmail.com', '104', '2019-01-31 12:06:55', 'Closed Bid', 3, 2, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_closed_bid_item`
--

CREATE TABLE `Ilab_master_closed_bid_item` (
  `Slno_closed_item` int(11) NOT NULL,
  `closed_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) DEFAULT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here closed bid information send by vendor ';

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_closed_bid_item_misc`
--

CREATE TABLE `Ilab_master_closed_bid_item_misc` (
  `Slno_closed_misc` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `closed_id_slno_misc` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_value` text,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_closed_bid_item_misc`
--

INSERT INTO `Ilab_master_closed_bid_item_misc` (`Slno_closed_misc`, `master_bid_id_com`, `closed_id_slno_misc`, `field_name`, `field_value`, `date_entry`, `Bid_slno`, `Vendor_id`) VALUES
(1, 7, 1, 'delivery basis', '7 weeks', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(2, 7, 1, 'gaurantee warranty', '2 yrs', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(3, 7, 1, 'delivery schedule', '4 weeks', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(4, 7, 1, 'payment terms', 'as discussed', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(5, 7, 1, 'validity of offer', '8 months', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(6, 7, 1, 'security BG', 'check out', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(7, 7, 1, 'liquidity damage', '500', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(8, 7, 1, 'remarks', 'ttgg', '2019-01-30 06:39:34', '65', 'ven121@gmail.com'),
(9, 7, 2, 'delivery basis', '7 weeks', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(10, 7, 2, 'gaurantee warranty', '1 yr', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(11, 7, 2, 'delivery schedule', '4 weeks', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(12, 7, 2, 'payment terms', 'as discussed', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(13, 7, 2, 'validity of offer', '8 months', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(14, 7, 2, 'security BG', 'check out', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(15, 7, 2, 'liquidity damage', '400', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(16, 7, 2, 'remarks', 'okay', '2019-01-30 06:54:09', '65', 'ven121@gmail.com'),
(17, 8, 3, 'delivery basis', '5 weeks', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(18, 8, 3, 'gaurantee warranty', '2 yrs', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(19, 8, 3, 'delivery schedule', 'two weeks', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(20, 8, 3, 'payment terms', 'as discussed', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(21, 8, 3, 'validity of offer', '6 months', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(22, 8, 3, 'security BG', 'check out', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(23, 8, 3, 'liquidity damage', '300', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(24, 8, 3, 'remarks', 'okay', '2019-01-30 07:30:10', '74', 'ven121@gmail.com'),
(25, 9, 4, 'delivery basis', '5 weeks', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(26, 9, 4, 'gaurantee warranty', '2 yrs', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(27, 9, 4, 'delivery schedule', 'two weeks', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(28, 9, 4, 'payment terms', 'as discussed', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(29, 9, 4, 'validity of offer', '6 months', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(30, 9, 4, 'security BG', 'check out', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(31, 9, 4, 'liquidity damage', '500', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(32, 9, 4, 'remarks', 'okay', '2019-01-30 07:31:01', '85', 'ven121@gmail.com'),
(33, 10, 5, 'delivery basis', '5 weeks', '2019-01-30 07:33:40', '96', 'ven121@gmail.com'),
(34, 10, 5, 'gaurantee warranty', '1 yr', '2019-01-30 07:33:40', '96', 'ven121@gmail.com'),
(35, 10, 5, 'delivery schedule', '5 weeks', '2019-01-30 07:33:40', '96', 'ven121@gmail.com'),
(36, 10, 5, 'payment terms', 'as discussed', '2019-01-30 07:33:41', '96', 'ven121@gmail.com'),
(37, 10, 5, 'validity of offer', '7 months', '2019-01-30 07:33:41', '96', 'ven121@gmail.com'),
(38, 10, 5, 'security BG', 'check out', '2019-01-30 07:33:41', '96', 'ven121@gmail.com'),
(39, 10, 5, 'liquidity damage', '330', '2019-01-30 07:33:41', '96', 'ven121@gmail.com'),
(40, 10, 5, 'remarks', 'okay', '2019-01-30 07:33:41', '96', 'ven121@gmail.com'),
(41, 7, 6, 'delivery basis', '7 weeks', '2019-01-31 12:04:17', '71', 'ven66@gmail.com'),
(42, 7, 6, 'gaurantee warranty', '2 yrs', '2019-01-31 12:04:17', '71', 'ven66@gmail.com'),
(43, 7, 6, 'delivery schedule', '4 weeks', '2019-01-31 12:04:17', '71', 'ven66@gmail.com'),
(44, 7, 6, 'payment terms', 'as discussed', '2019-01-31 12:04:18', '71', 'ven66@gmail.com'),
(45, 7, 6, 'validity of offer', '8 months', '2019-01-31 12:04:18', '71', 'ven66@gmail.com'),
(46, 7, 6, 'security BG', 'check out', '2019-01-31 12:04:18', '71', 'ven66@gmail.com'),
(47, 7, 6, 'liquidity damage', '300', '2019-01-31 12:04:18', '71', 'ven66@gmail.com'),
(48, 7, 6, 'remarks', 'okay', '2019-01-31 12:04:18', '71', 'ven66@gmail.com'),
(49, 9, 7, 'delivery basis', '7 weeks', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(50, 9, 7, 'gaurantee warranty', '1 yr', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(51, 9, 7, 'delivery schedule', '5 weeks', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(52, 9, 7, 'payment terms', 'as discussed', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(53, 9, 7, 'validity of offer', '8 months', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(54, 9, 7, 'security BG', 'check out', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(55, 9, 7, 'liquidity damage', '300', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(56, 9, 7, 'remarks', 'okay', '2019-01-31 12:05:06', '91', 'ven66@gmail.com'),
(57, 10, 8, 'delivery basis', '5 weeks', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(58, 10, 8, 'gaurantee warranty', '2 yrs', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(59, 10, 8, 'delivery schedule', 'two weeks', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(60, 10, 8, 'payment terms', 'as discussed', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(61, 10, 8, 'validity of offer', '6 months', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(62, 10, 8, 'security BG', 'check out', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(63, 10, 8, 'liquidity damage', '500', '2019-01-31 12:06:56', '104', 'ven66@gmail.com'),
(64, 10, 8, 'remarks', 'okay', '2019-01-31 12:06:56', '104', 'ven66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_closed_bid_item_total`
--

CREATE TABLE `Ilab_master_closed_bid_item_total` (
  `Slno_closed_item_total` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL COMMENT 'master bid id',
  `closed_id_slno_total` int(11) NOT NULL COMMENT 'close bid submission insertid',
  `sub_total` varchar(255) NOT NULL COMMENT 'sub total of vechile price',
  `total_tax` varchar(255) NOT NULL COMMENT 'total price of tax',
  `total_price` varchar(255) NOT NULL COMMENT 'total price of tax+sub toal',
  `user_assumption_charge` varchar(255) NOT NULL COMMENT 'assumation pice',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency_rate` varchar(255) DEFAULT NULL COMMENT 'not rquired right now',
  `currency_name` varchar(255) DEFAULT NULL COMMENT 'not reuired right now',
  `vendor_Bid_slno` varchar(255) NOT NULL COMMENT 'vendor_slno',
  `Vendor_id` varchar(255) NOT NULL COMMENT 'vendor_id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_closed_bid_item_total`
--

INSERT INTO `Ilab_master_closed_bid_item_total` (`Slno_closed_item_total`, `master_bid_id_com`, `closed_id_slno_total`, `sub_total`, `total_tax`, `total_price`, `user_assumption_charge`, `date`, `currency_rate`, `currency_name`, `vendor_Bid_slno`, `Vendor_id`) VALUES
(1, 7, 1, '9600.00', '0.00', '9600.00', '0.00', '2019-01-30 06:39:34', NULL, NULL, '65', 'ven121@gmail.com'),
(2, 7, 2, '9600.00', '0.00', '9600.00', '0.00', '2019-01-30 06:54:09', NULL, NULL, '65', 'ven121@gmail.com'),
(3, 8, 3, '14592.00', '0.00', '14592.00', '0.00', '2019-01-30 07:30:10', NULL, NULL, '74', 'ven121@gmail.com'),
(4, 9, 4, '22831.00', '0.00', '22831.00', '0.00', '2019-01-30 07:31:01', NULL, NULL, '85', 'ven121@gmail.com'),
(5, 10, 5, '49160.00', '0.00', '49160.00', '0.00', '2019-01-30 07:33:41', NULL, NULL, '96', 'ven121@gmail.com'),
(6, 7, 6, '1442.00', '0.00', '1442.00', '0.00', '2019-01-31 12:04:18', NULL, NULL, '71', 'ven66@gmail.com'),
(7, 9, 7, '12486.00', '0.00', '12486.00', '0.00', '2019-01-31 12:05:06', NULL, NULL, '91', 'ven66@gmail.com'),
(8, 10, 8, '50070.00', '0.00', '50070.00', '0.00', '2019-01-31 12:06:56', NULL, NULL, '104', 'ven66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_closed_bid_logistics`
--

CREATE TABLE `Ilab_master_closed_bid_logistics` (
  `Slno_closed_item` int(11) NOT NULL,
  `closed_id_slno` int(11) NOT NULL COMMENT 'insert id from cloed bid for vendeor table ',
  `bid_master_id_com` int(11) NOT NULL COMMENT 'master_bid_id',
  `vehicle_type` varchar(255) NOT NULL COMMENT 'information of vechile',
  `capacity` varchar(255) NOT NULL COMMENT 'capactiy for vechile',
  `detail` varchar(255) DEFAULT NULL COMMENT 'not reqired inthis',
  `no` varchar(255) NOT NULL COMMENT 'no vechile reqired',
  `from_location` varchar(255) NOT NULL COMMENT 'from location which will work on',
  `to_location` varchar(255) NOT NULL COMMENT 'to loaction which will work on',
  `unit_price` varchar(255) NOT NULL COMMENT 'unit price of  vechiel',
  `total_unit_price` varchar(255) NOT NULL COMMENT 'total price for vechicle',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'entry date',
  `comm_item_slno` varchar(255) NOT NULL COMMENT 'commerical item serial no',
  `mr_item_slno` varchar(255) DEFAULT NULL COMMENT 'bid _mr Id for logistics',
  `vendor_bid_slno` varchar(255) NOT NULL COMMENT 'vendor who is applying from his serial no of commerical',
  `vendor_id` varchar(255) NOT NULL COMMENT 'vendor email_id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here vendor will fill information';

--
-- Dumping data for table `Ilab_master_closed_bid_logistics`
--

INSERT INTO `Ilab_master_closed_bid_logistics` (`Slno_closed_item`, `closed_id_slno`, `bid_master_id_com`, `vehicle_type`, `capacity`, `detail`, `no`, `from_location`, `to_location`, `unit_price`, `total_unit_price`, `date_entry`, `comm_item_slno`, `mr_item_slno`, `vendor_bid_slno`, `vendor_id`) VALUES
(1, 1, 7, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5200', '5200.00', '2019-01-30 06:39:34', '21', NULL, '65', 'ven121@gmail.com'),
(2, 1, 7, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '4400', '4400.00', '2019-01-30 06:39:34', '22', NULL, '65', 'ven121@gmail.com'),
(3, 2, 7, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5200', '5200.00', '2019-01-30 06:54:09', '21', NULL, '65', 'ven121@gmail.com'),
(4, 2, 7, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '4400', '4400.00', '2019-01-30 06:54:09', '22', NULL, '65', 'ven121@gmail.com'),
(5, 3, 8, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '5760', '5760.00', '2019-01-30 07:30:10', '23', NULL, '74', 'ven121@gmail.com'),
(6, 3, 8, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '789', '789.00', '2019-01-30 07:30:10', '24', NULL, '74', 'ven121@gmail.com'),
(7, 3, 8, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '356', '356.00', '2019-01-30 07:30:10', '25', NULL, '74', 'ven121@gmail.com'),
(8, 3, 8, 'vehicle12', '60000ponds', 'abc', '1', 'nayapali', 'nayapali', '7687', '7687.00', '2019-01-30 07:30:10', '26', NULL, '74', 'ven121@gmail.com'),
(9, 4, 9, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '8797', '8797.00', '2019-01-30 07:31:01', '27', NULL, '85', 'ven121@gmail.com'),
(10, 4, 9, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '7680', '7680.00', '2019-01-30 07:31:01', '28', NULL, '85', 'ven121@gmail.com'),
(11, 4, 9, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3454', '3454.00', '2019-01-30 07:31:01', '29', NULL, '85', 'ven121@gmail.com'),
(12, 4, 9, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '560', '560.00', '2019-01-30 07:31:01', '30', NULL, '85', 'ven121@gmail.com'),
(13, 4, 9, 'vehicle12', '60000ponds', '12345', '1', 'nayapali', 'nayapali', '2340', '2340.00', '2019-01-30 07:31:01', '31', NULL, '85', 'ven121@gmail.com'),
(14, 5, 10, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '5600', '5600.00', '2019-01-30 07:33:40', '1', NULL, '96', 'ven121@gmail.com'),
(15, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4500', '4500.00', '2019-01-30 07:33:40', '2', NULL, '96', 'ven121@gmail.com'),
(16, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3400', '3400.00', '2019-01-30 07:33:40', '3', NULL, '96', 'ven121@gmail.com'),
(17, 5, 10, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '2300', '2300.00', '2019-01-30 07:33:40', '4', NULL, '96', 'ven121@gmail.com'),
(18, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '6600', '6600.00', '2019-01-30 07:33:40', '5', NULL, '96', 'ven121@gmail.com'),
(19, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4400', '4400.00', '2019-01-30 07:33:40', '6', NULL, '96', 'ven121@gmail.com'),
(20, 5, 10, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '7700', '7700.00', '2019-01-30 07:33:40', '32', NULL, '96', 'ven121@gmail.com'),
(21, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '8900', '8900.00', '2019-01-30 07:33:40', '33', NULL, '96', 'ven121@gmail.com'),
(22, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'irc', 'irc', '3450', '3450.00', '2019-01-30 07:33:40', '34', NULL, '96', 'ven121@gmail.com'),
(23, 5, 10, 'vehicle12', '60000ponds', 'abc', '1', 'nayapali', 'nayapali', '2310', '2310.00', '2019-01-30 07:33:40', '35', NULL, '96', 'ven121@gmail.com'),
(24, 6, 7, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '465', '465.00', '2019-01-31 12:04:17', '21', NULL, '71', 'ven66@gmail.com'),
(25, 6, 7, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '977', '977.00', '2019-01-31 12:04:17', '22', NULL, '71', 'ven66@gmail.com'),
(26, 7, 9, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5454', '5454.00', '2019-01-31 12:05:06', '27', NULL, '91', 'ven66@gmail.com'),
(27, 7, 9, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '678', '678.00', '2019-01-31 12:05:06', '28', NULL, '91', 'ven66@gmail.com'),
(28, 7, 9, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3454', '3454.00', '2019-01-31 12:05:06', '29', NULL, '91', 'ven66@gmail.com'),
(29, 7, 9, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '560', '560.00', '2019-01-31 12:05:06', '30', NULL, '91', 'ven66@gmail.com'),
(30, 7, 9, 'vehicle12', '60000ponds', '12345', '1', 'nayapali', 'nayapali', '2340', '2340.00', '2019-01-31 12:05:06', '31', NULL, '91', 'ven66@gmail.com'),
(31, 8, 10, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '4500', '4500.00', '2019-01-31 12:06:55', '1', NULL, '104', 'ven66@gmail.com'),
(32, 8, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '986', '986.00', '2019-01-31 12:06:55', '2', NULL, '104', 'ven66@gmail.com'),
(33, 8, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '8657', '8657.00', '2019-01-31 12:06:55', '3', NULL, '104', 'ven66@gmail.com'),
(34, 8, 10, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '4567', '4567.00', '2019-01-31 12:06:55', '4', NULL, '104', 'ven66@gmail.com'),
(35, 8, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '6000', '6000.00', '2019-01-31 12:06:55', '5', NULL, '104', 'ven66@gmail.com'),
(36, 8, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3000', '3000.00', '2019-01-31 12:06:55', '6', NULL, '104', 'ven66@gmail.com'),
(37, 8, 10, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '7700', '7700.00', '2019-01-31 12:06:55', '32', NULL, '104', 'ven66@gmail.com'),
(38, 8, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '8900', '8900.00', '2019-01-31 12:06:55', '33', NULL, '104', 'ven66@gmail.com'),
(39, 8, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'irc', 'irc', '3450', '3450.00', '2019-01-31 12:06:56', '34', NULL, '104', 'ven66@gmail.com'),
(40, 8, 10, 'vehicle12', '60000ponds', 'abc', '1', 'nayapali', 'nayapali', '2310', '2310.00', '2019-01-31 12:06:56', '35', NULL, '104', 'ven66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_commercial_notifications`
--

CREATE TABLE `Ilab_master_commercial_notifications` (
  `slno_notification` int(11) NOT NULL,
  `master_bid_id` varchar(255) NOT NULL,
  `messsage` text NOT NULL,
  `vendor_send_id` text NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_submission_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_commercial_notifications`
--

INSERT INTO `Ilab_master_commercial_notifications` (`slno_notification`, `master_bid_id`, `messsage`, `vendor_send_id`, `date_entry`, `end_submission_date`) VALUES
(1, '1', 'BID', '[\"ven121@gmail.com\",\"ven310@yahoo.com\",\"ven66@gmail.com\",\"ven371@yahoo.com\"]', '2019-01-28 11:36:48', '01/30/2019 4:53 PM'),
(2, '2', 'bid closed', '[\"ven121@gmail.com\",\"ven97@gmail.com\",\"ven979@yahoo.com\",\"ven371@yahoo.com\"]', '2019-01-28 12:13:06', '01/30/2019 5:37 PM'),
(3, '3', 'BID END', '[\"ven121@gmail.com\"]', '2019-01-28 14:48:33', '01/28/2019 8:18 PM'),
(4, '4', 'bid final', '[\"ven97@gmail.com\",\"ven979@yahoo.com\",\"ven66@gmail.com\"]', '2019-01-29 13:15:29', '01/29/2019 6:43 PM'),
(5, '4', 'bid auction work over', '[\"ven121@gmail.com\",\"ven97@gmail.com\",\"ven979@yahoo.com\",\"ven66@gmail.com\",\"ven371@yahoo.com\"]', '2019-01-29 13:22:00', '01/29/2019 6:49 PM'),
(6, '7', 'bid final', '[\"ven121@gmail.com\"]', '2019-01-30 06:43:35', '01/30/2019 12:13 PM'),
(7, '12', 'bid close', '[\"ven121@gmail.com\"]', '2019-01-30 08:10:10', '01/30/2019 1:39 PM'),
(8, '13', 'bid close', '[\"ven121@gmail.com\"]', '2019-01-31 06:13:47', '01/31/2019 11:41 AM'),
(9, '13', 'bid final', '[\"ven121@gmail.com\"]', '2019-01-31 06:30:54', '01/31/2019 12:00 PM'),
(10, '13', 'bid final', '[\"ven121@gmail.com\"]', '2019-01-31 06:30:55', '01/31/2019 12:00 PM'),
(11, '14', 'bid close', '[\"ven121@gmail.com\"]', '2019-01-31 07:11:15', '01/31/2019 12:41 PM'),
(12, '14', 'bid close', '[\"ven121@gmail.com\"]', '2019-01-31 07:16:55', '01/31/2019 12:46 PM'),
(13, '11', 'bid close', '[\"ven121@gmail.com\"]', '2019-01-31 10:38:35', '01/31/2019 4:02 PM'),
(14, '11', 'bid  final ', '[\"ven121@gmail.com\"]', '2019-01-31 10:40:16', '01/31/2019 4:09 PM'),
(15, '8', 'txy', '[\"ven121@gmail.com\"]', '2019-02-20 10:09:31', '03/09/2019 3:39 PM');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_createuser`
--

CREATE TABLE `Ilab_master_createuser` (
  `Create_Slno` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL COMMENT 'loginid',
  `user_Designation` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `User_Role` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL COMMENT 'Encryptedpassword',
  `password_hash` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL COMMENT '1-Active,2-Inactive,3-Delete',
  `Date_Entry` date NOT NULL,
  `Time_Entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_createuser`
--

INSERT INTO `Ilab_master_createuser` (`Create_Slno`, `Email`, `user_Designation`, `Name`, `User_Role`, `Password`, `password_hash`, `Mobile`, `Status`, `Date_Entry`, `Time_Entry`) VALUES
(1, 'design@ilab.com', 'Design User', 'Design User 1', '1', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', 1, '2018-08-16', '12:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_date_schedule`
--

CREATE TABLE `Ilab_master_date_schedule` (
  `slno` int(11) NOT NULL,
  `pr_schedule` varchar(255) DEFAULT NULL,
  `pr_schedule_id` varchar(255) DEFAULT NULL,
  `job_code_id` varchar(255) NOT NULL,
  `revised_schedule` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1-active 2-inactive 3-delete',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_final_closed_bid_item`
--

CREATE TABLE `Ilab_master_final_closed_bid_item` (
  `Slno_closed_item` int(11) NOT NULL,
  `closed_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) DEFAULT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `commerical_entry_name` varchar(255) NOT NULL,
  `date_time_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Slno_closed_item_m` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here commerial community  closed bid information save vendor who is selected to procurement';

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_final_closed_bid_logistics`
--

CREATE TABLE `Ilab_master_final_closed_bid_logistics` (
  `Slno_closed_item` int(11) NOT NULL,
  `closed_id_slno` int(11) NOT NULL COMMENT 'insert id from cloed bid for vendeor table ',
  `bid_master_id_com` int(11) NOT NULL COMMENT 'master_bid_id',
  `vehicle_type` varchar(255) NOT NULL COMMENT 'information of vechile',
  `capacity` varchar(255) NOT NULL COMMENT 'capactiy for vechile',
  `detail` varchar(255) DEFAULT NULL COMMENT 'not reqired inthis',
  `no` varchar(255) NOT NULL COMMENT 'no vechile reqired',
  `from_location` varchar(255) NOT NULL COMMENT 'from location which will work on',
  `to_location` varchar(255) NOT NULL COMMENT 'to loaction which will work on',
  `unit_price` varchar(255) NOT NULL COMMENT 'unit price of  vechiel',
  `total_unit_price` varchar(255) NOT NULL COMMENT 'total price for vechicle',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'entry date',
  `comm_item_slno` varchar(255) NOT NULL COMMENT 'commerical item serial no',
  `mr_item_slno` varchar(255) DEFAULT NULL COMMENT 'bid _mr Id for logistics',
  `vendor_bid_slno` varchar(255) NOT NULL COMMENT 'vendor who is applying from his serial no of commerical',
  `vendor_id` varchar(255) NOT NULL COMMENT 'vendor email_id',
  `commerical_entry_name` varchar(255) NOT NULL,
  `date_time_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Slno_closed_item_m` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here vendor will fill information';

--
-- Dumping data for table `Ilab_master_final_closed_bid_logistics`
--

INSERT INTO `Ilab_master_final_closed_bid_logistics` (`Slno_closed_item`, `closed_id_slno`, `bid_master_id_com`, `vehicle_type`, `capacity`, `detail`, `no`, `from_location`, `to_location`, `unit_price`, `total_unit_price`, `date_entry`, `comm_item_slno`, `mr_item_slno`, `vendor_bid_slno`, `vendor_id`, `commerical_entry_name`, `date_time_entry`, `Slno_closed_item_m`) VALUES
(1, 5, 10, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '5600', '5600.00', '2019-01-30 07:33:40', '1', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 14),
(2, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4500', '4500.00', '2019-01-30 07:33:40', '2', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 15),
(3, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3400', '3400.00', '2019-01-30 07:33:40', '3', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 16),
(4, 5, 10, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '2300', '2300.00', '2019-01-30 07:33:40', '4', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 17),
(5, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '6600', '6600.00', '2019-01-30 07:33:40', '5', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 18),
(6, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4400', '4400.00', '2019-01-30 07:33:40', '6', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 19),
(7, 5, 10, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '7700', '7700.00', '2019-01-30 07:33:40', '32', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 20),
(8, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '8900', '8900.00', '2019-01-30 07:33:40', '33', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 21),
(9, 5, 10, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'irc', 'irc', '3450', '3450.00', '2019-01-30 07:33:40', '34', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 22),
(10, 5, 10, 'vehicle12', '60000ponds', 'abc', '1', 'nayapali', 'nayapali', '2310', '2310.00', '2019-01-30 07:33:40', '35', NULL, '96', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-30 07:38:41', 23),
(11, 7, 9, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5454', '5454.00', '2019-01-31 12:05:06', '27', NULL, '91', 'ven66@gmail.com', 'commerical@ilab.com', '2019-01-31 14:33:15', 26),
(12, 4, 9, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '7680', '7680.00', '2019-01-30 07:31:01', '28', NULL, '85', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-31 14:33:15', 10),
(13, 4, 9, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3454', '3454.00', '2019-01-30 07:31:01', '29', NULL, '85', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-31 14:33:15', 11),
(14, 7, 9, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '560', '560.00', '2019-01-31 12:05:06', '30', NULL, '91', 'ven66@gmail.com', 'commerical@ilab.com', '2019-01-31 14:33:15', 29),
(15, 4, 9, 'vehicle12', '60000ponds', '12345', '1', 'nayapali', 'nayapali', '2340', '2340.00', '2019-01-30 07:31:01', '31', NULL, '85', 'ven121@gmail.com', 'commerical@ilab.com', '2019-01-31 14:33:15', 13);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_final_rankorder_bid_item`
--

CREATE TABLE `Ilab_master_final_rankorder_bid_item` (
  `Slno_rankorder_item` int(11) NOT NULL,
  `Rankorder_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) NOT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `commerical_entry_name` varchar(255) NOT NULL,
  `date_entries` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Slno_rankorder_item_m` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here rank order bid information istored as vendor wise submission';

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_final_rankorder_bid_logistics`
--

CREATE TABLE `Ilab_master_final_rankorder_bid_logistics` (
  `Slno_rankorder_item` int(11) NOT NULL,
  `rankorder_id_slno` int(11) NOT NULL,
  `bid_master_id_com` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_unit_price` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `mr_item_slno` varchar(255) NOT NULL,
  `bid_slno` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `Slno_rankorder_item_m` int(11) NOT NULL,
  `commerical_entry_name` varchar(255) NOT NULL,
  `date_entries` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_final_simple_bid_item`
--

CREATE TABLE `Ilab_master_final_simple_bid_item` (
  `Slno_simple_item` int(11) NOT NULL,
  `Simple_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) NOT NULL,
  `bid_slno` varchar(255) NOT NULL,
  `Vendor_id` text NOT NULL,
  `commerical_entry_name` varchar(255) NOT NULL,
  `Slno_simple_item_m` int(11) NOT NULL,
  `date_entries` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_final_simple_bid_item`
--

INSERT INTO `Ilab_master_final_simple_bid_item` (`Slno_simple_item`, `Simple_id_slno`, `Bid_master_id_com`, `Item_name`, `Item_id`, `Quantity`, `Uom_unit`, `Unit_price`, `Total_unitprice`, `date_entry`, `Comm_item_slno`, `Mr_item_slno`, `bid_slno`, `Vendor_id`, `commerical_entry_name`, `Slno_simple_item_m`, `date_entries`) VALUES
(1, 5, 1, 'material item 1', 'mat001', '1', 'nos', '4500', '4500.00', '2019-01-28 10:36:16', '1', '', '5', 'ven310@yahoo.com', 'commerical@ilab.com', 17, '2019-01-29 08:14:01'),
(2, 6, 1, 'material item 17', 'mat0087', '1', 'nos', '2300', '2300.00', '2019-01-28 10:52:16', '2', '', '7', 'ven66@gmail.com', 'commerical@ilab.com', 22, '2019-01-29 08:14:01'),
(3, 9, 1, 'material item 19', 'mat0018', '1', 'nos', '5600', '5600.00', '2019-01-28 13:57:22', '3', '', '3', 'ven121@gmail.com', 'commerical@ilab.com', 35, '2019-01-29 08:14:01'),
(4, 7, 1, 'material10', '10', '1', '21', '1400', '1400.00', '2019-01-28 10:58:20', '4', '', '8', 'ven371@yahoo.com', 'commerical@ilab.com', 28, '2019-01-29 08:14:01'),
(5, 13, 3, 'material item 22', 'mat00910', '1', 'nos', '5400', '5400.00', '2019-01-28 14:50:26', '9', '', '25', 'ven121@gmail.com', 'commerical@ilab.com', 44, '2019-01-29 09:44:04'),
(6, 13, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '2100', '2100.00', '2019-01-28 14:50:26', '10', '', '25', 'ven121@gmail.com', 'commerical@ilab.com', 45, '2019-01-29 09:44:04'),
(7, 13, 3, 'Pump', 'Mat001', '1', 'Horse Power', '3300', '3300.00', '2019-01-28 14:50:27', '11', '', '25', 'ven121@gmail.com', 'commerical@ilab.com', 46, '2019-01-29 09:44:04'),
(8, 13, 3, 'material item 22', 'mat00910', '1', 'nos', '5400', '5400.00', '2019-01-28 14:50:26', '9', '', '25', 'ven121@gmail.com', 'commerical@ilab.com', 44, '2019-01-29 09:52:20'),
(9, 13, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '2100', '2100.00', '2019-01-28 14:50:26', '10', '', '25', 'ven121@gmail.com', 'commerical@ilab.com', 45, '2019-01-29 09:52:20'),
(10, 13, 3, 'Pump', 'Mat001', '1', 'Horse Power', '3300', '3300.00', '2019-01-28 14:50:27', '11', '', '25', 'ven121@gmail.com', 'commerical@ilab.com', 46, '2019-01-29 09:52:20'),
(11, 20, 6, 'material item 22', 'mat00910', '1', 'nos', '2100', '2100.00', '2019-01-29 12:34:26', '14', '', '59', 'ven97@gmail.com', 'commerical@ilab.com', 65, '2019-01-29 13:09:54'),
(12, 30, 6, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4500', '4500.00', '2019-01-29 12:57:41', '15', '', '62', 'ven371@yahoo.com', 'commerical@ilab.com', 97, '2019-01-29 13:09:54'),
(13, 27, 6, 'Pump', 'Mat001', '1', 'Horse Power', '4400', '4400.00', '2019-01-29 12:50:28', '16', '', '61', 'ven66@gmail.com', 'commerical@ilab.com', 89, '2019-01-29 13:09:54'),
(14, 23, 6, 'Rotary lobe pump', 'Mat002', '1', 'Max Pump volume', '2800', '2800.00', '2019-01-29 12:39:57', '17', '', '54', 'ven121@gmail.com', 'commerical@ilab.com', 76, '2019-01-29 13:09:54'),
(15, 15, 2, 'material item 1', 'mat001', '1', 'nos', '4500', '4500.00', '2019-01-29 11:33:27', '5', '', '17', 'ven97@gmail.com', 'commerical@ilab.com', 47, '2019-02-20 10:02:06'),
(16, 15, 2, 'material item 17', 'mat0087', '1', 'nos', '3000', '3000.00', '2019-01-29 11:33:27', '6', '', '17', 'ven97@gmail.com', 'commerical@ilab.com', 48, '2019-02-20 10:02:06'),
(17, 15, 2, 'material item 19', 'mat0018', '1', 'nos', '2200', '2200.00', '2019-01-29 11:33:27', '7', '', '17', 'ven97@gmail.com', 'commerical@ilab.com', 49, '2019-02-20 10:02:06'),
(18, 15, 2, 'material10', '10', '1', '21', '1200', '1200.00', '2019-01-29 11:33:27', '8', '', '17', 'ven97@gmail.com', 'commerical@ilab.com', 50, '2019-02-20 10:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_final_simple_bid_logistic`
--

CREATE TABLE `Ilab_master_final_simple_bid_logistic` (
  `Slno_simple_item` int(11) NOT NULL,
  `simple_id_slno` int(11) NOT NULL,
  `bid_master_id_com` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_unit_price` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `mr_item_slno` varchar(255) DEFAULT NULL,
  `vendor_bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `Slno_simple_item_m` varchar(255) NOT NULL,
  `date_time_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `commerical_entry_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here vendor will fill information';

--
-- Dumping data for table `Ilab_master_final_simple_bid_logistic`
--

INSERT INTO `Ilab_master_final_simple_bid_logistic` (`Slno_simple_item`, `simple_id_slno`, `bid_master_id_com`, `vehicle_type`, `capacity`, `detail`, `no`, `from_location`, `to_location`, `unit_price`, `total_unit_price`, `date_entry`, `comm_item_slno`, `mr_item_slno`, `vendor_bid_slno`, `Vendor_id`, `Slno_simple_item_m`, `date_time_entry`, `commerical_entry_name`) VALUES
(1, 14, 5, 'vehicle12', '60000ponds', '12345', '15', 'nayapali', 'nayapali', '670', '10050.00', '2019-01-29 11:32:01', '17', NULL, '51', 'ven97@gmail.com', '5', '2019-01-29 12:19:33', 'commerical@ilab.com'),
(2, 14, 5, 'vehicle12', '60000ponds', 'abc', '70', 'nayapali', 'nayapali', '450', '31500.00', '2019-01-29 11:32:01', '18', NULL, '51', 'ven97@gmail.com', '6', '2019-01-29 12:19:33', 'commerical@ilab.com'),
(3, 12, 5, 'vehicle10', '50s ponds', 'xxxxxx', '55', 'irc', 'irc', '4000', '220000.00', '2019-01-28 14:49:16', '19', NULL, '48', 'ven121@gmail.com', '3', '2019-01-29 12:19:34', 'commerical@ilab.com'),
(4, 12, 5, 'vehicle10', '5ponds', '2345', '100', 'nayapali', 'nayapali', '2300', '230000.00', '2019-01-28 14:49:16', '20', NULL, '48', 'ven121@gmail.com', '4', '2019-01-29 12:19:34', 'commerical@ilab.com'),
(5, 41, 13, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5600', '5600.00', '2019-01-31 06:37:42', '15', NULL, '135', 'ven121@gmail.com', '36', '2019-01-31 06:47:25', 'commerical@ilab.com'),
(6, 41, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '4530', '4530.00', '2019-01-31 06:37:42', '16', NULL, '135', 'ven121@gmail.com', '37', '2019-01-31 06:47:25', 'commerical@ilab.com'),
(7, 41, 13, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '9980', '9980.00', '2019-01-31 06:37:42', '44', NULL, '135', 'ven121@gmail.com', '38', '2019-01-31 06:47:25', 'commerical@ilab.com'),
(8, 41, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2340', '2340.00', '2019-01-31 06:37:42', '45', NULL, '135', 'ven121@gmail.com', '39', '2019-01-31 06:47:25', 'commerical@ilab.com'),
(9, 41, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '1230', '1230.00', '2019-01-31 06:37:42', '46', NULL, '135', 'ven121@gmail.com', '40', '2019-01-31 06:47:25', 'commerical@ilab.com'),
(10, 44, 14, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '3300', '3300.00', '2019-01-31 07:22:24', '47', NULL, '148', 'ven121@gmail.com', '45', '2019-01-31 07:26:31', 'commerical@ilab.com'),
(11, 44, 14, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4700', '4700.00', '2019-01-31 07:22:24', '48', NULL, '148', 'ven121@gmail.com', '46', '2019-01-31 07:26:31', 'commerical@ilab.com'),
(12, 39, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '3400', '3400.00', '2019-01-30 08:11:40', '13', NULL, '122', 'ven121@gmail.com', '25', '2019-01-31 10:31:07', 'commerical@ilab.com'),
(13, 39, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '5500', '5500.00', '2019-01-30 08:11:40', '14', NULL, '122', 'ven121@gmail.com', '26', '2019-01-31 10:31:07', 'commerical@ilab.com'),
(14, 39, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '2500', '2500.00', '2019-01-30 08:11:40', '40', NULL, '122', 'ven121@gmail.com', '27', '2019-01-31 10:31:07', 'commerical@ilab.com'),
(15, 39, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '5600', '5600.00', '2019-01-30 08:11:40', '41', NULL, '122', 'ven121@gmail.com', '28', '2019-01-31 10:31:07', 'commerical@ilab.com'),
(16, 39, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '1200', '1200.00', '2019-01-30 08:11:40', '42', NULL, '122', 'ven121@gmail.com', '29', '2019-01-31 10:31:07', 'commerical@ilab.com'),
(17, 39, 12, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '5700', '5700.00', '2019-01-30 08:11:40', '43', NULL, '122', 'ven121@gmail.com', '30', '2019-01-31 10:31:07', 'commerical@ilab.com'),
(18, 45, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '4560', '4560.00', '2019-01-31 10:44:43', '7', NULL, '109', 'ven121@gmail.com', '47', '2019-01-31 10:58:02', 'commerical@ilab.com'),
(19, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '6780', '6780.00', '2019-01-31 10:44:43', '8', NULL, '109', 'ven121@gmail.com', '48', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(20, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '3450', '3450.00', '2019-01-31 10:44:43', '9', NULL, '109', 'ven121@gmail.com', '49', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(21, 45, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '2100', '2100.00', '2019-01-31 10:44:43', '10', NULL, '109', 'ven121@gmail.com', '50', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(22, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3000', '3000.00', '2019-01-31 10:44:43', '11', NULL, '109', 'ven121@gmail.com', '51', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(23, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2200', '2200.00', '2019-01-31 10:44:43', '12', NULL, '109', 'ven121@gmail.com', '52', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(24, 45, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '6780', '6780.00', '2019-01-31 10:44:43', '36', NULL, '109', 'ven121@gmail.com', '53', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(25, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2005', '2005.00', '2019-01-31 10:44:43', '37', NULL, '109', 'ven121@gmail.com', '54', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(26, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '770', '770.00', '2019-01-31 10:44:43', '38', NULL, '109', 'ven121@gmail.com', '55', '2019-01-31 10:58:03', 'commerical@ilab.com'),
(27, 45, 11, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '9850', '9850.00', '2019-01-31 10:44:43', '39', NULL, '109', 'ven121@gmail.com', '56', '2019-01-31 10:58:03', 'commerical@ilab.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_items_material`
--

CREATE TABLE `Ilab_master_items_material` (
  `Slno_item` int(11) NOT NULL,
  `Category_slno` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_detail` text NOT NULL,
  `item_uom` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_items_material`
--

INSERT INTO `Ilab_master_items_material` (`Slno_item`, `Category_slno`, `item_name`, `item_id`, `item_detail`, `item_uom`, `status`, `date_entry`, `time_entry`, `category_id`, `category_name`) VALUES
(1, '3', 'material2f', '101', 'xxx', '240', 1, '2018-09-24', '16:32:43', '', 'logistics'),
(2, '1', 'material item 1', 'mat001', 'about testing material present', 'nos', 1, '2018-09-21', '15:46:43', 'cat001', 'standard catalogued item'),
(3, '2', 'Pump', 'Mat001', 'Submersible Pump', 'Horse Power', 1, '2018-09-24', '15:55:07', 'cat002', 'make to order items'),
(4, '2', 'Rotary lobe pump', 'Mat002', 'Pump complete with drive motor, reduction gear system, clutch and base plate\r\n Housing material AISI-316 or AISI 420, rotary piston and shaft seals made of NBR, EPDM or FKM\r\n  Constant i.e. non-pulsing feed rates\r\n  Valveless construction enables reversed pump direction\r\n  Different versions of power end/drive via three-phase   motor (On/Off mode, adjustable motor with integrated frequency converter or external fan)\r\n Connection to bus system is possible (integrated frequency converter needed)\r\n Hydraulic connection as standard by means of DIN flange (DN 50, 65, 80, 100, 125), other connectors available\r\n Simple replacement of wear discs thanks to   maintenance-friendly construction', 'Max Pump volume', 1, '2018-09-24', '16:03:37', 'cat002', 'make to order items'),
(5, '2', 'Progressing cavity pump.', 'Mat003', 'A progressive cavity pump is a type of positive displacement pump and is also known as a progressing cavity pump, progg cavity pump, eccentric screw pump or cavity pump. It transfers fluid by means of the progress, through the pump, of a sequence of small, fixed shape, discrete cavities, as its rotor is turned. This leads to the volumetric flow rate being proportional to the rotation rate (bidirectionally) and to low levels of shearing being applied to the pumped fluid.', 'Capacity', 1, '2018-09-24', '16:10:38', 'cat002', 'make to order items'),
(6, '1', 'material10', '10', 'xyz', '21', 1, '2018-09-26', '15:10:33', 'cat005', 'standard catalogued item'),
(7, '1', 'material item 17', 'mat0087', 'oops execute a block of code a specified number of times.', 'nos', 1, '2018-10-15', '17:41:19', 'cat005', 'standard catalogued item'),
(8, '1', 'material item 19', 'mat0018', 'nitialize the loop counter value', 'nos', 1, '2018-10-15', '17:41:55', 'cat005', 'standard catalogued item'),
(9, '2', 'material item 22', 'mat00910', 'Evaluated for each loop iteration. If it evaluates to TRUE, the loop continues. If it evaluates to FALSE, the loop ends.', 'nos', 1, '2019-01-18', '16:04:41', 'cat002', 'make to order items'),
(10, '1', 'xxxx11', '132432131', 'xxxxxx', '5664', 3, '2019-01-18', '16:03:38', 'cat005', 'standard catalogued item'),
(11, '1', 'ttst', '6600', 'xyz', '505', 1, '2019-02-20', '15:57:24', 'cat005', 'standard catalogued item');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_loaction_details`
--

CREATE TABLE `Ilab_master_loaction_details` (
  `slno_loc` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `loaction_details` text,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1->Active 2->inactive 3->delete',
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_loaction_details`
--

INSERT INTO `Ilab_master_loaction_details` (`slno_loc`, `location_name`, `loaction_details`, `status`, `date_entry`, `last_updated`) VALUES
(1, 'bhu1', NULL, 2, '2018-10-20 12:00:26', '2019-01-18 13:30:27'),
(2, 'bhu', NULL, 3, '2018-10-22 07:39:58', '2019-01-18 13:32:21'),
(3, 'sailahree vihar', NULL, 2, '2018-10-22 07:40:17', '2019-01-22 14:16:08'),
(4, 'irc', NULL, 1, '2018-10-22 07:40:29', '2018-10-22 07:40:29'),
(5, 'nayapali', NULL, 1, '2018-10-22 07:40:54', '2018-10-22 07:40:54'),
(6, 'location1221', NULL, 1, '2019-01-18 13:30:12', '2019-01-18 13:30:12'),
(7, '6700', NULL, 1, '2019-02-20 10:35:16', '2019-02-20 10:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_logistic_vehicle_commerical`
--

CREATE TABLE `Ilab_master_logistic_vehicle_commerical` (
  `Slno_logic_comm` int(11) NOT NULL,
  `master_bid_id_com` varchar(255) NOT NULL,
  `vehicle_mr_slno` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `vehicle_capacity` varchar(255) NOT NULL,
  `vehicle_details` text NOT NULL,
  `vehicle_nos` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `Ace_value` varchar(255) NOT NULL,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_logistic_vehicle_commerical`
--

INSERT INTO `Ilab_master_logistic_vehicle_commerical` (`Slno_logic_comm`, `master_bid_id_com`, `vehicle_mr_slno`, `vehicle_name`, `vehicle_capacity`, `vehicle_details`, `vehicle_nos`, `from_location`, `to_location`, `purpose`, `Ace_value`, `date_update`) VALUES
(1, '10', '', 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', 'official', '663', '2019-01-25 14:00:41'),
(2, '10', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' testing', '344', '2019-01-25 14:00:41'),
(3, '10', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' testing', '676', '2019-01-25 14:00:41'),
(4, '10', '', 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', 'official', '3430', '2019-01-25 14:00:41'),
(5, '10', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' testing', '233', '2019-01-25 14:00:41'),
(6, '10', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' testing', '1223', '2019-01-25 14:00:41'),
(7, '11', '', 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', ' official', '3454', '2019-01-25 14:06:58'),
(8, '11', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' testing', '6688', '2019-01-25 14:06:59'),
(9, '11', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' official', '5600', '2019-01-25 14:06:59'),
(10, '11', '', 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', ' official', '6699', '2019-01-25 14:06:59'),
(11, '11', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' testing', '3432', '2019-01-25 14:06:59'),
(12, '11', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' official', '2211', '2019-01-25 14:06:59'),
(13, '12', '', 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', ' test', '1221', '2019-01-25 14:17:18'),
(14, '12', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' official', '2123', '2019-01-25 14:17:18'),
(15, '13', '', 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', ' ghgh', '434', '2019-01-25 14:25:00'),
(16, '13', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' jkjui', '898', '2019-01-25 14:25:00'),
(17, '5', '', 'vehicle12', '60000ponds', '12345', '15', 'nayapali', 'nayapali', ' Alphabet Inc. is an American multinational conglomerate headquartered in Mountain View, California. It was created through a corporate restructuring of Google on October 2, 2015, and became the parent company of Google and several former G', '33', '2019-01-28 14:44:01'),
(18, '5', '', 'vehicle12', '60000ponds', 'abc', '70', 'nayapali', 'nayapali', ' Alphabet Inc. is an American multinational conglomerate headquartered in Mountain View, California. It was created through a corporate restructuring of Google on October 2, 2015, and became the parent company of Google and several former G', '55', '2019-01-28 14:44:01'),
(19, '5', '', 'vehicle10', '50s ponds', 'xxxxxx', '55', 'irc', 'irc', ' View the basic GOOG stock chart on Yahoo Finance. Change the date range and chart type, and compare Alphabet Inc. against other companies.\r\n', '77', '2019-01-28 14:44:01'),
(20, '5', '', 'vehicle10', '5ponds', '2345', '100', 'nayapali', 'nayapali', ' Alphabet Inc. is an American multinational conglomerate headquartered in Mountain View, California. It was created through a corporate restructuring of Google on October 2, 2015, and became the parent company of Google and several former G', '3354', '2019-01-28 14:44:01'),
(21, '7', '', 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', ' official', '7670', '2019-01-30 06:34:16'),
(22, '7', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' test', '6500', '2019-01-30 06:34:16'),
(23, '8', '', 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', ' recheck', '770', '2019-01-30 07:19:35'),
(24, '8', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' ofc', '880', '2019-01-30 07:19:35'),
(25, '8', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' ofc', '670', '2019-01-30 07:19:35'),
(26, '8', '', 'vehicle12', '60000ponds', 'abc', '1', 'nayapali', 'nayapali', ' ofc', '550', '2019-01-30 07:19:35'),
(27, '9', '', 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', ' offc', '980', '2019-01-30 07:23:35'),
(28, '9', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' test', '867', '2019-01-30 07:23:35'),
(29, '9', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' ofc', '780', '2019-01-30 07:23:35'),
(30, '9', '', 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', ' ofc', '550', '2019-01-30 07:23:35'),
(31, '9', '', 'vehicle12', '60000ponds', '12345', '1', 'nayapali', 'nayapali', ' ofc', '342', '2019-01-30 07:23:35'),
(32, '10', '', 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', ' ofc', '987', '2019-01-30 07:27:44'),
(33, '10', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' ofc', '678', '2019-01-30 07:27:44'),
(34, '10', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'irc', 'irc', ' ofc', '4556', '2019-01-30 07:27:44'),
(35, '10', '', 'vehicle12', '60000ponds', 'abc', '1', 'nayapali', 'nayapali', ' ofc', '768', '2019-01-30 07:27:44'),
(36, '11', '', 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', ' test', '5670', '2019-01-30 07:55:32'),
(37, '11', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' official', '7600', '2019-01-30 07:55:32'),
(38, '11', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' test', '3443', '2019-01-30 07:55:32'),
(39, '11', '', 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', ' okay', '3220', '2019-01-30 07:55:32'),
(40, '12', '', 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', ' official', '4550', '2019-01-30 07:59:34'),
(41, '12', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' test', '5560', '2019-01-30 07:59:34'),
(42, '12', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' official', '6700', '2019-01-30 07:59:34'),
(43, '12', '', 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', ' recheck', '4500', '2019-01-30 07:59:34'),
(44, '13', '', 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', ' official', '1230', '2019-01-31 06:03:39'),
(45, '13', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', ' recheck', '6780', '2019-01-31 06:03:39'),
(46, '13', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' test', '5690', '2019-01-31 06:03:39'),
(47, '14', '', 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', ' official', '1250', '2019-01-31 07:01:04'),
(48, '14', '', 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', ' official', '3420', '2019-01-31 07:01:04'),
(49, '15', '', 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', ' official', '76600', '2019-01-31 11:43:07'),
(50, '15', '', 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', ' official', '4560', '2019-01-31 11:43:07'),
(51, '15', '', 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', ' official', '87870', '2019-01-31 11:43:08'),
(52, '15', '', 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', ' official', '2340', '2019-01-31 11:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_material_category_file`
--

CREATE TABLE `Ilab_master_material_category_file` (
  `slno_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_by` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here project pr schude file name is stored';

--
-- Dumping data for table `Ilab_master_material_category_file`
--

INSERT INTO `Ilab_master_material_category_file` (`slno_id`, `file_name`, `upload_by`, `date_entry`, `update_date`) VALUES
(1, '2019-03-06-161229-material_information (1).xlsx', 'admin@ilab.com', '2019-03-06 10:42:29', '2019-03-06 10:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_approver_order`
--

CREATE TABLE `Ilab_master_mr_approver_order` (
  `Slno_approver` int(11) NOT NULL,
  `Mr_id` varchar(255) NOT NULL,
  `Slno_mr_id` int(11) NOT NULL,
  `Job_code` varchar(255) NOT NULL,
  `Approver_id` varchar(255) NOT NULL,
  `Procurement_id` varchar(255) NOT NULL,
  `Date_approver` date NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Forward_status` int(11) NOT NULL DEFAULT '0',
  `Forward_date` date NOT NULL,
  `Material_id` varchar(255) NOT NULL,
  `Edit_id` varchar(255) NOT NULL,
  `buyer_id` varchar(255) DEFAULT NULL,
  `buyer_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_mr_approver_order`
--

INSERT INTO `Ilab_master_mr_approver_order` (`Slno_approver`, `Mr_id`, `Slno_mr_id`, `Job_code`, `Approver_id`, `Procurement_id`, `Date_approver`, `Status`, `Forward_status`, `Forward_date`, `Material_id`, `Edit_id`, `buyer_id`, `buyer_name`) VALUES
(1, '2019-01-28-AVfzI', 1, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-28', 1, 1, '2019-01-28', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(2, '2019-01-28-gLFf8', 2, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-28', 1, 1, '2019-01-28', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(3, '2019-01-28-Svtup', 4, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-28', 1, 1, '2019-01-28', '2', '1', 'buy1@ilab.com', 'buyer 1'),
(4, '2019-01-28-7aRzP', 5, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-28', 1, 1, '2019-01-28', '2', '1', 'buy1@ilab.com', 'buyer 1'),
(5, '2019-01-28-lXMjU', 6, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-28', 1, 1, '2019-01-28', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(6, '2019-01-29-SifCO', 7, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-29', 1, 1, '2019-01-29', '2', '1', 'buy1@ilab.com', 'buyer 1'),
(7, '2019-01-29-N6T0Z', 8, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-29', 1, 1, '2019-01-29', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(8, '2019-01-28-rIxGm', 3, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-29', 1, 1, '2019-01-31', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(9, '2019-01-30-wyV20', 9, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(10, '2019-01-30-vdRzf', 10, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(11, '2019-01-30-7d9hK', 11, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(12, '2019-01-30-SbxgW', 14, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(13, '2019-01-30-OBqz3', 13, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(14, '2019-01-30-bxvqL', 12, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(15, '2019-01-30-Jdm21', 15, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-30', 1, 1, '2019-01-30', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(16, '2019-01-31-iMcvQ', 16, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(17, '2019-01-31-1YbXh', 18, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(18, '2019-01-31-yeSdN', 17, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(19, '2019-01-31-zciFO', 20, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(20, '2019-01-31-IWa5L', 21, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(21, '2019-01-31-f6Mac', 19, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(22, '2019-01-31-U7cF6', 24, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '2', '1', 'buy1@ilab.com', 'buyer 1'),
(23, '2019-01-31-gvP7q', 23, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(24, '2019-01-31-5sTxC', 22, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '3', '1', 'buy1@ilab.com', 'buyer 1'),
(25, '2019-01-31-neULH', 27, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(26, '2019-01-31-dpHBA', 26, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(27, '2019-01-31-SpwWK', 25, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(28, '2019-01-31-JFCTV', 28, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(29, '2019-01-31-sv7C4', 29, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-01-31', 1, 1, '2019-01-31', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(30, '2019-02-01-kJV97', 30, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-02-01', 1, 1, '2019-02-01', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(31, '2019-02-20-zJmFa', 33, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-02-20', 1, 1, '2019-02-20', '1', '1', 'buy1@ilab.com', 'buyer 1'),
(32, '2019-02-20-Rcyqr', 35, '0770', 'siprah@gmail.com', 'pro@ilab.com', '2019-02-20', 1, 1, '2019-02-20', '1', '1', 'buy1@ilab.com', 'buyer 1');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_file_upload`
--

CREATE TABLE `Ilab_master_mr_file_upload` (
  `slno_file` int(11) NOT NULL,
  `mr_no_id` varchar(255) NOT NULL,
  `slno_mr_id` int(11) NOT NULL,
  `attach_name` varchar(255) NOT NULL,
  `file_name_actucal` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here mr file is uploaded';

--
-- Dumping data for table `Ilab_master_mr_file_upload`
--

INSERT INTO `Ilab_master_mr_file_upload` (`slno_file`, `mr_no_id`, `slno_mr_id`, `attach_name`, `file_name_actucal`, `date_time`) VALUES
(1, '2019-01-28-AVfzI', 1, '2019-01-28-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-28 07:20:11'),
(2, '2019-01-28-AVfzI', 1, '2019-01-28-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-28 07:20:11'),
(3, '2019-01-28-gLFf8', 2, '2019-01-28-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-28 07:21:18'),
(4, '2019-01-28-gLFf8', 2, '2019-01-28-undraw_resume_1hqp.svg', 'undraw_resume_1hqp.svg', '2019-01-28 07:21:26'),
(5, '2019-01-28-rIxGm', 3, '2019-01-28-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-28 07:23:23'),
(6, '2019-01-28-rIxGm', 3, '2019-01-28-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-28 07:23:23'),
(7, '2019-01-28-Svtup', 4, '2019-01-28-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-28 14:28:55'),
(8, '2019-01-28-Svtup', 4, '2019-01-28-undraw_programming_2svr.svg', 'undraw_programming_2svr.svg', '2019-01-28 14:29:13'),
(9, '2019-01-28-7aRzP', 5, '2019-01-28-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-28 14:29:56'),
(10, '2019-01-28-lXMjU', 6, '2019-01-28-cat_walk_by_elenadudina_dcx60l2-pre.jpg', 'cat_walk_by_elenadudina_dcx60l2-pre.jpg', '2019-01-28 14:33:57'),
(11, '2019-01-29-SifCO', 7, '2019-01-29-undraw_mail_box_kd5i.svg', 'undraw_mail_box_kd5i.svg', '2019-01-29 11:49:47'),
(12, '2019-01-29-SifCO', 7, '2019-01-29-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-29 11:49:56'),
(13, '2019-01-29-N6T0Z', 8, '2019-01-29-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-29 11:50:49'),
(14, '2019-01-29-N6T0Z', 8, '2019-01-29-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-29 11:51:02'),
(15, '2019-01-30-wyV20', 9, '2019-01-30-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-30 05:48:15'),
(16, '2019-01-30-wyV20', 9, '2019-01-30-undraw_resume_1hqp.svg', 'undraw_resume_1hqp.svg', '2019-01-30 05:49:01'),
(17, '2019-01-30-vdRzf', 10, '2019-01-30-undraw_teaching_f1cm.svg', 'undraw_teaching_f1cm.svg', '2019-01-30 05:52:07'),
(18, '2019-01-30-vdRzf', 10, '2019-01-30-undraw_mind_map_cwng.svg', 'undraw_mind_map_cwng.svg', '2019-01-30 05:52:18'),
(19, '2019-01-30-7d9hK', 11, '2019-01-30-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-30 05:53:40'),
(20, '2019-01-30-7d9hK', 11, '2019-01-30-undraw_mail_cg1t.svg', 'undraw_mail_cg1t.svg', '2019-01-30 05:53:49'),
(21, '2019-01-30-bxvqL', 12, '2019-01-30-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-30 07:01:56'),
(22, '2019-01-30-bxvqL', 12, '2019-01-30-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-30 07:02:11'),
(23, '2019-01-30-OBqz3', 13, '2019-01-30-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-30 07:05:16'),
(24, '2019-01-30-SbxgW', 14, '2019-01-30-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-30 07:07:07'),
(25, '2019-01-30-SbxgW', 14, '2019-01-30-undraw_mail_cg1t.svg', 'undraw_mail_cg1t.svg', '2019-01-30 07:07:16'),
(26, '2019-01-30-Jdm21', 15, '2019-01-30-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-30 07:45:38'),
(27, '2019-01-30-Jdm21', 15, '2019-01-30-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-01-30 07:45:45'),
(28, '2019-01-31-iMcvQ', 16, '2019-01-31-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-31 05:56:13'),
(29, '2019-01-31-yeSdN', 17, '2019-01-31-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-31 06:49:58'),
(30, '2019-01-31-yeSdN', 17, '2019-01-31-undraw_resume_1hqp.svg', 'undraw_resume_1hqp.svg', '2019-01-31 06:50:08'),
(31, '2019-01-31-1YbXh', 18, '2019-01-31-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-31 06:52:08'),
(32, '2019-01-31-1YbXh', 18, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 06:52:21'),
(33, '2019-01-31-f6Mac', 19, '2019-01-31-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-31 07:29:02'),
(34, '2019-01-31-f6Mac', 19, '2019-01-31-undraw_programming_2svr.svg', 'undraw_programming_2svr.svg', '2019-01-31 07:29:12'),
(35, '2019-01-31-zciFO', 20, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 08:08:06'),
(36, '2019-01-31-IWa5L', 21, '2019-01-31-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-31 10:04:18'),
(37, '2019-01-31-IWa5L', 21, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 10:04:27'),
(38, '2019-01-31-5sTxC', 22, '2019-01-31-undraw_uploading_go67.svg', 'undraw_uploading_go67.svg', '2019-01-31 11:03:12'),
(39, '2019-01-31-5sTxC', 22, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 11:03:20'),
(40, '2019-01-31-gvP7q', 23, '2019-01-31-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-01-31 11:05:35'),
(41, '2019-01-31-gvP7q', 23, '2019-01-31-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-01-31 11:06:12'),
(42, '2019-01-31-U7cF6', 24, '2019-01-31-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-01-31 11:09:03'),
(43, '2019-01-31-U7cF6', 24, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 11:09:10'),
(44, '2019-01-31-SpwWK', 25, '2019-01-31-undraw_uploading_go67.svg', 'undraw_uploading_go67.svg', '2019-01-31 12:25:11'),
(45, '2019-01-31-SpwWK', 25, '2019-01-31-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-01-31 12:25:20'),
(46, '2019-01-31-SpwWK', 25, '2019-01-31-undraw_resume_1hqp.svg', 'undraw_resume_1hqp.svg', '2019-01-31 12:25:29'),
(47, '2019-01-31-dpHBA', 26, '2019-01-31-undraw_user_flow_vr6w.svg', 'undraw_user_flow_vr6w.svg', '2019-01-31 12:26:06'),
(48, '2019-01-31-dpHBA', 26, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 12:26:13'),
(49, '2019-01-31-dpHBA', 26, '2019-01-31-undraw_mobile_testing_reah.svg', 'undraw_mobile_testing_reah.svg', '2019-01-31 12:26:23'),
(50, '2019-01-31-neULH', 27, '2019-01-31-undraw_teaching_f1cm (1).svg', 'undraw_teaching_f1cm (1).svg', '2019-01-31 12:26:57'),
(51, '2019-01-31-neULH', 27, '2019-01-31-undraw_team_ih79.svg', 'undraw_team_ih79.svg', '2019-01-31 12:27:05'),
(52, '2019-01-31-JFCTV', 28, '2019-01-31-undraw_user_flow_vr6w.svg', 'undraw_user_flow_vr6w.svg', '2019-01-31 12:55:32'),
(53, '2019-01-31-sv7C4', 29, '2019-01-31-undraw_teaching_f1cm (1).svg', 'undraw_teaching_f1cm (1).svg', '2019-01-31 13:59:42'),
(54, '2019-01-31-sv7C4', 29, '2019-01-31-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-01-31 13:59:50'),
(55, '2019-02-01-kJV97', 30, '2019-02-01-city_drbl_3.gif', 'city_drbl_3.gif', '2019-02-01 10:26:04'),
(56, '2019-02-20-mxbMC', 31, '2019-02-20-undraw_user_flow_vr6w.svg', 'undraw_user_flow_vr6w.svg', '2019-02-20 07:48:40'),
(57, '2019-02-20-poza4', 32, '2019-02-20-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-02-20 07:52:18'),
(58, '2019-02-20-zJmFa', 33, '2019-02-20-undraw_world_9iqb.svg', 'undraw_world_9iqb.svg', '2019-02-20 08:01:01'),
(59, '2019-02-20-zJmFa', 33, '2019-02-20-undraw_world_9iqb.svg', 'undraw_world_9iqb.svg', '2019-02-20 08:01:14'),
(60, '2019-02-20-FCepH', 34, '2019-02-20-undraw_world_9iqb.svg', 'undraw_world_9iqb.svg', '2019-02-20 08:03:26'),
(61, '2019-02-20-Rcyqr', 35, '2019-02-20-undraw_team_ih79.svg', 'undraw_team_ih79.svg', '2019-02-20 12:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_file_upload_m`
--

CREATE TABLE `Ilab_master_mr_file_upload_m` (
  `slno_file` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `pr_no_slno` int(11) NOT NULL,
  `job_code_slno` int(11) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `attach_name` varchar(255) NOT NULL,
  `file_name_actucal` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `attach_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here mr file is uploaded';

--
-- Dumping data for table `Ilab_master_mr_file_upload_m`
--

INSERT INTO `Ilab_master_mr_file_upload_m` (`slno_file`, `pr_no`, `pr_no_slno`, `job_code_slno`, `file_title`, `edit_id`, `attach_name`, `file_name_actucal`, `date_time`, `attach_by`) VALUES
(1, 'O18191-950-E-K-30101-001', 1, 1, 'electrical', 1, '2019-03-16-undraw_team_ih79.svg', 'undraw_team_ih79.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(2, 'O18191-950-E-K-30102-001', 2, 1, 'nanoconductors', 1, '2019-03-16-undraw_programming_2svr.svg', 'undraw_programming_2svr.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(3, 'O18191-950-E-K-30101-001', 1, 1, 'polymers', 1, '2019-03-16-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(4, 'O18191-950-E-K-30103-001', 3, 1, 'cables', 1, '2019-03-16-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(5, 'O18191-950-E-K-30104-001', 4, 1, 'electrical', 1, '2019-03-16-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(6, 'O18191-950-E-K-30105-001', 5, 1, 'wood', 1, '2019-03-18-undraw_windows_q9m0.svg', 'undraw_windows_q9m0.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(7, 'O18191-950-E-K-30107-001', 7, 1, 'glass', 1, '2019-03-18-undraw_statistics_ctoq.svg', 'undraw_statistics_ctoq.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(8, 'O18191-950-E-K-30106-001', 6, 1, 'electrical', 1, '2019-03-21-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(9, 'O18191-950-E-K-30106-001', 6, 1, 'electrical', 1, '2019-03-21-undraw_resume_1hqp.svg', 'undraw_resume_1hqp.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(10, 'O18191-950-E-K-30108-001', 8, 1, 'electrical', 1, '2019-03-21-undraw_resume_1hqp.svg', 'undraw_resume_1hqp.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(11, 'O18191-950-E-K-30108-001', 8, 1, 'electrical', 1, '2019-03-21-undraw_team_ih79.svg', 'undraw_team_ih79.svg', '2019-03-23 13:15:29', 'design2@ilab.com'),
(12, 'O18191-950-E-K-30109-001', 9, 1, '', 1, '2019-03-23-undraw_secure_data_0rwp.svg', 'undraw_secure_data_0rwp.svg', '2019-03-23 13:15:29', 'design2@ilab.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_job_comments`
--

CREATE TABLE `Ilab_master_mr_job_comments` (
  `Slno_comment` int(11) NOT NULL,
  `Mr_id` varchar(255) NOT NULL,
  `Slno_mr_id` int(11) NOT NULL,
  `Edit` varchar(255) NOT NULL,
  `Resubmitted_id` varchar(255) NOT NULL,
  `Date_resubmit` date NOT NULL,
  `Creator_id_sender` varchar(255) NOT NULL,
  `Approve_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_job_details`
--

CREATE TABLE `Ilab_master_mr_job_details` (
  `slno_mr` int(11) NOT NULL,
  `mr_no` varchar(255) NOT NULL,
  `approver_id_slno` int(11) NOT NULL,
  `approver_id` varchar(255) NOT NULL,
  `approver_name` varchar(255) NOT NULL,
  `job_code_id_slno` int(11) NOT NULL,
  `job_code_id` varchar(255) NOT NULL,
  `materilal_category_id_slno` int(11) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `techinal_evalution` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1->submit 2->inactive 3->delete 4->incomplete mr 5->complete Mr  6-> Resubmit MR',
  `status_resubmit` int(11) NOT NULL DEFAULT '0',
  `resubmit_count` int(11) NOT NULL DEFAULT '0',
  `edit_id` int(11) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL,
  `time_creation` time NOT NULL,
  `time_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_submition` date DEFAULT NULL,
  `time_submition` time DEFAULT NULL,
  `date_required` varchar(255) NOT NULL,
  `creators_id` varchar(255) NOT NULL,
  `mr_forword_status` int(11) NOT NULL DEFAULT '0' COMMENT '1->approved 0->pending',
  `mr_forword_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='creation of mr from design user here who has creater user will able to resubmit and edit information ';

--
-- Dumping data for table `Ilab_master_mr_job_details`
--

INSERT INTO `Ilab_master_mr_job_details` (`slno_mr`, `mr_no`, `approver_id_slno`, `approver_id`, `approver_name`, `job_code_id_slno`, `job_code_id`, `materilal_category_id_slno`, `material_category_name`, `techinal_evalution`, `status`, `status_resubmit`, `resubmit_count`, `edit_id`, `date_creation`, `time_creation`, `time_date_creation`, `date_submition`, `time_submition`, `date_required`, `creators_id`, `mr_forword_status`, `mr_forword_date`) VALUES
(1, '2019-01-28-AVfzI', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-28', '12:49:24', '2019-01-28 07:25:49', '2019-01-28', '12:50:39', '2019-01-28', 'design2@ilab.com', 1, '2019-01-28'),
(2, '2019-01-28-gLFf8', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-28', '12:51:09', '2019-01-28 07:27:09', '2019-01-28', '12:52:00', '2019-01-28', 'design2@ilab.com', 1, '2019-01-28'),
(3, '2019-01-28-rIxGm', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-28', '12:52:22', '2019-01-29 11:54:03', '2019-01-28', '12:54:04', '2019-01-28', 'design2@ilab.com', 1, '2019-01-29'),
(4, '2019-01-28-Svtup', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 2, 'make to order items', 2, 1, 0, 0, 1, '2019-01-28', '19:58:47', '2019-01-28 14:31:16', '2019-01-28', '19:59:29', '2019-01-28', 'design2@ilab.com', 1, '2019-01-28'),
(5, '2019-01-28-7aRzP', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 2, 'make to order items', 2, 1, 0, 0, 1, '2019-01-28', '19:59:49', '2019-01-28 14:31:39', '2019-01-28', '20:00:07', '2019-01-28', 'design2@ilab.com', 1, '2019-01-28'),
(6, '2019-01-28-lXMjU', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-28', '20:03:30', '2019-01-28 14:39:10', '2019-01-28', '20:06:00', '2019-01-31', 'design2@ilab.com', 1, '2019-01-28'),
(7, '2019-01-29-SifCO', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 2, 'make to order items', 2, 1, 0, 0, 1, '2019-01-29', '17:19:26', '2019-01-29 11:52:50', '2019-01-29', '17:20:17', '2019-01-29', 'design2@ilab.com', 1, '2019-01-29'),
(8, '2019-01-29-N6T0Z', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-29', '17:20:40', '2019-01-29 11:53:24', '2019-01-29', '17:21:32', '2019-01-29', 'design2@ilab.com', 1, '2019-01-29'),
(9, '2019-01-30-wyV20', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '11:09:37', '2019-01-30 06:10:05', '2019-01-30', '11:21:17', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(10, '2019-01-30-vdRzf', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '11:21:56', '2019-01-30 06:11:26', '2019-01-30', '11:23:10', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(11, '2019-01-30-7d9hK', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '11:23:31', '2019-01-30 06:11:58', '2019-01-30', '11:25:03', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(12, '2019-01-30-bxvqL', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '12:31:49', '2019-01-30 07:12:53', '2019-01-30', '12:34:12', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(13, '2019-01-30-OBqz3', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '12:34:52', '2019-01-30 07:12:04', '2019-01-30', '12:36:32', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(14, '2019-01-30-SbxgW', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '12:36:52', '2019-01-30 07:09:54', '2019-01-30', '12:38:08', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(15, '2019-01-30-Jdm21', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-30', '13:15:26', '2019-01-30 07:47:47', '2019-01-30', '13:16:47', '2019-01-30', 'design2@ilab.com', 1, '2019-01-30'),
(16, '2019-01-31-iMcvQ', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '11:26:02', '2019-01-31 05:58:09', '2019-01-31', '11:26:56', '2019-02-07', 'design2@ilab.com', 1, '2019-01-31'),
(17, '2019-01-31-yeSdN', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '12:19:50', '2019-01-31 06:54:12', '2019-01-31', '12:20:42', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(18, '2019-01-31-1YbXh', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '12:21:58', '2019-01-31 06:53:51', '2019-01-31', '12:22:55', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(19, '2019-01-31-f6Mac', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '12:58:44', '2019-01-31 10:12:05', '2019-01-31', '13:00:42', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(20, '2019-01-31-zciFO', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '13:36:06', '2019-01-31 08:17:08', '2019-01-31', '13:44:24', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(21, '2019-01-31-IWa5L', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '15:34:10', '2019-01-31 10:11:27', '2019-01-31', '15:36:23', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(22, '2019-01-31-5sTxC', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '16:32:56', '2019-01-31 11:13:56', '2019-01-31', '16:34:43', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(23, '2019-01-31-gvP7q', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 3, 'logistics', 2, 1, 0, 0, 1, '2019-01-31', '16:35:27', '2019-01-31 11:13:23', '2019-01-31', '16:38:28', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(24, '2019-01-31-U7cF6', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 2, 'make to order items', 2, 1, 0, 0, 1, '2019-01-31', '16:38:56', '2019-01-31 11:10:56', '2019-01-31', '16:39:22', '2019-01-30', 'design2@ilab.com', 1, '2019-01-31'),
(25, '2019-01-31-SpwWK', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-31', '17:55:00', '2019-01-31 12:30:41', '2019-01-31', '17:55:38', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(26, '2019-01-31-dpHBA', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-31', '17:56:00', '2019-01-31 12:30:10', '2019-01-31', '17:56:33', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(27, '2019-01-31-neULH', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-31', '17:56:50', '2019-01-31 12:28:25', '2019-01-31', '17:57:28', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(28, '2019-01-31-JFCTV', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-31', '18:25:26', '2019-01-31 12:56:38', '2019-01-31', '18:25:42', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(29, '2019-01-31-sv7C4', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-01-31', '19:29:12', '2019-01-31 14:01:21', '2019-01-31', '19:30:16', '2019-01-31', 'design2@ilab.com', 1, '2019-01-31'),
(30, '2019-02-01-kJV97', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 1, 1, 0, 0, 1, '2019-02-01', '15:55:53', '2019-02-01 10:43:52', '2019-02-01', '15:56:21', '2019-02-28', 'design2@ilab.com', 1, '2019-02-01'),
(31, '2019-02-20-mxbMC', 25, 'vch33@yahoo.com', 'user901', 1, '0770', 1, 'standard catalogued item', 1, 1, 0, 0, 1, '2019-02-20', '13:18:12', '2019-02-20 07:48:51', '2019-02-20', '13:18:51', '2019-02-27', 'design2@ilab.com', 0, NULL),
(32, '2019-02-20-poza4', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 6, 1, 1, 1, '2019-02-20', '13:22:12', '2019-02-20 07:53:42', '2019-02-20', '13:22:30', '2019-03-05', 'design2@ilab.com', 0, NULL),
(33, '2019-02-20-zJmFa', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-02-20', '13:30:51', '2019-02-20 08:04:22', '2019-02-20', '13:31:26', '2019-03-13', 'design2@ilab.com', 1, '2019-02-20'),
(34, '2019-02-20-FCepH', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 2, 1, 0, 0, 1, '2019-02-20', '13:33:14', '2019-02-20 08:03:38', '2019-02-20', '13:33:38', '2019-03-19', 'design2@ilab.com', 0, NULL),
(35, '2019-02-20-Rcyqr', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 1, 'standard catalogued item', 1, 1, 0, 0, 1, '2019-02-20', '17:38:27', '2019-02-20 12:16:16', '2019-02-20', '17:45:03', '2019-02-27', 'design2@ilab.com', 1, '2019-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_job_details_m`
--

CREATE TABLE `Ilab_master_mr_job_details_m` (
  `slno_mr` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `approver_id_slno` int(11) NOT NULL,
  `approver_id` varchar(255) NOT NULL,
  `approver_name` varchar(255) NOT NULL,
  `job_code_id_slno` int(11) NOT NULL,
  `job_code_id` varchar(255) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `techinal_evalution` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1->submit 2->inactive 3->delete 4->incomplete mr 5->complete Mr  6-> Resubmit MR',
  `status_resubmit` int(11) NOT NULL DEFAULT '0',
  `resubmit_count` int(11) NOT NULL DEFAULT '0',
  `edit_id` int(11) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL,
  `time_creation` time NOT NULL,
  `time_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_submition` date DEFAULT NULL,
  `time_submition` time DEFAULT NULL,
  `date_required` varchar(255) NOT NULL,
  `creators_id` varchar(255) NOT NULL,
  `mr_forword_status` int(11) NOT NULL DEFAULT '0' COMMENT '1->approved 0->pending',
  `mr_forword_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='creation of mr from design user here who has creater user will able to resubmit and edit information ';

--
-- Dumping data for table `Ilab_master_mr_job_details_m`
--

INSERT INTO `Ilab_master_mr_job_details_m` (`slno_mr`, `pr_no`, `approver_id_slno`, `approver_id`, `approver_name`, `job_code_id_slno`, `job_code_id`, `material_category_name`, `techinal_evalution`, `status`, `status_resubmit`, `resubmit_count`, `edit_id`, `date_creation`, `time_creation`, `time_date_creation`, `date_submition`, `time_submition`, `date_required`, `creators_id`, `mr_forword_status`, `mr_forword_date`) VALUES
(1, 'O18191-950-E-K-30102-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'semiconductors', 2, 1, 1, 3, 1, '2019-03-16', '18:20:56', '2019-03-19 13:43:34', '2019-03-16', '18:20:56', '2019-03-28', 'design2@ilab.com', 1, '2019-03-16'),
(2, 'O18191-950-E-K-30101-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'Instrumentation Equipment', 2, 1, 1, 3, 3, '2019-03-19', '18:38:47', '2019-03-23 10:54:48', '2019-03-19', '18:38:47', '2019-03-27', 'design2@ilab.com', 1, '2019-03-23'),
(3, 'O18191-950-E-K-30103-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'cables', 2, 4, 1, 3, 1, '2019-03-16', '18:45:23', '2019-03-19 13:43:34', NULL, NULL, '2019-03-27', 'design2@ilab.com', 0, NULL),
(4, 'O18191-950-E-K-30104-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 2, 4, 1, 3, 1, '2019-03-16', '18:50:58', '2019-03-19 13:43:34', NULL, NULL, '2019-03-22', 'design2@ilab.com', 0, NULL),
(5, 'O18191-950-E-K-30105-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'wood', 2, 4, 1, 3, 1, '2019-03-18', '11:27:12', '2019-03-19 13:43:34', NULL, NULL, '2019-03-27', 'design2@ilab.com', 0, NULL),
(6, 'O18191-950-E-K-30107-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'glass', 2, 4, 1, 3, 1, '2019-03-18', '11:28:49', '2019-03-19 13:43:34', NULL, NULL, '2019-03-28', 'design2@ilab.com', 0, NULL),
(7, 'O18191-950-E-K-30106-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 1, 4, 0, 0, 1, '2019-03-21', '11:03:44', '2019-03-21 05:33:44', NULL, NULL, '2019-03-29', 'design2@ilab.com', 0, NULL),
(8, 'O18191-950-E-K-30108-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 1, 4, 0, 0, 1, '2019-03-21', '11:10:01', '2019-03-21 05:41:36', NULL, NULL, '2019-03-27', 'design2@ilab.com', 1, '2019-03-21'),
(9, 'O18191-950-E-K-30109-001', 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 1, 4, 0, 0, 1, '2019-03-23', '16:23:59', '2019-03-23 10:53:59', NULL, NULL, '2018-12-31', 'design2@ilab.com', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_job_details_m_clone`
--

CREATE TABLE `Ilab_master_mr_job_details_m_clone` (
  `slno_mr` int(11) NOT NULL,
  `approver_id_slno` int(11) NOT NULL,
  `approver_id` varchar(255) NOT NULL,
  `approver_name` varchar(255) NOT NULL,
  `job_code_id_slno` int(11) NOT NULL,
  `job_code_id` varchar(255) NOT NULL,
  `material_category_name` varchar(255) NOT NULL,
  `techinal_evalution` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1->submit 2->inactive 3->delete 4->incomplete mr 5->complete Mr  6-> Resubmit MR',
  `status_resubmit` int(11) NOT NULL DEFAULT '0',
  `resubmit_count` int(11) NOT NULL DEFAULT '0',
  `edit_id` int(11) NOT NULL DEFAULT '0',
  `date_creation` date NOT NULL,
  `time_creation` time NOT NULL,
  `time_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_submition` date DEFAULT NULL,
  `time_submition` time DEFAULT NULL,
  `date_required` varchar(255) NOT NULL,
  `creators_id` varchar(255) NOT NULL,
  `mr_forword_status` int(11) NOT NULL DEFAULT '0' COMMENT '1->approved 0->pending',
  `mr_forword_date` date DEFAULT NULL,
  `last_id` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='creation of mr from design user here who has creater user will able to resubmit and edit information ';

--
-- Dumping data for table `Ilab_master_mr_job_details_m_clone`
--

INSERT INTO `Ilab_master_mr_job_details_m_clone` (`slno_mr`, `approver_id_slno`, `approver_id`, `approver_name`, `job_code_id_slno`, `job_code_id`, `material_category_name`, `techinal_evalution`, `status`, `status_resubmit`, `resubmit_count`, `edit_id`, `date_creation`, `time_creation`, `time_date_creation`, `date_submition`, `time_submition`, `date_required`, `creators_id`, `mr_forword_status`, `mr_forword_date`, `last_id`, `pr_no`) VALUES
(1, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'semiconductors', 2, 4, 0, 0, 0, '2019-03-16', '18:18:25', '2019-03-16 13:01:58', NULL, NULL, '2019-03-28', 'design2@ilab.com', 1, '2019-03-16', 1, 'O18191-950-E-K-30102-001'),
(2, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'semiconductors', 2, 4, 0, 0, 0, '2019-03-16', '18:20:56', '2019-03-16 13:01:58', NULL, NULL, '2019-03-28', 'design2@ilab.com', 1, '2019-03-16', 1, 'O18191-950-E-K-30102-001'),
(3, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'Instrumentation Equipment', 2, 4, 0, 0, 0, '2019-03-16', '18:43:11', '2019-03-23 10:54:48', NULL, NULL, '2019-03-27', 'design2@ilab.com', 1, '2019-03-23', 2, 'O18191-950-E-K-30101-001'),
(4, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'cables', 2, 4, 0, 0, 0, '2019-03-16', '18:45:23', '2019-03-16 13:15:23', NULL, NULL, '2019-03-27', 'design2@ilab.com', 0, NULL, 3, 'O18191-950-E-K-30103-001'),
(5, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 2, 4, 0, 0, 0, '2019-03-16', '18:50:58', '2019-03-16 13:20:58', NULL, NULL, '2019-03-22', 'design2@ilab.com', 0, NULL, 4, 'O18191-950-E-K-30104-001'),
(6, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'wood', 2, 4, 0, 0, 1, '2019-03-18', '11:27:12', '2019-03-18 05:57:12', NULL, NULL, '2019-03-27', 'design2@ilab.com', 0, NULL, 5, 'O18191-950-E-K-30105-001'),
(7, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'glass', 2, 4, 0, 0, 1, '2019-03-18', '11:28:49', '2019-03-18 05:58:49', NULL, NULL, '2019-03-28', 'design2@ilab.com', 0, NULL, 6, 'O18191-950-E-K-30107-001'),
(8, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'Instrumentation Equipment', 2, 4, 0, 0, 2, '2019-03-19', '18:16:15', '2019-03-23 10:54:48', NULL, NULL, '2019-03-27', 'design2@ilab.com', 1, '2019-03-23', 2, 'O18191-950-E-K-30101-001'),
(9, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'Instrumentation Equipment', 2, 4, 0, 0, 3, '2019-03-19', '18:38:47', '2019-03-23 10:54:48', NULL, NULL, '2019-03-27', 'design2@ilab.com', 1, '2019-03-23', 2, 'O18191-950-E-K-30101-001'),
(10, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 1, 4, 0, 0, 1, '2019-03-21', '11:03:44', '2019-03-21 05:33:44', NULL, NULL, '2019-03-29', 'design2@ilab.com', 0, NULL, 7, 'O18191-950-E-K-30106-001'),
(11, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 1, 4, 0, 0, 1, '2019-03-21', '11:10:01', '2019-03-21 05:41:37', NULL, NULL, '2019-03-27', 'design2@ilab.com', 1, '2019-03-21', 8, 'O18191-950-E-K-30108-001'),
(12, 18, 'siprah@gmail.com', 'Approver5', 1, '0770', 'electrical', 1, 4, 0, 0, 1, '2019-03-23', '16:23:59', '2019-03-23 10:53:59', NULL, NULL, '2018-12-31', 'design2@ilab.com', 0, NULL, 9, 'O18191-950-E-K-30109-001');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_location`
--

CREATE TABLE `Ilab_master_mr_location` (
  `slno_loca_mr` int(11) NOT NULL,
  `mr_id_location` varchar(255) NOT NULL,
  `mr_slno_id` int(11) NOT NULL,
  `location_from` int(11) NOT NULL,
  `location_to` int(11) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_mr_location`
--

INSERT INTO `Ilab_master_mr_location` (`slno_loca_mr`, `mr_id_location`, `mr_slno_id`, `location_from`, `location_to`, `edit_id`, `entry_date`) VALUES
(1, '2019-01-28-lXMjU', 6, 4, 6, 1, '2019-01-28 14:36:00'),
(2, '2019-01-29-N6T0Z', 8, 4, 6, 1, '2019-01-29 11:51:32'),
(3, '2019-01-30-wyV20', 9, 4, 6, 1, '2019-01-30 05:51:16'),
(4, '2019-01-30-vdRzf', 10, 4, 6, 1, '2019-01-30 05:53:10'),
(5, '2019-01-30-7d9hK', 11, 4, 6, 1, '2019-01-30 05:55:03'),
(6, '2019-01-30-bxvqL', 12, 4, 6, 1, '2019-01-30 07:04:12'),
(7, '2019-01-30-OBqz3', 13, 5, 6, 1, '2019-01-30 07:06:32'),
(8, '2019-01-30-SbxgW', 14, 4, 6, 1, '2019-01-30 07:08:08'),
(9, '2019-01-30-Jdm21', 15, 4, 6, 1, '2019-01-30 07:46:47'),
(10, '2019-01-31-iMcvQ', 16, 4, 6, 1, '2019-01-31 05:56:56'),
(11, '2019-01-31-yeSdN', 17, 4, 6, 1, '2019-01-31 06:50:42'),
(12, '2019-01-31-1YbXh', 18, 6, 5, 1, '2019-01-31 06:52:55'),
(13, '2019-01-31-f6Mac', 19, 4, 6, 1, '2019-01-31 07:30:42'),
(14, '2019-01-31-zciFO', 20, 6, 4, 1, '2019-01-31 08:14:24'),
(15, '2019-01-31-IWa5L', 21, 4, 6, 1, '2019-01-31 10:06:23'),
(16, '2019-01-31-5sTxC', 22, 6, 4, 1, '2019-01-31 11:04:43'),
(17, '2019-01-31-gvP7q', 23, 6, 5, 1, '2019-01-31 11:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_material_item`
--

CREATE TABLE `Ilab_master_mr_material_item` (
  `slno_item_mr` int(11) NOT NULL,
  `mr_no_item` varchar(255) NOT NULL,
  `slno_mr_id` int(11) NOT NULL,
  `material_item_id` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `material_quantity` varchar(255) NOT NULL,
  `material_unit` varchar(255) NOT NULL,
  `material_id` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_details_item` text,
  `Approver_creator_id` varchar(255) DEFAULT NULL,
  `creator_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here list of mr list of material item need to received';

--
-- Dumping data for table `Ilab_master_mr_material_item`
--

INSERT INTO `Ilab_master_mr_material_item` (`slno_item_mr`, `mr_no_item`, `slno_mr_id`, `material_item_id`, `material_name`, `material_quantity`, `material_unit`, `material_id`, `edit_id`, `date_time`, `comment_details_item`, `Approver_creator_id`, `creator_id`) VALUES
(1, '2019-01-28-AVfzI', 1, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-28 07:20:39', NULL, NULL, NULL),
(2, '2019-01-28-AVfzI', 1, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-28 07:20:39', NULL, NULL, NULL),
(3, '2019-01-28-AVfzI', 1, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-28 07:20:39', NULL, NULL, NULL),
(4, '2019-01-28-AVfzI', 1, 6, 'material10', '1', '21', '10', 1, '2019-01-28 07:20:39', NULL, NULL, NULL),
(5, '2019-01-28-gLFf8', 2, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-28 07:22:00', NULL, NULL, NULL),
(6, '2019-01-28-gLFf8', 2, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-28 07:22:00', NULL, NULL, NULL),
(7, '2019-01-28-gLFf8', 2, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-28 07:22:00', NULL, NULL, NULL),
(8, '2019-01-28-gLFf8', 2, 6, 'material10', '1', '21', '10', 1, '2019-01-28 07:22:00', NULL, NULL, NULL),
(9, '2019-01-28-rIxGm', 3, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-28 07:24:03', NULL, NULL, NULL),
(10, '2019-01-28-rIxGm', 3, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-28 07:24:03', NULL, NULL, NULL),
(11, '2019-01-28-rIxGm', 3, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-28 07:24:03', NULL, NULL, NULL),
(12, '2019-01-28-rIxGm', 3, 6, 'material10', '1', '21', '10', 1, '2019-01-28 07:24:04', NULL, NULL, NULL),
(13, '2019-01-28-Svtup', 4, 9, 'material item 22', '1', 'nos', 'mat00910', 1, '2019-01-28 14:29:28', NULL, NULL, NULL),
(14, '2019-01-28-Svtup', 4, 5, 'Progressing cavity pump.', '1', 'Capacity', 'Mat003', 1, '2019-01-28 14:29:28', NULL, NULL, NULL),
(15, '2019-01-28-Svtup', 4, 3, 'Pump', '1', 'Horse Power', 'Mat001', 1, '2019-01-28 14:29:28', NULL, NULL, NULL),
(16, '2019-01-28-7aRzP', 5, 9, 'material item 22', '1', 'nos', 'mat00910', 1, '2019-01-28 14:30:07', NULL, NULL, NULL),
(17, '2019-01-28-7aRzP', 5, 5, 'Progressing cavity pump.', '1', 'Capacity', 'Mat003', 1, '2019-01-28 14:30:07', NULL, NULL, NULL),
(18, '2019-01-29-SifCO', 7, 9, 'material item 22', '1', 'nos', 'mat00910', 1, '2019-01-29 11:50:17', NULL, NULL, NULL),
(19, '2019-01-29-SifCO', 7, 5, 'Progressing cavity pump.', '1', 'Capacity', 'Mat003', 1, '2019-01-29 11:50:17', NULL, NULL, NULL),
(20, '2019-01-29-SifCO', 7, 3, 'Pump', '1', 'Horse Power', 'Mat001', 1, '2019-01-29 11:50:17', NULL, NULL, NULL),
(21, '2019-01-29-SifCO', 7, 4, 'Rotary lobe pump', '1', 'Max Pump volume', 'Mat002', 1, '2019-01-29 11:50:17', NULL, NULL, NULL),
(22, '2019-01-31-U7cF6', 24, 9, 'material item 22', '1', 'nos', 'mat00910', 1, '2019-01-31 11:09:22', NULL, NULL, NULL),
(23, '2019-01-31-U7cF6', 24, 5, 'Progressing cavity pump.', '1', 'Capacity', 'Mat003', 1, '2019-01-31 11:09:22', NULL, NULL, NULL),
(24, '2019-01-31-U7cF6', 24, 3, 'Pump', '1', 'Horse Power', 'Mat001', 1, '2019-01-31 11:09:22', NULL, NULL, NULL),
(25, '2019-01-31-U7cF6', 24, 4, 'Rotary lobe pump', '1', 'Max Pump volume', 'Mat002', 1, '2019-01-31 11:09:22', NULL, NULL, NULL),
(26, '2019-01-31-SpwWK', 25, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-31 12:25:37', NULL, NULL, NULL),
(27, '2019-01-31-SpwWK', 25, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-31 12:25:37', NULL, NULL, NULL),
(28, '2019-01-31-SpwWK', 25, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-31 12:25:37', NULL, NULL, NULL),
(29, '2019-01-31-SpwWK', 25, 6, 'material10', '1', '21', '10', 1, '2019-01-31 12:25:37', NULL, NULL, NULL),
(30, '2019-01-31-dpHBA', 26, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-31 12:26:33', NULL, NULL, NULL),
(31, '2019-01-31-dpHBA', 26, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-31 12:26:33', NULL, NULL, NULL),
(32, '2019-01-31-dpHBA', 26, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-31 12:26:33', NULL, NULL, NULL),
(33, '2019-01-31-dpHBA', 26, 6, 'material10', '1', '21', '10', 1, '2019-01-31 12:26:33', NULL, NULL, NULL),
(34, '2019-01-31-neULH', 27, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-31 12:27:27', NULL, NULL, NULL),
(35, '2019-01-31-neULH', 27, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-31 12:27:28', NULL, NULL, NULL),
(36, '2019-01-31-neULH', 27, 6, 'material10', '1', '21', '10', 1, '2019-01-31 12:27:28', NULL, NULL, NULL),
(37, '2019-01-31-JFCTV', 28, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-31 12:55:41', NULL, NULL, NULL),
(38, '2019-01-31-JFCTV', 28, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-31 12:55:42', NULL, NULL, NULL),
(39, '2019-01-31-sv7C4', 29, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-01-31 14:00:15', NULL, NULL, NULL),
(40, '2019-01-31-sv7C4', 29, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-01-31 14:00:16', NULL, NULL, NULL),
(41, '2019-01-31-sv7C4', 29, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-01-31 14:00:16', NULL, NULL, NULL),
(42, '2019-01-31-sv7C4', 29, 6, 'material10', '1', '21', '10', 1, '2019-01-31 14:00:16', NULL, NULL, NULL),
(43, '2019-02-01-kJV97', 30, 2, 'material item 1', '15', 'nos', 'mat001', 1, '2019-02-01 10:26:21', NULL, NULL, NULL),
(44, '2019-02-01-kJV97', 30, 7, 'material item 17', '50', 'nos', 'mat0087', 1, '2019-02-01 10:26:21', NULL, NULL, NULL),
(45, '2019-02-20-mxbMC', 31, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-02-20 07:48:51', NULL, NULL, NULL),
(46, '2019-02-20-poza4', 32, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-02-20 07:53:42', 'tt', NULL, NULL),
(47, '2019-02-20-poza4', 32, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-02-20 07:53:42', 'xx', NULL, NULL),
(48, '2019-02-20-zJmFa', 33, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-02-20 08:01:26', NULL, NULL, NULL),
(49, '2019-02-20-zJmFa', 33, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-02-20 08:01:26', NULL, NULL, NULL),
(50, '2019-02-20-FCepH', 34, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-02-20 08:03:38', NULL, NULL, NULL),
(51, '2019-02-20-FCepH', 34, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-02-20 08:03:38', NULL, NULL, NULL),
(52, '2019-02-20-Rcyqr', 35, 2, 'material item 1', '1', 'nos', 'mat001', 1, '2019-02-20 12:15:03', NULL, NULL, NULL),
(53, '2019-02-20-Rcyqr', 35, 7, 'material item 17', '1', 'nos', 'mat0087', 1, '2019-02-20 12:15:03', NULL, NULL, NULL),
(54, '2019-02-20-Rcyqr', 35, 8, 'material item 19', '1', 'nos', 'mat0018', 1, '2019-02-20 12:15:03', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_material_item_m`
--

CREATE TABLE `Ilab_master_mr_material_item_m` (
  `slno_item_mr` int(11) NOT NULL,
  `mr_no_item` varchar(255) NOT NULL,
  `slno_mr_id` int(11) NOT NULL,
  `material_item_id` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `material_quantity` varchar(255) NOT NULL,
  `material_unit` varchar(255) NOT NULL,
  `material_id` varchar(255) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_details_item` text,
  `Approver_creator_id` varchar(255) DEFAULT NULL,
  `creator_id` varchar(255) DEFAULT NULL,
  `parameter_tech` text,
  `Category_material` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here list of mr list of material item need to received';

--
-- Dumping data for table `Ilab_master_mr_material_item_m`
--

INSERT INTO `Ilab_master_mr_material_item_m` (`slno_item_mr`, `mr_no_item`, `slno_mr_id`, `material_item_id`, `material_name`, `material_quantity`, `material_unit`, `material_id`, `edit_id`, `date_time`, `comment_details_item`, `Approver_creator_id`, `creator_id`, `parameter_tech`, `Category_material`) VALUES
(1, 'O18191-950-E-K-30102-001', 1, 13, 'Wind-bandgap', '1', 'No', '4422', 1, '2019-03-16 12:50:56', NULL, NULL, NULL, 'bandgap in the range of 1 - 1.5 electronvolt (eV), whereas wide-bandgap materials have bandgaps in the range of 2 - 4 eV.', 'semiconductors'),
(2, 'O18191-950-E-K-30101-001', 2, 28, 'Valve', '1', 'No', 'ie2203', 1, '2019-03-16 13:13:12', NULL, NULL, NULL, 'Type=Butterfly,NB=100mm,MOC=SS316,Class=150#', 'Instrumentation Equipment'),
(3, 'O18191-950-E-K-30101-001', 2, 32, 'Valve 105', '1', 'No', 'ie6701', 1, '2019-03-16 13:13:12', NULL, NULL, NULL, 'xxx', 'Instrumentation Equipment'),
(4, 'O18191-950-E-K-30103-001', 3, 23, 'copper cable', '1', 'SET', '4432', 1, '2019-03-16 13:15:23', NULL, NULL, NULL, 'temperatures even approaching 200°C Cables using 85°C-rated polyethylene (PE) dielectric materials.', 'cables'),
(5, 'O18191-950-E-K-30103-001', 4, 24, 'coaxial cable', '1', '--', '4433', 1, '2019-03-16 13:15:23', NULL, NULL, NULL, 'Cables using 85°C-rated polyethylene', 'cables'),
(6, 'O18191-950-E-K-30104-001', 4, 1, 'electric bulb 100watt', '1', 'SET', '4410', 1, '2019-03-16 13:20:58', NULL, NULL, NULL, 'To improve the efficiency of the lamp, the filament usually consists of multiple coils of coiled fine wire, also known as a \'coiled coil\'. Light bulbs using coiled coil filaments are sometimes referred to as \'double-coil bulbs\'. For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(7, 'O18191-950-E-K-30104-001', 6, 2, 'candle flame bulb 60 watt', '1', 'No', '4411', 1, '2019-03-16 13:20:59', NULL, NULL, NULL, '?35 mm (~?11/8\") candle-flame shape, ?12 mm Edison screw', 'electrical'),
(8, 'O18191-950-E-K-30104-001', 7, 15, 'electric bulb 60 watt', '1', '1', '4424', 1, '2019-03-16 13:20:59', NULL, NULL, NULL, ' For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(9, 'O18191-950-E-K-30104-001', 8, 16, 'led bulb 100 watt', '1', 'set', '4425', 1, '2019-03-16 13:20:59', NULL, NULL, NULL, ' For a 100-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical '),
(10, 'O18191-950-E-K-30105-001', 5, 20, 'monocot wood', '1', 'set', '4429', 1, '2019-03-18 05:57:12', NULL, NULL, NULL, 'is fairly constant from 14 to 38 rings per inch (rings 0.7–1.8 mm thick), and decreases rapidly from 38 to 47 rings per inch (rings 0.5–0.7 mm thick). The strength at maximum load is not so great with the most rapid-growing wood; it is maximum with from 14 to 20 rings per inch (rings 1.3–1.8 mm thick), and again becomes less as the wood becomes more closely ringed. The natural deduction is that wood of first-class mechanical value shows from 5 to 20 rings per inch (rings 1.3–5 mm thick) and that slower growth yields poorer stock. ', 'wood'),
(11, 'O18191-950-E-K-30105-001', 10, 21, 'In-ring porous', '15', 'NO', '4430', 1, '2019-03-18 05:57:12', NULL, NULL, NULL, 'decreases rapidly from 38 to 47 rings per inch (rings 0.5–0.7 mm thick). The strength at maximum load is not so great with the most rapid-growing wood; it is maximum with from 14 to 20 rings per inch (rings 1.3–1.8 mm thick), and again becomes less as the wood becomes more closely ringed. The natural deduction is that wood of first-class mechanical value shows from 5 to 20 rings per inch (rings 1.3–5 mm thick) and that slower growth yields poorer stock. Thus the inspector or buyer of hickory should discriminate against timber that has more than 20 rings per inch (rings less than 1.3 mm thick).', 'wood'),
(12, 'O18191-950-E-K-30105-001', 11, 22, 'In-diffuse porous', '20', 'No', '4431', 1, '2019-03-18 05:57:12', NULL, NULL, NULL, '20 rings per inch (rings less than 1.3 mm thick', 'wood '),
(13, 'O18191-950-E-K-30107-001', 6, 3, 'fused silica glass', '25', 'Set', '4412', 1, '2019-03-18 05:58:49', NULL, NULL, NULL, ' silica (SiO2) in vitreous, or glass, form (i.e., its molecules are disordered and random, without crystalline structure). It has very low thermal expansion, is very hard, and resists high temperatures (1000–1500 °C). It is also the most resistant against weathering (caused in other glasses by alkali ions leaching out of the glass, while staining it). Fused quartz is used for high-temperature applications such as furnace tubes, lighting tubes, melting crucibles, etc.', 'glass'),
(14, 'O18191-950-E-K-30107-001', 13, 4, 'fiber glass', '1', 'Set', '4413', 1, '2019-03-18 05:58:49', NULL, NULL, NULL, 'Fiberglass filaments are made through a pultrusion process in which the raw materials (sand, limestone, kaolin clay, fluorspar, colemanite, dolomite and other minerals) are melted in a large furnace into a liquid which is extruded through very small orifices (5–25 micrometres in diameter if the glass is E-glass and 9 micrometers if the glass is S-glass).', 'glass'),
(15, 'O18191-950-E-K-30107-001', 14, 5, 'fused silica glass', '200', 'Na', '4414', 1, '2019-03-18 05:58:49', NULL, NULL, NULL, ' silica (SiO2) in vitreous, or glass, form (i.e., its molecules are disordered and random, without crystalline structure). It has very low thermal expansion, is very hard, and resists high temperatures (1000–1500 °C). It is also the most resistant against weathering (caused in other glasses by alkali ions leaching out of the glass, while staining it). Fused quartz is used for high-temperature applications such as furnace tubes, lighting tubes, melting crucibles, etc.', 'Glass'),
(16, 'O18191-950-E-K-30107-001', 15, 17, 'network glass', '250', 'NO', '4426', 1, '2019-03-18 05:58:49', NULL, NULL, NULL, 'resulting glass contains about 70 to 74% silica by weight and is called a soda-lime glass.[4] Soda-lime glasses account for about 90% of manufactured glass.', 'glass'),
(17, 'O18191-950-E-K-30107-001', 16, 18, 'fused quartz', '100', 'Set', '4427', 1, '2019-03-18 05:58:49', NULL, NULL, NULL, 'glass, form (i.e., its molecules are disordered and random, without crystalline structure). It has very low thermal expansion, is very hard, and resists high temperatures (1000–1500 °C). It is also the most resistant against weathering (caused in other glasses by alkali ions leaching out of the glass, while staining it).', 'glass'),
(18, 'O18191-950-E-K-30107-001', 17, 19, 'window glass', '1', 'na', '4428', 1, '2019-03-18 05:58:49', NULL, NULL, NULL, ' Is transparent, easily formed and most suitable for window glass (see flat glass). It has a high thermal expansion and poor resistance to heat[15] (500–600 °C).] It is used for windows, some low-temperature incandescent light bulbs, and tableware. Container glass is a soda-lime glass that is a slight variation on flat glass, which uses more alumina and calcium, and less sodium and magnesium, which are more water-soluble. This makes it less susceptible to water erosion.', 'glass'),
(19, 'O18191-950-E-K-30101-001', 2, 28, 'Valve', '1', 'No', 'ie2203', 2, '2019-03-19 12:46:16', NULL, NULL, NULL, 'Type=Butterfly,NB=100mm,MOC=SS316,Class=150#', 'Instrumentation Equipment'),
(20, 'O18191-950-E-K-30101-001', 2, 32, 'Valve 105', '1', 'No', 'ie6701', 2, '2019-03-19 12:46:16', NULL, NULL, NULL, 'xxx', 'Instrumentation Equipment'),
(21, 'O18191-950-E-K-30101-001', 2, 28, 'Valve', '1', 'No', 'ie2203', 3, '2019-03-19 13:08:47', NULL, NULL, NULL, 'Type=Butterfly,NB=100mm,MOC=SS316,Class=150#', 'Instrumentation Equipment'),
(22, 'O18191-950-E-K-30101-001', 2, 32, 'Valve 105', '1', 'No', 'ie6701', 3, '2019-03-19 13:08:47', NULL, NULL, NULL, 'xxx', 'Instrumentation Equipment'),
(23, 'O18191-950-E-K-30106-001', 7, 1, 'electric bulb 100watt', '1', 'SET', '4410', 1, '2019-03-21 05:33:44', NULL, NULL, NULL, 'To improve the efficiency of the lamp, the filament usually consists of multiple coils of coiled fine wire, also known as a \'coiled coil\'. Light bulbs using coiled coil filaments are sometimes referred to as \'double-coil bulbs\'. For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(24, 'O18191-950-E-K-30106-001', 23, 2, 'candle flame bulb 60 watt', '100', 'No', '4411', 1, '2019-03-21 05:33:44', NULL, NULL, NULL, '?35 mm (~?11/8\") candle-flame shape, ?12 mm Edison screw', 'electrical'),
(25, 'O18191-950-E-K-30106-001', 24, 15, 'electric bulb 60 watt', '200', '1', '4424', 1, '2019-03-21 05:33:45', NULL, NULL, NULL, ' For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(26, 'O18191-950-E-K-30106-001', 25, 16, 'led bulb 100 watt', '500', 'set', '4425', 1, '2019-03-21 05:33:45', NULL, NULL, NULL, ' For a 100-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical '),
(27, 'O18191-950-E-K-30108-001', 8, 1, 'electric bulb 100watt', '1', 'SET', '4410', 1, '2019-03-21 05:40:02', NULL, NULL, NULL, 'To improve the efficiency of the lamp, the filament usually consists of multiple coils of coiled fine wire, also known as a \'coiled coil\'. Light bulbs using coiled coil filaments are sometimes referred to as \'double-coil bulbs\'. For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(28, 'O18191-950-E-K-30108-001', 27, 2, 'candle flame bulb 60 watt', '1', 'No', '4411', 1, '2019-03-21 05:40:02', NULL, NULL, NULL, '?35 mm (~?11/8\") candle-flame shape, ?12 mm Edison screw', 'electrical'),
(29, 'O18191-950-E-K-30108-001', 28, 15, 'electric bulb 60 watt', '100', '1', '4424', 1, '2019-03-21 05:40:02', NULL, NULL, NULL, ' For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(30, 'O18191-950-E-K-30108-001', 29, 16, 'led bulb 100 watt', '200', 'set', '4425', 1, '2019-03-21 05:40:02', NULL, NULL, NULL, ' For a 100-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical '),
(31, 'O18191-950-E-K-30109-001', 9, 1, 'electric bulb 100watt', '1', 'SET', '4410', 1, '2019-03-23 10:53:59', NULL, NULL, NULL, 'To improve the efficiency of the lamp, the filament usually consists of multiple coils of coiled fine wire, also known as a \'coiled coil\'. Light bulbs using coiled coil filaments are sometimes referred to as \'double-coil bulbs\'. For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(32, 'O18191-950-E-K-30109-001', 31, 2, 'candle flame bulb 60 watt', '1', 'No', '4411', 1, '2019-03-23 10:53:59', NULL, NULL, NULL, '?35 mm (~?11/8\") candle-flame shape, ?12 mm Edison screw', 'electrical'),
(33, 'O18191-950-E-K-30109-001', 32, 15, 'electric bulb 60 watt', '1', '1', '4424', 1, '2019-03-23 10:53:59', NULL, NULL, NULL, ' For a 60-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical'),
(34, 'O18191-950-E-K-30109-001', 33, 16, 'led bulb 100 watt', '1', 'set', '4425', 1, '2019-03-23 10:54:00', NULL, NULL, NULL, ' For a 100-watt 120-volt lamp, the uncoiled length of the tungsten filament is usually 22.8 inches (580 mm)', 'electrical ');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_technical_parameter_info`
--

CREATE TABLE `Ilab_master_mr_technical_parameter_info` (
  `slno_para` int(11) NOT NULL,
  `mr_no_tech` varchar(255) NOT NULL,
  `slno_mr_id_tech` int(11) NOT NULL,
  `tech_slno_id` int(11) NOT NULL,
  `tech_name` varchar(255) NOT NULL,
  `tech_details` text NOT NULL,
  `slno_item_mr_tech` int(11) NOT NULL,
  `edit_id` int(11) NOT NULL,
  `date_tiime_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here technical parameter of mr creation';

--
-- Dumping data for table `Ilab_master_mr_technical_parameter_info`
--

INSERT INTO `Ilab_master_mr_technical_parameter_info` (`slno_para`, `mr_no_tech`, `slno_mr_id_tech`, `tech_slno_id`, `tech_name`, `tech_details`, `slno_item_mr_tech`, `edit_id`, `date_tiime_entered`) VALUES
(1, '2019-01-28-AVfzI', 1, 9, 'tech34311', 'xxxxx', 1, 1, '2019-01-28 07:20:39'),
(2, '2019-01-28-AVfzI', 1, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 2, 1, '2019-01-28 07:20:39'),
(3, '2019-01-28-AVfzI', 1, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 2, 1, '2019-01-28 07:20:39'),
(4, '2019-01-28-AVfzI', 1, 8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 3, 1, '2019-01-28 07:20:39'),
(5, '2019-01-28-AVfzI', 1, 2, 'tec10', 'xxx', 4, 1, '2019-01-28 07:20:39'),
(6, '2019-01-28-AVfzI', 1, 4, '67tyu', 'cvbnmxrt', 4, 1, '2019-01-28 07:20:39'),
(7, '2019-01-28-AVfzI', 1, 5, 'BNTRY', 'bnmiyutre', 4, 1, '2019-01-28 07:20:39'),
(8, '2019-01-28-AVfzI', 1, 10, 'tech454', 'xxxxx', 4, 1, '2019-01-28 07:20:39'),
(9, '2019-01-28-gLFf8', 2, 9, 'tech34311', 'xxxxx', 5, 1, '2019-01-28 07:22:00'),
(10, '2019-01-28-gLFf8', 2, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 6, 1, '2019-01-28 07:22:00'),
(11, '2019-01-28-gLFf8', 2, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 6, 1, '2019-01-28 07:22:00'),
(12, '2019-01-28-gLFf8', 2, 8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 7, 1, '2019-01-28 07:22:00'),
(13, '2019-01-28-gLFf8', 2, 2, 'tec10', 'xxx', 8, 1, '2019-01-28 07:22:00'),
(14, '2019-01-28-gLFf8', 2, 4, '67tyu', 'cvbnmxrt', 8, 1, '2019-01-28 07:22:00'),
(15, '2019-01-28-gLFf8', 2, 5, 'BNTRY', 'bnmiyutre', 8, 1, '2019-01-28 07:22:00'),
(16, '2019-01-28-gLFf8', 2, 10, 'tech454', 'xxxxx', 8, 1, '2019-01-28 07:22:00'),
(17, '2019-01-28-rIxGm', 3, 9, 'tech34311', 'xxxxx', 9, 1, '2019-01-28 07:24:03'),
(18, '2019-01-28-rIxGm', 3, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 10, 1, '2019-01-28 07:24:03'),
(19, '2019-01-28-rIxGm', 3, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 10, 1, '2019-01-28 07:24:03'),
(20, '2019-01-28-rIxGm', 3, 8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 11, 1, '2019-01-28 07:24:03'),
(21, '2019-01-28-rIxGm', 3, 2, 'tec10', 'xxx', 12, 1, '2019-01-28 07:24:04'),
(22, '2019-01-28-rIxGm', 3, 4, '67tyu', 'cvbnmxrt', 12, 1, '2019-01-28 07:24:04'),
(23, '2019-01-28-rIxGm', 3, 5, 'BNTRY', 'bnmiyutre', 12, 1, '2019-01-28 07:24:04'),
(24, '2019-01-28-rIxGm', 3, 10, 'tech454', 'xxxxx', 12, 1, '2019-01-28 07:24:04'),
(25, '2019-01-28-Svtup', 4, 0, 'No Parameter Found', 'No details Found', 13, 1, '2019-01-28 14:29:28'),
(26, '2019-01-28-Svtup', 4, 0, 'No Parameter Found', 'No details Found', 14, 1, '2019-01-28 14:29:28'),
(27, '2019-01-28-Svtup', 4, 3, 'tec10', 'xxx', 15, 1, '2019-01-28 14:29:28'),
(28, '2019-01-28-7aRzP', 5, 0, 'No Parameter Found', 'No details Found', 16, 1, '2019-01-28 14:30:07'),
(29, '2019-01-28-7aRzP', 5, 0, 'No Parameter Found', 'No details Found', 17, 1, '2019-01-28 14:30:07'),
(30, '2019-01-29-SifCO', 7, 0, 'No Parameter Found', 'No details Found', 18, 1, '2019-01-29 11:50:17'),
(31, '2019-01-29-SifCO', 7, 0, 'No Parameter Found', 'No details Found', 19, 1, '2019-01-29 11:50:17'),
(32, '2019-01-29-SifCO', 7, 3, 'tec10', 'xxx', 20, 1, '2019-01-29 11:50:17'),
(33, '2019-01-29-SifCO', 7, 0, 'No Parameter Found', 'No details Found', 21, 1, '2019-01-29 11:50:17'),
(34, '2019-01-31-U7cF6', 24, 0, 'No Parameter Found', 'No details Found', 22, 1, '2019-01-31 11:09:22'),
(35, '2019-01-31-U7cF6', 24, 0, 'No Parameter Found', 'No details Found', 23, 1, '2019-01-31 11:09:22'),
(36, '2019-01-31-U7cF6', 24, 0, 'No Parameter Found', 'No details Found', 25, 1, '2019-01-31 11:09:22'),
(37, '2019-01-31-neULH', 27, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 34, 1, '2019-01-31 12:27:27'),
(38, '2019-01-31-neULH', 27, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 34, 1, '2019-01-31 12:27:28'),
(39, '2019-01-31-neULH', 27, 8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 35, 1, '2019-01-31 12:27:28'),
(40, '2019-01-31-neULH', 27, 2, 'tec10', 'xxx', 36, 1, '2019-01-31 12:27:28'),
(41, '2019-01-31-neULH', 27, 4, '67tyu', 'cvbnmxrt', 36, 1, '2019-01-31 12:27:28'),
(42, '2019-01-31-neULH', 27, 5, 'BNTRY', 'bnmiyutre', 36, 1, '2019-01-31 12:27:28'),
(43, '2019-01-31-neULH', 27, 10, 'tech454', 'xxxxx', 36, 1, '2019-01-31 12:27:28'),
(44, '2019-01-31-JFCTV', 28, 9, 'tech34311', 'xxxxx', 37, 1, '2019-01-31 12:55:42'),
(45, '2019-01-31-JFCTV', 28, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 38, 1, '2019-01-31 12:55:42'),
(46, '2019-01-31-JFCTV', 28, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 38, 1, '2019-01-31 12:55:42'),
(47, '2019-01-31-sv7C4', 29, 9, 'tech34311', 'xxxxx', 39, 1, '2019-01-31 14:00:15'),
(48, '2019-01-31-sv7C4', 29, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 40, 1, '2019-01-31 14:00:16'),
(49, '2019-01-31-sv7C4', 29, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 40, 1, '2019-01-31 14:00:16'),
(50, '2019-01-31-sv7C4', 29, 8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 41, 1, '2019-01-31 14:00:16'),
(51, '2019-01-31-sv7C4', 29, 2, 'tec10', 'xxx', 42, 1, '2019-01-31 14:00:16'),
(52, '2019-01-31-sv7C4', 29, 4, '67tyu', 'cvbnmxrt', 42, 1, '2019-01-31 14:00:16'),
(53, '2019-01-31-sv7C4', 29, 5, 'BNTRY', 'bnmiyutre', 42, 1, '2019-01-31 14:00:16'),
(54, '2019-01-31-sv7C4', 29, 10, 'tech454', 'xxxxx', 42, 1, '2019-01-31 14:00:16'),
(55, '2019-02-20-mxbMC', 31, 9, 'tech34311', 'xxxxx', 45, 1, '2019-02-20 07:48:51'),
(56, '2019-02-20-poza4', 32, 9, 'tech34311', 'xxxxx', 46, 1, '2019-02-20 07:52:30'),
(57, '2019-02-20-poza4', 32, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 47, 1, '2019-02-20 07:52:30'),
(58, '2019-02-20-poza4', 32, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 47, 1, '2019-02-20 07:52:30'),
(59, '2019-02-20-zJmFa', 33, 9, 'tech34311', 'xxxxx', 48, 1, '2019-02-20 08:01:26'),
(60, '2019-02-20-zJmFa', 33, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 49, 1, '2019-02-20 08:01:26'),
(61, '2019-02-20-zJmFa', 33, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 49, 1, '2019-02-20 08:01:26'),
(62, '2019-02-20-FCepH', 34, 9, 'tech34311', 'xxxxx', 50, 1, '2019-02-20 08:03:38'),
(63, '2019-02-20-FCepH', 34, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 51, 1, '2019-02-20 08:03:38'),
(64, '2019-02-20-FCepH', 34, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 51, 1, '2019-02-20 08:03:38'),
(65, '2019-02-20-Rcyqr', 35, 9, 'tech34311', 'xxxxx', 52, 1, '2019-02-20 12:15:03'),
(66, '2019-02-20-Rcyqr', 35, 6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 53, 1, '2019-02-20 12:15:03'),
(67, '2019-02-20-Rcyqr', 35, 7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 53, 1, '2019-02-20 12:15:03'),
(68, '2019-02-20-Rcyqr', 35, 8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 54, 1, '2019-02-20 12:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_mr_vehicle_mr_detail`
--

CREATE TABLE `Ilab_master_mr_vehicle_mr_detail` (
  `slno_mr_logistic` int(11) NOT NULL,
  `mr_no_vehicle` varchar(255) NOT NULL,
  `slno_mr_id_vehicle` int(11) NOT NULL,
  `vehicle_slno_id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_capcity` varchar(255) NOT NULL,
  `from_location_name` varchar(255) DEFAULT NULL,
  `from_location_slno` int(11) DEFAULT NULL,
  `to_location_name` varchar(255) DEFAULT NULL,
  `to_location_slno` int(11) DEFAULT NULL,
  `purpose_info` text,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_it` int(11) NOT NULL DEFAULT '0',
  `approver_id` varchar(255) DEFAULT NULL,
  `mr_creater` varchar(255) DEFAULT NULL,
  `no_vehcile` varchar(255) NOT NULL,
  `comment_details_vechile` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_mr_vehicle_mr_detail`
--

INSERT INTO `Ilab_master_mr_vehicle_mr_detail` (`slno_mr_logistic`, `mr_no_vehicle`, `slno_mr_id_vehicle`, `vehicle_slno_id`, `vehicle_type`, `vehicle_capcity`, `from_location_name`, `from_location_slno`, `to_location_name`, `to_location_slno`, `purpose_info`, `date_entry`, `edit_it`, `approver_id`, `mr_creater`, `no_vehcile`, `comment_details_vechile`) VALUES
(1, '2019-01-28-lXMjU', 6, 4, 'vehicle12', '60000ponds', 'nayapali', 5, 'irc', 4, ' Alphabet Inc. is an American multinational conglomerate headquartered in Mountain View, California. It was created through a corporate restructuring of Google on October 2, 2015, and became the parent company of Google and several former G', '2019-01-28 14:36:00', 1, NULL, 'design2@ilab.com', '15', NULL),
(2, '2019-01-28-lXMjU', 6, 3, 'vehicle12', '60000ponds', 'nayapali', 5, 'location1221', 6, ' Alphabet Inc. is an American multinational conglomerate headquartered in Mountain View, California. It was created through a corporate restructuring of Google on October 2, 2015, and became the parent company of Google and several former G', '2019-01-28 14:36:00', 1, NULL, 'design2@ilab.com', '70', NULL),
(3, '2019-01-28-lXMjU', 6, 8, 'vehicle10', '50s ponds', 'irc', 4, 'location1221', 6, ' View the basic GOOG stock chart on Yahoo Finance. Change the date range and chart type, and compare Alphabet Inc. against other companies.\r\n', '2019-01-28 14:36:00', 1, NULL, 'design2@ilab.com', '55', NULL),
(4, '2019-01-28-lXMjU', 6, 6, 'vehicle10', '5ponds', 'nayapali', 5, 'irc', 4, ' Alphabet Inc. is an American multinational conglomerate headquartered in Mountain View, California. It was created through a corporate restructuring of Google on October 2, 2015, and became the parent company of Google and several former G', '2019-01-28 14:36:00', 1, NULL, 'design2@ilab.com', '100', NULL),
(5, '2019-01-29-N6T0Z', 8, 6, 'vehicle10', '5ponds', 'irc', 4, 'location1221', 6, ' official', '2019-01-29 11:51:32', 1, NULL, 'design2@ilab.com', '1', NULL),
(6, '2019-01-29-N6T0Z', 8, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, ' test', '2019-01-29 11:51:32', 1, NULL, 'design2@ilab.com', '1', NULL),
(7, '2019-01-30-wyV20', 9, 6, 'vehicle10', '5ponds', 'irc', 4, 'location1221', 6, ' offficial', '2019-01-30 05:51:16', 1, NULL, 'design2@ilab.com', '1', NULL),
(8, '2019-01-30-wyV20', 9, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, ' test', '2019-01-30 05:51:16', 1, NULL, 'design2@ilab.com', '1', NULL),
(9, '2019-01-30-wyV20', 9, 9, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, ' official', '2019-01-30 05:51:16', 1, NULL, 'design2@ilab.com', '1', NULL),
(10, '2019-01-30-wyV20', 9, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'irc', 4, ' recheck', '2019-01-30 05:51:16', 1, NULL, 'design2@ilab.com', '1', NULL),
(11, '2019-01-30-vdRzf', 10, 6, 'vehicle10', '5ponds', 'nayapali', 5, 'location1221', 6, ' official', '2019-01-30 05:53:10', 1, NULL, 'design2@ilab.com', '1', NULL),
(12, '2019-01-30-vdRzf', 10, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' test', '2019-01-30 05:53:10', 1, NULL, 'design2@ilab.com', '1', NULL),
(13, '2019-01-30-vdRzf', 10, 9, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, ' official', '2019-01-30 05:53:10', 1, NULL, 'design2@ilab.com', '1', NULL),
(14, '2019-01-30-vdRzf', 10, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'irc', 4, ' recheck', '2019-01-30 05:53:10', 1, NULL, 'design2@ilab.com', '1', NULL),
(15, '2019-01-30-7d9hK', 11, 6, 'vehicle10', '5ponds', 'irc', 4, 'location1221', 6, ' test', '2019-01-30 05:55:03', 1, NULL, 'design2@ilab.com', '1', NULL),
(16, '2019-01-30-7d9hK', 11, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, ' official', '2019-01-30 05:55:03', 1, NULL, 'design2@ilab.com', '1', NULL),
(17, '2019-01-30-7d9hK', 11, 9, 'vehicle10', '50s ponds', 'nayapali', 5, 'irc', 4, ' test', '2019-01-30 05:55:03', 1, NULL, 'design2@ilab.com', '1', NULL),
(18, '2019-01-30-7d9hK', 11, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'nayapali', 5, ' okay', '2019-01-30 05:55:03', 1, NULL, 'design2@ilab.com', '1', NULL),
(19, '2019-01-30-bxvqL', 12, 6, 'vehicle10', '5ponds', 'irc', 4, 'location1221', 6, ' offc', '2019-01-30 07:04:12', 1, NULL, 'design2@ilab.com', '1', NULL),
(20, '2019-01-30-bxvqL', 12, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'nayapali', 5, ' test', '2019-01-30 07:04:12', 1, NULL, 'design2@ilab.com', '1', NULL),
(21, '2019-01-30-bxvqL', 12, 9, 'vehicle10', '50s ponds', 'location1221', 6, 'nayapali', 5, ' ofc', '2019-01-30 07:04:12', 1, NULL, 'design2@ilab.com', '1', NULL),
(22, '2019-01-30-bxvqL', 12, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'irc', 4, ' ofc', '2019-01-30 07:04:12', 1, NULL, 'design2@ilab.com', '1', NULL),
(23, '2019-01-30-bxvqL', 12, 4, 'vehicle12', '60000ponds', 'nayapali', 5, 'location1221', 6, ' ofc', '2019-01-30 07:04:12', 1, NULL, 'design2@ilab.com', '1', NULL),
(24, '2019-01-30-OBqz3', 13, 6, 'vehicle10', '5ponds', 'location1221', 6, 'nayapali', 5, ' ofc', '2019-01-30 07:06:32', 1, NULL, 'design2@ilab.com', '1', NULL),
(25, '2019-01-30-OBqz3', 13, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'irc', 4, ' ofc', '2019-01-30 07:06:32', 1, NULL, 'design2@ilab.com', '1', NULL),
(26, '2019-01-30-OBqz3', 13, 9, 'vehicle10', '50s ponds', 'irc', 4, 'location1221', 6, ' ofc', '2019-01-30 07:06:32', 1, NULL, 'design2@ilab.com', '1', NULL),
(27, '2019-01-30-OBqz3', 13, 3, 'vehicle12', '60000ponds', 'nayapali', 5, 'location1221', 6, ' ofc', '2019-01-30 07:06:32', 1, NULL, 'design2@ilab.com', '1', NULL),
(28, '2019-01-30-SbxgW', 14, 6, 'vehicle10', '5ponds', 'location1221', 6, 'irc', 4, ' recheck', '2019-01-30 07:08:08', 1, NULL, 'design2@ilab.com', '1', NULL),
(29, '2019-01-30-SbxgW', 14, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' ofc', '2019-01-30 07:08:08', 1, NULL, 'design2@ilab.com', '1', NULL),
(30, '2019-01-30-SbxgW', 14, 9, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' ofc', '2019-01-30 07:08:08', 1, NULL, 'design2@ilab.com', '1', NULL),
(31, '2019-01-30-SbxgW', 14, 3, 'vehicle12', '60000ponds', 'nayapali', 5, 'irc', 4, ' ofc', '2019-01-30 07:08:08', 1, NULL, 'design2@ilab.com', '1', NULL),
(32, '2019-01-30-Jdm21', 15, 6, 'vehicle10', '5ponds', 'nayapali', 5, 'location1221', 6, ' ofc', '2019-01-30 07:46:47', 1, NULL, 'design2@ilab.com', '1', NULL),
(33, '2019-01-30-Jdm21', 15, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' ofc', '2019-01-30 07:46:47', 1, NULL, 'design2@ilab.com', '1', NULL),
(34, '2019-01-30-Jdm21', 15, 9, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' ofc', '2019-01-30 07:46:47', 1, NULL, 'design2@ilab.com', '1', NULL),
(35, '2019-01-30-Jdm21', 15, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'nayapali', 5, ' ofc', '2019-01-30 07:46:47', 1, NULL, 'design2@ilab.com', '1', NULL),
(36, '2019-01-31-iMcvQ', 16, 6, 'vehicle10', '5ponds', 'location1221', 6, 'nayapali', 5, ' official', '2019-01-31 05:56:56', 1, NULL, 'design2@ilab.com', '1', NULL),
(37, '2019-01-31-iMcvQ', 16, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, ' recheck', '2019-01-31 05:56:56', 1, NULL, 'design2@ilab.com', '1', NULL),
(38, '2019-01-31-iMcvQ', 16, 9, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' test', '2019-01-31 05:56:56', 1, NULL, 'design2@ilab.com', '1', NULL),
(39, '2019-01-31-yeSdN', 17, 6, 'vehicle10', '5ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 06:50:42', 1, NULL, 'design2@ilab.com', '1', NULL),
(40, '2019-01-31-yeSdN', 17, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'nayapali', 5, ' test', '2019-01-31 06:50:42', 1, NULL, 'design2@ilab.com', '1', NULL),
(41, '2019-01-31-1YbXh', 18, 6, 'vehicle10', '5ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 06:52:55', 1, NULL, 'design2@ilab.com', '1', NULL),
(42, '2019-01-31-1YbXh', 18, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 06:52:55', 1, NULL, 'design2@ilab.com', '1', NULL),
(43, '2019-01-31-f6Mac', 19, 6, 'vehicle10', '5ponds', 'nayapali', 5, 'location1221', 6, ' official', '2019-01-31 07:30:42', 1, NULL, 'design2@ilab.com', '15', NULL),
(44, '2019-01-31-f6Mac', 19, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 07:30:42', 1, NULL, 'design2@ilab.com', '11', NULL),
(45, '2019-01-31-f6Mac', 19, 3, 'vehicle12', '60000ponds', 'nayapali', 5, 'irc', 4, ' official', '2019-01-31 07:30:42', 1, NULL, 'design2@ilab.com', '17', NULL),
(46, '2019-01-31-f6Mac', 19, 4, 'vehicle12', '60000ponds', 'nayapali', 5, 'location1221', 6, ' official', '2019-01-31 07:30:42', 1, NULL, 'design2@ilab.com', '10', NULL),
(47, '2019-01-31-zciFO', 20, 6, 'vehicle10', '5ponds', 'location1221', 6, 'nayapali', 5, ' official', '2019-01-31 08:14:24', 1, NULL, 'design2@ilab.com', '1', NULL),
(48, '2019-01-31-zciFO', 20, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, '  official', '2019-01-31 08:14:24', 1, NULL, 'design2@ilab.com', '1', NULL),
(49, '2019-01-31-zciFO', 20, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 08:14:24', 1, NULL, 'design2@ilab.com', '17', NULL),
(50, '2019-01-31-zciFO', 20, 4, 'vehicle12', '60000ponds', 'nayapali', 5, 'irc', 4, ' official', '2019-01-31 08:14:24', 1, NULL, 'design2@ilab.com', '11', NULL),
(51, '2019-01-31-IWa5L', 21, 6, 'vehicle10', '5ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 10:06:23', 1, NULL, 'design2@ilab.com', '15', NULL),
(52, '2019-01-31-IWa5L', 21, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'irc', 4, ' official', '2019-01-31 10:06:23', 1, NULL, 'design2@ilab.com', '11', NULL),
(53, '2019-01-31-IWa5L', 21, 9, 'vehicle10', '50s ponds', 'location1221', 6, 'nayapali', 5, ' official', '2019-01-31 10:06:23', 1, NULL, 'design2@ilab.com', '15', NULL),
(54, '2019-01-31-IWa5L', 21, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 10:06:23', 1, NULL, 'design2@ilab.com', '17', NULL),
(55, '2019-01-31-IWa5L', 21, 4, 'vehicle12', '60000ponds', 'irc', 4, 'location1221', 6, ' official', '2019-01-31 10:06:23', 1, NULL, 'design2@ilab.com', '17', NULL),
(56, '2019-01-31-5sTxC', 22, 6, 'vehicle10', '5ponds', 'irc', 4, 'location1221', 6, ' official', '2019-01-31 11:04:43', 1, NULL, 'design2@ilab.com', '1', NULL),
(57, '2019-01-31-5sTxC', 22, 8, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, 'official', '2019-01-31 11:04:43', 1, NULL, 'design2@ilab.com', '1', NULL),
(58, '2019-01-31-5sTxC', 22, 3, 'vehicle12', '60000ponds', 'location1221', 6, 'irc', 4, 'test', '2019-01-31 11:04:43', 1, NULL, 'design2@ilab.com', '1', NULL),
(59, '2019-01-31-5sTxC', 22, 4, 'vehicle12', '60000ponds', 'nayapali', 5, 'location1221', 6, ' test', '2019-01-31 11:04:43', 1, NULL, 'design2@ilab.com', '1', NULL),
(60, '2019-01-31-gvP7q', 23, 6, 'vehicle10', '5ponds', 'location1221', 6, 'irc', 4, ' official', '2019-01-31 11:08:28', 1, NULL, 'design2@ilab.com', '1', NULL),
(61, '2019-01-31-gvP7q', 23, 8, 'vehicle10', '50s ponds', 'nayapali', 5, 'location1221', 6, 'official', '2019-01-31 11:08:28', 1, NULL, 'design2@ilab.com', '1', NULL),
(62, '2019-01-31-gvP7q', 23, 9, 'vehicle10', '50s ponds', 'location1221', 6, 'irc', 4, 'official', '2019-01-31 11:08:28', 1, NULL, 'design2@ilab.com', '11', NULL),
(63, '2019-01-31-gvP7q', 23, 3, 'vehicle12', '60000ponds', 'nayapali', 5, 'irc', 4, ' test', '2019-01-31 11:08:28', 1, NULL, 'design2@ilab.com', '15', NULL),
(64, '2019-01-31-gvP7q', 23, 4, 'vehicle12', '60000ponds', 'location1221', 6, 'nayapali', 5, ' test', '2019-01-31 11:08:28', 1, NULL, 'design2@ilab.com', '17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_new_order_book`
--

CREATE TABLE `Ilab_master_new_order_book` (
  `Slno_n_order` int(11) NOT NULL,
  `Slno_project` int(11) NOT NULL,
  `Job_code` varchar(255) NOT NULL,
  `Job_description` text NOT NULL,
  `Project_name` varchar(255) NOT NULL,
  `LOI_date_contract` date DEFAULT NULL,
  `Contract_sign_date` date DEFAULT NULL,
  `Contract_value` varchar(255) DEFAULT NULL,
  `Supply_order_value` varchar(255) DEFAULT NULL,
  `Contract_start_date` varchar(255) DEFAULT NULL,
  `Contractual_completion` varchar(255) DEFAULT NULL,
  `Contract_duration` varchar(255) DEFAULT NULL,
  `Remark` text,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Date_entry` date NOT NULL,
  `Time_entry` time NOT NULL,
  `Contract_ending_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_new_order_book`
--

INSERT INTO `Ilab_master_new_order_book` (`Slno_n_order`, `Slno_project`, `Job_code`, `Job_description`, `Project_name`, `LOI_date_contract`, `Contract_sign_date`, `Contract_value`, `Supply_order_value`, `Contract_start_date`, `Contractual_completion`, `Contract_duration`, `Remark`, `Status`, `Date_entry`, `Time_entry`, `Contract_ending_date`) VALUES
(1, 1, '0770', 'This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to seem ok to me preetish', 'project 1', '2018-09-29', '2018-11-08', '2018-09-29', '25089', '2019-02-02', '2019-04-20', '6 month', 'For switch statements, case statements must be indented once from switch, and bodies for the cases must be indented once from case. When not breaking after any kind of operations in case, you must write a comment.', 1, '2018-09-29', '12:54:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_procurement_MR`
--

CREATE TABLE `Ilab_master_procurement_MR` (
  `Slno_procurement` int(11) NOT NULL,
  `Mr_id` varchar(255) NOT NULL,
  `Slno_MR_id` int(11) NOT NULL,
  `Job_code` varchar(255) NOT NULL,
  `Slno_approver_id` int(11) NOT NULL,
  `Procurement_id` varchar(255) NOT NULL,
  `Procurement_name` varchar(255) NOT NULL,
  `buyer_name` varchar(255) DEFAULT NULL,
  `buyer_id` varchar(255) DEFAULT NULL,
  `Date_process` date NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT '1->active 2->inactiove 3->delete ',
  `Forward_status` int(11) NOT NULL DEFAULT '0' COMMENT '1->sending 2->pending 0->unauthorised',
  `Material_id` varchar(255) NOT NULL,
  `Edit_id` int(11) NOT NULL,
  `Technical_type` int(11) NOT NULL DEFAULT '0' COMMENT 'o->nothing 1->yes 2->no  technical submission',
  `Forward_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_procurement_MR`
--

INSERT INTO `Ilab_master_procurement_MR` (`Slno_procurement`, `Mr_id`, `Slno_MR_id`, `Job_code`, `Slno_approver_id`, `Procurement_id`, `Procurement_name`, `buyer_name`, `buyer_id`, `Date_process`, `Status`, `Forward_status`, `Material_id`, `Edit_id`, `Technical_type`, `Forward_date`) VALUES
(1, '2019-01-28-AVfzI', 1, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-28', 1, 1, '1', 1, 2, '2019-01-28'),
(2, '2019-01-28-gLFf8', 2, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-28', 1, 1, '1', 1, 2, '2019-01-28'),
(3, '2019-01-28-Svtup', 4, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-28', 1, 1, '2', 1, 2, '2019-01-28'),
(4, '2019-01-28-7aRzP', 5, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-28', 1, 1, '2', 1, 2, '2019-01-28'),
(5, '2019-01-28-lXMjU', 6, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-28', 1, 1, '3', 1, 2, '2019-01-28'),
(6, '2019-01-29-SifCO', 7, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-29', 1, 1, '2', 1, 2, '2019-01-29'),
(7, '2019-01-29-N6T0Z', 8, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-29', 1, 1, '3', 1, 2, '2019-01-29'),
(8, '2019-01-28-rIxGm', 3, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-29', 1, 1, '1', 1, 2, '2019-01-31'),
(9, '2019-01-30-wyV20', 9, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(10, '2019-01-30-vdRzf', 10, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(11, '2019-01-30-7d9hK', 11, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(12, '2019-01-30-SbxgW', 14, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(13, '2019-01-30-OBqz3', 13, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(14, '2019-01-30-bxvqL', 12, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(15, '2019-01-30-Jdm21', 15, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-30', 1, 1, '3', 1, 2, '2019-01-30'),
(16, '2019-01-31-iMcvQ', 16, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(17, '2019-01-31-1YbXh', 18, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(18, '2019-01-31-yeSdN', 17, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(19, '2019-01-31-zciFO', 20, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(20, '2019-01-31-IWa5L', 21, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(21, '2019-01-31-f6Mac', 19, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(22, '2019-01-31-U7cF6', 24, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '2', 1, 2, '2019-01-31'),
(23, '2019-01-31-gvP7q', 23, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(24, '2019-01-31-gvP7q', 23, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(25, '2019-01-31-gvP7q', 23, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(26, '2019-01-31-gvP7q', 23, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(27, '2019-01-31-5sTxC', 22, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '3', 1, 2, '2019-01-31'),
(28, '2019-01-31-neULH', 27, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(29, '2019-01-31-SpwWK', 25, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(30, '2019-01-31-SpwWK', 25, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(31, '2019-01-31-SpwWK', 25, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(32, '2019-01-31-dpHBA', 26, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(33, '2019-01-31-SpwWK', 25, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(34, '2019-01-31-JFCTV', 28, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(35, '2019-01-31-sv7C4', 29, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-01-31', 1, 1, '1', 1, 2, '2019-01-31'),
(36, '2019-02-01-kJV97', 30, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-02-01', 1, 1, '1', 1, 1, '2019-02-01'),
(37, '2019-02-20-zJmFa', 33, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-02-20', 1, 1, '1', 1, 2, '2019-02-20'),
(38, '2019-02-20-Rcyqr', 35, '0770', 18, 'pro@ilab.com', 'procurement user 1', 'buyer 1', 'buy1@ilab.com', '2019-02-20', 1, 1, '1', 1, 1, '2019-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_project`
--

CREATE TABLE `Ilab_master_project` (
  `Project_Slno` int(11) NOT NULL,
  `Project_Name` varchar(255) NOT NULL,
  `job_Code` varchar(255) NOT NULL,
  `Date_Start` date NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Customer_Mobile_No` varchar(255) NOT NULL,
  `project_Description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `bu_status` int(11) NOT NULL DEFAULT '0',
  `Date_Entry` date NOT NULL,
  `Time_Entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_project`
--

INSERT INTO `Ilab_master_project` (`Project_Slno`, `Project_Name`, `job_Code`, `Date_Start`, `Customer_Name`, `Customer_Mobile_No`, `project_Description`, `status`, `bu_status`, `Date_Entry`, `Time_Entry`) VALUES
(1, 'project 1', '0770', '2018-11-01', 'sandy', '12345667890', 'This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to', 1, 1, '2018-09-28', '20:38:23'),
(2, 'Project 3', '23456', '2018-09-22', 'ABC Ltd', '12345667890', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 1, 0, '2018-09-28', '21:28:53'),
(3, 'Project 5', '679034', '2018-09-05', 'ZXC Ltd', '12345667890', 'vvvvvvvvvvvvvv', 1, 0, '2018-09-28', '21:30:19'),
(4, 'Nalanda', '902345', '2018-10-01', 'sdcf', '12345667890', 'nmmkku', 1, 0, '2018-10-23', '16:11:35'),
(5, 'Dream', '567432', '2018-10-01', 'mntyu', '12345667890', 'nmmkkk', 1, 0, '2018-10-23', '16:12:34'),
(6, 'revenue', '189067', '2018-10-03', 'msdfrt', '12345667890', 'mnghtyu', 1, 1, '2018-10-23', '16:13:34'),
(7, 'proj1112', '7877', '0000-00-00', 'cust22201', '12345667890', 'xxxx', 1, 0, '2019-01-17', '17:57:06'),
(8, 'xtxx', '600', '2019-05-08', 'cust211', '12345667890', 'tps', 1, 0, '2019-02-20', '15:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_pr_comments_c`
--

CREATE TABLE `Ilab_master_pr_comments_c` (
  `slno` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `master_pr_slno` varchar(255) NOT NULL,
  `pr_no_slno` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `approver_id` varchar(255) NOT NULL,
  `date_entry` varchar(255) NOT NULL,
  `date_required` varchar(255) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edit_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_pr_comments_c`
--

INSERT INTO `Ilab_master_pr_comments_c` (`slno`, `pr_no`, `job_code`, `master_pr_slno`, `pr_no_slno`, `comment`, `approver_id`, `date_entry`, `date_required`, `date_insert`, `edit_type`) VALUES
(1, 'O18191-950-E-K-30101-001', '1', '2', '1', 'test deploy information', 'siprah@gmail.com', '2019-03-16', '2019-03-27', '2019-03-18 11:24:13', '1'),
(2, 'O18191-950-E-K-30101-001', '1', '2', '1', 'test Comment users ', 'siprah@gmail.com', '2019-03-19', '2019-03-27', '2019-03-19 13:05:34', '2'),
(3, 'O18191-950-E-K-30105-001', '1', '5', '5', 'test bu jcode id ', 'siprah@gmail.com', '2019-03-18', '2019-03-27', '2019-03-19 13:43:34', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_pr_process_detail`
--

CREATE TABLE `Ilab_master_pr_process_detail` (
  `slno` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `project_slno` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `pr_no_slno` varchar(255) NOT NULL,
  `design_user_id` varchar(255) NOT NULL,
  `design_user_id_slno` varchar(255) NOT NULL,
  `design_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-approved 2-drafted 3-process for approved 4-resubmission',
  `design_date` date NOT NULL,
  `approver_user_id` varchar(255) DEFAULT NULL,
  `approver_user_slno` varchar(255) DEFAULT NULL,
  `approver_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-approved 2-> not approved',
  `approver_date` date DEFAULT NULL,
  `type_bidding_technical` int(11) NOT NULL DEFAULT '0' COMMENT '1-technical/commercial 2-commercial only',
  `procurement_user_id` varchar(255) DEFAULT NULL,
  `procurement_user_id_slno` varchar(255) DEFAULT NULL,
  `procurement_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-forwarded 2-not forwarded',
  `procurement_date` date NOT NULL,
  `buyer_user_id` varchar(255) DEFAULT NULL,
  `buyer_user_slno` varchar(255) DEFAULT NULL,
  `buyer_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-forwarded 2-not forwarded',
  `buyer_date` date DEFAULT NULL,
  `technical_user_id_slno` varchar(255) DEFAULT NULL,
  `technical_bid_id` varchar(255) DEFAULT NULL,
  `technical_bid_ref` varchar(255) DEFAULT NULL,
  `technical_edit_id` varchar(255) NOT NULL DEFAULT '0',
  `technical_type_bid` int(11) NOT NULL DEFAULT '0' COMMENT '1-simple 2-closed 3-rank order',
  `technical_complete_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-complete 2 -not complete',
  `technical_bid_master_slno` varchar(255) DEFAULT NULL,
  `technical_amendment_status` int(11) NOT NULL DEFAULT '2' COMMENT '2-not use 1-used 0-auto used',
  `technical_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-completed 2-not completed ',
  `technical_date` date DEFAULT NULL,
  `commercial_user_id` varchar(255) DEFAULT NULL,
  `commercial_bid_id` varchar(255) DEFAULT NULL,
  `commercial_bid_ref` varchar(255) DEFAULT NULL,
  `commercial_edit_id` varchar(255) DEFAULT '0',
  `commercial_type_bid` int(11) NOT NULL DEFAULT '0' COMMENT '1-simple 2-closed 3-rank order',
  `commercial_complete_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-complete 2-not complete',
  `commercial_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-completed 2-not completed',
  `commercial_bid_master_slno` varchar(255) DEFAULT NULL,
  `commercial_amendment_status` int(11) NOT NULL DEFAULT '2' COMMENT '2-not use 1-used 0-auto used',
  `commercial_date` date DEFAULT NULL,
  `techno_commercial_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-bid is completed 2-commercial in process 3-technical in process 4-technical complete detail for commercial status 5-technical not started'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_pr_process_detail`
--

INSERT INTO `Ilab_master_pr_process_detail` (`slno`, `pr_no`, `project_slno`, `project_name`, `pr_no_slno`, `design_user_id`, `design_user_id_slno`, `design_user_status`, `design_date`, `approver_user_id`, `approver_user_slno`, `approver_user_status`, `approver_date`, `type_bidding_technical`, `procurement_user_id`, `procurement_user_id_slno`, `procurement_user_status`, `procurement_date`, `buyer_user_id`, `buyer_user_slno`, `buyer_user_status`, `buyer_date`, `technical_user_id_slno`, `technical_bid_id`, `technical_bid_ref`, `technical_edit_id`, `technical_type_bid`, `technical_complete_status`, `technical_bid_master_slno`, `technical_amendment_status`, `technical_user_status`, `technical_date`, `commercial_user_id`, `commercial_bid_id`, `commercial_bid_ref`, `commercial_edit_id`, `commercial_type_bid`, `commercial_complete_status`, `commercial_user_status`, `commercial_bid_master_slno`, `commercial_amendment_status`, `commercial_date`, `techno_commercial_status`) VALUES
(1, 'O18191-950-E-K-30102-001', '1', 'project 1', '2', 'design2@ilab.com', '10', 1, '2019-03-16', 'siprah@gmail.com', '18', 1, '2019-03-16', 2, 'pro@ilab.com', '13', 1, '2019-03-20', 'buy1@ilab.com', '15', 2, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(2, 'O18191-950-E-K-30101-001', '1', 'project 1', '1', 'design2@ilab.com', '10', 1, '2019-03-19', 'siprah@gmail.com', '18', 1, '2019-03-23', 2, 'pro@ilab.com', '13', 1, '2019-03-23', 'buy1@ilab.com', '15', 2, NULL, NULL, NULL, 'bid Ref', '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(3, 'O18191-950-E-K-30103-001', '1', 'project 1', '3', 'design2@ilab.com', '10', 3, '2019-03-16', 'siprah@gmail.com', '18', 2, NULL, 2, NULL, NULL, 0, '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(4, 'O18191-950-E-K-30104-001', '1', 'project 1', '4', 'design2@ilab.com', '10', 3, '2019-03-16', 'siprah@gmail.com', '18', 2, NULL, 2, NULL, NULL, 0, '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(5, 'O18191-950-E-K-30105-001', '1', 'project 1', '5', 'design2@ilab.com', '10', 4, '2019-03-18', 'siprah@gmail.com', '18', 0, '2019-03-19', 2, NULL, NULL, 0, '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(6, 'O18191-950-E-K-30107-001', '1', 'project 1', '7', 'design2@ilab.com', '10', 3, '2019-03-18', 'siprah@gmail.com', '18', 2, NULL, 2, NULL, NULL, 2, '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(7, 'O18191-950-E-K-30106-001', '1', 'project 1', '6', 'design2@ilab.com', '10', 3, '2019-03-21', 'siprah@gmail.com', '18', 2, NULL, 1, NULL, NULL, 0, '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(8, 'O18191-950-E-K-30108-001', '1', 'project 1', '8', 'design2@ilab.com', '10', 1, '2019-03-21', 'siprah@gmail.com', '18', 1, '2019-03-21', 1, 'pro@ilab.com', '13', 1, '2019-03-21', 'buy1@ilab.com', '15', 2, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0),
(9, 'O18191-950-E-K-30109-001', '1', 'project 1', '9', 'design2@ilab.com', '10', 3, '2019-03-23', 'siprah@gmail.com', '18', 2, NULL, 1, NULL, NULL, 0, '0000-00-00', NULL, NULL, 0, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, 2, 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0, NULL, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_pr_process_detail_clone`
--

CREATE TABLE `Ilab_master_pr_process_detail_clone` (
  `slno` int(11) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `project_slno` varchar(255) NOT NULL,
  `pr_no_slno` varchar(255) NOT NULL,
  `design_user_id` varchar(255) NOT NULL,
  `design_user_id_slno` varchar(255) NOT NULL,
  `design_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-approved 2-drafted 3-process for approved 4-resubmission',
  `design_date` date NOT NULL,
  `approver_user_id` varchar(255) DEFAULT NULL,
  `approver_user_slno` varchar(255) DEFAULT NULL,
  `approver_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-approved 2-> not approved',
  `approver_date` date DEFAULT NULL,
  `type_bidding_technical` int(11) NOT NULL DEFAULT '0' COMMENT '1-technical/commercial 2-commercial only',
  `procurement_user_id` varchar(255) DEFAULT NULL,
  `procurement_user_id_slno` varchar(255) DEFAULT NULL,
  `procurement_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-forwarded 2-not forwarded',
  `procurement_date` date NOT NULL,
  `buyer_user_id` varchar(255) DEFAULT NULL,
  `buyer_user_slno` varchar(255) DEFAULT NULL,
  `buyer_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-forwarded 2-not forwarded',
  `buyer_date` date DEFAULT NULL,
  `technical_user_id_slno` varchar(255) DEFAULT NULL,
  `technical_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-completed 2-not completed ',
  `technical_date` date DEFAULT NULL,
  `commercial_user_id` varchar(255) DEFAULT NULL,
  `commercial_user_status` int(11) NOT NULL DEFAULT '0' COMMENT '1-completed 2-not completed',
  `commercial_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_pr_schedule`
--

CREATE TABLE `Ilab_master_pr_schedule` (
  `slno` int(11) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `item` varchar(255) NOT NULL,
  `UOM` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1-active 2-inactive 3-delete',
  `status_bu_used` int(11) NOT NULL DEFAULT '0' COMMENT '1->tracking tool is active 0->bu tracking not stated',
  `mr_status` int(11) DEFAULT '0' COMMENT '1->mr is created 0->mr is nto created',
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `original_schedule` varchar(255) DEFAULT NULL,
  `revised_schedule` varchar(255) DEFAULT NULL COMMENT 'this date will be entery by design user',
  `update_revised_schedule_date` text COMMENT 'this is array of date mr creation date',
  `update_user_id` varchar(255) DEFAULT NULL,
  `entry_user_id` varchar(255) DEFAULT NULL,
  `update_bu_revised_schedule_date` text COMMENT 'bu_revised_schedule this buentry date',
  `bu_revised_schedule` varchar(255) DEFAULT NULL COMMENT 'bu_revised_schedule date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_pr_schedule`
--

INSERT INTO `Ilab_master_pr_schedule` (`slno`, `discipline`, `pr_no`, `area`, `item`, `UOM`, `quantity`, `job_code`, `status`, `status_bu_used`, `mr_status`, `date_insert`, `date_of_update`, `original_schedule`, `revised_schedule`, `update_revised_schedule_date`, `update_user_id`, `entry_user_id`, `update_bu_revised_schedule_date`, `bu_revised_schedule`) VALUES
(1, 'Electrical', 'O18191-950-E-K-30101-001', NULL, 'TPD for 33KV HT Switch board', 'Set', '1', '1', 1, 1, 1, '2019-03-07 12:27:13', '2019-03-19 13:08:48', '2018-12-15', '2019-03-19', 'a:3:{s:9:\"id_master\";s:1:\"2\";s:8:\"id_clone\";i:9;s:10:\"date_entry\";s:10:\"2019-03-19\";}', NULL, 'bu1@ilab.com', '[{\"slno_id\":1,\"date_id\":\"2019-03-09\"},{\"slno_id\":2,\"date_id\":\"2019-03-09\"},{\"slno_id\":3,\"date_id\":\"2019-03-09\"}]', '2019-03-09'),
(2, 'Electrical', 'O18191-950-E-K-30102-001', NULL, 'TPD for 33/11 KV ONAN/ONAF Power Transformer ', 'Nr', '2', '1', 1, 1, 1, '2019-03-07 12:27:13', '2019-03-16 12:50:56', '2018-12-18', '2019-03-16', 'a:3:{s:9:\"id_master\";i:1;s:8:\"id_clone\";i:2;s:10:\"date_entry\";s:10:\"2019-03-16\";}', NULL, 'bu1@ilab.com', '[{\"slno_id\":4,\"date_id\":\"2019-03-09\"}]', '2019-03-09'),
(3, 'Electrical', 'O18191-950-E-K-30103-001', NULL, 'TPD for NIFPS of 33/11 KV Power Transformer ', 'Nr', '2', '1', 1, 0, 1, '2019-03-07 12:27:13', '2019-03-16 13:15:24', '2018-12-18', '2019-03-16', 'a:3:{s:9:\"id_master\";i:5;s:8:\"id_clone\";i:4;s:10:\"date_entry\";s:10:\"2019-03-16\";}', NULL, 'bu1@ilab.com', NULL, NULL),
(4, 'Electrical', 'O18191-950-E-K-30104-001', NULL, 'TPD for 11/.415 KV, 2MVA Distribution Transformer ', 'Nr', '10', '1', 1, 0, 1, '2019-03-07 12:27:13', '2019-03-16 13:20:59', '2018-12-24', '2019-03-16', 'a:3:{s:9:\"id_master\";i:9;s:8:\"id_clone\";i:5;s:10:\"date_entry\";s:10:\"2019-03-16\";}', NULL, 'bu1@ilab.com', NULL, NULL),
(5, 'Electrical', 'O18191-950-E-K-30105-001', NULL, 'TPD for 11KV AIS Switch Board', 'Set', '1', '1', 1, 0, 1, '2019-03-07 12:27:13', '2019-03-18 05:57:13', '2018-12-31', '2019-03-18', 'a:3:{s:9:\"id_master\";i:12;s:8:\"id_clone\";i:6;s:10:\"date_entry\";s:10:\"2019-03-18\";}', NULL, 'bu1@ilab.com', NULL, NULL),
(6, 'Electrical', 'O18191-950-E-K-30106-001', NULL, 'TPD for11KV AIS VCB isolator Panel ', 'Nr', '4', '1', 1, 0, 1, '2019-03-07 12:27:13', '2019-03-21 05:33:45', '2018-12-31', '2019-03-21', 'a:3:{s:9:\"id_master\";i:26;s:8:\"id_clone\";i:10;s:10:\"date_entry\";s:10:\"2019-03-21\";}', NULL, 'bu1@ilab.com', NULL, NULL),
(7, 'Electrical', 'O18191-950-E-K-30107-001', NULL, 'TPD for 11 KV APFC Panel', 'Set', '2', '1', 1, 0, 1, '2019-03-07 12:27:13', '2019-03-18 05:58:49', '2019-02-15', '2019-03-18', 'a:3:{s:9:\"id_master\";i:18;s:8:\"id_clone\";i:7;s:10:\"date_entry\";s:10:\"2019-03-18\";}', NULL, 'bu1@ilab.com', NULL, NULL),
(8, 'Electrical', 'O18191-950-E-K-30108-001', NULL, 'TPD for 110V DC Battery Bank & battery charger', 'Nr', '1', '1', 1, 1, 1, '2019-03-07 12:27:13', '2019-03-21 05:40:02', '2019-01-12', '2019-03-21', 'a:3:{s:9:\"id_master\";i:30;s:8:\"id_clone\";i:11;s:10:\"date_entry\";s:10:\"2019-03-21\";}', NULL, 'bu1@ilab.com', '[{\"slno_id\":5,\"date_id\":\"2019-03-09\"}]', '2019-03-09'),
(9, 'Electrical', 'O18191-950-E-K-30109-001', NULL, 'TPD for 415V & 11KV NGR', 'Nr', '20', '1', 1, 0, 1, '2019-03-07 12:27:13', '2019-03-23 10:54:00', '2019-01-15', '2019-03-23', 'a:3:{s:9:\"id_master\";i:34;s:8:\"id_clone\";i:12;s:10:\"date_entry\";s:10:\"2019-03-23\";}', NULL, 'bu1@ilab.com', NULL, NULL),
(10, 'Electrical', 'O18191-950-E-K-30110-001', NULL, 'TPD for 415V LT Busduct', 'Set', '10', '1', 1, 0, 0, '2019-03-07 12:27:13', '2019-03-07 12:27:13', '2019-01-17', NULL, NULL, NULL, 'bu1@ilab.com', NULL, NULL),
(11, 'Electrical', 'O18191-950-E-K-30111-001', NULL, 'TPD for 415V LT Smart PMCC', 'Set', '4', '1', 1, 1, 0, '2019-03-07 12:27:13', '2019-03-09 11:24:44', '2019-01-15', NULL, NULL, NULL, 'bu1@ilab.com', '[{\"slno_id\":6,\"date_id\":\"2019-03-09\"}]', '2019-03-09'),
(12, 'Electrical', 'O18191-950-E-K-30112-001', NULL, 'TPD for 415V LT Smart MCC', 'Set', '6', '1', 1, 0, 0, '2019-03-07 12:27:13', '2019-03-07 12:27:13', '2019-01-15', NULL, NULL, NULL, 'bu1@ilab.com', NULL, NULL),
(13, 'Electrical', 'O18191-950-E-K-30113-001', NULL, 'TPD for 415V PDB', 'Set', '2', '1', 1, 1, 0, '2019-03-07 12:27:13', '2019-03-09 11:28:02', '2019-02-22', NULL, NULL, NULL, 'bu1@ilab.com', '[{\"slno_id\":7,\"date_id\":\"2019-03-09\"}]', '2019-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_pr_schedule_file`
--

CREATE TABLE `Ilab_master_pr_schedule_file` (
  `slno_id` int(11) NOT NULL,
  `job_code_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_by` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here project pr schude file name is stored';

--
-- Dumping data for table `Ilab_master_pr_schedule_file`
--

INSERT INTO `Ilab_master_pr_schedule_file` (`slno_id`, `job_code_id`, `file_name`, `upload_by`, `date_entry`, `update_date`) VALUES
(1, '1', '2019-03-05-115049-TEST.xlsx', '1', '2019-03-05 06:20:49', '2019-03-05 06:20:49'),
(2, '1', '2019-03-07-172324-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 11:53:24', '2019-03-07 11:53:24'),
(3, '1', '2019-03-07-172431-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 11:54:31', '2019-03-07 11:54:31'),
(4, '1', '2019-03-07-172700-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 11:57:00', '2019-03-07 11:57:00'),
(5, '1', '2019-03-07-172752-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 11:57:52', '2019-03-07 11:57:52'),
(6, '1', '2019-03-07-173034-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:00:34', '2019-03-07 12:00:34'),
(7, '1', '2019-03-07-173317-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:03:17', '2019-03-07 12:03:17'),
(8, '1', '2019-03-07-173524-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:05:24', '2019-03-07 12:05:24'),
(9, '3', '2019-03-07-174115-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:11:15', '2019-03-07 12:11:15'),
(10, '1', '2019-03-07-174516-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:15:16', '2019-03-07 12:15:16'),
(11, '4', '2019-03-07-174826-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:18:27', '2019-03-07 12:18:27'),
(12, '1', '2019-03-07-174959-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:19:59', '2019-03-07 12:19:59'),
(13, '1', '2019-03-07-175113-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:21:13', '2019-03-07 12:21:13'),
(14, '1', '2019-03-07-175200-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:22:00', '2019-03-07 12:22:00'),
(15, '1', '2019-03-07-175712-Sample_PR_Sched.xlsx', 'bu1@ilab.com', '2019-03-07 12:27:12', '2019-03-07 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid`
--

CREATE TABLE `Ilab_master_rankorder_bid` (
  `Slno_rankorder` int(11) NOT NULL,
  `Bid_master_id_rankorder` int(11) NOT NULL,
  `Bid_ref_no` varchar(255) NOT NULL,
  `Bid_vendor_id` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_of_bid` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_bid_id` int(11) NOT NULL,
  `comment` text,
  `comment_by` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  `resubmission` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_rankorder_bid`
--

INSERT INTO `Ilab_master_rankorder_bid` (`Slno_rankorder`, `Bid_master_id_rankorder`, `Bid_ref_no`, `Bid_vendor_id`, `Vendor_id`, `date_entry`, `type_of_bid`, `category_id`, `type_bid_id`, `comment`, `comment_by`, `comment_date`, `resubmission`) VALUES
(1, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 11:49:38', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(2, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 11:56:27', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(3, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 11:56:34', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(4, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 12:02:03', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(5, 15, '600	', '169', 'ven66@gmail.com', '2019-01-31 12:21:21', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(6, 16, '670	', '175', 'ven121@gmail.com', '2019-01-31 12:43:57', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(7, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 12:45:14', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(8, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 12:45:28', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(9, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 12:46:48', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(10, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 12:49:01', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(11, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 12:51:39', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(12, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 13:03:37', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(13, 17, '99	', '189', 'ven121@gmail.com', '2019-01-31 13:03:46', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(14, 16, '670	', '175', 'ven121@gmail.com', '2019-01-31 13:36:56', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(15, 16, '670	', '175', 'ven121@gmail.com', '2019-01-31 13:37:40', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(16, 17, '99	', '189', 'ven121@gmail.com', '2019-01-31 13:38:39', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(17, 17, '99	', '189', 'ven121@gmail.com', '2019-01-31 13:39:20', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(18, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 13:43:21', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(19, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 13:44:25', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(20, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 13:45:42', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(21, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 13:46:58', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(22, 15, '600	', '161', 'ven121@gmail.com', '2019-01-31 13:48:14', 'Rank Order Bid', 3, 3, NULL, NULL, NULL, 0),
(23, 19, '2340	', '217', 'ven121@gmail.com', '2019-01-31 14:26:02', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0),
(24, 18, '8700	', '203', 'ven121@gmail.com', '2019-01-31 14:27:16', 'Rank Order Bid', 1, 3, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_item`
--

CREATE TABLE `Ilab_master_rankorder_bid_item` (
  `Slno_rankorder_item` int(11) NOT NULL,
  `Rankorder_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) NOT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here rank order bid information istored as vendor wise submission';

--
-- Dumping data for table `Ilab_master_rankorder_bid_item`
--

INSERT INTO `Ilab_master_rankorder_bid_item` (`Slno_rankorder_item`, `Rankorder_id_slno`, `Bid_master_id_com`, `Item_name`, `Item_id`, `Quantity`, `Uom_unit`, `Unit_price`, `Total_unitprice`, `date_entry`, `Comm_item_slno`, `Mr_item_slno`, `Bid_slno`, `Vendor_id`) VALUES
(1, 6, 16, 'material item 1', 'mat001', '1', 'nos', '435', '435.00', '2019-01-31 12:43:57', '18', '', '175', 'ven121@gmail.com'),
(2, 6, 16, 'material item 17', 'mat0087', '1', 'nos', '789', '789.00', '2019-01-31 12:43:57', '19', '', '175', 'ven121@gmail.com'),
(3, 6, 16, 'material item 19', 'mat0018', '1', 'nos', '456', '456.00', '2019-01-31 12:43:57', '20', '', '175', 'ven121@gmail.com'),
(4, 6, 16, 'material10', '10', '1', '21', '233', '233.00', '2019-01-31 12:43:58', '21', '', '175', 'ven121@gmail.com'),
(5, 13, 17, 'material item 1', 'mat001', '1', 'nos', '4400', '4400.00', '2019-01-31 13:03:46', '22', '', '189', 'ven121@gmail.com'),
(6, 13, 17, 'material item 17', 'mat0087', '1', 'nos', '5760', '5760.00', '2019-01-31 13:03:46', '23', '', '189', 'ven121@gmail.com'),
(7, 14, 16, 'material item 1', 'mat001', '1', 'nos', '453', '453.00', '2019-01-31 13:36:56', '18', '', '175', 'ven121@gmail.com'),
(8, 14, 16, 'material item 17', 'mat0087', '1', 'nos', '789', '789.00', '2019-01-31 13:36:56', '19', '', '175', 'ven121@gmail.com'),
(9, 14, 16, 'material item 19', 'mat0018', '1', 'nos', '456', '456.00', '2019-01-31 13:36:56', '20', '', '175', 'ven121@gmail.com'),
(10, 14, 16, 'material10', '10', '1', '21', '233', '233.00', '2019-01-31 13:36:56', '21', '', '175', 'ven121@gmail.com'),
(11, 15, 16, 'material item 1', 'mat001', '1', 'nos', '435', '435.00', '2019-01-31 13:37:40', '18', '', '175', 'ven121@gmail.com'),
(12, 15, 16, 'material item 17', 'mat0087', '1', 'nos', '789', '789.00', '2019-01-31 13:37:40', '19', '', '175', 'ven121@gmail.com'),
(13, 15, 16, 'material item 19', 'mat0018', '1', 'nos', '6866', '6866.00', '2019-01-31 13:37:40', '20', '', '175', 'ven121@gmail.com'),
(14, 15, 16, 'material10', '10', '1', '21', '66666668', '66666668.00', '2019-01-31 13:37:40', '21', '', '175', 'ven121@gmail.com'),
(15, 16, 17, 'material item 1', 'mat001', '1', 'nos', '444', '444.00', '2019-01-31 13:38:39', '22', '', '189', 'ven121@gmail.com'),
(16, 16, 17, 'material item 17', 'mat0087', '1', 'nos', '54', '54.00', '2019-01-31 13:38:39', '23', '', '189', 'ven121@gmail.com'),
(17, 17, 17, 'material item 1', 'mat001', '1', 'nos', '444', '444.00', '2019-01-31 13:39:20', '22', '', '189', 'ven121@gmail.com'),
(18, 17, 17, 'material item 17', 'mat0087', '1', 'nos', '660', '660.00', '2019-01-31 13:39:20', '23', '', '189', 'ven121@gmail.com'),
(19, 23, 19, 'material item 1', 'mat001', '1', 'nos', '760', '760.00', '2019-01-31 14:26:02', '28', '', '217', 'ven121@gmail.com'),
(20, 23, 19, 'material item 17', 'mat0087', '1', 'nos', '340', '340.00', '2019-01-31 14:26:02', '29', '', '217', 'ven121@gmail.com'),
(21, 23, 19, 'material item 19', 'mat0018', '1', 'nos', '680', '680.00', '2019-01-31 14:26:02', '30', '', '217', 'ven121@gmail.com'),
(22, 23, 19, 'material10', '10', '1', '21', '230', '230.00', '2019-01-31 14:26:02', '31', '', '217', 'ven121@gmail.com'),
(23, 24, 18, 'material item 1', 'mat001', '1', 'nos', '235', '235.00', '2019-01-31 14:27:16', '24', '', '203', 'ven121@gmail.com'),
(24, 24, 18, 'material item 17', 'mat0087', '1', 'nos', '156', '156.00', '2019-01-31 14:27:16', '25', '', '203', 'ven121@gmail.com'),
(25, 24, 18, 'material item 19', 'mat0018', '1', 'nos', '760', '760.00', '2019-01-31 14:27:16', '26', '', '203', 'ven121@gmail.com'),
(26, 24, 18, 'material10', '10', '1', '21', '450', '450.00', '2019-01-31 14:27:16', '27', '', '203', 'ven121@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_item_misc`
--

CREATE TABLE `Ilab_master_rankorder_bid_item_misc` (
  `Slno_rankorder_misc` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `rankorder_id_slno_misc` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_rankorder_bid_item_misc`
--

INSERT INTO `Ilab_master_rankorder_bid_item_misc` (`Slno_rankorder_misc`, `master_bid_id_com`, `rankorder_id_slno_misc`, `field_name`, `field_value`, `date_entry`, `Bid_slno`, `Vendor_id`) VALUES
(1, 16, 6, 'delivery basis', '5 weeks', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(2, 16, 6, 'gaurantee warranty', '2 yrs', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(3, 16, 6, 'delivery schedule', '4 weeks', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(4, 16, 6, 'payment terms', 'as discussed', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(5, 16, 6, 'validity of offer', '6 months', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(6, 16, 6, 'security BG', 'check out', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(7, 16, 6, 'liquidity damage', '300', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(8, 16, 6, 'remarks', 'okay', '2019-01-31 12:43:58', '175', 'ven121@gmail.com'),
(9, 15, 12, 'delivery basis', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(10, 15, 12, 'gaurantee warranty', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(11, 15, 12, 'delivery schedule', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(12, 15, 12, 'payment terms', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(13, 15, 12, 'validity of offer', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(14, 15, 12, 'security BG', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(15, 15, 12, 'liquidity damage', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(16, 15, 12, 'remarks', 'no', '2019-01-31 13:03:38', '161', 'ven121@gmail.com'),
(17, 17, 13, 'delivery basis', '5 weeks', '2019-01-31 13:03:46', '189', 'ven121@gmail.com'),
(18, 17, 13, 'gaurantee warranty', '1 6yr', '2019-01-31 13:03:46', '189', 'ven121@gmail.com'),
(19, 17, 13, 'delivery schedule', '4 weeks', '2019-01-31 13:03:46', '189', 'ven121@gmail.com'),
(20, 17, 13, 'payment terms', 'as discussed', '2019-01-31 13:03:47', '189', 'ven121@gmail.com'),
(21, 17, 13, 'validity of offer', '6 months', '2019-01-31 13:03:47', '189', 'ven121@gmail.com'),
(22, 17, 13, 'security BG', 'check out', '2019-01-31 13:03:47', '189', 'ven121@gmail.com'),
(23, 17, 13, 'liquidity damage', '300', '2019-01-31 13:03:47', '189', 'ven121@gmail.com'),
(24, 17, 13, 'remarks', 'okay', '2019-01-31 13:03:47', '189', 'ven121@gmail.com'),
(25, 16, 14, 'delivery basis', '4 weeks', '2019-01-31 13:36:56', '175', 'ven121@gmail.com'),
(26, 16, 14, 'gaurantee warranty', '2 yrs', '2019-01-31 13:36:56', '175', 'ven121@gmail.com'),
(27, 16, 14, 'delivery schedule', '5 weeks', '2019-01-31 13:36:56', '175', 'ven121@gmail.com'),
(28, 16, 14, 'payment terms', 'as discussed', '2019-01-31 13:36:56', '175', 'ven121@gmail.com'),
(29, 16, 14, 'validity of offer', '7 months', '2019-01-31 13:36:56', '175', 'ven121@gmail.com'),
(30, 16, 14, 'security BG', 'check out', '2019-01-31 13:36:56', '175', 'ven121@gmail.com'),
(31, 16, 14, 'liquidity damage', '350', '2019-01-31 13:36:57', '175', 'ven121@gmail.com'),
(32, 16, 14, 'remarks', 'okay', '2019-01-31 13:36:57', '175', 'ven121@gmail.com'),
(33, 16, 15, 'delivery basis', '7 weeks', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(34, 16, 15, 'gaurantee warranty', '1 yr', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(35, 16, 15, 'delivery schedule', 'two weeks', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(36, 16, 15, 'payment terms', 'as discussed', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(37, 16, 15, 'validity of offer', '8 months', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(38, 16, 15, 'security BG', 'check out', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(39, 16, 15, 'liquidity damage', '550', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(40, 16, 15, 'remarks', 'okay', '2019-01-31 13:37:40', '175', 'ven121@gmail.com'),
(41, 17, 16, 'delivery basis', '5 weeks', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(42, 17, 16, 'gaurantee warranty', '2 yrs', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(43, 17, 16, 'delivery schedule', '4 weeks', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(44, 17, 16, 'payment terms', 'as discussed', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(45, 17, 16, 'validity of offer', '8 months', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(46, 17, 16, 'security BG', 'check out', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(47, 17, 16, 'liquidity damage', '550', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(48, 17, 16, 'remarks', 'okay', '2019-01-31 13:38:40', '189', 'ven121@gmail.com'),
(49, 17, 17, 'delivery basis', '4 weeks', '2019-01-31 13:39:20', '189', 'ven121@gmail.com'),
(50, 17, 17, 'gaurantee warranty', '1 yr', '2019-01-31 13:39:20', '189', 'ven121@gmail.com'),
(51, 17, 17, 'delivery schedule', 'two weeks', '2019-01-31 13:39:20', '189', 'ven121@gmail.com'),
(52, 17, 17, 'payment terms', 'as discussed', '2019-01-31 13:39:20', '189', 'ven121@gmail.com'),
(53, 17, 17, 'validity of offer', '8 months', '2019-01-31 13:39:21', '189', 'ven121@gmail.com'),
(54, 17, 17, 'security BG', 'check out', '2019-01-31 13:39:21', '189', 'ven121@gmail.com'),
(55, 17, 17, 'liquidity damage', '550', '2019-01-31 13:39:21', '189', 'ven121@gmail.com'),
(56, 17, 17, 'remarks', 'okay', '2019-01-31 13:39:21', '189', 'ven121@gmail.com'),
(57, 15, 18, 'delivery basis', '5 weeks', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(58, 15, 18, 'gaurantee warranty', '2 yrs', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(59, 15, 18, 'delivery schedule', '5 weeks', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(60, 15, 18, 'payment terms', 'as discussed', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(61, 15, 18, 'validity of offer', '8 months', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(62, 15, 18, 'security BG', 'check out', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(63, 15, 18, 'liquidity damage', '850', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(64, 15, 18, 'remarks', 'okay', '2019-01-31 13:43:22', '161', 'ven121@gmail.com'),
(65, 15, 19, 'delivery basis', '7 weeks', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(66, 15, 19, 'gaurantee warranty', '2 yrs', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(67, 15, 19, 'delivery schedule', '5 weeks', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(68, 15, 19, 'payment terms', 'as discussed', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(69, 15, 19, 'validity of offer', '7 months', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(70, 15, 19, 'security BG', 'check out', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(71, 15, 19, 'liquidity damage', '660', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(72, 15, 19, 'remarks', 'okay', '2019-01-31 13:44:25', '161', 'ven121@gmail.com'),
(73, 15, 20, 'delivery basis', '4 weeks', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(74, 15, 20, 'gaurantee warranty', '2 yrs', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(75, 15, 20, 'delivery schedule', '5 weeks', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(76, 15, 20, 'payment terms', 'as discussed', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(77, 15, 20, 'validity of offer', '8 months', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(78, 15, 20, 'security BG', 'check out', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(79, 15, 20, 'liquidity damage', '350', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(80, 15, 20, 'remarks', 'okay', '2019-01-31 13:45:42', '161', 'ven121@gmail.com'),
(81, 15, 21, 'delivery basis', '4 weeks', '2019-01-31 13:46:58', '161', 'ven121@gmail.com'),
(82, 15, 21, 'gaurantee warranty', '1 yr', '2019-01-31 13:46:58', '161', 'ven121@gmail.com'),
(83, 15, 21, 'delivery schedule', '4 weeks', '2019-01-31 13:46:58', '161', 'ven121@gmail.com'),
(84, 15, 21, 'payment terms', 'as discussed', '2019-01-31 13:46:58', '161', 'ven121@gmail.com'),
(85, 15, 21, 'validity of offer', '6 months', '2019-01-31 13:46:58', '161', 'ven121@gmail.com'),
(86, 15, 21, 'security BG', 'check out', '2019-01-31 13:46:59', '161', 'ven121@gmail.com'),
(87, 15, 21, 'liquidity damage', '400', '2019-01-31 13:46:59', '161', 'ven121@gmail.com'),
(88, 15, 21, 'remarks', 'okay', '2019-01-31 13:46:59', '161', 'ven121@gmail.com'),
(89, 15, 22, 'delivery basis', '5 weeks', '2019-01-31 13:48:14', '161', 'ven121@gmail.com'),
(90, 15, 22, 'gaurantee warranty', '1 yr', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(91, 15, 22, 'delivery schedule', 'two weeks', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(92, 15, 22, 'payment terms', 'as discussed', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(93, 15, 22, 'validity of offer', '7 months', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(94, 15, 22, 'security BG', 'check out', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(95, 15, 22, 'liquidity damage', '470', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(96, 15, 22, 'remarks', 'okay', '2019-01-31 13:48:15', '161', 'ven121@gmail.com'),
(97, 19, 23, 'delivery basis', '7 weeks', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(98, 19, 23, 'gaurantee warranty', '1 yr', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(99, 19, 23, 'delivery schedule', '4 weeks', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(100, 19, 23, 'payment terms', 'as discussed', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(101, 19, 23, 'validity of offer', '8 months', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(102, 19, 23, 'security BG', 'check out', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(103, 19, 23, 'liquidity damage', '740', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(104, 19, 23, 'remarks', 'okay', '2019-01-31 14:26:02', '217', 'ven121@gmail.com'),
(105, 18, 24, 'delivery basis', '4 weeks', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(106, 18, 24, 'gaurantee warranty', '2 yrs', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(107, 18, 24, 'delivery schedule', 'two weeks', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(108, 18, 24, 'payment terms', 'as discussed', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(109, 18, 24, 'validity of offer', '7 months', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(110, 18, 24, 'security BG', 'check out', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(111, 18, 24, 'liquidity damage', '370', '2019-01-31 14:27:17', '203', 'ven121@gmail.com'),
(112, 18, 24, 'remarks', 'okay', '2019-01-31 14:27:17', '203', 'ven121@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_item_misc_temp`
--

CREATE TABLE `Ilab_master_rankorder_bid_item_misc_temp` (
  `Slno_rankorder_misc` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `rankorder_id_slno_misc` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_item_temp`
--

CREATE TABLE `Ilab_master_rankorder_bid_item_temp` (
  `Slno_rankorder_item` int(11) NOT NULL,
  `Rankorder_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) NOT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_logistics`
--

CREATE TABLE `Ilab_master_rankorder_bid_logistics` (
  `Slno_rankorder_item` int(11) NOT NULL,
  `rankorder_id_slno` int(11) NOT NULL,
  `bid_master_id_com` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_unit_price` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `mr_item_slno` varchar(255) NOT NULL,
  `bid_slno` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here vendor will fill information';

--
-- Dumping data for table `Ilab_master_rankorder_bid_logistics`
--

INSERT INTO `Ilab_master_rankorder_bid_logistics` (`Slno_rankorder_item`, `rankorder_id_slno`, `bid_master_id_com`, `vehicle_type`, `capacity`, `detail`, `no`, `from_location`, `to_location`, `unit_price`, `total_unit_price`, `date_entry`, `comm_item_slno`, `mr_item_slno`, `bid_slno`, `vendor_id`) VALUES
(1, 12, 15, 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', '1000', '15000.00', '2019-01-31 13:03:37', '49', '', '161', 'ven121@gmail.com'),
(2, 12, 15, 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', '2000', '22000.00', '2019-01-31 13:03:37', '50', '', '161', 'ven121@gmail.com'),
(3, 12, 15, 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', '4000', '68000.00', '2019-01-31 13:03:37', '51', '', '161', 'ven121@gmail.com'),
(4, 12, 15, 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', '6000', '60000.00', '2019-01-31 13:03:38', '52', '', '161', 'ven121@gmail.com'),
(5, 18, 15, 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', '450', '6750.00', '2019-01-31 13:43:22', '49', '', '161', 'ven121@gmail.com'),
(6, 18, 15, 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', '340', '3740.00', '2019-01-31 13:43:22', '50', '', '161', 'ven121@gmail.com'),
(7, 18, 15, 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', '120', '2040.00', '2019-01-31 13:43:22', '51', '', '161', 'ven121@gmail.com'),
(8, 18, 15, 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', '650', '6500.00', '2019-01-31 13:43:22', '52', '', '161', 'ven121@gmail.com'),
(9, 19, 15, 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', '250', '3750.00', '2019-01-31 13:44:25', '49', '', '161', 'ven121@gmail.com'),
(10, 19, 15, 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', '550', '6050.00', '2019-01-31 13:44:25', '50', '', '161', 'ven121@gmail.com'),
(11, 19, 15, 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', '770', '13090.00', '2019-01-31 13:44:25', '51', '', '161', 'ven121@gmail.com'),
(12, 19, 15, 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', '843', '8430.00', '2019-01-31 13:44:25', '52', '', '161', 'ven121@gmail.com'),
(13, 20, 15, 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', '220', '3300.00', '2019-01-31 13:45:42', '49', '', '161', 'ven121@gmail.com'),
(14, 20, 15, 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', '350', '3850.00', '2019-01-31 13:45:42', '50', '', '161', 'ven121@gmail.com'),
(15, 20, 15, 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', '900', '15300.00', '2019-01-31 13:45:42', '51', '', '161', 'ven121@gmail.com'),
(16, 20, 15, 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', '130', '1300.00', '2019-01-31 13:45:42', '52', '', '161', 'ven121@gmail.com'),
(17, 21, 15, 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', '360', '5400.00', '2019-01-31 13:46:58', '49', '', '161', 'ven121@gmail.com'),
(18, 21, 15, 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', '800', '8800.00', '2019-01-31 13:46:58', '50', '', '161', 'ven121@gmail.com'),
(19, 21, 15, 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', '540', '9180.00', '2019-01-31 13:46:58', '51', '', '161', 'ven121@gmail.com'),
(20, 21, 15, 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', '432', '4320.00', '2019-01-31 13:46:58', '52', '', '161', 'ven121@gmail.com'),
(21, 22, 15, 'vehicle10', '5ponds', '2345', '15', 'nayapali', 'nayapali', '200', '3000.00', '2019-01-31 13:48:14', '49', '', '161', 'ven121@gmail.com'),
(22, 22, 15, 'vehicle10', '50s ponds', 'xxxxxx', '11', 'location1221', 'location1221', '500', '5500.00', '2019-01-31 13:48:14', '50', '', '161', 'ven121@gmail.com'),
(23, 22, 15, 'vehicle12', '60000ponds', 'abc', '17', 'nayapali', 'nayapali', '430', '7310.00', '2019-01-31 13:48:14', '51', '', '161', 'ven121@gmail.com'),
(24, 22, 15, 'vehicle12', '60000ponds', '12345', '10', 'nayapali', 'nayapali', '670', '6700.00', '2019-01-31 13:48:14', '52', '', '161', 'ven121@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_logistics_temp`
--

CREATE TABLE `Ilab_master_rankorder_bid_logistics_temp` (
  `Slno_rankorder_item` int(11) NOT NULL,
  `rankorder_id_slno` int(11) NOT NULL,
  `bid_master_id_com` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_unit_price` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `mr_item_slno` varchar(255) NOT NULL,
  `bid_slno` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_bid_temp`
--

CREATE TABLE `Ilab_master_rankorder_bid_temp` (
  `Slno_rankorder` int(11) NOT NULL,
  `Bid_master_id_rankorder` int(11) NOT NULL,
  `Bid_ref_no` varchar(255) NOT NULL,
  `Bid_vendor_id` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_of_bid` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_bid_id` int(11) NOT NULL,
  `comment` text,
  `comment_by` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  `resubmission` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_item_total`
--

CREATE TABLE `Ilab_master_rankorder_item_total` (
  `Slno_rankorder_item_total` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `rankorder_id_slno_total` int(11) NOT NULL,
  `sub_total` decimal(65,4) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_assumption_charge` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency_rate` varchar(255) DEFAULT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_rankorder_item_total`
--

INSERT INTO `Ilab_master_rankorder_item_total` (`Slno_rankorder_item_total`, `master_bid_id_com`, `rankorder_id_slno_total`, `sub_total`, `total_tax`, `total_price`, `user_assumption_charge`, `date`, `currency_rate`, `Bid_slno`, `currency_name`, `Vendor_id`) VALUES
(1, 16, 6, '1913.0000', '0.00', '1913.00', '0.00', '2019-01-31 12:43:58', NULL, '175', '', 'ven121@gmail.com'),
(2, 15, 12, '165000.0000', '0.00', '165000.00', '0.00', '2019-01-31 13:03:38', NULL, '161', '', 'ven121@gmail.com'),
(3, 17, 13, '10160.0000', '0.00', '10160.00', '0.00', '2019-01-31 13:03:47', NULL, '189', '', 'ven121@gmail.com'),
(4, 16, 14, '1931.0000', '0.00', '1931.00', '0.00', '2019-01-31 13:36:57', NULL, '175', '', 'ven121@gmail.com'),
(5, 16, 15, '66674758.0000', '0.00', '66674758.00', '0.00', '2019-01-31 13:37:40', NULL, '175', '', 'ven121@gmail.com'),
(6, 17, 16, '498.0000', '0.00', '498.00', '0.00', '2019-01-31 13:38:40', NULL, '189', '', 'ven121@gmail.com'),
(7, 17, 17, '1104.0000', '078.00', '1182.00', '0.00', '2019-01-31 13:39:21', NULL, '189', '', 'ven121@gmail.com'),
(8, 15, 18, '19030.0000', '44.00', '19074.00', '0.00', '2019-01-31 13:43:22', NULL, '161', '', 'ven121@gmail.com'),
(9, 15, 19, '31320.0000', '35.67', '31355.67', '0.00', '2019-01-31 13:44:25', NULL, '161', '', 'ven121@gmail.com'),
(10, 15, 20, '23750.0000', '68.90', '23818.90', '0.00', '2019-01-31 13:45:42', NULL, '161', '', 'ven121@gmail.com'),
(11, 15, 21, '27700.0000', '58.90', '27758.90', '0.00', '2019-01-31 13:46:59', NULL, '161', '', 'ven121@gmail.com'),
(12, 15, 22, '22510.0000', '88.00', '22598.00', '0.00', '2019-01-31 13:48:15', NULL, '161', '', 'ven121@gmail.com'),
(13, 19, 23, '2010.0000', '47.80', '2057.80', '0.00', '2019-01-31 14:26:02', NULL, '217', '', 'ven121@gmail.com'),
(14, 18, 24, '1601.0000', '35.90', '1636.90', '0.00', '2019-01-31 14:27:17', NULL, '203', '', 'ven121@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_rankorder_item_total_temp`
--

CREATE TABLE `Ilab_master_rankorder_item_total_temp` (
  `Slno_rankorder_item_total` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `rankorder_id_slno_total` int(11) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_assumption_charge` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currency_rate` varchar(255) DEFAULT NULL,
  `Bid_slno` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_session_history`
--

CREATE TABLE `Ilab_master_session_history` (
  `slno_history` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '0',
  `browser_detail` text,
  `ip` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `logout_time` time DEFAULT NULL,
  `logout_date` date DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here user history of login';

--
-- Dumping data for table `Ilab_master_session_history`
--

INSERT INTO `Ilab_master_session_history` (`slno_history`, `user_id`, `username`, `user_role`, `browser_detail`, `ip`, `entry_date`, `entry_time`, `status`, `logout_time`, `logout_date`, `session_id`) VALUES
(1, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '12:32:57', 1, NULL, NULL, '8afk46g6qfduv61ei4s9s4h95mkpief0'),
(2, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '12:32:57', 1, NULL, NULL, '50in2ee57j8qaqot7k31s4q6om6boq28'),
(3, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '12:54:57', 2, '12:57:16', '2019-01-28', 'rhliigj42qknc21ggj5bau35v4ks3egq'),
(4, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '12:58:02', 1, NULL, NULL, 'ijpgmq92mtv5dmr0tng5n8l2drfdu621'),
(5, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '12:58:02', 2, '12:58:41', '2019-01-28', '84n2ggmva4i2cr02m7gmss18va51kil0'),
(6, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '13:00:11', 1, NULL, NULL, 'i2l634blkfvlhnt4qo2ti5iespkt6sa0'),
(7, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '13:17:45', 1, NULL, NULL, 'fc0v7ck291jnsnv6pmdm7v8qoh50vb1h'),
(8, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '14:48:26', 1, NULL, NULL, 'gh1eedm53k5ihiue90vee074u7ukk9k9'),
(9, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '14:59:08', 1, NULL, NULL, 'sdqcj3kdl4d194ncfqfapit0sg81b50i'),
(10, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '14:59:56', 1, NULL, NULL, '6aff1vnc71217im1aa1addi3e0knvbu8'),
(11, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '14:59:56', 2, '15:00:14', '2019-01-28', 'dsl0qkg689l50aki0fa1n1d96usgm9l5'),
(12, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:06:40', 1, NULL, NULL, 'v1o0nc2gjfoc5rhik5e2cp3rihdc9qn0'),
(13, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:12:37', 2, '15:15:32', '2019-01-28', 'goq8nkj98qs88bdrfcr0bl2pgnchal6s'),
(14, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-28', '15:14:39', 1, NULL, NULL, 'bsi8l30g3n2cfl3ls1bjm6m9520rsg2n'),
(15, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:16:31', 1, NULL, NULL, 'g71r65jertp3e6vh9n7hc4g33r6l2jd1'),
(16, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:17:34', 1, NULL, NULL, 'b6bhp2jhl9e44ctauphdb69micc47i55'),
(17, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:20:16', 1, NULL, NULL, '6fqjg3039ocsb3gavv688d28eviol6h5'),
(18, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:21:36', 2, '15:23:20', '2019-01-28', '7bb1ptl7s6q3lfprnehfluns28dnseq9'),
(19, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:24:20', 1, NULL, NULL, 'so0p5l9f803rsoeq9bqi390aju0ae8sd'),
(20, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '16:06:55', 1, NULL, NULL, 'e8n6p5644bhllgvtjtpg98bgi2fbpcgq'),
(21, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '16:35:12', 1, NULL, NULL, 'a6g5dfskthkfeige17bl0fsp0g7usjno'),
(22, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '17:17:29', 1, NULL, NULL, 'cqq2o53vvir1gcuvm6l3s6s5f57uqjqk'),
(23, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '19:58:18', 2, '20:00:12', '2019-01-28', 'aao74leqpkf8vsue22v802v735731uni'),
(24, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '20:00:42', 2, '20:02:13', '2019-01-28', 'kvruvtdmujsitntgg192slidj5uc5tgb'),
(25, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '20:02:45', 2, '20:03:24', '2019-01-28', 'hfvm5irudjou6tnf9sd0id0ihqji1h9c'),
(26, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"71.0.3578.98\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/71.0.3578.98 Safari\\/537.36\"}', '192.168.0.4', '2019-01-28', '20:03:05', 2, '20:06:04', '2019-01-28', 'jtmggkn6v7lriqmm2193asfjkegook9m'),
(27, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '20:04:04', 1, NULL, NULL, '55bmeld4dbh9ic9g6r8eobdiecllsaf9'),
(28, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"71.0.3578.98\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/71.0.3578.98 Safari\\/537.36\"}', '192.168.0.4', '2019-01-28', '20:08:45', 2, '20:09:24', '2019-01-28', 't0nr5bv16fkv5tbaj9uipug2j9lom0dr'),
(29, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"71.0.3578.98\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/71.0.3578.98 Safari\\/537.36\"}', '192.168.0.4', '2019-01-28', '20:10:21', 2, '20:10:44', '2019-01-28', 'hvh0ff6u0efa1n2mmanmc7prfgb79g30'),
(30, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"71.0.3578.98\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/71.0.3578.98 Safari\\/537.36\"}', '192.168.0.4', '2019-01-28', '20:11:04', 2, '20:14:27', '2019-01-28', 'rq1kh4f6a81akpbb4i3pl8tj4jqie2h3'),
(31, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '20:17:21', 1, NULL, NULL, '4ch1a9h8hi4q2kg63o17oq36vo7epnsc'),
(32, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-28', '21:02:09', 1, NULL, NULL, '0m6ddrcns4oilv1h7jp30k28ukq1efvv'),
(33, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-29', '12:48:57', 1, NULL, NULL, 's0kll304h10lvsadkt89sakk838iim27'),
(34, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '13:11:11', 1, NULL, NULL, 'c18500cd4oit2otinjuuvslj59rsn8pp'),
(35, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-29', '13:23:10', 1, NULL, NULL, '96t07ollpitjmtho1gk6th5qjp87bjtu'),
(36, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '15:35:49', 1, NULL, NULL, 'mhmhoim6lcjbqudk2jf5nlanrlo6ljk1'),
(37, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '15:45:07', 1, NULL, NULL, 'gf5h8rb9cd2s3ej6v41cohg6d79ccnlk'),
(38, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '15:51:03', 1, NULL, NULL, '7sjrgd49gqegpd7k9jtqrstt1daa8aim'),
(39, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '15:51:52', 1, NULL, NULL, '7k5tsb4415ahpsumgqc1snp4k432v3oh'),
(40, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '16:44:15', 1, NULL, NULL, '03e8l48flsrsn3bhpkve7brhnnfvd5jk'),
(41, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-29', '16:53:48', 1, NULL, NULL, 'c36v77k30la3abl0h72so182lqncmf7c'),
(42, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:19:04', 1, NULL, NULL, 'cjcqhdqbp63jm77q1hveb6nh6qnsa69i'),
(43, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:22:08', 2, '17:24:23', '2019-01-29', 'pk3huqpohppr1ng6smltqnr22593qd6h'),
(44, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:24:53', 2, '17:25:28', '2019-01-29', 'g09icpmcku38isjis17554bivo2h0if9'),
(45, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:25:47', 1, NULL, NULL, 'gmf90rk2pcvurkg3idqrsipiffb3dqbp'),
(46, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:37:17', 1, NULL, NULL, 'oo8q1tjivs949s2svb672vutogrnnjbt'),
(47, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:41:45', 1, NULL, NULL, 'jp6ikd66285cd8r5m8qo0h1grl8ug5rg'),
(48, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:52:40', 1, NULL, NULL, '2jir24oo1uctgmbvr5iov7iaqpc613tl'),
(49, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:37:12', 1, NULL, NULL, 's3k52i515eo6rojnsss5qcq4jpubkspv'),
(50, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:46:01', 1, NULL, NULL, 'kq4003cu4q93e5j3p5liv6ubo0pfsbf9'),
(51, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-29', '19:57:42', 1, NULL, NULL, 'q3pptretd9s7cc6871gac3adlangsho9'),
(52, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '10:49:35', 1, NULL, NULL, 'aov2qu79789krgjpfurduucb53u20kjk'),
(53, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '11:26:13', 1, NULL, NULL, 'd011njiaemf86agiu2556ll85q21941v'),
(54, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '11:40:58', 2, '11:42:08', '2019-01-30', 'cs87irqvldh53is5jtad1o4up18rfc24'),
(55, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '11:42:29', 1, NULL, NULL, 'omvadl9cpqsk8opm29qucggjd9o4p4bl'),
(56, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:10:06', 1, NULL, NULL, 'nlef5q45f6f84b2vp6h2qg9cj6aqarim'),
(57, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:25:40', 1, NULL, NULL, 'glu0fdjgdttis4n56ma6d5mm3ammulan'),
(58, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:31:30', 1, NULL, NULL, 'fku52f2np59vb1loumval1gc9gpgv9ug'),
(59, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-30', '12:32:04', 1, NULL, NULL, 'nopvac1022f6c9egmuklsj9d7gh53434'),
(60, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:39:19', 1, NULL, NULL, 'enulh0lnm8cu9or605o3pblia626n6mk'),
(61, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:40:36', 1, NULL, NULL, 'csrraoosde34cit175m1vavu82r2sa0v'),
(62, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:40:36', 2, '12:43:12', '2019-01-30', 'i6rfigdpqeet61lodintakmnfqkj50sd'),
(63, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:43:33', 2, '12:44:39', '2019-01-30', 'ij4vl23pgp85qq33khv7640furfd9cvs'),
(64, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:45:09', 1, NULL, NULL, 'j5j30qmp5fpk5sdlretcljdo399vmmak'),
(65, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:04:11', 1, NULL, NULL, 'n7pqo6c45oitt81ejb1qd2jjaosie2l4'),
(66, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:11:20', 1, NULL, NULL, '9idpnina2vql6cvgosbndfvakv9fj7ce'),
(67, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:15:06', 2, '13:16:58', '2019-01-30', '8mdu29bgbvq8htep6obnq4vo23ff472o'),
(68, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:17:13', 2, '13:18:22', '2019-01-30', 'klb1t015a419om2vru5ql391jgfo8bgq'),
(69, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:19:28', 2, '13:19:57', '2019-01-30', 'tltie77nami9q3rfjpq8dinct4bpv2co'),
(70, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:20:27', 1, NULL, NULL, 'hg0a39hfdjogaircismrqcr12chl8ti2'),
(71, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:34:37', 1, NULL, NULL, 'a54pj2kb2qcrn40u1ct4slprrf9jp4lf'),
(72, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:42:37', 1, NULL, NULL, 'g12k08ulcdsptjddu7kusdns9bh5a7j5'),
(73, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '16:24:58', 1, NULL, NULL, 'gkhdiu1nl7iuopljmq11ackphsumqoj9'),
(74, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-30', '17:49:46', 1, NULL, NULL, 'm9eoq56ci4ks8qo4g17q2d9s032fi6ab'),
(75, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-30', '17:53:04', 1, NULL, NULL, 't25n7lbdrorevojkek7613874ed883gj'),
(76, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-30', '18:13:37', 1, NULL, NULL, 'kofk14jv1sle7n6i38g3idl0snr7gr8a'),
(77, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '11:20:22', 1, NULL, NULL, '4n8rclhhqjbijil3fgjalndv52tp641r'),
(78, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '11:21:42', 1, NULL, NULL, 'gqn760tluqp3e4df2nla06q03610i58i'),
(79, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '11:22:13', 1, NULL, NULL, 'e7f52tis7t6pnnokp4kfmhu6cqvhbhef'),
(80, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '11:25:38', 1, NULL, NULL, 'msqel4fhe6atdk5enkkh3evorpu1jv7t'),
(81, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '11:27:44', 2, '11:28:14', '2019-01-31', 'cdv62ghgddul0qj29gs38idur7l02vva'),
(82, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '11:28:40', 2, '11:29:03', '2019-01-31', 'ctbps3r4behpsbe9svhk8hd2kcorjkaj'),
(83, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '11:29:39', 2, '11:33:59', '2019-01-31', '2dji0qmqm611454d6h9jhefsd79le2rs'),
(84, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '11:37:06', 1, NULL, NULL, 'qmvh82nb6nd66fh1n3btmft2ovea22ps'),
(85, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:16:21', 1, NULL, NULL, '24kepgbnv2jc0fe6n0kesulq408baqlv'),
(86, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:19:30', 1, NULL, NULL, 'phaj3p25a92mmso8khskc3o3kt002qvk'),
(87, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:21:40', 2, '12:23:01', '2019-01-31', 'lp6hdogrvqd7trqgkioju1ql0c64hhcs'),
(88, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:23:25', 2, '12:24:22', '2019-01-31', 'g65c0lj23sft4ea8d2ecukrme1sp8kpu'),
(89, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:25:25', 1, NULL, NULL, 'mlukbd1hnm07k9u0qs7c9tgvs43hid23'),
(90, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:25:25', 2, '12:26:02', '2019-01-31', 'jusbtj2t45gi0qh8o5lsplhoel8c4p4h'),
(91, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:26:34', 1, NULL, NULL, 'ktdcik56r0emmhtb1t54hqidv0pmhl6c'),
(92, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:35:36', 1, NULL, NULL, 'oovek7ahidu45ivnackgvjlfrthscc0d'),
(93, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:45:08', 1, NULL, NULL, 'tiirvp00logflm7sk6n3ifrjvtlnepak'),
(94, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:55:35', 1, NULL, NULL, 't309kfhd5civbvgpvgcd2lgip1ric5ts'),
(95, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '12:57:48', 1, NULL, NULL, '5tc465q2r0ktnvapf2iltjsmppdn15kr'),
(96, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:58:11', 1, NULL, NULL, 'gd06p7nln44435ge2tlvjs8s7r62hig6'),
(97, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '13:00:35', 1, NULL, NULL, 're3obp16sqah99c89f4s0lik1sb7eabq'),
(98, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '13:02:12', 1, NULL, NULL, '45ei6mvjso1hta0ljm4biegefvk6t5oi'),
(99, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '13:05:32', 1, NULL, NULL, '3e1k1tqd1ee6em64i03uje0bjh0pgmle'),
(100, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '13:45:31', 2, '13:47:15', '2019-01-31', 'k1qigjirhtqb8j8as58vb5vda6f4b80t'),
(101, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '13:47:40', 2, '13:50:15', '2019-01-31', '9ej56aa7ijro8e7jrika4hggrqlfcv7d'),
(102, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '15:33:51', 2, '15:36:44', '2019-01-31', 'i49phunqntdr8a32ci5v8c9qhb2leq0a'),
(103, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '15:39:28', 1, NULL, NULL, '214dn5kb5e5thhmo91o90pb387at2l6u'),
(104, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '15:43:14', 2, '15:43:57', '2019-01-31', 'ebdv3sodfbhupqsdnedgvbpsia0681ru'),
(105, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '15:58:22', 1, NULL, NULL, '2me6rd3smf8s54nr1ndkc860mkrr9cgn'),
(106, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:16:00', 1, NULL, NULL, 'lg4cot02v0ff1l9tretelmbonq7g8k90'),
(107, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:32:38', 1, NULL, NULL, 'chnp5jv4eeogboefs0mjtp0mt7l0dl3h'),
(108, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:40:17', 1, NULL, NULL, 'm9gs1saehdk3qhr9tiacc5va1jv5dpk4'),
(109, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:42:35', 1, NULL, NULL, 'cjhti1aq5s6menn7qlbgb5kd2soba97v'),
(110, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:48:40', 2, '16:52:18', '2019-01-31', '1f1idauesqd467in72musrva5bmld9eb'),
(111, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:02:51', 1, NULL, NULL, 'fpcpt46t3mpn4tjsvjks2n0tcv34tq4l'),
(112, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:14:37', 1, NULL, NULL, 'vtt4qjt9r960cd74nue8ktaes6k9b4u3'),
(113, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:54:36', 2, '17:57:33', '2019-01-31', 'eatr5hg1ash4fboap4stec6apbmdguit'),
(114, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:58:01', 1, NULL, NULL, '9h5hlkj3ja91tostjkvicviljhji27r1'),
(115, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:59:20', 2, '18:00:45', '2019-01-31', '538odt1vj1255a12sc2so7rpo5q1tr76'),
(116, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:01:08', 2, '18:01:50', '2019-01-31', '3ghkj8m7tm9h1keqm28iaglvcanifstp'),
(117, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:02:16', 1, NULL, NULL, 'mhbmqvedsrin9suna0gjfcivuek6rbcg'),
(118, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:25:06', 2, '18:25:46', '2019-01-31', 'vcsiq4vii5337jd9aqqsjj3hs4d2utn6'),
(119, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:26:17', 2, '18:26:42', '2019-01-31', '350au5j8r01tn5d9faaocso062ruvvd9'),
(120, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:27:04', 2, '18:27:24', '2019-01-31', 'e3ettc2uml1an93team43elc0cttrg0t'),
(121, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:27:48', 2, '18:30:47', '2019-01-31', '0m2rj2epselopdhi3v5hlbvicag0o2g1'),
(122, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:36:30', 1, NULL, NULL, 'tkn0k9bumbet6nil11vrlqqts4hhf85l'),
(123, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '18:42:32', 1, NULL, NULL, 'l0ugrcu3gjmsshgo3odj4q7ha2r2bafq'),
(124, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:43:56', 1, NULL, NULL, 'kjfkqt0q7oghg3a6r8putaf95sm3tmgf'),
(125, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:21:32', 1, NULL, NULL, '0aqpp9csrko1s12bdq3uphd8624j50p8'),
(126, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:28:48', 2, '19:30:26', '2019-01-31', 'f7ifebehh4jldl8hho9kn8b8kglt8kh1'),
(127, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:30:51', 2, '19:31:42', '2019-01-31', 'l5foo2hf4gtamns49ka6tkdd6gdsklup'),
(128, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:32:01', 2, '19:32:39', '2019-01-31', '73lk4cmhpsckaqrh5mc249h119ql1kqc'),
(129, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:33:00', 1, NULL, NULL, 'esfbqqv9fro33plc4m6odgnmkmjvnqnl'),
(130, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:57:48', 1, NULL, NULL, '6ea6ao6j6i6u0mqmn7h6qffnbdqu1o13'),
(131, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-02-01', '15:55:27', 2, '15:56:25', '2019-02-01', 'm9rb2r0tenhvmg102rfpjtmmkm7mkqqj'),
(132, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-02-01', '16:13:33', 2, '16:13:59', '2019-02-01', 'a3079d0i6a9o4i41nrf164t27jlgvh3g'),
(133, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-02-01', '16:14:32', 2, '16:14:54', '2019-02-01', '0kn12nr3nfmoi9t4t9cfn5ab573acp26'),
(134, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-02-01', '16:15:14', 1, NULL, NULL, 'ac137p6sgr1rcc8vcrtv02qqde6saeie'),
(135, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-16', '13:28:58', 1, NULL, NULL, 'r9bgfr7nj9ria1ftpuf6afs70hqt8o10'),
(136, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-16', '16:37:57', 1, NULL, NULL, '01e1tdjp8afkifrocoj29th4cjds6psj');
INSERT INTO `Ilab_master_session_history` (`slno_history`, `user_id`, `username`, `user_role`, `browser_detail`, `ip`, `entry_date`, `entry_time`, `status`, `logout_time`, `logout_date`, `session_id`) VALUES
(137, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-19', '12:51:19', 1, NULL, NULL, 'bijt1784rrih4c1vgv8vcppho019m7e5'),
(138, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-19', '18:26:09', 1, NULL, NULL, 'nddgff0ons8b2hgudetpaljo0nb2qsig'),
(139, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '11:30:50', 1, NULL, NULL, 'tta06i4end0dkalj6o49k2aupfhpgpeg'),
(140, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '12:05:18', 1, NULL, NULL, 'nor67q6jhb1oim1lg5d5stqoshi9judp'),
(141, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-20', '12:08:30', 1, NULL, NULL, 's4b9auutak5sja4gchhd65l5q23o3art'),
(142, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '12:17:14', 1, NULL, NULL, '85b9vpim012f40j8411lqburt8mmsnap'),
(143, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '12:47:29', 2, '12:49:13', '2019-02-20', '7engckt3ca61sjmn5n3fr1vubdgp4j7r'),
(144, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '12:54:02', 1, NULL, NULL, '8th7fm0om0e96cff1pn52bdv7l2htdfi'),
(145, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '13:17:10', 2, '13:18:57', '2019-02-20', '52garto88urpb7v4g8ba4bdfgct4ktvg'),
(146, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '13:19:16', 2, '13:20:58', '2019-02-20', '8jl4b7n8ur1v2ckcdpaa27giin29iu5a'),
(147, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '13:21:14', 2, '13:22:39', '2019-02-20', '0l4t78emp5tepkh0iiiafls2pr23o43f'),
(148, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '13:22:49', 2, '13:24:25', '2019-02-20', 'n8qb3cojoilgjp305ia0ak822cb4fefs'),
(149, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '13:24:38', 1, NULL, NULL, 'joe9p59nm7pejdm34qojqvmhtlmkh2kk'),
(150, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '13:33:55', 2, '13:34:30', '2019-02-20', '15ife325eke4s5dqou6q7q532gqcgo35'),
(151, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '14:42:54', 2, '14:43:42', '2019-02-20', '1kdu6eo3s23minjr59nsoc6fi498bfua'),
(152, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '14:44:43', 1, NULL, NULL, 't5tqrm10m90c2uc4l0su0bssp5nsganb'),
(153, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-20', '14:53:02', 1, NULL, NULL, 'di4pkqetlt16vnu7sn0gov7345gff18k'),
(154, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '14:54:05', 2, '14:54:33', '2019-02-20', '119anfn5fv1dnct1c0gv1bi1p6fijhb0'),
(155, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '14:54:51', 2, '14:55:37', '2019-02-20', '40rhdrraha48opg6evqlmiv9eeagr3cd'),
(156, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-20', '14:54:53', 2, '14:55:09', '2019-02-20', '8kshg6o1igcm5uoig9uf7qgb1un4l4mc'),
(157, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-20', '14:55:21', 1, NULL, NULL, 'mt9drh8hemduemadlpa68voah8mqtha8'),
(158, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '15:46:51', 1, NULL, NULL, '517gk0q455agtkih9rjqhq0s3gvbufv2'),
(159, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-20', '15:49:04', 1, NULL, NULL, 'opkr4d3klie9aecruupaka4s2kguaum7'),
(160, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '15:50:43', 1, NULL, NULL, 'mu6j9hkso6o766pfo10tr9n53n95dpcp'),
(161, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '17:36:54', 1, NULL, NULL, 'fo2hc2lu7i3u8sat3av7asjjiss7gl79'),
(162, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '17:45:42', 2, '17:46:20', '2019-02-20', 'jvusn6egsu5nl8q8mhm1fqi8eus13fo6'),
(163, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '17:46:53', 2, '17:47:47', '2019-02-20', 'vbgcmdu68kshmvuj8fvhkdjdo9v754t3'),
(164, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '17:48:07', 1, NULL, NULL, 'ne9jf64k5uvj2sqnr8cgmb3v9khsvvc9'),
(165, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '18:13:25', 1, NULL, NULL, '61p44mhtupchitjqjqa8glqc49g07dk7'),
(166, 'commerical@ilab.com', 'user3', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '18:25:16', 1, NULL, NULL, '3d72s2t65nfislvvmcrfrs2dqals8984'),
(167, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '18:25:55', 1, NULL, NULL, 'n1r6k970pm40t2rbh2vrmjc0jq5g1p1c'),
(168, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-21', '11:55:24', 1, NULL, NULL, 'jm5u7ngana9ggsmj8376c6c8o6sg4csv'),
(169, 'abc@ilab.com', 'Technical User', 9, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-21', '16:48:51', 1, NULL, NULL, 'tp25pnus679hh2hfqu7kigqqd9tm7jau'),
(170, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-21', '18:11:54', 1, NULL, NULL, '1h0b5k8dmcuad3f2ut0bd8citve78mlk'),
(171, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.4', '2019-02-27', '19:18:00', 1, NULL, NULL, '45gs4kv66c8grc5g60v16p2a96ioimvo'),
(172, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.4', '2019-03-01', '16:17:28', 1, NULL, NULL, '6v9oo4aqlkd18dj2pligjr1n0dqk0ia9'),
(173, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.4', '2019-03-01', '16:58:39', 1, NULL, NULL, 'dv6rritr59sf8q0g2lg4hmjlkbcig2tm'),
(174, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.4', '2019-03-01', '17:22:15', 1, NULL, NULL, 'u1h5p6vivn1g31s3t02k7t82n1b8dfa2'),
(175, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.4', '2019-03-01', '18:21:05', 1, NULL, NULL, '844n55l311isb7o83igknbpvf48ptpt2'),
(176, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.4', '2019-03-01', '18:21:55', 1, NULL, NULL, 'dd1ud3is0rh3mbiv1snfr16psngqendq'),
(177, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.4', '2019-03-01', '18:22:22', 1, NULL, NULL, '7t37fp1jn1boqvstb2rlahsq9qcds85v'),
(178, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.119\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.119 Safari\\/537.36\"}', '192.168.0.4', '2019-03-02', '11:30:40', 1, NULL, NULL, 'flnvqaac1pe5h2ooeganrsb819btf5rl'),
(179, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.119\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.119 Safari\\/537.36\"}', '192.168.0.4', '2019-03-02', '13:21:05', 1, NULL, NULL, 'n8ssbikt6nnefpp1vp6crop009rp8rki'),
(180, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.119\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.119 Safari\\/537.36\"}', '192.168.0.4', '2019-03-02', '15:12:15', 1, NULL, NULL, 'a38lfjhmbvbaute0snjckkcrmjanftk8'),
(181, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-02', '15:37:33', 1, NULL, NULL, '539fop6la18pc5v7ujt2aol8emm2o7af'),
(182, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-02', '15:51:14', 1, NULL, NULL, 'ra2rkmti0ue5taku4s3kk2oekjbspfgg'),
(183, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-04', '12:06:56', 1, NULL, NULL, 'mas1j0qccts83dvsq43jdtco3285e1oi'),
(184, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '12:38:57', 2, '12:39:09', '2019-03-04', 'horf43t9lfv4hr5kh0delaj29d4445kb'),
(185, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '12:40:16', 1, NULL, NULL, 'ita9ru8e8gee56tqm64rf5reuioqk8j9'),
(186, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '15:09:49', 1, NULL, NULL, 'uc95bdtte92h253qi7jn6ki0jqsbq6lr'),
(187, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '15:30:43', 1, NULL, NULL, 'uvuirofftkb9shuhn85u56u4bdio3eba'),
(188, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '15:33:01', 1, NULL, NULL, 'lum64a38mqacetvvugptjmb3sk3h0lu5'),
(189, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-04', '15:34:10', 1, NULL, NULL, '11cgpdd10kueoqo70jomvij4por1vntf'),
(190, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '15:55:00', 1, NULL, NULL, '4o0qokm4h3f6238li1p7slecba8kcve5'),
(191, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '15:58:44', 1, NULL, NULL, '7lqeqlda867j90gokf8vel9qd0pvommm'),
(192, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '16:00:19', 1, NULL, NULL, 'ohh6fellt98n0klmcgkq86kj5gobetij'),
(193, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '16:04:31', 1, NULL, NULL, '1a2dqavtsuuk89ra34gs9ahofkfcbga7'),
(194, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-04', '16:05:09', 2, '16:09:23', '2019-03-04', '2ecr6ane6jhio1u3n9kfl0vdpqsdsvfq'),
(195, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-04', '19:30:51', 1, NULL, NULL, 'mg5dolh36nb9qf0se9mmlioa190trqr5'),
(196, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '11:43:29', 1, NULL, NULL, '4nm5jni1ni9h8vjvassm1qlf7dvge45u'),
(197, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.2', '2019-03-05', '11:45:32', 1, NULL, NULL, 'hrsv61fmnr9371t0tomanmoou1nnorif'),
(198, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '11:59:02', 1, NULL, NULL, '5vgtelai7l2bbb2besd7chakrs5k82rj'),
(199, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '12:04:31', 1, NULL, NULL, 'ie1oc2m4jcna0e0a4k1n8p9t70va1o37'),
(200, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '12:51:03', 1, NULL, NULL, 'c0u7na42stciafopdhv89essfh9lt5jk'),
(201, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.2', '2019-03-05', '12:51:06', 1, NULL, NULL, 'mig7h6ikv8tmt05gn86qrt80eimjvjbf'),
(202, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '12:51:42', 1, NULL, NULL, 'aasqonjo9n180tcjfeeegblrvfcgl50k'),
(203, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '13:02:03', 1, NULL, NULL, 'kbgjdsr1ua2p93l9ddog7kt3cga4nrfk'),
(204, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '14:43:35', 1, NULL, NULL, '0rtjvpm7658bu05ks9adga53svh3qaip'),
(205, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '14:44:51', 1, NULL, NULL, 'bjlh06ih2c65c72sj8p059e0ao491p9d'),
(206, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:02:20', 1, NULL, NULL, 's6jhuhnegshmlrd8vduus2h44ttqcrql'),
(207, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:02:39', 1, NULL, NULL, 'k5vfee5fo6gcpd0dis8lmeb2l06i7tb5'),
(208, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:04:31', 1, NULL, NULL, '0p957vcelub31iljnmtgv9o9n8v95eka'),
(209, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:09:16', 1, NULL, NULL, 'sh4hjv8dc74v1vaekpuqbppfie32bp3a'),
(210, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:12:30', 1, NULL, NULL, '8f77md8ufrkjahfdl87n5oo3lp2kuci2'),
(211, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:21:56', 1, NULL, NULL, 'dehj75hj8es8ud1mvdea6j1ve0cqhrb9'),
(212, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:43:41', 1, NULL, NULL, 'oh41np820o7roetggtsvn2u9po6acop5'),
(213, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '16:45:56', 1, NULL, NULL, 'gqr2ciom3t1rfcf17muc3vp8l6g9sbsi'),
(214, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-05', '17:13:03', 1, NULL, NULL, 'ljlt8156fhta5jh46uckh82mlj39aoeg'),
(215, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.2', '2019-03-05', '18:00:50', 1, NULL, NULL, '2mgh7dlrjbh733oft8roi5vpccou7710'),
(216, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-06', '12:43:48', 1, NULL, NULL, '0vb15r21mr41gn8igsj3mqtfm2vqtttb'),
(217, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-06', '13:15:28', 1, NULL, NULL, 't23ome2o353src5bso3fv2elgug8kjr6'),
(218, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-06', '14:53:08', 1, NULL, NULL, 'g086kteddph8uvp89tmbb0o50plm209u'),
(219, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-06', '15:27:58', 1, NULL, NULL, '4e2ggrn94ib1nbqje7rbv20qjt3cdp5i'),
(220, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-06', '16:18:42', 1, NULL, NULL, 'uu9b5ss0it3gud34mcl6qkunb54mspme'),
(221, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-06', '17:05:56', 1, NULL, NULL, '2cgl9q5r0a17unifb9h14kpbh2fg2blf'),
(222, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-06', '17:47:42', 1, NULL, NULL, '07im41l51c2b599gu2eq20de8tohgqud'),
(223, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '10:08:39', 1, NULL, NULL, 'jtif7ru9fv538gfmhbbdm5dpeo964v8n'),
(224, 'admin@ilab.com', 'Admin', 1, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '10:37:14', 2, '10:37:47', '2019-03-07', '0ou7gi86ajp7d2hmmjofdfikl8ci2lm0'),
(225, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '10:38:46', 1, NULL, NULL, '7knofctntic5ssgj4pmduo02bphbc4ie'),
(226, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '11:43:27', 1, NULL, NULL, '8i0rp6lmpgbnbka36ji8vdncnd8uuq0m'),
(227, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '13:24:06', 1, NULL, NULL, 'ncgmio8acs8r1gi5919hsb79ge2upc7j'),
(228, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '13:29:22', 1, NULL, NULL, 'qlc3a3atkbh4fmioiio1qqjngjek9bhl'),
(229, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '13:32:09', 1, NULL, NULL, '3m6d1k5qmtp59h4vketn2fr216qjoglq'),
(230, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '14:45:17', 1, NULL, NULL, 'eqssduq9a872m8kao3lgohv53lshccul'),
(231, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '14:46:21', 1, NULL, NULL, 'ua7nsieqnamire24lstar47g4r8gha17'),
(232, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '15:14:08', 1, NULL, NULL, 'hnpsmu1f1nq6cojg7l3cirlteov5k5g3'),
(233, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '15:21:56', 1, NULL, NULL, 'd234flcurdsau2uvf5hjqq399s9gtd23'),
(234, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '15:36:00', 1, NULL, NULL, 'k4fo7ndbf77dud4dlourg0vqciq8mb0m'),
(235, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '15:55:27', 1, NULL, NULL, 'cvkaqnoudo9bleh9qgs2sptrg6ie1n5b'),
(236, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '16:05:12', 1, NULL, NULL, '7o9rogeftpo60fbkpp91glfqt2ersasb'),
(237, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '16:09:59', 2, '16:10:21', '2019-03-07', 'rmh3ept23s1kcn4q82gi1prso8pu7531'),
(238, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '16:11:18', 2, '16:11:58', '2019-03-07', 'g5c1a3kutmuokk3k69kir81kj7bpe85q'),
(239, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '16:12:22', 1, NULL, NULL, 'shvna9doga63kptht1fqe94hd7593kfm'),
(240, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-07', '16:21:30', 1, NULL, NULL, 'p3pu04eb06611t01vqaie2dhdrcqd9nh'),
(241, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '16:35:14', 2, '16:36:18', '2019-03-07', '3bkpvqlbaup8kcskd6pn81uk5rsep6om'),
(242, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '16:51:44', 1, NULL, NULL, 'bn92rbis3s2n5ttduar5i0ds2ufb1tm4'),
(243, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '19:09:16', 1, NULL, NULL, 'khfde64ubg27dbf3jlmcip28e14mnuqa'),
(244, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-07', '19:15:52', 1, NULL, NULL, 'be1iutpmoua7j0bdas9noj41pelhuvf8'),
(245, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '10:09:59', 1, NULL, NULL, 'og1qjimhr4tjbeeabbkbmb1f0ia4lb44'),
(246, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '10:30:26', 1, NULL, NULL, 'ut2f74p4cvrkr2bbn5pqdnmnu06gqnvr'),
(247, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '10:30:58', 1, NULL, NULL, 'i2l31shrf2i81poa5icmjo5evjq85198'),
(248, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '10:44:24', 1, NULL, NULL, 'oiv9oci5l4v73pjpors1kh2aqd4pub1m'),
(249, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-08', '13:15:13', 1, NULL, NULL, 'nr5of6ol7162rmkverrdluk2k2rlk8j5'),
(250, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.6', '2019-03-08', '14:47:33', 1, NULL, NULL, 'kd08nf3l2mdocjoepucd6pprbfjhrj6n'),
(251, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.6', '2019-03-08', '14:48:17', 1, NULL, NULL, '2rbo2s97aatvv1hiaelgb98vvpek64gk'),
(252, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '16:37:49', 1, NULL, NULL, 'bvjd1k9afccbl1g0cad7ec5guhvp7p3n'),
(253, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '16:43:47', 1, NULL, NULL, '7vth4o9r0u0km5j69ak670r8fca94lpb'),
(254, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '16:49:50', 1, NULL, NULL, 'cnse7eb2har91sihk0gc7j5dfc8aindg'),
(255, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '16:51:19', 1, NULL, NULL, 'sp8h9unjp5ml4paa44ohsg2utn6hvfkf'),
(256, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '16:56:22', 1, NULL, NULL, 'bl6sqmi6rlvfucilacfq4phi40e2ou1c'),
(257, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-08', '17:04:45', 1, NULL, NULL, 'jk1jvjg084tebr4e7qag45n5qfj2hunq'),
(258, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:06:20', 1, NULL, NULL, '0fd20devgk7vs6ddmp37a4rmq47j1h0o'),
(259, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:07:13', 1, NULL, NULL, 'pdkip0o9q1m9rbk2f9aig0d3ho9fs444'),
(260, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:07:52', 1, NULL, NULL, 'n8k7ngvdjlpan9vk2sp13areueji67jk'),
(261, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:08:40', 1, NULL, NULL, 'csk5ripaddbmi9vg9o96n64kikdm4kbh'),
(262, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:12:28', 1, NULL, NULL, 'roce6ubm5j5uii1l3kc6r0o83b563463'),
(263, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:21:56', 1, NULL, NULL, '0091cn4s1iq9499hubf6dj28e4p4ln4p'),
(264, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:32:29', 1, NULL, NULL, 'e4udqe9jhq8v4jaru2ql6asqcb8v778a'),
(265, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-08', '17:58:49', 1, NULL, NULL, 'kusun41m58qp1ckstna8e0ui8n2pvd17'),
(266, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '09:59:45', 1, NULL, NULL, 'g8kf36l5d0k0g7oqi01gfmavtsmpj2el'),
(267, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '11:48:42', 1, NULL, NULL, 'f0i9uiefe1mbuh0sb1iubqbf6383f5sl'),
(268, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '12:07:31', 1, NULL, NULL, 'v9fplp9antassluoe3tt3abto6t7csv4'),
(269, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-09', '14:19:59', 1, NULL, NULL, '2nue3aq8iiau5akhdehiufgvjs9q1uki'),
(270, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '14:33:49', 2, '14:35:56', '2019-03-09', 'qu8kf464jo9mqdd86s91cb4vqgsgg6qq'),
(271, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '14:36:21', 1, NULL, NULL, '230par4sm0f9rl54md9pn7d8kj70rpth'),
(272, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '15:23:05', 2, '15:23:35', '2019-03-09', 'm2epidugejl21ncnfjjgo9tc6a5bcfvf'),
(273, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '15:23:52', 2, '15:24:24', '2019-03-09', 'nibbneve6qrioqqpd81rb48nnh6o0ck3'),
(274, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '15:24:38', 2, '15:25:07', '2019-03-09', 'ukuj4okmh8eeulq1uu8pu34js0v6rc9c'),
(275, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '15:25:20', 2, '15:27:19', '2019-03-09', 'iqhgbjnp6jqso70l3kn8u1m4h65qkt1j');
INSERT INTO `Ilab_master_session_history` (`slno_history`, `user_id`, `username`, `user_role`, `browser_detail`, `ip`, `entry_date`, `entry_time`, `status`, `logout_time`, `logout_date`, `session_id`) VALUES
(276, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '15:27:34', 1, NULL, NULL, 'suovlkac4hk7vdl1nd9m2j6i01ljhps8'),
(277, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '16:00:18', 1, NULL, NULL, 'qfjlo12hgmsrdg9e25ku0kq7hh3lid5m'),
(278, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '16:17:33', 2, '16:17:50', '2019-03-09', 'kkfur882pq4og0e0lge2rs4gkbles7b9'),
(279, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '16:18:02', 1, NULL, NULL, 't3m7qtfg0ge58t6tt31eks8ee89l96e5'),
(280, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '16:51:01', 1, NULL, NULL, 'mprq3rn20hkoch3qvn778ook51t0vvt7'),
(281, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '16:58:43', 1, NULL, NULL, 'qk9qkvnataekunhltjhap9tuvbin9isg'),
(282, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '17:32:33', 2, '17:32:54', '2019-03-09', '2bfsvm61d07v3c7723071vvsjujhafsn'),
(283, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-09', '19:09:02', 1, NULL, NULL, '4hg99uf3om4pcdrmlrev15fi8at4t1a3'),
(284, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-09', '19:10:47', 1, NULL, NULL, 'elmsa5dkvhf5mbfsdhtms7bog3rvkbm5'),
(285, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-11', '10:37:58', 1, NULL, NULL, 'jamgbhobvkvvd6pi8ob9581llc5td1ej'),
(286, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-11', '17:19:04', 1, NULL, NULL, 'vfrlfggqd7livpkfb42ubtcaschvakt7'),
(287, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-11', '17:43:49', 1, NULL, NULL, 'p8j03hmm082jpnb8q7jq6act0qs9aa5e'),
(288, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-11', '18:06:03', 1, NULL, NULL, '353oh02gdq6h20r0hqggig05d0r4t031'),
(289, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '10:38:23', 1, NULL, NULL, 'uv9fp46b0fupoie0ejikklpe0a1aj0im'),
(290, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '10:44:42', 1, NULL, NULL, 'ibco4gh9vjs5bffsmabcnhgsnigkligj'),
(291, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '10:50:42', 1, NULL, NULL, 'i0eqnds8tp0n4674t9gmkpa5hhlufkd9'),
(292, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '10:51:48', 2, '10:53:50', '2019-03-12', 'mmpc8o6psn6au8bvvhfrlae9v3iddopp'),
(293, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '11:00:56', 1, NULL, NULL, 'u9gm8muh6vad470evufll72htdgaeqb1'),
(294, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '11:08:11', 1, NULL, NULL, 'joa0kvebh0qhmndfpon14fr1pdmfbeui'),
(295, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '11:21:19', 1, NULL, NULL, '26q3vhr7dgn45cmlk06agkk2rbf8rdb1'),
(296, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '11:47:00', 2, '11:49:42', '2019-03-12', '75qk6r3bs5c5g8jl6bcd2m7v549v417j'),
(297, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '11:49:46', 1, NULL, NULL, '3lfi0bfa1jpdgd9dv4ap9vme50bff750'),
(298, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '12:27:00', 2, '12:33:18', '2019-03-12', 'oer8vjrpn4re3bupjjm7v3gii5dc74p6'),
(299, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '12:37:17', 2, '12:39:13', '2019-03-12', '4uukoe6eo1knm78mnnp3sief2kdq213s'),
(300, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '12:39:34', 2, '12:42:17', '2019-03-12', 'pm8d7261ve1mh4602iurthtu6slfvu2u'),
(301, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '12:43:26', 1, NULL, NULL, 'cqbembml97qa7v6olfc78o0t0vc1mq2h'),
(302, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-12', '13:06:34', 1, NULL, NULL, 'e3gvo8dufp3lup2ofurbbnaq2f1a4hbg'),
(303, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '15:11:42', 2, '15:13:54', '2019-03-12', '56s4fj4oirgi9u3jdu49c6qipq96emq9'),
(304, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '15:14:14', 1, NULL, NULL, '2ru99cckh2i3hlhcsi7rdl1fkjc531o7'),
(305, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '16:41:10', 1, NULL, NULL, 'su7sa928iucafkisb3vjnbnvcjvekjll'),
(306, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-12', '16:48:59', 1, NULL, NULL, '3j3ecbuek8pa7lh4is5ue2t175uevf9j'),
(307, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-12', '17:06:32', 1, NULL, NULL, 'm4ndfavb0ekrlmg6ihgru67uddtbnl6p'),
(308, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:20:36', 2, '17:23:56', '2019-03-12', 'p3v3vrfrn4dpqv82qc6hdk311unqsfhk'),
(309, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:24:11', 2, '17:24:35', '2019-03-12', 'pfkli0406l801f5jjhf1t034k81gsoag'),
(310, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-12', '17:24:48', 1, NULL, NULL, '2kkel2jptt8qg5htnrett88iie1i1tm0'),
(311, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:31:22', 1, NULL, NULL, '6dtdi1faf2dpg39ajuprqc3el23s6e5n'),
(312, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:40:09', 2, '17:41:21', '2019-03-12', '01s0vb1fbfbff682bjaval59oklpgju8'),
(313, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:41:33', 1, NULL, NULL, '9g64d85jhc8halpdvbo0gs3aoqa2doqk'),
(314, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-12', '17:46:46', 1, NULL, NULL, 'o1tsa7bk737cvh9l1hu313hr6hqsot1k'),
(315, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:51:38', 2, '17:52:15', '2019-03-12', '17ad2g5dk8fhc8hh661db5rla30q4srl'),
(316, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '17:52:56', 1, NULL, NULL, 'l2f17rfb295g8dr5oir3repo00c3e8jn'),
(317, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '18:14:04', 2, '18:14:40', '2019-03-12', 'sgp0u4kohtcshqm44k9uhet7fr4q7hql'),
(318, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '18:15:17', 1, NULL, NULL, 's734mm0r8gkt87h2g7l3ll9ntm1qdcgd'),
(319, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '18:56:26', 2, '18:56:49', '2019-03-12', 'rq271ati7r5cstajjpgqf5lf915rrc8t'),
(320, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-12', '18:57:03', 2, '18:59:00', '2019-03-12', '5p0d96c8mmqgv0eifc2lulgor71d82l5'),
(321, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-12', '19:31:33', 1, NULL, NULL, '8m1bjj3hojkij906t8c5pse3vmvrcj96'),
(322, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '10:19:45', 1, NULL, NULL, 'ej4bs4gdslng7gtalk2qee7pj2njocu9'),
(323, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '10:20:30', 1, NULL, NULL, '8c262ebal8ui8dp0vr6nod5e9kka6tck'),
(324, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '10:38:39', 1, NULL, NULL, 'ce84r3clddkj0cc3v0pqqaer4fo26bm8'),
(325, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '10:39:08', 1, NULL, NULL, 'ai7lefiba9cdnmugfl7p0lgt5n1v38gc'),
(326, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '11:10:30', 1, NULL, NULL, 'f3eov1si9jhij0g6r631bvn8jt4fapkd'),
(327, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '12:22:34', 1, NULL, NULL, '83l0crrm1ua2nvpoj11v8p2184jv2o15'),
(328, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '14:11:49', 1, NULL, NULL, '20c0g0qi1m162npqna4skgo5n6gu7khj'),
(329, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '14:53:16', 1, NULL, NULL, 'gc0vmm8gf0i6a9ejtpqqi9tftpdbfmi0'),
(330, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '15:14:57', 2, '15:17:08', '2019-03-13', 'be5j7pk2l3n4c03drnc38bfpq22hhv85'),
(331, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '15:17:26', 1, NULL, NULL, 'fifvh5ugqbj252cptctpdivmr07n3v81'),
(332, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '15:29:36', 1, NULL, NULL, 'c4j33rr97v1god59glb88qfmqod49n1g'),
(333, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '15:30:33', 1, NULL, NULL, '1rkv5o1knsp300nf6tddh3ce94nrfovd'),
(334, 'bu1@ilab.com', 'bu user1', 6, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '15:43:42', 2, '15:44:52', '2019-03-13', 'f98768k5t98itf4gr43du316bdqn0hfa'),
(335, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-13', '15:52:24', 1, NULL, NULL, '7ci2du9iutv2in24ukpsi5be2v0ch46u'),
(336, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '16:55:18', 1, NULL, NULL, 'ckoq2fd0d4favv9jtvslrngfdf100j06'),
(337, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '17:09:37', 1, NULL, NULL, 'mgeuijsrdop4k90jsu6eog6cdavvgnmi'),
(338, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '17:09:54', 1, NULL, NULL, '55mol7te8bsm0bl23u9mhdv2ladctlpn'),
(339, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '17:21:00', 1, NULL, NULL, '8uo6bsev89vat9ic5bfh6akq0b4a4po8'),
(340, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '17:21:46', 1, NULL, NULL, 'il4frq2f3hf6c9mula1ccp031ja0c77f'),
(341, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '17:22:33', 1, NULL, NULL, 'hr23kn3t0qbara1mg75n3ujj57laq102'),
(342, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-13', '17:50:08', 1, NULL, NULL, '3euh8incec84cbm5thrv8v2ionjbg50o'),
(343, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-14', '11:44:46', 1, NULL, NULL, '04jjub7gpr3f8isqmlaef9p6skj7j5db'),
(344, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-14', '13:37:35', 1, NULL, NULL, 'n2ho17d1pi77a366eam7ms091atbds5h'),
(345, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-14', '18:51:17', 1, NULL, NULL, 'mk4te9289o4actb9b381t8nqqvhcdmpa'),
(346, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-14', '19:39:03', 1, NULL, NULL, 'h17l9aj547md1vucd1p4a9us3ebh1s4s'),
(347, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-14', '19:55:11', 1, NULL, NULL, 'qsgluvdq39jkh4th6cqrvc9mn1crates'),
(348, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-15', '10:11:52', 2, '10:14:44', '2019-03-15', 'vghu57pkk0uimkc5i0drsjlcvm9fktb4'),
(349, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-15', '10:14:59', 1, NULL, NULL, 'd9umrm8inbsuh9368l6bhn3k00255igp'),
(350, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"71.0.3578.98\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/71.0.3578.98 Safari\\/537.36\"}', '192.168.0.3', '2019-03-15', '11:03:40', 1, NULL, NULL, 'pr6763tq80i9jhkl4brdhvpnlj9b42to'),
(351, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-15', '12:52:22', 1, NULL, NULL, '4jtamfp508hcfip88tli50k1vu8p1hf8'),
(352, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-15', '16:44:54', 1, NULL, NULL, 'tsst4knk25ivgtacqlg2l50snoj56j4d'),
(353, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-15', '17:13:06', 1, NULL, NULL, 'pe0ajj4ldin2vc6mp3oa3g1epgbhn8is'),
(354, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"71.0.3578.98\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/71.0.3578.98 Safari\\/537.36\"}', '192.168.0.3', '2019-03-15', '17:44:39', 1, NULL, NULL, '908t501mbmn7jt69deknv4eodmerrpee'),
(355, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '10:16:39', 1, NULL, NULL, 'buaf1pt31tp6a5p1b4nuujlapefibtsl'),
(356, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-16', '11:20:39', 1, NULL, NULL, 'sbbcjg3tqtjig9jb0pgun2aoh2mc7dc6'),
(357, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '13:50:39', 1, NULL, NULL, '4uj6g43aiin7v40d464mgd8lgmdh9jia'),
(358, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '15:18:33', 1, NULL, NULL, 'qg49t5pc6a5ikljnoc1ngcgf566t5m8c'),
(359, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '15:38:18', 1, NULL, NULL, '7aertjtack2v2q0jso83qlvbqak74rek'),
(360, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '15:57:51', 1, NULL, NULL, 'sh2tufajggcqj13lv07lj71552qc5fl1'),
(361, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '16:21:09', 1, NULL, NULL, '9vpiu6i1cvvntkugr0pbh4k38cvp3547'),
(362, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '16:58:19', 1, NULL, NULL, '20utb3u70msh2ockvp0512oq4dmuaojl'),
(363, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '17:03:25', 1, NULL, NULL, '5cj6or14bquajmllo7nd17deg6vf1gcd'),
(364, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-16', '17:51:40', 1, NULL, NULL, '57hoct6imiq2d79knc8dndae586rmco0'),
(365, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-16', '17:53:47', 1, NULL, NULL, 'nqk9khbgn2egg7e08us1i7nsn9l1gfi7'),
(366, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '17:59:44', 1, NULL, NULL, 'll734d2r0qsfqf3b51p24h93lks8a3b2'),
(367, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '18:22:42', 1, NULL, NULL, 'k2ge65apon5ll9v4tqk7ao8q3usor5vt'),
(368, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-16', '19:06:21', 2, '19:08:47', '2019-03-16', '5gqt12tc8mjrr36ao18ukdrc9hocshe5'),
(369, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:15:25', 2, '10:16:58', '2019-03-18', '8j2kefdd5mn89njto8dhvsfstn0brt6a'),
(370, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:18:14', 1, NULL, NULL, 'lniek3lkpm1n5rdg8t33a2v871l1pslm'),
(371, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:28:37', 1, NULL, NULL, 'oqo8emnptk4v68055gt148jitmjn8tj4'),
(372, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:41:46', 2, '10:43:36', '2019-03-18', 'fa38jrmt98d7o9pge77bsovnikferk3e'),
(373, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:43:57', 1, NULL, NULL, 'tk73rgpnfk18fhu69n5anacr5jic3le6'),
(374, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:53:59', 2, '10:54:55', '2019-03-18', '4iuvi50aa8h3h44rksvolli1mse0aip2'),
(375, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:55:21', 1, NULL, NULL, 'ra80t4bvhdd0pf1tn38tm5dr60qmq3gk'),
(376, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '10:59:28', 1, NULL, NULL, 'li7bl363fqoseo2t4roip03ircll7mj1'),
(377, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '11:01:03', 1, NULL, NULL, 'e8d90u2clkdlgd41qhhmhqhs7mj6v2lo'),
(378, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '11:21:35', 1, NULL, NULL, 'qh4um94iupjlomd7gkfa4satufkefffb'),
(379, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '11:25:45', 2, '11:29:00', '2019-03-18', '8t57fs2bdl4q20llive2ikd7vtm7359f'),
(380, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '11:29:27', 1, NULL, NULL, 'et3587dn0cn8m8vv32seegavqmukc3ns'),
(381, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '12:32:20', 1, NULL, NULL, '9dte29fdj1o8r3ghf86s1i5ihu19u2ol'),
(382, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '12:47:40', 1, NULL, NULL, 'iut07juhj9dnaer18gbpcstvjrqru650'),
(383, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '12:52:37', 1, NULL, NULL, '8ve650vtpnh7dd92k9tmbjui10e2tr4o'),
(384, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '12:53:25', 1, NULL, NULL, 'qh6313ich9o1utc9mot7fje3295240su'),
(385, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '12:53:26', 1, NULL, NULL, 'r7jl6qb40go2d47r1ri5mvn881nuot0a'),
(386, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; WOW64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.8', '2019-03-18', '12:54:48', 1, NULL, NULL, 'nqggou5lo1fvsu9bs81p77gtgv65777o'),
(387, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '12:58:47', 2, '12:59:28', '2019-03-18', 'drmei6v3tt84r2m9513ehbuqtqc0kbgs'),
(388, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '12:59:40', 1, NULL, NULL, 'npbealj3o0qarek8orajgkc1i4lgfprt'),
(389, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '13:03:22', 1, NULL, NULL, 'v4p9fdcs51euaufkjco4rfkg5j3mkn08'),
(390, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '13:04:43', 1, NULL, NULL, 'e47k84jlt5egekf2bjstgur5r0dfb8oq'),
(391, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '13:14:08', 1, NULL, NULL, 'he1bc4kca552t8nc0djq4c6gt1eq1g65'),
(392, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '13:21:00', 2, '13:21:49', '2019-03-18', 'k5bopcnailrkf4prmpll4bpdsdslpovc'),
(393, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '13:22:03', 1, NULL, NULL, 'nv4jn3ntcidbt8p4mv4gqljmt9pa74f5'),
(394, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '13:46:42', 1, NULL, NULL, 'k3p7j5phhp8ob63citsmoi4fhtvlhduc'),
(395, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '15:29:25', 1, NULL, NULL, '3obrmptrn64sqeve2q0jgch7olo3jr3t'),
(396, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '15:30:17', 1, NULL, NULL, 'oqd6e0bka1n84hrksc5nn172joio0u0h'),
(397, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '15:32:06', 2, '15:33:16', '2019-03-18', '6ov59m9d5r8dpqquiibm036dngip01u5'),
(398, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '15:33:28', 1, NULL, NULL, 'lrmvs4r4lsf6mlophpi0rpfh27oq9d8u'),
(399, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '15:45:05', 1, NULL, NULL, 'u4pth6f5lq6uitb1bl3emfdqjeipu95q'),
(400, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '16:28:37', 1, NULL, NULL, 'o4ejphchtveseeuq1om044v9j9lrcm7c'),
(401, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:28:45', 1, NULL, NULL, '5kr912ke4o55sq5s6avobbk0utvkrmpg'),
(402, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:30:13', 1, NULL, NULL, 'i0d0v1077k4cue2dqpr3ijnj2fr908b4'),
(403, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:32:48', 1, NULL, NULL, 'm1h9pku3s0d9ieja3o0vadckkuand19k'),
(404, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:34:22', 1, NULL, NULL, 'av7cm7pu6ovl1il1g2pnh8nvrum64a23'),
(405, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:45:47', 1, NULL, NULL, 'koeaq68mut3v92d40dmi3fm5ph8ds4mp'),
(406, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:52:13', 1, NULL, NULL, '8oce11vvn50fb370arkujau4qp79qukl'),
(407, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '16:54:10', 1, NULL, NULL, 'gngmso8pkhqssn92h95jpt6c4g46q3n8'),
(408, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:01:45', 2, '17:02:10', '2019-03-18', '8omsi3qnlqeuubptr7ev0hv0qj9oenp0'),
(409, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:02:25', 1, NULL, NULL, 'vi5up918939p8equc41o6eucv6nc2mp6'),
(410, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '17:08:00', 2, '17:08:44', '2019-03-18', 'eit2fn1i7gm3n1qksqpstr2d309g1k37'),
(411, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '17:09:46', 1, NULL, NULL, 'mo4p1rcd6jakgi98gt44fpt4gc9cjcu0'),
(412, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:17:33', 1, NULL, NULL, 'pfmag6lco0ssuir55kisqai54qne7jmv'),
(413, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:22:00', 1, NULL, NULL, '1bao2con0sv08dti6o2v4mhigsbpttaq');
INSERT INTO `Ilab_master_session_history` (`slno_history`, `user_id`, `username`, `user_role`, `browser_detail`, `ip`, `entry_date`, `entry_time`, `status`, `logout_time`, `logout_date`, `session_id`) VALUES
(414, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '17:35:58', 1, NULL, NULL, 'kt35qrkm9qpkbglq4c0o1mbn0o80f6vr'),
(415, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:37:26', 1, NULL, NULL, 'eej2d4d0mpmlqoece7jb5hniilefdadc'),
(416, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:37:51', 1, NULL, NULL, '9nas6t65sahg8bf1q5135vdit456cnjn'),
(417, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:41:22', 1, NULL, NULL, 'osg3hscigc8d7imcnqb3eg6bg46bh56d'),
(418, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:51:01', 1, NULL, NULL, '1u1ojkqs8eh47misqbs2lssn16343pp8'),
(419, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '17:58:11', 1, NULL, NULL, 'nv26bid55jbmqb2o14sv92kolk4gu40h'),
(420, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '18:11:04', 1, NULL, NULL, '2scq0bdaglb58ehsivvsevop6nvrrs5d'),
(421, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-18', '18:25:55', 1, NULL, NULL, 'lneh9rvldgg8l7khrl9aavpme2gu7hug'),
(422, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-18', '18:59:54', 1, NULL, NULL, '7f193gbl4d5kceqh8st6895m2a7kdmc5'),
(423, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '10:06:46', 2, '10:07:01', '2019-03-19', 'n7qbn4cdfc5mb37n7eq1opm0np1pagvl'),
(424, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '10:07:25', 1, NULL, NULL, '2566mdrq1kqnpj5mo7vb8dap3rniltn2'),
(425, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '10:30:27', 2, '10:30:59', '2019-03-19', '2ulg1ksn2dg7s6s9hcljjfuaqkq1597v'),
(426, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '10:31:09', 1, NULL, NULL, 'okq7nahu5m3dkt2l6ifu2u5tt5jlp334'),
(427, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '10:36:14', 2, '10:37:05', '2019-03-19', 'qrcifadji9dkn1tr2797ok11nhcgbbc8'),
(428, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '10:37:20', 1, NULL, NULL, '4b4d665ago5mj0vfrpi9vkm2gkafhqr7'),
(429, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:13:58', 1, NULL, NULL, 'vk6kjdii45t79rggknf5iggfe1sjf4kn'),
(430, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:15:58', 1, NULL, NULL, 'hsgq6keinp84oufpcd16odgt1ll4rht9'),
(431, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:17:18', 2, '11:17:45', '2019-03-19', '000572v3481l8tgs9vh592nau737uert'),
(432, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:17:57', 1, NULL, NULL, 'vjj72p7f321pc89e3qfljcr49the73p5'),
(433, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:36:28', 1, NULL, NULL, 'tvdik0tr2bf5mq53obkvh291r40lo35e'),
(434, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:37:38', 1, NULL, NULL, 'kdbag77mc8o138kk9nb9e993pao47kep'),
(435, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:56:48', 1, NULL, NULL, 'qlfjgk8b123vatig39p94k1t59v2sehm'),
(436, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:58:13', 2, '11:58:33', '2019-03-19', 'krpoqqva9tgruefd70209qms4kv4539e'),
(437, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '11:58:56', 1, NULL, NULL, 'ub99pp5v4t42l7d8iegpqhd0lpgbpspq'),
(438, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '12:10:58', 1, NULL, NULL, 'tctlu84pipt1po7v2cdphqdej0r1cu0i'),
(439, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '12:12:05', 1, NULL, NULL, 'kamrlvq9roubl13pln2eereeo9fe28kn'),
(440, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '12:14:44', 1, NULL, NULL, 'i4ifq13hi43ufbkpbt4ub4jtgc4tf9fj'),
(441, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '13:09:28', 2, '13:10:25', '2019-03-19', 'o67546asa6sceea8kqidbua16tqi4i3m'),
(442, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '13:10:38', 1, NULL, NULL, 'e0rk5sfd8er6jucrj1la3s143a047rcn'),
(443, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '14:52:25', 1, NULL, NULL, 'snpfgs8g32ajrhdqjk8m4nqbvkdt8vgf'),
(444, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:29:19', 1, NULL, NULL, '6t3ut1215tkjkvsm1eulfe7d71un586j'),
(445, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:31:35', 1, NULL, NULL, 'pcp8598uj8bjatj9uc0fhirhnm3t64k0'),
(446, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:40:34', 1, NULL, NULL, '65378jm0vgfhfcd9d2bpk6ug6uauq7ed'),
(447, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:48:23', 1, NULL, NULL, 'd6in03ovk6ntqgue75d3iji2sci2nts2'),
(448, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '15:51:41', 1, NULL, NULL, 'mtrrn66q30c7uam0mb1avfqqosf0tnqc'),
(449, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:52:47', 1, NULL, NULL, 'ot8p2q8bpjohdmlrsdokspfpr4rcpd4i'),
(450, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '15:53:11', 1, NULL, NULL, 'rbfarvj0lj1mvn6fhr21h74vjtdlkm0u'),
(451, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:55:28', 1, NULL, NULL, 'pl3bd6ebtli848fvobnmd8ak115bh9hg'),
(452, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '15:59:00', 1, NULL, NULL, 'iji933fki7af00thqfca6mfs0qk7tpbh'),
(453, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:02:08', 1, NULL, NULL, 'v5755kfbqfivaauvi6q1748somb2b8r8'),
(454, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:06:37', 1, NULL, NULL, 'hu2hun51q6hvnntuutl93aal2vq6os8l'),
(455, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:10:49', 1, NULL, NULL, '3tvupk4cl05bvu8j0qoq3bdo1b8851c1'),
(456, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:28:54', 1, NULL, NULL, 'sf1atra2rt5at8825f8qjq3r62vkbvd9'),
(457, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:32:33', 1, NULL, NULL, 'ovaupda7aguffbjvmrv6vket6n428jv5'),
(458, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:33:36', 1, NULL, NULL, 'a7oo30390i0l5qoobcqk93hhfo63m2vf'),
(459, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:48:45', 1, NULL, NULL, 'mufho4b77ej5k9heu0qesiq2c01tiq6j'),
(460, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:53:59', 1, NULL, NULL, 's7tr1elm70vevf4q9guoekl193ukr0pl'),
(461, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '16:58:27', 1, NULL, NULL, 'jshr7urh048cjo32o3pihturpuacu179'),
(462, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '17:21:05', 1, NULL, NULL, 'mh7u01stko76oqugt8dfgj8k6fo54cat'),
(463, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; WOW64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.8', '2019-03-19', '17:44:41', 1, NULL, NULL, '09ve9u1qrdg8ktja7d8slv9jj5duvapk'),
(464, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:30:17', 1, NULL, NULL, 'slophvvsipevn2pvun6219gvthb18a23'),
(465, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '18:30:41', 2, '18:31:07', '2019-03-19', '2dcrpdvmgohtv538dd9le84jkgg3rtoa'),
(466, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-19', '18:32:10', 1, NULL, NULL, 'pp3ntpjljmdbcath9cvbe711nkq8nppe'),
(467, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:34:00', 1, NULL, NULL, 'jtp2lm18mh34dvccsmlqea4kmu0002r6'),
(468, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:35:01', 1, NULL, NULL, '67ivdh18trojjqfdipvf99bgl23rn7ei'),
(469, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:36:20', 1, NULL, NULL, 'qf1knhkjn2k0k107m3cj1j7unf0m1e6r'),
(470, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:37:42', 2, '18:38:53', '2019-03-19', 'qgh36bne164gffiuo2dqpummed30u73b'),
(471, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:39:20', 1, NULL, NULL, 'jn14cpci8fkvuqebentij1fbfkb33d07'),
(472, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-19', '18:56:32', 1, NULL, NULL, 'g613p8qv9edp0pkjffe4s8gg5qrctsui'),
(473, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '10:15:15', 1, NULL, NULL, 'b1ce5j1fr45sbhcgaassjm7dresras2k'),
(474, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '10:32:52', 1, NULL, NULL, 's08inad41n12sds1stul98pi949t2dko'),
(475, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '11:02:46', 1, NULL, NULL, '80jqa20htr3kvl0594o4nu8vc81f5bvd'),
(476, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '11:31:58', 2, '11:36:23', '2019-03-20', 'rmjcqmfs5nh1t8tinsarjjscoh6v79u4'),
(477, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '11:57:06', 1, NULL, NULL, 'padpdkfdmu63trabtgbvethcqduk9rgu'),
(478, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '11:59:52', 1, NULL, NULL, 'msu28ijlgq9a2kr2gtsmic1lh9bqp0kg'),
(479, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '12:06:42', 1, NULL, NULL, 'q8ieqv93j601jse91kuiucak9pjodsck'),
(480, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '12:18:09', 1, NULL, NULL, 'gtoh1f2al42ngbmhhfed895nli5a3dos'),
(481, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '12:34:44', 1, NULL, NULL, 'hn68s9i7f1r3j1c9dkodc11sbd74bpia'),
(482, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '12:36:07', 1, NULL, NULL, 'nv33s2tsg8fj2m2mlubd78b5oe62cs0h'),
(483, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '12:37:06', 1, NULL, NULL, '1di6artc60ur2uf7qov4fqvkdtciea58'),
(484, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '12:38:45', 2, '12:38:49', '2019-03-20', 't9it97lbqmd42h51glveicf8241nvh58'),
(485, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '13:10:38', 1, NULL, NULL, 'kvskka9no4aadnipft97naj39tv54cat'),
(486, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '15:00:52', 1, NULL, NULL, '8l440qh9riketmop6lhqk829a8uqamei'),
(487, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '15:05:17', 1, NULL, NULL, 'ufongbe7klc9mfof30pnlu5p1kn3k0uc'),
(488, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '15:09:16', 1, NULL, NULL, 'hkd37bq28bd71d1q4i4janjhe8phjpgu'),
(489, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '15:13:20', 1, NULL, NULL, 'uj2aq8fpi9mhh8260eafoan4q6qr9q4f'),
(490, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '15:17:59', 2, '15:22:23', '2019-03-20', '7f9d5ulg48699l0a6j51kb37fak88jue'),
(491, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '15:23:38', 1, NULL, NULL, 'c92j23lg5ch1q2v8edrcohqn1behs5a7'),
(492, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '15:47:11', 1, NULL, NULL, 'mcb9amoarajk29l1igag362hi9okeco2'),
(493, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-20', '17:27:38', 1, NULL, NULL, '93j7p5jbk03rg0vo9vr314bfg3k8euaf'),
(494, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-20', '18:15:13', 1, NULL, NULL, 'po9bpnsvq379ld1br9vcg7hdpnadcmqe'),
(495, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:00:55', 2, '10:01:55', '2019-03-21', 'qrquqcieh1fj22lu3eom9d1nbpgohh4i'),
(496, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:12:35', 2, '10:13:33', '2019-03-21', '629rl7d33ru1j7kqmlataesj7uodc6lg'),
(497, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:13:45', 2, '10:14:25', '2019-03-21', '7s9arip4lcelrbv9i4as83f66ir4fis4'),
(498, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:14:40', 1, NULL, NULL, '9cs90lbeh5mlfimkvqb17v0kj0vgftqv'),
(499, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:22:25', 1, NULL, NULL, '3manr77oahui1gaf6c69oft75vjts349'),
(500, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:23:03', 1, NULL, NULL, 'c8hafth9cdvm8etoa8qb0djch7u7537g'),
(501, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:28:55', 1, NULL, NULL, 'g30delhq3pf8h091alreg0mmjqj8ridl'),
(502, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-21', '10:52:04', 1, NULL, NULL, 'q2sgg39i86d75ht5s57jkqejuqgg0rcb'),
(503, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '10:55:02', 1, NULL, NULL, 'mgn94q0v39j5s7pfo6uoddmf91na0g00'),
(504, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:02:32', 2, '11:03:53', '2019-03-21', 'g7or6hn2v2pfcla300ff30kcmf7f9ghk'),
(505, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:04:18', 2, '11:05:04', '2019-03-21', 'jembq2uvatj15k9vjv7m1gc83afk9j92'),
(506, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:05:18', 1, NULL, NULL, 'bsr7er78t6a5nf4dnmqp1fo9tf5lnn59'),
(507, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:10:34', 2, '11:11:52', '2019-03-21', 'pl8lpf5r3eot30k3dih3kcvatdn80s9g'),
(508, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:12:22', 1, NULL, NULL, '3203puut8nahrrj0rbvvj5i41fc7ub1g'),
(509, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:44:52', 2, '11:47:20', '2019-03-21', 'ov9k0m5qftiqmlmdien0bvm0sudctdoh'),
(510, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:47:56', 2, '11:48:23', '2019-03-21', 'asa5cnjnq24l56bot8iea5cnfk47qogt'),
(511, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '11:48:50', 1, NULL, NULL, 'skn6n6ak9dh7k44es6ls59fuharepdlh'),
(512, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '12:08:16', 1, NULL, NULL, 'nm5e613t41hrsfb47bv1lp5ch4dfa2ch'),
(513, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '12:15:04', 2, '12:15:34', '2019-03-21', '3u6cho6sp4f0nvdsfmdc9mfcssgmlchf'),
(514, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '12:16:02', 2, '12:17:01', '2019-03-21', '27jtlclcmb8rpkf6shks65m2kms12rvj'),
(515, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '12:17:17', 2, '12:18:30', '2019-03-21', 'pebtarvjd6vbic4u8cfr9o7557rh5iad'),
(516, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '12:19:13', 1, NULL, NULL, 'i77opjnk6m2p51p0a5u6gh6pbeb3ilfo'),
(517, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-21', '13:06:04', 1, NULL, NULL, 'avnmh4cl62dq3t066kc04vpebdcekjfu'),
(518, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"65.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:65.0) Gecko\\/20100101 Firefox\\/65.0\"}', '192.168.0.3', '2019-03-21', '17:44:07', 1, NULL, NULL, 'raq3u9t8840fsef85bdiigs767t14u7j'),
(519, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '10:15:39', 1, NULL, NULL, '3607rvqkfs3d62nkqmad83fdaa81dg47'),
(520, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-23', '11:44:44', 1, NULL, NULL, 'lq9lbl11dg7gclf0id0uidk9hdq5jtlm'),
(521, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-23', '13:06:57', 1, NULL, NULL, '67mf7h39hgq7riubjme06vh93bqvvve7'),
(522, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '15:32:54', 1, NULL, NULL, 'hh1kq176mk5n67hffhbi06srt5m2hhnr'),
(523, 'design2@ilab.com', 'design user 2', 2, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '16:23:01', 2, '16:24:05', '2019-03-23', 'l6eobbg5741p3lsvivhchrhonbv1so58'),
(524, 'siprah@gmail.com', 'Approver5', 8, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '16:24:24', 2, '16:24:51', '2019-03-23', 'hs9m8uedh2mdckdl1c31acl1cpmlau09'),
(525, 'pro@ilab.com', 'procurement user 1', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '16:25:14', 2, '16:25:52', '2019-03-23', 'kgarf9emhu7g0lrf4uejm6nisog8js65'),
(526, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '16:26:05', 1, NULL, NULL, 'hupe69gk0cnkm18giqi0fjs0o6r1r18u'),
(527, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-23', '16:40:49', 1, NULL, NULL, 'v2ervghvo406d5r0mjudj02o87lmj3ao'),
(528, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-23', '17:15:17', 1, NULL, NULL, 'jtjke3b5ph4jj38lju3opcbqoku8s3g6'),
(529, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-25', '10:16:06', 1, NULL, NULL, '44k3teon8oim05eh1rr73qamh2jnj697'),
(530, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-25', '11:16:26', 1, NULL, NULL, '9tkrlkitd86rbtuvl44429trl65srl0h'),
(531, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-25', '11:33:19', 1, NULL, NULL, '0bhhut0obtaaag8gj89i52b19g4o5l0h'),
(532, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-25', '12:42:18', 1, NULL, NULL, 's8aud8g2vn4f0h28ltq40mtop8ee03f0'),
(533, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-25', '16:12:10', 1, NULL, NULL, 'er0buihqq45gj3ct0kc66ppdp2hleh54'),
(534, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-25', '17:13:46', 1, NULL, NULL, 'mdvmltti4g52f0hssbknbjkojfnvjovo'),
(535, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-25', '17:26:40', 1, NULL, NULL, 'lj1segoq1ghv0kqgqf43kis5e5kkj8tq'),
(536, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-25', '18:27:09', 1, NULL, NULL, '7tch694tur018m4d8mp563n1fltj0vvg'),
(537, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Firefox\",\"browserVersion\":\"66.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko\\/20100101 Firefox\\/66.0\"}', '192.168.0.3', '2019-03-25', '18:55:33', 1, NULL, NULL, 'e480n6n44b8okdbe2vmuimmjussl0bvd'),
(538, 'buy1@ilab.com', 'buyer 1', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"72.0.3626.121\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/72.0.3626.121 Safari\\/537.36\"}', '192.168.0.4', '2019-03-25', '19:12:50', 1, NULL, NULL, 'ip4lf0hl6slgmtqnfm7040p12dg3eqc3');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_session_history_vendors`
--

CREATE TABLE `Ilab_master_session_history_vendors` (
  `slno_history` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '0' COMMENT 'here serial id of vendor will be used',
  `browser_detail` text,
  `ip` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `logout_time` time DEFAULT NULL,
  `logout_date` date DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here user history of login';

--
-- Dumping data for table `Ilab_master_session_history_vendors`
--

INSERT INTO `Ilab_master_session_history_vendors` (`slno_history`, `user_id`, `username`, `user_role`, `browser_detail`, `ip`, `entry_date`, `entry_time`, `status`, `logout_time`, `logout_date`, `session_id`) VALUES
(1, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '13:18:38', 1, NULL, NULL, 'bsv7m4i305s07fkm48a1po3jhi7go027'),
(2, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '14:46:00', 2, '14:46:36', '2019-01-28', 'tujk6k9fsj4v7qmj9ckfjqu5n8g24sph'),
(3, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:00:51', 1, NULL, NULL, 'u8b34n35oc469bb1dvjujo0ogaol006e'),
(4, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:52:54', 2, '15:53:25', '2019-01-28', 'd7njkejhfpfoj4k5e0rr55lns7id2ogp'),
(5, 'ven979@yahoo.com', 'Vendor55', 11, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:53:48', 2, '15:56:08', '2019-01-28', 'q4hk1u4dco0r7f0ssveh5bajlp9f5v9r'),
(6, 'ven97@gmail.com', 'Vendor779', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '15:58:09', 2, '16:00:41', '2019-01-28', 'fhkuth2grdr60ut25fnmcc6k459o8qe7'),
(7, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '16:01:18', 2, '16:01:56', '2019-01-28', '3vttqi95annvkoe7rfniq4iblethrbmu'),
(8, 'ven310@yahoo.com', 'Vendor 7', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '16:03:10', 2, '16:06:40', '2019-01-28', 'k7thh30tbi75rod1736pvk6e6556r1ar'),
(9, 'ven66@gmail.com', 'Vendor31', 13, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '16:20:09', 1, NULL, NULL, 'hr13dm8s7gah3c6hjlnn1m1cpejpnafo'),
(10, 'ven371@yahoo.com', 'Vendor21', 14, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '16:25:51', 1, NULL, NULL, '1mlsitja9cd21rumlsj7s7454vbaf3ak'),
(11, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '17:07:34', 2, '17:09:22', '2019-01-28', 'abn4gmtnvh69u16d8tna096ccb0qpbc3'),
(12, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '19:18:57', 1, NULL, NULL, '3snr0uvrtjs07ggbuo1nnqikhhib805j'),
(13, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '20:14:16', 2, '20:16:52', '2019-01-28', 't7irb8vggqbggmvdctl3a0a2af9aus2e'),
(14, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-28', '20:17:13', 1, NULL, NULL, 'g3uh6j9am939tq4bc8jkg3iboc83fbkv'),
(15, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-28', '20:19:08', 2, '20:20:58', '2019-01-28', 'qrporaj8bapgka3t31qhcvbp7glnc34o'),
(16, 'ven97@gmail.com', 'Vendor779', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:00:41', 1, NULL, NULL, 'gokcfgbac2jdeatre0j1fn5uevahih3k'),
(17, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:05:53', 1, NULL, NULL, 'u219l5bmh8n48j3plhhema6mr016u1bl'),
(18, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:07:48', 2, '17:08:32', '2019-01-29', 'fdbshqspt9co1bpj0mjc4lmh5klg2hrr'),
(19, 'ven66@gmail.com', 'Vendor31', 13, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:09:10', 1, NULL, NULL, '2a9bfu01ti3l4do1n34r11u26ku5l7f7'),
(20, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:15:23', 1, NULL, NULL, 'gocjfdnjhrgck3fc6mkkalkf9mtnj812'),
(21, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '17:36:39', 2, '17:37:10', '2019-01-29', 'mqho80p1picdp72ipjeb9rjs4s27uan3'),
(22, 'ven97@gmail.com', 'Vendor779', 10, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:03:02', 2, '18:06:36', '2019-01-29', 'fav9nbr20vpq0mk0e6vg9hmpn76m86vp'),
(23, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:07:07', 2, '18:10:33', '2019-01-29', '6vk01gooje9jcu6693qf7duc60s7osla'),
(24, 'ven310@yahoo.com', 'Vendor 7', 7, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:11:16', 2, '18:15:17', '2019-01-29', '91oih9hogblaj1f7pm744vor0iomm3dl'),
(25, 'ven66@gmail.com', 'Vendor31', 13, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:16:24', 1, NULL, NULL, '5sp78ukh1u630ef8s0krugeheagk3l5g'),
(26, 'ven371@yahoo.com', 'Vendor21', 14, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:22:11', 1, NULL, NULL, '50s5f6g6gtktvafrqponaa58gjnkm1md'),
(27, 'ven979@yahoo.com', 'Vendor55', 11, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:29:23', 1, NULL, NULL, '4sepbeadmcgfrin83g3qpfce46gtij3e'),
(28, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:52:41', 1, NULL, NULL, '3mf5kku5gqu2jk2461qd9dd5rdivgooi'),
(29, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:55:28', 2, '18:56:24', '2019-01-29', 'pmrr5fl9sk6a73lljikrh124i9abrp01'),
(30, 'ven979@yahoo.com', 'Vendor55', 11, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '18:57:36', 2, '18:59:56', '2019-01-29', 'jb7ano8b8aelj93pjg8psq08harp0d1m'),
(31, 'ven979@yahoo.com', 'Vendor55', 11, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '19:00:32', 2, '19:01:26', '2019-01-29', 'fomep7t4eo743k9hklv2rt1t21m25485'),
(32, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '19:45:36', 1, NULL, NULL, 'rvn2lctle3akq6gjsucuabbf72rbou70'),
(33, 'ven979@yahoo.com', 'Vendor55', 11, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '19:47:26', 1, NULL, NULL, 'jn98cgi2adm6nhfaggpf0ho3pvr0hlbs'),
(34, 'ven979@yahoo.com', 'Vendor55', 11, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '19:50:06', 1, NULL, NULL, 'aarnl2tmns9lkhcjgnerafurooikb9p9'),
(35, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '19:51:30', 1, NULL, NULL, '0drmfi0caorovrmkoiknl8q4prn59345'),
(36, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '20:05:07', 2, '20:06:10', '2019-01-29', 'ccp5qf7l9p1ca0g09gj0at42thu2f2ag'),
(37, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-29', '20:06:44', 2, '20:09:31', '2019-01-29', 'e9k8skf7n0p374egu57vp1bgkjb911re'),
(38, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:06:08', 2, '12:09:48', '2019-01-30', '98v4n79hipl876gdh93li0aoe0qters6'),
(39, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:21:27', 1, NULL, NULL, 'v9qk2795n43t86sl6l2ggh8chgq0imff'),
(40, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '12:58:49', 1, NULL, NULL, 'ef7o6ct8rspo0vrm929qoi9ntb2f1otv'),
(41, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:09:35', 2, '13:10:31', '2019-01-30', '4l2cu6qusjdpgmo7cjupj7jrvakm14er'),
(42, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:30:39', 2, '13:34:29', '2019-01-30', 'nv7f4oj5ff2h4de5lgfe4s7ejfo7h5h6'),
(43, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-30', '13:40:27', 2, '13:42:14', '2019-01-30', '0sijckk5o4b8h9ovh8kcb15aspln4ncq'),
(44, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '11:34:29', 2, '11:36:42', '2019-01-31', '5gqsvkue6j4d4n7r670pla62gm6688nh'),
(45, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:03:24', 1, NULL, NULL, 'lujmtiqhmkkmfatshsafat2i3hcvh025'),
(46, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:15:18', 2, '12:16:02', '2019-01-31', 'c6loocgplhd4cgjvf625a2hrgc7r0gvr'),
(47, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:17:53', 2, '12:18:47', '2019-01-31', 's0ejvof8fh1go5on7d8oep8s43rid9r8'),
(48, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:33:32', 2, '12:35:28', '2019-01-31', 'u8hp7kdcf9dj0ph7s0vn5uoqulu3u6m2'),
(49, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:41:35', 2, '12:44:29', '2019-01-31', 'ldlskjs7tdl95v4lkedrebeu3bbfnrhd'),
(50, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:47:28', 1, NULL, NULL, 'aj1145ph1sb58rh9k9251o12rscnnb1a'),
(51, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '12:54:46', 1, NULL, NULL, 'bocqn25b1no4d1f640uobf61s1v8m966'),
(52, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '15:45:00', 1, NULL, NULL, '6glf8k6s4h8i9e6grdtl7ipi6rhdd67u'),
(53, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:10:53', 2, '16:14:52', '2019-01-31', '14qmg6kiujh9hppo6i5jbfkb8tp78dao'),
(54, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '16:30:53', 2, '16:31:54', '2019-01-31', '02fhi3e4nu436kdq0u2ojgabu950snqs'),
(55, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:14:04', 1, NULL, NULL, '0oinr8frc3ttbn1vc4iso45gh8oej6sp'),
(56, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '17:21:26', 1, NULL, NULL, '65erm0ukrbf9po79nl5sesjpqfa4ns21'),
(57, 'ven66@gmail.com', 'Vendor31', 13, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '17:33:13', 1, NULL, NULL, 'fj812r6fn6m25ru8rb5rdjvigrsub2ok'),
(58, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:12:48', 1, NULL, NULL, 'jqohu9pb5ed7fsr45k27emjkpmkcn9b7'),
(59, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '18:17:35', 1, NULL, NULL, 'cfhphmc6c61tc6h9f2p0jmr0cv8tm0b0'),
(60, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:31:18', 1, NULL, NULL, 'mlid2qqehro8qu89kmstfhg3duug8erg'),
(61, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '18:55:24', 1, NULL, NULL, 'bjbisqs3ohpntckljkqjdor2rk62d7dv'),
(62, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}', '192.168.0.4', '2019-01-31', '18:56:52', 1, NULL, NULL, '81toujucuf8gn9gclgp3da4305fvckcb'),
(63, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '19:51:33', 1, NULL, NULL, 'ncr8u222ujdcs1dit168i3snjd8l5kfm'),
(64, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-01-31', '20:03:44', 2, '20:07:07', '2019-01-31', 'cioos1228fng87sel6g7lf1p6160v8b0'),
(65, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '15:40:30', 1, NULL, NULL, '2vhu6l2q41hgst8u6k7ecu5vqdehnvd5'),
(66, 'ven121@gmail.com', 'INFOLEX METAMORF ', 4, '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}', '192.168.0.6', '2019-02-20', '15:42:09', 1, NULL, NULL, 'lh035ehr8qt5i2r4g1lk4hcajrivvsje');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_simple_bid`
--

CREATE TABLE `Ilab_master_simple_bid` (
  `Slno_simple` int(11) NOT NULL,
  `Bid_master_id_comm` int(11) NOT NULL,
  `Bid_ref_no` varchar(255) NOT NULL,
  `Bid_vendor_id` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_of_bid` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_bid_id` int(11) NOT NULL,
  `comment` text,
  `comment_by` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  `resubmission` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_simple_bid`
--

INSERT INTO `Ilab_master_simple_bid` (`Slno_simple`, `Bid_master_id_comm`, `Bid_ref_no`, `Bid_vendor_id`, `Vendor_id`, `date_entry`, `type_of_bid`, `category_id`, `type_bid_id`, `comment`, `comment_by`, `comment_date`, `resubmission`) VALUES
(1, 1, '1233	', '3', 'ven121@gmail.com', '2019-01-28 07:53:33', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(2, 2, '570	', '12', 'ven121@gmail.com', '2019-01-28 08:01:30', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(3, 2, '570	', '18', 'ven979@yahoo.com', '2019-01-28 10:25:44', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(4, 2, '570	', '17', 'ven97@gmail.com', '2019-01-28 10:30:27', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(5, 1, '1233	', '5', 'ven310@yahoo.com', '2019-01-28 10:36:16', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(6, 1, '1233	', '7', 'ven66@gmail.com', '2019-01-28 10:52:16', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(7, 1, '1233	', '8', 'ven371@yahoo.com', '2019-01-28 10:58:20', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(8, 2, '570	', '21', 'ven371@yahoo.com', '2019-01-28 11:00:47', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(9, 1, '1233	', '3', 'ven121@gmail.com', '2019-01-28 13:57:22', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(10, 2, '570	', '12', 'ven121@gmail.com', '2019-01-28 13:59:38', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(11, 3, '1112	', '25', 'ven121@gmail.com', '2019-01-28 14:46:20', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(12, 5, '234	', '48', 'ven121@gmail.com', '2019-01-28 14:49:16', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(13, 3, '1112	', '25', 'ven121@gmail.com', '2019-01-28 14:50:26', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(14, 5, '234	', '51', 'ven97@gmail.com', '2019-01-29 11:32:01', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(15, 2, '570	', '17', 'ven97@gmail.com', '2019-01-29 11:33:27', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(16, 3, '1112	', '30', 'ven97@gmail.com', '2019-01-29 11:35:01', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(17, 2, '570	', '20', 'ven66@gmail.com', '2019-01-29 11:41:46', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(18, 3, '1112	', '32', 'ven66@gmail.com', '2019-01-29 11:43:13', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(19, 1, '1233	', '7', 'ven66@gmail.com', '2019-01-29 11:44:41', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(20, 6, '2300	', '59', 'ven97@gmail.com', '2019-01-29 12:34:26', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(21, 4, '141	', '42', 'ven97@gmail.com', '2019-01-29 12:35:57', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(22, 4, '141	', '37', 'ven121@gmail.com', '2019-01-29 12:38:39', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(23, 6, '2300	', '54', 'ven121@gmail.com', '2019-01-29 12:39:57', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(24, 1, '1233	', '5', 'ven310@yahoo.com', '2019-01-29 12:42:48', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(25, 2, '570	', '14', 'ven310@yahoo.com', '2019-01-29 12:44:46', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(26, 4, '141	', '44', 'ven66@gmail.com', '2019-01-29 12:48:39', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(27, 6, '2300	', '61', 'ven66@gmail.com', '2019-01-29 12:50:28', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(28, 3, '1112	', '33', 'ven371@yahoo.com', '2019-01-29 12:53:28', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(29, 4, '141	', '45', 'ven371@yahoo.com', '2019-01-29 12:55:17', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(30, 6, '2300	', '62', 'ven371@yahoo.com', '2019-01-29 12:57:41', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(31, 3, '1112	', '31', 'ven979@yahoo.com', '2019-01-29 13:01:04', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(32, 4, '141	', '43', 'ven979@yahoo.com', '2019-01-29 13:02:01', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(33, 6, '2300	', '60', 'ven979@yahoo.com', '2019-01-29 13:03:26', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(34, 2, '570	', '18', 'ven979@yahoo.com', '2019-01-29 13:05:12', 'Simple Bid', 1, 1, NULL, NULL, NULL, 0),
(35, 4, '141	', '37', 'ven121@gmail.com', '2019-01-29 13:24:37', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(36, 4, '141	', '43', 'ven979@yahoo.com', '2019-01-29 13:29:14', 'Simple Bid', 2, 1, NULL, NULL, NULL, 0),
(37, 11, '212100	', '109', 'ven121@gmail.com', '2019-01-30 08:02:53', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(38, 12, '5670	', '122', 'ven121@gmail.com', '2019-01-30 08:03:58', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(39, 12, '5670	', '122', 'ven121@gmail.com', '2019-01-30 08:11:40', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(40, 13, '8790	', '135', 'ven121@gmail.com', '2019-01-31 06:06:09', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(41, 13, '8790	', '135', 'ven121@gmail.com', '2019-01-31 06:37:42', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(42, 14, '0078	', '148', 'ven121@gmail.com', '2019-01-31 07:04:54', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(43, 14, '0078	', '148', 'ven121@gmail.com', '2019-01-31 07:13:50', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(44, 14, '0078	', '148', 'ven121@gmail.com', '2019-01-31 07:22:24', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(45, 11, '212100	', '109', 'ven121@gmail.com', '2019-01-31 10:44:43', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(46, 11, '212100	', '117', 'ven66@gmail.com', '2019-01-31 12:08:08', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(47, 12, '5670	', '130', 'ven66@gmail.com', '2019-01-31 12:14:45', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(48, 13, '8790	', '143', 'ven66@gmail.com', '2019-01-31 12:18:27', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0),
(49, 14, '0078	', '156', 'ven66@gmail.com', '2019-01-31 12:19:46', 'Simple Bid', 3, 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_simple_bid_item`
--

CREATE TABLE `Ilab_master_simple_bid_item` (
  `Slno_simple_item` int(11) NOT NULL,
  `Simple_id_slno` int(11) NOT NULL,
  `Bid_master_id_com` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Item_id` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Uom_unit` varchar(255) NOT NULL,
  `Unit_price` varchar(255) NOT NULL,
  `Total_unitprice` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Comm_item_slno` varchar(255) NOT NULL,
  `Mr_item_slno` varchar(255) NOT NULL,
  `bid_slno` varchar(255) NOT NULL,
  `Vendor_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_simple_bid_item`
--

INSERT INTO `Ilab_master_simple_bid_item` (`Slno_simple_item`, `Simple_id_slno`, `Bid_master_id_com`, `Item_name`, `Item_id`, `Quantity`, `Uom_unit`, `Unit_price`, `Total_unitprice`, `date_entry`, `Comm_item_slno`, `Mr_item_slno`, `bid_slno`, `Vendor_id`) VALUES
(1, 1, 1, 'material item 1', 'mat001', '1', 'nos', '5500', '5500.00', '2019-01-28 07:53:33', '1', '', '3', 'ven121@gmail.com'),
(2, 1, 1, 'material item 17', 'mat0087', '1', 'nos', '3400', '3400.00', '2019-01-28 07:53:33', '2', '', '3', 'ven121@gmail.com'),
(3, 1, 1, 'material item 19', 'mat0018', '1', 'nos', '2500', '2500.00', '2019-01-28 07:53:33', '3', '', '3', 'ven121@gmail.com'),
(4, 1, 1, 'material10', '10', '1', '21', '1800', '1800.00', '2019-01-28 07:53:33', '4', '', '3', 'ven121@gmail.com'),
(5, 2, 2, 'material item 1', 'mat001', '1', 'nos', '6000', '6000.00', '2019-01-28 08:01:30', '5', '', '12', 'ven121@gmail.com'),
(6, 2, 2, 'material item 17', 'mat0087', '1', 'nos', '7500', '7500.00', '2019-01-28 08:01:30', '6', '', '12', 'ven121@gmail.com'),
(7, 2, 2, 'material item 19', 'mat0018', '1', 'nos', '5400', '5400.00', '2019-01-28 08:01:30', '7', '', '12', 'ven121@gmail.com'),
(8, 2, 2, 'material10', '10', '1', '21', '2200', '2200.00', '2019-01-28 08:01:30', '8', '', '12', 'ven121@gmail.com'),
(9, 3, 2, 'material item 1', 'mat001', '1', 'nos', '5700', '5700.00', '2019-01-28 10:25:44', '5', '', '18', 'ven979@yahoo.com'),
(10, 3, 2, 'material item 17', 'mat0087', '1', 'nos', '700', '700.00', '2019-01-28 10:25:44', '6', '', '18', 'ven979@yahoo.com'),
(11, 3, 2, 'material item 19', 'mat0018', '1', 'nos', '5500', '5500.00', '2019-01-28 10:25:44', '7', '', '18', 'ven979@yahoo.com'),
(12, 3, 2, 'material10', '10', '1', '21', '4000', '4000.00', '2019-01-28 10:25:44', '8', '', '18', 'ven979@yahoo.com'),
(13, 4, 2, 'material item 1', 'mat001', '1', 'nos', '5600', '5600.00', '2019-01-28 10:30:27', '5', '', '17', 'ven97@gmail.com'),
(14, 4, 2, 'material item 17', 'mat0087', '1', 'nos', '4500', '4500.00', '2019-01-28 10:30:27', '6', '', '17', 'ven97@gmail.com'),
(15, 4, 2, 'material item 19', 'mat0018', '1', 'nos', '3100', '3100.00', '2019-01-28 10:30:27', '7', '', '17', 'ven97@gmail.com'),
(16, 4, 2, 'material10', '10', '1', '21', '3000', '3000.00', '2019-01-28 10:30:27', '8', '', '17', 'ven97@gmail.com'),
(17, 5, 1, 'material item 1', 'mat001', '1', 'nos', '4500', '4500.00', '2019-01-28 10:36:16', '1', '', '5', 'ven310@yahoo.com'),
(18, 5, 1, 'material item 17', 'mat0087', '1', 'nos', '6000', '6000.00', '2019-01-28 10:36:16', '2', '', '5', 'ven310@yahoo.com'),
(19, 5, 1, 'material item 19', 'mat0018', '1', 'nos', '3400', '3400.00', '2019-01-28 10:36:16', '3', '', '5', 'ven310@yahoo.com'),
(20, 5, 1, 'material10', '10', '1', '21', '2200', '2200.00', '2019-01-28 10:36:16', '4', '', '5', 'ven310@yahoo.com'),
(21, 6, 1, 'material item 1', 'mat001', '1', 'nos', '4500', '4500.00', '2019-01-28 10:52:16', '1', '', '7', 'ven66@gmail.com'),
(22, 6, 1, 'material item 17', 'mat0087', '1', 'nos', '2300', '2300.00', '2019-01-28 10:52:16', '2', '', '7', 'ven66@gmail.com'),
(23, 6, 1, 'material item 19', 'mat0018', '1', 'nos', '2100', '2100.00', '2019-01-28 10:52:16', '3', '', '7', 'ven66@gmail.com'),
(24, 6, 1, 'material10', '10', '1', '21', '4000', '4000.00', '2019-01-28 10:52:16', '4', '', '7', 'ven66@gmail.com'),
(25, 7, 1, 'material item 1', 'mat001', '1', 'nos', '4400', '4400.00', '2019-01-28 10:58:20', '1', '', '8', 'ven371@yahoo.com'),
(26, 7, 1, 'material item 17', 'mat0087', '1', 'nos', '2100', '2100.00', '2019-01-28 10:58:20', '2', '', '8', 'ven371@yahoo.com'),
(27, 7, 1, 'material item 19', 'mat0018', '1', 'nos', '1000', '1000.00', '2019-01-28 10:58:20', '3', '', '8', 'ven371@yahoo.com'),
(28, 7, 1, 'material10', '10', '1', '21', '1400', '1400.00', '2019-01-28 10:58:20', '4', '', '8', 'ven371@yahoo.com'),
(29, 8, 2, 'material item 1', 'mat001', '1', 'nos', '5500', '5500.00', '2019-01-28 11:00:47', '5', '', '21', 'ven371@yahoo.com'),
(30, 8, 2, 'material item 17', 'mat0087', '1', 'nos', '2100', '2100.00', '2019-01-28 11:00:47', '6', '', '21', 'ven371@yahoo.com'),
(31, 8, 2, 'material item 19', 'mat0018', '1', 'nos', '6700', '6700.00', '2019-01-28 11:00:47', '7', '', '21', 'ven371@yahoo.com'),
(32, 8, 2, 'material10', '10', '1', '21', '880', '880.00', '2019-01-28 11:00:47', '8', '', '21', 'ven371@yahoo.com'),
(33, 9, 1, 'material item 1', 'mat001', '1', 'nos', '4500', '4500.00', '2019-01-28 13:57:22', '1', '', '3', 'ven121@gmail.com'),
(34, 9, 1, 'material item 17', 'mat0087', '1', 'nos', '4000', '4000.00', '2019-01-28 13:57:22', '2', '', '3', 'ven121@gmail.com'),
(35, 9, 1, 'material item 19', 'mat0018', '1', 'nos', '5600', '5600.00', '2019-01-28 13:57:22', '3', '', '3', 'ven121@gmail.com'),
(36, 9, 1, 'material10', '10', '1', '21', '2100', '2100.00', '2019-01-28 13:57:22', '4', '', '3', 'ven121@gmail.com'),
(37, 10, 2, 'material item 1', 'mat001', '1', 'nos', '5500', '5500.00', '2019-01-28 13:59:38', '5', '', '12', 'ven121@gmail.com'),
(38, 10, 2, 'material item 17', 'mat0087', '1', 'nos', '3400', '3400.00', '2019-01-28 13:59:38', '6', '', '12', 'ven121@gmail.com'),
(39, 10, 2, 'material item 19', 'mat0018', '1', 'nos', '2200', '2200.00', '2019-01-28 13:59:38', '7', '', '12', 'ven121@gmail.com'),
(40, 10, 2, 'material10', '10', '1', '21', '800', '800.00', '2019-01-28 13:59:38', '8', '', '12', 'ven121@gmail.com'),
(41, 11, 3, 'material item 22', 'mat00910', '1', 'nos', '564', '564.00', '2019-01-28 14:46:20', '9', '', '25', 'ven121@gmail.com'),
(42, 11, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '565', '565.00', '2019-01-28 14:46:20', '10', '', '25', 'ven121@gmail.com'),
(43, 11, 3, 'Pump', 'Mat001', '1', 'Horse Power', '564', '564.00', '2019-01-28 14:46:20', '11', '', '25', 'ven121@gmail.com'),
(44, 13, 3, 'material item 22', 'mat00910', '1', 'nos', '5400', '5400.00', '2019-01-28 14:50:26', '9', '', '25', 'ven121@gmail.com'),
(45, 13, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '2100', '2100.00', '2019-01-28 14:50:26', '10', '', '25', 'ven121@gmail.com'),
(46, 13, 3, 'Pump', 'Mat001', '1', 'Horse Power', '3300', '3300.00', '2019-01-28 14:50:27', '11', '', '25', 'ven121@gmail.com'),
(47, 15, 2, 'material item 1', 'mat001', '1', 'nos', '4500', '4500.00', '2019-01-29 11:33:27', '5', '', '17', 'ven97@gmail.com'),
(48, 15, 2, 'material item 17', 'mat0087', '1', 'nos', '3000', '3000.00', '2019-01-29 11:33:27', '6', '', '17', 'ven97@gmail.com'),
(49, 15, 2, 'material item 19', 'mat0018', '1', 'nos', '2200', '2200.00', '2019-01-29 11:33:27', '7', '', '17', 'ven97@gmail.com'),
(50, 15, 2, 'material10', '10', '1', '21', '1200', '1200.00', '2019-01-29 11:33:27', '8', '', '17', 'ven97@gmail.com'),
(51, 16, 3, 'material item 22', 'mat00910', '1', 'nos', '3200', '3200.00', '2019-01-29 11:35:01', '9', '', '30', 'ven97@gmail.com'),
(52, 16, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '2100', '2100.00', '2019-01-29 11:35:01', '10', '', '30', 'ven97@gmail.com'),
(53, 16, 3, 'Pump', 'Mat001', '1', 'Horse Power', '5500', '5500.00', '2019-01-29 11:35:01', '11', '', '30', 'ven97@gmail.com'),
(54, 17, 2, 'material item 1', 'mat001', '1', 'nos', '4300', '4300.00', '2019-01-29 11:41:46', '5', '', '20', 'ven66@gmail.com'),
(55, 17, 2, 'material item 17', 'mat0087', '1', 'nos', '3000', '3000.00', '2019-01-29 11:41:46', '6', '', '20', 'ven66@gmail.com'),
(56, 17, 2, 'material item 19', 'mat0018', '1', 'nos', '2200', '2200.00', '2019-01-29 11:41:46', '7', '', '20', 'ven66@gmail.com'),
(57, 17, 2, 'material10', '10', '1', '21', '1500', '1500.00', '2019-01-29 11:41:46', '8', '', '20', 'ven66@gmail.com'),
(58, 18, 3, 'material item 22', 'mat00910', '1', 'nos', '3400', '3400.00', '2019-01-29 11:43:13', '9', '', '32', 'ven66@gmail.com'),
(59, 18, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '2100', '2100.00', '2019-01-29 11:43:13', '10', '', '32', 'ven66@gmail.com'),
(60, 18, 3, 'Pump', 'Mat001', '1', 'Horse Power', '4300', '4300.00', '2019-01-29 11:43:13', '11', '', '32', 'ven66@gmail.com'),
(61, 19, 1, 'material item 1', 'mat001', '1', 'nos', '5000', '5000.00', '2019-01-29 11:44:41', '1', '', '7', 'ven66@gmail.com'),
(62, 19, 1, 'material item 17', 'mat0087', '1', 'nos', '3500', '3500.00', '2019-01-29 11:44:41', '2', '', '7', 'ven66@gmail.com'),
(63, 19, 1, 'material item 19', 'mat0018', '1', 'nos', '2000', '2000.00', '2019-01-29 11:44:41', '3', '', '7', 'ven66@gmail.com'),
(64, 19, 1, 'material10', '10', '1', '21', '1500', '1500.00', '2019-01-29 11:44:41', '4', '', '7', 'ven66@gmail.com'),
(65, 20, 6, 'material item 22', 'mat00910', '1', 'nos', '2100', '2100.00', '2019-01-29 12:34:26', '14', '', '59', 'ven97@gmail.com'),
(66, 20, 6, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '3300', '3300.00', '2019-01-29 12:34:26', '15', '', '59', 'ven97@gmail.com'),
(67, 20, 6, 'Pump', 'Mat001', '1', 'Horse Power', '4500', '4500.00', '2019-01-29 12:34:26', '16', '', '59', 'ven97@gmail.com'),
(68, 20, 6, 'Rotary lobe pump', 'Mat002', '1', 'Max Pump volume', '2300', '2300.00', '2019-01-29 12:34:26', '17', '', '59', 'ven97@gmail.com'),
(69, 21, 4, 'material item 22', 'mat00910', '1', 'nos', '2200', '2200.00', '2019-01-29 12:35:57', '12', '', '42', 'ven97@gmail.com'),
(70, 21, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '3450', '3450.00', '2019-01-29 12:35:57', '13', '', '42', 'ven97@gmail.com'),
(71, 22, 4, 'material item 22', 'mat00910', '1', 'nos', '5000', '5000.00', '2019-01-29 12:38:39', '12', '', '37', 'ven121@gmail.com'),
(72, 22, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4500', '4500.00', '2019-01-29 12:38:39', '13', '', '37', 'ven121@gmail.com'),
(73, 23, 6, 'material item 22', 'mat00910', '1', 'nos', '6000', '6000.00', '2019-01-29 12:39:57', '14', '', '54', 'ven121@gmail.com'),
(74, 23, 6, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '5600', '5600.00', '2019-01-29 12:39:57', '15', '', '54', 'ven121@gmail.com'),
(75, 23, 6, 'Pump', 'Mat001', '1', 'Horse Power', '4500', '4500.00', '2019-01-29 12:39:57', '16', '', '54', 'ven121@gmail.com'),
(76, 23, 6, 'Rotary lobe pump', 'Mat002', '1', 'Max Pump volume', '2800', '2800.00', '2019-01-29 12:39:57', '17', '', '54', 'ven121@gmail.com'),
(77, 24, 1, 'material item 1', 'mat001', '1', 'nos', '3450', '3450.00', '2019-01-29 12:42:48', '1', '', '5', 'ven310@yahoo.com'),
(78, 24, 1, 'material item 17', 'mat0087', '1', 'nos', '5600', '5600.00', '2019-01-29 12:42:48', '2', '', '5', 'ven310@yahoo.com'),
(79, 24, 1, 'material item 19', 'mat0018', '1', 'nos', '2340', '2340.00', '2019-01-29 12:42:48', '3', '', '5', 'ven310@yahoo.com'),
(80, 24, 1, 'material10', '10', '1', '21', '5000', '5000.00', '2019-01-29 12:42:48', '4', '', '5', 'ven310@yahoo.com'),
(81, 25, 2, 'material item 1', 'mat001', '1', 'nos', '2500', '2500.00', '2019-01-29 12:44:46', '5', '', '14', 'ven310@yahoo.com'),
(82, 25, 2, 'material item 17', 'mat0087', '1', 'nos', '6000', '6000.00', '2019-01-29 12:44:47', '6', '', '14', 'ven310@yahoo.com'),
(83, 25, 2, 'material item 19', 'mat0018', '1', 'nos', '5500', '5500.00', '2019-01-29 12:44:47', '7', '', '14', 'ven310@yahoo.com'),
(84, 25, 2, 'material10', '10', '1', '21', '3200', '3200.00', '2019-01-29 12:44:47', '8', '', '14', 'ven310@yahoo.com'),
(85, 26, 4, 'material item 22', 'mat00910', '1', 'nos', '4400', '4400.00', '2019-01-29 12:48:39', '12', '', '44', 'ven66@gmail.com'),
(86, 26, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '3500', '3500.00', '2019-01-29 12:48:39', '13', '', '44', 'ven66@gmail.com'),
(87, 27, 6, 'material item 22', 'mat00910', '1', 'nos', '5700', '5700.00', '2019-01-29 12:50:28', '14', '', '61', 'ven66@gmail.com'),
(88, 27, 6, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '3500', '3500.00', '2019-01-29 12:50:28', '15', '', '61', 'ven66@gmail.com'),
(89, 27, 6, 'Pump', 'Mat001', '1', 'Horse Power', '4400', '4400.00', '2019-01-29 12:50:28', '16', '', '61', 'ven66@gmail.com'),
(90, 27, 6, 'Rotary lobe pump', 'Mat002', '1', 'Max Pump volume', '2310', '2310.00', '2019-01-29 12:50:28', '17', '', '61', 'ven66@gmail.com'),
(91, 28, 3, 'material item 22', 'mat00910', '1', 'nos', '4500', '4500.00', '2019-01-29 12:53:28', '9', '', '33', 'ven371@yahoo.com'),
(92, 28, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '3100', '3100.00', '2019-01-29 12:53:28', '10', '', '33', 'ven371@yahoo.com'),
(93, 28, 3, 'Pump', 'Mat001', '1', 'Horse Power', '2000', '2000.00', '2019-01-29 12:53:28', '11', '', '33', 'ven371@yahoo.com'),
(94, 29, 4, 'material item 22', 'mat00910', '1', 'nos', '3500', '3500.00', '2019-01-29 12:55:18', '12', '', '45', 'ven371@yahoo.com'),
(95, 29, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4400', '4400.00', '2019-01-29 12:55:18', '13', '', '45', 'ven371@yahoo.com'),
(96, 30, 6, 'material item 22', 'mat00910', '1', 'nos', '5500', '5500.00', '2019-01-29 12:57:41', '14', '', '62', 'ven371@yahoo.com'),
(97, 30, 6, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4500', '4500.00', '2019-01-29 12:57:41', '15', '', '62', 'ven371@yahoo.com'),
(98, 30, 6, 'Pump', 'Mat001', '1', 'Horse Power', '3450', '3450.00', '2019-01-29 12:57:41', '16', '', '62', 'ven371@yahoo.com'),
(99, 30, 6, 'Rotary lobe pump', 'Mat002', '1', 'Max Pump volume', '2100', '2100.00', '2019-01-29 12:57:41', '17', '', '62', 'ven371@yahoo.com'),
(100, 31, 3, 'material item 22', 'mat00910', '1', 'nos', '4000', '4000.00', '2019-01-29 13:01:04', '9', '', '31', 'ven979@yahoo.com'),
(101, 31, 3, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '5000', '5000.00', '2019-01-29 13:01:04', '10', '', '31', 'ven979@yahoo.com'),
(102, 31, 3, 'Pump', 'Mat001', '1', 'Horse Power', '3000', '3000.00', '2019-01-29 13:01:04', '11', '', '31', 'ven979@yahoo.com'),
(103, 32, 4, 'material item 22', 'mat00910', '1', 'nos', '5500', '5500.00', '2019-01-29 13:02:01', '12', '', '43', 'ven979@yahoo.com'),
(104, 32, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4500', '4500.00', '2019-01-29 13:02:01', '13', '', '43', 'ven979@yahoo.com'),
(105, 33, 6, 'material item 22', 'mat00910', '1', 'nos', '5000', '5000.00', '2019-01-29 13:03:26', '14', '', '60', 'ven979@yahoo.com'),
(106, 33, 6, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4500', '4500.00', '2019-01-29 13:03:26', '15', '', '60', 'ven979@yahoo.com'),
(107, 33, 6, 'Pump', 'Mat001', '1', 'Horse Power', '3500', '3500.00', '2019-01-29 13:03:26', '16', '', '60', 'ven979@yahoo.com'),
(108, 33, 6, 'Rotary lobe pump', 'Mat002', '1', 'Max Pump volume', '2200', '2200.00', '2019-01-29 13:03:26', '17', '', '60', 'ven979@yahoo.com'),
(109, 34, 2, 'material item 1', 'mat001', '1', 'nos', '3300', '3300.00', '2019-01-29 13:05:12', '5', '', '18', 'ven979@yahoo.com'),
(110, 34, 2, 'material item 17', 'mat0087', '1', 'nos', '2100', '2100.00', '2019-01-29 13:05:12', '6', '', '18', 'ven979@yahoo.com'),
(111, 34, 2, 'material item 19', 'mat0018', '1', 'nos', '3200', '3200.00', '2019-01-29 13:05:12', '7', '', '18', 'ven979@yahoo.com'),
(112, 34, 2, 'material10', '10', '1', '21', '2350', '2350.00', '2019-01-29 13:05:12', '8', '', '18', 'ven979@yahoo.com'),
(113, 35, 4, 'material item 22', 'mat00910', '1', 'nos', '970', '970.00', '2019-01-29 13:24:37', '12', '', '37', 'ven121@gmail.com'),
(114, 35, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '880', '880.00', '2019-01-29 13:24:37', '13', '', '37', 'ven121@gmail.com'),
(115, 36, 4, 'material item 22', 'mat00910', '1', 'nos', '5600', '5600.00', '2019-01-29 13:29:14', '12', '', '43', 'ven979@yahoo.com'),
(116, 36, 4, 'Progressing cavity pump.', 'Mat003', '1', 'Capacity', '4400', '4400.00', '2019-01-29 13:29:14', '13', '', '43', 'ven979@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_simple_bid_item_misc`
--

CREATE TABLE `Ilab_master_simple_bid_item_misc` (
  `Slno_simple_misc` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `simple_id_slno_misc` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_simple_bid_item_misc`
--

INSERT INTO `Ilab_master_simple_bid_item_misc` (`Slno_simple_misc`, `master_bid_id_com`, `simple_id_slno_misc`, `field_name`, `field_value`, `date_entry`, `Bid_slno`, `Vendor_id`) VALUES
(1, 1, 1, 'delivery basis', 'after order', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(2, 1, 1, 'gaurantee warranty', '1 yr', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(3, 1, 1, 'delivery schedule', 'two weeks', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(4, 1, 1, 'payment terms', 'as discussed', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(5, 1, 1, 'validity of offer', '6 months', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(6, 1, 1, 'security BG', 'check out', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(7, 1, 1, 'liquidity damage', 'abcd', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(8, 1, 1, 'remarks', 'zzzy', '2019-01-28 07:53:33', '3', 'ven121@gmail.com'),
(9, 2, 2, 'delivery basis', 'abcd', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(10, 2, 2, 'gaurantee warranty', '2 yr', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(11, 2, 2, 'delivery schedule', '13 weeks', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(12, 2, 2, 'payment terms', 'as discussed', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(13, 2, 2, 'validity of offer', 'till 3 yrs', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(14, 2, 2, 'security BG', 'as mentioned', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(15, 2, 2, 'liquidity damage', '3300', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(16, 2, 2, 'remarks', 'recheck\r\n', '2019-01-28 08:01:30', '12', 'ven121@gmail.com'),
(17, 2, 3, 'delivery basis', 'gggg', '2019-01-28 10:25:44', '18', 'ven979@yahoo.com'),
(18, 2, 3, 'gaurantee warranty', 'aaaa', '2019-01-28 10:25:44', '18', 'ven979@yahoo.com'),
(19, 2, 3, 'delivery schedule', 'abcd', '2019-01-28 10:25:44', '18', 'ven979@yahoo.com'),
(20, 2, 3, 'payment terms', 'xsxxtt', '2019-01-28 10:25:45', '18', 'ven979@yahoo.com'),
(21, 2, 3, 'validity of offer', '5 yrs', '2019-01-28 10:25:45', '18', 'ven979@yahoo.com'),
(22, 2, 3, 'security BG', 'check out', '2019-01-28 10:25:45', '18', 'ven979@yahoo.com'),
(23, 2, 3, 'liquidity damage', '7 yrs', '2019-01-28 10:25:45', '18', 'ven979@yahoo.com'),
(24, 2, 3, 'remarks', 'acca', '2019-01-28 10:25:45', '18', 'ven979@yahoo.com'),
(25, 2, 4, 'delivery basis', '4 yrs', '2019-01-28 10:30:27', '17', 'ven97@gmail.com'),
(26, 2, 4, 'gaurantee warranty', '2 weeks', '2019-01-28 10:30:27', '17', 'ven97@gmail.com'),
(27, 2, 4, 'delivery schedule', ' 6 mnths', '2019-01-28 10:30:27', '17', 'ven97@gmail.com'),
(28, 2, 4, 'payment terms', 'as discussed', '2019-01-28 10:30:27', '17', 'ven97@gmail.com'),
(29, 2, 4, 'validity of offer', '2 mnths', '2019-01-28 10:30:27', '17', 'ven97@gmail.com'),
(30, 2, 4, 'security BG', 'check out', '2019-01-28 10:30:28', '17', 'ven97@gmail.com'),
(31, 2, 4, 'liquidity damage', '5 yrs', '2019-01-28 10:30:28', '17', 'ven97@gmail.com'),
(32, 2, 4, 'remarks', 'dcba', '2019-01-28 10:30:28', '17', 'ven97@gmail.com'),
(33, 1, 5, 'delivery basis', '4 weeks', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(34, 1, 5, 'gaurantee warranty', '2 yrs', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(35, 1, 5, 'delivery schedule', 'check out', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(36, 1, 5, 'payment terms', 'as discussed', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(37, 1, 5, 'validity of offer', '3 yrs', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(38, 1, 5, 'security BG', 'check out', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(39, 1, 5, 'liquidity damage', 'xxtty', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(40, 1, 5, 'remarks', 'ctctc', '2019-01-28 10:36:16', '5', 'ven310@yahoo.com'),
(41, 1, 6, 'delivery basis', '7 weeks', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(42, 1, 6, 'gaurantee warranty', '1 yr', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(43, 1, 6, 'delivery schedule', '4 weeks', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(44, 1, 6, 'payment terms', 'as discussed', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(45, 1, 6, 'validity of offer', '6 months', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(46, 1, 6, 'security BG', 'check out', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(47, 1, 6, 'liquidity damage', 'ttyy', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(48, 1, 6, 'remarks', 'okay', '2019-01-28 10:52:16', '7', 'ven66@gmail.com'),
(49, 1, 7, 'delivery basis', '7 weeks', '2019-01-28 10:58:20', '8', 'ven371@yahoo.com'),
(50, 1, 7, 'gaurantee warranty', '7 yrs', '2019-01-28 10:58:20', '8', 'ven371@yahoo.com'),
(51, 1, 7, 'delivery schedule', '8 mnths', '2019-01-28 10:58:20', '8', 'ven371@yahoo.com'),
(52, 1, 7, 'payment terms', 'as discussed', '2019-01-28 10:58:20', '8', 'ven371@yahoo.com'),
(53, 1, 7, 'validity of offer', '6 months', '2019-01-28 10:58:21', '8', 'ven371@yahoo.com'),
(54, 1, 7, 'security BG', 'ttxx', '2019-01-28 10:58:21', '8', 'ven371@yahoo.com'),
(55, 1, 7, 'liquidity damage', '8700', '2019-01-28 10:58:21', '8', 'ven371@yahoo.com'),
(56, 1, 7, 'remarks', 'check', '2019-01-28 10:58:21', '8', 'ven371@yahoo.com'),
(57, 2, 8, 'delivery basis', '4 weeks', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(58, 2, 8, 'gaurantee warranty', '5 yrs', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(59, 2, 8, 'delivery schedule', '10 mnths', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(60, 2, 8, 'payment terms', 'as discussed', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(61, 2, 8, 'validity of offer', '4 mths', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(62, 2, 8, 'security BG', 'check out', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(63, 2, 8, 'liquidity damage', '400', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(64, 2, 8, 'remarks', 'okay', '2019-01-28 11:00:47', '21', 'ven371@yahoo.com'),
(65, 1, 9, 'delivery basis', '4 weeks', '2019-01-28 13:57:22', '3', 'ven121@gmail.com'),
(66, 1, 9, 'gaurantee warranty', '1 yr', '2019-01-28 13:57:22', '3', 'ven121@gmail.com'),
(67, 1, 9, 'delivery schedule', 'everyday', '2019-01-28 13:57:22', '3', 'ven121@gmail.com'),
(68, 1, 9, 'payment terms', 'as discussed', '2019-01-28 13:57:22', '3', 'ven121@gmail.com'),
(69, 1, 9, 'validity of offer', '6 months', '2019-01-28 13:57:23', '3', 'ven121@gmail.com'),
(70, 1, 9, 'security BG', 'check out', '2019-01-28 13:57:23', '3', 'ven121@gmail.com'),
(71, 1, 9, 'liquidity damage', '500', '2019-01-28 13:57:23', '3', 'ven121@gmail.com'),
(72, 1, 9, 'remarks', 'okay', '2019-01-28 13:57:23', '3', 'ven121@gmail.com'),
(73, 2, 10, 'delivery basis', '7 weeks', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(74, 2, 10, 'gaurantee warranty', '2 yrs', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(75, 2, 10, 'delivery schedule', 'two weeks', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(76, 2, 10, 'payment terms', 'as discussed', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(77, 2, 10, 'validity of offer', '6 months', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(78, 2, 10, 'security BG', 'check out', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(79, 2, 10, 'liquidity damage', '500', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(80, 2, 10, 'remarks', 'okay', '2019-01-28 13:59:38', '12', 'ven121@gmail.com'),
(81, 3, 11, 'delivery basis', '4 weeks', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(82, 3, 11, 'gaurantee warranty', '1 yr', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(83, 3, 11, 'delivery schedule', 'two weeks', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(84, 3, 11, 'payment terms', 'as discussed', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(85, 3, 11, 'validity of offer', '6 months', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(86, 3, 11, 'security BG', 'check out', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(87, 3, 11, 'liquidity damage', '500', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(88, 3, 11, 'remarks', 'OKAY', '2019-01-28 14:46:20', '25', 'ven121@gmail.com'),
(89, 5, 12, 'delivery basis', 'fixed price please no negration', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(90, 5, 12, 'gaurantee warranty', 'user guarantee', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(91, 5, 12, 'delivery schedule', 'deliver system', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(92, 5, 12, 'payment terms', 'fixed pric', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(93, 5, 12, 'validity of offer', 'ww', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(94, 5, 12, 'security BG', '2323', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(95, 5, 12, 'liquidity damage', 'wewe', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(96, 5, 12, 'remarks', 'wwwee eqw qw', '2019-01-28 14:49:16', '48', 'ven121@gmail.com'),
(97, 3, 13, 'delivery basis', '7 weeks', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(98, 3, 13, 'gaurantee warranty', '2 yrs', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(99, 3, 13, 'delivery schedule', 'two weeks', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(100, 3, 13, 'payment terms', 'as discussed', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(101, 3, 13, 'validity of offer', '6 months', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(102, 3, 13, 'security BG', 'check out', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(103, 3, 13, 'liquidity damage', '500', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(104, 3, 13, 'remarks', 'okay', '2019-01-28 14:50:27', '25', 'ven121@gmail.com'),
(105, 5, 14, 'delivery basis', '4 weeks', '2019-01-29 11:32:01', '51', 'ven97@gmail.com'),
(106, 5, 14, 'gaurantee warranty', '2 yrs', '2019-01-29 11:32:01', '51', 'ven97@gmail.com'),
(107, 5, 14, 'delivery schedule', 'two weeks', '2019-01-29 11:32:01', '51', 'ven97@gmail.com'),
(108, 5, 14, 'payment terms', 'as discussed', '2019-01-29 11:32:01', '51', 'ven97@gmail.com'),
(109, 5, 14, 'validity of offer', '6 months', '2019-01-29 11:32:02', '51', 'ven97@gmail.com'),
(110, 5, 14, 'security BG', 'check out', '2019-01-29 11:32:02', '51', 'ven97@gmail.com'),
(111, 5, 14, 'liquidity damage', '500', '2019-01-29 11:32:02', '51', 'ven97@gmail.com'),
(112, 5, 14, 'remarks', 'okay', '2019-01-29 11:32:02', '51', 'ven97@gmail.com'),
(113, 2, 15, 'delivery basis', '7 weeks', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(114, 2, 15, 'gaurantee warranty', '1 yr', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(115, 2, 15, 'delivery schedule', 'two weeks', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(116, 2, 15, 'payment terms', 'as discussed', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(117, 2, 15, 'validity of offer', '6 months', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(118, 2, 15, 'security BG', 'check out', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(119, 2, 15, 'liquidity damage', '500', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(120, 2, 15, 'remarks', 'okay', '2019-01-29 11:33:27', '17', 'ven97@gmail.com'),
(121, 3, 16, 'delivery basis', '7 weeks', '2019-01-29 11:35:01', '30', 'ven97@gmail.com'),
(122, 3, 16, 'gaurantee warranty', '2 yrs', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(123, 3, 16, 'delivery schedule', 'four weeks', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(124, 3, 16, 'payment terms', 'as discussed', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(125, 3, 16, 'validity of offer', '8 months', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(126, 3, 16, 'security BG', 'check out', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(127, 3, 16, 'liquidity damage', '400', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(128, 3, 16, 'remarks', 'okay', '2019-01-29 11:35:02', '30', 'ven97@gmail.com'),
(129, 2, 17, 'delivery basis', '5 weeks', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(130, 2, 17, 'gaurantee warranty', '2 yrs', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(131, 2, 17, 'delivery schedule', 'one week', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(132, 2, 17, 'payment terms', 'as discussed', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(133, 2, 17, 'validity of offer', '6 months', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(134, 2, 17, 'security BG', 'check out', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(135, 2, 17, 'liquidity damage', '400', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(136, 2, 17, 'remarks', 'okay', '2019-01-29 11:41:46', '20', 'ven66@gmail.com'),
(137, 3, 18, 'delivery basis', '7 weeks', '2019-01-29 11:43:13', '32', 'ven66@gmail.com'),
(138, 3, 18, 'gaurantee warranty', '1 yr', '2019-01-29 11:43:13', '32', 'ven66@gmail.com'),
(139, 3, 18, 'delivery schedule', 'two weeks', '2019-01-29 11:43:13', '32', 'ven66@gmail.com'),
(140, 3, 18, 'payment terms', 'as discussed', '2019-01-29 11:43:13', '32', 'ven66@gmail.com'),
(141, 3, 18, 'validity of offer', '8 months', '2019-01-29 11:43:13', '32', 'ven66@gmail.com'),
(142, 3, 18, 'security BG', 'check out', '2019-01-29 11:43:13', '32', 'ven66@gmail.com'),
(143, 3, 18, 'liquidity damage', '300', '2019-01-29 11:43:14', '32', 'ven66@gmail.com'),
(144, 3, 18, 'remarks', 'okay', '2019-01-29 11:43:14', '32', 'ven66@gmail.com'),
(145, 1, 19, 'delivery basis', '8 weeks', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(146, 1, 19, 'gaurantee warranty', '2 yrs', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(147, 1, 19, 'delivery schedule', 'three weeks', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(148, 1, 19, 'payment terms', 'as discussed', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(149, 1, 19, 'validity of offer', '6 months', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(150, 1, 19, 'security BG', 'check out', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(151, 1, 19, 'liquidity damage', '300', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(152, 1, 19, 'remarks', 'okay', '2019-01-29 11:44:41', '7', 'ven66@gmail.com'),
(153, 6, 20, 'delivery basis', '7 weeks', '2019-01-29 12:34:26', '59', 'ven97@gmail.com'),
(154, 6, 20, 'gaurantee warranty', '1 yr', '2019-01-29 12:34:26', '59', 'ven97@gmail.com'),
(155, 6, 20, 'delivery schedule', 'two weeks', '2019-01-29 12:34:26', '59', 'ven97@gmail.com'),
(156, 6, 20, 'payment terms', 'as discussed', '2019-01-29 12:34:26', '59', 'ven97@gmail.com'),
(157, 6, 20, 'validity of offer', '8 months', '2019-01-29 12:34:26', '59', 'ven97@gmail.com'),
(158, 6, 20, 'security BG', 'check out', '2019-01-29 12:34:27', '59', 'ven97@gmail.com'),
(159, 6, 20, 'liquidity damage', '800', '2019-01-29 12:34:27', '59', 'ven97@gmail.com'),
(160, 6, 20, 'remarks', 'okay', '2019-01-29 12:34:27', '59', 'ven97@gmail.com'),
(161, 4, 21, 'delivery basis', '5 weeks', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(162, 4, 21, 'gaurantee warranty', '1.5 yrs', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(163, 4, 21, 'delivery schedule', '4 weeks', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(164, 4, 21, 'payment terms', 'as discussed', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(165, 4, 21, 'validity of offer', '7 months', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(166, 4, 21, 'security BG', 'check out', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(167, 4, 21, 'liquidity damage', '300', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(168, 4, 21, 'remarks', 'okay', '2019-01-29 12:35:58', '42', 'ven97@gmail.com'),
(169, 4, 22, 'delivery basis', '9 weeks', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(170, 4, 22, 'gaurantee warranty', '1 yr', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(171, 4, 22, 'delivery schedule', 'two weeks', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(172, 4, 22, 'payment terms', 'as discussed', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(173, 4, 22, 'validity of offer', '7 weeks', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(174, 4, 22, 'security BG', 'check out', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(175, 4, 22, 'liquidity damage', '450', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(176, 4, 22, 'remarks', 'okay', '2019-01-29 12:38:39', '37', 'ven121@gmail.com'),
(177, 6, 23, 'delivery basis', '4 weeks', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(178, 6, 23, 'gaurantee warranty', '2 yrs', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(179, 6, 23, 'delivery schedule', '4 weeks', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(180, 6, 23, 'payment terms', 'as discussed', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(181, 6, 23, 'validity of offer', '8 months', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(182, 6, 23, 'security BG', 'check out', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(183, 6, 23, 'liquidity damage', '440', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(184, 6, 23, 'remarks', 'okay', '2019-01-29 12:39:57', '54', 'ven121@gmail.com'),
(185, 1, 24, 'delivery basis', '7 weeks', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(186, 1, 24, 'gaurantee warranty', '1 yr', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(187, 1, 24, 'delivery schedule', '4 weeks', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(188, 1, 24, 'payment terms', 'as discussed', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(189, 1, 24, 'validity of offer', '8 months', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(190, 1, 24, 'security BG', 'check out', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(191, 1, 24, 'liquidity damage', '500', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(192, 1, 24, 'remarks', 'okay', '2019-01-29 12:42:48', '5', 'ven310@yahoo.com'),
(193, 2, 25, 'delivery basis', '3 weeks', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(194, 2, 25, 'gaurantee warranty', '1 yr', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(195, 2, 25, 'delivery schedule', 'two weeks', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(196, 2, 25, 'payment terms', 'as discussed', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(197, 2, 25, 'validity of offer', '8 months', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(198, 2, 25, 'security BG', 'check out', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(199, 2, 25, 'liquidity damage', '300', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(200, 2, 25, 'remarks', 'okay', '2019-01-29 12:44:47', '14', 'ven310@yahoo.com'),
(201, 4, 26, 'delivery basis', '6 weeks', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(202, 4, 26, 'gaurantee warranty', '2 yrs', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(203, 4, 26, 'delivery schedule', '5 weeks', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(204, 4, 26, 'payment terms', 'as discussed', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(205, 4, 26, 'validity of offer', '7 months', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(206, 4, 26, 'security BG', 'check out', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(207, 4, 26, 'liquidity damage', '300', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(208, 4, 26, 'remarks', 'okay', '2019-01-29 12:48:39', '44', 'ven66@gmail.com'),
(209, 6, 27, 'delivery basis', '5 weeks', '2019-01-29 12:50:28', '61', 'ven66@gmail.com'),
(210, 6, 27, 'gaurantee warranty', '2 yrs', '2019-01-29 12:50:28', '61', 'ven66@gmail.com'),
(211, 6, 27, 'delivery schedule', '4 weeks', '2019-01-29 12:50:28', '61', 'ven66@gmail.com'),
(212, 6, 27, 'payment terms', 'as discussed', '2019-01-29 12:50:29', '61', 'ven66@gmail.com'),
(213, 6, 27, 'validity of offer', '8 months', '2019-01-29 12:50:29', '61', 'ven66@gmail.com'),
(214, 6, 27, 'security BG', 'check out', '2019-01-29 12:50:29', '61', 'ven66@gmail.com'),
(215, 6, 27, 'liquidity damage', '300', '2019-01-29 12:50:29', '61', 'ven66@gmail.com'),
(216, 6, 27, 'remarks', 'okay', '2019-01-29 12:50:29', '61', 'ven66@gmail.com'),
(217, 3, 28, 'delivery basis', '5 weeks', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(218, 3, 28, 'gaurantee warranty', '2 yrs', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(219, 3, 28, 'delivery schedule', '4 weeks', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(220, 3, 28, 'payment terms', 'as discussed', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(221, 3, 28, 'validity of offer', '8 months', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(222, 3, 28, 'security BG', 'check out', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(223, 3, 28, 'liquidity damage', '350', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(224, 3, 28, 'remarks', 'okay', '2019-01-29 12:53:28', '33', 'ven371@yahoo.com'),
(225, 4, 29, 'delivery basis', '5 weeks', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(226, 4, 29, 'gaurantee warranty', '1 yr', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(227, 4, 29, 'delivery schedule', '4 weeks', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(228, 4, 29, 'payment terms', 'as discussed', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(229, 4, 29, 'validity of offer', '7 months', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(230, 4, 29, 'security BG', 'check out', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(231, 4, 29, 'liquidity damage', '350', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(232, 4, 29, 'remarks', 'okay', '2019-01-29 12:55:18', '45', 'ven371@yahoo.com'),
(233, 6, 30, 'delivery basis', '5 weeks', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(234, 6, 30, 'gaurantee warranty', '2 yrs', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(235, 6, 30, 'delivery schedule', 'two weeks', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(236, 6, 30, 'payment terms', 'as discussed', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(237, 6, 30, 'validity of offer', '6 months', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(238, 6, 30, 'security BG', 'check out', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(239, 6, 30, 'liquidity damage', '500', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(240, 6, 30, 'remarks', 'okay', '2019-01-29 12:57:41', '62', 'ven371@yahoo.com'),
(241, 3, 31, 'delivery basis', '5 weeks', '2019-01-29 13:01:04', '31', 'ven979@yahoo.com'),
(242, 3, 31, 'gaurantee warranty', '1 yr', '2019-01-29 13:01:04', '31', 'ven979@yahoo.com'),
(243, 3, 31, 'delivery schedule', '4 weeks', '2019-01-29 13:01:04', '31', 'ven979@yahoo.com'),
(244, 3, 31, 'payment terms', 'as discussed', '2019-01-29 13:01:04', '31', 'ven979@yahoo.com'),
(245, 3, 31, 'validity of offer', '7 months', '2019-01-29 13:01:04', '31', 'ven979@yahoo.com'),
(246, 3, 31, 'security BG', 'check out', '2019-01-29 13:01:04', '31', 'ven979@yahoo.com'),
(247, 3, 31, 'liquidity damage', '300', '2019-01-29 13:01:05', '31', 'ven979@yahoo.com'),
(248, 3, 31, 'remarks', 'okay', '2019-01-29 13:01:05', '31', 'ven979@yahoo.com'),
(249, 4, 32, 'delivery basis', '4 weeks', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(250, 4, 32, 'gaurantee warranty', '1 yr', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(251, 4, 32, 'delivery schedule', '4 weeks', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(252, 4, 32, 'payment terms', 'as discussed', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(253, 4, 32, 'validity of offer', '8 months', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(254, 4, 32, 'security BG', 'check out', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(255, 4, 32, 'liquidity damage', '300', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(256, 4, 32, 'remarks', 'okay', '2019-01-29 13:02:02', '43', 'ven979@yahoo.com'),
(257, 6, 33, 'delivery basis', '5 weeks', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(258, 6, 33, 'gaurantee warranty', '2 yrs', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(259, 6, 33, 'delivery schedule', '4 weeks', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(260, 6, 33, 'payment terms', 'as discussed', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(261, 6, 33, 'validity of offer', '7 months', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(262, 6, 33, 'security BG', 'check out', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(263, 6, 33, 'liquidity damage', '500', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(264, 6, 33, 'remarks', 'okay', '2019-01-29 13:03:26', '60', 'ven979@yahoo.com'),
(265, 2, 34, 'delivery basis', '7 weeks', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(266, 2, 34, 'gaurantee warranty', '1 yr', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(267, 2, 34, 'delivery schedule', 'two weeks', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(268, 2, 34, 'payment terms', 'as discussed', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(269, 2, 34, 'validity of offer', '7 months', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(270, 2, 34, 'security BG', 'check out', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(271, 2, 34, 'liquidity damage', '300', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(272, 2, 34, 'remarks', 'okay', '2019-01-29 13:05:12', '18', 'ven979@yahoo.com'),
(273, 4, 35, 'delivery basis', '4 weeks', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(274, 4, 35, 'gaurantee warranty', '2 yrs', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(275, 4, 35, 'delivery schedule', '4 weeks', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(276, 4, 35, 'payment terms', 'as discussed', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(277, 4, 35, 'validity of offer', '8 months', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(278, 4, 35, 'security BG', 'check out', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(279, 4, 35, 'liquidity damage', '550', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(280, 4, 35, 'remarks', 'okay', '2019-01-29 13:24:37', '37', 'ven121@gmail.com'),
(281, 4, 36, 'delivery basis', '5 weeks', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(282, 4, 36, 'gaurantee warranty', '1 yr', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(283, 4, 36, 'delivery schedule', '5 weeks', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(284, 4, 36, 'payment terms', 'as discussed', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(285, 4, 36, 'validity of offer', '8 months', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(286, 4, 36, 'security BG', 'check out', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(287, 4, 36, 'liquidity damage', '350', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(288, 4, 36, 'remarks', 'okay', '2019-01-29 13:29:14', '43', 'ven979@yahoo.com'),
(289, 11, 37, 'delivery basis', '5 weeks', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(290, 11, 37, 'gaurantee warranty', '2 yrs', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(291, 11, 37, 'delivery schedule', '4 weeks', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(292, 11, 37, 'payment terms', 'as discussed', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(293, 11, 37, 'validity of offer', '7 months', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(294, 11, 37, 'security BG', 'check out', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(295, 11, 37, 'liquidity damage', '400', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(296, 11, 37, 'remarks', 'okay', '2019-01-30 08:02:54', '109', 'ven121@gmail.com'),
(297, 12, 38, 'delivery basis', '7 weeks', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(298, 12, 38, 'gaurantee warranty', '1 yr', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(299, 12, 38, 'delivery schedule', '5 weeks', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(300, 12, 38, 'payment terms', 'as discussed', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(301, 12, 38, 'validity of offer', '7 months', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(302, 12, 38, 'security BG', 'check out', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(303, 12, 38, 'liquidity damage', '300', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(304, 12, 38, 'remarks', 'okay', '2019-01-30 08:03:58', '122', 'ven121@gmail.com'),
(305, 12, 39, 'delivery basis', '7 weeks', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(306, 12, 39, 'gaurantee warranty', '2 yrs', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(307, 12, 39, 'delivery schedule', '5 weeks', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(308, 12, 39, 'payment terms', 'as discussed', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(309, 12, 39, 'validity of offer', '6 months', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(310, 12, 39, 'security BG', 'check out', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(311, 12, 39, 'liquidity damage', '550', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(312, 12, 39, 'remarks', 'okay', '2019-01-30 08:11:40', '122', 'ven121@gmail.com'),
(313, 13, 40, 'delivery basis', '5 weeks', '2019-01-31 06:06:09', '135', 'ven121@gmail.com'),
(314, 13, 40, 'gaurantee warranty', '1 yr', '2019-01-31 06:06:09', '135', 'ven121@gmail.com'),
(315, 13, 40, 'delivery schedule', '4 weeks', '2019-01-31 06:06:09', '135', 'ven121@gmail.com'),
(316, 13, 40, 'payment terms', 'as discussed', '2019-01-31 06:06:09', '135', 'ven121@gmail.com'),
(317, 13, 40, 'validity of offer', '6 months', '2019-01-31 06:06:09', '135', 'ven121@gmail.com'),
(318, 13, 40, 'security BG', 'check out', '2019-01-31 06:06:09', '135', 'ven121@gmail.com'),
(319, 13, 40, 'liquidity damage', '500', '2019-01-31 06:06:10', '135', 'ven121@gmail.com'),
(320, 13, 40, 'remarks', 'okay', '2019-01-31 06:06:10', '135', 'ven121@gmail.com'),
(321, 13, 41, 'delivery basis', '7 weeks', '2019-01-31 06:37:42', '135', 'ven121@gmail.com'),
(322, 13, 41, 'gaurantee warranty', '2 yrs', '2019-01-31 06:37:42', '135', 'ven121@gmail.com'),
(323, 13, 41, 'delivery schedule', '5 weeks', '2019-01-31 06:37:42', '135', 'ven121@gmail.com'),
(324, 13, 41, 'payment terms', 'as discussed', '2019-01-31 06:37:42', '135', 'ven121@gmail.com'),
(325, 13, 41, 'validity of offer', '6 months', '2019-01-31 06:37:42', '135', 'ven121@gmail.com'),
(326, 13, 41, 'security BG', 'check out', '2019-01-31 06:37:42', '135', 'ven121@gmail.com'),
(327, 13, 41, 'liquidity damage', '550', '2019-01-31 06:37:43', '135', 'ven121@gmail.com'),
(328, 13, 41, 'remarks', 'okay', '2019-01-31 06:37:43', '135', 'ven121@gmail.com'),
(329, 14, 42, 'delivery basis', '7 weeks', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(330, 14, 42, 'gaurantee warranty', '1 yr', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(331, 14, 42, 'delivery schedule', 'two weeks', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(332, 14, 42, 'payment terms', 'as discussed', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(333, 14, 42, 'validity of offer', '7 months', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(334, 14, 42, 'security BG', 'check out', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(335, 14, 42, 'liquidity damage', '550', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(336, 14, 42, 'remarks', 'okay', '2019-01-31 07:04:54', '148', 'ven121@gmail.com'),
(337, 14, 43, 'delivery basis', '2 weeks', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(338, 14, 43, 'gaurantee warranty', '2 yrs', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(339, 14, 43, 'delivery schedule', '8 weeks', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(340, 14, 43, 'payment terms', 'as discussed', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(341, 14, 43, 'validity of offer', '5 weeks', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(342, 14, 43, 'security BG', 'check out', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(343, 14, 43, 'liquidity damage', '760', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(344, 14, 43, 'remarks', 'okay', '2019-01-31 07:13:50', '148', 'ven121@gmail.com'),
(345, 14, 44, 'delivery basis', '5 weeks', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(346, 14, 44, 'gaurantee warranty', '1 yr', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(347, 14, 44, 'delivery schedule', '3 weeks', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(348, 14, 44, 'payment terms', 'as discussed', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(349, 14, 44, 'validity of offer', '5 months', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(350, 14, 44, 'security BG', 'check out', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(351, 14, 44, 'liquidity damage', '770', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(352, 14, 44, 'remarks', 'okay', '2019-01-31 07:22:24', '148', 'ven121@gmail.com'),
(353, 11, 45, 'delivery basis', '5 weeks', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(354, 11, 45, 'gaurantee warranty', '2 yrs', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(355, 11, 45, 'delivery schedule', '5 weeks', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(356, 11, 45, 'payment terms', 'as discussed', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(357, 11, 45, 'validity of offer', '7 months', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(358, 11, 45, 'security BG', 'check out', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(359, 11, 45, 'liquidity damage', '678', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(360, 11, 45, 'remarks', 'okay', '2019-01-31 10:44:43', '109', 'ven121@gmail.com'),
(361, 11, 46, 'delivery basis', '4 weeks', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(362, 11, 46, 'gaurantee warranty', '1 yr', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(363, 11, 46, 'delivery schedule', 'two weeks', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(364, 11, 46, 'payment terms', 'as discussed', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(365, 11, 46, 'validity of offer', '7 months', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(366, 11, 46, 'security BG', 'check out', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(367, 11, 46, 'liquidity damage', '300', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(368, 11, 46, 'remarks', 'okay', '2019-01-31 12:08:09', '117', 'ven66@gmail.com'),
(369, 12, 47, 'delivery basis', '5 weeks', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(370, 12, 47, 'gaurantee warranty', '1 yr', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(371, 12, 47, 'delivery schedule', 'two weeks', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(372, 12, 47, 'payment terms', 'as discussed', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(373, 12, 47, 'validity of offer', '6 months', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(374, 12, 47, 'security BG', 'check out', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(375, 12, 47, 'liquidity damage', '550', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(376, 12, 47, 'remarks', 'okay', '2019-01-31 12:14:45', '130', 'ven66@gmail.com'),
(377, 13, 48, 'delivery basis', '4 weeks', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(378, 13, 48, 'gaurantee warranty', '2 yrs', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(379, 13, 48, 'delivery schedule', 'two weeks', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(380, 13, 48, 'payment terms', 'as discussed', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(381, 13, 48, 'validity of offer', '7 months', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(382, 13, 48, 'security BG', 'check out', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(383, 13, 48, 'liquidity damage', '300', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(384, 13, 48, 'remarks', 'okay', '2019-01-31 12:18:27', '143', 'ven66@gmail.com'),
(385, 14, 49, 'delivery basis', '4 weeks', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(386, 14, 49, 'gaurantee warranty', '2 yrs', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(387, 14, 49, 'delivery schedule', 'two weeks', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(388, 14, 49, 'payment terms', 'as discussed', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(389, 14, 49, 'validity of offer', '8 months', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(390, 14, 49, 'security BG', 'check out', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(391, 14, 49, 'liquidity damage', '550', '2019-01-31 12:19:46', '156', 'ven66@gmail.com'),
(392, 14, 49, 'remarks', 'okay', '2019-01-31 12:19:46', '156', 'ven66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_simple_bid_item_total`
--

CREATE TABLE `Ilab_master_simple_bid_item_total` (
  `Slno_simple_item_total` int(11) NOT NULL,
  `master_bid_id_com` int(11) NOT NULL,
  `simple_id_slno_total` int(11) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `total_tax` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `user_assumption_charge` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `current_rate` varchar(255) DEFAULT NULL,
  `currency_name` varchar(255) DEFAULT NULL,
  `vendor_Bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_simple_bid_item_total`
--

INSERT INTO `Ilab_master_simple_bid_item_total` (`Slno_simple_item_total`, `master_bid_id_com`, `simple_id_slno_total`, `sub_total`, `total_tax`, `total_price`, `user_assumption_charge`, `date`, `current_rate`, `currency_name`, `vendor_Bid_slno`, `Vendor_id`) VALUES
(1, 1, 1, '13200.00', '0.00', '13200.00', '0.00', '2019-01-28 07:53:33', NULL, NULL, '3', 'ven121@gmail.com'),
(2, 2, 2, '21100.00', '0.00', '21100.00', '0.00', '2019-01-28 08:01:30', NULL, NULL, '12', 'ven121@gmail.com'),
(3, 2, 3, '15900.00', '0.00', '15900.00', '0.00', '2019-01-28 10:25:45', NULL, NULL, '18', 'ven979@yahoo.com'),
(4, 2, 4, '16200.00', '11000.00', '27200.00', '0.00', '2019-01-28 10:30:28', NULL, NULL, '17', 'ven97@gmail.com'),
(5, 1, 5, '16100.00', '1230.00', '17330.00', '0.00', '2019-01-28 10:36:17', NULL, NULL, '5', 'ven310@yahoo.com'),
(6, 1, 6, '12900.00', '210.00', '13110.00', '0.00', '2019-01-28 10:52:16', NULL, NULL, '7', 'ven66@gmail.com'),
(7, 1, 7, '8900.00', '560.00', '9460.00', '0.00', '2019-01-28 10:58:21', NULL, NULL, '8', 'ven371@yahoo.com'),
(8, 2, 8, '15180.00', '450.00', '15630.00', '0.00', '2019-01-28 11:00:47', NULL, NULL, '21', 'ven371@yahoo.com'),
(9, 1, 9, '16200.00', '2500', '18700.00', '0.00', '2019-01-28 13:57:23', NULL, NULL, '3', 'ven121@gmail.com'),
(10, 2, 10, '11900.00', '500', '12400.00', '200', '2019-01-28 13:59:39', NULL, NULL, '12', 'ven121@gmail.com'),
(11, 3, 11, '1693.00', '21.00', '1714.00', '0.00', '2019-01-28 14:46:20', NULL, NULL, '25', 'ven121@gmail.com'),
(12, 5, 12, '690000.00', '300.00', '690300.00', '0.00', '2019-01-28 14:49:16', NULL, NULL, '48', 'ven121@gmail.com'),
(13, 3, 13, '10800.00', '0.00', '10800.00', '0.00', '2019-01-28 14:50:27', NULL, NULL, '25', 'ven121@gmail.com'),
(14, 5, 14, '259920.00', '0.00', '259920.00', '0.00', '2019-01-29 11:32:02', NULL, NULL, '51', 'ven97@gmail.com'),
(15, 2, 15, '10900.00', '0.00', '10900.00', '0.00', '2019-01-29 11:33:27', NULL, NULL, '17', 'ven97@gmail.com'),
(16, 3, 16, '10800.00', '0.00', '10800.00', '0.00', '2019-01-29 11:35:02', NULL, NULL, '30', 'ven97@gmail.com'),
(17, 2, 17, '11000.00', '0.00', '11000.00', '0.00', '2019-01-29 11:41:46', NULL, NULL, '20', 'ven66@gmail.com'),
(18, 3, 18, '9800.00', '0.00', '9800.00', '0.00', '2019-01-29 11:43:14', NULL, NULL, '32', 'ven66@gmail.com'),
(19, 1, 19, '12000.00', '0.00', '12000.00', '0.00', '2019-01-29 11:44:42', NULL, NULL, '7', 'ven66@gmail.com'),
(20, 6, 20, '12200.00', '0.00', '12200.00', '0.00', '2019-01-29 12:34:27', NULL, NULL, '59', 'ven97@gmail.com'),
(21, 4, 21, '5650.00', '0.00', '5650.00', '0.00', '2019-01-29 12:35:58', NULL, NULL, '42', 'ven97@gmail.com'),
(22, 4, 22, '9500.00', '0.00', '9500.00', '0.00', '2019-01-29 12:38:39', NULL, NULL, '37', 'ven121@gmail.com'),
(23, 6, 23, '18900.00', '310.00', '19210.00', '0.00', '2019-01-29 12:39:57', NULL, NULL, '54', 'ven121@gmail.com'),
(24, 1, 24, '16390.00', '0.00', '16390.00', '0.00', '2019-01-29 12:42:48', NULL, NULL, '5', 'ven310@yahoo.com'),
(25, 2, 25, '17200.00', '670.50', '17870.50', '0.00', '2019-01-29 12:44:47', NULL, NULL, '14', 'ven310@yahoo.com'),
(26, 4, 26, '7900.00', '230.00', '8130.00', '0.00', '2019-01-29 12:48:39', NULL, NULL, '44', 'ven66@gmail.com'),
(27, 6, 27, '15910.00', '670.00', '16580.00', '0.00', '2019-01-29 12:50:29', NULL, NULL, '61', 'ven66@gmail.com'),
(28, 3, 28, '9600.00', '210.00', '9810.00', '0.00', '2019-01-29 12:53:28', NULL, NULL, '33', 'ven371@yahoo.com'),
(29, 4, 29, '7900.00', '210.00', '8110.00', '0.00', '2019-01-29 12:55:18', NULL, NULL, '45', 'ven371@yahoo.com'),
(30, 6, 30, '15550.00', '600.00', '16150.00', '0.00', '2019-01-29 12:57:41', NULL, NULL, '62', 'ven371@yahoo.com'),
(31, 3, 31, '12000.00', '350', '12350.00', '0.00', '2019-01-29 13:01:05', NULL, NULL, '31', 'ven979@yahoo.com'),
(32, 4, 32, '10000.00', '260', '10260.00', '0.00', '2019-01-29 13:02:02', NULL, NULL, '43', 'ven979@yahoo.com'),
(33, 6, 33, '15200.00', '310.00', '15510.00', '0.00', '2019-01-29 13:03:26', NULL, NULL, '60', 'ven979@yahoo.com'),
(34, 2, 34, '10950.00', '560', '11510.00', '0.00', '2019-01-29 13:05:12', NULL, NULL, '18', 'ven979@yahoo.com'),
(35, 4, 35, '1850.00', '450.50', '2300.50', '0.00', '2019-01-29 13:24:37', NULL, NULL, '37', 'ven121@gmail.com'),
(36, 4, 36, '10000.00', '230.50', '10230.50', '0.00', '2019-01-29 13:29:14', NULL, NULL, '43', 'ven979@yahoo.com'),
(37, 11, 37, '66082.00', '0.00', '66082.00', '0.00', '2019-01-30 08:02:54', NULL, NULL, '109', 'ven121@gmail.com'),
(38, 12, 38, '20800.00', '0.00', '20800.00', '0.00', '2019-01-30 08:03:58', NULL, NULL, '122', 'ven121@gmail.com'),
(39, 12, 39, '23900.00', '0.00', '23900.00', '0.00', '2019-01-30 08:11:40', NULL, NULL, '122', 'ven121@gmail.com'),
(40, 13, 40, '27185.00', '120.45', '27305.45', '0.00', '2019-01-31 06:06:10', NULL, NULL, '135', 'ven121@gmail.com'),
(41, 13, 41, '23680.00', '450.00', '24130.00', '0.00', '2019-01-31 06:37:43', NULL, NULL, '135', 'ven121@gmail.com'),
(42, 14, 42, '10000.00', '560.00', '10560.00', '0.00', '2019-01-31 07:04:54', NULL, NULL, '148', 'ven121@gmail.com'),
(43, 14, 43, '5700.00', '330.40', '6030.40', '0.00', '2019-01-31 07:13:51', NULL, NULL, '148', 'ven121@gmail.com'),
(44, 14, 44, '8000.00', '330.75', '8330.75', '0.00', '2019-01-31 07:22:24', NULL, NULL, '148', 'ven121@gmail.com'),
(45, 11, 45, '41495.00', '505.00', '42000.00', '0.00', '2019-01-31 10:44:43', NULL, NULL, '109', 'ven121@gmail.com'),
(46, 11, 46, '34986.00', '0.00', '34986.00', '0.00', '2019-01-31 12:08:09', NULL, NULL, '117', 'ven66@gmail.com'),
(47, 12, 47, '21500.00', '0.00', '21500.00', '0.00', '2019-01-31 12:14:45', NULL, NULL, '130', 'ven66@gmail.com'),
(48, 13, 48, '14830.00', '0.00', '14830.00', '0.00', '2019-01-31 12:18:27', NULL, NULL, '143', 'ven66@gmail.com'),
(49, 14, 49, '7643.00', '3450.00', '11093.00', '0.00', '2019-01-31 12:19:46', NULL, NULL, '156', 'ven66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_simple_bid_logistic`
--

CREATE TABLE `Ilab_master_simple_bid_logistic` (
  `Slno_simple_item` int(11) NOT NULL,
  `simple_id_slno` int(11) NOT NULL,
  `bid_master_id_com` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_unit_price` varchar(255) NOT NULL,
  `date_entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comm_item_slno` varchar(255) NOT NULL,
  `mr_item_slno` varchar(255) DEFAULT NULL,
  `vendor_bid_slno` varchar(255) NOT NULL,
  `Vendor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here vendor will fill information';

--
-- Dumping data for table `Ilab_master_simple_bid_logistic`
--

INSERT INTO `Ilab_master_simple_bid_logistic` (`Slno_simple_item`, `simple_id_slno`, `bid_master_id_com`, `vehicle_type`, `capacity`, `detail`, `no`, `from_location`, `to_location`, `unit_price`, `total_unit_price`, `date_entry`, `comm_item_slno`, `mr_item_slno`, `vendor_bid_slno`, `Vendor_id`) VALUES
(1, 12, 5, 'vehicle12', '60000ponds', '12345', '15', 'nayapali', 'nayapali', '2000', '30000.00', '2019-01-28 14:49:16', '17', NULL, '48', 'ven121@gmail.com'),
(2, 12, 5, 'vehicle12', '60000ponds', 'abc', '70', 'nayapali', 'nayapali', '3000', '210000.00', '2019-01-28 14:49:16', '18', NULL, '48', 'ven121@gmail.com'),
(3, 12, 5, 'vehicle10', '50s ponds', 'xxxxxx', '55', 'irc', 'irc', '4000', '220000.00', '2019-01-28 14:49:16', '19', NULL, '48', 'ven121@gmail.com'),
(4, 12, 5, 'vehicle10', '5ponds', '2345', '100', 'nayapali', 'nayapali', '2300', '230000.00', '2019-01-28 14:49:16', '20', NULL, '48', 'ven121@gmail.com'),
(5, 14, 5, 'vehicle12', '60000ponds', '12345', '15', 'nayapali', 'nayapali', '670', '10050.00', '2019-01-29 11:32:01', '17', NULL, '51', 'ven97@gmail.com'),
(6, 14, 5, 'vehicle12', '60000ponds', 'abc', '70', 'nayapali', 'nayapali', '450', '31500.00', '2019-01-29 11:32:01', '18', NULL, '51', 'ven97@gmail.com'),
(7, 14, 5, 'vehicle10', '50s ponds', 'xxxxxx', '55', 'irc', 'irc', '334', '18370.00', '2019-01-29 11:32:01', '19', NULL, '51', 'ven97@gmail.com'),
(8, 14, 5, 'vehicle10', '5ponds', '2345', '100', 'nayapali', 'nayapali', '2000', '200000.00', '2019-01-29 11:32:01', '20', NULL, '51', 'ven97@gmail.com'),
(9, 37, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '44545', '44545.00', '2019-01-30 08:02:54', '7', NULL, '109', 'ven121@gmail.com'),
(10, 37, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4567', '4567.00', '2019-01-30 08:02:54', '8', NULL, '109', 'ven121@gmail.com'),
(11, 37, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '345', '345.00', '2019-01-30 08:02:54', '9', NULL, '109', 'ven121@gmail.com'),
(12, 37, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '234', '234.00', '2019-01-30 08:02:54', '10', NULL, '109', 'ven121@gmail.com'),
(13, 37, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '467', '467.00', '2019-01-30 08:02:54', '11', NULL, '109', 'ven121@gmail.com'),
(14, 37, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '456', '456.00', '2019-01-30 08:02:54', '12', NULL, '109', 'ven121@gmail.com'),
(15, 37, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '678', '678.00', '2019-01-30 08:02:54', '36', NULL, '109', 'ven121@gmail.com'),
(16, 37, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '3450', '3450.00', '2019-01-30 08:02:54', '37', NULL, '109', 'ven121@gmail.com'),
(17, 37, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '7890', '7890.00', '2019-01-30 08:02:54', '38', NULL, '109', 'ven121@gmail.com'),
(18, 37, 11, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '3450', '3450.00', '2019-01-30 08:02:54', '39', NULL, '109', 'ven121@gmail.com'),
(19, 38, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '3400', '3400.00', '2019-01-30 08:03:58', '13', NULL, '122', 'ven121@gmail.com'),
(20, 38, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '5600', '5600.00', '2019-01-30 08:03:58', '14', NULL, '122', 'ven121@gmail.com'),
(21, 38, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '3200', '3200.00', '2019-01-30 08:03:58', '40', NULL, '122', 'ven121@gmail.com'),
(22, 38, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '2200', '2200.00', '2019-01-30 08:03:58', '41', NULL, '122', 'ven121@gmail.com'),
(23, 38, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '1200', '1200.00', '2019-01-30 08:03:58', '42', NULL, '122', 'ven121@gmail.com'),
(24, 38, 12, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '5200', '5200.00', '2019-01-30 08:03:58', '43', NULL, '122', 'ven121@gmail.com'),
(25, 39, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '3400', '3400.00', '2019-01-30 08:11:40', '13', NULL, '122', 'ven121@gmail.com'),
(26, 39, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '5500', '5500.00', '2019-01-30 08:11:40', '14', NULL, '122', 'ven121@gmail.com'),
(27, 39, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '2500', '2500.00', '2019-01-30 08:11:40', '40', NULL, '122', 'ven121@gmail.com'),
(28, 39, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '5600', '5600.00', '2019-01-30 08:11:40', '41', NULL, '122', 'ven121@gmail.com'),
(29, 39, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '1200', '1200.00', '2019-01-30 08:11:40', '42', NULL, '122', 'ven121@gmail.com'),
(30, 39, 12, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '5700', '5700.00', '2019-01-30 08:11:40', '43', NULL, '122', 'ven121@gmail.com'),
(31, 40, 13, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '6750', '6750.00', '2019-01-31 06:06:09', '15', NULL, '135', 'ven121@gmail.com'),
(32, 40, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '3450', '3450.00', '2019-01-31 06:06:09', '16', NULL, '135', 'ven121@gmail.com'),
(33, 40, 13, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '7890', '7890.00', '2019-01-31 06:06:09', '44', NULL, '135', 'ven121@gmail.com'),
(34, 40, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2345', '2345.00', '2019-01-31 06:06:09', '45', NULL, '135', 'ven121@gmail.com'),
(35, 40, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '6750', '6750.00', '2019-01-31 06:06:09', '46', NULL, '135', 'ven121@gmail.com'),
(36, 41, 13, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5600', '5600.00', '2019-01-31 06:37:42', '15', NULL, '135', 'ven121@gmail.com'),
(37, 41, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '4530', '4530.00', '2019-01-31 06:37:42', '16', NULL, '135', 'ven121@gmail.com'),
(38, 41, 13, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '9980', '9980.00', '2019-01-31 06:37:42', '44', NULL, '135', 'ven121@gmail.com'),
(39, 41, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2340', '2340.00', '2019-01-31 06:37:42', '45', NULL, '135', 'ven121@gmail.com'),
(40, 41, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '1230', '1230.00', '2019-01-31 06:37:42', '46', NULL, '135', 'ven121@gmail.com'),
(41, 42, 14, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '4400', '4400.00', '2019-01-31 07:04:54', '47', NULL, '148', 'ven121@gmail.com'),
(42, 42, 14, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '5600', '5600.00', '2019-01-31 07:04:54', '48', NULL, '148', 'ven121@gmail.com'),
(43, 43, 14, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '2300', '2300.00', '2019-01-31 07:13:50', '47', NULL, '148', 'ven121@gmail.com'),
(44, 43, 14, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3400', '3400.00', '2019-01-31 07:13:50', '48', NULL, '148', 'ven121@gmail.com'),
(45, 44, 14, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '3300', '3300.00', '2019-01-31 07:22:24', '47', NULL, '148', 'ven121@gmail.com'),
(46, 44, 14, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4700', '4700.00', '2019-01-31 07:22:24', '48', NULL, '148', 'ven121@gmail.com'),
(47, 45, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '4560', '4560.00', '2019-01-31 10:44:43', '7', NULL, '109', 'ven121@gmail.com'),
(48, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '6780', '6780.00', '2019-01-31 10:44:43', '8', NULL, '109', 'ven121@gmail.com'),
(49, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '3450', '3450.00', '2019-01-31 10:44:43', '9', NULL, '109', 'ven121@gmail.com'),
(50, 45, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '2100', '2100.00', '2019-01-31 10:44:43', '10', NULL, '109', 'ven121@gmail.com'),
(51, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3000', '3000.00', '2019-01-31 10:44:43', '11', NULL, '109', 'ven121@gmail.com'),
(52, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2200', '2200.00', '2019-01-31 10:44:43', '12', NULL, '109', 'ven121@gmail.com'),
(53, 45, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '6780', '6780.00', '2019-01-31 10:44:43', '36', NULL, '109', 'ven121@gmail.com'),
(54, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2005', '2005.00', '2019-01-31 10:44:43', '37', NULL, '109', 'ven121@gmail.com'),
(55, 45, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '770', '770.00', '2019-01-31 10:44:43', '38', NULL, '109', 'ven121@gmail.com'),
(56, 45, 11, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '9850', '9850.00', '2019-01-31 10:44:43', '39', NULL, '109', 'ven121@gmail.com'),
(57, 46, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '5400', '5400.00', '2019-01-31 12:08:09', '7', NULL, '117', 'ven66@gmail.com'),
(58, 46, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '2200', '2200.00', '2019-01-31 12:08:09', '8', NULL, '117', 'ven66@gmail.com'),
(59, 46, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '564', '564.00', '2019-01-31 12:08:09', '9', NULL, '117', 'ven66@gmail.com'),
(60, 46, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '3100', '3100.00', '2019-01-31 12:08:09', '10', NULL, '117', 'ven66@gmail.com'),
(61, 46, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '3000', '3000.00', '2019-01-31 12:08:09', '11', NULL, '117', 'ven66@gmail.com'),
(62, 46, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '4400', '4400.00', '2019-01-31 12:08:09', '12', NULL, '117', 'ven66@gmail.com'),
(63, 46, 11, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '6780', '6780.00', '2019-01-31 12:08:09', '36', NULL, '117', 'ven66@gmail.com'),
(64, 46, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2005', '2005.00', '2019-01-31 12:08:09', '37', NULL, '117', 'ven66@gmail.com'),
(65, 46, 11, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '770', '770.00', '2019-01-31 12:08:09', '38', NULL, '117', 'ven66@gmail.com'),
(66, 46, 11, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '6767', '6767.00', '2019-01-31 12:08:09', '39', NULL, '117', 'ven66@gmail.com'),
(67, 47, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '4400', '4400.00', '2019-01-31 12:14:45', '13', NULL, '130', 'ven66@gmail.com'),
(68, 47, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2100', '2100.00', '2019-01-31 12:14:45', '14', NULL, '130', 'ven66@gmail.com'),
(69, 47, 12, 'vehicle10', '5ponds', '2345', '1', 'nayapali', 'nayapali', '2500', '2500.00', '2019-01-31 12:14:45', '40', NULL, '130', 'ven66@gmail.com'),
(70, 47, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '5600', '5600.00', '2019-01-31 12:14:45', '41', NULL, '130', 'ven66@gmail.com'),
(71, 47, 12, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '1200', '1200.00', '2019-01-31 12:14:45', '42', NULL, '130', 'ven66@gmail.com'),
(72, 47, 12, 'vehicle12', '60000ponds', 'abc', '1', 'location1221', 'location1221', '5700', '5700.00', '2019-01-31 12:14:45', '43', NULL, '130', 'ven66@gmail.com'),
(73, 48, 13, 'vehicle10', '5ponds', '2345', '1', 'irc', 'irc', '3500', '3500.00', '2019-01-31 12:18:27', '15', NULL, '143', 'ven66@gmail.com'),
(74, 48, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '3450', '3450.00', '2019-01-31 12:18:27', '16', NULL, '143', 'ven66@gmail.com'),
(75, 48, 13, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '4450', '4450.00', '2019-01-31 12:18:27', '44', NULL, '143', 'ven66@gmail.com'),
(76, 48, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'nayapali', 'nayapali', '2200', '2200.00', '2019-01-31 12:18:27', '45', NULL, '143', 'ven66@gmail.com'),
(77, 48, 13, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '1230', '1230.00', '2019-01-31 12:18:27', '46', NULL, '143', 'ven66@gmail.com'),
(78, 49, 14, 'vehicle10', '5ponds', '2345', '1', 'location1221', 'location1221', '3300', '3300.00', '2019-01-31 12:19:46', '47', NULL, '156', 'ven66@gmail.com'),
(79, 49, 14, 'vehicle10', '50s ponds', 'xxxxxx', '1', 'location1221', 'location1221', '4343', '4343.00', '2019-01-31 12:19:46', '48', NULL, '156', 'ven66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_technical_detail`
--

CREATE TABLE `Ilab_master_technical_detail` (
  `Slno_technical` int(11) NOT NULL,
  `technical_name` varchar(255) NOT NULL,
  `technical_desc` text NOT NULL,
  `technical_id` varchar(255) NOT NULL,
  `category_slno` varchar(255) NOT NULL,
  `material_slno` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_technical_detail`
--

INSERT INTO `Ilab_master_technical_detail` (`Slno_technical`, `technical_name`, `technical_desc`, `technical_id`, `category_slno`, `material_slno`, `status`, `date_entry`, `time_entry`) VALUES
(1, '316Ls', '316L stainless steel head and casing', 'Tech001', '2', 4, 3, '2019-01-18', '17:31:08'),
(2, 'tec10', 'xxx', '101', '1', 6, 1, '2018-09-26', '15:16:54'),
(3, 'tec10', 'xxx', '101', '2', 3, 1, '2018-09-26', '15:19:18'),
(4, '67tyu', 'cvbnmxrt', '126709', '1', 6, 1, '2018-10-09', '21:20:46'),
(5, 'BNTRY', 'bnmiyutre', '0290321', '1', 6, 1, '2018-10-09', '21:21:46'),
(6, 'technical 1', 'et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \"this is how you loop an array with foreach\".', 'techid00155', '1', 7, 1, '2018-10-15', '17:42:53'),
(7, 'technical 1667', 'For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i', 'techid001sssd', '1', 7, 1, '2018-10-15', '17:43:28'),
(8, 'ABCD 3333', 'This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:', 'techid0013343434', '1', 8, 1, '2018-10-15', '17:44:00'),
(9, 'tech34311', 'xxxxx', '12131', '1', 2, 1, '2019-01-18', '17:23:05'),
(10, 'tech454', 'xxxxx', '455555', '1', 6, 1, '2019-01-18', '17:30:26'),
(11, 'tec404', 'xyz', '111', '1', 6, 1, '2019-02-20', '15:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_tech_bid_comment`
--

CREATE TABLE `Ilab_master_tech_bid_comment` (
  `Slno` int(11) NOT NULL,
  `master_bid` varchar(255) NOT NULL,
  `vendor_bid_id` varchar(255) NOT NULL,
  `comment` text,
  `status` varchar(255) NOT NULL COMMENT 'p-positive n-negative',
  `active_status` int(11) NOT NULL DEFAULT '0',
  `token_no` varchar(255) NOT NULL,
  `token_id` varchar(255) NOT NULL COMMENT 'Serial id to tokken',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_tracking_tools`
--

CREATE TABLE `Ilab_master_tracking_tools` (
  `Slno_tracking` int(11) NOT NULL,
  `Job_code` varchar(255) DEFAULT NULL,
  `Po_no` varchar(255) NOT NULL,
  `Po_date` varchar(255) DEFAULT NULL,
  `Date_creation` varchar(255) DEFAULT NULL,
  `Bg_submission_date` varchar(255) DEFAULT NULL,
  `Drg_submission_date` varchar(255) DEFAULT NULL,
  `Advance_payment_date` varchar(255) DEFAULT NULL,
  `Drg_approval_date` varchar(255) DEFAULT NULL,
  `Inspection_call_date` varchar(255) DEFAULT NULL,
  `Inspection_call_remark` text,
  `Inspection_clearance_date` varchar(255) DEFAULT NULL,
  `Inspection_clearance_remark` text,
  `Dispatch_clearance_date` varchar(255) DEFAULT NULL,
  `Dispatch_clearance_remark` text,
  `Qty_receipt_at_site` text,
  `Qty_pending` varchar(255) DEFAULT NULL,
  `Supply_completion` varchar(255) DEFAULT NULL,
  `Remark_process` text,
  `ACE_Basic` varchar(255) DEFAULT NULL,
  `Invoice_value` varchar(255) DEFAULT NULL,
  `Order_value` varchar(255) DEFAULT NULL,
  `Cost_saving` varchar(255) DEFAULT NULL,
  `Mfg_clear_date` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `submitted_by` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `pr_no_schedule` varchar(255) NOT NULL,
  `pr_no_schedule_slno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_tracking_tools_m`
--

CREATE TABLE `Ilab_master_tracking_tools_m` (
  `Slno_tracking` int(11) NOT NULL,
  `Job_code` varchar(255) DEFAULT NULL,
  `Po_no` varchar(255) NOT NULL,
  `Po_date` varchar(255) DEFAULT NULL,
  `Date_creation` varchar(255) DEFAULT NULL,
  `Bg_submission_date` varchar(255) DEFAULT NULL,
  `Drg_submission_date` varchar(255) DEFAULT NULL,
  `Advance_payment_date` varchar(255) DEFAULT NULL,
  `Drg_approval_date` varchar(255) DEFAULT NULL,
  `Inspection_call_date` varchar(255) DEFAULT NULL,
  `Inspection_call_remark` text,
  `Inspection_clearance_date` varchar(255) DEFAULT NULL,
  `Inspection_clearance_remark` text,
  `Dispatch_clearance_date` varchar(255) DEFAULT NULL,
  `Dispatch_clearance_remark` text,
  `Qty_receipt_at_site` text,
  `Qty_pending` varchar(255) DEFAULT NULL,
  `Supply_completion` varchar(255) DEFAULT NULL,
  `Remark_process` text,
  `ACE_Basic` varchar(255) DEFAULT NULL,
  `Invoice_value` varchar(255) DEFAULT NULL,
  `Order_value` varchar(255) DEFAULT NULL,
  `Cost_saving` varchar(255) DEFAULT NULL,
  `Mfg_clear_date` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `submitted_by` varchar(255) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `pr_no_slno` varchar(255) NOT NULL,
  `item_name_pr` varchar(255) NOT NULL,
  `project_slno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_tracking_tools_m`
--

INSERT INTO `Ilab_master_tracking_tools_m` (`Slno_tracking`, `Job_code`, `Po_no`, `Po_date`, `Date_creation`, `Bg_submission_date`, `Drg_submission_date`, `Advance_payment_date`, `Drg_approval_date`, `Inspection_call_date`, `Inspection_call_remark`, `Inspection_clearance_date`, `Inspection_clearance_remark`, `Dispatch_clearance_date`, `Dispatch_clearance_remark`, `Qty_receipt_at_site`, `Qty_pending`, `Supply_completion`, `Remark_process`, `ACE_Basic`, `Invoice_value`, `Order_value`, `Cost_saving`, `Mfg_clear_date`, `Status`, `Entry_date`, `Update`, `submitted_by`, `pr_no`, `pr_no_slno`, `item_name_pr`, `project_slno`) VALUES
(1, '0770 [ project 1 ]', '345434', '2019-03-28', '2019-03-16', '2019-03-23', '', '2019-03-14', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '2019-03-23', 1, '2019-03-09 10:26:18', '2019-03-09 10:27:24', 'bu1@ilab.com', 'O18191-950-E-K-30101-001', '1', 'TPD for 33KV HT Switch board', '1'),
(2, '0770 [ project 1 ]', '77600', '2019-04-19', '2019-03-29', '2019-03-30', '', '', NULL, '2019-04-16', 'okay', '2019-04-10', 'fine', '2019-04-12', 'complete', '670', '5', '1', 'okay', '9.8', '23000', '8', '5500', '2019-03-31', 2, '2019-03-09 10:46:31', '2019-03-09 10:46:31', 'bu1@ilab.com', 'O18191-950-E-K-30102-001', '2', 'TPD for 33/11 KV ONAN/ONAF Power Transformer ', '1'),
(3, '0770 [ project 1 ]', '55600', '2019-04-11', '2019-04-04', '2019-04-10', '', '6', NULL, '2019-04-19', 'okay', '2019-04-25', 'okay', '2019-04-30', 'okay', '5000', '5', '2', 'okay', '7.9', '567000', '9', '80000', '2019-04-17', 1, '2019-03-09 11:19:42', '2019-03-09 11:19:42', 'bu1@ilab.com', 'O18191-950-E-K-30108-001', '8', 'TPD for 110V DC Battery Bank & battery charger', '1'),
(4, '0770 [ project 1 ]', '8700', '2019-04-30', '2019-04-16', '2019-04-18', '', '9-7-2019', NULL, '2019-03-24', 'okay', '2019-04-17', 'okay', '2019-04-30', 'okay', '7800', '5', '2', 'okay', '9.9', '3500', '8', '7700', '2019-04-27', 2, '2019-03-09 11:24:44', '2019-03-09 11:24:44', 'bu1@ilab.com', 'O18191-950-E-K-30111-001', '11', 'TPD for 415V LT Smart PMCC', '1'),
(5, '0770 [ project 1 ]', '7908', '2019-04-30', '2019-04-30', '2019-04-23', '', '15-7-2019', NULL, '2019-05-22', 'okay', '2019-04-23', 'okay', '2019-04-19', 'okay', '7900', '7', '2', 'okay', '15', '8800', '8', '8900', '2019-05-21', 1, '2019-03-09 11:28:02', '2019-03-09 11:28:02', 'bu1@ilab.com', 'O18191-950-E-K-30113-001', '13', 'TPD for 415V PDB', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_tracking_tools_m_clone`
--

CREATE TABLE `Ilab_master_tracking_tools_m_clone` (
  `Slno_tracking` int(11) NOT NULL,
  `Job_code` varchar(255) DEFAULT NULL,
  `Po_date` varchar(255) DEFAULT NULL,
  `Date_creation` varchar(255) DEFAULT NULL,
  `Bg_submission_date` varchar(255) DEFAULT NULL,
  `Drg_submission_date` varchar(255) DEFAULT NULL,
  `Advance_payment_date` varchar(255) DEFAULT NULL,
  `Drg_approval_date` varchar(255) DEFAULT NULL,
  `Inspection_call_date` varchar(255) DEFAULT NULL,
  `Inspection_call_remark` text,
  `Inspection_clearance_date` varchar(255) DEFAULT NULL,
  `Inspection_clearance_remark` text,
  `Dispatch_clearance_date` varchar(255) DEFAULT NULL,
  `Dispatch_clearance_remark` text,
  `Qty_receipt_at_site` text,
  `Qty_pending` varchar(255) DEFAULT NULL,
  `Supply_completion` varchar(255) DEFAULT NULL,
  `Remark_process` text,
  `ACE_Basic` varchar(255) DEFAULT NULL,
  `Invoice_value` varchar(255) DEFAULT NULL,
  `Order_value` varchar(255) DEFAULT NULL,
  `Cost_saving` varchar(255) DEFAULT NULL,
  `Mfg_clear_date` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `submitted_by` varchar(255) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `pr_no_slno` varchar(255) NOT NULL,
  `item_name_pr` varchar(255) NOT NULL,
  `project_slno` varchar(255) NOT NULL,
  `master_id` int(11) NOT NULL,
  `Po_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_tracking_tools_m_clone`
--

INSERT INTO `Ilab_master_tracking_tools_m_clone` (`Slno_tracking`, `Job_code`, `Po_date`, `Date_creation`, `Bg_submission_date`, `Drg_submission_date`, `Advance_payment_date`, `Drg_approval_date`, `Inspection_call_date`, `Inspection_call_remark`, `Inspection_clearance_date`, `Inspection_clearance_remark`, `Dispatch_clearance_date`, `Dispatch_clearance_remark`, `Qty_receipt_at_site`, `Qty_pending`, `Supply_completion`, `Remark_process`, `ACE_Basic`, `Invoice_value`, `Order_value`, `Cost_saving`, `Mfg_clear_date`, `Status`, `Entry_date`, `Update`, `submitted_by`, `pr_no`, `pr_no_slno`, `item_name_pr`, `project_slno`, `master_id`, `Po_no`) VALUES
(1, '0770 [ project 1 ]', '2019-03-28', '2019-03-16', '', '', '', NULL, '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '2019-03-23', 1, '2019-03-09 10:26:18', '2019-03-09 10:26:18', 'bu1@ilab.com', 'O18191-950-E-K-30101-001', '1', 'TPD for 33KV HT Switch board', '1', 1, '345434'),
(2, '0770 [ project 1 ]', '2019-03-28', '2019-03-16', '', '', '2019-03-14', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '2019-03-23', 1, '2019-03-09 10:26:43', '2019-03-09 10:26:43', 'bu1@ilab.com', 'O18191-950-E-K-30101-001', '1', 'TPD for 33KV HT Switch board', '1', 1, '345434'),
(3, '0770 [ project 1 ]', '2019-03-28', '2019-03-16', '2019-03-23', '', '2019-03-14', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '2019-03-23', 2, '2019-03-09 10:27:24', '2019-03-09 10:27:24', 'bu1@ilab.com', 'O18191-950-E-K-30101-001', '1', 'TPD for 33KV HT Switch board', '1', 1, '345434'),
(4, '0770 [ project 1 ]', '2019-04-19', '2019-03-29', '2019-03-30', '', '', NULL, '2019-04-16', 'okay', '2019-04-10', 'fine', '2019-04-12', 'complete', '670', '5', '1', 'okay', '9.8', '23000', '8', '5500', '2019-03-31', 1, '2019-03-09 10:46:31', '2019-03-09 10:46:31', 'bu1@ilab.com', 'O18191-950-E-K-30102-001', '2', 'TPD for 33/11 KV ONAN/ONAF Power Transformer ', '1', 2, '77600'),
(5, '0770 [ project 1 ]', '2019-04-11', '2019-04-04', '2019-04-10', '', '6', NULL, '2019-04-19', 'okay', '2019-04-25', 'okay', '2019-04-30', 'okay', '5000', '5', '2', 'okay', '7.9', '567000', '9', '80000', '2019-04-17', 2, '2019-03-09 11:19:42', '2019-03-09 11:19:42', 'bu1@ilab.com', 'O18191-950-E-K-30108-001', '8', 'TPD for 110V DC Battery Bank & battery charger', '1', 3, '55600'),
(6, '0770 [ project 1 ]', '2019-04-30', '2019-04-16', '2019-04-18', '', '9-7-2019', NULL, '2019-03-24', 'okay', '2019-04-17', 'okay', '2019-04-30', 'okay', '7800', '5', '2', 'okay', '9.9', '3500', '8', '7700', '2019-04-27', 1, '2019-03-09 11:24:44', '2019-03-09 11:24:44', 'bu1@ilab.com', 'O18191-950-E-K-30111-001', '11', 'TPD for 415V LT Smart PMCC', '1', 4, '8700'),
(7, '0770 [ project 1 ]', '2019-04-30', '2019-04-30', '2019-04-23', '', '15-7-2019', NULL, '2019-05-22', 'okay', '2019-04-23', 'okay', '2019-04-19', 'okay', '7900', '7', '2', 'okay', '15', '8800', '8', '8900', '2019-05-21', 2, '2019-03-09 11:28:02', '2019-03-09 11:28:02', 'bu1@ilab.com', 'O18191-950-E-K-30113-001', '13', 'TPD for 415V PDB', '1', 5, '7908');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vehicle`
--

CREATE TABLE `Ilab_master_vehicle` (
  `Slno_vehicle` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_capacity` varchar(255) NOT NULL,
  `vehicle_desc` text NOT NULL,
  `category_slno` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_vehicle`
--

INSERT INTO `Ilab_master_vehicle` (`Slno_vehicle`, `vehicle_type`, `vehicle_capacity`, `vehicle_desc`, `category_slno`, `status`, `date_entry`, `time_entry`) VALUES
(1, '504ponds', '5ponds', ' tyyy', '3', 2, '2018-10-11', '21:29:54'),
(2, 'vehicle10', '8000ponds', 'XYZ', '3', 2, '2018-10-22', '15:44:52'),
(3, 'vehicle12', '60000ponds', 'abc', '3', 1, '2018-10-22', '15:45:09'),
(4, 'vehicle12', '60000ponds', '12345', '3', 1, '2018-10-22', '15:45:27'),
(5, 'vehicle12', '8000ponds', '3456', '3', 3, '2018-10-22', '15:45:44'),
(6, 'vehicle10', '5ponds', '2345', '3', 1, '2018-10-22', '15:46:01'),
(7, 'vehicle3s', '8000ponds', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '3', 3, '2019-01-18', '18:28:57'),
(8, 'vehicle10', '50s ponds', 'xxxxxx', '3', 1, '2019-01-18', '18:29:37'),
(9, 'vehicle10', '50s ponds', 'xxxxxx', '3', 1, '2019-01-18', '18:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vehicle_capacity`
--

CREATE TABLE `Ilab_master_vehicle_capacity` (
  `Slno_vehicle` int(11) NOT NULL,
  `vehicle_capacity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_vehicle_capacity`
--

INSERT INTO `Ilab_master_vehicle_capacity` (`Slno_vehicle`, `vehicle_capacity`, `status`, `date_entry`, `time_entry`) VALUES
(1, '500ponds', 3, '2018-09-25', '16:34:29'),
(2, '50 ponds', 2, '2018-09-25', '16:35:24'),
(3, '5ponds', 3, '2018-09-25', '16:37:33'),
(4, '8000ponds', 1, '2018-09-25', '16:59:37'),
(5, '60000ponds', 1, '2018-09-26', '15:26:05'),
(12, '50s ponds', 1, '2018-10-11', '21:18:24'),
(13, 'vehicle111211', 1, '2019-01-18', '18:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vehicle_type`
--

CREATE TABLE `Ilab_master_vehicle_type` (
  `Slno_vehicle` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_vehicle_type`
--

INSERT INTO `Ilab_master_vehicle_type` (`Slno_vehicle`, `vehicle_type`, `status`, `date_entry`, `time_entry`) VALUES
(1, 'vehicle3s', 1, '2018-09-25', '16:34:29'),
(2, '504ponds', 1, '2018-09-25', '16:35:24'),
(3, 'vehicle10', 1, '2018-09-25', '16:37:33'),
(4, 'vehicle12', 1, '2018-09-25', '16:59:37'),
(5, 'vehicle2', 3, '2018-09-26', '15:26:05'),
(6, 'vehech', 3, '2018-10-11', '18:01:42'),
(7, 'vehicle13343', 1, '2019-01-18', '17:46:35'),
(8, 'vehic342', 1, '2019-02-20', '15:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vendor_detail`
--

CREATE TABLE `Ilab_master_vendor_detail` (
  `Slno_vendor` int(11) NOT NULL,
  `Vendor_name` varchar(255) NOT NULL,
  `Vendor_email_id` varchar(255) NOT NULL,
  `Mobile_no` varchar(255) NOT NULL,
  `Organisation_name` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Password_hash` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `Date_entry` date NOT NULL,
  `Time_entry` time NOT NULL,
  `Vendor_desc` text NOT NULL,
  `Organisation_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='here vendor list will appear which list';

--
-- Dumping data for table `Ilab_master_vendor_detail`
--

INSERT INTO `Ilab_master_vendor_detail` (`Slno_vendor`, `Vendor_name`, `Vendor_email_id`, `Mobile_no`, `Organisation_name`, `Password`, `Password_hash`, `Status`, `Date_entry`, `Time_entry`, `Vendor_desc`, `Organisation_address`) VALUES
(1, 'vendor 2', 'vender2@ilab.com', '99330', 'vendor 2 pvt ltd', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2019-01-18', '16:56:30', 'teartt', 'wqqwqw'),
(2, 'vendor 1', 'vender@ilab.com', '99330', 'vendor pvt ltd', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2018-09-22', '19:08:40', 'teartt', 'wqqwqw'),
(3, 'ven10', 'ven111@gmail.com', '985676768', 'xyz', '111', '698d51a19d8a121ce581499d7b701668', 3, '2018-09-26', '15:14:25', 'ttt', 'xxxt'),
(4, 'INFOLEX METAMORF ', 'ven121@gmail.com', '76673498510', 'INFOLEX METAMORF BUSINESS SOLUTIONS PRIVATE LIMITED', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2018-09-26', '15:24:14', 'xxxy', 'No.3, 3rd Main, Bahubalinagar, MES Ring Road, Jalahalli Post Bangalore Bangalore KA 560013 IN'),
(5, 'Vendor 4', 'ven221@gmail.com', '8635787011', 'T&T', '5432', '2e92962c0b6996add9517e4242ea9bdc', 1, '2018-11-13', '11:44:36', 'abc', 'Chennai'),
(6, 'Vendor5', 'ven001@gmail.com', '76453892344', 'WWPE', '4444', 'dbc4d84bfcfe2284ba11beffb853a8c4', 1, '2018-11-13', '11:46:49', 'xxxc', 'odisha'),
(7, 'Vendor 7', 'ven310@yahoo.com', '7767443790', 'ipts', '567', '99c5e07b4d5de9d18c350cdf64c5aa3d', 1, '2018-11-13', '11:48:12', 'vvvy', 'Jharkhand'),
(8, 'Vendors10', 'ven1011@yahoo.com', '74683983390', 'GTPS', '9990', 'a8eaf88e26451020bf62ab0bc441ec13', 1, '2018-11-13', '11:49:32', 'tttz', 'Mumbai'),
(9, 'Vendor 13', 'ven331@gmail.com', '738985412', 'P&G', '747', '8d317bdcf4aafcfc22149d77babee96d', 1, '2018-11-13', '11:52:34', 'aaac', 'BBSR'),
(10, 'Vendor779', 'ven97@gmail.com', '7437878342', 'AATG', '8888', 'cf79ae6addba60ad018347359bd144d2', 1, '2018-11-13', '11:54:37', 'cvcd', 'ctc'),
(11, 'Vendor55', 'ven979@yahoo.com', '7564566850', 'DDTC', '7771', 'cd81cfd0a3397761fac44ddbe5ec3349', 1, '2018-11-13', '12:07:01', 'gtch', 'RNC'),
(12, 'Vendor11', 'ven90@gmail.com', '8576902112', 'TTS', '555', '15de21c670ae7c3f6f3f1f37029303c9', 1, '2018-11-13', '12:12:29', 'vvs', 'BBSR'),
(13, 'Vendor31', 'ven66@gmail.com', '656349001', 'UTPS', '5557', '73f715c6cc2b110fc67503ba813f7f0e', 1, '2018-11-13', '12:20:40', 'DCH', 'CTC'),
(14, 'Vendor21', 'ven371@yahoo.com', '743578980', 'LGP', '779', '67d96d458abdef21792e6d8e590244e7', 1, '2018-11-13', '13:19:25', 'ttc', 'CTC'),
(15, 'Vendors11', 'ven170@yahoo.com', '74657390', 'C&Z', '7100', '9d94c8981a48d12adfeecfe1ae6e0ec1', 1, '2018-11-13', '13:22:56', 'vvvvn', 'BBSR'),
(16, 'veh1231', 'ven454@yahoo.com', '86578757500', 'xxxx1', 'xxx', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 1, '2019-01-18', '16:55:33', 'xxxxxxx', 'xxxx1211');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vendor_file_token`
--

CREATE TABLE `Ilab_master_vendor_file_token` (
  `slno_tech_file` int(11) NOT NULL,
  `token_id` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_attach` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_entry` date NOT NULL,
  `time_entry` time NOT NULL,
  `bid_user_slno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vendor_notifications`
--

CREATE TABLE `Ilab_master_vendor_notifications` (
  `slno_approve` int(11) NOT NULL,
  `vendor_id_bid` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `date_entry` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view_status` int(11) NOT NULL DEFAULT '0' COMMENT '0->not view 1->view',
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_master_vendor_notifications`
--

INSERT INTO `Ilab_master_vendor_notifications` (`slno_approve`, `vendor_id_bid`, `vendor_id`, `date_entry`, `date_update`, `view_status`, `message`) VALUES
(1, '3', 'ven121@gmail.com', '2019-01-28 11:36:47', '2019-01-28 11:38:19', 1, 'BID'),
(2, '5', 'ven310@yahoo.com', '2019-01-28 11:36:47', '2019-01-29 12:41:53', 1, 'BID'),
(3, '7', 'ven66@gmail.com', '2019-01-28 11:36:48', '2019-01-29 11:39:45', 1, 'BID'),
(4, '8', 'ven371@yahoo.com', '2019-01-28 11:36:48', '2019-01-29 12:52:22', 1, 'BID'),
(5, '12', 'ven121@gmail.com', '2019-01-28 12:13:05', '2019-01-28 13:49:38', 1, 'bid closed'),
(6, '17', 'ven97@gmail.com', '2019-01-28 12:13:05', '2019-01-29 11:30:50', 1, 'bid closed'),
(7, '18', 'ven979@yahoo.com', '2019-01-28 12:13:06', '2019-01-29 12:59:57', 1, 'bid closed'),
(8, '21', 'ven371@yahoo.com', '2019-01-28 12:13:06', '2019-01-29 12:52:17', 1, 'bid closed'),
(9, '25', 'ven121@gmail.com', '2019-01-28 14:48:33', '2019-01-28 14:49:24', 1, 'BID END'),
(10, '42', 'ven97@gmail.com', '2019-01-29 13:15:29', '2019-01-29 13:15:29', 0, 'bid final'),
(11, '43', 'ven979@yahoo.com', '2019-01-29 13:15:29', '2019-01-29 13:27:54', 1, 'bid final'),
(12, '44', 'ven66@gmail.com', '2019-01-29 13:15:29', '2019-01-31 12:03:20', 1, 'bid final'),
(13, '37', 'ven121@gmail.com', '2019-01-29 13:22:00', '2019-01-29 13:22:48', 1, 'bid auction work over'),
(14, '42', 'ven97@gmail.com', '2019-01-29 13:22:00', '2019-01-29 13:22:00', 0, 'bid auction work over'),
(15, '43', 'ven979@yahoo.com', '2019-01-29 13:22:00', '2019-01-29 13:27:48', 1, 'bid auction work over'),
(16, '44', 'ven66@gmail.com', '2019-01-29 13:22:00', '2019-01-31 12:03:32', 1, 'bid auction work over'),
(17, '45', 'ven371@yahoo.com', '2019-01-29 13:22:00', '2019-01-29 13:22:00', 0, 'bid auction work over'),
(18, '65', 'ven121@gmail.com', '2019-01-30 06:43:34', '2019-01-30 06:52:08', 1, 'bid final'),
(19, '122', 'ven121@gmail.com', '2019-01-30 08:10:09', '2019-01-30 08:10:34', 1, 'bid close'),
(20, '135', 'ven121@gmail.com', '2019-01-31 06:13:46', '2019-01-31 06:33:47', 1, 'bid close'),
(21, '135', 'ven121@gmail.com', '2019-01-31 06:30:41', '2019-01-31 06:33:41', 1, 'bid final'),
(22, '135', 'ven121@gmail.com', '2019-01-31 06:30:54', '2019-01-31 06:33:31', 1, 'bid final'),
(23, '148', 'ven121@gmail.com', '2019-01-31 07:11:15', '2019-01-31 07:12:10', 1, 'bid close'),
(24, '148', 'ven121@gmail.com', '2019-01-31 07:16:55', '2019-01-31 07:18:28', 1, 'bid close'),
(25, '109', 'ven121@gmail.com', '2019-01-31 10:38:34', '2019-01-31 10:41:45', 1, 'bid close'),
(26, '109', 'ven121@gmail.com', '2019-01-31 10:40:16', '2019-01-31 10:41:51', 1, 'bid  final '),
(27, '161', 'ven121@gmail.com', '2019-01-31 13:16:24', '2019-01-31 13:25:44', 1, 'A Rank order reverse auction shall be conducted for the bid no  600 dated on 01/31/2019 6:44 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(28, '175', 'ven121@gmail.com', '2019-01-31 13:22:33', '2019-01-31 13:25:39', 1, 'A Rank order reverse auction shall be conducted for the bid no  670 dated on 01/31/2019 6:51 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(29, '189', 'ven121@gmail.com', '2019-01-31 13:23:17', '2019-01-31 13:25:31', 1, 'A Rank order reverse auction shall be conducted for the bid no  99 dated on 01/31/2019 6:52 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(30, '161', 'ven121@gmail.com', '2019-02-20 09:19:15', '2019-02-20 10:11:08', 1, 'A Rank order reverse auction shall be conducted for the bid no  600 dated on 01/31/2019 6:44 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(31, '74', 'ven121@gmail.com', '2019-02-20 10:09:31', '2019-02-20 10:09:31', 0, 'txy'),
(32, '203', 'ven121@gmail.com', '2019-02-20 12:24:47', '2019-02-20 12:24:47', 0, 'A Rank order reverse auction shall be conducted for the bid no  8700 dated on 02/20/2019 5:53 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(33, '161', 'ven121@gmail.com', '2019-03-01 12:52:04', '2019-03-01 12:52:04', 0, 'A Rank order reverse auction shall be conducted for the bid no  600 dated on 01/31/2019 6:44 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(34, '161', 'ven121@gmail.com', '2019-03-01 12:52:52', '2019-03-01 12:52:52', 0, 'A Rank order reverse auction shall be conducted for the bid no  600 dated on 01/31/2019 6:44 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(35, '175', 'ven121@gmail.com', '2019-03-01 12:56:38', '2019-03-01 12:56:38', 0, 'A Rank order reverse auction shall be conducted for the bid no  670 dated on 01/31/2019 6:51 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(36, '203', 'ven121@gmail.com', '2019-03-01 13:00:00', '2019-03-01 13:00:00', 0, 'A Rank order reverse auction shall be conducted for the bid no  8700 dated on 02/20/2019 5:53 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no '),
(37, '161', 'ven121@gmail.com', '2019-03-12 05:20:52', '2019-03-12 05:20:52', 0, 'A Rank order reverse auction shall be conducted for the bid no  600 dated on 01/31/2019 6:44 PM you are requested to participate. <br> <p>For any query send your queries accross ther application no ');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_master_vendor_tech_token_bid`
--

CREATE TABLE `Ilab_master_vendor_tech_token_bid` (
  `Slno_token` int(11) NOT NULL,
  `token_no` varchar(255) NOT NULL,
  `bid_id_vendor` varchar(255) NOT NULL,
  `master_bid_id` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `submitted_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-for not submitted 1-submitted 5-update submission',
  `date_creation` date NOT NULL,
  `date_updation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_pms_log_entries`
--

CREATE TABLE `Ilab_pms_log_entries` (
  `Slno` int(11) NOT NULL,
  `Form_name` varchar(255) NOT NULL,
  `Data_entry` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Location_Id` varchar(255) NOT NULL,
  `browser_information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_pms_log_entries`
--

INSERT INTO `Ilab_pms_log_entries` (`Slno`, `Form_name`, `Data_entry`, `status`, `Date`, `Time`, `Location_Id`, `browser_information`) VALUES
(1, 'User_Entry_Form', '{\"email_id\":\"sam@ilab.com\",\"Username\":\"sam\",\"Password\":\"1234Ars2\",\"password_hash\":\"b637b89ccae8a537eeb3b64cd57be090\",\"Status\":1,\"role_id\":\"2\",\"user_mobile\":\"7412365890\",\"user_degination\":\"user\"}', 1, '2018-09-04', '20:20:12', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(2, 'update users password', '{\"data_insert\":\"{\\\"Password\\\":\\\"abcd!2345aA\\\",\\\"password_hash\\\":\\\"f2189e3b6b4807018b83f3540e8bc4bf\\\"}\",\"update_id\":\"{\\\"slno\\\":\\\"6\\\"}\"}', 1, '2018-09-05', '19:15:03', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(3, 'User_Entry_Form', '{\"email_id\":\"bu1@ilab.com\",\"Username\":\"bu user1\",\"Password\":\"Abcd1234\",\"password_hash\":\"325a2cc052914ceeb8c19016c091d2ac\",\"Status\":1,\"role_id\":\"6\",\"user_mobile\":\"1234567890\",\"user_degination\":\"bu user\"}', 1, '2018-09-07', '15:54:26', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(4, 'User_Entry_Form', '{\"email_id\":\"bu2@ilab.com\",\"Username\":\"bu user2\",\"Password\":\"ABcd1234\",\"password_hash\":\"bb4e90a7639add09cf8629499638760c\",\"Status\":1,\"role_id\":\"6\",\"user_mobile\":\"2314567890\",\"user_degination\":\"bu user\"}', 1, '2018-09-07', '15:55:13', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(5, 'User_Entry_Form', '{\"email_id\":\"design!@ilab.com\",\"Username\":\"design user 1\",\"Password\":\"A12345678b\",\"password_hash\":\"4af25c60a5017ac5833227804b04551a\",\"Status\":1,\"role_id\":\"2\",\"user_mobile\":\"2345678910\",\"user_degination\":\"design user\"}', 1, '2018-09-08', '16:45:21', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(6, 'User_Entry_Form', '{\"email_id\":\"design2@ilab.com\",\"Username\":\"design user 2\",\"Password\":\"12345678Ab\",\"password_hash\":\"2a4a3ea4095c1f5453b5463c3a746c99\",\"Status\":1,\"role_id\":\"2\",\"user_mobile\":\"3456789012\",\"user_degination\":\"design user\"}', 1, '2018-09-08', '16:48:54', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(7, 'User_Entry_Form', '{\"email_id\":\"project1@ilab.com\",\"Username\":\"project user 1\",\"Password\":\"123456789Ab\",\"password_hash\":\"d1bfa0b6240156b7972de61f67a1e632\",\"Status\":1,\"role_id\":\"3\",\"user_mobile\":\"4567890123\",\"user_degination\":\"project user\"}', 1, '2018-09-08', '16:50:09', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(8, 'User_Entry_Form', '{\"email_id\":\"project2@ilab.com\",\"Username\":\"project user 2\",\"Password\":\"12345678Ab\",\"password_hash\":\"2a4a3ea4095c1f5453b5463c3a746c99\",\"Status\":1,\"role_id\":\"3\",\"user_mobile\":\"5678901234\",\"user_degination\":\"project user\"}', 1, '2018-09-08', '16:51:21', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(9, 'User_Entry_Form', '{\"email_id\":\"pro@ilab.com1\",\"Username\":\"procurement user 1\",\"Password\":\"123456789Abc\",\"password_hash\":\"e636ecc38ae7ffa94006a13408d673db\",\"Status\":1,\"role_id\":\"4\",\"user_mobile\":\"7895432105\",\"user_degination\":\"procurement\"}', 1, '2018-09-08', '16:54:00', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(10, 'User_Entry_Form', '{\"email_id\":\"pro2@ilab.com1\",\"Username\":\"procurement user 2\",\"Password\":\"12345abcA\",\"password_hash\":\"7f3efd1261d5e49fa2423f2b2cc8cf9e\",\"Status\":1,\"role_id\":\"4\",\"user_mobile\":\"9876543210\",\"user_degination\":\"procurement\"}', 1, '2018-09-08', '16:55:11', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(11, 'User_Entry_Form', '{\"email_id\":\"buy1@ilab.com\",\"Username\":\"buyer 1\",\"Password\":\"1234567890Ab\",\"password_hash\":\"c0d7659e35f9e7b793c4257d565e7390\",\"Status\":1,\"role_id\":\"7\",\"user_mobile\":\"8978564210\",\"user_degination\":\"buyser\"}', 1, '2018-09-08', '17:04:38', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(12, 'User_Entry_Form', '{\"email_id\":\"buy2@ilab.com\",\"Username\":\"buyer 2\",\"Password\":\"123456789Ab\",\"password_hash\":\"d1bfa0b6240156b7972de61f67a1e632\",\"Status\":1,\"role_id\":\"7\",\"user_mobile\":\"4567933580\",\"user_degination\":\"buyer\"}', 1, '2018-09-08', '17:09:10', '127.0.0.1', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(13, 'Project Entry Form', '{\"Project_Name\":\"project management\",\"job_Code\":\"job21\",\"Date_Start\":\"2018-10-31\",\"Customer_Name\":\"sipra\",\"Customer_Mobile_No\":\"9776069881\",\"project_Description\":\"project incharege\",\"status\":\"1\",\"Date_Entry\":\"2018-09-11\",\"Time_Entry\":\"16:29:10\"}', 1, '2018-09-11', '16:29:10', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(14, 'Project Entry Form', '{\"Project_Name\":\"project management\",\"job_Code\":\"0774\",\"Date_Start\":\"2018-09-30\",\"Customer_Name\":\"sipra\",\"Customer_Mobile_No\":\"9776069881\",\"project_Description\":\"test\",\"status\":\"1\",\"Date_Entry\":\"2018-09-11\",\"Time_Entry\":\"16:41:13\"}', 1, '2018-09-11', '16:41:13', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(15, 'Project Entry Form', '{\"Project_Name\":\"project management\",\"job_Code\":\"07744\",\"Date_Start\":\"2018-09-30\",\"Customer_Name\":\"sipra\",\"Customer_Mobile_No\":\"9776069881\",\"project_Description\":\"wwww\",\"status\":\"1\",\"Date_Entry\":\"2018-09-11\",\"Time_Entry\":\"20:03:43\"}', 1, '2018-09-11', '20:03:43', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(16, 'Project Entry Form', '{\"Project_Name\":\"project management\",\"job_Code\":\"07746\",\"Date_Start\":\"2018-09-29\",\"Customer_Name\":\"sipra\",\"Customer_Mobile_No\":\"9776069881\",\"project_Description\":\"666\",\"status\":\"1\",\"Date_Entry\":\"2018-09-11\",\"Time_Entry\":\"20:05:29\"}', 1, '2018-09-11', '20:05:29', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(17, 'Project Entry Form', '{\"Project_Name\":\"project management d\",\"job_Code\":\"0770ee\",\"Date_Start\":\"2018-09-30\",\"Customer_Name\":\"sipradd\",\"Customer_Mobile_No\":\"9776069881\",\"project_Description\":\"jjjjj\",\"status\":\"1\",\"Date_Entry\":\"2018-09-11\",\"Time_Entry\":\"20:13:26\"}', 1, '2018-09-11', '20:13:26', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(18, 'Project Entry Form', '{\"Project_Name\":\"project management me\",\"job_Code\":\"12345\",\"Date_Start\":\"2018-09-29\",\"Customer_Name\":\"sipradd\",\"Customer_Mobile_No\":\"9776069881\",\"project_Description\":\"Breaking the Affordability Barrier\\r\\n\\r\\nWith over 4 billion people around the globe still not connected to the internet, affordability remains a key challenge. We break the affordability barrier with the world\'s most affordable tablets, phablets and smartphones\",\"status\":\"1\",\"Date_Entry\":\"2018-09-12\",\"Time_Entry\":\"19:45:12\"}', 1, '2018-09-12', '19:45:12', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"61.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko\\/20100101 Firefox\\/61.0\"}'),
(19, 'User_Entry_Form', '{\"section_Name\":\"xyz\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-14\",\"Time_Entry\":\"21:35:46\"}', 1, '2018-09-14', '21:35:46', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(20, 'section entry', '{\"section_Name\":\"section 1\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-15\",\"Time_Entry\":\"13:06:47\"}', 1, '2018-09-15', '13:06:47', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(21, 'section entry', '{\"section_Name\":\"activity 1\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-15\",\"Time_Entry\":\"15:50:18\"}', 1, '2018-09-15', '15:50:18', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(22, 'activity entry', '{\"Activity_Name\":\"\'activity\'\",\"Activity_Description\":\"\'Director : Bhaskar Producer : Nagendra Babu Music Director : Harris Jayaraj Lyricst : Surendra Krishna, Kedarnath, Vanamali, Ramajogaya Sastry Cast : Ram Charan Teja, Genelia D\\\\\'Souza, Shazahn Padamsee, Sanchita Shetty\'\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-15\",\"Time_Entry\":\"16:00:27\"}', 1, '2018-09-15', '16:00:27', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(23, 'activity entry', '{\"Activity_Name\":\"activity 1\",\"Activity_Description\":\"I already have XSS enabled by default in configuration.\\r\\n\\r\\nThank you for your patience. But still, this not resolves unescaped chars in my value, is it?\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-15\",\"Time_Entry\":\"16:05:10\"}', 1, '2018-09-15', '16:05:10', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(24, 'activity edit', '{\"date_change\":{\"Activity_Name\":\"activitys\",\"Activity_Description\":\"I already have XSS enabled by default in configuration.\\r\\n\\r\\nThank you for your patience. But still, this not resolves unescaped chars in my value, is it?\"},\"$data_id\":{\"Activity_Slno\":\"2\"}}', 1, '2018-09-17', '14:03:23', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(25, 'section entry', '{\"section_Name\":\"\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-18\",\"Time_Entry\":\"12:52:03\"}', 1, '2018-09-18', '12:52:03', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(26, 'Category entry', '{\"category_name\":\"standard catalogued item\",\"category_id\":\"cat001\",\"category_desc\":\"A cataloger is an individual responsible for the processes of description, subject analysis, classification, and authority control of library materials. Catalogers serve as the \\\"foundation of all library service, as they are the ones who organize information in such a way as to make it easily accessible\\\"\",\"short_code\":\"sci\",\"status\":\"1\",\"date_entry\":\"2018-09-18\",\"time_entry\":\"13:06:40\"}', 1, '2018-09-18', '13:06:40', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(27, 'Category update', '{\"data_change\":{\"category_name\":\"standard catalogued item\",\"category_id\":\"cat001\",\"category_desc\":\"A cataloger is an individual responsible for the processes of description, subject analysis, classification, and authority control of library materials. Catalogers serve as the \\\"foundation of all library service, as they are the ones who organize information in such a way as to make it easily accessible\\\"\",\"short_code\":\"sci\"},\"data_id\":{\"Slno_cat\":\"1\"}}', 1, '2018-09-18', '16:39:28', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(28, 'Category update', '{\"data_change\":{\"category_name\":\"standard catalogued item\",\"category_id\":\"cat001\",\"category_desc\":\"A cataloger is an individual responsible for the processes of description, subject analysis, classification, and authority control of library materials. Catalogers serve as the \\\"foundation of all library service, as they are the ones who organize information in such a way as to make it easily accessible\\\"\",\"short_code\":\"sci tech\"},\"data_id\":{\"Slno_cat\":\"1\"}}', 1, '2018-09-18', '16:39:40', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(29, 'Category entry', '{\"category_name\":\"make to order items\",\"category_id\":\"cat002\",\"category_desc\":\"The make to order (MTO) strategy only manufactures the end product once the customer places the order, creating additional wait time for the consumer to receive the product, but allowing for more flexible customization compared to purchasing directly from retailers\' shelves.\\r\\n\\r\\nRead more: Make To Order (MTO) https:\\/\\/www.investopedia.com\\/terms\\/m\\/make-to-order.asp#ixzz5RS3c3b1d\\r\\nFollow us: Investopedia on Facebook\",\"short_code\":\"moi\",\"status\":\"1\",\"date_entry\":\"2018-09-18\",\"time_entry\":\"16:52:56\"}', 1, '2018-09-18', '16:52:56', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(30, 'Category entry', '{\"category_name\":\"logistics\",\"category_id\":\"cat003\",\"category_desc\":\"Logistics is generally the detailed organization and implementation of a complex operation. In a general business sense, logistics is the management of the flow of things between the point of origin and the point of consumption in order to meet requirements of customers or corporations.\",\"short_code\":\"logistics\",\"status\":\"1\",\"date_entry\":\"2018-09-18\",\"time_entry\":\"16:54:45\"}', 1, '2018-09-18', '16:54:45', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(31, 'other charges entry', '{\"Charges_name\":\"freight Charges\",\"description_charge\":\"\",\"charge_value\":\"\",\"status\":\"1\",\"date_entry\":\"2018-09-20\",\"time_entry\":\"14:15:49\"}', 1, '2018-09-20', '14:15:49', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(32, 'other charge update', '{\"data_change\":{\"Charges_name\":\"freight Charge\"},\"data_id\":{\"Slno_other\":\"1\"}}', 1, '2018-09-20', '15:32:09', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(33, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"xyz\",\"item_id\":\"11\",\"item_detail\":\"abc\",\"item_uom\":\"20\",\"category_id\":\"cat001\",\"category_name\":\"cat001\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"15:39:45\"}', 1, '2018-09-21', '15:39:45', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(34, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"material item 1\",\"item_id\":\"mat001\",\"item_detail\":\"about testing material present\",\"item_uom\":\"nos\",\"category_id\":\"cat001\",\"category_name\":\"cat001\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"15:46:43\"}', 1, '2018-09-21', '15:46:43', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(35, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"1\",\"item_name\":\"xyz\",\"item_id\":\"11\",\"item_detail\":\"abc\",\"item_uom\":\"20\",\"category_id\":\"\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"18:20:55\"},\"data_id\":{\"Slno_item\":\"1\"}}', 1, '2018-09-21', '18:20:55', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(36, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"1\",\"item_name\":\"xyz\",\"item_id\":\"mat008\",\"item_detail\":\"abc\",\"item_uom\":\"20\",\"category_id\":\"cat001\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"18:21:33\"},\"data_id\":{\"Slno_item\":\"1\"}}', 1, '2018-09-21', '18:21:33', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(37, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"1\",\"item_name\":\"xyz\",\"item_id\":\"mat009\",\"item_detail\":\"abc\",\"item_uom\":\"20\",\"category_id\":\"\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"18:21:54\"},\"data_id\":{\"Slno_item\":\"1\"}}', 1, '2018-09-21', '18:21:54', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(38, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"2\",\"item_name\":\"material2\",\"item_id\":\"101\",\"item_detail\":\"xxx\",\"item_uom\":\"240\",\"category_id\":\"cat002\",\"category_name\":\"make to order items\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"18:22:01\"},\"data_id\":{\"Slno_item\":\"1\"}}', 1, '2018-09-21', '18:22:01', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(39, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"3\",\"item_name\":\"material2\",\"item_id\":\"101\",\"item_detail\":\"xxx\",\"item_uom\":\"240\",\"category_id\":\"cat003\",\"category_name\":\"logistics\",\"status\":\"1\",\"date_entry\":\"2018-09-21\",\"time_entry\":\"18:24:34\"},\"data_id\":{\"Slno_item\":\"1\"}}', 1, '2018-09-21', '18:24:34', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(40, 'Vendors Entery Form', '{\"Vendor_name\":\"vendor 1\",\"Vendor_email_id\":\"vender@ilab.com\",\"Mobile_no\":\"99330\",\"Organisation_name\":\"vendor pvt ltd\",\"Password\":\"2203\",\"Password_hash\":\"2d969e2cee8cfa07ce7ca0bb13c7a36d\",\"Status\":1,\"Date_entry\":\"2018-09-22\",\"Time_entry\":\"19:05:03\",\"Vendor_desc\":\"tesrt\",\"Organisation_address\":\"tesr\"}', 1, '2018-09-22', '19:05:03', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(41, 'Vendors Entery Form', '{\"Vendor_name\":\"VENDOR2\",\"Vendor_email_id\":\"ven11@gmail.com\",\"Mobile_no\":\"987664467\",\"Organisation_name\":\"xxx\",\"Password\":\"1234\",\"Password_hash\":\"81dc9bdb52d04dc20036dbd8313ed055\",\"Status\":1,\"Date_entry\":\"2018-09-22\",\"Time_entry\":\"19:05:14\",\"Vendor_desc\":\"XYZ\",\"Organisation_address\":\"BBSR\"}', 1, '2018-09-22', '19:05:14', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(42, 'Vendors Entery Form', '{\"Vendor_name\":\"vendor 1\",\"Vendor_email_id\":\"vender@ilab.com\",\"Mobile_no\":\"99330\",\"Organisation_name\":\"vendor pvt ltd\",\"Password\":\"1234\",\"Password_hash\":\"81dc9bdb52d04dc20036dbd8313ed055\",\"Status\":1,\"Date_entry\":\"2018-09-22\",\"Time_entry\":\"19:08:08\",\"Vendor_desc\":\"teartt\",\"Organisation_address\":\"wqqwqw\"}', 1, '2018-09-22', '19:08:08', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(43, 'Vendors Entery Form', '{\"Vendor_name\":\"vendor 1\",\"Vendor_email_id\":\"vender@ilab.com\",\"Mobile_no\":\"99330\",\"Organisation_name\":\"vendor pvt ltd\",\"Password\":\"1234\",\"Password_hash\":\"81dc9bdb52d04dc20036dbd8313ed055\",\"Status\":1,\"Date_entry\":\"2018-09-22\",\"Time_entry\":\"19:08:40\",\"Vendor_desc\":\"teartt\",\"Organisation_address\":\"wqqwqw\"}', 1, '2018-09-22', '19:08:40', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(44, 'Technical Entery Form', '{\"technical_name\":\"technical 1\",\"technical_desc\":\"The Tecno Camon I comes with a 5.65 inches touchscreen HD+ IPS display and features a 3 GB RAM along with a 32 GB internal memory. It features a Quad Core 1.25 GHz Processor for all the processing power. The phone is also decked with a 13 MP Camera with LED Flash for your images and videos. For power, the Phone relies on a 3050 mAh Li-Ion battery to give you that extra juice and power when you are on your phone.\",\"technical_id\":\"techid001\",\"category_slno\":\"cat001\",\"status\":1,\"date_entry\":\"2018-09-24\",\"time_entry\":\"12:47:51\"}', 1, '2018-09-24', '12:47:51', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(45, 'material item entry', '{\"Category_slno\":\"2\",\"item_name\":\"Pump\",\"item_id\":\"Mat001\",\"item_detail\":\"Submersible Pump\",\"item_uom\":\"Horse Power\",\"category_id\":\"cat002\",\"category_name\":\"make to order items\",\"status\":\"1\",\"date_entry\":\"2018-09-24\",\"time_entry\":\"15:55:07\"}', 1, '2018-09-24', '15:55:07', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(46, 'material item entry', '{\"Category_slno\":\"2\",\"item_name\":\"Rotary lobe pump\",\"item_id\":\"Mat002\",\"item_detail\":\"Pump complete with drive motor, reduction gear system, clutch and base plate\\r\\n Housing material AISI-316 or AISI 420, rotary piston and shaft seals made of NBR, EPDM or FKM\\r\\n  Constant i.e. non-pulsing feed rates\\r\\n  Valveless construction enables reversed pump direction\\r\\n  Different versions of power end\\/drive via three-phase   motor (On\\/Off mode, adjustable motor with integrated frequency converter or external fan)\\r\\n Connection to bus system is possible (integrated frequency converter needed)\\r\\n Hydraulic connection as standard by means of DIN flange (DN 50, 65, 80, 100, 125), other connectors available\\r\\n Simple replacement of wear discs thanks to   maintenance-friendly construction\",\"item_uom\":\"Max Pump volume\",\"category_id\":\"cat002\",\"category_name\":\"make to order items\",\"status\":\"1\",\"date_entry\":\"2018-09-24\",\"time_entry\":\"16:03:37\"}', 1, '2018-09-24', '16:03:37', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(47, 'material item entry', '{\"Category_slno\":\"2\",\"item_name\":\"Progressing cavity pump.\",\"item_id\":\"Mat003\",\"item_detail\":\"A progressive cavity pump is a type of positive displacement pump and is also known as a progressing cavity pump, progg cavity pump, eccentric screw pump or cavity pump. It transfers fluid by means of the progress, through the pump, of a sequence of small, fixed shape, discrete cavities, as its rotor is turned. This leads to the volumetric flow rate being proportional to the rotation rate (bidirectionally) and to low levels of shearing being applied to the pumped fluid.\",\"item_uom\":\"Capacity\",\"category_id\":\"cat002\",\"category_name\":\"make to order items\",\"status\":\"1\",\"date_entry\":\"2018-09-24\",\"time_entry\":\"16:10:38\"}', 1, '2018-09-24', '16:10:38', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(48, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"3\",\"item_name\":\"material2f\",\"item_id\":\"101\",\"item_detail\":\"xxx\",\"item_uom\":\"240\",\"category_id\":\"\",\"category_name\":\"logistics\",\"status\":\"1\",\"date_entry\":\"2018-09-24\",\"time_entry\":\"16:32:43\"},\"data_id\":{\"Slno_item\":\"1\"}}', 1, '2018-09-24', '16:32:43', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(49, 'Technical Entery Form', '{\"technical_name\":\"316L\",\"technical_desc\":\"316L stainless steel head and casing\",\"technical_id\":\"Tech001\",\"category_slno\":\"2\",\"status\":1,\"date_entry\":\"2018-09-24\",\"time_entry\":\"16:51:14\",\"material_slno\":\"undefined\"}', 1, '2018-09-24', '16:51:14', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(50, 'Technical Update Form', '{\"updated_data\":{\"technical_name\":\"316Ls\",\"technical_desc\":\"316L stainless steel head and casing\",\"technical_id\":\"Tech001\",\"category_slno\":\"2\",\"status\":1,\"date_entry\":\"2018-09-25\",\"time_entry\":\"13:13:11\",\"material_slno\":\"3\"},\"updated_id\":{\"Slno_technical\":\"1\"}}', 1, '2018-09-25', '13:13:11', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(51, 'Technical Update Form', '{\"updated_data\":{\"technical_name\":\"316Ls\",\"technical_desc\":\"316L stainless steel head and casing\",\"technical_id\":\"Tech001\",\"category_slno\":\"2\",\"status\":1,\"date_entry\":\"2018-09-25\",\"time_entry\":\"13:13:22\",\"material_slno\":\"4\"},\"updated_id\":{\"Slno_technical\":\"1\"}}', 1, '2018-09-25', '13:13:22', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(52, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle1\",\"vehicle_capacity\":\"5000ponds\",\"vehicle_desc\":\"xxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-09-25\",\"time_entry\":\"16:34:29\"}', 1, '2018-09-25', '16:34:29', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(53, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle1\",\"vehicle_capacity\":\"5000ponds\",\"vehicle_desc\":\"xxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-09-25\",\"time_entry\":\"16:35:24\"}', 1, '2018-09-25', '16:35:24', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(54, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle1\",\"vehicle_capacity\":\"5000ponds\",\"vehicle_desc\":\"xxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-09-25\",\"time_entry\":\"16:37:33\"}', 1, '2018-09-25', '16:37:33', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(55, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle1\",\"vehicle_capacity\":\"5000ponds\",\"vehicle_desc\":\"xxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-09-25\",\"time_entry\":\"16:59:37\"}', 1, '2018-09-25', '16:59:37', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(56, 'User_Entry_Form', '{\"email_id\":\"abc2@gmail.com\",\"Username\":\"user1\",\"Password\":\"121Aa111\",\"password_hash\":\"9c4ee8fb6bfd3755eabc1437ac0ccdaa\",\"Status\":1,\"role_id\":\"7\",\"user_mobile\":\"87678\",\"user_degination\":\"designation1\"}', 1, '2018-09-26', '14:44:20', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(57, 'update users password', '{\"data_insert\":\"{\\\"Password\\\":\\\"111Aa111\\\",\\\"password_hash\\\":\\\"6b3c06db02609285b33b732fc57a0352\\\"}\",\"update_id\":\"{\\\"slno\\\":\\\"6\\\"}\"}', 1, '2018-09-26', '14:45:31', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(58, 'Project Entry Form', '{\"Project_Name\":\"pro1\",\"job_Code\":\"111\",\"Date_Start\":\"2018-09-18\",\"Customer_Name\":\"cust1\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"xxx\",\"status\":\"1\",\"Date_Entry\":\"2018-09-26\",\"Time_Entry\":\"14:55:15\"}', 1, '2018-09-26', '14:55:15', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(59, 'section entry', '{\"section_Name\":\"section2\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-26\",\"Time_Entry\":\"14:58:49\"}', 1, '2018-09-26', '14:58:49', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(60, 'activity entry', '{\"Activity_Name\":\"activity10\",\"Activity_Description\":\"xxx\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-26\",\"Time_Entry\":\"15:00:18\"}', 1, '2018-09-26', '15:00:18', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(61, 'activity edit', '{\"date_change\":{\"Activity_Name\":\"\'activity\'\",\"Activity_Description\":\"\'Director : Bhaskar Producer : Nagendra Babu Music Director : Harris Jayaraj Lyricst : Surendra Krishna, Kedarnath, Vanamali, Ramajogaya Sastry Cast : Ram Charan Teja, Genelia D\\\\\'Souza, Shazahn Padamsee, Sanchita Shetty\'\"},\"$data_id\":{\"Activity_Slno\":\"1\"}}', 1, '2018-09-26', '15:00:40', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(62, 'activity edit', '{\"date_change\":{\"Activity_Name\":\"\'activity1\'\",\"Activity_Description\":\"\'Director : Bhaskar Producer : Nagendra Babu Music Director : Harris Jayaraj Lyricst : Surendra Krishna, Kedarnath, Vanamali, Ramajogaya Sastry Cast : Ram Charan Teja, Genelia D\\\\\'Souza, Shazahn Padamsee, Sanchita Shetty\'\"},\"$data_id\":{\"Activity_Slno\":\"1\"}}', 1, '2018-09-26', '15:01:05', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(63, 'Category entry', '{\"category_name\":\"cat2\",\"category_id\":\"cat111\",\"category_desc\":\"xxx\",\"short_code\":\"ct1\",\"status\":\"1\",\"date_entry\":\"2018-09-26\",\"time_entry\":\"15:06:48\"}', 1, '2018-09-26', '15:06:48', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(64, 'Category update', '{\"data_change\":{\"category_name\":\"standard catalogued item\",\"category_id\":\"cat005\",\"category_desc\":\"A cataloger is an individual responsible for the processes of description, subject analysis, classification, and authority control of library materials. Catalogers serve as the \\\"foundation of all library service, as they are the ones who organize information in such a way as to make it easily accessible\\\"\",\"short_code\":\"sci tech\"},\"data_id\":{\"Slno_cat\":\"1\"}}', 1, '2018-09-26', '15:07:10', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(65, 'other charges entry', '{\"Charges_name\":\"char11\",\"description_charge\":\"\",\"charge_value\":\"\",\"status\":\"1\",\"date_entry\":\"2018-09-26\",\"time_entry\":\"15:08:38\"}', 1, '2018-09-26', '15:08:38', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(66, 'other charge update', '{\"data_change\":{\"Charges_name\":\"freight Charge1\"},\"data_id\":{\"Slno_other\":\"1\"}}', 1, '2018-09-26', '15:09:00', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(67, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"material10\",\"item_id\":\"10\",\"item_detail\":\"xyz\",\"item_uom\":\"21\",\"category_id\":\"cat005\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-09-26\",\"time_entry\":\"15:10:33\"}', 1, '2018-09-26', '15:10:33', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(68, 'Vendors Entery Form', '{\"Vendor_name\":\"ven10\",\"Vendor_email_id\":\"ven111@gmail.com\",\"Mobile_no\":\"985676768\",\"Organisation_name\":\"xyz\",\"Password\":\"111\",\"Password_hash\":\"698d51a19d8a121ce581499d7b701668\",\"Status\":1,\"Date_entry\":\"2018-09-26\",\"Time_entry\":\"15:14:25\",\"Vendor_desc\":\"ttt\",\"Organisation_address\":\"xxxt\"}', 1, '2018-09-26', '15:14:25', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(69, 'Technical Entery Form', '{\"technical_name\":\"tec10\",\"technical_desc\":\"xxx\",\"technical_id\":\"101\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2018-09-26\",\"time_entry\":\"15:16:54\",\"material_slno\":\"6\"}', 1, '2018-09-26', '15:16:54', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(70, 'Technical Entery Form', '{\"technical_name\":\"tec10\",\"technical_desc\":\"xxx\",\"technical_id\":\"101\",\"category_slno\":\"2\",\"status\":1,\"date_entry\":\"2018-09-26\",\"time_entry\":\"15:19:18\",\"material_slno\":\"3\"}', 1, '2018-09-26', '15:19:18', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(71, 'Vendors Entery Form', '{\"Vendor_name\":\"vendor20\",\"Vendor_email_id\":\"ven121@gmail.com\",\"Mobile_no\":\"766734985\",\"Organisation_name\":\"abc\",\"Password\":\"141\",\"Password_hash\":\"0f28b5d49b3020afeecd95b4009adf4c\",\"Status\":1,\"Date_entry\":\"2018-09-26\",\"Time_entry\":\"15:23:38\",\"Vendor_desc\":\"xxxy\",\"Organisation_address\":\"aaa\"}', 1, '2018-09-26', '15:23:38', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(72, 'Vendors update Form', '{\"update_data\":{\"Vendor_name\":\"vendor20\",\"Vendor_email_id\":\"ven121@gmail.com\",\"Mobile_no\":\"76673498510\",\"Organisation_name\":\"abc\",\"Status\":1,\"Date_entry\":\"2018-09-26\",\"Time_entry\":\"15:24:14\",\"Vendor_desc\":\"xxxy\",\"Organisation_address\":\"aaa\"},\"id\":{\"Slno_vendor\":\"4\"}}', 1, '2018-09-26', '15:24:14', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(73, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle2\",\"vehicle_capacity\":\"60000ponds\",\"vehicle_desc\":\"xxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-09-26\",\"time_entry\":\"15:26:05\"}', 1, '2018-09-26', '15:26:05', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(74, 'activity entry', '{\"Activity_Name\":\"\",\"Activity_Description\":\"\",\"Status\":\"1\",\"Date_Entry\":\"2018-09-28\",\"Time_Entry\":\"18:01:35\"}', 1, '2018-09-28', '18:01:35', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(75, 'Bu User New Order Book Entry', '{\"Slno_project\":\"7\",\"Job_code\":\"12345\",\"Job_description\":\"Breaking the Affordability Barrier news\\r\\n\\r\\nWith over 4 billion people around the globe still not connected to the internet, affordability remains a key challenge. We break the affordability barrier with the world\'s most affordable tablets, phablets and smartphones\",\"Project_name\":\"project management me\",\"LOI_date_contract\":\"2018-09-22\",\"Contract_sign_date\":\"2018-09-25\",\"Contract_value\":\"2018-09-22\",\"Supply_order_value\":\"55555\",\"Contract_start_date\":\"2018-10-01\",\"Contractual_completion\":\"2019-01-31\",\"Contract_duration\":\"6 month\",\"Remark\":\"But with JavaScript, methods and properties are also available to primitive values, because JavaScript treats primitive values as objects when executing methods and properties.\",\"Status\":\"1\",\"Date_entry\":\"2018-09-28\",\"Time_entry\":\"18:55:12\"}', 1, '2018-09-28', '18:55:12', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(76, 'Project Entry Form', '{\"Project_Name\":\"project 1\",\"job_Code\":\"0770\",\"Date_Start\":\"2018-11-01\",\"Customer_Name\":\"sandy\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to\",\"status\":\"1\",\"Date_Entry\":\"2018-09-28\",\"Time_Entry\":\"20:38:23\"}', 1, '2018-09-28', '20:38:23', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(77, 'Bu User New Order Book Entry', '{\"Slno_project\":\"1\",\"Job_code\":\"0770\",\"Job_description\":\"This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to seem ok to me preetish\",\"Project_name\":\"project 1\",\"LOI_date_contract\":\"2018-09-29\",\"Contract_sign_date\":\"2018-11-08\",\"Contract_value\":\"2018-09-29\",\"Supply_order_value\":\"55555\",\"Contract_start_date\":\"2019-02-02\",\"Contractual_completion\":\"2019-04-20\",\"Contract_duration\":\"6 month\",\"Remark\":\"For switch statements, case statements must be indented once from switch, and bodies for the cases must be indented once from case. When not breaking after any kind of operations in case, you must write a comment.\",\"Status\":\"1\",\"Date_entry\":\"2018-09-28\",\"Time_entry\":\"21:28:07\"}', 1, '2018-09-28', '21:28:07', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(78, 'Project Entry Form', '{\"Project_Name\":\"Project 3\",\"job_Code\":\"23456\",\"Date_Start\":\"2018-09-22\",\"Customer_Name\":\"ABC Ltd\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"status\":\"1\",\"Date_Entry\":\"2018-09-28\",\"Time_Entry\":\"21:28:53\"}', 1, '2018-09-28', '21:28:53', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(79, 'Project Entry Form', '{\"Project_Name\":\"Project 5\",\"job_Code\":\"679034\",\"Date_Start\":\"2018-09-05\",\"Customer_Name\":\"ZXC Ltd\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"vvvvvvvvvvvvvv\",\"status\":\"1\",\"Date_Entry\":\"2018-09-28\",\"Time_Entry\":\"21:30:19\"}', 1, '2018-09-28', '21:30:19', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(80, 'Bu User Update Order Book edit', '{\"update_date\":{\"Job_description\":\"This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to seem ok to me preetish\",\"LOI_date_contract\":\"2018-09-29\",\"Contract_sign_date\":\"2018-11-08\",\"Contract_value\":\"2018-09-29\",\"Supply_order_value\":\"55555\",\"Contract_start_date\":\"2019-02-02\",\"Contractual_completion\":\"2019-04-20\",\"Contract_duration\":\"6 month\",\"Remark\":\"For switch statements, case statements must be indented once from switch, and bodies for the cases must be indented once from case. When not breaking after any kind of operations in case, you must write a comment.\",\"Status\":\"1\",\"Date_entry\":\"2018-09-29\",\"Time_entry\":\"12:53:11\"},\"data_id\":{\"Slno_n_order\":\"1\"}}', 1, '2018-09-29', '12:53:11', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(81, 'Bu User Update Order Book edit', '{\"update_date\":{\"Job_description\":\"This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to seem ok to me preetish\",\"LOI_date_contract\":\"2018-09-29\",\"Contract_sign_date\":\"2018-11-08\",\"Contract_value\":\"2018-09-29\",\"Supply_order_value\":\"55555\",\"Contract_start_date\":\"2019-02-02\",\"Contractual_completion\":\"2019-04-20\",\"Contract_duration\":\"6 month\",\"Remark\":\"For switch statements, case statements must be indented once from switch, and bodies for the cases must be indented once from case. When not breaking after any kind of operations in case, you must write a comment.\",\"Status\":\"1\",\"Date_entry\":\"2018-09-29\",\"Time_entry\":\"12:54:00\"},\"data_id\":{\"Slno_n_order\":\"1\"}}', 1, '2018-09-29', '12:54:00', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(82, 'Bu User Update Order Book edit', '{\"update_date\":{\"Job_description\":\"This page contains top rated real world PHP examples of method Flight::set from package flight extracted from open source projects. You can rate examples to seem ok to me preetish\",\"LOI_date_contract\":\"2018-09-29\",\"Contract_sign_date\":\"2018-11-08\",\"Contract_value\":\"2018-09-29\",\"Supply_order_value\":\"25089\",\"Contract_start_date\":\"2019-02-02\",\"Contractual_completion\":\"2019-04-20\",\"Contract_duration\":\"6 month\",\"Remark\":\"For switch statements, case statements must be indented once from switch, and bodies for the cases must be indented once from case. When not breaking after any kind of operations in case, you must write a comment.\",\"Status\":\"1\",\"Date_entry\":\"2018-09-29\",\"Time_entry\":\"12:54:12\"},\"data_id\":{\"Slno_n_order\":\"1\"}}', 1, '2018-09-29', '12:54:12', '192.168.0.3', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}');
INSERT INTO `Ilab_pms_log_entries` (`Slno`, `Form_name`, `Data_entry`, `status`, `Date`, `Time`, `Location_Id`, `browser_information`) VALUES
(83, 'User_Entry_Form', '{\"email_id\":\"siprah@gmail.com\",\"Username\":\"Approver5\",\"Password\":\"Sipra2306\",\"password_hash\":\"66b81209092c081cf72358adf720884c\",\"Status\":1,\"role_id\":\"8\",\"user_mobile\":\"9776069881\",\"user_degination\":\"Approver\"}', 1, '2018-10-02', '18:43:40', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(84, 'Technical Entery Form', '{\"technical_name\":\"67tyu\",\"technical_desc\":\"cvbnmxrt\",\"technical_id\":\"126709\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2018-10-09\",\"time_entry\":\"21:20:46\",\"material_slno\":\"6\"}', 1, '2018-10-09', '21:20:46', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(85, 'Technical Entery Form', '{\"technical_name\":\"BNTRY\",\"technical_desc\":\"bnmiyutre\",\"technical_id\":\"0290321\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2018-10-09\",\"time_entry\":\"21:21:46\",\"material_slno\":\"6\"}', 1, '2018-10-09', '21:21:46', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(86, 'Vehicle Type Entery Form', '{\"vehicle_type\":\"vehech\",\"status\":1,\"date_entry\":\"2018-10-11\",\"time_entry\":\"18:01:42\"}', 1, '2018-10-11', '18:01:42', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(87, 'Vehicle Capacity Entery Form', '{\"vehicle_capacity\":\"50s ponds\",\"status\":1,\"date_entry\":\"2018-10-11\",\"time_entry\":\"21:18:24\"}', 1, '2018-10-11', '21:18:24', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(88, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle3s\",\"vehicle_capacity\":\"50 ponds\",\"vehicle_desc\":\" tyyy\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-10-11\",\"time_entry\":\"21:29:54\"}', 1, '2018-10-11', '21:29:54', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(89, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"material item 17\",\"item_id\":\"mat0087\",\"item_detail\":\"oops execute a block of code a specified number of times.\",\"item_uom\":\"nos\",\"category_id\":\"cat005\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-10-15\",\"time_entry\":\"17:41:19\"}', 1, '2018-10-15', '17:41:19', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(90, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"material item 19\",\"item_id\":\"mat0018\",\"item_detail\":\"nitialize the loop counter value\",\"item_uom\":\"nos\",\"category_id\":\"cat005\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-10-15\",\"time_entry\":\"17:41:55\"}', 1, '2018-10-15', '17:41:55', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(91, 'Technical Entery Form', '{\"technical_name\":\"technical 1\",\"technical_desc\":\"et me prefix this by saying that I know what foreach is, does and how to use it. This question concerns how it works under the bonnet, and I don\'t want any answers along the lines of \\\"this is how you loop an array with foreach\\\".\",\"technical_id\":\"techid00155\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2018-10-15\",\"time_entry\":\"17:42:53\",\"material_slno\":\"7\"}', 1, '2018-10-15', '17:42:53', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(92, 'Technical Entery Form', '{\"technical_name\":\"technical 1667\",\"technical_desc\":\"For a long time I assumed that foreach worked with the array itself. Then I found many references to the fact that it works with a copy of the array, and I have since assumed this to be the end of the story. But I recently got i\",\"technical_id\":\"techid001sssd\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2018-10-15\",\"time_entry\":\"17:43:28\",\"material_slno\":\"7\"}', 1, '2018-10-15', '17:43:28', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(93, 'Technical Entery Form', '{\"technical_name\":\"ABCD 3333\",\"technical_desc\":\"This clearly shows that we are not working directly with the source array - otherwise the loop would continue forever, since we are constantly pushing items onto the array during the loop. But just to be sure this is the case:\",\"technical_id\":\"techid0013343434\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2018-10-15\",\"time_entry\":\"17:44:00\",\"material_slno\":\"8\"}', 1, '2018-10-15', '17:44:00', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(94, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"material item 22\",\"item_id\":\"mat00910\",\"item_detail\":\"Evaluated for each loop iteration. If it evaluates to TRUE, the loop continues. If it evaluates to FALSE, the loop ends.\",\"item_uom\":\"nos\",\"category_id\":\"cat005\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2018-10-15\",\"time_entry\":\"18:41:26\"}', 1, '2018-10-15', '18:41:26', '192.168.0.4', '{\"browser\":\"Firefox\",\"browserVersion\":\"62.0\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko\\/20100101 Firefox\\/62.0\"}'),
(95, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle10\",\"vehicle_capacity\":\"8000ponds\",\"vehicle_desc\":\"XYZ\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-10-22\",\"time_entry\":\"15:44:52\"}', 1, '2018-10-22', '15:44:52', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(96, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle12\",\"vehicle_capacity\":\"60000ponds\",\"vehicle_desc\":\"abc\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-10-22\",\"time_entry\":\"15:45:09\"}', 1, '2018-10-22', '15:45:09', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(97, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle12\",\"vehicle_capacity\":\"60000ponds\",\"vehicle_desc\":\"12345\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-10-22\",\"time_entry\":\"15:45:27\"}', 1, '2018-10-22', '15:45:27', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(98, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle12\",\"vehicle_capacity\":\"8000ponds\",\"vehicle_desc\":\"3456\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-10-22\",\"time_entry\":\"15:45:44\"}', 1, '2018-10-22', '15:45:44', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(99, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle10\",\"vehicle_capacity\":\"5ponds\",\"vehicle_desc\":\"2345\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2018-10-22\",\"time_entry\":\"15:46:01\"}', 1, '2018-10-22', '15:46:01', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(100, 'Project Entry Form', '{\"Project_Name\":\"Nalanda\",\"job_Code\":\"902345\",\"Date_Start\":\"2018-10-01\",\"Customer_Name\":\"sdcf\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"nmmkku\",\"status\":\"1\",\"Date_Entry\":\"2018-10-23\",\"Time_Entry\":\"16:11:35\"}', 1, '2018-10-23', '16:11:35', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(101, 'Project Entry Form', '{\"Project_Name\":\"Dream\",\"job_Code\":\"567432\",\"Date_Start\":\"2018-10-01\",\"Customer_Name\":\"mntyu\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"nmmkkk\",\"status\":\"1\",\"Date_Entry\":\"2018-10-23\",\"Time_Entry\":\"16:12:34\"}', 1, '2018-10-23', '16:12:34', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(102, 'Project Entry Form', '{\"Project_Name\":\"revenue\",\"job_Code\":\"189067\",\"Date_Start\":\"2018-10-03\",\"Customer_Name\":\"msdfrt\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"mnghtyu\",\"status\":\"1\",\"Date_Entry\":\"2018-10-23\",\"Time_Entry\":\"16:13:34\"}', 1, '2018-10-23', '16:13:34', '192.168.0.6', '{\"browser\":\"Firefox\",\"browserVersion\":\"63.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:63.0) Gecko\\/20100101 Firefox\\/63.0\"}'),
(103, 'User_Entry_Form', '{\"email_id\":\"abc@ilab.com\",\"Username\":\"Technical User\",\"Password\":\"Ab12345678\",\"password_hash\":\"5fb6e2a60c9da41e0a94fe6157ddb93f\",\"Status\":1,\"role_id\":\"9\",\"user_mobile\":\"9937826311\",\"user_degination\":\"Design Engineer\"}', 1, '2018-11-12', '20:17:35', '192.168.0.7', '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}'),
(104, 'User_Entry_Form', '{\"email_id\":\"qert@ilab.com\",\"Username\":\"Technical Evaluator1\",\"Password\":\"Aacv12345678\",\"password_hash\":\"db71eec5a12e729fa2c45f8d03fc7be4\",\"Status\":1,\"role_id\":\"9\",\"user_mobile\":\"2345671290\",\"user_degination\":\"Design User\"}', 1, '2018-11-12', '20:22:01', '192.168.0.7', '{\"browser\":\"Firefox\",\"browserVersion\":\"64.0\",\"platform\":\"Windows 8.1\",\"full_user_agent_string\":\"Mozilla\\/5.0 (Windows NT 6.3; Win64; x64; rv:64.0) Gecko\\/20100101 Firefox\\/64.0\"}'),
(105, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor 4\",\"Vendor_email_id\":\"ven221@gmail.com\",\"Mobile_no\":\"8635787011\",\"Organisation_name\":\"T&T\",\"Password\":\"5432\",\"Password_hash\":\"2e92962c0b6996add9517e4242ea9bdc\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"11:44:36\",\"Vendor_desc\":\"abc\",\"Organisation_address\":\"Chennai\"}', 1, '2018-11-13', '11:44:36', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(106, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor5\",\"Vendor_email_id\":\"ven001@gmail.com\",\"Mobile_no\":\"76453892344\",\"Organisation_name\":\"WWPE\",\"Password\":\"4444\",\"Password_hash\":\"dbc4d84bfcfe2284ba11beffb853a8c4\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"11:46:49\",\"Vendor_desc\":\"xxxc\",\"Organisation_address\":\"odisha\"}', 1, '2018-11-13', '11:46:49', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(107, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor 7\",\"Vendor_email_id\":\"ven310@yahoo.com\",\"Mobile_no\":\"7767443790\",\"Organisation_name\":\"ipts\",\"Password\":\"567\",\"Password_hash\":\"99c5e07b4d5de9d18c350cdf64c5aa3d\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"11:48:12\",\"Vendor_desc\":\"vvvy\",\"Organisation_address\":\"Jharkhand\"}', 1, '2018-11-13', '11:48:12', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(108, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendors10\",\"Vendor_email_id\":\"ven1011@yahoo.com\",\"Mobile_no\":\"74683983390\",\"Organisation_name\":\"GTPS\",\"Password\":\"9990\",\"Password_hash\":\"a8eaf88e26451020bf62ab0bc441ec13\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"11:49:32\",\"Vendor_desc\":\"tttz\",\"Organisation_address\":\"Mumbai\"}', 1, '2018-11-13', '11:49:32', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(109, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor 13\",\"Vendor_email_id\":\"ven331@gmail.com\",\"Mobile_no\":\"738985412\",\"Organisation_name\":\"P&G\",\"Password\":\"747\",\"Password_hash\":\"8d317bdcf4aafcfc22149d77babee96d\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"11:52:34\",\"Vendor_desc\":\"aaac\",\"Organisation_address\":\"BBSR\"}', 1, '2018-11-13', '11:52:34', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(110, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor779\",\"Vendor_email_id\":\"ven97@gmail.com\",\"Mobile_no\":\"7437878342\",\"Organisation_name\":\"AATG\",\"Password\":\"8888\",\"Password_hash\":\"cf79ae6addba60ad018347359bd144d2\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"11:54:37\",\"Vendor_desc\":\"cvcd\",\"Organisation_address\":\"ctc\"}', 1, '2018-11-13', '11:54:37', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(111, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor55\",\"Vendor_email_id\":\"ven979@yahoo.com\",\"Mobile_no\":\"7564566850\",\"Organisation_name\":\"DDTC\",\"Password\":\"7771\",\"Password_hash\":\"cd81cfd0a3397761fac44ddbe5ec3349\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"12:07:01\",\"Vendor_desc\":\"gtch\",\"Organisation_address\":\"RNC\"}', 1, '2018-11-13', '12:07:01', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(112, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor11\",\"Vendor_email_id\":\"ven90@gmail.com\",\"Mobile_no\":\"8576902112\",\"Organisation_name\":\"TTS\",\"Password\":\"555\",\"Password_hash\":\"15de21c670ae7c3f6f3f1f37029303c9\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"12:12:29\",\"Vendor_desc\":\"vvs\",\"Organisation_address\":\"BBSR\"}', 1, '2018-11-13', '12:12:29', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(113, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor31\",\"Vendor_email_id\":\"ven66@gmail.com\",\"Mobile_no\":\"656349001\",\"Organisation_name\":\"UTPS\",\"Password\":\"5557\",\"Password_hash\":\"73f715c6cc2b110fc67503ba813f7f0e\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"12:20:40\",\"Vendor_desc\":\"DCH\",\"Organisation_address\":\"CTC\"}', 1, '2018-11-13', '12:20:40', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(114, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendor21\",\"Vendor_email_id\":\"ven371@yahoo.com\",\"Mobile_no\":\"743578980\",\"Organisation_name\":\"LGP\",\"Password\":\"779\",\"Password_hash\":\"67d96d458abdef21792e6d8e590244e7\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"13:19:25\",\"Vendor_desc\":\"ttc\",\"Organisation_address\":\"CTC\"}', 1, '2018-11-13', '13:19:25', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(115, 'Vendors Entery Form', '{\"Vendor_name\":\"Vendors11\",\"Vendor_email_id\":\"ven170@yahoo.com\",\"Mobile_no\":\"74657390\",\"Organisation_name\":\"C&Z\",\"Password\":\"7100\",\"Password_hash\":\"9d94c8981a48d12adfeecfe1ae6e0ec1\",\"Status\":1,\"Date_entry\":\"2018-11-13\",\"Time_entry\":\"13:22:56\",\"Vendor_desc\":\"vvvvn\",\"Organisation_address\":\"BBSR\"}', 1, '2018-11-13', '13:22:56', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(116, 'User_Entry_Form', '{\"email_id\":\"zz11@gmail.com\",\"Username\":\"user3\",\"Password\":\"cC2345670\",\"password_hash\":\"164ba08fa522f904fc17e46c7a54c2ed\",\"Status\":1,\"role_id\":\"10\",\"user_mobile\":\"6563423248\",\"user_degination\":\"designation3\"}', 1, '2018-11-13', '15:27:52', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(117, 'User_Entry_Form', '{\"email_id\":\"gyt2@gmail.com\",\"Username\":\"user7\",\"Password\":\"dD111111110\",\"password_hash\":\"3efc512e8690e67e5e034b02bfc9a3d2\",\"Status\":1,\"role_id\":\"3\",\"user_mobile\":\"6567784466\",\"user_degination\":\"designation7\"}', 1, '2018-11-13', '15:29:48', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(118, 'User_Entry_Form', '{\"email_id\":\"911@gmail.com\",\"Username\":\"user911\",\"Password\":\"Xx91110000\",\"password_hash\":\"4b273c8ef61a5532fcc705a375ed4f4f\",\"Status\":1,\"role_id\":\"5\",\"user_mobile\":\"9835466220\",\"user_degination\":\"designation911\"}', 1, '2018-11-13', '15:31:54', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(119, 'User_Entry_Form', '{\"email_id\":\"ut11@gmail.com\",\"Username\":\"user4510\",\"Password\":\"Vc8jjj78768\",\"password_hash\":\"66ebde315e58a3dcb6c632dd0fa89373\",\"Status\":1,\"role_id\":\"5\",\"user_mobile\":\"8765544783\",\"user_degination\":\"designation003\"}', 1, '2018-11-13', '15:35:29', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(120, 'User_Entry_Form', '{\"email_id\":\"vch33@yahoo.com\",\"Username\":\"user901\",\"Password\":\"Nv66763vbv\",\"password_hash\":\"19457690528514f39e59b4e23eab715c\",\"Status\":1,\"role_id\":\"8\",\"user_mobile\":\"8754897860\",\"user_degination\":\"designation08\"}', 1, '2018-11-13', '15:37:55', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(121, 'User_Entry_Form', '{\"email_id\":\"tvs31@gmail.com\",\"Username\":\"user77\",\"Password\":\"Hd5600003hnb\",\"password_hash\":\"0d4dd4a6f73051ed47458896bc97ac85\",\"Status\":1,\"role_id\":\"2\",\"user_mobile\":\"7754484233\",\"user_degination\":\"designation99\"}', 1, '2018-11-13', '15:40:40', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(122, 'User_Entry_Form', '{\"email_id\":\"gtps09@gmail.com\",\"Username\":\"user9912\",\"Password\":\"Nc7vyh77897\",\"password_hash\":\"85c346a057275105c71fc016d29361ff\",\"Status\":1,\"role_id\":\"3\",\"user_mobile\":\"8568987421\",\"user_degination\":\"designation009\"}', 1, '2018-11-13', '15:42:26', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(123, 'User_Entry_Form', '{\"email_id\":\"ups2@yahoo.com\",\"Username\":\"user090\",\"Password\":\"Xz9jnumfhhj\",\"password_hash\":\"262f287d6b337fe94d624bccfb0339cc\",\"Status\":1,\"role_id\":\"6\",\"user_mobile\":\"7987533880\",\"user_degination\":\"designation05\"}', 1, '2018-11-13', '15:45:47', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(124, 'User_Entry_Form', '{\"email_id\":\"gcg2@gmail.com\",\"Username\":\"user464\",\"Password\":\"bN416768HHG\",\"password_hash\":\"0a84b0efcbd5427f4caeea4df5b14cb9\",\"Status\":1,\"role_id\":\"7\",\"user_mobile\":\"8527427442\",\"user_degination\":\"designation84\"}', 1, '2018-11-13', '15:47:56', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(125, 'User_Entry_Form', '{\"email_id\":\"xt12@gmail.com\",\"Username\":\"user122\",\"Password\":\"hT43hgdfdfgh\",\"password_hash\":\"10df2290a27c95a0d0fd35ea2186d9e1\",\"Status\":1,\"role_id\":\"9\",\"user_mobile\":\"7755775094\",\"user_degination\":\"designation99\"}', 1, '2018-11-13', '15:50:17', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(126, 'User_Entry_Form', '{\"email_id\":\"ats101@gmail.com\",\"Username\":\"user932\",\"Password\":\"fCT46FGH\",\"password_hash\":\"f3ac5a1f8b095c107f09a49bb6f19100\",\"Status\":1,\"role_id\":\"8\",\"user_mobile\":\"7895644333\",\"user_degination\":\"designation710\"}', 1, '2018-11-13', '16:05:53', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(127, 'User_Entry_Form', '{\"email_id\":\"yy013@gmaill.com\",\"Username\":\"user003\",\"Password\":\"tT7GHGJT\",\"password_hash\":\"34f996214cd9683befeedc8ecc2f3110\",\"Status\":1,\"role_id\":\"4\",\"user_mobile\":\"7884587201\",\"user_degination\":\"designation051\"}', 1, '2018-11-13', '16:08:51', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(128, 'User_Entry_Form', '{\"email_id\":\"tts5@gmaill.com\",\"Username\":\"user780\",\"Password\":\"sT6YHUY8 6788\",\"password_hash\":\"2a224b5f97af51d369af7f1ed44f8707\",\"Status\":1,\"role_id\":\"8\",\"user_mobile\":\"8764676987\",\"user_degination\":\"designation87\"}', 1, '2018-11-13', '16:11:35', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(129, 'User_Entry_Form', '{\"email_id\":\"uvt99@gmail.com\",\"Username\":\"user797\",\"Password\":\"vT976786vvn\",\"password_hash\":\"4e1aa3921ac7f7d3595e6f843a876f22\",\"Status\":1,\"role_id\":\"5\",\"user_mobile\":\"7897459893\",\"user_degination\":\"designation09\"}', 1, '2018-11-13', '16:41:56', '192.168.0.5', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(130, 'User_Entry_Form', '{\"email_id\":\"abc1@gmail.com\",\"Username\":\"user 101\",\"Password\":\"1234JAzz\",\"password_hash\":\"6e32b54b3c884e3527465eae355c673e\",\"Status\":1,\"role_id\":\"2\",\"user_mobile\":\"9878765676\",\"user_degination\":\"designation111\"}', 1, '2019-01-17', '15:16:30', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(131, 'Project Entry Form', '{\"Project_Name\":\"proj1112\",\"job_Code\":\"7877\",\"Date_Start\":\"06\\/06\\/2017\",\"Customer_Name\":\"cust22201\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"xxxx\",\"status\":\"1\",\"Date_Entry\":\"2019-01-17\",\"Time_Entry\":\"17:57:06\"}', 1, '2019-01-17', '17:57:06', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(132, 'section entry', '{\"section_Name\":\"section2311\",\"Status\":\"1\",\"Date_Entry\":\"2019-01-17\",\"Time_Entry\":\"18:22:23\"}', 1, '2019-01-17', '18:22:23', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(133, 'activity entry', '{\"Activity_Name\":\"activity 77700\",\"Activity_Description\":\"xxxxx\",\"Status\":\"1\",\"Date_Entry\":\"2019-01-17\",\"Time_Entry\":\"18:51:57\"}', 1, '2019-01-17', '18:51:57', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(134, 'activity edit', '{\"date_change\":{\"Activity_Name\":\"xxxx\",\"Activity_Description\":\"xxxxxxx\"},\"$data_id\":{\"Activity_Slno\":\"4\"}}', 1, '2019-01-17', '18:53:00', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(135, 'Category entry', '{\"category_name\":\"cat301\",\"category_id\":\"cat11174\",\"category_desc\":\"xxxx\",\"short_code\":\"ct232\",\"status\":\"1\",\"date_entry\":\"2019-01-18\",\"time_entry\":\"15:08:55\"}', 1, '2019-01-18', '15:08:55', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(136, 'Category entry', '{\"category_name\":\"cat333\",\"category_id\":\"cat555\",\"category_desc\":\"xxxx\",\"short_code\":\"ct555\",\"status\":\"1\",\"date_entry\":\"2019-01-18\",\"time_entry\":\"15:09:26\"}', 1, '2019-01-18', '15:09:26', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(137, 'Category update', '{\"data_change\":{\"category_name\":\"logistics\",\"category_id\":\"cat003\",\"category_desc\":\"Logistics is generally the detailed organization and implementation of a complex operation. In a general business sense, logistics is the management of the flow of things between the point of origin and the point of consumption in order to meet requirements of customers or corporations.\",\"short_code\":\"logistics\"},\"data_id\":{\"Slno_cat\":\"3\"}}', 1, '2019-01-18', '15:10:55', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(138, 'other charges entry', '{\"Charges_name\":\"char122311\",\"description_charge\":\"\",\"charge_value\":\"\",\"status\":\"1\",\"date_entry\":\"2019-01-18\",\"time_entry\":\"15:37:27\"}', 1, '2019-01-18', '15:37:27', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(139, 'other charges entry', '{\"Charges_name\":\"char1234511\",\"description_charge\":\"\",\"charge_value\":\"\",\"status\":\"1\",\"date_entry\":\"2019-01-18\",\"time_entry\":\"15:37:45\"}', 1, '2019-01-18', '15:37:45', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(140, 'other charge update', '{\"data_change\":{\"Charges_name\":\"freight Charge11\"},\"data_id\":{\"Slno_other\":\"1\"}}', 1, '2019-01-18', '15:38:30', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(141, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"xxxx11\",\"item_id\":\"132432131\",\"item_detail\":\"xxxxxx\",\"item_uom\":\"5664\",\"category_id\":\"cat005\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2019-01-18\",\"time_entry\":\"16:03:38\"}', 1, '2019-01-18', '16:03:38', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(142, 'material item update', '{\"data_update_item_material\":{\"Category_slno\":\"2\",\"item_name\":\"material item 22\",\"item_id\":\"mat00910\",\"item_detail\":\"Evaluated for each loop iteration. If it evaluates to TRUE, the loop continues. If it evaluates to FALSE, the loop ends.\",\"item_uom\":\"nos\",\"category_id\":\"cat002\",\"category_name\":\"make to order items\",\"status\":\"1\",\"date_entry\":\"2019-01-18\",\"time_entry\":\"16:04:41\"},\"data_id\":{\"Slno_item\":\"9\"}}', 1, '2019-01-18', '16:04:41', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(143, 'Vendors Entery Form', '{\"Vendor_name\":\"veh1231\",\"Vendor_email_id\":\"ven454@yahoo.com\",\"Mobile_no\":\"86578757500\",\"Organisation_name\":\"xxxx1\",\"Password\":\"xxx\",\"Password_hash\":\"f561aaf6ef0bf14d4208bb46a4ccb3ad\",\"Status\":1,\"Date_entry\":\"2019-01-18\",\"Time_entry\":\"16:55:33\",\"Vendor_desc\":\"xxxxxxx\",\"Organisation_address\":\"xxxx1211\"}', 1, '2019-01-18', '16:55:33', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(144, 'Vendors update Form', '{\"update_data\":{\"Vendor_name\":\"vendor 2\",\"Vendor_email_id\":\"vender2@ilab.com\",\"Mobile_no\":\"99330\",\"Organisation_name\":\"vendor 2 pvt ltd\",\"Status\":1,\"Date_entry\":\"2019-01-18\",\"Time_entry\":\"16:56:30\",\"Vendor_desc\":\"teartt\",\"Organisation_address\":\"wqqwqw\"},\"id\":{\"Slno_vendor\":\"1\"}}', 1, '2019-01-18', '16:56:30', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(145, 'Technical Entery Form', '{\"technical_name\":\"tech34311\",\"technical_desc\":\"xxxxx\",\"technical_id\":\"12131\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"17:23:05\",\"material_slno\":\"2\"}', 1, '2019-01-18', '17:23:05', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(146, 'Technical Entery Form', '{\"technical_name\":\"tech454\",\"technical_desc\":\"xxxxx\",\"technical_id\":\"455555\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"17:30:26\",\"material_slno\":\"6\"}', 1, '2019-01-18', '17:30:26', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(147, 'Technical Update Form', '{\"updated_data\":{\"technical_name\":\"316Ls\",\"technical_desc\":\"316L stainless steel head and casing\",\"technical_id\":\"Tech001\",\"category_slno\":\"2\",\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"17:31:08\",\"material_slno\":\"4\"},\"updated_id\":{\"Slno_technical\":\"1\"}}', 1, '2019-01-18', '17:31:08', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(148, 'Vehicle Type Entery Form', '{\"vehicle_type\":\"vehicle13343\",\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"17:46:35\"}', 1, '2019-01-18', '17:46:35', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(149, 'Vehicle Capacity Entery Form', '{\"vehicle_capacity\":\"vehicle111211\",\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"18:03:55\"}', 1, '2019-01-18', '18:03:55', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(150, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle3s\",\"vehicle_capacity\":\"8000ponds\",\"vehicle_desc\":\"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"18:28:57\"}', 1, '2019-01-18', '18:28:57', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(151, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle10\",\"vehicle_capacity\":\"50s ponds\",\"vehicle_desc\":\"xxxxxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"18:29:37\"}', 1, '2019-01-18', '18:29:37', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(152, 'Vehicle Entery Form', '{\"vehicle_type\":\"vehicle10\",\"vehicle_capacity\":\"50s ponds\",\"vehicle_desc\":\"xxxxxx\",\"category_slno\":3,\"status\":1,\"date_entry\":\"2019-01-18\",\"time_entry\":\"18:31:11\"}', 1, '2019-01-18', '18:31:11', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(153, 'User_Entry_Form', '{\"email_id\":\"sha12@gmail.com\",\"Username\":\"user5\",\"Password\":\"shA10000\",\"password_hash\":\"59ad47f426392d811349ec6bc4cdef82\",\"Status\":1,\"role_id\":\"2\",\"user_mobile\":\"5675678800\",\"user_degination\":\"design50\"}', 1, '2019-02-20', '12:56:25', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(154, 'Project Entry Form', '{\"Project_Name\":\"xtxx\",\"job_Code\":\"600\",\"Date_Start\":\"2019-05-08\",\"Customer_Name\":\"cust211\",\"Customer_Mobile_No\":\"12345667890\",\"project_Description\":\"tps\",\"status\":\"1\",\"Date_Entry\":\"2019-02-20\",\"Time_Entry\":\"15:55:08\"}', 1, '2019-02-20', '15:55:08', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(155, 'other charges entry', '{\"Charges_name\":\"char44410\",\"description_charge\":\"\",\"charge_value\":\"\",\"status\":\"1\",\"date_entry\":\"2019-02-20\",\"time_entry\":\"15:55:40\"}', 1, '2019-02-20', '15:55:40', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(156, 'other charge update', '{\"data_change\":{\"Charges_name\":\"char44410\"},\"data_id\":{\"Slno_other\":\"5\"}}', 1, '2019-02-20', '15:56:16', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(157, 'material item entry', '{\"Category_slno\":\"1\",\"item_name\":\"ttst\",\"item_id\":\"6600\",\"item_detail\":\"xyz\",\"item_uom\":\"505\",\"category_id\":\"cat005\",\"category_name\":\"standard catalogued item\",\"status\":\"1\",\"date_entry\":\"2019-02-20\",\"time_entry\":\"15:57:24\"}', 1, '2019-02-20', '15:57:24', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(158, 'Technical Entery Form', '{\"technical_name\":\"tec404\",\"technical_desc\":\"xyz\",\"technical_id\":\"111\",\"category_slno\":\"1\",\"status\":1,\"date_entry\":\"2019-02-20\",\"time_entry\":\"15:58:30\",\"material_slno\":\"6\"}', 1, '2019-02-20', '15:58:30', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}'),
(159, 'Vehicle Type Entery Form', '{\"vehicle_type\":\"vehic342\",\"status\":1,\"date_entry\":\"2019-02-20\",\"time_entry\":\"15:58:54\"}', 1, '2019-02-20', '15:58:54', '192.168.0.6', '{\"browser\":\"Chrome\",\"browserVersion\":\"68.0.3440.106\",\"platform\":\"Linux\",\"full_user_agent_string\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/68.0.3440.106 Safari\\/537.36\"}');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_section`
--

CREATE TABLE `Ilab_section` (
  `Section_Slno` int(255) NOT NULL,
  `section_Name` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL COMMENT '1-Active,2-Inactive,3-Delete',
  `Date_Entry` date NOT NULL,
  `Time_Entry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ilab_section`
--

INSERT INTO `Ilab_section` (`Section_Slno`, `section_Name`, `Status`, `Date_Entry`, `Time_Entry`) VALUES
(1, 'xyz', 3, '2018-09-14', '21:35:46'),
(2, 'section 4', 3, '2018-09-15', '13:06:47'),
(3, 'sec 1', 3, '2018-09-15', '15:50:18'),
(4, 'section2', 2, '2018-09-18', '12:52:03'),
(5, 'section2', 1, '2018-09-26', '14:58:49'),
(6, 'section2311', 1, '2019-01-17', '18:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `Ilab_Vendor_operation_detail`
--

CREATE TABLE `Ilab_Vendor_operation_detail` (
  `Slno_Vendor_operation` int(11) NOT NULL,
  `Slno_id_Vendor_slno` varchar(255) NOT NULL,
  `Operation_name` varchar(255) NOT NULL,
  `Operation_slno` varchar(255) NOT NULL,
  `Date_entry` date NOT NULL,
  `Time_entry` time NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `Operation_short` varchar(255) NOT NULL,
  `Operation_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Here Vendor opperation';

--
-- Dumping data for table `Ilab_Vendor_operation_detail`
--

INSERT INTO `Ilab_Vendor_operation_detail` (`Slno_Vendor_operation`, `Slno_id_Vendor_slno`, `Operation_name`, `Operation_slno`, `Date_entry`, `Time_entry`, `Status`, `Operation_short`, `Operation_id`) VALUES
(1, '2', 'standard catalogued item', '1', '2018-09-22', '19:08:40', 1, 'sci tech', 'cat001'),
(2, '2', 'make to order items', '2', '2018-09-24', '17:37:20', 1, 'moi', 'cat002'),
(3, '3', 'standard catalogued item', '1', '2018-09-26', '15:14:25', 1, 'sci tech', 'cat005'),
(4, '3', 'make to order items', '2', '2018-09-26', '15:14:25', 1, 'moi', 'cat002'),
(5, '3', 'logistics', '3', '2018-09-26', '15:14:25', 1, 'logistics', 'cat003'),
(6, '4', 'standard catalogued item', '1', '2018-09-26', '15:23:38', 1, 'sci tech', 'cat005'),
(7, '4', 'make to order items', '2', '2018-09-26', '15:23:38', 1, 'moi', 'cat002'),
(8, '4', 'logistics', '3', '2018-09-26', '15:23:38', 1, 'logistics', 'cat003'),
(9, '5', 'standard catalogued item', '1', '2018-11-13', '11:44:36', 1, 'sci tech', 'cat005'),
(10, '5', 'make to order items', '2', '2018-11-13', '11:44:36', 1, 'moi', 'cat002'),
(11, '5', 'logistics', '3', '2018-11-13', '11:44:36', 1, 'logistics', 'cat003'),
(12, '6', 'make to order items', '2', '2018-11-13', '11:46:49', 1, 'moi', 'cat002'),
(13, '6', 'logistics', '3', '2018-11-13', '11:46:49', 1, 'logistics', 'cat003'),
(14, '7', 'standard catalogued item', '1', '2018-11-13', '11:48:12', 1, 'sci tech', 'cat005'),
(15, '7', 'logistics', '3', '2018-11-13', '11:48:12', 1, 'logistics', 'cat003'),
(16, '8', 'standard catalogued item', '1', '2018-11-13', '11:49:32', 1, 'sci tech', 'cat005'),
(17, '8', 'make to order items', '2', '2018-11-13', '11:49:32', 1, 'moi', 'cat002'),
(18, '9', 'standard catalogued item', '1', '2018-11-13', '11:52:34', 1, 'sci tech', 'cat005'),
(19, '9', 'make to order items', '2', '2018-11-13', '11:52:34', 1, 'moi', 'cat002'),
(20, '9', 'logistics', '3', '2018-11-13', '11:52:34', 1, 'logistics', 'cat003'),
(21, '10', 'standard catalogued item', '1', '2018-11-13', '11:54:37', 1, 'sci tech', 'cat005'),
(22, '10', 'make to order items', '2', '2018-11-13', '11:54:37', 1, 'moi', 'cat002'),
(23, '10', 'logistics', '3', '2018-11-13', '11:54:37', 1, 'logistics', 'cat003'),
(24, '11', 'standard catalogued item', '1', '2018-11-13', '12:07:01', 1, 'sci tech', 'cat005'),
(25, '11', 'make to order items', '2', '2018-11-13', '12:07:01', 1, 'moi', 'cat002'),
(26, '11', 'logistics', '3', '2018-11-13', '12:07:01', 1, 'logistics', 'cat003'),
(27, '12', 'standard catalogued item', '1', '2018-11-13', '12:12:29', 1, 'sci tech', 'cat005'),
(28, '12', 'logistics', '3', '2018-11-13', '12:12:29', 1, 'logistics', 'cat003'),
(29, '13', 'standard catalogued item', '1', '2018-11-13', '12:20:40', 1, 'sci tech', 'cat005'),
(30, '13', 'make to order items', '2', '2018-11-13', '12:20:40', 1, 'moi', 'cat002'),
(31, '13', 'logistics', '3', '2018-11-13', '12:20:40', 1, 'logistics', 'cat003'),
(32, '14', 'standard catalogued item', '1', '2018-11-13', '13:19:25', 1, 'sci tech', 'cat005'),
(33, '14', 'make to order items', '2', '2018-11-13', '13:19:25', 1, 'moi', 'cat002'),
(34, '14', 'logistics', '3', '2018-11-13', '13:19:25', 1, 'logistics', 'cat003'),
(35, '15', 'standard catalogued item', '1', '2018-11-13', '13:22:56', 1, 'sci tech', 'cat005'),
(36, '15', 'logistics', '3', '2018-11-13', '13:22:56', 1, 'logistics', 'cat003'),
(37, '16', 'standard catalogued item', '1', '2019-01-18', '16:55:33', 1, 'sci tech', 'cat005'),
(38, '16', 'make to order items', '2', '2019-01-18', '16:55:33', 1, 'moi', 'cat002'),
(39, '16', 'logistics', '3', '2019-01-18', '16:55:33', 1, 'logistics', 'cat003');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`) VALUES
(1, 'Test MySQL recurring Event', '2019-02-01 17:53:51'),
(2, 'Test MySQL recurring Event', '2019-02-01 17:54:51'),
(3, 'Test MySQL recurring Event', '2019-02-01 17:55:00'),
(4, 'Test MySQL recurring Event', '2019-02-01 17:55:51'),
(5, 'Test MySQL recurring Event', '2019-02-01 17:56:00'),
(6, 'Test MySQL recurring Event', '2019-02-01 17:56:51'),
(7, 'Test MySQL recurring Event', '2019-02-01 17:57:00'),
(8, 'Test MySQL recurring Event', '2019-02-01 17:57:51'),
(9, 'Test MySQL recurring Event', '2019-02-01 17:58:00'),
(10, 'Test MySQL recurring Event', '2019-02-01 17:58:51'),
(11, 'Test MySQL recurring Event', '2019-02-01 17:59:00'),
(12, 'Test MySQL recurring Event', '2019-02-01 17:59:51'),
(13, 'Test MySQL recurring Event', '2019-02-01 18:00:00'),
(14, 'Test MySQL recurring Event', '2019-02-01 18:00:51'),
(15, 'Test MySQL recurring Event', '2019-02-01 18:01:00'),
(16, 'Test MySQL recurring Event', '2019-02-01 18:01:51'),
(17, 'Test MySQL recurring Event', '2019-02-01 18:02:00'),
(18, 'Test MySQL recurring Event', '2019-02-01 18:02:51'),
(19, 'Test MySQL recurring Event', '2019-02-01 18:03:00'),
(20, 'Test MySQL recurring Event', '2019-02-01 18:03:51'),
(21, 'Test MySQL recurring Event', '2019-02-01 18:04:00'),
(22, 'Test MySQL recurring Event', '2019-02-01 18:04:51'),
(23, 'Test MySQL recurring Event', '2019-02-01 18:05:00'),
(24, 'Test MySQL recurring Event', '2019-02-01 18:05:51'),
(25, 'Test MySQL recurring Event', '2019-02-01 18:06:00'),
(26, 'Test MySQL recurring Event', '2019-02-01 18:06:51'),
(27, 'Test MySQL recurring Event', '2019-02-01 18:07:00'),
(28, 'Test MySQL recurring Event', '2019-02-01 18:07:51'),
(29, 'Test MySQL recurring Event', '2019-02-01 18:08:00'),
(30, 'Test MySQL recurring Event', '2019-02-01 18:08:51'),
(31, 'Test MySQL recurring Event', '2019-02-01 18:09:00'),
(32, 'Test MySQL recurring Event', '2019-02-01 18:09:51'),
(33, 'Test MySQL recurring Event', '2019-02-01 18:10:00'),
(34, 'Test MySQL recurring Event', '2019-02-01 18:10:51'),
(35, 'Test MySQL recurring Event', '2019-02-01 18:11:00'),
(36, 'Test MySQL recurring Event', '2019-02-01 18:11:51'),
(37, 'Test MySQL recurring Event', '2019-02-01 18:12:00'),
(38, 'Test MySQL recurring Event', '2019-02-01 18:12:51'),
(39, 'Test MySQL recurring Event', '2019-02-01 18:13:00'),
(40, 'Test MySQL recurring Event', '2019-02-01 18:13:51'),
(41, 'Test MySQL recurring Event', '2019-02-01 18:14:00'),
(42, 'Test MySQL recurring Event', '2019-02-01 18:14:51'),
(43, 'Test MySQL recurring Event', '2019-02-01 18:15:00'),
(44, 'Test MySQL recurring Event', '2019-02-01 18:15:51'),
(45, 'Test MySQL recurring Event', '2019-02-01 18:16:00'),
(46, 'Test MySQL recurring Event', '2019-02-01 18:16:51'),
(47, 'Test MySQL recurring Event', '2019-02-01 18:17:00'),
(48, 'Test MySQL recurring Event', '2019-02-01 18:17:51'),
(49, 'Test MySQL recurring Event', '2019-02-01 18:18:00'),
(50, 'Test MySQL recurring Event', '2019-02-01 18:18:51'),
(51, 'Test MySQL recurring Event', '2019-02-01 18:19:00'),
(52, 'Test MySQL recurring Event', '2019-02-01 18:19:51'),
(53, 'Test MySQL recurring Event', '2019-02-01 18:20:00'),
(54, 'Test MySQL recurring Event', '2019-02-01 18:20:51'),
(55, 'Test MySQL recurring Event', '2019-02-01 18:21:00'),
(56, 'Test MySQL recurring Event', '2019-02-01 18:21:51'),
(57, 'Test MySQL recurring Event', '2019-02-01 18:22:00'),
(58, 'Test MySQL recurring Event', '2019-02-01 18:22:51'),
(59, 'Test MySQL recurring Event', '2019-02-01 18:23:00'),
(60, 'Test MySQL recurring Event', '2019-02-01 18:23:51'),
(61, 'Test MySQL recurring Event', '2019-02-01 18:24:00'),
(62, 'Test MySQL recurring Event', '2019-02-01 18:24:51'),
(63, 'Test MySQL recurring Event', '2019-02-01 18:25:00'),
(64, 'Test MySQL recurring Event', '2019-02-01 18:25:51'),
(65, 'Test MySQL recurring Event', '2019-02-01 18:26:00'),
(66, 'Test MySQL recurring Event', '2019-02-01 18:26:51'),
(67, 'Test MySQL recurring Event', '2019-02-01 18:27:00'),
(68, 'Test MySQL recurring Event', '2019-02-01 18:27:51'),
(69, 'Test MySQL recurring Event', '2019-02-01 18:28:00'),
(70, 'Test MySQL recurring Event', '2019-02-01 18:28:51'),
(71, 'Test MySQL recurring Event', '2019-02-01 18:29:00'),
(72, 'Test MySQL recurring Event', '2019-02-01 18:29:51'),
(73, 'Test MySQL recurring Event', '2019-02-01 18:30:00'),
(74, 'Test MySQL recurring Event', '2019-02-01 18:30:51'),
(75, 'Test MySQL recurring Event', '2019-02-01 18:31:00'),
(76, 'Test MySQL recurring Event', '2019-02-01 18:31:51'),
(77, 'Test MySQL recurring Event', '2019-02-01 18:32:00'),
(78, 'Test MySQL recurring Event', '2019-02-01 18:32:51'),
(79, 'Test MySQL recurring Event', '2019-02-01 18:33:00'),
(80, 'Test MySQL recurring Event', '2019-02-01 18:33:51'),
(81, 'Test MySQL recurring Event', '2019-02-01 18:34:00'),
(82, 'Test MySQL recurring Event', '2019-02-01 18:34:51'),
(83, 'Test MySQL recurring Event', '2019-02-01 18:35:00'),
(84, 'Test MySQL recurring Event', '2019-02-01 18:35:51'),
(85, 'Test MySQL recurring Event', '2019-02-01 18:36:00'),
(86, 'Test MySQL recurring Event', '2019-02-01 18:36:51'),
(87, 'Test MySQL recurring Event', '2019-02-01 18:37:00'),
(88, 'Test MySQL recurring Event', '2019-02-01 18:37:51'),
(89, 'Test MySQL recurring Event', '2019-02-01 18:38:00'),
(90, 'Test MySQL recurring Event', '2019-02-01 18:38:51'),
(91, 'Test MySQL recurring Event', '2019-02-01 18:39:00'),
(92, 'Test MySQL recurring Event', '2019-02-01 18:39:51'),
(93, 'Test MySQL recurring Event', '2019-02-01 18:40:00'),
(94, 'Test MySQL recurring Event', '2019-02-01 18:40:51'),
(95, 'Test MySQL recurring Event', '2019-02-01 18:41:00'),
(96, 'Test MySQL recurring Event', '2019-02-01 18:41:51'),
(97, 'Test MySQL recurring Event', '2019-02-01 18:42:00'),
(98, 'Test MySQL recurring Event', '2019-02-01 18:42:51'),
(99, 'Test MySQL recurring Event', '2019-02-01 18:43:00'),
(100, 'Test MySQL recurring Event', '2019-02-01 18:43:51'),
(101, 'Test MySQL recurring Event', '2019-02-01 18:44:00'),
(102, 'Test MySQL recurring Event', '2019-02-01 18:44:51'),
(103, 'Test MySQL recurring Event', '2019-02-01 18:45:00'),
(104, 'Test MySQL recurring Event', '2019-02-01 18:45:51'),
(105, 'Test MySQL recurring Event', '2019-02-01 18:46:00'),
(106, 'Test MySQL recurring Event', '2019-02-01 18:46:51'),
(107, 'Test MySQL recurring Event', '2019-02-01 18:47:00'),
(108, 'Test MySQL recurring Event', '2019-02-01 18:47:51'),
(109, 'Test MySQL recurring Event', '2019-02-01 18:48:00'),
(110, 'Test MySQL recurring Event', '2019-02-01 18:48:51'),
(111, 'Test MySQL recurring Event', '2019-02-01 18:49:00'),
(112, 'Test MySQL recurring Event', '2019-02-01 18:49:51'),
(113, 'Test MySQL recurring Event', '2019-02-01 18:50:00'),
(114, 'Test MySQL recurring Event', '2019-02-01 18:50:51'),
(115, 'Test MySQL recurring Event', '2019-02-01 18:51:00'),
(116, 'Test MySQL recurring Event', '2019-02-01 18:51:51'),
(117, 'Test MySQL recurring Event', '2019-02-01 18:52:00'),
(118, 'Test MySQL recurring Event', '2019-02-01 18:52:51'),
(119, 'Test MySQL recurring Event', '2019-02-01 18:53:00'),
(120, 'Test MySQL recurring Event', '2019-02-01 18:53:51'),
(121, 'Test MySQL recurring Event', '2019-02-01 18:54:00'),
(122, 'Test MySQL recurring Event', '2019-02-01 18:55:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ilab_activity`
--
ALTER TABLE `Ilab_activity`
  ADD PRIMARY KEY (`Activity_Slno`);

--
-- Indexes for table `Ilab_assign_project_user`
--
ALTER TABLE `Ilab_assign_project_user`
  ADD PRIMARY KEY (`slno_assign_project`);

--
-- Indexes for table `Ilab_master_admin`
--
ALTER TABLE `Ilab_master_admin`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_bid`
--
ALTER TABLE `Ilab_master_bid`
  ADD PRIMARY KEY (`Slno_bid`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_commerical`
--
ALTER TABLE `Ilab_master_bid_commerical`
  ADD PRIMARY KEY (`Slno_bid`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_commericalevaluation`
--
ALTER TABLE `Ilab_master_bid_commericalevaluation`
  ADD PRIMARY KEY (`slno_bid_tech_id`),
  ADD KEY `bid_slno` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_date_details`
--
ALTER TABLE `Ilab_master_bid_date_details`
  ADD PRIMARY KEY (`Slno_bid_date`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_date_details_commerical`
--
ALTER TABLE `Ilab_master_bid_date_details_commerical`
  ADD PRIMARY KEY (`Slno_bid_date`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_date_details_m`
--
ALTER TABLE `Ilab_master_bid_date_details_m`
  ADD PRIMARY KEY (`Slno_bid_date`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_details`
--
ALTER TABLE `Ilab_master_bid_details`
  ADD PRIMARY KEY (`slno_bid_detail`),
  ADD KEY `bid_slno` (`bid_slno`),
  ADD KEY `buyer_sl no` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_details_commerical`
--
ALTER TABLE `Ilab_master_bid_details_commerical`
  ADD PRIMARY KEY (`slno_bid_detail`),
  ADD KEY `bid_slno` (`bid_slno`),
  ADD KEY `buyer_sl no` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_details_m`
--
ALTER TABLE `Ilab_master_bid_details_m`
  ADD PRIMARY KEY (`slno_bid_detail`),
  ADD KEY `bid_slno` (`bid_slno`),
  ADD KEY `buyer_sl no` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_file_commerical`
--
ALTER TABLE `Ilab_master_bid_file_commerical`
  ADD PRIMARY KEY (`Slno_bid_file`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `bid_buyer_slno` (`bid_buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_file_technical`
--
ALTER TABLE `Ilab_master_bid_file_technical`
  ADD PRIMARY KEY (`Slno_bid_file`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `bid_buyer_slno` (`bid_buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_invitation_rank`
--
ALTER TABLE `Ilab_master_bid_invitation_rank`
  ADD PRIMARY KEY (`slno_invi`);

--
-- Indexes for table `Ilab_master_bid_invi_otp`
--
ALTER TABLE `Ilab_master_bid_invi_otp`
  ADD PRIMARY KEY (`slno_otp`);

--
-- Indexes for table `Ilab_master_bid_invi_rank_approvals`
--
ALTER TABLE `Ilab_master_bid_invi_rank_approvals`
  ADD PRIMARY KEY (`slno_approve`);

--
-- Indexes for table `Ilab_master_bid_invi_rank_not_app`
--
ALTER TABLE `Ilab_master_bid_invi_rank_not_app`
  ADD PRIMARY KEY (`slno_not`);

--
-- Indexes for table `Ilab_master_bid_m`
--
ALTER TABLE `Ilab_master_bid_m`
  ADD PRIMARY KEY (`Slno_bid`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_otp_commerical`
--
ALTER TABLE `Ilab_master_bid_otp_commerical`
  ADD PRIMARY KEY (`slno_comm`);

--
-- Indexes for table `Ilab_master_bid_query`
--
ALTER TABLE `Ilab_master_bid_query`
  ADD PRIMARY KEY (`Slno_query`);

--
-- Indexes for table `Ilab_master_bid_query_commerical`
--
ALTER TABLE `Ilab_master_bid_query_commerical`
  ADD PRIMARY KEY (`Slno_query`);

--
-- Indexes for table `Ilab_master_bid_technicalevaluation`
--
ALTER TABLE `Ilab_master_bid_technicalevaluation`
  ADD PRIMARY KEY (`slno_bid_tech_id`),
  ADD KEY `bid_slno` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_technicalevaluation_m`
--
ALTER TABLE `Ilab_master_bid_technicalevaluation_m`
  ADD PRIMARY KEY (`slno_bid_tech_id`),
  ADD KEY `bid_slno` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_t_c_m`
--
ALTER TABLE `Ilab_master_bid_t_c_m`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_bid_vendor`
--
ALTER TABLE `Ilab_master_bid_vendor`
  ADD PRIMARY KEY (`slno_vendor`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_vendor_commerical`
--
ALTER TABLE `Ilab_master_bid_vendor_commerical`
  ADD PRIMARY KEY (`slno_vendor`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_bid_vendor_file_details`
--
ALTER TABLE `Ilab_master_bid_vendor_file_details`
  ADD PRIMARY KEY (`slno_document`),
  ADD KEY `bid_sl no` (`bid_sl no`),
  ADD KEY `buyer_sl no` (`buyer_sl no`),
  ADD KEY `vendor_slno` (`vendor_slno`);

--
-- Indexes for table `Ilab_master_bid_vendor_m`
--
ALTER TABLE `Ilab_master_bid_vendor_m`
  ADD PRIMARY KEY (`slno_vendor`),
  ADD KEY `bid_sl no` (`bid_slno`),
  ADD KEY `buyer_slno` (`buyer_slno`);

--
-- Indexes for table `Ilab_master_buyer_material_details`
--
ALTER TABLE `Ilab_master_buyer_material_details`
  ADD PRIMARY KEY (`slno_mat`);

--
-- Indexes for table `Ilab_master_buyer_MR`
--
ALTER TABLE `Ilab_master_buyer_MR`
  ADD PRIMARY KEY (`Slno_buyer`),
  ADD KEY `Mr_id` (`Mr_id`),
  ADD KEY `Slno_mr_id` (`Slno_mr_id`),
  ADD KEY `Slno_procurement_id` (`Slno_procurement_id`),
  ADD KEY `procurement_id` (`procurement_id`);

--
-- Indexes for table `Ilab_master_category`
--
ALTER TABLE `Ilab_master_category`
  ADD PRIMARY KEY (`Slno_cat`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `Ilab_master_category_item`
--
ALTER TABLE `Ilab_master_category_item`
  ADD PRIMARY KEY (`slno_master_item`);

--
-- Indexes for table `Ilab_master_charges_other`
--
ALTER TABLE `Ilab_master_charges_other`
  ADD PRIMARY KEY (`Slno_other`);

--
-- Indexes for table `Ilab_master_closed_bid`
--
ALTER TABLE `Ilab_master_closed_bid`
  ADD PRIMARY KEY (`Slno_closed`);

--
-- Indexes for table `Ilab_master_closed_bid_item`
--
ALTER TABLE `Ilab_master_closed_bid_item`
  ADD PRIMARY KEY (`Slno_closed_item`);

--
-- Indexes for table `Ilab_master_closed_bid_item_misc`
--
ALTER TABLE `Ilab_master_closed_bid_item_misc`
  ADD PRIMARY KEY (`Slno_closed_misc`);

--
-- Indexes for table `Ilab_master_closed_bid_item_total`
--
ALTER TABLE `Ilab_master_closed_bid_item_total`
  ADD PRIMARY KEY (`Slno_closed_item_total`);

--
-- Indexes for table `Ilab_master_closed_bid_logistics`
--
ALTER TABLE `Ilab_master_closed_bid_logistics`
  ADD PRIMARY KEY (`Slno_closed_item`);

--
-- Indexes for table `Ilab_master_commercial_notifications`
--
ALTER TABLE `Ilab_master_commercial_notifications`
  ADD PRIMARY KEY (`slno_notification`);

--
-- Indexes for table `Ilab_master_createuser`
--
ALTER TABLE `Ilab_master_createuser`
  ADD PRIMARY KEY (`Create_Slno`);

--
-- Indexes for table `Ilab_master_date_schedule`
--
ALTER TABLE `Ilab_master_date_schedule`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_final_closed_bid_item`
--
ALTER TABLE `Ilab_master_final_closed_bid_item`
  ADD PRIMARY KEY (`Slno_closed_item`);

--
-- Indexes for table `Ilab_master_final_closed_bid_logistics`
--
ALTER TABLE `Ilab_master_final_closed_bid_logistics`
  ADD PRIMARY KEY (`Slno_closed_item`);

--
-- Indexes for table `Ilab_master_final_rankorder_bid_item`
--
ALTER TABLE `Ilab_master_final_rankorder_bid_item`
  ADD PRIMARY KEY (`Slno_rankorder_item`);

--
-- Indexes for table `Ilab_master_final_rankorder_bid_logistics`
--
ALTER TABLE `Ilab_master_final_rankorder_bid_logistics`
  ADD PRIMARY KEY (`Slno_rankorder_item`);

--
-- Indexes for table `Ilab_master_final_simple_bid_item`
--
ALTER TABLE `Ilab_master_final_simple_bid_item`
  ADD PRIMARY KEY (`Slno_simple_item`);

--
-- Indexes for table `Ilab_master_final_simple_bid_logistic`
--
ALTER TABLE `Ilab_master_final_simple_bid_logistic`
  ADD PRIMARY KEY (`Slno_simple_item`);

--
-- Indexes for table `Ilab_master_items_material`
--
ALTER TABLE `Ilab_master_items_material`
  ADD PRIMARY KEY (`Slno_item`);

--
-- Indexes for table `Ilab_master_loaction_details`
--
ALTER TABLE `Ilab_master_loaction_details`
  ADD PRIMARY KEY (`slno_loc`);

--
-- Indexes for table `Ilab_master_logistic_vehicle_commerical`
--
ALTER TABLE `Ilab_master_logistic_vehicle_commerical`
  ADD PRIMARY KEY (`Slno_logic_comm`);

--
-- Indexes for table `Ilab_master_material_category_file`
--
ALTER TABLE `Ilab_master_material_category_file`
  ADD PRIMARY KEY (`slno_id`);

--
-- Indexes for table `Ilab_master_mr_approver_order`
--
ALTER TABLE `Ilab_master_mr_approver_order`
  ADD PRIMARY KEY (`Slno_approver`),
  ADD KEY `Mr_id` (`Mr_id`),
  ADD KEY `Slno_mr_id` (`Slno_mr_id`),
  ADD KEY `Job_code` (`Job_code`);

--
-- Indexes for table `Ilab_master_mr_file_upload`
--
ALTER TABLE `Ilab_master_mr_file_upload`
  ADD PRIMARY KEY (`slno_file`),
  ADD KEY `mr_no_id` (`mr_no_id`),
  ADD KEY `slno_mr_id` (`slno_mr_id`);

--
-- Indexes for table `Ilab_master_mr_file_upload_m`
--
ALTER TABLE `Ilab_master_mr_file_upload_m`
  ADD PRIMARY KEY (`slno_file`),
  ADD KEY `mr_no_id` (`pr_no`),
  ADD KEY `slno_mr_id` (`pr_no_slno`);

--
-- Indexes for table `Ilab_master_mr_job_comments`
--
ALTER TABLE `Ilab_master_mr_job_comments`
  ADD PRIMARY KEY (`Slno_comment`),
  ADD KEY `Mr_id` (`Mr_id`),
  ADD KEY `Slno_mr_id` (`Slno_mr_id`);

--
-- Indexes for table `Ilab_master_mr_job_details`
--
ALTER TABLE `Ilab_master_mr_job_details`
  ADD PRIMARY KEY (`slno_mr`),
  ADD UNIQUE KEY `mr_no` (`mr_no`);

--
-- Indexes for table `Ilab_master_mr_job_details_m`
--
ALTER TABLE `Ilab_master_mr_job_details_m`
  ADD PRIMARY KEY (`slno_mr`),
  ADD UNIQUE KEY `mr_no` (`pr_no`);

--
-- Indexes for table `Ilab_master_mr_job_details_m_clone`
--
ALTER TABLE `Ilab_master_mr_job_details_m_clone`
  ADD PRIMARY KEY (`slno_mr`);

--
-- Indexes for table `Ilab_master_mr_location`
--
ALTER TABLE `Ilab_master_mr_location`
  ADD PRIMARY KEY (`slno_loca_mr`);

--
-- Indexes for table `Ilab_master_mr_material_item`
--
ALTER TABLE `Ilab_master_mr_material_item`
  ADD PRIMARY KEY (`slno_item_mr`),
  ADD KEY `material_item_id` (`material_item_id`),
  ADD KEY `mr_no_item` (`mr_no_item`),
  ADD KEY `slno_mr_id` (`slno_mr_id`);

--
-- Indexes for table `Ilab_master_mr_material_item_m`
--
ALTER TABLE `Ilab_master_mr_material_item_m`
  ADD PRIMARY KEY (`slno_item_mr`),
  ADD KEY `material_item_id` (`material_item_id`),
  ADD KEY `mr_no_item` (`mr_no_item`),
  ADD KEY `slno_mr_id` (`slno_mr_id`);

--
-- Indexes for table `Ilab_master_mr_technical_parameter_info`
--
ALTER TABLE `Ilab_master_mr_technical_parameter_info`
  ADD PRIMARY KEY (`slno_para`),
  ADD KEY `mr_no_tech` (`mr_no_tech`),
  ADD KEY `slno_mr_id_tech` (`slno_mr_id_tech`),
  ADD KEY `tech_slno_id` (`tech_slno_id`),
  ADD KEY `slno_item_mr_tech` (`slno_item_mr_tech`);

--
-- Indexes for table `Ilab_master_mr_vehicle_mr_detail`
--
ALTER TABLE `Ilab_master_mr_vehicle_mr_detail`
  ADD PRIMARY KEY (`slno_mr_logistic`),
  ADD KEY `mr_no_vehicle` (`mr_no_vehicle`),
  ADD KEY `slno_mr_id_vehicle` (`slno_mr_id_vehicle`),
  ADD KEY `vehicle_slno_id` (`vehicle_slno_id`);

--
-- Indexes for table `Ilab_master_new_order_book`
--
ALTER TABLE `Ilab_master_new_order_book`
  ADD PRIMARY KEY (`Slno_n_order`),
  ADD KEY `Slno_project` (`Slno_project`);

--
-- Indexes for table `Ilab_master_procurement_MR`
--
ALTER TABLE `Ilab_master_procurement_MR`
  ADD PRIMARY KEY (`Slno_procurement`),
  ADD KEY `Mr_id` (`Mr_id`),
  ADD KEY `Job_code` (`Job_code`),
  ADD KEY `Slno_approver_id` (`Slno_approver_id`),
  ADD KEY `Procurement_id` (`Procurement_id`),
  ADD KEY `Buyer_id` (`buyer_name`),
  ADD KEY `Slno_MR_id` (`Slno_MR_id`);

--
-- Indexes for table `Ilab_master_project`
--
ALTER TABLE `Ilab_master_project`
  ADD PRIMARY KEY (`Project_Slno`);

--
-- Indexes for table `Ilab_master_pr_comments_c`
--
ALTER TABLE `Ilab_master_pr_comments_c`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_pr_process_detail`
--
ALTER TABLE `Ilab_master_pr_process_detail`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_pr_process_detail_clone`
--
ALTER TABLE `Ilab_master_pr_process_detail_clone`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_pr_schedule`
--
ALTER TABLE `Ilab_master_pr_schedule`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `Ilab_master_pr_schedule_file`
--
ALTER TABLE `Ilab_master_pr_schedule_file`
  ADD PRIMARY KEY (`slno_id`);

--
-- Indexes for table `Ilab_master_rankorder_bid`
--
ALTER TABLE `Ilab_master_rankorder_bid`
  ADD PRIMARY KEY (`Slno_rankorder`);

--
-- Indexes for table `Ilab_master_rankorder_bid_item`
--
ALTER TABLE `Ilab_master_rankorder_bid_item`
  ADD PRIMARY KEY (`Slno_rankorder_item`);

--
-- Indexes for table `Ilab_master_rankorder_bid_item_misc`
--
ALTER TABLE `Ilab_master_rankorder_bid_item_misc`
  ADD PRIMARY KEY (`Slno_rankorder_misc`);

--
-- Indexes for table `Ilab_master_rankorder_bid_item_misc_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_item_misc_temp`
  ADD PRIMARY KEY (`Slno_rankorder_misc`);

--
-- Indexes for table `Ilab_master_rankorder_bid_item_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_item_temp`
  ADD PRIMARY KEY (`Slno_rankorder_item`);

--
-- Indexes for table `Ilab_master_rankorder_bid_logistics`
--
ALTER TABLE `Ilab_master_rankorder_bid_logistics`
  ADD PRIMARY KEY (`Slno_rankorder_item`);

--
-- Indexes for table `Ilab_master_rankorder_bid_logistics_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_logistics_temp`
  ADD PRIMARY KEY (`Slno_rankorder_item`);

--
-- Indexes for table `Ilab_master_rankorder_bid_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_temp`
  ADD PRIMARY KEY (`Slno_rankorder`);

--
-- Indexes for table `Ilab_master_rankorder_item_total`
--
ALTER TABLE `Ilab_master_rankorder_item_total`
  ADD PRIMARY KEY (`Slno_rankorder_item_total`);

--
-- Indexes for table `Ilab_master_rankorder_item_total_temp`
--
ALTER TABLE `Ilab_master_rankorder_item_total_temp`
  ADD PRIMARY KEY (`Slno_rankorder_item_total`);

--
-- Indexes for table `Ilab_master_session_history`
--
ALTER TABLE `Ilab_master_session_history`
  ADD PRIMARY KEY (`slno_history`);

--
-- Indexes for table `Ilab_master_session_history_vendors`
--
ALTER TABLE `Ilab_master_session_history_vendors`
  ADD PRIMARY KEY (`slno_history`);

--
-- Indexes for table `Ilab_master_simple_bid`
--
ALTER TABLE `Ilab_master_simple_bid`
  ADD PRIMARY KEY (`Slno_simple`);

--
-- Indexes for table `Ilab_master_simple_bid_item`
--
ALTER TABLE `Ilab_master_simple_bid_item`
  ADD PRIMARY KEY (`Slno_simple_item`);

--
-- Indexes for table `Ilab_master_simple_bid_item_misc`
--
ALTER TABLE `Ilab_master_simple_bid_item_misc`
  ADD PRIMARY KEY (`Slno_simple_misc`);

--
-- Indexes for table `Ilab_master_simple_bid_item_total`
--
ALTER TABLE `Ilab_master_simple_bid_item_total`
  ADD PRIMARY KEY (`Slno_simple_item_total`);

--
-- Indexes for table `Ilab_master_simple_bid_logistic`
--
ALTER TABLE `Ilab_master_simple_bid_logistic`
  ADD PRIMARY KEY (`Slno_simple_item`);

--
-- Indexes for table `Ilab_master_technical_detail`
--
ALTER TABLE `Ilab_master_technical_detail`
  ADD PRIMARY KEY (`Slno_technical`),
  ADD KEY `material_slno` (`material_slno`);

--
-- Indexes for table `Ilab_master_tech_bid_comment`
--
ALTER TABLE `Ilab_master_tech_bid_comment`
  ADD PRIMARY KEY (`Slno`);

--
-- Indexes for table `Ilab_master_tracking_tools`
--
ALTER TABLE `Ilab_master_tracking_tools`
  ADD PRIMARY KEY (`Slno_tracking`),
  ADD UNIQUE KEY `Po_no` (`Po_no`),
  ADD KEY `Job_code` (`Job_code`);

--
-- Indexes for table `Ilab_master_tracking_tools_m`
--
ALTER TABLE `Ilab_master_tracking_tools_m`
  ADD PRIMARY KEY (`Slno_tracking`),
  ADD UNIQUE KEY `Po_no` (`Po_no`),
  ADD KEY `Job_code` (`Job_code`);

--
-- Indexes for table `Ilab_master_tracking_tools_m_clone`
--
ALTER TABLE `Ilab_master_tracking_tools_m_clone`
  ADD PRIMARY KEY (`Slno_tracking`),
  ADD KEY `Job_code` (`Job_code`);

--
-- Indexes for table `Ilab_master_vehicle`
--
ALTER TABLE `Ilab_master_vehicle`
  ADD PRIMARY KEY (`Slno_vehicle`),
  ADD KEY `vehicle_type` (`vehicle_type`),
  ADD KEY `vehicle_capacity` (`vehicle_capacity`);

--
-- Indexes for table `Ilab_master_vehicle_capacity`
--
ALTER TABLE `Ilab_master_vehicle_capacity`
  ADD PRIMARY KEY (`Slno_vehicle`),
  ADD UNIQUE KEY `vehicle_capacity` (`vehicle_capacity`);

--
-- Indexes for table `Ilab_master_vehicle_type`
--
ALTER TABLE `Ilab_master_vehicle_type`
  ADD PRIMARY KEY (`Slno_vehicle`),
  ADD UNIQUE KEY `vehicle_type` (`vehicle_type`);

--
-- Indexes for table `Ilab_master_vendor_detail`
--
ALTER TABLE `Ilab_master_vendor_detail`
  ADD PRIMARY KEY (`Slno_vendor`),
  ADD UNIQUE KEY `Vendor_email_id` (`Vendor_email_id`);

--
-- Indexes for table `Ilab_master_vendor_file_token`
--
ALTER TABLE `Ilab_master_vendor_file_token`
  ADD PRIMARY KEY (`slno_tech_file`);

--
-- Indexes for table `Ilab_master_vendor_notifications`
--
ALTER TABLE `Ilab_master_vendor_notifications`
  ADD PRIMARY KEY (`slno_approve`);

--
-- Indexes for table `Ilab_master_vendor_tech_token_bid`
--
ALTER TABLE `Ilab_master_vendor_tech_token_bid`
  ADD PRIMARY KEY (`Slno_token`);

--
-- Indexes for table `Ilab_pms_log_entries`
--
ALTER TABLE `Ilab_pms_log_entries`
  ADD PRIMARY KEY (`Slno`);

--
-- Indexes for table `Ilab_section`
--
ALTER TABLE `Ilab_section`
  ADD PRIMARY KEY (`Section_Slno`);

--
-- Indexes for table `Ilab_Vendor_operation_detail`
--
ALTER TABLE `Ilab_Vendor_operation_detail`
  ADD PRIMARY KEY (`Slno_Vendor_operation`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ilab_activity`
--
ALTER TABLE `Ilab_activity`
  MODIFY `Activity_Slno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Ilab_assign_project_user`
--
ALTER TABLE `Ilab_assign_project_user`
  MODIFY `slno_assign_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `Ilab_master_admin`
--
ALTER TABLE `Ilab_master_admin`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `Ilab_master_bid`
--
ALTER TABLE `Ilab_master_bid`
  MODIFY `Slno_bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_commerical`
--
ALTER TABLE `Ilab_master_bid_commerical`
  MODIFY `Slno_bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_commericalevaluation`
--
ALTER TABLE `Ilab_master_bid_commericalevaluation`
  MODIFY `slno_bid_tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_date_details`
--
ALTER TABLE `Ilab_master_bid_date_details`
  MODIFY `Slno_bid_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_date_details_commerical`
--
ALTER TABLE `Ilab_master_bid_date_details_commerical`
  MODIFY `Slno_bid_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_date_details_m`
--
ALTER TABLE `Ilab_master_bid_date_details_m`
  MODIFY `Slno_bid_date` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_details`
--
ALTER TABLE `Ilab_master_bid_details`
  MODIFY `slno_bid_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_details_commerical`
--
ALTER TABLE `Ilab_master_bid_details_commerical`
  MODIFY `slno_bid_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_details_m`
--
ALTER TABLE `Ilab_master_bid_details_m`
  MODIFY `slno_bid_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_file_commerical`
--
ALTER TABLE `Ilab_master_bid_file_commerical`
  MODIFY `Slno_bid_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_file_technical`
--
ALTER TABLE `Ilab_master_bid_file_technical`
  MODIFY `Slno_bid_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_invitation_rank`
--
ALTER TABLE `Ilab_master_bid_invitation_rank`
  MODIFY `slno_invi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_invi_otp`
--
ALTER TABLE `Ilab_master_bid_invi_otp`
  MODIFY `slno_otp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_invi_rank_approvals`
--
ALTER TABLE `Ilab_master_bid_invi_rank_approvals`
  MODIFY `slno_approve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_invi_rank_not_app`
--
ALTER TABLE `Ilab_master_bid_invi_rank_not_app`
  MODIFY `slno_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_m`
--
ALTER TABLE `Ilab_master_bid_m`
  MODIFY `Slno_bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_otp_commerical`
--
ALTER TABLE `Ilab_master_bid_otp_commerical`
  MODIFY `slno_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_query`
--
ALTER TABLE `Ilab_master_bid_query`
  MODIFY `Slno_query` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_query_commerical`
--
ALTER TABLE `Ilab_master_bid_query_commerical`
  MODIFY `Slno_query` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_technicalevaluation`
--
ALTER TABLE `Ilab_master_bid_technicalevaluation`
  MODIFY `slno_bid_tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_technicalevaluation_m`
--
ALTER TABLE `Ilab_master_bid_technicalevaluation_m`
  MODIFY `slno_bid_tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_t_c_m`
--
ALTER TABLE `Ilab_master_bid_t_c_m`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_vendor`
--
ALTER TABLE `Ilab_master_bid_vendor`
  MODIFY `slno_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_vendor_commerical`
--
ALTER TABLE `Ilab_master_bid_vendor_commerical`
  MODIFY `slno_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_vendor_file_details`
--
ALTER TABLE `Ilab_master_bid_vendor_file_details`
  MODIFY `slno_document` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_bid_vendor_m`
--
ALTER TABLE `Ilab_master_bid_vendor_m`
  MODIFY `slno_vendor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_buyer_material_details`
--
ALTER TABLE `Ilab_master_buyer_material_details`
  MODIFY `slno_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `Ilab_master_buyer_MR`
--
ALTER TABLE `Ilab_master_buyer_MR`
  MODIFY `Slno_buyer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `Ilab_master_category`
--
ALTER TABLE `Ilab_master_category`
  MODIFY `Slno_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Ilab_master_category_item`
--
ALTER TABLE `Ilab_master_category_item`
  MODIFY `slno_master_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `Ilab_master_charges_other`
--
ALTER TABLE `Ilab_master_charges_other`
  MODIFY `Slno_other` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Ilab_master_closed_bid`
--
ALTER TABLE `Ilab_master_closed_bid`
  MODIFY `Slno_closed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Ilab_master_closed_bid_item`
--
ALTER TABLE `Ilab_master_closed_bid_item`
  MODIFY `Slno_closed_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_closed_bid_item_misc`
--
ALTER TABLE `Ilab_master_closed_bid_item_misc`
  MODIFY `Slno_closed_misc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `Ilab_master_closed_bid_item_total`
--
ALTER TABLE `Ilab_master_closed_bid_item_total`
  MODIFY `Slno_closed_item_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Ilab_master_closed_bid_logistics`
--
ALTER TABLE `Ilab_master_closed_bid_logistics`
  MODIFY `Slno_closed_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `Ilab_master_commercial_notifications`
--
ALTER TABLE `Ilab_master_commercial_notifications`
  MODIFY `slno_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Ilab_master_createuser`
--
ALTER TABLE `Ilab_master_createuser`
  MODIFY `Create_Slno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Ilab_master_date_schedule`
--
ALTER TABLE `Ilab_master_date_schedule`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_final_closed_bid_item`
--
ALTER TABLE `Ilab_master_final_closed_bid_item`
  MODIFY `Slno_closed_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_final_closed_bid_logistics`
--
ALTER TABLE `Ilab_master_final_closed_bid_logistics`
  MODIFY `Slno_closed_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Ilab_master_final_rankorder_bid_item`
--
ALTER TABLE `Ilab_master_final_rankorder_bid_item`
  MODIFY `Slno_rankorder_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_final_rankorder_bid_logistics`
--
ALTER TABLE `Ilab_master_final_rankorder_bid_logistics`
  MODIFY `Slno_rankorder_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_final_simple_bid_item`
--
ALTER TABLE `Ilab_master_final_simple_bid_item`
  MODIFY `Slno_simple_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `Ilab_master_final_simple_bid_logistic`
--
ALTER TABLE `Ilab_master_final_simple_bid_logistic`
  MODIFY `Slno_simple_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `Ilab_master_items_material`
--
ALTER TABLE `Ilab_master_items_material`
  MODIFY `Slno_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Ilab_master_loaction_details`
--
ALTER TABLE `Ilab_master_loaction_details`
  MODIFY `slno_loc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Ilab_master_logistic_vehicle_commerical`
--
ALTER TABLE `Ilab_master_logistic_vehicle_commerical`
  MODIFY `Slno_logic_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `Ilab_master_material_category_file`
--
ALTER TABLE `Ilab_master_material_category_file`
  MODIFY `slno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_approver_order`
--
ALTER TABLE `Ilab_master_mr_approver_order`
  MODIFY `Slno_approver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_file_upload`
--
ALTER TABLE `Ilab_master_mr_file_upload`
  MODIFY `slno_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_file_upload_m`
--
ALTER TABLE `Ilab_master_mr_file_upload_m`
  MODIFY `slno_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_job_comments`
--
ALTER TABLE `Ilab_master_mr_job_comments`
  MODIFY `Slno_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_job_details`
--
ALTER TABLE `Ilab_master_mr_job_details`
  MODIFY `slno_mr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_job_details_m`
--
ALTER TABLE `Ilab_master_mr_job_details_m`
  MODIFY `slno_mr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_job_details_m_clone`
--
ALTER TABLE `Ilab_master_mr_job_details_m_clone`
  MODIFY `slno_mr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_location`
--
ALTER TABLE `Ilab_master_mr_location`
  MODIFY `slno_loca_mr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_material_item`
--
ALTER TABLE `Ilab_master_mr_material_item`
  MODIFY `slno_item_mr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_material_item_m`
--
ALTER TABLE `Ilab_master_mr_material_item_m`
  MODIFY `slno_item_mr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_technical_parameter_info`
--
ALTER TABLE `Ilab_master_mr_technical_parameter_info`
  MODIFY `slno_para` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `Ilab_master_mr_vehicle_mr_detail`
--
ALTER TABLE `Ilab_master_mr_vehicle_mr_detail`
  MODIFY `slno_mr_logistic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `Ilab_master_new_order_book`
--
ALTER TABLE `Ilab_master_new_order_book`
  MODIFY `Slno_n_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Ilab_master_procurement_MR`
--
ALTER TABLE `Ilab_master_procurement_MR`
  MODIFY `Slno_procurement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `Ilab_master_project`
--
ALTER TABLE `Ilab_master_project`
  MODIFY `Project_Slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Ilab_master_pr_comments_c`
--
ALTER TABLE `Ilab_master_pr_comments_c`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Ilab_master_pr_process_detail`
--
ALTER TABLE `Ilab_master_pr_process_detail`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Ilab_master_pr_process_detail_clone`
--
ALTER TABLE `Ilab_master_pr_process_detail_clone`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_pr_schedule`
--
ALTER TABLE `Ilab_master_pr_schedule`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Ilab_master_pr_schedule_file`
--
ALTER TABLE `Ilab_master_pr_schedule_file`
  MODIFY `slno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid`
--
ALTER TABLE `Ilab_master_rankorder_bid`
  MODIFY `Slno_rankorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_item`
--
ALTER TABLE `Ilab_master_rankorder_bid_item`
  MODIFY `Slno_rankorder_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_item_misc`
--
ALTER TABLE `Ilab_master_rankorder_bid_item_misc`
  MODIFY `Slno_rankorder_misc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_item_misc_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_item_misc_temp`
  MODIFY `Slno_rankorder_misc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_item_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_item_temp`
  MODIFY `Slno_rankorder_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_logistics`
--
ALTER TABLE `Ilab_master_rankorder_bid_logistics`
  MODIFY `Slno_rankorder_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_logistics_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_logistics_temp`
  MODIFY `Slno_rankorder_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_bid_temp`
--
ALTER TABLE `Ilab_master_rankorder_bid_temp`
  MODIFY `Slno_rankorder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_item_total`
--
ALTER TABLE `Ilab_master_rankorder_item_total`
  MODIFY `Slno_rankorder_item_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Ilab_master_rankorder_item_total_temp`
--
ALTER TABLE `Ilab_master_rankorder_item_total_temp`
  MODIFY `Slno_rankorder_item_total` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_session_history`
--
ALTER TABLE `Ilab_master_session_history`
  MODIFY `slno_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;
--
-- AUTO_INCREMENT for table `Ilab_master_session_history_vendors`
--
ALTER TABLE `Ilab_master_session_history_vendors`
  MODIFY `slno_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `Ilab_master_simple_bid`
--
ALTER TABLE `Ilab_master_simple_bid`
  MODIFY `Slno_simple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `Ilab_master_simple_bid_item`
--
ALTER TABLE `Ilab_master_simple_bid_item`
  MODIFY `Slno_simple_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `Ilab_master_simple_bid_item_misc`
--
ALTER TABLE `Ilab_master_simple_bid_item_misc`
  MODIFY `Slno_simple_misc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;
--
-- AUTO_INCREMENT for table `Ilab_master_simple_bid_item_total`
--
ALTER TABLE `Ilab_master_simple_bid_item_total`
  MODIFY `Slno_simple_item_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `Ilab_master_simple_bid_logistic`
--
ALTER TABLE `Ilab_master_simple_bid_logistic`
  MODIFY `Slno_simple_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `Ilab_master_technical_detail`
--
ALTER TABLE `Ilab_master_technical_detail`
  MODIFY `Slno_technical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Ilab_master_tech_bid_comment`
--
ALTER TABLE `Ilab_master_tech_bid_comment`
  MODIFY `Slno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_tracking_tools`
--
ALTER TABLE `Ilab_master_tracking_tools`
  MODIFY `Slno_tracking` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_tracking_tools_m`
--
ALTER TABLE `Ilab_master_tracking_tools_m`
  MODIFY `Slno_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Ilab_master_tracking_tools_m_clone`
--
ALTER TABLE `Ilab_master_tracking_tools_m_clone`
  MODIFY `Slno_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Ilab_master_vehicle`
--
ALTER TABLE `Ilab_master_vehicle`
  MODIFY `Slno_vehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Ilab_master_vehicle_capacity`
--
ALTER TABLE `Ilab_master_vehicle_capacity`
  MODIFY `Slno_vehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Ilab_master_vehicle_type`
--
ALTER TABLE `Ilab_master_vehicle_type`
  MODIFY `Slno_vehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Ilab_master_vendor_detail`
--
ALTER TABLE `Ilab_master_vendor_detail`
  MODIFY `Slno_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Ilab_master_vendor_file_token`
--
ALTER TABLE `Ilab_master_vendor_file_token`
  MODIFY `slno_tech_file` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_master_vendor_notifications`
--
ALTER TABLE `Ilab_master_vendor_notifications`
  MODIFY `slno_approve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `Ilab_master_vendor_tech_token_bid`
--
ALTER TABLE `Ilab_master_vendor_tech_token_bid`
  MODIFY `Slno_token` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Ilab_pms_log_entries`
--
ALTER TABLE `Ilab_pms_log_entries`
  MODIFY `Slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `Ilab_section`
--
ALTER TABLE `Ilab_section`
  MODIFY `Section_Slno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Ilab_Vendor_operation_detail`
--
ALTER TABLE `Ilab_Vendor_operation_detail`
  MODIFY `Slno_Vendor_operation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Ilab_master_mr_file_upload`
--
ALTER TABLE `Ilab_master_mr_file_upload`
  ADD CONSTRAINT `file_mr_create` FOREIGN KEY (`mr_no_id`) REFERENCES `Ilab_master_mr_job_details` (`mr_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_mr_create_slno` FOREIGN KEY (`slno_mr_id`) REFERENCES `Ilab_master_mr_job_details` (`slno_mr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ilab_master_mr_material_item`
--
ALTER TABLE `Ilab_master_mr_material_item`
  ADD CONSTRAINT `mr_no_link` FOREIGN KEY (`mr_no_item`) REFERENCES `Ilab_master_mr_job_details` (`mr_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slno_mr_no_link` FOREIGN KEY (`slno_mr_id`) REFERENCES `Ilab_master_mr_job_details` (`slno_mr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ilab_master_mr_technical_parameter_info`
--
ALTER TABLE `Ilab_master_mr_technical_parameter_info`
  ADD CONSTRAINT `mr_no_link_TECH` FOREIGN KEY (`mr_no_tech`) REFERENCES `Ilab_master_mr_job_details` (`mr_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slno_item_no_link_TECH` FOREIGN KEY (`slno_item_mr_tech`) REFERENCES `Ilab_master_mr_material_item` (`slno_item_mr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slno_mr_no_link_TECH` FOREIGN KEY (`slno_mr_id_tech`) REFERENCES `Ilab_master_mr_job_details` (`slno_mr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ilab_master_mr_vehicle_mr_detail`
--
ALTER TABLE `Ilab_master_mr_vehicle_mr_detail`
  ADD CONSTRAINT `mr_no_link_vehicle` FOREIGN KEY (`mr_no_vehicle`) REFERENCES `Ilab_master_mr_job_details` (`mr_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vechile_mr_create_slno` FOREIGN KEY (`slno_mr_id_vehicle`) REFERENCES `Ilab_master_mr_job_details` (`slno_mr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ilab_master_new_order_book`
--
ALTER TABLE `Ilab_master_new_order_book`
  ADD CONSTRAINT `new_project_slno` FOREIGN KEY (`Slno_project`) REFERENCES `Ilab_master_project` (`Project_Slno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ilab_master_technical_detail`
--
ALTER TABLE `Ilab_master_technical_detail`
  ADD CONSTRAINT `technical_link_item_master` FOREIGN KEY (`material_slno`) REFERENCES `Ilab_master_items_material` (`Slno_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ilab_master_vehicle`
--
ALTER TABLE `Ilab_master_vehicle`
  ADD CONSTRAINT `vechile_capacitys` FOREIGN KEY (`vehicle_capacity`) REFERENCES `Ilab_master_vehicle_capacity` (`vehicle_capacity`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vechile_types` FOREIGN KEY (`vehicle_type`) REFERENCES `Ilab_master_vehicle_type` (`vehicle_type`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `test_event_03` ON SCHEDULE EVERY 10 SECOND STARTS '2019-02-01 17:45:32' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `Ilab_master_buyer_MR` SET `Ilab_master_buyer_MR`.`complete_status_bid`='1' WHERE `Ilab_master_buyer_MR`.`Slno_buyer`IN (SELECT `Ilab_master_bid_commerical`.`buyer_slno` FROM `Ilab_master_bid_commerical` WHERE `Ilab_master_bid_commerical`.`status_bid`='6')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
