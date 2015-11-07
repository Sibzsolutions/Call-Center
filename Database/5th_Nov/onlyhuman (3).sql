-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2015 at 02:46 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='Show which attribute belongs to which category';

--
-- Dumping data for table `attribute_categories`
--

INSERT INTO `attribute_categories` (`id`, `attid`, `catid`, `is_main`, `del_status`) VALUES
(1, 1, 8, 0, 0),
(2, 2, 8, 1, 0),
(3, 3, 9, 1, 0),
(4, 1, 13, 0, 0),
(5, 2, 14, 0, 0),
(6, 1, 14, 0, 0),
(7, 1, 15, 0, 0),
(10, 3, 16, 0, 0),
(11, 1, 16, 0, 0),
(12, 3, 17, 0, 0),
(13, 1, 17, 0, 0),
(14, 6, 17, 1, 0),
(20, 10, 18, 1, 0),
(21, 11, 18, 1, 0),
(22, 12, 18, 1, 0),
(23, 13, 18, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_masters`
--

CREATE TABLE IF NOT EXISTS `attribute_masters` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attname` varchar(250) NOT NULL COMMENT 'Attribute Name',
  `attdesc` text COMMENT 'Attribute Description',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_masters`
--

INSERT INTO `attribute_masters` (`id`, `attname`, `attdesc`, `del_status`) VALUES
(1, 'Color', 'This is the color attribute under the Men(All Clothing) clothing', 0),
(2, 'Size', 'This is the size attribute under the all clothing.', 0),
(3, 'Size', 'This is the size attribute under the footwear.', 0),
(6, 'Color', 'This is the color category description.', 0),
(10, 'Brand', 'Brand', 0),
(11, 'Price', 'Brand', 0),
(12, 'Size', 'Size', 0),
(13, 'Color', 'Color', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE IF NOT EXISTS `attribute_values` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attid` int(11) NOT NULL COMMENT 'attribute ID',
  `attvalue` varchar(250) NOT NULL COMMENT 'Attribute Value',
  `att_value_img` varchar(100) DEFAULT NULL,
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='will store att. values Color-Red,green,etc.';

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attid`, `attvalue`, `att_value_img`, `del_status`) VALUES
(1, 3, 'Medium', '', 0),
(2, 3, 'Small', '', 0),
(3, 2, 'Extra Large', '', 0),
(4, 2, 'Large', '', 0),
(5, 2, 'Medium', '', 0),
(6, 1, 'Red', 'crystal-pokeball-pokemon-poster-ps00003-200x200-imaeygc6vxdbjhme.jpeg', 0),
(7, 1, 'Black', 'disney-frozen-elsa-poster-ps00471-200x200-imaeygc6qytcary2.jpeg', 0),
(8, 1, 'Purple', 'mockingjay-pin-hunger-games-poster-ps00372-200x200-imaeygc6zy5zty37.jpeg', 0),
(9, 1, 'White', 'dance-moves-salman-khan-ppga22-m-medium-200x200-imae6nwd2tzbktas.jpeg', 0),
(10, 5, 'Leather Belt', '', 0),
(11, 5, 'Plastic Material', '', 0),
(12, 1, 'Yellowa', 'minions-heart-poster-ps00048-200x200-imaeygc766gfjrdn.jpeg', 0),
(13, 1, 'Yellowa', 'stylish-white-blue-car-imb9898pgy0615-small-200x200-imae9qf8mqb9p5jc.jpeg', 0),
(14, 13, 'Yellowasas', 'yf-r-by-02-toons-275x340-imae37h2emj4thth.jpeg', 0),
(15, 12, 'XL', 'st-1455-shoppertree-275x340-imae6yr6vtrdu9xa.jpeg', 0),
(16, 12, 'L', 'st-1455-shoppertree-275x340-imae6yr6vtrdu9xa.jpeg', 0),
(17, 12, 'M', 'st-1455-shoppertree-275x340-imae6yr6vtrdu9xa.jpeg', 0),
(18, 12, 'XS', 'st-1455-shoppertree-275x340-imae6yr6vtrdu9xa.jpeg', 0),
(19, 10, 'Levi''s', 'yf-r-by-02-toons-275x340-imae37h2emj4thth.jpeg', 0),
(20, 10, 'Reebok', 'yf-r-by-02-toons-275x340-imae37h2emj4thth.jpeg', 0),
(21, 10, 'Mufti', 'yf-r-by-02-toons-275x340-imae37h2emj4thth.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_masters`
--

CREATE TABLE IF NOT EXISTS `cart_masters` (
`id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_masters`
--

INSERT INTO `cart_masters` (`id`, `user_id`, `product_id`, `del_status`) VALUES
(1, 3, 1, 1),
(2, 3, 1, 1),
(3, 3, 1, 1),
(4, 3, 2, 1),
(5, 3, 1, 1),
(6, 3, 1, 1),
(7, 3, 2, 1),
(8, 3, 2, 1),
(9, 3, 3, 1),
(10, 3, 1, 1),
(11, 3, 2, 1),
(12, 3, 3, 1),
(13, 3, 2, 1),
(14, 3, 3, 1),
(15, 3, 3, 1),
(16, 3, 1, 1),
(17, 3, 3, 1),
(18, 3, 1, 1),
(19, 3, 1, 1),
(20, 3, 1, 1),
(21, 3, 2, 1),
(22, 3, 3, 1),
(23, 3, 1, 1),
(24, 3, 2, 1),
(25, 3, 3, 1),
(26, 3, 1, 1),
(27, 3, 2, 1),
(28, 3, 3, 1),
(29, 3, 1, 1),
(30, 3, 2, 1),
(31, 3, 3, 1),
(32, 3, 1, 1),
(33, 3, 2, 1),
(34, 3, 3, 1),
(35, 3, 3, 1),
(36, 3, 1, 1),
(37, 3, 2, 1),
(38, 3, 3, 1),
(39, 3, 3, 1),
(40, 3, 2, 1),
(41, 3, 2, 1),
(42, 3, 2, 1),
(43, 3, 2, 1),
(44, 13, 2, 1),
(45, 3, 2, 1),
(46, 3, 3, 0),
(47, 3, 3, 0),
(48, 3, 1, 0),
(49, 3, 2, 1),
(50, 3, 3, 0),
(51, 3, 2, 1),
(52, 13, 2, 1),
(53, 13, 3, 0),
(54, 3, 2, 1),
(55, 3, 3, 0),
(56, 3, 3, 0),
(57, 3, 2, 1),
(58, 3, 2, 1),
(59, 3, 3, 0),
(60, 3, 1, 0),
(61, 13, 3, 0),
(62, 13, 2, 1),
(63, 13, 3, 0),
(64, 13, 1, 0),
(65, 13, 2, 1),
(66, 13, 2, 1),
(67, 13, 2, 1),
(68, 13, 2, 1),
(69, 13, 3, 0),
(70, 13, 2, 1),
(71, 13, 1, 0),
(72, 13, 5, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Category Master table storing all category related info.';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `catdesc`, `catimg`, `parentid`, `url_alias`, `catmtitle`, `catmdesc`, `catmkeywords`, `catcanonical`, `del_status`) VALUES
(1, 'Electronics', 'This is the electronics category.', '20140923-162648-mu3-2.jpg', 0, 'elecronics.com', 'Electronics Meta Title', 'Electronics Meta Description', 'Electronics Meta Keywords', 'Electronics Canonical Url', 0),
(2, 'Men', 'This is the men category.', 'gmsff0039orange-gant-m-275x340-imae4jf5m9ptmyty.jpeg', 0, 'mens.com', 'Men Meta Title', 'Men Meta Description', 'Men Meta Keywords', 'Men Canonical Url', 0),
(3, 'Womens', 'This is the women category.', '20151012-204236-only-img.jpg', 0, 'womens.com', 'Women Meta Title', 'Women Meta Description', 'Women Meta Keywords', 'Women Canonical Url', 0),
(4, 'Baby & Kids', 'This is the kids category.', 'stripe-pl03-perky-s-275x340-imae5gsyskmnfhqk.jpeg', 0, 'kids.com', 'Kids Meta Title', 'Kids Meta Description', 'Kids Meta Keywords', 'Kids Canonical Url', 0),
(5, 'Home & Furniture', 'This is the men category.', 'sc002-zesture-200x200-imae88p8ytmhtgv3.jpeg', 0, 'furniture.com', 'Home & Furniture Meta Title', 'Home & Furniture Meta Title', 'Home & Furniture Meta Keywords', 'Home & Furniture Canonical Url', 0),
(6, 'Books & Media', 'This is the men category.', 'wings-of-fire-an-autobiography-200x200-imae8hfb7uxe8yxg.jpeg', 0, 'books.com', 'Books & Media Meta Title', 'Books & Media Meta Description', 'Books & Media Meta Keywords', 'Books & Media Canonical Url', 0),
(7, 'Auto & Sports', 'This is the Auto & Sports Description.', 'fly-mini-clip-mobile-holder-200x200-imaefe8y97yyqwbp.jpeg', 0, 'auto.com', 'Auto & Sports Meta Title', 'Auto & Sports Meta Keywords', 'Auto & Sports Meta Keywords', 'Auto & Sports Canonical Url', 0),
(8, 'All Clothing', 'This is the All Clothing category.', '15p5ac11u008i901-united-colors-of-benetton-m-275x340-imae8xvysh4ufe8c.jpeg', 2, 'clothing.com', 'All Clothing Meta Title', 'All Clothing Meta Description', 'All Clothing Meta Keywords', 'All Clothing Canonical Url', 0),
(9, 'Footwear', 'This is the Footwear category.', 'black-high-risk-red-lynus-dp-puma-11-200x200-imae8hejnyneyghn.jpeg', 2, 'footwear.com', 'Footwear Meta Title', 'Footwear Meta Description', 'Footwear Meta Keywords', 'Canonical Url', 0),
(10, 'Fregnance', 'This is the Fregnance category.', 'deodorant-spray-men-giorgio-armani-150-code-200x200-imadrhjbyr92daxg.jpeg', 2, 'fregnances.com', 'Fregnance Meta Title', 'Fregnance Meta Desciption', 'Fregnance Meta Keywords', 'Fregnance Canonical Url', 0),
(11, 'Sunglasses', 'This is the Sunglasses category.', '3026-blk-forest-grn-floyd-m-200x200-imadybj6q8ysusyu.jpeg', 2, 'sunglassess.com', 'Sunglasses Meta Title', 'Sunglasses Meta Description', 'Sunglasses Meta Keywords', 'Sunglasses Canonical Url', 0),
(12, 'Watches', 'This is the Watches category.', 'g339-casio-200x200-imadj7dtz7qjmgsf.jpeg', 2, 'watches.com', 'Watches Meta Title', 'Watches Meta Description', 'Watches Meta Keywords', 'Canonical Url', 0),
(13, 'Casual', 'This is the casual category description.', '15p5af38u008i901-united-colors-of-benetton-m-275x340-imae9fg7yhhwh8nv.jpeg', 9, 'casual footwear', 'casual footwear meta title', 'casual footwear meta description.', 'casual footwear meta keywords', 'casual footwear canonical url', 0),
(14, 'Clothes', 'This is the category description.', '15p5af35u008i901-united-colors-of-benetton-m-275x340-imae92b8hqggkm9e.jpeg', 3, 'womens clothes', 'womens clothes meta title', 'womens clothes meta keywords', 'womens clothes meta keywords', 'womens clothes canonical url', 0),
(15, 'Arrival', 'This is the New Arrival category description.', 'gmsff0039orange-gant-m-275x340-imae4jf5m9ptmyty.jpeg', 13, 'casual footwear', 'casual footwear meta title', 'casual footwear meta description.', 'casual footwear meta keywords', 'casual footwear canonical url', 0),
(18, 'T- shirts', 'This is the T- shirts description.', '647bsetofthree-shaun-275x340-imae7mf6yu5scgje.jpeg', 4, 'T- shirts', 'T- shirts', 'T- shirts', 'T- shirts', 'T- shirts', 0),
(19, 'Casual', 'Casual', 'silky-denim-shirt-blue-kabeer-275x340-imae783aaqkxbxhk.jpeg', 4, 'Casual', 'Casual', 'Casual', 'Casual', 'Casual', 0),
(20, 'Jeans', 'Jeans', 'yf-r-by-02-toons-275x340-imae37h2emj4thth.jpeg', 4, 'Jeans', 'Jeans', 'Jeans', 'Jeans', 'Jeans', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE IF NOT EXISTS `contact_uses` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(250) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `name`, `email`, `website`, `message`) VALUES
(1, 'Shashikant', 'shashikantchobhe@rediffmail.com', 'www.shashikantchobhe.com', 'hei shashikant');

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
  `discount` float NOT NULL,
  `freeshipping` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0- NO free shipping, 1-Yes free Shipping applicable.',
  `offerstartdt` datetime NOT NULL COMMENT 'date and TIME to start offer.',
  `offerenddt` datetime NOT NULL COMMENT 'Date and TIME to end offer',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Save Offer details';

--
-- Dumping data for table `offer_masters`
--

INSERT INTO `offer_masters` (`id`, `offername`, `offercat`, `offerprod`, `offerdesc`, `discount`, `freeshipping`, `offerstartdt`, `offerenddt`, `del_status`) VALUES
(1, 'Diwali Special', '8', '0', 'This is the diwali special offer.', 0.99, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Dasra Special', NULL, NULL, 'This is the dasra special offer.', 0.99, '0', '2015-10-30 00:00:00', '2015-11-01 00:00:00', 0),
(3, 'Daily', '1', '1', 'This is the daily offer description.', 0.99, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Daily', '1', '1', 'This is the daily offer description.', 0.99, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Daily', '1', '1', 'This is the daily offer description.', 0.99, '0', '2015-10-25 00:00:00', '2015-10-30 00:00:00', 0),
(6, 'Daily', '1', '1', 'This is the daily offer description.', 0.99, '0', '2015-10-25 00:00:00', '2015-10-26 00:00:00', 0);

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
  `add_cost` float DEFAULT NULL COMMENT 'Additional Cost',
  `less_cost` float DEFAULT NULL COMMENT 'Less Cost',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COMMENT='Show which attribute has what value for a product. ';

--
-- Dumping data for table `produc_attributes`
--

INSERT INTO `produc_attributes` (`id`, `prodid`, `attvid`, `add_cost`, `less_cost`, `del_status`) VALUES
(1, 1, 7, 50, 10, 1),
(2, 1, 6, 30, 20, 1),
(3, 2, 9, 80, 10, 1),
(29, 3, 8, 60, 20, 1),
(30, 3, 5, 30, 10, 0),
(31, 5, 10, 10, NULL, 1),
(32, 6, 21, 80, 50, 1),
(33, 6, 20, 80, 50, 1),
(34, 6, 19, 80, 50, 1),
(35, 6, 18, 80, 50, 1),
(36, 6, 17, 80, 50, 1),
(37, 6, 14, 80, 50, 1),
(48, 7, 18, 30, 10, 1),
(49, 7, 17, 30, 10, 1),
(50, 7, 16, 30, 10, 1),
(51, 7, 15, 30, 10, 1),
(52, 7, 14, 20, 10, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produc_images`
--

INSERT INTO `produc_images` (`id`, `prodid`, `imagepath`, `imgalt`, `isdefault`, `order`, `del_status`) VALUES
(1, 1, '15p5bh85q7d8g19a-united-colors-of-benetton-m-275x340-imae8xvyjqunn6hd.jpeg', NULL, 1, 0, 0),
(2, 2, '15p5ac91u008i38v-united-colors-of-benetton-m-275x340-imae94kseb3ymswa.jpeg', NULL, 0, 0, 0),
(3, 3, '15p5ac88u008i11n-united-colors-of-benetton-m-275x340-imae9fg7uuf43wu8.jpeg', 'shirt_alt', 1, 0, 0),
(4, 4, '33272ppgn-maxima-400x400-imae4px2u9j6xhda.jpeg', NULL, 0, 0, 0),
(5, 5, 'mf13-timex-400x400-imaefptnezey5ehy.jpeg', NULL, 0, 0, 0),
(6, 6, 'sr436514vlt-kennethcole-reaction-m-275x340-imaeygnbedf9hsfu.jpeg', NULL, 0, 0, 0),
(7, 7, '15p5068l8933i100-united-colors-of-benetton-m-275x340-imae8xvy3vae4bcke.jpeg', NULL, 0, 0, 0),
(8, 7, '15p5068l8933i100-united-colors-of-benetton-m-275x340-imae8xvy3ve4bcke.jpeg', NULL, 0, 0, 0),
(9, 7, 'bs-lee-marc-39-275x340-imae4zuyhqhcgbyu.jpeg', NULL, 0, 0, 0),
(10, 7, 'combo01-ghpc-44-275x340-imae6gzgjfgkseqy.jpeg', NULL, 0, 0, 0);

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
  `prodprice` float NOT NULL COMMENT 'Product Price with 2 decimals',
  `clearance` int(11) NOT NULL COMMENT '0-- Default No, 1-- Clearance item',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date time when added.',
  `url_alias` text NOT NULL COMMENT 'Complete URL after domain name',
  `prodmtitle` text COMMENT 'Meta Title',
  `prodmdesc` text COMMENT 'Meta Description',
  `prodmkeywords` text COMMENT 'Meta Keywords',
  `prodcanonical` text COMMENT 'if any - canonical URL can be entered here.',
  `del_status` int(11) NOT NULL COMMENT '0-active, 1-inactive, 2-deleted'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='Stores Basic Product Information';

--
-- Dumping data for table `produc_masters`
--

INSERT INTO `produc_masters` (`id`, `catid`, `prodname`, `prodscdes`, `proddesc`, `prodprice`, `clearance`, `date_added`, `url_alias`, `prodmtitle`, `prodmdesc`, `prodmkeywords`, `prodcanonical`, `del_status`) VALUES
(1, 8, 'United Arab', 'This is the short description clothing product.', 'This is the long description clothing product.', 99.99, 0, '2015-10-19 18:32:31', 'url_alias.com', 'Meta Title', 'Meta Description', 'Meta Keywords', 'Canonical url', 0),
(2, 8, 'Royal', 'This is the short description clothing product.', 'This is the long description clothing product.', 20.99, 0, '2015-10-19 18:34:15', 'url_alias', 'Meta Title', 'Meta Description', 'Meta Keywords', 'Canonical url', 0),
(3, 8, 'Shrit F20', 'T-Shrit F20 Short Description.', 'T-Shrit F20 Long Description.', 50.99, 0, '2015-10-19 18:35:24', 'url_alias', 'Meta Title', 'Meta Description', 'Meta Keywords', 'Canonical url', 0),
(4, 12, 'RF 670', 'This is the RF 670 short description', 'This is the RF 670 long description', 60, 1, '2015-10-30 16:54:19', 'RF 670', 'RF 670 meta title', 'RF 670 meta description', 'RF 670 meta keywords', 'RF 670 canonical url', 1),
(5, 12, 'mf13-timex', 'This is the mf13-timex short description', 'This is the mf13-timex long description', 80, 0, '2015-10-30 17:09:40', 'mf13-timex url alias', 'mf13-timex meta title', 'mf13-timex meta description', 'mf13-timex meta keywords', 'mf13-timex canonical url', 0),
(6, 18, 'Formal Shirts', 'Formal Shirts', 'Formal Shirts', 99.99, 0, '2015-10-31 11:43:54', 'Formal Shirts', 'Formal Shirts', 'Formal Shirts', 'Formal Shirts', 'Formal Shirts', 0),
(7, 18, 'G12', 'G12', 'G12', 99.99, 1, '2015-10-31 13:23:16', 'G12', 'G12', 'G12', 'G12', 'G12', 0);

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
  `freeshipping` float NOT NULL COMMENT 'Minimium Ordervalue for Free Shipping',
  `maintenance` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-Site Live, 1-Site Offline'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='General Global site Settings';

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_url`, `defaulttitle`, `defaultdesc`, `defaultkeywords`, `defaultcanonical`, `contactemail`, `orderemail`, `registeremail`, `freeshipping`, `maintenance`) VALUES
(1, 'Only Human', 'Online Shopping', 'Only Human ', 'Only Human', 'Only Human', 'Admin Panel', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(2, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(3, 'Only Human', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Admin Panel', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(4, 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(5, 'Admin Panel', 'Admin Panel', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0'),
(6, 'Shashikant', 'Shashikantaaaaaaaaa', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 'Shashikant@gmail.com', 99.99, '0');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE IF NOT EXISTS `slider_images` (
`id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `heading` varchar(100) NOT NULL,
  `short_desc` varchar(200) NOT NULL,
  `long_desc` varchar(500) NOT NULL,
  `del_status` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `cat_id`, `product_id`, `heading`, `short_desc`, `long_desc`, `del_status`, `image_path`) VALUES
(1, 10, 3, 'This is the image heading.', 'This is the image short description.', 'This is the image long description.', 0, '15p5ac08u008i901-united-colors-of-benetton-m-275x340-imae928ygjyyfage.jpeg'),
(4, NULL, 1, 'This is the second image heading.', 'This is the second image short description.', 'This is the second image long description.', 0, '15p5af35u008i901-united-colors-of-benetton-m-275x340-imae92b8hqggkm9e.jpeg'),
(5, NULL, 2, 'This is the third image heading.', 'This is the third image short description.', 'This is the third image long description.', 0, '15p5ac88u008i11n-united-colors-of-benetton-m-275x340-imae9fg7uuf43wu8.jpeg');

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
  `email` varchar(200) NOT NULL,
  `usrtype` int(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1 COMMENT='Basic User information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usrfname`, `usrlname`, `username`, `password`, `email`, `usrtype`, `last_login`, `del_status`) VALUES
(1, 'ss', 'sas', 'spchobhe_grt@gmail.com', 'spchobhe', '', 0, '0000-00-00 00:00:00', 1),
(2, 'asas', 'as', 'shital@gmail.com', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', '', 0, '0000-00-00 00:00:00', 1),
(3, 'Mayur Raj', 'sd', 'shashi123@gmail.com', '1aa22fdc02ef15f872229300388e9fa845b87f06', '', 0, '0000-00-00 00:00:00', 1),
(4, 'asas', 'sas', 'shashi1234@gmail.com', '4d592a396a47cfee93e0092d767c42908f1995b6', '', 0, '2015-10-08 15:54:22', 1),
(5, 'ss', 'sas', 'test123@gmail.com', '0d592da30998c8cb065c4bedc812ac6f3b90c0e9', '', 0, '2015-10-08 15:55:07', 1),
(6, 'ss', 'sas', 'shashi1234@gmail.coma', 'a155ccd6805bc2da9b89a098459bb5ecf2644621', '', 0, '2015-10-08 15:56:29', 1),
(7, 'ss', 'sas', 'spchobashe_grt@gmail.com', 'cce9a389e3350d91206d2b50c8405fd7cf0eea4b', '', 0, '2015-10-08 15:57:13', 1),
(8, 'ss', 'sas', 'shital@gmail.comas', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', '', 0, '2015-10-08 15:59:16', 1),
(9, 'ss', 'sas', 'shital@gmail.comasas', 'efb6ed2405d63ddfb78723327e9d988dfa49867a', '', 0, '2015-10-08 15:59:40', 1),
(10, 'ss', 'sas', 'shital@gmail.coaasm', '55cc15bd265769b8fe39f44316b0d150df98c70a', '', 0, '2015-10-08 16:00:09', 1),
(11, 'ss', 'sas', 'shital@gmaaail.com', '0dbdfaf1be5f0d77bbefa120e127507c4ce24309', '', 0, '2015-10-08 16:00:47', 1),
(12, 'Shashikant', 'Chobhe', 'spchobhe@live.com', '1336ecda88837f6e9a75dc364d2f989f372c0e27', '', 0, '2015-10-08 16:01:55', 1),
(13, 'mayurchobhe', 'mayurchobhe', 'mayurchobhe@gmail.com', '732a816bd73193fe1ebf9e6d5e1e8866b7020b93', '', 0, '2015-10-08 16:20:08', 1),
(14, 'mayurchobhea', 'mayurchobhea', 'mayurchobhea@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', '', 2, '2015-10-08 16:22:07', 1),
(15, 'Shashikant', 'sas', 'test123@gmail.coma', 'da59e489b69e8d5abb797697c9806436c96d63d4', '', 2, '2015-10-08 16:35:17', 1),
(16, 'nitin', 'nitin', 'nitin@gmail.com', '6e195049010374722b04a2088b7dd7d7e40bb87d', '', 2, '2015-10-08 16:50:42', 1),
(17, 'mahesh', 'mahesh', 'mahesh@gmail.com', 'maheshmahesh', '', 2, '2015-10-08 17:11:11', 1),
(18, 'mahesha', 'mahesha', 'f60ed2dab23589023fab26b746b2e834ec1dcdac', 'maheshamahesha', '', 2, '2015-10-08 17:12:10', 1),
(19, 'mahesha', 'mahesha', 'mahesha@gmail.com', 'f60ed2dab23589023fab26b746b2e834ec1dcdac', '', 2, '2015-10-08 17:14:42', 1),
(20, 'maheshaa', 'maheshaa', 'maheshaa@gmail.com', '168389627f1d3766df789e6d7da849e551f79755', '', 2, '2015-10-08 17:15:41', 1),
(21, 'shitalgophane', 'shitalgophane', 'shitalgophane@gmail.com', 'shitalgophane', '', 2, '2015-10-08 17:19:15', 1),
(22, 'shitalgophane', 'shitalgophane', 'shitalgophanea@gmail.com', '40a968e8809041e76fa07579b5e6a0da18e5b1df', '', 2, '2015-10-08 17:20:05', 1),
(23, 'shashikant', 'chobhe', 'shashikant.chobhe@sibzsolutions.com', '46ac2e696b52e2012a2699ce98cd831cbcdd6552', '', 2, '2015-10-09 06:22:15', 2),
(24, 'Shashikant', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', '', 0, '0000-00-00 00:00:00', 1),
(25, 'Shashikant', 'Chobhe', 'Shashiakantchobhe111@gmail.com', 'bd0159ece279737b705fa9084cfcee43036abe4d', '', 0, '0000-00-00 00:00:00', 2),
(26, 'Mayur', 'Chobhe', 'Shashiakantchobhe111@gmail.com', '152f58731d894aa5ee2fb6fe0dcdb69e1dcf490f', '', 2, '0000-00-00 00:00:00', 0),
(27, 'Amol', 'Pangare', 'aamol@gmail.com', '30379e4267ae5e1b16d0c88476e491b36326708c', '', 2, '2015-10-09 15:01:14', 1),
(28, 'shashi', 'chobhe', 'shashi@gmail.com', '2c30185480d659a990211fb1cb83d89a0e670dfe', '', 2, '2015-10-13 06:10:22', 0),
(29, 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa@gmail.com', 'abafcb7ac7a4b78d7695941e06264ead5cba3524', '', 0, '2015-10-17 08:58:35', 0),
(30, 'shashikant', 'chobhe', 'admin@gmail.com', '58acde71636768035905ac3cde780108e6c35ea1', '', 1, '2015-10-17 09:12:47', 0),
(31, 'shashikant', 'chobhe', 'superadmin@gmail.com', '58acde71636768035905ac3cde780108e6c35ea1', '', 2, '2015-10-17 09:13:26', 0),
(32, 'Superadmin', 'Superadmin', 'superadmin@gmail.com', '065fa7cda0dc953d8d3ff58740470919c6ecc38a', '', 2, '2015-10-20 06:41:36', 0),
(33, 'Shashikant', 'Chobhe', 'shashikant@gmail.com', 'a4501b80c0b10539b9a153f4fd664c0a718f5f00', '', 2, '2015-10-20 06:49:33', 0),
(34, 'Shashikant', 'Chobhe', 'shaaashikant@gmail.com', '346187aad996fa06c1c0d4c64f33261b452af545', '', 2, '2015-10-20 06:50:20', 0),
(35, 'Superadmin', 'Superadmin', 'superadmin', 'd73ca38282af898251a93e59878caa38629d4b1b', 'shashi@gmail.com', 2, '2015-10-20 06:53:21', 0),
(36, 'Amol', 'Pangare', 'amol', '30379e4267ae5e1b16d0c88476e491b36326708c', 'amol@gmail.com', 2, '2015-10-20 07:01:41', 0),
(37, 'Shashikanttest', 'Shashikanttest', 'Shashikant_test@gmail.com', '2d9c55bfd27a5c89a7715351335729919c092d2e', '', 1, '2015-10-20 07:21:40', 0),
(38, 'mayurchobhe', 'mayurchobhe', 'mayurchobhe', '732a816bd73193fe1ebf9e6d5e1e8866b7020b93', 'mayurchobhe#@gmail.com', 0, '2015-10-20 07:24:51', 0),
(39, 'Shashikant', 'Chobhe', 'admin1@gmail.com', '218b1af389f44e3ffe51b3b4cd4d011552871457', '', 1, '2015-10-26 05:14:47', 0),
(40, 'Shashikant', 'Chobhe', 'superadmin1', '8f56375f0829db10ed4f012c30d895500cd26d3b', 'superadmin1@gmail.com', 2, '2015-10-26 05:16:15', 0),
(41, '', '', 'shashikant', '1aa22fdc02ef15f872229300388e9fa845b87f06', 'shashikant.chobhe@sibzsolutions.com', 0, '2015-10-26 10:43:58', 0),
(42, 'shashikant', 'chobhe', 'mayur', '732a816bd73193fe1ebf9e6d5e1e8866b7020b93', 'mayurchobhe@gmail.com', 0, '2015-10-26 10:46:50', 0),
(43, 'shashikant', 'chobhe', 'shashi123', '1aa22fdc02ef15f872229300388e9fa845b87f06', 'shashi1234@gmail.com', 2, '2015-10-27 08:38:15', 0),
(44, 'Shashikant', 'Chobhe', 'shashikant11', '360401868af9f3bf3f076c1498b56da6fbda1ba5', 'shashikant11@gmail.com', 2, '2015-10-28 06:37:20', 0),
(45, 'Shashikant', 'Chobhe', 'shashikantchobhe11', 'e856f600f5c5ae565bb85dcee841571042046af0', 'shashikantchobhe111@gmail.com', 2, '2015-10-28 07:01:07', 0),
(46, 'shashikantchobheqqp', 'shashikantchobheqqp', 'shashikantchobheqqp', '86481632cdd6a4894541b057f9634d83e1278438', 'shashikantchobheqqp@gmail.com', 2, '2015-10-28 07:08:49', 0),
(47, 'shashikant', 'chobhe', 'mayur009', '9fc1782374018edc2bca4dd15c80e475a3355960', 'mayur009@gmail.com', 2, '2015-10-29 05:50:46', 0),
(48, 'mayur', 'mayur', 'mayur45@gmail.com', '0be922c8b8ab83b46e7caec7ef6edc157b9e2c7b', '', 1, '2015-10-30 12:35:13', 0),
(49, 'Shashikant', 'Chobhe', 'superadmin11', '065fa7cda0dc953d8d3ff58740470919c6ecc38a', 'superadmin@gmail.com', 2, '2015-11-04 14:01:42', 0);

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
-- Indexes for table `cart_masters`
--
ALTER TABLE `cart_masters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
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
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `attribute_masters`
--
ALTER TABLE `attribute_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cart_masters`
--
ALTER TABLE `cart_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=7;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `produc_images`
--
ALTER TABLE `produc_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `produc_masters`
--
ALTER TABLE `produc_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=50;
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
