<?php 
function delete_cart($id)
{
    if (isset($_SESSION['cart'])) {
        #xoa sp co $id torng cart
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        } else {
            unset($_SESSION['cart']);
        }
    }
}
?>