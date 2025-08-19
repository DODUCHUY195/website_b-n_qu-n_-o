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
            $id = $_GET['id_san_pham'];

            $sanPham        = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhluan   = $this->modelSanPham->getBinhLuanFromSanPham($id);
            if ($sanPham) {
                require_once './views/detailSanPham.php';
                deleteSessionError();
            } else {
                 http_response_code(404);
            echo 'Không tìm thấy sản phẩm';
            exit();
            }
        }
    }
?>