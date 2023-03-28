<?php
require "../../config.php";
?>

<?php
require '../../inc/header-search.php';
require '../../lib/number.php';
?>

<?php 
$sql1 = "SELECT * FROM product";
$result = $conn->query($sql1);
$count = $result->rowCount();

//Phân trang
$num_per_page = 10; //Số sản phẩm trên mỗi trang là 10
$total_row = $count; //Hiển thị tổng số sản phẩm có trong DB
$page = isset($_GET['page'])?(int)$_GET['page']:1; 
$start = ($page - 1)*$num_per_page; //Chỉ số sản phẩm bắt đầu của mỗi trang
?>

<div class="pb-5 app__container">
  <div class="grid">
        <h2 class="text-center mb-4" style="padding-top: 24px ;font-size: 22px;">Kết quả cho <a href="#" style="color: #ff4d4d;"><?php echo $_GET['search']; ?></a></h2>
        <div class="grid__full-width">
          <!-- Product -->
          <div class="home-product">
            <!-- Grid -> Row -> Column -->
            <div class="grid__row">
              <!-- Product item -->
              <?php
              if (isset($_GET['search'])) {
                $s = $_GET['search'];
                $sql = "SELECT * FROM `product` WHERE nameProduct like '%" . $s . "%' AND status = 'Còn hàng' LIMIT {$start}, {$num_per_page}";
              }
              $result = $conn->query($sql);
              $index = 0;
              if ($result == true) {
                while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                  foreach ($rows as $item) {
                    $id = $item['id'];
                    $nameProduct = $item['nameProduct'];
                    $brand = $item['brand'];
                    $infoProduct = $item['infoProduct'];
                    $parameters = $item['parameters'];
                    $price = $item['price'];
                    $imgProduct = $item['imgProduct'];
                    $status = $item['status'];
              ?>
                    <div class="grid__column-2-4">
                      <div class="home-product-item">
                        <a class="home-product-item-link" href="http://localhost/LHSport/?mod=product&act=detail&id=<?php echo $id ?>">
                          <img class="home-product-item-img" src="../../assets/imgProduct/<?php echo $imgProduct; ?>" alt="">
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
                }
              }
              ?>

            </div>
          </div>
    </div>
  </div>
</div>

<?php
require '../../inc/footer-search.php';
?>