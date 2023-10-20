-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 10:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carrenting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `agent_address` varchar(200) NOT NULL,
  `agent_contact` varchar(50) NOT NULL,
  `agent_email` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `agent_photo` varchar(100) NOT NULL,
  `agent_proof` varchar(100) NOT NULL,
  `agent_password` varchar(50) NOT NULL,
  `agent_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`agent_id`, `agent_name`, `agent_address`, `agent_contact`, `agent_email`, `place_id`, `agent_photo`, `agent_proof`, `agent_password`, `agent_status`) VALUES
(1, 'Drive Away', 'Drive Away car rental near Nehru Park', '9933884466', 'driveaway@gmail.com', 2, 'download.png', 'G_S_T_ShiftingWale.jpg', 'driveaway12', 1),
(2, 'Lourens River', 'Lourens River car rental service, Vengalloor,Thodu', '9788453455', 'lourensr@gmail.com', 5, 'LourensRivercarrentallogo2.png', 'G_S_T_ShiftingWale.jpg', 'lr@tdpz', 1),
(3, 'Miles Car Rental', 'Miles Car Rental Perumbavoor', '8965473433', 'miles@gmail.com', 3, 'attachment_113731403.jpeg', 'download (2).jfif', 'miles1234', 1),
(4, 'Auto Car', 'Auto Car Renal Service,Angamaly', '6822225677', 'autocar@gmail.com', 4, 'autocar.jpg', 'download (2).jfif', 'autocar2233', 1),
(5, 'Happy Deal Rental', 'Happy Deal Car Rental Kochi', '9786756453', 'happydeal@gmail.com', 1, '439-4395303_rental-car-logo-png-transparent-png.pn', 'download (2).jfif', 'happydeal', 2),
(6, 'E&A Car Rental', 'E&A Car Rental Kochi', '8844773360', 'eandacar@gmail.com', 1, 'images (6).jpeg', 'download (2).jfif', 'e&a1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `pickup_point` int(11) NOT NULL,
  `drop_point` int(11) NOT NULL,
  `booking_fromdate` varchar(50) NOT NULL,
  `booking_todate` varchar(50) NOT NULL,
  `booking_duration` varchar(50) NOT NULL DEFAULT '0',
  `booking_date` varchar(50) NOT NULL DEFAULT '0',
  `car_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `total_amount` varchar(100) NOT NULL DEFAULT '0',
  `booking_status` varchar(10) NOT NULL DEFAULT '0',
  `payment_status` varchar(10) NOT NULL DEFAULT '0',
  `pickup_time` varchar(50) NOT NULL,
  `paying_amount` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `pickup_point`, `drop_point`, `booking_fromdate`, `booking_todate`, `booking_duration`, `booking_date`, `car_id`, `customer_id`, `total_amount`, `booking_status`, `payment_status`, `pickup_time`, `paying_amount`) VALUES
(1, 2, 2, '2023-09-13', '2023-09-14', '1', '2023-09-12', 2, 1, '3100', '3', '1', '10:00', '3100'),
(2, 2, 2, '2023-09-19', '2023-09-24', '0', '0', 0, 1, '0', '0', '0', '01:30', '0'),
(3, 2, 2, '2023-09-19', '2023-09-22', '0', '0', 0, 1, '0', '0', '0', '10:00', '0'),
(4, 2, 5, '2023-09-21', '2023-09-30', '0', '0', 0, 1, '0', '0', '0', '15:00', '0'),
(5, 2, 2, '2023-09-20', '2023-09-30', '0', '0', 0, 1, '0', '0', '0', '15:53', '0'),
(6, 1, 3, '2023-09-07', '2023-09-08', '0', '0', 0, 1, '0', '0', '0', '16:19', '0'),
(7, 2, 5, '2023-10-13', '2023-10-14', '0', '0', 0, 1, '0', '0', '0', '12:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Nissan'),
(2, 'Toyota'),
(3, 'Mahindra'),
(4, 'Isuzu'),
(5, 'Datsun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `car_id` int(11) NOT NULL,
  `seater_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `car_name` varchar(200) NOT NULL,
  `car_fuel` varchar(50) NOT NULL,
  `base_rate` varchar(100) NOT NULL,
  `car_mode` varchar(50) NOT NULL,
  `car_photo` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `car_status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`car_id`, `seater_id`, `agent_id`, `car_name`, `car_fuel`, `base_rate`, `car_mode`, `car_photo`, `brand_id`, `car_status`) VALUES
(1, 3, 1, 'Toyota Rumion (AT)', 'Petrol', '2000', 'Automatic', '20211011030323_Rumion_main.jpg', 2, '0'),
(2, 3, 1, 'Toyota Innova Crysta (MT)', 'Diesel', '3100', 'Manual', '1641799834390crysta(D)(MT).png', 2, '0'),
(3, 1, 1, 'Datsun Redi Go Petrol (MT)', 'Petrol', '850', 'Manual', '1655981904317Redi-Go.jpg', 5, '0'),
(5, 3, 2, 'Toyota Innova Crysta Diesel (AT)', 'Diesel', '3500', 'Automatic', '1664195584327innova-crysta-exterior-right-front-three-quarter-3.jpeg', 2, '0'),
(6, 3, 2, 'Toyota Innova Crysta Diesel (MT)', 'Diesel', '3100', 'Manual', '1641799834390crysta(D)(MT).png', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(50) NOT NULL,
  `complaint_date` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL DEFAULT 'Not replied',
  `complaint_status` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `customer_id`, `complaint_reply`, `complaint_status`) VALUES
(1, 'Cheated', 'they cheated', '2023-09-13', 1, 'Sorry ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_photo` varchar(500) NOT NULL,
  `customer_proof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `place_id`, `customer_address`, `customer_contact`, `customer_username`, `customer_password`, `customer_email`, `customer_photo`, `customer_proof`) VALUES
(1, 'Amal Raj', 2, 'Lakshmi Bhavan, Muvattupuzha', '8281467390', 'Amal ', 'amal123', 'amalraj@gmail.com', '1533506.png', 'download.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(2, 'Idukki'),
(3, 'Kollam'),
(4, 'Kottayam'),
(5, 'Alappuzha'),
(6, 'Thiruvanathapuram'),
(7, 'Wayanad'),
(8, 'Kasargod'),
(9, 'Kozhikode'),
(10, 'Kannur'),
(11, 'Pathanamthittam'),
(12, 'Palakkad'),
(13, 'Thrissur'),
(14, 'Malappuram ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(50) NOT NULL,
  `feedback_date` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `customer_id`) VALUES
(1, 'Good keep it up', '2023-09-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_image`, `car_id`) VALUES
(1, 'datsun-redi-go-exterior-front-view.jpg', 3),
(4, 'dutsun-redi-go-dashboard.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(1, 'Kochi', 0, 1),
(2, 'Muvattupuzha', 0, 1),
(3, 'Perumbavoor', 0, 1),
(4, 'Angamaly', 0, 1),
(5, 'Thodupuzha', 0, 2),
(6, 'Moolamattom', 0, 2),
(7, 'Muttom', 0, 2),
(8, 'Vazhakulam', 0, 1),
(9, 'Munnar', 0, 2),
(10, 'Vadakara', 0, 9),
(11, 'Koyilandi', 0, 9),
(12, 'Perunthalmanna', 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seater`
--

CREATE TABLE `tbl_seater` (
  `seater_id` int(11) NOT NULL,
  `seater_count` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seater`
--

INSERT INTO `tbl_seater` (`seater_id`, `seater_count`) VALUES
(1, '5 seat'),
(2, '4 seat'),
(3, '7 seat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_seater`
--
ALTER TABLE `tbl_seater`
  ADD PRIMARY KEY (`seater_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_seater`
--
ALTER TABLE `tbl_seater`
  MODIFY `seater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
