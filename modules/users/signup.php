<?php
require 'config.php';

if (isset($_POST['btn__submit'])) {
  $error = array();

  if (empty($_POST['name'])) {
    $error['name'] = 'Không được bỏ trống tên';
  } else {
    if (strlen($_POST['name']) < 5) {
      $error['name'] = 'Họ tên ít nhất 5 kí tự';
    } else
      $name = $_POST['name'];
  }

  if (empty($_POST['username'])) {
    $error['username'] = 'Không được bỏ trống tên đăng nhập';
  } else {
    if (!preg_match('/^[A-Za-z0-9_\.]{6,32}$/', $_POST['username'])) {
      $error['username'] = 'Tên đăng nhập không hợp lệ';
    } else
      $username = $_POST['username'];
  }

  if (empty($_POST['cellphone'])) {
    $error['cellphone'] = "Không được bỏ trống số điện thoại";
  } else {
    $cellphone = $_POST['cellphone'];
  }

  if (empty($_POST['password'])) {
    $error['password'] = 'Không được bỏ trống mật khẩu';
  } else {
    if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 20) {
      $error['password'] = 'Mật khẩu phải ít nhất 8 kí tự và nhiều nhất 20 kí tự';
    } else
      $password = $_POST['password'];
  }

  if (empty($_POST['confirm-password'])) {
    $error['confirm-password'] = 'Không được bỏ trống mật khẩu';
  } else {
    if ($_POST['password'] != $_POST['confirm-password']) {
      $error['confirm-password'] = 'Mật khẩu nhập lại không đúng';
    } else
      $confirmPw = $_POST['confirm-password'];
  }


  if (empty($error)) {
    $sql = "INSERT INTO Users (name, username, cellphone, password)
    VALUES ('$name', '$username', '$cellphone' , '$password')";
    $result = $conn->exec($sql);

    if($result == true){
      $message = "Đăng kí tài khoản thành công, vui lòng đăng nhập đê vào hệ thống!";
      echo "<script>alert('$message')</script>";
      $name = '';
      $username = '';
      $cellphone = '';
      $password = '';
    } 
  }
}
?>

<?php
require './inc/header.php';
?>

<div class="app__container app__container--sign-up">
  <div class="grid sign-up__container">
    <div class="sign-up__content">
      <form class="sign-up__form" action="" method="post">
        <h1 class="sign-up__content-heading">Đăng ký tài khoản</h1>
        <h3 class="sign-up__success">
          <?php
          if (!empty($success)) {
            echo $success;
          }
          ?>

        </h3>
        <div class="sign-up__content-box">
          <i class="sign-up__content-icon fa-solid fa-user"></i>
          <input name="name" type="text" class="sign-up__content-input" placeholder="Nhập tên của bạn" value="<?php if (!empty($name)) echo $name; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['name'])) {
              echo $error['name'];
            }
            ?>
          </p>
        </div>

        <div class="sign-up__content-box">
          <i class="sign-up__content-icon fa-solid fa-user"></i>
          <input name="username" type="text" class="sign-up__content-input" placeholder="Tên đăng nhập" value="<?php if (!empty($username)) echo $username; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['username'])) {
              echo $error['username'];
            }
            ?>
          </p>
        </div>

        <div class="sign-up__content-box">
          <i class="sign-up__content-icon fa-solid fa-phone"></i>
          <input name="cellphone" type="text" class="sign-up__content-input" placeholder="Số điện thoại" value="<?php if (!empty($cellphone)) echo $cellphone; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['cellphone'])) {
              echo $error['cellphone'];
            }
            ?>
          </p>
        </div>

        <div class="sign-up__content-box">
          <i class="sign-up__content-icon fa-solid fa-lock"></i>
          <input name="password" type="password" class="sign-up__content-input" placeholder="Mật khẩu" value="<?php if (!empty($password)) echo $password; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['password'])) {
              echo $error['password'];
            }
            ?>
          </p>
        </div>

        <div class="sign-up__content-box">
          <i class="sign-up__content-icon fa-solid fa-lock"></i>
          <input name="confirm-password" type="password" class="sign-up__content-input" placeholder="Nhập lại mật khẩu" value="<?php if (!empty($confirmPw)) echo $confirmPw; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['confirm-password'])) {
              echo $error['confirm-password'];
            }
            ?>
          </p>
        </div>

        <input name="btn__submit" class="btn btn__sign-up" type="submit" value="Đăng ký">
      </form>

      <div class="form__account--exits">
        <span class="form__account--exits__msg">Bạn đã có tài khoản?</span>
        <a href="?mod=users&act=login" class="account--exits__here">Đăng nhập tại đây</a>
      </div>

      <div class="form__separate">
        <span class="form__separate-msg">Hoặc</span>
      </div>

      <div class="btn__continue">
        <button class="btn__continue-with btn__continue-with-facebook">
          <i class="btn__continue-icon fa-brands fa-facebook"></i>
          <span class="btn__continue-msg">Tiếp tục với Facebook</span>
        </button>

        <button class="btn__continue-with btn__continue-with-google">
          <img src="./assets/img/Google__G__Logo.svg.png" alt="" class="btn__continue-with-gg-img">
          <span class="btn__continue-msg">Tiếp tục với Google</span>
        </button>
      </div>

    </div>
  </div>
</div>


<?php
require './inc/footer.php';
?>