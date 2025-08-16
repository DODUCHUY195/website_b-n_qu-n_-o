<?php

class AdminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM san_phams WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO  san_phams (ten_san_pham,gia_san_pham,gia_khuyen_mai,so_luong,ngay_nhap,danh_muc_id,trang_thai,mo_ta,hinh_anh)
                    VALUES (:ten_san_pham,:gia_san_pham,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai,:mo_ta,:hinh_anh)
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function updateSanPham($id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        $stmt = $this->conn->prepare("UPDATE san_phams SET ten_san_pham = ?, gia_san_pham = ?, gia_khuyen_mai = ?, so_luong = ?, ngay_nhap = ?, danh_muc_id = ?, trang_thai = ?, mo_ta = ?, hinh_anh = ? WHERE id = ?");
        return $stmt->execute([$ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh, $id]);
    }


    public function deleteSanPhamById($id)
    {
        // 1. Lấy sản phẩm
        $stmt = $this->conn->prepare("SELECT hinh_anh FROM san_phams WHERE id = ?");
        $stmt->execute([$id]);
        $sanPham = $stmt->fetch(PDO::FETCH_ASSOC);

        // Xóa ảnh đại diện
        if ($sanPham && !empty($sanPham['hinh_anh'])) {
            $filePath = __DIR__ . '/../uploads/' . $sanPham['hinh_anh'];
            if (file_exists($filePath)) unlink($filePath);
        }

        // 2. Lấy album ảnh
        $stmt = $this->conn->prepare("SELECT link_hinh_anh FROM hinh_anh_san_phams WHERE san_pham_id = ?");
        $stmt->execute([$id]);
        $album = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Xóa file album ảnh
        foreach ($album as $anh) {
            $filePath = __DIR__ . '/../uploads/album/' . $anh['link_hinh_anh'];
            if (file_exists($filePath)) unlink($filePath);
        }

        // Xóa album ảnh trong DB
        $stmt = $this->conn->prepare("DELETE FROM hinh_anh_san_phams WHERE san_pham_id = ?");
        $stmt->execute([$id]);

        // 3. Xóa sản phẩm trong DB
        $stmt = $this->conn->prepare("DELETE FROM san_phams WHERE id = ?");
        return $stmt->execute([$id]);
    }




public function getSanPhamById($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM san_phams WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function getAlbumAnhBySanPhamId($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




    public function updateAlbumAnh($id, $filename)
    {
        $stmt = $this->conn->prepare("UPDATE hinh_anh_san_phams SET link_hinh_anh = ? WHERE id = ?");
        return $stmt->execute([$filename, $id]);
    }


    public function insertAlbumAnhSanPham($san_pham_id, $filename)
    {
        $stmt = $this->conn->prepare("INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh) VALUES (?, ?)");
        return $stmt->execute([$san_pham_id, $filename]);
    }



    public function getListAnhSanPham($san_pham_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = ?");
        $stmt->execute([$san_pham_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAlbumAnhById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM hinh_anh_san_phams WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteAlbumAnhById($id)
    {
        // Lấy thông tin ảnh
        $album = $this->getAlbumAnhById($id);
        if ($album) {
            $filePath = __DIR__ . '/../uploads/album/' . $album['link_hinh_anh'];
            if (file_exists($filePath)) {
                unlink($filePath); // Xóa file ảnh vật lý
            }
        }

        // Xóa record trong DB
        $stmt = $this->conn->prepare("DELETE FROM hinh_anh_san_phams WHERE id = ?");
        return $stmt->execute([$id]);
    }


    public function deleteAnhDaiDienById($id)
    {
        $stmt = $this->conn->prepare("SELECT hinh_anh FROM san_phams WHERE id = ?");
        $stmt->execute([$id]);
        $sanPham = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($sanPham && !empty($sanPham['hinh_anh'])) {
            $filePath = __DIR__ . '/../uploads/' . $sanPham['hinh_anh'];
            if (file_exists($filePath)) unlink($filePath);
        }

        $stmt = $this->conn->prepare("UPDATE san_phams SET hinh_anh = NULL WHERE id = ?");
        return $stmt->execute([$id]);
    }


    
}
