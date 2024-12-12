<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/carousel.css" />
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/dichvu.css">
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/dangky.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <div class="header-top">
        <ul>
          <?php
                if($_SESSION['dangnhap'] || $_SESSION['dangnhapql'] || $_SESSION['dangnhapnv'] || $_SESSION['dangnhapbep']){
                  echo '<div style="color: #efefef; line-height: 50px; padding-right: 10px;"> <b>Chào, </b>'. $_SESSION['username'].'</div>';
                  if($_SESSION['dangnhapnv']){
                    echo '<div style="color: #efefef; line-height: 50px; padding-right: 10px;"> 
                     <a href="index.php?page=xemca"><i class="fa fa-user-circle text-white" style="font-size: 24px; margin-left: 10px;"></i>
                  </a></div>';
          } 
          elseif ($_SESSION['dangnhapbep']) {
            echo '<div style="color: #efefef; line-height: 50px; padding-right: 10px;"> 
                    <a href="index.php?page=xemdon">
                        <i class="fa fa-file-alt text-white" style="font-size: 20px; margin-left: 10px; margin-top: 15px;"></i>
                    </a>
                      </div>';
                   }                  
                                   
                  echo '<li><a class="dang-ky" href="index.php?page=dangxuat">Đăng xuất</a></li>';
                }
                   else{
                    echo '<li><a class="dang-nhap" href="index.php?page=dangnhap">Đăng nhập</a></li>';
                    echo '<li><a class="dang-ky" href="index.php?page=dangky">Đăng ký</a></li>';
                   }
                   
                ?>    
        </ul>
      </div>
      <div class="inner-wrap">
        <div class="inner-logo">
          <a href="#">
            <img src="assets/images/logoct.png" alt="Logo" />
          </a>
        </div>
        <div class="inner-menu">
          <ul>
            <li><a href="index.php?page=trangchu">TRANG CHỦ</a></li>
            <li><a href="index.php?page=sanpham">SẢN PHẨM</a></li>
            <li><a href="index.php?page=dichvu">DỊCH VỤ</a></li>
            <li><a href="index.php?page=gioithieu">GIỚI THIỆU</a></li>
            <li><a href="index.php?page=blog">BLOG</a></li>
            <li><a href="index.php?page=nhahang">NHÀ HÀNG</a></li>
            <?php
            if($_SESSION['dangnhapql']){
              echo '<li><a href="index.php?page=quanly">QUẢN LÝ</a></li>';
            }
            ?>
          </ul>
          </ul>
        </div>
        <div class="inner-cart">
          <a href="index.php?page=giohang"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
    </header>
    <!-- End Header -->