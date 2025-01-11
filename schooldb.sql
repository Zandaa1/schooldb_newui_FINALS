-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 07:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answered_tests`
--

CREATE TABLE `answered_tests` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `testId` int(11) NOT NULL,
  `answeredAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `totalCorrectAnswers` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answered_tests`
--

INSERT INTO `answered_tests` (`id`, `studentId`, `testId`, `answeredAt`, `totalCorrectAnswers`) VALUES
(1, 4, 2, '2025-01-11 15:56:45', 0),
(2, 4, 2, '2025-01-11 15:57:13', 0),
(3, 4, 2, '2025-01-11 15:57:37', 0),
(4, 4, 2, '2025-01-11 15:57:48', 0),
(6, 3, 2, '2025-01-11 16:11:53', 0),
(7, 4, 3, '2025-01-11 16:28:40', 0),
(8, 4, 4, '2025-01-11 17:52:47', 0),
(12, 5, 4, '2025-01-11 18:13:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classID` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `classIDTeacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`classID`, `className`, `classIDTeacher`) VALUES
(2, 'BSIT 244 - DATABASE MANAGEMENT SYSTEMS (LEC & LAB)', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `salary`) VALUES
(1, 'Name Name', 'fakeAddress1', 10000),
(2, 'Test Test', 'SalaryTest', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answer` text NOT NULL,
  `answeredAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `isCorrect` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `studentId`, `questionId`, `answer`, `answeredAt`, `isCorrect`) VALUES
(1, 4, 3, 'opaskdopaskd', '2025-01-11 15:57:37', 0),
(2, 4, 4, 'asopdkasopd', '2025-01-11 15:57:37', 0),
(3, 4, 5, 'opaskdopaskd', '2025-01-11 15:57:37', 0),
(4, 4, 6, 'opaskdopaskd', '2025-01-11 15:57:37', 0),
(5, 4, 7, 'aisjdoiasjdiojsud', '2025-01-11 15:57:37', 0),
(6, 4, 3, 'opaskdopaskd', '2025-01-11 15:57:48', 0),
(7, 4, 4, 'asopdkasopd', '2025-01-11 15:57:48', 0),
(8, 4, 5, 'opaskdopaskd', '2025-01-11 15:57:48', 0),
(9, 4, 6, 'opaskdopasd', '2025-01-11 15:57:48', 0),
(10, 4, 7, 'aisjdoiasjdiojsud', '2025-01-11 15:57:48', 0),
(11, 3, 3, 'opaskdopaskd', '2025-01-11 16:11:53', 0),
(12, 3, 4, 'aopskdask', '2025-01-11 16:11:53', 0),
(13, 3, 5, 'opaskdopaskd', '2025-01-11 16:11:53', 0),
(14, 3, 6, 'opaskdopasd', '2025-01-11 16:11:53', 0),
(15, 3, 7, 'aisjdoiasjdiojsud', '2025-01-11 16:11:53', 0),
(16, 4, 8, '1', '2025-01-11 16:28:40', 0),
(17, 4, 9, '2', '2025-01-11 16:28:40', 0),
(18, 4, 10, '3', '2025-01-11 16:28:40', 0),
(19, 4, 11, '4', '2025-01-11 16:28:40', 0),
(20, 4, 12, '4', '2025-01-11 16:28:40', 0),
(21, 4, 13, 'opaskdopask', '2025-01-11 17:52:47', 0),
(22, 4, 14, '1232312', '2025-01-11 17:52:47', 0),
(23, 4, 15, '12321312', '2025-01-11 17:52:47', 0),
(24, 4, 16, '12312231221', '2025-01-11 17:52:47', 0),
(25, 4, 17, '123213123', '2025-01-11 17:52:47', 0),
(26, 5, 13, 'opaskdopask', '2025-01-11 18:03:19', 0),
(27, 5, 14, '1232312', '2025-01-11 18:03:19', 0),
(28, 5, 15, '12321312', '2025-01-11 18:03:19', 0),
(29, 5, 16, '12312231221', '2025-01-11 18:03:19', 0),
(30, 5, 17, '123213123', '2025-01-11 18:03:19', 0),
(31, 5, 13, 'opaskdopask', '2025-01-11 18:05:32', 0),
(32, 5, 14, '1232312', '2025-01-11 18:05:32', 0),
(33, 5, 15, '12321312', '2025-01-11 18:05:32', 0),
(34, 5, 16, '12312231221', '2025-01-11 18:05:32', 0),
(35, 5, 17, '123213123', '2025-01-11 18:05:32', 0),
(36, 5, 13, 'opaskdopask', '2025-01-11 18:08:27', 0),
(37, 5, 14, '1232312', '2025-01-11 18:08:27', 0),
(38, 5, 15, '12321312', '2025-01-11 18:08:27', 0),
(39, 5, 16, '12312231221', '2025-01-11 18:08:27', 0),
(40, 5, 17, '123213123', '2025-01-11 18:08:27', 0),
(41, 5, 13, 'option1', '2025-01-11 18:13:43', 1),
(42, 5, 14, 'option1', '2025-01-11 18:13:43', 0),
(43, 5, 15, 'option1', '2025-01-11 18:13:43', 0),
(44, 5, 16, 'option1', '2025-01-11 18:13:43', 0),
(45, 5, 17, 'option1', '2025-01-11 18:13:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testquestion`
--

CREATE TABLE `testquestion` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testquestion`
--

INSERT INTO `testquestion` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
(1, 'What is hatdog?', 'pork', 'chicken', 'meat', '???', 4),
(2, 'q2-test', 'q2-ans1', 'q2-ans2', 'q2-ans3', 'q2-ans4', 3),
(3, 'test3', 'test1', 'test2', 'test', 'tesrt2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `testName` varchar(255) NOT NULL,
  `dueDate` date NOT NULL,
  `description` text NOT NULL,
  `classCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `testName`, `dueDate`, `description`, `classCode`) VALUES
(1, 'Activity 1 - Test', '2023-12-09', 'This activity covers chapters 1-3 of the textbook and includes multiple-choice and short-answer questions.', 'BSIT 244'),
(2, 'aaaa', '2025-12-14', 'This is a test description', 'BSIT 244'),
(3, 'newTest', '2025-12-14', 'This is a test description', 'BSIT 244'),
(4, 'test', '2025-12-14', 'oasjdoiasjd', 'BSIT 244');

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` int(11) NOT NULL,
  `testId` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer1` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL,
  `answer4` varchar(255) DEFAULT NULL,
  `answer5` varchar(255) DEFAULT NULL,
  `correctAnswer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `testId`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `correctAnswer`) VALUES
(1, 1, 'What is a database?', 'A collection of data', 'A type of software', 'A programming language', 'A hardware device', 'None of the above', ''),
(2, 1, 'What is SQL?', 'Structured Query Language', 'Simple Query Language', 'Sequential Query Language', 'Standard Query Language', 'None of the above', ''),
(3, 2, 'ioasjdasj', 'opaskdopaskd', 'opkasopdkasop', 'opaksopdkas', 'opaskdopkasdo', NULL, ''),
(4, 2, 'oiasjdoiasj', 'asdopaksd', 'aopskdask', 'asopdkasopd', 'aopsdkaopdk', NULL, ''),
(5, 2, 'oipaskdopas', 'opaskdopaskd', 'opaskdopaskd', 'opaskdopaskd', 'oaskdopaskd', NULL, ''),
(6, 2, 'koasjdiasj', 'opaskdopasd', 'opaskdopaskd', 'opskdoaskd', 'aoskdas', NULL, ''),
(7, 2, 'ioasjdiasjiosja', 'aisjdoiasjdiojsud', 'iasjidjad9', 'iasjdasd8', '9iasjd98asj98d', NULL, ''),
(8, 3, '1', '1', '2', '3', '4', NULL, ''),
(9, 3, '2', '1', '2', '3', '4', NULL, ''),
(10, 3, '3', '1', '2', '3', '4', NULL, ''),
(11, 3, '4', '1', '2', '3', '4', NULL, ''),
(12, 3, '5', '1', '2', '3', '4', NULL, ''),
(13, 4, 'opaskdopas', 'opaskdopask', 'opaskdopask', 'opaskdopas', 'opaskdoask', 'opaskdopasd', 'option1'),
(14, 4, '2312312321', '1232312', '123123', '123213', '12312', '321321', 'option2'),
(15, 4, '213213213', '12321312', '12312312', '21312312', '213213123', '21312312', 'option5'),
(16, 4, '2321312323', '12312231221', '123123213122', '1232312312312', '123213123', '1231231232', 'option2'),
(17, 4, '12312321312', '123213123', '12321321312', '12321312', '12321312', '123123', 'option5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `isStudent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `nickname`, `isStudent`) VALUES
(1, 'testUser', 'testpw', 'Alex Mangahas', 'Alex', 1),
(2, 'testUser', 'testpw', 'Alex Mangahas', 'Alex', 1),
(3, '123', '123', 'zandaatv', 'teast', 1),
(4, 'teacher', '123', 'Tristan Jay Calaguas', 'Tristan', 0),
(5, 'a1550023', '1234', 'Alexander Mangahas', 'Alex', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answered_tests`
--
ALTER TABLE `answered_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `testId` (`testId`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `testquestion`
--
ALTER TABLE `testquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testId` (`testId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answered_tests`
--
ALTER TABLE `answered_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `testquestion`
--
ALTER TABLE `testquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answered_tests`
--
ALTER TABLE `answered_tests`
  ADD CONSTRAINT `answered_tests_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `answered_tests_ibfk_2` FOREIGN KEY (`testId`) REFERENCES `tests` (`id`);

--
-- Constraints for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD CONSTRAINT `student_answers_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_answers_ibfk_2` FOREIGN KEY (`questionId`) REFERENCES `test_questions` (`id`);

--
-- Constraints for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD CONSTRAINT `test_questions_ibfk_1` FOREIGN KEY (`testId`) REFERENCES `tests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
