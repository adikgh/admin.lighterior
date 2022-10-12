<?php include "../../config/core.php";


   // pitem_minus
	if(isset($_GET['pitem_minus'])) {
		$id = strip_tags($_POST['id']);
      $pitem_d = product::pr_item($id);

      if ($pitem_d['quantity'] > 0) {
         $ubd = db::query("UPDATE `product_item` SET quantity = quantity - 1 WHERE `id`='$id'");
         echo 'yes';
      } else echo 'null';
      exit();
	}
   // pitem_plus
	if(isset($_GET['pitem_plus'])) {
		$id = strip_tags($_POST['id']);
      $upd = db::query("UPDATE `product_item` SET quantity = quantity + 1 WHERE `id`='$id'");
      if ($upd) echo 'yes'; else echo 'error';
      exit();
	}
   // pitem_delete
	if(isset($_GET['pitem_delete'])) {
		$id = strip_tags($_POST['id']);
      $del = db::query("DELETE FROM `product_item` WHERE `id`='$id'");
      if ($del) echo 'yes'; else echo 'error';
      exit();
   }


   // pitem_add 
	if(isset($_GET['pitem_add'])) {
		$product_id = strip_tags($_POST['id']);

      $article = strip_tags($_POST['article']);
		$price = strip_tags($_POST['price']);
		$barcode = strip_tags($_POST['barcode']);
		$purchase_price = strip_tags($_POST['purchase_price']);
		$discount_price = strip_tags($_POST['discount_price']);
		$img = strip_tags($_POST['img']);
      $color = strip_tags($_POST['color']);
		$size = strip_tags($_POST['size']);
      
		$warehouses_id = strip_tags($_POST['warehouses']);
		$quantity = strip_tags($_POST['quantity']);

      $id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item`")))['max(id)'] + 1;
      if ($article) $ins = db::query("INSERT INTO `product_item`(`id`, `product_id`, `article`) VALUES ('$id', '$product_id', '$article')");
      if ($ins) {
         if ($barcode) $sql = db::query("UPDATE `product_item` SET `barcode` = '$barcode' WHERE product_id = '$product_id' and id = '$id'");
         if ($price) $sql = db::query("UPDATE `product_item` SET `price` = '$price' WHERE product_id = '$product_id' and id = '$id'");
         if ($purchase_price) $sql = db::query("UPDATE `product_item` SET `purchase_price` = '$purchase_price' WHERE product_id = '$product_id' and id = '$id'");
         if ($discount_price) $sql = db::query("UPDATE `product_item` SET `discount_price` = '$discount_price' WHERE product_id = '$product_id' and id = '$id'");
         if ($img) $sql = db::query("UPDATE `product_item` SET `img` = '$img' WHERE product_id = '$product_id' and id = '$id'");
         if ($color) {
            $color_id = product::pr_color_name($color);
            if ($color_id == 0) {
               $color_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_color`")))['max(id)'] + 1;
               $ins = db::query("INSERT INTO `product_item_color`(`id`, `name_ru`) VALUES ('$color_id', '$color')");
            }
            $upd = db::query("UPDATE `product_item` SET `color_id`='$color_id' WHERE product_id = '$product_id' and id = '$id'");
         }
         if ($size) {
            $size_id = product::pr_size_name($size);
            if ($size_id == 0) {
               $size_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_size`")))['max(id)'] + 1;
               $ins = db::query("INSERT INTO `product_item_size`(`id`, `name`) VALUES ('$size_id', '$size')");
            }
            $upd = db::query("UPDATE `product_item` SET `size_id`='$size_id' WHERE product_id = '$product_id' and id = '$id'");
         }

         $view_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_quantity`")))['max(id)'] + 1;
         if ($warehouses_id) $ins_view = db::query("INSERT INTO `product_item_quantity`(`id`, `product_id`, `item_id`, `warehouses_id`) VALUES ('$view_id', '$product_id', '$id', '$warehouses_id')");
         if ($quantity) $upd = db::query("UPDATE `product_item_quantity` SET `quantity` = '$quantity' WHERE id = '$view_id'");

         echo 'yes';
      } else echo 'error';
      exit();
	}


   // pitem_upd 
	if(isset($_GET['pitem_upd'])) {
		$id = strip_tags($_POST['id']);
      $article = strip_tags($_POST['article']);
		$barcode = strip_tags($_POST['barcode']);
		$quantity = strip_tags($_POST['quantity']);
		$price = strip_tags($_POST['price']);
		$purchase_price = strip_tags($_POST['purchase_price']);
		$discount_price = strip_tags($_POST['discount_price']);
      $color = strip_tags($_POST['color']);
		$size = strip_tags($_POST['size']);
		$img = strip_tags($_POST['img']);

		$pitem_d = product::pr_item($id);
		$product_id = $pitem_d['product_id'];
      $product_d = product::product($product_id);

      if ($article) $upd = db::query("UPDATE `product_item` SET `article` = '$article' WHERE id = '$id'");
      if ($barcode) $upd = db::query("UPDATE `product_item` SET `barcode` = '$barcode' WHERE id = '$id'");
      if ($quantity) $upd = db::query("UPDATE `product_item` SET `quantity` = '$quantity' WHERE id = '$id'");
      if ($price) $upd = db::query("UPDATE `product_item` SET `price` = '$price' WHERE id = '$id'");
      if ($purchase_price) $upd = db::query("UPDATE `product_item` SET `purchase_price` = '$purchase_price' WHERE id = '$id'");
      if ($discount_price) $upd = db::query("UPDATE `product_item` SET `discount_price` = '$discount_price' WHERE id = '$id'");
      if ($img) $upd = db::query("UPDATE `product_item` SET `img` = '$img' WHERE id = '$id'");

      if ($color) {
         $color_id = product::pr_color_name($color);
         if ($color_id == 0) {
            $color_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_color`")))['max(id)'] + 1;
            $ins = db::query("INSERT INTO `product_item_color`(`id`, `name_ru`) VALUES ('$color_id', '$color')");
         }
         $upd = db::query("UPDATE `product_item` SET `color_id` = '$color_id' WHERE id = '$id'");
      }
      if ($size) {
         $size_id = product::pr_size_name($size);
         if ($size_id == 0) {
            $size_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_item_size`")))['max(id)'] + 1;
            $ins = db::query("INSERT INTO `product_item_size`(`id`, `name`) VALUES ('$size_id', '$size')");
         }
         $upd = db::query("UPDATE `product_item` SET `size_id` = '$size_id' WHERE id = '$id'");
      }

      echo 'yes';
      exit();
	}
   


   // pr_upd
	if(isset($_GET['pr_upd'])) {
		$id = strip_tags($_POST['id']);
      $name = strip_tags($_POST['name']);
		$catalog_id = strip_tags($_POST['catalog']);
		$brand = strip_tags($_POST['brand']);
		$country = strip_tags($_POST['country']);
		$collection = strip_tags($_POST['collection']);
		$style = strip_tags($_POST['style']);

      if ($name) $upd = db::query("UPDATE `product` SET `name_kz` = '$name', `name_ru` = '$name', `upd_dt` = '$datetime' WHERE id = '$id'");
      if ($catalog_id) $upd = db::query("UPDATE `product` SET `catalog_id` = '$catalog_id', `upd_dt` = '$datetime' WHERE id = '$id'");
      if ($brand) {
         $brand_id = product::pr_brand_name($brand);
         if ($brand_id == 0) {
            $brand_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_ch_brand`")))['max(id)'] + 1;
            $ins = db::query("INSERT INTO `product_ch_brand`(`id`, `name`) VALUES ('$brand_id', '$brand')");
         }
         $upd = db::query("UPDATE `product` SET `brand_id`='$brand_id', `upd_dt` = '$datetime' WHERE id = '$id'");
      }
      if ($country) {
         $country_id = product::pr_country_name($country);
         if ($country_id == 0) {
            $country_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_ch_country`")))['max(id)'] + 1;
            $ins = db::query("INSERT INTO `product_ch_country`(`id`, `name_kz`, `name_ru`) VALUES ('$country_id', '$country', '$country')");
         }
         $upd = db::query("UPDATE `product` SET `brand_country_id`='$country_id', `upd_dt` = '$datetime' WHERE id = '$id'");
      }
      if ($collection) {
         $collection_id = product::pr_collection_name($collection);
         if ($collection_id == 0) {
            $collection_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_ch_collection`")))['max(id)'] + 1;
            $ins = db::query("INSERT INTO `product_ch_collection`(`id`, `name_kz`, `name_ru`) VALUES ('$collection_id', '$collection', '$collection')");
         }
         $upd = db::query("UPDATE `product` SET `collection_id`='$collection_id', `upd_dt` = '$datetime' WHERE id = '$id'");
      }
      if ($style) {
         $style_id = product::pr_style_name($style);
         if ($style_id == 0) {
            $style_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `product_ch_style`")))['max(id)'] + 1;
            $ins = db::query("INSERT INTO `product_ch_style`(`id`, `name_kz`, `name_ru`) VALUES ('$style_id', '$style', '$style')");
         }
         $upd = db::query("UPDATE `product` SET `style_id`='$style_id', `upd_dt` = '$datetime' WHERE id = '$id'");
      }

      echo 'yes';
      exit();
	}