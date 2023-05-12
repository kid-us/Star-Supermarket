-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopify`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TicketNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerName`, `customerEmail`, `productNo`, `TicketNo`, `country`, `phone`, `quant`, `city`, `address`, `status`, `by`, `created_at`, `updated_at`) VALUES
(1, 'Loco', 'loco@gmail.com', '48296', 'Y38579', 'ET', '0987654321', '1', 'Addis Abeba', 'Kaliti', 1, 'Lorem', '2023-03-28 05:43:12', '2023-03-28 05:43:12'),
(2, 'Loco', 'loco@gmail.com', '46077', 'O13593', 'ET', '0987654321', '3', 'Addis Abeba', 'Kaliti', 1, 'Lorem', '2023-03-28 05:52:05', '2023-03-28 05:52:05'),
(3, 'Loco', 'loco@gmail.com', '10847', 'O13593', 'ET', '0987654321', '3', 'Addis Abeba', 'Kaliti', 1, 'Lorem', '2023-03-28 05:52:06', '2023-03-28 05:52:06'),
(4, 'Loco', 'loco@gmail.com', '12439', 'O13593', 'ET', '0987654321', '1', 'Addis Abeba', 'Kaliti', 1, 'Lorem', '2023-03-28 05:52:06', '2023-03-28 05:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `role`, `username`, `email`, `sex`, `address`, `country`, `city`, `password`, `tel`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Star', 'admin@gmail.com', 'male', 'Franko', 'ET', 'Nazret', 'e10adc3949ba59abbe56e057f20f883e', '0999999999', '2023-02-09 13:49:01', '2023-02-09 13:49:01'),
(5, 'delivery', 'Lorem', 'delivery@gmail.com', 'female', 'Lideta', 'ET', 'Addis Abeba', 'e10adc3949ba59abbe56e057f20f883e', '0988888888', '2023-03-24 11:04:28', '2023-03-24 11:04:28'),
(7, 'delivery', 'Delivery 2', 'delivery2@gmail.com', 'male', 'Posta', 'ET', 'Adama', 'e10adc3949ba59abbe56e057f20f883e', '0977777777', '2023-03-24 11:22:19', '2023-03-24 11:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_11_12_145556_create_accounts_table', 1),
(11, '2022_11_22_150150_create_stores_table', 2),
(12, '2022_12_16_065946_create_customers_table', 3),
(13, '2022_12_28_135811_create_employees_table', 4),
(16, '2022_12_30_192846_create_stores_table', 5),
(17, '2023_02_09_143752_create_customers_table', 6),
(18, '2023_02_09_144143_create_users_table', 7),
(19, '2023_02_09_164111_create_employees_table', 8),
(20, '2023_02_13_093306_create_customers_table', 9),
(21, '2023_02_14_144614_create_site_table', 10),
(22, '2023_02_14_150846_create_sites_table', 11),
(23, '2023_03_28_083506_create_customers_table', 12);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageFor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sloganFor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `imageFor`, `image`, `sloganFor`, `slogan`, `created_at`, `updated_at`) VALUES
(1, 'DairyEgg', '1676535943.jpg', 'DairyEgg', 'Diary & Egg', '2023-02-14 12:10:25', '2023-02-14 12:10:25'),
(16, 'Website', '1678442276.jpg', 'Website', 'Enjoy our big sales with Quality Products,\r\nFor us, quality matters a lot!', '2023-02-15 13:23:35', '2023-02-15 13:23:35'),
(17, 'Foods', '1678445411.jpg', 'Foods', 'Foods', '2023-02-15 13:24:57', '2023-02-15 13:24:57'),
(18, 'Electronics', '1676535883.jpg', 'Electronics', 'Electronics', '2023-02-15 13:29:36', '2023-02-15 13:29:36'),
(19, 'FruitsVegetables', '1676478700.jpg', 'FruitsVegetables', 'Fruits and Vegetables', '2023-02-15 13:31:17', '2023-02-15 13:31:17'),
(22, 'Beverage', '1676535783.jpg', 'Beverage', 'Beverage', '2023-02-16 05:23:03', '2023-02-16 05:23:03'),
(23, 'HouseCleaners', '1676535812.jpg', 'HouseCleaners', 'Household & Cleaners', '2023-02-16 05:23:32', '2023-02-16 05:23:32'),
(24, 'Furnitures', '1676535853.jpg', 'Furnitures', 'Furniture\'s', '2023-02-16 05:24:13', '2023-02-16 05:24:13'),
(25, 'MeatFish', '1676536035.jpg', 'MeatFish', 'Meat & Fish', '2023-02-16 05:27:15', '2023-02-16 05:27:15'),
(26, 'HealthBeauty', '1676536070.jpg', 'HealthBeauty', 'Health & Beauty', '2023-02-16 05:27:50', '2023-02-16 05:27:50'),
(27, 'Advert', '1676537442.jpg', 'Advert', 'Shopping just got easier than before, try to order today.', '2023-02-16 05:28:52', '2023-02-16 05:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricePer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `product`, `category`, `type`, `pricePer`, `price`, `delPrice`, `productNo`, `quantity`, `description`, `image`, `sold`, `created_at`, `updated_at`) VALUES
(2, 'Mango', 'FruitsVegetables', 'Fruits', '4kg', '24', '29', '49113', '100', 'Upper Awash Agro Industry Mango fruitt  With a parrot-like beak at the fruit tip, greenish yellow skinned is a perfect blend of sweetness and tartness.\r\nIt has a rich aromatic flavour.', '1672430827.png', '0', '2022-12-30 17:07:07', '2022-12-30 17:07:07'),
(3, 'Sweet Potato', 'FruitsVegetables', 'Vegetables', '4kg', '10', '11', '48195', '100', 'With flesh colours ranging from white, orange and yellow, sweet potatoes are ovate and cylindrical with golden brown or white-brown skin and a delicious sweet flavour.\r\nWhile the white fleshed are firm, orange fleshed are softer.', '1672430946.png', '0', '2022-12-30 17:09:06', '2022-12-30 17:09:06'),
(4, 'Peas', 'FruitsVegetables', 'Vegetables', '1kg', '13', '15', '36184', '100', 'Green peas are small, spherical and greenish in colour with a crunchy texture and sweet flavour.', '1672431059.png', '0', '2022-12-30 17:10:59', '2022-12-30 17:10:59'),
(5, 'Coconut', 'FruitsVegetables', 'Fruits', '5kg', '34', '43', '22045', '100', 'Coconut a extremely steady fruit. It is a grown-up fruit of the cocos nucifera palm. The fruit is approximately spherical to oval in shape and measure between 5-10 inches in width. Its hard external husk is light green, and turns gray as the nut grown up.', '1672431239.png', '0', '2022-12-30 17:13:59', '2022-12-30 17:13:59'),
(6, 'Orange', 'FruitsVegetables', 'Fruits', '3kg', '15', '17', '37175', '100', 'Upper Awash Agro Industry Lovely, bright, reddish, glossy and smooth skinned fruits called Kinnows are hybrids and are a variety of Mandarin oranges. They are juicier and sweeter than regular oranges.', '1672431413.png', '0', '2022-12-30 17:16:53', '2022-12-30 17:16:53'),
(7, 'Beetroot', 'FruitsVegetables', 'Vegetables', '1kg', '8', '9', '33860', '100', 'These edible ruby red roots are smooth and bulbous and have the highest sugar content than any other vegetable.\r\nMostly used for Red beets lower blood pressure, promotes brain and heart health. It fights inflammation and boosts energy levels.', '1672431528.png', '0', '2022-12-30 17:18:48', '2022-12-30 17:18:48'),
(8, 'Brocolli', 'FruitsVegetables', 'Vegetables', NULL, '23', '24', '14943', '0', 'With a shape resembling that of a cauliflower, Brocollis have clusters of small, tight flower heads. These heads turn bright green on cooking and tastes slightly bitter. Broccoli prevents cancer and reduces cholesterol. Good for skin, eyes.', '1672431681.png', '100', '2022-12-30 17:21:21', '2022-12-30 18:47:32'),
(9, 'Yellow Onion', 'FruitsVegetables', 'Vegetables', '3kg', '23', '25', '11808', '100', 'Fresh and Flavored Yellow Onion. Onion can fill your kitchen with a thick spicy aroma. It is a common base vegetable in most Indian dishes, thanks to the wonderful flavor that it adds to any dish.', '1672431762.png', '0', '2022-12-30 17:22:42', '2022-12-30 17:22:42'),
(10, 'Pineapple', 'FruitsVegetables', 'Fruits', '5kg', '45', '50', '47251', '100', 'With the shape of a pine cone, the fruit is loosely fibrous and juicy with white to yellowish flesh. The edible center part is firm, leathery and sweet. Pineapples reduce the risk of macular degeneration, a disease that affects the eyes.', '1672431882.png', '0', '2022-12-30 17:24:42', '2022-12-30 17:24:42'),
(11, 'Pear', 'FruitsVegetables', 'Fruits', '4kg', '34', '38', '41214', '100', 'Superbly crisp, juicy and sweet with the thinnest skin, South African Pears is like the love child of a big green apple and a Bosc pear - round, bigger than typical pears. It has white interior with a brownish-yellow skin.', '1672431957.png', '0', '2022-12-30 17:25:57', '2022-12-30 17:25:57'),
(12, 'Cabbage', 'FruitsVegetables', 'Vegetables', '6kg', '40', '45', '44589', '100', 'With a texture of crispness and juiciness the moment you take the first bite, cabbages are sweet and grassy flavoured with dense and smooth leafy layers. Cabbage improves brain health and vision. Best for people who want to lose weight in a healthy way.', '1672432031.png', '0', '2022-12-30 17:27:11', '2022-12-30 17:27:11'),
(13, 'Zucchi', 'FruitsVegetables', 'Vegetables', '2kg', '10', '14', '28196', '100', 'Zucchini is a long, slender, cucumber-like green vegetable that is also called squash. The green variant has firm flesh and a mild flavour. .It can be lightly cooked and consumed with the peel as it contains beta-carotene and lutein.', '1672432129.png', '0', '2022-12-30 17:28:49', '2022-12-30 17:28:49'),
(14, 'Cucumber', 'FruitsVegetables', 'Vegetables', '1kg', '19', '24', '17535', '100', 'Cucumber is a variety of seedless cucumber that is longer and slimmer than other varieties and have a higher water content. They do not have a layer of wax on them, and the skin is tender when ripe.', '1672432198.png', '0', '2022-12-30 17:29:58', '2022-12-30 17:29:58'),
(15, 'Parsley', 'FruitsVegetables', 'Vegetables', NULL, '26', '34', '22264', '100', 'With a mild taste and a pleasant grassy flavor, Parsley is a fresh herb with dark-green curled leaves that resemble coriander leaves. It has decorative ruffled leaves that make it the perfect garnishing option. Source of calcium, manganese & potassium.', '1672432381.png', '0', '2022-12-30 17:33:01', '2022-12-30 17:33:01'),
(16, 'Cauliflower', 'FruitsVegetables', 'Vegetables', '6kg', '45', '50', '10099', '100', 'Cauliflower is made up of tightly bound clusters of soft, crumbly, sweet cauliflower florets that form a dense head.\r\nResembling a classic tree, the florets are attached to a central edible white trunk which is firm and tender.', '1672432432.png', '0', '2022-12-30 17:33:52', '2022-12-30 17:33:52'),
(17, 'Strawberry', 'FruitsVegetables', 'Fruits', '1kg Paked', '48', '50', '36040', '100', 'Upper Awash Agro Industry Strawberry  Extremely juicy and syrupy, these conical heart shaped fruits have seeds on the skin that give them a unique texture. With a blend of sweet-tart flavour, these are everyone\'s favourite berries.', '1672432547.png', '0', '2022-12-30 17:35:47', '2022-12-30 17:35:47'),
(18, 'Kiwi', 'FruitsVegetables', 'Fruits', '4kg', '55', '57', '26974', '100', 'Kiwis are oval shaped with a brownish outer skin. The flesh is bright green and juicy with tiny, edible black seeds. With its distinct sweet-sour taste and a pleasant smell, it tastes like strawberry and honeydew melon.', '1672432649.png', '0', '2022-12-30 17:37:29', '2022-12-30 17:37:29'),
(19, 'Collard Green', 'FruitsVegetables', 'Vegetables', NULL, '37', '45', '31972', '100', 'Collard greens are an excellent source of vitamin A, vitamin C, and calcium, a rich source of vitamin K, and a good source of iron, vitamin B-6, and magnesium. They also contain thiamin, niacin, pantothenic acid, and choline.', '1672432758.png', '0', '2022-12-30 17:39:18', '2022-12-30 17:39:18'),
(20, 'Green Beans', 'FruitsVegetables', 'Vegetables', '1kg', '12', '22', '36726', '99', 'Haricot beans are small, oval, plump and creamy-white with a mild flavour and a smooth, buttery texture.\r\nHaricot beans are great for metabolism and regulation of the sugar level of blood. A good source of many nutrients and proves to be a healthy diet.', '1672432852.png', '1', '2022-12-30 17:40:52', '2023-02-09 17:40:24'),
(21, 'Green Pepper', 'FruitsVegetables', 'Vegetables', '1kg', '7', '13', '32765', '100', 'Rich source of nutrients. Green bell peppers provide an array of vitamins and minerals. Good for gut health. Contains health-benefiting plant compounds. May promote heart and eye health. Could help you maintain a healthy body weight. Versatile and tasty.', '1672433013.png', '0', '2022-12-30 17:43:33', '2022-12-30 17:43:33'),
(22, 'Potato', 'FruitsVegetables', 'Vegetables', '4kg', '14', '19', '26903', '100', 'Freshly picked potatoes are a great choice for roasting or boiling. They give essential nutrients to your body along with high dietary fibre & carbohydrates. Combined with great taste and nutrients a vegetable is the most loved amongst households.', '1672433141.png', '0', '2022-12-30 17:45:41', '2022-12-30 17:45:41'),
(23, 'Lettuce', 'FruitsVegetables', 'Vegetables', NULL, '21', '28', '16173', '100', 'With tender, delicate and loosely packed green leaves, Lettuce gives a crunchy and fresh feel to burgers and sandwiches. Lettuce provides significant amounts of vitamins A and K. \r\nThey also provide calcium, potassium, vitamin C and folate.', '1672433225.png', '0', '2022-12-30 17:47:05', '2022-12-30 17:47:05'),
(24, 'Papaya', 'FruitsVegetables', 'Fruits', '6kg', '49', '50', '15434', '100', 'Papayas grow in tropical climates and are also known as papaws or pawpaws. Initially green and somewhat bitter in taste, papayas are butter-yellow when fully ripe and shaped like a pear.\r\nPapaya is a great source of vitamin A, B, C, and K.', '1672433308.png', '0', '2022-12-30 17:48:28', '2022-12-30 17:48:28'),
(25, 'Ginger', 'FruitsVegetables', 'Vegetables', '3kg', '34', '34', '32746', '100', 'Firm and fibrous ginger roots are stretched with multiple fingers that have light to dark tan skin and rings on it and is aromatic, spicy and pungent. The flavour gets intensified when the ginger is dried and lessens when cooked. It root treats sickness.', '1672433425.png', '0', '2022-12-30 17:50:25', '2022-12-30 17:50:25'),
(26, 'Lemon', 'FruitsVegetables', 'Fruits', '1kg', '13', '14', '14912', '100', 'With a segmented flesh that has a unique pleasant aroma and a strong sour taste, lemons are round/oval and have a yellow, texturized external peel. Lemon promotes hydration and keeps the skin healthy. Lemons are a very good source of Vitamin C.', '1672433534.png', '0', '2022-12-30 17:52:14', '2022-12-30 17:52:14'),
(27, 'Apple', 'FruitsVegetables', 'Fruits', '2kg', '49', '50', '24594', '100', 'The bright red coloured and heart shaped Red Delicious apples are crunchy, juicy and slightly sweet.\r\nRed Delicious Apples are a natural source of fibre and are fat free. They contain a wide variety of anti-oxidants and polynutrients.', '1672433612.png', '0', '2022-12-30 17:53:32', '2022-12-30 17:53:32'),
(28, 'Carrot', 'FruitsVegetables', 'Vegetables', '4kg', '12', '12', '36214', '100', 'A popular sweet-tasting root vegetable, Carrots are narrow and cone shaped. Have thick, fleshy, deeply colored root, which grows underground, and feathery green leaves that emerge above the ground. Provide the highest content of vitamin A of all others.', '1672433764.png', '0', '2022-12-30 17:56:04', '2022-12-30 17:56:04'),
(29, 'Tomato', 'FruitsVegetables', 'Vegetables', '4kg', '22', '23', '36120', '100', 'Tomato Hybrids are high-quality fruits compared to desi, local tomatoes. They contain numerous edible seeds and are red in colour due to lycopene, an anti-oxidant. Tomatoes that are cooked with a touch of oil gives more lycopene than raw ones.', '1672433880.png', '0', '2022-12-30 17:58:00', '2022-12-30 17:58:00'),
(30, 'Avocado', 'FruitsVegetables', 'Fruits', '2kg', '27', '33', '25675', '100', 'Avocados are oval shaped fruits with a thick green and a bumpy, leathery outer skin. It have a unique-texture, with a creamy and light green coloured flesh that has a buttery flavour and special aroma. Are also known as an alligator pear or butter fruit.', '1672433978.png', '0', '2022-12-30 17:59:39', '2022-12-30 17:59:39'),
(31, 'Garlic', 'FruitsVegetables', 'Vegetables', '4kg', '35', '40', '23464', '100', 'Garlic is made of several heads wrapped in thin whitish layers. They are firm and have a mild flavour. Once crushed, they emit a strong and pungent aroma. It combats sickness, including the common cold and cough. They reduce blood pressure.', '1672434091.png', '0', '2022-12-30 18:01:31', '2022-12-30 18:01:31'),
(32, 'Banana', 'FruitsVegetables', 'Fruits', '2kg', '14', '14', '24761', '100', 'Relish the soft, buttery texture of bananas that are light green and have a great fragrance and taste.\r\nThe stalks are thick and rigid. Fresh fruits are green, which revolve to a bright yellow on ripening and the flesh contains a white - ceramic colour.', '1672434185.png', '0', '2022-12-30 18:03:05', '2022-12-30 18:03:05'),
(33, 'Watermelon', 'FruitsVegetables', 'Fruits', '7kg', '37', '40', '48296', '34', 'With greenish black to smooth dark green surface, we selectively pick organically grown it from the best farms it have juicy, sweet and grainy textured flesh filled with 12% of sugar content, making it a healthy alternative to sugary carbonated drinks.', '1672434286.png', '66', '2022-12-30 18:04:46', '2023-03-28 05:43:12'),
(35, 'Samsung S22 Ultra', 'Electronics', 'mobile', NULL, '777', '799', '34058', '39', 'It\'s the first S series phone to include Samsung\'s S Pen. Specifications are top-notch including 6.8-inch Dynamic AMOLED display with 120Hz refresh rate, Snapdragon 8 Gen 1 processor, 5000mAh battery, up to 12gigs of RAM, and 1TB of storage.', '1672560926.png', '111', '2023-01-01 05:15:26', '2023-03-28 03:27:38'),
(36, 'IPhone 14 Pro Max', 'Electronics', 'mobile', NULL, '791', '800', '19936', '44', 'The iPhone 14 Pro comes with a 6.1-inch ProMotion OLED display with 1-120Hz adaptive refresh rates, Dolby Vision, and a Face ID Dynamic Island that allows Apple to utilize an always-on display feature, which dims the lock screen.', '1672563458.png', '56', '2023-01-01 05:57:38', '2023-03-28 03:15:28'),
(37, 'Hasselblad X1D-5oc', 'Electronics', 'camera', NULL, '689', NULL, '19951', '100', 'The CMOS sensors built inside Hasselblad medium format cameras deliver the best in image quality, resolution, and detail capture possible. More importantly, it\'s the size of the pixels that makes the biggest difference in image quality.', '1672563870.png', '0', '2023-01-01 06:04:30', '2023-01-01 06:04:30'),
(38, 'Leica M11', 'Electronics', 'camera', NULL, '642', '650', '21544', '100', 'Perfectly meshing timeless design with contemporary performance, the Leica M11 is a rangefinder camera featuring a revised sensor design and updated connectivity and while maintaining the familiar design of a Leica M11 camera.', '1672564004.png', '0', '2023-01-01 06:06:45', '2023-01-01 06:06:45'),
(39, 'Asus ROG G15 Ryzen7', 'Electronics', 'laptop', NULL, '750', '760', '46682', '100', 'ASUS ROG Strix G15 Ryzen 7 Octa Core AMD R7-4800H - (16 GB/1 TB SSD/Windows 11 Home/4 GB Graphics/NVIDIA GeForce RTX 3050 Ti/144 Hz) G513IE-HN040WS Gaming Laptop  (15.6 inch, Eclipse Gray, 2.10 kg, With MS Office)', '1672564175.png', '0', '2023-01-01 06:09:35', '2023-01-01 06:09:35'),
(40, 'Lenovo TB-J616X', 'Electronics', 'tablet', NULL, '654', '670', '29932', '99', 'Can also tackle laptop-level work, thanks to the optional ultrathin keyboard with built-in trackpad and shortcut keys.  Experience less lag while gaming or browsing via the MediaTek® Helio G90T Tab Octa-Core processor with up to 2.05GHz main frequency.', '1672564611.png', '1', '2023-01-01 06:16:51', '2023-02-10 13:17:28'),
(41, 'Logitech G923 Sim Racing Wheel', 'Electronics', 'gaming', NULL, '476', '485', '44172', '100', 'Logitech G923 features the latest innovation in force feedback technology that connects directly to in-game simulation engines and physics to produce higher fidelity, real-time responses.', '1672564828.png', '0', '2023-01-01 06:20:28', '2023-01-01 06:20:28'),
(42, 'PlayStation 5', 'Electronics', 'gaming', NULL, '780', '800', '49388', '99', 'Powered by an eight-core AMD Zen 2 CPU and custom AMD Radeon GPU, the PS5 is offered in two models: with and without a 4K Blu-ray drive. Supporting a 120Hz video refresh, the PS5 is considerably more powerful than the PS4 and PS4 Pro.', '1672565036.png', '1', '2023-01-01 06:23:56', '2023-02-09 17:40:24'),
(43, 'Samsung 55 TU7000 Crystal UHD', 'Electronics', 'tv', NULL, '895', '910', '27697', '100', 'Crystal UHD stands for Ultra High Definition, otherwise known as Ultra HD or UHD. Crystal UHD TVs use LCD technology to produce 4K resolution and above (3840×2160 pixels). In short, a Crystal HD TV is 4K compatible and is made with LCD technology.', '1672565336.png', '0', '2023-01-01 06:28:56', '2023-01-01 06:28:56'),
(44, 'Sony UX570 DVR', 'Electronics', 'accessories', NULL, '350', '400', '10517', '99', 'Compact digital voice recorder offering built-in and external storage, a fast-charging internal battery, and cableless USB connectivity. Model features an enlarged OLED display, a wider recording LED, and auto-recording modes for voice and music sources.', '1672565548.png', '1', '2023-01-01 06:32:28', '2023-03-10 02:46:29'),
(45, 'Samsung-Z Fold', 'Electronics', 'mobile', NULL, '725', '750', '43968', '99', 'Is is the successor of the Galaxy with 6.2-inch AMOLED front cover display and big 7.6-inch Dynamic AMOLED display with 120Hz refresh rate when unfolded. Under the inner foldable display sits Samsung\'s first under display camera with 4MP sensor.', '1672565706.png', '1', '2023-01-01 06:35:06', '2023-03-10 02:46:29'),
(46, 'iPhone 13 Pro Max', 'Electronics', 'mobile', NULL, '765', '775', '39741', '100', 'A standard rectangular shape, the screen is 5.42 inches diagonally (actual viewable area is less). iPhone 13. Super Retina XDR display. 6.1‑inch (diagonal) all‑screen OLED display. 2532‑by‑1170-pixel resolution at 460 ppi.', '1672565942.png', '0', '2023-01-01 06:39:02', '2023-01-01 06:39:02'),
(47, 'Nikon Z7II', 'Electronics', 'camera', NULL, '550', '600', '30823', '99', 'Full frame mirrorless camera for those who sweat every little detail. The ultra-high resolution of 45.7 megapixels with no optical low-pass filter. The power of dual processors. 4K Ultra HD video at 60p. The next-generation 493-point autofocus system.', '1672566112.png', '1', '2023-01-01 06:41:52', '2023-02-09 17:40:23'),
(48, 'Pentax 645Z', 'Electronics', 'camera', NULL, '371', '400', '37062', '100', 'The Pentax 645Z features a 43.8 x 32.8 mm CMOS sensor with 51.4 effective megapixels. The sensor is designed without an anti-aliasing filter to maximize sharpness and details. RAW files can be recorded at 14-bit', '1672566186.png', '0', '2023-01-01 06:43:06', '2023-01-01 06:43:06'),
(49, 'Premax 2MP AHD dome CCTV', 'Electronics', 'camera', NULL, '205', '235', '26529', '100', 'Compact size and lightweight, it is of high portability and easy to install Camera is having high-tech components, presents high and stable performance. Help to make the image clearer, and the IR design enables monitoring in dark conditions', '1672566492.png', '0', '2023-01-01 06:48:12', '2023-01-01 06:48:12'),
(50, 'Sony PlayStation 4', 'Electronics', 'gaming', NULL, '621', '700', '41338', '100', 'Uses an Accelerated Processing Unit (APU) developed by AMD in cooperation with Sony. It combines a central processing unit (CPU) and graphics processing unit (GPU), as well as other components such as a memory controller and video decoder.', '1672566752.png', '0', '2023-01-01 06:52:32', '2023-01-01 06:52:32'),
(51, 'Sony WH-1000XM4 Headphone', 'Electronics', 'gaming', NULL, '270', '290', '28341', '100', 'Wireless Noise-Cancelling get up to 30 hours of battery life with quick charging capabilities, enjoy an enhanced Smart Listening feature set, and carry conversations hands-free with speak-to-chat.', '1672566910.png', '0', '2023-01-01 06:55:10', '2023-01-01 06:55:10'),
(52, 'Logitech G413', 'Electronics', 'gaming', NULL, '134', '149', '37258', '100', 'It utilizes Logitech\'s Romer-G switches, which provide you with a balance of speed and precision, and has red LED backlighting so you can game in the dark. Moreover, built-in function keys grant you easy access to multimedia controls, lighting options.', '1672567014.png', '0', '2023-01-01 06:56:54', '2023-01-01 06:56:54'),
(53, 'Samsung Galaxy z flip', 'Electronics', 'mobile', NULL, '699', '700', '45275', '100', 'A foldable smartphone from Samsung. Introduced in 2020, the Galaxy Z Flip is one of the first devices with a foldable OLED screen. Reminiscent of the flip phone, which was the generation prior to smartphones, the Z Flip has a 12MP camera with 4K video and', '1672567103.png', '0', '2023-01-01 06:58:23', '2023-01-01 06:58:23'),
(54, 'Lenovo  Legion', 'Electronics', 'mobile', NULL, '654', '670', '42305', '100', 'Lenovo Legion Pro ; Resolution, 1080 x 2340 pixels, 19.5:9 ratio (~388 ppi density) ; Platform, OS ; Chipset, Qualcomm SM8250 Snapdragon 865 5G+ (7 nm+) ; CPU, Octa.', '1672567327.png', '0', '2023-01-01 07:02:07', '2023-01-01 07:02:07'),
(55, 'LG wing', 'Electronics', 'mobile', NULL, '610', '620', '48921', '100', 'The LG Wing 5G is an Android-based phablet manufactured by LG Electronics. The device features a swivel design where the main display can be rotated to form a T-shape, revealing a smaller secondary display.', '1672567415.png', '0', '2023-01-01 07:03:35', '2023-01-01 07:03:35'),
(56, 'Apple MacBook Pro13', 'Electronics', 'laptop', NULL, '912', '945', '28759', '99', 'Apple MacBook Pro is a macOS laptop with a 13.30-inch display that has a resolution of 2560x1600 pixels. It is powered by a Core i5 processor and it comes with 12GB of RAM. The Apple MacBook Pro packs 512GB of SSD storage.', '1672567486.png', '1', '2023-01-01 07:04:46', '2023-02-10 15:17:04'),
(57, 'MSFT Surface', 'Electronics', 'tablet', NULL, '675', '716', '34385', '100', 'The Surface Pro 9 is a thin, light, and powerful tablet that runs a full version of Windows 11, making it great for office productivity on the go. It has a laptop-sized screen, a well-built hinge to keep the tablet at a perfect angle, and two USB-C ports.', '1672567591.png', '0', '2023-01-01 07:06:31', '2023-01-01 07:06:31'),
(58, 'Dell Latitude 7480', 'Electronics', 'laptop', NULL, '1020', '1100', '34400', '100', 'Dell Latitude 7000 7480 is a Windows 10 laptop with a 14.00-inch display that has a resolution of 1366x768 pixels. It is powered by a Core i5 processor and it comes with 8GB of RAM. The Dell Latitude 7000 7480 packs 256GB of SSD storage.', '1672567796.png', '0', '2023-01-01 07:09:56', '2023-01-01 07:09:56'),
(59, 'HP Specter', 'Electronics', 'laptop', NULL, '989', '1000', '24915', '100', 'The HP Spectre x360 has long been some of the best laptops over the years, especially in the category of convertible 2-in-1. Last year\'s 14-inch model, which was excellent, has now been rebranded as the Spectre x360 13.5, still carrying the same size.', '1672567884.png', '0', '2023-01-01 07:11:24', '2023-01-01 07:11:24'),
(60, 'Logitech G333', 'Electronics', 'gaming', NULL, '189', '190', '14905', '100', 'G333 K/DA is designed specifically for the optimal gaming experience. Dual dedicated audio drivers, one for highs/mids and one for bass, provide detail-rich audio to accurately recreate the game world.', '1672567975.png', '0', '2023-01-01 07:12:55', '2023-01-01 07:12:55'),
(61, '32GB_DDR4 RAM', 'Electronics', 'accessories', NULL, '209', '210', '17848', '100', 'DDR4 is the fourth generation of DDR RAM, a type of memory commonly used in desktop and laptop computers. It was introduced in 2014, though it did not gain widespread adoption until 2016. DDR4 is designed to replace DDR3, the previous DDR standard.', '1672568039.png', '0', '2023-01-01 07:13:59', '2023-01-01 07:13:59'),
(62, 'SanDisk 4TB SSD', 'Electronics', 'accessories', NULL, '299', '300', '15299', '100', '4TB SSD boasts read and write speeds up to 2000 MB via a USB 3.2 Gen 2x2 Type-C connection. Keep files protected with 256-bit AES encryption, while IP55 dust and water resistance, drop-proofing up to 6\', and the aluminum chassis and silicon shell provide.', '1672568155.png', '0', '2023-01-01 07:15:55', '2023-01-01 07:15:55'),
(63, 'Sony 65\' 4K HDR', 'Electronics', 'tv', NULL, '999', '1010', '19807', '100', 'Intelligent TV processing technology powered by 4K HDR Processor X1 that delivers picture quality full of rich colors and detailed contrast. Reproduces over a billion accurate colors resulting in picture quality that is natural and precise.', '1672568300.png', '0', '2023-01-01 07:18:21', '2023-01-01 07:18:21'),
(64, 'LG 75\' 4K UHD', 'Electronics', 'tv', NULL, '1199', '1200', '16596', '100', 'Discover vivid color in a 4K UHD TV screen that provides four times the resolution of Full HD. Complete with picture-enhancing α7 Gen 2 Intelligent TV Processor and support for 4K Cinema HDR formats.', '1672568363.png', '0', '2023-01-01 07:19:23', '2023-01-01 07:19:23'),
(65, 'Crucial BX500 1TB SSD', 'Electronics', 'accessories', NULL, '199', '200', '38669', '100', 'This solid-state drive supports sequential read speeds up to 540 MB/s and sequential write speeds up to 500 MB/s, making it easy to transfer large files quickly. Furthermore, you can boot up your system quicker, load files quicker, and improve sys overall', '1672568461.png', '0', '2023-01-01 07:21:01', '2023-01-01 07:21:01'),
(66, 'Plantronics USB Audio Processor', 'Electronics', 'accessories', NULL, '99', '100', '39297', '100', 'The Plantronics DA80 USB Audio Processor is a USB connector cable for Plantronics QD-equipped analogue headsets. This cable is ideal for those who use their headset all day long, such as call centre workers, as it provides exceptional call quality.', '1672568546.png', '0', '2023-01-01 07:22:26', '2023-01-01 07:22:26'),
(67, 'HP 32GB Flash', 'Electronics', 'accessories', NULL, '87', '90', '42776', '100', 'Representing a beautiful blend of style and utility, the HP 32GB pen drive is an extremely useful storage option. Incorporating a simple yet sleek design, the HP 32GB pen drive comes with a simple Plug and Play operation that enhances the convenience.', '1672568657.png', '0', '2023-01-01 07:24:18', '2023-01-01 07:24:18'),
(68, 'iPhone 12 pro', 'Electronics', 'mobile', NULL, '734', '735', '26386', '100', 'The iPhone 12 family with its powerful new A14 Bionic processor, a Super Retina XDR display, a more durable Ceramic Shield front cover, and a MagSafe feature for more reliable wireless charging, and support for attachable accessories.', '1672568743.png', '0', '2023-01-01 07:25:43', '2023-01-01 07:25:43'),
(69, 'Huawei Mate 50 pro', 'Electronics', 'mobile', NULL, '825', '835', '17179', '100', 'The Huawei Mate 50 Pro comes with 6.74-inch OLED display with 120Hz refresh rate and Qualcomm Snapdragon 8+ Gen 1 processor. Specs also include 4700mAh battery with 66Wcharging speed ad Triple camera setup on the back with 50MP main sensor.', '1672568935.png', '0', '2023-01-01 07:28:55', '2023-01-01 07:28:55'),
(70, 'Motorola Razr 5G', 'Electronics', 'mobile', NULL, '754', '755', '24663', '100', 'Motorola Razr 5G flaunts a foldable build, packed with 8GB RAM, 256GB internal storage and a stunning processor setup. You are getting single cameras on the front and the back which is a bit disappointing considering the hefty price charged by the brand.', '1672569109.png', '0', '2023-01-01 07:31:49', '2023-01-01 07:31:49'),
(71, 'xiaomiMI 10 Pro', 'Electronics', 'mobile', NULL, '710', '724', '12739', '100', 'Xiaomi Mi 10 Pro mobile was launched on 13th February 2020. The phone comes with a 6.67-inch touchscreen display offering a resolution of 1080x2340 pixels. The display sports Gorilla Glass for protection. Xiaomi Mi 10 Pro is powered by a 2.84GHz octa-core', '1672569261.png', '0', '2023-01-01 07:34:21', '2023-01-01 07:34:21'),
(72, 'Logitech G402', 'Electronics', 'gaming', NULL, '167', '170', '39062', '100', 'The Logitech G402 Hyperion Fury is a great wired gaming mouse designed for FPS games. It\'s incredibly well-built, with an ergonomic shape better suited for a right-handed palm or claw grip. It has a great number of programmable buttons.', '1672569346.png', '0', '2023-01-01 07:35:46', '2023-01-01 07:35:46'),
(73, 'Logitech G240 Mouse Pad', 'Electronics', 'gaming', NULL, '57', '60', '47416', '100', 'he G240 is designed to give gamers access to enhanced sensor accuracy and precision with a surface texture meant for Logitech G mice. The rubber base is firmly bonded to the cloth to create a flexible surface that prevents the cloth from bunching up.', '1672569432.png', '0', '2023-01-01 07:37:12', '2023-01-01 07:37:12'),
(74, 'Logitech G432 Surround Sound', 'Electronics', 'gaming', NULL, '293', '300', '41524', '100', 'Hear the whole game and be heard by your teammates. G431 features 50 mm drivers, ​​DTS Headphone:X 2.0 and 6 mm mic for a complete gaming experience. DTS Headphone:X 2.01 surround sound and EQ presets are only available for Windows® OS.', '1672569544.png', '0', '2023-01-01 07:39:04', '2023-01-01 07:39:04'),
(75, 'Hisense 55\' UHD', 'Electronics', 'tv', NULL, '998', '1000', '38891', '100', '4K Ultra HD TV with sharp images and fluid motion in a 139 / 55 inch screen. HDR10 / HDR10+ / HLG for sharper contrasts and an extra-wide colour space. Cinema quality sound technology with DTS Studio Sound and Sound Special (Dolby Audio).', '1672569630.png', '0', '2023-01-01 07:40:30', '2023-01-01 07:40:30'),
(76, 'Lenovo Thinkpad L380', 'Electronics', 'laptop', NULL, '1120', '1234', '30251', '100', 'The ThinkPad L380 is a solid all-round business laptop with excellent performance, a comfy keyboard and good battery life.', '1672569700.png', '0', '2023-01-01 07:41:40', '2023-01-01 07:41:40'),
(77, 'iPad Air 4', 'Electronics', 'tablet', NULL, '576', '763', '35440', '100', 'The iPad is a touchscreen tablet PC made by Apple . The original iPad debuted in 2010. Apple has three iPad product lines: iPad, iPad mini and iPad Pro. All models are available in silver, gray and gold.', '1672570173.png', '0', '2023-01-01 07:49:33', '2023-01-01 07:49:33'),
(78, 'TCL 55\' 4K Smart Android', 'Electronics', 'tv', NULL, '989', '990', '22497', '100', 'Android TV is a smart TV platform developed by Google. It integrates TV experience with Android ecosystem and offers wide range of apps from streaming services such as Netflix and Youtube to smart home functionalities.', '1672570368.png', '0', '2023-01-01 07:52:48', '2023-01-01 07:52:48'),
(79, 'Vitron 50\' 4K Android', 'Electronics', 'tv', NULL, '987', '990', '19942', '98', 'It has a 50″ LED-backlit LED display and will upscale non-UHD content to near-4K resolution. As a smart TV, the HTC5068US- has Ethernet and Wi-Fi connectivity built-in and provides access to Netflix, YouTube, Pandora, and more.', '1672570466.png', '2', '2023-01-01 07:54:26', '2023-02-13 09:19:12'),
(80, 'Sony A7R IV', 'Electronics', 'camera', NULL, '567', '658', '23348', '100', 'he Sony a7R IV is the company\'s fourth generation, high-resolution full-frame mirrorless camera and is built around a BSI-CMOS sensor that outputs 60.2MP images. Relative to previous generations, it promises more robust build quality, refined controls.', '1672570710.png', '0', '2023-01-01 07:58:30', '2023-01-01 07:58:30'),
(81, 'SanDisk 512GB Ultra_microSD', 'Electronics', 'accessories', NULL, '199', '200', '42486', '99', 'It is perfect for recording and watching Full HD video,(2) with room for even more hours of video. (5) Transfer speeds of up to 100MB/s** ensure that you can move all your content blazingly fast—up to 1000 photos in just one minute', '1672570821.png', '1', '2023-01-01 08:00:21', '2023-02-09 17:40:24'),
(82, 'Harman Kardon', 'Electronics', 'accessories', NULL, '321', '325', '45817', '100', 'Overall audio experience, making it well suited for a variety of use cases\r\nConsistent performance at loud, soft and quiet volumes\r\nWaterproof design.', '1672570934.png', '0', '2023-01-01 08:02:14', '2023-01-01 08:02:14'),
(83, 'Egg', 'DairyEgg', NULL, '5 eggs', '45', '50', '49359', '100', 'A good source of protein (both whites/yolk). They also contain heart-healthy unsaturated fats and are a great source of important nutrients, such as vitamin B6, B12 and vitamin D', '1672572404.png', '0', '2023-01-01 08:26:44', '2023-01-01 08:26:44'),
(84, 'Almarai Milk', 'DairyEgg', NULL, '1 Piece', '75', '79', '12439', '48', 'Almarai Full Fat 100% Fresh Cow\'s Milk is a rich source of protein and calcium. Contains added vitamins and minerals that promote the health of the body. Prepared without preservatives and without milk powder.', '1672572482.png', '52', '2023-01-01 08:28:02', '2023-03-28 05:52:06'),
(85, 'Holland Butter', 'DairyEgg', NULL, '100g', '89', '90', '32668', '100', 'H.J. Wysman long-keeping canned, preserved through the addition of extra salt, has an unctuous texture and a rich, cheeselike taste. Perfect for baking. Product of Netherland.', '1672572574.png', '0', '2023-01-01 08:29:34', '2023-01-01 08:29:34'),
(86, 'Unikai Milk Full Cream', 'DairyEgg', NULL, '1 Piece', '81', '82', '17426', '100', 'Enjoy UHT Full Cream Milk – rich in vitamins & calcium along with a wholesome taste.  It is the right way to stay fit and fine, jolly and cheerful.', '1672572682.png', '0', '2023-01-01 08:31:22', '2023-01-01 08:31:22'),
(87, 'Berta Unsalted Butter', 'DairyEgg', NULL, '500g', '78', '80', '38957', '100', 'The unsalted berta butter 82% fat, guarantees superior taste with an intense flavour.', '1672572827.png', '0', '2023-01-01 08:33:47', '2023-01-01 08:33:47'),
(88, 'Nestle Cream', 'DairyEgg', NULL, '1 Piece', '99', '100', '45890', '100', 'Nestlé® Cream is made from real milk and has a creamy consistent texture making it the best solution for stuffing, spreading or adding to any dessert to get that desired light creamy feel.', '1672572895.png', '0', '2023-01-01 08:34:55', '2023-01-01 08:34:55'),
(89, 'Mama Milk', 'DairyEgg', NULL, '1 Piece', '45', '46', '45607', '100', 'Mama Milk – rich in vitamins & calcium along with a wholesome taste.  It is the right way to stay fit and fine, jolly and cheerful.', '1672573023.png', '0', '2023-01-01 08:37:03', '2023-01-01 08:37:03'),
(90, 'Sheno Lega Butter', 'DairyEgg', NULL, '1kg', '654', '670', '13636', '100', 'High Quality Vegetable Ghee Enriched With Vitamins A and D. Delicious taste: a naturally rich and buttery flavor that enhances a wide variety of foods and beverages. As versatile as it is delicious, try it drizzled over any food to upgrade your meal.', '1672588212.png', '0', '2023-01-01 12:50:12', '2023-01-01 12:50:12'),
(91, 'Shola Milk', 'DairyEgg', NULL, '1L', '35', '40', '10936', '100', 'Milk – rich in vitamins & calcium along with a wholesome taste.  It is the right way to stay fit and fine, jolly and cheerful.', '1672588387.png', '0', '2023-01-01 12:53:07', '2023-01-01 12:53:07'),
(92, 'Holland Youghurt', 'DairyEgg', NULL, '250ml', '49', '50', '10084', '100', 'We’ve perfected Ethiopian Yoghurt processing. Our Dutch manufacturing process takes the highest quality raw local milk and transforms it into a rich, tasty, creamy, and delicious yoghurt that our consumers can’t get enough of.', '1672588782.png', '0', '2023-01-01 12:59:42', '2023-01-01 12:59:42'),
(93, 'Shola Butter', 'DairyEgg', NULL, '250g', '63', NULL, '18330', '100', 'Preserved through the addition of extra salt, has an unctuous texture and a rich, cheeselike taste. Perfect for baking. Product of Netherland.', '1672588933.png', '0', '2023-01-01 13:02:13', '2023-01-01 13:02:13'),
(94, 'Margarine', 'DairyEgg', NULL, '900g', '99', '100', '28263', '100', 'Margarine consists of a water-in-fat emulsion, with tiny droplets of water dispersed uniformly throughout a fat phase in a stable solid form.', '1672589076.png', '0', '2023-01-01 13:04:36', '2023-01-01 13:04:36'),
(95, 'Yocream', 'DairyEgg', NULL, '200g', '88', NULL, '16120', '100', 'Sweet product made from fermented milk with strawberries; heat treated product\r\n\r\ndairy sweet product, heat treated. The product is meant for all people, according to their health conditions.', '1672589330.png', '0', '2023-01-01 13:08:50', '2023-01-01 13:08:50'),
(96, 'Deli Deluxe American Cheese', 'DairyEgg', NULL, '900g', '99', NULL, '14643', '100', 'Kraft Deli Deluxe American Cheese Slices are creamy, rich and full of flavor. Enjoy this sliced cheese with a mild, slightly tangy flavor and smooth texture that goes well with any meat or vegetable dish.', '1672590335.png', '0', '2023-01-01 13:25:35', '2023-01-01 13:25:35'),
(97, 'Anton Sofa', 'Furnitures', NULL, NULL, '1559', '1650', '29984', '100', 'Solid and engineered wood frame with reinforced joinery. Solid wood plinth legs in a Burnt Wax finish. All wood is kiln-dried for added durability. Webbed seat and back support. Seat firmness: Soft. On a scale of 1 to 5 (5 being the firmest), it\'s a 1.', '1672592470.png', '0', '2023-01-01 14:01:11', '2023-01-01 14:01:11'),
(98, 'Bandera Chair', 'Furnitures', NULL, NULL, '1321', NULL, '15550', '100', 'Clean, contemporary shaping and an updated weave transform all-weather wicker into something modern. This low-armed dining chair is supported by a contrasting black iron base. Safe for outdoor spaces — cover or store indoors during inclement weather.', '1672592538.png', '0', '2023-01-01 14:02:18', '2023-01-01 14:02:18'),
(99, 'Allure King Bed', 'Furnitures', NULL, NULL, '1786', '1850', '22024', '100', 'The Allure King Bed is a bronze, four-post design with a distinctly feminine feel. The flower-like shape of the posts and canopy creates a unique fluted effect. We show the Allure in a Natural Bronze finish, combined with a creamy beige upholstered.', '1672592616.png', '0', '2023-01-01 14:03:36', '2023-01-01 14:03:36'),
(100, 'Bastille Cabinet', 'Furnitures', NULL, NULL, '999', '1100', '24070', '100', 'A tasteful combination of colours and details that creates a wonderfully understated elegance that is also warm and inviting', '1672592693.png', '0', '2023-01-01 14:04:53', '2023-01-01 14:04:53'),
(101, 'Delta Pillow', 'Furnitures', NULL, NULL, '786', NULL, '24125', '100', 'It has a highly elastic natural rubber core that adapts to the neck-head line and the design prevents strain in the neck. The natural rubber core is surrounded by virgin wool and encased in Bio-Ceramic® organic cotton.', '1672592754.png', '0', '2023-01-01 14:05:54', '2023-01-01 14:05:54'),
(102, 'Avery Mirror', 'Furnitures', NULL, NULL, '549', '567', '11111', '100', 'Modern and sleek, this mirror is perfectly at home in any contemporary interior. Tropical hardwood, engineered hardwood, iron, mirrored glass. Fitted with a ready-to-hang French cleat; hanging hardware included. Wipe clean with damp cloth.', '1672592886.png', '0', '2023-01-01 14:08:06', '2023-01-01 14:08:06'),
(103, 'Canyon Barstool - Warm Bronze', 'Furnitures', NULL, NULL, '990', '1000', '47826', '100', 'The most gorgeous upholstered counter chair. It checks everything off your checklist! This McGuire Barbara Barry Canyon Barstool - Warm Bronze is the perfect kitchen addition to enjoy some late-night snacks with friends, have some wholesome conversations.', '1672593018.png', '0', '2023-01-01 14:10:18', '2023-01-01 14:10:18'),
(104, 'Couronne Chandelier', 'Furnitures', NULL, NULL, '890', NULL, '44082', '100', 'A delicate shade is suspended from four graceful \"lyre\" arms, harkening back to certain lamps designed during the Empire period. A delicate metal \"crown\" adorns the top of this simple yet elegant chandelier that is at home in both traditional & classical.', '1672593160.png', '0', '2023-01-01 14:12:40', '2023-01-01 14:12:40'),
(105, 'Cuerda Ottoman', 'Furnitures', NULL, NULL, '1232', '1539', '45391', '100', 'Cuerda Ottoman | Highlight image 1\r\nA natural fit with the Cuerda Slipper Chair, the Cuerda Ottoman features a fully woven frame with an apron and tall box cushion. It was inspired by the organic formations found in nature, including cumulus clouds.', '1672593282.png', '0', '2023-01-01 14:14:42', '2023-01-01 14:14:42'),
(106, 'Coulmn Desk', 'Furnitures', NULL, NULL, '1111', '1222', '11880', '100', 'Built from sandblasted oak, the Column Desk has a raw and refined spirit. The desk is geometric in form with organic rounded edges, angled and inset legs and a column of four drawers. Available in Morel or Char finishes', '1672593442.png', '0', '2023-01-01 14:17:22', '2023-01-01 14:17:22'),
(107, 'Balustrade  Lounge Chair', 'Furnitures', NULL, NULL, '1435', '1500', '41633', '100', 'Baker Living Room Balustrade Lounge Chair (SKU: BAA4001C) is available at Hickory Furniture Mart in Hickory, NC and nationwide. We ship anywhere in the world.', '1672593540.png', '0', '2023-01-01 14:19:00', '2023-01-01 14:19:00'),
(108, 'Tashmarine King Bed', 'Furnitures', NULL, NULL, '1890', '2000', '18024', '100', 'Baker Bedroom Tashmarine King Bed (SKU: BA3123K) is available at Hickory Furniture Mart in Hickory, NC and nationwide. We ship anywhere in the world.', '1672593635.png', '0', '2023-01-01 14:20:36', '2023-01-01 14:20:36'),
(109, 'Atlas Petite Sofa', 'Furnitures', NULL, NULL, '1675', NULL, '48583', '100', 'Baker Living Room Atlas Sofa Lounge (SKU: BA6287S) is available at Hickory Furniture Mart in Hickory, NC and nationwide. We ship anywhere in the world.', '1672593779.png', '0', '2023-01-01 14:22:59', '2023-01-01 14:22:59'),
(110, 'Brera Cabinet', 'Furnitures', NULL, NULL, '1220', '1235', '49708', '100', 'Brera line stands out for its linear but elegant character, and has a strong adaptability to all directional or semi-directional contexts, thanks to its high flexibility and the neutral colours with which it is made.', '1672593926.png', '0', '2023-01-01 14:25:26', '2023-01-01 14:25:26'),
(111, 'Verona Mirror', 'Furnitures', NULL, NULL, '989', '999', '19929', '100', 'A sophisticated venetian mirror featuring a mirrored frame measuring 8cm in width with each bevelled piece finished with a butt joint. Set apart from other frameless mirrors, the Verona features a beautiful inner silver/champagne edging.', '1672594026.png', '0', '2023-01-01 14:27:06', '2023-01-01 14:27:06'),
(112, 'Danish Cord Barstool', 'Furnitures', NULL, NULL, '1232', '1342', '16891', '100', 'Classic with a twist: inspired by the Swivel Bar and Counter Stool (O-408/T), the Danish Cord Swivel Bar and Counter Stool is contemporary in form and distinctive in design. It is marked by a refined balance of materials with a curved satin walnut seat.', '1672594107.png', '0', '2023-01-01 14:28:27', '2023-01-01 14:28:27'),
(113, 'Belgravia Lantern', 'Furnitures', NULL, NULL, '989', NULL, '36868', '100', 'Majestic Belgravia lantern is comprised of a magnificent glass sphere, encased by four rods of solid and robust brass. From the ornate finial to the unique frog collar, this wall lantern is a simply stunning example of period lighting at its very best.', '1672594224.png', '0', '2023-01-01 14:30:24', '2023-01-01 14:30:24'),
(114, 'Cabochon Club Chair', 'Furnitures', NULL, NULL, '1202', '1283', '35012', '100', 'Soft and inviting with gently rounded corners, the Cabochon Club Chair is a natural resting spot after a day of work or leisure. The chair features a heightened attention to detail, with immaculate tailoring that creates a clean silhouette on a swivel.', '1672594296.png', '0', '2023-01-01 14:31:36', '2023-01-01 14:31:36'),
(115, 'Briolette Chandelier', 'Furnitures', NULL, NULL, '999', NULL, '26635', '100', 'The Briolette pendant light by Sean Lavin features a classic teardrop shaped glass that has been hand finished with unique semi-opaque facets.', '1672594382.png', '0', '2023-01-01 14:33:02', '2023-01-01 14:33:02'),
(116, 'Camelback Sofa', 'Furnitures', NULL, NULL, '1735', NULL, '25572', '100', 'Camelback sofas are a unique and wonderful design that can be incorporated into any living space. They offer a comfortable seating experience with their deep, plush back cushions and wide armrests. This innovative design is perfect for any living space.', '1672594469.png', '0', '2023-01-01 14:34:29', '2023-01-01 14:34:29'),
(117, 'Coroso Desk', 'Furnitures', NULL, NULL, '1499', NULL, '15372', '100', 'With a lightweight footprint and a slim bar of solid bronze, the Corso Desk is a versatile piece that can be used as a modern desk or a generous nightstand. Its curved lines are wrapped in quartered figured walnut veneer.', '1672594573.png', '0', '2023-01-01 14:36:13', '2023-01-01 14:36:13'),
(118, 'Encore Pillow', 'Furnitures', NULL, NULL, '587', NULL, '26469', '100', 'The Bambi Encore Memory Foam Pillow – Cooltouch Dual Surface is encased within a removable Tencel® cover, filled with a supportive memory foam insert for superior comfort and support while you sleep.', '1672594674.png', '0', '2023-01-01 14:37:54', '2023-01-01 14:37:54'),
(119, 'Dew Drop Mirror', 'Furnitures', NULL, NULL, '465', NULL, '37722', '100', 'The Dew Drop Mirror commands attention with its large scale and unique shape that mimics a drop of water. The piece is edged in a curved frame of cast bronze.', '1672594728.png', '0', '2023-01-01 14:38:48', '2023-01-01 14:38:48'),
(120, 'Carnelian Sofa', 'Furnitures', NULL, NULL, '1892', '1920', '14892', '100', 'he ebony wood and the luxurious upholstery make the Carnelian sofa a delicate and light piece. The Carnelian lives up to its name – a gemstone of a seat.', '1672594794.png', '0', '2023-01-01 14:39:54', '2023-01-01 14:39:54'),
(121, 'Ellipse Mirror', 'Furnitures', NULL, NULL, '452', NULL, '32814', '100', 'Elliptical mirrors provide a circular aperture and profile when aligned at 45° to an incoming beam, making them especially useful and efficient in periscope applications. Newport\'s elliptical broadband metallic mirrors provide a good combination.', '1672594867.png', '0', '2023-01-01 14:41:07', '2023-01-01 14:41:07'),
(122, 'Hexagonal Dining Table', 'Furnitures', NULL, NULL, '1343', NULL, '10492', '100', 'Hexagon Dining Tables are unique six-sided tables that are sized for seating arrangements of either six or twelve people. Limited by the the six side design, hexagonal tables are sized specifically as a smaller six person design.', '1672594994.png', '0', '2023-01-01 14:43:14', '2023-01-01 14:43:14'),
(123, 'Waterfall Credenza', 'Furnitures', NULL, NULL, '1676', '1700', '14314', '100', 'A waterfall of walnut lines the curved profile of this generously scaled credenza.', '1672595105.png', '0', '2023-01-01 14:45:06', '2023-01-01 14:45:06'),
(124, 'Llano Chair', 'Furnitures', NULL, NULL, '1453', '1543', '26792', '100', 'A classic barrel chair with a rich texture and timeless organic shape. Its deep cushion is surrounded by an intricately caned frame, creating an engaging and artistic piece that offers simple luxury.', '1672595210.png', '0', '2023-01-01 14:46:50', '2023-01-01 14:46:50'),
(125, 'Querini Round Dining Table', 'Furnitures', NULL, NULL, '789', '800', '27791', '100', 'Standard Finish(es): Querica Bianca, Quercia Nera Honed Graffito marble base Wirebrushed, veneered oak top', '1672595335.png', '0', '2023-01-01 14:48:55', '2023-01-01 14:48:55'),
(126, 'SLING KING BED', 'Furnitures', NULL, NULL, '1950', '2000', '36915', '100', 'Like a sling, the mahogany base supports the finely tailored, crisp upholstery held together with artful brass dowels. This king bed is the classic example utmost refinement and sophistication.', '1672595445.png', '0', '2023-01-01 14:50:45', '2023-01-01 14:50:45'),
(127, 'Reeded Base Sofa', 'Furnitures', NULL, NULL, '1789', '1820', '34055', '100', 'Relaxed sofa with a loose back and seat. The unusual arm combines the track and saddle styles. Shaped bracket feet add height and personality.', '1672595556.png', '0', '2023-01-01 14:52:36', '2023-01-01 14:52:36'),
(128, 'Port Eliot Sofa', 'Furnitures', NULL, NULL, '1899', NULL, '38654', '100', 'An English Regency sofa with a serpentine back and superbly scrolled and tapered arms. The latter with intricate spiral volutes. The apron has a blind fretwork detail of Gothic design. Scimitar legs ending in a brass cap and caster.', '1672595622.png', '0', '2023-01-01 14:53:42', '2023-01-01 14:53:42'),
(129, 'O Floor Lamp', 'Furnitures', NULL, NULL, '564', NULL, '22324', '100', 'A floor lamp is a tall electric light which stands on the floor in a living room.', '1672595668.png', '0', '2023-01-01 14:54:28', '2023-01-01 14:54:28'),
(130, 'Taru Settee', 'Furnitures', NULL, NULL, '1453', '1500', '37864', '100', 'Taru is comfortable and welcoming, with its fully upholstered base giving it true character. The seat is also intertwined with its subtly curved backrest in a bi-material treatment. It is available as a large settee, medium settee and 1-arm settee.', '1672595757.png', '0', '2023-01-01 14:55:57', '2023-01-01 14:55:57'),
(131, 'Stella Chandelier', 'Furnitures', NULL, NULL, '783', '800', '12440', '100', 'The Stella Chandelier draws the eye, and is the perfect lighting fixture for your home. With its vertical lines that offset it smooth oval shapes, the Stella Collection draws the eye. This light fixture is available with the glass ceiling plate in a white', '1672595829.png', '0', '2023-01-01 14:57:09', '2023-01-01 14:57:09'),
(132, 'Giselle King Bed', 'Furnitures', NULL, NULL, '2100', '2300', '40645', '100', 'The Giselle Bed is graceful and statuesque, beckoning you in for effortless slumber. The piece features a subtle silhouette and sinuous lines atop solid wood feet.', '1672595916.png', '0', '2023-01-01 14:58:37', '2023-01-01 14:58:37'),
(133, 'Beaf Fillet Un-Cleaned', 'MeatFish', NULL, '10kg', '1432', NULL, '40895', '0', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636008.png', '50', '2023-01-02 02:06:48', '2023-01-03 09:33:13'),
(134, 'Beef Meat', 'MeatFish', NULL, '5kg', '782', '800', '21047', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636058.png', '0', '2023-01-02 02:07:38', '2023-01-02 02:07:38'),
(135, 'Chicken Breast', 'MeatFish', 'chicken', NULL, '231', '245', '13286', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636112.png', '0', '2023-01-02 02:08:32', '2023-01-02 02:08:32'),
(136, 'Beef Fillet Cleaned', 'MeatFish', NULL, '5kg', '876', NULL, '20323', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636162.png', '0', '2023-01-02 02:09:22', '2023-01-02 02:09:22');
INSERT INTO `stores` (`id`, `product`, `category`, `type`, `pricePer`, `price`, `delPrice`, `productNo`, `quantity`, `description`, `image`, `sold`, `created_at`, `updated_at`) VALUES
(137, 'Nile Perch', 'MeatFish', 'fish', NULL, '259', '269', '31513', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636235.png', '0', '2023-01-02 02:10:35', '2023-01-02 02:10:35'),
(138, 'Beef Heart', 'MeatFish', NULL, NULL, '342', NULL, '20615', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636286.png', '0', '2023-01-02 02:11:26', '2023-01-02 02:11:26'),
(139, 'Boneless Chicken Breast', 'MeatFish', 'chicken', NULL, '257', '287', '32367', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636364.png', '0', '2023-01-02 02:12:44', '2023-01-02 02:12:44'),
(140, 'Chicken Leg', 'MeatFish', 'chicken', NULL, '178', '180', '30259', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636415.png', '0', '2023-01-02 02:13:35', '2023-01-02 02:13:35'),
(141, 'Salmon', 'MeatFish', 'chicken', NULL, '129', NULL, '37105', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636460.png', '0', '2023-01-02 02:14:20', '2023-01-02 02:14:20'),
(142, 'Goat Meat', 'MeatFish', NULL, '10kg', '1789', NULL, '25972', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636528.png', '0', '2023-01-02 02:15:28', '2023-01-02 02:15:28'),
(143, 'Special Veal Goulash', 'MeatFish', NULL, '5kg', '453', '470', '29175', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636582.png', '0', '2023-01-02 02:16:22', '2023-01-02 02:16:22'),
(144, 'Chicken Wing', 'MeatFish', 'chicken', NULL, '199', '200', '35263', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636631.png', '0', '2023-01-02 02:17:11', '2023-01-02 02:17:11'),
(145, 'Seafood Mix', 'MeatFish', 'fish', NULL, '783', '790', '35387', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636688.png', '0', '2023-01-02 02:18:08', '2023-01-02 02:18:08'),
(146, 'Chicken Local', 'MeatFish', 'chicken', NULL, '300', NULL, '26192', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636735.png', '0', '2023-01-02 02:18:55', '2023-01-02 02:18:55'),
(147, 'Goat Back Leg', 'MeatFish', NULL, '10kg', '1999', '2000', '28990', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636791.png', '0', '2023-01-02 02:19:51', '2023-01-02 02:19:51'),
(148, 'Lamb Chops', 'MeatFish', NULL, '4kg', '189', '200', '32044', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636851.png', '0', '2023-01-02 02:20:51', '2023-01-02 02:20:51'),
(149, 'Kidney Beef', 'MeatFish', NULL, '5kg', '200', NULL, '12096', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636895.png', '0', '2023-01-02 02:21:35', '2023-01-02 02:21:35'),
(150, 'Ribs Beef', 'MeatFish', NULL, '6kg', '399', '400', '10470', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636946.png', '0', '2023-01-02 02:22:26', '2023-01-02 02:22:26'),
(151, 'Tilapia Whole', 'MeatFish', 'fish', NULL, '237', NULL, '31565', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672636996.png', '0', '2023-01-02 02:23:16', '2023-01-02 02:23:16'),
(152, 'Frozen Whole Chicken', 'MeatFish', 'chicken', NULL, '399', '400', '31908', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637047.png', '0', '2023-01-02 02:24:07', '2023-01-02 02:24:07'),
(153, 'Chopped Meat', 'MeatFish', NULL, '2kg', '149', '159', '41652', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637097.png', '0', '2023-01-02 02:24:57', '2023-01-02 02:24:57'),
(154, 'Veal Without Bone', 'MeatFish', NULL, '8kg', '676', '700', '43532', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637154.png', '0', '2023-01-02 02:25:54', '2023-01-02 02:25:54'),
(155, 'Doux Chicken Nuggets', 'MeatFish', 'chicken', NULL, '99', '100', '26361', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637194.png', '0', '2023-01-02 02:26:34', '2023-01-02 02:26:34'),
(156, 'Chicken Thigh', 'MeatFish', 'chicken', NULL, '238', '250', '10962', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637284.png', '0', '2023-01-02 02:28:04', '2023-01-02 02:28:04'),
(157, 'Siblou White Fish Fillet', 'MeatFish', 'fish', NULL, '199', '200', '45863', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637333.png', '0', '2023-01-02 02:28:53', '2023-01-02 02:28:53'),
(158, 'Tilapia Fileet', 'MeatFish', 'fish', NULL, '249', NULL, '13859', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637411.png', '0', '2023-01-02 02:30:11', '2023-01-02 02:30:11'),
(159, 'Lamb Kidney', 'MeatFish', NULL, NULL, '299', '300', '42059', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637452.png', '0', '2023-01-02 02:30:52', '2023-01-02 02:30:52'),
(160, 'Whole Lamb', 'MeatFish', NULL, '10kg', '3890', NULL, '39159', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637524.png', '0', '2023-01-02 02:32:04', '2023-01-02 02:32:04'),
(161, 'Goat Whole', 'MeatFish', NULL, '20kg', '5999', '6000', '14878', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637599.png', '0', '2023-01-02 02:33:19', '2023-01-02 02:33:19'),
(162, 'Dry Meat - Spicy Beef Snaps', 'MeatFish', NULL, NULL, '299', '300', '19171', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637638.png', '0', '2023-01-02 02:33:58', '2023-01-02 02:33:58'),
(163, 'Lamb Stomach', 'MeatFish', NULL, NULL, '199', '200', '47229', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637679.png', '0', '2023-01-02 02:34:39', '2023-01-02 02:34:39'),
(164, 'Goodburry Corned Beef', 'MeatFish', NULL, '340g', '240', '250', '38422', '50', 'Fresh Corner (Luna Export Slaughter House) produces and exports meat & offal products from healthy animals to meet customer requirement while operating in an environmental responsible manner.', '1672637743.png', '0', '2023-01-02 02:35:43', '2023-01-02 02:35:43'),
(165, 'Trash bag', 'HouseCleaners', NULL, NULL, '8', '10', '23961', '100', 'A sturdy plastic bag specifically made to store waste for collection; usually black or green in colour and excludes plastic bags that are intended for other purposes.', '1672643518.png', '0', '2023-01-02 04:11:58', '2023-01-02 04:11:58'),
(166, 'Broom', 'HouseCleaners', NULL, NULL, '13', '15', '31523', '100', 'A cleaning tool consisting of usually stiff fibers (often made of materials such as plastic, hair, or corn husks) attached to, and roughly parallel to, a cylindrical handle, the broomstick. It is thus a variety of brush with a long handle.', '1672643583.png', '0', '2023-01-02 04:13:03', '2023-01-02 04:13:03'),
(167, 'Biotol Degreaser Spray', 'HouseCleaners', NULL, '1000ml', '19', '20', '49360', '100', 'Biotol Degreaser Spray Cleaner is specially formulated to penetrate and remove tough grease & grime, leaving you with amazingly clean surfaces! Good for cleaning your back splash, stove top, kitchen counter & cabinets, oven and sink.', '1672643640.png', '0', '2023-01-02 04:14:00', '2023-01-02 04:14:00'),
(168, 'Dettol Anti-Bacterial Disinfectant', 'HouseCleaners', NULL, '450ml', '17', '20', '20886', '100', 'Dettol All-in-One Disinfectant Spray can help prevent the spread of harmful bacteria and viruses. This spray kills 99.9% of bacteria & viruses* on both hard and soft surfaces, whilst also fragrancing the air with lasting fragrance.', '1672643750.png', '0', '2023-01-02 04:15:50', '2023-01-02 04:15:50'),
(169, 'Airel', 'HouseCleaners', NULL, NULL, '7', NULL, '24310', '100', 'It dissolves easily in water. With Ariel\'s superior technology, it is hard on stains but soft in colours, giving your coloured clothes the perfect wash solution.', '1672643793.png', '0', '2023-01-02 04:16:33', '2023-01-02 04:16:33'),
(170, '555 Liquid Detergent', 'HouseCleaners', NULL, '2l', '18', NULL, '49621', '99', '555 Laundry Liquid Detergent comes with a Super active technology to give your laundry a clean and long lasting blooming fragrance after effect. Clothes remain bright and shiny with every wash.', '1672643850.png', '1', '2023-01-02 04:17:30', '2023-02-08 12:02:38'),
(171, 'Giyon Bleach', 'HouseCleaners', NULL, '1l', '15', NULL, '11662', '100', 'It contains 5% of chlorine. It is good to clean white clothes and household materials. It removes bacteria and bad smell\'s from the bathroom.', '1672643904.png', '0', '2023-01-02 04:18:24', '2023-01-02 04:18:24'),
(172, 'Dettol Healthy Clean Bathroom', 'HouseCleaners', NULL, '500ml', '21', '28', '11547', '100', 'provide easy everyday cleaning and help protect your home by killing 99.9% of germs (E. coli and Staphylococcus aureus). Dettol Healthy Clean Bathroom formula penetrates and cuts through grease and grime to help keep your kitchen surfaces clean.', '1672643984.png', '0', '2023-01-02 04:19:44', '2023-01-02 04:19:44'),
(173, 'Sponge Scouring Pad', 'HouseCleaners', NULL, 'Pkt (1x10)', '10', NULL, '43176', '100', 'The strong & scour pads help you to keep your household appliances neat & clean in every use. Just rinse with water after every use, it will dry quickly.', '1672644086.png', '0', '2023-01-02 04:21:26', '2023-01-02 04:21:26'),
(174, 'Hit', 'HouseCleaners', NULL, NULL, '12', '13', '38685', '100', 'Instant mosquito and flying insect killer spray for killing dangerous mosquitoes and houseflies by reaching even the deepest corners of your house. Kala HIT mosquito and insect killer spray is also available in lime fragrance. kills mosquietos and flies.', '1672644184.png', '0', '2023-01-02 04:23:04', '2023-01-02 04:23:04'),
(175, 'Sunlight Soap', 'HouseCleaners', NULL, NULL, '19', '25', '18178', '100', 'Sunlight Laundry Green Bar Soap A mild bar soap for handwashing, Sunlight Laundry Bar is suitable for delicate fabrics, stains, collars and cuffs. Sunlight soap has many different uses and it even removes grease from pots and pans, leaving a lasting.', '1672644249.png', '0', '2023-01-02 04:24:09', '2023-01-02 04:24:09'),
(176, 'Stainless Steel Scrubber', 'HouseCleaners', NULL, NULL, '19', '20', '49526', '100', 'The main function of stainless steel scrubbers is decontamination, for that kind of stubborn dirt which can not be removed by detergent or spatula.', '1672644304.png', '0', '2023-01-02 04:25:04', '2023-01-02 04:25:04'),
(177, 'Viva', 'HouseCleaners', NULL, NULL, '7', '10', '48694', '100', 'VIVA® Multi-use Cleaning Towel is a versatile, absorbent and durable paper towel ideal for a wide range of cleaning jobs. VIVA®\'s unique Quick Clean Texture helps makes cleaning easy, from soiled stovetops and benchtops, to gunky bathrooms, muddy boots.', '1672644370.png', '0', '2023-01-02 04:26:10', '2023-01-02 04:26:10'),
(178, 'Maxell Magic Floor', 'HouseCleaners', NULL, '1.5l', '29', '30', '33694', '100', 'Gives a sparkling touch to the floor. It also leaves behind a strong scent that eliminates bad odors and keeps the place fragrant. This Maxell floor cleaner contains a powerful infusion of antibacterial formula that eliminates insects and bacteria.', '1672644528.png', '0', '2023-01-02 04:28:48', '2023-01-02 04:28:48'),
(179, 'Crown Detergent Powder', 'HouseCleaners', NULL, NULL, '9', NULL, '17583', '100', 'Strong a type of detergent (cleaning agent) used for cleaning dirty laundry (clothes). Laundry detergent is manufactured in powder (washing powder) and liquid form.', '1672644704.png', '0', '2023-01-02 04:31:44', '2023-01-02 04:31:44'),
(180, 'Plastic Garbage Bag', 'HouseCleaners', NULL, NULL, '5', NULL, '10206', '100', 'Black Plastic Garbage Bag ... A garbage bag or trash bag is a disposable bag used to contain rubbish or trash. Such bags are useful to line the insides of waste.', '1672644782.png', '0', '2023-01-02 04:33:02', '2023-01-02 04:33:02'),
(181, '555 Laundry Soap', 'HouseCleaners', NULL, '250g', '19', NULL, '26518', '100', '555 Laundry Liquid Detergent comes with a Super active technology to give your laundry a clean and long lasting blooming fragrance after effect.', '1672644858.png', '0', '2023-01-02 04:34:18', '2023-01-02 04:34:18'),
(182, 'Kitchen Towel', 'HouseCleaners', NULL, '200-sheets', '18', NULL, '43879', '100', 'Freshee presents a range of high quality premium tissues that offer a fresh, soft and hygienic experience; Made with 100% virgin fibre', '1672644933.png', '0', '2023-01-02 04:35:33', '2023-01-02 04:35:33'),
(183, 'Namaye Window Cleaner', 'HouseCleaners', NULL, '1l', '17', NULL, '45313', '100', 'Washes and cleans windows which are at considerable heights or not easily accessible for outside cleaning; may act as a lead worker or supervise employees engaged in such work, applying sound supervisory principles and techniques in building.', '1672645015.png', '0', '2023-01-02 04:36:55', '2023-01-02 04:36:55'),
(184, 'Sun Rubber Gloves', 'HouseCleaners', NULL, NULL, '29', '30', '32809', '100', 'It is used for working with most of the resist oils, acids, detergents and chemicals.', '1672645090.png', '0', '2023-01-02 04:38:10', '2023-01-02 04:38:10'),
(185, 'Super Gel surface cleaner', 'HouseCleaners', NULL, '1kg', '28', NULL, '20482', '100', 'It will clean the surface perfectly for a long time leaving a refreshing scent, providing protection from insects.', '1672645151.png', '0', '2023-01-02 04:39:11', '2023-01-02 04:39:11'),
(186, 'Master Lemon & Lime Fragrance', 'HouseCleaners', NULL, '5l', '89', '90', '20836', '100', 'Powerful plant based pH balanced formulation for sparkling clean dishes. Kinder to your skin and suitable for those with sensitive or allergic skin.', '1672645263.png', '0', '2023-01-02 04:41:03', '2023-01-02 04:41:03'),
(187, 'Maxell Magic Oven Cleaner', 'HouseCleaners', NULL, '5ooml', '28', '30', '38865', '100', 'This product has a unique scouring foam formula that emulsifies baked on messes inside the oven so you can clean less and do more.', '1672645346.png', '0', '2023-01-02 04:42:26', '2023-01-02 04:42:26'),
(188, 'Dettol', 'HouseCleaners', NULL, '500ml', '43', NULL, '10538', '100', 'Dettol Liquid is a effective concentrated antiseptic solution that kills bacteria and provides protection against the germs which can cause infection and illness. It can be used for gentle antiseptic wound cleansing and antiseptic skin cleansing.', '1672646053.png', '0', '2023-01-02 04:54:13', '2023-01-02 04:54:13'),
(189, 'Lifebuoy', 'HealthBeauty', NULL, '175g', '7', '10', '46077', '42', 'Lifebuoy soap was first introduced to the world as a soap to fight the spread of germs. A 175g soap bar that leaves you feeling clean and fresh, for skin cleansing or as a hand wash or hand sanitizer.', '1672646322.png', '58', '2023-01-02 04:58:42', '2023-03-28 05:52:06'),
(190, 'L\'Oreal Liquid Lipstick', 'HealthBeauty', NULL, NULL, '54', '55', '25388', '100', 'L\'Oreal Paris Rouge Signature Matte Liquid Lipstick is a collection of ultra-matte lip inks that combine unapologetically bold colour with a super-lightweight finish, for the ultimate bare-lip sensation.', '1672646416.png', '0', '2023-01-02 05:00:16', '2023-01-02 05:00:16'),
(191, 'Lux Soap', 'HealthBeauty', NULL, '70g', '17', NULL, '46607', '100', 'The Lux Soft Touch Soap bar adds a touch of allure to your skin. This mild soap is not only effective against dust and sweat, but is also gentle on your skin. It has a subtle fragrance that makes you feel fresh all day long.', '1672646480.png', '0', '2023-01-02 05:01:20', '2023-01-02 05:01:20'),
(192, 'Colgate Triple Action', 'HealthBeauty', NULL, NULL, '13', '15', '31644', '100', 'Colgate® Triple Action is a cavity-protection toothpaste, whitening toothpaste and breath freshener all in one. This anti-cavity fluoride toothpaste helps strengthen tooth enamel and protects against cavities.', '1672646548.png', '0', '2023-01-02 05:02:28', '2023-01-02 05:02:28'),
(193, 'Dr.Rashel Charcoal Whitening', 'HealthBeauty', NULL, NULL, '48', '50', '18593', '100', 'Dr.Rashel Charcoal Whitening Toothpaste is a product from Dr.Rashel, a trusted name in the cosmetic and health industry. First of all, their products are certified. Hence, these are safe and 100% genuine.', '1672646609.png', '0', '2023-01-02 05:03:29', '2023-01-02 05:03:29'),
(194, 'Mac Eye Shadow', 'HealthBeauty', NULL, NULL, '64', NULL, '38170', '100', 'Indulges a high-pigment formula for rich and dramatic colour. It is non-comedogenic and easy to blend; it is also suitable for use on both wet and dry eyes for effortless application.', '1672646675.png', '0', '2023-01-02 05:04:35', '2023-01-02 05:04:35'),
(195, 'MAC 9 Eye Shadow Palatte', 'HealthBeauty', NULL, NULL, '78', '80', '43625', '100', 'indulges a high-pigment formula for rich and dramatic colour. It is non-comedogenic and easy to blend; it is also suitable for use on both wet and dry eyes for effortless application.', '1672646754.png', '0', '2023-01-02 05:05:54', '2023-01-02 05:05:54'),
(196, 'Gillette Mach3 Turbo Men\'s Razor', 'HealthBeauty', NULL, '4pcs', '23', '25', '19596', '100', 'Built for precision and made for comfort, features stronger-than-steel blades that stay sharper longer (vs. Sensor3). With sharper blades (first 2 blades vs. Sensor3), it is engineered to last 15 comfortable shaves.', '1672646844.png', '0', '2023-01-02 05:07:25', '2023-01-02 05:07:25'),
(197, 'Sunsilk Shampo & Conditioner', 'HealthBeauty', NULL, NULL, '22', '25', '29213', '100', 'Sunsilk Nourishing Soft & Smooth Shampoo nourishes hair deeply, and makes it beautifully soft and smooth. It contains Argan oil, Babasu oil, Almond oil, Camellia oil & Coconut Oil to nourish your hair.', '1672647012.png', '0', '2023-01-02 05:10:12', '2023-01-02 05:10:12'),
(198, 'MAC Matte Liquid Lipstick', 'HealthBeauty', NULL, NULL, '57', '60', '25265', '100', 'A lip colour that provides a splash of colour in a liquid-suede finish that lingers. What it does: This lip colour is for those who prefer timeless glamour to all-out flash, matte reigns supreme. MAC introduces a twist on this classic texture with robust.', '1672647128.png', '0', '2023-01-02 05:12:08', '2023-01-02 05:12:08'),
(199, 'Dove', 'HealthBeauty', NULL, NULL, '9', '11', '49853', '96', 'Dove Beauty Bar has mild cleansers to effectively wash away dirt and germs and care beautifully. Made with our ¼ moisturizing cream, Dove Beauty Bar leaves your body, face and hands feeling soft, smooth, and radiant. You can see why we call it a Beauty.', '1672647230.png', '4', '2023-01-02 05:13:50', '2023-02-16 11:19:03'),
(200, 'Ear sticks Ultra Compact', 'HealthBeauty', NULL, '100pc', '21', NULL, '18260', '92', 'Ultra-Compact cotton buds, that are made of absolutely pure cotton, ensures soft touch on the outer ear. 100% natural earbuds provide safe cleaning. Ear sticks do not break or move in the ear canal.', '1672647285.png', '8', '2023-01-02 05:14:45', '2023-02-13 09:18:26'),
(201, 'MAC Chapstick', 'HealthBeauty', NULL, NULL, '45', '55', '34920', '100', 'This glossy tinted lip balm kisses lips with a playful pop of everyday colour – while a nourishing blend of shea butter and mango- and jojoba-seed oils instantly soothe, smooth and hydrate.', '1672647359.png', '0', '2023-01-02 05:15:59', '2023-01-02 05:15:59'),
(202, 'Hobby Spring Flower', 'HealthBeauty', NULL, NULL, '25', NULL, '40603', '100', 'Composed of Jasmin and rose fragrance, Hobby Flower Garden makes your hands smell wonderfully nice.\r\nKeep away from direct sunlight. Its special formula protects the natural moisture level of your skin and softens your hands.', '1672647455.png', '0', '2023-01-02 05:17:35', '2023-01-02 05:17:35'),
(203, 'Duru Natural Olive Soap', 'HealthBeauty', NULL, '250g', '13', '15', '27275', '100', 'Infused with Olive and other precious oils for a skin that\'s clean, soft and nourished. Duru Natural Olive invites you to the natural purity thanks to its 100% natural ingredients. The natural fragrance provides hygiene while refreshing your hands.', '1672647535.png', '0', '2023-01-02 05:18:55', '2023-01-02 05:18:55'),
(204, 'MAC Eyeliner', 'HealthBeauty', NULL, NULL, '43', '44', '44635', '100', 'This rich liquid eye liner combines long-lasting wear with a non-smudge, non-flake precision line. The long-wearing, transfer-resistant, and waterproof formula glides on effortlessly and is applied with its own brush to draw a perfectly defined line.', '1672647601.png', '0', '2023-01-02 05:20:01', '2023-01-02 05:20:01'),
(205, 'Nivea Cocoavaseline', 'HealthBeauty', NULL, NULL, '8', '10', '36749', '100', 'Vaseline Intensive Care Cocoa Radiant body lotion is clinically proven to moisturise deeply and soothe dry skin within the first application, and to keep it healed for 3 weeks*. The micro-droplets of Vaseline Jelly penetrate deep down to form a protective', '1672647716.png', '0', '2023-01-02 05:21:56', '2023-01-02 05:21:56'),
(206, 'MAC Foundation', 'HealthBeauty', NULL, NULL, '42', '44', '37248', '100', 'What type of foundation is MAC?\r\nMAC Pro Full Coverage Foundation is a cream foundation that comes in a compact packaging. It leaves your skin looking fresh and dewy. One swipe of this foundation covers spots, acne, blemishes, uneven skin tone.', '1672647787.png', '0', '2023-01-02 05:23:07', '2023-01-02 05:23:07'),
(207, 'Signal Cavitgy Fighter', 'HealthBeauty', NULL, NULL, '18', NULL, '29077', '100', 'It Contains Active Micro-Calcium And Fluoride That Give You Stronger Teeth And Fresh Breath. Its Breakthrough Formula With Active Micro-Calcium Is Scientifically Proven To Deliver Fifty Percent More Calcium In The Mouth.', '1672647864.png', '0', '2023-01-02 05:24:24', '2023-01-02 05:24:24'),
(208, 'White Teeth Mouthwash', 'HealthBeauty', NULL, '500', '32', NULL, '38450', '100', 'The combination of the components of the Pleasant White Teeth Mouthwash, together with fluoride, complements the action of brushing, preventing the appearance of cavities and bad breath. Contributes to the daily care of natural-looking white teeth.', '1672647942.png', '0', '2023-01-02 05:25:42', '2023-01-02 05:25:42'),
(209, 'Maybelline Mascara', 'HealthBeauty', NULL, NULL, '78', '79', '30433', '100', 'Maybelline\'s Lash Sensational Sky High mascara delivers full volume and limitless length. Exclusive Flex Tower mascara brush bends to volumize and extend every single lash from root to tip. Washable mascara formula infused with bamboo extract and fibers.', '1672648025.png', '0', '2023-01-02 05:27:05', '2023-01-02 05:27:05'),
(210, 'Papillon Hand Wash', 'HealthBeauty', NULL, NULL, '43', '45', '29776', '100', 'Gently cleanses, removing dirt and germs from a single wash. With the natural extracts inside, it keeps your skin delicate and soft. It makes you feel different with its vanilla and almond smell.', '1672648092.png', '0', '2023-01-02 05:28:12', '2023-01-02 05:28:12'),
(211, 'Victoria Secret Chapstick', 'HealthBeauty', NULL, NULL, '77', '78', '47947', '100', 'Soften up with this luxurious lip balm.\r\nWith aloe vera to smooth and hydrate and peppermint oil to calm and soothe.', '1672648425.png', '0', '2023-01-02 05:33:45', '2023-01-02 05:33:45'),
(212, 'MAC Mascara', 'HealthBeauty', NULL, NULL, '56', '76', '19899', '100', 'MAC makeup mascaras define, extend and lift lashes with creamy formulas and tailor-made brushes for remarkable curl, length and volume.', '1672648494.png', '0', '2023-01-02 05:34:55', '2023-01-02 05:34:55'),
(213, 'Toothpaste TRISA', 'HealthBeauty', NULL, NULL, '21', '24', '13930', '100', 'Protects against caries Reminer alisesenamel. Inhibit bacterial growth\r\nInhibit tartar formation. Prevent bleeding\r\nStrengthens gums Inhibits the growth of bacteria. Helps to regain your natural whiteness. Provides fresh breath.', '1672648744.png', '0', '2023-01-02 05:39:04', '2023-01-02 05:39:04'),
(214, 'Super Max Manicure Set', 'HealthBeauty', NULL, NULL, '23', NULL, '43650', '100', 'This great 5 piece manicure kit includes tweezers, scissors, toenail clippers, a nail file and fingernail clippers and makes for the perfect manicure set for around the home', '1672648828.png', '0', '2023-01-02 05:40:28', '2023-01-02 05:40:28'),
(215, 'Wet & wild Eye Liner', 'HealthBeauty', NULL, NULL, '19', '20', '49243', '100', 'High-def pigment and a rich, fluid formula that goes on quick and easy to give you perfectly lined eyes that last. Dries fast and stays put to enhance and dramatically define the eyes. An easy-to-control, flexible brush gives you precise application.', '1672648924.png', '0', '2023-01-02 05:42:04', '2023-01-02 05:42:04'),
(216, 'Barely Slice Bread', 'Foods', 'bread', NULL, '6', NULL, '11998', '24', 'Barely Bread is known for creating delicious gluten-free and Paleo friendly foods using a grain-free blend of almond, seed, and coconut flours.', '1672650167.png', '26', '2023-01-02 06:02:48', '2023-02-08 12:30:41'),
(217, 'Sun Chips', 'Foods', 'snack', '40g', '10', '11', '48134', '90', 'SUNCHIPS® snacks are wavy, ripple-y squares full of whole-grain goodness (14-19g of whole grains per serving). Grab a bag of SUNCHIPS whole grain snacks in your favorite flavor, and tell your taste buds to meet you at the corner of delicious and wholesome', '1672650281.png', '10', '2023-01-02 06:04:41', '2023-01-04 12:33:35'),
(218, 'Quaker Oats', 'Foods', NULL, '500g', '21', '22', '12338', '99', 'Quaker Oats is 100% whole grains for lasting energy and may help reduce the risk of heart disease. 3 grams of soluble fiber from oatmeal daily in a diet low in saturated fat and cholesterol may reduce this risk of heart disease.', '1672650350.png', '1', '2023-01-02 06:05:50', '2023-02-16 11:31:18'),
(219, 'Doritos Nacho Cheese', 'Foods', 'snack', NULL, '19', NULL, '32981', '100', 'A strong cheesy flavor with a hint of spice. The chips are thick and crunchy, making them perfect for dipping. The cheese flavor is well balanced and not too overwhelming. umami, or savory flavor, is produced by glutamic acid, which is present in a wide r', '1672650445.png', '0', '2023-01-02 06:07:25', '2023-01-02 06:07:25'),
(220, 'Arrighi Tagliatelle A Nido', 'Foods', NULL, NULL, '28', '30', '27606', '100', 'Arrighi Tagliatelle A Nido Verde is made in italy. It is a classic shaped pasta rounded in circles and has a green color. It has a rough and thick consistancy. The thic pasta gives your dish a spedcial taste.', '1672650524.png', '0', '2023-01-02 06:08:44', '2023-01-02 06:08:44'),
(221, 'Farmer Bread', 'Foods', 'bread', NULL, '6', NULL, '15812', '100', 'Fresh bread usually presents an appealing brownish and crunchy crust, a pleasant roasty aroma, fine slicing characteristics, a soft and elastic crumb texture, and a moist mouthfeel.', '1672650596.png', '0', '2023-01-02 06:09:56', '2023-01-02 06:09:56'),
(222, 'French Baguette', 'Foods', 'bread', NULL, '5', NULL, '24397', '50', 'A baguette is a long, thin type of bread of French origin that is commonly made from basic lean dough It is distinguishable by its length and crisp crust.', '1672650640.png', '0', '2023-01-02 06:10:40', '2023-01-02 06:10:40'),
(223, 'Bokomo Corn Flakes', 'Foods', NULL, '1kg', '20', NULL, '21241', '100', 'Made from the finest sun-ripened maize, with 9 vitamins, 3 minerals and fibre, our technology makes each of our toasted golden flakes extra crispy and crunchy and gives you the goodness you need to tackle the day.', '1672650695.png', '0', '2023-01-02 06:11:35', '2023-01-02 06:11:35'),
(224, 'Nutella', 'Foods', 'snack', '350g', '27', '30', '15175', '100', 'Packed with the richness of selected hazelnuts and delicious cocoa, it is the most trusted breakfast spread brand across the world. Nutella can be easily spread over bread, roti, dosa or idli and variety of other breakfast dishes. It is 100% vegetarian.', '1672650764.png', '0', '2023-01-02 06:12:44', '2023-01-02 06:12:44'),
(225, 'Pringles Sour Cream Onion', 'Foods', 'snack', NULL, '10', NULL, '42576', '99', 'Description. Pringles have become an indispensable part of the snack landscape these days. The Sour Cream and Onion crisps are flavoured with the delicious aromas of onions and the full-bodied taste of sour cream. The perfect snack on long evenings.', '1672650876.png', '1', '2023-01-02 06:14:36', '2023-02-16 11:31:18'),
(226, 'Elbows Macaroni', 'Foods', NULL, '1 Pack', '12', NULL, '21773', '100', 'GoodWheat Elbows macaroni, that is. Taste, meet nutrition. These kid-friendly noodles are genuine wheat without any junk. It’s the mic-drop pasta for your favorite mouths. Cook time: 11 minutes.', '1672732515.png', '0', '2023-01-03 04:55:16', '2023-01-03 04:55:16'),
(227, 'Deluca Cavatappi Macaroni', 'Foods', NULL, NULL, '13', '14', '49317', '100', 'S-shaped pasta tube that looks similar to a small corkscrew. Its slender, spiral shape makes it great for serving with sauces, in salads, and baked in casseroles. Cavatappi works well with any sauce but pairs especially wonderfully with sauces.', '1672732798.png', '0', '2023-01-03 04:59:58', '2023-01-03 04:59:58'),
(228, 'Cheetos Crunchy', 'Foods', 'snack', NULL, '21', NULL, '47434', '100', 'Bring a cheesy, delicious crunch to snack time with a bag of CHEETOS® Crunchy Cheese-Flavored Snacks. Made with real cheese for maximum flavor.', '1672732882.png', '0', '2023-01-03 05:01:22', '2023-01-03 05:01:22'),
(229, 'KitKat Bar', 'Foods', 'snack', NULL, '24', '28', '32636', '100', 'A KIT KAT® bar is made of three layers of wafer separated and covered by an outer layer of chocolate. The standard bars consist of four pieces, called fingers, and each finger can be snapped from the bar as an individual piece.', '1672732960.png', '0', '2023-01-03 05:02:40', '2023-01-03 05:02:40'),
(230, 'Croissant Normal', 'Foods', 'bread', NULL, '7', NULL, '28959', '50', 'A croissant is typically made of yeast-risen dough. The dough is first layered with butter and then rolled. It is folded many times in a process called lamination. Then the dough is cut into triangles, rolled to form a crescent shape and baked.', '1672733018.png', '0', '2023-01-03 05:03:38', '2023-01-03 05:03:38'),
(231, 'Cookies', 'Foods', 'bread', '1kg', '17', '20', '21896', '50', 'A baked or cooked dessert that is typically small, flat and sweet. It usually contains flour, sugar, egg, and some type of oil, fat, or butter. It may include other ingredients such as raisins, oats, chocolate chips, nuts, etc.', '1672733100.png', '0', '2023-01-03 05:05:00', '2023-01-03 05:05:00'),
(232, 'Falak Premium Basmati Rice', 'Foods', NULL, '2kg', '29', NULL, '36916', '100', 'Falak Premium Basmati Rice is 100% pure and premium basmati rice. The grains are only sourced from the fields of Punjab. Upon cooking the rice grains are long and have a fluffy texture, and the unique Basmati aroma and sweet taste.', '1672733163.png', '0', '2023-01-03 05:06:03', '2023-01-03 05:06:03'),
(233, 'Lays Classic', 'Foods', 'snack', NULL, '14', NULL, '15145', '100', 'It all starts with farm-grown potatoes - cooked in all natural oil with a dash of salt per serving. So every Lays potato chip is perfectly crispy and delicious. Happiness in every bite. Made with all natural ingredients.', '1672733241.png', '0', '2023-01-03 05:07:21', '2023-01-03 05:07:21'),
(234, 'M&Ms Peanut', 'Foods', 'snack', NULL, '16', NULL, '28339', '100', 'M&M\'S Peanut Chocolate Candy is a little nutty, a lot tasty and always full of fun. Enjoy roasted peanuts covered in delicious chocolate and a colorful candy shell.', '1672733300.png', '0', '2023-01-03 05:08:20', '2023-01-03 05:08:20'),
(235, 'Mentos Pure Fresh Gum', 'Foods', 'snack', NULL, '12', '14', '35097', '100', 'Enjoy the long lasting freshness of Mentos Pure Fresh Gum in Fresh Mint. Available in a convenient on the go package in two flavor variations that\'s perfect for your desk at work or in the car. Each package contains 50 pieces of Mentos Gum.', '1672733362.png', '0', '2023-01-03 05:09:22', '2023-01-03 05:09:22'),
(236, 'Superimi Noodle', 'Foods', 'snack', NULL, '21', NULL, '47754', '100', 'A piece of pasta, especially a long, skinny one. You can eat noodles with butter and cheese or sauce, or slurp them from a bowl of soup. Noodles are cut or rolled from a dough that contains some kind of flour — wheat, buckwheat, and rice flour.', '1672733611.png', '0', '2023-01-03 05:13:31', '2023-01-03 05:13:31'),
(237, 'Misura Pasta', 'Foods', NULL, '500g', '18', NULL, '17716', '100', 'Whole wheat pasta par excellence with only 100% Italian wheat and traditional extrusion. Delicious and naturally rich in fibre!', '1672733686.png', '0', '2023-01-03 05:14:46', '2023-01-03 05:14:46'),
(238, 'Reggia  Pasta', 'Foods', NULL, '500g', '18', NULL, '31987', '100', 'The Spaghetti pasta is the long, thin and cylindrical pasta originated from Italy. It is prepared specifically from durum wheat semolina. It is thin string sort pasta, which is normally cooked with sauce and range of vegetables.', '1672733744.png', '0', '2023-01-03 05:15:44', '2023-01-03 05:15:44'),
(239, 'Chocolate Croissant', 'Foods', 'bread', NULL, '23', '27', '32171', '50', 'A light, flaky, rectangular pastry with a chocolate filling. French : pain, bread + au, with the + chocolate, chocolate.', '1672733889.png', '0', '2023-01-03 05:18:09', '2023-01-03 05:18:09'),
(240, 'Reese\'s Peanut Butter', 'Foods', 'snack', NULL, '22', '23', '34392', '100', 'Reese\'s Peanut Butter Cups are an American candy consisting of a chocolate cup filled with peanut butter, marketed by The Hershey Company. They were created on November 15, 1928, by H. B. Reese, a former dairy farmer and shipping foreman for Milton S.', '1672734006.png', '0', '2023-01-03 05:20:06', '2023-01-03 05:20:06'),
(241, 'Snickers Bar', 'Foods', 'snack', NULL, '12', '13', '39246', '100', 'Snickers is a chocolate bar made by the American company Mars, Incorporated, consisting of nougat topped with caramel and peanuts that is encased in milk chocolate. The annual global sales of Snickers was over $3 billion as of 2012.', '1672734059.png', '0', '2023-01-03 05:20:59', '2023-01-03 05:20:59'),
(242, 'Roys Chocolate', 'Foods', 'snack', NULL, '23', NULL, '35165', '100', 'Distinctively aromatic, this milk chocolate bar is filled with crunchy roasted whole almonds scattered generously all over its entire length. The savoury nuttiness and creamy milk chocolate (42% cacao) blend harmoniously to create a very satisfying treat.', '1672734142.png', '0', '2023-01-03 05:22:22', '2023-01-03 05:22:22'),
(243, 'Agnesi Pasta', 'Foods', NULL, '500g', '12', '13', '35792', '100', 'Agnesi pasta is made with a blend of the top wheat varieties, sourced from all over the world. The end product is ideal for making a high quality pasta that never overcooks and is always al dente.', '1672734269.png', '0', '2023-01-03 05:24:29', '2023-01-03 05:24:29'),
(244, 'Bruger Bread', 'Foods', 'bread', NULL, '7', '8', '20165', '50', 'Burger buns are soft rolls with a high sugar and fat content. It should have an extremely soft, fluffy crumb and a fine texture. The whole bun should have a golden colour with very little white at the side.', '1672734349.png', '0', '2023-01-03 05:25:49', '2023-01-03 05:25:49'),
(245, 'Hot Dog Bun', 'Foods', 'bread', NULL, '5', '6', '14188', '50', 'A hot dog bun is a type of soft bun shaped specifically to contain a hot dog or another type of sausage. Hot dog bun. Hotdog - Evan Swigart.jpg.', '1672734405.png', '0', '2023-01-03 05:26:45', '2023-01-03 05:26:45'),
(246, 'Basmati Rice', 'Foods', NULL, '5kg', '32', '35', '40425', '100', 'Basmati is a fragrant Indian rice with an intoxicating natural aroma. Its nutty, buttery flavor pairs well with savory dishes like curries and other Middle Eastern and Asian fare. White Basmati Rice is lighter and fluffier than traditional white rice.', '1672734491.png', '0', '2023-01-03 05:28:11', '2023-01-03 05:28:11'),
(247, 'Sun Flower', 'Foods', NULL, '5l', '45', '50', '21389', '100', 'Sunflower oil is light in taste and appearance and supplies more Vitamin E than any other vegetable oil. It is a combination of monounsaturated and polyunsaturated fats with low saturated fat levels. The versatility of this healthy oil.', '1672734551.png', '0', '2023-01-03 05:29:11', '2023-01-03 05:29:11'),
(248, 'Trident Original Flavor Gum', 'Foods', 'snack', NULL, '4', NULL, '18871', '100', 'Trident Original combines the flavors of peppermint and cinnamon gum for a unique, refreshing flavor. With 30% fewer calories than sugared gum, this mint gum is sweetened with xylitol, a naturally occurring sugar alcohol.', '1672734637.png', '0', '2023-01-03 05:30:37', '2023-01-03 05:30:37'),
(250, 'Russell Stover', 'Foods', 'snack', NULL, '5', '6', '43470', '100', 'Russell Stover is an excellent option that all chocolate lovers can appreciate. This product is acceptable on all over the world specially on valantaines day.', '1672735958.png', '0', '2023-01-03 05:52:38', '2023-01-03 05:52:38'),
(251, 'Deluxe Toffe Choco', 'Foods', 'snack', NULL, '12', '17', '12389', '100', 'These Toffees are processed using quality ingredients like milk solids, Chocolate contains , real Butter and others under the strict vigilance of total quality management. The Deluxe Toffees offered by us provide delicious taste of butter.', '1672736056.png', '0', '2023-01-03 05:54:16', '2023-01-03 05:54:16'),
(252, 'Large Slice Bread', 'Foods', 'bread', NULL, '10', '11', '19408', '50', 'Large Sliced bread is a loaf of bread that has been sliced with a machine and packaged for convenience, as opposed to the consumer cutting it with a knife.', '1672736126.png', '0', '2023-01-03 05:55:26', '2023-01-03 05:55:26'),
(253, 'Sun Chips Tomato', 'Foods', 'snack', NULL, '9', '12', '36262', '100', 'The taste of red tomatoes and green jalapeno peppers delivered right to your mouth on waves of whole grain goodness.', '1672736204.png', '0', '2023-01-03 05:56:44', '2023-01-03 05:56:44'),
(254, 'Trident Spearmint Gum', 'Foods', 'snack', NULL, '6', '7', '31892', '100', 'Trident Spearmint Flavor Sugar-Free Gum is a delicious way to freshen breath and protect your teeth. With 30% fewer calories than sugared gum, this mint gum is sweetened with xylitol, a naturally occurring sugar alcohol.', '1672736306.png', '0', '2023-01-03 05:58:26', '2023-01-03 05:58:26'),
(255, 'LaMarca Prosecco', 'Beverage', 'champagne', NULL, '892', '900', '36214', '100', 'La Marca Prosecco has a pale, golden straw color and sparkles with lively effervescence. Opening with aromas of fresh-picked citrus and honeysuckle blossoms, the crisp, clean palate brings fruity notes of green apple, juicy peach and ripe lemon.', '1672739309.png', '0', '2023-01-03 06:48:30', '2023-01-03 06:48:30'),
(256, 'Axumit', 'Beverage', 'wine', NULL, '392', '400', '11328', '100', 'Axumit wine received its beloved name from an ancient civilization called AXUM. This meticulously made semi-sweet red wine is made with Sangiovese and Grenache noir red grapes variety. The sweet tatse gives the wine lighteness and easy to drink feel.', '1672739391.png', '0', '2023-01-03 06:49:51', '2023-01-03 06:49:51'),
(257, 'Macallan Double Cask', 'Beverage', 'whiskey', NULL, '453', '459', '14600', '100', 'The Macallan Double Cask 12 Year Old Scotch pairs the indulgent fruit, caramel and oak spice character of Sherry-seasoned European oak with the bright citrus and vanilla notes of Sherry-seasoned American oak for a satisfyingly rich and perfectly balanced.', '1672739690.png', '0', '2023-01-03 06:54:50', '2023-01-03 06:54:50'),
(258, 'Belvedere Vodka IX', 'Beverage', 'vodka', NULL, '435', NULL, '39966', '100', 'Floral, sweet spice aromas with notes of fresh citrus and ginger and a refreshing menthol lift. Bold and intricate, with uplifting sweet spice followed by invigorating ginger warmth. Smooth yet intense with menthol complexity tempered by gentle sweet.', '1672739765.png', '0', '2023-01-03 06:56:05', '2023-01-03 06:56:05'),
(259, 'CocaCola', 'Beverage', 'soft', NULL, '24', '25', '10847', '35', 'Coke, is a carbonated soft drink manufactured by the Coca-Cola Company. Originally marketed as a temperance drink and intended as a patent medicine. World\'s most drinkable soft drink after water.', '1672739892.png', '65', '2023-01-03 06:58:12', '2023-03-28 05:52:06'),
(260, 'St Gorge Beer', 'Beverage', 'beer', NULL, '29', '30', '40618', '100', 't. George is a Lager type beer made from expertly selected malts, premium blends of hops and purified highland water. Moderated bitterness level, slight essence of grain and unique bouquet of aromas give St. George beer its distinct taste.', '1672739964.png', '0', '2023-01-03 06:59:24', '2023-01-03 06:59:24'),
(261, 'Red Bull Sugar Free', 'Beverage', 'energy', NULL, '23', NULL, '27168', '100', 'Caffeinated taurine drink with sweeteners. One 250 ml can of Red Bull Energy Drinks contains 80 mg of caffeine, about the same amount as in a cup of home-brewed coffee.', '1672740036.png', '0', '2023-01-03 07:00:36', '2023-01-03 07:00:36'),
(262, 'Ambo Mineral Water', 'Beverage', 'water', NULL, '19', '20', '25717', '100', 'Sourced from a thermal mineral spring that has significant amounts of \"natural calcium, magnesium, potassium, bicarbonates and carbon dioxide\". The water is naturally carbonated by the carbon dioxide at the source.', '1672740098.png', '0', '2023-01-03 07:01:39', '2023-01-03 07:01:39'),
(263, 'Guder', 'Beverage', 'wine', NULL, '289', '290', '30363', '91', 'Guder has been the pride of Ethiopians for generations. Our red wine, the first ever produced in Ethiopia helps create loving bonds of family and friendship, accompanying our meals and adding color to festivities. Gouder has been part of our heritage for', '1672740170.png', '9', '2023-01-03 07:02:50', '2023-02-13 09:18:25'),
(264, 'Top Water', 'Beverage', 'water', '20l', '59', '60', '41748', '100', 'Top Water is a brand of bottled water derived, bottled, and shipped from Ethiopia. Top Water is headquartered in Addis Ababa, Ethiopia.', '1672740268.png', '0', '2023-01-03 07:04:28', '2023-01-03 07:04:28'),
(265, 'Habesha Beer', 'Beverage', 'beer', NULL, '28', '30', '13529', '100', 'Is distinguished by its golden color, rich aroma and yet smooth drinking experience. It\'s the perfect choice for those looking for a lager beer with character and identity.', '1672740354.png', '0', '2023-01-03 07:05:54', '2023-01-03 07:05:54'),
(266, 'Mionetto Prosecco Brut', 'Beverage', 'champagne', NULL, '783', '789', '20789', '100', 'A refreshing sparkling wine, Mionetto Prosecco Brut features a shiny straw color with bright yellow highlights. Aromas of golden apples, honey and peaches greet the nose as you sip this wine. Well-balanced acidity gives the Mionetto prosecco wine a fresh.', '1672740493.png', '0', '2023-01-03 07:08:13', '2023-01-03 07:08:13'),
(267, 'Gatorade Cool Blue', 'Beverage', 'energy', NULL, '23', '25', '15510', '100', 'Carbohydrate-electrolyte solutions contribute to the maintenance of endurance performance during prolonged endurance exercise and enhance the absorption of water during physical exercise.', '1672740561.png', '0', '2023-01-03 07:09:21', '2023-01-03 07:09:21'),
(268, 'Pepsi', 'Beverage', 'soft', '2l', '34', '35', '20843', '100', 'Pepsi is a carbonated soft drink manufactured by PepsiCo. Originally created and developed in 1893 by Caleb Bradham and introduced as Brad\'s Drink, it was renamed as Pepsi-Cola in 1898, and then shortened to Pepsi in 1961.', '1672740608.png', '0', '2023-01-03 07:10:08', '2023-01-03 07:10:08'),
(269, 'Absolut Vodka', 'Beverage', 'vodka', NULL, '345', '400', '35062', '100', 'Absolut is as pure as vodka can be. Still, that purity has a certain taste: Rich, full-bodied and complex, yet smooth and mellow with a distinct character of grain, followed by a hint of dried fruit.', '1672740694.png', '0', '2023-01-03 07:11:34', '2023-01-03 07:11:34'),
(270, 'Josh Cellars Cabernet Sauvignon', 'Beverage', 'wine', NULL, '342', '345', '44336', '100', 'Round and juicy, our Cabernet Sauvignon has flavors of blackberry, toasted hazelnut and cinnamon, complemented by hints of vanilla and toasted oak. We love pairing this wine with well-seasoned meats like beef, pork, or lamb, and indulgent chocolate.', '1672740795.png', '0', '2023-01-03 07:13:15', '2023-01-03 07:13:15'),
(271, 'Jameson Irish Whiskey', 'Beverage', 'whiskey', NULL, '234', NULL, '40555', '100', 'A light floral fragrance, peppered with spicy wood and sweet notes. The perfect balance of spicy, nutty and vanilla notes with hints of sweet sherry and exceptional smoothness.', '1672740893.png', '0', '2023-01-03 07:14:53', '2023-01-03 07:14:53'),
(272, 'Eden Mineral Water', 'Beverage', 'water', NULL, '16', '18', '25074', '100', 'Eden water come from deep in the earth, brought back to the surface after a long journey of percolation through the natural filter of rock layers, emerging pure and mineral-rich. Drinking such water is one of the most effective way of ensuring good health', '1672740976.png', '0', '2023-01-03 07:16:16', '2023-01-03 07:16:16'),
(273, 'Awash Wine', 'Beverage', 'wine', NULL, '250', NULL, '39281', '100', 'Awash wine is the first bottled white wine in Ethiopia, it is mostly consumed in local butchery, where consumers gather and have raw meat. This brand is consumed as a mixer, white sangria type usually combined in Ethiopia with beer, lemonade, etc.', '1672741057.png', '0', '2023-01-03 07:17:37', '2023-01-03 07:17:37'),
(274, 'Bedele Special Beer', 'Beverage', 'beer', NULL, '24', '25', '33630', '100', 'Bedele Special is a high quality rich full flavoured 5.5% alcohol lager beer of export quality, brewed with two types of hops, 100% natural ingredients proving its special character and name.', '1672741127.png', '0', '2023-01-03 07:18:47', '2023-01-03 07:18:47'),
(275, 'Heineken Beer', 'Beverage', 'beer', NULL, '27', NULL, '31108', '100', 'Heineken is a lager style of beer so it is heavier than other types. It has more of a stronger taste to it. Heineken is a 5% ABV beer made without any additives. The yeast and barley make the beer thicker to have a great taste when you drink it.', '1672741182.png', '0', '2023-01-03 07:19:42', '2023-01-03 07:19:42'),
(276, 'Pink-whitney Amsterdam', 'Beverage', 'vodka', NULL, '342', '350', '32870', '100', 'The Pink Whitney is New Amsterdam Vodka infused with fresh pink lemonade flavor, creating the perfect balance of sweetness, natural lemon zest, and clean, refreshing taste. Enjoy on the rocks or with a splash of club soda.', '1672741301.png', '0', '2023-01-03 07:21:41', '2023-01-03 07:21:41');
INSERT INTO `stores` (`id`, `product`, `category`, `type`, `pricePer`, `price`, `delPrice`, `productNo`, `quantity`, `description`, `image`, `sold`, `created_at`, `updated_at`) VALUES
(277, 'Cloudy Bay Sauvignon Bblanc', 'Beverage', 'wine', NULL, '342', NULL, '16150', '100', 'A zesty and vibrant nose, with notes of juicy citrus and makrut lime underpinned by subtle white nectarine and passionfruit notes. The palate is mouthwatering, with ripe vibrant passionfruit and citrus at the fore.', '1672741400.png', '0', '2023-01-03 07:23:20', '2023-01-03 07:23:20'),
(278, 'Johnnie Walker Red Label', 'Beverage', 'whiskey', NULL, '299', '300', '45017', '100', 'Crackling with spice and bursting with vibrant, smoky flavours. It\'s a blend that combines light whiskies from Scotland\'s East Coast and more peaty whiskies from the West, creating an extraordinary depth of flavour.', '1672741509.png', '0', '2023-01-03 07:25:09', '2023-01-03 07:25:09'),
(279, 'Daily Water', 'Beverage', 'water', NULL, '15', '17', '24861', '100', 'It is calorie-free and as easy to find as the nearest tap. Water helps to restore fluids lost through metabolism, breathing, sweating, and the removal of waste. It helps to keep you from overheating, lubricates the joints and tissues, maintains healthy.', '1672741573.png', '0', '2023-01-03 07:26:13', '2023-01-03 07:26:13'),
(280, 'Veuve Clicquot Yellow Label', 'Beverage', 'champagne', NULL, '473', '500', '23978', '100', 'This classically-styled, dry Champagne is a blend of two-thirds black grapes (Pinot Noir and Pinot Meunier) for body, balanced with one-third Chardonnay for elegance. It has a fine persistent sparkle and golden Champagne color.', '1672741693.png', '0', '2023-01-03 07:28:13', '2023-01-03 07:28:13'),
(281, 'Monster Energy Zero Ultra', 'Beverage', 'energy', NULL, '29', '30', '19467', '100', 'Zero Ultra has zero sugar but with all the flavor you\'re accustomed to and packed with our sugar-free Monster Energy blend. REFRESHING TASTE | Zero Ultra\'s lighter tasting flavor profile is a less sweet, sparkling, citrus energy drink.', '1672741803.png', '0', '2023-01-03 07:30:03', '2023-01-03 07:30:03'),
(282, 'Monster Energy', 'Beverage', 'energy', NULL, '27', NULL, '44785', '100', 'Carbonated Energy drink with Caffeine. Includes Ginseng and B Vitamins. Great Monster taste. Powerful punch with a smooth easy drinking flavour. Serve cold for maximum refreshment.', '1672741877.png', '0', '2023-01-03 07:31:17', '2023-01-03 07:31:17'),
(283, 'Fanta', 'Beverage', 'soft', NULL, '16', '19', '22536', '100', 'Fanta Orange is a soft drink with a tingly, fruity taste, made with 2 percent juice and contains no artificial colours or flavours. Nutrition. Ingredients. Average 100 ML. Energy.', '1672741960.png', '0', '2023-01-03 07:32:40', '2023-01-03 07:32:40'),
(284, '7up', 'Beverage', 'soft', '2l', '19', '20', '10368', '100', 'An American brand of lemon-lime-flavored non-caffeinated soft drink. The brand and formula are owned by Keurig Dr Pepper although the beverage is internationally distributed by PepsiCo', '1672742026.png', '0', '2023-01-03 07:33:46', '2023-01-03 07:33:46'),
(285, 'Sprite', 'Beverage', 'soft', NULL, '13', '15', '30475', '100', 'A lemon and lime-flavoured soft drink. It first hit shop shelves back in 1961 and today it\'s sold in more than 190 countries. Crisp, refreshing and clean-tasting, Sprite is a lemon and lime-flavoured soft drink.', '1672742095.png', '0', '2023-01-03 07:34:55', '2023-01-03 07:34:55'),
(286, 'Meta Beer', 'Beverage', 'beer', NULL, '25', '28', '35493', '100', 'Has an adjunct taste but no different than a lot of beers on the market. For the most part it is amazingly average. Thin body with a bit of a crisp bite. Well, it\'s tough not being able to get Harar, but I will make do and learn to live with some Meta.', '1672742171.png', '0', '2023-01-03 07:36:11', '2023-01-03 07:36:11'),
(287, 'Gebeta', 'Beverage', 'wine', NULL, '299', '300', '17816', '100', 'Red wine is a blend of Syrah , Cabernet Sauvignon and a small touch of Grenache noir and Merlot. This are expressed on the accumulation of rich eruption debris, at Awash wine vineyard. The wine expresses delicious fruity notes on the nose.', '1672742265.png', '0', '2023-01-03 07:37:45', '2023-01-03 07:37:45'),
(288, 'Walia Beer', 'Beverage', 'beer', NULL, '22', '25', '24214', '100', 'Walia beer is an Ethiopian light lager made from 100% pure barley malt. Walia beer is an Ethiopian light lager made from 100% pure barley malt.', '1672742405.png', '0', '2023-01-03 07:40:05', '2023-01-03 07:40:05'),
(289, 'Sen\'q', 'Beverage', 'soft', NULL, '19', '20', '32553', '100', 'SEN\'Q is our first ever Non-Alcoholic malt Beverage. A mixture of Caramel, Vanilla, and Ethiopian coffee gives SEN\'Q its authentic taste and is the perfect complement to any meal.', '1672742479.png', '0', '2023-01-03 07:41:19', '2023-01-03 07:41:19'),
(290, 'Aquaddis Water', 'Beverage', NULL, '20l', '49', '50', '47943', '100', 'Earliest bottled water brands in Ethiopia and has been refreshing consumers with the taste they love and quality they trust. It is also comes with environmentally friendly packaging, reducing its carbon footprint for a more sustainable environment.', '1672742580.png', '0', '2023-01-03 07:43:00', '2023-01-03 07:43:00'),
(291, 'Arki Water', 'Beverage', 'water', NULL, '12', '15', '27945', '100', 'Natural bottled mineral water, rich in minerals that benefit the body and increase vitality. We bring trust and mutual respect to all our relationships by continually improving the quality and process of our product.', '1672742643.png', '0', '2023-01-03 07:44:03', '2023-01-03 07:44:03'),
(292, 'Kemila Rose', 'Beverage', 'wine', NULL, '289', '290', '16565', '100', 'KEMILA rosè Wine is made of a hybrid process where it started as a red wine and finished as a white wine. A bold pinkish colored wine made of Grenache, Dodoma, and Sangiovese grape varieties.', '1672742804.png', '0', '2023-01-03 07:46:44', '2023-01-03 07:46:44'),
(293, 'Sky Vodka', 'Beverage', 'vodka', NULL, '453', '489', '37245', '99', 'SKYY vodka is an American vodka spirit produced by the Campari America division of Campari Group of Milan, Italy, formerly SKYY Spirits LLC. SKYY Vodka is 40% ABV or 80 proof, except in Australia and New Zealand where it is 37.5% ABV / 75 Proof.', '1672745822.png', '1', '2023-01-03 08:37:02', '2023-02-09 18:08:43'),
(294, 'Jack Daniels Old', 'Beverage', 'whiskey', NULL, '345', '350', '44450', '100', 'Jack Daniel\'s Old No 7 starts off with nutty and roasty caramel, vanilla, and roasted oak, followed by cinnamon, clove, toasted banana, red apple, and hints of licorice, grain, and grass. Roasty, oaky, and spicy-forward whiskey with a little body.', '1672746013.png', '0', '2023-01-03 08:40:13', '2023-01-03 08:40:13'),
(295, 'Anbesa Beer', 'Beverage', 'beer', NULL, '24', NULL, '32735', '100', 'Brand that celebrates the lion-hearted, the dreamers, future seekers, everyday people who are fighting for something better.” According to United Beverages, the new plan has the capacity to build 1.6 million hectoliters.', '1672746099.png', '0', '2023-01-03 08:41:39', '2023-01-03 08:41:39'),
(296, 'Sofi Malt', 'Beverage', 'soft', NULL, '18', NULL, '37891', '99', 'The first dark malt beverage in Ethiopia made from 100% natural ingredients. Its rich and distinctive taste packed with vitamins, minerals and calcium. Due to COVID-19 Empty bottles can\'t be returned.', '1672746167.png', '1', '2023-01-03 08:42:47', '2023-02-09 17:40:25'),
(297, 'Predator', 'Beverage', 'energy', NULL, '19', '20', '28673', '100', 'The first global affordable energy drink by Monster Energy exists to ignite your hustling spirit and allow you to thrive not just survive. Predators live by instinct and conquer with courage. The power of Predator will unchain your animal spirit.', '1672746257.png', '0', '2023-01-03 08:44:17', '2023-01-03 08:44:17'),
(298, 'Pinnacle Original Flavored', 'Beverage', 'vodka', NULL, '234', '352', '41333', '100', 'Pinnacle is a leader in Flavors, including true-to-taste fruit favorites like Peach and Raspberry and unique flavors like Tropical Punch, Whipped, and Coconut. Award-winning Vodka, so it goes great in +1 drinks and cocktail favorites.', '1672746382.png', '0', '2023-01-03 08:46:22', '2023-01-03 08:46:22'),
(299, 'Fireball Cinnamon', 'Beverage', 'whiskey', NULL, '342', '355', '44172', '100', 'A mixture of Canadian whisky, cinnamon flavoring and sweeteners that is produced by the Sazerac Company. Its foundation is Canadian whisky, and the taste otherwise resembles the candy.', '1672746524.png', '0', '2023-01-03 08:48:44', '2023-01-03 08:48:44'),
(300, 'Basil Haydens Dark Rye', 'Beverage', 'whiskey', NULL, '242', '250', '14342', '100', 'Blended with Canadian rye whiskey and a touch of port to create this unique, artful blend. Bottled at a smooth 80 proof, this dark rye offers the subtlest of fruit sweetness to complement the traditional rye recipe.', '1672746610.png', '0', '2023-01-03 08:50:10', '2023-01-03 08:50:10'),
(301, 'Bulleit Bourbon', 'Beverage', 'whiskey', NULL, '352', '360', '11802', '100', 'Bulleit Bourbon has a bold, spicy character with a finish that\'s distinctively clean and smooth. Medium amber in color, with gentle spiciness and sweet oak aromas. Mid-palate is smooth with tones of maple, oak, and nutmeg.', '1672746683.png', '0', '2023-01-03 08:51:23', '2023-01-03 08:51:23'),
(302, 'Kim Crawford', 'Beverage', 'wine', NULL, '362', '390', '42819', '100', 'Classic Marlborough Sauvignon Blanc aromas of lifted citrus, tropical fruit, and crushed herbs. Plate: A fresh, juicy wine with vibrant acidity and plenty of weight and length on the palate. Ripe, tropical fruit flavor with passion fruit, melon, and grape', '1672746801.png', '0', '2023-01-03 08:53:21', '2023-01-03 08:53:21'),
(303, 'Cavit Pinot Grigio', 'Beverage', 'wine', NULL, '399', '410', '12954', '100', 'Veneto, Italy- Crisp and refreshing, this extremely popular brand offers light apple and citrus flavors that make this a perfect wine for relaxing after a long day or pairing with lighter fare.', '1672746931.png', '0', '2023-01-03 08:55:32', '2023-01-03 08:55:32'),
(304, 'Fanta Pineapple', 'Beverage', 'soft', NULL, '18', '20', '19510', '100', 'Fanta is known for its great fruity taste and fun vibrant colors for consumers who want to Be More Than One Flavor. Bright, bubbly and instantly refreshing, Fanta is made with 100% natural flavors and is caffeine-free.', '1672747078.png', '0', '2023-01-03 08:57:58', '2023-01-03 08:57:58'),
(305, 'Bang Peach Mango', 'Beverage', 'energy', NULL, '25', '30', '19095', '100', 'Very mild and sweet flavor, and yet this is the kind of drink that will allow you to be bold. You\'ll feel relaxed one minute and powerful the next. That\'s not bad for a single drink, although you might end up drinking more than one.', '1672747178.png', '0', '2023-01-03 08:59:38', '2023-01-03 08:59:38'),
(306, 'Red Bull Peach Nectarine', 'Beverage', 'energy', NULL, '21', '25', '17608', '100', 'What does peach Red Bull taste like?\r\nIt has a bursting peachy flavor and it gives you plenty of energy for a couple hours. It has a fresh peach taste. This is in the top 10 of my favorite Redbull flavors. It has a very crisp summer time peachy flavor.', '1672747336.png', '0', '2023-01-03 09:02:17', '2023-01-03 09:02:17'),
(307, 'Svedka', 'Beverage', 'vodka', NULL, '324', '330', '48897', '100', 'An award-winning vodka with a pure clear taste and crisp finish made from the finest spring water and swedish winter wheat then distilled five times to remove impurities. Continuous distillation ensures that ingredients are constantly moving so the winter', '1672747444.png', '0', '2023-01-03 09:04:04', '2023-01-03 09:04:04'),
(308, 'Belvedere', 'Beverage', 'vodka', NULL, '234', '249', '21923', '100', 'Purified water and a distillation process by fire, Belvedere contains zero additives, is certified kosher, and is produced in accordance with the legal regulations of Polska Vodka that dictate nothing can be added.', '1672747544.png', '0', '2023-01-03 09:05:44', '2023-01-03 09:05:44'),
(309, 'Kidame Beer', 'Beverage', 'beer', NULL, '23', '24', '48432', '100', 'Enjoy this smooth and fresh lager beer with a great taste. Kidame is artfully brewed with superior quality ingredients and has refreshingly unique taste.', '1672747699.png', '0', '2023-01-03 09:08:19', '2023-01-03 09:08:19'),
(310, 'Malta Guinness', 'Beverage', 'soft', 'pack-12', '59', '60', '40728', '100', 'It is a non alcoholic, adult, premium soft drink. Full of vitalizing goodness, with added vitamins, minerals and slow burning sugars for longer lasting energy.', '1672747789.png', '0', '2023-01-03 09:09:49', '2023-01-03 09:09:49'),
(311, 'Red Onion', 'FruitsVegetables', 'vegetable', '2kg', '12', '15', '22331', '100', 'Red onions are cultivars of the onion (Allium cepa) with purplish-red skin and white flesh tinged with red. These onions tend to be medium to large in size and have a mild flavor.', '1678432575.png', '0', '2023-03-10 04:16:15', '2023-03-10 04:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `country`, `city`, `address`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ethan', 'ethan@gmail.com', '123456', 'ET', 'Adama', 'Kebele 3', NULL, NULL, '2023-02-09 11:47:17', '2023-02-09 11:47:17'),
(2, 'Loco', 'loco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ET', 'Addis Abeba', 'Kaliti', NULL, NULL, '2023-02-13 06:40:12', '2023-02-17 15:48:56'),
(3, 'Naol', 'naol@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ET', 'Adama', 'Tikur Abay', NULL, NULL, '2023-03-24 10:48:29', '2023-03-24 10:48:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
