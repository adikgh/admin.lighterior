<? include "../config/core.php";

   // product_add 
	if(isset($_GET['staff_add'])) {
		$name = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		$staff_id = strip_tags($_POST['staff_id']);
      $mess = "Вам доступна платформа. \nСсылка: https://admin.lighterior.kz/";
      $password = '123456';
      $password2 = md5($password);

      $user_d = fun::user_phone($phone);
      if ($user_d == 0) {
         $user_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `user`")))['max(id)'] + 1;
         $user_ins = db::query("INSERT INTO `user`(`id`, `phone`, `password`, `password2`, `name`, `rights`) VALUES ('$user_id', '$phone', '$password', '$password2', '$name', 1)");
			// if ($user_ins) list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
      } else {
         $user_id = $user_d['id'];
         if (!$user_d['rights']) $user_upd = db::query("UPDATE `user` SET `rights` = 1 WHERE `id`='$user_id'");
      }

      $user_management_d = fun::user_management2($user_id);
      if ($user_management_d == 0) $ins = db::query("INSERT INTO `user_management`(`user_id`, `staff_id`, `rights`, `code`) VALUES ('$user_id', '$staff_id', 1, '$user_id')");
      else $upd = db::query("UPDATE `user_management` SET `staff_id`='$staff_id' WHERE `user_id`='$user_id'");
      
      if ($ins || $upd) echo 'yes';
      else echo 'error';

      exit();
	}
   
   // meng_delete 
	if(isset($_GET['meng_delete'])) {
		$id = strip_tags($_POST['id']);
      // $upd = db::query("DELETE FROM `product_item` WHERE `product_id` = '$id'");
      $del = db::query("DELETE FROM `user_management` WHERE `id` = '$id'");
      if ($del) echo 'yes';
      else echo 'error';
      exit();
	}






   // product_add 
	if(isset($_GET['designer_add'])) {
		$name = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		$compn = strip_tags($_POST['compn']);
		$ins = strip_tags($_POST['ins']);
		$site = strip_tags($_POST['site']);
      $mess = "Вам доступна платформа. \nСсылка: https://admin.lighterior.kz/";
      $password = '123456';
      $password2 = md5($password);

      $user_d = fun::user_phone($phone);
      if ($user_d == 0) {
         $user_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `user`")))['max(id)'] + 1;
         $user_ins = db::query("INSERT INTO `user`(`id`, `phone`, `password`, `password2`, `name`, `designer`) VALUES ('$user_id', '$phone', '$password', '$password2', '$name', 1)");
			// if ($user_ins) list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
      } else {
         $user_id = $user_d['id'];
         $user_upd = db::query("UPDATE `user` SET `designer` = 1 WHERE `id` = '$user_id'");
      }
      
      $designer_d = fun::user_designer($user_id);
      if ($designer_d == 0) {
         $ins = db::query("INSERT INTO `user_designer`(`user_id`, `company_name`, `instagram`, `site`) VALUES ('$user_id', '$compn', '$ins', '$site')");
         if ($ins) echo 'on'; else echo 'error';
      } else echo 'yes';

      exit();
	}

   // product_add 
	if(isset($_GET['designer_edit'])) {
      $id = strip_tags($_POST['id']);
		$name = strip_tags($_POST['name']);
		$compn = strip_tags($_POST['compn']);
		$ins = strip_tags($_POST['ins']);
		$site = strip_tags($_POST['site']);

      if ($name) $upd = db::query("UPDATE `user` SET `name` = '$name' WHERE `id` = '$id'");
      if ($compn) $upd = db::query("UPDATE `user_designer` SET `company_name` = '$compn' WHERE `user_id` = '$id'");
      if ($ins) $upd = db::query("UPDATE `user_designer` SET `instagram` = '$ins' WHERE `user_id` = '$id'");
      if ($site) $upd = db::query("UPDATE `user_designer` SET `site` = '$site' WHERE `user_id` = '$id'");
      echo 'yes';
      
      exit();
	}
   
   // meng_delete 
	if(isset($_GET['designer_delete'])) {
		$id = strip_tags($_POST['id']);
      $upd = db::query("UPDATE `user` SET designer = null WHERE `id` = '$id'");
      $del = db::query("DELETE FROM `user_designer` WHERE `user_id` = '$id'");
      if ($del) echo 'yes'; else echo 'error';
      exit();
	}
   
   // meng_delete 
	if(isset($_GET['designer_check'])) {
		$id = strip_tags($_POST['id']);
      $upd = db::query("UPDATE `user` SET designer = 1 WHERE `id` = '$id'");
      if ($upd) echo 'yes'; else echo 'error';
      exit();
	}


   