<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
          class="text-black">Cart</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-5">

      <div class="site-blocks-table">
        <form class="col-md-12" action="<?=$SITE_URL?>/view/cart/?action=update" id="formCart" name="formCart"
          method="post">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-stt">STT</th>
                <th class="product-thumbnail">Ảnh</th>
                <th class="product-thumbnail">Sản phẩm</th>
                <th class="product-thumbnail">Giá</th>
                <th class="product-thumbnail">Số lượng</th>
                <th class="product-thumbnail">Tổng</th>
                <th class="product-remove">Xóa</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $i = 0;
                $totals = 0;
                foreach ($_SESSION['cart'] as $item):
                  $total = $item[2] * strval($item[4]);
                  ?>
                  <tr>
                    <td class="product-stt">
                      <?= $i + 1 ?>
                    </td>
                    <td class="product-image">
                      <img src="<?= $item['3'] ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">
                        <?= $item['1'] ?>
                      </h2>
                    </td>
                    <td>$
                      <?= $item['2'] ?>
                    </td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <input type="text" class="form-control text-center" value="<?= strval($item[4]) ?>"
                          oninput="javascript:getQuantity(event);" placeholder="" name="quantity"
                          aria-label="Example text with button addon" aria-describedby="button-addon1">
                      </div>
                    </td>
                    <td>$
                      <?= $total ?>
                    </td>
                    <td><a href="index.php?action=delCart&i=<?= $i ?>" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
                  <?php $i++;
                  $totals += $total;
                endforeach;
              } else { ?>
              <td colspan="7" class=" text-primary">
                <h2 class="fs-1 fw-bold">Bạn chưa thêm sản phẩm nào</h2>
              </td>
              <?php } ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <a href="<?= $SITE_URL ?>/view/cart/?action=update" class="btn btn-primary btn-sm btn-block text-white fw-bold">Cập nhật giỏ hàng</a>
          </div>
          <div class="col-md-6">
            <a href="<?= $SITE_URL ?>/view/shop/" class="btn btn-outline-primary btn-sm btn-block fw-bold">tiếp tục mua sắm</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label class="text-black h4 fw-bold" for="coupon">Mã giảm giá</label>
            <p>Nhập vào mã giảm giá bạn có.</p>
          </div>
          <div class="col-md-8 mb-3 mb-md-0">
            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary btn-sm">Áp mã</button>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Giỏ hàng</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Tạm tính</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">$
                  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    echo $totals;
                  }else { echo "0";} ?>
                </strong>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Tổng</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">$
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    echo $totals;
                  }else { echo "0";} ?>
                </strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                  <a href="<?=$SITE_URL?>/view/checkout/?action=proceed" class="btn btn-primary btn-lg py-3 btn-block">Tiến hành thành toán</a>
                <?php } else { ?>
                  <a href="#" class="btn btn-primary btn-lg py-3 btn-block"
                    onclick="alert('Vui lòng thêm sản phẩm trước khi thanh toán');">Tiến hành thành toán</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function getQuantity(event) {
    var value = event.target.value;
    updateCart(value);
  }
  
  function updateCart(value){    
    if (value != "") {
      console.log("quantity :", value);
      $.ajax({
        type: 'POST',
        url: '<?=$SITE_URL?>/view/cart/?action=update"',
        data: $('#formCart').serializeArray(),
        success: function (response) {
            response =JSON.parse(response);
            if (response.status == 0) {
              alert(response.message);
            }else {
              alert(response.message);      
            }
            console.log(response);
        },
    });
    }
  }
</script>