-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 12 2022 г., 09:56
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wiki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sub_id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `key_words` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `sub_id`, `content`, `image`, `key_words`) VALUES
(1, 'Windows setup', 3, '<h3>dasfasfasfasf</h3>', '1.jpg', 'windows,windows setup,windows настройка'),
(2, 'InsureAZ', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ut atque tenetur sit? Architecto omnis dolore nemo fuga sed similique, dolor aliquam ratione rem quos odio cumque voluptatum minima autem!                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ma', '2.jpg', 'insureaz,InsureAz,иншур,обновление insureaz, insure'),
(3, 'Claim Files', 2, '<p>Claim files</p>', '2.jpg', 'claim files, claim folder,claim'),
(4, 'HR printer setup', 1, 'Принтер (англ. printer от print «печать») — периферийное устройство компьютера, предназначенное для вывода текстовой или графической информации, хранящейся в компьютере, на твёрдый физический носитель, обычно бумагу или полимерную плёнку, малыми тиражами (от единиц до сотен).\n\nЭтим принтеры отличаются от полиграфического оборудования и ризографии, которое за счёт печатной формы быстрее и дешевле на крупных тиражах (сотни и более экземпляров). Использование принтера совместно с компьютером отличало от телетайпа, получавшего информацию из телеграфной сети.', '2.jpg', 'printer, картридж, printer setup, printer exe, принтер'),
(5, 'Reception printer setup', 2, 'Ресепшен — это административная стойка, которую вы можете увидеть в почти любом отеле.\n\nСлово ресепшн изначально произошло от английского «reception», что буквально можно перевести как «прием». В современном языке данное слово приобрело другое (сугубо практическое) значение — «приемная стойка».\n\nЭто изделие — мебель, которая неизменно оказывается в центре внимания любого зашедшего в помещение человека. Именно ресепшн позволяет взаимодействовать работнику фирмы и клиенту, оттого она выполняет не только эстетическую, но и практическую функцию.', '1.jpg', 'hr printer, картридж, hr, принтер'),
(6, 'Server setup', 4, '<p>weghwegwegs with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.t only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.dus PageMaker including versions of Lorem Ipsum.</p>', '1.jpg', 'server, server setup, server'),
(7, 'Helpdesk printer server', 3, 'dasdasdasdasdafas fa dasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fa', 'adasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasdafas fadasdasdasdasda', 'printer, server, stalker'),
(8, 'Claim printer files', 5, 'ad sagfsfh fh bdsgh 435 3 gdh  ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ', 'ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh ad sagfsfh fh bdsgh 435 3 gdh  ', 'claim files, printer claim,claim');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
