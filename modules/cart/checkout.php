<?php
ob_start();
get_header();
$list_buy = getListBuyCart();

require 'config.php';

$totalQty = get_total_num();
$totalPrice = get_total_cart();

if(isset($_SESSION['user']['name'])){
	$nameUser = $_SESSION['user']['name'];
} else {
  $nameUser = '';
}

?>

<?php
if (isset($_POST['checkout'])) {
  $error = array();

  if (empty($_POST['fullname'])) {
    $error['fullname'] = "Bạn hãy nhập họ và tên!";
  } else {
    $fullname = $_POST['fullname'];
  }

  if (empty($_POST['email'])) {
    $error['email'] = "Bạn hãy email!";
  } else {
    $email = $_POST['email'];
  }

  if (empty($_POST['address'])) {
    $error['address'] = "Bạn hãy địa chỉ!";
  } else {
    $address = $_POST['address'];
  }

  if (empty($_POST['tel'])) {
    $error['tel'] = "Bạn hãy số điện thoại!";
  } else {
    $tel = $_POST['tel'];
  }

  $note = $_POST['note'];

  $create_at = date('Y-m-d H:i:s');

  if (empty($error)) {
    $sql = "INSERT into bill(fullname, tel, email, address, note, totalQty, totalPrice) values('$fullname', '$tel', '$email', '$address', '$note', '$totalQty', '$totalPrice')";
    $result = $conn->exec($sql);

    if ($result == true) {
      $sql2 = "SELECT Max(idBill) as ID FROM bill";
      $result2 = $conn->query($sql2);
      while ($rows = $result2->fetchAll(PDO::FETCH_ASSOC)) {
        // print_r($rows);
        foreach ($rows as $item) {
          $idBill = $item['ID'];
        }
      }

      foreach ($_SESSION['cart']['buy'] as $item) {
        // if (isset($item['id']) && $item['id']) {
          $id = $item['id'];
          $namePro = $item['nameProduct'];
          $img_product = $item['imgProduct'];
          $quantity = $item['qty'];
          $price = $item['price'];
          $subTotal = $item['sub_total'];

          $sql3 = "INSERT into detailbill(idBill, nameUser, idProduct, name_product, img_product, quatity, price, subTotal, createAt) values('$idBill', '$nameUser', '$id', '$namePro', '$img_product', '$quantity', $price, '$subTotal', '$create_at')";
          $result3 = $conn->exec($sql3);
        // }
      }

      unset($_SESSION['cart']);

      redirect("?mod=cart&act=order");
    }
  }
}
?>


<div id="main-content-wp" class="checkout-page ">
  <div class="wp-inner clearfix">
    <div class="grid">
      <div id="content" class="fl-right">
        <div class="section" id="checkout-wp">
          <div class="section-head">
            <h3 class="section-title checkout-title">Thanh toán</h3>
          </div>
          <div class="section-detail">
            <div class="wrap clearfix">

              <form class="main-checkout" method="POST">
                <div id="custom-info-wp" class="fl-left">
                  <h3 class="title">Thông tin khách hàng</h3>
                  <div class="detail">
                    <div class="field-wp">
                      <label>Họ tên</label>
                      <input style="font-size: 16px; padding: 5px;" value="<?php if(!empty($_SESSION['user']['name'])) echo $_SESSION['user']['name']; ?>" style="padding: 10px 0;" type="text" name="fullname" id="fullname">
                      <p class="text-danger" style="font-size: 16px;"><?php if (!empty($error)) echo $error['fullname'] ?></p>
                    </div>
                    <div class="field-wp">
                      <label>Email</label>
                      <input style="font-size: 16px; padding: 5px;" style="padding: 10px 0;" type="email" name="email" id="email" value="<?php if(!empty($_SESSION['user']['email'])) echo $_SESSION['user']['email']; ?>">
                      <p class="text-danger" style="font-size: 16px;"><?php if (!empty($error)) echo $error['email'] ?></p>
                    </div>
                    <div class="field-wp">
                      <label>Địa chỉ nhận hàng</label>
                      <input style="font-size: 16px; padding: 5px;" style="padding: 10px 0;" type="text" name="address" id="address" value="<?php if(!empty($_SESSION['user']['address'])) echo $_SESSION['user']['address']; ?>">
                      <p class="text-danger" style="font-size: 16px;"><?php if (!empty($error)) echo $error['address'] ?></p>
                    </div>
                    <div class="field-wp">
                      <label>Số điện thoại</label>
                      <input style="font-size: 16px; padding: 5px;" value="<?php if(!empty($_SESSION['user']['cellphone'])) echo $_SESSION['user']['cellphone']; ?>" style="padding: 10px 0;" type="tel" name="tel" id="tel">
                      <p class="text-danger" style="font-size: 16px;"><?php if (!empty($error)) echo $error['tel'] ?></p>
                    </div>
                    <div class="field-full-wp">
                      <label>Ghi chú</label>
                      <textarea style="font-size: 16px; padding: 5px;" name="note"></textarea>
                    </div>
                  </div>
                </div>

                <div id="order-review-wp" class="fl-right">
                  <h3 class="title">Thông tin đơn hàng</h3>
                  <div class="detail">
                    <table class="shop-table">
                      <thead>
                        <tr>
                          <td style="font-size: 16px; font-weight: 600;">Sản phẩm</td>
                          <td style="font-size: 16px; font-weight: 600;">Tổng</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($list_buy as $item) {
                        ?>
                          <tr class="cart-item">
                            <td style="font-size: 15px; color: #F64C72" class="product-name"><?php echo $item['nameProduct'] ?><strong style="font-size: 16px;" class="product-quantity">x <?php echo $item['qty'] ?></strong></td>
                            <td style="font-size: 16px; font-weight: 600;" class="product-total"><?php echo currency_format($item['sub_total']) ?></td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr class="order-total">
                          <td>Tổng đơn hàng:</td>
                          <td><strong class="total-price"><?php echo currency_format(get_total_cart()) ?></strong></td>
                        </tr>
                      </tfoot>
                    </table>
                    <div id="payment-checkout-wp">
                      <ul style="list-style: none ;" id="payment_methods">
                        <li>
                          <input checked type="radio" id="payment-cod" name="payment-method" value="payment-home">
                          <label for="payment-cod">Thanh toán COD</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="place-order-wp clearfix">
                    <input style="font-size: 16px;" value="Đặt hàng" type="submit" name="checkout"></input>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
get_footer();
?>