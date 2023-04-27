<? include "../config/core.php";

	// 
	if (!$user_id) header('location: /');


	// filter
	if ($_GET['on'] == 1) $product_all = db::query("select * from product where arh = 0");
	elseif ($_GET['off'] == 1) $product_all = db::query("select * from product where arh = 0");
	elseif ($_GET['catalog']) {
		$catalog_id = $_GET['catalog'];
		$product_all = db::query("select * from product where catalog_id = '$catalog_id' and arh = 0");
	} elseif ($_GET['brand']) {
		$brand_id = $_GET['brand'];
		$product_all = db::query("select * from product where brand_id = '$brand_id' and arh = 0");
	} else $product_all = db::query("select * from product where arh = 0");
	$page_result = mysqli_num_rows($product_all);

	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 50;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;

	// filter
	if ($_GET['on'] == 1) $product = db::query("select * from product where arh = 0 order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['off'] == 1) $product = db::query("select * from product where arh = 0 order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['catalog']) $product = db::query("select * from product where catalog_id = '$catalog_id' and arh = 0 order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['brand']) $product = db::query("select * from product where brand_id = '$brand_id' and arh = 0 order by ins_dt desc limit $page_start, $page_age");
	else $product = db::query("select * from product where arh = 0 order by ins_dt desc limit $page_start, $page_age");


	// site setting
	$menu_name = 'products';
	$pod_menu_name = 'main';
	// $site_set['footer'] = false;
	$css = ['products/main'];
	$js = ['products/main'];
?>
<? include "../block/header.php"; ?>

	<div class="">

      <!-- a header -->
		<? include "aheader.php"; ?>

		<? include "sort-filter.php"; ?>
		
		<? if ($page_result): ?>
			
			<div class="uc_u">
				<div class="uc_us">
               <div class="form_im uc_usn">
                  <input type="text" placeholder="Поиск" class="product_search">
                  <i class="fal fa-search form_icon"></i>
               </div>
				</div>

				<div class="tscroll">
					<table class="uc_u2q uc_uc">
						<thead class="">
							<tr class="thead">
								<td class="td_number">#</td>
								<td class="uc_ui_right">Статус</td>
								<td class="td_img">Фото</td>
								<td class="td_br"></td>
								<td class="td_name">Наименование</td>
								<td class="td_other">Артикул</td>
								<td class="td_other">Категория</td>
								<td class="td_other">Склад</td>
								<td class="td_other">Цена продажи</td>
								<td class="td_other">Количество</td>
								<td class="uc_uh_cn"></td>
							</tr>
						</thead>
						<tbody class="tbody">
							<? while ($pr_d = mysqli_fetch_assoc($product)): ?>
								<? $number++; ?>
								
								<tr class="uc_ui uc_ui2">
									<td class="td_number"><div class="uc_ui_number"><?=$number?></div></td>
									<td class="uc_ui_right">
										<div class="form_im form_im_toggle">
											<input type="checkbox" class="info_inp" data-val="<?=($pr_d['sale_online']==1?1:0)?>">
											<div class="form_im_toggle_btn <?=($pr_d['sale_online']==1?'form_im_toggle_act':'')?> form_prd_online" data-id="<?=$pr_d['id']?>"></div>
										</div>
									</td>
									<td class="td_img">
										<div class="uc_ui_img lazy_img" data-src="/assets/uploads/products/<?=product::product_img($pr_d['id'])?>">
											<? if (product::product_img($pr_d['id']) == null): ?> <i class="fal fa-box"></i> <? endif ?>
										</div>
									</td>
									<td class="td_br"></td>
									<td class="td_name">
										<a class="" href="/products/item/?id=<?=$pr_d['id']?>">
											<div class="uc_ui_name"><?=$pr_d['name_ru']?></div>
										</a>
									</td>
									<td class="td_other">
										<div class="uc_ui_cont">
											<div><?=product::product_article($pr_d['id'])?></div>
											<? if ($pr_d['brand_id'] && $gh): ?> <div><?=(product::pr_brand($pr_d['brand_id']))['name']?></div> <? endif ?>
										</div>
									</td>
									<td class="td_other"><div class="uc_uin_other"><? if ($pr_d['catalog_id']): ?> <div><?=product::pr_catalog_name($pr_d['catalog_id'], $lang)?></div> <? endif ?></div></td>
									<td class="td_other"><div class="uc_uin_other"><?=product::product_warehouses($pr_d['id'])?></div></td>
									<td class="td_other"><div class="uc_uin_other"><?=(product::product_price($pr_d['id'])==0?'<m>Цена не указана</m>':product::product_price($pr_d['id']).' тг')?></div></td>
									<td class="td_other"><div class="uc_uin_other " product_quantity_add_pop data-id="<?=$pr_d['id']?>"><?=product::product_quantity($pr_d['id'])?> шт</div></td>
									<td class="">
										<div class="uc_uib">
											<div class="uc_uibo"><i class="fal fa-ellipsis-v"></i></div>
											<div class="menu_c uc_uibs">
												<a class="menu_ci" target="_blank" href="/products/item/?id=<?=$pr_d['id']?>">
													<div class="menu_cin"><i class="fal fa-external-link"></i></div>
													<div class="menu_cih">Открыть товар</div>
												</a>
												<div class="menu_ci product2_add_pop" data-id="<?=$pr_d['id']?>">
													<div class="menu_cin"><i class="fal fa-clone"></i></div>
													<div class="menu_cih">Дублировать товар</div>
												</div>
												<!-- <div class="menu_ci " data-id="<?=$pr_d['id']?>">
													<div class="menu_cin"><i class="fal fa-handshake"></i></div>
													<div class="menu_cih">Выставить на продажу</div>
												</div> -->
												<!-- <div class="menu_ci " data-id="<?=$pr_d['id']?>">
													<div class="menu_cin"><i class="fal fa-archive"></i></div>
													<div class="menu_cih">Архивировать товар</div>
												</div> -->
												<div class="menu_ci uc_uib_del pr_btn_delete" data-title2="Удалить товар" data-id="<?=$pr_d['id']?>">
													<div class="menu_cin"><i class="fal fa-trash-alt"></i></div>
													<div class="menu_cih">Удалить товар</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							<? endwhile ?>
						</tbody>
					</table>
				</div>
				<div class="uc_u2qm  uc_uc dsp_n"></div>
			</div>

			<? if ($page_all > 1): ?>
				<div class="uc_p">
					<? if ($page > 1): ?> <a class="uc_pi" href="<?=$url_page?>?&page=<?=$page-1?>"><i class="fal fa-angle-left"></i></a> <? endif ?>
					<a class="uc_pi <?=($page==1?'uc_pi_act':'')?>" href="<?=$url_page?>?&page=1">1</a>
					<? for ($pg = 2; $pg < $page_all; $pg++): ?>
						<? if ($pg == $page - 1): ?>
							<? if ($page - 1 != 2): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
							<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="<?=$url_page?>?&page=<?=$pg?>"><?=$pg?></a>
						<? endif ?>
						<? if ($pg == $page): ?> <a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="<?=$url_page?>?&page=<?=$pg?>"><?=$pg?></a> <? endif ?>
						<? if ($pg == $page + 1): ?>
							<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="<?=$url_page?>?&page=<?=$pg?>"><?=$pg?></a>
							<? if ($page + 1 != $page_all - 1): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
						<? endif ?>
					<? endfor ?>
					<a class="uc_pi <?=($page==$page_all?'uc_pi_act':'')?>" href="<?=$url_page?>?&page=<?=$page_all?>"><?=$page_all?></a>
					<? if ($page < $page_all): ?> <a class="uc_pi" href="<?=$url_page?>?&page=<?=$page+1?>"><i class="fal fa-angle-right"></i></a> <? endif ?>
				</div>
			<? endif ?>

		<? else: ?> <div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div> <? endif ?>

	</div>

<? include "../block/footer.php"; ?>

	<? include "pop_add.php"; ?>