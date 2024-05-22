-- createOrderItemTable.sql
DROP TABLE IF EXISTS my_OrderItem;
CREATE TABLE my_OrderItem
(
    order_item_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_item_name VARCHAR(40) NOT NULL,
    order_item_status VARCHAR(2) NOT NULL,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(6,2) NOT NULL
);