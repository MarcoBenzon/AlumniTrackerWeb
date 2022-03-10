-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 10:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumnitracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `username`, `password`, `date`) VALUES
(1, 4230602, 'admin', '1234', '2021-04-20 16:03:09'),
(2, 71691196725727, 'Emman', 'qwerty', '2021-04-22 06:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(100) NOT NULL,
  `studnum` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `current_address` varchar(50) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `mobile_number` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `batch_grad` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `workplace` varchar(100) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `about_me` varchar(100) NOT NULL,
  `skills0` varchar(100) NOT NULL,
  `skills1` varchar(100) NOT NULL,
  `skills2` varchar(100) NOT NULL,
  `skills3` varchar(100) NOT NULL,
  `skills4` varchar(100) NOT NULL,
  `skills5` varchar(100) NOT NULL,
  `skills6` varchar(100) NOT NULL,
  `skills7` varchar(100) NOT NULL,
  `skills8` varchar(100) NOT NULL,
  `skills9` varchar(100) NOT NULL,
  `workexptitle1` varchar(100) NOT NULL,
  `workexppos1` varchar(100) NOT NULL,
  `workexpdate1` varchar(100) NOT NULL,
  `workexpdef1` varchar(100) NOT NULL,
  `workexptitle2` varchar(100) NOT NULL,
  `workexppos2` varchar(100) NOT NULL,
  `workexpdate2` varchar(100) NOT NULL,
  `workexpdef2` varchar(100) NOT NULL,
  `workexptitle3` varchar(100) NOT NULL,
  `workexppos3` varchar(100) NOT NULL,
  `workexpdate3` varchar(100) NOT NULL,
  `workexpdef3` varchar(100) NOT NULL,
  `educname1` varchar(100) NOT NULL,
  `educplace1` varchar(100) NOT NULL,
  `educcourse1` varchar(100) NOT NULL,
  `educdate1` varchar(100) NOT NULL,
  `educname2` varchar(100) NOT NULL,
  `educplace2` varchar(100) NOT NULL,
  `educcourse2` varchar(100) NOT NULL,
  `educdate2` varchar(100) NOT NULL,
  `educname3` varchar(100) NOT NULL,
  `educplace3` varchar(100) NOT NULL,
  `educdate3` varchar(100) NOT NULL,
  `educname4` varchar(100) NOT NULL,
  `educplace4` varchar(100) NOT NULL,
  `educdate4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `studnum`, `password`, `firstname`, `lastname`, `middlename`, `birthdate`, `birthplace`, `gender`, `home_address`, `current_address`, `civil_status`, `mobile_number`, `email`, `batch_grad`, `course`, `status`, `occupation`, `workplace`, `picture`, `about_me`, `skills0`, `skills1`, `skills2`, `skills3`, `skills4`, `skills5`, `skills6`, `skills7`, `skills8`, `skills9`, `workexptitle1`, `workexppos1`, `workexpdate1`, `workexpdef1`, `workexptitle2`, `workexppos2`, `workexpdate2`, `workexpdef2`, `workexptitle3`, `workexppos3`, `workexpdate3`, `workexpdef3`, `educname1`, `educplace1`, `educcourse1`, `educdate1`, `educname2`, `educplace2`, `educcourse2`, `educdate2`, `educname3`, `educplace3`, `educdate3`, `educname4`, `educplace4`, `educdate4`) VALUES
(18, '123456', 'Cayabyab', 'Abigale', 'Luna', 'Hello', '1999-11-22', 'Calasiao Pangasinan', 'Female', '#123 Barangay Dagupan City Pangasinan', '#123 Barangay Dagupan City Pangasinan', 'Married', 99999999, 'abibi08@gmail.com', 'S.Y. 2020', 'Bachelor of Education major in Biological Science', 'Employed', 'Teacher', 'PHINMA UPang', '', 'adasdasd', 'asdasd', 'asdasd', 'adas', 'dasdasd', 'adasdsa', '', '', '', '', '', 'dasdasdasdfsadf', 'asdasdasfsdafasdfasd', 'dasdasdasdfasdfasd', 'asdasasdfsadfasdfas', 'dasdasdasdfasdfasd', 'asdasdasasdfasdfsdaf', 'dasdasdasasdfsadfsad', 'asdasdasasdfsadfsad', 'dasdasasfasdfasdf', 'asdasdsadfsadfsdafs', 'asdasdadfsdfsdfasd', 'asdasdsafsadfsadfsadf', 'asdasdasfsadfasdfasdf', 'dasdasdassadfsdfsd', 'asdasdasASDasdaSD', '12312312321', 'dasdasdasdasdasdasdas', 'dasdasasdasdasdasdasdasd', 'dasdasdasdasdasdasdas', 'asdasdasasdasdas', 'asdasdasdfghjkawdasdasdas', 'asasdasddasdasdasdasdasd', 'asdasasda', 'adasdasdasdasdasdasdasdasdas', 'asdasd  sdfsadfas', 'asdasdasddfasdfsadfsad'),
(19, '1101', 'delacruz', 'Juanito', 'Dela Cruz', 'Santos', '1999-11-11', 'Dagupan City Pangasinan', 'Male', '#123 Barangay Dagupan City Pangasinan', '#123 Barangay Dagupan City Pangasinan', 'Single', 2147483647, 'qwerty@gmail.com', 'S.Y. 2019', 'Bachelor of Science in Electrical Engineering', 'Employed', 'Teacher', 'Amazing Corp.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '5555', 'castaÃ±eda', 'Emmanuel', 'CastaÃ±eda', 'Landingin', '2000-05-17', 'Dagupan City Pangasinan', 'Female', '#323 Mamalingling', '#323 Mamalingling Dagupan City Pangasinan', 'Widdowed', 912345678, 'eemmmmaannuueell05@gmail.com.ph', 'S.Y. 2020', 'Bachelor of Science in Information Technology', 'Employed', 'System Analyst', 'Google', 'user.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(100) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `DateSent` timestamp NOT NULL DEFAULT current_timestamp(),
  `Content` varchar(3000) NOT NULL,
  `FileImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `Sender`, `Subject`, `DateSent`, `Content`, `FileImage`) VALUES
(44, 'admin', 'Subject 2', '2021-05-26 12:38:40', 'Announce', 'images/Polyscias fruticosa.jpg'),
(45, 'admin', 'Sample83', '2021-05-26 12:43:48', 'nmhjghhjgj', 'images/plant16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `EventTitle` varchar(50) NOT NULL,
  `EventDescription` varchar(3000) NOT NULL,
  `FileImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `EventTitle`, `EventDescription`, `FileImage`) VALUES
(13, 'Sample title', 'Sample event', 'images/plant17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_editpages`
--

CREATE TABLE `tbl_editpages` (
  `AboutHeading` varchar(15) NOT NULL,
  `AboutContent` varchar(1000) NOT NULL,
  `ConUsAddress` varchar(50) NOT NULL,
  `ConUsNumber` varchar(20) NOT NULL,
  `ConUsLandline` varchar(20) NOT NULL,
  `ConUsEmail` varchar(50) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_editpages`
--

INSERT INTO `tbl_editpages` (`AboutHeading`, `AboutContent`, `ConUsAddress`, `ConUsNumber`, `ConUsLandline`, `ConUsEmail`, `id`) VALUES
('Welcome Alumni', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nesciunt, amet officia soluta, dolores. Hello World!', 'Arellano St. Dagupan City Pangasinan 2400', '+(63)9123456781', '02-1234560', 'phinmaupang@gmail.com.ph', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(100) NOT NULL,
  `JobTitle` varchar(50) NOT NULL,
  `JobDescription` varchar(3000) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `FileImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `JobTitle`, `JobDescription`, `Status`, `FileImage`) VALUES
(12, 'Sample Event Title', 'asdasd', 'Soon', 'images/plant 7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DateSent` (`DateSent`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_editpages`
--
ALTER TABLE `tbl_editpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_editpages`
--
ALTER TABLE `tbl_editpages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
