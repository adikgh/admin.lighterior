<?php include "../../../config/acore.php";
   
   
   // 
	if(isset($_GET['cashbox_add'])) {
      $pid = strip_tags($_POST['id']);
		$oid = strip_tags($_POST['oid']);
      
      $pitem_id = strip_tags($_POST['item_id']);
      $pitem_d = product::pr_item($pitem_id);
      if ($pitem_d['price']) $price = $pitem_d['price']; else $price = 0;

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' and quantity != 0 limit 1");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];
   
         $retailop = db::query("select * from retail_orders_products where order_id = '$oid' and product_item_id = '$pitem_id'");
         if (mysqli_num_rows($retailop)) $upd = db::query("UPDATE `retail_orders_products` SET quantity = quantity + 1 WHERE `order_id`='$oid' and product_item_id = '$pitem_id'");
         else $ins = db::query("INSERT INTO `retail_orders_products`(`order_id`, `product_id`, `product_item_id`, `quantity`, `price`) VALUES ('$oid', '$pid', '$pitem_id', 1, $price)");
         
         $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity - 1 WHERE id = '$quantity_id'");
         if ($upd || $ins) echo 'yes';
      } else echo 0;

      exit();
	}


   // cashbox_search
   if(isset($_GET['cashbox_search'])) {
		$search = strip_tags($_POST['inp']);
		$oid = strip_tags($_POST['oid']);

      $pitem = db::query("select * from product_item where (barcode = '$search' and barcode is not null) or (article = '$search' and article is not null)");
      if (mysqli_num_rows($pitem)) {
         $pitem_d = mysqli_fetch_assoc($pitem);
         $pitem_id = $pitem_d['id'];
         $product_d = product::product($pitem_d['product_id']);
         $product_id = $pitem_d['product_id'];
         if ($pitem_d['price']) $price = $pitem_d['price']; else $price = 0;

         $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' and quantity != 0 limit 1");
         if (mysqli_num_rows($quantity)) {
            $quantity = mysqli_fetch_array($quantity);
            $quantity_id = $quantity['id'];

            $retailop = db::query("select * from retail_orders_products where order_id = '$oid' and product_id = '$product_id' and product_item_id = '$pitem_id'");
            if (mysqli_num_rows($retailop))  $upd = db::query("UPDATE `retail_orders_products` SET quantity = quantity + 1 WHERE `order_id`='$oid' and `product_id`='$product_id' and product_item_id = '$pitem_id'");
            else $ins = db::query("INSERT INTO `retail_orders_products`(`order_id`, `product_id`, `product_item_id`, `quantity`, `price`) VALUES ('$oid', '$product_id', '$pitem_id', 1, $price)");

            $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity - 1 WHERE id = '$quantity_id'");
            if ($upd || $ins) echo 'yes';
         } else echo 0;
      } else echo 'none';
      exit();
	}


   // cashbox_pr
	if(isset($_GET['cashbox_pr'])) {
		$id = strip_tags($_POST['id']);
		$pr = strip_tags($_POST['pr']);
      
      $upd = db::query("UPDATE `retail_orders_products` SET price = '$pr' WHERE `id`='$id'");
      if ($upd) echo 'yes'; else echo 'none';

      exit();
	}


   // cashbox_qn
	if(isset($_GET['cashbox_qn'])) {
		$id = strip_tags($_POST['id']);
		$qn = strip_tags($_POST['qn']);
      $retailop_d = fun::retailop($id);
      $pitem_id = $retailop_d['product_item_id'];
      $pitem_d = product::pr_item($pitem_id);

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' limit 1");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];

         $min_qn = ($quantity['quantity'] + $retailop_d['quantity']) - $qn;
         $upd = db::query("UPDATE `product_item_quantity` SET quantity = '$min_qn' WHERE id = '$quantity_id'");
         $upd2 = db::query("UPDATE `retail_orders_products` SET quantity = '$qn' WHERE `id`='$id'");
         if ($upd && $upd2) echo 'yes'; else echo 'none';
      } else echo 0;

      exit();
	}


   // cashbox_remove
	if(isset($_GET['cashbox_remove'])) {
		$id = strip_tags($_POST['id']);
      $retailop_d = fun::retailop($id);
      $pitem_id = $retailop_d['product_item_id'];
      $qn = $retailop_d['quantity'];

      $quantity = db::query("select * from product_item_quantity where item_id = '$pitem_id' limit 1");
      if (mysqli_num_rows($quantity)) {
         $quantity = mysqli_fetch_array($quantity);
         $quantity_id = $quantity['id'];
         $upd2 = db::query("UPDATE `product_item_quantity` SET quantity = quantity + '$qn' WHERE id = '$quantity_id'");
      }

      $del = db::query("DELETE FROM `retail_orders_products` where id = '$id'");
		
      if ($del) echo 'yes';
      exit();
	}


   // cashbox_pay
	if(isset($_GET['cashbox_pay'])) {
		$id = strip_tags($_POST['id']);

      $total = 0; $quantity = 0;
      $rr = db::query("select quantity, price from retail_orders_products where order_id = '$id'");
		if (mysqli_num_rows($rr)) { 
         while ($rr_d = mysqli_fetch_array($rr)) {
            $total = $total + ($rr_d['quantity'] * $rr_d['price']);
            $quantity = $quantity + $rr_d['quantity'];
         }
      }

      $upd = db::query("UPDATE `retail_orders` SET `paid` = 1, `total` = $total, `quantity` = $quantity, `upd_dt` = '$datetime' WHERE `id`='$id'");
      $ins = db::query("INSERT INTO `retail_orders`(`user_id`) VALUES ('$user_id')");
      
      if ($upd && $ins) echo 'yes';
      exit();
	}