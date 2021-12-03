-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 06:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pract`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Books', 'Favorite Books'),
(2, 'Newspapers', ''),
(3, 'Magazines', 'Fun reads'),
(4, 'New', 'this one'),
(5, 'shd', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `gname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `admin_id`, `gname`) VALUES
(1, 0, 'first'),
(2, 0, 'second'),
(3, 0, 'third');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(1, 'New idea', '2021-11-30 11:26:37', 2, 2),
(9, 'Need more books', '2021-11-30 13:10:45', 9, 2),
(10, 'Good food', '2021-11-30 13:12:26', 10, 2),
(11, 'Here is an example', '2021-11-30 14:06:00', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(8) NOT NULL,
  `text` varchar(255) NOT NULL,
  `task_userid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `from_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `text`, `task_userid`, `group_id`, `from_admin`) VALUES
(31, 'clean', 11, 2, 1),
(32, 'clean', 8, 1, 1),
(34, 'send out financial report', 9, 1, 1),
(35, 'presentation', 7, 1, 1),
(36, 'itws project', 7, 1, 1),
(37, 'get some sleep please', 7, 1, 1),
(38, 'lemon bars', 8, 1, 1),
(39, 'teach the interns', 10, 1, 1),
(40, 'build homes', 14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(1, 'The Odyssey', '2021-11-30 11:43:47', 1, 2),
(2, 'New York Times', '2021-11-30 11:26:37', 2, 2),
(9, 'Urgent!', '2021-11-30 13:10:45', 1, 2),
(10, 'Food Network', '2021-11-30 13:12:26', 3, 2),
(11, 'Test', '2021-11-30 14:06:00', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `group_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` int(8) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `group_id`, `username`, `password`, `fname`, `lname`, `email`, `is_admin`, `phone`) VALUES
(2, 0, 'emilyngo100', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '', 'emilyngo100@gmail.com', 0, 0),
(7, 1, 'tant3', '$2y$10$QENrL4l2p/T5MO.K8TY.3urGqGQeU4zbrCjwGbtPNbbUlDIuk3sRa', 'tobey', 'tan', 'something@gmail.com', 1, 0),
(8, 1, 'bleh', '$2y$10$tQhAaIRxaVjdXkkVxrm56engGXploT0XgyUFRNHVrXTk/Fapoq3Pu', 'Dylan', 'Le', 'le@gmail.com', 0, 0),
(9, 1, 'venki', '$2y$10$Hjb1hcPSKBYsNuYuE6cnZejcssVULdSlX8A8eBAXFchNKCP.7JiHK', 'venkat', 'cheru', 'venmo@gmail.com', 0, 0),
(10, 1, 'aeo', '$2y$10$QWosCFJzBnmPdNJnAVSxLeEElKm1590g14aFzVmTjdtV7AQSLcWL.', 'tim', 'sun', 'aero@gmail.com', 0, 0),
(11, 2, 'ngoe', '$2y$10$09cBbYoHGQzMxaVz/yXRbu9AiiTiSnnk/GfqggALHDxy8eqsMshgy', 'emily', 'ngo', 'know@gmail.com', 1, 0),
(12, 2, 'pippin', '$2y$10$5xt.0FN2L.GV3ZN4WZD4IuOuv1Nm0DMVOPJTkcGAqG5uk6hxsk3sS', 'peggy', 'tobar', 'ptobar@gmail.com', 0, 0),
(13, 2, 'winner', '$2y$10$DV69Ua91XQH3mHRnr/7ezObexlLJTWkEYLY7gVfxON/6/abxJHW0y', 'winnie', 'ouyang', 'pooh@gmail.com', 0, 0),
(14, 3, 'bob', '$2y$10$wn1125Rrb3e49HVmOnD7BuphGnELZu43fW7gPTIIuxcmtqkT7r7ru', 'bob', 'builder', 'build@gmail.com', 1, 1112223333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid_task` (`task_userid`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_userid_task` FOREIGN KEY (`task_userid`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
