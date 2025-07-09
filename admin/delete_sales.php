<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getsales.php');
    $p = new Gsales();
    $ma = $_GET["id"];
    if($ma){
        $con = $p->getdeletekhuyenmai($ma);
        if($con){
            echo ' <script>alert("Xóa KM thành công")</script>';
            echo ' <script>window.location.href="salesadmin.php"</script>';
        }else{
            echo '<script>alert("Xóa KM thất bại")</script>';
        }
    }else{
        echo 'Không tồn tại mã';
    }

?>