<!-- header -->
<?php include './views/layout/header.php' ?>
<!-- navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- sidebar -->
<?php include './views/layout/sidebar.php' ?>



<div class="content-wrapper">
    <h1>Sửa thông tin sản phẩm <?= htmlspecialchars($sanPham['ten_san_pham']) ?></h1>

    <section class="content">
        <div class="container-fluid">
            <form action="<?= BASE_URL_ADMIN . '?act=suasanpham' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="san_pham_id" value="<?= htmlspecialchars($sanPham['id']) ?>">
            <input type="hidden" name="old_file" value="<?= htmlspecialchars($sanPham['hinh_anh']) ?>">
            <div class="row">

                    <!-- Cột trái: Thông tin sản phẩm -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Thông tin sản phẩm
                                <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary btn-sm float-right">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="ten_san_pham" value="<?= $sanPham['ten_san_pham'] ?>" class="form-control">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="gia_san_pham" value="<?= $sanPham['gia_san_pham'] ?>" class="form-control">
                                     <?php if (isset($_SESSION['error']['gia_san_pham'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" name="gia_khuyen_mai" value="<?= $sanPham['gia_khuyen_mai'] ?>" class="form-control">
                                        <?php if (isset($_SESSION['error']['gia_khuyen_mai'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" name="so_luong" value="<?= $sanPham['so_luong'] ?>" class="form-control">
                                <?php if (isset($_SESSION['error']['so_luong'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Ngày nhập</label>
                                    <input type="date" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>" class="form-control">
                                <?php if (isset($_SESSION['error']['ngay_nhap'])): ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Danh mục sản phẩm</label>
                                    <select name="danh_muc_id" class="form-control">
                                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                                            <option value="<?= $danhMuc['id'] ?>" <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($danhMuc['ten_danh_muc']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="trang_thai" class="form-control">
                                        <option value="1" <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?>>Còn Bán</option>
                                        <option value="2" <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?>>Hết Bán</option>
                                    </select>
            
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cột phải: Ảnh sản phẩm -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                Ảnh Đại Diện
                            </div>
                            <div class="card-body">

                                <!-- Ảnh đại diện -->
                                <div class="border p-3 mb-4 text-center rounded">
                                    <?php if (!empty($sanPham['hinh_anh'])): ?>
                                        <img src="uploads/<?= $sanPham['hinh_anh'] ?>" class="img-thumbnail mb-2" style="max-width:150px;">
                                        <br>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=xoaAnhDaiDien&id=<?= $sanPham['id'] ?>"
                                            class="text-danger"
                                            onclick="return confirm('Xóa ảnh đại diện này?')">Xóa ảnh đại diện</a>
                                    <?php else: ?>
                                        <span class="text-muted">Chưa có ảnh đại diện</span>
                                    <?php endif; ?>

                                    <div class="mt-3">
                                        <label class="form-label">Chọn ảnh mới (nếu muốn thay)</label>
                                        <input type="file" name="hinh_anh" class="form-control">
                                    </div>
                                </div>

                                <!-- Album ảnh -->
                                <div class="border p-3 rounded">
                                    <label class="form-label fw-bold">Album ảnh</label>
                                    <?php if (!empty($listAnhSanPham)): ?>
                                        <div class="row g-2">
                                            <?php foreach ($listAnhSanPham as $anh): ?>
                                                <div class="col-6 text-center">
                                                    <img src="uploads/album/<?= $anh['link_hinh_anh'] ?>" class="img-thumbnail mb-1" style="max-width:100px;">
                                                    <br>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=deleteAlbumAnhSanPham&id=<?= $anh['id'] ?>&id_san_pham=<?= $sanPham['id'] ?>"
                                                        class="text-danger"
                                                        onclick="return confirm('Xóa ảnh này?')">Xóa</a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">Chưa có ảnh album</p>
                                    <?php endif; ?>

                                    <div class="mt-3">
                                        <label class="form-label">Thêm ảnh album mới</label>
                                        <input type="file" name="album_anh[]" multiple class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Nút cập nhật -->
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                </div>
            </form>
        </div>
    </section>
</div>


<script>
    // Thêm input upload album mới
    document.getElementById('btn-add-album').addEventListener('click', function() {
        const container = document.getElementById('new-album-inputs');

        const div = document.createElement('div');
        div.className = 'new-album-item';
        div.style = 'margin-top:10px; display:flex; align-items:center;';

        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'album_anh_new[]';
        input.className = 'form-control';
        input.style = 'flex-grow: 1;';

        const btnRemove = document.createElement('button');
        btnRemove.type = 'button';
        btnRemove.className = 'btn btn-danger btn-remove-new-album';
        btnRemove.style = 'margin-left: 10px;';
        btnRemove.textContent = 'Xóa';

        btnRemove.addEventListener('click', function() {
            div.remove();
        });

        div.appendChild(input);
        div.appendChild(btnRemove);
        container.appendChild(div);
    });

    // Preview ảnh đại diện
    document.querySelector('input[name="hinh_anh"]').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const preview = document.getElementById('preview-avatar');
                if (preview) {
                    preview.src = ev.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });

    // Preview ảnh album thay thế
    document.querySelectorAll('.album-input').forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const tr = e.target.closest('tr');
                    if (tr) {
                        const img = tr.querySelector('img.album-preview');
                        if (img) {
                            img.src = ev.target.result;
                        }
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Xóa ảnh album bằng ajax
    document.querySelectorAll('.btn-delete-album').forEach(button => {
        button.addEventListener('click', function() {
            if (!confirm('Bạn có chắc muốn xóa ảnh này không?')) return;
            const id = this.getAttribute('data-id');
            fetch(`<?= BASE_URL_ADMIN ?>?act=deleteAlbumAnh&id=${id}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const tr = this.closest('tr');
                        if (tr) tr.remove();
                    } else {
                        alert('Xóa ảnh thất bại!');
                    }
                })
                .catch(() => alert('Lỗi khi xóa ảnh!'));
        });
    });
</script>


<!-- footer -->
<?php include './views/layout/footer.php' ?>