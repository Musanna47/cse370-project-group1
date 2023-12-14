INSERT INTO area (name, city, district) VALUES 
('Dhanmondi', 'Dhaka', 'Dhaka'),
('Wari', 'Dhaka', 'Dhaka'),
('Gulshan', 'Dhaka', 'Dhaka'),
('Banani', 'Dhaka', 'Dhaka'),

INSERT INTO address (flat_no, house_no, road_no, zip_code, area_id) VALUES
('A1', 1, 'Road 1', '1205', 1),
('B2', 2, 'Road 2', '1206', 2),
('C3', 3, 'Road 3', '1207', 3),
('D4', 4, 'Road 4', '1208', 4),
('A1', 1, 'Road 1', '1205', 1),
('B2', 2, 'Road 2', '1206', 2),
('C3', 3, 'Road 3', '1207', 3),
('D4', 4, 'Road 4', '1208', 4),
('A1', 1, 'Road 1', '1205', 1),
('B2', 2, 'Road 2', '1206', 2),

INSERT INTO restaurant (name, phone_no, address_id) VALUES
('Dhaka Diner', '01711223344', 1),
('Wari Biryani House', '01887766555', 2),
('Gulshan Grill', '01655443322', 3),
('Banani Bakes', '01558877666', 4),
('Momo Madness', '01991234567', 1),
('Spice Haven', '01782345678', 2),
('Seafood Delight', '01673456789', 3),
('Crispy Corner', '01584567890', 4),
('Noodle Nook', '01895678901', 1),
('Pizza Palace', '01981234567', 2),

INSERT INTO users (name, phone, email, date_of_birth, customer_flag, nid_no, username, user_password, due_amount, address_id) VALUES
('Mohammad Rahman', '01711223344', 'mohammad@example.com', '1990-05-15', 1, '123456789012', 'mrahman', 'password123', 0, 1),
('Fatima Akhtar', '01887766555', 'fatima@example.com', '1985-08-20', 1, '234567890123', 'fakhtar', 'pass123word', 0, 2),
('Ali Khan', '01663334444', 'ali@example.com', '1992-02-25', 1, '345678901234', 'alikhan', 'securepass', 0, 3),
('Ayesha Ahmed', '01554443322', 'ayesha@example.com', '1988-11-15', 1, '456789012345', 'aahmed', 'strongpass', 0, 4),
('Sadia Islam', '01995556666', 'sadia@example.com', '1995-06-30', 1, '567890123456', 'sadiai', 'password321', 0, 1),
('Nafisa Khan', '01881112222', 'nafisa@example.com', '1993-09-12', 1, '678901234567', 'nafisak', 'nafisapass', 0, 2),
('Imran Ahmed', '01772223333', 'imran@example.com', '1991-04-02', 1, '789012345678', 'imrana', 'imranpass', 0, 3),
('Farhana Khan', '01663334455', 'farhana@example.com', '1994-07-21', 1, '890123456789', 'farhanak', 'farhanapass', 0, 4),
('Kamal Hassan', '01554445555', 'kamal@example.com', '1987-12-03', 1, '901234567890', 'kamalh', 'kamalpass', 0, 1),
('Sabina Islam', '01996667777', 'sabina@example.com', '1996-03-18', 1, '012345678901', 'sabinai', 'sabinapass', 0, 2),
('Rahim Ali', '01778889999', 'rahim@example.com', '1990-08-25', 1, '112233445566', 'rahima', 'rahimpass', 0, 3),
('Tasnim Jahan', '01889991111', 'tasnim@example.com', '1984-11-05', 1, '223344556677', 'tasnimj', 'tasnimpass', 0, 4),
('Shahid Hasan', '01661010101', 'shahid@example.com', '1992-02-15', 1, '334455667788', 'shahidh', 'shahidpass', 0, 1),
('Nazia Begum', '01551112222', 'nazia@example.com', '1993-05-30', 1, '445566778899', 'naziah', 'naziapass', 0, 2),
('Iqbal Khan', '01992223333', 'iqbal@example.com', '1989-10-10', 1, '556677889900', 'iqbalk', 'iqbalpass', 0, 3),
('Shabnam Akhtar', '01773334444', 'shabnam@example.com', '1991-07-17', 1, '667788990011', 'shabnama', 'shabnampass', 0, 4),
('Rahima Akter', '01884445555', 'rahima@example.com', '1988-04-08', 1, '778899001122', 'rahimaa', 'rahimapass', 0, 1),
('Asaduzzaman Khan', '01665556666', 'asad@example.com', '1995-11-22', 1, '889900112233', 'asadk', 'asadpass', 0, 2),
('Sultana Ahmed', '01556667777', 'sultana@example.com', '1986-06-12', 1, '990011122344', 'sultanaa', 'sultanapass', 0, 3),
('Imtiaz Hossain', '01997778888', 'imtiaz@example.com', '1994-01-28', 0, '001122334455', 'imtiazh', 'imtiazpass', 0, 4),
('Sara Rahman', '01888889999', 'sara@example.com', '1987-09-14', 0, '112233445566', 'sarar', 'sarapass', 0, 1);

INSERT INTO menu_item (name, category, price, restaurant_id) VALUES
-- Dhaka Diner
('Biryani', 'Main Course', 250, 1),
('Chicken Curry', 'Main Course', 200, 1),
('Vegetable Pulao', 'Main Course', 180, 1),
('Garlic Naan', 'Bread', 90, 1),
('Gulab Jamun', 'Dessert', 120, 1),

-- Wari Biryani House
('Special Biryani', 'Main Course', 280, 2),
('Beef Kabab', 'Appetizer', 200, 2),
('Mutton Bhuna', 'Main Course', 220, 2),
('Tandoori Roti', 'Bread', 80, 2),
('Firni', 'Dessert', 150, 2),

-- Gulshan Grill
('Grilled Chicken', 'Main Course', 300, 3),
('Prawn Masala', 'Main Course', 350, 3),
('Vegetable Kebab', 'Appetizer', 180, 3),
('Butter Naan', 'Bread', 100, 3),
('Ras Malai', 'Dessert', 130, 3),

-- Banani Bakes
('Chocolate Cake', 'Dessert', 150, 4),
('Cheese Pizza', 'Main Course', 200, 4),
('Chicken Sandwich', 'Main Course', 180, 4),
('Blueberry Muffin', 'Dessert', 120, 4),
('Garlic Bread', 'Appetizer', 90, 4),

-- Momo Madness
('Chicken Momos', 'Appetizer', 120, 5),
('Pork Momos', 'Appetizer', 130, 5),
('Vegetable Momos', 'Appetizer', 100, 5),
('Tandoori Momos', 'Appetizer', 150, 5),
('Chilli Momos', 'Appetizer', 140, 5),

-- Spice Haven
('Chicken Curry', 'Main Course', 180, 6),
('Paneer Tikka', 'Appetizer', 160, 6),
('Beef Biryani', 'Main Course', 250, 6),
('Butter Chicken', 'Main Course', 200, 6),
('Naan', 'Bread', 80, 6),

-- Seafood Delight
('Grilled Fish', 'Main Course', 300, 7),
('Shrimp Scampi', 'Main Course', 350, 7),
('Calamari Rings', 'Appetizer', 180, 7),
('Fish Tacos', 'Main Course', 220, 7),
('Seafood Platter', 'Main Course', 400, 7),

-- Crispy Corner
('Fried Chicken', 'Main Course', 200, 8),
('Onion Rings', 'Appetizer', 90, 8),
('Fish and Chips', 'Main Course', 220, 8),
('Mozzarella Sticks', 'Appetizer', 100, 8),
('French Fries', 'Appetizer', 80, 8),

-- Noodle Nook
('Chicken Chow Mein', 'Main Course', 180, 9),
('Beef Stir Fry', 'Main Course', 200, 9),
('Vegetable Noodles', 'Main Course', 150, 9),
('Shrimp Pad Thai', 'Main Course', 220, 9),
('Hot and Sour Soup', 'Appetizer', 100, 9),

-- Pizza Palace
('Margherita Pizza', 'Main Course', 180, 10),
('Pepperoni Pizza', 'Main Course', 200, 10),
('Vegetarian Pizza', 'Main Course', 170, 10),
('Hawaiian Pizza', 'Main Course', 220, 10),
('Garlic Knots', 'Appetizer', 90, 10)

INSERT INTO rating (user_id, stars, comment, date, restaurant_flag, restaurant_id, food_id) VALUES
(1, 4, 'Great ambiance!', '2023-01-10', 1, 1, NULL),
(2, 5, 'Best biryani in town!', '2023-02-05', 1, 2, NULL),
(3, 4, 'Delicious grilled chicken!', '2023-03-15', 1, 3, NULL),
(4, 5, 'Amazing cakes!', '2023-04-20', 1, 4, NULL),
(5, 3, 'Good momos!', '2023-05-25', 1, 5, NULL),
(6, 4, 'Spicy and flavorful!', '2023-06-30', 1, 6, NULL),
(7, 5, 'Excellent seafood!', '2023-07-10', 1, 7, NULL),
(8, 4, 'Crispy fried chicken!', '2023-08-15', 1, 8, NULL),
(9, 3, 'Tasty noodles!', '2023-09-20', 1, 9, NULL),
(10, 5, 'Love the pizzas!', '2023-10-25', 1, 10, NULL),

INSERT INTO rating (user_id, stars, comment, date, restaurant_flag, restaurant_id, food_id) VALUES
(1, 5, 'Delicious biryani!', '2023-01-12', 0, NULL, 1),
(2, 4, 'Spicy kebabs!', '2023-02-07', 0, NULL, 2),
(3, 5, 'Perfectly grilled chicken!', '2023-03-17', 0, NULL, 3),
(4, 4, 'Decadent chocolate cake!', '2023-04-22', 0, NULL, 4),
(5, 3, 'Good momos!', '2023-05-27', 0, NULL, 5),
(6, 4, 'Spicy chicken curry!', '2023-07-02', 0, NULL, 6),
(7, 5, 'Delicious grilled fish!', '2023-07-12', 0, NULL, 7),
(8, 4, 'Crispy fried chicken!', '2023-08-17', 0, NULL, 8),
(9, 3, 'Tasty chicken chow mein!', '2023-09-22', 0, NULL, 9),
(10, 5, 'Margherita pizza is the best!', '2023-10-27', 0, NULL, 10);