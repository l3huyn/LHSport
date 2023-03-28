<?php
get_header();
require 'config.php';

$list_buy = getListBuyCart();
?>

<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php 
           if (!empty($list_buy)) {
        ?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">

                <form action="?mod=cart&act=update" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Thuơng hiệu</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                                <td>Thao tác</td>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="?mod=cart&act=update" method="POST">
                                <?php
                                    foreach ($list_buy as $item) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $item['brand'] ?>
                                            </td>

                                            <td>
                                                <a href="?mod=product&act=detail&id=<?php echo $item['id'] ?>" class="thumb">
                                                    <img style="width: 100%; height: 100%;" src="assets/imgProduct/<?php echo $item['imgProduct'] ?>" alt="">
                                                </a>
                                            </td>

                                            <td>
                                                <a href="?mod=product&act=detail&id=<?php echo $item['id'] ?>" class="name-product">
                                                    <?php echo $item['nameProduct']; ?>
                                                </a>
                                            </td>

                                            <td>
                                                <?php echo currency_format($item['price']); ?>
                                            </td>
                                            <td>
                                                <input type="number" name="qty[<?php echo $item['id'] ?>]" min="1" max="50" value="<?php echo $item['qty']; ?>" class="num-order">
                                            </td>
                                            <td>
                                                <?php echo currency_format($item['sub_total']) ?>
                                            </td>
                                            <td>
                                                <a href="?mod=cart&act=delete&id=<?php echo $item['id'] ?>" title="" class="del-product"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                    <div class='showCart_foot'>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <?php echo currency_format(get_total_cart()) ?> <span></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                    <input type="submit" name="btn_update_cart" id="update-cart" value="Cập nhật giỏ hàng"></input>
                                        <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </div>
                </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=product&act=main" title="" id="buy-more">Mua tiếp</a><br />
                <a href="?mod=cart&act=deleteAll" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
        <?php
        } else {
        ?>
            <p style='font-size: 2rem; text-align: center; color: red; margin-bottom: 400px'>Không có sản phẩm nào trong giỏ hàng, click <a href="?">vào đây</a> để vể trang chủ</p>
        <?php
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>