<?php
    include_once(__DIR__ . '/../model/news.php');
    class getnews{
        public function getallnews1(){
            $p = new ViewNews();
            $con = $p -> selectnews1();
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
        public function getallnews($limit, $offset){
            $p = new ViewNews();
            $con = $p -> selectnews($limit, $offset);
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
        public function totalNews(){
            $p = new ViewNews();
            return $p->countNews();
        }

// danh sách tin nổi bật
        public function gethotnews(){
            $p = new ViewNews();
            $con = $p -> selecthotnews();
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

        // danh sách tin tức nhiều view
        public function getviewnews(){
            $p = new ViewNews();
            $con = $p -> selectviewnews();
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
        public function getallnewsbyname($limit, $offset, $name){
            $p = new ViewNews();
            $con = $p -> selectnewsbyname($limit, $offset, $name);
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

        // lọc theo danh mục sản phẩm
        public function getallnewsbyiddanhmuc($ma,$limit, $offset){
            $p = new ViewNews();
            $con = $p -> selectnewsbyiddanhmuc($ma,$limit, $offset);
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
        // chi tiết sản phẩm
        public function getnewsbyid($ma){
            $p = new ViewNews();
            $con = $p->selectnewsbyid($ma);
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
       // Hàm thêm tin tức (KHÔNG truyền $ngaydang nữa)
        public function getinsertnews($tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc){
            $p = new ViewNews();
            return $p->insertnews($tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc);
        }


        // cập nhật tin tức
        public function updateNewsFromForm($ma, $tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc) {
            $model = new ViewNews();
            $result = $model->updatetnews($ma, $tieude, $noidung, $hinhanh, $tacgia, $id_danhmuc);

            if ($result === true) {
                return true;
            } else {
                // Ghi log lỗi nếu cần: file_put_contents('log.txt', $result, FILE_APPEND);
                return false;
            }
        }
        // xóa bài viết
        public function deletenewsform($ma) {
            $model = new ViewNews();
            $result = $model->deletenew($ma);
            
            if ($result) {
                return true;
            } else {
                // Nếu cần log hoặc xử lý lỗi, có thể mở rộng ở đây
                return false;
            }
        }
        // tăng lượt xem
        public function getincrease($ma) {
            $model = new ViewNews();
            $result = $model->increase($ma);
            
            if ($result) {
                return true;
            } else {
                // Nếu cần log hoặc xử lý lỗi, có thể mở rộng ở đây
                return false;
            }
        }
        // xử lý đếm bài viết theo tìm kiếm
        public function countNewsByKeyword($keyword) {
            $p = new ViewNews();
            return $p->countNewsByKeyword($keyword);
        }
        // xử lý đếm bài viết theo danh mục
        public function countNewsByDanhmuc($id_danhmuc) {
            $p = new ViewNews();
            return $p->countNewsByDanhmuc($id_danhmuc);
        }


    }
?>