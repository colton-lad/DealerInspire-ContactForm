# Run from the command line via:
# mysql -u root -p < <path>/db.sql
CREATE DATABASE IF NOT EXISTS di;
GRANT ALL ON di.* TO 'di'@'localhost' IDENTIFIED BY '*abc1234!';
USE di;
CREATE TABLE IF NOT EXISTS contact (
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	full_name VARCHAR(160) NOT NULL,
	email VARCHAR(200) NOT NULL,
	message text NOT NULL,
	phone VARCHAR(10) DEFAULT NULL,
	date_entered TIMESTAMP NOT NULL,
	PRIMARY KEY (id)
);
FLUSH PRIVILEGES;
