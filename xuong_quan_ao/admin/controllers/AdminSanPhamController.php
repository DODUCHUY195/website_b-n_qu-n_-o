<?php
class AdminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham  = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham  = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $ngay_nhap     = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id   = $_POST['danh_muc_id'] ?? '';
            $so_luong      = $_POST['so_luong'] ?? '';
            $trang_thai    = $_POST['trang_thai'] ?? '';
            $mo_ta         = $_POST['mo_ta'] ?? '';
            $errors        = [];
            $hinh_anh      = $_FILES['hinh_anh'] ?? null;
            $img_array     = $_FILES['img_array'] ?? [];

            // Validate dữ liệu
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Vui lòng nhập số lượng';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Vui lòng nhập ngày nhập';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Vui lòng chọn ảnh sản phẩm';
            }

            // Nếu có lỗi → lưu vào session + quay lại form
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=formthemsanpham');
                exit(); // DỪNG Ở ĐÂY, KHÔNG INSERT
            }

            // Nếu không lỗi → xử lý upload + insert
            $file_thumb = uploadfile($hinh_anh, './uploads/');

            $san_pham_id = $this->modelSanPham->insertSanPham(
                $ten_san_pham,
                $gia_san_pham,
                $gia_khuyen_mai,
                $so_luong,
                $ngay_nhap,
                $danh_muc_id,
                $trang_thai,
                $mo_ta,
                $file_thumb
            );

            // Upload album ảnh
            if (!empty($img_array['name'][0])) {
                foreach ($img_array['name'] as $key => $value) {
                    $file = [
                        'name'     => $img_array['name'][$key],
                        'type'     => $img_array['type'][$key],
                        'tmp_name' => $img_array['tmp_name'][$key],
                        'error'    => $img_array['error'][$key],
                        'size'     => $img_array['size'][$key]
                    ];
                    $link_hinh_anh = uploadfile($file, './uploads/album');
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                }
            }

            // Chuyển hướng về danh sách sản phẩm
            header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
            exit();
        }
    }


    public function formEditSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
        }
    }

    public function postEditSanPham()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $san_pham_id   = $_POST['san_pham_id'] ?? null;
        $ten_san_pham  = $_POST['ten_san_pham'] ?? '';
        $gia_san_pham  = $_POST['gia_san_pham'] ?? '';
        $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
        $ngay_nhap     = $_POST['ngay_nhap'] ?? '';
        $danh_muc_id   = $_POST['danh_muc_id'] ?? '';
        $so_luong      = $_POST['so_luong'] ?? '';
        $trang_thai    = $_POST['trang_thai'] ?? '';
        $mo_ta         = $_POST['mo_ta'] ?? '';
        $errors        = [];
        $hinh_anh      = $_FILES['hinh_anh'] ?? null;
        $img_array     = $_FILES['album_anh'] ?? [];

        // Validate dữ liệu cơ bản
        if (empty($ten_san_pham)) $errors['ten_san_pham'] = 'Vui lòng nhập tên sản phẩm';
        if (empty($gia_san_pham)) $errors['gia_san_pham'] = 'Vui lòng nhập giá sản phẩm';
        if (empty($gia_khuyen_mai)) $errors['gia_khuyen_mai'] = 'Vui lòng nhập giá khuyến mãi';
        if (empty($so_luong)) $errors['so_luong'] = 'Vui lòng nhập số lượng';
        if (empty($ngay_nhap)) $errors['ngay_nhap'] = 'Vui lòng nhập ngày nhập';
        if (empty($danh_muc_id)) $errors['danh_muc_id'] = 'Vui lòng chọn danh mục';
        if (empty($trang_thai)) $errors['trang_thai'] = 'Vui lòng chọn trạng thái';

        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
            $_SESSION['flash'] = true;
            header("Location:" . BASE_URL_ADMIN . '?act=formsuasanpham&id=' . $san_pham_id);
            exit();
        }

        // Xử lý ảnh đại diện
        if ($hinh_anh && $hinh_anh['error'] === 0) {
            $file_thumb = uploadfile($hinh_anh, './uploads/');
        } else {
            $file_thumb = $_POST['old_file'] ?? '';
        }

        // Update sản phẩm
        $this->modelSanPham->updateSanPham(
            $san_pham_id,
            $ten_san_pham,
            $gia_san_pham,
            $gia_khuyen_mai,
            $so_luong,
            $ngay_nhap,
            $danh_muc_id,
            $trang_thai,
            $mo_ta,
            $file_thumb
        );

        // Upload album ảnh mới
        if (!empty($img_array['name'][0])) {
            foreach ($img_array['name'] as $key => $value) {
                $file = [
                    'name'     => $img_array['name'][$key],
                    'type'     => $img_array['type'][$key],
                    'tmp_name' => $img_array['tmp_name'][$key],
                    'error'    => $img_array['error'][$key],
                    'size'     => $img_array['size'][$key]
                ];
                $link_hinh_anh = uploadfile($file, './uploads/album');
                $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
            }
        }

        header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
        exit();
    }
}



public function deleteSanPham()
{
    $id = $_GET['id'] ?? null;

    if ($id) {
        $this->modelSanPham->deleteSanPhamById($id);
        $_SESSION['success'] = "Xóa sản phẩm thành công!";
    } else {
        $_SESSION['error'] = "Không tìm thấy sản phẩm!";
    }

    header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
    exit;
}



 public function deleteAlbumAnhSanPham()
{
    $id = $_GET['id'] ?? null;
    $id_san_pham = $_GET['id_san_pham'] ?? null;

    if ($id) {
        $this->modelSanPham->deleteAlbumAnhById($id);
        $_SESSION['success'] = "Xóa ảnh thành công!";
    } else {
        $_SESSION['error'] = "Không tìm thấy ảnh cần xóa!";
    }

    // Reload lại trang hiện tại
    $currentUrl = $_SERVER['HTTP_REFERER'] ?? (BASE_URL_ADMIN . "?act=formsuasanpham&id=" . $id_san_pham);
    header("Location: " . $currentUrl);
    exit;
}


public function deleteAnhDaiDien()
{
    $id = $_GET['id'] ?? null;

    if ($id) {
        $this->modelSanPham->deleteAnhDaiDienById($id);
        $_SESSION['success'] = "Xóa ảnh đại diện thành công!";
    } else {
        $_SESSION['error'] = "Không tìm thấy sản phẩm!";
    }

    // Reload lại trang edit
    $currentUrl = $_SERVER['HTTP_REFERER'] ?? (BASE_URL_ADMIN . "?act=formsuasanpham&id=" . $id);
    header("Location: " . $currentUrl);
    exit;
}


public function chiTietSanPham()
{
    $id = $_GET['id'] ?? null;

    if (!$id) {
        $_SESSION['error'] = "Không tìm thấy sản phẩm";
        header("Location: " . BASE_URL_ADMIN . "?act=sanpham");
        exit();
    }

    $sanPham = $this->modelSanPham->getSanPhamById($id);
    $albumAnh = $this->modelSanPham->getAlbumAnhBySanPhamId($id);

    require './views/sanpham/detailSanPham.php';
}


    //         if(empty($errors)){
    //             $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
    //             header("Location: ". BASE_URL_ADMIN . '?act=danhmuc' );
    //             exit();
    //         }else{
    //             $danhMuc = ['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc,'mo_ta'=>$mo_ta];
    //              require_once './views/danhmuc/editDanhMuc.php';
    //         }
    //     }

    // }

    // public function deleteDanhMuc(){
    //     $id = $_GET['id_danh_muc'];
    //     $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    //     if($danhMuc){
    //         $this->modelDanhMuc->destroyDanhMuc($id);
    //     }
    //     header("Location: ". BASE_URL_ADMIN . '?act=danhmuc' );
    // exit();
    // }
}
