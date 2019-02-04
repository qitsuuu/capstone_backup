-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 12:11 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcasesps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy_tbl`
--

CREATE TABLE `brgy_tbl` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brgy_tbl`
--

INSERT INTO `brgy_tbl` (`brgy_id`, `brgy_name`) VALUES
(1, 'Alua'),
(2, 'Calaba'),
(3, 'Malapit'),
(4, 'Mangga'),
(5, 'Poblacion'),
(6, 'Pulo'),
(7, 'San Roque'),
(8, 'Sto. Cristo'),
(9, 'Tabon');

-- --------------------------------------------------------

--
-- Table structure for table `hcases_tbl`
--

CREATE TABLE `hcases_tbl` (
  `hcase_id` int(11) NOT NULL,
  `hcase_name` varchar(255) NOT NULL,
  `hcase_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hcases_tbl`
--

INSERT INTO `hcases_tbl` (`hcase_id`, `hcase_name`, `hcase_desc`) VALUES
(1, 'Bronchial Asthma', ''),
(2, 'Cancer', ''),
(3, 'Chicken Pox / Herpes Zoster', NULL),
(4, 'Dengue Fever', 'An acute mosquito-borne viral illness of sudden onset with headache, fever, prostration, severe joint and muscle pain, swollen glands (lymphadenopathy), and rash. The presence of fever, rash, and headache (the \'dengue triad\') is characteristic. Dengue fever is endemic throughout the tropics and subtropics. Also called breakbone fever, dandy fever, and dengue. Victims of dengue fever often suffer temporary contortions due to the intense joint and muscle pain.'),
(5, 'Diabetis', NULL),
(6, 'Diarrhea', 'A common condition that involves unusually frequent and liquid bowel movements. The opposite of constipation. There are many infectious and noninfectious causes of diarrhea. Persistent diarrhea is both uncomfortable and dangerous to the health because it can indicate an underlying infection and may mean that the body is not able to absorb some nutrients due to a problem in the bowels. Treatment includes drinking plenty of fluids to prevent dehydration and taking over-the-counter remedies. People with diarrhea that persists for more than a couple days, particularly small children or elderly people, should seek medical attention'),
(7, 'Diptheria', NULL),
(8, 'Diseases of the Heart', NULL),
(9, 'Dogbite / Animal Bite', NULL),
(10, 'Essential Hypertension', 'Hypertension is a progressive CV syndrome arising from complex and interrelated etiologies. Early markers of the syndrome are often present before BP elevation is sustained; therefore, hypertension cannot be classified solely by discrete BP thresholds. Progression is strongly associated with functional and structural cardiac and vascular abnormalities that damage the heart, kidneys, brain, vasculature, and other organs and lead to premature morbidity and death.7 Reduction of BP when target organ damage is demonstrable or the functional precursor of target organ damage is present and still reversible generally reduces the risk for CV events. Note that we separate elevated BP (one manifestation of the disease) from hypertension (the disease).'),
(11, 'Influenza', NULL),
(12, 'Intestinal Parasitism', NULL),
(13, 'Leprosy', NULL),
(14, 'Malignant Neoplasm', NULL),
(15, 'Pneumonia', NULL),
(16, 'Pyodermas', NULL),
(17, 'Rabies (Human)', 'An acute virus disease of the nervous system of mammals that is caused by a rhabdovirus (species Rabies virus of the genus Lyssavirus).A very serious and often fatal disease that affects animals (such as dogs) and that can be passed on to people if an infected animal bites them and usually transmitted through the bite of a rabid animal and that is characterized typically by increased salivation, abnormal behavior, and eventual paralysis and death when untreated.\r\n'),
(18, 'Respiratory Tract Infection', NULL),
(19, 'TB (Tuberculosis', 'Tuberculosis(TB)\r\n-Tuberculosis is an infectious disease usually caused by the bacterium Mycobacterium tuberculosis (MTB).Tuberculosis generally affects the lungs, but can also affect other parts of the body.Most infections do not have symptoms, in which case it is known as latent tuberculosis.About 10% of latent infections progress to active disease which, if left untreated, kills about half of those infected.The classic symptoms of active TB are a chronic cough with blood-containing sputum, fever, night sweats, and weight loss.The historical term \"consumption\" came about due to the weight loss.Infection of other organs can cause a wide range of symptoms.Tuberculosis is spread through the air when people who have active TB in their lungs cough, spit, speak, or sneeze.People with latent TB do not spread the disease.Active infection occurs more often in people with HIV/AIDS and in those who smoke.Diagnosis of active TB is based on chest X-rays, as well as microscopic examination and culture of body fluids.Diagnosis of latent TB relies on the tuberculin skin test (TST) or blood tests.'),
(20, 'Tetanus', NULL),
(21, 'Urinary Tract Infection', 'An infection of the kidney, ureter, bladder, or urethra. Abbreviated UTI. Not everyone with a UTI has symptoms, but common symptoms include a frequent urge to urinate and pain or burning when urinating. More females than males have UTIs. Underlying conditions that physically obstruct and impair the normal urinary flow, such as the formation of cysts within the urinary tract, can lead to complicated UTIs. Treatment usually involves increased fluid intake and use of antibiotics. In cases where physical obstruction is present, special medications or surgery may be necessary.'),
(22, 'Viral Hepatitis', NULL),
(23, 'Whooping Cough', NULL),
(24, 'Empysema', ''),
(26, 'Leptospirosis', 'Leptospirosis is a bacterial disease that affects both humans and animals. Humans become infected through direct contact with the urine of infected animals or with a urine-contaminated environment. The bacteria enter the body through cuts or abrasions on the skin, or through the mucous membranes of the mouth, nose and eyes. Person-to-person transmission is rare.\r\nIn the early stages of the disease, symptoms include high fever, severe headache, muscle pain, chills, redness of the eyes, abdominal pain, jaundice, haemorrhages in the skin and mucous membranes, vomiting, diarrhoea, and rash.');

-- --------------------------------------------------------

--
-- Table structure for table `persons_tbl`
--

CREATE TABLE `persons_tbl` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `per_bday` date NOT NULL,
  `per_age` varchar(20) DEFAULT NULL,
  `per_sex` varchar(6) NOT NULL,
  `per_height` float DEFAULT NULL,
  `per_weight` float DEFAULT NULL,
  `per_bmi` float DEFAULT NULL,
  `per_hcaseid` int(11) DEFAULT NULL,
  `per_roleid` varchar(20) DEFAULT NULL,
  `per_houseNo` int(5) DEFAULT NULL,
  `per_street` varchar(20) DEFAULT NULL,
  `per_brgyid` int(11) DEFAULT NULL,
  `per_reportdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons_tbl`
--

INSERT INTO `persons_tbl` (`per_id`, `per_name`, `lname`, `mname`, `suffix`, `per_bday`, `per_age`, `per_sex`, `per_height`, `per_weight`, `per_bmi`, `per_hcaseid`, `per_roleid`, `per_houseNo`, `per_street`, `per_brgyid`, `per_reportdate`) VALUES
(95, 'Joana', 'Dela Cruz', 'Santos', '', '1998-05-17', '20', 'Male', 1.67, 123, 2.7889, 6, 'patient', 123, 'Gonzales St.', 8, '2018-11-15'),
(96, 'Silveria', 'Padusdus', 'Mandos', '', '2018-11-19', 'Few Months ', 'Male', 1.28, 54, 1.6384, 7, 'patient', 56, 'Dumagnit', 5, '2018-05-19'),
(97, 'Dianne', 'Savila', 'Carpio', '', '2018-11-04', 'Few Months ', 'Male', 1.28, 67, 1.6384, 13, 'patient', 788, 'Calumpit St.', 8, '2018-12-06'),
(98, 'John', 'Litio', 'Manuel', 'Jr.', '2018-11-12', 'Few Months ', 'Male', 2, 56, 4, 15, 'patient', 123, 'Elipane St.', 3, '2018-05-06'),
(99, 'Tyron', 'Yusong', 'Diaz', '', '2018-11-05', 'Few Months ', 'Female', 1.67, 45, 2.7889, 13, 'patient', 565, 'Cubcuban', 4, '2018-05-17'),
(100, 'Dianne', 'Juan', 'Cusio', 'Jr.', '1998-05-17', '20', 'Male', 1.78, 56, 3.1684, 2, 'patient', 453, 'Cecilio St.', 1, '2018-10-28'),
(101, 'jennalyn', 'jimena', 'cristobal', ' ', '1994-11-27', '23', 'female', 1.67, 55, 2.7889, 5, 'patient', 222, 'Cecilio St.', 5, '2016-05-28'),
(103, 'Hernan', 'Herrera', 'Go', '', '2018-11-11', 'Few Months ', 'Female', 1.26, 45, 1.5876, 5, 'patient', 43, 'Cecilio St.', 3, '2018-05-17'),
(104, 'kevin', 'jimena', 'pabillo', 'none', '1993-07-20', '25', 'Male', 1.65, 54, 198347, 17, 'patient', 1243, 'Dike', 5, '2010-11-01'),
(105, 'matthew', 'mariano', 'mariano', 'none', '2000-08-28', '18', 'Male', 1.65, 54, 2.7225, 19, 'patient', 1267, 'Elipane St.', 9, '2018-11-12'),
(107, 'rafael', 'francisco', 'matias', '', '1999-11-18', '18', 'Male', 1.65, 59, 2.7225, 15, 'patient', 1222, 'Dike', 5, '2016-09-14'),
(108, 'niel john', 'santos', 'santos', '', '2017-12-22', 'Few Months Old', 'Male', 1.64, 57, 211927, 17, 'patient', 1111, 'Dumagnit', 3, '2017-10-12'),
(109, 'angelo', 'gajasan', 'santos', '', '1990-11-28', '27', 'Male', 1.2, 60, 1.44, 18, 'patient', 2222, 'E. Garcia St.', 3, '2018-11-10'),
(110, 'sarrah', 'manalastas', 'salvador', '', '1988-11-20', '29', 'Female', 1.5, 50, 2.25, 20, 'patient', 1113, 'Front Cono', 7, '2017-11-01'),
(111, 'jerome', 'manalastas', 'mana', '', '1993-10-10', '25', 'Male', 1.7, 58, 2.89, 11, 'patient', 3333, 'Balite', 7, '2018-10-28'),
(113, 'jeric', 'macaspac', 'galang', '', '1990-09-20', '28', 'Male', 1.8, 60, 3.24, 6, 'patient', 1666, 'Dike', 5, '2016-11-20'),
(114, 'roi vincent', 'jimena', 'pabillo', '', '1993-02-02', '25', 'Male', 1.9, 60, 3.61, 14, 'patient', 7777, 'Elipane St.', 9, '2017-01-05'),
(115, 'patrick', 'garcia', 'simon', 'jr', '1989-02-20', '29', 'Male', 1.8, 70, 3.24, 11, 'patient', 2221, 'Cecilio St.', 5, '2016-02-02'),
(116, 'mark', 'elipane', 'san diego', 'sr', '1999-01-28', '19', 'Male', 1.6, 50, 2.56, 20, 'patient', 2211, 'B. Ortiz Poultry', 7, '2017-02-22'),
(117, 'marimar', 'mateo', 'san diego', ' ', '1995-11-26', '22', 'female', 1.2, 56, 1.44, 2, 'patient', 1234, 'Medina St.', 3, '2018-11-01'),
(118, 'Lila', 'Gaspar', 'Cruz', ' ', '1990-10-20', '28', 'Female', 1.2, 56, 1.44, 6, 'patient', 125, 'Aviado St.', 5, '2018-10-01'),
(119, 'Dondi', 'Dilima', 'Dilim', 'Jr.', '1988-09-20', '30', 'Male', 1.8, 50, 3.24, 20, 'patient', 128, 'Mesina St.', 5, '2015-10-20'),
(120, 'Rodrigo', 'Trillanes', 'Duterte', 'Jr.', '1983-03-24', '35', 'Male', 1.9, 60, 3.61, 5, 'patient', 111, 'Mesina St.', 5, '2017-12-25'),
(121, 'Richard', 'Bote', 'Dimasupil', 'Jr.', '1983-07-28', '35', 'Male', 1.7, 55, 2.89, 18, 'patient', 238, 'Centro', 9, '2015-02-02'),
(122, 'May', 'Sumpil', 'Quizon', ' ', '2000-11-24', '18', 'Female', 1.5, 66, 2.25, 11, 'patient', 115, 'Maximino St.', 2, '2012-10-01'),
(123, 'Mario', 'Sereno', 'Soco', ' ', '2013-11-10', '5', 'Male', 1.78, 62, 3.1684, 2, 'patient', 116, 'Maximino St.', 6, '2013-01-21'),
(124, 'Jessica', 'Soho', 'Sotto', ' ', '1978-01-15', '40', 'Female', 1.26, 55, 1.5867, 4, 'patient', 120, 'Cubcuban', 9, '2013-01-26'),
(125, 'Catherine', 'Matias', 'Soriano', ' ', '2008-03-15', '10', 'Female', 1.2, 35, 1.44, 17, 'patient', 144, 'Centro', 9, '2014-05-06'),
(126, 'Bernard', 'Bernardino', 'Barandino', 'Jr.', '2002-05-25', '16', 'Male', 1.5, 45, 2.25, 5, 'patient', 222, 'Sitio Barangka', 4, '2010-03-22'),
(127, 'Nognog', 'Sunog', 'Baga', 'Jr.', '1993-07-20', '25', 'Male', 1.7, 52, 2.89, 19, 'patient', 224, 'Purok 5', 4, '2010-07-20'),
(128, 'Lowla', 'Nee', 'Doray', ' ', '1968-09-05', '50', 'Female', 1.8, 56, 3.24, 20, 'patient', 200, 'Anita Subdivision', 5, '2006-07-04'),
(129, 'Artemio', 'Temyong', 'Sundo', 'Sr.', '1958-10-29', '60', 'Male', 1.78, 70, 220932, 1, 'patient', 36, 'Hererra St.', 3, '2018-12-11'),
(130, 'Lebron', 'James', 'Sulit', 'Sr.', '1943-03-22', '75', 'Male', 1.28, 45, 1.6384, 18, 'patient', 999, 'Rizal St.', 3, '2016-12-30'),
(131, 'Angel', 'Dela Cruz', 'Garcia', ' ', '1955-11-25', '62', 'Female', 1.2, 55, 1.44, 4, 'patient', 894, 'Purok 6', 6, '2000-01-03'),
(132, 'Mike', 'Toledo', 'Salsedo', 'Jr.', '1965-12-31', '52', 'Male', 1.5, 63, 2.25, 8, 'patient', 674, 'Purok 3', 6, '2018-11-01'),
(133, 'Wally', 'Delos Santos', 'Sarmiento', 'Sr.', '1960-09-29', '58', 'Male', 1.8, 47, 3.24, 11, 'patient', 668, 'Maximino St.', 2, '2014-03-28'),
(134, 'Solomon', 'Delos Reyes', 'Delamonte', ' ', '1976-12-01', '33', 'Male', 1.5, 58, 2.25, 12, 'patient', 989, 'Maximino St.', 2, '2002-05-02'),
(135, 'Daniel', 'Paddila', 'Patilla', ' ', '1963-12-25', '54', 'Female', 1.67, 61, 2.7889, 1, 'patient', 656, 'Calumpit St.', 8, '2018-10-23'),
(136, 'Dingdong', 'Dantes', 'Rivera', ' ', '2003-12-31', '14', 'Male', 2, 24, 4, 17, 'patient', 8, 'Maligaya St.', 8, '2018-09-08'),
(137, 'Maria', 'Gamboa', 'Gonzago', 'Jr.', '1979-01-21', '39', 'Male', 1.65, 48, 2.7225, 7, 'patient', 434, 'Tanchoco St.', 1, '2016-11-14'),
(138, 'Jonna', 'Milo', 'Almasan', ' ', '1972-05-18', '46', 'Female', 1.2, 53, 1.44, 14, 'patient', 90, 'Babandapo', 6, '2011-09-18'),
(139, 'Berto', 'Dampil', 'Lason', ' ', '1988-07-26', '30', 'Male', 1.64, 62, 2.6896, 16, 'patient', 340, 'Babandapo', 6, '2011-09-01'),
(140, 'Cesario', 'Lopez', 'Bernardo', ' ', '1938-03-23', '80', 'Female', 1.8, 40, 3.24, 3, 'patient', 878, 'Purok 2', 4, '2009-12-21'),
(141, 'Zoren', 'Legazpi', 'Laot', ' ', '1942-10-03', '76', 'Female', 1.5, 46, 2.25, 12, 'patient', 935, 'Purok 7', 4, '2003-12-28'),
(142, 'Gerry', 'Francisco', 'Kano', 'Jr.', '1975-08-24', '43', 'Male', 1.2, 79, 1.44, 17, 'patient', 355, 'Rizal St.', 8, '2015-04-01'),
(143, 'Sam', 'Milby', 'Nietes', ' ', '1985-11-09', '33', 'Male', 1.67, 44, 2.7889, 19, 'patient', 555, 'E. Garcia St.', 1, '2017-06-23'),
(144, 'Maria', 'Leonora', 'Teressa', ' ', '1980-11-09', '38', 'Female', 1.78, 46, 3.1684, 4, 'patient', 564, 'Purok 3', 6, '2011-11-11'),
(145, 'Eloisa', 'Sarmiento', 'Dumagit', ' ', '1976-12-09', '41', 'Female', 1.2, 53, 1.44, 1, 'patient', 763, 'Purok 1', 6, '2015-11-20'),
(146, 'Camille', 'Camella', 'Bornok', ' ', '1987-12-24', '32', 'Female', 1.2, 58, 1.44, 1, 'patient', 768, 'Mangga St.', 9, '2017-09-24'),
(148, 'Bryan', 'Tolentino', 'Martin', 'Jr.', '1990-04-10', '28', 'Male', 1.67, 48, 2.7889, 15, 'patient', 777, 'Anita Subdivision', 5, '2012-06-16'),
(149, 'Cecilia', 'Carillo', 'Bundok', ' ', '1997-03-16', '21', 'Female', 1.7, 55, 2.89, 1, 'patient', 900, 'Ventus St.', 3, '2016-11-29'),
(150, 'Glenda', 'Ortiz', 'Alcantara', ' ', '2014-12-25', '4', 'Female', 1.64, 12, 2.6896, 18, 'patient', 490, 'Ramoso St.', 3, '2003-01-23'),
(151, 'Primo', 'Sorondo', 'Geronimo', ' ', '2002-07-07', '16', 'Male', 1.7, 36, 2.89, 20, 'patient', 499, 'Medina St.', 3, '2000-06-01'),
(152, 'Gerald', 'David', 'Boromeo', ' ', '1984-09-09', '34', 'Female', 1.5, 58, 2.25, 4, 'patient', 879, 'Aviado St.', 5, '2000-07-22'),
(153, 'Rodolfo', 'Fernandez', 'Coronel', 'Jr.', '1979-11-01', '39', 'Male', 1.26, 64, 1.5876, 1, 'patient', 669, 'Purok 7', 4, '2011-12-09'),
(154, 'Carl', 'Garliardo', 'Carino', ' ', '1995-02-23', '23', 'Male', 1.64, 44, 2.6896, 20, 'patient', 333, 'Purok 1', 6, '2018-10-30'),
(155, 'Martina', 'Ermino', 'Sanchez', ' ', '1952-02-04', '66', 'Female', 1.8, 50, 3.24, 13, 'patient', 456, 'Purok 2', 6, '2018-10-21'),
(156, 'Mellisa', 'Casimiro', 'Dante', ' ', '1988-05-08', '30', 'Female', 2, 75, 4, 4, 'patient', 876, 'Hulo St.', 8, '2017-01-29'),
(157, 'Nerri Jane', 'Onay', 'Mateo', ' ', '1996-11-11', '22', 'Female', 1.2, 20, 1.44, 20, 'patient', 369, 'Franco Subdivision', 5, '2018-11-14'),
(174, 'Padilla', 'Daniel', 'Santos', '', '1998-12-04', '20', 'Male', 168, 54, 19.1327, 5, 'patient', 444, 'Dumagnit', 8, '2018-12-04'),
(234, 'B', 'B', 'B', '', '1998-12-14', '20', 'Male', 123, 34, 22.4734, 8, 'patient', 22, 'Cubcuban', 1, '2018-12-10'),
(237, 'dd', 'dddd', 'dd', '', '1998-12-14', '20', 'Male', 123, 34, 22.4734, 11, 'patient', 233, 'Dike', 3, '2016-05-14'),
(238, 'cc', 'ccc', 'cc', '', '1997-12-14', '21', 'Female', 123, 232, 153.348, 9, 'patient', 12, 'E. Garcia St.', 5, '2017-11-14'),
(239, 'Ashong', 'Salonga', 'Cubos', '', '1998-12-14', '20', 'Male', 123, 23, 15.2026, 8, 'patient', 122, 'Bantog', 2, '2017-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `requests_tbl`
--

CREATE TABLE `requests_tbl` (
  `req_id` int(10) NOT NULL,
  `reqrole_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL,
  `houseNo` int(5) NOT NULL,
  `street` varchar(20) DEFAULT NULL,
  `brgyid` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_requested` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `role_id` varchar(20) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `brgyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`role_id`, `role_name`, `brgyid`) VALUES
('alua_adm', 'Brgy. Alua Admin', 1),
('calaba_adm', 'Brgy. Calaba Admin', 2),
('head_admin', 'Head Admin', NULL),
('malapit_adm', 'Brgy. Malapit Admin', 3),
('mangga_adm', 'Brgy. Mangga Admin', 4),
('patient', '', NULL),
('poblacion_adm', 'Brgy. Poblacion Admin', 5),
('pulo_adm', 'Brgy. Pulo Admin', 6),
('sanroque_adm', 'Brgy. San Roque Admin', 7),
('stocristo_adm', 'Brgy. Sto. Cristo Admin', 8),
('tabon_Adm', 'Brgy. Tabon Admin', 9);

-- --------------------------------------------------------

--
-- Table structure for table `street_tbl`
--

CREATE TABLE `street_tbl` (
  `street_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `street_tbl`
--

INSERT INTO `street_tbl` (`street_name`) VALUES
('Anita Subdivision'),
('Aviado St.'),
('B. Ortiz Poultry'),
('Babandapo'),
('Balite'),
('Baloc'),
('Baloc Cono'),
('Bantog'),
('Batasan Hills'),
('Botong'),
('Bundok Compound'),
('Calumpit St.'),
('Cecilio St.'),
('Centro'),
('Cubcuban'),
('Dike'),
('Dumagnit'),
('E. Garcia St.'),
('Elipane St.'),
('Franco Subdivision'),
('Front Cono'),
('General De Jesus St.'),
('GK'),
('Gonzales St.'),
('Hererra St.'),
('Holy Rosary St.'),
('Hulo St.'),
('Jimenez'),
('KB'),
('L. Cruz Subdivision'),
('Laot St.'),
('Lito Manga'),
('Maligaya St.'),
('Mangga St.'),
('Maximino St.'),
('Medina St.'),
('Mesina St.'),
('Olongapo Road'),
('P. Carmen St.'),
('Parang'),
('Pedro Villarosa St.'),
('Pulong Munti'),
('Purok 1'),
('Purok 10'),
('Purok 2'),
('Purok 3'),
('Purok 4'),
('Purok 5'),
('Purok 6'),
('Purok 7'),
('Purok 8'),
('Purok 9'),
('Putol na Kalsada'),
('Ramoso St.'),
('Riverside'),
('Rizal St.'),
('Rosama Compound'),
('Rumba Rumba'),
('Saint Joseph'),
('Sitio Barangka'),
('Sitio Navarro'),
('Sitio Polilio'),
('Sitio Pulong Munti'),
('Sitio Sampalukan'),
('Sitio Sta. Monica'),
('T. Talens St.'),
('Tanchoco St.'),
('Tunguyan'),
('Update Later'),
('Utoc'),
('V. Road Vicencio'),
('Vallarta St.'),
('Ventus St.'),
('Vicencio Road'),
('Vicencio Sapa'),
('Villegas Subdivision'),
('Westech St.');

-- --------------------------------------------------------

--
-- Table structure for table `uploads_tbl`
--

CREATE TABLE `uploads_tbl` (
  `upload_id` int(11) NOT NULL,
  `upload_name` varchar(255) NOT NULL,
  `upload_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(10) NOT NULL,
  `reqrole_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL,
  `houseNo` int(5) NOT NULL,
  `street` varchar(20) DEFAULT NULL,
  `brgyid` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_requested` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `reqrole_id`, `name`, `lname`, `mname`, `suffix`, `age`, `bday`, `houseNo`, `street`, `brgyid`, `username`, `password`, `email`, `date_requested`) VALUES
(6, 'calaba_adm', 'Manalastas', 'Angel', 'Aquino', '', 20, '1998-05-17', 123, 'Hulo', 'Malapit', 'angel2', 'aa', 'angel@gmail.com', '2018-12-14'),
(7, 'head_admin', 'Qit', 'Villorante', 'Lumbao', NULL, 20, '1998-05-17', 565, 'Hulo St.', 'Sto. Cristo', 'simhc', 'simhc', 'villoranteqit@gmail.com', '2018-12-05'),
(8, 'poblacion_adm', 'Gamboa', 'Glaiza', 'I', '', 21, '1997-10-11', 123, 's', 'Pakul', 'pbl', 'pbl', 'gg@gmail.com', '2018-12-05'),
(10, 'malapit_adm', 'Jimena', 'Kevin', 'Bb', '', 23, '1995-01-29', 123, 'elipane', 'Malapit', 'kevin', 'mlpt', 'kevin@gmail.com', '2018-12-05'),
(11, 'calaba_adm', 'angel', 'aa', 'aa', '', 20, '1998-12-12', 123, '23', '23', 'aaaaa', 'aaa', 'angel@gmail.com', '2018-12-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy_tbl`
--
ALTER TABLE `brgy_tbl`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `hcases_tbl`
--
ALTER TABLE `hcases_tbl`
  ADD PRIMARY KEY (`hcase_id`);

--
-- Indexes for table `persons_tbl`
--
ALTER TABLE `persons_tbl`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `fk_brgyid1` (`per_brgyid`),
  ADD KEY `fk_caseid1` (`per_hcaseid`),
  ADD KEY `fk_roleid` (`per_roleid`) USING BTREE,
  ADD KEY `fk_street` (`per_street`);

--
-- Indexes for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `fk_roleid2` (`reqrole_id`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `fk_brgyid2` (`brgyid`);

--
-- Indexes for table `street_tbl`
--
ALTER TABLE `street_tbl`
  ADD PRIMARY KEY (`street_name`);

--
-- Indexes for table `uploads_tbl`
--
ALTER TABLE `uploads_tbl`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `fk_owner` (`upload_owner`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_roleid1` (`reqrole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy_tbl`
--
ALTER TABLE `brgy_tbl`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hcases_tbl`
--
ALTER TABLE `hcases_tbl`
  MODIFY `hcase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `persons_tbl`
--
ALTER TABLE `persons_tbl`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `req_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads_tbl`
--
ALTER TABLE `uploads_tbl`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `persons_tbl`
--
ALTER TABLE `persons_tbl`
  ADD CONSTRAINT `fk_brgyid1` FOREIGN KEY (`per_brgyid`) REFERENCES `brgy_tbl` (`brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_caseid1` FOREIGN KEY (`per_hcaseid`) REFERENCES `hcases_tbl` (`hcase_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roleid` FOREIGN KEY (`per_roleid`) REFERENCES `role_tbl` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_street` FOREIGN KEY (`per_street`) REFERENCES `street_tbl` (`street_name`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  ADD CONSTRAINT `fk_roleid2` FOREIGN KEY (`reqrole_id`) REFERENCES `role_tbl` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD CONSTRAINT `fk_brgyid2` FOREIGN KEY (`brgyid`) REFERENCES `brgy_tbl` (`brgy_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `uploads_tbl`
--
ALTER TABLE `uploads_tbl`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`upload_owner`) REFERENCES `user_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `fk_roleid1` FOREIGN KEY (`reqrole_id`) REFERENCES `role_tbl` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
