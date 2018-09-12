-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 08:17 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziviso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorizations`
--

CREATE TABLE `authorizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `compose` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `edit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `del` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `view` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `authorize_send` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT '230',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `created_by`, `description`, `logo`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 27, 1, 'High school Client', 'storage/logos/1.jpg', 230, '2018-02-05 08:30:51', '2018-02-05 08:30:51'),
(2, 31, 1, 'Group for the straightedge', 'storage/logos/2.jpg', 230, '2018-02-11 18:10:06', '2018-02-11 18:10:06'),
(3, 33, 1, 'Econet Client', 'storage/logos/3.jpg', 230, '2018-02-14 10:48:44', '2018-02-14 10:51:11'),
(4, 37, 1, 'A global group of news sharers.', 'storage/logos/4.png', 230, '2018-02-25 11:14:45', '2018-02-25 11:14:46'),
(5, 38, 1, 'Well kitted gym in Harare West. Helps you to reach your body goals.', 'storage/logos/5.jpg', 230, '2018-02-25 11:18:30', '2018-02-25 11:18:30'),
(6, 42, 1, 'Medical aid society.', 'storage/logos/6.jpeg', 230, '2018-03-30 17:45:02', '2018-03-30 17:45:02'),
(7, 43, 1, 'Test Client', 'storage/logos/7.jpg', 230, '2018-04-02 13:58:39', '2018-04-02 14:21:00'),
(8, 44, 1, 'Inter-denominational church based in Southerton, Harare.', 'storage/logos/8.jpg', 230, '2018-04-02 14:52:49', '2018-04-02 14:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `client_subscribers`
--

CREATE TABLE `client_subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `subscriber_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', '376', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(2, 'United arab emirates', 'AE', '971', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(3, 'Afghanistan', 'AF', '93', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(4, 'Antigua and barbuda', 'AG', '1268', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(5, 'Anguilla', 'AI', '1264', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(6, 'Albania', 'AL', '355', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(7, 'Armenia', 'AM', '374', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(8, 'Netherlands antilles', 'AN', '599', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(9, 'Angola', 'AO', '244', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(10, 'Antarctica', 'AQ', '672', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(11, 'Argentina', 'AR', '54', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(12, 'American samoa', 'AS', '1684', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(13, 'Austria', 'AT', '43', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(14, 'Australia', 'AU', '61', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(15, 'Aruba', 'AW', '297', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(16, 'Azerbaijan', 'AZ', '994', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(17, 'Bosnia and herzegovina', 'BA', '387', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(18, 'Barbados', 'BB', '1246', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(19, 'Bangladesh', 'BD', '880', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(20, 'Belgium', 'BE', '32', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(21, 'Burkina faso', 'BF', '226', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(22, 'Bulgaria', 'BG', '359', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(23, 'Bahrain', 'BH', '973', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(24, 'Burundi', 'BI', '257', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(25, 'Benin', 'BJ', '229', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(26, 'Saint barthelemy', 'BL', '590', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(27, 'Bermuda', 'BM', '1441', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(28, 'Brunei darussalam', 'BN', '673', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(29, 'Bolivia', 'BO', '591', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(30, 'Brazil', 'BR', '55', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(31, 'Bahamas', 'BS', '1242', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(32, 'Bhutan', 'BT', '975', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(33, 'Botswana', 'BW', '267', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(34, 'Belarus', 'BY', '375', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(35, 'Belize', 'BZ', '501', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(36, 'Canada', 'CA', '1', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(37, 'Cocos (keeling) islands', 'CC', '61', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(38, 'Congo, the democratic republic of the', 'CD', '243', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(39, 'Central african republic', 'CF', '236', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(40, 'Congo', 'CG', '242', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(41, 'Switzerland', 'CH', '41', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(42, 'Cote d ivoire', 'CI', '225', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(43, 'Cook islands', 'CK', '682', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(44, 'Chile', 'CL', '56', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(45, 'Cameroon', 'CM', '237', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(46, 'China', 'CN', '86', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(47, 'Colombia', 'CO', '57', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(48, 'Costa rica', 'CR', '506', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(49, 'Cuba', 'CU', '53', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(50, 'Cape verde', 'CV', '238', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(51, 'Christmas island', 'CX', '61', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(52, 'Cyprus', 'CY', '357', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(53, 'Czech republic', 'CZ', '420', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(54, 'Germany', 'DE', '49', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(55, 'Djibouti', 'DJ', '253', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(56, 'Denmark', 'DK', '45', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(57, 'Dominica', 'DM', '1767', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(58, 'Dominican republic', 'DO', '1809', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(59, 'Algeria', 'DZ', '213', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(60, 'Ecuador', 'EC', '593', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(61, 'Estonia', 'EE', '372', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(62, 'Egypt', 'EG', '20', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(63, 'Eritrea', 'ER', '291', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(64, 'Spain', 'ES', '34', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(65, 'Ethiopia', 'ET', '251', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(66, 'Finland', 'FI', '358', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(67, 'Fiji', 'FJ', '679', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(68, 'Falkland islands (malvinas)', 'FK', '500', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(69, 'Micronesia, federated states of', 'FM', '691', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(70, 'Faroe islands', 'FO', '298', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(71, 'France', 'FR', '33', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(72, 'Gabon', 'GA', '241', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(73, 'United kingdom', 'GB', '44', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(74, 'Grenada', 'GD', '1473', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(75, 'Georgia', 'GE', '995', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(76, 'Ghana', 'GH', '233', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(77, 'Gibraltar', 'GI', '350', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(78, 'Greenland', 'GL', '299', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(79, 'Gambia', 'GM', '220', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(80, 'Guinea', 'GN', '224', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(81, 'Equatorial guinea', 'GQ', '240', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(82, 'Greece', 'GR', '30', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(83, 'Guatemala', 'GT', '502', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(84, 'Guam', 'GU', '1671', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(85, 'Guinea-bissau', 'GW', '245', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(86, 'Guyana', 'GY', '592', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(87, 'Hong kong', 'HK', '852', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(88, 'Honduras', 'HN', '504', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(89, 'Croatia', 'HR', '385', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(90, 'Haiti', 'HT', '509', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(91, 'Hungary', 'HU', '36', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(92, 'Indonesia', 'ID', '62', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(93, 'Ireland', 'IE', '353', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(94, 'Israel', 'IL', '972', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(95, 'Isle of man', 'IM', '44', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(96, 'India', 'IN', '91', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(97, 'Iraq', 'IQ', '964', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(98, 'Iran, islamic republic of', 'IR', '98', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(99, 'Iceland', 'IS', '354', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(100, 'Italy', 'IT', '39', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(101, 'Jamaica', 'JM', '1876', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(102, 'Jordan', 'JO', '962', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(103, 'Japan', 'JP', '81', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(104, 'Kenya', 'KE', '254', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(105, 'Kyrgyzstan', 'KG', '996', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(106, 'Cambodia', 'KH', '855', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(107, 'Kiribati', 'KI', '686', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(108, 'Comoros', 'KM', '269', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(109, 'Saint kitts and nevis', 'KN', '1869', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(110, 'Korea democratic peoples republic of', 'KP', '850', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(111, 'Korea republic of', 'KR', '82', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(112, 'Kuwait', 'KW', '965', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(113, 'Cayman islands', 'KY', '1345', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(114, 'Kazakstan', 'KZ', '7', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(115, 'Lao peoples democratic republic', 'LA', '856', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(116, 'Lebanon', 'LB', '961', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(117, 'Saint lucia', 'LC', '1758', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(118, 'Liechtenstein', 'LI', '423', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(119, 'Sri lanka', 'LK', '94', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(120, 'Liberia', 'LR', '231', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(121, 'Lesotho', 'LS', '266', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(122, 'Lithuania', 'LT', '370', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(123, 'Luxembourg', 'LU', '352', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(124, 'Latvia', 'LV', '371', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(125, 'Libyan arab jamahiriya', 'LY', '218', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(126, 'Morocco', 'MA', '212', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(127, 'Monaco', 'MC', '377', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(128, 'Moldova, republic of', 'MD', '373', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(129, 'Montenegro', 'ME', '382', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(130, 'Saint martin', 'MF', '1599', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(131, 'Madagascar', 'MG', '261', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(132, 'Marshall islands', 'MH', '692', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(133, 'Macedonia, the former yugoslav republic of', 'MK', '389', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(134, 'Mali', 'ML', '223', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(135, 'Myanmar', 'MM', '95', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(136, 'Mongolia', 'MN', '976', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(137, 'Macau', 'MO', '853', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(138, 'Northern mariana islands', 'MP', '1670', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(139, 'Mauritania', 'MR', '222', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(140, 'Montserrat', 'MS', '1664', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(141, 'Malta', 'MT', '356', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(142, 'Mauritius', 'MU', '230', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(143, 'Maldives', 'MV', '960', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(144, 'Malawi', 'MW', '265', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(145, 'Mexico', 'MX', '52', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(146, 'Malaysia', 'MY', '60', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(147, 'Mozambique', 'MZ', '258', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(148, 'Namibia', 'NA', '264', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(149, 'New caledonia', 'NC', '687', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(150, 'Niger', 'NE', '227', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(151, 'Nigeria', 'NG', '234', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(152, 'Nicaragua', 'NI', '505', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(153, 'Netherlands', 'NL', '31', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(154, 'Norway', 'NO', '47', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(155, 'Nepal', 'NP', '977', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(156, 'Nauru', 'NR', '674', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(157, 'Niue', 'NU', '683', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(158, 'New zealand', 'NZ', '64', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(159, 'Oman', 'OM', '968', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(160, 'Panama', 'PA', '507', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(161, 'Peru', 'PE', '51', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(162, 'French polynesia', 'PF', '689', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(163, 'Papua new guinea', 'PG', '675', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(164, 'Philippines', 'PH', '63', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(165, 'Pakistan', 'PK', '92', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(166, 'Poland', 'PL', '48', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(167, 'Saint pierre and miquelon', 'PM', '508', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(168, 'Pitcairn', 'PN', '870', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(169, 'Puerto rico', 'PR', '1', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(170, 'Portugal', 'PT', '351', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(171, 'Palau', 'PW', '680', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(172, 'Paraguay', 'PY', '595', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(173, 'Qatar', 'QA', '974', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(174, 'Romania', 'RO', '40', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(175, 'Serbia', 'RS', '381', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(176, 'Russian federation', 'RU', '7', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(177, 'Rwanda', 'RW', '250', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(178, 'Saudi arabia', 'SA', '966', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(179, 'Solomon islands', 'SB', '677', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(180, 'Seychelles', 'SC', '248', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(181, 'Sudan', 'SD', '249', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(182, 'Sweden', 'SE', '46', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(183, 'Singapore', 'SG', '65', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(184, 'Saint helena', 'SH', '290', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(185, 'Slovenia', 'SI', '386', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(186, 'Slovakia', 'SK', '421', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(187, 'Sierra leone', 'SL', '232', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(188, 'San marino', 'SM', '378', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(189, 'Senegal', 'SN', '221', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(190, 'Somalia', 'SO', '252', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(191, 'Suriname', 'SR', '597', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(192, 'Sao tome and principe', 'ST', '239', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(193, 'El salvador', 'SV', '503', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(194, 'Syrian arab republic', 'SY', '963', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(195, 'Swaziland', 'SZ', '268', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(196, 'Turks and caicos islands', 'TC', '1649', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(197, 'Chad', 'TD', '235', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(198, 'Togo', 'TG', '228', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(199, 'Thailand', 'TH', '66', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(200, 'Tajikistan', 'TJ', '992', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(201, 'Tokelau', 'TK', '690', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(202, 'Timor-leste', 'TL', '670', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(203, 'Turkmenistan', 'TM', '993', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(204, 'Tunisia', 'TN', '216', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(205, 'Tonga', 'TO', '676', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(206, 'Turkey', 'TR', '90', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(207, 'Trinidad and tobago', 'TT', '1868', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(208, 'Tuvalu', 'TV', '688', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(209, 'Taiwan, province of china', 'TW', '886', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(210, 'Tanzania, united republic of', 'TZ', '255', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(211, 'Ukraine', 'UA', '380', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(212, 'Uganda', 'UG', '256', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(213, 'United states', 'US', '1', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(214, 'Uruguay', 'UY', '598', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(215, 'Uzbekistan', 'UZ', '998', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(216, 'Holy see (vatican city state)', 'VA', '39', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(217, 'Saint vincent and the grenadines', 'VC', '1784', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(218, 'Venezuela', 'VE', '58', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(219, 'Virgin islands, british', 'VG', '1284', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(220, 'Virgin islands, u.s.', 'VI', '1340', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(221, 'Viet nam', 'VN', '84', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(222, 'Vanuatu', 'VU', '678', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(223, 'Wallis and futuna', 'WF', '681', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(224, 'Samoa', 'WS', '685', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(225, 'Kosovo', 'XK', '381', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(226, 'Yemen', 'YE', '967', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(227, 'Mayotte', 'YT', '262', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(228, 'South africa', 'ZA', '27', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(229, 'Zambia', 'ZM', '260', '2017-09-28 05:03:06', '2017-09-28 05:27:00'),
(230, 'Zimbabwe', 'ZW', '263', '2017-09-28 05:03:06', '2017-09-28 05:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `details`, `client_id`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Global Economic update Podcast', 'Global Economic update Podcast', 4, 37, '2018-02-28 10:00:00', '2018-02-28 16:00:00', '2018-02-25 12:03:48', '2018-02-25 12:22:47'),
(3, 'The society event', 'The society event', 2, 31, '2018-02-26 16:02:00', '2018-02-28 15:02:00', '2018-02-26 11:03:10', '2018-02-26 11:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `event_groups`
--

CREATE TABLE `event_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_groups`
--

INSERT INTO `event_groups` (`id`, `event_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2018-02-25 12:03:48', '2018-02-25 12:03:48'),
(3, 3, 2, '2018-02-26 11:03:10', '2018-02-26 11:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `join_criteria` enum('open','private') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `client_id`, `created_by`, `join_criteria`, `created_at`, `updated_at`) VALUES
(1, 'Test Group 1', 'A good development group', 1, 27, 'open', '2018-02-05 08:36:41', '2018-02-05 08:36:41'),
(2, 'Straightedge Group', 'We are straightedge', 2, 31, 'private', '2018-02-22 06:38:24', '2018-02-22 06:38:24'),
(3, 'Zumba Class', 'Contemporary Zumba class for all ages and abilities.', 5, 38, 'open', '2018-02-25 11:24:59', '2018-02-25 11:24:59'),
(4, 'Extreme Aerobics', 'Extreme aerobics sessions for Level 3 participants. A health certificate is required before you can join.', 5, 38, 'open', '2018-02-25 11:26:02', '2018-02-25 11:26:02'),
(5, 'Body Builders', 'For those who body build at a professional or semi-pro level.', 5, 38, 'private', '2018-02-25 11:26:43', '2018-02-25 11:26:43'),
(6, 'Economic News', 'Economic news from around the world', 4, 37, 'open', '2018-02-25 11:55:18', '2018-02-25 11:55:18'),
(7, 'Political news', 'Political news from around the world.', 4, 37, 'open', '2018-02-25 11:55:40', '2018-02-25 11:55:40'),
(8, 'Sports News', 'Sports news from around the world.', 4, 37, 'private', '2018-02-25 11:56:06', '2018-02-25 11:56:06'),
(9, 'Main Society', 'The main group for the society of straightedge', 2, 31, 'open', '2018-02-27 17:57:00', '2018-02-27 17:57:00'),
(10, 'Bulawayo', 'Members based in Bulawayo.', 6, 42, 'open', '2018-03-30 17:49:48', '2018-03-30 17:49:48'),
(11, 'Harare', 'Members based in Harare', 6, 42, 'open', '2018-03-30 17:50:18', '2018-03-30 17:50:18'),
(12, 'Choir', 'All Choir members', 8, 44, 'open', '2018-04-02 14:56:52', '2018-04-02 14:56:52'),
(13, 'Pastors', 'All Pastors, Deacons and Elders', 8, 44, 'private', '2018-04-02 14:57:24', '2018-04-02 14:57:24'),
(14, 'Ushers', 'All Ushers', 8, 44, 'open', '2018-04-02 14:57:43', '2018-04-02 14:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_messages`
--

INSERT INTO `group_messages` (`id`, `message_id`, `group_id`, `created_at`, `updated_at`) VALUES
(2, 2, 5, '2018-02-25 16:28:23', '2018-02-25 16:28:23'),
(14, 14, 2, '2018-02-25 20:47:36', '2018-02-25 20:47:36'),
(15, 15, 3, '2018-02-26 09:52:18', '2018-02-26 09:52:18'),
(16, 15, 4, '2018-02-26 09:52:18', '2018-02-26 09:52:18'),
(17, 15, 5, '2018-02-26 09:52:18', '2018-02-26 09:52:18'),
(20, 18, 5, '2018-02-28 12:29:20', '2018-02-28 12:29:20'),
(23, 21, 3, '2018-02-28 18:10:53', '2018-02-28 18:10:53'),
(24, 21, 4, '2018-02-28 18:10:53', '2018-02-28 18:10:53'),
(25, 21, 5, '2018-02-28 18:10:53', '2018-02-28 18:10:53'),
(28, 24, 2, '2018-03-01 07:38:55', '2018-03-01 07:38:55'),
(29, 25, 6, '2018-03-05 08:42:52', '2018-03-05 08:42:52'),
(30, 26, 7, '2018-03-05 08:45:47', '2018-03-05 08:45:47'),
(31, 27, 3, '2018-03-08 16:34:34', '2018-03-08 16:34:34'),
(32, 28, 2, '2018-03-08 17:06:00', '2018-03-08 17:06:00'),
(33, 29, 2, '2018-03-27 07:37:28', '2018-03-27 07:37:28'),
(34, 29, 9, '2018-03-27 07:37:28', '2018-03-27 07:37:28'),
(35, 30, 3, '2018-03-30 17:16:02', '2018-03-30 17:16:02'),
(36, 31, 6, '2018-03-30 17:21:24', '2018-03-30 17:21:24'),
(37, 31, 7, '2018-03-30 17:21:24', '2018-03-30 17:21:24'),
(38, 31, 8, '2018-03-30 17:21:24', '2018-03-30 17:21:24'),
(39, 32, 10, '2018-03-30 17:52:51', '2018-03-30 17:52:51'),
(40, 33, 3, '2018-04-02 14:35:42', '2018-04-02 14:35:42'),
(41, 33, 4, '2018-04-02 14:35:42', '2018-04-02 14:35:42'),
(42, 33, 5, '2018-04-02 14:35:42', '2018-04-02 14:35:42'),
(43, 34, 6, '2018-04-02 14:38:04', '2018-04-02 14:38:04'),
(44, 34, 7, '2018-04-02 14:38:04', '2018-04-02 14:38:04'),
(45, 34, 8, '2018-04-02 14:38:04', '2018-04-02 14:38:04'),
(46, 35, 10, '2018-04-02 14:47:26', '2018-04-02 14:47:26'),
(47, 35, 11, '2018-04-02 14:47:26', '2018-04-02 14:47:26'),
(48, 36, 13, '2018-04-02 15:01:46', '2018-04-02 15:01:46'),
(49, 37, 12, '2018-04-02 15:05:12', '2018-04-02 15:05:12'),
(50, 38, 14, '2018-04-02 15:20:48', '2018-04-02 15:20:48'),
(51, 39, 4, '2018-04-02 15:23:22', '2018-04-02 15:23:22'),
(52, 40, 1, '2018-04-03 01:29:25', '2018-04-03 01:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `group_requests`
--

CREATE TABLE `group_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `subscriber_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_requests`
--

INSERT INTO `group_requests` (`id`, `group_id`, `subscriber_id`, `created_at`, `updated_at`) VALUES
(4, 2, 6, '2018-03-05 08:50:22', '2018-03-05 08:50:22'),
(5, 2, 8, '2018-03-28 13:37:49', '2018-03-28 13:37:49'),
(6, 8, 8, '2018-03-28 13:38:08', '2018-03-28 13:38:08'),
(7, 5, 8, '2018-03-28 13:38:41', '2018-03-28 13:38:41'),
(8, 13, 6, '2018-04-02 14:58:08', '2018-04-02 14:58:08'),
(9, 13, 9, '2018-04-02 15:17:36', '2018-04-02 15:17:36'),
(10, 8, 9, '2018-04-02 15:19:07', '2018-04-02 15:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `group_subscribers`
--

CREATE TABLE `group_subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `subscriber_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_subscribers`
--

INSERT INTO `group_subscribers` (`id`, `group_id`, `subscriber_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-02-12 06:35:38', '2018-02-12 06:35:38'),
(2, 2, 1, '2018-02-22 06:39:42', '2018-02-22 06:39:42'),
(6, 3, 6, '2018-02-25 16:23:32', '2018-02-25 16:23:32'),
(7, 5, 6, '2018-02-25 16:27:07', '2018-02-25 16:27:07'),
(9, 6, 6, '2018-03-05 08:41:24', '2018-03-05 08:41:24'),
(10, 7, 6, '2018-03-05 08:41:42', '2018-03-05 08:41:42'),
(11, 9, 6, '2018-03-05 08:50:14', '2018-03-05 08:50:14'),
(12, 1, 6, '2018-03-05 08:50:36', '2018-03-05 08:50:36'),
(13, 7, 8, '2018-03-28 12:44:30', '2018-03-28 12:44:30'),
(14, 1, 8, '2018-03-28 13:37:37', '2018-03-28 13:37:37'),
(15, 9, 8, '2018-03-28 13:37:54', '2018-03-28 13:37:54'),
(16, 6, 8, '2018-03-28 13:38:14', '2018-03-28 13:38:14'),
(17, 3, 8, '2018-03-28 13:38:27', '2018-03-28 13:38:27'),
(18, 4, 8, '2018-03-28 13:38:34', '2018-03-28 13:38:34'),
(19, 11, 6, '2018-03-30 17:50:57', '2018-03-30 17:50:57'),
(20, 10, 6, '2018-03-30 17:51:21', '2018-03-30 17:51:21'),
(21, 12, 6, '2018-04-02 14:58:01', '2018-04-02 14:58:01'),
(22, 12, 9, '2018-04-02 15:17:26', '2018-04-02 15:17:26'),
(23, 14, 9, '2018-04-02 15:17:42', '2018-04-02 15:17:42'),
(24, 11, 9, '2018-04-02 15:18:21', '2018-04-02 15:18:21'),
(25, 6, 9, '2018-04-02 15:18:54', '2018-04-02 15:18:54'),
(26, 7, 9, '2018-04-02 15:19:00', '2018-04-02 15:19:00'),
(27, 4, 9, '2018-04-02 15:19:27', '2018-04-02 15:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 not yet sent/1 sent',
  `target` enum('individuals','groups') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'groups' COMMENT 'message target',
  `authorized` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` enum('notification','email','txt') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notification',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `title`, `details`, `client_id`, `user_id`, `status`, `target`, `authorized`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Weights class time change', 'Please note that tomorrow\'s weights class has been changed to 2pm due to a gym inspection. Any inconvenience is sincerely regretted.', 5, 38, '1', 'groups', '1', 'notification', '2018-02-25 16:28:23', '2018-02-25 16:28:27'),
(14, 'Welcome to Straightedge', 'This is the society', 2, 31, '1', 'groups', '1', 'notification', '2018-02-25 20:47:36', '2018-02-25 20:47:45'),
(15, 'Gyn Inspection', 'Please note that the Gym Inspection department will be conducting an inspection of the gym on Monday from 8am to 1pm, and some classes have been rescheduled as a result. Please check the noticeboard for more details.\r\n\r\nGym Management', 5, 38, '1', 'groups', '1', 'notification', '2018-02-26 09:52:17', '2018-02-26 09:52:24'),
(18, 'Survey', '<pre>Dear Body Building Class,<br /><br /><br />We will be conducting a survey from Monday to Friday next week to gather your views of the class and the instructors. Please take some time to complete the survey forms which you will find in your pigeon holes. Thanks!<br /><br />If you have problems or if you require further information, please see Tsitsi at Reception.<br /><br /><br />Gym Management</pre>', 5, 38, '1', 'groups', '1', 'notification', '2018-02-28 12:29:20', '2018-02-28 12:29:24'),
(21, 'Yet another test', '<p>Let\'s see if it works.</p>', 5, 38, '1', 'groups', '1', 'notification', '2018-02-28 18:10:53', '2018-02-28 18:10:58'),
(24, 'Ermac is loose', '<p>The spectral one has arrived</p>', 2, 31, '1', 'groups', '1', 'notification', '2018-03-01 07:38:55', '2018-03-01 07:39:07'),
(25, 'Testing', '<pre>Testing testing testing.<br />Regards.</pre>', 4, 37, '1', 'groups', '1', 'notification', '2018-03-05 08:42:52', '2018-03-05 08:43:01'),
(26, 'Another test', '<p>Following the first test, tis si teh second one.</p>\r\n<p>&nbsp;</p>\r\n<p>Please make sure you read it carefully.</p>\r\n<p>&nbsp;</p>\r\n<p>Regards.</p>', 4, 37, '1', 'groups', '1', 'notification', '2018-03-05 08:45:47', '2018-03-05 08:45:52'),
(27, '8 March test', '<p>Another one.</p>\r\n<p>&nbsp;</p>\r\n<p>Sincrerely,</p>\r\n<p>&nbsp;</p>\r\n<p>Management.</p>', 5, 38, '1', 'groups', '1', 'notification', '2018-03-08 16:34:34', '2018-03-08 16:34:42'),
(28, 'Pain or pleasure', '<p>Is this pain or pleasure</p>', 2, 31, '1', 'groups', '1', 'notification', '2018-03-08 17:06:00', '2018-03-08 17:06:46'),
(29, 'Please read', '<p>This is social so please join up</p>', 2, 31, '1', 'groups', '1', 'notification', '2018-03-27 07:37:28', '2018-03-27 07:37:37'),
(30, 'Zumba Class Fees', '<p>Dear Members,</p>\r\n<p>Please note that&nbsp;pay-as-you-go Zumba class will be increased from $5 to $6 with effect from the 1st of April 2018. If you have questions or require further information, please do not hesitate to contact us.</p>\r\n<p>Gym Management</p>', 5, 38, '1', 'groups', '1', 'notification', '2018-03-30 17:16:01', '2018-03-30 17:16:07'),
(31, 'System maintenance', '<p>Dear Subscribers,</p>\r\n<p>Please note that the Global News Group will be undergoing routine maintenance from midnight until 6am on the 6th of March.. Any inconvenience caused is sincerely regretted.</p>\r\n<p>The Editor.</p>', 4, 37, '1', 'groups', '1', 'notification', '2018-03-30 17:21:24', '2018-03-30 17:21:33'),
(32, 'Testing', '<p>Testing Harare group. Do not respond to message</p>', 6, 42, '1', 'groups', '1', 'notification', '2018-03-30 17:52:51', '2018-03-30 17:53:09'),
(33, 'April Testing', '<p>Is the logo comung through?</p>\r\n<p>Regards.</p>', 5, 38, '1', 'groups', '1', 'notification', '2018-04-02 14:35:42', '2018-04-02 14:35:52'),
(34, 'Another April Test', '<p>Can you see the logo?</p>', 4, 37, '1', 'groups', '1', 'notification', '2018-04-02 14:38:04', '2018-04-02 14:38:13'),
(35, 'Utano test', '<p>Utano test.</p>\r\n<p>Regards.</p>', 6, 42, '1', 'groups', '1', 'notification', '2018-04-02 14:47:26', '2018-04-02 14:47:31'),
(36, 'Pastors\' meeting', '<p>Please note that there is a Pastors\' meeting scheduled for this Friday 6th April.</p>\r\n<p>Regards.</p>', 8, 44, '1', 'groups', '1', 'notification', '2018-04-02 15:01:46', '2018-04-02 15:02:19'),
(37, 'Choir practice venue', '<p>Dear Choir Members,</p>\r\n<p>&nbsp;</p>\r\n<p>Please note that choir practice today will be in teh Jubulee Hall. Apologies for any inconvenience.</p>\r\n<p>Regards.</p>', 8, 44, '1', 'groups', '1', 'notification', '2018-04-02 15:05:12', '2018-04-02 15:05:37'),
(38, 'Ushers', '<p>Dear Ushers,</p>\r\n<p>&nbsp;</p>\r\n<p>Please note that the Ushers\' Refresher Training has been scheduled fro the 15th of May at the XYZ Place. Lookin forward to seeing you all there!</p>\r\n<p>Usher Leaders.</p>', 8, 44, '1', 'groups', '1', 'notification', '2018-04-02 15:20:48', '2018-04-02 15:20:52'),
(39, 'Guest Instructor', '<p>Dear Members,</p>\r\n<p>Please note that Monday\'s Extreme Aerobics class will be led by guest instructore Extremer Reemer. You do <em><strong>not</strong></em> want to miss this!</p>\r\n<p>See you there!!</p>', 5, 38, '1', 'groups', '1', 'notification', '2018-04-02 15:23:22', '2018-04-02 15:23:28'),
(40, 'My First Message', '<p>This is my first test message to you. I love to see how it works.</p>', 1, 27, '1', 'groups', '1', 'notification', '2018-04-03 01:29:25', '2018-04-03 01:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `message_reads`
--

CREATE TABLE `message_reads` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `subscriber_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_reads`
--

INSERT INTO `message_reads` (`id`, `message_id`, `status`, `subscriber_id`, `created_at`, `updated_at`) VALUES
(2, 2, '1', 6, '2018-02-25 16:28:27', '2018-03-05 08:40:38'),
(15, 15, '1', 6, '2018-02-26 09:52:24', '2018-03-05 08:40:40'),
(18, 18, '1', 6, '2018-02-28 12:29:24', '2018-03-05 08:40:42'),
(21, 21, '1', 6, '2018-02-28 18:10:58', '2018-03-05 08:40:44'),
(23, 24, '1', 1, '2018-03-01 07:39:07', '2018-03-03 11:53:31'),
(25, 25, '1', 6, '2018-03-05 08:43:01', '2018-03-05 08:49:46'),
(26, 26, '1', 6, '2018-03-05 08:45:52', '2018-03-05 08:49:47'),
(27, 27, '1', 6, '2018-03-08 16:34:42', '2018-03-08 16:35:53'),
(28, 28, '1', 1, '2018-03-08 17:06:46', '2018-03-08 18:23:11'),
(29, 29, '1', 1, '2018-03-27 07:37:37', '2018-04-02 14:32:37'),
(30, 29, '1', 6, '2018-03-27 07:37:37', '2018-03-30 17:16:40'),
(31, 30, '1', 6, '2018-03-30 17:16:07', '2018-03-30 17:16:44'),
(32, 30, '1', 8, '2018-03-30 17:16:07', '2018-03-30 18:11:27'),
(33, 31, '1', 6, '2018-03-30 17:21:33', '2018-03-30 17:23:36'),
(34, 31, '1', 8, '2018-03-30 17:21:33', '2018-03-30 18:11:15'),
(35, 32, '1', 6, '2018-03-30 17:53:09', '2018-03-30 17:53:57'),
(36, 33, '0', 6, '2018-04-02 14:35:52', '2018-04-02 14:35:52'),
(37, 33, '0', 8, '2018-04-02 14:35:52', '2018-04-02 14:35:52'),
(38, 34, '0', 6, '2018-04-02 14:38:13', '2018-04-02 14:38:13'),
(39, 34, '0', 8, '2018-04-02 14:38:13', '2018-04-02 14:38:13'),
(40, 35, '0', 6, '2018-04-02 14:47:31', '2018-04-02 14:47:31'),
(41, 37, '1', 6, '2018-04-02 15:05:37', '2018-04-02 15:05:55'),
(42, 38, '1', 9, '2018-04-02 15:20:52', '2018-04-02 15:25:03'),
(43, 39, '0', 8, '2018-04-02 15:23:28', '2018-04-02 15:23:28'),
(44, 39, '1', 9, '2018-04-02 15:23:28', '2018-04-02 15:25:12'),
(45, 40, '0', 2, '2018-04-03 01:30:34', '2018-04-03 01:30:34'),
(46, 40, '0', 6, '2018-04-03 01:30:34', '2018-04-03 01:30:34'),
(47, 40, '0', 8, '2018-04-03 01:30:34', '2018-04-03 01:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `message_settings`
--

CREATE TABLE `message_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_settings`
--

INSERT INTO `message_settings` (`id`, `name`, `description`, `status`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'express-sending', 'Send messages without authorization', '1', 1, '2018-02-05 08:30:51', '2018-02-05 08:30:51'),
(2, 'express-sending', 'Send messages without authorization', '1', 2, '2018-02-11 18:10:06', '2018-02-11 18:10:06'),
(3, 'express-sending', 'Send messages without authorization', '1', 3, '2018-02-14 10:48:44', '2018-02-14 10:48:44'),
(4, 'express-sending', 'Send messages without authorization', '1', 4, '2018-02-25 11:14:45', '2018-02-25 11:14:45'),
(5, 'express-sending', 'Send messages without authorization', '1', 5, '2018-02-25 11:18:30', '2018-02-25 11:18:30'),
(6, 'express-sending', 'Send messages without authorization', '1', 6, '2018-03-30 17:45:02', '2018-03-30 17:45:02'),
(7, 'express-sending', 'Send messages without authorization', '1', 7, '2018-04-02 13:58:39', '2018-04-02 13:58:39'),
(8, 'express-sending', 'Send messages without authorization', '1', 8, '2018-04-02 14:52:49', '2018-04-02 14:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2017_09_11_071638_user_ntrust_setup_tables', 1),
(9, '2017_09_11_164347_create_clients_table', 2),
(11, '2017_09_11_170349_create_subscribers_table', 3),
(16, '2017_09_11_182930_create_groups_table', 4),
(17, '2017_09_11_184258_create_group_subscribers_table', 4),
(18, '2017_09_11_193816_create_messages_table', 4),
(19, '2017_09_11_194517_create_message_reads_table', 4),
(20, '2017_09_12_114456_create_group_messages_table', 5),
(21, '2017_09_14_025055_create_modules_table', 6),
(22, '2017_09_14_025244_create_authorizations_table', 7),
(23, '2017_09_14_051926_create_client_users_table', 8),
(24, '2017_09_24_043357_create_client_subscribers_table', 9),
(25, '2017_09_24_145732_create_message_settings_table', 10),
(26, '2017_09_26_032633_create_events_table', 11),
(27, '2017_09_26_143302_create_event_groups_table', 12),
(28, '2017_09_28_064004_create_countries_table', 13),
(29, '2017_10_01_050154_create_group_requests_table', 14),
(30, '2018_02_05_080903_create_subscriber_tokens_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(158) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'messages', 'messages module', '2017-09-14 03:12:17', '2017-09-14 03:12:17'),
(2, 'subscribers', 'subscribers module', '2017-09-14 03:12:59', '2017-09-14 03:12:59'),
(3, 'groups', 'groups module', '2017-09-14 03:13:26', '2017-09-14 03:13:26'),
(4, 'events', 'Events Module', '2017-09-28 10:46:06', '2017-09-28 10:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00f5a4d3967984be5853c596906320241782e7e8a06acdeda31eaa23cb1dad9f98603dabbd7b7839', 30, 2, NULL, '[\"*\"]', 0, '2018-02-21 09:55:18', '2018-02-21 09:55:18', '2019-02-21 11:55:18'),
('024d8a1c7ec231788a237c9a082565e5df70b08aa89dce79f8194e0dc13575170ad7cf2ebcc024b4', 30, 2, NULL, '[\"*\"]', 0, '2018-02-14 04:58:15', '2018-02-14 04:58:15', '2019-02-14 06:58:15'),
('02c70b22979c365ad02dcacc992fc44ea629d21c3a54629873119428a30268a1f6b182cef288cd2f', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 18:19:04', '2018-02-25 18:19:04', '2019-02-25 20:19:04'),
('05037d6771db4e04eb94cd547230723aa76dbf9981f153ede258dc649eba82def319cdd6404009b8', 30, 2, NULL, '[\"*\"]', 0, '2018-02-26 09:22:57', '2018-02-26 09:22:57', '2019-02-26 11:22:57'),
('0e97877d90ef40bfe710e94ce3ad7505e7eb3028b1e276e6324d80b82663f81f1a24f0ac2915dcc6', 39, 2, NULL, '[\"*\"]', 0, '2018-03-13 13:42:24', '2018-03-13 13:42:24', '2019-03-13 15:42:24'),
('0fdc41d304bf3d5802abccd64a8e58b091d4d646a0b52cb184f0332ead7cd77e8a2428a1e713ac86', 39, 2, NULL, '[\"*\"]', 0, '2018-03-12 17:36:20', '2018-03-12 17:36:20', '2019-03-12 19:36:20'),
('181a0c8c7f7fb5a95d8f4190fbdb86d06787d78be165d6d5c13098a9e2615ae1538043b8dc1b5bce', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:38:47', '2018-02-28 17:38:47', '2019-02-28 19:38:47'),
('1904fe172e180b84daaac291f68e80984326689725da3ded6352c68b1469a1997af4e484ff008a6f', 39, 2, NULL, '[\"*\"]', 0, '2018-02-28 12:21:11', '2018-02-28 12:21:11', '2019-02-28 14:21:11'),
('1d635f3c3e349a25f60d06a204d557354531a097984f1ede679ab82b27c3545cbd0d0510b8a0a6a9', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 20:23:46', '2018-02-25 20:23:46', '2019-02-25 22:23:46'),
('1e34421900fcbcc1f1f72927888c3938f3c3a91cc0ff2615e20d71cdddd14e95ac8addf4a593943b', 30, 2, NULL, '[\"*\"]', 0, '2018-02-18 21:08:58', '2018-02-18 21:08:58', '2019-02-18 23:08:58'),
('211129cf9261a45d95a69950c09dc9f9c3acd857aca364bb33d3b262d19eedfb1990e7b3b4bddf8c', 30, 2, NULL, '[\"*\"]', 0, '2018-03-27 07:35:18', '2018-03-27 07:35:18', '2019-03-27 10:35:18'),
('2147dc12bccaa47a6d8e020345a4896bf541c614ff9bd525f9933048ab23af5335ad17925c746b70', 39, 2, NULL, '[\"*\"]', 0, '2018-03-05 08:40:12', '2018-03-05 08:40:12', '2019-03-05 10:40:12'),
('232f5ddd64e84283066753f034dd41f49bd9c9821acd46d557d3199c0cc734468bee0e59aeac52cf', 45, 2, NULL, '[\"*\"]', 0, '2018-04-02 15:24:33', '2018-04-02 15:24:33', '2019-04-02 18:24:33'),
('233b22516107a494b2abab396e6bb6b4a8f89d339e8012e32e9ada143ba59e1228489a9d821a4208', 30, 2, NULL, '[\"*\"]', 0, '2018-02-21 09:41:42', '2018-02-21 09:41:42', '2019-02-21 11:41:42'),
('263292cda1c8a5c3f1afe7cb9106eb47de8f42eb31e972acf559fc820155f4dc0e3fdec37e0bd0f0', 39, 2, NULL, '[\"*\"]', 0, '2018-02-26 10:31:20', '2018-02-26 10:31:20', '2019-02-26 12:31:20'),
('2e868b5da9aa4e7ac9a443b7d915fd1c57960801ef5e1bd3798df2d283daa78e701de3b9f3f43712', 39, 2, NULL, '[\"*\"]', 0, '2018-03-28 00:26:48', '2018-03-28 00:26:48', '2019-03-28 03:26:48'),
('2f0278a203fd1ec1fd4a5cd6e4edd18c94736619090b651157876d427ac52e9e7e88a49baffa82cf', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 21:06:11', '2018-02-28 21:06:11', '2019-02-28 23:06:11'),
('35924b54e8ee174f4edbef49af9ffd2e3de738717a00579607150363dac8ed10e0ab975b6f328d8d', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 19:03:09', '2018-02-25 19:03:09', '2019-02-25 21:03:09'),
('38359af3fa221c37a98537f65ffac8eb1474fbea1a914136c9efb1d196e5b23fb9f5b7d3141d227d', 41, 2, NULL, '[\"*\"]', 0, '2018-04-01 08:42:04', '2018-04-01 08:42:04', '2019-04-01 11:42:04'),
('38ceed080c1e72ee6ffef2e83d6c779a49d02ac342b6d3844d374c2d68d5544b5b941dd03d3838ea', 36, 2, NULL, '[\"*\"]', 0, '2018-02-25 12:33:59', '2018-02-25 12:33:59', '2019-02-25 14:33:59'),
('39c3435eab819ef9482ed55c6ae223b1b834886163fb7893541c8f71945e772eecb7d6c548e34bbe', 30, 2, NULL, '[\"*\"]', 0, '2018-02-18 21:13:00', '2018-02-18 21:13:00', '2019-02-18 23:13:00'),
('3ade71764ca11122b8ba68a1e6ba30787e73061827bba3f323d6dc386e99650dce8313cf49278197', 40, 2, NULL, '[\"*\"]', 0, '2018-03-26 09:07:30', '2018-03-26 09:07:30', '2019-03-26 12:07:30'),
('3ced9d45ebe72f8be92030564f72f7db0ae865ef674677d1ee3a88024c26dda712fc4a34bc23894d', 40, 2, NULL, '[\"*\"]', 0, '2018-03-27 05:02:08', '2018-03-27 05:02:08', '2019-03-27 08:02:08'),
('3d56c432a440cf798d0c66f86a3cb7ba7d141225514fe551abae94aff09eafbb5dfeaac0f5846843', 36, 2, NULL, '[\"*\"]', 0, '2018-02-25 12:37:58', '2018-02-25 12:37:58', '2019-02-25 14:37:58'),
('3f6bddebdda7ea40779822e7d17f4d1925795f4e3a7c18b86adbe9ddbc0f54911aa6626d1befc09b', 32, 2, NULL, '[\"*\"]', 0, '2018-02-28 12:06:34', '2018-02-28 12:06:34', '2019-02-28 14:06:34'),
('3fa32deefd88178db6bcb9e900dd8fdcc48c93510a5041e46d882a8a054ffe8b7e91586da0995b89', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:30:25', '2018-02-28 17:30:25', '2019-02-28 19:30:25'),
('4613214daf79775624b178a4c598bc046de1a39b3c8b56ce84c2af161635e15b5c3896d0a3a92679', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:08:19', '2018-02-28 17:08:19', '2019-02-28 19:08:19'),
('46953120ce81c2d205fa2d029d613763732b42befd3db5df1a32ce14c645b61cdccbd8c9a3b3e88d', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 19:57:51', '2018-02-28 19:57:51', '2019-02-28 21:57:51'),
('4a00e20cde3f9392e02f8bf87bd8d1b3ae5d4abf6cd5d7254b7a220f6b9d66c84b5b5530c6fbe6ab', 30, 2, NULL, '[\"*\"]', 0, '2018-02-14 04:58:55', '2018-02-14 04:58:55', '2019-02-14 06:58:55'),
('52558b9407fde612e822f750974d56bab315406dd92c8312bb6951ffabd10ee0e57f8344136f63bf', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 16:59:29', '2018-02-28 16:59:29', '2019-02-28 18:59:29'),
('5a216065d8dd62ff7fd95f7df18f73eaadeec0881e385d9c404e01e7b2f19a32afac7b6a3e363cf8', 30, 2, NULL, '[\"*\"]', 0, '2018-03-27 05:01:20', '2018-03-27 05:01:20', '2019-03-27 08:01:20'),
('5aa9eb83be6899a92b45834aa318041afcbd6179d5bc11a6596be8bd86aa41fba30ff3d2aa989050', 45, 2, NULL, '[\"*\"]', 0, '2018-04-02 15:10:01', '2018-04-02 15:10:01', '2019-04-02 18:10:01'),
('5aefdd8823d7fe1d5fde01c75ca42c6fc178925e6dad6c3ec2322ec32e0fac45bb6d6649759dfcdc', 39, 2, NULL, '[\"*\"]', 0, '2018-02-25 16:21:36', '2018-02-25 16:21:36', '2019-02-25 18:21:36'),
('5b77a93f8d27066207ab218d9be4d1303a791cd2390f1bbd64be64fdb42bd3fd3342835554c59dae', 30, 2, NULL, '[\"*\"]', 0, '2018-03-01 07:29:10', '2018-03-01 07:29:10', '2019-03-01 09:29:10'),
('69024bf65408b4fa23ca9e6ad85f4df17066c0f643c2a31f9fdd59eec277f1aba7fb3c0d73d9bdc7', 30, 2, NULL, '[\"*\"]', 0, '2018-03-01 09:16:46', '2018-03-01 09:16:46', '2019-03-01 11:16:46'),
('6a89b41471995678df522bd03f41a68266c8dbf818babc8262992f27f7c8c8755005c679fd947fb5', 41, 2, NULL, '[\"*\"]', 0, '2018-03-30 18:12:11', '2018-03-30 18:12:11', '2019-03-30 21:12:11'),
('7155f31a1acecb5b8ee35855a74f49a3dd10acecd32623296829c35b00c5e498156c59ff790afb83', 39, 2, NULL, '[\"*\"]', 0, '2018-02-28 12:35:54', '2018-02-28 12:35:54', '2019-02-28 14:35:54'),
('71a408a0db89f43f5fc5692df215b3e60483b76b0957a2dd8fb4c5510ed045c40c1e445d04b8f5ae', 39, 2, NULL, '[\"*\"]', 0, '2018-03-13 13:45:45', '2018-03-13 13:45:45', '2019-03-13 15:45:45'),
('79a4743664887906794dc56d201152c853289f438633a296aec3842900604766c06b98580479eb71', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:06:55', '2018-02-28 17:06:55', '2019-02-28 19:06:55'),
('7a1ec8a75d64a6b7897ab6a9a3b41457c3c6334c66e4323e18beb1310b856c2bb134d210827f0b13', 30, 2, NULL, '[\"*\"]', 0, '2018-02-14 04:49:58', '2018-02-14 04:49:58', '2019-02-14 06:49:58'),
('7df4ba1ccd9bc76f85c74776975c14d550beb3bec41ccf675d82d5bcaac7d648395b1ca730bef566', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:03:52', '2018-02-28 17:03:52', '2019-02-28 19:03:52'),
('7fc65a900e437f6b5c898c03c19a93e88daa4943855a910c7e137fcd3ae54d93a5b4887930a59db2', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 07:33:20', '2018-02-25 07:33:20', '2019-02-25 09:33:20'),
('8529719d4e28999f4fc39ea053c3d9b9789c3fdea84775181758cca9ead7a432d7d119c7f614f024', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 19:58:04', '2018-02-28 19:58:04', '2019-02-28 21:58:04'),
('8545853b9a11316ba3e32265850ff68671d236f9d921bf733cc4155087c969447499528040768783', 30, 2, NULL, '[\"*\"]', 0, '2018-03-26 04:39:23', '2018-03-26 04:39:23', '2019-03-26 07:39:23'),
('897659b400c8fdf0c41dd289b8114277fb7c36fab0a153dcfc69bf002a24696bdb896aa994f55154', 30, 2, NULL, '[\"*\"]', 0, '2018-02-26 09:16:42', '2018-02-26 09:16:42', '2019-02-26 11:16:42'),
('8dd9f4544bee50967f6610188e9229df0ff0ea1919c91a10850d85b1c206a1e8788e0e1238bc5316', 30, 2, NULL, '[\"*\"]', 0, '2018-02-26 09:16:21', '2018-02-26 09:16:21', '2019-02-26 11:16:21'),
('94807df8e5102e70b10746ce5146bc7691f11977466ef3fa202742dd86eb5ecfe8ede02cb80a2228', 30, 2, NULL, '[\"*\"]', 0, '2018-02-11 14:33:03', '2018-02-11 14:33:03', '2019-02-11 16:33:03'),
('952ed6966afdb5e930a1afb2e1a14cc41fffe8f6dacff36518c80314cbf1cd8d5df099764baaf114', 39, 2, NULL, '[\"*\"]', 0, '2018-03-08 16:23:19', '2018-03-08 16:23:19', '2019-03-08 18:23:19'),
('9683b82a4e929498f18c7dc1e02ba1d9413459fca950abbb8f1126c7037c5a12414ae77acc21fdfd', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 20:14:34', '2018-02-25 20:14:34', '2019-02-25 22:14:34'),
('9f554b9d1217875258e5672de921d1fb942676d1c7277e72f2fe4c531d60e928af8524d525fa2072', 39, 2, NULL, '[\"*\"]', 0, '2018-03-13 13:35:00', '2018-03-13 13:35:00', '2019-03-13 15:35:00'),
('a2715295444e082f034ca1aba1ed38ea862a6a38663ba7208e84f0767a785dfc69aaa394168ad869', 36, 2, NULL, '[\"*\"]', 0, '2018-02-25 12:21:08', '2018-02-25 12:21:08', '2019-02-25 14:21:08'),
('a2a62e31172b0a0c4ce12c4ed2fc8d487b245a60ac1b365fb3c99bffdd96411fd6add71b4ac55683', 30, 2, NULL, '[\"*\"]', 0, '2018-02-11 14:31:48', '2018-02-11 14:31:48', '2019-02-11 16:31:48'),
('a5c42a3e72caace8cefe175f5f4ee5e3936267ec065c08b40b13b30f4774f845e7aa46122bcb6014', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:12:33', '2018-02-28 17:12:33', '2019-02-28 19:12:33'),
('a5d8e2248442eb9aa2881f6b248aba14998c00f50e50fc56aa75d0817bed3bccbe209ebdab084d00', 39, 2, NULL, '[\"*\"]', 0, '2018-03-26 15:08:30', '2018-03-26 15:08:30', '2019-03-26 18:08:30'),
('a6dd83f8825cddbd8d35ba63c0a5bff24b94f49add5a8a3b20542c6f2c51a1b1c9ca2bcc76124706', 32, 2, NULL, '[\"*\"]', 0, '2018-02-12 06:42:58', '2018-02-12 06:42:58', '2019-02-12 08:42:58'),
('a7b4eb349c40cf1fbcbe6da1741ff01ad3c5b05272872d3ebcf058c26162dd8ad0433e5bd1d27535', 30, 2, NULL, '[\"*\"]', 0, '2018-02-21 09:42:51', '2018-02-21 09:42:51', '2019-02-21 11:42:51'),
('ab2493601203f1ba1ca12b74f669be3f05dcd3fd17f05609f0883eb681d1c8c28d747d2591367a56', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 18:25:06', '2018-02-25 18:25:06', '2019-02-25 20:25:06'),
('ac9c64a29ee819990a034b8e9b93c83d12cdefb850c548bebbe36d804fd6e9f20b04ecc025286568', 30, 2, NULL, '[\"*\"]', 0, '2018-02-26 09:49:51', '2018-02-26 09:49:51', '2019-02-26 11:49:51'),
('ad685cdfdb110b036324468c82eeab9e6b7654d60facae0448068c795422586d720deea46392ceb5', 39, 2, NULL, '[\"*\"]', 0, '2018-02-28 14:44:59', '2018-02-28 14:44:59', '2019-02-28 16:44:59'),
('b6e9291de598c4cab688a3752de430c10c7aa83f5a43842b6f45dc796ead5a3953c31dd62258fb35', 30, 2, NULL, '[\"*\"]', 0, '2018-03-01 05:16:29', '2018-03-01 05:16:29', '2019-03-01 07:16:29'),
('b90f04ce69e501f0842f81f59095a033223b7624edb7974f6eca6ca04b0ff8103f3132b8d4a46063', 36, 2, NULL, '[\"*\"]', 0, '2018-02-25 12:30:11', '2018-02-25 12:30:11', '2019-02-25 14:30:11'),
('b9b26da72259161a9208cb1d61c5f7943b959dc390e69fd72c3127113b922f72259b9a3c5d58daf2', 41, 2, NULL, '[\"*\"]', 0, '2018-03-28 11:23:36', '2018-03-28 11:23:36', '2019-03-28 14:23:36'),
('b9cf5fe14a8acb69674069abea43c0f134f91f83ffe4b98f49ca72a801810723571bdce14377042b', 30, 2, NULL, '[\"*\"]', 0, '2018-02-11 14:32:45', '2018-02-11 14:32:45', '2019-02-11 16:32:45'),
('bc6d24c4c42b367a6ba1b281a52d016e6d67dc944100ba5f4b86ffa9fc5e0c388f074d7d3eb3d7ed', 30, 2, NULL, '[\"*\"]', 0, '2018-03-07 11:24:25', '2018-03-07 11:24:25', '2019-03-07 13:24:25'),
('c5f94370099692d05647ec176ede4c83f4bb239933de92a1742686eefd411a3ca2d63c623ad752e1', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 19:03:36', '2018-02-25 19:03:36', '2019-02-25 21:03:36'),
('cbbfeaf6e39161f8be5d2a8e9b470687baf79f5aed271bdad25461bed5f78da1a3237d04e7174988', 39, 2, NULL, '[\"*\"]', 0, '2018-02-28 12:30:17', '2018-02-28 12:30:17', '2019-02-28 14:30:17'),
('cc75c7a7b2aa6f5f638f74ae9367afbf1e993bf2ccaeba4722fa1bfa979ee42bb3fdb4f1e0bf2656', 39, 2, NULL, '[\"*\"]', 0, '2018-02-28 14:44:34', '2018-02-28 14:44:34', '2019-02-28 16:44:34'),
('ccc152da5b61e272e756e07e27c951b3d382f86ab1c7e482f4c2b7d97d830714a473d6aa6594e656', 40, 2, NULL, '[\"*\"]', 0, '2018-03-27 04:58:37', '2018-03-27 04:58:37', '2019-03-27 07:58:37'),
('ce315f63349fe290b366c70a22753d8b6d077aae7475b95dae0f3bc9400d0855a6cd44aebb97cfa7', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 20:46:31', '2018-02-28 20:46:31', '2019-02-28 22:46:31'),
('cef442eb40e9721ea88e319982184f63d56367c6bb13a88f305611c9231118a5a52e6df00dbbef99', 30, 2, NULL, '[\"*\"]', 0, '2018-03-02 07:33:42', '2018-03-02 07:33:42', '2019-03-02 09:33:42'),
('d11be0e4402af3ace271c0e239fa3d8306db197562bb457d316ef0897215f781fcbb45fc2779dd0c', 39, 2, NULL, '[\"*\"]', 0, '2018-03-12 05:25:03', '2018-03-12 05:25:03', '2019-03-12 07:25:03'),
('d139d976ed2cd7bef1e5cfa925b0c61af8351075ccd0ad6ea6bbd48431deb54fcdc11bc5de29f097', 32, 2, NULL, '[\"*\"]', 0, '2018-02-26 09:20:53', '2018-02-26 09:20:53', '2019-02-26 11:20:53'),
('d3988220226315ab902d0344dc94469c1433ca1cf180411b007f44be5079a8a70aac93f15686ad5f', 36, 2, NULL, '[\"*\"]', 0, '2018-02-25 11:27:09', '2018-02-25 11:27:09', '2019-02-25 13:27:09'),
('d73e8e42b40e8a45b995fc8b0c2b81fdd094e7bff327e3164247cb52f39fb9f30a9064638b982f2d', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:24:42', '2018-02-28 17:24:42', '2019-02-28 19:24:42'),
('d87ad04013a96afe4a8a3a7c617c9b96a207ee94be58ebfc578d63954f7d695e02574edcd1952cb0', 39, 2, NULL, '[\"*\"]', 0, '2018-03-11 17:21:28', '2018-03-11 17:21:28', '2019-03-11 19:21:28'),
('dfa8760ce0b0de8c2e0aeb767d2b6eb3b3ecb5ba50a0fd1ccf7591768c92fcedcee831c90e04c40b', 39, 2, NULL, '[\"*\"]', 0, '2018-03-08 16:24:31', '2018-03-08 16:24:31', '2019-03-08 18:24:31'),
('e60fc4d261bbc3b3c892fabb052b3184a1a6ba184f342d36e4428a9226ba6ada0eba032e3760c2ed', 39, 2, NULL, '[\"*\"]', 0, '2018-03-14 11:19:47', '2018-03-14 11:19:47', '2019-03-14 13:19:47'),
('e79974bdd732fbba04114017cf46a99264caec4c76db9252fb265b555ea91af930b9791050916752', 30, 2, NULL, '[\"*\"]', 0, '2018-02-14 04:58:35', '2018-02-14 04:58:35', '2019-02-14 06:58:35'),
('e8c70ca7e87460c44596b1c7cfaf79192312eb0ebb63b0c95d9c654dee36678b67c75a8666c463e1', 39, 2, NULL, '[\"*\"]', 0, '2018-02-28 12:22:50', '2018-02-28 12:22:50', '2019-02-28 14:22:50'),
('ea512036d8c83686487dfcf03df31e40a85957f1146d8cf2f5a88e751604e91651a71aecc85a7d61', 39, 2, NULL, '[\"*\"]', 0, '2018-03-12 17:15:09', '2018-03-12 17:15:09', '2019-03-12 19:15:09'),
('ee4875fd6ea3bd86bd2bf46028a232fbe0911981c2ad4c03fdc9a75f3a0cf439db8bc6168192f4b3', 36, 2, NULL, '[\"*\"]', 0, '2018-02-25 12:05:57', '2018-02-25 12:05:57', '2019-02-25 14:05:57'),
('f2418e8cc50e8c8f5299b498a7e72b9961f80097b7f9a202603c7c930270709593081e81ab9b76e9', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 17:07:45', '2018-02-28 17:07:45', '2019-02-28 19:07:45'),
('f27b98ef6e87952195e5018b551c02c35dd98066c752e363b46130b8911546192c74f1d86d5b1451', 39, 2, NULL, '[\"*\"]', 0, '2018-03-14 11:18:46', '2018-03-14 11:18:46', '2019-03-14 13:18:46'),
('f3201e9a6a91607db47412cedd09f70b40d0a675b9b0797464468754efc79731d1cae9dd048901c3', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 20:19:35', '2018-02-25 20:19:35', '2019-02-25 22:19:35'),
('f6d826423bb4fbbd68ce79651089a66674b0a5d9b8392eca13bac322c62bf1d03cb85c903b081d98', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 20:17:23', '2018-02-25 20:17:23', '2019-02-25 22:17:23'),
('f791be0b6dd94c3d48685b1194fa9a95f9de873a06f8bee2727c35916be69f6cb331f19b1eeb7508', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 10:52:36', '2018-02-25 10:52:36', '2019-02-25 12:52:36'),
('f989e00416808fd36303c6f9857675ed68ed60d975db3316ef4ce7bc557c1683dbeb76702efc6452', 30, 2, NULL, '[\"*\"]', 0, '2018-02-28 21:24:35', '2018-02-28 21:24:35', '2019-02-28 23:24:35'),
('fbf3fbd9a3cde087d11829ee463e76a3be7f60cc87e5374815d9b755043aa61afd8daf00860fd958', 30, 2, NULL, '[\"*\"]', 0, '2018-02-25 20:17:43', '2018-02-25 20:17:43', '2019-02-25 22:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '3k5tzFpjZgKLbGxrYHMdUVg62EDizTIQ06SY5VdU', 'http://localhost', 1, 0, 0, '2017-09-11 05:38:38', '2017-09-11 05:38:38'),
(2, NULL, 'Laravel Password Grant Client', 'nQhD2uRVphdqgbNVSXqLiC8A3vzxV8qgkhikZLO8', 'http://localhost', 0, 1, 0, '2017-09-11 05:38:38', '2017-09-11 05:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-09-11 05:38:38', '2017-09-11 05:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('024c2e19f5fead6dfa8bfda12baec407bc04046aaa8300599d0a1dbf8d2df2d96ccfe3ab75d4859a', 'd73e8e42b40e8a45b995fc8b0c2b81fdd094e7bff327e3164247cb52f39fb9f30a9064638b982f2d', 0, '2019-02-28 19:24:42'),
('0520f62ee7b01d366e7ae53d31dda062a4a2750c27aa9f89a06a2d1ef7d4ce2cb875c7a1f32446f0', '8529719d4e28999f4fc39ea053c3d9b9789c3fdea84775181758cca9ead7a432d7d119c7f614f024', 0, '2019-02-28 21:58:04'),
('07606149aff615cd8b8ef86519889f72d8070111873eaa66b1397d2e11e65982398cd3b4ce4ed802', '5aa9eb83be6899a92b45834aa318041afcbd6179d5bc11a6596be8bd86aa41fba30ff3d2aa989050', 0, '2019-04-02 18:10:01'),
('0ab5995ce1063175ef25c741d8f68e73203cc9fec1b8d477341bac8cdb089c36013a42d6bdfb7294', 'bc6d24c4c42b367a6ba1b281a52d016e6d67dc944100ba5f4b86ffa9fc5e0c388f074d7d3eb3d7ed', 0, '2019-03-07 13:24:25'),
('135c72c5a2ec3cb886365bd69a413b4d2134b63ac973a2422ae847c0de633cfa9af8fe8181b38864', '1e34421900fcbcc1f1f72927888c3938f3c3a91cc0ff2615e20d71cdddd14e95ac8addf4a593943b', 0, '2019-02-18 23:08:58'),
('13b04367676541c3dd3faf2ea825772c5ae72aed85cc331489afcdcf64aa39ca7ea58e7344d2d73d', '2f0278a203fd1ec1fd4a5cd6e4edd18c94736619090b651157876d427ac52e9e7e88a49baffa82cf', 0, '2019-02-28 23:06:11'),
('163092a73bcce131b6a2fefd7421db22bbb7f5ec1a6c996eaf49559ff8e1b7ea25116bbf6ba83148', '8545853b9a11316ba3e32265850ff68671d236f9d921bf733cc4155087c969447499528040768783', 0, '2019-03-26 07:39:23'),
('1ab19a0eeb520defc7d85c92731a365e55e8c8d93f30c8c4b2e219c34ccfcec1403c21cea669e455', '38ceed080c1e72ee6ffef2e83d6c779a49d02ac342b6d3844d374c2d68d5544b5b941dd03d3838ea', 0, '2019-02-25 14:33:59'),
('1c333810caa776e9a79837585837e29bb6cfffd029477b5b5c73510a34aabbeeb515572695b9df12', '024d8a1c7ec231788a237c9a082565e5df70b08aa89dce79f8194e0dc13575170ad7cf2ebcc024b4', 0, '2019-02-14 06:58:15'),
('1cb4a0877afe1b723fb9fc0f27840d5d367436dffecee3f463414a0cc72bd89f1a8257e2a073a1a4', '5b77a93f8d27066207ab218d9be4d1303a791cd2390f1bbd64be64fdb42bd3fd3342835554c59dae', 0, '2019-03-01 09:29:10'),
('1fb0c232ff350dc1aaf52e9d50d2f906160de9257b23f24795362a9f30ca7ccb9a1cec58dcc77816', 'e60fc4d261bbc3b3c892fabb052b3184a1a6ba184f342d36e4428a9226ba6ada0eba032e3760c2ed', 0, '2019-03-14 13:19:47'),
('1fe191d56f4bd7245043f62b8341be144fe54cbdd72db4cd40bc7d2fa0ff849fb751bf90e3644614', '69024bf65408b4fa23ca9e6ad85f4df17066c0f643c2a31f9fdd59eec277f1aba7fb3c0d73d9bdc7', 0, '2019-03-01 11:16:46'),
('1fe621d374d00f49a1851175ae5ef4730fc46493ea52f05bcc500ea74119d1681eb14bbe8b23e528', '5aefdd8823d7fe1d5fde01c75ca42c6fc178925e6dad6c3ec2322ec32e0fac45bb6d6649759dfcdc', 0, '2019-02-25 18:21:36'),
('204d5d33af1dc1e121871f326a76869060e2848a2c1ac1dfd7405124351f580a3a0b5aea0ca9e3e1', '7fc65a900e437f6b5c898c03c19a93e88daa4943855a910c7e137fcd3ae54d93a5b4887930a59db2', 0, '2019-02-25 09:33:20'),
('20f250c7e644d20ec73a9846bf45f21c7050270b22b71a9efbacc46123934b0a143b0e750ea729ac', 'a2715295444e082f034ca1aba1ed38ea862a6a38663ba7208e84f0767a785dfc69aaa394168ad869', 0, '2019-02-25 14:21:08'),
('2111f7561b7dbbc37190dda789f3e7bd33cb336e58740dd59de87876ce33e363f867156ea7486533', 'f2418e8cc50e8c8f5299b498a7e72b9961f80097b7f9a202603c7c930270709593081e81ab9b76e9', 0, '2019-02-28 19:07:45'),
('23e7442eed38573053356d64dc0b6ade463bc0dcd76c92cd24e9a22ca6a09380b817eeb8487f71b9', '4613214daf79775624b178a4c598bc046de1a39b3c8b56ce84c2af161635e15b5c3896d0a3a92679', 0, '2019-02-28 19:08:19'),
('253e065c2381dc20bfb76aa7563bc38e6203d9779935fcb83b1076de71b46a95bd4a02c218bfc668', 'ce315f63349fe290b366c70a22753d8b6d077aae7475b95dae0f3bc9400d0855a6cd44aebb97cfa7', 0, '2019-02-28 22:46:31'),
('25f2d9d6fdb6fa6590ac1775d3dd10b3b4cc598e9a2fad9f144a19c4b1cb8de35247ff4aa8deb943', 'b90f04ce69e501f0842f81f59095a033223b7624edb7974f6eca6ca04b0ff8103f3132b8d4a46063', 0, '2019-02-25 14:30:11'),
('273b6d787f8ec6ffaf87d653140ef6211bbdd2e22b01cb95614f148f333d4e30441ddc20ad51c118', '7155f31a1acecb5b8ee35855a74f49a3dd10acecd32623296829c35b00c5e498156c59ff790afb83', 0, '2019-02-28 14:35:54'),
('298c326475aac23d9847c25bdd565a1810d122e93396a925632f4896570728f8186f4870bc2a0884', 'b6e9291de598c4cab688a3752de430c10c7aa83f5a43842b6f45dc796ead5a3953c31dd62258fb35', 0, '2019-03-01 07:16:29'),
('2b7a10e58359f421b8efebce65ffa3aebabe68ab9bc798cd1e72cff00b9a6be702ef7192d35c8814', '5a216065d8dd62ff7fd95f7df18f73eaadeec0881e385d9c404e01e7b2f19a32afac7b6a3e363cf8', 0, '2019-03-27 08:01:20'),
('374afab1a8d0709eb21206c3fbeed35f78f03b58fdbd9d6641e21ea5c7c65cd19de0cf5c05283a09', '52558b9407fde612e822f750974d56bab315406dd92c8312bb6951ffabd10ee0e57f8344136f63bf', 0, '2019-02-28 18:59:29'),
('3d24e43d343be97b4755e810eb89f7f941bf9ca795fb373560ecf2a82aefc19b199c23c75a21ff65', 'ea512036d8c83686487dfcf03df31e40a85957f1146d8cf2f5a88e751604e91651a71aecc85a7d61', 0, '2019-03-12 19:15:09'),
('3f14a9d7f0f8b36e4be9c19d1e1e7f4625b9130475e42b7f6793cce1d676e086afdfa85e15cdaf90', 'cbbfeaf6e39161f8be5d2a8e9b470687baf79f5aed271bdad25461bed5f78da1a3237d04e7174988', 0, '2019-02-28 14:30:17'),
('455869a50b28de047b84b9c8bc3d7e8c74144b1f23c3f2b5c15eca59bed9e18a40d47d1bd8c11a26', '211129cf9261a45d95a69950c09dc9f9c3acd857aca364bb33d3b262d19eedfb1990e7b3b4bddf8c', 0, '2019-03-27 10:35:18'),
('45903061ca9cfa388a5f19641254824300bcd5f4741a444fd864cb0ecaaf5374e9e462600adbadf3', '9683b82a4e929498f18c7dc1e02ba1d9413459fca950abbb8f1126c7037c5a12414ae77acc21fdfd', 0, '2019-02-25 22:14:34'),
('45e4ea794e654f8565a064fc03b2d9503edc7bfc920034c701ffe9c533526bae8e4788ca3cd0ca8c', 'fbf3fbd9a3cde087d11829ee463e76a3be7f60cc87e5374815d9b755043aa61afd8daf00860fd958', 0, '2019-02-25 22:17:43'),
('4b401d06c09eca24bcdf92879d67b1f4209568e1ebe9ecc09c61f548f75b9ee821b2743d2bfe6b93', 'cef442eb40e9721ea88e319982184f63d56367c6bb13a88f305611c9231118a5a52e6df00dbbef99', 0, '2019-03-02 09:33:42'),
('540e7b3f8a4a93dd3078a977db303918c3aebc9719c66c0d0b846ac4cddfca128c7452bb50ce64d1', 'f3201e9a6a91607db47412cedd09f70b40d0a675b9b0797464468754efc79731d1cae9dd048901c3', 0, '2019-02-25 22:19:35'),
('553af9b593034611020e098b93f786fd21e0afa95097535a0aeb5ca8155ec37c98760d2c17f52428', 'ac9c64a29ee819990a034b8e9b93c83d12cdefb850c548bebbe36d804fd6e9f20b04ecc025286568', 0, '2019-02-26 11:49:51'),
('55d98103db661855f9f4af21269f4093814281e41fec1f4967b89f2500c3d5743e9c681efd8eabc1', '897659b400c8fdf0c41dd289b8114277fb7c36fab0a153dcfc69bf002a24696bdb896aa994f55154', 0, '2019-02-26 11:16:42'),
('55dad07b2f1474256fee6c878b0e6e26f0e60ac650d01a675a605bbad64468d6fdb50c0d4e6c5186', '02c70b22979c365ad02dcacc992fc44ea629d21c3a54629873119428a30268a1f6b182cef288cd2f', 0, '2019-02-25 20:19:04'),
('5692852ae50ffd37a508fd06edc5f6a90913afc67921812c6cc4cc7ba497164936182aa09b5fa15c', '38359af3fa221c37a98537f65ffac8eb1474fbea1a914136c9efb1d196e5b23fb9f5b7d3141d227d', 0, '2019-04-01 11:42:04'),
('5862154af462cb26ef373315927d71903b5313c6d5318d923782394cd435ea04c238a7ac4c40d52b', '2e868b5da9aa4e7ac9a443b7d915fd1c57960801ef5e1bd3798df2d283daa78e701de3b9f3f43712', 0, '2019-03-28 03:26:48'),
('58cbabb6cce5c7fe7d769cd58666683f06105d68b6ac6f9329ce0f90f6f42961bfb3355e1ccd2a2e', 'a7b4eb349c40cf1fbcbe6da1741ff01ad3c5b05272872d3ebcf058c26162dd8ad0433e5bd1d27535', 0, '2019-02-21 11:42:51'),
('5d9d4d3a6130c6c15a46f5c022ac58f462d3400b36baa16c6e8d4576d96a2129e9660dd876069fea', '71a408a0db89f43f5fc5692df215b3e60483b76b0957a2dd8fb4c5510ed045c40c1e445d04b8f5ae', 0, '2019-03-13 15:45:45'),
('5ea8a766ef3f2511d0c923fd6dc301aa31beea395df9fc635ea9ccc2fc52aa769140b0756f37bed5', '232f5ddd64e84283066753f034dd41f49bd9c9821acd46d557d3199c0cc734468bee0e59aeac52cf', 0, '2019-04-02 18:24:33'),
('5f74c08dad51f33697405479ee88d327c655b5829841a8f8ee66d2baa669ffa7610a53142b2475f0', 'dfa8760ce0b0de8c2e0aeb767d2b6eb3b3ecb5ba50a0fd1ccf7591768c92fcedcee831c90e04c40b', 0, '2019-03-08 18:24:31'),
('5f871257f85023c323bf2340df9f2e31a9dd92632fd55a9f4245d7412ee97f61158dfce1c3a1720d', 'd139d976ed2cd7bef1e5cfa925b0c61af8351075ccd0ad6ea6bbd48431deb54fcdc11bc5de29f097', 0, '2019-02-26 11:20:53'),
('684751ede01014afb2db44f80f212303a0323bdbd0abbac28a6e31c1be46034d46b3eb28521cc758', 'ad685cdfdb110b036324468c82eeab9e6b7654d60facae0448068c795422586d720deea46392ceb5', 0, '2019-02-28 16:44:59'),
('69bb4ee0f49847d62709a9c0a7da0f42c8f505c49908db21e64897b4e3170f50b1fa1e775af15ce7', '8dd9f4544bee50967f6610188e9229df0ff0ea1919c91a10850d85b1c206a1e8788e0e1238bc5316', 0, '2019-02-26 11:16:21'),
('720cd5a3daccea2d32109a01bc9b3fe28318d1f2e6325d1e84d45c6cd2107040997066c8da488cb9', 'ee4875fd6ea3bd86bd2bf46028a232fbe0911981c2ad4c03fdc9a75f3a0cf439db8bc6168192f4b3', 0, '2019-02-25 14:05:57'),
('74b22c8ca01372a5718f54ef4b7881e5baa41d16a18fac2be916a97d87d08bc6b1446f720ae5ff89', '3ade71764ca11122b8ba68a1e6ba30787e73061827bba3f323d6dc386e99650dce8313cf49278197', 0, '2019-03-26 12:07:31'),
('7583c3b065a110d3d3ed2a6b232f9e775532a95566708c11345622bee17ff81aa9ca70ad29bde2c6', 'c5f94370099692d05647ec176ede4c83f4bb239933de92a1742686eefd411a3ca2d63c623ad752e1', 0, '2019-02-25 21:03:36'),
('7f03529a90439daa3a1a56b3eb98e4ad75402ca8235c6a84359db7c9d154dd6a7b2af551f6b8b0e8', 'd3988220226315ab902d0344dc94469c1433ca1cf180411b007f44be5079a8a70aac93f15686ad5f', 0, '2019-02-25 13:27:09'),
('812fcdd92b38f2374ef722af278112180f52e5f1e3af4b744dfec6a5d44f2a05e68562e1b26dd4ae', '3d56c432a440cf798d0c66f86a3cb7ba7d141225514fe551abae94aff09eafbb5dfeaac0f5846843', 0, '2019-02-25 14:37:58'),
('81efe0400ac39b505605be6b5b5457bda8fa0f2fc44e9e723d9b8f973db4283f11cd07f9cf889191', '35924b54e8ee174f4edbef49af9ffd2e3de738717a00579607150363dac8ed10e0ab975b6f328d8d', 0, '2019-02-25 21:03:09'),
('84e4699e921476fb94b18d44ebd1ac346944994622abf364443b735b2392524adb7c343ea87293bf', '3fa32deefd88178db6bcb9e900dd8fdcc48c93510a5041e46d882a8a054ffe8b7e91586da0995b89', 0, '2019-02-28 19:30:25'),
('87c2ec4b1d09cb5221e7eaf3d4c0db998146e23a41fc50ddefc189e8c61ce40c1d1bd2536d99bce1', 'a6dd83f8825cddbd8d35ba63c0a5bff24b94f49add5a8a3b20542c6f2c51a1b1c9ca2bcc76124706', 0, '2019-02-12 08:42:58'),
('896e104bb6d1a8e8a379d899d3e85cdd7f8da7ae8671e6a001cd2bc1b771df658f728398cafe76f1', '00f5a4d3967984be5853c596906320241782e7e8a06acdeda31eaa23cb1dad9f98603dabbd7b7839', 0, '2019-02-21 11:55:18'),
('897d8033013be785e57e074b648428c6fd31378d637e0f52fbed63c821d7672844b779f5b7b2df19', 'f27b98ef6e87952195e5018b551c02c35dd98066c752e363b46130b8911546192c74f1d86d5b1451', 0, '2019-03-14 13:18:47'),
('89f3156860952a228f557940a659c117c25c091d532fcaae751949a25b8020558e511e2734e6a734', '79a4743664887906794dc56d201152c853289f438633a296aec3842900604766c06b98580479eb71', 0, '2019-02-28 19:06:55'),
('8eb7acb6efd17e4ffd06c28286812731df2d9ea95f73c0e8417d4c7a58026824e522d0ca38531f3d', 'a5d8e2248442eb9aa2881f6b248aba14998c00f50e50fc56aa75d0817bed3bccbe209ebdab084d00', 0, '2019-03-26 18:08:30'),
('903bcbccba7714fcd9c0360608da6e064ef0b493319d40aff30bab5ec4829238d0f56c0fcf015909', '952ed6966afdb5e930a1afb2e1a14cc41fffe8f6dacff36518c80314cbf1cd8d5df099764baaf114', 0, '2019-03-08 18:23:19'),
('976e70c6b4c3aa3a77d37c6828505e71177855e13e80eca1d5e02451eaea94782059e332b7e13b56', 'd11be0e4402af3ace271c0e239fa3d8306db197562bb457d316ef0897215f781fcbb45fc2779dd0c', 0, '2019-03-12 07:25:03'),
('9ba6c8333bbbb4fad1969d2fc06dd013c2b669810503715c5578586ece5a6dce1b058a8dfda4516c', 'ccc152da5b61e272e756e07e27c951b3d382f86ab1c7e482f4c2b7d97d830714a473d6aa6594e656', 0, '2019-03-27 07:58:37'),
('9e255b3351553602ccec596db0019a695d9e4e6af261dfe9e0de11108d869a6352bc78da37dce92a', 'cc75c7a7b2aa6f5f638f74ae9367afbf1e993bf2ccaeba4722fa1bfa979ee42bb3fdb4f1e0bf2656', 0, '2019-02-28 16:44:34'),
('a20abf6d2a85474ed35eec2b567b62cfd3c04c06b58302b2766321549f53073d72aa74cdc5554d4a', '9f554b9d1217875258e5672de921d1fb942676d1c7277e72f2fe4c531d60e928af8524d525fa2072', 0, '2019-03-13 15:35:00'),
('a3b7a80e62c8748e105748ca0ca22343118e986597da654cda5cd7f0a3a8cda6a8c15d29c9fb7695', '0fdc41d304bf3d5802abccd64a8e58b091d4d646a0b52cb184f0332ead7cd77e8a2428a1e713ac86', 0, '2019-03-12 19:36:20'),
('a5f599ef507ba641480bb850348fcf559dafdaafa638affa9ff51ea89806ab29c73cc24d8eb8456f', 'f989e00416808fd36303c6f9857675ed68ed60d975db3316ef4ce7bc557c1683dbeb76702efc6452', 0, '2019-02-28 23:24:35'),
('a7a5ae80c5a4b821a327e7620110eaf0dfa8a54e3e90df372de799493bb55c98eec0f906f69c0461', 'ab2493601203f1ba1ca12b74f669be3f05dcd3fd17f05609f0883eb681d1c8c28d747d2591367a56', 0, '2019-02-25 20:25:06'),
('b02cafdd2f157287aad2e3251dacd51ac7fa74a2c23867a51e136aefcf55cd60c77fe7abf1c17dd0', '233b22516107a494b2abab396e6bb6b4a8f89d339e8012e32e9ada143ba59e1228489a9d821a4208', 0, '2019-02-21 11:41:42'),
('b634354d4c0124520d26fd577d93330a30e5ee14caf73f7b2f046dbdeaca226c2348a1adb92b6039', 'f6d826423bb4fbbd68ce79651089a66674b0a5d9b8392eca13bac322c62bf1d03cb85c903b081d98', 0, '2019-02-25 22:17:23'),
('b73f33a4f4d456009faa14dfa35a60c74c2b4c5c73ebaa503a6a8929d210e8c65cf5e6670cfe25e5', '05037d6771db4e04eb94cd547230723aa76dbf9981f153ede258dc649eba82def319cdd6404009b8', 0, '2019-02-26 11:22:57'),
('b982c9bb0373780b5a3752ec3c9df0832dd9fe5c648811afb9c408da90c843ed19531694f559f342', '7a1ec8a75d64a6b7897ab6a9a3b41457c3c6334c66e4323e18beb1310b856c2bb134d210827f0b13', 0, '2019-02-14 06:49:58'),
('bfdfbf907c86d0356221a10f52797b2bc612f04b4cfce62ad2d4852da854d8fa1bf165f6974bcc95', '0e97877d90ef40bfe710e94ce3ad7505e7eb3028b1e276e6324d80b82663f81f1a24f0ac2915dcc6', 0, '2019-03-13 15:42:24'),
('c655e913a0d59393f084ddb242839f4faddf62f053b883a6e99f23d2748faf9ada647fa1ad1e2b69', 'b9b26da72259161a9208cb1d61c5f7943b959dc390e69fd72c3127113b922f72259b9a3c5d58daf2', 0, '2019-03-28 14:23:36'),
('c82002aaaa36232d0c25f235d7c3a764dbd1bdab8650f24434b877af0ead986da881b4705cb694ba', '3ced9d45ebe72f8be92030564f72f7db0ae865ef674677d1ee3a88024c26dda712fc4a34bc23894d', 0, '2019-03-27 08:02:08'),
('c8f988645fac3e6b5e449d09b8a4b8700140ee6f2b28f08dbc40cb8fef11b4e845fdd9872207fad7', '39c3435eab819ef9482ed55c6ae223b1b834886163fb7893541c8f71945e772eecb7d6c548e34bbe', 0, '2019-02-18 23:13:00'),
('c92672356a7f1a016c79a2f491c0c911436685472d53c001f2a05b006021f2cc2d836779ce1febe7', 'a2a62e31172b0a0c4ce12c4ed2fc8d487b245a60ac1b365fb3c99bffdd96411fd6add71b4ac55683', 0, '2019-02-11 16:31:48'),
('cb39691afcdea5928b80028f8d2731d477dd5b98502e8b8cce99de32a300a2ee3e522e5c1f254b4e', 'a5c42a3e72caace8cefe175f5f4ee5e3936267ec065c08b40b13b30f4774f845e7aa46122bcb6014', 0, '2019-02-28 19:12:33'),
('cd5efe5090f6f819c61ad3cfd5098ec68b0f60d26fc763a29e27f1964a7d159f5e84234082f38fe1', 'd87ad04013a96afe4a8a3a7c617c9b96a207ee94be58ebfc578d63954f7d695e02574edcd1952cb0', 0, '2019-03-11 19:21:28'),
('d1f81752f508fddc319173a7fba5aaf0fa4b105802cf5cb8074d3d1353306e9c7df2cc4f316ab091', 'f791be0b6dd94c3d48685b1194fa9a95f9de873a06f8bee2727c35916be69f6cb331f19b1eeb7508', 0, '2019-02-25 12:52:36'),
('d45fedcabe374fbbb175124c8a53bd9c4b4fdfe069852b5bca65a4cb88055472a79b9ee3639edc69', '2147dc12bccaa47a6d8e020345a4896bf541c614ff9bd525f9933048ab23af5335ad17925c746b70', 0, '2019-03-05 10:40:12'),
('dc404c4c597c4c43413cad537a0ee7ff5a71f8d68b5f0f491a41961cedc6101f0c0c4525f98c7d77', 'e8c70ca7e87460c44596b1c7cfaf79192312eb0ebb63b0c95d9c654dee36678b67c75a8666c463e1', 0, '2019-02-28 14:22:50'),
('dfced9c17c4a631c25b3fe028f315e7bb3346d483a72697b1f4169efb17c7f962c9e09af3c1a51e0', 'b9cf5fe14a8acb69674069abea43c0f134f91f83ffe4b98f49ca72a801810723571bdce14377042b', 0, '2019-02-11 16:32:45'),
('dfe6fb0d16b8d7e59015c48bf224484dc2839f343f68a386af8252eeeefafd3d2e4ff73ce8dd114b', '3f6bddebdda7ea40779822e7d17f4d1925795f4e3a7c18b86adbe9ddbc0f54911aa6626d1befc09b', 0, '2019-02-28 14:06:34'),
('dff6b9ece00a34ff2f6a5a06d857196c1e0a56fb7d75b3323b4cab8091c994509c61c465242109f9', '1904fe172e180b84daaac291f68e80984326689725da3ded6352c68b1469a1997af4e484ff008a6f', 0, '2019-02-28 14:21:11'),
('e1a8166d4ff791aaa72c300d23d8fbf56d1d58709586408c697d9480f2d5807a64300ef5c6b11424', '263292cda1c8a5c3f1afe7cb9106eb47de8f42eb31e972acf559fc820155f4dc0e3fdec37e0bd0f0', 0, '2019-02-26 12:31:20'),
('e1b3ff6dd2436e521d697ebebf2270ac9bd3a08ed190d5ce0803050aacd266d381e4b673c78abb04', '181a0c8c7f7fb5a95d8f4190fbdb86d06787d78be165d6d5c13098a9e2615ae1538043b8dc1b5bce', 0, '2019-02-28 19:38:47'),
('e5662ba1a88e301ca1c0de554804b156da62b652baa78d003a967ca18a4ef6e2db36d2aed3c98622', 'e79974bdd732fbba04114017cf46a99264caec4c76db9252fb265b555ea91af930b9791050916752', 0, '2019-02-14 06:58:35'),
('e78cbe4b334e4dbc9ba21f42ea08484f37e1f1cf1076ca987978a69fda0f4e4d1a8ba131fc8eaf3c', '1d635f3c3e349a25f60d06a204d557354531a097984f1ede679ab82b27c3545cbd0d0510b8a0a6a9', 0, '2019-02-25 22:23:46'),
('f09b4ba128da4e2d8d6829da58bb2000f77920d8d16d5d5b8a9550ef92bce80df8667e8da39a5bc0', '94807df8e5102e70b10746ce5146bc7691f11977466ef3fa202742dd86eb5ecfe8ede02cb80a2228', 0, '2019-02-11 16:33:03'),
('f72607660112cb3e29761176385ee301b18abd4255013f64fb61f9e11324c23904dad19411f93977', '46953120ce81c2d205fa2d029d613763732b42befd3db5df1a32ce14c645b61cdccbd8c9a3b3e88d', 0, '2019-02-28 21:57:51'),
('fc53a371ec17a444ca42167ba7969ea9ab7d21c5681f2049461747bd38d2048e67cf44c0ad210c4c', '6a89b41471995678df522bd03f41a68266c8dbf818babc8262992f27f7c8c8755005c679fd947fb5', 0, '2019-03-30 21:12:11'),
('fd1fa91e6c1ad5782da923039313512cb9548f1ce05c72b51a4704621948d3907a597ae6cd2ad01c', '7df4ba1ccd9bc76f85c74776975c14d550beb3bec41ccf675d82d5bcaac7d648395b1ca730bef566', 0, '2019-02-28 19:03:52'),
('ff2972ac548aeda6ed2ce89a06e6065bc6a39d6197770ef12e892e5dd590395430994db2b7a50555', '4a00e20cde3f9392e02f8bf87bd8d1b3ae5d4abf6cd5d7254b7a220f6b9d66c84b5b5530c6fbe6ab', 0, '2019-02-14 06:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT '230',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `client_id`, `created_by`, `profile`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 30, NULL, 30, 'Web developer', 230, '2018-02-11 14:20:30', '2018-02-11 14:20:30'),
(2, 32, 1, 27, NULL, 230, '2018-02-12 06:35:38', '2018-02-12 06:35:38'),
(6, 39, NULL, 39, 'No description', 230, '2018-02-25 16:20:07', '2018-02-25 16:20:07'),
(7, 40, NULL, 40, NULL, 230, '2018-03-26 09:04:42', '2018-03-26 09:04:42'),
(8, 41, NULL, 41, NULL, 230, '2018-03-28 11:23:12', '2018-03-28 11:23:12'),
(9, 45, NULL, 45, NULL, 230, '2018-04-02 15:08:55', '2018-04-02 15:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','client','subscriber','client-assistant','admin-assistant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'subscriber',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `confirmed` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `type`, `status`, `confirmed`, `password`, `email_verification_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fradrick Charakupa', 'charakupaf@gmail.com', 'Fradrick', '0777222670', 'admin', 'active', 'yes', '$2y$10$2kA591Y2rMhJ7Tfa4j9Cc.w.mF3kzugxWzCdeac57KuunUU8aOK1i', NULL, 'EDlsM33vnoi0iKG6CCr5ighGchyET6egVpZgDH8zny48rSZgzevGIijBj6R8', '2017-09-11 06:48:09', '2018-02-05 10:08:27'),
(27, 'Tafara High', 'charaxt1@gmail.com', 'tafara', '0777375251', 'client', 'active', 'yes', '$2y$10$5yNlDOReYqYsoIJU..lbdeX/O3NSe3WMoC7.2PQ9LBdTZyTMWRDsS', NULL, 'ckhpOGqXS78aysQhX4wM1j34FdrJnCyxCc8BHHamMbqB1MLfTjP0CBynVRYK', '2018-02-05 08:30:51', '2018-02-05 08:30:51'),
(30, 'Ngoni Mudzudzu', 'ngonixtreme@yahoo.com', 'ngonix', '0774898013', 'subscriber', 'active', 'yes', '$2y$10$baGG2S4vEhHfB8In1vNtIelp.5ruCRX0Jk.XL07P8pux4D.Dq5MZi', NULL, 'CM90zsSMBenqQ79xVrrcl9yUiL6zCDfPPolUlr5pQikZq4DPWvkoPb7dYp8L', '2018-02-11 14:20:30', '2018-02-11 14:24:20'),
(31, 'Straightedge Society', 'ses@yahoo.com', 'straightedge', '0774898013', 'client', 'active', 'yes', '$2y$10$6aqvK6MhFgvqykDABIRf0eCX1tPKGmTIoB2m41fpXU/ZjYeFULPTG', NULL, 'GqF4XojbfrNYOv3aQdyyAeZIs9EklSXAc8yIC1PTfxohsgkaGC0Ldx7bzwLu', '2018-02-11 18:10:06', '2018-02-14 04:53:32'),
(32, 'Tawanda Charakupa', 'fradrick.charakupa@gmail.com', 'Tawanda.Charakupa', '0777375251', 'subscriber', 'active', 'yes', '$2y$10$xAnmld8qCGEyeBpwR5GfaevsBixPJ3H40ji0ZYhPFK1VSrM9Z6MYC', NULL, NULL, '2018-02-12 06:35:38', '2018-02-12 06:35:38'),
(33, 'Econet', 'fradrick.charakupa.merylin@gmail.com', 'econet', '0777222670', 'client', 'active', 'yes', '$2y$10$xH7/Y2K3QXeBtDti9iC8bud0dfiOfhRVJyJzLmibNMf4tJNYJBIj6', NULL, NULL, '2018-02-14 10:48:44', '2018-02-14 10:48:44'),
(37, 'Global News Group', 'ethel.bangwayo@undp.org', 'global', '+2634338850', 'client', 'active', 'yes', '$2y$10$vc1PNN6T/WIIftKt./cLYOe7mvYutySlKG/SCwS5qm4FAE4P.vaI2', NULL, 'nDsbBSWKpzJNZECXb3wlnt3d7xl5slHTwfKz5r9Y9UaU4y45GbwuhAd7r8gD', '2018-02-25 11:14:45', '2018-02-25 11:14:45'),
(38, 'Body Goals Gym', 'heather.bangwayo@aicpa-cima.com', 'bodygoals', '+2634338851', 'client', 'active', 'yes', '$2y$10$ck8zqFvZOsdNbPJLpQ7jRe.WSZXRWd2Z1fpDNTDSw7zZDM11zHWze', NULL, 'VOpcPcFztwHqsvxtd75SSx3TxvasMaQY2UbRTpKAN5cNlqqsPnSf98xUq0TY', '2018-02-25 11:18:30', '2018-02-25 11:18:30'),
(39, 'Ethel Bee', 'ethelbangwayo@hotmail.com', 'ethelb', '0778455930', 'subscriber', 'active', 'yes', '$2y$10$jOMu7udoX1aduPqb1q/BaekS1Obz12AwW4ddm516KqUZxr34fEn3.', NULL, NULL, '2018-02-25 16:20:07', '2018-02-25 16:20:07'),
(40, 'Austin Double', 'logicy2k@gmail.com', 'logic', '0774562990', 'subscriber', 'active', 'yes', '$2y$10$1x82AqTZtJES0OpzfoR24evEyNhjonOD36LZPabLL9pvp7zOnrh2.', NULL, NULL, '2018-03-26 09:04:42', '2018-03-26 09:04:42'),
(41, 'Heather', 'heatherbangwayo@gmail.com', 'Heatherrudo', '27724040390', 'subscriber', 'active', 'yes', '$2y$10$2LC.CxB0TMkZ/xf8h4L36OWfXqxq8tRy6YH1/TovEg2M60z1upSaW', NULL, NULL, '2018-03-28 11:23:12', '2018-03-28 11:23:12'),
(42, 'Utano Medical Aid Society', 'name@email.com', 'utano', '0778455930', 'client', 'active', 'yes', '$2y$10$rzIjVKVqxnmSGj3f6h9ECuaZKZUUNQRIiQiZlyK66dSdji3XUauaa', NULL, 'yCtmVTh6OoGfM54I8L2EiD2Il0A30B7oq0fCBdzQgidvMyWkSK2CLs9e5Zvx', '2018-03-30 17:45:02', '2018-04-02 14:43:16'),
(43, 'Test Client 1', 'test@example.com', 'test client 1', '0777375251', 'client', 'active', 'yes', '$2y$10$Rx/te5XGtGMkoRj6HpUP5.7/mQT1LFGUMyOAV.GIkAzVJobJbv5si', NULL, NULL, '2018-04-02 13:58:39', '2018-04-02 13:58:39'),
(44, 'Hosanna Church', 'tazvita@yahoo.co.uk', 'hosanna', '0719250207', 'client', 'active', 'yes', '$2y$10$bmT2eehpc9UFa6uFicCM7.U7o2jmbJ1QTVlj73n2/glPy1zy31onm', NULL, '8fn5EEtoojRejqT8v56nCLc9Ix7uKLlxiJDULsqoJcDfQuqp4fznyBFt1jXh', '2018-04-02 14:52:49', '2018-04-02 14:52:49'),
(45, 'Herbert Dzapata', 'herbertdzapata@gmail.com', 'herbertdzapata', '071925207', 'subscriber', 'active', 'yes', '$2y$10$BDHsWLeTzYg3zgSdTIubhOIJl1dtVQueAQrp57ZWIiU2DhtO120i.', NULL, NULL, '2018-04-02 15:08:55', '2018-04-02 15:08:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorizations`
--
ALTER TABLE `authorizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorizations_module_id_foreign` (`module_id`),
  ADD KEY `authorizations_user_id_foreign` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`),
  ADD KEY `clients_created_by_foreign` (`created_by`),
  ADD KEY `clients_country_id_foreign` (`country_id`);

--
-- Indexes for table `client_subscribers`
--
ALTER TABLE `client_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_subscribers_subscriber_id_foreign` (`subscriber_id`),
  ADD KEY `client_subscribers_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_users_user_id_foreign` (`user_id`),
  ADD KEY `client_users_client_id_foreign` (`client_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_client_id_foreign` (`client_id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_groups`
--
ALTER TABLE `event_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_groups_event_id_foreign` (`event_id`),
  ADD KEY `event_groups_group_id_foreign` (`group_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_client_id_foreign` (`client_id`),
  ADD KEY `groups_created_by_foreign` (`created_by`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_messages_message_id_foreign` (`message_id`),
  ADD KEY `group_messages_group_id_foreign` (`group_id`);

--
-- Indexes for table `group_requests`
--
ALTER TABLE `group_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_requests_subscriber_id_foreign` (`subscriber_id`),
  ADD KEY `group_requests_group_id_foreign` (`group_id`);

--
-- Indexes for table `group_subscribers`
--
ALTER TABLE `group_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`group_id`),
  ADD KEY `fk2` (`subscriber_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_client_id_foreign` (`client_id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `message_reads`
--
ALTER TABLE `message_reads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ffk_1` (`message_id`),
  ADD KEY `ffk_2` (`subscriber_id`);

--
-- Indexes for table `message_settings`
--
ALTER TABLE `message_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_settings_client_id_foreign` (`client_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`),
  ADD KEY `subscribers_client_id_foreign` (`client_id`),
  ADD KEY `subscribers_created_by_foreign` (`created_by`),
  ADD KEY `subscribers_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorizations`
--
ALTER TABLE `authorizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client_subscribers`
--
ALTER TABLE `client_subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_groups`
--
ALTER TABLE `event_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `group_requests`
--
ALTER TABLE `group_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group_subscribers`
--
ALTER TABLE `group_subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `message_reads`
--
ALTER TABLE `message_reads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `message_settings`
--
ALTER TABLE `message_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorizations`
--
ALTER TABLE `authorizations`
  ADD CONSTRAINT `authorizations_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authorizations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_subscribers`
--
ALTER TABLE `client_subscribers`
  ADD CONSTRAINT `client_subscribers_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_subscribers_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_users`
--
ALTER TABLE `client_users`
  ADD CONSTRAINT `client_users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_groups`
--
ALTER TABLE `event_groups`
  ADD CONSTRAINT `event_groups_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD CONSTRAINT `group_messages_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_messages_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_requests`
--
ALTER TABLE `group_requests`
  ADD CONSTRAINT `group_requests_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_requests_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_subscribers`
--
ALTER TABLE `group_subscribers`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_reads`
--
ALTER TABLE `message_reads`
  ADD CONSTRAINT `ffk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ffk_2` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_settings`
--
ALTER TABLE `message_settings`
  ADD CONSTRAINT `message_settings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
