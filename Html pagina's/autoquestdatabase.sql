-- MySQL Script generated by MySQL Workbench
-- 12/08/16 12:58:35
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categorie` (
  `naam` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`naam`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Product` (
  `productnummer` INT NOT NULL COMMENT '',
  `naam` VARCHAR(45) NOT NULL COMMENT '',
  `bouwjaar` DATETIME NULL COMMENT '',
  `merk` VARCHAR(45) NULL COMMENT '',
  `type` VARCHAR(45) NULL COMMENT '',
  `prijs` INT NOT NULL COMMENT '',
  `omschrijving` VARCHAR(45) NULL COMMENT '',
  `categorienaam` VARCHAR(45) NOT NULL COMMENT '',
  `geiwcht` INT NULL COMMENT '',
  `formule` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`productnummer`)  COMMENT '',
  INDEX `fk_Product_categorie1_idx` (`categorienaam` ASC)  COMMENT '',
  CONSTRAINT `fk_Product_categorie1`
    FOREIGN KEY (`categorienaam`)
    REFERENCES `mydb`.`categorie` (`naam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Account` (
  `emailadres` VARCHAR(45) NOT NULL COMMENT '',
  `achternaam` VARCHAR(45) NOT NULL COMMENT '',
  `voornaam` VARCHAR(45) NOT NULL COMMENT '',
  `wachtwoord` VARCHAR(45) NOT NULL COMMENT '',
  `rechten` INT NOT NULL COMMENT '',
  PRIMARY KEY (`emailadres`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`klant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`klant` (
  `emailadres` VARCHAR(45) NOT NULL COMMENT '',
  `bedrijfsnaam` VARCHAR(45) NULL COMMENT '',
  `f.woonplaats` VARCHAR(45) NOT NULL COMMENT '',
  `f.straatnaam` VARCHAR(45) NOT NULL COMMENT '',
  `f.huisnummer` VARCHAR(45) NOT NULL COMMENT '',
  `f.postcode` VARCHAR(45) NOT NULL COMMENT '',
  `b.woonplaats` VARCHAR(45) NOT NULL COMMENT '',
  `b.straatnaam` VARCHAR(45) NOT NULL COMMENT '',
  `b.huisnummer` VARCHAR(45) NOT NULL COMMENT '',
  `b.postcode` VARCHAR(45) NOT NULL COMMENT '',
  `telefoonnummer` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`emailadres`)  COMMENT '',
  CONSTRAINT `fk_klant_Account1`
    FOREIGN KEY (`emailadres`)
    REFERENCES `mydb`.`Account` (`emailadres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`medewerker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`medewerker` (
  `emailadres` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`emailadres`)  COMMENT '',
  CONSTRAINT `fk_medewerker_Account1`
    FOREIGN KEY (`emailadres`)
    REFERENCES `mydb`.`Account` (`emailadres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`voorraadmutatie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`voorraadmutatie` (
  `productnummer` INT NOT NULL COMMENT '',
  `aantal` INT NOT NULL COMMENT '',
  `mutatiedatum` DATETIME NULL COMMENT '',
  `emailadres` VARCHAR(45) NOT NULL COMMENT '',
  `voorraadmutatienummer` INT NOT NULL AUTO_INCREMENT COMMENT '',
  PRIMARY KEY (`voorraadmutatienummer`)  COMMENT '',
  INDEX `fk_voorraad_Product1_idx` (`productnummer` ASC)  COMMENT '',
  INDEX `fk_voorraadmutatie_medewerker1_idx` (`emailadres` ASC)  COMMENT '',
  CONSTRAINT `fk_voorraad_Product1`
    FOREIGN KEY (`productnummer`)
    REFERENCES `mydb`.`Product` (`productnummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_voorraadmutatie_medewerker1`
    FOREIGN KEY (`emailadres`)
    REFERENCES `mydb`.`medewerker` (`emailadres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bestelregel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`bestelregel` (
  `bestelnummer` INT NOT NULL COMMENT '',
  `emailadres` VARCHAR(45) NOT NULL COMMENT '',
  `productnummer` INT NOT NULL COMMENT '',
  `aantal` INT NOT NULL COMMENT '',
  `datum` DATETIME NOT NULL COMMENT '',
  `betaald` TINYINT(1) NOT NULL COMMENT '',
  PRIMARY KEY (`bestelnummer`)  COMMENT '',
  INDEX `fk_bestelregel_klant_idx` (`emailadres` ASC)  COMMENT '',
  INDEX `fk_bestelregel_Product1_idx` (`productnummer` ASC)  COMMENT '',
  CONSTRAINT `fk_bestelregel_klant`
    FOREIGN KEY (`emailadres`)
    REFERENCES `mydb`.`klant` (`emailadres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bestelregel_Product1`
    FOREIGN KEY (`productnummer`)
    REFERENCES `mydb`.`Product` (`productnummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`factuur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`factuur` (
  `factuurnummer` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `factuurdatum` DATETIME NULL COMMENT '',
  PRIMARY KEY (`factuurnummer`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`leverregel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`leverregel` (
  `bestelnummer` INT NOT NULL COMMENT '',
  `factuurnummer` INT NULL COMMENT '',
  `voorraadmutatie_productnummer` INT NOT NULL COMMENT '',
  PRIMARY KEY (`voorraadmutatie_productnummer`)  COMMENT '',
  INDEX `fk_leverregel_factuur1_idx` (`factuurnummer` ASC)  COMMENT '',
  CONSTRAINT `fk_leverregel_bestelregel1`
    FOREIGN KEY (`bestelnummer`)
    REFERENCES `mydb`.`bestelregel` (`bestelnummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_leverregel_voorraadmutatie1`
    FOREIGN KEY (`voorraadmutatie_productnummer`)
    REFERENCES `mydb`.`voorraadmutatie` (`voorraadmutatienummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_leverregel_factuur1`
    FOREIGN KEY (`factuurnummer`)
    REFERENCES `mydb`.`factuur` (`factuurnummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`betaling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`betaling` (
  `kenmerknummer` INT NOT NULL COMMENT '',
  `factuurnummer` INT NULL COMMENT '',
  `bedrag` DECIMAL NULL COMMENT '',
  PRIMARY KEY (`kenmerknummer`)  COMMENT '',
  INDEX `fk_betaling_factuur1_idx` (`factuurnummer` ASC)  COMMENT '',
  CONSTRAINT `fk_betaling_factuur1`
    FOREIGN KEY (`factuurnummer`)
    REFERENCES `mydb`.`factuur` (`factuurnummer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
