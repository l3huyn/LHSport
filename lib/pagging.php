<?php


function getPagging($num_page, $page, $base_url=''){
$str_pagging = "<ul class='pagination home-product__pagination'>";


$str_pagging .= "</ul>";
}



?>

<ul class="pagination home-product__pagination">
      <li class="pagination-item">
        <a href="" class="pagination-item__link">
          <i class="pagination-item__icon fas fa-angle-left"></i>
        </a>
      </li>

      <li class="pagination-item">
        <a href="?mod=product&act=main&page=1" class="pagination-item__link">1</a>
      </li>

      <li class="pagination-item">
        <a href="?mod=product&act=main&page=2" class="pagination-item__link">2</a>
      </li>

      <li class="pagination-item">
        <a href="?mod=product&act=main&page=3" class="pagination-item__link">3</a>
      </li>
      <li class="pagination-item">
        <a href="" class="pagination-item__link">
          <i class="pagination-item__icon fas fa-angle-right"></i>
        </a>
      </li>
    </ul>
