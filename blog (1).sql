-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 15 2020 г., 15:46
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'auto'),
(3, 'phone'),
(4, 'house');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2020_02_08_075915_create_categories_table', 1),
(7, '2020_02_08_081806_create_news_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `img`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 'Audi', 'Audi Q8bnbv\r\n    df', 'images/1581376051.jpeg', 3, '2020-02-10 17:47:44', '2020-02-15 07:23:15'),
(7, 'Iphone X', 'iPhone X df dfhg dhg', NULL, 2, '2020-02-10 17:48:09', '2020-02-15 07:54:51'),
(9, 'Mersedes', 'zdgfjhjfhj', 'images/1581458122.jpeg', 3, '2020-02-11 17:55:22', '2020-02-11 17:55:22'),
(10, 'Opel', 'Astra', 'images/1581458637.jpeg', 3, '2020-02-11 18:03:57', '2020-02-11 18:03:57'),
(11, 'Biuld', 'bdg g gshsfd', NULL, 4, '2020-02-15 05:19:55', '2020-02-15 08:00:37'),
(12, 'dhshs', 'fd  jhj hj  dfjh', 'images/3d-animated-frog-image.jpg', NULL, '2020-02-15 06:56:41', '2020-02-15 06:56:41'),
(14, 'Kupakuka', 'kupakuka kupakuka kupakuka kupakuka', NULL, 4, '2020-02-15 07:06:45', '2020-02-15 07:06:45'),
(15, 'Вася', 'ВасяВасяВася', NULL, NULL, '2020-02-15 07:10:28', '2020-02-15 07:10:28'),
(17, 'VW Golf', 'REd pushka', NULL, 2, '2020-02-15 07:13:22', '2020-02-15 07:13:22'),
(18, 'Dhshs', 'dhgjnf nh f', 'images/horizont.jfif', 4, '2020-02-15 07:16:12', '2020-02-15 07:16:12'),
(19, 'Audi Q8', 'f hj h jcj h jhg jfg', 'images/horizont.jfif', 2, '2020-02-15 09:43:35', '2020-02-15 09:43:35'),
(20, 'Fhg gk f', 'fhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgcfhg gk fjk fg kfg kgf kgf k kgc', NULL, 3, '2020-02-15 09:43:55', '2020-02-15 09:43:55'),
(21, 'Dfg dfd s', 'Dfg dfd sDfg dfd sDfg dfd sDfg dfd sDfg dfd sDfg dfd s', NULL, 3, '2020-02-15 09:44:14', '2020-02-15 09:44:14'),
(22, 'Audi', '<blockquote>\r\n<p><s>content&nbsp;</s>content&nbsp;content&nbsp;<strong>Audi&nbsp;</strong>Audi</p>\r\n</blockquote>\r\n\r\n<p>DKlfj sfg jlj hdffjg</p>', NULL, 2, '2020-02-15 10:25:18', '2020-02-15 10:25:18'),
(23, 'Hernja', '<p>The&nbsp;<code>Illuminate\\Support\\Collection</code>&nbsp;class provides a fluent, convenient wrapper for working with arrays of data. For example, check out the following code. We&#39;ll use the&nbsp;<code>collect</code>&nbsp;helper to create a new collection instance from the array, run the&nbsp;<code>strtoupper</code>&nbsp;function on each element, and then remove all empty elements:</p>\r\n\r\n<pre>\r\n<code>$collection = collect([&#39;taylor&#39;, &#39;abigail&#39;, null])-&gt;map(function ($name) {\r\n    return strtoupper($name);\r\n})\r\n-&gt;reject(function ($name) {\r\n    return empty($name);\r\n});</code></pre>\r\n\r\n<p>As you can see, the&nbsp;<code>Collection</code>&nbsp;class allows you to chain its methods to perform fluent mapping and reducing of the underlying array. In general, collections are immutable, meaning every&nbsp;<code>Collection</code>&nbsp;method returns an entirely new&nbsp;<code>Collection</code>&nbsp;instance.</p>\r\n\r\n<p><a name=\"creating-collections\"></a></p>\r\n\r\n<h3><a href=\"https://laravel.com/docs/6.x/collections#creating-collections\">Creating Collections</a></h3>\r\n\r\n<p>As mentioned above, the&nbsp;<code>collect</code>&nbsp;helper returns a new&nbsp;<code>Illuminate\\Support\\Collection</code>&nbsp;instance for the given array. So, creating a collection is as simple as:</p>\r\n\r\n<pre>\r\n<code>$collection = collect([1, 2, 3]);</code></pre>\r\n\r\n<blockquote>\r\n<p><img src=\"https://laravel.com/img/callouts/lightbulb.min.svg\" /></p>\r\n\r\n<p>The results of&nbsp;<a href=\"https://laravel.com/docs/6.x/eloquent\">Eloquent</a>&nbsp;queries are always returned as&nbsp;<code>Collection</code>&nbsp;instances.</p>\r\n</blockquote>\r\n\r\n<p><a name=\"extending-collections\"></a></p>\r\n\r\n<h3><a href=\"https://laravel.com/docs/6.x/collections#extending-collections\">Extending Collections</a></h3>\r\n\r\n<p>Collections are &quot;macroable&quot;, which allows you to add additional methods to the&nbsp;<code>Collection</code>&nbsp;class at run time. For example, the following code adds a&nbsp;<code>toUpper</code>&nbsp;method to the&nbsp;<code>Collection</code>&nbsp;class:</p>\r\n\r\n<pre>\r\n<code>use Illuminate\\Support\\Collection;\r\nuse Illuminate\\Support\\Str;\r\n\r\nCollection::macro(&#39;toUpper&#39;, function () {\r\n    return $this-&gt;map(function ($value) {\r\n        return Str::upper($value);\r\n    });\r\n});\r\n\r\n$collection = collect([&#39;first&#39;, &#39;second&#39;]);\r\n\r\n$upper = $collection-&gt;toUpper();\r\n\r\n// [&#39;FIRST&#39;, &#39;SECOND&#39;]</code></pre>\r\n\r\n<p>Ty<strong>pically, you should declare collection macros in a&nbsp;<a href=\"https://laravel.com/docs/6.x/providers\">service provider</a>.</strong></p>\r\n\r\n<p><a name=\"available-methods\"></a></p>\r\n\r\n<h2><a href=\"https://laravel.com/docs/6.x/collections#available-methods\">Available Methods</a></h2>\r\n\r\n<p>For the remainder of this documentation, we&#39;ll discuss each method available on the&nbsp;<code>Collection</code></p>', NULL, 4, '2020-02-15 10:27:24', '2020-02-15 10:27:24');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Олейник Андрей', 'andre.oleynik@gmail.com', NULL, '$2y$10$UaU80gBqDAdADi5D0scg5.EOfcRBgZyFcDgWEo/eAnzyT9L5EJQrK', 'Wc2nDOBzAILhzuwvXqBR3kUWmM976crFAPKd71xuA53F6TxoUc4ofxQZ8Q2Y', '2020-02-10 15:54:39', '2020-02-10 15:54:39'),
(3, 'admin', 'admin@admin.com', NULL, '$2y$10$xxKXj858V.Bcn77J3a0zYeggEumj4hzmwYzSH/0YAN8cuEnzKp1wa', NULL, '2020-02-13 17:22:07', '2020-02-13 17:22:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
