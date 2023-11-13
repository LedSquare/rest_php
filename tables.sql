CREATE TABLE product (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    size INT NOT NULL DEFAULT 0,
    is_avaiable BOOLEAN NOT NULL DEFAULT FASLE,
    primary key (id)
);