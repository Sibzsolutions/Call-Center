-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 09:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `only_human_new`
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Show which attribute belongs to which category';

--
-- Dumping data for table `attribute_categories`
--

INSERT INTO `attribute_categories` (`id`, `attid`, `catid`, `is_main`, `del_status`) VALUES
(1, 1, 36, 1, 0),
(2, 2, 36, 1, 0),
(3, 3, 36, 1, 0),
(4, 4, 8, 1, 0),
(5, 5, 8, 1, 0),
(6, 6, 8, 1, 0),
(7, 7, 8, 1, 0),
(8, 8, 8, 1, 1),
(9, 7, 42, 0, 0),
(10, 7, 43, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_masters`
--

CREATE TABLE IF NOT EXISTS `attribute_masters` (
`id` int(11) NOT NULL COMMENT 'Auto incremented key',
  `attname` varchar(250) NOT NULL COMMENT 'Attribute Name',
  `attdesc` text COMMENT 'Attribute Description',
  `del_status` int(11) NOT NULL COMMENT '0-Active, 1-Inactive, 2-Deleted'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_masters`
--

INSERT INTO `attribute_masters` (`id`, `attname`, `attdesc`, `del_status`) VALUES
(1, 'Brand', 'This is the Brand attribute description.', 0),
(2, 'Size', 'This is the size attribute description.', 0),
(3, 'Color', 'This is the color description.', 0),
(4, 'Oprating Systems', 'This is the Oprating Systems attribute description.', 0),
(5, 'RAM', 'This is the RAM attribute description', 0),
(6, 'Internet Features', 'This is the Internet Features attribute description', 0),
(7, 'Screen Size', 'This is the Screen Size attribute', 0),
(8, 'Sim Type', 'This is the Sim Type description', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COMMENT='will store att. values Color-Red,green,etc.';

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attid`, `attvalue`, `att_value_img`, `del_status`) VALUES
(1, 1, 'Nike', 'download.jpg', 0),
(2, 1, 'Adidas', 'download (2).jpg', 0),
(3, 1, 'Lee', 'download.png', 0),
(4, 1, 'Peter England', 'download (4).jpg', 0),
(5, 1, 'Levi''s', 'download (3).jpg', 0),
(6, 1, 'Allen Solly', 'download (1).jpg', 0),
(7, 1, 'Pepe Jeans', 'download (1).png', 0),
(8, 2, 'XL', 'download.jpg', 0),
(9, 2, 'M', 'download.jpg', 0),
(10, 2, 'L', 'download.jpg', 0),
(11, 2, 'S', 'download.jpg', 0),
(12, 2, 'XS', 'download.jpg', 0),
(13, 3, 'Black', 'download (2).png', 0),
(14, 3, 'White', 'download.png', 0),
(15, 3, 'yellow', 'download (1).png', 0),
(16, 3, 'Red', 'download (3).png', 0),
(17, 3, 'Blue', 'download (4).png', 0),
(18, 3, 'Green', 'download (5).png', 0),
(19, 3, 'Violet', 'download (6).png', 0),
(20, 3, 'Coffee', 'download (8).png', 0),
(21, 3, 'Grey', 'download (7).png', 0),
(22, 3, 'Pink', 'download.jpg', 0),
(23, 4, 'Android', '20150817-102316-canvas-2.jpg', 0),
(24, 4, 'Windows 8', '20150809-230114-moto-g3rd.jpg', 0),
(25, 5, '1 GB', 'download (7).png', 0),
(26, 5, '2 GB', 'download (7).png', 0),
(27, 5, '3 GB', 'download (7).png', 0),
(28, 5, '4 GB', 'download (7).png', 0),
(29, 6, '4G', 'download.jpg', 0),
(30, 6, '3G', 'download.jpg', 0),
(31, 6, '2G', 'download.jpg', 0),
(32, 7, '5 Inch & More', 'download (1).png', 0),
(33, 7, '4-5 Inch', 'download (1).png', 0),
(34, 7, '3-4 Inch', 'download (1).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_masters`
--

CREATE TABLE IF NOT EXISTS `cart_masters` (
`id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_masters`
--

INSERT INTO `cart_masters` (`id`, `user_id`, `product_id`, `del_status`) VALUES
(1, 13, 1, 1),
(2, 13, 6, 1),
(3, 13, 7, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 COMMENT='Category Master table storing all category related info.';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `catdesc`, `catimg`, `parentid`, `url_alias`, `catmtitle`, `catmdesc`, `catmkeywords`, `catcanonical`, `del_status`) VALUES
(1, 'Electronics', 'This is the Electronics category description.', '20150604-181150-20.3cm.png', 0, 'This is the url aliase of Electronics', 'Electronics Meta Title', 'Electronics Meta Description', 'Electronics Meta Keywords', 'Electronics canonical url', 0),
(2, 'Men', 'This is the Men category description.', '15p5ac08u008i901-united-colors-of-benetton-m-275x340-imae928ygjyyfage.jpeg', 0, 'This is the url aliase of Men', 'Men Meta Title', 'Men Meta Description', 'Men Meta Keywords', 'Men canonical url', 0),
(3, 'Women', 'This is the Women category description.', '20151012-202454-shree.jpg', 0, 'This is the url aliase of Women', 'Women Meta Title', 'Women Meta Description', 'Women Meta Keywords', 'Women Meta Keywords', 0),
(4, 'Baby & Kids', 'This is the Baby & Kids category description.', 'indigo-pr03-perky-275x340-imae5hcwpfescsh5.jpeg', 0, 'This is the url aliase of ElectronicsBaby & Kids', 'Electronics Meta TitleBaby & Kids', 'Baby & Kids Meta Description', 'Baby & Kids Meta Keywords', 'Baby & Kids canonical url', 0),
(5, 'Home & Furniture', 'This is the Home & Furniture category description.', 'sc001-zesture-200x200-imae88p8emmwznun.jpeg', 0, 'This is the url aliase of Home & Furniture', 'Electronics Meta TitleHome & Furniture', 'Home & Furniture Meta Description', 'Home & Furniture Meta Keywords', 'Home & Furniture canonical url', 0),
(6, 'Books & Media', 'This is the Books & Media category description.', 'surely-you-re-joking-mr-feynmann-200x200-imadgzfxdzgmc2cu.jpeg', 0, 'This is the url aliase of ElectronicsBooks & Media', 'Electronics Meta TitleBooks & Media', 'Books & Media Meta Description', 'Books & Media Meta Keywords', 'Books & Media canonical url', 0),
(7, 'Auto & Sports', 'This is the Auto & Sports category description.', 'we-universal-360-rotating-car-windshield-mount-holder-stand-200x200-imae5gr6ppgzvywm.jpeg', 0, 'This is the url aliase of Auto & Sports', 'Electronics Meta TitleAuto & Sports', 'Auto & Sports Meta Description', 'Auto & Sports Meta Keywords', 'Auto & Sports canonical url', 0),
(8, 'Mobile', 'This is the Mobile category description.', '20150809-230311-asus-zenfone-2.jpg', 1, 'This is the url aliase of Mobile', 'Mobile Meta Title', 'Mobile Meta Description', 'Mobile Meta Keywords', 'Mobile canonical url', 0),
(9, 'Laptops', 'This is the Laptops category description.', '20140923-163203-20131209-173029-vn-laptops-gaming-laptops-2.jpg', 1, 'This is the url aliase of Laptops', 'Laptops Meta Title', 'Laptops Meta Laptops ', 'Laptops Meta Keywords', 'Laptops canonical url', 0),
(10, 'Tablets', 'This is the Tablets category description.', '20151009-115010-5-kurio-tablet.jpg', 1, 'This is the url aliase of Tablets', 'Tablets Meta Title', 'Tablets Meta Description', 'Tablets Meta Keywords', 'Tablets Meta Keywords', 0),
(11, 'Headphones', 'This is the Headphones category description.', '20141223-180324-5-2.jpg', 1, 'This is the url aliase of Headphones', 'Headphones Meta Title', 'Headphones Meta Description', 'Headphones Meta Keywords', 'Headphones canonical url', 0),
(12, 'All Clothing', 'This is the All Clothing category description.', '15p5ac88u008i11n-united-colors-of-benetton-m-275x340-imae9fg7uuf43wu8.jpeg', 2, 'This is the url aliase of All Clothing ', 'All Clothing Meta Title', 'All Clothing Meta Description', 'All Clothing Meta Keywords', 'All Clothing canonical url', 0),
(13, 'Footwear', 'This is the Footwear category description.', 'beige-speedster-globalite-10-200x200-imadsza9hfmeejed.jpeg', 2, 'This is the url aliase of Footwear', 'Footwear Meta Title', 'Footwear Meta Description', 'Footwear Meta Keywords', 'Footwear canonical url', 0),
(14, 'Fregnance', 'This is the Fregnance category description.', 'body-spray-axe-150-gold-temptation-200x200-imae3h2bzgpugnzq.jpeg', 2, 'This is the url aliase of Fregnance', 'Fregnance Meta Title', 'Fregnance Meta Description', 'Fregnance Meta Keywords', 'Fregnance canonical url', 0),
(15, 'Sunglasses', 'This is the Sunglasses category description.', 'w123-g-mtl-grey-blk-floyd-m-200x200-imae63svgwqbzezg.jpeg', 2, 'This is the url aliase of Sunglasses ', 'Sunglasses Meta Title', 'Sunglasses Meta Description', 'Sunglasses Meta Keywords', 'Sunglasses canonical url', 0),
(16, 'Watches', 'This is the Watches category description.', '9463al07-fastrack-200x200-imaduh9dfnp4vtqy.jpeg', 2, 'This is the url aliase of Watches', 'Watches Meta Title', 'Watches Meta Description', 'Watches Meta Keywords', 'Watches canonical url', 0),
(17, 'All Clothing', 'This is the All Clothing category description.', '20151012-202121-ishin-img.jpg', 3, 'This is the url aliase of All Clothing', 'All Clothing Meta Title', 'All Clothing Meta Description', 'All Clothing Meta Keywords', 'All Clothing canonical url', 0),
(18, 'Footwear', 'This is the Footwear category description.', 'coffee-ws-010-nell-40-200x200-imadykjwxkytkhzy.jpeg', 3, 'This is the url aliase of Footwear', 'Footwear Meta Title', 'Footwearg Meta Description', 'Footwear Meta Keywords', 'Footwear canonical url', 0),
(19, 'Perfumes', 'This is the Perfumes category description.', 'eau-de-fabric-cfs-100-high-life-200x200-imadydtf6hatg7xh.jpeg', 3, 'This is the url aliase of Perfumes', 'Perfumes Meta Title', 'Perfumes Meta Description', 'Perfumes Meta Keywords', 'Perfumes canonical url', 0),
(20, 'Watches', 'This is the Watches category description.', '6015sl02-fastrack-200x200-imadt4x4uh8pgykj.jpeg', 3, 'This is the url aliase of Watches', 'Watches Meta Title', 'Watches Meta Description', 'Watches Meta Keywords', 'Watches canonical url', 0),
(21, 'Kids Clothing', 'This is the Kids Clothing category description.', 'black-pr02-perky-275x340-imae5hcwhaugwbmy.jpeg', 4, 'This is the url aliase of Kids Clothing', 'Kids Clothing Meta Title', 'Kids Clothing Meta Description', 'Kids Clothing Meta Keywords', 'Kids Clothing canonical url', 0),
(22, 'Kids Footwear', 'This is the Kids Footwear category description.', 'green-aspire-liberty-31-200x200-imaeyzaadsv8ptkt.jpeg', 4, 'This is the url aliase of Kids Footwear', 'Kids Footwear Meta Title', 'Kids Footwear Meta Description', 'Kids Footwear Meta Keywords', 'Kids Footwear canonical url', 0),
(23, 'Kids Watches', 'This is the Kids Watches category description.', 'rbt001-rbt-200x200-imae75ktfcd4thjg.jpeg', 4, 'This is the url aliase of Kids Watches', 'Kids Watches Meta Title', 'Kids Watches Meta Keywords', 'Kids Watches Meta Keywords', 'Kids Watches canonical url', 0),
(24, 'Toys', 'This is the Toys category description.', 'barbie-design-style-200x200-imadsgshhxpvykbn.jpeg', 4, 'This is the url aliase of Toys', 'Toys Meta Title', 'Toys Meta Description', 'Toys Meta Keywords', 'Toys canonical url', 0),
(25, 'Bath', 'This is the Bath category description.', 'mt070140tu0809-bombay-dyeing-200x200-imadyb2qjv3pnxcv.jpeg', 5, 'This is the url aliase of Bath ', 'Bath Meta Title', 'Bath Meta Description', 'Bath Meta Keywords', 'Bath canonical url', 0),
(26, 'Bed & Living', 'This is the Bed & Living category description.', 'sc002-zesture-200x200-imae88p8ytmhtgv3.jpeg', 5, 'This is the url aliase of WatchesBed & Living', 'Bed & Living Meta Title', 'Bed & Living Meta Description', 'Bed & Living Meta Keywords', 'Bed & Living canonical url', 0),
(27, 'Home Decor', 'This is the Home Decor category description.', 'painting-without-frame-pc-01-0101-canvas-medium-200x200-imadxgjvfesr7n8e.jpeg', 5, 'This is the url aliase of Home Decor', 'Home Decor Meta Title', 'Home Decor Meta Description', 'Home Decor Meta Keywords', 'Home Decor canonical url', 0),
(28, 'Kitchen & Dining', 'This is the Kitchen & Dining category description.', 'skinductioncookware003-milton-nova-200x200-imae4ub3rpnkdz2q.jpeg', 5, 'This is the url aliase of Kitchen & Dining', 'Kitchen & Dining Meta Title', 'Kitchen & Dining Meta Keywords', 'Kitchen & Dining Meta Keywords', 'Kitchen & Dining canonical url', 0),
(29, 'Books', 'This is the Books category description.', 'wings-of-fire-an-autobiography-200x200-imae8hfb7uxe8yxg.jpeg', 6, 'This is the url aliase of Books', 'Books Meta Title', 'Books Meta Description', 'Books Meta Keywords', 'Books canonical url', 0),
(30, 'E-book', 'This is the E-book category description.', 'DIGI1351392516-5ca2d52e-6e5f-452f-b9e9-9184347f603b.jpg', 6, 'This is the url aliase of E-book ', 'E-book Meta Title', 'E-book Meta Description', 'E-book Meta Keywords', 'E-book canonical url', 0),
(31, 'E-Learning', 'This is the E-Learning category description.', '20140626-184824-online-test.jpg', 6, 'This is the url aliase of E-Learning', 'E-Learning Meta Title', 'E-Learning Meta Description', 'E-Learning Meta Keywords', 'E-Learning canonical url', 0),
(32, 'Music', 'This is the Musiccategory description.Music', 'aashiqui-2-other-hits-125x125-imadk99mgthan2pb.jpeg', 6, 'This is the url aliase of Music', 'Music Meta Title', 'MusicMeta Description', 'Music Meta Keywords', 'Music canonical url', 0),
(33, 'Car', 'This is the Car category description.', 'fly-holder-horizontal-200x200-imaefahhpdbqfbug.jpeg', 7, 'This is the url aliase of Car ', 'Car Meta Title', 'Car Meta Description', 'Car Meta Keywords', 'Car canonical url', 0),
(34, 'Lubricant & Oils', 'This is the Lubricant & Oils category description.', 'chain-3-almos-300-200x200-imae4bdthxgmerg7.jpeg', 7, 'This is the url aliase of Lubricant & Oils', 'Lubricant & Oils Meta Title', 'Lubricant & Oils Meta Description', 'Footwear Meta Keywords', 'Lubricant & Oils canonical url', 0),
(35, 'Tyres', 'This is the Tyres category description.', 'jk-tyre-vectra-tl-155-70r14-200x200-imae9rshge5uuhzd.jpeg', 7, 'This is the url aliase of Tyres', 'Tyres Meta Title', 'Tyres Meta Description', 'Tyres Meta Keywords', 'Tyres canonical url', 0),
(36, 'TShirts', 'This is the T-Shirts category description.', '745186021white-puma-m-275x340-imaduhgyzcsruduh.jpeg', 12, 'This is the url aliase of T-Shirts', 'T-Shirts Meta Title', 'T-Shirts Meta Description', 'T-Shirts Meta Keywords', 'T-Shirts canonical url', 0),
(37, 'Formal', 'This is the Formal category description.', 'asoy5084lt-red-arrow-new-york-44-275x340-imae8xy2sbvaffrh.jpeg', 12, 'This is the url aliase of Formal', 'Formal Meta Title', 'Formal Meta Description', 'Formal Meta Keywords', 'Formal canonical url', 0),
(38, 'Mens Jeans', 'This is the Mens Jeans category description.', 'wrjn1721mindigo-wrangler-32-275x340-imae9qufeqemkgn6.jpeg', 12, 'This is the url aliase of Mens Jeans', 'Mens Jeans Meta Title', 'Mens Jeans Meta Description', 'Mens Jeans Meta Keywords', 'Mens Jeans canonical url', 0),
(39, 'Sport Wear', 'This is the Sport Wear category description.', '83521501-black-puma-m-275x340-imae873yxwwch2xn.jpeg', 12, 'This is the url aliase of Sport Wear ', 'Sport Wear Meta Title', 'Sport Wear Meta Description', 'Sport Wear Meta Keywords', 'Sport Wear canonical url', 0),
(40, 'Trousers', 'This is the Trousers category description.', '100051546green-hugo-boss-33-275x340-imaefhz3dd7rwzyz.jpeg', 12, 'This is the url aliase of Trousers', 'Trousers Meta Title', 'Trousers Meta Keywords', 'Trousers Meta Keywords', 'Trousers canonical url', 0),
(41, 'Casual', 'This is the Casual category description.', 'combo01-ghpc-44-275x340-imae6gzgjfgkseqy.jpeg', 12, 'This is the url aliase of Casual', 'Casual Meta Title', 'Casual Meta Description', 'Casual Meta Keywords', 'Casual canonical url', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `home_page_boxes`
--

CREATE TABLE IF NOT EXISTS `home_page_boxes` (
`id` int(11) NOT NULL,
  `first_shortdesc` varchar(200) NOT NULL,
  `first_longdesc` varchar(500) NOT NULL,
  `first_imagepath` varchar(200) NOT NULL,
  `second_shortdesc` varchar(200) NOT NULL,
  `second_longdesc` varchar(500) NOT NULL,
  `second_imagepath` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page_boxes`
--

INSERT INTO `home_page_boxes` (`id`, `first_shortdesc`, `first_longdesc`, `first_imagepath`, `second_shortdesc`, `second_longdesc`, `second_imagepath`) VALUES
(7, 'ELEGANT ', 'And Modern Style', '56403686aaa51img1.jpg', 'Support', 'Top Customer Accounts and login', '56403686bfe2eimg2.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1 COMMENT='Show which attribute has what value for a product. ';

--
-- Dumping data for table `produc_attributes`
--

INSERT INTO `produc_attributes` (`id`, `prodid`, `attvid`, `add_cost`, `less_cost`, `del_status`) VALUES
(1, 1, 7, 40, 10, 1),
(2, 1, 12, 50, 10, 1),
(3, 1, 10, 40, 10, 1),
(4, 1, 9, 30, 10, 1),
(5, 1, 8, 60, 10, 1),
(6, 1, 14, 30, 10, 1),
(7, 2, 7, 40, 10, 1),
(8, 2, 12, NULL, NULL, 1),
(9, 2, 10, NULL, NULL, 1),
(10, 2, 9, NULL, NULL, 1),
(11, 2, 8, NULL, NULL, 1),
(12, 2, 21, 30, 10, 1),
(13, 2, 17, 30, 10, 1),
(14, 2, 16, 30, 10, 1),
(15, 2, 13, 30, 10, 1),
(31, 5, 1, 100, 50, 1),
(32, 5, 12, 20, 10, 1),
(33, 5, 11, 20, 10, 1),
(34, 5, 10, 20, 10, 1),
(35, 5, 9, 20, 10, 1),
(36, 5, 8, 20, 10, 1),
(37, 5, 20, 20, 10, 1),
(38, 5, 16, 20, 10, 1),
(39, 5, 14, 20, 10, 1),
(40, 4, 2, 30, 10, 1),
(41, 4, 12, 20, 10, 1),
(42, 4, 11, 20, 10, 1),
(43, 4, 10, 20, 10, 1),
(44, 4, 9, 20, 10, 1),
(45, 4, 8, 20, 10, 1),
(46, 4, 22, 20, 10, 1),
(47, 4, 21, 20, 10, 1),
(48, 4, 20, 20, 10, 1),
(49, 4, 19, 20, 10, 1),
(50, 4, 18, 20, 10, 1),
(51, 4, 17, 20, 10, 1),
(52, 4, 16, 20, 10, 1),
(53, 4, 15, 20, 10, 1),
(54, 4, 14, 20, 10, 1),
(55, 4, 13, 20, 10, 1),
(56, 3, 2, 20, 10, 1),
(57, 3, 12, 20, NULL, 1),
(58, 3, 11, 20, 10, 1),
(59, 3, 8, 20, 10, 1),
(60, 3, 13, 20, 10, 1),
(61, 6, 5, 20, 10, 1),
(62, 6, 11, 20, 10, 1),
(63, 6, 10, 20, 10, 1),
(64, 6, 9, 20, 10, 1),
(65, 6, 16, NULL, NULL, 1),
(66, 7, 6, 20, 20, 1),
(67, 7, 12, NULL, NULL, 1),
(68, 7, 11, NULL, NULL, 1),
(69, 7, 10, NULL, NULL, 1),
(70, 7, 9, NULL, NULL, 1),
(71, 7, 8, NULL, NULL, 1),
(72, 7, 21, 20, 10, 1),
(73, 7, 20, 20, 10, 1),
(74, 8, 4, 100, 20, 1),
(75, 8, 12, NULL, NULL, 1),
(76, 8, 10, 20, 10, 1),
(77, 8, 9, 20, 10, 1),
(78, 8, 8, 20, 10, 1),
(79, 8, 13, 50, 10, 1),
(80, 9, 3, 20, 10, 1),
(81, 9, 11, 20, 10, 1),
(82, 9, 10, 20, 10, 1),
(83, 9, 9, 201, 10, 1),
(84, 9, 14, 30, 10, 1),
(85, 9, 13, 30, 10, 1),
(86, 10, 3, 20, 10, 1),
(87, 10, 12, NULL, NULL, 1),
(88, 10, 11, NULL, NULL, 1),
(89, 10, 10, NULL, NULL, 1),
(90, 10, 9, NULL, NULL, 1),
(91, 10, 8, NULL, NULL, 1),
(92, 10, 22, 20, 10, 1),
(93, 10, 21, 20, 10, 1),
(94, 10, 20, 20, 10, 1),
(95, 10, 19, 20, 10, 1),
(96, 10, 18, 20, 10, 1),
(97, 10, 17, 20, 10, 1),
(98, 10, 16, 20, 10, 1),
(99, 10, 15, 20, 10, 1),
(100, 10, 14, 20, 10, 1),
(101, 10, 13, 20, 10, 1),
(102, 11, 6, NULL, NULL, 1),
(103, 11, 10, 20, 10, 1),
(104, 11, 8, 20, 10, 1),
(105, 11, 19, NULL, NULL, 1),
(106, 11, 17, 20, 10, 1),
(107, 12, 7, 30, 10, 1),
(108, 12, 12, NULL, NULL, 1),
(109, 12, 11, NULL, NULL, 1),
(110, 12, 10, NULL, NULL, 1),
(111, 12, 9, NULL, NULL, 1),
(112, 12, 8, NULL, NULL, 1),
(113, 12, 21, 40, 20, 1),
(114, 12, 14, 40, 10, 1),
(115, 13, 1, 20, 10, 1),
(116, 13, 12, 20, 10, 1),
(117, 13, 11, 20, 10, 1),
(118, 13, 10, 20, 10, 1),
(119, 13, 9, 20, 10, 1),
(120, 13, 8, 20, 10, 1),
(121, 13, 21, 20, 10, 1),
(122, 13, 14, 20, 10, 1),
(123, 13, 13, 20, 10, 1),
(124, 14, 2, 20, 10, 1),
(125, 14, 10, 20, 10, 1),
(126, 14, 9, 20, 10, 1),
(127, 14, 17, 20, 10, 1),
(128, 14, 16, 20, 10, 1),
(129, 15, 23, 20, 10, 1),
(130, 15, 26, 20, 10, 1),
(131, 15, 29, NULL, NULL, 1),
(132, 15, 34, 20, 10, 1),
(133, 16, 23, 20, 10, 1),
(134, 16, 27, 30, 10, 1),
(135, 16, 33, 20, 10, 1),
(136, 17, 23, 20, 10, 1),
(137, 17, 27, 20, 10, 1),
(138, 17, 30, NULL, NULL, 1),
(139, 17, 32, NULL, NULL, 1),
(140, 18, 24, 20, 10, 1),
(141, 18, 28, 20, 10, 1),
(142, 18, 30, 20, 10, 1),
(143, 18, 32, 20, 10, 1),
(148, 19, 23, 20, 10, 1),
(149, 19, 28, 20, 10, 1),
(150, 19, 30, 20, 10, 1),
(151, 19, 32, 20, 10, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produc_images`
--

INSERT INTO `produc_images` (`id`, `prodid`, `imagepath`, `imgalt`, `isdefault`, `order`, `del_status`) VALUES
(1, 1, '745186021white-puma-m-275x340-imaduhgyzcsruduh.jpeg', NULL, 0, 0, 0),
(2, 2, 'tsx-polo-39ad-tsx-s-275x340-imadzbgvkmmbhbwy.jpeg', NULL, 0, 0, 0),
(6, 3, 'z92132-reebok-m-400x400-imaefxxhtngy4vgr.jpeg', NULL, 0, 0, 0),
(8, 3, 'z92132-reebok-m-400x400-imaefxxgz9wpeypn.jpeg', NULL, 0, 0, 0),
(9, 3, 'z92132-reebok-m-400x400-imaefxxghavejrxy.jpeg', NULL, 0, 0, 0),
(10, 4, 'acm-h-jsy-black-vicred-granit-adidas-m-400x400-imaeazz9zgh8dae8.jpeg', NULL, 0, 0, 0),
(11, 4, 'acm-h-jsy-black-vicred-granit-adidas-m-400x400-imaeazz9uewuvnbu.jpeg', NULL, 0, 0, 0),
(13, 5, '745186021white-puma-m-400x400-imaduhgy8jczfnk4.jpeg', NULL, 0, 0, 0),
(14, 5, '745186021white-puma-m-400x400-imaduhgybpqbwxnz.jpeg', NULL, 0, 0, 0),
(16, 5, '745186021white-puma-m-400x400-imaduhgymap9zfrc.jpeg', NULL, 0, 0, 0),
(17, 5, '745186021white-puma-m-400x400-imaduhgyvvujamsw.jpeg', NULL, 0, 0, 0),
(18, 5, '745186021white-puma-m-400x400-imaduhgyzcsruduh.jpeg', NULL, 0, 0, 0),
(19, 6, 'rchn-w-b-top-notch-s-275x340-imadxyfw3fm5qz3h.jpeg', NULL, 0, 0, 0),
(20, 7, 'camouflagecultforcecrew001-difference-of-opinion-xxl-400x400-imae4fqhkfqqccxx.jpeg', NULL, 0, 0, 0),
(21, 7, 'cultforceandpocketpolo014-difference-of-opinion-l-400x400-imae4fqhvfhgbane.jpeg', NULL, 0, 0, 0),
(22, 7, 'cultforceandpocketpolo014-difference-of-opinion-m-400x400-imae4fqhg69kerp3.jpeg', NULL, 0, 0, 0),
(24, 8, '11377500701-zovi-l-400x400-imae3dyxbtkgetwn.jpeg', NULL, 0, 0, 0),
(25, 8, '11377500701-zovi-l-400x400-imae3dyxqv4xxfny.jpeg', NULL, 0, 0, 0),
(26, 8, '11377500701-zovi-l-400x400-imae3dyxrmhzgcmg.jpeg', NULL, 0, 0, 0),
(27, 8, '11377500701-zovi-l-400x400-imae3dyyfeuptysh.jpeg', NULL, 0, 0, 0),
(28, 9, '2724black1-jockey-m-400x400-imaeark9keqzzuqr.jpeg', NULL, 0, 0, 0),
(30, 9, '2724black1-jockey-m-400x400-imaecffgxszftejg.jpeg', NULL, 0, 0, 0),
(31, 10, 'lets7533white-lee-m-400x400-imae6ckzwyrceeb3.jpeg', NULL, 0, 0, 0),
(32, 10, 'lets7533white-lee-m-400x400-imae6ckzcgvgnfmb.jpeg', NULL, 0, 0, 0),
(33, 10, 'lets7533white-lee-m-400x400-imae6ckzpnqetbhs.jpeg', NULL, 0, 0, 0),
(34, 10, 'lets7533white-lee-m-400x400-imae6ckzjs6th85a.jpeg', NULL, 0, 0, 0),
(35, 11, 'gsfscwl60210pur-gritstones-xl-400x400-imaeyrsu7yzb7atz.jpeg', NULL, 0, 0, 0),
(37, 11, 'gsfscwl60210pur-gritstones-xl-400x400-imaeyrsuxkqrwyhm.jpeg', NULL, 0, 0, 0),
(39, 12, 'hadwin-ssindigo-pepe-m-400x400-imads2fkbrvpcfps.jpeg', NULL, 0, 0, 0),
(41, 12, 'hadwin-ssindigo-pepe-m-400x400-imads2fkycchs93z.jpeg', NULL, 0, 0, 0),
(42, 13, 'gsrglhenygryblk-gritstones-xl-400x400-imadpxsvauywkpnz.jpeg', NULL, 0, 0, 0),
(44, 13, 'gsrglhenygryblk-gritstones-xl-400x400-imadpxswxy4vtcqz.jpeg', NULL, 0, 0, 0),
(45, 14, 'b81812-reebok-m-400x400-imaefxxg9rmbwdu8.jpeg', NULL, 0, 0, 0),
(46, 14, 'b81812-reebok-m-400x400-imaefxxgfgqxvgw2.jpeg', NULL, 0, 0, 0),
(48, 15, '20150809-230031-samsung-galaxy-j5.jpg', NULL, 0, 0, 0),
(49, 16, '20150817-102316-canvas-2.jpg', NULL, 0, 0, 0),
(50, 17, '20150809-230409-moto-x-2nd.jpg', NULL, 0, 0, 0),
(51, 18, '20151018-222800-20150801-10434-vmu-portrait-4.jpg', NULL, 0, 0, 0),
(52, 19, '20150809-230311-asus-zenfone-2.jpg', NULL, 0, 0, 0);

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
  `isfeatured` int(100) NOT NULL,
  `clearance` int(11) NOT NULL COMMENT '0-- Default No, 1-- Clearance item',
  `date_added` datetime NOT NULL COMMENT 'Date time when added.',
  `url_alias` text NOT NULL COMMENT 'Complete URL after domain name',
  `prodmtitle` text COMMENT 'Meta Title',
  `prodmdesc` text COMMENT 'Meta Description',
  `prodmkeywords` text COMMENT 'Meta Keywords',
  `prodcanonical` text COMMENT 'if any - canonical URL can be entered here.',
  `del_status` int(11) NOT NULL COMMENT '0-active, 1-inactive, 2-deleted'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='Stores Basic Product Information';

--
-- Dumping data for table `produc_masters`
--

INSERT INTO `produc_masters` (`id`, `catid`, `prodname`, `prodscdes`, `proddesc`, `prodprice`, `isfeatured`, `clearance`, `date_added`, `url_alias`, `prodmtitle`, `prodmdesc`, `prodmkeywords`, `prodcanonical`, `del_status`) VALUES
(1, 36, 'Top Notch Solid Men''s Henley T-Shirt', 'This is the Top Notch Solid Men''s Henley T-Shirt product short description.', 'This is the Top Notch Solid Men''s Henley T-Shirt product long description.', 399, 0, 0, '2015-11-06 12:33:50', 'This is the Top Notch Solid Men''s Henley T-Shirt product url aliase.', 'This is the Top Notch Solid Men''s Henley T-Shirt product Meta Title.', 'This is the Top Notch Solid Men''s Henley T-Shirt product Description.', 'This is the Top Notch Solid Men''s Henley T-Shirt product Meta keywords.', 'This is the Top Notch Solid Men''s Henley T-Shirt product canonical url.', 0),
(2, 36, 'TSX Solid Men''s Polo T-Shirt', 'This is the TSX Solid Men''s Polo T-Shirt product short description.', 'This is the TSX Solid Men''s Polo T-Shirt product long description.', 599, 1, 0, '2015-11-06 14:36:57', 'TSX Solid Men''s Polo url alias', 'TSX Solid Men''s Polo Meta Title', 'TSX Solid Men''s Polo Meta Description', 'TSX Solid Men''s Polo Meta Keywords', 'TSX Solid Men''s Polo canonical url', 0),
(3, 36, 'Adidas Printed Men''s Round Neck T-Shirt', 'This is the Adidas Printed Men''s Round Neck T-Shirt product short description.', 'This is the Adidas Printed Men''s Round Neck T-Shirt product long description.', 899, 1, 1, '2015-11-06 15:07:36', 'Adidas Printed Men''s Round Neck T-Shirt url alias', 'Adidas Printed Men''s Round Neck T-Shirt Meta Title', 'Adidas Printed Men''s Round Neck T-Shirt Meta Description', 'Adidas Printed Men''s Round Neck T-Shirt Meta Keywords', 'Adidas Printed Men''s Round Neck T-Shirt Meta Keywords', 0),
(4, 36, 'adidas Striped Men''s Round Neck T-Shirt', 'This is the adidas Striped Men''s Round Neck T-Shirt product short description.', 'This is the adidas Striped Men''s Round Neck T-Shirt product long description.', 2000, 1, 1, '2015-11-06 15:29:16', 'adidas Striped Men''s Round Neck T-Shirt url alias', 'adidas Striped Men''s Round Neck T-Shirt Meta Title', 'adidas Striped Men''s Round Neck T-Shirt Meta Description', 'adidas Striped Men''s Round Neck T-Shirt Meta Keywords', 'adidas Striped Men''s Round Neck T-Shirt Meta Keywords', 0),
(5, 36, 'Puma Printed Men''s Round Neck T-Shirt', 'This is the Puma Printed Men''s Round Neck T-Shirt product short description.', 'This is the Puma Printed Men''s Round Neck T-Shirt product long description.', 1199, 0, 0, '2015-11-06 15:33:18', 'Puma Printed Men''s Round Neck T-Shirt Url Alias', 'Puma Printed Men''s Round Neck T-Shirt Meta Title', 'Puma Printed Men''s Round Neck T-Shirt Meta Description', 'Puma Printed Men''s Round Neck T-Shirt meta Keyword', 'Puma Printed Men''s Round Neck T-Shirt canonical url', 0),
(6, 36, 'G12', 'This is the G12 product short description.', 'This is the G12 product long description.', 299, 1, 0, '2015-11-06 15:50:04', 'G12 Url alias', 'G12 Meta Title', 'G12 Meta description', 'G12 Meta keywords', 'G12 Meta canonical url', 0),
(7, 36, 'Difference of Opinion Printed Men''s Round Neck T-Shirt', 'This is the Difference of Opinion Printed Men''s Round Neck T-Shirt short description.', 'This is the Difference of Opinion Printed Men''s Round Neck T-Shirt long description.', 799, 1, 0, '2015-11-06 16:49:36', 'Difference of Opinion Printed Men''s Round Neck T-Shirt Url Alias', 'Difference of Opinion Printed Men''s Round Neck T-Shirt Meta Title', 'Difference of Opinion Printed Men''s Round Neck T-Shirt Meta Description', 'Difference of Opinion Printed Men''s Round Neck T-Shirt Meta Keywords', 'Difference of Opinion Printed Men''s Round Neck T-Shirt canonical url', 0),
(8, 36, 'Zovi Solid Men''s Round Neck T-Shirt', 'Zovi Solid Men''s Round Neck T-Shirt', 'Zovi Solid Men''s Round Neck T-Shirt', 899, 0, 0, '2015-11-06 16:52:00', 'Zovi Solid Men''s Round Neck T-Shirt Url Alias', 'Zovi Solid Men''s Round Neck T-Shirt Meta Title', 'Zovi Solid Men''s Round Neck T-Shirt Meta Description', 'Zovi Solid Men''s Round Neck T-Shirt Meta keyword', 'Zovi Solid Men''s Round Neck T-Shirt canonical url', 0),
(9, 36, 'Jockey Solid Men''s Round Neck T-Shirt', 'This is Jockey Solid Men''s Round Neck T-Shirt short description', 'This is the Jockey Solid Men''s Round Neck T-Shirt logn description', 1299, 1, 0, '2015-11-06 16:56:08', 'Jockey Solid Men''s Round Neck T-Shirt Url Alias', 'Jockey Solid Men''s Round Neck T-Shirt Meta Title', 'Jockey Solid Men''s Round Neck T-Shirt Meta Description', 'Jockey Solid Men''s Round Neck T-Shirt meta Keywords', 'Jockey Solid Men''s Round Neck T-Shirt canonical url', 0),
(10, 36, 'Lee Printed Men''s Round Neck T-Shirt', 'This is the Lee Printed Men''s Round Neck T-Shirt product short description', 'This is the Lee Printed Men''s Round Neck T-Shirt product long description', 1899, 0, 0, '2015-11-06 17:02:23', 'Lee Printed Men''s Round Neck T-Shirt Url Alias', 'Lee Printed Men''s Round Neck T-Shirt Meta Title', 'Lee Printed Men''s Round Neck T-Shirt canonical url', 'Lee Printed Men''s Round Neck T-Shirt Meta Keywords', 'Lee Printed Men''s Round Neck T-Shirt canonical url', 0),
(11, 36, 'Gritstones Solid Men''s Round Neck T-Shirt', 'Gritstones Solid Men''s Round Neck T-Shirt', 'Gritstones Solid Men''s Round Neck T-Shirt', 1499, 1, 0, '2015-11-06 17:05:01', 'Gritstones Solid Men''s Round Neck T-Shirt Url Alias', 'Gritstones Solid Men''s Round Neck T-Shirt Meta Title', 'Gritstones Solid Men''s Round Neck T-Shirt Meta Description', 'Gritstones Solid Men''s Round Neck T-Shirt Meta Keywords', 'Gritstones Solid Men''s Round Neck T-Shirt canonical url', 0),
(12, 36, 'Pepe Printed Men''s Round Neck T-Shirt', 'This is the Pepe Printed Men''s Round Neck T-Shirt product short description', 'This is the Pepe Printed Men''s Round Neck T-Shirt product long description', 2899, 0, 0, '2015-11-06 17:07:43', 'Pepe Printed Men''s Round Neck T-Shirt Url Alias', 'Pepe Printed Men''s Round Neck T-Shirt Meta Title', 'Pepe Printed Men''s Round Neck T-Shirt Meta Description', 'Pepe Printed Men''s Round Neck T-Shirt Meta Keywords', 'Pepe Printed Men''s Round Neck T-Shirt cannonical url', 0),
(13, 36, 'Gritstones Solid Men''s Round Neck T-Shirt', 'This is the Gritstones Solid Men''s Round Neck T-Shirt product short description', 'This is the Gritstones Solid Men''s Round Neck T-Shirt product long description', 3999, 0, 0, '2015-11-06 17:12:39', 'Gritstones Solid Men''s Round Neck T-Shirt Url Alias', 'Gritstones Solid Men''s Round Neck T-Shirt Meta Title', 'Gritstones Solid Men''s Round Neck T-Shirt Meta Description', 'Gritstones Solid Men''s Round Neck T-Shirt Meta Keywords', 'Gritstones Solid Men''s Round Neck T-Shirt canonical url', 0),
(14, 36, 'Adidas Solid Men''s Round Neck T-Shirt', 'This is the Reebok Solid Men''s Round Neck T-Shirt product short description', 'This is the Reebok Solid Men''s Round Neck T-Shirt product long description', 1299, 0, 0, '2015-11-06 17:15:01', 'Reebok Solid Men''s Round Neck T-Shirt Url Alias', 'Reebok Solid Men''s Round Neck T-Shirt Meta Title', 'Reebok Solid Men''s Round Neck T-Shirt Meta Description', 'Reebok Solid Men''s Round Neck T-Shirt Meta Keywords', 'Reebok Solid Men''s Round Neck T-Shirt canonical url', 0),
(15, 8, 'Samsung Galaxy', 'This is the Samsung Galaxy product short description', 'This is the Samsung Galaxy product long description', 7999, 1, 0, '2015-11-06 18:01:24', 'Samsung Galaxy Url Alias', 'Samsung Galaxy Meta Title', 'Samsung Galaxy Meta Description', 'Samsung Galaxy Meta Keywords', 'Samsung Galaxy canonical url', 0),
(16, 8, 'Micromax Canvas 2', 'This is the Micromax Canvas 2 product short description', 'This is the Micromax Canvas 2 product long description', 10999, 1, 0, '2015-11-06 18:04:45', 'Micromax Canvas 2 Url Alias', 'Micromax Canvas 2 Meta Title', 'Micromax Canvas 2 Meta Description', 'Micromax Canvas 2 Meta Keywords', 'Micromax Canvas 2 canonical url', 0),
(17, 8, 'Moto-x', 'This is the Moto-x product short description', 'This is the Moto-x product long description', 1249, 0, 0, '2015-11-06 18:08:16', 'Moto-x product Url Alias', 'Moto-x product Meta Title', 'Moto-x product Meta Description', 'Moto-x product Meta Keywords', 'Moto-x product Canonical Url', 0),
(18, 8, 'Samsung J5', 'This is the Samsung J5 product short description', 'This is the Samsung J5 product long description', 10999, 1, 0, '2015-11-06 18:10:35', 'Samsung J5 Url Alias', 'Samsung J5 Meta Title', 'Samsung J5 Meta Description', 'Samsung J5 Meta Keywords', 'Samsung J5 canonical url', 0),
(19, 8, 'Asus A19', 'This is the Asus A19 product short description', 'This is the Asus A19 product long description', 12999, 1, 1, '2015-11-06 18:13:08', 'Asus A19 Url Alias', 'Asus A19 Meta Title', 'Asus A19 Meta Description', 'Asus A19 Meta Keywords', 'Asus A19 Meta Keywords', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `cat_id`, `product_id`, `heading`, `short_desc`, `long_desc`, `del_status`, `image_path`) VALUES
(6, NULL, 19, 'New', 'Hoodies', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0, '563d8a4ccfdc5banner1.jpg'),
(7, NULL, 19, 'Elegant', 'And Modern Style', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 0, '563d8a79eb971banner2.jpg'),
(8, NULL, 19, 'Support', 'Top Customer Accounts', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 0, '563d8a9844887banner3.jpg');

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
(49, 'Shashikant', 'Chobhe', 'superadmin11', 'c097ff177944712bed6d63b5c2c0f5648ae12ac9', 'superadmin@gmail.com', 2, '2015-11-04 14:01:42', 0);

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
-- Indexes for table `home_page_boxes`
--
ALTER TABLE `home_page_boxes`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attribute_masters`
--
ALTER TABLE `attribute_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `cart_masters`
--
ALTER TABLE `cart_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `home_page_boxes`
--
ALTER TABLE `home_page_boxes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `produc_images`
--
ALTER TABLE `produc_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `produc_masters`
--
ALTER TABLE `produc_masters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented key',AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto Incremented Value',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
