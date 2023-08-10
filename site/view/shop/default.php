<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
          class="text-black">Shop</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-9 order-2">

        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="float-md-left mb-4">
              <h2 class="text-black h5">Shop All</h2>
            </div>
            <div class="d-flex justify-content-end align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference"
                  data-toggle="dropdown">Lọc</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                  <a class="dropdown-item" href="#">Tên, A to Z</a>
                  <a class="dropdown-item" href="#">Tên, Z to A</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Giá, Thấp tới Cao</a>
                  <a class="dropdown-item" href="#">Giá, Cao tới Thấp</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">

          <?php foreach ($searchs as $search): ?>
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
            <form action="<?=$SITE_URL?>/view/cart/?action=addCart" method="post" name="add-to-cart-form" class ="add-to-cart-form">
              <input type="hidden" name="id" value="<?=$search['prodId']?>">
              <input type="hidden" name="name" value="<?php echo $search['prodName']; ?>">
              <input type="hidden" name="price" value="<?php echo $search['price']; ?>">
              <input type="hidden" name="img" value="<?=$IMAGE_DIR?>/<?php echo $search['imageUrl']; ?>">  
            <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="<?=$SITE_URL?>/view/detailproduct?id=<?=$search['prodId']?>"><img
                      src="<?=$IMAGE_DIR?>/<?php echo $search['imageUrl']; ?>" alt="Image placeholder"
                      class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="<?=$SITE_URL?>/view/detailproduct?id=<?=$search['prodId']?>"><?php echo $search['prodName']; ?></a></h3>
                </div>
                <div class="block-4-text d-flex justify-content-center align-items-center mb-3">
                  <span class="text-primary font-weight-bold mr-3 ">
                    <?php echo $search['price']; ?>
                  </span>
                  <!-- <button name="addCart" onclick="notify()" class="addCart" type="submit" style="cursor: pointer; background-color: transparent; border: none !important; " ><i class="fa-solid fa-cart-plus"></i></button> -->
                </div>
              </div>
            </div>

            </form>
          <?php endforeach;?>

        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Loại</h3>
          <ul class="list-unstyled mb-0">
            <?php foreach ($productbyCates as $productbyCate): ?>
              <li class="mb-1"><a href="<?=$SITE_URL?>/view/category?id=<?=$productbyCate['cateId']?>"
                  class="d-flex"><span>
                    <?php echo $productbyCate['cateName']; ?>
                  </span> <span class="text-black ml-auto">(
                    <?php echo $productbyCate['total']; ?>)
                  </span></a></li>
            <?php endforeach;?>
          </ul>
        </div>

        <div class="border p-4 rounded mb-4">
          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Lọc Theo Giá</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div>

          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
            <label for="s_sm" class="d-flex">
              <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
            </label>
            <label for="s_md" class="d-flex">
              <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
            </label>
            <label for="s_lg" class="d-flex">
              <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
            </label>
          </div>

          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Màu </h3>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red
                (2,429)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green
                (2,298)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue
                (1,075)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple
                (1,075)</span>
            </a>
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="site-section site-blocks-2">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7 site-section-heading pt-4">
              <h2>Loại</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
              <a class="block-2-item" href="#">
                <figure class="image">
                  <img src="<?=$IMAGE_DIR?>/women.jpg" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Bộ Sưu Tập</span>
                  <h3>Women</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
              <a class="block-2-item" href="#">
                <figure class="image">
                  <img src="<?=$IMAGE_DIR?>/children.jpg" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Bộ Sưu Tập</span>
                  <h3>Children</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
              <a class="block-2-item" href="#">
                <figure class="image">
                  <img src="<?=$IMAGE_DIR?>/men.jpg" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Bộ Sưu Tập</span>
                  <h3>Men</h3>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>

<script>
$('.add-to-cart-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '<?=$SITE_URL?>/view/cart/?action=addCart',
        data: $(this).serializeArray(),
        success: function (response) {
            response =JSON.parse(response);
            if (response.status == 0) {
              alert(response.message);
            }else {
              alert(response.message);  
              var countElement = $('#count');
                var currentCount = parseInt(countElement.text());
                countElement.text(currentCount + 1);    
            }
        },
    });

    return false;
});

</script>