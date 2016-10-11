SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sisgenot
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sisgenot
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sisgenot` DEFAULT CHARACTER SET utf8 ;
USE `sisgenot` ;

-- -----------------------------------------------------
-- Table `sisgenot`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisgenot`.`usuarios` (
  `ID` VARCHAR(15) NOT NULL,
  `PASSWORD` VARCHAR(20) NOT NULL,
  `TIPO` INT NULL,
  PRIMARY KEY (`ID`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
