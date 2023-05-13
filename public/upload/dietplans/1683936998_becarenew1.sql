-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 07:05 AM
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
-- Database: `becarenew`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_order`
--

CREATE TABLE `accept_order` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `ordered_date_and_time` datetime NOT NULL,
  `accepted_date_and_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `pharmacist_note` varchar(255) NOT NULL,
  `charge` double NOT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `order_request_id` int(11) NOT NULL,
  `paid_time` timestamp NULL DEFAULT NULL,
  `paid_amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `delete_flag` int(11) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `delete_flag`, `verify_token`, `deactivated_admin_id`) VALUES
(1, 'Geenath', 'Weerasingha', '992111780V', '0743285669', 'Mr', 'geenathweer1@gmail.com', '$2y$10$IKuJy2dkUO3SLYJYb9/vne7CZ2tDMJxGegepjn7W6edgH/5LYzBh.', '2022-11-01', 'Commercial Bank', 'Geenath Weerasingha', 'Matara', '0082156984', 0, '1ab3a6a4532088834673577c2b869354', NULL),
(8, 'Dilshan', 'Perera', '971234567V', '0711234567', 'Mr', 'dilshan.perera@gmail.com', '$2y$10$UnhbGW8SnbtTnhQwngB.feOhQfgFhJx/bNmp3uC0miSNxPWt6wzqm', '2023-05-01', 'Sampath Bank', 'Dilshan Perera', 'Colombo 03', '1234567890', 0, '', NULL),
(9, 'Nethmi', 'Silva', '933456789V', '0771234567', 'Ms', 'nethmi.silva@email.com', '$2y$10$Hu5C7tH00kF6B3IuKEfDzuHq8jjBdq7F4MqDURtQmewE1WBtp0Tyi', '2023-05-01', 'Commercial Bank', 'Nethmi Silva', 'Galle', '2345678901', 0, '', NULL),
(10, 'Sajith', 'Wijesinghe', '944567890V', '0721234567', 'Mr', 'sajith.wijesinghe@email.com', '$2y$10$Bo2eoJJmqGn9BMgz1Bxznet0pG8p.yrJ3ogSisUIlXuPNJX6L.x7a', '2023-05-01', 'Hatton National Bank', 'Sajith Wijesinghe', 'Badulla', '4567890123', 0, '', NULL),
(11, 'Manoj', 'Jayawardena', '983456789V', '0712345678', 'Mr', 'manoj.jayawardena@email.com', '$2y$10$sJiNei/V30KHUjJx9wS7yeFsLelwMZoBn9S5QaKurrU0swv6pKREm', '2023-05-01', 'HSBC Bank', 'Manoj Jayawardena', 'Panadura', '8901234567', 0, '', NULL),
(12, 'Anusha', 'Perera', '901234567V', '0722345678', 'Mr', 'anusha.perera@email.com', '$2y$10$tGRY.a1ATxdAOrosYvW7ruBGeyRCtBTjm809eTnTP20xG4UpDtbhu', '2023-05-01', 'Pan Asia Bank', 'Anusha Perera', 'Negombo', '0123456789', 1, '', 1),
(13, 'Yasara', 'Jayawardena', '930017640V', '0763456789', 'Ms', 'yasara.jayawardena@gmail.com', '$2y$10$GTwaq0ecHHmQnFGaQg00seuKQpMfXRP.tssLaTprLluvvz4vJK352', '2023-05-01', 'Sampath Bank', 'Yasara Jayawardena', 'Matara', '8010278080', 1, '', 1),
(14, 'Sara', 'Rodrigo', '778475691V', '0765841692', 'Ms', 'sararodrigo@gmail.com', '$2y$10$vYR1I0tC/.aK8zlijsoENe3G0aIprzkNlR2lLO3oTnO8tdQQUAIz.', '2023-05-04', 'Peoples Bank', 'Sara', 'Kirulapana', '1245789943', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `complaint_date` date NOT NULL DEFAULT current_timestamp(),
  `complaint_flag` tinyint(1) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `counsellor_id` int(11) DEFAULT NULL,
  `nutritionist_id` int(11) DEFAULT NULL,
  `pharmacist_id` int(11) DEFAULT NULL,
  `meditation_instructor_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `subject`, `description`, `complaint_date`, `complaint_flag`, `patient_id`, `doctor_id`, `counsellor_id`, `nutritionist_id`, `pharmacist_id`, `meditation_instructor_id`, `admin_id`) VALUES
(33, 'Appointment Scheduling', 'I have been trying to schedule an appointment with my doctor for weeks now, but the system keeps giving me an error message. Please fix this issue so I can schedule an appointment.', '2023-05-01', 1, 55, NULL, NULL, NULL, NULL, NULL, 1),
(34, 'Technical Issues', 'The application keeps crashing or freezing when I try to use it, which is causing a lot of frustration and delays in getting the services I need. Please fix these technical issues as soon as possible.', '2023-05-01', 0, 57, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Poor Service Quality', 'I am extremely dissatisfied with the quality of service I received from my counselor. They did not listen to my concerns and did not provide me with the support I needed', '2023-05-01', 1, 59, NULL, NULL, NULL, NULL, NULL, 1),
(36, 'Miscommunication', 'There has been a miscommunication between me and my pharmacist regarding my medication, which has resulted in me not receiving the correct prescription. Please rectify this mistake and ensure that this does not happen again.', '2023-05-01', 0, 59, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Difficulty accessing patient information', 'I am having trouble accessing patient records on the platform, which is hindering my ability to provide proper care.', '2023-05-01', 1, NULL, NULL, NULL, NULL, NULL, 1020, 1),
(38, 'Platform malfunction', 'The platform is constantly crashing or freezing,', '2023-05-01', 1, NULL, NULL, NULL, NULL, NULL, 1020, 1),
(39, 'Technical Issue', 'I am unable to view my patients medical records, the system keeps giving me an error message', '2023-05-01', 0, NULL, 25, NULL, NULL, NULL, NULL, NULL),
(40, 'System Unavailability', 'The web application was down for several hours yesterday, causing inconvenience to me and my patients. This is not acceptable.', '2023-05-01', 0, NULL, 25, NULL, NULL, NULL, NULL, NULL),
(41, 'Inconsistent Scheduling', 'The scheduling of my counseling sessions has been inconsistent, leading to confusion and missed appointments, which affects the quality of the service I provide.', '2023-05-01', 1, NULL, NULL, 12, NULL, NULL, NULL, 1),
(42, 'System errors during order processing', 'The system keeps crashing while trying to process orders, causing delays and frustration for customers', '2023-05-01', 1, NULL, NULL, NULL, NULL, 17, NULL, 10),
(43, 'Service Quality', 'The nutritionist I consulted was not knowledgeable enough and gave me incorrect advice regarding my diet. This has had negative consequences on my health and needs to be addressed immediately.', '2023-05-04', 0, 73, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Technical Issue', 'I am unable to login to my account even after resetting my password', '2023-05-04', 1, NULL, NULL, NULL, NULL, NULL, 1020, 1),
(45, 'The app crashes frequently', 'I am experiencing technical difficulties while using the Be Care app. The app crashes frequently.  Please address this issue', '2023-05-07', 1, 61, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE `counsellor` (
  `counsellor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verified_admin_id` int(11) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`counsellor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `city`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `delete_flag`, `verify_token`, `verified_admin_id`, `deactivated_admin_id`) VALUES
(12, 'Chamila', 'Silva', '972345678V', '0762345678', 'Ms', 'chamilasilva@gmail.com', '$2y$10$iB/oD4bhR.RyouIL6kpcreow/fLeSJe30OWOW6gS2DGQsSLpK/bea', '2023-05-01', '2415236', 'Colombo', 'Bank of Ceylon', 'Chamila Silva', 'Kurunegala', '4567890123', 'Chamila Silva_57699_qualification.zip', 0, '', 1, NULL),
(13, 'Rohitha', 'Peramune', '822345678V', '0713456789', 'Mr', 'rohithaperamune@gmail.com', '$2y$10$Rf4v.LQSbBv3dkNb1wM0BeU1GS6tjEjS8I6Q8VQEDTL8D9z9Fqb5a', '2023-05-01', '2515962', 'Galle', 'Hatton National Bank', 'Rohitha Peramune', 'Colombo 07', '5678901234', 'Rohitha Peramune_30512_qualification.zip', 0, '', 1, NULL),
(14, 'Anusha', 'Jayawardena', '933456789V', '0772345678', 'Ms', 'anushajayawardena@gmail.com', '$2y$10$UQJc3XKMJq.5UyaLqFaJeuRWzpFTPU1adLiHU40.tDuyJiIo50qxu', '2023-05-01', '2523478', 'Kandy', 'Sampath Bank', 'Anusha Jayawardena', 'Galle', '4321098765', 'Anusha Jayawardena_48391_qualification.zip', 0, '', 1, NULL),
(15, 'Kavinda', 'Ratnayake', '854567890V', '0763456789', 'Mr', 'kavindaratnayake@gmail.com', '$2y$10$l90ZQ6F/X8YsPSqoh5dp1.wLkV19ZcEfbNlqtO5YCm7EO0nrlOWBq', '2023-05-01', '2144525', 'Matara', 'Commercial Bank', 'Kavinda Ratnayake', 'Kandy', '3210987654', 'Kavinda Ratnayake_06704_qualification.zip', 1, '', 1, 9),
(16, 'Tharindu', 'Silva', '885678901V', '0773456789', 'Mr', 'tharindusilva@gmail.com', '$2y$10$T7vm40wrgoBJgSXNGVHFqu1wrL6hN4ZmW5R/KPH6A9917s2fpU1lS', '2023-05-01', '2541532', 'Kandy', 'Bank of Ceylon', 'Tharindu', 'Kollupitiya', '1245789515', 'Tharindu Silva_03649_qualification.zip', 1, '', 1, 1),
(17, 'Sanjeevani', 'Silva', '931456789V', '0771234567', 'Ms', 'sanjeevani.silva@gmail.com', '$2y$10$gqTceuAMEWayYohggzttyOTgOFlzVEEHj60hI4wCMmtPxFj9riIxy', '2023-05-01', '2451478', 'Kandy', 'Commercial Bank', 'Sanjeevani Silva', 'Colombo 03', '1023456789', 'Sanjeevani Silva_35780_qualification.zip', 1, '', 1, 1),
(18, 'Praveen', 'Perera', '851234567V', '0712345678', 'Mr', 'praveen.perera@gmail.com', '$2y$10$oaLvH9Uci4.fIV8ChcoLnO0KEvavSJ79beo0QgHmNtpwpfSLcyjp.', '2023-05-01', '2154741', 'Malabe', 'Peoples Bank', 'Praveen Perera', 'Kandy', '9876543210', 'Praveen Perera_91739_qualification.zip', 0, '', 1, NULL),
(19, 'Sepal', 'Wanninayake', '884169752V', '0764581296', 'Mr', 'sepal@gmail.com', '$2y$10$itJeEvZp6Wxdef7Abt2AsOyoTTKntoITF1ypSYfjlC0ZFmsJL7Dim', '2023-05-04', '2458967', 'Kandy', 'Hatton National Bank', 'Sepal', 'Kirulapana', '2145879645', 'Sepal Wanninayake_73030_qualification.zip', 0, '', 1, NULL),
(20, 'Sameera', 'Gunasekara', '912345678V', '0772345332', 'Mr', 'sameeragunasekara@gmail.com', '$2y$10$idLqu6s0Q8lcUq7n8CiowOKvrgY25BhukHiosID.nN0XWkUTyN98i', '2023-05-05', '2419873', 'Galle', 'Sampath Bank', 'Sameera Gunasekara', 'Colombo', '2134799991', 'Sameera Gunasekara_14436_qualification.zip', 0, '', 1, NULL),
(21, 'Ravi', 'Karunaratne', '761234567V', '0762345142', 'Mr', 'ravi.karunaratne@gmail.com', '$2y$10$WksWK95PAS1ADgSYJWVNOOVUk2pjSPPFrYOSJ8NYFh1hfUiRR2tm.', '2023-05-08', '2657219', 'Galle', 'Sampath Bank', 'Ravi Karunaratne', 'Ravi Karunaratne', '2345678901', 'Ravi Karunaratne_28092_qualification.zip', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_channel`
--

CREATE TABLE `counsellor_channel` (
  `counsellor_channel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointment_number` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `paid_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `counsellor_id` int(11) NOT NULL,
  `counsellor_channel_day_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor_channel`
--

INSERT INTO `counsellor_channel` (`counsellor_channel_id`, `name`, `age`, `contact_number`, `gender`, `date`, `time`, `appointment_number`, `paid_amount`, `paid_time`, `counsellor_id`, `counsellor_channel_day_id`, `patient_id`) VALUES
(11, 'Kavindi', 29, '0761345829', 'Ms', '2023-05-08', '07:00:00', 1, 2200, '2023-05-06 20:08:49', 12, 12, 60),
(12, 'Jinethma', 22, '0769852476', 'Ms', '2023-05-08', '07:30:00', 2, 2200, '2023-05-06 20:08:49', 12, 12, 60),
(13, 'Senadi', 16, '0758416932', 'Ms', '2023-05-08', '08:00:00', 3, 2200, '2023-05-06 20:08:49', 12, 12, 60),
(14, 'Rasara', 24, '0775846932', 'Mr', '2023-05-07', '18:00:00', 1, 1980, '2023-05-06 20:08:49', 12, 20, 60);

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_channel_day`
--

CREATE TABLE `counsellor_channel_day` (
  `counsellor_channel_day_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `current_channel_time` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  `counsellor_timeslot_id` int(11) NOT NULL,
  `counsellor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor_channel_day`
--

INSERT INTO `counsellor_channel_day` (`counsellor_channel_day_id`, `day`, `current_channel_time`, `active`, `counsellor_timeslot_id`, `counsellor_id`) VALUES
(9, '2023-05-29', '07:00:00', 1, 2, 12),
(10, '2023-05-22', '07:00:00', 1, 2, 12),
(11, '2023-05-15', '07:00:00', 1, 2, 12),
(12, '2023-05-08', '08:30:00', 0, 2, 12),
(13, '2023-06-01', '08:00:00', 1, 3, 12),
(14, '2023-05-25', '08:00:00', 1, 3, 12),
(15, '2023-05-18', '08:00:00', 1, 3, 12),
(16, '2023-05-11', '08:00:00', 0, 3, 12),
(17, '2023-05-28', '18:00:00', 1, 4, 12),
(18, '2023-05-21', '18:00:00', 1, 4, 12),
(19, '2023-05-14', '18:00:00', 1, 4, 12),
(20, '2023-05-07', '18:30:00', 1, 4, 12),
(21, '2023-06-05', '07:00:00', 1, 2, 12),
(22, '2023-06-04', '18:00:00', 1, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_timeslot`
--

CREATE TABLE `counsellor_timeslot` (
  `counsellor_timeslot_id` int(11) NOT NULL,
  `channeling_day` varchar(255) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `duration_for_one_patient` int(11) NOT NULL,
  `fee` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `counsellor_id` int(11) NOT NULL,
  `continue_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor_timeslot`
--

INSERT INTO `counsellor_timeslot` (`counsellor_timeslot_id`, `channeling_day`, `starting_time`, `ending_time`, `duration_for_one_patient`, `fee`, `address`, `counsellor_id`, `continue_flag`) VALUES
(2, 'Monday', '07:00:00', '08:30:00', 30, 2000, 'No. 87, Sir Chittampalam A. Gardiner Mawatha, Colombo 02', 12, 1),
(3, 'Thursday', '08:00:00', '10:00:00', 20, 2000, 'No. 34, Dharmapala Mawatha, Colombo 07', 12, 0),
(4, 'Sunday', '18:00:00', '19:00:00', 30, 1800, 'No. 185, Galle Road, Colombo 04', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan`
--

CREATE TABLE `diet_plan` (
  `diet_plan_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `diet_plan_file` varchar(255) NOT NULL,
  `issued_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nutritionist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `request_diet_plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verified_admin_id` int(11) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `type`, `city`, `specialization`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `delete_flag`, `verify_token`, `verified_admin_id`, `deactivated_admin_id`) VALUES
(25, 'Sahan', 'Perera', '842760045V', '0771234567', 'Mr', 'sahanperera@gmail.com', '$2y$10$lEy55pIweM3nL91fr9tx.u7iDuziz30dwpfRVvidKfXr9NKPix/Di', '2023-04-30', '1234567', 'MBBS', 'Colombo', 'Neurologist', 'Peoples Bank', 'Sahan Perera', 'Colombo 7', '1234567890', 'Sahan Perera_38070_qualification.zip', 0, '', 1, NULL),
(26, 'Dilini', 'Fernando', '922861346V', '0712345678', 'Ms', 'dilinifernando@gmail.com', '$2y$10$HsoUIUUqaQODNluPMdXuO.AmMLpRcleRHWgnJNKE7Ryg9ZmQPe7dK', '2023-04-30', '2345678', 'MBBS', 'Kandy', 'Pediatrician', 'Hatton National Bank', 'Dilini Fernando', 'Kandy', '2345678901', 'Dilini Fernando_85213_qualification.zip', 0, '', 1, NULL),
(27, 'Sanjaya', 'Rajapakse', '782953412V', '0765432109', 'Mr', 'sanjayarajapakse@gmail.com', '$2y$10$IbOzLXAzs6hick6.IvMBB.NjrFOqwlEVci9ar0qa68..LKnrlsuVi', '2023-04-30', '2456789', 'MBBS', 'Nugegoda', 'Hematologist', 'Commercial Bank', 'Sanjaya Rajapakse', 'Galle', '3456789012', 'Sanjaya Rajapakse_06537_qualification.zip', 0, '', 1, NULL),
(28, 'Nadeeka', 'Bandara', '663071238V', '0777890123', 'Ms', 'nadeekabandara@gmail.com', '$2y$10$/elCvKaiTBunyeSn2JY/JOjRNoHeIm5DT6bk9jq5QwF6svkcG/NWC', '2023-04-30', '2567890', 'MBBS', 'Matara', 'Dermatologist', 'Sampath Bank', 'Nadeeka Bandara', 'Matara', '4567890123', 'Nadeeka Bandara_89574_qualification.zip', 0, '', 1, NULL),
(29, 'Rohitha', 'Silva', '532760139V', '0713456789', 'Mr', 'rohithasilva@gmail.com', '$2y$10$hbHJLzT0QCJxAQIijtw0u.u/dWPZL8c3XtQUwMsxPRZwOf4O8GUqy', '2023-04-30', '2678901', 'MBBS', 'Kandy', 'Cardiologist', 'Bank of Ceylon', 'Rohitha Silva', 'Kandy', '5678901234', 'Rohitha Silva_55905_qualification.zip', 1, '', 1, 1),
(30, 'Shalini', 'Fernando', '920842156V', '0778642563', 'Ms', 'shalini.fernando@gmail.com', '$2y$10$M3itQo5GMgAx6LaQncQSLO6muxTfS6RiJ0ZLx4/D8uUD1q3SoxiUO', '2023-04-30', '2154876', 'MBBS', 'Kandy', 'Geriatrician', 'Peoples Bank', 'Shalini Fernando', 'Bambalapitiya', '1187546891', 'Shalini Fernando_70010_qualification.zip', 1, '', 1, 1),
(31, 'Jagath', 'Manamperi', '795847689V', '0768452136', 'Mr', 'jagathmanu@gmail.com', '$2y$10$4t8K9AQxvVQcRTkyekhwzOHWZTmfMXu9B4eroi0kkDWA1M6WVc/L2', '2023-05-04', '2547896', 'MBBS', 'Malabe', 'Cardiologist', 'Sampath Bank', 'Jagath Manamperi', 'Maligawatta', '2147854126', 'Jagath Manamperi_87425_qualification.zip', 0, '', 1, NULL),
(32, 'Jayaweera', 'Kankanamge', '875412698V', '0725896458', 'Mr', '2020cs061@stu.ucsc.cmb.ac.lk', '$2y$10$3GC7muZY32LUSxUISJIK9uAmqPFw0v1Wnsw9K/9UuG7f//zb9IF9C', '2023-05-05', '2478569', 'MBBS', 'Matara', 'Dermatologist', 'Commercial Bank', 'Kankanamge', 'Matara', '2478956789', 'Jayaweera Kankanamge_09162_qualification.zip', 0, '', 1, NULL),
(33, 'Sanjaya', 'Perera', '870934512V', '0713548962', 'Mr', 'sanjaya.perera@gmail.com', '$2y$10$55kwmIpAnpz4EHuYyGxb3eHmWpkip4XMWmzEbA4mDjYpCeUJUoy0S', '2023-05-07', '1957634', 'MBBS', 'Colombo', 'Geriatrician', 'Commercial Bank', 'Sanjaya Perera', 'Kandy', '7459823541', 'Sanjaya Perera_71881_qualification.zip', 0, '', 10, NULL),
(34, 'Omal', 'Silva', '884159672V', '0774967852', 'Mr', 'omalSilva@gmail.com', '$2y$10$5WL40LTRaVo8u.gNGfVkbe.eOD/D3INZTD70Qac2KgasYqSDMhftW', '2023-05-08', '2541968', 'MBBS', 'Matara', 'Dermatologist', 'Hatton National Bank', 'Omal', 'Matara', '5147891459', 'Omal Silva_54964_qualification.zip', 1, '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_channel`
--

CREATE TABLE `doctor_channel` (
  `doctor_channel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointment_number` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `paid_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `doctor_id` int(11) NOT NULL,
  `doctor_channel_day_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_channel`
--

INSERT INTO `doctor_channel` (`doctor_channel_id`, `name`, `age`, `contact_number`, `gender`, `date`, `time`, `appointment_number`, `paid_amount`, `paid_time`, `doctor_id`, `doctor_channel_day_id`, `patient_id`) VALUES
(138, 'Jaliya', 24, '0773543612', 'Mr', '2023-05-08', '10:00:00', 1, 1320, '2023-05-08 03:11:55', 25, 72, 55),
(139, 'Sampath', 29, '0762341267', 'Mr', '2023-05-05', '18:00:00', 1, 1980, '2023-05-08 03:11:55', 25, 80, 63),
(140, 'Kamala', 66, '0784519652', 'Ms', '2023-05-05', '18:10:00', 2, 1980, '2023-05-08 03:11:55', 25, 80, 63),
(141, 'supun', 27, '0742589678', 'Mr', '2023-05-20', '18:00:00', 1, 1650, '2023-05-08 03:11:55', 25, 82, 63),
(142, 'Kalpa', 23, '0745896478', 'Mr', '2023-05-20', '18:10:00', 2, 1650, '2023-05-08 03:11:55', 25, 82, 63),
(143, 'Kavindi', 25, '0761345829', 'Ms', '2023-05-20', '18:20:00', 3, 1650, '2023-05-08 03:11:55', 25, 82, 60),
(144, 'Pasindu', 24, '0785496324', 'Mr', '2023-05-20', '18:30:00', 4, 1650, '2023-05-08 03:11:55', 25, 82, 60),
(145, 'Chalaka', 30, '0758469237', 'Mr', '2023-05-20', '18:40:00', 5, 1650, '2023-05-08 03:11:55', 25, 82, 60),
(146, 'Malin', 28, '0772345678', 'Mr', '2023-05-15', '10:00:00', 1, 1320, '2023-05-08 03:11:55', 25, 71, 80);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_channel_day`
--

CREATE TABLE `doctor_channel_day` (
  `doctor_channel_day_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `current_channel_time` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  `doctor_timeslot_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_channel_day`
--

INSERT INTO `doctor_channel_day` (`doctor_channel_day_id`, `day`, `current_channel_time`, `active`, `doctor_timeslot_id`, `doctor_id`) VALUES
(69, '2023-05-29', '10:00:00', 1, 16, 25),
(70, '2023-05-22', '10:00:00', 1, 16, 25),
(71, '2023-05-15', '10:05:00', 1, 16, 25),
(72, '2023-05-08', '10:05:00', 1, 16, 25),
(73, '2023-05-31', '07:00:00', 1, 17, 25),
(74, '2023-05-24', '07:00:00', 1, 17, 25),
(75, '2023-05-17', '07:00:00', 1, 17, 25),
(76, '2023-05-10', '07:00:00', 0, 17, 25),
(77, '2023-05-26', '18:00:00', 1, 18, 25),
(78, '2023-05-19', '18:00:00', 1, 18, 25),
(79, '2023-05-12', '18:00:00', 1, 18, 25),
(80, '2023-05-05', '18:20:00', 1, 18, 25),
(81, '2023-05-27', '18:00:00', 1, 19, 25),
(82, '2023-05-20', '18:50:00', 0, 19, 25),
(83, '2023-05-13', '18:00:00', 1, 19, 25),
(84, '2023-05-06', '18:00:00', 1, 19, 25),
(85, '2023-06-02', '18:00:00', 1, 18, 25),
(108, '2023-06-05', '10:00:00', 1, 16, 25),
(109, '2023-06-03', '18:00:00', 1, 19, 25);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timeslot`
--

CREATE TABLE `doctor_timeslot` (
  `doctor_timeslot_id` int(11) NOT NULL,
  `channeling_day` varchar(255) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `duration_for_one_patient` int(11) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `continue_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_timeslot`
--

INSERT INTO `doctor_timeslot` (`doctor_timeslot_id`, `channeling_day`, `starting_time`, `ending_time`, `duration_for_one_patient`, `fee`, `address`, `doctor_id`, `continue_flag`) VALUES
(16, 'Monday', '10:00:00', '12:00:00', 5, '1200', 'Cathedral Vicarage Aluthmawatha Road, 15', 25, 1),
(17, 'Wednesday', '07:00:00', '08:10:00', 10, '1500', 'No. 05, Wijerama Mawatha, Colombo 07', 25, 0),
(18, 'Friday', '18:00:00', '19:15:00', 10, '1800', 'No. 31, Dr. N. M. Perera Mawatha, Colombo 08', 25, 1),
(19, 'Saturday', '18:00:00', '18:45:00', 10, '1500', 'No. 121, Havelock Road, Colombo 05', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback`, `patient_id`, `added_time`) VALUES
(3, 'I found the information provided on the website to be very helpful and informative. It gave me a better understanding of my health condition and what steps I should take to manage it', 55, '2023-05-02 09:55:36'),
(4, 'The website was very easy to navigate and I was able to find what I was looking for quickly. The search function and categories made it very user-friendly', 60, '2023-05-02 10:06:54'),
(5, 'I really appreciated the online booking system for appointments. It saved me a lot of time and hassle having to call and book over the phone. The process was smooth and efficient', 67, '2023-05-02 10:06:41'),
(6, 'I found the Be Care website extremely user-friendly and helpful in finding the healthcare services I needed. The design is clean and modern, and the search function made it easy to filter and compare providers. Would highly recommend!', 66, '2023-05-02 10:07:05'),
(7, 'I recently used Be Care and I am impressed with the quality of service and professionalism of the doctors and counselors. The website is easy to navigate and the booking process is very simple. Highly recommended!', 73, '2023-05-04 11:48:11'),
(8, 'I have been using Be Care for a few months now and I am very happy with the service. The nutritionist provided great advice and helped me improve my diet. The website is user-friendly and I appreciate the option to leave feedback', 62, '2023-05-04 11:50:18'),
(9, 'I am very impressed with the range of services offered by Be Care. The website is easy to use.', 64, '2023-05-04 11:52:31'),
(10, 'I am so grateful for Be Care. The website is easy to use and has helped me find the right healthcare provider for my needs. Thank you!', 68, '2023-05-04 11:58:38'),
(11, 'I appreciate how Be Care makes it easy to find healthcare providers in my area. The website is user-friendly and the search function is very helpful.', 59, '2023-05-09 02:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `meditation_instructor`
--

CREATE TABLE `meditation_instructor` (
  `meditation_instructor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `delete_flag` int(11) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verified_admin_id` int(11) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meditation_instructor`
--

INSERT INTO `meditation_instructor` (`meditation_instructor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `city`, `address`, `fee`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `delete_flag`, `verify_token`, `verified_admin_id`, `deactivated_admin_id`) VALUES
(1020, 'Amara', 'Bandara', '931570120V', '0771234567', 'Mr', 'bretl272@gmail.com', '$2y$10$60YsiELDh2SzVSyp2WX41uNqo.DyLKwda2Hac9Iw6vhHGruUdudfO', '2023-05-01', 'Colombo', '123, Galle Road, Colombo 03', 2000, 'Commercial Bank', 'Amara Bandara', 'Colombo 03', '1234567874', 'Amara Bandara_67802_qualification.zip', 0, '3af8ccc7752bacddf2bcc38a1e370b3c', 1, NULL),
(1021, 'Ruwani', 'Jayasinghe', '870291234V', '0772345678', 'Ms', 'ruwani.jaya@gmail.com', '$2y$10$qLm8WoAL18hPYFGRMdKS7e1DYvroqscF8N/l1ps8tAADSP7hKcjUO', '2023-05-01', 'Kandy', '456, Peradeniya Road, Kandy', 2200, 'Peoples Bank', 'Ruwani Jayasinghe', 'Kandy', '2345699901', 'Ruwani Jayasinghe_64619_qualification.zip', 0, '', 1, NULL),
(1022, 'Nishantha', 'Perera', '771443299V', '0713456789', 'Mr', 'nishantha.perera@gmail.com', '$2y$10$4NjA6/Yp1hBvYS5mu3vO5Oe92MULM4AYjEnlqfUQCDhezGorSd7B.', '2023-05-01', 'Galle', '789, Colombo Road, Galle', 1800, 'Sampath Bank', 'Nishantha Perera', 'Galle', '3456789789', 'Nishantha Perera_75758_qualification.zip', 0, '', 1, NULL),
(1023, 'Sandun', 'Gunasekara', '953567891V', '0764567890', 'Mr', 'sandun.g@gmail.com', '$2y$10$q7J2FNqxHP3mVX2rDM77A.qRxmE.mkj0x60JlyYBIAZ2sOFo/vsWK', '2023-05-01', 'Malabe', '234, Kaduwela Road, Malabe', 2200, 'Hatton National Bank', 'Sandun Gunasekara', 'Malabe', '4567890123', 'Sandun Gunasekara_05647_qualification.zip', 0, '', 1, NULL),
(1024, 'Nadun', 'Fernando', '672133443V', '0777890123', 'Mr', 'nadun.fernando@gmail.com', '$2y$10$3FKHWIEyPRCWkCyCIDDiVOduKknOMEneqfnwz5Y9PS2vE/B73HwFi', '2023-05-01', 'Nugegoda', '567, High Level Road, Nugegoda', 1500, 'Commercial Bank', 'Nadun Fernando', 'Nugegoda', '7890123456', 'Nadun Fernando_24959_qualification.zip', 1, '', 1, 1),
(1025, 'Anusha', 'Rathnayake', '786512345V', '0762345678', 'Mr', 'anusha.rathnayake@gmail.com', '$2y$10$bWosrXP7CSiqeGLSrszvJeW0fC6AEd/LEoebxV2bTGGUEoT1eJEui', '2023-05-01', 'Matara', '678, Kamburupitiya Road, Matara', 2250, 'Sampath Bank', 'Anusha Rathnayake', 'Matara', '2345678901', 'Anusha Rathnayake_57230_qualification.zip', 1, '', 1, 1),
(1026, 'Aravinda', 'Silva', '983216548V', '0777654321', 'Mr', 'aravinda.silva@gmail.com', '$2y$10$ST4iVLvTlNg/rPYKtcPKxOsRXe13SkwTEDoSvjTz53ugc6qhrg.Cq', '2023-05-01', 'Colombo', '42, Horton Place, Colombo 7', 2300, 'Peoples Bank', 'Aravinda Silva', 'Ward Place', '3456714021', 'Aravinda Silva_87027_qualification.zip', 0, '', 1, NULL),
(1027, 'Sumanapala', 'Silva', '665478291V', '0768541296', 'Mr', 'sumanapala@gmail.com', '$2y$10$iqkL9cBbI/9Qdyhl/6Omiu0XeVJzr5wA/0T2epFEgw/eMbPOlkjJa', '2023-05-04', 'Matara', 'No. 12, Suranimala Road, Matara', 2200, 'Sampath Bank', 'Sumanapala', 'Matara', '0887945193', 'Sumanapala Silva_15704_qualification.zip', 0, '', 1, NULL),
(1028, 'Thilak', 'Fernando', '768912345V', '0777654419', 'Mr', 'thilakfernando1@gmail.com', '$2y$10$jC5PttyQu9rnYUfhLv6JK.ZsNkbY6MGjuKF9GHfikcIPQV26mJqh6', '2023-05-05', 'Galle', 'No. 12, Main Street, Galle', 2300, 'Sampath Bank', 'Thilak Fernando', 'Galle', '3456789012', 'Thilak Fernando_51634_qualification.zip', 0, '', 1, NULL),
(1030, 'Pankaja', 'Silva', '932453675V', '0771234567', 'Mr', 'pankajaSilva@gmail.com', '$2y$10$LJS2xC1Ykayz7qFhLGaWke7JlJWqeS5afFDk5d//bvU24Kzu5CqaW', '2023-05-08', 'Kandy', 'No. 12, Peradeniya Road, Kandy', 2200, 'Peoples Bank', 'Pankaja Silva', 'Kandy', '1012345678', 'Pankaja Silva_60422_qualification.zip', 0, '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `med_ins_appointment_day`
--

CREATE TABLE `med_ins_appointment_day` (
  `med_ins_appointment_day_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `fee` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `noOfParticipants` int(11) NOT NULL,
  `current_participants` int(11) NOT NULL,
  `med_timeslot_id` int(11) NOT NULL,
  `meditation_instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_ins_appointment_day`
--

INSERT INTO `med_ins_appointment_day` (`med_ins_appointment_day_id`, `date`, `day`, `active`, `starting_time`, `ending_time`, `fee`, `address`, `noOfParticipants`, `current_participants`, `med_timeslot_id`, `meditation_instructor_id`) VALUES
(184, '2023-05-29', 'Monday', 0, '10:00:00', '15:00:00', '2000', '48/1, Horton Place,  Colombo 03', 5, 5, 158, 1020),
(185, '2023-05-22', 'Monday', 0, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 0, 158, 1020),
(186, '2023-05-15', 'Monday', 1, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 1, 158, 1020),
(187, '2023-05-08', 'Monday', 0, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 5, 158, 1020),
(188, '2023-05-24', 'Wednesday', 1, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 0, 159, 1020),
(189, '2023-05-17', 'Wednesday', 1, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 2, 159, 1020),
(190, '2023-05-10', 'Wednesday', 1, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 0, 159, 1020),
(191, '2023-05-03', 'Wednesday', 1, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 1, 159, 1020),
(192, '2023-05-28', 'Sunday', 1, '08:00:00', '16:00:00', '2500', 'No. 10, Jawatta Road, Colombo 05', 3, 0, 160, 1020),
(193, '2023-05-21', 'Sunday', 1, '08:00:00', '16:00:00', '2500', 'No. 10, Jawatta Road, Colombo 05', 4, 1, 160, 1020),
(194, '2023-05-14', 'Sunday', 1, '08:00:00', '16:00:00', '2500', 'No. 10, Jawatta Road, Colombo 05', 4, 0, 160, 1020),
(195, '2023-05-07', 'Sunday', 1, '08:00:00', '16:00:00', '2500', 'No. 10, Jawatta Road, Colombo 05', 4, 3, 160, 1020),
(196, '2023-05-28', 'Sunday', 1, '17:00:00', '23:00:00', '1500', 'No. 55, W.A. Silva Mawatha, Colombo 06', 6, 2, 161, 1020),
(197, '2023-05-21', 'Sunday', 1, '17:00:00', '23:00:00', '1500', 'No. 55, W.A. Silva Mawatha, Colombo 06', 6, 0, 161, 1020),
(198, '2023-05-14', 'Sunday', 1, '17:00:00', '23:00:00', '1500', 'No. 55, W.A. Silva Mawatha, Colombo 06', 6, 0, 161, 1020),
(199, '2023-05-07', 'Sunday', 1, '17:00:00', '23:00:00', '1500', 'No. 55, W.A. Silva Mawatha, Colombo 06', 6, 1, 161, 1020),
(200, '2023-05-31', 'Wednesday', 0, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 1, 1, 159, 1020),
(201, '2023-05-26', 'Friday', 1, '06:00:00', '12:00:00', '1800', 'No. 5, Sir Baron Jayathilaka Mawatha, Colombo 1', 6, 0, 162, 1020),
(202, '2023-05-19', 'Friday', 1, '06:00:00', '12:00:00', '1800', 'No. 5, Sir Baron Jayathilaka Mawatha, Colombo 1', 6, 3, 162, 1020),
(203, '2023-05-12', 'Friday', 1, '06:00:00', '12:00:00', '1800', 'No. 5, Sir Baron Jayathilaka Mawatha, Colombo 1', 6, 0, 162, 1020),
(204, '2023-05-05', 'Friday', 1, '06:00:00', '12:00:00', '1800', 'No. 5, Sir Baron Jayathilaka Mawatha, Colombo 1', 6, 0, 162, 1020),
(205, '2023-05-30', 'Tuesday', 1, '07:00:00', '15:00:00', '2200', '456, Peradeniya Road, Kandy', 4, 0, 163, 1021),
(206, '2023-05-23', 'Tuesday', 1, '07:00:00', '15:00:00', '2200', '456, Peradeniya Road, Kandy', 4, 0, 163, 1021),
(207, '2023-05-16', 'Tuesday', 1, '07:00:00', '15:00:00', '2200', '456, Peradeniya Road, Kandy', 4, 0, 163, 1021),
(208, '2023-05-09', 'Tuesday', 1, '07:00:00', '15:00:00', '2200', '456, Peradeniya Road, Kandy', 4, 0, 163, 1021),
(209, '2023-06-01', 'Thursday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 5, 0, 164, 1021),
(210, '2023-05-25', 'Thursday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 5, 0, 164, 1021),
(211, '2023-05-18', 'Thursday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 5, 0, 164, 1021),
(212, '2023-05-11', 'Thursday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 5, 0, 164, 1021),
(213, '2023-05-27', 'Saturday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 6, 0, 165, 1021),
(214, '2023-05-20', 'Saturday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 6, 0, 165, 1021),
(215, '2023-05-13', 'Saturday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 6, 0, 165, 1021),
(216, '2023-05-06', 'Saturday', 1, '08:00:00', '16:00:00', '1900', '456, Peradeniya Road, Kandy', 6, 0, 165, 1021),
(217, '2023-06-02', 'Friday', 1, '06:00:00', '12:00:00', '1800', 'No. 5, Sir Baron Jayathilaka Mawatha, Colombo 1', 6, 0, 162, 1020),
(218, '2023-05-29', 'Monday', 1, '06:00:00', '13:00:00', '1400', '789, Colombo Road, Galle', 4, 0, 166, 1022),
(219, '2023-05-22', 'Monday', 1, '06:00:00', '13:00:00', '1400', '789, Colombo Road, Galle', 4, 0, 166, 1022),
(220, '2023-05-15', 'Monday', 1, '06:00:00', '13:00:00', '1400', '789, Colombo Road, Galle', 4, 0, 166, 1022),
(221, '2023-05-08', 'Monday', 1, '06:00:00', '13:00:00', '1400', '789, Colombo Road, Galle', 4, 0, 166, 1022),
(222, '2023-06-02', 'Friday', 1, '07:00:00', '14:00:00', '1800', '789, Colombo Road, Galle', 5, 0, 167, 1022),
(223, '2023-05-26', 'Friday', 1, '07:00:00', '14:00:00', '1800', '789, Colombo Road, Galle', 5, 0, 167, 1022),
(224, '2023-05-19', 'Friday', 1, '07:00:00', '14:00:00', '1800', '789, Colombo Road, Galle', 5, 0, 167, 1022),
(225, '2023-05-12', 'Friday', 1, '07:00:00', '14:00:00', '1800', '789, Colombo Road, Galle', 5, 0, 167, 1022),
(226, '2023-06-01', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 168, 1025),
(227, '2023-05-25', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 168, 1025),
(228, '2023-05-18', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 168, 1025),
(229, '2023-05-11', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 168, 1025),
(230, '2023-05-28', 'Sunday', 1, '06:00:00', '02:00:00', '2250', '678, Kamburupitiya Road, Matara', 4, 0, 169, 1025),
(231, '2023-05-21', 'Sunday', 1, '06:00:00', '02:00:00', '2250', '678, Kamburupitiya Road, Matara', 4, 0, 169, 1025),
(232, '2023-05-14', 'Sunday', 1, '06:00:00', '02:00:00', '2250', '678, Kamburupitiya Road, Matara', 4, 0, 169, 1025),
(233, '2023-05-07', 'Sunday', 1, '06:00:00', '02:00:00', '2250', '678, Kamburupitiya Road, Matara', 4, 0, 169, 1025),
(234, '2023-06-01', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 170, 1025),
(235, '2023-05-25', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 170, 1025),
(236, '2023-05-18', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 170, 1025),
(237, '2023-05-11', 'Thursday', 1, '07:00:00', '15:00:00', '2250', '678, Kamburupitiya Road, Matara', 5, 0, 170, 1025),
(238, '2023-06-05', 'Monday', 1, '08:00:00', '13:00:00', '2000', '123, Galle Road, Colombo 03', 5, 0, 158, 1020),
(239, '2023-06-04', 'Sunday', 1, '08:00:00', '16:00:00', '2500', 'No. 10, Jawatta Road, Colombo 05', 4, 0, 160, 1020),
(240, '2023-06-04', 'Sunday', 1, '17:00:00', '23:00:00', '1500', 'No. 55, W.A. Silva Mawatha, Colombo 06', 6, 0, 161, 1020),
(241, '2023-06-05', 'Monday', 1, '06:00:00', '13:00:00', '1400', '789, Colombo Road, Galle', 4, 0, 166, 1022);

-- --------------------------------------------------------

--
-- Table structure for table `med_ins_register`
--

CREATE TABLE `med_ins_register` (
  `med_ins_registration_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `paid_amount` double NOT NULL,
  `registered_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `med_ins_appointment_day_id` int(11) NOT NULL,
  `meditation_instructor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `paid_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_ins_register`
--

INSERT INTO `med_ins_register` (`med_ins_registration_id`, `name`, `age`, `contact_number`, `gender`, `paid_amount`, `registered_date_and_time`, `med_ins_appointment_day_id`, `meditation_instructor_id`, `patient_id`, `paid_time`) VALUES
(8, 'Ruwan', 23, '0773543612', 'Mr', 2200, '2023-05-08 08:43:07', 191, 1020, 55, '2023-05-02 00:25:13'),
(9, 'Ruwan', 23, '0773543612', 'Mr', 2750, '2023-05-08 08:43:07', 195, 1020, 55, '2023-05-03 03:21:37'),
(10, 'Janitha', 24, '0773543612', 'Mr', 2200, '2023-05-08 08:43:07', 187, 1020, 55, '2023-05-03 03:27:54'),
(11, 'Roshan Perera', 29, '0772234121', 'Mr', 2200, '2023-05-08 08:43:07', 187, 1020, 57, '2023-05-03 03:37:29'),
(12, 'Imesha Bandara', 30, '0771234123', 'Ms', 2200, '2023-05-08 08:43:07', 187, 1020, 64, '2023-05-03 03:37:29'),
(13, 'Chathura Amarasingha', 29, '0771234512', 'Mr', 2200, '2023-05-08 08:43:07', 187, 1020, 65, '2023-05-03 03:41:29'),
(14, 'Dilki Samarawickrama', 31, '0761111234', 'Ms', 2200, '2023-05-08 08:43:07', 187, 1020, 68, '2023-05-03 03:41:29'),
(15, 'PAthirana', 66, '0773543612', 'Mr', 2200, '2023-05-08 08:43:07', 200, 1020, 55, '2023-05-03 03:59:35'),
(17, 'Priyantha', 27, '0772234567', 'Mr', 2200, '2023-05-08 08:43:07', 184, 1020, 59, '2023-05-04 14:59:12'),
(18, 'Kavindi', 32, '0761345829', 'Ms', 2200, '2023-05-08 08:43:07', 184, 1020, 60, '2023-05-04 15:33:59'),
(19, 'Imesha', 28, '0771234123', 'Ms', 2200, '2023-05-08 08:43:07', 184, 1020, 64, '2023-05-04 15:38:04'),
(20, 'Isuru', 28, '0761111111', 'Mr', 2200, '2023-05-08 08:43:07', 184, 1020, 69, '2023-05-04 15:39:38'),
(21, 'Udari', 29, '0772234501', 'Ms', 2200, '2023-05-08 08:43:07', 184, 1020, 66, '2023-05-04 15:40:51'),
(22, 'Udari', 29, '0772234501', 'Ms', 2200, '2023-05-08 08:43:07', 189, 1020, 66, '2023-05-04 15:43:42'),
(23, 'Parakrama', 45, '0776895439', 'Mr', 2200, '2023-05-08 08:43:07', 189, 1020, 66, '2023-05-04 15:49:24'),
(24, 'Pasan', 27, '0769845962', 'Mr', 1980, '2023-05-08 08:43:07', 202, 1020, 66, '2023-05-04 15:51:09'),
(25, 'Sampath', 42, '0762341267', 'Mr', 1980, '2023-05-08 08:43:07', 202, 1020, 63, '2023-05-04 15:53:06'),
(26, 'Janitha', 29, '0769845823', 'Mr', 1980, '2023-05-08 08:43:07', 202, 1020, 63, '2023-05-04 15:55:24'),
(27, 'Shantha', 0, '0769572690', 'Mr', 2750, '2023-05-08 08:45:10', 193, 1020, 63, '2023-05-04 15:57:20'),
(28, 'Malin', 27, '0772345678', 'Mr', 2200, '2023-05-08 08:45:10', 186, 1020, 80, '2023-05-05 15:40:34'),
(29, 'Dilrukshi', 24, '0723456789', 'Ms', 1650, '2023-05-08 08:45:10', 196, 1020, 79, '2023-05-05 16:16:17'),
(30, 'Kanchuka', 27, '0784159685', 'Mr', 1650, '2023-05-08 08:45:10', 196, 1020, 79, '2023-05-05 16:18:53'),
(31, 'Kasthuri', 29, '0721587493', 'Mr', 2750, '2023-05-08 08:45:10', 195, 1020, 74, '2023-05-05 16:23:47'),
(32, 'Maduranga', 26, '0769547862', 'Mr', 2750, '2023-05-08 08:45:10', 195, 1020, 74, '2023-05-05 16:25:20'),
(33, 'Ruwan', 26, '0773543612', 'Mr', 1650, '2023-05-08 08:45:10', 199, 1020, 55, '2023-05-07 01:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `med_timeslot`
--

CREATE TABLE `med_timeslot` (
  `med_timeslot_id` int(11) NOT NULL,
  `appointment_day` varchar(255) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `fee` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `noOfParticipants` int(11) NOT NULL,
  `meditation_instructor_id` int(11) NOT NULL,
  `continue_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_timeslot`
--

INSERT INTO `med_timeslot` (`med_timeslot_id`, `appointment_day`, `starting_time`, `ending_time`, `fee`, `address`, `noOfParticipants`, `meditation_instructor_id`, `continue_flag`) VALUES
(158, 'Monday', '08:00:00', '13:00:00', 2000, '123, Galle Road, Colombo 03', 5, 1020, 1),
(159, 'Wednesday', '08:00:00', '13:00:00', 2000, '123, Galle Road, Colombo 03', 5, 1020, 0),
(160, 'Sunday', '08:00:00', '16:00:00', 2500, 'No. 10, Jawatta Road, Colombo 05', 4, 1020, 1),
(161, 'Sunday', '17:00:00', '23:00:00', 1500, 'No. 55, W.A. Silva Mawatha, Colombo 06', 6, 1020, 1),
(162, 'Friday', '06:00:00', '12:00:00', 1800, 'No. 5, Sir Baron Jayathilaka Mawatha, Colombo 1', 6, 1020, 1),
(163, 'Tuesday', '07:00:00', '15:00:00', 2200, '456, Peradeniya Road, Kandy', 4, 1021, 1),
(164, 'Thursday', '08:00:00', '16:00:00', 1900, '456, Peradeniya Road, Kandy', 5, 1021, 1),
(165, 'Saturday', '08:00:00', '16:00:00', 1900, '456, Peradeniya Road, Kandy', 6, 1021, 1),
(166, 'Monday', '06:00:00', '13:00:00', 1400, '789, Colombo Road, Galle', 4, 1022, 1),
(167, 'Friday', '07:00:00', '14:00:00', 1800, '789, Colombo Road, Galle', 5, 1022, 1),
(168, 'Thursday', '07:00:00', '15:00:00', 2250, '678, Kamburupitiya Road, Matara', 5, 1025, 1),
(169, 'Sunday', '06:00:00', '02:00:00', 2250, '678, Kamburupitiya Road, Matara', 4, 1025, 1),
(170, 'Thursday', '07:00:00', '15:00:00', 2250, '678, Kamburupitiya Road, Matara', 5, 1025, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nutritionist`
--

CREATE TABLE `nutritionist` (
  `nutritionist_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verified_admin_id` int(11) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutritionist`
--

INSERT INTO `nutritionist` (`nutritionist_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `fee`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `delete_flag`, `verify_token`, `verified_admin_id`, `deactivated_admin_id`) VALUES
(14, 'Lakshani', 'Fernando', '951244639V', '0771234567', 'Ms', 'lakshanifernando@gmail.com', '$2y$10$Wl12XpiD8QD.ovL63mP6xuEJWtopVGAjkLJ1EC5TTFfRIT9RIJMPS', '2023-05-01', '2451822', 2500, 'Sampath Bank', 'Lakshani Fernando', 'Nugegoda', '0012345678', 'Lakshani Fernando_49342_qualification.zip', 0, '', 1, NULL),
(15, 'Chamara', 'DeSilva', '862463897V', '0775567890', 'Mr', 'chamaradesilva@gmail.com', '$2y$10$pwZyli6GBr4dBhv9eQib9OJpSjgmUc/9yNuOfxq0g0KvazP3dFFeO', '2023-05-01', '2564518', 2400, 'Commercial Bank', 'Chamara De Silva', 'Kandy', '0098765432', 'Chamara DeSilva_08945_qualification.zip', 0, '', 1, NULL),
(16, 'Amila', 'Perera', '922547311V', '0772345678', 'Mr', 'amilaperera@gmail.com', '$2y$10$s2pqFZYH5ZlenOP4dlcZReYsZU9Y2E8qBuCIKC1ZF7fv9olH2s9bi', '2023-05-01', '2478543', 2600, 'Sampath Bank', 'Amila Perera', 'Colombo', '0054321098', 'Amila Perera_85138_qualification.zip', 0, '', 1, NULL),
(17, 'Dilan', 'Bandara', '752345672V', '0771122334', 'Mr', 'dilanibandara@gmail.com', '$2y$10$KnyqHDbqNq8DXuEnE9dlAu6BOcdPOv2wiSZaYSWxZNLEyaLP4yy0O', '2023-05-01', '2954126', 2200, 'Peoples Bank', 'Dilan Bandara', 'Galle', '0023456789', 'Dilan Bandara_26526_qualification.zip', 0, '', 1, NULL),
(18, 'Kusal', 'Amarasinghe', '962345678V', '0774455667', 'Mr', 'kusalamarasinghe@gmail.com', '$2y$10$m.fK1UxFLe1RUEyEv.Y9h.n2cN7WHv/b5aw796OqjvHh6TBrQdHqq', '2023-05-01', '2254789', 2300, 'Sampath Bank', 'Kusal Amarasinghe', 'Matara', '1498762354', 'Kusal Amarasinghe_63129_qualification.zip', 1, '', 1, 1),
(19, 'Shalin', 'Jayawardena', '893456721V', '0775567399', 'Mr', 'shalinjayawardena@gmail.com', '$2y$10$k7t8cx3L0uVlQty5w8y3vuh1ZbFsh53XkhgJQ0Jtpd5aSeDwRKUXq', '2023-05-01', '2364785', 2300, 'Sampath Bank', 'Shalin Jayawardena', 'Maligawatta', '9445789541', 'Shalin Jayawardena_63624_qualification.zip', 0, '', 1, NULL),
(20, 'Jayaprakash', 'Nirmal', '784928763V', '0765894381', 'Mr', 'jayaprakash@gmail.com', '$2y$10$nUI3Pn7DpDQoa8YUyK41heg6/VaQrGvEG/qxZjWEHTs6WeFk9/vEO', '2023-05-04', '2346981', 2300, 'Sampath Bank', 'Jayaprakash', 'Colombo', '3458795621', 'Jayaprakash Nirmal_65111_qualification.zip', 1, '', 1, 1),
(21, 'Nadeeka', 'Wijesinghe', '901234568V', '0775678901', 'Mr', 'nadeekaWijesingha@gmail.com', '$2y$10$KZD2AJOv9nwmb7XzvowrsOzHxudVo.69TRSOyrvGgtYyWsoY1LrBK', '2023-05-05', '2354789', 2200, 'National Savings Bank', 'Nadeeka Wijesinghe', 'Panadura', '5678901234', 'Nadeeka Wijesinghe_47012_qualification.zip', 0, '', 1, NULL),
(22, 'Dhanushika', 'Wijesingha', '992111489V', '0764896752', 'Ms', 'danushikawijeshige@gmail.com', '$2y$10$MkBEp8jfggk91THqYzQiNeCfO/6u7bkGVGYhb.sgGwbW57sxVQpQi', '2023-05-07', '2178456', 2200, 'Sampath Bank', 'Dhanushika', 'Kandy', '1547895432', 'Dhanushika Wijesingha_86702_qualification.zip', 0, '', 1, NULL),
(25, 'Anjali', 'Silva', '821234567V', '0773456789', 'Mr', 'anjali.silva@gmail.com', '$2y$10$PaPTrrAv85sqnEq4D3k8beydBjASNKZMRYrnz.ptF3XugM1OThhVu', '2023-05-08', '2578469', 2200, 'Hatton National Bank', 'Anjali Silva', 'Kiribathgoda', '3456789012', 'Anjali Silva_94971_qualification.zip', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_request`
--

CREATE TABLE `order_request` (
  `order_request_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `ordered_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pharmacist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_request`
--

INSERT INTO `order_request` (`order_request_id`, `name`, `contact_number`, `delivery_address`, `prescription`, `ordered_date_and_time`, `pharmacist_id`, `patient_id`, `status`) VALUES
(22, 'Sujitha', '0767482143', '45, Sir Chittampalam A. Gardiner Mawatha, Colombo 02', '1683251756_prescription.zip', '2023-05-08 08:50:24', 17, 56, '0'),
(23, 'Kanchana', '0773543617', 'Cathedral Vicarage Aluthmawatha Road, 15', '1683297557_prescription.zip', '2023-05-08 08:50:24', 17, 73, '0');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(4) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `delete_flag`, `verify_token`, `deactivated_admin_id`) VALUES
(55, 'Ruwan', 'Fernando', '925790685V', '0773543612', 'Mr', 'ruwan.fernando@gmail.com', '$2y$10$Kx/z05a4yLt26UGOPrsHK.pxtQklU5pLX2tyebw0vpnyUud1ooynO', '2023-04-30 09:03:04', 0, '', NULL),
(56, 'Sujitha', 'Jayawardena', '941230123V', '0767482143', 'Mr', 'sujithajayawardena@gmail.com', '$2y$10$dsqXAwESTzzAI1fUw8YcgeNYBalD2jSiJyRIkkEreR/n3PS9Q8/Xm', '2023-04-30 09:10:55', 0, '', NULL),
(57, 'Roshan', 'Perera', '942340763V', '0772234121', 'Mr', 'roshanperera@gmail.com', '$2y$10$hQZPZ225o37YM.8igvATe.tDiO6yj7tpKYcrc/vM68sQLOOwNrHJC', '2023-04-30 09:13:50', 0, '', NULL),
(58, 'Nisansala', 'Abeysekera', '941230753V', '0761234129', 'Ms', 'nisansala.abeysekera@gmail.com', '$2y$10$liI0C6FDAeYXgoA6dYEhFOKDqoYh6QkxuM7qAL6wI9M35pmZS1qoi', '2023-04-30 09:15:41', 1, '', 1),
(59, 'Priyantha', 'Gunaratne', '925760392V', '0772234567', 'Mr', 'priyantha.gunarathne@gmail.com', '$2y$10$XyU1AKleKQNPojclnN05.OgSwOqBZxSoyPbUGgFKhn0C4BgMJqOFq', '2023-04-30 09:17:10', 0, '', NULL),
(60, 'Kavindi', 'Rathnayake', '952131760V', '0761345829', 'Ms', 'kavindi.rathnayake@gmail.com', '$2y$10$tF/Res.9VQXAsS95h/FRZegabQKqqvffX5LNzOQckqliT.prTqg.a', '2023-04-30 09:18:46', 0, '', NULL),
(61, 'Tharaka', 'Wijesekara', '954076291V', '0771111111', 'Mr', 'tharaka.wijesekara@gmail.com', '$2y$10$08BFtWBFozJaWoFXIpYF0eyFVFWhftyQNb3BLNJKgmNG9Z5OXsLAy', '2023-04-30 09:20:19', 0, '', NULL),
(62, 'Sanduni', 'Kariyawasam', '934560127V', '0771234567', 'Ms', 'sanduni.kariyawasam@gmail.com', '$2y$10$sX/96otUI7Ooj/4Phsw90ufY5Mj7H/5tJIFswmnliSJrI03TsrcUO', '2023-04-30 09:22:24', 0, '', NULL),
(63, 'Sampath', 'Silva', '911230643V', '0762341267', 'Mr', 'sampath.silva@gmail.com', '$2y$10$qwYlQ3w6cTOBSwNJo1FLf.xoIEvLtXDrkTQ6PhFm.mbJNemFcCBym', '2023-04-30 09:24:18', 0, '', NULL),
(64, 'Imesha', 'Bandara', '931230456V', '0771234123', 'Ms', 'imesha.Bandara@gmail.com', '$2y$10$iwlAzLLSNSif2GtqbcQlCOE0mWXPtEj/s9B7f/y6k5h4PhT17otx2', '2023-04-30 09:25:27', 0, '', NULL),
(65, 'Chathura', 'Amarasinghe', '931230908V', '0771234512', 'Mr', 'chathura.amarasinghe@gmail.com', '$2y$10$GpCRCTIogDs0UI8iAgoYiOr.fznE/uyLu5Ybr8mzl9RryulC5J65i', '2023-04-30 09:38:46', 0, '', NULL),
(66, 'Udari', 'Peiris', '943231289V', '0772234501', 'Ms', 'udari.peiris@gmail.com', '$2y$10$eydMiBzIQcRz/AcVhssooe8QNpWmx9RHmSQGs./NJrH4qHi.0J7nG', '2023-04-30 09:44:43', 0, '', NULL),
(67, 'Chamara', 'Gunawardena', '911233345V', '0771234534', 'Mr', 'chamara.gunawardena@gmail.com', '$2y$10$oWbYKOYkj6f3MLyKYzzeQOgZG3w656HikPStu/yvv1BCyaToEWumK', '2023-04-30 09:47:34', 0, '', NULL),
(68, 'Dilki', 'Samarawickrama', '921230934V', '0761111234', 'Ms', 'dilki.samarawickrama@gmail.com', '$2y$10$TEQNpWs4ZfMsxbLDGzvFFu.jE3haZk1yXQ7r/bGJR7hD6C5GgaV12', '2023-04-30 09:48:46', 0, '', NULL),
(69, 'Isuru', 'Madushan', '935674123V', '0761111111', 'Mr', 'isuru.madushan@gmail.com', '$2y$10$Nnp4o/4vnfBK.A/x2kIj4uN93g1EQeM8eNzV1txgCKWSOFHCRjHpe', '2023-04-30 09:50:07', 0, '', NULL),
(70, 'Sahan', 'Weerasingha', '992111780V', '0412229050', 'Mr', 'sahan@gmail.com', '$2y$10$JtoB6E9UbpN3S7dw5CEOZeFG09zC18a4FSlB3zqs5l3VSFa/oi1ca', '2023-04-30 14:20:36', 1, '', 1),
(71, 'Sayuni', 'Rodrigo', '895478695V', '0741524367', 'Ms', 'sayuni@gmail.com', '$2y$10$wN0MtVANX7vfKTa3XwZs9eGsNip7sQ.wKyx.RF7b5OSMns6tEn.MG', '2023-05-04 10:39:05', 1, '', 1),
(72, 'Kamal', 'Narendra', '998745174V', '0761234111', 'Mr', 'kamal@gmail.com', '$2y$10$VIiJ6sSmWhK5uOkuhbp3FeNGaYNHtt5xh7HDp1aiOf4qEW1Kzrkl2', '2023-05-04 10:43:04', 0, '', NULL),
(73, 'Kanchana', 'Perera', '998745122V', '0773543617', 'Mr', 'dixitnuri@gmail.com', '$2y$10$iDnPatF0Hhg4feTG2ifG0e2vRPWXE8TFx9PDaskIcHPY3U10onlrC', '2023-05-04 10:46:07', 0, '922a0aca612f3377259db882077c4162', NULL),
(74, 'Kasthuri', 'Sumanapala', '875748596V', '0721587493', 'Mr', 'kasthuri@gmail.com', '$2y$10$ujJ2zVTz3rKnPAE4zKbeTeqzB4IawWjxhXtbh1l2bd5G.q70EKUQ2', '2023-05-04 13:16:36', 0, '', NULL),
(75, 'Punsisi', 'viharage', '904596125V', '0771964859', 'Mr', 'punsaravihar@gmail.com', '$2y$10$H8xZGQ0y9RGKG3h7wOLA3eVvO1SJyldI9a0yn9XcCw7.JIyaCGdMW', '2023-05-05 12:21:30', 0, '', NULL),
(76, 'Pahan', 'Rajapaksha', '974965732V', '0772496782', 'Mr', 'pahanRaj@gmail.com', '$2y$10$5QixbSiTs1BYBhTaiZIstOYfFAMMe3.oUfDf8lnYay5X6ZExavkpK', '2023-05-05 13:16:31', 0, '', NULL),
(77, 'Samantha', 'Samantha', '963456789V', '0711234567', 'Mr', 'samantha.silva@gmail.com', '$2y$10$pbq7iaxji9sqMQb3Btxb4eMbn005MTIdYt3Qo7tqAAgQ.Z4d.phuW', '2023-05-05 15:26:34', 0, '', NULL),
(78, 'Ranil', 'Rajapaksa', '823456789V', '0777890123', 'Mr', 'ranil.rajapaksa@gmail.com', '$2y$10$K6bo2G2dPfYxrJyT5h2O.eqrAmbG1vJeWo.BH89p840126e1VTTKK', '2023-05-05 15:27:58', 0, '', NULL),
(79, 'Dilrukshi', 'Samarasinghe', '945678903V', '0723456789', 'Ms', 'dilrukshi.samarasinghe@gmail.com', '$2y$10$1BoZtpYngu557EPK.O1zheoTxpFN/ZsFZT/xcmud7Mox19SZWQkua', '2023-05-05 15:29:01', 0, '', NULL),
(80, 'Malin', 'Gunawardena', '897654321V', '0772345678', 'Mr', 'malini.guna@gmail.com', '$2y$10$nMCUK15/.FkRogvnkZvz2.CvElQL1SW69TI2TInt.klnF93tD6gwu', '2023-05-05 15:30:48', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verified_admin_id` int(11) NOT NULL,
  `deactivated_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `pharmacy_name`, `city`, `address`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `delete_flag`, `verify_token`, `verified_admin_id`, `deactivated_admin_id`) VALUES
(17, 'Dilanka', 'Perera', '951230123V', '0771234567', 'Mr', 'dilanka.perera@gmail.com', '$2y$10$c7wA2.I1BR3muiv7LtoP2.VMXmlswXq88Tq/cSg9xk/gXS5R/nnc6', '2023-05-01 02:12:34', '2415789', 'Health Line Pharmacy', 'Colombo', 'No.10, Galle Road, Colombo 06', 'Hatton National Bank', 'Dilanka Perera', 'Colombo 07', '1234567890', 'Dilanka Perera_03104_qualification.zip', 0, '', 1, NULL),
(18, 'Manorama', 'Fernando', '981232456V', '0712345678', 'Mr', 'manori.fernando@gmail.com', '$2y$10$ypu0FUK2WnuN4nJMEANmT.oVWaDImQv3VZ7jl3cFvN4r6uUb32bfG', '2023-05-01 02:40:21', '2458149', 'Health Care Pharmacy', 'Kandy', 'No.35, Kandy Road, Kandy', 'Commercial Bank', 'Manori Fernando', 'Kandy', '2345678901', 'Manorama Fernando_45423_qualification.zip', 0, '', 1, NULL),
(19, 'Anura', 'Silva', '830345678V', '0763456789', 'Mr', 'anura.silva@gmail.com', '$2y$10$vX9jA9V9ZnPzXMrLC7EDx.kT1Ty7j5agmt80JQua0WGl7uGSwtLEW', '2023-05-01 02:45:04', '2145135', 'Medi Zone Pharmacy', 'Matara', 'No.56, Galle Road, Matara', 'Sampath Bank', 'Anura Silva', 'Matara', '4567890120', 'Anura Silva_46103_qualification.zip', 1, '', 1, 1),
(20, 'Nishantha', 'Wijeratne', '900123456V', '0779876543', 'Mr', 'nishantha.wijeratne@gmail.com', '$2y$10$hAVQSFgC2Vi/5GNHh622HOuI7bQGct0SpOEqBlank6Zop58FLufXK', '2023-05-01 03:00:19', '2458796', 'Galle Health Care', 'Galle', 'No.78, Fort Road, Galle', 'Peoples Bank', 'Nishantha Wijeratne', 'Galle', '4567890479', 'Nishantha Wijeratne_00324_qualification.zip', 1, '', 1, 1),
(21, 'Sharmila', 'Gunasekara', '871234567V', '0767890123', 'Ms', 'sharmila.gunasekara@gmail.com', '$2y$10$OaS9BTEe2EYXg70pAT0fOuPglll2dBJi3o6MIEPVnoyoA/ldKWeBy', '2023-05-01 03:03:01', '2534896', 'New Life Pharmacy', 'Nugegoda', 'No.25, High Level Road, Nugegoda', 'Bank of Ceylon', 'Sharmila Gunasekara', 'Nugegoda', '5678909030', 'Sharmila Gunasekara_87301_qualification.zip', 0, '', 1, NULL),
(22, 'Indika', 'Bandara', '941234567V', '0716789012', 'Mr', 'indika.bandara@gmail.com', '$2y$10$Hs1NXAfXeEg3dsIAn9OdJeKApEqljB/LmsWXeQ3ApyNMSLO4RqPwC', '2023-05-01 03:07:01', '2715965', 'Medi Link Pharmacy', 'Ratnapura', 'No.40, Colombo Road, Ratnapura', 'Commercial Bank', 'Indika Bandara', 'Ratnapura', '6789012345', 'Indika Bandara_54389_qualification.zip', 0, '', 1, NULL),
(23, 'Samantha', 'Silva', '901234567V', '0711234567', 'Mr', 'samantha.silva@gmail.com', '$2y$10$4Z7EawWlii5bsgeKeephfuTk7AoTa8DeDSisMrLQe07uUtf7GRt.u', '2023-05-01 03:14:07', '2458145', 'Health Care Pharmacy', 'Galle', 'No. 123, Galle Road, Colombo 03', 'Commercial Bank', 'Samantha Silva', 'Colombo 03', '1234564799', 'Samantha Silva_65045_qualification.zip', 0, '', 1, NULL),
(24, 'Sumudu', 'Ariyawansha', '769875269V', '0775896482', 'Mr', 'sumudu@gmail.com', '$2y$10$kYKUoorsyB1Gnhe0ZmRXuOA4if6h5/SJ481BuvxpjnzXEkvodEWSq', '2023-05-04 08:22:27', '2489657', 'Medic Pharmacy Galle', 'Galle', '98, Wakwella Road, Galle', 'Sampath Bank', 'Sumudu Ariyawansha', 'Galle', '2478965789', 'Sumudu Ariyawansha_61300_qualification.zip', 0, '', 1, NULL),
(25, 'Suresh', 'Perera', '892341289V', '0716787711', 'Mr', 'sureshperera1@gmail.com', '$2y$10$5HjB9PkmGCQI7sY8/i5Zpeulc0r7/3zJWLZst3N4bOEQm8rPy3LOO', '2023-05-04 21:14:13', '2415896', 'Health Wise Pharmacy', 'Kandy', 'No. 98, Yatinuwara Street, Kandy', 'Commercial Bank', 'Suresh', 'Kandy', '8901234567', 'Suresh Perera_11768_qualification.zip', 0, '', 1, NULL),
(26, 'Maduwanthi', 'Perera', '902198752V', '0769845796', 'Ms', 'mwijesinghe528@gmail.com', '$2y$10$x0csRGL2OJQL7TWsdEWLzOZJlIk1LNSUdvAD./QPwacCndQX2C1bC', '2023-05-06 22:50:51', '2415964', 'City Pharmacy', 'Kandy', 'Viharage Aluthmawatha Road, Gampola, Kandy', 'Hatton National Bank', 'Maduwanthi', 'Kandy', '1254789654', 'Maduwanthi Perera_72054_qualification.zip', 0, '', 1, NULL),
(27, 'Ajith', 'Kumara', '712341234V', '0789012345', 'Mr', 'ajith.kumara@gmail.com', '$2y$10$SxDkzXuZrmCqxiD0OxSefe.6zhBCHA93BokztQ4MitMUIj52jJxgS', '2023-05-08 02:21:38', '2354785', 'Health Link Pharmacy', 'Ratnapura', 'No. 56, Colombo Road, Ratnapura', 'Hatton National Bank', 'Ajith Kumara', 'Ratnapura', '5678901234', 'Ajith Kumara_15260_qualification.zip', 0, '', 1, NULL),
(28, 'Rohan', 'Gunawardena', '931234567V', '0773456789', 'Mr', 'rohan.gunawardena@gmail.com', '$2y$10$.wW9QwIWO9gzqWgUwNkis.UPbtWaRtbZNi4GE6ihBGQpQZ95g2QrS', '2023-05-08 02:23:50', '2418579', 'Happy Pharmacy', 'Malabe', 'No. 12, Kaduwela Road, Malabe', 'Sampath Bank', 'Rohan Gunawardena', 'Malabe', '4567890123', 'Rohan Gunawardena_26865_qualification.zip', 0, '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requested_counsellor`
--

CREATE TABLE `requested_counsellor` (
  `requested_counsellor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `email_verified_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_counsellor`
--

INSERT INTO `requested_counsellor` (`requested_counsellor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `city`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `email_verified_flag`) VALUES
(24, 'Nishika', 'Fernando', '913456789V', '0778765432', 'Mr', 'nishika.fernando@gmail.com', '$2y$10$Agm7OstKeUS9PicpWFNi3uX7fjpm0wOnbeJNMC14PQlkMWdT0Edz.', '2023-05-01', '1241585', 'Matara', 'Hatton National Bank', 'Nishika Fernando', 'Galle', '1000123456', 'Nishika Fernando_17179_qualification.zip', 1),
(26, 'Madushani', 'Rajapakse', '921345678V', '0702345678', 'Ms', 'madushani.rajapakse@gmail.com', '$2y$10$O7mXVrZSwkx9AL70aNLKmuoag04PXLYvpLksoaD.z7ndzFshOFXLO', '2023-05-01', '2417895', 'Galle', 'Commercial Bank', 'Madushani Rajapakse', 'Negombo', '9876543211', 'Madushani Rajapakse_86080_qualification.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requested_doctor`
--

CREATE TABLE `requested_doctor` (
  `requested_doctor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `email_verified_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_doctor`
--

INSERT INTO `requested_doctor` (`requested_doctor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `type`, `city`, `specialization`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `email_verified_flag`) VALUES
(41, 'Dinusha', 'Silva', '922345612V', '0763549821', 'Ms', 'dinusha.silva@gmail.com', '$2y$10$Hhi5DB7Gj/3sIwDkxbtP0.g8fCH7THEkTtOaVJ74mlYlfriZVx4nm', '2023-05-01', '2198643', 'MBBS', 'Galle', 'Gynecologist', 'Sampath Bank', 'Dinusha Silva', 'Nugegoda', '5632418976', 'Dinusha Silva_30276_qualification.zip', 1),
(42, 'Roshan', 'Fernando', '803456289V', '0778654321', 'Mr', 'roshan.fernando@gmail.com', '$2y$10$1yfHSEtslZBFmWaiwqZAQul58/wo0xU2iOPoe155GOov3dkg.ac.i', '2023-05-01', '1817534', 'MBBS', 'Galle', 'Gynecologist', 'Hatton National Bank', 'Roshan Fernando', 'Kollupitiya', '5678934502', 'Roshan Fernando_98480_qualification.zip', 1),
(43, 'Anusha', 'Mendis', '932145678V', '0719834562', 'Ms', 'anusha.mendis@gmail.com', '$2y$10$OWo9dzwSCytnYH7Tt8CJHO77CUwx7z98rwY7nOKUMAIlhUhQ736Aq', '2023-05-01', '2275364', 'MBBS', 'Matara', 'General Practitioner', 'National Savings Bank', 'Anusha Mendis', 'Colombo 7', '4562378910', 'Anusha Mendis_77150_qualification.zip', 1),
(44, 'Ruwan', 'Jayasinghe', '820943672V', '0775643298', 'Mr', 'ruwan.jayasinghe@gmail.com', '$2y$10$s8ljseE5RxaRstzW7s/0Iu1vBObPGFnCWStxtKdalYTVHpCArLM.y', '2023-05-01', '2018467', 'MBBS', 'Kandy', 'Hematologist', 'Bank of Ceylon', 'Ruwan Jayasinghe', 'Panadura', '8765419823', 'Ruwan Jayasinghe_39054_qualification.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requested_meditation_instructor`
--

CREATE TABLE `requested_meditation_instructor` (
  `requested_meditation_instructor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `email_verified_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_meditation_instructor`
--

INSERT INTO `requested_meditation_instructor` (`requested_meditation_instructor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `city`, `address`, `fee`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `email_verified_flag`) VALUES
(32, 'Thilina', 'Bogoda', '872345987V', '0712345640', 'Mr', 'thilina.bogoda@gmail.com', '$2y$10$ucwLBn9/MgfiCI/xmLxuE.uI3M7SJf2rSgidH1FFLlUh2zn6n7dCy', '2023-05-01', 'Colombo', 'No. 32, Galle Road, Colombo 03', 2300, 'Commercial Bank', 'Thilina Bogoda', 'Colombo 03', '1012345679', 'Thilina Bogoda_14747_qualification.zip', 1),
(33, 'Janitha', 'Amal', '983456239V', '0762345125', 'Mr', 'janithaAmal@gmail.com', '$2y$10$N2cvjtgzyAaC0zi4RQE/XuQd7xMV1jVYysHf2J5PT0GgJVdDLpInC', '2023-05-01', 'Malabe', 'No. 10, Main Street, Malabe', 2400, 'Sampath Bank', 'Janitha Amal', 'Malabe', '1012345681', 'Janitha Amal_22100_qualification.zip', 1),
(34, 'Devinda', 'Rajapakse', '832456789V', '0776345678', 'Mr', 'devinda.rajapakse@gmail.com', '$2y$10$0B49OFc6JNN6CB6DC9sineEvbbFNv5T.5eMp/zJztIlytHUGhFW/a', '2023-05-01', 'Galle', 'No. 56, Matara Road, Galle', 2500, 'Bank of Ceylon', 'Devinda Rajapakse', 'Galle', '1012345682', 'Devinda Rajapakse_57109_qualification.zip', 1),
(35, 'Dhanushka', 'DeSilva', '972345678V', '0717654321', 'Mr', 'dhanushka.desilva@gmail.com', '$2y$10$nI5faANoMLg5k5LlK8cXeuJ7e6RAfJRrfNj2.MT/riNq93ZjQrpAS', '2023-05-01', 'Kandy', 'No. 25, Colombo Street, Kandy', 2300, 'Commercial Bank', 'Dhanushka De Silva', 'Kandy', '1012345683', 'Dhanushka DeSilva_28678_qualification.zip', 1),
(36, 'Nuwan', 'Perera', '921462397V', '0771234411', 'Mr', 'nuwanperera@gmail.com', '$2y$10$ptxyAjoBqAlXg4LJc1uZiOeVe.CRZiC8RcUcUmY5oTpPlETGf4voS', '2023-05-01', 'Colombo', 'No. 45, Galle Road, Colombo 03', 2000, 'Commercial Bank', 'Nuwan Perera', 'Colombo 03', '1234567890', 'Nuwan Perera_44760_qualification.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requested_nutritionist`
--

CREATE TABLE `requested_nutritionist` (
  `requested_nutritionist_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `email_verified_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_nutritionist`
--

INSERT INTO `requested_nutritionist` (`requested_nutritionist_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `fee`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `email_verified_flag`) VALUES
(15, 'Mala', 'Perera', '871234567V', '0771231496', 'Ms', 'mala.perera@gmail.com', '$2y$10$BjL1tdUIkWrL9pDJDjG8Fe9P7.Aag.p0z1inu8J47jzCY7oJ3bD.y', '2023-05-01', '2145786', 2200, 'Commercial Bank', 'Mala Perera', 'Nawala', '1234567890', 'Mala Perera_08527_qualification.zip', 1),
(17, 'Kamal', 'Ratnayake', '871234568V', '0774567890', 'Mr', 'kamal.ratnayake@gmail.com', '$2y$10$1FKtzXWIbP4DugppDHVi8uckKXHyt/Z3zKwBSczDg62JiN1GLyzpm', '2023-05-01', '2417856', 2600, 'Peoples Bank', 'Kamal Ratnayake', 'Kurunegala', '4567890123', 'Kamal Ratnayake_60455_qualification.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requested_pharmacist`
--

CREATE TABLE `requested_pharmacist` (
  `requested_pharmacist_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `slmc_reg_number` varchar(255) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL,
  `email_verified_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_pharmacist`
--

INSERT INTO `requested_pharmacist` (`requested_pharmacist_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `pharmacy_name`, `city`, `address`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`, `email_verified_flag`) VALUES
(13, 'Sandun', 'Fernando', '912345678V', '0772345678', 'Mr', 'sandun.fernando@gmail.com', '$2y$10$NXjIKf4aNKsEUcpcUN6LzeAtD98xzVYDIsg7QS/FBsrOKvwaVxLUK', '2023-05-01', '2415263', 'Health Plus Pharmacy', 'Kandy', 'No. 789, Peradeniya Road, Kandy', 'Hatton National Bank', 'Sandun Fernando', 'Kandy', '3456789012', 'Sandun Fernando_58001_qualification.zip', 1),
(15, 'Prabath', 'Mendis', '912345679V', '0712345159', 'Mr', 'prabath.mendis@gmail.com', '$2y$10$te67EhRyK..xGh7jowgR1.vaem/IBqxIB.rjV1IsYXRDJWfD3eswO', '2023-05-01', '2748596', 'Green Pharmacy', 'Nugegoda', 'No. 456, High Level Road, Nugegoda', 'Peoples Bank', 'Prabath Mendis', 'Nugegoda', '6789012345', 'Prabath Mendis_60849_qualification.zip', 1),
(16, 'Chaminda', 'selva', '921451232V', '0771234170', 'Mr', 'chaminda.silva@email.com', '$2y$10$Xbd42yHvFI8exRXmcyICruI/Jgtw5XpUPtg0GbYi7DRR1J3rqA1/y', '2023-05-01', '2563789', 'Health Plus Pharmacy', 'Colombo', 'No. 45, Galle Road, Colombo 03', 'Bank of Ceylon', 'Chaminda Silva', 'Colombo', '1234567890', 'Chaminda selva_44220_qualification.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_diet_plan`
--

CREATE TABLE `request_diet_plan` (
  `request_diet_plan_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `height` int(11) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `medical_details` text NOT NULL,
  `allergies` text NOT NULL,
  `sleeping_hours` double NOT NULL,
  `water_consumption_per_day` int(11) NOT NULL,
  `goal` text NOT NULL,
  `paid_amount` double NOT NULL,
  `requested_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nutritionist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `is_issued` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `address` varchar(255) NOT NULL,
  `registration_fee` double NOT NULL,
  `created_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `counsellor_id` int(11) DEFAULT NULL,
  `nutritionist_id` int(11) DEFAULT NULL,
  `meditation_instructor_id` int(11) DEFAULT NULL,
  `noOfParticipants` int(11) NOT NULL,
  `current_participants` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `title`, `description`, `date`, `starting_time`, `ending_time`, `address`, `registration_fee`, `created_date_and_time`, `counsellor_id`, `nutritionist_id`, `meditation_instructor_id`, `noOfParticipants`, `current_participants`, `active`) VALUES
(6, 'Meditation for Beginners', 'Learn the basics of meditation, including proper posture, breath control, and techniques for focusing the mind.', '2023-03-07', '08:00:00', '16:00:00', 'No. 480, T.B. Jayah Mawatha, Colombo 01', 2000, '2023-01-02 08:54:16', NULL, NULL, 1020, 40, 0, 1),
(7, 'Mindful Living', 'Learn how to live in the present moment, increase self-awareness, and reduce stress through meditation practices and mindfulness techniques.', '2023-04-06', '08:00:00', '16:00:00', 'No. 11, Gower Street, Colombo 5', 2300, '2023-05-09 03:21:05', NULL, NULL, 1020, 50, 4, 1),
(8, 'Finding Inner Peace', 'Explore various meditation techniques and discover how they can be used to cultivate inner peace and improve mental health and wellbeing', '2023-03-02', '08:00:00', '18:00:00', 'No. 200, Havelock Road, Colombo 5', 2100, '2023-01-04 08:54:16', NULL, NULL, 1020, 50, 0, 1),
(9, 'Breathing Meditation', 'Discover the power of the breath and how focused breathing techniques can help to calm the mind, reduce anxiety, and improve focus and concentration', '2023-05-23', '09:00:00', '18:00:00', 'No. 57, Sir Baron Jayathilake Mawatha, Colombo 1', 2200, '2023-05-08 08:54:16', NULL, NULL, 1020, 30, 5, 1),
(10, 'Chakra Meditation', 'Learn about the seven chakras and explore meditation techniques that can be used to balance and align these energy centers.', '2023-04-04', '08:00:00', '16:00:00', 'Cathedral Vicarage Aluthmawatha Road, 15', 2000, '2023-03-01 08:54:16', NULL, NULL, 1020, 50, 0, 1),
(11, 'Meditation for Sleep', 'Discover how meditation can be used to promote better sleep, reduce insomnia, and improve overall sleep quality', '2023-06-03', '09:15:00', '18:15:00', '168 Main Street, 11,Colombo', 2000, '2023-05-08 08:54:16', NULL, NULL, 1020, 50, 1, 1),
(12, 'Body Scan Meditation', 'Develop body awareness and learn how to relax and release tension in the body through guided body scan meditations', '2023-06-01', '10:00:00', '18:30:00', 'No. 42, Galle Road, Bambalapitiya, Colombo 4', 2000, '2023-05-08 08:54:16', NULL, NULL, 1020, 50, 1, 1),
(13, 'Meditation and Emotional Healing', 'Learn how meditation can help you process difficult emotions and promote emotional healing and resilience.', '2023-05-31', '08:00:00', '16:00:00', 'No. 27, Park Street, Colombo 2, Sri Lanka', 2300, '2023-05-08 08:54:16', NULL, NULL, 1020, 45, 0, 1),
(15, 'Transforming Negative Thoughts through Meditation', 'Discover how to use meditation to identify and transform negative thought patterns, leading to greater self-awareness and inner peace.', '2023-06-24', '07:30:00', '17:30:00', 'No. 60, Rosmead Place, Colombo 7, Sri Lanka', 2200, '2023-05-08 08:54:16', NULL, NULL, 1020, 45, 0, 1),
(16, 'Meditation for Creativity', 'Explore how meditation can stimulate the creative process and enhance your ability to think outside the box', '2023-06-07', '08:00:00', '19:00:00', 'No. 27, Park Street, Colombo 2', 2400, '2023-05-08 08:54:16', NULL, NULL, 1020, 60, 0, 1),
(17, 'Mindful Meditation for Stress Reduction', 'Join us for a guided meditation session focused on reducing stress and promoting overall well-being. In this session, you will learn various techniques to cultivate mindfulness, including deep breathing, body scanning, and visualization. Whether you are new to meditation or an experienced practitioner, this session will provide you with valuable tools to manage stress and improve your mental and emotional health', '2023-06-29', '07:00:00', '18:00:00', 'Cathedral Vicarage Aluthmawatha Road, 15', 2000, '2023-05-08 08:54:16', NULL, NULL, 1020, 20, 0, 1),
(18, 'Overcoming Anxiety and Depression', 'In this session, we explore strategies to manage anxiety and depression and develop healthy coping mechanisms', '2023-05-24', '08:00:00', '16:00:00', 'No. 16, Skelton Road, Colombo 05', 2200, '2023-05-08 15:57:41', 12, NULL, NULL, 40, 3, 1),
(20, 'Navigating Life Transitions', 'Change can be challenging, but with the right support, its possible to navigate life transitions successfully. Join us to discuss practical tools to help you transition with ease.', '2023-06-01', '08:00:00', '16:00:00', 'No. 42, Horton Place, Colombo 07', 2300, '2023-05-08 08:55:48', 12, NULL, NULL, 30, 0, 1),
(21, 'Coping with Grief and Loss', 'Losing a loved one can be a difficult and emotional experience. This session provides support and practical strategies to cope with grief and loss.', '2023-05-26', '08:00:00', '17:00:00', 'No. 19, Alexandra Road, Colombo 06', 1800, '2023-05-08 08:55:48', 12, NULL, NULL, 35, 0, 1),
(22, 'Dealing with Work Related Stress', 'Work can be stressful, but with the right tools, you can manage and reduce your stress levels. Join us to learn practical strategies for dealing with work-related stress.', '2023-05-06', '09:00:00', '17:00:00', 'No. 16, Skelton Road, Colombo 05', 1700, '2023-04-02 08:55:48', 12, NULL, NULL, 30, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session_register`
--

CREATE TABLE `session_register` (
  `session_registration_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `paid_amount` float NOT NULL,
  `registered_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `session_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_register`
--

INSERT INTO `session_register` (`session_registration_id`, `name`, `contact_number`, `age`, `gender`, `paid_amount`, `registered_date_and_time`, `session_id`, `patient_id`) VALUES
(5, 'Ruwan', '0773543612', 23, 'Mr', 2200, '2023-05-07 01:54:50', 12, 55),
(6, 'Ruwan', '0773543612', 23, 'Mr', 2420, '2023-05-07 01:54:50', 9, 55),
(7, 'Sujitha', '0767482143', 32, 'Mr', 2420, '2023-05-07 01:54:50', 9, 56),
(8, 'Sayuni', '0767482143', 16, 'Ms', 2420, '2023-05-07 01:54:50', 9, 56),
(9, 'Sanduni', '0771234567', 30, 'Ms', 2420, '2023-05-07 01:54:50', 9, 62),
(10, 'jayashantha', '0745896452', 65, 'Mr', 2420, '2023-05-07 01:54:50', 9, 62),
(11, 'Ruwan', '0773543612', 23, 'Mr', 2530, '2023-05-07 01:54:50', 7, 55),
(16, 'Tharaka Wijesekara', '0771111111', 28, 'Mr', 2530, '2023-05-07 01:54:50', 7, 61),
(17, 'Nisansala Abeysekara', '0761234129', 27, 'Ms', 2530, '2023-05-07 01:54:50', 7, 58),
(18, 'Isuru Madushan', '0761111111', 30, 'Mr', 2530, '2023-05-07 01:54:50', 7, 69),
(19, 'Kavindi', '0761345829', 27, 'Ms', 2420, '2023-05-07 01:54:50', 18, 60),
(20, 'Pathum', '0725843695', 24, 'Mr', 2420, '2023-05-07 01:54:50', 18, 60),
(21, 'Kavindi', '0761345829', 29, 'Ms', 2200, '2023-05-07 01:54:50', 11, 60),
(22, 'Kamaj', '0748965412', 26, 'Mr', 2420, '2023-05-08 15:57:41', 18, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_order`
--
ALTER TABLE `accept_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pharmacist_id` (`pharmacist_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `accept_order_ibfk_3` (`order_request_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `counsellor_id` (`counsellor_id`),
  ADD KEY `nutritionist_id` (`nutritionist_id`),
  ADD KEY `pharmacist_id` (`pharmacist_id`),
  ADD KEY `meditation_instructor_id` (`meditation_instructor_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`counsellor_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`),
  ADD KEY `verified_admin_id` (`verified_admin_id`);

--
-- Indexes for table `counsellor_channel`
--
ALTER TABLE `counsellor_channel`
  ADD PRIMARY KEY (`counsellor_channel_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `counsellor_channel_ibfk_1` (`counsellor_channel_day_id`),
  ADD KEY `counsellor_id` (`counsellor_id`);

--
-- Indexes for table `counsellor_channel_day`
--
ALTER TABLE `counsellor_channel_day`
  ADD PRIMARY KEY (`counsellor_channel_day_id`),
  ADD KEY `counsellor_timeslot_id` (`counsellor_timeslot_id`),
  ADD KEY `counsellor_id` (`counsellor_id`);

--
-- Indexes for table `counsellor_timeslot`
--
ALTER TABLE `counsellor_timeslot`
  ADD PRIMARY KEY (`counsellor_timeslot_id`),
  ADD KEY `counsellor_id` (`counsellor_id`);

--
-- Indexes for table `diet_plan`
--
ALTER TABLE `diet_plan`
  ADD PRIMARY KEY (`diet_plan_id`),
  ADD KEY `nutritionist_id` (`nutritionist_id`),
  ADD KEY `diet_plan_ibfk_2` (`request_diet_plan_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `verified_admin_id` (`verified_admin_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`);

--
-- Indexes for table `doctor_channel`
--
ALTER TABLE `doctor_channel`
  ADD PRIMARY KEY (`doctor_channel_id`),
  ADD KEY `doctor_channel_ibfk_2` (`patient_id`),
  ADD KEY `doctor_channel_ibfk_1` (`doctor_id`),
  ADD KEY `doctor_channel_ibfk_3` (`doctor_channel_day_id`);

--
-- Indexes for table `doctor_channel_day`
--
ALTER TABLE `doctor_channel_day`
  ADD PRIMARY KEY (`doctor_channel_day_id`),
  ADD KEY `doctor_timeslot_id` (`doctor_timeslot_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor_timeslot`
--
ALTER TABLE `doctor_timeslot`
  ADD PRIMARY KEY (`doctor_timeslot_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `meditation_instructor`
--
ALTER TABLE `meditation_instructor`
  ADD PRIMARY KEY (`meditation_instructor_id`),
  ADD KEY `verified_admin_id` (`verified_admin_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`);

--
-- Indexes for table `med_ins_appointment_day`
--
ALTER TABLE `med_ins_appointment_day`
  ADD PRIMARY KEY (`med_ins_appointment_day_id`),
  ADD KEY `doctor_timeslot_id` (`med_timeslot_id`),
  ADD KEY `doctor_id` (`meditation_instructor_id`);

--
-- Indexes for table `med_ins_register`
--
ALTER TABLE `med_ins_register`
  ADD PRIMARY KEY (`med_ins_registration_id`),
  ADD KEY `meditation_instructor_id` (`meditation_instructor_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `med_ins_appointment_day_id` (`med_ins_appointment_day_id`);

--
-- Indexes for table `med_timeslot`
--
ALTER TABLE `med_timeslot`
  ADD PRIMARY KEY (`med_timeslot_id`),
  ADD KEY `meditation_instructor_id` (`meditation_instructor_id`);

--
-- Indexes for table `nutritionist`
--
ALTER TABLE `nutritionist`
  ADD PRIMARY KEY (`nutritionist_id`),
  ADD KEY `verified_admin_id` (`verified_admin_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`);

--
-- Indexes for table `order_request`
--
ALTER TABLE `order_request`
  ADD PRIMARY KEY (`order_request_id`),
  ADD KEY `pharmacist_id` (`pharmacist_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`),
  ADD KEY `verified_admin_id` (`verified_admin_id`),
  ADD KEY `deactivated_admin_id` (`deactivated_admin_id`);

--
-- Indexes for table `requested_counsellor`
--
ALTER TABLE `requested_counsellor`
  ADD PRIMARY KEY (`requested_counsellor_id`);

--
-- Indexes for table `requested_doctor`
--
ALTER TABLE `requested_doctor`
  ADD PRIMARY KEY (`requested_doctor_id`);

--
-- Indexes for table `requested_meditation_instructor`
--
ALTER TABLE `requested_meditation_instructor`
  ADD PRIMARY KEY (`requested_meditation_instructor_id`);

--
-- Indexes for table `requested_nutritionist`
--
ALTER TABLE `requested_nutritionist`
  ADD PRIMARY KEY (`requested_nutritionist_id`);

--
-- Indexes for table `requested_pharmacist`
--
ALTER TABLE `requested_pharmacist`
  ADD PRIMARY KEY (`requested_pharmacist_id`);

--
-- Indexes for table `request_diet_plan`
--
ALTER TABLE `request_diet_plan`
  ADD PRIMARY KEY (`request_diet_plan_id`),
  ADD KEY `nutritionist_id` (`nutritionist_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `counsellor_id` (`counsellor_id`),
  ADD KEY `nutritionist_id` (`nutritionist_id`),
  ADD KEY `meditation_instructor_id` (`meditation_instructor_id`);

--
-- Indexes for table `session_register`
--
ALTER TABLE `session_register`
  ADD PRIMARY KEY (`session_registration_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_order`
--
ALTER TABLE `accept_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `counsellor`
--
ALTER TABLE `counsellor`
  MODIFY `counsellor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `counsellor_channel`
--
ALTER TABLE `counsellor_channel`
  MODIFY `counsellor_channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `counsellor_channel_day`
--
ALTER TABLE `counsellor_channel_day`
  MODIFY `counsellor_channel_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `counsellor_timeslot`
--
ALTER TABLE `counsellor_timeslot`
  MODIFY `counsellor_timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diet_plan`
--
ALTER TABLE `diet_plan`
  MODIFY `diet_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `doctor_channel`
--
ALTER TABLE `doctor_channel`
  MODIFY `doctor_channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `doctor_channel_day`
--
ALTER TABLE `doctor_channel_day`
  MODIFY `doctor_channel_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `doctor_timeslot`
--
ALTER TABLE `doctor_timeslot`
  MODIFY `doctor_timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `meditation_instructor`
--
ALTER TABLE `meditation_instructor`
  MODIFY `meditation_instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT for table `med_ins_appointment_day`
--
ALTER TABLE `med_ins_appointment_day`
  MODIFY `med_ins_appointment_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `med_ins_register`
--
ALTER TABLE `med_ins_register`
  MODIFY `med_ins_registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `med_timeslot`
--
ALTER TABLE `med_timeslot`
  MODIFY `med_timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `nutritionist`
--
ALTER TABLE `nutritionist`
  MODIFY `nutritionist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_request`
--
ALTER TABLE `order_request`
  MODIFY `order_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `requested_counsellor`
--
ALTER TABLE `requested_counsellor`
  MODIFY `requested_counsellor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `requested_doctor`
--
ALTER TABLE `requested_doctor`
  MODIFY `requested_doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `requested_meditation_instructor`
--
ALTER TABLE `requested_meditation_instructor`
  MODIFY `requested_meditation_instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `requested_nutritionist`
--
ALTER TABLE `requested_nutritionist`
  MODIFY `requested_nutritionist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `requested_pharmacist`
--
ALTER TABLE `requested_pharmacist`
  MODIFY `requested_pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `request_diet_plan`
--
ALTER TABLE `request_diet_plan`
  MODIFY `request_diet_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `session_register`
--
ALTER TABLE `session_register`
  MODIFY `session_registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accept_order`
--
ALTER TABLE `accept_order`
  ADD CONSTRAINT `accept_order_ibfk_1` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `accept_order_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `accept_order_ibfk_3` FOREIGN KEY (`order_request_id`) REFERENCES `order_request` (`order_request_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_4` FOREIGN KEY (`nutritionist_id`) REFERENCES `nutritionist` (`nutritionist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_5` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_6` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_7` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD CONSTRAINT `counsellor_ibfk_1` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `counsellor_ibfk_2` FOREIGN KEY (`verified_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `counsellor_channel`
--
ALTER TABLE `counsellor_channel`
  ADD CONSTRAINT `counsellor_channel_ibfk_1` FOREIGN KEY (`counsellor_channel_day_id`) REFERENCES `counsellor_channel_day` (`counsellor_channel_day_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `counsellor_channel_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `counsellor_channel_ibfk_3` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `counsellor_channel_day`
--
ALTER TABLE `counsellor_channel_day`
  ADD CONSTRAINT `counsellor_channel_day_ibfk_1` FOREIGN KEY (`counsellor_timeslot_id`) REFERENCES `counsellor_timeslot` (`counsellor_timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `counsellor_channel_day_ibfk_2` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `counsellor_timeslot`
--
ALTER TABLE `counsellor_timeslot`
  ADD CONSTRAINT `counsellor_timeslot_ibfk_1` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diet_plan`
--
ALTER TABLE `diet_plan`
  ADD CONSTRAINT `diet_plan_ibfk_1` FOREIGN KEY (`nutritionist_id`) REFERENCES `nutritionist` (`nutritionist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `diet_plan_ibfk_2` FOREIGN KEY (`request_diet_plan_id`) REFERENCES `request_diet_plan` (`request_diet_plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `diet_plan_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`verified_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_channel`
--
ALTER TABLE `doctor_channel`
  ADD CONSTRAINT `doctor_channel_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctor_channel_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctor_channel_ibfk_3` FOREIGN KEY (`doctor_channel_day_id`) REFERENCES `doctor_channel_day` (`doctor_channel_day_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_channel_day`
--
ALTER TABLE `doctor_channel_day`
  ADD CONSTRAINT `doctor_channel_day_ibfk_1` FOREIGN KEY (`doctor_timeslot_id`) REFERENCES `doctor_timeslot` (`doctor_timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctor_channel_day_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_timeslot`
--
ALTER TABLE `doctor_timeslot`
  ADD CONSTRAINT `doctor_timeslot_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `meditation_instructor`
--
ALTER TABLE `meditation_instructor`
  ADD CONSTRAINT `meditation_instructor_ibfk_1` FOREIGN KEY (`verified_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `meditation_instructor_ibfk_2` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `med_ins_appointment_day`
--
ALTER TABLE `med_ins_appointment_day`
  ADD CONSTRAINT `med_ins_appointment_day_ibfk_1` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `med_ins_appointment_day_ibfk_2` FOREIGN KEY (`med_timeslot_id`) REFERENCES `med_timeslot` (`med_timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `med_ins_register`
--
ALTER TABLE `med_ins_register`
  ADD CONSTRAINT `med_ins_register_ibfk_1` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `med_ins_register_ibfk_2` FOREIGN KEY (`med_ins_appointment_day_id`) REFERENCES `med_ins_appointment_day` (`med_ins_appointment_day_id`),
  ADD CONSTRAINT `med_ins_register_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `med_timeslot`
--
ALTER TABLE `med_timeslot`
  ADD CONSTRAINT `med_timeslot_ibfk_1` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`);

--
-- Constraints for table `nutritionist`
--
ALTER TABLE `nutritionist`
  ADD CONSTRAINT `nutritionist_ibfk_1` FOREIGN KEY (`verified_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nutritionist_ibfk_2` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_request`
--
ALTER TABLE `order_request`
  ADD CONSTRAINT `order_request_ibfk_1` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_request_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD CONSTRAINT `pharmacist_ibfk_1` FOREIGN KEY (`verified_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pharmacist_ibfk_2` FOREIGN KEY (`deactivated_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `request_diet_plan`
--
ALTER TABLE `request_diet_plan`
  ADD CONSTRAINT `request_diet_plan_ibfk_1` FOREIGN KEY (`nutritionist_id`) REFERENCES `nutritionist` (`nutritionist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `request_diet_plan_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`nutritionist_id`) REFERENCES `nutritionist` (`nutritionist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `session_ibfk_3` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `session_register`
--
ALTER TABLE `session_register`
  ADD CONSTRAINT `session_register_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `session_register_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
