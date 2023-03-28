<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';
?>

<?php
$idBill = $_GET['idBill'];
if (isset($_POST['btn_save'])) {
    $error = array();

    if (empty($_POST['statusBill'])) {
        $error['statusBill'] = "Không được để trống tình trạng đơn hàng";
    } else {
        $statusBill = $_POST['statusBill'];
    }

    if (empty($error)) {
        $sql = "UPDATE `bill` SET `statusBill`='$statusBill' where idBill =$idBill";
        $result = $conn->exec($sql);
        if ($result == true) {
            $message = "Bạn đã cập nhật đơn hàng thành công!";
            echo "<script>alert('$message')</script>";
           redirect("?mod=admin&act=showbill");
        }
    } else {
        $_SESSION['updatebill'] = "<div class='text-danger mb-3 text-center'><b>Cập nhật đơn hàng không thành công!</b></div>";
    }
}
?>


<br><br><br>
<div class="container" style="height: 130vh;">
    <a href="?mod=admin&act=showbill" class="btn add_admin">
        < Quay lại</a>
            <h2 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);;">CẬP NHẬT TÌNH TRẠNG ĐƠN HÀNG</h2>
            <?php
            if (isset($_SESSION['updatebill'])) {
                echo $_SESSION['updatebill'];
                unset($_SESSION['updatebill']);
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row mt-4 mb-5">
                    <label for="nameProduct" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Nhập tình trạng đơn hàng</strong></label>
                    <div class="col-sm-9">
                        <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control" placeholder="Nhập vào tình trạng đơn hàng gồm 3 tình trạng: Đang xác nhận, đang vận chuyển, đang giao hàng" id="nameProduct" name="statusBill">
                        <?php
                        if (isset($error['nameProduct'])) {
                            echo $error['nameProduct'];
                        }
                        ?>
                    </div>
                </div>


                <input type="submit" value="Lưu" class="btn offset-sm-2" name="btn_save" style="height: 45px; background-color: rgb(47, 47, 162); font-family: 'Nunito', sans-serif; font-weight: bold;"></input>
            </form>

</div>