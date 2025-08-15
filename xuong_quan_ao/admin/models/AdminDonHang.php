<?php

class AdminDonHang
{
    public $conn;
    public $modelDonHang;


    public function __construct()
    {
        $this->conn = connectDB();
    }
     public function getAllDonHang()
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thais.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }
    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT *FROM trang_thai_don_hangs
            
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    
        }
        

    // public function getAllDonHang($id)
    // {
    //     try {
    //         $sql = 'SELECT don_hangs.*, 
    //                     trang_thai_don_hangs.ten_trang_thai,
    //                     tai_khoan.ho_ten, 
    //                     tai_khoan.email, 
    //                     tai_khoan.so_dien_thoai
    //                     phuong_thuc_thanh_toan.ten_phuong_thuc
    //         FROM don_hangs
    //         INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
    //         INNER JOIN tai_khoan ON don_hangs.id_tai_khoan = tai_khoan.id
    //         INNER JOIN phuong_thuc_thanh_toan ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toan.id
    //         WHERE don_hangs.id = :id';
            
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':id'=>$id]);

    //         return $stmt->fetch();
    //     } catch (Exception $e) {
    //         echo 'loi' . $e->getMessage();
    //     }
    //     }
    

     public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_pham.ten_san_pham
            FROM chi_tiet_don_hangs
            INNER JOIN san_phams ON chi_tiet_don_hangs.id_san_pham = san_pham.id
            WHERE chi_tiet_don_hang.don_hang = :id';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }
        
}
        