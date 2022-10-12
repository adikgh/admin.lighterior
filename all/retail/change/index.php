<?php include "../../../config/acore.php";

	// 
	if (!$user_id) header('location: /admin/');



	// site setting
	$menu_name = 'change';
	$site_set['header'] = true;
	$site_set['menu'] = false;
	$site_set['retail_menu'] = true;
	$site_set['search'] = false;
	$css = ['admin/retail/orders'];
	$js = ['admin/retail/orders'];
?>
<?php include "../../block/header.php"; ?>

	<div class="">



	</div>

<?php include "../../block/footer.php"; ?>