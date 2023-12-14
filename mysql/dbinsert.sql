INSERT INTO area (name, city, district)
VALUES
    ('dhanmondi', 'dhaka', 'dhaka'),
    ('mirpur', 'dhaka', 'dhaka'),
    ('mohammadpur', 'dhaka', 'dhaka'),
    ('motijheel', 'dhaka', 'dhaka'),
    ('badda', 'dhaka', 'dhaka'),
    ('mohakhali', 'dhaka', 'dhaka'),
    ('gulshan', 'dhaka', 'dhaka'),
    ('banani', 'dhaka', 'dhaka'),
    ('malibag', 'dhaka', 'dhaka'),
    ('shantinagar', 'dhaka', 'dhaka'),
    ('kakrail', 'dhaka', 'dhaka'),
    ('gulistan', 'dhaka', 'dhaka');

INSERT INTO address (flat_no, house_no, road_no, zip_code, area_id)
VALUES
    ('1A', 12, '2A', '1205', 1),
    ('1A', 22, '2-D-1', '1205', 1),
    ('1A', 14, '2/A', '1209', 3),
    ('1A', 11, '3', '1209', 3),
    ('1A', 2, '20C', '1206', 2),
    ('1A', 17, '12A', '1208', 4),
    ('12A', 13, '2A', '1215', 7),
    ('13C', 12, '2-D-1', '1215', 2),
    ('B12', 6, '2/A', '1206', 4),
    ('D09', 11, '3', '1209', 4),
    ('A3', 3, '20C', '1205', 2),
    ('B2', 18, '12A', '1208', 8);

INSERT INTO restaurant (name, phone_no, address_id)
VALUES
    ('mad chef', '01312122152', 1),
    ('chillox', '01765122133', 3),
    ('pizza burg', '01312221444', 1),
    ('kfc', '01542342136', 1),
    ('donut land', '01312231434', 4),
    ('burger king', '01766122134', 6),
    ('waffle up', '01812231488', 1),
    ('dominos pizza', '01912129852', 8);

INSERT INTO menu_item (name, category, price, restaurant_id)
VALUES
    ('beef burger', 'burger', 300, 6),
    ('cheese burger', 'burger', 350, 6),
    ('double cheese burger', 'burger', 400, 6),
    ('chicken burger', 'burger', 250, 6),
    ('pepperoni pizza', 'pizza', 850, 3),
    ('deluxe beef pizza', 'pizza', 1050, 3),
    ('chocolate donut', 'donut', 150, 5),
    ('strawberry donut', 'donut', 120, 5),
    ('banana donut', 'donut', 120, 5);

INSERT INTO users (name, phone, email, date_of_birth, customer_flag, nid_no,
                   username, user_password, address_id)
VALUES
    ('a', '01234234242', 'aaa@gmail.com', '1990-12-06', 1,
     NULL, 'aaa1234', 'aaa1234', 1),
    ('b', '01234234243', 'bbb@gmail.com', '1992-12-05', 0,
     '242523523', 'bbb1234', 'bbb1234', 3),
    ('c', '01234264242', 'ccc@gmail.com', '1990-01-13', 0,
     '846456243', 'ccc1234', 'ccc1234', 4),
    ('d', '01232234242', 'ddd@gmail.com', '1995-10-05', 1,
     NULL, 'ddd1234', 'ddd1234', 2),
    ('e', '01231234242', 'eee@gmail.com', '2003-02-02', 1,
     NULL, 'eee1234', 'eee1234', 1),
    ('f', '01234234842', 'fff@gmail.com', '1985-07-08', 0,
     '13242311', 'fff1234', 'fff1234', 3),
    ('g', '01234234772', 'ggg@gmail.com', '1997-11-06', 1,
     NULL, 'ggg1234', 'ggg1234', 8);

INSERT INTO delivery_locations (restaurant_id, area_id)
VALUES
    (3, 3),
    (3, 2),
    (3, 5),
    (3, 7),
    (5, 5),
    (5, 1),
    (5, 10),
    (6, 6),
    (6, 12),
    (6, 3);

INSERT INTO cart (user_id, food_id, quantity)
VALUES
    (3, 3, 3),
    (3, 2, 2),
    (3, 5, 4),
    (1, 7, 1),
    (5, 5, 2),
    (5, 1, 2),
    (5, 8, 5),
    (6, 6, 2),
    (6, 9, 3),
    (6, 3, 1);

INSERT INTO discount (title, percentage, start_date, expiry_date, description)
VALUES
    ('holiday sale', 5, '2023-12-1', '2023-12-31', 'Great offer');


INSERT INTO discounted_items (discount_id, food_id)
VALUES
    (1, 5),
    (1, 4),
    (1, 3),
    (1, 1);

INSERT INTO voucher (promo_code, percentage, start_date,
                     expiry_date, title, description)
VALUES 
    ('ABC123', 7.5,   '2023-12-3', '2023-12-10','special burger offer','7.5% off'),
    ('XYZ123', 5,  '2023-12-1', '2024-1-31', 'winter offer', 'Amazing offer');

INSERT INTO rating (user_id, stars, comment, date,
                    restaurant_flag, restaurant_id, food_id)
VALUES
    (1, 5, 'Great!', '2023-12-3', 1, 3, NULL),
    (2, 4, 'Good foods', '2023-12-5', 1, 3, NULL),
    (5, 4, 'Good pizzas', '2023-11-25', 1, 3, NULL),
    (1, 5, 'Awesome', '2023-12-3', 1, 6, NULL),
    (4, 5, NULL, '2023-12-1', 1, 6, NULL),
    (7, 5, NULL, '2023-11-30', 1, 6, NULL),
    (1, 5, 'Tasty', '2023-11-13', 0, 5, NULL),
    (1, 5, 'Delicious', '2023-10-23', 0, 5, NULL),
    (1, 3, 'not enough cheese', '2023-12-1', 0, 5, NULL);

INSERT INTO driver (name, phone, email, date_of_birth,
                    nid_no, license_no, address_id)
VALUES
    ('aa', '01534829431', 'aaaa@gmail.com', '1987-10-12', '234234243',
     '141414AD321', 12),
    ('bb', '01634829431', 'bbbb@gmail.com', '1999-6-12', '232235243',
     '146714AD321', 10),
    ('cc', '01555829431', 'cccc@gmail.com', '1997-11-12', '211234143',
     '141488AD321', 11);
