-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 06 2017 г., 16:26
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `quiz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `choices_css`
--

CREATE TABLE IF NOT EXISTS `choices_css` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `choices_css`
--

INSERT INTO `choices_css` (`id`, `question_number`, `is_correct`, `text`) VALUES
(1, 1, 0, 'Язык разметки'),
(2, 1, 1, 'Каскадная таблица стилей'),
(3, 1, 0, 'язык структурированных запросов'),
(4, 1, 0, 'препроцессор гипертекста'),
(5, 2, 0, 'внутренний отступ'),
(6, 2, 1, 'внешний отступ'),
(7, 2, 0, 'ширина'),
(8, 2, 0, 'высота'),
(9, 3, 0, 'dotted'),
(10, 3, 0, 'inset'),
(11, 3, 1, 'glazed'),
(12, 3, 0, 'groove'),
(13, 3, 0, 'solid'),
(14, 4, 0, 'cm'),
(15, 4, 1, 'dm'),
(16, 4, 0, 'em'),
(17, 4, 0, 'mm'),
(18, 5, 1, '*'),
(19, 5, 0, '!'),
(20, 5, 0, '$'),
(21, 5, 0, '^'),
(22, 6, 0, 'content'),
(23, 6, 0, 'padding'),
(24, 6, 0, 'margin'),
(25, 6, 1, 'outline'),
(26, 6, 0, 'border'),
(27, 7, 0, 'Устанавливает значение полей'),
(28, 7, 0, 'Устанавливает способ позиционирования элемента'),
(29, 7, 1, 'Определяет, по какой стороне будет выравниваться элемент'),
(30, 7, 0, 'Устанавливает величину отступа от каждого края элемента'),
(31, 8, 0, 'Задает минимальное число строк текста'),
(32, 8, 0, 'Добавляет разрыв страницы'),
(33, 8, 0, 'Позволяет вставлять генерируемое содержание'),
(34, 8, 1, 'Задает границы вокруг элемента');

-- --------------------------------------------------------

--
-- Структура таблицы `choices_html`
--

CREATE TABLE IF NOT EXISTS `choices_html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `choices_html`
--

INSERT INTO `choices_html` (`id`, `question_number`, `is_correct`, `text`) VALUES
(1, 1, 0, 'каскадные таблицы стилей'),
(2, 1, 1, 'язык гипертекстовой разметки'),
(3, 1, 0, 'язык сценариев общего назначения'),
(4, 1, 0, 'реляционная система управления базами'),
(6, 2, 0, '&lt;-КОММЕНТАРИЙ-!&gt;'),
(7, 2, 0, '&lt!!!КОММЕНТАРИЙ!!!&gt;'),
(8, 2, 0, '&lt;!--КОММЕНТАРИЙ--!&gt;'),
(9, 2, 1, '&lt;!--КОММЕНТАРИЙ--&gt;'),
(10, 3, 1, '&lt;tag&gt;'),
(11, 3, 0, '"tag"'),
(12, 3, 0, '!tag!'),
(13, 3, 0, '{tag}'),
(14, 4, 0, 'Это команда для поисковых систем'),
(15, 4, 0, 'Потому что таких тегов не существует'),
(16, 4, 1, 'Это комментарий к коду'),
(17, 5, 0, 'Переходный синтаксис HTML.'),
(18, 5, 1, 'DTD (document type definition, описание типа документа)'),
(19, 5, 0, 'DDT (Дихлордифенилтрихлорэтан)'),
(20, 5, 0, 'Документ написан на XHTML и содержит фреймы.'),
(21, 6, 0, 'Ничем'),
(22, 6, 0, 'DIV - это линейный контейнер, SPAN -блочный'),
(23, 6, 0, 'Чучуть отличаются, поэтому не в счет '),
(24, 6, 1, 'DIV - это блочный контейнер, SPAN -линейный'),
(25, 7, 1, 'Выводит текст курсивом'),
(26, 7, 0, 'Делает текст жирным'),
(27, 7, 0, 'Ничего'),
(28, 7, 0, 'Абсолютно ничего'),
(29, 8, 0, 'ссылка на EMAIL'),
(30, 8, 0, 'Мета-тег'),
(31, 8, 1, 'Нумерованный(маркированный) список'),
(32, 8, 0, 'Очень важный тег');

-- --------------------------------------------------------

--
-- Структура таблицы `choices_php`
--

CREATE TABLE IF NOT EXISTS `choices_php` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `choices_php`
--

INSERT INTO `choices_php` (`id`, `question_number`, `is_correct`, `text`) VALUES
(1, 1, 0, '3'),
(2, 1, 0, '4'),
(3, 1, 0, '5'),
(4, 1, 1, '8'),
(7, 2, 0, 'Строгая типизация'),
(8, 2, 1, 'Динамическая типизация'),
(9, 2, 0, 'Статическая типизация'),
(10, 3, 1, '$'),
(11, 3, 0, '#'),
(12, 3, 0, '!'),
(13, 3, 0, '*'),
(14, 4, 0, 'Префиксный инкремент'),
(15, 4, 0, 'Префиксный декремент'),
(16, 4, 1, 'Постфиксный инкремент'),
(17, 4, 0, 'Постфиксный декремент'),
(18, 5, 0, 'Логический оператор Больше'),
(19, 5, 0, 'Логический оператор Отрицание'),
(20, 5, 0, 'Логический оператор И'),
(21, 5, 1, 'Логический оператор Или'),
(22, 6, 1, 'Выводит одну или более строк'),
(23, 6, 0, 'Выводит отформатированную строку'),
(24, 6, 0, 'Выводит строку'),
(25, 6, 0, 'Выводит удобочитаемую информацию о переменной'),
(26, 7, 0, 'Этот код выдаст ошибку'),
(27, 7, 1, '5'),
(28, 7, 0, '6'),
(29, 7, 0, '4'),
(30, 8, 0, '012345'),
(31, 8, 0, '01234'),
(32, 8, 1, '012'),
(33, 8, 0, '0123'),
(34, 9, 0, 'a'),
(35, 9, 1, 'b'),
(36, 9, 0, 'c'),
(37, 10, 0, 'Она проверяет, существует ли массив'),
(38, 10, 1, 'Она проверяет, была ли инициализирована переменная'),
(39, 10, 0, 'Она проверяет, существует ли объект'),
(40, 10, 0, 'Ничего из вышеперечисленного'),
(41, 11, 0, 'define ($pi, "3.14");'),
(42, 11, 0, 'define "pi" 3.14'),
(43, 11, 1, 'define ("pi", "3.14");'),
(44, 11, 0, 'define ("pi" = "3.14");'),
(45, 12, 0, 'Hello World true'),
(46, 12, 0, 'true'),
(47, 12, 0, 'Hello World'),
(48, 12, 1, 'Ничего не будет напечатано');

-- --------------------------------------------------------

--
-- Структура таблицы `questions_css`
--

CREATE TABLE IF NOT EXISTS `questions_css` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions_css`
--

INSERT INTO `questions_css` (`question_number`, `text`) VALUES
(1, 'Css-это:'),
(2, 'Margin-это:'),
(3, 'Какой из приведённых вариантов не является допустимым значением свойства border-style?'),
(4, 'Что из перечисленного не является допустимым значением длины?'),
(5, 'Какой селектор позволяет вам обратиться к каждому элементу веб-страницы?'),
(6, 'Какое из следующих свойств не влияет на модель box?'),
(7, 'Что делает float?'),
(8, 'Что делает border?');

-- --------------------------------------------------------

--
-- Структура таблицы `questions_html`
--

CREATE TABLE IF NOT EXISTS `questions_html` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions_html`
--

INSERT INTO `questions_html` (`question_number`, `text`) VALUES
(1, 'HTML - это:'),
(2, 'Комментарии в HTML обозначаются:'),
(3, 'Какое написание тега из приведенных вариантов правильное?'),
(4, 'Почему в браузере не отображается текст, расположенный между тегами <!-- и -->?'),
(5, '!DOCTYPE - это:'),
(6, 'Чем отличается DIV от SPAN?'),
(7, 'Что делает тег &lt;EM&gt;?'),
(8, 'Что такое &lt;UL&gt;&lt;/UL&gt;');

-- --------------------------------------------------------

--
-- Структура таблицы `questions_php`
--

CREATE TABLE IF NOT EXISTS `questions_php` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`question_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions_php`
--

INSERT INTO `questions_php` (`question_number`, `text`) VALUES
(1, 'Сколько типов данных в PHP?'),
(2, 'Какая типизация данных в PHP?'),
(3, 'Переменные в PHP представлены знаком:'),
(4, '$a++'),
(5, '||'),
(6, 'Функция echo'),
(7, 'Что выведет следующий код:<br> &lt;?php $n = 5; echo $n++; ?&gt'),
(8, 'Какой результат выполнения данного PHP-сценария:<br> &lt;?php for ($i = 0; $i < 5; $i++) {    if ($i > 2) continue;    echo $i; }'),
(9, 'Что будет хранится в ячейке с индексом 1<br> &lt;?php $a[] = "a"; $a[] = "b"; $a[] = "c"; ?&gt;'),
(10, 'Для чего предназначена функция isset()?'),
(11, 'Какой код правильно объявляет константу?'),
(12, 'print_r("Hello World", true);');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_data` date NOT NULL,
  `score_php` int(11) NOT NULL DEFAULT '0',
  `score_css` int(11) NOT NULL DEFAULT '0',
  `score_html` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_data`, `score_php`, `score_css`, `score_html`) VALUES
(24, 'Nikolay', 'Sarkozi', 'Sarkozi_Nikolay', 'Ggggg@gmail.comn', '032491', '2017-11-19', 9, 2, 1),
(27, 'Privet', 'Privet', 'Privet_Privet', 'Ggggg@gmail.comss', '032491', '2017-11-19', 0, 0, 0),
(28, 'Nikolay', 'Sarkozi', 'Sarkozi_Nikolay_1', 'Ggggg@gmail.comnm', '032491', '2017-11-24', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
