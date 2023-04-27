<?php include "../config/core.php";


	// 
	if(isset($_GET['product_img_add'])) {
		$path = '../assets/uploads/products/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$error = $success = '';
		$datetime = date('Ymd-His', time());

		if (!isset($_FILES['file'])) $error = 'Файлды жүктей алмады';
		else {
			$file = $_FILES['file'];
			if (!empty($file['error']) || empty($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			else {
				$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
				$name = mb_eregi_replace($pattern, '-', $file['name']);
				$name = mb_ereg_replace('[-]+', '-', $name);
				$parts = pathinfo($name);
				$name = $datetime.'-'.$name;

				if (empty($name) || empty($parts['extension'])) $error = 'Файлды жүктей алмады';
				elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) $error = 'Файлды жүктей алмады';
				elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) $error = 'Файлды жүктей алмады';
				else {
					if (move_uploaded_file($file['tmp_name'], $path . $name)) $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
					else $error = 'Файлды жүктей алмады';
				}
			}
		}
		
		if (!empty($error)) $error = '<p style="color:red">'.$error.'</p>';
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $name,
		);
		
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
		exit();
	}
   
   
   // product_add
	if(isset($_GET['product_add'])) {
		$name = strip_tags($_POST['name']);
		$catalog = strip_tags($_POST['catalog']);
		$brand = strip_tags($_POST['brand']);
		
		$article = strip_tags($_POST['article']);
		$barcode = strip_tags($_POST['barcode']);
		$price = strip_tags($_POST['price']);
		$purchase_price = strip_tags($_POST['purchase_price']);
		$discount_price = strip_tags($_POST['discount_price']);
		$img = strip_tags($_POST['img']);
		$color = strip_tags($_POST['color']);
		$size = strip_tags($_POST['size']);

		$quantity = strip_tags($_POST['quantity']);
		$warehouses_id = strip_tags($_POST['warehouses']);

		
      $id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product`")))['max(id)'] + 1;
      $ins = db::query("INSERT INTO `product`(`id`) VALUES ('$id')");
      if ($ins) {
         if ($name) $sql = db::query("UPDATE `product` SET `name_kz` = '$name', `name_ru` = '$name' WHERE `id`='$id'");
         if ($catalog) $sql = db::query("UPDATE `product` SET `catalog_id`='$catalog' WHERE `id`='$id'");
         if ($brand) {
				$brand_id = product::pr_brand_name($brand);
				if ($brand_id == 0) {
					$brand_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_ch_brand`")))['max(id)'] + 1;
					$ins = db::query("INSERT INTO `product_ch_brand`(`id`, `name`) VALUES ('$brand_id', '$brand')");
				}
				$upd = db::query("UPDATE `product` SET `brand_id`='$brand_id' WHERE `id`='$id'");
			}

			$item_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item`")))['max(id)'] + 1;
         if ($article) $ins_item = db::query("INSERT INTO `product_item`(`id`, `product_id`, `article`) VALUES ('$item_id', '$id', '$article')");
			if ($ins_item) {
				if ($barcode) $sql = db::query("UPDATE `product_item` SET `barcode`='$barcode' WHERE id = '$item_id'");
				if ($price) $sql = db::query("UPDATE `product_item` SET `price`='$price' WHERE id = '$item_id'");
				if ($purchase_price) $sql = db::query("UPDATE `product_item` SET `purchase_price`='$purchase_price' WHERE id = '$item_id'");
				if ($discount_price) $sql = db::query("UPDATE `product_item` SET `discount_price`='$discount_price' WHERE id = '$item_id'");
				if ($img) $sql = db::query("UPDATE `product_item` SET `img`='$img' WHERE id = '$item_id'");			
				if ($color) {
					$color_id = product::pr_color_name($color);
					if ($color_id == 0) {
						$color_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_color`")))['max(id)'] + 1;
						$ins = db::query("INSERT INTO `product_item_color`(`id`, `name_ru`) VALUES ('$color_id', '$color')");
					}
					$upd = db::query("UPDATE `product_item` SET `color_id` = '$color_id' WHERE id = '$item_id'");
				}
				if ($size) {
					$size_id = product::pr_size_name($size);
					if ($size_id == 0) {
						$size_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_size`")))['max(id)'] + 1;
						$ins = db::query("INSERT INTO `product_item_size`(`id`, `name`) VALUES ('$size_id', '$size')");
					}
					$upd = db::query("UPDATE `product_item` SET `size_id` = '$size_id' WHERE id = '$item_id'");
				}
				
				$view_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_quantity`")))['max(id)'] + 1;
				if ($warehouses_id) $ins_view = db::query("INSERT INTO `product_item_quantity`(`id`, `product_id`, `item_id`, `warehouses_id`) VALUES ('$view_id', '$id', '$item_id', '$warehouses_id')");
				if ($quantity) $upd = db::query("UPDATE `product_item_quantity` SET `quantity` = '$quantity' WHERE id = '$view_id'");
			}

         echo 'yes';
      } else echo 'error';

      exit();
	}
   
   // product arh
	if(isset($_GET['form_prd_online'])) {
		$id = strip_tags($_POST['id']);
		$val = strip_tags($_POST['val']);
		$upd = db::query("UPDATE `product` SET sale_online = '$val' WHERE id = '$id'");

      if ($upd) echo 'yes'; else echo 'error';
      exit();
	}


   // product arh
	if(isset($_GET['product_delete'])) {
		$id = strip_tags($_POST['id']);

      // $upd = db::query("DELETE FROM `product_item_quantity` WHERE product_id = '$id'");
      // $upd = db::query("DELETE FROM `product_item` WHERE product_id = '$id'");
		$upd = db::query("UPDATE `product` SET arh = 1 WHERE id = '$id'");
		$upd_item = db::query("UPDATE `product_item` SET arh = 1 WHERE product_id = '$id'");

      if ($upd) echo 'yes'; else echo 'error';
      exit();
	}

   // product_delete
	// if(isset($_GET['product_delete'])) {
	// 	$id = strip_tags($_POST['id']);

   //    $upd = db::query("DELETE FROM `product_item_quantity` WHERE product_id = '$id'");
   //    $upd = db::query("DELETE FROM `product_item` WHERE product_id = '$id'");
   //    $del = db::query("DELETE FROM `product` WHERE id = '$id'");

   //    if ($del) echo 'yes'; else echo 'error';
   //    exit();
	// }




	// product_barcode search
	if(isset($_GET['product_barcode'])) {
		$search = strip_tags($_POST['result']);

		$barcode = db::query("select * from product_item where (barcode = '$search' and barcode is not null) or (article = '$search' and article is not null) limit 1");
		if (mysqli_num_rows($barcode)) {
			$barcode_d = mysqli_fetch_array($barcode);
			echo $barcode_d['product_id'];
		} else echo 'none';

      exit();
	}