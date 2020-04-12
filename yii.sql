-- phpMyAdmin SQL Dump
-- version 4.9.5deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2020 at 10:14 AM
-- Server version: 10.3.22-MariaDB-0ubuntu0.19.10.1
-- PHP Version: 7.2.29-1+ubuntu19.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `timestamp` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area`, `timestamp`, `user_id`) VALUES
(41, 'nav', 1574076613, 79978373),
(42, 'main', 1574076623, 79978373),
(43, 'main', 1574076625, 79978373),
(44, 'nav', 1574076693, 79978373),
(45, 'nav', 1574077915, 79978373),
(46, 'news', 1574077921, 79978373),
(47, 'main', 1574077926, 79978373),
(48, 'nav', 1574077948, 79978373),
(49, 'nav', 1574080106, 79978373),
(50, 'nav', 1574080124, 79978373),
(51, 'news', 1574080126, 79978373),
(52, 'news', 1574080130, 79978373),
(53, 'nav', 1574080143, 79978373),
(54, 'nav', 1574081364, 79978373),
(55, 'nav', 1574081455, 79978373),
(56, 'news', 1574081458, 79978373),
(57, 'news', 1574081462, 79978373),
(58, 'nav', 1574081471, 79978373),
(59, 'nav', 1574081599, 79978373),
(60, 'nav', 1574083194, 79978373),
(61, 'nav', 1574083194, 79978373),
(62, 'nav', 1574418709, 88888580),
(63, 'nav', 1574418710, 91795414),
(64, 'nav', 1576325871, 25171131),
(65, 'nav', 1576325876, 25171131),
(66, 'nav', 1576325878, 25171131),
(67, 'nav', 1576325902, 25171131),
(68, 'news', 1576497571, 25171131),
(69, 'nav', 1586188746, 86711658),
(70, 'nav', 1586188748, 86711658),
(71, 'nav', 1586428437, 88399256),
(72, 'nav', 1586429601, 88399256),
(73, 'nav', 1586432219, 88399256),
(74, 'nav', 1586433066, 88399256),
(75, 'nav', 1586433182, 88399256),
(76, 'nav', 1586434429, 88399256),
(77, 'nav', 1586434431, 88399256),
(78, 'nav', 1586434433, 88399256),
(79, 'nav', 1586437232, 88399256),
(80, 'nav', 1586437465, 88399256),
(81, 'nav', 1586437478, 88399256),
(82, 'nav', 1586437749, 88399256),
(83, 'nav', 1586442234, 88399256),
(84, 'nav', 1586442240, 88399256),
(85, 'nav', 1586443277, 88399256),
(86, 'nav', 1586443818, 88399256),
(87, 'nav', 1586443823, 88399256),
(88, 'nav', 1586444140, 88399256),
(89, 'nav', 1586447038, 88399256),
(90, 'nav', 1586447186, 88399256),
(91, 'nav', 1586447187, 88399256),
(92, 'nav', 1586447187, 88399256),
(93, 'nav', 1586447187, 88399256),
(94, 'nav', 1586447188, 88399256),
(95, 'nav', 1586448390, 88399256),
(96, 'nav', 1586448457, 88399256),
(97, 'nav', 1586448560, 88399256),
(98, 'nav', 1586448562, 88399256),
(99, 'nav', 1586448853, 88399256),
(100, 'nav', 1586448854, 88399256),
(101, 'nav', 1586448854, 88399256),
(102, 'nav', 1586448854, 88399256),
(103, 'nav', 1586448854, 88399256),
(104, 'nav', 1586448934, 88399256),
(105, 'nav', 1586448966, 88399256),
(106, 'nav', 1586448966, 88399256),
(107, 'nav', 1586448967, 88399256),
(108, 'nav', 1586448967, 88399256),
(109, 'nav', 1586448967, 88399256),
(110, 'nav', 1586449016, 88399256),
(111, 'nav', 1586449017, 88399256),
(112, 'nav', 1586449017, 88399256),
(113, 'nav', 1586449017, 88399256),
(114, 'nav', 1586449018, 88399256),
(115, 'nav', 1586449177, 88399256),
(116, 'nav', 1586449178, 88399256),
(117, 'nav', 1586449178, 88399256),
(118, 'nav', 1586449178, 88399256),
(119, 'nav', 1586449179, 88399256),
(120, 'nav', 1586449284, 88399256),
(121, 'nav', 1586449325, 88399256),
(122, 'nav', 1586449325, 88399256),
(123, 'nav', 1586449325, 88399256),
(124, 'nav', 1586449326, 88399256),
(125, 'nav', 1586449326, 88399256),
(126, 'nav', 1586449326, 88399256),
(127, 'nav', 1586449356, 88399256),
(128, 'nav', 1586449356, 88399256),
(129, 'nav', 1586449356, 88399256),
(130, 'nav', 1586449356, 88399256),
(131, 'nav', 1586449357, 88399256),
(132, 'nav', 1586449359, 88399256),
(133, 'nav', 1586449359, 88399256),
(134, 'nav', 1586449359, 88399256),
(135, 'nav', 1586449411, 88399256),
(136, 'nav', 1586449857, 88399256),
(137, 'nav', 1586449981, 88399256),
(138, 'nav', 1586449982, 88399256),
(139, 'nav', 1586449983, 88399256),
(140, 'nav', 1586449983, 88399256),
(141, 'nav', 1586450049, 88399256),
(142, 'nav', 1586450200, 88399256),
(143, 'nav', 1586450206, 88399256),
(144, 'nav', 1586450322, 88399256),
(145, 'nav', 1586450397, 88399256),
(146, 'nav', 1586450402, 88399256),
(147, 'nav', 1586450406, 88399256),
(148, 'nav', 1586450440, 88399256),
(149, 'nav', 1586450468, 88399256),
(150, 'nav', 1586450970, 88399256),
(151, 'nav', 1586450974, 88399256),
(152, 'nav', 1586451054, 88399256),
(153, 'nav', 1586451158, 88399256),
(154, 'nav', 1586451177, 88399256),
(155, 'nav', 1586451354, 88399256),
(156, 'nav', 1586451372, 88399256),
(157, 'nav', 1586451435, 88399256),
(158, 'nav', 1586451540, 88399256),
(159, 'nav', 1586451590, 88399256),
(160, 'nav', 1586452172, 88399256),
(161, 'nav', 1586452194, 88399256),
(162, 'nav', 1586452286, 88399256),
(163, 'nav', 1586452525, 88399256),
(164, 'nav', 1586452581, 88399256),
(165, 'nav', 1586452602, 88399256),
(166, 'nav', 1586452627, 88399256),
(167, 'nav', 1586452768, 88399256),
(168, 'nav', 1586452792, 88399256),
(169, 'nav', 1586452816, 88399256),
(170, 'nav', 1586452852, 88399256),
(171, 'nav', 1586452918, 88399256),
(172, 'nav', 1586453252, 88399256),
(173, 'nav', 1586453462, 88399256),
(174, 'nav', 1586454473, 88399256),
(175, 'nav', 1586455328, 88399256),
(176, 'nav', 1586455332, 88399256),
(177, 'nav', 1586455344, 88399256),
(178, 'nav', 1586455349, 88399256),
(179, 'nav', 1586455353, 88399256),
(180, 'nav', 1586455867, 88399256),
(181, 'nav', 1586455936, 88399256),
(182, 'nav', 1586456091, 88399256),
(183, 'nav', 1586456140, 88399256),
(184, 'nav', 1586456350, 88399256),
(185, 'nav', 1586456389, 88399256),
(186, 'nav', 1586456397, 88399256),
(187, 'nav', 1586456630, 88399256),
(188, 'nav', 1586456638, 88399256),
(189, 'nav', 1586456720, 88399256),
(190, 'nav', 1586457154, 88399256),
(191, 'nav', 1586457165, 88399256),
(192, 'nav', 1586457658, 88399256),
(193, 'nav', 1586457689, 88399256),
(194, 'nav', 1586457870, 88399256),
(195, 'nav', 1586457878, 88399256),
(196, 'nav', 1586458180, 88399256),
(197, 'nav', 1586458184, 88399256),
(198, 'nav', 1586458226, 88399256),
(199, 'nav', 1586458240, 88399256),
(200, 'nav', 1586458313, 88399256),
(201, 'nav', 1586458529, 88399256),
(202, 'nav', 1586458533, 88399256),
(203, 'nav', 1586458537, 88399256),
(204, 'nav', 1586458584, 88399256),
(205, 'nav', 1586458616, 88399256),
(206, 'nav', 1586458765, 88399256),
(207, 'nav', 1586458772, 88399256),
(208, 'nav', 1586458953, 88399256),
(209, 'nav', 1586459135, 88399256),
(210, 'nav', 1586459139, 88399256),
(211, 'nav', 1586502041, 88399256),
(212, 'nav', 1586502140, 88399256),
(213, 'nav', 1586502361, 88399256),
(214, 'nav', 1586502363, 88399256),
(215, 'nav', 1586502364, 88399256),
(216, 'nav', 1586502367, 88399256);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`) VALUES
(5, 'First category', 'First category', 'First category'),
(6, 'Second category', 'Second category', 'Second category'),
(7, 'Third category', 'Third category', 'Third category'),
(8, 'Fourth category', 'Fourth category', 'Fourth category');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `locale` varchar(2) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `locale`, `question`, `answer`) VALUES
(2, 'en', 'Lorem ipsum', 'EpamTest loprem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `locale` varchar(2) NOT NULL,
  `original` varchar(32) NOT NULL,
  `flag` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `name`, `locale`, `original`, `flag`) VALUES
(1, 'English', 'en', 'English', 'gb');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1531208255),
('m140209_132017_init', 1531208258),
('m140403_174025_create_account_table', 1531208258),
('m140504_113157_update_tables', 1531208258),
('m140504_130429_create_token_table', 1531208258),
('m140830_171933_fix_ip_field', 1531208258),
('m140830_172703_change_account_table_name', 1531208258),
('m141222_110026_update_ip_field', 1531208258),
('m141222_135246_alter_username_length', 1531208258),
('m150614_103145_update_social_account_table', 1531208258),
('m150623_212711_fix_username_notnull', 1531208258),
('m151218_234654_add_timezone_to_profile', 1531208258),
('m160929_103127_add_last_login_at_to_user_table', 1531208258);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `locale` varchar(2) NOT NULL,
  `position` int(11) NOT NULL,
  `in_footer` tinyint(1) NOT NULL,
  `pages` text NOT NULL,
  `anchor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `title`, `locale`, `position`, `in_footer`, `pages`, `anchor`) VALUES
(30, 'Home', 'en', 1, 0, '28', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `locale` varchar(2) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(128) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `head_scripts` text NOT NULL,
  `body_scripts` text NOT NULL,
  `index` tinyint(1) NOT NULL,
  `follow` tinyint(1) NOT NULL,
  `home_page` tinyint(1) NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `anchor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `locale`, `slug`, `content`, `meta_title`, `meta_description`, `keywords`, `head_scripts`, `body_scripts`, `index`, `follow`, `home_page`, `hide`, `anchor`) VALUES
(28, 'Home page', 'en', 'home-page', '<div class=\"container\">\r\n<p>Hello, world!</p>\r\n</div>', '', '', '', '', '', 0, 0, 1, 0, ''),
(29, 'Videos', 'en', 'videos', 'Wrong way', '', '', '', '', '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `preview` varchar(512) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(32) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `slug` varchar(64) NOT NULL,
  `locale` varchar(2) NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `meta_title` varchar(128) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `index` tinyint(1) NOT NULL,
  `follow` tinyint(1) NOT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `preview`, `text`, `img`, `created_by`, `date`, `slug`, `locale`, `hide`, `meta_title`, `meta_description`, `keywords`, `index`, `follow`, `views`) VALUES
(1, 'First post in blog', '<p>...and this is a description</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam quam ut dolor sagittis pellentesque. Fusce dictum enim at nisi suscipit ullamcorper. Donec sem mi, commodo vulputate est quis, facilisis posuere ligula. Maecenas ultrices felis rutrum libero feugiat pretium. Ut odio sapien, vestibulum ac nunc a, convallis rutrum purus. Etiam quis enim magna. Integer semper neque nec dui cursus, sed laoreet metus maximus. Fusce pretium et purus eget tincidunt. Sed lorem nisi, faucibus vitae convallis eu, ullamcorper eu enim.</p>\r\n<p>Vivamus consectetur eu arcu quis luctus. Quisque eu diam nec nisi imperdiet lacinia eget eu metus. Fusce ultrices in neque sed euismod. Donec dictum aliquet ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam massa erat, placerat non nisi id, lobortis imperdiet sapien. Duis nibh arcu, faucibus ac odio nec, lobortis viverra sem. Curabitur bibendum lacus sit amet arcu dignissim, eget euismod est feugiat.</p>\r\n<p>Vivamus a ipsum ac est consectetur lacinia. Integer magna diam, varius sed turpis eu, lacinia cursus risus. Praesent eget ultricies elit. Ut ac nibh id nisi commodo mollis vitae elementum nunc. Donec id nunc non metus fringilla porta at ut massa. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris non convallis nibh. Praesent auctor velit velit, ut blandit mi suscipit non. Nullam augue ex, pellentesque sollicitudin placerat ut, dapibus nec ligula. Ut a nibh lacinia ligula imperdiet posuere vitae ac enim. Quisque blandit sed odio at laoreet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent ut accumsan est. Donec elementum dolor vitae mi fermentum, vel auctor eros rhoncus. Proin id nisi magna.</p>\r\n<p>Etiam ante metus, convallis et blandit sed, suscipit quis lacus. Fusce volutpat ipsum eget quam faucibus tincidunt. Etiam eget magna vel mi sagittis posuere nec eget lacus. Nullam dignissim magna mattis, sodales tellus non, commodo risus. Duis est elit, laoreet eget dignissim non, aliquam dapibus augue. Suspendisse pulvinar porttitor ullamcorper. Maecenas ullamcorper ut mi nec vestibulum. Fusce ac pellentesque ipsum, sed volutpat mi.</p>\r\n<p>Praesent id cursus lectus. Nunc molestie, tellus at vestibulum porttitor, felis nisl malesuada turpis, sit amet molestie ex dui nec turpis. Vestibulum ac feugiat neque. Phasellus pretium neque convallis, condimentum velit sed, blandit erat. Nunc non neque lectus. Duis id tristique sapien. Pellentesque volutpat in odio pulvinar sagittis. Donec ut pretium purus. Mauris pharetra ultrices dui id consectetur. Morbi elementum aliquet felis in pretium. Nulla nec ipsum sem. Aenean hendrerit, tellus laoreet consequat scelerisque, felis ipsum porttitor arcu, non suscipit velit nunc at metus. In id libero pretium, imperdiet ex eget, scelerisque neque. Suspendisse vehicula in diam non ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec bibendum, magna eget rutrum auctor, tellus metus volutpat lectus, vel convallis arcu ante a nulla.</p>', '/img/blog/LFLPRXWCxr5.png', 35, '2018-09-01 11:51:44', 'first-post-in-blog', 'en', 0, 'First post in blog', 'First post in blog', 'First post in blog', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(35, 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `country` varchar(32) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `message`, `country`, `subject`, `date`, `ip`, `status`) VALUES
(10, 'Test', 'test@test.com', 'test', 'Ukraine', 'Email', '2018-09-01 13:25:57', '95.67.107.154', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `youtube` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `instagram` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `locale`, `youtube`, `facebook`, `twitter`, `footer`, `email`, `instagram`) VALUES
(1, 'QPRMan', 'en', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `user_module_enabled` tinyint(1) NOT NULL,
  `faq_module_enabled` tinyint(1) NOT NULL,
  `blog_module_enabled` tinyint(1) NOT NULL,
  `admin_email` varchar(32) NOT NULL,
  `language_module_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `user_module_enabled`, `faq_module_enabled`, `blog_module_enabled`, `admin_email`, `language_module_enabled`) VALUES
(1, 0, 0, 1, 'admin@admin.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `logo` varchar(32) NOT NULL,
  `background` varchar(32) NOT NULL,
  `footer_color` varchar(32) NOT NULL,
  `favicon` varchar(32) NOT NULL,
  `background_color` varchar(16) NOT NULL,
  `background_img` tinyint(1) NOT NULL,
  `highlight_tab` tinyint(1) NOT NULL,
  `navbar_color` varchar(16) NOT NULL,
  `active_link_color` varchar(16) NOT NULL,
  `navbar_links_color` varchar(16) NOT NULL,
  `navbar_border_color` varchar(16) NOT NULL,
  `active_link_background` varchar(16) NOT NULL,
  `link_hover_color` varchar(16) NOT NULL,
  `link_hover_background` varchar(16) NOT NULL,
  `ddm_background` varchar(16) NOT NULL,
  `ddm_links` varchar(16) NOT NULL,
  `ddm_border` varchar(16) NOT NULL,
  `ddm_active` varchar(16) NOT NULL,
  `ddm_hover_background` varchar(16) NOT NULL,
  `ddm_hover_text` varchar(16) NOT NULL,
  `ddm_active_background` varchar(16) NOT NULL,
  `logo_width` int(11) NOT NULL,
  `fixed_navbar` tinyint(1) NOT NULL,
  `navbar_transition` tinyint(1) NOT NULL,
  `transition_color` varchar(16) NOT NULL,
  `transition_time` int(11) NOT NULL,
  `footer_background_color` varchar(16) NOT NULL,
  `footer_titles_color` varchar(16) NOT NULL,
  `footer_links_color` varchar(16) NOT NULL,
  `footer_text_color` varchar(16) NOT NULL,
  `footer_social_links_color` varchar(16) NOT NULL,
  `footer_links_hover_color` varchar(16) NOT NULL,
  `navbar_align` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id`, `logo`, `background`, `footer_color`, `favicon`, `background_color`, `background_img`, `highlight_tab`, `navbar_color`, `active_link_color`, `navbar_links_color`, `navbar_border_color`, `active_link_background`, `link_hover_color`, `link_hover_background`, `ddm_background`, `ddm_links`, `ddm_border`, `ddm_active`, `ddm_hover_background`, `ddm_hover_text`, `ddm_active_background`, `logo_width`, `fixed_navbar`, `navbar_transition`, `transition_color`, `transition_time`, `footer_background_color`, `footer_titles_color`, `footer_links_color`, `footer_text_color`, `footer_social_links_color`, `footer_links_hover_color`, `navbar_align`) VALUES
(1, '/img/logo.png', '/img/background.jpg', '#000', '/web/favicon.ico', '#ffffff', 1, 1, '#ffffff', '#0000ff', '#000000', 'transparent', '#ffffff', '#434343', 'transparent', '#ffffff', '#000000', '#d9d9d9', '#ffffff', '#4a86e8', '#ffffff', '#4a86e8', 250, 0, 1, '#cccccc', 1, '#000000', '#d9d9d9', '#cfe2f3', '#ffffff', '#ffffff', '#4a86e8', 'navbar-right');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(35, 'unNtFkmv4B3lpc6N8TJZjEhmWK-cp2VQ', 1533212299, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `auth_token` text COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `mt4id` int(11) NOT NULL,
  `access_token` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `auth_token`, `first_name`, `last_name`, `country`, `city`, `zip_code`, `address`, `state`, `phone`, `mt4id`, `access_token`) VALUES
(35, 'admin@admin.com', 'admin@admin.com', '$2y$12$TGj4JH2AOUSK16P9/DmTS.cUXicVilGgqWJTzYWIeCn.4S3W.Izv2', 'f0cNIVCuynx_A4wrig2Fio-mQ9k7eIg8', 1535716937, NULL, NULL, '95.67.107.154', 1531917250, 1535721699, 0, 1586414029, '4qQOwljLeynMTqAUBKdwm8SSFBeMSXgmboquFXzvLUPwxscjmNdYxeqkFjclVZdSqfA3D5JBEenyw4U1hdo4rmCSHe', 'Ilya', 'Koopiyanov', 'Ukraine', 'Kiev', '011103', 'Bulvarno-Kudriavska 24b', 'Kyiv state', '+380663879427', 0, 'I8vxR6XEEYZxPavtQqUtoeXxJBAabr5n');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `slug`, `description`, `youtube`) VALUES
(14, '1 vid for 1 cat', 'First category', '1 vid for 1 cat', '1 vid for 1 cat'),
(15, '2 vid for 1 cat', 'First category', '2 vid for 1 cat', '2 vid for 1 cat'),
(16, '1 vid for 2 cat', 'Second category', '1 vid for 2 cat', '1 vid for 2 cat'),
(17, '2 vid for 2 cat', 'Second category', '2 vid for 2 cat', '2 vid for 2 cat'),
(18, '1 vid for 3 cat', 'Third category', '1 vid for 3 cat', '1 vid for 3 cat'),
(19, '2 vid for 3 cat', 'Third category', '2 vid for 3 cat', '2 vid for 3 cat'),
(20, '3 vid for 3 cat', 'Third category', '3 vid for 3 cat', '3 vid for 3 cat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
