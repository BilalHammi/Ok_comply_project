CREATE TABLE `user_information`(
	`ID` MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `gender` VARCHAR(255) NOT NULL,
    `nationality` VARCHAR(255) NOT NULL,
    `date_of_birth` DATE NULL,
    `email` VARCHAR(255) NOT NULL,
    `adress` TEXT NOT NULL,
    `phone_number` INT(15) NOT NULL,
    `pincode` INT(6) NOT NULL,
    `user_account_id` INT(10) NOT NULL,
);