-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 01:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `massi_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `aboutus` text NOT NULL,
  `fb` text NOT NULL,
  `tw` text NOT NULL,
  `ig` text NOT NULL,
  `yt` text NOT NULL,
  `pp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `aboutus`, `fb`, `tw`, `ig`, `yt`, `pp`) VALUES
(1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit nesciunt nihil cupiditate, vitae fuga id doloremque quos accusantium eius blanditiis odio incidunt! Totam voluptatem, dicta illo incidunt sunt vero. Error.\r\nDolorum illum amet recusandae in dicta exercitationem tempora a eligendi quibusdam enim sint, quaerat nobis impedit quis sed excepturi illo id cupiditate, labore ad odit. Reprehenderit minus incidunt optio nihil.', 'https://twitter.com/home', 'https://twitter.com/home', 'https://twitter.com/home', 'https://twitter.com/home', 'marthapp-8824.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'massi', '3c63ea9217846fc82d68833f8f3ce182');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_posts`
--

CREATE TABLE `tbl_blog_posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cover_image` text NOT NULL,
  `post_content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog_posts`
--

INSERT INTO `tbl_blog_posts` (`id`, `title`, `cat_id`, `cover_image`, `post_content`, `date`) VALUES
(0, 'Asperiores eligendi quia expedita nihil velit eaque nulla consequuntur ratione nisi culpa iste saepe nam voluptas minima illo,', 2, 'massiblog-5319.png', '<p>Asperiores eligendi quia expedita nihil velit eaque nulla consequuntur ratione nisi</p>\r\n\r\n<p>Natus laborum quos sequi labore voluptate quidem. Cum expedita aut obcaecati similique voluptatum sunt a omnis harum magni cupiditate, quia nemo, rem eveniet doloribus accusantium facilis, voluptates voluptas mollitia voluptatem?</p>\r\n\r\n<p>Dignissimos veniam, mollitia doloremque officiis, exercitationem ipsa dolorem doloribus quisquam eum similique sapiente reprehenderit illo voluptas unde quae voluptatibus ad nemo. Voluptates amet consequatur unde? Est commodi dolorum reprehenderit modi?</p>\r\n\r\n<p>Illo, quis maiores. Expedita repellendus facere impedit sed recusandae sunt similique porro deleniti iusto asperiores, at nesciunt facilis minima itaque! Nobis, sapiente assumenda! Ratione nulla repellendus deleniti adipisci iste quisquam!</p>\r\n\r\n<p>Magni, esse, libero incidunt vel velit voluptatum sed earum saepe, harum eos labore! Voluptate eaque nesciunt fugiat ex cum neque eos hic, necessitatibus omnis, reprehenderit consequuntur vero quas sequi quos!</p>\r\n\r\n<p>Consequatur aperiam illo recusandae error, quod iusto eaque expedita deserunt neque similique dolor ipsum accusantium perspiciatis ex nobis pariatur quaerat eveniet porro exercitationem a nisi. Nihil amet alias eveniet eaque.</p>\r\n\r\n<p>Mollitia cumque, error cum illum inventore ex repellendus. Quos eius id cum sint voluptate, doloremque ab earum quaerat quidem molestias ullam ipsa voluptatibus iusto aut architecto sit blanditiis debitis? Earum.</p>\r\n\r\n<p>Illum debitis repellat ipsa quisquam assumenda consequatur placeat sunt quod necessitatibus fuga dolore similique porro, maxime obcaecati distinctio maiores culpa eius enim possimus voluptatem voluptate dolor recusandae. Minus, repellat sit.</p>\r\n', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'LifeStyle'),
(2, 'Travel'),
(3, 'Fashion'),
(4, 'LifeStyle + Style'),
(5, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
