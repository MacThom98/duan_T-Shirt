1. Mô tả cấu trúc MVC của dự án
Ý nghĩa các thư mục như sau:
- public: chứa các file public bên ngoài như js, css, images và template của ứng dụng (template của admin, site)
- site: chứa ba folder chính là controller, model và view. Folder này chứa source code của ứng dụng frontend
- admin: chứa ba folder chính là controller, model và view. Folder này chứa source code của ứng dụng backend
- system: chứa hai folder
  + core: Các thư viện cấu hình cho hệ thống MVC
  + library: Chứa các thư viện được tạo trong quá trình xây dựng ứng dụng
- index.php đóng vai trò file bootstrap cho frontend, nó sẽ chạy code của folder site
- admin.php đóng vai trò file bootstrap cho backend, nó chạy code của folder admin
- databse: thư mục này chứa file cấu trúc cơ sở dữ liệu của dự án
Như vậy tóm lại:
Hệ thống MVC sẽ phân chia làm hai module chính là site (frontend) và admin (backend), mỗi module sẽ có một file bootstrap (index.php cho folder site và admin.php cho folder admin).
Hệ thống MVC có một folder system dùng để chứa những thư viện dùng chung cho cả frontend và backend.
Hệ thống MVC có folder public chứa các file như js, css, jquery, ... Đặc biệt nó có một folder upload dùng để chứa hình ảnh upload cho các tin tức và sản phẩm.