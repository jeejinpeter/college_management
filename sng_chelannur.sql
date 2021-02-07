-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 10:59 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sng_chelannur`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achievement`
--

CREATE TABLE IF NOT EXISTS `tbl_achievement` (
  `ach_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL COMMENT '1-student, 2-college, 3-staff',
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `ach_image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`ach_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_achievement`
--

INSERT INTO `tbl_achievement` (`ach_id`, `cat_id`, `title`, `description`, `ach_image`) VALUES
(1, 1, 'state level quiz competition', '<p>Out Students won state level&nbsp;quiz competition</p>\r\n', '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE IF NOT EXISTS `tbl_batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_year` varchar(30) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_year`) VALUES
(1, '2014-2017'),
(2, '2015-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collegefund`
--

CREATE TABLE IF NOT EXISTS `tbl_collegefund` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_year` varchar(30) NOT NULL,
  `date_tr` date NOT NULL,
  `amount` int(200) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_collegefund`
--

INSERT INTO `tbl_collegefund` (`f_id`, `ac_year`, `date_tr`, `amount`) VALUES
(1, '2014-2015', '2017-04-08', 67890);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_category` varchar(20) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `c_duration` int(20) NOT NULL,
  `c_description` varchar(100) NOT NULL,
  `semester1_id` varchar(50) DEFAULT NULL,
  `sem1_couse_fee` varchar(50) DEFAULT NULL,
  `sem1_subject_id` varchar(100) DEFAULT NULL,
  `semester2_id` varchar(50) DEFAULT NULL,
  `sem2_couse_fee` varchar(50) DEFAULT NULL,
  `sem2_subject_id` varchar(100) DEFAULT NULL,
  `semester3_id` varchar(50) DEFAULT NULL,
  `sem3_couse_fee` varchar(50) DEFAULT NULL,
  `sem3_subject_id` varchar(100) DEFAULT NULL,
  `semester4_id` varchar(50) DEFAULT NULL,
  `sem4_couse_fee` varchar(50) DEFAULT NULL,
  `sem4_subject_id` varchar(100) DEFAULT NULL,
  `semester5_id` varchar(50) DEFAULT NULL,
  `sem5_couse_fee` varchar(50) DEFAULT NULL,
  `sem5_subject_id` varchar(100) DEFAULT NULL,
  `semester6_id` varchar(50) DEFAULT NULL,
  `sem6_couse_fee` varchar(50) DEFAULT NULL,
  `sem6_subject_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `dept_id`, `c_name`, `c_category`, `c_type`, `c_duration`, `c_description`, `semester1_id`, `sem1_couse_fee`, `sem1_subject_id`, `semester2_id`, `sem2_couse_fee`, `sem2_subject_id`, `semester3_id`, `sem3_couse_fee`, `sem3_subject_id`, `semester4_id`, `sem4_couse_fee`, `sem4_subject_id`, `semester5_id`, `sem5_couse_fee`, `sem5_subject_id`, `semester6_id`, `sem6_couse_fee`, `sem6_subject_id`) VALUES
(1, 1, 'Bsc Mathematics', 'UG', 'sem', 3, 'Subject good', '1', '345', '1', '2', '566 ', '2', '3', '453', '3', '4', '567', '5', '5', '456', '6', '6', '567', '4'),
(4, 4, 'Msc Computer', 'PG', 'year', 2, 'Good work', 'y1', '500', '1,3', 'y2', '550', '2,4', 'Select year', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'Company3', 'PG', 'sem', 4, 'asdad', '1', '5', '2,6', '2', '6', '5,6', '3', '5', '2', '4', '5', '3', '5', '5', '2,4', '6', '6', '2'),
(11, 2, 'serf', 'UG', 'sem', 4, '', '--Select Semester--', '', NULL, '--Select Semester--', '', NULL, '', '', NULL, '', '', NULL, '--Select Semester--', '', NULL, '', '', NULL),
(12, 1, 'BSc Physics', 'UG', 'sem', 3, 'na', '1', '15000', '2', '2', '15000', '4', '3', '15000', '4', '4', '15000', '2,4', '5', '15000', '2,4', '6', '15000', '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_fees`
--

CREATE TABLE IF NOT EXISTS `tbl_course_fees` (
  `cfee_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_admno` int(11) NOT NULL,
  `cfees_amount` varchar(100) NOT NULL,
  `cfees_dues` varchar(100) NOT NULL,
  PRIMARY KEY (`cfee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_course_fees`
--

INSERT INTO `tbl_course_fees` (`cfee_id`, `st_admno`, `cfees_amount`, `cfees_dues`) VALUES
(1, 112, '15000', '15000'),
(2, 120, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`, `dept_code`) VALUES
(1, 'Department of Maths', 'Dpt M'),
(2, 'Department of Science', 'DS'),
(3, 'Department of English', 'DE'),
(4, 'Department of Computer Science', 'Dpt CS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `event_description` varchar(500) NOT NULL,
  `event_place` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `event_img` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_name`, `event_description`, `event_place`, `event_date`, `event_img`) VALUES
(2, 'Career Guidance Seminar', 'If you have any questions or doubt regarding any aspect of your career, just login and ask your question. It’s an integrated solution to provide instant, accessible, flexible and affordable career guidance and planning for you', 'Kollam ', '13-03-2017, 11:00am', 'imgbox11.jpg'),
(3, 'new upcoming event', 'this is some sample text..', 'sdff', '25-5-2017, 5:30pm', NULL),
(4, 'dfdfg', 'dfgdfgdfgdf', 'dfgdf', 'dfgdfg', NULL),
(5, 'hjmhkh', 'hjkhjkhjk', 'jkhjkhj', 'hjkhjk', NULL),
(6, 'hjmhkh', 'hjkhjkhjk', 'jkhjkhj', 'hjkhjk', NULL),
(7, 'hjmhkh', 'hjkhjkhjk', 'jkhjkhj', 'hjkhjk', 'imgbox22.jpg'),
(8, 'dfgdfg', 'fdgfghfgh', 'fghfg', 'ghfgh', 'imgbox12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_date` date NOT NULL,
  `c_id` int(11) NOT NULL,
  `typ_exam` varchar(60) NOT NULL,
  `e_sem` varchar(60) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`e_id`, `e_date`, `c_id`, `typ_exam`, `e_sem`) VALUES
(3, '2017-04-03', 1, 'Unit Test 2', '2'),
(4, '2017-04-01', 1, 'Unit Test 1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE IF NOT EXISTS `tbl_expense` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_amount` varchar(100) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`e_id`, `dept_id`, `exp_date`, `exp_amount`) VALUES
(4, 1, '2017-04-16', '1232333'),
(5, 3, '2017-04-16', '4500'),
(6, 1, '2017-03-30', '25,000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee_category`
--

CREATE TABLE IF NOT EXISTS `tbl_fee_category` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_category` varchar(50) NOT NULL,
  `fc_fee` bigint(20) NOT NULL,
  PRIMARY KEY (`fc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_fee_category`
--

INSERT INTO `tbl_fee_category` (`fc_id`, `fc_category`, `fc_fee`) VALUES
(16, 'Library', 1200),
(17, 'Admission Fees', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_fee_payment` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_pay_date` date NOT NULL,
  `fee_pay_amount` int(8) NOT NULL,
  `fee_pay_fine` int(8) DEFAULT NULL,
  `fee_pay_sem` varchar(20) NOT NULL,
  `fee_pay_adm_no` int(11) NOT NULL,
  PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_fee_payment`
--

INSERT INTO `tbl_fee_payment` (`fee_id`, `fee_pay_date`, `fee_pay_amount`, `fee_pay_fine`, `fee_pay_sem`, `fee_pay_adm_no`) VALUES
(1, '2017-04-06', 100, NULL, '1', 112),
(2, '2017-04-29', 3000, 0, '1', 112);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `title`, `image`) VALUES
(1, 'Christmas Celebrations ', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-admin,2-teaching,3-non-teaching, 8-superstaff, 9-superadmin',
  `designation` varchar(50) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `username`, `password`, `email`, `role`, `designation`) VALUES
(1, 'sngchr', '$2y$10$.7wvOzOBh7YPXcCRxgrQ6ewvXh8VSsZ3pHgCO7mOGrzd6AXLTlIL2', 'admin123@gmail.com', 1, 'admin'),
(2, 'arathy', '$2y$10$AYt3buSEM5kdR3jzMTumQeZ3V/ax1ARuuYDIqs/VvKn88ihuEjDzK', 'arathy123@gmail.com', 3, 'staff'),
(3, 'staff', '$2y$10$yCIEuHdrJq.Qs8v1gB2Yx.g8fR3xJRQDhiRvYXOdEfVtVPXJKFnxK', 'staff@gmail.com', 2, 'staff'),
(4, 'sntrust', '$2y$10$FewIi9./rRwAgk37CD2o.O86NWDzTViuSOkRVdmeQAzvP3rPYf2Vi', 'superadmin@mail.com', 9, 'superadmin'),
(6, 'sngchelannur', '$2y$10$0g1B6eU8XVaoJPKQKu9i7uqNSQVleFQ2T8ABWxDoyR7ATOnEXRkZO', 'chelannur@mail.com', 1, 'admin'),
(7, 'chelannur', '$2y$10$MCqv8SglqdSkbfGA2mMEBeEnmqPsDq3VM5iBj70Po/W7PBovIXRgG', 'truststaff@mail.com', 8, 'superstaff'),
(8, 'admin2', '$2y$10$7Zu4GqLS4G5UHUe13vstOO5dTp//uKjPq2zhoAsofBvuhVA1mUTra', 'adm@mail.com', 1, 'admin'),
(9, 'admin3', '$2y$10$DQVp7n6LzR0oVmijLupEPOK7IlMPL03pGIp6W3zdQecfbROj6I9A6', 'jee@mail.com', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE IF NOT EXISTS `tbl_marks` (
  `mid` int(20) NOT NULL AUTO_INCREMENT,
  `exam` varchar(150) NOT NULL,
  `admno` varchar(20) NOT NULL,
  `course` varchar(500) NOT NULL,
  `sem` varchar(500) NOT NULL,
  `batch` varchar(500) NOT NULL,
  `subject1` varchar(150) NOT NULL,
  `subject2` varchar(150) NOT NULL,
  `subject3` varchar(150) NOT NULL,
  `subject4` varchar(150) NOT NULL,
  `subject5` varchar(150) NOT NULL,
  `subject6` varchar(150) NOT NULL,
  `total` varchar(50) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`mid`, `exam`, `admno`, `course`, `sem`, `batch`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `total`) VALUES
(1, 'First Internal', '112', '1', '1', '2', '25', '25', '25', '25', '25', '25', '150'),
(2, 'First Internal', '113', '1', '1', '2', '20', '20', '20', '20', '20', '20', '120'),
(3, 'First Internal', '221', '2', '1', '2', '20', '20', '20', '20', '20', '20', '120'),
(4, 'First Internal', '3445', '2', '1', '2', '21', '21', '21', '21', '21', '21', '126');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `m_subject` varchar(150) NOT NULL,
  `message` longtext NOT NULL,
  `m_date` date NOT NULL,
  `m_status` tinyint(4) NOT NULL COMMENT '0-unread, 1-read',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`mid`, `m_subject`, `message`, `m_date`, `m_status`) VALUES
(1, 'test message', 'This is for testing purpose', '2017-04-27', 0),
(2, 'new msg', 'dfdfg', '2017-05-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_student`
--

CREATE TABLE IF NOT EXISTS `tbl_m_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_login_id` int(11) NOT NULL,
  `stud_admno` int(50) NOT NULL,
  `stud_roll_no` int(11) DEFAULT NULL,
  `stud_name` varchar(50) NOT NULL,
  `stud_img` varchar(250) NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `stud_address` varchar(100) NOT NULL,
  `stud_place` varchar(50) NOT NULL,
  `stud_district` varchar(50) NOT NULL,
  `stud_state` varchar(50) NOT NULL,
  `stud_ph` int(15) NOT NULL,
  `stud_guardian` varchar(50) NOT NULL,
  `stud_guardian_occupation` varchar(50) NOT NULL,
  `stud_p_address` varchar(100) NOT NULL,
  `stud_p_place` varchar(50) NOT NULL,
  `stud_p_district` varchar(50) NOT NULL,
  `stud_p_state` varchar(50) NOT NULL,
  `stud_nationality` varchar(70) NOT NULL,
  `stud_qualifiication` varchar(100) NOT NULL,
  `stud_religion` varchar(50) NOT NULL,
  `stud_cast` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `stud_join_date` date NOT NULL,
  `stud_batch_id` int(11) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_m_student`
--

INSERT INTO `tbl_m_student` (`student_id`, `student_login_id`, `stud_admno`, `stud_roll_no`, `stud_name`, `stud_img`, `gender`, `date_of_birth`, `stud_address`, `stud_place`, `stud_district`, `stud_state`, `stud_ph`, `stud_guardian`, `stud_guardian_occupation`, `stud_p_address`, `stud_p_place`, `stud_p_district`, `stud_p_state`, `stud_nationality`, `stud_qualifiication`, `stud_religion`, `stud_cast`, `course_id`, `stud_join_date`, `stud_batch_id`, `sem_id`, `reason`) VALUES
(4, 4, 112, 2, 'Sreela', 'Chrysanthemum7.jpg', 0, '2017-03-29', 'address current', 'place', 'district', 'state', 546546757, '', 'guardian', 'address2', 'place', 'district', 'state', 'india', 'qual', 'religion', '2017-04-06', 1, '2017-04-06', 1, 1, ''),
(5, 4, 113, 2, 'student res', 'Chrysanthemum7.jpg', 0, '2017-03-29', 'address current', 'place', 'district', 'state', 546546757, 'vbnbvnvn', 'guardian', 'address new', 'place', 'district', 'state', 'india', 'qual', 'religion', '2017-04-06', 4, '2017-04-06', 1, 1, ''),
(6, 4, 3463, 2, 'student nmae', 'Chrysanthemum7.jpg', 0, '2017-03-29', 'address current', 'place', 'district', 'state', 546546757, '', 'guardian', 'address2', 'place', 'district', 'state', 'india', 'qual', 'religion', '2017-04-06', 1, '2017-04-06', 2, 0, ''),
(7, 4, 201702, 1, 'Student', '21.jpg', 0, '1990-01-02', 'fghfgh', 'dsf', 'sdfsd', 'hghj', 2147483647, '', 'fgbfhf', 'fghfgh', 'fgdfgdf', 'fdg', 'dfgd', 'dfgdf', 'fgdf', 'hhsdjk', 'Hindu', 1, '2016-05-16', 1, 0, 'discontinued'),
(8, 4, 43436, 0, 'user ', 'Desert6.jpg', 0, '2017-04-14', 'sdfsfsd', 'place', 'kollam', 'state', 2147483647, '', 'businness', ' sdfdsfsdf', 'fsdf', 'sdfsd', 'sdsf', 'sdfsdf', 'sdfsdf', 'religion', '2017-04-06', 1, '2017-04-06', 1, 2, 'tc collected'),
(9, 4, 120, 12, 'Sumi', 'avatar2.png', 1, '1998-01-07', 'dfesdf', 'dfvsf', 'vdfvf', 'sdfd', 2147483647, '', 'sdfsd', 'sddf', 'dsdf', 'sfsdfsd', 'dfsd', 'sdfsd', 'sdfdf', 'vvv', 'some', 1, '2017-05-09', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(300) NOT NULL,
  `news_description` longtext NOT NULL,
  `news_image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_description`, `news_image`) VALUES
(1, 'Admissions open..Get your dream courses', '<p>Admissions started for the academic year 2017-2018.</p>\r\n', 'banner1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE IF NOT EXISTS `tbl_notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `notice` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice_id`, `title`, `notice`, `date`) VALUES
(3, 'Example1', 'ExampleExampleExampleExampleExampleExampleExampleExampleExampleExampleExample', '2017-01-28'),
(4, 'new notice', 'this is a sample text', '2017-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(20) NOT NULL,
  `sem_code` varchar(20) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`sem_id`, `sem_name`, `sem_code`) VALUES
(1, 'Semester I', 'S1'),
(2, 'Semester II', 'S2'),
(3, 'Semester III', 'S3'),
(4, 'Semester IV', 'S4'),
(5, 'Semester V', 'S5'),
(6, 'Semester VI', 'S6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_login_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_gender` int(5) NOT NULL COMMENT '1-Male,0-Female',
  `staff_address` varchar(100) NOT NULL,
  `staff_place` varchar(50) NOT NULL,
  `staff_district` varchar(50) NOT NULL,
  `staff_state` varchar(50) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_ph_number` varchar(50) NOT NULL,
  `staff_qualification` varchar(50) NOT NULL,
  `staff_join_date` date NOT NULL,
  `staff_img` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_login_id`, `staff_name`, `staff_gender`, `staff_address`, `staff_place`, `staff_district`, `staff_state`, `staff_dob`, `staff_ph_number`, `staff_qualification`, `staff_join_date`, `staff_img`) VALUES
(1, 3, 'Annie Sebastian', 0, 'Ann Villa', 'pattathanam', 'Kollam', 'kerala', '1990-09-08', '9874563211', 'M.A Hindi', '2017-01-05', 'dental.jpg'),
(2, 2, 'Arathy Babu', 0, 'Athira bhavan', 'Eruva', 'Alapuzha', 'Kerala', '1986-04-13', '9874563216', 'BBA', '2017-01-11', 'web_one.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_staff_attendance` (
  `attend_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_login_id` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `presents` int(30) NOT NULL,
  `absents` int(30) NOT NULL,
  `leaves` int(30) NOT NULL,
  `half_day` int(30) NOT NULL,
  `casual_leave` int(30) NOT NULL,
  `late` int(30) NOT NULL,
  `lop` int(30) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`attend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_staff_attendance`
--

INSERT INTO `tbl_staff_attendance` (`attend_id`, `staff_login_id`, `month`, `presents`, `absents`, `leaves`, `half_day`, `casual_leave`, `late`, `lop`, `remarks`) VALUES
(1, 3, 'April 2017', 2, 3, 1, 5, 4, 3, 3, 'bgjghjn'),
(2, 2, 'April 2017', 10, 6, 6, 7, 5, 4, 4, 'fcsvsd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_login_id` int(11) NOT NULL,
  `stud_admno` int(50) NOT NULL,
  `stud_roll_no` int(11) DEFAULT NULL,
  `stud_name` varchar(50) NOT NULL,
  `stud_img` varchar(250) NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `stud_address` varchar(100) NOT NULL,
  `stud_place` varchar(50) NOT NULL,
  `stud_district` varchar(50) NOT NULL,
  `stud_state` varchar(50) NOT NULL,
  `stud_ph` int(15) NOT NULL,
  `stud_guardian` varchar(50) NOT NULL,
  `stud_guardian_occupation` varchar(50) NOT NULL,
  `stud_p_address` varchar(100) NOT NULL,
  `stud_p_place` varchar(50) NOT NULL,
  `stud_p_district` varchar(50) NOT NULL,
  `stud_p_state` varchar(50) NOT NULL,
  `stud_nationality` varchar(70) NOT NULL,
  `stud_qualifiication` varchar(100) NOT NULL,
  `stud_religion` varchar(50) NOT NULL,
  `stud_cast` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `stud_join_date` date NOT NULL,
  `stud_batch_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_login_id`, `stud_admno`, `stud_roll_no`, `stud_name`, `stud_img`, `gender`, `date_of_birth`, `stud_address`, `stud_place`, `stud_district`, `stud_state`, `stud_ph`, `stud_guardian`, `stud_guardian_occupation`, `stud_p_address`, `stud_p_place`, `stud_p_district`, `stud_p_state`, `stud_nationality`, `stud_qualifiication`, `stud_religion`, `stud_cast`, `course_id`, `sem_id`, `stud_join_date`, `stud_batch_id`) VALUES
(4, 4, 112, 2, 'Sreela', 'Chrysanthemum7.jpg', 0, '2017-03-29', 'address current', 'place', 'district', 'state', 546546757, 'guardian', 'guardian', 'address2', 'place', 'district', 'state', 'india', 'qual', 'religion', '2017-04-06', 1, 1, '2017-04-06', 1),
(5, 4, 113, 2, 'student nmae', 'Chrysanthemum7.jpg', 0, '2017-03-29', 'address current', 'place', 'district', 'state', 546546757, '', 'guardian', 'address2', 'place', 'district', 'state', 'india', 'qual', 'religion', '2017-04-06', 1, 5, '2017-04-06', 1),
(6, 4, 3463, 2, 'student nmae', 'Chrysanthemum7.jpg', 0, '2017-03-29', 'address current', 'place', 'district', 'state', 546546757, '', 'guardian', 'address2', 'place', 'district', 'state', 'india', 'qual', 'religion', '2017-04-06', 1, 5, '2017-04-06', 2),
(7, 4, 120, 12, 'Sumi', 'avatar2.png', 1, '1998-01-07', 'dfesdf', 'dfvsf', 'vdfvf', 'sdfd', 2147483647, '', 'sdfsd', 'sddf', 'dsdf', 'sfsdfsd', 'dfsd', 'sdfsd', 'sdfdf', 'vvv', 'some', 1, 1, '2017-05-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_atten`
--

CREATE TABLE IF NOT EXISTS `tbl_student_atten` (
  `atten_id` int(11) NOT NULL AUTO_INCREMENT,
  `atten_day` int(11) NOT NULL,
  `atten_month` varchar(50) NOT NULL,
  `atten_cour_id` int(5) NOT NULL,
  `atten_batch_id` int(5) NOT NULL,
  PRIMARY KEY (`atten_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_student_atten`
--

INSERT INTO `tbl_student_atten` (`atten_id`, `atten_day`, `atten_month`, `atten_cour_id`, `atten_batch_id`) VALUES
(1, 25, 'April 2017', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_attentance`
--

CREATE TABLE IF NOT EXISTS `tbl_student_attentance` (
  `std_att_id` int(11) NOT NULL AUTO_INCREMENT,
  `atten_id` int(11) NOT NULL,
  `std_adm_no` int(11) NOT NULL,
  `std_prsnt_day` int(5) NOT NULL,
  `std_absnt_day` int(5) NOT NULL,
  PRIMARY KEY (`std_att_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_student_attentance`
--

INSERT INTO `tbl_student_attentance` (`std_att_id`, `atten_id`, `std_adm_no`, `std_prsnt_day`, `std_absnt_day`) VALUES
(1, 1, 113, 20, 5),
(2, 1, 112, 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `subject_code`) VALUES
(1, 'Digital system', 'Ds'),
(2, 'Electronics', 'E'),
(3, 'Literature', 'Lit'),
(4, 'Computer Science', 'Cs'),
(5, 'Statistics', 'STAT'),
(6, 'Organic Chemistry', 'OC');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timetable`
--

CREATE TABLE IF NOT EXISTS `tbl_timetable` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `sem_id` varchar(50) NOT NULL,
  `timetable` varchar(1000) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_timetable`
--

INSERT INTO `tbl_timetable` (`time_id`, `course_id`, `sem_id`, `timetable`) VALUES
(19, 1, '1', 'fees1.jpg'),
(20, 6, '1', 'tab1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
