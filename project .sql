-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 11:21 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `image_url`, `major`, `email`, `description`) VALUES
(1, 'Ali Baraket', 'https://images.unsplash.com/photo-1592009309602-1dde752490ae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80', 'Real State Agent ', 'alibaraket@gmail.com', 'How can i help you contact me for a help'),
(2, 'Mohammad Awde', 'https://i.pinimg.com/originals/66/1d/4f/661d4f5402c262c6109bcec75c74a05d.jpg', 'Real State Agent', 'mhmdawde@gmail.com', 'Best properties you can take with us'),
(3, 'Jack Joshakan', 'https://legistech.dev/wp-content/uploads/2023/09/1.jpg', 'Real State Agent', 'jackjoshakan@gmail.com', 'Contact me for all your questions');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobDetails` text NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `place` varchar(255) NOT NULL,
  `typeofwork` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `jobTitle`, `jobDetails`, `salary`, `place`, `typeofwork`, `experience`) VALUES
(1, 'Backend Developer', 'Web development experience ', 3000.00, 'Tripoli', 'full-time', '2 Years'),
(2, 'Real State Intern', 'Strong in agenecy ', 23583.00, 'Jounieh', 'intern', 'mid'),
(3, 'Sales Person', 'Bachelor’s degree in marketing.', 3232.00, 'Jbeil', 'full-time', '2 Year'),
(4, 'Real State Senior', 'Experience with marketing ', 3232.00, 'Beirut', 'full-time', '3 Years'),
(5, ' Leasing agent', 'meeting with potential tenants', 5000.00, 'USA', 'full-time', 'senior'),
(6, ' Property manager', 'establishes the rental rate ', 4000.00, 'Dubia', 'full-time', 'senior'),
(7, ' Title examiner', ' ensures real estate titles ', 1500.00, 'DownTown Beirut', 'full-time', 'senior'),
(8, ' Lease administrator', 'oversees the leases of ral estate', 23508.00, 'BDD,Beirut', 'full-time', 'mid');

-- --------------------------------------------------------

--
-- Table structure for table `career_cv`
--

CREATE TABLE `career_cv` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `cv_file` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `job_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('rayan', 'z@gmail.com', 'hi', 'i need a big house in hamra '),
('rayan', 'z@gmail.com', 'ggv', 'vgv'),
('dcd', 'z@gmail.com', 'fvvf', 'fvvfxx '),
('rayan', 'z@gmail.com', 'ddcc', 'cc'),
('mhmd', '12132055@Student.liu.edu.lb', 'hi', 'bye'),
('rayan', 'rayan@gmail.com', 'gtg', 'frfr');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `rating`, `comment`) VALUES
(1, 'Mohammad Jallal', 4, 'Amazing page for real state'),
(2, 'zeinab ahmad', 4, 'dm, best real state ever\n');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`ID`, `name`, `email`, `username`) VALUES
(19, 'rayan', 'rayan@gmail.com', 'roro123'),
(20, 'ahmad', 'ahmad@gmail.com', 'ahmad'),
(21, 'admin', 'admin@gmail.com', 'admin'),
(22, 'mahmod', 'mahmod@gmail.com', 'mahmod'),
(23, 'rima', 'rima@gmail.com', 'rima123');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `baths` int(11) DEFAULT NULL,
  `information` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `image_url`, `price`, `address`, `city`, `beds`, `baths`, `information`) VALUES
(1, 'http://localhost/property/images/img_1.jpg', 3500.00, 'Australia', 'Busten', 3, 5, 'House With Nice view with garden'),
(2, 'http://localhost/property/images/img_7.jpg', 2222.00, 'Jebial', 'lebanon', 2, 2, 'big house'),
(3, 'http://localhost/property/images/img_4.jpg', 22222.00, 'Pelourinho', 'Brazil', 2, 2, 'small house'),
(4, 'http://localhost/property/images/img_2.jpg', 60070.00, 'lebanon', 'Hamra', 4, 3, 'big house'),
(5, 'http://localhost/property/images/img_5.jpg', 6636.00, 'usa', 'florida', 4, 1, 'small house with swimming pool'),
(6, 'http://localhost/property/images/img_3.jpg', 70000.00, 'uae', 'dublin', 5, 5, 'small room'),
(7, 'http://localhost/property/images/img_6.jpg', 1500.00, 'lebanon', 'Beirut', 2, 2, 'small room'),
(8, 'https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 15000.00, 'Beirut', 'Ain Al Meraiseh', 2, 3, 'Big House With Nice view To beach'),
(9, 'https://images.pexels.com/photos/1732414/pexels-photo-1732414.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 30000.00, 'Beirut', 'Beshemoun', 2, 1, 'House with large garden and water land'),
(10, 'https://images.pexels.com/photos/1115804/pexels-photo-1115804.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 100000.00, 'Jorden', 'Irbid', 2, 1, 'Green Garden and best view for your child and brainstorming'),
(11, 'https://images.pexels.com/photos/453201/pexels-photo-453201.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 500000.00, 'Jorden', 'Jerash', 6, 3, 'Sea town with best view and great for big family'),
(12, 'https://images.pexels.com/photos/280222/pexels-photo-280222.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 1000000.00, 'Autralia', 'Melbourne', 2, 2, 'Garden and space for the best set and enjoying sun set');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `meeting_date`, `meeting_time`, `guest_name`, `guest_email`) VALUES
(1, '2023-12-29', '11:55:00', 'zeinab', '12132055@Student.liu.edu.lb'),
(2, '2023-12-30', '12:00:00', 'zeinab', '12132055@Student.liu.edu.lb');

-- --------------------------------------------------------

--
-- Table structure for table `userstd`
--

CREATE TABLE `userstd` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userstd`
--

INSERT INTO `userstd` (`email`, `password`, `role_id`, `role`) VALUES
('admin@gmail.com', '$2y$10$SskY4/JmTRbSYzHgLTBCxededKgLK3yonZbVcCik/Y3hbM7SsAiui', NULL, 2),
('ahmad@gmail.com', '$2y$10$FWLbsCyR1bicF3tQvydvt.CJUPbudCxjLHBxe6XavYSqBDd7ocikq', NULL, 1),
('mahmod@gmail.com', '$2y$10$HgKRLfG0WDsyBCeonPylzO5Bogjs2Tb9HxsFKhxSkz8atvHaRZgAW', NULL, 1),
('rayan@gmail.com', '$2y$10$Ymxx3jMP.Vw3doRuGrRswOUJcTJ0jt9sdaAziAfO4GniKOBGBKhFu', NULL, 1),
('rima@gmail.com', '$2y$10$5AhbLtECk/gYsn/Eg5AvX.os24kyQFfW41SzXj4wIo6sxwjUA9yci', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`) VALUES
(1, 'client'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_cv`
--
ALTER TABLE `career_cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userstd`
--
ALTER TABLE `userstd`
  ADD PRIMARY KEY (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `career_cv`
--
ALTER TABLE `career_cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531012;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userstd`
--
ALTER TABLE `userstd`
  ADD CONSTRAINT `userstd_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
