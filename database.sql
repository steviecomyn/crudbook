DROP DATABASE IF EXISTS crudbook;
CREATE DATABASE crudbook;

-- CREATE USER 'crudbookUser'@'localhost' IDENTIFIED BY 'securePasswordlol';

-- GRANT ALL PRIVILEGES ON crudbook.* TO 'crudbookUser'@'localhost';

-- FLUSH PRIVILEGES;

USE crudbook;

/* Create Tables */

CREATE TABLE users (
    user_id INT(128) AUTO_INCREMENT,
    user_first_name VARCHAR(64) NOT NULL,
    user_last_name VARCHAR(64) NOT NULL,
    user_email VARCHAR(128) NOT NULL,
    user_password CHAR(60) NOT NULL,
    PRIMARY KEY (user_id)
);

/* Insert Testdata */

INSERT INTO
    users
    (
        user_first_name,
        user_last_name,
        user_email,
        user_password
    )
VALUES
    (
        'Default',
        'User',
        'username@domain.com',
        '$2y$12$N79xMhb2MjpJFdxK/5ZxAOFlApMze9iz8kb0grDU1tVzWieXXESBC'
    );