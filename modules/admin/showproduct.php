<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';
?>

<?php
$sql1 = "SELECT * FROM product";
$result = $conn->query($sql1);
$count = $result->rowCount();

//Phân trang
$num_per_page = 10; //Số sản phẩm trên mỗi trang là 10
$total_row = $count; //Hiển thị tổng số sản phẩm có trong DB
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $num_per_page; //Chỉ số sản phẩm bắt đầu của mỗi trang
?>

<div class="container">
  <h1 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);">DANH SÁCH SẢN PHẨM</h1>
  <a href="?mod=admin&act=addproduct" class="btn" style="font-size:16px; background-color: rgb(47, 47, 162); color: white; margin-bottom: 20px;">Thêm sản phẩm</a>
  <div class="text-center">
    <table class="table table-bordered">
      <thead>
        <th style="font-size: 16px;">STT</th>
        <th style="font-size: 16px;">Tên sản phẩm</th>
        <th style="font-size: 16px;">Thương hiệu</th>
        <th style="font-size: 16px;">Loại sản phẩm</th>
        <th style="font-size: 16px;">Ưa chuộng</th>
        <th style="font-size: 16px;">Giá</th>
        <th style="font-size: 16px;">Hình ảnh</th>
        <th style="font-size: 16px;">Trạng thái</th>
        <th style="font-size: 16px;">Tùy chọn</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM product LIMIT {$start}, {$num_per_page}";
        $result = $conn->query($sql);
        $index = $start;
        if ($result == true) {
          while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $item) {
              $index++;
              $id = $item['id'];
              $nameProduct = $item['nameProduct'];
              $brand = $item['brand'];
              $typeProduct = $item['typeProduct'];
              $popularity = $item['popularity'];
              $price = $item['price'];
              $imgProduct = $item['imgProduct'];
              $status = $item['status'];
        ?>

              <tr>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $index ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $nameProduct ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $brand ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $typeProduct ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $popularity ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo currency_format($price) ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'>
                  <?php
                  if (!empty($imgProduct)) {
                  ?>
                    <img src="assets/imgProduct/<?php echo $imgProduct; ?>" style="width:100px;">
                  <?php
                  } else {
                    echo "<div class='text-danger mb-3 text-center'><b>Không có hình ảnh hiển thị</b></div>";
                  }
                  ?>
                </td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $status ?></td>

                <td>
                  <a href="?mod=admin&act=editproduct&id=<?php echo $id ?>" class="btn btn-success" style="font-size:120%">Chỉnh sửa</a>
                  <a href="?mod=admin&act=deleteproduct&id=<?php echo $id ?>" class="btn btn-danger" style="font-size:120%">Xóa</a>
                </td>
              </tr>
            <?php
            }
            ?>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <ul class="pagination home-product__pagination">
    <li class="pagination-item">
      <a href="" class="pagination-item__link">
        <i class="pagination-item__icon fas fa-angle-left"></i>
      </a>
    </li>

    <li class="pagination-item">
      <a href="?mod=admin&act=showproduct&page=1" class="pagination-item__link">1</a>
    </li>

    <li class="pagination-item">
      <a href="?mod=admin&act=showproduct&page=2" class="pagination-item__link">2</a>
    </li>

    <li class="pagination-item">
      <a href="?mod=admin&act=showproduct&page=3" class="pagination-item__link">3</a>
    </li>

    <li class="pagination-item">
      <a href="?mod=admin&act=showproduct&page=4" class="pagination-item__link">4</a>
    </li>

    <li class="pagination-item">
      <a href="?mod=admin&act=showproduct&page=5" class="pagination-item__link">5</a>
    </li>

    <li class="pagination-item">
      <a href="" class="pagination-item__link">
        <i class="pagination-item__icon fas fa-angle-right"></i>
      </a>
    </li>
  </ul>

</div>

<?php
require 'inc/footer.php';
?>