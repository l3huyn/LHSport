<?php 
#Xử lý logout 
unset($_SESSION['is_login']);
unset($_SESSION['user_login']);

#Chuyển hướng người dùng qua login 
header('location: /LHSPort');
?>