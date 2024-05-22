-- createOrderTable.sql
DROP TABLE IF EXISTS my_Order;
CREATE TABLE my_Order
(
    order_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customer_id INT NOT NULL,
    order_status VARCHAR(2) NOT NULL,
    date_time DATETIME NOT NULL
);