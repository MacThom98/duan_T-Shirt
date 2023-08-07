<!DOCTYPE html>
<html lang="en">
  <head>
    <title>T-Shirt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/owl.theme.default.min.css">
    <script src="<?=$CONTENT_SITE_URL?>/js/jquery-3.3.1.min.js"></script>
  

    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/aos.css">

    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
     <!-- Include Bootstrap CSS -->

  </head>
  <body>

  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form method="post" name="submit" action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" name="searchValue" class="form-control border-0" placeholder="Search">
                <a href="<?=$SITE_URL?>/view/search?searchValue=<?=$value;?>" class="icon icon-search2"></a>
              </form>
            </div>
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="<?=$SITE_URL?>/" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                <li class="dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="user-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user"></i>
      </a>
      <ul class="dropdown-menu" aria-labelledby="user-toggle">
        <li><a class="dropdown-item" href="#">Tài khoản</a></li>
        <li><a class="dropdown-item" href="#">Lịch sử mua hàng</a></li>
        <li><a class="dropdown-item" href="#">Đơn hàng của tôi</a></li>
        <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
      </ul>
    </li>

                  <li><a href="#"><i class="fa-solid fa-heart"></i></a></li>
                  <li>
                    <a href="<?=$SITE_URL?>/view/cart/" class="site-cart">
                      <i class="fa-solid fa-shopping-cart"></i>               
                      <span class="count">
                        <?php 
                          if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){ 
                            echo (count($_SESSION['cart'])); 
                          }else {
                            echo 0; 
                          } 
                        ?>
                      </span>
                     
                    </a>
                  </li>

                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
              <a href="<?=$SITE_URL?>">Home</a>
            </li>
            <li>
              <a href="<?=$SITE_URL?>/view/about">Về chúng tôi</a>
            </li>
            <li><a href="<?=$SITE_URL?>/view/shop">Cửa hàng</a></li>
            <li><a href="<?=$SITE_URL?>/view/shop">Catalogue</a></li>
            <li><a href="<?=$SITE_URL?>/view/shop">New Arrivals</a></li>
            <li><a href="<?=$SITE_URL?>/view/contact">Liên hệ</a></li>
          </ul>
        </div>
      </nav>
    </header>