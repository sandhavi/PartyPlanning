-- Creating the Database named "party"
CREATE DATABASE party -- Use "party" database for creating all the tables
USE party CREATE TABLE IF NOT EXISTS `customer` (
    `id` INT(100) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `age` INT(100) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `address` VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
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
    `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO `admin` (`id`, `name`, `username`, `password`)
VALUES (1, 'Party-Admin', 'uoc', 'ucsc');
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
    PRIMARY KEY (`id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`)
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
        'Decade Party',
        'Guests dress up and enjoy music, food, and decor from a specific decade, such as the Roaring Twenties, the Swinging Sixties, or the Disco Seventies.'
    ),
    (
        2,
        1,
        'Under the Sea',
        'Dive into an underwater world with ocean-themed decor, costumes inspired by sea creatures, and pirate themes.'
    ),
    (
        3,
        1,
        'Outer Space',
        'Explore the cosmos with a space-themed party featuring futuristic decor, astronaut costumes, cosmic cocktails, and celestial projections.'
    ),
    (
        4,
        1,
        'Alice in Wonderland',
        'Create a whimsical world inspired by Lewis Carrolls classic tale, with tea party decorations, eccentric costumes, and fantastical props.'
    ),
    (
        5,
        1,
        'Superhero or Villain Party:',
        'Guests dress up as their favorite superheroes or villains for a fun-filled night of heroics or mischief'
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
        'Amaya Food',
        'Mouth Watering Food, choose meal preferences',
        'food'
    ),
    (
        2,
        1,
        'Gihan Food',
        'High Tea and many short eats you like'
    ),
    (
        3,
        1,
        'Cocoa & Chai Café',
        'A cozy retreat offering a tantalizing blend of rich cocoa and aromatic chai, accompanied by delectable pastries and treats.'
    ),
    (
        4,
        1,
        'Terra Verde Bistro',
        'A charming bistro offering a variety of fresh, healthy, and delicious meals, including vegetarian and vegan options.'
    ),
    (
        5,
        1,
        'The Grill',
        'A casual dining experience featuring a variety of grilled meats, seafood, and vegetarian options, as well as a selection of refreshing beverages.'
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
        'Starry Night Pavilion',
        'Dance under the twinkling stars in our picturesque outdoor pavilion, the perfect setting for magical celebrations.'
    ),
    (2,1,'Crystal Cove Ballroom','Elegant charm meets modern luxury in our versatile ballroom, ideal for weddings, galas, and corporate events.'),
    (3,1,'Sapphire Sky Terrace','Elevate your event to new heights on our stunning rooftop terrace with panoramic city views and chic ambiance.'),
    (4,1,'Golden Gardens Estate','Step into a world of opulence and grandeur at our historic estate, offering timeless elegance for unforgettable occasions.'),
    ()
    ;
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