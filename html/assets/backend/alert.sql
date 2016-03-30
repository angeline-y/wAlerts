DROP DATABASE wAlert;
CREATE DATABASE wAlert;

USE wAlert;

DROP TABLE	if 	exists 	users 	cascade;
DROP TABLE	if 	exists 	regions 	cascade;

CREATE TABLE users(
	uid		INTEGER AUTO_INCREMENT	PRIMARY KEY,
	unumber	VARCHAR(11)	NOT NULL,
	uregionid INTEGER REFERENCES regions(rid),
	ucode	VARCHAR(5),
	uactive	INTEGER UNSIGNED DEFAULT 0);

CREATE TABLE regions(
	rid		INTEGER AUTO_INCREMENT PRIMARY KEY,
	rname	VARCHAR(200) NOT NULL);

CREATE TABLE alerts(
	aid		INTEGER AUTO_INCREMENT PRIMARY KEY,
	aregionid	INTEGER REFERENCES regions(rid),
	amsg VARCHAR(500) NOT NULL);

ALTER TABLE users ADD UNIQUE unumber (unumber);

INSERT INTO regions(rname) VALUES("City of Toronto");





