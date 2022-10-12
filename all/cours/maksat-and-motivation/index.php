<?php include "../../config/core.php";

	// 
	$cours_id = 13;
	$cours = db::query("select * from cours where id = '$cours_id'");
	$cours_d = mysqli_fetch_assoc($cours);
	$category = fun::category($cours_d['category_id']);
	$autor = fun::autor($cours_d['autor_id']);

	// site setting
	$menu_name = 'item';
	$pod_menu_name = 'maksat-and-motivation';
	$site_set = [
      'menu' => 2,
      'header' => 'false',
      'footer_t' => '/../cours/'.$pod_menu_name.'/footer_t.php',
   ];
	$css = ['project/'.$pod_menu_name];
	$js = ['project/'.$pod_menu_name];

	$san = 0;
	$whatsapp = ['77776779777'];
	$whatsapp2 = ['77776779777'];
	
?>
<?php include "../../block/header.php"; ?>

   <!--  -->
   <div class="c_header">
      <div class="bl_c">
         <div class="c_logo"></div>
         <div class="c_menu">
            <a href="" class="c_menu_i"></a>
            <a href="" class="c_menu_i"></a>
            <a href="" class="c_menu_i"></a>
            <a href="" class="c_menu_i"></a>
         </div>
      </div>
   </div>

   <!--  -->
	<div class="item">

      <!-- Оффер -->
      <div class="itemc_info">
         <div class="bl_c">

            <div class="head_c"><h4>Оффер</h4></div>

            <div class="">Курсқа қатысамын</div>
            <div class="">Тегін сабақты қарау</div>

            <!-- <div class="itemc_info_c">
               <div class="itemci_l">
                  <div class="itemci_ln">
                     <div class="itemci_lnc"><i class="fas fa-bell"></i></div>
                     <p>Практикумнан орыныңызды <br>алып үлгеріңіз</p>
                  </div>
                  <h1 class="itemci_h"><?=$cours_d['name']?></h1>
                  <div class="itemci_p"><?=$cours_d['offer_t']?></div>
                  <div class="itemci_b">
                     <a href="#price" class="btn">Оқығым келеді</a>
                     <a href="#program" class="btn btn_cl">Практикум бағдарламасы</a>
                  </div>
               </div>
               <div class="itemci_r">
                  <div class="lazy_img" data-src="/assets/img/cours/<?=$cours_d['img']?>"></div>
               </div>
            </div>

            <div class="itemc_dn">
               <div class="itemcd_i">
                  <div class="itemcd_ic"><i class="fal fa-play-circle"></i></div>
                  <div class="itemcd_in">
                     <div>Практикум ұзақтығы</div>
                     <p>5 апта</p>
                  </div>
               </div>
               <div class="itemcd_i">
                  <div class="itemcd_ic"><i class="fal fa-book-reader"></i></div>
                  <div class="itemcd_in">
                     <div>Доступ практикумнан</div>
                     <p>Соң тағы <?=$cours_d['time']?></p>
                  </div>
               </div>
               <div class="itemcd_i">
                  <div class="itemcd_ic"><i class="fal fa-globe"></i></div>
                  <div class="itemcd_in">
                     <div>Онлайн</div>
                     <p>Cізге ыңғайлы уақытта</p>
                  </div>
               </div>
               <div class="itemcd_i">
                  <div class="itemcd_ic"><i class="fal fa-users-class"></i></div>
                  <div class="itemcd_in">
                     <div>Сізбен бірге</div>
                     <p><?=$cours_d['view']?> бақытты ана бар</p>
                  </div>
               </div>
            </div> -->

         </div>
      </div>


      <!-- Сізді не күтуде -->
      <div class="jbl1">
         <div class="bl_c">
            <div class="head_c">
               <h4>jСізді не күтуде:</h4>
            </div>
         </div>
      </div>


      <!-- Для кого -->
      <div class="jbl2">
         <div class="bl_c">
            <div class="head_c">
               <h4>Бұл курс сіз үшін, егер:</h4>
            </div>
         </div>
      </div>


      <!-- Резултать -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>БҰЛ КУРС СИҚЫР ЕМЕС.</h4>
            </div>
         </div>
      </div>


      <!-- Программа -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Курс бағдарламасы</h4>
            </div>
         </div>
      </div>


      <!-- Тегін сабақты алу -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Тегін сабақты алу</h4>
               <p>лид</p>
            </div>
         </div>
      </div>


      <!-- Тарифтері -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Тариф одно для всех</h4>
               <p>+ лид</p>
            </div>
         </div>
      </div>
      <div id="price" class="iprice">
         <div class="bl_c">
            <div class="head_c head_c1">
               <h3>Практикум пакеттері</h3>
            </div>

            <div class="iprice_c <?=(mysqli_num_rows($pack)==2?"iprice_c2":"")?> <?=(mysqli_num_rows($pack)>=3?"iprice_c3":"")?>">
               <?php while($pack_date = mysqli_fetch_assoc($pack)): ?>
                  <div class="iprice_ci">
                     <?php if (mysqli_num_rows($pack) != 1): ?>
                        <div class="iprice_cih"><p><?=$pack_date['name']?></p></div>
                     <?php endif ?>
                     <div class="iprice_cin">
                        <?php if ($pack_date['offer']): ?>
                           <div class="bq_cih2"><?=$pack_date['offer']?></div>
                        <?php endif ?>

                        <?php $pack_id = $pack_date['id'] ?>
                        <?php $pack_info = db::query("select * from c_pack_word where pack_id = '$pack_id' and bonus is null order by number asc"); ?>
                        <div class="bq_cips">
                           <?php while($pi_d = mysqli_fetch_assoc($pack_info)): ?>
                              <div class="bq_cipsi <?=($pi_d['none']==1?'bq_cipsi_none':'')?>"><?=$pi_d['txt']?></div>
                           <?php endwhile; ?>
                        </div>
                        
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
                              <?php if ($pack_date['price_sole']): ?>
                                 <p class="bq_cip_sole"><?=$pack_date['price_sole']?> тг</p>
                              <?php endif ?>
                              <p><?=$pack_date['price']?> тг</p>
                           </div>
                        </div>

                        <?php if ($pack_date['installment']): ?>
                           <div class="bq_cip bq_cip2">
                              <span>Бөліп төлем:</span>
                              <div class="bq_cipc">
                                 <div class="bq_cipcn">
                                    <?php if ($pack_date['count3']): ?>
                                       <div data-price="<?=round($pack_date['price']/3)?> тг" class="bq_cipcni <?=($pack_date['count_act']=='3'?"bq_cipcni_act":"")?>">3</div>
                                    <?php endif ?>
                                    <?php if ($pack_date['count6']): ?>
                                       <div data-price="<?=round($pack_date['price']/6)?> тг" class="bq_cipcni <?=($pack_date['count_act']=='6'?"bq_cipcni_act":"")?>">6</div>
                                    <?php endif ?>
                                    <?php if ($pack_date['count12']): ?>
                                       <div data-price="<?=round($pack_date['price']/12)?> тг" class="bq_cipcni <?=($pack_date['count_act']=='12'?"bq_cipcni_act":"")?>">12</div>
                                    <?php endif ?>
                                    <?php if ($pack_date['count24']): ?>
                                       <div data-price="<?=round($pack_date['price']/24)?> тг" class="bq_cipcni <?=($pack_date['count_act']=='24'?"bq_cipcni_act":"")?>">24</div>
                                    <?php endif ?>
                                 </div>
                                 <p><?=round($pack_date['price'] / $pack_date['count_act'])?> тг</p>
                              </div>
                           </div>
                        <?php endif ?>

                        <div class="bq_cib">
                           <div class="btn btn_ukl">Қатысамын</div>
                           <?php if ($pack_date['installment']): ?>
                              <a class="btn btn_red_cl" href="https://wa.me/<?=$whatsapp[$san]?>" target="_blank">Бөліп төлеймін</a>
                           <?php endif ?>
                        </div>

                     </div>
                  </div>
               <?php endwhile; ?>
            </div>


         </div>
      </div>


      <!-- Автор -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Автор</h4>
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
                     <div class="cr3_clci lazy_img" data-src="/assets/img/bag/<?=$autor['bag']?>"></div>
                  </div>
               </div>
               <div class="cr3_cr">
                  <div class="cr3_crh"><?=$autor['name']?> <?=$autor['surname']?></div>
                  <div class="cr3_crl">
                     <?php $autor_id = $cours_d['autor_id']; ?>
                     <?php $autor_i = db::query("select * from autor_info where user_id = '$autor_id'"); ?>
                     <?php while ($autor_id = mysqli_fetch_assoc($autor_i)): ?>
                        <div class="cr3_crli"><?=$autor_id['txt']?></div>
                     <?php endwhile ?>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!-- Клуб -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Клуб + продажа</h4>
            </div>
         </div>
      </div>


      <!-- Жиі қойылатын сұрақтар -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Жиі қойылатын сұрақтар</h4>
            </div>
         </div>
      </div>
      

      <!-- Снова продажа -->
      <div class="">
         <div class="bl_c">
            <div class="head_c">
               <h4>Золотая слова и дожим</h4>
            </div>
         </div>
      </div>

	</div>
	
<?php include "../../block/footer.php"; ?>

<div class="oko">
	<div class="oko_a oko_close"></div>
	<div class="bl_c">
		<div class="oko_s">
			<div class="oko_s_name">Төлем жасау үшін KASPI <br>GOLD жібересіз</div>
			<img class="lazy_img copy" onclick="copytext('4400430153731036')" data-src="/assets/img/bag/Карта_Kaspi_Gold_aru.png" />
			<div class="oko_s_s">Көшіріп алу үшін картаны басыңыз</div>
			<div class="oko_s_p">Whatsapp желісіне <br>чек-ті жібересіз</div>
			<a href="https://wa.me/<?=$whatsapp[$san]?>" target="_blank" class="btn btn_cl">Жіберемін</a>
		</div>
	</div>
</div>