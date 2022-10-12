<?php include "../config/core.php";

	// 
	if ($_GET['type'] == 'cours') $cours = db::query("select * from cours where category_id = 1 and selling = 1 and arh is null ORDER BY ins_dt desc");
	elseif ($_GET['type'] == 'master-class') $cours = db::query("select * from cours where category_id = 2 and selling = 1 and arh is null ORDER BY ins_dt desc");
	elseif ($_GET['type'] == 'webinar') $cours = db::query("select * from cours where category_id = 3 and selling = 1 and arh is null ORDER BY ins_dt desc");
	else $cours = db::query("select * from cours where selling = 1 and arh is null ORDER BY ins_dt desc");
	
	if (!isset($_GET['type']) || $_GET['type'] == '') $_GET['type'] = 'project';


	// site setting
	$menu_name = $_GET['type'];
	$site_set = [
		'menu' => 2,
		'swiper' => true,
	];
	$css = ['cours'];
	$js = [];

?>
<?php include "../block/header.php"; ?>

	<div class="cours">
		<div class="bl_c">

			<div class="cours_t">
				<h2 class="cours_h">Менің жобаларым</h2>
				<div class="cours_tm swiper swiper_catalog">
					<div class="swiper-wrapper">
						<a class="swiper-slide cours_tm_i <?=($menu_name=='project'?'cours_tm_act':'')?>" href="/cours/">Барлығы</a>
						<a class="swiper-slide cours_tm_i <?=($menu_name=='cours'?'cours_tm_act':'')?>" href="/cours/?type=cours">Курстар</a>
						<a class="swiper-slide cours_tm_i <?=($menu_name=='master-class'?'cours_tm_act':'')?>" href="/cours/?type=master-class">Мастер-класс</a>
						<a class="swiper-slide cours_tm_i <?=($menu_name=='webinar'?'cours_tm_act':'')?>" href="/cours/?type=webinar">Вебинар</a>
					</div>
					<div class="swiper-button-prev swiper-button-prev1"><i class="fal fa-chevron-left"></i></div>
					<div class="swiper-button-next swiper-button-next1"><i class="fal fa-chevron-right"></i></div>
				</div>
			</div>

			<div class="bq3_c">
				<?php while($ana = mysqli_fetch_array($cours)): ?>
					<a class="bq3_ci" href="/cours/item.php?id=<?=$ana['id']?>">
						<div class="bq_ci_img">
							<div class="lazy_img" data-src="/assets/img/cours/<?=$ana['img']?>"></div>
						</div>
						<div class="bq_ci_info">
							<div class="bq_cit"><?=fun::category_name($ana['category_id'], $lang)?></div>
							<div class="bq_cih"><?=$ana['name_'.$lang]?></div>
							<?php if ($ana['price']): ?>
								<div class="bq_cip">
									<?php if ($ana['price_sole']): ?>
										<p class="bq_cip_sole"><?=$ana['price_sole']?> тг</p>
									<?php endif ?>
									<p><?=$ana['price']?> тг</p>
								</div>
							<?php else: ?>
								<?php $pack_price = fun::pack_price_min($ana['id']) ?>
								<div class="bq_cip">
									<p><?=$pack_price[0]?> тг</p>
								</div>
							<?php endif ?>
						</div>
						<div class="bq_ci_btn">
							<div class="btn btn_cm btn_dd"><i class="fal fa-long-arrow-right"></i></div>
						</div>
					</a>
				<?php endwhile ?>
			</div>

		</div>
	</div>

<?php include "../block/footer.php"; ?>