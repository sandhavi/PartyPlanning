CREATE DATABASE IF NOT EXISTS `party` USE `party`;
CREATE TABLE IF NOT EXISTS `customer` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `age` INT(100) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `address` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO `customer` (`id`, `name`, `age`, `email`, `address`)
VALUES (
        1,
        'sandhavi',
        23,
        'san@gmail.com',
        'kelaniya',
    );
CREATE TABLE IF NOT EXISTS `admin` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` INT(100) NOT NULL,
    PRIMARY KEY (`id`),
);
INSERT INTO `admin` (`id`, `name`, `username`, `password`)
VALUES (
        1,
        'lak',
        'lak123',
        '123'
    );
CREATE TABLE IF NOT EXISTS `customer_account` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `customer_id` INT(100) NOT NULL,
    `admin_id` INT(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` INT(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
);
INSERT INTO `customer_account` (
        `id`,
        `customer_id`,
        `admin_id`,
        `username`,
        `password`
    )
VALUES (
        1,
        1,
        1 'san',
        '1234'
    );
CREATE TABLE IF NOT EXISTS `form` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `customer_id` INT(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `message` VARCHAR(1000) NOT NULL,
    `p_numeber` VARCHAR(11) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
);
INSERT INTO `form` (
        `id`,
        `customer_id`,
        `name`,
        `message`,
        `p_numeber`,
        `email`
    )
VALUES (
        1,
        1,
        'sasini' 'This is a text message',
        '1234',
        'sasini@gmail.com'
    );
    
    CREATE TABLE IF NOT EXISTS `theme` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `admin_id` INT(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` VARCHAR(1000) NOT NULL,
    `image` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
);
INSERT INTO `theme` (
        `id`,
        `admin_id`,
        `name`,
        `description`,
        `image`
    )
VALUES (
        1,
        1,
        'sasini',
        'This is a text message',
        '1234'
    );
    
     CREATE TABLE IF NOT EXISTS `vendor` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `admin_id` INT(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` VARCHAR(1000) NOT NULL,
    `type` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
);
INSERT INTO `theme` (
        `id`,
        `admin_id`,
        `name`,
        `description`,
        `type`
    )
VALUES (
        1,
        1,
        'sasiniK',
        'This is a text message',
        '1234'
    );

     CREATE TABLE IF NOT EXISTS `venue` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `admin_id` INT(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` VARCHAR(1000) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
);
INSERT INTO `theme` (
        `id`,
        `admin_id`,
        `name`,
        `description`

    )
VALUES (
        1,
        1,
        'sasiniK',
        'This is a text message'
    );
    CREATE TABLE IF NOT EXISTS `reservation` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `customer_id` INT(100) NOT NULL,
    `theme_id` INT(100) NOT NULL,
    `vendor_id` INT(100) NOT NULL,
    `venue_id` INT(100) NOT NULL,
    `admin_id` INT(100) NOT NULL,
    `customer_id` INT(100) NOT NULL,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `description` VARCHAR(1000) NOT NULL,
    `venue` VARCHAR(100) NOT NULL,
    `no_guests` int(100) NOT NULL,
    `vendor` VARCHAR(100) NOT NULL,
    `theme` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
    FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`),
    FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
    FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
);
INSERT INTO `reservation` (
        `id`,
        `customer_id`,
        `theme_id`,
        `vendor_id`,
        `venue_id`,
        `admin_id`,
        `customer_id`,
        `date`,
        `time`,
        `description`,
        `venue`,
        `no_guests`,
        `vendor`,
        `theme`
    )
VALUES (
        1,
        1,
        1,
        1,
        1,
        1,
        1,
        '2021-10-10',
        '10:00:00',
        'This is a text message',
        'venue',
        100,
        'vendor',
        'theme'
    );