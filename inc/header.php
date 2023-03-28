<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400, 500, 700&display=swap&subset=vietnamese" rel="stylesheet">
  <link rel="stylesheet" href="assets/fonts/fontawesome-free-6.2.0/css/all.min.css">

  <title>LHShop</title>
</head>

<body>
  <div class="web">
    <div class="app">
      <header class="header">
        <div class="grid">
          <!--Begin: Header Box -->
          <div class="header__box">
            <div class="header__box-logo">
              <img src="assets/img/badminton_logo_by_asphire_d27yxxp-fullview.jpg" alt="" class="header__box-logo-img">
            </div>

            <div class="header__box-contact">
              <i class="fa-sharp fa-solid fa-phone"></i>
              <span class="header__box-contact-hotline">Hotline:</span>
              <a href="tel:0857272139" class="header__box-contact-number">0857272139</a>
            </div>

            <div class="header__box-address">
              <i class="header__box-address-icon fa-solid fa-map-location-dot"></i>
              <span class="header__box-address-info">
                <a href="" class="header__box-address-info--link">
                  Hệ thống cửa hàng
                </a>
              </span>
            </div>

            <ul class="header__box-list">

              <li class="header__box-item header__box-item-no-cart">
                <a href="?mod=cart&act=show" class="header__box-item-link">
                  <i class="header__box-item-link-icon fa-solid fa-cart-shopping">
                  </i>
                  <span class="header__box-item-link--detail">Giỏ hàng</span>
                </a>
              </li>

              <li class="header__box-item header__box-item-no-cart">
                <a href="?mod=cart&act=order" class="header__box-item-link">
                  <i class="header__box-item-link-icon fa-solid fa-file-invoice-dollar"></i>
                  <span class="header__box-item-link--detail">Đơn hàng</span>
                </a>
              </li>

              <li class="header__box-item header__box-item--account">
                <a href="" class="header__box-item-link account_in_header">
                  <i class="header__box-item-link-icon fa-solid fa-user"></i>
                  <span class="header__box-item-link--detail">Tài khoản</span>
                </a>

                <!-- Begin: Sign up - Log in -->
                <div class="header__box-item-user">
                  <a href="?mod=users&act=signup" class="header__box-item-user-account">
                    <i class="header__box-item-user-account-icon fa-solid fa-arrow-right-to-bracket"></i>
                    <span class="header__box-item-user--desc">Đăng ký</span>
                  </a>

                  <a href="?mod=users&act=login" class="header__box-item-user-account">
                    <i class="header__box-item-user-account-icon fa-solid fa-user-plus"></i>
                    <span class="header__box-item-user--desc">Đăng nhập</span>
                  </a>
                </div>
                <!-- End: Sign up - Log in -->
              </li>

              <li>
                <a href="?mod=users&act=profile">
                  <?php
                  if (isset($_SESSION['user']['name']) && $_SESSION['user']['username'] != 'admin') {
                    echo "<span class='user_login'>{$_SESSION['user']['name']}</span>" . "<a href='?mod=users&act=logout' class='user_logout'>(Thoát)</a>";
                  }
                  ?>
                </a>
              </li>

            </ul>
          </div>
          <!--End: Header Box -->
        </div>


        <!--Begin: Navigation -->
        <div class="header__nav">
          <div class="grid">
            <ul class="header__nav-list">
              <li class="header__nav-item">
                <a href="?mod=home&act=main" class="header__nav-item--link">
                  Trang chủ
                </a>
              </li>

              <li class="header__nav-item header__nav-item--product">
                <a href="?mod=product&act=main" class="header__nav-item--link">
                  Sản phẩm
                </a>
              </li>

              <li class="header__nav-item">
                <a href="?mod=pages&act=introduce" class="header__nav-item--link">
                  Giới thiệu
                </a>
              </li>

              <li class="header__nav-item">
                <a href="?mod=pages&act=contact" class="header__nav-item--link">
                  Liên hệ
                </a>
              </li>

              <li class="header__nav-item header__nav-item--search">
                <form class="header__nav-item-form" action="../modules/product/searchProduct.php" method="GET">
                  <input type="text" name="search" class="header__nav-item--search-input" placeholder="Sản phẩm cần tìm?">
                  <input type="submit" value="Tìm kiếm" class="header__nav-item--search-btn">
                </form>
              </li>
            </ul>
          </div>
        </div>
        <!--End: Navigation -->

      </header>