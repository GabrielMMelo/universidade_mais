DROP SCHEMA IF EXISTS universidademais;
CREATE SCHEMA IF NOT EXISTS universidademais;
USE universidademais;

CREATE TABLE IF NOT EXISTS post (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  content text NOT NULL,
  img varchar(50) NOT NULL,
  post_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);