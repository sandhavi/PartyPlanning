CREATE TABLE IF NOT EXISTS `customer` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `age` INT(100) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `address` VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    `password` INT(100) NOT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO `customer` (
        `id`,
        `name`,
        `age`,
        `email`,
        `address`,
        `username`,
        `password`
    )
VALUES (
        1,
        'student',
        23,
        'student@gmail.com',
        'colombo',
        'uoc',
        'ucsc'
    );
CREATE TABLE IF NOT EXISTS `admin` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` INT(100) NOT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO `admin` (`id`, `name`, `username`, `password`)
VALUES (1, 'lak', 'lak123', '123');
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
        1,
        'uoc',
        'ucsc'
    );
CREATE TABLE IF NOT EXISTS `form` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `customer_id` INT(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `message` VARCHAR(1000) NOT NULL,
    `p_numeber` VARCHAR(11) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
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
        'sasini',
        'This is a text message',
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
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
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
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
);
INSERT INTO `vendor` (
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
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
);
INSERT INTO `venue` (
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
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `description` VARCHAR(1000) NOT NULL,
    `venue` VARCHAR(100) NOT NULL,
    `no_guests` INT(100) NOT NULL,
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
        '2021-10-10',
        '10:00:00',
        'This is a text message',
        'venue',
        100,
        'vendor',
        'theme'
    );
ALTER TABLE `reservation`
ADD `status` VARCHAR(255) NOT NULL
AFTER `theme`;
ALTER TABLE `customer`
MODIFY COLUMN `age` INT(100) NULL,
    MODIFY COLUMN `address` VARCHAR(20) NULL,
    MODIFY COLUMN `name` VARCHAR(50) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `customer_id` INT(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `theme_id` INT(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `vendor_id` INT(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `venue_id` INT(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `admin_id` INT(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `date` DATE NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `time` TIME NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `description` VARCHAR(1000) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `venue` VARCHAR(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `no_guests` INT(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `vendor` VARCHAR(100) NULL;
ALTER TABLE `reservation`
MODIFY COLUMN `theme` VARCHAR(100) NULL;