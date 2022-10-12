<?php include "../../../config/acore.php";

	// 
	if (!$user_id) header('location: /admin/');


	// filter user all
	if ($_GET['on'] == 1) $users_all = db::query("select * from user where `right` IS NULL");
	elseif ($_GET['off'] == 1) $users_all = db::query("select * from user where `right` IS NULL");
	else $users_all = db::query("select * from user where `right` IS NULL");
	$page_result = mysqli_num_rows($users_all);

	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 50;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;

	// filter cours
	if ($_GET['on'] == 1) $users = db::query("select * from user where `right` IS NULL order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['off'] == 1) $users = db::query("select * from user where `right` IS NULL order by ins_dt desc limit $page_start, $page_age");
	else $users = db::query("select * from user where `right` IS NULL order by ins_dt desc limit $page_start, $page_age");



	// site setting
	$menu_name = 'users';
	$pod_menu_name = 'buyers';
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


		<? if (mysqli_num_rows($users) != 0): ?>

			<!--  -->
			<div class="ucours_t">
				<div class="ucours_tl">
					<div class="ucours_tm">
						<div class="ucours_tmi <?=($filter==0?'ucours_tm_act':'')?>">
							<i class="fal fa-sort ucours_tmic"></i>
							<span>Сортировка</span>
							<i class="fal fa-angle-down ucours_tmis"></i>
						</div>
					</div>
					<div class="ucours_tm">
						<div class="ucours_tmi <?=($filter==0?'ucours_tm_act':'')?>">
							<i class="fal fa-filter ucours_tmic"></i>
							<span>Все (<?=$page_result?>)</span>
							<i class="fal fa-angle-down ucours_tmis"></i>
						</div>
					</div>
				</div>
				<? if ($page_all > 1): ?>
					<div class="ucours_tr">
						<div class="ucours_trn">Страница: <?=$page?>/<?=$page_all?></div>
						<div class="ucours_trnc">
							<a class="ucours_trnci <?=($page>1?'':'ucours_trnci_ds')?>" href="/admin/users/all/?page=<?=$page-1?>"><i class="fal fa-angle-left"></i></a>
							<a class="ucours_trnci <?=($page<$page_all?'':'ucours_trnci_ds')?>" href="/admin/users/all/?page=<?=$page+1?>"><i class="fal fa-angle-right"></i></a>
						</div>
					</div>
				<? endif ?>
			</div>

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
						<!-- <div class="uc_uh_other">Телефон</div> -->
						<!-- <div class="uc_uh_other">Цена продажи</div> -->
						<!-- <div class="uc_uh_other">Количество</div> -->
					</div>
					<div class="uc_uh_cn"></div>
				</div>
				<div class="uc_uc">
					<? while ($buy_d = mysqli_fetch_assoc($users)): ?>
						<? $number++; ?>

						<div class="uc_ui">
							<div class="uc_uil">
								<div class="uc_ui_number"><?=$number?></div>
								<a class="uc_uiln" href="#/user/admin/users/item/?id=<?=$buy_d['id']?>">
									<div class="uc_ui_icon lazy_img" data-src="/assets/uploads/users/<?=$buy_d['img']?>"><?=($buy_d['img']!=null?'':'<i class="fal fa-user"></i>')?></div>
									<div class="uc_uinu">
										<div class="uc_ui_name"><?=$buy_d['name']?> <?=$buy_d['surname']?></div>
										<div class="uc_ui_phone"><?=$buy_d['phone']?></div>
									</div>
								</a>
								<!-- <div class="uc_uin_other"><?=$buy_d['phone']?></div> -->
								<!-- <div class="uc_uin_other"><?=$buy_d['sum']?> тг</div> -->
								<!-- <div class="uc_uin_other"><?=$buy_d['quantity']?> шт</div> -->
							</div>
							<div class="uc_uib">
								<div class="uc_uibo"><i class="fal fa-ellipsis-v"></i></div>
								<div class="menu_c uc_uibs">
									<!-- <div class="menu_ci cursor_none" data-title2="Доступ уақытын ауыстыру">
										<div class="menu_cin"><i class="fal fa-calendar-alt"></i></div>
										<div class="menu_cih">Доступ уақыты</div>
									</div>
									<div class="menu_ci sub_sms_send" data-title2="Смс қайта жіберу" data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-paper-plane"></i></div>
										<div class="menu_cih">СМС қайта жіберу</div>
									</div> -->
									<div class="menu_ci uc_uib_del " data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-trash-alt"></i></div>
										<div class="menu_cih">Удалить</div>
									</div>
								</div>
							</div>
						</div>
					<? endwhile ?>
				</div>
			</div>

			<? if ($page_all > 1): ?>
				<div class="uc_p">
					<? if ($page > 1): ?> <a class="uc_pi" href="/admin/users/all/?page=<?=$page-1?>"><i class="fal fa-angle-left"></i></a> <? endif ?>
					<a class="uc_pi <?=($page==1?'uc_pi_act':'')?>" href="/admin/users/all/?page=1">1</a>
					<? for ($pg = 2; $pg < $page_all; $pg++): ?>
						<? if ($pg == $page - 1): ?>
							<? if ($page - 1 != 2): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
							<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="/admin/users/all/?page=<?=$pg?>"><?=$pg?></a>
						<? endif ?>
						<? if ($pg == $page): ?> <a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="/admin/users/all/?page=<?=$pg?>"><?=$pg?></a> <? endif ?>
						<? if ($pg == $page + 1): ?>
							<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="/admin/users/all/?page=<?=$pg?>"><?=$pg?></a>
							<? if ($page + 1 != $page_all - 1): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
						<? endif ?>
					<? endfor ?>
					<a class="uc_pi <?=($page==$page_all?'uc_pi_act':'')?>" href="/admin/users/all/?page=<?=$page_all?>"><?=$page_all?></a>
					<? if ($page < $page_all): ?> <a class="uc_pi" href="/admin/users/all/?page=<?=$page+1?>"><i class="fal fa-angle-right"></i></a> <? endif ?>
				</div>
			<? endif ?>

		<? else: ?> <div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div> <? endif ?>

	</div>



<?php include "../../block/footer.php"; ?>