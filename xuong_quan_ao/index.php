<?php
require_once './commons/env.php';
require_once './commons/function.php';
require_once './controllers/HomeController.php';
require_once './models/Student.php';
require_once './models/SanPham.php';
$act = $_GET['act'] ?? '/';

match($act){
    '/' => (new HomeController()) ->home(),
    'trangchu'=>(new HomeController()) ->trangchu(),
    'danhsachsanpham'=>(new HomeController()) -> danhsach(),
}
?>