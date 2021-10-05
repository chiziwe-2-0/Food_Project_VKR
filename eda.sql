-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 05 2020 г., 18:45
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eda`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bluda`
--

CREATE TABLE `bluda` (
  `id_bluda` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `name_bluda` varchar(50) NOT NULL,
  `vyhod_bluda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `bluda`
--

INSERT INTO `bluda` (`id_bluda`, `id_kat`, `name_bluda`, `vyhod_bluda`) VALUES
(1, 1, 'Borsch', '300'),
(2, 1, 'Solyanka', '300'),
(3, 1, 'Harcho', '300'),
(4, 2, 'Grechka', '200'),
(5, 2, 'Makarony', '220'),
(6, 2, 'Ris', '175'),
(7, 2, 'Pure', '200'),
(8, 3, 'Kotleta_rybnaya', '90'),
(9, 3, 'Kotleta_farsh', '90'),
(10, 3, 'Gulyash', '110'),
(11, 3, 'Befstroganov', '150'),
(12, 4, 'Aprel', '150'),
(13, 4, 'Salat_iz_svekly', '120'),
(14, 4, 'Olivye', '110'),
(15, 4, 'Vesenniy', '110'),
(16, 5, 'Syrniki', '200'),
(17, 5, 'Sharlotka', '125'),
(18, 5, 'Tiramisu', '120'),
(19, 5, 'Zapekanka', '130'),
(20, 6, 'Cherny_chai', '250'),
(21, 6, 'Zeleny_chai', '250'),
(22, 6, 'Compot', '250'),
(23, 6, 'Limonad', '250'),
(24, 1, 'Rassolnik', '300'),
(25, 6, 'Coffee', '250'),
(26, 6, 'Kakao', '250'),
(28, 2, 'Perlovka', '220'),
(30, 4, 'Krabovyi', '110'),
(33, 6, 'Sok', '250'),
(36, 5, 'Pechenye', '30'),
(39, 3, 'Plov', '110');

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id_daty` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id_daty`, `data`) VALUES
(27, '2020-02-02'),
(28, '2020-03-03'),
(29, '2020-04-01');

-- --------------------------------------------------------

--
-- Структура таблицы `kat`
--

CREATE TABLE `kat` (
  `id_kat` int(11) NOT NULL,
  `name_kat` varchar(20) NOT NULL,
  `ed_izm` enum('g','ml','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kat`
--

INSERT INTO `kat` (`id_kat`, `name_kat`, `ed_izm`) VALUES
(1, 'Supy', 'ml'),
(2, 'Garniry', 'g'),
(3, 'Goryachee', 'g'),
(4, 'Salaty', 'g'),
(5, 'Vypechka', 'g'),
(6, 'Napitki', 'ml');

-- --------------------------------------------------------

--
-- Структура таблицы `klienty`
--

CREATE TABLE `klienty` (
  `id_klienta` int(11) NOT NULL,
  `name_klienta` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `klienty`
--

INSERT INTO `klienty` (`id_klienta`, `name_klienta`, `address`, `tel`) VALUES
(1, 'Okruzhnaya', 'Lipetsk', '84742756453'),
(2, 'Rogozhino', 'Lipetsk', '84742850687'),
(3, 'Gryaznoe', 'Lipetsk', '84742657488'),
(4, 'Fermer-L', 'Lipetsk', '84742009988');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id_stroki` int(11) NOT NULL,
  `id_bluda` int(11) NOT NULL,
  `id_daty` int(11) NOT NULL,
  `skolko_gotovit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id_stroki`, `id_bluda`, `id_daty`, `skolko_gotovit`) VALUES
(1, 1, 27, 41),
(2, 5, 27, 43),
(3, 10, 27, 54),
(4, 22, 27, 24),
(5, 12, 28, 76),
(6, 19, 28, 76),
(7, 23, 28, 22),
(8, 3, 29, 32),
(9, 4, 29, 33),
(10, 11, 29, 42),
(11, 17, 29, 12),
(13, 18, 27, 22),
(14, 13, 27, 34),
(15, 13, 27, 34),
(16, 11, 27, 33),
(17, 28, 28, 21);

-- --------------------------------------------------------

--
-- Структура таблицы `specif`
--

CREATE TABLE `specif` (
  `id_zapisi` int(11) NOT NULL,
  `id_zayavki` int(11) NOT NULL,
  `id_stroki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `specif`
--

INSERT INTO `specif` (`id_zapisi`, `id_zayavki`, `id_stroki`) VALUES
(1, 2, 1),
(3, 2, 16),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tipy`
--

CREATE TABLE `tipy` (
  `id_tipa` int(11) NOT NULL,
  `name_tipa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tipy`
--

INSERT INTO `tipy` (`id_tipa`, `name_tipa`) VALUES
(1, 'Obed'),
(2, 'Uzhin');

-- --------------------------------------------------------

--
-- Структура таблицы `zayavki`
--

CREATE TABLE `zayavki` (
  `id_zayavki` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_tipa` int(11) NOT NULL,
  `kolvo_porci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `zayavki`
--

INSERT INTO `zayavki` (`id_zayavki`, `id_klienta`, `id_tipa`, `kolvo_porci`) VALUES
(2, 1, 1, 32),
(3, 2, 2, 43);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bluda`
--
ALTER TABLE `bluda`
  ADD PRIMARY KEY (`id_bluda`),
  ADD KEY `id_kat` (`id_kat`);

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_daty`);

--
-- Индексы таблицы `kat`
--
ALTER TABLE `kat`
  ADD PRIMARY KEY (`id_kat`);

--
-- Индексы таблицы `klienty`
--
ALTER TABLE `klienty`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_stroki`),
  ADD KEY `id_bluda` (`id_bluda`),
  ADD KEY `id_daty` (`id_daty`);

--
-- Индексы таблицы `specif`
--
ALTER TABLE `specif`
  ADD PRIMARY KEY (`id_zapisi`),
  ADD KEY `id_stroki` (`id_stroki`),
  ADD KEY `id_zayavki` (`id_zayavki`);

--
-- Индексы таблицы `tipy`
--
ALTER TABLE `tipy`
  ADD PRIMARY KEY (`id_tipa`);

--
-- Индексы таблицы `zayavki`
--
ALTER TABLE `zayavki`
  ADD PRIMARY KEY (`id_zayavki`),
  ADD KEY `zayavki_ibfk_1` (`id_klienta`),
  ADD KEY `id_tipa` (`id_tipa`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bluda`
--
ALTER TABLE `bluda`
  MODIFY `id_bluda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id_daty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `kat`
--
ALTER TABLE `kat`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `klienty`
--
ALTER TABLE `klienty`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id_stroki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `specif`
--
ALTER TABLE `specif`
  MODIFY `id_zapisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `tipy`
--
ALTER TABLE `tipy`
  MODIFY `id_tipa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `zayavki`
--
ALTER TABLE `zayavki`
  MODIFY `id_zayavki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bluda`
--
ALTER TABLE `bluda`
  ADD CONSTRAINT `bluda_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kat` (`id_kat`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_bluda`) REFERENCES `bluda` (`id_bluda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_daty`) REFERENCES `data` (`id_daty`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `specif`
--
ALTER TABLE `specif`
  ADD CONSTRAINT `specif_ibfk_1` FOREIGN KEY (`id_stroki`) REFERENCES `menu` (`id_stroki`) ON UPDATE CASCADE,
  ADD CONSTRAINT `specif_ibfk_2` FOREIGN KEY (`id_zayavki`) REFERENCES `zayavki` (`id_zayavki`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zayavki`
--
ALTER TABLE `zayavki`
  ADD CONSTRAINT `zayavki_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienty` (`id_klienta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zayavki_ibfk_2` FOREIGN KEY (`id_tipa`) REFERENCES `tipy` (`id_tipa`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
