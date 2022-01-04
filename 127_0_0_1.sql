-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 10:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `channels`
--
CREATE DATABASE IF NOT EXISTS `channels` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `channels`;

-- --------------------------------------------------------

--
-- Table structure for table `channel_type`
--

CREATE TABLE `channel_type` (
  `Ch_ID` int(11) NOT NULL,
  `Channel_Name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel_type`
--
ALTER TABLE `channel_type`
  ADD PRIMARY KEY (`Ch_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel_type`
--
ALTER TABLE `channel_type`
  MODIFY `Ch_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `hr`
--
CREATE DATABASE IF NOT EXISTS `hr` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hr`;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Dept_Id` int(11) NOT NULL,
  `Dept_Name` varchar(200) NOT NULL,
  `Manager_Id` int(10) DEFAULT NULL,
  `location_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Dept_Id`, `Dept_Name`, `Manager_Id`, `location_ID`) VALUES
(2, 'Customer Care', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EMP_ID` int(11) NOT NULL,
  `Manager_ID` int(11) DEFAULT NULL,
  `job_ID` int(10) NOT NULL,
  `mobile1` int(11) NOT NULL,
  `salary` int(10) NOT NULL,
  `DEPT_ID` int(10) NOT NULL,
  `User_Account` varchar(100) NOT NULL,
  `Building_No` varchar(50) NOT NULL,
  `Street` varchar(200) NOT NULL,
  `Zone` varchar(200) NOT NULL,
  `Governorate` varchar(200) NOT NULL,
  `national_id` bigint(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `Middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile2` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `Manager_ID`, `job_ID`, `mobile1`, `salary`, `DEPT_ID`, `User_Account`, `Building_No`, `Street`, `Zone`, `Governorate`, `national_id`, `first_name`, `Middle_name`, `last_name`, `mobile2`) VALUES
(7, NULL, 1, 1200000011, 60007, 2, 'agent1@localhost', '1', 'Salam', 'Maadi', 'Cairo', 12345678901233, 'a', 'fgg', 'aaa', NULL),
(48, 64, 1, 1200000010, 3600, 2, 'root@localhost', '', '', '', '', 12345678901234, 'aaaa', 'ddd', 'ssssq', 1200000008),
(51, NULL, 1, 1200000005, 0, 2, 'viewer1@%', '', '', '', '', 0, '', '', '', NULL),
(52, NULL, 1, 1240000000, 0, 2, 'root@127.0.0.1', '', '', '', '', 33, '', '', '', NULL),
(57, NULL, 1, 1000000007, 66, 2, 'pma@localhost', '', '', '', '', 22, '', '', '', NULL),
(64, NULL, 3, 1200000002, 5000, 2, 'soliman@%', '', '', '', '', 29010061702559, 'fhfh', 'fhfh', 'gvxb', NULL),
(66, NULL, 90, 1000300000, 5000, 2, 'director1@localhost', '', '', '', '', 29010061702335, 'gdg', 'gdgdg', 'ddd', NULL);

--
-- Triggers `employees`
--
DELIMITER $$
CREATE TRIGGER `in_Acc` BEFORE INSERT ON `employees` FOR EACH ROW begin 
	 if ( 
	 	(select count(*)
	 	from `security`.users u 
	 	where `account` like new.user_account)) = 0  
	 then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'User Account Did Not Create Yet!';
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_DID` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( new.DEPT_ID  =0 or new.DEPT_ID ='' or new.DEPT_ID  = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Department Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Fname` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( length (new.First_Name) = 0 or new.First_Name='' or new.First_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'First Name Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_JID` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( new.job_id =0 or new.job_id='' or new.job_id = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'job title Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Lname` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( length (new.Last_Name) = 0 or new.Last_Name='' or new.Last_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Last Name Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Mname` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( length (new.Middle_Name) = 0 or new.Middle_Name='' or new.Middle_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Middle Name Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_NID` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( length (new.National_ID) <> 14) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'National ID Must Be 14 Digit';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_empmobile2` BEFORE INSERT ON `employees` FOR EACH ROW begin 
	IF( 
	    (select count(*)
		from employees e 
		where mobile2 = new.mobile2 ) > 0 
 		)			   
	Then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='Entered Value Already Exist on Mobile2';
	Elseif
		(select count(*)
		from employees e 
		where mobile1 = new.mobile2) > 0 
	Then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='Entered Value Already Exist on Mobile1';
	Elseif 
		(length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
	Then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile2 Length Must Be 10 Digit \r\n\t\t\t\t\t\t\t\t\t\t\t\t\t   * The First Two Digit Must Be Of (10-11-12-15) ';
	Elseif  
		(length(new.mobile2) <> 10)
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	Elseif 
		(Substring(new.mobile2,1,2) not in (10,11,12,15))
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_mngrid` BEFORE INSERT ON `employees` FOR EACH ROW BEGIN 
	IF ( SELECT level 
	     FROM jobs j 
	     WHERE job_id = (select job_id from employees where emp_id = NEW.Manager_ID)) <= (select level from jobs where job_id = new.Job_ID )
    then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Managerial level';
    END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_salary` BEFORE INSERT ON `employees` FOR EACH ROW begin
	if ( new.salary =0 or new.salary='' or new.salary = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Salary Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Acc` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	 if ( 
	 (select count(*)
	 	from `security`.users u 
	 	where `account` like new.user_account)) = 0  
	 then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'User Account Did Not Create Yet!';
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_DID` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( new.DEPT_ID =0 or new.DEPT_ID='' or new.DEPT_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Department Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_JID` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( new.job_id =0 or new.job_id='' or new.job_id = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'job title Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Lname` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( length (new.Last_Name) = 0 or new.Last_Name='' or new.Middle_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Last Name Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Mname` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( length (new.Middle_Name) = 0 or new.Middle_Name='' or new.Middle_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Middle Name Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_NID` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( length (new.National_ID) <> 14 ) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'National ID Must Be 14 Digit';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_empmobile1` BEFORE UPDATE ON `employees` FOR EACH ROW begin 
	IF( 
	    (select count(*)
		from employees e 
		where mobile1 = new.mobile1 and new.mobile1 <> old.mobile1) > 0 
 		)			   
	Then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='Entered Value Already Exist on Mobile1';
	Elseif
		(select count(*)
		from employees e 
		where mobile2 = new.mobile1) > 0 
	Then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='Entered Value Already Exist on Mobile2';
	Elseif 
		(length(new.mobile1) <> 10) and (Substring(new.mobile1,1,2) not in (10,11,12,15))
	Then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile1 Length Must Be 10 Digit \r\n\t\t\t\t\t\t\t\t\t\t\t\t\t   * The First Two Digit Must Be Of (10-11-12-15) ';
	Elseif  
		(length(new.mobile1) <> 10)
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	Elseif 
		(Substring(new.mobile1,1,2) not in (10,11,12,15))
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_empmobile2` BEFORE UPDATE ON `employees` FOR EACH ROW begin 
	IF( 
	    (select count(*)
		from employees e 
		where mobile2 = new.mobile2 and new.mobile2 <> old.mobile2) > 0 
 		)			   
	Then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='Entered Value Already Exist on Mobile2';
	Elseif
		(select count(*)
		from employees e 
		where mobile1 = new.mobile2) > 0 
	Then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='Entered Value Already Exist on Mobile1';
	Elseif 
		(length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
	Then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile2 Length Must Be 10 Digit \r\n\t\t\t\t\t\t\t\t\t\t\t\t\t   * The First Two Digit Must Be Of (10-11-12-15) ';
	Elseif  
		(length(new.mobile2) <> 10)
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	Elseif 
		(Substring(new.mobile2,1,2) not in (10,11,12,15))
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_fname` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( length (new.First_Name) = 0 or new.First_Name='' or new.First_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'First Name Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_mngrid` BEFORE UPDATE ON `employees` FOR EACH ROW BEGIN 
	IF ( SELECT level 
	     FROM jobs j 
	     WHERE job_id = (select job_id from employees where emp_id = NEW.Manager_ID)) <= (select level from jobs where job_id = old.Job_ID )
    then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Managerial level';
    END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_salary` BEFORE UPDATE ON `employees` FOR EACH ROW begin
	if ( new.salary =0 or new.salary='' or new.salary = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Salary Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Job_ID` int(11) NOT NULL,
  `Job_Title` varchar(200) NOT NULL,
  `Job_Desc` varchar(200) NOT NULL,
  `Level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Job_Title`, `Job_Desc`, `Level`) VALUES
(1, 'Agent', '', 1),
(2, 'Team Leader', '', 2),
(3, 'Supervisor', '', 3),
(4, 'Section Head', '', 4),
(90, 'Director', '', 5),
(100, 'Owner', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `Location_ID` int(10) NOT NULL,
  `Street` varchar(200) NOT NULL,
  `Zone` varchar(200) NOT NULL,
  `Governorate` varchar(200) NOT NULL,
  `State` varchar(200) NOT NULL,
  `zip_Code` varchar(200) NOT NULL,
  `Building_No` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Dept_Id`),
  ADD KEY `Dept_mngr_FK` (`Manager_Id`),
  ADD KEY `loc_FK` (`location_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD UNIQUE KEY `user_UQ` (`User_Account`),
  ADD UNIQUE KEY `national_id` (`national_id`),
  ADD KEY `Mngr_FK` (`Manager_ID`),
  ADD KEY `EmpDept_FK` (`DEPT_ID`),
  ADD KEY `job_FK` (`job_ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Job_ID`),
  ADD UNIQUE KEY `Job_Title` (`Job_Title`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`Location_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Dept_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `Location_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `Dept_mngr_FK` FOREIGN KEY (`Manager_Id`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `loc_FK` FOREIGN KEY (`location_ID`) REFERENCES `locations` (`Location_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `EmpDept_FK` FOREIGN KEY (`DEPT_ID`) REFERENCES `departments` (`Dept_Id`),
  ADD CONSTRAINT `Mngr_FK` FOREIGN KEY (`Manager_ID`) REFERENCES `employees` (`EMP_ID`),
  ADD CONSTRAINT `job_FK` FOREIGN KEY (`job_ID`) REFERENCES `jobs` (`Job_ID`);
--
-- Database: `import_csv`
--
CREATE DATABASE IF NOT EXISTS `import_csv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `import_csv`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` int(8) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `userName`, `password`, `firstName`, `lastName`) VALUES
(1, 1, 'kevin_tom', 'kevin', 'Kevin', 'Thomas'),
(2, 2, 'vincy', 'vincy', 'Vincy', 'Jone'),
(3, 3, 'tim_lee', 'tim', 'Tim', 'Lee'),
(4, 4, 'jane', 'jane', 'Jane', 'Ferro'),
(5, 1, 'kevin_tom', 'kevin', 'Kevin', 'Thomas'),
(6, 2, 'vincy', 'vincy', 'Vincy', 'Jone'),
(7, 3, 'tim_lee', 'tim', 'Tim', 'Lee'),
(8, 4, 'jane', 'jane', 'Jane', 'Ferro'),
(9, 1, 'kevin_tom', 'kevin', 'Kevin', 'Thomas'),
(10, 2, 'vincy', 'vincy', 'Vincy', 'Jone'),
(11, 3, 'tim_lee', 'tim', 'Tim', 'Lee'),
(12, 4, 'jane', 'jane', 'Jane', 'Ferro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Database: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `Activity_ID` int(11) NOT NULL,
  `Unit_ID` varchar(50) NOT NULL,
  `CST_NID` bigint(50) NOT NULL,
  `Seller_Account` varchar(100) NOT NULL,
  `Seller_Assistant_ID` int(11) DEFAULT NULL,
  `Direct_Manager_ID` int(10) NOT NULL,
  `Manager_Assistant_ID` int(11) DEFAULT NULL,
  `Section_Head_ID` int(11) NOT NULL,
  `Sale_Type_ID` int(11) NOT NULL,
  `Broker_ID` int(11) DEFAULT NULL,
  `Signed_Contract` int(11) NOT NULL,
  `Submitted_Cheques` int(11) NOT NULL,
  `Filled_Claim` int(11) NOT NULL,
  `Requested_Garage` int(10) NOT NULL,
  `Garage_Price` decimal(14,0) NOT NULL DEFAULT 0,
  `Total_Price_After_Interest` decimal(14,0) NOT NULL,
  `Payment_Type_ID` int(11) DEFAULT NULL,
  `Refunded` int(11) DEFAULT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Last_Update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `Creator_Manager` int(11) NOT NULL,
  `Comment` varchar(250) DEFAULT NULL,
  `Maintenance_Fees_PCT` decimal(2,2) NOT NULL,
  `Installment_Years` int(11) DEFAULT NULL,
  `Down_Payment_PCT` decimal(2,2) DEFAULT 0.00,
  `Receiving_Payment_PCT` decimal(2,2) DEFAULT 0.00,
  `Remaining_Amount` decimal(20,0) DEFAULT 0,
  `Down_Payment_Amount` decimal(20,0) DEFAULT 0,
  `Receiving_Payment_Amount` decimal(20,0) DEFAULT 0,
  `Annual_Payment_PCT` decimal(2,2) DEFAULT 0.00,
  `Annual_Payment_Amount` decimal(20,0) DEFAULT 0,
  `Annual_With_Rate` decimal(20,0) DEFAULT 0,
  `Installment_Discount_PCT` decimal(2,2) DEFAULT 0.00,
  `Other_Discount_PCT` decimal(2,2) DEFAULT 0.00,
  `Interest_PCT` decimal(2,2) DEFAULT 0.00,
  `Interest_Amount` decimal(2,2) DEFAULT 0.00,
  `Down_Payment_Amount_After_Interest` decimal(20,0) DEFAULT 0,
  `Receiving_Payment_Amount_After_Interest` decimal(20,0) DEFAULT 0,
  `Installment_Amount` decimal(20,0) DEFAULT 0,
  `Meter_Price_After_Interest` decimal(20,0) DEFAULT NULL,
  `Annual_Pamyment` decimal(20,0) DEFAULT NULL,
  `Building` varchar(20) NOT NULL,
  `Area` int(10) NOT NULL,
  `Basic_Meter_Price` int(10) NOT NULL,
  `Meter_Price_With_Discount` int(10) NOT NULL,
  `Usfurct_Area` int(10) NOT NULL,
  `Usfurct_Meter_Price` int(10) NOT NULL,
  `Unit_Basic_Price` decimal(20,0) NOT NULL,
  `Main_Garage_ID` int(10) DEFAULT NULL,
  `Ceded_Garage_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activity status`
--

CREATE TABLE `activity status` (
  `ID` int(10) NOT NULL,
  `Name` varchar(2) NOT NULL,
  `Colour` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `approval status`
--

CREATE TABLE `approval status` (
  `ID` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval status`
--

INSERT INTO `approval status` (`ID`, `Status`) VALUES
(1, 'Pending Approval'),
(2, 'Rejected'),
(3, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `attachements`
--

CREATE TABLE `attachements` (
  `ID` int(11) NOT NULL,
  `Unit ID` varchar(250) NOT NULL,
  `File Name` varchar(250) NOT NULL,
  `File Location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachements`
--

INSERT INTO `attachements` (`ID`, `Unit ID`, `File Name`, `File Location`) VALUES
(17, '1-1-41', 'Layout With dimensions', 'units/a11de1a30c06f8b40de44a4943306462.png'),
(18, '1-1-41', 'Layout Without dimensions', 'units/0972ae533f947c2d80d5a06505e284ae.jpg'),
(19, '1-1-41', 'Parking', 'units/067484add3d9ddf333f0d5f8cb643391.jpg'),
(20, '1-1-41', 'Layout With dimensions', 'n'),
(21, '1-1-41', 'Layout Without dimensions', 'n'),
(22, '1-1-41', 'Parking', 'n'),
(23, '1-1-41', 'Model', 'units/4e5b1d3f4e915c5d03888743d721f3ad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `basic prices`
--

CREATE TABLE `basic prices` (
  `ID` int(11) NOT NULL,
  `Basic Meter Price` decimal(14,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic prices`
--

INSERT INTO `basic prices` (`ID`, `Basic Meter Price`) VALUES
(4, '9500'),
(5, '9880'),
(6, '10165'),
(7, '10450');

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Mobile1` int(10) NOT NULL,
  `Mobile2` int(10) NOT NULL,
  `Rep` varchar(100) DEFAULT NULL,
  `Type` int(10) NOT NULL,
  `Insertion Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Added By` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`ID`, `Name`, `Mobile1`, `Mobile2`, `Rep`, `Type`, `Insertion Date`, `Added By`) VALUES
(2, 'sss', 1234567890, 1234567890, NULL, 2, '2021-11-21 17:55:24', 'root@localhost');

--
-- Triggers `brokers`
--
DELIMITER $$
CREATE TRIGGER `in_BroMobile1` BEFORE INSERT ON `brokers` FOR EACH ROW begin 
	if (length(new.mobile1) <> 10) and (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile1 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile1) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	elseif (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_BroMobile2` BEFORE INSERT ON `brokers` FOR EACH ROW begin 
	if (length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile2 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile2) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	elseif (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_brocreator` BEFORE INSERT ON `brokers` FOR EACH ROW begin 
	set new.added_by = user();
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_broker` BEFORE INSERT ON `brokers` FOR EACH ROW begin 
	if (new.broker_name='' or new.broker_name = null )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Broker Name Must Not Be Null!';
	elseif(select count(*) from brokers where Broker_Name like new.broker_name) > 0 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Broker Name Already Exist!';
 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_brotype` BEFORE INSERT ON `brokers` FOR EACH ROW begin 
	if (new.broker_type='' or new.broker_type = null )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Broker Type Must Not Be Null!';
 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_BroMobile1` BEFORE UPDATE ON `brokers` FOR EACH ROW begin 
	if (length(new.mobile1) <> 10) and (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile1 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile1) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	elseif (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_BroMobile2` BEFORE UPDATE ON `brokers` FOR EACH ROW begin 
	if (length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile2 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile2) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	elseif (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_broker` BEFORE UPDATE ON `brokers` FOR EACH ROW begin 
	if (new.broker_name='' or new.broker_name = null )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Broker Name Must Not Be Null!';
	elseif(select count(*) from brokers where Broker_Name like new.broker_name) > 0 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Broker Name Already Exist!';
 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_brotype` BEFORE UPDATE ON `brokers` FOR EACH ROW begin 
	if (new.broker_type='' or new.broker_type = null )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Broker Type Must Not Be Null!';
 end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `broker type`
--

CREATE TABLE `broker type` (
  `ID` int(10) NOT NULL,
  `Broker_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broker type`
--

INSERT INTO `broker type` (`ID`, `Broker_Type`) VALUES
(1, 'Individual'),
(2, 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `ceded_garage`
--

CREATE TABLE `ceded_garage` (
  `id` int(10) NOT NULL,
  `File Location` varchar(250) NOT NULL,
  `File Name` varchar(250) NOT NULL,
  `Unit ID` varchar(20) NOT NULL,
  `Status` varchar(50) DEFAULT 'Available',
  `Reserved For Unit` varchar(50) DEFAULT NULL,
  `Updated On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(50) NOT NULL,
  `National ID` bigint(50) NOT NULL,
  `Mobile1` int(10) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Middle Name` varchar(50) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `ch_id` int(10) DEFAULT NULL,
  `nationality` varchar(100) NOT NULL,
  `Job Title` varchar(100) NOT NULL,
  `Employer` varchar(100) NOT NULL,
  `National ID Issue Date` date NOT NULL,
  `National ID Valid To` date NOT NULL,
  `Building No` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `zone` varchar(30) NOT NULL,
  `governorate` varchar(30) NOT NULL,
  `Mobile 2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `First Name`, `National ID`, `Mobile1`, `Email`, `Middle Name`, `Last Name`, `ch_id`, `nationality`, `Job Title`, `Employer`, `National ID Issue Date`, `National ID Valid To`, `Building No`, `street`, `zone`, `governorate`, `Mobile 2`) VALUES
(3, 'Malak', 12345678912345, 1127993387, 'malak_hossam@gmail.com', 'Hossam', 'Hossam', NULL, '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0),
(5, 'a', 12345678912356, 1000000000, 'G@', '', '', NULL, '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', 0);

--
-- Triggers `clients`
--
DELIMITER $$
CREATE TRIGGER `in_CSTBuilding` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.Building_No='' or new.Building_No = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Building Number Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_CSTStreet` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.street='' or new.street = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Street Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_CSTjob` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.job_title='' or new.job_title = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Job Title Must Not Be Empty';
	elseif (select ascii(new.job_title ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Job Title';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Employer` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.Employer='' or new.Employer = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Employer Must Not Be Empty';
	elseif (select ascii(new.Employer ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Employer Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Fname` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.first_name='' or new.first_name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'First Name Must Not Be Empty';
	elseif (select ascii(new.first_name ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong First Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_IDIssueDate` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.NationalID_IssueDate='' or new.NationalID_IssueDate = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Issue Date" Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_IDValidTo` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.NationalID_ValidTo='' or new.NationalID_ValidTo = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Valid To" Must Not Be Empty';
	elseif (new.NationalID_ValidTo <= new.NationalID_IssueDate) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Valid To" Must Be Later Than Issue Date';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_cstgov` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.governorate='' or new.governorate = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Governorate Must Not Be Empty';
	elseif (select ascii(new.governorate ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Governorate Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_cstlname` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.last_name='' or new.last_name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'last Name Must Not Be Empty';
	elseif (select ascii(new.last_name ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Last Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_cstmname` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.Middle_Name='' or new.Middle_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Middle Name Must Not Be Empty';
	elseif (select ascii(new.Middle_Name ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Middle Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_cstzone` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.zone='' or new.zone = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Zone Must Not Be Empty';
	elseif (select ascii(new.zone ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Zone Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_mobile1_CST` BEFORE INSERT ON `clients` FOR EACH ROW begin 
	if (length(new.mobile1) <> 10) and (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile1 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile1) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	elseif (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_mobile2_CST` BEFORE INSERT ON `clients` FOR EACH ROW begin 
	if (length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile2 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile2) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	elseif (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_nationality` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.nationality='' or new.nationality = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Nationality Must Not Be Empty';
	elseif (select ascii(new.nationality ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Nationality Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_nid_Client` BEFORE INSERT ON `clients` FOR EACH ROW begin
	if ( new.national_id='' or new.national_id = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'National ID Must Not Be Empty';
	elseif ( length (new.National_ID) <> 14) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'National ID Must Be 14 Digit';
	elseif(
		select count(*)
		from clients e 
		where national_id = new.national_id) > 0 
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='National ID Already Exist';

 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_CSTBuilding` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.Building_No='' or new.Building_No = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Building Number Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_CSTStreet` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.street='' or new.street = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Street Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_CSTjob` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.job_title='' or new.job_title = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Job Title Must Not Be Empty';
	elseif (select ascii(new.job_title ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Job Title';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Employer` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.Employer='' or new.Employer = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Employer Must Not Be Empty';
	elseif (select ascii(new.Employer ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Employer Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_IDIssueDate` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.NationalID_IssueDate='' or new.NationalID_IssueDate = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Issue Date" Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_IDValidTo` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.NationalID_ValidTo='' or new.NationalID_ValidTo = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Valid To" Must Not Be Empty';
	elseif (new.NationalID_ValidTo <= new.NationalID_IssueDate) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Valid To" Must Be Later Than Issue Date';
	elseif (new.NationalID_ValidTo <= old.NationalID_IssueDate) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = '"National ID Valid To" Must Be Later Than Issue Date';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_cstgov` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.governorate='' or new.governorate = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Governorate Must Not Be Empty';
	elseif (select ascii(new.governorate ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Governorate Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_cstlname` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.last_name='' or new.last_name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'last Name Must Not Be Empty';
	elseif (select ascii(new.last_name ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Last Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_cstmname` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.Middle_Name='' or new.Middle_Name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Middle Name Must Not Be Empty';
	elseif (select ascii(new.Middle_Name ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Middle Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_cstzone` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.zone='' or new.zone = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Zone Must Not Be Empty';
	elseif (select ascii(new.zone ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Zone Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_fname` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.first_name='' or new.first_name = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'First Name Must Not Be Empty';
	elseif (select ascii(new.first_name ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong First Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_mobile1_CST` BEFORE UPDATE ON `clients` FOR EACH ROW begin 
	if (length(new.mobile1) <> 10) and (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile1 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile1) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	elseif (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_mobile2_CST` BEFORE UPDATE ON `clients` FOR EACH ROW begin 
	if (length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='* The Mobile2 Length Must Be 10 Digit \r\n\t\t\t* The First Two Digit Must Be Of (10-11-12-15) ';
	elseif  (length(new.mobile2) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	elseif (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_nationality` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.nationality='' or new.nationality = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Nationality Must Not Be Empty';
	elseif (select ascii(new.nationality ) between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Nationality Name';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_nid_Client` BEFORE UPDATE ON `clients` FOR EACH ROW begin
	if ( new.national_id='' or new.national_id = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'National ID Must Not Be Empty';
	elseif ( length (new.National_ID) <> 14) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'National ID Must Be 14 Digit';
	elseif(
		select count(*)
		from clients e 
		where national_id = new.national_id) > 0 
	then 
		SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='National ID Already Exist';
 end if;
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Rep` varchar(200) NOT NULL,
  `Mobile1` int(10) NOT NULL,
  `Insertion Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Added By` varchar(200) NOT NULL,
  `Mobile2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`ID`, `Name`, `Rep`, `Mobile1`, `Insertion Date`, `Added By`, `Mobile2`) VALUES
(2, 'procdure', 'Ahmed', 1234565555, '2021-11-05 15:36:58', 'root@localhost', 1234567890),
(3, 'Pro', 'asdf', 1234567890, '2021-11-27 13:04:43', 'root@localhost', 1211111111),
(5, 'komaja', 'maged Ali', 1234567890, '2021-11-30 22:09:51', 'root@localhost', 1256789090),
(8, 'Madkooooor', 'Komaja', 1093001070, '2021-11-30 23:24:04', 'root@10.144.42.108', 1020304040),
(11, 'Shaker Company', 'tamer Alaa', 1065301079, '2021-12-01 01:45:00', 'root@10.144.42.108', 1065301079),
(14, 'Emaar', 'Said Ali', 1234567890, '2021-12-01 16:23:19', 'root@10.144.42.108', 1234567890),
(15, 'Talabat', 'Ahmad Abdullah', 1234567890, '2021-12-01 16:27:22', 'root@10.144.42.108', 1234567890),
(16, 'AAAA', 'Muhammad Abdullah', 1234567890, '2021-12-01 16:29:26', 'root@10.144.42.108', 1234567890),
(17, 'LLL C Company', 'Ahmad Mahrous', 1234567890, '2021-12-01 17:05:43', 'root@10.144.42.108', 1192003020),
(18, 'MK', 'Ali Ali', 1234567890, '2021-12-01 17:06:25', 'root@10.144.42.108', 1234567890),
(19, 'fatee', 'Moustafa Sarhaan', 1156789023, '2021-12-01 17:10:18', 'root@10.144.42.108', 1245678902),
(23, 'asdfg', 'qwert', 1234567890, '2021-12-04 03:23:52', 'root@localhost', 1234567890),
(27, 'qwertyuio', 'qwertyui', 1093001010, '2022-01-03 20:57:33', 'root@localhost', 1192003020);

--
-- Triggers `developers`
--
DELIMITER $$
CREATE TRIGGER `in_dev` BEFORE INSERT ON `developers` FOR EACH ROW begin 
	if (new.Name ='' or new.Name  = null )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Developer Name Must Not Be Null!';
	elseif(select count(*) from developers where Name  like new.Name ) > 0 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Developer Name Already Exist!';
 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_devMobile1` BEFORE INSERT ON `developers` FOR EACH ROW begin 
	if (length(new.mobile1) <> 10) and (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='1-The Mobile1 Length Must Be 10 Digit. 2-The First Two Digit Must Be Of (10-11-12-15).';
	elseif  (length(new.mobile1) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	elseif (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15).';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_devMobile2` BEFORE INSERT ON `developers` FOR EACH ROW begin 
	if (length(new.mobile2) <> 10) and (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='1-The Mobile2 Length Must Be 10 Digit. 2-The First Two Digit Must Be Of (10-11-12-15). ';
	elseif  (length(new.mobile2) <> 10)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	elseif (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_devcreator` BEFORE INSERT ON `developers` FOR EACH ROW begin 
	set new.`added by` = user();
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_rep` BEFORE INSERT ON `developers` FOR EACH ROW begin 
	if(new.rep = '' or new.rep is null)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Developer Representative Must Not Be Null';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_dev` BEFORE UPDATE ON `developers` FOR EACH ROW begin 
	if (new.Name ='' or new.Name  = null )
	then set new.name = old.name;
	elseif(select count(*) from developers where Name  = new.Name and new.name <> old.name ) > 0 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Developer Name Already Exist!';
 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_devMobile1` BEFORE UPDATE ON `developers` FOR EACH ROW begin 
	if(new.mobile1 = 0 or new.mobile1='')
	then 
		set new.mobile1=old.mobile1;
	elseif (length(new.mobile1) <> 10 and Substring(new.mobile1,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='1-The Mobile1 Length Must Be 10 Digit. 2-The First Two Digit Must Be Of (10-11-12-15).'; 
	elseif  (length(new.mobile1) <> 10 )
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile1 Length Must Be 10 Digit';
	elseif (Substring(new.mobile1,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile1 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_devMobile2` BEFORE UPDATE ON `developers` FOR EACH ROW begin 
	if(new.mobile2 = 0 or new.mobile2='')
	then 
		set new.mobile2=old.mobile2;
	elseif (length(new.mobile2) <> 10 and Substring(new.mobile2,1,2) not in (10,11,12,15))
		then 
			SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT ='1-The Mobile2 Length Must Be 10 Digit. 2-The First Two Digit Must Be Of (10-11-12-15).'; 
	elseif  (length(new.mobile2) <> 10 )
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The Mobile2 Length Must Be 10 Digit';
	elseif (Substring(new.mobile2,1,2) not in (10,11,12,15))
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'The First Two Digit of Mobile2 Must Be Of (10-11-12-15)';
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_rep` BEFORE UPDATE ON `developers` FOR EACH ROW begin 
	if(new.rep='')
	then 
		set new.rep=old.rep;
	END IF;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `finishing level`
--

CREATE TABLE `finishing level` (
  `ID` int(10) NOT NULL,
  `Level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishing level`
--

INSERT INTO `finishing level` (`ID`, `Level`) VALUES
(1, 'super');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`ID`, `Name`) VALUES
(3, 'عربى'),
(4, 'Ø§Ù„Ø§ÙˆÙ„'),
(5, 'Ø§Ù„Ø«Ø§Ù„Ø«'),
(6, 'Ø§Ù„Ø«Ø§Ù†ÙŠ'),
(7, 'Ø§Ù„Ø®Ø§Ù…Ø³ + Ø§Ù„Ø±ÙˆÙˆÙ�'),
(8, 'Ø§Ù„Ø±Ø§Ø¨Ø¹'),
(9, 'Ø§Ù„Ø±Ø§Ø¨Ø¹ + Ø§Ù„Ø±ÙˆÙˆÙ�'),
(10, 'Ø¯ÙˆØ¨Ù„ÙƒØ³'),
(11, 'Ø¯ÙˆØ¨Ù„ÙƒØ³ Ø§Ù„Ø£Ø±Ø¶ÙŠ');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `id` int(10) NOT NULL,
  `File Location` varchar(250) NOT NULL,
  `File Name` varchar(250) NOT NULL,
  `Unit ID` varchar(20) NOT NULL,
  `Status` varchar(50) DEFAULT 'Available',
  `Reserved For Unit` varchar(50) DEFAULT NULL,
  `Updated On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`id`, `File Location`, `File Name`, `Unit ID`, `Status`, `Reserved For Unit`, `Updated On`) VALUES
(5, '', '', '', 'cededdd', NULL, '2021-12-17 23:25:02'),
(7, '', '', '', 'Reserved', NULL, '2021-12-17 23:23:48');

--
-- Triggers `garage`
--
DELIMITER $$
CREATE TRIGGER `Ceded_Garage` AFTER INSERT ON `garage` FOR EACH ROW begin 
	IF
    	( new.status = 'Ceded')
    then 
    	INSERT into Ceded_Garage
    	( id, File_Location , File_Name , Unit_ID , status , Reserved_For_Unit )
	VALUES
        ( new.ID , new.File_Location , new.File_Name , new.Unit_ID , new.status , new.Reserved_For_Unit  );
	End IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_ceded` AFTER DELETE ON `garage` FOR EACH ROW begin 
    delete from ceded_garage
	where id = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_reseved` AFTER UPDATE ON `garage` FOR EACH ROW begin 
	DELETE from ceded_garage
    where id in ( select id from garage where status <> 'Ceded');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_ceded_Garage` AFTER UPDATE ON `garage` FOR EACH ROW begin 
	if new.status='Ceded'
	then 
		insert into ceded_garage (id, File_Location, File_Name, Unit_ID, status, Reserved_For_Unit)
		values(old.id, old.File_Location, old.File_Name, old.Unit_ID, new.status, old.Reserved_For_Unit);
End IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `garage_type`
--

CREATE TABLE `garage_type` (
  `ID` int(10) NOT NULL,
  `Type Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garage_type`
--

INSERT INTO `garage_type` (`ID`, `Type Name`) VALUES
(1, 'No'),
(2, 'Main'),
(3, 'Ceded');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ID` int(11) NOT NULL,
  `Unit ID` varchar(250) NOT NULL,
  `File Name` varchar(250) NOT NULL,
  `File Location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `installments plan`
--

CREATE TABLE `installments plan` (
  `ID` int(10) NOT NULL,
  `Years` int(10) NOT NULL,
  `interest` decimal(5,5) NOT NULL,
  `discount` decimal(5,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `installments plan`
--

INSERT INTO `installments plan` (`ID`, `Years`, `interest`, `discount`) VALUES
(1, 1, '0.00000', '0.15000'),
(2, 2, '0.00000', '0.12500'),
(3, 3, '0.00000', '0.10000'),
(5, 4, '0.00000', '0.07500'),
(6, 5, '0.00000', '0.05000'),
(7, 6, '0.00000', '0.02500'),
(8, 7, '0.00000', '0.00000'),
(9, 8, '0.09750', '0.00000'),
(10, 9, '0.14625', '0.00000'),
(11, 10, '0.19500', '0.00000'),
(12, 11, '0.24437', '0.00000'),
(13, 12, '0.29250', '0.00000');

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `ID` int(11) NOT NULL,
  `File Location` varchar(250) DEFAULT NULL,
  `File Name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layout dimension`
--

CREATE TABLE `layout dimension` (
  `ID` int(11) NOT NULL,
  `File Location` varchar(250) DEFAULT NULL,
  `File Name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lkp_tables`
--

CREATE TABLE `lkp_tables` (
  `ID` int(10) NOT NULL,
  `Table Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lkp_tables`
--

INSERT INTO `lkp_tables` (`ID`, `Table Name`) VALUES
(1, 'approval status'),
(2, 'basic prices'),
(3, 'broker type'),
(4, 'finishing level'),
(5, 'floor'),
(6, 'garage'),
(7, 'payment type'),
(8, 'raw type'),
(9, 'requested'),
(10, 'rooms'),
(11, 'sale type'),
(12, 'session timeout'),
(13, 'unit status'),
(14, 'unit position'),
(15, 'usufruct prices'),
(16, 'usufruct type'),
(23, 'activity status'),
(24, 'Installments Plan');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `ID` int(11) NOT NULL,
  `File Location` varchar(250) DEFAULT NULL,
  `File Name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment type`
--

CREATE TABLE `payment type` (
  `ID` int(11) NOT NULL,
  `Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment type`
--

INSERT INTO `payment type` (`ID`, `Type`) VALUES
(1, 'Installment '),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Insertion date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Added By` varchar(255) NOT NULL,
  `DevID` int(11) NOT NULL,
  `Maintenance pct` decimal(2,2) NOT NULL,
  `location` varchar(50) NOT NULL,
  `Location On Map` varchar(900) DEFAULT NULL,
  `Updated On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `Name`, `Insertion date`, `Added By`, `DevID`, `Maintenance pct`, `location`, `Location On Map`, `Updated On`) VALUES
(20, 'testing', '2021-11-17 16:54:11', 'root@localhost', 2, '0.01', '	Dakahlia', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-09 15:24:07'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '0.13', 'Giza', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-03 19:16:13'),
(23, 'CRM', '2021-12-03 18:38:01', 'root@localhost', 14, '0.10', 'Giza', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-03 22:51:05'),
(24, 'CRM2', '2021-12-03 18:38:19', 'root@localhost', 14, '0.10', 'Giza', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-03 22:51:32'),
(25, 'CRM3', '2021-12-03 18:38:26', 'root@localhost', 14, '0.10', 'Giza', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-03 22:51:25'),
(27, 'CRM5', '2021-12-03 18:38:39', 'root@localhost', 14, '0.10', 'Giza', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-03 22:51:17'),
(28, 'CRM6', '2021-12-03 18:38:47', 'root@localhost', 14, '0.10', 'Giza', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2021-12-03 22:51:12'),
(29, 'Test Pro', '2021-12-03 22:52:44', 'root@localhost', 14, '0.13', 'Giza', NULL, '2021-12-03 22:52:44'),
(34, 'Test Pro 2', '2021-12-03 23:30:52', 'root@localhost', 14, '0.02', 'Kafr El Sheikh', NULL, '2021-12-04 03:05:32'),
(35, 'Ahmed', '2021-12-04 00:46:59', 'root@localhost', 18, '0.02', 'Faiyum', NULL, '2021-12-04 03:05:38'),
(37, 'asd', '2021-12-04 00:52:20', 'root@localhost', 19, '0.02', 'Kafr El Sheikh', NULL, '2021-12-04 03:05:44'),
(38, '12345', '2021-12-04 00:53:04', 'root@localhost', 11, '0.03', 'Dakahlia', NULL, '2021-12-04 03:10:26'),
(41, 'AliMag', '2021-12-04 01:08:52', 'root@localhost', 3, '0.03', '		Minya', 'asdf', '2021-12-04 01:19:22'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '0.99', '		Alexandria', '', '2021-12-04 03:05:00'),
(44, 'Mad Man', '2021-12-04 02:23:05', 'root@localhost', 8, '0.02', 'Gharbia', '', '2021-12-04 03:11:37'),
(49, 'kom pro', '2022-01-03 20:45:23', 'komaja@%', 16, '0.02', 'Minya', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2022-01-03 20:45:23'),
(50, 'kom pro2', '2022-01-03 20:56:59', 'komaja@%', 16, '0.03', 'Asyut', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2022-01-03 20:56:59'),
(51, 'yui', '2022-01-03 21:43:05', 'komaja@%', 16, '0.19', 'Giza', NULL, '2022-01-03 21:43:05'),
(55, 'kom pro3', '2022-01-03 21:41:19', 'root@localhost', 15, '0.15', 'Cairo', 'https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d3452.871116518979!2d31.02176968555603!3d30.069228624357784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e6!4m4!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!3m2!1d30.069162199999997!2d31.019503!4m5!1s0x14585b97d6655077%3A0xe5d07dd7b931a729!2z2YXYs9is2K8g2KfZhNmC2LHZitipINin2YTYsNmD2YrYqdiMINi32LHZitmCINin2YTZgtin2YfYsdipIC0g2KfZhNil2LPZg9mG2K_YsdmK2Kkg2KfZhNi12K3Ysdin2YjZitiMINin2YTYuNmH2YrYsSDYp9mE2LXYrdix2KfZiNmJINmE2YXYrdin2YHYuNipINin2YTYrNmK2LLYqdiMINin2YTYrNmK2LLYqQ!3m2!1d30.069162199999997!2d31.019503!5e0!3m2!1sar!2seg!4v1638558385313!5m2!1sar!2seg', '2022-01-03 21:41:19');

--
-- Triggers `projects`
--
DELIMITER $$
CREATE TRIGGER `in_ProName` BEFORE INSERT ON `projects` FOR EACH ROW begin 
	if (new.Name ='' or new.Name = null)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Project Name Must Not Be Empty';		
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_loc` BEFORE INSERT ON `projects` FOR EACH ROW begin 
	if (new.location ='' or new.location = null)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'location Must Not Be Empty';		
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_mainpct` BEFORE INSERT ON `projects` FOR EACH ROW begin 
	if (new.`maintenance pct` ='' or new.`maintenance pct` = null)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Maintenance Percentage Must Not Be Empty';	
	elseif (new.`maintenance pct` >= 0.2)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Maintenance Percentage Must Be Less Than 0.2';	
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_oldproject` BEFORE UPDATE ON `projects` FOR EACH ROW begin 
	declare 
	Archive_Date Timestamp ; 
    set Archive_Date = NOW();
	insert into logs.projects_logs
	(
ProID,
ProName,
Insertion_date,
Added_By,
DevID,
Archive_Date
)
    values ( 
    old.ID,
old.Name,
old.`Insertion date`,
old.`Added By`,
old.DevID,
Archive_Date
); 
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `new_project` BEFORE INSERT ON `projects` FOR EACH ROW set new.`added by` = current_user()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_DevID` BEFORE UPDATE ON `projects` FOR EACH ROW begin
	if ( new.Devid =0 ) 
	then set new.Devid = old.devid;
	end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Location_onMap` BEFORE UPDATE ON `projects` FOR EACH ROW begin
	if ( new.`Location on Map` ='' or new.`Location on Map` = null) 
	then set new.`Location on Map` = old.`Location on Map`;
	end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_ProName` BEFORE UPDATE ON `projects` FOR EACH ROW begin
	if ( new.Name ='' or new.Name = null) 
	then set new.Name = old.Name;
	end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_loc` BEFORE UPDATE ON `projects` FOR EACH ROW begin 
	if (new.location ='' or new.location = null)
		then set new.location = old.location;		
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_mainpct` BEFORE UPDATE ON `projects` FOR EACH ROW begin 
	if (new.`maintenance pct` = 0)
		then set new.`maintenance pct` = old.`maintenance pct`;
	elseif (  new.`maintenance pct` >= 0 and new.`maintenance pct` >= 0.2)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Maintenance Percentage Must Be Less Than 0.2';			
	END IF;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_umainpct_p` AFTER UPDATE ON `projects` FOR EACH ROW begin
	update units 
	set maintenance_pct = new.`maintenance pct`
	where project_id = new.id
and status_id not in (1,9);
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `raw type`
--

CREATE TABLE `raw type` (
  `ID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw type`
--

INSERT INTO `raw type` (`ID`, `Type`) VALUES
(3, 'A'),
(4, 'B12'),
(5, 'B2'),
(6, 'B3'),
(7, 'B4'),
(8, 'D&F'),
(9, 'Du-A'),
(11, 'Du-C'),
(12, 'Du-D'),
(14, 'E1'),
(15, 'E2');

-- --------------------------------------------------------

--
-- Table structure for table `requested`
--

CREATE TABLE `requested` (
  `ID` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested`
--

INSERT INTO `requested` (`ID`, `Type`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(10) NOT NULL,
  `Count` int(10) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Count`, `Description`) VALUES
(1, 4, '1b 2c 1b'),
(2, 4, '3b 1c'),
(3, 3, '1b 2s'),
(4, 5, '2b 2s 1h');

-- --------------------------------------------------------

--
-- Table structure for table `sale type`
--

CREATE TABLE `sale type` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale type`
--

INSERT INTO `sale type` (`ID`, `Name`) VALUES
(1, 'Direct'),
(2, 'Indirect');

-- --------------------------------------------------------

--
-- Table structure for table `session timeout`
--

CREATE TABLE `session timeout` (
  `ID` int(10) NOT NULL,
  `Minutes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session timeout`
--

INSERT INTO `session timeout` (`ID`, `Minutes`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit position`
--

CREATE TABLE `unit position` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit position`
--

INSERT INTO `unit position` (`ID`, `Name`) VALUES
(3, 'Ø§Ù…Ø§Ù…ÙŠ'),
(4, 'Ø®Ù„Ù�ÙŠ');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `Unit_ID` varchar(200) NOT NULL,
  `Unit_No` varchar(20) NOT NULL,
  `Build_No` varchar(20) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `Raw_ID` int(11) NOT NULL,
  `Pos_ID` int(11) NOT NULL,
  `Unit_Area` decimal(14,0) NOT NULL,
  `Basic_Meter_Price` int(10) DEFAULT NULL,
  `Unit_Basic_Price` decimal(14,0) NOT NULL,
  `Roof_Area` int(11) DEFAULT NULL,
  `Garden_Area` int(11) DEFAULT NULL,
  `Open_terrace_Area` int(11) DEFAULT NULL,
  `Usufruct_type` int(11) DEFAULT NULL,
  `usufruct_meter_price` int(11) DEFAULT NULL,
  `Usufruct_Price` int(11) DEFAULT NULL,
  `Net_Area` int(11) NOT NULL,
  `Load_Ratio` decimal(14,2) NOT NULL,
  `Status_ID` int(10) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `maintenance_pct` decimal(2,2) NOT NULL,
  `Finishing_Level` int(10) NOT NULL,
  `Rooms_Desc` int(10) NOT NULL,
  `has_activity` varchar(20) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `Status_Reason` varchar(200) DEFAULT NULL,
  `Held_For` varchar(100) DEFAULT NULL,
  `Hold_can_Workon` int(11) DEFAULT NULL,
  `Approval_Requested` int(11) NOT NULL,
  `Approval_status` int(10) DEFAULT NULL,
  `Approval_feedback` varchar(250) DEFAULT NULL,
  `Feedback_By` int(11) DEFAULT NULL,
  `Garage_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`Unit_ID`, `Unit_No`, `Build_No`, `Project_ID`, `floor_id`, `Raw_ID`, `Pos_ID`, `Unit_Area`, `Basic_Meter_Price`, `Unit_Basic_Price`, `Roof_Area`, `Garden_Area`, `Open_terrace_Area`, `Usufruct_type`, `usufruct_meter_price`, `Usufruct_Price`, `Net_Area`, `Load_Ratio`, `Status_ID`, `added_by`, `Creation_Date`, `last_update_on`, `maintenance_pct`, `Finishing_Level`, `Rooms_Desc`, `has_activity`, `activity_id`, `Status_Reason`, `Held_For`, `Hold_can_Workon`, `Approval_Requested`, `Approval_status`, `Approval_feedback`, `Feedback_By`, `Garage_ID`) VALUES
('2-1-55', '2', '1', 55, 3, 3, 4, '250', 4, '2375000', NULL, NULL, NULL, NULL, NULL, NULL, 220, '10.00', 2, '', '2022-01-04 20:50:01', '2022-01-04 20:50:01', '0.15', 1, 1, 'No', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL);

--
-- Triggers `units`
--
DELIMITER $$
CREATE TRIGGER `In_UnitNo` BEFORE INSERT ON `units` FOR EACH ROW begin     -- checking null values
	if ( new.Unit_No='' or new.Unit_No = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Unit Number Must Not Be Empty!';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UP_HasActivity` BEFORE UPDATE ON `units` FOR EACH ROW begin
	 IF(select count(Activity_ID) from activites a where Unit_ID = old.unit_ID)> 0
	 then set new.has_activity = 'Yes';
	 else set new.has_activity = 'No';
	 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_BasicPrice` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Basic_Meter_Price='' or new.Basic_Meter_Price = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Meter Basic Price Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_HasActivity` BEFORE INSERT ON `units` FOR EACH ROW begin
	 IF(select count(Activity_ID) from activites a where Unit_ID = new.unit_ID)> 0
	 then set new.has_activity = 'Yes';
	 else set new.has_activity = 'No';
	 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_PosID` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Pos_ID='' or new.Pos_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Position Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_RawID` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Raw_ID='' or new.Raw_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Raw Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_RoofArea` BEFORE INSERT ON `units` FOR EACH ROW begin
	if (select ascii(new.Roof_Area ) not between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
	elseif (new.Roof_Area >0 and new.Garden_Area > 0 and new.Open_terrace_Area > 0 )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Can Not Combine Between Roof And Garden or Terrace Area';
	elseif  (new.Roof_Area >0 and new.Garden_Area > 0)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Can Not Combine Between Roof And Garden Area';
	elseif (new.Roof_Area >0 and new.Open_terrace_Area > 0 )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Can Not Combine Between Roof And Terrace Area';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_RoomsDesc` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Rooms_Desc='' or new.Rooms_Desc is null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'All Details About Rooms Didn Not Insert Yet!';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_UActivityID` BEFORE UPDATE ON `units` FOR EACH ROW begin
	 IF(select count(Activity_ID) from activites a where Unit_ID = old.unit_ID)> 0
	 then set new.Activity_ID = (select Activity_ID from activites a where Unit_ID = old.unit_ID);
	 else set new.Activity_ID = NULL;
	 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_UnitArea` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Unit_Area='' or new.Unit_Area = null) 
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Unit Area Must Not Be Empty';
	elseif (select ascii(new.Unit_Area ) not between 48 and 57)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
 	end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Usuid` BEFORE INSERT ON `units` FOR EACH ROW begin
	 if (new.Roof_Area =0 and new.Garden_Area=0 and new.Open_terrace_Area=0)
	 	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area, Garden_Area and Open_terrace_Area Have 0 Value, Usufruct Meter Price Must Be Empty';	 
	elseif new.Roof_Area > 0 and (new.usufruct_meter_price is null or new.usufruct_meter_price ='' or new.usufruct_meter_price =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area Has Value > 0, Usufruct Meter Price Must Not Be Empty';
	elseif  new.Garden_Area   > 0 and (new.usufruct_meter_price is null or new.usufruct_meter_price ='' or new.usufruct_meter_price =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Garden Area Has Value > 0, Usufruct Meter Price Must Not Be Empty';
	elseif new.Open_terrace_Area > 0 and (new.usufruct_meter_price is null or new.usufruct_meter_price ='' or new.usufruct_meter_price =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Terrace Area Has Value > 0, Usufruct Meter Price Must Not Be Empty';	
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Usuprice` BEFORE INSERT ON `units` FOR EACH ROW begin 
	set new.Usufruct_Price = (
		(select `usufruct meter price` 
		from `usufruct prices` 
		where id = new.usufruct_meter_price) * ifnull(new.Roof_Area,0)
		) 
		+ 
		(
		(select `usufruct meter price`
		from `usufruct prices` 
		where id = new.usufruct_meter_price) * ifnull(new.Garden_Area,0)
		)
	+ (
		(select `usufruct meter price` 
		from `usufruct prices` 
		where id = new.usufruct_meter_price) * ifnull(new.Open_terrace_Area,0)
	);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_Usutype` BEFORE INSERT ON `units` FOR EACH ROW begin
	 if (new.Roof_Area =0 and new.Garden_Area=0 and new.Open_terrace_Area=0)
	 	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area, Garden_Area and Open_terrace_Area Have 0 Value, Usufruct type Must Be Empty';	 	 	
	elseif new.Roof_Area > 0 and (new.Usufruct_type is null or new.Usufruct_type ='' or new.Usufruct_type =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area Has Value > 0, Usufruct type Must Not Be Empty';
	elseif  new.Garden_Area   > 0 and (new.Usufruct_type is null or new.Usufruct_type ='' or new.Usufruct_type =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Garden Area Has Value > 0, Usufruct type Must Not Be Empty';
	elseif new.Open_terrace_Area > 0 and (new.Usufruct_type is null or new.Usufruct_type ='' or new.Usufruct_type =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Terrace Area Has Value > 0, Usufruct type Must Not Be Empty';	
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_buildNo` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Build_No='' or new.Build_No = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Build Number Must Not Be Empty';
	elseif (select ascii(new.Build_No ) not between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_flevel` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.finishing_level='' or new.finishing_level is null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Finishing Level Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_floorid` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.floor_ID='' or new.floor_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'floor Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_projectid` BEFORE INSERT ON `units` FOR EACH ROW begin
	if ( new.Project_ID='' or new.Project_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Project Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_status` BEFORE INSERT ON `units` FOR EACH ROW begin
		 IF( new.status_id = null or new.status_ID = '' )
         then set new.status_Id = 2 ;
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_umainpct` BEFORE INSERT ON `units` FOR EACH ROW begin
	set new.maintenance_pct = (select `maintenance pct` from projects p where ID = new.project_ID);
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_unitid` BEFORE INSERT ON `units` FOR EACH ROW Begin 
 	Set New.Unit_ID = Concat(New.Unit_No,'-',New.Build_No,'-',New.Project_ID);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_unitprice` BEFORE INSERT ON `units` FOR EACH ROW begin
	set new.Unit_Basic_Price = new.Unit_Area * (select `Basic Meter Price` from `basic prices` bp where ID  = new.Basic_Meter_Price);
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_BasicPrice` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.Basic_Meter_Price='' or new.Basic_Meter_Price = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Meter Basic Price Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_PosID` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.Pos_ID='' or new.Pos_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Position Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_RawID` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.floor_ID='' or new.floor_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Raw Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_RoofArea` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if (select ascii(new.Roof_Area ) not between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
	elseif (new.Roof_Area >0 and new.Garden_Area > 0 and new.Open_terrace_Area > 0 )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Can Not Combine Between Roof And Garden or Terrace Area';
	elseif  (new.Roof_Area >0 and new.Garden_Area > 0 )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Can Not Combine Between Roof And Garden Area';
	elseif (new.Roof_Area >0 and new.Open_terrace_Area > 0 )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Can Not Combine Between Roof And Terrace Area';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_RoomsDesc` BEFORE UPDATE ON `units` FOR EACH ROW begin
		if ( new.Rooms_Desc='' or new.Rooms_Desc is null) 
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'All Details About Rooms Didn Not Insert Yet!';
	 end if;
	 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_UActivityID` BEFORE UPDATE ON `units` FOR EACH ROW begin
	 IF(select count(Activity_ID) from activites a where Unit_ID = old.unit_ID)> 0
	 then set new.Activity_ID = (select Activity_ID from activites a where Unit_ID = old.unit_ID);
	 else set new.Activity_ID = Null;
	 end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_UnitArea` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.Unit_Area='' or new.Unit_Area = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Unit Area Must Not Be Empty';
	elseif (select ascii(new.Unit_Area ) not between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_UnitNo` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.Unit_No='' or new.Unit_No = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Unit Number Must Not Be Empty';
	elseif (select ascii(new.unit_no ) not between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Usuid` BEFORE UPDATE ON `units` FOR EACH ROW begin
	 if (new.Roof_Area =0 and new.Garden_Area=0 and new.Open_terrace_Area=0)
	 	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area, Garden_Area and Open_terrace_Area Have 0 Value, Usufruct Meter Price Must Be Empty';
	elseif new.Roof_Area > 0 and (new.usufruct_meter_price is null or new.usufruct_meter_price ='' or new.usufruct_meter_price =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area Has Value > 0, Usufruct Meter Price Must Not Be Empty';
	elseif  new.Garden_Area   > 0 and (new.usufruct_meter_price is null or new.usufruct_meter_price ='' or new.usufruct_meter_price =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Garden Area Has Value > 0, Usufruct Meter Price Must Not Be Empty';
	elseif new.Open_terrace_Area > 0 and (new.usufruct_meter_price is null or new.usufruct_meter_price ='' or new.usufruct_meter_price =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Terrace Area Has Value > 0, Usufruct Meter Price Must Not Be Empty';	
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Usuprice` BEFORE UPDATE ON `units` FOR EACH ROW begin 
	set new.Usufruct_Price = (
		(select `usufruct meter price`
		from `usufruct prices` 
		where id = new.usufruct_meter_price) * ifnull(new.Roof_Area,0)
		) 
		+ 
		(
		(select `usufruct meter price`
		from `usufruct prices` 
		where id = new.usufruct_meter_price) * ifnull(new.Garden_Area,0)
		)
	+ (
		(select `usufruct meter price`
		from `usufruct prices` 
		where id = new.usufruct_meter_price) * ifnull(new.Open_terrace_Area,0)
	);	
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_Usutype` BEFORE UPDATE ON `units` FOR EACH ROW begin
	 if (new.Roof_Area =0 and new.Garden_Area=0 and new.Open_terrace_Area=0)
	 	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area, Garden_Area and Open_terrace_Area Have 0 Value, Usufruct type Must Be Empty';	 
	elseif new.Roof_Area > 0 and (new.Usufruct_type is null or new.Usufruct_type ='' or new.Usufruct_type =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Roof Area Has Value > 0, Usufruct type Must Not Be Empty';
	elseif  new.Garden_Area   > 0 and (new.Usufruct_type is null or new.Usufruct_type ='' or new.Usufruct_type =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Garden Area Has Value > 0, Usufruct type Must Not Be Empty';
	elseif new.Open_terrace_Area > 0 and (new.Usufruct_type is null or new.Usufruct_type ='' or new.Usufruct_type =0)
		then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'As Terrace Area Has Value > 0, Usufruct type Must Not Be Empty';	
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_buildNo` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.Build_No='' or new.Build_No = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Build Number Must Not Be Empty';
	elseif (select ascii(new.Build_No ) not between 48 and 57)
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Wrong Number';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_flevel` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.finishing_level='' or new.finishing_level is null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Finishing Level Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_floorid` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.floor_ID='' or new.floor_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'floor Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_projectid` BEFORE UPDATE ON `units` FOR EACH ROW begin
	if ( new.Project_ID='' or new.Project_ID = null) 
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Project Must Not Be Empty';
 end if;
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_status` BEFORE UPDATE ON `units` FOR EACH ROW begin 
	IF( new.status_id = null or new.status_ID = '' )
	then SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Status Must Not Be Empty!';        
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_umainpct` BEFORE UPDATE ON `units` FOR EACH ROW begin
	set new.maintenance_pct = (select `maintenance pct` from projects p where ID = new.project_ID);
 end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_unitid` BEFORE UPDATE ON `units` FOR EACH ROW Begin 
 	Set New.Unit_ID = Concat(New.Unit_No,'-',New.Build_No,'-',New.Project_ID);
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_unitprice` BEFORE UPDATE ON `units` FOR EACH ROW begin
	set new.Unit_Basic_Price = new.Unit_Area * (select `Basic Meter Price` from `basic prices` bp where ID  = new.Basic_Meter_Price);
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unit status`
--

CREATE TABLE `unit status` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Colour` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit status`
--

INSERT INTO `unit status` (`ID`, `Name`, `Colour`) VALUES
(1, 'Done Deal', '0, 176, 80'),
(2, 'Available', '255, 255, 255'),
(3, 'Reserved', '169, 208, 142'),
(4, 'Hold', '255, 255, 0'),
(5, 'Un-Available', '208, 206, 206'),
(6, 'Restricted', '255, 0, 0'),
(7, 'On Sale', '180, 198, 231'),
(9, 'Closed', '89, 89, 89'),
(12, 'Canceled', '255,255,255');

-- --------------------------------------------------------

--
-- Table structure for table `usufruct prices`
--

CREATE TABLE `usufruct prices` (
  `ID` int(11) NOT NULL,
  `Usufruct Meter Price` decimal(14,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usufruct prices`
--

INSERT INTO `usufruct prices` (`ID`, `Usufruct Meter Price`) VALUES
(1, '1250'),
(2, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `usufruct type`
--

CREATE TABLE `usufruct type` (
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usufruct type`
--

INSERT INTO `usufruct type` (`Type`) VALUES
(1),
(2),
(3),
(4),
(5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `UID_FK` (`Unit_ID`),
  ADD KEY `coverTL_FK` (`Manager_Assistant_ID`),
  ADD KEY `Styp_FK` (`Sale_Type_ID`),
  ADD KEY `Br_FK` (`Broker_ID`),
  ADD KEY `Paytype_FK` (`Payment_Type_ID`),
  ADD KEY `cheuqueSubmit_FK` (`Submitted_Cheques`),
  ADD KEY `Contractsign_FK` (`Signed_Contract`),
  ADD KEY `Claimed_FK` (`Filled_Claim`),
  ADD KEY `Refunded_FK` (`Refunded`),
  ADD KEY `coverSeller_FK` (`Seller_Assistant_ID`),
  ADD KEY `tl_fk` (`Direct_Manager_ID`),
  ADD KEY `creator_fk` (`created_by`),
  ADD KEY `upby_fk` (`Seller_Account`),
  ADD KEY `creatormgr_fk` (`Creator_Manager`),
  ADD KEY `Head_FK` (`Section_Head_ID`),
  ADD KEY `nid_fk_activites` (`CST_NID`),
  ADD KEY `CededID_FK` (`Ceded_Garage_ID`),
  ADD KEY `M_GarageID_FK` (`Main_Garage_ID`),
  ADD KEY `Garage_Type_FK` (`Requested_Garage`);

--
-- Indexes for table `activity status`
--
ALTER TABLE `activity status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `approval status`
--
ALTER TABLE `approval status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `attachements`
--
ALTER TABLE `attachements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `basic prices`
--
ALTER TABLE `basic prices`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Basic_Meter_Price` (`Basic Meter Price`);

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `broker_uk` (`Name`),
  ADD KEY `bro_typeFK` (`Type`);

--
-- Indexes for table `broker type`
--
ALTER TABLE `broker type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ceded_garage`
--
ALTER TABLE `ceded_garage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nid_uk` (`National ID`),
  ADD KEY `chid_fk` (`ch_id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `dev_uk` (`Name`);

--
-- Indexes for table `finishing level`
--
ALTER TABLE `finishing level`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garage_type`
--
ALTER TABLE `garage_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ImgUnitID_FK` (`Unit ID`);

--
-- Indexes for table `installments plan`
--
ALTER TABLE `installments plan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `layout dimension`
--
ALTER TABLE `layout dimension`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lkp_tables`
--
ALTER TABLE `lkp_tables`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment type`
--
ALTER TABLE `payment type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ProName` (`Name`),
  ADD KEY `DevID_FK` (`DevID`);

--
-- Indexes for table `raw type`
--
ALTER TABLE `raw type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `requested`
--
ALTER TABLE `requested`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sale type`
--
ALTER TABLE `sale type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `session timeout`
--
ALTER TABLE `session timeout`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `unit position`
--
ALTER TABLE `unit position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`Unit_ID`),
  ADD KEY `Project_ID` (`Project_ID`),
  ADD KEY `Raw_FK` (`Raw_ID`),
  ADD KEY `pos_fk` (`Pos_ID`),
  ADD KEY `Basic_fk` (`Basic_Meter_Price`),
  ADD KEY `Floor_FK` (`floor_id`),
  ADD KEY `usuid_FK` (`usufruct_meter_price`),
  ADD KEY `usutype_FK` (`Usufruct_type`),
  ADD KEY `level_fk` (`Finishing_Level`),
  ADD KEY `room_fk` (`Rooms_Desc`),
  ADD KEY `activity_fk` (`activity_id`),
  ADD KEY `status_fk` (`Status_ID`),
  ADD KEY `CanWork_FK` (`Hold_can_Workon`),
  ADD KEY `ApprovalReq_FK` (`Approval_Requested`),
  ADD KEY `ApprovalStatus_FK` (`Approval_status`);

--
-- Indexes for table `unit status`
--
ALTER TABLE `unit status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usufruct prices`
--
ALTER TABLE `usufruct prices`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usufruct_Meter_Price` (`Usufruct Meter Price`);

--
-- Indexes for table `usufruct type`
--
ALTER TABLE `usufruct type`
  ADD PRIMARY KEY (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activites`
--
ALTER TABLE `activites`
  MODIFY `Activity_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity status`
--
ALTER TABLE `activity status`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approval status`
--
ALTER TABLE `approval status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attachements`
--
ALTER TABLE `attachements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `basic prices`
--
ALTER TABLE `basic prices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `broker type`
--
ALTER TABLE `broker type`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `finishing level`
--
ALTER TABLE `finishing level`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `garage_type`
--
ALTER TABLE `garage_type`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installments plan`
--
ALTER TABLE `installments plan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layout dimension`
--
ALTER TABLE `layout dimension`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lkp_tables`
--
ALTER TABLE `lkp_tables`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment type`
--
ALTER TABLE `payment type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `raw type`
--
ALTER TABLE `raw type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `requested`
--
ALTER TABLE `requested`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale type`
--
ALTER TABLE `sale type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit position`
--
ALTER TABLE `unit position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit status`
--
ALTER TABLE `unit status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usufruct prices`
--
ALTER TABLE `usufruct prices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brokers`
--
ALTER TABLE `brokers`
  ADD CONSTRAINT `bro_typeFK` FOREIGN KEY (`Type`) REFERENCES `broker type` (`ID`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `chid_fk` FOREIGN KEY (`ch_id`) REFERENCES `channels`.`channel_type` (`Ch_ID`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `ImgUnitID_FK` FOREIGN KEY (`Unit ID`) REFERENCES `units` (`Unit_ID`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `DevID_FK` FOREIGN KEY (`DevID`) REFERENCES `developers` (`ID`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `ApprovalReq_FK` FOREIGN KEY (`Approval_Requested`) REFERENCES `requested` (`ID`),
  ADD CONSTRAINT `ApprovalStatus_FK` FOREIGN KEY (`Approval_status`) REFERENCES `approval status` (`ID`),
  ADD CONSTRAINT `Basic_fk` FOREIGN KEY (`Basic_Meter_Price`) REFERENCES `basic prices` (`ID`),
  ADD CONSTRAINT `CanWork_FK` FOREIGN KEY (`Hold_can_Workon`) REFERENCES `requested` (`ID`),
  ADD CONSTRAINT `Floor_FK` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`ID`),
  ADD CONSTRAINT `Raw_FK` FOREIGN KEY (`Raw_ID`) REFERENCES `raw type` (`ID`),
  ADD CONSTRAINT `activitystatus_FK` FOREIGN KEY (`Status_ID`) REFERENCES `unit status` (`ID`),
  ADD CONSTRAINT `level_fk` FOREIGN KEY (`Finishing_Level`) REFERENCES `finishing level` (`ID`),
  ADD CONSTRAINT `pos_fk` FOREIGN KEY (`Pos_ID`) REFERENCES `unit position` (`ID`),
  ADD CONSTRAINT `room_fk` FOREIGN KEY (`Rooms_Desc`) REFERENCES `rooms` (`ID`),
  ADD CONSTRAINT `status_fk` FOREIGN KEY (`Status_ID`) REFERENCES `unit status` (`ID`),
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`Project_ID`) REFERENCES `projects` (`ID`),
  ADD CONSTRAINT `usuid_FK` FOREIGN KEY (`usufruct_meter_price`) REFERENCES `usufruct prices` (`ID`),
  ADD CONSTRAINT `usutype_FK` FOREIGN KEY (`Usufruct_type`) REFERENCES `usufruct type` (`Type`);
--
-- Database: `logs`
--
CREATE DATABASE IF NOT EXISTS `logs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `logs`;

-- --------------------------------------------------------

--
-- Table structure for table `activites_logs`
--

CREATE TABLE `activites_logs` (
  `Activity_ID` int(11) NOT NULL DEFAULT 0,
  `Unit_ID` varchar(50) NOT NULL,
  `CST_ID` int(11) NOT NULL,
  `Seller` varchar(100) NOT NULL,
  `Cover_Seller` int(11) DEFAULT NULL,
  `Seller_Manager` int(11) NOT NULL,
  `Cover_Manager` int(11) DEFAULT NULL,
  `Section_Head` int(11) NOT NULL,
  `Sale_type` int(11) NOT NULL,
  `Broker_ID` int(11) DEFAULT NULL,
  `Down_payment` int(10) DEFAULT NULL,
  `Contract_sign` int(11) NOT NULL,
  `Cheuqes_submit` int(11) NOT NULL,
  `Claimed` int(11) NOT NULL,
  `Grage` int(11) NOT NULL,
  `Grage_Price` decimal(14,0) NOT NULL DEFAULT 0,
  `Finalized_price` decimal(14,0) NOT NULL,
  `Payment_ID` int(11) DEFAULT NULL,
  `Refunded` int(11) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL,
  `Status_Reason` varchar(200) DEFAULT NULL,
  `Feedback_By` int(11) DEFAULT NULL,
  `Held_For` varchar(100) DEFAULT NULL,
  `Hold_can_Workon` int(11) DEFAULT NULL,
  `Approval_Requested` int(11) DEFAULT NULL,
  `Approval_status` int(10) DEFAULT NULL,
  `Approval_feedback` varchar(250) DEFAULT NULL,
  `Created_On` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `Creator_Manager` int(11) NOT NULL,
  `Comment` varchar(250) DEFAULT NULL,
  `archive_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activites_logs`
--

INSERT INTO `activites_logs` (`Activity_ID`, `Unit_ID`, `CST_ID`, `Seller`, `Cover_Seller`, `Seller_Manager`, `Cover_Manager`, `Section_Head`, `Sale_type`, `Broker_ID`, `Down_payment`, `Contract_sign`, `Cheuqes_submit`, `Claimed`, `Grage`, `Grage_Price`, `Finalized_price`, `Payment_ID`, `Refunded`, `Status_ID`, `Status_Reason`, `Feedback_By`, `Held_For`, `Hold_can_Workon`, `Approval_Requested`, `Approval_status`, `Approval_feedback`, `Created_On`, `updated_on`, `created_by`, `Creator_Manager`, `Comment`, `archive_date`) VALUES
(130, '10-200-100', 3, 'agent1@localhost', NULL, 8, NULL, 7, 2, 1, 0, 0, 0, 0, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 01:03:36', '2021-11-09 09:19:31', 'root@localhost', 13, NULL, '2021-11-09 13:15:16'),
(130, '10-200-100', 3, 'agent1@localhost', NULL, 8, NULL, 7, 1, NULL, 0, 0, 0, 0, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 01:03:36', '2021-11-09 15:15:16', 'root@localhost', 13, NULL, '2021-11-09 13:21:47'),
(157, '10-200-100', 3, 'agent1@localhost', NULL, 8, NULL, 7, 1, NULL, 10, 1, 1, 1, 2, '0', '0', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:41:31', '2021-11-09 06:41:31', 'agent1@localhost', 8, NULL, '2021-11-09 21:45:28'),
(157, '10-200-100', 3, 'tl1@localhost', NULL, 9, NULL, 7, 1, NULL, 10000000, 1, 1, 1, 2, '0', '0', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:41:31', '2021-11-09 23:45:28', 'agent1@localhost', 8, NULL, '2021-11-09 21:48:34'),
(157, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 10000000, 1, 1, 1, 1, '1000000', '1000000', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:41:31', '2021-11-09 23:48:34', 'agent1@localhost', 8, NULL, '2021-11-09 21:53:16'),
(157, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 10000000, 1, 1, 1, 1, '1000000', '1000000', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:41:31', '2021-11-09 23:53:16', 'agent1@localhost', 8, 'test', '2021-11-09 23:35:54'),
(165, '11-9-10', 3, 'agent1@localhost', NULL, 8, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '942500', NULL, 2, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-11-10 21:04:22', '2021-11-10 21:04:22', 'agent1@localhost', 8, NULL, '2021-11-10 19:05:38'),
(165, '11-9-10', 3, 'tl1@localhost', NULL, 9, NULL, 7, 1, NULL, 10, 2, 2, 2, 1, '100000', '1042500', NULL, 2, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-11-10 21:04:22', '2021-11-10 21:05:38', 'agent1@localhost', 8, NULL, '2021-11-10 22:57:16'),
(183, '14-2-1', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, NULL, 2, 2, 2, 1, '100000', '2406000', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-12 23:38:58', '2021-11-12 23:38:58', 'root@localhost', 13, NULL, '2021-11-12 21:40:28'),
(183, '14-2-1', 3, 'agent1@localhost', NULL, 8, NULL, 7, 1, NULL, NULL, 2, 2, 2, 2, '0', '2306000', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-12 23:38:58', '2021-11-12 23:40:28', 'root@localhost', 13, NULL, '2021-11-12 21:42:49'),
(131, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 0, 0, 0, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 01:07:07', '2021-11-09 06:39:07', 'agent1@localhost', 8, NULL, '2021-11-12 22:01:44'),
(132, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 0, 0, 0, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 01:10:37', '2021-11-09 06:38:59', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(134, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 0, 0, 0, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 01:26:59', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(135, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 2, 1, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 02:23:26', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(136, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-11-09 02:52:40', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(137, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', 0, 0, 0, NULL, NULL, NULL, NULL, 0, 3, NULL, '2021-11-09 02:54:21', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(145, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 2, 2, 2, 2, '0', '0', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:14:21', '2021-11-09 06:39:07', 'agent1@localhost', 8, NULL, '2021-11-12 22:02:19'),
(149, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 2, 1, 1, 2, '0', '0', NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:16:39', '2021-11-09 06:39:07', 'tl1@localhost', 9, NULL, '2021-11-12 22:02:19'),
(152, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', NULL, NULL, 2, '111111111111111111111111111111111', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:30:55', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(153, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', NULL, NULL, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:31:13', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(154, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', NULL, NULL, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:31:27', '2021-11-09 06:39:07', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(155, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', NULL, NULL, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:31:45', '2021-11-09 06:39:07', 'tl1@localhost', 9, NULL, '2021-11-12 22:02:19'),
(156, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 0, 1, 1, 1, 2, '0', '0', NULL, NULL, 2, '22222', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:32:02', '2021-11-09 06:39:07', 'tl1@localhost', 9, NULL, '2021-11-12 22:02:19'),
(157, '10-200-100', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 10000000, 1, 1, 1, 2, '0', '0', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-09 06:41:31', '2021-11-10 01:35:54', 'agent1@localhost', 8, 'test', '2021-11-12 22:02:19'),
(159, '10-200-100', 3, 'agent1@localhost', NULL, 8, NULL, 7, 2, 1, 5000, 2, 2, 2, 1, '100000', '100000', NULL, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-10 20:58:11', '2021-11-10 20:58:11', 'agent1@localhost', 8, NULL, '2021-11-12 22:02:19'),
(165, '11-9-10', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 1, '90000', '1032500', NULL, 2, 7, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-11-10 21:04:22', '2021-11-11 00:57:16', 'agent1@localhost', 8, NULL, '2021-11-12 22:02:19'),
(183, '14-2-1', 3, 'tl1@localhost', NULL, 9, NULL, 7, 1, NULL, NULL, 2, 2, 2, 1, '200000', '2506000', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-12 23:38:58', '2021-11-12 23:42:49', 'root@localhost', 13, NULL, '2021-11-12 22:02:19'),
(185, '18-1-1', 3, 'root@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:11:25', 'root@localhost', 13, NULL, '2021-11-13 04:31:06'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:31:06', 'root@localhost', 13, NULL, '2021-11-13 04:31:24'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:31:24', 'root@localhost', 13, NULL, '2021-11-13 04:32:52'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:32:52', 'root@localhost', 13, NULL, '2021-11-13 04:38:32'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:38:32', 'root@localhost', 13, NULL, '2021-11-13 04:43:27'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:43:27', 'root@localhost', 13, NULL, '2021-11-13 04:44:35'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:43:27', 'root@localhost', 13, NULL, '2021-11-13 04:44:47'),
(185, '18-1-1', 3, 'soliman@localhost', NULL, 13, NULL, 7, 1, NULL, 10, 2, 2, 2, 2, '0', '2437500', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-13 06:11:25', '2021-11-13 06:44:47', 'root@localhost', 13, NULL, '2021-11-13 04:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `projects_logs`
--

CREATE TABLE `projects_logs` (
  `ProID` int(11) NOT NULL DEFAULT 0,
  `ProName` varchar(255) NOT NULL,
  `Insertion_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Added_By` varchar(255) NOT NULL,
  `DevID` int(11) NOT NULL,
  `archive_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects_logs`
--

INSERT INTO `projects_logs` (`ProID`, `ProName`, `Insertion_date`, `Added_By`, `DevID`, `archive_date`) VALUES
(10, 'Kalma', '2021-11-05 15:49:51', 'root@localhost', 2, '2021-11-09 19:04:46'),
(11, 'Kalma2', '2021-11-10 18:43:04', 'root@localhost', 2, '2021-11-10 18:51:35'),
(19, 'Pro1', '2021-11-16 12:00:37', 'root@localhost', 2, '2021-11-16 12:14:30'),
(18, 'Sama', '2021-11-12 21:07:43', 'root@localhost', 2, '2021-11-16 12:17:12'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-17 17:39:10'),
(20, 'Calmaa', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-17 17:42:07'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-11-18 05:36:43'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 05:36:50'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-11-18 05:58:27'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 05:58:31'),
(22, 'Test1', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-18 06:00:12'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 06:01:46'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 06:02:28'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 06:03:09'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 06:03:24'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 06:04:34'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 06:05:11'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-18 23:07:25'),
(22, 'Test1', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 03:20:25'),
(22, 'Test1', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 03:21:01'),
(22, 'Test1', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 03:45:39'),
(22, 'on sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 03:50:25'),
(22, 'test2', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 03:50:56'),
(22, 'test1', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 03:53:46'),
(22, 'on sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:23:13'),
(22, 'f', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:23:19'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:26:44'),
(22, 'saley', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:26:49'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:37:14'),
(22, 'i', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:37:19'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:45:40'),
(22, 'f', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:45:48'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:52:44'),
(22, 't', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:52:48'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:56:13'),
(22, 'saled', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:56:16'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:59:36'),
(22, 'sal', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 04:59:57'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:12:42'),
(22, 'sal6', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:12:50'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:28:54'),
(22, '6', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:29:01'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:30:01'),
(22, 'avail', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:32:15'),
(22, 'availp', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:32:20'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:33:20'),
(22, 'avail', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:44:50'),
(22, 'avails', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:44:55'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:45:55'),
(22, 'avail', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:51:48'),
(22, 'availaa', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:51:52'),
(22, 'sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 05:52:52'),
(22, 'avail', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 23:41:14'),
(22, 'on sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-22 23:43:14'),
(22, 'available', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:12:37'),
(22, 'On Sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:15:20'),
(22, 'On Sal', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:15:24'),
(22, 'On Sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:15:44'),
(22, 'On Sal', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:15:53'),
(22, 'On Sale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:18:27'),
(22, 'OnSale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:19:59'),
(22, 'OnSal', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:20:03'),
(22, 'OnSale', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 12:20:13'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-27 13:06:33'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-11-27 13:06:51'),
(22, 'Available', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 13:06:55'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 3, '2021-11-27 13:08:03'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-11-27 13:08:07'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 3, '2021-11-27 13:08:51'),
(22, 'Available', '2021-11-18 05:59:51', 'root@localhost', 3, '2021-11-27 13:08:55'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 3, '2021-11-27 13:10:07'),
(22, 'Available', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 13:19:00'),
(22, '3', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 13:22:50'),
(22, '2', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 13:22:57'),
(22, '6', '2021-11-18 05:59:51', 'root@localhost', 2, '2021-11-27 13:24:01'),
(22, '6', '2021-11-18 05:59:51', 'root@localhost', 3, '2021-11-27 13:26:01'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-11-27 13:26:59'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 3, '2021-11-27 13:27:59'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-11-29 01:07:44'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 3, '2021-11-29 01:08:44'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 18:57:13'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 18:58:45'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 18:58:59'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:05:43'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:02'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:04'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:08'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:11'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:09:11'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:18'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:09:18'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:24'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:09:24'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:27'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:09:27'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:46'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:09:46'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:09:48'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:09:49'),
(21, 'Calma2', '2021-11-17 18:36:16', 'root@localhost', 2, '2021-12-03 19:16:13'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 19:16:24'),
(23, 'CRM', '2021-12-03 18:38:01', 'root@localhost', 14, '2021-12-03 22:51:05'),
(28, 'CRM6', '2021-12-03 18:38:47', 'root@localhost', 14, '2021-12-03 22:51:12'),
(27, 'CRM5', '2021-12-03 18:38:39', 'root@localhost', 14, '2021-12-03 22:51:17'),
(26, 'CRM4', '2021-12-03 18:38:32', 'root@localhost', 14, '2021-12-03 22:51:22'),
(25, 'CRM3', '2021-12-03 18:38:26', 'root@localhost', 14, '2021-12-03 22:51:25'),
(25, 'CRM3', '2021-12-03 18:38:26', 'root@localhost', 14, '2021-12-03 22:51:27'),
(24, 'CRM2', '2021-12-03 18:38:19', 'root@localhost', 14, '2021-12-03 22:51:32'),
(20, 'Calma', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-03 23:08:59'),
(20, 'Calma1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 00:02:06'),
(20, 'Ahmed Dynamic', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 00:07:31'),
(20, 'Ahmed Dynamic', '2021-11-17 16:54:11', 'root@localhost', 13, '2021-12-04 00:08:13'),
(20, 'Ahmed Dynamic', '2021-11-17 16:54:11', 'root@localhost', 5, '2021-12-04 00:27:05'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 16, '2021-12-04 00:27:58'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 13, '2021-12-04 00:28:35'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 13, '2021-12-04 00:30:54'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 13, '2021-12-04 00:32:50'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 13, '2021-12-04 00:33:04'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 16, '2021-12-04 00:33:31'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 16, '2021-12-04 00:34:40'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 16, '2021-12-04 00:36:21'),
(20, 'Ahmad', '2021-11-17 16:54:11', 'root@localhost', 18, '2021-12-04 00:37:15'),
(20, 'Nahtta', '2021-11-17 16:54:11', 'root@localhost', 5, '2021-12-04 00:39:34'),
(20, 'Nahtta', '2021-11-17 16:54:11', 'root@localhost', 3, '2021-12-04 00:40:19'),
(20, 'Nahtta', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 00:41:56'),
(20, 'Nahtta', '2021-11-17 16:54:11', 'root@localhost', 16, '2021-12-04 00:59:33'),
(20, 'trigger', '2021-11-17 16:54:11', 'root@localhost', 19, '2021-12-04 01:00:50'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:02:48'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:02:52'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:02:55'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:03:08'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:03:30'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:03:48'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:03:56'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:04:11'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:05:01'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:05:05'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:05:12'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:05:17'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:05:24'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:05:28'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-04 01:10:18'),
(41, 'AliMag', '2021-12-04 01:08:52', 'root@localhost', 3, '2021-12-04 01:19:22'),
(39, 'Ahmed dml', '2021-12-04 00:57:06', 'root@localhost', 20, '2021-12-04 01:20:07'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 01:25:15'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:28:01'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:29:40'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:31:14'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:32:12'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:33:00'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:33:39'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:34:26'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:35:28'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:35:51'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:37:07'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:37:13'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:38:32'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:40:22'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:40:22'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:41:12'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:41:12'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:41:44'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:41:44'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:47:43'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:47:43'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:47:57'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:48:18'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:49:21'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:53:41'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:55:07'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:56:26'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:57:23'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:57:23'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 01:59:56'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 16, '2021-12-04 02:03:56'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 2, '2021-12-04 02:04:11'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 2, '2021-12-04 02:08:40'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 3, '2021-12-04 02:13:06'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:13:29'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:20:42'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:21:39'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:27:31'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:28:20'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:28:28'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:29:04'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:29:33'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:29:38'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:29:40'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:29:47'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:29:56'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:30:11'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:30:26'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:30:41'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:31:28'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:31:41'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:31:58'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:32:21'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:32:35'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:33:03'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:33:22'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:33:31'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:33:44'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:35:13'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:35:16'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:35:19'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:35:53'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:35:58'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:36:04'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:36:16'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:36:30'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:36:54'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:40:15'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:41:47'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:42:26'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:43:13'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:44:37'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:44:43'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:44:55'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:45:03'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:45:12'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 13, '2021-12-04 02:45:29'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:47:20'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:47:22'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:47:49'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 2, '2021-12-04 02:48:16'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 2, '2021-12-04 02:48:58'),
(45, 'Test Tahyeees', '2021-12-04 02:47:31', 'root@localhost', 15, '2021-12-04 02:50:03'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:50:04'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:50:36'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:51:02'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:51:34'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:55:36'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:55:39'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:55:54'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:56:02'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:56:06'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:57:39'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:57:46'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:57:54'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:58:04'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:59:10'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:59:16'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:59:19'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 02:59:22'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:00:11'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:00:15'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:01:08'),
(45, 'Test Tahyeees', '2021-12-04 02:47:31', 'root@localhost', 15, '2021-12-04 03:01:14'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:01:57'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:02:18'),
(45, 'Test Tahyeees', '2021-12-04 02:47:31', 'root@localhost', 15, '2021-12-04 03:02:29'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 16, '2021-12-04 03:03:18'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:03:23'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:03:41'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:04:15'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:04:38'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:04:52'),
(43, 'last one', '2021-12-04 01:24:31', 'root@localhost', 5, '2021-12-04 03:05:00'),
(34, 'Test Pro 2', '2021-12-03 23:30:52', 'root@localhost', 14, '2021-12-04 03:05:32'),
(35, 'Ahmed', '2021-12-04 00:46:59', 'root@localhost', 18, '2021-12-04 03:05:38'),
(37, 'asd', '2021-12-04 00:52:20', 'root@localhost', 19, '2021-12-04 03:05:44'),
(38, '12345', '2021-12-04 00:53:04', 'root@localhost', 2, '2021-12-04 03:05:51'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 16, '2021-12-04 03:05:54'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:06:15'),
(38, '12345', '2021-12-04 00:53:04', 'root@localhost', 2, '2021-12-04 03:06:26'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:06:37'),
(38, '12345', '2021-12-04 00:53:04', 'root@localhost', 11, '2021-12-04 03:07:00'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:08:04'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:08:31'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:09:31'),
(38, '12345', '2021-12-04 00:53:04', 'root@localhost', 11, '2021-12-04 03:10:26'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:11:07'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:11:33'),
(44, 'Mad Man', '2021-12-04 02:23:05', 'root@localhost', 8, '2021-12-04 03:11:37'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:11:39'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:11:48'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:13:43'),
(45, 'Tahyees end', '2021-12-04 02:47:31', 'root@localhost', 5, '2021-12-04 03:17:16'),
(46, 'qwert', '2021-12-04 03:29:26', 'root@localhost', 5, '2021-12-04 03:30:54'),
(46, 'qwert', '2021-12-04 03:29:26', 'root@localhost', 5, '2021-12-04 03:31:15'),
(46, 'qwert', '2021-12-04 03:29:26', 'root@localhost', 5, '2021-12-04 05:03:18'),
(46, 'qwert', '2021-12-04 03:29:26', 'root@localhost', 23, '2021-12-04 05:03:37'),
(20, '1', '2021-11-17 16:54:11', 'root@localhost', 2, '2021-12-09 15:24:07'),
(55, 'kom pro3', '2022-01-03 21:37:09', 'root@localhost', 16, '2022-01-03 21:41:19'),
(51, 'qaz', '2022-01-03 20:59:32', 'komaja@%', 27, '2022-01-03 21:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `units_logs`
--

CREATE TABLE `units_logs` (
  `Unit_ID` varchar(200) NOT NULL,
  `Unit_No` int(10) NOT NULL,
  `Build_No` int(10) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `Raw_ID` int(11) NOT NULL,
  `Pos_ID` int(11) NOT NULL,
  `Unit_Area` decimal(14,0) NOT NULL,
  `Basic_ID` int(11) NOT NULL,
  `Unit_Basic_Price` decimal(14,0) NOT NULL,
  `Roof_Area` int(11) NOT NULL,
  `Garden_Area` int(11) NOT NULL,
  `Open_terrace_Area` int(11) NOT NULL,
  `Usufruct_type` int(11) NOT NULL,
  `UsuID` int(11) NOT NULL,
  `Unit_Usufruct_Price` decimal(14,0) NOT NULL,
  `Net_Area` int(11) NOT NULL,
  `Load_Ratio` decimal(4,2) DEFAULT NULL,
  `Status_ID` int(10) DEFAULT NULL,
  `Final_Unit_Price` decimal(14,0) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `archive_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_logs`
--

INSERT INTO `units_logs` (`Unit_ID`, `Unit_No`, `Build_No`, `Project_ID`, `floor_id`, `Raw_ID`, `Pos_ID`, `Unit_Area`, `Basic_ID`, `Unit_Basic_Price`, `Roof_Area`, `Garden_Area`, `Open_terrace_Area`, `Usufruct_type`, `UsuID`, `Unit_Usufruct_Price`, `Net_Area`, `Load_Ratio`, `Status_ID`, `Final_Unit_Price`, `added_by`, `archive_date`, `Created_on`, `updated_on`) VALUES
('10-200-100', 100, 200, 10, 3, 3, 3, '95', 4, '0', 30, 20, 40, 1, 1, '0', 80, '10.00', 7, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-300-200', 200, 300, 10, 3, 3, 3, '0', 4, '0', 0, 0, 0, 2, 1, '0', 0, NULL, 5, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-700-50', 50, 700, 10, 3, 4, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '2021-11-09 18:22:22', NULL, NULL),
('10-700-50', 50, 700, 10, 3, 3, 3, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-700-50', 50, 700, 10, 3, 10, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-700-50', 50, 700, 10, 11, 10, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-700-50', 50, 700, 10, 6, 10, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-700-50', 50, 700, 10, 6, 9, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-700-50', 50, 700, 10, 7, 9, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '0000-00-00 00:00:00', NULL, NULL),
('10-200-100', 100, 200, 10, 3, 3, 4, '95', 4, '0', 30, 20, 40, 1, 1, '0', 80, '10.00', 7, '0', 'root@localhost', '2021-11-09 18:37:08', NULL, NULL),
('10-700-50', 50, 700, 10, 6, 9, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '2021-11-09 18:38:50', NULL, NULL),
('10-700-50', 50, 700, 10, 6, 6, 4, '0', 4, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '2021-11-09 18:46:37', '2021-11-09 20:42:15', '2021-11-09 20:42:15'),
('10-200-100', 100, 200, 10, 3, 3, 3, '95', 4, '0', 30, 20, 40, 1, 1, '0', 80, '10.00', 7, '0', 'root@localhost', '2021-11-09 21:52:17', '2021-11-09 20:42:15', '2021-11-09 20:42:15'),
('10-700-50', 50, 700, 10, 6, 6, 4, '0', 7, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 2, '0', 'root@localhost', '2021-11-09 22:12:11', '2021-11-09 20:42:15', '2021-11-09 20:46:37'),
('10-700-50', 50, 700, 10, 6, 6, 4, '0', 7, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 5, '0', 'root@localhost', '2021-11-09 22:14:06', '2021-11-09 20:42:15', '2021-11-10 00:12:11'),
('10-700-50', 50, 700, 10, 6, 6, 4, '0', 7, '0', 0, 0, 0, 1, 1, '0', 0, NULL, 7, '0', 'root@localhost', '2021-11-09 22:14:09', '2021-11-09 20:42:15', '2021-11-10 00:14:06'),
('14-2-1', 1, 2, 14, 4, 4, 3, '228', 4, '2166000', 112, 0, 0, 1, 1, '140000', 190, '10.00', 2, '2306000', 'root@localhost', '2021-11-10 21:13:53', '2021-11-10 23:02:10', '2021-11-10 23:02:10'),
('18-1-1', 1, 1, 18, 3, 3, 3, '250', 4, '2375000', 50, 0, 0, 1, 1, '62500', 230, '10.00', 2, '2437500', 'root@localhost', '2021-11-12 21:21:50', '2021-11-12 23:19:52', '2021-11-12 23:19:52'),
('18-1-1', 1, 1, 18, 3, 3, 4, '250', 4, '2375000', 50, 0, 0, 1, 1, '62500', 230, '10.00', 2, '2437500', 'root@localhost', '2021-11-12 21:23:30', '2021-11-12 23:19:52', '2021-11-12 23:21:50');
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\",\"full_screen\":\"off\",\"side_menu\":\"false\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'Kunouz', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"hr\",\"inventory\",\"phpmyadmin\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('inventory', 1, 'Inventory ERD');

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"inventory\",\"table\":\"units\"},{\"db\":\"inventory\",\"table\":\"basic prices\"},{\"db\":\"inventory\",\"table\":\"usufruct prices\"},{\"db\":\"inventory\",\"table\":\"usufruct type\"},{\"db\":\"inventory\",\"table\":\"finishing level\"},{\"db\":\"inventory\",\"table\":\"rooms\"},{\"db\":\"inventory\",\"table\":\"unit position\"},{\"db\":\"inventory\",\"table\":\"unit status\"},{\"db\":\"inventory\",\"table\":\"attachements\"},{\"db\":\"inventory\",\"table\":\"approval status\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('inventory', 'activites', 1, 484, 25),
('inventory', 'attachements', 1, 1235, 22),
('inventory', 'basic prices', 1, 70, 263),
('inventory', 'floor', 1, 68, 366),
('inventory', 'images', 1, 1235, 151),
('inventory', 'payment type', 1, 69, 469),
('inventory', 'projects', 1, 94, 8),
('inventory', 'raw type', 1, 1235, 279),
('inventory', 'sale type', 1, 816, 672),
('inventory', 'status', 1, 76, 609),
('inventory', 'unit position', 1, 1231, 369),
('inventory', 'units', 1, 903, 42),
('inventory', 'usufruct prices', 1, 79, 172),
('inventory', 'usufruct type', 1, 1230, 466);

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'inventory', 'activites', '{\"CREATE_TIME\":\"2021-11-06 05:08:48\"}', '2021-11-06 06:10:47'),
('root', 'inventory', 'basic prices', '{\"sorted_col\":\"`basic prices`.`Basic Meter Price` ASC\"}', '2022-01-04 21:32:07'),
('root', 'inventory', 'developers', '[]', '2022-01-03 20:19:01'),
('root', 'inventory', 'lkp_tables', '[]', '2022-01-03 17:48:30'),
('root', 'inventory', 'projects', '{\"CREATE_TIME\":\"2021-10-25 07:17:57\",\"sorted_col\":\"`ID` ASC\"}', '2022-01-03 21:35:44'),
('root', 'inventory', 'units', '{\"CREATE_TIME\":\"2021-11-06 04:54:24\"}', '2021-12-27 02:55:44'),
('root', 'mysql', 'user', '{\"sorted_col\":\"`user`.`User` ASC\"}', '2021-11-05 23:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-01-04 20:57:59', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":241}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `security`
--
CREATE DATABASE IF NOT EXISTS `security` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `security`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `privileges`
-- (See below for the actual view)
--
CREATE TABLE `privileges` (
`role` text
,`TABLE_SCHEMA` varchar(64)
,`TABLE_NAME` varchar(64)
,`PRIVILEGE_TYPE` varchar(64)
,`IS_GRANTABLE` varchar(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `roles`
-- (See below for the actual view)
--
CREATE TABLE `roles` (
`ROLE_NAME` varchar(128)
,`IS_GRANTABLE` varchar(3)
,`IS_DEFAULT` varchar(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `users`
-- (See below for the actual view)
--
CREATE TABLE `users` (
`Account` varchar(141)
,`Status` varchar(6)
,`Default_Role` longtext
,`Last_ConnectDate` varchar(50)
,`Password_Last_Change` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `privileges`
--
DROP TABLE IF EXISTS `privileges`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `privileges`  AS SELECT replace(substr(`tp`.`GRANTEE`,1,locate('@',`tp`.`GRANTEE`) - 1),'\'','') AS `role`, `tp`.`TABLE_SCHEMA` AS `TABLE_SCHEMA`, `tp`.`TABLE_NAME` AS `TABLE_NAME`, `tp`.`PRIVILEGE_TYPE` AS `PRIVILEGE_TYPE`, `tp`.`IS_GRANTABLE` AS `IS_GRANTABLE` FROM `information_schema`.`table_privileges` AS `tp` ORDER BY 1 ASC, 2 ASC, 3 ASC ;

-- --------------------------------------------------------

--
-- Structure for view `roles`
--
DROP TABLE IF EXISTS `roles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `roles`  AS SELECT `ar`.`ROLE_NAME` AS `ROLE_NAME`, `ar`.`IS_GRANTABLE` AS `IS_GRANTABLE`, `ar`.`IS_DEFAULT` AS `IS_DEFAULT` FROM `information_schema`.`applicable_roles` AS `ar` ;

-- --------------------------------------------------------

--
-- Structure for view `users`
--
DROP TABLE IF EXISTS `users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users`  AS SELECT concat(`gp`.`User`,'@',`gp`.`Host`) AS `Account`, CASE WHEN locate('"account_locked":true',`gp`.`Priv`) > 0 THEN 'Locked' ELSE 'Active' END AS `Status`, replace(substr(`gp`.`Priv`,locate('"default_role":"',`gp`.`Priv`) + 15,case when locate(',',substr(`gp`.`Priv`,locate('"default_role":"',`gp`.`Priv`))) > 0 then locate(',',substr(`gp`.`Priv`,locate('"default_role":"',`gp`.`Priv`))) else locate('}',substr(`gp`.`Priv`,locate('"default_role":"',`gp`.`Priv`))) end - octet_length('"default_role":"')),'"','') AS `Default_Role`, `l`.`Last_ConnectDate` AS `Last_ConnectDate`, date_format(from_unixtime(cast(replace(replace(substr(`gp`.`Priv`,locate('"password_last_changed":',`gp`.`Priv`),octet_length(`gp`.`Priv`) - locate('"password_last_changed":"',`gp`.`Priv`)),'"password_last_changed":',''),'}','') as unsigned)),'%d-%b-%y %r') AS `Password_Last_Change` FROM (`mysql`.`global_priv` `gp` left join (select `logs`.`user` AS `user`,date_format(`logs`.`event_time`,'%d-%b-%y %r') AS `Last_ConnectDate` from (select `mysql`.`general_log`.`event_time` AS `event_time`,substr(`mysql`.`general_log`.`argument`,1,locate(' as',`mysql`.`general_log`.`argument`) - 1) AS `user`,`mysql`.`general_log`.`command_type` AS `command_type`,row_number() over ( partition by substr(`mysql`.`general_log`.`argument`,1,locate(' as',`mysql`.`general_log`.`argument`) - 1) order by `mysql`.`general_log`.`event_time` desc) AS `rn` from `mysql`.`general_log` where `mysql`.`general_log`.`command_type` like 'Connect') `logs` where `logs`.`rn` = 1) `l` on(concat(`gp`.`User`,'@',`gp`.`Host`) = `l`.`user`)) WHERE locate('"is_role":true',`gp`.`Priv`) = 0 ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
