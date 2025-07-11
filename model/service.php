<?php
    include_once(__DIR__ . '/../model/ketnoi.php');
    class Mservice{
        // lấy bảng dịch vụ + danh mục dịch vụ + chi tiết gói dịch vụ
        public function selectalldichvu(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from danhmuc_dichvu dmdv inner join dichvu dv
                        on dmdv.id_danhmucdichvu = dv.id_danhmucdichvu inner join chitietgoidichvu ctdv
                        on dv.id_dichvu = ctdv.id_dichvu
                        Order by id_goidichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 
        // lấy bảng danh mục dịch vụ:
        public function selectalldanhmucdichvu(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from danhmuc_dichvu
                        Order by id_danhmucdichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy thông tin 1 danh mục dịch vụ:
        public function select1danhmucdichvu($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from danhmuc_dichvu where id_danhmucdichvu =$ma
                        Order by id_danhmucdichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy bảng dịch vụ:
        public function selectdichvu(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from danhmuc_dichvu dmdv inner join dichvu dv
                        on dmdv.id_danhmucdichvu = dv.id_danhmucdichvu
                        Order by id_dichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy 1 dịch vụ
        public function select1dichvu($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from danhmuc_dichvu dmdv inner join dichvu dv
                        on dmdv.id_danhmucdichvu = dv.id_danhmucdichvu where id_dichvu = $ma
                        Order by id_dichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy bảng dịch vụ nhưng lọc theo năm:
        public function selectdichvubynam($goi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from dichvu where goidichvu ='$goi'
                        Order by id_dichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // láy bảng dịch vụ theo danh mục dịch vụ
        public function selectdichvubydanhmucdichvu($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from danhmuc_dichvu dmdv inner join dichvu dv
                        on dmdv.id_danhmucdichvu = dv.id_danhmucdichvu where dv.id_danhmucdichvu =$ma
                        Order by id_dichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy danh mục dịch vụ theo danh mục dịch vụ + theo gói
        public function selectdichvubydanhmucdichvuandtheogoi($ma,$goi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from dichvu where id_danhmucdichvu =$ma and goidichvu ='$goi'
                        Order by id_dichvu desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy thông tin chi tiét gói dịch vụ:
        public function selectallchitietgoidichvu(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from chitietgoidichvu ctdv inner join dichvu dv
                on ctdv.id_dichvu = dv.id_dichvu 
                Order by id_goidichvu desc ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 
        // lấy 1 gói dịch vụ chi tiết
        public function select1chitietgoidichvu($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from chitietgoidichvu ctdv inner join dichvu dv
                on ctdv.id_dichvu = dv.id_dichvu where id_goidichvu = $ma
                Order by id_goidichvu desc ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 
        // Lọc chi tiết gói dịch vụ theo dịch vụ:
        public function selectchitietgoidichvubydichvu($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from chitietgoidichvu ctdv inner join dichvu dv
                on ctdv.id_dichvu = dv.id_dichvu where dv.id_dichvu = $ma
                Order by id_goidichvu desc ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 
        // Lọc chi tiết gói dịch vụ theo dịch vụ và theo gói (Tháng năm):
        public function selectchitietgoidichvubydichvuandtheogoi($ma,$theogoi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " SELECT * from chitietgoidichvu ctdv inner join dichvu dv
                on ctdv.id_dichvu = dv.id_dichvu where dv.id_dichvu = $ma and theogoi ='$theogoi'
                Order by id_goidichvu desc ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 

        // Theem gói dịch vụ chi tiết
        public function insertdetaildichvu($tengoidichvu,$theogoi,$gia,$sohuudanhcho,$motagoi,$id_dichvu){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " INSERT INTO chitietgoidichvu(tengoidichvu,theogoi,gia,sohuudanhcho,motagoi,id_dichvu)
                Values('$tengoidichvu','$theogoi',$gia,'$sohuudanhcho','$motagoi', $id_dichvu)";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 
        // Sửa gói dịch vụ chi tiết 
        public function updatechitietgoidichvu($id_goidichvu, $tengoidichvu, $theogoi, $gia, $sohuudanhcho, $motagoi, $id_dichvu) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $sql = "UPDATE chitietgoidichvu 
                        SET tengoidichvu = ?, theogoi = ?, gia = ?, sohuudanhcho = ?, motagoi = ?, id_dichvu = ?
                        WHERE id_goidichvu = ?";

                $stmt = $con->prepare($sql);
                if ($stmt === false) {
                    echo "Lỗi chuẩn bị truy vấn: " . $con->error;
                    return false;
                }

                $stmt->bind_param("ssdssii", $tengoidichvu, $theogoi, $gia, $sohuudanhcho, $motagoi, $id_dichvu, $id_goidichvu);

                if ($stmt->execute()) {
                    return true;
                } else {
                    echo "Lỗi thực thi truy vấn: " . $stmt->error;
                    return false;
                }
            } else {
                echo "Lỗi kết nối";
                return false;
            }
        }


        // Xóa chi tiết gói dịch vụ
        public function deletedetaildichvu($id_goidichvu){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE from chitietgoidichvu where id_goidichvu =$id_goidichvu";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Loi  truy van';
                    return false;
                }
            }else{
                echo 'Loi Ket noi CSDL';
                return false;
            }
        }

         // thêm danh mục dịch vụ:
         public function insertcategorydichvu($tendichvu){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str = " INSERT INTO danhmuc_dichvu(ten_danhmucdichvu)
                Values('$tendichvu')";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        } 
        // sửa danh mục dịch vụ
        // Sửa danh mục dịch vụ
        public function updatecategorydichvu($id_danhmuc, $tenmoi) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            
            if ($con) {
                $sql = "UPDATE danhmuc_dichvu SET ten_danhmucdichvu = ? WHERE id_danhmucdichvu = ?";
                $stmt = $con->prepare($sql);
                
                if ($stmt) {
                    $stmt->bind_param("si", $tenmoi, $id_danhmuc); // s = string, i = int
                    $result = $stmt->execute();
                    return $result;
                } else {
                    echo "Lỗi prepare: " . $con->error;
                    return false;
                }
            } else {
                echo "Lỗi kết nối";
                return false;
            }
        }
        // xóa danh mục dịch vụ:
        public function deletecategorydichvu($id_danhmuc){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE from danhmuc_dichvu where id_danhmucdichvu =$id_danhmuc";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Loi  truy van';
                    return false;
                }
            }else{
                echo 'Loi Ket noi CSDL';
                return false;
            }
        }
        // thêm dịch vụ:
        public function insertdichvu($goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $str = "INSERT INTO dichvu(goidichvu, tendichvu, mota, id_danhmucdichvu, hinhanh)
                        VALUES('$goidichvu', '$tendichvu', '$mota', $id_danhmucdichvu, '$hinhanh')";
                $tbl = $con->query($str);
                if ($tbl) {
                    return $tbl;
                } else {
                    echo "Lỗi truy vấn: " . $con->error;
                    return false;
                }
            } else {
                echo "Lỗi kết nối";
                return false;
            }
        }

        // Sửa dịch vụ
        public function updateDichvu($id_dichvu, $goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh = null) {
            $p = new clsketnoi();
            $con = $p->moketnoi();

            if ($con) {
                if ($hinhanh) {
                    // Nếu có cập nhật hình ảnh
                    $sql = "UPDATE dichvu 
                            SET goidichvu = ?, tendichvu = ?, mota = ?, id_danhmucdichvu = ?, hinhanh = ?
                            WHERE id_dichvu = ?";
                    $stmt = $con->prepare($sql);

                    if ($stmt === false) {
                        echo "Lỗi chuẩn bị truy vấn: " . $con->error;
                        return false;
                    }

                    $stmt->bind_param("sssisi", $goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh, $id_dichvu);
                } else {
                    // Không cập nhật hình ảnh
                    $sql = "UPDATE dichvu 
                            SET goidichvu = ?, tendichvu = ?, mota = ?, id_danhmucdichvu = ?
                            WHERE id_dichvu = ?";
                    $stmt = $con->prepare($sql);

                    if ($stmt === false) {
                        echo "Lỗi chuẩn bị truy vấn: " . $con->error;
                        return false;
                    }

                    $stmt->bind_param("sssii", $goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $id_dichvu);
                }

                if ($stmt->execute()) {
                    return true;
                } else {
                    echo "Lỗi thực thi truy vấn: " . $stmt->error;
                    return false;
                }
            } else {
                echo "Lỗi kết nối cơ sở dữ liệu";
                return false;
            }
        }
        // xóa dịch vụ:
        public function deletedichvu($id_dichvu){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE from dichvu where id_dichvu =$id_dichvu";
                $tbl = $con ->query($str);
                if($tbl){
                    return $tbl;
                }else{
                    echo 'Loi  truy van';
                    return false;
                }
            }else{
                echo 'Loi Ket noi CSDL';
                return false;
            }
        }


    }
   
        


?>