-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 02:37 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pythonic_lava_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'sub admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `role`) VALUES
(1, 1, 'Super super admin'),
(28, 2, 'sub admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `week_id` int(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `due_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `week_id`, `name`, `description`, `due_date`) VALUES
(1, 3, 'Parul University', 'akjgvruihgaoh lesahg oisgbh ilu h slh oihsg b liufg aqi u io whfo ouhw ho iouwh las giu', '5/4/22'),
(2, 4, 'ST Anthony`s High school', 'Course work team leader', '5/7/22'),
(3, 5, 'Dancing', 'Breaking', '7/9/22');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `task_description` varchar(300) NOT NULL,
  `lesson_title` varchar(50) NOT NULL,
  `max_blocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `week_id`, `task_description`, `lesson_title`, `max_blocks`) VALUES
(2, 3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarr', 'Variables', 3),
(4, 4, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur', 'Strings', 5),
(6, 5, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur', 'Integers', 4),
(8, 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable Eng', 'Boolean', 9),
(9, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarr', 'Control statements', 8),
(10, 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable Eng', 'Loops', 12),
(11, 28, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable Eng', 'chill', 6);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `reply` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `date`, `user_id`, `message`, `reply`) VALUES
(1, '', 4, 'I dont understand this shit', ''),
(2, '', 4, 'Im finna drop out for real real.', ''),
(3, '', 4, 'Im finna drop out for real real.', ''),
(4, '', 4, 'reybh54eubv', ''),
(5, '', 4, 'reybh54eubv', ''),
(6, '', 4, 'reybh54eubv', 'wadii'),
(7, '', 4, 'aberbweds', 'go sleep'),
(8, '', 4, 'what did you say? 2022-08-18', ''),
(9, '', 4, 'what do i need? (18-08-22)', 'go die'),
(10, '(18-08-22)', 2, 'Do you like me?', ''),
(11, '21-08-22', 1, 'Why am i alone in this class', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `question` varchar(60) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `correctAnswer` varchar(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `answer`, `correctAnswer`) VALUES
(1, 'What is a variable?', 'a type of food, a rare species of dogs, an African delicacy, a joke', '3'),
(3, 'Have you ever seen jaws?', 'maybe, maybe not, sure, no', '3'),
(4, 'Did you just finish the admin page', 'Yess!, Maybe, I don`t know, God', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `submitted` varchar(10) NOT NULL DEFAULT 'false',
  `date` varchar(25) NOT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`id`, `student_id`, `assignment_id`, `code`, `submitted`, `date`, `mark`) VALUES
(11, 1, 2, 'if 6 * 7 == 42:  print(\"Don\'t panic\")else:  print(\'Panic\')', 'true', '', 12),
(13, 4, 2, 'if 6 * 7 == 42:  print(\"Don\'t panic\")else:  print(\'Panic\')', 'true', '18-08-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_content`
--

CREATE TABLE `student_content` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_content`
--

INSERT INTO `student_content` (`id`, `student_id`, `content_id`, `code`, `mark`) VALUES
(1, 1, 2, 'if 6 * 7 == 42:  print(\"Don\'t panic\")else:  print(\'Panic\')', NULL),
(3, 1, 6, 'if 6 * 7 == 42:  print(\"Don\'t panic\")else:  print(\'Panic\')', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `quized` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `profile_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Surname`, `Email`, `Password`, `score`, `quized`, `is_admin`, `profile_image`) VALUES
(1, 'Leeton', 'Dida', 'lee@gmail.com', '123', 18, 0, 1, './assets/uploads/630ec246a94f01.72708853.jpg'),
(2, 'Clayton', 'Dida', 'clay@gmail.com', '123', 5, 0, 1, ''),
(4, 'Lexx', 'Dee', 'lex@gmail.com', '123', 20, 1, 0, ''),
(6, 'Paul', 'Mbamalu', 'centpaul25@gmail.com', 'Admin5', 1, 1, 1, ''),
(7, 'jackie', 'chan', 'jackie@gmail.com', '123', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `week_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `assignment_id`, `week_name`) VALUES
(3, 1, 'Week 1'),
(4, NULL, 'Week 2'),
(5, 3, 'Week 3'),
(28, 2, 'Week 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_ibfk_1` (`user_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_ibfk_1` (`week_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_ibfk_1` (`week_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_assignment_ibfk_1` (`assignment_id`),
  ADD KEY `student_assignment_ibfk_2` (`student_id`);

--
-- Indexes for table `student_content`
--
ALTER TABLE `student_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_content_ibfk_1` (`student_id`),
  ADD KEY `student_content_ibfk_2` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weeks_ibfk_1` (`assignment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_content`
--
ALTER TABLE `student_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD CONSTRAINT `student_assignment_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_assignment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_content`
--
ALTER TABLE `student_content`
  ADD CONSTRAINT `student_content_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_content_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weeks`
--
ALTER TABLE `weeks`
  ADD CONSTRAINT `weeks_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
