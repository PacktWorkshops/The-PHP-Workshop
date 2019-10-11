-- contacts: table
CREATE TABLE IF NOT EXISTS `contacts`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `user_id` int(11)      NOT NULL,
    `name`    varchar(100) NOT NULL,
    `phone`   varchar(50)  DEFAULT NULL,
    `email`   varchar(254) DEFAULT NULL,
    `address` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

-- users: table
CREATE TABLE IF NOT EXISTS `users`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `username`    varchar(150) NOT NULL,
    `password`    char(60)     NOT NULL,
    `signup_time` datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_username_uindex` (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

