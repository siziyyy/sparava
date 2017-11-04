-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.37 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица fruit.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `bonus` int(11) unsigned NOT NULL,
  `create_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.accounts: 3 rows
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT IGNORE INTO `accounts` (`account_id`, `email`, `password`, `name`, `phone`, `bonus`, `create_date`) VALUES
	(7, 'tural.pro@gmail.com', '99a13ba9b0dc746b7d348a80c27de6b8', 'Турал', '12312312', 0, 1507141325),
	(8, 'qwe', 'c30b912ab2beb36c3c1fb8413fd98026', 'qwe', 'qwe', 0, 1508956131),
	(9, 'qwe@ya.ru', '9c538527828fb0a115d24f170f9e6a03', 'qwe', 'qwe', 0, 1508957075);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `parent_id` int(11) unsigned DEFAULT '0',
  `sort_order` int(10) unsigned NOT NULL,
  `in_main_menu` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `class` varchar(128) DEFAULT '',
  `first_line` tinyint(1) DEFAULT '0',
  `seo_url` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.categories: 165 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`category_id`, `title`, `description`, `status`, `parent_id`, `sort_order`, `in_main_menu`, `class`, `first_line`, `seo_url`) VALUES
	(1, 'Мясо', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(2, 'Птица', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(3, 'Рыба', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(4, 'Морепродукты', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(5, 'Деликатесы', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(6, 'Полуфабрикаты', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(7, 'Кулинария', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(8, 'Заморозка', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(9, 'Бакалея', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(10, 'Консервация', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(11, 'Соления', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(12, 'Соусы', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(13, 'Молочные продукты', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(14, 'Фрукты', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(15, 'Овощи, зелень, грибы', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(16, 'Орехи и сухофрукты', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(17, 'Приправы', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(18, 'Растительные масла', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(19, 'Хлеб и лаваш', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(20, 'Хлебцы и снэки', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(21, 'Сладости', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(22, 'Торты и пирожные', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(23, 'Мед', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(24, 'Чай', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(25, 'Кофе', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(26, 'Вода и напитки', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(27, 'Соки и компоты', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(28, 'Продукты из стран мира', NULL, 1, 0, 0, 1, NULL, 0, NULL),
	(29, 'Говядина', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(30, 'Мраморная говядина', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(31, 'Телятина', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(32, 'Баранина', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(33, 'Свинина', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(34, 'Оленина', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(35, 'Другое мясо', NULL, 1, 1, 0, 1, NULL, 0, NULL),
	(36, 'Куры', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(37, 'Утка', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(38, 'Гусь', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(39, 'Индейка', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(40, 'Перепелка', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(41, 'Цесарка', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(42, 'Фазан', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(43, 'Другая птица', NULL, 1, 2, 0, 1, NULL, 0, NULL),
	(44, 'Охлажденная', NULL, 1, 3, 0, 1, NULL, 0, NULL),
	(45, 'Свежемороженая', NULL, 1, 3, 0, 1, NULL, 0, NULL),
	(46, 'Слабосоленая', NULL, 1, 3, 0, 1, NULL, 0, NULL),
	(47, 'Копченая', NULL, 1, 3, 0, 1, NULL, 0, NULL),
	(48, 'Вяленая', NULL, 1, 3, 0, 1, NULL, 0, NULL),
	(49, 'Крабы', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(50, 'Креветки', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(51, 'Раки', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(52, 'Мидии', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(53, 'Кальмары', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(54, 'Лобстеры', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(55, 'Омары', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(56, 'Икра', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(57, 'Другие дары моря', NULL, 1, 4, 0, 1, NULL, 0, NULL),
	(58, 'Копчености', NULL, 1, 5, 0, 1, NULL, 0, NULL),
	(59, 'Колбасы', NULL, 1, 5, 0, 1, NULL, 0, NULL),
	(60, 'Паштеты', NULL, 1, 5, 0, 1, NULL, 0, NULL),
	(61, 'Пельмени и вареники', NULL, 1, 6, 0, 1, NULL, 0, NULL),
	(62, 'Колбаски и купаты', NULL, 1, 6, 0, 1, NULL, 0, NULL),
	(63, 'Котлеты', NULL, 1, 6, 0, 1, NULL, 0, NULL),
	(64, 'Наггетсы', NULL, 1, 6, 0, 1, NULL, 0, NULL),
	(65, 'Пицца и выпечка', NULL, 1, 6, 0, 1, NULL, 0, NULL),
	(66, 'Замороженные овощи', NULL, 1, 8, 0, 1, NULL, 0, NULL),
	(67, 'Замороженные фрукты и ягоды', NULL, 1, 8, 0, 1, NULL, 0, NULL),
	(68, 'Замороженные грибы', NULL, 1, 8, 0, 1, NULL, 0, NULL),
	(69, 'Макароны', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(70, 'Крупы', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(71, 'Каши', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(72, 'Мука', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(73, 'Соль', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(74, 'Сахар', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(75, 'Сухие завтраки и мюсли', NULL, 1, 9, 0, 1, NULL, 0, NULL),
	(76, 'Мясная', NULL, 1, 10, 0, 1, NULL, 0, NULL),
	(77, 'Овощная', NULL, 1, 10, 0, 1, NULL, 0, NULL),
	(78, 'Грибная', NULL, 1, 10, 0, 1, NULL, 0, NULL),
	(79, 'Рыбная', NULL, 1, 10, 0, 1, NULL, 0, NULL),
	(80, 'Оливки и маслины', NULL, 1, 10, 0, 1, NULL, 0, NULL),
	(81, 'Варенья и джемы', NULL, 1, 10, 0, 1, NULL, 0, NULL),
	(82, 'Соления', NULL, 1, 11, 0, 1, NULL, 0, NULL),
	(83, 'Соления-салаты', NULL, 1, 11, 0, 1, NULL, 0, NULL),
	(84, 'Соления-грибы', NULL, 1, 11, 0, 1, NULL, 0, NULL),
	(85, 'Аджика', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(86, 'Ткемали', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(87, 'Кетчуп', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(88, 'Томаты', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(89, 'Майонез', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(90, 'Уксус и сиропы', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(91, 'Другие соусы', NULL, 1, 12, 0, 1, NULL, 0, NULL),
	(92, 'Молоко', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(93, 'Сметана', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(94, 'Творог', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(95, 'Сыры', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(96, 'Масло', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(97, 'Кисломолочные', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(98, 'Йогурты', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(99, 'Десерты', NULL, 1, 13, 0, 1, NULL, 0, NULL),
	(100, 'Фрукты', NULL, 1, 14, 0, 1, NULL, 0, NULL),
	(101, 'Ягоды', NULL, 1, 14, 0, 1, NULL, 0, NULL),
	(102, 'Экзотические', NULL, 1, 14, 0, 1, NULL, 0, NULL),
	(103, 'Овощи', NULL, 1, 15, 0, 1, NULL, 0, NULL),
	(104, 'Зелень', NULL, 1, 15, 0, 1, NULL, 0, NULL),
	(105, 'Салаты', NULL, 1, 15, 0, 1, NULL, 0, NULL),
	(106, 'Грибы', NULL, 1, 15, 0, 1, NULL, 0, NULL),
	(107, 'Орехи', NULL, 1, 16, 0, 1, NULL, 0, NULL),
	(108, 'Сухофрукты', NULL, 1, 16, 0, 1, NULL, 0, NULL),
	(109, 'Перец черный', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(110, 'Перец  красный', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(111, 'Хрен', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(112, 'Куркума', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(113, 'Барбарис', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(114, 'Корица', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(115, 'Другие приправы', NULL, 1, 17, 0, 1, NULL, 0, NULL),
	(116, 'Подсолнечное', NULL, 1, 18, 0, 1, NULL, 0, NULL),
	(117, 'Оливковое', NULL, 1, 18, 0, 1, NULL, 0, NULL),
	(118, 'Кукурузное', NULL, 1, 18, 0, 1, NULL, 0, NULL),
	(119, 'Льняное', NULL, 1, 18, 0, 1, NULL, 0, NULL),
	(120, 'Кокосовое', NULL, 1, 18, 0, 1, NULL, 0, NULL),
	(121, 'Другие масла', NULL, 1, 18, 0, 1, NULL, 0, NULL),
	(122, 'Хлеб', NULL, 1, 19, 0, 1, NULL, 0, NULL),
	(123, 'Булочки', NULL, 1, 19, 0, 1, NULL, 0, NULL),
	(124, 'Лепешки', NULL, 1, 19, 0, 1, NULL, 0, NULL),
	(125, 'Лепешки тандыр', NULL, 1, 19, 0, 1, NULL, 0, NULL),
	(126, 'Лаваш', NULL, 1, 19, 0, 1, NULL, 0, NULL),
	(127, 'Чиабатта', NULL, 1, 19, 0, 1, NULL, 0, NULL),
	(128, 'Хлебцы', NULL, 1, 20, 0, 1, NULL, 0, NULL),
	(129, 'Чипсы', NULL, 1, 20, 0, 1, NULL, 0, NULL),
	(130, 'Снэки', NULL, 1, 20, 0, 1, NULL, 0, NULL),
	(131, 'Конфеты', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(132, 'Шоколад', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(133, 'Пастила', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(134, 'Мармелад', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(135, 'Зефир', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(136, 'Печенье', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(137, 'Крекеры', NULL, 1, 21, 0, 1, NULL, 0, NULL),
	(138, 'Торты', NULL, 1, 22, 0, 1, NULL, 0, NULL),
	(139, 'Пирожные и рулеты', NULL, 1, 22, 0, 1, NULL, 0, NULL),
	(140, 'Восточные сладости', NULL, 1, 22, 0, 1, NULL, 0, NULL),
	(141, 'Для выпечки', NULL, 1, 22, 0, 1, NULL, 0, NULL),
	(142, 'Мед', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(143, 'Мед с добавками', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(144, 'Мед-суфле', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(145, 'Маточное молочко', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(146, 'Прополис', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(147, 'Перга', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(148, 'Наборы', NULL, 1, 23, 0, 1, NULL, 0, NULL),
	(149, 'Белый чай', NULL, 1, 24, 0, 1, NULL, 0, NULL),
	(150, 'Зеленый чай', NULL, 1, 24, 0, 1, NULL, 0, NULL),
	(151, 'Черный чай', NULL, 1, 24, 0, 1, NULL, 0, NULL),
	(152, 'Улун', NULL, 1, 24, 0, 1, NULL, 0, NULL),
	(153, 'Пуэр', NULL, 1, 24, 0, 1, NULL, 0, NULL),
	(154, 'Травяной чай', NULL, 1, 24, 0, 1, NULL, 0, NULL),
	(155, 'В зернах', NULL, 1, 25, 0, 1, NULL, 0, NULL),
	(156, 'Молотый', NULL, 1, 25, 0, 1, NULL, 0, NULL),
	(157, 'Растворимый', NULL, 1, 25, 0, 1, NULL, 0, NULL),
	(158, 'В капсулах', NULL, 1, 25, 0, 1, NULL, 0, NULL),
	(159, 'Вода', NULL, 1, 26, 0, 1, NULL, 0, NULL),
	(160, 'Минеральная вода', NULL, 1, 26, 0, 1, NULL, 0, NULL),
	(161, 'Газировка', NULL, 1, 26, 0, 1, NULL, 0, NULL),
	(162, 'Квас', NULL, 1, 26, 0, 1, NULL, 0, NULL),
	(163, 'Холодный чай', NULL, 1, 26, 0, 1, NULL, 0, NULL),
	(164, 'Соки', NULL, 1, 27, 0, 1, NULL, 0, NULL),
	(165, 'Компоты', NULL, 1, 27, 0, 1, NULL, 0, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.conditions
CREATE TABLE IF NOT EXISTS `conditions` (
  `condition_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text,
  PRIMARY KEY (`condition_id`),
  KEY `condition_id` (`condition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.conditions: 0 rows
/*!40000 ALTER TABLE `conditions` DISABLE KEYS */;
/*!40000 ALTER TABLE `conditions` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.couriers
CREATE TABLE IF NOT EXISTS `couriers` (
  `courier_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `comments` text,
  PRIMARY KEY (`courier_id`),
  KEY `courier_id` (`courier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.couriers: 2 rows
/*!40000 ALTER TABLE `couriers` DISABLE KEYS */;
INSERT IGNORE INTO `couriers` (`courier_id`, `name`, `phone`, `comments`) VALUES
	(2, 'Иванов Иван', '123', ''),
	(3, 'Петров Василий', '456', '');
/*!40000 ALTER TABLE `couriers` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.devices
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.devices: 1 rows
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT IGNORE INTO `devices` (`id`, `name`, `description`) VALUES
	(1, 'Пример', 'Пример типа');
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.groups: 1 rows
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT IGNORE INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'Администраторы', '');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.offices
CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.offices: 1 rows
/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
INSERT IGNORE INTO `offices` (`id`, `name`, `description`) VALUES
	(1, 'Главный', '');
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned NOT NULL,
  `shipping_address` varchar(256) NOT NULL,
  `shipping_metro` varchar(256) NOT NULL,
  `shipping_method` varchar(256) NOT NULL,
  `shipping_method_id` smallint(5) unsigned NOT NULL,
  `shipping_price` int(11) unsigned NOT NULL,
  `shipping_date` varchar(128) NOT NULL,
  `courier_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `used_bonus` int(11) unsigned NOT NULL,
  `create_date` int(11) unsigned NOT NULL,
  `status` smallint(5) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.orders: 20 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT IGNORE INTO `orders` (`order_id`, `account_id`, `shipping_address`, `shipping_metro`, `shipping_method`, `shipping_method_id`, `shipping_price`, `shipping_date`, `courier_id`, `used_bonus`, `create_date`, `status`) VALUES
	(1, 7, '', '', 'Экспресс доставка', 0, 399, '', 0, 1, 1507148521, 0),
	(2, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 1, 1507148665, 0),
	(3, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 1, 1507148771, 0),
	(4, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 1, 1507148797, 0),
	(5, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 1, 1507148806, 0),
	(6, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 1, 1507148987, 0),
	(7, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 200, 1507149084, 0),
	(8, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 0, 1507149093, 0),
	(9, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 200, 1507149143, 0),
	(10, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 200, 1507149228, 0),
	(11, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 200, 1507149298, 0),
	(12, 7, '777', '', 'Экспресс доставка', 0, 399, '', 0, 0, 1507151164, 0),
	(13, 7, '555', '', 'Обычная доставка', 0, 199, '', 0, 0, 1507151579, 0),
	(14, 7, '555', '', 'Обычная доставка', 1, 199, '', 0, 0, 1507151590, 2),
	(15, 7, '555', '', 'Экспресс доставка - МO (до 25 км от мкада)', 4, 350, '', 3, 0, 1507151888, 4),
	(16, 7, '555', '', 'Экспресс доставка - Москва', 3, 199, '', 2, 910, 1507151930, 4),
	(17, 7, '555', 'Авиа', 'Обычная доставка - МO (до 25 км от мкада)', 2, 350, '', 0, 0, 1508544000, 1),
	(18, 7, '5555454', 'Авиамоторная', 'Обычная доставка - МO (до 25 км от мкада)', 2, 350, '', 2, 100, 1508651688, 4),
	(19, 7, '555', 'Авиа', 'Обычная доставка - МO (до 25 км от мкада)', 2, 350, '', 3, 0, 1508739411, 4),
	(20, 7, '555', 'Авиа', 'Обычная доставка - МO (до 25 км от мкада)', 2, 350, '', 2, 0, 1508739452, 4);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.order_inners
CREATE TABLE IF NOT EXISTS `order_inners` (
  `order_inners_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `title` varchar(32) NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`order_inners_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.order_inners: 24 rows
/*!40000 ALTER TABLE `order_inners` DISABLE KEYS */;
INSERT IGNORE INTO `order_inners` (`order_inners_id`, `order_id`, `title`, `quantity`, `price`, `product_id`) VALUES
	(1, 6, 'Мясо 1', 20, 50, 28),
	(2, 7, 'Мясо 1', 20, 50, 28),
	(3, 8, 'Мясо 1', 20, 50, 28),
	(4, 9, 'Мясо 1', 20, 50, 28),
	(5, 9, 'Мясо 2', 1, 50, 29),
	(6, 11, 'Мясо 1', 20, 50, 28),
	(7, 11, 'Мясо 2', 1, 50, 29),
	(8, 12, 'Мясо 1', 20, 50, 28),
	(9, 12, 'Мясо 2', 1, 50, 29),
	(10, 13, 'Мясо 1', 10, 50, 28),
	(11, 13, 'Мясо 2', 21, 50, 29),
	(12, 14, 'Мясо 1', 10, 50, 28),
	(13, 14, 'Мясо 2', 21, 50, 29),
	(14, 15, 'Мясо 1', 154, 50, 28),
	(15, 15, 'Мясо 2', 20, 50, 29),
	(16, 16, 'Мясо 1', 100, 50, 28),
	(17, 17, 'Мясо 1', 20, 50, 28),
	(18, 18, 'Мясо 1', 20, 80, 28),
	(19, 18, 'Мясо 2', 1, 40, 29),
	(22, 17, 'Мясо 3', 5, 30, 30),
	(24, 19, 'Мясо 1', 20, 50, 28),
	(25, 19, 'Мясо 3', 5, 30, 30),
	(26, 20, 'Мясо 1', 20, 50, 28),
	(27, 20, 'Мясо 3', 5, 30, 30);
/*!40000 ALTER TABLE `order_inners` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `brand` varchar(256) DEFAULT '',
  `quantity` int(11) unsigned DEFAULT '0',
  `type` varchar(50) DEFAULT '',
  `cost` int(11) unsigned DEFAULT '0',
  `percent` int(11) unsigned DEFAULT '0',
  `price` int(11) unsigned DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `special` int(11) unsigned DEFAULT '0',
  `special_begin` date DEFAULT '0000-00-00',
  `special_end` date DEFAULT '0000-00-00',
  `subtract` tinyint(1) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `condition_id` int(11) unsigned DEFAULT '0',
  `eko` tinyint(1) unsigned DEFAULT '0',
  `farm` tinyint(1) unsigned DEFAULT '0',
  `weight` varchar(64) DEFAULT NULL,
  `composition` varchar(64) DEFAULT NULL,
  `provider` varchar(64) DEFAULT NULL,
  `pack` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.products: 52 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT IGNORE INTO `products` (`product_id`, `title`, `brand`, `quantity`, `type`, `cost`, `percent`, `price`, `image`, `description`, `country`, `special`, `special_begin`, `special_end`, `subtract`, `status`, `condition_id`, `eko`, `farm`, `weight`, `composition`, `provider`, `pack`) VALUES
	(40, 'Дянь Хун', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-24_16-03-22.JPG', 'Красный китайский чай с типсами. Послевкусие чернослива', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 1, '100 гр', 'чай например', 'TC-1-18-012', 'пакетики'),
	(41, 'Дянь Хун', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-24_16-03-22.JPG', 'Красный китайский чай с типсами. Послевкусие чернослива', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, '200 гр', 'чай например', 'TC-1-18-012', 'пакетики'),
	(42, 'Цейлон Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-19_16-05-27.JPG', 'Цейлонский Pekoe чай с ароматом пряных трав', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(43, 'Цейлон ', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-15_16-06-18.JPG', 'Чай из молодых листочков с цветочными нотами', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(44, 'Индийский Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-00_16-07-30.JPG', 'Чай стандарта Pekoe. Юг Индии', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(45, 'Ассам Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-53_16-08-03.JPG', 'Чай стандарта Pekoe с мягким медовым послевкусием', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(46, 'Ассам', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-47_16-09-39.JPG', 'Индийский чай с мягким медовым послевкусием', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(47, 'Ассам моколбари', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-34_16-10-14.JPG', 'Индийский чай TGFOP с повышенным содержанием типсов', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(48, 'Дарджилин', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-29_16-10-51.JPG', 'Весенний чай с гор Гималаев с мускатными нотками', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(49, 'Английский завтрак', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-26_16-11-30.JPG', 'Смесь Дарджилинг и Ассам с цветочно-мускатным оттенком', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(50, 'Лист смородины', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-55-06_16-12-00.JPG', 'Лист черной смородины 5-7 мм.', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(51, 'Дянь Хун', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-24_16-03-22.JPG', 'Красный китайский чай с типсами. Послевкусие чернослива', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(52, 'Цейлон Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-19_16-05-27.JPG', 'Цейлонский Pekoe чай с ароматом пряных трав', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(53, 'Цейлон ', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-15_16-06-18.JPG', 'Чай из молодых листочков с цветочными нотами', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(54, 'Индийский Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-00_16-07-30.JPG', 'Чай стандарта Pekoe. Юг Индии', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(55, 'Ассам Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-53_16-08-03.JPG', 'Чай стандарта Pekoe с мягким медовым послевкусием', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(56, 'Ассам', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-47_16-09-39.JPG', 'Индийский чай с мягким медовым послевкусием', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(57, 'Ассам моколбари', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-34_16-10-14.JPG', 'Индийский чай TGFOP с повышенным содержанием типсов', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(58, 'Дарджилин', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-29_16-10-51.JPG', 'Весенний чай с гор Гималаев с мускатными нотками', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(59, 'Английский завтрак', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-26_16-11-30.JPG', 'Смесь Дарджилинг и Ассам с цветочно-мускатным оттенком', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(60, 'Лист смородины', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-55-06_16-12-00.JPG', 'Лист черной смородины 5-7 мм.', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(61, 'Дянь Хун', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-24_16-03-22.JPG', 'Красный китайский чай с типсами. Послевкусие чернослива', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(62, 'Цейлон Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-19_16-05-27.JPG', 'Цейлонский Pekoe чай с ароматом пряных трав', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(63, 'Цейлон ', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-15_16-06-18.JPG', 'Чай из молодых листочков с цветочными нотами', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(64, 'Индийский Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-59-00_16-07-30.JPG', 'Чай стандарта Pekoe. Юг Индии', 'Россия', 10, '0000-00-00', '0000-00-00', 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(65, 'Ассам Pekoe', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-53_16-08-03.JPG', 'Чай стандарта Pekoe с мягким медовым послевкусием', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(66, 'Ассам', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-47_16-09-39.JPG', 'Индийский чай с мягким медовым послевкусием', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(67, 'Ассам моколбари', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-34_16-10-14.JPG', 'Индийский чай TGFOP с повышенным содержанием типсов', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(68, 'Дарджилин', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-29_16-10-51.JPG', 'Весенний чай с гор Гималаев с мускатными нотками', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(69, 'Английский завтрак', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-58-26_16-11-30.JPG', 'Смесь Дарджилинг и Ассам с цветочно-мускатным оттенком', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(70, 'Лист смородины', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-55-06_16-12-00.JPG', 'Лист черной смородины 5-7 мм.', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(71, 'Трава чабрец', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-54-58_16-12-34.JPG', 'Содержит витаминамы В и С. Антисептический эффект.', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(72, 'Ромашка', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-54-47_16-13-22.JPG', 'Содержит витаминамы В и С. Антисептический эффект.', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(73, 'MIX & BAKE с шоколадом', 'MIX & BAKE', NULL, 'г', 100, 30, 150, '2017-09-3015-54-34_16-14-08.JPG', 'MIX & BAKE с шоколадом. Смесь для выпечки.', 'Германия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(74, 'MIX & BAKE M&Ms', 'MIX & BAKE', NULL, 'г', 100, 30, 150, '2017-09-3015-54-29_16-15-01.JPG', 'MIX & BAKE шоколадный M&Ms. Смесь для выпечки.', 'Германия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(75, 'MIX & BAKE с матча', 'MIX & BAKE', NULL, 'г', 100, 30, 150, '2017-09-3015-54-08_16-15-31.JPG', 'MIX & BAKE с чаем Матча. Смесь для выпечки.', 'Германия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(76, 'MIX & BAKE ягоды злаки', 'MIX & BAKE', NULL, 'г', 100, 30, 150, '2017-09-3015-53-59_16-16-05.JPG', 'MIX & BAKE ягоды и злаки. Смесь для выпечки.', 'Германия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(77, 'Малина с мятой', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-53-32_16-57-06.JPG', 'Хинабуш, ройбуш зеленый, мята, клубника, лепестки розы', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(78, 'Мате', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-53-24_16-58-23.JPG', 'Зеленый мате из листьев падуба парагвайского. Аргентина', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(79, 'Русские традиции', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-53-18_17-02-58.JPG', 'Чабрец, ромашка, мелиса лимонная, лист смородины', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(80, 'Имбирный лимонник', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-52-55_17-03-35.JPG', 'Лимонная трава (lemongrass), цедра лимона, имбирь', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(81, 'Успокаивающий', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-52-50_17-04-07.JPG', 'Мелисса, гибискус, вереск, мята, яблоки, фенхель', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(82, 'Зеленый чай матча', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-52-16_17-04-39.JPG', 'Зеленый китайский чай по японской технологии', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(83, 'Лаванда', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-52-10_17-05-15.JPG', 'Цветки лаванды. Применяется как добавка к чаю', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(84, 'Лимонная трава ', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-52-04_17-24-14.JPG', 'Лимонная трава (lemongrass) с тонизирующим эффектом', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(85, 'Вечерний', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-51-56_17-37-19.JPG', 'Мелисса, мята, ромашка, лаванда, василек, шалфей', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(86, 'Чай с мятой', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-51-20_17-37-50.JPG', 'Индийский черный чай, мята, василек. Успокаивающий', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(87, 'Чай с чабрецом', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-51-10_17-39-00.JPG', 'Индийский черный чай с чабрецом от простуды', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(88, 'Восточный имбирь', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-51-01_17-39-49.JPG', 'Индийский черный чай с кусочкамии имбиря', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(89, 'Масала', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-50-57_17-40-19.JPG', 'Индийский чай, корица, анис, фенхель, имбирь, перец', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(90, 'Сладкий цитрус', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-50-21_17-40-56.JPG', 'Индийский чай, цедра лимона и апельсина, сафлор', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики'),
	(91, 'Божественный', 'CHEF TEA', 100, 'г', 100, 30, NULL, '2017-09-3015-50-02_17-42-33.JPG', 'Индийский чай, василек, лимонная трава, цедра апельсина', 'Россия', NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL, 'чай например', 'TC-1-18-012', 'пакетики');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.product_to_category
CREATE TABLE IF NOT EXISTS `product_to_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.product_to_category: 66 rows
/*!40000 ALTER TABLE `product_to_category` DISABLE KEYS */;
INSERT IGNORE INTO `product_to_category` (`product_id`, `category_id`) VALUES
	(28, 24),
	(29, 24),
	(30, 24),
	(31, 24),
	(32, 24),
	(33, 24),
	(34, 24),
	(35, 24),
	(35, 25),
	(36, 24),
	(36, 25),
	(37, 25),
	(38, 24),
	(38, 25),
	(40, 151),
	(41, 151),
	(42, 151),
	(43, 151),
	(44, 151),
	(45, 151),
	(46, 151),
	(47, 151),
	(48, 151),
	(49, 151),
	(50, 151),
	(51, 151),
	(52, 151),
	(53, 151),
	(54, 151),
	(55, 151),
	(56, 151),
	(57, 151),
	(58, 151),
	(59, 151),
	(60, 151),
	(61, 151),
	(62, 151),
	(63, 151),
	(64, 151),
	(65, 151),
	(66, 151),
	(67, 151),
	(68, 151),
	(69, 151),
	(70, 154),
	(71, 154),
	(72, 154),
	(73, 65),
	(74, 65),
	(75, 65),
	(76, 65),
	(77, 154),
	(78, 154),
	(79, 154),
	(80, 154),
	(81, 154),
	(82, 150),
	(83, 154),
	(84, 154),
	(85, 154),
	(86, 151),
	(87, 151),
	(88, 151),
	(89, 151),
	(90, 151),
	(91, 151);
/*!40000 ALTER TABLE `product_to_category` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.rights
CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.rights: 15 rows
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
INSERT IGNORE INTO `rights` (`id`, `name`, `description`) VALUES
	(1, 'devices-list', 'Устройства - список'),
	(2, 'devices-view', 'Устройства - просмотр'),
	(3, 'devices-edit', 'Устройства - редактирование'),
	(4, 'statuses-list', 'Список статусов'),
	(5, 'statuses-view', 'Просмотр статусов'),
	(6, 'statuses-edit', 'Редактирование статусов'),
	(7, 'conditions-list', 'Состояния товаров - список'),
	(8, 'conditions-view', 'Состояния товаров - просмотр'),
	(9, 'conditions-edit', 'Состояния товаров - редактирование'),
	(10, 'couriers-list', 'Курьеры - список'),
	(11, 'couriers-view', 'Курьеры - просмотр'),
	(12, 'couriers-edit', 'Курьеры - редактирование'),
	(13, 'categories-list', 'Категории - список'),
	(14, 'categories-view', 'Категории - просмотр'),
	(15, 'categories-edit', 'Категории - редактирование');
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.rules
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `right_id` int(10) unsigned NOT NULL,
  `value` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.rules: 15 rows
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT IGNORE INTO `rules` (`id`, `group_id`, `right_id`, `value`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 1),
	(3, 1, 3, 1),
	(4, 1, 4, 1),
	(5, 1, 5, 1),
	(6, 1, 6, 1),
	(7, 1, 7, 1),
	(8, 1, 8, 1),
	(9, 1, 9, 1),
	(10, 1, 10, 1),
	(11, 1, 11, 1),
	(12, 1, 12, 1),
	(13, 1, 13, 1),
	(14, 1, 14, 1),
	(15, 1, 15, 1);
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.shipping_gropus
CREATE TABLE IF NOT EXISTS `shipping_gropus` (
  `shipping_gropu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  PRIMARY KEY (`shipping_gropu_id`),
  KEY `shipping_gropu_id` (`shipping_gropu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.shipping_gropus: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `shipping_gropus` DISABLE KEYS */;
INSERT IGNORE INTO `shipping_gropus` (`shipping_gropu_id`, `title`, `description`) VALUES
	(1, 'Обычная доставка', 'доставим завтра в любое удобное Вам время<br>с интервалом 1 час, с 10:00 до 21:00'),
	(2, 'Экспресс доставка', 'доставим в течении 2 часов, с 10:00 до 21:00');
/*!40000 ALTER TABLE `shipping_gropus` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.shipping_methods
CREATE TABLE IF NOT EXISTS `shipping_methods` (
  `shipping_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `price` smallint(6) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`shipping_id`),
  KEY `shipping_method_id` (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.shipping_methods: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `shipping_methods` DISABLE KEYS */;
INSERT IGNORE INTO `shipping_methods` (`shipping_id`, `title`, `price`, `group_id`) VALUES
	(1, 'Москва', 199, 1),
	(2, 'МO (до 25 км от мкада)', 350, 1),
	(3, 'Москва', 199, 2),
	(4, 'МO (до 25 км от мкада)', 350, 2);
/*!40000 ALTER TABLE `shipping_methods` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `status_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text,
  PRIMARY KEY (`status_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.statuses: 6 rows
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT IGNORE INTO `statuses` (`status_id`, `title`, `description`) VALUES
	(1, 'Ожидают подтверждения', ''),
	(2, 'Подтвержденные', ''),
	(3, 'Готовы к отправке', ''),
	(4, 'У курьера', ''),
	(5, 'Доставленные', ''),
	(6, 'Отмененные', '');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pwdhash` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(128) NOT NULL,
  `freeze` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `office_id` int(10) unsigned NOT NULL DEFAULT '0',
  `comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `pwdhash`, `name`, `telephone`, `group_id`, `email`, `freeze`, `office_id`, `comment`) VALUES
	(1, 'ec6a6536ca304edf844d1d248a4f08dc', 'Tural123', '123', 1, 'tural.pro@gmail.com', 0, 1, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
