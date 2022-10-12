<?php include "config/core.php";

	// 
	if (!$user_id) header('location: /sign.php');
	else header('location: /products');
	 
	
	// site setting
	$menu_name = 'home';
	$site_set['header'] = false;
	$site_set['footer'] = false;
	$css = [];
	$js = [];
?>
<? include "block/header.php"; ?>



<? include "block/footer.php"; ?>