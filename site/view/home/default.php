<div class="site-blocks-cover" style="background-image: url(<?=$CONTENT_SITE_URL?>/images/hero_1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">New Fashion 2023</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla. </p>
              <p>
                <a href="<?=$SITE_URL?>/view/detailproduct?id=4" class="btn btn-sm btn-primary">Mua Ngay</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>Miễn Phí Vận Chuyển Cho Đơn Hàng Từ 500K</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>Hỗ Trợ Đổi Hàng Trong 15 Ngày.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p> Nếu bạn cần giúp đỡ. Đừng lo lắng gì , chúng tôi ở đây vì bạn.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="<?=$CONTENT_SITE_URL?>/images/women.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Women</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="<?=$CONTENT_SITE_URL?>/images/children.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Children</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="<?=$CONTENT_SITE_URL?>/images/men.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Men</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>


    <!-- Featured Products -->
    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>SẢN PHẨM NỔI BẬT</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
            <?php foreach ($products as $product): ?>
            <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?=$IMAGE_DIR ?><?php echo $product['image']; ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?=$SITE_URL?>/view/detailproduct?id=<?=$product['productId']?>"><?php echo $product['productName']; ?></a></h3>                    
                    <p class="text-primary font-weight-bold">$<?php echo $product['price']; ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- New Products -->
    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>SẢN PHẨM MỚI</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
            <?php foreach ($products as $product): ?>
            <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="<?=$IMAGE_DIR ?><?php echo $product['image']; ?>" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?=$SITE_URL?>/view/detailproduct?id=<?=$product['productId']?>"><?php echo $product['productName']; ?></a></h3>                    
                    <p class="text-primary font-weight-bold">$<?php echo $product['price']; ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Big Sale!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="<?=$CONTENT_SITE_URL?>/images/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="<?=$SITE_URL?>/view/shop">Giảm 50% tất cả các sản phẩm</a></h2>
            <p class="post-meta mb-4">By <a href="">Tiến Công</a> <span class="block-8-sep">&bullet;</span> 2 - 9 -2023</p>
            <p>Mừng ngày Quốc Khánh 2-9, T-Shirt tặng hàng ngàn quà tăng cùng nhiều ưu đãi dành cho quý khách hàng</p>
            <p><a href="#" class="btn btn-primary btn-sm">Mua Ngay</a></p>
          </div>
        </div>
      </div>
    </div>
