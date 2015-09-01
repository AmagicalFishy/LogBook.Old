/*Erases the 'contacts' table if it exists
Then creates another*/
DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
    name_id mediumint(5) NOT NULL AUTO_INCREMENT, 
    name varchar(25) DEFAULT NULL,
	email varchar(40) DEFAULT NULL,
	email2 varchar(40) DEFAULT NULL,
	phone varchar(20) DEFAULT NULL,
	phone2 varchar(20) DEFAULT NULL,
    PRIMARY KEY (name_id)
) ENGINE=InnoDb DEFAULT CHARACTER SET=latin1;

SHOW WARNINGS;
/*Erases the tables which hold the various
logbook posts if they exist, then recreates
them*/

/*Analysis & Monte Carlo Posts*/
DROP TABLE IF EXISTS posts_analysis;
CREATE TABLE posts_analysis (
  time timestamp NOT NULL DEFAULT NOW(),
  username varchar(25) DEFAULT NULL,
  message text,
  crossout tinyint(1) NOT NULL DEFAULT '0',
  post_id mediumint(9) NOT NULL AUTO_INCREMENT,
  filenames text DEFAULT NULL,
  PRIMARY KEY (post_id)
) ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARACTER SET=latin1;

/*Darkside Posts*/
DROP TABLE IF EXISTS posts_darkside;
CREATE TABLE posts_darkside (
  time datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  username varchar(25) DEFAULT NULL,
  message text,
  crossout tinyint(1) NOT NULL DEFAULT '0',
  post_id mediumint(9) NOT NULL AUTO_INCREMENT,
  filenames text DEFAULT NULL,
  PRIMARY KEY (post_id)
) ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARACTER SET=latin1;

/*Borexino Posts*/
DROP TABLE IF EXISTS posts_borexino;
CREATE TABLE posts_borexino (
  time datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  username varchar(25) DEFAULT NULL,
  message text,
  crossout tinyint(1) NOT NULL DEFAULT '0',
  post_id mediumint(9) NOT NULL AUTO_INCREMENT,
  filenames text DEFAULT NULL,
  PRIMARY KEY (post_id)
) ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARACTER SET=latin1;

/*LXe System Posts*/
DROP TABLE IF EXISTS posts_lxe;
CREATE TABLE posts_lxe (
  time datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  username varchar(25) DEFAULT NULL,
  message text,
  crossout tinyint(1) NOT NULL DEFAULT '0',
  post_id mediumint(9) NOT NULL AUTO_INCREMENT,
  filenames text DEFAULT NULL,
  PRIMARY KEY (post_id)
) ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARACTER SET=latin1;

/*Miscellaneous Posts*/
DROP TABLE IF EXISTS posts_misc;
CREATE TABLE posts_misc (
  time datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  username varchar(25) DEFAULT NULL,
  message text,
  crossout tinyint(1) NOT NULL DEFAULT '0',
  post_id mediumint(9) NOT NULL AUTO_INCREMENT,
  filenames text DEFAULT NULL,
  PRIMARY KEY (post_id)
) ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARACTER SET=latin1;

/*Photosensor Posts*/
DROP TABLE IF EXISTS posts_photosensor;
CREATE TABLE posts_photosensor (
  time datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  username varchar(25) DEFAULT NULL,
  message text,
  crossout tinyint(1) NOT NULL DEFAULT '0',
  post_id mediumint(9) NOT NULL AUTO_INCREMENT,
  filenames text DEFAULT NULL,
  PRIMARY KEY (post_id)
) ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARACTER SET=latin1;


