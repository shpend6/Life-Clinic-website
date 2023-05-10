-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 11:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `life_clinic`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDepName` ()   BEGIN
 SELECT name FROM department;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `doctor_id`, `patient_id`, `booking_date`, `booking_time`, `booking_reason`) VALUES
(2, 1, 66, '2023-05-07', '08:00:00', NULL),
(3, 6, 66, '2023-05-10', '10:00:00', NULL),
(4, 10, 66, '2023-05-10', '13:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(2, 'Neurology'),
(3, 'Pediatrics'),
(4, 'Cardiology'),
(10, 'Physical Trauma'),
(11, 'Delete this department'),
(13, 'Or this');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `user_id`, `specialty`) VALUES
(1, 1, 'Epilepsy and seizure disorders'),
(2, 2, 'Movement disorders'),
(3, 3, 'Multiple sclerosis'),
(4, 4, 'Neuromuscular disorders'),
(5, 5, 'Neonatology'),
(6, 6, 'Pediatric oncology'),
(7, 7, 'Pediatric gastroenterology'),
(8, 8, 'Developmental and behavioral pediatrics'),
(9, 9, 'Interventional cardiology '),
(10, 10, 'Electrophysiology'),
(11, 11, 'Cardiovascular imaging'),
(12, 12, 'Heart failure and transplantation'),
(13, 13, 'Trauma surgery'),
(14, 14, 'Orthopedic trauma '),
(15, 15, 'Burn care'),
(16, 16, 'Rehabilitation medicine');

-- --------------------------------------------------------

--
-- Table structure for table `medical_staff`
--

CREATE TABLE `medical_staff` (
  `staff_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_staff`
--

INSERT INTO `medical_staff` (`staff_id`, `department_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 10),
(14, 10),
(15, 10),
(16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(0, 'Admin'),
(1, 'Doctor'),
(2, 'Client'),
(3, 'Nurse');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `username`, `address`, `phone_number`, `birth_date`, `gender`) VALUES
(1, 'Emelda', 'Vigne', 'evigne0@pinterest.com', '0QZ69HR0e', 1, 'evigne0', 'Room 962', '4492189307', '2000-06-12', 'Female'),
(2, 'Giacomo', 'Percy', 'gpercy1@netvibes.com', 'qJKI36cCu2', 1, 'gpercy1', 'Suite 52', '3047309323', '1949-05-28', 'Male'),
(3, 'Briant', 'Goodnow', 'bgoodnow2@people.com.cn', '0TrLNGxvYrN', 1, 'bgoodnow2', 'Room 143', '6151659177', '1944-08-10', 'Male'),
(4, 'Layla', 'Van', 'lvan3@state.tx.us', 'oIpsqvUkvG', 1, 'lvan3', '11th Floor', '7049318068', '1940-01-30', 'Female'),
(5, 'Alaster', 'Penwright', 'apenwright4@chron.com', 'fQajv5', 1, 'apenwright4', 'Room 827', '3619463053', '1968-06-16', 'Male'),
(6, 'Lem', 'Turban', 'lturban5@google.com.br', 'SRQVL28XbRXI', 1, 'lturban5', '16th Floor', '6841523970', '1947-01-15', 'Male'),
(7, 'Pris', 'Roizn', 'proizn6@prnewswire.com', 'ilIAiX8', 1, 'proizn6', 'Room 334', '4608897953', '1953-03-17', 'Female'),
(8, 'Delcina', 'Van Giffen', 'dvangiffen7@auda.org.au', '3ilhc8qYsCQ', 1, 'dvangiffen7', 'Suite 93', '9676790984', '1942-01-26', 'Female'),
(9, 'Hatty', 'McClifferty', 'hmcclifferty8@ebay.com', 'vEwK6NjsBqsY', 1, 'hmcclifferty8', 'Apt 1682', '9781888265', '1993-01-05', 'Female'),
(10, 'Jarid', 'Jeste', 'jjeste9@taobao.com', 'FOnePeZ38Iwz', 1, 'jjeste9', 'Room 1273', '2908695491', '1962-07-02', 'Male'),
(11, 'Wilfrid', 'Windrass', 'wwindrassa@nytimes.com', '6DJcpOf', 1, 'wwindrassa', 'Apt 1453', '8654407680', '1993-05-04', 'Male'),
(12, 'Gibb', 'Murthwaite', 'gmurthwaiteb@ow.ly', 'XQydWC4rIRN', 1, 'gmurthwaiteb', 'Suite 94', '6628967657', '1958-02-02', 'Male'),
(13, 'Zane', 'Dungate', 'zdungatec@linkedin.com', 'RGxyjYw5l', 1, 'zdungatec', '19th Floor', '4568343559', '1985-09-01', 'Male'),
(14, 'Cecilia', 'Markwell', 'cmarkwelld@amazon.com', 'htGxNxCw', 1, 'cmarkwelld', 'Suite 44', '5469283828', '1974-01-07', 'Female'),
(15, 'Myrta', 'Campany', 'mcampanye@wp.com', 'tGPOzqb', 1, 'mcampanye', '13th Floor', '6529830851', '1999-09-15', 'Female'),
(16, 'Adham', 'Boner', 'abonerf@mozilla.com', 'jAlaK8B2', 1, 'abonerf', 'Apt 602', '6253433892', '1985-06-09', 'Male'),
(18, 'Derrik', 'Cowtherd', 'dcowtherd1@nbcnews.com', 'zcU36WA27cf', 2, 'dcowtherd1', '18th Floor', '6319552897', '1941-09-12', 'Male'),
(19, 'Chrissie', 'Rois', 'crois2@canalblog.com', '2hBqbLb9NW', 2, 'crois2', 'Suite 47', '2887083611', '1973-12-30', 'Male'),
(20, 'Pren', 'Whetson', 'pwhetson3@amazon.co.jp', 'pWLEA3qjN', 2, 'pwhetson3', '14th Floor', '9736369038', '1945-04-02', 'Male'),
(21, 'Erin', 'Spelsbury', 'espelsbury4@columbia.edu', 'Iuti9nG', 2, 'espelsbury4', 'PO Box 32911', '6377153984', '1998-01-09', 'Female'),
(22, 'Skyler', 'Hainsworth', 'shainsworth5@dion.ne.jp', 'UKdwqJbuYgM', 2, 'shainsworth5', 'Room 1884', '3739113991', '1955-02-16', 'Male'),
(23, 'Marta', 'Horche', 'mhorche6@comsenz.com', 'Z4CnQl', 2, 'mhorche6', '7th Floor', '2266329784', '1944-10-27', 'Female'),
(24, 'Lew', 'Keppe', 'lkeppe7@nhs.uk', 'fyiYPKp', 2, 'lkeppe7', 'Suite 8', '2401151646', '1966-10-29', 'Male'),
(25, 'Lark', 'Manhare', 'lmanhare8@umich.edu', 'KRjpv7oSlz', 2, 'lmanhare8', 'Suite 53', '7158164432', '1954-11-22', 'Female'),
(26, 'Matty', 'Hales', 'mhales9@163.com', 'XXItf0U6cO', 2, 'mhales9', 'Apt 1737', '5826128358', '1975-09-21', 'Female'),
(27, 'Thayne', 'Stother', 'tstothera@wikipedia.org', 'PYjNr4pbN', 2, 'tstothera', '2nd Floor', '7156497334', '1945-11-24', 'Male'),
(28, 'Reta', 'Manzell', 'rmanzellb@independent.co.uk', 'GPqyysv0pP27', 2, 'rmanzellb', 'Room 94', '1418071186', '1966-09-30', 'Female'),
(29, 'Mignonne', 'Derrington', 'mderringtonc@t.co', 'Y1ZzycvLpa', 2, 'mderringtonc', 'PO Box 88220', '7073071784', '1967-05-10', 'Female'),
(30, 'Micheil', 'Calvert', 'mcalvertd@people.com.cn', 'LgtfsIvQ5N', 2, 'mcalvertd', '7th Floor', '1669634132', '1940-04-10', 'Male'),
(31, 'Imelda', 'Clougher', 'icloughere@timesonline.co.uk', 'vWpAuHnd', 2, 'icloughere', 'Suite 85', '6744878135', '1954-04-17', 'Female'),
(32, 'Ninnette', 'Goodchild', 'ngoodchildf@imdb.com', 'vsoD2lY2G', 2, 'ngoodchildf', '5th Floor', '3986107427', '1957-01-19', 'Female'),
(33, 'Alina', 'Burkman', 'aburkman0@netlog.com', 'dGm0bLVFB6Vw', 2, 'aburkman0', 'Suite 8', '8501683967', '1941-03-11', 'Female'),
(34, 'Peyter', 'Poynter', 'ppoynter1@geocities.com', 's6gxc2DM', 2, 'ppoynter1', 'Suite 8', '4845444695', '1998-10-17', 'Male'),
(35, 'Sal', 'Fairest', 'sfairest2@techcrunch.com', 'FiUj6Ga5i', 2, 'sfairest2', 'Apt 1509', '3207611254', '1996-03-29', 'Female'),
(36, 'Lyman', 'Sargent', 'lsargent3@quantcast.com', 'Yhhj2t', 2, 'lsargent3', 'PO Box 16571', '6235615191', '1968-12-29', 'Male'),
(37, 'Jack', 'Jansa', 'jjansa4@macromedia.com', 'wAdyI66LG', 2, 'jjansa4', 'PO Box 87538', '1057421741', '1995-04-01', 'Male'),
(38, 'Afton', 'Ruspine', 'aruspine5@statcounter.com', '961MobpYrg', 2, 'aruspine5', 'Room 112', '4887160020', '1951-06-17', 'Female'),
(39, 'Cristiano', 'Hasel', 'chasel6@soup.io', 'ik2wMhGbXVL', 2, 'chasel6', 'Room 1712', '1547532104', '1967-02-18', 'Male'),
(40, 'Eberto', 'Lohde', 'elohde7@unicef.org', 'OV5Z2RR', 2, 'elohde7', 'Room 1721', '5785245256', '1971-10-09', 'Male'),
(41, 'Sammie', 'Jirieck', 'sjirieck8@is.gd', '9c5AhVl2', 2, 'sjirieck8', 'Apt 1744', '1748576385', '1970-09-18', 'Male'),
(42, 'Ruben', 'Nipper', 'rnipper9@jiathis.com', 'LyqQfv', 2, 'rnipper9', '11th Floor', '1004880840', '1967-02-09', 'Male'),
(43, 'Gearalt', 'Flecknoe', 'gflecknoea@moonfruit.com', 'IDeUdlQ', 2, 'gflecknoea', '18th Floor', '1529714048', '1950-05-29', 'Male'),
(44, 'Nichol', 'Hentze', 'nhentzeb@seattletimes.com', 'yt6vYz9XBlC', 2, 'nhentzeb', '14th Floor', '2157742741', '1964-06-21', 'Female'),
(45, 'Kimmy', 'Pitsall', 'kpitsallc@yale.edu', 'sdBDUG4', 2, 'kpitsallc', 'PO Box 19896', '9289263828', '1996-04-08', 'Female'),
(46, 'Etty', 'Turpie', 'eturpied@nytimes.com', 'b3YUjn9kdAlx', 2, 'eturpied', 'Apt 1774', '3198233019', '1955-05-05', 'Female'),
(47, 'Rowe', 'Paton', 'rpatone@blogs.com', 'QkSqoMK9Kw', 2, 'rpatone', '18th Floor', '2249512199', '1965-09-25', 'Female'),
(48, 'Cullen', 'Abramski', 'cabramskif@unc.edu', 'NvqWi4RoN', 2, 'cabramskif', '10th Floor', '5757231952', '1948-07-10', 'Male'),
(49, 'Alaster', 'Ubach', 'aubach0@lulu.com', 'Uk5kZodMEiV5', 3, 'aubach0', '17th Floor', '7441121479', '1940-04-21', 'Male'),
(50, 'Esmaria', 'Aspole', 'easpole1@squidoo.com', 'HhFhOBx2dzi', 3, 'easpole1', 'PO Box 58723', '7177382963', '1977-11-06', 'Female'),
(51, 'Earlie', 'Filon', 'efilon2@go.com', '2TpYgM', 3, 'efilon2', 'Apt 1982', '4978140980', '1985-03-27', 'Male'),
(52, 'Emanuele', 'Bromilow', 'ebromilow3@nyu.edu', 'e2zMObUrj', 3, 'ebromilow3', '2nd Floor', '3901106488', '1949-11-14', 'Male'),
(53, 'Zaneta', 'Kitteman', 'zkitteman4@squarespace.com', 'wHDvWCuKN', 3, 'zkitteman4', '14th Floor', '5446912160', '1986-11-05', 'Female'),
(54, 'Margaretta', 'Christophle', 'mchristophle5@nhs.uk', 'g7pKiT6C', 3, 'mchristophle5', 'Room 1770', '2667726572', '1996-12-05', 'Female'),
(55, 'Gerty', 'Skae', 'gskae6@squarespace.com', 'mZ6wzVm77a', 3, 'gskae6', 'Room 1033', '3265911271', '1975-10-16', 'Female'),
(56, 'Alvis', 'Cabrales', 'acabrales7@ustream.tv', 'O0rIJPZFIKgE', 3, 'acabrales7', 'Suite 5', '2755710042', '1985-04-26', 'Male'),
(57, 'Bevon', 'Visick', 'bvisick8@house.gov', 'skit3bi', 3, 'bvisick8', 'Suite 71', '3406226383', '1987-03-24', 'Male'),
(58, 'Demott', 'Tharme', 'dtharme9@altervista.org', 'dnjPBeC8', 3, 'dtharme9', 'Suite 38', '2922139552', '2000-03-04', 'Male'),
(59, 'Theodora', 'Brierly', 'tbrierlya@biglobe.ne.jp', 'qunU0PYhQF9', 3, 'tbrierlya', '20th Floor', '8887479805', '1944-07-02', 'Female'),
(60, 'Mikey', 'Georgiev', 'mgeorgievb@comsenz.com', 'pEZ777GRJrUL', 3, 'mgeorgievb', 'PO Box 41118', '1528557282', '1949-08-05', 'Male'),
(61, 'Willie', 'Maseyk', 'wmaseykc@dyndns.org', 'xZr88ZHX', 3, 'wmaseykc', 'PO Box 60433', '8862392033', '1993-11-03', 'Male'),
(62, 'Abe', 'Hull', 'ahulld@privacy.gov.au', 'NZrH79R', 3, 'ahulld', 'Suite 34', '9716940867', '1962-03-30', 'Male'),
(63, 'Alida', 'Dauney', 'adauneye@biglobe.ne.jp', '9GulAbve9p', 3, 'adauneye', '19th Floor', '1806495021', '1977-06-23', 'Female'),
(64, 'Avictor', 'Blair', 'ablairf@marketwatch.com', '2rKnT5y7C', 3, 'ablairf', '20th Floor', '5617508001', '1956-05-15', 'Male'),
(65, 'Shpend', 'Aliu', 'shpendaliu@pm.me', '12', 0, 'sh', 'prishtina', '213123', '2002-11-19', 'Male'),
(66, 'shpend', 'ismaili', 'shpend.ismaili1@gmail.com', '123456', 2, 'shpend-user', 'Marsala Tito 63', '+381 623432423', '2000-02-02', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `bookings_doctor_id_fk` (`doctor_id`),
  ADD KEY `bookings_id` (`booking_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`staff_id`,`department_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_doctor_id_fk` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD CONSTRAINT `medical_staff_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `medical_staff_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`dept_id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
