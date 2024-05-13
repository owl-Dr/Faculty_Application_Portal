-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 08:34 AM
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
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_education`
--

CREATE TABLE `additional_education` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Degree_Certificate` varchar(100) DEFAULT NULL,
  `University_Institute` varchar(100) DEFAULT NULL,
  `Branch_Stream` varchar(100) DEFAULT NULL,
  `Year_of_Joining` int(11) DEFAULT NULL,
  `Year_of_Completion` int(11) DEFAULT NULL,
  `Duration_Years` int(11) DEFAULT NULL,
  `Percentage_CGPA` decimal(5,2) DEFAULT NULL,
  `Division_Class` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `research_area` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `awarded_by` varchar(255) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bachelors_degree`
--

CREATE TABLE `bachelors_degree` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year_of_publication` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_chapters`
--

CREATE TABLE `book_chapters` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year_of_publication` varchar(4) NOT NULL,
  `isbn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `btech`
--

CREATE TABLE `btech` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Degree_Certificate` varchar(100) DEFAULT NULL,
  `Branch_Stream` varchar(100) DEFAULT NULL,
  `University_Institute` varchar(100) DEFAULT NULL,
  `Year_of_Joining` int(11) DEFAULT NULL,
  `Year_of_Completion` int(11) DEFAULT NULL,
  `Duration_Years` int(11) DEFAULT NULL,
  `Percentage_CGPA` decimal(5,2) DEFAULT NULL,
  `Division_Class` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_projects`
--

CREATE TABLE `consultancy_projects` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contract_amount` decimal(10,2) NOT NULL,
  `period` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `Email` varchar(100) NOT NULL,
  `research_contribution` text DEFAULT NULL,
  `teaching_contribution` text DEFAULT NULL,
  `other_contribution` text DEFAULT NULL,
  `editorship` text DEFAULT NULL,
  `list_journal` text DEFAULT NULL,
  `list_conference` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `document_1_path` varchar(255) DEFAULT NULL,
  `document_2_path` varchar(255) DEFAULT NULL,
  `document_3_path` varchar(255) DEFAULT NULL,
  `document_4_path` varchar(255) DEFAULT NULL,
  `document_5_path` varchar(255) DEFAULT NULL,
  `document_6_path` varchar(255) DEFAULT NULL,
  `document_7_path` varchar(255) DEFAULT NULL,
  `document_8_path` varchar(255) DEFAULT NULL,
  `document_9_path` varchar(255) DEFAULT NULL,
  `document_10_path` varchar(255) DEFAULT NULL,
  `document_11_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_details`
--

CREATE TABLE `employment_details` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Organization_Institution` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Date_of_Joining` varchar(100) DEFAULT NULL,
  `Date_of_Leaving` varchar(100) DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE `employment_history` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Organization_Institution` varchar(100) DEFAULT NULL,
  `Date_of_Joining` date DEFAULT NULL,
  `Date_of_Leaving` date DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industrial_experience`
--

CREATE TABLE `industrial_experience` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `Work_Profile` varchar(100) DEFAULT NULL,
  `Date_of_Joining` date DEFAULT NULL,
  `Date_of_Leaving` date DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masters_degree`
--

CREATE TABLE `masters_degree` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `thesis_title` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mtech`
--

CREATE TABLE `mtech` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Degree_Certificate` varchar(100) DEFAULT NULL,
  `Branch_Stream` varchar(100) DEFAULT NULL,
  `University_Institute` varchar(100) DEFAULT NULL,
  `Year_of_Joining` int(11) DEFAULT NULL,
  `Year_of_Completion` int(11) DEFAULT NULL,
  `Duration_Years` int(11) DEFAULT NULL,
  `Percentage_CGPA` decimal(5,2) DEFAULT NULL,
  `Division_Class` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inventor` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `patent_number` varchar(255) NOT NULL,
  `date_filing` date NOT NULL,
  `date_published` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE `personaldetails` (
  `First_Name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Marital_Status` varchar(20) DEFAULT NULL,
  `Category` varchar(10) DEFAULT NULL,
  `ID_Proof` varchar(50) DEFAULT NULL,
  `Father_Name` varchar(255) DEFAULT NULL,
  `Correspondence_Address` text DEFAULT NULL,
  `Permanent_Address` text DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Alternate_Mobile` varchar(20) DEFAULT NULL,
  `Alternate_Email` varchar(100) DEFAULT NULL,
  `Landline_Number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phd_thesis`
--

CREATE TABLE `phd_thesis` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `University_Institute` varchar(100) DEFAULT NULL,
  `Supervisor_Name` varchar(100) DEFAULT NULL,
  `Successful_Thesis_Date` date DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Year_of_Joining` int(11) DEFAULT NULL,
  `Award_Date` date DEFAULT NULL,
  `Thesis_Title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_societies`
--

CREATE TABLE `professional_societies` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `society_name` varchar(255) NOT NULL,
  `membership_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `summary_journal_inter` int(11) DEFAULT NULL,
  `summary_journal` int(11) DEFAULT NULL,
  `summary_conf_inter` int(11) DEFAULT NULL,
  `summary_conf_national` int(11) DEFAULT NULL,
  `patent_publish` int(11) DEFAULT NULL,
  `summary_book` int(11) DEFAULT NULL,
  `summary_book_chapter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishing`
--

CREATE TABLE `publishing` (
  `id` int(11) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `journal` varchar(255) NOT NULL,
  `year_vol_page` varchar(255) NOT NULL,
  `impact` varchar(255) NOT NULL,
  `doi` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_experience`
--

CREATE TABLE `research_experience` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Institute` varchar(100) DEFAULT NULL,
  `Supervisor` varchar(100) DEFAULT NULL,
  `Date_of_Joining` date DEFAULT NULL,
  `Date_of_Leaving` date DEFAULT NULL,
  `Duration` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `scholar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Exam_Type` enum('10th','12th/HSC/Diploma') DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Year_of_Passing` int(11) DEFAULT NULL,
  `Percentage_Grade` varchar(20) DEFAULT NULL,
  `Division_Class` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_projects`
--

CREATE TABLE `sponsored_projects` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sponsoring_agency` varchar(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `sanctioned_amount` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teaching_experience`
--

CREATE TABLE `teaching_experience` (
  `ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Employer` varchar(100) DEFAULT NULL,
  `Course_Taught` varchar(255) DEFAULT NULL,
  `UG_PG` varchar(255) DEFAULT NULL,
  `No_of_Students` int(11) DEFAULT NULL,
  `Date_of_Joining` date DEFAULT NULL,
  `Date_of_Leaving` date DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thesis_supervision`
--

CREATE TABLE `thesis_supervision` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `thesis_title` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings_received`
--

CREATE TABLE `trainings_received` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type_of_training` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_education`
--
ALTER TABLE `additional_education`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `bachelors_degree`
--
ALTER TABLE `bachelors_degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_chapters`
--
ALTER TABLE `book_chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email` (`email`);

--
-- Indexes for table `btech`
--
ALTER TABLE `btech`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `consultancy_projects`
--
ALTER TABLE `consultancy_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `employment_details`
--
ALTER TABLE `employment_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `industrial_experience`
--
ALTER TABLE `industrial_experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `masters_degree`
--
ALTER TABLE `masters_degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtech`
--
ALTER TABLE `mtech`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `personaldetails`
--
ALTER TABLE `personaldetails`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `phd_thesis`
--
ALTER TABLE `phd_thesis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_societies`
--
ALTER TABLE `professional_societies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `publishing`
--
ALTER TABLE `publishing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `research_experience`
--
ALTER TABLE `research_experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `sponsored_projects`
--
ALTER TABLE `sponsored_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `thesis_supervision`
--
ALTER TABLE `thesis_supervision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings_received`
--
ALTER TABLE `trainings_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_education`
--
ALTER TABLE `additional_education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bachelors_degree`
--
ALTER TABLE `bachelors_degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `book_chapters`
--
ALTER TABLE `book_chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `btech`
--
ALTER TABLE `btech`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `consultancy_projects`
--
ALTER TABLE `consultancy_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employment_details`
--
ALTER TABLE `employment_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `industrial_experience`
--
ALTER TABLE `industrial_experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `masters_degree`
--
ALTER TABLE `masters_degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mtech`
--
ALTER TABLE `mtech`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `phd_thesis`
--
ALTER TABLE `phd_thesis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professional_societies`
--
ALTER TABLE `professional_societies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `publishing`
--
ALTER TABLE `publishing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1292;

--
-- AUTO_INCREMENT for table `research_experience`
--
ALTER TABLE `research_experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `scholar`
--
ALTER TABLE `scholar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `sponsored_projects`
--
ALTER TABLE `sponsored_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `thesis_supervision`
--
ALTER TABLE `thesis_supervision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `trainings_received`
--
ALTER TABLE `trainings_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_education`
--
ALTER TABLE `additional_education`
  ADD CONSTRAINT `additional_education_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `book_chapters`
--
ALTER TABLE `book_chapters`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `btech`
--
ALTER TABLE `btech`
  ADD CONSTRAINT `btech_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `employment_details`
--
ALTER TABLE `employment_details`
  ADD CONSTRAINT `employment_details_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD CONSTRAINT `employment_history_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `industrial_experience`
--
ALTER TABLE `industrial_experience`
  ADD CONSTRAINT `industrial_experience_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `mtech`
--
ALTER TABLE `mtech`
  ADD CONSTRAINT `mtech_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phd_thesis`
--
ALTER TABLE `phd_thesis`
  ADD CONSTRAINT `phd_thesis_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `publishing`
--
ALTER TABLE `publishing`
  ADD CONSTRAINT `publishing_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `research_experience`
--
ALTER TABLE `research_experience`
  ADD CONSTRAINT `research_experience_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `scholar`
--
ALTER TABLE `scholar`
  ADD CONSTRAINT `scholar_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `sponsored_projects`
--
ALTER TABLE `sponsored_projects`
  ADD CONSTRAINT `sponsored_projects_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  ADD CONSTRAINT `teaching_experience_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
