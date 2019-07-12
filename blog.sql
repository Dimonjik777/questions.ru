-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 12 2019 г., 15:25
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` text NOT NULL,
  `pubdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `author`, `pubdate`) VALUES
(4, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu egestas lacus. Suspendisse feugiat purus venenatis, pulvinar ante eget, aliquet ligula. Cras consectetur lorem vel tellus ornare cursus. Integer odio nulla, congue eget gravida at, dictum ut tortor. Vivamus at malesuada nisi. Integer consequat mattis feugiat. Vivamus quis efficitur neque, eget pulvinar augue. Cras sit amet enim sed massa convallis scelerisque fringilla porta metus. Cras vulputate ornare ipsum, et pharetra libero ultricies et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nNunc consectetur auctor ante quis tempor. Nulla sollicitudin feugiat convallis. Pellentesque tincidunt sed ipsum in mollis. Integer maximus efficitur lorem, ut ultrices augue consequat sit amet. Maecenas orci ipsum, blandit vitae lobortis at, mattis sit amet est. Nam vel sodales metus. Fusce ut leo ligula. Cras lorem orci, cursus non dui vitae, semper pellentesque quam. Pellentesque eleifend magna eget euismod auctor. Donec diam turpis, tristique vitae purus id, sollicitudin finibus risus. Morbi varius sollicitudin libero, consequat hendrerit orci placerat eu. Morbi ut ullamcorper urna. Aenean sed iaculis purus.\r\n\r\nCras mollis in lorem a molestie. Sed laoreet et leo a ornare. Phasellus rutrum, elit sed ultrices tincidunt, orci ipsum blandit felis, tempus dignissim lacus est quis mauris. Aenean fringilla, nibh id gravida tristique, lacus nulla dapibus est, quis ornare nibh velit in mauris. Nam volutpat nisl eget nisi hendrerit fringilla. Sed mollis arcu id odio lobortis semper. Nunc consectetur dapibus dignissim. Aenean a eleifend augue. Nunc sed dui ultricies sapien fringilla faucibus. Morbi efficitur tellus mauris, a pulvinar massa pellentesque quis. Phasellus efficitur mauris eu quam interdum sollicitudin. Sed dignissim interdum turpis sit amet vehicula. Vestibulum eu nibh viverra, dapibus massa ac, tempus enim. Vestibulum vitae neque augue. Morbi ut massa ut tellus viverra viverra in et ipsum.', 'Dima', '2019-07-10'),
(5, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu egestas lacus. Suspendisse feugiat purus venenatis, pulvinar ante eget, aliquet ligula. Cras consectetur lorem vel tellus ornare cursus. Integer odio nulla, congue eget gravida at, dictum ut tortor. Vivamus at malesuada nisi. Integer consequat mattis feugiat. Vivamus quis efficitur neque, eget pulvinar augue. Cras sit amet enim sed massa convallis scelerisque fringilla porta metus. Cras vulputate ornare ipsum, et pharetra libero ultricies et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nNunc consectetur auctor ante quis tempor. Nulla sollicitudin feugiat convallis. Pellentesque tincidunt sed ipsum in mollis. Integer maximus efficitur lorem, ut ultrices augue consequat sit amet. Maecenas orci ipsum, blandit vitae lobortis at, mattis sit amet est. Nam vel sodales metus. Fusce ut leo ligula. Cras lorem orci, cursus non dui vitae, semper pellentesque quam. Pellentesque eleifend magna eget euismod auctor. Donec diam turpis, tristique vitae purus id, sollicitudin finibus risus. Morbi varius sollicitudin libero, consequat hendrerit orci placerat eu. Morbi ut ullamcorper urna. Aenean sed iaculis purus.\r\n\r\nCras mollis in lorem a molestie. Sed laoreet et leo a ornare. Phasellus rutrum, elit sed ultrices tincidunt, orci ipsum blandit felis, tempus dignissim lacus est quis mauris. Aenean fringilla, nibh id gravida tristique, lacus nulla dapibus est, quis ornare nibh velit in mauris. Nam volutpat nisl eget nisi hendrerit fringilla. Sed mollis arcu id odio lobortis semper. Nunc consectetur dapibus dignissim. Aenean a eleifend augue. Nunc sed dui ultricies sapien fringilla faucibus. Morbi efficitur tellus mauris, a pulvinar massa pellentesque quis. Phasellus efficitur mauris eu quam interdum sollicitudin. Sed dignissim interdum turpis sit amet vehicula. Vestibulum eu nibh viverra, dapibus massa ac, tempus enim. Vestibulum vitae neque augue. Morbi ut massa ut tellus viverra viverra in et ipsum.', 'Dima', '2019-07-06');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `nickname`, `text`, `pubdate`, `article_id`) VALUES
(1, 'Дима', 'Dimonchik', 'z', '2019-07-12 09:31:46', 5),
(2, 'Дима', 'Tester', 'Test', '2019-07-12 09:32:12', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
