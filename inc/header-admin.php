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

  <title>LHShop - Trang ADMIN</title>
</head>

<body>
  <div class="web">
    <div class="app">
      <header class="header">
        <!--Begin: Navigation -->
        <div class="header__nav">
          <div class="grid">
            <ul class="header__nav-list">
              <li class="header__nav-item">
                <a href="?mod=admin&act=showadmin" class="header__nav-item--link">
                  Quản lý ADMIN
                </a>
              </li>

              <li class="header__nav-item header__nav-item--product">
                <a href="?mod=admin&act=showusers" class="header__nav-item--link">
                Quản lý người dùng
                </a>
              </li>

              <li class="header__nav-item">
                <a href="?mod=admin&act=showproduct" class="header__nav-item--link">
                Quản lý sản phẩm
                </a>
              </li>

              <li class="header__nav-item">
                <a href="?mod=admin&act=showbill" class="header__nav-item--link">
                Quản lý hoá đơn
                </a>
              </li>

              <li class="header__nav-item">
                <a href="?mod=admin&act=logout_admin" class="header__nav-item--link">
                Đăng xuất
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--End: Navigation -->

      </header>