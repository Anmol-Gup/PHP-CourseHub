-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2023 at 05:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `duration` char(8) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `rating`, `price`, `duration`, `category`, `url`) VALUES
(1, 'Excel for Beginners', '4.5', '499.00', '4.5 Hrs', 'IT & Software', 'icons8-excel.svg'),
(2, 'AWS For Beginners', '4.4', '799.00', '4.0 Hrs', 'Cloud Computing', 'icons8-aws.svg'),
(3, 'The Complete Digital Marketing Guide', '4.4', '1550.00', '9.0 Hrs', 'Digital Marketing', 'digital-marketing.svg'),
(4, 'Front End Development - HTML', '4.7', '499.00', '4.2 Hrs', 'IT & Software', 'icons8-html5.svg'),
(5, 'MySQL from Beginner to Advanced', '4.8', '1050.00', '8.3 Hrs', 'IT & Software', 'icons8-mysql.svg'),
(6, 'Front End Development - CSS', '4.6', '999.00', '5.0 Hrs', 'IT & Software', 'icons8-css3.svg'),
(7, 'Java Programming', '4.5', '1100.00', '12.0 Hrs', 'IT & Software', 'icons8-java.svg'),
(8, 'Data Structures & Algorithms with C++', '4.0', '1550.00', '17.5 Hrs', 'IT & Software', 'Learn-DSA-with-C.webp'),
(9, 'Complete Data Science Bootcamp', '4.6', '649.00', '32 Hrs', 'Data Science', 'data-science.png'),
(10, 'Computer Vision Essentials', '4.3', '650.00', '4.6 Hrs', 'AI/ML', 'cv.avif'),
(11, 'Introduction to Deep Learning', '4.0', '700.00', '3.5 Hrs', 'AI/ML', 'dl.png'),
(12, 'Artificial Intelligence for Beginners', '4.1', '830.00', '5.2 Hrs', 'AI/ML', 'artificial-intelligence.jpg'),
(13, 'SEO from Beginner To Advanced', '4.7', '649.00', '18 Hrs', 'Digital Marketing', 'seo.png'),
(14, 'Search Engine Marketing', '3.9', '510.00', '3.7 Hrs', 'Digital Marketing', 'sem.jpg'),
(15, 'Affiliate Marketing', '4.0', '349.00', '2 Hrs', 'Digital Marketing', 'affiliate-marketing.jpg'),
(16, 'Email Marketing', '4.0', '349.00', '1.5 Hrs', 'Digital Marketing', 'email-marketing.webp'),
(17, 'Microsoft Azure Essentials', '4.8', '540.00', '7 Hrs', 'Cloud Computing', 'icons8-azure.svg'),
(18, 'Cloud Foundations', '4.2', '499.00', '3 Hrs', 'Cloud Computing', 'CloudComputing.jpg'),
(19, 'Complete Machine Learning with Python', '4.6', '1550.00', '42.5 Hrs', 'AI/ML', 'ml.png'),
(20, 'Google Cloud Platform for Beginners', '4.2', '349.00', '7 Hrs', 'Cloud Computing', 'icons8-gcp.svg'),
(21, 'Big Data Analytics Course', '4.7', '799.00', '19.0 Hrs', 'Big Data', 'big-data-analytics.jpg'),
(22, 'Spark Basics', '4.0', '299.00', '2.5 Hrs', 'Big Data', 'spark.png'),
(23, 'Hadoop for Beginners', '4.4', '299.00', '2.0 Hrs', 'Big Data', 'icons8-hadoop.svg'),
(24, 'Complete Python Programming', '4.8', '450.00', '11.0 Hrs', 'IT & Software', 'icons8-python.svg'),
(25, 'PHP Programming', '4.5', '399.00', '7.0 Hrs', 'IT & Software', 'icons8-php.svg'),
(26, 'JavaScript Tutorial', '4.6', '649.00', '9.3 Hrs', 'IT & Software', 'icons8-javascript.svg'),
(27, 'C++ Programming', '4.3', '799.00', '8.7 Hrs', 'IT & Software', 'icons8-c.svg'),
(28, 'React - The Complete Guide', '4.6', '649.00', '41.5 Hrs', 'IT & Software', 'icons8-react.svg');
(29, 'R for Data Science','4.2','530.00','5.5 Hrs','Data Science','icons8-r.svg')
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `email`, `password`) VALUES
(1, 'Surya', 'surya123@gmail.com', '$2y$10$2WuIAumLi30z6y/9zFfNL.NBPhsSwUK..fWWCMJClSU/Pwqslynxy'),
(2, 'Anmol', 'anmol123@gmail.com', '$2y$10$pbNWsEPuDLX/.iHGAsLyneedubrLLX7Z6Mdcj8G4kMHsG6al1Uvs6'),
(3, 'Yash', 'sp32@gmail.com', '$2y$10$OYWiidgZKYaj29/UNhB1ZOm1UVoG7tHPSG.ThYPE1SWRYxYjXvkXG'),
(4, 'Anurag', 'sp32@gmail.com', '$2y$10$yQaXzZNzZq518bSG13V6veGD1Pqaw3Q9jTPlkuJ0P5JYliFxf35ue');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `amount`, `name`, `payment_status`, `payment_id`) VALUES
(1, '2023-07-17 20:12:28', '4579.00', 'Surya', 1, 'pay_MEuCnhnLS9qo17'),
(2, '2023-07-17 20:20:47', '1550.00', 'Anmol', 1, 'pay_MEuLNIT6ZTFSca'),
(3, '2023-07-17 20:25:08', '1298.00', 'Yash', 1, 'pay_MEuPYeOwmUiXpN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `name_idx` (`course_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`,`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
