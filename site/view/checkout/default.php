<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <?php 
    ?>
    <div class="site-section">
      <div class="container">
        <form action="<?=$SITE_URL.'/view/checkout/index.php?action=thanhtoan'?>" method="post">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Chi tiết Thanh toán</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="bill_fullname" class="text-black">Họ và tên người nhận<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="bill_fullname" name="bill_fullname" placeholder="..." value="<?=$_SESSION['user']['userFullname']?>">
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="bill_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="bill_address" name="bill_address" placeholder="Nhập địa chỉ ..." value="<?=$_SESSION['user']['address']?>">
                </div>
              </div>
              <div class="form-group">
              <label for="bill_email" class="text-black">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="bill_email" name="bill_email" placeholder="Nhập email ..." value="<?=$_SESSION['user']['userEmail']?>">
              </div>

              <div class="form-group">
                  <label for="bill_phone" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="bill_phone" name="bill_phone" placeholder="Nhập số điện thoại ..." value="<?=$_SESSION['user']['phoneNumber']?>">
              </div>

              <div class="form-group">
                <label for="bill_notes" class="text-black">Ghi chú</label>
                <textarea name="bill_notes" id="bill_notes" cols="30" rows="5" class="form-control" placeholder="Viết ghi chú của bạn...">
                </textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Mã Khuyến mãi</h2>
                <div class="p-3 p-lg-5 border">
                  
                  <label for="c_code" class="text-black mb-3">Nhập mã khuyến mãi của bạn</label>
                  <div class="input-group ">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Apply</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Sản phẩm</th>
                      <th>Tạm tính</th>
                    </thead>
                    
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $i = 0;
                $totals = 0;
                foreach ($_SESSION['cart'] as $item):
                  $total = $item[2] * strval($item[4]);
                  ?>
                    <tbody>                      
                      <tr>
                        <td><?= $item['1'] ?><strong class="mx-2">x</strong> <?= $item['4'] ?></td>
                        <td>$<?=$total?></td>
                      </tr> 
                      <?php $totals += $total; ?>
                  <?php $i++;
                   endforeach;
              }  ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">$<?=$totals?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>$<?=$totals?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group">
                      <label for="bill_payment" class="text-black">Phương thức thanh toán <span class="text-danger">*</span></label>
                      <select id="c_diff_country" class="form-control">
                        <?php foreach($payments as $payment){?>
                          <option name="bill_payment" value="<?=$payment['paymentId']?>"><?php echo $payment['paymentName'] ?></option>
                        <?php }?>  
                      </select>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="form-group">
            <button type='submit' class="btn btn-primary btn-lg py-3 btn-block" name='thanhtoan'>Thanh Toán</button>
          </div>
        </form>
        </div>
      </div>
    </div>