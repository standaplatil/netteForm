CREATE TABLE `client_info` (
   `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `name` VARCHAR(50) NOT NULL,
   `email` VARCHAR(50) NOT NULL,
   `phone` VARCHAR(50) NOT NULL,
   `age` INT NOT NULL,
   `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB CHARSET=utf8;

INSERT INTO `client_info` (`name`, `email`, `phone`, `age`) VALUES
    ('Test', 'emai@test.cz', '721555666', 25);