<?php
    class clsketnoi{
        public function moketnoi(){
            $con = mysqli_connect("localhost", "root", "", "emc2");
            $con->set_charset("utf8");
            return $con;
        }
    }
?>