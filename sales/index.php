<? include "../config/core.php";

	// 
	if (!$user_id) header('location: /admin/');
	header('location: orders/');

	// site setting
	$menu_name = 'sales';
	$pod_menu_name = 'main';
	$site_set['header'] = true;
	$site_set['menu'] = true;
	$site_set['footer'] = false;
	$css = [];
	$js = [];
?>
<? include "../block/header.php"; ?>



<? include "../block/footer.php"; ?>