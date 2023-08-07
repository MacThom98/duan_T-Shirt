<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>  
    <div class="container">
<div class="row">

    <div class="site-section col-md-6">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">Đơn hàng của bạn đã hoàn tất.</p>
            <p><a href="<?=$SITE_URL?>/view/shop" class="btn btn-sm btn-primary">Quay lại mua sắm</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
    <!-- Your Invoice HTML Code -->
      <div class="col-md-12">

        <div class="site-section">
          <div class="row">
            <div class="col-md-12 mb-5">
              <h2 class="h3 mb-3 text-black">Your Order</h2>
              <div class="p-2 mb-2 p-3 p-lg-5 border rounded border-success">
                <table class="table table-bordered border rounded border-success">
                  <thead class="rounded">
                    <tr>
                      <th>STT</th>
                      <th>Sản Phẩm</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Tổng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $total = 0;
                      foreach($orderDetails as $detail){
                    ?>
                    <tr>
                      <td><?=$detail['orderDetailId']?></td>
                      <td><?=$detail['productId']?></td>
                      <td><?=$detail['price']?></td>
                      <td><?=$detail['quantity']?></td>
                      <td><?=$detail['totalMoney']?></td>
                    </tr>
                      <?php $total += $detail['totalMoney'] ?>
                    <?php } ?>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="4" class="text-right">Cart Subtotal</th>
                      <td><?=$total?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">Order Total</th>
                      <td><?=$total?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">Hình thức thanh toán</th>
                      <td><?php echo $getHD['paymentId']?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">Trạng thái</th>
                      <td><?php echo $getHD['statusId']?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
            </div>
          </div>
 
   
    </div>
</div>
  </div>
</div>
  </div>
