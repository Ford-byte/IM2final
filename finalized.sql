-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 03:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addAssignmentTask` (IN `ass_name` VARCHAR(20), IN `subject` VARCHAR(20), IN `description` VARCHAR(255), IN `teachers_id` INT(20))  SQL SECURITY INVOKER BEGIN
    DECLARE lastID INT;
    INSERT INTO assignment(id,assignment_name,subject,description,teachers_id) VALUES("",ass_name,subject,description,teachers_id);
    SELECT teachers_id
    FROM teacher;

    
    SET lastID = LAST_INSERT_ID();
    INSERT INTO assignment_list(assignment_id, student_id)
    SELECT lastID, student_id
    FROM student;
    
    INSERT INTO assignment3nf(assid)    
    SELECT ass_id
    FROM assignment_list;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAssignment` (IN `assid` INT(50))   DELETE FROM assignment_list
WHERE ass_id = assid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteONEAssignment` (IN `assid` INT(50))   BEGIN
DELETE al
FROM assignment_list al
LEFT JOIN assignment a ON al.assignment_id = a.id
WHERE a.id = assid;

DELETE FROM assignment WHERE id = assid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteStudent` (IN `id` INT(20))   DELETE FROM student WHERE student_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editAssOnAsslist` (IN `ass_name` VARCHAR(50), IN `subj` VARCHAR(50), IN `assid` INT(50))   UPDATE assignment_list AS al
LEFT JOIN assignment AS a ON al.assignment_id = a.id
SET al.assignment_name = ass_name,
    al.subject = subj
WHERE al.ass_id = assid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_Assignment` (IN `ass_name` VARCHAR(20), IN `subject` VARCHAR(20), IN `ass_id` INT(20))   UPDATE `assignment` SET `assignment_name`= ass_name ,`subject`= subject WHERE id = ass_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllAssignment` ()   SELECT id , assignment_name , subject ,description FROM assignment$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudent` ()   SELECT * from student$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTeacherInfo` ()  SQL SECURITY INVOKER SELECT * FROM teacher$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudent` (IN `fname` VARCHAR(20), IN `lname` VARCHAR(20))  SQL SECURITY INVOKER INSERT INTO student VALUES(null,fname,lname)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTeacher` (IN `fname` VARCHAR(20), IN `lname` VARCHAR(20), IN `pass` VARCHAR(20))  SQL SECURITY INVOKER INSERT into teacher VALUES(' ',fname,lname,pass)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAll` ()  SQL SECURITY INVOKER SELECT *
FROM assignment_list al
LEFT JOIN student s ON al.student_id = s.student_id LEFT JOIN assignment a ON al.assignment_id = a.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAssignedTask` (IN `id` INT(20))   SELECT al.ass_id, a.assignment_name, a.subject,t.teachers_id, t.firstname, s.fname, s.lname , al.student_id FROM assignment_list al left JOIN assignment a ON al.assignment_id = a.id LEFT JOIN teacher t ON a.teachers_id = t.teachers_id left JOIN student s ON al.student_id = s.student_id WHERE al.student_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showOneAss` (IN `id` INT)   SELECT al.ass_id,al.assignment_id,al.student_id,a.assignment_name, a.subject,a.description,s.fname, s.lname
FROM assignment_list al
left JOIN assignment a ON al.assignment_id = a.id
left JOIN student s ON al.student_id = s.student_id
WHERE al.ass_id =id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showOnlySubject` (IN `subj` VARCHAR(20))  SQL SECURITY INVOKER SELECT id , assignment_name , subject from assignment WHERE subject = subj$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showStudentSameAssignment` (IN `id` INT(20))   SELECT student_id , assignment_id
FROM assignment_list
WHERE assignment_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showTrial` (IN `x` INT(50))   SELECT al.ass_id,al.assignment_id,al.student_id,a.assignment_name, a.subject,a.description,s.fname, s.lname
FROM assignment_list al
left JOIN assignment a ON al.assignment_id = a.id
left JOIN student s ON al.student_id = s.student_id
WHERE s.student_id = x$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `try` ()  SQL SECURITY INVOKER SELECT a3.id,a3.assid,al.assignment_id,al.student_id,a.assignment_name,a.subject,
a.description,s.fname,s.lname
FROM assignment3nf a3
JOIN assignment_list al ON a3.assid = al.ass_id
JOIN assignment a ON al.assignment_id = a.id
JOIN student s ON al.student_id = s.student_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStudent` (IN `id` INT(20), IN `fname` VARCHAR(20), IN `lname` VARCHAR(20))   UPDATE student set fname = fname , lname = lname where student_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view3nf` ()   SELECT al.ass_id,al.assignment_id,al.student_id,a.assignment_name, a.subject,a.description,s.fname, s.lname
FROM assignment_list al
left JOIN assignment a ON al.assignment_id = a.id
left JOIN student s ON al.student_id = s.student_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(20) NOT NULL,
  `assignment_name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `teachers_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment3nf`
--

CREATE TABLE `assignment3nf` (
  `id` int(255) NOT NULL,
  `assid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_list`
--

CREATE TABLE `assignment_list` (
  `ass_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fname`, `lname`) VALUES
(150, 'Clifford Jay', 'Iyac'),
(151, 'Da', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachers_id` int(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachers_id`, `firstname`, `lastname`, `pword`) VALUES
(4, 'Danny', 'Obidas', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teacher` (`teachers_id`);

--
-- Indexes for table `assignment3nf`
--
ALTER TABLE `assignment3nf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assid` (`assid`);

--
-- Indexes for table `assignment_list`
--
ALTER TABLE `assignment_list`
  ADD PRIMARY KEY (`ass_id`),
  ADD KEY `assignment_list_ibfk_1` (`assignment_id`),
  ADD KEY `fk_student` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teachers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `assignment3nf`
--
ALTER TABLE `assignment3nf`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=820;

--
-- AUTO_INCREMENT for table `assignment_list`
--
ALTER TABLE `assignment_list`
  MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teachers_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_teacher` FOREIGN KEY (`teachers_id`) REFERENCES `teacher` (`teachers_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment3nf`
--
ALTER TABLE `assignment3nf`
  ADD CONSTRAINT `assignment3nf_ibfk_1` FOREIGN KEY (`assid`) REFERENCES `assignment_list` (`ass_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment_list`
--
ALTER TABLE `assignment_list`
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
