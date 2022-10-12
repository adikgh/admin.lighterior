<?php include "../config/core.php";

	// 
	$sub_id = 1;
	$sub = db::query("select * from c_sub where id = '$sub_id'");
	$sub_d = mysqli_fetch_assoc($sub);
	$category = fun::category($sub_d['category_id']);
	$autor = fun::autor($sub_d['autor_id']);


	// site setting
	$menu_name = 'item';
   $site_set = [
      'menu' => 2,
      'header' => 'false',
      'footer' => 'false',
   ];
	$css = ['item', 'project/club2'];
	$js = [];

	$san = rand(0, 1);
	$whatsapp = ['77776779777', '77476267492'];
	$whatsapp2 = ['77776779777', '77476267492'];
	
?>
<?php include "../block/header.php"; ?>


	<div class="item">
		<div class="item_c">

         <!-- Оффер -->
			<!-- <div class="itemc_info">
				<div class="bl_c">

					<div class="itemc_info_c">
						<div class="itemci_l">
							<h1 class="itemci_h">Қыз-келіншектерге арналған 1-жылдық даму клубы</h1>
							<div class="itemci_b">
								<a href="#price" class="btn">Клуб қосыламын</a>
								<a href="#program" class="btn btn_cl">Жоспарымен танысу</a>
							</div>
						</div>
						<div class="itemci_r"><div class="lazy_img" data-src="/assets/img/bag/aru_bg2.jpeg"></div></div>
					</div>

					<div class="itemc_dn">
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-play-circle"></i></div>
							<div class="itemcd_in"><div>Клубқа доступ</div><p>12 айға беріледі</p></div>
						</div>
                  <div class="itemcd_i">
                     <div class="itemcd_ic"><i class="fal fa-globe"></i></div>
                     <div class="itemcd_in"><div>Форматы</div><p>Онлайн-Офлайн</p></div>
                  </div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-book-reader"></i></div>
							<div class="itemcd_in"><div>Куратор</div><p>Өзіңізбен жеке жұмыс</p></div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-users-class"></i></div>
							<div class="itemcd_in"><div>Кездесулер</div><p>10 маманмен интенсив</p></div>
						</div>
					</div>

				</div>
			</div> -->


         <!-- Клуб кімге арналған -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Даму клубы - бұл … -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Ару Сағи (Даму клубын құрушы және тәлімгері) -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Клубтың жоспары -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- СНГ-ға танымал эксеперттер -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Клуб мүшелеріне бонустар -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Курстар мен Вебинарлар тізімі -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Жарты жылдық офлайн кездесу -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->

         
         <!-- Тариф барлығына ортақ -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Жиі қойылатын сұрақтар -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
               </div>
            </div>
         </div> -->


         <!-- Блок атауы жоқ = Ару Сағи қанатты сөзін әдемілеп жазамыз + Дожим жасаймыз -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="">БҰЛ - ӨЗІҢІЗГЕ АРНАҒАН ЕҢ МЫҚТЫ ИНВЕСТИЦИЯ!</div>
               </div>
            </div>
         </div> -->

		</div>
	</div>
	

<?php include "../block/footer.php"; ?>

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