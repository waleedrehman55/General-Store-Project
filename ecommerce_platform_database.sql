-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 04:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Waleed', 'waleedrehman2007@gmail.com', 'waleed123', 'admin', '2025-07-02 22:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `image`, `slug`) VALUES
(45, 'Meats', '2025-07-11 23:43:34', 'cat_6871a1a64af086.88643976.png', NULL),
(46, 'drinks', '2025-07-11 23:43:56', 'cat_6871a1bc35a021.40542897.png', NULL),
(48, 'Fruits and Veg', '2025-07-11 23:45:15', 'cat_6871a20b165203.68319280.png', NULL),
(50, 'Breads & Sweets', '2025-07-12 01:49:57', 'cat_6871bf45591d95.92881504.png', 'breads-sweets');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `date`, `created_at`) VALUES
(3, 'Sara Noor', 'sara@example.com', 'Product Inquiry', 'Mujhe product ki delivery kab milegi?', NULL, '2025-07-05'),
(4, 'Usman Tariq', 'usman@example.com', 'Support Needed', 'Support team ka response slow hai.', NULL, '2025-07-05'),
(5, 'Hina Sheikh', 'hina@example.com', 'Suggestion', 'Add dark mode please.', NULL, '2025-07-05'),
(6, 'Fahad Aziz', 'fahad@example.com', 'Bug Report', 'Checkout page crash ho raha hai.', NULL, '2025-07-05'),
(7, 'Areeba Malik', 'areeba@example.com', 'Appreciation', 'Amazing website experience!', NULL, '2025-07-05'),
(8, 'Kamran Ali', 'kamran@example.com', 'Order Issue', 'Order confirm nahi ho raha.', NULL, '2025-07-05'),
(9, 'Nimra Zafar', 'nimra@example.com', 'Feedback', 'Design aur speed dono awesome hain.', NULL, '2025-07-05'),
(10, 'Bilal Ahmed', 'bilal@example.com', 'Wrong Delivery', 'Galat item deliver hua hai.', NULL, '2025-07-05'),
(11, 'Maham Rizwan', 'maham@example.com', 'Inquiry', 'COD available hai ya nahi?', NULL, '2025-07-05'),
(12, 'Zeeshan Iqbal', 'zeeshan@example.com', 'Technical Help', 'Mujhe password reset karna hai.', NULL, '2025-07-05'),
(13, 'Laiba Khan', 'laiba@example.com', 'General Question', 'Website pe offers kab update hote hain?', NULL, '2025-07-05'),
(14, 'Yasir Bashir', 'yasir@example.com', 'Feature Request', 'Add live chat option.', NULL, '2025-07-05'),
(15, 'Noor Fatima', 'noor@example.com', 'Thanks', 'Excellent service!', NULL, '2025-07-05'),
(16, 'Ahmed Raza', 'ahmed@example.com', 'Return Policy', 'Return ka process kya hai?', NULL, '2025-07-05'),
(17, 'Iqra Javed', 'iqra@example.com', 'Error', 'Cart page error de raha hai.', NULL, '2025-07-05'),
(18, 'Owais Mughal', 'owais@example.com', 'Query', 'Custom size ka option nahi mil raha.', NULL, '2025-07-05'),
(19, 'Rabia Siddiqui', 'rabia@example.com', 'Delivery Delay', 'Delivery 1 week se late hai.', NULL, '2025-07-05'),
(20, 'Hamza Qureshi', 'hamza@example.com', 'Site Speed', 'Site load time slow hai.', NULL, '2025-07-05'),
(21, 'Farhan Saleem', 'farhan@example.com', 'Payment Issue', 'Payment gateway pe error aa raha hai.', NULL, '2025-07-05'),
(22, 'Mehwish Khan', 'mehwish@example.com', 'Stock Update', 'Kya yeh product stock me wapas ayega?', NULL, '2025-07-05'),
(23, 'Taha Siddiqui', 'taha@example.com', 'Late Response', 'Support team ka response abhi tak nahi aaya.', NULL, '2025-07-05'),
(24, 'Aiman Bukhari', 'aiman@example.com', 'App Crash', 'Mobile app open nahi ho rahi.', NULL, '2025-07-05'),
(25, 'Adil Nawaz', 'adil@example.com', 'Pricing Query', 'Is item ka price fix hai ya discount ho sakta hai?', NULL, '2025-07-05'),
(26, 'Sana Khalid', 'sana@example.com', 'Thank You', 'Thanks for the quick delivery!', NULL, '2025-07-05'),
(27, 'Talha Javed', 'talha@example.com', 'Wrong Size', 'Mujhe wrong size ka item mila hai.', NULL, '2025-07-05'),
(28, 'Fiza Yousuf', 'fiza@example.com', 'Email Issue', 'Confirmation email nahi aayi.', NULL, '2025-07-05'),
(29, 'Daniyal Hussain', 'daniyal@example.com', 'Contact Request', 'Kya aap mujhe call kar sakte hain?', NULL, '2025-07-05'),
(30, 'Hassan Mirza', 'hassan@example.com', 'Complaint', 'Customer service experience theek nahi tha.', NULL, '2025-07-05'),
(31, 'Waleed Rehman', 'waleedrehman@example.com', 'Support Needed', 'Hello Admin, mujhe apki website par issue aa raha hai.', NULL, '2025-07-05'),
(32, 'Umair rehman', 'umairrehman2007@gmail.com', 'Support Needed', 'Hello Admin, mujhe apki website par issue aa raha hai.', NULL, '2025-07-05'),
(33, 'Umair rehman', 'um031710@gmail.com', 'Query', 'Hello Admin, mujhe apki website par issue aa raha hai.', NULL, '2025-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `created_at`) VALUES
(9, 6, 2000.00, 'confirmed', '2025-07-04 19:19:52'),
(11, 6, 2000.00, 'pending', '2025-07-04 19:32:18'),
(12, 6, 2000.00, 'pending', '2025-07-04 19:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` enum('success','failed','refunded','pending','archived') NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_response` text DEFAULT NULL,
  `is_archived` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_id`, `payment_method`, `payment_status`, `transaction_id`, `amount`, `payment_date`, `payment_response`, `is_archived`, `created_at`) VALUES
(3, 6, 9, 'JazzCash', 'success', 'TXN-9876', 5000.00, '2025-07-03 12:00:00', '{\"msg\":\"Paid\"}', 1, '2025-07-06 23:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image`, `created_at`, `stock`) VALUES
(3, 'Apples', 'This is very sweet and fresh apples\r\n', 200.00, 48, 'prd_6871a63a75e4d3.25326764.jpg', '2025-07-12 00:03:06', 0),
(4, 'Watermelons', 'Fresh Watermelon.', 500.00, 48, 'prd_6871b7ca69ca85.04692854.jpg', '2025-07-12 01:18:02', 10),
(5, 'Bread', 'Fresh and healthy breads', 400.00, 50, 'prd_6871c05dc5f306.41945672.jpg', '2025-07-12 01:54:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `order_id`, `full_name`, `address`, `city`, `zip_code`, `phone`) VALUES
(5, 9, 'Waleed', 'Malir Street 5', 'Karachi', '2332', '03152201948'),
(7, 12, 'Waleed', 'Malir Street 5', 'Karachi', '2332', '03152201948');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(6, 'Michael Jordan', 'mj@example.com', 'pass111', '2025-07-03 02:28:19'),
(7, 'Laura Lee', 'laura@example.com', 'pass222', '2025-07-03 02:28:19'),
(8, 'Tom Cruise', 'tom@example.com', 'pass333', '2025-07-03 02:28:19'),
(9, 'Emily Rose', 'emily@example.com', 'pass444', '2025-07-03 02:28:19'),
(10, 'Ahmad Raza', 'ahmad@example.com', 'pass555', '2025-07-03 02:28:19'),
(11, 'Fatima Noor', 'fatima@example.com', 'pass666', '2025-07-03 02:28:19'),
(12, 'Bilal Aslam', 'bilal@example.com', 'pass777', '2025-07-03 02:28:19'),
(13, 'Zainab Tariq', 'zainab@example.com', 'pass888', '2025-07-03 02:28:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_foreign` (`user_id`),
  ADD KEY `fk_order_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_order_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_user_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
