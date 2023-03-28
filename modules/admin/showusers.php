<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';
?>

<html>
<div class="container" style="height: 80vh;">
  <h1 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);;">DANH SÁCH NGƯỜI DÙNG</h1>
  <div class="text-center">
    <table class="table table-bordered">
      <thead>
        <th style="font-size: 16px;">STT</th>
        <th style="font-size: 16px;">ID</th>
        <th style="font-size: 16px;">Avatar</th>
        <th style="font-size: 16px;">Họ và tên</th>
        <th style="font-size: 16px;">Tên đăng nhập</th>
        <th style="font-size: 16px;">Mật khẩu</th>
        <th style="font-size: 16px;">Số điện thoại</th>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $index = 0;
        if ($result == true) {
          while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $item) {
              $index++;
              $id = $item['id'];
              $imgUser = $item['imgUser'];
              $name = $item['name'];
              $username = $item['username'];
              $password = $item['password'];
              $cellphone = $item['cellphone'];
        ?>
              <tr>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $index ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $id ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px; width: 100px; height: 100px;'>
                  <?php
                  if (!empty($imgUser)) {
                  ?>
                    <img src="assets/imgUser/<?php echo $imgUser; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                  <?php
                  } else {
                    echo "<div class='text-danger mb-3 text-center'><b>Không có hình ảnh hiển thị</b></div>";
                  }
                  ?>
                </td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $name ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $username ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo md5($password) ?></td>
                <td style='font-size: 16px; font-weight: 600; line-height: 36px;'><?php echo $cellphone ?></td>
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