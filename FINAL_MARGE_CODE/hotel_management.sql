-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE `a` (
  `id` int(11) NOT NULL,
  `feature_title` varchar(255) NOT NULL,
  `feature_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accessibility`
--

CREATE TABLE `accessibility` (
  `id` int(11) NOT NULL,
  `feature_title` varchar(255) NOT NULL,
  `feature_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessibility`
--

INSERT INTO `accessibility` (`id`, `feature_title`, `feature_description`) VALUES
(1, 'Wheelchair Accessible Rooms', 'Our hotel offers rooms that are fully wheelchair accessible, ensuring comfort and convenience for all guests.'),
(2, 'Braille Signage', 'All important locations within the hotel are equipped with Braille signage for visually impaired guests.'),
(3, 'Hearing Assistance Devices', 'We provide hearing assistance devices upon request to enhance the stay of guests with hearing impairments.');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_description` text NOT NULL,
  `activity_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'zaman', '1234', '2025-01-06 07:08:29'),
(2, 'noor', '1234', '2025-01-06 07:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `guests` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `check_in`, `check_out`, `guests`, `created_at`) VALUES
(1, 'MD AL AMIN', 'ALAMIN@GMAIL.COM', '2025-01-23', '2025-01-28', 3, '2025-01-24 08:10:28'),
(2, 'ALAMIN', 'ALAMIN@GMAIL.COM', '2025-01-07', '2025-01-28', 6, '2025-01-24 08:16:34'),
(3, 'alamin', 'ALAMIN@GMAIL.COM', '2025-01-25', '2025-01-30', 5, '2025-01-24 14:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` enum('Pending','Confirmed','Checked-In','Checked-Out','Cancelled') DEFAULT 'Pending',
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `hotel_id`, `guest_name`, `check_in_date`, `check_out_date`, `contact`, `status`, `total_price`, `created_at`) VALUES
(5, 2, 'Charlie Davis', '2025-06-15', '2025-06-20', 'Phone: +1 678 901 234 | Email: charliedavis@example.com', 'Checked-In', 750.00, '2025-01-24 10:48:30'),
(6, 3, 'dwda', '2025-01-16', '2025-01-21', 'ewqeqwe', 'Confirmed', 3213213.00, '2025-01-24 10:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `f`
--

CREATE TABLE `f` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f`
--

INSERT INTO `f` (`id`, `question`, `answer`) VALUES
(1, 'any questions?', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'What are the check-in and check-out times?', 'Check-in is from 7:00 AM and check-out is until 10:00 PM.'),
(2, 'Is there free Wi-Fi available?', 'Yes, we offer complimentary Wi-Fi in all rooms and public areas.'),
(3, 'Is there on-site parking available?', 'Yes, on-site parking is available for our guest.'),
(4, 'Is there any pool inside the hotel?', 'Yes, there is a pool inside the hotel.'),
(5, 'Can I bring my pet inside hotel?', 'No, pets are not allowed inside hotel.'),
(6, 'Can I cancel my booking for a full refund?', 'Always check the hotel cancellation policy before booking a rate.');

-- --------------------------------------------------------

--
-- Table structure for table `h`
--

CREATE TABLE `h` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`id`, `title`, `description`, `image_url`) VALUES
(1, 'Luxurious Room', 'Experience the comfort and elegance of our luxurious rooms.', 'https://www.panpacific.com/content/dam/pphg-revamp/en/ppdac/pphg2-0/rooms/junior-suite/PPDAC_JuniorSuite_Feature_Image.jpg'),
(2, 'Gourmet Dining', 'Enjoy exquisite gourmet dining with a variety of international cuisines.', 'https://www.panpacific.com/content/dam/pphg-revamp/en/ppdac/pphg2-0/rooms/deluxe-room/PPDAC_Deluxe_Room_Feature_Image.jpg'),
(3, 'Spa & Wellness', 'Rejuvenate with our exclusive spa and wellness treatments.', 'https://i.pinimg.com/originals/0d/5d/42/0d5d42b4e4db0f1355970b821d623316.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name`, `description`, `location`, `services`, `contact`, `image_url`) VALUES
(1, 'Sunshine Hotel', 'A luxury hotel offering exceptional comfort and world-class services, perfect for business or leisure.', '123 Beach Avenue, Malibu, CA, USA', 'Free WiFi, Pool, Spa, Gym, Restaurant, Room Service', 'Phone: +1 234 567 890 | Email: info@sunshinehotel.com', 'https://example.com/images/sunshine-hotel.jpg'),
(2, 'Mountain View Resort', 'Nestled in the heart of the mountains, this resort offers breathtaking views and serene accommodations.', '456 Mountain Road, Aspen, CO, USA', 'Hiking Trails, Skiing, Indoor Pool, Sauna, Restaurant, Bar', 'Phone: +1 345 678 901 | Email: contact@mountainviewresort.com', 'https://example.com/images/mountain-view-resort.jpg'),
(3, 'City Lights Inn', 'A modern inn located in the city center, ideal for travelers who want to explore the urban lifestyle.', '789 City Center, New York, NY, USA', 'Free Breakfast, Airport Shuttle, Parking, Fitness Center, Conference Rooms', 'Phone: +1 456 789 012 | Email: reservations@citylightsinn.com', 'https://example.com/images/city-lights-inn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_policies`
--

CREATE TABLE `hotel_policies` (
  `id` int(11) NOT NULL,
  `policy_title` varchar(255) NOT NULL,
  `policy_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_policies`
--

INSERT INTO `hotel_policies` (`id`, `policy_title`, `policy_description`) VALUES
(1, 'Check-In Policy', 'Check-in is from 2:00 PM. Early check-in is subject to availability.'),
(2, 'Cancellation Policy', 'Cancellations made 24 hours before the check-in date will be fully refunded. After that, a fee applies.'),
(3, 'Rates Policy', 'Rates are inclusive of 31.10% Service Charge and VAT combined.'),
(4, 'Payment Types', 'The Hotel accepts Visa, MasterCard, American Express and JCB.'),
(5, 'Accessibility', 'Wheelchair-accessible rooms and bathrooms are available. Prior reservation is required.'),
(6, 'Smoking', 'No smoking is allowed inside the hotel.');

-- --------------------------------------------------------

--
-- Table structure for table `p`
--

CREATE TABLE `p` (
  `id` int(11) NOT NULL,
  `policy_title` varchar(255) NOT NULL,
  `policy_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `availability` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`id`, `room_name`, `room_type`, `price`, `availability`, `description`, `image_url`) VALUES
(1, 'Ocean View Suite', 'Suite', 299.00, 'Available', 'A luxurious suite with stunning ocean views, perfect for a relaxing vacation.', 'https://example.com/images/ocean-view-suite.jpg'),
(2, 'Mountain Retreat', 'Standard', 159.99, 'Available', 'A cozy retreat located in the mountains, ideal for nature lovers.', 'https://example.com/images/mountain-retreat.jpg'),
(3, 'City Central Room', 'Deluxe', 199.99, 'Unavailable', 'A spacious deluxe room in the heart of the city with all modern amenities.', 'https://example.com/images/city-central-room.jpg'),
(4, 'Penthouse Suite', 'Suite', 499.99, 'Available', 'An exclusive penthouse suite with breathtaking views and luxurious features.', 'https://example.com/images/penthouse-suite.jpg'),
(5, 'Garden View Room', 'Standard', 129.99, 'Available', 'A comfortable room with a beautiful garden view, perfect for a peaceful stay.', 'https://example.com/images/garden-view-room.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `contact_no`, `username`, `password`, `email`) VALUES
(4, 'sakib', 88888888, 'sakib', '1234', ''),
(7, 'samin', 1111111111, 'pilot', '111111', ''),
(8, 'sadman', 1700000, 'rongu', '1111', ''),
(9, 'rafat nabil', 17049085, 'nabil', '1111', 'alamin@gamil.com'),
(10, 'rafat nabil', 1212121212, 'rafat', '111111', ''),
(11, 'bijoy amin', 1212121212, 'bijoy', '111111', ''),
(12, 'Noor Zaman', 1212121212, 'noorzaman', '123456', ''),
(14, 'messi', 1000000000, 'm10', '1111111', ''),
(15, 'Erhan', 2147483647, 'Erhan', '123456', ''),
(17, 'nujhat', 178787878, 'nujhat', '111111', ''),
(19, 'MD AL AMIN', 1718100580, 'admin', '23123421', ''),
(20, 'MD AL AMIN', 1755081727, 'noor', '1415144998', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a`
--
ALTER TABLE `a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accessibility`
--
ALTER TABLE `accessibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `f`
--
ALTER TABLE `f`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h`
--
ALTER TABLE `h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_policies`
--
ALTER TABLE `hotel_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p`
--
ALTER TABLE `p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a`
--
ALTER TABLE `a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accessibility`
--
ALTER TABLE `accessibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `f`
--
ALTER TABLE `f`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `h`
--
ALTER TABLE `h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_policies`
--
ALTER TABLE `hotel_policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p`
--
ALTER TABLE `p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
