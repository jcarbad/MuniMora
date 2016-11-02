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
  `NAME` VARCHAR(25) NOT NULL,
  `LASTNAME` VARCHAR(25) NOT NULL,
  `ID` VARCHAR(15) NOT NULL,
  `PASSWORD` VARCHAR(20) NOT NULL,
  `TIPO` INT NULL,
  PRIMARY KEY (`ID`));
  
  CREATE TABLE IF NOT EXISTS `sisgenot`.`notificaciones` (
  `expediente` VARCHAR(30) NOT NULL,
  `propietario` VARCHAR(100) NOT NULL,
  `receptor` VARCHAR(100) NOT NULL,
  `fechaCad` date NOT NULL,
  `fechaCre` date NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `estado` INT NULL,
  `tipo` INT NULL,
  `observaciones` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`expediente`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
