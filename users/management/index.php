<?php include "../../config/core.php";

	// 
	if (!$user_id) header('location: /admin/');


	// filter user all
	if ($_GET['on'] == 1) $users_all = db::query("select * from user_management");
	elseif ($_GET['off'] == 1) $users_all = db::query("select * from user_management");
	else $users_all = db::query("select * from user_management");
	$page_result = mysqli_num_rows($users_all);

	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 50;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;

	// filter cours
	if ($_GET['on'] == 1) $staff = db::query("select * from user_management order by ins_dt desc limit $page_start, $page_age");
	elseif ($_GET['off'] == 1) $staff = db::query("select * from user_management order by ins_dt desc limit $page_start, $page_age");
	else $staff = db::query("select * from user_management order by ins_dt desc limit $page_start, $page_age");


	// site setting
	$menu_name = 'users';
	$pod_menu_name = 'management';
	$site_set['header'] = true;
	$site_set['menu'] = true;
	$site_set['footer'] = false;
	$css = [];
	$js = ['user/main'];
?>
<?php include "../../block/header.php"; ?>
	
	<div class="">

		<!-- a header -->
		<? include "../aheader.php"; ?>

		<? if (mysqli_num_rows($staff) != 0): ?>

			<!--  -->
			<div class="ucours_t">
				<div class="ucours_tl">
					<div class="ucours_tm">
						<div class="btn btn_cl user_staff_add_pop">
							<i class="fal fa-plus"></i>
							<span>Добавить сотрудника</span>
						</div>
					</div>
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
							<a class="ucours_trnci <?=($page>1?'':'ucours_trnci_ds')?>" href="/admin/users/staff/?page=<?=$page-1?>"><i class="fal fa-angle-left"></i></a>
							<a class="ucours_trnci <?=($page<$page_all?'':'ucours_trnci_ds')?>" href="/admin/users/staff/?page=<?=$page+1?>"><i class="fal fa-angle-right"></i></a>
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
						<div class="uc_uh_name">Сотрудник</div>
						<div class="uc_uh_other">Номер / Почта</div>
						<div class="uc_uh_other">Должность</div>
						<div class="uc_uh_other">Код</div>
					</div>
					<div class="uc_uh_cn"></div>
				</div>
				<div class="uc_uc">
					<? while ($buy_d = mysqli_fetch_assoc($staff)): ?>
						<? $number++; $user_d = fun::user($buy_d['user_id']); ?>

						<div class="uc_ui">
							<div class="uc_uil">
								<div class="uc_ui_number"><?=$number?></div>
								<a class="uc_uiln" href="#?id=<?=$buy_d['id']?>">
									<div class="uc_ui_icon lazy_img" data-src="https://lighterior.kz/assets/uploads/users/<?=$user_d['img']?>"><?=($user_d['img']!=null?'':'<i class="fal fa-user"></i>')?></div>
									<div class="uc_uinu">
										<div class="uc_ui_name"><?=$user_d['name']?> <?=$user_d['surname']?></div>
									</div>
								</a>
								<div class="uc_uin_other fr_phone"><?=$user_d['phone']?></div>
								<div class="uc_uin_other"><?=(fun::user_staff_name($buy_d['staff_id'], $lang))?></div>
								<div class="uc_uin_other"><?=$buy_d['code']?></div>
							</div>
							<div class="uc_uib">
								<div class="uc_uibo"><i class="fal fa-ellipsis-v"></i></div>
								<div class="menu_c uc_uibs">
									<div class="menu_ci ">
										<div class="menu_cin"><i class="fal fa-exchange"></i></div>
										<div class="menu_cih">Изменить должность</div>
									</div>
									<div class="menu_ci uc_uib_del user_staff_btn_delete" data-id="<?=$buy_d['id']?>">
										<div class="menu_cin"><i class="fal fa-trash-alt"></i></div>
										<div class="menu_cih">Удалить сотрудника</div>
									</div>
								</div>
							</div>
						</div>
					<? endwhile ?>
				</div>
			</div>

			<? if ($page_all > 1): ?>
				<div class="uc_p">
					<? if ($page > 1): ?> <a class="uc_pi" href="/admin/users/staff/?page=<?=$page-1?>"><i class="fal fa-angle-left"></i></a> <? endif ?>
					<a class="uc_pi <?=($page==1?'uc_pi_act':'')?>" href="/admin/users/staff/?page=1">1</a>
					<? for ($pg = 2; $pg < $page_all; $pg++): ?>
						<? if ($pg == $page - 1): ?>
							<? if ($page - 1 != 2): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
							<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="/admin/users/staff/?page=<?=$pg?>"><?=$pg?></a>
						<? endif ?>
						<? if ($pg == $page): ?> <a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="/admin/users/staff/?page=<?=$pg?>"><?=$pg?></a> <? endif ?>
						<? if ($pg == $page + 1): ?>
							<a class="uc_pi <?=($page==$pg?'uc_pi_act':'')?>" href="/admin/users/staff/?page=<?=$pg?>"><?=$pg?></a>
							<? if ($page + 1 != $page_all - 1): ?> <div class="uc_pi uc_pi_disp">...</div> <? endif ?>
						<? endif ?>
					<? endfor ?>
					<a class="uc_pi <?=($page==$page_all?'uc_pi_act':'')?>" href="/admin/users/staff/?page=<?=$page_all?>"><?=$page_all?></a>
					<? if ($page < $page_all): ?> <a class="uc_pi" href="/admin/users/staff/?page=<?=$page+1?>"><i class="fal fa-angle-right"></i></a> <? endif ?>
				</div>
			<? endif ?>

		<? else: ?> <div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div> <? endif ?>

	</div>

<? include "../../block/footer.php"; ?>

	<div class="pop_bl pop_bl2 user_staff_add_block">
		<div class="pop_bl_a user_staff_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h4>Добавить сотрудника</h4>
				<div class="btn btn_dd user_staff_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">
					<div class="form_head">Основные:</div>
					<div class="form_im">
						<div class="form_span">Имя сотрудника:</div>
						<input type="text" class="form_im_txt staff_name" placeholder="Введите имя" data-lenght="1">
						<i class="fal fa-text form_icon"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Номер сотрудника:</div>
						<input type="tel" class="form_im_txt fr_phone staff_phone" placeholder="8 (___) ___-__-__" data-lenght="11">
						<i class="fal fa-mobile form_icon"></i>
					</div>
					<div class="form_im form_sel">
						<div class="form_span">Должность сотрудника:</div>
						<i class="fal fa-user-tie form_icon"></i>
						<div class="form_im_txt sel_clc staff" data-val="">Выберите должность</div>
						<i class="fal fa-caret-down form_icon_sel"></i>
						<div class="form_im_sel sel_clc_i">
							<? $staff = db::query("select * from user_staff where view = 1"); ?>
							<? while ($staff_d = mysqli_fetch_assoc($staff)): ?>
								<div class="form_im_seli" data-val="<?=$staff_d['id']?>"><?=$staff_d['name_'.$lang]?></div>
							<? endwhile ?>
						</div>
					</div>
				</div>

				<!-- <div class="form_c">
					<div class="form_im form_im_toggle">
						<div class="form_span">Доп. инфо:</div>
						<input type="checkbox" class="info_inp" data-val="" />
						<div class="form_im_toggle_btn price1_clc"></div>
					</div>
					<div class="price1_bl">
						<div class="form_im">
							<div class="form_span">Закупочная цена:</div>
							<input type="tel" class="form_im_txt fr_price pr_purchase_price" placeholder="0" data-lenght="1">
							<i class="fal fa-tenge form_icon"></i>
						</div>
						<div class="form_im">
							<div class="form_span">Скидочная цена:</div>
							<input type="tel" class="form_im_txt fr_price pr_discount_price" placeholder="0" data-lenght="1">
							<i class="fal fa-tenge form_icon"></i>
						</div>
					</div>
				</div> -->
				
				<div class="form_c">
					<div class="form_im">
						<div class="btn user_staff_add"><span>Добавить</span></div>
					</div>
				</div>

			</div>
		</div>
	</div>