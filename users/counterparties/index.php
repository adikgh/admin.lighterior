<?php include "../../../config/acore.php";

	// 
	if (!$user_id) header('location: /admin/');


	// 
	$orders = db::query("select * from user_counterparties order by ins_dt desc limit 50");
	$filter = 0;

	// site setting
	$menu_name = 'users';
	$pod_menu_name = 'counterparties';
	$site_set['header'] = true;
	$site_set['menu'] = true;
	$site_set['footer'] = false;
	$css = [];
	$js = [];
?>
<?php include "../../block/header.php"; ?>
	
	<div class="">

		<!-- a header -->
		<? include "../aheader.php"; ?>


		<? if (mysqli_num_rows($orders) != 0): ?>
			<!-- list -->
			<div class="uc_u">
				
				<div class="uc_us">
					<div class="uc_usn form_im">
						<input type="text" class="sub_user_search_in" placeholder="Поиск" />
						<i class="fal fa-search form_icon"></i>
					</div>
				</div>
				<div class="uc_uh">
					<div class="uc_uh2">
						<div class="uc_uh_number">#</div>
						<div class="uc_uh_name">Покупатель</div>
						<div class="uc_uh_other">Телефон</div>
						<!-- <div class="uc_uh_name">Цена продажи</div> -->
						<!-- <div class="uc_uh_name">Количество</div> -->
					</div>
					<div class="uc_uh_cn"></div>
				</div>
				<div class="uc_uc">
					<? while ($buy_d = mysqli_fetch_assoc($orders)): ?>
						<? $sum++; ?>

						<div class="uc_ui">
							<div class="uc_uil">
								<div class="uc_ui_number"><?=$sum?></div>
								<a class="uc_uiln" href="#/user/admin/users/item/?id=<?=$buy_d['id']?>">
									<div class="uc_ui_icon lazy_img" data-src="/assets/uploads/users/<?=$buy_d['img']?>"><?=($buy_d['img']!=null?'':'<i class="fal fa-user"></i>')?></div>
									<div class="uc_uinu">
										<div class="uc_ui_name"><?=$buy_d['name']?> <?=$buy_d['surname']?></div>
										<div class="uc_ui_phone"><?=$buy_d['phone']?></div>
									</div>
								</a>
								<div class="uc_uin_other"><?=$buy_d['phone']?></div>
								<!-- <div class="uc_uiln"><?=$buy_d['sum']?> тг</div> -->
								<!-- <div class="uc_uiln"><?=$buy_d['quantity']?> шт</div> -->
							</div>
							<div class="uc_uib">
								<div class="uc_uibo"><i class="fal fa-ellipsis-v"></i></div>
								<div class="menu_c uc_uibs">
									<div class="menu_ci cursor_none" data-title2="Доступ уақытын ауыстыру">
										<div class="menu_cin"><i class="fal fa-calendar-alt"></i></div>
										<div class="menu_cih">Доступ уақыты</div>
									</div>
									<div class="menu_ci sub_sms_send" data-title2="Смс қайта жіберу" data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-paper-plane"></i></div>
										<div class="menu_cih">СМС қайта жіберу</div>
									</div>
									<div class="menu_ci uc_uib_del sub_user_del" data-title2="Оқушыны өшіру" data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-trash-alt"></i></div>
										<div class="menu_cih">Оқушыны өшіру</div>
									</div>
								</div>
							</div>
						</div>
					<? endwhile ?>
				</div>
			</div>

		<? else: ?> <div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div> <? endif ?>

	</div>



<?php include "../../block/footer.php"; ?>