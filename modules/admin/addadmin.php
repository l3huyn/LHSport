<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';

if (isset($_POST['btn_save'])) {
    $erros = array();
    if (empty($_POST['username'])) {
        $error['username'] = 'Không được bỏ trống tên đăng nhập quản trị viên';
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST['fullname'])) {
        $error['fullname'] = 'Không được bỏ trống họ và tên quản trị viên';
    } else {
        $fullname = $_POST['fullname'];
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Không được bỏ trống mật khẩu admin';
    } else {
        $password = $_POST['password'];
    }

    #Kiểm tra username admin có tồn tại không
    $sql = "SELECT * FROM admin where username = '$username'";
    $result = $conn->query($sql);
    $exists = $result->rowCount();
    if($exists > 0){
        $error['username'] = "<div class='text-danger mb-3 text-center'><b>Tên đăng nhập ADMIN đã tồn tại! Xin vui lòng nhập lại tên đăng nhập khác</b></div>";
    }

    if (empty($error)) {
        $sql = "INSERT into admin(nameAdmin, username, password) values('$fullname', '$username', '$password')";
        $result = $conn->exec($sql);
        if ($result == true) {
            redirect("?mod=admin&act=showadmin");
        }
    } else {
        $_SESSION['addadmin'] = "<div class='text-danger mb-3 text-center'><b>Thêm admin không thành công</b></div>";
    }
}

?>
<br> <br>
<div class="container" style="height: 400px;">
    <a href="?mod=admin&act=showadmin" class="btn add_admin">
        < Quay lại</a>
            <h1 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);;">THÊM QUẢN TRỊ VIÊN</h1>
            <?php
            if (isset($_SESSION['addadmin'])) {
                echo $_SESSION['addadmin'];
                unset($_SESSION['addadmin']);
            }
            ?>
            <form method="POST">
                <div class="row mt-4 mb-5">
                    <label for="email" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Username</strong></label>
                    <div class="col-sm-9">
                        <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control" id="username" placeholder="Điền username" name="username">
                        <?php
                        if (isset($error['username'])) {
                            echo $error['username'];
                        }
                        ?>
                    </div>
                </div>

                <div class="row mt-4 mb-5">
                    <label for="fullname" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Fullname</strong></label>
                    <div class="col-sm-9">
                        <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control" id="fullname" placeholder="Điền fullname" name="fullname">
                        <?php
                        if (isset($error['fullname'])) {
                            echo $error['fullname'];
                        }
                        ?>
                    </div>
                </div>

                <div class="row mb-5">
                    <label for="password" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Mật khẩu</strong></label>
                    <div class="col-sm-9">
                        <input style='padding: 16px 4px; font-size: 14px' type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                        <?php
                        if (isset($error['password'])) {
                            echo $error['password'];
                        }
                        ?>
                    </div>
                </div>
                <input type="submit" value="Lưu" class="btn offset-sm-2" name="btn_save" style="height: 45px; background-color: rgb(47, 47, 162); font-family: 'Nunito', sans-serif; font-weight: bold;"></input>
            </form>
</div>

<?php
require 'inc/footer.php';
?>