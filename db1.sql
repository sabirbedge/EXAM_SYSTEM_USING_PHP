-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2021 at 10:38 AM
-- Server version: 8.0.23
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_exam`
--

DROP TABLE IF EXISTS `tbl_add_exam`;
CREATE TABLE IF NOT EXISTS `tbl_add_exam` (
  `sub` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`sub`)
);

--
-- Dumping data for table `tbl_add_exam`
--

INSERT INTO `tbl_add_exam` (`sub`, `date`, `status`) VALUES
('C', '2021-06-26', 1),
('java', '2021-05-29', 1),
('PHP', '2021-06-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

DROP TABLE IF EXISTS `tbl_question`;
CREATE TABLE IF NOT EXISTS `tbl_question` (
  `q` text,
  `op1` text,
  `op2` text,
  `op3` text,
  `op4` text,
  `ans` text,
  `sub` text
);

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`q`, `op1`, `op2`, `op3`, `op4`, `ans`, `sub`) VALUES
('Which of the following option leads to the portability and security of Java?', 'Bytecode is executed by JVM', 'The applet makes the Java code secure and portable', 'Use of exception handling', 'Dynamic binding between objects', 'Bytecode is executed by JVM', 'java'),
(' Which of the following is not a Java features?', 'Dynamic', 'Architecture Neutral', 'Use of pointers', 'Object-oriented', 'Use of pointers', 'java'),
(' _____ is used to find and fix bugs in the Java programs.', 'JVM', 'JRE', 'JDK', 'JDB', 'JDB', 'java'),
('What is the return type of the hashCode() method in the Object class?', 'Object', 'int', 'long', 'void', 'int', 'java'),
('What does the expression float a = 35 / 0 return?', '0', 'Not a Number', 'Infinity', 'Run time exception', 'Infinity', 'java'),
(' Evaluate the following Java expression, if x=3, y=5, and z=10:     ++z + y - y + z + x++', '24', '22', '23', '25', '24', 'java'),
('Which of the following tool is used to generate API documentation in HTML format from doc comments in source code?', 'javap tool', 'javaw command', 'Javadoc tool', 'javah command', 'Javadoc tool', 'java'),
('Which of the following for loop declaration is not valid?', 'for ( int i = 99; i >= 0; i / 9 )', 'for ( int i = 7; i <= 77; i += 7 )', 'for ( int i = 20; i >= 2; - -i )', 'for ( int i = 2; i <= 20; i = 2* ', 'for ( int i = 99; i >= 0; i / 9 )', 'java'),
('Which method of the Class.class is used to determine the name of a class represented by the class object as a String?', 'getClass()', 'intern()', 'getName()', 'toString()', 'getName()', 'java'),
('In which process, a local variable has the same name as one of the instance variables?', 'Serialization', 'Variable Shadowing', 'Abstraction', 'Multi-threading', 'Variable Shadowing', 'java'),
(' Which of the following is true about the anonymous inner class?', 'It has only methods', 'Objects can\'t be created', 'It has a fixed class name', 'It has no class name', 'It has no class name', 'java'),
(' Which package contains the Random class?', 'java.util package', 'java.lang package', 'java.awt package', 'java.io package', 'java.util package', 'java'),
('What do you mean by nameless objects?', 'An object created by using the new keyword', 'An object of a superclass created in the subclass.', 'An object without having any name but having a reference.', 'An object that has no reference.', 'An object that has no reference.', 'java'),
(' An interface with no fields or methods is known as a ______.', 'Runnable Interface', 'Marker Interface', 'Abstract Interface', 'CharSequence Interface', 'Marker Interface', 'java'),
('Which of the following is an immediate subclass of the Panel class?', 'Applet class', 'Window class', 'Frame class', 'Dialog class', 'Applet class', 'java'),
('Which option is false about the final keyword?', 'A final method cannot be overridden in its subclasses.', 'A final class cannot be extended.', 'A final class cannot extend other classes.', 'A final method can be inherited.', 'A final class cannot extend other classes.', 'java'),
(' Which of these classes are the direct subclasses of the Throwable class?', 'RuntimeException and Error class', 'Exception and VirtualMachineError class', 'Error and Exception class', 'IOException and VirtualMachineError class', 'Error and Exception class', 'java'),
('What do you mean by chained exceptions in Java?', 'Exceptions occurred by the VirtualMachineError', 'An exception caused by other exceptions', 'Exceptions occur in chains with discarding the debugging information', 'None of the above', 'An exception caused by other exceptions', 'java'),
(' In which memory a String is stored, when we create a string using new operator?', 'Stack', 'String memory', 'Heap memory', 'Random storage space', 'Heap memory', 'java'),
(' Which of the following is a reserved keyword in Java?', 'object', 'strictfp', 'main', 'system', 'strictfp', 'java'),
('What is c?', 's/w', 'h/w', 'os', 'language', 'language', 'C'),
('what is int in C?', 'keyword', 'pointer', 'function', 'method', 'keyword', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

DROP TABLE IF EXISTS `tbl_result`;
CREATE TABLE IF NOT EXISTS `tbl_result` (
  `username` text,
  `sub` text,
  `date` text,
  `result` text
);

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`username`, `sub`, `date`, `result`) VALUES
('sabir', 'java', 'Fri May 07 22:51:56 IST 2021', '20/20'),
('sabir', 'java', 'Fri May 14 20:33:15 IST 2021', '2/20'),
('rohan', 'java', 'Fri May 14 20:34:58 IST 2021', '1/20'),
('sabir', 'java', 'Tue May 18 20:08:34 IST 2021', '0/20'),
('sabir', 'java', 'Tue May 18 20:09:01 IST 2021', '2/20'),
('sabir', 'java', 'Tue May 18 20:11:58 IST 2021', '4/20'),
('ajit', 'java', 'Wed May 19 15:45:27 IST 2021', '8/20'),
('sabir', 'C', '27-05-2021 05:28:48pm', '1'),
('sabir', 'C', '27-05-2021 05:29:56pm', '2'),
('sabir', 'C', '27-05-2021 05:31:34pm', '1/2'),
('om', 'C', '27-05-2021 05:33:18pm', '0/2'),
('sabir', 'java', '28-05-2021 09:56:21am', '8/20'),
('rohit', 'java', '29-05-2021 05:09:12am', '0/20'),
('atharv', 'PHP', '29-05-2021 05:23:08am', '3/4'),
('sabir', 'PHP', 'Thu Jun 10 15:31:03 IST 2021', '4/20'),
('sabir', 'java', 'Wed Jun 16 20:14:38 IST 2021', '1/20'),
('sabir', 'java', 'Fri Jun 25 11:43:01 IST 2021', '5/20'),
('sabir', 'java', 'Fri Jun 25 11:46:19 IST 2021', '9/20'),
('abc', 'java', 'Fri Jun 25 14:19:59 IST 2021', '5/20'),
('raj', 'java', 'Fri Jun 25 17:39:38 IST 2021', '1/20'),
('vishal', 'java', 'Sat Jun 26 09:09:17 IST 2021', '9/20'),
('vishal', 'C', 'Sat Jun 26 09:15:20 IST 2021', '1/20'),
('raj', 'C', 'Tue Jun 29 19:58:22 IST 2021', '0/20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

DROP TABLE IF EXISTS `tbl_signup`;
CREATE TABLE IF NOT EXISTS `tbl_signup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` int NOT NULL,
  `block` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`username`)
);

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`id`, `role`, `block`, `name`, `gender`, `username`, `password`, `mobile`, `email`) VALUES
(1, 1, 1, 'admin', 'male', 'admin', 'admin7', '1234567895', 'admin@gmail.com'),
(2, 0, 1, 'Sabir Bedge', 'male', 'sabir', '1', '8999155937', 'sabir@gmail.com'),
(3, 0, 1, 'Ajit Gavde', 'male', 'ajit', '1', '1234567895', 'ajit@gmail.com'),
(4, 0, 1, 'Raj Patil', 'male', 'raj', 'raj', '2222222', 'raj123@gmail.com'),
(5, 0, 1, 'Rohan Chavan', 'male', 'rohan', 'rohan123', '55555555555', 'rohan@gmail.com'),
(6, 0, 1, 'Madhuri Pawar', 'female', 'madhuri', '1', '1234567895', 'madhuri@gmail.com'),
(7, 0, 1, 'Abhi Chalake', 'male', 'abhi', '1', '213851655', 'abhi@gmail.com'),
(8, 0, 1, 'omkar kulkarni', 'male', 'om', '1', '1234567890', 'om@gmail.com'),
(9, 0, 1, 'Rohit Sharma', 'male', 'rohit', '12345', '5555544446', 'rohit@gmail.com'),
(10, 0, 1, 'Atharv Patil', 'male', 'atharv', 'athu123', '125478965', 'atharv@gmail.com'),
(11, 0, 1, 'Raj Haladkar', 'male', 'abc', 'raj123', '265626226', 'raj@gmail.com'),
(12, 0, 1, 'Vishal Shinde', 'male', 'vishal', 'vishal123', '25192656559', 'vishal@gmail.com'),
(13, 0, 1, 'Vishu Shinde', 'male', 'vishu', '123', '2514632541', 'vishu@gmail.com'),
(14, 0, 1, 'Parshwa Shah', 'male', 'parshwa', '123', '2452162621', 'shah@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
