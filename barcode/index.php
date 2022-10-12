<? include "../config/core.php";


	$code = 2600110020820;
	$code = '0123456789';
	$price = false;
	$name = false;
	if ($_GET['code']) $code = $_GET['code'];
	if ($_GET['price']) $price = $_GET['price'];
	if ($_GET['name']) $name = $_GET['name'];

	
	// site setting
	$menu_name = 'barcode';
	$pod_menu_name = 'main';
	$site_set['header'] = false;
	// $site_set['menu'] = false;
	$site_set['footer'] = false;
	$css = ['barcode'];
	$js = ['barcode'];
?>
<? include "../block/header.php"; ?>

	<div class="">

		<div class="print">
			<div class="print_l">
				<div class="form_c">
					<div class="form_im">
						<div class="form_span">Штрих код:</div>
						<input type="tel" class="form_im_txt code_select" value="<?=$code?>" maxLength="11">
						<i class="fal fa-barcode form_icon"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Цена:</div>
						<input type="tel" class="form_im_txt fr_price price_select" value="<?=$price?>" maxLength="11" >
						<i class="fal fa-tenge form_icon"></i>
						<i class="fal fa-times form_icon_sel price_delete"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Наименование товара:</div>
						<input type="text" class="form_im_txt name_select" value="<?=$name?>" >
						<i class="fal fa-text form_icon"></i>
						<i class="fal fa-times form_icon_sel name_delete"></i>
					</div>
					<div class="form_im">
						<div class="form_span">Размер бумагы:</div>
						<div class="f">
							<div class="fi" data-ssc="0.58" data-sw="113.814315" data-sh="75.87621">30х20</div>
							<div class="fi" data-ssc="0.75" data-sw="151.75242000001" data-sh="94.8452625">40х25</div>
							<div class="fi" data-ssc="1" data-sw="220.04100900001" data-sh="113.814315">58х30</div>
							<div class="fi" data-ssc="1" data-sw="220.04100900001" data-sh="151.75242000001">58х40</div>
							<div class="fi fi_act" data-ssc="1" data-sw="220.04100900001" data-sh="227.62863000001">58х60</div>
						</div>
					</div>
					<div class="form_im">
						<div class="b">
							<div class="btn onPrint">Печатать</div>
						</div>
					</div>
				</div>
			</div>
			<div class="print_r">
				<div class="print_bl">
					<div class="print_bl_c">
						<div class="print_bl_name <?=($name?'':'dsp_n')?>"><?=$name?></div>
						<div class="print_bl_code barcode_128"><?=$code?></div>
						<div class="print_bl_price <?=($price?'':'dsp_n')?> fr_price"><?=$price?></div>
					</div>
				</div>
			</div>
		</div>

	</div>

<? include "../block/footer.php"; ?>