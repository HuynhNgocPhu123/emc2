<?php
    include_once(__DIR__ . '/../model/ketnoi.php');
    class Msales{
        // lấy toàn bộ khuyến mãi
        public function selectallKM(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM khuyenmai order by id_khuyenmai desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lấy 1 gói khuyến mãi
        public function select1KM($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM khuyenmai where id_khuyenmai =$ma order by id_khuyenmai desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // Lọc theo loại doanh nghiệp
        public function selectallKMbyloaiDN($loaiDN){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM khuyenmai
                where loaidoanhnghiep = '$loaiDN'
                order by id_khuyenmai desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // lọc theo loại gói khuyến mãi
        public function selectallKMbyloaigoi($loaigoi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM khuyenmai
                where loaigoi = '$loaigoi'
                order by id_khuyenmai desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        //Lọc theo doanh nghiệp + lọc theo gói:
        public function selectallKMbyloaiDNandloaigoi($loaiDN,$loaigoi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM khuyenmai
                where loaidoanhnghiep = '$loaiDN' and loaigoi = '$loaigoi'
                order by id_khuyenmai desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // Xóa khuyến mãi
        public function deletekhuyenmai($id_khuyenmai){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="DELETE from khuyenmai where id_khuyenmai= $id_khuyenmai ";
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
        // Thêm khuyến mãi
        public function insertkhuyenmai($ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="INSERT INTO khuyenmai(ten_khuyenmai, gia, noidung, loaidoanhnghiep, loaigoi, ngaybatdau, ngayketthuc)
                Values('$ten_khuyenmai', $gia, '$noidung', '$loaidoanhnghiep', '$loaigoi', '$ngaybatdau', '$ngayketthuc') ";
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
        // sửa khuyến mãi
        public function updatekhuyenmai($id_khuyenmai, $ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                $str = "UPDATE khuyenmai SET 
                            ten_khuyenmai = '$ten_khuyenmai',
                            gia = $gia,
                            noidung = '$noidung',
                            loaidoanhnghiep = '$loaidoanhnghiep',
                            loaigoi = '$loaigoi',
                            ngaybatdau = '$ngaybatdau',
                            ngayketthuc = '$ngayketthuc'
                        WHERE id_khuyenmai = $id_khuyenmai";

                $tbl = $con->query($str);
                if ($tbl) {
                    return $tbl;
                } else {
                    echo 'Lỗi truy vấn: ' . $con->error;
                    return false;
                }
            } else {
                echo 'Lỗi kết nối CSDL';
                return false;
            }
        }

    }


?>