CREATE TABLE area (  
    area VARCHAR(30),  
    PRIMARY KEY (area)  
);

CREATE TABLE address (  
    address_id INT AUTO_INCREMENT,  
    flat_no VARCHAR(6),  
    house_no INT,  
    road_no VARCHAR(5),  
    zip_code CHAR(4),  
    city VARCHAR(20),  
    district VARCHAR(20),  
    division VARCHAR(20),  
    area VARCHAR(30),  
    PRIMARY KEY (address_id),  
    FOREIGN KEY (area) REFERENCES area (area) 
);

CREATE TABLE restaurant (  
    restaurant_id INT AUTO_INCREMENT,  
    name VARCHAR(30),  
    phone_no VARCHAR(15),  
    address_id INT,  
    PRIMARY KEY (restaurant_id),  
    FOREIGN KEY (address_id) REFERENCES address (address_id)  
);

CREATE TABLE menu_item (
    food_id INT AUTO_INCREMENT,  
    name VARCHAR(30),
    category VARCHAR(30),
    cuisine VARCHAR(20),
    price DOUBLE,
    restaurant_id INT,
    PRIMARY KEY (food_id),
    FOREIGN KEY (restaurant_id) REFERENCES restaurant (restaurant_id)  
);

CREATE TABLE user (  
    user_id INT AUTO_INCREMENT,  
    name VARCHAR(30),  
    phone VARCHAR(15),  
    email VARCHAR(30),  
    date_of_birth DATE,  
    customer_flag BOOLEAN,  
    nid_id VARCHAR(15),  
    username VARCHAR(30),  
    password VARCHAR(30),  
    address_id INT,  
    PRIMARY KEY (user_id),  
    FOREIGN KEY (address_id) REFERENCES address (address_id)  
);

CREATE TABLE delivery_locations (  
    restaurant_id INT,  
    area VARCHAR(30),  
    PRIMARY KEY (restaurant_id, area),  
    FOREIGN KEY (restaurant_id) REFERENCES restaurant (restaurant_id),  
    FOREIGN KEY (area) REFERENCES area (area)  
);

CREATE TABLE cart (  
    user_id INT,  
    food_id INT,  
    quantity INT,  
    PRIMARY KEY (user_id, food_id),  
    FOREIGN KEY (user_id) REFERENCES user (user_id),  
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id)  
);

CREATE TABLE discount (  
    campaign_id INT AUTO_INCREMENT,  
    campaign_name VARCHAR(30),  
    food_id INT,  
    percentage DOUBLE,  
    start_date DATE,  
    expiry_date DATE,  
    PRIMARY KEY (campaign_id, food_id),  
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id)  
);

CREATE TABLE voucher (  
    voucher_id INT AUTO_INCREMENT,  
    promo_code VARCHAR(20),  
    percentage DOUBLE,  
    start_date DATE,  
    expiry_date DATE,  
    PRIMARY KEY (voucher_id)  
);

CREATE TABLE voucher_used (  
    voucher_id INT,
    user_id INT,
    PRIMARY KEY (voucher_id, user_id),
    FOREIGN KEY (user_id) REFERENCES user (user_id),  
    FOREIGN KEY (voucher_id) REFERENCES voucher (voucher_id)  
);

CREATE TABLE rating (  
    rating_id INT AUTO_INCREMENT,  
    user_id INT,  
    stars INT,  
    comment VARCHAR(255),  
    date DATE,  
    restaurant_flag BOOLEAN,  
    restaurant_id INT,  
    food_id INT,  
    PRIMARY KEY (rating_id),  
    FOREIGN KEY (user_id) REFERENCES user (user_id),  
    FOREIGN KEY (restaurant_id) REFERENCES restaurant (restaurant_id),  
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id)  
);

CREATE TABLE driver (  
    driver_id INT AUTO_INCREMENT,  
    name VARCHAR(30),  
    phone VARCHAR(15),  
    email VARCHAR(30),  
    date_of_birth DATE,  
    nid_id VARCHAR(15),  
    license_no VARCHAR(20),  
    address_id INT,  
    PRIMARY KEY (driver_id),  
    FOREIGN KEY (address_id) REFERENCES address (address_id)  
);

CREATE TABLE favorite (  
    favorite_id INT AUTO_INCREMENT,  
    name VARCHAR(30),  
    food_id INT,  
    quantity INT,  
    user_id INT,  
    PRIMARY KEY (favorite_id, food_id),  
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id),  
    FOREIGN KEY (user_id) REFERENCES user (user_id)  
);

CREATE TABLE payment (  
    transaction_id INT AUTO_INCREMENT,  
    user_id INT,  
    payment_method BOOLEAN,  
    transaction_source VARCHAR(30),  
    amount INT,  
    PRIMARY KEY (transaction_id),  
    FOREIGN KEY (user_id) REFERENCES user (user_id)  
);

CREATE TABLE orders (  
    order_id INT AUTO_INCREMENT,  
    food_id INT,  
    quantity INT,  
    date DATE,  
    delivery_status VARCHAR(15),  
    payment_status VARCHAR(15),  
    user_id INT,  
    address_id INT,  
    driver_id INT,  
    voucher_id INT,  
    PRIMARY KEY (order_id, food_id),  
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id),  
    FOREIGN KEY (user_id) REFERENCES user (user_id),  
    FOREIGN KEY (address_id) REFERENCES address (address_id),  
    FOREIGN KEY (driver_id) REFERENCES driver (driver_id),  
    FOREIGN KEY (voucher_id) REFERENCES voucher (voucher_id)  
);