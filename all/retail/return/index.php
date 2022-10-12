<?php include "../../../config/acore.php";

	// 
	if (!$user_id) header('location: /admin/');


	// 
	$cashbox = db::query("select * from retail_returns where user_id = '$user_id' and returns = 0 order by id desc limit 1");
	if (mysqli_num_rows($cashbox)) {
		$cashbox_d = mysqli_fetch_assoc($cashbox);
		$cashbox_id = $cashbox_d['id'];
	} else {
		$cashbox_id = (mysqli_fetch_assoc(db::query("SELECT * FROM `retail_returns` order by id desc")))['id'] + 1;
		$ins = db::query("INSERT INTO `retail_returns`(`id`, `user_id`) VALUES ('$cashbox_id', '$user_id')");
	}
	$cashboxp = db::query("select * from retail_returns_products where return_id = '$cashbox_id' order by ins_dt asc");
	$number = 0; $total = 0;



	// site setting
	$menu_name = 'return';
	$site_set['header'] = true;
	$site_set['menu'] = false;
	$site_set['retail_menu'] = true;
	$site_set['search'] = false;
	$site_set['footer'] = false;
	$site_set['swiper'] = true;
	$css = ['admin/retail/main'];
	$js = ['admin/retail/return'];

?>
<?php include "../../block/header.php"; ?>

	<div class="cash_bl1">
		<div class="cash_bl1_l">
			<div class="cash_bl1_lc">
				<div class="cash_bl1_ls">
					<div class="uc_us">
						<div class="form_im uc_usn">
							<input type="text" class="sub_user_search_in cashbox_search" data-oid="<?=$cashbox_id?>" placeholder="Поиск" autofocus>
							<i class="fal fa-search form_icon"></i>
						</div>
					</div>
				</div>
				<div class="cash_bl1_lm lazy_c">
					<div class="swiper mySwiper cash_bl1_lq">
						<div class="swiper-wrapper">
							<? $catalog = db::query("select * from product_catalog order by ins_dt desc"); ?>
							<? while ($catalog_d = mysqli_fetch_assoc($catalog)): ?>
								<div class="swiper-slide cash_bl1_lqi">
									<div class="cash_bl1_lqic icon3-<?=$catalog_d['name']?>"></div>
									<div class="cash_bl1_lqin"><?=$catalog_d['name_ru']?></div>
								</div>
							<? endwhile ?>							
						</div>
					</div>
					<div class="cash_bl1_lmc">
						<span>Популярные товары</span>
						<div class="bs_w">
							<? $pitem = db::query("select * from product_item"); ?>
							<? while ($pitem_d = mysqli_fetch_assoc($pitem)): ?>
								<? $product_d = product::product($pitem_d['product_id']); ?>
								<? $quantity = product::pr_item_quantity($pitem_d['id']); ?>
								<div class="bs_wi cashbox_add" data-oid="<?=$cashbox_id?>" data-id="<?=$product_d['id']?>" data-item-id="<?=$pitem_d['id']?>" data-quantity="<?=$quantity?>">
									<div class="bs_wi_img">
										<? if ($pitem_d['img']): ?> <div class="lazy_img" data-src="/assets/uploads/products/<?=$pitem_d['img']?>"></div>
										<? else: ?> <i class="fal fa-box"></i> <? endif ?>
									</div>
									<div class="bs_wi_c">
										<? if ($product_d['name_ru']): ?> <div class="bs_wi_cn"><?=$product_d['name_ru']?></div> <? endif ?>
										<div class="bs_wi_cd">
											<div class="bs_wi_cp"><?=product::product_price($product_d['id'])?> тг</div>
											<div class="bs_wi_cs"><?=$quantity?> шт</div>
										</div>
									</div>
								</div>
							<? endwhile ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="cash_bl1_r">
			<div class="cash_bl1_rc">

				<!-- list -->
				<div class="uc_u">
					<div class="uc_uh">
						<div class="uc_uh2">
							<div class="uc_uh_number">#</div>
							<div class="uc_uh_name">Наименование</div>
							<div class="uc_uh_other">Цена</div>
							<div class="uc_uh_other">Количество</div>
							<div class="uc_uh_other">Сумма</div>
						</div>
						<div class="uc_uh_cn"></div>
					</div>
					<div class="uc_uc lazy_c">
						<? if (mysqli_num_rows($cashboxp) != 0): ?>
							<? while ($sel_d = mysqli_fetch_assoc($cashboxp)): ?>
								<? $number++; $sum = $sel_d['quantity'] * $sel_d['price']; $total = $total + $sum; ?>
								<? $product_d = product::product($sel_d['product_id']); ?>
								<? $pitem_d = product::pr_item($sel_d['product_item_id']); ?>
								<div class="uc_ui uc_ui2">
									<div class="uc_uil">
										<div class="uc_ui_number"><?=$number?></div>
										<div class="uc_uiln">
											<div class="uc_ui_img lazy_img" data-src="/assets/uploads/products/<?=$pitem_d['img']?>"><?=($pitem_d['img']!=null?'':'<i class="fal fa-user"></i>')?></div>
											<div class="uc_uinu">
												<div class="uc_ui_name"><?=$product_d['name_ru']?></div>
												<? if ($pitem_d['color_id'] || $pitem_d['size_id']): ?>
													<div class="uc_ui_cont">
														<? if ($pitem_d['color_id']): ?> <div><?=(product::pr_color($pitem_d['color_id']))['name_ru']?></div> <? endif ?>
														<? if ($pitem_d['size_id']): ?> <div><?=(product::pr_size($pitem_d['size_id']))['name']?></div> <? endif ?>
													</div>
												<? endif ?>
											</div>
										</div>
										<div class="uc_uin_other">
											<input type="tel" class="uc_uin_calc_q fr_price cashbox_pr" value="<?=$sel_d['price']?>" data-lenght="1" />
										</div>
										<div class="uc_uin_other" data-max="<?=$sel_d['quantity'] + $quantity?>">
											<input type="tel" class="uc_uin_calc_q fr_number3 cashbox_qn" value="<?=$sel_d['quantity']?>" data-lenght="1" />
										</div>
										<div class="uc_uin_other cashbox_sum fr_price"><?=$sum?></div>
									</div>
									<div class="uc_uin_cn cashbox_remove" data-id="<?=$sel_d['id']?>"><i class="fal fa-trash-alt"></i></div>
								</div>
							<? endwhile ?>
						<? else: ?>
							<div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div>
						<? endif ?>
					</div>
				</div>

				<div class="cash_bl1_rb">
					<div class="cash_bl1_rbl">
						<div class="cash_bl1_rbli">
							<div class="cash_bl1_rblin">Итого:</div>
							<div class="cash_bl1_rblip"><?=$total?> тг</div>
						</div>
					</div>
					<div class="cash_bl1_rbr">
						<div class="btn cashbox_pay" data-id="<?=$cashbox_id?>">Возврат</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<?php include "../../block/footer.php"; ?>