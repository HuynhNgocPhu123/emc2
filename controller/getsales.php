<?php
    include_once(__DIR__ . '/../model/sales.php');
    class Gsales{
        public function getallKM(){
            $p = new Msales();
            $con = $p->selectallKM();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi khuyến mãi ";
                return false;
            }
        }
        // Lấy 1 khuyến mãi
        public function get1KM($ma){
            $p = new Msales();
            $con = $p->select1KM($ma);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi khuyến mãi ";
                return false;
            }
        }
        // Xóa khuyến mãi
        public function getdeletekhuyenmai($id_khuyenmai) {
            $model = new Msales(); // 
            $result = $model->deletekhuyenmai($id_khuyenmai);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        // Thêm khuyến mãi
        public function getinsertkhuyenmai($ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc) {
            $model = new Msales(); // 
            $result = $model->insertkhuyenmai($ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        // Sửa khuyến mãi
        public function getupdatekhuyenmai($id_khuyenmai, $ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc) {
            $model = new Msales(); // 
            $result = $model->updatekhuyenmai($id_khuyenmai, $ten_khuyenmai, $gia, $noidung, $loaidoanhnghiep, $loaigoi, $ngaybatdau, $ngayketthuc);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        // Lọc theo loại doanh nghiệp
        public function getallKMbyloaiDN($loaiDN){
            $p = new Msales();
            $con = $p->selectallKMbyloaiDN($loaiDN);
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi khuyến mãi ";
                return false;
            }
        }
    }

?>