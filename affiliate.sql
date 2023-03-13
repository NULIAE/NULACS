-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 06:52 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adms_db_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE `affiliate` (
  `affiliate_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `organization` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` int(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `board_meeting_frequency` int(11) DEFAULT NULL,
  `compliance_dues` tinyint(1) NOT NULL DEFAULT '0',
  `affiliate_status` tinyint(1) NOT NULL DEFAULT '0',
  `affiliate_compliance_yes_no` varchar(1) DEFAULT NULL,
  `affiliate_performance_year` datetime DEFAULT NULL,
  `ul_census` tinyint(1) NOT NULL DEFAULT '0',
  `board_chair` varchar(255) DEFAULT NULL,
  `field_affiliate_select_value` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affiliate`
--

INSERT INTO `affiliate` (`affiliate_id`, `region_id`, `organization`, `city`, `state`, `email`, `phone`, `board_meeting_frequency`, `compliance_dues`, `affiliate_status`, `affiliate_compliance_yes_no`, `affiliate_performance_year`, `ul_census`, `board_chair`, `field_affiliate_select_value`) VALUES
(1, 1, 'NULHeadOffice', 'NY', 37, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 0),
(2, 3, 'Akron Community Service Center & Urban League', 'Akron', 41, 'arothenbuecher@beneschlaw.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'H. Alan Rothenbuecher', 20),
(3, 1, 'Northern Virginia Urban League', 'Alexandria', 55, 'chairnvul@gmail.com', '202-290-7055', 0, 1, 1, 'N', '2010-01-01 00:00:00', 0, 'Dr. Letty Maxwell', 48),
(4, 3, 'Madison County Urban League', 'Alton', 17, 'Uncleb62002@yahoo.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Judge Duane L. Bailey ', 41),
(5, 4, 'Urban League of Anchorage-Alaska', 'Anchorage', 2, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 57),
(6, 3, 'Urban League of Madison County, Inc.', 'Anderson', 18, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 79),
(7, 2, 'Atlanta Urban League', 'Atlanta', 13, 'juliet.hall@charter.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Juliet Hall', 14),
(8, 3, 'Quad County Urban League', 'Aurora', 17, 'nhunter@aglresources.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Nina M. Hunter', 3),
(9, 2, 'Austin Area Urban League', 'Austin', 51, 'leonardmoore@austin.utexas.edu', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Dr. Leonard Moore ', 21),
(10, 1, 'Greater Baltimore Urban League', 'Baltimore', 25, 'rsmith4@bwiairport.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Ricky D. Smith', 30),
(11, 3, 'Southwestern Michigan Urban League', 'Battle Creek', 27, 'jfkdoby@hotmail.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Josette Doby ', 52),
(12, 1, 'Broome County Urban League', 'Binghamton', 37, 'rhondapc@icloud.com', '607 723 7303 ', 12, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Rhonda Plunkett Carbone', 22),
(13, 2, 'Birmingham Urban League', 'Birmingham', 1, 'kamonte.kelly@bxs.com', '2053260162', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Kamonte Kelly', 1),
(14, 1, 'Urban League of Eastern Massachusetts', 'Roxbury', 26, 'jfeaster@mckenzielawpc.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Joseph D. Feaster Jr.', 62),
(15, 1, 'Buffalo Urban League', 'Buffalo', 37, 'sfinch@nyaaa.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Steve Finch', 23),
(16, 3, 'Greater Stark County Urban League, Inc. ', 'Canton', 41, 'Ralph.Lee@thekag.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Ralph Lee', 33),
(17, 2, 'Charleston Trident Urban League', 'Charleston', 48, 'Seawrighta2@gmail.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Antjuan Seawright', 25),
(18, 2, 'Urban League of Central Carolinas, Inc.', 'Charlotte', 38, 'troy.d.keen@wellsfargo.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Troy D. Keen', 59),
(19, 2, 'Urban League of Greater Chattanooga, Inc.', 'Chattanooga', 50, 'dleegrisham@allstate.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Dorothy Grisham', 64),
(20, 3, 'Chicago Urban League', 'Chicago', 17, 'Eric.Smith@53.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Eric S. Smith', 26),
(21, 3, 'Urban League of Greater Cincinnati', 'Cincinnati', 41, 'jphilliph@me.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Mr. J. Phillip Holloman', 5),
(22, 3, 'Urban League of Greater Cleveland', 'Cleveland', 41, 'jmyers@ups.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'James Myers ', 6),
(23, 4, 'Urban League of Pikes Peak Region', 'Colorado Springs', 7, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 88),
(24, 2, 'Columbia Urban League', 'Columbia', 48, 'fheizer@mcnair.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Francenia B. Heizer', 60),
(25, 2, 'Urban League of Greater Columbus, Inc.', 'Columbus', 13, 'danita.lloyd@gmail.com', '678-735-8376', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Danita Gibson Lloyd', 65),
(26, 3, 'Columbus Urban League', 'Columbus', 41, 'todd.williams@huntington.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'J. Todd Williams', 27),
(27, 2, 'Urban League of Greater Dallas and North Central Texas', 'Dallas', 51, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 18),
(28, 3, 'Dayton Urban League', 'Dayton', 41, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 55),
(29, 4, 'Urban League of Metropolitan Denver', 'Denver', 7, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 80),
(30, 3, 'Urban League of Detroit Southeastern Michigan', 'Detroit', 27, 'Patrick.lindsey@wayne.edu', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Rev. Patrick O. Lindsey', 61),
(31, 1, 'Urban League of Union County', 'Elizabeth', 35, 'hfreier@genovaburns.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Harris Freier', 96),
(32, 3, 'Lorain County Urban League', 'Elyria', 41, 'ckushner@lorainccc.edu', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Cindy Kushner', 10),
(33, 1, 'Urban League for Bergen County', 'Englewood', 35, 'info@nul.org', '555-555-5555', 0, 1, 1, 'N', '2010-01-01 00:00:00', 0, '', 55),
(34, 1, 'Urban League of Shenango Valley', 'Farrell', 45, 'autumnsru@yahoo.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Autumn Johnson, Esq. ', 51),
(35, 3, 'Urban League of Flint', 'Flint', 27, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 63),
(36, 2, 'Urban League of Broward County', 'Fort Lauderdale', 12, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 4),
(37, 3, 'Fort Wayne Urban League', 'Fort Wayne', 18, 'jrogers@comcast.net', '260-745-3100', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'John Rogers ', 28),
(38, 3, 'Urban League of Northwest Indiana, Inc.', 'Gary', 18, 'ydavis@centier.com', '219-887-9621', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Yolanda Davis', 86),
(39, 3, 'Urban League of West Michigan', 'Grand Rapids', 27, 'ljj@me.com', '616-245-2207', 5, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Lynne Jarman-Johnson', 29),
(40, 2, 'Urban League of the Upstate, Inc.', 'Greenville', 48, 'smills@uscupstate.edu', '8033543889', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Stacey D. Mills', 95),
(41, 1, 'Urban League of Greater Hartford', 'Hartford', 8, 'jw.roberts@att.net', '860-527-0147', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Jonathan Roberts', 66),
(42, 2, 'Houston Area Urban League', 'Houston', 51, 'jmartin@kprc.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Jerry Martin ', 2),
(43, 3, 'Indianapolis Urban League', 'Indianapolis', 18, 'mwiley@ind.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Maria Wiley', 37),
(44, 2, 'Mississippi Urban League', 'Jackson', 29, 'James.covington@me.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'James Covington', 67),
(45, 2, 'Jacksonville Urban League', 'Jacksonville', 12, 'derrick.bryant@lpsvcs.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Derrick Bryant', 38),
(46, 1, 'Urban League of Hudson County', 'Jersey City', 35, 'loretta.richardson@pnc.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Loretta Richardson', 74),
(47, 3, 'Urban League of Kansas City', 'Kansas City', 30, 'michelle.k.kay@ehi.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Michelle Kay', 75),
(48, 2, 'Knoxville Area Urban League', 'Knoxville', 50, 'cmims@vs-llc.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Cavanaugh Mims', 39),
(49, 1, 'Urban League of Lancaster County', 'Lancaster', 45, 'ray.balley@aol.com', '555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 0, '', 76),
(50, 4, 'Las Vegas-Clark County Urban League', 'Las Vegas', 33, 'Tony.L.Bourne@ehi.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Tony Bourne', 8),
(51, 2, 'Urban League of Lexington-Fayette County', 'Lexington', 21, 'Kerry.creech@toyota.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Kerry Creech ', 77),
(52, 1, 'Urban League of Long Island', 'Plainview', 37, 'sidone23@gmail.com', '6318829512', 10, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Sidney Joyner', 78),
(53, 4, 'Los Angeles Urban League', 'Los Angeles', 6, 'EHinds@sheppardmullin.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Elliot Hinds', 9),
(54, 2, 'Louisville Urban League', 'Louisville', 21, 'lolee@caesars.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Lorri Lee', 40),
(55, 3, 'Urban League of Greater Madison', 'Madison', 58, 'Derricksmith55@gmail.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Derrick Smith', 69),
(56, 2, 'Memphis Urban League', 'Memphis', 50, 'feleciabeanbarnes@comcast.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Felecia Bean Barnes', 42),
(57, 2, 'Urban League of Greater Miami', 'Miami', 12, 'erobinson@dadeschools.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Dr. Edward G. Robinson', 70),
(58, 3, 'Milwaukee Urban League', 'Milwaukee', 58, 'john.salemi@usbank.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'John A Salemi', 45),
(59, 3, 'Urban League Twin Cities', 'Minneapolis', 28, 'makrame@almaauun.org', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Makram El-Amin', 46),
(60, 1, 'Morris County Urban League', 'Morristown', 35, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 84),
(61, 3, 'Urban League of Greater Muskegon', 'Muskegon Hgts.', 27, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 71),
(62, 2, 'Urban League of Middle Tennessee', 'Nashville', 50, 'bmnelson@acceptanceinsurance.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Burley Nelson', 83),
(63, 2, 'Urban League of Louisiana', 'New Orleans', 22, 'jade@jdrussellconsulting.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Jade Brown-Russell', 15),
(64, 1, 'New York Urban League', 'New York', 37, 'ward@catalystlp.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Ward Corbett', 47),
(65, 1, 'Urban League of Essex County', 'Newark', 35, 'asneedgo@its.jnj.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Annie Sneed-Godfrey', 13),
(66, 1, 'Urban League of Hampton Roads', 'Portsmouth', 55, 'Tom.hasty@townebank.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Tom Hasty', 73),
(67, 2, 'Urban League of Oklahoma City', 'Oklahoma City', 42, 'Cathy.blevins@bami.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Cathy Blevins', 16),
(68, 3, 'Urban League of Nebraska', 'Omaha', 32, 'rafaelm@omahasteaks.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Ralph Maldonado', 85),
(69, 2, 'Central Florida Urban League', 'Orlando', 12, 'Chairwoman@cful.org', '407-841-7654', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Paula Hoisington', 24),
(70, 3, 'Tri-County Urban League', 'Peoria', 17, 'qgrrx@aol.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Glenn Ross', 12),
(71, 1, 'Urban League of Philadelphia', 'Philadelphia', 45, 'Bethel-keith@aramark.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Keith Bethel', 87),
(72, 4, 'Phoenix Urban League', 'Phoenix', 4, 'sherry.a.mcfadden.cy56@statefarm.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Sherry McFadden', 31),
(73, 1, 'Urban League of Greater Pittsburgh', 'Pittsburgh', 45, 'clarkar2@upmc.edu', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Andrea Clark Smith', 19),
(74, 4, 'Urban League of Portland', 'Portland', 43, 'lewellen@up.edu', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Michael Lewellen', 89),
(75, 1, 'Urban League of Rhode Island', 'Providence', 47, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 91),
(76, 3, 'Urban League of Racine and Kenosha, Inc.', 'Racine', 58, 'klkoeppen@gmail.com', '262-842-7461', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Kendra Koeppen ', 90),
(77, 1, 'Urban League of Greater Richmond, Inc.', 'Richmond', 55, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 72),
(78, 1, 'Urban League of Rochester', 'Rochester', 37, 'gewing@trilliumhealth.org', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Gregory Ewing', 7),
(79, 4, 'Sacramento Urban League', 'Sacramento', 6, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 32),
(80, 3, 'Urban League of Metropolitan St. Louis', 'St. Louis', 30, 'mlevison@lashlybaer.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Mark Levison', 81),
(81, 3, 'St. Paul Urban League', 'St. Paul', 28, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 50),
(82, 2, 'Pinellas County Urban League', 'St. Petersburg', 12, 'bezippy@gmail.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Linda Marcelli', 49),
(83, 4, 'Urban League of San Diego County', 'San Diego', 6, 'lsreed@comerica.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Larry S. Reed', 92),
(84, 4, 'Urban League of Metropolitan Seattle', 'Seattle', 56, 'ratanner@microsoft.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Rashelle Tanner ', 82),
(85, 3, 'Springfield Urban League, Inc.', 'Springfield', 17, 'kdavis@ihda.org', '217-789-0830', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Karen Davis', 11),
(86, 1, 'Urban League of Springfield', 'Springfield', 26, 'revwcwjr@aol.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Rev. Dr. W.C. Watson', 94),
(87, 1, 'Urban League of Southwestern Connecticut', 'Stamford', 8, 'CynthiaM@JMW.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Cynthia Mullins', 93),
(88, 4, 'Tacoma Urban League', 'Tacoma', 56, 'latasha.wortham@outlook.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'LaTasha Wortham', 53),
(89, 2, 'Tallahassee Urban League', 'Tallahassee', 12, 'Jeromejones01@comcast.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Mr. Jerome Jones', 34),
(90, 3, 'Greater Toledo Urban League', 'Toledo', 41, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 56),
(91, 4, 'Tucson Urban League', 'Tucson', 4, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 43),
(92, 2, 'Metropolitan Tulsa Urban League', 'Tulsa', 42, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 35),
(93, 3, 'Warren-Youngstown Urban League', 'Warren', 41, 'pasiionate@gateway.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'David Morgan', 36),
(94, 1, 'Greater Washington Urban League', 'Washington', 10, NULL, NULL, NULL, 1, 1, 'N', '2010-01-01 00:00:00', 0, NULL, 17),
(95, 2, 'Urban League of Palm Beach County, Inc.', 'West Palm Beach', 12, 'Deborah.caplan@fpl.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Deborah Caplan', 97),
(96, 1, 'Urban League of Westchester County', 'White Plains', 37, 'mcookcpa@optonline.net', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Marc W. Cook', 99),
(97, 3, 'Urban League of Kansas, Inc.', 'Wichita', 20, 'businessdevelopr@gmail.com', '316-262-2463', 0, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Tracee Adams', 44),
(98, 1, 'Metropolitan Wilmington Urban League', 'Wilmington', 9, 'jcoppadge@gmail.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Joel Coppadge', 98),
(99, 2, 'Winston-Salem Urban League', 'Winston-Salem', 38, 'barnett.mh@gmail.com', '555-555-5555', 4, 1, 1, 'N', '2010-01-01 00:00:00', 1, 'Marquis Barnett ', 202),
(100, 2, 'Urban League of the State of Arkansas', 'Little Rock', 5, 'sherman.tate@banksouthern.com', '5013791597', 4, 1, 1, 'N', '2016-01-01 00:00:00', 1, 'Sherman Tate', 0),
(101, 4, 'Urban League of Greater San Francisco Bay Area', 'Oakland', 6, 'kenmaxey@hotmail.com', '555-555-5555', 4, 1, 1, NULL, NULL, 1, '', 0),
(102, 2, 'Urban League of Hillsborough County ', 'Tampa', 12, 'nglover@tampabaychamber.com', '813-404-6172', 4, 1, 1, NULL, NULL, 0, 'Nicholas Glover', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`affiliate_id`),
  ADD KEY `fk_affiliate_region_id` (`region_id`),
  ADD KEY `fk_affiliate_state_id` (`state`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `affiliate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD CONSTRAINT `fk_affiliate_region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_state_id` FOREIGN KEY (`state`) REFERENCES `state` (`stateid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
