<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';
?>

<html>
<div class="container" style="padding-bottom: 100px;">
  <h1 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);;">DANH SÁCH HÓA ĐƠN</h1>
  <div class="text-center">
    <table class="table table-bordered">
      <thead>
        <th style="font-size: 16px;">ID Hóa Đơn</th>
        <th style="font-size: 16px;">Tên khách hàng đã mua</th>
        <th style="font-size: 16px;">Số điện thoại</th>
        <th style="font-size: 16px;">Địa chỉ</th>
        <th style="font-size: 16px;">Tổng tiền thanh toán</th>
        <th style="font-size: 16px;">Trạng thái đơn hàng</th>
        <th style="font-size: 16px;">Tùy chọn</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM bill";
        $result = $conn->query($sql);
        while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
          foreach ($rows as $item) {
        ?>
            <tr>
              <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['idBill']; ?></td>
              <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['fullname']; ?></td>
              <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['tel']; ?> </td>
              <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['address']; ?></td>
              <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo number_format($item['totalPrice']).'đ'; ?></td>
              <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['statusBill']; ?></td>
              <td>
                <a href="?mod=admin&act=updatebill&idBill=<?php echo $item['idBill'] ?>" class="btn btn-success" style="font-size:120%">Cập nhật</a>
              </td>
            </tr>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </tbody>
    </table>

    <div class='bill_separate'>
    </div>

    <table class="table table-bordered">
      <thead>
        <th style="font-size: 16px;">ID Hóa Đơn</th>
        <th style="font-size: 16px;">Tên sản phẩm</th>
        <th style="font-size: 16px;">Số lượng</th>
        <th style="font-size: 16px;">Thành tiền</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT idBill as ID FROM bill";
        $result = $conn->query($sql);
        while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
          foreach ($rows as $item) {
            $idBill = $item['ID'];
            $sql1 = "SELECT * FROM detailbill WHERE idBill = $idBill";
            $res = $conn->query($sql1);
            while ($rows1 = $res->fetchAll(PDO::FETCH_ASSOC)) {
              foreach($rows1 as $item){
        ?>
              <tr>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['idBill']; ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['name_product']; ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo $item['quatity']; ?> </td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'> <?php echo number_format($item['subTotal']).'đ'; ?></td>
              </tr>

            <?php
              }
            }
            ?>

        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</html>
<br><br><br>

<?php
require 'inc/footer.php';
?>