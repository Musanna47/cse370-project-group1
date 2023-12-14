CREATE TABLE area (
    area_id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    city VARCHAR(20) NOT NULL,
    district VARCHAR(20) NOT NULL,
    PRIMARY KEY (area_id)
);

CREATE TABLE address (
    address_id INT AUTO_INCREMENT,
    flat_no VARCHAR(10),
    house_no INT NOT NULL,
    road_no VARCHAR(10) NOT NULL,
    zip_code CHAR(4),
    area_id INT NOT NULL,
    PRIMARY KEY (address_id),
    FOREIGN KEY (area_id) REFERENCES area (area_id)
);

CREATE TABLE restaurant (
    restaurant_id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    phone_no VARCHAR(15) NOT NULL UNIQUE,
    address_id INT NOT NULL,
    PRIMARY KEY (restaurant_id),
    FOREIGN KEY (address_id) REFERENCES address (address_id)
);

CREATE TABLE menu_item (
    food_id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    category VARCHAR(30),
    price DOUBLE NOT NULL,
    restaurant_id INT,
    PRIMARY KEY (food_id),
    FOREIGN KEY (restaurant_id) REFERENCES restaurant (restaurant_id) ON DELETE SET NULL
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    phone VARCHAR(15) UNIQUE,
    email VARCHAR(30) NOT NULL UNIQUE,
    date_of_birth DATE NOT NULL,
    customer_flag BOOLEAN NOT NULL,
    nid_no VARCHAR(15) UNIQUE,
    username VARCHAR(30) NOT NULL UNIQUE,
    user_password VARCHAR(30) NOT NULL,
    due_amount INT NOT NULL DEFAULT 0,
    address_id INT NOT NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (address_id) REFERENCES address (address_id)
);

CREATE TABLE delivery_locations (
    restaurant_id INT,
    area_id INT,
    PRIMARY KEY (restaurant_id, area_id),
    FOREIGN KEY (restaurant_id) REFERENCES restaurant (restaurant_id) ON DELETE CASCADE,
    FOREIGN KEY (area_id) REFERENCES area (area_id) ON DELETE CASCADE
);

CREATE TABLE cart (
    user_id INT,
    food_id INT,
    quantity INT NOT NULL,
    PRIMARY KEY (user_id, food_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id) ON DELETE CASCADE
);

CREATE TABLE discount (
    discount_id INT AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    description VARCHAR(255) NOT NULL,
    percentage DECIMAL(5, 2) NOT NULL,
    start_date DATE NOT NULL,
    expiry_date DATE NOT NULL,
    PRIMARY KEY (discount_id)
);

CREATE TABLE discounted_items (
    discount_id INT,
    food_id INT,
    PRIMARY KEY (discount_id, food_id),
    FOREIGN KEY (discount_id) REFERENCES discount (discount_id) ON DELETE CASCADE,
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id) ON DELETE CASCADE
);

CREATE TABLE voucher (
    voucher_id INT AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    description VARCHAR(255),
    promo_code VARCHAR(20) NOT NULL UNIQUE,
    percentage DECIMAL(5, 2) NOT NULL,
    start_date DATE NOT NULL,
    expiry_date DATE NOT NULL,
    PRIMARY KEY (voucher_id)
);

CREATE TABLE voucher_used (
    voucher_id INT,
    user_id INT,
    PRIMARY KEY (voucher_id, user_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
    FOREIGN KEY (voucher_id) REFERENCES voucher (voucher_id) ON DELETE CASCADE
);

CREATE TABLE rating (
    rating_id INT AUTO_INCREMENT,
    user_id INT,
    stars INT NOT NULL,
    comment VARCHAR(255),
    date DATE NOT NULL,
    restaurant_flag BOOLEAN NOT NULL,
    restaurant_id INT,
    food_id INT,
    PRIMARY KEY (rating_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE SET NULL,
    FOREIGN KEY (restaurant_id) REFERENCES restaurant (restaurant_id) ON DELETE CASCADE,
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id) ON DELETE CASCADE
);

CREATE TABLE driver (
    driver_id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    phone VARCHAR(15) NOT NULL UNIQUE,
    email VARCHAR(30) NOT NULL UNIQUE,
    date_of_birth DATE NOT NULL,
    nid_no VARCHAR(15) NOT NULL UNIQUE,
    license_no VARCHAR(20) NOT NULL UNIQUE,
    address_id INT NOT NULL,
    PRIMARY KEY (driver_id),
    FOREIGN KEY (address_id) REFERENCES address (address_id)
);

CREATE TABLE payment (
    transaction_id INT AUTO_INCREMENT,
    user_id INT NOT NULL,
    payment_method VARCHAR(30),
    transaction_source VARCHAR(30),
    amount INT NOT NULL,
    PRIMARY KEY (transaction_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT,
    date DATE NOT NULL,
    delivery_status VARCHAR(15) NOT NULL,
    total_price INT NOT NULL,
    user_id INT,
    address_id INT,
    driver_id INT,
    voucher_id INT,
    PRIMARY KEY (order_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE SET NULL,
    FOREIGN KEY (address_id) REFERENCES address (address_id) ON DELETE SET NULL,
    FOREIGN KEY (driver_id) REFERENCES driver (driver_id) ON DELETE SET NULL,
    FOREIGN KEY (voucher_id) REFERENCES voucher (voucher_id) ON DELETE SET NULL
);

CREATE TABLE ordered_items (
    order_id INT,
    item_no INT,
    food_id INT,
    quantity INT NOT NULL,
    price INT NOT NULL,
    PRIMARY KEY (order_id, item_no),
    FOREIGN KEY (food_id) REFERENCES menu_item (food_id) ON DELETE SET NULL,
    FOREIGN KEY (order_id) REFERENCES orders (order_id) ON DELETE CASCADE
);
