SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `project1-final` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `project1-final` ;

-- -----------------------------------------------------
-- Table `project1-final`.`page`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project1-final`.`page` (
  `pageID` INT NOT NULL AUTO_INCREMENT ,
  `menu` ENUM('ja', 'nee') NOT NULL DEFAULT ja ,
  `status` ENUM('online', 'offline') NOT NULL DEFAULT offline ,
  PRIMARY KEY (`pageID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project1-final`.`pageLocal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project1-final`.`pageLocal` (
  `pageLocalID` INT NOT NULL AUTO_INCREMENT ,
  `pageID` INT NOT NULL ,
  `title` VARCHAR(255) NULL ,
  `titleURL` VARCHAR(255) NULL ,
  `description` TEXT NULL ,
  `local` VARCHAR(5) NULL ,
  PRIMARY KEY (`pageLocalID`) ,
  INDEX `fk_pageLocal_page` (`pageID` ASC) ,
  CONSTRAINT `fk_pageLocal_page`
    FOREIGN KEY (`pageID` )
    REFERENCES `project1-final`.`page` (`pageID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `project1-final`.`translate`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `project1-final`.`translate` (
  `translateID` INT NOT NULL AUTO_INCREMENT ,
  `tag` VARCHAR(45) NULL ,
  `translation` TEXT NULL ,
  `translated` TINYINT(1)  NULL DEFAULT 0 ,
  `local` VARCHAR(5) NULL ,
  PRIMARY KEY (`translateID`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
