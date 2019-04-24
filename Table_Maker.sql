
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema DC_DB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DC_DB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DC_DB` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema world
-- -----------------------------------------------------
USE `DC_DB` ;

-- -----------------------------------------------------
-- Table `DC_DB`.`Digital_Pantry`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DC_DB`.`Digital_Pantry` (
  `Ingredient_ID` INT NOT NULL AUTO_INCREMENT,
  `Ingredient_Name` VARCHAR(45) NOT NULL,
  `Quantity` INT NOT NULL,
  `Unit_of_measure` INT NOT NULL,
  PRIMARY KEY (`Ingredient_ID`, `Ingredient_Name`),
  UNIQUE INDEX `idRecipes_UNIQUE` (`Ingredient_ID` ASC) VISIBLE,
  UNIQUE INDEX `Ingredient_Name_UNIQUE` (`Ingredient_Name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DC_DB`.`Recipes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DC_DB`.`Recipes` (
  `Recipe_ID` INT NOT NULL AUTO_INCREMENT,
  `Time` VARCHAR(45) NOT NULL,
  `Culture` INT NOT NULL,
  `User_generated` INT NOT NULL,
  PRIMARY KEY (`Recipe_ID`),
  UNIQUE INDEX `idRecipes_UNIQUE` (`Recipe_ID` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DC_DB`.`Ingredients_1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DC_DB`.`Ingredients_1` (
  `Ingredient_ID` INT NOT NULL AUTO_INCREMENT,
  `Recipe_ID` INT NOT NULL,
  `Ingredient_Name` VARCHAR(45) NULL,
  `Quantity` VARCHAR(45) NULL,
  `Unit_of_measure` VARCHAR(10) NULL,
  PRIMARY KEY (`Ingredient_ID`, `Recipe_ID`),
  UNIQUE INDEX `Ingredient_ID_UNIQUE` (`Ingredient_ID` ASC) VISIBLE,
  INDEX `Recipe_ID_idx` (`Recipe_ID` ASC) VISIBLE,
  CONSTRAINT `Recipe_ID_Ingredients`
    FOREIGN KEY (`Recipe_ID`)
    REFERENCES `DC_DB`.`Recipes` (`Recipe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DC_DB`.`Steps_1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DC_DB`.`Steps_1` (
  `Step_ID` INT NOT NULL,
  `Recipe_ID` INT NOT NULL,
  `Description` VARCHAR(10000) NOT NULL,
  INDEX `Recipe_ID_idx` (`Recipe_ID` ASC) VISIBLE,
  PRIMARY KEY (`Step_ID`, `Recipe_ID`),
  UNIQUE INDEX `Step_ID_UNIQUE` (`Step_ID` ASC) VISIBLE,
  CONSTRAINT `Recipe_ID_Steps`
    FOREIGN KEY (`Recipe_ID`)
    REFERENCES `DC_DB`.`Recipes` (`Recipe_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
