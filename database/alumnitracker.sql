-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 09:13 AM
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
  `cpassword` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `mobile_number` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `username`, `password`, `cpassword`, `date`, `firstname`, `lastname`, `middlename`, `birthdate`, `birthplace`, `gender`, `home_address`, `current_address`, `civil_status`, `mobile_number`, `email`, `code`) VALUES
(19, 1234, 'upangadmin', 'admin', '', '2021-06-29 09:09:09', 'Marco', 'Benzon', 'Soriano', '2000-05-29', 'Villasis Pangasinan', 'Male', 'Malasiqui Pangasinan', 'Dagupan City', 'Single', 2147483647, 'excaliburblitz.0@gmail.com', ''),
(20, 12345, 'adminupang', 'phinmaupang', '', '0000-00-00 00:00:00', 'Marco', 'Benzon', 'Soriano', '2000-05-29', 'Villasis, Pangasinan', 'Male', 'Umando Malasiqui Pangasinan', 'Rioferio Rd. Dagupan City, Pangasinan', 'Single', 2147483647, 'rixahrix@gmail.com', ''),
(21, 123, 'admin', 'admin', '', '2021-07-21 10:23:56', 'Emanuelll', 'Castaneda', 'Castaneda', '', '', '', '', '', '', 0, '', ''),
(22, 123123, 'phinmaadmin', 'upangadmin', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(100) NOT NULL,
  `studnum` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
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
  `educdate4` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `workcompany1` varchar(100) NOT NULL,
  `workcompany2` varchar(100) NOT NULL,
  `workcompany3` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `saddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `studnum`, `password`, `cpassword`, `firstname`, `lastname`, `middlename`, `birthdate`, `birthplace`, `gender`, `home_address`, `current_address`, `civil_status`, `mobile_number`, `email`, `batch_grad`, `course`, `status`, `occupation`, `workplace`, `picture`, `about_me`, `skills0`, `skills1`, `skills2`, `skills3`, `skills4`, `skills5`, `skills6`, `skills7`, `skills8`, `skills9`, `workexptitle1`, `workexppos1`, `workexpdate1`, `workexpdef1`, `workexptitle2`, `workexppos2`, `workexpdate2`, `workexpdef2`, `workexptitle3`, `workexppos3`, `workexpdate3`, `workexpdef3`, `educname1`, `educplace1`, `educcourse1`, `educdate1`, `educname2`, `educplace2`, `educcourse2`, `educdate2`, `educname3`, `educplace3`, `educdate3`, `educname4`, `educplace4`, `educdate4`, `code`, `workcompany1`, `workcompany2`, `workcompany3`, `sname`, `saddress`) VALUES
(8, '03-1819-01726', 'soriano', '', 'Marco', 'Benzon', 'Soriano', '2000-05-29', 'Villasis Pangasinan', 'Male', 'Umando Malasiqui Pangasinan', 'Rioferio Rd. Pantal St. Dagupan City, Pangasinan', 'Single', 123123, 'blanchebenzon@gmail.com', '2020', 'Bachelor of Science in Information Technology', 'Employed', 'Student', 'UPANG', 'images/IMG_1903.jpg', 'Hello', 'Communication', 'Programming', 'Designing', 'Mathematics', 'Cybersecurity', '', '', '', '', '', 'Web Developing', 'Full-stack Developer', '2021-Present', 'Creating Web-based Alumni Tracker System', 'Mobile Developing', 'Full-stack Developer', '2020-2019', 'Creating Mobile-based Alumni Tracker', 'Web Developing', 'Project Manager', '2019-2020', 'Creating Web-based Online Movie Ticket Reservation System', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan', 'Bachelor of Science in Information Technology', '2020', 'Perpetual Help College of Pangasinan', 'Monteymayor St. Malasiqui Pangasinan', 'STEM', '2016-2018', 'Malasiqui National Highschool', 'Monteymayor St. Malasiqui Pangasinan', '2012-2016', 'Bakitiw Elementary School', 'Bakitiw Malasiqui Pangasinan', '2006-2012', '', 'Capstone Technology', 'Capstone Technology', 'SIA', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(9, '123', 'CASTANEDA', '', 'Emmanuel', 'Castaneda', 'Castaneda', '1999-01-01', 'Pangasinan', 'Male', 'Pangasinan', 'Pangasinan', 'Single', 123455, 'blanchebenzon@gmail.com', '2012', 'Bachelor of Education major in Mathematics', 'Unemployed', '', '', 'images/IMG_20210127_132534.jpg', 'Hello', '', '', '', '', '', '', '', '', '', '', 'system engineer', 'system engineer 1', '2019-2020', 'design website', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan', 'Bachelor of Education major in Mathematics', '2012', '', '', '', '', '', '', '', '', '', '', '', 'abc company', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(10, '1234', 'VIDAL', '', 'Sofia', 'Vidal', 'Vidal', '1999-02-02', 'Pangasinan', 'Female', 'Pangasinan', '', 'Single', 123456789, 'rixahrix@gmail.com', '2013', 'Bachelor of Science in Business Administration major in Financial Management', 'Unemployed', '', '', 'images/IMG_20210127_141110.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(12, '123123', 'BRAGANZA', '', 'Josh', 'Braganza', 'Braganza', '0000-00-00', '', 'Male', '', '', 'Single', 0, 'josh.braganza@up.phinma.edu.ph', '2010', 'Bachelor of Science in Accounting Technology', 'Employed', '', '', 'images/IMG_1748.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan', 'Bachelor of Science in Accounting Technology', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(13, '12345', 'MANAOIS', '', 'Reymark', 'Manaois', 'Manaois', '0000-00-00', '', 'Male', '', '', 'Single', 0, 'reym.manaois@up.phinma.edu.ph', '2011', 'Bachelor of Education major in Mathematics', 'Employed', '', '', 'images/IMG_20210127_132639.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan', 'Bachelor of Education major in Mathematics', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(18, '03-123123', 'sample', '', 'Hello', 'Hello', 'Hello', '0000-00-00', '', 'Male', '', '', '', 0, 'padilla@gmail.com', '2016', 'Bachelor of Science in Criminology', 'Unemployed', '', '', 'images/IMG_20210127_132624.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(19, '03-1234-12345', 'SAMPLING', '', 'Sampling', 'Sampling', 'Sampling', '0000-00-00', '', 'Male', '', '', '', 0, 'sampling@gmail.com', '2014', 'Bachelor of Education', 'Unemployed', '', '', 'images/IMG_20210127_132228.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(20, '121212', 'TEST', '', 'Test', 'Test', 'Test', '0000-00-00', '', 'Female', '', '', '', 0, 'test@gmail.com', '2018', 'Bachelor of Science in Architecture', 'Unemployed', '', '', 'images/IMG_20210127_133731.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(21, '03-1718-01896', 'ORJALO', '', 'Jiulieno Luis', 'Orjalo', 'Arenas', '0000-00-00', '', 'Male', '', '', '', 0, 'jiulienoluis3456@gmail.com', '2016', 'Bachelor of Arts in Political Science', 'Unemployed', '', '', 'images/IMG_1790.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(22, '123123123123', 'GALANG', '', 'Jairus', 'Galang', 'Galang', '0000-00-00', '', 'Male', '', '', '', 0, 'jaigalang@gmail.com', '2014', 'Bachelor of Science in Business Administration major in Financial Management', 'Unemployed', '', '', 'images/IMG_1836.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(23, '98765', 'MACARAEG', '', 'Pablo', 'Macaraeg', 'Jan', '0000-00-00', '', 'Male', '', '', '', 0, 'pablo@gmail.com', '2014', 'Bachelor of Science in Hospitality Management', 'Unemployed', '', '', 'images/IMG_1786.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan'),
(24, '090909', 'CRUZ', '', 'Prince', 'Cruz', 'Cruz', '0000-00-00', '', 'Male', '', '', '', 0, 'prince@gmail.com', '2019', 'Bachelor of Education major in Biological Science', 'Unemployed', '', '', 'images/IMG_1866.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PHINMA University of Pangasinan', 'Arellano St. Dagupan City, Pangasinan');

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
(46, 'upangadmin', 'Enrollment is Still Open', '2021-07-21 12:01:36', 'The best quality education is RIGHT here! Enrollment is still OPEN until August for incoming G11, Freshmen, and Transferees.\r\nOnsite Enrollment Schedule: \r\nMonday to Friday - 8:00 am to 4:00pm \r\nSaturday- 8:00 am to 3:00 pm\r\nWhen visiting onsite please observe the health protocols. \r\nYou may also fill out the online SPR for easier and faster transactions: \r\nhttp://bit.ly/SY2122PHINMAUPOnlineRegForm\r\nExperience the Best Quality Education, Enroll now!\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation', 'images/1.jpg'),
(47, 'upangadmin', 'CHED Scholarship Programs', '2021-07-21 12:06:18', 'Heads up, PHINMA Ed students!\r\nTo our incoming freshmen/SHS graduates:\r\nThe CHED Scholarship Programs (CSPs) are intended for eligible INCOMING FRESHMEN students whose General Weighted Average (GWA) is at least 96% or its equivalent for Full Merit Program and 93% to 95% or its equivalent for Half Merit Program, who must enroll in recognized priority programs in Higher Education Institutions (HEIs). The availment of the type of scholarships is determined through the ranking system and availability of slots.\r\nCHED Scholarship application link: stufaps.chedro1.com\r\nPlease refer to our infographics for more information on the CHED Scholarship Program. Furthermore, applicants should fill in this link AFTER complete submission of the requirements on this scholarship so we can monitor applications: https://tinyurl.com/x76zxjah\r\nFor more details about the CHED Scholarship Programs (CSPs)  kindly message our CSDL page: m.me/up.csdl or call us at Scholarship Unit Helpline at 0951 876 2372 for inquiries.\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation\r\n', 'images/2.jpg'),
(48, 'upangadmin', 'Happy Eidl Adha Mubarak', '2021-07-21 12:08:12', 'Happy Eidl Adha Mubarak to our Muslim Brothers and Sisters. May your life be as beautiful as the crescent moon.\r\nWe are open today from 8:00 AM to 3:00 PM\r\nYou may also fill out the online SPR for easier and faster transactions: \r\nhttp://bit.ly/SY2122PHINMAUPOnlineRegForm\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation', 'images/3.jpg'),
(49, 'upangadmin', 'Student IT Supports', '2021-07-21 12:10:58', 'Heads up, PHINMA Ed students!\r\nFor IT-related problems, you may fill-out this google form for us to address it properly. Concerns with signing in to new e-mail, inclusion in Google Classroom, and access to student portal (AIMS) shall be submitted here: https://bit.ly/PEN_ITSUPPORT\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation', 'images/5.jpg'),
(50, 'upangadmin', 'ADVISORY', '2021-07-24 10:58:31', 'Please be informed that there will be NO ONSITE TRANSACTIONS in PHINMA UPang Main Campus and PHINMA UPang College Urdaneta on July 24, 2021, due to the inclement weather.\r\nHowever, our ONLINE PLATFORMS will remain available. \r\nEnrollment link: http://bit.ly/SY2122PHINMAUPOnlineRegForm\r\nFor Gcash Payment: \r\nBILLER NAME: PHINMA UNIVERSITY OF PANGASINAN \r\nStudent Number: Please use the provided Admission Number\r\nFor ECPay Payment: \r\nBILLER NAME: PHINMA EDUCATION \r\nFor Bank Deposit Payment: \r\nAccount Name: PHINMA UNIVERSITY OF PANGASINAN, INC. \r\nRCBC Account Number: 9005208703\r\nCHINABANK Account Number: 3690102713 \r\nOnce payment is completed, please submit your proof of payment to this link: https://bit.ly/UPPaymentForm2122 \r\nPlease be guided accordingly.\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation', 'images/9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `companyemail` varchar(100) NOT NULL,
  `companypassword` varchar(100) NOT NULL,
  `companynumber` varchar(100) NOT NULL,
  `companywebsite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `companyname`, `companyemail`, `companypassword`, `companynumber`, `companywebsite`) VALUES
(3, 'ABC Incorporated', 'abcincorporated@gmail.com', 'ABCINCORPORATED', '123456789', 'abcincorporated.com');

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
(15, 'Module Distribution', 'Heads up, PHINMA Ed students!\r\nTo ensure everyone’s safety, we would like to remind all to follow the posted schedule. It is also important to us that you are convenient in your transactions in the campus.\r\nShould you have queries, our Module Helpline (0951 876 2796) is open to accommodate you.\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation', 'images/4.jpg'),
(16, 'IT Enrollment', 'Start creating limitless opportunities for your future career in Information Technology! Together, with our globally competitive partners, your training will be at par to better prepare you to become successful in your chosen track. \r\nEnroll now!  http://bit.ly/SY2122PHINMAUPOnlineRegForm\r\n#KasamaKoAngPHINMAEd\r\n#MakingLivesBetterThroughEducation', 'images/6.jpg'),
(17, 'BS Computer Science', 'Here at PHINMA UPang College Urdaneta, lets start creating limitless opportunities for your career in BS Computer Science! With 94% employability rate within SIX months after graduation, the future is bright!\r\nStart your ComSci journey here: http://bit.ly/SY2122PHINMAUPOnlineRegForm\r\n#KasamaKoAngPHINMAEducation\r\n#MakingLivesBetterThroughEducation', 'images/7.jpg'),
(18, 'An Introduction on Augmented Reality Business Solu', 'All IT students are invited to attend the webinar \"Introduction to Augmented Reality Business Solutions\" on June 18 at 10 a.m. via Facebook PHINMAEd Career Linkages.\r\nThe webinar is in partnership with tech company Boom Technologies Philippines (Mandaluyong) and will be spearheaded by CITE BSIT alumni Kim Dominic Kim Dominique Naoe Vasquez and Caroline Ignacio.', 'images/8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `likes` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `comments`, `comment_name`, `date`, `likes`, `post_id`) VALUES
(193, 'very good', 'Emmanuel Castaneda', '2021-07-27 22:55:04', 0, 50),
(194, 'nayswan ', 'Emmanuel Castaneda', '2021-07-27 22:55:12', 0, 49),
(195, 'hello', 'Marco Benzon', '2021-07-28 14:48:52', 0, 50),
(196, 'adasdasdsa', 'Marco Benzon', '2021-07-28 14:58:12', 0, 50),
(197, 'hiii', 'Marco Benzon', '2021-07-28 15:07:49', 0, 15);

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
('Welcome Alumni', 'Alumni Tracker is an online-based application that helps to enhance the \r\ntracking of college graduates. The project primarily aims to replace current \r\ntracking procedure of college graduates and providing alumni data to college \r\nfaculties. It aims at developing a web portal which will be useful for the college to \r\nmonitor the alumina\'s and for the alumni to update their current status and get \r\nnotified about the college activities.', 'Arellano St. Dagupan City Pangasinan 2400', '+(63)9123456781', '02-1234560', 'phinmaupang@gmail.com.ph', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(100) NOT NULL,
  `JobTitle` varchar(50) NOT NULL,
  `JobDescription` varchar(3000) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `FileImage` varchar(50) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `CompanyEmail` varchar(100) NOT NULL,
  `CompanyAddress` varchar(100) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `DatePosted` timestamp NOT NULL DEFAULT current_timestamp(),
  `PostedBy` varchar(100) NOT NULL,
  `PostedById` varchar(100) NOT NULL,
  `PostedByAlumni` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `JobTitle`, `JobDescription`, `Status`, `FileImage`, `Category`, `CompanyName`, `CompanyEmail`, `CompanyAddress`, `Salary`, `DatePosted`, `PostedBy`, `PostedById`, `PostedByAlumni`) VALUES
(13, 'Event 2', 'Sample Event Description', 'Soon', 'images/sample.jpg', '', '', '', '', '', '0000-00-00 00:00:00', '', '', ''),
(18, 'Event 3', 'Hello World', 'Closed', 'images/', '', '', '', '', '', '0000-00-00 00:00:00', '', '', ''),
(19, 'dasdas', 'asdasdas', 'Soon', 'images/2020-11-20-21-22-22_0.png', '', '', '', '', '', '0000-00-00 00:00:00', '', '', ''),
(20, 'Job sample', 'Job sample', 'Soon', 'images/FB_IMG_1615387237795.jpg', 'Media', 'Job sample', 'jobsample@gmail.com', 'Job sample', '40000', '0000-00-00 00:00:00', 'admin', '', ''),
(21, 'Test Job', 'Test job', 'Closed', 'images/FB_IMG_1617978154724.jpg', 'Nursing', 'Test Job', 'testjob@gmail.com', 'Test Job', '25000', '0000-00-00 00:00:00', 'admin', '', ''),
(22, 'Test job1', 'Test Job', 'Now Open', 'images/', 'Law', 'Test Job1', 'testjob1@gmail.com', 'Test job', '2000', '0000-00-00 00:00:00', 'Test ', '', ''),
(23, 'Test job1', 'Test Job', 'Now Open', 'images/', 'Law', 'Test Job1', 'testjob1@gmail.com', 'Test job', '2000', '0000-00-00 00:00:00', 'Test ', '', ''),
(24, 'Customer Service Representative', 'Sample', 'Now Open', 'images/', 'Business', 'Sample', 'sample@gmail.com', 'Sample', '1000', '0000-00-00 00:00:00', 'Hello Padilla', '', ''),
(25, 'Customer Service Representative', 'Sample', 'Now Open', 'images/', 'Business', 'Sample', 'sample@gmail.com', 'Sample', '1000', '0000-00-00 00:00:00', 'Hello Padilla', '', ''),
(26, 'Sample1', 'sample1', 'Now Open', 'images/', 'Engineering', 'Sample1', 'sample1@gmail.com', 'sample1', '2000', '0000-00-00 00:00:00', 'Hello Padilla', '', ''),
(27, 'Sample1', 'sample1', 'Now Open', 'images/', 'Engineering', 'Sample1', 'sample1@gmail.com', 'sample1', '2000', '0000-00-00 00:00:00', 'Hello Padilla', '', ''),
(28, 'sampling', 'sampling', 'Soon', 'images/IMG_20210127_131849.jpg', 'Laboratory Science', 'sampling', 'sampling@gmail.com', 'sampling', '10000', '0000-00-00 00:00:00', 'adminupang', '', ''),
(29, 'sample2', 'sample2', 'Now Open', 'images/IMG_20210127_131849.jpg', 'Criminology', 'sample2', 'sample2@gmail.com', 'sample2', '10000', '2021-07-04 04:34:12', 'admin', '', ''),
(30, 'sample3', 'sample3', 'Soon', 'images/', 'Physical Therapy', 'sample3', 'sample3@gmail.com', 'sample3', '10000', '2021-07-04 04:36:29', 'sample3', '', ''),
(31, 'sample3', 'sample3', 'Soon', 'images/', 'Physical Therapy', 'sample3', 'sample3@gmail.com', 'sample3', '10000', '2021-07-04 04:36:29', 'sample3', '', ''),
(32, 'sample4', 'sample4', 'Soon', 'images/IMG_20210127_132624.jpg', 'Law', 'sample4', 'sample4@gmail.com', 'sample4', '100000', '2021-07-04 14:27:10', 'admin', '', ''),
(33, 'sample5', 'sample5', 'Closed', 'images/', 'Laboratory Science', 'sample5', 'sample5@gmail.com', 'sample5', '1000', '2021-07-04 14:28:11', 'sample5', '', ''),
(34, 'sample5', 'sample5', 'Closed', 'images/', 'Laboratory Science', 'sample5', 'sample5@gmail.com', 'sample5', '1000', '2021-07-04 14:28:11', 'sample5', '', ''),
(35, 'sample6', 'sample6', 'Soon', 'images/', 'Pharmacy', 'sample6', 'sample6@gmail.com', 'sample6', '1000', '2021-07-04 14:30:04', 'sample6', '', ''),
(36, 'sample6', 'sample6', 'Soon', 'images/', 'Pharmacy', 'sample6', 'sample6@gmail.com', 'sample6', '1000', '2021-07-04 14:30:04', 'sample6', '', ''),
(37, 'eqweqweq', 'dasdasdasdas', 'Soon', 'images/', 'Education', 'eqweqweqwe', 'eqweqeqw@dasdasdsa.com', 'sadasdasda', '12312312', '2021-07-04 14:32:08', 'khkjhkjhk', '', ''),
(38, 'eqweqweq', 'dasdasdasdas', 'Soon', 'images/', 'Education', 'eqweqweqwe', 'eqweqeqw@dasdasdsa.com', 'sadasdasda', '12312312', '2021-07-04 14:32:08', 'khkjhkjhk', '', ''),
(39, 'sample8', 'sample8', 'Closed', 'images/IMG_20210127_134811.jpg', 'Architecture', 'sample8', 'sample8@gmail.com', 'sample8', '10000', '2021-07-04 14:34:54', 'admin', '', ''),
(40, 'sample9', 'sample9', 'Soon', 'images/FB_IMG_1617715504588.jpg', 'Criminology', 'sample9', 'sample9@gmail.com', 'sample9', '10000', '2021-07-04 14:54:33', '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampp1htdocsAlumn', '', ''),
(41, 'sample10', 'sample10', 'Soon', 'images/IMG_20210127_133508.jpg', 'Criminology', 'sample10', 'sample10@gmail.com', 'sample10', '10000', '2021-07-04 15:04:51', '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampp1htdocsAlumn', '', ''),
(42, 'sample11', 'sample11', 'Hiring', 'images/IMG_20210127_134219.jpg', 'Hospitality', 'sample11', 'sample11@gmail.com', 'sample11', '1000', '2021-07-04 15:47:47', 'Emmanuel Castaneda', '', ''),
(43, 'sample12', 'sample12', 'Hiring', 'images/IMG_20210127_135507.jpg', 'Accountancy', 'sample12', 'sample12@gmail.com', 'sample12', '10000', '2021-07-06 02:58:00', 'Marco Benzon', '', ''),
(44, 'sample13', 'sample13', 'Hiring', 'images/IMG_1781.jpg', 'Laboratory Science', 'sample13', 'sample13@gmail.com', 'sample13', '10000', '2021-07-06 09:22:07', 'Marco Benzon', '', ''),
(45, 'sample14', 'sample14', 'Hiring', 'images/IMG_1797.jpg', 'Engineering', 'sample14', 'sample14@gmail.com', 'sample14', '10000', '2021-07-06 09:37:56', 'Marco Benzon', '', '');

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
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `tbl_editpages`
--
ALTER TABLE `tbl_editpages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
