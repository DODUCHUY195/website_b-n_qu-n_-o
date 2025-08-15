<?php
class AdminDonHangController{
public $modelDonHang;
public function __construct(){
    $this->modelDonHang = new AdminDonHang();
}

     public function danhSachDonHang(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
       require_once './views/donhang/listDonHang.php';
    }

    public function detaiDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];


        // Lấy thông tin đơn hàng ở bảng don_hangs
        // $donHang = $this->modelDonHang->getDetaiDonHang($don_hang_id);

        // Lấy danh sách sản phẩm đã đặt của đơn hàng của bảng chi tiết đơn hàng

        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        
        require_once './views/donhang/detailDonHang.php';


    }
}