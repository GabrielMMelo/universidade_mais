DROP SCHEMA IF EXISTS universidademais;
CREATE SCHEMA IF NOT EXISTS universidademais;
USE universidademais;

CREATE TABLE IF NOT EXISTS post (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  content text NOT NULL,
  img varchar(50) NOT NULL,
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS comments (
  id int(11) NOT NULL AUTO_INCREMENT,
  postId int(11) NOT NULL,
  name varchar(50) DEFAULT 'Anônimo',
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  comment text NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (postId) REFERENCES post(id)
);

CREATE TABLE IF NOT EXISTS subcomments (
  id int(11) NOT NULL AUTO_INCREMENT,
  commentId int(11) NOT NULL,
  name varchar(50) DEFAULT 'Anônimo',
  comment text NOT NULL,
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (commentId) REFERENCES comments(id)
);

CREATE TABLE IF NOT EXISTS authors (
  name VARCHAR(50) NOT NULL,
  bio text NOT NULL,
  img varchar(50) NOT NULL,
  linkedin VARCHAR(100) DEFAULT "#",
  twitter VARCHAR(100) DEFAULT "#",
  instagram VARCHAR(100) DEFAULT "#",
  PRIMARY KEY (name)
);

INSERT INTO authors (name,bio, img, pass) VALUES ("Usuario", "Sua biografia", "usuario.png", MD5('pass'));
