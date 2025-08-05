<?php ob_start(); ?>
<h2>Danh sách sản phẩm</h2>
<a href="index.php?action=create" class="btn btn-primary mb-3">Thêm sản phẩm</a>
<table class="table table-bordered">
    <thead>
        <tr><th>ID</th><th>Tên</th><th>Giá</th><th>Mô tả</th><th>Hành động</th></tr>
    </thead>
    <tbody>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['name'] ?></td>
                <td><?= $p['price'] ?></td>
                <td><?= $p['description'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                    <a href="index.php?action=delete&id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
