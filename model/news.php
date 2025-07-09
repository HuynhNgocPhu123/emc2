<?php
   include_once(__DIR__ . '/../model/ketnoi.php');
    class ViewNews{
        // lấy danh sách bài viết không có phân trang
        public function selectnews1(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * FROM tintuc t inner join danhmuc_tintuc dmt 
                on t.id_danhmuc = dmt.id_danhmuc
                ORDER BY id_tintuc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }

        public function selectnews($limit, $offset){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * FROM tintuc t inner join danhmuc_tintuc dmt 
                on t.id_danhmuc = dmt.id_danhmuc 
                ORDER BY id_tintuc DESC LIMIT $limit OFFSET $offset";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }

        public function countNews(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "SELECT COUNT(*) as total FROM tintuc";
            $result = $con->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return (int) $row['total'];
            } else {
                echo "❌ Lỗi truy vấn: " . $con->error;
                return 0;
            }
        }
        // tin xem nhiều
         public function selectviewnews(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * FROM tintuc WHERE luotxem >= 150 ORDER BY id_tintuc desc LIMIT 1;";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // tìm sản phẩm theo tên
        public function selectnewsbyname($limit, $offset, $name){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * FROM tintuc where tieude like '%$name%'  ORDER BY ngaydang DESC LIMIT $limit OFFSET $offset";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lọc theo doanh mục
        public function selectnewsbyiddanhmuc($ma,$limit, $offset){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * FROM tintuc t inner join danhmuc_tintuc dmt 
                on t.id_danhmuc = dmt.id_danhmuc  
                where t.id_danhmuc=$ma 
                ORDER BY ngaydang DESC LIMIT $limit OFFSET $offset";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // chi tiết bài viết
        public function selectnewsbyid($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str="SELECT * FROM tintuc t inner join danhmuc_tintuc dct on t.id_danhmuc = dct.id_danhmuc
                where id_tintuc = $ma";
                $tbl = $con ->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }

        // thêm bài viết
       public function insertnews($tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $ngaydang = date("Y-m-d"); // Tự động lấy ngày hiện tại

                $str = "INSERT INTO tintuc (tieude, noidung, hinhanh, ngaydang, tacgia, id_danhmuc) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($str);
                if ($stmt) {
                    $stmt->bind_param("sssssi", $tieude, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc);
                    $stmt->execute();
                    return $stmt->affected_rows > 0;
                } else {
                    echo "Lỗi prepare: " . $con->error;
                    return false;
                }
            } else {
                echo "Lỗi kết nối";
                return false;
            }
        }


        // sửa bài viết
        public function updatetnews($ma, $tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $ngaydang = date('Y-m-d'); // ngày hiện tại
                $str = "UPDATE tintuc 
                        SET tieude = ?, noidung = ?, hinhanh = ?, ngaydang = ?, tacgia = ?, id_danhmuc = ? 
                        WHERE id_tintuc = ?";

                $stmt = $con->prepare($str);
                if ($stmt) {
                    $stmt->bind_param("ssssssi", $tieude, $noidung, $hinhanh, $ngaydang, $tacgia, $id_danhmuc, $ma);
                    if ($stmt->execute()) {
                        return true;
                    } else {
                        return "Execute failed: " . $stmt->error;
                    }
                } else {
                    return "Prepare failed: " . $con->error;
                }
            } else {
                return "Kết nối thất bại: " . $con->connect_error;
            }
        }

        // xóa bài viết
        public function deletenew($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = "DELETE FROM tintuc where id_tintuc = $ma";
                $tbl = $con->query($str);
                return $tbl;
            } else {
                return false;
            }
        }
        // xử lý tăng view
        public function increase($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $sql = "UPDATE tintuc SET luotxem = luotxem + 10 WHERE id_tintuc = $ma";
                $tbl = $con ->query($sql);
                return $tbl;
            }else{
                return false;
            }
        }
        // xử lý đếm bài viết khi tìm kiếm
        public function countNewsByKeyword($keyword) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $keyword = $con->real_escape_string($keyword);

            $sql = "SELECT COUNT(*) as total FROM tintuc WHERE tieude LIKE '%$keyword%'";
            $result = $con->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return (int) $row['total'];
            } else {
                return 0;
            }
        }
        //xử lý đếm bài viết của từng danh mục:
        public function countNewsByDanhmuc($id_danhmuc) {
        $p = new clsketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $sql = "SELECT COUNT(*) as total FROM tintuc WHERE id_danhmuc = ?";
            $stmt = $con->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id_danhmuc);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return (int) $row['total'];
                } else {
                    return 0;
                }
            } else {
                echo "Lỗi prepare: " . $con->error;
                return 0;
            }
        } else {
            echo "Lỗi kết nối";
            return 0;
        }
    }


    }

?>