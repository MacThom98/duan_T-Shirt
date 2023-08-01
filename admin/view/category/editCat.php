<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="mt-4 text-center">Sửa sản phẩm</h2>

    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="col-md-6">
            <div class="mb-3">
                <label for="category_name" class="form-label">Tên Loại:</label>
                <input type="text" class="form-control" name="category_name" id="category_name" value="<?=$cat['categoryName']?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?=$ADMIN_URL.'/view/category'?>" class="btn btn-info">Hủy</a>
                <button name="btn_update" class="btn btn-primary">Lưu thay đổi</button>
            </div>

        </form>
    </div>
</div>
