<div id="price" class="iprice">
   <div class="bl_c">
      <div class="head_c head_c1">
         <?php if (mysqli_num_rows($pack) == 1): ?>
            <h3>Курстың бағасы</h3>
         <?php else: ?>
            <h3>Курс пакеттері</h3>
         <?php endif ?>
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
                  <?php $pack_info = db::query("select * from c_pack_word where pack_id = '$pack_id' and bonus is null"); ?>
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
                        <a class="btn btn_red_cl" href="https://wa.me/<?=$whatsapp2[$san]?>" target="_blank">Бөліп төлеймін</a>
                     <?php endif ?>
                  </div>

               </div>
            </div>
         <?php endwhile; ?>
      </div>


   </div>
</div>