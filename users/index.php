<?php include "../config/core.php";

	// 
	if (!$user_id) header('location: /admin/');
	header('location: all/');


	// 
	$orders = db::query("select * from user order by ins_dt desc limit 50");
	$filter = 0;

	// site setting
	$menu_name = 'users';
	$site_set['header'] = true;
	$site_set['menu'] = true;
	$site_set['footer'] = false;
	$css = [];
	$js = [];
?>
<? include "block/header.php"; ?>
	
	<div class="">

		
	</div>

<? include "block/footer.php"; ?>