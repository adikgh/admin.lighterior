<? if ($site_set['header'] == true): ?>
	<div class="aheader <?=($site_set['mheader']!='false'?'':'mheader_none')?>">
		<div class="bl_c">
			<div class="aheader_c">
				<a class="alogo" href="/">Lighterior Admin</a>
				<div class="ahead">
					<div class="ahead_l">
						<? if ($site_set['search'] == true): ?>
							<div class="aserach">
								<input type="text" class="form_im_txt" placeholder="Поиск что угодно?">
								<i class="fal fa-search form_icon"></i>
							</div>
						<? endif ?>
					</div>
					<div class="ahead_r">
						<div class="ahead_rn">
							<div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-bell"></i></div>
							</div>
							<div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-tasks"></i></div>
							</div>
							<!-- <div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-comment-alt-lines"></i></div>
							</div> -->
							<div class="ahead_rni">
								<div class="ahead_rnicon"><i class="fal fa-cog"></i></div>
							</div>
						</div>
						<div class="ub1_lx">
							<div class="ub1_lt" href="/user/">
								<div class="ub1_ltf">
									<div class=""><?=$user['name']?> <?=($user['surname']?substr($user['surname'],0,1).'.':'')?></div>
									<span><?=fun::user_staff_name($user_right['staff_id'], $lang)?></span>
								</div>
								<div class="ub1_lti lazy_img" data-src="https://lighterior.kz/assets/uploads/users/<?=$user['img']?>"><? if (!$user['img']): ?><i class="fal fa-user"></i><? endif ?></div>
							</div>
							<div class="menu_c">
								<a class="menu_ci" href="/">
									<div class="menu_cin"><i class="fal fa-user"></i></div>
									<div class="menu_cih">Аккаунт</div>
								</a>
								<a class="menu_ci" href="/exit.php">
									<div class="menu_cin"><i class="fal fa-sign-out"></i></div>
									<div class="menu_cih">Выход</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<? endif ?>

<? if ($site_set['menu'] == true): ?>
	<div class="ub1_l">
		<div class="bl_c">
			<div class="umenu_c">
				<!-- <div class="umenu_co">Меню</div> -->
				<!-- <a class="umenu_ci <?=($menu_name=='home'?'menu_ci_act':'')?>" href="/">
					<div class="umenu_cin"><i class="fal fa-chalkboard-teacher"></i></div>
					<div class="umenu_cih">Главная</div>
				</a> -->
				<!-- <div class="umenu_ci <?=($menu_name=='indicators'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/indicators/">
						<div class="umenu_cin"><i class="fal fa-poll"></i></div>
						<div class="umenu_cih">Показатели</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-poll"></i></div>
							<div class="umenu_cih">Аналитика</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-poll"></i></div>
							<div class="umenu_cih">Документы</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-poll"></i></div>
							<div class="umenu_cih">Корзина</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-poll"></i></div>
							<div class="umenu_cih">Аудит</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-poll"></i></div>
							<div class="umenu_cih">Файлы</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-poll"></i></div>
							<div class="umenu_cih">Отчёты</div>
						</a>
					</div>
				</div> -->

				<!-- <div class="umenu_ci <?=($menu_name=='retail'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/retail">
						<div class="umenu_cin"><i class="fal fa-store"></i></div>
						<div class="umenu_cih">Розница</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<a class="umenu_ci <?=($menu_name=='cashbox'?'menu_ci_act':'')?>" href="/retail/cashbox">
							<div class="umenu_cin"><i class="fal fa-cash-register"></i></div>
							<div class="umenu_cih">Касса</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='retail_orders'?'menu_ci_act':'')?>" href="/sales/retail/">
							<div class="umenu_cin"><i class="fal fa-badge-check"></i></div>
							<div class="umenu_cih">Розничные продажи</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='retail1'?'menu_ci_act':'')?>" href="/sales/retail/returns.php">
							<div class="umenu_cin"><i class="fal fa-undo-alt"></i></div>
							<div class="umenu_cih">Возвраты</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-people-carry"></i></div>
							<div class="umenu_cih">Смены</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='point_sale'?'menu_ci_act':'')?>" href="/retail/point-sale/">
							<div class="umenu_cin"><i class="fal fa-store-alt"></i></div>
							<div class="umenu_cih">Точки продаж</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-cash-register"></i></div>
							<div class="umenu_cih">Очередь облачных чеков</div>
						</a>
					</div>
				</div> -->

				<div class="umenu_ci <?=($menu_name=='products'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/products/">
						<div class="umenu_cin"><i class="fal fa-box"></i></div>
						<div class="umenu_cih">Товары</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<!-- <a class="umenu_ci <?=($pod_menu_name=='products_add'?'menu_ci_act':'')?>" href="/products/add/">
							<div class="umenu_cin"><i class="fal fa-plus"></i></div>
							<div class="umenu_cih">Добавить товар</div>
						</a> -->
						<a class="umenu_ci <?=($pod_menu_name=='all'?'menu_ci_act':'')?>" href="/products/all/">
							<div class="umenu_cin"><i class="fal fa-boxes-alt"></i></div>
							<div class="umenu_cih">Все товары</div>
						</a>
						<a class="umenu_ci <?=($pod_menu_name=='remains'?'menu_ci_act':'')?>" href="/products/remains/">
							<div class="umenu_cin"><i class="fal fa-box-check"></i></div>
							<div class="umenu_cih">Остатки</div>
						</a>
						<a class="umenu_ci <?=($pod_menu_name=='displacement'?'menu_ci_act':'')?>" href="/products/displacement/">Перемещения</a>
						<a class="umenu_ci <?=($pod_menu_name=='warehouses'?'menu_ci_act':'')?>" href="/products/warehouses/">
							<div class="umenu_cin"><i class="fal fa-warehouse-alt"></i></div>
							<div class="umenu_cih">Склады</div>
						</a>
						<!-- <a class="umenu_ci <?=($menu_name=='ss'?'menu_ci_act':'')?>" href="/products/all">
							<div class="umenu_cin"><i class="fal fa-dolly"></i></div>
							<div class="umenu_cih">Закупки</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='setp'?'menu_ci_act':'')?>" href="/products/color">
							<div class="umenu_cin"><i class="fal fa-tasks"></i></div>
							<div class="umenu_cih">Параметры товаров</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-tags"></i></div>
							<div class="umenu_cih">Обороты</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-tags"></i></div>
							<div class="umenu_cih">Прайс-листы</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-tags"></i></div>
							<div class="umenu_cih">Сер. номера</div>
						</a> -->
					</div>
				</div>

				<div class="umenu_ci <?=($menu_name=='barcode'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/barcode/">
						<div class="umenu_cih">Штрих коды</div>
					</div>
				</div>

				<div class="umenu_ci <?=($menu_name=='sales'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/sales/">
						<div class="umenu_cin"><i class="fal fa-clipboard-list-check"></i></div>
						<div class="umenu_cih">Продажи</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<a class="umenu_ci <?=($pod_menu_name=='retail'?'menu_ci_act':'')?>" href="/sales/retail/">
							<div class="umenu_cin"><i class="fal fa-badge-check"></i></div>
							<div class="umenu_cih">Розничные продажи</div>
						</a>
						<a class="umenu_ci <?=($pod_menu_name=='orders'?'menu_ci_act':'')?>" href="/sales/orders/">
							<div class="umenu_cin"><i class="fal fa-shopping-bag"></i></div>
							<div class="umenu_cih">Онлайн заказы</div>
						</a>
						<a class="umenu_ci <?=($pod_menu_name=='returns'?'menu_ci_act':'')?>" href="/sales/retail/returns.php">
							<div class="umenu_cin"><i class="fal fa-undo-alt"></i></div>
							<div class="umenu_cih">Возвраты</div>
						</a>
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-file-invoice-dollar"></i></div>
							<div class="umenu_cih">Счета</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-box-up"></i></div>
							<div class="umenu_cih">Отгрузки</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-clipboard-list-check"></i></div>
							<div class="umenu_cih">Счета-фактуры выданные</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-clipboard-list-check"></i></div>
							<div class="umenu_cih">Отчеты комиссионера</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-sack-dollar"></i></div>
							<div class="umenu_cih">Прибыльность</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-clipboard-list-check"></i></div>
							<div class="umenu_cih">Товары на реализации</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-clipboard-list-check"></i></div>
							<div class="umenu_cih">Воронка продаж</div>
						</a> -->
						<!-- <a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-receipt"></i></div>
							<div class="umenu_cih">Чеки</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='dashboard'?'menu_ci_act':'')?>" href="/">
							<div class="umenu_cin"><i class="fal fa-hand-holding-box"></i></div>
							<div class="umenu_cih">Курьеры</div>
						</a> -->
					</div>
				</div>
			<!-- </div> -->

			<!-- <div class="umenu_c"> -->
				<!-- <div class="umenu_co">Онлайн</div> -->
				<div class="umenu_ci <?=($menu_name=='users'?'menu_ci_act':'')?>">		
					<div class="umenu_ci2" href="/users/">
						<div class="umenu_cin"><i class="fal fa-users"></i></div>
						<div class="umenu_cih">Пользователи</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<a class="umenu_ci <?=($menu_name=='all_users'?'menu_ci_act':'')?>" href="/users/">
							<div class="umenu_cin"><i class="fal fa-users"></i></div>
							<div class="umenu_cih">Все пользователи</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='4'?'menu_ci_act':'')?>" href="/orders1/">
							<div class="umenu_cin"><i class="fal fa-shopping-bag"></i></div>
							<div class="umenu_cih">Покупателей</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='4'?'menu_ci_act':'')?>" href="/orders1/">
							<div class="umenu_cin"><i class="fal fa-shopping-bag"></i></div>
							<div class="umenu_cih">Контрагенты</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='4'?'menu_ci_act':'')?>" href="/users/management/">
							<div class="umenu_cin"><i class="fal fa-shopping-bag"></i></div>
							<div class="umenu_cih">Сотрудники</div>
						</a>
						<!-- <a class="umenu_ci <?=($menu_name=='reviews'?'menu_ci_act':'')?>" href="/user/reviews">
							<div class="umenu_cin"><i class="fal fa-comment-alt-lines"></i></div>
							<div class="umenu_cih">Пікірлер</div>
						</a> -->
					</div>
				</div>
				<!-- <div class="umenu_ci <?=($menu_name=='orders'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/sales/orders/">
						<div class="umenu_cin"><i class="fal fa-shopping-bag"></i></div>
						<div class="umenu_cih">Заказы</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						
					</div>
				</div> -->
			<!-- </div> -->
			<!-- <div class="umenu_c"> -->
				<!-- <div class="umenu_co">Компания</div> -->
				<!-- <div class="umenu_ci <?=($menu_name=='monay'?'menu_ci_act':'')?>">
					<div class="umenu_ci2"  href="/monay/">
						<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
						<div class="umenu_cih">Деньги</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih">Все платежи</div>
						</a>
						<div class="umenu_ci">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih"> <? //if (get_balance()): ?> <?//=get_balance();?> тг <?// else: ?> Белгісіз <?// endif ?> </div>
						</div>
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih">Движение денежных средств</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih">Прибыли и убытки</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih">Взаиморасчеты</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih">Корректировки</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-wallet"></i></div>
							<div class="umenu_cih">Финансы</div>
						</a>
					</div>
				</div> -->
				<!-- <div class="umenu_ci <?=($menu_name=='company'?'menu_ci_act':'')?>" >
					<div class="umenu_ci2" href="/company/">
						<div class="umenu_cin"><i class="fal fa-award"></i></div>
						<div class="umenu_cih">Мой компания</div>
					</div>
					<div class="umenu_cia umenu_cc2">
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-award"></i></div>
							<div class="umenu_cih">Сотрудники</div>
						</a>
						<a class="umenu_ci <?=($menu_name=='homework'?'menu_ci_act':'')?>" href="/user/homework/admin">
							<div class="umenu_cin"><i class="fal fa-award"></i></div>
							<div class="umenu_cih">Должности</div>
						</a>
					</div>
				</div> -->
			</div>
			<!-- <div class="ub1_lb">
				<div class="footer_bl">© <?=$site['name']?>, 2022</div>
				<div class="footer_br">
					<a href="https://gprog.kz" target="_blank" class="gprog_bl">
						<span>Сделано в #gprog</span>
					</a>
				</div>
			</div> -->
		</div>
	</div>
<? endif ?>

<? if ($site_set['pmenu'] == true): ?>
   <div class="pmenu">
      <div class="pmenu_c">
			<a class="pmenu_i <?=($menu_name=='cours'?'pmenu_i_act':'')?>" href="/cours/">
				<i class="fal fa-graduation-cap"></i>
				<span>Home</span>
			</a>
			<a class="pmenu_i <?=($menu_name=='cours'?'pmenu_i_act':'')?>" href="/cours/">
				<i class="fal fa-graduation-cap"></i>
				<span>Продукты</span>
			</a>
			<a class="pmenu_i <?=($menu_name=='cours'?'pmenu_i_act':'')?>" href="/cours/all.php">
				<i class="fal fa-graduation-cap"></i>
				<span>Курстар</span>
			</a>
			<a class="pmenu_i <?=($menu_name=='sub'?'pmenu_i_act':'')?>" href="/sub/">
				<i class="fal fa-users-class"></i>
				<span>Клуб</span>
			</a>
         <a class="pmenu_i <?=($menu_name=='user'?'pmenu_i_act':'')?>" href="/">
            <i class="fal fa-user"></i>
            <span>Аккаунтым</span>
         </a>
      </div>
   </div>
<? endif ?>