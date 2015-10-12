-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 09:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlyhuman`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes_category`
--

CREATE TABLE IF NOT EXISTS `attributes_category` (
`attcid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attid` int(11) NOT NULL COMMENT 'attribute ID',
  `catid` int(11) NOT NULL COMMENT 'Category ID',
  `is_main` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-Not Main Attribute, 1-Main Attribute',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Show which attribute belongs to which category';

-- --------------------------------------------------------

--
-- Table structure for table `attributes_master`
--

CREATE TABLE IF NOT EXISTS `attributes_master` (
`attid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attname` varchar(250) NOT NULL COMMENT 'Attribute Name',
  `attdesc` text COMMENT 'Attribute Description',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_master`
--

INSERT INTO `attributes_master` (`attid`, `attname`, `attdesc`, `del_status`) VALUES
(1, 'Size', 'different Sizes ', '0'),
(2, 'Colors', 'Red, green, black, etc', '0');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_values`
--

CREATE TABLE IF NOT EXISTS `attributes_values` (
`attvid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attid` int(11) NOT NULL COMMENT 'attribute ID',
  `attvalue` varchar(250) NOT NULL COMMENT 'Attribute Value',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='will store att. values Color-Red,green,etc.';

--
-- Dumping data for table `attributes_values`
--

INSERT INTO `attributes_values` (`attvid`, `attid`, `attvalue`, `del_status`) VALUES
(1, 1, 'Small', '0'),
(2, 1, 'Medium', ''),
(3, 1, 'Large', ''),
(4, 1, 'X-Large', ''),
(5, 1, 'XX_large', ''),
(6, 2, 'Red', ''),
(7, 2, 'Green', ''),
(8, 2, 'Black', ''),
(9, 2, 'Blue', ''),
(10, 2, 'White', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`catid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `catname` varchar(250) NOT NULL COMMENT 'Category Name',
  `catdesc` text NOT NULL COMMENT 'Category Description',
  `catimg` varchar(250) NOT NULL COMMENT 'folder path for category image',
  `parentid` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent Category ID. Default 0',
  `url_alias` text NOT NULL COMMENT 'Complete URL after domain name',
  `catmtitle` text COMMENT 'Meta Title',
  `catmdesc` text COMMENT 'Meta Description',
  `catmkeywords` text COMMENT 'Meta Keywords',
  `catcanonical` text COMMENT 'if any - canonical URL can be entered here.',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category Master table storing all category related info.';

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_pages`
--

CREATE TABLE IF NOT EXISTS `dynamic_pages` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keywords` varchar(100) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `page_content` longtext NOT NULL,
  `script` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dynamic_pages`
--

INSERT INTO `dynamic_pages` (`id`, `name`, `meta_title`, `meta_keywords`, `meta_description`, `page_content`, `script`, `status`) VALUES
(1, 'Contact Us', 'This is the Contact Us page meta title.', 'This is the Contact Us page meta keywords.', 'This is the Contact Us page meta description.', '<p>This is the Contact Us page content.</p>\r\n', '<script>\r\nalert("This is the contact us page.")\r\n</script>', 1),
(2, 'Shopping', 'This is the Shopping page meta title.', 'This is the shopping page meta keywords.', 'This is the shopping page meta description.', '<p>This is the shopping page content.</p>\r\n', '<script>alert("This is the shopping page.")</script>', 1),
(3, 'Carrier', 'This is the Carrier meta title.', 'This is the Carrier meta keywords.', 'This is the Carrier meta descritpion.', '<p>This is the Carrier page content.</p>\r\n', '<script>alert("This is the carrier page.");</script>', 1),
(4, 'Support', 'This is the Support page meta title.', 'This is the Support page meta keywords.', 'This is the Support page meta description.', '<p>This is the Support page.</p>\r\n', '<script>alert("This is the support page.");</script>', 1),
(5, 'About Us', 'This is the About Us page meta title.', 'This is the About Us page meta keywords.', 'This is the About Us page meta description.', '<p>This is the&nbsp;This is the About Us page page content.</p>\r\n', 'alert("This is the about us page");', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer_master`
--

CREATE TABLE IF NOT EXISTS `offer_master` (
`offerid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `offername` varchar(250) NOT NULL,
  `offercat` varchar(250) DEFAULT NULL COMMENT 'Comma seperated Cat Id OR zero 0 for ALL CAT',
  `offerprod` varchar(250) DEFAULT NULL COMMENT 'Comma seperated Prod Id OR zero 0 for ALL Products',
  `offerdesc` text NOT NULL,
  `discount` float(2,2) NOT NULL,
  `freeshipping` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0- NO free shipping, 1-Yes free Shipping applicable.',
  `offerstartdt` datetime NOT NULL COMMENT 'date and TIME to start offer.',
  `offerenddt` datetime NOT NULL COMMENT 'Date and TIME to end offer',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Save Offer details';

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
`odetid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `orderid` int(11) NOT NULL COMMENT 'Order master reference ID',
  `prodid` int(11) NOT NULL COMMENT 'Product master reference ID',
  `pattid` int(11) NOT NULL COMMENT 'Attribute and its value ID',
  `prodprice` float(4,2) NOT NULL,
  `prodqty` int(11) NOT NULL,
  `subtotal` float(5,2) NOT NULL,
  `orderdate` date NOT NULL,
  `offer` int(11) DEFAULT NULL COMMENT 'If any offer is applicable use Offer ID, if backorder use 0, else it will be NULL',
  `comments` text NOT NULL COMMENT 'If user has provided any Special comments or instructions.',
  `del_status` enum('0','1','2') NOT NULL COMMENT '0-Active, 1-Inactive, 2-Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='saves Order details for each product in the order.';

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
`orderid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `session_id` varchar(50) DEFAULT '0' COMMENT 'Users Session ID till he is not logged in. After that change it to 0.',
  `userid` int(11) NOT NULL COMMENT 'Will be populated once user is logged in.',
  `orderstartdate` date NOT NULL,
  `orderenddate` date NOT NULL,
  `ordervalue` float(5,2) NOT NULL,
  `paymentid` int(11) NOT NULL COMMENT 'Payment Details table ID reference',
  `shippingid` int(11) NOT NULL COMMENT 'Shipping Details table ID reference',
  `orderstatus` int(11) NOT NULL COMMENT 'Order Status Table Reference ID',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Will store Main Order details';

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`ostatusid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `ostatusname` varchar(250) NOT NULL,
  `ostatusdesc` text NOT NULL,
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Allows admin to create Order Status as required.';

-- --------------------------------------------------------

--
-- Table structure for table `produc_attributes`
--

CREATE TABLE IF NOT EXISTS `produc_attributes` (
`pattid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `prodid` int(11) NOT NULL COMMENT 'Product ID',
  `attvid` int(11) NOT NULL COMMENT 'Attribute Value ID',
  `add_cost` float(4,2) DEFAULT NULL COMMENT 'Additional Cost',
  `less_cost` float(4,2) DEFAULT NULL COMMENT 'Less Cost',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Show which attribute has what value for a product. ';

-- --------------------------------------------------------

--
-- Table structure for table `produc_image`
--

CREATE TABLE IF NOT EXISTS `produc_image` (
`imgid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `prodid` int(11) NOT NULL COMMENT 'Product ID',
  `imagepath` varchar(250) NOT NULL COMMENT 'Folder and image name',
  `imgalt` text COMMENT 'ALT tag for images',
  `isdefault` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-No, 1- Yes use as default image',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-active, 1-inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produc_master`
--

CREATE TABLE IF NOT EXISTS `produc_master` (
`prodid` int(11) NOT NULL COMMENT 'Auto incremented key',
  `catis` int(11) NOT NULL COMMENT 'Category ID',
  `prodname` varchar(250) NOT NULL COMMENT 'Product Name',
  `prodscdes` text NOT NULL COMMENT 'Short Description',
  `proddesc` text NOT NULL COMMENT 'Long Description',
  `prodprice` float(4,2) NOT NULL COMMENT 'Product Price with 2 decimals',
  `clearance` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-- Default No, 1-- Clearance item',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date time when added.',
  `url_alias` text NOT NULL COMMENT 'Complete URL after domain name',
  `prodmtitle` text COMMENT 'Meta Title',
  `prodmdesc` text COMMENT 'Meta Description',
  `prodmkeywords` text COMMENT 'Meta Keywords',
  `prodcanonical` text COMMENT 'if any - canonical URL can be entered here.',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-active, 1-inactive, 2-deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores Basic Product Information';

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
`id` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `site_name` text NOT NULL COMMENT 'Website Name',
  `site_url` text NOT NULL COMMENT 'Website URL',
  `defaulttitle` text NOT NULL COMMENT 'Default Meta Title',
  `defaultdesc` text NOT NULL COMMENT 'Default Meta Desc',
  `defaultkeywords` text NOT NULL COMMENT 'Default Meta Keywords',
  `defaultcanonical` text NOT NULL COMMENT 'Default canonical Tag',
  `contactemail` text NOT NULL COMMENT 'Contact us email ID',
  `orderemail` text NOT NULL COMMENT 'New Order Update email',
  `registeremail` text NOT NULL COMMENT 'New Registration update email',
  `freeshipping` float(4,2) NOT NULL COMMENT 'Minimium Ordervalue for Free Shipping',
  `maintenance` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-Site Live, 1-Site Offline'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='General Global site Settings';

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_url`, `defaulttitle`, `defaultdesc`, `defaultkeywords`, `defaultcanonical`, `contactemail`, `orderemail`, `registeremail`, `freeshipping`, `maintenance`) VALUES
(1, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(2, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(3, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `usrfname` varchar(250) NOT NULL,
  `usrlname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `usrtype` int(100) NOT NULL,
  `usrtypea` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-regular user, 1-Moderator, 2-Super Admin',
  `last_login` datetime NOT NULL,
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COMMENT='Basic User information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usrfname`, `usrlname`, `username`, `password`, `usrtype`, `usrtypea`, `last_login`, `del_status`) VALUES
(1, 'ss', 'sas', 'spchobhe_grt@gmail.com', 'spchobhe', 0, '1', '0000-00-00 00:00:00', '0'),
(2, 'asas', 'as', 'shital@gmail.com', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', 0, '1', '0000-00-00 00:00:00', '0'),
(3, 'Mayur Raj', 'sd', 'shashi123@gmail.com', '1aa22fdc02ef15f872229300388e9fa845b87f06', 0, '1', '0000-00-00 00:00:00', '0'),
(4, 'asas', 'sas', 'shashi1234@gmail.com', '4d592a396a47cfee93e0092d767c42908f1995b6', 0, '1', '2015-10-08 15:54:22', '0'),
(5, 'ss', 'sas', 'test123@gmail.com', '0d592da30998c8cb065c4bedc812ac6f3b90c0e9', 0, '1', '2015-10-08 15:55:07', '0'),
(6, 'ss', 'sas', 'shashi1234@gmail.coma', 'a155ccd6805bc2da9b89a098459bb5ecf2644621', 0, '1', '2015-10-08 15:56:29', '0'),
(7, 'ss', 'sas', 'spchobashe_grt@gmail.com', 'cce9a389e3350d91206d2b50c8405fd7cf0eea4b', 0, '1', '2015-10-08 15:57:13', '0'),
(8, 'ss', 'sas', 'shital@gmail.comas', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', 0, '', '2015-10-08 15:59:16', '0'),
(9, 'ss', 'sas', 'shital@gmail.comasas', 'efb6ed2405d63ddfb78723327e9d988dfa49867a', 0, '', '2015-10-08 15:59:40', '0'),
(10, 'ss', 'sas', 'shital@gmail.coaasm', '55cc15bd265769b8fe39f44316b0d150df98c70a', 0, '', '2015-10-08 16:00:09', '0'),
(11, 'ss', 'sas', 'shital@gmaaail.com', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', 0, '1', '2015-10-08 16:00:47', '0'),
(12, 'Shashikant', 'Chobhe', 'spchobhe@live.com', '1336ecda88837f6e9a75dc364d2f989f372c0e27', 0, '1', '2015-10-08 16:01:55', '0'),
(13, 'mayurchobhe', 'mayurchobhe', 'mayurchobhe@gmail.com', '732a816bd73193fe1ebf9e6d5e1e8866b7020b93', 0, '1', '2015-10-08 16:20:08', '0'),
(14, 'mayurchobhea', 'mayurchobhea', 'mayurchobhea@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 2, '0', '2015-10-08 16:22:07', '0'),
(15, 'Shashikant', 'sas', 'test123@gmail.coma', 'da59e489b69e8d5abb797697c9806436c96d63d4', 2, '0', '2015-10-08 16:35:17', '0'),
(16, 'nitin', 'nitin', 'nitin@gmail.com', '6e195049010374722b04a2088b7dd7d7e40bb87d', 2, '0', '2015-10-08 16:50:42', '0'),
(17, 'mahesh', 'mahesh', 'mahesh@gmail.com', 'maheshmahesh', 2, '0', '2015-10-08 17:11:11', '0'),
(18, 'mahesha', 'mahesha', 'f60ed2dab23589023fab26b746b2e834ec1dcdac', 'maheshamahesha', 2, '0', '2015-10-08 17:12:10', '0'),
(19, 'mahesha', 'mahesha', 'mahesha@gmail.com', 'f60ed2dab23589023fab26b746b2e834ec1dcdac', 2, '0', '2015-10-08 17:14:42', '0'),
(20, 'maheshaa', 'maheshaa', 'maheshaa@gmail.com', '168389627f1d3766df789e6d7da849e551f79755', 2, '0', '2015-10-08 17:15:41', '0'),
(21, 'shitalgophane', 'shitalgophane', 'shitalgophane@gmail.com', 'shitalgophane', 2, '0', '2015-10-08 17:19:15', '0'),
(22, 'shitalgophane', 'shitalgophane', 'shitalgophanea@gmail.com', '40a968e8809041e76fa07579b5e6a0da18e5b1df', 2, '0', '2015-10-08 17:20:05', '0'),
(23, 'shashikant', 'chobhe', 'shashikant.chobhe@sibzsolutions.com', '46ac2e696b52e2012a2699ce98cd831cbcdd6552', 2, '0', '2015-10-09 06:22:15', '1'),
(24, 'Shashikant', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 0, '0', '0000-00-00 00:00:00', '0'),
(25, 'Shashikant', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 0, '0', '0000-00-00 00:00:00', '1'),
(26, 'Mayur', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 2, '0', '0000-00-00 00:00:00', '0'),
(27, 'Amol', 'Pangare', 'amol@gmail.com', '30379e4267ae5e1b16d0c88476e491b36326708c', 2, '0', '2015-10-09 15:01:14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
`addrid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `usrid` int(11) NOT NULL COMMENT 'User ID from USer_Master',
  `addr1` varchar(250) DEFAULT NULL COMMENT 'street address 1',
  `addr2` varchar(250) DEFAULT NULL COMMENT 'street Address 2',
  `usrcity` varchar(250) DEFAULT NULL COMMENT 'City name',
  `usrstate` varchar(250) DEFAULT NULL COMMENT 'State Name',
  `usrcountry` varchar(250) DEFAULT NULL COMMENT 'Country Name',
  `usrzip` varchar(15) DEFAULT NULL COMMENT 'Postal Code',
  `usrphones` varchar(250) DEFAULT NULL COMMENT 'Multiple Phone Numbers seperated by COMMA',
  `ismain` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-regular, 1-default Address',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Saves Users multiple Addresses';

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_detail`
--

CREATE TABLE IF NOT EXISTS `wishlist_detail` (
`wishdetid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `prodid` int(11) NOT NULL COMMENT 'Product Reference ID',
  `datecreated` date NOT NULL,
  `dateupdated` date NOT NULL,
  `wstatus` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-To Buy, 1-Purchased',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users Wishlist details';

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_master`
--

CREATE TABLE IF NOT EXISTS `wishlist_master` (
`wishid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `usrid` int(11) NOT NULL COMMENT 'Users Reference ID',
  `wishlistname` varchar(250) NOT NULL COMMENT 'Wish List name',
  `datecreated` date NOT NULL COMMENT 'Wishlist creation date',
  `lastupdated` date NOT NULL COMMENT 'Wishlist updated date',
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users Wish List ';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes_category`
--
ALTER TABLE `attributes_category`
 ADD PRIMARY KEY (`attcid`);

--
-- Indexes for table `attributes_master`
--
ALTER TABLE `attributes_master`
 ADD PRIMARY KEY (`attid`,`attname`);

--
-- Indexes for table `attributes_values`
--
ALTER TABLE `attributes_values`
 ADD PRIMARY KEY (`attvid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_master`
--
ALTER TABLE `offer_master`
 ADD PRIMARY KEY (`offerid`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
 ADD PRIMARY KEY (`odetid`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
 ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
 ADD PRIMARY KEY (`ostatusid`);

--
-- Indexes for table `produc_attributes`
--
ALTER TABLE `produc_attributes`
 ADD PRIMARY KEY (`pattid`);

--
-- Indexes for table `produc_image`
--
ALTER TABLE `produc_image`
 ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `produc_master`
--
ALTER TABLE `produc_master`
 ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`addrid`), ADD UNIQUE KEY `usrstate` (`usrstate`);

--
-- Indexes for table `wishlist_detail`
--
ALTER TABLE `wishlist_detail`
 ADD PRIMARY KEY (`wishdetid`);

--
-- Indexes for table `wishlist_master`
--
ALTER TABLE `wishlist_master`
 ADD PRIMARY KEY (`wishid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes_category`
--
ALTER TABLE `attributes_category`
MODIFY `attcid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key';
--
-- AUTO_INCREMENT for table `attributes_master`
--
ALTER TABLE `attributes_master`
MODIFY `attid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attributes_values`
--
ALTER TABLE `attributes_values`
MODIFY `attvid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key';
--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `offer_master`
--
ALTER TABLE `offer_master`
MODIFY `offerid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
MODIFY `odetid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
MODIFY `ostatusid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `produc_attributes`
--
ALTER TABLE `produc_attributes`
MODIFY `pattid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key';
--
-- AUTO_INCREMENT for table `produc_image`
--
ALTER TABLE `produc_image`
MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key';
--
-- AUTO_INCREMENT for table `produc_master`
--
ALTER TABLE `produc_master`
MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key';
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
MODIFY `addrid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `wishlist_detail`
--
ALTER TABLE `wishlist_detail`
MODIFY `wishdetid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `wishlist_master`
--
ALTER TABLE `wishlist_master`
MODIFY `wishid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
