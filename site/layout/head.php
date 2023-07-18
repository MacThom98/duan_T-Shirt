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


    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/aos.css">

    <link rel="stylesheet" href="<?=$CONTENT_SITE_URL?>/css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form method="post" name="submit" action="?action=search" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" name="searchValue" class="form-control border-0" placeholder="Search">
                <a href="index.php?action=search" class="icon icon-search2"></a>
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
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="<?=$SITE_URL?>/view/cart" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children active">
              <a href="<?=$SITE_URL?>">Home</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-children">
              <a href="<?=$SITE_URL?>/view/about">About</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>
            <li><a href="<?=$SITE_URL?>/view/shop">Shop</a></li>
            <li><a href="<?=$SITE_URL?>/view/shop">Catalogue</a></li>
            <li><a href="<?=$SITE_URL?>/view/shop">New Arrivals</a></li>
            <li><a href="<?=$SITE_URL?>/view/contact">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>