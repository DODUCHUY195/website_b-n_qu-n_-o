<?php
class AdminTaiKhoan
{


    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
    {
        try {
            $sql = 'INSERT INTO  tai_khoans (ho_ten,email, mat_khau, chuc_vu_id)
                    VALUES (:ho_ten, :email,:password,:chuc_vu_id)
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }


    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id= :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai)
    {
        try {
            $sql = 'UPDATE  tai_khoans SET ho_ten = :ho_ten,email = :email,so_dien_thoai = :so_dien_thoai, trang_thai  = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function resetPasswordHash($id, $password)
    {
        try {
            $sql = 'UPDATE  tai_khoans SET mat_khau = :mat_khau WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $password,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }


    public function updateTaiKhoanKhachHang($id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai)
    {
        try {
            $sql = 'UPDATE  tai_khoans SET ho_ten = :ho_ten,email = :email,so_dien_thoai = :so_dien_thoai,ngay_sinh = :ngay_sinh, gioi_tinh = :gioi_tinh, dia_chi=:dia_chi, trang_thai  = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_sinh' => $ngay_sinh,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'loi' . $e->getMessage();
        }
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans
        WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();


            if (is_array($user) && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) {
                    if ($user['trang_thai'] == 1) {
                        return $user;
                    } else {
                        return 'Tài khoản bị cấm';
                    }
                } else {
                    return  "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Nhập sai thông tin tài khoản mật khẩu";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ?: null;
        } catch (Exception $e) {
            error_log("Lỗi lấy tài khoản: " . $e->getMessage());
            return null;
        }
    }

    public function updateThongTinCaNhan($email, $data)
    {
        $sql = "UPDATE tai_khoans 
                SET ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, dia_chi = :dia_chi, anh_dai_dien = :anh_dai_dien
                WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ho_ten' => $data['ho_ten'],
            ':so_dien_thoai' => $data['so_dien_thoai'],
            ':dia_chi' => $data['dia_chi'],
            ':anh_dai_dien' => $data['anh_dai_dien'],
            ':email' => $email
        ]);
    }

    public function doiMatKhau($email, $matKhauMoi)
    {
        $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':mat_khau' => password_hash($matKhauMoi, PASSWORD_DEFAULT),
            ':email' => $email
        ]);
    }
}
