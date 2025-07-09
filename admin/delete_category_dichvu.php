<?php
session_start();
if (!isset($_SESSION["dn"])) {
    echo ' <script>alert("Vui lòng đăng nhập")</script> ';
    echo ' <script>window.location.href="login.php"</script> ';
    exit();
}
    include_once(__DIR__ . '/../controller/getservice.php');
    $p = new Gservice();
    $ma = $_GET["id"];
    if($ma){
        $con = $p->getdeletecategorydichvu($ma);
        if($con){
            echo ' <script>alert("Xóa thành công")</script>';
            echo ' <script>window.location.href="serviceadmin.php"</script>';
        }else{
            echo '<script>alert("Xóa thất bại")</script>';
        }
    }else{
        echo 'Không tồn tại mã';
    }

?>