<?php
    include_once(__DIR__ . '/../model/ketnoi.php');
    class Mproject{
        // Lấy full dự án
        public function selectallProject(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM duan order by id_duan desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        // Lấy 1 dự án
        public function select1Project($ma){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="SELECT * FROM duan where id_duan = $ma order by id_duan desc";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }

        // Thêm 1 dự án
        public function InsertProject($tenduan, $anhduan, $mota){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($con){
                $str ="INSERT INTO duan( tenduan, anhduan, mota )
                Values('$tenduan', '$anhduan', '$mota') ";
                $tbl = $con->query($str);
                return $tbl;
            }else{
                echo "Lỗi kết nối";
                return false;
            }
        }
        //chỉnh sửa dự án:
        // Cập nhật 1 dự án
        public function UpdateProject($id_duan, $tenduan, $anhduan, $mota) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                // Nếu có ảnh thì cập nhật tất cả
                if (!empty($anhduan)) {
                    $sql = "UPDATE duan SET tenduan = ?, anhduan = ?, mota = ? WHERE id_duan = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("sssi", $tenduan, $anhduan, $mota, $id_duan);
                } else {
                    // Nếu không có ảnh mới, giữ nguyên ảnh cũ
                    $sql = "UPDATE duan SET tenduan = ?, mota = ? WHERE id_duan = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("ssi", $tenduan, $mota, $id_duan);
                }

                $kq = $stmt->execute();
                $stmt->close();
                return $kq;
            } else {
                echo "Lỗi kết nối CSDL!";
                return false;
            }
        }
        // Xóa dự án
        // Xóa 1 dự án
        public function DeleteProject($id_duan) {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if ($con) {
                // Trước tiên lấy ảnh cũ để xóa khỏi ổ đĩa (nếu muốn)
                $sql_select = "SELECT anhduan FROM duan WHERE id_duan = ?";
                $stmt_select = $con->prepare($sql_select);
                $stmt_select->bind_param("i", $id_duan);
                $stmt_select->execute();
                $result = $stmt_select->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $anhduan = $row['anhduan'];
                    $stmt_select->close();

                    // Xóa bản ghi
                    $sql_delete = "DELETE FROM duan WHERE id_duan = ?";
                    $stmt_delete = $con->prepare($sql_delete);
                    $stmt_delete->bind_param("i", $id_duan);
                    $success = $stmt_delete->execute();
                    $stmt_delete->close();

                    // Nếu thành công, xóa ảnh vật lý nếu có
                    if ($success && !empty($anhduan)) {
                        $img_path = "../assets/images/" . $anhduan;
                        if (file_exists($img_path)) {
                            unlink($img_path);
                        }
                    }

                    return $success;
                } else {
                    return false; // Không tìm thấy dự án
                }
            } else {
                echo "Lỗi kết nối CSDL!";
                return false;
            }
        }


    }


?>