<?php
    class xuly extends database{
        public function danhsachnhanvien($id=''){
            if($id){
                $sql="select * from nhanvien where MaNV='$id'";
            }else{
                $sql="select * from nhanvien n join loainv d on n.MaLoai=d.MaLoai";
            }
            return $this->xuatdulieu($sql);
        }

        public function themkhachhang($sql){
            return $this->dangky($sql);
        }

        public function selectchucvu($value=''){
            $str='';
            $sql="select * from loainv";
            $result=$this->xuatdulieu($sql);
            for($i=1;$i<count($result);$i++){
                if($result[$i]['MaLoai']==$value){
                    $str.= '<option selected value="'.$result[$i]['MaLoai'].'">'.$result[$i]['TenLoai'].'</option>';
                }
                else
                {
                    $str.= '<option value="'.$result[$i]['MaLoai'].'">'.$result[$i]['TenLoai'].'</option>';
                }
            }
            return $str;
        }

        public function themnhanvien($sql){
            return $this->dangky($sql);
        }

        public function xoanhanvien($id){
            $sql="delete from nhanvien where MaNV='$id'";
            return $this->xoadulieu($sql);
        }
        public function suanhanvien($sql){
            return $this->suadulieu($sql);
        }
        #########################
        public function danhsachsanpham($id='')
        {
            if($id)
                $sql="select * from sanpham where MaSP='$id'";
            else
                $sql="select * from sanpham";
            return $this->xuatdulieu($sql);
        }
        

        public function xoasanpham($id)
        {
            $sql="delete from sanpham where MaSP='$id'";
            return $this->xoadulieu($sql);
        }
        public function selectcongty($value='')
        {
            $str='';
            $sql="select * from danhmucsp";
            $arr=$this->xuatdulieu($sql);
            for($i=0;$i<count($arr);$i++)
            {
                if($arr[$i]["IDLoaiSP"]==$value)
                    $str.='<option selected value="'.$arr[$i]["IDLoaiSP"].'">'.$arr[$i]["TenLoaiSP"].'</option>';
                else
                $str.='<option value="'.$arr[$i]["IDLoaiSP"].'">'.$arr[$i]["TenLoaiSP"].'</option>';
            }
            return $str;
        }
        public function themsanpham($sql)
        {
            return $this->themdulieu($sql);
        }
        public function suasanpham($sql)
        {
            return $this->suadulieu($sql);
        }

        #########################################3

        public function danhsachkhachhang($id =''){
            if($id){
                $sql="select * from khachhang where MaKH='$id'";
            }else{
                $sql="select * from khachhang";
            }
            return $this->xuatdulieu($sql);
        }

        public function danhsachdonhang(){
            $sql="select * from dontiec";
        
            return $this->xuatdulieu($sql);
        }
        
        

    }

?>
