CREATE TABLE `User`(
	`ID` MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `password_again` VARCHAR(255) NOT NULL
);

