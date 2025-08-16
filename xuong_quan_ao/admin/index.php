<?php
session_start();
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminDonHang.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';


$act = $_GET['act'] ?? '/';

match ($act) {
    //route bao cao thong ke
    '/' => (new AdminBaoCaoThongKeController())->home(),
    //route danh mục
    'danhmuc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' => (new AdminDanhMucController())->deleteDanhMuc(),

    //route sản phẩm
    'sanpham' => (new AdminSanPhamController())->danhSachSanPham(),
    'formthemsanpham' => (new AdminSanPhamController())->formAddSanPham(),
    'themsanpham' => (new AdminSanPhamController())->postAddSanPham(),
    'formsuasanpham' => (new AdminSanPhamController())->formEditSanPham($_GET['san_pham_id'] ?? null),
    'suasanpham' => (new AdminSanPhamController())->postEditSanPham($_POST['san_pham_id'] ?? null),
    'xoaSanPham' => (new AdminSanPhamController())->deleteSanPham(),
    'deleteAlbumAnhSanPham' => (new AdminSanPhamController())->deleteAlbumAnhSanPham(),
    'xoaAnhDaiDien' => (new AdminSanPhamController())->deleteAnhDaiDien(),
    'chiTietSanPham' => (new AdminSanPhamController())->chiTietSanPham(),

    //route quan ly tai khoan quản trị
    'listtaikhoanquantri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'formthemquantri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'themquantri' => (new AdminTaiKhoanController())->postAddQuanTri(),
    'formsuaquantri' => (new AdminTaiKhoanController())->formEditQuanTri(),
    'suaquantri' => (new AdminTaiKhoanController())->postEditQuanTri(),


    //route quan ly don hang
    'donhang' => (new AdminDonHangController())->danhSachDonHang(),
    'chiTietdonhang' => (new AdminDonHangController())->detailDonHang(),
    'formsuadonhang' => (new AdminDonHangController())->formEditDonHang($_GET['don_hang_id'] ?? null),
    'suadonhang' => (new AdminDonHangController())->postEditDonHang(),





    //route reset passowrd
    'resetpassword' => (new AdminTaiKhoanController())->resetPassword(),


    //route quan ly khách hàng
    'listtaikhoankhachhang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'formsuakhachhang' => (new AdminTaiKhoanController())->formEditKhachHang(),
    'suakhachhang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    // 'chitietkhachhang' => (new AdminTaiKhoanController())->detailKhachHang(),
};
