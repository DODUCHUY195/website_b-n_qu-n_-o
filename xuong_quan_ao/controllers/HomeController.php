<?php
    class HomeController{
        public $modelSanPham;
        public function  __construct()
        {
            $this->modelSanPham = new SanPham();
        }
        public function home(){
            echo"Day la HOME";
        }
        public function trangchu(){
            echo"Trang chu";
        }
        public function danhsach(){
            echo "Danh sach sp";
            $listProduct = $this->modelSanPham->getAllProduct();
            require_once './views/listProduct.php';
        }
    }
?>