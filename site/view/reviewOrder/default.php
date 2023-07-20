<div class="row" wight='100%'>    
    <div class="col-md-6 text-center">
        <span class="icon-check_circle display-3 text-success"></span>
        <h2 class="display-3 text-black">Thank you!</h2>
        <p class="lead mb-5">You order was successfuly completed.</p>
        <p><a href="<?=$SITE_URL?>/view/shop" class="btn btn-sm btn-primary">Back to shop</a></p>
    </div>
    <div class="col-md-6">
        <h2 class="h3 mb-3 text-black">Your Order</h2>
        <div class="p-3 p-lg-5 border">
        <table class="table site-block-order-table mb-5">
            <thead>
            <th>Product</th>
            <th>Total</th>
            </thead>
            <tbody>
            <tr>
                <td>Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
                <td>$250.00</td>
            </tr>
            <tr>
                <td>Polo Shirt <strong class="mx-2">x</strong>   1</td>
                <td>$100.00</td>
            </tr>
            <tr>
                <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                <td class="text-black">$350.00</td>
            </tr>
            <tr>
                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
            </tr>
            </tbody>
        </table>

        <div class="form-group">
            <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='<?=$SITE_URL?>/view/thank'">Hủy Đơn Hàng</button>
        </div>

        </div>
    </div>
    
</div>