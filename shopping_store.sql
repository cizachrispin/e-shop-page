-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 01:22 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `shopping_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_pass` varchar(250) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` date NOT NULL,
  `admin_contact` varchar(250) NOT NULL,
  `admin_job` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'admin', 'admin02@gmail.com', 'admin', '76.jpg', 'congo', '0000-00-00', '1111111', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_order`
--

CREATE TABLE `cancel_order` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `size` varchar(250) NOT NULL,
  `order_status` text NOT NULL,
  `reason` varchar(250) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancel_order`
--

INSERT INTO `cancel_order` (`id`, `order_id`, `customer_id`, `invoice_no`, `product_title`, `qty_sold`, `size`, `order_status`, `reason`, `timestamp`) VALUES
(4, 16, 1, 180578369, 'Fashion Mens Suit (suit + Vest + Pants) Wedding Dress-yollow', 5, 'Medium', 'cancelled', 'i changer my mind', '2021-08-15 14:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(520) NOT NULL,
  `cat_top` varchar(250) NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='categories';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Man', 'yes', 'promo1.jpg'),
(2, 'woman', 'yes', 'promo7.jpg'),
(3, 'Kid', 'yes', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg'),
(4, 'Baby', 'yes', ''),
(5, 'Other', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_contact` varchar(300) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`, `customer_ip`) VALUES
(1, 'ciza', 'cizalukogo01@gmail.com', '1234', '0713834648', 'ngara', '::1'),
(3, 'william', 'willia@gmail.com', '1234', '000000000', 'Kisangani', '192.168.0.22'),
(4, 'chrispinciza', 'chrispinciza01@gmail.com', '12345678', '0713834648', 'ngara', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `delivery_method` text NOT NULL,
  `payment_method` text NOT NULL,
  `product_title` varchar(250) NOT NULL,
  `product_img1` text NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `delivery_method`, `payment_method`, `product_title`, `product_img1`, `qty_sold`, `size`, `order_date`, `order_status`) VALUES
(23, 4, 18000, 65244444, 'Pickup', 'Pay On Delivery', 'Fashion 2 Pcs Men Ash Grey Slim Fit Suit', '1Fashion 2 Pcs Men Ash Grey Slim Fit Suit.jpg', 3, 'Medium', '2021-08-17', 'shipped'),
(21, 4, 36000, 779509833, 'Pickup', 'Pay On Delivery', 'Fashion 2 Pcs Men Ash Grey Slim Fit Suit', '1Fashion 2 Pcs Men Ash Grey Slim Fit Suit.jpg', 6, 'Medium', '2021-08-17', 'Delivery Failed'),
(22, 4, 2500, 1241356734, 'Deliver home/ofice', 'Pay On Delivery', 'Fashion Big Size Womens Loafers Casual Female Flats-Brown', '1Fashion Big Size Womens Loafers Casual Female Flats-Brown.jpg', 5, 'Small', '2021-08-17', 'pending order'),
(19, 4, 30000, 893829226, 'Pickup', 'Pay On Delivery', 'Fashion 2 Pcs Men Ash Grey Slim Fit Suit', '1Fashion 2 Pcs Men Ash Grey Slim Fit Suit.jpg', 5, 'Medium', '2021-08-16', 'shipped'),
(20, 4, 216000, 297117421, 'Deliver home/ofice', 'Pay On Delivery', 'High Heels Women Pantofel Brukat', 'High Heels Women Pantofel Brukat-1.jpg', 108, 'Medium', '2021-08-17', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_title` text DEFAULT NULL,
  `cat_title` varchar(250) NOT NULL,
  `manufacturer_top` text DEFAULT NULL,
  `manufacturer_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `cat_id`, `manufacturer_title`, `cat_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 1, 'pants', 'Man', 'yes', '2 skinny jeans for mans.jpg'),
(2, 1, 'shoes', 'Man', 'yes', '1 (8).jpg'),
(3, 2, 'bags', 'woman', 'yes', 'product7.jpg'),
(4, 2, 'shoes', 'woman', 'yes', 'product8.jpg'),
(5, 1, 'jacket', 'man', 'no', 'levis-Trucker-Jacket.jpg'),
(6, 2, 'jacket', 'woman', 'yes', 'Red-Winter-jacket-1.jpg'),
(7, 1, 't-shirt', 'man', 'no', '1Fashion Black Elegance T Shirt.jpg'),
(8, 2, 'pants', 'woman', 'no', 'product8.jpg'),
(9, 1, 'jacket', 'Kid', 'yes', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg'),
(10, 1, 'suit', 'man', 'no', '1Fashion Mens Suit (suit + Vest + Pants) Wedding Dress-yollow.jpg'),
(11, 1, 'shirt', 'Other', 'no', '1Fashion 6 Pack Men Official Shirts - Slim fit - 100% Cotton....jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `colour` varchar(250) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `sale_price` int(10) NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` varchar(250) NOT NULL,
  `product_video` varchar(250) NOT NULL,
  `product_label` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_brand`, `colour`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `sale_price`, `product_qty`, `product_keywords`, `product_desc`, `product_features`, `product_video`, `product_label`) VALUES
(4, 2, 1, 1, '2021-08-15 19:23:37', '1Fashion 2Pack, Soft Khaki Men Trouser Slim Fit Official Casual- Chocolate&Beige', 'levis', 'white', '1Fashion 2Pack, Soft Khaki Men Trouser Slim Fit Official Casual- Chocolate&Beige.jpg', '1Fashion 3Pack, Soft Khaki Men Trouser Slim Fit Official Casual- Beige,Navyblue&Black.jpg', '', 2500, 1500, '41', '1Fashion 2Pack, Soft Khaki Men Trouser Slim Fit Official Casual- Chocolate&Beige', '', '', '', 'new'),
(5, 2, 1, 1, '2021-08-15 19:23:47', 'skinny jeans for mans', 'levis', 'black', '1Man skinny jeans.jpg', '2 skinny jeans for mans.jpg', '', 1700, 1200, '70', 'skinny jeans for mans', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', 'sale'),
(6, 6, 2, 3, '2021-08-15 19:23:59', 'SL Women Handbag Luxury', 'luxury', 'black', 'SL Women Handbag Luxury.png', 'SL Women Handbag Luxury3.png', 'SL Women Handbag Luxury5.jpg', 800, 500, '43', 'SL Women Handbag Luxury', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', ''),
(7, 6, 2, 3, '2021-08-15 19:24:12', 'woman bag', 'luxury', 'green', '1 (10).jpg', '', '', 600, 400, '39', 'bag', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', ''),
(8, 4, 2, 4, '2021-08-17 09:36:10', 'High Heels Women Pantofel Brukat', 'brukat', 'white', 'High Heels Women Pantofel Brukat-1.jpg', 'High Heels Women Pantofel Brukat-2.jpg', '', 3500, 2000, 'Out Of Stock', 'High Heels Women Pantofel Brukat', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quisquam, magni! Id doloremque ab, aut voluptas esse neque debitis fuga, unde aliquam! Non nostrum fugiat laboriosam numquam voluptatem veritatis! Ea.</p>', '', 'new'),
(9, 4, 2, 4, '2021-08-17 10:57:13', 'Fashion Big Size Womens Loafers Casual Female Flats-Brown', 'levis', 'blue, black', '1Fashion Big Size Womens Loafers Casual Female Flats-Brown.jpg', '2Fashion Big Size Womens Loafers Casual Female Flats-Brown.jpg', '', 600, 500, '17', 'Fashion Big Size Womens Loafers Casual Female Flats-Brown', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita excepturi, necessitatibus magni voluptas. Nobis quibusdam, expedita ad quas provident dolorem possimus consequatur quo impedit, iusto odio ipsa nulla beatae labore.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita excepturi, necessitatibus magni voluptas. Nobis quibusdam, expedita ad quas provident dolorem possimus consequatur quo impedit, iusto odio ipsa nulla beatae labore.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita excepturi, necessitatibus magni voluptas. Nobis quibusdam, expedita ad quas provident dolorem possimus consequatur quo impedit, iusto odio ipsa nulla beatae labore.</p>', ''),
(10, 7, 1, 10, '2021-08-17 11:32:28', 'Fashion 2 Pcs Men Ash Grey Slim Fit Suit', 'ash', 'white', '1Fashion 2 Pcs Men Ash Grey Slim Fit Suit.jpg', '', '', 10000, 6000, '6', 'Fashion 2 Pcs Men Ash Grey Slim Fit Suit', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita excepturi, necessitatibus magni voluptas. Nobis quibusdam, expedita ad quas provident dolorem possimus consequatur quo impedit, iusto odio ipsa nulla beatae labore.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita excepturi, necessitatibus magni voluptas. Nobis quibusdam, expedita ad quas provident dolorem possimus consequatur quo impedit, iusto odio ipsa nulla beatae labore.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita excepturi, necessitatibus magni voluptas. Nobis quibusdam, expedita ad quas provident dolorem possimus consequatur quo impedit, iusto odio ipsa nulla beatae labore.</p>', ''),
(11, 7, 1, 10, '2021-08-15 11:26:28', 'Fashion Mens Suit (suit + Vest + Pants) Wedding Dress-yollow', 'Brioni', 'blue, green', '1Fashion Mens Leisure Three-piece Suit Groom Groomsmen Wedding Suit One Button Jacket.jpg', '1Fashion Mens Suit (suit + Vest + Pants) Wedding Dress-yollow.jpg', '', 15000, 10000, 'Out Of Stock', 'Mens suit', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem nostrum animi voluptatum asperiores voluptas adipisci iusto quidem tenetur, dolore quo? Nam, mollitia. Dolores quia voluptatum consequuntur accusantium unde, provident. Accusantium.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem nostrum animi voluptatum asperiores voluptas adipisci iusto quidem tenetur, dolore quo? Nam, mollitia. Dolores quia voluptatum consequuntur accusantium unde, provident. Accusantium.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem nostrum animi voluptatum asperiores voluptas adipisci iusto quidem tenetur, dolore quo? Nam, mollitia. Dolores quia voluptatum consequuntur accusantium unde, provident. Accusantium.</p>', 'new'),
(12, 17, 1, 11, '2021-08-15 11:45:55', 'Fashion High Quality Solid Color Men Shirt Linen Henry Collar Large Size Solid Color Long Sleeve Shirt Casual Slim Fit Male Shirts- khaki', 'luxury', 'blue, green', '1Fashion High Quality Solid Color Men Shirt Linen Henry Collar Large Size Solid Color Long Sleeve Shirt Casual Slim Fit Male Shirts- khaki.jpg', '2Fashion High Quality Solid Color Men Shirt Linen Henry Collar Large Size Solid Color Long Sleeve Shirt Casual Slim Fit Male Shirts- khaki.jpg', 'Fashion High Quality Solid Color Men Shirt Linen Henry Collar Large Size Solid Color Long Sleeve Shirt Casual Slim Fit Male Shirts- khaki.jpg', 2500, 2000, '8', 'man sirt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio totam ea illo voluptatum, voluptatem et repudiandae libero! Veniam delectus, ducimus doloremque velit, aliquid doloribus architecto consectetur magnam ut modi sapiente!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio totam ea illo voluptatum, voluptatem et repudiandae libero! Veniam delectus, ducimus doloremque velit, aliquid doloribus architecto consectetur magnam ut modi sapiente!</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio totam ea illo voluptatum, voluptatem et repudiandae libero! Veniam delectus, ducimus doloremque velit, aliquid doloribus architecto consectetur magnam ut modi sapiente!</p>', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `cat_id`, `p_cat_title`) VALUES
(1, 1, 'T-Shirts & Tanks'),
(2, 1, 'pants'),
(3, 1, 'short'),
(4, 2, 'shoes'),
(5, 1, 'shoes'),
(6, 2, 'Handbags & Wallets'),
(7, 1, 'suit'),
(8, 3, 'boys'),
(9, 3, 'girls'),
(10, 4, 'boys'),
(11, 4, 'girls'),
(12, 1, 'Sunglasses & Eyewear Accessories'),
(13, 2, 'shorts'),
(14, 1, 'Fashion belts'),
(15, 5, 'Swimsuits & Gymwear'),
(17, 1, 'shirt');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_url` varchar(250) NOT NULL,
  `slide_name` varchar(250) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_url`, `slide_name`, `slide_image`) VALUES
(7, 'http://localhost/shopping/shop.php?p_cat=4', 'slide7', 'slide-6.jpg'),
(6, 'http://localhost/shopping/shop.php?p_cat=3', 'slide5', 'slide-7.jpg'),
(5, 'http://localhost/shopping/shop.php?p_cat=4', 'slide8', 'slide-4.jpg'),
(8, 'http://localhost/shopping/shop.php?p_cat=4', 'slide3', 'slide-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(250) NOT NULL,
  `term_content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`term_id`, `term_title`, `term_content`) VALUES
(1, 'condition', 'Lorem '),
(2, 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, necessitatibus, vero neque officiis consequatur totam qui at ullam magnam, ab quod in repellat nulla est beatae fugit quos distinctio. Natus.'),
(3, 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, necessitatibus, vero neque officiis consequatur totam qui at ullam magnam, ab quod in repellat nulla est beatae fugit quos distinctio. Natus.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cancel_order`
--
ALTER TABLE `cancel_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cancel_order`
--
ALTER TABLE `cancel_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
