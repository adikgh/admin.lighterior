<? 

   require 'db.php';
   require 'fun.php';
   require 'product.php';
   require 't.php';
   require 'smsc_api.php';

   class core {
      public static $user_ph = false;
      public static $user_r = false;
      public static $user_data = array();

      public function __construct() {
         new db; new t; new fun; new product;
         session_start();
         date_default_timezone_set('Asia/Almaty');
         $this->authorize();
      }

      private function authorize() {
         $user_ph = false;
         $user_ps = false;

         if (isset($_SESSION['uph']) && isset($_SESSION['ups'])) {
            $user_ph = $_SESSION['uph'];
            $user_ps = $_SESSION['ups'];
         } else if (isset($_COOKIE['uph']) && isset($_COOKIE['ups'])) {
            $user_ph = $_COOKIE['uph'];
            $user_ps = $_COOKIE['ups'];
         }
         if (($user_ph && $user_ps) || ($user_pm && $user_ps)) {
            $user = db::query("SELECT * FROM user WHERE phone = '$user_ph' and rights = 1");
            if (mysqli_num_rows($user)) {
               $user_data = mysqli_fetch_assoc($user);
               if ($user_ps == $user_data['password2']) {
                  self::$user_ph = $user_ph;
                  self::$user_data = $user_data;
               } else $this->user_unset();
            } else $this->user_unset();
         }

      }
   
      public function user_unset() {
         self::$user_data = array();
         unset($_SESSION['ups']);
         setcookie('ups', '', time(), '/');
         self::$user_ph = false;
         unset($_SESSION['uph']);
         setcookie('uph', '', time(), '/');
      }
   }


   // data
   $core = new core;
   $user = core::$user_data;
   $user_id = $user['id'];
   $user_right = fun::user_management($user_id);


   // lang
   $lang = 'ru';
   if (isset($_GET['lang'])) if ($_GET['lang'] == 'kz' || $_GET['lang'] == 'ru') $_SESSION['lang'] = $_GET['lang'];
   if (isset($_SESSION['lang'])) $lang = $_SESSION['lang'];


   // setting
   $site = mysqli_fetch_array(db::query("select * from `site` where id = 1"));
   $ver = 1.16;
   $site_set = [
      'header' => true,
      'menu' => true,
      // 'search' => true,
      // 'pmenu' => true,
      'footer' => false,
      'swiper' => false,
      'plyr' => false,
      'aos' => false,
	];
   $scss = ['norm', 'main'];
   $sjs = ['norm', 'main'];
   $css = [];
   $js = [];
   $code = rand(1000, 9999);


   // date - time
   $date = date("Y-m-d", time());
   $time = date("H:m:s", time());
   $datetime = date('Y-m-d H:i:s', time());


   // url
	$url = $url_page = $url_full = $_SERVER['REQUEST_URI'];
	$url = (explode('?', $url))[0];
	$url_page = (explode('?&page=', $url_page))[0];