<?php 
#Xử lý logout 
unset($_SESSION['user']);

#Chuyển hướng người dùng qua login 
redirect();



?>