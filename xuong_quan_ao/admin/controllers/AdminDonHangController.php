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

    public function detailDonHang() {
    $don_hang_id = $_GET['don_hang_id'] ?? null;
    
    if (!$don_hang_id) {
        die("Thiếu tham số đơn hàng");
    }

    $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

    if (!$donHang) {
        die("Không tìm thấy đơn hàng ID: " . htmlspecialchars($don_hang_id));
    }

    $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
    $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

    require_once './views/donhang/detailDonHang.php';
}

public function formEditDonHang(){
    
    $don_hang_id = $_GET['don_hang_id'] ?? null;
    
    $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
    $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
    if($donHang){
        require_once './views/donhang/editDonHang.php';
        deleteSessionError();
    }else{
        header("Location: " . BASE_URL_ADMIN . '?act=donhang');
        exit();
    }
}

public function postEditDonHang(){
    
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $don_hang_id = $_POST['don_hang_id'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $trang_thai_id = $_POST['trang_thai_id'];
            $errors = [];
            if(empty($ten_nguoi_nhan)){
                $errors['ten_nguoi_nhan']='Tên danh mục không đc để trống';
            }
            if(empty($sdt_nguoi_nhan)){
                $errors['sdt_nguoi_nhan']='Tên danh mục không đc để trống';
            }

            if(empty($email_nguoi_nhan)){
                $errors['email_nguoi_nhan']='Tên danh mục không đc để trống';
            }
            if(empty($dia_chi_nguoi_nhan)){
                $errors['dia_chi_nguoi_nhan']='Tên danh mục không đc để trống';
            }
            if(empty($trang_thai_id)){
                $errors['trang_thai_id']='Tên danh mục không đc để trống';
            }
            

            if(empty($errors)){
                $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id);
                header("Location: ". BASE_URL_ADMIN . '?act=donhang' );
                exit();
            }else{
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=formsuadonhang&don_hang_id=' . $don_hang_id);
                exit();
                 
            }
        }
       
    
}
}