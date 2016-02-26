CREATE SCHEMA IF NOT EXISTS `shortener` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `shortener` ;

-- -----------------------------------------------------
-- Table `shortener`.`urls`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `shortener`.`urls` ;
CREATE TABLE IF NOT EXISTS `shortener`.`urls` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `shortURL` VARCHAR(255) NOT NULL,
  `clientURL` VARCHAR(255) NOT NULL,
  `requests` INT,
  
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `shortener`.`urls` (`id` ASC);