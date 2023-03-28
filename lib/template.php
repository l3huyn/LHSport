<?php 
function get_header(){
  $path_header = "inc/header.php";
  if(file_exists($path_header)){
       require 'inc/header.php';
  }else {
      echo "No exits this URL: {$path_header}";
  }
}

function get_footer(){
  $path_footer = "inc/footer.php";
  if(file_exists($path_footer)){
       require 'inc/footer.php';
  }else {
      echo "No exits this URL: {$path_footer}";
  }
}

?>