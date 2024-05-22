-- createProductTable.sql
-- Table structure for table my_Product

DROP TABLE IF EXISTS my_Product;
CREATE TABLE my_Product
(
    product_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(40) NOT NULL,
    catCode VARCHAR(3) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    quantity INT NOT NULL,
    image_file VARCHAR(30) NOT NULL
);