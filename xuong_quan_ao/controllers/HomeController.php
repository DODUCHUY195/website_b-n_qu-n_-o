<?php
    class HomeController{
        public $modelSanPham;
        public function  __construct()
        {
            $this->modelSanPham = new SanPham();
        }
        public function home(){
            $listSanPham = $this->modelSanPham->getAllSanPham();
            require_once './views/home.php';
        }
        
        public function chiTietSanPham(){
            $id = $_GET['id'];
            if (!$id) {

            $_SESSION['error'] = "Không tìm thấy sản phẩm";
            header("Location: " . BASE_URL);
            exit();
        }

            $sanPham        = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhluan   = $this->modelSanPham->getBinhLuanFromSanPham($id);
            
                require_once './views/detailSanPham.php';
               
        }
    }
?>