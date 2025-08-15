<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        //   $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không đc để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không đc để trống';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoanquantri');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header('Location:' . BASE_URL_ADMIN . '?act=formthemquantri');
                exit();
            }
            // require_once './views/danhmuc/addDanhMuc.php';
        }
    }


    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'] ?? null;

        if (!$id_quan_tri) {
            echo "Thiếu ID quản trị";
            return;
        }

        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        if (!$quanTri) {
            echo "Không tìm thấy quản trị viên";
            return;
        }

        require_once './views/taikhoan/quantri/editQuanTri.php';
    }



    public function postEditQuanTri()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quan_tri_id = $_POST['quan_tri_id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không đc để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'EMAIL không đc để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'SDt không đc để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'TT không đc để trống';
            }

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
                header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoanquantri');
                exit();
            } else {
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=formsuaquantri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }


    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header("Location:" . BASE_URL_ADMIN . '?act=listtaikhoanquantri');
            exit();
        } else if ($status && $tai_khoan['chuc_vu_id'] == 2) {
            header("Location:" . BASE_URL_ADMIN . '?act=listtaikhoankhachhang');
            exit();
        } else {
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }


    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['khach_hang_id'] ?? null;
        if (!$id_khach_hang) {
            echo "Thiếu ID khách hàng";
            return;
        }

        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        if (!$khachHang) {
            echo "Không tìm thấy khách hàng";
            return;
        }

        require_once './views/taikhoan/khachhang/editKhachHang.php';
    }



    public function postEditKhachHang()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $khach_hang_id = $_POST['khach_hang_id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];
            $trang_thai = $_POST['trang_thai'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không đc để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'EMAIL không đc để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'EMAIL không đc để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'EMAIL không đc để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'TT không đc để trống';
            }

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoanKhachHang($khach_hang_id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);
                header("Location: " . BASE_URL_ADMIN . '?act=listtaikhoankhachhang');
                exit();
            } else {
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=formsuakhachhang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    // public function detailKhachHang(){
    //     $id_khach_hang = $_GET['id_khach_hang'];
    //     $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
    //     $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);


    //     require_once './views/taikhoan/khachhang/detailKhachHang.php';
    // }
}
