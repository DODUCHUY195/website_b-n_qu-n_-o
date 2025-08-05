<?php ob_start(); ?>
<h2>Sửa sản phẩm</h2>
<form method="post">
    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Giá</label>
        <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
    </div>
    <button class="btn btn-success">Cập nhật</button>
    <a href="index.php" class="btn btn-secondary">Quay lại</a>
</form>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
