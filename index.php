<?php 
session_start();
ob_start();
require 'lib/template.php';
require 'lib/url.php';
require 'lib/number.php';
require 'lib/cart.php';
require 'lib/data.php';

?>


<?php 

$mod = !empty($_GET['mod'])?$_GET['mod']:'home';
$act = !empty($_GET['act'])?$_GET['act']:'main';

$path = "modules/{$mod}/{$act}.php"; //Tạo biến $path là chuỗi đường dẫn đến trang 

//Hàm file_exists: kiểm tra file có tồn tại không
if(file_exists($path)) { //Kiểm tra xem nếu file ở biến $path có tồn tại thì sẽ require nó về đúng đường dẫn trong biến $path
    require $path;
} else {
    require 'inc/404.php';
}
?>