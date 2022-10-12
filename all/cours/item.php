<?php include "../config/core.php";

	// 
	if (isset($_GET['id']) || $_GET['id'] != '') {
		$cours_id = $_GET['id'];
		$cours = db::query("select * from cours where id = '$cours_id'");
		if (mysqli_num_rows($cours)) {

			$cours = mysqli_fetch_assoc($cours);
			$cours = array_merge($cours, fun::cours_info($cours['id']));
			if ($cours['site'] != null) header('location: /cours/'.$cours['site']);
			
			$category = fun::category($cours['category_id']);
			$autor = fun::autor($cours['autor_id']);
			
			$pack = db::query("select * from c_pack where cours_id = '$cours_id'");
			$pl = db::query("select * from c_pack where cours_id = '$cours_id' and number = 1");
			
			$cours_info = db::query("select * from cours_info where cours_id = '$cours_id'");
			$cours_info_d = mysqli_fetch_assoc($cours_info);

		} else header('location: /cours/');
	} else header('location: /cours/');

	// site setting
	$menu_name = 'item';
	$site_set = ['menu' => 2];
	$css = [$menu_name];
	$js = [];

	$san = rand(0, 1);
	$whatsapp = ['77776779777', '77476267492'];
	$whatsapp2 = ['77776779777', '77476267492'];
	
?>
<?php include "../block/header.php"; ?>


	<div class="item">
		<div class="item_c">

			<!--  -->
			<div class="itemc_info">
				<div class="bl_c">

					<div class="itemc_info_c">
						<div class="itemci_l">
							<div class="itemci_ln">
								<div class="itemci_lnc"><i class="fas fa-bell"></i></div>
								<p>Курстан орыныңызды <br>алып үлгеріңіз</p>
							</div>
							<h1 class="itemci_h"><?=$cours['name_'.$lang]?></h1>
							<div class="itemci_p"><?=$cours['offer_'.$lang]?></div>
							<div class="itemci_b">
								<a href="#price" class="btn">Оқығым келеді</a>
								<a href="#program" class="btn btn_cl">Курс бағдарламасы</a>
							</div>
						</div>
						<div class="itemci_r">
							<div class="lazy_img" data-src="/assets/img/cours/<?=$cours['img']?>"></div>
						</div>
					</div>

					<div class="itemc_dn">
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-book-reader"></i></div>
							<div class="itemcd_in">
								<div>Қурсақа доступ</div>
								<p><?=$cours['time']?> беріледі</p>
							</div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-play-circle"></i></div>
							<div class="itemcd_in">
								<div>Курс</div>
								<p><?=$cours['item']?> сабақтан тұрады</p>
							</div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-globe"></i></div>
							<div class="itemcd_in">
								<div>Онлайн</div>
								<p>Cізге ыңғайлы уақытта</p>
							</div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-users-class"></i></div>
							<div class="itemcd_in">
								<div>Сізбен бірге</div>
								<p><?=$cours['view']?> бақытты ана бар</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<?php include "block/one.php"; ?>

			<?php include "block/result.php"; ?>

			<?php include "block/autor.php"; ?>

			<?php include "block/to_pass.php"; ?>

			<?php include "block/program.php"; ?>

			<?php include "block/price.php"; ?>
		
		</div>
	</div>
	

<?php include "../block/footer.php"; ?>
<?php include "block/oko.php"; ?>