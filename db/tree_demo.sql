-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2022 г., 15:05
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tree_demo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tr_tree`
--

CREATE TABLE `tr_tree` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tr_tree`
--

INSERT INTO `tr_tree` (`id`, `name`, `description`, `parent`) VALUES
(1, 'Продукты', 'Продукты питания', 0),
(2, 'Хозтовары', 'Хозтовары всякие', 0),
(3, 'Одежда', 'Отличная одежда', 0),
(4, 'Канцтовары', 'Для школы', 0),
(5, 'Молочные продукты', 'Всяческая молочка', 1),
(6, 'Овощи и фрукты', 'Все свежее', 1),
(7, 'Мясная продукция', 'Почти из мяса', 1),
(8, 'Лаки и краски', 'Для ремонта', 2),
(9, 'Инструменты', 'Все, что угодно', 2),
(10, 'Метизы', 'Любой крепеж', 2),
(11, 'Мужская одежда', 'Все для мужчин', 3),
(12, 'Женская одежда', 'Все для женщин', 3),
(13, 'Детская одежда', 'Все лучшее для детей', 3),
(17, 'Свитера мужские', 'Свитера мужские всякие', 11),
(18, 'Рубашки мужские', 'Рубашки мужские разные', 11),
(22, 'Бумага и бумажные товары', 'Бумага и бумажные товары', 4),
(23, 'Письменные принадлежности', 'Письменные принадлежности для школы', 4),
(24, 'Канцелярские аксессупры', 'Канцелярские аксессупры', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tr_users`
--

CREATE TABLE `tr_users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tr_users`
--

INSERT INTO `tr_users` (`id`, `login`, `password`, `created`) VALUES
(1, 'admin', '$2y$12$jZYNPfgwxdCOIlv3wBEAFOtKgiXEktYemioqjPgEgnxMv85dUMW/.', '2022-03-26 16:15:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tr_tree`
--
ALTER TABLE `tr_tree`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tr_users`
--
ALTER TABLE `tr_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tr_tree`
--
ALTER TABLE `tr_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `tr_users`
--
ALTER TABLE `tr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
