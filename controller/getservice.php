<?php
    include_once(__DIR__ . '/../model/service.php');
    class Gservice{
        public function getallservice(){
            $p = new Mservice();
            $con = $p -> selectalldichvu();
            if($con){
                if($con -> num_rows > 0){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi ";
                return false;
            }
        }
        // lấy danh mục dịch vụ:
     
        public function getalldanhmucdichvu(){
            $p = new Mservice();
            $con = $p->selectalldanhmucdichvu();
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        //lấy 1 danh mục dịch vụ:
        public function get1danhmucdichvu($ma){
            $p = new Mservice();
            $con = $p->select1danhmucdichvu($ma);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        // Lấy toàn bộ bảng dịch vụ (chưa JOIN)
        public function getalldichvu(){
            $p = new Mservice();
            $con = $p->selectdichvu();
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        // lấy 1 dịch vụ:
        public function get1dichvu($ma){
            $p = new Mservice();
            $con = $p->select1dichvu($ma);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }

        // Lấy dịch vụ theo loại gói (ví dụ: 'theo tháng', 'theo năm')
        public function getdichvubynam($goi){
            $p = new Mservice();
            $con = $p->selectdichvubynam($goi);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }

        // Lấy dịch vụ theo id danh mục dịch vụ
        public function getdichvubydanhmuc($id_danhmuc){
            $p = new Mservice();
            $con = $p->selectdichvubydanhmucdichvu($id_danhmuc);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }

        // Lấy dịch vụ theo danh mục và theo loại gói (hàm này hiện bị sai chính tả trong model)
        public function getdichvubydanhmucandgoi($id_danhmuc, $goi){
            $p = new Mservice();
            // Lưu ý sửa từ 'oidichvu' thành 'goidichvu' trong model nếu bạn chưa sửa
            $con = $p->selectdichvubydanhmucdichvuvatheogoi($id_danhmuc, $goi);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }

        // Lấy toàn bộ chi tiết gói dịch vụ
        public function getallchitietgoidichvu(){
            $p = new Mservice();
            $con = $p->selectallchitietgoidichvu();
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        // Lấy chi tiết từng gói dịch vụ
        public function getselect1chitietgoidichvu($ma){
            $p = new Mservice();
            $con = $p->select1chitietgoidichvu($ma);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        // Lọc chi tiết gói dịch vụ theo  dịch vụ:
        public function getselectchitietgoidichvubydichvu($ma){
            $p = new Mservice();
            $con = $p->selectchitietgoidichvubydichvu($ma);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        // Lọc chi tiết gói dịch vụ theo dịch vụ và theo gói (Tháng năm):
        public function getselectchitietgoidichvubydichvuandtheogoi($ma,$theogoi){
            $p = new Mservice();
            $con = $p->selectchitietgoidichvubydichvuandtheogoi($ma,$theogoi);
            if($con && $con->num_rows > 0){
                return $con;
            }else{
                return 0;
            }
        }
        // Thêm chi tiết gói dịch vụ
        public function getinsertdetaildichvu($tengoidichvu,$theogoi,$gia,$sohuudanhcho,$motagoi,$id_dichvu){
            $p = new Mservice();
            $con = $p->insertdetaildichvu($tengoidichvu,$theogoi,$gia,$sohuudanhcho,$motagoi,$id_dichvu);
            if($con ){
                return $con;
            }else{
                return 0;
            }
        } 
        // Sửa chi tiết gói dịch vụ:
        // Sửa chi tiết gói dịch vụ 
        public function getupdatechitietgoidichvu($id_goidichvu, $tengoidichvu, $theogoi, $gia, $sohuudanhcho, $motagoi, $id_dichvu) {
            $m = new Mservice();
            return $m->updatechitietgoidichvu($id_goidichvu, $tengoidichvu, $theogoi, $gia, $sohuudanhcho, $motagoi, $id_dichvu);
        }


        // Xóa gói chi tiết dịch vụ:
        public function getdeletedetaildichvu($id_goidichvu) {
            $model = new Mservice(); // Gọi đến model chứa hàm updatecategorydichvu
            $result = $model->deletedetaildichvu($id_goidichvu);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        // thêm danh mục dịch vụ
        public function getinsertcategorydichvu($tendichvu){
            $p = new Mservice();
            $con = $p->insertcategorydichvu($tendichvu);
            if($con){
                return $con;
            }else{
                return 0;
            }
        }
        // Sửa danh mục dịch vụ
        public function getupdatecategorydichvu($id_danhmuc, $tenmoi) {
            $model = new Mservice(); // Gọi đến model chứa hàm updatecategorydichvu
            $result = $model->updatecategorydichvu($id_danhmuc, $tenmoi);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        // Xóa danh mục dịch vụ:
        public function getdeletecategorydichvu($id_danhmuc) {
            $model = new Mservice(); // Gọi đến model chứa hàm updatecategorydichvu
            $result = $model->deletecategorydichvu($id_danhmuc);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }
        // thêm dịch vụ
        public function getinsertdichvu($goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh) {
            $p = new Mservice();
            $con = $p->insertdichvu($goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh);
            if ($con) {
                return $con;
            } else {
                echo "Lỗi thêm dịch vụ";
                return 0;
            }
        }

        // Sửa dịch vụ
        public function getupdateDichvu($id_dichvu, $goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh = null) {
            $model = new Mservice();
            $result = $model->updateDichvu($id_dichvu, $goidichvu, $tendichvu, $mota, $id_danhmucdichvu, $hinhanh);

            return $result === true;
        }

        // Xóa danh mục dịch vụ:
        public function getdeletedichvu($id_dichvu) {
            $model = new Mservice(); // Gọi đến model chứa hàm updatecategorydichvu
            $result = $model->deletedichvu($id_dichvu);

            if ($result === true) {
                return true; // Thành công
            } else {
                return false; // Thất bại
            }
        }

    }
?>