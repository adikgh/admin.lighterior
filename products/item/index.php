<? include "apcore.php";

	// 
	$pod_menu_name = 'main';
?>
<? include "../../block/header.php"; ?>

	<div class="pitem">
		
      <? include "aheader.php"; ?>

		<div class="item_c">
			<div class="item_sp">
				<div class="item_spr">
					<div class="item_sprt">
						<div class="item_sprti">
							<span>Наименование товара</span>
							<div><?=$product_d['name_'.$lang]?></div>
						</div>
						<div class="item_sprti">
							<span>Категория товара</span>
							<div><?=($catalog_id?$catalog_d['name_'.$lang]:'<m>не выбрана</m>')?></div>
						</div>
						<div class="item_sprti">
							<span>Бренд</span>
							<div><?=($product_d['brand_id']?(product::pr_brand($product_d['brand_id']))['name']:'<m>нет данный</m>')?></div>
						</div>
						<div class="item_sprti">
							<span>Страна бренда</span>
							<div><?=($product_d['brand_country_id']?(product::pr_country($product_d['brand_country_id']))['name_'.$lang]:'<m>нет данный</m>')?></div>
						</div>
						<div class="item_sprti">
							<span>Коллекция</span>
							<div><?=($product_d['collection_id']?(product::pr_collection($product_d['collection_id']))['name_'.$lang]:'<m>нет данный</m>')?></div>
						</div>
						<div class="item_sprti">
							<span>Стиль</span>
							<div><?=($product_d['style_id']?(product::pr_style($product_d['style_id']))['name_'.$lang]:'<m>нет данный</m>')?></div>
						</div>
					</div>
					<div class="item_sprb">
						<div class="btn btn_back3 pr_upd_pop" data-id="<?=$product_id?>">Редактировать</div>
						<div class="btn btn_back_red3 pr_delete" data-id="<?=$product_id?>">Удалить товар</div>
					</div>
				</div>
				<!-- <div class="item_spl">
					<div class="item_splt">
						<div class=""></div>
					</div>
					<div class="item_sprb">
						<div class="btn btn_back3">Заменить основной фото</div>
					</div>
				</div> -->
			</div>
		</div>
		

		<? $pitem = db::query("select * from product_item where product_id = '$product_id' order by ins_dt desc"); ?>
      <div class="item_c">
			<div class="item_is">Виды товаров:</div>
			<div class="uc_u">
				<div class="uc_uh">
					<div class="uc_uh2">
						<div class="uc_uh_number">#</div>
						<div class="uc_uh_name">Артикул и штрих код</div>
						<div class="uc_uh_other">Цвет и размер</div>
						<div class="uc_uh_other">Склад</div>
						<div class="uc_uh_other">Цена продажи</div>
						<div class="uc_uh_other">Количество</div>
					</div>
					<div class="uc_uh_cn"></div>
				</div>
				<div class="uc_uc">
					<? while ($buy_d = mysqli_fetch_assoc($pitem)): ?>
						<? $sum++; $buy_id = $buy_d['id']; ?>
						<? $view = db::query("select * from product_item_quantity where item_id = '$buy_id'"); ?>
						<? if (mysqli_num_rows($view) == 1) $view_d = mysqli_fetch_assoc($view); else $view_d = null; ?>

						<div class="uc_ui uc_ui2">
							<div class="uc_uil">
								<div class="uc_ui_number"><?=$sum?></div>
								<a class="uc_uiln" href="/products/item/view/?id=<?=$buy_d['id']?>">
									<? if ($buy_d['img']): ?> <div class="uc_ui_img lazy_img" data-src="https://lighterior.kz/assets/uploads/products/<?=$buy_d['img']?>"></div> <? endif ?>
									<div class="uc_uinu">
										<div class="uc_ui_name"><?=$buy_d['article']?></div>
										<? if ($buy_d['barcode']): ?>
											<div class="uc_ui_cont"><div><?=$buy_d['barcode']?></div></div>
										<? endif ?>
									</div>
								</a>
								<div class="uc_uin_other"><?=(product::pr_color($buy_d['color_id']))['name_ru']?>, <?=(product::pr_size($buy_d['size_id']))['name']?></div>
								<div class="uc_uin_other"><?=product::pr_item_warehouses($buy_d['id'])?></div>
								<div class="uc_uin_other"><input type="tel" class="uc_uin_calc_q fr_price item_upd_pr" data-id="<?=$buy_d['id']?>" value="<?=$buy_d['price']?>" data-lenght="1" /></div>
								<? if ($view_d): ?> <div class="uc_uin_other"><input type="tel" class="uc_uin_calc_q fr_number3 view_updq_qn" data-id="<?=$view_d['id']?>" value="<?=$view_d['quantity']?>" data-lenght="1" /></div>
								<? else: ?> <div class="uc_uin_other pitem_updq_pop cursor_p" data-id="<?=$buy_d['id']?>"><?=product::pr_item_quantity($buy_d['id'])?> шт</div> <? endif ?>
							</div>
							<div class="uc_uib">
								<div class="uc_uibo"><i class="fal fa-ellipsis-v"></i></div>
								<div class="menu_c uc_uibs">
									<a class="menu_ci" target="_blank" href="/products/item/view/?id=<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-external-link"></i></div>
										<div class="menu_cih">Открыть вид</div>
									</a>
									<div class="menu_ci pitem_upd_pop" data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-pen"></i></div>
										<div class="menu_cih">Изменить данный</div>
									</div>
									<div class="menu_ci pitem_updq_pop" data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-sync"></i></div>
										<div class="menu_cih">Корректировка колич.</div>
									</div>
									<? if (mysqli_num_rows($pitem) > 1): ?>
										<div class="menu_ci uc_uib_del pitem_btn_delete" data-title2="Удалить товар" data-id="<?=$buy_d['id']?>">
											<div class="menu_cin"><i class="fal fa-trash-alt"></i></div>
											<div class="menu_cih">Удалить вид</div>
										</div>
									<? endif ?>
								</div>
							</div>
						</div>
					<? endwhile ?>
				</div>
				<div class="uc_ub">
					<div class="btn btn_k pitem_add_pop">
						<i class="far fa-layer-plus"></i>
						<span>Добавить вид товара</span>
					</div>
				</div>
			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>
	<? include "pop_add.php"; ?>