<?php
require './inc/header.php';
require 'config.php';
?>

<div class="app__container">
  <div class="container-fluid p-0 ">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./assets/img/banner-1.png" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
          <img src="./assets/img/banner-2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./assets/img/banner-3.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="grid">
    <div class="contaner__policy">
      <div class="container__policy-item">
        <i class="container__policy-icon fa-solid fa-truck"></i>
        <div class="container__policy-body">
          <span class="container__policy-desc">Vận chuyển
            <span>TOÀN QUỐC</span>
          </span>
          <span class="container__policy-desc">Thanh toán khi nhận hàng
          </span>
        </div>
      </div>

      <div class="container__policy-item">
        <i class="container__policy-icon fa-solid fa-thumbs-up"></i>
        <div class="container__policy-body">
          <span class="container__policy-desc">Bảo đảm chất lượng</span>
          <span class="container__policy-desc">Sản phẩm bảo đảm chất lượng</span>
        </div>
      </div>

      <div class="container__policy-item">
        <i class="container__policy-icon fa-solid fa-credit-card"></i>
        <div class="container__policy-body">
          <span class="container__policy-desc">Tiến hành
            <span>THANH TOÁN</span>
          </span>
          <span class="container__policy-desc">Với nhiều
            <span>PHƯƠNG THỨC</span>
          </span>
        </div>
      </div>

      <div class="container__policy-item">
        <i class="container__policy-icon fa-solid fa-box-open"></i>
        <div class="container__policy-body">
          <span class="container__policy-desc">Đổi sản phẩm mới
          </span>
          <span class="container__policy-desc">Nếu sản phẩm lỗi</span>
        </div>
      </div>


    </div>

    <div class="nav__home-page">
      <h2 class="nav__home-page-heading">Danh mục</h2>
      <div class="grid__row">
        <div class="grid__column-3">
          <div class="nav__home-page-item">
            <a href="?mod=product&act=category&type=racket" class="nav__home-page-item-link">
              <img src="./assets/img/1.1.png" alt="" class="nav__home-page-item-img">
            </a>
            <div class="nav__banner">
              <a href="?mod=product&act=category&type=racket" class="nav__banner-link">
                <span class="nav__banner-title">Vợt cầu lông</span>
              </a>
            </div>
          </div>
        </div>

        <div class="grid__column-3">
          <div class="nav__home-page-item">
            <a href="?mod=product&act=category&type=shoes" class="nav__home-page-item-link">
              <img src="./assets/img/2_1 (1).png" alt="" class="nav__home-page-item-img">
            </a>
            <div class="nav__banner">
              <a href="?mod=product&act=category&type=shoes" class="nav__banner-link">
                <span class="nav__banner-title">Giày cầu lông</span>
              </a>
            </div>
          </div>
        </div>

        <div class="grid__column-3">
          <div class="nav__home-page-item">
            <a href="?mod=product&act=category&type=bag" class="nav__home-page-item-link">
              <img src="./assets/img/5.png" alt="" class="nav__home-page-item-img">
            </a>
            <div class="nav__banner">
              <a href="?mod=product&act=category&type=bag" class="nav__banner-link">
                <span class="nav__banner-title">Túi vợt cầu lông</span>
              </a>
            </div>
          </div>
        </div>

        <div class="grid__column-3">
          <div class="nav__home-page-item">
            <a href="?mod=product&act=category&type=accessory" class="nav__home-page-item-link">
              <img src="./assets/img/7.png" alt="" class="nav__home-page-item-img">
            </a>
            <div class="nav__banner">
              <a href="?mod=product&act=category&type=accessory" class="nav__banner-link">
                <span class="nav__banner-title">Phụ kiện cầu lông</span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="sale-off__home-page">
      <h2 class="sale-off__home-page-heading">Sản phẩm</h2>
      <div class="grid__row sale-off__container">
        <div class="grid__column-4">
          <div class="sale-off__banner">
            <a href="" class="sale-off__banner-link">
              <img src="./assets/img/AnyConv.com__sale_off_1.png" alt="" class="sale-off__banner-img">
            </a>
          </div>
        </div>
        <div class="grid__column-4">
          <div class="sale-off__banner">
            <a href="" class="sale-off__banner-link">
              <img src="./assets/img/AnyConv.com__sale_off_2.png" alt="" class="sale-off__banner-img">
            </a>
          </div>
        </div>
        <div class="grid__column-4">
          <div class="sale-off__banner">
            <a href="" class="sale-off__banner-link">
              <img src="./assets/img/AnyConv.com__sale_off_3.png" alt="" class="sale-off__banner-img">
            </a>
          </div>
        </div>
      </div>

      <div class="grid__row sale-off__container-item">
        <?php
        $sql = "SELECT * FROM product where popularity = 'Có'";
        $result = $conn->query($sql);
        if ($result == true) {
          while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $item) {
              $id = $item['id'];
              $nameProduct = $item['nameProduct'];
              $brand = $item['brand'];
              $price = $item['price'];
              $imgProduct = $item['imgProduct'];
              $status = $item['status'];
        ?>

              <div class="grid__column-2-4 sale-off__item-product">
                <div class="home-product-item">
                  <a class="home-product-item-link" href="?mod=product&act=detail&id=<?php echo $id ?>">
                    <img class="home-product-item-img" src="assets/imgProduct/<?php echo $imgProduct; ?>" alt="">
                    <h4 class="home-product-item__name"><?php echo $nameProduct ?></h4>
                    <div class="home-product-item_desc">
                          <span class='brand-item'><?php echo $brand; ?></span>
                          <span class="home-product-item__price-current"><?php echo currency_format($price); ?></span>
                        </div>
                    <div class="home-product-item__favourite">
                      <i class="home-product-item__favourite-icon fa-solid fa-check"></i>
                      <span>Yêu thích</span>
                    </div>
                  </a>
                </div>
              </div>
            <?php
            }
            ?>
        <?php
          }
        }
        ?>

      </div>
    </div>


  </div>
</div>


<?php
require './inc/footer.php';
?>