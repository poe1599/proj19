INSERT INTO `category` (`category_sid`, `category_name`) VALUES
 ('1', 'Burger Recipes');




INSERT INTO `product` (`product_sid`, `product_name`, `description`, `category_sid`, `unit_price`, `on_sale`, `created_at`) VALUES 
(NULL, '\r\n', '\r\n', '1', '149', '1', '2020-12-01 11:07:17'),


INSERT INTO `product`(`product_sid`, `product_name`, `description`, `category_sid`, `unit_price`, `on_sale`, `created_at`) VALUES 
(NULL , 'Cheesy Black Bean Tacos\r\n', 'with Poblano & Smoky Red Pepper Crema\r\n', 3, 99, 1, NOW()),
(NULL , 'BBQ Pulled Chicken Tacos\r\n', 'with Creamy Slaw & Red Onion\r\n', 3, 109, 1, NOW()),
(NULL , 'Pork Carnitas Tacos\r\n', 'with Pickled Onion & Monterey Jack Cheese\r\n', 3, 99, 1, NOW()),
(NULL , 'Pork & Poblano Tacos\r\n', 'with Kiwi Salsa & Lime Crema\r\n', 3, 99, 1, NOW()),
(NULL , 'Banh-Mi-Style Chicken Tacos\r\n', 'with Pickled Cucumber & Sriracha Mayo\r\n', 3, 89, 1, NOW()),
(NULL , 'Smashed Black Bean Tacos\r\n', 'with Creamy Slaw, Pickled Onion & Red Pepper Crema\r\n', 3, 99, 1, NOW()),
(NULL , 'Pork & Caramelized Pineapple Tacos\r\n', 'with Pickled Veggies & Lime Crema\r\n', 3, 109, 1, NOW()),
(NULL , 'Southwestern Shrimp Tacos\r\n', 'with Pico de Gallo & Lime Crema\r\n', 3, 99, 1, NOW()),
(NULL , 'Cheesy Buffalo Chicken Tacos\r\n', 'with Creamy Ranch Slaw\r\n', 3, 119, 1, NOW()),
(NULL , 'Santa Fe Pork Tacos\r\n', 'with Monterey Jack & Cilantro Lime Slaw\r\n', 3, 99, 1, NOW()),
(NULL , 'Speedy Start Chicken Tacos\r\n', 'sprinkled with Mexican Cheese\r\n', 3, 99, 1, NOW()),
(NULL , 'Buffalo Chicken Tacos\r\n', 'with Melty Cheddar & a Creamy Ranch Celery Slaw\r\n', 3, 109, 1, NOW()),
(NULL , 'Cheesy Breakfast Tacos\r\n', 'with Charred Veggies, Pico de Gallo & Smoky Crema (2 servings)\r\n', 3, 99, 1, NOW()),
(NULL , 'Chicken Stir-Fry Tacos\r\n', 'with Tangy Cabbage Slaw & Sriracha Mayo\r\n', 3, 89, 1, NOW()),
(NULL , 'Mojo Pork Tacos\r\n', 'with Creamy Cilantro Slaw\r\n', 3, 99, 1, NOW()),
(NULL , 'Mexican Pork & Street Corn Tacos\r\n', 'with Chili Lime Crema\r\n', 3, 99, 1, NOW())




INSERT INTO `product` (`product_sid`, `product_name`, `description`, `category_sid`, `price`, `on_sale`, `created_at`) VALUES 
(NULL, 'Creamy Dreamy Mushroom Cavatappi\r\n', 'with Scallions & Parmesan\r\n', '2', '129', '1', '2020-12-01 11:07:17'),

INSERT INTO `member` (`member_sid`, `email`, `account`, `password`) VALUES 
(NULL, 'ooo@gmail.com', 'ooo', SHA1('123456')),
(NULL, 'tom60229@gmail.com', 'tom60229', SHA1('123456')),
(NULL, 'eee@gmail.com', 'poe', SHA1('123456')),
(NULL, 'haha@gmail.com', 'zxc', SHA1('123456')),
(NULL, 'yaya@gmail.com', 'yaya', SHA1('123456')),
(NULL, 'joker@gmail.com', 'joker', SHA1('123456')),
(NULL, 'admin@gmail.com', 'admin', SHA1('123456')),
(NULL, 'yeh@gmail.com', 'yeh', SHA1('123456'))

