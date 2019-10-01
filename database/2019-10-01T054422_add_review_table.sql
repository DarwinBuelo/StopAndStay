CREATE TABLE 
    `stop_n_stay`.`reviews` 
( `review_id` INT NOT NULL AUTO_INCREMENT ,
  `prop_id` INT NOT NULL ,
  `rate` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `comment` LONGTEXT NOT NULL ,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY  (`review_id`)) ENGINE = InnoDB;