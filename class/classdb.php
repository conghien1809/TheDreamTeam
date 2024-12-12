<?php
    class database{

        private function ketnoi(){
            $conn=new mysqli("localhost","root","","thedreamteam");
            if($conn->connect_error){
                echo "Kết nối thất bại!";
                exit();
            }
            else{
                return $conn;
            }
        }
        //Lê Quang Khoa
        public function xuatdulieu($sql){
            $link=$this->ketnoi();
            $arr=array();
            $result=$link->query($sql);
            if($result->num_rows){
                while($row=$result->fetch_assoc())
                $arr[]=$row;
            return $arr;
            }
            else{
                return 0;
            }
        }

        public function dangky($sql){
            $link=$this->ketnoi();
            if($link->query($sql)){
                return 1;
            }
            else{
                return 0;
            }
        }
        public function dangnhap($tk, $mk, $loai = null) {
            $link = $this->ketnoi();
            if ($loai === null) {
                $sql = "select MaKH from khachhang where Username='$tk' and Password='$mk'";
            } elseif ($loai === 1) {
                $sql = "select MaNV from nhanvien where Username='$tk' and Password='$mk' and MaLoai=1";
            } elseif ($loai === 2) {
                $sql = "select MaNV from nhanvien where Username='$tk' and Password='$mk' and MaLoai=2";
            } elseif ($loai === 3) {
                $sql = "select MaNV from nhanvien where Username='$tk' and Password='$mk' and MaLoai=3";
            } else {
                return 0;
            }
        
            $result = $link->query($sql);
            if ($result->num_rows) {
                $row = $result->fetch_assoc();
                return reset($row); // Trả về giá trị cột đầu tiên
            }
            return 0;
        }
        

        public function xoadulieu($sql){
            $link=$this->ketnoi();
            if($link->query($sql)){
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function themdulieu($sql){
            $link=$this->ketnoi();
            if($link->query($sql)){
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function suadulieu($sql){
            $link=$this->ketnoi();
            if($link->query($sql)){
                return 1;
            }
            else{
                return 0;
            }
        } 

        // Dương Đức Quý
        public function laydulieu($sql)
        {
            $arr = array();
            $link = $this->ketnoi();
            $result = $link->query($sql);
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    $arr[] = $row;
                }
            }
            return $arr; 
        }

        public function themCa($thu, $tenca, $thoigian)
    {
        $link = $this->ketnoi();
        $sql = "INSERT INTO calam(thu,tenCa,thoigian) VALUES('$thu','$tenca','$thoigian');";
        $result = $link->query($sql);
        if ($result) {
            echo"<script>alert('Thêm ca thành công.')</script>";
        }
        return $result;
    }
    public function xoaCa($id){
        $link = $this->ketnoi();
        $sql = "delete from calam where maCa = '$id'";
        $result = $link->query($sql);
        
        return $result;
    }
    //

    }

?>

