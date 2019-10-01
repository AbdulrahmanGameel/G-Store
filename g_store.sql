-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 11:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(2, 'Women', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(3, 'Kids', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(4, 'Other', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_adress` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_adress`, `customer_image`, `customer_ip`) VALUES
(8, 'asd', 'ahmed@jimmy', '123456', 'jimmy', 'jimmy', 'jimmy', 'jimmy', '', '::1'),
(9, 'jimmy', 'ahmed@asd', '123456', 'as', 'agb', 'asg', 'asdg', '', '::1'),
(11, 'BEASTMASTER78', 'ahmed@as', '123456', 'costumer_email', 'costumer_email', 'costumer_email', 'costumer_email', 'BEASTMASTER78.jpg', '::1'),
(12, 'gamed', 'ahmed@asdf', 'act Us', 'act Us', 'act Us', 'act Us', 'act Us', '', '::1'),
(13, 'afssdga', 'ahmedasfas@asd.asd', '123456afssdga', 'afssdga', 'afssdga', 'afssdga', 'afssdga', '', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 11, 211, 1510390090, 1, 'Medium', '2019-10-01', 'Complete'),
(2, 11, 297, 1510390090, 3, 'Medium', '2019-10-01', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_method` text NOT NULL,
  `ref_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_method`, `ref_no`) VALUES
(1, 1510390090, 211, 'Fawry', 2147483647),
(5, 0, 0, '', 0),
(6, 0, 0, '', 0),
(7, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 11, 1510390090, 6, 1, 'Medium', 'Complete'),
(2, 11, 1510390090, 16, 3, 'Medium', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(1, 1, 2, '2018-10-15 09:20:12', 'Tokichoi Front Pocket Collared Dress', 'product_front.jpg', 'product-back.jpg', 'product_hang.jpg', 66, 'Dress', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, dolorem tempore deleniti delectus numquam quam magni quidem veniam sequi nostrum sed eaque. Reiciendis quisquam totam nobis corrupti ullam at debitis!</p>'),
(2, 4, 3, '2018-10-18 18:27:12', 'Boys Puffer Coat With Detachable Hood', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 121, 'Hood', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(3, 5, 2, '2018-10-18 18:29:33', 'Girl Polos T-Shirt', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', '', 55, 'Shirt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(4, 1, 1, '2018-10-18 18:31:29', 'Man Geox Winter Jacket', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(5, 1, 2, '2018-10-18 18:32:37', 'Women Red Winter Jacket', 'Red-Winter-jacket-1.jpg', 'Red-Winter-jacket-2.jpg', 'Red-Winter-jacket-3.jpg', 103, 'Korean Jacket', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(6, 4, 2, '2018-10-18 18:33:44', 'Woman Waxed Cotton Coat', 'waxed-cotton-coat-woman-1.jpg', 'waxed-cotton-coat-woman-2.jpg', 'waxed-cotton-coat-woman-3.jpg', 211, 'Cotton', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(7, 3, 2, '2018-10-18 18:34:52', 'High Heels Pantofel Brukat', 'High Heels Women Pantofel Brukat-1.jpg', 'High Heels Women Pantofel Brukat-2.jpg', 'High Heels Women Pantofel Brukat-3.jpg', 45, 'High Heel', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(8, 3, 1, '2018-10-18 18:35:45', 'Adidas Suarez Slop On', 'Man-Adidas-Suarez-Slop-On-1.jpg', 'Man-Adidas-Suarez-Slop-On-2.jpg', 'Man-Adidas-Suarez-Slop-On-3.jpg', 51, 'Adidas Suarez', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(9, 2, 1, '2018-10-18 18:36:50', 'Mont Blanc Belt Man', 'Mont-Blanc-Belt-man-1.jpg', 'Mont-Blanc-Belt-man-2.jpg', 'Mont-Blanc-Belt-man-3.jpg', 166, 'Belt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(10, 2, 2, '2018-10-18 18:37:37', 'Diamond Heart Ring', 'women-diamond-heart-ring-1.jpg', 'women-diamond-heart-ring-2.jpg', 'women-diamond-heart-ring-3.jpg', 300, 'Ring', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate animi, voluptas neque quasi qui unde fuga porro vero magnam maiores optio amet quos temporibus? Amet saepe fugit nostrum a?</p>'),
(11, 5, 1, '2018-10-28 13:01:06', 'Grey Man T-Shirt', 'grey-man-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 50, 'Casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>'),
(12, 5, 1, '2018-10-28 13:01:56', 'Man Polo Casual T-Shirt', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 45, 'Casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>'),
(13, 5, 1, '2018-10-28 13:02:40', 'Boy Polos T-Shirt', 'polos-tshirt-1.jpg', 'polos-tshirt-2.jpg', '', 40, 'Casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>'),
(14, 1, 1, '2018-10-28 13:03:50', 'Levi`s Trucker Jacket', 'levis-Trucker-Jacket.jpg', 'levis-Trucker-Jacket-2.jpg', 'levis-Trucker-Jacket-3.jpg', 98, 'Trucker', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>'),
(15, 1, 1, '2018-10-28 13:04:34', 'Merlin Engineer Jacket', 'Merlin-Enginner-Jacket.jpg', 'Merlin-Engineer-Jacket-2.jpg', 'Merlin-Engineer-Jacket-3.jpg', 90, 'Casual Jacket', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>'),
(16, 1, 2, '2018-10-28 13:05:18', 'Mobile Power Jacket', 'Mobile-Power-Jacket.jpg', 'Mobile-Power-Jacket-2.jpg', 'Mobile-Power-Jacket-3.jpg', 99, 'Casual', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi rem nemo, autem at ad temporibus, maiores ducimus sed quam enim reprehenderit distinctio similique debitis, quis corrupti est. Sed, rem, voluptatibus!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Jackets', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(2, 'Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(3, 'Shoes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(4, 'Coats', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.'),
(5, 'T-Shirt', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit rem eos illo tempora dicta possimus adipisci doloribus obcaecati odit officiis, sapiente eius excepturi harum voluptates nihil aut quo vero eveniet.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide number 1', 'slide-1.jpg'),
(2, 'Slide number 2', 'slide-2.jpg'),
(3, 'Slide number 3', 'slide-3.jpg'),
(4, 'Slide number 4', 'slide-4.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
