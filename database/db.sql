-- Cụm sản phẩm --

-- Bảng Loại hàng (liên kết 1 - nhiều với bảng sản phẩm)
CREATE TABLE category (
  categoryId INT AUTO_INCREMENT PRIMARY KEY,
  categoryName VARCHAR(100) NOT NULL
);

-- Bảng Chi nhánh
CREATE TABLE branch (
  branchId INT AUTO_INCREMENT PRIMARY KEY,
  branchName VARCHAR(50) NOT NULL
);


-- Bảng Khuyến mãi
CREATE TABLE discount (
  discountId INT AUTO_INCREMENT PRIMARY KEY,
  discountName VARCHAR(50) NOT NULL,
  discountValue FLOAT NOT NULL,
  discountFromDate DATE NOT NULL,
  discountToDate DATE NOT NULL
);

-- Bảng Sản phẩm
CREATE TABLE product (
  productId INT AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(250) NOT NULL,
  price INT NOT NULL,
  description LONGTEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  categoryId INT NOT NULL,
  discountId INT,
  branchId INT NOT NULL,
  stock INT,
  FOREIGN KEY (categoryId) REFERENCES category(categoryId),
  FOREIGN KEY (discountId) REFERENCES discount(discountId),
  FOREIGN KEY (branchId) REFERENCES branch(branchId)
);

-- Bảng Thư viện ảnh
CREATE TABLE gallery (
  galleryId INT AUTO_INCREMENT PRIMARY KEY,
  productId INT NOT NULL,
  galleryURL TEXT NOT NULL,
  FOREIGN KEY (productId) REFERENCES product(productId)
);

-- Cụm quản lý khách hàng --


-- Bảng Vai trò (Roles)
CREATE TABLE role (
  roleId INT AUTO_INCREMENT PRIMARY KEY,
  roleType ENUM('customer', 'admin') NOT NULL,
  description VARCHAR(255)
);

-- Bảng Người dùng (Users)
CREATE TABLE user (
  userId INT AUTO_INCREMENT PRIMARY KEY,
  userFullname VARCHAR(50) NOT NULL,
  userEmail VARCHAR(150) NOT NULL,
  phoneNumber VARCHAR(20) NOT NULL,
  address VARCHAR(200),
  password VARCHAR(32) NOT NULL,
  roleId INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (roleId) REFERENCES role(roleId)
);

-- Bảng Phương thức thanh toán
CREATE TABLE payment (
  paymentId INT AUTO_INCREMENT PRIMARY KEY,
  paymentName VARCHAR(50) NOT NULL,
  paymentStatus TINYINT NOT NULL
);

-- Bảng Địa chỉ giao hàng
CREATE TABLE delivery (
  deliveryId INT AUTO_INCREMENT PRIMARY KEY,
  deliveryName VARCHAR(50) NOT NULL,
  deliveryAddress TEXT,
  deliveryStatus TINYINT NOT NULL
);

-- Bảng Đơn hàng
CREATE TABLE orders (
  orderId INT AUTO_INCREMENT PRIMARY KEY,
  userId INT NOT NULL,
  fullname VARCHAR(50) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phoneNumber VARCHAR(20) NOT NULL,
  address VARCHAR(200) NOT NULL,
  note VARCHAR(1000),
  orderDate DATETIME DEFAULT CURRENT_TIMESTAMP,
  paymentId INT NOT NULL,
  deliveryId INT NOT NULL,
  discountId INT,
  totalMoney INT,
  FOREIGN KEY (userId) REFERENCES user(userId),
  FOREIGN KEY (paymentId) REFERENCES payment(paymentId),
  FOREIGN KEY (deliveryId) REFERENCES delivery(deliveryId),
  FOREIGN KEY (discountId) REFERENCES discount(discountId)
);

-- Bảng Chi tiết đơn hàng
CREATE TABLE orderDetails (
  orderDetailId INT AUTO_INCREMENT PRIMARY KEY,
  orderId INT NOT NULL,
  productId INT NOT NULL,
  price INT NOT NULL,
  quantity INT NOT NULL,
  totalMoney INT NOT NULL,
  FOREIGN KEY (orderId) REFERENCES orders(orderId),
  FOREIGN KEY (productId) REFERENCES product(productId)
);

-- Bảng Bình luận
CREATE TABLE comment (
  commentId INT AUTO_INCREMENT PRIMARY KEY,
  userId INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (userId) REFERENCES user(userId)
);


-- Thêm dữ liệu
-- Thêm dữ liệu vào bảng Loại hàng (category)
INSERT INTO category (categoryName)
VALUES
  ('Nam'),
  ('Nữ'),
  ('Trẻ em'),
  ('Thể thao'),
  ('Phụ kiện');

-- Thêm dữ liệu vào bảng Chi nhánh (branch)
INSERT INTO branch (branchName)
VALUES
  ('Chi nhánh Hà Nội'),
  ('Chi nhánh Hồ Chí Minh'),
  ('Chi nhánh Đà Nẵng'),
  ('Chi nhánh Nha Trang'),
  ('Chi nhánh Hải Phòng');

-- Thêm dữ liệu vào bảng Thư viện ảnh (gallery)
INSERT INTO gallery (productId, galleryURL)
VALUES
  (1, 'https://example.com/image1.jpg'),
  (1, 'https://example.com/image2.jpg'),
  (2, 'https://example.com/image3.jpg'),
  (2, 'https://example.com/image4.jpg'),
  (3, 'https://example.com/image5.jpg');

-- Thêm dữ liệu vào bảng Khuyến mãi (discount)
INSERT INTO discount (discountName, discountValue, discountFromDate, discountToDate)
VALUES
  ('Giảm giá Mùa hè', 0.2, '2023-07-01', '2023-07-31'),
  ('Khuyến mãi Đặc biệt', 0.15, '2023-08-15', '2023-08-16'),
  ('Giảm giá Cuối mùa', 0.3, '2023-09-01', '2023-09-30'),
  ('Khuyến mãi Lễ hội', 0.1, '2023-12-01', '2024-01-02'),
  ('Giảm giá Sinh nhật', 0.25, '2023-07-01', '2023-07-31');

-- Thêm dữ liệu vào bảng Sản phẩm (product)
INSERT INTO product (productName, price, description, categoryId, branchId, stock)
VALUES
  ('Áo thun nam 1', 200000, 'Áo thun nam phong cách trẻ trung và năng động', 1, 1, 50),
  ('Áo thun nữ 1', 250000, 'Áo thun nữ thoải mái và phong cách', 2, 2, 30),
  ('Áo thể thao', 300000, 'Áo thể thao chất liệu co dãn và thấm hút mồ hôi', 4, 3, 20),
  ('Áo thun trẻ em', 150000, 'Áo thun trẻ em dễ thương và màu sắc tươi sáng', 3, 4, 10),
  ('Áo thun phụ kiện', 180000, 'Áo thun với thiết kế phụ kiện độc đáo', 5, 5, 15);

-- Thêm dữ liệu vào bảng Vai trò (role)
INSERT INTO role (roleType, description)
VALUES
  ('customer', 'Vai trò khách hàng thông thường'),
  ('admin', 'Vai trò quản trị viên'),
  ('guest', 'Vai trò khách'),
  ('vip', 'Vai trò khách hàng VIP'),
  ('sales', 'Vai trò nhân viên bán hàng');

-- Thêm dữ liệu vào bảng Người dùng (user)
INSERT INTO user (userFullname, userEmail, phoneNumber, address, password, roleId)
VALUES
  ('Nguyễn Văn A', 'nguyenvana@example.com', '123456789', 'Số 1 Đường X, Quận Y, Thành phố Z', 'password123', 1),
  ('Trần Thị B', 'tranthib@example.com', '987654321', 'Số 2 Đường X, Quận Y, Thành phố Z', 'password456', 1),
  ('Admin User', 'admin@example.com', '555555555', 'Số 3 Đường X, Quận Y, Thành phố Z', 'adminpassword', 2),
  ('Guest User', 'guest@example.com', '111111111', 'Số 4 Đường X, Quận Y, Thành phố Z', 'guestpassword', 3),
  ('VIP User', 'vip@example.com', '999999999', 'Số 5 Đường X, Quận Y, Thành phố Z', 'vippassword', 4);

-- Thêm dữ liệu vào bảng Phương thức thanh toán (payment)
INSERT INTO payment (paymentName, paymentStatus)
VALUES
  ('Thẻ tín dụng', 1),
  ('PayPal', 1),
  ('Tiền mặt khi nhận hàng', 1),
  ('Chuyển khoản ngân hàng', 1),
  ('Thanh toán qua điện thoại di động', 1);

-- Thêm dữ liệu vào bảng Địa chỉ giao hàng (delivery)
INSERT INTO delivery (deliveryName, deliveryAddress, deliveryStatus)
VALUES
  ('Giao hàng tiêu chuẩn', 'Số 1 Đường X, Quận Y, Thành phố Z', 1),
  ('Giao hàng nhanh', 'Số 2 Đường X, Quận Y, Thành phố Z', 1),
  ('Tự lấy hàng tại cửa hàng', 'Số 3 Đường X, Quận Y, Thành phố Z', 1),
  ('Giao hàng trong ngày', 'Số 4 Đường X, Quận Y, Thành phố Z', 1),
  ('Giao hàng quốc tế', 'Số 5 Đường X, Quận Y, Thành phố Z', 1);

-- Thêm dữ liệu vào bảng Đơn hàng (orders)
INSERT INTO orders (userId, fullname, email, phoneNumber, address, note, orderDate, paymentId, deliveryId, discountId, totalMoney)
VALUES
  (1, 'Nguyễn Văn A', 'nguyenvana@example.com', '123456789', 'Số 1 Đường X, Quận Y, Thành phố Z', 'Vui lòng giao hàng trong ngày làm việc', '2023-07-15 10:00:00', 1, 1, 1, 200000),
  (2, 'Trần Thị B', 'tranthib@example.com', '987654321', 'Số 2 Đường X, Quận Y, Thành phố Z', 'Không có yêu cầu đặc biệt', '2023-07-16 15:30:00', 2, 2, NULL, 150000),
  (3, 'Admin User', 'admin@example.com', '555555555', 'Số 3 Đường X, Quận Y, Thành phố Z', 'Yêu cầu giao hàng gấp', '2023-07-17 12:45:00', 3, 3, 3, 300000),
  (4, 'Guest User', 'guest@example.com', '111111111', 'Số 4 Đường X, Quận Y, Thành phố Z', 'Giao hàng tại lễ tân', '2023-07-18 09:30:00', 4, 4, NULL, 500000),
  (5, 'VIP User', 'vip@example.com', '999999999', 'Số 5 Đường X, Quận Y, Thành phố Z', 'Thời gian giao hàng 17h-19h', '2023-07-19 18:00:00', 5, 5, 2, 250000);

-- Thêm dữ liệu vào bảng Chi tiết đơn hàng (orderDetails)
INSERT INTO orderDetails (orderId, productId, price, quantity, totalMoney)
VALUES
  (1, 1, 200000, 2, 400000),
  (1, 2, 250000, 1, 250000),
  (2, 3, 300000, 1, 300000),
  (3, 4, 150000, 3, 450000),
  (4, 5, 180000, 5, 900000);

-- Thêm dữ liệu vào bảng Bình luận (comment)
INSERT INTO comment (userId, created_at)
VALUES
  (1, '2023-07-15 10:15:00'),
  (2, '2023-07-16 16:00:00'),
  (3, '2023-07-17 13:30:00'),
  (4, '2023-07-18 10:00:00'),
  (5, '2023-07-19 19:30:00');
