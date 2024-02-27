CREATE DATABASE IF NOT EXISTS `party` 
USE `party`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(50) NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `user` (`id`, `email`, `username`, `password`)
VALUES (
    1,
    'san@gmail.com',
    'userme',
    '123'
);

