CREATE USER '{{DB_USER}}'@'localhost' IDENTIFIED BY '{{DB_PASSWORD}}';
GRANT USAGE ON *.* TO '{{DB_USER}}'@'localhost';
CREATE DATABASE IF NOT EXISTS `{{DB_NAME}}`;
GRANT ALL PRIVILEGES ON `{{DB_NAME}}`.* TO '{{DB_USER}}'@'localhost';
FLUSH PRIVILEGES;
