CREATE DATABASE IF NOT EXISTS `party` USE `party`;

CREATE TABLE IF NOT EXISTS `admin` (
    'id' int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(50) NOT NULL,
    `fname` varchar(45) NOT NULL,
    `lname` varchar(45) NOT NULL,
    `password` varchar(20) NOT NULL,
    PRIMARY KEY (`email`)
)
INSERT INTO `admin` ('id`, email`, `fname`, `lname`, `password`)
VALUES (
        1,
        'sandhavi@gmail.com',
        'adminme',
        'testmeadmin',
        '123'
    );