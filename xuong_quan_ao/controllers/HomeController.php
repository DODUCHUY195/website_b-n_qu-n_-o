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
            

            $sanPham        = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhluan   = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $soLuongBinhLuan = count($listBinhluan);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
                    $listDanhMuc = $this->modelSanPham->getTenDanhMucBySanPham($id);
                require_once './views/detailSanPham.php';
               if ($sanPham) {
                require_once './views/detailSanPham.php';
            
        }else{
            header("Location: ". BASE_URL);
            exit();
        }
        }
    }
?>