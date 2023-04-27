<!--  -->
<div class="bl_mess"><div class="bl_mess_sam"></div></div>

<a href="#top" class="up_site" ><i class="fal fa-angle-up"></i></a>
<!-- <div class="up_site clc_top" ><i class="fal fa-angle-up"></i></div> -->

<!--  -->
<div class="mp_dspn">
   <div class="ds_nr"><i class="fal fa-ghost"></i><p>Мобильный дизайн <br> в разработке</p></div>
</div>

<!-- block form -->
<? if ($site_set['form'] == 'true'): ?>
   <div class="pop_bl fr">
      <div class="pop_bl_a zabr_back"></div>
      <div class="pop_bl_c">
         <div class="head_c txt_c">
            <h4>Курска жазыламын</h4>
            <p>Атыңыз бен номеріңізді төменге қалдырыңыз</p>
         </div>
         <div class="form_c">
            <div class="form_im">
               <input type="text" class="form_im_txt name" placeholder="Есіміңіз ..">
               <div class="form_icon"><i class="far fa-user"></i></div>
            </div>
            <div class="form_im">
               <input type="tel" class="form_im_txt phone fr_phone" placeholder="+7 (___) ___-__-__">
               <div class="form_icon"><i class="far fa-phone-alt"></i></div>
            </div>
            <div class="form_im form_im_bn">
               <div class="btn orderSend">
                  <span>Жіберу</span>
               </div>
            </div>
         </div>
      </div>
   </div>
<? endif ?>


<!--  -->
<? if ($site_set['cl_wh'] == '1'): ?>
	<!-- phone -->
	<a target="_blank" href="https://wa.me/<?=$site['whatsapp']?>">
		<div type="button" class="callback-bt">
		   <i class="fab fa-whatsapp"></i>
		</div>
	</a>
<? endif ?>