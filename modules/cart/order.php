<?php
require 'config.php';
?>

<?php
get_header();

if(isset($_SESSION['user']['name'])){
	$nameUser = $_SESSION['user']['name'];
} else {
	$nameUser = '';
}

?>


<div class="grid wide">
	<div class="row">
		<div class="col-3 fs-3 pb-4" data-aos="fade-right">
			<div class="intro-heading p-4 pt-0">
				<span style="font-size: 20px;" class="font-weight-bold text-center">LOẠI</span>
			</div>
			<div data-aos="fade-right">
				<ul style="list-style: none;">
					<li><a style="font-size: 16px;" class="" href="">Tất cả</a> </li>

					<li class="bill-name-type d-flex align-items-center">
						<a style="font-size: 16px;" class="" href="">Đang xác nhận</a>
					</li>

					<li class="bill-name-type d-flex align-items-center">
						<a style="font-size: 16px;" class="" href="">Đang vận chuyển</a>
					</li>

					<li class="bill-name-type d-flex align-items-center ">
						<a style="font-size: 16px;" class="" href="">Đã giao</a>
					</li>
				</ul>
			</div>
		</div>


		<div class="col-9 px-4" data-aos="fade-left">
			<div class="intro-heading p-4 pt-0">
				<span style="font-size: 20px;" class="font-weight-bold">ĐƠN HÀNG</span>
			</div>
			<?php
			$sql = "SELECT idBill as ID FROM bill";
			$result = $conn->query($sql);
			// while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
				foreach ($result as $item) {
					$idBill = $item['ID'];
					showArray($idBill);
					$sql1 = "SELECT * FROM detailbill WHERE idBill = $idBill AND nameUser = '$nameUser'";
					$res = $conn->query($sql1);
					while ($rows1 = $res->fetchAll(PDO::FETCH_ASSOC)) {
			?>

						<div class="bill-section mb-5 border-main" data-aos="fade-left">
							<div style="border-bottom: 3px solid rgb(47, 47, 162);" class="d-flex justify-content-end p-3">
							</div>


							<ul style="padding-left: 0;" class="fs-4 bill-list-pro">
								<?php
								foreach ($rows1 as $item1) {
								?>
									<li class="row mx-0 p-3 bill-item-pro">
										<div class="col-2">
											<img width="60px" class="border-main" src="assets/imgProduct/<?php ?>" alt="">
										</div>
										<div class="col-8" style="font-size: 16px;">
											<a href="?mod=product&act=detail&id=<?php ?>" title="" class="name-product "> <?php  ?></a>
											<span class="d-block">x <?php  ?></span>
										</div>
										<div style="font-size: 16px;" class="mb-5 text-color-primary col-2 d-flex justify-content-end align-items-md-center"> <?php ?></div>
										<div>
										</div>
									</li>
								<?php
								}
								?>
							</ul>

							<div style="border-bottom: 3px solid var(--primary-color);" class="fs-3 p-3 pe-5 bill-total">
								<?php
								$sql4 = "SELECT * from bill where idBill = $idBill";
								$result4 = $conn->query($sql4);
								while ($rows4 = $result4->fetchAll(PDO::FETCH_ASSOC)) {
									foreach ($rows4 as $item) {
								?>
										<div class='order-bottom'>
											<span style="font-size: 20px; color: #F64C72;" class="fs-3"><?php echo $item['statusBill']; ?></span>
											<span style="font-size: 18px; font-weight: 600; color: rgb(47, 47, 162);" class="text-color-main fw-bold fs-2">Tổng số tiền:  <?php echo currency_format($item['totalPrice']); ?></span>
										</div>
								<?php
									}
								}
								?>
							</div>
						</div>
			<?php
					}
				}
			// }
			?>
		</div>
	</div>


</div>