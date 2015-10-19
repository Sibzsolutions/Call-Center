-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2015 at 01:43 PM
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
-- Table structure for table `attribute_categories`
--

CREATE TABLE IF NOT EXISTS `attribute_categories` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attid` int(11) NOT NULL COMMENT 'attribute ID',
  `catid` int(11) NOT NULL COMMENT 'Category ID',
  `is_main` int(11) NOT NULL DEFAULT '0' COMMENT '0-Not Main Attribute, 1-Main Attribute',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COMMENT='Show which attribute belongs to which category';

--
-- Dumping data for table `attribute_categories`
--

INSERT INTO `attribute_categories` (`id`, `attid`, `catid`, `is_main`, `del_status`) VALUES
(1, 12, 7, 1, 1),
(2, 12, 23, 1, 0),
(3, 12, 23, 1, 1),
(4, 12, 23, 1, 0),
(5, 13, 15, 1, 1),
(12, 2, 23, 0, 0),
(13, 1, 23, 0, 0),
(16, 14, 4, 1, 0),
(29, 13, 25, 0, 0),
(30, 2, 25, 0, 0),
(31, 1, 25, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_masters`
--

CREATE TABLE IF NOT EXISTS `attribute_masters` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attname` varchar(250) NOT NULL COMMENT 'Attribute Name',
  `attdesc` text COMMENT 'Attribute Description',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_masters`
--

INSERT INTO `attribute_masters` (`id`, `attname`, `attdesc`, `del_status`) VALUES
(1, 'Size', 'different Sizes ', 1),
(2, 'Colors', 'Red, green, black, etc', 1),
(13, 'Color_new', 'This is the color attribute.', 1),
(14, 'Smart Phone', 'This is the smart phone attribute description.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE IF NOT EXISTS `attribute_values` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attid` int(11) NOT NULL COMMENT 'attribute ID',
  `attvalue` varchar(250) NOT NULL COMMENT 'Attribute Value',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='will store att. values Color-Red,green,etc.';

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attid`, `attvalue`, `del_status`) VALUES
(1, 1, 'Small', 1),
(2, 1, 'Medium', 0),
(3, 2, 'Large', 0),
(4, 1, 'X-Large', 0),
(5, 1, 'XX_large', 0),
(6, 2, 'Red', 0),
(7, 2, 'Green', 1),
(8, 2, 'Black', 0),
(9, 2, 'Blue', 0),
(10, 2, 'White', 1),
(11, 2, 'Red', 1),
(12, 2, 'as', 1),
(13, 3, 'Shashi size', 0),
(14, 13, 'Light Black', 1),
(16, 13, 'Orange', 0),
(17, 13, 'White', 1),
(18, 14, 'Android', 0),
(19, 14, 'Windows 8', 0),
(20, 14, 'windows 10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `catname` varchar(250) NOT NULL COMMENT 'Category Name',
  `catdesc` text NOT NULL COMMENT 'Category Description',
  `catimg` varchar(250) NOT NULL COMMENT 'folder path for category image',
  `parentid` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent Category ID. Default 0',
  `url_alias` text NOT NULL COMMENT 'Complete URL after domain name',
  `catmtitle` text COMMENT 'Meta Title',
  `catmdesc` text COMMENT 'Meta Description',
  `catmkeywords` text COMMENT 'Meta Keywords',
  `catcanonical` text COMMENT 'if any - canonical URL can be entered here.',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='Category Master table storing all category related info.';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `catdesc`, `catimg`, `parentid`, `url_alias`, `catmtitle`, `catmdesc`, `catmkeywords`, `catcanonical`, `del_status`) VALUES
(2, 'Shoes', 'This is the shoes category description.', 'buckingham-palace-london.jpg', 0, 'http://www.shoes.com', 'shoes meta title', 'This is the shoes meta description.', 'shoes meta keyword', NULL, 2),
(3, 'Clothes', 'This is the clothes category description.', 'buckingham-palace-london.jpg', 0, 'http://www.shoes.com', 'clothes meta title', 'This is the clothes meta description.', 'clothes meta keyword', 'This is the canonicle url.', 2),
(4, 'Mobile Phones', 'This is the mobile phone description.', 'buckingham-palace-london.jpg', 7, 'http://www.mobile_phones.com', 'mobile phones meta title', 'This is the mobile phones meta description.', 'mobile phones meta keyword', 'This is the canonicle url.', 1),
(6, 'sub_type_lumia', 'shashikant', 'Fountain on the Place de la Concorde, Paris, France.jpg', 10, 'shashikant', 'shashikant', 'shashikant', 'shashikant', '', 1),
(7, 'Electonics', 'This is the Electonics description.', '20150826_011709_[wallcoo]_france_travel_france_EF052.jpg', 0, 'www.elecrinics.com', 'Electonics Meta Title', 'Electonics Meta Description', 'Electonics Meta Keywords', 'Electonics canonical url', 1),
(8, 'Samsung', 'This is the Samsung description.', '20150826_011653_City-Headers4.jpg', 4, 'www.samsung.com', 'Samsung Meta Title', 'Samsung Meta Description', 'Samsung Meta Keywords', 'canonicle Url', 1),
(9, 'Microsoft', 'This is the Electonics description.', '20150826_011630_6958311-london-thames-city-hall.jpg', 4, 'www.microsoft.com', 'Microsoft Meta Title', 'Microsoft Meta Description', 'Microsoft Meta Keywords', 'canonicle Url', 1),
(10, 'Limia 640 XL', 'This is the Electonics description.', '20150826_011607_City-Headers4.jpg', 9, 'www.Limia.com', 'Limia 640 XL Meta Title', 'Limia 640 XL Meta Description', 'Limia 640 XL Meta Keywords', 'canonicle Url', 1),
(11, 'Limia 640', 'This is the Limia 640 description.', '20150826_011607_images.jpg', 9, 'www.lumia.com', 'Limia 640 Meta Title', 'Limia 640 Meta Description', 'Limia 640 Meta Keywords', 'Limia 640 canonical url', 1),
(14, 'Galaxy S-14', 'Galaxy S-14 Category Description', '20150826_011607_City-Headers4.jpg', 8, 'Galaxy S-14 url alias', 'Galaxy S-14 url alias', 'Galaxy S-14 Meta Description.', 'Galaxy S-14 keywords', 'Galaxy S-14 canonicle url', 1),
(15, 'Tablets', 'This is the tablet category description.', 'paris-france-at-night-hd-wallpapersgf.jpg', 4, 'url alise', 'Tablet meta title', 'Tablet meta description', 'Tablet meta keywords', 'Tablet canonical url', 1),
(16, 'Laptops', 'This is the Laptops category description.', 'paris-france-at-night-hd-wallpapersgf.jpg', 7, 'laptops_url_alias', 'Laptops Meta title', 'Laptops Meta description', 'Laptops Meta keywords', 'Laptops canonical url', 0),
(23, 'Tv''s', 'This is the Tv''s category description.', 'buckingham-palace-london.jpg', 7, 'url alise', 'Tv''s meta title', 'Tv''s meta description', 'Tv''s meta keywords', 'Tv''s canonical url', 0),
(24, 'Mens', 'This is the Mens category description.', 'maxresdefault.jpg', 3, 'Mens', 'Mens Meta Title', 'Mens Meta Description', 'Mens Meta Keywords', 'Mens canoncal url', 0),
(25, 'Adidas', 'This is the adidas category description.', 'buckingham-palace-london.jpg', 24, 'Adidas_url_alise', 'Adidas meta title', 'Adidas Meta Description', 'Adidas meta keywords', '', 0);

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
(5, 'About Us', 'This is the About Us page meta title.', 'This is the About Us page meta keywords.', 'This is the About Us page meta description.', '<p>This is the&nbsp;This is the About Us page page content.</p>\r\n', 'alert("This is the about us page");', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer_masters`
--

CREATE TABLE IF NOT EXISTS `offer_masters` (
`id` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `offername` varchar(250) NOT NULL,
  `offercat` varchar(250) DEFAULT NULL COMMENT 'Comma seperated Cat Id OR zero 0 for ALL CAT',
  `offerprod` varchar(250) DEFAULT NULL COMMENT 'Comma seperated Prod Id OR zero 0 for ALL Products',
  `offerdesc` text NOT NULL,
  `discount` float(2,2) NOT NULL,
  `freeshipping` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0- NO free shipping, 1-Yes free Shipping applicable.',
  `offerstartdt` datetime NOT NULL COMMENT 'date and TIME to start offer.',
  `offerenddt` datetime NOT NULL COMMENT 'Date and TIME to end offer',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Save Offer details';

--
-- Dumping data for table `offer_masters`
--

INSERT INTO `offer_masters` (`id`, `offername`, `offercat`, `offerprod`, `offerdesc`, `discount`, `freeshipping`, `offerstartdt`, `offerenddt`, `del_status`) VALUES
(1, 'First', '2,3', '19,16', 'First', 0.99, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'First', '2,3,7', '19,17,16', 'First', 0.99, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'First', '2,3,7', '19,17,16,14', 'First', 0.99, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'First', '0,2,3,7', '19,17,16,14', 'First', 0.99, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'First', '2,3,7,8', '19,17,16,14', 'First', 0.99, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

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
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Delete'
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
  `del_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Will store Main Order details';

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`ostatusid` int(11) NOT NULL COMMENT 'Auto Incremented Value',
  `ostatusname` varchar(250) NOT NULL,
  `ostatusdesc` text NOT NULL,
  `del_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Allows admin to create Order Status as required.';

-- --------------------------------------------------------

--
-- Table structure for table `produc_attributes`
--

CREATE TABLE IF NOT EXISTS `produc_attributes` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `prodid` int(11) NOT NULL COMMENT 'Product ID',
  `attvid` int(11) NOT NULL COMMENT 'Attribute Value ID',
  `add_cost` float(4,2) DEFAULT NULL COMMENT 'Additional Cost',
  `less_cost` float(4,2) DEFAULT NULL COMMENT 'Less Cost',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1 COMMENT='Show which attribute has what value for a product. ';

--
-- Dumping data for table `produc_attributes`
--

INSERT INTO `produc_attributes` (`id`, `prodid`, `attvid`, `add_cost`, `less_cost`, `del_status`) VALUES
(11, 30, 11, 99.99, 50.00, 0),
(12, 30, 10, 99.99, 50.00, 0),
(13, 30, 9, 99.99, 50.00, 1),
(14, 30, 4, 99.99, 50.00, 0),
(15, 30, 2, 99.99, 50.00, 0),
(18, 31, 17, 99.99, 50.00, 0),
(19, 31, 14, 99.99, 50.00, 0),
(20, 31, 4, 99.99, 50.00, 0),
(21, 31, 1, 99.99, 50.00, 0),
(27, 32, 5, 99.99, 50.00, 0),
(28, 32, 4, 99.99, 50.00, 0),
(29, 32, 2, 99.99, 50.00, 0),
(30, 32, 1, 99.99, 50.00, 0),
(31, 32, 11, 99.99, 50.00, 0),
(32, 37, 10, 99.99, 50.00, 0),
(33, 32, 8, 99.99, 50.00, 0),
(34, 34, 4, 99.99, 50.00, 1),
(35, 34, 11, 99.99, 50.00, 0),
(60, 38, 16, 99.99, 20.00, 1),
(61, 38, 14, 80.00, 50.00, 1),
(62, 38, 12, 30.00, 40.00, 0),
(63, 38, 5, 99.99, 99.99, 1),
(64, 38, 2, 99.99, 99.99, 1),
(70, 39, 20, 99.99, 50.00, 0),
(71, 39, 19, 99.99, 99.99, 1),
(72, 39, 18, 20.00, 30.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produc_images`
--

CREATE TABLE IF NOT EXISTS `produc_images` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `prodid` int(11) NOT NULL COMMENT 'Product ID',
  `imagepath` varchar(250) NOT NULL COMMENT 'Folder and image name',
  `imgalt` text COMMENT 'ALT tag for images',
  `isdefault` int(11) NOT NULL COMMENT '0-No, 1- Yes use as default image',
  `order` int(11) NOT NULL,
  `del_status` int(11) NOT NULL COMMENT '0-active, 1-inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produc_images`
--

INSERT INTO `produc_images` (`id`, `prodid`, `imagepath`, `imgalt`, `isdefault`, `order`, `del_status`) VALUES
(1, 16, '20150826_011653_City-Headers4.jpg', NULL, 0, 0, 0),
(2, 16, '20150826_011653_images.jpg', NULL, 0, 0, 0),
(3, 16, '20150826_011709_[wallcoo]_france_travel_france_EF052.jpg', NULL, 0, 0, 0),
(4, 16, '20150826_011653_images.jpg', NULL, 0, 0, 0),
(5, 16, '20150826_011709_[wallcoo]_france_travel_france_EF052.jpg', NULL, 0, 0, 0),
(6, 16, 'City-Headers4.jpg', NULL, 0, 0, 0),
(7, 16, 'Fountain on the Place de la Concorde, Paris, France.jpg', NULL, 0, 0, 0),
(8, 16, 'images.jpg', NULL, 0, 0, 0),
(9, 16, 'City-Headers4.jpg', NULL, 0, 0, 0),
(10, 16, 'Fountain on the Place de la Concorde, Paris, France.jpg', NULL, 0, 0, 0),
(11, 16, 'images.jpg', NULL, 0, 0, 0),
(12, 18, '20150826_011653_7026335-big-ben-uk-london-city-street-photo.jpg', NULL, 0, 0, 0),
(13, 18, '20150826_011653_4733369444_1668879274_b.jpg', NULL, 0, 0, 0),
(14, 18, '20150826_011653_City-Headers4.jpg', NULL, 0, 0, 0),
(15, 19, '20150826_011544_4733369444_1668879274_b.jpg', 'Mayur chobhe', 0, 2, 2),
(16, 19, '20150826_011607_City-Headers4.jpg', 'shashi', 2, 2, 1),
(17, 0, '', NULL, 1, 0, 1),
(18, 0, '', NULL, 1, 0, 0),
(19, 0, '', NULL, 1, 0, 0),
(20, 30, 'maxresdefault.jpg', NULL, 0, 0, 0),
(21, 30, 'paris-france-at-night-hd-wallpapersgf.jpg', NULL, 0, 0, 0),
(22, 30, 'City-Headers4.jpg', NULL, 0, 0, 0),
(23, 30, 'City-Headers4.jpg', NULL, 0, 0, 0),
(24, 31, 'buckingham-palace-london.jpg', 'mayur', 1, 0, 1),
(25, 31, 'City-Headers4.jpg', 'shashikant', 0, 4, 1),
(26, 31, 'maxresdefault.jpg', NULL, 0, 0, 0),
(27, 31, 'paris-france-at-night-hd-wallpapersgf.jpg', NULL, 0, 0, 1),
(28, 32, 'a5d8d89be67b19381c793f26e4aebdb3.jpg', NULL, 0, 0, 0),
(29, 32, 'Louvre-Pyramid.jpg', NULL, 0, 0, 0),
(30, 34, 'a5d8d89be67b19381c793f26e4aebdb3.jpg', NULL, 0, 0, 0),
(31, 34, 'maxresdefault.jpg', NULL, 0, 0, 0),
(33, 38, 'maxresdefault.jpg', NULL, 0, 0, 0),
(34, 39, 'City-Headers4.jpg', 'shashi', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produc_masters`
--

CREATE TABLE IF NOT EXISTS `produc_masters` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `catid` int(11) NOT NULL COMMENT 'Category ID',
  `prodname` varchar(250) NOT NULL COMMENT 'Product Name',
  `prodscdes` text NOT NULL COMMENT 'Short Description',
  `proddesc` text NOT NULL COMMENT 'Long Description',
  `prodprice` float(4,2) NOT NULL COMMENT 'Product Price with 2 decimals',
  `clearance` int(11) NOT NULL COMMENT '0-- Default No, 1-- Clearance item',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date time when added.',
  `url_alias` text NOT NULL COMMENT 'Complete URL after domain name',
  `prodmtitle` text COMMENT 'Meta Title',
  `prodmdesc` text COMMENT 'Meta Description',
  `prodmkeywords` text COMMENT 'Meta Keywords',
  `prodcanonical` text COMMENT 'if any - canonical URL can be entered here.',
  `del_status` int(11) NOT NULL COMMENT '0-active, 1-inactive, 2-deleted'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COMMENT='Stores Basic Product Information';

--
-- Dumping data for table `produc_masters`
--

INSERT INTO `produc_masters` (`id`, `catid`, `prodname`, `prodscdes`, `proddesc`, `prodprice`, `clearance`, `date_added`, `url_alias`, `prodmtitle`, `prodmdesc`, `prodmkeywords`, `prodcanonical`, `del_status`) VALUES
(1, 0, 'shashikant', 'shashikant', 'shashikant', 0.00, 0, '2015-10-13 17:09:44', '', 'shashikant', 'shashikant', 'shashikant', 'shashikant', 1),
(2, 0, 'shashikant', 'shashikant', 'shashikant', 0.00, 0, '2015-10-13 17:10:18', '', 'shashikant', 'shashikant', 'shashikant', 'shashikant', 1),
(3, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:28:19', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(4, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:28:36', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(5, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:29:17', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(6, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:29:39', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(7, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:30:13', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(8, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:32:43', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(9, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:32:56', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(10, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:34:21', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(11, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:34:33', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(12, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:34:55', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(13, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:35:52', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(14, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:37:55', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(15, 0, 'Shashikant', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:38:16', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(16, 0, 'Shashikantshashujabn', 'Shashikant', 'Shashikant', 0.00, 0, '2015-10-13 17:38:52', '', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 1),
(17, 0, 'shashikant', 'shashikant', 'shashikant', 0.00, 0, '2015-10-13 19:06:55', '', 'shashikant', 'shashikant', 'shashikant', 'shashikant', 1),
(19, 8, 'Galaxy A1', 'Galaxy A1 Product Short Description', 'Galaxy A1 Product Long Description', 0.00, 0, '2015-10-15 13:10:16', '', 'Galaxy A1 Meta title', 'Galaxy A1 Meta Description', 'Galaxy A1 Meta Keywords', 'Galaxy A1 Canonicle Url', 1),
(30, 4, 'Google Nexus', 'This is the google Nexus Phone.', 'This is the google Nexus Phone long description.', 99.99, 0, '2015-10-16 17:26:29', '', 'googlenexus meta title', 'googlenexus meta descriptiom', 'googlenexus meta keywords', 'googlenexus meta keywords', 0),
(31, 15, 'Lenovo', 'This is the Lenovo tablet short description.', 'This is the Lenovo tablet long description.', 99.99, 0, '2015-10-17 10:21:57', '', 'Lenovo tablet meta title', 'Lenovo tablet meta description', 'Lenovo tablet meta keywords', 'Lenovo tablet meta keywords', 0),
(32, 25, 'T-Shrit F20', 'T-Shrit F20 Short Description.', 'T-Shrit F20 logn description.', 99.99, 1, '2015-10-17 15:06:29', '', 'T-Shrit F20 Meta title', 'T-Shrit F20 Meta Description', 'T-Shrit F20 Keywords', 'T-Shrit F20 Canonical url', 0),
(33, 25, 'Cargo lk', 'Cargo Short Description.', 'Cargo Long Description.', 99.99, 0, '2015-10-17 15:20:29', 'url_alias', 'Cargo Meta title', 'Cargo Meta description', 'Cargo Meta keywords', 'Cargo Canonical url', 0),
(34, 25, 'Cargo lk', 'Cargo Short Description.', 'Cargo Long Description.', 99.99, 0, '2015-10-17 15:20:48', 'url_alias', 'Cargo Meta title', 'Cargo Meta description', 'Cargo Meta keywords', 'Cargo Canonical url', 0),
(35, 23, 'one', 'one', 'one', 99.99, 0, '2015-10-17 17:22:41', 'url_alias', 'one', 'one', 'one', 'one', 0),
(36, 23, 'one', 'one', 'one', 99.99, 0, '2015-10-17 17:23:17', 'url_alias', 'one', 'one', 'one', 'one', 0),
(37, 23, 'one', 'one', 'one', 99.99, 0, '2015-10-17 17:24:46', 'url_alias', 'one', 'one', 'one', 'one', 0),
(38, 23, 'one', 'one', 'one', 99.99, 0, '2015-10-17 17:26:09', 'url_alias', 'one', 'one', 'one', 'one', 0),
(39, 4, 'asd', 'asd', 'asd', 99.99, 0, '2015-10-19 10:25:14', 'asd', 'asd', 'asd', 'asd', 'asd', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='General Global site Settings';

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_url`, `defaulttitle`, `defaultdesc`, `defaultkeywords`, `defaultcanonical`, `contactemail`, `orderemail`, `registeremail`, `freeshipping`, `maintenance`) VALUES
(1, 'Only Human', 'Online Shopping', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(2, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(3, 'Only Human', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(4, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(5, 'Admin Panel', 'Admin Panel', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(6, 'Shashikant', 'Shashikantaaaaaaaaa', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0');

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
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COMMENT='Basic User information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usrfname`, `usrlname`, `username`, `password`, `usrtype`, `usrtypea`, `last_login`, `del_status`) VALUES
(1, 'ss', 'sas', 'spchobhe_grt@gmail.com', 'spchobhe', 0, '1', '0000-00-00 00:00:00', 1),
(2, 'asas', 'as', 'shital@gmail.com', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', 0, '1', '0000-00-00 00:00:00', 1),
(3, 'Mayur Raj', 'sd', 'shashi123@gmail.com', '1aa22fdc02ef15f872229300388e9fa845b87f06', 0, '1', '0000-00-00 00:00:00', 1),
(4, 'asas', 'sas', 'shashi1234@gmail.com', '4d592a396a47cfee93e0092d767c42908f1995b6', 0, '1', '2015-10-08 15:54:22', 1),
(5, 'ss', 'sas', 'test123@gmail.com', '0d592da30998c8cb065c4bedc812ac6f3b90c0e9', 0, '1', '2015-10-08 15:55:07', 1),
(6, 'ss', 'sas', 'shashi1234@gmail.coma', 'a155ccd6805bc2da9b89a098459bb5ecf2644621', 0, '1', '2015-10-08 15:56:29', 1),
(7, 'ss', 'sas', 'spchobashe_grt@gmail.com', 'cce9a389e3350d91206d2b50c8405fd7cf0eea4b', 0, '1', '2015-10-08 15:57:13', 1),
(8, 'ss', 'sas', 'shital@gmail.comas', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', 0, '', '2015-10-08 15:59:16', 1),
(9, 'ss', 'sas', 'shital@gmail.comasas', 'efb6ed2405d63ddfb78723327e9d988dfa49867a', 0, '', '2015-10-08 15:59:40', 1),
(10, 'ss', 'sas', 'shital@gmail.coaasm', '55cc15bd265769b8fe39f44316b0d150df98c70a', 0, '', '2015-10-08 16:00:09', 1),
(11, 'ss', 'sas', 'shital@gmaaail.com', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', 0, '1', '2015-10-08 16:00:47', 1),
(12, 'Shashikant', 'Chobhe', 'spchobhe@live.com', '1336ecda88837f6e9a75dc364d2f989f372c0e27', 0, '1', '2015-10-08 16:01:55', 1),
(13, 'mayurchobhe', 'mayurchobhe', 'mayurchobhe@gmail.com', '732a816bd73193fe1ebf9e6d5e1e8866b7020b93', 0, '1', '2015-10-08 16:20:08', 1),
(14, 'mayurchobhea', 'mayurchobhea', 'mayurchobhea@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 2, '0', '2015-10-08 16:22:07', 1),
(15, 'Shashikant', 'sas', 'test123@gmail.coma', 'da59e489b69e8d5abb797697c9806436c96d63d4', 2, '0', '2015-10-08 16:35:17', 1),
(16, 'nitin', 'nitin', 'nitin@gmail.com', '6e195049010374722b04a2088b7dd7d7e40bb87d', 2, '0', '2015-10-08 16:50:42', 1),
(17, 'mahesh', 'mahesh', 'mahesh@gmail.com', 'maheshmahesh', 2, '0', '2015-10-08 17:11:11', 1),
(18, 'mahesha', 'mahesha', 'f60ed2dab23589023fab26b746b2e834ec1dcdac', 'maheshamahesha', 2, '0', '2015-10-08 17:12:10', 1),
(19, 'mahesha', 'mahesha', 'mahesha@gmail.com', 'f60ed2dab23589023fab26b746b2e834ec1dcdac', 2, '0', '2015-10-08 17:14:42', 1),
(20, 'maheshaa', 'maheshaa', 'maheshaa@gmail.com', '168389627f1d3766df789e6d7da849e551f79755', 2, '0', '2015-10-08 17:15:41', 1),
(21, 'shitalgophane', 'shitalgophane', 'shitalgophane@gmail.com', 'shitalgophane', 2, '0', '2015-10-08 17:19:15', 1),
(22, 'shitalgophane', 'shitalgophane', 'shitalgophanea@gmail.com', '40a968e8809041e76fa07579b5e6a0da18e5b1df', 2, '0', '2015-10-08 17:20:05', 1),
(23, 'shashikant', 'chobhe', 'shashikant.chobhe@sibzsolutions.com', '46ac2e696b52e2012a2699ce98cd831cbcdd6552', 2, '0', '2015-10-09 06:22:15', 2),
(24, 'Shashikant', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 0, '0', '0000-00-00 00:00:00', 1),
(25, 'Shashikant', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', 0, '0', '0000-00-00 00:00:00', 2),
(26, 'Mayur', 'Chobhe', 'Shashiakantchobhe111@gmail.com', '152f58731d894aa5ee2fb6fe0dcdb69e1dcf490f', 2, '', '0000-00-00 00:00:00', 0),
(27, 'Amol', 'Pangare', 'amol@gmail.com', '30379e4267ae5e1b16d0c88476e491b36326708c', 2, '0', '2015-10-09 15:01:14', 1),
(28, 'shashi', 'chobhe', 'shashi@gmail.com', '2c30185480d659a990211fb1cb83d89a0e670dfe', 2, '', '2015-10-13 06:10:22', 0),
(29, 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa@gmail.com', 'abafcb7ac7a4b78d7695941e06264ead5cba3524', 0, '', '2015-10-17 08:58:35', 0),
(30, 'shashikant', 'chobhe', 'admin@gmail.com', '58acde71636768035905ac3cde780108e6c35ea1', 1, '0', '2015-10-17 09:12:47', 0),
(31, 'shashikant', 'chobhe', 'superadmin@gmail.com', 'e086530b379bd6417c21c07631a1c742e06cc4af', 2, '', '2015-10-17 09:13:26', 0);

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
  `del_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Delete'
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
  `del_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
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
  `del_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users Wish List ';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_masters`
--
ALTER TABLE `attribute_masters`
 ADD PRIMARY KEY (`id`,`attname`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_masters`
--
ALTER TABLE `offer_masters`
 ADD PRIMARY KEY (`id`);

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
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produc_images`
--
ALTER TABLE `produc_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produc_masters`
--
ALTER TABLE `produc_masters`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `attribute_masters`
--
ALTER TABLE `attribute_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offer_masters`
--
ALTER TABLE `offer_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=6;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `produc_images`
--
ALTER TABLE `produc_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `produc_masters`
--
ALTER TABLE `produc_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=32;
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
