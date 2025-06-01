<?php
//require_once './admin/models/AdminSanPham.php';

class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function getAllSanPham()
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id  ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function getDetailSanPham($id)
    {
        try {
            $sql = "SELECT  san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id  
          WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    private function getDanhMucId($id)
    {
        $sql = "SELECT danh_muc_id FROM san_phams WHERE id = :id  ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();
        return $result['danh_muc_id'];
    }
    public function getListSanPhamdDanhMuc($id, $danh_muc_id)
    {
        try {
            // Kiểm tra giá trị đầu vào
            if (!is_numeric($id) || !is_numeric($danh_muc_id)) {
                throw new Exception("Tham số không hợp lệ.");
            }

            // Truy vấn SQL với tham số
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
                FROM san_phams 
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.danh_muc_id = :danh_muc_id 
                AND san_phams.id <> :id
                ORDER BY san_phams.id DESC"; // Sắp xếp theo id giảm dần

            $stmt = $this->conn->prepare($sql);

            // Thực thi truy vấn với tham số ràng buộc
            $stmt->execute([
                ':danh_muc_id' => intval($danh_muc_id),
                ':id' => intval($id),
            ]);

            // Trả về danh sách kết quả
            return $stmt->fetchAll();
        } catch (Exception $e) {
            // Ghi log lỗi thay vì hiển thị trực tiếp
            error_log("Lỗi lấy danh sách sản phẩm theo danh mục: " . $e->getMessage());
            return false; // Trả về false nếu có lỗi
        }
    }




    public function search($keyword)
    {
        try {
            $sql = "SELECT * FROM san_phams
            WHERE ten_san_pham LIKE :keyword
            ORDER BY luot_xem DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':keyword' => '%' . $keyword . '%', // Use LIKE with wildcards
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            throw new Exception("Error searching for products: " . $e->getMessage());
        }
    }
    public function top10()
    {
        try {
            $sql = "SELECT * FROM san_phams
            WHERE 1 ORDER BY luot_xem DESC LIMIT 10";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    

    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function sanPhamTheoDanhMuc($id)
    {
        try {
            $sql = "SELECT san_phams.* FROM san_phams
            INNER JOIN danh_mucs ON danh_mucs.id  = san_phams.danh_muc_id
            WHERE san_phams.danh_muc_id = :id  ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function deleteBinhLuan($id)
    {
        try {
            $sql = "DELETE FROM binh_luans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getDetailBinhLuan($id)
    {
        try {
            $sql = "SELECT * FROM binh_luans WHERE id = :id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
