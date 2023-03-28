<?php
require "config.php";
?>

<?php
require 'inc/header-admin.php';
?>

<?php
    if(isset($_POST['btn_save'])){
        $error = array();

        if(empty($_POST['nameProduct'])){
          $error['nameProduct'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập tên sản phẩm!</p>";
        } else {
          $nameProduct = $_POST['nameProduct'];
        }

        if(empty($_POST['brand'])){
          $error['brand'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập thương hiệu!</p>";
        } else {
          $brand = $_POST['brand'];
        }

        if(empty($_POST['typeProduct'])){
            $error['typeProduct'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập loại sản phẩm!</p>";
          } else {
            $typeProduct = $_POST['typeProduct'];
        }

        if(empty($_POST['popularity'])){
            $error['popularity'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải chọn sản phẩm ưa chuộng hoặc không!</p>";
          } else {
            $popularity = $_POST['popularity'];
          }

        if(empty($_POST['infoProduct'])){
          $error['infoProduct'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập thông tin sản phẩm!</p> ";
        } else {
           $infoProduct = $_POST['infoProduct'];
        }

        if(empty($_POST['parameters'])){
          $error['parameters'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập thông số sản phẩm!</p> ";
        } else {
           $parameters = $_POST['parameters'];
        }

        if(empty($_POST['price'])){
          $error['price'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập giá sản phẩm!</p>";
        } else {
          if($_POST['price'] <= 0 || $_POST['price'] % 1000 != 0){
            $error['price'] = "<p style='margin: 0; color: red; font-size: 14px;'>Vui lòng nhập giá lớn hơn 0 và chia hết cho 1000</p>";
          } else {
            $price = $_POST['price'];
          }
        }

        #Hình ảnh
        if(isset($_FILES['imgProduct']['name'])){
            $nameImg = $_FILES['imgProduct']['name'];
            $pathType = pathinfo($_FILES['imgProduct']['name'], PATHINFO_EXTENSION);
            $nameImg = "Product".rand(000,999).'.'.$pathType;
            
            $diachinguon = $_FILES['imgProduct']['tmp_name'];
            $diachidich = "assets/imgProduct/".$nameImg;
            //Tải hình ảnh lên
            $upload = move_uploaded_file($diachinguon,$diachidich);
            if($upload == false){
                $errors['imgProduct']="<div class='text-danger'><b>Chưa tải hình ảnh được!</b></div>";
            }
        }
        #End: Hình ảnh
       
        if(empty($_POST['status'])){
          $error['status'] = "<p style='margin: 0; color: red; font-size: 14px;'>Bạn cần phải nhập trạng thái sản phẩm!</p>";
        } else {
          $status = $_POST['status'];
        }

        #Kết luận:
        if(empty($error)){
            $sql = "INSERT into product(nameProduct, brand, typeProduct, popularity, infoProduct, parameters, price, imgProduct, status) values('$nameProduct', '$brand', '$typeProduct', '$popularity', '$infoProduct', '$parameters', '$price', '$nameImg', '$status')";
            $result = $conn->exec($sql);
            if($result == true){
                $message = "Bạn đã thêm sản phẩm thành công!";
                echo "<script>alert('$message')</script>";
                redirect("?mod=admin&act=showproduct");
            }
        } else {
            $_SESSION['addproduct'] = "<b>Thêm sản phẩm không thành công!</b>";
        }

    }
?>
<br> <br>
<div class="container" style="height: 130vh;">
<a href="?mod=admin&act=showproduct" class="btn add_admin">< Quay lại</a>
<h2 class="text-center p-2 mt-4 mb-4" style="color: rgb(47, 47, 162);;">THÊM SẢN PHẨM</h2>
    <p style='font-size: 16px; color: red; text-align: center;'> 
        <?php 
        if(isset($_SESSION['addproduct'])){
            echo $_SESSION['addproduct'];
            unset($_SESSION['addproduct']);
        }
    ?>
    </p>
    
    <form  method="POST" enctype="multipart/form-data">
            <div class="row mt-4 mb-5">
                <label for="nameProduct" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Nhập tên sản phẩm</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control" placeholder="Tên sản phẩm" id="nameProduct" name="nameProduct" value="<?php if(isset($nameProduct)) echo $nameProduct ?>">
                    <?php 
                    if(isset($error['nameProduct'])){
                        echo $error['nameProduct'];
                    }
                ?>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <label for="brand" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Nhập thương hiệu</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control" placeholder="Thương hiệu" id="brand" name="brand" value="<?php if(isset($brand)) echo $brand ?>">
                    <?php 
                    if(isset($error['brand'])){
                        echo $error['brand'];
                    }
                ?>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <label for="typeProduct" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;'>Nhập loại sản phẩm</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control" placeholder="Loại sản phẩm" id="typeProduct" name="typeProduct" value="<?php if(isset($typeProduct)) echo $typeProduct; ?>">
                    <?php 
                    if(isset($error['typeProduct'])){
                        echo $error['typeProduct'];
                    }
                ?>
                </div>
            </div>

            <div class="row mb-5">
                <label for="popularity" class="form-label col-sm-2 text-end "><strong style='font-size: 16px;' >Ưa chuộng</strong></label>
                <div class="col-sm-9">
                    <span>
                        <input style='padding: 16px 4px; font-size: 14px' type="radio" name="popularity" value="Có" <?php if(isset($popularity) && $popularity == 'Có') echo "checked='checked'"?>>Có
                    </span>
                    <span class="mx-3">
                        <input type="radio" name="popularity" value="Không" <?php if(isset($popularity) && $popularity == 'Không') echo "checked='checked'"?>>Không
                    </span>
                    <?php 
                        if(isset($errors['popularity'])){
                            echo $errors['popularity'];
                        }
                    ?>
                </div>
            </div>

            <div class="row mb-5">
                <label for="infoProduct" class="form-label col-sm-2 text-end "><strong style='font-size: 16px'>Nhập thông tin sản phẩm</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control " id="infoProduct" placeholder="Thông tin sản phẩm" name="infoProduct" value="<?php if(isset($infoProduct)) echo $infoProduct?>">
                    <?php 
                    if(isset($error['infoProduct'])){
                        echo $error['infoProduct'];
                    }
                ?>
                </div>
            </div>

            <div class="row mb-5">
                <label for="parameters" class="form-label col-sm-2 text-end "><strong style='font-size: 16px'>Nhập thông số sản phẩm</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="text" class="form-control " id="parameters" placeholder="Thông số sản phẩm" name="parameters" value="<?php if(isset($parameters)) echo $parameters?>">
                    <?php 
                    if(isset($error['parameters'])){
                        echo $error['parameters'];
                    }
                ?>
                </div>
            </div>

            <div class="row mb-5">
                <label for="price" class="form-label col-sm-2 text-end "><strong style='font-size: 16px'>Nhập giá sản phẩm</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="number" class="form-control" id="price" min='0' placeholder="Giá sản phẩm" name="price" value="<?php if(isset($price)) echo $price ?>">
                    <?php 
                    if(isset($error['price'])){
                        echo $error['price'];
                    }
                ?>
                </div>
            </div>

            <div class="row mb-5">
                <label for="imgProduct" class="form-label col-sm-2 text-end "><strong style='font-size: 16px'>Chọn hình ảnh</strong></label>
                <div class="col-sm-9">
                    <input style='padding: 16px 4px; font-size: 14px' type="file" id="imgProduct" name="imgProduct">
                    <?php 
                    if(isset($error['imgProduct'])){
                        echo $error['imgProduct'];
                    }
                ?>
                </div>
            </div>

            <div class="row mb-5">
                <label for="status" class="form-label col-sm-2 text-end "><strong style='font-size: 16px'>Trạng thái sản phẩm</strong></label>
                <div class="col-sm-9">
                    <span>
                        <input style='padding: 16px 4px; font-size: 14px' type="radio" name="status" value="Còn hàng" <?php if(isset($status) && $status == 'Còn hàng') echo "checked='checked'"?>>Còn hàng
                    </span>
                    <span class="mx-3">
                        <input type="radio" name="status" value="Hết hàng" <?php if(isset($status) && $status == 'Hết hàng')echo "checked='checked'"?>>Hết hàng
                    </span>
                    <?php 
                        if(isset($error['status'])){
                            echo $error['status'];
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