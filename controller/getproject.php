<?php
    include_once(__DIR__ . '/../model/project.php');
    class Gproject{
        public function getallproject(){
            $p= new Mproject();
            $con = $p -> selectallProject();
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
        // Lấy 1 project 
        public function get1project($ma){
            $p= new Mproject();
            $con = $p -> select1Project($ma);
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
        // thêm 1 dự án
        public function getInsertProject($tenduan, $anhduan, $mota){
            $p= new Mproject();
            $con = $p -> InsertProject($tenduan, $anhduan, $mota);
            if($con){
                if($con){
                    return $con;
                }else{
                    return 0;
                }
            }else{
                echo "loi khuyến mãi ";
                return false;
            }
        }
        // chỉnh sửa dự án:
        // Cập nhật 1 dự án
        public function getUpdateProject($id_duan, $tenduan, $anhduan, $mota) {
            $p = new Mproject();
            $result = $p->UpdateProject($id_duan, $tenduan, $anhduan, $mota);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        // Gọi model để xóa dự án
        public function getDeleteProject($id_duan) {
            $p = new Mproject();
            return $p->DeleteProject($id_duan);
        }


    }            
?>