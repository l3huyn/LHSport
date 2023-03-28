<?php 
#Hàm lấy danh sách sản phẩm đã mua
function getListBuyCart() {
  if (isset($_SESSION['cart'])) {
      return $_SESSION['cart']['buy'];
  }
  return FALSE;
}


//Hàm lấy danh sách đơn hàng đã mua
function getListBuyOrder() {
    if (isset($_SESSION['order'])) {
        return $_SESSION['order']['info'];
    }
    return FALSE;
  }


//Hàm cập nhật giỏ hàng
function update_info_cart()
{
    if (isset($_SESSION['cart'])) {
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }

        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

//Hàm lấy tổng giỏ hàng 
function get_total_cart() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}

//Hàm lấy tổng số lượng giỏ hàng 
function get_total_num() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['num_order'];
    }
    return false;
}




//Hàm cập nhật số lượng trong giỏ hàng
function update_cart($qty) {
    foreach($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
        update_info_cart();
    }
}

#Hàm lấy tổng số sản phẩm đã mua
function get_num_order_cart() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['num_order'];
    }
    return FALSE;
}


