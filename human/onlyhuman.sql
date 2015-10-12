-- phpMyAdmin SQL Dump.
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 10:40 AM
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
  `defailtdesc` text NOT NULL COMMENT 'Default Meta Desc',
  `defaultkeywords` text NOT NULL COMMENT 'Default Meta Keywords',
  `defaultcanonical` text NOT NULL COMMENT 'Default canonical Tag',
  `contactemail` text NOT NULL COMMENT 'Contact us email ID',
  `orderemail` text NOT NULL COMMENT 'New Order Update email',
  `registeremail` text NOT NULL COMMENT 'New Registration update email',
  `freeshipping` float(4,2) NOT NULL COMMENT 'Minimium Ordervalue for Free Shipping',
  `maintenance` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-Site Live, 1-Site Offline'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='General Global site Settings';

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
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
`usrid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `usrfname` varchar(250) NOT NULL,
  `usrlname` varchar(250) NOT NULL,
  `usremail` varchar(250) NOT NULL,
  `usrpass` varchar(250) NOT NULL,
  `usrtype` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-regular user, 1-Moderator, 2-Super Admin',
  `last_login` datetime NOT NULL,
  `del_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Basic User information';

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
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`addrid`), ADD UNIQUE KEY `usrstate` (`usrstate`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
 ADD PRIMARY KEY (`usrid`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
MODIFY `addrid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
MODIFY `usrid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value';
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
