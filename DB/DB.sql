-- MySQL Script generated by MySQL Workbench
-- Tue Jan 24 21:45:29 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ProyectoWeb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ProyectoWeb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ProyectoWeb` DEFAULT CHARACTER SET utf8 ;
USE `ProyectoWeb` ;

-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Organizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Organizacion` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Organizacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `mision` VARCHAR(200) NOT NULL,
  `vision` VARCHAR(200) NOT NULL,
  `valores` VARCHAR(200) NOT NULL,
  `imagen` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`GruposTrabajo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`GruposTrabajo` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`GruposTrabajo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `Organizacion_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_GruposTrabajo_Organizacion1_idx` (`Organizacion_id` ASC),
  CONSTRAINT `fk_GruposTrabajo_Organizacion1`
    FOREIGN KEY (`Organizacion_id`)
    REFERENCES `ProyectoWeb`.`Organizacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Objetivos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Objetivos` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Objetivos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(200) NOT NULL,
  `GruposTrabajo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Objetivos_GruposTrabajo_idx` (`GruposTrabajo_id` ASC),
  CONSTRAINT `fk_Objetivos_GruposTrabajo`
    FOREIGN KEY (`GruposTrabajo_id`)
    REFERENCES `ProyectoWeb`.`GruposTrabajo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Actividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Actividades` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Actividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `lugar` VARCHAR(200) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `imagen` VARCHAR(200) NOT NULL,
  `GruposTrabajo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Actividades_GruposTrabajo1_idx` (`GruposTrabajo_id` ASC),
  CONSTRAINT `fk_Actividades_GruposTrabajo1`
    FOREIGN KEY (`GruposTrabajo_id`)
    REFERENCES `ProyectoWeb`.`GruposTrabajo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Documentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Documentos` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Documentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(200) NOT NULL,
  `Actividades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Documentos_Actividades1_idx` (`Actividades_id` ASC),
  CONSTRAINT `fk_Documentos_Actividades1`
    FOREIGN KEY (`Actividades_id`)
    REFERENCES `ProyectoWeb`.`Actividades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Usuarios` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `primer_apellido` VARCHAR(100) NOT NULL,
  `segundo_apellido` VARCHAR(100) NULL,
  `contrasenia` VARCHAR(100) NOT NULL,
  `esAdmin` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Usuarios_X_Grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Usuarios_X_Grupo` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Usuarios_X_Grupo` (
  `Usuarios_id` INT NOT NULL,
  `GruposTrabajo_id` INT NOT NULL,
  `uxg_id` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_Usuarios_has_GruposTrabajo_GruposTrabajo1_idx` (`GruposTrabajo_id` ASC),
  INDEX `fk_Usuarios_has_GruposTrabajo_Usuarios1_idx` (`Usuarios_id` ASC),
  PRIMARY KEY (`uxg_id`),
  CONSTRAINT `fk_Usuarios_has_GruposTrabajo_Usuarios1`
    FOREIGN KEY (`Usuarios_id`)
    REFERENCES `ProyectoWeb`.`Usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_GruposTrabajo_GruposTrabajo1`
    FOREIGN KEY (`GruposTrabajo_id`)
    REFERENCES `ProyectoWeb`.`GruposTrabajo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Subscripciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Subscripciones` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Subscripciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `motivacion` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoWeb`.`Subscripciones_X_Grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProyectoWeb`.`Subscripciones_X_Grupo` ;

CREATE TABLE IF NOT EXISTS `ProyectoWeb`.`Subscripciones_X_Grupo` (
  `Subscripciones_id` INT NOT NULL,
  `GruposTrabajo_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_Subscripciones_has_GruposTrabajo_GruposTrabajo1_idx` (`GruposTrabajo_id` ASC),
  INDEX `fk_Subscripciones_has_GruposTrabajo_Subscripciones1_idx` (`Subscripciones_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Subscripciones_has_GruposTrabajo_Subscripciones1`
    FOREIGN KEY (`Subscripciones_id`)
    REFERENCES `ProyectoWeb`.`Subscripciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Subscripciones_has_GruposTrabajo_GruposTrabajo1`
    FOREIGN KEY (`GruposTrabajo_id`)
    REFERENCES `ProyectoWeb`.`GruposTrabajo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
