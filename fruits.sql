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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.accounts: 1 rows
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT IGNORE INTO `accounts` (`account_id`, `email`, `password`, `name`, `phone`, `bonus`, `create_date`) VALUES
	(7, 'tural.pro@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'Турал11', '111', 100, 1507141325);
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.categories: 25 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`category_id`, `title`, `description`, `status`, `parent_id`, `sort_order`, `in_main_menu`, `class`, `first_line`, `seo_url`) VALUES
	(1, 'Мясо', NULL, 1, 0, 1, 1, NULL, 1, 'myaso'),
	(2, 'Птица', NULL, 1, 0, 2, 1, NULL, 1, NULL),
	(3, 'Рыба', NULL, 1, 0, 3, 1, NULL, 1, NULL),
	(4, 'Молочка', NULL, 1, 0, 4, 1, NULL, 1, NULL),
	(5, 'Овощи', NULL, 1, 0, 5, 1, NULL, 1, NULL),
	(6, 'Фрукты', NULL, 1, 0, 6, 1, NULL, 1, NULL),
	(7, 'Зелень', NULL, 1, 0, 7, 1, NULL, 1, NULL),
	(8, 'Орехи и сухофрукты', NULL, 1, 0, 8, 1, NULL, 1, NULL),
	(9, 'Чай', NULL, 1, 0, 9, 1, NULL, 1, NULL),
	(10, 'Кофе', NULL, 1, 0, 10, 1, NULL, 1, NULL),
	(13, 'Сыр', NULL, 1, 0, 13, 1, NULL, 0, NULL),
	(14, 'Яйцо', NULL, 1, 0, 14, 1, NULL, 0, NULL),
	(15, 'Деликатесы', NULL, 1, 0, 15, 1, NULL, 0, NULL),
	(16, 'Макароны', NULL, 1, 0, 16, 1, NULL, 0, NULL),
	(17, 'Специи и приправы', NULL, 1, 0, 17, 1, NULL, 0, NULL),
	(18, 'Масло', NULL, 1, 0, 18, 1, NULL, 0, NULL),
	(19, 'Крупы', NULL, 1, 0, 19, 1, NULL, 0, NULL),
	(20, 'Консервация', NULL, 1, 0, 20, 1, NULL, 0, NULL),
	(21, 'Мед', NULL, 1, 0, 21, 1, NULL, 0, NULL),
	(22, 'Сладости', NULL, 1, 0, 22, 1, NULL, 0, NULL),
	(23, 'Напитки', NULL, 1, 0, 23, 1, NULL, 0, NULL),
	(24, 'Говядина', NULL, 1, 1, 1, 0, NULL, 0, NULL),
	(25, 'Свинина', NULL, 1, 1, 0, 0, NULL, 0, NULL),
	(26, 'Баранина', NULL, 1, 1, 0, 0, NULL, 0, NULL),
	(27, 'Пармезан', NULL, 0, 13, 0, 0, NULL, 0, NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.couriers: 0 rows
/*!40000 ALTER TABLE `couriers` DISABLE KEYS */;
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
  `shipping_price` int(11) unsigned NOT NULL,
  `used_bonus` int(11) unsigned NOT NULL,
  `create_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.orders: 17 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT IGNORE INTO `orders` (`order_id`, `account_id`, `shipping_address`, `shipping_metro`, `shipping_method`, `shipping_price`, `used_bonus`, `create_date`) VALUES
	(1, 7, '', '', 'Экспресс доставка', 399, 1, 1507148521),
	(2, 7, '777', '', 'Экспресс доставка', 399, 1, 1507148665),
	(3, 7, '777', '', 'Экспресс доставка', 399, 1, 1507148771),
	(4, 7, '777', '', 'Экспресс доставка', 399, 1, 1507148797),
	(5, 7, '777', '', 'Экспресс доставка', 399, 1, 1507148806),
	(6, 7, '777', '', 'Экспресс доставка', 399, 1, 1507148987),
	(7, 7, '777', '', 'Экспресс доставка', 399, 200, 1507149084),
	(8, 7, '777', '', 'Экспресс доставка', 399, 0, 1507149093),
	(9, 7, '777', '', 'Экспресс доставка', 399, 200, 1507149143),
	(10, 7, '777', '', 'Экспресс доставка', 399, 200, 1507149228),
	(11, 7, '777', '', 'Экспресс доставка', 399, 200, 1507149298),
	(12, 7, '777', '', 'Экспресс доставка', 399, 0, 1507151164),
	(13, 7, '555', '', 'Обычная доставка', 199, 0, 1507151579),
	(14, 7, '555', '', 'Обычная доставка', 199, 0, 1507151590),
	(15, 7, '555', '', 'Экспресс доставка', 399, 0, 1507151888),
	(16, 7, '555', '', 'Экспресс доставка', 399, 910, 1507151930),
	(17, 7, '555', 'Авиа', 'МO (до 25 км от мкада) - 350 руб.', 350, 0, 1507883724);
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.order_inners: 17 rows
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
	(17, 17, 'Мясо 1', 20, 50, 28);
/*!40000 ALTER TABLE `order_inners` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `articul` varchar(256) NOT NULL,
  `quantity` int(11) unsigned DEFAULT '0',
  `type` varchar(50) DEFAULT '',
  `cost` int(11) unsigned NOT NULL DEFAULT '0',
  `price` int(11) unsigned NOT NULL DEFAULT '0',
  `percent` int(11) unsigned NOT NULL DEFAULT '0',
  `image` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `special` int(11) unsigned DEFAULT '0',
  `special_begin` date DEFAULT '0000-00-00',
  `special_end` date DEFAULT '0000-00-00',
  `subtract` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `condition_id` int(11) unsigned DEFAULT '0',
  `eko` tinyint(1) unsigned DEFAULT '0',
  `farm` tinyint(1) unsigned DEFAULT '0',
  `weight` varchar(64) DEFAULT NULL,
  `composition` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.products: 9 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT IGNORE INTO `products` (`product_id`, `title`, `brand`, `articul`, `quantity`, `type`, `cost`, `price`, `percent`, `image`, `description`, `country`, `special`, `special_begin`, `special_end`, `subtract`, `status`, `condition_id`, `eko`, `farm`, `weight`, `composition`) VALUES
	(34, 'Мясо 7', 'Valio', '7', 100, 'кг', 20, 50, 0, 'yabloko_1.jpg', 'Сочное мясо', 'Россия', 80, NULL, NULL, 0, 1, 1, 0, 0, NULL, NULL),
	(33, 'Мясо 6', 'Valio', '6', 100, 'кг', 20, 50, 0, 'yabloko_2.jpg', 'Сочное мясо', 'Россия', 80, NULL, NULL, 0, 1, 1, 0, 0, NULL, NULL),
	(32, 'Мясо 5', 'Valio', '5', 100, 'кг', 20, 50, 0, 'yabloko_3.jpg', 'Сочное мясо', 'Россия', 80, NULL, NULL, 0, 1, 1, 0, 1, NULL, NULL),
	(31, 'Мясо 4', 'Valio', '4', 100, 'кг', 20, 50, 0, 'yabloko_4.jpg', 'Сочное мясо', 'Россия', 80, NULL, NULL, 0, 1, 1, 0, 1, NULL, NULL),
	(30, 'Мясо 3', 'Valio', '3', 100, 'кг', 20, 50, 0, 'yabloko_5.jpg', 'Сочное мясо', 'Россия', 80, NULL, NULL, 0, 1, 1, 0, 0, NULL, NULL),
	(29, 'Мясо 2', 'Valio', '2', 100, 'кг', 20, 50, 0, 'yabloko_6.jpg', 'Сочное мясо', 'Россия', 40, '2017-09-27', '2017-10-30', 0, 1, 1, 1, 0, NULL, NULL),
	(28, 'Мясо 1', 'Valio', '1', 100, 'кг', 20, 50, 0, 'yabloko_7.jpg', 'Сочное мясо', 'Россия', 80, '2017-09-29', '2017-10-30', 0, 1, 1, 1, 0, NULL, NULL),
	(35, 'Мясо 8', 'Valio', '1', 100, 'кг', 20, 50, 0, 'yabloko_7.jpg', 'Сочное мясо', 'Российская Федерация', 80, '2017-09-29', '2017-10-10', 0, 1, 1, 0, 0, NULL, NULL),
	(36, 'Мясо 9', 'Valio', '1', 100, 'кг', 20, 50, 0, 'yabloko_7.jpg', 'Сочное мясо', 'Россия', 80, '2017-09-29', '2017-10-30', 0, 1, 1, 0, 0, NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица fruit.product_to_category
CREATE TABLE IF NOT EXISTS `product_to_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.product_to_category: 9 rows
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
	(36, 24);
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

-- Дамп структуры для таблица fruit.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `status_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text,
  PRIMARY KEY (`status_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы fruit.statuses: 0 rows
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
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