<footer class="site-footer border-top">
  <div class="container">
    <div class="row">
    <div class="col-md-6 col-lg-3">
        <div class=" mb-5">
          <h3 class="footer-heading mb-4">T-Shirt Shop</h3>
          <ul class="list-unstyled">
            <li>T-Shirt Shop bán hàng quần áo phụ kiện - Nơi tạo phong cách và cá nhân hóa.</li>
            <li class="phone"><a href="tel:0981640617">Hotline: 0981640617</a></li>
            <li class="email"><strong>Cơ sở 1: </strong>Lô 1A Công Viên Phần Mềm Quang Trung</li>
            <li class="email"><strong>Cơ sở 2: </strong>84 Thống Nhất</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
          <div class=" mb-5">
            <h3 class="footer-heading mb-4">Giới thiệu</h3>
            <ul class="list-unstyled">
              <li><a href="<?=$SITE_URL?>/view/about">Về chúng tôi</a></li>
              <li><a href="<?=$SITE_URL?>/view/shop">Sảm phẩm nổi bật</a></li>
              <li><a href="<?=$SITE_URL?>/view/cart">Giỏ hàng</a></li>
              <li><a href="<?=$SITE_URL?>/view/contact">Liên hệ</a></li>
            </ul>
          </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="block-5 mb-5">
          <h3 class="footer-heading mb-4">Liên hệ</h3>
          <ul class="list-unstyled">
            <li class="address">Lô 1A Công Viên Phần Mềm Quang Trung</li>
            <li class="phone"><a href="tel:0981640617">+0981640617</a></li>
            <li class="email">4gang@gmail.com</li>
          </ul>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-7">
          <form action="#" method="post">
            <label for="email_subscribe" class="footer-heading">Đăng kí để nhận thông tin ưu đã</label>
            <div class="form-group">
              <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
              <input type="submit" class="btn btn-sm btn-primary" value="Send">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>

<script src="<?=$CONTENT_SITE_URL?>/js/jquery-3.3.1.min.js"></script>
<script src="<?=$CONTENT_SITE_URL?>/js/jquery-ui.js"></script>
<script src="<?=$CONTENT_SITE_URL?>/js/popper.min.js"></script>
<script src="<?=$CONTENT_SITE_URL?>/js/bootstrap.min.js"></script>
<script src="<?=$CONTENT_SITE_URL?>/js/owl.carousel.min.js"></script>
<script src="<?=$CONTENT_SITE_URL?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?=$CONTENT_SITE_URL?>/js/aos.js"></script>

<script src="<?=$CONTENT_SITE_URL?>/js/main.js"></script>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
  integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>
<script>
  function notify() {
    toastr["success"]("Thêm vào giỏ hàng thành công!")
  }
</script>
</body>

</html>