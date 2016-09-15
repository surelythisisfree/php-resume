SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID',
  `section_name` varchar(255) NOT NULL COMMENT 'The name of this section (used as the title of the section)',
  `section_anchor` varchar(255) NOT NULL COMMENT 'The name of the anchor for this section',
  `section_order` int(11) NOT NULL COMMENT 'Where in the order of sections in the resume this section belongs',
  `section_slide` int(1) NOT NULL COMMENT 'Does this section use slides? 1 = Yes, 0 = No',
  `section_bground` varchar(7) NOT NULL COMMENT 'The background color (hex) for this section',
  `section_class` varchar(255) NOT NULL COMMENT 'The class tag(s) for the items in this section',
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='This table holds the details for each section of the resume' AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
