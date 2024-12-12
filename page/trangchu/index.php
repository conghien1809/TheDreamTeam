<?php
$db = new database();
$sql = "SELECT * FROM sanpham";
$products = $db->xuatdulieu($sql);
?>
<section>
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/images/banner1.png" alt="" width="1400" height="700" />
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner2.jpg" alt="" width="1400" height="700" />
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner3.jpg" alt="" width="1400" height="700" />
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>

  <!-- Sản phẩm -->
  <div class="text-center pt-4">
    <h2><strong>ĂN UỐNG THẢ GA</strong></h2>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
        <ol class="carousel-indicators">
          <!-- Thêm các indicator động dựa trên số lượng slide -->
          <?php 
          $totalSlides = ceil(count($products) / 4);
          for ($i = 0; $i < $totalSlides; $i++) {
            echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="' . ($i == 0 ? 'active' : '') . '"></li>';
          }
          ?>
        </ol>
        <div class="carousel-inner">
          <!-- Lặp qua sản phẩm và nhóm chúng thành 4 sản phẩm mỗi slide -->
          <?php 
          $chunkedProducts = array_chunk($products, 4); // Chia sản phẩm thành các nhóm 4
          foreach ($chunkedProducts as $index => $productChunk) { ?>
            <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
              <div class="row">
                <?php foreach ($productChunk as $product) { ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                      <div class="img-box">
                        <img src="assets/images/<?php echo $product['img']; ?>" class="img-fluid" alt="" />
                      </div>
                      <div class="thumb-content">
                        <h4><?php echo $product['TenSP']; ?></h4>
                        <p class="item-price"><span><?php echo number_format($product['dongia'], 0, ',', '.'); ?> VND</span></p>
                        <div class="star-rating text-warning">
                          <ul class="list-inline">
                            <?php for ($j = 0; $j < 5; $j++) { ?>
                              <li class="list-inline-item">
                                <i class="fa fa-star"></i>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                        <a href="index.php?page=chitietsanpham&cate=<?php echo $product['MaSP']; ?>" class="btn btn-primary">Xem thêm</a>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="text-center">
        <h2><strong>ĐÔI NÉT VỀ THE DREAM</strong></h2>
      </div>
      <div class="row bg-light mt-3">
        <div class="col-6 p-5">
          <img src="assets/images/doinet.jpg" width="600" alt="" />
        </div>
        <div class="col-6 p-5 mt-5">
          <p class="pt-4">
            The Dream là chuỗi cửa hàng thức ăn nhanh nổi bật với sứ mệnh mang
            đến cho khách hàng những trải nghiệm ẩm thực hiện đại, tiện lợi và
            đầy hứng khởi. Tại The Dream, chúng tôi không chỉ phục vụ các món ăn
            nhanh ngon miệng, được chế biến từ nguyên liệu tươi ngon và đảm bảo
            an toàn, mà còn cam kết mang lại dịch vụ thân thiện và không gian
            thoải mái cho từng thực khách. Với tầm nhìn trở thành điểm đến yêu
            thích cho mọi bữa ăn, The Dream luôn đổi mới và sáng tạo để phục vụ
            thực khách những trải nghiệm ẩm thực tuyệt vời nhất.
          </p>
          <input
            class="btn btn-primary"
            type="submit"
            value="Tìm hiểu ngay!"
            style="margin-left: 200px"
          />
        </div>
      </div>
      <div class="text-center pt-5">
        <h2><strong>TIN TỨC</strong></h2>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="mt-3 p-4">
            <div class="card" style="width: 100%">
              <img
                class="card-img-top"
                src="assets/images/tintuc.jpg"
                alt=""
                style="width: 100%"
              />
              <div class="card-body text-center">
                <h4 class="card-title">KHAI CHƯƠNG THE DREAM</h4>
                <p class="card-text">
                  The Dream chính thức khai trương, mang đến trải nghiệm ẩm thực
                  nhanh đầy sáng tạo cho thực khách. Với không gian hiện đại và
                  thực đơn phong phú, The Dream hứa hẹn trở thành điểm đến yêu
                  thích cho mọi bữa ăn tiện lợi. Hãy đến và trải nghiệm!
                </p>
                <a href="" class="btn btn-primary">Xem thêm</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="mt-3 p-4">
            <div class="card" style="width: 100%">
              <img
                class="card-img-top"
                src="assets/images/tintuc2.jpg"
                alt=""
                style="width: 100%"
              />
              <div class="card-body text-center">
                <h4 class="card-title">THE DREAM có gì hot?</h4>
                <p class="card-text">
                  The Dream là cửa hàng chuyên cung cấp thức ăn nhanh, đảm bảo
                  an toàn cho người tiêu dùng về chất lượng. Với nhiều món ăn đa
                  dạng và các nhân viên được đào tạo có kinh nghiệm sẽ không làm
                  bạn thất vọng trong việc thưởng thức. Hãy đến đây và trải
                  nghiệm!!!
                </p>
                <a href="" class="btn btn-primary">Xem thêm</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
