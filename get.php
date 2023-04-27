<? include "config/core.php";

	// sign in phone
	if(isset($_GET['phone'])) {
		$phone = strip_tags($_POST['phone']);
		$password = strip_tags($_POST['password']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone' and rights = 1");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if (md5($password) == $user_d['password2']) {
				$_SESSION['uph'] = $phone;
				setcookie('uph', $phone, time() + 3600*24*30, '/');
				$_SESSION['ups'] = $user_d['password2'];
				setcookie('ups', $user_d['password2'], time() + 3600*24*30, '/');
				echo 'yes';
			} else if ($user_d['password'] == null) echo 'code';
			else echo 'password';
		} else echo 'phone';
		exit();
	}

	// sign in
	// if(isset($_GET['password'])) {
	// 	$login = strip_tags($_POST['login']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$login' and phone is not null");

	// 	if (mysqli_num_rows($user)) {
	// 		$user_d = mysqli_fetch_assoc($user);
			
	// 	} elseif (mysqli_num_rows($user2)) {
	// 		$user_d2 = mysqli_fetch_assoc($user2);
	// 		if ($password == $user_d2['password']) {
	// 			$_SESSION['upm'] = $login;
	// 			$_SESSION['ups'] = $password;
	// 			setcookie('upm', $login, time() + 3600*24*30);
	// 			setcookie('ups', $password, time() + 3600*24*30);
	// 			echo 'yes';
	// 		} else echo 'none';
	// 	} else echo 'none';

	// 	exit();
	// }


	// login 2
	// if(isset($_GET['login2'])) {
	// 	$login = strip_tags($_POST['login']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$login' and phone is not null");
	// 	$user2 = db::query("SELECT * FROM user WHERE mail = '$login' and mail is not null");

	// 	if (mysqli_num_rows($user)) {
	// 		$user_d = mysqli_fetch_assoc($user);
	// 		if ($user_d['password'] == null) {
	// 			if ($user_d['code'] != null) {
	// 				$code = $user_d['code'];
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($login, $mess, 0, 0, 0, 0, false);
	// 			} else {
	// 				$ins = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$login'");
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($login, $mess, 0, 0, 0, 0, false);
	// 			}
	// 			echo 'code';
	// 		} else echo 'yes';
	// 	} elseif (mysqli_num_rows($user2)) {
	// 		$user_d = mysqli_fetch_assoc($user2);
	// 		if ($user_d['password'] == null) {
	// 			if ($user_d['code'] != null) {
	// 				$code = $user_d['code'];
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				fun::send_mail($mail, $mess);
	// 			} else {
	// 				$ins = db::query("UPDATE `user` SET `code`='$code' WHERE mail = '$login'");
	// 				$mess = "Aru Academy | Тексеру коды: $code";
	// 				fun::send_mail($mail, $mess);
	// 			}
	// 			echo 'code';
	// 		} else echo 'yes';
	// 	} else echo 'none';

	// 	exit();
	// }





	// sign up
	// sign_up_phone
	if(isset($_GET['sign_up_phone'])) {
		$phone = strip_tags($_POST['phone']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone'");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if ($user_d['password'] == null) {
				if ($user_d['code'] != null) {
					$code = $user_d['code'];
					$mess = "Aru Academy | Тексеру коды: $code";
					list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
				} else {
					$ins = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$phone'");
					$mess = "Aru Academy | Тексеру коды: $code";
					list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
				}
				echo 'code';
			} else echo 'password';
		} else echo 'phone';
		exit();
	}
	// code
	if(isset($_GET['sign_up_code'])) {
		$phone = strip_tags($_POST['phone']);
		$code = strip_tags($_POST['code']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone' and code = '$code'");
		if (mysqli_num_rows($user)) {
			$_SESSION['phone'] = $phone;
			$_SESSION['code'] = $code;
			echo 'yes';
		} else echo 'none';
		exit();
	}
	// sign_up final
	if(isset($_GET['sign_up_final'])) {
		$name = strip_tags($_POST['name']);
		$password = strip_tags($_POST['password']);
		if (isset($_SESSION['phone']) && isset($_SESSION['code'])) {
			$phone = $_SESSION['phone'];
			$code = $_SESSION['code'];
			$upd = db::query("UPDATE `user` SET `name`='$name', `password`='$password' WHERE phone = '$phone' and code = '$code'");
			$_SESSION['uph'] = $phone;
			setcookie('uph', $phone, time() + 3600*24*30);
			$_SESSION['ups'] = $password;
			setcookie('ups', $password, time() + 3600*24*30);
		}
		echo "yes";
		exit();
	}


	// sign_up_mail
	if(isset($_GET['sign_up_mail'])) {
		$mail = strip_tags($_POST['smail']);
		$user = db::query("SELECT * FROM user WHERE mail = '$mail'");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if ($user_d['password'] == null) {
				if ($user_d['code'] != null) {
					$code = $user_d['code'];
					$mess = "Aru Academy | Тексеру коды: $code";
					fun::send_mail($mail, $mess);
				} else {
					$ins = db::query("UPDATE `user` SET `code`='$code' WHERE mail = '$mail'");
					$mess = "Aru Academy | Тексеру коды: $code";
					fun::send_mail($mail, $mess);
				}
				echo 'code';
			} else echo 'password';
		} else echo 'mail';
		exit();
	}
	// code
	if(isset($_GET['sign_up_mail_code'])) {
		$mail = strip_tags($_POST['smail']);
		$code = strip_tags($_POST['code']);
		$user = db::query("SELECT * FROM user WHERE mail = '$mail' and code = '$code'");
		if (mysqli_num_rows($user)) {
			$_SESSION['mail'] = $mail;
			$_SESSION['code'] = $code;
			echo 'yes';
		} else echo 'none';
		exit();
	}
	// sign_up final
	if(isset($_GET['sign_up_mail_final'])) {
		$name = strip_tags($_POST['name']);
		$password = strip_tags($_POST['password']);
		if (isset($_SESSION['mail']) && isset($_SESSION['code'])) {
			$mail = $_SESSION['mail'];
			$code = $_SESSION['code'];
			$upd = db::query("UPDATE `user` SET `name`='$name', `password`='$password' WHERE mail = '$mail' and code = '$code'");
			$_SESSION['upm'] = $mail;
			setcookie('upm', $mail, time() + 3600*24*30);
			$_SESSION['ups'] = $password;
			setcookie('ups', $password, time() + 3600*24*30);
		}
		echo "yes";
		exit();
	}





	// pass_reset
	// sign_up_phone
	if(isset($_GET['reset_phone'])) {
		$phone = strip_tags($_POST['phone']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone'");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if ($user_d['code'] != null) {
				$code = $user_d['code'];
				$mess = "Aru Academy | Тексеру коды: $code";
				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
			} else {
				$ins = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$phone'");
				$mess = "Aru Academy | Тексеру коды: $code";
				list($sms_id, $sms_cnt, $cost, $balance) = send_sms($phone, $mess, 0, 0, 0, 0, false);
			}
			echo 'code';
		} else echo 'phone';
		exit();
	}
	// code
	if(isset($_GET['reset_code'])) {
		$phone = strip_tags($_POST['phone']);
		$code = strip_tags($_POST['code']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone' and code = '$code'");
		if (mysqli_num_rows($user)) {
			$_SESSION['phone'] = $phone;
			$_SESSION['code'] = $code;
			echo 'yes';
		} else echo 'none';
		exit();
	}
	// sign_up final
	if(isset($_GET['reset_final'])) {
		$password = strip_tags($_POST['password']);
		if (isset($_SESSION['phone']) && isset($_SESSION['code'])) {
			$phone = $_SESSION['phone'];
			$code = $_SESSION['code'];
			$upd = db::query("UPDATE `user` SET `password`='$password' WHERE phone = '$phone' and code = '$code'");
			$_SESSION['uph'] = $phone;
			setcookie('uph', $phone, time() + 3600*24*30);
			$_SESSION['ups'] = $password;
			setcookie('ups', $password, time() + 3600*24*30);
		}
		echo "yes";
		exit();
	}





	// pass_reset
	// if(isset($_GET['pass_reset'])) {
	// 	$login = strip_tags($_POST['login']);
	// 	$user = db::query("SELECT * FROM user WHERE phone = '$login'");
	// 	$user2 = db::query("SELECT * FROM user WHERE mail = '$login'");

	// 	if (mysqli_num_rows($user)) {
	// 		$sql = db::query("UPDATE `user` SET `code`='$code' WHERE phone = '$login'");
	// 		$mess = "Aru Academy | Тексеру коды: $code";
	// 		list($sms_id, $sms_cnt, $cost, $balance) = send_sms($login, $mess, 0, 0, 0, 0, false);
	// 		echo "yes";
	// 	} elseif (mysqli_num_rows($user2)) {
	// 		$sql = db::query("UPDATE `user` SET `code`='$code' WHERE mail = '$login'");
	// 		$mess = "Aru Academy | Тексеру коды: $code";
	// 		fun::send_mail($mail, $mess);
	// 		echo "yes";
	// 	} else echo 'none';

	// 	exit();
	// }

	// // sign reset
	// if(isset($_GET['sign_reset'])) {
	// 	$phone = $_SESSION['phone'];
	// 	$mail = $_SESSION['mail'];
	// 	$code = $_SESSION['code'];
	// 	$password = strip_tags($_POST['password']);
		
	// 	if ($phone != null) {
	// 		$upd = db::query("UPDATE `user` SET `password`='$password' WHERE phone = '$phone' and code = '$code'");
	// 		$_SESSION['uph'] = $phone;
	// 		setcookie('uph', $phone, time() + 3600*24*30);
	// 	} else {
	// 		$upd = db::query("UPDATE `user` SET `password`='$password' WHERE mail = '$mail' and code = '$code'");
	// 		$_SESSION['upm'] = $mail;
	// 		setcookie('upm', $mail, time() + 3600*24*30);
	// 	}
		
	// 	$_SESSION['ups'] = $password;
	// 	setcookie('ups', $password, time() + 3600*24*30);
	// 	echo "yes";
	// 	exit();
	// }




	// ubd user
	if(isset($_GET['ubd_acc'])) {
		$n_name = strip_tags($_POST['n_name']);
		$surname = strip_tags($_POST['surname']);
		$sex = strip_tags($_POST['sex']);
		$age = strip_tags($_POST['age']);
		$mail = strip_tags($_POST['mail']);
		$phone = strip_tags($_POST['phone']);
		$password = strip_tags($_POST['password']);
		
		$upd = db::query("UPDATE `user` SET `name`='$n_name', `surname`='$surname', `sex`='$sex', `age`='$age', `mail`='$mail', `phone`='$phone', `password`='$password', `upd_dt`='$datetime' WHERE id = '$user_id'");

		$_SESSION['uph'] = $phone;
		$_SESSION['upm'] = $mail;
		$_SESSION['ups'] = $password;
		setcookie('uph', $phone, time() + 3600*24*30);
		setcookie('upm', $mail, time() + 3600*24*30);
		setcookie('ups', $password, time() + 3600*24*30);

		echo "yes";
		exit();
	}