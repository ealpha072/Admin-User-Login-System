CREATE TABLE `multi-login`.`users` 
    (`id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(255) NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `user_type` VARCHAR(255) NOT NULL , 
    `password` VARCHAR(255) NOT NULL , 
    `date_created` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)) 
ENGINE = InnoDB;