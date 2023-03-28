<?php
require 'config.php';
?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = 'SELECT id from product';
  $result = $conn->query($sql);
  $kq = 0;
  while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
    foreach ($rows as $item) {
      if ($id == $item['id']) {
        $kq = 1;
      }
    }
  }
  if ($kq == 0) {
    die();
  }

  $sql = "SELECT * FROM product where id =$id";
  $result = $conn->query($sql);
  $count = $result->rowCount();
  $qty = 1;

  if ($count == 1) {
    while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
      foreach ($rows as $item) {
        if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
          $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }
        $_SESSION['cart']['buy'][$id] = array(
          'id' => $item['id'],
          'imgProduct' => $item['imgProduct'],
          'nameProduct' => $item['nameProduct'],
          'brand' => $item['brand'],
          'price' => $item['price'],
          'qty' => $qty,
          'sub_total' => $item['price'] * $qty
        );
        update_info_cart();
      }
    }
  }
  redirect("?mod=cart&act=show");
}

?>