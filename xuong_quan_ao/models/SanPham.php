<?php
class SanPham{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // public function getAllProduct(){
    //     try{
    //         $sql = 'SELECT *FROM san_phams';
    //         $stmt= $this->conn->prepare($sql);
    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     }catch(Exception $e){
    //         echo"Loi".$e->getMessage();
    //     }
    // }
    public function getAllSanPham(){
        try{
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams 
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
        }
        
    }
     public function getDetailSanPham($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_phams WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getListAnhSanPham($san_pham_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = ?");
        $stmt->execute([$san_pham_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

     public function getAllDanhMuc()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

 public function getTenDanhMucBySanPham($san_pham_id) {
        $sql = "SELECT danh_mucs.ten_danh_muc 
                FROM san_phams
                JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$san_pham_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
        // Trả về mảng: ['ten_danh_muc' => '...']
    }

    public function getListSanPhamDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = :danh_muc_id
           ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);;
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }
}