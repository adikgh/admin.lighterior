<?php include "../../config/acore.php";

	// 
	if (!$user_id) header('location: /admin/');


	// site setting
	$menu_name = 'indicators';
	$site_set['header'] = true;
	$site_set['menu'] = true;
	$site_set['footer'] = false;
	$css = ['admin/main'];
	$js = ['admin/main'];

?>
<?php include "../block/header.php"; ?>

<div class="ds_nr"><i class="fal fa-ghost"></i><p>НЕТ</p></div>

<?php include "../block/footer.php"; ?>