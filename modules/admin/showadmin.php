<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';
?>

<html>
<div class="container" style="height: 80vh;">
  <h1 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);;">DANH SÁCH QUẢN TRỊ VIÊN</h1>
  <a href="?mod=admin&act=addadmin" class="btn" style="margin-bottom: 20px; font-size:16px; background-color: rgb(47, 47, 162); color: white;">Thêm quản trị viên</a>
  
  <?php
  if (isset($_SESSION['deleteadmin'])) {
    echo $_SESSION['deleteadmin'];
    unset($_SESSION['deleteadmin']);
  }
  ?>

  <div class="text-center">
    <table class="table table-bordered">
      <thead>
        <th style="font-size: 16px;">STT</th>
        <th style="font-size: 16px;">Tên quản trị viên</th>
        <th style="font-size: 16px;">Username</th>
        <th style="font-size: 16px;">Mật khẩu</th>
        <th style="font-size: 16px;">Tùy chọn</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);
        $index = 0;
        if ($result == true) {
          while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $item) {
              $index++;
              $id = $item['id'];
              $name = $item['nameAdmin'];
              $username = $item['username'];
              $password = $item['password'];
        ?>
              <tr>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $index ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $name ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $username ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;  '><?php echo md5($password) ?></td>
                <td style=""><a href="?mod=admin&act=deleteadmin&id=<?php echo $id ?>" class="btn btn-danger mt-2" style="font-size:16px;">Xóa</a></td>
              </tr>

            <?php
            }
            ?>

        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</html>
<br><br>

<br>

<?php
require 'inc/footer.php';
?>