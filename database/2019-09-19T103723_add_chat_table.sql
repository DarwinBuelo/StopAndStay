
CREATE TABLE 
    `stop_n_stay`.`chats` 
    ( 
      `chat_id` INT NOT NULL AUTO_INCREMENT ,
      `sender_id` INT NOT NULL ,
      `receiver_id` INT NOT NULL ,
      `message` LONGTEXT NOT NULL ,
      `time_sent` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
       PRIMARY KEY  (`chat_id`)
    ) 
ENGINE = InnoDB;