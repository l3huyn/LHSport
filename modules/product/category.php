<?php
require 'config.php';
get_header();
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


<!--Begin: Content -->
<div class="app__container">
  <div class="grid">
    <div class="grid__row app__content">
      <div class="grid__column-2">
        <nav class="category">
          <h3 class="category__heading">
            Danh mục
          </h3>

          <ul class="category-list">
            <li class="category-item">
              <a href="?mod=product&act=category&type=racket" class="category-item__link">Vợt cầu lông</a>
            </li>

            <li class="category-item">
              <a href="?mod=product&act=category&type=shoes" class="category-item__link">Giày cầu lông</a>
            </li>

            <li class="category-item">
              <a href="?mod=product&act=category&type=bag" class="category-item__link">Túi vợt cầu lông</a>
            </li>

            <li class="category-item">
              <a href="?mod=product&act=category&type=accessory" class="category-item__link">Phụ kiện cầu lông</a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="grid__column-10">
        <!-- Product -->
        <div class="home-product">
          <!-- Grid -> Row -> Column -->
          <div class="grid__row">
            <!-- Product item -->
            <?php
            if (isset($_GET['type'])) {
              $type = $_GET['type'];
              $sql = "SELECT * FROM product WHERE typeProduct = '$type' LIMIT {$start}, {$num_per_page}";
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
                }
              }
            }
            ?>

          </div>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <ul class="pagination home-product__pagination">
      <li class="pagination-item">
        <a href="" class="pagination-item__link">
          <i class="pagination-item__icon fas fa-angle-left"></i>
        </a>
      </li>

      <li class="pagination-item">
        <a href="?mod=product&act=category&type=<?php if(isset($_GET['type'])) echo $_GET['type']; ?>&page=1" class="pagination-item__link">1</a>
      </li>

      <li class="pagination-item">
        <a href="?mod=product&act=category&type=<?php if(isset($_GET['type'])) echo $_GET['type']; ?>&page=2" class="pagination-item__link">2</a>
      </li>

      <li class="pagination-item">
        <a href="?mod=product&act=category&type=<?php if(isset($_GET['type'])) echo $_GET['type']; ?>&page=3" class="pagination-item__link">3</a>
      </li>
      <li class="pagination-item">
        <a href="" class="pagination-item__link">
          <i class="pagination-item__icon fas fa-angle-right"></i>
        </a>
      </li>
    </ul>
    <?php if(isset($_GET['page'])) echo " <p style='font-weight: 600; text-align: center; font-size: 18px; color: rgb(47, 47, 162);'>Trang hiện tại là: Trang {$_GET['page']} </p>" ?>
  </div>
</div>
<!--End: Content -->

<?php
get_footer();
?>