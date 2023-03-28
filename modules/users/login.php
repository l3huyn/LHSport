<?php
require 'config.php';

if (isset($_POST['btn__submit-login'])) {

  #Log in admin
  if (isset($_POST['log-in__admin'])) {
    $error = array();
    if (empty($_POST['username'])) {
      $error['username'] = 'Không được bỏ trống tên đăng nhập';
    } else {
      $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
      $error['password'] = 'Không được bỏ trống mật khẩu';
    } else {
      $password = $_POST['password'];
    }

    if (empty($error)) {
      $sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetch();

      if ($result) {
        #Lưu trữ phiên đăng nhập
        $_SESSION['is_login'] = true;
        $_SESSION['user_login'] = $username;

        redirect("?mod=admin&act=showadmin");
      } else {
        $error['confirm'] = "Tài khoản hoặc mật khẩu không chính xác!";
      }
    }
  }

  #Log in user 
  $error = array();
  if (empty($_POST['username'])) {
    $error['username'] = 'Không được bỏ trống tên đăng nhập';
  } else {
    $username = $_POST['username'];
  }

  if (empty($_POST['password'])) {
    $error['password'] = 'Không được bỏ trống mật khẩu';
  } else {
    $password = $_POST['password'];
  }

  if (empty($error)) {
    $sql = "SELECT * FROM `Users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = $conn->query($sql);
    while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
      foreach ($rows as $item) {
        #Lưu trữ phiên đăng nhập
        $_SESSION['user']['name'] = $item['name'];
        $_SESSION['user']['username'] = $item['username'];
        $_SESSION['user']['cellphone'] = $item['cellphone'];
        $_SESSION['user']['nameImg'] = $item['imgUser'];
        $_SESSION['user']['email'] = $item['emailUser'];
        $_SESSION['user']['address'] = $item['addressUser'];
        $_SESSION['user']['desc'] = $item['descUser'];
      }
    }

    $exists = $result->rowCount();

    if ($exists == 1) {
      header('Location: /LHSport');
    } else {
      $error['confirm'] = "Tài khoản hoặc mật khẩu không chính xác!";
    }
  }
}
?>

<?php
require './inc/header.php';
?>

<div class="app__container app__container--log-in">
  <div class="grid log-in__container">
    <div class="log-in__content">
      <form class="log-in__form" action="" method="post">
        <h1 class="log-in__content-heading">
          Đăng nhập
        </h1>
        <h3>
          <?php if (!empty($error['confirm'])) echo $error['confirm'] ?>
        </h3>

        <div class="log-in__content-box">
          <i class="log-in__content-icon fa-solid fa-mobile"></i>
          <input name="username" type="text" class="log-in__content-input" placeholder="Nhập tên đăng nhập" value="<?php if (!empty($username)) echo $username; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['username'])) {
              echo $error['username'];
            }
            ?>
          </p>
        </div>

        <div class="log-in__content-box">
          <i class="log-in__content-icon fa-solid fa-lock"></i>
          <input name="password" type="password" class="log-in__content-input" placeholder="Mật khẩu" value="<?php if (!empty($password)) echo $password; ?>">
          <p style="color: red;">
            <?php
            if (!empty($error['password'])) {
              echo $error['password'];
            }
            ?>
          </p>
        </div>
        <div class="log-in__admin">
          <input type="checkbox" name='log-in__admin'>
          <span class="log-in__admin-msg">Đăng nhập đối với Admin</span>
        </div>

        <input type="submit" name="btn__submit-login" value="Đăng nhập" class="btn btn__log-in">
      </form>

      <div class="form__account--exits">
        <span class="form__account--exits__msg">Bạn chưa có tài khoản?</span>
        <a href="?mod=users&act=signup" class="account--exits__here">Đăng ký tại đây</a>
      </div>
    </div>
  </div>
</div>


<?php
require './inc/footer.php';
?>