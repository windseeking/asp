CREATE DATABASE IF NOT EXISTS asp
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE asp;

CREATE TABLE IF NOT EXISTS `users`
(
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` char(255) NOT NULL UNIQUE KEY,
  `name` char(255) NOT NULL,
  `password` char(64) NOT NULL,
  `is_admin` int DEFAULT 0,
  `created_at` timestamp default current_timestamp NOT NULL
);

CREATE TABLE IF NOT EXISTS `members`
(
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` char(255) NOT NULL UNIQUE KEY,
  `address` varchar(1000) NOT NULL,
  `phone` char(255) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `activities` char(255) NOT NULL,
  `image_path` char(255) DEFAULT NULL,
  `website` char(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `partners`
(
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` char(255) NOT NULL UNIQUE KEY,
  `description` varchar(1000) NOT NULL,
  `image_path` char(255) DEFAULT NULL,
  `link` char(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `projects`
(
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` char(255) NOT NULL UNIQUE KEY,
  `description` varchar(1000) NOT NULL,
  `image_path` char(255) DEFAULT NULL,
  `link` char(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `news`
(
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` char(255) NOT NULL,
  `text` longtext NOT NULL,
  `image_path` char(255) DEFAULT NULL,
  `partner_id` int unsigned DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `created_at` timestamp default current_timestamp NOT NULL,
  KEY news (title),
  KEY news_partner_id_fk (partner_id),
  KEY news_user_id_fk (user_id),
  CONSTRAINT news_partner_id_fk FOREIGN KEY (partner_id) REFERENCES partners (id),
  CONSTRAINT news_user_id_fk FOREIGN KEY (user_id) REFERENCES users (id)
);