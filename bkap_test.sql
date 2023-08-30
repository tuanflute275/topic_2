CREATE DATABASE bkap_test;
use bkap_test;

CREATE TABLE category
(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE
);

CREATE TABLE product 
(
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    category_id int(11) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id),
    image varchar(225) NOT NULL,
    price float(11) NOT NULL,
    status tinyint NOT NULL DEFAULT 0,
    description text NOT NULL
);

INSERT INTO product(name, image, price, status, description, category_id) VALUES 
('tui xach', 'ldkoj','140000' 1, 'tui xach', 4);

