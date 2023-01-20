-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 06:35 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be_care`
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
  `bill` varchar(255) NOT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
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
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `counsellor_id` int(11) DEFAULT NULL,
  `nutritionist_id` int(11) DEFAULT NULL,
  `pharmacist_id` int(11) DEFAULT NULL,
  `meditation_instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `subject`, `description`, `patient_id`, `doctor_id`, `counsellor_id`, `nutritionist_id`, `pharmacist_id`, `meditation_instructor_id`) VALUES
(1, 'Food', 'I am hungry because I ate too much food.', 14, NULL, NULL, NULL, NULL, NULL),
(2, 'Hungry', 'I am Hungry because I an sleepy aaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbcccccccccccccccccccccccddddddddddddddddddddeeeeeeeeeeeee', 14, NULL, NULL, NULL, NULL, NULL),
(3, 'doctor', 'asasasasssasa', 14, NULL, NULL, NULL, NULL, NULL),
(4, 'wqwq', 'wqwqwqw', 14, NULL, NULL, NULL, NULL, NULL),
(5, 'subject', 'description', 14, NULL, NULL, NULL, NULL, NULL),
(6, 'subject', 'description', 14, NULL, NULL, NULL, NULL, NULL),
(7, 'subject1', 'description1', 14, NULL, NULL, NULL, NULL, NULL),
(8, 'subject', 'description', 14, NULL, NULL, NULL, NULL, NULL),
(9, 'subject', 'description', 14, NULL, NULL, NULL, NULL, NULL),
(10, 'sus', 'ded', 14, NULL, NULL, NULL, NULL, NULL),
(11, 'suss', 'dedd', 16, NULL, NULL, NULL, NULL, NULL),
(12, 'ad', 'adddddddddddd', 14, NULL, NULL, NULL, NULL, NULL),
(13, 'sd', 'sd', 14, NULL, NULL, NULL, NULL, NULL),
(14, 'aaaaaaaaaaaaa', 'sus', 14, NULL, NULL, NULL, NULL, NULL);

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qialification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`counsellor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `city`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qialification_file`) VALUES
(1, 'Saul', 'Goodman', '123456789v', '0710234567', 'male', 'sg@gmail.com', 'q12345', '0000-00-00', '343', 'Malabe', 'qwq', 'Saul', 'Malabe', '1212121212', 'eerf');

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
  `counsellor_timeslot_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_timeslot`
--

CREATE TABLE `counsellor_timeslot` (
  `counsellor_timeslot_id` int(11) NOT NULL,
  `channeling_day` varchar(255) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `fee` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `counsellor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `type`, `city`, `specialization`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`) VALUES
(1, 'Sandun', 'Ranasinghe', '12121212v', '+94 71 056 0492', 'male', 'sr@gmail.com', '1212121', '0000-00-00', '1212', 'MBBS', 'Malabe', 'Cardiologist', 'asa', 'asas', 'asa', 'asas', 'asasa'),
(2, 'Vishwa', 'Kodikara', '1212121', '121212', 'male', 'vk@gmail.com', 'sdasd', '0000-00-00', '34324', 'MBBS', 'Malabe', 'Gynecologist', 'wsdd', 'asas', 'asas', 'asas', 'asasa'),
(3, 'Nimali', 'Perera', '2121212', '12121', 'female', 'np@gmail.com', 'qwqw', '0000-00-00', 'qwqw', 'MBBS', 'Kaduwela', 'Cardiologist', 'ewqwq', 'qwqw', 'qwqw', 'qwqw', 'qwqw'),
(4, 'Ravindu', 'Sekara', '12121', '1212', 'male', 'rs@gmail.com', 'qsqs', '0000-00-00', 'qwq', 'BMAS', 'Malabe', 'Cardiologist', 'asas', 'asas', 'asas', 'asas', 'asas'),
(5, 'Ashanthi', 'Perera', '1212', '121', 'female', 'ap@gmail.com', '2121', '0000-00-00', '1212', 'BMAS', 'Kaduwela', 'Gynecologist', '1212', '1212', '212', '121', '121');

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
  `doctor_timeslot_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_channel`
--

INSERT INTO `doctor_channel` (`doctor_channel_id`, `name`, `age`, `contact_number`, `gender`, `date`, `time`, `doctor_timeslot_id`, `patient_id`) VALUES
(1, 'Janod', 21, '0710560492', 'male', '2023-01-10', '09:30:00', 1, 14),
(2, 'Janod', 21, '0710560492', 'male', '2023-01-17', '19:40:00', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_channel_day`
--

CREATE TABLE `doctor_channel_day` (
  `doctor_channel_day_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `doctor_timeslot_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_channel_day`
--

INSERT INTO `doctor_channel_day` (`doctor_channel_day_id`, `day`, `active`, `doctor_timeslot_id`, `doctor_id`) VALUES
(5, '2023-01-16', 1, 1, 1),
(6, '2023-01-23', 1, 1, 1),
(7, '2023-01-30', 1, 1, 1),
(8, '2023-02-06', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timeslot`
--

CREATE TABLE `doctor_timeslot` (
  `doctor_timeslot_id` int(11) NOT NULL,
  `channeling_day` varchar(255) NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `fee` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_timeslot`
--

INSERT INTO `doctor_timeslot` (`doctor_timeslot_id`, `channeling_day`, `starting_time`, `ending_time`, `fee`, `address`, `doctor_id`) VALUES
(1, 'Monday', '09:30:00', '11:30:00', '2000.00', '246/13 Kaduwela rd, Malabe', 1);

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
  `registered_date` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `meditation_instructor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutritionist`
--

INSERT INTO `nutritionist` (`nutritionist_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `fee`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`) VALUES
(1, 'Nutritionist', 'One', '12121212', '0711123456', 'female', 'n1@gmail.com', 'sdfsd', '0000-00-00', '1234', 2000, 'qw', 'qw', 'qwq', '2323', 'qwqwq'),
(2, 'Nutritionist', 'Two', '12', '12', 'male', 'ghgh@ghgh.com', 'qwqww', '0000-00-00', '12', 1000, 'vb', 'vv', 'vbv', 'vb', 'vb');

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
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_request`
--

INSERT INTO `order_request` (`order_request_id`, `name`, `contact_number`, `delivery_address`, `prescription`, `ordered_date_and_time`, `pharmacist_id`, `patient_id`) VALUES
(1, 'Janod', '0710560492', '234', 'Array', '2023-01-07 17:10:32', 1, 14),
(2, 'Janod', '0710560492', '12', 'Array', '2023-01-07 17:11:09', 2, 14),
(3, 'Janod', '0710560492', '246/13 Kaduwela rd, Malabe', '1673115451_7dd0b68fe2bca80ecdc62f4a7262353df6ed2c2c.jpg', '2023-01-07 18:17:31', 1, 14),
(4, 'Janod', '0710560492', '12121', '1673169659_315400779_3271031303165901_2926176354477945731_n.jpg', '2023-01-08 09:20:59', 1, 14),
(5, 'Jan', '0711234567', '1212121212', '1673170182_315400779_3271031303165901_2926176354477945731_n.jpg', '2023-01-08 09:29:42', 2, 16),
(6, 'Janod', '0710560492', 'alb', '1673211642_7dd0b68fe2bca80ecdc62f4a7262353df6ed2c2c.jpg', '2023-01-08 21:00:42', 2, 14),
(7, 'Janod', '0710560492', 'i', '1673250465_7dd0b68fe2bca80ecdc62f4a7262353df6ed2c2c.jpg', '2023-01-09 07:47:45', 1, 14),
(8, 'Janod', '0710560492', 'da', '1673345526_7dd0b68fe2bca80ecdc62f4a7262353df6ed2c2c.jpg', '2023-01-10 10:12:06', 1, 14),
(9, 'Janod', '0710560492', 'as', '1673345845_7dd0b68fe2bca80ecdc62f4a7262353df6ed2c2c.jpg', '2023-01-10 10:17:25', 1, 14),
(10, 'Janod Umayanga', '0710560492', '246/13 Kaduwela Road, Malabe', '1673364209_7dd0b68fe2bca80ecdc62f4a7262353df6ed2c2c.jpg', '2023-01-10 15:23:29', 1, 14);

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
  `registered_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`) VALUES
(4, 'sasasa', 'ffgffgfg', '12121121211v', '121212112', 'male', 'j@sd.com', '$2y$10$Xrneo.xEH/hkG5gdUYraCudCB66VlIhTBUpKDWiOMvJnxkrZlHL8y', '2022-11-08 15:39:24'),
(5, 'Janod', 'Umayanga', '123455689v', '0710560492', 'male', 'fgfgf@dsd.com', '$2y$10$/PKuvr44MxlxOAiMUjjz8.97a1SoiL814.qoofXi..XQkb4zK5Ary', '2022-11-08 20:57:03'),
(7, 'Janod', 'Umayanga', '123455689v', '0710560492', 'male', 're@sub.com', '$2y$10$S2T5gcVVPxB4X5nP97zsm.GqMpseMixdQhTVYKwP8jIRwLH8zJN6.', '2022-11-08 21:21:14'),
(8, 'Janod', 'Umayanga', '123455689v', '0710560492', 'male', 'no@tail.com', '$2y$10$FddePXtmXAvz1sq5exAUmO18CRWc1yeErK1WaVIiVmf8Mq65YrTUW', '2022-11-08 21:33:36'),
(10, 'Udara', 'Sankalpa', '990456789v', '0710560492', 'male', 'udaras@gmail.com', '$2y$10$3b5kwxmMC8FmDKniOw4yPO/fBoT0i6jWYNo.L32QBJBAucTd9r4Nu', '2022-11-09 00:23:43'),
(11, 'Shadows', 'Fiend', '990456789v', '0710560492', 'male', 'sf@ul.com', '$2y$10$T9Ery9MLL0SIe3uYEJrJQOhvMnAGhtf/stxHmG8LQVWVRFdpfMr.a', '2022-11-09 22:32:27'),
(14, 'Janod', 'Umayanga', '990450889v', '0710560492', 'male', 'janodumayanga@gmail.com', '$2y$10$6/SJ4nx7qdAdvVBlJWquguHsnE4eBdXPjY0TpZsnax/9wDZN7HHBu', '2022-11-10 11:58:33'),
(15, 'sa', 'ssa', 'sas', 'asas', 'assa', 'ssa@ds', '$2y$10$yvoPeXDUV2ju8QyuGBBD4e0iQ5.Y/BTFy7gQJaErSDunKctRYhEAq', '2022-12-02 21:12:35'),
(16, 'Jan', 'Umayang', '343v', '0711234567', 'female', 'as@gmail.com', '$2y$10$zklx.DNe9IRxTqn98aSiXuPJldkMcFOjsCZsZ4jZNPF47/gJXK09u', '2023-01-05 15:23:03'),
(17, 'qw', 'qw', '1212', '343434', 'male', 'gogc@rt.com', '$2y$10$OFI3fDItxFEVLZdlUkMpqeQF1vL18HGeIcFyaoCH78PMWPUELgzl2', '2023-01-05 18:35:21'),
(18, 'Freddie', 'Mercury', '420', '69420', 'male', 'fredmerc@gmail.com', '$2y$10$LuF6kQ2jzybIKjLAFto71eW0jJS04xstTFkUma0uMR.IkdS9i2mPG', '2023-01-15 18:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `nic`, `contact_number`, `gender`, `email`, `password`, `registered_date`, `slmc_reg_number`, `pharmacy_name`, `city`, `address`, `bank_name`, `account_holder_name`, `branch`, `account_number`, `qualification_file`) VALUES
(1, 'asas', 'asas', 'asas', 'asasa', 'asas', 'j@fg.cv', 'wewew', '0000-00-00 00:00:00', 'wewe', 'Araliya Pharmacy', 'Malabe', '234/2 Kaduwela rd, Malabe', 'qwqw', 'qwqw', 'qwqw', 'qwqwq', 'qwqw'),
(2, 'gh', 'j', '12', '333', 'femle', 'qwe@f.com', 'ssss', '0000-00-00 00:00:00', '1212', 'Jcare', 'Malabe', '12/12 as rd, kj', '1212', 'sd', 'asasa', '1212', '12121'),
(3, 'qw', 'q', '121', '12', 'female', 'fgh@df.com', 'ew', '2023-01-16 08:46:40', '1212', 'Pharmacy One', 'Matara', '12/32 Matara rd, Matara', '231', '123', '123', '13', '132'),
(4, 'das', 'asd', '123', '12', 'male', 'df@sd.n', 'sad', '2023-01-16 08:47:51', '123', 'Pharmacy Two', 'Matara', '12 sd, kl', 'ds', 'sad', 'asdsa', 'asd', 'asd');

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualication_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `registered_date` date NOT NULL,
  `slmc_reg_number` varchar(255) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `qualification_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `requested_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nutritionist_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_diet_plan`
--

INSERT INTO `request_diet_plan` (`request_diet_plan_id`, `name`, `age`, `gender`, `contact_number`, `weight`, `height`, `marital_status`, `medical_details`, `allergies`, `sleeping_hours`, `water_consumption_per_day`, `goal`, `requested_date_and_time`, `nutritionist_id`, `patient_id`) VALUES
(1, 'Janod', 21, 'male', '0710560492', 69, 189, 'married', 'fine', 'none', 8, 1500, 'to be good', '2023-01-08 20:59:50', 1, 14),
(2, 'Janod', 21, 'male', '0710560492', 69, 189, 'unmarried', 'rt', 'rt', 9, 2000, 'rt', '2023-01-09 07:47:00', 1, 14),
(3, 'Janod', 12, 'male', '0710560492', 12, 12, '12', '12', '12', 12, 12, '12', '2023-01-09 09:56:44', 1, 14),
(4, 'Janod', 12, 'male', '0710560492', 12, 12, '12', '12', '12', 12, 12, '12', '2023-01-14 09:19:55', 1, 14),
(5, 'sample', 0, 'sample', 'sample', 12, 12, 'sample', 'sample', 'sample', 12, 12, 'sample', '2023-01-15 10:28:11', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sesion_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `address` varchar(255) NOT NULL,
  `fee` double NOT NULL,
  `created_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `counsellor_id` int(11) DEFAULT NULL,
  `nutritionist_id` int(11) DEFAULT NULL,
  `meditation_instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sesion_id`, `title`, `description`, `date`, `starting_time`, `ending_time`, `address`, `fee`, `created_date_and_time`, `counsellor_id`, `nutritionist_id`, `meditation_instructor_id`) VALUES
(1, 'Better food better life', 'we are here to advice you about food. we are here to advice you about food. we are here to advice you about food. we are here to advice you about food. we are here to advice you about food.', '2023-01-18', '09:30:00', '11:30:00', 'Malabe', 500, '2023-01-10 22:43:59', NULL, 1, NULL),
(2, 'Managing Stress', 'We are here to support you with managing your stress with daily life. We are here to support you with managing your stress with daily life.', '2023-01-16', '09:30:00', '11:30:00', 'Malabe', 100, '2023-01-10 22:46:05', 1, NULL, NULL);

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
  `registered_date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `session_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_order`
--
ALTER TABLE `accept_order`
  ADD KEY `pharmacist_id` (`pharmacist_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD KEY `meditation_instructor_id` (`meditation_instructor_id`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`counsellor_id`);

--
-- Indexes for table `counsellor_channel`
--
ALTER TABLE `counsellor_channel`
  ADD PRIMARY KEY (`counsellor_channel_id`),
  ADD KEY `counsellor_timeslot_id` (`counsellor_timeslot_id`),
  ADD KEY `patient_id` (`patient_id`);

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
  ADD KEY `diet_plan_ibfk_2` (`request_diet_plan_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_channel`
--
ALTER TABLE `doctor_channel`
  ADD PRIMARY KEY (`doctor_channel_id`),
  ADD KEY `doctor_channel_ibfk_1` (`doctor_timeslot_id`),
  ADD KEY `doctor_channel_ibfk_2` (`patient_id`);

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
-- Indexes for table `meditation_instructor`
--
ALTER TABLE `meditation_instructor`
  ADD PRIMARY KEY (`meditation_instructor_id`);

--
-- Indexes for table `med_ins_register`
--
ALTER TABLE `med_ins_register`
  ADD PRIMARY KEY (`med_ins_registration_id`),
  ADD KEY `meditation_instructor_id` (`meditation_instructor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `nutritionist`
--
ALTER TABLE `nutritionist`
  ADD PRIMARY KEY (`nutritionist_id`);

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
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `requested_counsellor`
--
ALTER TABLE `requested_counsellor`
  ADD PRIMARY KEY (`requested_counsellor_id`);

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
  ADD PRIMARY KEY (`sesion_id`),
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `counsellor`
--
ALTER TABLE `counsellor`
  MODIFY `counsellor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counsellor_channel`
--
ALTER TABLE `counsellor_channel`
  MODIFY `counsellor_channel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counsellor_timeslot`
--
ALTER TABLE `counsellor_timeslot`
  MODIFY `counsellor_timeslot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diet_plan`
--
ALTER TABLE `diet_plan`
  MODIFY `diet_plan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_channel`
--
ALTER TABLE `doctor_channel`
  MODIFY `doctor_channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_channel_day`
--
ALTER TABLE `doctor_channel_day`
  MODIFY `doctor_channel_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_timeslot`
--
ALTER TABLE `doctor_timeslot`
  MODIFY `doctor_timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meditation_instructor`
--
ALTER TABLE `meditation_instructor`
  MODIFY `meditation_instructor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `med_ins_register`
--
ALTER TABLE `med_ins_register`
  MODIFY `med_ins_registration_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nutritionist`
--
ALTER TABLE `nutritionist`
  MODIFY `nutritionist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_request`
--
ALTER TABLE `order_request`
  MODIFY `order_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requested_counsellor`
--
ALTER TABLE `requested_counsellor`
  MODIFY `requested_counsellor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_meditation_instructor`
--
ALTER TABLE `requested_meditation_instructor`
  MODIFY `requested_meditation_instructor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_nutritionist`
--
ALTER TABLE `requested_nutritionist`
  MODIFY `requested_nutritionist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_pharmacist`
--
ALTER TABLE `requested_pharmacist`
  MODIFY `requested_pharmacist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_diet_plan`
--
ALTER TABLE `request_diet_plan`
  MODIFY `request_diet_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sesion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_register`
--
ALTER TABLE `session_register`
  MODIFY `session_registration_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accept_order`
--
ALTER TABLE `accept_order`
  ADD CONSTRAINT `accept_order_ibfk_1` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `accept_order_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_4` FOREIGN KEY (`nutritionist_id`) REFERENCES `nutritionist` (`nutritionist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_5` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `complaint_ibfk_6` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `counsellor_channel`
--
ALTER TABLE `counsellor_channel`
  ADD CONSTRAINT `counsellor_channel_ibfk_1` FOREIGN KEY (`counsellor_timeslot_id`) REFERENCES `counsellor_timeslot` (`counsellor_timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `counsellor_channel_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `diet_plan_ibfk_2` FOREIGN KEY (`request_diet_plan_id`) REFERENCES `request_diet_plan` (`request_diet_plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_channel`
--
ALTER TABLE `doctor_channel`
  ADD CONSTRAINT `doctor_channel_ibfk_1` FOREIGN KEY (`doctor_timeslot_id`) REFERENCES `doctor_timeslot` (`doctor_timeslot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doctor_channel_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `med_ins_register`
--
ALTER TABLE `med_ins_register`
  ADD CONSTRAINT `med_ins_register_ibfk_1` FOREIGN KEY (`meditation_instructor_id`) REFERENCES `meditation_instructor` (`meditation_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `med_ins_register_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_request`
--
ALTER TABLE `order_request`
  ADD CONSTRAINT `order_request_ibfk_1` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_request_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `session_register_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `session` (`sesion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `session_register_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
