-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-09-25 17:42:15
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `assignment`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_PhoneNum` varchar(20) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_PhoneNum`, `admin_password`) VALUES
(5000, 'chonghf', 'chong@gmail.com', '010-12345678', '123 '),
(5001, 'jianHau', 'jh@gmail.com', '010-397402', 'abc123 ');

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(7) NOT NULL,
  `bookingTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `memberID` int(6) NOT NULL,
  `eventID` int(6) NOT NULL,
  `quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `booking`
--

INSERT INTO `booking` (`bookingID`, `bookingTime`, `memberID`, `eventID`, `quantity`) VALUES
(2255007, '2022-09-20 07:48:29', 220003, 2277002, 10),
(2255013, '2022-09-20 08:19:14', 220005, 2277001, 10),
(2255014, '2022-09-20 16:15:09', 220001, 2277001, 5),
(2255015, '2022-09-20 17:42:36', 220001, 2277001, 20),
(2255016, '2022-09-21 10:37:49', 220001, 2277002, 3),
(2255017, '2022-09-21 10:38:49', 220001, 2277002, 4),
(2255018, '2022-09-21 10:52:11', 220001, 2277002, 3),
(2255019, '2022-09-21 10:54:01', 220001, 2277002, 1),
(2255020, '2022-09-21 10:54:08', 220001, 2277002, 1),
(2255021, '2022-09-21 10:54:11', 220001, 2277002, 1),
(2255022, '2022-09-21 10:56:10', 220001, 2277002, 1),
(2255023, '2022-09-23 06:21:26', 220001, 2277002, 6),
(2255024, '2022-09-23 06:24:54', 220001, 2277002, 6),
(2255025, '2022-09-23 06:25:15', 220001, 2277002, 6),
(2255032, '2022-09-23 06:35:51', 220001, 2277002, 6),
(2255050, '2022-09-23 07:13:55', 220001, 2277002, 1),
(2255052, '2022-09-23 07:14:22', 220001, 2277002, 12),
(2255061, '2022-09-24 00:11:29', 220001, 2277002, 1),
(2255062, '2022-09-24 00:11:35', 220001, 2277001, 1),
(2255063, '2022-09-24 00:16:08', 220001, 2277002, 3),
(2255064, '2022-09-24 00:20:47', 220001, 2277002, 1),
(2255065, '2022-09-24 00:21:54', 220001, 2277001, 1),
(2255066, '2022-09-24 00:21:58', 220001, 2277002, 1),
(2255074, '2022-09-24 00:27:19', 220001, 2277002, 1),
(2255075, '2022-09-24 00:29:57', 220001, 2277002, 1),
(2255079, '2022-09-24 00:37:42', 220001, 2277002, 1),
(2255080, '2022-09-24 10:56:04', 220001, 2277002, 1),
(2255081, '2022-09-24 15:18:58', 220001, 2277002, 1),
(2255082, '2022-09-24 15:25:52', 220001, 2277002, 1),
(2255083, '2022-09-24 15:26:21', 220001, 2277002, 1),
(2255084, '2022-09-24 15:26:46', 220001, 2277002, 1),
(2255085, '2022-09-24 15:29:00', 220001, 2277002, 1),
(2255086, '2022-09-24 15:30:39', 220001, 2277002, 1),
(2255087, '2022-09-24 15:31:06', 220001, 2277002, 1),
(2255088, '2022-09-24 15:34:04', 220001, 2277002, 1),
(2255089, '2022-09-24 15:35:42', 220001, 2277002, 1),
(2255090, '2022-09-24 15:49:30', 220001, 2277002, 1),
(2255091, '2022-09-24 15:54:22', 220001, 2277002, 2),
(2255092, '2022-09-24 15:54:43', 220001, 2277002, 2),
(2255093, '2022-09-24 15:55:08', 220001, 2277002, 2),
(2255094, '2022-09-24 15:55:34', 220001, 2277002, 2),
(2255095, '2022-09-24 15:56:16', 220001, 2277002, 2),
(2255096, '2022-09-24 15:58:20', 220001, 2277002, 2),
(2255097, '2022-09-24 15:58:57', 220001, 2277002, 2),
(2255098, '2022-09-24 15:59:07', 220001, 2277002, 2),
(2255099, '2022-09-24 16:00:05', 220001, 2277002, 2);

-- --------------------------------------------------------

--
-- 表的结构 `event`
--

CREATE TABLE `event` (
  `eventID` int(8) NOT NULL,
  `eventName` varchar(50) NOT NULL,
  `eventDesc` text NOT NULL,
  `venue` varchar(70) NOT NULL,
  `maxPerson` int(3) NOT NULL,
  `event_date` date NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `event_date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `event`
--

INSERT INTO `event` (`eventID`, `eventName`, `eventDesc`, `venue`, `maxPerson`, `event_date`, `event_start_time`, `event_end_time`, `event_date_created`) VALUES
(2277001, 'Art Competition Event', 'Come and join the Art Competition for amateur and beginner artist', 'Art Society Hall', 50, '2022-09-25', '15:18:56', '18:42:00', '2022-09-25'),
(2277002, 'Art Turtorial class Event', 'Come and join for free turtorial art class', 'Art Society Hall', 60, '2022-09-23', '10:00:00', '12:00:00', '2022-09-21'),
(2277005, 'ee', 'eventDesc', '11', 0, '2022-09-28', '11:11:00', '12:22:00', '2022-09-25');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `getbookingid`
-- （参见下面的实际视图）
--
CREATE TABLE `getbookingid` (
`memberID` int(6)
,`bookingID` int(7)
,`eventID` int(8)
,`eventName` varchar(50)
);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `memberID` int(6) NOT NULL,
  `firstN` varchar(20) NOT NULL,
  `lastN` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phoneNum` varchar(12) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`memberID`, `firstN`, `lastN`, `email`, `phoneNum`, `birth`, `gender`, `address`, `password`) VALUES
(220001, 'hidhidfeg433', 'rgjkbg4gr', 'email', '018-23517823', '2022-09-05', 'Male', 'address11111', '111'),
(220003, 'Chong', 'Li Chui', 'chonglc-wm21@student.tarc.edu.', '011-4848697', '2022-09-27', '', 'asda', '22222222'),
(220005, 'hong', 'jian hau', 'jianhau2003@gmail.com', '018-2351782', '2022-09-13', 'M', 'srtjrfgx', 'dfghtfj'),
(220008, 'sdf', 'rtg', 'sdf@gmail.com', '-5465345', '0000-00-00', '', 'sedfsa', '4564'),
(220009, 'hong', 'jian hau', 'jianhau2003@gmail.com', '018-2351782', '2022-09-01', '', 'srtjrfgx', '12312'),
(220012, 'dsf', 'sdf', 'jianhau2003@gmail.com', '12321', '2022-09-12', 'M', 'dfgdfg', 'dfghdf'),
(220013, 'dsf', 'sdf', 'jianhau2003@gmail.com', '12321', '2022-09-12', 'M', 'dfgdfg', 'dfghdf'),
(220014, 'dsf', 'sdf', 'jianhau2003@gmail.com', '12321', '2022-09-23', 'M', 'dfgdfg', 'as'),
(220015, 'Hung Fei', 'Chong', 'chonghf-wm21@student.tarc.edu.my', '0123333', '2022-09-19', 'Male', 'cccc', 'abc123'),
(220016, 'Hung Fei', 'Chong', 'chonghf-wm211@student.tarc.edu.my', '0123333', '2022-09-04', 'F', 'cccc', '111');

-- --------------------------------------------------------

--
-- 视图结构 `getbookingid`
--
DROP TABLE IF EXISTS `getbookingid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getbookingid`  AS SELECT `m`.`memberID` AS `memberID`, `b`.`bookingID` AS `bookingID`, `e`.`eventID` AS `eventID`, `e`.`eventName` AS `eventName` FROM ((`member` `m` join `booking` `b` on(`b`.`memberID` = `m`.`memberID`)) join `event` `e` on(`e`.`eventID` = `b`.`eventID`))  ;

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `eventID` (`eventID`);

--
-- 表的索引 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- 表的索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5003;

--
-- 使用表AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2255100;

--
-- 使用表AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2277006;

--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220017;

--
-- 限制导出的表
--

--
-- 限制表 `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
