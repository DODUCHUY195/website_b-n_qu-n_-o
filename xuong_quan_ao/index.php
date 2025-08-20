<?php
session_start();
require_once './commons/env.php';
require_once './commons/function.php';

require_once './controllers/HomeController.php';

require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';



$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'login' => (new HomeController())->FormLogin(),
    'checklogin' => (new HomeController())->Login(),
    'themgiohang' => (new HomeController())->addGioHang(),
    'giohang' => (new HomeController())->GioHang(),
    'thanhtoan' => (new HomeController())->ThanhToan(),
    'xu_ly_thanh_toan' => (new HomeController())->PostThanhToan(),
    'lichsumuahang' => (new HomeController())->lichSuMuaHang(),
    'chitietmuahang' => (new HomeController())->chiTietMuaHang(),
    'huydonhang' => (new HomeController())->huyDonHang()


}
?>