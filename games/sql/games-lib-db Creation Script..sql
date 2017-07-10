-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema games-lib-db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema games-lib-db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `games-lib-db` DEFAULT CHARACTER SET utf8 ;
USE `games-lib-db` ;

-- -----------------------------------------------------
-- Table `games-lib-db`.`Publishers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`Publishers` (
  `idPublishers` INT(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` VARCHAR(45) NULL DEFAULT NULL,
  `publisher_type` VARCHAR(45) NULL DEFAULT NULL,
  `publisher_headquarters` VARCHAR(45) NULL DEFAULT NULL,
  `publisher_website` VARCHAR(255) NULL DEFAULT NULL,
  `publisher_wiki_link` VARCHAR(255) NULL DEFAULT NULL,
  `publisher_notes` LONGTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`idPublishers`),
  UNIQUE INDEX `idPublishers_UNIQUE` (`idPublishers` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`tittles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`tittles` (
  `idtittle` INT(11) NOT NULL AUTO_INCREMENT,
  `tittle_name` VARCHAR(45) NULL DEFAULT NULL,
  `tittle_series` VARCHAR(45) NULL DEFAULT NULL,
  `tittle_engine` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idtittle`),
  UNIQUE INDEX `idTittles_UNIQUE` (`idtittle` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`Publishers_has_tittles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`Publishers_has_tittles` (
  `Publishers_idPublishers` INT(11) NOT NULL,
  `tittles_idTittles` INT(11) NOT NULL,
  `publishers_has_tittles_region` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Publishers_idPublishers`, `tittles_idTittles`),
  INDEX `fk_Publishers_has_tittles_tittles1_idx` (`tittles_idTittles` ASC),
  INDEX `fk_Publishers_has_tittles_Publishers1_idx` (`Publishers_idPublishers` ASC),
  CONSTRAINT `fk_Publishers_has_tittles_Publishers1`
    FOREIGN KEY (`Publishers_idPublishers`)
    REFERENCES `games-lib-db`.`Publishers` (`idPublishers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Publishers_has_tittles_tittles1`
    FOREIGN KEY (`tittles_idTittles`)
    REFERENCES `games-lib-db`.`tittles` (`idtittle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`developers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`developers` (
  `iddevelopers` INT(11) NOT NULL AUTO_INCREMENT,
  `developer_name` VARCHAR(45) NULL DEFAULT NULL,
  `developer_type` VARCHAR(45) NULL DEFAULT NULL,
  `developer_founded` VARCHAR(45) NULL DEFAULT NULL,
  `developer_founders` VARCHAR(100) NULL DEFAULT NULL,
  `developer_headquarters` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`iddevelopers`),
  UNIQUE INDEX `iddevelopers_UNIQUE` (`iddevelopers` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`developers_has_tittles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`developers_has_tittles` (
  `developers_iddevelopers` INT(11) NOT NULL,
  `tittles_idTittles` INT(11) NOT NULL,
  PRIMARY KEY (`developers_iddevelopers`, `tittles_idTittles`),
  INDEX `fk_developers_has_tittles_tittles1_idx` (`tittles_idTittles` ASC),
  INDEX `fk_developers_has_tittles_developers1_idx` (`developers_iddevelopers` ASC),
  CONSTRAINT `fk_developers_has_tittles_developers1`
    FOREIGN KEY (`developers_iddevelopers`)
    REFERENCES `games-lib-db`.`developers` (`iddevelopers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_developers_has_tittles_tittles1`
    FOREIGN KEY (`tittles_idTittles`)
    REFERENCES `games-lib-db`.`tittles` (`idtittle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`genres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`genres` (
  `genresid` INT(11) NOT NULL AUTO_INCREMENT,
  `genre_name` VARCHAR(45) NULL DEFAULT NULL,
  `genre_wiki_page` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`genresid`),
  UNIQUE INDEX `genresid_UNIQUE` (`genresid` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 49
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`people`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`people` (
  `idperson` INT(11) NOT NULL AUTO_INCREMENT,
  `person_name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idperson`),
  UNIQUE INDEX `idperson_UNIQUE` (`idperson` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 34
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`platforms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`platforms` (
  `idPlatforms` INT(11) NOT NULL AUTO_INCREMENT,
  `platform_name` VARCHAR(45) NULL DEFAULT NULL,
  `platform_family` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idPlatforms`),
  UNIQUE INDEX `idPlatforms_UNIQUE` (`idPlatforms` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`platforms_has_tittles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`platforms_has_tittles` (
  `platforms_idPlatforms` INT(11) NOT NULL,
  `tittles_idtittle` INT(11) NOT NULL,
  PRIMARY KEY (`platforms_idPlatforms`, `tittles_idtittle`),
  INDEX `fk_platforms_has_tittles_tittles1_idx` (`tittles_idtittle` ASC),
  INDEX `fk_platforms_has_tittles_platforms1_idx` (`platforms_idPlatforms` ASC),
  CONSTRAINT `fk_platforms_has_tittles_platforms1`
    FOREIGN KEY (`platforms_idPlatforms`)
    REFERENCES `games-lib-db`.`platforms` (`idPlatforms`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_platforms_has_tittles_tittles1`
    FOREIGN KEY (`tittles_idtittle`)
    REFERENCES `games-lib-db`.`tittles` (`idtittle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`release_dates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`release_dates` (
  `idrelease_dates` INT(11) NOT NULL AUTO_INCREMENT,
  `releasedate_region` VARCHAR(45) NULL DEFAULT NULL,
  `releasedate_date` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idrelease_dates`),
  UNIQUE INDEX `idrelease_dates_UNIQUE` (`idrelease_dates` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`roles` (
  `idroles` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idroles`),
  UNIQUE INDEX `idroles_UNIQUE` (`idroles` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`tittles_has_genres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`tittles_has_genres` (
  `tittles_idtittle` INT(11) NOT NULL,
  `genres_genresid` INT(11) NOT NULL,
  PRIMARY KEY (`tittles_idtittle`, `genres_genresid`),
  INDEX `fk_tittles_has_genres_genres1_idx` (`genres_genresid` ASC),
  INDEX `fk_tittles_has_genres_tittles1_idx` (`tittles_idtittle` ASC),
  CONSTRAINT `fk_tittles_has_genres_genres1`
    FOREIGN KEY (`genres_genresid`)
    REFERENCES `games-lib-db`.`genres` (`genresid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tittles_has_genres_tittles1`
    FOREIGN KEY (`tittles_idtittle`)
    REFERENCES `games-lib-db`.`tittles` (`idtittle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`tittles_has_people`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`tittles_has_people` (
  `tittles_idtittle` INT(11) NOT NULL,
  `people_idperson` INT(11) NOT NULL,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_tittles_has_people_people1_idx` (`people_idperson` ASC),
  INDEX `fk_tittles_has_people_tittles1_idx` (`tittles_idtittle` ASC),
  CONSTRAINT `fk_tittles_has_people_people1`
    FOREIGN KEY (`people_idperson`)
    REFERENCES `games-lib-db`.`people` (`idperson`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tittles_has_people_tittles1`
    FOREIGN KEY (`tittles_idtittle`)
    REFERENCES `games-lib-db`.`tittles` (`idtittle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`tittles_has_release_dates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`tittles_has_release_dates` (
  `idtittle` INT(11) NOT NULL,
  `idrelease_date` INT(11) NOT NULL,
  `idplatform` INT(11) NOT NULL,
  PRIMARY KEY (`idtittle`, `idrelease_date`, `idplatform`),
  INDEX `fk_tittles_has_release_dates_idplatform_idx` (`idplatform` ASC),
  INDEX `fk_tittles_has_release_dates_idrelease_date_idx` (`idrelease_date` ASC),
  CONSTRAINT `fk_tittles_has_release_dates_idplatform`
    FOREIGN KEY (`idplatform`)
    REFERENCES `games-lib-db`.`platforms` (`idPlatforms`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tittles_has_release_dates_idrelease_date`
    FOREIGN KEY (`idrelease_date`)
    REFERENCES `games-lib-db`.`release_dates` (`idrelease_dates`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tittles_has_release_dates_idtittle`
    FOREIGN KEY (`idtittle`)
    REFERENCES `games-lib-db`.`tittles` (`idtittle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `games-lib-db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games-lib-db`.`users` (
  `idUsers` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` CHAR(128) NOT NULL,
  `roles_idroles` INT(11) NOT NULL,
  PRIMARY KEY (`idUsers`),
  INDEX `fk_users_roles1_idx` (`roles_idroles` ASC),
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`roles_idroles`)
    REFERENCES `games-lib-db`.`roles` (`idroles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE USER 'user1';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
