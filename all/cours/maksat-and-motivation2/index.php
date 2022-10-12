<?php include "../../config/core.php";

	// 
	$cours_id = 13;
	$cours = db::query("select * from cours where id = '$cours_id'");
	$cours = mysqli_fetch_assoc($cours);
	$category = fun::category($cours['category_id']);
	$autor = fun::autor($cours['autor_id']);

	// site setting
	$menu_name = 'item';
   $pod_menu_name = 'maksat-and-motivation2';
	$site_set = ['menu' => 2,];
	$css = ['item', 'project/'.$pod_menu_name];
	$js = [];

	$san = rand(0, 1);
	$whatsapp = ['77776779777', '77476267492'];
	$whatsapp2 = ['77776779777', '77476267492'];
	
?>
<?php include "../../block/header.php"; ?>


	<div class="item">
		<div class="item_c">

			<!--  -->
			<div class="itemc_info">
				<div class="bl_c">

					<div class="itemc_info_c">
						<div class="itemci_l">
							<h1 class="itemci_h"><?=$cours['name_'.$lang]?></h1>
							<div class="itemci_b">
								<a href="#price" class="btn">Қатысқым келеді</a>
								<!-- <div class="btn btn_cl">Тегін сабақ жабық</div> -->
							</div>
						</div>
						<div class="itemci_r">
							<div class="lazy_img" data-src="/assets/img/bag/aru_bg2.jpeg"></div>
						</div>
					</div>

				</div>
			</div>


         <!--  -->
         <div class="cr4">
            <div class="bl_c">
               <div class="head_c head_c1 txt_c"><h3>Бұл курс сіз үшін, егер:</h3></div>
               <div class="cr4_c">
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/exploding-head_1f92f.png"></div>
                     </div>
                     <div class="cr4_cic"><div>Басың азан-қазан болса</div></div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/confused-face_1f615.png"></div>
                     </div>
                     <div class="cr4_cic"><div>Күнделікті күйбең тірлік</div></div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/face-exhaling_1f62e-200d-1f4a8.png"></div>
                     </div>
                     <div class="cr4_cic"><div>Өзнергің келеді, бірақ әлің жоқ</div></div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/weary-face_1f629.png"></div>
                     </div>
                     <div class="cr4_cic"><div>Мақсатыңыз бар, бірақ оған жетуге қиналасыз</div></div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/face-with-monocle_1f9d0.png"></div>
                     </div>
                     <div class="cr4_cic"><div>Өзіңіз шын не қалайтыныңызды білмейсіз</div></div>
                  </div>
               </div>
               <div class="head_c head_c1 txt_c">
                  <h3>БҰЛ КУРС СИҚЫР ЕМЕС</h3>
                  <p>Бұл жерде нейробиология, психология, квантовая физика, биохимия және дәлелденген ғылыми тәжірибелерге негізделген.</p>
               </div>
            </div>
         </div>


			<!--  -->
			<div id="price" class="iprice">
				<div class="bl_c">
					<div class="iprice_c">
                  <div class="iprice_ci">
                     <div class="iprice_cin">
                        <div class="head_c head_c1"><h3>Тариф ортақ, бір баға</h3></div>
                        <div class="bq_cips">
                           <div class="bq_cipsi">9 сабақ. Әрқайсысы 20-25 минуттан.</div>
                           <div class="bq_cipsi">Әр сабақтан соң үй жұмысы.</div>
                           <div class="bq_cipsi">Әр сабақтың электронды кітаптары.</div>
                           <div class="bq_cipsi">Өмірдің барлық сферасын талдаймыз: карьера, ақша, қарым-қатынас, шығармашылық.</div>
                           <div class="bq_cipsi">Сабақтар жеңіл форматта іш пыстырмай өтеді.</div>
                        </div>
                        <div class="bq_cips bq_cips_bonus">
                           <span>Бонусқа</span>
                           <div class="bq_cipsi">Менің жаңа жылым курсы (5.000 тг)</div>
                        </div>

                        <div class="bq_cip">
                           <div class="bq_cipc">
                              <p>20000 тг</p>
                           </div>
                        </div>
                        <div class="bq_cib">
                           <div class="btn btn_ukl">Қатысамын</div>
                           <a class="btn btn_red_cl" href="https://wa.me/<?=$whatsapp[$san]?>?text=Мақсатқа жету мен мотивация құпиясы, бөліп төлеймін ..">Бөліп төлеймін</a>
                           <!-- <div class="btn btn_red_cl">Тегін сабақ жабық</div> -->
                        </div>
                     </div>
                  </div>
					</div>
				</div>
			</div>

		</div>
	</div>
	
<?php include "../../block/footer.php"; ?>


<!--  -->
<div class="oko">
	<div class="oko_a oko_close"></div>
	<div class="bl_c">
		<div class="oko_s">
			<div class="oko_s_name">Төлем жасау үшін KASPI <br>GOLD жібересіз</div>
			<img class="lazy_img copy" onclick="copytext('4400430125582806')" data-src="/assets/img/bag/Карта_Kaspi_Gold_aru.png" />
			<div class="oko_s_s">Көшіріп алу үшін картаны басыңыз</div>
			<div class="oko_s_p">Whatsapp желісіне <br>чек-ті жібересіз</div>
			<a href="https://wa.me/<?=$whatsapp[$san]?>" target="_blank" class="btn btn_cl">Жіберемін</a>
		</div>
	</div>
</div>

<!--  -->
<div class="pop_bl fr">
   <div class="pop_bl_a zabr_back"></div>
   <div class="pop_bl_c">
      <div class="head_c txt_c">
         <h4>Тегін сабақты алу</h4>
         <p>Төменге аты-жөніңізді жазыңыз, тегін сабаққа доступ беремін</p>
      </div>
      <div class="form_c">
         <div class="form_im">
            <i class="far fa-user form_icon"></i>
            <input type="text" class="form_im_txt name" placeholder="Аты-жөніңіз" data-lenght="3">
         </div>
         <div class="form_im">
            <i class="far fa-phone-alt form_icon"></i>
            <input type="tel" class="form_im_txt phone fr_phone" placeholder="8 (___) ___-__-__" data-lenght="6">
         </div>
         <div class="form_im form_im_bn">
            <div class="btn orderSend2">Аламын</div>
         </div>
      </div>
   </div>
</div>