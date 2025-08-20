<?php
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;




    public function  __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id'];


        $sanPham        = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhluan   = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $soLuongBinhLuan = count($listBinhluan);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        $listDanhMuc = $this->modelSanPham->getTenDanhMucBySanPham($id);
        require_once './views/detailSanPham.php';
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function FormLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user)) {

                $_SESSION['user_client'] = $user;

                header("Location:" . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_SESSION['user_client']) {
                $mail = $_SESSION['user_client'];
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];
                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                header("Location:" . BASE_URL . '?act=giohang');
            } else {
                var_dump("Chưa đăng nhập");
            }
        }
    }


    public function GioHang()
    {
        if ($_SESSION['user_client']) {
            $mail = $_SESSION['user_client'];
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }



            require_once './views/GioHang.php';
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }

    public function ThanhToan()
    {
        if ($_SESSION['user_client']) {
            $user = $_SESSION['user_client'];
            $userID = $user['id'];
            $gioHang = $this->modelGioHang->getGioHangFromUser($userID);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($userID);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            $donHang = $this->modelDonHang->getDonHangsByUser($userID);
            require_once './views/thanhtoan.php';
        } else {
            var_dump("Chưa đăng nhập");
        }
    }

    public function PostThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_dat = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];

            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];

            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];

            $ghi_chu = $_POST['ghi_chu'];

            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat =  Date('Y-m-d H:i:s');
            $trang_thai_id = 1;
            $ma_don_hang = '-' . rand(1000, 9999);

            $user = $_SESSION['user_client'];

            $tai_khoan_id = $user['id'];
            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );

            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            if ($donHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia-khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );
                }
                $this->modelGioHang->deleteDetailGioHang($gioHang['id']);
                $this->modelGioHang->deleteGioHang($tai_khoan_id);
                header("Location: " . BASE_URL . '?act=lichsumuahang');
                exit();
            } else {
            }
        }
    }

    public function lichSuMuaHang()
    {
        if ((isset($_SESSION['user_client']))) {
            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];
            $arrTrangThaiDonHang  = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            $arrPhuongThucThanhToan  = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            $donHangs = $this->modelDonHang->getDonHangsByEmail($tai_khoan_id);
            require_once './views/lichSuMuaHang.php';
        } else {
            var_dump('Chưa đăng nhập');
        }
    }

    public function chiTietMuaHang() {
        if ((isset($_SESSION['user_client']))) {
            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];
            
             $arrTrangThaiDonHang  = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            $arrPhuongThucThanhToan  = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
           
            $donHang = $this->modelDonHang->getDonHangsByID($donHangId);

            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
       
            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo 'Bạn k có quyền truy cập đơn hàng này!';
                exit();
            }

            require_once './views/chitietmuahang.php';
        }  else {
            var_dump('Chưa đăng nhập');
        }
    }

    public function huyDonHang()
    {
        if ((isset($_SESSION['user_client']))) {
            $user = $_SESSION['user_client'];
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];
            $donHang = $this->modelDonHang->getDonHangsByID($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo 'Bạn không có quyền huỷ đon hàng';
                exit();
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo 'Chỉ đơn hàng ở trạng thái "Chưa xác nhận" mới có thể huỷ!';
                exit();
            }
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
            header("Location: " . BASE_URL . '?act=lichsumuahang');
            exit();
        } else {
            var_dump('Chưa đăng nhập');
        }
    }
}
