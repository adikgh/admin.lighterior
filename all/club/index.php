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
      // 'header' => 'false',
   ];
	$css = ['item', 'project/club'];
	$js = [];

	$san = 0;
	$whatsapp = ['77776779777'];
	$whatsapp2 = ['77776779777'];
	
?>
<?php include "../block/header.php"; ?>


	<div class="item">
		<div class="item_c">

			<!-- оффер -->
			<div class="itemc_info">
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

               <!--  -->
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
			</div>


         <!--  -->
         <div class="cr4">
            <div class="bl_c">
               <div class="head_c head_c1"><h3>Барлығы қалай болады?</h3></div>
               <div class="cr4_c">
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/rocket_1f680.png"></div>
                     </div>
                     <div class="cr4_cic">
                        <div>Ай сайын белгілі бір бағдарлама бойынша даму</div>
                     </div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/woman-teacher-light-skin-tone_1f469-1f3fb-200d-1f3eb.png"></div>
                     </div>
                     <div class="cr4_cic">
                        <div>Арнайы экспертпен жұмыс жасаймыз тек Қазақстан ғана емес, Ресей мамандары да болады</div>
                     </div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/woman-in-lotus-position-light-skin-tone_1f9d8-1f3fb-200d-2640-fe0f.png"></div>
                     </div>
                     <div class="cr4_cic">
                        <div>Әр 2 ай сайын коуч Ару Сағимен ZOOM кездесуде групповая терапия</div>
                     </div>
                  </div>
                  <div class="cr4_ci">
                     <div class="cr4_cimg">
                        <div class="lazy_img" data-src="/assets/img/icons/party-popper_1f389.png"></div>
                     </div>
                     <div class="cr4_cic">
                        <div>Әр 6 айда 1 рет оффлайн кездесу</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


			<!--  -->
         <div class="cr2">
            <div class="bl_c">
               <div class="head_c head_c1"><h3>Мамандар:</h3></div>
               <div class="cr2_c">

                  <?php $word = db::query("select * from u_autor"); ?>
                  <?php while ($word_d = mysqli_fetch_assoc($word)): ?>								
                     <div class="cr2_ci">
                        <div class="cr2_ci_img lazy_img" data-src="/assets/img/users/<?=$word_d['logo']?>"></div>
                        <div class="cr2_ci_txt">
                           <p><?=$word_d['name']?></p>
                           <? if ($word_d['specialist_'.$lang]): ?><span><?=$word_d['specialist_'.$lang]?></span><? endif ?>
                        </div>
                     </div>
                  <?php endwhile ?>

               </div>
            </div>
         </div>


			<!--  -->
			<div id="program" class="iprog">
				<div class="bl_c">
					<div class="">
						<div class="head_c"><h3>Клуб бағдарламасы</h3></div>
                  <? $cours = db::query("select * from c_sub_item where bonus is null ORDER BY number asc"); ?>
                  <div class="bq3_c">
                     <?php while($ana = mysqli_fetch_array($cours)): ?>
                        <div class="bq3_ci">
                           <div class="bq_ci_img">
                              <div class="lazy_img" data-src="/assets/img/cours/<?=$ana['img']?>"></div>
                           </div>
                           <div class="bq_ci_info">
                              <div class="bq_cit"><?=fun::category_name($ana['category_id'], $lang)?></div>
                              <div class="bq_cih"><?=$ana['name_'.$lang]?></div>
                           </div>
                        </div>
                     <?php endwhile ?>
                  </div>
					</div>
				</div>
			</div>

         
         <!-- Бонустар -->
         <div class="cr2">
            <div class="bl_c">
               <div class="">
                  <div class="head_c head_c1"><h3>Бонустар бола ма?</h3></div>
                  <? $cours = db::query("select * from c_sub_item where bonus is not null ORDER BY number asc"); ?>
                  <div class="bq3_c">
                     <?php while($ana = mysqli_fetch_array($cours)): ?>
                        <? if ($ana['cours_id']) $ana = array_merge($ana, fun::cours($ana['cours_id'])); ?>
                        <div class="bq3_ci">
                           <div class="bq_ci_img">
                              <div class="lazy_img" data-src="/assets/img/cours/<?=$ana['img']?>"></div>
                           </div>
                           <div class="bq_ci_info">
                              <div class="bq_cit"><?=fun::category_name($ana['category_id'], $lang)?></div>
                              <div class="bq_cih"><?=$ana['name_'.$lang]?></div>
                              <div class="sbq_cip">
                                 <p class="sbq_cip_sole"><?=$ana['price']?> тг</p>
                                 <p>1 жыл тегін</p>
                              </div>
                           </div>
                        </div>
                     <?php endwhile ?>
                  </div>
					</div>
            </div>
         </div>


			<!--  -->
         <div class="cr3">
            <div class="bl_c">
               <div class="head_c head_c1">
                  <h3>Автор жайлы</h3>
               </div>
               <div class="cr3_c">
                  <div class="cr3_cl">
                     <div class="cr3_clc">
                        <div class="cr3_clca"></div>
                        <div class="cr3_clcb"></div>
                        <div class="cr3_clci lazy_img" data-src="/assets/img/bag/IMG_9617-ggsd.png"></div>
                     </div>
                  </div>
                  <div class="cr3_cr">
                     <div class="cr3_crh">Ару Сағи</div>
                     <div class="cr3_crl">
                        <?php $autor_id = $sub_d['autor_id']; ?>
                        <?php $autor_i = db::query("select * from u_autor_info where user_id = 4"); ?>
                        <?php while ($autor_id = mysqli_fetch_assoc($autor_i)): ?>
                           <div class="cr3_crli"><?=$autor_id['txt']?></div>
                        <?php endwhile ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>

			<!--  -->
			<div id="price" class="iprice">
				<div class="bl_c">
					<!-- <div class="head_c head_c1"><h3>Клуб қосулы құны</h3></div> -->

					<div class="iprice_c">
                  <div class="iprice_ci">
                     <!-- <div class="iprice_cih"><p>Даму клубы</p></div> -->
                     <div class="iprice_cin">
                        <div class="bq_cih2 txt_c">Клубқа қосылу құны</div>

                        <?php $pack_id = $pack_date['id'] ?>
                        <?php $pack_info = db::query("select * from c_pack_word where pack_id = '$pack_id' and bonus is null order by number asc"); ?>
                        <!-- <div class="bq_cips">
                           <?php while($pi_d = mysqli_fetch_assoc($pack_info)): ?>
                              <div class="bq_cipsi <?=($pi_d['none']==1?'bq_cipsi_none':'')?>"><?=$pi_d['txt']?></div>
                           <?php endwhile; ?>
                        </div> -->
                        
                        <?php $pack_info = db::query("select * from c_pack_word where pack_id = '$pack_id' and bonus is not null"); ?>
                        <?php if (mysqli_num_rows($pack_info)): ?>
                           <div class="bq_cips bq_cips_bonus">
                              <span>Бонусқа</span>
                              <?php while($pi_d = mysqli_fetch_assoc($pack_info)): ?>
                                 <div class="bq_cipsi"><?=$pi_d['txt']?></div>
                              <?php endwhile; ?>
                           </div>
                        <?php endif ?>

                        <div class="bq_cip">
                           <span>Бүгінгі баға:</span>
                           <div class="bq_cipc">
                              <p class="bq_cip_sole">350000 тг</p>
                              <p>250000 тг</p>
                           </div>
                        </div>

                        <div class="bq_cip bq_cip2">
                           <span>Бөліп төлем:</span>
                           <div class="bq_cipc">
                              <div class="bq_cipcn">
                                 <div data-price="<?=round(250000/3)?> тг" class="bq_cipcni">3</div>
                                 <div data-price="<?=round(250000/6)?> тг" class="bq_cipcni">6</div>
                                 <div data-price="<?=round(250000/12)?> тг" class="bq_cipcni bq_cipcni_act">12</div>
                                 <div data-price="<?=round(250000/24)?> тг" class="bq_cipcni ">24</div>
                              </div>
                              <p><?=round(250000 / 12)?> тг</p>
                           </div>
                        </div>

                        <div class="bq_cib">
                           <div class="btn btn_ukl">Қатысамын</div>
                           <a class="btn btn_red_cl" href="https://wa.me/<?=$whatsapp[$san]?>" target="_blank">Бөліп төлеймін</a>
                        </div>

                     </div>
                  </div>
					</div>


				</div>
			</div>


         <!--  -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="">БҰЛ - ӨЗІҢІЗГЕ АРНАҒАН ЕҢ МЫҚТЫ ИНВЕСТИЦИЯ!</div>
               </div>
            </div>
         </div> -->


         <!-- Cұрақтар -->
         <!-- <div class="">
            <div class="bl_c">
               <div class="">
                  <div class="head_c"><h3>Басқада сұрақтарға жауап</h3></div>
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