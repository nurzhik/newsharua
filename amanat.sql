-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2021 г., 12:14
-- Версия сервера: 5.7.23
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `amanat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advantages`
--

CREATE TABLE `advantages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `body` text,
  `type_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advantages`
--

INSERT INTO `advantages` (`id`, `title`, `img`, `body`, `type_id`, `created`, `modified`) VALUES
(4, 'ЭКОНОМИЯ СРЕДСТВ', '0a06f0dbbe8f9b45db126171f0b6c16a.png', 'Разнообразный и богатый опыт начало повседневной работы по', 1, '2021-03-24 13:22:57', '2021-03-24 13:22:57');

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `title`, `img`, `date`, `created`, `modified`) VALUES
(1, 'Альбом amanat drive 1КЗ', '12ddd77a23a8ef878bc71f3b89723f26.png', '2021-03-18', '2021-03-10 15:15:17', '2021-03-24 09:03:53'),
(2, 'Альбом amanat drive 2', 'a4c520b2e6b49cbea23a6813ce10701c.png', '2021-03-18', '2021-03-24 08:47:22', '2021-03-24 08:47:22');

-- --------------------------------------------------------

--
-- Структура таблицы `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `address_ru` varchar(255) DEFAULT NULL,
  `address_kz` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `map_code` varchar(255) DEFAULT NULL,
  `managers` longtext,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `branches`
--

INSERT INTO `branches` (`id`, `address_ru`, `address_kz`, `address_en`, `map_code`, `managers`, `city_id`) VALUES
(1, '    Нурсултан', '    Нурсултан', '    Нурсултан', NULL, '{\"manager\":{\"name\":\"\\u041c\\u0430\\u04402\",\"phone\":\"8777\",\"email\":\"test@mail.ru\"},\"manager1\":{\"name\":\"\\u0421\\u044b\\u043c\\u0431\\u0430\\u0442\",\"phone\":\"87752\",\"email\":\"test2@mail.ru\"},\"manager2\":{\"name\":\"\\u0422\\u0435\\u0441\\u0442\\u043e\\u0432\\u044b\\u0439 3\",\"phone\":\"\\u0422\\u0435\\u0441\\u0442\\u043e\\u0432\\u044b\\u0439 3\",\"email\":\"\\u0422\\u0435\\u0441\\u0442\\u043e\\u0432\\u044b\\u0439 3\"},\"manager3\":{\"name\":\"\\u0439\\u0446\\u0443\\u0439\",\"phone\":\"\\u0446\\u0443\\u0439\\u0446\",\"email\":\"\\u0439\\u0446\\u0443\"},\"manager4\":{\"name\":\"\\u0439\\u0446\\u0443\\u0439\\u0446\\u0443\",\"phone\":\"\\u0439\\u0446\\u0443\",\"email\":\"\\u0439\\u0446\\u0443\\u0439\"}}', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `entrance` int(11) DEFAULT NULL,
  `initial` int(11) DEFAULT NULL,
  `remainder` int(11) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `order_num` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `date`, `entrance`, `initial`, `remainder`, `year`, `price`, `user_id`, `title`, `status`, `order_num`, `created`, `modified`) VALUES
(1, '2021-03-09', 12, 12, 12, '12', '12', 41, 'Mark 234', '12', 1, '2021-03-10', '2021-03-25'),
(2, '2021-03-08', 12, 12, 12, '12', '12', 411, '12', '12', 2, '2021-03-08', '2021-03-10'),
(3, '2021-03-09', 12, 12, 12, '12', '122', 41, '12', '12', 3, '2021-03-09', '2021-03-16'),
(4, '2021-03-10', 1500000, 1500000, 1500000, '1212', '1212', 41, 'Toyota Camry 70', 'Новое', 4, '2021-03-10', '2021-03-10'),
(23, '2021-03-10', 12, 12, 12, '12', '12', 40, '12', '12', 5, '2021-02-09', '2021-03-10'),
(24, '2021-03-02', 12, 12, 12, '12', '12', 12, '12', '12', 6, '2021-02-08', '2021-03-10'),
(25, '2021-03-10', 12, 12, 12, '2021', '12', 41, '12212121', '12', 7, '2021-03-16', '2021-03-25');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_kz` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title_ru`, `title_kz`, `created`, `modified`) VALUES
(1, 'Тестовый ', 'Тестовый кх', '2021-02-01 07:59:57', '2021-02-01 07:59:57'),
(2, 'Тестовый ', 'Тестовый кх', '2021-02-01 08:00:15', '2021-02-01 08:00:15'),
(8, 'Тестовый  312', 'Тестовый кх', '2021-02-01 08:07:49', '2021-02-01 08:12:21'),
(9, 'Тестовый  312', 'Тестовый кх', '2021-02-01 08:11:09', '2021-02-01 08:11:09'),
(10, 'Тестовый  3123', 'Тестовый кх', '2021-02-01 08:11:14', '2021-02-01 08:14:00');

-- --------------------------------------------------------

--
-- Структура таблицы `change_cars`
--

CREATE TABLE `change_cars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `entrance` int(11) NOT NULL,
  `initial` int(11) NOT NULL,
  `remainder` int(11) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `change_cars`
--

INSERT INTO `change_cars` (`id`, `user_id`, `date`, `entrance`, `initial`, `remainder`, `year`, `price`, `title`, `status`, `created`) VALUES
(1, 41, '2021-03-09', 12, 12, 12, '12', '12', '12', '12', '2021-03-25 17:41:06'),
(2, 41, '2021-03-09', 12, 12, 12, '12', '12', '12', '12', '2021-03-25 17:41:27'),
(3, 41, '2021-03-09', 12, 12, 12, '12', '12', 'Mark 2', '12', '2021-03-25 17:42:13'),
(4, 41, '2021-03-09', 12, 12, 12, '12', '12', 'Mark 23', '12', '2021-03-25 17:46:27');

-- --------------------------------------------------------

--
-- Структура таблицы `change_homes`
--

CREATE TABLE `change_homes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `entrance` int(11) NOT NULL,
  `initial` int(11) NOT NULL,
  `remainder` int(11) NOT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `change_homes`
--

INSERT INTO `change_homes` (`id`, `user_id`, `date`, `entrance`, `initial`, `remainder`, `developer`, `price`, `title`, `status`, `created`) VALUES
(1, 31, '2021-03-09', 12, 12, 12, '12', '12', '12', '12', '2021-03-25 18:10:34'),
(2, 41, '2021-03-09', 12, 12, 12, '12', '12', '12', '1231313', '2021-03-25 18:10:44'),
(3, 41, '2021-03-09', 12, 12, 12, '12', '12', 'Аспан', '1231313', '2021-03-25 18:11:23'),
(4, 41, '2021-03-09', 12, 12, 12, '12', '12', 'Аспан2', '1231313', '2021-03-25 18:33:27'),
(5, 41, '2021-03-09', 12, 12, 12, '12', '12', 'Аспан23', '1231313', '2021-03-25 18:35:11');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_kz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `title_en`, `title_ru`, `title_kz`) VALUES
(1, ' Nur Sultan#', 'Нурсултан', ' Нур Султан КЗ#'),
(2, NULL, 'Шымкент', NULL),
(3, NULL, 'Алматы', NULL),
(4, NULL, 'Тараз', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comps`
--

CREATE TABLE `comps` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `media` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comps`
--

INSERT INTO `comps` (`id`, `body`, `media`, `comments`, `created`, `modified`) VALUES
(13, 'Onter — сервис онлайн-консультаций с врачами. Сейчас мы рассматриваем новые клиники для подключения к нашей сети и, если вы управляете клиникой, готовой работать с телемедицинскими консультациями, заполните, пожалуйста, анкету - мы свяжемся с вами, если будем заинтересованы в сотрудничестве.\r\n\r\n \r\n\r\nЕсли вы - практикующий специалист вне клиники, то заполните, пожалуйста, анкету для участия в проекте. Свяжемся с вами, если нас заинтересует ваша кандидатура.', NULL, 'О сервисе текст', '2021-02-01 15:53:04', '2021-02-01 15:53:04'),
(14, '44Wjhelb-5I', NULL, 'О сервисе видео', '2021-02-01 15:53:30', '2021-02-01 15:53:30');

-- --------------------------------------------------------

--
-- Структура таблицы `extradition_cars`
--

CREATE TABLE `extradition_cars` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `entrance` int(11) DEFAULT NULL,
  `initial` int(11) DEFAULT NULL,
  `remainder` int(11) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `extradition_cars`
--

INSERT INTO `extradition_cars` (`id`, `user_id`, `date`, `entrance`, `initial`, `remainder`, `year`, `price`, `title`, `status`, `created`, `modified`) VALUES
(1, 41, '2021-03-10', 21, 12121, 21, '21212', '21', 'Toyota Camry 70', 'Новое', NULL, NULL),
(5, 12, '2021-03-18', 12, 12, 12, '12', '12', '112', '21', NULL, NULL),
(6, 12, '2021-03-18', 12, 21, 12, '12', '12', '12', '12', '2021-03-25 15:30:56', NULL),
(7, 12, '2021-03-27', 12, 12, 12, '12', '12', '12', '12', '2021-03-25 16:00:19', NULL),
(8, 41, '2021-03-10', 12, 12, 12, '12', '12', '12', '12', '2021-03-25 16:00:25', NULL),
(9, 12, '2021-03-10', 12, 12, 12, '12', '12', '12', '12', '2021-03-25 16:12:17', NULL),
(10, 41, '2021-03-10', 12, 12, 12, '123131', '12', '12', '12', '2021-03-25 16:13:02', NULL),
(11, 41, '2021-03-10', 12, 12, 12, '123131', '12', '12212121', '12', '2021-03-25 16:13:19', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `extradition_homes`
--

CREATE TABLE `extradition_homes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `entrance` int(11) NOT NULL,
  `initial` int(11) NOT NULL,
  `remainder` int(11) NOT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `extradition_homes`
--

INSERT INTO `extradition_homes` (`id`, `user_id`, `date`, `entrance`, `initial`, `remainder`, `developer`, `price`, `title`, `status`, `created`) VALUES
(1, 41, '2021-03-25', 1500000, 3000000, 4000000, 'Bi group 2', '4500000', 'ЖК барселона', 'Новое', '2021-03-25 18:03:01');

-- --------------------------------------------------------

--
-- Структура таблицы `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `body`, `created`, `modified`, `sort_order`) VALUES
(1, ' Кз \"әі', '\"әі', '2021-02-01 14:06:26', '2021-02-01 14:15:07', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `album_id`, `img`, `video`) VALUES
(1, 1, '5dcaeee872e2e5e96418103f4d3b8a40.png', 'https://www.youtube.com/watch?v=IljZH7VEWbY'),
(2, 1, '7bc2b0bba3295de0cb8a10ee8c59110d.png', ''),
(3, 1, '', '#'),
(4, 2, 'ed31f7264d0b3b16b5e6ce867f6ab88f.png', '#');

-- --------------------------------------------------------

--
-- Структура таблицы `homes`
--

CREATE TABLE `homes` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `entrance` int(11) DEFAULT NULL,
  `initial` int(11) DEFAULT NULL,
  `remainder` int(11) DEFAULT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `order_num` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `homes`
--

INSERT INTO `homes` (`id`, `date`, `entrance`, `initial`, `remainder`, `developer`, `price`, `user_id`, `title`, `status`, `order_num`, `created`, `modified`) VALUES
(2, '2021-03-09', 12, 12, 12, '123', '112', 40, '12', '12', 1, '2021-03-08', '2021-03-03'),
(3, '2021-03-09', 12, 12, 12, '12', '12', 41, 'Венера', '1231313', 2, '2021-03-24', '2021-03-25');

-- --------------------------------------------------------

--
-- Структура таблицы `i18n`
--

CREATE TABLE `i18n` (
  `id` int(10) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(204, 'ru', 'Album', 1, 'title', 'Альбом amanat drive 13'),
(205, 'ru', 'Album', 2, 'title', 'Альбом amanat drive 2'),
(206, 'kz', 'Album', 1, 'title', 'Альбом amanat drive 1КЗ'),
(207, 'ru', 'Setting', 1, 'old_car_entrance', ' '),
(208, 'ru', 'Setting', 1, 'old_car_initial', ''),
(209, 'ru', 'Setting', 1, 'old_car_time', ' '),
(210, 'ru', 'Setting', 1, 'old_car_membership', ' '),
(211, 'ru', 'Setting', 1, 'new_car_entrance', ' '),
(212, 'ru', 'Setting', 1, 'new_car_initial', ''),
(213, 'ru', 'Setting', 1, 'new_car_time', ' '),
(214, 'ru', 'Setting', 1, 'new_car_membership', ' '),
(215, 'ru', 'Setting', 1, 'home_entrance', ' '),
(216, 'ru', 'Setting', 1, 'home_initial', ''),
(217, 'ru', 'Setting', 1, 'home_time', ' '),
(218, 'ru', 'Setting', 1, 'home_membership', ' '),
(219, 'ru', 'Setting', 1, 'main_title', ' <span>Авто</span> либо <span>квартира</span> в рассрочку на 5 лет'),
(220, 'ru', 'Setting', 1, 'main_desc', 'Как принято считать, представители современных социальных резервов, вне зависимости от их уровня, должны быть в рамках своих собственных рациональных ограничений.'),
(221, 'ru', 'Setting', 1, 'auto_title', ' '),
(222, 'ru', 'Setting', 1, 'auto_desc', ''),
(223, 'ru', 'Setting', 1, 'home_title', ' '),
(225, 'ru', 'Setting', 1, 'home_desc', ''),
(226, 'ru', 'Setting', 1, 'home_text', ' '),
(227, 'ru', 'Advantage', 4, 'title', 'ЭКОНОМИЯ СРЕДСТВ'),
(228, 'ru', 'Advantage', 4, 'body', 'Разнообразный и богатый опыт начало повседневной работы по');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `body` text,
  `short_text` text,
  `date` date DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `alias`, `body`, `short_text`, `date`, `img`, `keywords`, `description`, `view`, `created`, `modified`) VALUES
(1, 9, 'Начата работа по прокладке труб в столице', 'nachata_rabota_po_prokladke_trub_v_stolitse', '<p>Начата работа по прокладке труб в столице</p>\r\n', '123', '2021-02-24', NULL, NULL, NULL, 4, '2021-02-01', '2021-02-01'),
(2, 1, 'Тестовый', 'testovyyi', '<p>Тестовый</p>\r\n', '<p>Тестовый</p>\r\n', NULL, 'f07aa84da7372f5a68387ab99f82ff6e.jpg', NULL, NULL, 2, '2021-02-01', '2021-02-01');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `h1` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `h1`, `keywords`, `description`, `created`, `modified`, `alias`) VALUES
(1, 'Главная', 'Название сервиса - popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Сервис по прокату одежды №1', '1', '2', '2016-09-01 00:00:00', '2016-09-01 00:00:00', '/');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `link`, `img`, `created`, `modified`) VALUES
(1, '#', 'ad00b2560efc94834f683d31ad6169c8.png', '2021-03-11 11:43:58', '2021-03-11 11:43:58');

-- --------------------------------------------------------

--
-- Структура таблицы `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `title_ru` varchar(250) NOT NULL,
  `title_kz` varchar(250) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `title_ru`, `title_kz`, `date`) VALUES
(1, ' Опросник', ' Опросник', '2021-03-20');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_kz` varchar(255) DEFAULT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `title_ru`, `title_kz`, `questionnaire_id`, `created`, `modified`) VALUES
(1, 'Тест12', 'Тест13', 1, '2021-03-17 15:06:51', '2021-03-17 15:30:32'),
(2, 'Тест12', 'Тест13', 1, '2021-03-17 15:31:28', '2021-03-17 15:31:28'),
(3, 'Тест3', 'Тест3', 1, '2021-03-19 15:58:15', '2021-03-19 15:58:15');

-- --------------------------------------------------------

--
-- Структура таблицы `request_cars`
--

CREATE TABLE `request_cars` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `iin` bigint(20) NOT NULL,
  `car_id` int(11) NOT NULL,
  `car` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request_cars`
--

INSERT INTO `request_cars` (`id`, `fio`, `phone`, `iin`, `car_id`, `car`, `price`, `created`) VALUES
(1, 'ТЕстовый', '+7 (333) 333 33 33', 123, 1, 'Mark 2', '123123', '2021-03-25 16:38:30'),
(2, 'ТЕстовый', '+7 (333) 333 33 33', 123, 1, 'Mark 2', '123123', '2021-03-25 16:38:30'),
(3, 'ТЕстовый', '+7 (333) 333 33 33', 123, 1, 'Марк 2', '123456789', '2021-03-25 16:38:56'),
(4, 'ТЕстовый', '+7 (333) 333 33 33', 123, 1, 'Марк 2', '123456789', '2021-03-25 16:38:56');

-- --------------------------------------------------------

--
-- Структура таблицы `request_homes`
--

CREATE TABLE `request_homes` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `iin` bigint(20) NOT NULL,
  `home_id` int(11) NOT NULL,
  `home` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request_homes`
--

INSERT INTO `request_homes` (`id`, `fio`, `phone`, `iin`, `home_id`, `home`, `price`, `created`) VALUES
(1, 'ТЕстовый', '+7 (333) 333 33 33', 123, 3, 'Новая', '1500000', '2021-03-25 18:21:35'),
(2, 'ТЕстовый', '+7 (333) 333 33 33', 123, 3, 'Новая', '1500000', '2021-03-25 18:21:35'),
(3, 'ТЕстовый', '+7 (333) 333 33 33', 123, 3, 'Аспан5', '123', '2021-03-25 18:22:05'),
(4, 'ТЕстовый', '+7 (333) 333 33 33', 123, 3, 'Аспан5', '123', '2021-03-25 18:22:05'),
(5, 'ТЕстовый', '+7 (333) 333 33 33', 123, 3, 'Аспан 6', '123', '2021-03-25 18:22:43');

-- --------------------------------------------------------

--
-- Структура таблицы `responsibles`
--

CREATE TABLE `responsibles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `moderator_fio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `responsibles`
--

INSERT INTO `responsibles` (`id`, `user_id`, `moderator_id`, `moderator_fio`) VALUES
(1, 41, 42, 'МОдератор 1'),
(2, 46, 42, 'МОдератор 1');

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `results` longtext,
  `user_id` int(11) NOT NULL,
  `moderator_id` int(11) DEFAULT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `moderator_fio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`id`, `results`, `user_id`, `moderator_id`, `questionnaire_id`, `moderator_fio`) VALUES
(2, '{\"q1\":{\"question\":\"Тест12\",\"answer\":\"Поддерживаю\",\"desc\":\"\"},\"q2\":{\"question\":\"Тест12\",\"answer\":\"Поддерживаю\",\"desc\":\"\"},\"q3\":{\"question\":\"Тест3\",\"answer\":\"Поддерживаю\",\"desc\":\"\"}}', 41, 42, 1, 'МОдератор 1'),
(3, '{\"q1\":{\"question\":\"Тест12\",\"answer\":\"Поддерживаю\",\"desc\":\"\"},\"q2\":{\"question\":\"Тест12\",\"answer\":\"Не поддерживаю\",\"desc\":\"\"},\"q3\":{\"question\":\"Тест3\",\"answer\":\"Поддерживаю\",\"desc\":\"\"}}', 46, 42, 1, 'МОдератор 1');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `link`, `img`, `created`, `modified`) VALUES
(1, ' #', 'f88f85dff39a6ffe868d8b40ac1d43e0.png', '2021-02-01 14:45:20', '2021-03-24 13:25:53');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `old_car_entrance` varchar(11) DEFAULT NULL,
  `old_car_initial` text,
  `old_car_time` varchar(255) DEFAULT NULL,
  `old_car_membership` varchar(255) DEFAULT NULL,
  `new_car_entrance` varchar(255) DEFAULT NULL,
  `new_car_initial` text,
  `new_car_time` varchar(255) DEFAULT NULL,
  `new_car_membership` varchar(255) DEFAULT NULL,
  `home_entrance` varchar(255) DEFAULT NULL,
  `home_initial` text,
  `home_time` varchar(255) DEFAULT NULL,
  `home_membership` varchar(255) DEFAULT NULL,
  `home_text` text,
  `phone` varchar(255) DEFAULT NULL,
  `insta` varchar(255) DEFAULT NULL,
  `face` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `main_desc` varchar(255) DEFAULT NULL,
  `auto_title` varchar(255) DEFAULT NULL,
  `auto_desc` varchar(255) DEFAULT NULL,
  `home_title` varchar(255) DEFAULT NULL,
  `home_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `created`, `modified`, `old_car_entrance`, `old_car_initial`, `old_car_time`, `old_car_membership`, `new_car_entrance`, `new_car_initial`, `new_car_time`, `new_car_membership`, `home_entrance`, `home_initial`, `home_time`, `home_membership`, `home_text`, `phone`, `insta`, `face`, `youtube`, `main_title`, `main_desc`, `auto_title`, `auto_desc`, `home_title`, `home_desc`) VALUES
(1, '2021-02-05 09:27:22', '2021-03-24 13:13:07', ' ', '', ' ', ' ', ' ', '', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' <span>Авто</span> либо <span>квартира</span> в рассрочку на 5 лет', 'Как принято считать, представители современных социальных резервов, вне зависимости от их уровня, должны быть в рамках своих собственных рациональных ограничений.', ' ', '', ' ', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('user','admin','moderator','') NOT NULL DEFAULT 'user',
  `username` varchar(50) DEFAULT NULL,
  `active` enum('deactivate','activate') DEFAULT 'deactivate',
  `password` varchar(255) DEFAULT NULL,
  `forgetpwd` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `iin` bigint(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `activation` enum('deactivate','activate') NOT NULL DEFAULT 'deactivate',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `active`, `password`, `forgetpwd`, `img`, `fio`, `phone`, `iin`, `address`, `city`, `activation`, `created`, `modified`) VALUES
(1, 'admin', 'admin', '', '$2a$10$eujN90i9HDNEGiMmOnW75.FrHNecBYn/b8SfwJJluuPFX2Cq0J.n2', NULL, '', '', '', NULL, NULL, NULL, 'deactivate', '2015-09-15 13:51:15', '2015-09-15 13:51:15'),
(41, 'user', 'test@mail.ru', 'deactivate', '$2a$10$KJ8wApy3D0YbVd4Vs58SyOdwkqHsFXCHA99VGVnFF5g1envi1ZNOq', '819247', NULL, 'ТЕстовый', '+7 (333) 333 33 33', 123, NULL, NULL, 'deactivate', '2021-03-09 14:19:18', '2021-03-09 14:19:18'),
(42, 'moderator', 'moderator@mail.ru', 'deactivate', '$2a$10$0ipkXRO7/isvM1Ad2lA2ougd1ipm4vT0KSbxf8OOf0SG6rmvDu8YK', NULL, NULL, 'МОдератор 1', NULL, NULL, NULL, NULL, 'deactivate', '2021-03-18 13:09:17', '2021-03-18 13:09:17'),
(43, 'moderator', 'moderator2@mail.ru', 'deactivate', '$2a$10$7iS2WyOoqUKriUNypD8pZub5PEh8TY173f/o.wnG6a5PtnmyvJ1rq', NULL, NULL, 'МОдератор 2', NULL, NULL, NULL, NULL, 'deactivate', '2021-03-18 13:10:00', '2021-03-18 13:10:00'),
(44, 'user', 'client2@mail.ru', 'activate', '$2a$10$ICaam2NX8m3yfs7urrf1zuddp9mZDr14/xHvEwFLWoFQx/y8QB3A6', '889285', NULL, 'Клиент2 ', '+7 (777) 777 77 77', 940309350448, NULL, NULL, 'deactivate', '2021-03-19 14:09:33', '2021-03-19 14:09:33'),
(46, 'user', 'nurzhananuarbek@mail.ru', 'deactivate', '$2a$10$j6G.ZEUKQsrGRm56NN8gOOoDo7esQSAqckdIqzLKWvM7ghvQUFvlS', '598477', NULL, 'Клиент3', '+7 (777) 777 77 77', 940309350448, 'Петрова 13', 'Астана', 'deactivate', '2021-03-26 12:54:07', '2021-03-26 13:42:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `change_cars`
--
ALTER TABLE `change_cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `change_homes`
--
ALTER TABLE `change_homes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comps`
--
ALTER TABLE `comps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `extradition_cars`
--
ALTER TABLE `extradition_cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `extradition_homes`
--
ALTER TABLE `extradition_homes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locale` (`locale`),
  ADD KEY `model` (`model`),
  ADD KEY `row_id` (`foreign_key`),
  ADD KEY `field` (`field`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request_cars`
--
ALTER TABLE `request_cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request_homes`
--
ALTER TABLE `request_homes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `responsibles`
--
ALTER TABLE `responsibles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `change_cars`
--
ALTER TABLE `change_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `change_homes`
--
ALTER TABLE `change_homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comps`
--
ALTER TABLE `comps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `extradition_cars`
--
ALTER TABLE `extradition_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `extradition_homes`
--
ALTER TABLE `extradition_homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `request_cars`
--
ALTER TABLE `request_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `request_homes`
--
ALTER TABLE `request_homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `responsibles`
--
ALTER TABLE `responsibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
