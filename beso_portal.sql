-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 03:21 PM
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
-- Database: `beso_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(5) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` longtext NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Campus` varchar(30) NOT NULL,
  `College` longtext NOT NULL,
  `Position` varchar(30) NOT NULL,
  `AccStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `Email`, `Password`, `Firstname`, `Lastname`, `Campus`, `College`, `Position`, `AccStatus`) VALUES
(1, 'head_account@sample.com', '$2y$10$FEeuoIrigbqZgvLKEaQtseEiGllKb22qMyYVeSnx4K6VGlaVY.aWm', 'Head', 'Account', 'Alangilan', '**', 'Head', 'Active'),
(2, 'staff_account@sample.com', '$2y$10$McLm4isuqwXqVCAAQEJluuGIlH9AE5AKgbrrhYfS2afebA/Mk5Qeq', 'Staff', 'Account', 'Alangilan', '*', 'Staff', 'Active'),
(3, 'cafad_coor@sample.com', '$2y$10$QImELtoL.4mlcqBKvIbr1.29pee55zwTehIyd/Rn2YmsWL7bfVkpu', 'CAFAD', 'Account', 'Alangilan', 'CAFAD', 'Coordinator', 'Active'),
(4, 'cics_coor@sample.com', '$2y$10$oTqPoxaDBx0W78urdixRLuYw7vdhlNcjHlc6iA/3aLMmNcNiSuJy2', 'CICS', 'Account', 'Alangilan', 'CICS', 'Coordinator', 'Active'),
(5, 'cit_coor@sample.com', '$2y$10$pe4Gw/dozYYOhkiZo6u03O8vpPcdxTRuRQuSDg0FAzSpkLyTgykfq', 'CIT', 'Account', 'Alangilan', 'CIT', 'Coordinator', 'Active'),
(6, 'coe_coor@sample.com', '$2y$10$VJsu.DksPUNwg4ePvrxMOuU5uXELkx4aldRxwO6kvPw6VKyPHLtw6', 'COE', 'Account', 'Alangilan', 'COE', 'Coordinator', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `create_alangilan`
--

CREATE TABLE `create_alangilan` (
  `ProposalID` int(5) NOT NULL,
  `AccountID` int(5) NOT NULL,
  `Date_Time` varchar(30) NOT NULL,
  `Year` int(5) NOT NULL,
  `Quarter` int(5) NOT NULL,
  `Initiated` varchar(20) NOT NULL,
  `Classification` varchar(20) NOT NULL,
  `unknown` longtext NOT NULL,
  `IsGAD` varchar(10) NOT NULL,
  `Title` longtext NOT NULL,
  `Location_Area` longtext NOT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Start_Time` time DEFAULT NULL,
  `End_Time` time DEFAULT NULL,
  `TypeCES` longtext NOT NULL,
  `SDG` longtext NOT NULL,
  `Office` longtext NOT NULL,
  `Programs` longtext NOT NULL,
  `People` longtext NOT NULL,
  `Agencies` longtext NOT NULL,
  `TypeParticipants` longtext NOT NULL,
  `Male` int(5) NOT NULL,
  `Female` int(5) NOT NULL,
  `Cost` longtext NOT NULL,
  `SourceFund` longtext NOT NULL,
  `Rationale` longtext NOT NULL,
  `Objectives` longtext NOT NULL,
  `Descriptions` longtext NOT NULL,
  `Functional` longtext NOT NULL,
  `Frequency` longtext NOT NULL,
  `Monitoring` longtext NOT NULL,
  `ProjectStatus` varchar(100) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Sign1_1` varchar(100) NOT NULL,
  `Sign1_2` varchar(100) NOT NULL,
  `Sign2_1` varchar(100) NOT NULL,
  `Sign2_2` varchar(100) NOT NULL,
  `Sign3_1` varchar(100) NOT NULL,
  `Sign3_2` varchar(100) NOT NULL,
  `Sign4_1` varchar(100) NOT NULL,
  `Sign4_2` varchar(100) NOT NULL,
  `Sign5_1` varchar(100) NOT NULL,
  `Sign5_2` varchar(100) NOT NULL,
  `Remarks_2` varchar(100) NOT NULL,
  `Remarks_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custom_alangilan`
--

CREATE TABLE `custom_alangilan` (
  `Year` int(5) NOT NULL,
  `Quarter` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_alangilan`
--

INSERT INTO `custom_alangilan` (`Year`, `Quarter`) VALUES
(2023, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_targets`
--

CREATE TABLE `dashboard_targets` (
  `TargetID` int(5) NOT NULL,
  `Year` int(5) NOT NULL,
  `CAFAD_A_Q1` int(5) NOT NULL,
  `CAFAD_A_Q2` int(5) NOT NULL,
  `CAFAD_A_Q3` int(5) NOT NULL,
  `CAFAD_A_Q4` int(5) NOT NULL,
  `CAFAD_A_T` int(5) NOT NULL,
  `CAFAD_B_Q1` int(5) NOT NULL,
  `CAFAD_B_Q2` int(5) NOT NULL,
  `CAFAD_B_Q3` int(5) NOT NULL,
  `CAFAD_B_Q4` int(5) NOT NULL,
  `CAFAD_B_T` int(5) NOT NULL,
  `CAFAD_C_Q1` int(5) NOT NULL,
  `CAFAD_C_Q2` int(5) NOT NULL,
  `CAFAD_C_Q3` int(5) NOT NULL,
  `CAFAD_C_Q4` int(5) NOT NULL,
  `CAFAD_C_T` int(5) NOT NULL,
  `CAFAD_D_Q1` int(5) NOT NULL,
  `CAFAD_D_Q2` int(5) NOT NULL,
  `CAFAD_D_Q3` int(5) NOT NULL,
  `CAFAD_D_Q4` int(5) NOT NULL,
  `CAFAD_D_T` int(5) NOT NULL,
  `COE_A_Q1` int(5) NOT NULL,
  `COE_A_Q2` int(5) NOT NULL,
  `COE_A_Q3` int(5) NOT NULL,
  `COE_A_Q4` int(5) NOT NULL,
  `COE_A_T` int(5) NOT NULL,
  `COE_B_Q1` int(5) NOT NULL,
  `COE_B_Q2` int(5) NOT NULL,
  `COE_B_Q3` int(5) NOT NULL,
  `COE_B_Q4` int(5) NOT NULL,
  `COE_B_T` int(5) NOT NULL,
  `COE_C_Q1` int(5) NOT NULL,
  `COE_C_Q2` int(5) NOT NULL,
  `COE_C_Q3` int(5) NOT NULL,
  `COE_C_Q4` int(5) NOT NULL,
  `COE_C_T` int(5) NOT NULL,
  `COE_D_Q1` int(5) NOT NULL,
  `COE_D_Q2` int(5) NOT NULL,
  `COE_D_Q3` int(5) NOT NULL,
  `COE_D_Q4` int(5) NOT NULL,
  `COE_D_T` int(5) NOT NULL,
  `CICS_A_Q1` int(5) NOT NULL,
  `CICS_A_Q2` int(5) NOT NULL,
  `CICS_A_Q3` int(5) NOT NULL,
  `CICS_A_Q4` int(5) NOT NULL,
  `CICS_A_T` int(5) NOT NULL,
  `CICS_B_Q1` int(5) NOT NULL,
  `CICS_B_Q2` int(5) NOT NULL,
  `CICS_B_Q3` int(5) NOT NULL,
  `CICS_B_Q4` int(5) NOT NULL,
  `CICS_B_T` int(5) NOT NULL,
  `CICS_C_Q1` int(5) NOT NULL,
  `CICS_C_Q2` int(5) NOT NULL,
  `CICS_C_Q3` int(5) NOT NULL,
  `CICS_C_Q4` int(5) NOT NULL,
  `CICS_C_T` int(5) NOT NULL,
  `CICS_D_Q1` int(5) NOT NULL,
  `CICS_D_Q2` int(5) NOT NULL,
  `CICS_D_Q3` int(5) NOT NULL,
  `CICS_D_Q4` int(5) NOT NULL,
  `CICS_D_T` int(5) NOT NULL,
  `CIT_A_Q1` int(5) NOT NULL,
  `CIT_A_Q2` int(5) NOT NULL,
  `CIT_A_Q3` int(5) NOT NULL,
  `CIT_A_Q4` int(5) NOT NULL,
  `CIT_A_T` int(5) NOT NULL,
  `CIT_B_Q1` int(5) NOT NULL,
  `CIT_B_Q2` int(5) NOT NULL,
  `CIT_B_Q3` int(5) NOT NULL,
  `CIT_B_Q4` int(5) NOT NULL,
  `CIT_B_T` int(5) NOT NULL,
  `CIT_C_Q1` int(5) NOT NULL,
  `CIT_C_Q2` int(5) NOT NULL,
  `CIT_C_Q3` int(5) NOT NULL,
  `CIT_C_Q4` int(5) NOT NULL,
  `CIT_C_T` int(5) NOT NULL,
  `CIT_D_Q1` int(5) NOT NULL,
  `CIT_D_Q2` int(5) NOT NULL,
  `CIT_D_Q3` int(5) NOT NULL,
  `CIT_D_Q4` int(5) NOT NULL,
  `CIT_D_T` int(5) NOT NULL,
  `TOTAL_A_Q1` int(5) NOT NULL,
  `TOTAL_A_Q2` int(5) NOT NULL,
  `TOTAL_A_Q3` int(5) NOT NULL,
  `TOTAL_A_Q4` int(5) NOT NULL,
  `TOTAL_A` int(5) NOT NULL,
  `TOTAL_B_Q1` int(5) NOT NULL,
  `TOTAL_B_Q2` int(5) NOT NULL,
  `TOTAL_B_Q3` int(5) NOT NULL,
  `TOTAL_B_Q4` int(5) NOT NULL,
  `TOTAL_B` int(5) NOT NULL,
  `TOTAL_C_Q1` int(5) NOT NULL,
  `TOTAL_C_Q2` int(5) NOT NULL,
  `TOTAL_C_Q3` int(5) NOT NULL,
  `TOTAL_C_Q4` int(5) NOT NULL,
  `TOTAL_C` int(5) NOT NULL,
  `PercentageTotal` int(5) NOT NULL,
  `Budget` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_alangilan`
--

CREATE TABLE `evaluation_alangilan` (
  `EvaluationID` int(5) NOT NULL,
  `ProposalID` int(5) NOT NULL,
  `Author` int(5) NOT NULL,
  `Evaluator` int(5) NOT NULL,
  `Date_Time` varchar(100) NOT NULL,
  `Year` int(5) NOT NULL,
  `Quarter` int(5) NOT NULL,
  `Title` longtext NOT NULL,
  `Location_Area` longtext NOT NULL,
  `DateImplement` longtext NOT NULL,
  `HoursImplement` longtext NOT NULL,
  `Office` longtext NOT NULL,
  `Agency` longtext NOT NULL,
  `TypeCES` longtext NOT NULL,
  `SDG` longtext NOT NULL,
  `Beneficiaries` longtext NOT NULL,
  `M1` int(5) NOT NULL,
  `M2` int(5) NOT NULL,
  `MT` int(5) NOT NULL,
  `F1` int(5) NOT NULL,
  `F2` int(5) NOT NULL,
  `FT` int(5) NOT NULL,
  `MFT` int(5) NOT NULL,
  `People` longtext NOT NULL,
  `Objectives` longtext NOT NULL,
  `Narrative` longtext NOT NULL,
  `Eval1A1` int(5) NOT NULL,
  `Eval1A2` int(5) NOT NULL,
  `Eval1AT` int(5) NOT NULL,
  `Eval1B1` int(5) NOT NULL,
  `Eval1B2` int(5) NOT NULL,
  `Eval1BT` int(5) NOT NULL,
  `Eval1C1` int(5) NOT NULL,
  `Eval1C2` int(5) NOT NULL,
  `Eval1CT` int(5) NOT NULL,
  `Eval1D1` int(5) NOT NULL,
  `Eval1D2` int(5) NOT NULL,
  `Eval1DT` int(5) NOT NULL,
  `Eval1E1` int(5) NOT NULL,
  `Eval1E2` int(5) NOT NULL,
  `Eval1ET` int(5) NOT NULL,
  `Eval2A1` int(11) NOT NULL,
  `Eval2A2` int(11) NOT NULL,
  `Eval2AT` int(5) NOT NULL,
  `Eval2B1` int(5) NOT NULL,
  `Eval2B2` int(5) NOT NULL,
  `Eval2BT` int(5) NOT NULL,
  `Eval2C1` int(5) NOT NULL,
  `Eval2C2` int(5) NOT NULL,
  `Eval2CT` int(5) NOT NULL,
  `Eval2D1` int(5) NOT NULL,
  `Eval2D2` int(5) NOT NULL,
  `Eval2DT` int(5) NOT NULL,
  `Eval2E1` int(5) NOT NULL,
  `Eval2E2` int(5) NOT NULL,
  `Eval2ET` int(5) NOT NULL,
  `Pic1` longblob DEFAULT NULL,
  `Caption1` longtext NOT NULL,
  `Pic2` longblob DEFAULT NULL,
  `Caption2` longtext NOT NULL,
  `Pic3` longblob DEFAULT NULL,
  `Caption3` longtext NOT NULL,
  `ProjectStatus` longtext NOT NULL,
  `Remarks` longtext NOT NULL,
  `Sign1_1` longtext NOT NULL,
  `Sign1_2` longtext NOT NULL,
  `Sign2_1` longtext NOT NULL,
  `Sign2_2` longtext NOT NULL,
  `Sign3_1` longtext NOT NULL,
  `Sign3_2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financial_plan_monitoring`
--

CREATE TABLE `financial_plan_monitoring` (
  `FPID` int(5) NOT NULL,
  `MonitoringID` int(5) NOT NULL,
  `ProposalID` int(11) NOT NULL,
  `Item_1` longtext NOT NULL,
  `Qty_1` int(5) NOT NULL,
  `Unit_1` longtext NOT NULL,
  `Cost_1` int(5) NOT NULL,
  `Total_1` int(5) NOT NULL,
  `Item_2` longtext NOT NULL,
  `Qty_2` int(5) NOT NULL,
  `Unit_2` longtext NOT NULL,
  `Cost_2` int(5) NOT NULL,
  `Total_2` int(5) NOT NULL,
  `Item_3` longtext NOT NULL,
  `Qty_3` int(5) NOT NULL,
  `Unit_3` longtext NOT NULL,
  `Cost_3` int(5) NOT NULL,
  `Total_3` int(5) NOT NULL,
  `Item_4` longtext NOT NULL,
  `Qty_4` int(5) NOT NULL,
  `Unit_4` longtext NOT NULL,
  `Cost_4` int(5) NOT NULL,
  `Total_4` int(5) NOT NULL,
  `Item_5` longtext NOT NULL,
  `Qty_5` int(5) NOT NULL,
  `Unit_5` longtext NOT NULL,
  `Cost_5` int(5) NOT NULL,
  `Total_5` int(5) NOT NULL,
  `Item_6` longtext NOT NULL,
  `Qty_6` int(5) NOT NULL,
  `Unit_6` longtext NOT NULL,
  `Cost_6` int(5) NOT NULL,
  `Total_6` int(5) NOT NULL,
  `Item_7` longtext NOT NULL,
  `Qty_7` int(5) NOT NULL,
  `Unit_7` longtext NOT NULL,
  `Cost_7` int(5) NOT NULL,
  `Total_7` int(5) NOT NULL,
  `Item_8` longtext NOT NULL,
  `Qty_8` int(5) NOT NULL,
  `Unit_8` longtext NOT NULL,
  `Cost_8` int(5) NOT NULL,
  `Total_8` int(5) NOT NULL,
  `Item_9` longtext NOT NULL,
  `Qty_9` int(5) NOT NULL,
  `Unit_9` longtext NOT NULL,
  `Cost_9` int(5) NOT NULL,
  `Total_9` int(5) NOT NULL,
  `Item_10` longtext NOT NULL,
  `Qty_10` int(5) NOT NULL,
  `Unit_10` longtext NOT NULL,
  `Cost_10` int(5) NOT NULL,
  `Total_10` int(5) NOT NULL,
  `Item_11` longtext NOT NULL,
  `Qty_11` int(5) NOT NULL,
  `Unit_11` longtext NOT NULL,
  `Cost_11` int(5) NOT NULL,
  `Total_11` int(5) NOT NULL,
  `Item_12` longtext NOT NULL,
  `Qty_12` int(5) NOT NULL,
  `Unit_12` longtext NOT NULL,
  `Cost_12` int(5) NOT NULL,
  `Total_12` int(5) NOT NULL,
  `Item_13` longtext NOT NULL,
  `Qty_13` int(5) NOT NULL,
  `Unit_13` longtext NOT NULL,
  `Cost_13` int(5) NOT NULL,
  `Total_13` int(5) NOT NULL,
  `Item_14` longtext NOT NULL,
  `Qty_14` int(5) NOT NULL,
  `Unit_14` longtext NOT NULL,
  `Cost_14` int(5) NOT NULL,
  `Total_14` int(5) NOT NULL,
  `Item_15` longtext NOT NULL,
  `Qty_15` int(5) NOT NULL,
  `Unit_15` longtext NOT NULL,
  `Cost_15` int(5) NOT NULL,
  `Total_15` int(5) NOT NULL,
  `Item_16` longtext NOT NULL,
  `Qty_16` int(5) NOT NULL,
  `Unit_16` longtext NOT NULL,
  `Cost_16` int(5) NOT NULL,
  `Total_16` int(5) NOT NULL,
  `Item_17` longtext NOT NULL,
  `Qty_17` int(5) NOT NULL,
  `Unit_17` longtext NOT NULL,
  `Cost_17` int(5) NOT NULL,
  `Total_17` int(5) NOT NULL,
  `Item_18` longtext NOT NULL,
  `Qty_18` int(5) NOT NULL,
  `Unit_18` longtext NOT NULL,
  `Cost_18` int(5) NOT NULL,
  `Total_18` int(5) NOT NULL,
  `Item_19` longtext NOT NULL,
  `Qty_19` int(5) NOT NULL,
  `Unit_19` longtext NOT NULL,
  `Cost_19` int(5) NOT NULL,
  `Total_19` int(5) NOT NULL,
  `Item_20` longtext NOT NULL,
  `Qty_20` int(5) NOT NULL,
  `Unit_20` longtext NOT NULL,
  `Cost_20` int(5) NOT NULL,
  `Total_20` int(5) NOT NULL,
  `GrandTotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financial_plan_proposal`
--

CREATE TABLE `financial_plan_proposal` (
  `FPID` int(5) NOT NULL,
  `ProposalID` int(5) NOT NULL,
  `Item_1` longtext NOT NULL,
  `Qty_1` int(5) NOT NULL,
  `Unit_1` longtext NOT NULL,
  `Cost_1` int(5) NOT NULL,
  `Total_1` int(5) NOT NULL,
  `Item_2` longtext NOT NULL,
  `Qty_2` int(5) NOT NULL,
  `Unit_2` longtext NOT NULL,
  `Cost_2` int(5) NOT NULL,
  `Total_2` int(5) NOT NULL,
  `Item_3` longtext NOT NULL,
  `Qty_3` int(5) NOT NULL,
  `Unit_3` longtext NOT NULL,
  `Cost_3` int(5) NOT NULL,
  `Total_3` int(5) NOT NULL,
  `Item_4` longtext NOT NULL,
  `Qty_4` int(5) NOT NULL,
  `Unit_4` longtext NOT NULL,
  `Cost_4` int(5) NOT NULL,
  `Total_4` int(5) NOT NULL,
  `Item_5` longtext NOT NULL,
  `Qty_5` int(5) NOT NULL,
  `Unit_5` longtext NOT NULL,
  `Cost_5` int(5) NOT NULL,
  `Total_5` int(5) NOT NULL,
  `Item_6` longtext NOT NULL,
  `Qty_6` int(5) NOT NULL,
  `Unit_6` longtext NOT NULL,
  `Cost_6` int(5) NOT NULL,
  `Total_6` int(5) NOT NULL,
  `Item_7` longtext NOT NULL,
  `Qty_7` int(5) NOT NULL,
  `Unit_7` longtext NOT NULL,
  `Cost_7` int(5) NOT NULL,
  `Total_7` int(5) NOT NULL,
  `Item_8` longtext NOT NULL,
  `Qty_8` int(5) NOT NULL,
  `Unit_8` longtext NOT NULL,
  `Cost_8` int(5) NOT NULL,
  `Total_8` int(5) NOT NULL,
  `Item_9` longtext NOT NULL,
  `Qty_9` int(5) NOT NULL,
  `Unit_9` longtext NOT NULL,
  `Cost_9` int(5) NOT NULL,
  `Total_9` int(5) NOT NULL,
  `Item_10` longtext NOT NULL,
  `Qty_10` int(5) NOT NULL,
  `Unit_10` longtext NOT NULL,
  `Cost_10` int(5) NOT NULL,
  `Total_10` int(5) NOT NULL,
  `Item_11` longtext NOT NULL,
  `Qty_11` int(5) NOT NULL,
  `Unit_11` longtext NOT NULL,
  `Cost_11` int(5) NOT NULL,
  `Total_11` int(5) NOT NULL,
  `Item_12` longtext NOT NULL,
  `Qty_12` int(5) NOT NULL,
  `Unit_12` longtext NOT NULL,
  `Cost_12` int(5) NOT NULL,
  `Total_12` int(5) NOT NULL,
  `Item_13` longtext NOT NULL,
  `Qty_13` int(5) NOT NULL,
  `Unit_13` longtext NOT NULL,
  `Cost_13` int(5) NOT NULL,
  `Total_13` int(5) NOT NULL,
  `Item_14` longtext NOT NULL,
  `Qty_14` int(5) NOT NULL,
  `Unit_14` longtext NOT NULL,
  `Cost_14` int(5) NOT NULL,
  `Total_14` int(5) NOT NULL,
  `Item_15` longtext NOT NULL,
  `Qty_15` int(5) NOT NULL,
  `Unit_15` longtext NOT NULL,
  `Cost_15` int(5) NOT NULL,
  `Total_15` int(5) NOT NULL,
  `Item_16` longtext NOT NULL,
  `Qty_16` int(5) NOT NULL,
  `Unit_16` longtext NOT NULL,
  `Cost_16` int(5) NOT NULL,
  `Total_16` int(5) NOT NULL,
  `Item_17` longtext NOT NULL,
  `Qty_17` int(5) NOT NULL,
  `Unit_17` longtext NOT NULL,
  `Cost_17` int(5) NOT NULL,
  `Total_17` int(5) NOT NULL,
  `Item_18` longtext NOT NULL,
  `Qty_18` int(5) NOT NULL,
  `Unit_18` longtext NOT NULL,
  `Cost_18` int(5) NOT NULL,
  `Total_18` int(5) NOT NULL,
  `Item_19` longtext NOT NULL,
  `Qty_19` int(5) NOT NULL,
  `Unit_19` longtext NOT NULL,
  `Cost_19` int(5) NOT NULL,
  `Total_19` int(5) NOT NULL,
  `Item_20` longtext NOT NULL,
  `Qty_20` int(5) NOT NULL,
  `Unit_20` longtext NOT NULL,
  `Cost_20` int(5) NOT NULL,
  `Total_20` int(5) NOT NULL,
  `GrandTotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_alangilan`
--

CREATE TABLE `monitoring_alangilan` (
  `MonitoringID` int(5) NOT NULL,
  `ProposalID` int(5) NOT NULL,
  `Author` int(5) NOT NULL,
  `Evaluator` int(5) NOT NULL,
  `Date_Time` varchar(100) NOT NULL,
  `Year` int(5) NOT NULL,
  `Quarter` int(5) NOT NULL,
  `Title` longtext NOT NULL,
  `Location_Area` longtext NOT NULL,
  `Duration` longtext NOT NULL,
  `TypeCES` longtext NOT NULL,
  `SDG` longtext NOT NULL,
  `Office` longtext NOT NULL,
  `Programs` longtext NOT NULL,
  `People` longtext NOT NULL,
  `Agency` longtext NOT NULL,
  `Beneficiaries` longtext NOT NULL,
  `PS1` longtext NOT NULL,
  `PS2` longtext NOT NULL,
  `PS3` longtext NOT NULL,
  `PS5` longtext NOT NULL,
  `PS6` longtext NOT NULL,
  `PS7` longtext NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Sign1_1` varchar(100) NOT NULL,
  `Sign1_2` varchar(100) NOT NULL,
  `Sign2_1` varchar(100) NOT NULL,
  `Sign2_2` varchar(100) NOT NULL,
  `Sign3_1` varchar(100) NOT NULL,
  `Sign3_2` varchar(100) NOT NULL,
  `Last_Monitored` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signatories_alangilan`
--

CREATE TABLE `signatories_alangilan` (
  `SignID` int(5) NOT NULL,
  `Persons_Name` longtext NOT NULL,
  `Position` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signatories_alangilan`
--

INSERT INTO `signatories_alangilan` (`SignID`, `Persons_Name`, `Position`) VALUES
(1, 'DR. ELISA D. GUTIERREZ', ''),
(2, '', 'Vice Chancellor for Research Development and Extension Services'),
(3, 'DR. TIRSO A. RONQUILLO', ''),
(4, '', 'University President'),
(5, 'PROF. MYRNA A. COLIAT', ''),
(6, '', 'Vice Chancellor for Administration and Finance'),
(7, 'ASSOC. PROF. MARIA THERESA A. HERNANDEZ', ''),
(8, '', 'Assistant Director for GAD Advocacies'),
(9, 'ENGR. EDZEL M. GAMAB', ''),
(10, '', 'Head, Extension Services');

-- --------------------------------------------------------

--
-- Table structure for table `sustainability_plan_proposal`
--

CREATE TABLE `sustainability_plan_proposal` (
  `SPID` int(5) NOT NULL,
  `ProposalID` int(5) NOT NULL,
  `Sustainability` longtext NOT NULL,
  `Activities_1` longtext NOT NULL,
  `Sched_1` longtext NOT NULL,
  `Involved_1` longtext NOT NULL,
  `Activities_2` longtext NOT NULL,
  `Sched_2` longtext NOT NULL,
  `Involved_2` longtext NOT NULL,
  `Activities_3` longtext NOT NULL,
  `Sched_3` longtext NOT NULL,
  `Involved_3` longtext NOT NULL,
  `Activities_4` longtext NOT NULL,
  `Sched_4` longtext NOT NULL,
  `Involved_4` longtext NOT NULL,
  `Activities_5` longtext NOT NULL,
  `Sched_5` longtext NOT NULL,
  `Involved_5` longtext NOT NULL,
  `Activities_6` longtext NOT NULL,
  `Sched_6` longtext NOT NULL,
  `Involved_6` longtext NOT NULL,
  `Activities_7` longtext NOT NULL,
  `Sched_7` longtext NOT NULL,
  `Involved_7` longtext NOT NULL,
  `Activities_8` longtext NOT NULL,
  `Sched_8` longtext NOT NULL,
  `Involved_8` longtext NOT NULL,
  `Activities_9` longtext NOT NULL,
  `Sched_9` longtext NOT NULL,
  `Involved_9` longtext NOT NULL,
  `Activities_10` longtext NOT NULL,
  `Sched_10` longtext NOT NULL,
  `Involved_10` longtext NOT NULL,
  `Activities_11` longtext NOT NULL,
  `Sched_11` longtext NOT NULL,
  `Involved_11` longtext NOT NULL,
  `Activities_12` longtext NOT NULL,
  `Sched_12` longtext NOT NULL,
  `Involved_12` longtext NOT NULL,
  `Activities_13` longtext NOT NULL,
  `Sched_13` longtext NOT NULL,
  `Involved_13` longtext NOT NULL,
  `Activities_14` longtext NOT NULL,
  `Sched_14` longtext NOT NULL,
  `Involved_14` longtext NOT NULL,
  `Activities_15` longtext NOT NULL,
  `Sched_15` longtext NOT NULL,
  `Involved_15` longtext NOT NULL,
  `Activities_16` longtext NOT NULL,
  `Sched_16` longtext NOT NULL,
  `Involved_16` longtext NOT NULL,
  `Activities_17` longtext NOT NULL,
  `Sched_17` longtext NOT NULL,
  `Involved_17` longtext NOT NULL,
  `Activities_18` longtext NOT NULL,
  `Sched_18` longtext NOT NULL,
  `Involved_18` longtext NOT NULL,
  `Activities_19` longtext NOT NULL,
  `Sched_19` longtext NOT NULL,
  `Involved_19` longtext NOT NULL,
  `Activities_20` longtext NOT NULL,
  `Sched_20` longtext NOT NULL,
  `Involved_20` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `create_alangilan`
--
ALTER TABLE `create_alangilan`
  ADD PRIMARY KEY (`ProposalID`),
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `Year` (`Year`,`Quarter`);

--
-- Indexes for table `custom_alangilan`
--
ALTER TABLE `custom_alangilan`
  ADD PRIMARY KEY (`Year`);

--
-- Indexes for table `dashboard_targets`
--
ALTER TABLE `dashboard_targets`
  ADD PRIMARY KEY (`TargetID`);

--
-- Indexes for table `evaluation_alangilan`
--
ALTER TABLE `evaluation_alangilan`
  ADD PRIMARY KEY (`EvaluationID`),
  ADD UNIQUE KEY `ProposalID` (`ProposalID`),
  ADD KEY `Author` (`Author`,`Evaluator`),
  ADD KEY `Year` (`Year`,`Quarter`);

--
-- Indexes for table `financial_plan_monitoring`
--
ALTER TABLE `financial_plan_monitoring`
  ADD PRIMARY KEY (`FPID`),
  ADD KEY `MonitoringID` (`MonitoringID`);

--
-- Indexes for table `financial_plan_proposal`
--
ALTER TABLE `financial_plan_proposal`
  ADD PRIMARY KEY (`FPID`),
  ADD UNIQUE KEY `ProposalID` (`ProposalID`);

--
-- Indexes for table `monitoring_alangilan`
--
ALTER TABLE `monitoring_alangilan`
  ADD PRIMARY KEY (`MonitoringID`),
  ADD KEY `ProposalID` (`ProposalID`),
  ADD KEY `Author` (`Author`),
  ADD KEY `Evaluator` (`Evaluator`),
  ADD KEY `Year` (`Year`,`Quarter`);

--
-- Indexes for table `signatories_alangilan`
--
ALTER TABLE `signatories_alangilan`
  ADD PRIMARY KEY (`SignID`);

--
-- Indexes for table `sustainability_plan_proposal`
--
ALTER TABLE `sustainability_plan_proposal`
  ADD PRIMARY KEY (`SPID`),
  ADD KEY `ProposalID` (`ProposalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `create_alangilan`
--
ALTER TABLE `create_alangilan`
  MODIFY `ProposalID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboard_targets`
--
ALTER TABLE `dashboard_targets`
  MODIFY `TargetID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_alangilan`
--
ALTER TABLE `evaluation_alangilan`
  MODIFY `EvaluationID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_plan_monitoring`
--
ALTER TABLE `financial_plan_monitoring`
  MODIFY `FPID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_plan_proposal`
--
ALTER TABLE `financial_plan_proposal`
  MODIFY `FPID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_alangilan`
--
ALTER TABLE `monitoring_alangilan`
  MODIFY `MonitoringID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signatories_alangilan`
--
ALTER TABLE `signatories_alangilan`
  MODIFY `SignID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sustainability_plan_proposal`
--
ALTER TABLE `sustainability_plan_proposal`
  MODIFY `SPID` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
