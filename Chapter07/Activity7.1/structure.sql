CREATE SCHEMA IF NOT EXISTS app;

USE app;

-- contacts: table
CREATE TABLE `contacts`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `user_id` int(11)      NOT NULL,
    `name`    varchar(100) NOT NULL,
    `phone`   varchar(50)  DEFAULT NULL,
    `email`   varchar(254) DEFAULT NULL,
    `address` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4; #latin1

-- users: table
CREATE TABLE `users`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `username`    varchar(150) NOT NULL,
    `password`    char(60)     NOT NULL,
    `signup_time` datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_username_uindex` (`username`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4; #latin1

