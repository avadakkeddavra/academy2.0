-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 24 2018 г., 08:56
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `academy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cafedras`
--

CREATE TABLE `cafedras` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `description` text,
  `header_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cafedras`
--

INSERT INTO `cafedras` (`id`, `name`, `img`, `description`, `header_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hammes, Friesen and Glover', 'for-students3.jpg', '<p>Culpa voluptatibus sunt sunt quis sed velit fuga. Repellendus ipsam ducimus aut qui. Aut quia provident nihil sit deserunt quod est a.</p>', 59, '2018-01-12 17:04:06', '2018-03-03 15:54:21', NULL),
(2, 'Lebsack-Keebler', NULL, 'Vero molestiae quod suscipit est. Aliquam dolor sunt culpa qui et voluptatibus officiis. Voluptate non nisi quaerat nostrum. Vero illum totam et amet ratione et.', 63, '2018-01-12 17:04:06', '2018-02-22 13:42:24', NULL),
(3, 'Casper PLC', NULL, 'Omnis fuga minus vel voluptatem maxime. Ipsam quas quia consectetur. Aut vel molestiae autem.', 26, '2018-01-12 17:04:06', '2018-02-22 13:42:26', NULL),
(4, 'Bogisich, Turner and Greenholt', NULL, 'Dolorem dolor suscipit beatae itaque consequatur perspiciatis. Accusamus ratione cupiditate repellat quos. Est laborum animi enim modi sint vel ut. Expedita unde voluptatem aut explicabo ratione.', 66, '2018-01-12 17:04:06', '2018-02-22 13:42:29', NULL),
(5, 'Schneider, Kirlin and Trantow', NULL, 'A ut reprehenderit dolorem suscipit tempora. Vitae et ex a aut. Aperiam delectus exercitationem cupiditate aperiam recusandae exercitationem. Voluptatem quo non iste. Eos cum id nisi optio.', 49, '2018-01-12 17:04:06', '2018-02-22 13:42:31', NULL),
(6, 'Kunde-Hartmann', NULL, 'Non voluptas fugiat maiores vel quos autem reiciendis. Omnis eligendi error incidunt repudiandae maxime esse nisi. Ut reiciendis illo facilis consectetur tempora vero qui.', 7, '2018-01-12 17:04:06', '2018-02-22 13:42:34', NULL),
(7, 'Деканат', NULL, NULL, 15, '2018-01-21 14:15:14', '2018-02-22 13:42:40', NULL),
(8, 'Caferdras', NULL, '<p>asdasd</p>', 4, '2018-03-03 13:58:46', '2018-03-03 15:48:11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `caf_id` int(10) UNSIGNED DEFAULT NULL,
  `type` int(2) UNSIGNED DEFAULT '0',
  `priority` int(2) UNSIGNED DEFAULT '1',
  `title` varchar(256) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `text` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `caf_id`, `type`, `priority`, `title`, `img`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(64, 7, 0, 1, 'ГРАФІК НАВЧАЛЬНОГО ПРОЦЕСУ', 'for-students1.jpg', '<p>Графік навчального процесу на поточний навчальний рік зазначає тривалість навчальних семестів, аудиторних занять, екзаменаційної сесії, практик, дипломування, підсумкової атестації, канікул.</p>', '2018-02-26 15:00:08', '2018-02-26 15:00:08', NULL),
(65, 7, 0, 1, 'Розклад занять', 'fotolia52486650m.jpg', '<p>Аудиторі навчання проводяться згідно затвердженого розкладу занять на поточний семестр навчального року. Нагадуємо, що перша пара занять починається о 08-45. Тривалість кожної пари 1 година 20 хвилин.</p>', '2018-02-26 15:01:04', '2018-03-03 15:50:28', NULL),
(66, 7, 0, 1, 'Розклад сесії', 'charts.jpg', '<p>\nРозклад занять встановлюється на поточний семестр навчального року.</p>', '2018-02-26 15:01:43', '2018-02-26 17:03:21', NULL),
(67, 1, 0, 1, 'Новость', 'G110110_7.jpg', '<p>фывыфвыфвфыв</p>', '2018-03-24 05:55:47', '2018-03-24 05:55:47', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `caf_id` int(10) UNSIGNED DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `caf_id`, `position`, `img`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Станислав Владимирович Солодухин', 7, 'Dekan', 'teacher_solodulhin.jpg', 'Id aut iusto occaecati autem qui possimus sapiente. Voluptates excepturi blanditiis odio et. Iure nihil molestias est rerum beatae sunt qui. Ducimus perferendis pariatur est exercitationem porro.', '2018-01-12 17:07:50', '2018-02-22 14:52:06', NULL),
(2, 'Rupert Kerluke', 7, 'Manager', NULL, 'Animi error minus sit atque. Corporis cupiditate et officia. Dolorum accusantium quia doloremque et fuga.', '2018-01-12 17:07:50', '2018-02-22 12:45:32', NULL),
(3, 'Merritt Jakubowski PhD', 7, 'Teacher', NULL, 'Excepturi explicabo et atque possimus corrupti. Dolore sit recusandae corporis. Voluptas at quo aut perspiciatis. Suscipit sit ut aperiam magnam error quasi. Aut exercitationem dolores ratione.', '2018-01-12 17:07:50', '2018-02-22 12:45:41', NULL),
(4, 'Sim Kreiger PhD', 7, NULL, NULL, 'Quasi mollitia architecto perferendis. Rerum natus est sed harum adipisci quae suscipit. Sit quisquam necessitatibus voluptatem et accusamus sint voluptas temporibus. Ipsa illum autem in.', '2018-01-12 17:07:50', '2018-02-24 15:29:00', NULL),
(5, 'Kiera Stamm', 3, NULL, NULL, 'Sint rerum cumque nobis nihil. Rem neque hic nulla beatae eius. Quisquam praesentium repellat a aspernatur et harum.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(6, 'Bradley Dare', 6, NULL, NULL, 'Dolor fugit quod explicabo qui porro fuga. Optio tempore tempore nesciunt eligendi repellendus qui. Numquam in omnis maiores eveniet aliquam. Provident at laboriosam vero rerum deserunt magnam.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(7, 'Astrid McClure', 4, NULL, NULL, 'Officiis quia cupiditate veritatis ut. Earum vero eligendi nihil sed quis quisquam. Et tempora voluptatem non iste nulla. Labore facere perferendis eligendi qui velit.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(8, 'Mr. Wilburn Moen', 4, NULL, NULL, 'Molestiae distinctio dignissimos qui omnis excepturi. Et voluptates quas aliquam architecto consequuntur. At aperiam cupiditate veritatis eveniet. Asperiores labore illum sit consequatur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(9, 'Mrs. Kasey Strosin', 5, NULL, NULL, 'Sed soluta omnis tenetur eaque placeat et libero. Et ea commodi omnis sit nisi molestiae. Laboriosam nisi molestiae atque esse totam omnis consequatur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(10, 'Prof. Ed Grant', 2, NULL, NULL, 'Itaque expedita est suscipit quis. Illo quisquam voluptas at fuga quia aut inventore. Sed qui id et consequuntur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(11, 'Lonie Mills', 2, NULL, NULL, 'A dignissimos harum impedit suscipit. Aspernatur voluptates fugiat quod sed.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(12, 'Eddie Gleason', 3, NULL, NULL, 'Temporibus natus suscipit fugit maxime recusandae quas ducimus. Architecto eveniet dolorum odio ad. Blanditiis fugiat ea voluptas omnis et delectus.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(13, 'Dr. Abbigail Kling', 4, NULL, NULL, 'Aperiam laboriosam nihil ut itaque impedit nobis et. Inventore corporis similique quia ea qui molestias. Impedit placeat harum iusto iure voluptas reiciendis dolor. Ea vero fuga architecto est.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(14, 'Aleen Trantow Jr.', 1, NULL, NULL, 'Facere fuga consectetur dolore asperiores nihil. Quis quia recusandae maiores.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(15, 'Dr. Hayley Langosh', 3, NULL, NULL, 'Repellat sed maiores eveniet doloremque. Non veniam labore quos libero id quis commodi. Error iure sint sed labore nemo.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(16, 'Mr. Rasheed Lind', 6, NULL, NULL, 'Voluptas voluptatem sint iusto porro voluptas. Modi corporis occaecati ut itaque qui qui cupiditate. Consequatur voluptas qui omnis a repellat.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(17, 'Renee Legros', 5, NULL, NULL, 'Eius voluptatem minima pariatur odio. Quidem sint voluptas in numquam ut hic sed. Et quaerat veniam non consequatur mollitia aut.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(18, 'Prof. Misael Kris II', 6, NULL, NULL, 'Et ut iusto pariatur mollitia est quisquam consequatur. Adipisci omnis quo molestiae est nostrum. Molestiae animi assumenda ipsa odit tenetur quidem. Et laboriosam corporis est porro hic.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(19, 'Breanne Fahey', 4, NULL, NULL, 'Ut autem aut animi quia eum amet eum inventore. Voluptas numquam magni sit corrupti totam qui. Perferendis aut officia ut natus magnam itaque commodi quo. Fugit quia neque est voluptatem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(20, 'Brandyn Luettgen', 3, NULL, NULL, 'Pariatur corrupti voluptatem non sequi dolorem harum dolorem dignissimos. Nobis est reprehenderit labore debitis consequatur. Laborum quia voluptatem similique.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(21, 'Amie Greenfelder', 5, 'Teacher', NULL, 'Et eveniet quis assumenda recusandae assumenda praesentium. Aliquam fugit alias placeat doloribus dolor. Et tempore ratione eligendi voluptatum.', '2018-01-12 17:07:50', '2018-02-08 19:19:07', NULL),
(22, 'Audie Cruickshank DVM', 2, NULL, NULL, 'Est est consequatur molestias tenetur velit quia maxime. Rerum enim at dolorum inventore. Ex et dolore laudantium quibusdam deserunt ut. Vel consequatur animi delectus sit nostrum quasi ex.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(23, 'Trace Spencer', 6, NULL, NULL, 'Dolor vel non atque non labore officiis. Reprehenderit tenetur omnis quia autem. Dolorem omnis quam dolores molestias.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(24, 'Verla Hegmann I', 5, NULL, NULL, 'Qui sed sit est velit. Temporibus aut sint officiis vel sit. Sequi sit quo hic soluta. Modi voluptatem ea ut in laborum.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(25, 'Prof. Stan Mayert MD', 2, NULL, NULL, 'Non voluptas in sint nisi. Deserunt maiores inventore laboriosam consequatur doloremque dolores minus perspiciatis. Doloremque et voluptatem porro. Veniam ea perferendis totam blanditiis qui.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(26, 'Afton Murazik', 1, NULL, NULL, 'Ipsa at laudantium enim odio facilis iure ut. Accusantium modi hic asperiores nam omnis at. Nemo culpa tempora animi tenetur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(27, 'Audreanne Reinger', 6, NULL, NULL, 'Aperiam dolorem earum eum autem maiores voluptas. Ut quidem laudantium quas explicabo velit sunt. Quas possimus illum veritatis. Omnis velit voluptatibus neque quia totam.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(28, 'Bonnie Denesik', 5, NULL, NULL, 'Sed reprehenderit aliquam quo molestias rem sunt possimus sint. Voluptate itaque voluptatum id animi est inventore. Eos et eos a praesentium iusto exercitationem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(29, 'Marvin Lebsack', 6, NULL, NULL, 'Dolorem quia quia culpa est architecto odio nisi. Est rerum odit autem et in. Recusandae quisquam accusamus quam rerum numquam inventore autem. Libero culpa adipisci occaecati.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(30, 'Granville Oberbrunner III', 1, NULL, NULL, 'Eligendi pariatur est iure dolorem odit. Modi ea et facilis. Nisi ullam ipsa dolor sequi tenetur. Distinctio est autem et numquam non architecto eos qui.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(31, 'Yvette Leffler', 6, NULL, NULL, 'Enim quod beatae quo. Neque nostrum molestiae nobis. Deserunt sunt et harum modi rerum ducimus illo praesentium.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(32, 'Dr. Niko Hilpert', 4, NULL, NULL, 'Aliquid esse voluptatem quod facere ipsa veniam. Et quia omnis veritatis sit. Ut aut nam odio quia quia.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(33, 'Renee Anderson', 5, NULL, NULL, 'Consequatur inventore ut sit a vel voluptas. Eaque pariatur nobis nihil odio libero cupiditate. Dolorum non tempore ducimus pariatur fuga perspiciatis.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(34, 'Moshe Koss', 6, NULL, NULL, 'Eos suscipit ut recusandae. Molestiae est atque dolores quos provident temporibus qui. Dolores exercitationem et et et expedita.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(35, 'Berniece Jacobs', 3, NULL, NULL, 'Amet quia rerum dolores voluptates officiis. Perferendis corrupti et et ea sunt. Qui alias ex voluptas minus libero corporis accusantium.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(36, 'Jovan Morar', 6, NULL, NULL, 'Neque nihil quisquam placeat minima porro modi. Omnis minus optio unde architecto consequatur. Et rem aut deleniti ab et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(37, 'Dr. Augusta Rath', 6, NULL, NULL, 'Illo magnam ut sapiente. Sint modi enim in corporis rem ut. Dolorum minima tenetur quo non tempora. Ab dignissimos ad ullam aut in at qui.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(38, 'Maud Reilly V', 6, NULL, NULL, 'Natus sit et libero commodi eligendi mollitia eos dolorem. Recusandae et expedita ex id dolores magni. Qui eligendi suscipit sed eligendi rerum. Enim eos quidem adipisci dolor.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(39, 'Mr. Lane Bednar', 6, NULL, NULL, 'Vel consequatur enim nisi numquam perferendis fugit dolore. Autem velit quia ut minima. Sed voluptatem saepe culpa necessitatibus quis accusamus. Voluptatem deleniti harum tempora quaerat.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(40, 'Destinee Wehner', 5, NULL, NULL, 'Tempore velit autem reiciendis et velit voluptatum. Architecto pariatur maiores eos blanditiis harum. Ut eveniet distinctio sapiente ab fugit quaerat et ullam.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(41, 'Ellsworth Hoeger', 5, NULL, NULL, 'Architecto sunt voluptate numquam ut et. Animi quas autem earum voluptates rerum eius ipsam aut. Eveniet perspiciatis fuga inventore aut sed. Debitis iusto dolores praesentium repudiandae et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(42, 'Greg Mohr', 1, NULL, NULL, 'Qui itaque ut aliquam voluptas eligendi tenetur. Optio quia dicta incidunt. Modi dignissimos aliquam consequatur quos sunt laboriosam molestias deserunt. Soluta eveniet nisi soluta mollitia.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(43, 'Emerald Becker', 5, NULL, NULL, 'Est accusamus provident non impedit corporis autem. Voluptate quod earum voluptatem aut voluptatem. Eum rem officiis pariatur quidem at fugit. Ut odit repudiandae nesciunt.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(44, 'Stanley Hammes', 5, NULL, NULL, 'Quia illum molestiae qui veritatis voluptas. Nihil blanditiis asperiores eum neque. Corrupti asperiores consectetur minus voluptatem et officia.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(45, 'Mrs. Stephanie Shanahan II', 1, NULL, NULL, 'Qui velit ut voluptas mollitia repellat quis ea pariatur. Est vel non numquam. Perferendis asperiores fugiat dolorem impedit. Quisquam quis excepturi eaque odit natus rem qui. Vel non nihil ut.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(46, 'Prof. Carter Swift', 5, NULL, NULL, 'Numquam impedit esse inventore et consequatur. Adipisci repellat iure sequi aliquam error ut dignissimos. Dolore sed nemo sunt repudiandae. In illo nemo ipsam excepturi voluptas amet.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(47, 'Lilyan O\'Connell', 6, NULL, NULL, 'Ab qui voluptas beatae. Animi velit consectetur perspiciatis magnam. Distinctio asperiores quod voluptatem facere ut.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(48, 'Prof. Rosalia Kihn Jr.', 1, NULL, NULL, 'Sed quia voluptatem dolorem neque. Repellendus in aut et. Qui ut asperiores vitae consequatur qui. Inventore tempora maxime aliquid.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(49, 'Aaliyah Willms', 6, NULL, NULL, 'Voluptatem modi accusamus non rerum. Voluptas error eos in exercitationem quia sequi animi ut. Id recusandae asperiores cupiditate omnis. Totam sunt quia animi eos earum culpa.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(50, 'Leann Hoppe', 6, NULL, NULL, 'Perspiciatis quasi eum sequi explicabo id est numquam. Totam alias autem eveniet debitis. Rerum aut mollitia qui qui repellendus possimus voluptas. Illum temporibus molestiae et qui dolor dolorem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(51, 'Kole Lind', 1, NULL, NULL, 'Deleniti quis deleniti vel delectus. Velit sapiente modi esse dolorem vel nulla eius. Possimus alias ipsum quo rem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(52, 'Tianna Wehner PhD', 5, NULL, NULL, 'Atque omnis eum labore quo. Tempore tempora qui et aut vel harum sint. Ab et incidunt alias dignissimos. Inventore illo voluptas temporibus quae.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(53, 'Mrs. Alicia Lind MD', 1, NULL, NULL, 'Porro quibusdam rerum tempora neque nostrum natus. Aut id eos quo perferendis. Aut est ut quis cum quam illum.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(54, 'Herbert Mills', 1, NULL, NULL, 'Enim qui expedita voluptas vel et odio. Voluptate laudantium delectus iure laboriosam consectetur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(55, 'Vance Schroeder', 6, NULL, NULL, 'Quo molestiae aliquid expedita qui et. Consequatur qui quasi ut autem impedit. Atque culpa vel eum ea culpa voluptas et. Omnis et voluptatem consequatur praesentium quidem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(56, 'Hugh Jerde', 2, NULL, NULL, 'At quod est iusto voluptates. Provident exercitationem facere sed architecto assumenda odit veniam.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(57, 'Robyn Adams', 4, NULL, NULL, 'Quasi pariatur sunt debitis maiores saepe et quas mollitia. Excepturi ex labore iste vero sapiente. Quo possimus mollitia dolor. Qui similique quia sint.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(58, 'Orion Eichmann', 2, NULL, NULL, 'Incidunt sunt molestiae velit nihil impedit facere quae corrupti. Magnam dignissimos velit rem. Ea dolor necessitatibus et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(59, 'Genoveva Haag', 3, NULL, NULL, 'Et ipsum error temporibus iste. Necessitatibus eveniet praesentium sit rerum consequatur numquam cum. Enim non aut suscipit et aliquam vero officia.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(60, 'Raleigh Mraz IV', 3, NULL, NULL, 'Quidem mollitia et est ab laborum. Voluptas ut repellendus dolorem officiis distinctio sapiente expedita dolores. Et est error nihil veniam porro odit. Modi totam sunt sunt velit.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(61, 'Pinkie Upton II', 6, NULL, NULL, 'Saepe eos maiores eos in nesciunt omnis vel. Rerum quisquam ratione et sapiente. In ut perferendis explicabo voluptatem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(62, 'Ronaldo Kihn', 5, NULL, NULL, 'Rem quia error et est qui quia. Nihil voluptatem dolores voluptas architecto. Reprehenderit odit cumque ut rem. Et ut sunt similique explicabo nihil. Voluptatem ab vel architecto maxime fuga non.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(63, 'Anita Hermiston', 1, NULL, NULL, 'Sed repudiandae voluptas deserunt sit itaque. Error doloribus inventore sapiente. Laudantium laboriosam iusto quis laborum ipsum. Temporibus omnis quam consequatur quae.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(64, 'Joannie Littel PhD', 1, NULL, NULL, 'Tempora aspernatur ratione fuga natus exercitationem quam tempora. Porro cum similique cupiditate id. Officiis repellendus asperiores dolore reprehenderit. Beatae reiciendis doloremque nam ex at.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(65, 'Edgardo Kuphal', 2, NULL, NULL, 'Fugiat sint eveniet eum explicabo et et excepturi. Et magni quas maxime natus iure ipsam quos hic. Id velit consequatur ipsa facere.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(66, 'Addison Tromp II', 5, NULL, NULL, 'Perspiciatis molestiae quia eligendi dolor atque eligendi fugit. Sunt reprehenderit consequatur non totam. Facilis ipsa distinctio quidem aperiam. Dignissimos nam vitae culpa quos eveniet.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(67, 'Dr. Rollin Monahan', 3, NULL, NULL, 'Dolorem non non itaque autem aut. Reprehenderit et quaerat laboriosam dicta. Fuga et voluptas dolorem dolores. Accusamus iusto quia sunt voluptatum iure adipisci. Ad sed modi doloremque natus.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(68, 'Liana Dicki DVM', 3, NULL, NULL, 'Porro dolores quia in porro. Eos dolores eveniet labore blanditiis voluptatibus quo. Illo laborum pariatur ea beatae impedit error et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(69, 'Prof. Sabrina Quitzon IV', 6, NULL, NULL, 'Nihil exercitationem qui est est quia animi. Ex sunt voluptas harum.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(70, 'Rosario Daugherty', 6, NULL, NULL, 'Dolor fugit dolorem culpa tempore ut et nihil ex. Cum eum iusto est voluptas sit id quibusdam. Nobis quis dolor facilis quam. Vel omnis aut suscipit quia dolor.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(71, 'Prof. Xander Lueilwitz', 6, NULL, NULL, 'Ab officia ratione quasi amet error quod eos. Aliquid est dignissimos voluptatem rerum aut et. Deserunt nemo porro et. Reprehenderit iste quidem distinctio quaerat.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(72, 'Marty Rippin II', 2, NULL, NULL, 'Atque qui ipsum dolorem corrupti. Sit id velit numquam minus iure tenetur. Omnis id est eum repellendus.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(73, 'Rudy Wolff', 1, NULL, NULL, 'Eum voluptas et sunt assumenda quia. Vero eaque repellendus eum et non fugit magni qui. Quisquam nihil exercitationem suscipit aspernatur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(74, 'Matt Feil', 1, NULL, NULL, 'Blanditiis repudiandae dolore quis eum. Sed sed dolorem ratione laborum aut. Doloribus iusto aut omnis eum voluptas non. Excepturi alias modi sunt repellendus nam ex.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(75, 'Margarita Ortiz', 5, NULL, NULL, 'Est ipsam et eum ea. Et aut error excepturi totam aspernatur. Excepturi culpa incidunt ipsam omnis perferendis at qui.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(76, 'Kelly Kris', 4, NULL, NULL, 'Iure assumenda maxime rerum itaque. Corporis ab natus ea maiores voluptatem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(77, 'Mrs. Margret Williamson', 1, NULL, NULL, 'Quod culpa similique ut necessitatibus voluptas eum et. Maiores rerum quam exercitationem soluta nihil est. Placeat enim et eos dignissimos ut. Voluptatem rerum adipisci alias dolores impedit.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(78, 'Prof. Cary Greenholt MD', 3, NULL, NULL, 'Et sed voluptas nostrum. Et facere similique ex perspiciatis beatae adipisci. Perferendis aut eius fuga nemo magnam.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(79, 'Meagan Leannon', 6, NULL, NULL, 'Aut fugiat pariatur at molestiae quisquam repudiandae. Eum veritatis deserunt omnis inventore. Amet ab quia libero voluptatem.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(80, 'Freeda Brekke', 6, NULL, NULL, 'Consequatur dolore consectetur dolor voluptatibus. Explicabo consequatur ut illo provident asperiores soluta excepturi. Et autem ut incidunt. Qui fugit vel nulla voluptate ut quia.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(81, 'Miss Loraine Gottlieb', 6, NULL, NULL, 'Est temporibus vero dignissimos dolorem sit sunt. Id nesciunt corrupti labore nulla itaque neque nemo dignissimos. Iusto quo temporibus voluptatum rerum inventore. Ea dolores itaque ut placeat rerum.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(82, 'Delphine Blick', 3, NULL, NULL, 'Non officia mollitia sed quia qui qui aut. Voluptatem consequatur quisquam perferendis vitae. Voluptatem non odio sequi aut.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(83, 'Lorna Ebert', 4, NULL, NULL, 'Omnis nobis odit et amet quidem et enim. Qui aut molestias delectus corrupti ut.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(84, 'Sadie Fritsch', 1, NULL, NULL, 'Iusto dolores blanditiis vel esse delectus consequuntur. Minima repellendus laudantium voluptatem similique nam. Voluptatum odit voluptas ea qui ut animi. Qui quam id libero sapiente.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(85, 'Jessika Larson Jr.', 2, NULL, NULL, 'Impedit et laboriosam rerum ratione. Id dolore incidunt libero quisquam explicabo rerum. Autem et ducimus debitis quo non vitae facere quia.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(86, 'Levi Green', 1, NULL, NULL, 'Fugit et assumenda impedit amet voluptatem. Magni amet porro aliquid eum eos. Et voluptatem suscipit atque ex quia sunt consequatur.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(87, 'Lily O\'Hara', 2, NULL, NULL, 'Aliquam perferendis dolorum totam qui architecto reiciendis voluptatem error. Reprehenderit soluta qui neque rerum. Vero ut eum et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(88, 'Margaret Hegmann', 1, NULL, NULL, 'Laborum voluptatem hic et laborum porro. Accusantium perferendis deleniti soluta distinctio et est illo.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(89, 'Ebba Kiehn', 5, NULL, NULL, 'Vel ab ratione quia sed non est ut. Suscipit sunt et ad aliquid esse. Nulla sint soluta libero neque.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(90, 'Bonita Schaden', 5, NULL, NULL, 'Illum architecto occaecati tempore qui. Provident nemo rem ex recusandae. Quia aut quo dolores ea.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(91, 'Elinore Schroeder', 2, NULL, NULL, 'Velit sint id et dignissimos in. Unde exercitationem vero alias omnis. Occaecati consequatur quisquam ut illum voluptatem ut eveniet.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(92, 'Kiara Nienow', 1, NULL, NULL, 'Qui nam nihil non culpa aut. Molestiae nihil vel magnam ut molestiae fugiat. Molestias voluptas et est consequatur ea sunt sint et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(93, 'Prof. Bret Cassin II', 3, NULL, NULL, 'Vitae quibusdam vitae aliquid ipsa veniam error dolorum. Nobis magni repudiandae placeat similique quaerat molestiae. Dolor ut accusamus tempora. Sit saepe natus quis et.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(94, 'Matteo Altenwerth', 4, NULL, NULL, 'Est velit autem a quo eveniet. Nesciunt nostrum repellendus magni asperiores. Quia et quos voluptatem nobis possimus. Nemo et veniam nemo.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(95, 'Shemar Douglas DVM', 5, NULL, NULL, 'Perspiciatis laudantium quia error accusantium eos enim dolore. Eveniet unde est iure et quo. Eos rerum consequuntur dolores molestias aut.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(96, 'Ms. Susie Carter', 1, NULL, NULL, 'In tempore autem exercitationem eos in praesentium. Non sapiente saepe in eum. Occaecati quibusdam expedita veritatis commodi provident a.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(97, 'Baby Runolfsdottir DDS', 1, NULL, NULL, 'Commodi voluptatibus ipsum impedit iure. Libero quo ut architecto ea consequuntur non. Accusamus sint veniam et quaerat quo.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(98, 'Prof. Consuelo Daniel PhD', 3, NULL, NULL, 'Omnis ullam rem alias. Non et omnis voluptas aut ipsum veniam occaecati. Id aut sed sed quo et rem voluptas.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(99, 'Gwendolyn Maggio', 1, NULL, NULL, 'Dolor qui voluptas eaque omnis repellat dolor. Facere laboriosam ipsum eius facilis maxime illo. Et eaque maxime a qui vero. Est et distinctio eum est non.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(100, 'Joannie Bergstrom', 5, NULL, NULL, 'Et voluptatum aperiam natus quae ipsa inventore similique. Nam nam quaerat consequatur illum cumque. Et est quas accusantium quia ea ipsam. Iusto qui rerum dolore alias quasi voluptate doloremque.', '2018-01-12 17:07:50', '2018-01-12 17:07:50', NULL),
(104, 'TestTeacher', 4, 'Some', 'G150915_3.jpg', '<p>Desc</p>', '2018-03-03 16:18:06', '2018-03-03 16:24:13', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'avadakkeddavra@gmail.com', 1, '$2y$10$Rexbd1CZ6ZjnGS6HfPHiqOC39yPW/1MxO6Zz9y46nY2KpZkly/e3m', 'hafNnro3mgHGjueGsLfN2aqr0XD9XkCWwKErQtQkAvoQ0Jh6jujIXqh3zy9E', '2018-01-17 08:06:21', '2018-01-17 08:06:21'),
(2, 'Name', 'user@gmail.com', 1, '$2y$10$udDgkTu5MgbFs1G1Q8RgKewwbzio02RrllG4GREwPDmIxDPRgQOGO', 'xrZkhGLe5W1jYwqQJtFQMyBSKfBCfQxRMCQoVLBJIpx0HkAv0ffZOB61oSAn', '2018-03-10 11:12:11', '2018-03-10 11:12:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cafedras`
--
ALTER TABLE `cafedras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cafedras_teachers` (`header_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_news_cafedras` (`caf_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_teachers_cafedras` (`caf_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cafedras`
--
ALTER TABLE `cafedras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cafedras`
--
ALTER TABLE `cafedras`
  ADD CONSTRAINT `FK_cafedras_teachers` FOREIGN KEY (`header_id`) REFERENCES `teachers` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_cafedras` FOREIGN KEY (`caf_id`) REFERENCES `cafedras` (`id`);

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `FK_teachers_cafedras` FOREIGN KEY (`caf_id`) REFERENCES `cafedras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
