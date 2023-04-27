<? include "../../config/core.php";

	// 
	if (!$user_id) header('location: /admin/');


	// 
	// $users = db::query("select * from user where designer = 1 order by ins_dt desc limit 50");
	$designers = db::query("select * from user_designer");
	$filter = 0;

	// site setting
	$menu_name = 'users';
	$pod_menu_name = 'designers';
	$site_set['header'] = true;
	$site_set['menu'] = true;
	$site_set['footer'] = false;
	$css = [];
	$js = ['user/main'];
?>
<? include "../../block/header.php"; ?>
	
	<div class="">

		<!-- a header -->
		<? include "../aheader.php"; ?>


		<? if (mysqli_num_rows($designers) != 0): ?>

			<div class="ucours_t">
				<div class="ucours_tl">
					<div class="ucours_tm">
            		<div class="btn btn_cl designer_add_pop">
               		<i class="fal fa-plus"></i>
               		<span>Добавить</span>
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
						<div class="uc_uh_name">Дизайнер</div>
						<div class="uc_uh_other">Называние комп.</div>
						<div class="uc_uh_other">Instagram</div>
						<div class="uc_uh_other">Site</div>
						<div class="uc_uh_other">Дата</div>
					</div>
					<div class="uc_uh_cn"></div>
					<div class="uc_uh_cn"></div>
					<div class="uc_uh_cn"></div>
				</div>
				<div class="uc_uc">
					<? while ($designer_d = mysqli_fetch_assoc($designers)): ?>
						<? $sum++; $buy_d = fun::user($designer_d['user_id']); ?>

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
								<div class="uc_uin_other"><?=$designer_d['company_name']?></div>
								<div class="uc_uin_other">@<?=$designer_d['instagram']?></div>
								<div class="uc_uin_other"><?=$designer_d['site']?></div>
								<div class="uc_uin_other"><?=$designer_d['ins_dt']?></div>
							</div>
							<? if (!$buy_d['designer']): ?><div class="uc_uibo designer_btn_check" data-id="<?=$buy_d['id']?>"><i class="fal fa-check"></i></div>
							<? else: ?><div class="uc_uibo"></div><? endif ?>
							<div class="uc_uibo designer_edit_pop" data-id="<?=$buy_d['id']?>"><i class="fal fa-pen"></i></div>
							<div class="uc_uibo uc_uib_del designer_btn_delete" data-id="<?=$buy_d['id']?>"><i class="fal fa-trash-alt"></i></div>
						</div>
					<? endwhile ?>
				</div>
			</div>

		<? else: ?> <div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div> <? endif ?>

	</div>

<? include "../../block/footer.php"; ?>

	<div class="pop_bl pop_bl2 designer_add_block">
		<div class="pop_bl_a designer_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h4>Добавить .</h4>
				<div class="btn btn_dd designer_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">
					<!-- <div class="form_head">Основные:</div> -->
					<div class="form_im">
						<div class="form_span">Номер:</div>
						<input type="tel" class="form_im_txt fr_phone phone" placeholder="8 (___) ___-__-__" data-lenght="11" />
						<i class="fal fa-mobile form_icon"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Имя:</div>
						<input type="text" class="form_im_txt name" placeholder="" data-lenght="11" />
						<i class="fal fa-text form_icon"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Называние компания:</div>
						<input type="text" class="form_im_txt designer_compn" placeholder="" data-lenght="11" />
						<i class="fal fa-text form_icon"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Instagram:</div>
						<input type="url" class="form_im_txt designer_ins" placeholder="@" data-lenght="11" />
						<i class="fab fa-instagram form_icon"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Site:</div>
						<input type="url" class="form_im_txt designer_site" placeholder="" data-lenght="11" />
						<i class="fal fa-globe form_icon"></i>
					</div>
				</div>
				
				<div class="form_c">
					<div class="form_im">
						<div class="btn designer_add"><span>Добавить</span></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="pop_bl pop_bl2 designer_edit_block">
		<div class="pop_bl_a designer_edit_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h4>Изменить .</h4>
				<div class="btn btn_dd designer_edit_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl"></div>
		</div>
	</div>