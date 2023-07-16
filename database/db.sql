CREATE TABLE `Role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20)
);

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(50),
  `email` varchar(150),
  `phone_number` varchar(20),
  `address` varchar(200),
  `password` varchar(32),
  `role_id` int,
  `created_at` datetime,
  `updated_at` datetime,
  `deleted` int
);

CREATE TABLE `Category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100)
);

CREATE TABLE `Product` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `title` varchar(250),
  `price` int,
  `discount` int,
  `thumbnail` varchar(500),
  `description` longtext,
  `created_at` datetime,
  `updated_at` datetime,
  `deleted` int
);

CREATE TABLE `Galery` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `thumbnail` varchar(500)
);

CREATE TABLE `Comment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(30),
  `lastname` varchar(30),
  `email` varchar(250),
  `phone_number` varchar(20),
  `subject_name` varchar(350),
  `note` varchar(1000),
  `status` int DEFAULT 0,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `fullname` varchar(50),
  `email` varchar(150),
  `phone_number` varchar(20),
  `address` varchar(200),
  `note` varchar(1000),
  `order_date` datetime,
  `id_pay` int,
  `id_delivery` int,
  `id_discount` int,
  `total_money` int
);

CREATE TABLE `Order_Details` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `price` int,
  `num` int,
  `total_money` int
);

CREATE TABLE `Pay` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name_pay` varchar(50),
  `status_pay` tinyint
);

CREATE TABLE `Delivery` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name_delivery` varchar(50),
  `status_delivery` tinyint
);

CREATE TABLE `Discounts` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `discount_name` VARCHAR(50),
  `value` FLOAT,
  `expiry_date` DATE,
  `max_uses` INT
);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);

ALTER TABLE `Product` ADD FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

ALTER TABLE `Order_Details` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

ALTER TABLE `Galery` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`id`);

ALTER TABLE `Order_Details` ADD FOREIGN KEY (`order_id`) REFERENCES `Orders` (`id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`id_pay`) REFERENCES `Pay` (`id`);

ALTER TABLE `Comment` ADD FOREIGN KEY (`id`) REFERENCES `User` (`id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`id_delivery`) REFERENCES `Delivery` (`id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`id_discount`) REFERENCES `Discounts` (`id`);