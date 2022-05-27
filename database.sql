CREATE TABLE USERS (
  id int AUTO_INCREMENT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL UNIQUE,
  email varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  num_recensioni int DEFAULT 0,
)Engine='InnoDB';

CREATE TABLE REVIEWS (
 id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
 author int NOT NULL,
 published timestamp not null DEFAULT CURRENT_TIMESTAMP,
 title VARCHAR(255),
 text_content varchar(1000),
 index idx_author(author),
 FOREIGN KEY (author) REFERENCES USERS(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

DELIMITER //
CREATE TRIGGER reviews_trigger
AFTER INSERT ON REVIEWS
FOR EACH ROW
BEGIN
UPDATE USERS
SET num_recensioni = num_recensioni + 1;
WHERE id = new.author;
END //
DELIMITER ;
