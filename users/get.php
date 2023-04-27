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


   