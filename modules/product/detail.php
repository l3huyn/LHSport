<?php
get_header();
require 'config.php';
?>


<div class="grid">
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $sql = 'SELECT id from product';
    // $result = $conn->query($sql);
    // $kq = 0;
    // while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
    //   foreach ($rows as $item) {
    //     if ($id == $item['id']) {
    //       $kq = 1;
    //     }
    //   }
    // }
    // if ($kq == 0) {
    //   // header('location: main.php');
    //   die();
    // }

    $sql = "SELECT * FROM product where id ='$id'";
    $result = $conn->query($sql);
    $count = $result->rowCount();
    if ($count == 1) {
      while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
        // showArray($rows);
        foreach ($rows as $item) {
          $id = $item['id'];
          $imgProduct = $item['imgProduct'];
          $nameProduct = $item['nameProduct'];
          $brand = $item['brand'];
          $price = $item['price'];
          $infoProduct = $item['infoProduct'];
          $parameters = $item['parameters'];
          $status = $item['status'];
        ?>
          <div id="content" class="">
            <div class="section" id="info-product-wp">
              <div class="section-detail-product">
                <div class="grid__column-4 detail_product-img-container">
                  <img class="detail_product-img" src="assets/imgProduct/<?php echo $imgProduct; ?>" alt="">
                </div>

                <div class="grid__column-6 detail">
                  <h3 class="title-product"><?php echo $nameProduct ?></h3>
                  <div class='detail__desc'>
                    <p class="product-code brand" style="font-weight: 700;">Thương hiệu: <span style="color: red;"><?php echo $brand; ?></span></p>
                    <p class="product-code status" style="font-weight: 700;">Tình trạng: <span style="color: red;"><?php echo $status; ?></span></p>
                  </div>
                  <p class="price"><?php echo currency_format($price); ?></p>

                  <fieldset class="pro-discount endow">
                    <legend>
                      <img width="32" height="32" alt="Khuyến mãi" src="https://shopvnb.com/templates/images/code_dis.gif"> CHÍNH SÁCH
                    </legend>
                    <div class="product-promotions-list-content">
                      <p>✔ Sản phẩm cam kết chính hãng</p>

                      <p>✔ Thanh toán sau khi kiểm tra và nhận hàng (Giao khung vợt)</p>

                      <p>✔ Bảo hành chính hãng theo nhà sản xuất (Tối đa 90 ngày)</p>
                    </div>
                  </fieldset>

                  <div class="num-order-wp">
                    <a href="?mod=cart&act=addCart&id=<?php echo $id; ?>" title="" class="add-to-cart">Thêm giỏ hàng</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="section" id="desc-wp">
              <div class="section-head">
                <h3 class="section-title">Chi tiết sản phẩm</h3>
              </div>
              <div class="section-detail">
                <div class="inforProduct">
                  <span class="detail-product__heading">1. Thông tin vợt cầu lông</span>
                  <p class='infor-product'>
                    <?php echo $infoProduct; ?>
                  </p>
                </div>

                <div class="parameters">
                  <span class="detail-product__heading">2. Thông số kỹ thuật vợt cầu lông</span>
                  <p>
                    <?php echo $parameters; ?>
                  </p>
                </div>

              </div>
            </div>
          </div>
        <?php
        }
      }
    }
  }
  ?>
</div>

<?php
get_footer();
?>