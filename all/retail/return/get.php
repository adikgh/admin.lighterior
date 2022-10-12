<?php include "../../../config/acore.php";
   // 

	if(isset($_GET['cashbox_add'])) {
      $pid = strip_tags($_POST['id']);
		$oid = strip_tags($_POST['oid']);

		$pitem_id = strip_tags($_POST['item_id']);
      $pitem_d = product::pr_item($pitem_id);
      $price = $pitem_d['price'];

      $retailop = db::query("select * from retail_returns_products where return_id = '$oid' and product_id = '$pid' and product_item_id = '$pitem_id'");
      if (mysqli_num_rows($retailop)) $upd = db::query("UPDATE `retail_returns_products` SET quantity = quantity + 1 WHERE `return_id`='$oid' and `product_id`='$pid' and product_item_id = '$pitem_id'");
      else $ins = db::query("INSERT INTO `retail_returns_products`(`return_id`, `product_id`, `product_item_id`, `quantity`, `price`) VALUES ('$oid', '$pid', '$pitem_id', 1, '$price')");
      if ($upd || $ins) echo 'yes';

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' and warehouses_id = 5");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];
         $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity + 1 WHERE id = '$quantity_id'");
      } else $ins = db::query("INSERT INTO `product_item_quantity`(`product_id`, `item_id`, `warehouses_id`, `quantity`) VALUES ('$pid', '$pitem_id', 5, 1)");

      exit();
	}


   // cashbox_search
   if(isset($_GET['cashbox_search'])) {
		$inp = strip_tags($_POST['inp']);
		$oid = strip_tags($_POST['oid']);

      $pitem = db::query("select * from product_item where barcode = '$inp'");
      if (mysqli_num_rows($pitem)) {
         $pitem_d = mysqli_fetch_assoc($pitem);
         $pitem_id = $pitem_d['id'];
         $product_d = product::product($pitem_d['product_id']);
         $product_id = $pitem_d['product_id'];

         if ($product_d['onSale']) {
            $retailop = db::query("select * from retail_returns_products where return_id = '$oid' and product_id = '$product_id' and product_item_id = '$pitem_id'");
            if (mysqli_num_rows($retailop)) $upd = db::query("UPDATE `retail_returns_products` SET quantity = quantity + 1 WHERE `return_id`='$oid' and `product_id`='$product_id' and product_item_id = '$pitem_id'");
            else $ins = db::query("INSERT INTO `retail_returns_products`(`return_id`, `product_id`, `product_item_id`, `quantity`) VALUES ('$oid', '$product_id', '$pitem_id', 1)");
            $upd2 = db::query("UPDATE `product_item` SET quantity = quantity + 1 WHERE id = '$pitem_id'");
            if ($upd || $ins) echo 'yes';
         } else echo 0;
      } else echo 'none';

      exit();
	}

   
   // cashbox_remove
	if(isset($_GET['cashbox_remove'])) {
		$id = strip_tags($_POST['id']);
      $retailop_d = fun::retail_returnsp($id);
      $pitem_id = $retailop_d['product_item_id'];
      $qn = $retailop_d['quantity'];

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' and warehouses_id = 5");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];
         $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity - '$qn' WHERE id = '$quantity_id'");
      } else echo 0;

      $del = db::query("DELETE FROM `retail_returns_products` where id = '$id'");
      if ($del) echo 'yes';

      exit();
	}
   
   
   // cashbox_minus
	if(isset($_GET['cashbox_minus'])) {
		$id = strip_tags($_POST['id']);
      $retailop_d = fun::retail_returnsp($id);
      $pitem_id = $retailop_d['product_item_id'];

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' and warehouses_id = 5");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];
         $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity - 1 WHERE id = '$quantity_id'");
      } else echo 0;

      $upd = db::query("UPDATE `retail_returns_products` SET quantity = quantity - 1 WHERE id = '$id'");
      if ($upd) echo 'yes';
      
      exit();
	}
   
   
   // cashbox_plus
	if(isset($_GET['cashbox_plus'])) {
		$id = strip_tags($_POST['id']);
      $retailop_d = fun::retail_returnsp($id);
      $pitem_id = $retailop_d['product_item_id'];

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' and warehouses_id = 5");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];
         $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity + 1 WHERE id = '$quantity_id'");
      } else echo 0;

      $upd = db::query("UPDATE `retail_returns_products` SET quantity = quantity + 1 WHERE `id`='$id'");
      if ($upd) echo 'yes';
		
      exit();
	}


   // cashbox_pay
	if(isset($_GET['cashbox_pay'])) {
		$id = strip_tags($_POST['id']);

      $total = 0; $quantity = 0;
      $rr = db::query("select quantity, price from retail_returns_products where return_id = '$id'");
		if (mysqli_num_rows($rr)) { 
         while ($rr_d = mysqli_fetch_array($rr)) {
            $total = $total + ($rr_d['quantity'] * $rr_d['price']);
            $quantity = $quantity + $rr_d['quantity'];
         }
      }

      $upd = db::query("UPDATE `retail_returns` SET `returns` = 1, `total` = $total, `quantity` = $quantity, `upd_dt` = '$datetime' WHERE `id` = '$id'");
      $ins = db::query("INSERT INTO `retail_returns`(`user_id`) VALUES ('$user_id')");

      if ($upd && $ins) echo 'yes';
      exit();
	}