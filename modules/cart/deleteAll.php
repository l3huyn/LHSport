<?php
require 'config.php';
?>

<?php
if (isset($_SESSION['cart'])) {
    if (!empty($id)) {
      unset($_SESSION['cart']['buy'][$id]);
    } else {
      unset($_SESSION['cart']);
    }
} redirect("?mod=cart&act=show");
?>