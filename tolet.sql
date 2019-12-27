-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 11:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tolet`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `ABOUT_US_NO` int(11) NOT NULL,
  `ABOUT_US` longtext NOT NULL,
  `VIDEO_URL` text NOT NULL,
  `CONTACT_NO` varchar(55) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `ADDRESS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`ABOUT_US_NO`, `ABOUT_US`, `VIDEO_URL`, `CONTACT_NO`, `EMAIL`, `ADDRESS`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt', 'https://www.youtube.com/watch?v=2xHQqYRcrx4', '+8801710939304', 'info@tolethunt.com', 'Dhanmondi 9/A, Dhaka 1207');

-- --------------------------------------------------------

--
-- Table structure for table `available_on_floors`
--

CREATE TABLE `available_on_floors` (
  `AVAILABLE_ON_FLOOR_NO` int(11) NOT NULL,
  `AVAILABLE_ON_FLOOR` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `available_on_floors`
--

INSERT INTO `available_on_floors` (`AVAILABLE_ON_FLOOR_NO`, `AVAILABLE_ON_FLOOR`) VALUES
(1, 'Ground Floor'),
(2, '1st Floor'),
(3, '2nd Floor'),
(4, '3rd Floor'),
(5, '4th Floor'),
(6, '5th Floor'),
(7, '6th Floor'),
(8, 'Top Floor');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `CONTACT_US_NO` int(11) NOT NULL,
  `FULL_NAME` varchar(255) NOT NULL,
  `CONTACT_NO` varchar(55) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `MESSAGE` longtext NOT NULL,
  `USER_NO` int(11) NOT NULL,
  `SEND_TIME` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`CONTACT_US_NO`, `FULL_NAME`, `CONTACT_NO`, `EMAIL`, `MESSAGE`, `USER_NO`, `SEND_TIME`, `IS_DELETED`) VALUES
(1, 'RIYAD', '01234354', 'riyad@gmail.com', 'test', 0, '2019-04-23 20:45:32', 0),
(2, 'RIYAD', '01234354', 'riyad@gmail.com', 'jnnj', 0, '2019-05-01 21:03:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `COUNTER_NO` int(11) NOT NULL,
  `SOLD_HOUSE` int(11) NOT NULL,
  `DAILY_LISTING` int(11) NOT NULL,
  `EXPERT_AGENT` int(11) NOT NULL,
  `WON_PRIZE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gen_aminities`
--

CREATE TABLE `gen_aminities` (
  `AMENITY_NO` int(11) NOT NULL,
  `AMENITY_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_aminities`
--

INSERT INTO `gen_aminities` (`AMENITY_NO`, `AMENITY_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, ' Lift', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, ' Hot water', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Generator', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, ' Inter com', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, ' Wi-Fi', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, ' Security', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, ' Fire exit', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 'CCTV', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, ' Fire Protection\r\n', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 'Garrage', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 'Heater', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_areas`
--

CREATE TABLE `gen_areas` (
  `AREA_NO` int(11) NOT NULL,
  `CITY_NO` int(11) NOT NULL,
  `AREA_NAME` varchar(255) NOT NULL,
  `AREA_IMAGE` varchar(255) NOT NULL,
  `SHOW_HOME` int(1) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_areas`
--

INSERT INTO `gen_areas` (`AREA_NO`, `CITY_NO`, `AREA_NAME`, `AREA_IMAGE`, `SHOW_HOME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 'Uttara', '1557511017dhanmondi.jpg', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 1, 1, '2019-05-10 19:56:57'),
(2, 1, 'Mirpur', '1557511028dhanmondi.jpg', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 1, 1, '2019-05-10 19:57:08'),
(3, 1, 'Mohammadpur', '1557511040dhanmondi.jpg', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 1, 1, '2019-05-10 19:57:20'),
(4, 1, 'Dhanmondi', '1557511050dhanmondi.jpg', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 1, 1, '2019-05-10 19:57:30'),
(5, 1, 'Gulshan', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 1, 1, '2019-05-03 19:11:37'),
(6, 2, 'Daudkandi', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 3, 'CTG', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 4, 'Durgapur', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, 5, 'Jinaidah', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 2, 'Cumilla Sadar', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 3, 'FDSF', '15575110892.png', 0, 1, '2019-05-10 19:58:09', 1, 1, 2019, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_categorys`
--

CREATE TABLE `gen_categorys` (
  `CATEGORY_NO` int(11) NOT NULL,
  `TYPE_NO` varchar(11) NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL,
  `CATEGORY_IMAGE` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_categorys`
--

INSERT INTO `gen_categorys` (`CATEGORY_NO`, `TYPE_NO`, `CATEGORY_NAME`, `CATEGORY_IMAGE`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, '1', 'Mess', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, '1', 'Hostel', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, '1', 'Sublet', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, '1', 'Falt/Apartment', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, '2', 'Falt/Apartment', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, '2', 'Floor', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, '2', 'Plot', '', 0, '0000-00-00 00:00:00', 1, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, '', '', '', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gen_cities`
--

CREATE TABLE `gen_cities` (
  `CITY_NO` int(11) NOT NULL,
  `CITY_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gen_cities`
--

INSERT INTO `gen_cities` (`CITY_NO`, `CITY_NAME`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'Dhaka', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, 'Cumilla', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 'Chattagram', 0, '0000-00-00 00:00:00', 0, 0, 0, 1, 1, '2019-05-03 19:19:03'),
(4, 'Rajshahi', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 'Jessore', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `SERVICE_NO` int(11) NOT NULL,
  `SERVICE-NAME` varchar(255) NOT NULL,
  `SERVICE_DETAILS` text NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `PROPERTY_NO` int(11) NOT NULL,
  `PROPERTY_ID` varchar(25) NOT NULL,
  `USER_NO` int(11) NOT NULL,
  `TYPE_NO` int(11) NOT NULL,
  `CATEGORY_NO` int(11) NOT NULL,
  `PROPERTY_TITLE` text NOT NULL,
  `PROPERTY_DESCRIPTION` longtext NOT NULL,
  `ADDRESS` text NOT NULL,
  `CITY_NO` int(11) NOT NULL,
  `AREA_NO` int(11) NOT NULL,
  `PREFERED_TENANT` varchar(25) NOT NULL,
  `AVAILABLE_FROM` varchar(55) NOT NULL,
  `MONTHLY_SEAT_RENT` varchar(55) NOT NULL,
  `HAS_UTILITY_BILL` varchar(25) NOT NULL,
  `UTILITY_BILL` varchar(55) NOT NULL,
  `NUM_OF_FLOOR` varchar(55) NOT NULL,
  `NUM_OF_FLAT` varchar(55) NOT NULL,
  `NUM_OF_ROOM` varchar(55) NOT NULL,
  `NUM_OF_SEAT` varchar(55) NOT NULL,
  `NUM_OF_BEDROOM` varchar(55) NOT NULL,
  `NUM_OF_BALCONY` varchar(55) NOT NULL,
  `NUM_OF_BATHROOM` varchar(55) NOT NULL,
  `BATHROOM_TYPE` varchar(55) NOT NULL,
  `AVAILABLE_ON_FLOOR` varchar(500) NOT NULL,
  `PROPERTY_SIZE` double NOT NULL,
  `PROPERTY_UNIT_PRICE` double NOT NULL,
  `TOTAL_PRICE` double NOT NULL,
  `DEPOSITE_AMOUNT` double NOT NULL,
  `IS_NEGOCIABLE` varchar(15) NOT NULL,
  `HANDOVER_DATE` date NOT NULL,
  `AMENITY_NO` text NOT NULL,
  `IMAGE_URL1` varchar(500) NOT NULL,
  `IMAGE_URL2` varchar(255) NOT NULL,
  `IMAGE_URL3` varchar(255) NOT NULL,
  `IMAGE_URL4` varchar(255) NOT NULL,
  `IMAGE_URL5` varchar(255) NOT NULL,
  `POSTED_ON` datetime NOT NULL,
  `AD_YEAR` varchar(15) NOT NULL,
  `IS_APPROVED` int(1) NOT NULL DEFAULT '0',
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`PROPERTY_NO`, `PROPERTY_ID`, `USER_NO`, `TYPE_NO`, `CATEGORY_NO`, `PROPERTY_TITLE`, `PROPERTY_DESCRIPTION`, `ADDRESS`, `CITY_NO`, `AREA_NO`, `PREFERED_TENANT`, `AVAILABLE_FROM`, `MONTHLY_SEAT_RENT`, `HAS_UTILITY_BILL`, `UTILITY_BILL`, `NUM_OF_FLOOR`, `NUM_OF_FLAT`, `NUM_OF_ROOM`, `NUM_OF_SEAT`, `NUM_OF_BEDROOM`, `NUM_OF_BALCONY`, `NUM_OF_BATHROOM`, `BATHROOM_TYPE`, `AVAILABLE_ON_FLOOR`, `PROPERTY_SIZE`, `PROPERTY_UNIT_PRICE`, `TOTAL_PRICE`, `DEPOSITE_AMOUNT`, `IS_NEGOCIABLE`, `HANDOVER_DATE`, `AMENITY_NO`, `IMAGE_URL1`, `IMAGE_URL2`, `IMAGE_URL3`, `IMAGE_URL4`, `IMAGE_URL5`, `POSTED_ON`, `AD_YEAR`, `IS_APPROVED`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`) VALUES
(1, '', 2, 1, 1, 'Rent,2019', 'description', 'Dhaka', 1, 1, 'Female', 'June', '2200', '', '150', '0', '0', '1', '2', '0', '1', '1', 'Sharing', '2nd Floor', 0, 0, 0, 0, '', '0000-00-00', '1,2,3', '', '', '', '', '', '2019-04-22 06:13:14', '2019', 1, 1, 2, '0000-00-00 00:00:00'),
(2, '201904235056', 2, 1, 3, 'Test Rent', 'description', 'Dhaka', 1, 1, 'Family', 'July', '3000', '', '150', '0', '0', '1', '2', '0', '1', '1', 'Sharing', '2nd Floor', 0, 0, 0, 0, '', '0000-00-00', '2', '', '1557521801fp-3.jpg', '', '', '', '2019-04-22 06:13:14', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(3, '', 2, 2, 5, 'Test Sale', 'description', 'Cumilla', 1, 2, '', '', '', '', '1500', '0', '1', '0', '0', '2', '2', '0', 'Sharing,Attached', '3rd Floor', 1000, 2500, 2500000, 50000, '', '2019-04-30', '3', '', '', '', '', '', '2019-04-22 06:13:14', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(4, '', 2, 2, 6, 'Test Sale', 'description', 'Cumilla', 1, 3, '', '', '', '', '1500', '0', '1', '0', '0', '2', '2', '3', 'Sharing,Attached', '3rd Floor', 1000, 2500, 2500000, 50000, '', '2019-04-30', '2,3', 'fp-1.jpg', '', '', '', '', '2019-04-22 06:13:14', '2018', 1, 1, 0, '0000-00-00 00:00:00'),
(5, '', 2, 1, 1, 'RRFSFD', 'fsdf slfdbsfsd', 'gb', 3, 7, 'Female', 'February', '4544', '', '67', '0', '0', '3', '7', '0', '4', '3', 'fwerew', '4th Floor,5th Floor', 0, 0, 1200, 454, '', '0000-00-00', '3,4', '', '', '', '', '', '2019-04-23 18:24:59', '', 1, 1, 2, '0000-00-00 00:00:00'),
(6, '201904235068', 2, 1, 4, 'sdfhsdpi', 'hpwrwerwr', 'wr4rewsfs', 3, 7, 'Family', 'March', '25000', '', '454', '0', '0', '3', '0', '2', '3', '4', 'ewrer', '4th Floor', 1200, 0, 0, 20000, '', '0000-00-00', '1,3,4', '', '', '', '', '', '2019-04-23 18:36:31', '2019', 1, 1, -1, '0000-00-00 00:00:00'),
(7, '201904233899', 2, 2, 5, 'jjn', 'vybop jo', 'weregg', 4, 8, '', '', '', '', '43545', '0', '0', '0', '0', '2', '2', '3', 'w4rfd', '1st Floor', 344, 4354, 1497776, 345, '', '2019-04-30', '1', '', '', '', '', '', '2019-04-23 18:42:45', '2019', 0, 1, 2, '0000-00-00 00:00:00'),
(8, '201904231346', 2, 1, 3, 'sdklsdfflsdkf sf', 'sfsdfsf', 'wr4rewsfs', 1, 2, 'Family', 'May', '2500', '', '242', '0', '0', '3', '4', '0', '4', '3', 'sfsad', '3rd Floor', 0, 0, 1200, 454, '', '0000-00-00', '1,2,3,4', '', '', '', '', '', '2019-04-23 18:56:29', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(9, '201904231782', 2, 2, 6, 'lfsdfsdfs', 'jier; mfjnsfasf', 'sdfsf', 3, 7, '', '', '', '', '8709', '0', '0', '0', '0', '4', '2', '3', 'sdsd', '2nd Floor', 1200, 600, 720000, 34344, '', '2019-04-30', '2,4', '', '', '', '', '', '2019-04-23 19:02:45', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(10, '201904308626', 2, 1, 3, 'Sublet-- June', 'is IS the \"googling answers\" first result. At least it was when I googled \"sql ordering by two columns\". It\'s a hell of a lot more readable than the equivalent official doc page which didn\'t even appear in my first page of results until I changed my query to \"mysql \'order by\'', 'Road No 2,House no 20,Mirpur1', 1, 2, 'Female', 'June', '4500', '', '200', '0', '0', '1', '4', '0', '1', '2', 'Attached,Sharing', '3rd Floor', 0, 0, 1200, 2000, '', '0000-00-00', '1,2,3,5,6,8,9,10', '', '', '', '', '', '2019-04-30 22:27:15', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(11, '201905015132', 2, 1, 1, 'test', 'okkk', 'Road No 2,House no 20,Mirpur1', 1, 2, 'Female', 'May', '2000', '', '', '0', '0', '2', '4', '0', '1', '1', 'Attached', '4th Floor', 0, 0, 1200, 1200, '', '0000-00-00', '1,3,5', '', '', '', '', '', '2019-05-01 18:57:45', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(12, '201905019793', 2, 2, 6, 'Floor', 'okkk', 'Mirpur1', 1, 2, '', '', '', '', '343', '0', '0', '0', '0', '3', '4', '3', 'Attached', '4th Floor', 1200, 120000, 144000000, 2000000, '', '2019-05-02', '1,2,3,9,10', '1556735970fp-9.jpg', '1556735970fp-2.jpg', '', '\r\n', '', '2019-05-01 20:34:59', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(13, '201905106103', 11, 1, 3, 'werere', 'sdfsafdas4', 'sdfs', 1, 4, 'Female', 'April', '3454', 'Yes', '343', '', '', '2', '7', '', '3', '3', 'Yes', '1st Floor', 0, 0, 1200, 345, 'No', '0000-00-00', '1,4,5,11', '1557521594fp-6.jpg', '1557521594fp-3.jpg', '1557521594fp-4.jpg', '1557521594fp-1.jpg', '1557521594fp-2.jpg', '2019-05-10 22:53:14', '2019', 1, 0, 0, '0000-00-00 00:00:00'),
(14, '201905101349', 11, 2, 5, 'k\'nfipsdlb', 'SFGDS', 'gb', 1, 1, '', '', '', 'Yes', '454', '', '', '', '', '6', '2', '4', 'Yes', '1st Floor', 345, 45000, 15525000, 345, 'Yes', '2019-05-08', '1,8', '1557521801fp-1.jpg', '1557521801fp-3.jpg', 'default.jpg', 'default.jpg', 'default.jpg', '2019-05-10 22:56:41', '2019', 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `IMAGE_NO` int(11) NOT NULL,
  `PROPERTY_NO` int(11) NOT NULL,
  `PROPERTY_IMAGE_URL` varchar(500) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `IS_DELETED` int(1) NOT NULL DEFAULT '0',
  `DELETED_BY` int(11) NOT NULL,
  `DELETED_ON` int(11) NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`IMAGE_NO`, `PROPERTY_NO`, `PROPERTY_IMAGE_URL`, `CREATED_BY`, `CREATED_ON`, `IS_DELETED`, `DELETED_BY`, `DELETED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 1, 'fp-1.jpg', 1, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(2, 1, 'fp-2.jpg', 1, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(3, 1, 'fp-3.jpg', 1, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(4, 2, 'fp-4.jpg', 1, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(5, 2, 'fp-5.jpg', 1, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 3, 'fp-6.jpg', 1, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(7, 9, '1556039991b-7.jpg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(8, 9, '1556040033b-7.jpg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(9, 9, '1556040097b-7.jpg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(10, 0, 'uploads/ecf100e1a1008434c954eee2059cded4.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(11, 11, 'uploads/ad2d8b93d5a7013106905be2060a644a.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(12, 11, '415c02fad701749df8978cb6ff5dbf26.jpg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(13, 11, '2923ca0a38569227608833730c5a9d9f.png', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(14, 11, '39b0c8b082bed51ff7d429c39356d9da.png', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(15, 11, '89219ebbc81ee9cf8a2fb0ad3846d93e.jpg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(16, 11, 'd3c21996ff516959e35dfffb1212183b.', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(25, 11, 'D:server	mpphp8EB1.tmp', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(26, 11, '2fb0e1c409f6778a55e05a12cbf92eea.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(27, 11, 'fcdda657b8662d30dd8154f7904e7593.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(28, 11, 'D:server	mpphpDEC5.tmp.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(29, 11, 'uploads/6663e4c7bee4c4a75613a74d296fb0bc.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(30, 11, '0c3f7ca786c93ee2ccb489790f8b05a5.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(32, 11, '0d8d71bcedfc41ff5b4837aaa39e56d7.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(33, 11, '0d8d71bcedfc41ff5b4837aaa39e56d7.png', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00'),
(34, 11, '0d8d71bcedfc41ff5b4837aaa39e56d7.jpeg', 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `USER_NO` int(11) NOT NULL,
  `USER_NAME` varchar(55) NOT NULL,
  `USER_EMAIL` varchar(55) NOT NULL,
  `USER_CONTACT` varchar(25) NOT NULL,
  `USER_ALTERNATIVE_CONTACT` varchar(55) NOT NULL,
  `USER_PASSWORD` varchar(255) NOT NULL,
  `IS_ACTIVE` int(11) NOT NULL DEFAULT '1',
  `ACTIVE_FROM` datetime NOT NULL,
  `ACTIVE_TO` datetime NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_ON` date NOT NULL,
  `IS_UPDATED` int(1) NOT NULL DEFAULT '0',
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_ON` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`USER_NO`, `USER_NAME`, `USER_EMAIL`, `USER_CONTACT`, `USER_ALTERNATIVE_CONTACT`, `USER_PASSWORD`, `IS_ACTIVE`, `ACTIVE_FROM`, `ACTIVE_TO`, `CREATED_BY`, `CREATED_ON`, `IS_UPDATED`, `UPDATED_BY`, `UPDATED_ON`) VALUES
(1, 'admin', 'admin', '34235', '', '202cb962ac59075b964b07152d234b70\r\n', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00', 0, 0, '0000-00-00 00:00:00'),
(2, 'Md. Riyad Hossein', 'riyad@bdsoft.biz', '01680651229', '01648887488', '202cb962ac59075b964b07152d234b70\r\n', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-04-10', 0, 0, '0000-00-00 00:00:00'),
(11, 'test', 'riyad@bdsoft.bizz', '01680651225', '01648887488', '8724aa758c2f662d79952870ef486ea6', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2019-05-10', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `xxx_user`
--

CREATE TABLE `xxx_user` (
  `user_no` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_full_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact` text COLLATE utf8_unicode_ci NOT NULL,
  `user_type_no` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `active_from` date NOT NULL,
  `active_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xxx_user`
--

INSERT INTO `xxx_user` (`user_no`, `user_name`, `pass`, `user_full_name`, `user_address`, `user_email`, `user_contact`, `user_type_no`, `is_active`, `active_from`, `active_to`) VALUES
(1, 'admin', '8724aa758c2f662d79952870ef486ea6', 'Administrator', '', '', '1234567890', 1, 1, '2017-10-10', '2021-02-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`ABOUT_US_NO`);

--
-- Indexes for table `available_on_floors`
--
ALTER TABLE `available_on_floors`
  ADD PRIMARY KEY (`AVAILABLE_ON_FLOOR_NO`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`CONTACT_US_NO`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`COUNTER_NO`);

--
-- Indexes for table `gen_aminities`
--
ALTER TABLE `gen_aminities`
  ADD PRIMARY KEY (`AMENITY_NO`);

--
-- Indexes for table `gen_areas`
--
ALTER TABLE `gen_areas`
  ADD PRIMARY KEY (`AREA_NO`);

--
-- Indexes for table `gen_categorys`
--
ALTER TABLE `gen_categorys`
  ADD PRIMARY KEY (`CATEGORY_NO`);

--
-- Indexes for table `gen_cities`
--
ALTER TABLE `gen_cities`
  ADD PRIMARY KEY (`CITY_NO`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`SERVICE_NO`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`PROPERTY_NO`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`IMAGE_NO`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`USER_NO`);

--
-- Indexes for table `xxx_user`
--
ALTER TABLE `xxx_user`
  ADD PRIMARY KEY (`user_no`),
  ADD UNIQUE KEY `USER_NAME` (`user_name`),
  ADD UNIQUE KEY `USER_NO` (`user_no`),
  ADD UNIQUE KEY `USER_NO_2` (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `ABOUT_US_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_on_floors`
--
ALTER TABLE `available_on_floors`
  MODIFY `AVAILABLE_ON_FLOOR_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `CONTACT_US_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `COUNTER_NO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gen_aminities`
--
ALTER TABLE `gen_aminities`
  MODIFY `AMENITY_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gen_areas`
--
ALTER TABLE `gen_areas`
  MODIFY `AREA_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gen_categorys`
--
ALTER TABLE `gen_categorys`
  MODIFY `CATEGORY_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gen_cities`
--
ALTER TABLE `gen_cities`
  MODIFY `CITY_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `SERVICE_NO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `PROPERTY_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `IMAGE_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `USER_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `xxx_user`
--
ALTER TABLE `xxx_user`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
