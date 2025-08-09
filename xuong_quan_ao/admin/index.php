<?php
require_once '../commons/env.php';
require_once '../commons/function.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
$act = $_GET['act'] ?? '/';

match($act){
    //route danh mục
    'danhmuc' =>(new AdminDanhMucController())->danhSachDanhMuc(),
    'formthemdanhmuc' =>(new AdminDanhMucController())->formAddDanhMuc(),
    'themdanhmuc' =>(new AdminDanhMucController())->postAddDanhMuc(),
    'formsuadanhmuc' =>(new AdminDanhMucController())->formEditDanhMuc(),
    'suadanhmuc' =>(new AdminDanhMucController())->postEditDanhMuc(),
    'xoadanhmuc' =>(new AdminDanhMucController())->deleteDanhMuc(),

    //route sản phẩm
    'sanpham' =>(new AdminSanPhamController())->danhSachSanPham(),
    'formthemsanpham' =>(new AdminSanPhamController())->formAddSanPham(),
    'themsanpham' =>(new AdminSanPhamController())->postAddSanPham(),
    // 'formsuasanpham' =>(new AdminSanPhamController())->formEditSanPham(),
    // 'suasanpham' =>(new AdminSanPhamController())->postEditSanPham(),
    // 'xoasanpham' =>(new AdminSanPhamController())->deleteSanPham(),
}
?>